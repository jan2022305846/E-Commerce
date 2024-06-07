<?php
include 'connection.php';

// Query to get all customers and concatenate their names
$sql = "SELECT customerID, CONCAT_WS(' ', first_name, middle_name, last_name, suffix) AS customer_name, contact_number FROM customers";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td class='form-td' >" . $row['customerID'] . "</td>";
        echo "<td class='form-td' >" . $row['customer_name'] . "</td>";
        echo "<td class='form-td' >" . $row['contact_number'] . "</td>";
        echo "<td class='form-td' style='width: 50%;'>";
        echo "<form action='customer_details.php' method='get'>";
        echo "<input type='hidden' name='customerID' value='" . $row['customerID'] . "'>";
        echo "<input type='submit' value='View Details'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>No Records Found</td></tr>";
}

$connection->close();
?>
