<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "DiplomPizza";
    require_once "blocks/head.php";
    $pizza = getDiscount();
    ?>
</head>

<body>
    <div class="desktop">
        <?php require_once "blocks/header.php" ?>
        <hr class="hrheader">

        <div class="menu_bar">

            <?php
            for ($i = 0; $i < count($pizza); $i++) {
                $pid = $pizza[$i]["id"];
                $ptitle = $pizza[$i]["title"];
                $pprice = $pizza[$i]["price"];
                $pavatar = $pizza[$i]["discount_avatar"];
                echo '<form method="POST">
                <div class="pizzaslide">
                <img src="' . $pizza[$i]["discount_avatar"] . '" alt="">

                <span class="zag">' . $pizza[$i]["title"] . '</span>

                
                <div class="stoimost_pizza">
                    <center>
                        <span class="sellname">' . $pizza[$i]["price"] . ' ₽</span>
                        <button class="addpizza_click" name="addproduct' . $pid . '"> <span class="buttpadd_click">Добавить</span></button>
                        </center>
                </div>
            </div>
            </form>';


                if (isset($_POST["addproduct$pid"])) {
                    require_once "functions/connect.php";
                    $link = mysqli_connect($db_host, $db_user, $db_pass, $db_name); // Соединяемся с базой
                    mysqli_query($link, "INSERT INTO `products` (`title`, `price`, `pizza_avatar`) VALUES ('{$ptitle}', '{$pprice}', '{$pavatar}')");

                }
            }
            ?>

        </div>
        <div class="banners">
            <?php
            require_once "functions/connect.php";
            $link = mysqli_connect($db_host, $db_user, $db_pass, $db_name); // Соединяемся с базой
            $result = mysqli_query($link, "SELECT * FROM `banners` WHERE `id` = 1");
            $user = mysqli_fetch_assoc($result);

            echo '<img src="' . $user['code'] . '" alt="">';
            ?>
        </div>
    </div>
    <?php require_once "blocks/footer.php" ?>
</body>

</html>