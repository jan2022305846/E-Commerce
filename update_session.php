<?php
session_start();

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
?>
