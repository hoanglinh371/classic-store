<?php
    require_once '../configs/connect.php';
    
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    
    session_start();
    $user_id = $_SESSION['id'];
    $cart = $_SESSION['cart'];
    $status = 0;
    $total = 0;
    foreach ($cart as $item) {
        $total += $item['quantity'] * $item['price'];
    }
    
    $sql = "INSERT INTO orders (user_id, name, phone, address, status, total)
            VALUES ('$user_id', '$name', '$phone', '$address', '$status', '$total')";
    mysqli_query($connect, $sql);
    
    $sql = "SELECT MAX(id) FROM orders WHERE user_id = '$user_id'";
    $res = mysqli_query($connect, $sql);
    $order_id = mysqli_fetch_array($res)['MAX(id)'];
    
    foreach ($cart as $product_id => $product) {
        $quantity = $product['quantity'];
        $sql = "INSERT INTO order_details (order_id, product_id, quantity)
                VALUES ('$order_id', '$product_id', '$quantity')";
        mysqli_query($connect, $sql);
    }
    
    mysqli_close($connect);
    unset($_SESSION['cart']);
    
    header('location: ../index.php');