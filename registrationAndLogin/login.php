<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap!</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <?php 
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);

            if (isset($_POST["login"])) {
                $username = $_POST["username"];
                $userPass = $_POST["password"];
                require_once "../config.php";

                // Veritabanı bağlantısını kontrol etme
                if (!$connectDb) {
                    die("Veritabanı bağlantısı başarısız: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM userLogin WHERE userName = '$username'";
                $result = mysqli_query($connectDb, $sql);
                $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

                if ($user) {
                    if (password_verify($userPass, $user["userPass"])) {
                        header("Location: ../main.php");
                        die();
                    } else {
                        echo "<p style='color:red;'>Şifreniz Uyuşmuyor!</p>";
                    }
                } else {
                    echo "<p style='color:red;'>Kullanıcı Adı Uyuşmuyor!</p>";
                }
            }
        ?>
        <h2>Giriş Yap!</h2>
        <form action="login.php" method="post">
            <div class="input-group">
                <label for="username">Kullanıcı Adı:</label>
                <input type="text" id="username" name="username">
            </div>
            <div class="input-group">
                <label for="password">Şifre:</label>
                <input type="password" id="password" name="password">
            </div>
            <button type="submit" name="login" id="login">Giriş Yap!</button>
            <br><br>
            <button type="button" id="register">
                <a href="registration.php" style="text-decoration: none; color: white;">Kayıt Ol!</a>
            </button>
        </form>
    </div>
</body>
</html>