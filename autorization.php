<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Авторизация";
    require_once "blocks/head.php";
    ?>
    <script>
        $(document).ready(function () {
            $("#done").click(function () {
                $("#messageShow").hide();
                var email = $("#login").val();
                var password = $("#password").val();
                var fail = "";
                if (email.split('@').length - 1 == 0 || email.split('.').length - 1 == 0) {
                    fail = "Вы ввели неоректный E-mail";
                }
                else if (password.length < 6) {
                    fail = "Пароль должен содержать не меньше 6 символов";
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
        // Страница авторизации
        
        // Функция для генерации случайной строки
        function generateCode($length = 6)
        {
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
            $code = "";
            $clen = strlen($chars) - 1;
            while (strlen($code) < $length) {
                $code .= $chars[mt_rand(0, $clen)];
            }
            return $code;
        }

        // Соединямся с БД
        require_once "functions/connect.php";
        $link = mysqli_connect($db_host, $db_user, $db_pass, $db_name); // Соединяемся с базой
        if (isset($_POST['submit'])) {
            // Вытаскиваем из БД запись, у которой логин равняеться введенному
            $query = mysqli_query($link, "SELECT user_id, user_password FROM users WHERE user_login='" . mysqli_real_escape_string($link, $_POST['login']) . "' LIMIT 1");
            $data = mysqli_fetch_assoc($query);
            $err = [];

            // Сравниваем пароли
            if ($data['user_password'] === md5(md5($_POST['password']))) {
                // Генерируем случайное число и шифруем его
                $hash = md5(generateCode(10));
                // Переводим IP в строку
                $insip = ", user_ip=INET_ATON('" . $_SERVER['REMOTE_ADDR'] . "')";




                // Ставим куки
                setcookie("id", $data['user_id'], time() + 60 * 60 * 24 * 30, "/");
                setcookie("hash", $hash, time() + 60 * 60 * 24 * 30, "/", null, null, true); // httponly !!!
                setcookie("login", $_POST['login']);

                // Переадресовываем браузер на страницу проверки нашего скрипта
                header("Location: check.php");
                exit();
            } else {
                $err[] = "<p>Вы ввели неправильный логин/пароль</p>";
            }
        }
        ?>

        <form method="POST">
            <div class="limiter">
                <div class="container-login100">
                    <div class="wrap-login100">
                        <form class="login100-form validate-form">
                            <span class="login100-form-title p-b-26">
                                Авторизация
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
                                <input class="input100" type="password" id="password" name="password"
                                    placeholder="Password">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="container-login100-form-btn">

                                <div id="messageShow"></div><br>

                                <div class="wrap-login100-form-btn">
                                    <div class="login100-form-bgbtn"></div>
                                    <button class="login100-form-btn" name="submit" id="done">
                                        Войти
                                    </button>
                                </div>
                            </div>

                            <div class="text-center p-t-115">
                                <span class="txt1">
                                    У вас ещё нет аккаунта?
                                </span>

                                <a class="txt2" href="registration.php">
                                    Зарегестрируйтесь
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php require_once "blocks/footer.php" ?>
</body>

</html>