<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sayfası</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        if (isset($_POST["submit"])) {
            $userName = $_POST["username"];
            $userPassword = $_POST["password"];
            $errors = array();

            if (empty($userName) or empty($userPassword)){
                array_push($errors, "Alanlar Boş");
            if (count($errors) > 0){
                foreach ($errors as $error) {
                    echo "$error";
                }
            }
            } else {
                require_once "../config.php";
            }
        }
        ?>
        <h2>Giriş Yap</h2>
        <form action="index.php" method="post">
            <div class="input-group">
                <label for="username">Kullanıcı Adı:</label>
                <input type="text" id="username" name="username">
            </div>
            <div class="input-group">
                <label for="password">Şifre:</label>
                <input type="password" id="password" name="password">
            </div>
            <button type="submit" name="submit" id="submit">Giriş Yap</button>
        </form>
    </div>
</body>
</html>
