<?php
include 'connection.php';

$sql = "SELECT * FROM products
        ORDER BY productID DESC";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td class='form-td'>".$row['productID']."</td>";
        echo "<td class='form-td'>".$row['product_name']."</td>";
        echo "<td class='form-td'>".$row['product_quantity']."</td>";
        echo "<td class='form-td'>&#8369;".$row['product_price']."</td>";
        echo "<td class='form-td'>";
        echo "<form action='update.php' method='get'>";
        echo "<input type='hidden' name='productID' value='".$row['productID']."'>";
        echo "<input type='submit' value='Update'>";
        echo "</form>";
        echo "</td>";
        echo "<td class='form-td'>";
        echo "<form action='add.php' method='get'>";
        echo "<input type='hidden' name='productID' value='".$row['productID']."'>";
        echo "<input type='submit' value='Add Stock'>";
        echo "</form>";
        echo "</td>";
        echo "<td class='form-td'>";
        echo "<form action='add_product.php' method='get'>";
        echo "<input type='hidden' name='productID' value='".$row['productID']."'>";
        echo "<input type='submit' value='Add New Product'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>No products found</td></tr>";
}

$connection->close();
?>
