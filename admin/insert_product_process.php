<?php
    require_once '../configs/connect.php';

    $name = $_POST['name'];
    $image_url = $_POST['image_url'];
    $price = $_POST['price'];

    $sql = "INSERT INTO hats (name, image_url, price) VALUES ('$name', '$image_url', '$price')";
    mysqli_query($connect, $sql);