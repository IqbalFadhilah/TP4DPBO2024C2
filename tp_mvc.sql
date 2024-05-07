/*
 Navicat Premium Data Transfer

 Source Server         : db_YPMB
 Source Server Type    : MySQL
 Source Server Version : 100432 (10.4.32-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : tp_mvc

 Target Server Type    : MySQL
 Target Server Version : 100432 (10.4.32-MariaDB)
 File Encoding         : 65001

 Date: 07/05/2024 12:06:58
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for fanbase
-- ----------------------------
DROP TABLE IF EXISTS `fanbase`;
CREATE TABLE `fanbase`  (
  `id_fanbase` int NOT NULL AUTO_INCREMENT,
  `nama_fanbase` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_fanbase`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of fanbase
-- ----------------------------
INSERT INTO `fanbase` VALUES (1, 'MarshaOshi');
INSERT INTO `fanbase` VALUES (3, 'Olinever');
INSERT INTO `fanbase` VALUES (5, 'Jessination');

-- ----------------------------
-- Table structure for members
-- ----------------------------
DROP TABLE IF EXISTS `members`;
CREATE TABLE `members`  (
  `id_member` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `join_date` date NOT NULL,
  `fanbase` int NOT NULL,
  PRIMARY KEY (`id_member`) USING BTREE,
  INDEX `fk_fanbase`(`fanbase` ASC) USING BTREE,
  CONSTRAINT `fk_fanbase` FOREIGN KEY (`fanbase`) REFERENCES `fanbase` (`id_fanbase`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of members
-- ----------------------------
INSERT INTO `members` VALUES (5, 'JessicaChandra', 'jesii@gmail.com', '0858111111111', '2024-04-16', 5);

SET FOREIGN_KEY_CHECKS = 1;
