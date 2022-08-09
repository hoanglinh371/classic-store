<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
    </head>
    <body>
        <?php
            require_once 'connect.php';
            $sql = "SELECT * FROM hats";
            $hats = mysqli_query($connect, $sql);
        ?>

        <div class="hats-container">
            <?php foreach ($hats as $hat) { ?>
                <div class="product-card">
                    <img src="<?php echo $hat['image_url']?>" alt="image">
                    <div class="product-card__footer">
                        <span class="product-card__name"><?php echo $hat['name'] ?></span>
                        <span class="product-card__price"><?php echo $hat['price'] ?></span>
                    </div>
                    <button type="button">Add to Cart</button>
                </div>
            <?php } ?>
        </div>

        <?php mysqli_close($connect) ?>
    </body>
</html>