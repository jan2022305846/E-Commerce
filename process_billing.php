<?php
// Include the database configuration file
include_once 'connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $transaction_number = mysqli_real_escape_string($connection, $_POST['transaction_number']);
    $transactionDate = date('Y-m-d');
    $first_name = mysqli_real_escape_string($connection, $_POST['first-name']);
    $middle_name = mysqli_real_escape_string($connection, $_POST['middle-name']);
    $last_name = mysqli_real_escape_string($connection, $_POST['last-name']);
    $suffix = mysqli_real_escape_string($connection, $_POST['suffix']);
    $customerAddress = mysqli_real_escape_string($connection, $_POST['address']);
    $customerCountry = mysqli_real_escape_string($connection, $_POST['country']);
    $customerEmailAddress = mysqli_real_escape_string($connection, $_POST['email']);
    $customerContactNumber = mysqli_real_escape_string($connection, $_POST['contact-number']);
    
    // Insert data into customers table
    $customerInsertQuery = "INSERT INTO customers (first_name, middle_name, last_name, suffix, email, contact_number, address, country)
    VALUES ('$first_name', '$middle_name', '$last_name', '$suffix', '$customerEmailAddress', '$customerContactNumber', '$customerAddress', '$customerCountry')";
    
    if ($connection->query($customerInsertQuery) === TRUE) {
        $customerID = $connection->insert_id;

        $product_names = $_POST['product_name'];
        $quantities = $_POST['quantity'];
        $prices = $_POST['product_price'];

        foreach ($product_names as $index => $product_name) {
            $product_name = mysqli_real_escape_string($connection, $product_name);
            $quantity = (int) mysqli_real_escape_string($connection, $quantities[$index]);
            $product_price = (float) mysqli_real_escape_string($connection, $prices[$index]);
            $productTotalAmount = $product_price * $quantity;

            // Retrieve productID based on product name
            $productQuery = "SELECT productID, product_quantity FROM products WHERE product_name = '$product_name'";
            $productResult = mysqli_query($connection, $productQuery);

            if ($productResult && mysqli_num_rows($productResult) > 0) {
                $productRow = mysqli_fetch_assoc($productResult);
                $productID = $productRow['productID'];
                $currentQuantity = $productRow['product_quantity'];

                // Insert data into orders table
                $orderInsertQuery = "INSERT INTO orders (customerId, productId, quantity, total_amount, order_date)
                VALUES ($customerID, $productID, $quantity, $productTotalAmount, '$transactionDate')";

                if ($connection->query($orderInsertQuery) === TRUE) {
                    // Get the order ID of the newly inserted order
                    $orderID = $connection->insert_id;

                    // Insert data into transactions table
                    $transactionInsertQuery = "INSERT INTO transactions (transaction_number, orderId, customerId)
                    VALUES ('$transaction_number', $orderID, $customerID)";

                    if ($connection->query($transactionInsertQuery) === TRUE) {
                        // Calculate the new quantity after the transaction
                        $newQuantity = $currentQuantity - $quantity;

                        // Update the product's quantity in your database
                        $updateQuery = "UPDATE products SET product_quantity = $newQuantity WHERE productID = $productID";
                        $updateResult = mysqli_query($connection, $updateQuery);

                        if ($updateResult) {
                            // Check if all products have been processed before redirecting
                            if ($index === array_key_last($product_names)) {
                                header("Location: success.php"); // Redirect to success page
                                exit;
                            }
                        } else {
                            echo "Error updating product quantity: " . mysqli_error($connection);
                        }
                    } else {
                        echo "Error inserting data into transactions table: " . $connection->error;
                    }
                } else {
                    echo "Error inserting data into orders table: " . $connection->error;
                }
            } else {
                echo "Error: Product ID not found for product name: $product_name";
            }
        }
    } else {
        echo "Error inserting data into customers table: " . $connection->error;
    }

    // Close connection
    $connection->close();
}
?>

