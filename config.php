<?php
    $hostName = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbName = "originalTrombones";
    $connectDb = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);

    if(!$connectDb){
        die("Birşeyler Yanlış Gitti");
    }
?>