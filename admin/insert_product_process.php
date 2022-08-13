<?php
    require_once '../configs/connect.php';
    
    $directory = $_POST['directory'];
    $name = $_POST['name'];
    $image_url = $_POST['image_url'];
    $price = $_POST['price'];

    $sql = "INSERT INTO $directory (name, image_url, price) VALUES ('$name', '$image_url', '$price')";
    
    echo $directory;
    mysqli_query($connect, $sql);