<?php
    require_once '../configs/connect.php';

    $product_id = uniqid('p');
    $product_category_id = $_POST['product_category_id'];
    $product_name = $_POST['product_name'];
    $product_image_url = $_POST['product_image_url'];
    $product_price = $_POST['product_price'];

    $sql = "INSERT INTO products (id, directory_id, name, image_url, price)
            VALUES ('$product_id', '$product_category_id', '$product_name', '$product_image_url', '$product_price')";

    mysqli_query($connect, $sql);
    mysqli_close($connect);