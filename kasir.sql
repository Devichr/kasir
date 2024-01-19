-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jan 2024 pada 06.29
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailpesanan`
--

CREATE TABLE `detailpesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` tinyint(2) NOT NULL,
  `Harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detailpesanan`
--

INSERT INTO `detailpesanan` (`id_pesanan`, `id_produk`, `qty`, `Harga`) VALUES
(7, 5, 2, 120000),
(7, 6, 1, 20000),
(7, 4, 1, 100000),
(8, 3, 2, 140000),
(8, 6, 1, 20000),
(8, 9, 1, 15000),
(8, 8, 1, 10000),
(8, 4, 1, 100000),
(8, 1, 1, 50000),
(8, 5, 1, 60000),
(8, 2, 1, 25000),
(8, 7, 1, 35000),
(9, 4, 1, 100000),
(9, 5, 1, 60000),
(10, 4, 2, 200000),
(10, 5, 1, 60000),
(11, 4, 1, 100000),
(11, 6, 2, 40000),
(12, 4, 1, 100000),
(13, 5, 1, 60000),
(13, 6, 1, 20000),
(17, 3, 1, 70000),
(17, 4, 1, 100000),
(18, 5, 1, 60000),
(19, 5, 1, 60000),
(20, 3, 1, 70000),
(21, 4, 1, 100000),
(21, 5, 1, 60000),
(22, 6, 1, 20000),
(22, 4, 1, 100000),
(23, 3, 1, 70000),
(23, 6, 1, 20000),
(24, 5, 1, 60000),
(24, 4, 1, 100000),
(25, 5, 1, 60000),
(25, 3, 1, 70000),
(26, 5, 1, 60000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `tanggal_pesanan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `tanggal_pesanan`) VALUES
(1, '2024-01-09 00:00:00'),
(2, '2024-01-09 10:01:00'),
(3, '2024-01-09 04:01:21'),
(4, '2024-01-09 04:01:50'),
(5, '2024-01-09 04:01:52'),
(6, '2024-01-10 04:01:20'),
(7, '2024-01-10 04:01:38'),
(8, '2024-01-10 04:01:42'),
(9, '2024-01-10 05:01:28'),
(10, '2024-01-10 05:01:48'),
(11, '2024-01-11 09:01:06'),
(12, '2024-01-11 09:01:09'),
(13, '2024-01-11 09:01:07'),
(14, '2024-01-11 05:01:21'),
(15, '2024-01-11 05:01:30'),
(16, '2024-01-11 05:01:00'),
(17, '2024-01-12 08:01:20'),
(18, '2024-01-12 08:01:07'),
(19, '2024-01-12 09:01:07'),
(20, '2024-01-12 09:01:59'),
(21, '2024-01-12 09:01:01'),
(22, '2024-01-12 12:01:34'),
(23, '2024-01-12 12:01:24'),
(24, '2024-01-12 12:01:16'),
(25, '2024-01-12 12:01:25'),
(26, '2024-01-12 05:01:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `gambar` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `stok_produk`, `gambar`) VALUES
(1, 'Tas', 50000, 10, 'tas.png'),
(2, 'Dompet', 25000, 25, 'dompet.png'),
(3, 'Kemeja', 70000, 20, 'kemeja.png'),
(4, 'Jaket', 100000, 10, 'jaket.png'),
(5, 'Blazer', 60000, 16, 'blazer.png'),
(6, 'Kaos', 20000, 21, 'kaos.png'),
(7, 'Slingbag', 35000, 18, 'slingbag.png'),
(8, 'Kaos Kaki', 10000, 25, 'kaos kaki.png'),
(9, 'Sabuk', 15000, 21, 'sabuk.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detailpesanan`
--
ALTER TABLE `detailpesanan`
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detailpesanan`
--
ALTER TABLE `detailpesanan`
  ADD CONSTRAINT `detailpesanan_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detailpesanan_ibfk_2` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
