<?php
    session_start();
    unset($_SESSION['id']);
    unset($_SESSION['display_name']);
    
    header('location:index.php');