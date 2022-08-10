<?php
    require_once '../configs/connect.php';
    
    $id = $_POST['id'];
    $name = $_POST['name'];
    $image_url = $_POST['image_url'];
    $price = $_POST['price'];
    
    $sql = "UPDATE hats
            SET name = '$name', image_url = '$image_url', price = '$price'
            WHERE id = '$id'";
    
    mysqli_query($connect, $sql);