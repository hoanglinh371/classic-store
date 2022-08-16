<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/index.css">
    <title>Document</title>
</head>
<body>
    <?php
        require_once '../components/header.php';
        require_once '../configs/connect.php';
        $sql = "SELECT * FROM products WHERE directory_id = 5";
        $items = mysqli_query($connect, $sql);
    ?>
    
    <div class="products-container">
        <?php foreach ($items as $item) { ?>
            <div class="product-card">
                <img src="<?php echo $item['image_url'] ?>" alt="image" class="product-card__image">
                <div class="product-card__footer">
                    <span class="product-card__name"><?php echo $item['name'] ?></span>
                    <span class="product-card__price"><?php echo '$' . $item['price'] ?></span>
                </div>
                <a href="./add_to_cart_process.php?id=<?php echo $item['id'] ?>" class="button inverted">
                    Add to Cart
                </a>
            </div>
        <?php } ?>
    </div>
    
    <?php mysqli_close($connect) ?>
</body>
</html>