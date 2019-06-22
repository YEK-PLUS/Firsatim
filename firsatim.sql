-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 22 Haz 2019, 13:05:34
-- Sunucu sürümü: 10.1.30-MariaDB
-- PHP Sürümü: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `firsatim`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `duyuru`
--

CREATE TABLE `duyuru` (
  `id` int(2) NOT NULL,
  `title` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `button_text` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `type` varchar(33) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `duyuru`
--

INSERT INTO `duyuru` (`id`, `title`, `link`, `button_text`, `image`, `type`) VALUES
(1, 'Alışverişinizi BÖY le ucuzlatın', '', '', '', 'manset');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kampanyalar`
--

CREATE TABLE `kampanyalar` (
  `id` int(4) NOT NULL,
  `market_id` int(3) NOT NULL,
  `clicked_time` int(5) NOT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `remaining_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `link` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kampanyalar`
--

INSERT INTO `kampanyalar` (`id`, `market_id`, `clicked_time`, `title`, `description`, `remaining_time`, `link`, `category`, `active`) VALUES
(1, 1, 4, 'başlık', 'getbootstrap LİNKİ', '2019-06-01 09:47:38', '9275389', 'other', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `markets`
--

CREATE TABLE `markets` (
  `id` int(2) NOT NULL,
  `name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `popular` tinyint(1) NOT NULL,
  `carousel` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `markets`
--

INSERT INTO `markets` (`id`, `name`, `img`, `link`, `popular`, `carousel`) VALUES
(1, 'N11', 'https://indirime.com/images/markalar/xn11-com.jpg.pagespeed.ic.UbBkfhA1Dv.webp', 'https://www.n11.com', 1, 1),
(2, 'gearbest', 'https://indirime.com/images/markalar/gearbest.jpg', 'http://gearbest.com', 1, 1),
(3, 'TrendYol', 'https://indirime.com/images/markalar/trendyol.jpg', 'http://google.com', 1, 0),
(4, 'Soobe', 'https://indirime.com/images/markalar/soobe.jpg', 'http://google.com', 1, 1),
(5, 'Argento', 'https://indirime.com/images/markalar/argento.jpg', 'http://google.com', 1, 1),
(6, 'Boyner', 'https://indirime.com/images/markalar/boyner.jpg', 'http://google.com', 1, 1),
(7, 'Adore', 'https://indirime.com/images/markalar/xadore-mobilya.jpg.pagespeed.ic.2nLpj-PZ8w.webp', 'http://google.com', 1, 1),
(8, 'Kaspersky', 'https://indirime.com/images/markalar/kaspersky.jpg', 'http://google.com', 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pages`
--

CREATE TABLE `pages` (
  `id` int(3) NOT NULL,
  `name` varchar(33) COLLATE utf8_turkish_ci NOT NULL,
  `type` varchar(33) COLLATE utf8_turkish_ci NOT NULL,
  `route` varchar(33) COLLATE utf8_turkish_ci NOT NULL,
  `method` varchar(33) COLLATE utf8_turkish_ci NOT NULL,
  `path` varchar(33) COLLATE utf8_turkish_ci NOT NULL,
  `extends` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `menu` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `pages`
--

INSERT INTO `pages` (`id`, `name`, `type`, `route`, `method`, `path`, `extends`, `menu`) VALUES
(1, 'home', 'page', '/', 'get,post', '/src/pages/home.php', '', 1),
(2, '404', 'page', '/404', 'get', '/src/pages/404.php', '[[\"*\",\"test\"]]', 0),
(3, 'bootstrap-css', 'css', '/css/bootstrap', 'get', '/lib/Bootstrap/css/bootstrap.css', '', 0),
(4, 'bootstrap-js', 'js', '/js/bootstrap', 'get', '/lib/Bootstrap/js/bootstrap.js', '', 0),
(5, 'market', 'page', '/market', 'get.post', '/src/pages/market.php', '[\r\n[\"*\",\"market_id\"]\r\n]', 0),
(6, 'route-market', 'page', '/kampanya', 'get.post', '/src/pages/route-kampanya.php', '[[\"i\",\"market_id\"],[\"i\",\"kampanya_id\"]]', 0),
(7, 'admin-action-select-save', 'system', '/yonetim/save', 'get.post', '/src/pages/admin.php', '[\r\n[\"*\",\"action\"]\r\n]', 0),
(8, 'admin-action-select', 'system', '/yonetim', 'get.post', '/src/pages/admin.php', '[\r\n\r\n[\"*\",\"action\"]\r\n\r\n]', 0),
(9, 'admin-main', 'system', '/yonetim', 'get.post', '/src/pages/admin.php', '', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(2) NOT NULL,
  `username` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `pass`) VALUES
(1, 'admin', 'admin123');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `duyuru`
--
ALTER TABLE `duyuru`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kampanyalar`
--
ALTER TABLE `kampanyalar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `markets`
--
ALTER TABLE `markets`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `duyuru`
--
ALTER TABLE `duyuru`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `kampanyalar`
--
ALTER TABLE `kampanyalar`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `markets`
--
ALTER TABLE `markets`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
