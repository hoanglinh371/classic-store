<?php
    require_once '../configs/connect.php';
    $display_name = $_POST['display_name'];
    $email = $_POST['email'];
    $password = hash('sha256', $_POST['password']);

    $sql = "INSERT INTO users (display_name, email, password) VALUES ('$display_name', '$email', '$password')";
    mysqli_query($connect, $sql);
    
    $sql = "SELECT id from users WHERE email = '$email'";
    $res = mysqli_query($connect, $sql);
    $id = mysqli_fetch_array($res)['id'];
    session_start();
    $_SESSION['id'] = $id;
    $_SESSION['display_name'] = $display_name;