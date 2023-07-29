<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Предложения";
    require_once "blocks/head.php";
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#submit").click(function () {
                $("#messageShow").hide();
                var name = $("#name").val();
                var message = $("#message").val();
                var fail = "";
                if (name.length < 3) {
                    fail = "Имя не меньше 3 символов";
                } else if (message.length < 20) {
                    fail = "Сообщение должно содержать не менее 20 символов";
                }
                if (fail != "") {
                    $('#messageShow').html(fail + "<div class='clear'><br></div>");
                    $('#messageShow').show();
                    return false;
                }
            });
        });
    </script>
</head>

<body>
    <div class="desktop">
        <?php require_once "blocks/header.php" ?>
        <hr class="hrheader">
        <?php
        if (isset($_POST["submit"])) {
            require_once "functions/connect.php";
            $link = mysqli_connect($db_host, $db_user, $db_pass, $db_name); // Соединяемся с базой
            mysqli_query($link, "INSERT INTO `feedback` (`name_user`, `message`) VALUES ('{$_POST['name']}', '{$_POST['message']}')");
            header("Location: feedback.php");
            exit();
        }
        ?>
        <form method="POST">
            <div class="limiter">
                <div class="feedback_bar">
                    <div class="feedback">
                        <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
                            <input class="input100" type="text" id="name" placeholder="Имя" name="name">
                            <span class="focus-input100"></span>
                        </div>
                        <textarea name="message" id="message" placeholder="Введите сюда ваше сообщение"></textarea><br>
                        <div id="messageShow"></div>
                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button class="login100-form-btn" name="submit" id="submit">Отправить</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>


        <center>
            <div class="messagefeedback">
                <?php
                while ($row = $resultfeedback->fetch_assoc()) // получаем все строки в цикле по одной
                {
                    echo '<div class="namefeedback">' . $row['name_user'] . '</div><br>
                    <div class="comment">' . $row['message'] . '</div>
                    <hr class="hrheader">';
                }
                ?>
            </div>
        </center>


        <div class="banners">
            <?php
            require_once "functions/connect.php";
            $link = mysqli_connect($db_host, $db_user, $db_pass, $db_name); // Соединяемся с базой
            $result = mysqli_query($link, "SELECT * FROM `banners` WHERE `id` = 2");
            $user = mysqli_fetch_assoc($result);

            echo '<img src="' . $user['code'] . '" alt="">';
            ?>
        </div>


    </div>
    <?php require_once "blocks/footer.php" ?>
</body>

</html>