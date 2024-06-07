<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productID = $_POST['productID'];
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $product_color = $_POST['product_color'];
    $product_material = $_POST['product_material'];
    $product_style = $_POST['product_style'];
    $product_feature1 = $_POST['product_feature1'];
    $product_feature2 = $_POST['product_feature2'];
    $product_feature3 = $_POST['product_feature3'];
    $product_price = $_POST['product_price'];

    $sql1 = "UPDATE products SET 
                product_name = '$product_name', 
                product_description = '$product_description', 
                product_price = $product_price 
            WHERE productID = $productID";

    $sql2 = "UPDATE product_details SET 
                color = '$product_color', 
                material = '$product_material', 
                style = '$product_style', 
                feature1 = '$product_feature1', 
                feature2 = '$product_feature2', 
                feature3 = '$product_feature3' 
            WHERE productID = $productID";

    if ($connection->query($sql1) === TRUE && $connection->query($sql2) === TRUE) {
        echo "Product updated successfully";
    } else {
        http_response_code(500);
        echo "Error updating product: " . $connection->error;
    }

    $connection->close();
}
?>