<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
	<link rel="stylesheet" type="text/css" href="../Style/cms.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    
</head>
<body>
    <header>
		<div class="navbar"> 
			<div id="banner">
				<img src="../content/product-landing-page-logo.png" alt="banner">
			</div>
			<div id="list">
				<nav>
					<ul>
						<li class="menu-elements">
                            <a href="#iframe-section">iframe</a>
                        </li>
						<li class="menu-elements">
                            <a href="#mail-section">mail</a>
                        </li>
						<li class="menu-elements">
                            <a href="#product-section">product</a>
                        </li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
    <div class="main-content">
        <!--Kullanıcı Karşılama-->
        <div class="user-welcome">
            <?php
                session_start();

                // Kullanıcının oturum açıp açmadığını kontrol edin
                if (!isset($_SESSION['username'])) {
                    header("Location: login.php");
                    exit;
                }

                // Oturumdan kullanıcı adını al
                $username = $_SESSION['username'];
            ?>
            <h2 class="user-info">
                Welcome, 
                <?php
                    echo "$username";
                ?>!
            </h2>
        </div>
        <hr>
        <br>
        <!-- Youtube Linki Ekleme -->
        <div id="iframe-section" class="iframe">
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
                <label for="youtube_link">New Youtube Video:</label>
                <input type="text" id="youtube_link" name="youtube_link">
                <input type="submit" name="submit" value="Linki Güncelle">
            </form>
        </div>
        <hr>
        <!-- Mail Listeleme -->
        <div id="mail-section" class="mail">
            <label for="userMail">Customer Mail Adress</label>
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
        <hr>
        <!-- Ürün Listesi Ekleme & Silme -->
        <div id="product-section" class="product">
            <h2>Product & ID</h2>
            <br>
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

            <br>
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
                        header("Location: ".$_SERVER['PHP_SELF']);
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
                        header("Location: ".$_SERVER['PHP_SELF']);
                        echo "New product added successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . $connectDb->error;
                    }

                }
            ?>

            <form method="post" action="">
                <label for="productName">Add Product Name:</label>
                <input type="text" id="productName" name="productName" required>
                <label for="productPrice">Add Product Price:</label>
                <input type="text" id="productPrice" name="productPrice" required>
                <label for="productAbout">Add Product About:</label>
                <textarea id="productAbout" name="productAbout" required></textarea>
                <input type="submit" name="addProduct" value="Add Product">
            </form>
            <form method="post" action="">
                <label for="productID">Delete Product ID:</label>
                <input type="text" id="productID" name="productID" required>
                <input type="submit" name="deleteProduct" value="Delete Product">
            </form>
            <hr><br>
        </div>
    </div>
    <footer id="copyright">
		<div class="footer-bar">
			<p>Copyright 2016, Original Trombones</p>
			<p>
				<a href="../index.php">Turn Back Main Page</a>
			</p>
		</div>
	</footer>
</body>
</html>