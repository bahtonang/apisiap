/*
 Navicat Premium Data Transfer

 Source Server         : 321
 Source Server Type    : MariaDB
 Source Server Version : 100329
 Source Host           : 192.168.32.1:3306
 Source Schema         : dbsiap

 Target Server Type    : MariaDB
 Target Server Version : 100329
 File Encoding         : 65001

 Date: 29/09/2023 16:31:00
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for lokasi
-- ----------------------------
DROP TABLE IF EXISTS `lokasi`;
CREATE TABLE `lokasi`  (
  `id` int(4) NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '',
  `gedung` varchar(4) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lokasi
-- ----------------------------
INSERT INTO `lokasi` VALUES (1, 'Sewing Line-01 ', 'STL1');
INSERT INTO `lokasi` VALUES (2, 'Sewing Line-02', 'STL1');
INSERT INTO `lokasi` VALUES (3, 'Sewing Line-03', 'STL1');
INSERT INTO `lokasi` VALUES (4, 'Sewing Line-04', 'STL1');
INSERT INTO `lokasi` VALUES (5, 'Sewing Line-20', 'STL2');
INSERT INTO `lokasi` VALUES (6, 'Sewing Line-22', 'STL2');
INSERT INTO `lokasi` VALUES (7, 'Sewing Line-11', 'STL2');
INSERT INTO `lokasi` VALUES (8, 'Sewing Line-11', 'STL3');
INSERT INTO `lokasi` VALUES (9, 'Sewing Line-19', 'STL3');

-- ----------------------------
-- Table structure for personal
-- ----------------------------
DROP TABLE IF EXISTS `personal`;
CREATE TABLE `personal`  (
  `pid` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `password` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `kodebagian` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '',
  `bagian` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `gedung` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `statusstaf` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`pid`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal
-- ----------------------------
INSERT INTO `personal` VALUES ('SF1211', 'Wardiono', NULL, 'MKS', 'Mekanik Sewing', 'STL3', 'T');
INSERT INTO `personal` VALUES ('SF1217', 'Marjuki', NULL, 'MKS', 'Mekanik Sewing', 'STL1', 'T');
INSERT INTO `personal` VALUES ('SF1231', 'Noprianus Sujhono', NULL, 'MKS', 'Mekanik Sewing', 'STL3', 'T');
INSERT INTO `personal` VALUES ('SF1234', 'Tio Pasuko', NULL, 'MKS', 'Mekanik Sewing', 'STL1', 'T');
INSERT INTO `personal` VALUES ('SF1236', 'Wahyu Nugroho', NULL, 'MKS', 'Mekanik Sewing', 'STL1', 'T');
INSERT INTO `personal` VALUES ('SF1238', 'David Setiawan', NULL, 'MKS', 'Mekanik Sewing', 'STL2', 'T');
INSERT INTO `personal` VALUES ('SF1239', 'Sulistino', NULL, 'MKS', 'Mekanik Sewing', 'STL2', 'T');
INSERT INTO `personal` VALUES ('SF13771', 'Yanto', '1234', 'SP', 'SPV', 'STL1', 'F');
INSERT INTO `personal` VALUES ('SF13773', 'John Traf', '1234', 'SPV', 'Mekanik Listrik', 'STL2', 'F');
INSERT INTO `personal` VALUES ('SF13774', 'Maya', '1234', 'CS', 'Chief Sewing', 'STL1', 'F');

-- ----------------------------
-- Table structure for tickets
-- ----------------------------
DROP TABLE IF EXISTS `tickets`;
CREATE TABLE `tickets`  (
  `notiket` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tgl` datetime(0) DEFAULT NULL,
  `kodebarang` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `namabarang` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `keluhan` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `lokasi` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `pengirim` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `teknisi` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `mulai` datetime(0) DEFAULT NULL,
  `selesai` datetime(0) DEFAULT NULL,
  `statustiket` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `baca` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `tutup` datetime(0) DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`notiket`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tickets
-- ----------------------------
INSERT INTO `tickets` VALUES ('MKS20230929042921', '2023-09-29 04:29:21', 'GLD054056', 'Mesin Jarum1', 'Tidak Bisa Jahit', 'Sewing Line-12', 'Juminten', 'Murdiono', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tickets` VALUES ('MKS20230929043046', '2023-09-29 04:30:46', 'GLD054056', 'Mesin Jarum1', 'Tidak Bisa Jahit', 'Sewing Line-12', 'Juminten', 'Murdiono', NULL, NULL, 'antri', NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
