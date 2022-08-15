<?php
    session_start();
    $id = $_GET['id'];
    
    if (empty($_SESSION['cart'][$id])) {
        require_once '../configs/connect.php';
        $sql = "SELECT * FROM hats WHERE id = '$id'";
        $res = mysqli_query($connect, $sql);
        $product = mysqli_fetch_array($res);
        
        $_SESSION['cart'][$id]['name'] = $product['name'];
        $_SESSION['cart'][$id]['image_url'] = $product['image_url'];
        $_SESSION['cart'][$id]['price'] = $product['price'];
        $_SESSION['cart'][$id]['quantity'] = 1;
    } else {
        $_SESSION['cart'][$id]['quantity']++;
    }
    
    echo json_encode($_SESSION['cart']);