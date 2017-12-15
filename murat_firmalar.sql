-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 15 Ara 2017, 23:06:18
-- Sunucu sürümü: 10.1.25-MariaDB
-- PHP Sürümü: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `arama_ornek`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `firmalar`
--

CREATE TABLE `firmalar` (
  `firma_id` int(11) NOT NULL,
  `firma_adi` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `firma_adres` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `firma_sektor` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `firma_tel` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `firma_il` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `firma_ilce` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `firma_sanayi` varchar(250) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `firmalar`
--

INSERT INTO `firmalar` (`firma_id`, `firma_adi`, `firma_adres`, `firma_sektor`, `firma_tel`, `firma_il`, `firma_ilce`, `firma_sanayi`) VALUES
(1, 'Deneme Firması', 'Deneme Adresi Konya Karatay Büsan Sanayi', 'Kaynak', '123', 'Konya', 'Karatay', 'Büsan'),
(2, 'Deneme Firması1', 'Deneme adresi1 konya selçuklu zafer sanayi', 'Otomotiv', '456', 'Konya', 'Selçuklu', 'Zafer'),
(3, 'firma Adı yok', 'Konya karatay Büsan Sanayi', 'Kalıp', '789', 'Konya', 'Karatay', 'Büsan');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `firmalar`
--
ALTER TABLE `firmalar`
  ADD PRIMARY KEY (`firma_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `firmalar`
--
ALTER TABLE `firmalar`
  MODIFY `firma_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
