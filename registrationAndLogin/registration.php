<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Ol</title>
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
                $sql = "INSERT INTO userLogin (userName, userPass) VALUES (?, ?)";
                $stmt = mysqli_stmt_init($connectDb);
                $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                if ($prepareStmt) {
                    mysqli_stmt_bind_param($stmt,"ss",$userName, $userPassword);
                    mysqli_stmt_execute($stmt);
                    echo "Giriş Başarılı";
                } else{
                    die("Birşeyler Yanlış Gitti");
                }
            }
        }
        ?>
        <h2>Kayıt Ol!</h2>
        <form action="index.php" method="post">
            <div class="input-group">
                <label for="username">Kullanıcı Adı:</label>
                <input type="text" id="username" name="username">
            </div>
            <div class="input-group">
                <label for="password">Şifre:</label>
                <input type="password" id="password" name="password">
            </div>
            <button type="submit" name="submit" id="submit">Kayıt Ol!</button>
        </form>
    </div>
</body>
</html>
