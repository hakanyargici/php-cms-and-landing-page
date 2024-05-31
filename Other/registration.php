<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	if (isset($_POST["submit"])) {
		$userName = $_POST["username"];
		$userPassword = $_POST["password"];

		$passwordHash = password_hash($userPassword, PASSWORD_DEFAULT);

		$errors = array();

		if (empty($userName) or empty($userPassword)){
			array_push($errors, "Alanlar Boş");

			if (count($errors) > 0){
				foreach ($errors as $error) {
					echo "$error";
				}
			}
		} else {
			require_once "config.php";

			if (!$connectDb) {
				die("Veritabanı bağlantısı başarısız: " . mysqli_connect_error());
			}

			$sql = "INSERT INTO userLogin (userName, userPass) VALUES (?, ?)";
			$stmt = mysqli_stmt_init($connectDb);
			$prepareStmt = mysqli_stmt_prepare($stmt, $sql);
			if ($prepareStmt) {
				mysqli_stmt_bind_param($stmt,"ss",$userName, $passwordHash);
				mysqli_stmt_execute($stmt);
				echo "Kayıt Başarılı!";
				header("Location: login.php");
			} else{
				die("Birşeyler Yanlış Gitti");
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration Page</title>
	<link rel="stylesheet" href="../Style/loginRegister.css">
</head>
<body>
	<div class="login-container">
		<img src="../content/product-landing-page-logo.png" alt="">
		<h2>Register</h2>
		<form action="registration.php" method="post">
			<div class="input-group">
				<label for="username">Username:</label>
				<input type="text" id="username" name="username">
			</div>
			<div class="input-group">
				<label for="password">Password:</label>
				<input type="password" id="password" name="password">
			</div>
			<button type="submit" name="submit" id="submit">Save it</button>
			<br><br>
			<a href="login.php">Turn login page</a>
		</form>
	</div>
</body>
</html>
