<?php
session_start();
if (empty($_SESSION['products'])) {
    echo 'empty';
} else {
    echo 'not empty';
}
?>
