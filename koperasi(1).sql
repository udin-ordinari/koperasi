-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 14, 2025 at 11:02 PM
-- Server version: 12.2.0-MariaDB
-- PHP Version: 8.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_anggota`
--

CREATE TABLE `app_anggota` (
  `id` bigint(20) NOT NULL,
  `ktp` varchar(16) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `tempat_lahir` varchar(80) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `cabang` int(5) NOT NULL DEFAULT 1,
  `phone` varchar(16) NOT NULL,
  `email` varchar(150) NOT NULL,
  `alamat` text NOT NULL,
  `kode_token` varchar(100) NOT NULL,
  `jk` set('Laki - laki','Perempuan') NOT NULL,
  `photo` blob NOT NULL,
  `status` set('aktif','nonaktif','baru','tolak') NOT NULL DEFAULT 'baru',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(5) NOT NULL,
  `updated_at` datetime DEFAULT current_timestamp(),
  `updated_by` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `app_anggota`
--

INSERT INTO `app_anggota` (`id`, `ktp`, `nama`, `tempat_lahir`, `tanggal_lahir`, `cabang`, `phone`, `email`, `alamat`, `kode_token`, `jk`, `photo`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, '170151276', 'ABDUL KHOLIQ', 'Demak', '1976-12-15', 2, '0812345334434', '', 'Jl. Raya Demak', '', 'Laki - laki', 0x64613133393062316437643332343539643964306339326331646166373636392e706e67, 'aktif', '2023-11-24 23:29:13', 0, '2024-11-27 09:24:19', 2),
(2, '3321131402730003', 'ABDUL WAHID', 'Demak', '1973-02-14', 3, '0', '', '', '', 'Laki - laki', 0x61646538666334313731373439323038313432303937653166303333626361332e706e67, 'aktif', '2023-11-15 06:53:22', 0, '2024-11-23 16:51:50', 2),
(3, '188110386', 'ABDULLOH MAHSUN, S.PD.I', 'Demak', '1986-03-11', 7, '0', '', 'Jl. Raya Demak', '', 'Laki - laki', 0x61333462303364623332363865303334666635613163366531373334656636302e706e67, 'aktif', '2023-11-15 06:53:22', 0, '2024-11-24 14:59:15', 2),
(4, '3374060903840004', 'ADI KUSUMA, ST', 'Semarang', '1984-03-09', 7, '0', '', '', '', 'Laki - laki', 0x63336431323138396366303665653065333339346635326363326166393631362e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(5, '3321111911800001', 'ADI NUFIANTO', 'Demak', '1980-11-19', 1, '0123456789', 'adi.nufianto@pdamkabdemak.com', 'Jl. Markas Pam Swakarsa Jakarta Barat Dan Sumatera Bagian Lawas', '', 'Laki - laki', 0x30626164363162633834613633336335356133333530663265636235366237372e6a7067, 'aktif', '2023-11-15 06:53:22', 0, '2025-11-14 21:11:05', 6),
(6, '3321060902810005', 'ADIEB WAHYU ELI IRAWAN', 'Demak', '1981-02-09', 6, '0', '', '', '', 'Laki - laki', 0x38376536656561663964656463633134303034383034393761646433326361382e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(7, '3321061603000002', 'ADKHARUDDIN MURDIYANTO PRASETYO', 'Demak', '2000-03-15', 3, '0', '', '', '', 'Laki - laki', 0x6176617461722e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(8, '3321111203790005', 'AFIEF HENDARWIN, S.T', 'Demak', '1979-03-12', 1, '0', '', 'Jl. Raya Demak - Kudus', '', 'Laki - laki', 0x6176617461722e706e67, 'aktif', '2023-11-15 06:53:22', 0, '2024-11-25 00:28:35', 2),
(9, '3404101908820003', 'AGIT WIDIANTORO', 'Sleman', '1982-08-19', 5, '0', '', '', '', 'Laki - laki', 0x6176617461722e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(10, '103231176', 'AGUNG WAHYUDIANTO, S.T', 'Demak', '1976-11-23', 9, '0', '', '', '', 'Laki - laki', 0x6176617461722e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(11, '9898987676543423', 'AGUS SETYONO SE', 'Demak', '2009-12-16', 1, '0', '', '', '', 'Laki - laki', 0x6176617461722e706e67, 'aktif', '2025-01-25 07:30:59', 0, NULL, 0),
(12, '3321112311760002', 'AGUS SUPRIYANTO', 'Semarang', '1971-03-10', 5, '0', '', '', '', 'Laki - laki', 0x6176617461722e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(13, '3321112901840003', 'AGUS WAHID', 'Demak', '1984-01-29', 4, '0', '', '', '', 'Laki - laki', 0x6176617461722e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(14, '3319031008770002', 'AGUS WIDO CAHYONO', 'Kudus', '1977-08-10', 1, '0', '', '', '', 'Laki - laki', 0x6176617461722e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(15, '3321112805', 'ACHMAD CHOIRUL HUDA', 'Demak', '1994-05-28', 3, '0', '', 'Jl. Raya Demak', '', 'Laki - laki', 0x35333061313734323665656235353939383533666637623565393933356138632e706e67, 'aktif', '2023-11-15 06:53:22', 0, '2024-11-24 14:59:35', 2),
(16, '3321130401860001', 'AHMAD MAULANA FAUZI', 'Demak', '1986-01-04', 1, '0', '', '', '', 'Laki - laki', 0x6176617461722e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(17, '3321110512860001', 'AHMAD MUNAWIR', 'Demak', '1986-12-05', 1, '0', '', '', '', 'Laki - laki', 0x6176617461722e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(18, '3321112608870003', 'AHMAD MUNIR', 'Demak', '1987-08-26', 1, '0', '', '', '', 'Laki - laki', 0x6176617461722e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(19, '3321111908860003', 'AHMAD NUROKHIM', 'Demak', '1986-08-19', 1, '0', '', '', '', 'Laki - laki', 0x6176617461722e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(20, '3321112002980003', 'AKHMAD RIFQI MUJIBURROHMAN', 'Demak', '1998-02-28', 1, '0', '', '', '', 'Laki - laki', 0x6176617461722e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(21, '3321121101680001', 'AHMAD ZAJULI', 'Demak', '1968-01-11', 1, '0', '', '', '', 'Laki - laki', 0x6176617461722e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(22, '3374075302970001', 'AJENG CITRA PERMATASARI', 'Semarang', '1997-02-13', 1, '0', '', '', '', 'Perempuan', 0x6176617461722e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(23, '3321111910940002', 'AKBAR RISHADEWA', 'Demak', '1994-10-19', 1, '0', '', '', '', 'Laki - laki', 0x6176617461722e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(24, '3319030109720004', 'ALEX ZAMIN', 'Kudus', '1972-09-01', 1, '0', '', '', '', 'Laki - laki', 0x6176617461722e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(25, '3321061512790001', 'ANJARSARI', 'Demak', '1979-12-15', 1, '0', '', '', '', 'Perempuan', 0x6176617461722e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(26, '3321112607940002', 'ARDHI RUSDIANTO', 'Demak', '1994-07-26', 6, '0', '', '', '', 'Laki - laki', 0x6176617461722e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(27, '3321110104740001', 'ARIES WAHYU WIDIARTO, A.MD', 'Demak', '1974-04-01', 1, '0', '', '', '', 'Laki - laki', 0x6176617461722e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(28, '106240672', 'ARIF BUDIYONO S.SOS', 'Demak', '1972-06-24', 5, '081325067430', '', '', '', 'Laki - laki', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(29, '444555333', 'ARIF SUCAHYONO', 'Demak', '1976-07-29', 1, '08123', '', '', '', 'Laki - laki', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(30, '0', 'ARIF WICAKSONO', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(31, '0', 'ARIS MUNANDAR', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(32, '3321121208850002', 'ARIS TOFANI', 'Demak', '1985-08-12', 1, '0', '', '', '', 'Laki - laki', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(33, '0', 'ASNITA SARI', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(34, '0', 'ASYIK MAULA', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2024-03-25 08:00:28', 0, NULL, 0),
(35, '0', 'ATHIEK NURCAHYANI', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(36, '0', 'AUNUR ROFIQ', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(37, '0', 'BAGUS FAKHRUDDIN', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(38, '0', 'BAHARUDIN JAUHARI', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(39, '984523141', 'BAMBANG SUDARMANTA S.I.KOM', 'Kendal', '1967-05-26', 5, '08123456789', '', '', '', 'Laki - laki', '', 'aktif', '2023-12-23 17:04:26', 0, NULL, 0),
(40, '037150771', 'BUDI ASTUTI, S.E', 'Demak', '1971-07-15', 9, '0', '', '', '', 'Perempuan', 0x6176617461722e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(41, '3374065511810002', 'BUDI ASTUTI, A.MD', 'Demak', '1981-11-15', 1, '0', '', '', '', 'Perempuan', 0x6176617461722e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(42, '0', 'BUDI KISMIYONO', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(43, '002231168', 'BUDI SUBAGYO', 'Demak', '1968-11-23', 2, '085225501247', '', '', '', 'Laki - laki', 0x37323730663237623961393066633830326431333030386466346566323838652e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(44, '0', 'DANI PRASENA', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(45, '0', 'DANIEL SALFAUZ TP', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(46, '175250481', 'DIDIT KURNIAWAN', 'Semarang', '1981-04-25', 5, '+6285225436472', '', '', '', 'Laki - laki', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(47, '0', 'DONY HARI P', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(48, '3321012005990003', 'DWI AJI PAMUNGKAS', 'Demak', '1999-05-20', 5, '0', '', '', '', 'Laki - laki', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(49, '0', 'DWI BERSA ANDRIANI', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(50, '0000000000', 'DWI HARYANTI. SE', 'Demak', '1990-09-01', 1, '000000', '', '', '', 'Perempuan', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(51, '3327086710810021', 'DWI PUJIARSIH, S.E', 'Pemalang', '1981-10-27', 1, '0', '', '', '', 'Perempuan', 0x6176617461722e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(52, '0', 'DWI RATNANINGTYAS', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(53, '0', 'DWI RIZKI APRIYANTO', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(54, '000000000', 'DYNASTI PURNA S. S. KOM', 'Demak', '1990-01-01', 1, '0000000', '', '', '', 'Laki - laki', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(55, '0', 'EKO  WIDIYANTO', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(56, '0000000000', 'ERWIN BEN GUNAWAN. S.PD', 'Demak', '1990-01-01', 1, '00000000', '', '', '', 'Laki - laki', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(57, '0', 'ERY TRIARSO', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(58, '0', 'FADKHAN  AZIS', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(59, '3321112912830002', 'FAJAR SULISTIYONO, S.KOM', 'Demak', '1983-12-29', 2, '0895391300616', 'fajar.sulistyono@pdamkabdemak.com', 'Kampung Gendingan Belakang Pasar', '', 'Laki - laki', 0x38333137303364636331316236623637643530613465623330323532383333332e6a7067, 'aktif', '2023-11-15 06:53:22', 0, '2024-11-26 21:41:35', 2),
(60, '8787654543212345', 'FARAH ROSMALINDA', 'Demak', '1994-12-10', 2, '75675675647', '', '', '', 'Perempuan', 0x6176617461722e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(61, '0', 'FARIDA NURUL HIDAYAH', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(62, '0', 'FATKHUL UMAM', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(63, '0', 'FIRDAUS AHSAN ALIFI', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(64, '0', 'FITA FAUZI RAHMAWATI', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(65, '0', 'GANI RIZKI GAMA', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(66, '0', 'GRENI RIYAN S', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(67, '0', 'HALIMI MASRUHAN', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(68, '3321110505860006', 'HAMAM SUPROJO', 'Demak', '1986-05-05', 5, '0', '', '', '', 'Laki - laki', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(69, '0', 'HARTO', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(70, '0', 'HARTOYO', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(71, '0', 'HENDRI DWI P', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(72, '0', 'HENRY ERMAWAN', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(73, '0', 'HERLIA MURBAWATI', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(74, '3318102006680005', 'HERMAN WIKANTO, S.H', 'Kudus', '1968-06-20', 8, '0', '', '', '', 'Laki - laki', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(75, '0', 'HILMI KHOIRUDDIN NURUL', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(76, '0', 'IIN SYARIAH', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(77, '161240576', 'IMAM SISWANTO', 'Demak', '1976-05-24', 5, '+628985925685', '', '', '', 'Laki - laki', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(78, '0', 'ISRA SARI DORAYA', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(79, '0', 'IWAN SETIAWAN', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(80, '0', 'JADI SUSIYANTO', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(81, '0', 'JANU ADI KUSWORO', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(82, '0', 'JATMIKO', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(83, '0', 'JEHAN INDRAWAN', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(84, '0', 'JOKO EDI KRISTIAWAN SE', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(85, '0', 'JOKO PRIYANTO', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(86, '0', 'JOKO SUTANTO', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(87, '0', 'JUNAEDI', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(88, '0', 'JUWANTO PRASETIYO', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(89, '3321110803720001', 'KASIRON', 'Demak', '1972-03-08', 1, '0', '', '', '', 'Laki - laki', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(90, '0', 'KHOZINATUZ ZUHRI', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(91, '0', 'KHUSNUR RIZAL MAULANA', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(92, '0', 'KUKUH IRVAN KURNIAWAN', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(93, '0', 'KURNI ARIA SANDI', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(94, '0', 'KURNIA NOOR ALFIAH', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(95, '0', 'LASNO', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(96, '3321114512870001', 'LIDA SUSTIYANI, S.I.P', 'Demak', '1987-12-05', 1, '0', '', '', '', 'Perempuan', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(97, '2121212100012', 'LIKA MUSTIKA HASAN', 'Tasikmalaya', '1978-01-01', 9, '0', '', 'Frhghh Hfgjfgjfgjfj', '', 'Perempuan', 0x65343131393564346233653831363763333430653439323836323164393066392e706e67, 'aktif', '2023-11-15 06:53:22', 0, '2025-01-28 10:38:36', 4),
(98, '0', 'LISHALATUL ANANDA PUTRI', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(99, '0', 'LUTFI ZAKIYAH', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(100, '0', 'LUTHFI THORIQ R', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(101, '3321050901960003', 'M AKMAL FARKI BIRVANSAH', 'Demak', '1996-01-09', 1, '0', '', '', '', 'Laki - laki', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(102, '0', 'M AKSIN', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(103, '0', 'M ALAN NUARY', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2024-03-25 07:59:17', 0, NULL, 0),
(104, '3321110710820003', 'MUCHAMAD BASARI', 'Demak', '1982-10-07', 1, '0', '', '', '', 'Laki - laki', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(105, '0', 'M CHUSNUL M', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(106, '0', 'M LUTFI', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(107, '9998887776665554', 'MOCH MULYONO', 'Demak', '1994-06-14', 1, '9888764456544', '', '', '', 'Laki - laki', 0x6176617461722e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(108, '0', 'M QIFUL AFFA', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(109, '0', 'M ROBBITH H', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(110, '3321061107880003', 'MUHAMMAD ROSIMUL FATIHIN', 'Demak', '1988-07-11', 1, '0', '', '', '', 'Laki - laki', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(111, '125221178', 'M SAIKUL HADI', 'Demak', '1978-11-22', 5, '+6285226002456', '', '', '', 'Laki - laki', 0x31616639366336656231333135316465303931326564663463376266363564342e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(112, '0', 'M SUBHAN', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(113, '3321110712840002', 'MUHAMAT TAUCHIT', 'Demak', '2001-01-01', 5, '0', '', '', '', 'Laki - laki', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(114, '0', 'M ZAENURI', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(115, '0', 'MA DJOKO  SUSILO', '', NULL, 1, '', '', '', '', 'Laki - laki', '', 'aktif', '2024-03-25 07:59:49', 0, NULL, 0),
(116, '3321111002720003', 'MAT ANSORI', 'Semarang', '2000-06-12', 1, '0', '', '', '', 'Laki - laki', 0x6176617461722e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(117, '3374061206000004', 'MAULANA AQSHAL FIRMANSYAH', 'Demak', '1982-11-07', 1, '0', '', '', '', 'Laki - laki', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(118, '0', 'MH ERTIKA ULKHAQ', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(119, '0', 'MONALISA', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(120, '123456789', 'MOCH. S. YAHYA HAITAMI', 'Demak', '1975-12-29', 9, '081325774185', '', '', '', 'Laki - laki', 0x65643963653537366535366138366433343735323630303033366332356664362e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(121, '0', 'MUHLAS', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(122, '3321132604720003', 'MUIS ALIUDIN, S.E', 'Demak', '1972-04-26', 1, '0', '', '', '', 'Laki - laki', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(123, '0', 'MUKHERAN', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(124, '0', 'MUSTOFA KAMAL', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(125, '3322084811810002', 'NANING WULANSARI, A.MD', 'Semarang', '1981-11-08', 1, '0', '', '', '', 'Perempuan', 0x6176617461722e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(126, '0', 'NAWUNG WULAN SARI', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(127, '0', 'NIA AGUSTINA', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(128, '0', 'NIKO WIDIYARKO', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(129, '0', 'NINA WIDANARTI', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(130, '0', 'NOOR ULIYATUL CH', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(131, '0', 'NUGROHO AGUNG ABADI', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(132, '0', 'NUR AFICHA A', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(133, '0', 'NUR IDA FITRIANTO', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(134, '149281275', 'NUR IKHWANI', 'DEMAK', '2023-12-19', 1, '46354745', '', '', '', 'Laki - laki', 0x6176617461722e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(135, '202281289', 'NUR SYAFARINA, S.T', 'Semarang', '1989-12-28', 5, '+6285641645640', '', '', '', 'Perempuan', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(136, '0', 'NURUL DAMAYANTI', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(137, '0', 'NURWITO', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2024-03-25 08:00:03', 0, NULL, 0),
(138, '209301089', 'OKTABRINA ADITHIA SYUKMA A. MD', 'Demak', '2023-12-14', 2, '8858658566', '', '', '', 'Perempuan', 0x6176617461722e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(139, '0', 'PUGUH PRIBADHI U', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(140, '0', 'PUJI MULYANI', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(141, '0', 'PURNOMO', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(142, '20200666000', 'H. QUMARUL HUDA SH', 'DEMAK', '1970-01-14', 9, '0', '', '', '', 'Laki - laki', 0x62373138303035633765323132666136396162353635613130626238643031382e6a7067, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(143, '189071082', 'R BUDIARTO HOETOMO, S.SOS', 'Jakarta', '1982-10-07', 5, '+6285321770988', '', '', '', 'Laki - laki', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(144, '999999999', 'RA IWAN  WIJANARKO', 'Demak', '1972-01-01', 9, '0897645', '', '', '', 'Laki - laki', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(145, '0', 'RAHMAT PURWANTO', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(146, '0', 'RASMADI', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(147, '0', 'RATNA ANGGOROWATI', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(148, '0', 'REZA ZULMY P', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(149, '0', 'RINA WULANSARI', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(150, '0', 'RIO AGUS P', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(151, '3321116608870002', 'RISCA PERDANI', 'Demak', '1987-08-26', 1, '0', '', '', '', 'Perempuan', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(152, '0', 'RISTI DWI ARFININGTYAS', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(153, '0', 'RM AMIN WAHYU SETYAWAN', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(154, '0', 'RR ERMA HERAWATI', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(155, '0', 'SAHAL AHMAD', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(156, '0', 'SANTOSO', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(157, '0', 'SAYID ABDURROHMAN', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(158, '0', 'SIGIT HARI P', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(159, '0', 'SISWOYO HADI', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(160, '0', 'SITI LESTARI', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(161, '0', 'SLAMET', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(162, '0', 'SLAMET DIMYATI', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(163, '3319021905700001', 'SOEHARIJOKO', 'Kudus', '1970-05-19', 9, '0', '', '', '', 'Laki - laki', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(164, '3321063007830001', 'SONI FAJAR SUWASONO, S.M', 'Demak', '1983-07-30', 1, '0', '', '', '', 'Laki - laki', 0x6176617461722e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(165, '0', 'SRI ARI MULYANTIWI', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(166, '3321114604780001', 'SRI HANDAYANI, S.E', 'Demak', '1978-04-06', 1, '0', '', '', '', 'Perempuan', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(167, '0', 'SRI LESTARI', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(168, '0', 'SRI RIZKIANI', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(169, '0', 'SRIYANTO', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(170, '0', 'SUGENG LISTIYONO', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(171, '0', 'SUGIARTO', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(172, '0', 'SUHARNO', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(173, '0', 'SUHARTONO', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(174, '0', 'SUNARTO (NURDI)', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(175, '0', 'SUPRIYATNO', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(176, '0', 'SURYA ADI IRAWAN', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(177, '0', 'SUTRISNO', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(178, '0', 'SUYOTO', '', NULL, 1, '', '', '', '', 'Laki - laki', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(179, '0', 'SYAIFUDIN ANSHORI', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(180, '0', 'TITIK SUPRIHATIN', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(181, '0', 'TRI HANDAYANI PUJI LESTARI', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(182, '0', 'TRI HANJONO B', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(183, '0', 'TRI HATMA IDA WIJAYA', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(184, '0', 'TRI NUGROHO WA', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(185, '0', 'TRI WIBOWO', '', NULL, 1, '', '', '', '', '', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(186, '222333444', 'TURKHAMUN', 'Demak', '1972-05-09', 1, '0811', '', '', '', 'Laki - laki', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(187, '111222333', 'ULIL ALBAB', 'Demak', '1973-01-19', 1, '0816', '', '', '', 'Laki - laki', 0x34323930643530386632613034633966333866393532323631343735323833372e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(188, '3321111606780007', 'ULUL HADAR, S.T', 'Demak', '1978-06-16', 1, '0', '', '', '', 'Laki - laki', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(189, '200250788', 'VERLY ZULI PRASETYO, S.SI', 'Demak', '1988-07-25', 2, '0812', '', '', '', 'Laki - laki', '', 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(190, '3321101311970001', 'WAHYU ADJI MAHATHIR PUTRA', 'Demak', '1997-11-13', 1, '0', '', '', '', 'Laki - laki', 0x6176617461722e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(191, '3374154502790006', 'WAHYU BINTARYANTI, S.KOM', 'Demak', '1979-02-05', 9, '081578727443', 'achmadsolachudin82@gmail.com', 'Jl. Raya Demak', '', 'Perempuan', 0x35626639386266636163343365306235653238336633323862393735373532302e706e67, 'aktif', '2023-11-15 06:53:22', 0, '2024-11-23 16:56:09', 2),
(192, '3321115507900005', 'WAHYU PUJI ASTUTI, A.MD', 'Demak', '1990-07-15', 1, '0', '', '', '', 'Perempuan', 0x6176617461722e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(193, '3321060111730002', 'WAHYU RIYADI SUGIH NURISTYO, S.E', 'Demak', '1973-11-01', 9, '0', '', '', '', 'Laki - laki', 0x6176617461722e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(194, '3321111408790001', 'WAHYUDI', 'Demak', '1979-08-14', 1, '0', '', '', '', 'Laki - laki', 0x6176617461722e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(195, '3374060404930006', 'WHISNU LAKSONO AJI, S.M', 'Semarang', '1993-04-04', 1, '0', '', '', '', 'Laki - laki', 0x6176617461722e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(196, '3318082206940022', 'WIDI NUGROHO SINAR AJI, A.MD', 'Pati', '1994-06-22', 1, '0', '', '', '', 'Laki - laki', 0x6176617461722e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(197, '3374062501950003', 'WIDIATMOKO, S.SOS', 'Semarang', '1995-01-25', 1, '0', '', '', '', 'Laki - laki', 0x6176617461722e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(198, '3321116302890001', 'WIDYA AYU KUSUMA, S.E', 'Semarang', '1989-02-23', 2, '0', '', '', '', 'Perempuan', 0x6176617461722e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(199, '3321110701770001', 'YAN  NUGROHO  GOZALI', 'Demak', '1977-01-07', 3, '0', '', '', '', 'Laki - laki', 0x6176617461722e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(200, '3321110203860002', 'YOGMA SWAHANA BHAKTI, S.SOS', 'Magelang', '1986-03-02', 3, '0819', '', '', '', 'Laki - laki', 0x6176617461722e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(201, '123456789', 'YOPPY IKRAM, S.KOM', 'Bengkulu', '1990-05-22', 9, '08123', '', '', '', 'Laki - laki', 0x34653264346438353037313736666564303531336432313436616434303566332e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(202, '181010987', 'YOSI KURNIA SETIYOPUTRO, S.H', 'Semarang', '1987-09-01', 9, '082242599868', '', '', '', 'Laki - laki', 0x6176617461722e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0),
(203, '3308140901790002', 'ZAENAL LATIF', 'Magelang', '1979-01-09', 2, '081', '', '', '', 'Laki - laki', 0x6176617461722e706e67, 'aktif', '2023-11-15 06:53:22', 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `app_angsuran`
--

CREATE TABLE `app_angsuran` (
  `id` bigint(20) NOT NULL,
  `tgl` date NOT NULL,
  `kode` varchar(50) NOT NULL,
  `user_id` int(20) NOT NULL,
  `id_pinj` int(20) NOT NULL,
  `jenis` set('cicilan','pelunasan','perkas','barang','piutang_awal') NOT NULL DEFAULT 'cicilan',
  `dari` int(5) DEFAULT NULL,
  `ke` int(5) DEFAULT NULL,
  `pokok` decimal(16,0) NOT NULL,
  `bunga` decimal(16,0) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(4) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_cabang`
--

CREATE TABLE `app_cabang` (
  `id` int(10) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `app_cabang`
--

INSERT INTO `app_cabang` (`id`, `nama`, `keterangan`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Demak Barat', 'Meliputi Area Demak Barat Yang Termasuk Dalam Kegiatan Operasional', '2023-07-16 20:48:49', 0, 2023, 0),
(2, 'Demak Timur', 'Meliputi Area Demak Timur Yang Termasuk Dalam Kegiatan Operasional', '2023-07-16 20:48:48', 0, 2023, 0),
(3, 'Wedung', 'Meliputi Area Wedung Yang Termasuk Dalam Kegiatan Operasional', '2023-07-16 20:48:41', 0, 2023, 0),
(4, 'Bonang', 'Meliputi Area Bonang Yang Termasuk Dalam Kegiatan Operasional', '2023-07-16 20:48:45', 0, 2023, 0),
(5, 'Mranggen', 'Meliputi Area Mranggen Yang Termasuk Dalam Kegiatan Operasional', '2023-07-16 20:48:41', 0, 2023, 0),
(6, 'Wonosalam', 'Meliputi Area Wonosalam Yang Termasuk Dalam Kegiatan Operasional', '2023-07-16 20:48:46', 0, 2023, 0),
(7, 'Karangawen', 'Meliputi Area Karangawen Yang Termasuk Dalam Kegiatan Operasional', '2023-07-16 20:48:45', 0, 2023, 0),
(8, 'Karanganyar', 'Meliputi Area Karanganyar Yang Termasuk Dalam Kegiatan Operasional', '2023-07-16 20:48:47', 0, 2023, 0),
(9, 'Demak Pusat', 'Meliputi Area Demak Pusat', '2023-11-24 22:08:58', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `app_jasa`
--

CREATE TABLE `app_jasa` (
  `id` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `isi` varchar(16) NOT NULL DEFAULT '0',
  `nilai` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(10) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(10) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(10) NOT NULL,
  `is_deleted` set('true','false') NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `app_jasa`
--

INSERT INTO `app_jasa` (`id`, `nama`, `isi`, `nilai`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `is_deleted`) VALUES
(1, 'jasa-pinjaman', '0.6', '', '2023-11-16 18:58:51', 0, '2024-11-28 22:30:03', 0, '2023-11-17 15:59:20', 0, 'false'),
(2, 'lunas-sebelum', '0.5', '', '2023-11-16 19:09:49', 0, '0000-00-00 00:00:00', 0, '2023-11-17 15:59:20', 0, 'false'),
(3, 'potongan-swp', '3', '', '2023-11-16 19:15:30', 0, '2024-11-22 08:53:01', 0, '2023-11-17 15:59:20', 0, 'false'),
(4, 'potongan-rsk', '1', '', '2023-11-16 19:18:18', 0, '2024-11-22 08:53:04', 0, '2023-11-17 15:59:20', 0, 'false'),
(5, 'jasa-simpanan', '3', '', '2023-11-16 19:25:14', 0, '2024-12-01 14:50:19', 0, '2023-11-17 15:59:20', 0, 'false'),
(6, 'iuran-sp', '5000', '', '2023-11-16 20:01:37', 0, '2024-12-04 03:40:44', 0, '2023-11-17 15:59:20', 0, 'false'),
(7, 'iuran-sw', '150000', '', '2023-11-17 12:52:27', 0, '2024-12-01 14:44:44', 0, '2023-11-17 15:59:20', 0, 'false'),
(8, 'jasa-ss', '0.5', '', '2023-11-16 19:42:45', 0, '2024-12-01 06:07:44', 0, '2023-11-17 15:59:20', 0, 'false'),
(9, 'persen-aph', '90', '10', '2024-02-12 12:08:14', 0, '2024-12-08 01:19:49', 2, NULL, 0, 'false'),
(10, 'pasiva-mtt', '0', '15000000', '2024-08-17 17:44:23', 2, '2024-08-17 17:44:23', 2, NULL, 0, 'false'),
(11, 'persen-shu', '40', '40', NULL, 0, NULL, 0, NULL, 0, 'false'),
(12, 'setor-induk-koperasi', '25', '25', NULL, 1, NULL, 1, NULL, 0, 'false'),
(13, 'cadangan-modal', '25', '25', NULL, 1, NULL, 1, NULL, 0, 'false'),
(14, 'dana-pengurus', '10', '10', NULL, 1, NULL, 0, NULL, 0, 'false'),
(15, 'pembagi-jasa-ss', '10', '12', '2024-11-24 17:52:58', 2, '2024-12-01 06:08:05', 0, NULL, 0, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `app_jns_pinj`
--

CREATE TABLE `app_jns_pinj` (
  `id` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempo` decimal(4,0) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(10) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `app_jns_pinj`
--

INSERT INTO `app_jns_pinj` (`id`, `nama`, `tempo`, `keterangan`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'TL 1', 24, 'TIRTO LANGGENG 1', '0000-00-00 00:00:00', 0, '2023-11-17 16:51:27', 0),
(2, 'TL 2', 24, 'TIRTO LANGGENG 2', '0000-00-00 00:00:00', 0, '2023-11-12 04:39:27', 0),
(3, 'TL 3', 48, 'TIRTO LANGGENG 3', '0000-00-00 00:00:00', 0, '2023-11-12 04:39:35', 0),
(4, 'TL 4', 24, 'TIRTO LANGGENG 4', '0000-00-00 00:00:00', 0, '2023-11-12 04:39:42', 0),
(5, 'TL 5', 0, 'TIRTO LANGGENG 5', '0000-00-00 00:00:00', 0, '2023-11-12 04:39:50', 0),
(6, 'TL 6', 0, 'TIRTO LANGGENG 6', '0000-00-00 00:00:00', 0, '2023-11-12 04:39:57', 0),
(7, 'TL 7', 0, 'TIRTO LANGGENG 7', '0000-00-00 00:00:00', 0, '2023-11-12 04:40:05', 0),
(8, 'TL 8', 0, 'TIRTO LANGGENG 8', '0000-00-00 00:00:00', 0, '2023-11-12 04:40:14', 0),
(9, 'TL 9', 0, 'TIRTO LANGGENG 9', '0000-00-00 00:00:00', 0, '2023-11-12 04:40:22', 0),
(10, 'TL BARANG', 0, 'TIRTO LANGGENG BARANG', '0000-00-00 00:00:00', 0, '2023-11-12 04:39:12', 0),
(11, 'PPK', 0, 'PINJAMAN PER KAS', '2023-12-14 10:49:36', 1, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `app_jns_simp`
--

CREATE TABLE `app_jns_simp` (
  `id` bigint(20) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jumlah` decimal(10,0) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `app_jns_simp`
--

INSERT INTO `app_jns_simp` (`id`, `nama`, `jumlah`, `updated_at`) VALUES
(1, 'Simpanan Pokok', 5000, '2025-11-14 15:46:46'),
(2, 'Simpanan Wajib', NULL, '2025-11-14 15:46:49'),
(3, 'Simpanan Sukarela', NULL, '2025-11-14 15:46:52'),
(4, 'Simpanan Lain', NULL, '2025-11-14 15:46:55');

-- --------------------------------------------------------

--
-- Table structure for table `app_login_attempts`
--

CREATE TABLE `app_login_attempts` (
  `id` int(11) NOT NULL,
  `identity` varchar(100) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `counter` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_menus`
--

CREATE TABLE `app_menus` (
  `id` int(10) NOT NULL,
  `module_id` int(10) NOT NULL DEFAULT 0,
  `parent_id` int(10) DEFAULT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `alamat_url` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `urutan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `app_menus`
--

INSERT INTO `app_menus` (`id`, `module_id`, `parent_id`, `nama_menu`, `alamat_url`, `icon`, `urutan`) VALUES
(1, 1, 0, 'Transaksi', 'javascript:void(0);', 'bx bx-layer', 1),
(2, 2, 0, 'Laporan', 'javascript:void(0);', 'bx bx-layout', 3),
(3, 3, 0, 'Laporan Pembantu', 'javascript:void(0);', 'bx bx-file', 2),
(4, 4, 0, 'Master Data', 'javascript:void(0);', 'bx bx-receipt', 4),
(5, 5, 0, 'Pengaturan Lain', 'javascript:void(0);', 'bx bx-cog', 5),
(7, 0, 1, 'Simpanan', '#', 'fal fa-wallet', 1),
(8, 0, 1, 'Pinjaman', '#', 'fa-light fa-hand-holding-circle-dollar', 2),
(9, 0, 1, 'Transaksi Umum', 'transaksi/umum', 'fal fa-cash-register', 3),
(10, 0, 7, 'Simpanan', 'transaksi/simpanan/data_simpanan', '', 1),
(11, 0, 7, 'Penarikan', 'transaksi/simpanan/data_penarikan', '', 2),
(12, 0, 7, 'Penutupan', 'transaksi/simpanan/data_penutupan', '', 3),
(13, 0, 8, 'Pinjaman Baru', 'transaksi/pinjaman/pengajuan', '', 1),
(14, 0, 8, 'Data Pinjaman', 'transaksi/pinjaman/data_pinjaman', '', 2),
(15, 0, 8, 'Angsuran', 'transaksi/pinjaman/angsuran', '', 3),
(16, 0, 8, 'Angsuran Saldo Awal', 'transaksi/pinjaman/angs_awal_pinjaman', '', 4),
(17, 0, 3, 'Unit USP', '', 'fa-light fa-building-memo', 1),
(18, 0, 3, 'Unit INDUK', '', 'fa-light fa-building-wheat', 2),
(19, 0, 17, 'Buku Kas', 'laporan/pembantu/usp/buku_kas', '', 1),
(20, 0, 17, 'Buku Kas Masuk', '', '', 2),
(21, 0, 17, 'Buku Kas Keluar', '', '', 3),
(22, 0, 17, 'Buku Harian Kas', '', '', 4),
(23, 0, 17, 'Rekap Harian Kas', '', '', 5),
(24, 0, 17, 'Buku Besar', '', '', 6),
(25, 0, 17, 'Perhitungan HU', '', '', 7),
(26, 0, 18, 'Buku Kas', '', '', 1),
(27, 0, 18, 'Buku Kas Masuk', '', '', 2),
(28, 0, 18, 'Buku Kas Keluar', '', '', 3),
(29, 0, 18, 'Buku Harian Kas', '', '', 4),
(30, 0, 18, 'Rekap Harian Kas', '', '', 5),
(31, 0, 18, 'Buku Besar', '', '', 6),
(32, 0, 18, 'Perhitungan HU', '', '', 7),
(33, 0, 2, 'Neraca', '', 'fal fa-scale-balanced', 1),
(34, 0, 2, 'Arus Kas [ Cashflow ]', '', 'fa-light fa-chart-simple', 2),
(35, 0, 2, 'Laba - Rugi', '', 'fa-light fa-wave-square', 3),
(36, 0, 2, 'Penyusutan Harta', '', 'fa-light fa-arrow-down-big-small', 4),
(37, 0, 2, 'Perhitungan HU', '', 'fa-light fa-calculator', 5),
(38, 0, 2, 'SHU', '', 'fa-light fa-file-certificate', 6),
(39, 0, 4, 'Anggota', '', 'fa-light fa-user-group', 1),
(40, 0, 4, 'Simpanan', '', 'fa-light fa-wallet', 2),
(41, 0, 4, 'Pinjaman', '', 'fal fa-hand-holding-dollar', 3),
(42, 0, 4, 'Akun Akuntansi', '', 'fa-light fa-sidebar', 4),
(43, 0, 39, 'Anggota Baru', '', '', 1),
(44, 0, 39, 'Data Anggota', '', '', 2),
(45, 0, 39, 'Anggota Non Aktif', '', '', 3),
(46, 0, 40, 'Jenis Simpanan', '', '', 1),
(47, 0, 40, 'Jasa Simpanan', '', '', 2),
(48, 0, 41, 'Jenis Pinjaman', '', '', 1),
(49, 0, 41, 'Jasa Pinjaman', '', '', 2),
(50, 0, 41, 'Saldo Awal Pinjaman', '', '', 3),
(51, 0, 42, 'Tipe Akuntansi', '', '', 1),
(52, 0, 42, 'Jenis Akuntansi', '', '', 2),
(53, 0, 42, 'Kode Akuntansi', '', '', 3),
(54, 0, 42, 'Saldo Awal Akun', '', '', 4),
(55, 0, 5, 'Satuan Barang', '', 'fal fa-boxes-stacked', 1),
(56, 0, 5, 'Harta / Inventaris', '', 'fal fa-box-open-full', 2),
(57, 0, 5, 'Nilai Penyusutan', '', 'far fa-minimize', 3),
(58, 6, 0, 'Database', '', 'fa-light fa-database', 6),
(59, 0, 58, 'Backup Database', '', 'fa-light fa-cloud-arrow-down', 1),
(60, 0, 58, 'Restore Database', '', 'fa-light fa-cloud-arrow-up', 2);

-- --------------------------------------------------------

--
-- Table structure for table `app_penarikan`
--

CREATE TABLE `app_penarikan` (
  `id` bigint(20) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `tgl` date NOT NULL,
  `user_id` int(10) NOT NULL,
  `jumlah` decimal(20,0) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(10) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_penutupan`
--

CREATE TABLE `app_penutupan` (
  `id` bigint(20) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `tgl` date NOT NULL,
  `user_id` int(10) NOT NULL,
  `jumlah` decimal(20,0) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(10) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_pinjaman`
--

CREATE TABLE `app_pinjaman` (
  `id` bigint(20) NOT NULL,
  `kode` varchar(50) DEFAULT NULL,
  `tgl` date NOT NULL,
  `user_id` int(20) NOT NULL,
  `jns_pinj` int(4) DEFAULT NULL,
  `tempo` decimal(4,0) DEFAULT NULL,
  `cicil` decimal(4,0) NOT NULL,
  `jumlah` decimal(20,0) NOT NULL,
  `pencairan` decimal(16,0) NOT NULL,
  `swp` decimal(12,0) NOT NULL,
  `rsk` decimal(12,0) NOT NULL,
  `total` decimal(20,0) NOT NULL,
  `jaminan` blob DEFAULT NULL,
  `status` set('baru','disetujui','ditolak','ulang','lunas','saldo_awal') NOT NULL DEFAULT 'baru',
  `alasan` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `created_by` int(10) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_saldo_awal`
--

CREATE TABLE `app_saldo_awal` (
  `id` int(10) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `akun_id` int(10) NOT NULL,
  `unit` set('01','02') NOT NULL DEFAULT '01',
  `saldo` decimal(20,0) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(10) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_sessions`
--

CREATE TABLE `app_sessions` (
  `id` varchar(128) NOT NULL,
  `identity` varchar(100) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `user_agent` text NOT NULL,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `app_sessions`
--

INSERT INTO `app_sessions` (`id`, `identity`, `ip_address`, `timestamp`, `user_agent`, `data`) VALUES
('nkb6s5cib2jf3719fepv2bjhpvf9gsmm', 'yuminakun', '127.0.0.1', 1763129993, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:145.0) Gecko/20100101 Firefox/145.0', 0x5f5f63695f6c6173745f726567656e65726174657c693a313736333132393939333b6170705f746f6b656e7c733a33323a223065633866373235663461323266386365353364383831336234353763343762223b757365725f69647c733a313a2231223b6d656d6265725f69647c733a313a2230223b6c6576656c7c733a313a2231223b757365725f6e616d657c733a393a2279756d696e616b756e223b6861735f6c6f67696e7c623a313b69705f616464726573737c733a393a223132372e302e302e31223b73657373696f6e69647c733a33323a226e6b62367335636962326a66333731396665707632626a687076663967736d6d223b),
('vo7pl5iq7g9bsmfelp8p2slo9ra7k5qg', '', '127.0.0.1', 1763130350, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:145.0) Gecko/20100101 Firefox/145.0', 0x5f5f63695f6c6173745f726567656e65726174657c693a313736333133303335303b6170705f746f6b656e7c733a33323a223435366331613135313161346338633331663130313562316534643331666131223b757365725f69647c733a313a2231223b6d656d6265725f69647c733a313a2230223b6c6576656c7c733a313a2231223b757365725f6e616d657c733a393a2279756d696e616b756e223b6861735f6c6f67696e7c623a313b69705f616464726573737c733a393a223132372e302e302e31223b73657373696f6e69647c733a33323a226e6b62367335636962326a66333731396665707632626a687076663967736d6d223b),
('0ldslphcd4auanvtbdl5ptuldiuop54o', '', '127.0.0.1', 1763130669, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:145.0) Gecko/20100101 Firefox/145.0', 0x5f5f63695f6c6173745f726567656e65726174657c693a313736333133303636393b6170705f746f6b656e7c733a33323a223961623664326135653561336137396333663030333535313833323133383933223b757365725f69647c733a313a2231223b6d656d6265725f69647c733a313a2230223b6c6576656c7c733a313a2231223b757365725f6e616d657c733a393a2279756d696e616b756e223b6861735f6c6f67696e7c623a313b69705f616464726573737c733a393a223132372e302e302e31223b73657373696f6e69647c733a33323a226e6b62367335636962326a66333731396665707632626a687076663967736d6d223b),
('njrv5d21559eigjil37ugp538m5bipft', '', '127.0.0.1', 1763131108, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:145.0) Gecko/20100101 Firefox/145.0', 0x5f5f63695f6c6173745f726567656e65726174657c693a313736333133313130383b6170705f746f6b656e7c733a33323a223930346638643031303966343164306533643634343761333262346166653530223b757365725f69647c733a313a2231223b6d656d6265725f69647c733a313a2230223b6c6576656c7c733a313a2231223b757365725f6e616d657c733a393a2279756d696e616b756e223b6861735f6c6f67696e7c623a313b69705f616464726573737c733a393a223132372e302e302e31223b73657373696f6e69647c733a33323a226e6b62367335636962326a66333731396665707632626a687076663967736d6d223b),
('6oa1sq5elk5n1qsb4lea1861ke1v9but', '', '127.0.0.1', 1763131423, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:145.0) Gecko/20100101 Firefox/145.0', 0x5f5f63695f6c6173745f726567656e65726174657c693a313736333133313432333b6170705f746f6b656e7c733a33323a226332613634323938646235316366333334653062313536663138623637316137223b757365725f69647c733a313a2231223b6d656d6265725f69647c733a313a2230223b6c6576656c7c733a313a2231223b757365725f6e616d657c733a393a2279756d696e616b756e223b6861735f6c6f67696e7c623a313b69705f616464726573737c733a393a223132372e302e302e31223b73657373696f6e69647c733a33323a226e6b62367335636962326a66333731396665707632626a687076663967736d6d223b),
('g85g6i94t0scg0ifc9v64dlkbgk0cqv9', '', '127.0.0.1', 1763132330, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:145.0) Gecko/20100101 Firefox/145.0', 0x5f5f63695f6c6173745f726567656e65726174657c693a313736333133323333303b6170705f746f6b656e7c733a33323a226264656161636435393937646165346164636537353332323461373631623866223b757365725f69647c733a313a2231223b6d656d6265725f69647c733a313a2230223b6c6576656c7c733a313a2231223b757365725f6e616d657c733a393a2279756d696e616b756e223b6861735f6c6f67696e7c623a313b69705f616464726573737c733a393a223132372e302e302e31223b73657373696f6e69647c733a33323a226e6b62367335636962326a66333731396665707632626a687076663967736d6d223b),
('dd5u3p7o5n27f0v50e1f5k2ae01bmgb1', '', '127.0.0.1', 1763133112, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:145.0) Gecko/20100101 Firefox/145.0', 0x5f5f63695f6c6173745f726567656e65726174657c693a313736333133333131323b6170705f746f6b656e7c733a33323a223463393433633966616336653966353039386538323838363334643764623132223b757365725f69647c733a313a2231223b6d656d6265725f69647c733a313a2230223b6c6576656c7c733a313a2231223b757365725f6e616d657c733a393a2279756d696e616b756e223b6861735f6c6f67696e7c623a313b69705f616464726573737c733a393a223132372e302e302e31223b73657373696f6e69647c733a33323a226e6b62367335636962326a66333731396665707632626a687076663967736d6d223b),
('rc0h6e9l4cpitlktbqb8hnhvj0e67csl', '', '127.0.0.1', 1763132453, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:145.0) Gecko/20100101 Firefox/145.0', 0x5f5f63695f6c6173745f726567656e65726174657c693a313736333133323435333b6170705f746f6b656e7c733a33323a223634336435626563653535346665366165666461333762366563326533303632223b),
('r81v58thk7m24uei6gj1jpteg6arv6vp', '', '127.0.0.1', 1763133486, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:145.0) Gecko/20100101 Firefox/145.0', 0x5f5f63695f6c6173745f726567656e65726174657c693a313736333133333438363b6170705f746f6b656e7c733a33323a223839643262306331373365633436346266633062303438323839343964646133223b757365725f69647c733a313a2231223b6d656d6265725f69647c733a313a2230223b6c6576656c7c733a313a2231223b757365725f6e616d657c733a393a2279756d696e616b756e223b6861735f6c6f67696e7c623a313b69705f616464726573737c733a393a223132372e302e302e31223b73657373696f6e69647c733a33323a226e6b62367335636962326a66333731396665707632626a687076663967736d6d223b),
('io49cbnc1mth9r5m58gr6nvh4hpc9qf7', '', '127.0.0.1', 1763133878, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:145.0) Gecko/20100101 Firefox/145.0', 0x5f5f63695f6c6173745f726567656e65726174657c693a313736333133333837383b6170705f746f6b656e7c733a33323a223837613861613734366438376664336437333335363731393763363865666331223b757365725f69647c733a313a2231223b6d656d6265725f69647c733a313a2230223b6c6576656c7c733a313a2231223b757365725f6e616d657c733a393a2279756d696e616b756e223b6861735f6c6f67696e7c623a313b69705f616464726573737c733a393a223132372e302e302e31223b73657373696f6e69647c733a33323a226e6b62367335636962326a66333731396665707632626a687076663967736d6d223b),
('nbp04nvdcthfepq5nnu0mtdk05qbva20', '', '127.0.0.1', 1763134180, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:145.0) Gecko/20100101 Firefox/145.0', 0x5f5f63695f6c6173745f726567656e65726174657c693a313736333133343138303b6170705f746f6b656e7c733a33323a223439363265653332613330393733353431343931346332653232643533386462223b757365725f69647c733a313a2231223b6d656d6265725f69647c733a313a2230223b6c6576656c7c733a313a2231223b757365725f6e616d657c733a393a2279756d696e616b756e223b6861735f6c6f67696e7c623a313b69705f616464726573737c733a393a223132372e302e302e31223b73657373696f6e69647c733a33323a226e6b62367335636962326a66333731396665707632626a687076663967736d6d223b),
('f569j955feuhotn78ojmvduam643v80i', '', '127.0.0.1', 1763134682, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:145.0) Gecko/20100101 Firefox/145.0', 0x5f5f63695f6c6173745f726567656e65726174657c693a313736333133343638323b6170705f746f6b656e7c733a33323a226237643639336366356532396261303038653339346634343139653934636636223b757365725f69647c733a313a2231223b6d656d6265725f69647c733a313a2230223b6c6576656c7c733a313a2231223b757365725f6e616d657c733a393a2279756d696e616b756e223b6861735f6c6f67696e7c623a313b69705f616464726573737c733a393a223132372e302e302e31223b73657373696f6e69647c733a33323a226e6b62367335636962326a66333731396665707632626a687076663967736d6d223b),
('fa45tr1gsqn7cuiknqfl4ohim1jfo7sb', '', '127.0.0.1', 1763135039, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:145.0) Gecko/20100101 Firefox/145.0', 0x5f5f63695f6c6173745f726567656e65726174657c693a313736333133353033393b6170705f746f6b656e7c733a33323a223633393238623263353961633034346262626362383364663334623964323832223b757365725f69647c733a313a2231223b6d656d6265725f69647c733a313a2230223b6c6576656c7c733a313a2231223b757365725f6e616d657c733a393a2279756d696e616b756e223b6861735f6c6f67696e7c623a313b69705f616464726573737c733a393a223132372e302e302e31223b73657373696f6e69647c733a33323a226e6b62367335636962326a66333731396665707632626a687076663967736d6d223b),
('ivvdgl95rvenfvf4h9dnud5pe3fditg8', '', '127.0.0.1', 1763135478, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:145.0) Gecko/20100101 Firefox/145.0', 0x5f5f63695f6c6173745f726567656e65726174657c693a313736333133353437383b6170705f746f6b656e7c733a33323a223133646331643365313663643862653734663730633061666138393338303963223b757365725f69647c733a313a2231223b6d656d6265725f69647c733a313a2230223b6c6576656c7c733a313a2231223b757365725f6e616d657c733a393a2279756d696e616b756e223b6861735f6c6f67696e7c623a313b69705f616464726573737c733a393a223132372e302e302e31223b73657373696f6e69647c733a33323a226e6b62367335636962326a66333731396665707632626a687076663967736d6d223b),
('rptt4lnuiuo047vog1dmp09kb4o9o6f9', '', '127.0.0.1', 1763135735, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:145.0) Gecko/20100101 Firefox/145.0', 0x5f5f63695f6c6173745f726567656e65726174657c693a313736333133353437383b6170705f746f6b656e7c733a33323a226632336265643661303330393465613039333137333230613664393062616530223b757365725f69647c733a313a2231223b6d656d6265725f69647c733a313a2230223b6c6576656c7c733a313a2231223b757365725f6e616d657c733a393a2279756d696e616b756e223b6861735f6c6f67696e7c623a313b69705f616464726573737c733a393a223132372e302e302e31223b73657373696f6e69647c733a33323a226e6b62367335636962326a66333731396665707632626a687076663967736d6d223b);

-- --------------------------------------------------------

--
-- Table structure for table `app_simpanan`
--

CREATE TABLE `app_simpanan` (
  `id` bigint(20) NOT NULL,
  `kode` varchar(21) DEFAULT NULL,
  `tgl` date NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `jns_simp` int(4) DEFAULT NULL,
  `jumlah` decimal(20,0) DEFAULT NULL,
  `saldo_awal` set('0','1') NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(10) NOT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(10) NOT NULL,
  `status` set('0','1') NOT NULL DEFAULT '0',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `app_simpanan`
--

INSERT INTO `app_simpanan` (`id`, `kode`, `tgl`, `user_id`, `jns_simp`, `jumlah`, `saldo_awal`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`, `is_deleted`) VALUES
(1, 'SMP-250124-0000000001', '2024-12-31', 1, 1, 5000, '1', '2025-10-02 01:19:45', 6, '2025-10-02 01:19:45', 0, '0', '0'),
(2, 'SMP-250124-0000000002', '2024-12-31', 2, 1, 5000, '1', '2025-10-02 01:19:49', 6, '2025-10-02 01:19:49', 0, '0', '0'),
(3, 'SMP-250124-0000000003', '2024-12-31', 3, 1, 5000, '1', '2025-10-02 01:19:52', 6, '2025-10-02 01:19:52', 0, '0', '0'),
(4, 'SMP-250124-0000000004', '2024-12-31', 4, 1, 5000, '1', '2025-10-02 01:19:55', 6, '2025-10-02 01:19:55', 0, '0', '0'),
(5, 'SMP-250124-0000000005', '2024-12-31', 5, 1, 5000, '1', '2025-10-02 01:19:57', 6, '2025-10-02 01:19:57', 0, '0', '0'),
(6, 'SMP-250124-0000000006', '2024-12-31', 6, 1, 5000, '1', '2025-10-02 01:20:10', 6, '2025-10-02 01:20:10', 0, '0', '0'),
(7, 'SMP-250124-0000000007', '2024-12-31', 7, 1, 5000, '1', '2025-10-02 01:20:15', 6, '2025-10-02 01:20:15', 0, '0', '0'),
(8, 'SMP-250124-0000000008', '2024-12-31', 8, 1, 5000, '1', '2025-10-02 01:20:18', 6, '2025-10-02 01:20:18', 0, '0', '0'),
(9, 'SMP-250124-0000000009', '2024-12-31', 9, 1, 5000, '1', '2025-10-02 01:20:20', 6, '2025-10-02 01:20:20', 0, '0', '0'),
(10, 'SMP-250124-0000000010', '2024-12-31', 10, 1, 5000, '1', '2025-10-02 01:20:23', 6, '2025-10-02 01:20:23', 0, '0', '0'),
(11, 'SMP-250124-0000000011', '2024-12-31', 1, 2, 5570000, '1', '2025-10-02 01:20:27', 6, '2025-10-02 01:20:27', 0, '0', '0'),
(12, 'SMP-250124-0000000012', '2024-12-31', 2, 2, 10500000, '1', '2025-10-02 01:20:30', 6, '2025-10-02 01:20:30', 0, '0', '0'),
(13, 'SMP-250124-0000000013', '2024-12-31', 3, 2, 15750000, '1', '2025-10-02 01:20:33', 6, '2025-10-02 01:20:33', 0, '0', '0'),
(14, 'SMP-250124-0000000014', '2024-12-31', 4, 2, 22550000, '1', '2025-10-02 01:20:35', 6, '2025-10-02 01:20:35', 0, '0', '0'),
(15, 'SMP-250124-0000000015', '2024-12-31', 5, 2, 11250000, '1', '2025-10-02 01:20:38', 6, '2025-10-02 01:20:38', 0, '0', '0'),
(16, 'SMP-250124-0000000016', '2024-12-31', 6, 2, 6600000, '1', '2025-10-02 01:20:41', 6, '2025-10-02 01:20:41', 0, '0', '0'),
(17, 'SMP-250124-0000000017', '2024-12-31', 7, 2, 7150000, '1', '2025-10-02 01:20:49', 6, '2025-10-02 01:20:49', 0, '0', '0'),
(18, 'SMP-250124-0000000018', '2024-12-31', 8, 2, 1250000, '1', '2025-10-02 01:20:51', 6, '2025-10-02 01:20:51', 0, '0', '0'),
(19, 'SMP-250124-0000000019', '2024-12-31', 9, 2, 3450000, '1', '2025-10-02 01:20:54', 6, '2025-10-02 01:20:54', 0, '0', '0'),
(20, 'SMP-250124-0000000020', '2024-12-31', 10, 2, 2345000, '1', '2025-10-02 01:20:57', 6, '2025-10-02 01:20:57', 0, '0', '0'),
(21, 'SMP-250124-0000000021', '2024-12-31', 1, 3, 2000000, '1', '2025-10-02 01:20:59', 6, '2025-10-02 01:20:59', 0, '0', '0'),
(22, 'SMP-250124-0000000022', '2024-12-31', 2, 3, 2000000, '1', '2025-10-02 01:21:01', 6, '2025-10-02 01:21:01', 0, '0', '0'),
(23, 'SMP-250124-0000000023', '2024-12-31', 3, 3, 1000000, '1', '2025-10-02 01:21:04', 6, '2025-10-02 01:21:04', 0, '0', '0'),
(24, 'SMP-250124-0000000024', '2024-12-31', 4, 3, 1000000, '1', '2025-10-02 01:21:07', 6, '2025-10-02 01:21:07', 0, '0', '0'),
(25, 'SMP-250124-0000000025', '2024-12-31', 5, 3, 1000000, '1', '2025-10-02 01:21:09', 6, '2025-10-02 01:21:09', 0, '0', '0'),
(26, 'SMP-250124-0000000026', '2024-12-31', 6, 3, 1000000, '1', '2025-10-02 01:21:31', 6, '2025-10-02 01:21:31', 0, '0', '0'),
(27, 'SMP-250124-0000000027', '2024-12-31', 7, 3, 1000000, '1', '2025-10-02 01:21:35', 6, '2025-10-02 01:21:35', 0, '0', '0'),
(28, 'SMP-250124-0000000028', '2024-12-31', 8, 3, 1000000, '1', '2025-10-02 01:21:37', 6, '2025-10-02 01:21:37', 0, '0', '0'),
(29, 'SMP-250124-0000000029', '2024-12-31', 9, 3, 1000000, '1', '2025-10-02 01:21:40', 6, '2025-10-02 01:21:40', 0, '0', '0'),
(30, 'SMP-250124-0000000030', '2024-12-31', 10, 3, 1000000, '1', '2025-10-02 01:21:42', 6, '2025-10-02 01:21:42', 0, '0', '0'),
(31, 'SMP-250123-0000000031', '2024-12-31', 1, 4, 2500000, '1', '2025-10-02 01:21:44', 6, '2025-10-02 01:21:44', 0, '0', '0'),
(32, 'SMP-250123-0000000032', '2024-12-31', 2, 4, 1750000, '1', '2025-10-02 01:21:50', 6, '2025-10-02 01:21:50', 0, '0', '0'),
(33, 'SMP-250123-0000000033', '2024-12-31', 3, 4, 2350000, '1', '2025-10-02 01:21:53', 6, '2025-10-02 01:21:53', 0, '0', '0'),
(34, 'SMP-250123-0000000034', '2024-12-31', 4, 4, 550000, '1', '2025-10-02 01:21:55', 6, '2025-10-02 01:21:55', 0, '0', '0'),
(35, 'SMP-250123-0000000035', '2024-12-31', 5, 4, 1250000, '1', '2025-10-02 01:21:57', 6, '2025-10-02 01:21:57', 0, '0', '0'),
(36, 'SMP-250123-0000000036', '2024-12-31', 6, 4, 2250000, '1', '2025-10-02 01:22:01', 6, '2025-10-02 01:22:01', 0, '0', '0'),
(37, 'SMP-250123-0000000037', '2024-12-31', 7, 4, 750000, '1', '2025-10-02 01:22:03', 6, '2025-10-02 01:22:03', 0, '0', '0'),
(38, 'SMP-250123-0000000038', '2024-12-31', 8, 4, 250000, '1', '2025-10-02 01:22:05', 6, '2025-10-02 01:22:05', 0, '0', '0'),
(39, 'SMP-250123-0000000039', '2024-12-31', 9, 4, 2345000, '1', '2025-10-02 01:22:16', 6, '2025-10-02 01:22:16', 0, '0', '0'),
(40, 'SMP-250123-0000000040', '2024-12-31', 10, 4, 1350000, '1', '2025-10-02 01:22:19', 6, '2025-10-02 01:22:19', 0, '0', '0'),
(41, 'SMP-250228-0000000041', '2025-01-24', 1, 2, 150000, '0', '2025-10-02 01:23:20', 6, '2025-10-02 01:23:20', 0, '0', '0'),
(42, 'SMP-250124-0000000042', '2025-02-25', 1, 2, 150000, '0', '2025-10-02 01:23:35', 6, '2025-10-02 01:23:35', 0, '0', '0'),
(43, 'SMP-250328-0000000043', '2025-03-28', 1, 2, 150000, '0', '2025-10-02 01:25:44', 6, NULL, 0, '0', '0'),
(44, 'SMP-250425-0000000044', '2025-04-25', 1, 2, 150000, '0', '2025-10-02 01:25:56', 6, NULL, 0, '0', '0'),
(45, 'SMP-250530-0000000045', '2025-05-30', 1, 2, 150000, '0', '2025-10-02 01:26:09', 6, NULL, 0, '0', '0'),
(46, 'SMP-250627-0000000046', '2025-06-27', 1, 2, 150000, '0', '2025-10-02 01:26:25', 6, NULL, 0, '0', '0'),
(47, 'SMP-250731-0000000047', '2025-07-31', 1, 2, 150000, '0', '2025-10-02 01:26:38', 6, NULL, 0, '0', '0'),
(48, 'SMP-250829-0000000048', '2025-08-29', 1, 2, 150000, '0', '2025-10-02 01:26:50', 6, NULL, 0, '0', '0'),
(49, 'SMP-250930-0000000049', '2025-09-30', 1, 2, 150000, '0', '2025-10-02 01:27:02', 6, NULL, 0, '0', '0'),
(50, 'SMP-250127-0000000050', '2025-01-27', 2, 2, 150000, '0', '2025-10-02 01:33:27', 6, NULL, 0, '0', '0'),
(51, 'SMP-250227-0000000051', '2025-02-27', 2, 2, 150000, '0', '2025-10-02 01:33:38', 6, NULL, 0, '0', '0'),
(52, 'SMP-250327-0000000052', '2025-03-27', 2, 2, 150000, '0', '2025-10-02 01:33:50', 6, NULL, 0, '0', '0'),
(53, 'SMP-250423-0000000053', '2025-04-23', 2, 2, 150000, '0', '2025-10-02 17:47:39', 6, NULL, 0, '0', '0'),
(54, 'SMP-250529-0000000054', '2025-05-29', 2, 2, 150000, '0', '2025-10-02 17:56:46', 6, NULL, 0, '0', '0'),
(55, 'SMP-250627-0000000055', '2025-06-27', 2, 2, 150000, '0', '2025-10-02 17:57:03', 6, NULL, 0, '0', '0'),
(56, 'SMP-250730-0000000056', '2025-07-30', 2, 2, 150000, '0', '2025-10-02 17:57:18', 6, NULL, 0, '0', '0'),
(57, 'SMP-250829-0000000057', '2025-08-29', 2, 2, 150000, '0', '2025-10-02 17:57:32', 6, NULL, 0, '0', '0'),
(58, 'SMP-250925-0000000058', '2025-09-25', 2, 2, 150000, '0', '2025-10-02 17:57:59', 6, NULL, 0, '0', '0'),
(59, 'SMP-250925-0000000059', '2025-01-24', 3, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(60, 'SMP-250925-0000000060', '2025-02-25', 3, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(61, 'SMP-250925-0000000061', '2025-03-28', 3, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(62, 'SMP-250925-0000000062', '2025-04-25', 3, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(63, 'SMP-250925-0000000063', '2025-05-30', 3, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(64, 'SMP-250925-0000000064', '2025-06-27', 3, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(65, 'SMP-250925-0000000065', '2025-07-31', 3, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(66, 'SMP-250925-0000000066', '2025-08-29', 3, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(67, 'SMP-250925-0000000067', '2025-09-30', 3, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(68, 'SMP-250925-0000000068', '2025-01-24', 4, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(69, 'SMP-250925-0000000069', '2025-02-25', 4, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(70, 'SMP-250925-0000000070', '2025-03-28', 4, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(71, 'SMP-250925-0000000071', '2025-04-25', 4, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(72, 'SMP-250925-0000000072', '2025-05-30', 4, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(73, 'SMP-250925-0000000073', '2025-06-27', 4, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(74, 'SMP-250925-0000000074', '2025-07-31', 4, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(75, 'SMP-250925-0000000075', '2025-08-29', 4, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(76, 'SMP-250925-0000000076', '2025-09-30', 4, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(77, 'SMP-250925-0000000077', '2025-01-24', 5, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(78, 'SMP-250925-0000000078', '2025-02-25', 5, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(79, 'SMP-250925-0000000079', '2025-03-28', 5, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(80, 'SMP-250925-0000000080', '2025-04-25', 5, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(81, 'SMP-250925-0000000081', '2025-05-30', 5, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(82, 'SMP-250925-0000000082', '2025-06-27', 5, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(83, 'SMP-250925-0000000083', '2025-07-31', 5, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(84, 'SMP-250925-0000000084', '2025-08-29', 5, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(85, 'SMP-250925-0000000085', '2025-09-30', 5, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(86, 'SMP-250925-0000000086', '2025-01-24', 6, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(87, 'SMP-250925-0000000087', '2025-02-25', 6, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(88, 'SMP-250925-0000000088', '2025-03-28', 6, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(89, 'SMP-250925-0000000089', '2025-04-25', 6, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(90, 'SMP-250925-0000000090', '2025-05-30', 6, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(91, 'SMP-250925-0000000091', '2025-06-27', 6, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(92, 'SMP-250925-0000000092', '2025-07-31', 6, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(93, 'SMP-250925-0000000093', '2025-08-29', 6, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(94, 'SMP-250925-0000000094', '2025-09-30', 6, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(95, 'SMP-250925-0000000095', '2025-01-24', 7, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(96, 'SMP-250925-0000000096', '2025-02-25', 7, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(97, 'SMP-250925-0000000097', '2025-03-28', 7, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(98, 'SMP-250925-0000000098', '2025-04-25', 7, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(99, 'SMP-250925-0000000099', '2025-05-30', 7, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(100, 'SMP-250925-0000000100', '2025-06-27', 7, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(101, 'SMP-250925-0000000101', '2025-07-31', 7, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(102, 'SMP-250925-0000000102', '2025-08-29', 7, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(103, 'SMP-250925-0000000103', '2025-09-30', 7, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(104, 'SMP-250925-0000000104', '2025-01-24', 8, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(105, 'SMP-250925-0000000105', '2025-02-25', 8, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(106, 'SMP-250925-0000000106', '2025-03-28', 8, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(107, 'SMP-250925-0000000107', '2025-04-25', 8, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(108, 'SMP-250925-0000000108', '2025-05-30', 8, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(109, 'SMP-250925-0000000109', '2025-06-27', 8, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(110, 'SMP-250925-0000000110', '2025-07-31', 8, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(111, 'SMP-250925-0000000111', '2025-08-29', 8, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(112, 'SMP-250925-0000000112', '2025-09-30', 8, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(113, 'SMP-250925-0000000113', '2025-01-24', 9, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(114, 'SMP-250925-0000000114', '2025-02-25', 9, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(115, 'SMP-250925-0000000115', '2025-03-28', 9, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(116, 'SMP-250925-0000000116', '2025-04-25', 9, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(117, 'SMP-250925-0000000117', '2025-05-30', 9, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(118, 'SMP-250925-0000000118', '2025-06-27', 9, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(119, 'SMP-250925-0000000119', '2025-07-31', 9, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(120, 'SMP-250925-0000000120', '2025-08-29', 9, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(121, 'SMP-250925-0000000121', '2025-09-30', 9, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(122, 'SMP-250925-0000000122', '2025-01-24', 10, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(123, 'SMP-250925-0000000123', '2025-02-25', 10, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(124, 'SMP-250925-0000000124', '2025-03-28', 10, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(125, 'SMP-250925-0000000125', '2025-04-25', 10, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(126, 'SMP-250925-0000000126', '2025-05-30', 10, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(127, 'SMP-250925-0000000127', '2025-06-27', 10, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(128, 'SMP-250925-0000000128', '2025-07-31', 10, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(129, 'SMP-250925-0000000129', '2025-08-29', 10, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(130, 'SMP-250925-0000000130', '2025-09-30', 10, 2, 150000, '0', '0000-00-00 00:00:00', 6, NULL, 0, '0', '0'),
(131, 'SMP-250116-0000000131', '2025-01-16', 1, 3, 100000, '0', '2025-10-02 18:28:58', 6, NULL, 0, '0', '0'),
(132, 'SMP-250227-0000000132', '2025-02-27', 1, 3, 100000, '0', '2025-10-02 18:29:12', 6, NULL, 0, '0', '0'),
(133, 'SMP-250328-0000000133', '2025-03-28', 1, 3, 100000, '0', '2025-10-02 18:30:04', 6, NULL, 0, '0', '0'),
(134, 'SMP-250424-0000000134', '2025-04-24', 1, 3, 50000, '0', '2025-10-05 00:18:13', 6, NULL, 0, '0', '0'),
(135, 'SMP-250526-0000000135', '2025-05-26', 1, 3, 50000, '0', '2025-10-05 00:18:36', 6, NULL, 0, '0', '0'),
(136, 'SMP-250625-0000000136', '2025-06-25', 1, 3, 100000, '0', '2025-10-05 00:18:51', 6, NULL, 0, '0', '0'),
(137, 'SMP-250724-0000000137', '2025-07-24', 1, 3, 50000, '0', '2025-10-05 00:19:06', 6, NULL, 0, '0', '0'),
(138, 'SMP-250827-0000000138', '2025-08-27', 1, 3, 25000, '0', '2025-10-05 00:19:22', 6, NULL, 0, '0', '0'),
(139, 'SMP-250930-0000000139', '2025-09-30', 1, 3, 25000, '0', '2025-10-05 00:20:00', 6, NULL, 0, '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `app_system`
--

CREATE TABLE `app_system` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `isi` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(10) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `app_system`
--

INSERT INTO `app_system` (`id`, `nama`, `isi`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'aplikasi', 'Koperasi Simpan Pinjam', '2025-11-11 02:14:25', 1, '2025-11-11 02:14:25', 1),
(2, 'nama_aplikasi', 'TIRTA LANGGENG', '2025-11-11 02:14:25', 1, '2025-11-11 02:14:25', 1),
(3, 'favicon', 'favicon.ico', '2025-11-11 02:25:04', NULL, '2025-11-11 02:25:04', NULL),
(4, 'meta_description', 'Sistem Informasi Koperasi Simpan Pinjam Karyawan TIRTA LANGGENG PUDAM KAB DEMAK', '2025-11-11 02:25:04', NULL, '2025-11-11 02:25:04', NULL),
(5, 'meta_keywords', 'Sistem Informasi Koperasi Simpan Pinjam Karyawan TIRTA LANGGENG PUDAM KAB DEMAK', '2025-11-11 02:26:13', NULL, '2025-11-11 02:26:13', NULL),
(6, 'author', 'Achmad Solachudin - LEGOLAS Komputer', '2025-11-11 02:26:13', NULL, '2025-11-11 02:26:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `app_thn_buku`
--

CREATE TABLE `app_thn_buku` (
  `id` int(10) NOT NULL,
  `periode` year(4) NOT NULL,
  `awal` date NOT NULL,
  `akhir` date NOT NULL,
  `active` set('0','1') NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT current_timestamp(),
  `created_by` int(10) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `app_thn_buku`
--

INSERT INTO `app_thn_buku` (`id`, `periode`, `awal`, `akhir`, `active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, '2023', '2023-01-01', '2023-12-31', '1', '2024-02-17 18:27:16', 1, '2024-08-21 08:57:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `app_transaksi`
--

CREATE TABLE `app_transaksi` (
  `id` bigint(20) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `jenis` set('debet','kredit') DEFAULT NULL,
  `unit` varchar(2) NOT NULL,
  `tgl` date NOT NULL,
  `akun_id` int(10) DEFAULT NULL,
  `jumlah` decimal(20,0) NOT NULL,
  `pokok` decimal(16,0) NOT NULL,
  `bunga` decimal(16,0) NOT NULL,
  `bukti` blob NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `created_by` int(4) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_users`
--

CREATE TABLE `app_users` (
  `id` int(10) NOT NULL,
  `member_id` int(5) DEFAULT NULL,
  `group_id` int(5) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `user_forgot_password_key` varchar(200) DEFAULT NULL,
  `user_forgot_password_request_date` datetime DEFAULT NULL,
  `aktifasi` set('sudah','belum') NOT NULL DEFAULT 'belum',
  `status` set('diterima','ditolak') NOT NULL DEFAULT 'ditolak',
  `has_login` set('true','false') NOT NULL DEFAULT 'false',
  `ip_address` varchar(20) DEFAULT NULL,
  `sessionid` varchar(200) DEFAULT NULL,
  `last_logged_in` timestamp NULL DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(4) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `app_users`
--

INSERT INTO `app_users` (`id`, `member_id`, `group_id`, `username`, `email`, `password`, `user_forgot_password_key`, `user_forgot_password_request_date`, `aktifasi`, `status`, `has_login`, `ip_address`, `sessionid`, `last_logged_in`, `created_at`, `created_by`, `updated_at`) VALUES
(1, 0, 1, 'yuminakun', 'legolaskomp@gmail.com', '$2y$10$1opJPzAkufRAxY7Z3mJZremfedyZfE8m.nlIMVGSODCIOa2.L8o8u', NULL, NULL, 'sudah', 'diterima', 'true', '127.0.0.1', 'nkb6s5cib2jf3719fepv2bjhpvf9gsmm', '2025-11-14 14:14:55', '2022-10-19 19:38:35', 1, NULL),
(2, 1, 5, 'akholiq', 'abdul.kholiq@pdamkabdemak.com', '$2y$10$kIDO.TCxjkyBNNEU3Z30q.PiXom9Qtd3a2R7r2k2TyvFALwkY3MAu', NULL, NULL, 'sudah', 'diterima', 'true', '127.0.0.1', '8ebhr6oq54rmk1qqv2v0epg39eqmce0a', '2025-03-28 09:49:02', NULL, NULL, NULL),
(3, 2, 5, 'abdulw', 'abdul.wahid@pdamkabdemak.com', '$2y$10$sL.RHAZ.m45nTTSUiVdNK.pYYEqY1O5a.tKrroh3a8lqSeuaGSLT.', NULL, NULL, 'sudah', 'diterima', 'false', NULL, NULL, '2025-03-26 08:00:00', NULL, NULL, NULL),
(4, 3, 5, '32741212820002', 'abdullah.mahsun@pdamkabdemak.com', '$2y$10$BWzXPYU2lnEZLAGGrgbubelYrt97Xbz0jqQIbLjJTWoK.5Q3latSi', NULL, NULL, 'sudah', 'diterima', 'false', NULL, NULL, '2025-03-26 19:35:25', NULL, NULL, NULL),
(5, 4, 5, '32741215460003', 'agus.wahid@pdamkabdemak.com', '$2y$10$Ek7g/BO6Ivvh/qjYcxSIdOLYZQMzOuaYk5DmHAVtePxg7XZ3Cod/a', NULL, NULL, 'sudah', 'diterima', 'false', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 5, 2, 'administrator', 'achmadsolachudin82@gmail.com', '$2y$10$lSAOaIVBJyqj12fUq09pL.6iVV4D7EHpxt7IoJVyBErZtiNRoOzaa', NULL, NULL, 'sudah', 'diterima', 'false', NULL, NULL, '2025-11-14 14:12:20', NULL, NULL, NULL),
(7, 6, 5, 'fajars', 'fajar.sulistiyono@pdamkabdemak.com', '$2y$10$CvwZrpPzqoo603Et57VUWOrfbLJ/zHRfuCkllL5sNfGUjXurRmegK', NULL, NULL, 'sudah', 'diterima', 'false', NULL, NULL, '2025-10-04 11:16:41', NULL, NULL, NULL),
(8, 7, 5, 'bagus', 'achmadsoegeng79@gmail.com', '$2y$10$X13k/156wtb3WLs/5usGTe5n4pMyNKQkQZ0dGau3h1GjAkN.8Kxkm', NULL, NULL, 'sudah', 'diterima', 'false', NULL, NULL, '2025-04-04 21:28:24', NULL, NULL, NULL),
(9, 8, 5, '7393027629876541', 'japar07@gmail.com', '$2y$10$MB25zRYfBAYhcPzk8PwlJ.iEtIlFbzXQ3/z0gxWhtkhp6VDJBdoEy', NULL, NULL, 'sudah', 'diterima', 'false', NULL, NULL, NULL, '2025-04-15 08:52:23', NULL, NULL),
(10, 9, 5, '3671041708800005', 'adley.iyus@gmail.com', '$2y$10$VOQgcAYFJR8AZzSx.PBbFuMiYzYeYHhB2u7KFhcl4gIHUkbAFgKqq', NULL, NULL, 'sudah', 'diterima', 'false', NULL, NULL, NULL, '2025-04-23 22:20:33', NULL, NULL),
(11, 10, 5, '32742020020001', 'melvina@gmail.com', '$2y$10$QuPubUbSfO4dWgJzPCFC4OuDstlPm7aVyYY1Pl0lAiKxDMZwoAjTG', NULL, NULL, 'sudah', 'diterima', 'false', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `app_users_privileges`
--

CREATE TABLE `app_users_privileges` (
  `id` bigint(20) NOT NULL,
  `level_id` int(10) NOT NULL,
  `module_id` int(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `app_users_privileges`
--

INSERT INTO `app_users_privileges` (`id`, `level_id`, `module_id`, `created_at`) VALUES
(1, 2, 1, '2025-11-13 13:36:07'),
(2, 2, 2, '2025-11-13 13:36:07'),
(3, 2, 3, '2025-11-13 13:44:40'),
(4, 2, 4, '2025-11-13 13:44:40'),
(5, 2, 5, '2025-11-13 13:46:13'),
(7, 2, 6, '2025-11-13 21:13:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_anggota`
--
ALTER TABLE `app_anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_angsuran`
--
ALTER TABLE `app_angsuran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_cabang`
--
ALTER TABLE `app_cabang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_jasa`
--
ALTER TABLE `app_jasa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_jns_pinj`
--
ALTER TABLE `app_jns_pinj`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_jns_simp`
--
ALTER TABLE `app_jns_simp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_login_attempts`
--
ALTER TABLE `app_login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_menus`
--
ALTER TABLE `app_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_penarikan`
--
ALTER TABLE `app_penarikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_penutupan`
--
ALTER TABLE `app_penutupan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_pinjaman`
--
ALTER TABLE `app_pinjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_saldo_awal`
--
ALTER TABLE `app_saldo_awal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_simpanan`
--
ALTER TABLE `app_simpanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_system`
--
ALTER TABLE `app_system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_transaksi`
--
ALTER TABLE `app_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_users`
--
ALTER TABLE `app_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_users_privileges`
--
ALTER TABLE `app_users_privileges`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_anggota`
--
ALTER TABLE `app_anggota`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT for table `app_angsuran`
--
ALTER TABLE `app_angsuran`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_cabang`
--
ALTER TABLE `app_cabang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `app_jasa`
--
ALTER TABLE `app_jasa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `app_jns_pinj`
--
ALTER TABLE `app_jns_pinj`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `app_jns_simp`
--
ALTER TABLE `app_jns_simp`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `app_menus`
--
ALTER TABLE `app_menus`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `app_penarikan`
--
ALTER TABLE `app_penarikan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_penutupan`
--
ALTER TABLE `app_penutupan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_pinjaman`
--
ALTER TABLE `app_pinjaman`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_saldo_awal`
--
ALTER TABLE `app_saldo_awal`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_simpanan`
--
ALTER TABLE `app_simpanan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `app_system`
--
ALTER TABLE `app_system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `app_transaksi`
--
ALTER TABLE `app_transaksi`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_users_privileges`
--
ALTER TABLE `app_users_privileges`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
