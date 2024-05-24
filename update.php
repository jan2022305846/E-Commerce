<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="shortcut icon" href="Images/Icons/favicon.png" type="image/x-icon">
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="Images/Icons/logo_transparent.png" alt="logo">
        </div>
        <div class="company">
            <h1>Abu-abu Leather Works Corp. </h1>
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
        <form action="update_product.php" method="post">
            <table class="form-table">
                <tr>
                    <td class="prod-td">
                        <label for="product_name">Product Name:</label><br>
                        <input type="text" id="product_name" name="product_name" placeholder="Update Product Name:"><br>
                    </td>
                </tr>
                <tr>
                    <td class="prod-td">
                        <label for="product-description">Product Description:</label><br>
                        <textarea id="product-description" name="product_description" rows="4" cols="100%"></textarea><br>
                    </td>
                </tr>
                <tr>
                    <td class="prod-td">
                        <label for="product_price">Product Price:</label><br>
                        <input type="number" name="product_price" placeholder="&#8369;" dir="rtl"><br>
                    </td>
                </tr>
            </table>
            <div class="buttons">
                <input type="submit" value="Update Product">
                <a href="views.html"><input type="button" value="Go Back"></a>
            </div>
        </form>
    </div>
    <hr>
    <footer class="footer">
        <p>&copy; 2004 Janny Abu-abu. All Rights Reserved</p>
    </footer>
</body>
</html>
