/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : wechat

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-07-01 00:23:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for chou
-- ----------------------------
DROP TABLE IF EXISTS `chou`;
CREATE TABLE `chou` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(255) DEFAULT NULL,
  `nums` int(5) DEFAULT NULL,
  `scription` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chou
-- ----------------------------
INSERT INTO `chou` VALUES ('1', 'oZkauxEOQcTchD7sLoNNhbfvYt9Y', '78', '');
INSERT INTO `chou` VALUES ('3', 'oZkauxKBX-m1PUkzmbPpAVFp1-xY', '3', '');
INSERT INTO `chou` VALUES ('4', 'oZkauxEOQcTchD7sLoNNhbfvYt9Y', '3', '');

-- ----------------------------
-- Table structure for position
-- ----------------------------
DROP TABLE IF EXISTS `position`;
CREATE TABLE `position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(255) DEFAULT NULL,
  `Latitude` varchar(255) DEFAULT NULL,
  `Longitude` varchar(255) DEFAULT NULL,
  `time` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of position
-- ----------------------------
INSERT INTO `position` VALUES ('1', 'oZkauxEOQcTchD7sLoNNhbfvYt9Y', '28.186159', '113.081841', null);
INSERT INTO `position` VALUES ('2', 'oZkauxEOQcTchD7sLoNNhbfvYt9Y', '28.185631', '113.081909', null);
INSERT INTO `position` VALUES ('3', 'oZkauxEOQcTchD7sLoNNhbfvYt9Y', '113.081818', '28.186201', '1498575129');
INSERT INTO `position` VALUES ('4', 'oZkauxEOQcTchD7sLoNNhbfvYt9Y', '113.082130', '28.185221', '1498576213');
INSERT INTO `position` VALUES ('5', 'oZkauxEOQcTchD7sLoNNhbfvYt9Y', '113.079903', '28.185129', '1498615446');
INSERT INTO `position` VALUES ('6', 'oZkauxEOQcTchD7sLoNNhbfvYt9Y', '113.084160', '28.185450', '1498622144');
INSERT INTO `position` VALUES ('7', 'oZkauxEOQcTchD7sLoNNhbfvYt9Y', '113.055466', '28.264965', '1498650398');
INSERT INTO `position` VALUES ('8', 'oZkauxEOQcTchD7sLoNNhbfvYt9Y', '113.055641', '28.263275', '1498650408');
INSERT INTO `position` VALUES ('9', 'oZkauxEOQcTchD7sLoNNhbfvYt9Y', '112.973351', '28.193668', '1498696342');
INSERT INTO `position` VALUES ('10', 'oZkauxEOQcTchD7sLoNNhbfvYt9Y', '112.973351', '28.190353', '1498717984');
INSERT INTO `position` VALUES ('11', 'oZkauxEOQcTchD7sLoNNhbfvYt9Y', '113.082130', '28.185221', '1498753694');
INSERT INTO `position` VALUES ('12', 'oZkauxEOQcTchD7sLoNNhbfvYt9Y', '113.082130', '28.185221', '1498754736');

-- ----------------------------
-- Table structure for text
-- ----------------------------
DROP TABLE IF EXISTS `text`;
CREATE TABLE `text` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(255) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of text
-- ----------------------------
INSERT INTO `text` VALUES ('1', 'oZkauxEOQcTchD7sLoNNhbfvYt9Y', '你是最帅的');
INSERT INTO `text` VALUES ('2', 'oZkauxEOQcTchD7sLoNNhbfvYt9Y', '我最帅');
INSERT INTO `text` VALUES ('3', 'oZkauxEOQcTchD7sLoNNhbfvYt9Y', '你是睡');
INSERT INTO `text` VALUES ('4', 'oZkauxEOQcTchD7sLoNNhbfvYt9Y', '你是睡');
INSERT INTO `text` VALUES ('5', 'oZkauxEOQcTchD7sLoNNhbfvYt9Y', '你妹的');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(255) DEFAULT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `sex` int(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `headimgurl` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('26', 'oZkauxKBX-m1PUkzmbPpAVFp1-xY', 'shuaizi', '2', '', '奥地利', '克恩顿', 'http://wx.qlogo.cn/mmopen/qnJ7v1I7cAjjOSMpnuWBtQbLMPKCDK2Gtm0ibEn6pSbawZvcJiaWqLibxBuyl792RfictKGfSADwFUCpdSCX74rZF6JniaQ1mbxLS/0');
