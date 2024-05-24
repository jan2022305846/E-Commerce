<?php
include 'connection.php';

$sql = "SELECT t.transaction_number, o.order_date, c.customerID, CONCAT(c.first_name, ' ', c.middle_name, ' ', c.last_name, ' ', c.suffix) AS customer_name, c.address AS customer_address, c.country AS customer_country, c.email AS customer_email_address, c.contact_number AS customer_contact_number, o.productID , p.product_name, o.quantity AS product_quantity, p.product_price, o.total_amount AS product_total_amount
        FROM transactions t
        INNER JOIN orders o ON t.orderID = o.orderID
        INNER JOIN customers c ON t.customerID = c.customerID
        INNER JOIN products p ON o.productID = p.productID
        ORDER BY c.customerID DESC";

$result = $connection->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['transaction_number']."</td>";
        echo "<td>".$row['order_date']."</td>";
        echo "<td>".$row['customerID']."</td>";
        echo "<td>".$row['customer_name']."</td>";
        echo "<td>".$row['product_quantity']."</td>";
        echo "<td>&#8369;".$row['product_total_amount']."</td>";
        echo "<td>pending</td>";
        echo "<td>deliver</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='8'>No data found</td></tr>";
}

$connection->close();
?>