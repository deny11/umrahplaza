-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jul 19, 2016 at 10:31 AM
-- Server version: 5.5.50-cll
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bagikunc_umrah_plaza`
--

-- --------------------------------------------------------

--
-- Table structure for table `airlines`
--

CREATE TABLE IF NOT EXISTS `airlines` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rate` int(11) NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `airlines_name_unique` (`name`),
  UNIQUE KEY `airlines_logo_unique` (`logo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `airlines`
--

INSERT INTO `airlines` (`id`, `name`, `rate`, `logo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Garuda Indonesia', 5, '1.png', '2016-06-19 20:53:12', '2016-06-19 20:53:12', NULL),
(2, 'Saudia Airlines', 5, '2.png', '2016-06-19 20:55:16', '2016-06-19 20:57:43', NULL),
(3, 'Oman Air', 4, '3.png', '2016-06-19 20:56:20', '2016-06-19 20:56:21', NULL),
(4, 'Etihad Airways', 4, '4.png', '2016-06-19 20:59:34', '2016-06-19 20:59:34', NULL),
(5, 'Turkish Airways', 5, '5.png', '2016-06-19 21:00:29', '2016-06-19 21:00:30', NULL),
(6, 'Emirates Airlines', 5, '6.png', '2016-06-19 21:01:02', '2016-06-19 21:01:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE IF NOT EXISTS `banks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `banks_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Bank Mandiri', NULL, NULL, NULL),
(2, 'Bank Negara Indonesia', NULL, NULL, NULL),
(3, 'Bank Rakyat Indonesia', NULL, NULL, NULL),
(4, 'Bank Tabungan Negara', NULL, NULL, NULL),
(5, 'Bank Central Asia', NULL, NULL, NULL),
(6, 'Bank Bukopin', NULL, NULL, NULL),
(7, 'Bank CIMB Niaga', NULL, NULL, NULL),
(8, 'Bank Permata', NULL, NULL, NULL),
(9, 'Bank Mega', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE IF NOT EXISTS `currencies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `symbol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `currencies_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `symbol`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Rupiah', 'Rp', NULL, NULL, NULL),
(2, 'US Dollar', '$', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE IF NOT EXISTS `hotels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city_code` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `location` longtext COLLATE utf8_unicode_ci NOT NULL,
  `food` longtext COLLATE utf8_unicode_ci NOT NULL,
  `internet` longtext COLLATE utf8_unicode_ci NOT NULL,
  `distance` longtext COLLATE utf8_unicode_ci NOT NULL,
  `parking_area` longtext COLLATE utf8_unicode_ci NOT NULL,
  `public_facility` longtext COLLATE utf8_unicode_ci NOT NULL,
  `service` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `hotels_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `city_code`, `rate`, `location`, `food`, `internet`, `distance`, `parking_area`, `public_facility`, `service`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Royal Dar Al Eiman', 1, 5, '2 menit jalan kaki dari Masjidil Haram', '3 kali per hari', 'Free Wifi', '100 meter', 'Tersedia', 'N/A', '', '2016-06-19 21:09:33', '2016-06-19 21:09:33', NULL),
(2, ' Al Harithyah', 2, 5, 'Sangat dekat dengan masjid Nabawi', '3 kali sehari', 'Free Wifi', '100 meter', 'Tersedia', 'N/A', '', '2016-06-19 21:10:42', '2016-06-19 21:10:42', NULL),
(3, 'Elaf Al Mashaer', 1, 4, '6 menit perjalanan kaki menuju Masjidil Haram', '3 kali sehari', 'Free Wifi', '200 meter', 'Tersedia', 'N/A', '', '2016-06-19 21:13:44', '2016-06-19 21:13:44', NULL),
(4, 'Royal In Nozol', 2, 3, 'cukup dekat dengan masjid nabawi', '3 kali sehari', 'free wifi', '300 meter', 'Tersedia', 'N/A', '', '2016-06-19 21:15:39', '2016-06-19 21:15:39', NULL),
(5, 'Dar Al Eiman Grand', 1, 4, '4 menit perjalanan kaki ke Masjidil Haram', '3 kali sehari', 'Free Wifi', '250 meter', 'Tersedia', 'N/A', '', '2016-06-19 21:17:13', '2016-06-19 21:17:13', NULL),
(6, 'Eiman Al Manar', 2, 4, 'Dekat dari nabawi', 'Restoran', 'Tidak tersedia akses internet', '300 meter', 'Tidak tersedia', 'N/A', '', '2016-06-19 22:03:53', '2016-06-19 22:03:53', NULL),
(7, 'Retaj Hotel', 1, 4, 'dekat dengan Masjidil Haram', 'Restoran', 'Free wifi', '250 meter', 'Tersedia', 'N/A', '', '2016-06-19 22:18:04', '2016-06-19 22:18:04', NULL),
(8, 'Baiti 5', 1, 4, '4 menit perjalanan kaki ke Masjidil Haram', 'Restoran', 'Free Wifi', '250 meter', 'Tidak tersedia', 'N/A', '', '2016-06-19 22:21:32', '2016-06-19 22:21:32', NULL),
(9, 'Al Fayroz di Medinah', 2, 3, 'Cukup dekat dengan Masjid Nabawi', 'Nasi kotak', 'free wifi', '150 meter dengan Masjid Nabawi', 'N/A', 'N/A', '', '2016-06-19 22:24:02', '2016-06-19 22:24:02', NULL),
(10, 'Dal Al Ghufran Hotel', 1, 5, 'Dekat dengan Masjdil Haram', 'Restoran Prasmanan', 'Gratis! WIfi tersedia di seluruh area umum dan dapat diakses secara gratis', '30 m dari masjidil haram', 'Tersedia tempat parkr kendaraan (dibutuhan pemesanan terlebih dahulu)', 'Brankas, area bebas rokok, Ruang keluarga, lift, AC', '', '2016-06-19 22:56:38', '2016-06-19 22:56:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `images_name_unique` (`name`),
  KEY `images_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `image_package`
--

CREATE TABLE IF NOT EXISTS `image_package` (
  `image_id` int(10) unsigned NOT NULL,
  `package_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  KEY `image_package_image_id_foreign` (`image_id`),
  KEY `image_package_package_id_foreign` (`package_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2016_05_07_062708_create_roles_table', 1),
('2016_05_07_063216_create_airlines_table', 1),
('2016_05_07_063456_create_routes_table', 1),
('2016_05_07_063627_create_hotels_table', 1),
('2016_05_07_065221_create_currencies_table', 1),
('2016_05_07_065429_create_banks_table', 1),
('2016_05_07_065805_create_users_table', 1),
('2016_05_07_093653_create_packages_table', 1),
('2016_05_07_120543_create_image_package_table', 1),
('2016_05_07_121038_create_orders_table', 1),
('2016_05_07_121518_create_payment_confirmations_table', 1),
('2016_05_27_154331_create_notifications_table', 1),
('2016_05_27_215702_create_images_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `is_viewed` tinyint(1) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `payment_confirmation_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_user_id_foreign` (`user_id`),
  KEY `notifications_payment_confirmation_id_foreign` (`payment_confirmation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `number_double` int(11) NOT NULL,
  `number_triple` int(11) NOT NULL,
  `number_quadruple` int(11) NOT NULL,
  `contact_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `package_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `orders_package_id_foreign` (`package_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE IF NOT EXISTS `packages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `schedule` date NOT NULL,
  `price_double` double(20,5) NOT NULL,
  `price_triple` double(20,5) NOT NULL,
  `price_quadruple` double(20,5) NOT NULL,
  `is_discount_in_percentage` tinyint(1) NOT NULL DEFAULT '1',
  `discount` double(20,5) NOT NULL,
  `payment_time_range` int(11) NOT NULL DEFAULT '0',
  `description` longtext COLLATE utf8_unicode_ci,
  `pas_foto_desc` longtext COLLATE utf8_unicode_ci,
  `ktp_desc` longtext COLLATE utf8_unicode_ci,
  `ktp_kk_asli_desc` longtext COLLATE utf8_unicode_ci,
  `surat_nikah_kk_asli_desc` longtext COLLATE utf8_unicode_ci,
  `uang_muka_desc` longtext COLLATE utf8_unicode_ci,
  `pelunasan_desc` longtext COLLATE utf8_unicode_ci,
  `pendaftaran_desc` longtext COLLATE utf8_unicode_ci,
  `kartu_kuning_desc` longtext COLLATE utf8_unicode_ci,
  `stock` int(11) NOT NULL,
  `time_viewed` int(11) NOT NULL,
  `route_id` int(10) unsigned NOT NULL,
  `airline_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `hotel_mekkah_id` int(10) unsigned NOT NULL,
  `hotel_madinah_id` int(10) unsigned NOT NULL,
  `currency_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `packages_route_id_foreign` (`route_id`),
  KEY `packages_airline_id_foreign` (`airline_id`),
  KEY `packages_user_id_foreign` (`user_id`),
  KEY `packages_hotel_mekkah_id_foreign` (`hotel_mekkah_id`),
  KEY `packages_hotel_madinah_id_foreign` (`hotel_madinah_id`),
  KEY `packages_currency_id_foreign` (`currency_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `schedule`, `price_double`, `price_triple`, `price_quadruple`, `is_discount_in_percentage`, `discount`, `payment_time_range`, `description`, `pas_foto_desc`, `ktp_desc`, `ktp_kk_asli_desc`, `surat_nikah_kk_asli_desc`, `uang_muka_desc`, `pelunasan_desc`, `pendaftaran_desc`, `kartu_kuning_desc`, `stock`, `time_viewed`, `route_id`, `airline_id`, `user_id`, `hotel_mekkah_id`, `hotel_madinah_id`, `currency_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hijau Istanbul Plus Bursa', '2016-10-19', 50.00000, 49.00000, 48.00000, 0, 250.00000, 24, 'Paket Umroh murah dari travel umroh PATUNA Travel untuk keberangkatan 19 Oktober 2016, biaya umroh mulai dari Rp 47,75 jt:\r\n\r\nMaskapai yang digunakan adalah Saudi Airlines, maskapai ini dinilai 4 oleh SKYTRAX, tersedia layanan untuk kelas Ekonomi, kelas Bisnis dan kelas Utama (bergantung ketersediaan). Saudia menyediakan berbagai kenyamanan di dalam penerbangan, seperti: makanan khas timur tengah, salad, minuman panas dan dingin .\r\n\r\nHotel di mekkah yang disediakan adalah Royal Dar Al Eiman yang merupakan hotel berbintang 5. Perjalanan dari hotel ke Masjidil Haram dapat ditempuh hanya dalam 2 menit dengan berjalan kaki. Anda bisa mengakses internet dengan menggunakan Wifi di dalam hotel ini. Untuk kenyamanan Anda, kami menyediakan fasilitas area bebas rokok, lift, dan AC. Kami dapat melayani anda dalam bahasa inggris dan arab. Makanan dan minuman tersedia di restoran kami. Tanyakan pada resepsionis atau housekeeping jika memerlukan layanan lainnya.\r\n\r\nHotel di madinah yang disediakan adalah Al Harithyah yang merupakan hotel berbintang 5*.*(sangat dekat dari nabawi)\r\n\r\nPastikan Anda memilih paket umroh dari PATUNA Travel yang menjamin kenyamanan ibadah Anda.', 'Berwarna\r\nLatar belakang (layar) foto berwarna putih\r\nClose up (Wajah terlihat 80%)\r\nTidak memakai kaca mata hitam\r\nWanita harus memakai jilbab\r\nUkuran foto: 4 x 6 = 6 lembar', 'Fotocopy KTP', 'Bagi wanita diatas 45 tahun', 'Bagi peserta suami-istri', 'Membayar uang muka pendaftaran umroh sebesar Rp 5 jt', '30 hari sebelum keberangkatan', 'Minimal 1 bulan sebelum keberangkatan (selama tempat masih tersedia)', 'Menyerahkan bukti suntik Meningitis', 10, 13, 1, 2, 3, 1, 2, 1, '2016-06-19 21:47:18', '2016-07-09 01:49:42', NULL),
(2, 'Biru Istanbul Plus Bursa', '2016-11-10', 0.00000, 0.00000, 0.00000, 0, 0.00000, 24, 'Paket Umroh murah dari travel umroh PATUNA Travel untuk keberangkatan 10 November 2016, biaya umroh mulai dari Rp 43,75 jt:\r\n\r\nMaskapai yang digunakan adalah Saudi Airlines, maskapai ini dinilai 4 oleh SKYTRAX, tersedia layanan untuk kelas Ekonomi, kelas Bisnis dan kelas Utama (bergantung ketersediaan). Saudia menyediakan berbagai kenyamanan di dalam penerbangan, seperti: makanan khas timur tengah, salad, minuman panas dan dingin .\r\n\r\nHotel di mekkah yang disediakan adalah Elaf Al Mashaer yang merupakan hotel berbintang 4. Perjalanan dari hotel ke Masjidil Haram dapat ditempuh hanya dalam 6 menit dengan berjalan kaki. Anda bisa mengakses internet dengan menggunakan Wifi di dalam hotel ini. Untuk kenyamanan Anda, kami menyediakan fasilitas area bebas rokok, ruang keluarga, lift, dan AC. Tanyakan pada resepsionis atau housekeeping jika memerlukan layanan lainnya.\r\n\r\nHotel di madinah yang disediakan adalah Royal In Nozol yang merupakan hotel berbintang 3*.*(cukup dekat dari nabawi)\r\n\r\nPastikan Anda memilih paket umroh dari PATUNA Travel yang menjamin kenyamanan ibadah Anda.', '    Berwarna\r\n    Latar belakang (layar) foto berwarna putih\r\n    Close up (Wajah terlihat 80%)\r\n    Tidak memakai kaca mata hitam\r\n    Wanita harus memakai jilbab\r\n    Ukuran foto: 4 x 6 = 6 lembar', 'Fotocopy KTP', 'Bagi wanita diatas 45 tahun', 'Bagi peserta suami-istri', 'Membayar uang muka pendaftaran umroh sebesar Rp 5 jt', '30 hari sebelum keberangkatan', 'Minimal 1 bulan sebelum keberangkatan (selama tempat masih tersedia)', 'Menyerahkan bukti suntik Meningitis', 10, 11, 1, 2, 3, 3, 4, 1, '2016-06-19 21:52:04', '2016-07-11 01:33:00', NULL),
(3, 'Coklat 9 Hari', '0000-00-00', 0.00000, 0.00000, 0.00000, 0, 0.00000, 24, 'Paket Umroh murah dari travel umroh PATUNA Travel untuk keberangkatan 26 November 2016, biaya umroh mulai dari Rp 24,75 jt:\r\n\r\nMaskapai yang digunakan adalah Etihad Airways, maskapai ini menyediakan layanan untuk kelas Ekonomi, kelas Bisnis dan kelas Utama (bergantung ketersediaan). Etihad menyediakan berbagai kenyamanan di dalam penerbangan, seperti: menu makanan daging dan ikan dengan standar Halal, minuman hangat, dan hiburan multimedia.\r\n\r\nHotel di mekkah yang disediakan adalah Dar Al Eiman Grand yang merupakan hotel berbintang 4. Perjalanan dari hotel ke Masjidil Haram dapat ditempuh hanya dalam 4 menit dengan berjalan kaki. Untuk kenyamanan Anda, kami menyediakan fasilitas ruang keluarga, lift, dan AC. Kami dapat melayani Anda dalam bahasa inggris dan arab. Makanan dan minuman tersedia di restoran kami. Tanyakan pada resepsionis atau housekeeping jika memerlukan layanan lainnya.\r\n\r\nHotel di madinah yang disediakan adalah EIMAN AL MANAR yang merupakan hotel berbintang 4*.*(dekat dari nabawi)\r\n\r\nPastikan Anda memilih paket umroh dari PATUNA Travel yang menjamin kenyamanan ibadah Anda.', '\r\n    Berwarna\r\n    Latar belakang (layar) foto berwarna putih\r\n    Close up (Wajah terlihat 80%)\r\n    Tidak memakai kaca mata hitam\r\n    Wanita harus memakai jilbab\r\n    Ukuran foto: 4 x 6 = 6 lembar\r\n', 'Fotocopy KTP', 'Bagi wanita diatas 45 tahun', 'Untuk peserta anak', 'Membayar uang muka pendaftaran umroh sebesar Rp 10 jt', '30 hari sebelum keberangkatan', 'Minimal 1 bulan sebelum keberangkatan (selama tempat masih tersedia)', 'Menyerahkan bukti suntik Meningitis', 10, 5, 2, 4, 3, 1, 2, 1, '2016-06-19 22:05:17', '2016-06-28 18:28:13', NULL),
(4, 'Akhir Tahun Eksekutif 9 Hari', '2016-06-28', 0.00000, 0.00000, 27000000.00000, 0, 250000.00000, 24, 'Paket Umroh murah dari travel umroh AL AMSOR untuk keberangkatan 28 November 2016, biaya umroh mulai dari Rp 26,75 jt:\r\n\r\nMaskapai yang digunakan adalah Garuda Indonesia, maskapai ini dinilai 4 oleh SKYTRAX, tersedia layanan untuk kelas Ekonomi dan Bisnis  (bergantung ketersediaan). Garuda Indonesia menyediakan berbagai kenyamanan di dalam penerbangan, seperti: internet, hiburan dan menu kuliner khas Indonesia.\r\n\r\nHotel di mekkah yang disediakan adalah Retaj Hotel yang merupakan hotel berbintang 4*. *(dekat dari masjidil haram)\r\n\r\nHotel di madinah yang disediakan adalah Royal In Nozol yang merupakan hotel berbintang 3*.*(cukup dekat dari nabawi)\r\n\r\nPastikan Anda memilih paket umroh dari AL AMSOR yang menjamin kenyamanan ibadah Anda.', '\r\n    Berwarna\r\n    Latar belakang (layar) foto berwarna putih\r\n    Close up (Wajah terlihat 80%)\r\n    Tidak memakai kaca mata hitam\r\n    Wanita harus memakai jilbab\r\n    Ukuran foto: 4 x 6 = 6 lembar', 'Fotocopy KTP', 'Bagi wanita diatas 45 tahun', 'Bagi peserta suami-istri', 'Membayar uang muka pendaftaran umroh sebesar Rp 10 jt', '30 hari sebelum keberangkatan', 'Minimal 1 bulan sebelum keberangkatan (selama tempat masih tersedia)', 'Menyerahkan bukti suntik Meningitis', 10, 4, 1, 1, 5, 7, 4, 1, '2016-06-19 22:29:10', '2016-07-12 19:22:22', NULL),
(5, 'Akhir Tahun 9 Hari Ekonomis', '2016-11-28', 0.00000, 0.00000, 22000000.00000, 0, 250000.00000, 24, 'Paket Umroh murah dari travel umroh AL AMSOR untuk keberangkatan 28 November 2016, biaya umroh mulai dari Rp 21,75 jt:\r\n\r\nMaskapai yang digunakan adalah Garuda Indonesia, maskapai ini dinilai 4 oleh SKYTRAX, tersedia layanan untuk kelas Ekonomi dan Bisnis  (bergantung ketersediaan). Garuda Indonesia menyediakan berbagai kenyamanan di dalam penerbangan, seperti: internet, hiburan dan menu kuliner khas Indonesia.\r\n\r\nHotel di mekkah yang disediakan adalah Baiti 5 yang merupakan hotel berbintang 4. Perjalanan dari hotel ke Masjidil Haram dapat ditempuh hanya dalam 4 menit dengan berjalan kaki. Tanyakan pada resepsionis atau housekeeping jika memerlukan layanan lainnya.\r\n\r\nHotel di medinah yang disediakan adalah Jawharat Al Fayroz yang merupakan hotel berbintang . Perjalanan dari hotel ke Masjid Nabawi dapat ditempuh hanya dalam 3 menit dengan berjalan kaki.\r\n\r\nPastikan Anda memilih paket umroh dari AL AMSOR yang menjamin kenyamanan ibadah Anda.', '\r\n    Berwarna\r\n    Latar belakang (layar) foto berwarna putih\r\n    Close up (Wajah terlihat 80%)\r\n    Tidak memakai kaca mata hitam\r\n    Wanita harus memakai jilbab\r\n    Ukuran foto: 4 x 6 = 6 lembar', 'Fotocopy KTP', 'Bagi wanita diatas 45 tahun', 'Bagi peserta suami-istri', 'Membayar uang muka pendaftaran umroh sebesar Rp 20 jt', '30 hari sebelum keberangkatan', 'Minimal 1 bulan sebelum keberangkatan (selama tempat masih tersedia)', 'Menyerahkan bukti suntik Meningitis', 10, 11, 1, 1, 5, 8, 2, 1, '2016-06-19 22:37:29', '2016-07-15 17:47:51', NULL),
(6, '9 Hari Eksekutif Start Banjarmasin', '2016-11-28', 0.00000, 0.00000, 31000000.00000, 0, 250000.00000, 24, 'Paket Umroh murah dari travel umroh AL AMSOR untuk keberangkatan 28 November 2016, biaya umroh mulai dari Rp 30,75 jt:\r\n\r\nMaskapai yang digunakan adalah Garuda Indonesia / Saudi Air Lines, maskapai ini dinilai 4 oleh SKYTRAX, tersedia layanan untuk kelas Ekonomi, Bisnis dan First Class (bergantung ketersediaan).\r\n\r\nHotel di mekkah yang disediakan adalah Retaj Hotel yang merupakan hotel berbintang 4*. *(dekat dari masjidil haram)\r\n\r\nHotel di madinah yang disediakan adalah Royal In Nozol yang merupakan hotel berbintang 3*.*(cukup dekat dari nabawi)\r\n\r\nPastikan Anda memilih paket umroh dari AL AMSOR yang menjamin kenyamanan ibadah Anda.', '\r\n    Berwarna\r\n    Latar belakang (layar) foto berwarna putih\r\n    Close up (Wajah terlihat 80%)\r\n    Tidak memakai kaca mata hitam\r\n    Wanita harus memakai jilbab\r\n    Ukuran foto: 4 x 6 = 6 lembar\r\n', 'Fotocopy KTP', 'Bagi wanita diatas 45 tahun', 'Bagi peserta suami-istri', 'Membayar uang muka pendaftaran umroh sebesar Rp 10 jt', '30 hari sebelum keberangkatan', 'Minimal 1 bulan sebelum keberangkatan (selama tempat masih tersedia)', 'Menyerahkan bukti suntik Meningitis', 10, 5, 1, 1, 5, 1, 4, 1, '2016-06-19 22:45:42', '2016-07-09 00:42:59', NULL),
(7, 'Awal Tahun Ekonomis 9 Hari ', '2017-01-03', 0.00000, 0.00000, 20000000.00000, 0, 250000.00000, 24, 'Paket Umroh murah dari travel umroh AL AMSOR untuk keberangkatan 03 Januari 2017, biaya umroh mulai dari Rp 19,75 jt:\r\n\r\nMaskapai yang digunakan adalah Garuda Indonesia, maskapai ini dinilai 4 oleh SKYTRAX, tersedia layanan untuk kelas Ekonomi dan Bisnis  (bergantung ketersediaan). Garuda Indonesia menyediakan berbagai kenyamanan di dalam penerbangan, seperti: internet, hiburan dan menu kuliner khas Indonesia.\r\n\r\nHotel di mekkah yang disediakan adalah Baiti 5 yang merupakan hotel berbintang 4. Perjalanan dari hotel ke Masjidil Haram dapat ditempuh hanya dalam 4 menit dengan berjalan kaki. Tanyakan pada resepsionis atau housekeeping jika memerlukan layanan lainnya.\r\n\r\nHotel di medinah yang disediakan adalah Jawharat Al Fayroz yang merupakan hotel berbintang . Perjalanan dari hotel ke Masjid Nabawi dapat ditempuh hanya dalam 3 menit dengan berjalan kaki.\r\n\r\nPastikan Anda memilih paket umroh dari AL AMSOR yang menjamin kenyamanan ibadah Anda.', '\r\n    Berwarna\r\n    Latar belakang (layar) foto berwarna putih\r\n    Close up (Wajah terlihat 80%)\r\n    Tidak memakai kaca mata hitam\r\n    Wanita harus memakai jilbab\r\n    Ukuran foto: 4 x 6 = 6 lembar\r\n', 'Fotocopy KTP', 'Bagi wanita diatas 45 tahun', 'Bagi peserta suami-istri', 'Membayar uang muka pendaftaran umroh sebesar Rp 20 jt', '30 hari sebelum keberangkatan', 'Minimal 1 bulan sebelum keberangkatan (selama tempat masih tersedia)', 'Menyerahkan bukti suntik Meningitis', 10, 5, 1, 1, 5, 8, 9, 1, '2016-06-19 23:05:30', '2016-07-11 00:09:53', NULL),
(8, 'Awal Tahun 9 Hari Eksekutif', '2017-02-04', 0.00000, 0.00000, 0.00000, 0, 250000.00000, 24, 'Paket Umroh murah dari travel umroh AL AMSOR untuk keberangkatan 04 Februari 2017, biaya umroh mulai dari Rp 24,75 jt:\r\n\r\nMaskapai yang digunakan adalah Garuda Indonesia, maskapai ini dinilai 4 oleh SKYTRAX, tersedia layanan untuk kelas Ekonomi dan Bisnis  (bergantung ketersediaan). Garuda Indonesia menyediakan berbagai kenyamanan di dalam penerbangan, seperti: internet, hiburan dan menu kuliner khas Indonesia.\r\n\r\nHotel di mekkah yang disediakan adalah Retaj Hotel yang merupakan hotel berbintang 4*. *(dekat dari masjidil haram)\r\n\r\nHotel di madinah yang disediakan adalah Royal In Nozol yang merupakan hotel berbintang 3*.*(cukup dekat dari nabawi)\r\n\r\nPastikan Anda memilih paket umroh dari AL AMSOR yang menjamin kenyamanan ibadah Anda.', '\r\n    Berwarna\r\n    Latar belakang (layar) foto berwarna putih\r\n    Close up (Wajah terlihat 80%)\r\n    Tidak memakai kaca mata hitam\r\n    Wanita harus memakai jilbab\r\n    Ukuran foto: 4 x 6 = 6 lembar\r\n', 'Fotocopy KTP', 'Bagi wanita diatas 45 tahun', 'Bagi peserta suami-istri', 'Membayar uang muka pendaftaran umroh sebesar Rp 20 jt', '30 hari sebelum keberangkatan', 'Minimal 1 bulan sebelum keberangkatan (selama tempat masih tersedia)', 'Menyerahkan bukti suntik Meningitis', 10, 8, 1, 1, 5, 7, 4, 1, '2016-06-19 23:10:34', '2016-07-11 01:32:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_confirmations`
--

CREATE TABLE IF NOT EXISTS `payment_confirmations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `amount_transfered` double(20,5) NOT NULL,
  `account_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currency_id` int(10) unsigned NOT NULL,
  `bank_id` int(10) unsigned NOT NULL,
  `order_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payment_confirmations_currency_id_foreign` (`currency_id`),
  KEY `payment_confirmations_bank_id_foreign` (`bank_id`),
  KEY `payment_confirmations_order_id_foreign` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_type_unique` (`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Administrator', NULL, NULL, NULL),
(2, 'Travel Agent', NULL, NULL, NULL),
(3, 'Customer', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE IF NOT EXISTS `routes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `routes_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Jakarta Langsung Jeddah', '2016-06-19 21:24:06', '2016-06-19 21:24:06', NULL),
(2, 'Jakarta - Abu Dabhi - Madinah', '2016-06-19 21:57:29', '2016-06-19 21:57:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_accepted` tinyint(1) NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verification_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_recovery_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_verification_code_unique` (`verification_code`),
  UNIQUE KEY `users_password_recovery_code_unique` (`password_recovery_code`),
  KEY `users_role_id_foreign` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `name`, `password`, `phone`, `address`, `remember_token`, `is_accepted`, `is_verified`, `verification_code`, `password_recovery_code`, `role_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin@annisa.com', 'Annisa Travel', '$2y$10$wK8zpm//qJ081Xw8wJVNsemUyBl4i/pnDBJX7U9oogR8w8T/orRTa', '-', '-', 'yOKyzaeUjyTPQ8l6nhQOxcvKjpefQ0qPKcGHSJPo6NdM2RBunwKtOya7X0sz', 1, 1, NULL, NULL, 1, NULL, '2016-06-19 22:56:51', NULL),
(3, 'patuna', 'info@patuna.com', 'Patuna Travel', '$2y$10$.IB/Cr8HDr7mi04zHvr5X.InseDKiPxPsW1lg/9YNoH/tixueu2K.', '085750123584', 'Jl. panglima polim raya no. 43 a-b kebayoran baru\r\nKota Jakarta Selatan - DKI Jakarta', 'nz4IyHPYs8D9lMJzpVBWqKzf2easYsfmSRNGCuVvwFvheypkMIDv6OtVHwB5', 1, 1, 'Jd0uAdNMTMFZFAAv6F3X3KDeWamziv3I', NULL, 2, '2016-06-19 21:19:56', '2016-06-19 22:33:04', NULL),
(5, 'alamsor', 'admin@alamsor.com', 'Al-Amsor', '$2y$10$5wNq8vZ5h1UUQ0lkrn6TkuFOY6vNxJ/KFtbzT03ub3hOZVZAq0YuC', '081225774822', 'Jl. warung buncit raya no. 33-34, kalibata - pancoran \r\nKota Jakarta Selatan - DKI Jakarta', NULL, 1, 1, 'hQzknu8uVuH2GWyZAwoLQSV1dwF6H9zC', NULL, 2, '2016-06-19 22:01:07', '2016-06-19 22:01:19', NULL),
(6, 'mdenyh', 'ravlyneezza@gmail.com', 'muhammad deny', '$2y$10$98auyEWsRBQKRr7ijUDUB.cMs6cj23TWLhZb1OkoCFPHNVJBNO7cS', '085740303929', 'keputih surabaya', NULL, 1, 0, 'ilsSQMI9NUm3JxvdQGga2ZgS53VK4NNM', NULL, 3, '2016-06-19 23:17:42', '2016-06-19 23:17:42', NULL),
(7, 'Fikrib', 'fikri.basalamah3@gmail.com', 'Fikri basalamah', '$2y$10$WBY7XI86hxAXr02y0dF2nOQKD.vFQETeX2l2hEUDVgB3zSQH56FSi', '087751000105', 'Pahang 16 surabaya', NULL, 1, 0, 'fktNoADXcsyjo5ateHhujk2OPXZ2v7rQ', NULL, 3, '2016-06-25 07:03:59', '2016-06-25 07:03:59', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `image_package`
--
ALTER TABLE `image_package`
  ADD CONSTRAINT `image_package_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`),
  ADD CONSTRAINT `image_package_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_payment_confirmation_id_foreign` FOREIGN KEY (`payment_confirmation_id`) REFERENCES `payment_confirmations` (`id`),
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `packages_airline_id_foreign` FOREIGN KEY (`airline_id`) REFERENCES `airlines` (`id`),
  ADD CONSTRAINT `packages_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`),
  ADD CONSTRAINT `packages_hotel_madinah_id_foreign` FOREIGN KEY (`hotel_madinah_id`) REFERENCES `hotels` (`id`),
  ADD CONSTRAINT `packages_hotel_mekkah_id_foreign` FOREIGN KEY (`hotel_mekkah_id`) REFERENCES `hotels` (`id`),
  ADD CONSTRAINT `packages_route_id_foreign` FOREIGN KEY (`route_id`) REFERENCES `routes` (`id`),
  ADD CONSTRAINT `packages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `payment_confirmations`
--
ALTER TABLE `payment_confirmations`
  ADD CONSTRAINT `payment_confirmations_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`),
  ADD CONSTRAINT `payment_confirmations_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`),
  ADD CONSTRAINT `payment_confirmations_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
