<?php
include 'connection.php';

$customerID = $_GET['customerID'];
$sql = "SELECT customerID, CONCAT_WS(' ', first_name, second_name, third_name, middle_name, last_name, suffix) AS customer_name, contact_number, email, address, country FROM customers WHERE customerID = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param('i', $customerID);
$stmt->execute();
$result = $stmt->get_result();
$customer = $result->fetch_assoc();

$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="shortcut icon" href="Images/Icons/favicon.png" type="image/x-icon">
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="Images/Icons/logo_transparent.png" alt="logo">
        </div>
        <div class="company">
            <h1>Abu-abu Leather Works Corp.</h1>
        </div>
        <div class="search"></div>
        <div class="navigation">
            <nav>
                <ul>
                    <li><a href="products.html">Products</a></li>
                    <li><a href="company.html">Company</a></li>
                    <li><a href="about_us.html">Contact us</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <hr>
    <div class="form-container">
        <div class="title">
            <h2>Customer Details</h2>
        </div>
        <table class="form-table">
            <tr>
                <td class="form-td"><strong>Customer ID:</strong></td>
                <td class="form-td"><?php echo htmlspecialchars($customer['customerID']); ?></td>
            </tr>
            <tr>
                <td class="form-td"><strong>Customer Name:</strong></td>
                <td class="form-td"><?php echo htmlspecialchars($customer['customer_name']); ?></td>
            </tr>
            <tr>
                <td class="form-td"><strong>Contact Number:</strong></td>
                <td class="form-td"><?php echo htmlspecialchars($customer['contact_number']); ?></td>
            </tr>
            <tr>
                <td class="form-td"><strong>Email:</strong></td>
                <td class="form-td"><?php echo htmlspecialchars($customer['email']); ?></td>
            </tr>
            <tr>
                <td class="form-td"><strong>Address:</strong></td>
                <td class="form-td"><?php echo htmlspecialchars($customer['address']); ?></td>
            </tr>
            <tr>
                <td class="form-td"><strong>Country:</strong></td>
                <td class="form-td"><?php echo htmlspecialchars($customer['country']); ?></td>
            </tr>
        </table>
        <div class="buttons">
            <a href="customers.php" class="styled-button">Go Back</a>
        </div>
    </div>
    <hr>
    <footer class="footer">
        <p>&copy; 2004 Janny Abu-abu. All Rights Reserved</p>
    </footer>
</body>
</html>
