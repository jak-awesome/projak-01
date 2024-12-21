-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 20, 2024 at 01:20 PM
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
-- Database: `alvindo`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `id_level` int NOT NULL,
  `nama_lengkap` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `foto` text COLLATE utf8mb4_general_ci NOT NULL,
  `no_hp` varchar(13) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `username`, `password`, `id_level`, `nama_lengkap`, `email`, `foto`, `no_hp`) VALUES
(1, 'admin', '12345', 1, 'Admin', 'admin@gmail.com', '70a7426003815ad97a8a9cd42f68f23a.png', '088218058130'),
(2, 'pemilik', 'pemilik', 2, 'Pemilik Toko', 'pemilik@gmail.com', '714f3fd58058a2ab5fa494eedbef90c6.jpg', '0812345678');

-- --------------------------------------------------------

--
-- Table structure for table `akun_pelanggan`
--

CREATE TABLE `akun_pelanggan` (
  `id_akun_pelanggan` int NOT NULL,
  `email` text COLLATE utf8mb4_general_ci,
  `username` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun_pelanggan`
--

INSERT INTO `akun_pelanggan` (`id_akun_pelanggan`, `email`, `username`, `password`) VALUES
(12, 'trinatajaka07@gmail.com', 'jaka', '$2y$10$08ygI6B/R/0DVvMPXcXg2enKuu6inecr6lUt1OMJKFXA4ZBGrsnV2'),
(13, 'asep@gmail.com', 'asep', '$2y$10$.sq07270E30duWWCVdv9uOHTIcIorUbs3Ut9uGIAeYbsh6SjA040G'),
(14, 'lilis@gmail.com', 'lilis', '$2y$10$3J/IpPeYgpMBRZf1sLJMs.fQr2HjJuxYI1Ua5kODx1qCZu3D8QnwS'),
(15, 'delia@gmail.com', 'delia', '$2y$10$PO83v9Yu0HGFGQwYVHqJv.iHiqjfhtAKh.glat5/.svH0afrm/H7S'),
(16, 'kiki@gmail.com', 'kiki', '$2y$10$2zinx.OssFWlDYTSJMl7rugpPXbby4QlQwm.T2kXTnCLVGXy06u7a'),
(17, 'cindy@gmail.com', 'cindy', '$2y$10$58NAiOmCySOZQXqke3Wk2uwdyQ5Uc/CXoE9ey6ZC1FjdCrfot.d1e'),
(18, 'shani@gmail.com', 'shani', '$2y$10$7E8D0zZXDqxdfGdg1yQWMemzavIT4w2wzS9JPuia4JsL7.mLWOnkK');

-- --------------------------------------------------------

--
-- Table structure for table `alamat_pelanggan`
--

CREATE TABLE `alamat_pelanggan` (
  `id_alamat_pelanggan` int NOT NULL,
  `nama_penerima` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `no_penerima` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat_1` text COLLATE utf8mb4_general_ci NOT NULL,
  `alamat_2` text COLLATE utf8mb4_general_ci NOT NULL,
  `desa_kelurahan` text COLLATE utf8mb4_general_ci NOT NULL,
  `kecamatan` text COLLATE utf8mb4_general_ci NOT NULL,
  `kab_kota` text COLLATE utf8mb4_general_ci NOT NULL,
  `provinsi` text COLLATE utf8mb4_general_ci NOT NULL,
  `kode_pos` text COLLATE utf8mb4_general_ci NOT NULL,
  `id_pelanggan` int NOT NULL,
  `ket` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alamat_pelanggan`
--

INSERT INTO `alamat_pelanggan` (`id_alamat_pelanggan`, `nama_penerima`, `no_penerima`, `alamat_1`, `alamat_2`, `desa_kelurahan`, `kecamatan`, `kab_kota`, `provinsi`, `kode_pos`, `id_pelanggan`, `ket`) VALUES
(11, 'Jaka', '088218058130', 'Jalan. Windu, RT01/RW01, Dsn. Pasawahan', 'No. 00005,', 'Karangtawang', 'Kuningan', 'Kuningan', 'Jawa Barat', '45515', 10, 1),
(12, 'Asep', '0812131132312', 'Jln. Cut Nyak Dien', '', 'Windusengkahan', 'Kuningan', 'Kuningan', 'Jawa Barat', '42121', 11, 1),
(13, 'Lilis', '08123456789', 'Jl. Cipondok, Rt10/Rw02', '', 'Cipondok', 'Cibingbin', 'Kuningan', 'Jawa Barat', '41231', 12, 1),
(14, 'Delia', '08987654321', 'Jl. Caracas, Rt01/Rw01', '', 'Caracas', 'Cilimus', 'Kuningan', 'Jawa Barat', '41244', 13, 1),
(15, 'Kiki', '0823451678', 'Jl. Waduk, Rt05/Rw01', '', 'Jagara', 'Darma', 'Kuningan', 'Jawa Barat', '43211', 14, 1),
(16, 'Cindy', '08665131241', 'Jln. Selajambe, Rt01/Rw01', '', 'Selajambe', 'Selajambe', 'Kuningan', 'Jawa Barat', '45551', 15, 1),
(17, 'Shani', '085111214123', 'Jln. Jendral Sudirman', '', 'Winduhaji', 'Kuningan', 'Kuningan', 'Jawa Barat', '45514', 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `centroid`
--

CREATE TABLE `centroid` (
  `id_cluster` int NOT NULL,
  `stok_awal` int NOT NULL,
  `stok_keluar` int NOT NULL,
  `stok_akhir` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `centroid`
--

INSERT INTO `centroid` (`id_cluster`, `stok_awal`, `stok_keluar`, `stok_akhir`) VALUES
(7, 50, 20, 30),
(8, 75, 35, 25);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id_chat` int NOT NULL,
  `chat` text COLLATE utf8mb4_general_ci NOT NULL,
  `waktu` datetime NOT NULL,
  `penerima` int NOT NULL,
  `pengirim` int NOT NULL,
  `id_akun` int NOT NULL,
  `id_akun_pelanggan` int NOT NULL,
  `p_read` enum('0','1') COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `a_read` enum('0','1') COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id_chat`, `chat`, `waktu`, `penerima`, `pengirim`, `id_akun`, `id_akun_pelanggan`, `p_read`, `a_read`) VALUES
(21, 'Assalamualaikum', '2024-06-29 11:16:31', 1, 12, 1, 12, '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `chatroom`
--

CREATE TABLE `chatroom` (
  `id_chat_room` int NOT NULL,
  `id_akun_pelanggan` int NOT NULL,
  `id_akun` int NOT NULL,
  `nama_chat_room` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_detail` int NOT NULL,
  `id_produk` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `kuantitas` int NOT NULL,
  `id_pesanan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id_detail`, `id_produk`, `kuantitas`, `id_pesanan`) VALUES
(88, 'PRD001', 2, 70),
(89, 'PRD013', 1, 71),
(90, 'PRD007', 3, 72),
(91, 'PRD012', 1, 73),
(92, 'PRD002', 2, 74),
(93, 'PRD004', 3, 75),
(94, 'PRD008', 3, 76),
(95, 'PRD009', 2, 77),
(96, 'PRD003', 1, 78),
(97, 'PRD005', 5, 79),
(98, 'PRD007', 6, 80),
(99, 'PRD006', 5, 81),
(100, 'PRD010', 3, 82),
(101, 'PRD011', 4, 83),
(102, 'PRD001', 8, 84),
(103, 'PRD002', 3, 85),
(104, 'PRD001', 7, 86),
(105, 'PRD002', 3, 87),
(106, 'PRD003', 2, 88),
(107, 'PRD004', 4, 89),
(108, 'PRD005', 7, 90),
(109, 'PRD006', 3, 91),
(110, 'PRD007', 8, 92),
(111, 'PRD008', 10, 93),
(112, 'PRD009', 3, 94),
(113, 'PRD010', 2, 95),
(114, 'PRD011', 2, 96),
(115, 'PRD012', 2, 97),
(116, 'PRD013', 2, 98),
(117, 'PRD001', 3, 99),
(118, 'PRD002', 4, 100),
(119, 'PRD003', 1, 101),
(120, 'PRD004', 3, 102),
(121, 'PRD005', 6, 103),
(122, 'PRD006', 4, 104),
(123, 'PRD007', 6, 105),
(124, 'PRD008', 4, 106),
(125, 'PRD009', 3, 107),
(126, 'PRD010', 6, 108),
(127, 'PRD011', 1, 109),
(128, 'PRD012', 1, 110),
(129, 'PRD001', 10, 111),
(130, 'PRD002', 4, 112),
(131, 'PRD003', 1, 113),
(132, 'PRD004', 2, 114),
(133, 'PRD005', 3, 115),
(134, 'PRD006', 5, 116),
(135, 'PRD007', 3, 117),
(136, 'PRD008', 3, 118),
(137, 'PRD009', 3, 119),
(138, 'PRD003', 3, 120),
(139, 'PRD010', 6, 121),
(140, 'PRD011', 1, 122),
(141, 'PRD013', 1, 123),
(142, 'PRD001', 3, 124),
(143, 'PRD001', 10, 125),
(144, 'PRD002', 8, 126),
(145, 'PRD004', 9, 127),
(146, 'PRD005', 11, 128),
(147, 'PRD006', 4, 129),
(148, 'PRD007', 10, 130),
(149, 'PRD008', 3, 131),
(150, 'PRD009', 4, 132),
(151, 'PRD010', 6, 133),
(152, 'PRD011', 2, 134),
(153, 'PRD012', 1, 135),
(154, 'PRD013', 1, 136),
(155, 'PRD001', 5, 137),
(156, 'PRD002', 5, 138),
(157, 'PRD003', 2, 139),
(158, 'PRD004', 4, 140),
(159, 'PRD005', 6, 141),
(160, 'PRD006', 3, 142),
(161, 'PRD007', 11, 143),
(162, 'PRD008', 7, 144),
(163, 'PRD009', 2, 145),
(164, 'PRD010', 4, 146),
(165, 'PRD011', 1, 147),
(166, 'PRD012', 1, 148),
(167, 'PRD001', 12, 149),
(168, 'PRD002', 7, 150),
(169, 'PRD003', 1, 151),
(170, 'PRD004', 3, 152),
(171, 'PRD005', 10, 153),
(172, 'PRD006', 9, 154),
(173, 'PRD007', 14, 155),
(174, 'PRD008', 8, 156),
(175, 'PRD009', 2, 157),
(176, 'PRD010', 4, 158),
(177, 'PRD011', 1, 159);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi_toko`
--

CREATE TABLE `detail_transaksi_toko` (
  `id_detail_transaksi_toko` int NOT NULL,
  `id_produk` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `kuantitas` int NOT NULL,
  `id_transaksi` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id_faq` int NOT NULL,
  `tanya` text COLLATE utf8mb4_general_ci NOT NULL,
  `jawab` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id_faq`, `tanya`, `jawab`) VALUES
(1, 'Bagaimana cara login?', '<p>Silahkan pilih menu login pada menu sebelah atas pada halaman web jika anda belum melakukan login dan masukkan data-data yang dibutuhkan untuk login</p>'),
(3, 'Bagaimana cara membuat akun?', 'Pada halaman login, silahkan klik link pada bagian bawah halaman atau pada kata <b>\"disini\". </b>Dan masukkan data-data yang dibutuhkan untuk melakukan pendaftaran akun');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_cluster`
--

CREATE TABLE `hasil_cluster` (
  `nama_produk` text COLLATE utf8mb4_general_ci NOT NULL,
  `terjual` text COLLATE utf8mb4_general_ci NOT NULL,
  `cluser` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(26, 'Penyimpanan'),
(27, 'Jaringan'),
(28, 'Keyboard & Mouse'),
(29, 'Webcam'),
(30, 'Printer');

-- --------------------------------------------------------

--
-- Table structure for table `level_akun`
--

CREATE TABLE `level_akun` (
  `id_level` int NOT NULL,
  `level` enum('karyawan','pemilik') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `level_akun`
--

INSERT INTO `level_akun` (`id_level`, `level`) VALUES
(1, 'karyawan'),
(2, 'pemilik');

-- --------------------------------------------------------

--
-- Table structure for table `merek`
--

CREATE TABLE `merek` (
  `id_merek` int NOT NULL,
  `nama_merek` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `merek`
--

INSERT INTO `merek` (`id_merek`, `nama_merek`) VALUES
(17, 'Toshiba'),
(18, 'Sandisk'),
(19, 'Seagate'),
(20, 'TP-Link'),
(21, 'Tenda'),
(22, 'Lainnya'),
(23, 'Logitech'),
(24, 'ROBOT'),
(25, 'Canon');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int NOT NULL,
  `kota` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `biaya` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `kota`, `biaya`) VALUES
(2, 'Kuningan', 16000),
(3, 'Cirebon', 18000),
(4, 'Depok', 24000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int NOT NULL,
  `nama_lengkap` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `no_hp` varchar(13) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `foto_pelanggan` text COLLATE utf8mb4_general_ci,
  `id_akun_pelanggan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `no_hp`, `foto_pelanggan`, `id_akun_pelanggan`) VALUES
(10, 'Jaka Trinata Megaputra', 'Kuningan', '2000-07-20', 'Laki-laki', '088218058130', 'da004d77708d5607ca0bc1a3923552fc.jpg', 12),
(11, 'Asep Saepuddin', 'Kuningan', '1995-01-01', 'Laki-laki', '0812131132312', '54010a701d1f18e218ca939eaab836dd.jpg', 13),
(12, 'Lilis Siti Nurelis', 'Kuningan', '2002-09-14', 'Perempuan', '08123456789', '200939f12c87e4314c36d2044fa2f31c.jpg', 14),
(13, 'Delia Delima', 'Cirebon', '1999-10-12', 'Perempuan', '08987654321', '85b57dc074f5c531f190bf0b4218bfb4.jpg', 15),
(14, 'Kiki Sri', 'Jakarta', '2000-04-05', 'Perempuan', '0823451678', 'd4ad01a07be90adf0dfb0e4091259c35.jpg', 16),
(15, 'Cindy ', 'Kuningan', '1993-07-31', 'Perempuan', '08665131241', 'c1e91598f430c45163d8ce12f74e334d.jpg', 17),
(16, 'Shani Indira', 'Kuningan', '2000-02-12', 'Perempuan', '085111214123', '23bfe3cf1d70cbc6bee3dfdf15ff409c.jpg', 18);

-- --------------------------------------------------------

--
-- Table structure for table `pembatalan`
--

CREATE TABLE `pembatalan` (
  `id_pembatalan` int NOT NULL,
  `id_pesanan` int NOT NULL,
  `id_pelanggan` int NOT NULL,
  `rekening` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int NOT NULL,
  `id_pesanan` int NOT NULL,
  `id_pelanggan` int NOT NULL,
  `bukti_pembayaran` text COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pesanan`, `id_pelanggan`, `bukti_pembayaran`, `tanggal_bayar`) VALUES
(51, 70, 10, '6055b62c4fa660fda158803f86ba2520.jpg', '2024-06-28 13:04:37'),
(52, 71, 10, 'c5be268c79d28f0ba1e29ac2c11e801a.jpg', '2024-06-28 13:05:37'),
(53, 72, 10, 'ea72f372cd4faf381686660e5e31b13f.jpg', '2024-06-28 13:06:38'),
(54, 73, 10, '2bf65af6fa7ce5573bdebd92474b02a3.jpg', '2024-06-28 23:43:48'),
(55, 74, 10, '2521afaeaaea5547f364ba56d9b81094.jpg', '2024-06-28 23:44:22'),
(56, 75, 10, '2dab550a4645a9c22cd9473058c52f71.jpg', '2024-06-28 23:45:28'),
(57, 76, 10, '4b1f2943e9c61a2ba7e815d7a827a367.jpg', '2024-06-28 23:46:08'),
(58, 77, 10, '229ff4b288bf3cf32e821b7649d4507b.jpg', '2024-06-28 23:46:50'),
(59, 78, 10, 'eb2a319534732de4f0770162658cdfae.jpg', '2024-06-28 23:48:06'),
(60, 79, 10, '521e165b14ff539fd77c443c279b96ad.jpg', '2024-06-28 23:48:32'),
(61, 80, 10, '35b7284f25fea16d437218886f0150fc.jpg', '2024-06-28 23:50:24'),
(62, 81, 10, '8aa15cbfa32189cb7ac4f9136f6727ef.jpg', '2024-06-28 23:51:30'),
(63, 82, 10, 'a4a3a0c344b52f6823a12b73e0de0495.jpg', '2024-06-28 23:52:11'),
(64, 83, 10, '9fa8d1b518de0c145bb561df20d11e99.jpg', '2024-06-28 23:53:06'),
(65, 84, 10, '8aafc1c5a3ca8b4ab68257259c30cebf.jpg', '2024-06-28 23:54:36'),
(66, 85, 10, 'ba26d9ec7bcf7e1ab63226f118b02881.jpg', '2024-06-29 01:55:14'),
(67, 86, 11, '202e4cc5273fa45ec28c014476b825d8.jpg', '2024-06-29 09:29:46'),
(68, 87, 11, '3162e8e89b1ebfe71604bd90333c53eb.jpg', '2024-06-29 09:30:58'),
(69, 88, 11, 'ad483e5bb2b414bbdfce2da0f0806d3a.jpg', '2024-06-29 09:31:20'),
(70, 89, 11, 'f825e7ae67e84557666e0d71abdc07f2.jpg', '2024-06-29 09:31:59'),
(71, 90, 11, '58884d1dad82e43e82f06ec06733d525.jpg', '2024-06-29 09:32:41'),
(72, 91, 11, 'd731ce098335318c5c07e73de5475f2d.jpg', '2024-06-29 09:33:01'),
(73, 92, 11, '0e5fa2b62b95cc9e27fa0661b6cf8b4d.jpg', '2024-06-29 09:33:35'),
(74, 93, 11, '18368a5b9b457ea1e94fd189f6ef5d87.jpg', '2024-06-29 09:34:04'),
(75, 94, 11, '647d318333260633e266f8fcecb39911.jpg', '2024-06-29 09:34:23'),
(76, 95, 11, '973551fe41283bc8e6d5417269da3c7e.jpg', '2024-06-29 09:34:47'),
(77, 96, 11, '4a1ba8d33dbf94e1806718b5b5723e78.jpg', '2024-06-29 09:35:05'),
(78, 97, 11, '4d2e32d6aed8e59d8864d48b75753ad8.jpg', '2024-06-29 09:35:21'),
(79, 98, 11, '0b6f21626f3aa747d45d6fe926a0dbb2.jpg', '2024-06-29 09:35:42'),
(80, 99, 12, '400e71c924f34d79f4f469578c242168.jpg', '2024-06-29 09:37:02'),
(81, 100, 12, 'd19e1e7da4640168ef409c50ded41909.jpg', '2024-06-29 09:37:32'),
(82, 101, 12, '85e9c80a6259762be60587fa68848b35.jpg', '2024-06-29 09:37:50'),
(83, 102, 12, '5c8bf5af26260a6d9279a65fde45e218.jpg', '2024-06-29 09:38:10'),
(84, 103, 12, 'dee7226ab24fc5a5406f5061b60bbfd2.jpg', '2024-06-29 09:38:36'),
(85, 104, 12, '856185b22084dff69714e65a09293263.jpg', '2024-06-29 09:38:59'),
(86, 105, 12, '5f3845711f93bde91178f88275dd794c.jpg', '2024-06-29 09:39:30'),
(87, 106, 12, '2aa9e7b046c78d9bf5bdc6792667d4e7.jpg', '2024-06-29 09:39:59'),
(88, 107, 12, '33abdf8fa29614ba8d29ef1ec9153b60.jpg', '2024-06-29 09:40:25'),
(89, 108, 12, '380cb2a12b9f32e246c4287b8057add9.jpg', '2024-06-29 09:40:48'),
(90, 109, 12, '8e93691ff9450b5294385cd48a26e8e3.jpg', '2024-06-29 09:41:10'),
(91, 110, 12, 'b4a5405511009d93384725831976d4b5.jpg', '2024-06-29 09:41:32'),
(92, 111, 13, '2b00fb280916a47a7fe30faab839bd28.jpg', '2024-06-29 09:42:18'),
(93, 112, 13, '98cd5ce25e62fc1847c0414f120502ce.jpg', '2024-06-29 09:42:40'),
(94, 113, 13, '951b675cb24c93867f480d595a9e6e2e.jpg', '2024-06-29 09:42:55'),
(95, 114, 13, '69d66265328939d0cda5b525994646dc.jpg', '2024-06-29 09:43:12'),
(96, 115, 13, '639c1445e6be6ab1aee8dba63febfd60.jpg', '2024-06-29 09:43:33'),
(97, 116, 13, 'c04a46971ad2e48b4e211669c33ed43e.jpg', '2024-06-29 09:44:00'),
(98, 117, 13, '184d20184c759579853956d92ff23b62.jpg', '2024-06-29 09:44:19'),
(99, 118, 13, '5ea861266ec1e994595652339631e05f.jpg', '2024-06-29 09:44:42'),
(100, 119, 13, '31e1e11f5fd72811039b462225bee7ba.jpg', '2024-06-29 09:45:52'),
(101, 120, 13, '35c4d1a11e9fd4dfebb031a141360efd.jpg', '2024-06-29 09:46:10'),
(102, 121, 13, 'ab8927a2bac78cea5218ff7b6f29d090.jpg', '2024-06-29 09:46:30'),
(103, 122, 13, 'bfa06bfa2d143cd7c052c36cfb25ad1f.jpg', '2024-06-29 09:46:51'),
(104, 123, 13, '4737b5746b0357a4c53d4c2f06466497.jpg', '2024-06-29 09:47:15'),
(105, 124, 14, 'e6fd3d74d7e0458a0956c03f189d0b2c.jpg', '2024-06-29 09:48:08'),
(106, 125, 14, '6be5d7a178b2e52e5eeb489cd45182ce.jpg', '2024-06-29 09:48:29'),
(107, 126, 14, '859f4f374e08d9137eb0fd45f35ca793.jpg', '2024-06-29 09:53:34'),
(108, 127, 14, '538c63448a85cf1ebae83691c5b250a4.jpg', '2024-06-29 09:54:03'),
(109, 128, 14, 'dcb37b098b948757a2ef1847a7cf7d36.jpg', '2024-06-29 09:54:25'),
(110, 129, 14, 'e5df8619ea0a80d4f6be2ad595049425.jpg', '2024-06-29 09:54:47'),
(111, 130, 14, '6fd0022062df892106cf926933b5a1e5.jpg', '2024-06-29 09:55:06'),
(112, 131, 14, '3ff33440abff81bab33743f8a5ae5a05.jpg', '2024-06-29 09:55:24'),
(113, 132, 14, '8debfc7cacef21ed452a2c9ef1fd502e.jpg', '2024-06-29 09:55:46'),
(114, 133, 14, 'c11f5842fb73df73a02c4fb05a9724dd.jpg', '2024-06-29 09:56:13'),
(115, 134, 14, 'fe136649ce04bc57e18a7e3e6579ff3b.jpg', '2024-06-29 09:56:30'),
(116, 135, 14, 'ccd6a3c57aa7dc02255fe03a999bedb0.jpg', '2024-06-29 09:56:49'),
(117, 136, 14, 'd23d3853176d13d7faf07fe47c2a0e60.jpg', '2024-06-29 09:57:11'),
(118, 137, 15, '847dd243a6992901d3061b79a36674f1.jpg', '2024-06-29 10:02:29'),
(119, 138, 15, 'b9eb9ac8a5f8a4ed26fa83c0568c7d51.jpg', '2024-06-29 10:02:50'),
(120, 139, 15, '0338d2e776e65eda3827af80acad2caf.jpg', '2024-06-29 10:03:06'),
(121, 140, 15, '454a07a08f043a110b22dd5d5dd7c0af.jpg', '2024-06-29 11:52:16'),
(122, 141, 15, '7293347fb392746879721ace7ab32ab8.jpg', '2024-06-29 11:52:39'),
(123, 142, 15, '5c944a934f28ae450318d20043054366.jpg', '2024-06-29 11:52:57'),
(124, 143, 15, '8cf2ae5e2eb351bc8be3ff5f570e8ca6.jpg', '2024-06-29 11:55:09'),
(125, 144, 15, 'd2d2638cb5369e9a7ea113c710f8c353.jpg', '2024-06-29 11:55:53'),
(126, 145, 15, '2745304ebf5382595d18c57444ef4b11.jpg', '2024-06-29 11:56:09'),
(127, 146, 15, '83fa89c70ce28c758058542637835441.jpg', '2024-06-29 11:56:28'),
(128, 147, 15, '0fdf7f1a52e4b2510c306b7458c0dba8.jpg', '2024-06-29 11:56:41'),
(129, 148, 15, '245cbeacefe5140c8d2c7c5861ff1557.jpg', '2024-06-29 11:57:06'),
(130, 149, 16, '82b7448b5be023f88199033f9b5ca8f8.jpg', '2024-06-29 11:58:47'),
(131, 150, 16, '6fa8582422f62bde80ec92cbbae8277d.jpg', '2024-06-29 12:00:28'),
(132, 151, 16, '8818c8df2d151527a7bd8f2ab403cecb.jpg', '2024-06-29 12:00:41'),
(133, 152, 16, '36238ad8c32ad3a57719d497a748b095.jpg', '2024-06-29 12:01:01'),
(134, 153, 16, '691420b4a1157a4172e67e269ad39796.jpg', '2024-06-29 12:01:17'),
(135, 154, 16, '2218c6438e022f6a3503e9764a74f965.jpg', '2024-06-29 12:01:36'),
(136, 155, 16, 'ea2380535256c5fd9d430f5acbec3771.jpg', '2024-06-29 12:01:55'),
(137, 156, 16, '24fe7e68937c764421029af6cec731a3.jpg', '2024-06-29 12:02:20'),
(138, 157, 16, '8e8e8be4183c6bf688770a5618ab3445.jpg', '2024-06-29 12:02:34'),
(139, 158, 16, '83614f1868704b0850834dbd83733bc6.jpg', '2024-06-29 12:02:53'),
(140, 159, 16, 'd6d9d200bcba7c14b9c6eab07ed47e01.jpg', '2024-06-29 12:03:08');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int NOT NULL,
  `id_pesanan` int NOT NULL,
  `id_pelanggan` int NOT NULL,
  `bukti` text COLLATE utf8mb4_general_ci NOT NULL,
  `alasan` text COLLATE utf8mb4_general_ci NOT NULL,
  `status_pengembalian` text COLLATE utf8mb4_general_ci NOT NULL,
  `ekspedisi` text COLLATE utf8mb4_general_ci NOT NULL,
  `resi` text COLLATE utf8mb4_general_ci NOT NULL,
  `rekening` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` int NOT NULL,
  `id_pesanan` int NOT NULL,
  `tgl_pengiriman` date NOT NULL,
  `waktu_pengiriman` time NOT NULL,
  `ekspedisi` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `resi` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id_pengiriman`, `id_pesanan`, `tgl_pengiriman`, `waktu_pengiriman`, `ekspedisi`, `resi`) VALUES
(25, 70, '2024-07-21', '00:00:15', 'JNE', 'JNAC7876987453'),
(26, 71, '2024-07-21', '00:00:15', 'JNE', 'JNAC66890834521'),
(27, 72, '2024-07-21', '00:00:15', 'JNE', 'CM09038276362'),
(28, 73, '2024-07-21', '00:00:15', 'JNE', 'JNAC7876987453'),
(29, 74, '2024-07-21', '00:00:15', 'JNE', 'JNAC57643098008'),
(30, 75, '2024-07-21', '00:00:15', 'JNE', 'JNAC4321565457098'),
(31, 76, '2024-07-21', '00:00:15', 'JNE', 'JNAC654321876'),
(32, 77, '2024-07-21', '00:00:15', 'JNE', 'CM063212443352'),
(33, 78, '2024-07-21', '00:00:15', 'JNE', 'CM776809096664'),
(34, 79, '2024-07-21', '00:00:15', 'JNE', 'JNAC443246575210'),
(35, 80, '2024-07-21', '00:00:15', 'JNE', 'CM876577532310'),
(36, 81, '2024-07-21', '00:00:15', 'JNE', 'CM6543213430'),
(37, 82, '2024-07-21', '00:00:15', 'JNE', 'JNAC9076543213'),
(38, 83, '2024-07-21', '00:00:15', 'JNE', 'JNAC32144574642'),
(39, 84, '2024-07-21', '00:00:15', 'JNE', 'CM92321335435'),
(40, 85, '2024-07-21', '00:00:15', 'JNE', 'CM33214564795'),
(41, 86, '2024-07-21', '00:00:15', 'JNE', 'JNAC5766432564'),
(42, 87, '2024-07-21', '00:00:15', 'JNE', 'JNAC7864214680'),
(43, 88, '2024-07-21', '00:00:15', 'JNE', 'JNAC34321354553'),
(44, 89, '2024-07-21', '00:00:15', 'JNE', 'JNAC45432665421'),
(45, 90, '2024-07-21', '00:00:15', 'JNE', 'CM32421347964'),
(46, 159, '2024-07-21', '00:00:15', 'JNE', 'JNAC65786431456'),
(47, 158, '2024-07-21', '00:00:15', 'JNE', 'CM76675389313'),
(48, 157, '2024-07-21', '00:00:15', 'JNE', 'JNAC5654999963'),
(49, 156, '2024-07-21', '00:00:15', 'JNE', 'JNAC32415653609'),
(50, 155, '2024-07-21', '00:00:15', 'JNE', 'CM6765432109'),
(51, 154, '2024-07-21', '00:00:15', 'JNE', 'JNAC5653242109'),
(52, 153, '2024-07-21', '00:00:15', 'JNE', 'JNAC787645532'),
(53, 152, '2024-07-21', '00:00:15', 'JNE', 'JNAC8955432532'),
(54, 151, '2024-07-21', '00:00:15', 'JNE', 'CM87654009432'),
(55, 150, '2024-07-21', '00:00:15', 'JNE', 'JNAC5543209618'),
(56, 149, '2024-07-21', '00:00:15', 'JNE', 'JNAC6543986085'),
(57, 148, '2024-07-21', '00:00:15', 'JNE', 'JNAC7895329753'),
(58, 147, '2024-07-21', '00:00:15', 'JNE', 'JNAC4321096753'),
(59, 146, '2024-07-21', '00:00:15', 'JNE', 'CM6543219876'),
(60, 145, '2024-07-21', '00:00:15', 'JNE', 'JNAC654309465'),
(61, 144, '2024-07-21', '00:00:15', 'JNE', 'JNAC876509432'),
(62, 143, '2024-07-21', '00:00:15', 'JNE', 'JNAC785327656310'),
(63, 142, '2024-07-21', '00:00:15', 'JNE', 'JNAC439076541'),
(64, 141, '2024-07-21', '00:00:15', 'JNE', 'JNAC6732109794'),
(65, 140, '2024-07-21', '00:00:15', 'JNE', 'JNAC679084321'),
(66, 139, '2024-07-21', '00:00:15', 'JNE', 'JNAC654310970'),
(67, 138, '2024-07-21', '00:00:15', 'JNE', 'JNAC8745609123'),
(68, 137, '2024-07-21', '00:00:15', 'JNE', 'JNAC0843210976'),
(69, 136, '2024-07-21', '00:00:15', 'JNE', 'CM67890432190'),
(70, 135, '2024-07-21', '00:00:15', 'JNE', 'JNAC907654385'),
(71, 134, '2024-07-21', '00:00:15', 'JNE', 'JNAC098085320'),
(72, 133, '2024-07-21', '00:00:15', 'JNE', 'CM45896090'),
(73, 132, '2024-07-21', '00:00:15', 'JNE', 'JNAC8763098763'),
(74, 131, '2024-07-21', '00:00:15', 'JNE', 'JNAC650991231'),
(75, 130, '2024-07-21', '00:00:15', 'JNE', 'JNAC9057864218'),
(76, 129, '2024-07-21', '00:00:15', 'JNE', 'JNAC7644310960'),
(77, 128, '2024-07-21', '00:00:15', 'JNE', 'JNAC789054310'),
(78, 127, '2024-07-21', '00:00:15', 'JNE', 'JNAC5432110986'),
(79, 126, '2024-07-21', '00:00:15', 'JNE', 'JNAC4542309760'),
(80, 125, '2024-07-21', '00:00:15', 'JNE', 'JNAC6543209860'),
(81, 124, '2024-07-21', '00:00:15', 'JNE', 'JNAC097537506'),
(82, 123, '2024-07-21', '00:00:15', 'JNE', 'JNAC549098808'),
(83, 122, '2024-07-21', '00:00:15', 'JNE', 'JNAC32190864210'),
(84, 121, '2024-07-21', '00:00:15', 'JNE', 'JNAC8904464241'),
(85, 120, '2024-07-21', '00:00:15', 'JNE', 'JNAC09654321098'),
(86, 119, '2024-07-21', '00:00:15', 'JNE', 'JNAC887742090'),
(87, 118, '2024-07-21', '00:00:15', 'JNE', 'JNAC4354646'),
(88, 117, '2024-07-21', '00:00:15', 'JNE', 'JNAC4309093228'),
(89, 116, '2024-07-21', '00:00:15', 'JNE', 'CM54885123098'),
(90, 115, '2024-07-21', '00:00:15', 'JNE', 'JNAC84321198055'),
(91, 114, '2024-07-21', '00:00:15', 'JNE', 'JNAC54310098065'),
(92, 113, '2024-07-21', '00:00:15', 'JNE', 'JNAC4321008964'),
(93, 112, '2024-07-21', '00:00:15', 'JNE', 'JNAC6543199682'),
(94, 111, '2024-07-21', '00:00:15', 'JNE', 'JNAC6536809887'),
(95, 110, '2024-07-21', '00:00:15', 'JNE', 'CM87765432098'),
(96, 109, '2024-07-21', '00:00:15', 'JNE', 'JNAC5432210980'),
(97, 108, '2024-07-21', '00:00:15', 'JNE', 'JNAC87565321109'),
(98, 107, '2024-07-21', '00:00:15', 'JNE', 'CM094432190557'),
(99, 106, '2024-07-21', '00:00:15', 'JNE', 'JNAC67844321097'),
(100, 105, '2024-07-21', '00:00:15', 'JNE', 'JNAC4321009864'),
(101, 104, '2024-07-21', '00:00:15', 'JNE', 'JNAC5655312309'),
(102, 103, '2024-07-21', '00:00:16', 'JNE', 'JNAC65443212097'),
(103, 102, '2024-07-21', '00:00:16', 'JNE', 'CM98807843187'),
(104, 101, '2024-07-21', '00:00:16', 'JNE', 'JNAC90665309123'),
(105, 100, '2024-07-21', '00:00:16', 'JNE', 'JNAC8734310970'),
(106, 99, '2024-07-21', '00:00:16', 'JNE', 'CM9334091376'),
(107, 98, '2024-07-21', '00:00:16', 'JNE', 'JNAC097449109'),
(108, 97, '2024-07-21', '00:00:16', 'JNE', 'CM789654309124'),
(109, 96, '2024-07-21', '00:00:16', 'JNE', 'JNAC67099454312'),
(110, 95, '2024-07-21', '00:00:16', 'JNE', 'JNAC67095540912'),
(111, 94, '2024-07-21', '00:00:16', 'JNE', 'JNAC8906753123'),
(112, 93, '2024-07-21', '00:00:16', 'JNE', 'JNAC670889036'),
(113, 92, '2024-07-21', '00:00:16', 'JNE', 'JNAC872097414'),
(114, 91, '2024-07-21', '00:00:16', 'JNE', 'CM88630756329');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int NOT NULL,
  `tanggal_pesan` datetime NOT NULL,
  `id_pelanggan` int NOT NULL,
  `status` text COLLATE utf8mb4_general_ci NOT NULL,
  `read_pel` enum('0','1') COLLATE utf8mb4_general_ci NOT NULL,
  `read_adm` enum('0','1') COLLATE utf8mb4_general_ci NOT NULL,
  `total` double NOT NULL,
  `id_alamat_pelanggan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `tanggal_pesan`, `id_pelanggan`, `status`, `read_pel`, `read_adm`, `total`, `id_alamat_pelanggan`) VALUES
(70, '2024-06-28 13:04:22', 10, 'Dikirim', '0', '0', 96000, 11),
(71, '2024-06-28 13:05:30', 10, 'Dikirim', '0', '0', 2516000, 11),
(72, '2024-06-28 13:06:31', 10, 'Dikirim', '0', '0', 76000, 11),
(73, '2024-06-28 23:43:38', 10, 'Dikirim', '0', '0', 516000, 11),
(74, '2024-06-28 23:44:16', 10, 'Selesai', '0', '0', 120000, 11),
(75, '2024-06-28 23:45:22', 10, 'Selesai', '0', '0', 478000, 11),
(76, '2024-06-28 23:46:02', 10, 'Selesai', '0', '0', 286000, 11),
(77, '2024-06-28 23:46:44', 10, 'Selesai', '0', '0', 396000, 11),
(78, '2024-06-28 23:48:00', 10, 'Selesai', '0', '0', 966000, 11),
(79, '2024-06-28 23:48:27', 10, 'Selesai', '0', '0', 566000, 11),
(80, '2024-06-28 23:50:19', 10, 'Selesai', '0', '0', 136000, 11),
(81, '2024-06-28 23:51:22', 10, 'Selesai', '0', '0', 666000, 11),
(82, '2024-06-28 23:52:06', 10, 'Selesai', '0', '0', 196000, 11),
(83, '2024-06-28 23:53:00', 10, 'Selesai', '0', '0', 616000, 11),
(84, '2024-06-28 23:54:31', 10, 'Selesai', '0', '0', 336000, 11),
(85, '2024-06-29 01:55:08', 10, 'Selesai', '0', '0', 172000, 11),
(86, '2024-06-29 09:29:41', 11, 'Selesai', '0', '0', 296000, 12),
(87, '2024-06-29 09:30:53', 11, 'Selesai', '0', '0', 172000, 12),
(88, '2024-06-29 09:31:14', 11, 'Selesai', '0', '0', 1916000, 12),
(89, '2024-06-29 09:31:45', 11, 'Selesai', '0', '0', 632000, 12),
(90, '2024-06-29 09:32:34', 11, 'Selesai', '0', '0', 786000, 12),
(91, '2024-06-29 09:32:56', 11, 'Selesai', '0', '0', 406000, 12),
(92, '2024-06-29 09:33:30', 11, 'Selesai', '0', '0', 176000, 12),
(93, '2024-06-29 09:33:59', 11, 'Selesai', '0', '0', 916000, 12),
(94, '2024-06-29 09:34:18', 11, 'Selesai', '0', '0', 586000, 12),
(95, '2024-06-29 09:34:42', 11, 'Selesai', '0', '0', 136000, 12),
(96, '2024-06-29 09:35:01', 11, 'Dikirim', '0', '0', 316000, 12),
(97, '2024-06-29 09:35:16', 11, 'Dikirim', '0', '0', 1016000, 12),
(98, '2024-06-29 09:35:37', 11, 'Dikirim', '0', '0', 5016000, 12),
(99, '2024-06-29 09:36:57', 12, 'Selesai', '0', '0', 136000, 13),
(100, '2024-06-29 09:37:28', 12, 'Selesai', '0', '0', 224000, 13),
(101, '2024-06-29 09:37:46', 12, 'Selesai', '0', '0', 966000, 13),
(102, '2024-06-29 09:38:04', 12, 'Selesai', '0', '0', 478000, 13),
(103, '2024-06-29 09:38:31', 12, 'Selesai', '0', '0', 676000, 13),
(104, '2024-06-29 09:38:54', 12, 'Selesai', '0', '0', 536000, 13),
(105, '2024-06-29 09:39:21', 12, 'Selesai', '0', '0', 136000, 13),
(106, '2024-06-29 09:39:54', 12, 'Selesai', '0', '0', 376000, 13),
(107, '2024-06-29 09:40:20', 12, 'Selesai', '0', '0', 586000, 13),
(108, '2024-06-29 09:40:43', 12, 'Selesai', '0', '0', 376000, 13),
(109, '2024-06-29 09:41:05', 12, 'Selesai', '0', '0', 166000, 13),
(110, '2024-06-29 09:41:26', 12, 'Selesai', '0', '0', 516000, 13),
(111, '2024-06-29 09:42:14', 13, 'Selesai', '0', '0', 416000, 14),
(112, '2024-06-29 09:42:35', 13, 'Selesai', '0', '0', 224000, 14),
(113, '2024-06-29 09:42:50', 13, 'Selesai', '0', '0', 966000, 14),
(114, '2024-06-29 09:43:07', 13, 'Selesai', '0', '0', 324000, 14),
(115, '2024-06-29 09:43:28', 13, 'Selesai', '0', '0', 346000, 14),
(116, '2024-06-29 09:43:55', 13, 'Selesai', '0', '0', 666000, 14),
(117, '2024-06-29 09:44:13', 13, 'Selesai', '0', '0', 76000, 14),
(118, '2024-06-29 09:44:36', 13, 'Selesai', '0', '0', 286000, 14),
(119, '2024-06-29 09:45:47', 13, 'Selesai', '0', '0', 586000, 14),
(120, '2024-06-29 09:46:05', 13, 'Selesai', '0', '0', 2866000, 14),
(121, '2024-06-29 09:46:26', 13, 'Selesai', '0', '0', 376000, 14),
(122, '2024-06-29 09:46:45', 13, 'Dikirim', '0', '0', 166000, 14),
(123, '2024-06-29 09:47:08', 13, 'Dikirim', '0', '0', 2516000, 14),
(124, '2024-06-29 09:48:02', 14, 'Selesai', '0', '0', 136000, 15),
(125, '2024-06-29 09:48:23', 14, 'Selesai', '0', '0', 416000, 15),
(126, '2024-06-29 09:53:29', 14, 'Selesai', '0', '0', 432000, 15),
(127, '2024-06-29 09:53:58', 14, 'Selesai', '0', '0', 1402000, 15),
(128, '2024-06-29 09:54:19', 14, 'Selesai', '0', '0', 1226000, 15),
(129, '2024-06-29 09:54:43', 14, 'Selesai', '0', '0', 536000, 15),
(130, '2024-06-29 09:55:02', 14, 'Selesai', '0', '0', 216000, 15),
(131, '2024-06-29 09:55:19', 14, 'Selesai', '0', '0', 286000, 15),
(132, '2024-06-29 09:55:39', 14, 'Selesai', '0', '0', 776000, 15),
(133, '2024-06-29 09:56:09', 14, 'Selesai', '0', '0', 376000, 15),
(134, '2024-06-29 09:56:25', 14, 'Selesai', '0', '0', 316000, 15),
(135, '2024-06-29 09:56:44', 14, 'Dikirim', '0', '0', 516000, 15),
(136, '2024-06-29 09:57:06', 14, 'Dikirim', '0', '0', 2516000, 15),
(137, '2024-06-29 10:02:24', 15, 'Selesai', '0', '0', 216000, 16),
(138, '2024-06-29 10:02:45', 15, 'Selesai', '0', '0', 276000, 16),
(139, '2024-06-29 10:03:01', 15, 'Selesai', '0', '0', 1916000, 16),
(140, '2024-06-29 11:52:11', 15, 'Selesai', '0', '0', 632000, 16),
(141, '2024-06-29 11:52:34', 15, 'Selesai', '0', '0', 676000, 16),
(142, '2024-06-29 11:52:52', 15, 'Selesai', '0', '0', 406000, 16),
(143, '2024-06-29 11:55:03', 15, 'Selesai', '0', '0', 236000, 16),
(144, '2024-06-29 11:55:49', 15, 'Dikirim', '0', '0', 646000, 16),
(145, '2024-06-29 11:56:03', 15, 'Selesai', '0', '0', 396000, 16),
(146, '2024-06-29 11:56:23', 15, 'Selesai', '0', '0', 256000, 16),
(147, '2024-06-29 11:56:37', 15, 'Selesai', '0', '0', 166000, 16),
(148, '2024-06-29 11:57:00', 15, 'Selesai', '0', '0', 516000, 16),
(149, '2024-06-29 11:58:41', 16, 'Selesai', '0', '0', 496000, 17),
(150, '2024-06-29 12:00:23', 16, 'Dikirim', '0', '0', 380000, 17),
(151, '2024-06-29 12:00:36', 16, 'Dikirim', '0', '0', 966000, 17),
(152, '2024-06-29 12:00:54', 16, 'Dikirim', '0', '0', 478000, 17),
(153, '2024-06-29 12:01:13', 16, 'Selesai', '0', '0', 1116000, 17),
(154, '2024-06-29 12:01:32', 16, 'Selesai', '0', '0', 1186000, 17),
(155, '2024-06-29 12:01:49', 16, 'Selesai', '0', '0', 296000, 17),
(156, '2024-06-29 12:02:15', 16, 'Selesai', '0', '0', 736000, 17),
(157, '2024-06-29 12:02:30', 16, 'Selesai', '0', '0', 396000, 17),
(158, '2024-06-29 12:02:48', 16, 'Selesai', '0', '0', 256000, 17),
(159, '2024-06-29 12:03:03', 16, 'Selesai', '0', '0', 166000, 17);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_produk` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `foto_produk` text COLLATE utf8mb4_general_ci,
  `harga` double DEFAULT NULL,
  `diskon` double NOT NULL DEFAULT '0',
  `stok_awal` int DEFAULT NULL,
  `stok_akhir` int NOT NULL,
  `harga_jual` double NOT NULL,
  `detail` text COLLATE utf8mb4_general_ci,
  `id_kategori` int DEFAULT NULL,
  `id_merek` int NOT NULL,
  `terjual` int NOT NULL,
  `rating` float(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `foto_produk`, `harga`, `diskon`, `stok_awal`, `stok_akhir`, `harga_jual`, `detail`, `id_kategori`, `id_merek`, `terjual`, `rating`) VALUES
('PRD001', 'Toshiba Hayabusa 128gb', '1b9d2f477e8159130958119cce8d5389.jpeg', 40000, 0, 125, 65, 40000, '<p><span style=\"color: rgba(0, 0, 0, 0.8); font-family: Roboto, \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" 文泉驛正黑,=\"\" \"wenquanyi=\"\" zen=\"\" hei\",=\"\" \"hiragino=\"\" sans=\"\" gb\",=\"\" \"儷黑=\"\" pro\",=\"\" \"lihei=\"\" \"heiti=\"\" tc\",=\"\" 微軟正黑體,=\"\" \"microsoft=\"\" jhenghei=\"\" ui\",=\"\" jhenghei\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" white-space-collapse:=\"\" preserve;\"=\"\">Kecepatan tulis 7 Mbps\r\nKecepatan baca 17 Mbps\r\nFull-Speed USB2.0\r\nDapat menyimpan, melindungi, dan mentransfer file kemanapun Anda pergi\r\nBarang dalam kondisi baru\r\nReady Stock\r\npengiriman cepat dan amann</span><br></p>', 26, 17, 60, 5),
('PRD002', 'SanDisk CZ50 Cruzer Blade USB 2.0 16GB', '17f55cb4851237f55622c7c57f8546b3.jpeg', 52000, 0, 90, 54, 52000, '<p class=\"QN2lPu\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space-collapse: preserve;\">USB 2.0</p><p class=\"QN2lPu\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space-collapse: preserve;\">SanDisk SecureAccess</p><p class=\"QN2lPu\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space-collapse: preserve;\">\r\n</p><p class=\"QN2lPu\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space-collapse: preserve;\">Bawa dan simpan setiap file favorit Anda menggunakan USB Flash Disk keluaran SanDisk ini, SanDisk Cruzer Blade. Dengan bentuk yang kecil namun cepat untuk men-transfer konten digital dari komputer ke komputer lainnya. SanDisk Cruzer Blade memiliki fitur SanDisk SecureAccess yang melindungi file didalam USB flash disk dari akses ilegal serta nikmati fitur backup online yang aman dari YuuWaa untuk mengakses file secara online dimana saja.</p><p class=\"QN2lPu\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space-collapse: preserve;\">\r\n</p><p class=\"QN2lPu\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space-collapse: preserve;\">Desain Kompak</p><p class=\"QN2lPu\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space-collapse: preserve;\">Sebuah aksesori yang ideal untuk Anda pengguna data, SanDisk Cruzer Blade memiliki desain unik seperti pisau. Memiliki dimensi 5.6 x 3.6 x 1 cm, USB drive ini mudah dimasukkan ke dalam dompet atau saku baju.</p><p class=\"QN2lPu\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space-collapse: preserve;\">\r\n</p><p class=\"QN2lPu\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space-collapse: preserve;\">Kapasitas Besar</p><p class=\"QN2lPu\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space-collapse: preserve;\">Tersedia dalam berbagai kapasitas, SanDisk Cruzer Blade memiliki cukup ruang untuk menyimpan semua file penting Anda. Foto favorit, lagu, dokumen, dan file pribadi lainnya akan berada disana kapanpun Anda membutuhkannya.</p><p class=\"QN2lPu\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space-collapse: preserve;\">\r\n</p><p class=\"QN2lPu\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space-collapse: preserve;\">Transfer File yang Mudah</p><p class=\"QN2lPu\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space-collapse: preserve;\">Untuk memindahkan file ke SanDisk Cruzer Blade, cukup pasang drive USB ini ke port USB Anda dan drag file yang diinginkan ke folder USB flash disk. Tidak memerlukan driver atau instalasi tambahan.</p><p class=\"QN2lPu\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space-collapse: preserve;\">\r\n</p><p class=\"QN2lPu\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space-collapse: preserve;\">SanDisk SecureAccess</p><p class=\"QN2lPu\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space-collapse: preserve;\">SanDisk Cruzer Blade memiliki software SecureAccess, agar Anda dapat membuat folder yang dapat dilindungi dengan menggunakan password. File Anda akan dilindungi dengan enkripsi 128-bit AES, sehingga Anda dapat berbagi drive dengan tetap menjaga file informasi penting secara aman.</p><p class=\"QN2lPu\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space-collapse: preserve;\">\r\n</p><p class=\"QN2lPu\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space-collapse: preserve;\">Penyimpanan Cloud</p><p class=\"QN2lPu\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space-collapse: preserve;\">Dengan USB drive SanDisk Cruzer Blade, Anda juga dapat mengakses penyimpanan data secara online sebesar 2GB dari YuuWaa, layanan penyimpanan Cloud. Menampilkan interface sederhana drag-and-drop, YuuWaa mudah untuk melakukan penyimpanan dan backup file secara online melalui server kapanpun dan dimanapun.</p>', 26, 18, 36, 5),
('PRD003', 'Seagate New Expansion Harddisk Eksternal 1TB', '0afdc10ff44739c5ef4463783c7a7fa6.jpeg', 950000, 0, 50, 39, 950000, '<p>* Cukup drag-and-drop untuk menyimpan file</p><p>* Transfer data yang cepat dengan konektivitas USB 3.0</p><p><br></p><p>SOLUSI PENYIMPANAN</p><p>Hard disk eksternal Expansion ini mudah diinstal dengan mencolokkan ke dua kabel. Anda dapat mulai menyimpan file digital ke hard disk ini dalam hitungan detik setelah dilepaskan dari kotaknya.</p><p><br></p><p><br></p><p>File foto digital, video, dan file musik dapat membebani penyimpanan komputer Anda, menyebabkan kinerja menurun karena hard disk internalnya memenuhi kapasitas.</p><p><br></p><p>MUDAH DIGUNAKAN</p><p>Fitur hard disk eksternal Seagate Expansion seperti ini memudahkan penggunaan hard disk ini dalam hitungan detik setelah dilepas dari kotaknya:</p><p>* Cukup colokkan ke catu daya yang disertakan dan kabel USB</p><p>* Hard disk ini otomatis dikenali oleh sistem operasi Windowstidak perlu menginstal perangkat lunak dan pengaturan konfigurasi</p><p>* Seret dan jatuhkan untuk menyimpan file ke hard disk eksternal Expansion</p><p>* Manajemen daya internal secara otomatis memastikan operasi yang hemat energi</p><p><br></p><p>Informasi Produk :&nbsp;</p><p>- Kondisi: 100% Baru</p><p>- Garansi 3 Tahun</p><p>- Ukuran: 2.5\"</p><p>- Kapasitas: 1TB&nbsp; &nbsp;</p><p>- USB 3.0, transfer data dengan cepat</p><p>- Portable &amp; ringan</p><p>- Kesesuaian Sistem Operasi : Windows 10, Windows 8, Windows 7, Windows Vista, Windows XP SP3 (32-bit dan 64-bit)</p><p><br></p><p>- Barang memiliki</p><p>1 x Hard Disk Drive</p><p>1 x USB Data Cable</p><p>1 x User Manual</p><p>1 x Kotak kemasan</p>', 26, 19, 11, 5),
('PRD004', 'TP-Link TL-WR840N 300Mbps Router Wireless 2 Antena', 'a800905132b117ea6a7424fb8535c090.jpeg', 154000, 0, 65, 37, 154000, '<p><span style=\"color: rgba(0, 0, 0, 0.8); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space-collapse: preserve;\">Spesifikasi :\r\n- Interface : 4 10/100Mbps LAN PORTS, 1 10/100Mbps WAN PORT\r\n- Button : WPS/RESET Button\r\n- Antenna : 2 Antennas\r\n- External Power Supply : 9VDC / 0.6A\r\n- Wireless Standards : IEEE 802.11n, IEEE 802.11g, IEEE 802.11b\r\n- Dimensions ( W x D x H ) : 7.2 x 5.0 x 1.4in.(182 x 128 x 35 mm)\r\n- Wireless Functions : Enable/Disable Wireless Radio, WDS Bridge, WMM, Wireless Statistics\r\n- Wireless Security : 64/128-bit WEP, WPA / WPA2,WPA-PSK / WPA2-PSK\r\n- Quality of Service : WMM, Bandwidth Control\r\n- WAN Type : Dynamic IP/Static IP/PPPoE/ PPTP/L2TP\r\n- Management : Access Control, Local Management, Remote Management\r\n- DHCP : Server, Client, DHCP Client List, Address Reservation\r\n- Port Forwarding : Virtual Server,Port Triggering, UPnP, DMZ\r\n- Dynamic DNS : DynDns, Comexe, NO-IP\r\n- VPN Pass-Through : PPTP, L2TP, IPSec (ESP Head)\r\n- Access Control : Parental Control, Local Management Control, Host List, Access Schedule, Rule Management\r\n- Firewall Security : DoS, SPI Firewall, IP Address Filter/MAC Address Filter/Domain Filter, IP and MAC Address Binding\r\n- Protocols : Support IPv4 and IPv6\r\n- Guest Network : 2.4GHz Guest Network x1\r\n- Certification : CE, RoHS\r\n- Package Contents : TL-WR840N, Power supply unit, Resource CD, Ethernet Cable, Quick Installation Guide\r\n- System Requirements : Windows 2000/XP/Vista, Windows 7, Windows 8, Windows 8.1, Windows 10 or Mac OS or Linux-based operating system</span><br></p>', 27, 20, 28, 5),
('PRD005', 'TPLink Wireless USB WiFi Adapter Tp Link TL-WN722N', '16ee96fca3eb795999148c91011c8930.jpeg', 110000, 0, 100, 52, 110000, '<p><span style=\"color: rgba(0, 0, 0, 0.8); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space-collapse: preserve;\">HIGHLIGHT &amp; FITUR\r\n* Kecepatan nirkabel luar biasa hingga 150Mbps\r\n* Versi 3.0\r\n* Kemudahan enkripsi keamanan nirkabel dengan menekan tombol QSS\r\n* Gain antena eksternal membawa kinerja tinggi lebih baik daripada antena internal konvensional\r\n* Mendukung 64/128 WEP, WPA / WPA2/WPA-PSK/WPA2-PSK (TKIP/AES), mendukung IEEE 802.1X\r\n* 4dBi Eksternal antena dapat dilepas memungkinkan untuk penyelarasan yang lebih baik dan upgrade antena yang lebih kuat\r\n* Mendukung ad-hoc dan mode infrastruktur\r\n* Dibundel utilitas yang menyediakan instalasi cepat &amp; bebas kerumitan\r\n* Kompatibel dengan produk 802.11n/b/g\r\n* Support Windows 2000, Windows XP 32/64bit, Vista 32/64bit, Windows 7 32/64bit dan windows 10\r\n\r\nFUNGSI PRODUK\r\nWireless N USB Adapter TL-WN722N memungkinkan Anda untuk menghubungkan komputer desktop atau notebook ke jaringan nirkabel dan akses koneksi internet berkecepatan tinggi. Sesuai standar IEEE 802.11n, mereka memberikan kecepatan nirkabel hingga 150Mbps, bermanfaat untuk game online atau bahkan video streaming. Juga enkripsi keamanan nirkabel dapat dibentuk hanya dengan menekan tombol QSS (Keamanan Quick Setup), mencegah jaringan dari ancaman luar.\r\n\r\nFITUR HARDWARE\r\nInterface: USB 2.0\r\nButton: WPS Button\r\nDimensions ( W x D x H ): 3.7 x 1.0 x 0.4 in. (93.5 x 26 x 11mm)\r\nAntenna Type: Detachable Omni Directional (RP-SMA)\r\nAntenna Gain: 4dBi</span><br></p>', 27, 20, 48, 5),
('PRD006', 'Tenda N301 Router Wiresless WiFi 300Mbps 2 Antenna', '67de8a0c61617287c975865edede6b77.jpeg', 130000, 0, 70, 37, 130000, '<p><span style=\"color: rgba(0, 0, 0, 0.8); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space-collapse: preserve;\">SPESIFIKASI\r\nstandard IEEE802.11n/g/b , IEEE802.3/3u\r\nInterfacenya 1xWAN 10/100Mbps dan 3xLAN 10/100Mbps\r\nAntena : 2x 5dBi fixed\r\nSecurity : WEP/WPA/WPA2\r\nIndikator LED : SYS, WLAN, WAN, LAN 1 - 3\r\nFitur Tambahan : Universal Repeater, WISP, WDS, AP WiFi Radio On/Off, Port Forward, DHCP Server, DDNS, MAC/IP Filtering, QoS.\r\n\r\nISI PAKET / BOX :\r\nRouter Wireless N301\r\nPower Adaptor\r\nKabel Ethernet\r\nQuick Installation Guide\r\nResource CD Manual</span><br></p>', 27, 21, 33, 5),
('PRD007', 'Kabel LAN 10M', '318d324b015bf3d20b1de2063b0ac992.jpeg', 20000, 0, 140, 79, 20000, '<p><span style=\"color: rgba(0, 0, 0, 0.8); font-family: Roboto, \"Helvetica Neue\", Helvetica, Arial, 文泉驛正黑, \"WenQuanYi Zen Hei\", \"Hiragino Sans GB\", \"儷黑 Pro\", \"LiHei Pro\", \"Heiti TC\", 微軟正黑體, \"Microsoft JhengHei UI\", \"Microsoft JhengHei\", sans-serif; font-size: 14px; white-space-collapse: preserve;\">Kabel LAN dengan Kepala Konektor RJ45 + PLUG BOOT yang sudah terpasang, Praktis dan Tidak Ribet. Kabel berwarna Biru dengan susunan kabel Straight.\r\n\r\nDapat digunakan untuk\r\n- Menghubungkan antara computer dengan switch\r\n- Menghubungkan computer dengan LAN pada modem cable/DSL\r\n- Menghubungkan router dengan LAN pada modem cable/DSL\r\n- Menghubungkan switch ke router\r\n- Menghubungkan hub ke router</span><br></p>', 27, 22, 61, 5),
('PRD008', 'Wireless Adapter TP-Link UB500 Bluetooth 5.0 Nano ', '62434cffd0afcafe6d44cc80c49250ca.jpeg', 90000, 0, 50, 12, 90000, '<p><span style=\"color: rgba(0, 0, 0, 0.8); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space-collapse: preserve;\">Wireless Adapter TP-Link UB500 Bluetooth 5.0 Nano USB - TPLink UB500\r\n\r\n• Bluetooth 5.0 – Applies the latest Bluetooth 5.0 technology, backward compatible with Bluetooth V4.0/3.0/2.1/2.0/1.1\r\n• Wireless Connectivity – Provides stable and convenient communication between Bluetooth devices and your PC or laptop\r\n• Nano-Sized – Ultra-small for convenient portability with reliable high performance\r\n• Supported Operating System – Windows 11/10/8.1/7\r\n\r\nHARDWARE FEATURES\r\nStandards and Protocols	Bluetooth 5.0\r\nInterface	USB 2.0\r\nDimensions	0.58 × 0.27 × 0.74 in (14.8 × 6.8 × 18.9 mm)\r\n\r\nOTHERS\r\nPackage Contents\r\nBluetooth 5.0 Nano USB Adapter UB500\r\nQuick Installation Guide\r\nSystem Requirements	Supported operating systems include Win 11/10/8.1/7\r\nEnvironment\r\nOperating Temperature: 0℃~40℃ (32℉ ~104℉)\r\nOperating Humidity: 10%~90% non-condensing\r\nStorage Humidity: 5%~90% non-condensing</span><br></p>', 27, 20, 38, 4),
('PRD009', 'Wireless Mouse Logitech M221', '993b5b86141e46184623da0feb08d814.jpg', 190000, 0, 50, 31, 190000, '<p><span style=\"color: rgba(0, 0, 0, 0.8); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space-collapse: preserve;\">SPESIFIKASI &amp; DETIL\r\nDIMENSI\r\nMouse\r\nTinggi x Lebar x Tebal:\r\n99 mm x 60 mm x 39 mm\r\nBerat (dengan baterai): 75,2 g\r\n\r\nNano receiver\r\nTinggi x Lebar x Tebal:\r\n14,4 mm x 18,7 mm x 6,1 mm\r\nBerat: 1,8 g\r\n\r\nSPESIFIKASI TEKNIKAL\r\nTipe Koneksi: Koneksi wireless 2,4GHz\r\nJangkauan wireless: 10 meter\r\nConnect / Power: Ya, tombol on/off\r\nRincian Baterai: 1 x AA\r\n\r\nDaya tahan baterai: hingga 18 bulan*\r\n*Daya tahan baterai dapat bervariasi tergantung pola penggunaan, pengaturan komputasi, dan kondisi lingkungan\r\n(Min./Maks.): 1000\r\n\r\nTeknologi sensor: Logitech Advanced Optical Tracking\r\nResolusi sensor: 1000 dpi\r\nScroll Wheel: Ya, 2D, optik\r\nJumlah tombol: 3\r\nTombol Standar dan Spesial: Klik tengah\r\n\r\nPERSYARATAN SISTEM\r\nWindows 10 atau versi terbaru, Windows 8, Windows RT, Windows 7\r\nMac OS X 10.5 atau versi terbaru\r\nChrome OS\r\nLinux Kernel 2.6+2\r\nKoneksi USB: menggunakan Port USB.</span><br></p>', 28, 23, 19, 5),
('PRD010', 'MOUSE WIRELESS ROBOT M205', '5625c4819dfa2096aa7641d235d73f62.jpg', 60000, 0, 75, 44, 60000, '<p>ROBOT M205 Wireless Mouse 800-1200-1600 DPI (without battery) ORI 100%</p><p><br></p><p>Keunggulan:</p><p>1. Desain yang ergonomis</p><p>2. Kecil dan portabel</p><p>3. Sensor optik 1600 DPI tingkat DPI juga bisa di atur</p><p>4. jangkauan nya hingga 10M dan stabil saat di gunakan</p><p>5. Terdapat power Switch</p><p>6. Plug and play</p><p><br></p><p>Spesifkasi:</p><p>Brand: Robot</p><p>Type: M205</p><p>Number of keys: 4</p><p>DPI: 800-1200-1600</p><p>Report rate: 125Hz</p><p>Switch rating: Over 2 million clicks</p><p>Size: 99.8*60.5*32mm</p><p>Weight: 45.5g (Without battery)</p><p>Battery Spesifications: 1*AA</p><p><br></p>', 28, 24, 31, 5),
('PRD011', 'Logitech K120 USB Keyboard', 'ef73cb5e1d2794f2ef04b8f0add1e975.png', 150000, 0, 25, 13, 150000, '<h5 class=\"body-copy-title font-title-l font-brown-bold dc-black tc-black mc-black \" style=\"box-sizing: inherit; margin-bottom: 0.6781em; font-family: Lato, Arial, Helvetica, sans-serif; font-weight: 700; line-height: 1.4; color: rgb(51, 51, 51); font-size: 16px; clear: both;\">KESEDERHANAAN YANG ANDAL</h5><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; font-family: Lato, Arial, Helvetica, sans-serif; font-size: 14px; color: rgb(85, 85, 85);\">Menyelesaikan pekerjaan kini seharusnya menjadi sederhana. Inilah yang menjadikan full-size keyboard ini sangat cocok. Keyboard ini adalah partner andal dan tahan lama yang dilengkapi number pad dan desain yang mudah digunakan, serta dapat digunakan begitu dikeluarkan dari kemasannya. Colokkan saja keyboard berkabel ini via USB dan langsung gunakan.</p><h5 class=\"body-copy-title font-title-l font-brown-bold dc-black tc-black mc-black \" style=\"box-sizing: inherit; margin-bottom: 0.6781em; font-family: Lato, Arial, Helvetica, sans-serif; font-weight: 700; line-height: 1.4; color: rgb(51, 51, 51); font-size: 16px; clear: both;\">NYAMAN DAN FULL-SIZE</h5><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; font-family: Lato, Arial, Helvetica, sans-serif; font-size: 14px; color: rgb(85, 85, 85);\">Full-size keyboard dengan number pad terintegrasi ini sangat memudahkan untuk memasukkan data, melakukan penghitungan, dan navigasi. Space bar melengkung bersama tombol yang mudah dibaca menyediakan pengalaman mengetik yang nyaman dan familier.</p><h5 class=\"body-copy-title font-title-l font-brown-bold dc-black tc-black mc-black \" style=\"box-sizing: inherit; margin-bottom: 0.6781em; font-family: Lato, Arial, Helvetica, sans-serif; font-weight: 700; line-height: 1.4; color: rgb(51, 51, 51); font-size: 16px; clear: both;\">PLUG &amp; PLAY YANG MUDAH</h5><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; font-family: Lato, Arial, Helvetica, sans-serif; font-size: 14px; color: rgb(85, 85, 85);\">Keyboard dapat digunakan begitu dikeluarkan dari kemasannya. Colokkan saja ke port USB dan keyboard siap untuk digunakan. Tidak perlu download, tidak perlu pengaturan, tidak merepotkan.</p><h5 class=\"body-copy-title font-title-l font-brown-bold dc-black tc-black mc-black \" style=\"box-sizing: inherit; margin-bottom: 0.6781em; font-family: Lato, Arial, Helvetica, sans-serif; font-weight: 700; line-height: 1.4; color: rgb(51, 51, 51); font-size: 16px; clear: both;\">TAHAN LAMA DAN TAHAN TUMPAHAN</h5><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; font-family: Lato, Arial, Helvetica, sans-serif; font-size: 14px; color: rgb(85, 85, 85);\">Desain antitumpahan cairan<a class=\"note note-tooltip js-note-tooltip pangea-inited\" style=\"box-sizing: inherit; color: inherit; transition: all 0.25s ease 0s;\"><span aria-label=\"footnote 1\" style=\"box-sizing: inherit; position: relative; font-size: 10.5px; line-height: 0; vertical-align: baseline; top: -0.5em;\">1</span><span class=\"visually-hidden js-tooltip-descriptor\" aria-hidden=\"true\" style=\"box-sizing: inherit;\">Diuji dalam kondisi terbatas (maksimum tumpahan cairan sebanyak 60 ml). Jangan benamkan keyboard ke dalam cairan.</span></a>, tombol awet, dan kaki penopang yang kokoh dengan tinggi yang dapat disesuaikan, keyboard ini dibuat agar awet.</p><h5 class=\"body-copy-title font-title-l font-brown-bold dc-black tc-black mc-black \" style=\"box-sizing: inherit; margin-bottom: 0.6781em; font-family: Lato, Arial, Helvetica, sans-serif; font-weight: 700; line-height: 1.4; color: rgb(51, 51, 51); font-size: 16px; clear: both;\">DIBUAT AGAR TAHAN LAMA</h5><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; font-family: Lato, Arial, Helvetica, sans-serif; font-size: 14px; color: rgb(85, 85, 85);\">K120 ini dibuat dengan standar kualitas tinggi dan keandalan sama yang menjadikan Logitech sebagai pemimpin global #1 untuk mouse dan keyboard<span style=\"box-sizing: inherit; color: rgb(34, 34, 34);\"><span style=\"box-sizing: inherit; font-size: 13.3333px;\">.</span></span></p><h5 class=\"body-copy-title font-title-l font-brown-bold dc-black tc-black mc-black \" style=\"box-sizing: inherit; margin-bottom: 0.6781em; font-family: Lato, Arial, Helvetica, sans-serif; font-weight: 700; line-height: 1.4; color: rgb(51, 51, 51); font-size: 16px; clear: both;\">NUANSA MENGETIK YANG KAMU SUKAI</h5><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; font-family: Lato, Arial, Helvetica, sans-serif; font-size: 14px; color: rgb(85, 85, 85);\">Keyboard stabil ini menghadirkan nuansa mengetik yang familer, dengan tombol deep-profile, dan springy, responsive bounce-back.</p><h5 class=\"body-copy-title font-title-l font-brown-bold dc-black tc-black mc-black \" style=\"box-sizing: inherit; margin-bottom: 0.6781em; font-family: Lato, Arial, Helvetica, sans-serif; font-weight: 700; line-height: 1.4; color: rgb(51, 51, 51); font-size: 16px; clear: both;\">DIBUAT DENGAN PLASTIK DAUR ULANG</h5><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; font-family: Lato, Arial, Helvetica, sans-serif; font-size: 14px; color: rgb(85, 85, 85);\">Bagian plastik di K120 mencakup 51% plastik bersertifikasi post consumer recycled (PCR) — guna memberikan nyawa kedua bagi plastik dari barang elektronik tua yang habis masa pakainya dan membantu mengurangi jejak karbon kami.</p><h4 style=\"box-sizing: inherit; margin-bottom: 0.6781em; font-family: Lato, Arial, Helvetica, sans-serif; font-weight: 700; line-height: 1.4; color: rgb(51, 51, 51); font-size: 20px; clear: both;\">Spesifikasi :</h4><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; font-family: Lato, Arial, Helvetica, sans-serif; font-size: 14px; color: rgb(85, 85, 85);\"><span style=\"box-sizing: inherit; font-weight: 600;\"><em style=\"box-sizing: inherit;\">Dimensi</em></span></p><ul style=\"margin-bottom: 1.5em; margin-left: 1.5em; padding: 0px; list-style-position: initial; list-style-image: initial; color: rgb(85, 85, 85); font-family: Lato, Arial, Helvetica, sans-serif; font-size: 14px;\"><li style=\"box-sizing: inherit; margin-bottom: 0.6781em;\">Tinggi: 155 mm</li><li style=\"box-sizing: inherit; margin-bottom: 0.6781em;\">Lebar: 450 mm</li><li style=\"box-sizing: inherit; margin-bottom: 0.6781em;\">Tebal: 23,5 mm</li><li style=\"box-sizing: inherit; margin-bottom: 0.6781em;\">Berat: 550 g</li><li style=\"box-sizing: inherit; margin-bottom: 0.6781em;\">Panjang kabel: Tambah kecerahan tombol</li></ul><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; font-family: Lato, Arial, Helvetica, sans-serif; font-size: 14px; color: rgb(85, 85, 85);\"><em style=\"box-sizing: inherit;\"><span style=\"box-sizing: inherit; font-weight: 600;\">Persyaratan Sistem</span></em></p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; font-family: Lato, Arial, Helvetica, sans-serif; font-size: 14px; color: rgb(85, 85, 85);\">Apa yang anda butuhkan :</p><ul style=\"margin-bottom: 1.5em; margin-left: 1.5em; padding: 0px; list-style-position: initial; list-style-image: initial; color: rgb(85, 85, 85); font-family: Lato, Arial, Helvetica, sans-serif; font-size: 14px;\"><li style=\"box-sizing: inherit; margin-bottom: 0.6781em;\">Windows® 10,11 or later</li><li style=\"box-sizing: inherit; margin-bottom: 0.6781em;\">available USB port</li></ul><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; font-family: Lato, Arial, Helvetica, sans-serif; font-size: 14px; color: rgb(85, 85, 85);\"><em style=\"box-sizing: inherit;\"><span style=\"box-sizing: inherit; font-weight: 600;\">Spesifikasi Teknis</span></em></p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; font-family: Lato, Arial, Helvetica, sans-serif; font-size: 14px; color: rgb(85, 85, 85);\"><span style=\"box-sizing: inherit; font-weight: 600;\">Keyboard</span></p><ul style=\"margin-bottom: 1.5em; margin-left: 1.5em; padding: 0px; list-style-position: initial; list-style-image: initial; color: rgb(85, 85, 85); font-family: Lato, Arial, Helvetica, sans-serif; font-size: 14px;\"><li style=\"box-sizing: inherit; margin-bottom: 0.6781em;\">Desain anti tumpahan cairan</li><li style=\"box-sizing: inherit; margin-bottom: 0.6781em;\">Number pad 10 tombol</li><li style=\"box-sizing: inherit; margin-bottom: 0.6781em;\">Lampu indikator Caps lock</li><li style=\"box-sizing: inherit; margin-bottom: 0.6781em;\">Lampu indikator num lock</li><li style=\"box-sizing: inherit; margin-bottom: 0.6781em;\">Maksimal 10 juta keystroke (tidak termasuk tombol number lock)</li><li style=\"box-sizing: inherit; margin-bottom: 0.6781em;\">Jenis tombol: Deep-profile</li></ul><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; font-family: Lato, Arial, Helvetica, sans-serif; font-size: 14px; color: rgb(85, 85, 85);\"><span style=\"box-sizing: inherit; font-weight: 600;\">Keberlanjutan</span></p><ul style=\"margin-bottom: 1.5em; margin-left: 1.5em; padding: 0px; list-style-position: initial; list-style-image: initial; color: rgb(85, 85, 85); font-family: Lato, Arial, Helvetica, sans-serif; font-size: 14px;\"><li style=\"box-sizing: inherit; margin-bottom: 0.6781em;\">Plastik hitam: 51% bahan Post Consumer</li><li style=\"box-sizing: inherit; margin-bottom: 0.6781em;\">Recycled (PCR)</li></ul><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; font-family: Lato, Arial, Helvetica, sans-serif; font-size: 14px; color: rgb(85, 85, 85);\"><span style=\"box-sizing: inherit; font-weight: 600;\">Nomor Suku Cadang</span></p><ul style=\"margin-bottom: 1.5em; margin-left: 1.5em; padding: 0px; list-style-position: initial; list-style-image: initial; color: rgb(85, 85, 85); font-family: Lato, Arial, Helvetica, sans-serif; font-size: 14px;\"><li style=\"box-sizing: inherit; margin-bottom: 0.6781em;\">920-002582</li></ul>', 28, 23, 12, 4),
('PRD012', 'Logitech C270H HD Web Cam', 'f0f24f798e7a5d00e546cc06eb06ebb2.png', 500000, 0, 20, 14, 500000, '<h5 class=\"body-copy-title font-title-m font-brown-bold \" style=\"box-sizing: inherit; margin-bottom: 0.6781em; font-family: Lato, Arial, Helvetica, sans-serif; font-weight: 700; line-height: 1.4; color: rgb(51, 51, 51); font-size: 16px; clear: both;\">PANGGILAN VIDEO HD YANG SEDERHANA</h5><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; font-family: Lato, Arial, Helvetica, sans-serif; font-size: 14px; color: rgb(85, 85, 85);\">C270 HD Webcam menghadirkan panggilan konferensi yang tajam dan mulus (720p/30fps) dalam format widescreen. Automatic light correction menampilkan Anda dalam warna yang nyata dan alami.</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; font-family: Lato, Arial, Helvetica, sans-serif; font-size: 14px; color: rgb(85, 85, 85);\"><span style=\"box-sizing: inherit; color: rgb(118, 118, 118); font-size: 0.8125rem; font-weight: 800; letter-spacing: 0.15em; text-transform: uppercase;\">PANGGILAN VIDEO HD 720P WIDESCREEN</span></p><div id=\"-iia08792e3b67e45af5e90aa2d5f690e47\" class=\"banner-wrapper\" data-analytics-section=\"main-banner\" style=\"box-sizing: inherit; color: rgb(85, 85, 85); font-family: Lato, Arial, Helvetica, sans-serif; font-size: 14px;\"><section id=\"banner_630340063-ia08792e3b67e45af5e90aa2d5f690e47\" class=\"pangea-cmp banner js-pangea-banner dbgsize-cover tbgsize-cover mbgsize-cover dbgpos-center tbgpos-center mbgpos-center init-ready pangea-inited\" aria-label=\"PANGGILAN VIDEO HD 720P WIDESCREEN\" data-bg-img-desktop=\"https://resource.logitech.com/w_1800,h_1800,c_limit,q_auto,f_auto,dpr_1.0/d_transparent.gif/content/dam/logitech/en/products/webcams/c270/c270-feature-3-desktop.png?v=1\" data-bg-img-tablet=\"https://resource.logitech.com/w_1024,h_1366,c_limit,q_auto,f_auto,dpr_1.0/d_transparent.gif/content/dam/logitech/en/products/webcams/c270/c270-feature-3-tablet.png?v=1\" data-bg-img-mobile=\"https://resource.logitech.com/w_420,h_1024,c_limit,q_auto,f_auto,dpr_1.0/d_transparent.gif/content/dam/logitech/en/products/webcams/c270/c270-feature-3-mobile.png?v=1\" data-size-desktop=\"size-75vh\" data-size-tablet=\"size-75vh\" data-size-mobile=\"size-75vh\" data-theme-desktop=\"theme-light\" data-theme-tablet=\"theme-light\" data-theme-mobile=\"theme-light\" data-video-display-mode-desktop=\"modal\" data-video-display-mode-tablet=\"modal\" data-video-display-mode-mobile=\"modal\" data-video-host=\"youtube\" data-video-ar=\"16x9\" data-video-play-btn-desktop=\"center\" data-video-play-btn-tablet=\"center\" data-video-play-btn-mobile=\"center\" data-gradient-desktop=\"none\" data-gradient-opacity-desktop=\"50\" data-gradient-tablet=\"none\" data-gradient-opacity-tablet=\"50\" data-gradient-mobile=\"none\" data-gradient-opacity-mobile=\"50\" data-layout-desktop=\"text-only\" data-layout-tablet=\"text-only\" data-layout-mobile=\"text-only\" data-layout-copy-width=\"3\" data-layout-copy-offset=\"8\" data-layout-img-width=\"5\" data-layout-img-offset=\"1\" data-layout-copy-width-inner=\"3\" data-text-align-desktop=\"left\" data-text-align-tablet=\"center\" data-text-align-mobile=\"center\" data-vert-align-content-desktop=\"center\" data-vert-align-tablet=\"top\" data-vert-align-mobile=\"top\" data-vert-align-items-desktop=\"center\" data-analytics-title=\"panggilan-video-hd-720p-widescreen\" data-display-mode-tablet=\"overlaid\" data-display-mode-mobile=\"overlaid\" data-fg-img-desktop=\"\" data-fg-img-tablet=\"\" data-fg-img-mobile=\"\" data-fg-img-align-desktop=\"\" data-fg-img-align-tablet=\"\" data-fg-img-align-mobile=\"\" data-fg-img-alt=\"\" data-bg-align-desktop=\"center\" data-bg-align-tablet=\"\" data-bg-align-mobile=\"\" data-bg-color-desktop=\"black\" data-bg-color-tablet=\"\" data-bg-color-mobile=\"\" data-bg-size-desktop=\"cover\" data-bg-size-tablet=\"\" data-bg-size-mobile=\"\" data-video-id=\"\" data-bg-video-desktop=\"\" data-bg-video-tablet=\"\" data-bg-video-mobile=\"\" data-body-icon-desktop=\"\" data-body-icon-tablet=\"\" data-body-icon-mobile=\"\" data-body-icon-position=\"\" data-visible-desktop=\"true\" data-visible-tablet=\"true\" data-visible-mobile=\"true\" style=\"box-sizing: inherit;\"><div class=\"container js-banner-main-ctn\" style=\"box-sizing: inherit; width: 1123.2px; padding-right: 15px; padding-left: 15px; max-width: 1200px;\"><div id=\"banner_630340063-ia08792e3b67e45af5e90aa2d5f690e47-padding-options\" class=\"grid js-banner-main-grid aem-padding-options dptauto dpbauto tptauto tpbauto mptauto mpbauto\" style=\"box-sizing: inherit;\"><div class=\"banner-copy-ctn\" style=\"box-sizing: inherit;\"><div class=\"grid\" style=\"box-sizing: inherit;\"><div class=\"banner-copy-ctn-inner js-banner-copy-ctn-inner\" style=\"box-sizing: inherit;\"><p class=\"body-copy-ctn js-body-copy-ctn rte-field \" style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px;\">Panggilan video HD 720p/30 fps yang jelas dengan bidang pandang 55° diagonal dan auto light correction. Kompatibel dengan platform populer, termasuk Skype<span style=\"box-sizing: inherit; position: relative; font-size: 10.5px; line-height: 0; vertical-align: baseline; top: -0.5em;\">TM</span>&nbsp;dan Zoom<span style=\"box-sizing: inherit; position: relative; font-size: 10.5px; line-height: 0; vertical-align: baseline; top: -0.5em;\">®</span>.</p><h5 class=\"body-copy-ctn js-body-copy-ctn rte-field \" style=\"box-sizing: inherit; margin-bottom: 0.6781em; font-weight: 700; line-height: 1.4; color: rgb(51, 51, 51); font-size: 16px; clear: both; text-transform: inherit;\">MIKROFON MONO DENGAN NOISE-REDUCING</h5><p class=\"body-copy-ctn js-body-copy-ctn rte-field \" style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px;\">Mikrofon internal dengan noise-reducing memastikan suaramu terdengar jelas hingga dari jarak 1,5 meter, bahkan jika kamu berada dalam lingkungan yang ramai.</p><h5 class=\"body-copy-ctn js-body-copy-ctn rte-field \" style=\"box-sizing: inherit; margin-bottom: 0.6781em; font-weight: 700; line-height: 1.4; color: rgb(51, 51, 51); font-size: 16px; clear: both; text-transform: inherit;\">AUTO-LIGHT CORRECTION</h5><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px;\">Fitur RightLight<span style=\"box-sizing: inherit; position: relative; font-size: 10.5px; line-height: 0; vertical-align: baseline; top: -0.5em;\">TM</span>&nbsp;2 pada C270 menyesuaikan dengan kondisi pencahayaan untuk menghasilkan gambar yang lebih cerah dan kontras sehingga membantumu tampil sebaik mungkin di semua panggilan konferensi.</p><h5 style=\"box-sizing: inherit; margin-bottom: 0.6781em; font-weight: 700; line-height: 1.4; color: rgb(51, 51, 51); font-size: 16px; clear: both; text-transform: inherit;\">OPSI PEMASANGAN YANG KOKOH</h5><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px;\">Universal clip yang dapat disesuaikan memungkinkan Anda memasang kamera dengan kokoh di layar atau laptop, atau lipatlah klip dan letakkan webcam di atas rak. Anda selalu siap untuk panggilan video berikutnya.</p><h4 style=\"box-sizing: inherit; margin-bottom: 0.6781em; font-weight: 700; line-height: 1.4; color: rgb(51, 51, 51); font-size: 20px; clear: both; text-transform: inherit;\">Spesifikasi :</h4><ul class=\"pangea-cmp tech-specs js-pangea-tech-specs\" style=\"margin-bottom: 1.5em; margin-left: 1.5em; padding: 0px; list-style-position: initial; list-style-image: initial;\"><li class=\"specs-column\" style=\"box-sizing: inherit; margin-bottom: 0.6781em;\"><div class=\"specs-group\" style=\"box-sizing: inherit;\"><header class=\"specs-header\" style=\"box-sizing: inherit;\"><h5 class=\"specs-heading\" style=\"box-sizing: inherit; margin-bottom: 0.6781em; font-weight: 700; line-height: 1.4; color: rgb(51, 51, 51); font-size: 16px; clear: both; text-transform: inherit;\">DIMENSI</h5></header><div class=\"specs-block\" style=\"box-sizing: inherit;\"><h6 class=\"specs-title\" style=\"box-sizing: inherit; margin-bottom: 0.6781em; font-weight: 700; line-height: 1.4; color: rgb(51, 51, 51); font-size: 14px; clear: both; text-transform: inherit;\">Dimensi termasuk fixed mounting clip</h6><ul class=\"specs-description-list\" style=\"margin-top: 0.6781em; margin-left: 1.5em; padding: 0px; list-style: disc;\"><li style=\"box-sizing: inherit; margin-bottom: 0.6781em;\">Tinggi: 72,91 mm</li><li style=\"box-sizing: inherit; margin-bottom: 0.6781em;\">Lebar: 31,91 mm</li><li style=\"box-sizing: inherit; margin-bottom: 0.6781em;\">Tebal: 66,64 mm</li><li style=\"box-sizing: inherit; margin-bottom: 0.6781em;\">Panjang kabel: 1,5 m</li><li style=\"box-sizing: inherit; margin-bottom: 0.6781em;\">Berat: 75 g</li></ul></div></div></li><li class=\"specs-column\" style=\"box-sizing: inherit; margin-bottom: 0.6781em;\"><div class=\"specs-group\" style=\"box-sizing: inherit;\"><header class=\"specs-header\" style=\"box-sizing: inherit;\"><h5 class=\"specs-heading\" style=\"box-sizing: inherit; margin-bottom: 0.6781em; font-weight: 700; line-height: 1.4; color: rgb(51, 51, 51); font-size: 16px; clear: both; text-transform: inherit;\">PERSYARATAN SISTEM</h5></header><div class=\"specs-block\" style=\"box-sizing: inherit;\"><h6 class=\"specs-title\" style=\"box-sizing: inherit; margin-bottom: 0.6781em; font-weight: 700; line-height: 1.4; color: rgb(51, 51, 51); font-size: 14px; clear: both; text-transform: inherit;\">Kompatibel dengan</h6><ul class=\"specs-description-list\" style=\"margin-top: 0.6781em; margin-left: 1.5em; padding: 0px; list-style: disc;\"><li style=\"box-sizing: inherit; margin-bottom: 0.6781em;\">Windows® 7 or later</li><li style=\"box-sizing: inherit; margin-bottom: 0.6781em;\">macOS 10.10 or later</li><li style=\"box-sizing: inherit; margin-bottom: 0.6781em;\">Chrome OS™</li><li style=\"box-sizing: inherit; margin-bottom: 0.6781em;\">Port USB-A</li></ul></div><div class=\"specs-block\" style=\"box-sizing: inherit;\"><div class=\"specs-description\" style=\"box-sizing: inherit;\">Kompatibel dengan platform panggilan yang populer.</div><div style=\"box-sizing: inherit;\"></div></div></div></li><li class=\"specs-column\" style=\"box-sizing: inherit; margin-bottom: 0.6781em;\"><div class=\"specs-group\" style=\"box-sizing: inherit;\"><header class=\"specs-header\" style=\"box-sizing: inherit;\"><h5 class=\"specs-heading\" style=\"box-sizing: inherit; margin-bottom: 0.6781em; font-weight: 700; line-height: 1.4; color: rgb(51, 51, 51); font-size: 16px; clear: both; text-transform: inherit;\">SPESIFIKASI TEKNIS</h5></header><div class=\"specs-block\" style=\"box-sizing: inherit;\"><div class=\"specs-description\" style=\"box-sizing: inherit;\">Resolusi Maks.: 720p/30fps</div></div><div class=\"specs-block\" style=\"box-sizing: inherit;\"><div class=\"specs-description\" style=\"box-sizing: inherit;\">Kamera mega pixel: 0.9</div></div><div class=\"specs-block\" style=\"box-sizing: inherit;\"><div class=\"specs-description\" style=\"box-sizing: inherit;\">Jenis fokus: fixed focus</div></div><div class=\"specs-block\" style=\"box-sizing: inherit;\"><div class=\"specs-description\" style=\"box-sizing: inherit;\">Jenis lensa: plastik</div></div><div class=\"specs-block\" style=\"box-sizing: inherit;\"><div class=\"specs-description\" style=\"box-sizing: inherit;\">Mikrofon internal: Mono</div></div><div class=\"specs-block\" style=\"box-sizing: inherit;\"><div class=\"specs-description\" style=\"box-sizing: inherit;\">Jangkauan mikrofon: Maksimal 1 m</div></div><div class=\"specs-block\" style=\"box-sizing: inherit;\"><div class=\"specs-description\" style=\"box-sizing: inherit;\">Bidang pandang diagonal (dFoV): 55°</div></div><div class=\"specs-block\" style=\"box-sizing: inherit;\"><div class=\"specs-description\" style=\"box-sizing: inherit;\">Universal mounting clip cocok dengan berbagai laptop, LCD, atau layar</div></div></div></li></ul><header class=\"specs-header\" style=\"box-sizing: inherit;\"><h5 style=\"box-sizing: inherit; margin-bottom: 0.6781em; font-weight: 700; line-height: 1.4; color: rgb(51, 51, 51); font-size: 16px; clear: both; text-transform: inherit;\">PACKAGE CONTENTS</h5><ul style=\"margin-bottom: 1.5em; margin-left: 1.5em; padding: 0px; list-style-position: initial; list-style-image: initial;\"><li style=\"box-sizing: inherit; margin-bottom: 0.6781em;\">1 webcam dengan kabel USB-A 1,5 m terpasang</li><li style=\"box-sizing: inherit; margin-bottom: 0.6781em;\">Dokumentasi pengguna</li></ul></header><div class=\"specs-group\" style=\"box-sizing: inherit;\"><header class=\"specs-header\" style=\"box-sizing: inherit;\"><h5 style=\"box-sizing: inherit; margin-bottom: 0.6781em; font-weight: 700; line-height: 1.4; color: rgb(51, 51, 51); font-size: 16px; clear: both; text-transform: inherit;\">INFORMASI GARANSI</h5></header><div class=\"specs-block\" style=\"box-sizing: inherit;\"><ul style=\"margin-bottom: 1.5em; margin-left: 1.5em; padding: 0px; list-style-position: initial; list-style-image: initial;\"><li class=\"specs-description\" style=\"box-sizing: inherit; margin-bottom: 0.6781em;\">Garansi Hardware Terbatas 2 Tahun</li></ul></div></div></div></div></div></div></div></section></div>', 29, 23, 6, 5);
INSERT INTO `produk` (`id_produk`, `nama_produk`, `foto_produk`, `harga`, `diskon`, `stok_awal`, `stok_akhir`, `harga_jual`, `detail`, `id_kategori`, `id_merek`, `terjual`, `rating`) VALUES
('PRD013', 'Printer Canon Pixma Ink Tank G3010', 'd6f1eeb5e11a05a8af1e7071e5e8ecee.png', 2500000, 0, 10, 5, 2500000, '<div class=\"js-card-content\" style=\"box-sizing: inherit; color: rgb(85, 85, 85); font-family: Lato, Arial, Helvetica, sans-serif; font-size: 14px;\"><span style=\"box-sizing: inherit; font-weight: 600;\">Botol Tinta dan Hasil Halaman yang Tinggi</span></div><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; font-family: Lato, Arial, Helvetica, sans-serif; font-size: 14px; color: rgb(85, 85, 85);\">Dengan menggunakan botol tinta yang menghasilkan halaman dalam jumlah yang tinggi hingga 7000 halaman, pengguna bisa menikmati pencetakan tanpa cemas mengenai biaya tinta, atau ketika persediaan tinta hampir habis.</p><div class=\"js-card-content\" style=\"box-sizing: inherit; color: rgb(85, 85, 85); font-family: Lato, Arial, Helvetica, sans-serif; font-size: 14px;\"><span style=\"box-sizing: inherit; font-weight: 600;\">Desain Botol Tinta Anti Tumpah</span></div><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; font-family: Lato, Arial, Helvetica, sans-serif; font-size: 14px; color: rgb(85, 85, 85);\">Wadah tinta dilengkapi dengan desain ujung khusus yang mengurangi tumpahan selama pengisian ulang tinta.</p><div class=\"js-card-content\" style=\"box-sizing: inherit; color: rgb(85, 85, 85); font-family: Lato, Arial, Helvetica, sans-serif; font-size: 14px;\"><span style=\"box-sizing: inherit; font-weight: 600;\">Sistem Wadah Tinta Terpadu</span></div><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; font-family: Lato, Arial, Helvetica, sans-serif; font-size: 14px; color: rgb(85, 85, 85);\">Wadah tinta terpadu built-in menciptakan bodi printer yang ringkas. Pengguna juga dapat mudah melihat level tinta yang tersisa dengan sekilas pandang.</p><div class=\"js-card-content\" style=\"box-sizing: inherit; color: rgb(85, 85, 85); font-family: Lato, Arial, Helvetica, sans-serif; font-size: 14px;\"><span style=\"box-sizing: inherit; font-weight: 600;\">Koneksi Nirkabel Langsung Sekali Sentuh</span></div><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; font-family: Lato, Arial, Helvetica, sans-serif; font-size: 14px; color: rgb(85, 85, 85);\">Mudah menghubung ke smartphone Anda.</p><div class=\"js-card-content\" style=\"box-sizing: inherit; color: rgb(85, 85, 85); font-family: Lato, Arial, Helvetica, sans-serif; font-size: 14px;\"><span style=\"box-sizing: inherit; font-weight: 600;\">Mendukung Pencetakan Tanpa Batas Tepi</span></div><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; font-family: Lato, Arial, Helvetica, sans-serif; font-size: 14px; color: rgb(85, 85, 85);\">Mencetak foto tanpa batas tepi hingga ukuran A4</p><div class=\"js-card-content\" style=\"box-sizing: inherit; color: rgb(85, 85, 85); font-family: Lato, Arial, Helvetica, sans-serif; font-size: 14px;\"><span style=\"box-sizing: inherit; font-weight: 600;\">Pesan dalam Aplikasi Cetak</span></div><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; font-family: Lato, Arial, Helvetica, sans-serif; font-size: 14px; color: rgb(85, 85, 85);\">Cara baru untuk mengekspresikan diri dalam foto!. Menanamkan ucapan animasi rahasia, atau tautan video dan web serta mengirimkannya kepada keluarga dan teman Anda. Anda tinggal mengunduh app* (aplikasi) dan menempatkan perangkat di atas foto untuk membuka pesan rahasia [*Hanya tersedia pada iOS]</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; font-family: Lato, Arial, Helvetica, sans-serif; font-size: 14px; color: rgb(85, 85, 85);\"><span style=\"box-sizing: inherit; font-weight: 600;\">Spesifikasi :&nbsp;</span></p><ul class=\"list-normal\" style=\"margin-bottom: 1.5em; margin-left: 1.5em; padding: 0px; list-style-position: initial; list-style-image: initial; color: rgb(85, 85, 85); font-family: Lato, Arial, Helvetica, sans-serif; font-size: 14px;\"><li style=\"box-sizing: inherit; margin-bottom: 0.6781em;\">Cetak, Pindai &amp; Salin</li><li style=\"box-sizing: inherit; margin-bottom: 0.6781em;\">Printer Ink Tank dengan kecepatan cetak sesuai ISO standard (A4): hingga 8,8ipm hitam / 5,0ipm warna</li><li style=\"box-sizing: inherit; margin-bottom: 0.6781em;\">USB 2.0 Kecepatan Tinggi</li><li style=\"box-sizing: inherit; margin-bottom: 0.6781em;\">Volume cetak yang direkomendasikan: 150 – 1500 halaman</li><li style=\"box-sizing: inherit; margin-bottom: 0.6781em;\">Multiple Copy (Salin Multipel) : Hitam / Warna : 1 – 20 halaman</li><li style=\"box-sizing: inherit; margin-bottom: 0.6781em;\">Resolusi Pencetakan Maksimum 4800 (horizontal)*<span style=\"box-sizing: inherit; position: relative; font-size: 10.5px; line-height: 0; vertical-align: baseline; top: -0.5em;\">1</span>&nbsp;x 1200 (vertikal) dpi</li><li style=\"box-sizing: inherit; margin-bottom: 0.6781em;\">Botol Tinta GI-790 (Black, Cyan, Magenta, Yellow)</li><li style=\"box-sizing: inherit; margin-bottom: 0.6781em;\">Daya AC 100 – 240V; 50 / 60Hz</li><li style=\"box-sizing: inherit; margin-bottom: 0.6781em;\">Koneksi Langsung (LAN Nirkabel) : Tersedia (hanya AP Mode)</li></ul>', 30, 25, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `produk_masuk`
--

CREATE TABLE `produk_masuk` (
  `id_masuk` int NOT NULL,
  `id_produk` varchar(11) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `jumlah` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk_masuk`
--

INSERT INTO `produk_masuk` (`id_masuk`, `id_produk`, `tgl_masuk`, `jumlah`) VALUES
(44, 'PRD001', '2024-06-28 03:21:05', 125),
(45, 'PRD002', '2024-06-28 03:21:16', 90),
(46, 'PRD003', '2024-06-28 03:21:26', 50),
(48, 'PRD004', '2024-06-28 03:22:03', 65),
(49, 'PRD005', '2024-06-28 03:22:23', 100),
(50, 'PRD006', '2024-06-28 03:22:55', 70),
(51, 'PRD007', '2024-06-28 03:23:14', 140),
(52, 'PRD008', '2024-06-28 03:23:31', 50),
(53, 'PRD009', '2024-06-28 03:23:44', 50),
(54, 'PRD010', '2024-06-28 03:23:54', 75),
(55, 'PRD011', '2024-06-28 03:24:05', 25),
(56, 'PRD012', '2024-06-28 03:24:15', 20),
(57, 'PRD013', '2024-06-28 03:24:24', 10);

--
-- Triggers `produk_masuk`
--
DELIMITER $$
CREATE TRIGGER `del_akhir_stok` AFTER DELETE ON `produk_masuk` FOR EACH ROW UPDATE produk SET stok_akhir = stok_akhir - old.jumlah
where id_produk = old.id_produk
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `del_awal_stok` AFTER DELETE ON `produk_masuk` FOR EACH ROW UPDATE produk SET stok_awal = stok_awal - old.jumlah
where id_produk = old.id_produk
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stok_akhir_masuk` AFTER INSERT ON `produk_masuk` FOR EACH ROW UPDATE produk SET stok_akhir = stok_akhir + new.jumlah
WHERE id_produk = new.id_produk
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stok_awal_masuk` AFTER INSERT ON `produk_masuk` FOR EACH ROW UPDATE produk SET stok_awal = stok_awal + new.jumlah
WHERE id_produk = new.id_produk
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_review` int NOT NULL,
  `id_produk` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `id_pelanggan` int NOT NULL,
  `nilai` float NOT NULL,
  `testimoni` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id_review`, `id_produk`, `id_pelanggan`, `nilai`, `testimoni`) VALUES
(37, 'PRD002', 10, 5, 'Bagus Sekali'),
(38, 'PRD001', 10, 5, 'Bagus Sekali'),
(39, 'PRD011', 10, 5, 'Bagus Sekali'),
(40, 'PRD010', 10, 5, 'Bagus Sekali'),
(41, 'PRD006', 10, 5, 'Bagus Sekali'),
(42, 'PRD007', 10, 5, 'Bagus Sekali'),
(43, 'PRD005', 10, 5, ''),
(44, 'PRD003', 10, 5, 'Bagus Sekali'),
(45, 'PRD009', 10, 5, 'Bagus Sekali'),
(46, 'PRD008', 10, 0, 'Bagus Sekali'),
(47, 'PRD004', 10, 5, 'Bagus Sekali'),
(48, 'PRD002', 10, 5, ''),
(49, 'PRD011', 16, 5, 'Bagus Sekali'),
(50, 'PRD010', 16, 5, 'Bagus Sekali'),
(51, 'PRD009', 16, 5, 'Bagus Sekali'),
(52, 'PRD008', 16, 5, 'Bagus Sekali'),
(53, 'PRD007', 16, 5, 'Bagus Sekali'),
(54, 'PRD006', 16, 5, 'Bagus Sekali'),
(55, 'PRD005', 16, 5, 'Bagus Sekali'),
(56, 'PRD001', 16, 5, 'Bagus Sekali'),
(57, 'PRD001', 11, 5, 'Bagus Sekali'),
(58, 'PRD002', 11, 5, 'Bagus Sekali'),
(59, 'PRD003', 11, 5, 'Bagus Sekali'),
(60, 'PRD004', 11, 5, 'Bagus Sekali'),
(61, 'PRD005', 11, 5, 'Bagus Sekali'),
(62, 'PRD006', 11, 5, 'Bagus Sekali'),
(63, 'PRD007', 11, 5, 'Bagus Sekali'),
(64, 'PRD008', 11, 5, 'Bagus Sekali'),
(65, 'PRD009', 11, 5, 'Bagus Sekali'),
(66, 'PRD010', 11, 5, 'Bagus Sekali'),
(67, 'PRD001', 13, 5, 'Bagus Sekali'),
(68, 'PRD002', 13, 5, 'Bagus Sekali'),
(69, 'PRD003', 13, 5, 'Bagus Sekali'),
(70, 'PRD004', 13, 5, 'Bagus Sekali'),
(71, 'PRD005', 13, 5, 'Bagus Sekali'),
(72, 'PRD006', 13, 5, 'Bagus Sekali'),
(73, 'PRD007', 13, 5, 'Bagus Sekali'),
(74, 'PRD008', 13, 5, 'Bagus Sekali'),
(75, 'PRD009', 13, 5, 'Bagus Sekali'),
(76, 'PRD003', 13, 5, 'Bagus Sekali'),
(77, 'PRD010', 13, 5, 'Bagus Sekali'),
(78, 'PRD001', 14, 5, 'Bagus Sekali'),
(79, 'PRD001', 14, 5, 'Bagus Sekali'),
(80, 'PRD002', 14, 5, 'Bagus Sekali'),
(81, 'PRD004', 14, 5, 'Bagus Sekali'),
(82, 'PRD005', 14, 5, 'Bagus Sekali'),
(83, 'PRD006', 14, 5, 'Bagus Sekali'),
(84, 'PRD007', 14, 5, 'Bagus Sekali'),
(85, 'PRD008', 14, 5, 'Bagus Sekali'),
(86, 'PRD009', 14, 5, 'Bagus Sekali'),
(87, 'PRD010', 14, 5, 'Bagus Sekali'),
(88, 'PRD011', 14, 0, 'Bagus Sekali'),
(89, 'PRD001', 12, 5, 'Bagus Sekali'),
(90, 'PRD002', 12, 5, 'Bagus Sekali'),
(91, 'PRD003', 12, 5, 'Bagus Sekali'),
(92, 'PRD004', 12, 5, 'Bagus Sekali'),
(93, 'PRD005', 12, 5, 'Bagus Sekali'),
(94, 'PRD006', 12, 5, 'Bagus Sekali'),
(95, 'PRD007', 12, 5, 'Bagus Sekali'),
(96, 'PRD008', 12, 5, 'Bagus Sekali'),
(97, 'PRD009', 12, 5, 'Bagus Sekali'),
(98, 'PRD010', 12, 5, 'Bagus Sekali'),
(99, 'PRD011', 12, 5, 'Bagus Sekali'),
(100, 'PRD012', 12, 5, 'Bagus Sekali'),
(101, 'PRD012', 15, 5, 'Bagus Sekali'),
(102, 'PRD011', 15, 5, 'Bagus Sekali'),
(103, 'PRD010', 15, 5, 'Bagus Sekali'),
(104, 'PRD009', 15, 5, 'Bagus Sekali'),
(105, 'PRD001', 15, 5, 'Bagus Sekali'),
(106, 'PRD002', 15, 5, 'Bagus Sekali'),
(107, 'PRD003', 15, 5, 'Bagus Sekali'),
(108, 'PRD004', 15, 5, 'Bagus Sekali'),
(109, 'PRD005', 15, 5, 'Bagus Sekali'),
(110, 'PRD006', 15, 5, 'Bagus Sekali'),
(111, 'PRD007', 15, 5, 'Bagus Sekali');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id_slider` int NOT NULL,
  `judul` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gambar_slider` text COLLATE utf8mb4_general_ci,
  `keterangan` text COLLATE utf8mb4_general_ci,
  `status` varchar(20) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id_slider`, `judul`, `gambar_slider`, `keterangan`, `status`) VALUES
(18, 'Alvindo Computa', '0444ec310466c9282ac265873f90251e.png', 'Menyediakan berbagai macam kebutuhan yang menunjang produktifitas anda', 'yes'),
(19, 'Diskon Besar-besaran!!!!', '88bd704ab60fecdecbac3a3a57e04ff4.png', 'Ayo belanja kebutuhan anda dan nikmati potongan harga sampai 70%', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_toko`
--

CREATE TABLE `transaksi_toko` (
  `id_transaksi` int NOT NULL,
  `id_akun` int NOT NULL,
  `total` double NOT NULL,
  `bayar` double NOT NULL,
  `kembali` double NOT NULL,
  `tanggal_order` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `akun_pelanggan`
--
ALTER TABLE `akun_pelanggan`
  ADD PRIMARY KEY (`id_akun_pelanggan`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `alamat_pelanggan`
--
ALTER TABLE `alamat_pelanggan`
  ADD PRIMARY KEY (`id_alamat_pelanggan`);

--
-- Indexes for table `centroid`
--
ALTER TABLE `centroid`
  ADD PRIMARY KEY (`id_cluster`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_chat`);

--
-- Indexes for table `chatroom`
--
ALTER TABLE `chatroom`
  ADD PRIMARY KEY (`id_chat_room`);

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `detail_transaksi_toko`
--
ALTER TABLE `detail_transaksi_toko`
  ADD PRIMARY KEY (`id_detail_transaksi_toko`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id_faq`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `level_akun`
--
ALTER TABLE `level_akun`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `merek`
--
ALTER TABLE `merek`
  ADD PRIMARY KEY (`id_merek`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `id_akun_pelanggan` (`id_akun_pelanggan`);

--
-- Indexes for table `pembatalan`
--
ALTER TABLE `pembatalan`
  ADD PRIMARY KEY (`id_pembatalan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_alamat_pelanggan` (`id_alamat_pelanggan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_merek` (`id_merek`);

--
-- Indexes for table `produk_masuk`
--
ALTER TABLE `produk_masuk`
  ADD PRIMARY KEY (`id_masuk`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `transaksi_toko`
--
ALTER TABLE `transaksi_toko`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `akun_pelanggan`
--
ALTER TABLE `akun_pelanggan`
  MODIFY `id_akun_pelanggan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `alamat_pelanggan`
--
ALTER TABLE `alamat_pelanggan`
  MODIFY `id_alamat_pelanggan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `centroid`
--
ALTER TABLE `centroid`
  MODIFY `id_cluster` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id_chat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `chatroom`
--
ALTER TABLE `chatroom`
  MODIFY `id_chat_room` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id_detail` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `detail_transaksi_toko`
--
ALTER TABLE `detail_transaksi_toko`
  MODIFY `id_detail_transaksi_toko` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id_faq` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `level_akun`
--
ALTER TABLE `level_akun`
  MODIFY `id_level` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `merek`
--
ALTER TABLE `merek`
  MODIFY `id_merek` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pembatalan`
--
ALTER TABLE `pembatalan`
  MODIFY `id_pembatalan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id_pengiriman` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `produk_masuk`
--
ALTER TABLE `produk_masuk`
  MODIFY `id_masuk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `transaksi_toko`
--
ALTER TABLE `transaksi_toko`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akun`
--
ALTER TABLE `akun`
  ADD CONSTRAINT `akun_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level_akun` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`id_akun_pelanggan`) REFERENCES `akun_pelanggan` (`id_akun_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `produk_ibfk_2` FOREIGN KEY (`id_merek`) REFERENCES `merek` (`id_merek`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
