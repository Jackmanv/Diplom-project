<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "functions/functions.php";
    $pizza = getPizza(1, $_GET["id"]);
    $title = $pizza['title'];
    require_once "blocks/head.php";
    ?>
</head>

<body>
    <div class="desktop">
        <?php require_once "blocks/header.php" ?>
        <hr class="hrheader">

        <div class="menu_bar">

            <?php
                echo '<form method="POST">
                <div class="pizzaslide">
                <img src="' . $pizza[$i]["pizza_avatar"] . '" alt="">

                <span class="zag">' . $pizza[$i]["title"] . '</span>

                <div class="pizzasize">
                    <div class="longer">
                        <div class="longwhite">
                            <div class="padd">тонкое</div>
                        </div>
                        <div class="longgray">
                            <div class="padd">традиционное</div>
                        </div>
                    </div>
                    <div class="shorter">
                        <div class="shortwhite">
                            <div class="padd">26 см.</div>
                        </div>
                        <div class="shortgray">
                            <div class="padd">30 см.</div>
                        </div>
                        <div class="shortgray2">
                            <div class="padd">40 см.</div>
                        </div>
                    </div>
                </div>
                <div class="stoimost_pizza">
                    <span class="sellname">от ' . $pizza[$i]["price"] . ' ₽</span>
                    <button class="addpizza_click" name="addproduct"> <span class="buttpadd_click"><a href="article.php">Добавить</a></span></button>
                </div>
            </div>
            </form>';
            ?>

        </div>

    </div>
    <?php require_once "blocks/footer.php" ?>
</body>

</html>