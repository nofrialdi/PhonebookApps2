/*
 Navicat Premium Data Transfer

 Source Server         : local_koneksi
 Source Server Type    : MySQL
 Source Server Version : 100108
 Source Host           : localhost:3306
 Source Schema         : telepon

 Target Server Type    : MySQL
 Target Server Version : 100108
 File Encoding         : 65001

 Date: 25/10/2019 18:32:43
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user`  (
  `ID` int(11) NOT NULL,
  `Username` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Password` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES (1, 'admin', 'd82494f05d6917ba02f7aaa29689ccb444bb73f20380876cb05d1f37537b7892', 'admin@gmail.com');

-- ----------------------------
-- Table structure for telepon
-- ----------------------------
DROP TABLE IF EXISTS `telepon`;
CREATE TABLE `telepon`  (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `Nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Foto` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Pangkat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Jabatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Agama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Telepon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of telepon
-- ----------------------------
INSERT INTO `telepon` VALUES (2, 'Harhar sucharyana', 'upload/images/9438-2019-10-17.jpg', 'Mayjen TNI (Mar)', 'Pa Sahli Tk-III bid. Polkamnas', 'Hindu', 'Komplek AL Blok A 4/5 Ciangsan Bogor', '08122816548', NULL);
INSERT INTO `telepon` VALUES (3, 'Denny R.I Masengi', 'upload/images/1674-2019-10-17.jpg', 'Brigjen TNI', 'Pa Sahli Tk-IIbid. Poldagri Sahli Bid. PolkamnasPanglima TNI', 'Islam', 'Grand Mutiara 1 Blok A-52 Jl. Rawa Dolar Jati ranggon Bekasi', '081321548011', NULL);
INSERT INTO `telepon` VALUES (4, 'Donny Ricky PEACK Makamminan', 'upload/images/3102-2019-10-17.jpg', 'Brigjen TNI', 'Pa Sahli Tk-II Kamterror Sahli Bid. Polkamnas Panglima TNI', 'kristen Protestan', 'Jl.kayu putih utara Rt 012 Rw 03', '08168686667', NULL);
INSERT INTO `telepon` VALUES (5, 'Bambang Priyangbodo', 'upload/images/no_image.jpg', 'Laksma TNI', 'Pa Sahli Tk-II Kamkonf Komunal sahli  Bid Polkamnas Panglima TNI', 'Islam', 'Komplek AL Blok A 4/5 Ciangsan Bogor', '082110889588', NULL);
INSERT INTO `telepon` VALUES (6, 'Arif S.E. M.M.', 'upload/images/no_image.jpg', 'Kolonel Inf', 'Pa but Poldagri Sahli Bidang Polkamnas Paanglima TNI', 'Islam', 'Jl Bawang Merah II No. 06 KPAD Cibubur Jakarta Timur', '0218775403', NULL);
INSERT INTO `telepon` VALUES (7, 'Us Yusmana S.I.P. MSI', 'upload/images/no_image.jpg', 'Kolonel Inf', 'PA but Kamteror Sahli Bidang polkamnas Panglima TNI', 'islam', 'Jl terjun Tandon No.57 RT/rw 3101 Cisaranten Arcamani Bandung', '08121083062', NULL);
INSERT INTO `telepon` VALUES (8, 'Agus M Bahron', 'upload/images/no_image.jpg', 'Kolonel lek', 'Pa But KamKonf Kominal Sahli Bid Polkamnas Panglima TNI', 'Islam', 'Jl. Cendra Wasih 8 G/ B 4 Halim Pk Jaktim', '081287168175', NULL);
INSERT INTO `telepon` VALUES (9, 'Madsuni S.E.', 'upload/images/no_image.jpg', 'Mayjen TNI', 'Pa Sahli TK-III Bid Komsos Panglima TNI', 'Islam', 'Perum KPAD Cijantung II Jl Flamboyan Blok F No-20 Jaktim', '0811751188', NULL);
INSERT INTO `telepon` VALUES (10, 'Syahruddin', 'upload/images/no_image.jpg', 'Brigjen TNI', 'Pa Sahli TK-III Bid Komsos Panglima TNI', 'Islam', 'Komplek Perum Batu Jati II/17 ds Paku Tandan Ciparay Bandung', '0821190685865', NULL);
INSERT INTO `telepon` VALUES (11, 'Kuswara Harja', 'upload/images/no_image.jpg', 'Kolonel Cpl', 'Pabut Komosos Sahli Bid. Komsos Panglima TNI', 'Islam', 'Perum Radians Villa Blok A No.44 Rt.009/002 Jatiranggon Bekasi', '0817147996', NULL);
INSERT INTO `telepon` VALUES (12, 'Ibnu triwidodo S.Ip', 'upload/images/6288-2019-10-17.jpg', 'Mayjen TNI', 'PaSahli Tk.III Bid. Intek mil dan siber Panglima TNI', 'Islam ', 'Komp. KPAD cijantung 2 JL. Bougenvile No.10 RT.003/004 Jaktim ', '08129975999 ', NULL);
INSERT INTO `telepon` VALUES (13, 'Benny Okotaviar M.D.A', 'upload/images/no_image.jpg', 'Brigjen TNI', 'PaSahli Tk.II Bid. Intek mil dan siber Panglima TNI', 'Islam', 'Jl.Wolo tigo tengah No.2 semarang', '081378084101', NULL);
INSERT INTO `telepon` VALUES (14, 'Harry Widodo', 'upload/images/no_image.jpg', 'Marsma TNI', 'PaSahli Tk.II Bid. Intek mil dan siber Panglima TNI', 'Islam', 'l.Rajawali Raya No.10 Lanud Halim Perdanakusuma Jaktim', '0816404752', NULL);
INSERT INTO `telepon` VALUES (15, 'Hendro Cahyono', 'upload/images/no_image.jpg', 'Kolonel INF', 'Pabut intekmil Sahli Bid Intekmil dan siber Panglima TNI', 'Islam', 'Jl.Bougenvile No.38 Komp.Kodam Jatiwarna Bekasi', '08125007018', NULL);
INSERT INTO `telepon` VALUES (16, 'Sahal Maaruf', 'upload/images/no_image.jpg', 'Kolonel INF', 'Pabut Siber Sahli Bid Intekmil dan siber Panglima TNI', 'Islam', 'KPAD Pindad Selatan NO.7A.Bandung', '082238103277', NULL);
INSERT INTO `telepon` VALUES (17, 'Wuryanto S.Sos. M.Si', 'upload/images/no_image.jpg', 'Mayjen TNI', 'Pasahli Tk.III Bid Jahpers Panglima TNI', 'Islam', 'komp pati mabes tni jl.melati raya no.24 Bekasi', '082199698886', NULL);
INSERT INTO `telepon` VALUES (18, 'Dadang Taufik Kardian S.Si', 'upload/images/no_image.jpg', 'Marsma TNI', 'Pasahli Tk.II Bid jahpers Panglima TNI', 'Islam', 'Jl. Dwikora Raya No.38 Komp. Dwikora halim Jaktim', '0812333485', NULL);
INSERT INTO `telepon` VALUES (19, 'Andi Darmawangsa', 'upload/images/no_image.jpg', 'Kolonel Kav', 'Pabud Jahpers sahli bid jahpers panglima TNI', 'Islam', 'Jl. Gotong royong No.46 rt.005/006 Cipayung', '08127824088', NULL);
INSERT INTO `telepon` VALUES (20, 'Ahmad Riyad S.Ip', 'upload/images/no_image.jpg', 'Brigjen TNI', 'Pasahli Tk.II Was eropa dan AS sahli bid hubin panglima TNI', 'Islam', 'Perum Citra Grand Blok M No.3 Boulevard Bekasi', '081284582777', NULL);
INSERT INTO `telepon` VALUES (23, 'Nono Suharsono ', 'upload/images/Yoseph_M._Purba.jpg', 'Mayjen TNI ', 'Koorsahli Panglima TNI ', 'Islam', 'Perumahan permata Palem blok F No 22-23 jl. Kayu Manis Kel. Ciri Mekar Kec Cibinong Kab Bogor Jawa barat test', '08112221117', NULL);
INSERT INTO `telepon` VALUES (24, 'tes nama 2', 'upload/images/2127-2019-10-25.jpg', 'TEST pangkat 2', 'TEST jabatan 2', 'Islam', 'test alamat 2', 'TEST 2', 'test email 2');

SET FOREIGN_KEY_CHECKS = 1;
