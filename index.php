<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./assets/css/index.css?v=2">
    <title>Classic Store</title>
</head>
<body>
    <?php
        require_once './components/header.php';
        require_once './configs/connect.php';
        $sql = "SELECT * FROM directories";
        $directories = mysqli_query($connect, $sql);
    ?>

    <div class="directories-container">
        <?php foreach ($directories as $directory) { ?>
            <a href="<?php echo 'pages/' . $directory['title'] . '.php' ?>" class="directory-item">
                <div
                    class="directory-item__bg-image"
                    style="background-image: url(<?php echo $directory['image_url']?>)"
                ></div>
                <div class="directory-item__body">
                    <h2><?php echo $directory['title']?></h2>
                    <p>Shop Now</p>
                </div>
            </a>
        <?php } ?>
    </div>

    <?php mysqli_close($connect); ?>
    <script>
        function changeUrl(url) {
            location.href = `./${url}.php`
        }
    </script>
</body>
</html>

