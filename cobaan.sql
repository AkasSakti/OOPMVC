-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 04, 2024 at 05:50 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cobaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `stok` int NOT NULL,
  `harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `stok`, `harga`) VALUES
(1, 'Sapu', 15, '15000.00'),
(2, 'lem', 100, '2500.00'),
(3, 'buku', 12, '10000.00');

-- --------------------------------------------------------

--
-- Table structure for table `pemakai`
--

CREATE TABLE `pemakai` (
  `id_user` int NOT NULL,
  `nim` varchar(30) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pemakai`
--

INSERT INTO `pemakai` (`id_user`, `nim`, `password`, `nama`, `email`, `foto`) VALUES
(1, '30109156', '$2y$10$ZtLckvqmMydni/5JfeFiv.1KRnyv63Tv4eTNSNiIvvJFVqSIAgGUG', 'Akas Bagus setiawan', 'akas.setiawan@gmail.com', 'uploads/profile/1730291256_67222638071ac.png'),
(3, '30109157', '$2y$10$EPgkBW7wh3ZB47woQtjBSegpynS42f2mOK8HFh7uiDSEuM8wXxXDu', 'Mulyono', 'aniani@gmail.com', NULL),
(4, '30109158', '$2y$10$PSdd/gwjl/soEjmc4bqOQe1V2zow0NtBD2e9.AD.Pyh.J29.dri5O', 'Meilina bejo', 'toni@gmail.com', ''),
(5, '30109159', '$2y$10$QcDGy/nfONz1vFwxEVRuueXeCuoT5dDVRThzdRSZjLEEIQy8VoSsa', 'Widyani ', 'admin@gmail.com', NULL),
(7, '123456', '$2y$10$RSkzZyE.3nweUIu6J3wkFOJ.zIhrluSeua2j388MAJ5mSGx70vEhi', 'akas', 'akas@gmail.com', NULL),
(8, '35071346', '$2y$10$6Gt/XCKI4J09leX8G5i88.wYHK.fE1lMN./5EsDBR2lTdyhAVrgwu', 'jono', 'akas@gmail.com', NULL),
(9, '35071346', '$2y$10$kNI512eNAYXHrNx4mv1T3u.b2pGK0t6n90udrors9m.VZfUYMmo2.', 'jono', 'akas@gmail.com', NULL),
(10, '30109161', '$2y$10$31G8N.xA3jjIaVd/UC1pPuxvbTx4c7eEhypjDsAPljuBawc.L2uVO', 'andik', 'admin@gmail.com', NULL),
(21, '939339', '$2y$10$qAe/759yCeu6gf7oXBD50Oi3wO75UExCQqdbrnldYr29EJdL/NxDO', 'adss', 'akas@gmail.com', ''),
(22, '13245987', '$2y$10$kLvPXPCGWYPVKX0c5A62c.iA3n.vPXiLnCjJKyhq0u8Q24G6m5w7e', 'ioio', 'aniani@gmail.com', ''),
(23, '788788', '$2y$10$FwNFfOgDswyjtGTdk2gQQ.MC5PQ93n7Y3CExTzDQ0XN/GIFDDgT7m', 'Meilina', 'aniani@gmail.com', ''),
(24, '898989898', '$2y$10$MHf8minUfNiSu/PF03cKHOnZv67xcWQXOkPQnjKJ6ZdhX7ZLKg.Yi', 'Meilina', 'akas@gmail.com', ''),
(25, '636363', 'jdjjd', 'j', 'aniani@gmail.com', ''),
(29, '12213124324', '$2y$10$TnPMYPPB/r3Kwt1grpznMu66Yx.qChf5k7PExYF.jvpFHJL91jc3m', 'budi anto', 'aniani@gmail.com', 'uploads/profile/1730701576_672869086948d.png');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int NOT NULL,
  `barang_id` int NOT NULL,
  `jumlah` int NOT NULL,
  `total_harga` decimal(10,2) NOT NULL,
  `tanggal_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `barang_id`, `jumlah`, `total_harga`, `tanggal_transaksi`) VALUES
(1, 1, 5, '1250000.00', '2024-11-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemakai`
--
ALTER TABLE `pemakai`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pemakai`
--
ALTER TABLE `pemakai`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
