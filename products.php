<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="shortcut icon" href="Images/Icons/favicon.png" type="image/x-icon">
    <script src="js/jquery-3.7.1.min.js" type="text/javascript"></script>
    <script src="js/jquery.easing.1.3.js" type="text/javascript"></script>
    <script src="js/jquery.mousewheel.js" type="text/javascript"></script>
    <script src="js/jquery.contentcarousel.js" type="text/javascript"></script>
    <script src="js/product.js" type="text/javascript"></script>
</head>
<body>
<div class="header">
    <div class="logo">
        <img src="Images/Icons/logo_transparent.png" alt="logo">
    </div>
    <div class="company">
        <h1>Abu-abu Leather Works Corp.</h1>
    </div>
    <div class="search">
        <!--
        <input type="text" class="search-bar" placeholder="Search for product">
        <button class="search-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>                  
        </button>
        -->
    </div>
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
<div id="ca-container" class="ca-container">
    <div class="ca-wrapper">
    <?php
        include 'connection.php';

        $sql = "SELECT DISTINCT category_id, category_name FROM categories";
        $result = $connection->query($sql);

        if ($result === false) {
            die("Error executing the query: " . $connection->error);
        }

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $category_id = $row['category_id'];
                $category_name = $row['category_name'];

                $sqlMainProduct = "SELECT * FROM products WHERE category_id = '$category_id' LIMIT 1";
                $resultMainProduct = $connection->query($sqlMainProduct);

                if ($resultMainProduct->num_rows > 0) {
                    $mainProduct = $resultMainProduct->fetch_assoc();
                    $mainProductName = $mainProduct['product_name'];
                    $mainProductImage = $mainProduct['product_image'];

                    echo '<div class="ca-item">';
                    echo '<div class="ca-item-main box ">';
                    echo '<a class="link" href="#">';
                    echo '<img class="image " src="' . $mainProductImage . '" alt="' . $category_name . '">';
                    echo $category_name;
                    echo '</a>';
                    echo '</div>';

                    $sqlProducts = "SELECT * FROM products WHERE category_id = '$category_id'";
                    $resultProducts = $connection->query($sqlProducts);

                    if ($resultProducts->num_rows > 0) {
                        echo '<div class="ca-content-wrapper">';
                        echo '<div class="ca-content">';
                        while ($product = $resultProducts->fetch_assoc()) {
                            $productName = $product['product_name'];
                            $productImage = $product['product_image'];
                            $productId = $product['productID']; // Fetch product ID
                            
                            echo '<div class="box-content">';
                            echo '<form action="productdisplay.php" method="get">';
                            echo '<input type="hidden" name="product_id" value="' . $productId . '">';
                            echo '<button type="submit" class="link-button" >';
                            echo '<img class="image-inside" src="' . $productImage . '" alt="' . $productName . '">';
                            echo $productName;
                            echo '</button>';
                            echo '</form>';
                            echo '</div>';
                        }
                        echo '<a href="#" class="ca-close">close</a>';
                        echo '</div>';
                        echo '</div>';
                    }
                    echo '</div>';
                }
            }
        } else {
            echo "0 results";
        }
        ?>
    </div>
</div>
<footer class="footer">
    <hr>
    <p>&copy; 2004 Janny Abu-abu. All Rights Reserved</p>
</footer>
</body>
</html>
