-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 29, 2022 at 01:11 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kd_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_awal` int(11) NOT NULL,
  `jumlah_akhir` int(11) NOT NULL,
  `harga` bigint(20) DEFAULT NULL,
  `total` bigint(20) NOT NULL,
  `sisa` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id`, `nama_barang`, `kd_barang`, `jumlah_awal`, `jumlah_akhir`, `harga`, `total`, `sisa`, `created_at`, `updated_at`) VALUES
(26, 'Pewangi Pakaian', 'B0001', 20, 15, 5000, 100000, 75000, '2022-04-29 09:35:00', '2022-04-29 09:35:10'),
(27, 'Sabun Cuci', 'B0002', 20, 20, 5000, 100000, 100000, '2022-04-29 09:35:32', '2022-04-29 09:35:32'),
(28, 'Selotip', 'B0003', 10, 10, 3000, 30000, 30000, '2022-04-29 09:35:47', '2022-04-29 09:35:47');

-- --------------------------------------------------------

--
-- Table structure for table `checkout_kilos`
--

CREATE TABLE `checkout_kilos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kd_invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kd_paket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `berat_barang` int(11) NOT NULL,
  `metode_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_paket` bigint(20) NOT NULL,
  `harga_antar` bigint(20) NOT NULL DEFAULT '0',
  `harga_total` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `checkout_kilos`
--

INSERT INTO `checkout_kilos` (`id`, `kd_invoice`, `kd_paket`, `berat_barang`, `metode_pembayaran`, `harga_paket`, `harga_antar`, `harga_total`, `created_at`, `updated_at`) VALUES
(1, 'I0005', 'PK001', 9, 'outlet', 270000, 0, 270000, '2022-02-08 09:25:30', '2022-02-08 09:25:30'),
(3, 'I0006', 'PK001', 6, 'rumah', 180000, 5000, 185000, '2022-02-09 06:17:06', '2022-02-09 06:17:06'),
(4, 'I0008', 'PK002', 4, 'rumah', 30000, 0, 30000, '2022-02-17 05:50:16', '2022-02-17 05:50:16'),
(5, 'I0010', 'PK002', 1, 'rumah', 7500, 0, 7500, '2022-03-18 02:21:28', '2022-03-18 02:21:28'),
(6, 'I0011', 'PK002', 1, 'outlet', 7500, 0, 7500, '2022-03-24 07:37:45', '2022-03-24 07:37:45');

-- --------------------------------------------------------

--
-- Table structure for table `checkout_satus`
--

CREATE TABLE `checkout_satus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kd_invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kd_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `metode_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_barang` bigint(20) NOT NULL,
  `harga_antar` bigint(20) NOT NULL DEFAULT '0',
  `harga_total` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `checkout_satus`
--

INSERT INTO `checkout_satus` (`id`, `kd_invoice`, `kd_barang`, `jumlah_barang`, `metode_pembayaran`, `harga_barang`, `harga_antar`, `harga_total`, `created_at`, `updated_at`) VALUES
(1, 'I0001', 'PS001', 1, 'outlet', 5000, 0, 5000, '2022-02-03 06:29:09', '2022-02-03 06:29:09'),
(3, 'I0003', 'PS001', 3, 'rumah', 15000, 5000, 20000, '2022-02-08 09:00:40', '2022-02-08 09:00:40'),
(4, 'I0004', 'PS001', 2, 'rumah', 10000, 0, 10000, '2022-02-08 09:11:39', '2022-02-08 09:11:39'),
(5, 'I0007', 'PS001', 3, 'outlet', 15000, 0, 15000, '2022-02-12 07:37:50', '2022-02-12 07:37:50'),
(6, 'I0009', 'PS001', 1, 'rumah', 5000, 6000, 11000, '2022-03-17 20:48:42', '2022-03-17 20:48:42');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_03_31_075733_create_outlet_table', 1),
(5, '2020_04_01_152610_create_paket_kilo_table', 1),
(6, '2020_04_01_152619_create_paket_satu_table', 1),
(7, '2020_04_03_101118_create_pelanggan_table', 1),
(8, '2020_04_08_220339_create_checkout_kilo_table', 1),
(9, '2020_04_08_220348_create_checkout_satu_table', 1),
(10, '2020_04_08_221537_create_transaksi_table', 1),
(11, '2020_04_08_223620_create_struk_table', 1),
(12, '2022_03_12_031759_create_pesanans_table', 2),
(13, '2022_03_12_100432_add_status_to_pesanans_table', 3),
(14, '2022_03_18_051524_add_alasan_to_pesanans_table', 4),
(15, '2022_03_24_085758_add_tgl_lahir_to_pelanggans_table', 5),
(16, '2022_03_24_090348_add_pekerjaan_to_pelanggans_table', 6),
(17, '2022_03_29_034253_create_barang_table', 7),
(18, '2022_03_29_035059_create_mutasi_barang_table', 8),
(19, '2022_03_29_051550_add_kd_barang_to_barangs_table', 9),
(20, '2022_03_29_121738_add_jumlah_to_barangs_table', 10),
(21, '2022_04_12_201707_add_harga_to_barangs_table', 11),
(22, '2022_04_28_111356_add_total_to_barangs_table', 12),
(23, '2022_04_29_144823_add_total_to_mutasi_barangs_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `mutasi_barangs`
--

CREATE TABLE `mutasi_barangs` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_awal` int(11) NOT NULL,
  `jumlah_akhir` int(11) NOT NULL,
  `total` bigint(20) NOT NULL,
  `sisa` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mutasi_barangs`
--

INSERT INTO `mutasi_barangs` (`id`, `id_barang`, `jumlah_awal`, `jumlah_akhir`, `total`, `sisa`, `created_at`, `updated_at`) VALUES
(58, 'B0001', 20, 20, 100000, 100000, '2022-04-29 09:35:00', '2022-04-29 09:35:00'),
(59, 'B0001', 20, 15, 100000, 75000, '2022-04-29 09:35:10', '2022-04-29 09:35:10'),
(60, 'B0002', 20, 20, 100000, 100000, '2022-04-29 09:35:32', '2022-04-29 09:35:32'),
(61, 'B0003', 10, 10, 30000, 30000, '2022-04-29 09:35:47', '2022-04-29 09:35:47');

-- --------------------------------------------------------

--
-- Table structure for table `outlets`
--

CREATE TABLE `outlets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iframe_script` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `outlets`
--

INSERT INTO `outlets` (`id`, `nama`, `alamat`, `hotline`, `email`, `iframe_script`, `created_at`, `updated_at`) VALUES
(1, 'Cikoneng Laundry', 'Desa Cikoneng Kecamatan Ganeas Kabupaten Sumedang', '085759045485', 'akunglb@gmail.com', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.2877163697635!2d107.95625911429588!3d-6.856077068979809!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68d3de85d184dd%3A0x4146148e1da3888b!2sKantor%20Desa%20Cikoneng!5e0!3m2!1sen!2sid!4v1642488995352!5m2!1sen!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '2022-01-17 23:56:52', '2022-01-17 23:56:52');

-- --------------------------------------------------------

--
-- Table structure for table `paket_kilos`
--

CREATE TABLE `paket_kilos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kd_paket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_paket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_paket` bigint(20) NOT NULL,
  `hari_paket` int(11) NOT NULL,
  `min_berat_paket` int(11) NOT NULL,
  `antar_jemput_paket` tinyint(1) NOT NULL DEFAULT '0',
  `id_outlet` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paket_kilos`
--

INSERT INTO `paket_kilos` (`id`, `kd_paket`, `nama_paket`, `harga_paket`, `hari_paket`, `min_berat_paket`, `antar_jemput_paket`, `id_outlet`, `created_at`, `updated_at`) VALUES
(1, 'PK001', 'Paket 10 Kg', 30000, 3, 6, 0, 1, '2022-02-08 09:24:13', '2022-02-08 09:24:13'),
(2, 'PK002', 'Paket Mahasiswa', 7500, 3, 1, 1, 1, '2022-02-17 05:48:08', '2022-02-17 05:48:08');

-- --------------------------------------------------------

--
-- Table structure for table `paket_satus`
--

CREATE TABLE `paket_satus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kd_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_barang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga_barang` bigint(20) NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paket_satus`
--

INSERT INTO `paket_satus` (`id`, `kd_barang`, `nama_barang`, `ket_barang`, `harga_barang`, `id_outlet`, `created_at`, `updated_at`) VALUES
(1, 'PS001', 'Jeans', 'Celana/Baju', 5000, 1, '2022-02-03 06:25:03', '2022-02-03 06:25:03');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggans`
--

CREATE TABLE `pelanggans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kd_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jk_pelanggan` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cek_member` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggans`
--

INSERT INTO `pelanggans` (`id`, `kd_pelanggan`, `nama_pelanggan`, `tgl_lahir`, `pekerjaan`, `jk_pelanggan`, `email_pelanggan`, `no_hp_pelanggan`, `alamat_pelanggan`, `cek_member`, `password`, `created_at`, `updated_at`) VALUES
(1, 'K0001', 'Rudi', NULL, NULL, 'L', 'agenx@gmail.com', '0855121321321', 'Kabupaten sumedang', 'member', 'user1', '2022-02-03 06:29:09', '2022-02-03 06:29:09'),
(3, 'K0003', 'Fajar', NULL, NULL, 'L', 'fajar@gmail.com', '087336111478', 'Desa Cijengkol Kecamatan Ganeas Kabupaten Sumedang', 'non_member', 'fajar', '2022-02-09 06:05:21', '2022-02-09 06:05:21'),
(4, 'K0004', 'Rina', NULL, NULL, 'P', 'rina@gmail.com', '089000336545', 'Desa Muncanggajah Kecamatan Ganeas Kabupaten Sumedang', 'member', 'rina123', '2022-02-09 06:24:48', '2022-02-09 06:24:48'),
(8, 'K0005', 'Toni', '2001-03-24', 'Mahasiswa', 'L', 'toni@example.com', '085445622333', 'Kecamatan Buah Dua', 'non_member', 'toni123', '2022-03-24 02:28:10', '2022-03-24 02:28:10'),
(9, 'K0006', 'Gani', '1994-03-24', 'Pegawai swasta', 'L', 'gani@example.com', '086231456888', 'Kecamatan malangbong', 'non_member', 'gani123', '2022-03-24 06:49:02', '2022-03-24 06:49:02');

-- --------------------------------------------------------

--
-- Table structure for table `pesanans`
--

CREATE TABLE `pesanans` (
  `id` int(10) UNSIGNED NOT NULL,
  `kd_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_cucian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alasan_batal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanans`
--

INSERT INTO `pesanans` (`id`, `kd_pelanggan`, `jenis_cucian`, `pembayaran`, `created_at`, `updated_at`, `status`, `alasan_batal`) VALUES
(6, 'K0001', 'Satuan', 'Non-Tunai', '2022-03-12 04:35:39', '2022-04-24 06:22:21', '3', 'Laundry sedang libur,'),
(7, 'K0003', 'Kiloan', 'Tunai', '2022-03-12 06:46:53', '2022-03-17 22:37:35', '2', 'Cuaca hujan,'),
(8, 'K0001', 'Kiloan', 'Tunai', '2022-03-19 03:24:08', '2022-03-19 03:24:08', '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `struks`
--

CREATE TABLE `struks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kd_invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_total` bigint(20) NOT NULL,
  `harga_bayar` bigint(20) NOT NULL,
  `harga_kembali` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `struks`
--

INSERT INTO `struks` (`id`, `kd_invoice`, `harga_total`, `harga_bayar`, `harga_kembali`, `created_at`, `updated_at`) VALUES
(1, 'I0001', 5000, 10000, 5000, '2022-02-03 06:29:09', '2022-02-03 06:29:09'),
(3, 'I0005', 243000, 300000, 57000, '2022-02-08 09:25:30', '2022-02-08 09:25:30'),
(5, 'I0003', 18000, 20000, 2000, '2022-02-09 06:14:24', '2022-02-09 06:14:24'),
(6, 'I0007', 15000, 20000, 5000, '2022-02-12 07:37:49', '2022-02-12 07:37:49'),
(7, 'I0008', 28500, 50000, 21500, '2022-02-17 05:53:52', '2022-02-17 05:53:52'),
(8, 'I0011', 6000, 20000, 14000, '2022-03-24 07:37:45', '2022-03-24 07:37:45');

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `kd_invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kd_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_pemberian` date NOT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `pajak` bigint(20) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_bayar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kd_pegawai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id`, `id_outlet`, `kd_invoice`, `kd_pelanggan`, `tgl_pemberian`, `tgl_selesai`, `tgl_bayar`, `diskon`, `pajak`, `status`, `ket_bayar`, `kd_pegawai`, `created_at`, `updated_at`) VALUES
(1, 1, 'I0001', 'K0001', '2022-02-03', '2022-02-08', '2022-02-03', 0, 0, 'diambil', 'dibayar', 'U0001', '2022-02-03 06:29:09', '2022-02-08 03:11:59'),
(3, 1, 'I0003', 'K0001', '2022-02-08', '2022-02-08', '2022-02-09', 10, 0, 'diantar', 'dibayar', 'U0001', '2022-02-08 09:00:40', '2022-02-09 06:14:24'),
(4, 1, 'I0004', 'K0001', '2022-02-08', NULL, NULL, NULL, NULL, 'baru', 'belum_dibayar', 'U0001', '2022-02-08 09:11:39', '2022-02-08 09:11:39'),
(5, 1, 'I0005', 'K0001', '2022-02-08', '2022-02-11', '2022-02-08', 10, 0, 'baru', 'dibayar', 'U0001', '2022-02-08 09:25:30', '2022-02-08 09:25:30'),
(7, 1, 'I0006', 'K0003', '2022-02-09', '2022-02-12', NULL, NULL, NULL, 'baru', 'belum_dibayar', 'U0001', '2022-02-09 06:17:06', '2022-02-09 06:17:06'),
(8, 1, 'I0007', 'K0003', '2022-02-12', NULL, '2022-02-12', 0, 0, 'proses', 'dibayar', 'U0001', '2022-02-12 07:37:50', '2022-02-12 07:46:41'),
(9, 1, 'I0008', 'K0004', '2022-02-17', '2022-02-17', '2022-02-17', 5, 0, 'diambil', 'dibayar', 'U0001', '2022-02-17 05:50:16', '2022-02-17 05:55:56'),
(10, 1, 'I0009', 'K0001', '2022-03-18', NULL, NULL, NULL, NULL, 'baru', 'belum_dibayar', 'U0001', '2022-03-17 20:48:42', '2022-03-17 20:48:42'),
(11, 1, 'I0010', 'K0004', '2022-03-18', '2022-03-18', NULL, NULL, NULL, 'selesai', 'belum_dibayar', 'U0001', '2022-03-18 02:21:28', '2022-03-18 02:23:57'),
(12, 1, 'I0011', 'K0006', '2022-03-24', '2022-03-27', '2022-03-24', 20, 0, 'baru', 'dibayar', 'U0001', '2022-03-24 07:37:45', '2022-03-24 07:37:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kd_pengguna` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_outlet` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `kd_pengguna`, `name`, `role`, `avatar`, `username`, `email_verified_at`, `password`, `id_outlet`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'U0001', 'Shandika', 'admin', 'PP1.jpg', 'XNor', NULL, '$2y$10$m8bJvENlsp5rUqMBm9uN1uuOs/BF7tWsm35vWFOV6GnXRPwOF4T7W', 0, 'WJxTc58HSHJZXOwMC6N65y2SPP7rpjJ4lazNKppz5G3fPzVCcq0YQMqqJYb5', '2022-01-17 23:52:09', '2022-04-13 14:21:25'),
(2, 'K0001', 'Rudi', 'member', 'default.png', 'user1', NULL, '$2y$10$xm56CQswhUeoOZ0kJUeTherciwuB0SJPaqYf3Zn3Z6yY7yRH1JE0O', 0, '01QTsgX0zxp9fI6ZLrVyTm4NeAInHch6GDCW5lS5R4rWpEmzoxfo8S28cGpR', '2022-02-03 06:29:09', '2022-04-24 06:01:30'),
(4, 'K0003', 'Fajar', 'non_member', 'default.png', 'fajar', NULL, '$2y$10$lPAhoCoJRoewHcmmaGsHPe9btzW2DBzVXm3/OYHfE7dAQeQvTsn6.', 0, 'zmXMuXpGZKOL4WzCQwKGmuKkq85Gg9BAEOvjTjIfQsitLfqw9M6QyiWa05nP', '2022-02-09 06:05:21', '2022-02-09 06:05:21'),
(5, 'K0004', 'Rina', 'member', 'default.png', 'rina', NULL, '$2y$10$XVzcg2qhOGqPrKDJUheOFej3wqL8rJ6evG8efRJBUvOfulAuAUb32', 0, 'HOrpNCPrcwhyUdoC56fYieHWjjdbbrjyNIQtBT6d6kfm2OHlCENkeltmLBUV', '2022-02-09 06:24:48', '2022-02-09 06:24:48'),
(9, 'K0005', 'Toni', 'non_member', 'default.png', 'toni', NULL, '$2y$10$FQhXRGyhsGYyfNY/FkZnwO.e1E6CBEzObuScwPA2Hgs6lReAmcYKm', 0, 'gKcFW4Lkr0LiXnzTQ8hXcJ2GcqruYU9KLDZKTj4tr4FFrymJjv98ScDWq5sn', '2022-03-24 02:28:10', '2022-03-24 02:28:10'),
(10, 'K0006', 'Gani', 'non_member', 'default.png', 'gani', NULL, '$2y$10$YfuU3NAwVeR3WvGuFwoN1exagB4VHSXzo9eF7sHxRoTPOHJKA78FG', 0, 'FxcWUc543gKOqfcQLeVeA4Gv8NPQ86lqm159E3v9GiSzDgcxK7025oFdpR2A', '2022-03-24 06:49:02', '2022-03-24 06:49:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout_kilos`
--
ALTER TABLE `checkout_kilos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout_satus`
--
ALTER TABLE `checkout_satus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mutasi_barangs`
--
ALTER TABLE `mutasi_barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outlets`
--
ALTER TABLE `outlets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket_kilos`
--
ALTER TABLE `paket_kilos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket_satus`
--
ALTER TABLE `paket_satus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `struks`
--
ALTER TABLE `struks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `checkout_kilos`
--
ALTER TABLE `checkout_kilos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `checkout_satus`
--
ALTER TABLE `checkout_satus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `mutasi_barangs`
--
ALTER TABLE `mutasi_barangs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `outlets`
--
ALTER TABLE `outlets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paket_kilos`
--
ALTER TABLE `paket_kilos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `paket_satus`
--
ALTER TABLE `paket_satus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelanggans`
--
ALTER TABLE `pelanggans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `struks`
--
ALTER TABLE `struks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
