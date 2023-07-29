<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Корзина";
    require_once "blocks/head.php";
    $pizza = getCart();
    ?>
</head>

<body>
    <div class="desktop">
        <?php require_once "blocks/header.php" ?>
        <hr class="hrheader">

        <div class="price">
            <center>
                <div class="nadpis_corz">

                    <span class="corz">Корзина</span>

                </div>

                <div class="spisok_dobav">
                    <?php
                    $summa = 0;
                    $vsegotovarov = 0;
                    for ($i = 0; $i < count($pizza); $i++) {
                        $pid = $pizza[$i]["id"];
                        $ptitle = $pizza[$i]["title"];
                        $pprice = $pizza[$i]["price"];
                        $pavatar = $pizza[$i]["pizza_avatar"];
                        $summa = $summa + $pizza[$i]['price'];
                        echo '<div class="item">
                        <img src="' . $pizza[$i]['pizza_avatar'] . '" class="minipizza" alt="">
                        <div class="name_pizza_razmer">
                            <div class="namepizza">' . $pizza[$i]['title'] . '</div>
                            
                        </div>
                        <div class="kol-vo">
                            <div class="chislo2">' . $pizza[$i]['price'] . ' ₽</div>
                            <form method="POST"><button class="crest" name="deleteproduct' . $pid . '"><img src="images/Vector.png" alt=""></<button></form>
                        </div>
                    </div>';
                        $vsegotovarov = count($pizza);
                        if (isset($_POST["deleteproduct$pid"])) {
                            require_once "functions/connect.php";
                            $link = mysqli_connect($db_host, $db_user, $db_pass, $db_name); // Соединяемся с базой
                            mysqli_query($link, "DELETE FROM products WHERE id = '$pid'");
                            header("Location: cart.php");
                        }
                    }
                    ?>

                </div>
                <div class="nadpis_corz">
                    <?php echo '<div class="vsego">Всего товаров: <b>' . $vsegotovarov . ' шт.</b></div>'; ?>

                    <?php echo '<div class="summa">Сумма заказа: <b>' . $summa . ' ₽</b></div>' ?>
                </div>
                <div class="nadpis_corz">
                    <div class="nazad1"><span class="buttpadd2">Вернуться на главную</span></div>

                    <div class="oplata"><span class="buttpadd2">Оплатить сейчас</span></div>
                </div>
        </div>
        </center>
    </div>
    <?php require_once "blocks/footer.php" ?>
</body>

</html>