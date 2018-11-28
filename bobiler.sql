-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 17 May 2018, 21:07:45
-- Sunucu sürümü: 10.1.21-MariaDB
-- PHP Sürümü: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `bobiler`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayar`
--

CREATE TABLE `ayar` (
  `ayar_id` int(11) NOT NULL,
  `ayar_logo` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_title` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_description` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_keywords` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_author` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_tel` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_gsm` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_faks` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_mail` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_ilce` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_il` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_adres` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_mesai` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_maps` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_analystic` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_zopim` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_facebook` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_twitter` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_instagram` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_google` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_youtube` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_smtphost` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_smtpuser` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_smtppassword` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_smtpport` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_bakim` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ayar`
--

INSERT INTO `ayar` (`ayar_id`, `ayar_logo`, `ayar_title`, `ayar_description`, `ayar_keywords`, `ayar_author`, `ayar_tel`, `ayar_gsm`, `ayar_faks`, `ayar_mail`, `ayar_ilce`, `ayar_il`, `ayar_adres`, `ayar_mesai`, `ayar_maps`, `ayar_analystic`, `ayar_zopim`, `ayar_facebook`, `ayar_twitter`, `ayar_instagram`, `ayar_google`, `ayar_youtube`, `ayar_smtphost`, `ayar_smtpuser`, `ayar_smtppassword`, `ayar_smtpport`, `ayar_bakim`) VALUES
(0, 'img/21535makina_kafasi.png', 'Supirlar / Bobiler.org', 'Bobiler.org İleri Web Projesi', 'sosyalmedya,php,bobiler', 'Hande Ebrar Güneşdoğdu', '0216 000 00 00', '0216 000 00 00', '0216 000 00 00', 'hande.ebrar@gmail.com', 'Of', 'Trabzon', 'KTÜ Of Teknoloji Fakültesi', '7 x 24 açık sosyal medya sitesi', 'deneme', '', '', 'https://www.facebook.com/bobiler/', 'https://twitter.com/bobilerorg', 'https://www.instagram.com/bobilerorg/', 'http://bobilerorg.tumblr.com/', 'https://feeds.feedburner.com/bobiler', 'mail.alanadi.com', 'thth', 'password', '587777', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `begen`
--

CREATE TABLE `begen` (
  `kullanici_id` int(11) NOT NULL,
  `monte_id` int(11) NOT NULL,
  `begeni_sayisi` int(11) NOT NULL DEFAULT '0',
  `begeni_durumu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `etiket`
--

CREATE TABLE `etiket` (
  `etiket_id` int(11) NOT NULL,
  `etiket_adi` varchar(100) COLLATE utf8_turkish_ci NOT NULL DEFAULT '#',
  `etiket_durum` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `etiket`
--

INSERT INTO `etiket` (`etiket_id`, `etiket_adi`, `etiket_durum`) VALUES
(1, '#caps', '1'),
(2, '#komik', '1'),
(5, '#cicek', '0'),
(6, '#bocek', '1'),
(7, '#finalhaftasi', '1'),
(8, '#deneme', '1'),
(9, '#buodevbitecekmi', '1'),
(10, '#help', '1'),
(11, '#php', '1'),
(12, '#izindeyiz', '1'),
(13, '#erasmus', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_ad` varchar(150) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_ad`) VALUES
(2, 'photoshop monte'),
(3, 'çizim'),
(4, 'heykel'),
(5, 'paint monte'),
(6, ' yazılı monte'),
(7, 'animated gif'),
(8, '3d render monte'),
(9, 'illustrasyon'),
(10, 'enstalasyon'),
(11, 'karikatür'),
(12, 'video - kamera çekimli'),
(13, 'diğer');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_ad` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_nick` varchar(60) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_avatar` varchar(250) COLLATE utf8_turkish_ci DEFAULT 'defaultavatar.png',
  `kullanici_mail` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_website` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_ulke` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_dtarihi` date DEFAULT NULL,
  `kullanici_ceptel` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_cinsiyet` tinyint(1) DEFAULT NULL,
  `kullanici_hakkinda` varchar(400) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_sifre` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_yetki` int(5) DEFAULT NULL,
  `kullanici_durum` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_behance` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_blogger` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_dribble` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_eksi` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_facebookfanpage` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_facebook` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_flickr` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_foursquare` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_googleplus` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_instagram` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_lastfm` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_linkedin` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_patreon` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_pinterest` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_soundcloud` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_tumblr` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_twitter` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_vimeo` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_vine` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_wordpress` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_youtube` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_youtubechannel` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`kullanici_id`, `kullanici_ad`, `kullanici_nick`, `kullanici_avatar`, `kullanici_mail`, `kullanici_website`, `kullanici_ulke`, `kullanici_dtarihi`, `kullanici_ceptel`, `kullanici_cinsiyet`, `kullanici_hakkinda`, `kullanici_sifre`, `kullanici_yetki`, `kullanici_durum`, `kullanici_behance`, `kullanici_blogger`, `kullanici_dribble`, `kullanici_eksi`, `kullanici_facebookfanpage`, `kullanici_facebook`, `kullanici_flickr`, `kullanici_foursquare`, `kullanici_googleplus`, `kullanici_instagram`, `kullanici_lastfm`, `kullanici_linkedin`, `kullanici_patreon`, `kullanici_pinterest`, `kullanici_soundcloud`, `kullanici_tumblr`, `kullanici_twitter`, `kullanici_vimeo`, `kullanici_vine`, `kullanici_wordpress`, `kullanici_youtube`, `kullanici_youtubechannel`) VALUES
(11, NULL, 'handeebrar', 'defaultavatar.png', 'info@handeebrar.com', NULL, NULL, NULL, NULL, NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', 5, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Canan GÖK', 'canan', '375213.png', 'info@canan.com', 'www.google.com', 'Türkiye', '2018-04-03', '5555555', 0, '', 'e10adc3949ba59abbe56e057f20f883e', 1, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Yunus Yarba', 'yunusyarba', '438715.jpg', 'yunusyarba@gmail.com', '', '', '0000-00-00', '', NULL, '', 'e10adc3949ba59abbe56e057f20f883e', 1, '1', 'denemre', NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, '', 'ahmetdurmus', '685013.png', 'ahmetdurmus@gmail.com', '', '', '0000-00-00', '', NULL, '', 'e10adc3949ba59abbe56e057f20f883e', 1, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, '', 'fundaese', '751037.png', 'fundaese@eramus.com', '', '', '0000-00-00', '', NULL, '', 'e10adc3949ba59abbe56e057f20f883e', 1, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, '', 'heg', '839000.jpg', 'hande@ebrar.com', '', '', '0000-00-00', '', NULL, '', 'e10adc3949ba59abbe56e057f20f883e', 1, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, '', 'oguzkaan', '347182.png', 'oguz@gmail.com', '', '', '0000-00-00', '', NULL, '', 'e10adc3949ba59abbe56e057f20f883e', 1, '1', '', NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, NULL, 'sonkezdeniyorum', 'defaultavatar.png', 'sonkez@deneme.com', NULL, NULL, NULL, NULL, NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', 1, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, '', 'banuhos', '767252.png', 'banu@hos.com', '', '', '0000-00-00', '', NULL, '', 'e10adc3949ba59abbe56e057f20f883e', 1, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, NULL, 'havvaarslan', 'defaultavatar.png', 'havva@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '202cb962ac59075b964b07152d234b70', 1, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesaj`
--

CREATE TABLE `mesaj` (
  `mesaj_id` int(11) NOT NULL,
  `mesaj_alici` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `mesaj_gonderici` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `mesaj_konu` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `mesaj_aciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `mesaj_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `mesaj`
--

INSERT INTO `mesaj` (`mesaj_id`, `mesaj_alici`, `mesaj_gonderici`, `mesaj_konu`, `mesaj_aciklama`, `mesaj_tarih`) VALUES
(1, 'canan', 'deneme', 'proje', 'canan projenin son halini sana mail olarak gönderdim ', '2018-05-13 20:48:53');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `monte`
--

CREATE TABLE `monte` (
  `monte_id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `etiket_id` int(11) DEFAULT NULL,
  `kategori_id` int(11) NOT NULL,
  `monte_gorsel` varchar(300) COLLATE utf8_turkish_ci DEFAULT NULL,
  `monte_baslik` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `monte_aciklama` varchar(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  `monte_kim` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `monte_durum` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '1',
  `monte_zaman` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `monte`
--

INSERT INTO `monte` (`monte_id`, `kullanici_id`, `etiket_id`, `kategori_id`, `monte_gorsel`, `monte_baslik`, `monte_aciklama`, `monte_kim`, `monte_durum`, `monte_zaman`) VALUES
(40, 14, 1, 6, '605409.jpg', 'final haftası ben', 'not isterken ben', '1', '1', '2018-05-16 22:09:36'),
(41, 16, 1, 6, '454760.jpg', 'ay sonu geliyor...', '', '1', '1', '2018-05-16 22:11:08'),
(42, 17, 2, 11, '16673.jpg', 'volla gülmem gelmemiş', 'resme 5 sn bakınca gülesiniz gelmiyor', '1', '1', '2018-05-16 22:14:21'),
(43, 18, 13, 11, '915144.jpg', 'avrupa gördüm', 'ben gördüm sadece ben', '1', '1', '2018-05-16 22:18:48'),
(44, 19, 9, 9, '230377.png', 'Background', 'kendim yapmadım ama çok güzel çaldım', '1', '1', '2018-05-16 22:22:54'),
(45, 19, 2, 11, '63657.jpg', 'laiklik elden gidiyaaahhh', 'irtica geliyah', '1', '1', '2018-05-16 22:28:10'),
(46, 14, 10, 6, '349960.jpg', 'Azcık da anlamlı bişiler paylaşalım xd', '', '1', '1', '2018-05-16 22:30:12'),
(47, 16, 11, 11, '953758.jpg', 'php elden gidiyeh asp geliyah', 'xdxxd', '1', '1', '2018-05-16 22:32:27'),
(48, 20, 9, 9, '546156.jpg', 'Pubg', '', '1', '1', '2018-05-17 15:07:48'),
(49, 22, 2, 11, '400936.jpg', 'kanayan gül', 'çok acı çekiyorum staj yeri bulamadım', '1', '1', '2018-05-17 18:55:40'),
(50, 19, 1, 6, '686251.jpg', ' yeni başlayan bir tuhaf caps akımı', '', '1', '1', '2018-05-17 21:39:07'),
(51, 19, 8, 6, '321966.jpg', 'designer vs. coder', '', '1', '1', '2018-05-17 21:58:53');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorum`
--

CREATE TABLE `yorum` (
  `yorum_id` int(11) NOT NULL,
  `yorum_icerik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `monte_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yorum`
--

INSERT INTO `yorum` (`yorum_id`, `yorum_icerik`, `kullanici_id`, `monte_id`) VALUES
(44, 'ne yazıyor burada', 17, 46),
(45, 'güzel oyun !', 17, 48),
(46, 'yeminemo', 19, 42),
(47, 'bana neden kimse yorum yapmıyor komik değil mi ?', 16, 47);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yoruma_yorum`
--

CREATE TABLE `yoruma_yorum` (
  `yoruma_yorum_id` int(11) NOT NULL,
  `yoruma_yorum_icerik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `yorum_id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yoruma_yorum`
--

INSERT INTO `yoruma_yorum` (`yoruma_yorum_id`, `yoruma_yorum_icerik`, `yorum_id`, `kullanici_id`) VALUES
(20, 'ben erasmusa gittiğim için burada yazanı anlayabilirim', 44, 18),
(21, 'ahmet senin yorumuna yorum yapıyorum', 45, 18),
(22, 'ben de ahmetin yorumuna yorum yapıyorum', 45, 19),
(23, 'ben de yorum yapam', 45, 22);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayar`
--
ALTER TABLE `ayar`
  ADD PRIMARY KEY (`ayar_id`);

--
-- Tablo için indeksler `begen`
--
ALTER TABLE `begen`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Tablo için indeksler `etiket`
--
ALTER TABLE `etiket`
  ADD PRIMARY KEY (`etiket_id`);

--
-- Tablo için indeksler `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Tablo için indeksler `mesaj`
--
ALTER TABLE `mesaj`
  ADD PRIMARY KEY (`mesaj_id`);

--
-- Tablo için indeksler `monte`
--
ALTER TABLE `monte`
  ADD PRIMARY KEY (`monte_id`),
  ADD KEY `kullanici_id` (`kullanici_id`),
  ADD KEY `etiket_id` (`etiket_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Tablo için indeksler `yorum`
--
ALTER TABLE `yorum`
  ADD PRIMARY KEY (`yorum_id`);

--
-- Tablo için indeksler `yoruma_yorum`
--
ALTER TABLE `yoruma_yorum`
  ADD PRIMARY KEY (`yoruma_yorum_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `begen`
--
ALTER TABLE `begen`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `etiket`
--
ALTER TABLE `etiket`
  MODIFY `etiket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Tablo için AUTO_INCREMENT değeri `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- Tablo için AUTO_INCREMENT değeri `mesaj`
--
ALTER TABLE `mesaj`
  MODIFY `mesaj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `monte`
--
ALTER TABLE `monte`
  MODIFY `monte_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- Tablo için AUTO_INCREMENT değeri `yorum`
--
ALTER TABLE `yorum`
  MODIFY `yorum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- Tablo için AUTO_INCREMENT değeri `yoruma_yorum`
--
ALTER TABLE `yoruma_yorum`
  MODIFY `yoruma_yorum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `monte`
--
ALTER TABLE `monte`
  ADD CONSTRAINT `monte_ibfk_1` FOREIGN KEY (`etiket_id`) REFERENCES `etiket` (`etiket_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `monte_ibfk_2` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`kategori_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
