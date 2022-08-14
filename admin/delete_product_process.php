<?php
    require_once '../configs/connect.php';
    
    $id = $_GET['id'];
    $sql = "DELETE FROM products WHERE id = '$id'";
    mysqli_query($connect, $sql);
    header('location:/admin/view_products.php');