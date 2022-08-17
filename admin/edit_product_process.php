<?php
    require_once '../configs/connect.php';
    
    $id = $_POST['product_id'];
    $name = $_POST['product_name'];
    $category = $_POST['product_category_id'];
    $image_url = $_POST['product_image_url'];
    $price = $_POST['product_price'];
    
    $sql = "UPDATE products
            SET name = '$name', directory_id = '$category', image_url = '$image_url', price = '$price'
            WHERE id = '$id'";
    
    mysqli_query($connect, $sql);
    
    header('location:./view_products.php');