<?php
    // Veritabanı bağlantısı
    include_once("Other/config.php");

    if(isset($_POST['submit'])) {
        $new_link = $_POST['youtube_link'];
            
        $query = "INSERT INTO ourVideo (iframeLink) VALUES ('$new_link')";
        mysqli_query($connectDb, $query);
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
    <form method="post" action="">
        <label for="youtube_link">Yeni YouTube Linki:</label><br>
        <input type="text" id="youtube_link" name="youtube_link"><br>
        <input type="submit" name="submit" value="Linki Güncelle">
    </form>
</body>
</html>


