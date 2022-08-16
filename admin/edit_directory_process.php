<?php
    require_once '../configs/connect.php';
    
    $id = $_POST['id'];
    $title = $_POST['title'];
    $image_url = $_POST['image_url'];
    
    $sql = "UPDATE directories
            SET title = '$title', image_url = '$image_url'
            WHERE id = '$id'";
    mysqli_query($connect, $sql);
    header('location:./view_directories.php');