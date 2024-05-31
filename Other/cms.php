<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Youtube Linki Ekleme -->
    <div class="iframe">
        <?php
            // Veritabanı bağlantısı
            include_once("config.php");

            // Youtube Link Değiştirme
            if(isset($_POST['submit'])) {
                $new_link = $_POST['youtube_link'];
                    
                $query = "INSERT INTO ourVideo (iframeLink) VALUES ('$new_link')";
                // Youtube Linki embed özelliğine sahip olmalıdır! (ilgili video'nun paylaş kısmına girip "<>" ikonuna tıklayarak çıkan linki kopyalamasın.)
                mysqli_query($connectDb, $query);

            
            }
        ?>
        <form method="post" action="">
            <label for="youtube_link">Yeni YouTube Linki:</label><br>
            <input type="text" id="youtube_link" name="youtube_link"><br>
            <input type="submit" name="submit" value="Linki Güncelle">
        </form>
    </div>
    <!-- Mail Listeleme -->
    <div class="mail">
        <?php
            // Veritabanı bağlantısı
            include_once("config.php");

            // SQL sorgusu
            $sql = "SELECT mailID, mailAdress FROM userMail";
            $result = $connectDb->query($sql);

            // Verileri HTML tablosunda görüntüleme
            if ($result->num_rows > 0) {

                echo "<table border='1'><tr><th>Mail ID</th><th>Mail Adress</th></tr>";

                // Verileri satır satır yazdırma
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["mailID"]. "</td><td>" . $row["mailAdress"]. "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "0 sonuç";
            }
        ?>
    </div>
    <!-- Ürün Listesi Ekleme & Silme -->
    <div class="product">
        <?php
            // Veritabanı bağlantısı
            include_once("config.php");

            // Ürün ekleme işlemi
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addProduct"])) {
                $productName = $_POST["productName"];
                $productPrice = $_POST["productPrice"];
                $productAbout = $_POST["productAbout"];
                
                $sql = "INSERT INTO ourProducts (productName, productPrice, productAbout) VALUES ('$productName', '$productPrice', '$productAbout')";
                
                if ($connectDb->query($sql) === TRUE) {
                    echo "New product added successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $connectDb->error;
                }
            }

            // Ürün silme işlemi
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deleteProduct"])) {
                $productID = $_POST["productID"];
                
                $sql = "DELETE FROM ourProducts WHERE productID=$productID";
                
                if ($connectDb->query($sql) === TRUE) {
                    echo "Product deleted successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $connectDb->error;
                }
            }
        ?>

        <h2>Add New Product</h2>
        <form method="post" action="">
            <label for="productName">Product Name:</label>
            <input type="text" id="productName" name="productName" required>
            <br>
            <label for="productPrice">Product Price:</label>
            <input type="text" id="productPrice" name="productPrice" required>
            <br>
            <label for="productAbout">Product About:</label>
            <textarea id="productAbout" name="productAbout" required></textarea>
            <br>
            <input type="submit" name="addProduct" value="Add Product">
        </form>

        <h2>Delete Product</h2>
        <form method="post" action="">
            <label for="productID">Product ID:</label>
            <input type="text" id="productID" name="productID" required>
            <br>
            <input type="submit" name="deleteProduct" value="Delete Product">
        </form>

        <h2>Ürünleri Listele</h2>
        <?php
            // Veritabanı bağlantısı
            include_once("config.php");

            // SQL sorgusu
            $sql = "SELECT productID, productName from ourProducts";
            $result = $connectDb->query($sql);

            // Verileri HTML tablosunda görüntüleme
            if ($result->num_rows > 0) {
                echo "<table border='1'><tr><th>Product ID</th><th>Product Name</th></tr>";

                //Verileri satır satır yazdırma
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["productID"]. "</td><td>" . $row["productName"]. "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "0 sonuç";
            }
        ?>

    </div>
</body>
</html>


