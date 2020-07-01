-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2020 at 04:55 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belajar_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `konten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id`, `user_id`, `judul`, `slug`, `konten`, `created_at`, `updated_at`) VALUES
(1, 7, 'Forum Pertama', 'forum-pertama', 'Konten dari form pertama', '2020-06-29 08:25:44', '2020-06-29 08:25:44'),
(2, 6, 'Forum Kedua', 'forum-kedua', 'Isi konten forum kedua', '2020-06-29 11:11:32', '2020-06-29 11:11:32'),
(3, 6, 'Forum Ketiga', 'forum-ketiga', 'Isi konten forum ketiga', '2020-06-29 12:57:50', '2020-06-29 12:57:50'),
(4, 10, 'Forum Keempat', 'forum-keempat', 'Isi konten forum keempat', '2020-06-30 06:22:45', '2020-06-30 06:22:45'),
(5, 5, 'Forum Kelima', 'forum-kelima', 'Isi dari judul forum kelima', '2020-06-30 08:16:03', '2020-06-30 08:16:03'),
(6, 12, 'Forum Matematika', 'forum-matematika', 'Konten dari forum mtk 2020', '2020-06-30 09:47:08', '2020-06-30 09:47:08');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `user_id`, `nama`, `telepon`, `alamat`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 10, 'Deswita Dahnius S.Pd', '081299775533', 'Bukittinggi', '367796583cd23a6504c61b59e282a20d.0.jpg', '2020-06-18 10:36:08', '2020-06-26 12:18:29'),
(6, 12, 'Drs. Homenar', '081310650113', 'Bukittinggi', NULL, '2020-06-18 10:42:39', '2020-06-26 12:19:33');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `konten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guru_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id`, `kode`, `nama`, `semester`, `guru_id`, `created_at`, `updated_at`) VALUES
(4, '180', 'Matematika', 'Ganjil', 6, '2020-06-18 13:47:41', '2020-06-18 13:47:41'),
(5, '156', 'Bahasa Indonesia', 'Ganjil', 1, '2020-06-18 13:50:04', '2020-06-18 13:50:04'),
(6, '180-P', 'Matematika Peminatan', 'Ganjil', 6, '2020-06-18 13:51:54', '2020-06-18 13:51:54');

-- --------------------------------------------------------

--
-- Table structure for table `mapel_siswa`
--

CREATE TABLE `mapel_siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mapel_siswa`
--

INSERT INTO `mapel_siswa` (`id`, `siswa_id`, `mapel_id`, `nilai`, `created_at`, `updated_at`) VALUES
(3, 3, 4, 95, '2020-06-16 06:58:37', '2020-06-17 14:43:43'),
(4, 5, 4, 95, '2020-06-16 07:48:55', '2020-06-17 14:40:49'),
(6, 5, 5, 94, '2020-06-17 14:39:18', '2020-06-17 14:39:18'),
(7, 1, 4, 80, '2020-06-18 07:06:46', '2020-06-18 07:06:46'),
(8, 1, 5, 80, '2020-06-18 07:06:55', '2020-06-18 14:00:58'),
(9, 1, 6, 95, '2020-06-18 07:07:06', '2020-06-18 07:07:06'),
(10, 3, 5, 84, '2020-06-18 07:07:31', '2020-06-18 07:07:31'),
(11, 3, 6, 85, '2020-06-18 07:08:09', '2020-06-18 07:08:09'),
(12, 4, 4, 77, '2020-06-18 07:08:28', '2020-06-18 07:08:28'),
(13, 4, 5, 80, '2020-06-18 07:08:41', '2020-06-18 07:08:41'),
(15, 5, 6, 92, '2020-06-18 07:09:06', '2020-06-18 07:09:06'),
(16, 6, 4, 75, '2020-06-18 08:16:59', '2020-06-18 08:16:59'),
(17, 6, 5, 84, '2020-06-18 08:17:09', '2020-06-18 08:17:09'),
(18, 6, 6, 80, '2020-06-18 08:17:20', '2020-06-18 08:17:20'),
(21, 9, 4, 90, '2020-06-26 12:17:44', '2020-06-26 12:17:44'),
(22, 14, 4, 95, '2020-06-29 07:39:37', '2020-06-29 07:39:37'),
(23, 14, 5, 95, '2020-06-29 07:39:53', '2020-06-29 07:39:53'),
(26, 14, 6, 90, '2020-06-29 07:42:34', '2020-06-29 07:43:11'),
(27, 13, 4, 70, '2020-06-29 07:43:34', '2020-06-29 07:43:34'),
(28, 13, 5, 80, '2020-06-29 07:44:26', '2020-06-29 07:44:26'),
(30, 13, 6, 85, '2020-06-29 07:49:16', '2020-06-29 07:50:57');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_06_10_141059_create_siswa_table', 1),
(4, '2020_06_14_044226_create_mapel_table', 1),
(5, '2020_06_14_044241_create_mapel_siswa_table', 1),
(6, '2020_06_18_092308_create_guru_table', 2),
(8, '2020_06_25_135502_create_posts_table', 3),
(9, '2020_06_29_154812_create_forum_table', 4),
(10, '2020_06_29_155308_create_komentar_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `content`, `slug`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ini Berita Pertama Sekolah', '<p>Ini isi dari berita pertama yang diinput secara manual yaa</p>', 'ini-berita-pertama', 'beautiful_beauty_bridge_california_clouds_contrast_footbridge_hd_wallpaper-1175820.jpg', '2020-06-25 05:25:48', '2020-06-30 07:34:49'),
(2, 1, 'Pengumuman Kelulusan Tahun 2020 ya', '<p>Isi pengumuman kelulusan sekolah menengah atas SMA Negeri 1 Bukittinggi tahun 2020 ya</p>', 'pengumuman-kelulusan-tahun-2020', NULL, '2020-06-26 07:21:48', '2020-06-30 07:51:53'),
(4, 1, 'Judul Ketiga', '<p>Isi dari judul ketiga</p>', 'judul-ketiga', '1170171_ebfbdc69-0bbb-4e5f-a1ec-0d9be35ea26b_960_960.jpg', '2020-06-26 11:37:51', '2020-06-26 11:37:52');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_depan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_belakang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `user_id`, `nama_depan`, `nama_belakang`, `jenis_kelamin`, `agama`, `alamat`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 4, 'Ilhadi', '-', 'L', 'Islam', 'Ladang Cakiah', '60b1fd629d738b972dc5163380cf569f.0.jpg', '2020-06-16 03:22:14', '2020-06-26 12:14:37'),
(3, 5, 'Ary', 'Putra', 'L', 'Islam', 'Garegeh', NULL, '2020-06-16 03:27:41', '2020-06-26 12:14:56'),
(4, 6, 'Deni', '-', 'L', 'Islam', 'Kubu Gulai Bancah', '3960d99a99903550f990ab0a361a77bf.0.jpg', '2020-06-16 07:47:08', '2020-06-16 07:47:08'),
(5, 7, 'Mutia', '-', 'P', 'Islam', 'Tarok Dipo', NULL, '2020-06-16 07:48:21', '2020-06-18 08:47:32'),
(6, 8, 'Novrianda', '-', 'L', 'Islam', 'Bukit Cangang Pasar Ramang', NULL, '2020-06-18 08:07:37', '2020-06-18 08:07:37'),
(8, 15, 'Roni', 'Mursyid', 'L', 'Islam', 'Belakang Balok', NULL, '2020-06-24 13:23:27', '2020-06-24 13:23:27'),
(9, 16, 'Fitratul', 'Aini', 'P', 'Islam', 'Koto Salayan', NULL, '2020-06-24 13:29:05', '2020-06-24 13:29:05'),
(13, 20, 'Ahmad', 'Fikri', 'L', 'Islam', 'Garegeh', '7399265bf85627d12ffd2fb24a4a6065.jpg', '2020-06-26 05:31:17', '2020-06-27 09:32:28'),
(14, 21, 'Aditya', 'Fitra Maulana', 'L', 'Islam', 'Pulai Anak Aia', NULL, '2020-06-26 12:16:47', '2020-06-26 12:16:47'),
(15, 22, 'Annisa', 'Azka Nabila', 'P', 'Islam', 'Tigo Baleh', NULL, '2020-06-27 06:41:02', '2020-06-27 06:41:02'),
(79, 100, 'Wilton Jenkins', '', 'P', 'Islam', '84451 Bode Fields Apt. 279\nNew Tony, MA 86656', NULL, '2020-06-27 06:51:24', '2020-06-27 06:51:24'),
(92, 100, 'Kole Harber', '', 'P', 'Islam', '959 Quitzon Bridge\nSouth Nicolas, TX 66420-6451', NULL, '2020-06-27 06:51:24', '2020-06-27 06:51:24'),
(96, 100, 'Jaquan Daugherty', '', 'L', 'Islam', '52906 Heather Ports\nKylafort, NM 26573-0923', NULL, '2020-06-27 06:51:25', '2020-06-27 06:51:25'),
(97, 100, 'Raoul Stark DDS', '', 'P', 'Hindu', '70759 Davis Crest\nPort Okey, KS 79124', NULL, '2020-06-27 06:51:25', '2020-06-27 06:51:25'),
(99, 100, 'Brittany Goldner', '', 'L', 'Kristen', '2483 Daugherty Causeway\nWest Rita, OR 85388', NULL, '2020-06-27 06:51:25', '2020-06-27 06:51:25'),
(100, 100, 'Prof. Kaylin Upton', '', 'P', 'Islam', '32719 Ricardo Alley\nAnnabelleview, OR 40968', NULL, '2020-06-27 06:51:25', '2020-06-27 06:51:25'),
(101, 100, 'Alexandrea Hamill', '', 'P', 'Katolik', '7981 Gisselle Rue\nPort Johannahaven, CA 40085', NULL, '2020-06-27 06:51:25', '2020-06-27 06:51:25'),
(108, 100, 'Terrance Larson', '', 'P', 'Budha', '45393 Zoie Neck Suite 551\nStehrberg, IL 57561-0722', NULL, '2020-06-27 06:51:25', '2020-06-27 06:51:25'),
(109, 100, 'Rosario Hettinger', '', 'P', 'Budha', '26967 Schroeder Divide\nHoegerburgh, WV 36236-0934', NULL, '2020-06-27 06:51:25', '2020-06-27 06:51:25'),
(111, 100, 'Dr. Karolann Schinner PhD', '', 'P', 'Budha', '4771 Corrine Ranch Suite 910\nHartmannfurt, MS 96247-8010', NULL, '2020-06-27 06:51:25', '2020-06-27 06:51:25'),
(113, 100, 'Eryn Kunze', '', 'L', 'Hindu', '251 Davis Gardens Suite 014\nLake Estefania, WI 44590', NULL, '2020-06-27 06:51:25', '2020-06-27 06:51:25'),
(114, 100, 'Dr. Kenny Dooley', '', 'P', 'Hindu', '34506 Reynolds Plaza\nLake Malikahaven, MO 63696', NULL, '2020-06-27 06:51:25', '2020-06-27 06:51:25'),
(115, 100, 'Caesar Turcotte', '', 'P', 'Kristen', '80142 Casandra Mills\nMilanburgh, WA 22349', NULL, '2020-06-27 06:51:25', '2020-06-27 06:51:25'),
(215, 118, 'Mayumi ', 'Amanda', 'P', 'Islam ', 'Aur Kuning', NULL, '2020-06-27 16:16:33', '2020-06-27 16:16:33'),
(216, 119, 'Yuli ', 'Hasni', 'P', 'Islam ', 'Sapiran', NULL, '2020-06-27 16:16:33', '2020-06-27 16:16:33'),
(217, 120, 'Fuji ', 'Arrahman', 'L', 'Islam ', 'Pakan Kurai', NULL, '2020-06-27 16:16:33', '2020-06-27 16:16:33'),
(218, 121, 'Warid ', 'Alfalah Sawir', 'L', 'Islam ', 'Campago Ipuh', NULL, '2020-06-27 16:16:33', '2020-06-27 16:16:33'),
(219, 122, 'Putri ', 'Viona', 'P', 'Islam ', 'Puhun Tembok', NULL, '2020-06-27 16:16:33', '2020-06-27 16:16:33'),
(220, 123, 'Teddy ', 'Gifari', 'L', 'Islam ', 'Garegeh', NULL, '2020-06-27 16:16:33', '2020-06-27 16:16:33'),
(221, 124, 'Suci', 'Indah Sari', 'P', 'Islam ', 'Aua Tajungkang Tengah Sawah', NULL, '2020-06-27 16:16:34', '2020-06-27 16:16:34'),
(222, 125, 'Muhammad ', 'Redho', 'L', 'Islam ', 'Tarok Dipo', NULL, '2020-06-27 16:16:34', '2020-06-27 16:16:34'),
(223, 126, 'Aldi ', 'Irsan Majid', 'L', 'Islam ', 'Parit Antang', NULL, '2020-06-27 16:16:34', '2020-06-27 16:16:34'),
(224, 127, 'Alhamda', '-', 'L', 'Islam ', 'Aur Kuning', NULL, '2020-06-27 16:16:34', '2020-06-27 16:16:34'),
(225, 128, 'Eksakta ', 'Jordi', 'L', 'Islam ', 'Kubu Gulai Bancah', NULL, '2020-06-27 16:16:34', '2020-06-27 16:16:34'),
(226, 129, 'Siti ', 'Rofi\'ah', 'P', 'Islam ', 'Benteng Pasar Atas', NULL, '2020-06-27 16:16:34', '2020-06-27 16:16:34'),
(229, 133, 'Tya', '-', 'P', 'Islam', 'Bukittinggi', NULL, '2020-06-29 08:15:15', '2020-06-29 08:15:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', NULL, '$2y$10$foX447fwuHathL9m/6F5IewAi1uuk2u4n5DTlq1AvF6uDRKQ8vG/e', '22tl27hw431iECf3XUujsYaIc7EgQVq2gMypAkZ4TcQ5mUJcbIFLgUqey4Rv', NULL, '2020-06-16 02:47:08', '2020-06-16 02:47:08'),
(4, 'siswa', 'Ilhadi', 'ilhadi@gmail.com', NULL, '$2y$10$2yDBt1YpsF2Lri7bz5eL3OIslAEeeo0YM7LqRWKHe0phps0AT2Bn2', 'Y9lJGxx1eRSjPmEVWPLwumGdreaPp2eNrgmoJQBTBmKeCU0jzDrm7GpvHrT3', '60b1fd629d738b972dc5163380cf569f.0.jpg', '2020-06-16 03:22:14', '2020-06-16 03:22:14'),
(5, 'siswa', 'Ary', 'aryputra@gmail.com', NULL, '$2y$10$ZGLQoHLiIJQu/hBd6OQtL.fo9q/bvYkJ3G7pExb2y/C3e0bn8eB4i', 'efDrMElPtpA0aqB8aIf66CIBvZI9dnhxoAsCJo54COtw0J9dW5MqLqNPOLAr', NULL, '2020-06-16 03:27:41', '2020-06-16 03:27:41'),
(6, 'siswa', 'Deni', 'deni@gmail.com', NULL, '$2y$10$mLbgnGR8qegO9zhnOx3BjuafOnZRJ/KNAdB3e2Sf1NpOjrajViJAe', 'UzmdyX3omxRzlM8s9Y1wr7FRDibwqazKXd2PyjM2ZVCr6kLd8QtG0pr1xYIr', '3960d99a99903550f990ab0a361a77bf.0.jpg', '2020-06-16 07:47:08', '2020-06-16 07:47:08'),
(7, 'siswa', 'Mutia', 'mutia@gmail.com', NULL, '$2y$10$fFSeBN9bgtd4qE1u7Kg4RuHpYNpPEo51xJwgotckZdRA8fzi6gpQS', 'TSbIAK9ZLk4jASiVhH772vhTQBZ9VK6UQtiqZOpGNZp3zW4Na0qGHObUFPBs', NULL, '2020-06-16 07:48:21', '2020-06-16 07:48:21'),
(8, 'siswa', 'Novrianda', 'novrianda@gmail.com', NULL, '$2y$10$bOsE795.j3tS6L91s/b7VusYF7rm/mm11.0bo9mFxAR0DaJeB2O4W', 'zKIp5xxhGqBHOwbEL4kVHiJ6UdeutkTUkY2jtBQWOkLVfx68lZayk0KVGa90', NULL, '2020-06-18 08:07:37', '2020-06-18 08:07:37'),
(10, 'guru', 'Deswita Dahnius', 'deswita_dahnius@gmail.com', NULL, '$2y$10$yiN//hNg3V.Afa3dPyMI4.U4UYCTw1/ZZ8UA/qdc9DjP.NKdzWYqa', 'VXmG3dpVhActx8C8uRJ41yaVcirL9Y2sTopAzvOEOJtUSVNswrov6gKM6BVB', '367796583cd23a6504c61b59e282a20d.0.jpg', '2020-06-18 10:36:08', '2020-06-18 10:36:08'),
(12, 'guru', 'Drs. Homenar', 'homenar@gmail.com', NULL, '$2y$10$Ak8SAKN.ZA5U79a7bsJ50u0bdVcHFQSdTPkO2nSPbuQmkpvIczvnS', 'LCaxyUMt8qiqWr687rRVO7Zjif189g1v0Z3bK4gi4DcLZSH6jzoZXrQwmJVs', NULL, '2020-06-18 10:42:39', '2020-06-18 10:42:39'),
(15, 'siswa', 'Roni', 'roni.m@gmail.com', NULL, '$2y$10$GyqaAVt8j.W8FZW6Qh/Koe.53DCopiAooFQ5gVnknXvzRp3Zo6/02', 'jpapI4CJnI0HNFHKXmPOlHW5anV2dJv5YzWwO5dURTEZVEuxTJZRs9nnXAFK', NULL, '2020-06-24 13:23:27', '2020-06-24 13:23:27'),
(16, 'siswa', 'Fitratul', 'fitratul@gmail.com', NULL, '$2y$10$uQOpKOKv7irQ9fFMNljJ8ukiBwwq6THeDYaA/9Lcxho0I3l68zW9u', 'KtlNlX6dLTzTsF2AimyDLhqohcPFtsSoQhXyYVmJeqQo5BK7pH0QsNeobxxn', NULL, '2020-06-24 13:29:04', '2020-06-24 13:29:04'),
(20, 'siswa', 'Ahmad', 'fikri_ahmad@gmail.com', NULL, '$2y$10$C2HmXmzn60jlHvWOmIgKV.5sXgDBRMMNO1i9H5dU6DrfVEo8Z.jQq', '6x2bdnrTfYK0KrhNombb1h23tbwelkICCGtj7gQdUoFzCt5rjqny9t8LQJIi', '7399265bf85627d12ffd2fb24a4a6065.jpg', '2020-06-26 05:31:17', '2020-06-26 05:31:17'),
(21, 'siswa', 'Aditya', 'aditya_fm@gmail.com', NULL, '$2y$10$XTbx7raUhZXzF3McVKhOquzn20o7tjj3ubCw3fU/wvcVqMik9e3Y2', 'T2Or7TODe2lh5J8HwvU3NzCh3o71zn5Sv5NKvsanOa7VKfL2WNDOGWGvcIRY', NULL, '2020-06-26 12:16:47', '2020-06-26 12:16:47'),
(22, 'siswa', 'Annisa', 'annisaazka@gmail.com', NULL, '$2y$10$yECVyz4i3sE2ZzJgFunnpeNX0Is8GABVxB3Z.t.4qv0Pt5vIqK.AG', 'Gf7xAUmxq9LyqeZzbSNSIw2uYDDASD4ZIUYEREu6PsmrDKjJ9jFVKc67vK2P', NULL, '2020-06-27 06:41:02', '2020-06-27 06:41:02'),
(118, 'siswa', 'Mayumi ', 'mayumiamand02@gmail.com', NULL, '$2y$10$YOYYi9vfPKAhDsWbMhybEeXnEJM/WtU27QveOSDqyPtlbJ7DVb0PW', NULL, NULL, '2020-06-27 16:16:33', '2020-06-27 16:16:33'),
(119, 'siswa', 'Yuli ', 'yulihasni2727@gmail.com', NULL, '$2y$10$tNaGgTEh153f/AiNc98EK.v7AugFJiT5HmP0HrECfGAEc.zzZ04/W', NULL, NULL, '2020-06-27 16:16:33', '2020-06-27 16:16:33'),
(120, 'siswa', 'Fuji ', 'arrahmanfuji23@gmail.com', NULL, '$2y$10$vuN41tR4u153RTKpyHTa4uUf5vW0akeJgFvK1MGF51zI/kJkBF7gG', NULL, NULL, '2020-06-27 16:16:33', '2020-06-27 16:16:33'),
(121, 'siswa', 'Warid ', 'wasbasol@gmail.com', NULL, '$2y$10$tXK14TMgblmy/TJHh5m3F.e0fjv6u0NKKBHqTxgqFJBGwqEP.kqCC', NULL, NULL, '2020-06-27 16:16:33', '2020-06-27 16:16:33'),
(122, 'siswa', 'Putri ', 'pviona25@gmail.com', NULL, '$2y$10$LqrzkUN5N/0ZhalLCJf.geHhC1ePwcVP.NWfnESqjNGCDQCW.Bbhe', NULL, NULL, '2020-06-27 16:16:33', '2020-06-27 16:16:33'),
(123, 'siswa', 'Teddy ', 'teddygifari@gmail.com', NULL, '$2y$10$.9nSdYuZgHuSmGD5GFnQMeeWOMqCqhiYJt0ZsLuC5sfvMvBnIxeb6', NULL, NULL, '2020-06-27 16:16:33', '2020-06-27 16:16:33'),
(124, 'siswa', 'Suci', 'suci27081998@gmail.com', NULL, '$2y$10$e2hWrS8S4lwmKb6nUq3ltuzAwAJy9dHyTt/FZ5/hGMDwIWO3.6XT2', NULL, NULL, '2020-06-27 16:16:34', '2020-06-27 16:16:34'),
(125, 'siswa', 'Muhammad ', 'redho2206@gmail.com', NULL, '$2y$10$MJ0j.pg6cc/.9SeJQF4XceX0O.4psrnkaEYp4dA8efDh.Ko429q1i', NULL, NULL, '2020-06-27 16:16:34', '2020-06-27 16:16:34'),
(126, 'siswa', 'Aldi ', 'aldiirsanmajid@gmail.com', NULL, '$2y$10$4JtIWAGzO2BlA1FhwYfRqeP2ux4dFwVFkXjyxOyyA9TXB23JaAaS2', NULL, NULL, '2020-06-27 16:16:34', '2020-06-27 16:16:34'),
(127, 'siswa', 'Alhamda', 'alhamda77bkt@gmail.com', NULL, '$2y$10$WvU61w7UChHyvIwNBHvXCOGJP.CPqL0K2iZow1GPwpoaJJyD0wGUK', NULL, NULL, '2020-06-27 16:16:34', '2020-06-27 16:16:34'),
(128, 'siswa', 'Eksakta ', 'eksakta.jordi@gmail.com', NULL, '$2y$10$lsKi214a8C.jqxhtkF21yeTV.MBOXYVEmarz83ukYkpOJNf4mJ/ny', NULL, NULL, '2020-06-27 16:16:34', '2020-06-27 16:16:34'),
(129, 'siswa', 'Siti ', 'sityrofiah@gmail.com', NULL, '$2y$10$.mcl2KO5uiRpEYvkTZ3SreCXToYyD1AKHOVlWRlhBZc.tPIruTZ5q', NULL, NULL, '2020-06-27 16:16:34', '2020-06-27 16:16:34'),
(131, 'siswa', 'Mutia', 'mutiaaa230398@gmail.com', NULL, '$2y$10$US9Lv4YYxBqlVeW9rBhESO/q6CrNtVTYRGADOhXTBPhQndrfTiVyO', '2S9luuuLOD2PEQeUZEXNl36GOfQonlgMUgJlPpI0eAU5qjo8TNsoF4lzWCTE', NULL, '2020-06-29 07:14:48', '2020-06-29 07:14:48'),
(133, 'siswa', 'Tya', 'mutia23@gmail.com', NULL, '$2y$10$QvMw63tq8aUDR1wJdGeHxOJX/y2iqskTNc01fsyzmXp6JR3H68K7S', 'zvP3tRUCbYE0x1rS6EChtMOiP0T5l76HsRfHEPCW7H7Nkqi7HkTYXoyb1W6H', NULL, '2020-06-29 08:15:15', '2020-06-29 08:15:15'),
(134, 'siswa', 'aaa', 'aaa@gmail.com', NULL, '$2y$10$.rHVLU9yBeQQ.Y8O8xbg8eAsQjWxFOGWr2moNWoEs7ww7MB.GqxLe', 'YUReWiHsfl30muvTclD2XKoOtScPMghbfrueiTIKyDKZnDjKHrVgsWtDjqhk', NULL, '2020-06-30 05:26:13', '2020-06-30 05:26:13'),
(135, 'guru', 'bbbbb', 'bbb@gmail.com', NULL, '$2y$10$gX1dTxC9IkGwL3K.64hgvOkvdLatDMb90lhLAf4rrk0WV1zn9gsc2', '1NrObPEab6pMqDG7JHJOvvjgVvyHyJS1q1wMKuM2dA0J3CXGi91tCCf9oTlI', NULL, '2020-06-30 06:18:14', '2020-06-30 06:18:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapel_siswa`
--
ALTER TABLE `mapel_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mapel_siswa`
--
ALTER TABLE `mapel_siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
