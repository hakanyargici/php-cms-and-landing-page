<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $mail = $_POST["userMail"];

        require_once "config.php";

        $sql = "INSERT INTO userMail (mailAdress) VALUES (?)";
        $stmt = mysqli_stmt_init($connectDb);

        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $mail);
            mysqli_stmt_execute($stmt);
            echo "İşlem Gerçekleştirildi!";
            mysqli_stmt_close($stmt);
            mysqli_close($connectDb);
            header("Location: ../Main/main.php");
            exit();
        } else {
            die("Birşeyler Yanlış Gitti");
        }
    }
?>
