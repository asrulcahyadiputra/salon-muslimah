-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Waktu pembuatan: 27 Jul 2022 pada 02.38
-- Versi server: 5.7.32
-- Versi PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `pa_camel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absenkaryawan`
--

CREATE TABLE `absenkaryawan` (
  `id` int(11) NOT NULL,
  `idKaryawan` varchar(500) NOT NULL,
  `hadir` varchar(255) DEFAULT NULL,
  `absen` varchar(255) DEFAULT NULL,
  `izin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absenkaryawan`
--

INSERT INTO `absenkaryawan` (`id`, `idKaryawan`, `hadir`, `absen`, `izin`) VALUES
(1, 'K001', NULL, NULL, NULL),
(2, 'K001', '1', NULL, NULL),
(3, 'K002', NULL, NULL, NULL),
(4, 'K002', NULL, NULL, '1'),
(5, 'K001', '1', NULL, NULL),
(6, 'K002', '1', NULL, NULL),
(7, 'K001', '1', NULL, NULL),
(8, 'K002', NULL, NULL, '1'),
(9, 'K001', '1', NULL, NULL),
(10, 'K002', '1', NULL, NULL),
(11, 'K003', NULL, NULL, NULL),
(12, 'K003', '1', NULL, NULL),
(13, 'K004', NULL, NULL, NULL),
(14, 'K005', NULL, NULL, NULL),
(15, 'K006', NULL, NULL, NULL),
(16, 'K001', '1', NULL, NULL),
(17, 'K002', '1', NULL, NULL),
(18, 'K007', NULL, NULL, NULL),
(19, 'K008', NULL, NULL, NULL),
(20, 'K001', '1', NULL, NULL),
(21, 'K002', '1', NULL, NULL),
(22, 'K003', '1', NULL, NULL),
(23, 'K004', NULL, '1', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `total` int(11) DEFAULT NULL,
  `namaAkun` varchar(255) NOT NULL,
  `kodeAkun` varchar(500) NOT NULL,
  `header` varchar(500) NOT NULL,
  `posisi_d_c` varchar(255) DEFAULT NULL,
  `saldo_awal` int(11) NOT NULL DEFAULT '0',
  `is_laba_rugi` int(11) NOT NULL DEFAULT '0',
  `is_arus_kas` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `total`, `namaAkun`, `kodeAkun`, `header`, `posisi_d_c`, `saldo_awal`, `is_laba_rugi`, `is_arus_kas`) VALUES
(1, NULL, 'Kas', '111', '1', 'd', 0, 0, 0),
(2, NULL, 'Perlengkapan', '113', '1', 'd', 0, 0, 0),
(3, NULL, 'Pembelian', '500', '5', 'd', 0, 0, 2),
(4, NULL, 'Beban Gaji', '520', '5', 'd', 0, 1, 1),
(5, NULL, 'Pendapatan Jasa', '411', '4', 'k', 0, 1, 1),
(6, NULL, 'Peralatan', '122', '1', 'd', 0, 0, 0),
(7, NULL, 'Beban Listrik', '515', '5', 'd', 0, 1, 1),
(8, NULL, 'Beban Air', '516', '5', 'd', 0, 1, 1),
(9, NULL, 'Beban Sewa', '517', '5', 'd', 0, 1, 1),
(10, NULL, 'Penjualan', '400', '4', 'k', 0, 1, 1),
(11, NULL, 'Pembelian Peralatan', '499', '4', 'd', 0, 0, 0),
(12, NULL, 'Modal', '300', '3', 'k', 0, 0, 3),
(13, NULL, 'Prive', '312', '3', 'd', 0, 0, 3),
(14, NULL, 'Utang Usaha', '211', '2', 'k', 0, 0, 0),
(15, NULL, 'Akumulasi Penyusutan Peralatan', '123', '1', 'k', 0, 0, 0),
(16, NULL, 'Utang Bank', '221', '2', 'k', 0, 0, 0),
(17, NULL, 'Beban  Administrasi', '518', '5', NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'pemilik', 'akses pemasukkan, pengeluaran dan absen'),
(2, 'admin', 'akses penerimaan, pengeluaran, absen dan laporan'),
(3, 'admin2', 'service&product\r\n'),
(4, 'customer', 'Booking Service');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 3),
(2, 5),
(3, 6),
(4, 7),
(4, 9),
(4, 10),
(4, 11),
(4, 12),
(4, 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(0, '::1', 'admin', NULL, '2022-06-25 21:00:42', 0),
(1, '::1', 'danalvr', NULL, '2021-10-13 05:01:55', 0),
(2, '::1', 'danalvr', NULL, '2021-10-13 05:33:59', 0),
(3, '::1', 'danielkisaran@gmail.com', 3, '2021-10-13 23:05:07', 1),
(4, '::1', 'danielkisaran@gmail.com', 3, '2021-10-14 00:06:40', 1),
(5, '::1', 'danielkisaran@gmail.com', 3, '2021-10-14 00:06:52', 1),
(6, '::1', 'sssss', NULL, '2021-10-14 00:24:38', 0),
(7, '::1', 'danielkisaran@gmail.com', 3, '2021-10-14 00:27:56', 1),
(8, '::1', 'danielkisaran@gmail.com', 3, '2021-10-14 00:46:55', 1),
(9, '::1', 'danalvr_', NULL, '2021-10-14 00:48:56', 0),
(10, '::1', 'danalvr_', NULL, '2021-10-14 00:50:12', 0),
(11, '::1', 'vshvhs', NULL, '2021-10-14 00:54:14', 0),
(12, '::1', 'dvhvdh', NULL, '2021-10-14 00:55:11', 0),
(13, '::1', 'jbvj', NULL, '2021-10-14 00:55:56', 0),
(14, '::1', ' vhhvhv', NULL, '2021-10-14 00:56:21', 0),
(15, '::1', 'hvhcc', NULL, '2021-10-14 00:56:37', 0),
(16, '::1', 'danielkisaran@gmail.com', 3, '2021-10-14 00:58:15', 1),
(17, '::1', 'danielkisaran@gmail.com', 3, '2021-10-14 00:59:44', 1),
(18, '::1', 'danalvr', NULL, '2021-10-14 01:01:23', 0),
(19, '::1', 'danielkisaran@gmail.com', 3, '2021-10-14 01:02:30', 1),
(20, '::1', 'danielkisaran@gmail.com', 3, '2021-10-14 01:03:18', 1),
(21, '::1', 'danalvr_', NULL, '2021-10-14 02:22:04', 0),
(22, '::1', 'danielkisaran@gmail.com', 3, '2021-10-14 02:22:18', 1),
(23, '::1', 'danielkisaran@gmail.com', 3, '2021-10-14 02:22:48', 1),
(24, '::1', 'danielkisaran@gmail.com', 3, '2021-10-14 02:26:36', 1),
(25, '::1', 'danielkisaran@gmail.com', 3, '2021-10-14 08:44:00', 1),
(26, '::1', 'danielkisaran@gmail.com', 3, '2021-10-14 09:44:12', 1),
(27, '::1', 'danielkisaran@gmail.com', 3, '2021-10-14 10:34:30', 1),
(28, '::1', 'danalvr', NULL, '2021-10-14 10:45:14', 0),
(29, '::1', 'danalvr_', NULL, '2021-10-14 10:45:30', 0),
(30, '::1', 'danielkisaran@gmail.com', 3, '2021-10-14 10:45:47', 1),
(31, '::1', 'vhcgc', NULL, '2021-10-14 10:45:57', 0),
(32, '::1', 'danalvr', NULL, '2021-10-14 10:46:06', 0),
(33, '::1', 'danielkisaran@gmail.com', 3, '2021-10-14 10:47:27', 1),
(34, '::1', 'danielkisaran@gmail.com', 3, '2021-10-14 12:57:40', 1),
(35, '::1', 'danielkisaran@gmail.com', 3, '2021-10-14 13:47:04', 1),
(36, '::1', 'gthhtddc', NULL, '2021-10-15 03:13:08', 0),
(37, '::1', 'danalvr', NULL, '2021-10-15 03:13:26', 0),
(38, '::1', 'danielkisaran@gmail.com', 3, '2021-10-15 03:13:52', 1),
(39, '::1', 'danielkisaran@gmail.com', 3, '2021-10-27 14:06:06', 1),
(40, '::1', 'danielkisaran@gmail.com', 3, '2021-10-31 03:24:45', 1),
(41, '::1', 'danielkisaran@gmail.com', 3, '2021-11-01 02:15:16', 1),
(42, '::1', 'richard', NULL, '2021-11-01 03:37:31', 0),
(43, '::1', 'richard', NULL, '2021-11-01 03:37:51', 0),
(44, '::1', 'richard', NULL, '2021-11-01 03:42:12', 0),
(45, '::1', 'richard', NULL, '2021-11-01 03:42:56', 0),
(46, '::1', 'richard', NULL, '2021-11-01 03:43:18', 0),
(47, '::1', 'danielkisaran@gmail.com', 3, '2021-11-01 03:43:28', 1),
(48, '::1', 'groot', 5, '2021-11-01 03:53:48', 0),
(49, '::1', 'groothey345@gmail.com', 5, '2021-11-01 03:54:51', 1),
(50, '::1', 'groot', NULL, '2021-11-01 03:55:13', 0),
(51, '::1', 'danielkisaran@gmail.com', 3, '2021-11-01 04:08:14', 1),
(52, '::1', 'groothey345@gmail.com', 5, '2021-11-01 04:12:49', 1),
(53, '::1', 'danielkisaran@gmail.com', 3, '2021-11-01 04:35:46', 1),
(54, '::1', 'danielkisaran@gmail.com', 3, '2021-11-01 04:36:33', 1),
(55, '::1', 'groothey345@gmail.com', 5, '2021-11-01 05:34:05', 1),
(56, '::1', 'danielkisaran@gmail.com', 3, '2021-11-01 05:40:03', 1),
(57, '::1', 'danielkisaran@gmail.com', 3, '2021-11-01 05:44:34', 1),
(58, '::1', 'groothey345@gmail.com', 5, '2021-11-01 05:45:15', 1),
(59, '::1', 'danielkisaran@gmail.com', 3, '2021-11-01 12:22:39', 1),
(60, '::1', 'groothey345@gmail.com', 5, '2021-11-01 12:25:44', 1),
(61, '::1', 'danielkisaran@gmail.com', 3, '2021-11-01 13:39:00', 1),
(62, '::1', 'groothey345@gmail.com', 5, '2021-11-01 13:48:13', 1),
(63, '::1', 'danielkisaran@gmail.com', 3, '2021-11-01 13:49:01', 1),
(64, '::1', 'danielkisaran@gmail.com', 3, '2021-11-01 14:45:49', 1),
(65, '::1', 'dd', NULL, '2021-11-01 15:33:05', 0),
(66, '::1', 'ddd', NULL, '2021-11-01 15:36:01', 0),
(67, '::1', 'danielkisaran@gmail.com', 3, '2021-11-01 15:46:47', 1),
(68, '::1', 'danielkisaran@gmail.com', 3, '2021-11-01 15:47:26', 1),
(69, '::1', 'danielkisaran@gmail.com', 3, '2021-11-01 15:51:06', 1),
(70, '::1', 'groothey345@gmail.com', 5, '2021-11-01 16:09:15', 1),
(71, '::1', 'danielkisaran@gmail.com', 3, '2021-11-01 16:10:19', 1),
(72, '::1', 'danielkisaran@gmail.com', 3, '2021-11-02 01:05:17', 1),
(73, '::1', 'danalvr', NULL, '2021-11-02 11:12:42', 0),
(74, '::1', 'danielkisaran@gmail.com', 3, '2021-11-02 11:12:49', 1),
(75, '::1', 'danielkisaran@gmail.com', 3, '2021-11-02 11:39:44', 1),
(76, '::1', 'danielkisaran@gmail.com', 3, '2021-11-03 01:41:52', 1),
(77, '::1', 'danalvr', NULL, '2021-11-03 10:10:34', 0),
(78, '::1', 'danielkisaran@gmail.com', 3, '2021-11-03 10:10:47', 1),
(79, '::1', 'danielkisaran@gmail.com', 3, '2021-11-04 05:24:47', 1),
(80, '::1', 'danielkisaran@gmail.com', 3, '2021-11-04 23:15:48', 1),
(81, '::1', 'danielkisaran@gmail.com', 3, '2021-11-05 04:56:55', 1),
(82, '::1', 'danielkisaran@gmail.com', 3, '2021-11-05 04:56:56', 1),
(83, '::1', 'danielkisaran@gmail.com', 3, '2021-11-05 09:42:12', 1),
(84, '::1', 'danielkisaran@gmail.com', 3, '2021-11-06 02:36:26', 1),
(85, '::1', 'danielkisaran@gmail.com', 3, '2021-11-06 10:19:55', 1),
(86, '::1', 'danielkisaran@gmail.com', 3, '2021-11-06 12:20:54', 1),
(87, '::1', 'danielkisaran@gmail.com', 3, '2021-11-06 23:40:28', 1),
(88, '::1', 'danielkisaran@gmail.com', 3, '2021-11-07 03:05:20', 1),
(89, '::1', 'danielkisaran@gmail.com', 3, '2021-11-08 00:08:30', 1),
(90, '::1', 'danielkisaran@gmail.com', 3, '2021-11-08 08:41:12', 1),
(91, '::1', 'danielkisaran@gmail.com', 3, '2021-11-08 21:45:46', 1),
(92, '::1', 'danielkisaran@gmail.com', 3, '2021-11-10 03:22:58', 1),
(93, '::1', 'danielkisaran@gmail.com', 3, '2021-11-12 01:32:33', 1),
(94, '::1', 'danielkisaran@gmail.com', 3, '2021-11-12 08:39:04', 1),
(95, '::1', 'danielkisaran@gmail.com', 3, '2021-11-12 13:40:21', 1),
(96, '::1', 'danielkisaran@gmail.com', 3, '2021-11-13 02:18:10', 1),
(97, '::1', 'danielkisaran@gmail.com', 3, '2021-11-13 03:44:44', 1),
(98, '::1', 'danielkisaran@gmail.com', 3, '2021-11-14 22:49:32', 1),
(99, '::1', 'danielkisaran@gmail.com', 3, '2021-11-15 01:36:49', 1),
(100, '::1', 'danielkisaran@gmail.com', 3, '2021-11-15 02:07:36', 1),
(101, '::1', 'groothey345@gmail.com', 5, '2021-11-15 02:09:14', 1),
(102, '::1', 'danielkisaran@gmail.com', 3, '2021-11-15 02:09:57', 1),
(103, '::1', 'danielkisaran@gmail.com', 3, '2021-11-15 10:00:23', 1),
(104, '::1', 'danielkisaran@gmail.com', 3, '2021-11-23 11:53:13', 1),
(105, '::1', 'danielkisaran@gmail.com', 3, '2021-11-26 08:49:03', 1),
(106, '::1', 'danielkisaran@gmail.com', 3, '2021-11-26 09:12:29', 1),
(107, '::1', 'danalvr', NULL, '2021-11-26 11:59:54', 0),
(108, '::1', 'danielkisaran@gmail.com', 3, '2021-11-26 12:00:02', 1),
(109, '::1', 'danielkisaran@gmail.com', 3, '2021-11-27 03:05:05', 1),
(110, '::1', 'danielkisaran@gmail.com', 3, '2021-11-27 11:09:06', 1),
(111, '::1', 'danielkisaran@gmail.com', 3, '2021-11-29 01:56:12', 1),
(112, '::1', 'danielkisaran@gmail.com', 3, '2021-12-02 04:34:51', 1),
(113, '::1', 'danielkisaran@gmail.com', 3, '2021-12-02 13:14:18', 1),
(114, '::1', 'danielkisaran@gmail.com', 3, '2021-12-03 04:18:22', 1),
(115, '::1', 'danielkisaran@gmail.com', 3, '2021-12-03 21:39:57', 1),
(116, '::1', 'danielkisaran@gmail.com', 3, '2021-12-04 08:42:50', 1),
(117, '::1', 'danielkisaran@gmail.com', 3, '2021-12-05 11:18:40', 1),
(118, '::1', 'danielkisaran@gmail.com', 3, '2021-12-05 21:58:19', 1),
(119, '::1', 'danielkisaran@gmail.com', 3, '2021-12-06 00:16:00', 1),
(120, '::1', 'danielkisaran@gmail.com', 3, '2021-12-06 07:17:11', 1),
(121, '::1', 'danielkisaran@gmail.com', 3, '2021-12-06 07:17:20', 1),
(122, '::1', 'danielkisaran@gmail.com', 3, '2021-12-06 09:55:10', 1),
(123, '::1', 'rudi', NULL, '2021-12-06 09:55:30', 0),
(124, '::1', 'rudi', NULL, '2021-12-06 09:55:44', 0),
(125, '::1', 'rudi', NULL, '2021-12-06 09:56:27', 0),
(126, '::1', 'rudi', NULL, '2021-12-06 09:56:37', 0),
(127, '::1', 'rudi', NULL, '2021-12-06 09:58:04', 0),
(128, '::1', 'danielkisaran@gmail.com', 3, '2021-12-06 10:00:10', 1),
(129, '::1', 'rudi', NULL, '2021-12-06 10:02:34', 0),
(130, '::1', 'rudi', NULL, '2021-12-06 10:02:48', 0),
(131, '::1', 'danielkisaran@gmail.com', 3, '2021-12-06 10:12:05', 1),
(132, '::1', 'rudi', NULL, '2021-12-06 10:16:01', 0),
(133, '::1', 'danielkisaran@gmail.com', 3, '2021-12-06 10:16:43', 1),
(134, '::1', 'rudi', NULL, '2021-12-06 11:21:33', 0),
(135, '::1', 'rudi', NULL, '2021-12-06 11:21:50', 0),
(136, '::1', 'rudi', NULL, '2021-12-06 11:22:09', 0),
(137, '::1', 'rudi', NULL, '2021-12-06 11:22:25', 0),
(138, '::1', 'rudi', NULL, '2021-12-06 11:22:46', 0),
(139, '::1', 'rudi', NULL, '2021-12-06 11:23:06', 0),
(140, '::1', 'rudi', NULL, '2021-12-06 11:23:54', 0),
(141, '::1', 'rudi', NULL, '2021-12-06 11:24:10', 0),
(142, '::1', 'rudi', NULL, '2021-12-06 11:25:46', 0),
(143, '::1', 'rudi', NULL, '2021-12-06 11:26:52', 0),
(144, '::1', 'rudi', NULL, '2021-12-06 11:27:01', 0),
(145, '::1', 'rudi', NULL, '2021-12-06 11:27:16', 0),
(146, '::1', 'rudi', NULL, '2021-12-06 11:27:25', 0),
(147, '::1', 'rudi', NULL, '2021-12-06 11:27:37', 0),
(148, '::1', 'rudi', NULL, '2021-12-06 11:28:03', 0),
(149, '::1', 'rudi', NULL, '2021-12-06 11:28:18', 0),
(150, '::1', 'rudi', NULL, '2021-12-06 11:28:32', 0),
(151, '::1', 'rudi', NULL, '2021-12-06 11:28:45', 0),
(152, '::1', 'rudi', NULL, '2021-12-06 11:28:52', 0),
(153, '::1', 'rudi', NULL, '2021-12-06 11:29:17', 0),
(154, '::1', 'rudi', NULL, '2021-12-06 11:30:08', 0),
(155, '::1', 'rudi', NULL, '2021-12-06 11:30:34', 0),
(156, '::1', 'rudi', NULL, '2021-12-06 11:30:49', 0),
(157, '::1', 'rudi', NULL, '2021-12-06 11:31:05', 0),
(158, '::1', 'rudi', NULL, '2021-12-06 11:31:14', 0),
(159, '::1', 'rudi', NULL, '2021-12-06 11:31:32', 0),
(160, '::1', 'rudi', NULL, '2021-12-06 11:31:53', 0),
(161, '::1', 'rudi', NULL, '2021-12-06 11:32:06', 0),
(162, '::1', 'rudi', NULL, '2021-12-06 11:32:21', 0),
(163, '::1', 'rudi', NULL, '2021-12-06 11:32:56', 0),
(164, '::1', 'rudi', NULL, '2021-12-06 11:33:12', 0),
(165, '::1', 'rudi', NULL, '2021-12-06 11:33:44', 0),
(166, '::1', 'rudi', NULL, '2021-12-06 11:35:30', 0),
(167, '::1', 'rudi', NULL, '2021-12-06 11:36:07', 0),
(168, '::1', 'rudi', NULL, '2021-12-06 11:36:24', 0),
(169, '::1', 'rudi', NULL, '2021-12-06 11:38:42', 0),
(170, '::1', 'rudi', NULL, '2021-12-06 11:38:53', 0),
(171, '::1', 'rudi', NULL, '2021-12-06 11:39:05', 0),
(172, '::1', 'rudi', NULL, '2021-12-06 11:39:29', 0),
(173, '::1', 'rudi', NULL, '2021-12-06 11:39:42', 0),
(174, '::1', 'rudi', NULL, '2021-12-06 11:40:02', 0),
(175, '::1', 'rudi', NULL, '2021-12-06 11:40:20', 0),
(176, '::1', 'rudi', NULL, '2021-12-06 11:40:35', 0),
(177, '::1', 'rudi', NULL, '2021-12-06 11:41:01', 0),
(178, '::1', 'rudi', NULL, '2021-12-06 11:41:15', 0),
(179, '::1', 'rudi', NULL, '2021-12-06 11:42:13', 0),
(180, '::1', 'rudi', NULL, '2021-12-06 11:42:25', 0),
(181, '::1', 'groothey345@gmail.com', 5, '2021-12-06 11:42:36', 1),
(182, '::1', 'rudi', NULL, '2021-12-06 11:43:15', 0),
(183, '::1', 'groothey345@gmail.com', 5, '2021-12-06 11:43:23', 1),
(184, '::1', 'rudi', NULL, '2021-12-09 03:06:40', 0),
(185, '::1', 'groothey345@gmail.com', 5, '2021-12-09 03:07:14', 1),
(186, '::1', 'danalvr', NULL, '2021-12-09 03:07:45', 0),
(187, '::1', 'danalvr', NULL, '2021-12-09 03:07:54', 0),
(188, '::1', 'danielkisaran@gmail.com', 3, '2021-12-09 03:08:10', 1),
(189, '::1', 'danielkisaran@gmail.com', 3, '2021-12-09 10:05:02', 1),
(190, '::1', 'rudi', NULL, '2021-12-09 11:51:50', 0),
(191, '::1', 'groothey345@gmail.com', 5, '2021-12-09 11:52:18', 1),
(192, '::1', 'danielkisaran@gmail.com', 3, '2021-12-09 11:58:59', 1),
(193, '::1', 'groothey345@gmail.com', 5, '2021-12-09 12:03:59', 1),
(194, '::1', 'groothey345@gmail.com', 5, '2021-12-09 12:05:11', 1),
(195, '::1', 'danielkisaran@gmail.com', 3, '2021-12-09 12:05:54', 1),
(196, '::1', 'groothey345@gmail.com', 5, '2021-12-09 12:06:25', 1),
(197, '::1', 'danielkisaran@gmail.com', 3, '2021-12-09 12:08:15', 1),
(198, '::1', 'danielkisaran@gmail.com', 3, '2021-12-09 12:18:09', 1),
(199, '::1', 'danielkisaran@gmail.com', 3, '2021-12-09 12:19:25', 1),
(200, '::1', 'groothey345@gmail.com', 5, '2021-12-09 12:20:53', 1),
(201, '::1', 'camelia', NULL, '2021-12-09 14:54:03', 0),
(202, '::1', 'danielkisaran@gmail.com', 3, '2021-12-09 14:54:16', 1),
(203, '::1', 'danielkisaran@gmail.com', 6, '2021-12-09 15:03:56', 1),
(204, '::1', 'daniel@gmail.com', 3, '2021-12-09 15:33:32', 1),
(205, '::1', 'camelia@gmail.com', 5, '2021-12-09 15:34:07', 1),
(206, '::1', 'fieska', NULL, '2021-12-09 15:35:08', 0),
(207, '::1', 'fieska', NULL, '2021-12-09 15:35:31', 0),
(208, '::1', 'fieska', NULL, '2021-12-09 15:35:42', 0),
(209, '::1', 'vieska@gmail.com', 6, '2021-12-09 15:35:52', 1),
(210, '::1', 'daniel@gmail.com', 3, '2021-12-09 15:42:39', 1),
(211, '::1', 'vieska@gmail.com', 6, '2021-12-09 15:42:56', 1),
(212, '::1', 'camelia@gmail.com', 5, '2021-12-09 16:00:06', 1),
(213, '::1', 'daniel@gmail.com', 3, '2021-12-09 16:19:29', 1),
(214, '::1', 'camelia@gmail.com', 5, '2021-12-09 22:17:38', 1),
(215, '::1', 'daniel@gmail.com', 3, '2021-12-11 01:18:27', 1),
(216, '::1', 'danalvr', NULL, '2021-12-11 03:10:49', 0),
(217, '::1', 'daniel@gmail.com', 3, '2021-12-11 03:10:57', 1),
(218, '::1', 'camelia@gmail.com', 5, '2021-12-11 03:16:26', 1),
(219, '::1', 'fieska', NULL, '2021-12-11 03:17:43', 0),
(220, '::1', 'vieska@gmail.com', 6, '2021-12-11 03:17:54', 1),
(221, '::1', 'daniel@gmail.com', 3, '2021-12-14 04:46:53', 1),
(222, '::1', 'daniel@gmail.com', 3, '2021-12-14 14:41:53', 1),
(223, '::1', 'daniel@gmail.com', 3, '2021-12-15 04:20:30', 1),
(224, '::1', 'danalvr', NULL, '2021-12-15 11:05:32', 0),
(225, '::1', 'daniel@gmail.com', 3, '2021-12-15 11:05:39', 1),
(226, '::1', 'daniel@gmail.com', 3, '2021-12-15 13:13:49', 1),
(227, '::1', 'vieska', NULL, '2021-12-15 16:13:41', 0),
(228, '::1', 'vieska', NULL, '2021-12-15 16:14:02', 0),
(229, '::1', 'camelia@gmail.com', 5, '2021-12-15 16:14:33', 1),
(230, '::1', 'vieska@gmail.com', 6, '2021-12-15 16:15:17', 1),
(231, '::1', 'daniel@gmail.com', 3, '2021-12-15 16:15:42', 1),
(232, '::1', 'danalvr', NULL, '2021-12-17 12:13:28', 0),
(233, '::1', 'pemilik', NULL, '2021-12-17 12:13:35', 0),
(234, '::1', 'pemilik', NULL, '2021-12-17 12:13:46', 0),
(235, '::1', 'daniel@gmail.com', 3, '2021-12-17 12:13:59', 1),
(236, '::1', 'danalvr', NULL, '2021-12-17 13:49:11', 0),
(237, '::1', 'danalvr', NULL, '2021-12-17 13:49:11', 0),
(238, '::1', 'daniel@gmail.com', 3, '2021-12-17 13:49:22', 1),
(239, '::1', 'daniel@gmail.com', 3, '2021-12-18 10:18:51', 1),
(240, '::1', 'daniel@gmail.com', 3, '2021-12-19 08:23:21', 1),
(241, '::1', 'vieska', NULL, '2021-12-19 08:32:25', 0),
(242, '::1', 'vieska', NULL, '2021-12-19 08:32:33', 0),
(243, '::1', 'vieska', NULL, '2021-12-19 08:32:49', 0),
(244, '::1', 'vieska@gmail.com', 6, '2021-12-19 08:33:35', 1),
(245, '::1', 'daniel@gmail.com', 3, '2021-12-19 08:34:46', 1),
(246, '::1', 'pemilik', NULL, '2021-12-20 11:30:16', 0),
(247, '::1', 'daniel@gmail.com', 3, '2021-12-20 11:30:25', 1),
(248, '::1', 'daniel@gmail.com', 3, '2021-12-20 15:40:16', 1),
(249, '::1', 'daniel@gmail.com', 3, '2021-12-20 16:00:01', 1),
(250, '::1', 'daniel@gmail.com', 3, '2021-12-20 16:00:33', 1),
(251, '::1', 'daniel@gmail.com', 3, '2021-12-20 16:01:55', 1),
(252, '::1', 'daniel@gmail.com', 3, '2021-12-20 16:03:47', 1),
(253, '::1', 'daniel@gmail.com', 3, '2021-12-20 16:04:30', 1),
(254, '::1', 'daniel@gmail.com', 3, '2021-12-20 16:04:46', 1),
(255, '::1', 'vieska@gmail.com', 6, '2021-12-20 16:05:51', 1),
(256, '::1', 'camelia@gmail.com', 5, '2021-12-20 16:06:20', 1),
(257, '::1', 'daniel@gmail.com', 3, '2021-12-20 16:06:35', 1),
(258, '::1', 'daniel@gmail.com', 3, '2021-12-20 16:08:03', 1),
(259, '::1', 'daniel@gmail.com', 3, '2021-12-21 09:21:29', 1),
(260, '::1', 'pemilik', NULL, '2021-12-21 12:38:10', 0),
(261, '::1', 'pemilik', NULL, '2021-12-21 12:38:20', 0),
(262, '::1', 'daniel@gmail.com', 3, '2021-12-21 12:38:26', 1),
(263, '::1', 'vieska@gmail.com', 6, '2021-12-21 16:01:52', 1),
(264, '::1', 'daniel@gmail.com', 3, '2021-12-28 07:55:35', 1),
(265, '::1', 'daniel@gmail.com', 3, '2021-12-28 08:55:32', 1),
(266, '::1', 'daniel@gmail.com', 3, '2021-12-28 09:04:24', 1),
(267, '::1', 'daniel@gmail.com', 3, '2021-12-28 11:24:16', 1),
(268, '::1', 'daniel@gmail.com', 3, '2021-12-28 12:08:01', 1),
(269, '::1', 'daniel@gmail.com', 3, '2021-12-29 04:35:57', 1),
(270, '::1', 'daniel@gmail.com', 3, '2021-12-29 11:17:05', 1),
(271, '::1', 'daniel@gmail.com', 3, '2021-12-29 12:28:30', 1),
(272, '::1', 'daniel@gmail.com', 3, '2021-12-29 15:10:17', 1),
(273, '::1', 'daniel@gmail.com', 3, '2021-12-29 15:21:21', 1),
(274, '::1', 'daniel@gmail.com', 3, '2022-01-03 14:32:16', 1),
(275, '::1', 'daniel@gmail.com', 3, '2022-01-04 10:24:28', 1),
(276, '::1', 'daniel@gmail.com', 3, '2022-01-04 12:58:54', 1),
(277, '::1', 'daniel@gmail.com', 3, '2022-01-05 10:43:09', 1),
(278, '::1', 'daniel@gmail.com', 3, '2022-01-06 02:24:02', 1),
(279, '::1', 'daniel@gmail.com', 3, '2022-01-06 02:25:20', 1),
(280, '::1', 'daniel@gmail.com', 3, '2022-01-06 02:41:24', 1),
(281, '::1', 'daniel@gmail.com', 3, '2022-01-06 03:41:46', 1),
(282, '::1', 'daniel@gmail.com', 3, '2022-01-06 03:49:17', 1),
(283, '::1', 'daniel@gmail.com', 3, '2022-01-06 12:18:25', 1),
(284, '::1', 'daniel@gmail.com', 3, '2022-01-06 12:29:22', 1),
(285, '::1', 'pemilik', NULL, '2022-01-06 12:29:43', 0),
(286, '::1', 'daniel@gmail.com', 3, '2022-01-06 12:29:50', 1),
(287, '::1', 'daniel@gmail.com', 3, '2022-01-07 06:11:25', 1),
(288, '::1', 'daniel@gmail.com', 3, '2022-01-07 10:23:43', 1),
(289, '::1', 'daniel@gmail.com', 3, '2022-06-18 07:19:42', 1),
(290, '::1', 'daniel@gmail.com', 3, '2022-06-18 08:19:24', 1),
(291, '::1', 'daniel@gmail.com', 3, '2022-06-21 23:36:42', 1),
(292, '::1', 'daniel@gmail.com', 3, '2022-06-22 06:54:14', 1),
(293, '::1', 'daniel@gmail.com', 3, '2022-06-22 09:36:10', 1),
(294, '::1', 'daniel@gmail.com', 3, '2022-06-23 09:41:19', 1),
(295, '::1', 'daniel@gmail.com', 3, '2022-06-24 09:53:38', 1),
(296, '::1', 'daniel@gmail.com', 3, '2022-06-25 04:23:51', 1),
(297, '::1', 'daniel@gmail.com', 3, '2022-06-25 10:07:13', 1),
(298, '::1', 'daniel@gmail.com', 3, '2022-06-25 21:01:12', 1),
(299, '::1', 'pemilik', NULL, '2022-06-25 21:01:26', 0),
(300, '::1', 'daniel@gmail.com', 3, '2022-06-25 21:01:33', 1),
(301, '::1', 'daniel@gmail.com', 3, '2022-06-26 00:11:04', 1),
(302, '::1', 'daniel@gmail.com', 3, '2022-06-27 08:18:36', 1),
(303, '::1', 'pemilik', NULL, '2022-06-27 10:37:40', 0),
(304, '::1', 'pemilik', NULL, '2022-06-27 10:37:47', 0),
(305, '::1', 'daniel@gmail.com', 3, '2022-06-27 10:37:55', 1),
(306, '::1', 'daniel@gmail.com', 3, '2022-06-28 20:11:56', 1),
(307, '::1', 'pemilik', NULL, '2022-06-29 00:52:37', 0),
(308, '::1', 'pamilik', NULL, '2022-06-29 00:52:42', 0),
(309, '::1', 'daniel@gmail.com', 3, '2022-06-29 00:52:55', 1),
(310, '::1', 'daniel@gmail.com', 3, '2022-06-29 08:27:27', 1),
(311, '::1', 'daniel@gmail.com', 3, '2022-06-29 18:01:04', 1),
(312, '::1', 'daniel@gmail.com', 3, '2022-06-30 10:07:33', 1),
(313, '::1', 'daniel@gmail.com', 3, '2022-06-30 20:25:57', 1),
(314, '::1', 'daniel@gmail.com', 3, '2022-07-01 03:13:40', 1),
(315, '::1', 'daniel@gmail.com', 3, '2022-07-02 09:23:55', 1),
(316, '::1', 'daniel@gmail.com', 3, '2022-07-02 21:23:17', 1),
(317, '::1', 'daniel@gmail.com', 3, '2022-07-03 02:51:28', 1),
(318, '::1', 'daniel@gmail.com', 3, '2022-07-03 05:44:50', 1),
(319, '::1', 'daniel@gmail.com', 3, '2022-07-03 10:59:59', 1),
(320, '::1', 'daniel@gmail.com', 3, '2022-07-04 08:15:56', 1),
(321, '::1', 'daniel@gmail.com', 3, '2022-07-05 10:18:16', 1),
(322, '::1', 'admin', NULL, '2022-07-08 06:43:24', 0),
(323, '::1', 'admin', NULL, '2022-07-08 06:43:34', 0),
(324, '::1', 'admin', NULL, '2022-07-08 06:44:58', 0),
(325, '::1', 'admin', NULL, '2022-07-08 06:45:04', 0),
(326, '::1', 'admin', NULL, '2022-07-08 06:45:12', 0),
(327, '::1', 'vieska', NULL, '2022-07-08 06:45:39', 0),
(328, '::1', 'vieska', NULL, '2022-07-08 06:45:48', 0),
(329, '::1', 'vieska', NULL, '2022-07-08 06:46:29', 0),
(330, '::1', 'daniel@gmail.com', 3, '2022-07-08 06:46:59', 1),
(331, '::1', 'daniel@gmail.com', 3, '2022-07-08 18:59:32', 1),
(332, '::1', 'daniel@gmail.com', 3, '2022-07-09 00:49:10', 1),
(333, '::1', 'daniel@gmail.com', 3, '2022-07-12 23:56:28', 1),
(334, '::1', 'daniel@gmail.com', 3, '2022-07-13 01:23:58', 1),
(335, '::1', 'customer', 7, '2022-07-13 02:07:57', 0),
(336, '::1', 'customer1', NULL, '2022-07-13 02:09:50', 0),
(337, '::1', 'customer@gmail.com', 7, '2022-07-13 02:10:07', 1),
(338, '::1', 'customer@gmail.com', 7, '2022-07-13 02:16:41', 1),
(339, '::1', 'yuyun@gmail.com', 9, '2022-07-13 02:23:40', 1),
(340, '::1', 'customer3', 10, '2022-07-13 03:03:29', 0),
(341, '::1', 'customer5@gmail.com', 12, '2022-07-13 03:06:39', 1),
(342, '::1', 'daniel@gmail.com', 3, '2022-07-13 03:09:50', 1),
(343, '::1', 'customer5@gmail.com', 12, '2022-07-13 03:11:08', 1),
(344, '::1', 'pemilik', NULL, '2022-07-13 03:13:40', 0),
(345, '::1', 'daniel@gmail.com', 3, '2022-07-13 03:13:47', 1),
(346, '::1', 'daniel@gmail.com', 3, '2022-07-13 03:18:09', 1),
(347, '::1', 'daniel@gmail.com', 3, '2022-07-13 07:42:25', 1),
(348, '::1', 'pemilik', NULL, '2022-07-13 23:29:55', 0),
(349, '::1', 'daniel@gmail.com', 3, '2022-07-13 23:30:09', 1),
(350, '::1', 'daniel@gmail.com', 3, '2022-07-21 01:26:37', 1),
(351, '::1', 'daniel@gmail.com', 3, '2022-07-21 06:18:31', 1),
(352, '::1', 'dimas@gmail.com', 13, '2022-07-21 12:56:04', 1),
(353, '::1', 'pemiliki', NULL, '2022-07-27 04:55:13', 0),
(354, '::1', 'daniel@gmail.com', 3, '2022-07-27 04:55:22', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'manage-by-pemilik', 'manage all fitur'),
(2, 'manage-by-admin', 'manage all fitur except laporan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dataaset`
--

CREATE TABLE `dataaset` (
  `id` int(11) NOT NULL,
  `namaAset` varchar(255) NOT NULL,
  `jenisAset` varchar(255) NOT NULL,
  `kuantitasAset` int(11) NOT NULL,
  `akun` varchar(500) NOT NULL,
  `totalAset` int(11) NOT NULL,
  `priceAset` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dataaset`
--

INSERT INTO `dataaset` (`id`, `namaAset`, `jenisAset`, `kuantitasAset`, `akun`, `totalAset`, `priceAset`) VALUES
(1, 'Gedung', 'Aset Tetap', 1, 'A1101', 2000000, 2000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `databahan`
--

CREATE TABLE `databahan` (
  `id` int(11) NOT NULL,
  `namaBarang` varchar(255) NOT NULL,
  `kuantitasBarang` int(11) NOT NULL,
  `idPeralatan` varchar(500) NOT NULL,
  `totalBahan` int(11) NOT NULL,
  `priceBarang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `databahan`
--

INSERT INTO `databahan` (`id`, `namaBarang`, `kuantitasBarang`, `idPeralatan`, `totalBahan`, `priceBarang`) VALUES
(1, 'Motruizer', 30, 'B1101', 1200000, 40000),
(2, 'Lotion', 30, 'B1101', 1500000, 50000),
(3, 'Scrube', 40, 'B1102', 2000000, 50000),
(4, 'testing', 100, 'B1103', 5000000, 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `databeban`
--

CREATE TABLE `databeban` (
  `id` int(11) NOT NULL,
  `jenisBeban` varchar(255) NOT NULL,
  `akun` varchar(255) NOT NULL,
  `totalBeban` int(11) NOT NULL,
  `header` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `databeban`
--

INSERT INTO `databeban` (`id`, `jenisBeban`, `akun`, `totalBeban`, `header`) VALUES
(1, 'Beban Air', 'B2101', 30000, ''),
(2, 'Beban Listrik', 'B2102', 50000, ''),
(3, 'Beban Listrik', 'B2103', 50000, ''),
(7, 'Beban Sewa', 'B2106', 350000, ''),
(8, 'Beban Air', 'B2105', 500000, ''),
(12, '517', 'WsKC7jrOO9', 150000, ''),
(13, 'Beban Sewa', 'XoR40ijtd1', 159000, ''),
(14, '517-Beban Sewa', 'N3Zs353CRs', 150000, ''),
(15, '515-Beban Listrik', 'lg1ZJina5x', 5000000, ''),
(20, '516-Beban Air', 'HLcW4TgZZY', 190000, ''),
(21, '516-Beban Air', 'Au5fBCjOqt', 190000, ''),
(22, '517-Beban Sewa', 'ghZuhqJmVp', 50000, ''),
(23, '516-Beban Air', 'HbEc2r5b1I', 50000, ''),
(24, '515-Beban Listrik', 'IA3OVR0XTR', 100000, ''),
(25, '516-Beban Air', 'E19aozejOk', 150000, ''),
(26, '517-Beban Sewa', '0g8vLNJnG5', 10000, ''),
(27, '515-Beban Listrik', 'dcSLYCJdun', 1000, ''),
(28, '520-Beban Gaji', 'TPB001', 15000, ''),
(29, '515-Beban Listrik', 'TPB002', 100000, ''),
(30, '520-Beban Gaji', 'TPB003', 5000000, ''),
(31, '517-Beban Sewa', 'TPB004', 5000000, ''),
(32, '520-Beban Gaji', 'TPB005', 1500000, ''),
(33, '516-Beban Air', 'TPB006', 100000, ''),
(34, '517-Beban Sewa', 'TPB007', 15000, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datakelolaadmin`
--

CREATE TABLE `datakelolaadmin` (
  `id` int(11) NOT NULL,
  `kodetransaksi` varchar(500) NOT NULL,
  `tanggalPembelian` date NOT NULL,
  `namaAdmin` varchar(255) NOT NULL,
  `statusPembayaran` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `datakelolaadmin`
--

INSERT INTO `datakelolaadmin` (`id`, `kodetransaksi`, `tanggalPembelian`, `namaAdmin`, `statusPembayaran`) VALUES
(1, 'P0001', '2021-12-15', 'Pemilik', 'Sudah Membayar'),
(2, 'P0002', '2021-12-15', 'Pemilik', 'Sudah Membayar'),
(3, 'P0003', '2022-06-22', 'Pemilik', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `datakelolaaset`
--

CREATE TABLE `datakelolaaset` (
  `id` int(11) NOT NULL,
  `akun` varchar(500) NOT NULL,
  `tanggalInputAset` date NOT NULL,
  `statusPembayaran` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `datakelolaaset`
--

INSERT INTO `datakelolaaset` (`id`, `akun`, `tanggalInputAset`, `statusPembayaran`) VALUES
(1, 'A1101', '2021-12-20', 'Sudah Membayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datakelolabahan`
--

CREATE TABLE `datakelolabahan` (
  `id` int(11) NOT NULL,
  `idPeralatan` varchar(500) NOT NULL,
  `tanggalInputBahan` date NOT NULL,
  `statusPembayaran` varchar(255) DEFAULT NULL,
  `namaSupplier` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `datakelolabeban`
--

CREATE TABLE `datakelolabeban` (
  `id` int(11) NOT NULL,
  `akun` varchar(255) NOT NULL,
  `tanggalInputBeban` date NOT NULL,
  `statusPembayaran` varchar(255) DEFAULT NULL,
  `header` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `datakelolabeban`
--

INSERT INTO `datakelolabeban` (`id`, `akun`, `tanggalInputBeban`, `statusPembayaran`, `header`) VALUES
(27, 'TPB001', '2022-07-13', 'Sudah Membayar', ''),
(28, 'TPB002', '2022-07-13', 'Sudah Membayar', ''),
(29, 'TPB003', '2022-07-21', 'Sudah Membayar', ''),
(30, 'TPB004', '2022-07-21', 'Sudah Membayar', ''),
(31, 'TPB005', '2022-07-21', NULL, ''),
(32, 'TPB006', '2022-07-27', NULL, ''),
(33, 'TPB007', '2022-07-27', NULL, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datakelolaservice`
--

CREATE TABLE `datakelolaservice` (
  `id` int(11) NOT NULL,
  `namaPelanggan` varchar(255) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `kodetransaksi` varchar(500) NOT NULL,
  `tanggalPemesanan` date NOT NULL,
  `namaAdmin` varchar(255) NOT NULL,
  `statusPemesanan` varchar(255) DEFAULT NULL,
  `noTelepon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `datakelolatransaksilainnya`
--

CREATE TABLE `datakelolatransaksilainnya` (
  `id` int(11) NOT NULL,
  `akun` varchar(500) NOT NULL,
  `tanggalInputTransaksi` date NOT NULL,
  `statusPembayaran` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `datakelolatransaksilainnya`
--

INSERT INTO `datakelolatransaksilainnya` (`id`, `akun`, `tanggalInputTransaksi`, `statusPembayaran`) VALUES
(8, 'T1101', '2022-07-13', NULL),
(9, 'T1102', '2022-07-13', NULL),
(10, 'T1103', '2022-07-21', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `datatransaksi`
--

CREATE TABLE `datatransaksi` (
  `id` int(11) NOT NULL,
  `namaProduk` varchar(255) NOT NULL,
  `jumlahProduk` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `kodetransaksi` varchar(500) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `datatransaksilainnya`
--

CREATE TABLE `datatransaksilainnya` (
  `id` int(11) NOT NULL,
  `keteranganTransaksi` varchar(255) NOT NULL,
  `jenisTransaksi` varchar(255) NOT NULL,
  `akun` varchar(500) NOT NULL,
  `totalTransaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `datatransaksilainnya`
--

INSERT INTO `datatransaksilainnya` (`id`, `keteranganTransaksi`, `jenisTransaksi`, `akun`, `totalTransaksi`) VALUES
(8, 'Modal Awal', 'Modal', 'T1101', 10000000),
(9, 'Prive', 'Prive', 'T1102', 3000000),
(10, 'Prive', 'Prive', 'T1103', 15000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `datatransaksiservice`
--

CREATE TABLE `datatransaksiservice` (
  `id` int(11) NOT NULL,
  `jenisService` varchar(255) NOT NULL,
  `kodetransaksi` varchar(500) NOT NULL,
  `jenisPelayanan` varchar(255) NOT NULL,
  `jenisPesan` varchar(255) NOT NULL,
  `diskon` int(11) NOT NULL,
  `totalService` int(11) NOT NULL,
  `pricePemesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gajikaryawan`
--

CREATE TABLE `gajikaryawan` (
  `id` int(11) NOT NULL,
  `namaKaryawan` varchar(500) NOT NULL,
  `statusPembayaran` varchar(200) NOT NULL,
  `tanggalPembayaran` date NOT NULL,
  `totalPembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gajikaryawan`
--

INSERT INTO `gajikaryawan` (`id`, `namaKaryawan`, `statusPembayaran`, `tanggalPembayaran`, `totalPembayaran`) VALUES
(1, 'Camelia', 'Sudah Membayar', '2021-12-16', 200000),
(2, 'Camelia', 'Sudah Membayar', '2021-12-20', 200000),
(3, 'Vieska', 'Sudah Membayar', '2021-12-20', 90000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenisbeban`
--

CREATE TABLE `jenisbeban` (
  `id` int(11) NOT NULL,
  `jenisBeban` varchar(200) NOT NULL,
  `header` varchar(200) NOT NULL,
  `kodeAkun` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenisbeban`
--

INSERT INTO `jenisbeban` (`id`, `jenisBeban`, `header`, `kodeAkun`) VALUES
(1, 'Beban Listrik', 'B2', 'B211'),
(2, 'Beban Air', 'B2', 'B212'),
(3, 'Beban Sewa', 'B2', 'B215');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenisservice`
--

CREATE TABLE `jenisservice` (
  `id` int(11) NOT NULL,
  `jenisService` varchar(255) NOT NULL,
  `harga_service` varchar(255) NOT NULL,
  `tarif` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenisservice`
--

INSERT INTO `jenisservice` (`id`, `jenisService`, `harga_service`, `tarif`) VALUES
(1, 'Treatment', '25000', ''),
(2, 'Spa', '30000', ''),
(3, 'facial wash', '15000', ''),
(4, 'Haircut', '20000', ''),
(5, 'Full', '1000000', NULL),
(6, 'DEV ONLY', '10000000', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenistransaksilainnya`
--

CREATE TABLE `jenistransaksilainnya` (
  `id` int(11) NOT NULL,
  `jenisTransaksiLainnya` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenistransaksilainnya`
--

INSERT INTO `jenistransaksilainnya` (`id`, `jenisTransaksiLainnya`) VALUES
(1, 'Modal'),
(2, 'Prive');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `namaKaryawan` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `noTelepon` varchar(20) NOT NULL,
  `tanggalBergabung` date NOT NULL,
  `idKaryawan` varchar(500) NOT NULL,
  `serviceDikerjakan` int(11) DEFAULT NULL,
  `bayaranPerProduk` int(11) DEFAULT NULL,
  `tanggalPembayaranGaji` date DEFAULT NULL,
  `alamat` varchar(255) NOT NULL,
  `kode_jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `namaKaryawan`, `role`, `noTelepon`, `tanggalBergabung`, `idKaryawan`, `serviceDikerjakan`, `bayaranPerProduk`, `tanggalPembayaranGaji`, `alamat`, `kode_jabatan`) VALUES
(1, 'Camelia', 'Karyawan', '08123456789', '2021-12-15', 'K001', 5, 40000, '2022-07-13', 'Jl. Abc', '1'),
(2, 'Vieska Update Test', 'Karyawan', '081122334455', '2021-12-15', 'K002', 3, 30000, '2022-07-08', 'Jl. Bcd', '2'),
(3, 'Test Kary', 'Karyawan', '1234', '2022-07-13', 'K003', NULL, NULL, NULL, 'BDG', '3'),
(4, 'Test Lagi Ah', 'Karyawan', '12345', '2022-07-14', 'K004', NULL, NULL, NULL, 'BDG', '3'),
(5, 'PQR', 'Karyawan', '123455', '2022-07-14', 'K005', NULL, NULL, NULL, 'BDG', '3'),
(6, 'XYZ', 'Karyawan', '123456', '2022-07-14', 'K006', NULL, NULL, NULL, 'BDG', '1'),
(7, 'PQR', 'Karyawan', '123456', '2022-07-21', 'K007', NULL, NULL, NULL, '', '1'),
(8, 'ZYT', 'Karyawan', '121212121', '2022-07-21', 'K008', NULL, NULL, NULL, '', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1634114543, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `statusPembayaran` varchar(255) NOT NULL,
  `kodetransaksi` varchar(500) NOT NULL,
  `tanggalPembayaran` date NOT NULL,
  `totalPembayaran` int(11) DEFAULT NULL,
  `totalProduk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `statusPembayaran`, `kodetransaksi`, `tanggalPembayaran`, `totalPembayaran`, `totalProduk`) VALUES
(1, 'Sudah Membayar', 'P0001', '2021-12-15', 320000, 7),
(2, 'Sudah Membayar', 'P0002', '2021-12-18', 160000, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaranaset`
--

CREATE TABLE `pembayaranaset` (
  `id` int(11) NOT NULL,
  `statusPembayaran` varchar(255) NOT NULL,
  `akun` varchar(500) NOT NULL,
  `tanggalPembayaran` date NOT NULL,
  `totalAset` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaranaset`
--

INSERT INTO `pembayaranaset` (`id`, `statusPembayaran`, `akun`, `tanggalPembayaran`, `totalAset`) VALUES
(1, 'Sudah Membayar', 'A1101', '2021-12-29', 2000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaranbahan`
--

CREATE TABLE `pembayaranbahan` (
  `id` int(11) NOT NULL,
  `statusPembayaran` varchar(255) NOT NULL,
  `idPeralatan` varchar(500) NOT NULL,
  `tanggalPembayaran` date NOT NULL,
  `totalBahan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaranbahan`
--

INSERT INTO `pembayaranbahan` (`id`, `statusPembayaran`, `idPeralatan`, `tanggalPembayaran`, `totalBahan`) VALUES
(1, 'Sudah Membayar', 'B1101', '2021-12-15', 2700000),
(2, 'Sudah Membayar', 'B1102', '2022-01-07', 2000000),
(3, 'Sudah Membayar', 'B1103', '2022-06-18', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaranbeban`
--

CREATE TABLE `pembayaranbeban` (
  `id` int(11) NOT NULL,
  `statusPembayaran` varchar(255) NOT NULL,
  `akun` varchar(500) NOT NULL,
  `tanggalPembayaran` date NOT NULL,
  `totalBeban` int(11) NOT NULL,
  `header` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaranbeban`
--

INSERT INTO `pembayaranbeban` (`id`, `statusPembayaran`, `akun`, `tanggalPembayaran`, `totalBeban`, `header`) VALUES
(19, 'Sudah Membayar', 'TPB001', '2022-07-13', 0, ''),
(20, 'Sudah Membayar', 'dcSLYCJdun', '2022-07-13', 0, ''),
(21, 'Sudah Membayar', 'TPB002', '2022-07-13', 0, ''),
(22, 'Sudah Membayar', 'TPB003', '2022-07-21', 0, ''),
(23, 'Sudah Membayar', 'TPB004', '2022-07-21', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaranservice`
--

CREATE TABLE `pembayaranservice` (
  `id` int(11) NOT NULL,
  `statusPemesanan` varchar(255) NOT NULL,
  `tanggalPembayaran` text NOT NULL,
  `totalPembayaran` int(11) NOT NULL,
  `kodetransaksi` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayarantransaksilainnya`
--

CREATE TABLE `pembayarantransaksilainnya` (
  `id` int(11) NOT NULL,
  `statusPembayaran` varchar(255) NOT NULL,
  `akun` varchar(500) NOT NULL,
  `tanggalPembayaran` date NOT NULL,
  `totalTransaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengambilanstock`
--

CREATE TABLE `pengambilanstock` (
  `id` int(11) NOT NULL,
  `namaBarang` varchar(255) NOT NULL,
  `jumlahPengambilanStock` int(11) DEFAULT NULL,
  `inputTanggalPengambilanStock` date DEFAULT NULL,
  `namaKaryawan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `namaProduk` varchar(500) NOT NULL,
  `hargaProduk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `namaProduk`, `hargaProduk`) VALUES
(1, 'Motruizer', 40000),
(2, 'Lotion', 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `namaBarang` varchar(255) NOT NULL,
  `kuantitasBarang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `stock`
--

INSERT INTO `stock` (`id`, `namaBarang`, `kuantitasBarang`) VALUES
(1, 'Motruizer', 30),
(2, 'Lotion', 30),
(3, 'Scrube', 40),
(4, 'testing', 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_aset`
--

CREATE TABLE `tb_aset` (
  `id` int(11) NOT NULL,
  `id_aset` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jenis_aset` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `satuan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_aset`
--

INSERT INTO `tb_aset` (`id`, `id_aset`, `nama`, `jenis_aset`, `harga`, `satuan`) VALUES
(1, 'A001', 'Gunting Update Test', 'Aset Tetap', 150000, 'Unit'),
(2, 'A002', 'Pengering Rambung', 'Aset Tetap', 250000, 'Pcs'),
(4, 'A003', 'Handphone ', 'Aset Lancar', 2000000, 'Unit'),
(5, 'A004', 'Komputer', 'Aset Tetap', 32000000, 'Unit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bayar`
--

CREATE TABLE `tb_bayar` (
  `id` int(50) NOT NULL,
  `id_bayar` varchar(255) DEFAULT NULL,
  `id_transaksi` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'belum bayar',
  `total_transaksi` int(50) DEFAULT NULL,
  `total_bayar` int(50) DEFAULT NULL,
  `kembalian` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bayar`
--

INSERT INTO `tb_bayar` (`id`, `id_bayar`, `id_transaksi`, `status`, `total_transaksi`, `total_bayar`, `kembalian`) VALUES
(19, '933ZFb9fsU', 'SN20220713001', 'sudah bayar', 35000, 35000, 0),
(20, 'O4oJ8YuZWt', 'SN20220713002', 'sudah bayar', 10000000, 10000000, 0),
(21, 'HD33UI2Js5', 'SN20220721003', 'sudah bayar', 25000, 25000, 0),
(22, 'DBYg4mFILQ', 'SN20220727004', 'sudah bayar', 30000, 30000, 0),
(23, 'azd7G1OaH7', 'SN20220727005', 'sudah bayar', 15000, 15000, 0),
(24, 'Vtkyh6YlCX', 'SN20220727006', 'sudah bayar', 30000, 30000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_pengeluaran_aset`
--

CREATE TABLE `tb_detail_pengeluaran_aset` (
  `id` int(20) NOT NULL,
  `id_transaksi` varchar(255) DEFAULT NULL,
  `id_aset` varchar(255) DEFAULT NULL,
  `jenis_aset` varchar(255) DEFAULT NULL,
  `harga_satuan` int(20) DEFAULT NULL,
  `qty` int(20) DEFAULT NULL,
  `subtotal` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detail_pengeluaran_aset`
--

INSERT INTO `tb_detail_pengeluaran_aset` (`id`, `id_transaksi`, `id_aset`, `jenis_aset`, `harga_satuan`, `qty`, `subtotal`) VALUES
(12, 'TRXA20220713001', 'A001', 'Aset Tetap', 150000, 1, 150000),
(13, 'TRXA20220721002', 'A001', 'Aset Tetap', 150000, 1, 150000),
(14, 'TRXA20220721002', 'A004', 'Aset Tetap', 32000000, 1, 32000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_service`
--

CREATE TABLE `tb_detail_service` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(50) DEFAULT NULL,
  `id_service` varchar(50) DEFAULT NULL,
  `harga` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detail_service`
--

INSERT INTO `tb_detail_service` (`id`, `id_transaksi`, `id_service`, `harga`) VALUES
(33, 'SN20220713001', '3', 15000),
(34, 'SN20220713001', '4', 20000),
(35, 'SN20220713002', '6', 10000000),
(36, 'SN20220721003', '1', 25000),
(37, 'SN20220727004', '2', 30000),
(38, 'SN20220727005', '3', 15000),
(39, 'SN20220727006', '2', 30000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_transaksi`
--

CREATE TABLE `tb_detail_transaksi` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(50) DEFAULT NULL,
  `id_product` varchar(50) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga_satuan` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detail_transaksi`
--

INSERT INTO `tb_detail_transaksi` (`id`, `id_transaksi`, `id_product`, `qty`, `harga_satuan`, `subtotal`) VALUES
(25, 'PNJ20220713001', 'PRD005', 1, 150000, 150000),
(26, 'PNJ20220713002', 'PRD006', 10, 15000, 150000),
(28, 'PNJ20220721003', 'PRD003', 1, 15000, 15000),
(29, 'PNJ20220721003', 'PRD006', 1, 15000, 15000),
(34, 'PMB20220727001', 'PRD001', 10, 25000, 250000),
(35, 'PMB20220727001', 'PRD002', 10, 25000, 250000),
(36, 'PNJ20220727004', 'PRD006', 1, 15000, 15000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id` int(11) NOT NULL,
  `deskripsi` varchar(50) DEFAULT NULL,
  `gapok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id`, `deskripsi`, `gapok`) VALUES
(1, 'Terapist', 950000),
(2, 'Admin Update test', 500000),
(3, 'Test Again', 1000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jurnal`
--

CREATE TABLE `tb_jurnal` (
  `id` int(11) NOT NULL,
  `id_referensi` varchar(50) DEFAULT NULL,
  `tgl_jurnal` date DEFAULT NULL,
  `no_coa` int(11) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `posisi_d_c` varchar(50) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jurnal`
--

INSERT INTO `tb_jurnal` (`id`, `id_referensi`, `tgl_jurnal`, `no_coa`, `keterangan`, `posisi_d_c`, `nominal`) VALUES
(89, 'TRX-L-1299824618', '2022-07-13', 111, 'Modal', 'd', 10000000),
(90, 'TRX-L-1299824618', '2022-07-13', 300, 'Modal', 'k', 10000000),
(93, 'TRXA20220713001', '2022-07-13', 122, 'Pengeluaran Aset', 'd', 150000),
(94, 'TRXA20220713001', '2022-07-13', 111, 'Pengeluaran Aset', 'k', 150000),
(95, 'TPB001', '2022-07-13', 520, 'Transaksi Beban ', 'd', 15000),
(96, 'TPB001', '2022-07-13', 111, 'Transaksi Beban ', 'k', 15000),
(97, 'PNJ20220713001', '2022-07-13', 111, 'Penjualan Produk', 'd', 150000),
(98, 'PNJ20220713001', '2022-07-13', 400, 'Penjualan Produk', 'k', 150000),
(99, 'SN20220713001', '2022-07-13', 111, 'Transaksi service', 'd', 35000),
(100, 'SN20220713001', '2022-07-13', 411, 'Transaksi service', 'k', 35000),
(101, 'TRX-L-2127251381', '2022-07-13', 312, 'Prive', 'd', 3000000),
(102, 'TRX-L-2127251381', '2022-07-13', 111, 'Prive', 'k', 3000000),
(103, 'PNJ20220713002', '2022-07-13', 111, 'Penjualan Produk', 'd', 150000),
(104, 'PNJ20220713002', '2022-07-13', 400, 'Penjualan Produk', 'k', 150000),
(107, 'TPB002', '2022-07-13', 515, 'Transaksi Beban ', 'd', 100000),
(108, 'TPB002', '2022-07-13', 111, 'Transaksi Beban ', 'k', 100000),
(109, NULL, '2022-07-13', 520, 'Penggajian periode 1970-01 ', 'd', NULL),
(110, NULL, '2022-07-13', 111, 'Penggajian periode 1970-01 ', 'k', NULL),
(111, 'PAYROLL20220713001', '2022-07-13', 520, 'Penggajian periode 2022-07 ', 'd', 955000),
(112, 'PAYROLL20220713001', '2022-07-13', 111, 'Penggajian periode 2022-07 ', 'k', 955000),
(113, 'SN20220713002', '2022-07-13', 111, 'Transaksi service', 'd', 10000000),
(114, 'SN20220713002', '2022-07-13', 411, 'Transaksi service', 'k', 10000000),
(115, 'TPB003', '2022-07-21', 520, 'Transaksi Beban ', 'd', 5000000),
(116, 'TPB003', '2022-07-21', 111, 'Transaksi Beban ', 'k', 5000000),
(117, 'TPB004', '2022-07-21', 517, 'Transaksi Beban ', 'd', 5000000),
(118, 'TPB004', '2022-07-21', 111, 'Transaksi Beban ', 'k', 5000000),
(119, 'SN20220721003', '2022-07-21', 111, 'Transaksi service', 'd', 25000),
(120, 'SN20220721003', '2022-07-21', 411, 'Transaksi service', 'k', 25000),
(121, 'TPB005', '2022-07-21', 520, 'Transaksi Beban ', 'd', 1500000),
(122, 'TPB005', '2022-07-21', 111, 'Transaksi Beban ', 'k', 1500000),
(123, 'PNJ20220721003', '2022-07-21', 111, 'Penjualan Produk', 'd', 30000),
(124, 'PNJ20220721003', '2022-07-21', 400, 'Penjualan Produk', 'k', 30000),
(125, 'TRX-L-757937874', '2022-07-21', 312, 'Prive', 'd', 15000),
(126, 'TRX-L-757937874', '2022-07-21', 111, 'Prive', 'k', 15000),
(127, 'TRXA20220721002', '2022-07-21', 122, 'Pengeluaran Aset', 'd', 32150000),
(128, 'TRXA20220721002', '2022-07-21', 111, 'Pengeluaran Aset', 'k', 32150000),
(129, 'SN20220727004', '2022-07-27', 111, 'Transaksi service', 'd', 30000),
(130, 'SN20220727004', '2022-07-27', 411, 'Transaksi service', 'k', 30000),
(131, 'SN20220727005', '2022-07-27', 111, 'Transaksi service', 'd', 15000),
(132, 'SN20220727005', '2022-07-27', 411, 'Transaksi service', 'k', 15000),
(135, 'PMB20220727001', '2022-07-27', 500, 'Pembelian Bahan', 'd', 500000),
(136, 'PMB20220727001', '2022-07-27', 111, 'Pembelian Bahan', 'k', 500000),
(137, 'TPB006', '2022-07-27', 516, 'Transaksi Beban ', 'd', 1),
(138, 'TPB006', '2022-07-27', 111, 'Transaksi Beban ', 'k', 1),
(139, 'TPB007', '2022-07-27', 517, 'Transaksi Beban ', 'd', 15000),
(140, 'TPB007', '2022-07-27', 111, 'Transaksi Beban ', 'k', 15000),
(141, 'SN20220727006', '2022-07-27', 111, 'Transaksi service', 'd', 30000),
(142, 'SN20220727006', '2022-07-27', 411, 'Transaksi service', 'k', 30000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id`, `keterangan`) VALUES
(1, 'Operasional'),
(2, 'Non Operasional'),
(3, 'Kategori 3'),
(4, 'Test Kategori');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id` int(11) NOT NULL,
  `id_pelanggan` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_telp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id`, `id_pelanggan`, `nama`, `alamat`, `no_telp`) VALUES
(1, 'PEL001', 'Kamelia Lupakanlah Aku', 'Jakarta', '112233'),
(2, 'PEL002', 'Kamelia', 'Bandung', '00998877'),
(3, 'PEL003', 'Test PEL', 'Bandung', '111111'),
(4, 'PEL004', 'Test Again', 'Jakarta', '1234567');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penggajian`
--

CREATE TABLE `tb_penggajian` (
  `id` int(20) NOT NULL,
  `id_gaji` varchar(255) DEFAULT NULL,
  `id_pegawai` varchar(255) DEFAULT NULL,
  `tgl_gaji` date DEFAULT NULL,
  `periode` varchar(50) DEFAULT NULL,
  `total_service` int(20) DEFAULT NULL,
  `gajipokok` int(20) DEFAULT NULL,
  `persentase_bonus` int(20) DEFAULT NULL,
  `jml_service` int(20) DEFAULT NULL,
  `bonus_service` int(20) DEFAULT NULL,
  `gaji_bersih` int(20) DEFAULT NULL,
  `jml_hadir` int(11) DEFAULT NULL,
  `bonus_hadir` double DEFAULT NULL,
  `total_bonus` double DEFAULT NULL,
  `total_bonus_hadir` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_penggajian`
--

INSERT INTO `tb_penggajian` (`id`, `id_gaji`, `id_pegawai`, `tgl_gaji`, `periode`, `total_service`, `gajipokok`, `persentase_bonus`, `jml_service`, `bonus_service`, `gaji_bersih`, `jml_hadir`, `bonus_hadir`, `total_bonus`, `total_bonus_hadir`) VALUES
(3, NULL, NULL, NULL, '1970-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'PAYROLL20220713001', 'K001', '2022-07-13', '2022-07', 35000, 950000, 0, NULL, 0, 955000, 1, 5000, NULL, 5000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_product`
--

CREATE TABLE `tb_product` (
  `id` int(11) NOT NULL,
  `id_product` varchar(50) DEFAULT NULL,
  `nama_product` varchar(255) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `harga_satuan` int(11) DEFAULT NULL,
  `merk` varchar(150) DEFAULT NULL,
  `stok_akhir` varchar(50) DEFAULT NULL,
  `min_stok` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `satuan` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_product`
--

INSERT INTO `tb_product` (`id`, `id_product`, `nama_product`, `id_kategori`, `harga_satuan`, `merk`, `stok_akhir`, `min_stok`, `status`, `satuan`, `created_at`) VALUES
(1, 'PRD001', 'Shampoo', 1, 25000, 'Test', '8', NULL, 1, '2', '2022-06-25 15:45:48'),
(2, 'PRD002', 'Vitamin Rambut', 1, 25000, 'Test', '8', '6', 1, '2', '2022-06-25 16:00:36'),
(3, 'PRD003', 'Product non operasionl', 2, 15000, '-', '0', '10', 1, '2', '2022-06-27 14:35:26'),
(4, 'PRD005', 'Dev Test Update Test', 2, 150000, '-', '0', '10', 1, '4', '2022-07-13 13:13:14'),
(5, 'PRD006', 'Test Again', 2, 15000, '-', '0', '10', 1, '4', '2022-07-13 13:28:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_satuan`
--

CREATE TABLE `tb_satuan` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_satuan`
--

INSERT INTO `tb_satuan` (`id`, `keterangan`) VALUES
(1, 'Unit'),
(2, 'Pcs'),
(3, 'Kilo'),
(4, 'Testing Satuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_stok`
--

CREATE TABLE `tb_stok` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `id_transaksi` varchar(50) DEFAULT NULL,
  `id_karyawan` varchar(50) DEFAULT NULL,
  `id_bahan` varchar(50) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL COMMENT 'in/out',
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_stok`
--

INSERT INTO `tb_stok` (`id`, `tanggal`, `id_transaksi`, `id_karyawan`, `id_bahan`, `qty`, `type`, `date_create`) VALUES
(5, '2022-07-27', 'PMB20220727001', NULL, 'PRD001', 10, 'in', '2022-07-27 06:44:13'),
(6, '2022-07-27', 'PMB20220727001', NULL, 'PRD002', 10, 'in', '2022-07-27 06:44:13'),
(7, '2022-07-27', 'SN20220713001', 'K001', 'PRD001', 1, 'out', '2022-07-27 06:46:26'),
(8, '2022-07-27', 'SN20220713001', 'K001', 'PRD002', 2, 'out', '2022-07-27 06:46:26'),
(9, '2022-07-27', 'SN20220713002', 'K001', 'PRD001', 1, 'out', '2022-07-27 06:47:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(255) DEFAULT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `subtotal` int(50) DEFAULT NULL,
  `kembalian` int(50) DEFAULT NULL,
  `jumlah_bayar` int(50) DEFAULT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `jenis_pembayaran` varchar(50) DEFAULT NULL,
  `supplier` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `id_transaksi`, `tgl_transaksi`, `jenis`, `status`, `subtotal`, `kembalian`, `jumlah_bayar`, `nama_pelanggan`, `jenis_pembayaran`, `supplier`) VALUES
(27, 'TRXA20220713001', '2022-07-13', 'Pengeluaran aset', 'selesai', 150000, 0, 150000, NULL, 'Tunai', 'XYZ'),
(28, 'PNJ20220713001', '2022-07-13', 'Penjualan', 'selesai', 150000, 0, 150000, 'Test', 'Tunai', NULL),
(29, 'PNJ20220713002', '2022-07-13', 'Penjualan', 'selesai', 150000, 0, 150000, 'Test', 'Tunai', NULL),
(31, 'TRXA20220721002', '2022-07-21', 'Pengeluaran aset', 'selesai', 32150000, 0, 32150000, NULL, 'Tunai', 'XYZ'),
(32, 'PNJ20220721003', '2022-07-21', 'Penjualan', 'selesai', 30000, 0, 30000, 'Kamelia', 'Tunai', NULL),
(35, 'PMB20220727001', '2022-07-27', 'Pembelian', 'selesai', 500000, 0, 500000, NULL, 'Tunai', 'XYZ'),
(36, 'PNJ20220727004', '2022-07-27', 'Penjualan', 'ongoing', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi_service`
--

CREATE TABLE `tb_transaksi_service` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(50) DEFAULT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  `tgl_service` date DEFAULT NULL COMMENT 'untuk tanggal pelayanan',
  `jenis` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `diskon` int(100) DEFAULT NULL,
  `subtotal` int(100) DEFAULT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `jenis_pembayaran` varchar(50) DEFAULT NULL,
  `jenis_pesan` varchar(50) DEFAULT NULL,
  `jenis_pelayanan` varchar(50) DEFAULT NULL,
  `kode_karyawan` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL COMMENT 'ONLY booking service by user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transaksi_service`
--

INSERT INTO `tb_transaksi_service` (`id`, `id_transaksi`, `tgl_transaksi`, `tgl_service`, `jenis`, `status`, `diskon`, `subtotal`, `nama_pelanggan`, `jenis_pembayaran`, `jenis_pesan`, `jenis_pelayanan`, `kode_karyawan`, `user_id`) VALUES
(19, 'SN20220713001', '2022-07-13', '2022-07-13', 'Service', 'selesai', 0, 35000, 'Kamelia Lupakanlah Aku', 'Tunai', 'Online', 'Onsite', 'K001', NULL),
(20, 'SN20220713002', '2022-07-13', '2022-07-13', 'Service', 'selesai', 0, 10000000, 'Test Again', 'Tunai', 'Online', 'Onsite', 'K002', NULL),
(21, 'SN20220721003', '2022-07-21', '2022-07-24', 'Service', 'selesai', 0, 25000, 'Kamelia', 'Tunai', 'Offline', 'Onsite', 'K001', NULL),
(22, 'SN20220727004', '2022-07-27', '2022-07-27', 'Service', 'selesai', 0, 30000, 'Kamelia Lupakanlah Aku', 'Tunai', 'Offline', 'Onsite', 'K001', NULL),
(23, 'SN20220727005', '2022-07-27', '2022-07-27', 'Service', 'selesai', 0, 15000, 'Test Again', 'Tunai', 'Offline', 'Onsite', 'K004', NULL),
(25, 'SN20220727006', '2022-07-27', '2022-07-27', 'Service', 'selesai', 0, 30000, 'Test PEL', 'Tunai', 'Offline', 'Onsite', 'K002', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksigaji`
--

CREATE TABLE `transaksigaji` (
  `id` int(11) NOT NULL,
  `namaKaryawan` varchar(255) NOT NULL,
  `tanggalPenggajian` date NOT NULL,
  `upahGaji` int(11) NOT NULL,
  `statusPembayaran` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `fullname` varchar(255) NOT NULL DEFAULT 'Anonymous',
  `user_image` varchar(255) NOT NULL DEFAULT 'admin.png',
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `fullname`, `user_image`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'daniel@gmail.com', 'pemilik', 'Pemilik', '1655910542_91bb8f8ccc55ddb7d3bb.png', '$2y$10$kNaMu5fVo5wSMVWczTfLleP/Mgfof13M.sniD5eqwrMlXr3mp4Eb6', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-10-13 23:04:49', '2021-10-13 23:04:49', NULL),
(5, 'camelia@gmail.com', 'camelia', 'Camelia', '1639606491_ebfa0ac70b61dd4e65e2.png', '$2y$10$JTUGI/8WNC06hZbgFb2vdOyNFCsyLi9ABZDHlyvaXHFh8/2qStZKO', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-11-01 03:51:51', '2021-11-01 03:51:51', NULL),
(6, 'vieska@gmail.com', 'vieska', 'vieska', '1639606526_a41e17a19997721ae918.png', '$2y$10$Eoe8KGDum4tOPvdzm0Dv2.7pWLZa5wdM/htX2QLexNBEESRNOKw/y', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-12-09 15:02:34', '2021-12-09 15:02:34', NULL),
(7, 'customer@gmail.com', 'customer', 'Customer', 'admin.png', '$2y$10$zBHejFXh2.NneVEcrKQOQOYtMTu7n9cJJKXTHSlkCC/Bpx4YcKyTm', NULL, NULL, NULL, '8bf5056a6b2375cbe931adbe2a75e97a', NULL, NULL, 1, 0, '2022-07-13 02:07:47', '2022-07-13 02:07:47', NULL),
(9, 'yuyun@gmail.com', 'customer1', 'Lulu Widayanti', 'admin.png', '$2y$10$XQMYI8JC5je/AwbqreODO.IYxAtmJAMYXHjnunkFk00Rl6904NJAS', NULL, NULL, NULL, '1f9321a72247e358958656190a5c91f9', NULL, NULL, 1, 0, '2022-07-13 02:23:13', '2022-07-13 02:23:13', NULL),
(10, 'customer3@gmail.com', 'customer3', 'Anonymous', 'admin.png', '$2y$10$VQFaKE5ssy7cC7T8FBV45uDm54sNMQ77QSqnrPl.za/tqIqUlZxhO', NULL, NULL, NULL, 'f211a0421e3894caa2944c008e29d1e7', NULL, NULL, 0, 0, '2022-07-13 03:01:11', '2022-07-13 03:01:11', NULL),
(11, 'customer4@gmail.com', 'customer4', 'Anonymous', 'admin.png', '$2y$10$CC/VhN4rPba6QfE2HC/pvewtz4GRXMIAG/XJWYQ/t2ATwSKus5GRO', NULL, NULL, NULL, 'b06363616a41ecb27910948650632e40', NULL, NULL, 0, 0, '2022-07-13 03:02:56', '2022-07-13 03:02:56', NULL),
(12, 'customer5@gmail.com', 'customer5', 'Please Update Your Full Name', 'admin.png', '$2y$10$/MSAILfiG4sljCzIuK5jyOyIY511U6Sjc1O/myKP9WIaAQ0M8CBIq', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-07-13 03:06:29', '2022-07-13 03:06:29', NULL),
(13, 'dimas@gmail.com', 'Dimas ', 'Dimas', 'admin.png', '$2y$10$LhrYHbd57QQIWA61hk7lq.V.hrCR27tD0q.DuqR4fr6QBo0ghN8Pm', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-07-21 12:55:51', '2022-07-21 12:55:51', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `waktuabsensi`
--

CREATE TABLE `waktuabsensi` (
  `id` int(11) NOT NULL,
  `waktuAbsen` time DEFAULT NULL,
  `tanggalAbsen` date DEFAULT NULL,
  `idKaryawan` varchar(500) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `waktuabsensi`
--

INSERT INTO `waktuabsensi` (`id`, `waktuAbsen`, `tanggalAbsen`, `idKaryawan`, `keterangan`) VALUES
(1, NULL, NULL, 'K001', NULL),
(2, '04:59:03', '2021-12-16', 'K001', 'Hadir'),
(3, NULL, NULL, 'K002', NULL),
(4, '05:00:04', '2021-12-16', 'K002', 'Izin'),
(5, '01:06:25', '2021-12-21', 'K001', 'Hadir'),
(6, '01:22:49', '2021-12-21', 'K002', 'Hadir'),
(7, '07:00:00', '2022-06-18', 'K001', 'Hadir'),
(8, '00:00:00', '2022-06-18', 'K002', 'Izin'),
(9, '00:00:00', '2022-07-13', 'K001', 'Hadir'),
(10, '00:00:00', '2022-07-13', 'K002', 'Hadir'),
(11, NULL, NULL, 'K003', NULL),
(12, '00:00:00', '2022-07-13', 'K003', 'Hadir'),
(13, NULL, NULL, 'K004', NULL),
(14, NULL, NULL, 'K005', NULL),
(15, NULL, NULL, 'K006', NULL),
(16, '00:00:00', '2022-07-21', 'K001', 'Hadir'),
(17, '00:00:00', '2022-07-21', 'K002', 'Hadir'),
(18, NULL, NULL, 'K007', NULL),
(19, NULL, NULL, 'K008', NULL),
(20, '00:00:00', '2022-07-27', 'K001', 'Hadir'),
(21, '00:00:00', '2022-07-27', 'K002', 'Hadir'),
(22, '00:00:00', '2022-07-27', 'K003', 'Hadir'),
(23, '00:00:00', '2022-07-27', 'K004', 'Absen');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absenkaryawan`
--
ALTER TABLE `absenkaryawan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idKaryawan` (`idKaryawan`);

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indeks untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indeks untuk tabel `dataaset`
--
ALTER TABLE `dataaset`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `databahan`
--
ALTER TABLE `databahan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `databeban`
--
ALTER TABLE `databeban`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `datakelolaadmin`
--
ALTER TABLE `datakelolaadmin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kodetransaksi` (`kodetransaksi`);

--
-- Indeks untuk tabel `datakelolaaset`
--
ALTER TABLE `datakelolaaset`
  ADD PRIMARY KEY (`id`),
  ADD KEY `akun` (`akun`);

--
-- Indeks untuk tabel `datakelolabahan`
--
ALTER TABLE `datakelolabahan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPeralatan` (`idPeralatan`);

--
-- Indeks untuk tabel `datakelolabeban`
--
ALTER TABLE `datakelolabeban`
  ADD PRIMARY KEY (`id`),
  ADD KEY `akun` (`akun`);

--
-- Indeks untuk tabel `datakelolaservice`
--
ALTER TABLE `datakelolaservice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kodetransaksi` (`kodetransaksi`);

--
-- Indeks untuk tabel `datakelolatransaksilainnya`
--
ALTER TABLE `datakelolatransaksilainnya`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `datatransaksi`
--
ALTER TABLE `datatransaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `datatransaksilainnya`
--
ALTER TABLE `datatransaksilainnya`
  ADD PRIMARY KEY (`id`),
  ADD KEY `akun` (`akun`);

--
-- Indeks untuk tabel `datatransaksiservice`
--
ALTER TABLE `datatransaksiservice`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gajikaryawan`
--
ALTER TABLE `gajikaryawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenisbeban`
--
ALTER TABLE `jenisbeban`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenisservice`
--
ALTER TABLE `jenisservice`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenistransaksilainnya`
--
ALTER TABLE `jenistransaksilainnya`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kodetransaksi` (`kodetransaksi`);

--
-- Indeks untuk tabel `pembayaranaset`
--
ALTER TABLE `pembayaranaset`
  ADD PRIMARY KEY (`id`),
  ADD KEY `akun` (`akun`);

--
-- Indeks untuk tabel `pembayaranbahan`
--
ALTER TABLE `pembayaranbahan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPeralatan` (`idPeralatan`);

--
-- Indeks untuk tabel `pembayaranbeban`
--
ALTER TABLE `pembayaranbeban`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaranservice`
--
ALTER TABLE `pembayaranservice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kodetransaksi` (`kodetransaksi`);

--
-- Indeks untuk tabel `pembayarantransaksilainnya`
--
ALTER TABLE `pembayarantransaksilainnya`
  ADD PRIMARY KEY (`id`),
  ADD KEY `akun` (`akun`);

--
-- Indeks untuk tabel `pengambilanstock`
--
ALTER TABLE `pengambilanstock`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_aset`
--
ALTER TABLE `tb_aset`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_bayar`
--
ALTER TABLE `tb_bayar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_detail_pengeluaran_aset`
--
ALTER TABLE `tb_detail_pengeluaran_aset`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_detail_service`
--
ALTER TABLE `tb_detail_service`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_jurnal`
--
ALTER TABLE `tb_jurnal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_penggajian`
--
ALTER TABLE `tb_penggajian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_satuan`
--
ALTER TABLE `tb_satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_stok`
--
ALTER TABLE `tb_stok`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_transaksi_service`
--
ALTER TABLE `tb_transaksi_service`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksigaji`
--
ALTER TABLE `transaksigaji`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `waktuabsensi`
--
ALTER TABLE `waktuabsensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idKaryawan` (`idKaryawan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absenkaryawan`
--
ALTER TABLE `absenkaryawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=355;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `dataaset`
--
ALTER TABLE `dataaset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `databahan`
--
ALTER TABLE `databahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `databeban`
--
ALTER TABLE `databeban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `datakelolaadmin`
--
ALTER TABLE `datakelolaadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `datakelolaaset`
--
ALTER TABLE `datakelolaaset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `datakelolabahan`
--
ALTER TABLE `datakelolabahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `datakelolabeban`
--
ALTER TABLE `datakelolabeban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `datakelolaservice`
--
ALTER TABLE `datakelolaservice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `datakelolatransaksilainnya`
--
ALTER TABLE `datakelolatransaksilainnya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `datatransaksi`
--
ALTER TABLE `datatransaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `datatransaksilainnya`
--
ALTER TABLE `datatransaksilainnya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `datatransaksiservice`
--
ALTER TABLE `datatransaksiservice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `gajikaryawan`
--
ALTER TABLE `gajikaryawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jenisbeban`
--
ALTER TABLE `jenisbeban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jenisservice`
--
ALTER TABLE `jenisservice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jenistransaksilainnya`
--
ALTER TABLE `jenistransaksilainnya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pembayaranaset`
--
ALTER TABLE `pembayaranaset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pembayaranbahan`
--
ALTER TABLE `pembayaranbahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pembayaranbeban`
--
ALTER TABLE `pembayaranbeban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `pembayaranservice`
--
ALTER TABLE `pembayaranservice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pembayarantransaksilainnya`
--
ALTER TABLE `pembayarantransaksilainnya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pengambilanstock`
--
ALTER TABLE `pengambilanstock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_aset`
--
ALTER TABLE `tb_aset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_bayar`
--
ALTER TABLE `tb_bayar`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tb_detail_pengeluaran_aset`
--
ALTER TABLE `tb_detail_pengeluaran_aset`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_detail_service`
--
ALTER TABLE `tb_detail_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_jurnal`
--
ALTER TABLE `tb_jurnal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_penggajian`
--
ALTER TABLE `tb_penggajian`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_satuan`
--
ALTER TABLE `tb_satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_stok`
--
ALTER TABLE `tb_stok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi_service`
--
ALTER TABLE `tb_transaksi_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `transaksigaji`
--
ALTER TABLE `transaksigaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `waktuabsensi`
--
ALTER TABLE `waktuabsensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
