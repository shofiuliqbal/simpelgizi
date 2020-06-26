-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2016 at 04:13 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simgizi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bahan`
--

CREATE TABLE `tb_bahan` (
  `id_bahan` int(11) NOT NULL,
  `jenis` enum('basah','kering','','') NOT NULL,
  `nama` varchar(100) NOT NULL,
  `persediaan` float NOT NULL,
  `satuan` varchar(25) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `tb_bahan`:
--

--
-- Dumping data for table `tb_bahan`
--

INSERT INTO `tb_bahan` (`id_bahan`, `jenis`, `nama`, `persediaan`, `satuan`, `harga`) VALUES
(3, 'basah', 'Beras', 20, 'kg', 12000),
(6, 'basah', 'Kacang', 62.6, 'g', 2000),
(7, 'kering', 'Beras Merah', 25.5, 'liter', 10000),
(8, 'basah', 'Minyak Zaitun', 49.6, 'liter', 10000),
(9, 'kering', 'Kacang Panjang', 25.8, 'ikat', 3000),
(10, 'basah', 'Tempe', 8.1, 'buah', 2000),
(11, 'basah', 'Tahu', 19.8, 'buah', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_detailbahan`
--

CREATE TABLE `tb_detailbahan` (
  `id_makanan` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `tgl_makan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `harga` float NOT NULL,
  `persediaan` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `tb_detailbahan`:
--   `id_makanan`
--       `tb_makanan` -> `id_makanan`
--   `id_bahan`
--       `tb_bahan` -> `id_bahan`
--

--
-- Dumping data for table `tb_detailbahan`
--

INSERT INTO `tb_detailbahan` (`id_makanan`, `id_bahan`, `tgl_makan`, `harga`, `persediaan`, `total`) VALUES
(45, 3, '2016-05-26 09:34:46', 12000, 0.5, 6000),
(45, 10, '2016-05-26 09:34:46', 2000, 0.3, 600),
(46, 9, '2016-06-02 04:29:50', 3000, 3, 9000),
(46, 7, '2016-06-02 04:29:50', 10000, 4, 40000),
(47, 8, '2016-06-02 04:33:15', 10000, 0, 0),
(47, 3, '2016-06-02 04:33:15', 12000, 56, 672000),
(49, 6, '2016-07-20 09:47:40', 2000, 12, 24000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_detaildiit`
--

CREATE TABLE `tb_detaildiit` (
  `nomor_register` int(11) NOT NULL,
  `id_diit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `tb_detaildiit`:
--   `nomor_register`
--       `tb_pasien` -> `nomor_register`
--   `id_diit`
--       `tb_diit` -> `id_diit`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detailmakan`
--

CREATE TABLE `tb_detailmakan` (
  `id_detail` int(11) NOT NULL,
  `nomor_register` int(11) NOT NULL,
  `id_makanan` int(11) NOT NULL,
  `jadwal` enum('pagi','siang','malam','') DEFAULT NULL,
  `tgl_makan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `tb_detailmakan`:
--   `nomor_register`
--       `tb_pasien` -> `nomor_register`
--   `id_makanan`
--       `tb_makanan` -> `id_makanan`
--

--
-- Dumping data for table `tb_detailmakan`
--

INSERT INTO `tb_detailmakan` (`id_detail`, `nomor_register`, `id_makanan`, `jadwal`, `tgl_makan`) VALUES
(57, 35, 45, 'pagi', '0000-00-00 00:00:00'),
(59, 40, 47, 'siang', '0000-00-00 00:00:00'),
(60, 38, 49, 'pagi', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_diit`
--

CREATE TABLE `tb_diit` (
  `id_diit` int(11) NOT NULL,
  `nama_diit` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `tb_diit`:
--

--
-- Dumping data for table `tb_diit`
--

INSERT INTO `tb_diit` (`id_diit`, `nama_diit`, `keterangan`) VALUES
(1, 'BH', 'Deskripsi bubur halus'),
(2, 'BK', 'Deskrips bubur kasar'),
(3, 'NT', 'Deskripsi nasi tim'),
(4, 'NS', 'Deskripsi nasi biasa'),
(5, 'TS', 'Deskripsi tinggi serat'),
(6, 'Cair', 'Deskripsi cair'),
(7, 'DJ', 'Deskripsi diet jantung'),
(8, 'DM', 'Deskripsi diabetes melitus'),
(9, 'RG', 'Deskripsi rendah garam'),
(10, 'DH', 'Deskripsi diet hati'),
(11, 'DL', 'Deskripsi diet lambung'),
(12, 'RS', 'Deskripsi rendah serat'),
(13, 'BG', 'Deskripsi batu ginjal'),
(14, 'BSTIK', 'Deskripsi Bebas Buah Sayur Telur Ikan Kacang'),
(15, 'R.PURIN', 'Deskripsi rendah purin'),
(16, 'R.PROT', 'Deskripsi rendah protein'),
(17, 'Puasa', 'Deskripsi puasa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `tb_jabatan`:
--

--
-- Dumping data for table `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'admin gizi'),
(2, 'dokter');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kamar`
--

CREATE TABLE `tb_kamar` (
  `id_kamar` int(11) NOT NULL,
  `nama_kamar` varchar(100) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `tb_kamar`:
--   `id_kelas`
--       `tb_kelas` -> `id_kelas`
--

--
-- Dumping data for table `tb_kamar`
--

INSERT INTO `tb_kamar` (`id_kamar`, `nama_kamar`, `id_kelas`) VALUES
(1, 'Anggrek', 1),
(2, 'Bugenville', 2),
(3, 'Teratai', 1),
(4, 'Raflesia', 2),
(5, 'Melati', 3),
(6, 'Mawar', 3),
(7, 'Daisy', 4),
(8, 'Tulip', 4),
(9, 'Andora', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `tb_kelas`:
--

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'VIP'),
(2, 'Kelas I'),
(3, 'Kelas II'),
(4, 'Kelas III'),
(5, 'HCU');

-- --------------------------------------------------------

--
-- Table structure for table `tb_makanan`
--

CREATE TABLE `tb_makanan` (
  `id_makanan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_diit` int(11) NOT NULL,
  `jadwal` enum('pagi','siang','malam') NOT NULL,
  `tgl_makan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `harga_akhir` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `tb_makanan`:
--   `id_diit`
--       `tb_diit` -> `id_diit`
--

--
-- Dumping data for table `tb_makanan`
--

INSERT INTO `tb_makanan` (`id_makanan`, `nama`, `id_diit`, `jadwal`, `tgl_makan`, `harga_akhir`) VALUES
(45, 'Nasi Jagung', 6, 'pagi', '2016-05-26 09:34:46', 6600),
(46, 'Sate Tikus', 8, 'pagi', '2016-06-02 04:29:50', 49000),
(47, 'Lalapan Laler', 6, 'siang', '2016-06-02 04:33:15', 672000),
(49, 'axdhbj', 1, 'pagi', '2016-07-20 09:47:39', 24000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `nomor_register` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `id_diit` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `status` enum('aktif','tidak_aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `tb_pasien`:
--   `id_kamar`
--       `tb_kamar` -> `id_kamar`
--

--
-- Dumping data for table `tb_pasien`
--

INSERT INTO `tb_pasien` (`nomor_register`, `nama`, `tgl_lahir`, `id_diit`, `id_kamar`, `status`) VALUES
(33, 'Anita', '1994-05-11', 3, 9, 'tidak_aktif'),
(34, 'Adi', '1992-06-12', 17, 9, 'tidak_aktif'),
(35, 'Fira', '1997-05-17', 6, 6, 'aktif'),
(36, 'Andi', '1993-02-19', 4, 5, 'aktif'),
(37, 'Dera', '1994-05-21', 8, 5, 'aktif'),
(38, 'Krisna', '1990-02-17', 1, 7, 'aktif'),
(39, 'Sara', '1995-07-24', 12, 9, 'aktif'),
(40, 'Feril', '1998-08-17', 6, 6, 'aktif'),
(41, 'Sari', '1994-09-09', 9, 9, 'aktif'),
(43, 'Fahri', '1995-03-17', 1, 8, 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengeluaran`
--

CREATE TABLE `tb_pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_bahan` int(11) NOT NULL,
  `harga` float NOT NULL,
  `persediaan` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `tb_pengeluaran`:
--   `id_bahan`
--       `tb_bahan` -> `id_bahan`
--

--
-- Dumping data for table `tb_pengeluaran`
--

INSERT INTO `tb_pengeluaran` (`id_pengeluaran`, `tanggal`, `id_bahan`, `harga`, `persediaan`, `total`) VALUES
(21, '2016-05-26 09:35:04', 3, 12000, 0.5, 6000),
(22, '2016-05-26 09:35:04', 10, 2000, 0.3, 600),
(23, '2016-06-02 04:31:34', 9, 3000, 3, 9000),
(24, '2016-06-02 04:31:34', 7, 10000, 4, 40000),
(25, '2016-06-02 04:33:26', 8, 10000, 0, 0),
(26, '2016-06-02 04:33:26', 3, 12000, 56, 672000),
(27, '2016-07-20 09:47:52', 6, 2000, 12, 24000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `tb_user`:
--   `id_jabatan`
--       `tb_jabatan` -> `id_jabatan`
--

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `username`, `password`, `id_jabatan`) VALUES
(1, 'Administrator', 'admin', 'admin', 1),
(2, 'Dokter', 'dokter', 'dokter', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bahan`
--
ALTER TABLE `tb_bahan`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indexes for table `tb_detailbahan`
--
ALTER TABLE `tb_detailbahan`
  ADD KEY `id_bahan` (`id_bahan`),
  ADD KEY `id_makanan` (`id_makanan`);

--
-- Indexes for table `tb_detaildiit`
--
ALTER TABLE `tb_detaildiit`
  ADD KEY `nomor_register` (`nomor_register`),
  ADD KEY `id_diit` (`id_diit`);

--
-- Indexes for table `tb_detailmakan`
--
ALTER TABLE `tb_detailmakan`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `nomor_register` (`nomor_register`),
  ADD KEY `id_makanan` (`id_makanan`);

--
-- Indexes for table `tb_diit`
--
ALTER TABLE `tb_diit`
  ADD PRIMARY KEY (`id_diit`);

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tb_kamar`
--
ALTER TABLE `tb_kamar`
  ADD PRIMARY KEY (`id_kamar`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_kelas_2` (`id_kelas`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_makanan`
--
ALTER TABLE `tb_makanan`
  ADD PRIMARY KEY (`id_makanan`),
  ADD KEY `id_diit` (`id_diit`);

--
-- Indexes for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`nomor_register`),
  ADD KEY `id_diit` (`id_diit`),
  ADD KEY `id_kamar` (`id_kamar`);

--
-- Indexes for table `tb_pengeluaran`
--
ALTER TABLE `tb_pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`),
  ADD KEY `id_bahan` (`id_bahan`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bahan`
--
ALTER TABLE `tb_bahan`
  MODIFY `id_bahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_detailmakan`
--
ALTER TABLE `tb_detailmakan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `tb_diit`
--
ALTER TABLE `tb_diit`
  MODIFY `id_diit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_kamar`
--
ALTER TABLE `tb_kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_makanan`
--
ALTER TABLE `tb_makanan`
  MODIFY `id_makanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  MODIFY `nomor_register` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `tb_pengeluaran`
--
ALTER TABLE `tb_pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_detailbahan`
--
ALTER TABLE `tb_detailbahan`
  ADD CONSTRAINT `tb_detailbahan_ibfk_1` FOREIGN KEY (`id_makanan`) REFERENCES `tb_makanan` (`id_makanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detailbahan_ibfk_2` FOREIGN KEY (`id_bahan`) REFERENCES `tb_bahan` (`id_bahan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_detaildiit`
--
ALTER TABLE `tb_detaildiit`
  ADD CONSTRAINT `tb_detaildiit_ibfk_1` FOREIGN KEY (`nomor_register`) REFERENCES `tb_pasien` (`nomor_register`),
  ADD CONSTRAINT `tb_detaildiit_ibfk_2` FOREIGN KEY (`id_diit`) REFERENCES `tb_diit` (`id_diit`);

--
-- Constraints for table `tb_detailmakan`
--
ALTER TABLE `tb_detailmakan`
  ADD CONSTRAINT `tb_detailmakan_ibfk_1` FOREIGN KEY (`nomor_register`) REFERENCES `tb_pasien` (`nomor_register`),
  ADD CONSTRAINT `tb_detailmakan_ibfk_3` FOREIGN KEY (`id_makanan`) REFERENCES `tb_makanan` (`id_makanan`);

--
-- Constraints for table `tb_kamar`
--
ALTER TABLE `tb_kamar`
  ADD CONSTRAINT `kelas` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`);

--
-- Constraints for table `tb_makanan`
--
ALTER TABLE `tb_makanan`
  ADD CONSTRAINT `tb_makanan_ibfk_2` FOREIGN KEY (`id_diit`) REFERENCES `tb_diit` (`id_diit`);

--
-- Constraints for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD CONSTRAINT `tb_pasien_ibfk_2` FOREIGN KEY (`id_kamar`) REFERENCES `tb_kamar` (`id_kamar`);

--
-- Constraints for table `tb_pengeluaran`
--
ALTER TABLE `tb_pengeluaran`
  ADD CONSTRAINT `tb_pengeluaran_ibfk_1` FOREIGN KEY (`id_bahan`) REFERENCES `tb_bahan` (`id_bahan`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
