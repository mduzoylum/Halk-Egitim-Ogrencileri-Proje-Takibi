-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 02 Ara 2017, 09:46:51
-- Sunucu sürümü: 10.1.28-MariaDB
-- PHP Sürümü: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `sanayim_db`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `istatistik`
--

CREATE TABLE `istatistik` (
  `id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `goruntulenme_sayisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sahis_bilgileri`
--

CREATE TABLE `sahis_bilgileri` (
  `id` int(11) NOT NULL,
  `ad` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `soyad` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `eposta` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `tel` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `kadi` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `tur` varchar(20) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sektor_bilgileri`
--

CREATE TABLE `sektor_bilgileri` (
  `id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `ust_id` int(11) NOT NULL,
  `sektor_adi` varchar(100) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sirket_bilgileri`
--

CREATE TABLE `sirket_bilgileri` (
  `id` int(11) NOT NULL,
  `sahis_id` int(11) NOT NULL,
  `sirket_adi` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `web` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `konum` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `hakkimizda` text COLLATE utf8_turkish_ci NOT NULL,
  `logo` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sirket_sektorleri`
--

CREATE TABLE `sirket_sektorleri` (
  `id` int(11) NOT NULL,
  `sektor_id` int(11) NOT NULL,
  `sirket_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urun_bilgileri`
--

CREATE TABLE `urun_bilgileri` (
  `id` int(11) NOT NULL,
  `sirket_id` int(11) NOT NULL,
  `sahis_id` int(11) NOT NULL,
  `urun_adi` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `urun_resmi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `urun_bilgisi` text COLLATE utf8_turkish_ci NOT NULL,
  `marka` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorum_bilgileri`
--

CREATE TABLE `yorum_bilgileri` (
  `id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `sahis_id` int(11) NOT NULL,
  `ad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `soyad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `e_posta` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `yorum` text COLLATE utf8_turkish_ci NOT NULL,
  `yorum_durum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `istatistik`
--
ALTER TABLE `istatistik`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sahis_bilgileri`
--
ALTER TABLE `sahis_bilgileri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sektor_bilgileri`
--
ALTER TABLE `sektor_bilgileri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sirket_bilgileri`
--
ALTER TABLE `sirket_bilgileri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sirket_sektorleri`
--
ALTER TABLE `sirket_sektorleri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `urun_bilgileri`
--
ALTER TABLE `urun_bilgileri`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `istatistik`
--
ALTER TABLE `istatistik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `sahis_bilgileri`
--
ALTER TABLE `sahis_bilgileri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `sektor_bilgileri`
--
ALTER TABLE `sektor_bilgileri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `sirket_bilgileri`
--
ALTER TABLE `sirket_bilgileri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `sirket_sektorleri`
--
ALTER TABLE `sirket_sektorleri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `urun_bilgileri`
--
ALTER TABLE `urun_bilgileri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
