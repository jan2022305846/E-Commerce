<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'connection.php';

    // Fetch POST data
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $product_color = $_POST['product_color'];
    $product_material = $_POST['product_material'];
    $product_style = $_POST['product_style'];
    $product_feature1 = $_POST['product_feature1'];
    $product_feature2 = $_POST['product_feature2'];
    $product_feature3 = $_POST['product_feature3'];
    $product_price = $_POST['product_price'];
    $product_stocks = $_POST['product_stocks'];
    $product_category = $_POST['product_category'];
    $new_category = isset($_POST['new_category']) ? $_POST['new_category'] : null;

    // Handle new category insertion
    if ($product_category === 'new' && $new_category) {
        $stmt = $connection->prepare("INSERT INTO categories (category_name) VALUES (?)");
        if ($stmt) {
            $stmt->bind_param("s", $new_category);
            if ($stmt->execute()) {
                $product_category = $connection->insert_id;
            } else {
                echo "Error executing new category insert: " . $stmt->error;
                exit;
            }
            $stmt->close();
        } else {
            echo "Error preparing statement for new category: " . $connection->error;
            exit;
        }
    }

    // Prepare directory for uploading
    $uploadFileDir = null;
    if ($product_category === 'new') {
        $uploadFileDir = "Images/{$new_category}/";
    } else {
        $stmt = $connection->prepare("SELECT category_name FROM categories WHERE category_id = ?");
        if ($stmt) {
            $stmt->bind_param("i", $product_category);
            if ($stmt->execute()) {
                $stmt->bind_result($category_name);
                if ($stmt->fetch()) {
                    $uploadFileDir = "Images/{$category_name}/";
                } else {
                    echo "Category not found.";
                    exit;
                }
            } else {
                echo "Error executing category query: " . $stmt->error;
                exit;
            }
            $stmt->close();
        } else {
            echo "Error preparing statement for category query: " . $connection->error;
            exit;
        }
    }

    // Create directory if it doesn't exist
    if (!is_dir($uploadFileDir)) {
        mkdir($uploadFileDir, 0777, true);
    }

    // Handle product image upload
    $product_image = null;
    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['product_image']['tmp_name'];
        $fileName = $_FILES['product_image']['name'];
        $fileSize = $_FILES['product_image']['size'];
        $fileType = $_FILES['product_image']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        $dest_path = $uploadFileDir . $newFileName;

        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            $product_image = $dest_path;
        } else {
            echo "Error moving uploaded file.";
            exit;
        }
    }

    // Insert into products table
    $stmt = $connection->prepare("INSERT INTO products (product_name, product_description, product_quantity, product_price, product_image, category_id) VALUES (?, ?, ?, ?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("ssidsi", $product_name, $product_description, $product_stocks, $product_price, $product_image, $product_category);
        if ($stmt->execute()) {
            $product_id = $connection->insert_id;
            $stmt->close();

            // Insert into product_details table
            $stmt = $connection->prepare("INSERT INTO product_details (productID, color, material, style, feature1, feature2, feature3) VALUES (?, ?, ?, ?, ?, ?, ?)");
            if ($stmt) {
                $stmt->bind_param("issssss", $product_id, $product_color, $product_material, $product_style, $product_feature1, $product_feature2, $product_feature3);
                if ($stmt->execute()) {
                    echo "<script>
                    alert('New product has been added successfully.');
                    window.location.href = 'views.php';
                    </script>";
                } else {
                    echo "Error inserting product details: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Error preparing statement for product details: " . $connection->error;
            }            
        } else {
            echo "Error inserting product: " . $stmt->error;
        }
    } else {
        echo "Error preparing statement for new product: " . $connection->error;
    }

    // Close database connection
    $connection->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="shortcut icon" href="Images/Icons/favicon.png" type="image/x-icon">
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="Images/Icons/logo_transparent.png" alt="logo">
        </div>
        <div class="company">
            <h1>Abu-abu Leather Works Corp.</h1>
        </div>
        <div class="search"></div>
        <div class="navigation">
            <nav>
                <ul>
                    <li><a href="products.php">Products</a></li>
                    <li><a href="company.html">Company</a></li>
                    <li><a href="about_us.html">Contact us</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <hr>
    <div class="form-container">
        <div class="title">
            <h2>Add Product</h2>
            <div class="buttons">
                <a href="views.php"><input type="button" value="Go Back"></a>
            </div>
        </div>
        <form action="add_product.php" method="post" enctype="multipart/form-data">
            <table class="form-table">
                <tr>
                    <td class="prod-td">
                        <label for="product-category">Select Product Category:</label>
                        <select name="product_category" id="product-category" required>
                            <option value="">Select Category</option>
                            <?php
                            include 'connection.php';
                            $sql = "SELECT category_id, category_name FROM categories";
                            $result = $connection->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['category_id'] . "'>" . $row['category_name'] . "</option>";
                            }
                            ?>
                            <option value="new">Add New Category</option>
                        </select>
                        <br>
                        <label for="new-category">Or Add New Category:</label>
                        <input type="text" id="new-category" name="new_category" placeholder="New Category" disabled>
                    </td>
                </tr>
                <tr>
                    <td class="prod-td">
                        <label for="product_image">Product Image:</label><br>
                        <input type="file" id="product_image" name="product_image" placeholder="Add Image Here:" accept="image/*" style="width: 50%;"><br>
                    </td>
                </tr>
                <tr>
                    <td class="prod-td">
                        <label for="product_name">Product Name:</label><br>
                        <input type="text" id="product_name" name="product_name" style="width: 50%;"><br>
                    </td>
                </tr>
                <tr>
                    <td class="prod-td">
                        <label for="product-description">Product Description:</label><br>
                        <textarea id="product-description" name="product_description" rows="4" style="width: 50%;"></textarea><br>
                    </td>
                </tr>
                <tr>
                    <td class="prod-td">
                        <label for="product_color">Product Color:</label><br>
                        <input type="text" id="product_color" name="product_color"><br>
                    </td>
                </tr>
                <tr>
                    <td class="prod-td">
                        <label for="product_material">Product Material:</label><br>
                        <input type="text" id="product_material" name="product_material"><br>
                    </td>
                </tr>
                <tr>
                    <td class="prod-td">
                        <label for="product_style">Product Style:</label><br>
                        <input type="text" id="product_style" name="product_style"><br>
                    </td>
                </tr>
                <tr>
                    <td class="prod-td">
                        <label for="product_features">Product Features:</label><br>
                        <input type="text" id="product_feature1" name="product_feature1"><br>
                        <input type="text" id="product_feature2" name="product_feature2"><br>
                        <input type="text" id="product_feature3" name="product_feature3"><br>
                    </td>
                </tr>
                <tr>
                    <td class="prod-td">
                        <label for="product_price">Product Price:</label><br>
                        <input type="number" name="product_price"><br>
                    </td>
                </tr>
                <tr>
                    <td class="prod-td">
                        <label for="product_stocks">Stocks:</label><br>
                        <input type="number" id="product_stocks" name="product_stocks" placeholder="pcs." dir="rtl" required><br>
                    </td>
                <tr>
                    <td>
                        <input type="submit" value="Add Product">
                    </td>
                </tr>
                </tr>
            </table>
        </form>
    </div>
    <hr>
    <footer class="footer">
        <p>&copy; 2004 Janny Abu-abu. All Rights Reserved</p>
    </footer>
    <script src="js/low_stock_alert.js"></script>
    <script>
        document.getElementById('product-category').addEventListener('change', function() {
            var newCategoryInput = document.getElementById('new-category');
            if (this.value === 'new') {
                newCategoryInput.disabled = false;
                newCategoryInput.required = true;
            } else {
                newCategoryInput.disabled = true;
                newCategoryInput.required = false;
            }
        });
    </script>
</body>
</html>
