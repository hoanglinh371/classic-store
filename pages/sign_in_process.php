<?php
    require_once '../configs/connect.php';
    
    $email = $_POST['email'];
    $password = hash('sha256', $_POST['password']);
    
    $sql = "SELECT * FROM users
            WHERE email = '$email' AND password = '$password'";
    $res = mysqli_query($connect, $sql);
    $is_exist_user = mysqli_num_rows($res);
    
    if ($is_exist_user == 1) {
        session_start();
        $user = mysqli_fetch_array($res);
        $_SESSION['id'] = $user['id'];
        $_SESSION['display_name'] = $user['display_name'];
        
        header('location:/admin');
        exit;
    }