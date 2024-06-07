<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="shortcut icon" href="Images/Icons/favicon.png" type="image/x-icon">
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="Images/Icons/logo_transparent.png" alt="logo">
        </div>
        <div class="company">
            <h1>Abu-abu Leather Works Corp. </h1>
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
            <h2>Product Sales</h2>
        </div>
        <form class="filter-form" method="POST" action="">
            <label for="date">Select Date Filter:</label>
            <select class="select" name="date" id="date" required>
                <option value="day" <?php if (isset($_POST['date']) && $_POST['date'] == 'day') echo 'selected'; ?>>Today</option>
                <option value="month" <?php if (isset($_POST['date']) && $_POST['date'] == 'month') echo 'selected'; ?>>Current Month</option>
                <option value="year" <?php if (isset($_POST['date']) && $_POST['date'] == 'year') echo 'selected'; ?>>Current Year</option>
            </select>

            <div id="specific-date" class="specific-date">
                <label for="specific_day">Select Specific Day:</label>
                <input type="date" name="specific_day" id="specific_day" value="<?php echo isset($_POST['specific_day']) ? $_POST['specific_day'] : ''; ?>">
            </div>
            <div id="specific-month" class="specific-month">
                <label for="specific_month">Select Specific Month:</label>
                <input type="month" name="specific_month" id="specific_month" value="<?php echo isset($_POST['specific_month']) ? $_POST['specific_month'] : ''; ?>">
            </div>
            <div id="specific-year" class="specific-year">
                <label for="specific_year">Select Specific Year:</label>
                <input type="number" name="specific_year" id="specific_year" min="2000" max="<?php echo date('Y'); ?>" value="<?php echo isset($_POST['specific_year']) ? $_POST['specific_year'] : date('Y'); ?>">
            </div>
            
            <input type="submit" value="Filter">
        </form>
        <table class="form-table">
            <tr>
                <th class="form-td">Product Code</th>
                <th class="form-td">Product Name</th>
                <th class="form-td">Product Sold</th>
                <th class="form-td">Sales Amount</th>
                <th class="form-td">Number of Buyer</th>
            </tr>
            <?php include 'fetch_sales.php'; ?>
        </table>
        <div class="buttons">
            <a href="adminpanel.html"><input type="button" value="Go Back"></a>
        </div>
    </div>
    <hr>
    <footer class="footer">
        <p>&copy; 2004 Janny Abu-abu. All Rights Reserved</p>
    </footer>
    <script>
        document.getElementById('date').addEventListener('change', function() {
            document.getElementById('specific-date').style.display = 'none';
            document.getElementById('specific-month').style.display = 'none';
            document.getElementById('specific-year').style.display = 'none';
            
            if (this.value === 'day') {
                document.getElementById('specific-date').style.display = 'block';
            } else if (this.value === 'month') {
                document.getElementById('specific-month').style.display = 'block';
            } else if (this.value === 'year') {
                document.getElementById('specific-year').style.display = 'block';
            }
        });

        window.onload = function() {
            const selectedValue = document.getElementById('date').value;
            if (selectedValue === 'day') {
                document.getElementById('specific-date').style.display = 'block';
            } else if (selectedValue === 'month') {
                document.getElementById('specific-month').style.display = 'block';
            } else if (selectedValue === 'year') {
                document.getElementById('specific-year').style.display = 'block';
            }
        }
    </script>
    <script src="js/low_stock_alert.js"></script>
</body>
</html>
