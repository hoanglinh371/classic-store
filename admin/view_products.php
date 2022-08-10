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
        $sql = "SELECT * from hats";
        $hats = mysqli_query($connect, $sql);
    ?>
    <table border="1" width="100%">
        <tr class="">
            <th class="">#</th>
            <th class="">Name</th>
            <th class="">Price</th>
            <th class="">Image</th>
            <th colspan="2">Actions</th>
        </tr>
        <?php foreach ($hats as $hat) { ?>
            <tr>
                <td><?php echo $hat['id'] ?></td>
                <td><?php echo $hat['name'] ?></td>
                <td><?php echo $hat['price'] ?></td>
                <td>
                    <img src="<?php echo $hat['image_url'] ?>" alt="<?php echo $hat['name'] ?>" width="120" height="140">
                </td>
                <td><a href="./edit_product.php?id=<?php echo $hat['id']?>">Edit</a></td>
                <td><a href="./delete_product_process.php">Delete</a></td>
            </tr>
        <?php } ?>
    </table>

    <?php mysqli_close($connect) ?>
</body>

</html>
