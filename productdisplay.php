<?php
include 'connection.php';

// Check if product_id is set in the URL
if(isset($_GET['product_id'])) {
    // Sanitize the input to prevent SQL injection
    $product_id = mysqli_real_escape_string($connection, $_GET['product_id']);

    // Fetch product details based on product_id
    $sql = "SELECT p.*, d.color, d.material, d.style, d.feature1, d.feature2, d.feature3
    FROM products p
    LEFT JOIN product_details d ON p.productID = d.productID
    WHERE p.productID = '$product_id'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        // Product found, fetch its details
        $row = $result->fetch_assoc();
        $product_name = $row["product_name"];
        $product_description = $row["product_description"];
        $product_quantity = $row["product_quantity"];
        $product_price = $row["product_price"];
        $product_image = $row["product_image"];
        $product_color = $row["color"];
        $product_material = $row["material"];
        $product_style = $row["style"];
        $product_feature1 = $row["feature1"];
        $product_feature2 = $row["feature2"];
        $product_feature3 = $row["feature3"];
    } else {
        // Product not found
        echo "Product not found!";
        exit();
    }
} else {
    // Product ID not provided
    echo "Product ID not provided!";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product_name); ?></title>
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
                    <li><a href="login.php">Log-in</a></li>
                    <li><a href="about_us.html">Contact us</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <hr>
    <div class="product-container">
        <div class="left-section">
            <img class="product-image" src="<?php echo htmlspecialchars($product_image); ?>" alt="<?php echo htmlspecialchars($product_name); ?>">
        </div>
        <div class="right-section">
            <div class="top-section">
                <h3><?php echo htmlspecialchars($product_name); ?></h3>
                <p><?php echo htmlspecialchars($product_description); ?></p>
                <ul>
                    <li>Color: <?php echo htmlspecialchars($product_color); ?></li>
                    <li>Material: <?php echo htmlspecialchars($product_material); ?></li>
                    <li>Style: <?php echo htmlspecialchars($product_style); ?></li>
                    <li>Features:
                        <ul>
                            <li><?php echo htmlspecialchars($product_feature1); ?></li>
                            <li><?php echo htmlspecialchars($product_feature2); ?></li>
                            <li><?php echo htmlspecialchars($product_feature3); ?></li>
                        </ul>
                    </li>
                    <li>Price: &#8369;<?php echo number_format($product_price, 2); ?></li>
                    <li>Stocks: <?php echo htmlspecialchars($product_quantity); ?></li>
                </ul>
            </div>
            <div class="bottom-section">
                <form action="orderform.php" method="POST">
                    <input type="hidden" name="productID" value="<?php echo htmlspecialchars($product_id); ?>">
                    <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($product_name); ?>">
                    <input type="hidden" name="product_description" value="<?php echo htmlspecialchars($product_description); ?>">
                    <input type="hidden" name="product_quantity" value="<?php echo htmlspecialchars($product_quantity); ?>">
                    <input type="hidden" name="product_price" value="<?php echo htmlspecialchars($product_price); ?>">
                    <input type="hidden" name="existing_products" value="<?php echo htmlspecialchars($_POST['existing_products'] ?? ''); ?>"> <!-- Pass existing products -->
                    Quantity: <input type="number" name="quantity" min="1" max="<?php echo htmlspecialchars($product_quantity); ?>" value="1">
                    <button type="submit">Buy Now</button>
                </form>
                <form action="products.php">
                    <button>Cancel</button>
                </form>
            </div>
        </div>
    </div>
    <hr>
    <footer class="footer">
        <p>&copy; 2004 Janny Abu-abu. All Rights Reserved</p>
    </footer>
</body>
</html>
