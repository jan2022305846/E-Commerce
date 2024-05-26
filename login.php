<?php
include("connection.php");
$login_error=false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $sql = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
  $result = $connection->query($sql);

  if ($result->num_rows > 0) {
    header("Location: adminpanel.html");
    exit;
  } else {
    $login_error=true;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Log In</title>
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="shortcut icon" href="Images/Icons/favicon.png" type="image/x-icon">
    <script>
      <?php if ($login_error): ?>
        alert("Incorrect username or password. Please try again.");
      <?php endif; ?>
    </script>
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
    <hr />
    <div class="container">
      <div class="login-container">
        <div class="login-left">  
          <h1>Log In</h1>
        </div>
        <div class="login-right">
          <form action="login.php" method="POST"> 
            <label for="username">Username:</label>
            <input type="text" name="username" placeholder="Enter Username" required /> 
            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Password" required /> 
            <hr />
            <button type="submit" class="login">Login</button>
          </form>
        </div>
      </div>
      <div class="checkbox-container">
        <input type="checkbox" id="agree" name="agree" required />
        <div class="check-text">
          <label for="agree">I have read and agree to the</label>
          <a href="https://privacy.gov.ph/data-privacy-act/" target="_blank">
            R.A. 10173, also known as the Data Privacy Act of 2012 (DPA) </a
          >.
        </div>
      </div>
    </div>
    <hr />
    <div class="footer-div">
      <footer class="footer">
        <p>&copy; 2004 Janny Abu-abu. All Rights Reserved</p>
      </footer>
      <div class="footer-button">
        <a href="index.html">
          Home
        </a>
      </div>
    </div>
  </body>
</html>
