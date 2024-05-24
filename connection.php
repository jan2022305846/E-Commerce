<?php
  $db_server= "localhost";
  $db_user= "root";
  $db_password= "";
  $db_name="alcweb";

  $connection=new mysqli($db_server,$db_user,$db_password,$db_name);

  if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
  }
?>