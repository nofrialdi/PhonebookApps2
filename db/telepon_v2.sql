-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.34-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for telepon
CREATE DATABASE IF NOT EXISTS `telepon` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `telepon`;

-- Dumping structure for table telepon.tbl_user
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `ID` int(11) NOT NULL,
  `Username` varchar(15) NOT NULL,
  `Password` text NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table telepon.tbl_user: 1 rows
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` (`ID`, `Username`, `Password`, `Email`) VALUES
	(1, 'admin', 'd82494f05d6917ba02f7aaa29689ccb444bb73f20380876cb05d1f37537b7892', 'admin@gmail.com');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;

-- Dumping structure for table telepon.telepon
CREATE TABLE IF NOT EXISTS `telepon` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `Nama` varchar(255) DEFAULT NULL,
  `Foto` varchar(255) DEFAULT NULL,
  `Pangkat` varchar(255) DEFAULT NULL,
  `Jabatan` varchar(255) DEFAULT NULL,
  `Agama` varchar(255) DEFAULT NULL,
  `Alamat` varchar(255) DEFAULT NULL,
  `Telepon` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table telepon.telepon: ~20 rows (approximately)
/*!40000 ALTER TABLE `telepon` DISABLE KEYS */;
INSERT INTO `telepon` (`id`, `Nama`, `Foto`, `Pangkat`, `Jabatan`, `Agama`, `Alamat`, `Telepon`, `Email`) VALUES
	(1, 'Nono Suharsono', '', 'Mayjen TNI', 'Koorsahli Panglima TNI', 'Islam', 'Perumahan permata Palem blok F No 22-23 jl. Kayu Manis Kel. Ciri Mekar Kec Cibinong Kab Bogor Jawa barat', '08112221117', NULL),
	(2, 'Harhar sucharyana', '', 'Mayjen  TNI (Mar)', 'Pa Sahli Tk-III bid. Polkamnas', 'Hindu', 'Komplek AL Blok A 4/5 Ciangsan Bogor', '08122816548', NULL),
	(3, 'Denny R.I Masengi', '', 'Brigjen TNI ', 'Pa Sahli Tk-IIbid. Poldagri Sahli Bid. PolkamnasPanglima TNI', 'Islam', 'Grand Mutiara 1 Blok A-52 Jl. Rawa Dolar Jati ranggon Bekasi', '081321548011', NULL),
	(4, 'Donny Ricky PEACK Makamminan', '', 'Brigjen TNI ', 'Pa Sahli Tk-II Kamterror Sahli Bid. Polkamnas Panglima TNI', 'kristen Protestan', 'Jl.kayu putih utara Rt 012 Rw 03 ', '08168686667', NULL),
	(5, 'Bambang Priyangbodo', '', 'Laksma TNI ', 'Pa Sahli Tk-II Kamkonf Komunal sahli  Bid Polkamnas Panglima TNI', 'Islam', 'Komplek AL Blok A 4/5 Ciangsan Bogor', '082110889588', NULL),
	(6, 'Arif S.E. M.M. ', 'upload/images/7523-2019-10-21.png', 'Kolonel Inf ', 'Pa but Poldagri Sahli Bidang Polkamnas Paanglima TNI', 'Islam', 'Jl Bawang Merah II No. 06 KPAD Cibubur Jakarta Timur ', '0218775403', ''),
	(7, 'Us Yusmana S.I.P. MSI', '', 'Kolonel Inf ', 'PA but Kamteror Sahli Bidang polkamnas Panglima TNI ', 'islam', 'Jl terjun Tandon No.57 RT/rw 3101 Cisaranten Arcamani Bandung', '08121083062', NULL),
	(8, 'Agus M Bahron', '', 'Kolonel lek', 'Pa But KamKonf Kominal Sahli Bid Polkamnas Panglima TNI', 'Islam', 'Jl. Cendra Wasih 8 G/ B 4 Halim Pk Jaktim', '081287168175', NULL),
	(9, 'Madsuni S.E. ', '', 'Mayjen TNI', 'Pa Sahli TK-III Bid Komsos Panglima TNI', 'Islam', 'Perum KPAD Cijantung II Jl Flamboyan Blok F No-20 Jaktim', '0811751188', NULL),
	(10, 'Syahruddin ', '', 'Brigjen TNI ', 'Pa Sahli TK-III Bid Komsos Panglima TNI', 'Islam', 'Komplek Perum Batu Jati II/17 ds Paku Tandan Ciparay Bandung', '0821190685865', NULL),
	(11, 'Kuswara Harja', '', 'Kolonel Cpl', 'Pabut Komosos Sahli Bid. Komsos Panglima TNI', 'Islam', 'Perum Radians Villa Blok A No.44 Rt.009/002 Jatiranggon Bekasi', '0817147996', NULL),
	(12, 'Ibnu triwidodo S.Ip', '', 'Mayjen TNI', 'PaSahli Tk.III Bid. Intek mil dan siber Panglima TNI', 'Islam', 'Komp. KPAD cijantung 2 JL. Bougenvile No.10 RT.003/004 Jaktim', '08129975999', NULL),
	(13, 'Benny Okotaviar M.D.A', '', 'Brigjen TNI', 'PaSahli Tk.II Bid. Intek mil dan siber Panglima TNI', 'Islam', 'Jl.Wolo tigo tengah No.2 semarang', '081378084101', NULL),
	(14, 'Harry Widodo', '', 'Marsma TNI', 'PaSahli Tk.II Bid. Intek mil dan siber Panglima TNI', 'Islam', 'Jl.Rajawali Raya No.10 Lanud Halim Perdanakusuma Jaktim', '0816404752', NULL),
	(15, 'Hendro Cahyono', '', 'Kolonel INF', 'Pabut intekmil Sahli Bid Intekmil dan siber Panglima TNI', 'Islam', 'Jl.Bougenvile No.38 Komp.Kodam Jatiwarna Bekasi', '08125007018', NULL),
	(16, 'Sahal Maaruf', '', 'Kolonel INF', 'Pabut Siber Sahli Bid Intekmil dan siber Panglima TNI', 'Islam', 'KPAD Pindad Selatan NO.7A.Bandung', '082238103277', NULL),
	(17, 'Wuryanto S.Sos. M.Si', '', 'Mayjen TNI', 'Pasahli Tk.III Bid Jahpers Panglima TNI', 'Islam', 'komp pati mabes tni jl.melati raya no.24 Bekasi', '082199698886', NULL),
	(18, 'Dadang Taufik Kardian S.Si', '', 'Marsma TNI', 'Pasahli Tk.II Bid jahpers Panglima TNI', 'Islam', 'Jl. Dwikora Raya No.38 Komp. Dwikora halim Jaktim', '0812333485', NULL),
	(19, 'Andi Darmawangsa', '', 'Kolonel Kav', 'Pabud Jahpers sahli bid jahpers panglima TNI', 'Islam', 'Jl. Gotong royong No.46 rt.005/006 Cipayung', '08127824088', NULL),
	(20, 'Ahmad Riyad S.Ip', '', 'Brigjen TNI', 'Pasahli Tk.II Was eropa dan AS sahli bid hubin panglima TNI', 'Islam', 'Perum Citra Grand Blok M No.3 Boulevard Bekasi', '081284582777', NULL);
/*!40000 ALTER TABLE `telepon` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
