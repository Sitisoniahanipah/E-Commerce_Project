-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 01, 2023 at 12:40 PM
-- Server version: 10.6.12-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.1.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sonia_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `pakaian`
--

CREATE TABLE `pakaian` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `ukuran` varchar(45) DEFAULT NULL,
  `warna` varchar(45) DEFAULT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(32) DEFAULT NULL,
  `tipe_pakaian_id` int(45) DEFAULT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pakaian`
--

INSERT INTO `pakaian` (`id`, `nama`, `ukuran`, `warna`, `stok`, `harga`, `tipe_pakaian_id`, `image`) VALUES
(2, 'Kaos Polosan Putih ', 'XL', 'Hitam', 20, 30000, 2, '1003086_70e9af9b-3689-471b-85e9-7dcd3bf584b5_423_423.jpg'),
(3, 'Celana Jeans lol', 'L', 'Biru', 70, 200000, 3, '97dde8e47ca46f68495746dd808405c0.jpg'),
(26, 'Kerudung Merah Cantik', 'XL', 'Merah', 80, 15000, 2, '5-Cara-Membuat-Foto-Produk-Jilbab-Menarik-dan-Eye-Catching-Fotofilio.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `pakaian_id` int(45) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `tanggal`, `pakaian_id`, `quantity`, `nama`, `alamat`) VALUES
(2, '2023-04-17', 3, 2, 'Son', 'ga jelas'),
(3, '2023-04-17', 3, 2, 'Son', 'ga jelas'),
(4, '2023-04-17', 3, 2, 'Son', 'ga jelas'),
(5, '2023-04-17', 2, 4, 'asdasd', 'adasd');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_pakaian`
--

CREATE TABLE `tipe_pakaian` (
  `id` int(11) NOT NULL,
  `tipe` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipe_pakaian`
--

INSERT INTO `tipe_pakaian` (`id`, `tipe`) VALUES
(1, 'Jaket'),
(2, 'Kaos'),
(3, 'Celana apa'),
(4, 'Baju Robek');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pakaian`
--
ALTER TABLE `pakaian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pakaian_1_idx` (`tipe_pakaian_id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pesanan1` (`pakaian_id`);

--
-- Indexes for table `tipe_pakaian`
--
ALTER TABLE `tipe_pakaian`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pakaian`
--
ALTER TABLE `pakaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tipe_pakaian`
--
ALTER TABLE `tipe_pakaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pakaian`
--
ALTER TABLE `pakaian`
  ADD CONSTRAINT `fk_pakaian_tipe1` FOREIGN KEY (`tipe_pakaian_id`) REFERENCES `tipe_pakaian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `fk_pesanan1` FOREIGN KEY (`pakaian_id`) REFERENCES `pakaian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
