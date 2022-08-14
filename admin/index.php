<?php
    session_start();
    if (empty($_SESSION['id']) || $_SESSION['id'] != 1) {
        header('location:../pages/login.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Document</title>
</head>

<body>
</body>
    <ul>
        <li><a href="./insert_product_form.php">Add a Product</a></li>
        <li><a href="./view_products.php">All Product</a></li>
    </ul>
</html>
