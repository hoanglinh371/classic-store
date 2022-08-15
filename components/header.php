<?php session_start(); ?>

<header class="header">
    <a href="../index.php" class="header__logo">
        <img src="../assets/images/crown.svg" alt="logo">
    </a>
    <nav class="header__nav-links">
        <?php if (!empty($_SESSION['display_name'])) { ?>
            <div class="nav-link">
                HELLO, <?php echo strtoupper($_SESSION['display_name']) ?>
            </div>
        <?php } ?>
        <a href="../pages/shop.php" class="nav-link">SHOP</a>
        <a href="../pages/contact.php" class="nav-link">CONTACT</a>
        <?php if (empty($_SESSION['id'])) { ?>
            <a href="../pages/login.php" class="nav-link">LOGIN</a>
        <?php } else { ?>
            <a href="../sign-out.php" class="nav-link">LOGOUT</a>
        <?php } ?>
        <div class="header__cart-icon">
            <img src="../assets/images/shopping-bag.svg" alt="shopping-icon">
            <span>0</span>
        </div>
    </nav>
    <div class="header__cart-dropdown">
        <div class="cart-items">
        </div>
        <a href="/pages/checkout.php" class="button">
            CHECKOUT
        </a>
    </div>
</header>

<script type="text/javascript">
    const cartIconEl = document.querySelector('.header__cart-icon');
    const cartDropdownEl = document.querySelector('.header__cart-dropdown');
    cartIconEl.addEventListener('click', () => {
        cartDropdownEl.classList.toggle('show');
    })
</script>