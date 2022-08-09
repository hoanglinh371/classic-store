<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap"
            rel="stylesheet"
        />
        <!-- Google Fonts -->
        <link rel="stylesheet" href="./assets/css/index.css">
        <title>Document</title>
    </head>
    <body>
        <?php
            require_once './header.php';
            require_once './connect.php';
            $sql = "SELECT * FROM directories";
            $directories = mysqli_query($connect, $sql);
        ?>

        <div class="directories-container">
            <?php foreach ($directories as $directory) { ?>
                <div class="directory-item-container">
                    <div
                        class="bg-image"
                        style="background-image: url(<?php echo $directory['image_url']?>)"
                    ></div>
                    <div class="body-container">
                        <h2><?php echo $directory['title']?></h2>
                        <p>Shop Now</p>
                    </div>
                </div>
            <?php } ?>
        </div>

        <?php mysqli_close($connect); ?>
    </body>
</html>
