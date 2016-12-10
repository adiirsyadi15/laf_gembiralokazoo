-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10 Des 2016 pada 13.12
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lostandfound_glz`
--

DELIMITER $$
--
-- Fungsi
--
CREATE DEFINER=`root`@`localhost` FUNCTION `KODEOTOMATISADMIN`(`nomer` INT) RETURNS char(3) CHARSET latin1
BEGIN
DECLARE kodebaru CHAR(3);
DECLARE urut INT;
 
SET urut = IF(nomer IS NULL, 1, nomer + 1);
SET kodebaru = CONCAT("A", LPAD(urut, 2, 0));
 
RETURN kodebaru;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `KODEOTOMATISBARANG`(`nomer` INT) RETURNS char(5) CHARSET latin1
BEGIN
DECLARE kodebaru CHAR(5);
DECLARE urut INT;
 
SET urut = IF(nomer IS NULL, 1, nomer + 1);
SET kodebaru = CONCAT("B", LPAD(urut, 4, 0));
 
RETURN kodebaru;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `KODEOTOMATISKEHILANGAN`(`nomer` INT) RETURNS char(5) CHARSET latin1
BEGIN
DECLARE kodebaru CHAR(5);
DECLARE urut INT;
 
SET urut = IF(nomer IS NULL, 1, nomer + 1);
SET kodebaru = CONCAT("KH", LPAD(urut, 3, 0));
 
RETURN kodebaru;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `KODEOTOMATISPEMILIK`(`nomer` INT) RETURNS char(5) CHARSET latin1
BEGIN
DECLARE kodebaru CHAR(5);
DECLARE urut INT;
 
SET urut = IF(nomer IS NULL, 1, nomer + 1);
SET kodebaru = CONCAT("O", LPAD(urut, 4, 0));
 
RETURN kodebaru;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `KODEOTOMATISPENEMUAN`(`nomer` INT) RETURNS char(5) CHARSET latin1
BEGIN
DECLARE kodebaru CHAR(5);
DECLARE urut INT;
 
SET urut = IF(nomer IS NULL, 1, nomer + 1);
SET kodebaru = CONCAT("PN", LPAD(urut, 3, 0));
 
RETURN kodebaru;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `KODEOTOMATISPETUGAS`(`nomer` INT) RETURNS char(3) CHARSET latin1
BEGIN
DECLARE kodebaru CHAR(3);
DECLARE urut INT;
 
SET urut = IF(nomer IS NULL, 1, nomer + 1);
SET kodebaru = CONCAT("P", LPAD(urut, 2, 0));
 
RETURN kodebaru;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `KODEOTOMATISPROSES`(`nomer` INT) RETURNS char(7) CHARSET latin1
BEGIN
DECLARE kodebaru CHAR(7);
DECLARE urut INT;
 
SET urut = IF(nomer IS NULL, 1, nomer + 1);
SET kodebaru = CONCAT("LAF", LPAD(urut, 4, 0));
 
RETURN kodebaru;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id_admin` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_hp` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto_profile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id_admin`, `username`, `nama`, `alamat`, `no_hp`, `foto_profile`, `created_at`, `updated_at`) VALUES
('A01', 'admin', 'Mukhlis Adi Irsyadi', 'Derepan RT08 Rw 04 Menoreh salaman, Magelang', '085601846636', 'user.png', '2016-11-15 04:29:00', NULL);

--
-- Trigger `admins`
--
DELIMITER $$
CREATE TRIGGER `kodeotomatisadmintrigger` BEFORE INSERT ON `admins`
 FOR EACH ROW BEGIN
DECLARE s VARCHAR(3);
DECLARE i INTEGER;
 
SET i = (SELECT SUBSTRING(id_admin,2,2) AS Nomer
FROM admins ORDER BY Nomer DESC LIMIT 1);
 
SET s = (SELECT KODEOTOMATISADMIN(i));
 
IF(NEW.id_admin IS NULL OR NEW.id_admin = '')
 THEN SET NEW.id_admin =s;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangs`
--

CREATE TABLE IF NOT EXISTS `barangs` (
  `id_barang` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `id_kategori` int(10) unsigned NOT NULL,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ciri_ciri` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `barangs`
--

INSERT INTO `barangs` (`id_barang`, `id_kategori`, `nama`, `ciri_ciri`, `created_at`, `updated_at`) VALUES
('B0001', 1, 'Xiomi redmi 3', 'warna hitam ada temperate glass', '2016-11-22 05:30:15', NULL),
('B0002', 4, 'Planet Ocean', 'Planet ocean berisi uang 50rb.warna hitam', NULL, NULL),
('B0003', 1, 'iphone 5 ', 'warna putih', '2016-11-15 01:21:23', NULL),
('B0004', 6, 'jam tangan swis arm', 'kam tangan warna hitam ada palet putih', '2016-11-30 18:29:27', '2016-11-30 18:29:27'),
('B0005', 6, 'Kalung emas', 'kalung 5 gram', '2016-11-30 18:30:57', '2016-11-30 18:30:57'),
('B0006', 1, 'xperia z1', 'ada stiker di belakang hp', '2016-12-05 19:23:10', '2016-12-05 19:23:10'),
('B0007', 7, 'sepatu nike', 'sepatu nike warna hitam', '2016-12-05 19:48:24', '2016-12-05 19:48:24'),
('B0008', 6, 'sandal eriger', 'sandal gunung berserampat', '2016-12-05 19:52:19', '2016-12-05 19:52:19'),
('B0009', 6, 'casio ae 200', 'warna silver hitam', '2016-12-05 20:06:02', '2016-12-05 20:06:02'),
('B0010', 3, 'tas ransel ', 'tas ransel warna ungu', '2016-12-05 23:36:54', '2016-12-05 23:36:54');

--
-- Trigger `barangs`
--
DELIMITER $$
CREATE TRIGGER `kodeotomatisbarangtrigger` BEFORE INSERT ON `barangs`
 FOR EACH ROW BEGIN
DECLARE s VARCHAR(5);
DECLARE i INTEGER;
 
SET i = (SELECT SUBSTRING(id_barang,2,4) AS Nomer
FROM barangs ORDER BY Nomer DESC LIMIT 1);
 
SET s = (SELECT KODEOTOMATISBARANG(i));
 
IF(NEW.id_barang IS NULL OR NEW.id_barang = '')
 THEN SET NEW.id_barang =s;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fotos`
--

CREATE TABLE IF NOT EXISTS `fotos` (
  `id_foto` int(10) unsigned NOT NULL,
  `id_barang` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `fotos`
--

INSERT INTO `fotos` (`id_foto`, `id_barang`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'B0001', 'barang.png', NULL, NULL),
(2, 'B0002', 'dompet_2016-12-06-02-23-10_3.jpg', NULL, NULL),
(3, 'B0003', 'hp.jpg\r\n', NULL, NULL),
(4, 'B0004', 'jam_2016-12-06-02-23-10_3.jpg', '2016-11-30 18:29:27', '2016-11-30 18:29:27'),
(6, 'B0005', 'barang.png', NULL, NULL),
(8, 'B0006', 'xperia_2016-12-06-02-23-10_3.jpg', '2016-12-05 19:23:10', '2016-12-05 19:23:10'),
(9, 'B0007', '6_2016-12-06-02-48-24_nike.jpg', '2016-12-05 19:48:24', '2016-12-05 19:48:24'),
(10, 'B0008', '6_2016-12-06-02-52-19_sandal.jpg', '2016-12-05 19:52:19', '2016-12-05 19:52:19'),
(11, 'B0009', '6_2016-12-06-03-06-02_casio.jpg', '2016-12-05 20:06:02', '2016-12-05 20:06:02'),
(12, 'B0010', '3_2016-12-06-06-36-54_tas.jpg', '2016-12-05 23:36:54', '2016-12-05 23:36:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `identitas`
--

CREATE TABLE IF NOT EXISTS `identitas` (
  `id_identitas` int(10) unsigned NOT NULL,
  `id_pemilik` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_identitas` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nomor_identitas` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `identitas`
--

INSERT INTO `identitas` (`id_identitas`, `id_pemilik`, `jenis_identitas`, `nomor_identitas`, `gambar`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'O0001', 'ktp', '213414124141', 'ktp_123.jpg', '', '2016-11-14 17:00:00', '2016-11-29 02:43:03'),
(2, 'O0001', 'sim', '1254881345612', 'sim_123.jpg', NULL, '2016-11-14 23:15:21', '2016-12-01 01:37:44'),
(3, 'O0002', 'SIM', '14323264612354', 'ktp_1234.jpg', NULL, '2016-11-14 17:00:00', NULL),
(4, 'O0002', 'STNK', '1806772', 'sim_1234.jpg', NULL, '2016-11-14 17:00:00', NULL),
(6, 'O0007', 'ktp', '123123', 'ktp_1234.jpg', NULL, '2016-11-23 21:29:39', '2016-11-24 07:57:43'),
(10, 'O0007', 'stnk', '87851121654964', 'stnk_2016-11-24-15-00-01_O0007_stnkkk.jpg', NULL, '2016-11-24 07:59:25', '2016-11-24 08:00:01'),
(13, 'O0005', 'ktp', '1123745345', 'ktp_2016-11-28_O0005_KKTP.jpg', NULL, '2016-11-28 01:22:40', '2016-11-28 01:22:40'),
(14, 'O0005', 'sim', '12311', 'sim_2016-11-28_O0005_SSIM.jpg', NULL, '2016-11-28 01:22:40', '2016-11-28 01:22:40'),
(17, 'O0009', 'ktp', '1123745345', 'ktp_2016-12-06_O0009_KKTP.jpg', NULL, '2016-12-05 19:21:10', '2016-12-05 19:21:10'),
(18, 'O0009', 'sim', '874512154', 'sim_2016-12-06_O0009_SSIM.jpg', NULL, '2016-12-05 19:21:10', '2016-12-05 19:21:10'),
(19, 'O0010', 'ktp', '87455443221', 'ktp_2016-12-06_O0010_ktp1.jpeg', NULL, '2016-12-05 19:45:11', '2016-12-05 19:45:11'),
(20, 'O0010', 'sim', '02114422', 'sim_2016-12-06_O0010_sim.jpg', NULL, '2016-12-05 19:45:11', '2016-12-05 19:45:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE IF NOT EXISTS `kategoris` (
  `id_kategori` int(10) unsigned NOT NULL,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id_kategori`, `nama`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Handphone', NULL, '2016-10-10 03:14:14', NULL),
(2, 'Leptop', NULL, '2016-10-10 03:14:14', NULL),
(3, 'Tas', NULL, '2016-10-10 03:14:14', NULL),
(4, 'Dompet', NULL, '2016-10-10 03:14:14', NULL),
(5, 'Perhiasan', NULL, '2016-10-10 03:14:14', NULL),
(6, 'Aksesoris', NULL, '2016-10-10 03:14:14', NULL),
(7, 'Sepatu', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kehilangans`
--

CREATE TABLE IF NOT EXISTS `kehilangans` (
  `id_kehilangan` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `id_barang` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `id_proses` char(7) COLLATE utf8_unicode_ci NOT NULL,
  `status_kehilangan` enum('hilang','ditemukan') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `kehilangans`
--

INSERT INTO `kehilangans` (`id_kehilangan`, `id_barang`, `id_proses`, `status_kehilangan`, `created_at`, `updated_at`) VALUES
('KH001', 'B0001', 'LAF0001', 'ditemukan', NULL, NULL),
('KH002', 'B0002', 'LAF0001', 'ditemukan', NULL, NULL),
('KH003', 'B0003', 'LAF0003', 'hilang', '2016-11-14 19:11:16', NULL),
('KH004', 'B0004', 'LAF0002', 'hilang', '2016-11-30 18:29:27', '2016-11-30 18:29:27'),
('KH005', 'B0005', 'LAF0002', 'hilang', NULL, NULL),
('KH006', 'B0006', 'LAF0005', 'hilang', '2016-12-05 19:23:11', '2016-12-05 19:23:11'),
('KH007', 'B0007', 'LAF0006', 'hilang', '2016-12-05 19:48:24', '2016-12-05 19:48:24'),
('KH008', 'B0008', 'LAF0006', 'hilang', '2016-12-05 19:52:19', '2016-12-05 19:52:19'),
('KH009', 'B0009', 'LAF0005', 'hilang', '2016-12-05 20:06:02', '2016-12-05 20:06:02'),
('KH010', 'B0010', 'LAF0007', 'hilang', '2016-12-05 23:36:54', '2016-12-05 23:36:54');

--
-- Trigger `kehilangans`
--
DELIMITER $$
CREATE TRIGGER `kodeotomatis_kehilangan_trigger` BEFORE INSERT ON `kehilangans`
 FOR EACH ROW BEGIN
DECLARE s VARCHAR(5);
DECLARE i INTEGER;
 
SET i = (SELECT SUBSTRING(id_kehilangan,3,3) AS Nomer
FROM kehilangans ORDER BY Nomer DESC LIMIT 1);
 
SET s = (SELECT KODEOTOMATISKEHILANGAN(i));
 
IF(NEW.id_kehilangan IS NULL OR NEW.id_kehilangan = '')
 THEN SET NEW.id_kehilangan =s;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kejadians`
--

CREATE TABLE IF NOT EXISTS `kejadians` (
  `id_kejadian` int(10) unsigned NOT NULL,
  `hari` enum('senin','selasa','rabu','kamis','jumat','sabtu','minggu') COLLATE utf8_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `lokasi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `kejadians`
--

INSERT INTO `kejadians` (`id_kejadian`, `hari`, `tanggal`, `waktu`, `lokasi`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'sabtu', '2016-11-28', '10.30', 'pintu masuk gembira loka', 'hilang saat antri mau masuk kawasan gembira loka ', '2016-11-14 23:18:23', '2016-12-05 18:20:46'),
(2, 'kamis', '2016-11-18', '10.23', 'tempat pemesanan tiket', 'ditemukan oleh bapak-bapak rambut panjang saat jalan', '2016-11-14 17:00:00', NULL),
(3, 'minggu', '2016-11-20', '08.00', 'dekat kandang jerapah', 'hilang saat jalan', '2016-11-19 17:20:00', NULL),
(4, 'selasa', '2016-11-24', '13.32', 'kandang menjangan', 'tidak sengaja saat jalan', NULL, NULL),
(7, 'kamis', '2016-12-06', '15:06', 'Dekat kandang jerapah', 'hilang saat perjalanan ', '2016-12-05 19:23:10', '2016-12-05 19:23:10'),
(8, 'sabtu', '2016-12-03', '14:00', 'mushola sebelah timur ', 'hilang saat ditinggal solat', '2016-12-05 19:48:24', '2016-12-05 19:48:24'),
(13, 'sabtu', '2016-12-03', '09:30', 'Dekat Mushola timur', 'hilang saat di tinggal beribadah', '2016-12-05 23:36:54', '2016-12-05 23:36:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_09_07_131331_create_admin_table', 1),
('2016_09_07_131332_create_petugas_table', 1),
('2016_09_07_132031_create_pemilik_table', 1),
('2016_09_07_132036_create_identitas_table', 1),
('2016_09_25_151439_create_kategori_table', 1),
('2016_09_25_151757_create_kejadian_table', 1),
('2016_09_25_153325_create_barang_table', 1),
('2016_09_25_155714_create_foto_table', 1),
('2016_09_25_160254_create_proses_table', 1),
('2016_09_25_160318_create_kehilangan_table', 1),
('2016_09_25_160337_create_penemuans_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('roni@gmail.com', '3f086a2fd04cc245a5b69723438dc5aec4017ee218e00364088b55d3bf68a356', '2016-11-17 09:25:00'),
('adi.leptop@gmail.com', '5393fa4bffee8b4cc1a8a58c1feabd630fce05d145016a50ff66a8197179ef13', '2016-11-17 09:35:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemiliks`
--

CREATE TABLE IF NOT EXISTS `pemiliks` (
  `id_pemilik` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pekerjaan` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `agama` enum('islam','katolik','kristen','hindu','budha') COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_hp` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pin_bbm` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `line` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `whatsapp` enum('0','1') COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto_profile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_verifikasi` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `pemiliks`
--

INSERT INTO `pemiliks` (`id_pemilik`, `username`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `pekerjaan`, `agama`, `no_hp`, `pin_bbm`, `line`, `whatsapp`, `foto_profile`, `status_verifikasi`, `created_at`, `updated_at`) VALUES
('O0001', 'pemilik', 'Diah Nur Arini', 'L', 'Magelang', '1996-09-15', 'Brebes timur jogjakarta', 'Mahasiswa', 'islam', '085603215452', 'D284E298', 'nandatok112', '1', 'user.png', '1', '2016-11-15 01:22:00', '2016-12-05 18:49:25'),
('O0002', 'wedhana', 'wedhana puthera', 'L', 'cilacap', '1995-12-11', 'Adipala Cilacap', 'Guru', 'islam', '08566441234', 'aac321ad', '', NULL, 'user.png', '1', NULL, '2016-12-01 04:17:35'),
('O0003', 'Nandahonesty', 'nanda honesty p', 'L', 'brebes', '1996-09-15', 'condong catur depok', 'Mahasiswa', 'islam', '085696333214', 'aabbc21a', '', '1', 'user.png', '0', NULL, '2016-11-25 03:29:07'),
('O0004', 'roni', 'roni', NULL, NULL, NULL, NULL, 'PNS', NULL, NULL, NULL, NULL, NULL, 'user.png', '0', '2016-11-17 08:40:09', '2016-11-17 08:40:09'),
('O0005', 'coba', 'coba', 'L', 'Magelang', '1995-07-15', 'Derepan Rt01. Rw05 menoreh Salaman, Magelang', 'Polisi', 'islam', '085704846636', 'BBC321', 'adi213', NULL, 'user.png', '1', '2016-11-17 09:26:10', '2016-11-29 02:34:45'),
('O0006', 'ulya', 'ulya', 'L', 'Magelang', '2016-11-24', 'Derepan, Menoreh, salaman', 'Tentara', 'islam', '085738821212', '', '', '1', 'pemilik_2016-11-24-16-26-35_ulya_1.jpg', '0', '2016-11-18 18:13:01', '2016-11-25 03:32:36'),
('O0007', 'marcel', 'marcel', 'L', 'Magelang', '1995-11-24', 'Magelang deket RST', 'Dokter', 'islam', '085777498756', 'BBDA12', 'marcelgoki', NULL, 'user.png', '1', '2016-11-23 19:37:34', '2016-11-24 10:56:08'),
('O0008', 'bani', 'Ahmad Sya''bani', 'L', 'Magelang', '1995-12-05', 'ngluwar Muntilan', 'Mahasiswa', 'islam', '085738821212', '', '', '1', 'user.png', '0', '2016-11-28 17:54:10', '2016-11-28 17:57:02'),
('O0009', 'kholil', 'kholil AA', 'L', 'Kudus', '1995-12-06', 'Kudus, Jawa tengah', 'Mahasiswa', 'islam', '085743650661', 'aadd321', 'kholil21', '1', 'pemilik_2016-12-06-02-31-05_Screenshot (10).png', '0', '2016-12-05 19:00:14', '2016-12-05 19:31:05'),
('O0010', 'putratok', 'Putra Wahyu', 'L', 'kulon progo', '1998-12-06', 'samigaluh Kulon Progo', 'mahasiswa', 'islam', '085412411547', '', '', '1', 'pemilik_2016-12-06-02-43-10_hutan-pinus-imogiri-1.jpg', '1', '2016-12-05 19:36:25', '2016-12-05 19:45:52');

--
-- Trigger `pemiliks`
--
DELIMITER $$
CREATE TRIGGER `kodeotomatispemiliktrigger` BEFORE INSERT ON `pemiliks`
 FOR EACH ROW BEGIN
DECLARE s VARCHAR(5);
DECLARE i INTEGER;
 
SET i = (SELECT SUBSTRING(id_pemilik,2,4) AS Nomer
FROM pemiliks ORDER BY Nomer DESC LIMIT 1);
 
SET s = (SELECT KODEOTOMATISPEMILIK(i));
 
IF(NEW.id_pemilik IS NULL OR NEW.id_pemilik = '')
 THEN SET NEW.id_pemilik =s;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penemuans`
--

CREATE TABLE IF NOT EXISTS `penemuans` (
  `id_penemuan` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `id_barang` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `id_proses` char(7) COLLATE utf8_unicode_ci NOT NULL,
  `nama_penemu` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tanggal_pengambilan` date DEFAULT NULL,
  `status_pengambilan` enum('diambil','belum diambil') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `penemuans`
--

INSERT INTO `penemuans` (`id_penemuan`, `id_barang`, `id_proses`, `nama_penemu`, `tanggal_pengambilan`, `status_pengambilan`, `created_at`, `updated_at`) VALUES
('PN001', 'B0001', 'LAF0002', 'Joko', '2016-11-15', 'diambil', NULL, NULL),
('PN002', 'B0002', 'LAF0002', 'Joko', '2016-11-15', 'diambil', NULL, NULL),
('PN003', 'B0003', 'LAF0004', 'Abdul aziz', NULL, 'belum diambil', NULL, NULL);

--
-- Trigger `penemuans`
--
DELIMITER $$
CREATE TRIGGER `kodeotomatis_penemuan_trigger` BEFORE INSERT ON `penemuans`
 FOR EACH ROW BEGIN
DECLARE s VARCHAR(5);
DECLARE i INTEGER;
 
SET i = (SELECT SUBSTRING(id_penemuan,3,3) AS Nomer
FROM penemuans ORDER BY Nomer DESC LIMIT 1);
 
SET s = (SELECT KODEOTOMATISPENEMUAN(i));
 
IF(NEW.id_penemuan IS NULL OR NEW.id_penemuan = '')
 THEN SET NEW.id_penemuan =s;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE IF NOT EXISTS `petugas` (
  `id_petugas` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `agama` enum('islam','katolik','kristen','hindu','budha') COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_hp` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto_profile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `agama`, `no_hp`, `foto_profile`, `created_at`, `updated_at`) VALUES
('P01', 'ulya1994', 'ulya izzati rahmah', 'L', 'Magelang', '2016-11-15', 'Manukan Codong catur deppok sleman yogyakarta', 'islam', '085743650661', 'user.png', '2016-11-07 09:25:28', NULL),
('P02', 'aku', 'aku', 'L', 'Sleman', '2016-11-19', 'Derepan Menoreh salaman', 'hindu', '085465714144', 'petugas_2016-11-19-08-58-43_2.jpg', '2016-11-19 01:19:36', '2016-11-19 01:58:43'),
('P03', 'petugas', 'Mukhlis Adi Irsyadi', 'L', 'Magelang', '1995-07-15', 'Derepan Menoreh Salaman Magelang', 'islam', '085601846636', 'user.png', NULL, NULL);

--
-- Trigger `petugas`
--
DELIMITER $$
CREATE TRIGGER `kodeotomatis_petugas_trigger` BEFORE INSERT ON `petugas`
 FOR EACH ROW BEGIN
DECLARE s VARCHAR(3);
DECLARE i INTEGER;
 
SET i = (SELECT SUBSTRING(id_petugas,2,2) AS Nomer
FROM petugas ORDER BY Nomer DESC LIMIT 1);
 
SET s = (SELECT KODEOTOMATISPETUGAS(i));
 
IF(NEW.id_petugas IS NULL OR NEW.id_petugas = '')
 THEN SET NEW.id_petugas =s;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `proses`
--

CREATE TABLE IF NOT EXISTS `proses` (
  `id_proses` char(7) COLLATE utf8_unicode_ci NOT NULL,
  `id_petugas` char(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_pemilik` char(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_kejadian` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `proses`
--

INSERT INTO `proses` (`id_proses`, `id_petugas`, `id_pemilik`, `id_kejadian`, `created_at`, `updated_at`) VALUES
('LAF0001', 'P01', 'O0001', 1, '2016-11-15 01:24:26', NULL),
('LAF0002', 'P01', 'O0001', 2, NULL, NULL),
('LAF0003', 'P01', 'O0002', 3, '2016-11-15 22:18:20', NULL),
('LAF0004', 'P01', NULL, 4, NULL, NULL),
('LAF0005', 'P03', 'O0009', 7, '2016-12-05 19:23:10', '2016-12-05 19:23:10'),
('LAF0006', 'P02', 'O0010', 8, '2016-12-05 19:48:24', '2016-12-05 19:48:24'),
('LAF0007', 'P03', 'O0010', 13, '2016-12-05 23:36:54', '2016-12-05 23:36:54');

--
-- Trigger `proses`
--
DELIMITER $$
CREATE TRIGGER `kodeotomatis_proses_trigger` BEFORE INSERT ON `proses`
 FOR EACH ROW BEGIN
DECLARE s VARCHAR(7);
DECLARE i INTEGER;
 
SET i = (SELECT SUBSTRING(id_proses,4,4) AS Nomer
FROM proses ORDER BY Nomer DESC LIMIT 1);
 
SET s = (SELECT KODEOTOMATISPROSES(i));
 
IF(NEW.id_proses IS NULL OR NEW.id_proses = '')
 THEN SET NEW.id_proses =s;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('admin','pemilik','petugas') COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$o2fqGzqYmNqHbMIl8DjFUOYCMupWsxf1I9cEa5fg.Tku7Uj62SRJe', 'admin', 1, '83zWc8cfGIX91DAR0ec9OaGf18mwFU4F75S8yCQb6KNhd6zIqQbKh97OnmNZ', '2016-11-15 02:27:28', '2016-11-29 02:27:59'),
(2, 'petugas', 'petugas@gmail.com', '$2y$10$hiV4xWdKItSkzs2qS23SM.fuFsrrCItRZhhE1g0X13a40Sqe1kH8.', 'petugas', 1, 'IqkYQhYoTYypZjCLUQ6np4IbVbD4x4wygODMd7i6nNetZkZaO56h14AivcG9', NULL, '2016-12-06 00:34:50'),
(3, 'pemilik', 'pemilik@gmail.com', '$2y$10$mq8WcHkx.8xwjKvrBQJLEO7JsvXasn9PWTb/xezC6A1iIdDXoHH4a', 'pemilik', 1, 'IfSSD6QOzF9aWCt5UVh7CKl9CH8cjQoqbwC6OaxGVqAud6WEaLLJlKSkeNVM', NULL, '2016-12-05 19:26:01'),
(4, 'roni', 'roni@gmail.com', '$2y$10$aopPh/j8yzrliXFHIaCI/eVaMEKlH9z7G0qQ3Alx0CpJ5f5anHsLK', 'pemilik', 1, 'keQAk1jS8Szl458TtDjo9VqXcfNNsAl7wT35MA6evjMaPsoE9yh3p9G0i3Ci', '2016-11-17 08:40:09', '2016-11-17 08:47:12'),
(5, 'coba', 'adi.leptop@gmail.com', '$2y$10$o2fqGzqYmNqHbMIl8DjFUOYCMupWsxf1I9cEa5fg.Tku7Uj62SRJe', 'pemilik', 1, 'lr3c8MYczILNEPPH81Q73dj0gYZGoxuBybUyvn05MwrrQShFl6PcfX6o1GNn', '2016-11-17 09:26:10', '2016-12-05 19:23:59'),
(6, 'ulya', 'ulya@gmail.com', '$2y$10$zcFtiTngENFSTQt/90SmGue9ZXiHzRT/El8jDgUbONXmA6nj7wGsm', 'pemilik', 1, 'kQsAsHKbIMzPgRRx2ZvCgXbWACCq5PsLh7r2KiLHUC3az59Xs7GbU83hLmg6', '2016-11-18 18:13:01', '2016-11-18 18:14:33'),
(11, 'aku', 'aku@gmail.com', '$2y$10$Qz.uPwnqojGbxXu4VLW.DeRVpWytRdxMtKB6RldFxmD/y9HD9uDlq', 'petugas', 1, NULL, '2016-11-19 01:19:36', '2016-11-19 01:19:36'),
(12, 'ulya1994', 'ulya1994@gmail.com', '$2y$10$hiV4xWdKItSkzs2qS23SM.fuFsrrCItRZhhE1g0X13a40Sqe1kH8.', 'petugas', 1, NULL, NULL, NULL),
(13, 'wedhana', 'wedhana@gmail.com', 'qwerty', 'pemilik', 1, NULL, NULL, NULL),
(14, 'Nandahonesty', 'Nandahonesty@gmail.com', 'derepan', 'pemilik', 1, NULL, NULL, NULL),
(15, 'marcel', 'marecel@gmail.com', '$2y$10$G.A8Tk2rzgCPfHzbIF0OT.WQwVPqAqnZpNS.rC1k9ng72KpYiQaKi', 'pemilik', 1, NULL, '2016-11-23 19:37:34', '2016-11-23 19:37:34'),
(17, 'bani', 'bani@gmail.com', '$2y$10$ESaTaJhlw5YUqIr3a4PuFOUrsA70.HUIZCzCahy26byMmBvPygnjG', 'pemilik', 1, 'rY3TEgUaWBNpwQry2RAt5WKUctXbp65WAWO99XcjnllkAFqYfaqBQOSzAk09', '2016-11-28 17:54:10', '2016-11-28 17:57:13'),
(19, 'kholil', 'kholil@gmail.com', '$2y$10$KZrwjziiy1xVDcz3CCVQueJW22eM2e.E3pRbEUjT7nOsUnSCe/bey', 'pemilik', 1, '7Ng7CB0RHDXhyi7LXRe7NZJyMbR7tmB9Z7ZtDxALnSWkmSdphvaqn0XmDGTI', '2016-12-05 19:00:14', '2016-12-05 20:29:30'),
(20, 'putratok', 'putra@gmail.com', '$2y$10$8kDxp/HOkJE8BMsl26IqpOjhL7kXOXL14/7YKIAu6x9z82/.g6U4G', 'pemilik', 1, 'eeXzLGLbKSdc08CEQAfEQQ2uZRMcLpZHpzLgYefrGbbZ18jckSl5WlUOoSt6', '2016-12-05 19:36:25', '2016-12-05 19:55:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `barangs_id_kategori_foreign` (`id_kategori`);

--
-- Indexes for table `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `fotos_id_barang_foreign` (`id_barang`);

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`id_identitas`),
  ADD KEY `identitas_id_pemilik_foreign` (`id_pemilik`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kehilangans`
--
ALTER TABLE `kehilangans`
  ADD PRIMARY KEY (`id_kehilangan`),
  ADD KEY `kehilangans_id_barang_foreign` (`id_barang`),
  ADD KEY `kehilangans_id_proses_foreign` (`id_proses`);

--
-- Indexes for table `kejadians`
--
ALTER TABLE `kejadians`
  ADD PRIMARY KEY (`id_kejadian`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `pemiliks`
--
ALTER TABLE `pemiliks`
  ADD PRIMARY KEY (`id_pemilik`),
  ADD UNIQUE KEY `pemiliks_username_unique` (`username`);

--
-- Indexes for table `penemuans`
--
ALTER TABLE `penemuans`
  ADD PRIMARY KEY (`id_penemuan`),
  ADD KEY `penemuans_id_barang_foreign` (`id_barang`),
  ADD KEY `penemuans_id_proses_foreign` (`id_proses`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD UNIQUE KEY `petugas_username_unique` (`username`);

--
-- Indexes for table `proses`
--
ALTER TABLE `proses`
  ADD PRIMARY KEY (`id_proses`),
  ADD KEY `proses_id_petugas_foreign` (`id_petugas`),
  ADD KEY `proses_id_pemilik_foreign` (`id_pemilik`),
  ADD KEY `proses_id_kejadian_foreign` (`id_kejadian`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id_foto` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `identitas`
--
ALTER TABLE `identitas`
  MODIFY `id_identitas` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id_kategori` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `kejadians`
--
ALTER TABLE `kejadians`
  MODIFY `id_kejadian` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barangs`
--
ALTER TABLE `barangs`
  ADD CONSTRAINT `barangs_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategoris` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fotos_id_barang_foreign` FOREIGN KEY (`id_barang`) REFERENCES `barangs` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `identitas`
--
ALTER TABLE `identitas`
  ADD CONSTRAINT `identitas_id_pemilik_foreign` FOREIGN KEY (`id_pemilik`) REFERENCES `pemiliks` (`id_pemilik`);

--
-- Ketidakleluasaan untuk tabel `kehilangans`
--
ALTER TABLE `kehilangans`
  ADD CONSTRAINT `kehilangans_id_barang_foreign` FOREIGN KEY (`id_barang`) REFERENCES `barangs` (`id_barang`),
  ADD CONSTRAINT `kehilangans_id_proses_foreign` FOREIGN KEY (`id_proses`) REFERENCES `proses` (`id_proses`);

--
-- Ketidakleluasaan untuk tabel `penemuans`
--
ALTER TABLE `penemuans`
  ADD CONSTRAINT `penemuans_id_barang_foreign` FOREIGN KEY (`id_barang`) REFERENCES `barangs` (`id_barang`),
  ADD CONSTRAINT `penemuans_id_proses_foreign` FOREIGN KEY (`id_proses`) REFERENCES `proses` (`id_proses`);

--
-- Ketidakleluasaan untuk tabel `proses`
--
ALTER TABLE `proses`
  ADD CONSTRAINT `proses_id_kejadian_foreign` FOREIGN KEY (`id_kejadian`) REFERENCES `kejadians` (`id_kejadian`),
  ADD CONSTRAINT `proses_id_pemilik_foreign` FOREIGN KEY (`id_pemilik`) REFERENCES `pemiliks` (`id_pemilik`),
  ADD CONSTRAINT `proses_id_petugas_foreign` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
