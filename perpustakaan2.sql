-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2021 at 02:23 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan2`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggotas`
--

CREATE TABLE `anggotas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggotas`
--

INSERT INTO `anggotas` (`id`, `name`, `sex`, `telp`, `alamat`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Pelita', 'P', '087821505412', 'Gunung Batu, Bandung', 'pelita@gmail.com', NULL, NULL),
(2, 'Ayu', 'P', '08112121222', 'Sukawarna, Bandung', 'ayu@gmail.com', NULL, NULL),
(3, 'Rasyied', 'L', '085771137286', 'Jakarta', 'rasyied@gmail.com', '2021-08-25 03:08:31', '2021-08-25 03:08:31'),
(4, 'Danu', 'L', '08577112236', 'Bandung', 'danu@gmail.com', '2021-08-25 15:28:14', '2021-08-25 15:28:14'),
(5, 'ZSNYIGHMJODVWTPUQCKARFXBEL', 'P', '1308492657', 'eknulscvgifrhywdpboaxtqmjz', 'kbtwhncugpoazvedmiyrjsqfxl', '2021-09-04 20:01:36', '2021-09-04 20:01:36'),
(6, 'MFWYLONRXTQUHPGDVBACSZJKIE', 'L', '2431870659', 'mtyvsjfcdaklugreoqpwbhxnzi', 'vonijhtswbrazgkemuqpdxclfy', '2021-09-04 20:01:36', '2021-09-04 20:01:36'),
(7, 'NRBSDTEGOXUPFKQHIWZCYVJMLA', 'L', '2356491870', 'nausmdpwltxzygofhrjevbkciq', 'bzcadmwfivsqxopkgeluyrtnhj', '2021-09-05 22:03:56', '2021-09-05 22:03:56'),
(8, 'MWZLOFKSIBVHDATNXUCGYPJQRE', 'P', '4936820157', 'beoxaympilrhwqndfvtjguszkc', 'obeshmtkpdrcwgnzjifqvxlayu', '2021-09-05 22:03:56', '2021-09-05 22:03:56'),
(9, 'XORWQPMSDUBAKEVLCTNFJIHGYZ', 'L', '6075934812', 'lkvgsytjbofphxzwurimcnedqa', 'zxrvcgoitmkubfnpyljqsdwaeh', '2021-09-05 22:10:22', '2021-09-05 22:10:22'),
(10, 'BWHUZTNPROQSAKYGCEJDIMVXFL', 'L', '9842051637', 'ticyxujfwernzpldahmobgqsvk', 'badjntosqczlvexgyhprkmiuwf', '2021-09-05 22:10:22', '2021-09-05 22:10:22'),
(11, 'YNVJSUAIOEKHRBMQCPLGXZWDTF', 'L', '6039158427', 'sxptdvgyjaunwkqorzlifchbme', 'fhzrmcjutnbkayvwpeqsoxidgl', '2021-09-05 22:10:22', '2021-09-05 22:10:22'),
(12, 'QMRGZVKJBPNAODFTXELCSIUHWY', 'L', '7250613489', 'josfinbzctadkqhgerylmwxvpu', 'lsnjhikbzgctxrefaqwpuymdov', '2021-09-05 22:10:22', '2021-09-05 22:10:22'),
(13, 'EOUBIJGHSQRXLVAMCWYTPZFDKN', 'L', '2079165384', 'xbrqhwzgeafvplnjodmyciukst', 'cvbexizsykmpfgodnjqtwrulah', '2021-09-05 22:10:22', '2021-09-05 22:10:22'),
(14, 'PYLJWUTDAORENZGSMBHFIVXKCQ', 'P', '9748520361', 'tybxkplwfhnzrmcqagedoivusj', 'umzjxpldysitwvaenohcbrqkgf', '2021-09-05 22:13:07', '2021-09-05 22:13:07'),
(15, 'TOSIHXFPJRVLDGZWYNAKQBMUEC', 'L', '9614802357', 'zsphuondmgtyqivbxcafljrkwe', 'qvxbgyrltnpjcawzsofmehduki', '2021-09-05 22:13:07', '2021-09-05 22:13:07'),
(16, 'JFILSNYMERATKBXOWQHVDPGCZU', 'L', '3024968157', 'wnymipjskzalbvhecxtdqufogr', 'kvoplbqatmyzrxfgcjsihnduwe', '2021-09-05 22:15:44', '2021-09-05 22:15:44'),
(17, 'YSFKVWEBCUDTLHPQIZMRAONXGJ', 'L', '1304925768', 'lhkvyrzamwgoqxisdneutbcjfp', 'ilybrzuvwkqoefdmnhstgcjapx', '2021-09-05 22:15:44', '2021-09-05 22:15:44'),
(18, 'WKTYANHMXJFSIUDOEZGPVCQBLR', 'L', '6803792514', 'nworptvhmfacqbuxdslkyjeigz', 'tehdgpsvbaclfywkornuqxijmz', '2021-09-05 22:15:44', '2021-09-05 22:15:44'),
(19, 'YJRSXNUGTQZFBPHWDIKEVOACLM', 'L', '2803617945', 'thdkpxruweibgvcjfmyzaqlnos', 'eongqsrjbyhpifxwautczdkmvl', '2021-09-05 22:15:44', '2021-09-05 22:15:44'),
(20, 'OWRTQMFCZHUVINEPLKDGJXABYS', 'L', '4573062189', 'xktifyjsodeupzrclhgaqnwbmv', 'uixjzcgyplfwodetnhqarbsvkm', '2021-09-05 22:15:44', '2021-09-05 22:15:44'),
(21, 'FIGNCTKZWLXAUHJYDQOBRMPVES', 'L', '8695217430', 'nidamrzjgluwqkohtvxbpecfys', 'tbwlcehsuvforqznpagjydxkim', '2021-09-05 22:21:02', '2021-09-05 22:21:02'),
(22, 'CKWVSDFTNJLMZHQREGOXPBUAIY', 'L', '6540139827', 'fsdcpyznkmiwalxtoqjgehrvub', 'kgjfpsamdntxrbhcqiluozyewv', '2021-09-05 22:21:02', '2021-09-05 22:21:02'),
(23, 'TNAWFESPBQORXUDGVILCZYHMJK', 'P', '6725094381', 'qknhvjuzcmyewxolrsapdbfgti', 'feuqdnxbamhsklciyvgzrjtpow', '2021-09-05 22:21:02', '2021-09-05 22:21:02'),
(24, 'WDIMTVBJYLAKRPGXECSHUQFNOZ', 'P', '5760913482', 'ywrhbuqgloxecfmdtzvknpasji', 'bxejlwquyrtmfvakzhopcdgnis', '2021-09-05 22:21:02', '2021-09-05 22:21:02'),
(25, 'CRQJPXUFYHMNSADIGZKLWTOVBE', 'P', '1536728409', 'krqzjteauwipmnyhlogxvbfcsd', 'djftsivzyclwbrpgamokxqenuh', '2021-09-05 22:21:02', '2021-09-05 22:21:02'),
(26, 'EYGMPXNHKLVCWFDSOBIUZQJART', 'L', '1286743509', 'jifwxyodtahscmnpezuvqgklrb', 'uliomneyagckbwxstqdfrzhvpj', '2021-09-05 22:32:37', '2021-09-05 22:32:37'),
(27, 'BVCNOFXQIPEAMKGWTZJRDULHYS', 'P', '6709524318', 'gejmzlpxcinuhrfdykbawqotsv', 'rgsyajqoktechbwpzdunxlimfv', '2021-09-05 22:32:37', '2021-09-05 22:32:37'),
(28, 'CGTLQJSNIAUHERXWKZVFMBDOYP', 'P', '5670921438', 'idwkpmsbvjcyexzhartonfgluq', 'ustzkolegwyvdicfxrqnjhbpam', '2021-09-05 22:32:37', '2021-09-05 22:32:37'),
(29, 'BXEUJGNOZFVIMPDQASLCKHTYWR', 'L', '5819620374', 'kzpcxsmoyqherbtvdiunjfwalg', 'toyejuiawdpzkhrnvmfcsgqxlb', '2021-09-05 22:32:37', '2021-09-05 22:32:37'),
(30, 'TNLIUDCEWVFBSPGOZAYQJHRKMX', 'P', '3695124780', 'axjyeomrzfwvpblutcqskdhnig', 'uhaxgpeiqobrzcjnvkmltfydsw', '2021-09-05 22:32:37', '2021-09-05 22:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `bukus`
--

CREATE TABLE `bukus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `isbn` int(11) NOT NULL,
  `judul` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` int(11) NOT NULL,
  `id_penerbit` bigint(20) UNSIGNED NOT NULL,
  `id_pengarang` bigint(20) UNSIGNED NOT NULL,
  `id_katalog` bigint(20) UNSIGNED NOT NULL,
  `qty_stok` int(11) NOT NULL,
  `harga_pinjam` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bukus`
--

INSERT INTO `bukus` (`id`, `isbn`, `judul`, `tahun`, `id_penerbit`, `id_pengarang`, `id_katalog`, `qty_stok`, `harga_pinjam`, `created_at`, `updated_at`) VALUES
(3, 2291, 'Lancar Javascript', 2018, 1, 1, 1, 10, 10000, NULL, NULL),
(4, 92111, 'Basic PHP', 2010, 2, 2, 1, 12, 12000, NULL, NULL),
(11, 962139, 'QYJVMENBIPCOWSHTKGXDULZRAF', 2020, 1, 1, 1, 20, 3095, '2021-09-08 04:35:37', '2021-09-08 04:35:37'),
(12, 965936, 'PZCUKMQHVIARNBJWYFOTESDXLG', 2021, 2, 1, 2, 15, 4346, '2021-09-08 04:35:37', '2021-09-08 04:35:37'),
(13, 536915, 'RUEDLWFGCHTJAKYXBZIVNSMPQO', 2020, 3, 2, 3, 15, 4071, '2021-09-08 04:35:37', '2021-09-08 04:35:37'),
(14, 979594, 'VCKRBJYPWFSTIAZUOMQXNGDLHE', 2021, 4, 3, 3, 11, 4076, '2021-09-08 04:35:37', '2021-09-08 04:35:37'),
(15, 520840, 'RDCQOWTUZEFSNLIJGPKBHVYAXM', 2019, 2, 2, 4, 16, 2169, '2021-09-08 04:35:37', '2021-09-08 04:35:37'),
(16, 735537, 'judul 0', 2020, 1, 1, 3, 12, 2300, '2021-09-08 04:38:09', '2021-09-08 04:38:09'),
(17, 176123, 'judul 1', 2018, 2, 1, 2, 10, 4780, '2021-09-08 04:38:09', '2021-09-08 04:38:09'),
(18, 940868, 'judul 2', 2020, 3, 2, 2, 18, 3125, '2021-09-08 04:38:09', '2021-09-08 04:38:09'),
(19, 445098, 'judul 3', 2015, 2, 3, 2, 6, 4629, '2021-09-08 04:38:09', '2021-09-08 04:38:09'),
(20, 267882, 'judul 4', 2021, 1, 2, 4, 16, 2960, '2021-09-08 04:38:09', '2021-09-08 04:38:09'),
(21, 824507, 'judul 0', 2021, 4, 2, 1, 5, 2649, '2021-09-08 04:42:39', '2021-09-08 04:42:39'),
(22, 190581, 'judul 1', 2018, 1, 3, 2, 7, 3206, '2021-09-08 04:42:39', '2021-09-08 04:42:39'),
(23, 920940, 'judul 2', 2021, 1, 2, 1, 15, 2952, '2021-09-08 04:42:39', '2021-09-08 04:42:39'),
(24, 360216, 'judul 3', 2017, 4, 2, 2, 17, 3980, '2021-09-08 04:42:39', '2021-09-08 04:42:39'),
(25, 419284, 'judul 4', 2021, 4, 1, 3, 9, 3236, '2021-09-08 04:42:39', '2021-09-08 04:42:39');

-- --------------------------------------------------------

--
-- Table structure for table `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_peminjaman` bigint(20) UNSIGNED NOT NULL,
  `id_buku` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `katalogs`
--

CREATE TABLE `katalogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `katalogs`
--

INSERT INTO `katalogs` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Buku Anak', NULL, '2021-08-18 06:47:10'),
(2, 'Buku Filsafat', NULL, '2021-07-21 05:02:19'),
(3, 'Buku Desain', '2021-07-21 05:02:29', '2021-07-21 05:02:45'),
(4, 'Buku Gambar', '2021-08-18 07:07:36', '2021-08-18 07:07:36');

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
(1, '2010_07_01_060720_create_anggotas_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2021_02_01_055934_create_penerbits_table', 1),
(6, '2021_03_01_060324_create_pengarangs_table', 1),
(7, '2021_04_01_060526_create_katalogs_table', 1),
(8, '2021_05_01_060605_create_bukus_table', 1),
(9, '2021_06_30_060654_create_peminjaman_table', 1),
(10, '2021_07_01_060632_create_detail_peminjaman_table', 1);

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
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_anggota` bigint(20) UNSIGNED NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `id_anggota`, `tgl_pinjam`, `tgl_kembali`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-05-26', '2021-05-31', NULL, NULL),
(2, 2, '2021-07-05', '2021-07-07', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penerbits`
--

CREATE TABLE `penerbits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_penerbit` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` char(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penerbits`
--

INSERT INTO `penerbits` (`id`, `nama_penerbit`, `email`, `telp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Penerbit 01', 'penerbit@perpus.co.id', '0219999333', 'Surabaya', NULL, NULL),
(2, 'Penerbit 02', 'penerbit2@gmail.com', '08765158111', 'Bandung', NULL, NULL),
(3, 'Penerbit03', 'penerbit3@gmail.com', '08131561868', 'Jakarta', '2021-08-25 02:08:37', '2021-08-25 02:08:37'),
(4, 'Penerbit04', 'penerbit4@gmail.com', '0812356489', 'Bandung', '2021-08-25 02:09:34', '2021-08-25 02:09:34');

-- --------------------------------------------------------

--
-- Table structure for table `pengarangs`
--

CREATE TABLE `pengarangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pengarang` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` char(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengarangs`
--

INSERT INTO `pengarangs` (`id`, `nama_pengarang`, `email`, `telp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Pengarang 01', 'pengarang1@perpus.co.id', '0929211', 'Bandung', NULL, NULL),
(2, 'Pengarang 02', 'pengarang2@perpus.co.id', '0929211222', 'Yogyakarta', NULL, NULL),
(3, 'Pengarang03', 'pengarang3@gmail.com', '08132133125', 'Jakarta', '2021-08-24 15:33:13', '2021-08-24 15:33:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_anggota` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `id_anggota`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rasyied Hidayat', 'megahalilintar90@gmail.com', NULL, '$2y$10$rKevQtYRT95BKcRUDlcmFeuaYjQtICSWHgJR0cEBSjEICvr1lVEge', NULL, NULL, '2021-07-02 17:28:05', '2021-07-02 17:28:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggotas`
--
ALTER TABLE `anggotas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bukus`
--
ALTER TABLE `bukus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bukus_id_penerbit_foreign` (`id_penerbit`),
  ADD KEY `bukus_id_pengarang_foreign` (`id_pengarang`),
  ADD KEY `bukus_id_katalog_foreign` (`id_katalog`);

--
-- Indexes for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_peminjaman_id_peminjaman_foreign` (`id_peminjaman`),
  ADD KEY `detail_peminjaman_id_buku_foreign` (`id_buku`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `katalogs`
--
ALTER TABLE `katalogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penerbits`
--
ALTER TABLE `penerbits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengarangs`
--
ALTER TABLE `pengarangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_anggota_foreign` (`id_anggota`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggotas`
--
ALTER TABLE `anggotas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `bukus`
--
ALTER TABLE `bukus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `katalogs`
--
ALTER TABLE `katalogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penerbits`
--
ALTER TABLE `penerbits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengarangs`
--
ALTER TABLE `pengarangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bukus`
--
ALTER TABLE `bukus`
  ADD CONSTRAINT `bukus_id_katalog_foreign` FOREIGN KEY (`id_katalog`) REFERENCES `katalogs` (`id`),
  ADD CONSTRAINT `bukus_id_penerbit_foreign` FOREIGN KEY (`id_penerbit`) REFERENCES `penerbits` (`id`),
  ADD CONSTRAINT `bukus_id_pengarang_foreign` FOREIGN KEY (`id_pengarang`) REFERENCES `pengarangs` (`id`);

--
-- Constraints for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD CONSTRAINT `detail_peminjaman_id_buku_foreign` FOREIGN KEY (`id_buku`) REFERENCES `bukus` (`id`),
  ADD CONSTRAINT `detail_peminjaman_id_peminjaman_foreign` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_anggota_foreign` FOREIGN KEY (`id_anggota`) REFERENCES `anggotas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
