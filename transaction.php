<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="shortcut icon" href="Images/Icons/favicon.png" type="image/x-icon">
    <style>
        .status-btn {
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }
        .status-btn.pending {
            background-color: gray;
            color: white;
        }
        .status-btn.delivered {
            background-color: gray;
            color: white;
        }
        .status-btn.active.pending {
            background-color: green;
        }
        .status-btn.active.delivered {
            background-color: green;
        }
    </style>
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
                    <li><a href="about_us.html">Contact us</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <hr>
    <div class="form-container">
        <div class="title">
            <h2>Transactions</h2>
        <div class="buttons">
            <a href="adminpanel.html"><input type="button" value="Go Back"></a>
        </div>
        </div>
        <table class="form-table">
            <tr>
                <td class="form-td">Transaction Number:</td>
                <td class="form-td">Date:</td>
                <td class="form-td">Cust. ID:</td>
                <td class="form-td">Customer Name:</td>
                <td class="form-td">Ordered:</td>
                <td class="form-td">Total Amount:</td>
                <td class="form-td" colspan="2" align="center">Action:</td>
            </tr>
            <?php include 'fetch_transactions.php'; ?>
        </table>
    </div>
    <hr>
    <footer class="footer">
        <p>&copy; 2004 Janny Abu-abu. All Rights Reserved</p>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const buttons = document.querySelectorAll(".status-btn");
            buttons.forEach(button => {
                button.addEventListener("click", function() {
                    const status = this.classList.contains("pending") ? "pending" : "delivered";
                    const transactionID = this.getAttribute("data-transaction-id");
                    updateStatus(status, transactionID, this);
                });
            });
        });

        function updateStatus(status, transactionID, button) {
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "update_transaction_status.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        if (xhr.responseText.trim() === "Status updated successfully") {
                            const parentRow = button.closest('tr');
                            parentRow.querySelectorAll('.status-btn').forEach(btn => {
                                btn.classList.remove('active');
                                if (btn === button) {
                                    btn.classList.add('active');
                                }
                            });
                        } else {
                            alert('Failed to update status: ' + xhr.responseText);
                        }
                    } else {
                        console.error('Error with request:', xhr.statusText);
                    }
                }
            };
            xhr.send(`status=${status}&transaction_id=${transactionID}`);
        }
    </script>
    <script src="js/low_stock_alert.js"></script>
</body>
</html>
