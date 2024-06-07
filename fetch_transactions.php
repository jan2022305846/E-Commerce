<?php
include 'connection.php';

// Fetch transactions with relevant details
$sql = "SELECT t.transactionID, t.transaction_number, o.order_date, c.customerID, 
            CONCAT(c.first_name, ' ', c.middle_name, ' ', c.last_name, ' ', c.suffix) AS customer_name, 
            o.productID, p.product_name, o.quantity AS product_quantity, p.product_price, 
            o.total_amount AS product_total_amount, t.`status`
        FROM transactions t
        INNER JOIN orders o ON t.orderID = o.orderID
        INNER JOIN customers c ON t.customerID = c.customerID
        INNER JOIN products p ON o.productID = p.productID
        ORDER BY c.customerID DESC";

$result = $connection->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pendingClass = $row['status'] == 'pending' ? 'active pending' : 'pending';
        $deliveredClass = $row['status'] == 'delivered' ? 'active delivered' : 'delivered';
        echo "<tr>";
        echo "<td class='form-td'>" . htmlspecialchars($row['transaction_number']) . "</td>";
        echo "<td class='form-td'>" . htmlspecialchars($row['order_date']) . "</td>";
        echo "<td class='form-td'>" . htmlspecialchars($row['customerID']) . "</td>";
        echo "<td class='form-td'>" . htmlspecialchars($row['customer_name']) . "</td>";
        echo "<td class='form-td'>" . htmlspecialchars($row['product_quantity']) . "</td>";
        echo "<td class='form-td'>&#8369;" . htmlspecialchars($row['product_total_amount']) . "</td>";
        echo "<td class='form-td'><button class='status-btn $pendingClass' data-transaction-id='" . htmlspecialchars($row['transactionID']) . "'>Pending</button></td>";
        echo "<td class='form-td'><button class='status-btn $deliveredClass' data-transaction-id='" . htmlspecialchars($row['transactionID']) . "'>Delivered</button></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='8' class='form-td'>No data found</td></tr>";
}

$connection->close();
?>
