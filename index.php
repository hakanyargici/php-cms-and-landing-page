<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Yusuf Hakan Yargıcı">
	<title>Product Landing Page</title>
	<link rel="stylesheet" type="text/css" href="Style/mainPage.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
	<header>
		<div class="navbar"> 
			<div id="banner">
				<img src="content/product-landing-page-logo.png" alt="banner">
			</div>
			<div id="list">
				<nav>
					<ul>
						<li class="menu-elements">
							<a href="#one">Features</a>
						</li>
						<li class="menu-elements">
							<a href="#two">How It Works</a>
						</li>
						<li class="menu-elements">
							<a href="#three">Pricing</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
	<section class="mainContent">
		<!--Form / Mail Bilgisi Alma-->
		<article id="contactMail">
			<form action="Other/mail.php" method="post">
				<div id="mails">
					<label id="label-email" for="mail">Handcrafted, home-made masterpieces</label>
					<input type="email" id="mailBox" name="userMail" required placeholder="Enter Your Email">
					<input type="submit" id="submit-button" value="GET STARTED">
				</div>
			</form>
		</article>
		<!--Features / Sayfa Hakkında-->
		<article id="one" class="scroll-target"> 
			<div id="features">
				<div id="pre-materials" class="featuresSpec">
					<figure>
						<img src="content/local_fire_department_FILL0_wght400_GRAD0_opsz48.png" alt="materails">
					</figure>
					<span>
						<h1>
							Premium Materails
						</h1>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius veniam sequi labore. Dignissimos id velit facilis cupiditate hic reprehenderit magni recusandae consequatur architecto modi at numquam ea possimus dolores, incidunt illum saepe. Rerum, fugit nulla.
						</p>
					</span>
				</div>
				<div id="fast-shiping" class="featuresSpec">
					<figure>
					<img src="content/local_shipping_FILL0_wght400_GRAD0_opsz48.png" alt="materails">
					</figure>
					<span>
						<h1>
							Fast Shiping
						</h1>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius veniam sequi labore. Dignissimos id velit facilis cupiditate hic reprehenderit magni recusandae consequatur architecto modi at numquam ea possimus dolores, incidunt illum saepe. Rerum, fugit nulla.
						</p>
					</span>
				</div>
				<div id="qua-assurance" class="featuresSpec">
					<figure>
						<img src="content/battery_charging_50_FILL0_wght400_GRAD0_opsz48.png" alt="materails">
					</figure>
					<span>
						<h1>
							Quality Assurance
						</h1>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius veniam sequi labore. Dignissimos id velit facilis cupiditate hic reprehenderit magni recusandae consequatur architecto modi at numquam ea possimus dolores, incidunt illum saepe. Rerum, fugit nulla.
						</p>
					</span>
				</div>
			</div>
		</article>
		<!--How It Works / Youtube-->
		<article id="two" class="scroll-target">
			<div id="howItWorks">
				<?php
					error_reporting(E_ALL);
					ini_set('display_errors', 1);
					include_once("Other/config.php");
					// Veritabanı bağlantısını kontrol etme
					if (!$connectDb) {
						die("Veritabanı bağlantısı başarısız: " . mysqli_connect_error());
					}
					$query = "SELECT iframeLink FROM ourVideo ORDER BY id DESC LIMIT 1";
					$result = mysqli_query($connectDb, $query);
					$row = mysqli_fetch_array($result);
					$youtube_link = $row['iframeLink'];
				?>

				<iframe src="<?php echo $youtube_link; ?>" title="YouTube video player" frameborder="0"
				allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

			</div>
		</article>
		<!--Pricing / Ürünler Ve Fiyat Bilgisi-->
		<article id="three" class="scroll-target">
			<?php
				error_reporting(E_ALL);
				ini_set('display_errors', 1);
				include_once("Other/config.php");

				// Veritabanı bağlantısını kontrol etme
				if (!$connectDb) {
					die("Veritabanı bağlantısı başarısız: " . mysqli_connect_error());
				}
				// Ürünleri seç
				$sql = "SELECT productName, productPrice, productAbout FROM ourProducts";
				$result = $connectDb->query($sql);

				if ($result->num_rows > 0) {
					// Her ürün için bir kutu oluştur
					while($row = $result->fetch_assoc()) {
						echo '<div class="box">';
						echo '<h1>' . $row["productName"] . '</h1>';
						echo '<h3>$' . $row["productPrice"] . '</h3>';
						echo '<p>' . $row["productAbout"] . '</p>';
						echo '<button>Select</button>';
						echo '</div>';
					}
				} else {
					echo "No products found";
				}
			?>
		</article>
	</section>
	<footer id="copyright">
		<div class="footer-bar">
			<p>Copyright 2016, Original Trombones</p>
			<p>
				<a href="Other/login.php">Login For Worker</a>
			</p>
		</div>
	</footer>
</body>
</html>