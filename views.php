<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Product</title>
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
            <h2>View Products</h2>
        <div class="buttons">
            <a href="adminpanel.html"><input type="button" value="Go Back"></a>
        </div>
        </div>
        <table class="form-table">
            <!--
            <div class="search">
                <input type="text" class="search-bar" placeholder="Search for product">
                <button class="search-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>                  
                </button>
            </div>
            -->
                <tr>
                    <td class="form-td">Product Code:</td>
                    <td class="form-td">Product Name:</td>
                    <td class="form-td">Stocks:</td>
                    <td class="form-td">Price:</td> 
                    <td class="form-td" colspan="3" align="center">Action:</td>
                </tr>
                <?php include 'fetch_products.php'; ?>
        </table>
    </div>
    <hr>
    <footer class="footer">
        <p>&copy; 2004 Janny Abu-abu. All Rights Reserved</p>
    </footer>
    <script src="js/low_stock_alert.js"></script>
</body>
</html>