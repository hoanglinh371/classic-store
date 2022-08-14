<?php
    require_once '../configs/connect.php';
    
    $id = uniqid('p');
    $directory_id = $_POST['directory_id'];
    $name = $_POST['name'];
    $image_url = $_POST['image_url'];
    $price = $_POST['price'];
    
    $sql = "INSERT INTO products (id, directory_id, name, image_url, price)
            VALUES ('$id', '$directory_id', '$name', '$image_url', '$price')";
    
    mysqli_query($connect, $sql);
    
    header('location:./insert_product_form.php');