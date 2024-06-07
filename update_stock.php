<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productID = $_POST['productID'];
    $additional_quantity = $_POST['additional_quantity'];

    // Validate input
    if (is_numeric($productID) && is_numeric($additional_quantity)) {
        // Fetch the current product quantity
        $sql = "SELECT product_quantity FROM products WHERE productID = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i", $productID);
        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();
        $stmt->close();

        if ($product) {
            $new_quantity = $product['product_quantity'] + $additional_quantity;

            // Update the product quantity
            $sql = "UPDATE products SET product_quantity = ? WHERE productID = ?";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("ii", $new_quantity, $productID);

            if ($stmt->execute()) {
                echo "Success";
            } else {
                http_response_code(500);
                echo "Error updating product: " . $stmt->error;
            }
            $stmt->close();
        } else {
            http_response_code(404);
            echo "Product not found";
        }
    } else {
        http_response_code(400);
        echo "Invalid input";
    }
} else {
    http_response_code(405);
    echo "Method not allowed";
}

$connection->close();
?>
