<?php
session_start();

// Function to calculate total amount
function calculateTotalAmount($cart) {
    $total = 0;
    foreach ($cart as $product) {
        $total += $product['product_price'] * $product['quantity'];
    }
    return $total;
}

// Check if the cart is already in the session, if not, initialize it
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Add the product to the cart
$productID = $_POST['productID'];
$product_name = $_POST['product_name'];
$product_description = $_POST['product_description'];
$product_quantity = $_POST['product_quantity'];
$product_price = $_POST['product_price'];
$quantity = $_POST['quantity'];

$new_product = array(
    'productID' => $productID,
    'product_name' => $product_name,
    'product_description' => $product_description,
    'product_quantity' => $product_quantity,
    'product_price' => $product_price,
    'quantity' => $quantity
);

$_SESSION['cart'][] = $new_product;

// Redirect to the order form page
header("Location: orderform.php");
exit();
?>
