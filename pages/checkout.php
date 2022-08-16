<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/index.css?v=1">
    <title>Document</title>
</head>
<body>
    <?php
        require_once '../components/header.php';
        require_once '../configs/connect.php';
        $cart_items = $_SESSION['cart'] ?? [];
        $total = 0;
    ?>
    
    <div class="checkout-container">
        <div class="checkout__header">
            <div class="checkout__header-block">
                <span>Product</span>
            </div>
            <div class="checkout__header-block">
                <span>Description</span>
            </div>
            <div class="checkout__header-block">
                <span>Quantity</span>
            </div>
            <div class="checkout__header-block">
                <span>Price</span>
            </div>
            <div class="checkout__header-block">
                <span>Remove</span>
            </div>
        </div>
        <?php foreach ($cart_items as $id => $cart_item) { ?>
            <div class="cart-container">
                <div class="image-container">
                    <img src="<?php echo $cart_item['image_url'] ?>" alt="<?php echo $cart_item['name'] ?>">
                </div>
                <span class="name"><?php echo $cart_item['name'] ?></span>
                <div class="quantity">
                    <a href="./update_quantity.php?id=<?php echo $id ?>&type=dec" class="arrow">
                        <i class="fa-solid fa-angle-left"></i>
                    </a>
                    <span class="value">
                        <?php echo $cart_item['quantity'] ?>
                    </span>
                    <a href="./update_quantity.php?id=<?php echo $id ?>&type=inc" class="arrow">
                        <i class="fa-solid fa-angle-right"></i>
                    </a>
                </div>
                <span class="price">
                    <?php
                        echo '$' . $cart_item['price'];
                        $total += $cart_item['price'] * $cart_item['quantity'];
                    ?>
                </span>
                <div class="remove-btn">
                    <i class="fa-solid fa-xmark"></i>
                </div>
            </div>
        <?php } ?>
        <span class="total">Total: <?php echo '$' . $total ?></span>
        <form method="post" action="./order_process.php">
            <input type="text" name="name">
            <input type="text" name="phone">
            <input type="text" name="address">
    
            <button class="total button">Order Now</button>
        </form>
        
    </div>
</body>
</html>