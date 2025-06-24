-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 18, 2025 at 03:51 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cp_pdam_pbg`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `active`, `created_at`, `updated_at`) VALUES
(1, '01JHS1EWFF62DFDBMRG7F0MS73.jpg', 1, '2025-01-16 19:28:46', '2025-02-02 20:11:42'),
(2, '01JJ0ZSCW0GFCMHW6Y4ZD2QSMJ.jpg', 1, '2025-01-19 21:33:29', '2025-01-19 21:33:29'),
(3, '01JJ0ZTM82S71KQP5SMZ2BP82H.jpg', 1, '2025-01-19 21:34:09', '2025-01-19 21:34:09'),
(4, 'banners/01JK4WN7KP25S3XDGEGMHZRDJY.jpeg', 0, '2025-02-02 20:11:26', '2025-06-10 12:03:29');

-- --------------------------------------------------------

--
-- Table structure for table `branch_offices`
--

CREATE TABLE `branch_offices` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_manager` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branch_offices`
--

INSERT INTO `branch_offices` (`id`, `name`, `branch_manager`, `created_at`, `updated_at`) VALUES
(1, 'Kota Bangga', 'Tur Tjahyoto, S.St', '2025-02-03 13:48:03', '2025-02-03 13:48:03'),
(2, 'Jendral Soedirman', 'Wahyudi, S.H', '2025-02-03 13:48:44', '2025-02-03 13:48:44'),
(3, 'Kaligondang', 'Sutarman, A.Md', '2025-02-03 13:57:36', '2025-02-03 13:57:36'),
(4, 'Usman Janatin', 'Wagiman, S.T', '2025-02-03 15:10:41', '2025-02-03 15:10:41');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('77de68daecd823babbb58edb1c8e14d7106e83bb', 'i:2;', 1750214201),
('77de68daecd823babbb58edb1c8e14d7106e83bb:timer', 'i:1750214201;', 1750214201),
('livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3', 'i:1;', 1750206819),
('livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1750206819;', 1750206819),
('spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:126:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:11:\"view_banner\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:15:\"view_any_banner\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:13:\"create_banner\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:13:\"update_banner\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:14:\"restore_banner\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:18:\"restore_any_banner\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:16:\"replicate_banner\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:14:\"reorder_banner\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:13:\"delete_banner\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:17:\"delete_any_banner\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:19:\"force_delete_banner\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:11;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:23:\"force_delete_any_banner\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:12;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:13:\"view_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:13;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:17:\"view_any_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:14;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:15:\"create_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:15;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:15:\"update_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:16;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:16:\"restore_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:17;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:20:\"restore_any_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:18;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:18:\"replicate_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:19;a:4:{s:1:\"a\";i:20;s:1:\"b\";s:16:\"reorder_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:20;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:15:\"delete_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:21;a:4:{s:1:\"a\";i:22;s:1:\"b\";s:19:\"delete_any_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:22;a:4:{s:1:\"a\";i:23;s:1:\"b\";s:21:\"force_delete_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:23;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:25:\"force_delete_any_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:24;a:4:{s:1:\"a\";i:25;s:1:\"b\";s:9:\"view_post\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:25;a:4:{s:1:\"a\";i:26;s:1:\"b\";s:13:\"view_any_post\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:26;a:4:{s:1:\"a\";i:27;s:1:\"b\";s:11:\"create_post\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:27;a:4:{s:1:\"a\";i:28;s:1:\"b\";s:11:\"update_post\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:28;a:4:{s:1:\"a\";i:29;s:1:\"b\";s:12:\"restore_post\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:29;a:4:{s:1:\"a\";i:30;s:1:\"b\";s:16:\"restore_any_post\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:30;a:4:{s:1:\"a\";i:31;s:1:\"b\";s:14:\"replicate_post\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:31;a:4:{s:1:\"a\";i:32;s:1:\"b\";s:12:\"reorder_post\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:32;a:4:{s:1:\"a\";i:33;s:1:\"b\";s:11:\"delete_post\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:33;a:4:{s:1:\"a\";i:34;s:1:\"b\";s:15:\"delete_any_post\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:34;a:4:{s:1:\"a\";i:35;s:1:\"b\";s:17:\"force_delete_post\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:35;a:4:{s:1:\"a\";i:36;s:1:\"b\";s:21:\"force_delete_any_post\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:36;a:4:{s:1:\"a\";i:37;s:1:\"b\";s:9:\"view_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:37;a:4:{s:1:\"a\";i:38;s:1:\"b\";s:13:\"view_any_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:38;a:4:{s:1:\"a\";i:39;s:1:\"b\";s:11:\"create_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:39;a:4:{s:1:\"a\";i:40;s:1:\"b\";s:11:\"update_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:40;a:4:{s:1:\"a\";i:41;s:1:\"b\";s:11:\"delete_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:41;a:4:{s:1:\"a\";i:42;s:1:\"b\";s:15:\"delete_any_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:42;a:4:{s:1:\"a\";i:43;s:1:\"b\";s:9:\"view_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:43;a:4:{s:1:\"a\";i:44;s:1:\"b\";s:13:\"view_any_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:44;a:4:{s:1:\"a\";i:45;s:1:\"b\";s:11:\"create_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:45;a:4:{s:1:\"a\";i:46;s:1:\"b\";s:11:\"update_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:46;a:4:{s:1:\"a\";i:47;s:1:\"b\";s:12:\"restore_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:47;a:4:{s:1:\"a\";i:48;s:1:\"b\";s:16:\"restore_any_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:48;a:4:{s:1:\"a\";i:49;s:1:\"b\";s:14:\"replicate_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:49;a:4:{s:1:\"a\";i:50;s:1:\"b\";s:12:\"reorder_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:50;a:4:{s:1:\"a\";i:51;s:1:\"b\";s:11:\"delete_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:51;a:4:{s:1:\"a\";i:52;s:1:\"b\";s:15:\"delete_any_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:52;a:4:{s:1:\"a\";i:53;s:1:\"b\";s:17:\"force_delete_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:53;a:4:{s:1:\"a\";i:54;s:1:\"b\";s:21:\"force_delete_any_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:54;a:4:{s:1:\"a\";i:55;s:1:\"b\";s:12:\"view_comment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:55;a:4:{s:1:\"a\";i:56;s:1:\"b\";s:16:\"view_any_comment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:56;a:4:{s:1:\"a\";i:57;s:1:\"b\";s:14:\"create_comment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:57;a:4:{s:1:\"a\";i:58;s:1:\"b\";s:14:\"update_comment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:58;a:4:{s:1:\"a\";i:59;s:1:\"b\";s:15:\"restore_comment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:59;a:4:{s:1:\"a\";i:60;s:1:\"b\";s:19:\"restore_any_comment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:60;a:4:{s:1:\"a\";i:61;s:1:\"b\";s:17:\"replicate_comment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:61;a:4:{s:1:\"a\";i:62;s:1:\"b\";s:15:\"reorder_comment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:62;a:4:{s:1:\"a\";i:63;s:1:\"b\";s:14:\"delete_comment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:63;a:4:{s:1:\"a\";i:64;s:1:\"b\";s:18:\"delete_any_comment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:64;a:4:{s:1:\"a\";i:65;s:1:\"b\";s:20:\"force_delete_comment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:65;a:4:{s:1:\"a\";i:66;s:1:\"b\";s:24:\"force_delete_any_comment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:66;a:4:{s:1:\"a\";i:67;s:1:\"b\";s:19:\"view_branch::office\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:67;a:4:{s:1:\"a\";i:68;s:1:\"b\";s:23:\"view_any_branch::office\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:68;a:4:{s:1:\"a\";i:69;s:1:\"b\";s:21:\"create_branch::office\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:69;a:4:{s:1:\"a\";i:70;s:1:\"b\";s:21:\"update_branch::office\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:70;a:4:{s:1:\"a\";i:71;s:1:\"b\";s:22:\"restore_branch::office\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:71;a:4:{s:1:\"a\";i:72;s:1:\"b\";s:26:\"restore_any_branch::office\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:72;a:4:{s:1:\"a\";i:73;s:1:\"b\";s:24:\"replicate_branch::office\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:73;a:4:{s:1:\"a\";i:74;s:1:\"b\";s:22:\"reorder_branch::office\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:74;a:4:{s:1:\"a\";i:75;s:1:\"b\";s:21:\"delete_branch::office\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:75;a:4:{s:1:\"a\";i:76;s:1:\"b\";s:25:\"delete_any_branch::office\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:76;a:4:{s:1:\"a\";i:77;s:1:\"b\";s:27:\"force_delete_branch::office\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:77;a:4:{s:1:\"a\";i:78;s:1:\"b\";s:31:\"force_delete_any_branch::office\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:78;a:4:{s:1:\"a\";i:79;s:1:\"b\";s:13:\"view_employee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:79;a:4:{s:1:\"a\";i:80;s:1:\"b\";s:17:\"view_any_employee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:80;a:4:{s:1:\"a\";i:81;s:1:\"b\";s:15:\"create_employee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:81;a:4:{s:1:\"a\";i:82;s:1:\"b\";s:15:\"update_employee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:82;a:4:{s:1:\"a\";i:83;s:1:\"b\";s:16:\"restore_employee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:83;a:4:{s:1:\"a\";i:84;s:1:\"b\";s:20:\"restore_any_employee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:84;a:4:{s:1:\"a\";i:85;s:1:\"b\";s:18:\"replicate_employee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:85;a:4:{s:1:\"a\";i:86;s:1:\"b\";s:16:\"reorder_employee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:86;a:4:{s:1:\"a\";i:87;s:1:\"b\";s:15:\"delete_employee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:87;a:4:{s:1:\"a\";i:88;s:1:\"b\";s:19:\"delete_any_employee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:88;a:4:{s:1:\"a\";i:89;s:1:\"b\";s:21:\"force_delete_employee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:89;a:4:{s:1:\"a\";i:90;s:1:\"b\";s:25:\"force_delete_any_employee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:90;a:4:{s:1:\"a\";i:91;s:1:\"b\";s:11:\"view_office\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:91;a:4:{s:1:\"a\";i:92;s:1:\"b\";s:15:\"view_any_office\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:92;a:4:{s:1:\"a\";i:93;s:1:\"b\";s:13:\"create_office\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:93;a:4:{s:1:\"a\";i:94;s:1:\"b\";s:13:\"update_office\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:94;a:4:{s:1:\"a\";i:95;s:1:\"b\";s:14:\"restore_office\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:95;a:4:{s:1:\"a\";i:96;s:1:\"b\";s:18:\"restore_any_office\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:96;a:4:{s:1:\"a\";i:97;s:1:\"b\";s:16:\"replicate_office\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:97;a:4:{s:1:\"a\";i:98;s:1:\"b\";s:14:\"reorder_office\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:98;a:4:{s:1:\"a\";i:99;s:1:\"b\";s:13:\"delete_office\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:99;a:4:{s:1:\"a\";i:100;s:1:\"b\";s:17:\"delete_any_office\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:100;a:4:{s:1:\"a\";i:101;s:1:\"b\";s:19:\"force_delete_office\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:101;a:4:{s:1:\"a\";i:102;s:1:\"b\";s:23:\"force_delete_any_office\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:102;a:4:{s:1:\"a\";i:103;s:1:\"b\";s:13:\"view_position\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:103;a:4:{s:1:\"a\";i:104;s:1:\"b\";s:17:\"view_any_position\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:104;a:4:{s:1:\"a\";i:105;s:1:\"b\";s:15:\"create_position\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:105;a:4:{s:1:\"a\";i:106;s:1:\"b\";s:15:\"update_position\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:106;a:4:{s:1:\"a\";i:107;s:1:\"b\";s:16:\"restore_position\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:107;a:4:{s:1:\"a\";i:108;s:1:\"b\";s:20:\"restore_any_position\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:108;a:4:{s:1:\"a\";i:109;s:1:\"b\";s:18:\"replicate_position\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:109;a:4:{s:1:\"a\";i:110;s:1:\"b\";s:16:\"reorder_position\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:110;a:4:{s:1:\"a\";i:111;s:1:\"b\";s:15:\"delete_position\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:111;a:4:{s:1:\"a\";i:112;s:1:\"b\";s:19:\"delete_any_position\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:112;a:4:{s:1:\"a\";i:113;s:1:\"b\";s:21:\"force_delete_position\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:113;a:4:{s:1:\"a\";i:114;s:1:\"b\";s:25:\"force_delete_any_position\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:114;a:4:{s:1:\"a\";i:115;s:1:\"b\";s:24:\"view_comment::audit::log\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:115;a:4:{s:1:\"a\";i:116;s:1:\"b\";s:28:\"view_any_comment::audit::log\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:116;a:4:{s:1:\"a\";i:117;s:1:\"b\";s:26:\"create_comment::audit::log\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:117;a:4:{s:1:\"a\";i:118;s:1:\"b\";s:26:\"update_comment::audit::log\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:118;a:4:{s:1:\"a\";i:119;s:1:\"b\";s:27:\"restore_comment::audit::log\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:119;a:4:{s:1:\"a\";i:120;s:1:\"b\";s:31:\"restore_any_comment::audit::log\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:120;a:4:{s:1:\"a\";i:121;s:1:\"b\";s:29:\"replicate_comment::audit::log\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:121;a:4:{s:1:\"a\";i:122;s:1:\"b\";s:27:\"reorder_comment::audit::log\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:122;a:4:{s:1:\"a\";i:123;s:1:\"b\";s:26:\"delete_comment::audit::log\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:123;a:4:{s:1:\"a\";i:124;s:1:\"b\";s:30:\"delete_any_comment::audit::log\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:124;a:4:{s:1:\"a\";i:125;s:1:\"b\";s:32:\"force_delete_comment::audit::log\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:125;a:4:{s:1:\"a\";i:126;s:1:\"b\";s:36:\"force_delete_any_comment::audit::log\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}}s:5:\"roles\";a:3:{i:0;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:5:\"Admin\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:3;s:1:\"b\";s:15:\"Content Creator\";s:1:\"c\";s:3:\"web\";}i:2;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:11:\"Super Admin\";s:1:\"c\";s:3:\"web\";}}}', 1750292910);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Berita', 'berita', '2025-01-16 19:00:10', '2025-01-16 19:00:10'),
(3, 'Informasi', 'informasi', '2025-01-20 19:47:15', '2025-01-20 19:47:15'),
(4, 'Pengumuman Baru', 'pengumuman-baru', '2025-06-15 18:32:07', '2025-06-15 18:32:07');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `post_id` bigint UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved` tinyint(1) DEFAULT '0',
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `comment`, `name`, `email`, `phone_number`, `approved`, `parent_id`, `created_at`, `updated_at`) VALUES
(3, 3, 'apapap edit oleh admin', 'p', 'regita@gmail.com', '081298761123', 1, NULL, '2025-01-29 13:53:33', '2025-06-15 09:59:09'),
(4, 3, 'alala', 'fa', 'fa@gmail.com', '089123456789', 1, NULL, '2025-01-29 17:57:00', '2025-01-29 17:57:00'),
(19, 3, 'utama', 'utami', 'utami@gmail.com', '081716512331', 1, NULL, '2025-01-29 22:18:27', '2025-01-29 22:18:27'),
(20, 3, 'komentar pertama', 'namaku', 'namaku@gmail.com', '089812314122', 0, NULL, '2025-01-29 22:20:12', '2025-01-29 22:20:12'),
(21, 3, 'balasan yaya y', 'ying', 'ying@gmail.com', '081789222111', 0, NULL, '2025-01-29 22:22:37', '2025-01-29 22:22:37'),
(22, 3, 'gatau balas', 'ying', 'ying@gmail.com', '088123411122', 0, NULL, '2025-01-29 22:32:23', '2025-01-29 22:32:23'),
(23, 3, 'balas komen alala', 'ying', 'ying@gmail.com', '088123411122', 0, 4, '2025-01-29 22:34:25', '2025-01-29 22:34:25'),
(24, 3, 'utamanya', 'ying', 'ying@gmail.com', '089812314122', 1, NULL, '2025-01-29 22:35:22', '2025-01-29 22:35:22'),
(25, 3, 'balasan gatau milik pi dari polo dikomen lagi', 'ying', 'ying@gmail.com', '088123411122', 0, NULL, '2025-01-29 22:43:57', '2025-01-29 22:43:57'),
(26, 3, 'polo balas lagi', 'polo', 'polo@gmail.com', '081239712341', 0, 25, '2025-01-29 22:44:45', '2025-01-29 22:44:45'),
(27, 3, 'polo membalas komentar sendiri', 'polo', 'polo@gmail.com', '081239712341', 0, 26, '2025-01-29 22:46:32', '2025-01-29 22:46:32'),
(35, 4, 'lp', 'al', NULL, '0856812312341', 0, NULL, '2025-02-02 23:37:27', '2025-02-02 23:37:27'),
(36, 4, 'hu', 'aaaaa', NULL, '0891283412414', 0, NULL, '2025-02-02 23:40:46', '2025-02-02 23:40:46'),
(38, 4, 'loa', 'co', NULL, '0859891241515', 0, NULL, '2025-02-02 23:41:50', '2025-02-02 23:41:50'),
(41, 2, 'kokokok', 'Admin SIPERIKSA', 'adminsiperiksa@gmail.com', '081234098761', 0, NULL, '2025-02-04 19:23:35', '2025-02-04 19:23:35'),
(42, 2, 'lok', 'Admin SIPERIKSA', 'adminsiperiksa@gmail.com', '081234098761', 0, NULL, '2025-02-04 19:24:28', '2025-02-04 19:24:28'),
(43, 2, 'komentarbaru', 'Admin SIPERIKSA', 'adminsiperiksa@gmail.com', '081234098761', 0, NULL, '2025-02-04 20:03:49', '2025-02-04 20:03:49'),
(44, 2, 'kome', 'Admin SIPERIKSA', 'adminsiperiksa@gmail.com', '081234098761', 0, NULL, '2025-02-04 20:05:47', '2025-02-04 20:05:47'),
(45, 2, 'komn', 'Admin SIPERIKSA', 'adminsiperiksa@gmail.com', '081234098761', 0, NULL, '2025-02-04 20:08:07', '2025-02-04 20:08:07'),
(46, 2, 'loi', 'Admin SIPERIKSA', 'adminsiperiksa@gmail.com', '081234098761', 0, NULL, '2025-02-04 20:16:43', '2025-02-04 20:16:43'),
(48, 2, 'lop', 'Admin SIPERIKSA', 'adminsiperiksa@gmail.com', '081234098761', 0, NULL, '2025-02-04 20:19:43', '2025-02-04 20:19:43'),
(49, 2, 'loii', 'Admin SIPERIKSA', 'adminsiperiksa@gmail.com', '081234098761', 0, NULL, '2025-02-04 20:21:30', '2025-02-04 20:21:30'),
(50, 2, 'baru', 'Admin', 'admin@gmail.com', '081290123311', 0, NULL, '2025-02-04 20:29:38', '2025-02-04 20:29:38'),
(51, 2, 'llllllllllllllllllll', 'Admin SIPERIKSA', 'adminsiperiksa@gmail.com', '081234098761', 1, NULL, '2025-02-04 20:30:44', '2025-02-05 00:56:43'),
(54, 2, 'dri bee', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-02-04 23:26:10', '2025-02-04 23:26:10'),
(58, 2, 'kiiiiiio', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-02-05 00:59:03', '2025-02-05 00:59:03'),
(60, 2, 'dari admin', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-02-05 14:48:46', '2025-02-05 14:48:46'),
(65, 2, 'KOMENTAR PERTAMA', 'Regita', 'regita@gmail.com', NULL, 0, NULL, '2025-06-03 04:37:50', '2025-06-03 04:37:50'),
(66, 2, 'komentar lagi', 'Sinta', 'sinta@gmail.com', NULL, 0, NULL, '2025-06-03 04:42:54', '2025-06-03 04:42:54'),
(67, 2, 'komentar dari saya', 'Sinta', 'sinta@gmail.com', NULL, 0, NULL, '2025-06-03 04:52:37', '2025-06-03 04:52:37'),
(68, 2, 'komentar dari saya', 'Sinta', 'sinta@gmail.com', NULL, 0, NULL, '2025-06-03 04:52:56', '2025-06-03 04:52:56'),
(69, 2, 'komentar dari saya', 'Sinta', 'sinta@gmail.com', NULL, 0, NULL, '2025-06-03 04:54:33', '2025-06-03 04:54:33'),
(70, 2, 'komentar saya', 'Sinta', 'sinta@gmail.com', NULL, 0, NULL, '2025-06-03 04:58:54', '2025-06-03 04:58:54'),
(71, 2, 'komentar saya', 'Sinta', 'sinta@gmail.com', NULL, 0, NULL, '2025-06-03 05:00:24', '2025-06-03 05:00:24'),
(72, 2, 'komentar', 'Sinta', 'sinta@gmail.com', NULL, 0, NULL, '2025-06-03 05:06:33', '2025-06-03 05:06:33'),
(73, 2, 'kmentar', 'Sinta', 'sinta@gmail.com', NULL, 0, NULL, '2025-06-03 05:10:29', '2025-06-03 05:10:29'),
(74, 2, 'kmntr', 'Reg', 'reg@gmail.com', NULL, 0, NULL, '2025-06-07 11:53:05', '2025-06-07 11:53:05'),
(75, 2, 'halo', 'reg', 'reg@gmail.com', NULL, 0, NULL, '2025-06-07 11:54:01', '2025-06-07 11:54:01'),
(76, 2, 'lo', 're', 're@gmail.com', NULL, 0, NULL, '2025-06-07 11:54:36', '2025-06-07 11:54:36'),
(77, 2, 'p', 're', 're@gmail.com', NULL, 0, NULL, '2025-06-07 11:55:33', '2025-06-07 11:55:33'),
(78, 2, 'p', 're', 're@gmail.com', NULL, 0, NULL, '2025-06-07 11:56:24', '2025-06-07 11:56:24'),
(79, 4, 'po', 're', 're@gmail.com', NULL, 0, NULL, '2025-06-07 11:57:33', '2025-06-07 11:57:33'),
(80, 4, 'komentar', 'reg', 'reg@gmail.com', NULL, 0, NULL, '2025-06-07 11:58:47', '2025-06-07 11:58:47'),
(81, 4, 'lo', 'reg', 'reg@gmail.com', NULL, 0, NULL, '2025-06-07 12:04:55', '2025-06-07 12:04:55'),
(82, 4, 'po', 're', 're@gmail.com', NULL, 0, NULL, '2025-06-07 12:06:33', '2025-06-07 12:06:33'),
(83, 3, 'kom', 're', 're@gmail.com', NULL, 0, NULL, '2025-06-07 12:13:49', '2025-06-07 12:13:49'),
(84, 3, 'komen', 're', 're@gmail.com', NULL, 0, NULL, '2025-06-07 12:15:06', '2025-06-07 12:15:06'),
(85, 3, 'komentar', 're', 're@gmail.com', NULL, 0, NULL, '2025-06-07 12:15:57', '2025-06-07 12:15:57'),
(86, 3, 'loi', 're', 're@gmail.com', NULL, 0, NULL, '2025-06-07 12:24:05', '2025-06-07 12:24:05'),
(87, 3, 'komen', 'reg', 'reg@gmail.com', NULL, 0, NULL, '2025-06-07 12:27:18', '2025-06-07 12:27:18'),
(88, 3, 'komen', 're', 're@gmail.com', NULL, 0, NULL, '2025-06-07 12:27:54', '2025-06-07 12:27:54'),
(89, 2, 'komentqr', 're', 're@gmail.com', NULL, 0, NULL, '2025-06-07 12:33:49', '2025-06-07 12:33:49'),
(90, 2, 'komen', 're', 're@gmail.com', NULL, 0, NULL, '2025-06-07 12:34:30', '2025-06-07 12:34:30'),
(91, 2, 'koment', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-07 12:43:18', '2025-06-07 12:43:18'),
(92, 2, 'koml', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-07 12:44:28', '2025-06-07 12:44:28'),
(93, 4, 'komen', 're', 're@gmail.com', NULL, 0, NULL, '2025-06-07 13:06:37', '2025-06-07 13:06:37'),
(94, 4, 'kom', 're', 're@gmail.com', NULL, 0, NULL, '2025-06-07 13:07:11', '2025-06-07 13:07:11'),
(95, 4, 'p', 'rere', 're@gmail.com', NULL, 0, NULL, '2025-06-07 13:07:57', '2025-06-07 13:07:57'),
(96, 4, 'komen', 're', 're@gmail.com', '0812718212121', 1, NULL, '2025-06-07 13:08:42', '2025-06-15 19:07:23'),
(97, 4, 'po', 're', 're@gmail.com', NULL, 0, NULL, '2025-06-07 13:09:38', '2025-06-07 13:09:38'),
(98, 4, 'komen', 're', 're@gmail.com', NULL, 0, NULL, '2025-06-07 13:12:08', '2025-06-07 13:12:08'),
(99, 4, 'komen', 're', 're@gmail.com', NULL, 0, NULL, '2025-06-07 13:16:05', '2025-06-07 13:16:05'),
(100, 2, 'komentarku', 'reg', 'reg@gmail.com', '081231209122', 0, NULL, '2025-06-10 07:38:52', '2025-06-10 07:38:52'),
(101, 2, 'komen', 're', 're@gmail.com', '0812310991231', 0, NULL, '2025-06-10 07:39:41', '2025-06-10 07:39:41'),
(102, 2, 'komn', 'amau', 'amau@gmail.com', '0812312011223', 0, NULL, '2025-06-10 07:44:22', '2025-06-10 07:44:22'),
(103, 2, 'komn', 'ha', 'ha@gmail.com', NULL, 0, NULL, '2025-06-10 07:47:46', '2025-06-10 07:47:46'),
(104, 2, 'komen', 'nama', 'nama@gmail.com', NULL, 0, NULL, '2025-06-10 07:52:10', '2025-06-10 07:52:10'),
(105, 2, 'kad', 'naam', 'nama@gmail.com', NULL, 0, NULL, '2025-06-10 07:53:44', '2025-06-10 07:53:44'),
(106, 2, 'komen', 'nama', 'nama@gmail.com', NULL, 0, NULL, '2025-06-10 07:54:12', '2025-06-10 07:54:12'),
(107, 2, 'komen', 'nma', 'nama@gmail.com', NULL, 0, NULL, '2025-06-10 07:54:33', '2025-06-10 07:54:33'),
(108, 2, 'komenl', 'opo', 'opo@gmail.com', NULL, 0, NULL, '2025-06-10 07:54:55', '2025-06-10 07:54:55'),
(109, 2, 'komentar', 'nama', 'nama@gmail.com', '081298192123', 0, NULL, '2025-06-10 08:30:24', '2025-06-10 08:30:24'),
(110, 2, 'comment', 'namaku', 'namaku@gmail.com', '081298192121', 0, NULL, '2025-06-10 08:31:35', '2025-06-10 08:31:35'),
(111, 2, 'kom', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 08:40:46', '2025-06-10 08:40:46'),
(113, 2, 'komentar kamu', 'kamu', 'kamu@gmail.com', '0812312311122', 0, NULL, '2025-06-10 08:47:59', '2025-06-10 08:47:59'),
(124, 4, 'komen', 'nama', 'nama@gmail.com', NULL, 0, NULL, '2025-06-10 09:29:36', '2025-06-10 09:29:36'),
(125, 4, 'komen', 'nama', 'nama@gmail.com', '0851029012121', 0, NULL, '2025-06-10 09:35:47', '2025-06-10 09:35:47'),
(139, 2, 'komentar', 'nama', 'nama@gmail.com', '0812797971212', 0, NULL, '2025-06-10 10:02:42', '2025-06-10 10:02:42'),
(140, 2, 'komen', 'nama', 'nama@gmail.com', '0812898981212', 0, NULL, '2025-06-10 10:06:00', '2025-06-10 10:06:00'),
(141, 2, 'komen', 'nama', 'nama@gmail.com', '0812909129091', 0, NULL, '2025-06-10 10:09:57', '2025-06-10 10:09:57'),
(142, 2, 'komentar', 'nama', 'nama@gmail.com', '0812989898198', 0, NULL, '2025-06-10 10:11:01', '2025-06-10 10:11:01'),
(144, 2, 'komen', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 10:13:10', '2025-06-10 10:13:10'),
(145, 2, 'komen', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 10:13:43', '2025-06-10 10:13:43'),
(146, 2, 'komen', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 10:13:55', '2025-06-10 10:13:55'),
(148, 2, 'aalo', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 10:14:35', '2025-06-10 10:14:35'),
(149, 2, 'ko', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 10:22:49', '2025-06-10 10:22:49'),
(150, 2, 'kom', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 10:23:21', '2025-06-10 10:23:21'),
(151, 2, 'komen', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 10:24:47', '2025-06-10 10:24:47'),
(152, 2, 'kom', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 10:27:09', '2025-06-10 10:27:09'),
(153, 2, 'kom', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 10:28:16', '2025-06-10 10:28:16'),
(154, 2, 'kom', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 10:28:59', '2025-06-10 10:28:59'),
(155, 2, 'lo', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 10:29:35', '2025-06-10 10:29:35'),
(156, 2, 'loo', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 10:30:02', '2025-06-10 10:30:02'),
(157, 2, 'lol', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 10:31:23', '2025-06-10 10:31:23'),
(158, 2, 'kome', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 10:31:45', '2025-06-10 10:31:45'),
(159, 2, 'komen', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 10:35:09', '2025-06-10 10:35:09'),
(160, 2, 'komen', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 10:35:58', '2025-06-10 10:35:58'),
(161, 2, 'kom', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 10:36:34', '2025-06-10 10:36:34'),
(162, 2, 'komentar', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 10:40:55', '2025-06-10 10:40:55'),
(163, 2, 'reset', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 10:43:22', '2025-06-10 10:43:22'),
(164, 2, 'jalo', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 10:44:33', '2025-06-10 10:44:33'),
(165, 2, 'komentar', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 10:45:31', '2025-06-10 10:45:31'),
(166, 2, 'reset', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 10:46:30', '2025-06-10 10:46:30'),
(167, 2, 'reset', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 10:46:49', '2025-06-10 10:46:49'),
(168, 2, 'kom', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 10:50:39', '2025-06-10 10:50:39'),
(169, 2, 'ko', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 10:51:12', '2025-06-10 10:51:12'),
(170, 2, 'm', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 10:53:49', '2025-06-10 10:53:49'),
(171, 2, 'post', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 10:55:38', '2025-06-10 10:55:38'),
(172, 2, 'post', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 10:55:50', '2025-06-10 10:55:50'),
(173, 2, 'hlo', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 10:56:16', '2025-06-10 10:56:16'),
(174, 2, 'halo', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 10:57:39', '2025-06-10 10:57:39'),
(175, 2, 'kom', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 11:00:24', '2025-06-10 11:00:24'),
(176, 2, 'kom', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 11:01:29', '2025-06-10 11:01:29'),
(177, 2, 'kom', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 11:03:20', '2025-06-10 11:03:20'),
(178, 2, 'kom', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 11:03:51', '2025-06-10 11:03:51'),
(179, 2, 'klo', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 11:29:35', '2025-06-10 11:29:35'),
(180, 2, 'klop', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 11:32:06', '2025-06-10 11:32:06'),
(181, 2, 'klop', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 11:33:16', '2025-06-10 11:33:16'),
(182, 2, 'klopj', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 11:33:55', '2025-06-10 11:33:55'),
(183, 2, 'halo', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 11:35:33', '2025-06-10 11:35:33'),
(184, 2, 'yeh', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 11:38:16', '2025-06-10 11:38:16'),
(185, 2, 'klo', 'Admin', 'admin@gmail.com', NULL, 0, NULL, '2025-06-10 11:41:38', '2025-06-10 11:41:38'),
(186, 2, 'lo', 'kula', 'kula@gmail.com', '0812989712211', 0, NULL, '2025-06-10 16:55:29', '2025-06-10 16:55:29'),
(187, 2, 'testtt', 'Test', 'test@gmail.com', '0812341221212', 0, NULL, '2025-06-10 16:57:38', '2025-06-10 16:57:38'),
(188, 2, 'testt', 'Test', 'test@gmail.com', '0812990912121', 0, NULL, '2025-06-10 16:59:25', '2025-06-10 16:59:25'),
(189, 2, 'test', 'Test', 'test@gmail.com', '0812312312312', 0, NULL, '2025-06-10 17:02:31', '2025-06-10 17:02:31'),
(190, 2, 'Tes Komentar', 'Test', 'test@gmail.com', '0812312121212', 0, NULL, '2025-06-10 17:06:51', '2025-06-10 17:06:51'),
(191, 2, 'Tes', 'Tes', 'tes@gmail.com', '0812898912131', 0, NULL, '2025-06-10 17:08:18', '2025-06-10 17:08:18'),
(192, 2, 'tes komentar', 'Tes', 'test@gmail.com', '0811298981921', 0, NULL, '2025-06-10 17:10:04', '2025-06-10 17:10:04'),
(193, 2, 'Test again', 'Test', 'test@gmail.com', '0812889121212', 0, NULL, '2025-06-10 17:11:51', '2025-06-10 17:11:51'),
(194, 2, 'Test komentar', 'Test', 'test@gmail.com', '0812898121231', 0, NULL, '2025-06-10 17:12:51', '2025-06-10 17:12:51'),
(195, 2, 'Test komen', 'Test', 'test@gmail.com', '0812989812313', 0, NULL, '2025-06-10 17:13:52', '2025-06-10 17:13:52'),
(196, 2, 'Test ', 'Test', 'test@gmail.com', '081289812313', 0, NULL, '2025-06-10 17:16:03', '2025-06-10 17:16:03'),
(197, 2, 'ma', 'ma', 'ma@gmail.com', '0815766881111', 0, NULL, '2025-06-10 20:27:02', '2025-06-10 20:27:02'),
(198, 3, 'komenar', 'nama', 'nama@gmail.com', '0818981221212', 0, NULL, '2025-06-15 08:35:34', '2025-06-15 08:35:34'),
(199, 3, 'Komentar', 'Komentar', 'komentar@gmail.com', '0812128980189', 0, NULL, '2025-06-15 08:42:01', '2025-06-15 08:42:01'),
(200, 3, 'kola', 'kola', 'kola@gmail.com', '0812980989389', 0, NULL, '2025-06-15 08:43:34', '2025-06-15 08:43:34'),
(201, 3, 'ad', 'komen', 'komen@gmail.com', '0812898121313', 0, NULL, '2025-06-15 08:45:15', '2025-06-15 08:45:15'),
(203, 3, 'komentar super', 'Super Adminn', 'superadmin@gmail.com', NULL, 0, NULL, '2025-06-15 09:05:48', '2025-06-15 09:05:48'),
(204, 3, 'balas sendiri', 'Super Adminn', 'superadmin@gmail.com', NULL, 0, 203, '2025-06-15 09:14:36', '2025-06-15 09:14:36'),
(205, 3, 'bales apap dari admin\nedit oleh admin', 'Admin PDAM', 'admin@gmail.com', NULL, 0, 3, '2025-06-15 09:16:24', '2025-06-15 09:30:44'),
(208, 3, 'bal', 'Admin PDAM', 'admin@gmail.com', NULL, 0, NULL, '2025-06-15 09:16:46', '2025-06-15 09:16:46'),
(209, 3, 'balas', 'Admin PDAM', 'admin@gmail.com', NULL, 0, 208, '2025-06-15 09:16:53', '2025-06-15 09:16:53'),
(210, 3, 'balas', 'Admin PDAM', 'admin@gmail.com', NULL, 0, 209, '2025-06-15 09:17:02', '2025-06-15 09:17:02'),
(213, 4, 'dari humas / konten kreator', 'Humas', 'humas@gmail.com', NULL, 0, NULL, '2025-06-15 09:49:06', '2025-06-15 09:49:06'),
(214, 4, 'balasan dari author post ini', 'Humas', 'humas@gmail.com', NULL, 1, 96, '2025-06-15 10:04:55', '2025-06-15 10:07:45'),
(215, 5, 'Apakah setiap hari Senin diadakan apel pagi?', 'Regita', 'regita@gmail.com', '081230981635', 0, NULL, '2025-06-15 18:07:19', '2025-06-15 18:07:19'),
(216, 5, 'Apel pagi dimulai pukul berapa?', 'Regi', 'regi@gmail.com', '0812895671223', 0, NULL, '2025-06-15 18:09:36', '2025-06-15 18:09:36'),
(218, 4, 'balas', 'Humas', 'humas@gmail.com', NULL, 0, 96, '2025-06-15 21:03:01', '2025-06-15 21:03:01');

-- --------------------------------------------------------

--
-- Table structure for table `comment_logs`
--

CREATE TABLE `comment_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `comment_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `action` enum('update','delete') COLLATE utf8mb4_unicode_ci NOT NULL,
  `old_value` text COLLATE utf8mb4_unicode_ci,
  `new_value` text COLLATE utf8mb4_unicode_ci,
  `action_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment_logs`
--

INSERT INTO `comment_logs` (`id`, `comment_id`, `user_id`, `action`, `old_value`, `new_value`, `action_time`, `created_at`, `updated_at`) VALUES
(1, 55, 2, 'delete', 'blsn ap dri be', NULL, '2025-02-05 08:08:55', '2025-02-05 01:08:55', '2025-02-05 01:08:55'),
(2, 1, 2, 'delete', 'apaaa', NULL, '2025-02-05 08:08:57', '2025-02-05 01:08:57', '2025-02-05 01:08:57'),
(3, 61, 2, 'update', 'admin', 'admin', '2025-02-06 04:15:18', '2025-02-05 21:15:18', '2025-02-05 21:15:18'),
(4, 61, 2, 'update', 'admin', 'admij', '2025-02-06 04:15:51', '2025-02-05 21:15:51', '2025-02-05 21:15:51'),
(5, 62, 2, 'update', 'bales', 'bales', '2025-02-06 04:16:14', '2025-02-05 21:16:14', '2025-02-05 21:16:14'),
(6, 28, 2, 'delete', 'wah', NULL, '2025-02-06 04:21:09', '2025-02-05 21:21:09', '2025-02-05 21:21:09'),
(7, 32, 2, 'delete', 'berkomentar', NULL, '2025-02-06 04:21:14', '2025-02-05 21:21:14', '2025-02-05 21:21:14'),
(8, 33, 2, 'delete', 'aku', NULL, '2025-02-06 04:21:19', '2025-02-05 21:21:19', '2025-02-05 21:21:19'),
(9, 52, 2, 'delete', 'lkok', NULL, '2025-06-10 18:27:48', '2025-06-10 11:27:48', '2025-06-10 11:27:48'),
(10, 143, 2, 'delete', 'balasan lll', NULL, '2025-06-10 18:28:04', '2025-06-10 11:28:04', '2025-06-10 11:28:04'),
(11, 147, 2, 'delete', 'balas lagi', NULL, '2025-06-10 20:12:24', '2025-06-10 13:12:24', '2025-06-10 13:12:24'),
(12, 64, 2, 'delete', 'komen', NULL, '2025-06-11 04:56:26', '2025-06-10 21:56:26', '2025-06-10 21:56:26'),
(13, 63, 2, 'delete', 'ki', NULL, '2025-06-11 04:56:32', '2025-06-10 21:56:32', '2025-06-10 21:56:32'),
(14, 61, 2, 'delete', 'admij', NULL, '2025-06-11 06:27:27', '2025-06-10 23:27:27', '2025-06-10 23:27:27'),
(15, 59, NULL, 'delete', 'balasan ll', NULL, '2025-06-15 14:53:36', '2025-06-15 07:53:36', '2025-06-15 07:53:36'),
(16, 202, 1, 'delete', 'komen apapap', NULL, '2025-06-15 16:05:38', '2025-06-15 09:05:38', '2025-06-15 09:05:38'),
(17, 212, 2, 'delete', 'balas', NULL, '2025-06-15 16:17:31', '2025-06-15 09:17:31', '2025-06-15 09:17:31'),
(18, 211, 2, 'delete', 'cek', NULL, '2025-06-15 16:17:41', '2025-06-15 09:17:41', '2025-06-15 09:17:41'),
(19, 207, 2, 'delete', 'bales', NULL, '2025-06-15 16:17:48', '2025-06-15 09:17:48', '2025-06-15 09:17:48'),
(20, 206, 2, 'delete', 'bals', NULL, '2025-06-15 16:20:57', '2025-06-15 09:20:57', '2025-06-15 09:20:57'),
(21, 3, 2, 'update', 'apapap', 'apapap edit oleh admin', '2025-06-15 16:30:25', '2025-06-15 09:30:25', '2025-06-15 09:30:25'),
(22, 205, 2, 'update', 'bales apap dari admin', 'bales apap dari admin\nedit oleh admin', '2025-06-15 16:30:44', '2025-06-15 09:30:44', '2025-06-15 09:30:44'),
(23, 96, 3, 'update', 'kome', 'kome', '2025-06-15 16:58:43', '2025-06-15 09:58:43', '2025-06-15 09:58:43'),
(24, 3, 3, 'update', 'apapap edit oleh admin', 'apapap edit oleh admin', '2025-06-15 16:59:09', '2025-06-15 09:59:09', '2025-06-15 09:59:09'),
(25, 214, 3, 'update', 'balasan dari author post ini', 'balasan dari author post ini', '2025-06-15 17:07:45', '2025-06-15 10:07:45', '2025-06-15 10:07:45'),
(26, 96, 2, 'update', 'kome', 'komen', '2025-06-16 02:07:23', '2025-06-15 19:07:23', '2025-06-15 19:07:23'),
(27, 114, 2, 'delete', 'tulislah', NULL, '2025-06-16 02:10:53', '2025-06-15 19:10:53', '2025-06-15 19:10:53'),
(28, 115, 2, 'delete', 'tls komen', NULL, '2025-06-16 02:10:53', '2025-06-15 19:10:53', '2025-06-15 19:10:53'),
(29, 116, 2, 'delete', 'namaku', NULL, '2025-06-16 02:10:53', '2025-06-15 19:10:53', '2025-06-15 19:10:53'),
(30, 117, 2, 'delete', 'namaa', NULL, '2025-06-16 02:10:53', '2025-06-15 19:10:53', '2025-06-15 19:10:53'),
(31, 118, 2, 'delete', 'komen', NULL, '2025-06-16 02:10:53', '2025-06-15 19:10:53', '2025-06-15 19:10:53'),
(32, 119, 2, 'delete', 'komen', NULL, '2025-06-16 02:10:53', '2025-06-15 19:10:53', '2025-06-15 19:10:53'),
(33, 120, 2, 'delete', 'kom', NULL, '2025-06-16 02:10:53', '2025-06-15 19:10:53', '2025-06-15 19:10:53'),
(34, 121, 2, 'delete', 'amaa', NULL, '2025-06-16 02:10:53', '2025-06-15 19:10:53', '2025-06-15 19:10:53'),
(35, 122, 2, 'delete', 'koemn', NULL, '2025-06-16 02:10:53', '2025-06-15 19:10:53', '2025-06-15 19:10:53'),
(36, 123, 2, 'delete', 'koemna', NULL, '2025-06-16 02:10:53', '2025-06-15 19:10:53', '2025-06-15 19:10:53'),
(37, 126, 2, 'delete', 'komen', NULL, '2025-06-16 02:10:53', '2025-06-15 19:10:53', '2025-06-15 19:10:53'),
(38, 127, 2, 'delete', 'komentar saya', NULL, '2025-06-16 02:10:53', '2025-06-15 19:10:53', '2025-06-15 19:10:53'),
(39, 128, 2, 'delete', 'komentar', NULL, '2025-06-16 02:10:53', '2025-06-15 19:10:53', '2025-06-15 19:10:53'),
(40, 129, 2, 'delete', 'komen', NULL, '2025-06-16 02:10:53', '2025-06-15 19:10:53', '2025-06-15 19:10:53'),
(41, 130, 2, 'delete', 'kom', NULL, '2025-06-16 02:10:53', '2025-06-15 19:10:53', '2025-06-15 19:10:53'),
(42, 131, 2, 'delete', 'komentar', NULL, '2025-06-16 02:10:53', '2025-06-15 19:10:53', '2025-06-15 19:10:53'),
(43, 132, 2, 'delete', 'komen', NULL, '2025-06-16 02:10:53', '2025-06-15 19:10:53', '2025-06-15 19:10:53'),
(44, 133, 2, 'delete', 'komentar', NULL, '2025-06-16 02:10:53', '2025-06-15 19:10:53', '2025-06-15 19:10:53'),
(45, 134, 2, 'delete', 'kom', NULL, '2025-06-16 02:10:53', '2025-06-15 19:10:53', '2025-06-15 19:10:53'),
(46, 135, 2, 'delete', 'kom', NULL, '2025-06-16 02:10:53', '2025-06-15 19:10:53', '2025-06-15 19:10:53'),
(47, 136, 2, 'delete', 'kom', NULL, '2025-06-16 02:10:53', '2025-06-15 19:10:53', '2025-06-15 19:10:53'),
(48, 137, 2, 'delete', 'komen', NULL, '2025-06-16 02:10:53', '2025-06-15 19:10:53', '2025-06-15 19:10:53'),
(49, 138, 2, 'delete', 'koml', NULL, '2025-06-16 02:10:53', '2025-06-15 19:10:53', '2025-06-15 19:10:53'),
(50, 217, 2, 'update', 'balasan dari admin', 'balasan dari admin', '2025-06-16 02:11:46', '2025-06-15 19:11:46', '2025-06-15 19:11:46'),
(51, 217, 2, 'delete', 'balasan dari admin', NULL, '2025-06-16 02:12:08', '2025-06-15 19:12:08', '2025-06-15 19:12:08');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday_date` date NOT NULL,
  `position_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `phone_number`, `address`, `birthday_date`, `position_id`, `created_at`, `updated_at`) VALUES
(1, 'Sugeng, S.T', '081212121212', 'Jalan', '1981-02-03', 1, '2025-02-03 23:40:34', '2025-02-03 23:40:34'),
(2, 'Baryono, S.H', '081231231231', 'Jalan aja', '1988-07-06', 2, '2025-02-03 23:41:42', '2025-02-03 23:41:42'),
(3, 'Yuni Setyowati, S.E', '081234123412', 'Jalan kuy', '1977-05-09', 3, '2025-02-03 23:42:28', '2025-02-03 23:42:28'),
(4, 'Endah Susilowati, S.H', '081234512345', 'Jalan jalan', '1979-10-16', 4, '2025-02-03 23:43:10', '2025-02-03 23:43:10');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_01_17_012210_create_categories_table', 2),
(5, '2025_01_17_012221_create_posts_table', 2),
(6, '2025_01_17_012235_create_banners_table', 2),
(7, '2025_01_17_020630_create_banners_table', 3),
(8, '2025_01_17_022618_create_banners_table', 4),
(9, '2025_01_17_024226_create_posts_table', 5),
(10, '2025_01_20_030213_create_permission_tables', 6),
(11, '2025_01_21_012021_create_comments_table', 7),
(12, '2025_01_21_043451_create_posts_table', 8),
(13, '2025_01_21_043500_create_comments_table', 8),
(14, '2025_01_23_044640_create_comments_table', 9),
(15, '2025_01_23_062547_create_comments_table', 10),
(16, '2023_02_24_000000_create_comments_table', 11),
(17, '2023_03_24_000000_create_comment_likes_table', 11),
(18, '2025_01_29_154034_create_comment_audit_logs_table', 12),
(19, '2025_01_29_155707_create_comments_table', 13),
(20, '2025_01_29_155852_create_comment_audit_logs_table', 14),
(21, '2025_01_29_162727_create_comments_table', 15),
(22, '2025_01_29_162932_create_comment_audit_logs_table', 16),
(23, '2025_02_03_071345_create_cabangs_table', 17),
(24, '2025_02_03_073714_create_kantors_table', 17),
(25, '2025_02_03_075013_create_branch_offices_table', 18),
(26, '2025_02_03_075021_create_offices_table', 18),
(27, '2025_02_03_205420_create_offices_table', 19),
(28, '2025_02_03_213210_create_offices_table', 20),
(29, '2025_02_03_213645_create_offices_table', 21),
(30, '2025_02_04_033051_create_positions_table', 22),
(31, '2025_02_04_033100_create_employees_table', 23),
(32, '2025_02_04_054332_create_positions_table', 24),
(33, '2025_02_04_054340_create_employees_table', 24),
(34, '2025_02_05_012227_create_comment_logs_table', 25);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 5);

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `id` bigint UNSIGNED NOT NULL,
  `sub_district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `maps` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_office_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`id`, `sub_district`, `address`, `maps`, `service_number`, `branch_office_id`, `created_at`, `updated_at`) VALUES
(1, 'Purbalingga', 'Jl. Letnan Jenderal S Parman No.62, Kedung Menjangan, Bancar, Kec. Purbalingga, Kabupaten Purbalingga, Jawa Tengah 53316', 'https://goo.gl/maps/vB6q3ZqyJa3y4Xn6A', '(0281) 891706', 1, '2025-02-03 14:55:44', '2025-02-03 14:55:44'),
(2, 'Padamara', 'Jl. Raya Padamara, Padamara, Purbalingga, Kabupaten Purbalingga, Jawa Tengah 53372 (Komplek Kecamatan Padamara)', 'https://goo.gl/maps/k5QazG1BgXEnhR9A6', '(0281) 6598595', 2, '2025-02-03 15:01:43', '2025-02-03 15:01:43'),
(3, 'Kalimanah', 'Jl. Raya Mayjen Sungkono No.108, Selabaya, Kalimanah Wetan, Kec. Kalimanah, Kabupaten Purbalingga, Jawa Tengah 53371', 'https://goo.gl/maps/MS6X1PSs3iQ4MtL46', '(0281) 894039', 2, '2025-02-03 15:02:22', '2025-02-03 15:02:22'),
(4, 'Kaligondang', 'Dusun 1, Kaligondang, Kabupaten Purbalingga, Jawa Tengah 53391', 'https://goo.gl/maps/EN4wksGPHVhY54ai8', '(0281) 6580413', 3, '2025-02-03 15:02:59', '2025-02-03 15:02:59');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view_banner', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(2, 'view_any_banner', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(3, 'create_banner', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(4, 'update_banner', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(5, 'restore_banner', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(6, 'restore_any_banner', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(7, 'replicate_banner', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(8, 'reorder_banner', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(9, 'delete_banner', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(10, 'delete_any_banner', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(11, 'force_delete_banner', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(12, 'force_delete_any_banner', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(13, 'view_category', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(14, 'view_any_category', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(15, 'create_category', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(16, 'update_category', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(17, 'restore_category', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(18, 'restore_any_category', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(19, 'replicate_category', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(20, 'reorder_category', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(21, 'delete_category', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(22, 'delete_any_category', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(23, 'force_delete_category', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(24, 'force_delete_any_category', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(25, 'view_post', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(26, 'view_any_post', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(27, 'create_post', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(28, 'update_post', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(29, 'restore_post', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(30, 'restore_any_post', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(31, 'replicate_post', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(32, 'reorder_post', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(33, 'delete_post', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(34, 'delete_any_post', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(35, 'force_delete_post', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(36, 'force_delete_any_post', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(37, 'view_role', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(38, 'view_any_role', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(39, 'create_role', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(40, 'update_role', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(41, 'delete_role', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(42, 'delete_any_role', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(43, 'view_user', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(44, 'view_any_user', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(45, 'create_user', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(46, 'update_user', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(47, 'restore_user', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(48, 'restore_any_user', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(49, 'replicate_user', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(50, 'reorder_user', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(51, 'delete_user', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(52, 'delete_any_user', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(53, 'force_delete_user', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(54, 'force_delete_any_user', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(55, 'view_comment', 'web', '2025-01-20 18:36:02', '2025-01-20 18:36:02'),
(56, 'view_any_comment', 'web', '2025-01-20 18:36:02', '2025-01-20 18:36:02'),
(57, 'create_comment', 'web', '2025-01-20 18:36:02', '2025-01-20 18:36:02'),
(58, 'update_comment', 'web', '2025-01-20 18:36:02', '2025-01-20 18:36:02'),
(59, 'restore_comment', 'web', '2025-01-20 18:36:02', '2025-01-20 18:36:02'),
(60, 'restore_any_comment', 'web', '2025-01-20 18:36:02', '2025-01-20 18:36:02'),
(61, 'replicate_comment', 'web', '2025-01-20 18:36:02', '2025-01-20 18:36:02'),
(62, 'reorder_comment', 'web', '2025-01-20 18:36:02', '2025-01-20 18:36:02'),
(63, 'delete_comment', 'web', '2025-01-20 18:36:02', '2025-01-20 18:36:02'),
(64, 'delete_any_comment', 'web', '2025-01-20 18:36:02', '2025-01-20 18:36:02'),
(65, 'force_delete_comment', 'web', '2025-01-20 18:36:02', '2025-01-20 18:36:02'),
(66, 'force_delete_any_comment', 'web', '2025-01-20 18:36:02', '2025-01-20 18:36:02'),
(67, 'view_branch::office', 'web', '2025-02-04 17:36:21', '2025-02-04 17:36:21'),
(68, 'view_any_branch::office', 'web', '2025-02-04 17:36:21', '2025-02-04 17:36:21'),
(69, 'create_branch::office', 'web', '2025-02-04 17:36:21', '2025-02-04 17:36:21'),
(70, 'update_branch::office', 'web', '2025-02-04 17:36:21', '2025-02-04 17:36:21'),
(71, 'restore_branch::office', 'web', '2025-02-04 17:36:21', '2025-02-04 17:36:21'),
(72, 'restore_any_branch::office', 'web', '2025-02-04 17:36:21', '2025-02-04 17:36:21'),
(73, 'replicate_branch::office', 'web', '2025-02-04 17:36:21', '2025-02-04 17:36:21'),
(74, 'reorder_branch::office', 'web', '2025-02-04 17:36:21', '2025-02-04 17:36:21'),
(75, 'delete_branch::office', 'web', '2025-02-04 17:36:21', '2025-02-04 17:36:21'),
(76, 'delete_any_branch::office', 'web', '2025-02-04 17:36:21', '2025-02-04 17:36:21'),
(77, 'force_delete_branch::office', 'web', '2025-02-04 17:36:21', '2025-02-04 17:36:21'),
(78, 'force_delete_any_branch::office', 'web', '2025-02-04 17:36:21', '2025-02-04 17:36:21'),
(79, 'view_employee', 'web', '2025-02-04 17:36:21', '2025-02-04 17:36:21'),
(80, 'view_any_employee', 'web', '2025-02-04 17:36:21', '2025-02-04 17:36:21'),
(81, 'create_employee', 'web', '2025-02-04 17:36:21', '2025-02-04 17:36:21'),
(82, 'update_employee', 'web', '2025-02-04 17:36:21', '2025-02-04 17:36:21'),
(83, 'restore_employee', 'web', '2025-02-04 17:36:21', '2025-02-04 17:36:21'),
(84, 'restore_any_employee', 'web', '2025-02-04 17:36:21', '2025-02-04 17:36:21'),
(85, 'replicate_employee', 'web', '2025-02-04 17:36:21', '2025-02-04 17:36:21'),
(86, 'reorder_employee', 'web', '2025-02-04 17:36:21', '2025-02-04 17:36:21'),
(87, 'delete_employee', 'web', '2025-02-04 17:36:21', '2025-02-04 17:36:21'),
(88, 'delete_any_employee', 'web', '2025-02-04 17:36:21', '2025-02-04 17:36:21'),
(89, 'force_delete_employee', 'web', '2025-02-04 17:36:21', '2025-02-04 17:36:21'),
(90, 'force_delete_any_employee', 'web', '2025-02-04 17:36:21', '2025-02-04 17:36:21'),
(91, 'view_office', 'web', '2025-02-04 17:36:21', '2025-02-04 17:36:21'),
(92, 'view_any_office', 'web', '2025-02-04 17:36:21', '2025-02-04 17:36:21'),
(93, 'create_office', 'web', '2025-02-04 17:36:21', '2025-02-04 17:36:21'),
(94, 'update_office', 'web', '2025-02-04 17:36:21', '2025-02-04 17:36:21'),
(95, 'restore_office', 'web', '2025-02-04 17:36:22', '2025-02-04 17:36:22'),
(96, 'restore_any_office', 'web', '2025-02-04 17:36:22', '2025-02-04 17:36:22'),
(97, 'replicate_office', 'web', '2025-02-04 17:36:22', '2025-02-04 17:36:22'),
(98, 'reorder_office', 'web', '2025-02-04 17:36:22', '2025-02-04 17:36:22'),
(99, 'delete_office', 'web', '2025-02-04 17:36:22', '2025-02-04 17:36:22'),
(100, 'delete_any_office', 'web', '2025-02-04 17:36:22', '2025-02-04 17:36:22'),
(101, 'force_delete_office', 'web', '2025-02-04 17:36:22', '2025-02-04 17:36:22'),
(102, 'force_delete_any_office', 'web', '2025-02-04 17:36:22', '2025-02-04 17:36:22'),
(103, 'view_position', 'web', '2025-02-04 17:36:22', '2025-02-04 17:36:22'),
(104, 'view_any_position', 'web', '2025-02-04 17:36:22', '2025-02-04 17:36:22'),
(105, 'create_position', 'web', '2025-02-04 17:36:22', '2025-02-04 17:36:22'),
(106, 'update_position', 'web', '2025-02-04 17:36:22', '2025-02-04 17:36:22'),
(107, 'restore_position', 'web', '2025-02-04 17:36:22', '2025-02-04 17:36:22'),
(108, 'restore_any_position', 'web', '2025-02-04 17:36:22', '2025-02-04 17:36:22'),
(109, 'replicate_position', 'web', '2025-02-04 17:36:22', '2025-02-04 17:36:22'),
(110, 'reorder_position', 'web', '2025-02-04 17:36:22', '2025-02-04 17:36:22'),
(111, 'delete_position', 'web', '2025-02-04 17:36:22', '2025-02-04 17:36:22'),
(112, 'delete_any_position', 'web', '2025-02-04 17:36:22', '2025-02-04 17:36:22'),
(113, 'force_delete_position', 'web', '2025-02-04 17:36:22', '2025-02-04 17:36:22'),
(114, 'force_delete_any_position', 'web', '2025-02-04 17:36:22', '2025-02-04 17:36:22'),
(115, 'view_comment::audit::log', 'web', '2025-02-04 17:40:53', '2025-02-04 17:40:53'),
(116, 'view_any_comment::audit::log', 'web', '2025-02-04 17:40:53', '2025-02-04 17:40:53'),
(117, 'create_comment::audit::log', 'web', '2025-02-04 17:40:53', '2025-02-04 17:40:53'),
(118, 'update_comment::audit::log', 'web', '2025-02-04 17:40:53', '2025-02-04 17:40:53'),
(119, 'restore_comment::audit::log', 'web', '2025-02-04 17:40:53', '2025-02-04 17:40:53'),
(120, 'restore_any_comment::audit::log', 'web', '2025-02-04 17:40:53', '2025-02-04 17:40:53'),
(121, 'replicate_comment::audit::log', 'web', '2025-02-04 17:40:53', '2025-02-04 17:40:53'),
(122, 'reorder_comment::audit::log', 'web', '2025-02-04 17:40:53', '2025-02-04 17:40:53'),
(123, 'delete_comment::audit::log', 'web', '2025-02-04 17:40:53', '2025-02-04 17:40:53'),
(124, 'delete_any_comment::audit::log', 'web', '2025-02-04 17:40:53', '2025-02-04 17:40:53'),
(125, 'force_delete_comment::audit::log', 'web', '2025-02-04 17:40:53', '2025-02-04 17:40:53'),
(126, 'force_delete_any_comment::audit::log', 'web', '2025-02-04 17:40:53', '2025-02-04 17:40:53');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Direktur Utama', 1, '2025-02-03 22:47:51', '2025-02-03 23:02:30'),
(2, 'Direktur Umum', 2, '2025-02-03 22:48:04', '2025-02-03 23:02:30'),
(3, 'Kepala Bagian Keuangan', 3, '2025-02-03 22:48:29', '2025-02-03 23:02:30'),
(4, 'Kepala Bagian Umum', 4, '2025-02-03 22:48:52', '2025-02-03 23:02:30'),
(5, 'Kepala Bagian Teknik', 6, '2025-02-03 22:49:44', '2025-02-03 23:02:30'),
(6, 'Kepala Sub Bagian Kerumah Tanggaan', 5, '2025-02-04 00:49:08', '2025-02-04 00:49:08');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_at` datetime NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT '0',
  `comments_enabled` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `body`, `published_at`, `user_id`, `category_id`, `image`, `active`, `comments_enabled`, `created_at`, `updated_at`) VALUES
(2, 'PROMO “GEBYAR MERDEKA!”. PEMASANGAN SAMBUNGAN BARU 2024', 'promo-gebyar-merdeka-pemasangan-sambungan-baru-2024', 'Dalam rangka menyambut HUT Republik Indonesia ke 79, Perumda Air Minum Tirta Perwira Kabupaten Purbalingga hadir dengan promo spesial yang tak boleh Anda lewatkan. Cek syarat dan ketentuan di kantor kami atau menghubungi kontak yang tertera.', '2025-01-21 14:49:34', 2, 1, '01JJ3XE2SVY6HJKDFYF74TFX05.jpeg', 0, 1, '2025-01-21 00:50:04', '2025-06-15 21:13:54'),
(3, 'Pengumuman resmi penerimaan karyawan Perumda Air Minum Tirta Perwira Kabupaten Purbalingga Tahun 2022', 'pengumuman-resmi-penerimaan-karyawan-perumda-air-minum-tirta-perwira-kabupaten-purbalingga-tahun-2022', 'Pengumuman resmi penerimaan karyawan Perumda Air Minum Tirta Perwira Kabupaten Purbalingga Tahun 2022', '2024-12-31 11:33:37', 2, 3, 'posts/pengumuman-resmi-penerimaan-karyawan-perumda-air-minum-tirta-perwira-kabupaten-purbalingga-tahun-2022.jpeg', 1, 0, '2025-01-21 21:33:56', '2025-02-02 19:57:36'),
(4, 'Pelantikan Direktur Utama dan Direktur Umum Perumda Air Minum Tirta Perwira Kabupaten Purbalingga', 'pelantikan-direktur-utama-dan-direktur-umum-perumda-air-minum-tirta-perwira-kabupaten-purbalingga', 'Bupati Purbalingga  Dyah Hayuning Pratiwi, S.E, B.Econ, M.M pada Kamis (30/6) bertempat di Ruang Ardilawet melantik Direktur Utama dan Direktur Umum Perumda Air Minum Tirta Perwira Kabupaten Purbalingga dengan Direktur Utama yang dijabat oleh Sugeng, S.T dan Direktur Umum yang dijabat oleh Baryono, S.H untuk masa jabatan 2022 – 2027. Bupati Dyah Hayuning Pratiwi, S.E, B.Econ, M.M melalui acara pelantikan dan pengambilan sumpah jabatan berpesan “Kalau kemarin hanya satu direksi, saat ini saya melantik dua direksi, tentunya ke depan segala target-target kinerjanya harus lebih maksimal. Jadi Pak Sugeng, Pak Baryono, saya ini tidak bisa terima kalau ke depan PDAM kinerjanya standar-standar saja seperti tahun-tahun belakangan. Jadi penambahan direksi ini diharapkan dapat mendorong produktivitas kinerja perusahaan ini lebih maksimal.”', '2022-06-30 02:26:15', 3, 1, 'posts/pelantikan-direktur-utama-dan-direktur-umum-perumda-air-minum-tirta-perwira-kabupaten-purbalingga.jpeg', 1, 1, '2025-02-02 12:29:19', '2025-06-17 19:32:16'),
(5, 'Arahan Dari Kepala Bagian Perekonomian Kabupaten Purbalingga', 'arahan-dari-kepala-bagian-perekonomian-kabupaten-purbalingga', 'Senin (24/02) Apel pagi dipimpin oleh Bapak Ir.Herawan Setiyadi Kepala Bagian Perekonomian Kabupaten Purbalingga. Dalam Apel tersebut beliau mengharapankan peningkatan pelayanan yang lebih maksimal kepada pelanggan Perumdam Tirta Perwira Kabupaten Purbalingga. Dengan pelayanan yang lebih, diharapkan dapat meningkatkan kepuasan pelanggan yang berdampak pada peningkatan pendapatan, yang nantinya berdampak pula pada PAD untuk Kabupaten Purbalingga. Serta, Perumadam Tirta Periwa untuk aktif dalam pelayanan sosial sebagai contoh pada kejadian Kebakaran Ruko yang berlokasi di Bobotsari pada Jum’at (21/2) kemarin.', '2020-02-24 23:33:47', 3, 1, 'posts/arahan-dari-kepala-bagian-perekonomian-kabupaten-purbalingga.jpeg', 1, 1, '2025-06-15 09:34:41', '2025-06-17 19:34:08'),
(6, 'PROMO “GEBYAR MERDEKA!”. PEMASANGAN SAMBUNGAN BARU 2024.', 'promo-gebyar-merdeka-pemasangan-sambungan-baru-2024', 'Dalam rangka menyambut HUT Republik Indonesia ke 79, Perumda Air Minum Tirta Perwira Kabupaten Purbalingga hadir dengan promo spesial yang tak boleh Anda lewatkan. Cek syarat dan ketentuan di kantor kami atau menghubungi kontak yang tertera.', '2024-08-01 09:24:22', 3, 1, 'posts/promo-gebyar-merdeka-pemasangan-sambungan-baru-2024.jpeg', 1, 1, '2025-06-17 19:28:05', '2025-06-17 19:28:05'),
(7, 'PENGUMUMAN REKRUTMEN KARYAWAN PERUMDAM TIRTA PERWIRA KABUPATEN PURBALINGGA 2022', 'pengumuman-rekrutmen-karyawan-perumdam-tirta-perwira-kabupaten-purbalingga-2022', 'Pengumuman resmi penerimaan karyawan Perumda Air Minum Tirta Perwira Kabupaten Purbalingga Tahun 2022.', '2024-10-22 09:29:30', 3, 1, 'posts/pengumuman-rekrutmen-karyawan-perumdam-tirta-perwira-kabupaten-purbalingga-2022.jpeg', 1, 1, '2025-06-17 19:30:17', '2025-06-17 19:30:17'),
(8, 'Penyambutan Serta Perkenalan Direktur Utama dan Direktur Umum Perumda Air Minum Tirta Perwira Kab. Purbalingga.', 'penyambutan-serta-perkenalan-direktur-utama-dan-direktur-umum-perumda-air-minum-tirta-perwira-kab-purbalingga', 'Setelah Bupati Dyah Hayuning Pratiwi, S.E, B.E.Con, M.M melantik Direktur Utama dan Direktur Umum Perumda Air Minum Tirta Perwira pada Kamis (30/6). Perumda Air Minum Tirta Perwira melakukan acara penyambutan serta perkenalan Direktur Utama dan Direktur Umum terlantik pada Senin (4/7) di halaman parkir karyawan Perumda Airm Minum Tirta Perwira. Dimana Direktur Utama dijabat oleh Bapak Sugeng, S.T serta Bapak Baryono, S.H selaku Direktur Umum. Acara ramahtamah dihadiri oleh seluruh karyawan dan karyawati Perumda Air Minum Tirta Perwira baik pejabat struktural dan fungsional serta dihadiri juga oleh Badan Pengawas.', '2022-07-04 09:30:38', 3, 1, 'posts/penyambutan-serta-perkenalan-direktur-utama-dan-direktur-umum-perumda-air-minum-tirta-perwira-kab-purbalingga.jpg', 1, 0, '2025-06-17 19:31:22', '2025-06-17 19:31:22'),
(9, 'Pengiriman Air Bersih Terus Dilakukan.', 'pengiriman-air-bersih-terus-dilakukan', 'Beberapa wilayah di Kabupaten Purbalingga mengalami kesulitan air bersih dampak dari musim kemarau yang panjang. Hal ini mengakibatkan beberapa sumur dan sumber mata air yang biasa masyarakat gunakan mengambil air untuk memenuhi kebutuhannya mengalami surut. Pemerintah daerah sejak () telah berupaya untuk melakukan pendistribusian air kesejumlah titik yang mengalami kekeringan. Tugas pengiriman tersebut dikerjakan oleh BPDB Kabupaten Purbalingga yang berkerja sama dengan PDAM Kabupaten Purbalingga untuk mendistribusikan air berseih tersebut. Pengiriman dilakukan terus menerus agar kebutuhan masyarakat terhadap kebutuhan air bersih terpenuhi.', '2019-10-06 09:34:39', 3, 1, 'posts/pengiriman-air-bersih-terus-dilakukan.jpeg', 1, 1, '2025-06-17 19:35:54', '2025-06-17 19:35:54'),
(10, 'PDAM Purbalingga Menyelenggarakan Sholat Meminta Hujan', 'pdam-purbalingga-menyelenggarakan-sholat-meminta-hujan', 'PDAM Kabupaten Purbalingga menyelenggarakan Sholat Istiqa untuk meminta hujan segera turun. Sholat Istisqa dilaksanakan pada Senin (30/9) di halaman PDAM Kabupaten Purbalingga. Musim hujan yang tidak kunjung turun berdampak pada pendistribusian air bersih kepada pelanggan PDAM Kabupaten Purbalingga. Pasalnya ketersediaan air bersih yang berada di Sumber Mata Air yang di kelola oleh PDAM Kabaputen Purbalingga mengalami penurunan kapasitas produksi. Sehingga distribusi air bersih dibeberapa wilayah pelayanan mengalami beberapa kendala. Selain upaya untuk memeratakan distribusi air agar distribusi kepada pelanggan membaik, upaya lainnya juga dilakukan, salah satunya meminta kepada Yang Maha Kuasa dengan menyelenggarakan Sholat Istisqa tersebut. PDAM Kabupaten berharap dengan diselenggarakannya Solat Istisqa ini semoga sebagian upaya yang dilakukan akan mempercepat musim penghujan agar segera datang. Serta meminta maaf kepada pelanggan PDAM Kabupaten Purbalingga apabila pelayanan pada saat musim kemarau ini sedikit mengalami kendala teknis maupun non teknis. PDAM Kabupaten Purbalingga akan terus berupaya untuk menangani segala informasi gangguan untuk segera ditangani.', '2019-10-01 09:36:16', 3, 1, 'posts/pdam-purbalingga-menyelenggarakan-sholat-meminta-hujan.jpeg', 1, 1, '2025-06-17 19:36:47', '2025-06-17 19:36:47');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2025-01-19 20:12:01', '2025-01-19 20:12:01'),
(2, 'Admin', 'web', '2025-01-19 20:13:37', '2025-01-19 20:13:37'),
(3, 'Content Creator', 'web', '2025-01-19 20:14:36', '2025-01-19 20:14:36');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(108, 1),
(109, 1),
(110, 1),
(111, 1),
(112, 1),
(113, 1),
(114, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(55, 2),
(56, 2),
(57, 2),
(58, 2),
(59, 2),
(60, 2),
(61, 2),
(62, 2),
(63, 2),
(64, 2),
(65, 2),
(66, 2),
(67, 2),
(68, 2),
(69, 2),
(70, 2),
(71, 2),
(72, 2),
(73, 2),
(74, 2),
(75, 2),
(76, 2),
(77, 2),
(78, 2),
(91, 2),
(92, 2),
(93, 2),
(94, 2),
(95, 2),
(96, 2),
(97, 2),
(98, 2),
(99, 2),
(100, 2),
(101, 2),
(102, 2),
(115, 2),
(116, 2),
(117, 2),
(118, 2),
(119, 2),
(120, 2),
(121, 2),
(122, 2),
(123, 2),
(124, 2),
(125, 2),
(126, 2),
(13, 3),
(14, 3),
(25, 3),
(26, 3),
(27, 3),
(28, 3),
(29, 3),
(30, 3),
(31, 3),
(32, 3),
(33, 3),
(34, 3),
(35, 3),
(36, 3),
(55, 3),
(56, 3),
(57, 3),
(58, 3),
(59, 3),
(60, 3),
(61, 3),
(62, 3),
(63, 3),
(64, 3),
(65, 3),
(66, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('hncWvNo75gzoXFbostU9C6EaR75RmNMxf5hmh8ZO', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiSkdiNkRva1ZqUnZtM0NyM1JHbWhEalBnaklIRmxIcHdsV1BCR2wxRiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9wb3N0cy8xMCI7fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTIkRnJCNTBBTG5LRmVQaHo1ZnlMb1FOdXd3TjNUSmNoRTJCMFZORnNVb3lJbXZwTWtyUGhwdWEiO3M6ODoiZmlsYW1lbnQiO2E6MDp7fX0=', 1750214219);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Adminn', 'superadmin@gmail.com', NULL, '$2y$12$Q7PPQN1VREDpPVqVxq42bOvUZq8TiRG5kmzrR15A3stXv4g65Bo2W', 'I07rUuzAYTgHy8ZQtVYIYjpFE2AMSuj7OhQFrRkafubUjphFtt3XWnNwplw3', '2025-01-16 18:20:57', '2025-01-16 20:45:53'),
(2, 'Admin PDAM', 'admin@gmail.com', NULL, '$2y$12$iT/Qi9tv.YvZ4.XcIeHfEuoLy2UdBlsoRenJsDhcu.9DclvXqqv4q', NULL, '2025-01-19 20:15:11', '2025-06-10 12:07:06'),
(3, 'Humas', 'humas@gmail.com', NULL, '$2y$12$FrB50ALnKFePhz5fyLoQNuwwN3TJchE2B0VNFsUoyImvpMkrPhpua', NULL, '2025-01-19 20:15:50', '2025-01-19 20:15:50'),
(4, 'Humas PDAM', 'humaspdam@gmail.com', NULL, '$2y$12$8Yvm9jOlP/NzS0DgRbI1cOaqCpMW6WOFfGV5EiPMvP3nW0IWD7IZa', NULL, '2025-01-20 19:45:24', '2025-01-20 19:45:24'),
(5, 'Mia', 'mia@gmail.com', NULL, '$2y$12$eOKGNk5XIHUD9VhqIfdwkOQsxyrIQKeS8Vq5VFQLThF9BZOSDMTcC', NULL, '2025-06-15 19:19:39', '2025-06-15 19:19:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch_offices`
--
ALTER TABLE `branch_offices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`),
  ADD KEY `comments_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `comment_logs`
--
ALTER TABLE `comment_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_position_id_foreign` (`position_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offices_branch_office_id_foreign` (`branch_office_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `branch_offices`
--
ALTER TABLE `branch_offices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- AUTO_INCREMENT for table `comment_logs`
--
ALTER TABLE `comment_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `comments` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `offices`
--
ALTER TABLE `offices`
  ADD CONSTRAINT `offices_branch_office_id_foreign` FOREIGN KEY (`branch_office_id`) REFERENCES `branch_offices` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
