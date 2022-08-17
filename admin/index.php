<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../assets/css/index.css?v=3">
    <title>Document</title>
</head>

<body>
    <?php
        require_once '../components/header.php';
        require_once '../components/sidebar.php';
    
        if ($_SESSION['role_id'] != 2) {
            header('location:../pages/login.php');
            exit;
        }
    ?>
    <ul>
        <li><a href="./insert_product_form.php">Add a Product</a></li>
        <li><a href="./view_products.php">All Product</a></li>
    </ul>
</body>
</html>
