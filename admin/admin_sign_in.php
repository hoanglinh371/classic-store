<?php
    require_once '../configs/connect.php';
    
    session_start();
    
    $email = $_POST['email'];
    $password = hash('sha256', $_POST['password']);
    
    $sql = "SELECT * from user
            WHERE email = '$email' AND password = '$password'";
    
    $res = mysqli_query($connect, $sql);
    $user = mysqli_fetch_array($res);
    $role = $res['role_id'];
    
    /*
     * 0 - Normal User
     * 1 - Admin
     */
    
    
    if ($role == 0) {
        $_SESSION['error'] = "non-admin";
        header("location: /pages/login.php?error=1");
    } else {
        $_SESSION['id'] = $user['id'];
        $_SESSION['display_name'] = $user['display_name'];
        header("location: /admin");
    }