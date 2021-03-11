-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27 Feb 2021 pada 05.51
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pform`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id_admin` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `name`, `email`, `username`, `password`, `created`) VALUES
(1, 'Muhammad Erlangga', 'erllanggaaa@gmail.com', 'erllanggaaa', '25f9e794323b453885f5181f1b624d0b', '2021-02-20 05:35:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
`id_customer` int(11) NOT NULL,
  `application` varchar(20) NOT NULL,
  `no` varchar(255) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `sales_channel` varchar(100) NOT NULL,
  `sales_person_name` varchar(100) NOT NULL,
  `sales_person_contact` varchar(100) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_id` varchar(20) NOT NULL,
  `customer_id_no` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact1` varchar(20) NOT NULL,
  `contact2` varchar(20) NOT NULL,
  `contact3` varchar(20) NOT NULL,
  `installation_address` text NOT NULL,
  `location` varchar(50) NOT NULL,
  `latitude_current` varchar(100) NOT NULL,
  `longitude_current` varchar(100) NOT NULL,
  `latitude_other` varchar(100) NOT NULL,
  `longitude_other` varchar(100) NOT NULL,
  `eform_no` varchar(50) NOT NULL,
  `segment` varchar(20) NOT NULL,
  `package` varchar(100) NOT NULL,
  `zbc` varchar(100) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `information_delete` text NOT NULL,
  `information_reject` text NOT NULL,
  `status_customer` varchar(20) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `application`, `no`, `project_name`, `sales_channel`, `sales_person_name`, `sales_person_contact`, `customer_name`, `customer_id`, `customer_id_no`, `email`, `contact1`, `contact2`, `contact3`, `installation_address`, `location`, `latitude_current`, `longitude_current`, `latitude_other`, `longitude_other`, `eform_no`, `segment`, `package`, `zbc`, `remarks`, `information_delete`, `information_reject`, `status_customer`, `created`) VALUES
(1, 'MTU', '12245326', 'Diubah', ' CITY SME', 'Siti', '088563216732', 'Nida', 'MYKAD', '123456-12-1234', 'nida@gmail.com', '0812378278311', '085647281414', '1232382189', 'Jl. H. Jum II', 'CURRENT ADDRESS', '-6.467124', '106.88712521', '', '', '5839515', 'BIZ', 'Unifi Biz 800Mbps RM349', 'KOTA KINABALU', '', '', '', 'Received', '2021-02-22 16:43:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `form`
--

CREATE TABLE IF NOT EXISTS `form` (
`id_form` int(11) NOT NULL,
  `header` varchar(100) NOT NULL,
  `head_modal` varchar(50) NOT NULL,
  `content_modal` text NOT NULL,
  `target_modal` varchar(100) NOT NULL,
  `number_wa_float` varchar(15) NOT NULL,
  `content_wa_float` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `form`
--

INSERT INTO `form` (`id_form`, `header`, `head_modal`, `content_modal`, `target_modal`, `number_wa_float`, `content_wa_float`) VALUES
(1, 'PRE SALES FORM SRR & BBF 2021 LABUAN', 'Info!', '<p>Halo</p>\r\n', 'http://facebook.com', '0895347399934', 'Saya mau order dong, caranya gimana ya?\r\nTerimakasih');

-- --------------------------------------------------------

--
-- Struktur dari tabel `package`
--

CREATE TABLE IF NOT EXISTS `package` (
`id_package` int(11) NOT NULL,
  `name_package` varchar(100) NOT NULL,
  `segment_package` varchar(50) NOT NULL,
  `status_package` varchar(50) NOT NULL,
  `name_file` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `package`
--

INSERT INTO `package` (`id_package`, `name_package`, `segment_package`, `status_package`, `name_file`) VALUES
(1, '30Mbps RM89', 'Consumer', 'active', 'package/a.jpg'),
(2, '100Mbps RM129', 'Consumer', 'active', 'package/b.jpg'),
(3, '300Mbps RM199', 'Consumer', 'active', 'package/c.jpg'),
(4, '500Mbps RM249', 'Consumer', 'active', 'package/d.jpg'),
(5, '800Mbps RM349', 'Consumer', 'active', 'package/e.jpg'),
(6, 'Unifi Biz 100Mbps RM139', 'Biz', 'active', 'package/f.jpg'),
(7, 'Unifi Biz 300Mbps RM249', 'Biz', 'active', 'package/g.jpg'),
(8, 'Unifi Biz 800Mbps RM349', 'Biz', 'active', 'package/h.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales_channel`
--

CREATE TABLE IF NOT EXISTS `sales_channel` (
`id_sales_channel` int(11) NOT NULL,
  `name_sales_channel` varchar(100) NOT NULL,
  `status_sales_channel` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `sales_channel`
--

INSERT INTO `sales_channel` (`id_sales_channel`, `name_sales_channel`, `status_sales_channel`) VALUES
(1, 'TM DIRECT SALES', 'active'),
(2, 'TM POINT', 'non active'),
(3, 'CITY SME', 'active'),
(4, 'MYBB', 'active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `web`
--

CREATE TABLE IF NOT EXISTS `web` (
`id_web` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `web`
--

INSERT INTO `web` (`id_web`, `title`, `logo`) VALUES
(1, 'HALLO', 'logo.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `zbc`
--

CREATE TABLE IF NOT EXISTS `zbc` (
`id_zbc` int(11) NOT NULL,
  `name_zbc` varchar(100) NOT NULL,
  `status_zbc` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `zbc`
--

INSERT INTO `zbc` (`id_zbc`, `name_zbc`, `status_zbc`) VALUES
(1, 'KOTA KINABALU', 'active'),
(2, 'LABUAN', 'active'),
(3, 'PBPU', 'active'),
(4, 'PBPS', 'active'),
(5, 'LAHAT DATU', 'active'),
(6, 'SANDAKAN', 'active'),
(7, 'TAWAU', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
 ADD PRIMARY KEY (`id_form`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
 ADD PRIMARY KEY (`id_package`);

--
-- Indexes for table `sales_channel`
--
ALTER TABLE `sales_channel`
 ADD PRIMARY KEY (`id_sales_channel`);

--
-- Indexes for table `web`
--
ALTER TABLE `web`
 ADD PRIMARY KEY (`id_web`);

--
-- Indexes for table `zbc`
--
ALTER TABLE `zbc`
 ADD PRIMARY KEY (`id_zbc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
MODIFY `id_package` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sales_channel`
--
ALTER TABLE `sales_channel`
MODIFY `id_sales_channel` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `web`
--
ALTER TABLE `web`
MODIFY `id_web` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `zbc`
--
ALTER TABLE `zbc`
MODIFY `id_zbc` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
