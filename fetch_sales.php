<?php
include 'connection.php';

// Retrieve the selected date filter
$dateFilter = $_POST['date'] ?? 'day';
$specificDay = $_POST['specific_day'] ?? '';
$specificMonth = $_POST['specific_month'] ?? '';
$specificYear = $_POST['specific_year'] ?? '';
$dateCondition = '';

switch ($dateFilter) {
    case 'day':
        if (!empty($specificDay)) {
            $dateCondition = "DATE(order_date) = '$specificDay'";
        } else {
            $dateCondition = "DATE(order_date) = CURDATE()";
        }
        break;
    case 'month':
        if (!empty($specificMonth)) {
            $yearMonth = explode('-', $specificMonth);
            $year = $yearMonth[0];
            $month = $yearMonth[1];
            $dateCondition = "MONTH(order_date) = '$month' AND YEAR(order_date) = '$year'";
        } else {
            $dateCondition = "MONTH(order_date) = MONTH(CURDATE()) AND YEAR(order_date) = YEAR(CURDATE())";
        }
        break;
    case 'year':
        if (!empty($specificYear)) {
            $dateCondition = "YEAR(order_date) = '$specificYear'";
        } else {
            $dateCondition = "YEAR(order_date) = YEAR(CURDATE())";
        }
        break;
    default:
        $dateCondition = "DATE(order_date) = CURDATE()";
}

// Fetch data from the database
$sql = "SELECT 
            p.productID,
            p.product_name,
            SUM(o.quantity) AS total_products_sold,
            SUM(o.total_amount) AS total_sales_amount,
            COUNT(DISTINCT o.customerID) AS total_number_of_buyers
        FROM 
            products p
        JOIN 
            orders o ON p.productID = o.productID
        WHERE 
            $dateCondition
        GROUP BY 
            p.productID, p.product_name
        ORDER BY 
            total_products_sold DESC";

$result = $connection->query($sql);

// Check for SQL query error
if (!$result) {
    echo "<tr><td colspan='5'>Error: " . $connection->error . "</td></tr>";
    exit();
}

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td class='form-td'>" . $row["productID"] . "</td>";
        echo "<td class='form-td'>" . $row["product_name"] . "</td>";
        echo "<td class='form-td'>" . $row["total_products_sold"] . "</td>";
        echo "<td class='form-td'>" . $row["total_sales_amount"] . "</td>";
        echo "<td class='form-td'>" . $row["total_number_of_buyers"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td class='form-td' colspan='5'>No records found</td></tr>";
}

$connection->close();
?>
