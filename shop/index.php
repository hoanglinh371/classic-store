<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/assets/css/index.css">
    <title>Document</title>
</head>
<body>
    <?php
        require_once '../components/header.php';
        require_once '../configs/connect.php';

        $sql_hats = "SELECT * FROM products WHERE directory_id = 1 LIMIT 5";
        $hats_collection = mysqli_query($connect, $sql_hats);

        $sql_jackets = "SELECT * FROM products WHERE directory_id = 2 LIMIT 5";
        $jackets_collection = mysqli_query($connect, $sql_jackets);

        $sql_sneakers = "SELECT * FROM products WHERE directory_id = 3 LIMIT 5";
        $sneakers_collection = mysqli_query($connect, $sql_sneakers);

        $sql_women = "SELECT * FROM products WHERE directory_id = 4 LIMIT 5";
        $women_collection = mysqli_query($connect, $sql_women);

        $sql_men = "SELECT * FROM products WHERE directory_id = 5 LIMIT 5";
        $men_collection = mysqli_query($connect, $sql_men);
    ?>
    <div class="shop-container">
        <h2>
            <a href="hat.php" class="collection-title">HATS COLLECTION</a>
        </h2>
        <div class="products-container">
            <?php foreach ($hats_collection as $item) { ?>
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

        <h2>
            <a href="jacket.php" class="collection-title">JACKETS COLLECTION</a>
        </h2>
        <div class="products-container">
            <?php foreach ($jackets_collection as $item) { ?>
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

        <h2>
            <a href="sneaker.php" class="collection-title">SNEAKERS COLLECTION</a>
        </h2>
        <div class="products-container">
            <?php foreach ($sneakers_collection as $item) { ?>
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

        <h2>
            <a href="women.php" class="collection-title">WOMEN COLLECTION</a>
        </h2>
        <div class="products-container">
            <?php foreach ($women_collection as $item) { ?>
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

        <h2>
            <a href="men.php" class="collection-title">MEN COLLECTION</a>
        </h2>
        <div class="products-container">
            <?php foreach ($men_collection as $item) { ?>
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
    </div>
    <?php mysqli_close($connect); ?>
</body>
</html>