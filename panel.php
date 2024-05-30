<?php 
    if (isset($_POST["login"])) {
        $username = $_POST["username"];
        $userPass = $_POST["password"];
        require_once "Other/config.php";

        // Veritabanı bağlantısını kontrol etme
        if (!$connectDb) {
            die("Veritabanı bağlantısı başarısız: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM userLogin WHERE userName = '$username'";
        $result = mysqli_query($connectDb, $sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if ($user) {
            if (password_verify($userPass, $user["userPass"])) {
                header("Location: Main/main.php");
                die();
            } else {
                echo "<p style='color:red;'>Şifreniz Uyuşmuyor!</p>";
            }
        } else {
            echo "<p style='color:red;'>Kullanıcı Adı Uyuşmuyor!</p>";
        }
    }
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <?php
    // Veritabanı bağlantısı
    include_once("Other/config.php");

    // Form gönderildiğinde
    if(isset($_POST['submit'])) {
        $new_link = $_POST['youtube_link'];
        
        // Yeni linki veritabanına kaydet
        $query = "INSERT INTO ourVideo (iframeLink) VALUES ('$new_link')";
        mysqli_query($connectDb, $query);
    }
    ?>

    <!-- Admin Panel Formu -->
    <form method="post" action="">
        <label for="youtube_link">Yeni YouTube Linki:</label><br>
        <input type="text" id="youtube_link" name="youtube_link"><br>
        <input type="submit" name="submit" value="Linki Güncelle">
    </form>
</body>
</html>