-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Apr 2024 pada 16.24
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbapplestore`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `appleproduct`
--

CREATE TABLE `appleproduct` (
  `id` int(11) NOT NULL,
  `product_name` varchar(70) NOT NULL,
  `product_type` varchar(50) NOT NULL,
  `code` varchar(20) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `appleproduct`
--

INSERT INTO `appleproduct` (`id`, `product_name`, `product_type`, `code`, `price`, `image`) VALUES
(15, 'Iphone 15', 'Handphone', 'hp01', 14249000, '662e54079c924.jpeg'),
(17, 'Macbook Pro M2', 'Laptop', 'laptop01', 15499000, '662e5432f3647.jpg'),
(18, 'Ipad Pro 12.9 Inch 5TH Gen', 'Ipad', 'ipad01', 10900000, '662e5457c5ebb.jpg'),
(19, 'Apple Watch Series 9', 'Smart Watch', 'watch01', 6999000, '662e547aeb56e.jpeg'),
(20, 'Airpods Pro 2nd Gen', 'Airpods', 'airpods01', 3082000, '662e548d10e07.png'),
(21, 'Apple Vision Pro', 'Vision', 'vision01', 57999000, '662e54a721988.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `appleproduct`
--
ALTER TABLE `appleproduct`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `appleproduct`
--
ALTER TABLE `appleproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
