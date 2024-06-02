<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>
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
                    <li><a href="products.php">Products</a></li>
                    <li><a href="company.html">Company</a></li>
                    <li><a href="login.php">Log-in</a></li>
                    <li><a href="about_us.html">Contact us</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <hr>
    <div class="form-container">
        <div class="title">
            <h2>Order Form</h2>
        </div>
        <table class="form-table">
            <tr>
                <td class="form-td">Transaction No.:</td>
                <td class="form-td">
                    <?php echo uniqid(); ?>
                </td>
                <td class="form-td">Date:</td>
                <td colspan="3" class="form-td">
                    <?php echo date('Y-m-d'); ?>
                </td>
            </tr>
            <tr>
                <td class="form-td">Product Code:</td>
                <td class="form-td">Name:</td>
                <td class="form-td">Price:</td>
                <td class="form-td">Quantity:</td>
                <td class="form-td">Amount:</td>
                <td class="form-td">Action:</td>
            </tr>
            <?php
                session_start();

                $products = isset($_SESSION['products']) ? $_SESSION['products'] : [];

                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['productID'])) {
                    $new_product = [
                        'productID' => $_POST['productID'],
                        'product_name' => $_POST['product_name'],
                        'product_price' => $_POST['product_price'],
                        'quantity' => $_POST['quantity'],
                        'total' => $_POST['product_price'] * $_POST['quantity']
                    ];
                    $products[] = $new_product;
                    $_SESSION['products'] = $products;
                }

                $total_amount = 0;
                foreach ($products as $index => $product) {
                    $total_amount += $product['total'];
                    echo "<tr data-index='{$index}'>
                        <td class='form-td'>{$product['productID']}</td>
                        <td class='form-td'>{$product['product_name']}</td>
                        <td class='form-td'>&#8369;".number_format($product['product_price'], 2)."</td>
                        <td class='form-td'><input type='number' value='{$product['quantity']}' min='1' class='quantity-input'></td>
                        <td class='form-td'>&#8369;".number_format($product['total'], 2)."</td>
                        <td class='form-td'><button class='remove-button'>Remove</button></td>
                    </tr>";
                }
            ?>
            <tr>
                <td colspan="4" id="form-total">Total</td>
                <td class="form-total">
                    &#8369;<?php echo number_format($total_amount, 2); ?>
                </td>
            </tr>
        </table>
        <?php
        // After calculating the $total_amount and setting the products array in the session
        $encoded_products = urlencode(json_encode($products));
        ?>
        <div class="buttons">
            <a href="billing.php?transaction_number=<?php echo uniqid(); ?>&total_purchase=<?php echo number_format($total_amount, 2); ?>&products=<?php echo $encoded_products; ?>"><input type="button" value="Proceed"></a>
            <a href="products.php"><input type="button" value="Select Product"></a>
        </div>
    </div>
    <hr>
    <footer class="footer">
        <p>&copy; 2004 Janny Abu-abu. All Rights Reserved</p>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const quantityInputs = document.querySelectorAll('.quantity-input');
            const removeButtons = document.querySelectorAll('.remove-button');
            const totalAmountElement = document.querySelector('.form-total');

            function updateTotalAmount() {
                let totalAmount = 0;
                document.querySelectorAll('.form-table tr[data-index]').forEach(row => {
                    const amount = parseFloat(row.querySelector('.form-td:nth-child(5)').innerText.replace('₱', '').replace(',', ''));
                    totalAmount += amount;
                });
                totalAmountElement.innerText = '₱' + totalAmount.toFixed(2);
            }

            quantityInputs.forEach(input => {
                input.addEventListener('change', function() {
                    const row = input.closest('tr');
                    const index = row.dataset.index;
                    const productPrice = parseFloat(row.querySelector('.form-td:nth-child(3)').innerText.replace('₱', '').replace(',', ''));
                    const quantity = parseInt(input.value);
                    const amount = productPrice * quantity;
                    row.querySelector('.form-td:nth-child(5)').innerText = '₱' + amount.toFixed(2);

                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', '', true);
                    xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
                    xhr.send(JSON.stringify({ action: 'update', index: index, quantity: quantity, total: amount }));

                    xhr.onload = function() {
                        if (xhr.status == 200) {
                            updateTotalAmount();
                        }
                    };
                });
            });

            removeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const row = button.closest('tr');
                    const index = row.dataset.index;
                    row.remove();

                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', '', true);
                    xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
                    xhr.send(JSON.stringify({ action: 'remove', index: index }));

                    xhr.onload = function() {
                        if (xhr.status == 200) {
                            updateTotalAmount();
                        }
                    };
                });
            });
        });

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST['productID'])) {
            $input = json_decode(file_get_contents('php://input'), true);
            if ($input['action'] == 'update') {
                $index = $input['index'];
                $_SESSION['products'][$index]['quantity'] = $input['quantity'];
                $_SESSION['products'][$index]['total'] = $input['total'];
            } elseif ($input['action'] == 'remove') {
                $index = $input['index'];
                unset($_SESSION['products'][$index]);
                $_SESSION['products'] = array_values($_SESSION['products']);
            }
        }
        ?>
    </script>
</body>
</html>
