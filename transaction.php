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
                    <li><a href="about_us.html">Contact us</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <hr>
    <div class="form-container">
        <div class="title">
            <h2>Transactions</h2>
        </div>
        <table class="form-table">
            <tr>
                <td>Transaction Number:</td>
                <td>Date:</td>
                <td>Cust. ID:</td>
                <td>Customer Name:</td>
                <td>Ordered:</td>
                <td>Total Amount:</td>
                <td align="center">Action:</td>
            </tr>
                <?php include 'fetch_transaction.php'; ?>
        </table>
        <div class="buttons">
            <a href="adminpanel.html"><input type="button" value="Go Back"></a>
        </div>
    </div>
    <hr>
    <footer class="footer">
        <p>&copy; 2004 Janny Abu-abu. All Rights Reserved</p>
    </footer>
</body>
</html>