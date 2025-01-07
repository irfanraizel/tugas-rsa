-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 07, 2025 at 06:16 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_rsa`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `deskripsi` text,
  `harga` int NOT NULL,
  `stok` int NOT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `gambar` varchar(40) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `deskripsi`, `harga`, `stok`, `kategori`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Kabel Eterna', 'Eterna adalah merek kabel yang dikenal karena kualitas dan kehandalannya dalam industri listrik. Kabel Eterna dirancang untuk memberikan keamanan dan stabilitas listrik pada berbagai aplikasi, baik di rumah, perkantoran, maupun industri.', 80000, 100, 'elektrik', 'kabeleterna.jpg', '2024-12-30 14:43:54', '2025-01-07 03:53:21'),
(2, 'Cat Dulux', 'Dulux adalah merek cat terkemuka yang dikenal karena kualitas dan inovasinya dalam industri cat. Produk-produk Dulux dirancang untuk memberikan perlindungan dan daya tahan pada berbagai permukaan, baik interior maupun eksterior. ', 150000, 50, 'cat', 'catdulux.jpg', '2025-01-07 03:52:53', '2025-01-07 03:52:53'),
(3, 'Kran Onda', 'Kran Onda adalah merek kran yang terkenal dengan desain modern dan fungsionalitas yang tinggi. Merek ini berfokus pada menyediakan produk perangkat keras untuk keperluan dapur dan kamar mandi dengan kualitas yang baik serta estetika yang menarik.', 90000, 80, 'kranair', 'kranonda.jpg', '2025-01-07 03:54:59', '2025-01-07 03:54:59');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int NOT NULL,
  `no_ref` varchar(50) NOT NULL,
  `no_rekening` text NOT NULL,
  `nama_user` text NOT NULL,
  `email` text NOT NULL,
  `telp` text NOT NULL,
  `nama_barang` text NOT NULL,
  `harga` int NOT NULL,
  `alamat` text NOT NULL,
  `metode` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `no_ref`, `no_rekening`, `nama_user`, `email`, `telp`, `nama_barang`, `harga`, `alamat`, `metode`, `created_at`) VALUES
(1, '140117362199822024', '[412,1911,412,1911]', '[3857,462,1976,1035,4382]', '[3857,462,1976,1035,4382,462,1035,3857,4725,4731,2391,1818,4067,4333,1035,3857,2391,634,3585,2213,4333]', '[1457,1797,1911,1797,1797,1423,1797,1423,1457,1249,1423,1423]', '[4492,1035,2566,4731,2391,2647,1961,2160,4731,462,4382,1035]', 80000, '[1055,4731,462,1035,4382,4067]', 'mandiri', '2025-01-07 03:19:51'),
(2, '140117362201542024', '[1457,1797,1911,1200,1911,1200,1911,1200]', '[3857,462,1976,1035,4382]', '[3857,462,1976,1035,4382,462,1035,3857,4725,4731,2391,1818,4067,4333,1035,3857,2391,634,3585,2213,4333]', '[1457,1797,1911,1797,1797,1423,1797,1423,1457,1249,1423,1423]', '[4492,1035,2566,4731,2391,2647,1961,2160,4731,462,4382,1035]', 80000, '[1055,4731,2866,1035,4382,4067]', 'ovo', '2025-01-07 03:22:45'),
(3, '140117362221822024', '[1797,4001,1423,1911,1911,1200,1797,1797,1423]', '[1035,1035,4382]', '[1035,1035,4382,1818,4067,4333,1035,3857,2391,634,3585,2213,4333]', '[1457,1797,4001,1797,4001,1797,1797,4001,4001,1797,4001,1797]', '[3886,1035,2160,2647,3887,3545,2391,3545,2417]', 150000, '[2160,1035,4333,2566,1035,1399]', 'bri', '2025-01-07 03:56:35'),
(4, '140117362228462024', '[1423,1200,1423,1200]', '[1035,1035,4382]', '[1035,1035,4382,1818,4067,4333,1035,3857,2391,634,3585,2213,4333]', '[1457,1797,4001,1797,4001,1797,1797,4001,4001,1797,4001,1797]', '[4492,462,1035,4382,2647,300,4382,2438,1035]', 90000, '[1035,1055,2438]', 'mandiri', '2025-01-07 04:07:34'),
(6, '140117362259532024', '[412,340,412,340,412,340,412,340,412,340]', '[3857,462,1976,1035,4382]', '[3857,462,1976,1035,4382,462,1035,3857,4725,4731,2391,1818,4067,4333,1035,3857,2391,634,3585,2213,4333]', '[1457,1797,1911,1797,1797,1423,1797,1423,1457,1249,1423,1423]', '[3886,1035,2160,2647,3887,3545,2391,3545,2417]', 150000, '[1055,4731,462,1035,4382,4067]', 'bca', '2025-01-07 04:59:26'),
(7, '140117362510012024', '[412,412,1423,1423,412,1457,1956,1797,1797]', '[1035,1035,4382]', '[1035,1035,4382,1818,4067,4333,1035,3857,2391,634,3585,2213,4333]', '[1457,1797,4001,1797,4001,1797,1797,4001,4001,1797,4001,1797]', '[4492,462,1035,4382,2647,300,4382,2438,1035]', 90000, '[3825,1035,4333,2566,1035,1399,2647,2076,2391,2213,1399,2647,3064,1200,1132,1423,1200]', 'mandiri', '2025-01-07 11:56:58'),
(8, '140117362519662024', '[1200,1457,1423,4001,1200,1457,1423,1457,1200,4001,1457]', '[1035,1035,4382]', '[1035,1035,4382,1818,4067,4333,1035,3857,2391,634,3585,2213,4333]', '[1457,1797,4001,1797,4001,1797,1797,4001,4001,1797,4001,1797]', '[3886,1035,2160,2647,3887,3545,2391,3545,2417]', 150000, '[3886,3857,1399,1035,4382,2438,4731,2647,1531,4731,462,4333,1035,3857]', 'bri', '2025-01-07 12:12:59'),
(9, '140117362584572024', '[1457,1797,1423,1200,1797,1797,1423,1457,1200,1423,1457,1200,1797,1457]', '[1035,1035,4382]', '[1035,1035,4382,1818,4067,4333,1035,3857,2391,634,3585,2213,4333]', '[1457,1797,4001,1797,4001,1797,1797,4001,4001,1797,4001,1797]', '[3886,1035,2160,2647,3887,3545,2391,3545,2417]', 150000, '[2160,1035,4333,2566,1035,1399]', 'ovo', '2025-01-07 14:01:26'),
(10, '140117362734662024', '[1797,1457,1797,1200,1457,1200,1457,1200]', '[2438,1035,1487,3857,2438]', '[2438,1035,1487,3857,2438,1818,4067,4333,1035,3857,2391,634,3585,2213,4333]', '[1457,1797,1911,1797,1423,1797,1423,1797,1423]', '[3886,1035,2160,2647,3887,3545,2391,3545,2417]', 150000, '[3585,3857,462,3545,1035,1055]', 'bca', '2025-01-07 18:11:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `telp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `telp`) VALUES
(1, 'irfan', 'irfanraizel@gmail.com', '$2y$10$XJF/YU/vWeJHpq3lPpEAR.YkoonQNr2jLAgXm0BuvD6tDb.SKB7s2', '087881810411'),
(2, 'aan', 'aan@gmail.com', '$2y$10$a82GqNy6O0OYSozVLs4NYO.WOglRU7G4ssXxVimKzeZS7MtYJCJdK', '089898899898'),
(3, 'david', 'david@gmail.com', '$2y$10$v1.aatGTQEX/2i/PLlkeVOkZb99Mfuj2/eoIGTpANjG.R662Dn0Sy', '087818181');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
