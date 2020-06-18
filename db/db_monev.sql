-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2020 at 07:43 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_monev`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank`
--

CREATE TABLE `tbl_bank` (
  `id_bank` bigint(11) NOT NULL,
  `kd_bank` varchar(10) DEFAULT '',
  `nm_bank` varchar(255) DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bank`
--

INSERT INTO `tbl_bank` (`id_bank`, `kd_bank`, `nm_bank`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, '002', 'BANK BRI', '2020-02-27 00:47:38', 1, NULL, NULL),
(2, '014', 'BANK BCA', '2020-02-27 00:47:51', 1, NULL, NULL),
(3, '008', 'BANK MANDIRI', '2020-02-27 00:48:03', 1, NULL, NULL),
(4, '009', 'BANK BNI', '2020-02-27 00:48:17', 1, NULL, NULL),
(5, '427', 'BANK BNI SYARIAH', '2020-02-27 00:48:30', 1, NULL, NULL),
(6, '451', 'BANK SYARIAH MANDIRI (BSM)', '2020-02-27 00:48:51', 1, NULL, NULL),
(7, '022', 'BANK CIMB NIAGA', '2020-02-27 00:49:03', 1, NULL, NULL),
(8, '022', 'BANK CIMB NIAGA SYARIAH', '2020-02-27 00:49:28', 1, NULL, NULL),
(9, '147', 'BANK MUAMALAT', '2020-02-27 00:49:43', 1, NULL, NULL),
(10, '213', 'BANK BTPN', '2020-02-27 00:49:55', 1, NULL, NULL),
(11, '547', 'BANK BTPN SYARIAH', '2020-02-27 00:50:06', 1, NULL, NULL),
(12, '213', 'JENIUS', '2020-02-27 00:50:23', 1, NULL, NULL),
(13, '422', 'BANK BRI SYARIAH', '2020-02-27 00:50:34', 1, NULL, NULL),
(14, '200', 'BANK BTN', '2020-02-27 00:50:44', 1, NULL, NULL),
(15, '013', 'BANK PERMATA', '2020-02-27 00:50:54', 1, NULL, NULL),
(16, '011', 'BANK DANAMON', '2020-02-27 00:51:07', 1, NULL, NULL),
(17, '016', 'BANK BII MAYBANK', '2020-02-27 00:51:17', 1, NULL, NULL),
(18, '426', 'BANK MEGA', '2020-02-27 00:51:35', 1, NULL, NULL),
(19, '153', 'BANK SINARMAS', '2020-02-27 00:51:52', 1, NULL, NULL),
(20, '950', 'BANK COMMONWEALTH', '2020-02-27 00:52:02', 1, NULL, NULL),
(21, '028', 'BANK OCBC NISP', '2020-02-27 00:52:10', 1, NULL, NULL),
(22, '441', 'BANK BUKOPIN', '2020-02-27 00:52:19', 1, NULL, NULL),
(23, '521', 'BANK BUKOPIN SYARIAH', '2020-02-27 00:52:28', 1, NULL, NULL),
(24, '536', 'BANK BCA SYARIAH', '2020-02-27 00:52:41', 1, NULL, NULL),
(25, '026', 'BANK LIPPO', '2020-02-27 00:52:54', 1, NULL, NULL),
(26, '031', 'CITIBANK', '2020-02-27 00:53:03', 1, NULL, NULL),
(27, '110', 'BANK JABAR', '2020-02-27 00:53:14', 1, NULL, NULL),
(28, '111', 'BANK DKI JAKARTA', '2020-02-27 00:53:24', 1, NULL, NULL),
(29, '112', 'BPD DIY (YOGYAKARTA)', '2020-02-27 00:53:34', 1, NULL, NULL),
(30, '113', 'BANK JATENG (JAWA TENGAH)', '2020-02-27 00:53:43', 1, NULL, NULL),
(31, '114', 'BANK JATIM (JAWA BARAT)', '2020-02-27 00:53:54', 1, NULL, NULL),
(32, '115', 'BPD JAMBI', '2020-02-27 00:54:03', 1, NULL, NULL),
(33, '116', 'BPD ACEH', '2020-02-27 00:54:10', 1, NULL, NULL),
(34, '116', 'BPD ACEH SYARIAH', '2020-02-27 00:54:20', 1, NULL, NULL),
(35, '117', 'BANK SUMUT', '2020-02-27 00:54:29', 1, NULL, NULL),
(36, '118', 'BANK NAGARI (BANK SUMBAR)', '2020-02-27 00:54:40', 1, NULL, NULL),
(37, '119', 'BANK RIAU KEPRI', '2020-02-27 00:54:52', 1, NULL, NULL),
(38, '120', 'BANK SUMSEL BABEL', '2020-02-27 00:55:05', 1, NULL, NULL),
(39, '121', 'BANK LAMPUNG', '2020-02-27 00:55:13', 1, NULL, NULL),
(40, '122', 'BANK KALSEL (BANK KALIMANTAN SELATAN)', '2020-02-27 00:55:25', 1, NULL, NULL),
(41, '123', 'BANK KALBAR (BANK KALIMANTAN BARAT)', '2020-02-27 00:55:34', 1, NULL, NULL),
(42, '124', 'BANK KALTIMTARA (BANK KALIMANTAN TIMUR DAN UTARA)', '2020-02-27 00:55:42', 1, NULL, NULL),
(43, '125', 'BANK KALTENG (BANK KALIMANTAN TENGAH)', '2020-02-27 00:55:51', 1, NULL, NULL),
(44, '126', 'BANK SULSELBAR (BANK SULAWESI SELATAN DAN BARAT)', '2020-02-27 00:56:01', 1, NULL, NULL),
(45, '127', 'BANK SULUTGO (BANK SULAWESI UTARA DAN GORONTALO)', '2020-02-27 00:56:09', 1, NULL, NULL),
(46, '128', 'BANK NTB', '2020-02-27 00:56:18', 1, NULL, NULL),
(47, '128', 'BANK NTB SYARIAH', '2020-02-27 00:56:27', 1, NULL, NULL),
(48, '129', 'BANK BPD BALI', '2020-02-27 00:56:35', 1, NULL, NULL),
(49, '130', 'BANK NTT', '2020-02-27 00:56:45', 1, NULL, NULL),
(50, '131', 'BANK MALUKU MALUT', '2020-02-27 00:56:52', 1, NULL, NULL),
(51, '132', 'BANK PAPUA', '2020-02-27 00:57:00', 1, NULL, NULL),
(52, '133', 'BANK BENGKULU', '2020-02-27 00:57:14', 1, NULL, NULL),
(53, '134', 'BANK SULTENG (BANK SULAWESI TENGAH)', '2020-02-27 00:57:24', 1, NULL, NULL),
(54, '135', 'BANK SULTRA', '2020-02-27 00:57:34', 1, NULL, NULL),
(55, '137', 'BANK BPD BANTEN', '2020-02-27 00:57:42', 1, '2020-02-27 00:57:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_instansi`
--

CREATE TABLE `tbl_instansi` (
  `id_instansi` bigint(11) NOT NULL,
  `kd_instansi` varchar(10) DEFAULT NULL,
  `nm_instansi` varchar(255) DEFAULT NULL,
  `alamat_instansi` varchar(255) DEFAULT NULL,
  `no_telepon` varchar(50) DEFAULT NULL,
  `no_fax` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_instansi`
--

INSERT INTO `tbl_instansi` (`id_instansi`, `kd_instansi`, `nm_instansi`, `alamat_instansi`, `no_telepon`, `no_fax`, `email`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, '061002', 'Universitas Islam Sultan Agung', 'Jalan Raya Kaligawe Km 4, Terboyo Kulon, Gunuk', '(024)6583584', '(024)6583455', 'informasi@unissula.ac.id', '2020-02-26 22:31:26', 1, '2020-02-28 19:30:57', 0),
(2, '061031', 'Universitas Dian Nuswantoro', 'Kampus I : Jalan Imam Bonjol 207 Semarang 50131 \r\nKampus II : Jalan Nakula I No', '024-3517261', '024-3569684', 'sekretariat@dinus.ac.id', '2020-02-28 19:32:11', 1, NULL, NULL),
(3, '061029', 'Universitas Stikubank', 'Jalan Tri Lomba Juang No 1', '024-8311668', '024-8443240', 'info@unisbank.ac.id', '2020-02-28 19:33:32', 1, NULL, NULL),
(4, '061016', 'Universitas Veteran Bangun Nusantara', 'Jl Letjen Sujono Humardani No 1 Jombor', '0271 593156', '0271 591065', 'univetbantara@yahoo.com', '2020-02-28 19:34:58', 1, NULL, NULL),
(5, '061026', 'Universitas Muhammadiyah Semarang', 'Jalan Kedungmundu Raya 18 Kecamatan Tembalang', '024-76740296', '024-76740291', 'info@unimus.ac.id', '2020-02-28 19:36:15', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `id_mahasiswa` bigint(20) NOT NULL,
  `nim` varchar(20) DEFAULT NULL,
  `nm_mahasiswa` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `jenis_beasiswa` enum('Baru','On Going') DEFAULT NULL,
  `id_instansi` bigint(20) DEFAULT NULL,
  `fakultas` varchar(100) DEFAULT NULL,
  `program_studi` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('P','L') DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL,
  `ipk` decimal(10,2) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT '',
  `alamat` text DEFAULT NULL,
  `id_pendidikan` int(11) DEFAULT NULL,
  `jumlah_prestasi` int(11) DEFAULT NULL,
  `jumlah_organisasi` int(11) DEFAULT NULL,
  `nama_orang_tua` varchar(100) DEFAULT NULL,
  `pekerjaan_orang_tua` varchar(100) DEFAULT NULL,
  `penghasilan_orang_tua` decimal(20,2) DEFAULT NULL,
  `jumlah_tanggungan` int(2) DEFAULT NULL,
  `no_hp_orang_tua` varchar(20) DEFAULT NULL,
  `no_rekening_mahasiswa` varchar(20) DEFAULT NULL,
  `id_bank` bigint(20) DEFAULT NULL,
  `cabang_bank` varchar(100) DEFAULT NULL,
  `lampiran` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1 COMMENT '0 = Perlu Dibina, 1 = Tidak Perlu Dibina',
  `aktif` enum('Tidak','Ya') DEFAULT 'Ya' COMMENT 'Untuk Status Mahasiswa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`id_mahasiswa`, `nim`, `nm_mahasiswa`, `tanggal_lahir`, `tempat_lahir`, `jenis_beasiswa`, `id_instansi`, `fakultas`, `program_studi`, `jenis_kelamin`, `semester`, `ipk`, `no_hp`, `alamat`, `id_pendidikan`, `jumlah_prestasi`, `jumlah_organisasi`, `nama_orang_tua`, `pekerjaan_orang_tua`, `penghasilan_orang_tua`, `jumlah_tanggungan`, `no_hp_orang_tua`, `no_rekening_mahasiswa`, `id_bank`, `cabang_bank`, `lampiran`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`, `aktif`) VALUES
(1, '001002001', 'Aninditha Rahma Cahyadi', '2000-03-01', 'Depok', 'On Going', 1, 'Kedokteran', 'Kedokteran Umum	', 'P', '3', '3.00', '0857-1111-1111', 'Depok, Jawa Barat', 3, 2, 1, 'Cahyadi', 'PNS', '600000000000000.00', 2, '0857-1111-1112', '1111085711111111', 4, 'Depok', '0010020014.rar', '2020-02-27 23:30:43', 2, '2020-03-01 19:53:33', 1, 1, 'Ya'),
(2, '001002002', 'Aurel Mayori Putri', '2020-02-29', 'Bogor', 'On Going', 1, 'Kedokteran', 'Kedokteran Umum	', 'P', '3', '3.00', '0858-1111-1111', 'Bogor, Jawa Barat', 5, 2, 3, 'Husein', 'Buruh', '560000000000000.00', 2, '0858-1111-1112', '1111085811111111', 1, 'Bogor', '001002002.zip', '2020-02-28 09:24:31', 1, '2020-03-01 19:53:44', 1, 1, 'Ya'),
(3, '001002003', 'Gabriel Angelina', '2020-02-29', 'Subang', 'On Going', 1, 'Ekonomi dan Bisnis', 'Ekonomi', 'P', '3', '3.10', '0813-2222-2221', 'Bandung, Jawa Barat', 5, 2, 3, 'Robert', 'Wirausaha', '900000000.00', 3, '0813-2222-2222', '2221081322222221', 1, 'Bandung', '001002003.rar', '2020-02-28 09:28:28', 1, '2020-02-29 20:07:52', 1, 1, 'Ya'),
(4, '001002004', 'Andre Pamungkas', '2020-02-29', 'Bogor', 'On Going', 1, 'Ekonomi dan Bisnis', 'Ekonomi', 'L', '3', '3.84', '0818-8888-8881', 'Pondok Indah, Jakarta Selatan', 5, 3, 1, 'Gerald', 'Wirausaha', '1200000000.00', 3, '0818-8888-8882', '88888888', 2, 'Pondok Indah', '001002004.rar', '2020-02-28 09:33:21', 1, '2020-02-29 19:55:22', 2, 1, 'Ya'),
(5, '001002005', 'Roman Burki', '2020-02-28', 'Jakarta', 'On Going', 3, 'Ilmu Komputer', 'Ilmu Komputer', 'L', '3', '3.90', '0819-9191-9191', 'Depok, Indonesia', 5, 2, 1, 'Johanes', 'PNS', '500000000.00', 2, '0819-9191-9192', '9191081991919191', 1, 'Depok', '001002005.zip', '2020-02-28 09:38:13', 1, '2020-02-28 23:56:18', 1, 1, 'Ya'),
(6, '001002006', 'Marco Asensio', '2020-02-28', 'Jakarta', 'On Going', 3, 'Ilmu Komputer', 'Ilmu Komputer', 'L', '3', '2.38', '0813-3131-3131', 'Menteng, Jakarta Selatan', 5, 0, 0, 'Assen', 'Wirausaha', '100000000000.00', 2, '0813-3131-3132', '31313131', 2, 'Menteng', '001002006.zip', '2020-02-28 09:40:56', 1, '2020-02-29 20:08:13', 1, 0, 'Ya'),
(7, '001002007', 'Thomas Meunier', '2020-02-28', 'Jakarta', 'On Going', 3, 'Ilmu Komputer', 'Ilmu Komputer', 'L', '3', '2.71', '0819-4414-4441', 'Buah Batu, Bandung', 5, 1, 1, 'Meunier', 'Buruh', '900000000.00', 3, '0819-4414-4442', '4441081944144441', 13, 'Buah Batu', '001002007.rar', '2020-02-28 09:46:53', 1, '2020-02-28 23:56:48', 1, 0, 'Ya'),
(9, 'A11.2016.000000', 'Jarwo Kuat', '1999-07-22', 'Kudus', 'Baru', 2, 'Ilmu Komputer', 'Teknik Informatika', 'L', '1', '3.10', '1231-2312-3123', 'Semarang', 5, 1, 1, 'Sudibjo', 'PNS', '200000000.00', 2, '0909-0901-23123', '19023819208312', 4, 'Bogor', NULL, '2020-03-01 20:01:48', 3, '2020-03-03 17:34:03', 3, 1, 'Ya'),
(10, 'A11.2016.000001', 'Bambang Sudarjo', '1997-07-24', 'Semarang', 'Baru', 2, 'Ilmu Komputer', 'Desain Komunikasi Visual', 'L', '1', '3.20', '0892-9192-91929', 'Semarang', 5, 1, 1, 'Husein', 'Buruh', '10000000000.00', 2, '0909-8918-92898', '19023819208312', 1, 'Semarang', NULL, '2020-03-03 17:32:35', 3, '2020-03-03 17:32:35', 3, 1, 'Ya'),
(11, 'A11.2019.000002', 'Abdul Bajigur', '2020-03-03', 'Jakarta', 'Baru', 2, 'Ilmu Komputer', 'Ilmu Komunikasi', 'L', '1', '3.50', '0989-8129-89812', 'Semarang', 5, 0, 0, 'Cahyono', 'Wiraswasta', '3000000000.00', 2, '0998-9128-98921', '0912747817827837', 4, 'Semarang', NULL, '2020-03-03 17:38:03', 3, '2020-03-03 17:38:03', 3, 1, 'Ya'),
(12, 'A11.2018.000005', 'Aurelia Putri', '2000-10-04', 'Semarang', 'On Going', 2, 'Ekonomi dan Bisnis', 'Ekonomi', 'P', '3', '2.60', '0986-2761-67627', 'Semarang', 5, 0, 1, 'Indra Kusuma', 'PNS', '20000000.00', 1, '0909-0290-19092', '20001020301031', 4, 'Semarang', NULL, '2020-03-03 17:41:56', 3, '2020-03-03 17:41:56', 3, 0, 'Ya'),
(13, 'A11.2018.000007', 'Indra Birowo', '2020-03-03', 'Semarang', 'Baru', 2, 'Ilmu Komputer', 'Teknik Informatika', 'L', '3', '2.80', '0901-2903-90129', 'Semarang', 5, 0, 1, 'Cahyadi Kusuma`', 'PNS', '300000000.00', 1, '0983-8781-7823', '190238192083122', 4, 'Semarang', NULL, '2020-03-03 17:44:56', 3, '2020-03-03 17:44:56', 3, 0, 'Ya'),
(14, '1120191', 'Supardi', '2001-07-11', 'Semarang', 'Baru', 5, 'Kedokteran', 'Kedokteran Gigi', 'L', '1', '3.40', '0898-2183-98219', 'Semarang', 5, 0, 0, 'Husein', 'PNS', '1231231231231.00', 1, '0909-0909-090', '20001020301031', 4, 'Semarang', NULL, '2020-03-08 18:45:23', 4, '2020-03-08 18:45:23', 4, 1, 'Ya');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_organisasi`
--

CREATE TABLE `tbl_organisasi` (
  `id_organisasi` bigint(20) NOT NULL,
  `id_mahasiswa` bigint(20) DEFAULT NULL,
  `nama_organisasi` varchar(100) DEFAULT NULL,
  `id_status_jabatan` bigint(20) DEFAULT NULL,
  `periode` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_organisasi`
--

INSERT INTO `tbl_organisasi` (`id_organisasi`, `id_mahasiswa`, `nama_organisasi`, `id_status_jabatan`, `periode`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 'OSIS Tingkat SMP', 2, '2008 - 2011', '2020-02-27 23:30:43', 2, '2020-03-01 19:53:33', 1),
(2, 2, 'OSIS Tingkat SMP', 5, '2008 - 2011', '2020-02-28 09:24:31', 1, '2020-03-01 19:53:44', 1),
(3, 2, 'OSIS Tingkat SMA', 4, '2009 - 2011', '2020-02-28 09:24:31', 1, NULL, NULL),
(4, 2, 'HMJ', 4, '2011-2012', '2020-02-28 09:24:31', 1, NULL, NULL),
(5, 3, 'OSIS Tingkat SMP', 1, '2008 - 2011', '2020-02-28 09:28:28', 1, '2020-02-29 20:07:52', 1),
(6, 3, 'OSIS Tingkat SMA', 1, '2009 - 2011', '2020-02-28 09:28:29', 1, NULL, NULL),
(7, 3, 'BEM FEB', 1, '2011 - 2012', '2020-02-28 09:28:29', 1, NULL, NULL),
(8, 4, 'Karang Taruna', 3, '2009 - 2011', '2020-02-28 09:33:21', 1, '2020-02-29 19:55:22', 2),
(9, 5, 'BEM Fasilkom', 1, '2012-2013', '2020-02-28 09:38:13', 1, '2020-02-28 23:56:17', 1),
(10, 7, 'Karang Taruna', 2, '2012 - 2013', '2020-02-28 09:46:53', 1, '2020-02-28 23:56:48', 1),
(14, 10, 'HMTI', 5, '2019/2020', '2020-03-03 17:32:35', 3, NULL, NULL),
(15, 9, 'DOSCOM', 5, '2019/2020', '2020-03-03 17:34:03', 3, NULL, NULL),
(16, 12, 'HMB', 5, '2018/2019', '2020-03-03 17:41:56', 3, NULL, NULL),
(17, 13, 'HMTI', 5, '', '2020-03-03 17:44:56', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendidikan`
--

CREATE TABLE `tbl_pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `nm_pendidikan` varchar(50) DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pendidikan`
--

INSERT INTO `tbl_pendidikan` (`id_pendidikan`, `nm_pendidikan`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'D1', '2020-02-27 19:25:38', 1, NULL, NULL),
(2, 'D2', '2020-02-27 19:25:43', 1, NULL, NULL),
(3, 'D3', '2020-02-27 19:25:50', 1, NULL, NULL),
(4, 'D4', '2020-02-27 19:25:55', 1, NULL, NULL),
(5, 'S1', '2020-02-27 19:26:02', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `id_pengguna` bigint(20) NOT NULL,
  `id_role` int(11) NOT NULL DEFAULT 3,
  `id_instansi` bigint(20) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT '',
  `nm_lengkap` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) NOT NULL DEFAULT 0,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`id_pengguna`, `id_role`, `id_instansi`, `username`, `password`, `email`, `nm_lengkap`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 0, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@example.com', 'Administrator', NULL, 0, '2020-02-27 00:03:22', 1),
(2, 2, 1, 'user01', '0497fe4d674fe37194a6fcb08913e596ef6a307f', 'user01@example.com', 'User 01', '2020-02-27 00:04:13', 1, '2020-02-29 14:18:27', 2),
(3, 2, 2, 'user02', 'a7659675668c2b34f0a456dbaa508200340dc36c', 'user02@example.com', 'Universitas Dian Nuswantoro', '2020-03-01 19:55:48', 1, NULL, 0),
(4, 2, 5, 'user03', '6f092588a43665e24a7917924ba216f50fb7737d', 'user03@example.com', 'Universitas Muhammadiyah Semarang', '2020-03-01 19:57:18', 1, NULL, 0),
(5, 2, 4, 'user04', '11b5abfbc0914db858d26ca8aa6f2226fef36f59', 'user04@example.com', 'Universitas Veteran Pembangunan', '2020-03-01 19:58:14', 1, NULL, 0),
(6, 2, 3, 'user05', '197cc002d772535e2af4ad8a1ac04969091e7ff6', 'user05@example.com', 'Universitas Stikubank', '2020-03-01 19:59:28', 1, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prestasi`
--

CREATE TABLE `tbl_prestasi` (
  `id_prestasi` bigint(20) NOT NULL,
  `id_mahasiswa` bigint(20) DEFAULT NULL,
  `bidang_prestasi` enum('Akademik','Non Akademik') DEFAULT NULL,
  `nama_prestasi` varchar(100) DEFAULT NULL,
  `tingkat_prestasi` enum('Internasional','Nasional','Regional') DEFAULT NULL,
  `juara_ke` enum('3','2','1') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_prestasi`
--

INSERT INTO `tbl_prestasi` (`id_prestasi`, `id_mahasiswa`, `bidang_prestasi`, `nama_prestasi`, `tingkat_prestasi`, `juara_ke`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 'Akademik', 'Juara Umum Tingkat SD', 'Regional', '1', '2020-02-27 23:30:43', 2, '2020-03-01 19:53:32', 1),
(2, 1, 'Akademik', 'Juara Umum Tingkat SMP', 'Regional', '2', '2020-02-27 23:30:43', 2, '2020-03-01 19:53:33', 1),
(3, 2, 'Akademik', 'Juara Umum Tingkat SD', 'Regional', '1', '2020-02-28 09:24:31', 1, '2020-03-01 19:53:43', 1),
(4, 2, 'Non Akademik', 'Kartini Tingkat SMP', 'Nasional', '2', '2020-02-28 09:24:31', 1, '2020-03-01 19:53:44', 1),
(5, 3, 'Non Akademik', 'Lomba Fashion Show Muslimah 2008', 'Nasional', '3', '2020-02-28 09:28:28', 1, '2020-02-29 20:07:52', 1),
(6, 3, 'Akademik', 'Juara Umum Tingkat SMA', 'Nasional', '1', '2020-02-28 09:28:28', 1, '2020-02-29 20:07:52', 1),
(7, 4, 'Akademik', 'Juara Umum Tingkat SD', 'Nasional', '1', '2020-02-28 09:33:21', 1, '2020-02-29 19:55:21', 2),
(8, 4, 'Akademik', 'Juara Umum Tingkat SMA', 'Regional', '3', '2020-02-28 09:33:21', 1, '2020-02-29 19:55:21', 2),
(9, 4, 'Non Akademik', 'MTQ Nasional 2008', 'Nasional', '2', '2020-02-28 09:33:21', 1, '2020-02-29 19:55:22', 2),
(10, 5, 'Non Akademik', 'Best Award Programming', 'Nasional', '1', '2020-02-28 09:38:13', 1, '2020-02-28 23:56:17', 1),
(11, 5, 'Akademik', 'Mobile Programming Competition', 'Regional', '2', '2020-02-28 09:38:13', 1, '2020-02-28 23:56:17', 1),
(12, 7, 'Non Akademik', 'MTQ 2012', 'Regional', '3', '2020-02-28 09:46:53', 1, '2020-02-28 23:56:48', 1),
(16, 10, 'Non Akademik', 'Balap Sepeda', 'Nasional', '3', '2020-03-03 17:32:35', 3, NULL, NULL),
(17, 9, 'Akademik', 'Cerdas Cermat', 'Nasional', '1', '2020-03-03 17:34:02', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id_role`, `role`) VALUES
(1, 'Super Administrator'),
(2, 'Admin Instansi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status_jabatan`
--

CREATE TABLE `tbl_status_jabatan` (
  `id_status_jabatan` bigint(11) NOT NULL,
  `nm_status_jabatan` varchar(255) DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_status_jabatan`
--

INSERT INTO `tbl_status_jabatan` (`id_status_jabatan`, `nm_status_jabatan`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Ketua', '2020-02-27 01:05:26', 1, NULL, NULL),
(2, 'Wakil Ketua', '2020-02-27 01:05:53', 1, NULL, NULL),
(3, 'Sekretaris', '2020-02-27 01:06:06', 1, NULL, NULL),
(4, 'Bendahara', '2020-02-27 01:06:11', 1, NULL, NULL),
(5, 'Anggota', '2020-02-27 01:06:16', 1, '2020-02-27 01:06:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_traccer`
--

CREATE TABLE `tbl_traccer` (
  `id_traccer` bigint(20) NOT NULL,
  `id_mahasiswa` bigint(20) DEFAULT NULL,
  `gelar_terakhir` varchar(10) DEFAULT NULL,
  `tanggal_lulus` date DEFAULT NULL,
  `nama_perusahaan` varchar(100) DEFAULT NULL,
  `alamat_perusahaan` varchar(100) DEFAULT '',
  `jabatan` varchar(100) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_traccer`
--

INSERT INTO `tbl_traccer` (`id_traccer`, `id_mahasiswa`, `gelar_terakhir`, `tanggal_lulus`, `nama_perusahaan`, `alamat_perusahaan`, `jabatan`, `tanggal_masuk`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(2, 1, 'S.E', '2020-02-28', 'TOKOPEDIA', 'sd', 'Finance Staff', '2020-06-23', '2020-02-28', 1, '2020-02-29', 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_monitoring`
-- (See below for the actual view)
--
CREATE TABLE `v_monitoring` (
`id_instansi` bigint(11)
,`kd_instansi` varchar(10)
,`nm_instansi` varchar(255)
,`ipk_d` bigint(21)
,`ipk_c` bigint(21)
,`ipk_b` bigint(21)
,`ipk_a` bigint(21)
,`total_prestasi` bigint(21)
,`total_organisasi` bigint(21)
,`total_mahasiswa` bigint(21)
,`total_aktif` bigint(21)
,`total_tidak_aktif` bigint(21)
,`traccer_a` bigint(21)
,`traccer_b` bigint(21)
,`traccer_c` bigint(21)
);

-- --------------------------------------------------------

--
-- Structure for view `v_monitoring`
--
DROP TABLE IF EXISTS `v_monitoring`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_monitoring`  AS  select `t1`.`id_instansi` AS `id_instansi`,`t1`.`kd_instansi` AS `kd_instansi`,`t1`.`nm_instansi` AS `nm_instansi`,(select count(`td`.`id_mahasiswa`) from `tbl_mahasiswa` `td` where `td`.`id_instansi` = `t1`.`id_instansi` and `td`.`ipk` between 0 and 2.49) AS `ipk_d`,(select count(`tc`.`id_mahasiswa`) from `tbl_mahasiswa` `tc` where `tc`.`id_instansi` = `t1`.`id_instansi` and `tc`.`ipk` between 2.5 and 2.99) AS `ipk_c`,(select count(`tb`.`id_mahasiswa`) from `tbl_mahasiswa` `tb` where `tb`.`id_instansi` = `t1`.`id_instansi` and `tb`.`ipk` between 3 and 3.50) AS `ipk_b`,(select count(`ta`.`id_mahasiswa`) from `tbl_mahasiswa` `ta` where `ta`.`id_instansi` = `t1`.`id_instansi` and `ta`.`ipk` > 3.50) AS `ipk_a`,(select count(`pa`.`id_mahasiswa`) AS `total` from (select `pb`.`id_mahasiswa` AS `id_mahasiswa`,`pb`.`id_instansi` AS `id_instansi` from (`tbl_mahasiswa` `pb` join `tbl_prestasi` `pc` on(`pb`.`id_mahasiswa` = `pc`.`id_mahasiswa`)) group by `pb`.`id_mahasiswa`) `pa` where `pa`.`id_instansi` = `t1`.`id_instansi`) AS `total_prestasi`,(select count(`sa`.`id_mahasiswa`) AS `total` from (select `sb`.`id_mahasiswa` AS `id_mahasiswa`,`sb`.`id_instansi` AS `id_instansi` from (`tbl_mahasiswa` `sb` join `tbl_organisasi` `sc` on(`sb`.`id_mahasiswa` = `sc`.`id_mahasiswa`)) group by `sb`.`id_mahasiswa`) `sa` where `sa`.`id_instansi` = `t1`.`id_instansi`) AS `total_organisasi`,(select count(`ua`.`id_mahasiswa`) from `tbl_mahasiswa` `ua` where `ua`.`id_instansi` = `t1`.`id_instansi`) AS `total_mahasiswa`,(select count(`va`.`id_mahasiswa`) from `tbl_mahasiswa` `va` where `va`.`id_instansi` = `t1`.`id_instansi` and `va`.`aktif` = 'Ya') AS `total_aktif`,(select count(`wa`.`id_mahasiswa`) from `tbl_mahasiswa` `wa` where `wa`.`id_instansi` = `t1`.`id_instansi` and `wa`.`aktif` = 'Tidak') AS `total_tidak_aktif`,(select count(`xa`.`id_traccer`) from (`tbl_traccer` `xa` join `tbl_mahasiswa` `xb` on(`xa`.`id_mahasiswa` = `xb`.`id_mahasiswa`)) where `xb`.`id_instansi` = `t1`.`id_instansi` and timestampdiff(MONTH,`xa`.`tanggal_lulus`,`xa`.`tanggal_masuk`) = 0) AS `traccer_a`,(select count(`ya`.`id_traccer`) from (`tbl_traccer` `ya` join `tbl_mahasiswa` `yb` on(`ya`.`id_mahasiswa` = `yb`.`id_mahasiswa`)) where `yb`.`id_instansi` = `t1`.`id_instansi` and timestampdiff(MONTH,`ya`.`tanggal_lulus`,`ya`.`tanggal_masuk`) <= 6 and timestampdiff(MONTH,`ya`.`tanggal_lulus`,`ya`.`tanggal_masuk`) > 0) AS `traccer_b`,(select count(`za`.`id_traccer`) from (`tbl_traccer` `za` join `tbl_mahasiswa` `zb` on(`za`.`id_mahasiswa` = `zb`.`id_mahasiswa`)) where `zb`.`id_instansi` = `t1`.`id_instansi` and timestampdiff(MONTH,`za`.`tanggal_lulus`,`za`.`tanggal_masuk`) > 6) AS `traccer_c` from `tbl_instansi` `t1` group by `t1`.`id_instansi` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `tbl_instansi`
--
ALTER TABLE `tbl_instansi`
  ADD PRIMARY KEY (`id_instansi`);

--
-- Indexes for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `tbl_organisasi`
--
ALTER TABLE `tbl_organisasi`
  ADD PRIMARY KEY (`id_organisasi`);

--
-- Indexes for table `tbl_pendidikan`
--
ALTER TABLE `tbl_pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tbl_prestasi`
--
ALTER TABLE `tbl_prestasi`
  ADD PRIMARY KEY (`id_prestasi`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tbl_status_jabatan`
--
ALTER TABLE `tbl_status_jabatan`
  ADD PRIMARY KEY (`id_status_jabatan`);

--
-- Indexes for table `tbl_traccer`
--
ALTER TABLE `tbl_traccer`
  ADD PRIMARY KEY (`id_traccer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  MODIFY `id_bank` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbl_instansi`
--
ALTER TABLE `tbl_instansi`
  MODIFY `id_instansi` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  MODIFY `id_mahasiswa` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_organisasi`
--
ALTER TABLE `tbl_organisasi`
  MODIFY `id_organisasi` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_pendidikan`
--
ALTER TABLE `tbl_pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `id_pengguna` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_prestasi`
--
ALTER TABLE `tbl_prestasi`
  MODIFY `id_prestasi` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_status_jabatan`
--
ALTER TABLE `tbl_status_jabatan`
  MODIFY `id_status_jabatan` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_traccer`
--
ALTER TABLE `tbl_traccer`
  MODIFY `id_traccer` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
