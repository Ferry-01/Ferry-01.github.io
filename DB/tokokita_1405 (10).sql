-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2022 at 03:55 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokokita_1405`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `idAdmin` int(2) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`idAdmin`, `userName`, `password`, `role_id`) VALUES
(1, 'admin', '12345', 1),
(2, 'kacang', 'telur', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_biaya_kirim`
--

CREATE TABLE `tbl_biaya_kirim` (
  `idBiayaKirim` int(5) NOT NULL,
  `idKurir` int(3) NOT NULL,
  `idKotaAsal` int(4) NOT NULL,
  `idKotaTujuan` int(4) NOT NULL,
  `biaya` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_biaya_kirim`
--

INSERT INTO `tbl_biaya_kirim` (`idBiayaKirim`, `idKurir`, `idKotaAsal`, `idKotaTujuan`, `biaya`) VALUES
(21, 1, 2, 6, 10000),
(24, 3, 2, 1, 15000),
(25, 2, 2, 6, 17000),
(26, 2, 2, 1, 15000),
(27, 3, 1, 6, 20000),
(28, 3, 6, 1, 10000),
(29, 1, 1, 2, 30000),
(30, 1, 1, 12, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_order`
--

CREATE TABLE `tbl_detail_order` (
  `idDetailOrder` int(10) NOT NULL,
  `idOrder` int(5) NOT NULL,
  `idProduk` int(5) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_detail_order`
--

INSERT INTO `tbl_detail_order` (`idDetailOrder`, `idOrder`, `idProduk`, `jumlah`, `harga`) VALUES
(6, 7, 18, 1, 7250000),
(7, 8, 21, 1, 1800000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `idKat` int(5) NOT NULL,
  `namaKat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`idKat`, `namaKat`) VALUES
(1, 'Baju'),
(5, 'Celana'),
(7, 'Jaket'),
(8, 'pakaian'),
(14, 'Hardware');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_konfirmasi`
--

CREATE TABLE `tbl_konfirmasi` (
  `idKonfirmasi` int(5) NOT NULL,
  `idOrder` int(5) NOT NULL,
  `buktiTransfer` varchar(100) NOT NULL,
  `validasi` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kota`
--

CREATE TABLE `tbl_kota` (
  `idKota` int(4) NOT NULL,
  `namaKota` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kota`
--

INSERT INTO `tbl_kota` (`idKota`, `namaKota`) VALUES
(1, 'Yogyakarata'),
(2, 'Ngawi'),
(6, 'Madiun'),
(12, 'Sleman');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kurir`
--

CREATE TABLE `tbl_kurir` (
  `idKurir` int(2) NOT NULL,
  `namaKurir` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kurir`
--

INSERT INTO `tbl_kurir` (`idKurir`, `namaKurir`) VALUES
(1, 'JNE'),
(2, 'JNT'),
(3, 'Si Cepat');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `idKonsumen` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `namaKonsumen` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `idKota` int(4) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tlpn` int(20) NOT NULL,
  `statusAktif` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`idKonsumen`, `username`, `password`, `namaKonsumen`, `alamat`, `idKota`, `email`, `tlpn`, `statusAktif`) VALUES
(2, 'Ferry', 'password', 'Ferry', 'Ngawi', 2, 'ferry@gmail.com', 833333333, 'Y'),
(3, 'Malika', '87654321', 'Malika', 'Yogyakarta', 1, 'malika@gmail.com', 833333334, 'Y'),
(4, 'Budi', '87654321', 'Budianto', 'Ngawi', 6, 'budianto@gmail.com', 2147483647, 'Y'),
(5, 'fakhruddin', '12345678', 'Fakhruddin', 'Madiun', 6, 'fakhruddin@gmail.com', 2147483647, 'Y'),
(10, 'Yunus', 'password', 'Yunus', 'Madiun', 6, 'yunus@gmail.com', 2147483647, 'Y'),
(11, 'User', 'password', 'User', 'Ngawi', 2, 'user@gmail.com', 2147483647, 'Y'),
(12, 'ian', 'password', 'Rahadian', 'Purworejo', 12, 'raha@gmail.com', 2147483647, 'Y'),
(13, 'magangyuks@gmail.com', 'password', 'Magang', 'amfdsmkf', 1, 'magangyuks@gmail.com', 29891203, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `idOrder` int(5) NOT NULL,
  `idKonsumen` int(5) NOT NULL,
  `idToko` int(10) NOT NULL,
  `tglOrder` date NOT NULL,
  `statusOrder` enum('Belum Bayar','Dikemas','Dikirim','Diterima','Selesai','Dibatalkan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`idOrder`, `idKonsumen`, `idToko`, `tglOrder`, `statusOrder`) VALUES
(7, 3, 4, '2021-07-10', 'Belum Bayar'),
(8, 10, 4, '2021-07-11', 'Belum Bayar');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `idProduk` int(5) NOT NULL,
  `idKat` int(5) NOT NULL,
  `idToko` int(5) NOT NULL,
  `namProduk` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `harga` int(10) NOT NULL,
  `stok` int(5) NOT NULL,
  `berat` int(5) NOT NULL,
  `deskripsiProduk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`idProduk`, `idKat`, `idToko`, `namProduk`, `foto`, `harga`, `stok`, `berat`, `deskripsiProduk`) VALUES
(12, 1, 4, 'Baju Muslim Pria', 'Baju_Muslim_Pria8.jpg', 80000, 10, 500, 'Baju Muslim Pria'),
(13, 7, 4, 'Jaket Pria', 'Jaket_Pria1.jpg', 60000, 5, 400, 'Jaket yang cocok untuk berolahraga'),
(15, 8, 4, 'Pakaian Muslim', 'Jubah_Gamis_Pria2.jpg', 160000, 5, 400, 'Pakaian Muslim'),
(17, 14, 4, 'Vga RTX 3060 TI', 'Vga.jpg', 20000000, 3, 3000, 'Vga RTX 3060 TI'),
(18, 14, 4, 'Procesor AMD Ryzen 7 5800X ', 'procie.jpg', 7250000, 3, 100, 'Procesor AMD Ryzen 7 5800X '),
(20, 5, 4, 'Celana ', 'Celana_coklak2.jpg', 140000, 5, 600, 'Celana Coklat'),
(21, 14, 4, 'Gigabyte B550M', 'mobo1.jpg', 1800000, 4, 500, 'Garansi resmi NJT\r\nSPECIFICATION:\r\n\r\n    CPU\r\n        AMD Socket AM4, support for: 3rd Generation AMD Ryzen™ processors/ New Generation AMD Ryzen™ with Radeon™ Graphics processors\r\n    (Please refer \"CPU Support List\" for more information.)\r\n    Chipset\r\n        AMD B550\r\n    Memory\r\n        4 x DDR4 DIMM sockets supporting up to 128 GB (32 GB single DIMM capacity) of system memory\r\n        3rd Gen AMD Ryzen™ Processors:\r\n        Support for DDR4 4000(O.C.) / 3600(O.C.) / 3333(O.C.) /3200/2933/2667/2400/2133 MHz memory modules\r\n        New Generation AMD Ryzen™ with Radeon™ Graphics processors:\r\n        Support for DDR4 4733(O.C.) / 4600(O.C.) / 4400(O.C.) / 4000(O.C.) / 3600(O.C.) / 3333(O.C.) /3200/2933/2667/2400/2133 MHz memory modules\r\n        Dual channel memory architecture\r\n        Support for ECC Un-buffered DIMM 1Rx8/2Rx8 memory modules\r\n        Support for non-ECC Un-buffered DIMM 1Rx8/2Rx8/1Rx16 memory modules\r\n        Support for Extreme Memory Profile (XMP) memory modules\r\n    (Please refer \"Memory Support List\" for more information.)\r\n    Onboard Graphics\r\n    Integrated in the New Generation AMD Ryzen™ with Radeon™ Graphics processors:\r\n        1 x HDMI port, supporting a maximum resolution of 4096x2160@60 Hz\r\n        * Support for HDMI 2.1 version, HDCP 2.3, and HDR.\r\n        1 x DisplayPort, supporting a maximum resolution of 5120x2880@60 Hz\r\n        * Support for DisplayPort 1.4 version, HDCP 2.3, and HDR.\r\n    Maximum shared memory of 16 GB\r\n    Audio\r\n        Realtek® ALC1200 codec\r\n        High Definition Audio\r\n        2/4/5.1/7.1-channel\r\n        Support for S/PDIF Out'),
(23, 5, 6, 'Celana Coklat', 'Celana_coklak7.jpg', 60000, 5, 500, 'Celana Coklat'),
(24, 14, 7, 'PNY VGA GeForce RTX 3060 Ti 8GB UPRISING Kipas Gan', 'RTX_3060_TI.jpg', 12450000, 3, 3500, 'GeForce RTX™ 3060 Ti memungkinkan Anda memainkan game terbaru menggunakan kekuatan Ampere—arsitektur RTX generasi ke-2 NVIDIA. Dapatkan performa luar biasa dengan Ray Tracing Cores dan Tensor Cores yang disempurnakan, multiprosesor streaming baru, dan memori G6 berkecepatan tinggi.\r\n\r\nArsitektur NVIDIA Ampere yang serba baru menampilkan Ray Tracing Cores generasi ke-2 dan Tensor Cores generasi ke-3 dengan throughput yang lebih besar. Multiprosesor streaming NVIDIA Ampere adalah blok pembangun untuk GPU tercepat dan paling efisien di dunia untuk para gamer dan kreator. GPU GeForce RTX™ 30 Series ditenagai oleh arsitektur RTX generasi ke-2 NVIDIA, menghadirkan kinerja terbaik, grafik ray-traced, dan akselerasi AI untuk para gamer dan kreator.\r\n\r\nNOTE: FREE PSU INNOVATION 500WATT 80+GOLD\r\n\r\nSpesifikasi Produk\r\nNomor Bagian PNY VCG3060T8DFMPB\r\nKode UPC 751492640570\r\nInti CUDA 4864\r\nKecepatan jam 1410 MHz\r\nTingkatkan Kecepatan 1665 MHz\r\nKecepatan Memori (Gbps) 14\r\nUkuran memori 8GB GDDR6\r\nAntarmuka Memori 256-bit\r\nBandwidth Memori (GB/dtk) 448\r\nTDP 200 W\r\nNVLink Tidak didukung\r\nKeluaran DisplayPort 1.4 (x3), HDMI 2.1\r\nBanyak layar 4\r\nResolusi 7680 × 4320 @60Hz (Digital)\r\nInput daya Satu 8-Pin\r\nJenis Bus PCI-Express 4.0 × 16\r\nDimensi Kartu 9,88\" x 4,41\" x 1,65\"; Slot Ganda\r\nDimensi Kotak 12,6\" x 6,69\" x 3,54\"\r\nWARANTY 3 TAHUN BY INNOVATION\r\n\r\nFITUR UTAMA\r\n\r\n2nd Gen Ray Tracing Cores\r\nCore Tensor Generasi ke-3\r\nPCI Express® Gen 4\r\nMicrosoft DirectX ® 12 Ultimate\r\nMemori Grafis GDDR6\r\nNVIDIA DLSS\r\nNVIDIA ® GeForce Experience ™\r\nNVIDIA G-SYNC ®\r\nNVIDIA GPU Boost™\r\nDriver Siap Game\r\nVulkan RT API, OpenGL 4.6\r\nHDCP 2.3\r\nSiap VR\r\nMendukung 4k 120Hz HDR, 8K 60Hz HDR dan Variable Refresh Rate seperti yang ditentukan dalam HDMI 2.1\r\n\r\nPERSYARATAN SISTEM MINIMUM\r\nMotherboard yang sesuai dengan PCI Express dengan satu slot grafis x16 lebar ganda\r\nSatu konektor daya tambahan 8-pin\r\n650 W atau catu daya sistem yang lebih besar\r\nMicrosoft Windows ® 10 (November 2018 atau lebih baru), Windows 7 64-bit, Linux 64-bit\r\nKoneksi internet 1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_saldo`
--

CREATE TABLE `tbl_saldo` (
  `idSaldo` int(5) NOT NULL,
  `idToko` int(5) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_toko`
--

CREATE TABLE `tbl_toko` (
  `idToko` int(5) NOT NULL,
  `idKonsumen` int(5) NOT NULL,
  `namaToko` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `statusAktif` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_toko`
--

INSERT INTO `tbl_toko` (`idToko`, `idKonsumen`, `namaToko`, `logo`, `deskripsi`, `statusAktif`) VALUES
(4, 2, 'Toko Bagus', '0_0.PNG', 'Toko', 'Y'),
(5, 2, 'kacang', '448.PNG', '123', 'Y'),
(6, 10, 'Toko Saya', '0_01.PNG', 'Toko Milik Kita', 'Y'),
(7, 11, 'Hardware Store', '9978.PNG', 'Menjual berbagai Hardware Komputer', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `idWishlist` int(5) NOT NULL,
  `idKonsumen` int(2) NOT NULL,
  `idProduk` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`idWishlist`, `idKonsumen`, `idProduk`) VALUES
(16, 10, 24);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `tbl_biaya_kirim`
--
ALTER TABLE `tbl_biaya_kirim`
  ADD PRIMARY KEY (`idBiayaKirim`),
  ADD KEY `idKurir` (`idKurir`),
  ADD KEY `idKotaAsal` (`idKotaAsal`),
  ADD KEY `idKotaTujuan` (`idKotaTujuan`);

--
-- Indexes for table `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  ADD PRIMARY KEY (`idDetailOrder`),
  ADD KEY `idProduk` (`idProduk`),
  ADD KEY `idOrder` (`idOrder`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`idKat`);

--
-- Indexes for table `tbl_konfirmasi`
--
ALTER TABLE `tbl_konfirmasi`
  ADD PRIMARY KEY (`idKonfirmasi`),
  ADD KEY `idOrder` (`idOrder`);

--
-- Indexes for table `tbl_kota`
--
ALTER TABLE `tbl_kota`
  ADD PRIMARY KEY (`idKota`);

--
-- Indexes for table `tbl_kurir`
--
ALTER TABLE `tbl_kurir`
  ADD PRIMARY KEY (`idKurir`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`idKonsumen`),
  ADD KEY `idKota` (`idKota`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`idOrder`),
  ADD KEY `idKonsumen` (`idKonsumen`),
  ADD KEY `idToko` (`idToko`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`idProduk`),
  ADD KEY `idToko` (`idToko`),
  ADD KEY `idKat` (`idKat`);

--
-- Indexes for table `tbl_saldo`
--
ALTER TABLE `tbl_saldo`
  ADD PRIMARY KEY (`idSaldo`),
  ADD KEY `idToko` (`idToko`);

--
-- Indexes for table `tbl_toko`
--
ALTER TABLE `tbl_toko`
  ADD PRIMARY KEY (`idToko`),
  ADD KEY `idKonsumen` (`idKonsumen`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`idWishlist`),
  ADD KEY `idKonsumen` (`idKonsumen`),
  ADD KEY `idProduk` (`idProduk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `idAdmin` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_biaya_kirim`
--
ALTER TABLE `tbl_biaya_kirim`
  MODIFY `idBiayaKirim` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  MODIFY `idDetailOrder` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `idKat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_konfirmasi`
--
ALTER TABLE `tbl_konfirmasi`
  MODIFY `idKonfirmasi` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_kota`
--
ALTER TABLE `tbl_kota`
  MODIFY `idKota` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_kurir`
--
ALTER TABLE `tbl_kurir`
  MODIFY `idKurir` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `idKonsumen` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `idOrder` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `idProduk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_saldo`
--
ALTER TABLE `tbl_saldo`
  MODIFY `idSaldo` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_toko`
--
ALTER TABLE `tbl_toko`
  MODIFY `idToko` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `idWishlist` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_biaya_kirim`
--
ALTER TABLE `tbl_biaya_kirim`
  ADD CONSTRAINT `tbl_biaya_kirim_ibfk_1` FOREIGN KEY (`idKurir`) REFERENCES `tbl_kurir` (`idKurir`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_biaya_kirim_ibfk_2` FOREIGN KEY (`idKotaAsal`) REFERENCES `tbl_kota` (`idKota`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_biaya_kirim_ibfk_3` FOREIGN KEY (`idKotaTujuan`) REFERENCES `tbl_kota` (`idKota`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  ADD CONSTRAINT `tbl_detail_order_ibfk_1` FOREIGN KEY (`idOrder`) REFERENCES `tbl_order` (`idOrder`),
  ADD CONSTRAINT `tbl_detail_order_ibfk_2` FOREIGN KEY (`idProduk`) REFERENCES `tbl_produk` (`idProduk`),
  ADD CONSTRAINT `tbl_detail_order_ibfk_3` FOREIGN KEY (`idOrder`) REFERENCES `tbl_order` (`idOrder`);

--
-- Constraints for table `tbl_konfirmasi`
--
ALTER TABLE `tbl_konfirmasi`
  ADD CONSTRAINT `tbl_konfirmasi_ibfk_1` FOREIGN KEY (`idOrder`) REFERENCES `tbl_order` (`idOrder`);

--
-- Constraints for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD CONSTRAINT `tbl_member_ibfk_1` FOREIGN KEY (`idKota`) REFERENCES `tbl_kota` (`idKota`);

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`idKonsumen`) REFERENCES `tbl_member` (`idKonsumen`),
  ADD CONSTRAINT `tbl_order_ibfk_2` FOREIGN KEY (`idToko`) REFERENCES `tbl_toko` (`idToko`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD CONSTRAINT `tbl_produk_ibfk_3` FOREIGN KEY (`idKat`) REFERENCES `tbl_kategori` (`idKat`),
  ADD CONSTRAINT `tbl_produk_ibfk_4` FOREIGN KEY (`idToko`) REFERENCES `tbl_toko` (`idToko`);

--
-- Constraints for table `tbl_saldo`
--
ALTER TABLE `tbl_saldo`
  ADD CONSTRAINT `tbl_saldo_ibfk_1` FOREIGN KEY (`idToko`) REFERENCES `tbl_toko` (`idToko`);

--
-- Constraints for table `tbl_toko`
--
ALTER TABLE `tbl_toko`
  ADD CONSTRAINT `tbl_toko_ibfk_1` FOREIGN KEY (`idKonsumen`) REFERENCES `tbl_member` (`idKonsumen`);

--
-- Constraints for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD CONSTRAINT `tbl_wishlist_ibfk_1` FOREIGN KEY (`idProduk`) REFERENCES `tbl_produk` (`idProduk`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_wishlist_ibfk_2` FOREIGN KEY (`idKonsumen`) REFERENCES `tbl_member` (`idKonsumen`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
