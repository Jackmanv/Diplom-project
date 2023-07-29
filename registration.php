<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Регистрация";
    require_once "blocks/head.php";
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#done").click(function () {
                $("#messageShow").hide();
                var email = $("#login").val();
                var password = $("#password").val();
                var fail = "";
                if (email.split('@').length - 1 == 0 || email.split('.').length - 1 == 0) {
                    fail = "<p>Вы ввели некоректный E-mail</p>";
                }
                else if (password.length < 6) {
                    fail = "<p>Пароль должен содержать не меньше 6 символов</p>";
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
        <?
        // Страница регистрации нового пользователя
        
        // Соединямся с БД
        require_once "functions/connect.php";
        $link = mysqli_connect($db_host, $db_user, $db_pass, $db_name); // Соединяемся с базой

        if (isset($_POST['submit'])) {
            $err = [];

            // проверяем, не сущестует ли пользователя с таким именем
            $query = mysqli_query($link, "SELECT user_id FROM users WHERE user_login='" . mysqli_real_escape_string($link, $_POST['login']) . "'");
            if (mysqli_num_rows($query) > 0) {
                $err[] = "Пользователь с таким логином уже существует в базе данных";
            }

            // Если нет ошибок, то добавляем в БД нового пользователя
            if (count($err) == 0) {

                $login = $_POST['login'];

                // Убераем лишние пробелы и делаем двойное хеширование
                $password = md5(md5(trim($_POST['password'])));

                mysqli_query($link, "INSERT INTO users SET user_login='" . $login . "', user_password='" . $password . "'");
                header("Location: autorization.php");
                exit();
            }
        }
        ?>

        <form method="POST">
            <div class="limiter">
                <div class="container-login100">
                    <div class="wrap-login100">
                        <form class="login100-form validate-form">
                            <span class="login100-form-title p-b-26">
                                Регистрация
                            </span>
                            <span class="login100-form-title p-b-48">
                                <i class="zmdi zmdi-font"></i>
                            </span>

                            <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
                                <input class="input100" type="text" id="login" name="login" placeholder="Email">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="wrap-input100 validate-input" data-validate="Enter password">
                                <span class="btn-show-pass">
                                    <i class="zmdi zmdi-eye"></i>
                                </span>
                                <input class="input100" type="password" id="password" name="password" placeholder="Password">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="container-login100-form-btn">
                            <div id="messageShow"></div>
                                <div class="wrap-login100-form-btn">
                                    <div class="login100-form-bgbtn"></div>
                                    <button class="login100-form-btn" name="submit" id="done">
                                        Зарегистрироваться
                                    </button>
                                </div>
                            </div>
                        </form>

        </form>
    </div>
    </div>
    </div>
    </div>
    <?php require_once "blocks/footer.php" ?>
</body>

</html>