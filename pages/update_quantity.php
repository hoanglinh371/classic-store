<?php
    session_start();
    $id = $_GET['id'];
    $type = $_GET['type'];

    if ($type === 'dec') {
        if ($_SESSION['cart'][$id]['quantity'] === 1) {
            unset($_SESSION['cart'][$id]);
        } else {
            $_SESSION['cart'][$id]['quantity']--;
        }
    } else {
        $_SESSION['cart'][$id]['quantity']++;
    }
    
    header('location:./checkout.php');