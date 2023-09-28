/*
Navicat MySQL Data Transfer

Source Server         : DBLOCAL
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : dbsiap

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2023-09-28 22:08:30
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `lokasi`
-- ----------------------------
DROP TABLE IF EXISTS `lokasi`;
CREATE TABLE `lokasi` (
  `id` int(4) NOT NULL,
  `nama` varchar(50) DEFAULT '',
  `gedung` varchar(4) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lokasi
-- ----------------------------
INSERT INTO `lokasi` VALUES ('1', 'Sewing Line-01 ', 'STL1');
INSERT INTO `lokasi` VALUES ('2', 'Sewing Line-02', 'STL1');
INSERT INTO `lokasi` VALUES ('3', 'Sewing Line-03', 'STL1');
INSERT INTO `lokasi` VALUES ('4', 'Sewing Line-04', 'STL1');
INSERT INTO `lokasi` VALUES ('5', 'Sewing Line-20', 'STL2');
INSERT INTO `lokasi` VALUES ('6', 'Sewing Line-22', 'STL2');
INSERT INTO `lokasi` VALUES ('7', 'Sewing Line-11', 'STL2');
INSERT INTO `lokasi` VALUES ('8', 'Sewing Line-11', 'STL3');
INSERT INTO `lokasi` VALUES ('9', 'Sewing Line-19', 'STL3');

-- ----------------------------
-- Table structure for `personal`
-- ----------------------------
DROP TABLE IF EXISTS `personal`;
CREATE TABLE `personal` (
  `pid` varchar(20) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `kodebagian` varchar(3) DEFAULT '',
  `bagian` varchar(50) DEFAULT NULL,
  `gedung` varchar(5) DEFAULT NULL,
  `statusstaf` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of personal
-- ----------------------------
INSERT INTO `personal` VALUES ('SF1211', 'Wardiono', null, 'MKS', 'Mekanik Sewing', 'STL3', 'T');
INSERT INTO `personal` VALUES ('SF1217', 'Marjuki', null, 'MKS', 'Mekanik Sewing', 'STL1', 'T');
INSERT INTO `personal` VALUES ('SF1231', 'Noprianus Sujhono', null, 'MKS', 'Mekanik Sewing', 'STL3', 'T');
INSERT INTO `personal` VALUES ('SF1234', 'Tio Pasuko', null, 'MKS', 'Mekanik Sewing', 'STL1', 'T');
INSERT INTO `personal` VALUES ('SF1236', 'Wahyu Nugroho', null, 'MKS', 'Mekanik Sewing', 'STL1', 'T');
INSERT INTO `personal` VALUES ('SF1238', 'David Setiawan', null, 'MKS', 'Mekanik Sewing', 'STL2', 'T');
INSERT INTO `personal` VALUES ('SF1239', 'Sulistino', null, 'MKS', 'Mekanik Sewing', 'STL2', 'T');
INSERT INTO `personal` VALUES ('SF13771', 'Yanto', '1234', 'SP', 'SPV', 'STL1', 'F');
INSERT INTO `personal` VALUES ('SF13773', 'John Traf', '1234', 'SPV', 'Mekanik Listrik', 'STL1', 'F');
INSERT INTO `personal` VALUES ('SF13774', 'Maya', '1234', 'CS', 'Chief Sewing', 'STL1', 'F');
