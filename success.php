<?php
session_start(); // Start the session if not already started

// Reset the session variable
unset($_SESSION['products']); // This will remove the 'products' session variable

// Alternatively, you can destroy the entire session if you don't need any other session data
// session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Status</title>
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
        <div class="search">
        </div>
        <div class="navigation">
            <nav>
                <ul>
                  <li><a href="products.php">Products</a></li>
                  <li><a href="company.html">Company</a></li>
                  <li><a href="login.php">Log-in</a></li>
                  <li><a href="about_us.html">Contact us</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <hr>
    <div class="product-container">
        <div class="success-left">
          <img class="product-image" src="Images/Icons/check.png" alt="Status Icon">
        </div>
        <div class="success-right">
          <h1>Status:</h1>
          <p>
            Ordered Successfully.
          </p>
          <p>
            Thank you for choosing our product.
          </p>
          <p>
            Delivery will be within 5 to 7 business days.
          </p>
        </div>
    </div>
    <hr>


    <footer class="footer">
        <p>&copy; 2004 Janny Abu-abu. All Rights Reserved</p>
    </footer>
    <script src="js/low_stock_alert.js"></script>
</body>
</html>
