<header>
    <div id="burger">
        <div class="hamburger-menu">
            <input id="menu__toggle" type="checkbox" />
            <label class="menu__btn" for="menu__toggle">
                <span></span>
            </label>
            <ul class="menu__box">
                <li><a class="menu__item" href="index.php">Главная</a></li>
                <?php
                if (isset($_COOKIE['id'])) {

                    echo '<li><a class="menu__item" href="#">' . $_COOKIE['login'] . '</a></li>
                    <li><a class="menu__item"  href="functions/exit.php">Выход</a></li>';
                } else {
                    echo '<li><a class="menu__item"  href="autorization.php">Авторизация</a></li>
                    <li><a class="menu__item"  href="registration.php">Регистрация</a></li>';
                }
                ?>
                <li><a class="menu__item" href="discount.php">Скидки</a></li>
                <li><a class="menu__item" href="potable.php">Напитки</a></li>
                <li><a class="menu__item" href="sauce.php">Соусы</a></li>
                <li><a class="menu__item" href="feedback.php">Предложения</a></li>
            </ul>
        </div>
    </div>
    <div class="logo" href="#">
        <a href="index.php"><img src="images/logo.png" alt=""></a>
        <div class="textlogo">
            <span class="textlogo1">DIPLOM PIZZA</span><br>
            <span class="textlogo2">самая вкусная пицца во вселенной</span>
        </div>
    </div>
    <ul class="menu_bar_logo">
                <div class="menu_bar_margin"><li class="autori"><a href="index.php">Главная</a></li>
                <li class="regist"><a href="discount.php">Скидки</a></li></div>
                <div class="menu_bar_margin"><li class="autori"><a href="potable.php">Напитки</a></li>
                <li class="regist"><a href="sauce.php">Соусы</a></li></div>
                <div><li class="autori"><a href="feedback.php">Предложения</a></li></div>
            </ul>
    <div class="regcart">
        <div class="autoreg">

            <?php
            if (isset($_COOKIE['id'])) {

                echo '<div class="email">' . $_COOKIE['login'] . '</div>
                    <div class="regist"><a href="functions/exit.php">Выход</a></div>';
            } else {
                echo '<div class="autori"><a href="autorization.php">Авторизация</a></div>
                    <div class="regist"><a href="registration.php">Регистрация</a></div>';
            }
            ?>
        </div>
        <?php echo '<a href="cart.php"><button class="cart"><b>Корзина</b></button></a>'; ?>

    </div>
</header>