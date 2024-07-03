<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing Information</title>
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
                    <li><a href="login.php">Log-in</a></li>
                    <li><a href="about_us.html">Contact us</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <hr>
    <div class="form-container">
        <?php
            // Retrieve values from the URL
            $transaction_number = $_GET['transaction_number'];
            $total_purchase = $_GET['total_purchase'];
            $products = json_decode(urldecode($_GET['products']), true);
        ?>
        <div class="title">
            <h2>Billing Information</h2>
        </div>
        <form method="post" action="process_billing.php" id="billingForm">
        <table class="form-table">
        <tr>
            <th>Country</th>
        </tr>
        <tr>
            <td>Country:</td>
            <td>
                <select name="country" class="select">
                    <option value="Philippines">Philippines</option>
                    <option value="Afghanistan">Afghanistan</option>
                    <option value="Albania">Albania</option>
                    <option value="Algeria">Algeria</option>
                    <option value="Angola">Angola</option>
                    <option value="Argentina">Argentina</option>
                    <option value="Armenia">Armenia</option>
                    <option value="Australia">Australia</option>
                    <option value="Bahamas">Bahamas</option>
                    <option value="Bahrain">Bahrain</option>
                    <option value="Bangladesh">Bangladesh</option>
                    <option value="Belgium">Belgium</option>
                    <option value="Buhtan">Buhtan</option>
                    <option value="Brazil">Brazil</option>
                    <option value="Brunei">Brunei</option>
                    <option value="Cambodia">Cambodia</option>
                    <option value="Chile">Chile</option>
                    <option value="China">China</option>
                    <option value="Colombia">Colombia</option>
                    <option value="Costa Rica">Costa Rica</option>
                    <option value="Croatia">Croatia</option>
                    <option value="Cuba">Cuba</option>
                    <option value="Czechia (Czech Republic)">Czechia (Czech Republic)</option>
                    <option value="Denmark">Denmark</option>
                    <option value="Dominica">Dominica</option>
                    <option value="Dominican Republic">Dominican Republic</option>
                    <option value="Ecuador">Ecuador</option>
                    <option value="Egypt">Egypt</option>
                    <option value="El Salvado">El Salvador</option>
                    <option value="Ethiopia">Ethiopia</option>
                    <option value="Fiji">Fiji</option>
                    <option value="Finland">Finland</option>
                    <option value="France">France</option>
                    <option value="Georgia">Georgia</option>
                    <option value="Germany">Germany</option>
                    <option value="Ghana">Ghana</option>
                    <option value="Greece">Greece</option>
                    <option value="Guatemala">Guatemala</option>
                    <option value="Guinea">Guinea</option>
                    <option value="">Haiti</option>
                    <option value="Haiti">Honduras</option>
                    <option value="Hungary">Hungary</option>
                    <option value="Iceland">Iceland</option>
                    <option value="India">India</option>
                    <option value="Indonesia">Indonesia</option>
                    <option value="Iran">Iran</option>
                    <option value="Iraq">Iraq</option>
                    <option value="Ireland">Ireland</option>
                    <option value="Israel">Israel</option>
                    <option value="Italy">Italy</option>
                    <option value="Jamaica">Jamaica</option>
                    <option value="Japan">Japan</option>
                    <option value="Jordan">Jordan</option>
                    <option value="Kazakhstan">Kazakhstan</option>
                    <option value="Kenya">Kenya</option>
                    <option value="Kuwait">Kuwait</option>
                    <option value="Laos">Laos</option>
                    <option value="Latvia">Latvia</option>
                    <option value="Lebanon">Lebanon</option>
                    <option value="Liberia">Liberia</option>
                    <option value="Libya">Libya</option>
                    <option value="Madagascar">Madagascar</option>
                    <option value="Malaysia">Malaysia</option>
                    <option value="Maldives">Maldives</option>
                    <option value="Malta">Malta</option>
                    <option value="Mexico">Mexico</option>
                    <option value="Moldova">Moldova</option>
                    <option value="Mongolia">Mongolia</option>
                    <option value="Montenegro">Montenegro</option>
                    <option value="Morocco">Morocco</option>
                    <option value="Myanmar">Myanmar</option>
                    <option value="Nepal">Nepal</option>
                    <option value="Netherlands">Netherlands</option>
                    <option value="New Zealand">New Zealand</option>
                    <option value="Nicaragua">Nicaragua</option>
                    <option value="Nigeria">Nigeria</option>
                    <option value="North Korea">North Korea</option>
                    <option value="Norway">Norway</option>
                    <option value="Oman">Oman</option>
                    <option value="Pakistan">Pakistan</option>
                    <option value="Panama">Panama</option>
                    <option value="Papua New Guinea">Papua New Guinea</option>
                    <option value="Paraguay">Paraguay</option>
                    <option value="Peru">Peru</option>
                    <option value="Poland">Poland</option>
                    <option value="Portugal">Portugal</option>
                    <option value="Qatar">Qatar</option>
                    <option value="Romania">Romania</option>
                    <option value="Russia">Russia</option>
                    <option value="Saudi Arabia">Saudi Arabia</option>
                    <option value="Senegal">Senegal</option>
                    <option value="Serbia">Serbia</option>
                    <option value="Singapore">Singapore</option>
                    <option value="Slovakia">Slovakia</option>
                    <option value="Slovenia">Slovenia</option>
                    <option value="South Africa">South Africa</option>
                    <option value="South Korea">South Korea</option>
                    <option value="South Sudan">South Sudan</option>
                    <option value="Spain">Spain</option>
                    <option value="Sri Lanka">Sri Lanka</option>
                    <option value="Sudan">Sudan</option>
                    <option value="Sweden">Sweden</option>
                    <option value="Switzerland">Switzerland</option>
                    <option value="Syria">Syria</option>
                    <option value="Thailand" Thailand>Turkey</option>
                    <option value="Turkmenistan">Turkmenistan</option>
                    <option value="Uganda">Uganda</option>
                    <option value="Ukraine">Ukraine</option>
                    <option value="United Arab Emirates">United Arab Emirates</option>
                    <option value="United Kingdom">United Kingdom</option>
                    <option value="United States of America">United States of America</option>
                    <option value="Uruguay">Uruguay</option>
                    <option value="Uzbekistan">Uzbekistan</option>
                    <option value="Venezuela">Venezuela</option>
                    <option value="Vietnam">Vietnam</option>
                    <option value="Yemen">Yemen</option>
                    <option value="Zambia">Zambia</option>
                    <option value="Zimbabwes">Zimbabwe</option>
                </select>
            </td>
        </tr>
        <tr>
            <th colspan="1"><br>Card Information</th>
        </tr>
        <tr>
            <td>Transaction Number:</td>
            <td><input type="text" name="transaction_number" value="<?php echo $transaction_number; ?>" readonly dir="rtl"></td>
        </tr>
        <tr>
            <td>Total Purchase:</td>
            <td><input type="text" name="total_purchase" value="<?php echo $total_purchase; ?>" readonly dir="rtl"> </td>
        </tr>
        <tr>
            <td>First Name:</td>
            <td><input type="text" name="first-name" required></td>
        </tr>
        <tr>
            <td>Middle Name:</td>
            <td><input type="text" name="middle-name" required></td>
        </tr>
        <tr>
            <td>Last Name:</td>
            <td><input type="text" name="last-name" required></td>
        </tr>
        <tr>
            <td>Suffix:</td>
            <td>
            <select name="suffix" class="select" required>
                <option value=" ">N/A</option>
                <option value="junior">Jr.</option>
                <option value="senior">Sr.</option>
                <option value="iii">III</option>
            </select>
            </td>
        </tr>
        <tr>
            <td>Address:</td>
            <td><input type="text" name="address" required></td>
        </tr>
        <tr>
            <td>
            <strong>Card Type:</strong>
            </td>
            <td>
                <select class="select" name="card_type" size="1" required>
                <option value="Visa">Visa</option>
                <option value="Mastercard">Mastercard</option>
                <option value="American Express">&nbsp;&nbsp;American Express</option>
                <option value="Discover">Discover</option>
                <option value="JCB">JCB</option>
                <option value="BDO">BDO</option>
                <option value="BPI">BPI</option>
                <option value="Metrobank">Metrobank</option>
                <option value="RCBC">RCBC</option>
                <option value="UnionBank">UnionBank</option>
                <option value="Other">Other</option>
                </select>
            </td>
        <tr>
        <tr>
            <th colspan="1"><br>Contact Information</th>
        </tr>
        <tr>
            <td>Username:</td>
            <td><input type="name" name="username" required></td>
        </tr>
        <tr>
            <td>Email Address:</td>
            <td><input type="email" name="email" required></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="password" name="password" required></td>
        </tr>
        <tr>
            <td>Contact Number:</td>
            <td><input type="tel" name="contact-number" required></td>
        </tr>
    </table>
        <div class="buttons">
            <input type="hidden" name="transaction_number" value="<?php echo $transaction_number; ?>">
            <input type="hidden" name="total_purchase" value="<?php echo $total_purchase; ?>">
            <input type="hidden" name="products" value="<?php echo htmlspecialchars(json_encode($products)); ?>">
            <?php
                foreach ($products as $product) {
                    echo '<input type="hidden" name="product_name[]" value="'.htmlspecialchars($product['product_name']).'">';
                    echo '<input type="hidden" name="quantity[]" value="'.htmlspecialchars($product['quantity']).'">';
                    echo '<input type="hidden" name="product_price[]" value="'.htmlspecialchars($product['product_price']).'">';
                }
            ?>
            <input type="submit" value="Submit" class="styled-button" onclick="submitForm()">       
            <a href="orderform.php"><input type="button" value="Go Back"></a>
        </div>
    </div>
    <hr>
    <footer class="footer">
        <p>&copy; 2004 Janny Abu-abu. All Rights Reserved</p>
    </footer>
    <script>
        function submitForm() {
            // Submit the form using JavaScript
            document.getElementById("billingForm").submit();
            // Redirect to the success page after form submission
            window.location.href = "products.php";
        }
    </script>
</body>
</html>
