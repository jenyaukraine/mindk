/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50624
Source Host           : localhost:3306
Source Database       : stud

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2015-09-25 14:24:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `students`
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(255) DEFAULT NULL,
  `surname` char(255) DEFAULT NULL,
  `email` char(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of students
-- ----------------------------
INSERT INTO `students` VALUES ('1', 'Tomas', 'Hugh', 'Tomas@hotmail.com');
INSERT INTO `students` VALUES ('16', 'Daniel', 'Foreach', 'bad_daniel@mail.ru');
INSERT INTO `students` VALUES ('17', 'Dead', 'Kenny', 'dead_kenny_loves_revo@ukr.net');
INSERT INTO `students` VALUES ('18', 'Porchy', 'Vieira', 'impimp@fox.com');
