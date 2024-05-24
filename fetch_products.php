<?php
include 'connection.php';

$sql = "SELECT * FROM products";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['productID']."</td>";
        echo "<td>".$row['product_name']."</td>";
        echo "<td>".$row['product_description']."</td>";
        echo "<td>".$row['product_quantity']."</td>";
        echo "<td>&#8369;".$row['product_price']."</td>";
        echo "<td>";
        echo "<form action='update.php' method='post'>";
        echo "<input type='hidden' name='productID' value='".$row['productID']."'>";
        echo "<input type='submit' value='Update'>";
        echo "</form>";
        echo "</td>";
        echo "<td>";
        echo "<form action='add.php' method='post'>";
        echo "<input type='hidden' name='productID' value='".$row['productID']."'>";
        echo "<input type='submit' value='Add'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    // Handle case where no products are found
    echo "<tr><td colspan='6'>No products found</td></tr>";
}

$connection->close();
?>
