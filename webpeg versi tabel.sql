-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2016 at 05:07 PM
-- Server version: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webpeg`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `keluarga`
--

CREATE TABLE IF NOT EXISTS `keluarga` (
  `id_kel` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `tgl_lahir` varchar(10) NOT NULL,
  `tmpt_lahir` varchar(30) NOT NULL,
  `hub` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `keluarga`
--

INSERT INTO `keluarga` (`id_kel`, `nip`, `nama`, `jk`, `tgl_lahir`, `tmpt_lahir`, `hub`, `foto`) VALUES
(2, '95071775014946', 'Nurmi', 'P', '11/11/1960', 'Bangkinang', 'Ibu', '95071775014946&ibu.jpg'),
(7, '95071775014946', 'Rublis', 'L', '06/06/1958', 'Pekanbaru', 'Ayah', '95071775014946&Ayah.jpg'),
(8, '95071775014946', 'Nofrian', 'L', '05/11/2001', 'Pekanbaru', 'Adik', '95071775014946&Adik.jpg'),
(9, '76030920813822', 'Shinta Mal Mal', 'P', '', 'Aceh', 'Istri', '76030920813822&Istri.jpg'),
(10, '76030920813822', 'Ridho Gogol', 'L', '', 'Gorontalo', 'Anak', '76030920813822&Anak.jpg'),
(11, '76030920813822', 'Listy Moron', 'P', '', 'Marauke', 'Anak', '76030920813822&Anak&9225.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `agama` varchar(30) NOT NULL,
  `tgl_lahir` varchar(50) NOT NULL,
  `tmpt_lahir` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama`, `alamat`, `jk`, `agama`, `tgl_lahir`, `tmpt_lahir`, `foto`) VALUES
('76030920813822', 'Ali Suhairy', 'Jalan Pantau no 10', 'L', 'islam', '09/03/1976', 'Jakarta', '76030920813822.jpg'),
('8412316912044', 'Evy Anzalalu', 'Jalan Kordil no 90', 'P', 'islam', '31/12/1984', 'Banjarmasin', '8412316912044.jpg'),
('95071775014946', 'Jufianto Henri', '  Jalan Tanjung Batu No 110', 'L', 'Islam', '17/08/1995', 'Pekanbaru', '95071775014946.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
