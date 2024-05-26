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
    <style>
        .ca-content-wrapper {
            display: none; /* Hide by default */
        }
    </style>
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
            <input type="text" class="search-bar" placeholder="Search for product">
            <button class="search-icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>                  
            </button>
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

        $sql = "SELECT DISTINCT category FROM products";
        $result = $connection->query($sql);

        if ($result === false) {
            die("Error executing the query: " . $connection->error);
        }

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $category = $row['category'];

                // Query the main product for this category
                $sqlMainProduct = "SELECT * FROM products WHERE category = '$category' LIMIT 1";
                $resultMainProduct = $connection->query($sqlMainProduct);

                if ($resultMainProduct->num_rows > 0) {
                    $mainProduct = $resultMainProduct->fetch_assoc();
                    $mainProductName = $mainProduct['category'];
                    $mainProductImage = $mainProduct['product_image'];

                    // Display the main product in the carousel
                    echo '<div class="ca-item">';
                    echo '<div class="ca-item-main box">';
                    echo '<a class="link" href="#">';
                    echo '<img class="image" src="' . $mainProductImage . '" alt="' . $mainProductName . '">';
                    echo $mainProductName;
                    echo '</a>';
                    echo '</div>';

                    // Query all products for this category
                    $sqlProducts = "SELECT * FROM products WHERE category = '$category'";
                    $resultProducts = $connection->query($sqlProducts);

                    if ($resultProducts->num_rows > 0) {
                        // Start ca-content-wrapper here to ensure association with each main product item
                        echo '<div class="ca-content-wrapper">';
                        echo '<div class="ca-content">';
                        while ($product = $resultProducts->fetch_assoc()) {
                            $productName = $product['product_name'];
                            $productImage = $product['product_image'];

                            // Display additional products in the carousel
                            echo '<div class="box">';
                            echo '<a class="link" href="productdisplay.php?category=' . urlencode($category) . '">';
                            echo '<img class="image-inside" src="' . $productImage . '" alt="' . $productName . '">';
                            echo $productName;
                            echo '</a>';
                            echo '</div>';
                        }
                        echo '<a href="#" class="ca-close">close</a>';
                        echo '</div>'; // End ca-content-products
                        echo '</div>'; // End ca-content-wrapper
                    }
                    echo '</div>'; // Close ca-item
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

<script type="text/javascript">
    $(document).ready(function() {
    // Initialize content carousel
    $('#ca-container').contentcarousel({
        scroll: 1, // Scroll one item at a time
        circular: true, // Circular carousel
        autoplay: true, // Autoplay enabled
        autoplayInterval: 5000, // Autoplay interval in milliseconds
        easing: 'easeInOutExpo' // Easing function
    });

    // Event handler for "link" click
    $(document).on('click', '.link', function(e) {
        e.preventDefault(); // Prevent default link behavior

        // Hide all content wrappers first
        $('.ca-content-wrapper').hide();

        // Find the closest content wrapper to the clicked "link" and show it
        var $contentWrapper = $(this).closest('.ca-item').find('.ca-content-wrapper');
        $contentWrapper.show();
    });

    // Event handler for "close" link
    $(document).on('click', '.ca-close', function(e) {
        e.preventDefault(); // Prevent default link behavior
        $(this).closest('.ca-content-wrapper').hide();
    });
});
</script>
</body>
</html>
