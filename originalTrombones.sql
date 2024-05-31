-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 29 May 2024, 20:53:35
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `originalTrombones`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ourProducts`
--

CREATE TABLE `ourProducts` (
  `productID` int(11) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `productAbout` varchar(250) NOT NULL,
  `productPrice` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ourSpecs`
--

CREATE TABLE `ourSpecs` (
  `itemID` int(11) NOT NULL,
  `itemName` varchar(50) NOT NULL,
  `itemPic` varchar(50) NOT NULL,
  `itemText` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ourVideo`
--

CREATE TABLE `ourVideo` (
  `iframeLink` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `userLogin`
--

CREATE TABLE `userLogin` (
  `userID` tinyint(4) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `userPass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `userMail`
--

CREATE TABLE `userMail` (
  `mailID` tinyint(4) NOT NULL,
  `mailAdress` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;


--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ourProducts`
--
ALTER TABLE `ourProducts`
  ADD PRIMARY KEY (`productID`);

--
-- Tablo için indeksler `ourSpecs`
--
ALTER TABLE `ourSpecs`
  ADD PRIMARY KEY (`itemID`);

--
-- Tablo için indeksler `userLogin`
--
ALTER TABLE `userLogin`
  ADD PRIMARY KEY (`userID`);

--
-- Tablo için indeksler `userMail`
--
ALTER TABLE `userMail`
  ADD PRIMARY KEY (`mailID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ourProducts`
--
ALTER TABLE `ourProducts`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `ourSpecs`
--
ALTER TABLE `ourSpecs`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `userLogin`
--
ALTER TABLE `userLogin`
  MODIFY `userID` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Tablo için AUTO_INCREMENT değeri `userMail`
--
ALTER TABLE `userMail`
  MODIFY `mailID` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
