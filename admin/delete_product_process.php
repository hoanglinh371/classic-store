<?php
    require_once '../configs/connect.php';
    
    $id = $_POST['product_id'];
    $sql = "DELETE FROM products WHERE id = '$id'";
    mysqli_query($connect, $sql);