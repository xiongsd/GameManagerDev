/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : game

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-05-19 05:29:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `biz_apply_audit`
-- ----------------------------
DROP TABLE IF EXISTS `biz_apply_audit`;
CREATE TABLE `biz_apply_audit` (
  `userid` int(11) NOT NULL,
  `audit_status` smallint(6) NOT NULL,
  `remark` varchar(100) DEFAULT NULL,
  `audit_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of biz_apply_audit
-- ----------------------------

-- ----------------------------
-- Table structure for `biz_trade`
-- ----------------------------
DROP TABLE IF EXISTS `biz_trade`;
CREATE TABLE `biz_trade` (
  `tradeid` int(11) NOT NULL AUTO_INCREMENT,
  `goodid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `from_game_id` varchar(50) NOT NULL,
  `to_game_id` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `expire_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`tradeid`),
  KEY `biz_trade_fk` (`goodid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of biz_trade
-- ----------------------------

-- ----------------------------
-- Table structure for `biz_trade_good`
-- ----------------------------
DROP TABLE IF EXISTS `biz_trade_good`;
CREATE TABLE `biz_trade_good` (
  `goodid` int(11) NOT NULL AUTO_INCREMENT,
  `goodname` varchar(100) NOT NULL,
  `sortno` varchar(3) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `expire_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`goodid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of biz_trade_good
-- ----------------------------

-- ----------------------------
-- Table structure for `biz_user_game`
-- ----------------------------
DROP TABLE IF EXISTS `biz_user_game`;
CREATE TABLE `biz_user_game` (
  `userid` int(11) NOT NULL,
  `gameid` varchar(30) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`userid`,`gameid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of biz_games
-- ----------------------------

-- ----------------------------
-- Table structure for `biz_games`
-- ----------------------------
DROP TABLE IF EXISTS `biz_games`;
CREATE TABLE `biz_games` (
  `gameid` int(11) NOT NULL,
  `gamename` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL,
  `avatar` blob NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`gameid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of biz_user_game
-- ----------------------------

-- ----------------------------
-- Table structure for `sec_users`
-- ----------------------------
DROP TABLE IF EXISTS `sec_users`;
CREATE TABLE `sec_users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `promocode` varchar(20) DEFAULT NULL,
  `sex` smallint(6) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `markid` varchar(100) NOT NULL,
  `introducer` varchar(50) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` smallint(6) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

