-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2024 at 01:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sagara_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_import_excel`
--

CREATE TABLE `data_import_excel` (
  `PC` varchar(50) NOT NULL,
  `TRX_Ref_ID` varchar(255) NOT NULL,
  `Tanggal_TRX` varchar(100) NOT NULL,
  `Produk` varchar(100) NOT NULL,
  `Qty` varchar(100) NOT NULL,
  `No_Tujuan` varchar(100) NOT NULL,
  `Kode_Reseller` varchar(100) NOT NULL,
  `Reseller` varchar(255) NOT NULL,
  `Modul` varchar(100) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Tgl_Status` varchar(100) NOT NULL,
  `Nama_Supp` varchar(255) NOT NULL,
  `HB_Stock_Supp` varchar(255) NOT NULL,
  `H_Beli` varchar(255) NOT NULL,
  `H_Jual` varchar(255) NOT NULL,
  `Komisi` varchar(255) NOT NULL,
  `Laba` varchar(255) NOT NULL,
  `Poin` varchar(100) NOT NULL,
  `Reply_Provider` varchar(255) NOT NULL,
  `SN` varchar(255) NOT NULL,
  `Ref_id` varchar(255) NOT NULL,
  `Rate_TP` varchar(255) NOT NULL,
  `Rate` varchar(255) NOT NULL,
  `Shell` varchar(255) NOT NULL,
  `HBFIX` varchar(255) NOT NULL,
  `NOTES` varchar(255) NOT NULL,
  `K_Provider` varchar(100) NOT NULL,
  `Provider` varchar(100) NOT NULL,
  `K_Produk` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_import_excel_file`
--

CREATE TABLE `data_import_excel_file` (
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_import`
--

CREATE TABLE `failed_import` (
  `id` int(11) NOT NULL,
  `total_baris` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` varchar(255) NOT NULL,
  `name` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `purchasing_price` decimal(10,0) NOT NULL,
  `selling_price` decimal(10,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `quantity`, `purchasing_price`, `selling_price`, `created_at`, `updated_at`) VALUES
('08162dd8-351a-11ef-897a-04d4c479177e', 'MONITOR SAMSUNG', 8, 1500000, 2000000, '2024-06-27 23:45:39', '2024-06-28 00:30:39'),
('ce89efae-351a-11ef-97f4-04d4c479177e', 'Mouse', 5, 200000, 230000, '2024-06-27 23:51:12', '2024-06-27 23:51:12'),
('cea7e112-351a-11ef-9596-04d4c479177e', 'Keyboard', 5, 120000, 150000, '2024-06-27 23:51:12', '2024-06-27 23:51:12');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` varchar(255) NOT NULL,
  `name` varchar(200) NOT NULL,
  `base_price` decimal(10,0) NOT NULL,
  `selling_price` decimal(10,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `base_price`, `selling_price`, `created_at`, `updated_at`) VALUES
('b37596f0-351a-11ef-a1be-04d4c479177e', 'JNE', 10000, 18000, '2024-06-27 23:50:26', '2024-06-27 23:50:26'),
('b37ac49a-351a-11ef-a8ae-04d4c479177e', 'SiCepat', 12000, 15000, '2024-06-27 23:50:26', '2024-06-27 23:50:26');

-- --------------------------------------------------------

--
-- Table structure for table `success_import`
--

CREATE TABLE `success_import` (
  `id` int(11) NOT NULL,
  `total_baris` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `created_at`, `updated_at`, `deleted_at`) VALUES
('f99d4058-3518-11ef-95e2-04d4c479177e', '2024-06-27 23:38:05', '2024-06-27 23:38:05', NULL),
('f99d4058-3518-11ef-95e2-04d4c479177e', '2024-06-27 23:38:22', '2024-06-27 23:38:22', NULL),
('f99d4058-3518-11ef-95e2-04d4c479177e', '2024-06-27 23:45:05', '2024-06-27 23:45:05', '2024-06-27 23:45:05'),
('08162dd8-351a-11ef-897a-04d4c479177e', '2024-06-27 23:45:39', '2024-06-27 23:45:39', NULL),
('643fddd4-351a-11ef-bb40-04d4c479177e', '2024-06-27 23:48:13', '2024-06-27 23:48:13', NULL),
('643fddd4-351a-11ef-bb40-04d4c479177e', '2024-06-27 23:48:34', '2024-06-27 23:48:34', NULL),
('643fddd4-351a-11ef-bb40-04d4c479177e', '2024-06-27 23:49:53', '2024-06-27 23:49:53', '2024-06-27 23:49:53'),
('b37596f0-351a-11ef-a1be-04d4c479177e', '2024-06-27 23:50:26', '2024-06-27 23:50:26', NULL),
('b37ac49a-351a-11ef-a8ae-04d4c479177e', '2024-06-27 23:50:26', '2024-06-27 23:50:26', NULL),
('ce89efae-351a-11ef-97f4-04d4c479177e', '2024-06-27 23:51:12', '2024-06-27 23:51:12', NULL),
('cea7e112-351a-11ef-9596-04d4c479177e', '2024-06-27 23:51:12', '2024-06-27 23:51:12', NULL),
('518ffc90-3520-11ef-b946-04d4c479177e', '2024-06-28 00:30:39', '2024-06-28 00:30:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` varchar(255) NOT NULL,
  `products_id` varchar(255) NOT NULL,
  `services_id` varchar(255) NOT NULL,
  `quantity_buy` int(11) NOT NULL,
  `paid_price` decimal(10,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `products_id`, `services_id`, `quantity_buy`, `paid_price`, `created_at`, `updated_at`) VALUES
('518ffc90-3520-11ef-b946-04d4c479177e', '08162dd8-351a-11ef-897a-04d4c479177e', 'b37596f0-351a-11ef-a1be-04d4c479177e', 2, 5000000, '2024-06-28 00:30:39', '2024-06-28 00:30:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `password_nohidden` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `password_nohidden`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '1111111', '$2y$12$cZgkEt6qIi6ByZyTSduif./v/ecdx79Zq.x.ztu9eCvrdUvxTOMPW', '1234', '2024-06-28 02:17:01', '2024-06-28 02:17:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_import`
--
ALTER TABLE `failed_import`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `success_import`
--
ALTER TABLE `success_import`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_import`
--
ALTER TABLE `failed_import`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `success_import`
--
ALTER TABLE `success_import`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
