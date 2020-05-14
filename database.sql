/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : rguvote

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-05-14 19:43:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for administrators
-- ----------------------------
DROP TABLE IF EXISTS `administrators`;
CREATE TABLE `administrators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT '',
  `email` varchar(255) DEFAULT '',
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of administrators
-- ----------------------------
INSERT INTO `administrators` VALUES ('2', '2000916', 'Adeniji Charles Ayod', 'adenijiayocharles@gmail.com', '$2y$10$cS6nxoGO6NBVkwxl4zimzOPcb4wMoPykDK7zhh/fqAsdjsRukoswy', 'superadmin', '2020-05-14 19:05:22');

-- ----------------------------
-- Table structure for nominees
-- ----------------------------
DROP TABLE IF EXISTS `nominees`;
CREATE TABLE `nominees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `school` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `ethnicity` varchar(255) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `manifesto` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT '',
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of nominees
-- ----------------------------
INSERT INTO `nominees` VALUES ('3', '34343', 'Adeniji Charles', '400', 'CSDM', 'Male', 'African', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i', 'charles_president.mp4', '1', 'charles_president.jpg', '2020-03-19 16:13:04');
INSERT INTO `nominees` VALUES ('4', '32323', 'Fredrick Horby', '400', 'ABS', 'Male', 'White', 'Hello, my name is Fredrick Hornby and I hope to become the 2020 \r\nPresident here at RGU. I believe that leadership comes from experience and\r\ndetermination and I have accumulated over 50 hours as the President\r\nof the Society for Petroleum Engineers. I ha', 'augustina_president.mp4', '1', 'augustina_president.JPG', '2020-05-14 18:39:15');
INSERT INTO `nominees` VALUES ('5', '223423', 'Omotayo Kelani', '500', 'Grays School of Art', 'Male', 'African', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i', 'sokunbi_president.mp4', '1', 'sokunmbi_president.jpg', '2020-03-19 16:31:46');
INSERT INTO `nominees` VALUES ('6', '3232323', 'Abimbola Oladipo', '500', 'Grays School of Art', 'Male', 'African', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i', 'obj_president.mp4', '1', 'obj_president.jpg', '2020-03-19 15:38:15');
INSERT INTO `nominees` VALUES ('7', '3434333', 'Olajide Taiwo', '400', 'School of Architecture', 'Male', 'African', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i', 'charles_vice_president.mp4', '2', 'charles_vice_president.jpg', '2020-03-19 16:26:06');
INSERT INTO `nominees` VALUES ('8', '656333', 'Leke Awonuga', '300', 'CDSM', 'Male', 'Hispanics', 'Hello Everyone, my name is Leke Awonuga. I am a Master\'s student at Robert\r\nGordon University, studying Information Technology. I will like you all to \r\nplease vote for me at the upcoming Student Union Government Elections.\r\nI am running for the office of', 'augustina_vice_president.mp4', '2', 'augustina_vice_president.jpg', '2020-05-14 18:48:30');
INSERT INTO `nominees` VALUES ('10', '23245111', 'Abimbola Oladipo', '500', 'Grays School of Art', 'Male', 'African', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i', 'obj_vice_president.mp4', '2', 'obj_vice_president.jpg', '2020-03-19 16:10:45');
INSERT INTO `nominees` VALUES ('12', '2220096', 'Adeniyi Temlasd', '400', 'agriculture', 'male', 'african', 'xdsdsds', '1. Valuable Resources.mp4', '4', '69173_482034271833_6111417_n.jpg', '2020-05-04 15:05:43');

-- ----------------------------
-- Table structure for positions
-- ----------------------------
DROP TABLE IF EXISTS `positions`;
CREATE TABLE `positions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of positions
-- ----------------------------
INSERT INTO `positions` VALUES ('1', 'President');
INSERT INTO `positions` VALUES ('2', 'Vice President');
INSERT INTO `positions` VALUES ('3', 'Secretary');
INSERT INTO `positions` VALUES ('4', 'Financial Secretary');
INSERT INTO `positions` VALUES ('12', 'Treasurer 6');

-- ----------------------------
-- Table structure for vote_status
-- ----------------------------
DROP TABLE IF EXISTS `vote_status`;
CREATE TABLE `vote_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of vote_status
-- ----------------------------
INSERT INTO `vote_status` VALUES ('11', '1');

-- ----------------------------
-- Table structure for voters
-- ----------------------------
DROP TABLE IF EXISTS `voters`;
CREATE TABLE `voters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `ethnicity` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of voters
-- ----------------------------
INSERT INTO `voters` VALUES ('1', '1913459', '$2y$10$N9Me5.C1Hae2DLmPiFiFfeIoszo2JsFp2e88oOFb4mAmKRb7EqSYO', 'Sokunbi', 'Idowu', '1913459@rgu.ac.uk', 'Postgraduate', 'Computing', 'Male', 'African', '2020-02-20 13:14:15');
INSERT INTO `voters` VALUES ('2', '2000916', '$2y$10$PN4CtY69Ouf8wwrRtBso2up.9aA.u6eHr1ion8sRxiNWA0A5L3Z8K', 'Adeniji', 'Charles', 'adenijiayocharles@gmail.com', 'Undergraduate', 'Agriculture', 'Female', 'Hispanics', '2020-05-14 12:47:38');

-- ----------------------------
-- Table structure for votes
-- ----------------------------
DROP TABLE IF EXISTS `votes`;
CREATE TABLE `votes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `nominee_id` int(11) DEFAULT NULL,
  `position_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of votes
-- ----------------------------
INSERT INTO `votes` VALUES ('4', '2000916', '4', '1', '2020-05-14 18:04:01');
