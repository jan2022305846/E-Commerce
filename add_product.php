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
                    <li><a href="products.html">Products</a></li>
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
        </div>
        <form action="add_product.php" method="post" enctype="multipart/form-data">
            <table class="form-table">
                <tr>
                    <td rowspan="9" class="prod-td">
                        <label for="product_image">Product Image:</label><br>
                        <input type="file" id="product_image" name="product_image" placeholder="Add Image Here:" accept="image/*"><br>
                    </td>
                </tr>
                <tr>
                    <td class="prod-td">
                        <label for="product_name">Product Name:</label><br>
                        <input type="text" id="product_name" name="product_name" placeholder="Add Product Name:" required><br>
                    </td>
                </tr>
                <tr>
                    <td class="prod-td">
                        <label for="product_description">Product Description:</label><br>
                        <textarea id="product_description" name="product_description" rows="4" cols="50" required></textarea><br>
                    </td>
                </tr>
                <tr>
                    <td class="prod-td">
                        <label for="product_color">Product Color:</label><br>
                        <input type="text" id="product_color" name="product_color" placeholder="Add Product Color:" required><br>
                    </td>
                </tr>
                <tr>
                    <td class="prod-td">
                        <label for="product_material">Product Material:</label><br>
                        <input type="text" id="product_material" name="product_material" placeholder="Add Product Material:" required><br>
                    </td>
                </tr>
                <tr>
                    <td class="prod-td">
                        <label for="product_features">Product Features:</label><br>
                        <textarea id="product_features" name="product_features" rows="4" cols="50" required></textarea><br><br>
                    </td>
                </tr>
                <tr>
                    <td class="prod-td">
                        <label for="product_price">Product Price:</label><br>
                        <input type="number" id="product_price" name="product_price" placeholder="₱" dir="rtl" required><br>
                    </td>
                </tr>
                <tr>
                    <td class="prod-td">
                        <label for="product_serial">Serial Number:</label><br>
                        <input type="number" id="product_serial" name="product_serial" dir="rtl" required><br>
                    </td>
                </tr>
                <tr>
                    <td class="prod-td">
                        <label for="product_stocks">Stocks:</label><br>
                        <input type="number" id="product_stocks" name="product_stocks" placeholder="pcs." dir="rtl" required><br>
                    </td>
                </tr>
            </table>
            <div class="buttons">
                <input type="submit" value="Add Product">
                <a href="views.php"><input type="button" value="Go Back"></a>
            </div>
        </form>
    </div>
    <hr>
    <footer class="footer">
        <p>&copy; 2004 Janny Abu-abu. All Rights Reserved</p>
    </footer>
    <script src="js/low_stock_alert.js"></script>
</body>
</html>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish database connection
    include 'connection.php'; // Assuming your database connection file is named connection.php

    // Retrieve form data
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $product_color = $_POST['product_color'];
    $product_material = $_POST['product_material'];
    $product_features = $_POST['product_features'];
    $product_price = $_POST['product_price'];
    $product_serial = $_POST['product_serial'];
    $product_stocks = $_POST['product_stocks'];

    // Prepare SQL query
    $sql = "INSERT INTO products (product_name, product_description, product_color, product_material, product_features, product_price, product_serial, product_stocks) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Create a prepared statement
    $stmt = $connection->prepare($sql);

    // Bind parameters
    $stmt->bind_param("sssssdii", $product_name, $product_description, $product_color, $product_material, $product_features, $product_price, $product_serial, $product_stocks);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Product added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $stmt->error;
    }

    // Close the statement
    $stmt->close();

    // Close the connection
    $connection->close();
}
?>

