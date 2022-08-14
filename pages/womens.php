<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/index.css?v=1">
    <title>Document</title>
</head>
<body>
    <?php
        require_once '../components/header.php';
        require_once '../configs/connect.php';
        $sql = "SELECT * FROM womens";
        $womens = mysqli_query($connect, $sql);
    ?>
    
    <div class="products-container">
        <?php foreach ($womens as $women) { ?>
            <div class="product-card">
                <img src="<?php echo $women['image_url']?>" alt="image" class="product-card__image">
                <div class="product-card__footer">
                    <span class="product-card__name"><?php echo $women['name'] ?></span>
                    <span class="product-card__price"><?php echo $women['price'] ?></span>
                </div>
                <button type="button" class="button inverted">Add to Cart</button>
            </div>
        <?php } ?>
    </div>
    
    <?php mysqli_close($connect) ?>
</body>
</html>