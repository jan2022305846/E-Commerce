<?php
include 'connection.php';

// Fetch the product quantity
$productID = $_GET['productID'];
$sql = "SELECT productID, product_quantity FROM products WHERE productID = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("i", $productID);
$stmt->execute();
$result = $stmt->get_result(); 
$product = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Stocks</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="shortcut icon" href="Images/Icons/favicon.png" type="image/x-icon">
    <script>
        function showAlertAndRedirect() {
            alert('Product stocks have been updated successfully.');
            window.location.href = 'views.php';
        }

        function submitForm() {
            var form = document.getElementById('updateForm');
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'update_stock.php', true);
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
            <h2>Add Product Stock</h2>
        </div>
        <form id="updateForm" method="post" onsubmit="event.preventDefault(); submitForm();">
            <input type="hidden" name="productID" value="<?php echo $product['productID']; ?>">
            <table class="form-table">
                <tr>
                    <td class="prod-td">
                        <label for="current_quantity">Current Stock:</label><br>
                        <input type="number" name="current_quantity" value="<?php echo $product['product_quantity']; ?>" readonly><br>
                    </td>
                </tr>
                <tr>
                    <td class="prod-td">
                        <label for="additional_quantity">Add Quantity:</label><br>
                        <input type="number" name="additional_quantity" min="1" required><br>
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
</body>
</html>

<?php
$connection->close();
?>
