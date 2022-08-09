<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        require_once '../connect.php';
        $id = $_GET['id'];
        $sql = "SELECT * from hats WHERE id = '$id'";
        $hats = mysqli_query($connect, $sql);
        $edit_hat = mysqli_fetch_array($hats);
    ?>
    <form method="post" action="./edit_product_process.php">
        <input type="hidden" name="id" value="<?php echo $edit_hat['id'] ?>" />
        Name
        <input type="text" name="name" value="<?php echo $edit_hat['name'] ?>" />
        <br />
        Image_URL
        <input type="text" name="image_url" value="<?php echo $edit_hat['image_url'] ?>" />
        <br />
        Price
        <input type="number" name="price" value="<?php echo $edit_hat['price'] ?>" />
        <br />

        <button type="submit">Edit</button>
    </form>

    <?php mysqli_close($connect) ?>
</body>
</html>