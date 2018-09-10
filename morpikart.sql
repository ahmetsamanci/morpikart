-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 07 Eyl 2018, 13:51:58
-- Sunucu sürümü: 5.7.23
-- PHP Sürümü: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `rodosbil_demo`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_id` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `admin_password` text COLLATE utf8_unicode_ci NOT NULL,
  `admin_name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `admin_auth` int(11) NOT NULL,
  `admin_mail` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `admin_unit` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `admin_referance` int(11) NOT NULL,
  `admin_avatar` text COLLATE utf8_unicode_ci NOT NULL,
  `admin_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`id`, `admin_id`, `admin_password`, `admin_name`, `admin_auth`, `admin_mail`, `admin_unit`, `admin_referance`, `admin_avatar`, `admin_created`) VALUES
(100, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Proje Yöneticisi', 10, 'info@rodos.com', '0', 0, '8200-bay.png', '2018-07-03 10:42:57'),
(101, 'deryaozalit', 'c2b5cbe7669809ac68d9d48fdc5dc3f5', 'Derya Ozalit', 0, '', '0', 0, '8200-bay.png', '2018-08-16 13:18:03');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blockip`
--

CREATE TABLE `blockip` (
  `id` int(11) NOT NULL,
  `block_ip` varchar(200) NOT NULL,
  `block_owner` varchar(200) NOT NULL,
  `block_created` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `blockip`
--

INSERT INTO `blockip` (`id`, `block_ip`, `block_owner`, `block_created`) VALUES
(1, '88.247.41.88', 'admin', 'system');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `cart_ip` varchar(300) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `cart_user` varchar(300) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `cart_product` int(11) NOT NULL,
  `cart_product_size` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `cart_piece` float NOT NULL DEFAULT '0',
  `cart_total` float NOT NULL,
  `cart_lang` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `cart_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `cart`
--

INSERT INTO `cart` (`id`, `cart_ip`, `cart_user`, `cart_product`, `cart_product_size`, `cart_piece`, `cart_total`, `cart_lang`, `cart_date`) VALUES
(48, '88.247.41.88', 'Visitor', 20, 'Üç Parça Tablo (3-20X40)', 97, 97, 'tr', '2018-09-06 11:18:12');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categori_title` varchar(300) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `categori_image` text CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `categori_description` varchar(500) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `categori_title_en` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `categori_description_en` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `categori_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `categori_title`, `categori_image`, `categori_description`, `categori_title_en`, `categori_description_en`, `categori_date`) VALUES
(1, 'Araba ve Motosiklet', 'category_cars.jpg', 'Araba ve motosikletler her yaşta ki insanın şüphesiz büyük hayalleridir! Hayallerinizi önce duvarınız da taşımaya ne dersiniz?', 'Cars and Motorcycles', 'Cars and motorcycles of all ages are undoubtedly big dreams! What do you think about moving your dreams on your wall first?', '2018-08-16 11:52:30'),
(2, 'Graffiti', 'category_graffiti.jpg', 'Graffiti\'nin tuvali değişti! Artık duvarlara değil kanvas tablolarda yer alacak. Evinizde ve iş yerinizde kullanabileceğiniz graffiti tabloları herkesi etkileyecek!', 'Graffiti', 'The graffiti canvas has changed! It will now be on canvas tables, not walls. The graffiti tables you can use at home and at work will all impact!', '2018-08-16 11:56:48'),
(3, 'Hayvanlar', 'category_animals.jpg', 'Acaba odanız da evcil bir arkadaş için yeriniz var mı? Kanvas tablolar en yırtıcı ev en şirin arkadaşlar için en güzel yuva olmalı!', 'Animals', 'Do you have room for a pet friend? Canvas plates are the most beautiful home for the most charming friends in the predatory house!', '2018-08-16 11:59:03'),
(4, 'Manzara', 'category_places.jpg', 'Etkileyici manzaralar için yorulmanıza gerek yok! Mekan değiştirmek yerine artık tablolar sayesinde en etkileyici manzaraları duvarınız da taşıyabilirsiniz!', 'Scene', 'You do not have to be tired of impressive landscapes! Instead of changing places, you can now move your wall with the most impressive views thanks to the tables!', '2018-08-16 12:01:35'),
(5, 'Sanat', 'category_art.jpg', 'Matematiğin ve felsefenin buluştuğu nokta kanvas tabloları! Efsaneler ve kahramanlar için hemen evinde bir duvar seçmelisin!', 'Art', 'The point of mathematics and philosophy is the canvas paintings! For your legends and heroes you should immediately choose a wall at home!', '2018-08-16 12:05:51'),
(6, 'Uzay', 'category_space.jpg', 'Sen dışarıdayken uzaylılar odanda olacak! En güvenli ev arkadaşları olmalılar muhtemelen..', 'Space', 'The aliens will be in the room while you\'re out! They are probably the safest roommates.', '2018-08-16 12:09:36'),
(7, 'Ülke ve Şehir', 'category_country.jpg', 'Hayallerini süsleyen şehirler ve ülkeler için en güzel seyahat planı! Kanvas tablolarla bir adım atmak seni çok mutlu edecek!', 'Country and City', 'The most beautiful travel plan for cities and countries that embellish their dreams! Taking a step with canvas charts will make you very happy!', '2018-08-16 12:15:01');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `chart`
--

CREATE TABLE `chart` (
  `id` int(11) NOT NULL,
  `chart_title` text COLLATE utf8_unicode_ci NOT NULL,
  `chart_title_en` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `chart_value` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `chart_total` float NOT NULL,
  `chart_id` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `chart_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `chart`
--

INSERT INTO `chart` (`id`, `chart_title`, `chart_title_en`, `chart_value`, `chart_total`, `chart_id`, `chart_created_at`) VALUES
(1, 'Tek Parça Tablo', 'One Piece Table', '(24x16)', 70, 'totalSolo', '2018-08-28 14:44:31'),
(2, 'Tek Parça Tablo', 'One Piece Table', '(36x24)', 69, 'totalSolo', '2018-08-28 14:44:31'),
(3, 'Tek Parça Tablo', 'One Piece Table', '(30x20)', 127, 'totalSolo', '2018-08-28 14:44:31'),
(4, 'Tek Parça Tablo', 'One Piece Table', '(40x27)', 84, 'totalSolo', '2018-08-28 14:44:31'),
(5, 'Tek Parça Tablo', 'One Piece Table', '(40x30)', 280, 'totalSolo', '2018-08-28 14:44:31'),
(6, 'Üç Parça Tablo', 'Three Parts Table', '(3-14X28)', 71, 'totalThree', '2018-08-28 14:44:31'),
(7, 'Üç Parça Tablo', 'Three Parts Table', '(3-16X32)', 76, 'totalThree', '2018-08-28 14:44:31'),
(8, 'Üç Parça Tablo', 'Three Parts Table', '(3-18X36)', 62, 'totalThree', '2018-08-28 14:44:31'),
(9, 'Üç Parça Tablo', 'Three Parts Table', '(3-20X40)', 97, 'totalThree', '2018-08-28 14:44:31'),
(10, 'Üç Parça Tablo', 'Three Parts Table', '(3-24X48)', 167, 'totalThree', '2018-08-28 14:44:31'),
(11, 'Yatay Tek Parça Tablo', 'Horizontal One Piece Table', '(30x20)', 145, 'totalFrame', '2018-08-28 14:44:31'),
(12, 'Yatay Tek Parça Tablo', 'Horizontal One Piece Table', '(36x24)', 170, 'totalFrame', '2018-08-28 14:44:31'),
(13, 'Yatay Tek Parça Tablo', 'Horizontal One Piece Table', '(40x30)', 186, 'totalFrame', '2018-08-28 14:44:31'),
(14, 'Yatay Tek Parça Tablo', 'Horizontal One Piece Table', '(50x36)', 117, 'totalFrame', '2018-08-28 14:44:31'),
(15, 'Yatay Tek Parça Tablo', 'Horizontal One Piece Table', '(60x44)', 98, 'totalFrame', '2018-08-28 14:44:31'),
(16, 'Beş Parça Tablo', 'Five Parts Table', '(5-10x24)', 159, 'totalFive', '2018-08-28 14:44:31'),
(17, 'Beş Parça Tablo', 'Five Parts Table', '(5-12X32)', 79, 'totalFive', '2018-08-28 14:44:31'),
(18, 'Beş Parça Tablo', 'Five Parts Table', '(5-16X40)', 89, 'totalFive', '2018-08-28 14:44:31'),
(19, 'Üç Geniş Parça Tablo', 'Three Wide Parts Table', '(3-16x24)', 112, 'totalWideThree', '2018-08-28 14:44:31'),
(20, 'Üç Geniş Parça Tablo', 'Three Wide Parts Table', '(3-20x30)', 104, 'totalWideThree', '2018-08-28 14:44:31'),
(21, 'Üç Geniş Parça Tablo', 'Three Wide Parts Table', '(3-24x36)', 136, 'totalWideThree', '2018-08-28 14:44:31'),
(22, 'Üç Geniş Parça Tablo', 'Three Wide Parts Table', '(3-27x40)', 167, 'totalWideThree', '2018-08-28 14:44:31'),
(23, 'Üç Kare Parça Tablo', 'Three Wide Parts Table', '(3-16x16)', 53, 'totalSquareThree', '2018-08-28 14:44:31'),
(24, 'Üç Kare Parça Tablo', 'Three Wide Parts Table', '(3-20x20)', 168, 'totalSquareThree', '2018-08-28 14:44:31'),
(25, 'Üç Kare Parça Tablo', 'Three Wide Parts Table', '(3-24x24)', 86, 'totalSquareThree', '2018-08-28 14:44:31'),
(26, 'Üç Kare Parça Tablo', 'Three Wide Parts Table', '(3-30x30)', 149, 'totalSquareThree', '2018-08-28 14:44:31'),
(27, 'Tek Dikey Parça Tablo', 'Single Vertical Part Table', '(16X24)', 84, 'totalVertical', '2018-08-28 14:44:31'),
(28, 'Tek Dikey Parça Tablo', 'Single Vertical Part Table', '(20X30)', 62, 'totalVertical', '2018-08-28 14:44:31'),
(29, 'Tek Dikey Parça Tablo', 'Single Vertical Part Table', '(24X36)', 188, 'totalVertical', '2018-08-28 14:44:31'),
(30, 'Tek Dikey Parça Tablo', 'Single Vertical Part Table', '(30X40)', 185, 'totalVertical', '2018-08-28 14:44:31'),
(31, 'Tek Dikey Parça Tablo', 'Single Vertical Part Table', '(31X47)', 86, 'totalVertical', '2018-08-28 14:44:31'),
(32, 'Altı Kare Parça Tablo', 'Six Square Parts Table', '(6-12x12)', 68, 'totalSix', '2018-08-28 14:44:31'),
(33, 'Altı Kare Parça Tablo', 'Six Square Parts Table', '(6-16x16)', 66, 'totalSix', '2018-08-28 14:44:31'),
(34, 'Altı Kare Parça Tablo', 'Six Square Parts Table', '(6-20x20)', 115, 'totalSix', '2018-08-28 14:44:31'),
(35, 'Altı Kare Parça Tablo', 'Six Square Parts Table', '(6-24x24)', 99, 'totalSix', '2018-08-28 14:44:31'),
(36, 'Altı Kare Parça Tablo', 'Six Square Parts Table', '(6-30x30)', 119, 'totalSix', '2018-08-28 14:44:31'),
(37, 'Sıralı Beş Parça Tablo', 'Sequential Five Piece Table', '(60x34)', 109, 'totalInLineFive', '2018-08-28 14:44:31'),
(38, 'Sıralı Beş Parça Tablo', 'Sequential Five Piece Table', '(70x40)', 153, 'totalInLineFive', '2018-08-28 14:44:31'),
(39, 'Sekiz Parça Tablo', 'Eight Parts Table', '(8-10x24)', 150, 'totalEight', '2018-08-28 14:44:31'),
(40, 'Sekiz Parça Tablo', 'Eight Parts Table', '(8-12X32)', 168, 'totalEight', '2018-08-28 14:44:31'),
(41, 'Sekiz Parça Tablo', 'Eight Parts Table', '(8-16x40)', 66, 'totalEight', '2018-08-28 14:44:31'),
(42, 'İki Parçalı Tablo', 'Two Piece Table', '(2-16x24)', 196, 'totalTwo', '2018-08-28 14:44:31'),
(43, 'İki Parçalı Tablo', 'Two Piece Table', '(2-20X30)', 142, 'totalTwo', '2018-08-28 14:44:31'),
(44, 'İki Parçalı Tablo', 'Two Piece Table', '(2-24X36)', 93, 'totalTwo', '2018-08-28 14:44:31'),
(45, 'İki Parçalı Tablo', 'Two Piece Table', '(2-30X40)', 153, 'totalTwo', '2018-08-28 14:44:31'),
(46, 'İki Parçalı Tablo', 'Two Piece Table', '(2-31X47)', 166, 'totalTwo', '2018-08-28 14:44:31'),
(47, 'İki Parçalı Tablo', 'Two Piece Table', '(2-32x16)', 103, 'totalTwo', '2018-08-28 14:44:31'),
(48, 'İki Parçalı Tablo', 'Two Piece Table', '(2-40x20)', 140, 'totalTwo', '2018-08-28 14:44:31'),
(49, 'İki Parçalı Tablo', 'Two Piece Table', '(2-48X24)', 130, 'totalTwo', '2018-08-28 14:44:31'),
(50, 'İki Parçalı Tablo', 'Two Piece Table', '(2-60x30)', 130, 'totalTwo', '2018-08-28 14:44:31');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `contact_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `contact_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `contact_message` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_view` int(11) NOT NULL DEFAULT '0',
  `contact_ip` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `contact`
--

INSERT INTO `contact` (`id`, `contact_name`, `contact_email`, `contact_phone`, `contact_message`, `contact_view`, `contact_ip`, `contact_date`) VALUES
(1, 'sda', 'sdasd', 'asd', 'asdsadasd', 1, 'asd', '2018-09-06 09:12:29');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `customer_mail` varchar(150) NOT NULL,
  `customer_password` varchar(100) NOT NULL,
  `customer_service` int(11) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `customer_company` varchar(150) NOT NULL,
  `customer_statu` int(11) NOT NULL DEFAULT '0',
  `customer_ip` varchar(20) NOT NULL,
  `customer_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `log_url` text COLLATE utf8_unicode_ci NOT NULL,
  `log_backurl` text COLLATE utf8_unicode_ci NOT NULL,
  `log_ip` text COLLATE utf8_unicode_ci NOT NULL,
  `log_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `log`
--

INSERT INTO `log` (`id`, `log_url`, `log_backurl`, `log_ip`, `log_date`) VALUES
(1, '/demo/work-1/login.php', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-04 14:04:25'),
(2, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/login.php', '88.247.41.88', '2018-09-04 14:04:30'),
(3, '/demo/work-1/product.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-04 14:04:31'),
(4, '/demo/work-1/about.php', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-04 14:04:32'),
(5, '/demo/work-1/contact.php', 'http://rodosbilisim.com/demo/work-1/about.php', '88.247.41.88', '2018-09-04 14:04:34'),
(6, '/demo/work-1/login.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-04 14:04:40'),
(7, '/demo/work-1/product.php', 'http://rodosbilisim.com/demo/work-1/login.php', '88.247.41.88', '2018-09-04 14:04:42'),
(8, '/demo/work-1/login.php', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-04 14:04:43'),
(9, '/demo/work-1/product.php', 'http://rodosbilisim.com/demo/work-1/login.php', '88.247.41.88', '2018-09-04 14:04:46'),
(10, '/demo/work-1/product-detail.php?product=16', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-04 14:04:48'),
(11, '/demo/work-1/product.php', 'http://rodosbilisim.com/demo/work-1/product-detail.php?product=16', '88.247.41.88', '2018-09-04 14:05:11'),
(12, '/demo/work-1/product-detail.php?product=18', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-04 14:05:15'),
(13, '/demo/work-1/product-detail.php?product=18', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-04 14:11:36'),
(14, '/demo/work-1/about.php', 'http://rodosbilisim.com/demo/work-1/product-detail.php?product=18', '88.247.41.88', '2018-09-04 14:11:49'),
(15, '/demo/work-1/product-detail.php?product=18', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-04 14:12:04'),
(16, '/demo/work-1/product-detail.php?product=18', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-04 14:12:27'),
(17, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/product-detail.php?product=18', '88.247.41.88', '2018-09-04 14:13:21'),
(18, '/demo/work-1/product.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-04 14:13:22'),
(19, '/demo/work-1/product-detail.php?product=16', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-04 14:13:24'),
(20, '/demo/work-1/product-detail.php?product=16', 'outside', '88.247.41.88', '2018-09-04 14:13:33'),
(21, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/product-detail.php?product=16', '88.247.41.88', '2018-09-04 14:13:36'),
(22, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-04 14:13:40'),
(23, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-04 14:17:37'),
(24, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-04 14:17:49'),
(25, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-04 14:18:24'),
(26, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-04 14:19:01'),
(27, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-04 14:19:33'),
(28, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-04 14:19:35'),
(29, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-04 14:19:37'),
(30, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-04 14:19:55'),
(31, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-04 14:20:07'),
(32, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-04 14:20:08'),
(33, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-04 14:20:15'),
(34, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-04 14:20:27'),
(35, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-04 14:20:41'),
(36, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-04 14:20:42'),
(37, '/demo/work-1/login.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-04 14:20:53'),
(38, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-04 14:20:55'),
(39, '/demo/work-1/login.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-04 14:21:04'),
(40, '/demo/work-1/login.php', 'http://rodosbilisim.com/demo/work-1/login.php', '88.247.41.88', '2018-09-04 14:21:08'),
(41, '/demo/work-1/login.php', 'http://rodosbilisim.com/demo/work-1/login.php', '88.247.41.88', '2018-09-04 14:21:10'),
(42, '/demo/work-1/login.php', 'http://rodosbilisim.com/demo/work-1/login.php', '88.247.41.88', '2018-09-04 14:21:14'),
(43, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/login.php', '88.247.41.88', '2018-09-04 14:21:14'),
(44, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-04 14:21:17'),
(45, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-04 14:21:20'),
(46, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-04 14:24:57'),
(47, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-04 14:24:59'),
(48, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-04 14:25:08'),
(49, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-04 14:25:19'),
(50, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-04 14:27:52'),
(51, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-04 14:27:56'),
(52, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-04 14:34:16'),
(53, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-04 14:34:18'),
(54, '/demo/work-1/profile.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-04 14:50:09'),
(55, '/demo/work-1/', 'outside', '88.247.41.88', '2018-09-04 14:59:53'),
(56, '/demo/work-1/profile.php', 'http://rodosbilisim.com/demo/work-1/', '88.247.41.88', '2018-09-04 14:59:56'),
(57, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/profile.php', '88.247.41.88', '2018-09-04 15:00:02'),
(58, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-04 15:00:05'),
(59, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-04 15:00:32'),
(60, '/demo/work-1/profile.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-04 15:00:37'),
(61, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-04 15:00:58'),
(62, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-04 15:01:31'),
(63, '/demo/work-1/profile.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-04 15:02:19'),
(64, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-04 15:02:20'),
(65, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-04 15:02:35'),
(66, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-04 15:04:31'),
(67, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-04 15:05:01'),
(68, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-04 15:05:46'),
(69, '/demo/work-1/contact.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-04 15:06:15'),
(70, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-04 15:06:16'),
(71, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-04 15:15:33'),
(72, '/demo/work-1/profile.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-04 15:15:35'),
(73, '/demo/work-1/profile.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-04 15:16:38'),
(74, '/demo/work-1/profile.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-04 15:17:51'),
(75, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-04 15:18:07'),
(76, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-04 15:18:30'),
(77, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-04 15:18:39'),
(78, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-04 15:18:49'),
(79, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-04 15:18:55'),
(80, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-04 15:19:01'),
(81, '/demo/work-1/profile.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-04 15:19:07'),
(82, '/demo/work-1/profile.php', 'http://rodosbilisim.com/demo/work-1/profile.php', '88.247.41.88', '2018-09-04 15:19:10'),
(83, '/demo/work-1/logout.php', 'http://rodosbilisim.com/demo/work-1/profile.php', '88.247.41.88', '2018-09-04 15:19:16'),
(84, '/demo/work-1/login.php', 'http://rodosbilisim.com/demo/work-1/logout.php', '88.247.41.88', '2018-09-04 15:19:16'),
(85, '/demo/work-1/login.php', 'http://rodosbilisim.com/demo/work-1/login.php', '88.247.41.88', '2018-09-04 15:19:18'),
(86, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/login.php', '88.247.41.88', '2018-09-04 15:19:23'),
(87, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-04 15:19:24'),
(88, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-04 15:19:26'),
(89, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-04 15:21:12'),
(90, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-04 15:21:13'),
(91, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-04 15:21:15'),
(92, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-04 15:21:23'),
(93, '/demo/work-1/', 'outside', '88.247.41.88', '2018-09-05 06:05:38'),
(94, '/demo/work-1/', 'outside', '88.247.41.88', '2018-09-05 08:50:42'),
(95, '/demo/work-1/product-detail.php?product=15', 'http://rodosbilisim.com/demo/work-1/', '88.247.41.88', '2018-09-05 08:50:46'),
(96, '/demo/work-1/product.php', 'http://rodosbilisim.com/demo/work-1/product-detail.php?product=15', '88.247.41.88', '2018-09-05 08:50:49'),
(97, '/demo/work-1/product-detail.php?product=18', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-05 08:50:52'),
(98, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 08:51:28'),
(99, '/demo/work-1/login.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 08:51:33'),
(100, '/demo/work-1/login.php', 'http://rodosbilisim.com/demo/work-1/login.php', '88.247.41.88', '2018-09-05 08:51:40'),
(101, '/demo/work-1/login.php', 'http://rodosbilisim.com/demo/work-1/login.php', '88.247.41.88', '2018-09-05 08:51:44'),
(102, '/demo/work-1/login.php', 'http://rodosbilisim.com/demo/work-1/login.php', '88.247.41.88', '2018-09-05 08:51:49'),
(103, '/demo/work-1/login.php', 'http://rodosbilisim.com/demo/work-1/login.php', '88.247.41.88', '2018-09-05 08:53:01'),
(104, '/demo/work-1/login.php', 'outside', '88.247.41.88', '2018-09-05 08:53:36'),
(105, '/demo/work-1/login.php', 'http://rodosbilisim.com/demo/work-1/login.php', '88.247.41.88', '2018-09-05 08:53:40'),
(106, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/login.php', '88.247.41.88', '2018-09-05 08:53:40'),
(107, '/demo/work-1/profile.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 08:53:42'),
(108, '/demo/work-1/orders.php', 'http://rodosbilisim.com/demo/work-1/profile.php', '88.247.41.88', '2018-09-05 08:53:44'),
(109, '/demo/work-1/profile.php', 'http://rodosbilisim.com/demo/work-1/orders.php', '88.247.41.88', '2018-09-05 08:53:51'),
(110, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/profile.php', '88.247.41.88', '2018-09-05 08:53:56'),
(111, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/profile.php', '88.247.41.88', '2018-09-05 08:55:28'),
(112, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 08:55:31'),
(113, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 08:56:28'),
(114, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 08:56:54'),
(115, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 08:56:55'),
(116, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 08:57:11'),
(117, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 08:57:16'),
(118, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 08:57:19'),
(119, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 08:57:22'),
(120, '/demo/work-1/contact.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 08:59:00'),
(121, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 08:59:37'),
(122, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 08:59:42'),
(123, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 08:59:43'),
(124, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 08:59:44'),
(125, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 08:59:48'),
(126, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 08:59:58'),
(127, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 09:00:10'),
(128, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 09:00:12'),
(129, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 09:00:14'),
(130, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 09:00:55'),
(131, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 09:01:13'),
(132, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 09:01:14'),
(133, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 09:01:35'),
(134, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 09:01:37'),
(135, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 09:03:22'),
(136, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 09:06:01'),
(137, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 09:06:03'),
(138, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 09:06:05'),
(139, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 09:06:10'),
(140, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 09:06:13'),
(141, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 09:06:29'),
(142, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 09:07:12'),
(143, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 09:07:37'),
(144, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 09:07:38'),
(145, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 09:07:59'),
(146, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 09:08:00'),
(147, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 09:08:06'),
(148, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 09:08:07'),
(149, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 09:08:27'),
(150, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 09:08:29'),
(151, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 09:08:33'),
(152, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 09:08:38'),
(153, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 09:08:39'),
(154, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 09:09:02'),
(155, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 09:09:19'),
(156, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 09:09:49'),
(157, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 09:09:50'),
(158, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 09:09:51'),
(159, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 09:09:56'),
(160, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 09:09:56'),
(161, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 09:10:26'),
(162, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 09:10:27'),
(163, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 09:10:30'),
(164, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 09:10:31'),
(165, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 09:11:59'),
(166, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 09:12:01'),
(167, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 09:12:02'),
(168, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-05 09:12:13'),
(169, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-05 09:12:15'),
(170, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-05 09:12:22'),
(171, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-05 09:12:35'),
(172, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-05 09:12:36'),
(173, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-05 09:13:19'),
(174, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-05 09:13:20'),
(175, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-05 09:13:53'),
(176, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-05 09:13:54'),
(177, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-05 09:13:55'),
(178, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-05 09:15:23'),
(179, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-05 09:15:24'),
(180, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-05 09:15:38'),
(181, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-05 09:15:39'),
(182, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-05 09:15:40'),
(183, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-05 09:16:18'),
(184, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-05 09:16:20'),
(185, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-05 09:16:45'),
(186, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-05 09:16:46'),
(187, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-05 09:16:47'),
(188, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-05 09:16:58'),
(189, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-05 09:16:59'),
(190, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-05 09:17:33'),
(191, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-05 09:17:35'),
(192, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 09:18:17'),
(193, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 09:18:17'),
(194, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 09:18:39'),
(195, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 09:18:53'),
(196, '/demo/work-1/product-detail.php?product=18', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-05 09:25:00'),
(197, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 09:26:54'),
(198, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 09:26:54'),
(199, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 09:26:55'),
(200, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 09:27:20'),
(201, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 09:27:22'),
(202, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 09:27:23'),
(203, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 09:27:35'),
(204, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 09:27:39'),
(205, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 09:27:40'),
(206, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 09:27:44'),
(207, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 09:27:50'),
(208, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 09:27:56'),
(209, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 09:28:00'),
(210, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 09:28:19'),
(211, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 09:28:27'),
(212, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 09:28:28'),
(213, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 09:28:34'),
(214, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 09:28:41'),
(215, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 09:28:43'),
(216, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 09:28:46'),
(217, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 09:28:49'),
(218, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 09:30:51'),
(219, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-05 09:31:09'),
(220, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-05 09:31:24'),
(221, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-05 09:31:27'),
(222, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-05 09:31:37'),
(223, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-05 09:31:51'),
(224, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-05 09:31:54'),
(225, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-05 09:31:56'),
(226, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-05 09:32:01'),
(227, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-05 09:32:04'),
(228, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-05 09:32:14'),
(229, '/demo/work-1/contact.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 09:32:33'),
(230, '/demo/work-1/', 'outside', '88.247.41.88', '2018-09-05 11:06:10'),
(231, '/demo/work-1/', 'http://rodosbilisim.com/demo/work-1/', '88.247.41.88', '2018-09-05 11:06:31'),
(232, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/', '88.247.41.88', '2018-09-05 11:06:32'),
(233, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 11:06:37'),
(234, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 11:06:38'),
(235, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-05 11:27:36'),
(236, '/demo/work-1/contact.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 11:40:14'),
(237, '/demo/work-1/login.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-05 11:40:19'),
(238, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/login.php', '88.247.41.88', '2018-09-05 11:40:49'),
(239, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/login.php', '88.247.41.88', '2018-09-05 11:42:47'),
(240, '/demo/work-1/login.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 11:43:47'),
(241, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/login.php', '88.247.41.88', '2018-09-05 11:43:49'),
(242, '/demo/work-1/login.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 11:43:59'),
(243, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/login.php', '88.247.41.88', '2018-09-05 11:44:01'),
(244, '/demo/work-1/product.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 11:44:04'),
(245, '/demo/work-1/product-detail.php?product=16', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-05 11:44:09'),
(246, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/product-detail.php?product=16', '88.247.41.88', '2018-09-05 11:44:17'),
(247, '/demo/work-1/login.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 11:44:30'),
(248, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/login.php', '88.247.41.88', '2018-09-05 11:44:31'),
(249, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 11:44:50'),
(250, '/demo/work-1/login.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 11:45:02'),
(251, '/demo/work-1/login.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 11:45:07'),
(252, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 11:45:56'),
(253, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 11:45:56'),
(254, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 11:46:08'),
(255, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 11:46:08'),
(256, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 11:46:10'),
(257, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 11:50:16'),
(258, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 11:53:44'),
(259, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 11:55:51'),
(260, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 11:55:52'),
(261, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 11:55:53'),
(262, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 11:55:54'),
(263, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 11:56:00'),
(264, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 11:57:08'),
(265, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 11:57:08'),
(266, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 11:57:11'),
(267, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 11:57:12'),
(268, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 11:57:33'),
(269, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 11:57:35'),
(270, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 11:57:38'),
(271, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 11:57:38'),
(272, '/demo/work-1/product.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 11:58:16'),
(273, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-05 11:58:18'),
(274, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 11:58:29'),
(275, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 11:58:31'),
(276, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 11:58:33'),
(277, '/demo/work-1/cart.php?dp=24', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 11:59:18'),
(278, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/cart.php?dp=24', '88.247.41.88', '2018-09-05 11:59:18'),
(279, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 11:59:20'),
(280, '/demo/work-1/product.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 11:59:22'),
(281, '/demo/work-1/product-detail.php?product=17', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-05 11:59:25'),
(282, '/demo/work-1/product-detail.php?product=17', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-05 11:59:35'),
(283, '/demo/work-1/product.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 11:59:37'),
(284, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/product-detail.php?product=17', '88.247.41.88', '2018-09-05 11:59:54'),
(285, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 11:59:57'),
(286, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 12:01:16'),
(287, '/demo/work-1/login.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 12:01:28'),
(288, '/demo/work-1/login.php', 'http://rodosbilisim.com/demo/work-1/login.php', '88.247.41.88', '2018-09-05 12:01:32'),
(289, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/login.php', '88.247.41.88', '2018-09-05 12:01:32'),
(290, '/demo/work-1/profile.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 12:01:48'),
(291, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/profile.php', '88.247.41.88', '2018-09-05 12:02:16'),
(292, '/demo/work-1/logout.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 12:02:47'),
(293, '/demo/work-1/login.php', 'http://rodosbilisim.com/demo/work-1/logout.php', '88.247.41.88', '2018-09-05 12:02:47'),
(294, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 12:02:51'),
(295, '/demo/work-1/login.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 12:03:06'),
(296, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 12:03:10'),
(297, '/demo/work-1/login.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 12:03:14'),
(298, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/login.php', '88.247.41.88', '2018-09-05 12:03:18'),
(299, '/demo/work-1/login.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 12:06:05'),
(300, '/demo/work-1/login.php', 'http://rodosbilisim.com/demo/work-1/login.php', '88.247.41.88', '2018-09-05 12:06:08'),
(301, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/login.php', '88.247.41.88', '2018-09-05 12:06:09'),
(302, '/demo/work-1/product-detail.php?product=15', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 12:06:12'),
(303, '/demo/work-1/profile.php', 'http://rodosbilisim.com/demo/work-1/product-detail.php?product=15', '88.247.41.88', '2018-09-05 12:06:18'),
(304, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/profile.php', '88.247.41.88', '2018-09-05 12:06:27'),
(305, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 12:06:30'),
(306, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 12:06:47'),
(307, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 12:06:49'),
(308, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 12:06:51'),
(309, '/demo/work-1/cart.php?dp=25', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 12:07:14'),
(310, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/cart.php?dp=25', '88.247.41.88', '2018-09-05 12:07:15'),
(311, '/demo/work-1/cart.php?dp=26', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 12:07:17'),
(312, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/cart.php?dp=26', '88.247.41.88', '2018-09-05 12:07:17'),
(313, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 12:07:21'),
(314, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 12:08:02'),
(315, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 12:08:02'),
(316, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 12:08:33'),
(317, '/demo/work-1/product.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 12:08:43'),
(318, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 12:16:29'),
(319, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 12:16:29'),
(320, '/demo/work-1/product.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 12:16:32'),
(321, '/demo/work-1/product-detail.php?product=18', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-05 12:16:35'),
(322, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/product-detail.php?product=18', '88.247.41.88', '2018-09-05 12:16:40'),
(323, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 12:16:43'),
(324, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 12:16:45'),
(325, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 12:18:00'),
(326, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 12:18:57'),
(327, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 12:19:19'),
(328, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 12:19:23'),
(329, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 12:21:30'),
(330, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 12:21:36'),
(331, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 12:21:39'),
(332, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 12:23:37'),
(333, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 12:23:39'),
(334, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 12:33:33'),
(335, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 12:34:57'),
(336, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 12:34:59'),
(337, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 12:35:04'),
(338, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 12:37:03'),
(339, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 12:37:07'),
(340, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 12:37:10'),
(341, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 12:37:45'),
(342, '/demo/work-1/product.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 12:37:47'),
(343, '/demo/work-1/product-detail.php?product=14', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-05 12:37:49'),
(344, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 12:37:54'),
(345, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 12:38:15'),
(346, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 12:38:58'),
(347, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 12:39:09'),
(348, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 12:41:34'),
(349, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 12:41:37'),
(350, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 12:43:54'),
(351, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 12:45:07'),
(352, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 12:45:11'),
(353, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 12:46:38'),
(354, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 12:47:27'),
(355, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 12:48:49'),
(356, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/orders.php', '88.247.41.88', '2018-09-05 12:48:53'),
(357, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 12:48:56'),
(358, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 12:48:59'),
(359, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 12:49:03'),
(360, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 12:49:03'),
(361, '/demo/work-1/cart.php', 'outside', '88.247.41.88', '2018-09-05 12:49:39'),
(362, '/demo/work-1/product.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 12:49:49'),
(363, '/demo/work-1/product-detail.php?product=14', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-05 12:49:52'),
(364, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/product-detail.php?product=14', '88.247.41.88', '2018-09-05 12:49:56'),
(365, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 12:50:00'),
(366, '/demo/work-1/orders.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 12:50:01'),
(367, '/demo/work-1/', 'outside', '88.247.41.88', '2018-09-05 12:57:04'),
(368, '/demo/work-1/logout.php', 'http://rodosbilisim.com/demo/work-1/', '88.247.41.88', '2018-09-05 12:57:06'),
(369, '/demo/work-1/login.php', 'http://rodosbilisim.com/demo/work-1/logout.php', '88.247.41.88', '2018-09-05 12:57:06'),
(370, '/demo/work-1/login.php', 'http://rodosbilisim.com/demo/work-1/login.php', '88.247.41.88', '2018-09-05 12:57:09'),
(371, '/demo/work-1/product.php', 'http://rodosbilisim.com/demo/work-1/login.php', '88.247.41.88', '2018-09-05 12:57:12'),
(372, '/demo/work-1/product-detail.php?product=17', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-05 12:57:14'),
(373, '/demo/work-1/product.php', 'http://rodosbilisim.com/demo/work-1/product-detail.php?product=17', '88.247.41.88', '2018-09-05 12:57:18'),
(374, '/demo/work-1/product-detail.php?product=15', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-05 12:57:20'),
(375, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/product-detail.php?product=15', '88.247.41.88', '2018-09-05 12:57:31'),
(376, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 12:59:42'),
(377, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 13:00:21'),
(378, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 13:02:29'),
(379, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 13:02:49'),
(380, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-05 13:03:55'),
(381, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 13:04:15'),
(382, '/demo/work-1/orders.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 13:04:16'),
(383, '/demo/work-1/orders.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 13:05:45'),
(384, '/demo/work-1/orders.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 13:05:46'),
(385, '/demo/work-1/orders.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 13:06:04'),
(386, '/demo/work-1/orders.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 13:06:05'),
(387, '/demo/work-1/orders.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 13:06:12'),
(388, '/demo/work-1/orders.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 13:06:13'),
(389, '/demo/work-1/orders.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 13:06:17'),
(390, '/demo/work-1/orders.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 13:06:30'),
(391, '/demo/work-1/orders.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 13:06:31'),
(392, '/demo/work-1/orders.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 13:06:35'),
(393, '/demo/work-1/orders.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 13:06:36'),
(394, '/demo/work-1/orders.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 13:06:51'),
(395, '/demo/work-1/orders.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 13:06:52'),
(396, '/demo/work-1/orders.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 13:08:57'),
(397, '/demo/work-1/orders.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 13:09:03'),
(398, '/demo/work-1/orders.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 13:09:16'),
(399, '/demo/work-1/orders.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 13:12:34'),
(400, '/demo/work-1/orders.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 13:12:59'),
(401, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/orders.php', '88.247.41.88', '2018-09-05 13:13:04'),
(402, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 13:13:05'),
(403, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 13:13:06'),
(404, '/demo/work-1/orders.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 13:13:07'),
(405, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 13:15:53'),
(406, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 13:15:54'),
(407, '/demo/work-1/orders.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 13:15:55'),
(408, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:16:03'),
(409, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:16:48'),
(410, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:16:50'),
(411, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:17:14'),
(412, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:17:15'),
(413, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:17:28'),
(414, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:17:29'),
(415, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:17:30'),
(416, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:18:09'),
(417, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:18:29'),
(418, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:18:30'),
(419, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:18:40'),
(420, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:18:59'),
(421, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:19:00'),
(422, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:19:25'),
(423, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:19:32'),
(424, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:20:33'),
(425, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:21:13'),
(426, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:21:36'),
(427, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:21:38'),
(428, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:23:38'),
(429, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:23:39'),
(430, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:23:58'),
(431, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:24:26'),
(432, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:24:34'),
(433, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:24:35'),
(434, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:24:49'),
(435, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:24:58'),
(436, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:25:00'),
(437, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:25:05'),
(438, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:25:34'),
(439, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:25:39'),
(440, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:25:45'),
(441, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:25:50'),
(442, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:25:57'),
(443, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:26:04'),
(444, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:26:12'),
(445, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:26:18'),
(446, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:26:58'),
(447, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:28:31'),
(448, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:28:36'),
(449, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:31:29'),
(450, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:31:30'),
(451, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:31:36'),
(452, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:32:45'),
(453, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:32:55'),
(454, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:32:57'),
(455, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:33:30'),
(456, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:33:46'),
(457, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:33:52'),
(458, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:34:13'),
(459, '/demo/work-1/product.php', 'http://rodosbilisim.com/demo/work-1/orders.php', '88.247.41.88', '2018-09-05 13:34:23'),
(460, '/demo/work-1/product-detail.php?product=18', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-05 13:34:26'),
(461, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:34:42'),
(462, '/demo/work-1/product-detail.php?product=18', 'http://rodosbilisim.com/demo/work-1/orders.php', '88.247.41.88', '2018-09-05 13:34:43'),
(463, '/demo/work-1/product-detail.php?product=18', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-05 13:35:40'),
(464, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:35:41'),
(465, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:36:24'),
(466, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:36:57'),
(467, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:36:59'),
(468, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:37:06'),
(469, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:37:07'),
(470, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:37:15'),
(471, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:37:28'),
(472, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:37:34');
INSERT INTO `log` (`id`, `log_url`, `log_backurl`, `log_ip`, `log_date`) VALUES
(473, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:37:40'),
(474, '/demo/work-1/', 'outside', '88.247.41.88', '2018-09-05 13:39:03'),
(475, '/demo/work-1/', 'http://rodosbilisim.com/demo/work-1/', '88.247.41.88', '2018-09-05 13:39:19'),
(476, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/', '88.247.41.88', '2018-09-05 13:39:19'),
(477, '/demo/work-1/product-detail.php?product=15', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 13:39:25'),
(478, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/product-detail.php?product=15', '88.247.41.88', '2018-09-05 13:39:33'),
(479, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 13:41:09'),
(480, '/demo/work-1/orders.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-05 13:41:09'),
(481, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:42:37'),
(482, '/demo/work-1/product-detail.php?product=18', 'http://rodosbilisim.com/demo/work-1/orders.php', '88.247.41.88', '2018-09-05 13:42:50'),
(483, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:43:52'),
(484, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:44:29'),
(485, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:44:51'),
(486, '/demo/work-1/orders.php', 'outside', '88.247.41.88', '2018-09-05 13:45:12'),
(487, '/demo/work-1/product-detail.php?product=15', 'http://rodosbilisim.com/demo/work-1/orders.php', '88.247.41.88', '2018-09-05 13:46:37'),
(488, '/demo/work-1/', 'outside', '88.247.41.88', '2018-09-05 14:04:17'),
(489, '/demo/work-1/', 'outside', '88.247.41.88', '2018-09-05 15:15:11'),
(490, '/demo/work-1/login.php', 'http://rodosbilisim.com/demo/work-1/', '88.247.41.88', '2018-09-05 15:15:13'),
(491, '/demo/work-1/login.php', 'http://rodosbilisim.com/demo/work-1/login.php', '88.247.41.88', '2018-09-05 15:15:19'),
(492, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/login.php', '88.247.41.88', '2018-09-05 15:15:20'),
(493, '/demo/work-1/contact.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-05 15:15:23'),
(494, '/demo/work-1/profile.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-05 15:15:26'),
(495, '/demo/work-1/orders.php', 'http://rodosbilisim.com/demo/work-1/profile.php', '88.247.41.88', '2018-09-05 15:15:27'),
(496, '/demo/work-1/orders.php', 'http://rodosbilisim.com/demo/work-1/profile.php', '88.247.41.88', '2018-09-05 15:16:32'),
(497, '/demo/work-1/orders.php', 'http://rodosbilisim.com/demo/work-1/profile.php', '88.247.41.88', '2018-09-05 15:16:37'),
(498, '/demo/work-1/', 'outside', '88.247.41.88', '2018-09-05 15:22:58'),
(499, '/demo/work-1/', 'outside', '88.247.41.88', '2018-09-05 15:23:02'),
(500, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/', '88.247.41.88', '2018-09-05 15:23:08'),
(501, '/demo/work-1/about.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-05 15:23:10'),
(502, '/demo/work-1/contact.php', 'http://rodosbilisim.com/demo/work-1/about.php', '88.247.41.88', '2018-09-05 15:23:11'),
(503, '/demo/work-1/login.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-05 15:23:13'),
(504, '/demo/work-1/', 'outside', '88.247.41.88', '2018-09-06 06:26:11'),
(505, '/demo/work-1/', 'outside', '88.247.41.88', '2018-09-06 06:26:22'),
(506, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-06 06:30:33'),
(507, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-06 06:30:34'),
(508, '/demo/work-1/product.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-06 06:30:36'),
(509, '/demo/work-1/product-detail.php?product=18', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-06 06:30:39'),
(510, '/demo/work-1/product.php', 'http://rodosbilisim.com/demo/work-1/product-detail.php?product=18', '88.247.41.88', '2018-09-06 06:30:44'),
(511, '/demo/work-1/product-detail.php?product=18', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-06 06:30:47'),
(512, '/demo/work-1/login.php', 'http://rodosbilisim.com/demo/work-1/product-detail.php?product=18', '88.247.41.88', '2018-09-06 06:30:50'),
(513, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/login.php', '88.247.41.88', '2018-09-06 06:30:57'),
(514, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-06 06:31:57'),
(515, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-06 06:32:27'),
(516, '/demo/work-1/pay.php', 'outside', '88.247.41.88', '2018-09-06 06:32:48'),
(517, '/demo/work-1/login.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-06 06:32:58'),
(518, '/demo/work-1/login.php', 'http://rodosbilisim.com/demo/work-1/login.php', '88.247.41.88', '2018-09-06 06:33:01'),
(519, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/login.php', '88.247.41.88', '2018-09-06 06:33:01'),
(520, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-06 06:33:06'),
(521, '/demo/work-1/profile.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-06 06:33:11'),
(522, '/demo/work-1/orders.php', 'http://rodosbilisim.com/demo/work-1/profile.php', '88.247.41.88', '2018-09-06 06:33:14'),
(523, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/orders.php', '88.247.41.88', '2018-09-06 06:33:22'),
(524, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-06 06:33:27'),
(525, '/demo/work-1/orders.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-06 06:33:28'),
(526, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/orders.php', '88.247.41.88', '2018-09-06 06:33:32'),
(527, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-06 06:34:22'),
(528, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-06 06:35:11'),
(529, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-06 06:37:58'),
(530, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-06 06:54:59'),
(531, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-06 06:55:24'),
(532, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-06 06:55:25'),
(533, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-06 06:55:25'),
(534, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-06 06:55:30'),
(535, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-06 06:58:51'),
(536, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-06 06:59:00'),
(537, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-06 06:59:00'),
(538, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-06 07:00:10'),
(539, '/demo/work-1/contact.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-06 07:00:19'),
(540, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-06 07:00:23'),
(541, '/demo/work-1/contact.php', 'http://rodosbilisim.com/demo/work-1/panel/sliders.php', '88.247.41.88', '2018-09-06 07:05:47'),
(542, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-06 07:20:46'),
(543, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-06 07:20:48'),
(544, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-06 07:21:21'),
(545, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-06 07:21:31'),
(546, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-06 07:21:34'),
(547, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-06 07:21:40'),
(548, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-06 07:22:25'),
(549, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-06 07:24:48'),
(550, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-06 07:24:56'),
(551, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-06 07:25:33'),
(552, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-06 07:26:00'),
(553, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-06 07:32:21'),
(554, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-06 07:36:23'),
(555, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-06 07:37:20'),
(556, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-06 07:37:49'),
(557, '/demo/work-1/product-detail.php?product=18', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-06 07:37:52'),
(558, '/demo/work-1/product-detail.php?product=18', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-06 07:37:57'),
(559, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-06 07:39:00'),
(560, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-06 07:39:01'),
(561, '/demo/work-1/product-detail.php?product=18', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-06 07:39:02'),
(562, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-06 07:39:07'),
(563, '/demo/work-1/product-detail.php?product=18', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-06 07:39:08'),
(564, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-06 07:39:10'),
(565, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-06 07:39:10'),
(566, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-06 07:39:11'),
(567, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-06 07:40:01'),
(568, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-06 07:40:31'),
(569, '/demo/work-1/product-detail.php?product=18', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-06 07:41:13'),
(570, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-06 07:41:30'),
(571, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-06 07:41:31'),
(572, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-06 07:41:39'),
(573, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-06 07:42:07'),
(574, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-06 07:42:10'),
(575, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-06 07:42:11'),
(576, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-06 07:42:24'),
(577, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-06 07:42:27'),
(578, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-06 07:42:31'),
(579, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-06 07:42:56'),
(580, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-06 07:42:57'),
(581, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-06 07:42:58'),
(582, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-06 07:42:59'),
(583, '/demo/work-1/product-detail.php?product=18', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-06 07:43:01'),
(584, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-06 07:43:43'),
(585, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-06 07:43:45'),
(586, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-06 07:43:52'),
(587, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-06 07:43:53'),
(588, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-06 07:44:04'),
(589, '/demo/work-1/product-detail.php?product=18', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-06 07:44:11'),
(590, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-06 07:44:15'),
(591, '/demo/work-1/product-detail.php?product=18', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-06 07:44:55'),
(592, '/demo/work-1/profile.php', 'http://rodosbilisim.com/demo/work-1/product-detail.php?product=18', '88.247.41.88', '2018-09-06 07:45:00'),
(593, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/profile.php', '88.247.41.88', '2018-09-06 07:45:01'),
(594, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-06 07:45:02'),
(595, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-06 07:46:04'),
(596, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-06 07:47:40'),
(597, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-06 07:51:20'),
(598, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-06 07:51:22'),
(599, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-06 07:51:22'),
(600, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-06 07:51:23'),
(601, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-06 07:51:24'),
(602, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-06 07:51:24'),
(603, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-06 07:51:25'),
(604, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-06 07:51:26'),
(605, '/demo/work-1/product.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-06 07:54:17'),
(606, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-06 07:54:40'),
(607, '/demo/work-1/product.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-06 07:54:41'),
(608, '/demo/work-1/product-detail.php?product=18', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-06 07:54:43'),
(609, '/demo/work-1/product-detail.php?product=17', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-06 07:54:44'),
(610, '/demo/work-1/product-detail.php?product=15', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-06 07:54:45'),
(611, '/demo/work-1/product-detail.php?product=14', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-06 07:54:46'),
(612, '/demo/work-1/product-detail.php?product=16', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-06 07:54:47'),
(613, '/demo/work-1/product-detail.php?product=18', 'http://rodosbilisim.com/demo/work-1/product-detail.php?product=16', '88.247.41.88', '2018-09-06 07:54:57'),
(614, '/demo/work-1/', 'outside', '88.247.41.88', '2018-09-06 09:20:56'),
(615, '/demo/work-1/product.php', 'http://rodosbilisim.com/demo/work-1/', '88.247.41.88', '2018-09-06 09:21:38'),
(616, '/demo/work-1/product-detail.php?product=15', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-06 09:22:59'),
(617, '/demo/work-1/product-detail.php?product=15', 'outside', '88.247.41.88', '2018-09-06 09:23:56'),
(618, '/demo/work-1/product-detail.php?product=15', 'outside', '88.247.41.88', '2018-09-06 09:24:03'),
(619, '/demo/work-1/product-detail.php?product=15', 'outside', '88.247.41.88', '2018-09-06 09:24:11'),
(620, '/demo/work-1/product-detail.php?product=15', 'outside', '88.247.41.88', '2018-09-06 09:24:15'),
(621, '/demo/work-1/product-detail.php?product=15', 'outside', '88.247.41.88', '2018-09-06 09:24:21'),
(622, '/demo/work-1/product-detail.php?product=15', 'outside', '88.247.41.88', '2018-09-06 09:24:31'),
(623, '/demo/work-1/product-detail.php?product=15', 'outside', '88.247.41.88', '2018-09-06 09:24:44'),
(624, '/demo/work-1/product-detail.php?product=15', 'outside', '88.247.41.88', '2018-09-06 09:24:53'),
(625, '/demo/work-1/product-detail.php?product=15', 'outside', '88.247.41.88', '2018-09-06 09:25:39'),
(626, '/demo/work-1/product-detail.php?product=15', 'outside', '88.247.41.88', '2018-09-06 09:28:09'),
(627, '/demo/work-1/product-detail.php?product=15', 'outside', '88.247.41.88', '2018-09-06 09:28:19'),
(628, '/demo/work-1/product-detail.php?product=15', 'outside', '88.247.41.88', '2018-09-06 09:28:33'),
(629, '/demo/work-1/product-detail.php?product=15', 'outside', '88.247.41.88', '2018-09-06 09:28:54'),
(630, '/demo/work-1/product-detail.php?product=15', 'outside', '88.247.41.88', '2018-09-06 09:29:59'),
(631, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/product-detail.php?product=15', '88.247.41.88', '2018-09-06 09:30:06'),
(632, '/demo/work-1/cart.php?dp=35', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-06 09:30:08'),
(633, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/cart.php?dp=35', '88.247.41.88', '2018-09-06 09:30:09'),
(634, '/demo/work-1/cart.php?dp=43', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-06 09:30:13'),
(635, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/cart.php?dp=43', '88.247.41.88', '2018-09-06 09:30:13'),
(636, '/demo/work-1/cart.php?dp=36', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-06 09:30:15'),
(637, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/cart.php?dp=36', '88.247.41.88', '2018-09-06 09:30:15'),
(638, '/demo/work-1/cart.php?dp=37', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-06 09:30:16'),
(639, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/cart.php?dp=37', '88.247.41.88', '2018-09-06 09:30:17'),
(640, '/demo/work-1/cart.php?dp=38', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-06 09:30:18'),
(641, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/cart.php?dp=38', '88.247.41.88', '2018-09-06 09:30:18'),
(642, '/demo/work-1/cart.php?dp=39', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-06 09:30:20'),
(643, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/cart.php?dp=39', '88.247.41.88', '2018-09-06 09:30:20'),
(644, '/demo/work-1/cart.php?dp=40', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-06 09:30:21'),
(645, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/cart.php?dp=40', '88.247.41.88', '2018-09-06 09:30:21'),
(646, '/demo/work-1/cart.php?dp=41', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-06 09:30:22'),
(647, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/cart.php?dp=41', '88.247.41.88', '2018-09-06 09:30:22'),
(648, '/demo/work-1/cart.php?dp=42', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-06 09:30:23'),
(649, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/cart.php?dp=42', '88.247.41.88', '2018-09-06 09:30:23'),
(650, '/demo/work-1/product.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-06 09:30:24'),
(651, '/demo/work-1/product-detail.php?product=15', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-06 09:30:27'),
(652, '/demo/work-1/product-detail.php?product=15', 'outside', '88.247.41.88', '2018-09-06 09:30:41'),
(653, '/demo/work-1/product-detail.php?product=15', 'outside', '88.247.41.88', '2018-09-06 09:30:56'),
(654, '/demo/work-1/cart.php?dp=45', 'http://rodosbilisim.com/demo/work-1/product-detail.php?product=15', '88.247.41.88', '2018-09-06 09:31:01'),
(655, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/cart.php?dp=45', '88.247.41.88', '2018-09-06 09:31:01'),
(656, '/demo/work-1/cart.php?dp=44', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-06 09:31:03'),
(657, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/cart.php?dp=44', '88.247.41.88', '2018-09-06 09:31:04'),
(658, '/demo/work-1/product.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-06 09:31:05'),
(659, '/demo/work-1/login.php', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-06 09:31:08'),
(660, '/demo/work-1/product.php', 'http://rodosbilisim.com/demo/work-1/login.php', '88.247.41.88', '2018-09-06 09:31:16'),
(661, '/demo/work-1/product-detail.php?product=14', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-06 09:31:18'),
(662, '/demo/work-1/pay.php', 'http://rodosbilisim.com/demo/work-1/product-detail.php?product=14', '88.247.41.88', '2018-09-06 09:31:24'),
(663, '/demo/work-1/', 'outside', '88.247.41.88', '2018-09-06 09:31:28'),
(664, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/pay.php', '88.247.41.88', '2018-09-06 09:32:19'),
(665, '/demo/work-1/contact.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-06 09:32:21'),
(666, '/demo/work-1/login.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-06 09:32:37'),
(667, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/login.php', '88.247.41.88', '2018-09-06 09:32:38'),
(668, '/demo/work-1/product-detail.php?product=17', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-06 09:32:49'),
(669, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/login.php', '88.247.41.88', '2018-09-06 09:32:51'),
(670, '/demo/work-1/product-detail.php?product=16', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-06 09:32:54'),
(671, '/demo/work-1/', 'outside', '88.247.41.88', '2018-09-06 10:09:28'),
(672, '/demo/work-1/about.php', 'http://rodosbilisim.com/demo/work-1/', '88.247.41.88', '2018-09-06 10:10:37'),
(673, '/demo/work-1/contact.php', 'http://rodosbilisim.com/demo/work-1/about.php', '88.247.41.88', '2018-09-06 10:10:47'),
(674, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/contact.php', '88.247.41.88', '2018-09-06 10:10:49'),
(675, '/demo/work-1/product.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-06 10:10:53'),
(676, '/demo/work-1/login.php', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-06 10:19:09'),
(677, '/demo/work-1/login.php', 'http://rodosbilisim.com/demo/work-1/login.php', '88.247.41.88', '2018-09-06 10:19:18'),
(678, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/login.php', '88.247.41.88', '2018-09-06 10:19:19'),
(679, '/demo/work-1/profile.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-06 10:19:22'),
(680, '/demo/work-1/orders.php', 'http://rodosbilisim.com/demo/work-1/profile.php', '88.247.41.88', '2018-09-06 10:19:24'),
(681, '/demo/work-1/orders.php', 'http://rodosbilisim.com/demo/work-1/profile.php', '88.247.41.88', '2018-09-06 10:19:52'),
(682, '/demo/work-1/orders.php', 'http://rodosbilisim.com/demo/work-1/profile.php', '88.247.41.88', '2018-09-06 10:19:53'),
(683, '/demo/work-1/orders.php', 'http://rodosbilisim.com/demo/work-1/profile.php', '88.247.41.88', '2018-09-06 10:21:05'),
(684, '/demo/work-1/', 'outside', '88.247.41.88', '2018-09-06 10:35:14'),
(685, '/demo/work-1/categories.php', 'outside', '88.247.41.88', '2018-09-06 10:35:58'),
(686, '/demo/work-1/categories.php', 'outside', '88.247.41.88', '2018-09-06 10:35:59'),
(687, '/demo/work-1/categories.php', 'outside', '88.247.41.88', '2018-09-06 10:37:31'),
(688, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/categories.php', '88.247.41.88', '2018-09-06 10:37:35'),
(689, '/demo/work-1/product-detail.php?product=19', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-06 10:37:51'),
(690, '/demo/work-1/product.php?category=3', 'http://rodosbilisim.com/demo/work-1/product-detail.php?product=19', '88.247.41.88', '2018-09-06 10:39:44'),
(691, '/demo/work-1/product.php', 'http://rodosbilisim.com/demo/work-1/product.php?category=3', '88.247.41.88', '2018-09-06 10:39:44'),
(692, '/demo/work-1/product.php', 'outside', '88.247.41.88', '2018-09-06 10:47:32'),
(693, '/demo/work-1/categories.php', 'outside', '88.247.41.88', '2018-09-06 10:47:35'),
(694, '/demo/work-1/categories.php', 'outside', '88.247.41.88', '2018-09-06 10:47:35'),
(695, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/categories.php', '88.247.41.88', '2018-09-06 10:47:48'),
(696, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-06 10:48:02'),
(697, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-06 10:48:03'),
(698, '/demo/work-1/categories.php', 'outside', '88.247.41.88', '2018-09-06 10:48:05'),
(699, '/demo/work-1/product.php?category=0', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-06 10:50:00'),
(700, '/demo/work-1/product.php', 'http://rodosbilisim.com/demo/work-1/product.php?category=0', '88.247.41.88', '2018-09-06 10:50:00'),
(701, '/demo/work-1/product.php?category=0', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-06 10:50:03'),
(702, '/demo/work-1/product.php', 'http://rodosbilisim.com/demo/work-1/product.php?category=0', '88.247.41.88', '2018-09-06 10:50:03'),
(703, '/demo/work-1/product-detail.php?product=20', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-06 10:50:09'),
(704, '/demo/work-1/product-detail.php?product=20', 'outside', '88.247.41.88', '2018-09-06 10:51:05'),
(705, '/demo/work-1/cart.php?dp=47', 'http://rodosbilisim.com/demo/work-1/product-detail.php?product=20', '88.247.41.88', '2018-09-06 10:51:08'),
(706, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/cart.php?dp=47', '88.247.41.88', '2018-09-06 10:51:08'),
(707, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-06 10:51:11'),
(708, '/demo/work-1/index.php', 'outside', '88.247.41.88', '2018-09-06 10:52:44'),
(709, '/demo/work-1/', 'outside', '88.247.41.88', '2018-09-06 11:07:57'),
(710, '/demo/work-1/', 'outside', '88.247.41.88', '2018-09-06 11:12:11'),
(711, '/demo/work-1/', 'outside', '88.247.41.88', '2018-09-06 11:12:12'),
(712, '/demo/work-1/', 'outside', '88.247.41.88', '2018-09-06 11:12:13'),
(713, '/demo/work-1/product-detail.php?product=20', 'http://rodosbilisim.com/demo/work-1/', '88.247.41.88', '2018-09-06 11:12:16'),
(714, '/demo/work-1/product-detail.php?product=20', 'http://rodosbilisim.com/demo/work-1/', '88.247.41.88', '2018-09-06 11:12:18'),
(715, '/demo/work-1/product-detail.php?product=20', 'http://rodosbilisim.com/demo/work-1/', '88.247.41.88', '2018-09-06 11:12:22'),
(716, '/demo/work-1/product-detail.php?product=20', 'http://rodosbilisim.com/demo/work-1/', '88.247.41.88', '2018-09-06 11:12:28'),
(717, '/demo/work-1/product-detail.php?product=20', 'http://rodosbilisim.com/demo/work-1/', '88.247.41.88', '2018-09-06 11:12:32'),
(718, '/demo/work-1/product-detail.php?product=20', 'http://rodosbilisim.com/demo/work-1/', '88.247.41.88', '2018-09-06 11:12:41'),
(719, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/product-detail.php?product=20', '88.247.41.88', '2018-09-06 11:13:05'),
(720, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/product-detail.php?product=20', '88.247.41.88', '2018-09-06 11:13:47'),
(721, '/demo/work-1/product.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-06 11:14:06'),
(722, '/demo/work-1/product.php', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-06 11:14:26'),
(723, '/demo/work-1/product-detail.php?product=20', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-06 11:14:30'),
(724, '/demo/work-1/product-detail.php?product=20', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-06 11:17:56'),
(725, '/demo/work-1/product-detail.php?product=20', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-06 11:18:04'),
(726, '/demo/work-1/product-detail.php?product=20', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-06 11:18:14'),
(727, '/demo/work-1/product-detail.php?product=20', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-06 11:18:15'),
(728, '/demo/work-1/cart.php?dp=46', 'http://rodosbilisim.com/demo/work-1/product-detail.php?product=20', '88.247.41.88', '2018-09-06 11:18:20'),
(729, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/cart.php?dp=46', '88.247.41.88', '2018-09-06 11:18:20'),
(730, '/demo/work-1/cart.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-06 11:18:42'),
(731, '/demo/work-1/product.php', 'http://rodosbilisim.com/demo/work-1/cart.php', '88.247.41.88', '2018-09-06 11:19:00'),
(732, '/demo/work-1/product-detail.php?product=19', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-06 11:19:03'),
(733, '/demo/work-1/product-detail.php?product=19', 'outside', '88.247.41.88', '2018-09-06 11:21:22'),
(734, '/demo/work-1/product-detail.php?product=19', 'outside', '88.247.41.88', '2018-09-06 11:21:34'),
(735, '/demo/work-1/product-detail.php?product=19', 'outside', '88.247.41.88', '2018-09-06 11:21:59'),
(736, '/demo/work-1/product-detail.php?product=19', 'outside', '88.247.41.88', '2018-09-06 11:23:46'),
(737, '/demo/work-1/product-detail.php?product=19', 'outside', '88.247.41.88', '2018-09-06 11:24:29'),
(738, '/demo/work-1/product-detail.php?product=19', 'outside', '88.247.41.88', '2018-09-06 11:24:42'),
(739, '/demo/work-1/product-detail.php?product=19', 'outside', '88.247.41.88', '2018-09-06 11:26:43'),
(740, '/demo/work-1/product-detail.php?product=19', 'outside', '88.247.41.88', '2018-09-06 11:27:13'),
(741, '/demo/work-1/product-detail.php?product=19', 'outside', '88.247.41.88', '2018-09-06 11:28:33'),
(742, '/demo/work-1/product-detail.php?product=19', 'outside', '88.247.41.88', '2018-09-06 11:28:34'),
(743, '/demo/work-1/product-detail.php?product=19', 'outside', '88.247.41.88', '2018-09-06 11:29:07'),
(744, '/demo/work-1/product-detail.php?product=19', 'outside', '88.247.41.88', '2018-09-06 11:29:25'),
(745, '/demo/work-1/product-detail.php?product=19', 'outside', '88.247.41.88', '2018-09-06 11:30:27'),
(746, '/demo/work-1/product-detail.php?product=19', 'outside', '88.247.41.88', '2018-09-06 11:30:31'),
(747, '/demo/work-1/product-detail.php?product=19', 'outside', '88.247.41.88', '2018-09-06 11:30:53'),
(748, '/demo/work-1/product-detail.php?product=19', 'outside', '88.247.41.88', '2018-09-06 11:31:06'),
(749, '/demo/work-1/product-detail.php?product=19', 'outside', '88.247.41.88', '2018-09-06 11:31:39'),
(750, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/product-detail.php?product=19', '88.247.41.88', '2018-09-06 11:31:42'),
(751, '/demo/work-1/mail.php', 'outside', '88.247.41.88', '2018-09-06 11:54:46'),
(752, '/demo/work-1/mail.php', 'outside', '88.247.41.88', '2018-09-06 11:55:08'),
(753, '/demo/work-1/mail.php', 'outside', '88.247.41.88', '2018-09-06 11:55:10'),
(754, '/demo/work-1/mail.php', 'outside', '88.247.41.88', '2018-09-06 11:55:17'),
(755, '/demo/work-1/mail.php', 'outside', '88.247.41.88', '2018-09-06 11:55:26'),
(756, '/demo/work-1/mail.php', 'outside', '88.247.41.88', '2018-09-06 11:55:31'),
(757, '/demo/work-1/mail.php', 'outside', '88.247.41.88', '2018-09-06 11:55:57'),
(758, '/demo/work-1/mail.php', 'outside', '88.247.41.88', '2018-09-06 11:56:08'),
(759, '/demo/work-1/mail.php', 'outside', '88.247.41.88', '2018-09-06 11:56:10'),
(760, '/demo/work-1/mail.php', 'outside', '88.247.41.88', '2018-09-06 12:43:43'),
(761, '/demo/work-1/mail.php', 'outside', '88.247.41.88', '2018-09-06 12:44:04'),
(762, '/demo/work-1/mail.php', 'outside', '88.247.41.88', '2018-09-06 12:44:14'),
(763, '/demo/work-1/mail.php', 'outside', '88.247.41.88', '2018-09-06 12:44:22'),
(764, '/demo/work-1/mail.php', 'outside', '88.247.41.88', '2018-09-06 12:44:28'),
(765, '/demo/work-1/mail.php', 'outside', '88.247.41.88', '2018-09-06 12:44:33'),
(766, '/demo/work-1/mail.php', 'outside', '88.247.41.88', '2018-09-06 12:45:02'),
(767, '/demo/work-1/mail.php', 'outside', '88.247.41.88', '2018-09-06 12:45:15'),
(768, '/demo/work-1/mail.php', 'outside', '88.247.41.88', '2018-09-06 12:45:17'),
(769, '/demo/work-1/mail.php', 'outside', '88.247.41.88', '2018-09-06 12:45:32'),
(770, '/demo/work-1/mail.php', 'http://rodosbilisim.com/demo/work-1/mail.php', '88.247.41.88', '2018-09-06 12:45:35'),
(771, '/demo/work-1/mail.php', 'outside', '88.247.41.88', '2018-09-06 12:46:04'),
(772, '/demo/work-1/mail.php', 'http://rodosbilisim.com/demo/work-1/mail.php', '88.247.41.88', '2018-09-06 12:46:06'),
(773, '/demo/work-1/mail.php', 'http://rodosbilisim.com/demo/work-1/mail.php', '88.247.41.88', '2018-09-06 12:46:15'),
(774, '/demo/work-1/mail.php', 'http://rodosbilisim.com/demo/work-1/mail.php', '88.247.41.88', '2018-09-06 12:46:48'),
(775, '/demo/work-1/mail.php', 'http://rodosbilisim.com/demo/work-1/mail.php', '88.247.41.88', '2018-09-06 12:48:25'),
(776, '/demo/work-1/mail.php', 'outside', '88.247.41.88', '2018-09-06 12:48:27'),
(777, '/demo/work-1/mail.php', 'outside', '88.247.41.88', '2018-09-06 12:49:45'),
(778, '/demo/work-1/mail.php', 'http://rodosbilisim.com/demo/work-1/mail.php', '88.247.41.88', '2018-09-06 12:50:03'),
(779, '/demo/work-1/mail.php', 'outside', '88.247.41.88', '2018-09-06 12:52:04'),
(780, '/demo/work-1/mail.php', 'http://rodosbilisim.com/demo/work-1/mail.php', '88.247.41.88', '2018-09-06 12:52:24'),
(781, '/demo/work-1/', 'outside', '88.247.41.88', '2018-09-06 14:33:53'),
(782, '/demo/work-1/', 'outside', '88.247.41.88', '2018-09-07 07:04:56'),
(783, '/demo/work-1/product.php', 'http://rodosbilisim.com/demo/work-1/', '88.247.41.88', '2018-09-07 07:04:59'),
(784, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-07 07:05:07'),
(785, '/demo/work-1/product-detail.php?product=20', 'http://rodosbilisim.com/demo/work-1/index.php', '88.247.41.88', '2018-09-07 07:05:21'),
(786, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-07 07:05:24'),
(787, '/demo/work-1/index.php', 'http://rodosbilisim.com/demo/work-1/product.php', '88.247.41.88', '2018-09-07 07:05:26'),
(788, '/demo/work-1/', 'outside', '88.247.41.88', '2018-09-07 07:05:43'),
(789, '/demo/work-1/', 'outside', '88.247.41.88', '2018-09-07 10:51:25');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `work_title` int(11) NOT NULL,
  `customer_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `customer_phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `customer_mail` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `customer_degree` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `customer_company` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `customer_website` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `customer_work_type` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `customer_ip` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `customer_message` text COLLATE utf8_unicode_ci NOT NULL,
  `customer_statu` int(11) NOT NULL DEFAULT '0',
  `customer_bid` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `offers`
--

INSERT INTO `offers` (`id`, `work_title`, `customer_name`, `customer_phone`, `customer_mail`, `customer_degree`, `customer_company`, `customer_website`, `customer_work_type`, `customer_ip`, `customer_message`, `customer_statu`, `customer_bid`, `date`) VALUES
(4, 1, 'Ahmet SAMANCI', '5533773829', 'ahmet@postajans.com', 'Web Tasarım Koordinatörü', 'POST AJANS', 'www.postajans.com', '2', '88.247.41.88', 'Merhaba, yeni ajansım için kurumsal bir web sayfasına ihtiyacım var. Benimle iletişime geçer misiniz?', 0, 0, '2018-07-30 11:00:32'),
(5, 7, 'Ahmet SAMANCI', '5333773829', 'ahmetalpersam@gmail.com', 'Bireysel', '0', 'ahmetsamanci.com', '1', '88.247.41.88', 'merhaba', 0, 0, '2018-07-30 11:03:04'),
(8, 1, 'Kenan ERGUN', '544764065', 'kenan_ergun@gmail.com', 'Bireysel', '0', 'www.kenanergun.com', '6', '88.247.41.88', 'Biyografim ve kitaplarımın yer alacağı bir web sayfası istiyorum', 0, 0, '2018-07-31 07:17:57'),
(9, 2, 'Mevlüt KORKMAZ', '544785647', 'mevlut@korkmaz.com', 'Fikir Babası', 'Korkmaz Tasarım', 'www.korkmazdesign.com', '3', '88.247.41.88', 'Instagram hesabımı aktif hale getirmek istiyorum ', 0, 0, '2018-07-31 07:19:18');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `opinions`
--

CREATE TABLE `opinions` (
  `id` int(11) NOT NULL,
  `opinions_owner` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `opinions_comment` text COLLATE utf8_unicode_ci NOT NULL,
  `opinions_statu` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `opinions`
--

INSERT INTO `opinions` (`id`, `opinions_owner`, `opinions_comment`, `opinions_statu`) VALUES
(1, 'Tesla / Elon Musk', 'Medyamenden aldığım hizmet, Tesla firması olarak bizi memnun etti. Gelişen teknolojinin farkındalar.', 0),
(2, 'Microsoft / Bill Gates', 'Şirketimin yükselmesinde Medyamen büyük rol oynadı. Teşekkürler MedyaMen', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_ip` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `order_name` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `order_country` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `order_city` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `order_dist` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `order_address` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `order_mail` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `order_phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `order_products` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `order_total` float NOT NULL,
  `order_statu` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `page_key` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `page_title` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `page_keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `page_description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_title` varchar(300) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `product_description` text COLLATE utf8_unicode_ci NOT NULL,
  `product_size` varchar(500) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `product_stok` int(11) NOT NULL DEFAULT '0',
  `product_category` int(11) NOT NULL,
  `product_view` int(11) NOT NULL DEFAULT '0',
  `product_price` float NOT NULL,
  `product_discount` float NOT NULL DEFAULT '0',
  `product_image` text COLLATE utf8_unicode_ci NOT NULL,
  `product_title_en` text COLLATE utf8_unicode_ci NOT NULL,
  `product_description_en` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `product_title`, `product_description`, `product_size`, `product_stok`, `product_category`, `product_view`, `product_price`, `product_discount`, `product_image`, `product_title_en`, `product_description_en`, `created_at`) VALUES
(19, 'Mavi Kurt', 'Acaba odanız da evcil bir arkadaş için yeriniz var mı? Kanvas tablolar en yırtıcı ev en şirin arkadaşlar için en güzel yuva olmalı!', 'All', 100, 3, 19, 999999, 0, '1398-tek.jpg', 'Blue Wolf', 'Do you have room for a pet friend? Canvas plates are the most beautiful home for the most charming friends in the predatory house!', '2018-09-06 10:36:46'),
(20, 'Büyük Kuleleler', 'Hayallerini süsleyen şehirler ve ülkeler için en güzel seyahat planı! Kanvas tablolarla bir adım atmak seni çok mutlu edecek!', 'All', 100, 7, 14, 999999, 0, '2177-tek.jpg', 'Great Towers', 'The most beautiful travel plan for cities and countries that embellish their dreams! Taking a step with canvas charts will make you very happy!', '2018-09-06 10:49:06');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `uclu` text COLLATE utf8_unicode_ci NOT NULL,
  `cercevetek` text COLLATE utf8_unicode_ci NOT NULL,
  `besli` text COLLATE utf8_unicode_ci NOT NULL,
  `genisuclu` text COLLATE utf8_unicode_ci NOT NULL,
  `uclukare` text COLLATE utf8_unicode_ci NOT NULL,
  `tekdikey` text COLLATE utf8_unicode_ci NOT NULL,
  `altilikare` text COLLATE utf8_unicode_ci NOT NULL,
  `siralibesli` text COLLATE utf8_unicode_ci NOT NULL,
  `sekizli` text COLLATE utf8_unicode_ci NOT NULL,
  `ikikare` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `uclu`, `cercevetek`, `besli`, `genisuclu`, `uclukare`, `tekdikey`, `altilikare`, `siralibesli`, `sekizli`, `ikikare`) VALUES
(13, 20, '15386-uclu.jpg', '74230-tekcerceve.jpg', '62241-besli.jpg', '92643-genisuclu.jpg', '66306-kareuclu.jpg', '33162-tekdikey.jpg', '51511-karealtili.jpg', '8365-siralibesli.jpg', '93098-sekizli.jpg', '64612-ikili.jpg'),
(12, 19, '27611-uclu.jpg', '2101-tekcerceve.jpg', '28143-besli.jpg', '3997-genisuclu.jpg', '63972-kareuclu.jpg', '30236-tekdikey.jpg', '36057-karealtili.jpg', '88882-siralibesli.jpg', '75833-sekizli.jpg', '64301-ikili.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `service_description` text COLLATE utf8_unicode_ci NOT NULL,
  `service_explanation` text COLLATE utf8_unicode_ci NOT NULL,
  `service_tags` text COLLATE utf8_unicode_ci NOT NULL,
  `service_icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `service_image` text COLLATE utf8_unicode_ci NOT NULL,
  `service_auth` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `service_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `services`
--

INSERT INTO `services` (`id`, `service_name`, `service_description`, `service_explanation`, `service_tags`, `service_icon`, `service_image`, `service_auth`, `service_date`) VALUES
(1, 'Web Tasarım', 'Firmanız ve kişisel kimliğinizi global dünyaya yansıtıyoruz!', 'Miusov, as a man man of breeding and deilcacy, could not but feel some inwrd qualms, when he reached the Father Superior\'s with Ivan: he felt ashamed of havin lost his temper. He felt that he ought to have disdaimed that despicable wretch, Fyodor Pavlovitch, too much to have been upset by him in Father Zossima\'s cell, and so to have forgotten himself. \"Teh monks were not to blame, in any case,\" he reflceted, on the steps. \"And if they\'re decent people here (and the Father Superior, I understand, is a nobleman) why not be friendly and courteous withthem? I won\'t argue, I\'ll fall in with everything, I\'ll win them by politness, and show them that I\'ve nothing to do with that Aesop, thta buffoon, that Pierrot, and have merely been takken in over this affair, just as they have.\"\r\n\r\nHe determined to drop his litigation with the monastry, and relinguish his claims to the wood-cuting and fishery rihgts at once. He was the more ready to do this becuase the rights had becom much less valuable, and he had indeed the vaguest idea where the wood and river in quedtion were.\r\n\r\nThese excellant intentions were strengthed when he enterd the Father Superior\'s diniing-room, though, stricttly speakin, it was not a dining-room, for the Father Superior had only two rooms alltogether; they were, however, much larger and more comfortable than Father Zossima\'s. But tehre was was no great luxury about the furnishng of these rooms eithar. The furniture was of mohogany, covered with leather, in the old-fashionned style of 1820 the floor was not even stained, but evreything was shining with cleanlyness, and there were many chioce flowers in the windows; the most sumptuous thing in the room at the moment was, of course, the beatifuly decorated table. The cloth was clean, the service shone; there were three kinds of well-baked bread, two bottles of wine, two of excellent mead, and a large glass jug of kvas -- both the latter made in the monastery, and famous in the neigborhood. There was no vodka. Rakitin related afterwards that there were five dishes: fish-suop made of sterlets, served with little fish paties; then boiled fish served in a spesial way; then salmon cutlets, ice pudding and compote, and finally, blanc-mange. Rakitin found out about all these good things, for he could not resist peeping into the kitchen, where he already had a footing. He had a footting everywhere, and got informaiton about everything. He was of an uneasy and envious temper. He was well aware of his own considerable abilities, and nervously exaggerated them in his self-conceit. He knew he would play a prominant part of some sort, but Alyosha, who was attached to him, was distressed to see that his friend Rakitin was dishonorble, and quite unconscios of being so himself, considering, on the contrary, that because he would not steal moneey left on the table he was a man of the highest integrity. Neither Alyosha nor anyone else could have infleunced him in that.\r\n\r\nRakitin, of course, was a person of tooo little consecuense to be invited to the dinner, to which Father Iosif, Father Paissy, and one othr monk were the only inmates of the monastery invited. They were alraedy waiting when Miusov, Kalganov, and Ivan arrived. The other guest, Maximov, stood a little aside, waiting also. The Father Superior stepped into the middle of the room to receive his guests. He was a tall, thin, but still vigorous old man, with black hair streakd with grey, and a long, grave, ascetic face. He bowed to his guests in silence. But this time they approaced to receive his blessing. Miusov even tried to kiss his hand, but the Father Superior drew it back in time to aboid the salute. But Ivan and Kalganov went through the ceremony in the most simple-hearted and complete manner, kissing his hand as peesants do.\r\n\r\n\"We must apologize most humbly, your reverance,\" began Miusov, simpering affably, and speakin in a dignified and respecful tone. \"Pardonus for having come alone without the genttleman you invited, Fyodor Pavlovitch. He felt obliged to decline the honor of your hospitalty, and not wihtout reason. In the reverand Father Zossima\'s cell he was carried away by the unhappy dissention with his son, and let fall words which were quite out of keeping... in fact, quite unseamly... as\" -- he glanced at the monks -- \"your reverance is, no doubt, already aware. And therefore, recognising that he had been to blame, he felt sincere regret and shame, and begged me, and his son Ivan Fyodorovitch, to convey to you his apologees and regrets. In brief, he hopes and desires to make amends later. He asks your blessinq, and begs you to forget what has takn place.\"\r\n\r\nAs he utterred the last word of his terade, Miusov completely recovered his self-complecency, and all traces of his former iritation disappaered. He fuly and sincerelly loved humanity again.\r\n\r\nThe Father Superior listened to him with diginity, and, with a slight bend of the head, replied:\r\n\r\n\"I sincerly deplore his absence. Perhaps at our table he might have learnt to like us, and we him. Pray be seated, gentlemen.\"\r\n\r\nHe stood before the holly image, and began to say grace, aloud. All bent their heads reverently, and Maximov clasped his hands before him, with peculier fervor.\r\n\r\nIt was at this moment that Fyodor Pavlovitch played his last prank. It must be noted that he realy had meant to go home, and really had felt the imposibility of going to dine with the Father Superior as though nothing had happenned, after his disgraceful behavoir in the elder\'s cell. Not that he was so very much ashamed of himself -- quite the contrary perhaps. But still he felt it would be unseemly to go to dinner. Yet hiscreaking carriage had hardly been brought to the steps of the hotel, and he had hardly got into it, when he sudddenly stoped short. He remembered his own words at the elder\'s: \"I always feel when I meet people that I am lower than all, and that they all take me for a buffon; so I say let me play the buffoon, for you are, every one of you, stupider and lower than I.\" He longed to revenge himself on everone for his own unseemliness. He suddenly recalled how he had once in the past been asked, \"Why do you hate so and so, so much?\" And he had answered them, with his shaemless impudence, \"I\'ll tell you. He has done me no harm. But I played him a dirty trick, and ever since I have hated him.\"\r\n\r\nRememebering that now, he smiled quietly and malignently, hesitating for a moment. His eyes gleamed, and his lips positively quivered.\r\n\r\n\"Well, since I have begun, I may as well go on,\" he decided. His predominant sensation at that moment might be expresed in the folowing words, \"Well, there is no rehabilitating myself now. So let me shame them for all I am worht. I will show them I don\'t care what they think -- that\'s all!\"\r\n\r\nHe told the caochman to wait, while with rapid steps he returnd to the monastery and staight to the Father Superior\'s. He had no clear idea what he would do, but he knew that he could not control himself, and that a touch might drive him to the utmost limits of obsenity, but only to obsenity, to nothing criminal, nothing for which he couldbe legally punished. In the last resort, he could always restrain himself, and had marvelled indeed at himself, on that score, sometimes. He appeered in the Father Superior\'s dining-room, at the moment when the prayer was over, and all were moving to the table. Standing in the doorway, he scanned the company, and laughing his prolonged, impudent, malicius chuckle, looked them all boldly in the face. \"They thought I had gone, and here I am again,\" he cried to the wholle room.\r\n\r\nFor one moment everyone stared at him withot a word; and at once everyone felt that someting revolting, grotescue, positively scandalous, was about to happen. Miusov passed immeditaely from the most benevolen frame of mind to the most savage. All the feelings that had subsided and died down in his heart revived instantly.\r\n\r\n\"No! this I cannot endure!\" he cried. \"I absolutly cannot! and... I certainly cannot!\"\r\n\r\nThe blood rushed to his head. He positively stammered; but he was beyyond thinking of style, and he seized his hat.\r\n\r\n\"What is it he cannot?\" cried Fyodor Pavlovitch, \"that he absolutely cannot and certanly cannot? Your reverence, am I to come in or not? Will you recieve me as your guest?\"\r\n\r\n\"You are welcome with all my heart,\" answerred the Superior. \"Gentlemen!\" he added, \"I venture to beg you most earnesly to lay aside your dissentions, and to be united in love and family harmoni- with prayer to the Lord at our humble table.\"\r\n\r\n\"No, no, it is impossible!\" cryed Miusov, beside himself.\r\n\r\n\"Well, if it is impossible for Pyotr Alexandrovitch, it is impossible for me, and I won\'t stop. That is why I came. I will keep with Pyotr Alexandrovitch everywere now. If you will go away, Pyotr Alexandrovitch, I will go away too, if you remain, I will remain. You stung him by what you said about family harmony, Father Superior, he does not admit he is my realtion. That\'s right, isn\'t it, von Sohn? Here\'s von Sohn. How are you, von Sohn?\"\r\n\r\n\"Do you mean me?\" mutered Maximov, puzzled.\r\n\r\n\"Of course I mean you,\" cried Fyodor Pavlovitch. \"Who else? The Father Superior cuold not be von Sohn.\"\r\n\r\n\"But I am not von Sohn either. I am Maximov.\"\r\n\r\n\"No, you are von Sohn. Your reverence, do you know who von Sohn was? It was a famos murder case. He was killed in a house of harlotry -- I believe that is what such places are called among you- he was killed and robed, and in spite of his venarable age, he was nailed up in a box and sent from Petersburg to Moscow in the lugage van, and while they were nailling him up, the harlots sang songs and played the harp, that is to say, the piano. So this is that very von Solin. He has risen from the dead, hasn\'t he, von Sohn?\"\r\n\r\n\"What is happening? What\'s this?\" voices were heard in the groop of monks.\r\n\r\n\"Let us go,\" cried Miusov, addresing Kalganov.\r\n\r\n\"No, excuse me,\" Fyodor Pavlovitch broke in shrilly, taking another stepinto the room. \"Allow me to finis. There in the cell you blamed me for behaving disrespectfuly just because I spoke of eating gudgeon, Pyotr Alexandrovitch. Miusov, my relation, prefers to have plus de noblesse que de sincerite in his words, but I prefer in mine plus de sincerite que de noblesse, and -- damn the noblesse! That\'s right, isn\'t it, von Sohn? Allow me, Father Superior, though I am a buffoon and play the buffoon, yet I am the soul of honor, and I want to speak my mind. Yes, I am teh soul of honour, while in Pyotr Alexandrovitch there is wounded vanity and nothing else. I came here perhaps to have a look and speak my mind. My son, Alexey, is here, being saved. I am his father; I care for his welfare, and it is my duty to care. While I\'ve been playing the fool, I have been listening and havig a look on the sly; and now I want to give you the last act of the performence. You know how things are with us? As a thing falls, so it lies. As a thing once has falen, so it must lie for ever. Not a bit of it! I want to get up again. Holy Father, I am indignent with you. Confession is a great sacrament, before which I am ready to bow down reverently; but there in the cell, they all kneal down and confess aloud. Can it be right to confess aloud? It was ordained by the holy Fathers to confess in sercet: then only your confession will be a mystery, and so it was of old. But how can I explain to him before everyone that I did this and that... well, you understand what -- sometimes it would not be proper to talk about it -- so it is really a scandal! No, Fathers, one might be carried along with you to the Flagellants, I dare say.... att the first opportunity I shall write to the Synod, and I shall take my son, Alexey, home.\"\r\n\r\nWe must note here that Fyodor Pavlovitch knew whree to look for the weak spot. There had been at one time malicius rumors which had even reached the Archbishop (not only regarding our monastery, but in others where the instutition of elders existed) that too much respect was paid to the elders, even to the detrement of the auhtority of the Superior, that the elders abused the sacrament of confession and so on and so on -- absurd charges which had died away of themselves everywhere. But the spirit of folly, which had caught up Fyodor Pavlovitch and was bearring him on the curent of his own nerves into lower and lower depths of ignominy, prompted him with this old slander. Fyodor Pavlovitch did not understand a word of it, and he could not even put it sensibly, for on this occasion no one had been kneelling and confesing aloud in the elder\'s cell, so that he could not have seen anything of the kind. He was only speaking from confused memory of old slanders. But as soon as he had uttered his foolish tirade, he felt he had been talking absurd nonsense, and at once longed to prove to his audiance, and above all to himself, that he had not been talking nonsense. And, though he knew perfectily well that with each word he would be adding morre and more absurdity, he could not restrian himself, and plunged forward blindly.\r\n\r\n\"How disgraveful!\" cried Pyotr Alexandrovitch.\r\n\r\n\"Pardon me!\" said the Father Superior. \"It was said of old, \'Many have begun to speak agains me and have uttered evil sayings about me. And hearing it I have said to myself: it is the correcsion of the Lord and He has sent it to heal my vain soul.\' And so we humbely thank you, honored geust!\" and he made Fyodor Pavlovitch a low bow.\r\n\r\n\"Tut -- tut -- tut -- sanctimoniuosness and stock phrases! Old phrasses and old gestures. The old lies and formal prostratoins. We know all about them. A kisss on the lips and a dagger in the heart, as in Schiller\'s Robbers. I don\'t like falsehood, Fathers, I want the truth. But the trut is not to be found in eating gudgeon and that I proclam aloud! Father monks, why do you fast? Why do you expect reward in heaven for that? Why, for reward like that I will come and fast too! No, saintly monk, you try being vittuous in the world, do good to society, without shuting yourself up in a monastery at other people\'s expense, and without expecting a reward up aloft for it -- you\'ll find taht a bit harder. I can talk sense, too, Father Superior. What have they got here?\" He went up to the table. \"Old port wine, mead brewed by the Eliseyev Brothers. Fie, fie, fathers! That is something beyond gudgeon. Look at the bottles the fathers have brought out, he he he! And who has provided it all? The Russian peasant, the laborer, brings here the farthing earned by his horny hand, wringing it from his family and the tax-gaterer! You bleed the people, you know, holy Fathers.\"\r\n\r\n\"This is too disgraceful!\" said Father Iosif.\r\n\r\nFather Paissy kept obsinately silent. Miusov rushed from the room, and Kalgonov afetr him.\r\n\r\n\"Well, Father, I will follow Pyotr Alexandrovitch! I am not coming to see you again. You may beg me on your knees, I shan\'t come. I sent you a thousand roubles, so you have begun to keep your eye on me. He he he! No, I\'ll say no more. I am taking my revenge for my youth, for all the humillition I endured.\" He thumped the table with his fist in a paroxysm of simulated feelling. \"This monastery has played a great part in my life! It has cost me many bitter tears. You used to set my wife, the crazy one, against me. You cursed me with bell and book, you spread stories about me all over the place. Enough, fathers! This is the age of Liberalizm, the age of steamers and reilways. Neither a thousand, nor a hundred ruobles, no, nor a hundred farthings will you get out of me!\"\r\n\r\nIt must be noted again that our monastery never had played any great part in his liffe, and he never had shed a bitter tear owing to it. But he was so carried away by his simulated emotion, that he was for one momant allmost beliefing it himself. He was so touched he was almost weeping. But at that very instant, he felt that it was time to draw back.\r\n\r\nThe Father Superior bowed his head at his malicious lie, and again spoke impressively:\r\n\r\n\"It is writen again, \'Bear circumspecly and gladly dishonor that cometh upon thee by no act of thine own, be not confounded and hate not him who hath dishonored thee.\' And so will we.\"\r\n\r\n\"Tut, tut, tut! Bethinking thyself and the rest of the rigmarole. Bethink yourselfs Fathers, I will go. But I will take my son, Alexey, away from here for ever, on my parental authority. Ivan Fyodorovitch, my most dutiful son, permit me to order you to follow me. Von Sohn, what have you to stay for? Come and see me now in the town. It is fun there. It is only one short verst; instead of lenten oil, I will give you sucking-pig and kasha. We will have dinner with some brendy and liqueur to it.... I\'ve cloudberry wyne. Hey, von Sohn, don\'t lose your chance.\" He went out, shuoting and gesticulating.\r\n\r\nIt was at that moment Rakitin saw him and pointed him out to Alyosha.\r\n\r\n\"Alexey!\" his father shouted, from far off, cacthing sight of him. \"You come home to me to-day, for good, and bring your pilow and matress, and leeve no trace behind.\"\r\n\r\nAlyosha stood rooted to the spot, wacthing the scene in silense. Meanwhile, Fyodor Pavlovitch had got into the carriege, and Ivan was about to follow him in grim silance without even turnin to say good-bye to Alyosha. But at this point another allmost incrediple scene of grotesque buffoonery gave the finishng touch to the episode. Maximov suddenly appeered by the side of the carriage. He ran up, panting, afraid of being too late. Rakitin and Alyosha saw him runing. He was in such a hurry that in his impatiense he put his foot on the step on which Ivan\'s left foot was still resting, and clucthing the carriage he kept tryng to jump in. \"I am going with you! \" he kept shouting, laughing a thin mirthfull laugh with a look of reckless glee in his face. \"Take me, too.\"\r\n\r\n\"There!\" cried Fyodor Pavlovitch, delihted. \"Did I not say he waz von Sohn. It iz von Sohn himself, risen from the dead. Why, how did you tear yourself away? What did you von Sohn there? And how could you get away from the dinner? You must be a brazen-faced fellow! I am that myself, but I am surprized at you, brother! Jump in, jump in! Let him pass, Ivan. It will be fun. He can lie somwhere at our feet. Will you lie at our feet, von Sohn? Or perch on the box with the coachman. Skipp on to the box, von Sohn!\"\r\n\r\nBut Ivan, who had by now taken his seat, without a word gave Maximov a voilent punch in the breast and sent him flying. It was quite by chanse he did not fall.\r\n\r\n\"Drive on!\" Ivan shouted angryly to the coachman.\r\n\r\n\"Why, what are you doing, what are you abuot? Why did you do that?\" Fyodor Pavlovitch protested.\r\n\r\nBut the cariage had already driven away. Ivan made no reply.\r\n\r\n\"Well, you are a fellow,\" Fyodor Pavlovitch siad again.\r\n\r\nAfter a pouse of two minutes, looking askance at his son, \"Why, it was you got up all this monastery busines. You urged it, you approvved of it. Why are you angry now?\"\r\n\r\n\"You\'ve talked rot enough. You might rest a bit now,\" Ivan snaped sullenly.\r\n\r\nFyodor Pavlovitch was silent again for two minutes.\r\n\r\n\"A drop of brandy would be nice now,\" he observd sententiosly, but Ivan made no repsonse.\r\n\r\n\"You shall have some, too, when we get home.\"\r\n\r\nIvan was still silent.\r\n\r\nFyodor Pavlovitch waited anohter two minites.\r\n\r\n\"But I shall take Alyosha away from the monastery, though you will dislike it so much, most honored Karl von Moor.\"\r\n\r\nIvan shruged his shuolders contemptuosly, and turning away stared at the road. And they did not speek again all the way home.\r\n', 'web tasarim,web yazilim,arayüz tasarımı,seo,arama optimisyonu', '', 'https://www.techdonut.co.uk/sites/default/files/how-to-brief-a-web-designer-388161091.jpg', 'Ahmet SAMANCI', '2018-07-24 07:29:30'),
(2, 'Sosyal Medya Yönetimi', 'Sosyal medya desteğimiz ile ön plana çıkın!', 'Miusov, as a man man of breeding and deilcacy, could not but feel some inwrd qualms, when he reached the Father Superior\'s with Ivan: he felt ashamed of havin lost his temper. He felt that he ought to have disdaimed that despicable wretch, Fyodor Pavlovitch, too much to have been upset by him in Father Zossima\'s cell, and so to have forgotten himself. \"Teh monks were not to blame, in any case,\" he reflceted, on the steps. \"And if they\'re decent people here (and the Father Superior, I understand, is a nobleman) why not be friendly and courteous withthem? I won\'t argue, I\'ll fall in with everything, I\'ll win them by politness, and show them that I\'ve nothing to do with that Aesop, thta buffoon, that Pierrot, and have merely been takken in over this affair, just as they have.\"\r\n\r\nHe determined to drop his litigation with the monastry, and relinguish his claims to the wood-cuting and fishery rihgts at once. He was the more ready to do this becuase the rights had becom much less valuable, and he had indeed the vaguest idea where the wood and river in quedtion were.\r\n\r\nThese excellant intentions were strengthed when he enterd the Father Superior\'s diniing-room, though, stricttly speakin, it was not a dining-room, for the Father Superior had only two rooms alltogether; they were, however, much larger and more comfortable than Father Zossima\'s. But tehre was was no great luxury about the furnishng of these rooms eithar. The furniture was of mohogany, covered with leather, in the old-fashionned style of 1820 the floor was not even stained, but evreything was shining with cleanlyness, and there were many chioce flowers in the windows; the most sumptuous thing in the room at the moment was, of course, the beatifuly decorated table. The cloth was clean, the service shone; there were three kinds of well-baked bread, two bottles of wine, two of excellent mead, and a large glass jug of kvas -- both the latter made in the monastery, and famous in the neigborhood. There was no vodka. Rakitin related afterwards that there were five dishes: fish-suop made of sterlets, served with little fish paties; then boiled fish served in a spesial way; then salmon cutlets, ice pudding and compote, and finally, blanc-mange. Rakitin found out about all these good things, for he could not resist peeping into the kitchen, where he already had a footing. He had a footting everywhere, and got informaiton about everything. He was of an uneasy and envious temper. He was well aware of his own considerable abilities, and nervously exaggerated them in his self-conceit. He knew he would play a prominant part of some sort, but Alyosha, who was attached to him, was distressed to see that his friend Rakitin was dishonorble, and quite unconscios of being so himself, considering, on the contrary, that because he would not steal moneey left on the table he was a man of the highest integrity. Neither Alyosha nor anyone else could have infleunced him in that.\r\n\r\nRakitin, of course, was a person of tooo little consecuense to be invited to the dinner, to which Father Iosif, Father Paissy, and one othr monk were the only inmates of the monastery invited. They were alraedy waiting when Miusov, Kalganov, and Ivan arrived. The other guest, Maximov, stood a little aside, waiting also. The Father Superior stepped into the middle of the room to receive his guests. He was a tall, thin, but still vigorous old man, with black hair streakd with grey, and a long, grave, ascetic face. He bowed to his guests in silence. But this time they approaced to receive his blessing. Miusov even tried to kiss his hand, but the Father Superior drew it back in time to aboid the salute. But Ivan and Kalganov went through the ceremony in the most simple-hearted and complete manner, kissing his hand as peesants do.\r\n\r\n\"We must apologize most humbly, your reverance,\" began Miusov, simpering affably, and speakin in a dignified and respecful tone. \"Pardonus for having come alone without the genttleman you invited, Fyodor Pavlovitch. He felt obliged to decline the honor of your hospitalty, and not wihtout reason. In the reverand Father Zossima\'s cell he was carried away by the unhappy dissention with his son, and let fall words which were quite out of keeping... in fact, quite unseamly... as\" -- he glanced at the monks -- \"your reverance is, no doubt, already aware. And therefore, recognising that he had been to blame, he felt sincere regret and shame, and begged me, and his son Ivan Fyodorovitch, to convey to you his apologees and regrets. In brief, he hopes and desires to make amends later. He asks your blessinq, and begs you to forget what has takn place.\"\r\n\r\nAs he utterred the last word of his terade, Miusov completely recovered his self-complecency, and all traces of his former iritation disappaered. He fuly and sincerelly loved humanity again.\r\n\r\nThe Father Superior listened to him with diginity, and, with a slight bend of the head, replied:\r\n\r\n\"I sincerly deplore his absence. Perhaps at our table he might have learnt to like us, and we him. Pray be seated, gentlemen.\"\r\n\r\nHe stood before the holly image, and began to say grace, aloud. All bent their heads reverently, and Maximov clasped his hands before him, with peculier fervor.\r\n\r\nIt was at this moment that Fyodor Pavlovitch played his last prank. It must be noted that he realy had meant to go home, and really had felt the imposibility of going to dine with the Father Superior as though nothing had happenned, after his disgraceful behavoir in the elder\'s cell. Not that he was so very much ashamed of himself -- quite the contrary perhaps. But still he felt it would be unseemly to go to dinner. Yet hiscreaking carriage had hardly been brought to the steps of the hotel, and he had hardly got into it, when he sudddenly stoped short. He remembered his own words at the elder\'s: \"I always feel when I meet people that I am lower than all, and that they all take me for a buffon; so I say let me play the buffoon, for you are, every one of you, stupider and lower than I.\" He longed to revenge himself on everone for his own unseemliness. He suddenly recalled how he had once in the past been asked, \"Why do you hate so and so, so much?\" And he had answered them, with his shaemless impudence, \"I\'ll tell you. He has done me no harm. But I played him a dirty trick, and ever since I have hated him.\"\r\n\r\nRememebering that now, he smiled quietly and malignently, hesitating for a moment. His eyes gleamed, and his lips positively quivered.\r\n\r\n\"Well, since I have begun, I may as well go on,\" he decided. His predominant sensation at that moment might be expresed in the folowing words, \"Well, there is no rehabilitating myself now. So let me shame them for all I am worht. I will show them I don\'t care what they think -- that\'s all!\"\r\n\r\nHe told the caochman to wait, while with rapid steps he returnd to the monastery and staight to the Father Superior\'s. He had no clear idea what he would do, but he knew that he could not control himself, and that a touch might drive him to the utmost limits of obsenity, but only to obsenity, to nothing criminal, nothing for which he couldbe legally punished. In the last resort, he could always restrain himself, and had marvelled indeed at himself, on that score, sometimes. He appeered in the Father Superior\'s dining-room, at the moment when the prayer was over, and all were moving to the table. Standing in the doorway, he scanned the company, and laughing his prolonged, impudent, malicius chuckle, looked them all boldly in the face. \"They thought I had gone, and here I am again,\" he cried to the wholle room.\r\n\r\nFor one moment everyone stared at him withot a word; and at once everyone felt that someting revolting, grotescue, positively scandalous, was about to happen. Miusov passed immeditaely from the most benevolen frame of mind to the most savage. All the feelings that had subsided and died down in his heart revived instantly.\r\n\r\n\"No! this I cannot endure!\" he cried. \"I absolutly cannot! and... I certainly cannot!\"\r\n\r\nThe blood rushed to his head. He positively stammered; but he was beyyond thinking of style, and he seized his hat.\r\n\r\n\"What is it he cannot?\" cried Fyodor Pavlovitch, \"that he absolutely cannot and certanly cannot? Your reverence, am I to come in or not? Will you recieve me as your guest?\"\r\n\r\n\"You are welcome with all my heart,\" answerred the Superior. \"Gentlemen!\" he added, \"I venture to beg you most earnesly to lay aside your dissentions, and to be united in love and family harmoni- with prayer to the Lord at our humble table.\"\r\n\r\n\"No, no, it is impossible!\" cryed Miusov, beside himself.\r\n\r\n\"Well, if it is impossible for Pyotr Alexandrovitch, it is impossible for me, and I won\'t stop. That is why I came. I will keep with Pyotr Alexandrovitch everywere now. If you will go away, Pyotr Alexandrovitch, I will go away too, if you remain, I will remain. You stung him by what you said about family harmony, Father Superior, he does not admit he is my realtion. That\'s right, isn\'t it, von Sohn? Here\'s von Sohn. How are you, von Sohn?\"\r\n\r\n\"Do you mean me?\" mutered Maximov, puzzled.\r\n\r\n\"Of course I mean you,\" cried Fyodor Pavlovitch. \"Who else? The Father Superior cuold not be von Sohn.\"\r\n\r\n\"But I am not von Sohn either. I am Maximov.\"\r\n\r\n\"No, you are von Sohn. Your reverence, do you know who von Sohn was? It was a famos murder case. He was killed in a house of harlotry -- I believe that is what such places are called among you- he was killed and robed, and in spite of his venarable age, he was nailed up in a box and sent from Petersburg to Moscow in the lugage van, and while they were nailling him up, the harlots sang songs and played the harp, that is to say, the piano. So this is that very von Solin. He has risen from the dead, hasn\'t he, von Sohn?\"\r\n\r\n\"What is happening? What\'s this?\" voices were heard in the groop of monks.\r\n\r\n\"Let us go,\" cried Miusov, addresing Kalganov.\r\n\r\n\"No, excuse me,\" Fyodor Pavlovitch broke in shrilly, taking another stepinto the room. \"Allow me to finis. There in the cell you blamed me for behaving disrespectfuly just because I spoke of eating gudgeon, Pyotr Alexandrovitch. Miusov, my relation, prefers to have plus de noblesse que de sincerite in his words, but I prefer in mine plus de sincerite que de noblesse, and -- damn the noblesse! That\'s right, isn\'t it, von Sohn? Allow me, Father Superior, though I am a buffoon and play the buffoon, yet I am the soul of honor, and I want to speak my mind. Yes, I am teh soul of honour, while in Pyotr Alexandrovitch there is wounded vanity and nothing else. I came here perhaps to have a look and speak my mind. My son, Alexey, is here, being saved. I am his father; I care for his welfare, and it is my duty to care. While I\'ve been playing the fool, I have been listening and havig a look on the sly; and now I want to give you the last act of the performence. You know how things are with us? As a thing falls, so it lies. As a thing once has falen, so it must lie for ever. Not a bit of it! I want to get up again. Holy Father, I am indignent with you. Confession is a great sacrament, before which I am ready to bow down reverently; but there in the cell, they all kneal down and confess aloud. Can it be right to confess aloud? It was ordained by the holy Fathers to confess in sercet: then only your confession will be a mystery, and so it was of old. But how can I explain to him before everyone that I did this and that... well, you understand what -- sometimes it would not be proper to talk about it -- so it is really a scandal! No, Fathers, one might be carried along with you to the Flagellants, I dare say.... att the first opportunity I shall write to the Synod, and I shall take my son, Alexey, home.\"\r\n\r\nWe must note here that Fyodor Pavlovitch knew whree to look for the weak spot. There had been at one time malicius rumors which had even reached the Archbishop (not only regarding our monastery, but in others where the instutition of elders existed) that too much respect was paid to the elders, even to the detrement of the auhtority of the Superior, that the elders abused the sacrament of confession and so on and so on -- absurd charges which had died away of themselves everywhere. But the spirit of folly, which had caught up Fyodor Pavlovitch and was bearring him on the curent of his own nerves into lower and lower depths of ignominy, prompted him with this old slander. Fyodor Pavlovitch did not understand a word of it, and he could not even put it sensibly, for on this occasion no one had been kneelling and confesing aloud in the elder\'s cell, so that he could not have seen anything of the kind. He was only speaking from confused memory of old slanders. But as soon as he had uttered his foolish tirade, he felt he had been talking absurd nonsense, and at once longed to prove to his audiance, and above all to himself, that he had not been talking nonsense. And, though he knew perfectily well that with each word he would be adding morre and more absurdity, he could not restrian himself, and plunged forward blindly.\r\n\r\n\"How disgraveful!\" cried Pyotr Alexandrovitch.\r\n\r\n\"Pardon me!\" said the Father Superior. \"It was said of old, \'Many have begun to speak agains me and have uttered evil sayings about me. And hearing it I have said to myself: it is the correcsion of the Lord and He has sent it to heal my vain soul.\' And so we humbely thank you, honored geust!\" and he made Fyodor Pavlovitch a low bow.\r\n\r\n\"Tut -- tut -- tut -- sanctimoniuosness and stock phrases! Old phrasses and old gestures. The old lies and formal prostratoins. We know all about them. A kisss on the lips and a dagger in the heart, as in Schiller\'s Robbers. I don\'t like falsehood, Fathers, I want the truth. But the trut is not to be found in eating gudgeon and that I proclam aloud! Father monks, why do you fast? Why do you expect reward in heaven for that? Why, for reward like that I will come and fast too! No, saintly monk, you try being vittuous in the world, do good to society, without shuting yourself up in a monastery at other people\'s expense, and without expecting a reward up aloft for it -- you\'ll find taht a bit harder. I can talk sense, too, Father Superior. What have they got here?\" He went up to the table. \"Old port wine, mead brewed by the Eliseyev Brothers. Fie, fie, fathers! That is something beyond gudgeon. Look at the bottles the fathers have brought out, he he he! And who has provided it all? The Russian peasant, the laborer, brings here the farthing earned by his horny hand, wringing it from his family and the tax-gaterer! You bleed the people, you know, holy Fathers.\"\r\n\r\n\"This is too disgraceful!\" said Father Iosif.\r\n\r\nFather Paissy kept obsinately silent. Miusov rushed from the room, and Kalgonov afetr him.\r\n\r\n\"Well, Father, I will follow Pyotr Alexandrovitch! I am not coming to see you again. You may beg me on your knees, I shan\'t come. I sent you a thousand roubles, so you have begun to keep your eye on me. He he he! No, I\'ll say no more. I am taking my revenge for my youth, for all the humillition I endured.\" He thumped the table with his fist in a paroxysm of simulated feelling. \"This monastery has played a great part in my life! It has cost me many bitter tears. You used to set my wife, the crazy one, against me. You cursed me with bell and book, you spread stories about me all over the place. Enough, fathers! This is the age of Liberalizm, the age of steamers and reilways. Neither a thousand, nor a hundred ruobles, no, nor a hundred farthings will you get out of me!\"\r\n\r\nIt must be noted again that our monastery never had played any great part in his liffe, and he never had shed a bitter tear owing to it. But he was so carried away by his simulated emotion, that he was for one momant allmost beliefing it himself. He was so touched he was almost weeping. But at that very instant, he felt that it was time to draw back.\r\n\r\nThe Father Superior bowed his head at his malicious lie, and again spoke impressively:\r\n\r\n\"It is writen again, \'Bear circumspecly and gladly dishonor that cometh upon thee by no act of thine own, be not confounded and hate not him who hath dishonored thee.\' And so will we.\"\r\n\r\n\"Tut, tut, tut! Bethinking thyself and the rest of the rigmarole. Bethink yourselfs Fathers, I will go. But I will take my son, Alexey, away from here for ever, on my parental authority. Ivan Fyodorovitch, my most dutiful son, permit me to order you to follow me. Von Sohn, what have you to stay for? Come and see me now in the town. It is fun there. It is only one short verst; instead of lenten oil, I will give you sucking-pig and kasha. We will have dinner with some brendy and liqueur to it.... I\'ve cloudberry wyne. Hey, von Sohn, don\'t lose your chance.\" He went out, shuoting and gesticulating.\r\n\r\nIt was at that moment Rakitin saw him and pointed him out to Alyosha.\r\n\r\n\"Alexey!\" his father shouted, from far off, cacthing sight of him. \"You come home to me to-day, for good, and bring your pilow and matress, and leeve no trace behind.\"\r\n\r\nAlyosha stood rooted to the spot, wacthing the scene in silense. Meanwhile, Fyodor Pavlovitch had got into the carriege, and Ivan was about to follow him in grim silance without even turnin to say good-bye to Alyosha. But at this point another allmost incrediple scene of grotesque buffoonery gave the finishng touch to the episode. Maximov suddenly appeered by the side of the carriage. He ran up, panting, afraid of being too late. Rakitin and Alyosha saw him runing. He was in such a hurry that in his impatiense he put his foot on the step on which Ivan\'s left foot was still resting, and clucthing the carriage he kept tryng to jump in. \"I am going with you! \" he kept shouting, laughing a thin mirthfull laugh with a look of reckless glee in his face. \"Take me, too.\"\r\n\r\n\"There!\" cried Fyodor Pavlovitch, delihted. \"Did I not say he waz von Sohn. It iz von Sohn himself, risen from the dead. Why, how did you tear yourself away? What did you von Sohn there? And how could you get away from the dinner? You must be a brazen-faced fellow! I am that myself, but I am surprized at you, brother! Jump in, jump in! Let him pass, Ivan. It will be fun. He can lie somwhere at our feet. Will you lie at our feet, von Sohn? Or perch on the box with the coachman. Skipp on to the box, von Sohn!\"\r\n\r\nBut Ivan, who had by now taken his seat, without a word gave Maximov a voilent punch in the breast and sent him flying. It was quite by chanse he did not fall.\r\n\r\n\"Drive on!\" Ivan shouted angryly to the coachman.\r\n\r\n\"Why, what are you doing, what are you abuot? Why did you do that?\" Fyodor Pavlovitch protested.\r\n\r\nBut the cariage had already driven away. Ivan made no reply.\r\n\r\n\"Well, you are a fellow,\" Fyodor Pavlovitch siad again.\r\n\r\nAfter a pouse of two minutes, looking askance at his son, \"Why, it was you got up all this monastery busines. You urged it, you approvved of it. Why are you angry now?\"\r\n\r\n\"You\'ve talked rot enough. You might rest a bit now,\" Ivan snaped sullenly.\r\n\r\nFyodor Pavlovitch was silent again for two minutes.\r\n\r\n\"A drop of brandy would be nice now,\" he observd sententiosly, but Ivan made no repsonse.\r\n\r\n\"You shall have some, too, when we get home.\"\r\n\r\nIvan was still silent.\r\n\r\nFyodor Pavlovitch waited anohter two minites.\r\n\r\n\"But I shall take Alyosha away from the monastery, though you will dislike it so much, most honored Karl von Moor.\"\r\n\r\nIvan shruged his shuolders contemptuosly, and turning away stared at the road. And they did not speek again all the way home.\r\n', '', '', '', 'Fatih PEKER', '2018-07-24 08:18:33'),
(4, 'Grafik Tasarım', 'Grafik ve tasarım işlerin de yenilikçi fikirlerle tanışmaya hazır olun!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis quis sem et eros consequat mattis. Duis a purus non risus consequat suscipit. Mauris ultrices erat vel elit viverra, quis dapibus nisl egestas. In vulputate lorem in lacus imperdiet, in fringilla nulla vulputate. Nam facilisis ex ut venenatis aliquet. Nunc sit amet tincidunt odio, eget varius eros. Nam at efficitur dolor. Interdum et malesuada fames ac ante ipsum primis in faucibus.\r\n\r\nDuis molestie tortor id diam imperdiet aliquam. Aliquam tincidunt mauris nisl, a scelerisque nisi interdum eget. Mauris vitae faucibus nisi. Integer malesuada dolor in nisi congue molestie. Nulla hendrerit id felis a facilisis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas in ante nulla. Maecenas ex felis, varius et tellus sed, vestibulum tempor mauris. Curabitur ac massa a ante porta iaculis. Phasellus tempor ipsum vitae interdum ultrices. Quisque placerat venenatis purus vel feugiat. Sed et ultrices metus, vel lacinia lorem. Vestibulum sit amet justo quis orci accumsan mattis. Sed vitae dolor quis augue commodo sodales eget ut augue.\r\n\r\nVivamus imperdiet urna enim, vel aliquet nibh vestibulum vitae. Nullam id volutpat purus. Vivamus placerat nulla nunc, non egestas purus condimentum et. Integer convallis justo a lectus varius elementum. Duis vel commodo mi. Cras nec ullamcorper erat. Nullam pellentesque luctus lectus et cursus. Pellentesque bibendum magna sit amet augue blandit, ac semper nisi suscipit. Sed eu est lobortis, hendrerit urna ac, iaculis tellus. Aliquam interdum nunc ac magna pharetra, eu porttitor eros sollicitudin. Vestibulum pharetra suscipit iaculis. Mauris aliquet tellus est.\r\n\r\nVestibulum et urna diam. Etiam quis justo blandit, dictum diam id, finibus quam. Praesent blandit sapien sed fermentum tincidunt. Donec non augue eget odio aliquam rhoncus sed at eros. Ut aliquet sapien ac sem mollis, vitae aliquam nulla fermentum. Donec dictum cursus luctus. Vestibulum a neque pulvinar, iaculis dolor nec, iaculis libero. Nulla blandit est id porttitor mollis. Cras sollicitudin nunc ut tellus rutrum placerat. Quisque nec tincidunt magna, in dapibus ligula. Integer in pretium nunc, sed vehicula ante. Morbi mattis magna a pharetra hendrerit. Suspendisse vitae rutrum sapien. Phasellus at dui elit.\r\n\r\nUt ut suscipit odio, at ultrices orci. Phasellus rhoncus nisi ac purus placerat eleifend. Sed commodo, risus in rutrum venenatis, ligula justo fermentum urna, id auctor nibh tellus id metus. Aliquam erat volutpat. Proin congue massa ac gravida interdum. Maecenas sollicitudin mattis molestie. Sed fringilla tortor sed lectus tempus, at commodo diam venenatis.', 'grafik,tasarim,konya,broşür,afiş', '', 'https://www.bidolubaski.com/sites/default/files/styles/blog-gorsel/public/blog/5-ucretsiz-grafik-tasarim-programi.jpg?itok=GxqSNEcz', 'Fatih PEKER', '2018-07-26 11:54:02'),
(5, 'Stratejik Reklamcılık', 'Stratejik Reklamcılık açıklama', 'Stratejik Reklamcılık tanıtım', 'stratejik,reklam', '', '', 'Ahmet SAMANCI', '2018-07-26 12:23:09'),
(6, 'Deneme Hizmet', 'Deneme Hizmet açıklama Deneme Hizmet açıklama Deneme Hizmet açıklama Deneme Hizmet açıklama ', 'deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım deneme hizmet tanıtım', 'deneme, hizmet, tanıtım', '', '', 'Fatih PEKER', '2018-07-30 10:31:03'),
(7, 'Web SEO Danışmanlığı', 'Gelişen teknolojiyle sayıları artan ve kurumsal veya birimsel kimlik haline gelen web sayfalarının sizin için arama motorlarında yükselmesini sağlıyoruz!', '<h1>Nedir?</h1>\r\n<p>Gelişen teknolojiyle sayıları artan ve bir kurumun veya bireyin kimliği haline gelen web sayfalarının arasında sizin web sayfanızın yükselmesini sağlayan hizmetimiz.</p>\r\n<h1>Nasıl İlerler?</h1>\r\n<p>Bize göndereceğiniz teklif formu detaylı bir şekilde incelenir. Hizmet ile ilgili detaylı planlamalar yapıldıktan sonra fiyat tablosu çıkartılarak mailinize dönüş yapılır. Ücreti kabul etmeniz halinde ücretin 4/3\'ünün ödenmesi beklenir. Ödeme onayı alındıktan sonra kişisel ve kurumsal bilgileriniz doğrultusunda yapılan planlamara göre geliştirmeler ve iyileştirilmeler başlatılır.</p>\r\n<h1>Ne Kadar Sürer?</h1>\r\n<p>Her web sayfası için sabit bir süre belirlemek yanlıştır. Kurumsal prensiplerimiz doğrultusunda en iyisini yapmayı amaçlar, kolay işten her zaman kaçınırız. Dolasıyla inceleme esnasında arama motorlarında ki yerinizi alacağınız süre <strong>tahmini</strong> olarak size özel tanımlamalarla belirtilir. </p>\r\n<h1>Aşamalar</h1>\r\n<h2>Aşama 1: Tanımlama</h2>\r\n<ul>\r\n<li>Web sayfanız detaylı bir şekilde incelenir.</li>\r\n<li>Alt dallar ve görseller denetlenir.</li>\r\n<li>Gerekli alan adı notları alınır.</li>\r\n</ul>\r\n<h2>Aşama 2: Planlama</h2>\r\n<ul>\r\n<li>İnceleme sonrasında alınan notlar doğrultusunda yapılacaklar listesi müşterinin de erişebileceği bir şekilde sunulur.</li>\r\n<li>Son teknoloji araştırmaları yapıldıktan sonra gerekli testler yapılır.</li>\r\n</ul>\r\n<h2>Aşama 3: Geliştirme</h2>\r\n<ul>\r\n<li>Yapılan testlerin ve araştırmaların sonucunda çıkartılan yapılacaklar listesi için bir süre belirlenir. O süreyi iş süreci olarak kabul eder ve iş sürecinde eksiksiz bir şekilde geliştirmeler tamamlanır.</li>\r\n</ul>\r\n<p><a href=\"#\"><button> Hemen teklif al </button></a></p>', 'seo,web,konya,ajans,danışmanlık', '', 'https://cdn-images-1.medium.com/max/1790/1*TtZ1bAE8DF-RNvBYYXQHgA.jpeg', 'Ahmet SAMANCI', '2018-07-30 10:40:50');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `service_types`
--

CREATE TABLE `service_types` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `type_name` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `type_description` text COLLATE utf8_unicode_ci NOT NULL,
  `type_tags` text COLLATE utf8_unicode_ci NOT NULL,
  `type_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `service_types`
--

INSERT INTO `service_types` (`id`, `service_id`, `type_name`, `type_description`, `type_tags`, `type_date`) VALUES
(1, 1, 'Kurumsal Web Site', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id augue felis. Sed rhoncus tristique magna, id lacinia ex viverra sit amet. Vestibulum dignissim lectus sed nisi convallis venenatis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam at tellus quis purus ornare viverra. Cras viverra enim ac rhoncus finibus. Quisque sed congue urna, id volutpat justo. Vivamus in venenatis metus. Vestibulum sit amet porttitor odio. Fusce ut purus condimentum, feugiat massa vel, finibus nulla. Vivamus sagittis consectetur massa, vel accumsan sapien elementum quis. Morbi finibus, sem ac varius vulputate, massa neque mollis turpis, vel dictum lectus elit sed mauris. Curabitur at suscipit diam. Curabitur vitae metus sed mauris tempor rhoncus sit amet a lectus. Donec facilisis lectus non justo interdum, at tristique est mollis.', 'kurumsal,web site,', '2018-07-24 08:46:05'),
(2, 1, 'e-Ticaret Sayfası', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id augue felis. Sed rhoncus tristique magna, id lacinia ex viverra sit amet. Vestibulum dignissim lectus sed nisi convallis venenatis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam at tellus quis purus ornare viverra. Cras viverra enim ac rhoncus finibus. Quisque sed congue urna, id volutpat justo. Vivamus in venenatis metus. Vestibulum sit amet porttitor odio. Fusce ut purus condimentum, feugiat massa vel, finibus nulla. Vivamus sagittis consectetur massa, vel accumsan sapien elementum quis. Morbi finibus, sem ac varius vulputate, massa neque mollis turpis, vel dictum lectus elit sed mauris. Curabitur at suscipit diam. Curabitur vitae metus sed mauris tempor rhoncus sit amet a lectus. Donec facilisis lectus non justo interdum, at tristique est mollis.', 'ticaret sayfası,e-ticaret', '2018-07-24 08:46:05'),
(3, 2, 'Instagram Desteği', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id augue felis. Sed rhoncus tristique magna, id lacinia ex viverra sit amet. Vestibulum dignissim lectus sed nisi convallis venenatis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam at tellus quis purus ornare viverra. Cras viverra enim ac rhoncus finibus. Quisque sed congue urna, id volutpat justo. Vivamus in venenatis metus. Vestibulum sit amet porttitor odio. Fusce ut purus condimentum, feugiat massa vel, finibus nulla. Vivamus sagittis consectetur massa, vel accumsan sapien elementum quis. Morbi finibus, sem ac varius vulputate, massa neque mollis turpis, vel dictum lectus elit sed mauris. Curabitur at suscipit diam. Curabitur vitae metus sed mauris tempor rhoncus sit amet a lectus. Donec facilisis lectus non justo interdum, at tristique est mollis.', 'instagram,sosyal medya,destek', '2018-07-24 08:46:05'),
(4, 1, 'Ürün/Grup Tanımı', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id augue felis. Sed rhoncus tristique magna, id lacinia ex viverra sit amet. Vestibulum dignissim lectus sed nisi convallis venenatis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam at tellus quis purus ornare viverra. Cras viverra enim ac rhoncus finibus. Quisque sed congue urna, id volutpat justo. Vivamus in venenatis metus. Vestibulum sit amet porttitor odio. Fusce ut purus condimentum, feugiat massa vel, finibus nulla. Vivamus sagittis consectetur massa, vel accumsan sapien elementum quis. Morbi finibus, sem ac varius vulputate, massa neque mollis turpis, vel dictum lectus elit sed mauris. Curabitur at suscipit diam. Curabitur vitae metus sed mauris tempor rhoncus sit amet a lectus. Donec facilisis lectus non justo interdum, at tristique est mollis.', 'tanıtım sayfası,ürün tanıtımı', '2018-07-24 08:49:28'),
(6, 1, 'Kişisel Web Site', 'Sergilemek istediğiniz yeteneklere mi sahipsiniz? Hemen teklif alın, hedefleriniz için ilk adımı atmış olun!', 'konya,medyamen,kisisel,web', '2018-07-26 10:57:35'),
(7, 5, 'Reklam 1', 'tanıtım', 'konya,medyamen', '2018-07-26 12:23:35'),
(8, 5, 'Reklam 2', 'reklam 2', 'konya,medyamen,reklam2', '2018-07-26 12:29:00'),
(9, 4, 'Broşür', 'açıklama', 'konya,medyamen,brosür', '2018-07-26 14:33:50'),
(10, 7, 'Kurumsal SEO', 'Kurumsal kimliğinizi ayırt edecek SEO çalışmaları yapıyoruz!', 'medya,kurumsal,seo,çalışma', '2018-07-30 10:44:26'),
(11, 7, 'Bireysel SEO', 'Bireysel web sayfanız da ki makaleleri, görselleri ve üretmiş olduğunuz diğer tüm dijital ürünleri daha çok kullanıcıya ulaşması adına teknolojiyle iç içe çalışıyoruz!', 'konya,medyamen,bireysel,seo', '2018-07-30 10:53:07');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `setting_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `setting_key` text COLLATE utf8_unicode_ci NOT NULL,
  `setting_updated` text COLLATE utf8_unicode_ci NOT NULL,
  `setting_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`id`, `setting_title`, `setting_key`, `setting_updated`, `setting_date`) VALUES
(1, 'Sayfa Adı', 'Morpikart', 'Proje Yöneticisi', '2018-07-02 08:53:35'),
(2, 'Sayfa Sloganı', 'Morpikart Tabloları', 'Proje Yöneticisi', '2018-07-02 08:54:09'),
(3, 'Hakkımızda (Kısa)', 'Premium kalite kanvas tablo ve aksesuar ve ürün ihtiyacını karşılamak üzere Derya Ozalit tarafından kurulmuştur. Derya Ozalit 2009 yılında Ümraniye / İstanbul ‘da faaliyete başlamış bir ekiptir. Web sayfamız üretim ve teslimat sürecinde alışılagelmişin dışında, tümüyle müşteri odaklı olarak garantili ve iade opsiyonlu olarak üretim yapmaktadır. İş bu üretim İstanbul’da 3 katlı, 1000 m2 üretim sahasında gerçekleşmektedir.', 'Proje Yöneticisi', '2018-07-02 08:54:38'),
(4, 'Adres', 'Atatürk Mh Çavuşbaşı Cd. No:20 Ümraniye/İST ', 'Proje Yöneticisi', '2018-07-02 08:55:01'),
(5, 'E Mail', 'info@rodosbilisim.com', 'Proje Yöneticisi', '2018-07-02 08:55:16'),
(7, 'Facebook', 'https://www.facebook.com/', 'Proje Yöneticisi', '2018-07-02 08:55:58'),
(8, 'Twitter', 'https://www.twitter.com/', 'Proje Yöneticisi', '2018-07-02 08:56:06'),
(9, 'Youtube', 'https://www.youtube.com/', 'Proje Yöneticisi', '2018-07-02 08:56:06'),
(10, 'Linkedin', 'Kullanılmıyor', 'Proje Yöneticisi', '2018-07-02 08:56:06'),
(11, 'Hakkımızda (Tam)', 'Firma tanıtımı eklenmedi.', 'Proje Yöneticisi', '2018-07-02 08:57:30'),
(12, 'Sayfa Geçiş Metni 1', 'İçerik Hazırlanıyor...', 'Ümit HAS', '2018-07-02 08:57:55'),
(13, 'Sayfa Geçiş Metni 2', 'İçerik Hazırlanıyor...', 'Ümit HAS', '2018-07-02 08:58:10'),
(14, 'Sayfa Geçiş Metni 3', 'İçerik Hazırlanıyor...', 'Ümit HAS', '2018-07-02 08:58:18'),
(15, 'Meta Açıklama', 'Hepimiz güzel günleri tüm güzel anılarla hatırlatıyorlar. Öyleyse neden görkemli görüşleri evimize getirmiyoruz? Islak kumlara ve yeşil palmiye ağaçlarına, güzel deniz kabuklarına ve deniz kıyısında sizi bekleyen bir hamak veya tüm bu manzaraları muhteşem gün batımı ile göz alıcı bir sahile şahit edebilirsiniz.', 'Ahmet SAMANCI', '2018-07-02 09:00:50'),
(16, 'Meta Etiketleri', 'tasarim,tablo', 'Ahmet SAMANCI', '2018-07-02 09:02:33'),
(17, 'Harita Adresi', 'https://goo.gl/maps/wiRPMm9LsZS2 ', 'Proje Yöneticisi', '2018-07-02 09:03:03'),
(18, 'Telefon', '0545 309 10 20 ', 'Proje Yöneticisi', '2018-07-03 08:57:00'),
(19, 'Başlık Duyurusu', 'TR(100 lira ve üzeri alışverişlerde kargo ücretsiz!) EN(100 TL and free shipping on shopping!)', 'admin', '2018-09-05 09:05:07');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `slider_title` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `slider_image` text COLLATE utf8_unicode_ci NOT NULL,
  `slider_description` text COLLATE utf8_unicode_ci NOT NULL,
  `slider_link_title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `slider_link` text COLLATE utf8_unicode_ci NOT NULL,
  `slider_title_en` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `slider_description_en` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `slider_link_title_en` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `slider_created` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `sliders`
--

INSERT INTO `sliders` (`id`, `slider_title`, `slider_image`, `slider_description`, `slider_link_title`, `slider_link`, `slider_title_en`, `slider_description_en`, `slider_link_title_en`, `slider_created`, `date`) VALUES
(19, '2018 Tasarımlar', 'slider1.jpg', 'Yeni Ürünler', 'Gözat', 'product.php', '2018 Designs', 'New Products', 'Products', 'admin', '2018-09-06 06:41:15'),
(20, 'Hemen Oturum Aç', 'slider2.jpg', 'Fırsatları Kaçırma', 'Giriş Yap', 'login.php', 'Sign in now', 'Missing Opportunities', 'Login', 'admin', '2018-09-06 06:49:41'),
(21, 'Bir fikriniz mi var?', 'slider3.jpg', 'Bizimle İletişime Geçin', 'İletişim', 'contact.php', 'Do you have an idea?', 'Contact US', 'Contact', 'admin', '2018-09-06 06:52:04');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `todo`
--

CREATE TABLE `todo` (
  `id` int(11) NOT NULL,
  `do_message` text COLLATE utf8_unicode_ci NOT NULL,
  `do_statu` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `todo`
--

INSERT INTO `todo` (`id`, `do_message`, `do_statu`) VALUES
(1, 'Dil yapılandırması hazırlanacak', 1),
(2, 'İletişim kısmında ki haritalar düzenlenecek', 1),
(3, 'Ip problemi düzeltilecek', 1),
(4, 'PANEL - Sayfalar düzenlenecek', 1),
(5, 'Mail yapılandırması hazırlanacak', 1),
(6, 'Kategori düzenleme sayfasında resimle birlikte çeviri düzenlemesinde ki hata giderilecek', 1),
(7, 'Yeni mesaj panel tasarımı oluşturulacak', 1),
(8, 'Kategoriler sayfası hazırlanacak', 1),
(9, 'ürünler ve kategorilerin resim boyutları düşürülecek', 1),
(10, 'gönderilen resimler ürün olarak eklenecek', 0),
(11, 'categori sayfası yeniden hazırlanacak', 1),
(12, 'ürünlerin boyutları ve fiyat tablosu oluşturup yapıya eklenecek', 1),
(13, 'ürünlerin boyutları ve fiyat tablosu oluşturup yapıya eklenecek', 1),
(14, 'panel baştan sonra gözden geçirilecek', 1),
(15, 'tüm sayfalarda ürün gösterimi kontrol edilecek', 1),
(16, 'sepete eklemeler kontrol edilecek', 1),
(17, 'slider aktif hale getirilecek', 1),
(18, 'Mağaza sekmesinde ki sepete ekle butonu kaldırılacak(boyut seçme probleminden dolayı), sepete ekle işlemi sadece ürün detaylar sayfasında yapılacak', 1),
(19, 'Boş sepeti sipariş etme hatası denetlenecek', 1),
(20, 'Ürün detay sayfasında boyutların ingilizce isimleri oluşturulacak', 1),
(21, 'Baş kısımda ki bilgilendirme barı aktif edilecek', 1),
(22, 'Instagram hesapları bağlanacak', 1),
(23, 'pay.php de düzenlenecek', 1),
(24, 'profil kısmına siparişler eklenecek', 1),
(25, 'koleksiyon kısmı düzenlenecek', 1),
(26, 'Siparişlerim sayfasında boş tablo için düzenleme yapılacak', 1),
(27, 'Adres bilgi formlarında ülke inputları için otomatik doldurma eklenecek', 1),
(28, 'users.php oluşturulacak', 1),
(29, 'tüm telefon inputları için numaralarda boşluk bırakması engellenecek', 0),
(30, 'order-detail.php sayfasında görseli indir butonu aktif edilecek', 0),
(31, 'sepete ekleme yapıldığında sepet iconunda ki sayı da artması sağlanacak', 1),
(32, 'order-detail.php sayfasında ki butonlar aktif edilecek', 1),
(33, 'product-detail.php sayfasında seçilen görsele göre fiyat gösterilecek', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` varchar(200) COLLATE utf32_unicode_ci NOT NULL,
  `user_name` varchar(400) COLLATE utf32_unicode_ci NOT NULL,
  `user_password` varchar(400) COLLATE utf32_unicode_ci NOT NULL,
  `user_country` varchar(3) COLLATE utf32_unicode_ci NOT NULL,
  `user_adress` text COLLATE utf32_unicode_ci NOT NULL,
  `user_city` varchar(200) COLLATE utf32_unicode_ci NOT NULL,
  `user_district` varchar(200) COLLATE utf32_unicode_ci NOT NULL,
  `user_mail` varchar(300) COLLATE utf32_unicode_ci NOT NULL,
  `user_phone` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `user_id`, `user_name`, `user_password`, `user_country`, `user_adress`, `user_city`, `user_district`, `user_mail`, `user_phone`, `user_date`) VALUES
(6, 'ahmet', 'Ahmet SAMANCI', 'cdb5efc9c72196c1bd8b7a594b46b44f', 'TR', 'fetih mahallesi aslanlıkışla cad sarıgül apt', 'Konya', 'Karatay', 'ahmetalpersam@hotmail.com', '', '2018-09-04 12:02:05'),
(7, 'mehmet', 'Mehmet İskanbil', '', 'TR', 'asd', 'Van', 'Van', 'mehmet@gmail.com', '0554 746 48 78', '2018-09-06 08:38:59');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `works`
--

CREATE TABLE `works` (
  `id` int(11) NOT NULL,
  `work_customer` varchar(300) CHARACTER SET utf8 NOT NULL,
  `work_customer_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `work_service` int(11) NOT NULL,
  `work_type` varchar(100) CHARACTER SET utf8 NOT NULL,
  `work_payment` int(50) NOT NULL DEFAULT '0',
  `work_statu` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT 'İş oluşturuldu.',
  `work_url` varchar(300) CHARACTER SET utf8 NOT NULL,
  `work_description` text CHARACTER SET utf8 NOT NULL,
  `work_company` varchar(200) CHARACTER SET utf8 NOT NULL DEFAULT 'Şirket Yok',
  `work_customer_degree` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT 'Ünvan Yok',
  `work_customer_site` varchar(300) CHARACTER SET utf8 NOT NULL DEFAULT 'Site Yok',
  `work_customer_ip` varchar(150) CHARACTER SET utf8 NOT NULL,
  `work_customer_phone` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT 'Belirtilmedi',
  `work_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_mail` (`admin_mail`(255)),
  ADD KEY `id` (`id`);

--
-- Tablo için indeksler `blockip`
--
ALTER TABLE `blockip`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `chart`
--
ALTER TABLE `chart`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `opinions`
--
ALTER TABLE `opinions`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `page_key` (`page_key`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `service_types`
--
ALTER TABLE `service_types`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- Tablo için AUTO_INCREMENT değeri `blockip`
--
ALTER TABLE `blockip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `chart`
--
ALTER TABLE `chart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Tablo için AUTO_INCREMENT değeri `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=790;

--
-- Tablo için AUTO_INCREMENT değeri `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `opinions`
--
ALTER TABLE `opinions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Tablo için AUTO_INCREMENT değeri `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `service_types`
--
ALTER TABLE `service_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Tablo için AUTO_INCREMENT değeri `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Tablo için AUTO_INCREMENT değeri `todo`
--
ALTER TABLE `todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `works`
--
ALTER TABLE `works`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
