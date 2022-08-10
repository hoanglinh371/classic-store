<?php
    require_once '../configs/connect.php';
    $display_name = $_POST['display_name'];
    $email = $_POST['email'];
    $password = hash('sha256', $_POST['password']);

    $sql = "INSERT INTO users (display_name, email, password) VALUES ('$display_name', '$email', '$password')";
    mysqli_query($connect, $sql);