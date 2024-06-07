<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $status = $_POST['status'];
    $transactionID = $_POST['transaction_id'];

    // Prepare the SQL statement to update the status
    $sql = "UPDATE transactions SET `status` = ? WHERE transactionID = ?";
    $stmt = $connection->prepare($sql);
    if (!$stmt) {
        echo "Error preparing statement: " . $connection->error;
        exit;
    }

    // Bind parameters (assuming transactionID is an integer)
    $stmt->bind_param('si', $status, $transactionID);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Status updated successfully";
    } else {
        echo "Error updating status: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $connection->close();
    exit;
}
?>
