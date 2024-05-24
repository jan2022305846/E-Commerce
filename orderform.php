<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>
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
                    <li><a href="login.php">Log-in</a></li>
                    <li><a href="about_us.html">Contact us</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <hr>
        <div class="form-container">
            <div class="title">
                <h2>Order Form</h2>
            </div>
            <table class="form-table"> 
                <tr>
                    <td class="form-td">Transaction No.:</td>
                    <td class="form-td">
                        <?php echo uniqid(); ?>
                    </td>
                    <td class="form-td">Date:</td>
                    <td colspan="2" class="form-td">
                    <?php echo date('Y-m-d'); ?>
                    </td>
                </tr>
                <tr>
                    <td class="form-td">Product Code:</td>
                    <td class="form-td">Name:</td>
                    <td class="form-td">Price:</td>
                    <td class="form-td">Quantity:</td>
                    <td class="form-td">Amount:</td>
                </tr>
                <tr>
                    <td class="form-td">
                        <?php echo $_POST['productID']; ?>
                    </td>
                    <td class="form-td">
                        <?php echo $_POST['product_name']; ?>
                    </td>
                    <td class="form-td">
                        &#8369;<?php echo number_format($_POST['product_price'], 2); ?>
                    </td>
                    <td class="form-td">
                        <?php echo $_POST['quantity']; ?>
                    </td>
                    <td class="form-td">
                        &#8369;<?php echo number_format($_POST['product_price'] * $_POST['quantity'], 2); ?>
                    </td>
                </tr>
                <tr>
                    <td class="form-td"></td>
                    <td class="form-td"></td>
                    <td class="form-td"></td>
                    <td class="form-td"></td >
                    <td class="form-td"></td>
                </tr>
                <tr>
                    <td class="form-td"></td>
                    <td class="form-td"></td>
                    <td class="form-td"></td>
                    <td class="form-td"></td>
                    <td class="form-td"></td>
                </tr>
                <tr>
                    <td colspan="4" id="form-total">Total</td>
                    <td class="form-total">&#8369;<?php echo number_format($_POST['product_price'] * $_POST['quantity'], 2); ?></td>
                </tr>
            </table>
            <div class="buttons">
                <a href="billing.php?transaction_number=<?php echo uniqid(); ?>&total_purchase=<?php echo number_format($_POST['product_price'] * $_POST['quantity'], 2); ?>&product_name=<?php echo urlencode($_POST['product_name']); ?>&product_price=<?php echo $_POST['product_price']; ?>&quantity=<?php echo $_POST['quantity']; ?>"><input type="button" value="Proceed"></a>
                <a href="products.html"><input type="button" value="Select Product"></a>
            </div>
        </div>
    <hr>
    <footer class="footer">
        <p>&copy; 2004 Janny Abu-abu. All Rights Reserved</p>
    </footer>
</body>
</html>