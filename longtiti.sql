-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 18, 2024 at 02:14 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `longtiti`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `jabatan` varchar(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_mutasi_penduduk`
--

CREATE TABLE `data_mutasi_penduduk` (
  `id` int(11) NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_lengkap` varchar(200) NOT NULL,
  `status_dalam_keluarga` varchar(20) NOT NULL,
  `status_perkawinan` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `rt` varchar(3) NOT NULL,
  `rw` varchar(3) NOT NULL,
  `kelurahan_lama` varchar(20) DEFAULT NULL,
  `kelurahan_baru` varchar(20) NOT NULL,
  `kota_baru` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_mutasi_penduduk`
--

INSERT INTO `data_mutasi_penduduk` (`id`, `no_kk`, `nik`, `nama_lengkap`, `status_dalam_keluarga`, `status_perkawinan`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `pendidikan`, `pekerjaan`, `alamat`, `rt`, `rw`, `kelurahan_lama`, `kelurahan_baru`, `kota_baru`, `created_at`, `updated_at`) VALUES
(33, '12341414141', '141414141', 'araraqraq', 'ANAK', 'KAWIN', 'PEREMPUAN', '114141', '2024-06-14', 'ISLAM', 'TIDAK/BELUM SEKOLAH', 'PELAJAR/MAHASISWA', 'jl keman  mana', '1', '2', '41414', ' tes', ' aeaae', '2024-06-16 04:43:01', '2024-06-14 02:09:01');

-- --------------------------------------------------------

--
-- Table structure for table `data_penduduk`
--

CREATE TABLE `data_penduduk` (
  `id` int(11) NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_lengkap` varchar(200) NOT NULL,
  `status_dalam_keluarga` varchar(50) NOT NULL,
  `status_perkawinan` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tanggal_kematian` date DEFAULT NULL,
  `agama` varchar(20) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `rt` varchar(3) NOT NULL,
  `rw` varchar(3) NOT NULL,
  `kelurahan` varchar(20) NOT NULL DEFAULT 'LONG TITI',
  `file` text DEFAULT NULL,
  `surat_meninggal` text NOT NULL,
  `status` bigint(20) NOT NULL DEFAULT 99,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_penduduk`
--

INSERT INTO `data_penduduk` (`id`, `no_kk`, `nik`, `nama_lengkap`, `status_dalam_keluarga`, `status_perkawinan`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `tanggal_kematian`, `agama`, `pendidikan`, `pekerjaan`, `alamat`, `rt`, `rw`, `kelurahan`, `file`, `surat_meninggal`, `status`, `created_at`, `updated_at`) VALUES
(7, '131414151515151', '12131313', 'john smith tes', 'KEPALA KELUARGA SUAMI', 'KAWIN', 'LAKI-LAKI', 'asasas', '2024-06-12', '2024-06-20', 'KRISTEN', 'TAMAT SD/SEDERAJAT', 'PENSIUNAN', 'asasas', '2', '4', 'ffff', NULL, '583d8f802b1792bc2557216630d70421.png', 99, '2024-06-13 10:14:23', '2024-06-10 06:09:44'),
(8, '1341314141', '12131313', 'john smith', 'ISTRI', 'CERAI HIDUP', 'PEREMPUAN', 'adada', '2024-06-03', '2024-06-03', 'KRISTEN', 'TAMAT SD/SEDERAJAT', 'PELAJAR/MAHASISWA', 'adadad', '2', '4', 'dafafa', '4ff05d7881f9b6dd9770f470579d71d2.png', '', 99, '2024-06-13 10:14:54', '2024-06-11 05:30:36'),
(10, '131389018', '13131313', 'CINTA SENJANA MERAYU', 'ISTRI', 'CERAI HIDUP', 'LAKI-LAKI', 'adada', '2024-06-06', NULL, 'ISLAM', 'TAMAT SD/SEDERAJAT', 'PELAJAR/MAHASISWA', 'jl janti gg punto dewo ', '1', '2', 'long titi', 'dc0868d1a806aa975e7a23ed43ea90a5.pdf', '', 99, '2024-06-15 12:04:49', '2024-06-11 06:30:18'),
(11, '9102183718319878', '1381039810', 'adadada', 'ORANG TUA', 'CERAI HIDUP', 'LAKI-LAKI', 'adada', '2024-06-12', NULL, 'KRISTEN', 'BELUM TAMAT SD/SEDERAJAT', 'NELAYAN/PERIKANAN', 'w1w1w', '1', '2', 'adadada', 'd45b1c313fa19312feac47f7d6a738e4.pdf', '', 99, '2024-06-11 06:49:47', '2024-06-11 06:49:47'),
(12, '12', '131321', '1313', 'ANAK', 'KAWIN', 'PEREMPUAN', '3131', '2024-06-11', NULL, 'KRISTEN', 'BELUM TAMAT SD/SEDERAJAT', 'PELAJAR/MAHASISWA', '13131', '1', '2', '3131', 'a539be1447a0f5dcff6d33ab0d455496.jpeg', '', 99, '2024-06-11 06:51:15', '2024-06-11 06:51:15'),
(14, '9131131319381933', '913134141410001', 'bapak senja utama', 'KEPALA KELUARGA SUAMI', 'KAWIN', 'LAKI-LAKI', 'long titi', '1996-06-15', NULL, 'KATHOLIK', 'D-IV/STRATA I', 'TENTARA NASIONAL INDONESIA', 'jl long titi ', '01', '02', 'long titi', 'e4b61f534cb2e21fd4d14e33f1acdb38.jpeg', '', 99, '2024-06-15 13:18:52', '2024-06-15 13:18:52'),
(15, '9131131319381933', '913134141410002', 'ibu senja utama', 'ISTRI', 'KAWIN', 'PEREMPUAN', 'long titi', '1996-06-06', NULL, 'KATHOLIK', 'D-IV/STRATA I', 'PETANI/PEKEBUN', 'jl long titi ', '01', '02', 'long titi', '9f2fd1dcc09d36a28c8c18d8e359dedc.jpeg', '', 99, '2024-06-15 13:20:30', '2024-06-15 13:20:30'),
(16, '9131131319381933', '913134141410003', 'anak senja utama', 'ANAK', 'BELUM KAWIN', 'PEREMPUAN', 'long titi', '2024-06-12', NULL, 'KATHOLIK', 'TIDAK/BELUM SEKOLAH', 'BELUM/TIDAK BEKERJA', 'long titi', '01', '02', 'long titi', NULL, '', 99, '2024-06-15 13:21:45', '2024-06-15 13:21:45');

-- --------------------------------------------------------

--
-- Table structure for table `master_data`
--

CREATE TABLE `master_data` (
  `id` bigint(20) NOT NULL,
  `value` text NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_data`
--

INSERT INTO `master_data` (`id`, `value`, `deskripsi`) VALUES
(1, '[\"BELUM/TIDAK BEKERJA\",\"PELAJAR/MAHASISWA\",\"PENSIUNAN\",\"TENTARA NASIONAL INDONESIA\",\"PETANI/PEKEBUN\",\"NELAYAN/PERIKANAN\",\"PENDETA\",\"WAKIL GUBERNUR\",\"BUPATI\",\"GURU\",\"PERAWAT\",\"WIRASWASTA\",\"LAINNYA\"]', 'pekerjaan'),
(2, '[\"TIDAK/BELUM SEKOLAH\",\"BELUM TAMAT SD/SEDERAJAT\",\"TAMAT SD/SEDERAJAT\",\"SLTP/SEDERAJAT\",\"SLTA/SEDERAJAT\",\"D-I/D-II\",\"AKADEMI/D-III/SARJANA MUDA\",\"D-IV/STRATA I\",\"STRATA II\",\"STRATA III\"]', 'pendidikan'),
(3, '[\"BELUM KAWIN\",\"KAWIN\",\"CERAI HIDUP\",\"CERAI MATI\"]', 'status_kawin'),
(4, '[\"ISLAM\",\"KRISTEN\",\"KATHOLIK\",\"HINDU\",\"BUDHA\",\"KONGHUCU\",\"KEPERCAYAAN\"]', 'agama'),
(5, '[\"KEPALA KELUARGA SUAMI\",\"ISTRI\",\"ANAK\",\"MENANTU\",\"CUCU\",\"ORANG TUA\",\"MERTUA\",\"FAMILI LAIN\",\"PEMBANTU\",\"LAINNYA\"]', 'status_dalam_keluarga'),
(6, '{\"nama\" : \"mister xxxx\",\"jabatan\": \"kepala desa\"}', 'kepala_desa');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `no_surat` int(10) DEFAULT NULL,
  `jenis_surat` text NOT NULL,
  `request` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `tanggal_approval` date DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id`, `nik`, `no_surat`, `jenis_surat`, `request`, `status`, `keterangan`, `created_at`, `tanggal_approval`, `updated_at`) VALUES
(10, '12131313', 4, '3', '{\"nama\":\"JOHN SMITH TES\",\"ttl\":\"ASASAS , 12-06-2024\",\"jenis_kelamin\":\"LAKI-LAKI\",\"pekerjaan\":\"PENSIUNAN\",\"status_perkawinan\":\"KAWIN\",\"kebangsaan\":\"INDONESIA\",\"agama\":\"KRISTEN\",\"alamat\":\"asasas , RT 2 \\/ RW 4\",\"tanggal_kematian\":\"20-06-2024\",\"nik\":\"12131313\"}', 1, 'tes', '2024-06-05 11:32:27', '2024-06-18', '0000-00-00 00:00:00'),
(12, '141414141', 2, '2', '{\"nama\":\"ARARAQRAQ\",\"ttl\":\"114141 , 14-06-2024\",\"jenis_kelamin\":\"PEREMPUAN\",\"pekerjaan\":\"PELAJAR\\/MAHASISWA\",\"status_perkawinan\":\"KAWIN\",\"kebangsaan\":\"INDONESIA\",\"agama\":\"ISLAM\",\"alamat_asal\":\"jl keman  mana , RT 1 \\/ RW 2\",\"kelurahan_baru\":\"tes\",\"kota_baru\":\"aeaae\"}', 1, 'accept', '2024-06-16 11:44:01', '2024-06-18', '0000-00-00 00:00:00'),
(13, '913134141410001', 1, '1', '{\"nama\":\"BAPAK SENJA UTAMA\",\"ttl\":\"LONG TITI , 15-06-1996\",\"jenis_kelamin\":\"LAKI-LAKI\",\"pekerjaan\":\"TENTARA NASIONAL INDONESIA\",\"status_perkawinan\":\"KAWIN\",\"kebangsaan\":\"INDONESIA\",\"agama\":\"KATHOLIK\",\"alamat\":\"jl long titi  , RT 01 \\/ RW 02\"}', 1, 'tes', '2024-06-16 11:47:41', '2024-06-18', '0000-00-00 00:00:00'),
(14, '913134141410003', 3, '4', '{\"nama_anak\":\"ANAK SENJA UTAMA\",\"tanggal_lahir\":\"12-06-2024\",\"tempat_lahir\":\"LONG TITI\",\"jenis_kelamin\":\"PEREMPUAN\",\"nama_ibu\":\"IBU SENJA UTAMA\",\"umur_ibu\":\"28\",\"pekerjaan_ibu\":\"PETANI\\/PEKEBUN\",\"alamat_ibu\":\"jl long titi\",\"nama_ayah\":\"BAPAK SENJA UTAMA\",\"umur_ayah\":\"28\",\"pekerjaan_ayah\":\"TENTARA NASIONAL INDONESIA\",\"alamat_ayah\":\"jl long titi\"}', 1, 'accept', '2024-06-16 11:50:25', '2024-06-18', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `temp_data_penduduk`
--

CREATE TABLE `temp_data_penduduk` (
  `id` int(11) NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_lengkap` varchar(200) NOT NULL,
  `status_dalam_keluarga` varchar(50) NOT NULL,
  `status_perkawinan` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tanggal_kematian` date DEFAULT NULL,
  `agama` varchar(20) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `rt` varchar(3) NOT NULL,
  `rw` varchar(3) NOT NULL,
  `kelurahan` varchar(8) NOT NULL DEFAULT 'WOLOTELU',
  `kelurahan_baru` text DEFAULT NULL,
  `kota_baru` text DEFAULT NULL,
  `file` text DEFAULT NULL,
  `status` bigint(20) NOT NULL DEFAULT 99,
  `id_data_penduduk` bigint(20) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` tinyint(4) NOT NULL,
  `role` tinyint(4) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `last_login` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role`, `nama`, `username`, `password`, `created_at`, `last_login`) VALUES
(1, 1, 'Administrator', 'admin', '$2y$10$hRi1qju2KOeEPcBZ0wYfhu/PN5e9Wl.ddWeDTds8Uokad764X9D1a', '2021-08-14 23:22:33', '2024-06-18 01:56:14'),
(15, 3, 'john smith tes', 'johnsmith', '$2y$10$eqS/km607xVLQflzphaYWOfabr3c88CCqgLx8V8RrI0Oua/qedOqq', '2024-06-18 02:43:04', '2024-06-18 04:49:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `data_mutasi_penduduk`
--
ALTER TABLE `data_mutasi_penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_penduduk`
--
ALTER TABLE `data_penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_data`
--
ALTER TABLE `master_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_data_penduduk`
--
ALTER TABLE `temp_data_penduduk`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `data_mutasi_penduduk`
--
ALTER TABLE `data_mutasi_penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `data_penduduk`
--
ALTER TABLE `data_penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `master_data`
--
ALTER TABLE `master_data`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
