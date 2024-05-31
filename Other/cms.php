<?php
    // Veritabanı bağlantısı
    include_once("Other/config.php");

    // Youtube Link Değiştirme
    if(isset($_POST['submit'])) {
        $new_link = $_POST['youtube_link'];
            
        $query = "INSERT INTO ourVideo (iframeLink) VALUES ('$new_link')";
        // Youtube Linki embed özelliğine sahip olmalıdır! (ilgili video'nun paylaş kısmına girip "<>" ikonuna tıklayarak çıkan linki kopyalamasın.)
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

    <table>
    <tr>
        <th>Mail ID</th>
        <th>Mail Adresi</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        // Her bir satırı döngüyle tablonun içine ekleyin
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["mailID"]. "</td><td>" . $row["mailAdress"]. "</td></tr>";
        }
    } else {
        echo "<tr><td colspan='2'>Hiçbir kayıt bulunamadı!</td></tr>";
    }
    $connectDb->close();
    ?>
</table>

</body>
</html>


