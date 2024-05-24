<?php
include 'connection.php';

$sql = "SELECT * FROM products WHERE product_name = 'Classic Black Cow Leather Hat'";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    
    $row = $result->fetch_assoc();
    $product_id = $row["productID"];
    $product_name = $row["product_name"];
    $product_description = $row["product_description"];
    $product_quantity = $row["product_quantity"];
    $product_price = $row["product_price"];
    $product_image = $row["product_image"];
} else {
    echo "Product not found!";
}

$sql = "SELECT * FROM product_details WHERE productID = '$product_id'";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    
    $row = $result->fetch_assoc();
    $product_id = $row["productID"];
    $product_color= $row["color"];
    $product_material = $row["material"];
    $product_style = $row["style"];
    $product_feature1 = $row["feature1"];
    $product_feature2 = $row["feature2"];
    $product_feature3 = $row["feature3"];
} else {
    echo "Product not found!";
}

$connection->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Black Hat</title>
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
                  <li><a href="products.html">Products</a></li>
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
          <img class="product-image" src="<?php echo $product_image; ?>" alt="Black Hat">
        </div>
        <div class="right-section">
          <div class="top-section">
            <h3>
            <?php echo $product_name; ?>
            </h3>
            <p>
              <?php echo $product_description; ?>
            </p>
            <ul>
              <li>Color: <?php echo $product_color; ?></li>
              <li>Material: <?php echo $product_material; ?></li>
              <li>Style: <?php echo $product_style; ?></li>
              <li>Features:
                  <ul>
                      <li><?php echo $product_feature1  ?></li>
                      <li><?php echo $product_feature2  ?></li>
                      <li><?php echo $product_feature3  ?></li>
                  </ul>
              </li>
              <li>Price:  &#8369;<?php echo number_format($product_price, 2); ?></li>
              <li>Stocks: <?php echo $product_quantity; ?></li>
          </ul> 
          </div>
          <div class="bottom-section">
            <form action="orderform.php" method="POST">
              <input type="hidden" name="productID" value="<?php echo $product_id; ?>">
              <input type="hidden" name="product_name" value="<?php echo $product_name; ?>">
              <input type="hidden" name="product_description" value="<?php echo $product_description; ?>">
              <input type="hidden" name="product_quantity" value="<?php echo $product_quantity; ?>">
              <input type="hidden" name="product_price" value="<?php echo $product_price; ?>">
              Quantity: <input type="number" name="quantity" min="1" max="<?php echo $product_quantity; ?>" value="1">
              <button type="submit">Buy Now</button> <!-- Moved inside the form -->
            </form>
            <form action="hat_var.html">
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