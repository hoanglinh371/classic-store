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
        require_once '../configs/connect.php';
        $sql = "SELECT * FROM jackets JOIN hats";
        $products = mysqli_query($connect, $sql);
    ?>
    <table border="1" width="100%">
        <tr class="">
            <th class="">#</th>
            <th class="">Name</th>
            <th class="">Price</th>
            <th class="">Image</th>
            <th colspan="2">Actions</th>
        </tr>
        <?php foreach ($products as $product) { ?>
            <tr>
                <td><?php echo $product['id'] ?></td>
                <td><?php echo $product['name'] ?></td>
                <td><?php echo $product['price'] ?></td>
                <td>
                    <img src="<?php echo $product['image_url'] ?>" alt="<?php echo $product['name'] ?>" width="120" height="140">
                </td>
                <td><a href="./edit_product.php?id=<?php echo $product['id']?>">Edit</a></td>
                <td><a href="./delete_product_process.php">Delete</a></td>
            </tr>
        <?php } ?>
    </table>

    <?php mysqli_close($connect) ?>
</body>

</html>
