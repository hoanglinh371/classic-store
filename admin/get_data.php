<?php
    require_once '../configs/connect.php';
    
    $id = $_POST['id'];
    
    $sql = "SELECT * FROM products WHERE id = '$id'";
    $res = mysqli_query($connect, $sql);
    $product = mysqli_fetch_array($res);
    
    echo json_encode($product);