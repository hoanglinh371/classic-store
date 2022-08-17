<?php
    session_start();
    unset($_SESSION['id']);
    unset($_SESSION['display_name']);
    unset($_SESSION['role_id']);
    
    header('location:index.php');