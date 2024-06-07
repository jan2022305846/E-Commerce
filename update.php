<?php
include 'connection.php';

$productID = $_GET['productID'];
$sql = "SELECT p.productID, p.product_name, p.product_description, p.product_price, 
               d.color, d.material, d.style, d.feature1, d.feature2, d.feature3 
        FROM products p
        JOIN product_details d ON p.productID = d.productID
        WHERE p.productID = $productID";
$result = $connection->query($sql);
$product = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="shortcut icon" href="Images/Icons/favicon.png" type="image/x-icon">
    <script>
        function showAlertAndRedirect() {
            alert('Product updated successfully');
            window.location.href = 'views.php';
        }
    </script>
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
            <h2>Update Product</h2>
        </div>
        <form id="updateForm" action="update_product.php" method="post" onsubmit="event.preventDefault(); submitForm();">
            <input type="hidden" name="productID" value="<?php echo $product['productID']; ?>">
            <table class="form-table">
                <tr>
                    <td class="prod-td">
                        <label for="product_name">Product Name:</label><br>
                        <input type="text" id="product_name" name="product_name" value="<?php echo $product['product_name']; ?>" style="width: 50%;"><br>
                    </td>
                </tr>
                <tr>
                    <td class="prod-td">
                        <label for="product-description">Product Description:</label><br>
                        <textarea id="product-description" name="product_description" rows="4" cols="100%"><?php echo $product['product_description']; ?></textarea><br>
                    </td>
                </tr>
                <tr>
                    <td class="prod-td">
                        <label for="product_color">Product Color:</label><br>
                        <input type="text" id="product_color" name="product_color" value="<?php echo $product['color']; ?>"><br>
                    </td>
                </tr>
                <tr>
                    <td class="prod-td">
                        <label for="product_material">Product Material:</label><br>
                        <input type="text" id="product_material" name="product_material" value="<?php echo $product['material']; ?>"><br>
                    </td>
                </tr>
                <tr>
                    <td class="prod-td">
                        <label for="product_style">Product Style:</label><br>
                        <input type="text" id="product_style" name="product_style" value="<?php echo $product['style']; ?>"><br>
                    </td>
                </tr>
                <tr>
                    <td class="prod-td">
                        <label for="product_features">Product Features:</label><br>
                        <input type="text" id="product_feature1" name="product_feature1" value="<?php echo $product['feature1']; ?>"><br>
                        <input type="text" id="product_feature2" name="product_feature2" value="<?php echo $product['feature2']; ?>"><br>
                        <input type="text" id="product_feature3" name="product_feature3" value="<?php echo $product['feature3']; ?>"><br>
                    </td>
                </tr>
                <tr>
                    <td class="prod-td">
                        <label for="product_price">Product Price:</label><br>
                        <input type="number" name="product_price" value="<?php echo $product['product_price']; ?>"><br>
                    </td>
                </tr>
            </table>
            <div class="buttons">
                <button type="submit" class="styled-button">Update</button>
                <a href="views.php" class="styled-button">Go Back</a>
            </div>
        </form>
    </div>
    <hr>
    <footer class="footer">
        <p>&copy; 2004 Janny Abu-abu. All Rights Reserved</p>
    </footer>
    <script src="js/low_stock_alert.js"></script>
    <script>
        function submitForm() {
            var form = document.getElementById('updateForm');
            var xhr = new XMLHttpRequest();
            xhr.open('POST', form.action, true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    showAlertAndRedirect();
                } else {
                    alert('Error updating product: ' + xhr.responseText);
                }
            };
            xhr.send(new FormData(form));
        }
    </script>
</body>
</html>

<?php
$connection->close();
?>
