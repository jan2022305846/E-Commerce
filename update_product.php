<?php
include 'connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];

    // SQL to update the product
    $sql = "UPDATE products SET product_name=?, product_description=?, product_price=? WHERE productID=?";

    // Prepare the statement
    $stmt = $connection->prepare($sql);
    
    // Bind parameters
    $stmt->bind_param("ssdi", $product_name, $product_description, $product_price, $productID);
    
    // Execute the statement
    $stmt->execute();
    
    // Check if the update was successful
    if ($stmt->affected_rows > 0) {
        echo "Product updated successfully.";
    } else {
        echo "Error updating product: " . $stmt->error;
    }
    
    // Close the statement
    $stmt->close();
}

// Close the connection
$connection->close();
?>
