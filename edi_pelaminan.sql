-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 26, 2022 at 12:02 PM
-- Server version: 5.7.19
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edi_pelaminan`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_penyewaan`
--

CREATE TABLE `detail_penyewaan` (
  `id` int(11) NOT NULL,
  `id_penyewaan` int(11) NOT NULL,
  `id_perlengkapan_pesta` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` double NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `level_user`
--

CREATE TABLE `level_user` (
  `id` int(1) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_user`
--

INSERT INTO `level_user` (`id`, `level`) VALUES
(1, 'Admin'),
(2, 'Operator'),
(3, 'Pimpinan');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `tanggal_dp` date DEFAULT NULL,
  `tanggal_lunas` date DEFAULT NULL,
  `id_penyewaan` int(11) NOT NULL,
  `dp` double NOT NULL,
  `denda` double DEFAULT '0',
  `ket_denda` varchar(255) DEFAULT NULL,
  `total_pembayaran_sewa` double NOT NULL,
  `status` int(11) NOT NULL COMMENT '1= Belum Bayar.\r\n2= Menunggu Konfirmasi.\r\n3= dikonfirmasi/ Sudah Bayar dp / belum lunas.\r\n4= Lunas.\r\n5= ditolak.\r\n6= Batal ',
  `bukti_pembayaran` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penyewa`
--

CREATE TABLE `penyewa` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penyewaan`
--

CREATE TABLE `penyewaan` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `id_penyewa` int(11) NOT NULL,
  `tipe_sewa` int(11) NOT NULL COMMENT '1 = Sewa tidak online\r\n2 = Sewa Online',
  `status_sewa` int(11) NOT NULL COMMENT '1= Sedang Disewa.\r\n2 = Sudah dikembalikan / Selesai sewa.\r\n3 = Belum Bayar.\r\n4 = Batal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perlengkapan_pesta`
--

CREATE TABLE `perlengkapan_pesta` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perlengkapan_pesta`
--

INSERT INTO `perlengkapan_pesta` (`id`, `nama`, `jenis`, `harga`, `stok`, `foto`) VALUES
(1, 'Pelaminan', 1, 2000000, 1, '1644130110_496a8e337751a7a644cd.jpg'),
(2, 'Baju Adat couple warna merah', 2, 600000, 2, '1659455329_6e53b98c1ee2e798067a.jpg'),
(3, 'Baju Adat couple warna  dongker', 2, 600000, 2, '1659456279_a3d730ee5e80f557a9be.jpeg'),
(4, 'Tenda Pelaminan', 1, 1000000, 2, '1644130205_22850fb8b221217af650.jpg'),
(5, 'Baju Koto', 2, 500000, 3, '1659456209_a25bf669460a5469054f.jpeg'),
(7, 'Baju Kebaya', 2, 400000, 3, '1659456485_3560ce22078fe35564f3.jpg'),
(8, 'Gelas', 1, 500, 1000, '1659758856_ca44a079e95555bde726.jpg'),
(9, 'kursi', 1, 1000, 100, '1659760361_94017eae92c7251e81d2.jpg'),
(10, 'Kursi Plastik', 1, 500, 500, '1659760543_1a18bbf6fff6bb5de073.jpg'),
(11, 'Kelambu Pengantin', 1, 700000, 3, '1660539864_a27ff44169518ae745a3.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `temp_penyewaan`
--

CREATE TABLE `temp_penyewaan` (
  `id` int(11) NOT NULL,
  `id_penyewa` int(11) NOT NULL,
  `id_perlengkapan` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` double NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uang_keluar`
--

CREATE TABLE `uang_keluar` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` double NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_user`, `username`, `password`, `level`) VALUES
(2, 'Vira', 'vira', '$2y$10$gRpkb/zArM.IsSNXGpaHMOlHx0oPkbDfKai7KNSlslY7S5knzPIbK', 1),
(3, 'sidiq', 'sidiq', '$2y$10$y5gT5LFkrKhq5bcci0.SXO94HzM/9sNrcxpGehCtAzWnE9uKRkpyi', 2),
(4, 'Edi Sitohang', 'edi', '$2y$10$cDHLcF7g70dUf3S1AoDcmetayJA62LMPs/Awftga5NSGjASQUlKkW', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_penyewaan`
--
ALTER TABLE `detail_penyewaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_user`
--
ALTER TABLE `level_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyewa`
--
ALTER TABLE `penyewa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perlengkapan_pesta`
--
ALTER TABLE `perlengkapan_pesta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_penyewaan`
--
ALTER TABLE `temp_penyewaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uang_keluar`
--
ALTER TABLE `uang_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_penyewaan`
--
ALTER TABLE `detail_penyewaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penyewa`
--
ALTER TABLE `penyewa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penyewaan`
--
ALTER TABLE `penyewaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perlengkapan_pesta`
--
ALTER TABLE `perlengkapan_pesta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `temp_penyewaan`
--
ALTER TABLE `temp_penyewaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uang_keluar`
--
ALTER TABLE `uang_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
