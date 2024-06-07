<?php
include 'connection.php';

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Query to get products with stock less than or equal to 10
$sql = "SELECT product_name, product_quantity FROM products WHERE product_quantity <= 10";
$result = $connection->query($sql);

$low_stock_products = [];
if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $low_stock_products[] = $row;
        }
    }
    $result->free();
} else {
    // Log the error or handle it as required
    error_log("Error in query: " . $connection->error);
}

$connection->close();

header('Content-Type: application/json');
echo json_encode($low_stock_products);
?>
