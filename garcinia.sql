/*
Navicat MySQL Data Transfer

Source Server         : Debasis
Source Server Version : 50516
Source Host           : 192.168.2.4:3306
Source Database       : garcinia

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2014-10-31 18:16:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `account_info`
-- ----------------------------
DROP TABLE IF EXISTS `account_info`;
CREATE TABLE `account_info` (
  `id` bigint(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of account_info
-- ----------------------------

-- ----------------------------
-- Table structure for `affiliate_per_click`
-- ----------------------------
DROP TABLE IF EXISTS `affiliate_per_click`;
CREATE TABLE `affiliate_per_click` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `affiliate_code` int(11) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL COMMENT '1=>home; 2=>landing page',
  `ip_address` varchar(255) DEFAULT NULL,
  `time` bigint(20) DEFAULT NULL,
  `cpc_rate` float(10,2) NOT NULL,
  `value` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of affiliate_per_click
-- ----------------------------
INSERT INTO `affiliate_per_click` VALUES ('6', '36', '1', '192.168.0.109', '1393929055', '0.00', '1');
INSERT INTO `affiliate_per_click` VALUES ('4', '43', '1', '192.168.0.109', '1393929055', '0.00', '1');
INSERT INTO `affiliate_per_click` VALUES ('7', '35', '1', '192.168.0.109', '1393931022', '0.00', '1');
INSERT INTO `affiliate_per_click` VALUES ('8', '35', '2', '192.168.0.109', '1393931048', '0.00', '1');
INSERT INTO `affiliate_per_click` VALUES ('9', '43', '1', '192.168.0.109', '1394023259', '13.75', '1');
INSERT INTO `affiliate_per_click` VALUES ('10', '48', '1', '192.168.0.109', '1394023342', '0.00', '1');
INSERT INTO `affiliate_per_click` VALUES ('11', '37', '1', '192.168.0.109', '1394023441', '0.00', '1');
INSERT INTO `affiliate_per_click` VALUES ('12', '37', '2', '192.168.0.109', '1394023610', '13.14', '1');
INSERT INTO `affiliate_per_click` VALUES ('13', '37', '1', '192.168.0.109', '1394024213', '13.14', '1');
INSERT INTO `affiliate_per_click` VALUES ('14', '43', '1', '192.168.0.112', '1394096778', '13.75', '1');
INSERT INTO `affiliate_per_click` VALUES ('15', '43', '1', '192.168.0.10', '1394099062', '13.75', '1');
INSERT INTO `affiliate_per_click` VALUES ('16', '43', '2', '192.168.0.10', '1394099819', '13.75', '1');
INSERT INTO `affiliate_per_click` VALUES ('17', '43', '1', '192.168.0.10', '1394099836', '13.75', '1');
INSERT INTO `affiliate_per_click` VALUES ('18', '43', '2', '192.168.0.10', '1394099886', '13.75', '1');
INSERT INTO `affiliate_per_click` VALUES ('19', '43', '1', '192.168.0.10', '1394099891', '13.75', '1');
INSERT INTO `affiliate_per_click` VALUES ('20', '43', '1', '192.168.0.10', '1394099943', '13.75', '1');
INSERT INTO `affiliate_per_click` VALUES ('21', '43', '1', '192.168.0.112', '1394100416', '13.75', '1');
INSERT INTO `affiliate_per_click` VALUES ('22', '43', '1', '192.168.0.10', '1394100511', '13.75', '1');
INSERT INTO `affiliate_per_click` VALUES ('23', '43', '1', '192.168.0.10', '1394100868', '13.75', '1');
INSERT INTO `affiliate_per_click` VALUES ('24', '43', '1', '192.168.0.10', '1394103442', '13.75', '1');
INSERT INTO `affiliate_per_click` VALUES ('25', '43', '1', '192.168.0.10', '1394103449', '13.75', '1');
INSERT INTO `affiliate_per_click` VALUES ('26', '43', '2', '192.168.0.10', '1394103467', '13.75', '1');
INSERT INTO `affiliate_per_click` VALUES ('27', '37', '1', '192.168.0.10', '1394110096', '13.14', '1');
INSERT INTO `affiliate_per_click` VALUES ('28', '43', '1', '192.168.0.106', '1394168752', '13.75', '1');
INSERT INTO `affiliate_per_click` VALUES ('29', '37', '1', '192.168.0.10', '1394169127', '13.14', '1');
INSERT INTO `affiliate_per_click` VALUES ('30', '37', '1', '192.168.0.10', '1394169213', '13.14', '1');
INSERT INTO `affiliate_per_click` VALUES ('31', '37', '1', '192.168.0.10', '1394169948', '13.14', '1');
INSERT INTO `affiliate_per_click` VALUES ('32', '43', '1', '192.168.0.106', '1394170416', '13.75', '1');
INSERT INTO `affiliate_per_click` VALUES ('33', '37', '1', '192.168.0.10', '1394170468', '13.14', '1');
INSERT INTO `affiliate_per_click` VALUES ('34', '37', '1', '192.168.0.10', '1394170533', '13.14', '1');
INSERT INTO `affiliate_per_click` VALUES ('35', '37', '1', '192.168.0.10', '1394173684', '13.14', '1');
INSERT INTO `affiliate_per_click` VALUES ('36', '43', '1', '192.168.0.106', '1394174485', '13.75', '1');
INSERT INTO `affiliate_per_click` VALUES ('37', '37', '1', '192.168.0.10', '1394187672', '13.14', '1');

-- ----------------------------
-- Table structure for `autoship_manage`
-- ----------------------------
DROP TABLE IF EXISTS `autoship_manage`;
CREATE TABLE `autoship_manage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` varchar(255) DEFAULT NULL,
  `autoship_response_code` varchar(255) DEFAULT NULL,
  `autoship_response_text` varchar(255) DEFAULT NULL,
  `amount` float(10,2) DEFAULT NULL,
  `totalOccurrences` int(11) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `sub_interval` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '1=>Active; 2=>Inacive',
  `cancel_date` varchar(255) DEFAULT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of autoship_manage
-- ----------------------------
INSERT INTO `autoship_manage` VALUES ('12', '2218953081', '', 'You have submitted a duplicate of Subscription 2222519. A duplicate subscription will not be created.', '34.98', '24', '10/05/2014', '1', '1', null, '6', 'Bring Your Sexy Back');
INSERT INTO `autoship_manage` VALUES ('13', '2218953207', '2222522', 'Successful.', '34.98', '24', '10/05/2014', '1', '1', null, '6', 'Bring Your Sexy Back');
INSERT INTO `autoship_manage` VALUES ('14', '2218953239', '2222524', 'Successful.', '59.98', '24', '10/05/2014', '1', '1', null, '7', 'Bring Your Sexy Back');
INSERT INTO `autoship_manage` VALUES ('15', '2218953491', '', 'You have submitted a duplicate of Subscription 2222522. A duplicate subscription will not be created.', '34.98', '24', '10/05/2014', '1', '1', null, '6', 'Bring Your Sexy Back');
INSERT INTO `autoship_manage` VALUES ('16', '2218954615', '', 'You have submitted a duplicate of Subscription 2222522. A duplicate subscription will not be created.', '34.98', '24', '10/05/2014', '1', '1', null, '6', 'Bring Your Sexy Back');
INSERT INTO `autoship_manage` VALUES ('17', '2218954990', '', 'You have submitted a duplicate of Subscription 2222522. A duplicate subscription will not be created.', '34.98', '24', '10/05/2014', '1', '1', null, '6', 'Bring Your Sexy Back<br>1 Bottle');
INSERT INTO `autoship_manage` VALUES ('18', '2218955212', '', 'You have submitted a duplicate of Subscription 2222522. A duplicate subscription will not be created.', '34.98', '24', '10/05/2014', '1', '1', null, '6', 'Bring Your Sexy Back<br>1 Bottle');
INSERT INTO `autoship_manage` VALUES ('19', '2218956034', '', 'You have submitted a duplicate of Subscription 2222522. A duplicate subscription will not be created.', '34.98', '24', '10/05/2014', '1', '1', null, '6', 'Bring Your Sexy Back<br>1 Bottle');
INSERT INTO `autoship_manage` VALUES ('20', '2219096952', '2223594', 'Successful.', '34.98', '24', '10/08/2014', '1', '1', null, '6', 'Bring Your Sexy Back<br>1 Bottle');
INSERT INTO `autoship_manage` VALUES ('21', '2219097020', '', 'You have submitted a duplicate of Subscription 2223594. A duplicate subscription will not be created.', '34.98', '24', '10/08/2014', '1', '1', null, '6', 'Bring Your Sexy Back<br>1 Bottle');
INSERT INTO `autoship_manage` VALUES ('22', '2219623140', '2229782', 'Successful.', '34.98', '24', '10/15/2014', '1', '1', null, '6', 'Bring Your Sexy Back<br>1 Bottle');
INSERT INTO `autoship_manage` VALUES ('23', '2219813244', '2231571', 'Successful.', '34.98', '24', '10/17/2014', '1', '1', null, '6', 'Bring Your Sexy Back<br>1 Bottle');
INSERT INTO `autoship_manage` VALUES ('24', '2221181530', '2234912', 'Successful.', '34.98', '24', '10/23/2014', '1', '1', null, '6', 'Bring Your Sexy Back<br>1 Bottle');
INSERT INTO `autoship_manage` VALUES ('25', '2221345685', '2237207', 'Successful.', '34.98', '24', '10/26/2014', '1', '1', null, '6', 'Bring Your Sexy Back<br>1 Bottle');

-- ----------------------------
-- Table structure for `banner`
-- ----------------------------
DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `banner_img` text,
  `pagename` text,
  `isactive` int(2) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of banner
-- ----------------------------
INSERT INTO `banner` VALUES ('6', '1409035150.png', 'home', '1', '1');
INSERT INTO `banner` VALUES ('7', '1409035168.png', 'home', '1', '2');
INSERT INTO `banner` VALUES ('8', '1409035187.png', 'home', '1', '3');
INSERT INTO `banner` VALUES ('9', '1409035206.png', 'home', '1', '4');
INSERT INTO `banner` VALUES ('10', '1409035222.png', 'home', '1', '5');
INSERT INTO `banner` VALUES ('11', '1409035239.png', 'home', '1', '6');
INSERT INTO `banner` VALUES ('12', '1409035259.png', 'home', '1', '7');
INSERT INTO `banner` VALUES ('13', '1409035275.png', 'home', '1', '8');
INSERT INTO `banner` VALUES ('14', '1409035275.png', 'home', '1', '9');
INSERT INTO `banner` VALUES ('15', '1409035315.png', 'home', '1', '10');

-- ----------------------------
-- Table structure for `blogcontent`
-- ----------------------------
DROP TABLE IF EXISTS `blogcontent`;
CREATE TABLE `blogcontent` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `blog_id` bigint(255) DEFAULT NULL,
  `content_type` text,
  `content_video_type` text,
  `content_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of blogcontent
-- ----------------------------

-- ----------------------------
-- Table structure for `blog_comment`
-- ----------------------------
DROP TABLE IF EXISTS `blog_comment`;
CREATE TABLE `blog_comment` (
  `id` bigint(255) NOT NULL DEFAULT '0',
  `user_id` bigint(255) DEFAULT NULL,
  `comment` varchar(200) DEFAULT NULL,
  `time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `email` varchar(200) DEFAULT NULL,
  `s_fname` varchar(50) DEFAULT NULL,
  `s_lname` varchar(50) DEFAULT NULL,
  `pr_title` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of blog_comment
-- ----------------------------

-- ----------------------------
-- Table structure for `catagory`
-- ----------------------------
DROP TABLE IF EXISTS `catagory`;
CREATE TABLE `catagory` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `categoryname` varchar(50) NOT NULL,
  `categorydesc` varchar(50) NOT NULL,
  `priority` int(11) NOT NULL,
  `parentcategoryid` bigint(255) NOT NULL,
  `isactive` int(2) DEFAULT '0',
  `isfeatured` int(2) NOT NULL DEFAULT '0',
  `createdon` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of catagory
-- ----------------------------
INSERT INTO `catagory` VALUES ('4', 'Category 10', '<p>test</p>\r\n', '5', '0', '1', '1', '2014-08-19 17:47:31');
INSERT INTO `catagory` VALUES ('2', 'Category 2', '<p>ccc</p>\r\n', '2', '0', '1', '1', '2014-08-08 13:01:36');
INSERT INTO `catagory` VALUES ('3', 'Category 3', '<p>aa</p>\r\n', '4', '0', '1', '1', '2014-08-08 13:01:43');
INSERT INTO `catagory` VALUES ('12', 'category 4', '<p>test</p>\r\n', '3', '4', '1', '1', '2014-08-20 10:51:22');

-- ----------------------------
-- Table structure for `contact`
-- ----------------------------
DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `phone` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=155 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of contact
-- ----------------------------
INSERT INTO `contact` VALUES ('1', 'sdgsdfs', 'avc@awe.cvb', 'dgsg', 'dsgdgd', '0000-00-00 00:00:00', null);
INSERT INTO `contact` VALUES ('2', 'jhjhjhj', 'hjhj@ghn.com', 'jhjhhj', 'jhjhjhj', '2014-03-02 10:39:29', null);
INSERT INTO `contact` VALUES ('3', 'jhjhjhj', 'hjhj@ghn.com', 'jhjhhj', 'jhjhjhj', '2014-03-02 10:40:17', null);
INSERT INTO `contact` VALUES ('4', 'jhjhjhj', 'hjhj@ghn.com', 'jhjhhj', 'jhjhjhj', '2014-03-02 10:40:53', null);
INSERT INTO `contact` VALUES ('5', 'jhjhjhj', 'hjhj@ghn.com', 'jhjhhj', 'jhjhjhj', '2014-03-02 10:41:36', null);
INSERT INTO `contact` VALUES ('6', 'safsf', 'dsada@gmail.com', 'asasa', 'adasdasc', '2014-03-02 10:43:42', null);
INSERT INTO `contact` VALUES ('7', 'fdh', 'fhcj@gbn.cvb', 'gjfj', 'bmvmb', '2014-03-02 10:48:50', null);
INSERT INTO `contact` VALUES ('8', 'fvgdfg', 'abc@abc.com', 'asdff', 'xgdsfgf', '2014-03-03 02:53:55', null);
INSERT INTO `contact` VALUES ('9', 'fvgdfg', 'abc@abc.com', 'asdff', 'xgdsfgf', '2014-03-03 02:54:49', null);
INSERT INTO `contact` VALUES ('10', 'jjhjh', 'bsc@avc.cvb', 'kjkjkkj', 'ljkjkjkjk', '2014-03-03 12:40:43', null);
INSERT INTO `contact` VALUES ('11', 'Johnny', 'jruston254@yahoo.com', 'Test', 'Test', '2014-03-04 00:52:43', null);
INSERT INTO `contact` VALUES ('12', 'sdklf kdchkhdf', 'asd@gmail.com', 'sdjflj sdlfjdlj', 'alflsdfl dsljfds fldjf', '2014-03-04 01:32:48', null);
INSERT INTO `contact` VALUES ('13', 'John', 'john@xyz.com', 'Test', 'Test Test test test test', '2014-03-04 03:38:16', null);
INSERT INTO `contact` VALUES ('14', 'alex', 'alex@xyz.com', 'new', 'Test test test test', '2014-03-04 03:44:33', null);
INSERT INTO `contact` VALUES ('15', 'alex', 'alex@xyz.com', 'new', 'Test test test test', '2014-03-04 03:47:52', null);
INSERT INTO `contact` VALUES ('16', 'sdfsf', 'sdfsf@gmail.com', 'sdfsf', 'sdfsf', '2014-04-02 01:32:09', null);
INSERT INTO `contact` VALUES ('17', 'sdfsf', 'sdfsf@gmail.com', 'sdfsf', 'sdfsf', '2014-04-02 01:32:31', null);
INSERT INTO `contact` VALUES ('18', 'sdfsf', 'sdfsf@gmail.com', 'sdfsf', 'sdfsf', '2014-04-02 01:32:46', null);
INSERT INTO `contact` VALUES ('19', 'sdfsf', 'sdfsf@gmail.com', 'sdfsf', 'sdfsf', '2014-04-02 01:33:10', null);
INSERT INTO `contact` VALUES ('20', 'fsdfs', 'bhaskar@gmail.com', 'dsfsf', 'dfsfsf', '2014-04-02 02:18:07', null);
INSERT INTO `contact` VALUES ('21', 'dsfs', 'sdfsf@gmail.com', 'dsffs', 'sdfsdf', '2014-04-02 02:20:17', null);
INSERT INTO `contact` VALUES ('22', 'sdfsf', 'sdfsf@gmail.com', 'sff', 'saffaf', '2014-04-02 02:21:29', null);
INSERT INTO `contact` VALUES ('23', 'dsfsf', 'sdfsf@gmail.com', 'sdfsf', 'sdfsdf', '2014-04-02 02:23:25', null);
INSERT INTO `contact` VALUES ('24', 'dsfsf', 'sdfsf@gmail.com', 'sfs', 'sfsfsfs', '2014-04-02 02:24:35', null);
INSERT INTO `contact` VALUES ('25', 'dsfsf', 'sdfsf@gmail.com', 'sdfsf', 'asdasdasdasd', '2014-04-02 02:28:26', null);
INSERT INTO `contact` VALUES ('26', 'dsfsf', 'sdfsf@gmail.com', 'sdfsf', 'asdasdasdasd', '2014-04-02 02:29:53', null);
INSERT INTO `contact` VALUES ('27', 'dsfsf', 'sdfsf@gmail.com', 'sdfsf', 'dfsdfsdfsdfsdf', '2014-04-02 02:30:45', null);
INSERT INTO `contact` VALUES ('28', 'dsfsf', 'sdfsf@gmail.com', 'sdfsf', 'qweqweqwe', '2014-04-02 02:32:12', null);
INSERT INTO `contact` VALUES ('29', 'sdefsdfg', 'fgh@gmail.com', 'dsfsf', 'dsfsfsf', '2014-04-02 02:41:29', null);
INSERT INTO `contact` VALUES ('30', 'test', 'test@test.com', 'test', 'testing', '2014-04-02 02:57:12', null);
INSERT INTO `contact` VALUES ('31', 'test', 'test@test.com', 'test', 'testing', '2014-04-02 02:58:30', null);
INSERT INTO `contact` VALUES ('32', 'sdsad', 'test@test.com', 'swadad', 'sdasdsadas', '2014-04-02 03:05:54', null);
INSERT INTO `contact` VALUES ('33', 'sdsad', 'test@test.com', 'swadad', 'sdasdsadas', '2014-04-02 03:06:49', null);
INSERT INTO `contact` VALUES ('34', 'sdsad', 'test@test.com', 'swadad', 'sdasdsadas', '2014-04-02 03:07:30', null);
INSERT INTO `contact` VALUES ('35', 'sdsad', 'test@test.com', 'swadad', 'sdasdsadas', '2014-04-02 03:08:13', null);
INSERT INTO `contact` VALUES ('36', 'sdsad', 'test@test.com', 'swadad', 'sdasdsadas', '2014-04-02 03:09:17', null);
INSERT INTO `contact` VALUES ('37', 'dsfsf', 'sdfsf@gmail.com', 'sfsffs', 'dsfsfd', '2014-04-02 03:10:20', null);
INSERT INTO `contact` VALUES ('38', 'sdfadf', 'sdfsf@gmail.com', 'sdsd', 'sdsdsd', '2014-04-02 03:13:02', null);
INSERT INTO `contact` VALUES ('39', 'dfsdf', 'sdfsf@gmail.com', 'fdsdfs', 'dfsf', '2014-04-02 03:22:11', null);
INSERT INTO `contact` VALUES ('40', 'dfsdf', 'sdfsf@gmail.com', 'fdsdfs', 'dfsf', '2014-04-02 03:25:09', null);
INSERT INTO `contact` VALUES ('41', 'erfwr', 'fsdf@gmail.com', 'sadadf', 'dsvgsg', '2014-04-02 04:10:15', null);
INSERT INTO `contact` VALUES ('42', 'testing', 'testing@gmail.com', 'test', 'testing', '2014-04-02 08:42:37', null);
INSERT INTO `contact` VALUES ('43', 'testing', 'testing@gmail.com', 'test', 'testing', '2014-04-02 08:46:23', null);
INSERT INTO `contact` VALUES ('44', 'sdgsd', 'gdg@gng.com', 'dfdsg', 'dfhdfh', '2014-04-02 08:48:54', null);
INSERT INTO `contact` VALUES ('45', 'fvd', 'dfgdf@ghm.cnb', 'hhnf', 'fghfgh', '2014-04-05 09:14:08', null);
INSERT INTO `contact` VALUES ('46', 'cddf', 'dfgdf@ghm.cnb', 'dfd', 'dfdf', '2014-04-05 09:50:50', null);
INSERT INTO `contact` VALUES ('47', 'cddf', 'dfgdf@ghm.cnb', 'dfd', 'dfdf', '2014-04-05 09:51:05', null);
INSERT INTO `contact` VALUES ('48', 'sdf', 'dfgdf@ghm.cnb', 'dfdf', 'dfdf', '2014-04-05 09:52:39', null);
INSERT INTO `contact` VALUES ('49', 'sdg', 'dfgdf@ghm.cnb', 'fgdf', 'dgdfg', '2014-04-05 09:53:28', null);
INSERT INTO `contact` VALUES ('50', 'dsfgf', 'dfgdf@ghm.cnb', 'fghfgh', 'fghfgh', '2014-04-05 10:33:01', null);
INSERT INTO `contact` VALUES ('51', 'dsfgf', 'dfgdf@ghm.cnb', 'fghfgh', 'fghfgh', '2014-04-05 10:40:41', null);
INSERT INTO `contact` VALUES ('52', 'fdvgd', 'dfsgdfg@gmail.com', 'hftgh', 'fghfgh', '2014-04-05 10:40:57', null);
INSERT INTO `contact` VALUES ('53', 'xcvxc', 'dfgdf@ghm.cnb', 'sdgfsdgv', 'fdxgdf', '2014-04-05 10:41:14', null);
INSERT INTO `contact` VALUES ('54', 'gfre', 'dfgdf@ghm.cnb', 'gdfg', 'dfgdfg', '2014-04-05 10:43:22', null);
INSERT INTO `contact` VALUES ('55', 'fdgd', 'dfgdf@ghm.cnb', 'dfgdfg', 'dgdfg', '2014-04-05 10:43:39', null);
INSERT INTO `contact` VALUES ('56', 'Site Visit and rental information', 'jradigan@revisionmilitary.com', '858-220-6143 James Radigan', 'I live in Desert Ridge and work for Revision Military.  We are working on a project and would like to come out for a site visit this week to check the facility out and get pricing\r\n\r\nCan you give me a call at 858-220-6143 to discuss?  Thank you', '2014-04-08 08:24:40', null);
INSERT INTO `contact` VALUES ('57', 'Sharon Phillips', 'skppyk45@yahoo.com', 'Previous name of Cowtown?', 'My daughter and I were reminiscing about our trips to Cowtown, but we knew it as a different name in the 70s or 80s. I used to do photo shoots there. Can you tell me what the former name was? Thank you. ', '2014-04-11 20:11:07', null);
INSERT INTO `contact` VALUES ('58', 'Sharon Phillips', 'skppyk45@yahoo.com', 'Previous name of Cowtown?', 'My daughter and I were reminiscing about our trips to Cowtown, but we knew it as a different name in the 70s or 80s. I used to do photo shoots there. Can you tell me what the former name was? Thank you. ', '2014-04-11 20:11:28', null);
INSERT INTO `contact` VALUES ('59', 'Mark', 'lilfeat99@yahoo.com', 'membership', 'I would be interested in becoming a member. Please email me at your convenience.', '2014-04-14 09:39:21', null);
INSERT INTO `contact` VALUES ('60', 'Bryan Haas', 'ballskate@cox.net', 'Membership', 'Hello,\r\nIs your facility available for anyone to join? I have lived here since 1985 and just found that you exist.\r\nIf so, I would be very interested in joining. If you could please give me any more information, I would be very thankful!\r\nThank you for your time\r\nBryan Haas\r\n', '2014-04-15 20:49:28', null);
INSERT INTO `contact` VALUES ('61', 'Bryan Haas', 'ballskate@cox.net', 'Membership', 'Hello,\r\nIs the cowtown range open to the public or can \r\n\r\nI join through membership?\r\n\r\nLooking forward to hearing from you\r\nThank you!\r\nBryan', '2014-04-21 12:32:19', null);
INSERT INTO `contact` VALUES ('62', 'bhaskar Chakraborty', 'developer@azcowtown.com', 'testing', 'phone number is added.', '2014-04-24 08:37:33', null);
INSERT INTO `contact` VALUES ('63', 'Eric', 'ewilmarth@profense.com', 'Use of Range', 'Please call me to discuss the use of the range to test our M134 weapon after units are produced.   \r\n\r\nThank You, Eric', '2014-04-29 11:00:30', null);
INSERT INTO `contact` VALUES ('64', 'Jesse', 'JCD442001@cox.net', 'membership', 'I am looking for details on a private membership. Do you have an individual Law Enforcement Officers membership?', '2014-04-30 11:12:30', null);
INSERT INTO `contact` VALUES ('65', 'Lindsay', 'lindsay.hoiby@gmail.com', '1 HR Photoshoot', 'Hello,\r\n\r\nI was wondering if it would be possible to do a photo shoot here on Friday June 13th in the evening.  It\'s a solo photo shoot that would only take about an hour.  Please let me if it is possible and if and what the costs would be.', '2014-05-09 07:22:42', null);
INSERT INTO `contact` VALUES ('66', 'JP Penzkover', 'jppenzkover@gmail.com', 'Time of night shoot', 'What time does the night shoot start?', '2014-05-10 17:34:24', null);
INSERT INTO `contact` VALUES ('67', 'Temple', 'Tallent', 'shooting range info', 'hi,\r\nI would like some info on your shooting range.\r\nwhat it would take to be able to shot there and if you allow 50 bmg\'s. would like to shot 1000 yards for practices.\r\nthank you for any info\r\ntempletallent@yahoo.com', '2014-05-13 20:50:21', null);
INSERT INTO `contact` VALUES ('68', 'Aaron', 'mr.acgozalez@gmail.com', 'event questions', 'Looking for possible location for events in October, and possibly a longer term relationship\r\n\r\nReferred by Amanda Rakofsky', '2014-05-14 20:10:58', null);
INSERT INTO `contact` VALUES ('69', 'Aaron Gonzalez', 'mr.acgonzalez@gmail.com', 'Event inquiry', 'referred by Amanda Rakofsky\r\n\r\nseeking property for events in October', '2014-05-14 20:21:02', null);
INSERT INTO `contact` VALUES ('70', 'Chloie', 'yyyyqpwk@yahoo.com', 'Chloie', 'This is a comment to the webmaster. Your website is missing out on at least 300 visitors per day. I have found a company which offers to dramatically increase your traffic to your website: http://dnsfreak.de/2ruy They offer 500 free visitors during their free trial period and I managed to get over 15,000 visitors per month using their services, you could also get lot more targeted visitors than you have now. Hope this helps :) Take care.', '2014-05-15 20:24:17', null);
INSERT INTO `contact` VALUES ('71', 'Rob', 'robbowe@gmail.com', 'night shoot tonight', 'any space still available for tonight\'s shoot with Craig Sawyer?', '2014-05-16 16:16:06', null);
INSERT INTO `contact` VALUES ('72', 'John Fillman', 'Proleveltactical@gmail.com', 'using range', 'Hello I am looking for info on being able to use your range. Not looking to do class or anything there. Just myself and other law enforcement friends that are looking for a place to be able to go without the hassle of other places. Thanks you for any info you can pass along', '2014-05-19 21:19:18', null);
INSERT INTO `contact` VALUES ('73', 'Donald', 'donbesancon@gmail.com', 'Open to public?', 'Hi there, I recently moved to Phoenix and have been seeking a range that is open to the public for long-range precision shooting, preferably 300-1100 yards. I have yet to find such a facility in Phoenix that is open to the public.\r\n\r\nDo you have public hours? Simply looking for steel silhouette targets out to 1000 or so.\r\n\r\nRegards,\r\nDon', '2014-05-20 01:20:37', null);
INSERT INTO `contact` VALUES ('74', 'Jennifer', 'nhokmi@gmail.com', 'Jennifer', 'You need targeted traffic to your website so why not try some for free? There is a VERY POWERFUL and POPULAR company out there who now lets you try their website traffic service for 7 days free of charge. I am so glad they opened their traffic system back up to the public! Check it out here: http://v.af/o8l\r\nJennifer http://dnsfreak.de/2ruy', '2014-05-24 14:31:54', null);
INSERT INTO `contact` VALUES ('75', 'Morty', 'support@superbsocial.net', 'I stumbled upon your site www.azcowtown.com', 'Hello, my name is Morty Goldman; I just stumbled upon your site - www.azcowtown.com - I\'m sorry to write in such an odd manner, I thought to call you but I didn\'t want to take up your time. What I have to say may be of great interest to you. Did you know that an overwhelming majority of businesses, organizations and celebrities buy likes and followers? What, you thought your competitor\'s likes and followers are organic and naturally gained? Ha ha. \r\n \r\nJust recently Gangman Style ( http://www.youtube.com/watch?v=9bZkp7q19f0 ) reached a record 2 billion views. Now imagine the scale of Gangnam Style\'s popularity being applied to your business! This is exactly how I deliver results to my clients - and I assure you that you\'ll be overwhelmingly pleased with the outcome. \r\n \r\nGive us a call: +1 (877) 410-4002 \r\nor visit us at http://www.SuperbSocial.net', '2014-06-01 15:36:22', null);
INSERT INTO `contact` VALUES ('76', 'Eric', 'ewilmarth@profense.com', 'Range', 'Hi John or Steve,\r\n\r\nI spoke to Steve approx. 1 month ago and he said you would be the contact for scheduling some range time.  \r\n\r\nPlease call me today if possible to discuss some options to shoot a couple rifles and do some testing.  \r\n\r\nThx, Eric at Profense', '2014-06-02 11:24:33', null);
INSERT INTO `contact` VALUES ('77', 'Eric', 'ewilmarth@profense.com', 'Range', 'Hi John or Steve,\r\n\r\nI spoke to Steve approx. 1 month ago and he said you would be the contact for scheduling some range time.  \r\n\r\nPlease call me today if possible to discuss some options to shoot a couple rifles and do some testing.  \r\n\r\nThx, Eric at Profense', '2014-06-02 11:24:34', null);
INSERT INTO `contact` VALUES ('78', 'Nicholas', 'Nrose8989@gmail.com', 'Private Membership', 'Hello, \r\n\r\nI\'m inquiring about private membership. I attempted to use your link on the main page, but got a 404 not found. \r\n\r\nPlease let me know!\r\n\r\nThanks,\r\n\r\nNick', '2014-06-04 22:24:29', null);
INSERT INTO `contact` VALUES ('79', 'Mason', 'mason.d.miller4313@gmail.com', 'Employment', 'My inquiry is in regards to employment at Cowtown Range. I am a firearms instructor and combat veteran from the war in Afghanistan. I am also an AZ resident and live near the range location. I would very much appreciate it if you could contact me in regards to possible employment or failing that how I can go about getting range time for one of my classes. Thank you very much for your time and I am looking forward to hearing from you.\r\n\r\nSincerely,\r\nMason Miller', '2014-06-16 15:03:37', null);
INSERT INTO `contact` VALUES ('80', 'Traci Victor', 'tvictor@attorneyforfreedom.com', 'I would like to put on an event with your group and speak about gun rights ', 'I write to introduce myself and to express my interest in speaking, free of charge, at any upcoming meeting or event for your organization.  I am often asked to speak on various topics to a wide variety of audiences.  Including the Crossroads of the West Gun Show. As a criminal defense attorney and freedom activist for the past twenty years, I have a lot to say on many freedom related and criminal law issues.  I regularly present to groups on topics ranging from practical to philosophical including:\r\n\r\n1.	How to deal with the police during a traffic stop;\r\n2.	The legal aspects of gun ownership and self-defense;\r\n3.	Your rights under the 4th Amendment regarding search and seizure; \r\n4.	How the criminal justice system works; \r\n5.	Arizona Criminal Law and Things Your Teenager Ought to Know;\r\n6.	Is America becoming a police state?\r\n7.	Should marijuana be legalized?\r\n8.	Does the United States Constitution protect you? \r\n9.	Why the libertarians have it right;\r\n10.	The Ins and Outs of DUI Law.\r\n\r\nMy law firm website www.AttorneyForFreedom.com details some of my past presentations as well as recent media attention matters.   These include my regular commentaries on NBC 12 News as a legal commentator for the Jodi Arias trial and other high profile matters as well as my successful representation at the trial of Elizabeth Johnson in the nationally high profile “Baby Gabriel” case.  \r\n\r\nIn addition to the topics listed above, I am generally able and willing to discuss and present on several “hot topics” of the day.  Although I cannot guarantee agreement on any matter, I can guarantee a lively and thought provoking discussion.  Indeed, I strongly prefer disagreement, as it provides a more interesting and meaningful discussion.  \r\n\r\nAs a long time Certified Criminal Law Specialist, a United States Marine Corps combat veteran, and a former candidate for United States Senate, I can assure you of an interesting and professional presentation.  I have never been accused of being boring.  \r\n\r\nIf you are interested in determining whether I am available and a good fit for your group, please contact Traci at 480-455-5214.   She can assist you with scheduling me to appear before your group or organization.  I look forward to meeting you.  \r\n\r\n\r\n.  \r\n                                                          Sincerely,\r\n\r\n\r\n                                                          Marc J. Victor, Esq.\r\n', '2014-06-17 11:59:47', null);
INSERT INTO `contact` VALUES ('81', 'Kyle', 'kyle0k@gmail.com', 'Private membership', 'Hello,\r\nI\'ve been going to ben avery for my close range shooting and to a desert spot for my 1600-2500 yard long range shooting. Very recently I was just told about your range. I couldn\'t believe there was a range of this caliber right around the corner!\r\n\r\nCan you tell me about membership costs and what it involves. I am actually taking a training class with indepedence training next Wednesday, so I\'ll be able to see it in person. However I think I will definitely be interested in joining if it is possible.\r\n\r\nThank you.', '2014-06-18 23:37:13', null);
INSERT INTO `contact` VALUES ('82', 'Kevin ', 'Szymanski ', 'Long Range Shooting Club ', 'I saw a few posts about a long range shooting club membership. Do you have any information for me regarding requirements and costs? I am a Peoria resident and have trained at your facility with Independence Training and have 3-4 other interested potential members. Please contact me with  more information. ', '2014-06-21 14:20:33', null);
INSERT INTO `contact` VALUES ('83', 'Jeanice', 'fgymum@gmail.com', 'Jeanice', 'Website traffic doesn\'t come easy these days. It’s hard and it usually takes a long time. In many cases, too much time… So much that you might be ready to give up. One of my readers shared a web traffic service with me on my site and I thought I would share it with you. I was skeptical at first but I tried the free trial period and it turns out they are able to get hundreds of visitors to anyones website every day. My sales revenue has increased tenfold. Check them out here: http://gf10.com.br/url/zpd', '2014-06-22 13:04:51', null);
INSERT INTO `contact` VALUES ('84', 'Tony', 'tonytopaz@hotmail.com', 'rent', 'I like to speak with some one about renting the set for three days, Thank you ', '2014-06-27 15:22:09', null);
INSERT INTO `contact` VALUES ('85', 'Tony', 'tonytopaz@hotmail.com', 'rent', 'I like to speak with some one about renting the set for three days, Thank you ', '2014-06-27 15:22:10', null);
INSERT INTO `contact` VALUES ('86', 'Ronnie', '1000yardline@gmail.com', 'Long range shooting membership', 'Looking for membership information. I am friends with Jason & Ken from MARSOC. Jason is coming out soon and would very much like to do some shooting (Drinks on me). Any help on membership information would be a great start. I live up in New River and have been to your range with Ken several times. Thanks. Ronnie', '2014-07-05 11:01:52', null);
INSERT INTO `contact` VALUES ('87', 'fsdfsdfs', 'aaa.@aaa.aaa', 'test', 'testing the emails', '2014-07-05 11:14:35', null);
INSERT INTO `contact` VALUES ('88', 'fsdfsdfs', 'aaa.@aaa.aaa', 'test', 'testing the emails', '2014-07-05 11:40:05', null);
INSERT INTO `contact` VALUES ('89', 'debasis', 'debasiskar007@gmail.com', 'this is test', 'this is test msg ..', '2014-07-05 23:41:09', null);
INSERT INTO `contact` VALUES ('90', 'debasis', 'debasiskar007@gmail.com', 'this is test', 'this is test msg ..', '2014-07-05 23:45:45', null);
INSERT INTO `contact` VALUES ('91', 'debasis', 'debasiskar007@gmail.com', 'this is test', 'this is test msg ..', '2014-07-05 23:55:04', null);
INSERT INTO `contact` VALUES ('92', 'debasis', 'debasiskar007@gmail.com', 'this is test', 'this is test msg ..', '2014-07-06 00:02:08', null);
INSERT INTO `contact` VALUES ('93', 'debasis', 'debasiskar007@gmail.com', 'this is test', 'this is test msg ..', '2014-07-06 00:02:49', null);
INSERT INTO `contact` VALUES ('94', 'debasis', 'debasiskar007@gmail.com', 'this is test', 'this is test msg ..', '2014-07-06 00:02:56', null);
INSERT INTO `contact` VALUES ('95', 'debasis', 'debasiskar007@gmail.com', 'this is test', 'this is test msg ..', '2014-07-06 00:03:18', null);
INSERT INTO `contact` VALUES ('96', 'debasis', 'debasiskar007@gmail.com', 'this is test', 'this is test msg ..', '2014-07-06 00:05:31', null);
INSERT INTO `contact` VALUES ('97', 'debasis', 'debasiskar007@gmail.com', 'this is test', 'this is test msg ..', '2014-07-06 00:05:38', null);
INSERT INTO `contact` VALUES ('98', 'debasis', 'debasiskar007@gmail.com', 'this is test', 'this is test msg ..', '2014-07-06 00:05:44', null);
INSERT INTO `contact` VALUES ('99', 'debasis', 'debasiskar007@gmail.com', 'this is test', 'this is test msg ..', '2014-07-06 00:06:00', null);
INSERT INTO `contact` VALUES ('100', 'debasis', 'debasiskar007@gmail.com', 'this is test', 'this is test msg ..', '2014-07-06 00:06:32', null);
INSERT INTO `contact` VALUES ('101', 'debasis', 'debasiskar007@gmail.com', 'this is test', 'this is test msg ..', '2014-07-06 00:12:58', null);
INSERT INTO `contact` VALUES ('102', 'jhjhjh', 'aaa.aaa.com', 'ghhff', 'jghjgggj', '2014-07-06 03:21:38', null);
INSERT INTO `contact` VALUES ('103', 'jhjhjh', 'aaa.aaa.com', 'ghhff', 'jghjgggj', '2014-07-06 03:22:33', null);
INSERT INTO `contact` VALUES ('104', 'jhjhjh', 'aaa.aaa.com', 'ghhff', 'jghjgggj', '2014-07-06 03:28:54', null);
INSERT INTO `contact` VALUES ('105', 'jhjhjh', 'aaa.aaa.com', 'ghhff', 'wdasds', '2014-07-06 03:31:25', null);
INSERT INTO `contact` VALUES ('106', 'jhjhjh', 'aaa.aaa.com', 'asdsd', 'sdsf', '2014-07-06 03:34:21', null);
INSERT INTO `contact` VALUES ('107', 'jhjhjh', 'aaa.aaa.com', 'asdsd', 'sdsf', '2014-07-06 03:36:36', null);
INSERT INTO `contact` VALUES ('108', 'jhjhjh', 'aaa.aaa.com', 'ghhff', 'lkjkjkjk', '2014-07-06 03:37:49', null);
INSERT INTO `contact` VALUES ('109', 'jhjhjh', 'aaa.aaa.com', 'asdsd', 'fgfgfgg', '2014-07-06 03:39:01', null);
INSERT INTO `contact` VALUES ('110', 'jhjhjh', 'aaa.aaa.com', 'asdsd', 'jhjhj', '2014-07-06 03:40:43', null);
INSERT INTO `contact` VALUES ('111', 'jhjhjh', 'aaa.aaa.com', 'ghhff', 'hjh', '2014-07-06 04:01:00', null);
INSERT INTO `contact` VALUES ('112', 'jhjhjh', 'aaa.aaa.com', 'ghhff', 'hjh', '2014-07-06 04:01:50', null);
INSERT INTO `contact` VALUES ('113', 'jhjhjh', 'aaa.aaa.com', 'ghhff', 'hjh', '2014-07-06 04:02:37', null);
INSERT INTO `contact` VALUES ('114', 'jhjhjh', 'aaa.aaa.com', 'ghhffA', 'dsz', '2014-07-06 04:30:12', null);
INSERT INTO `contact` VALUES ('115', 'jhjhjh', 'aaa.aaa.com', 'ghhffA', 'dsz', '2014-07-06 04:30:55', null);
INSERT INTO `contact` VALUES ('116', 'jhjhjh', 'aaa.aaa.com', 'asdsd', 'cbxhbc', '2014-07-06 04:32:59', null);
INSERT INTO `contact` VALUES ('117', 'jhjhjh', 'aaa.aaa.com', 'asdsd', 'xv v', '2014-07-06 04:36:05', null);
INSERT INTO `contact` VALUES ('118', 'jhjhjh', 'aaa.aaa.com', 'asdsd', 'XXz', '2014-07-06 04:41:42', null);
INSERT INTO `contact` VALUES ('119', 'cz', 'aaa@aaa.bnm', 'zfczxv', 'zdgvxdgb', '2014-07-06 05:09:00', null);
INSERT INTO `contact` VALUES ('120', 'cz', 'aaa@aaa.bnm', 'zfczxv', 'zdgvxdgb', '2014-07-06 05:09:28', null);
INSERT INTO `contact` VALUES ('121', 'cz', 'aaa@aaa.bnm', 'zfczxv', 'zzz', '2014-07-06 05:12:10', null);
INSERT INTO `contact` VALUES ('122', 'testing ', 'aaa@aaa.bnm', 'test', 'test test and test', '2014-07-06 05:15:23', null);
INSERT INTO `contact` VALUES ('123', 'testing ', 'aaa@aaa.bnm', 'test', 'test test test', '2014-07-06 05:17:07', null);
INSERT INTO `contact` VALUES ('124', 'testing ', 'aaa@aaa.bnm', 'test', 'sdsaf', '2014-07-06 05:19:27', null);
INSERT INTO `contact` VALUES ('125', 'testing ', 'aaa@aaa.bnm', 'test', 'sdsaf', '2014-07-06 05:20:52', null);
INSERT INTO `contact` VALUES ('126', 'testing ', 'aaa@aaa.bnm', 'test', 'dasfads', '2014-07-06 05:21:37', null);
INSERT INTO `contact` VALUES ('127', 'testing ', 'aaa@aaa.bnm', 'test', 'dasfads', '2014-07-06 05:22:38', null);
INSERT INTO `contact` VALUES ('128', 'testing ', 'aaa@aaa.bnm', 'test', 'dasfads', '2014-07-06 05:23:34', null);
INSERT INTO `contact` VALUES ('129', 'testing ', 'aaa@aaa.bnm', 'test', 'dasfads', '2014-07-06 05:24:01', null);
INSERT INTO `contact` VALUES ('130', 'cz', 'bbb@bbb.ccc', 'zfczxv', 'dasfsdg', '2014-07-06 05:25:12', null);
INSERT INTO `contact` VALUES ('131', 'testing ', 'bbb@bbb.ccc', 'zfczxv', 'ZCxc', '2014-07-06 05:26:16', null);
INSERT INTO `contact` VALUES ('132', 'testing ', 'bbb@bbb.ccc', 'zfczxv', 'ZCxc', '2014-07-06 05:26:48', null);
INSERT INTO `contact` VALUES ('133', 'test', 'test@test.test', 'test', 'test', '2014-07-06 05:27:49', null);
INSERT INTO `contact` VALUES ('134', 'test', 'test@test.test', 'test', 'vxcb', '2014-07-06 05:29:03', null);
INSERT INTO `contact` VALUES ('135', 'test', 'testzdsdff@test.test', 'test', 'vxcb', '2014-07-06 05:29:24', null);
INSERT INTO `contact` VALUES ('136', 'safsf', 'asd@asd.com', 'asdad', 'sadasfdasf', '2014-07-07 00:16:21', null);
INSERT INTO `contact` VALUES ('137', 'safsf', 'asd@asd.com', 'asdad', 'sadasfdasf', '2014-07-07 00:17:17', null);
INSERT INTO `contact` VALUES ('138', 'safsf', 'asd@asd.com', 'asdad', 'sadasfdasf', '2014-07-07 00:18:57', null);
INSERT INTO `contact` VALUES ('139', 'safsf', 'asd@asd.com', 'asdad', 'arasrs', '2014-07-07 00:19:36', null);
INSERT INTO `contact` VALUES ('140', 'safsf', 'asd@asd.com', 'asdad', 'arasrs', '2014-07-07 00:22:07', null);
INSERT INTO `contact` VALUES ('141', 'safsf', 'asd@asd.com', 'asdad', 'arasrs', '2014-07-07 00:24:01', null);
INSERT INTO `contact` VALUES ('142', 'safsf', 'asd@asd.com', 'asdad', 'xcbxcbcx', '2014-07-07 00:25:30', null);
INSERT INTO `contact` VALUES ('143', 'safsf', 'asd@asd.com', 'asdad', 'XXZXZXzXC', '2014-07-07 00:26:19', null);
INSERT INTO `contact` VALUES ('144', 'szcszd', 'test@tes.tes', 'zfsdz', 'sdfsdgs', '2014-07-10 05:33:08', null);
INSERT INTO `contact` VALUES ('145', 'sadaSd', 'test@tes.tes', 'asfasf', 'asfasf', '2014-07-10 05:34:25', null);
INSERT INTO `contact` VALUES ('146', 'czxvzxv', 'test@tes.tes', 'safsdf', 'sdvfsdg', '2014-07-10 05:37:31', null);
INSERT INTO `contact` VALUES ('147', 'czxvzxv', 'test@tes.tes', 'safsdf', 'sdvfsdg', '2014-07-10 05:40:15', null);
INSERT INTO `contact` VALUES ('148', 'czxvzxv', 'test@tes.tes', 'safsdf', 'sdvfsdg', '2014-07-10 05:40:45', null);
INSERT INTO `contact` VALUES ('149', 'zaSDs', 'test@tes.tes', 'sadad', 'asdasdasda', '2014-07-10 05:50:36', null);
INSERT INTO `contact` VALUES ('150', 'test', 'test@tes.tes', 'sfsdg', 'sdgsdg', '2014-07-10 06:00:32', null);
INSERT INTO `contact` VALUES ('151', 'czxvzxv', 'bhaskar@gmail.com', 'asfasf', 'test', '2014-07-10 06:05:25', null);
INSERT INTO `contact` VALUES ('152', 'czxvzxv', 'bhaskar@gmail.com', 'dsgsg', 'ccczczxc', '2014-07-10 06:08:28', null);
INSERT INTO `contact` VALUES ('153', 'czxvzxv', 'bhaskar@gmail.com', 'dsgsg', 'ccczczxc', '2014-07-10 06:11:19', null);
INSERT INTO `contact` VALUES ('154', 'czxvzxv', 'bhaskar@gmail.com', 'dsgsg', 'ccczczxc', '2014-07-10 06:11:32', null);

-- ----------------------------
-- Table structure for `content`
-- ----------------------------
DROP TABLE IF EXISTS `content`;
CREATE TABLE `content` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `content_type` varchar(10) NOT NULL,
  `content_desc` varchar(500) NOT NULL,
  `content_status` int(2) NOT NULL DEFAULT '0',
  `image_type` int(2) DEFAULT '0',
  `img_height` decimal(50,3) DEFAULT NULL,
  `img_width` decimal(50,3) DEFAULT NULL,
  `page_id` bigint(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=135 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of content
-- ----------------------------
INSERT INTO `content` VALUES ('34', 'TEXT', '<p>content for subheading 3 of west range</p>\r\n', '0', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('33', 'TEXT', '<p>subheading 3 for the west range of range page.</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('32', 'TEXT', '<p>content for subheading 2 of west range</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('31', 'TEXT', '<p>suheading 2 for west range.</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('30', 'TEXT', '<p>content under subheading 1 of west range.</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('29', 'TEXT', '<p>subheading 1 under west range.</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('28', 'TEXT', '<p>west range heading for range page.</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('19', 'TEXT', '<p>content used for home page top section</p>\r\n', '1', null, '0.000', '0.000', '1');
INSERT INTO `content` VALUES ('39', 'TEXT', '<p>content for subheading 5 of west range</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('21', 'TEXT', '<p>text under sub heading in top section of home page.</p>\r\n', '1', null, '0.000', '0.000', '1');
INSERT INTO `content` VALUES ('22', 'HTML', '<p>total content for read more link in top section.</p>\r\n', '1', '0', '0.000', '0.000', '1');
INSERT INTO `content` VALUES ('23', 'IMAGE', '<p>home page top section image.</p>\r\n', '1', null, '291.000', '500.000', '1');
INSERT INTO `content` VALUES ('24', 'IMAGE', '<p>home page middle section images.</p>\r\n', '1', '1', '188.000', '322.000', '1');
INSERT INTO `content` VALUES ('25', 'IMAGE', '<p>banner for range page.</p>\r\n', '1', null, '286.000', '996.000', '7');
INSERT INTO `content` VALUES ('26', 'TEXT', '<p>main heading for range page</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('27', 'HTML', '<p>text under the main heading section for range page.</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('36', 'TEXT', '<p>content for subheading 4 of west range</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('38', 'TEXT', '<p>subheading 5 for the west range of range page</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('40', 'TEXT', '<p>subheading 6 for the west range of range page</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('41', 'TEXT', '<p>content for subheading 6 of west range</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('42', 'TEXT', '<p>subheading 7 for the west range of range page</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('43', 'TEXT', '<p>content for subheading 7 of west range</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('44', 'TEXT', '<p>subheading 8 for the west range of range page</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('45', 'TEXT', '<p>content for subheading 8 of west range</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('46', 'TEXT', '<p>subheading 9 for the west range of range page</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('47', 'TEXT', '<p><br />\r\ncontent for subheading 9 of west range</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('48', 'TEXT', '<p><span style=\"color: rgb(72, 72, 72); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 20px; background-color: rgb(238, 238, 238);\">east range heading for range page.</span></p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('49', 'IMAGE', '<p>home page middle section shooting range image.</p>\r\n', '1', '1', '188.000', '322.000', '1');
INSERT INTO `content` VALUES ('50', 'IMAGE', '<p>home page middle section venue image.</p>\r\n', '1', '1', '188.000', '322.000', '7');
INSERT INTO `content` VALUES ('51', 'IMAGE', '<p>home page middle section studio image.</p>\r\n', '1', '1', '188.000', '322.000', '7');
INSERT INTO `content` VALUES ('52', 'IMAGE', '<p>range page image gallery images</p>\r\n', '1', '1', '110.000', '150.000', '7');
INSERT INTO `content` VALUES ('53', 'TEXT', '<p>East Range Sub Heading 1</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('54', 'TEXT', '<p>East Range Sub Heading 1 Content for Range Page</p>\r\n', '1', '1', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('55', 'IMAGE', '<p>East Range Sub Heading 1 Content Image for Range Page.</p>\r\n', '1', '1', '161.000', '223.000', '7');
INSERT INTO `content` VALUES ('56', 'TEXT', '<p>East Range Sub Heading 2 for Range Page</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('57', 'TEXT', '<p><br />\r\nEast Range Sub Heading 2 Content for Range Page</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('58', 'IMAGE', '<p>East Range Sub Heading 2 Content Image for Range Page.</p>\r\n', '1', '1', '161.000', '223.000', '7');
INSERT INTO `content` VALUES ('59', 'TEXT', '<p>East Range Sub Heading 3 for Range Page</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('60', 'TEXT', '<p>East Range Sub Heading 3 Content for Range Page</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('61', 'IMAGE', '<p>East Range Sub Heading 3 Content Image for Range Page.</p>\r\n', '1', '1', '161.000', '223.000', '7');
INSERT INTO `content` VALUES ('62', 'TEXT', '<p>East Range Sub Heading 4 for Range Page</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('63', 'TEXT', '<p>East Range Sub Heading 4 Content for Range Page</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('64', 'IMAGE', '<p>East Range Sub Heading 4 Content Image for Range Page.</p>\r\n', '1', '1', '161.000', '223.000', '7');
INSERT INTO `content` VALUES ('65', 'TEXT', '<p>East Range Sub Heading 5 for Range Page</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('66', 'TEXT', '<p>East Range Sub Heading 5 Content for Range Page</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('67', 'IMAGE', '<p>East Range Sub Heading 5 Content Image for Range Page.</p>\r\n', '1', '1', '161.000', '223.000', '7');
INSERT INTO `content` VALUES ('68', 'TEXT', '<p>East Range Sub Heading 6 for Range Page</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('69', 'TEXT', '<p>East Range Sub Heading 6 Content for Range Page</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('70', 'IMAGE', '<p>East Range Sub Heading 6 Content Image for Range Page.</p>\r\n', '0', '1', '161.000', '223.000', '7');
INSERT INTO `content` VALUES ('71', 'TEXT', '<p>East Range Sub Heading 7 for Range Page</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('72', 'TEXT', '<p>East Range Sub Heading 7 Content for Range Page</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('73', 'IMAGE', '<p>East Range Sub Heading 7 Content Image for Range Page.</p>\r\n', '1', '1', '161.000', '223.000', '7');
INSERT INTO `content` VALUES ('74', 'TEXT', '<p>East Range Sub Heading 8 for Range Page</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('75', 'TEXT', '<p>East Range Sub Heading 8 Content for Range Page</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('76', 'IMAGE', '<p>East Range Sub Heading 8 Content Image for Range Page.</p>\r\n', '1', '1', '161.000', '223.000', '7');
INSERT INTO `content` VALUES ('77', 'TEXT', '<p>East Range Sub Heading 9 for Range Page</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('78', 'TEXT', '<p>East Range Sub Heading 9 Content for Range Page</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('79', 'IMAGE', '<p>East Range Sub Heading 9 Content Image for Range Page.</p>\r\n', '1', '1', '161.000', '223.000', '7');
INSERT INTO `content` VALUES ('80', 'TEXT', '<p>East Range Sub Heading 10 for Range Page</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('81', 'TEXT', '<p>East Range Sub Heading 10 Content for Range Page</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('82', 'IMAGE', '<p>East Range Sub Heading 10 Content Image for Range Page.</p>\r\n', '1', '1', '161.000', '223.000', '7');
INSERT INTO `content` VALUES ('83', 'IMAGE', '<p>Banner Image for Event Page</p>\r\n', '1', '1', '286.000', '996.000', '8');
INSERT INTO `content` VALUES ('84', 'IMAGE', '<p>Banner Image for Training Page</p>\r\n', '1', '1', '286.000', '996.000', '9');
INSERT INTO `content` VALUES ('85', 'IMAGE', '<p>Banner Image for Advertiseing Page<br />\r\n&nbsp;</p>\r\n', '1', '1', '286.000', '996.000', '12');
INSERT INTO `content` VALUES ('86', 'IMAGE', '<p>Banner Image for Store Page</p>\r\n', '1', '1', '286.000', '996.000', '14');
INSERT INTO `content` VALUES ('87', 'IMAGE', '<p>Banner Image for Contact Us Page</p>\r\n', '1', '1', '286.000', '996.000', '15');
INSERT INTO `content` VALUES ('88', 'IMAGE', '<p>Banner Image for Studio Page</p>\r\n', '1', '1', '286.000', '996.000', '11');
INSERT INTO `content` VALUES ('89', 'IMAGE', '<p>Banner Image for venue Page</p>\r\n', '1', '1', '286.000', '996.000', '10');
INSERT INTO `content` VALUES ('90', 'TEXT', '<p>Sub Heading shooting Group</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('91', 'TEXT', '<p>Sub Heading Shooting Range Content</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('92', 'TEXT', '<p>Sub Heading Private Membership</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('93', 'TEXT', '<p>Sub Heading Private Membership Content</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('94', 'TEXT', '<p>Sub Heading&nbsp;Cowboy Shooting.</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('95', 'HTML', '<p>Sub Heading Cowboy Shooting Content</p>\r\n', '1', '0', '0.000', '0.000', '7');
INSERT INTO `content` VALUES ('96', 'IMAGE', '<p>Range Page Right Side Map Image.</p>\r\n', '1', '1', '408.000', '562.000', '7');
INSERT INTO `content` VALUES ('97', 'HTML', '<p>left side html under banner section</p>\r\n', '1', '0', '0.000', '0.000', '8');
INSERT INTO `content` VALUES ('98', 'HTML', '<p>right side html content under banner section</p>\r\n', '1', '0', '0.000', '0.000', '8');
INSERT INTO `content` VALUES ('99', 'HTML', '<p>contact us information bottom of the page(last line)</p>\r\n', '1', '0', '0.000', '0.000', '8');
INSERT INTO `content` VALUES ('100', 'TEXT', '<p>text underneth the banner of the training page</p>\r\n', '1', '0', '0.000', '0.000', '9');
INSERT INTO `content` VALUES ('101', 'TEXT', '<p>trainging page heading</p>\r\n', '1', '0', '0.000', '0.000', '9');
INSERT INTO `content` VALUES ('102', 'TEXT', '<p>sub heading under the training page main heading</p>\r\n', '1', '0', '0.000', '0.000', '9');
INSERT INTO `content` VALUES ('103', 'HTML', '<p>content under the first subheading of the training page</p>\r\n', '1', '0', '0.000', '0.000', '9');
INSERT INTO `content` VALUES ('104', 'TEXT', '<p>left side secoend sub heading that is testimonial of training page</p>\r\n', '1', '0', '0.000', '0.000', '9');
INSERT INTO `content` VALUES ('105', 'HTML', '<p>first testimonial under left side sub heading for training page</p>\r\n', '1', '0', '0.000', '0.000', '9');
INSERT INTO `content` VALUES ('106', 'HTML', '<p>secoend testimonial under left side sub heading for training page</p>\r\n', '1', '0', '0.000', '0.000', '9');
INSERT INTO `content` VALUES ('107', 'IMAGE', '<p>left side image of Craig Sawyer for training page</p>\r\n', '1', '1', '236.000', '190.000', '9');
INSERT INTO `content` VALUES ('108', 'HTML', '<p>right side content about Craig Sawyer for training page</p>\r\n', '1', '0', '0.000', '0.000', '9');
INSERT INTO `content` VALUES ('109', 'HTML', '<p>cowtown traing partners listing at the bottom of the traing page</p>\r\n', '1', '0', '0.000', '0.000', '9');
INSERT INTO `content` VALUES ('110', 'HTML', '<p>bottom line content that is contact info of training page</p>\r\n', '1', '0', '0.000', '0.000', '9');
INSERT INTO `content` VALUES ('111', 'TEXT', '<p>advertising page main heading</p>\r\n', '1', '0', '0.000', '0.000', '12');
INSERT INTO `content` VALUES ('112', 'HTML', '<p>content under main heading of the advertising page</p>\r\n', '1', '0', '0.000', '0.000', '12');
INSERT INTO `content` VALUES ('113', 'IMAGE', '<p>images for advertiseing page</p>\r\n', '1', '1', '182.000', '221.000', '12');
INSERT INTO `content` VALUES ('114', 'TEXT', '<p>studio page&nbsp; text above the image</p>\r\n', '1', '0', '0.000', '0.000', '11');
INSERT INTO `content` VALUES ('115', 'IMAGE', '<p>studio page middle image</p>\r\n', '1', '1', '236.000', '310.000', '11');
INSERT INTO `content` VALUES ('116', 'HTML', '<p>studio page bottom html under the image</p>\r\n', '1', '0', '0.000', '0.000', '11');
INSERT INTO `content` VALUES ('117', 'TEXT', '<p>venue page first text content under the banner section</p>\r\n', '1', '0', '0.000', '0.000', '10');
INSERT INTO `content` VALUES ('118', 'IMAGE', '<p>venue page left side image</p>\r\n', '1', '1', '290.000', '400.000', '10');
INSERT INTO `content` VALUES ('119', 'IMAGE', '<p>middle image of venue page</p>\r\n', '1', '1', '290.000', '400.000', '10');
INSERT INTO `content` VALUES ('120', 'IMAGE', '<p>venue page right side image</p>\r\n', '1', '1', '290.000', '400.000', '10');
INSERT INTO `content` VALUES ('121', 'HTML', '<p>main heading of venue page</p>\r\n', '1', '0', '0.000', '0.000', '10');
INSERT INTO `content` VALUES ('122', 'HTML', '<p>venue page left side total content under the main heading</p>\r\n', '1', '0', '0.000', '0.000', '10');
INSERT INTO `content` VALUES ('123', 'HTML', '<p><iframe frameborder=\"0\" scrolling=\"no\" src=\"http://vimeo.com/91040845\"></iframe></p>\r\n', '1', '0', '0.000', '0.000', '11');
INSERT INTO `content` VALUES ('125', 'TEXT', '<p>content under the first image</p>\r\n', '1', '0', '0.000', '0.000', '11');
INSERT INTO `content` VALUES ('126', 'TEXT', '<p>content above the video</p>\r\n', '1', '0', '0.000', '0.000', '11');
INSERT INTO `content` VALUES ('127', 'IMAGE', '<p>middle section images</p>\r\n', '1', '1', '112.000', '171.000', '0');
INSERT INTO `content` VALUES ('124', 'VIDEO', '<p><iframe frameborder=\"0\" scrolling=\"no\" src=\"http://vimeo.com/91040845\"></iframe></p>\r\n', '1', '0', '0.000', '0.000', '11');
INSERT INTO `content` VALUES ('128', 'IMAGE', '<p>range page big image comes on popup</p>\r\n', '1', '1', '600.000', '800.000', '7');
INSERT INTO `content` VALUES ('129', 'IMAGE', '<p>range map</p>\r\n', '1', '1', '408.000', '562.000', '7');
INSERT INTO `content` VALUES ('130', 'IMAGE', '<p>map small</p>\r\n', '1', '1', '409.000', '562.000', '7');
INSERT INTO `content` VALUES ('131', 'IMAGE', '<p>original that is use as small</p>\r\n', '1', '1', '421.000', '561.000', '7');
INSERT INTO `content` VALUES ('134', 'IMAGE', '<p>range new banner</p>\r\n', '1', '0', '286.000', '998.000', '7');

-- ----------------------------
-- Table structure for `content_info`
-- ----------------------------
DROP TABLE IF EXISTS `content_info`;
CREATE TABLE `content_info` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `content_id` bigint(255) DEFAULT NULL,
  `content_type` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=252 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of content_info
-- ----------------------------
INSERT INTO `content_info` VALUES ('1', '16', 'xzczxcxz');
INSERT INTO `content_info` VALUES ('2', '18', 'rtyr');
INSERT INTO `content_info` VALUES ('3', '18', 'fdhfd');
INSERT INTO `content_info` VALUES ('4', '18', 'test1');
INSERT INTO `content_info` VALUES ('5', '18', 'test2');
INSERT INTO `content_info` VALUES ('11', '17', 'test');
INSERT INTO `content_info` VALUES ('30', null, null);
INSERT INTO `content_info` VALUES ('36', '1', '1396174063.jpg');
INSERT INTO `content_info` VALUES ('37', '7', '1396168132.jpg');
INSERT INTO `content_info` VALUES ('38', '7', '1396174326.jpg');
INSERT INTO `content_info` VALUES ('39', '19', 'America\'s Secret Range');
INSERT INTO `content_info` VALUES ('40', '20', '\"The most famous range you never heard of.\"');
INSERT INTO `content_info` VALUES ('41', '21', 'Many of America\'s most elite tactical operators been quietly training over the past few years at a place you probably never heard of: Cowtown, Arizona... Not exactly a household name in the shooting world, but a sampling of customers who use Cowtown includes US Army Special Forces, Rangers and National Guard Units, Air force Special Operations, Marine Recon and Scout Snipers');
INSERT INTO `content_info` VALUES ('49', '23', '1396184701.jpg');
INSERT INTO `content_info` VALUES ('50', '24', '1396185109.png');
INSERT INTO `content_info` VALUES ('51', '24', '1396185115.png');
INSERT INTO `content_info` VALUES ('52', '24', '1396185119.png');
INSERT INTO `content_info` VALUES ('53', '25', '1396189759.png');
INSERT INTO `content_info` VALUES ('54', '26', 'RANGE');
INSERT INTO `content_info` VALUES ('56', '28', 'West Shooting Range');
INSERT INTO `content_info` VALUES ('57', '29', 'West Range Platform 1');
INSERT INTO `content_info` VALUES ('59', '31', 'West Range Platform 2');
INSERT INTO `content_info` VALUES ('61', '33', 'West Range Platform 3');
INSERT INTO `content_info` VALUES ('64', '36', 'Ideally suited for long range rifle shooting engaging steel at known and unknown distances from 100 - 1800 yards.  Angle shooting can also be accomplished from this platform and can accommodate up to 20 students.');
INSERT INTO `content_info` VALUES ('65', '38', 'West Range Saddle');
INSERT INTO `content_info` VALUES ('66', '39', 'Ideally suited for long range rifle shooting engaging steel at known and unknown distances from 100 - 1800 yards.  Angle shooting can also be accomplished from this platform and can accommodate up to 20 students.');
INSERT INTO `content_info` VALUES ('67', '40', 'West 100 Yard Range');
INSERT INTO `content_info` VALUES ('68', '41', 'Our spacious 100 yard range can accommodate up to 20 students and has the capability of engaging targets out to a distance of 200 yards.');
INSERT INTO `content_info` VALUES ('69', '42', 'Afghan Village');
INSERT INTO `content_info` VALUES ('70', '43', 'This area is ideally suited for close quarters combat (CQB), room clearing and hostage rescue training scenarios to name a few.  It is also an excellent area for conducting convoy/vehicle training as well as improvised explosive device (IED) simulations and training.  The topography and structures are ideal to simulate current theater of operations.');
INSERT INTO `content_info` VALUES ('71', '44', 'Yellow House');
INSERT INTO `content_info` VALUES ('72', '45', 'Law Enforcement and Military utilize this structure to conduct building interdictions, room clearing, close quarter combat (CQB), hostage rescue as well as drug lab scenario training.');
INSERT INTO `content_info` VALUES ('73', '46', 'West Helicopter Landing Zone (HLZ)');
INSERT INTO `content_info` VALUES ('74', '47', 'The West Shooting Range HLZ is located behind the Yellow House and is ideal for insertions and extractions.  If you have the need for air support in your training we have thought of that.');
INSERT INTO `content_info` VALUES ('75', '48', 'East Shooting Range');
INSERT INTO `content_info` VALUES ('76', '49', '1396245760.png');
INSERT INTO `content_info` VALUES ('77', '50', '1396246282.png');
INSERT INTO `content_info` VALUES ('88', '53', 'Bay  1');
INSERT INTO `content_info` VALUES ('89', '54', 'Well suited for smaller classes up to 10 students.  Can be utilized for pistol, carbine and shotgun training.');
INSERT INTO `content_info` VALUES ('90', '55', '1396369713.jpg');
INSERT INTO `content_info` VALUES ('91', '56', 'Bay  2');
INSERT INTO `content_info` VALUES ('93', '58', '1396370122.jpg');
INSERT INTO `content_info` VALUES ('94', '59', 'Bay  3');
INSERT INTO `content_info` VALUES ('97', '62', 'Bay  4');
INSERT INTO `content_info` VALUES ('100', '65', 'Bay  5');
INSERT INTO `content_info` VALUES ('102', '67', '1396374747.jpg');
INSERT INTO `content_info` VALUES ('103', '68', 'Bay 6');
INSERT INTO `content_info` VALUES ('105', '70', '1396375096.jpg');
INSERT INTO `content_info` VALUES ('106', '71', 'Shoot House');
INSERT INTO `content_info` VALUES ('107', '72', 'Our Shoot House is available for our Law Enforcement and approved Shooting Group partners. ');
INSERT INTO `content_info` VALUES ('108', '73', '1396375333.jpg');
INSERT INTO `content_info` VALUES ('109', '74', 'East 100 Yard Range');
INSERT INTO `content_info` VALUES ('110', '75', ' This designated range can accommodate up to 20 students and is capable of extending the shooting distance out further based upon your training needs.  Please inquire for details.               ');
INSERT INTO `content_info` VALUES ('111', '76', '1396375806.jpg');
INSERT INTO `content_info` VALUES ('112', '77', 'East Range Platform 1');
INSERT INTO `content_info` VALUES ('114', '79', '1396376641.jpg');
INSERT INTO `content_info` VALUES ('115', '80', 'East Helicopter Landing Zone (HLZ)');
INSERT INTO `content_info` VALUES ('116', '81', 'The East Shooting Range HLZ is located near the entrance to the East Shooting Range and is capable of supporting several helicopters.  If you have the need for air support in your training we have thought of that and can provide options to ensure success for your training needs.   ');
INSERT INTO `content_info` VALUES ('117', '82', '1396376889.jpg');
INSERT INTO `content_info` VALUES ('118', null, null);
INSERT INTO `content_info` VALUES ('119', '83', '1396378090.png');
INSERT INTO `content_info` VALUES ('120', '84', '1396378545.png');
INSERT INTO `content_info` VALUES ('121', '85', '1396378955.png');
INSERT INTO `content_info` VALUES ('122', '86', '1396379320.png');
INSERT INTO `content_info` VALUES ('123', '87', '1396379607.png');
INSERT INTO `content_info` VALUES ('124', '88', '1396380065.png');
INSERT INTO `content_info` VALUES ('125', '90', 'Shooting Groups');
INSERT INTO `content_info` VALUES ('126', '91', 'If you currently have a shooting group or wish to form one operating out of Cowtown please contact us for more information.  We require a minimum of 10 people in the group and that you provide a list of all authorized people in your group.  Additionally, we require a copy of your current in force insurance certificate as well as proof of Range Safety Officer (RSO) certification(s).  A minimum of one (1) member must hold a current RSO certification and that person must be identified.  If you do not have an RSO, Cowtown can provide one for a fee. ');
INSERT INTO `content_info` VALUES ('127', '92', 'Private Memberships');
INSERT INTO `content_info` VALUES ('129', '93', 'If you are looking for a unique way to entertain your clients, staff or customers, or if a private membership is of interest to you, Cowtown has you covered.  We offer private, exclusive memberships for use of our range and have several options and pricing levels to meet your needs.  Please contact us to discuss this further.');
INSERT INTO `content_info` VALUES ('130', '94', 'Cowboy Shooting');
INSERT INTO `content_info` VALUES ('132', '96', '1396382407.png');
INSERT INTO `content_info` VALUES ('133', '52', '1396414856.jpg');
INSERT INTO `content_info` VALUES ('134', '52', '1396414861.jpg');
INSERT INTO `content_info` VALUES ('135', '52', '1396414894.jpg');
INSERT INTO `content_info` VALUES ('136', '52', '1396414918.jpg');
INSERT INTO `content_info` VALUES ('137', '52', '1396414969.jpg');
INSERT INTO `content_info` VALUES ('138', '52', '1396414994.jpg');
INSERT INTO `content_info` VALUES ('139', '52', '1396415006.jpg');
INSERT INTO `content_info` VALUES ('140', '52', '1396415027.jpg');
INSERT INTO `content_info` VALUES ('143', '89', '1396463008.png');
INSERT INTO `content_info` VALUES ('147', '99', ' To schedule an event at Cowtown, contact us here: <a href=\"mailto:scheduling@azcowtown.com\"><strong>scheduling@azcowtown.com</strong></a>                                                                                               ');
INSERT INTO `content_info` VALUES ('150', '102', 'Cowtown Training Division');
INSERT INTO `content_info` VALUES ('151', '103', '<p>The Training Cadre at Cowtown is carefully selected from an intentionally eclectic mix of various desired backgrounds, each conducive to the diverse and unique clients Cowtown serves with our training courses. Some of these professional backgrounds include; Military Spec Ops units, including the Tier-1 units at the cutting edge tactical development, Federal and Local Law Enforcement, Tactical Medicine, Civilian Shooting Competitors, Canine, and others. By deliberately selecting a diverse training cadre, Cowtown can effectively address the unique concerns of the varied clients who seek training at Cowtown. One example of this benefit is recognizing the difference between military rules of engagement (ROE) and the law enforcement use of force continuum when training our clients in the various tactical skill sets.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>In addition to this diversity, we have also placed significant value on the inter-personal skills necessary for instructors to effectively relay the information to our clients. In the end, Cowtown&acirc;&euro;&trade;s clients get the best of all possible worlds, with information from across the board, which can be directly applied to the clients&acirc;&euro;&trade; specific needs.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Types of training to be expected at Cowtown are subjects that cover the entire spectrum from Practical to Tactical in: Pistol, Carbine, Long Rifle, Emergency Medical, and Canine skill sets.</p>\r\n');
INSERT INTO `content_info` VALUES ('152', '104', 'Testimonials');
INSERT INTO `content_info` VALUES ('153', '105', 'I am incredibly impressed with both the facilities and the staff at Cowtown Range. They \"get\" training and are providing an outstanding service to those in their region and those, like me, who travel from around the country to utilize their outstanding square, scenario and unorthodox range areas. I very much look forward to having Cowtown as a regular stop on the training schedule for years to come!<br />\r\n\r\n<strong>- Rob Pincus, I.C.E. Training Company</strong>');
INSERT INTO `content_info` VALUES ('154', '106', ' I had a great time training folks out at Cow Town Range. I ran into a logistical nut role at the onset that could have been a show stopper but the Cow Town Staff (Paul Mueller) saved the day by bending over backwards to assist in logistical and administrative support. Looking forward to getting back out there to see the range improvements.<br />\r\n\r\n<strong>- Pat McNamara, TMACS INC \"Discover Performance\"</strong>');
INSERT INTO `content_info` VALUES ('155', '107', '1396635365.png');
INSERT INTO `content_info` VALUES ('158', '110', 'To become a CowTown Training Partner, contact <a href=\"mailto:info@azcowtown.com\"><strong>info@azcowtown.com</strong></a>     ');
INSERT INTO `content_info` VALUES ('159', '111', 'ADVERTISING');
INSERT INTO `content_info` VALUES ('160', '112', 'Interested in advertising with CowTown? Contact us at <span style=\"color:#fd9b00;\"><a href=\"mailto:info@azcowtown.com\" style=\"color:#FD9B00 ;\">info@azcowtown.com</a></span>  to learn about advertising opportunities at the range, on our website, or as a sponsor! <br />\r\n<br />\r\n<strong style=\"color:#fd9b00; font-size:18px;\">Here are some of our sponsors: </strong>');
INSERT INTO `content_info` VALUES ('161', '113', '1396638095.png');
INSERT INTO `content_info` VALUES ('162', '113', '1396638096.png');
INSERT INTO `content_info` VALUES ('163', '113', '1396638098.png');
INSERT INTO `content_info` VALUES ('164', '113', '1396638100.png');
INSERT INTO `content_info` VALUES ('165', '113', '1396638125.png');
INSERT INTO `content_info` VALUES ('166', '113', '1396638126.jpg');
INSERT INTO `content_info` VALUES ('167', '113', '1396638128.jpg');
INSERT INTO `content_info` VALUES ('168', '113', '1396638129.jpg');
INSERT INTO `content_info` VALUES ('169', '114', 'Cowtown Studios is home to over 200 movie productions, several film trailers and sizzle reals, documentaries and commercial photo shoots. Cowtown has much to offer for your next film production or photo shoot. ');
INSERT INTO `content_info` VALUES ('171', '116', 'Cowtown\'s western town is a great place for commercial photo and film shoots, with its aged patina facades. Our western town has a old western saloon, hotel, jail, blacksmith shop, printshop and other buildings to choose from, along with plenty of room to build more sets to fit your filming needs. The western street scene is designed for green screens to be placed at the ends of the street. We have a old world town, which has been used as a Middle Eastern or Mexican Village, with plenty of room to add sets and green screens. Cowtown has multiple dirt roads,beautiful desert vistas and a small pond available for you Mohave Desert filming needs. We also have to offer a single story abandoned trashed house, great for that seedy criminal desert element. <br />\r\n<br />\r\nOne of the latest filming trends today is live fire action shooting scenes and explosions, which Cowtown Studios can accommodate. <br />\r\n<br />\r\nTo schedule use of the CowTown Studio, please contact: <a href=\"#\" style=\"color:#fff; text-decoration:underline;\">info@azcowtown.com</a>');
INSERT INTO `content_info` VALUES ('172', '117', 'Cowtown is home to a unique venue, perfect for your next event.  Our Ghost Town, Afghan/Mexican style village have been home to many movies and private/commercial photography.  The rich patinas only available at Cowtown are the perfect backdrop for marketing photography/filming and your next event.  Please contact us for more information.  Some examples of what our facility is capable of hosting are:');
INSERT INTO `content_info` VALUES ('173', '118', '1396641203.jpg');
INSERT INTO `content_info` VALUES ('174', '119', '1396641276.jpg');
INSERT INTO `content_info` VALUES ('175', '120', '1396641337.jpg');
INSERT INTO `content_info` VALUES ('176', '121', '<h6 style=\"font-size:22px; text-align:center; padding:0 0 10px 0;\">What would <span style=\"color:#fda000;\">You</span> make your <span style=\"color:#fda000;\">Cow Town</span> experience?</h6>          ');
INSERT INTO `content_info` VALUES ('177', '122', '\r\n<p style=\"font-size:16px; padding-bottom:20px;\">Here are a few examples of things we are already set up to accommodate:</p>\r\n\r\n\r\n<ul>\r\n<li>Mud Run</li>\r\n<li>	Biathlon\'s</li>\r\n<li>	Corporate Events</li>\r\n<li>	Farmer\'s Market</li>\r\n<li>	Festivals</li>\r\n<li>	Private Parties</li>\r\n<li>	Large Events/Room for Tents</li>\r\n<li>	Concerts</li>\r\n<li>	Weddings</li>\r\n<li>	Natural Pond</li>\r\n<li>	Shooting Events/Competitions</li>\r\n<li>	Car/Motorcycle/Boat Shows</li>\r\n<li>	Trade Shows</li>\r\n<li>	Filming/photography</li>\r\n\r\n\r\n\r\n</ul>\r\n');
INSERT INTO `content_info` VALUES ('182', '108', '<h4>Craig Sawyer</h4>\r\n\r\n<p>Cowtown Management Group - Director of Training Operations<br />\r\n<br />\r\nCraig &quot;Sawman&quot; Sawyer has an extensive tactical background including U.S. Marine Corps, U.S. Navy SEAL Team One and DEVGRU Operator, U.S. Federal Law Enforcement Agent and Manager, U.S. Government Tactical Contractor, Film and Television Producer, Host and Advanced Tactical Trainer.</p>\r\n\r\n<div class=\"clear\">&nbsp;</div>\r\n\r\n<p>&nbsp;</p>\r\n');
INSERT INTO `content_info` VALUES ('183', '97', '<p><span>Want to schedule an event?</span></p>\r\n\r\n<h1>Contact Us at:</h1>\r\n\r\n<p><a href=\"mailto:scheduling@azcowtown.com\"><strong style=\"padding-bottom: 5px;\">scheduling@azcowtown.com</strong></a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div class=\"contact-info\">\r\n<h2>COWTOWN PAINTBALL</h2>\r\nHours of operation:<br />\r\n<br />\r\n<span>Winter Hours</span><br />\r\nSaturday: 8:00am - 5:00pm<br />\r\nSunday: 8:00am - 5:00pm<br />\r\n<br />\r\n<span>Summer Hours</span><br />\r\nSaturday: 6:00am - 12:00pm<br />\r\nSunday: 6:00am - 12:00pm</div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n');
INSERT INTO `content_info` VALUES ('190', '100', 'Make CowTown the home of all your training needs, by scheduling a course through the CowTown Training division, or one of our many partners listed below! ');
INSERT INTO `content_info` VALUES ('192', '101', 'CowTown Training Division');
INSERT INTO `content_info` VALUES ('194', '98', '<h2>UPCOMING EVENTS</h2>\r\n\r\n<h3>FEBRUARY</h3>\r\n\r\n<p><span>13th</span>&nbsp;- RECOIL Magazine www.recoilweb.com/<br />\r\n<span>15th</span>&nbsp;- Well Armed Woman www.thewellarmedwoman.com/chapter/locate<br />\r\n<span>22nd</span>&nbsp;- Phoenix Firearms Network www.phoenixfirearmstraining.com/<br />\r\n<span>23rd</span>&nbsp;-25th - Rob Pincus I.C.E. Training www.icetraining.us/<br />\r\n<span>28th</span>&nbsp;- March 2nd - Independence Training www.independencetraining.com/</p>\r\n\r\n<h3>MARCH</h3>\r\n\r\n<p><span>23rd</span>&nbsp;- Well Armed Woman www.thewellarmedwoman.com/chapter/locate<br />\r\n<span>27th</span>&nbsp;- Stoic Ventures Mike Lamb. Combat Pistol<br />\r\n<span>28th</span> -&nbsp;ARES Security<br />\r\n<span>28th</span>&nbsp;- Stoic Ventures Mike Lamb. Combat Carbine<br />\r\n<span>29-30th</span>&nbsp;- Stoic Ventures Mike Lamb. Precision Rifle/<br />\r\nFor more information contact Mike Lamb at Stoic Ventures <span><span class=\"skype_c2c_print_container\">408-641-9448</span><span class=\"skype_c2c_container\" dir=\"ltr\" onmouseout=\"SkypeClick2Call.MenuInjectionHandler.hideMenu(event)\" onmouseover=\"SkypeClick2Call.MenuInjectionHandler.showMenu(this, event)\" skype_menu_props=\"{&quot;numberToCall&quot;:&quot;+14086419448&quot;,&quot;isFreecall&quot;:false,&quot;isMobile&quot;:false,&quot;isRtl&quot;:false}\" tabindex=\"-1\"><span class=\"skype_c2c_highlighting_inactive_common\" dir=\"ltr\" skypeaction=\"skype_dropdown\"><span class=\"skype_c2c_textarea_span\"><img class=\"skype_c2c_logo_img\" src=\"resource://skype_ff_extension-at-jetpack/skype_ff_extension/data/call_skype_logo.png\" /><span class=\"skype_c2c_text_span\">408-641-9448</span></span></span></span><br />\r\n<span><a href=\"http://www.stoicventures.com/schedule/\" target=\"_blank\"><span>www.stoicventures.com/schedule/</span></a><br />\r\n<span><span><a href=\"http://www.stoicventures.com/\" target=\"_blank\">stoicventures.com</a>&nbsp;&nbsp;</span></span></span></span></p>\r\n\r\n<h3>April</h3>\r\n\r\n<p><span>17th</span> - Santan Gear Law Enforcement Demo Day (Closed to Law Enforcement Only). www.santangear.com</p>\r\n\r\n<h3>MAY</h3>\r\n\r\n<p><span>4th</span>&nbsp;- ASRPA Day www.asrpa.com/</p>\r\n\r\n<p><span>5 - 10th</span> - SWAT Rodeo. &nbsp;Click here for the video http://bit.ly/P9AAP5 &nbsp;Go here for more information http://bit.ly/Oxa5CS</p>\r\n\r\n<div class=\"skype_c2c_menu_container\" id=\"skype_c2c_menu_container\" onmouseout=\"SkypeClick2Call.MenuInjectionHandler.hideMenu(event)\" onmouseover=\"SkypeClick2Call.MenuInjectionHandler.showMenu(this, event)\" style=\"display: none;\">\r\n<div class=\"skype_c2c_menu_click2call\"><a class=\"skype_c2c_menu_click2call_action\" id=\"skype_c2c_menu_click2call_action\">Call</a></div>\r\n\r\n<div class=\"skype_c2c_menu_click2sms\"><a class=\"skype_c2c_menu_click2sms_action\" id=\"skype_c2c_menu_click2sms_action\">Send SMS</a></div>\r\n\r\n<div class=\"skype_c2c_menu_add2skype\"><a class=\"skype_c2c_menu_add2skype_text\" id=\"skype_c2c_menu_add2skype_text\">Add to Skype</a></div>\r\n\r\n<div class=\"skype_c2c_menu_toll_info\"><span class=\"skype_c2c_menu_toll_callcredit\">You&#39;ll need Skype Credit</span><span class=\"skype_c2c_menu_toll_free\">Free via Skype</span></div>\r\n</div>\r\n');
INSERT INTO `content_info` VALUES ('200', '22', '<p>&nbsp; Many of America&#39;s most elite tactical operators been quietly training over the past few years at a place you probably never heard of: Cowtown, Arizona... Not exactly a household name in the shooting world, but a sampling of customers who use Cowtown includes US Army Special Forces, Rangers and National Guard Units, Air force Special Operations, Marine Recon and Scout Snipers, US Coast Guard law enforcement and sniper units, US Navy SEAL teams, including Seal Team Six, several federal agencies, including the FBI, Pentagon Police, US Marshalls, DHS, Department of Energy (nuclear security) and some &quot;three letter&quot; agencies that avoid publicity. Police special units include Las Vegas Swat, LAPD, LA County Swat, Phoenix SAU, and several dozen others.</p>\r\n\r\n<p><br />\r\nSo what does Cowtown have to offer that motivates these elite organizations to come from States across America for training? &nbsp;To begin with, it&#39;s close in still but out of sight, offers flexible day or night shooting schedules, looks a lot like Afghanistan and provides training support by veteran combat marksmen</p>\r\n\r\n<p>&nbsp;<br />\r\nThe Cowtown Range is approximately 80 acres of hills and valleys located in Peoria just south of Lake Pleasant, adjacent to the Agua Fria River and surrounded by State land. The terrain is a mixture of washes, open spaces and hills which accommodates camouflage, tracking, K-9 exercises and advanced night vision exercises. None of these training missions are feasible on traditional flat shooting ranges.</p>\r\n\r\n<p><br />\r\nThe property has a long history as a unique shooting facility. &nbsp;In 1973, stuntman Ron Nix built Cowtown as a movie studio, general entertainment and shooting facility (mostly western style and fast draw competitions). Over the years, more than 200 movies were made here, including a few notable films such as Knight Rider 2010, Billy Jack and Dead Man with Johnny Depp. &nbsp;The movie set buildings provide an environment much like an Afghan Village and the rough terrain permits &quot;real world&quot; challenges in the form of precision shooting at unusual angles and targeting in natural terrain. The range has been evaluated by GSA and approved as a federal shooting facility.</p>\r\n\r\n<p><br />\r\nCowtown was acquired in 1994 as an outdoor resource for our indoor range (Shooters World) and as a recreation and entertainment venue. From that time to the present Cowtown has hosted Movie and TV productions, Western Shooting Clubs, Corporate events, Shooting Competitions, Western Festivals and Tactical Firearms Training.</p>\r\n\r\n<p><br />\r\nSome of the best Cowboy Action Shooters in America have called Cowtown &nbsp;home since the Cowtown Cowboy Shooters &nbsp;held the First Arizona State Championship of Cowboy Shooting in 1981 (now members of SASS).</p>\r\n\r\n<p><br />\r\nThe origins of tactical training begin approximately twelve years ago when Bill Graves (a former Shooter&#39;s World instructor) formed GPS Defense to teach precision marksmanship and military snipers. Early customers included SEAL teams and FBI (HRT) units.</p>\r\n\r\n<p><br />\r\nThe recognition of Cowtown as a significant contributor to Homeland Defense training is a significant point of pride for us and future training programs will include specialized Joint Operations Training for Disaster and Emergency Preparedness.</p>\r\n\r\n<p><br />\r\nCurrent regular users and trainers include the Cowtown Cowboy Shooters Assn, Cowtown Paintball, GPS Defense, a leading provider of institutional security services, and. local gun manufactures McMillan Rifle and POF. Cowtown has also hosted classes conducted by many nationally recognized firearm trainers, including Rob Pincus, Travis Haley, Larry Vickers, Pat McNamara and Mike Lamb.</p>\r\n\r\n<p><br />\r\nCowtown will continue to provide a safe and secure facility to accommodate a large diversity of shooting styles. Although we are not currently able to accommodate individual shooters (who are not members of an existing club or training group), all our training groups have programs that include civilian students, at all levels of experience.</p>\r\n\r\n<p><br />\r\nThe Ben Avery Shooting Range, owned and operated by Arizona Fish and Game, is 8 miles east of Cowtown, and with over 250,000 shooters per year often gets pretty crowded. &nbsp;Fish &amp; Game executives recognize we are less busy and can offer considerably more flexibility in scheduling and types of shooting uses, and have been supportive in every possible way.</p>\r\n\r\n<p><br />\r\nFor further information, please contact Steve Simon or Paul Mueller at Cowtown Management Group 480-907-6333.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Richard Shaw is principal owner of Cowtown, a Co-founder of Shooters World, a lifetime member of NRA, past president of the Arizona Historical Society and an Arizona native.<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n\r\n<p>Many of America&#39;s most elite tactical operators been quietly training over the past few years at a place you probably never heard of: Cowtown, Arizona... Not exactly a household name in the shooting world, but a sampling of customers who use Cowtown includes US Army Special Forces, Rangers and National Guard Units, Air force Special Operations, Marine Recon and Scout Snipers, US Coast Guard law enforcement and sniper units, US Navy SEAL teams, including Seal Team Six, several federal agencies, including the FBI, Pentagon Police, US Marshalls, DHS, Department of Energy (nuclear security) and some &quot;three letter&quot; agencies that avoid publicity. Police special units include Las Vegas Swat, LAPD, LA County Swat, Phoenix SAU, and several dozen others.</p>\r\n');
INSERT INTO `content_info` VALUES ('205', '115', '1400464584.jpg');
INSERT INTO `content_info` VALUES ('207', '51', '1400464737.jpg');
INSERT INTO `content_info` VALUES ('210', '123', '<iframe width=\"1280\" height=\"720\" src=\"//www.youtube.com/embed/7IhubtgQAF8\" frameborder=\"0\" allowfullscreen></iframe>\r\n');
INSERT INTO `content_info` VALUES ('211', '109', '<ul>\r\n	<li>Alias <a href=\"http://aliastraining.com/\" target=\"_blank\"><span>www.aliastraining.com/</span></a></li>\r\n	<li>Bullet Proof Securities <a href=\"http://www.bulletproofsecurities.com/\" target=\"_blank\"><span>www.bulletproofsecurities.com/</span></a></li>\r\n	<li>GPS Defense Sniper School <a href=\"http://sniperschool.com/\" target=\"_blank\"><span>sniperschool.com/</span></a></li>\r\n	<li>Grey Group <a href=\"http://www.greygrouptraining.com/\" target=\"_blank\"><span> www.greygrouptraining.com/</span></a></li>\r\n	<li>Independence Training <a href=\"http://www.independencetraining.com/\" target=\"_blank\"><span>www.independencetraining.com</span></a></li>\r\n	<li>McMillan International <a href=\"http://www.mcmfamily.com/\" target=\"_blank\"><span>www.mcmfamily.com/</span></a></li>\r\n	<li>Mike Lamb Stoic Ventures Training &amp; Consulting <a href=\"http://www.stoicventures.com/\" target=\"_blank\"><span>www.stoicventures.com</span></a></li>\r\n	<li>Pat McNamara TMACS Inc. <a href=\"http://www.tmacsinc.com/\" target=\"_blank\"><span> www.tmacsinc.com/</span></a></li>\r\n	<li>Rob Pincus I.C.E Training <a href=\"http://www.icetraining.us/robpincus.html\" target=\"_blank\"><span>www.icetraining.us/robpincus.html</span></a></li>\r\n	<li>Tactical Insider <a href=\"http://www.tacticalinsider.com/\" target=\"_blank\"><span>www.tacticalinsider.com/</span></a></li>\r\n	<li>Travis Haley Haley Strategic Partners <a href=\"http://www.haleystrategic.com/\" target=\"_blank\"><span>www.haleystrategic.com/</span></a></li>\r\n</ul>\r\n');
INSERT INTO `content_info` VALUES ('212', '125', 'Cowtown Motion Picture Studios is Arizona\'s preeminent film production destination with a long history of providing the setting for over 200 Hollywood and independent films as well as dozens of powerful, thought provoking photo shoots.  Just south of Lake Pleasant in Peoria, AZ, Cowtown Motion Picture Studios and Shooting Range showcases over 80 private acres of sprawling high-desert landscape which includes two western town sets and a detailed Afghan village featuring topography indicative to current theater of operations. ');
INSERT INTO `content_info` VALUES ('214', '127', '1400696894.jpg');
INSERT INTO `content_info` VALUES ('215', '127', '1400696900.jpg');
INSERT INTO `content_info` VALUES ('216', '127', '1400696905.jpg');
INSERT INTO `content_info` VALUES ('217', '127', '1400696909.jpg');
INSERT INTO `content_info` VALUES ('218', '127', '1400696913.jpg');
INSERT INTO `content_info` VALUES ('219', '126', 'Recent projects include productions by Lionsgate Entertainment, Aerial Filmworks and NBC as well as hosting prominent actors like Johnny Depp. Featuring rugged terrain blended with beautiful Arizona sunsets and onsite buildings like a western town and Afghan village with live fire capabilities, Cowtown is positioned to be Hollywood\'s destination of choice for upcoming projects featuring a Southwest setting.\r\n');
INSERT INTO `content_info` VALUES ('220', '57', 'Ideal for pistol, carbine and shotgun training\r\nMeasurements:50 yards deep 26 yards wide\r\n');
INSERT INTO `content_info` VALUES ('221', '60', 'Ideal for pistol, carbine and shotgun training\r\nMeasurements:50 yards deep 30 yards wide\r\n');
INSERT INTO `content_info` VALUES ('222', '63', 'Ideal for pistol, carbine and shotgun training\r\nMeasurements:45 yards deep 25 yards wide\r\n\r\n');
INSERT INTO `content_info` VALUES ('223', '66', ' Ideal for pistol, carbine and shotgun training\r\nMeasurements:45 yards deep 35 yards wide\r\n');
INSERT INTO `content_info` VALUES ('224', '69', 'Ideal for pistol, carbine and shotgun training\r\nMeasurements:40 yards deep 26 yards wide\r\n\r\n');
INSERT INTO `content_info` VALUES ('226', '78', 'Ideally suited for long range rifle shooting engaging steel at known and unknown distances from 200 yards and capable of reaching out to 800+ on our West Shooting Range.  Angle shooting can also be accomplished from this platform and can accommodate up to 20 students ');
INSERT INTO `content_info` VALUES ('227', '32', 'Ideally suited for long range rifle shooting engaging steel at known and unknown distances from 200 - 1000 yards.  Angle shooting can also be accomplished from this platform and can accommodate up to 20 students.');
INSERT INTO `content_info` VALUES ('228', '30', 'Ideally suited for long range rifle shooting engaging steel at known and unknown distances from 200- 800 yards.  Angle shooting can also be accomplished from this platform and can accommodate up to 20 students.');
INSERT INTO `content_info` VALUES ('229', '34', 'Ideally suited for long range rifle shooting engaging steel at known and unknown distances from 200- 1000 yards.  Angle shooting can also be accomplished from this platform and can accommodate up to 20 students.');
INSERT INTO `content_info` VALUES ('230', '27', '<p>The East Shooting Range is our traditional flat range and is comprised of several great amenities, including 6 Shooting Bays which are all a minimum of 50 yards deep. &nbsp;A Shoot House is available for our Law Enforcement and approved Shooting Group partners as well as a 100 yard range, capable of supporting out to 200 yards (with Cowtown approval). &nbsp;Additionally our East Shooting Range has a Shooting Platform capable of engaging steel targets from 100 - 1200 yards and capable of reaching out to 1800+ on our West Shooting Range.</p>\r\n\r\n<p><br />\r\nThe West Shooting Range is a rugged, real world terrain indicative of what our military currently operates in. &nbsp;The West Shooting Range consists of 4 Shooting Platforms, an Afghan/Mexican Village and a 100 Yard Range. &nbsp;Highlighted as well on our West Shooting Range is the Yellow House. &nbsp;The house has been used by both Law Enforcement, Military and other Government Agencies for building interdictions, as well specific training exercises including hostage rescue and drug lab scenarios to name a few.</p>\r\n\r\n<p><br />\r\nThe Cowtown Cowboy Action Shooters are also located on the West Shooting Range in a designated area. &nbsp;If you are part of the S.A.S.S. community or new to this shooting sport and would like to get involved with them please visit their webpage at www.ccsa-az.us/index.htm or email at <a href=\"mailto:snow.g@att.net\" style=\"color:#FD9B00\">snow.g@att.net</a>.</p>\r\n');
INSERT INTO `content_info` VALUES ('231', '64', '1401687189.png');
INSERT INTO `content_info` VALUES ('234', '128', '1401688018.jpg');
INSERT INTO `content_info` VALUES ('238', '61', '1401688726.png');
INSERT INTO `content_info` VALUES ('239', '129', '1401689020.png');
INSERT INTO `content_info` VALUES ('241', '35', 'West Range Platform 4');
INSERT INTO `content_info` VALUES ('243', '95', '<p>Cowtown Cowboy Action Shooting is a multi-faceted shooting sport in which contestants compete with firearms typical of those used in the taming of the Old West: single action revolvers, pistol caliber lever action rifles, and old time shotguns. The shooting competition is staged in a unique, characterized, &quot;Old West&quot; style. It is a timed sport in which shooters compete for prestige on a course of different shooting stages. Each scenario, as they are called, features an array of situations, many based on famous incidents or movies scenes, in which the shooters must test their mettle against steel targets.<br />\r\n<br />\r\nOne of the unique aspects of Cowboy Action Shooting is the use of aliases and costuming. Each participant adopts a shooting alias appropriate to a character or profession of the late 19th century, a Hollywood western star, or an appropriate character from fiction.<br />\r\n<br />\r\nTheir costume is then developed accordingly. Many event participants gain more enjoyment from the costuming aspect of our sport than from the shooting competition, itself. Regardless of an individual&#39;s area of interest, CAS events provide regular opportunities for fellowship and fun with like-minded folks and families.<br />\r\nTo join the Cowboy Shooters, contact us at <strong><a href=\"mailto:barbwire@ccsa-az.us\" style=\"color:#FD9B00\">barbwire@ccsa-az.us</a></strong>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"padding:25px 0 0 0; line-height:24px; font-size:13px;\">To schedule a day at the range, contact us at <strong><a href=\"mailto:scheduling@azcowtown.com\" style=\"color:#FD9B00\">scheduling@azcowtown.com</a></strong></p>\r\n');
INSERT INTO `content_info` VALUES ('244', '130', '1401690875.png');
INSERT INTO `content_info` VALUES ('246', '131', '1401691914.jpg');
INSERT INTO `content_info` VALUES ('247', '132', '1401694003.png');
INSERT INTO `content_info` VALUES ('248', '133', '1401694369.png');
INSERT INTO `content_info` VALUES ('251', '134', '1401696221.png');

-- ----------------------------
-- Table structure for `country`
-- ----------------------------
DROP TABLE IF EXISTS `country`;
CREATE TABLE `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_name` varchar(250) NOT NULL DEFAULT '',
  `lang_id` int(11) NOT NULL DEFAULT '0',
  `currency_id` int(11) NOT NULL DEFAULT '0',
  `product_available` varchar(50) NOT NULL DEFAULT '',
  `vat_applicable` tinyint(4) NOT NULL DEFAULT '0',
  `s_iso_code` varchar(10) NOT NULL DEFAULT '',
  `s_region` varchar(25) NOT NULL DEFAULT '',
  `flag` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=277 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of country
-- ----------------------------
INSERT INTO `country` VALUES ('1', 'Afghanistan', '21', '3', '2', '1', 'AF', 'Asia', 'afghanistan.png');
INSERT INTO `country` VALUES ('2', 'Albania', '22', '6', '2', '1', 'AL', 'Europe', 'albania.png');
INSERT INTO `country` VALUES ('3', 'Algeria', '21', '3', '2', '1', 'DZ', 'Africa', 'algeria.png');
INSERT INTO `country` VALUES ('4', 'American Samoa', '21', '3', '2', '1', 'AS', 'Oceania', 'american_samoa.png');
INSERT INTO `country` VALUES ('5', 'Andorra', '22', '2', '2', '1', 'AD', 'Europe', 'andorra.png');
INSERT INTO `country` VALUES ('6', 'Angola', '21', '3', '2', '1', 'AO', 'Africa', 'angola.png');
INSERT INTO `country` VALUES ('7', 'Anguilla', '21', '3', '2', '1', 'AI', 'Central America and the C', 'anguilla.png');
INSERT INTO `country` VALUES ('9', 'Antigua and Barbuda', '21', '3', '2', '1', 'AG', 'Central America and the C', 'antigua_barbuda.png');
INSERT INTO `country` VALUES ('10', 'Argentina', '21', '3', '2', '1', 'AR', 'South America', 'argentina.png');
INSERT INTO `country` VALUES ('11', 'Armenia', '21', '3', '2', '1', 'AM', 'Commonwealth of Independe', 'armenia.png');
INSERT INTO `country` VALUES ('12', 'Aruba', '21', '3', '2', '1', 'AW', 'Central America and the C', 'aruba.png');
INSERT INTO `country` VALUES ('14', 'Australia', '21', '3', '2', '1', 'AU', 'Oceania', 'australia.png');
INSERT INTO `country` VALUES ('15', 'Austria', '22', '2', '2', '1', 'AT', 'Europe', 'austria.png');
INSERT INTO `country` VALUES ('16', 'Azerbaijan', '21', '3', '2', '1', 'AZ', 'Commonwealth of Independe', 'azerbaijan.png');
INSERT INTO `country` VALUES ('17', 'The Bahamas', '21', '3', '2', '1', 'BS', 'Central America and the C', 'bahamas.png');
INSERT INTO `country` VALUES ('18', 'Bahrain', '21', '3', '2', '1', 'BH', 'Middle East', 'bahrain.png');
INSERT INTO `country` VALUES ('20', 'Bangladesh', '21', '3', '2', '1', 'BD', 'Asia', 'bangladesh.png');
INSERT INTO `country` VALUES ('21', 'Barbados', '21', '3', '2', '1', 'BB', 'Central America and the C', 'barbados.png');
INSERT INTO `country` VALUES ('23', 'Belarus', '21', '3', '2', '1', 'BY', 'Commonwealth of Independe', 'belarus.png');
INSERT INTO `country` VALUES ('24', 'Belgium', '22', '2', '2', '1', 'BE', 'Europe', 'belgium.png');
INSERT INTO `country` VALUES ('25', 'Belize', '21', '3', '2', '1', 'BZ', 'Central America and the C', 'belize.png');
INSERT INTO `country` VALUES ('26', 'Benin', '21', '3', '2', '1', 'BJ', 'Africa', 'benin.png');
INSERT INTO `country` VALUES ('27', 'Bermuda', '21', '3', '2', '1', 'BM', 'North America', 'bermuda.png');
INSERT INTO `country` VALUES ('28', 'Bhutan', '21', '3', '2', '1', 'BT', 'Asia', 'bhutan.png');
INSERT INTO `country` VALUES ('29', 'Bolivia', '21', '3', '2', '1', 'BO', 'South America', 'bolivia.png');
INSERT INTO `country` VALUES ('30', 'Bosnia and Herzegovina', '21', '3', '2', '1', 'BA', 'Bosnia and Herzegovina, E', 'bosnia_herzegovina.png');
INSERT INTO `country` VALUES ('31', 'Botswana', '21', '3', '2', '1', 'BW', 'Africa', 'botswana.png');
INSERT INTO `country` VALUES ('32', 'Bouvet Island', '21', '3', '2', '1', 'BV', 'Antarctic Region', 'norway.png');
INSERT INTO `country` VALUES ('33', 'Brazil', '21', '3', '2', '1', 'BR', 'South America', 'brazil.png');
INSERT INTO `country` VALUES ('34', 'British Indian Ocean Territory', '21', '3', '2', '1', 'IO', 'World', 'british_indian_ocean_territory.png');
INSERT INTO `country` VALUES ('37', 'Bulgaria', '22', '6', '2', '1', 'BG', 'Europe', 'bulgaria.png');
INSERT INTO `country` VALUES ('38', 'Burkina Faso', '21', '3', '2', '1', 'BF', 'Africa', 'burkina_faso.png');
INSERT INTO `country` VALUES ('39', 'Burma', '21', '3', '2', '1', 'MM', 'Southeast Asia', 'burma_myanmar.png');
INSERT INTO `country` VALUES ('40', 'Burundi', '21', '3', '2', '1', 'BI', 'Africa', 'burundi.png');
INSERT INTO `country` VALUES ('41', 'Cambodia', '21', '3', '2', '1', 'KH', 'Southeast Asia', 'cambodia.png');
INSERT INTO `country` VALUES ('42', 'Cameroon', '21', '3', '2', '1', 'CM', 'Africa', 'cameroon.png');
INSERT INTO `country` VALUES ('43', 'Canada', '21', '3', '2', '1', 'CA', 'North America', 'canada.png');
INSERT INTO `country` VALUES ('44', 'Cape Verde', '21', '3', '2', '1', 'CV', 'World', 'cape_verde.png');
INSERT INTO `country` VALUES ('45', 'Cayman Islands', '21', '3', '2', '1', 'KY', 'Central America and the C', 'cayman_islands.png');
INSERT INTO `country` VALUES ('46', 'Central African Republic', '21', '3', '2', '1', 'CF', 'Africa', 'central_african_republic.png');
INSERT INTO `country` VALUES ('47', 'Chad', '21', '3', '2', '1', 'TD', 'Africa', 'chad.png');
INSERT INTO `country` VALUES ('48', 'Chile', '21', '3', '2', '1', 'CL', 'South America', 'chile.png');
INSERT INTO `country` VALUES ('49', 'China', '21', '3', '2', '1', 'CN', 'Asia', 'china.png');
INSERT INTO `country` VALUES ('50', 'Christmas Island', '21', '3', '2', '1', 'CX', 'Southeast Asia', 'christmas_island.png');
INSERT INTO `country` VALUES ('52', 'Cocos (Keeling) Islands', '21', '3', '2', '1', 'CC', 'Southeast Asia', 'australia.png');
INSERT INTO `country` VALUES ('53', 'Colombia', '21', '3', '2', '1', 'CO', 'South America, Central Am', 'colombia.png');
INSERT INTO `country` VALUES ('54', 'Comoros', '21', '3', '2', '1', 'KM', 'Africa', 'comoros.png');
INSERT INTO `country` VALUES ('57', 'Cook Islands', '21', '3', '2', '1', 'CK', 'Oceania', 'cook_islands.png');
INSERT INTO `country` VALUES ('59', 'Costa Rica', '21', '3', '2', '1', 'CR', 'Central America and the C', 'costa_rica.png');
INSERT INTO `country` VALUES ('61', 'Croatia', '22', '6', '2', '1', 'HR', 'Europe', 'croatia.png');
INSERT INTO `country` VALUES ('62', 'Cuba', '21', '3', '2', '1', 'CU', 'Central America and the C', 'cuba.png');
INSERT INTO `country` VALUES ('63', 'Cyprus', '21', '3', '2', '1', 'CY', 'Middle East', 'cyprus.png');
INSERT INTO `country` VALUES ('64', 'Czech Republic', '22', '6', '2', '1', 'CZ', 'Europe', 'czec_republic.png');
INSERT INTO `country` VALUES ('65', 'Denmark', '1', '1', '3', '1', 'DK', 'Europe', 'denmark.png');
INSERT INTO `country` VALUES ('66', 'Djibouti', '21', '3', '2', '1', 'DJ', 'Africa', 'dijibouti.png');
INSERT INTO `country` VALUES ('67', 'Dominica', '21', '3', '2', '1', 'DM', 'Central America and the C', 'dominica.png');
INSERT INTO `country` VALUES ('68', 'Dominican Republic', '21', '3', '2', '1', 'DO', 'Central America and the C', 'dominican_republic.png');
INSERT INTO `country` VALUES ('69', 'East Timor', '21', '3', '2', '1', 'TP', '', 'east_timor.png');
INSERT INTO `country` VALUES ('70', 'Ecuador', '21', '3', '2', '1', 'EC', 'South America', 'ecuador.png');
INSERT INTO `country` VALUES ('71', 'Egypt', '21', '3', '2', '1', 'EG', 'Africa', 'egypt.png');
INSERT INTO `country` VALUES ('72', 'El Salvador', '21', '3', '2', '1', 'SV', 'Central America and the C', 'el_salvador.png');
INSERT INTO `country` VALUES ('73', 'Equatorial Guinea', '21', '3', '2', '1', 'GQ', 'Africa', 'equatorial_guinea.png');
INSERT INTO `country` VALUES ('75', 'Estonia', '22', '6', '2', '1', 'EE', 'Europe', 'estonia.png');
INSERT INTO `country` VALUES ('76', 'Ethiopia', '21', '3', '2', '1', 'ET', 'Africa', 'ethiopia.png');
INSERT INTO `country` VALUES ('79', 'Faroe Islands', '15', '1', '2', '1', 'FO', 'Europe', 'faroes.png');
INSERT INTO `country` VALUES ('80', 'Fiji', '21', '3', '2', '1', 'FJ', 'Oceania', 'fiji.png');
INSERT INTO `country` VALUES ('81', 'Finland', '22', '6', '2', '1', 'FI', 'Europe', 'finland.png');
INSERT INTO `country` VALUES ('82', 'France', '22', '6', '2', '1', 'FR', 'Europe', 'france.png');
INSERT INTO `country` VALUES ('84', 'French Guiana', '21', '3', '2', '1', 'GF', 'South America', 'france.png');
INSERT INTO `country` VALUES ('85', 'French Polynesia', '21', '3', '2', '1', 'PF', 'Oceania', 'french_polynesia.png');
INSERT INTO `country` VALUES ('87', 'Gabon', '21', '3', '2', '1', 'GA', 'Africa', 'gabon.png');
INSERT INTO `country` VALUES ('88', 'The Gambia', '21', '3', '2', '1', 'GM', 'Africa', 'gambia.png');
INSERT INTO `country` VALUES ('91', 'Germany', '18', '2', '2', '1', 'DE', 'Europe', 'germany.png');
INSERT INTO `country` VALUES ('92', 'Ghana', '21', '3', '2', '1', 'GH', 'Africa', 'ghana.png');
INSERT INTO `country` VALUES ('93', 'Gibraltar', '22', '6', '2', '1', 'GI', 'Europe', 'gibraltar.png');
INSERT INTO `country` VALUES ('95', 'Greece', '22', '6', '2', '1', 'GR', 'Europe', 'greece.png');
INSERT INTO `country` VALUES ('96', 'Greenland', '2', '1', '2', '2', 'GL', 'Arctic Region', 'greenland.png');
INSERT INTO `country` VALUES ('97', 'Grenada', '21', '3', '2', '1', 'GD', 'Central America and the C', 'grenada.png');
INSERT INTO `country` VALUES ('98', 'Guadeloupe', '21', '3', '2', '1', 'GP', 'Central America and the C', 'france.png');
INSERT INTO `country` VALUES ('99', 'Guam', '21', '3', '2', '1', 'GU', 'Oceania', 'guam.png');
INSERT INTO `country` VALUES ('100', 'Guatemala', '21', '3', '2', '1', 'GT', 'Central America and the C', 'guatemala.png');
INSERT INTO `country` VALUES ('102', 'Guinea', '21', '3', '2', '1', 'GN', 'Africa', 'guinea.png');
INSERT INTO `country` VALUES ('103', 'Guinea-Bissau', '21', '3', '2', '1', 'GW', 'Africa', 'guinea_bissau.png');
INSERT INTO `country` VALUES ('104', 'Guyana', '21', '3', '2', '1', 'GY', 'South America', 'guyana.png');
INSERT INTO `country` VALUES ('105', 'Haiti', '21', '3', '2', '1', 'HT', 'Central America and the C', 'haiti.png');
INSERT INTO `country` VALUES ('108', 'Honduras', '21', '3', '2', '1', 'HN', 'Central America and the C', 'honduras.png');
INSERT INTO `country` VALUES ('109', 'Hong Kong (SAR)', '21', '3', '2', '1', 'HK', 'Southeast Asia', 'hong_kong.png');
INSERT INTO `country` VALUES ('111', 'Hungary', '22', '6', '2', '1', 'HU', 'Europe', 'hungary.png');
INSERT INTO `country` VALUES ('112', 'Iceland', '21', '3', '2', '1', 'IS', 'Arctic Region', 'iceland.png');
INSERT INTO `country` VALUES ('113', 'India', '21', '3', '2', '1', 'IN', 'Asia', 'india.png');
INSERT INTO `country` VALUES ('114', 'Indonesia', '21', '3', '2', '1', 'ID', 'Southeast Asia', 'indonesia.png');
INSERT INTO `country` VALUES ('116', 'Iraq', '21', '3', '2', '1', 'IQ', 'Middle East', 'iraq.png');
INSERT INTO `country` VALUES ('117', 'Ireland', '22', '6', '2', '1', 'IE', 'Europe', 'ireland.png');
INSERT INTO `country` VALUES ('118', 'Israel', '21', '3', '2', '1', 'IL', 'Middle East', 'israel.png');
INSERT INTO `country` VALUES ('119', 'Italy', '22', '6', '2', '1', 'IT', 'Europe', 'italy.png');
INSERT INTO `country` VALUES ('120', 'Jamaica', '21', '3', '2', '1', 'JM', 'Central America and the C', 'jamaica.png');
INSERT INTO `country` VALUES ('122', 'Japan', '21', '3', '2', '1', 'JP', 'Asia', 'japan.png');
INSERT INTO `country` VALUES ('126', 'Jordan', '21', '3', '2', '1', 'JO', 'Middle East', 'jordan.png');
INSERT INTO `country` VALUES ('129', 'Kenya', '21', '3', '2', '1', 'KE', 'Africa', 'kenya.png');
INSERT INTO `country` VALUES ('131', 'Kiribati', '21', '3', '2', '1', 'KI', 'Oceania', 'kiribati.png');
INSERT INTO `country` VALUES ('134', 'Kuwait', '21', '3', '2', '1', 'KW', 'Middle East', 'kuwait.png');
INSERT INTO `country` VALUES ('135', 'Kyrgyzstan', '21', '3', '2', '1', 'KG', 'Commonwealth of Independe', 'kyrgyzstan.png');
INSERT INTO `country` VALUES ('137', 'Latvia', '22', '6', '2', '1', 'LV', 'Europe', 'latvia.png');
INSERT INTO `country` VALUES ('138', 'Lebanon', '21', '3', '2', '1', 'LB', 'Middle East', 'lebanon.png');
INSERT INTO `country` VALUES ('139', 'Lesotho', '21', '3', '2', '1', 'LS', 'Africa', 'lesotho.png');
INSERT INTO `country` VALUES ('140', 'Liberia', '21', '3', '2', '1', 'LR', 'Africa', 'liberia.png');
INSERT INTO `country` VALUES ('142', 'Liechtenstein', '22', '6', '2', '1', 'LI', 'Europe', 'liechtenstein.png');
INSERT INTO `country` VALUES ('143', 'Lithuania', '22', '6', '2', '1', 'LT', 'Europe', 'lithuania.png');
INSERT INTO `country` VALUES ('144', 'Luxembourg', '22', '6', '2', '1', 'LU', 'Europe', 'luxembourg.png');
INSERT INTO `country` VALUES ('146', 'Macedonia, The Former Yugoslav Republic of', '22', '6', '2', '1', 'MK', 'Europe', 'macedonia.png');
INSERT INTO `country` VALUES ('147', 'Madagascar', '21', '3', '2', '1', 'MG', 'Africa', 'madagascar.png');
INSERT INTO `country` VALUES ('148', 'Malawi', '21', '3', '2', '1', 'MW', 'Africa', 'malawi.png');
INSERT INTO `country` VALUES ('149', 'Malaysia', '21', '3', '2', '1', 'MY', 'Southeast Asia', 'malaysia.png');
INSERT INTO `country` VALUES ('150', 'Maldives', '21', '3', '2', '1', 'MV', 'Asia', 'maldives.png');
INSERT INTO `country` VALUES ('151', 'Mali', '21', '3', '2', '1', 'ML', 'Africa', 'mali.png');
INSERT INTO `country` VALUES ('152', 'Malta', '22', '6', '2', '1', 'MT', 'Europe', 'malta.png');
INSERT INTO `country` VALUES ('154', 'Marshall Islands', '21', '3', '2', '1', 'MH', 'Oceania', 'marshall_islands.png');
INSERT INTO `country` VALUES ('155', 'Martinique', '21', '3', '2', '1', 'MQ', 'Central America and the C', 'france.png');
INSERT INTO `country` VALUES ('156', 'Mauritania', '21', '3', '2', '1', 'MR', 'Africa', 'mauritania.png');
INSERT INTO `country` VALUES ('157', 'Mauritius', '21', '3', '2', '1', 'MU', 'World', 'mauritius.png');
INSERT INTO `country` VALUES ('158', 'Mayotte', '21', '3', '2', '1', 'YT', 'Africa', 'france.png');
INSERT INTO `country` VALUES ('159', 'Mexico', '21', '3', '2', '1', 'MX', 'North America', 'mexico.png');
INSERT INTO `country` VALUES ('164', 'Monaco', '22', '6', '2', '1', 'MC', 'Europe', 'monaco.png');
INSERT INTO `country` VALUES ('165', 'Mongolia', '21', '3', '2', '1', 'MN', 'Asia', 'mongolia.png');
INSERT INTO `country` VALUES ('167', 'Montserrat', '21', '3', '2', '1', 'MS', 'Central America and the C', 'montserrat.png');
INSERT INTO `country` VALUES ('168', 'Morocco', '21', '3', '2', '1', 'MA', 'Africa', 'morocco.png');
INSERT INTO `country` VALUES ('169', 'Mozambique', '21', '3', '2', '1', 'MZ', 'Africa', 'mozambique.png');
INSERT INTO `country` VALUES ('171', 'Namibia', '21', '3', '2', '1', 'NA', 'Africa', 'namibia.png');
INSERT INTO `country` VALUES ('172', 'Nauru', '21', '3', '2', '1', 'NR', 'Oceania', 'nauru.png');
INSERT INTO `country` VALUES ('174', 'Nepal', '21', '3', '2', '1', 'NP', 'Asia', 'nepal.png');
INSERT INTO `country` VALUES ('175', 'Netherlands', '22', '6', '2', '1', 'NL', 'Europe', 'netherlands.png');
INSERT INTO `country` VALUES ('176', 'Netherlands Antilles', '21', '3', '2', '1', 'AN', 'Central America and the C', 'netherlands_antilles.png');
INSERT INTO `country` VALUES ('177', 'New Caledonia', '21', '3', '2', '1', 'NC', 'Oceania', 'new_caledonia.png');
INSERT INTO `country` VALUES ('178', 'New Zealand', '21', '3', '2', '1', 'NZ', 'Oceania', 'new_zealand.png');
INSERT INTO `country` VALUES ('179', 'Nicaragua', '21', '3', '2', '1', 'NI', 'Central America and the C', 'nicaragua.png');
INSERT INTO `country` VALUES ('180', 'Niger', '21', '3', '2', '1', 'NE', 'Africa', 'niger.png');
INSERT INTO `country` VALUES ('181', 'Nigeria', '21', '3', '2', '1', 'NG', 'Africa', 'nigeria.png');
INSERT INTO `country` VALUES ('182', 'Niue', '21', '3', '2', '1', 'NU', 'Oceania', 'niue.png');
INSERT INTO `country` VALUES ('183', 'Norfolk Island', '21', '3', '2', '1', 'NF', 'Oceania', 'norfolk_island.png');
INSERT INTO `country` VALUES ('184', 'Northern Mariana Islands', '21', '3', '2', '1', 'MP', 'Oceania', 'northern_marianas.png');
INSERT INTO `country` VALUES ('185', 'Norway', '16', '4', '2', '2', 'NO', 'Europe', 'norway.png');
INSERT INTO `country` VALUES ('186', 'Oman', '21', '3', '2', '1', 'OM', 'Middle East', 'oman.png');
INSERT INTO `country` VALUES ('187', 'Pakistan', '21', '3', '2', '1', 'PK', 'Asia', 'pakistan.png');
INSERT INTO `country` VALUES ('188', 'Palau', '21', '3', '2', '1', 'PW', 'Oceania', 'palau.png');
INSERT INTO `country` VALUES ('190', 'Panama', '21', '3', '2', '1', 'PA', 'Central America and the C', 'panama.png');
INSERT INTO `country` VALUES ('191', 'Papua New Guinea', '21', '3', '2', '1', 'PG', 'Oceania', 'papua_new_guinea.png');
INSERT INTO `country` VALUES ('194', 'Peru', '21', '3', '2', '1', 'PE', 'South America', 'peru.png');
INSERT INTO `country` VALUES ('195', 'Philippines', '21', '3', '2', '1', 'PH', 'Southeast Asia', 'phillipines.png');
INSERT INTO `country` VALUES ('197', 'Poland', '22', '6', '2', '1', 'PL', 'Europe', 'poland.png');
INSERT INTO `country` VALUES ('198', 'Portugal', '22', '6', '2', '1', 'PT', 'Europe', 'portugal.png');
INSERT INTO `country` VALUES ('199', 'Puerto Rico', '21', '3', '2', '1', 'PR', 'Central America and the C', 'puerto_rico.png');
INSERT INTO `country` VALUES ('200', 'Qatar', '21', '3', '2', '1', 'QA', 'Middle East', 'qatar.png');
INSERT INTO `country` VALUES ('202', 'Romania', '22', '6', '2', '1', 'RO', 'Europe', 'romania.png');
INSERT INTO `country` VALUES ('204', 'Rwanda', '21', '3', '2', '1', 'RW', 'Africa', 'rwanda.png');
INSERT INTO `country` VALUES ('206', 'Saint Kitts and Nevis', '21', '3', '2', '1', 'KN', 'Central America and the C', 'st_kitts_nevis.png');
INSERT INTO `country` VALUES ('207', 'Saint Lucia', '21', '3', '2', '1', 'LC', 'Central America and the C', 'st_lucia.png');
INSERT INTO `country` VALUES ('209', 'Saint Vincent and the Grenadines', '21', '3', '2', '1', 'VC', 'Central America and the C', 'st_vincent_grenadines.png');
INSERT INTO `country` VALUES ('210', 'Samoa', '21', '3', '2', '1', 'WS', 'Oceania', 'samoa.png');
INSERT INTO `country` VALUES ('211', 'San Marino', '22', '6', '2', '1', 'SM', 'Europe', 'san_marino.png');
INSERT INTO `country` VALUES ('213', 'Saudi Arabia', '21', '3', '2', '1', 'SA', 'Middle East', 'saudi_arabia.png');
INSERT INTO `country` VALUES ('214', 'Senegal', '21', '3', '2', '1', 'SN', 'Africa', 'senegal.png');
INSERT INTO `country` VALUES ('217', 'Seychelles', '21', '3', '2', '1', 'SC', 'Africa', 'seychelles.png');
INSERT INTO `country` VALUES ('218', 'Sierra Leone', '21', '3', '2', '1', 'SL', 'Africa', 'sierra_leone.png');
INSERT INTO `country` VALUES ('219', 'Singapore', '21', '3', '2', '1', 'SG', 'Southeast Asia', 'singapore.png');
INSERT INTO `country` VALUES ('221', 'Slovenia', '22', '6', '2', '1', 'SI', 'Europe', 'slovenia.png');
INSERT INTO `country` VALUES ('222', 'Solomon Islands', '21', '3', '2', '1', 'SB', 'Oceania', 'solomon_islands.png');
INSERT INTO `country` VALUES ('223', 'Somalia', '21', '3', '2', '1', 'SO', 'Africa', 'somalia.png');
INSERT INTO `country` VALUES ('224', 'South Africa', '21', '3', '2', '1', 'ZA', 'Africa', 'south_africa.png');
INSERT INTO `country` VALUES ('226', 'Spain', '22', '6', '2', '1', 'ES', 'Europe', 'spain.png');
INSERT INTO `country` VALUES ('228', 'Sri Lanka', '21', '3', '2', '1', 'LK', 'Asia', 'sri_lanka.png');
INSERT INTO `country` VALUES ('229', 'Sudan', '21', '3', '2', '1', 'SD', 'Africa', 'sudan.png');
INSERT INTO `country` VALUES ('230', 'Suriname', '21', '3', '2', '1', 'SR', 'South America', 'suriname.png');
INSERT INTO `country` VALUES ('231', 'Svalbard', '21', '3', '2', '1', 'SJ', 'Arctic Region', 'svalbard.png');
INSERT INTO `country` VALUES ('232', 'Swaziland', '21', '3', '2', '1', 'SZ', 'Africa', 'swaziland.png');
INSERT INTO `country` VALUES ('233', 'Sweden', '17', '5', '2', '1', 'SE', 'Europe', 'sweden.png');
INSERT INTO `country` VALUES ('234', 'Switzerland', '22', '6', '2', '1', 'CH', 'Europe', 'switzerland.png');
INSERT INTO `country` VALUES ('237', 'Tajikistan', '21', '3', '2', '1', 'TJ', 'Commonwealth of Independe', 'tajikistan.png');
INSERT INTO `country` VALUES ('239', 'Thailand', '21', '3', '2', '1', 'TH', 'Southeast Asia', 'thailand.png');
INSERT INTO `country` VALUES ('240', 'Togo', '21', '3', '2', '1', 'TG', 'Africa', 'togo.png');
INSERT INTO `country` VALUES ('241', 'Tokelau', '21', '3', '2', '1', 'TK', 'Oceania', 'tokelau.png');
INSERT INTO `country` VALUES ('242', 'Tonga', '21', '3', '2', '1', 'TO', 'Oceania', 'tonga.png');
INSERT INTO `country` VALUES ('243', 'Trinidad and Tobago', '21', '3', '2', '1', 'TT', 'Central America and the C', 'trinidad_and_tobago.png');
INSERT INTO `country` VALUES ('245', 'Tunisia', '21', '3', '2', '1', 'TN', 'Africa', 'tunisia.png');
INSERT INTO `country` VALUES ('246', 'Turkey', '21', '3', '2', '1', 'TR', 'Middle East', 'turkey.png');
INSERT INTO `country` VALUES ('247', 'Turkmenistan', '21', '3', '2', '1', 'TM', 'Commonwealth of Independe', 'turkmenistan.png');
INSERT INTO `country` VALUES ('248', 'Turks and Caicos Islands', '21', '3', '2', '1', 'TC', 'Central America and the C', 'turks_and_caicos_islands.png');
INSERT INTO `country` VALUES ('249', 'Tuvalu', '21', '3', '2', '1', 'TV', 'Oceania', 'tuvalu.png');
INSERT INTO `country` VALUES ('250', 'Uganda', '21', '3', '2', '1', 'UG', 'Africa', 'uganda.png');
INSERT INTO `country` VALUES ('251', 'Ukraine', '21', '3', '2', '1', 'UA', 'Commonwealth of Independe', 'ukraine.png');
INSERT INTO `country` VALUES ('252', 'United Arab Emirates', '21', '3', '2', '1', 'AE', 'Middle East', 'united_arab_emirates.png');
INSERT INTO `country` VALUES ('253', 'United Kingdom', '20', '6', '2', '1', 'GB', 'Europe', 'britain.png');
INSERT INTO `country` VALUES ('254', 'United States', '19', '3', '2', '1', 'US', 'North America', 'united_states.png');
INSERT INTO `country` VALUES ('256', 'Uruguay', '21', '3', '2', '1', 'UY', 'South America', 'uruguay.png');
INSERT INTO `country` VALUES ('257', 'Uzbekistan', '21', '3', '2', '1', 'UZ', 'Commonwealth of Independe', 'uzbekistan.png');
INSERT INTO `country` VALUES ('258', 'Vanuatu', '21', '3', '2', '1', 'VU', 'Oceania', 'vanuatu.png');
INSERT INTO `country` VALUES ('259', 'Venezuela', '21', '3', '2', '1', 'VE', 'South America, Central Am', 'venezuela.png');
INSERT INTO `country` VALUES ('260', 'Vietnam', '21', '3', '2', '1', 'VN', 'Southeast Asia', 'vietnam.png');
INSERT INTO `country` VALUES ('267', 'Western Sahara', '21', '3', '2', '1', 'EH', 'Africa', 'western_sahara.png');
INSERT INTO `country` VALUES ('270', 'Yemen', '21', '3', '2', '1', 'YE', 'Middle East', 'yemen.png');
INSERT INTO `country` VALUES ('273', 'Zambia', '21', '3', '2', '1', 'ZM', 'Africa', 'zambia.png');
INSERT INTO `country` VALUES ('274', 'Zimbabwe', '21', '3', '2', '1', 'ZW', 'Africa', 'zimbabwe.png');
INSERT INTO `country` VALUES ('275', 'Palestinian Territory, Occupied', '21', '3', '2', '1', 'PS', '', 'palestinian_territory,_occupied.png');
INSERT INTO `country` VALUES ('276', 'Europe', '22', '2', '2', '1', 'EU', '', 'europe.png');

-- ----------------------------
-- Table structure for `downloadable_product`
-- ----------------------------
DROP TABLE IF EXISTS `downloadable_product`;
CREATE TABLE `downloadable_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `orderid` int(11) DEFAULT NULL,
  `time` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of downloadable_product
-- ----------------------------
INSERT INTO `downloadable_product` VALUES ('1', '37', '75', '1406828524');
INSERT INTO `downloadable_product` VALUES ('2', '37', '76', '1406828572');
INSERT INTO `downloadable_product` VALUES ('3', '27', '77', '1400828837');
INSERT INTO `downloadable_product` VALUES ('4', '37', '77', '1406828837');
INSERT INTO `downloadable_product` VALUES ('5', '27', '78', '1407406371');
INSERT INTO `downloadable_product` VALUES ('6', '38', '78', '1407406371');
INSERT INTO `downloadable_product` VALUES ('7', '37', '87', '1408515293');

-- ----------------------------
-- Table structure for `forgot_password`
-- ----------------------------
DROP TABLE IF EXISTS `forgot_password`;
CREATE TABLE `forgot_password` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(255) DEFAULT NULL,
  `active_code` varchar(255) DEFAULT NULL,
  `new_password` varchar(255) DEFAULT NULL,
  `new_conf_password` varchar(255) DEFAULT NULL,
  `time` bigint(20) DEFAULT NULL,
  `already_changed` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of forgot_password
-- ----------------------------
INSERT INTO `forgot_password` VALUES ('1', 'samsujj@gmail.com', 'gLuMvW', null, null, '1391595043', '0');
INSERT INTO `forgot_password` VALUES ('2', 'samsujj@gmail.com', '79QYYl', null, null, '1391595324', '0');
INSERT INTO `forgot_password` VALUES ('3', 'samsujj@gmail.com', '3RWgGa', null, null, '1391595816', '0');
INSERT INTO `forgot_password` VALUES ('4', 'samsujj@gmail.com', 'zrygSo', null, null, '1391597731', '0');
INSERT INTO `forgot_password` VALUES ('5', 'samsujj@gmail.com', 'D7DFmK', null, null, '1391598839', '1');
INSERT INTO `forgot_password` VALUES ('6', 'samsujj2@gmail.com', 'XDCvbl', null, null, '1391599712', '1');
INSERT INTO `forgot_password` VALUES ('7', 'samsujj@gmail.com', 'ByHLmW', null, null, '1391600665', '1');
INSERT INTO `forgot_password` VALUES ('8', 'samsujj@gmail.com', 'Kh9a48', null, null, '1391680723', '0');
INSERT INTO `forgot_password` VALUES ('9', 'samsujj@gmail.com', 'okszhc', null, null, '1391680895', '0');
INSERT INTO `forgot_password` VALUES ('10', 'samsujj@gmail.com', 'UG3loZ', null, null, '1391681070', '0');
INSERT INTO `forgot_password` VALUES ('11', 'samsujj@gmail.com', '0TqvNq', null, null, '1391681144', '0');
INSERT INTO `forgot_password` VALUES ('12', 'samsujj@gmail.com', 'z8Ydjj', null, null, '1391681363', '0');
INSERT INTO `forgot_password` VALUES ('13', 'samsujj@gmail.com', 'BKQrD2', null, null, '1391681461', '0');
INSERT INTO `forgot_password` VALUES ('14', 'samsujj@gmail.com', 'eX3mVA', null, null, '1391681564', '0');
INSERT INTO `forgot_password` VALUES ('15', 'samsujj@gmail.com', 'Ds4RkK', null, null, '1391682482', '0');
INSERT INTO `forgot_password` VALUES ('16', 'samsujj@gmail.com', 'O6NlMF', null, null, '1391682840', '0');
INSERT INTO `forgot_password` VALUES ('17', 'samsujj@gmail.com', 'sdjDRE', null, null, '1391683138', '0');
INSERT INTO `forgot_password` VALUES ('18', 'samsujj@gmail.com', 'WxBN5d', null, null, '1391683310', '0');
INSERT INTO `forgot_password` VALUES ('19', 'samsujj@gmail.com', 'ugIMg3', null, null, '1391683378', '0');
INSERT INTO `forgot_password` VALUES ('20', 'samsujj@gmail.com', 'EMOLUf', null, null, '1391683583', '0');
INSERT INTO `forgot_password` VALUES ('21', 'samsujj@gmail.com', 'Ccn4TT', null, null, '1391683649', '0');
INSERT INTO `forgot_password` VALUES ('22', 'samsujj@gmail.com', '8zIcRc', null, null, '1391683690', '0');
INSERT INTO `forgot_password` VALUES ('23', 'samsujj@gmail.com', '7pcOUS', null, null, '1391683848', '0');
INSERT INTO `forgot_password` VALUES ('24', 'samsujj@gmail.com', 'K0lFNM', null, null, '1391684590', '0');
INSERT INTO `forgot_password` VALUES ('25', 'samsujj@gmail.com', 'Kznky7', null, null, '1391684670', '1');
INSERT INTO `forgot_password` VALUES ('26', 'bhaskar.involutiontech@gmail.com', 'qD0ob9', null, null, '1392874217', '1');
INSERT INTO `forgot_password` VALUES ('27', 'bhaskar.involutiontech@gmail.com', '4JcOlV', null, null, '1392875166', '1');
INSERT INTO `forgot_password` VALUES ('28', 'bhaskar.involutiontech@gmail.com', 'stP6cn', null, null, '1392875365', '0');
INSERT INTO `forgot_password` VALUES ('29', 'bhaskar.involutiontech@gmail.com', 'QynEJ7', null, null, '1392875523', '0');
INSERT INTO `forgot_password` VALUES ('30', 'bhaskar.involutiontech@gmail.com', 'spvF2v', null, null, '1392876343', '0');
INSERT INTO `forgot_password` VALUES ('31', 'bhaskar.involutiontech@gmail.com', 'URexom', null, null, '1392876461', '1');
INSERT INTO `forgot_password` VALUES ('32', 'bhaskar.involutiontech@gmail.com', 'nASKGY', null, null, '1392877019', '1');
INSERT INTO `forgot_password` VALUES ('33', 'bhaskar.involutiontech@gmail.com', 'cU6pnw', null, null, '1392888470', '1');
INSERT INTO `forgot_password` VALUES ('34', 'lannah@betoparedes.com', 'khUKoN', null, null, '1393620363', '0');
INSERT INTO `forgot_password` VALUES ('35', 'lannah@betoparedes.com', 'a8ihRA', null, null, '1393620409', '0');
INSERT INTO `forgot_password` VALUES ('36', 'samsujj@gmail.com', 'DB7wzK', null, null, '1407400534', '1');

-- ----------------------------
-- Table structure for `gallery_manager`
-- ----------------------------
DROP TABLE IF EXISTS `gallery_manager`;
CREATE TABLE `gallery_manager` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `content_name` varchar(50) DEFAULT NULL,
  `content_desc` text,
  `asset_type` tinyint(1) DEFAULT NULL,
  `video_type` tinyint(1) DEFAULT NULL,
  `video_code` varchar(255) DEFAULT NULL,
  `isactive` int(2) DEFAULT '0',
  `priority` bigint(255) DEFAULT NULL,
  `postby` varchar(50) DEFAULT NULL,
  `posted_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of gallery_manager
-- ----------------------------

-- ----------------------------
-- Table structure for `landing_page`
-- ----------------------------
DROP TABLE IF EXISTS `landing_page`;
CREATE TABLE `landing_page` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `url` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `isactive` int(2) NOT NULL DEFAULT '0' COMMENT '0=>inactive,1=>active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of landing_page
-- ----------------------------
INSERT INTO `landing_page` VALUES ('1', 'Landing 1', '', '<p>test</p>\r\n', '1393589641.png', '1');
INSERT INTO `landing_page` VALUES ('2', 'Landing 2', 'free-shipping', '<p>Landing 2</p>\r\n', '1409806545.png', '0');

-- ----------------------------
-- Table structure for `landing_page_details`
-- ----------------------------
DROP TABLE IF EXISTS `landing_page_details`;
CREATE TABLE `landing_page_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `affiliate_code` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of landing_page_details
-- ----------------------------
INSERT INTO `landing_page_details` VALUES ('1', 'Samsuj', 'Jaman', 'samsujj@gmail.com', '02/01/2000', 'Kolkata', 'US', 'DE', '36');
INSERT INTO `landing_page_details` VALUES ('2', 'Amitava', 'Das', 'amit.das@gmail.com', '02/18/2003', 'Saltlake', 'US', 'KS', '48');
INSERT INTO `landing_page_details` VALUES ('3', 'Bhaskat', 'Chakro', 'bhas.cha@gmail.com', '02/17/2014', 'Kolkata', 'US', 'LA', '36');

-- ----------------------------
-- Table structure for `landing_product_relation`
-- ----------------------------
DROP TABLE IF EXISTS `landing_product_relation`;
CREATE TABLE `landing_product_relation` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `landing_id` bigint(255) DEFAULT NULL,
  `product_price` float(10,2) DEFAULT NULL,
  `product_desc` text,
  `product_image` text,
  `isactive` int(2) DEFAULT NULL,
  `product_type` int(2) DEFAULT NULL,
  `product_id` bigint(255) DEFAULT NULL,
  `shipping_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `autoship` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of landing_product_relation
-- ----------------------------
INSERT INTO `landing_product_relation` VALUES ('12', '1', '0.00', '<p>Garcinia Free Trial</p>\r\n', '1414491397.png', '1', '1', '49', '3', 'Garcinia Free Trial', '0', '1');
INSERT INTO `landing_product_relation` VALUES ('13', '1', '179.85', '<p>Garcinia</p>\r\n', '1414491549.png', '1', '1', '49', '6', 'Tier 3 Pack (Buy 3 and get 2 free) ', '0', '5');
INSERT INTO `landing_product_relation` VALUES ('14', '1', '119.90', '<p><span>119.90</span></p>\r\n', '1414491609.png', '1', '1', '49', '6', 'Tier 2 Pack (Buy 2 and get 1 free) ', '0', '3');
INSERT INTO `landing_product_relation` VALUES ('15', '1', '69.95', '<p>Garcinia</p>\r\n', '1414491397.png', '1', '1', '49', '6', 'Single Pack ', '0', '1');
INSERT INTO `landing_product_relation` VALUES ('16', '1', '19.95', '<p>Upsell Pro</p>\r\n', '1414749222.png', '1', '0', '50', '3', 'perfectly clear colon cleanse', '0', '1');

-- ----------------------------
-- Table structure for `mail`
-- ----------------------------
DROP TABLE IF EXISTS `mail`;
CREATE TABLE `mail` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `isactive` int(2) NOT NULL DEFAULT '0',
  `remarks` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mail
-- ----------------------------
INSERT INTO `mail` VALUES ('1', 'bhaskar', 'bhaskar.involutiontech@gmail.com', '1', '<p>test</p>\r\n');
INSERT INTO `mail` VALUES ('6', 'Debasis Kar', 'debasiskar007@gmail.com', '1', '<p>test mail</p>\r\n');
INSERT INTO `mail` VALUES ('5', 'admin mail', 'info@azcowtown.com', '1', '<p>every mails goes here</p>\r\n');

-- ----------------------------
-- Table structure for `newsletter`
-- ----------------------------
DROP TABLE IF EXISTS `newsletter`;
CREATE TABLE `newsletter` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(255) DEFAULT NULL,
  `time` text,
  `has_select` int(2) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of newsletter
-- ----------------------------
INSERT INTO `newsletter` VALUES ('1', '158', '1410506518', '1');
INSERT INTO `newsletter` VALUES ('2', '158', '1410506537', '0');
INSERT INTO `newsletter` VALUES ('3', '158', '1410506674', '1');
INSERT INTO `newsletter` VALUES ('4', '158', '1410506715', '1');
INSERT INTO `newsletter` VALUES ('5', '158', '1410506739', '0');
INSERT INTO `newsletter` VALUES ('6', '158', '1410506817', '0');
INSERT INTO `newsletter` VALUES ('7', '158', '1410506836', '0');
INSERT INTO `newsletter` VALUES ('8', '158', '1410507022', '0');
INSERT INTO `newsletter` VALUES ('9', '158', '1410507072', '0');
INSERT INTO `newsletter` VALUES ('10', '158', '1410507136', '1');
INSERT INTO `newsletter` VALUES ('11', '158', '1410507462', '1');
INSERT INTO `newsletter` VALUES ('12', '158', '1410507463', '1');
INSERT INTO `newsletter` VALUES ('13', '158', '1410507658', '0');
INSERT INTO `newsletter` VALUES ('14', '159', '1410763039', '1');
INSERT INTO `newsletter` VALUES ('15', '159', '1410763045', '1');
INSERT INTO `newsletter` VALUES ('16', '169', '1410942288', '1');

-- ----------------------------
-- Table structure for `notify_list`
-- ----------------------------
DROP TABLE IF EXISTS `notify_list`;
CREATE TABLE `notify_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `time` bigint(20) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of notify_list
-- ----------------------------
INSERT INTO `notify_list` VALUES ('10', 'bhaskar.involutiontech@gmail.com', '39', '1407499708', '1');
INSERT INTO `notify_list` VALUES ('11', 'samsujj@gmail.com', '39', '1407499728', '1');
INSERT INTO `notify_list` VALUES ('12', 'bhaskar.involutiontech@gmail.com', '27', '1408339023', '1');
INSERT INTO `notify_list` VALUES ('13', 'samsujj@gmail.com', '27', '1408339052', '1');
INSERT INTO `notify_list` VALUES ('14', 'bhaskar.involutiontech@gmail.com', '40', '1408358936', '1');
INSERT INTO `notify_list` VALUES ('15', 'bhaskar.involutiontech@gmail.com', '40', '1408359103', '0');
INSERT INTO `notify_list` VALUES ('16', 'bhaskar.involutiontech@gmail.com', '33', '1408430004', '1');
INSERT INTO `notify_list` VALUES ('17', 'bhaskar.involutiontech@gmail.com', '47', '1409558986', '0');

-- ----------------------------
-- Table structure for `page`
-- ----------------------------
DROP TABLE IF EXISTS `page`;
CREATE TABLE `page` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(30) NOT NULL,
  `page_desc` varchar(100) NOT NULL,
  `page_status` int(2) NOT NULL DEFAULT '0' COMMENT '0=>inactive && 1=>inactive',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of page
-- ----------------------------
INSERT INTO `page` VALUES ('1', 'home', '<p>this is for home page</p>\r\n', '0');
INSERT INTO `page` VALUES ('7', 'range', '<p>sam</p>\r\n', '1');
INSERT INTO `page` VALUES ('8', 'events', '<p>sam</p>\r\n', '1');
INSERT INTO `page` VALUES ('9', 'training', '<p>sam</p>\r\n', '1');
INSERT INTO `page` VALUES ('10', 'venue', '<p>sam</p>\r\n', '1');
INSERT INTO `page` VALUES ('11', 'studio', '<p>dfdsf</p>\r\n', '1');
INSERT INTO `page` VALUES ('12', 'advertising', '<p>dfdsf</p>\r\n', '1');
INSERT INTO `page` VALUES ('13', 'media', '<p>dfdsf</p>\r\n', '1');
INSERT INTO `page` VALUES ('14', 'store', '<p>test</p>\r\n', '1');
INSERT INTO `page` VALUES ('15', 'contact us', '<p>test</p>\r\n', '1');

-- ----------------------------
-- Table structure for `pressimgvid`
-- ----------------------------
DROP TABLE IF EXISTS `pressimgvid`;
CREATE TABLE `pressimgvid` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `pr_id` int(255) NOT NULL,
  `pr_con_type` varchar(255) NOT NULL,
  `pr_subcon_type` varchar(255) NOT NULL,
  `pr_cont` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pressimgvid
-- ----------------------------

-- ----------------------------
-- Table structure for `pressrelease`
-- ----------------------------
DROP TABLE IF EXISTS `pressrelease`;
CREATE TABLE `pressrelease` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `pr_date` text,
  `pr_title` varchar(255) DEFAULT NULL,
  `pr_desc` text,
  `pr_status` varchar(255) DEFAULT NULL,
  `postby` varchar(50) DEFAULT NULL,
  `user_image` varchar(50) DEFAULT NULL,
  `pr_module` varchar(255) DEFAULT NULL,
  `user_id` int(255) DEFAULT NULL,
  `enablecom` int(2) DEFAULT '0',
  `priority` bigint(255) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pressrelease
-- ----------------------------
INSERT INTO `pressrelease` VALUES ('1', '08/26/2014', 'jammu bhai', '<p>jaman jaman jaman bhai re</p>\r\n', '1', 'jaman', '1409056212.jpg', 'Blog', null, '0', '23');
INSERT INTO `pressrelease` VALUES ('2', '08/26/2014', 'bhaskar', '<p>dgdfgertg eswtgertg rgdteryb vret4erte 4tgertgfg dretgret retygredg &nbsp;ewrtertert deswgfdgdf er4yghrtf</p>\r\n', '1', 'jaman', '1409049091.jpg', 'Blog', null, '1', '21');
INSERT INTO `pressrelease` VALUES ('3', '08/26/2014', 'test', '<p><strong style=\"color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; font-size: 11px; line-height: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; font-size: 11px; line-height: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>\r\n', '1', 'testing', '1409056340.jpg', 'Blog', null, '0', '20');

-- ----------------------------
-- Table structure for `product`
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `productid` bigint(255) NOT NULL AUTO_INCREMENT,
  `productname` varchar(50) NOT NULL,
  `productdesc` text NOT NULL,
  `catagoryid` bigint(255) NOT NULL,
  `isactive` int(2) NOT NULL DEFAULT '0',
  `productprice` float(10,2) NOT NULL,
  `createdon` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `priority` bigint(255) NOT NULL,
  `product_type` int(2) DEFAULT NULL,
  `file_name` text,
  `original_name` text,
  `product_info` text,
  `product_guarantee` text,
  `product_features` text,
  `product_descdetail` text,
  `brand_info` text,
  `sqnumber` text,
  PRIMARY KEY (`productid`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('49', 'Garcinia ', '<p>Garcinia</p>\r\n', '4', '1', '7.95', '2014-10-28 15:46:51', '1', '1', '', '', '', '', '', '', '', '');
INSERT INTO `product` VALUES ('50', 'Upsell Pro', '<p>Upsell Pro</p>\r\n', '2', '1', '19.95', '0000-00-00 00:00:00', '1', '0', '', '', '', '', '', '', '', '1');

-- ----------------------------
-- Table structure for `product_color`
-- ----------------------------
DROP TABLE IF EXISTS `product_color`;
CREATE TABLE `product_color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `color_code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=212 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_color
-- ----------------------------
INSERT INTO `product_color` VALUES ('209', '27', 'ff002f');
INSERT INTO `product_color` VALUES ('210', '27', '001aff');

-- ----------------------------
-- Table structure for `product_image`
-- ----------------------------
DROP TABLE IF EXISTS `product_image`;
CREATE TABLE `product_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `is_main` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=196 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of product_image
-- ----------------------------
INSERT INTO `product_image` VALUES ('120', '44', '1408950202.jpg', null);
INSERT INTO `product_image` VALUES ('121', '44', '1408950206.jpg', null);
INSERT INTO `product_image` VALUES ('178', '34', '1408952129.jpg', null);
INSERT INTO `product_image` VALUES ('177', '34', '1408952121.jpg', null);
INSERT INTO `product_image` VALUES ('176', '34', '1408952111.jpg', null);
INSERT INTO `product_image` VALUES ('175', '35', '1408952104.jpg', null);
INSERT INTO `product_image` VALUES ('174', '35', '1408952095.jpg', null);
INSERT INTO `product_image` VALUES ('173', '35', '1408952088.jpg', null);
INSERT INTO `product_image` VALUES ('172', '34', '1408952081.jpg', null);
INSERT INTO `product_image` VALUES ('171', '34', '1408952076.jpg', null);
INSERT INTO `product_image` VALUES ('170', '34', '1408952068.jpg', null);
INSERT INTO `product_image` VALUES ('169', '34', '1408952058.jpg', null);
INSERT INTO `product_image` VALUES ('168', '34', '1408950244.jpg', null);
INSERT INTO `product_image` VALUES ('167', '34', '1408950248.jpg', null);
INSERT INTO `product_image` VALUES ('166', '34', '1408952269.jpg', null);
INSERT INTO `product_image` VALUES ('165', '27', '1408958438.jpg', null);
INSERT INTO `product_image` VALUES ('164', '27', '1408958366.jpg', null);
INSERT INTO `product_image` VALUES ('179', '42', '1409549137.jpg', null);
INSERT INTO `product_image` VALUES ('180', '45', '1409550863.jpg', null);
INSERT INTO `product_image` VALUES ('191', '46', '1409551357.jpg', null);
INSERT INTO `product_image` VALUES ('192', '47', '1409552766.png', null);
INSERT INTO `product_image` VALUES ('184', '48', '1409554075.jpg', null);
INSERT INTO `product_image` VALUES ('194', '49', '1414491397.png', null);
INSERT INTO `product_image` VALUES ('195', '50', '1414737536.jpg', null);

-- ----------------------------
-- Table structure for `product_size`
-- ----------------------------
DROP TABLE IF EXISTS `product_size`;
CREATE TABLE `product_size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of product_size
-- ----------------------------
INSERT INTO `product_size` VALUES ('16', '27', 'xxl', '12.00');
INSERT INTO `product_size` VALUES ('17', '27', 'xl', '12.00');
INSERT INTO `product_size` VALUES ('18', '27', 'l', '10.00');

-- ----------------------------
-- Table structure for `product_stock`
-- ----------------------------
DROP TABLE IF EXISTS `product_stock`;
CREATE TABLE `product_stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL COMMENT '1=>In; 2=>Out',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=278 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of product_stock
-- ----------------------------
INSERT INTO `product_stock` VALUES ('200', '49', '0', '1409737838', '1');
INSERT INTO `product_stock` VALUES ('202', '49', '1', null, '2');
INSERT INTO `product_stock` VALUES ('203', '49', '1', null, '2');
INSERT INTO `product_stock` VALUES ('204', '49', '1', null, '2');
INSERT INTO `product_stock` VALUES ('205', '49', '1', null, '2');
INSERT INTO `product_stock` VALUES ('206', '49', '1', null, '2');
INSERT INTO `product_stock` VALUES ('207', '49', '1', null, '2');
INSERT INTO `product_stock` VALUES ('208', '49', '1', null, '2');
INSERT INTO `product_stock` VALUES ('209', '49', '1', null, '2');
INSERT INTO `product_stock` VALUES ('210', '49', '1', null, '2');
INSERT INTO `product_stock` VALUES ('211', '49', '1', null, '2');
INSERT INTO `product_stock` VALUES ('212', '49', '1', null, '2');
INSERT INTO `product_stock` VALUES ('213', '49', '1', null, '2');
INSERT INTO `product_stock` VALUES ('214', '49', '1', null, '2');
INSERT INTO `product_stock` VALUES ('215', '49', '1', null, '2');
INSERT INTO `product_stock` VALUES ('216', '49', '1', null, '2');
INSERT INTO `product_stock` VALUES ('217', '49', '1', null, '2');
INSERT INTO `product_stock` VALUES ('218', '49', '1', null, '2');
INSERT INTO `product_stock` VALUES ('219', '49', '1', null, '2');
INSERT INTO `product_stock` VALUES ('220', '49', '3', null, '2');
INSERT INTO `product_stock` VALUES ('221', '49', '1', null, '2');
INSERT INTO `product_stock` VALUES ('222', '49', '3', null, '2');
INSERT INTO `product_stock` VALUES ('223', '49', '1', null, '2');
INSERT INTO `product_stock` VALUES ('224', '49', '3', null, '2');
INSERT INTO `product_stock` VALUES ('225', '49', '3', null, '2');
INSERT INTO `product_stock` VALUES ('226', '49', '1', null, '2');
INSERT INTO `product_stock` VALUES ('227', '49', '3', null, '2');
INSERT INTO `product_stock` VALUES ('228', '49', '3', null, '2');
INSERT INTO `product_stock` VALUES ('229', '49', '3', null, '2');
INSERT INTO `product_stock` VALUES ('230', '49', '1', null, '2');
INSERT INTO `product_stock` VALUES ('231', '49', null, null, '2');
INSERT INTO `product_stock` VALUES ('232', '49', '3', null, '2');
INSERT INTO `product_stock` VALUES ('233', '49', '3', null, '2');
INSERT INTO `product_stock` VALUES ('234', '49', '3', null, '2');
INSERT INTO `product_stock` VALUES ('235', '49', '3', null, '2');
INSERT INTO `product_stock` VALUES ('236', '49', '3', null, '2');
INSERT INTO `product_stock` VALUES ('237', '49', '3', null, '2');
INSERT INTO `product_stock` VALUES ('238', '49', '1', null, '2');
INSERT INTO `product_stock` VALUES ('239', '49', '1', null, '2');
INSERT INTO `product_stock` VALUES ('240', '49', '3', null, '2');
INSERT INTO `product_stock` VALUES ('241', '49', '3', null, '2');
INSERT INTO `product_stock` VALUES ('198', '49', '0', '1409723623', '2');
INSERT INTO `product_stock` VALUES ('201', '49', '100', '1409738369', '1');
INSERT INTO `product_stock` VALUES ('242', '49', '1', null, '2');
INSERT INTO `product_stock` VALUES ('243', '49', '1', null, '2');
INSERT INTO `product_stock` VALUES ('244', '49', '1', null, '2');
INSERT INTO `product_stock` VALUES ('245', '49', '1', null, '2');
INSERT INTO `product_stock` VALUES ('246', '49', '3', null, '2');
INSERT INTO `product_stock` VALUES ('247', '49', '1', null, '2');
INSERT INTO `product_stock` VALUES ('248', '49', '1', null, '2');
INSERT INTO `product_stock` VALUES ('249', '49', '3', null, '2');
INSERT INTO `product_stock` VALUES ('250', '49', '5', null, '2');
INSERT INTO `product_stock` VALUES ('251', '49', '1', null, '2');
INSERT INTO `product_stock` VALUES ('252', '49', '1', null, '2');
INSERT INTO `product_stock` VALUES ('253', '49', '5', null, '2');
INSERT INTO `product_stock` VALUES ('254', '49', '1', null, '2');
INSERT INTO `product_stock` VALUES ('255', '50', '0', '1414737560', '1');
INSERT INTO `product_stock` VALUES ('256', '50', '0', '1414737560', '2');
INSERT INTO `product_stock` VALUES ('257', '49', '5', null, '2');
INSERT INTO `product_stock` VALUES ('258', '49', '1', null, '2');
INSERT INTO `product_stock` VALUES ('259', '49', '1', null, '2');
INSERT INTO `product_stock` VALUES ('260', '49', '1', null, '2');
INSERT INTO `product_stock` VALUES ('261', '49', '1', null, '2');
INSERT INTO `product_stock` VALUES ('262', '49', '1', null, '2');
INSERT INTO `product_stock` VALUES ('263', '50', '1', null, '2');
INSERT INTO `product_stock` VALUES ('264', '49', '5', null, '2');
INSERT INTO `product_stock` VALUES ('265', '50', '1', null, '2');
INSERT INTO `product_stock` VALUES ('266', '49', '1', null, '2');
INSERT INTO `product_stock` VALUES ('267', '49', '1', null, '2');
INSERT INTO `product_stock` VALUES ('268', '50', '1', null, '2');
INSERT INTO `product_stock` VALUES ('269', '50', '1', null, '2');
INSERT INTO `product_stock` VALUES ('270', '49', '1', null, '2');
INSERT INTO `product_stock` VALUES ('271', '49', '3', null, '2');
INSERT INTO `product_stock` VALUES ('272', '50', '1', null, '2');
INSERT INTO `product_stock` VALUES ('273', '49', '5', null, '2');
INSERT INTO `product_stock` VALUES ('274', '49', '5', null, '2');
INSERT INTO `product_stock` VALUES ('275', '49', '5', null, '2');
INSERT INTO `product_stock` VALUES ('276', '49', '3', null, '2');
INSERT INTO `product_stock` VALUES ('277', '50', '1', null, '2');

-- ----------------------------
-- Table structure for `promo_code_details`
-- ----------------------------
DROP TABLE IF EXISTS `promo_code_details`;
CREATE TABLE `promo_code_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_text` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL COMMENT '0=>Percentage; 1=>Flat; 2=>Free Shipping',
  `st_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `isactive` int(11) DEFAULT NULL,
  `dis_value` float(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of promo_code_details
-- ----------------------------
INSERT INTO `promo_code_details` VALUES ('4', 'uM89gG', '0', '2014-03-20', '2014-04-24', '1', '5.00');
INSERT INTO `promo_code_details` VALUES ('5', 'sdfdsdfs', '1', '2014-03-24', '2014-03-27', '0', '56.00');
INSERT INTO `promo_code_details` VALUES ('6', 'sdfsdfs', '2', '2014-03-03', '2014-04-29', '1', '0.00');
INSERT INTO `promo_code_details` VALUES ('7', 'oveip5', '2', '2014-03-10', '2014-04-30', '1', '0.00');
INSERT INTO `promo_code_details` VALUES ('8', 'gDAsIp', '0', '2014-03-25', '2014-05-16', '0', '5.00');
INSERT INTO `promo_code_details` VALUES ('9', 'Ug2Kdk', '1', '2014-03-25', '2014-04-28', '1', '60.00');
INSERT INTO `promo_code_details` VALUES ('11', 'CMpzUR', '0', '2014-03-25', '2014-05-30', '1', '5.00');
INSERT INTO `promo_code_details` VALUES ('12', 'QbuRTh', '2', '2014-04-08', '2014-04-16', '1', '0.00');
INSERT INTO `promo_code_details` VALUES ('13', 'p7xlDA', '0', '2014-04-17', '2014-04-30', '1', '12.00');
INSERT INTO `promo_code_details` VALUES ('14', 'orgmCz', '2', '2014-04-13', '2014-04-29', '1', '0.00');

-- ----------------------------
-- Table structure for `shipping_charge`
-- ----------------------------
DROP TABLE IF EXISTS `shipping_charge`;
CREATE TABLE `shipping_charge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shipping_charge` float(10,2) DEFAULT NULL,
  `shipping_name` text,
  `shipping_desc` text,
  `isactive` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shipping_charge
-- ----------------------------
INSERT INTO `shipping_charge` VALUES ('3', '7.95', 'Standard Shipping', '<p>rrrrr</p>\r\n', '1');
INSERT INTO `shipping_charge` VALUES ('6', '0.00', 'No Shipping', '<p>No Shipping</p>\r\n', '1');

-- ----------------------------
-- Table structure for `shipping_status_table`
-- ----------------------------
DROP TABLE IF EXISTS `shipping_status_table`;
CREATE TABLE `shipping_status_table` (
  `shipping_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `shipping_status_val` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`shipping_status_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shipping_status_table
-- ----------------------------
INSERT INTO `shipping_status_table` VALUES ('1', 'Pending');
INSERT INTO `shipping_status_table` VALUES ('2', 'Processing');
INSERT INTO `shipping_status_table` VALUES ('3', 'Delivered');
INSERT INTO `shipping_status_table` VALUES ('4', 'Cancelled');

-- ----------------------------
-- Table structure for `state`
-- ----------------------------
DROP TABLE IF EXISTS `state`;
CREATE TABLE `state` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `i_cnt_id` varchar(20) NOT NULL,
  `s_st_name` varchar(60) NOT NULL,
  `s_st_iso` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1746 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of state
-- ----------------------------
INSERT INTO `state` VALUES ('1', '1', 'Kabul ', '');
INSERT INTO `state` VALUES ('2', '2', 'Tiranes ', '');
INSERT INTO `state` VALUES ('3', '3', 'Alger ', '');
INSERT INTO `state` VALUES ('4', '3', 'Constantine ', '');
INSERT INTO `state` VALUES ('5', '3', 'Mascara ', '');
INSERT INTO `state` VALUES ('6', '3', 'Oran ', '');
INSERT INTO `state` VALUES ('7', '3', 'Skikda ', '');
INSERT INTO `state` VALUES ('8', '4', 'Eastern ', '');
INSERT INTO `state` VALUES ('9', '5', 'Andorra la Vella', '');
INSERT INTO `state` VALUES ('10', '5', 'Escaldes-Engordany', '');
INSERT INTO `state` VALUES ('11', '6', 'Benguela ', '');
INSERT INTO `state` VALUES ('12', '6', 'Cuanza Sul', '');
INSERT INTO `state` VALUES ('13', '6', 'Huila ', '');
INSERT INTO `state` VALUES ('14', '6', 'Luanda ', '');
INSERT INTO `state` VALUES ('15', '6', 'Uige ', '');
INSERT INTO `state` VALUES ('16', '7', 'Anguilla ', '');
INSERT INTO `state` VALUES ('18', '9', 'Saint John', '');
INSERT INTO `state` VALUES ('19', '9', 'Saint Paul', '');
INSERT INTO `state` VALUES ('20', '10', 'Buenos Aires', '');
INSERT INTO `state` VALUES ('21', '10', 'Capital Federal', '');
INSERT INTO `state` VALUES ('22', '10', 'Catamarca ', '');
INSERT INTO `state` VALUES ('23', '10', 'value', '');
INSERT INTO `state` VALUES ('24', '10', 'Chubut ', '');
INSERT INTO `state` VALUES ('25', '10', 'Cordoba ', '');
INSERT INTO `state` VALUES ('26', '10', 'Corrientes ', '');
INSERT INTO `state` VALUES ('27', '10', 'Entre Rios ', '');
INSERT INTO `state` VALUES ('28', '10', 'Formosa ', '');
INSERT INTO `state` VALUES ('29', '10', 'Jujuy ', '');
INSERT INTO `state` VALUES ('30', '10', 'La Pampa', '');
INSERT INTO `state` VALUES ('31', '10', 'La Rioja', '');
INSERT INTO `state` VALUES ('32', '10', 'Mendoza ', '');
INSERT INTO `state` VALUES ('33', '10', 'Misiones ', '');
INSERT INTO `state` VALUES ('34', '10', 'Neuquen ', '');
INSERT INTO `state` VALUES ('35', '10', 'Rio Negro ', '');
INSERT INTO `state` VALUES ('36', '10', 'Salta ', '');
INSERT INTO `state` VALUES ('37', '10', 'San Juan', '');
INSERT INTO `state` VALUES ('38', '10', 'San Luis', '');
INSERT INTO `state` VALUES ('39', '10', 'Santa Cruz', '');
INSERT INTO `state` VALUES ('40', '10', 'Santa Fe', '');
INSERT INTO `state` VALUES ('41', '10', 'Santiago del Estero ', '');
INSERT INTO `state` VALUES ('42', '10', 'Tierra del Fuego ', '');
INSERT INTO `state` VALUES ('43', '10', 'Tucuman ', '');
INSERT INTO `state` VALUES ('44', '11', 'Lorri ', '');
INSERT INTO `state` VALUES ('45', '11', 'Shirak ', '');
INSERT INTO `state` VALUES ('46', '11', 'Yerevan ', '');
INSERT INTO `state` VALUES ('47', '12', 'Aruba', '');
INSERT INTO `state` VALUES ('49', '14', 'Blowing Point Village', '');
INSERT INTO `state` VALUES ('50', '14', 'Cannifist', '');
INSERT INTO `state` VALUES ('51', '14', 'Crocus Hill', '');
INSERT INTO `state` VALUES ('52', '14', 'East End Village', '');
INSERT INTO `state` VALUES ('53', '14', 'George Hill', '');
INSERT INTO `state` VALUES ('54', '14', 'Little Dix', '');
INSERT INTO `state` VALUES ('55', '14', 'Long Bay Village', '');
INSERT INTO `state` VALUES ('56', '14', 'Long Path', '');
INSERT INTO `state` VALUES ('57', '14', 'Mount Fortune', '');
INSERT INTO `state` VALUES ('58', '14', 'Sandy Ground Village', '');
INSERT INTO `state` VALUES ('59', '14', 'Shoal Village', '');
INSERT INTO `state` VALUES ('60', '14', 'South Hill Village', '');
INSERT INTO `state` VALUES ('61', '14', 'Stoney Ground', '');
INSERT INTO `state` VALUES ('62', '14', 'The Copse', '');
INSERT INTO `state` VALUES ('63', '14', 'The Copse', '');
INSERT INTO `state` VALUES ('64', '14', 'The Farrington', '');
INSERT INTO `state` VALUES ('65', '14', 'The Valley', '');
INSERT INTO `state` VALUES ('66', '14', 'West End Village', '');
INSERT INTO `state` VALUES ('67', '15', 'Australian Capital Territory ', '');
INSERT INTO `state` VALUES ('68', '15', 'Christmas Island', '');
INSERT INTO `state` VALUES ('69', '15', 'New South Wales', '');
INSERT INTO `state` VALUES ('70', '15', 'Northern Territory', '');
INSERT INTO `state` VALUES ('71', '15', 'Queensland ', '');
INSERT INTO `state` VALUES ('72', '15', 'South Australia', '');
INSERT INTO `state` VALUES ('73', '15', 'Tasmania ', '');
INSERT INTO `state` VALUES ('74', '15', 'Victoria ', '');
INSERT INTO `state` VALUES ('75', '15', 'Western Australia', '');
INSERT INTO `state` VALUES ('76', '16', 'Abseron ', '');
INSERT INTO `state` VALUES ('77', '17', 'Abaco ', '');
INSERT INTO `state` VALUES ('78', '17', 'Acklins Island', '');
INSERT INTO `state` VALUES ('79', '17', 'Andros ', '');
INSERT INTO `state` VALUES ('80', '17', 'Cat Island', '');
INSERT INTO `state` VALUES ('81', '17', 'Eleuthera ', '');
INSERT INTO `state` VALUES ('82', '17', 'Exuma and Cays', '');
INSERT INTO `state` VALUES ('83', '17', 'Grand Bahama ', '');
INSERT INTO `state` VALUES ('84', '17', 'Inagua Islands', '');
INSERT INTO `state` VALUES ('85', '17', 'New Providence', '');
INSERT INTO `state` VALUES ('86', '17', 'San Salvador', '');
INSERT INTO `state` VALUES ('87', '18', 'Al Manamah', '');
INSERT INTO `state` VALUES ('88', '18', 'Al Muharraq', '');
INSERT INTO `state` VALUES ('89', '18', 'Ash Shamaliyah', '');
INSERT INTO `state` VALUES ('91', '20', 'Chittagong ', '');
INSERT INTO `state` VALUES ('92', '20', 'Dhaka ', '');
INSERT INTO `state` VALUES ('93', '2', 'Khulna ', '');
INSERT INTO `state` VALUES ('94', '20', 'Rajshahi ', '');
INSERT INTO `state` VALUES ('95', '21', 'Saint Michael', '');
INSERT INTO `state` VALUES ('96', '21', 'Saint Peter ', '');
INSERT INTO `state` VALUES ('98', '23', 'Mahilyowskaya ', '');
INSERT INTO `state` VALUES ('99', '23', 'Minskaya ', '');
INSERT INTO `state` VALUES ('100', '24', 'Antwerpen - Anvers', '');
INSERT INTO `state` VALUES ('101', '24', 'Brabant Wallon', '');
INSERT INTO `state` VALUES ('102', '24', 'Bruxelles - Brussel ', '');
INSERT INTO `state` VALUES ('103', '24', 'Hainaut - Henegouwen', '');
INSERT INTO `state` VALUES ('104', '24', 'Li?ge - Luik', '');
INSERT INTO `state` VALUES ('105', '24', 'Limburg - Limbourg', '');
INSERT INTO `state` VALUES ('106', '24', 'Luxembourg - Luxemburg', '');
INSERT INTO `state` VALUES ('107', '24', 'Namur - Namen', '');
INSERT INTO `state` VALUES ('108', '24', 'Oost Vlaanderen - Flandre Orientale ', '');
INSERT INTO `state` VALUES ('109', '24', 'Vlaams Brabant - Brabant Flamand', '');
INSERT INTO `state` VALUES ('110', '24', 'West Vlaanderen - Flandre Occidentale ', '');
INSERT INTO `state` VALUES ('111', '25', 'Belize ', '');
INSERT INTO `state` VALUES ('112', '25', 'Cayo ', '');
INSERT INTO `state` VALUES ('113', '25', 'Orange Walk', '');
INSERT INTO `state` VALUES ('114', '25', 'Toledo ', '');
INSERT INTO `state` VALUES ('115', '26', 'Atakora ', '');
INSERT INTO `state` VALUES ('116', '26', 'Atlantique ', '');
INSERT INTO `state` VALUES ('117', '26', 'Oueme ', '');
INSERT INTO `state` VALUES ('118', '27', 'Hamilton ', '');
INSERT INTO `state` VALUES ('119', '27', 'Sandys ', '');
INSERT INTO `state` VALUES ('120', '28', 'Bhutan ', '');
INSERT INTO `state` VALUES ('121', '29', 'Beni ', '');
INSERT INTO `state` VALUES ('122', '29', 'Chuquisaca ', '');
INSERT INTO `state` VALUES ('123', '29', 'Cochabamba ', '');
INSERT INTO `state` VALUES ('124', '29', 'La Paz', '');
INSERT INTO `state` VALUES ('125', '29', 'Oruro ', '');
INSERT INTO `state` VALUES ('126', '29', 'Pando ', '');
INSERT INTO `state` VALUES ('127', '29', 'Potosi ', '');
INSERT INTO `state` VALUES ('128', '29', 'Santa Cruz', '');
INSERT INTO `state` VALUES ('129', '29', 'Tarija ', '');
INSERT INTO `state` VALUES ('130', '30', 'Beni ', '');
INSERT INTO `state` VALUES ('131', '31', 'South East ', '');
INSERT INTO `state` VALUES ('132', '32', 'NA ', '');
INSERT INTO `state` VALUES ('133', '33', 'Acre ', '');
INSERT INTO `state` VALUES ('134', '33', 'Alagoas ', '');
INSERT INTO `state` VALUES ('135', '33', 'Amapa ', '');
INSERT INTO `state` VALUES ('136', '33', 'Amazonas ', '');
INSERT INTO `state` VALUES ('137', '33', 'Bahia ', '');
INSERT INTO `state` VALUES ('138', '33', 'Ceara ', '');
INSERT INTO `state` VALUES ('139', '33', 'Distrito Federal ', '');
INSERT INTO `state` VALUES ('140', '33', 'Espirito Santo', '');
INSERT INTO `state` VALUES ('141', '33', 'Goias ', '');
INSERT INTO `state` VALUES ('142', '33', 'Maranhao ', '');
INSERT INTO `state` VALUES ('143', '33', 'Mato Grosso', '');
INSERT INTO `state` VALUES ('144', '33', 'Mato Grosso do Sul', '');
INSERT INTO `state` VALUES ('145', '33', 'Minas Gerais ', '');
INSERT INTO `state` VALUES ('146', '33', 'Para ', '');
INSERT INTO `state` VALUES ('147', '33', 'Paraiba ', '');
INSERT INTO `state` VALUES ('148', '33', 'Parana ', '');
INSERT INTO `state` VALUES ('149', '33', 'Pernambuco ', '');
INSERT INTO `state` VALUES ('150', '33', 'Piaui ', '');
INSERT INTO `state` VALUES ('151', '33', 'Rio de Janeiro', '');
INSERT INTO `state` VALUES ('152', '33', 'Rio Grande do Norte', '');
INSERT INTO `state` VALUES ('153', '33', 'Rio Grande do Sul', '');
INSERT INTO `state` VALUES ('154', '33', 'Rondonia ', '');
INSERT INTO `state` VALUES ('155', '33', 'Roraima ', '');
INSERT INTO `state` VALUES ('156', '33', 'Santa Catarina', '');
INSERT INTO `state` VALUES ('157', '33', 'Sao Paulo', '');
INSERT INTO `state` VALUES ('158', '33', 'Sergipe ', '');
INSERT INTO `state` VALUES ('159', '33', 'Tocantins ', '');
INSERT INTO `state` VALUES ('160', '34', 'NA ', '');
INSERT INTO `state` VALUES ('163', '37', 'Burgas ', '');
INSERT INTO `state` VALUES ('164', '37', 'Grad Sofiya', '');
INSERT INTO `state` VALUES ('165', '37', 'Lovech ', '');
INSERT INTO `state` VALUES ('166', '37', 'Plovdiv ', '');
INSERT INTO `state` VALUES ('167', '37', 'Razgrad ', '');
INSERT INTO `state` VALUES ('168', '37', 'Stara Zagora ', '');
INSERT INTO `state` VALUES ('169', '37', 'Varna ', '');
INSERT INTO `state` VALUES ('170', '38', 'Kourweogo ', '');
INSERT INTO `state` VALUES ('171', '38', 'Passore ', '');
INSERT INTO `state` VALUES ('172', '38', 'Yatenga ', '');
INSERT INTO `state` VALUES ('173', '39', 'Thaninthayi', '');
INSERT INTO `state` VALUES ('174', '40', 'Bujumbura ', '');
INSERT INTO `state` VALUES ('175', '41', 'Battambang ', '');
INSERT INTO `state` VALUES ('176', '41', 'Kampong Cham', '');
INSERT INTO `state` VALUES ('177', '41', 'Kampong Speu ', '');
INSERT INTO `state` VALUES ('178', '41', 'Kampong Thom', '');
INSERT INTO `state` VALUES ('179', '41', 'Kracheh ', '');
INSERT INTO `state` VALUES ('180', '41', 'Phnom Penh Municipality ', '');
INSERT INTO `state` VALUES ('181', '41', 'Prey Veng', '');
INSERT INTO `state` VALUES ('182', '41', 'Pursat ', '');
INSERT INTO `state` VALUES ('183', '41', 'Siem Reap', '');
INSERT INTO `state` VALUES ('184', '41', 'Stung Treng ', '');
INSERT INTO `state` VALUES ('185', '41', 'Svay Rieng ', '');
INSERT INTO `state` VALUES ('186', '41', 'Takeo ', '');
INSERT INTO `state` VALUES ('187', '42', 'Centre ', '');
INSERT INTO `state` VALUES ('188', '42', 'Littoral ', '');
INSERT INTO `state` VALUES ('189', '42', 'Sud-Ouest', '');
INSERT INTO `state` VALUES ('190', '43', 'Alberta ', '');
INSERT INTO `state` VALUES ('191', '43', 'British Columbia', '');
INSERT INTO `state` VALUES ('192', '43', 'Manitoba ', '');
INSERT INTO `state` VALUES ('193', '43', 'New Brunswick', '');
INSERT INTO `state` VALUES ('194', '43', 'Newfoundland ', '');
INSERT INTO `state` VALUES ('195', '43', 'Northwest Territories', '');
INSERT INTO `state` VALUES ('196', '43', 'Nova Scotia', '');
INSERT INTO `state` VALUES ('197', '43', 'Nunavut ', '');
INSERT INTO `state` VALUES ('198', '43', 'Ontario ', '');
INSERT INTO `state` VALUES ('199', '43', 'Prince Edward Island ', '');
INSERT INTO `state` VALUES ('200', '43', 'Quebec ', '');
INSERT INTO `state` VALUES ('201', '43', 'Saskatchewan ', '');
INSERT INTO `state` VALUES ('202', '43', 'ukon Territory', '');
INSERT INTO `state` VALUES ('203', '44', 'Sao Tiago', '');
INSERT INTO `state` VALUES ('204', '44', 'Sao Vicente ', '');
INSERT INTO `state` VALUES ('205', '45', 'Little Cayman ', '');
INSERT INTO `state` VALUES ('206', '46', 'Lobaye ', '');
INSERT INTO `state` VALUES ('207', '47', 'Chad ', '');
INSERT INTO `state` VALUES ('208', '48', 'Aisen ', '');
INSERT INTO `state` VALUES ('209', '48', 'Antofagasta ', '');
INSERT INTO `state` VALUES ('210', '48', 'Araucania ', '');
INSERT INTO `state` VALUES ('211', '48', 'Atacama ', '');
INSERT INTO `state` VALUES ('212', '48', 'Bio-Bio', '');
INSERT INTO `state` VALUES ('213', '48', 'Coquimbo ', '');
INSERT INTO `state` VALUES ('214', '48', 'Libertador General ', '');
INSERT INTO `state` VALUES ('215', '48', 'los Lagos', '');
INSERT INTO `state` VALUES ('216', '48', 'Magall. Y Ant. Chilena', '');
INSERT INTO `state` VALUES ('217', '48', 'Maule ', '');
INSERT INTO `state` VALUES ('218', '48', 'Metrop. De Santiago', '');
INSERT INTO `state` VALUES ('219', '48', 'Tarapaca ', '');
INSERT INTO `state` VALUES ('220', '48', 'Valparaiso', '');
INSERT INTO `state` VALUES ('221', '49', 'Shanghai ', '');
INSERT INTO `state` VALUES ('222', '49', 'Yunnan ', '');
INSERT INTO `state` VALUES ('223', '49', 'Neimenggu ', '');
INSERT INTO `state` VALUES ('224', '49', 'Beijing ', '');
INSERT INTO `state` VALUES ('225', '49', 'Jilin ', '');
INSERT INTO `state` VALUES ('226', '49', 'Sichuan ', '');
INSERT INTO `state` VALUES ('227', '49', 'Tianjin ', '');
INSERT INTO `state` VALUES ('228', '49', 'Ningxia Hui', '');
INSERT INTO `state` VALUES ('229', '49', 'Anhui ', '');
INSERT INTO `state` VALUES ('230', '49', 'Shandong ', '');
INSERT INTO `state` VALUES ('231', '49', 'Shanxi ', '');
INSERT INTO `state` VALUES ('232', '49', 'Guangdong ', '');
INSERT INTO `state` VALUES ('233', '49', 'Guangxi Zhuang', '');
INSERT INTO `state` VALUES ('234', '49', 'Xinjiang Uygur ', '');
INSERT INTO `state` VALUES ('235', '49', 'Jiangsu', '');
INSERT INTO `state` VALUES ('236', '49', 'Jiangxi', '');
INSERT INTO `state` VALUES ('237', '49', 'Hebei ', '');
INSERT INTO `state` VALUES ('238', '49', 'Henan ', '');
INSERT INTO `state` VALUES ('239', '49', 'Zhejiang ', '');
INSERT INTO `state` VALUES ('240', '49', 'Hainan ', '');
INSERT INTO `state` VALUES ('241', '49', 'Hubei ', '');
INSERT INTO `state` VALUES ('242', '49', 'Hunan ', '');
INSERT INTO `state` VALUES ('243', '49', 'Macao ', '');
INSERT INTO `state` VALUES ('244', '49', 'Gansu ', '');
INSERT INTO `state` VALUES ('245', '49', 'Fujian ', '');
INSERT INTO `state` VALUES ('246', '49', 'Taiwan ', '');
INSERT INTO `state` VALUES ('247', '49', 'Sitsang/Xizang ', '');
INSERT INTO `state` VALUES ('248', '49', 'Guizhou ', '');
INSERT INTO `state` VALUES ('249', '49', 'Liaoning ', '');
INSERT INTO `state` VALUES ('250', '49', 'Chongqing ', '');
INSERT INTO `state` VALUES ('251', '49', 'Shanxi ', '');
INSERT INTO `state` VALUES ('252', '49', 'Qinghai ', '');
INSERT INTO `state` VALUES ('253', '49', 'Hong Kong', '');
INSERT INTO `state` VALUES ('254', '49', 'Heilongjiang ', '');
INSERT INTO `state` VALUES ('265', '53', 'Amazonas ', '');
INSERT INTO `state` VALUES ('264', '52', 'Cocos (Keeling) Islands', '');
INSERT INTO `state` VALUES ('262', '50', 'Christmas Island', '');
INSERT INTO `state` VALUES ('266', '53', 'Antioquia ', '');
INSERT INTO `state` VALUES ('267', '53', 'Arauca', '');
INSERT INTO `state` VALUES ('268', '53', 'Atlantico', '');
INSERT INTO `state` VALUES ('269', '53', 'Bogota ', '');
INSERT INTO `state` VALUES ('270', '53', 'Bolivar ', '');
INSERT INTO `state` VALUES ('271', '53', 'Boyaca ', '');
INSERT INTO `state` VALUES ('272', '53', 'Caldas ', '');
INSERT INTO `state` VALUES ('273', '53', 'Caqueta ', '');
INSERT INTO `state` VALUES ('274', '53', 'Casanare ', '');
INSERT INTO `state` VALUES ('275', '53', 'Cauca ', '');
INSERT INTO `state` VALUES ('276', '53', 'Cesar ', '');
INSERT INTO `state` VALUES ('277', '53', 'Choco ', '');
INSERT INTO `state` VALUES ('278', '53', 'Cordoba ', '');
INSERT INTO `state` VALUES ('279', '53', 'Cundinamarca ', '');
INSERT INTO `state` VALUES ('280', '53', 'Distrito Capital', '');
INSERT INTO `state` VALUES ('281', '53', 'Huila ', '');
INSERT INTO `state` VALUES ('282', '53', 'La Guajira ', '');
INSERT INTO `state` VALUES ('283', '53', 'Magdalena ', '');
INSERT INTO `state` VALUES ('284', '53', 'Meta ', '');
INSERT INTO `state` VALUES ('285', '53', 'Narino ', '');
INSERT INTO `state` VALUES ('286', '53', 'Norte de Santander', '');
INSERT INTO `state` VALUES ('287', '53', 'Putumayo ', '');
INSERT INTO `state` VALUES ('288', '53', 'Risaralda ', '');
INSERT INTO `state` VALUES ('289', '53', 'San Andres y Providencia', '');
INSERT INTO `state` VALUES ('290', '53', 'Santander ', '');
INSERT INTO `state` VALUES ('291', '53', 'Tolima ', '');
INSERT INTO `state` VALUES ('292', '53', 'Valle del Cauca', '');
INSERT INTO `state` VALUES ('293', '54', 'Comoros ', '');
INSERT INTO `state` VALUES ('296', '57', 'Rarotonga ', '');
INSERT INTO `state` VALUES ('298', '59', 'Alajuela ', '');
INSERT INTO `state` VALUES ('299', '59', 'Cartago ', '');
INSERT INTO `state` VALUES ('300', '59', 'Guanacaste ', '');
INSERT INTO `state` VALUES ('301', '59', 'Heredia ', '');
INSERT INTO `state` VALUES ('302', '59', 'Puerto Limon - Limon', '');
INSERT INTO `state` VALUES ('303', '59', 'Puntarenas ', '');
INSERT INTO `state` VALUES ('304', '59', 'San Jose', '');
INSERT INTO `state` VALUES ('306', '61', 'Brodsko-Posavska ', '');
INSERT INTO `state` VALUES ('307', '61', 'Dubrovacko-Neretvanska', '');
INSERT INTO `state` VALUES ('308', '61', 'Istarska ', '');
INSERT INTO `state` VALUES ('309', '61', 'Koprivnicko-Krizevacka', '');
INSERT INTO `state` VALUES ('310', '61', 'Krapinsko-Zagorska', '');
INSERT INTO `state` VALUES ('311', '61', 'Osjecko-Baranjska', '');
INSERT INTO `state` VALUES ('312', '61', 'Pozesko-Slavonska', '');
INSERT INTO `state` VALUES ('313', '61', 'Primorsko-Goranska', '');
INSERT INTO `state` VALUES ('314', '61', 'Sisacko-Moslavacka', '');
INSERT INTO `state` VALUES ('315', '61', 'Splitsko-Dalmatinska', '');
INSERT INTO `state` VALUES ('316', '61', 'Varazdinska ', '');
INSERT INTO `state` VALUES ('317', '61', 'Vukovarsko-Srijemska', '');
INSERT INTO `state` VALUES ('318', '61', 'Zadarska ', '');
INSERT INTO `state` VALUES ('319', '61', 'Zagreb ', '');
INSERT INTO `state` VALUES ('320', '61', 'Zagrebacka ', '');
INSERT INTO `state` VALUES ('321', '62', 'Camaguey ', '');
INSERT INTO `state` VALUES ('322', '62', 'Ciego de Avila', '');
INSERT INTO `state` VALUES ('323', '62', 'Cienfuegos ', '');
INSERT INTO `state` VALUES ('324', '62', 'Ciudad de La Habana', '');
INSERT INTO `state` VALUES ('325', '62', 'Granma ', '');
INSERT INTO `state` VALUES ('326', '62', 'Guantanamo ', '');
INSERT INTO `state` VALUES ('327', '62', 'Holguin ', '');
INSERT INTO `state` VALUES ('328', '62', 'La Habana ', '');
INSERT INTO `state` VALUES ('329', '62', 'Las Tunas', '');
INSERT INTO `state` VALUES ('330', '62', 'Matanzas ', '');
INSERT INTO `state` VALUES ('331', '62', 'Pinar del Rio', '');
INSERT INTO `state` VALUES ('332', '62', 'Sancti Spiritus', '');
INSERT INTO `state` VALUES ('333', '62', 'Santiago de Cuba', '');
INSERT INTO `state` VALUES ('334', '62', 'Villa Clara', '');
INSERT INTO `state` VALUES ('335', '63', 'Famagusta ', '');
INSERT INTO `state` VALUES ('336', '63', 'Kyrenia ', '');
INSERT INTO `state` VALUES ('337', '63', 'Larnaca ', '');
INSERT INTO `state` VALUES ('338', '63', 'Limassol ', '');
INSERT INTO `state` VALUES ('339', '63', 'Nicosia ', '');
INSERT INTO `state` VALUES ('340', '63', 'Paphos ', '');
INSERT INTO `state` VALUES ('341', '64', 'Hlavni Mesto Praha', '');
INSERT INTO `state` VALUES ('342', '64', 'JihoCesk Kraj', '');
INSERT INTO `state` VALUES ('343', '64', 'Jihomoravsk Kraj', '');
INSERT INTO `state` VALUES ('344', '64', 'Karlovarsk Kraj', '');
INSERT INTO `state` VALUES ('345', '64', 'Kralovehradeck Kraj', '');
INSERT INTO `state` VALUES ('346', '64', 'Libereck Kraj', '');
INSERT INTO `state` VALUES ('347', '64', 'Moravskoslezsk Kraj', '');
INSERT INTO `state` VALUES ('348', '64', 'Olomouck Kraj', '');
INSERT INTO `state` VALUES ('349', '64', 'Pardubick Kraj', '');
INSERT INTO `state` VALUES ('350', '64', 'Plze?sk Kraj', '');
INSERT INTO `state` VALUES ('351', '64', 'St?edocesk Kraj', '');
INSERT INTO `state` VALUES ('352', '64', 'usteck Kraj', '');
INSERT INTO `state` VALUES ('353', '64', 'VysoCina ', '');
INSERT INTO `state` VALUES ('354', '64', 'Zlinsk Kraj', '');
INSERT INTO `state` VALUES ('355', '65', 'Hovedstaden ', '');
INSERT INTO `state` VALUES ('356', '65', 'Midtjylland ', '');
INSERT INTO `state` VALUES ('357', '65', 'Nordjylland ', '');
INSERT INTO `state` VALUES ('358', '65', 'Sjlland', '');
INSERT INTO `state` VALUES ('359', '65', 'Syddanmark ', '');
INSERT INTO `state` VALUES ('360', '66', 'Djibouti ', '');
INSERT INTO `state` VALUES ('361', '67', 'Saint George', '');
INSERT INTO `state` VALUES ('362', '68', 'Azua ', '');
INSERT INTO `state` VALUES ('363', '68', 'Bahoruco ', '');
INSERT INTO `state` VALUES ('364', '68', 'Barahona ', '');
INSERT INTO `state` VALUES ('365', '68', 'Dajabon ', '');
INSERT INTO `state` VALUES ('366', '68', 'Distrito Nacional', '');
INSERT INTO `state` VALUES ('367', '68', 'Duarte ', '');
INSERT INTO `state` VALUES ('368', '68', 'El Seibo', '');
INSERT INTO `state` VALUES ('369', '68', 'Elias Pina', '');
INSERT INTO `state` VALUES ('370', '68', 'Espaillat ', '');
INSERT INTO `state` VALUES ('371', '68', 'Hato Mayor', '');
INSERT INTO `state` VALUES ('372', '68', 'Independencia ', '');
INSERT INTO `state` VALUES ('373', '68', 'La Altagracia', '');
INSERT INTO `state` VALUES ('374', '68', 'La Romana', '');
INSERT INTO `state` VALUES ('375', '68', 'La Vega', '');
INSERT INTO `state` VALUES ('376', '68', 'Maria Trinidad Sanchez', '');
INSERT INTO `state` VALUES ('377', '68', 'Monsenor Nouel', '');
INSERT INTO `state` VALUES ('378', '68', 'Monte Cristi', '');
INSERT INTO `state` VALUES ('379', '68', 'Monte Plata', '');
INSERT INTO `state` VALUES ('380', '68', 'Pedernales ', '');
INSERT INTO `state` VALUES ('381', '68', 'Peravia ', '');
INSERT INTO `state` VALUES ('382', '68', 'Puerto Plata', '');
INSERT INTO `state` VALUES ('383', '68', 'Salcedo ', '');
INSERT INTO `state` VALUES ('384', '68', 'Samana ', '');
INSERT INTO `state` VALUES ('385', '68', 'San Cristobal', '');
INSERT INTO `state` VALUES ('386', '68', 'San Jose De Ocoa', '');
INSERT INTO `state` VALUES ('387', '68', 'San Juan', '');
INSERT INTO `state` VALUES ('388', '68', 'San Pedro de Macoris', '');
INSERT INTO `state` VALUES ('389', '68', 'Sanchez Ramirez', '');
INSERT INTO `state` VALUES ('390', '68', 'Santiago ', '');
INSERT INTO `state` VALUES ('391', '68', 'Santiago Rodriguez', '');
INSERT INTO `state` VALUES ('392', '68', 'Santo Domingo', '');
INSERT INTO `state` VALUES ('393', '68', 'Valverde ', '');
INSERT INTO `state` VALUES ('394', '69', 'East Timor', '');
INSERT INTO `state` VALUES ('395', '70', 'Azuay ', '');
INSERT INTO `state` VALUES ('396', '70', 'Bolivar ', '');
INSERT INTO `state` VALUES ('397', '70', 'Canar ', '');
INSERT INTO `state` VALUES ('398', '70', 'Carchi ', '');
INSERT INTO `state` VALUES ('399', '70', 'Chimborazo ', '');
INSERT INTO `state` VALUES ('400', '70', 'Cotopaxi ', '');
INSERT INTO `state` VALUES ('401', '70', 'El Oro', '');
INSERT INTO `state` VALUES ('402', '70', 'Esmeraldas ', '');
INSERT INTO `state` VALUES ('403', '70', 'Galapagos ', '');
INSERT INTO `state` VALUES ('404', '70', 'Guayas ', '');
INSERT INTO `state` VALUES ('405', '70', 'Imbabura ', '');
INSERT INTO `state` VALUES ('406', '70', 'Loja ', '');
INSERT INTO `state` VALUES ('407', '70', 'Los Rios', '');
INSERT INTO `state` VALUES ('408', '70', 'Manabi ', '');
INSERT INTO `state` VALUES ('409', '70', 'Morona-Santiago', '');
INSERT INTO `state` VALUES ('410', '70', 'Napo ', '');
INSERT INTO `state` VALUES ('411', '70', 'Orellana ', '');
INSERT INTO `state` VALUES ('412', '70', 'Pastaza ', '');
INSERT INTO `state` VALUES ('413', '70', 'Pichincha ', '');
INSERT INTO `state` VALUES ('414', '70', 'Sucumbios ', '');
INSERT INTO `state` VALUES ('415', '70', 'Tungurahua ', '');
INSERT INTO `state` VALUES ('416', '70', 'Zamora Chinchipe', '');
INSERT INTO `state` VALUES ('417', '71', 'Ad Daqahliyah', '');
INSERT INTO `state` VALUES ('418', '71', 'Al Bahr al Ahmar', '');
INSERT INTO `state` VALUES ('419', '71', 'Al Jizah', '');
INSERT INTO `state` VALUES ('420', '71', 'Al Qahirah', '');
INSERT INTO `state` VALUES ('421', '71', 'Qina ', '');
INSERT INTO `state` VALUES ('422', '71', 'Sinai Desert', '');
INSERT INTO `state` VALUES ('423', '71', 'Suhaj ', '');
INSERT INTO `state` VALUES ('424', '72', 'Ahuachapan ', '');
INSERT INTO `state` VALUES ('425', '72', 'Cabanas ', '');
INSERT INTO `state` VALUES ('426', '72', 'Chalatenango ', '');
INSERT INTO `state` VALUES ('427', '72', 'Cuscatlan ', '');
INSERT INTO `state` VALUES ('428', '72', 'La Libertad', '');
INSERT INTO `state` VALUES ('429', '72', 'La Paz', '');
INSERT INTO `state` VALUES ('430', '72', 'La Union', '');
INSERT INTO `state` VALUES ('431', '72', 'Morazan ', '');
INSERT INTO `state` VALUES ('432', '72', 'San Miguel', '');
INSERT INTO `state` VALUES ('433', '72', 'San Salvador', '');
INSERT INTO `state` VALUES ('434', '72', 'San Vicente', '');
INSERT INTO `state` VALUES ('435', '72', 'Santa Ana', '');
INSERT INTO `state` VALUES ('436', '72', 'Sonsonate ', '');
INSERT INTO `state` VALUES ('437', '72', 'Usulutan ', '');
INSERT INTO `state` VALUES ('438', '73', 'Equatorial Guinea ', '');
INSERT INTO `state` VALUES ('440', '75', 'Harju ', '');
INSERT INTO `state` VALUES ('441', '75', 'Jogeva ', '');
INSERT INTO `state` VALUES ('442', '75', 'Laane-Viru', '');
INSERT INTO `state` VALUES ('443', '75', 'Parnu ', '');
INSERT INTO `state` VALUES ('444', '75', 'Saare ', '');
INSERT INTO `state` VALUES ('445', '75', 'Tartu ', '');
INSERT INTO `state` VALUES ('446', '75', 'Viljandi ', '');
INSERT INTO `state` VALUES ('447', '76', 'Adis Abeba', '');
INSERT INTO `state` VALUES ('448', '76', 'Tigray ', '');
INSERT INTO `state` VALUES ('451', '79', 'Faroe Islands', '');
INSERT INTO `state` VALUES ('452', '80', 'Central ', '');
INSERT INTO `state` VALUES ('453', '81', 'Ahvenanmaa ', '');
INSERT INTO `state` VALUES ('454', '81', 'Etel-Karjala', '');
INSERT INTO `state` VALUES ('455', '81', 'Etel-Pohjanmaa', '');
INSERT INTO `state` VALUES ('456', '81', 'Etel-Savo', '');
INSERT INTO `state` VALUES ('457', '81', 'Hme', '');
INSERT INTO `state` VALUES ('458', '81', 'It-Uusimaa', '');
INSERT INTO `state` VALUES ('459', '81', 'Kainuu ', '');
INSERT INTO `state` VALUES ('460', '81', 'Keski-Pohjanmaa', '');
INSERT INTO `state` VALUES ('461', '81', 'Keski-Suomi', '');
INSERT INTO `state` VALUES ('462', '81', 'Kymenlaakso ', '');
INSERT INTO `state` VALUES ('463', '81', 'Lappi ', '');
INSERT INTO `state` VALUES ('464', '81', 'Pijt-Hme', '');
INSERT INTO `state` VALUES ('465', '81', 'Pirkanmaa ', '');
INSERT INTO `state` VALUES ('466', '81', 'Pohjanmaa ', '');
INSERT INTO `state` VALUES ('467', '81', 'Pohjois-Karjala', '');
INSERT INTO `state` VALUES ('468', '81', 'Pohjois-Pohjanmaa', '');
INSERT INTO `state` VALUES ('469', '81', 'Pohjois-Savo', '');
INSERT INTO `state` VALUES ('470', '81', 'Satakunta ', '');
INSERT INTO `state` VALUES ('471', '81', 'Uusimaa ', '');
INSERT INTO `state` VALUES ('472', '81', 'Varsinais-Suomi', '');
INSERT INTO `state` VALUES ('473', '82', 'Alsace ', '');
INSERT INTO `state` VALUES ('474', '82', 'Aquitaine ', '');
INSERT INTO `state` VALUES ('475', '82', 'Auvergne ', '');
INSERT INTO `state` VALUES ('476', '82', 'Basse Normandie', '');
INSERT INTO `state` VALUES ('477', '82', 'Bourgogne ', '');
INSERT INTO `state` VALUES ('478', '82', 'Bretagne ', '');
INSERT INTO `state` VALUES ('479', '82', 'Centre ', '');
INSERT INTO `state` VALUES ('480', '82', 'Champagne-Ardenne', '');
INSERT INTO `state` VALUES ('481', '82', 'Corse ', '');
INSERT INTO `state` VALUES ('482', '82', 'Franche Comte', '');
INSERT INTO `state` VALUES ('483', '82', 'Guadeloupe ', '');
INSERT INTO `state` VALUES ('484', '82', 'Guyane ', '');
INSERT INTO `state` VALUES ('485', '82', 'Haute Normandie', '');
INSERT INTO `state` VALUES ('486', '82', 'Ile de France', '');
INSERT INTO `state` VALUES ('487', '82', 'La Reunion', '');
INSERT INTO `state` VALUES ('488', '82', 'Languedoc-Roussillon', '');
INSERT INTO `state` VALUES ('489', '82', 'Limousin ', '');
INSERT INTO `state` VALUES ('490', '82', 'Martinique ', '');
INSERT INTO `state` VALUES ('491', '82', 'Midi-Pyrenees', '');
INSERT INTO `state` VALUES ('492', '82', 'Nord - Pas de Calais', '');
INSERT INTO `state` VALUES ('493', '82', 'Nouvelle Caledonie', '');
INSERT INTO `state` VALUES ('494', '82', 'Pays de la Loire', '');
INSERT INTO `state` VALUES ('495', '82', 'Picardie ', '');
INSERT INTO `state` VALUES ('496', '82', 'Poitou-Charentes', '');
INSERT INTO `state` VALUES ('497', '82', 'Polynesie Francaise ', '');
INSERT INTO `state` VALUES ('498', '82', 'Provence - Alpes - Cote d Azur', '');
INSERT INTO `state` VALUES ('499', '82', 'Rhone-Alpes ', '');
INSERT INTO `state` VALUES ('500', '82', 'St Pierre et Miquelon ', '');
INSERT INTO `state` VALUES ('502', '84', 'Cayenne ', '');
INSERT INTO `state` VALUES ('503', '85', 'French Polynesia ', '');
INSERT INTO `state` VALUES ('505', '87', 'Estuaire ', '');
INSERT INTO `state` VALUES ('506', '88', 'Banjul ', '');
INSERT INTO `state` VALUES ('507', '88', 'Brikama ', '');
INSERT INTO `state` VALUES ('510', '91', 'Baden-Wurttemberg', '');
INSERT INTO `state` VALUES ('511', '91', 'Bayern ', '');
INSERT INTO `state` VALUES ('512', '91', 'Berlin ', '');
INSERT INTO `state` VALUES ('513', '91', 'Brandenburg ', '');
INSERT INTO `state` VALUES ('514', '91', 'Bremen ', '');
INSERT INTO `state` VALUES ('515', '91', 'Hamburg ', '');
INSERT INTO `state` VALUES ('516', '91', 'Hessen ', '');
INSERT INTO `state` VALUES ('517', '91', 'Mecklenburg-Vorpommern', '');
INSERT INTO `state` VALUES ('518', '91', 'Niedersachsen ', '');
INSERT INTO `state` VALUES ('519', '91', 'Nordrhein-Westfalen', '');
INSERT INTO `state` VALUES ('520', '91', 'Rheinland-Pfalz', '');
INSERT INTO `state` VALUES ('521', '91', 'Saarland ', '');
INSERT INTO `state` VALUES ('522', '91', 'Sachsen ', '');
INSERT INTO `state` VALUES ('523', '91', 'Sachsen-Anhalt', '');
INSERT INTO `state` VALUES ('524', '91', 'Schleswig-Holstein', '');
INSERT INTO `state` VALUES ('525', '91', 'Thuringen ', '');
INSERT INTO `state` VALUES ('526', '92', 'Ashanti ', '');
INSERT INTO `state` VALUES ('527', '92', 'Central ', '');
INSERT INTO `state` VALUES ('528', '92', 'Eastern ', '');
INSERT INTO `state` VALUES ('529', '92', 'Greater Accra', '');
INSERT INTO `state` VALUES ('530', '92', 'Northern ', '');
INSERT INTO `state` VALUES ('531', '92', 'Upper East', '');
INSERT INTO `state` VALUES ('532', '93', 'Gibraltar ', '');
INSERT INTO `state` VALUES ('534', '95', 'Ahaia ', '');
INSERT INTO `state` VALUES ('535', '95', 'Argolis ', '');
INSERT INTO `state` VALUES ('536', '95', 'Attiki ', '');
INSERT INTO `state` VALUES ('537', '95', 'Dodekanisos ', '');
INSERT INTO `state` VALUES ('538', '95', 'Evvoia ', '');
INSERT INTO `state` VALUES ('539', '95', 'Hania ', '');
INSERT INTO `state` VALUES ('540', '95', 'Iraklion ', '');
INSERT INTO `state` VALUES ('541', '95', 'Kavala ', '');
INSERT INTO `state` VALUES ('542', '95', 'Kefallinia ', '');
INSERT INTO `state` VALUES ('543', '95', 'Kerkira ', '');
INSERT INTO `state` VALUES ('544', '95', 'Kiklades ', '');
INSERT INTO `state` VALUES ('545', '95', 'Kilkis ', '');
INSERT INTO `state` VALUES ('546', '95', 'Korinthia ', '');
INSERT INTO `state` VALUES ('547', '95', 'Kozani ', '');
INSERT INTO `state` VALUES ('548', '95', 'Larisa ', '');
INSERT INTO `state` VALUES ('549', '95', 'Lasithi ', '');
INSERT INTO `state` VALUES ('550', '95', 'Lesvos ', '');
INSERT INTO `state` VALUES ('551', '95', 'Magnisia ', '');
INSERT INTO `state` VALUES ('552', '95', 'Messinia ', '');
INSERT INTO `state` VALUES ('553', '95', 'Pieria ', '');
INSERT INTO `state` VALUES ('554', '95', 'Samos ', '');
INSERT INTO `state` VALUES ('555', '95', 'Serrai ', '');
INSERT INTO `state` VALUES ('556', '95', 'Thessaloniki ', '');
INSERT INTO `state` VALUES ('557', '95', 'Trikala ', '');
INSERT INTO `state` VALUES ('558', '95', 'Voiotia ', '');
INSERT INTO `state` VALUES ('559', '95', 'Zakinthos ', '');
INSERT INTO `state` VALUES ('560', '96', 'Nuuk ', '');
INSERT INTO `state` VALUES ('561', '97', 'Carriacou and Petit Martinique', '');
INSERT INTO `state` VALUES ('562', '98', 'Guadeloupe ', '');
INSERT INTO `state` VALUES ('563', '99', 'Guam ', '');
INSERT INTO `state` VALUES ('564', '100', 'Alta Verapaz ', '');
INSERT INTO `state` VALUES ('565', '100', 'Baja Verapaz', '');
INSERT INTO `state` VALUES ('566', '100', 'Chimaltenango ', '');
INSERT INTO `state` VALUES ('567', '100', 'Chiquimula ', '');
INSERT INTO `state` VALUES ('568', '100', 'El Progreso', '');
INSERT INTO `state` VALUES ('569', '100', 'Escuintla ', '');
INSERT INTO `state` VALUES ('570', '100', 'Guatemala ', '');
INSERT INTO `state` VALUES ('571', '100', 'Huehuetenango ', '');
INSERT INTO `state` VALUES ('572', '100', 'Izabal ', '');
INSERT INTO `state` VALUES ('573', '100', 'Jalapa ', '');
INSERT INTO `state` VALUES ('574', '100', 'Jutiapa ', '');
INSERT INTO `state` VALUES ('575', '100', 'Peten ', '');
INSERT INTO `state` VALUES ('576', '100', 'Quetzaltenango ', '');
INSERT INTO `state` VALUES ('577', '100', 'Quiche ', '');
INSERT INTO `state` VALUES ('578', '100', 'Retalhuleu ', '');
INSERT INTO `state` VALUES ('579', '100', 'Sacatepequez ', '');
INSERT INTO `state` VALUES ('580', '100', 'San Marcos ', '');
INSERT INTO `state` VALUES ('581', '100', 'Santa Rosa', '');
INSERT INTO `state` VALUES ('582', '100', 'Solola ', '');
INSERT INTO `state` VALUES ('583', '100', 'Suchitepequez ', '');
INSERT INTO `state` VALUES ('584', '100', 'Totonicapan ', '');
INSERT INTO `state` VALUES ('585', '100', 'Zacapa ', '');
INSERT INTO `state` VALUES ('587', '102', 'Conakry ', '');
INSERT INTO `state` VALUES ('588', '103', 'Guinea-Bissau', '');
INSERT INTO `state` VALUES ('589', '104', 'Demerara-Mahaica ', '');
INSERT INTO `state` VALUES ('590', '104', 'East Berbice-Corentyne', '');
INSERT INTO `state` VALUES ('591', '104', 'Essequibo Islands-West Demerara', '');
INSERT INTO `state` VALUES ('592', '104', 'Mahaica-Berbice', '');
INSERT INTO `state` VALUES ('593', '104', 'Pomeroon-Supenaam', '');
INSERT INTO `state` VALUES ('594', '104', 'Upper Demerara-Berbice', '');
INSERT INTO `state` VALUES ('595', '105', 'Centre ', '');
INSERT INTO `state` VALUES ('596', '105', 'Ouest ', '');
INSERT INTO `state` VALUES ('597', '105', 'Sud-Est', '');
INSERT INTO `state` VALUES ('600', '108', 'Atlantida ', '');
INSERT INTO `state` VALUES ('601', '108', 'Choluteca ', '');
INSERT INTO `state` VALUES ('602', '108', 'Colon ', '');
INSERT INTO `state` VALUES ('603', '108', 'Comayagua ', '');
INSERT INTO `state` VALUES ('604', '108', 'Copan ', '');
INSERT INTO `state` VALUES ('605', '108', 'Cortes ', '');
INSERT INTO `state` VALUES ('606', '108', 'El Paraiso', '');
INSERT INTO `state` VALUES ('607', '108', 'Francisco Morazan ', '');
INSERT INTO `state` VALUES ('608', '108', 'Gracias a Dios', '');
INSERT INTO `state` VALUES ('609', '108', 'Intibuca ', '');
INSERT INTO `state` VALUES ('610', '108', 'Islas de la Bahia ', '');
INSERT INTO `state` VALUES ('611', '108', 'La Paz', '');
INSERT INTO `state` VALUES ('612', '108', 'Lempira ', '');
INSERT INTO `state` VALUES ('613', '108', 'Ocotepeque ', '');
INSERT INTO `state` VALUES ('614', '108', 'Olancho ', '');
INSERT INTO `state` VALUES ('615', '108', 'Santa Barbara', '');
INSERT INTO `state` VALUES ('616', '108', 'Valle ', '');
INSERT INTO `state` VALUES ('617', '108', 'Yoro ', '');
INSERT INTO `state` VALUES ('618', '109', 'Hong Kong', '');
INSERT INTO `state` VALUES ('620', '111', 'Bacs-Kiskun', '');
INSERT INTO `state` VALUES ('621', '111', 'Baranya ', '');
INSERT INTO `state` VALUES ('622', '111', 'Borsod-Abauj-Zemblen', '');
INSERT INTO `state` VALUES ('623', '111', 'Budapest ', '');
INSERT INTO `state` VALUES ('624', '111', 'Csongrad ', '');
INSERT INTO `state` VALUES ('625', '111', 'Fejer ', '');
INSERT INTO `state` VALUES ('626', '111', 'Gyor-Moson-Sopron', '');
INSERT INTO `state` VALUES ('627', '111', 'Hajdu-Bihar', '');
INSERT INTO `state` VALUES ('628', '111', 'Heves ', '');
INSERT INTO `state` VALUES ('629', '111', 'Jasz-Nagkyun-Szolnok', '');
INSERT INTO `state` VALUES ('630', '111', 'Komarom-Esztergom', '');
INSERT INTO `state` VALUES ('631', '111', 'Nograd ', '');
INSERT INTO `state` VALUES ('632', '111', 'Pest ', '');
INSERT INTO `state` VALUES ('633', '111', 'Somogy ', '');
INSERT INTO `state` VALUES ('634', '111', 'Szabolcs-Szatmar-Bereg ', '');
INSERT INTO `state` VALUES ('635', '111', 'Tolna ', '');
INSERT INTO `state` VALUES ('636', '111', 'Vas ', '');
INSERT INTO `state` VALUES ('637', '111', 'Zala ', '');
INSERT INTO `state` VALUES ('638', '112', 'Hofudborgarsvaedi ', '');
INSERT INTO `state` VALUES ('639', '112', 'Nordhurland Vestra', '');
INSERT INTO `state` VALUES ('640', '112', 'Sudhurland ', '');
INSERT INTO `state` VALUES ('641', '112', 'Sudhurnes ', '');
INSERT INTO `state` VALUES ('642', '113', 'Andhra Pradesh ', '');
INSERT INTO `state` VALUES ('643', '113', 'Assam ', '');
INSERT INTO `state` VALUES ('644', '113', 'Bihar ', '');
INSERT INTO `state` VALUES ('645', '113', 'Chandigarh ', '');
INSERT INTO `state` VALUES ('646', '113', 'Chhattisgarh ', '');
INSERT INTO `state` VALUES ('647', '113', 'Delhi ', '');
INSERT INTO `state` VALUES ('648', '113', 'Goa ', '');
INSERT INTO `state` VALUES ('649', '113', 'Gujarat ', '');
INSERT INTO `state` VALUES ('650', '113', 'Haryana ', '');
INSERT INTO `state` VALUES ('651', '113', 'Himachal Pradesh', '');
INSERT INTO `state` VALUES ('652', '113', 'Jammu and Kashmir', '');
INSERT INTO `state` VALUES ('653', '113', 'Jharkhand ', '');
INSERT INTO `state` VALUES ('654', '113', 'Karnataka ', '');
INSERT INTO `state` VALUES ('655', '113', 'Kerala ', '');
INSERT INTO `state` VALUES ('656', '113', 'Madhya Pradesh', '');
INSERT INTO `state` VALUES ('657', '113', 'Maharashtra ', '');
INSERT INTO `state` VALUES ('658', '113', 'Manipur ', '');
INSERT INTO `state` VALUES ('659', '113', 'Orissa ', '');
INSERT INTO `state` VALUES ('660', '113', 'Pondicherry ', '');
INSERT INTO `state` VALUES ('661', '113', 'Punjab ', '');
INSERT INTO `state` VALUES ('662', '113', 'Rajasthan ', '');
INSERT INTO `state` VALUES ('663', '113', 'Sikkim ', '');
INSERT INTO `state` VALUES ('664', '113', 'Tamil Nadu', '');
INSERT INTO `state` VALUES ('665', '113', 'Uttar Pradesh', '');
INSERT INTO `state` VALUES ('666', '113', 'Uttarakhand ', '');
INSERT INTO `state` VALUES ('667', '113', 'West Bengal', '');
INSERT INTO `state` VALUES ('668', '114', 'Bali ', '');
INSERT INTO `state` VALUES ('669', '114', 'Banten ', '');
INSERT INTO `state` VALUES ('670', '114', 'Jakarta Raya', '');
INSERT INTO `state` VALUES ('671', '114', 'Jawa Barat - West Java ', '');
INSERT INTO `state` VALUES ('672', '114', 'Jawa Tengah - Central Java ', '');
INSERT INTO `state` VALUES ('673', '114', 'Jawa Timur - East Java ', '');
INSERT INTO `state` VALUES ('674', '114', 'Kalimantan Barat - West Kalimantan', '');
INSERT INTO `state` VALUES ('675', '114', 'Kalimantan Timur - East Kalimantan ', '');
INSERT INTO `state` VALUES ('676', '114', 'Lampung ', '');
INSERT INTO `state` VALUES ('677', '114', 'Nusa Tenggara Barat - West Nusa Tenggara ', '');
INSERT INTO `state` VALUES ('678', '114', 'Papua ', '');
INSERT INTO `state` VALUES ('679', '114', 'Riau Kepulauan', '');
INSERT INTO `state` VALUES ('680', '114', 'Sulawesi Selatan - South Sulawesi', '');
INSERT INTO `state` VALUES ('681', '114', 'Sulawesi Utara - North Sulawesi ', '');
INSERT INTO `state` VALUES ('682', '114', 'Sumatera Barat - West Sumatra ', '');
INSERT INTO `state` VALUES ('683', '114', 'Sumatera Selatan - South Sumatra', '');
INSERT INTO `state` VALUES ('684', '114', 'Sumatera Utara - North Sumatra', '');
INSERT INTO `state` VALUES ('685', '114', 'Yogyakarta ', '');
INSERT INTO `state` VALUES ('687', '116', 'Al Basrah ', '');
INSERT INTO `state` VALUES ('688', '116', 'Baghdad ', '');
INSERT INTO `state` VALUES ('689', '117', 'Carlow ', '');
INSERT INTO `state` VALUES ('690', '117', 'Cavan ', '');
INSERT INTO `state` VALUES ('691', '117', 'Clare ', '');
INSERT INTO `state` VALUES ('692', '117', 'Cork ', '');
INSERT INTO `state` VALUES ('693', '117', 'Donegal ', '');
INSERT INTO `state` VALUES ('694', '117', 'Dublin ', '');
INSERT INTO `state` VALUES ('695', '117', 'Galway ', '');
INSERT INTO `state` VALUES ('696', '117', 'Kerry ', '');
INSERT INTO `state` VALUES ('697', '117', 'Kildare ', '');
INSERT INTO `state` VALUES ('698', '117', 'Kilkenny ', '');
INSERT INTO `state` VALUES ('699', '117', 'Laois ', '');
INSERT INTO `state` VALUES ('700', '117', 'Leitrim ', '');
INSERT INTO `state` VALUES ('701', '117', 'Limerick ', '');
INSERT INTO `state` VALUES ('702', '117', 'Longford ', '');
INSERT INTO `state` VALUES ('703', '117', 'Louth ', '');
INSERT INTO `state` VALUES ('704', '117', 'Mayo ', '');
INSERT INTO `state` VALUES ('705', '117', 'Meath ', '');
INSERT INTO `state` VALUES ('706', '117', 'Monaghan ', '');
INSERT INTO `state` VALUES ('707', '117', 'Offaly ', '');
INSERT INTO `state` VALUES ('708', '117', 'Roscommon ', '');
INSERT INTO `state` VALUES ('709', '117', 'Sligo ', '');
INSERT INTO `state` VALUES ('710', '117', 'Tipperary ', '');
INSERT INTO `state` VALUES ('711', '117', 'Waterford ', '');
INSERT INTO `state` VALUES ('712', '117', 'Westmeath ', '');
INSERT INTO `state` VALUES ('713', '117', 'Wexford ', '');
INSERT INTO `state` VALUES ('714', '117', 'Wicklow ', '');
INSERT INTO `state` VALUES ('715', '118', 'Hadaron (Southern Dsitrict)', '');
INSERT INTO `state` VALUES ('716', '118', 'Haifa - Hefa ', '');
INSERT INTO `state` VALUES ('717', '118', 'Hamerkaz (Central district)', '');
INSERT INTO `state` VALUES ('718', '118', 'Hazafon (Northern District)', '');
INSERT INTO `state` VALUES ('719', '118', 'Jerusalem ', '');
INSERT INTO `state` VALUES ('720', '118', 'Tel Aviv ', '');
INSERT INTO `state` VALUES ('721', '119', 'Abruzzo ', '');
INSERT INTO `state` VALUES ('722', '119', 'Basilicata ', '');
INSERT INTO `state` VALUES ('723', '119', 'Calabria ', '');
INSERT INTO `state` VALUES ('724', '119', 'Campania ', '');
INSERT INTO `state` VALUES ('725', '119', 'Emilia-Romagna', '');
INSERT INTO `state` VALUES ('726', '119', 'Friuli-Venezia Giulia ', '');
INSERT INTO `state` VALUES ('727', '119', 'Lazio ', '');
INSERT INTO `state` VALUES ('728', '119', 'Liguria ', '');
INSERT INTO `state` VALUES ('729', '119', 'Lombardia ', '');
INSERT INTO `state` VALUES ('730', '119', 'Marche ', '');
INSERT INTO `state` VALUES ('731', '119', 'Molise ', '');
INSERT INTO `state` VALUES ('732', '119', 'Piemonte ', '');
INSERT INTO `state` VALUES ('733', '119', 'Puglia ', '');
INSERT INTO `state` VALUES ('734', '119', 'Sardegna ', '');
INSERT INTO `state` VALUES ('735', '119', 'Sicilia ', '');
INSERT INTO `state` VALUES ('736', '119', 'Toscana ', '');
INSERT INTO `state` VALUES ('737', '119', 'Trentino-Alto Adige', '');
INSERT INTO `state` VALUES ('738', '119', 'Umbria ', '');
INSERT INTO `state` VALUES ('739', '119', 'Veneto ', '');
INSERT INTO `state` VALUES ('740', '120', 'Clarendon ', '');
INSERT INTO `state` VALUES ('741', '120', 'Hanover ', '');
INSERT INTO `state` VALUES ('742', '120', 'Kingston ', '');
INSERT INTO `state` VALUES ('743', '120', 'Manchester ', '');
INSERT INTO `state` VALUES ('744', '120', 'Saint Andrew ', '');
INSERT INTO `state` VALUES ('745', '120', 'Saint Ann ', '');
INSERT INTO `state` VALUES ('746', '120', 'Saint Catherine', '');
INSERT INTO `state` VALUES ('747', '120', 'Saint Elizabeth ', '');
INSERT INTO `state` VALUES ('748', '120', 'Saint James ', '');
INSERT INTO `state` VALUES ('749', '120', 'Saint Mary ', '');
INSERT INTO `state` VALUES ('750', '120', 'Saint Thomas', '');
INSERT INTO `state` VALUES ('751', '120', 'Trelawny ', '');
INSERT INTO `state` VALUES ('752', '120', 'Westmoreland ', '');
INSERT INTO `state` VALUES ('754', '122', 'Mie Prefecture', '');
INSERT INTO `state` VALUES ('755', '122', 'Kyoto ', '');
INSERT INTO `state` VALUES ('756', '122', 'Saga ', '');
INSERT INTO `state` VALUES ('757', '122', 'Hyogo ', '');
INSERT INTO `state` VALUES ('758', '122', 'Hokkaido ', '');
INSERT INTO `state` VALUES ('759', '122', 'Chiba ', '');
INSERT INTO `state` VALUES ('760', '122', 'Wakayama ', '');
INSERT INTO `state` VALUES ('761', '122', 'Saitama ', '');
INSERT INTO `state` VALUES ('762', '122', 'Oita ', '');
INSERT INTO `state` VALUES ('763', '122', 'Osaka prefecture', '');
INSERT INTO `state` VALUES ('764', '122', 'NARA ', '');
INSERT INTO `state` VALUES ('765', '122', 'Miyagi ', '');
INSERT INTO `state` VALUES ('766', '122', 'Miyazaki ', '');
INSERT INTO `state` VALUES ('767', '122', 'Toyama ', '');
INSERT INTO `state` VALUES ('768', '122', 'Yamaguchi ', '');
INSERT INTO `state` VALUES ('769', '122', 'Yamagata Prefecture', '');
INSERT INTO `state` VALUES ('770', '122', 'Yamanashi ', '');
INSERT INTO `state` VALUES ('771', '122', 'Gifu ', '');
INSERT INTO `state` VALUES ('772', '122', 'Okayama ', '');
INSERT INTO `state` VALUES ('773', '122', 'Iwate Prefecture', '');
INSERT INTO `state` VALUES ('774', '122', 'Shimane Prefecture', '');
INSERT INTO `state` VALUES ('775', '122', 'Shimane Prefecture', '');
INSERT INTO `state` VALUES ('776', '122', 'Hiroshima ', '');
INSERT INTO `state` VALUES ('777', '122', 'Tokushima ', '');
INSERT INTO `state` VALUES ('778', '122', 'Ehime ', '');
INSERT INTO `state` VALUES ('779', '122', 'Aichi ', '');
INSERT INTO `state` VALUES ('780', '122', 'Niigata ', '');
INSERT INTO `state` VALUES ('781', '122', 'Tokyo ', '');
INSERT INTO `state` VALUES ('782', '122', 'Tochigi ', '');
INSERT INTO `state` VALUES ('783', '122', 'Okinawa ', '');
INSERT INTO `state` VALUES ('784', '122', 'Shiga ', '');
INSERT INTO `state` VALUES ('785', '122', 'Kumamoto ', '');
INSERT INTO `state` VALUES ('786', '122', 'Ishikawa ', '');
INSERT INTO `state` VALUES ('787', '122', 'Kanagawa ', '');
INSERT INTO `state` VALUES ('788', '122', 'Fukui ', '');
INSERT INTO `state` VALUES ('789', '122', 'Fukuoka ', '');
INSERT INTO `state` VALUES ('790', '122', 'Fukushima ', '');
INSERT INTO `state` VALUES ('791', '122', 'Akita ', '');
INSERT INTO `state` VALUES ('792', '122', 'Gunma ', '');
INSERT INTO `state` VALUES ('793', '122', 'Ibaraki ', '');
INSERT INTO `state` VALUES ('794', '122', 'Nagasaki ', '');
INSERT INTO `state` VALUES ('795', '122', 'Nagano ', '');
INSERT INTO `state` VALUES ('796', '122', 'Aomori Prefecture ', '');
INSERT INTO `state` VALUES ('797', '122', 'Shizuoka ', '');
INSERT INTO `state` VALUES ('798', '122', 'Kagawa ', '');
INSERT INTO `state` VALUES ('799', '122', 'Kochi ', '');
INSERT INTO `state` VALUES ('800', '122', 'Tottori ', '');
INSERT INTO `state` VALUES ('801', '122', 'Kagoshima Prefecture ', '');
INSERT INTO `state` VALUES ('805', '126', 'Al Karak', '');
INSERT INTO `state` VALUES ('806', '126', 'Irbid ', '');
INSERT INTO `state` VALUES ('809', '129', 'Central ', '');
INSERT INTO `state` VALUES ('810', '129', 'Coast ', '');
INSERT INTO `state` VALUES ('811', '129', 'Eastern ', '');
INSERT INTO `state` VALUES ('812', '129', 'Nairobi Area ', '');
INSERT INTO `state` VALUES ('813', '129', 'Nyanza ', '');
INSERT INTO `state` VALUES ('814', '129', 'Rift Valley ', '');
INSERT INTO `state` VALUES ('815', '129', 'Western ', '');
INSERT INTO `state` VALUES ('817', '131', 'Kiribati ', '');
INSERT INTO `state` VALUES ('820', '134', 'Al Ahmadi', '');
INSERT INTO `state` VALUES ('821', '134', 'Al Farwaniyah', '');
INSERT INTO `state` VALUES ('822', '135', 'Bishkek Shaary', '');
INSERT INTO `state` VALUES ('823', '135', 'Ysyk-Kol (Karakol)', '');
INSERT INTO `state` VALUES ('825', '137', 'Liepajas ', '');
INSERT INTO `state` VALUES ('826', '137', 'Rigas ', '');
INSERT INTO `state` VALUES ('827', '137', 'Ventspils ', '');
INSERT INTO `state` VALUES ('828', '138', 'Beyrouth ', '');
INSERT INTO `state` VALUES ('829', '138', 'Liban-Nord', '');
INSERT INTO `state` VALUES ('830', '139', 'Maseru ', '');
INSERT INTO `state` VALUES ('831', '140', 'Bong ', '');
INSERT INTO `state` VALUES ('832', '140', 'Montserrado ', '');
INSERT INTO `state` VALUES ('834', '142', 'Balzers ', '');
INSERT INTO `state` VALUES ('835', '142', 'Planken ', '');
INSERT INTO `state` VALUES ('836', '142', 'Ruggell ', '');
INSERT INTO `state` VALUES ('837', '142', 'Schaan ', '');
INSERT INTO `state` VALUES ('838', '142', 'Schellenberg ', '');
INSERT INTO `state` VALUES ('839', '142', 'Triesen ', '');
INSERT INTO `state` VALUES ('840', '142', 'Vaduz ', '');
INSERT INTO `state` VALUES ('841', '143', 'Kauno ', '');
INSERT INTO `state` VALUES ('842', '143', 'Klaipedos ', '');
INSERT INTO `state` VALUES ('843', '143', 'Vilniaus ', '');
INSERT INTO `state` VALUES ('844', '144', 'Diekirch ', '');
INSERT INTO `state` VALUES ('845', '144', 'Grevenmacher ', '');
INSERT INTO `state` VALUES ('846', '144', 'Luxembourg ', '');
INSERT INTO `state` VALUES ('848', '146', 'Ohrid ', '');
INSERT INTO `state` VALUES ('849', '146', 'Skopje ', '');
INSERT INTO `state` VALUES ('850', '146', 'Tetovo ', '');
INSERT INTO `state` VALUES ('851', '147', 'Antananarivo ', '');
INSERT INTO `state` VALUES ('852', '148', 'Blantyre ', '');
INSERT INTO `state` VALUES ('853', '149', 'Johor ', '');
INSERT INTO `state` VALUES ('854', '149', 'Kedah ', '');
INSERT INTO `state` VALUES ('855', '149', 'Kelantan ', '');
INSERT INTO `state` VALUES ('856', '149', 'Melaka ', '');
INSERT INTO `state` VALUES ('857', '149', 'Negeri Sembilan ', '');
INSERT INTO `state` VALUES ('858', '149', 'Pahang ', '');
INSERT INTO `state` VALUES ('859', '149', 'Perak ', '');
INSERT INTO `state` VALUES ('860', '149', 'Perlis ', '');
INSERT INTO `state` VALUES ('861', '149', 'Pulau Pinang', '');
INSERT INTO `state` VALUES ('862', '149', 'Sabah ', '');
INSERT INTO `state` VALUES ('863', '149', 'Sarawak ', '');
INSERT INTO `state` VALUES ('864', '149', 'Selangor ', '');
INSERT INTO `state` VALUES ('865', '149', 'Terengganu ', '');
INSERT INTO `state` VALUES ('866', '149', 'Wilayah persekutuan Labuan', '');
INSERT INTO `state` VALUES ('867', '150', 'Maale ', '');
INSERT INTO `state` VALUES ('868', '151', 'Bamako ', '');
INSERT INTO `state` VALUES ('869', '151', 'Mopti ', '');
INSERT INTO `state` VALUES ('870', '152', 'Malta ', '');
INSERT INTO `state` VALUES ('873', '154', 'Marshall Islands', '');
INSERT INTO `state` VALUES ('879', '158', 'Mayotte ', '');
INSERT INTO `state` VALUES ('875', '155', 'Fort-de-Franc', '');
INSERT INTO `state` VALUES ('876', '156', 'Nouakchott ', '');
INSERT INTO `state` VALUES ('877', '157', 'Plaines Wilhems', '');
INSERT INTO `state` VALUES ('878', '157', 'Port Louis', '');
INSERT INTO `state` VALUES ('880', '159', 'Aguascalientes ', '');
INSERT INTO `state` VALUES ('881', '159', 'Baja California ', '');
INSERT INTO `state` VALUES ('882', '159', 'Baja California Sur', '');
INSERT INTO `state` VALUES ('883', '159', 'Campeche ', '');
INSERT INTO `state` VALUES ('884', '159', 'Chiapas ', '');
INSERT INTO `state` VALUES ('885', '159', 'Chihuahua ', '');
INSERT INTO `state` VALUES ('886', '159', 'Coahuila ', '');
INSERT INTO `state` VALUES ('887', '159', 'Colima ', '');
INSERT INTO `state` VALUES ('888', '159', 'Distrito Federal ', '');
INSERT INTO `state` VALUES ('889', '159', 'Durango ', '');
INSERT INTO `state` VALUES ('890', '159', 'Guanajuato ', '');
INSERT INTO `state` VALUES ('891', '159', 'Guerrero ', '');
INSERT INTO `state` VALUES ('892', '159', 'Hidalgo ', '');
INSERT INTO `state` VALUES ('893', '159', 'Jalisco ', '');
INSERT INTO `state` VALUES ('894', '159', 'Mexico ', '');
INSERT INTO `state` VALUES ('895', '159', 'Michoacan ', '');
INSERT INTO `state` VALUES ('896', '159', 'Morelos ', '');
INSERT INTO `state` VALUES ('897', '159', 'Nayarit ', '');
INSERT INTO `state` VALUES ('898', '159', 'Nuevo Leon', '');
INSERT INTO `state` VALUES ('899', '159', 'Oaxaca ', '');
INSERT INTO `state` VALUES ('900', '159', 'Queretaro ', '');
INSERT INTO `state` VALUES ('901', '159', 'Quintana Roo', '');
INSERT INTO `state` VALUES ('902', '159', 'San Luis Potosi', '');
INSERT INTO `state` VALUES ('903', '159', 'Sinaloa ', '');
INSERT INTO `state` VALUES ('904', '159', 'Sonora ', '');
INSERT INTO `state` VALUES ('905', '159', 'Tabasco ', '');
INSERT INTO `state` VALUES ('906', '159', 'Tamaulipas ', '');
INSERT INTO `state` VALUES ('907', '159', 'Tlaxcala ', '');
INSERT INTO `state` VALUES ('908', '159', 'Veracruz ', '');
INSERT INTO `state` VALUES ('909', '159', 'Yucatan ', '');
INSERT INTO `state` VALUES ('914', '164', 'Monaco ', '');
INSERT INTO `state` VALUES ('915', '165', 'Arhangay ', '');
INSERT INTO `state` VALUES ('916', '165', 'Bayan-Olgiy', '');
INSERT INTO `state` VALUES ('917', '165', 'Bulgan ', '');
INSERT INTO `state` VALUES ('918', '165', 'Dornod ', '');
INSERT INTO `state` VALUES ('919', '165', 'Govi-Altay', '');
INSERT INTO `state` VALUES ('920', '165', 'Hentiy ', '');
INSERT INTO `state` VALUES ('921', '165', 'Hovd ', '');
INSERT INTO `state` VALUES ('922', '165', 'Hovsgol ', '');
INSERT INTO `state` VALUES ('923', '165', 'Orhon ', '');
INSERT INTO `state` VALUES ('924', '165', 'Selenge ', '');
INSERT INTO `state` VALUES ('925', '165', 'Ulaanbaatar ', '');
INSERT INTO `state` VALUES ('926', '165', 'Uvs ', '');
INSERT INTO `state` VALUES ('928', '167', 'Montserrat ', '');
INSERT INTO `state` VALUES ('929', '168', 'Montserrat ', '');
INSERT INTO `state` VALUES ('930', '168', 'Fes-Boulmane', '');
INSERT INTO `state` VALUES ('931', '168', 'Meknes-Tafilalet', '');
INSERT INTO `state` VALUES ('932', '168', 'Oriental ', '');
INSERT INTO `state` VALUES ('933', '168', 'Rabat-Sale-Zemmour-Zaer', '');
INSERT INTO `state` VALUES ('934', '168', 'Sous-Massa-Draa ', '');
INSERT INTO `state` VALUES ('935', '168', 'Casablanca ', '');
INSERT INTO `state` VALUES ('936', '168', 'Fes-Boulmane', '');
INSERT INTO `state` VALUES ('937', '169', 'Maputo City ', '');
INSERT INTO `state` VALUES ('938', '169', 'Nampula ', '');
INSERT INTO `state` VALUES ('939', '170', 'Mon State', '');
INSERT INTO `state` VALUES ('940', '170', 'Yangon ', '');
INSERT INTO `state` VALUES ('941', '171', 'Erongo ', '');
INSERT INTO `state` VALUES ('942', '171', 'Kavango ', '');
INSERT INTO `state` VALUES ('943', '171', 'Khomas ', '');
INSERT INTO `state` VALUES ('944', '171', 'Oshana ', '');
INSERT INTO `state` VALUES ('945', '171', 'Oshikoto ', '');
INSERT INTO `state` VALUES ('946', '171', 'Otjozondjupa ', '');
INSERT INTO `state` VALUES ('947', '172', 'Nauru ', '');
INSERT INTO `state` VALUES ('949', '174', 'Bagmati ', '');
INSERT INTO `state` VALUES ('950', '174', 'Kosi ', '');
INSERT INTO `state` VALUES ('951', '175', 'Drenthe ', '');
INSERT INTO `state` VALUES ('952', '175', 'Flevoland ', '');
INSERT INTO `state` VALUES ('953', '175', 'Friesland ', '');
INSERT INTO `state` VALUES ('954', '175', 'Gelderland ', '');
INSERT INTO `state` VALUES ('955', '175', 'Groningen ', '');
INSERT INTO `state` VALUES ('956', '175', 'Limburg ', '');
INSERT INTO `state` VALUES ('957', '175', 'Noord-Brabant', '');
INSERT INTO `state` VALUES ('958', '175', 'Noord-Holland', '');
INSERT INTO `state` VALUES ('959', '175', 'Overijssel ', '');
INSERT INTO `state` VALUES ('960', '175', 'Utrecht ', '');
INSERT INTO `state` VALUES ('961', '175', 'Zeeland ', '');
INSERT INTO `state` VALUES ('962', '175', 'Zuid-Holland', '');
INSERT INTO `state` VALUES ('963', '176', 'Netherlands Antilles', '');
INSERT INTO `state` VALUES ('964', '177', 'New Caledonia', '');
INSERT INTO `state` VALUES ('965', '178', 'Auckland ', '');
INSERT INTO `state` VALUES ('966', '178', 'Bay of Plenty', '');
INSERT INTO `state` VALUES ('967', '178', 'Canterbury ', '');
INSERT INTO `state` VALUES ('968', '178', 'Chatham islands', '');
INSERT INTO `state` VALUES ('969', '178', 'Christchurch ', '');
INSERT INTO `state` VALUES ('970', '178', 'Coromandel ', '');
INSERT INTO `state` VALUES ('971', '178', 'Dunedin ', '');
INSERT INTO `state` VALUES ('972', '178', 'Eastland ', '');
INSERT INTO `state` VALUES ('973', '178', 'Fiordland ', '');
INSERT INTO `state` VALUES ('974', '178', 'Horowhenua ', '');
INSERT INTO `state` VALUES ('975', '178', 'Mt Cook', '');
INSERT INTO `state` VALUES ('976', '178', 'Nelson ', '');
INSERT INTO `state` VALUES ('977', '178', 'Northland ', '');
INSERT INTO `state` VALUES ('978', '178', 'Otago ', '');
INSERT INTO `state` VALUES ('979', '178', 'Rotorua ', '');
INSERT INTO `state` VALUES ('980', '178', 'Southland ', '');
INSERT INTO `state` VALUES ('981', '178', 'Taranaki ', '');
INSERT INTO `state` VALUES ('982', '178', 'Taupo/Ruapehu', '');
INSERT INTO `state` VALUES ('983', '178', 'Waikato ', '');
INSERT INTO `state` VALUES ('984', '178', 'Wairarapa ', '');
INSERT INTO `state` VALUES ('985', '178', 'Wanaka ', '');
INSERT INTO `state` VALUES ('986', '178', 'Wellington ', '');
INSERT INTO `state` VALUES ('987', '178', 'Westcoast ', '');
INSERT INTO `state` VALUES ('988', '179', 'Atlantico Norte', '');
INSERT INTO `state` VALUES ('989', '179', 'Atlantico Sur ', '');
INSERT INTO `state` VALUES ('990', '179', 'Boaco ', '');
INSERT INTO `state` VALUES ('991', '179', 'Carazo ', '');
INSERT INTO `state` VALUES ('992', '179', 'Chinandega ', '');
INSERT INTO `state` VALUES ('993', '179', 'Chontales ', '');
INSERT INTO `state` VALUES ('994', '179', 'Esteli ', '');
INSERT INTO `state` VALUES ('995', '179', 'Granada ', '');
INSERT INTO `state` VALUES ('996', '179', 'Jinotega ', '');
INSERT INTO `state` VALUES ('997', '179', 'Leon ', '');
INSERT INTO `state` VALUES ('998', '179', 'Madriz ', '');
INSERT INTO `state` VALUES ('999', '179', 'Managua ', '');
INSERT INTO `state` VALUES ('1000', '179', 'Masaya ', '');
INSERT INTO `state` VALUES ('1001', '179', 'Matagalpa ', '');
INSERT INTO `state` VALUES ('1002', '179', 'Nueva Segovia', '');
INSERT INTO `state` VALUES ('1003', '179', 'Rio San Juan ', '');
INSERT INTO `state` VALUES ('1004', '180', 'Niger ', '');
INSERT INTO `state` VALUES ('1005', '181', 'Abuja Federal Capital Territory', '');
INSERT INTO `state` VALUES ('1006', '181', 'Delta ', '');
INSERT INTO `state` VALUES ('1007', '181', 'Edo ', '');
INSERT INTO `state` VALUES ('1008', '181', 'Kaduna ', '');
INSERT INTO `state` VALUES ('1009', '181', 'Lagos ', '');
INSERT INTO `state` VALUES ('1010', '181', 'Osun ', '');
INSERT INTO `state` VALUES ('1011', '181', 'Oyo ', '');
INSERT INTO `state` VALUES ('1012', '181', 'Rivers ', '');
INSERT INTO `state` VALUES ('1013', '182', 'Niue ', '');
INSERT INTO `state` VALUES ('1014', '183', 'Norfolk Island', '');
INSERT INTO `state` VALUES ('1015', '184', 'Saipan ', '');
INSERT INTO `state` VALUES ('1016', '185', 'Akershus ', '');
INSERT INTO `state` VALUES ('1017', '185', 'Aust-Adger', '');
INSERT INTO `state` VALUES ('1018', '185', 'Buskerud ', '');
INSERT INTO `state` VALUES ('1019', '185', 'Hedmark ', '');
INSERT INTO `state` VALUES ('1020', '185', 'Hordaland ', '');
INSERT INTO `state` VALUES ('1021', '185', 'M?re og Romsdal', '');
INSERT INTO `state` VALUES ('1022', '185', 'Nord-Tr?ndelag', '');
INSERT INTO `state` VALUES ('1023', '185', 'Nordland ', '');
INSERT INTO `state` VALUES ('1024', '185', 'Oppland ', '');
INSERT INTO `state` VALUES ('1025', '185', 'Oslo ', '');
INSERT INTO `state` VALUES ('1026', '185', 'Rogaland ', '');
INSERT INTO `state` VALUES ('1027', '185', 'Telemark ', '');
INSERT INTO `state` VALUES ('1028', '185', 'Troms ', '');
INSERT INTO `state` VALUES ('1029', '185', 'Vest-Agder ', '');
INSERT INTO `state` VALUES ('1030', '186', 'Ash Sharqiyah', '');
INSERT INTO `state` VALUES ('1031', '186', 'Masqat ', '');
INSERT INTO `state` VALUES ('1032', '187', 'Azad Kashmir', '');
INSERT INTO `state` VALUES ('1033', '187', 'Balochistan ', '');
INSERT INTO `state` VALUES ('1034', '187', 'N.W.F.P (Surhad', '');
INSERT INTO `state` VALUES ('1035', '187', 'Islamabad Capital Territory', '');
INSERT INTO `state` VALUES ('1036', '187', 'Northern Areas', '');
INSERT INTO `state` VALUES ('1037', '187', 'Punjab ', '');
INSERT INTO `state` VALUES ('1038', '187', 'Sindh ', '');
INSERT INTO `state` VALUES ('1039', '188', 'Palau ', '');
INSERT INTO `state` VALUES ('1041', '190', 'Bocas del Toro', '');
INSERT INTO `state` VALUES ('1042', '190', 'Chiriqui ', '');
INSERT INTO `state` VALUES ('1043', '190', 'Cocle ', '');
INSERT INTO `state` VALUES ('1044', '190', 'Colon ', '');
INSERT INTO `state` VALUES ('1045', '190', 'Darien ', '');
INSERT INTO `state` VALUES ('1046', '190', 'Herrera ', '');
INSERT INTO `state` VALUES ('1047', '190', 'Los Santos', '');
INSERT INTO `state` VALUES ('1048', '190', 'Panama ', '');
INSERT INTO `state` VALUES ('1049', '190', 'Veraguas ', '');
INSERT INTO `state` VALUES ('1050', '191', 'Eastern Highlands', '');
INSERT INTO `state` VALUES ('1051', '191', 'Madang ', '');
INSERT INTO `state` VALUES ('1052', '191', 'Morobe ', '');
INSERT INTO `state` VALUES ('1053', '191', 'National Capital', '');
INSERT INTO `state` VALUES ('1054', '191', 'Western Highlands', '');
INSERT INTO `state` VALUES ('1056', '193', 'Alto Paraguay ', '');
INSERT INTO `state` VALUES ('1057', '193', 'Alto Parana', '');
INSERT INTO `state` VALUES ('1058', '193', 'Amambay ', '');
INSERT INTO `state` VALUES ('1059', '193', 'Asuncion ', '');
INSERT INTO `state` VALUES ('1060', '193', 'Caaguazu ', '');
INSERT INTO `state` VALUES ('1061', '193', 'Caazapa ', '');
INSERT INTO `state` VALUES ('1062', '193', 'Canindeyu ', '');
INSERT INTO `state` VALUES ('1063', '193', 'Central ', '');
INSERT INTO `state` VALUES ('1064', '193', 'Concepcion ', '');
INSERT INTO `state` VALUES ('1065', '193', 'Cordillera ', '');
INSERT INTO `state` VALUES ('1066', '193', 'Guaira ', '');
INSERT INTO `state` VALUES ('1067', '193', 'Itapua ', '');
INSERT INTO `state` VALUES ('1068', '193', 'Misiones ', '');
INSERT INTO `state` VALUES ('1069', '193', 'neembucu ', '');
INSERT INTO `state` VALUES ('1070', '193', 'Paraguari ', '');
INSERT INTO `state` VALUES ('1071', '193', 'Presidente Hayes', '');
INSERT INTO `state` VALUES ('1073', '193', 'San Pedro ', '');
INSERT INTO `state` VALUES ('1074', '194', 'Amazonas ', '');
INSERT INTO `state` VALUES ('1075', '194', 'Ancash ', '');
INSERT INTO `state` VALUES ('1076', '194', 'Apurimac ', '');
INSERT INTO `state` VALUES ('1077', '194', 'Arequipa ', '');
INSERT INTO `state` VALUES ('1078', '194', 'Ayacucho ', '');
INSERT INTO `state` VALUES ('1079', '194', 'Cajamarca ', '');
INSERT INTO `state` VALUES ('1080', '194', 'Callao ', '');
INSERT INTO `state` VALUES ('1081', '194', 'Cusco ', '');
INSERT INTO `state` VALUES ('1082', '194', 'Huancavelica ', '');
INSERT INTO `state` VALUES ('1083', '194', 'Huanuco ', '');
INSERT INTO `state` VALUES ('1084', '194', 'Ica ', '');
INSERT INTO `state` VALUES ('1085', '194', 'Junin ', '');
INSERT INTO `state` VALUES ('1086', '194', 'La Libertad', '');
INSERT INTO `state` VALUES ('1087', '194', '>Lambayeque', '');
INSERT INTO `state` VALUES ('1088', '194', 'Lima ', '');
INSERT INTO `state` VALUES ('1089', '194', 'Loreto ', '');
INSERT INTO `state` VALUES ('1090', '194', 'Madre de Dios', '');
INSERT INTO `state` VALUES ('1091', '194', 'Moquegua ', '');
INSERT INTO `state` VALUES ('1092', '194', 'Pasco ', '');
INSERT INTO `state` VALUES ('1093', '194', 'Puno ', '');
INSERT INTO `state` VALUES ('1094', '194', 'San Martin', '');
INSERT INTO `state` VALUES ('1095', '194', 'Tacna ', '');
INSERT INTO `state` VALUES ('1096', '195', 'Tacna ', '');
INSERT INTO `state` VALUES ('1097', '195', 'Albay ', '');
INSERT INTO `state` VALUES ('1098', '195', 'Benguet ', '');
INSERT INTO `state` VALUES ('1099', '195', 'Cagayan ', '');
INSERT INTO `state` VALUES ('1100', '195', 'Camarines Norte', '');
INSERT INTO `state` VALUES ('1101', '195', 'Capiz ', '');
INSERT INTO `state` VALUES ('1102', '195', 'Cavite ', '');
INSERT INTO `state` VALUES ('1103', '195', 'Cebu ', '');
INSERT INTO `state` VALUES ('1104', '195', 'Davao del Norte', '');
INSERT INTO `state` VALUES ('1105', '195', 'Ilocos Norte ', '');
INSERT INTO `state` VALUES ('1106', '195', 'Iloilo', '');
INSERT INTO `state` VALUES ('1107', '195', 'La Union', '');
INSERT INTO `state` VALUES ('1108', '195', 'Laguna ', '');
INSERT INTO `state` VALUES ('1109', '195', 'Leyte ', '');
INSERT INTO `state` VALUES ('1110', '195', 'Mindoro Oriental', '');
INSERT INTO `state` VALUES ('1111', '195', 'Misamis Oriental', '');
INSERT INTO `state` VALUES ('1112', '195', 'Negros Occidental', '');
INSERT INTO `state` VALUES ('1113', '195', 'Negros Oriental ', '');
INSERT INTO `state` VALUES ('1114', '195', 'Palawan ', '');
INSERT INTO `state` VALUES ('1115', '195', 'Rizal ', '');
INSERT INTO `state` VALUES ('1116', '195', 'Sorsogon ', '');
INSERT INTO `state` VALUES ('1117', '195', 'South Cotabato ', '');
INSERT INTO `state` VALUES ('1118', '195', 'Tarlac ', '');
INSERT INTO `state` VALUES ('1119', '195', 'Tawitawi ', '');
INSERT INTO `state` VALUES ('1120', '195', 'Zambales ', '');
INSERT INTO `state` VALUES ('1121', '195', 'Zamboanga del norte', '');
INSERT INTO `state` VALUES ('1123', '197', 'Dolnoslaskie ', '');
INSERT INTO `state` VALUES ('1124', '197', 'Kujawsko-Pomorskie ', '');
INSERT INTO `state` VALUES ('1125', '197', 'Lodzkie ', '');
INSERT INTO `state` VALUES ('1126', '197', 'Lubelskie ', '');
INSERT INTO `state` VALUES ('1127', '197', 'Lubuskie ', '');
INSERT INTO `state` VALUES ('1128', '197', 'Malopolskie ', '');
INSERT INTO `state` VALUES ('1129', '197', 'Mazowieckie ', '');
INSERT INTO `state` VALUES ('1130', '197', 'Podkarpackie ', '');
INSERT INTO `state` VALUES ('1131', '197', 'Podlaskie ', '');
INSERT INTO `state` VALUES ('1132', '197', 'Pomorskie ', '');
INSERT INTO `state` VALUES ('1133', '197', 'Slaskie ', '');
INSERT INTO `state` VALUES ('1134', '197', 'Swietokrzyskie ', '');
INSERT INTO `state` VALUES ('1135', '197', 'Warminsko-Mazurskie', '');
INSERT INTO `state` VALUES ('1136', '197', 'Wielkopolskie ', '');
INSERT INTO `state` VALUES ('1137', '197', 'Zachodniopomorskie ', '');
INSERT INTO `state` VALUES ('1138', '198', 'Aveiro ', '');
INSERT INTO `state` VALUES ('1139', '198', 'Azores', '');
INSERT INTO `state` VALUES ('1140', '198', 'Braganca ', '');
INSERT INTO `state` VALUES ('1141', '198', 'Coimbra ', '');
INSERT INTO `state` VALUES ('1142', '198', 'evora ', '');
INSERT INTO `state` VALUES ('1143', '198', 'Faro ', '');
INSERT INTO `state` VALUES ('1144', '198', 'Guarda ', '');
INSERT INTO `state` VALUES ('1145', '198', 'Leiria ', '');
INSERT INTO `state` VALUES ('1146', '198', 'Lisboa ', '');
INSERT INTO `state` VALUES ('1147', '198', 'Madeira ', '');
INSERT INTO `state` VALUES ('1148', '198', 'Portalegre ', '');
INSERT INTO `state` VALUES ('1149', '198', 'Porto ', '');
INSERT INTO `state` VALUES ('1150', '198', 'Santarem ', '');
INSERT INTO `state` VALUES ('1151', '198', 'Setubal ', '');
INSERT INTO `state` VALUES ('1152', '198', 'Viana do Castelo', '');
INSERT INTO `state` VALUES ('1153', '198', 'Viseu ', '');
INSERT INTO `state` VALUES ('1154', '199', 'Adjuntas ', '');
INSERT INTO `state` VALUES ('1155', '199', 'Aguada ', '');
INSERT INTO `state` VALUES ('1156', '199', 'Aguadilla ', '');
INSERT INTO `state` VALUES ('1157', '199', 'Aguas Buenas', '');
INSERT INTO `state` VALUES ('1158', '199', 'Aibonito ', '');
INSERT INTO `state` VALUES ('1159', '199', 'Anasco ', '');
INSERT INTO `state` VALUES ('1160', '199', 'Arecibo ', '');
INSERT INTO `state` VALUES ('1161', '199', 'Arroyo ', '');
INSERT INTO `state` VALUES ('1162', '199', 'Barceloneta ', '');
INSERT INTO `state` VALUES ('1163', '199', 'Barranquitas ', '');
INSERT INTO `state` VALUES ('1164', '199', 'Bayamon ', '');
INSERT INTO `state` VALUES ('1165', '199', 'Cabo Rojo', '');
INSERT INTO `state` VALUES ('1166', '199', 'Caguas ', '');
INSERT INTO `state` VALUES ('1167', '199', 'Camuy ', '');
INSERT INTO `state` VALUES ('1168', '199', 'Canovanas ', '');
INSERT INTO `state` VALUES ('1169', '199', 'Carolina ', '');
INSERT INTO `state` VALUES ('1170', '199', 'Catano ', '');
INSERT INTO `state` VALUES ('1171', '199', 'Cayey ', '');
INSERT INTO `state` VALUES ('1172', '199', 'Ceiba ', '');
INSERT INTO `state` VALUES ('1173', '199', 'Ciales ', '');
INSERT INTO `state` VALUES ('1174', '199', 'Cidra ', '');
INSERT INTO `state` VALUES ('1175', '199', 'Coamo ', '');
INSERT INTO `state` VALUES ('1176', '199', 'Comerio ', '');
INSERT INTO `state` VALUES ('1177', '199', 'Corozal ', '');
INSERT INTO `state` VALUES ('1178', '199', 'Culebra ', '');
INSERT INTO `state` VALUES ('1179', '199', 'Dorado ', '');
INSERT INTO `state` VALUES ('1180', '199', 'Fajardo ', '');
INSERT INTO `state` VALUES ('1181', '199', 'Florida ', '');
INSERT INTO `state` VALUES ('1182', '199', 'Guanica ', '');
INSERT INTO `state` VALUES ('1183', '199', 'Guayama ', '');
INSERT INTO `state` VALUES ('1184', '199', 'Guayanilla ', '');
INSERT INTO `state` VALUES ('1185', '199', 'Guaynabo ', '');
INSERT INTO `state` VALUES ('1186', '199', 'Gurabo ', '');
INSERT INTO `state` VALUES ('1187', '199', 'Hatillo ', '');
INSERT INTO `state` VALUES ('1188', '199', 'Hormigueros ', '');
INSERT INTO `state` VALUES ('1189', '199', 'Humacao ', '');
INSERT INTO `state` VALUES ('1190', '199', 'Isabela ', '');
INSERT INTO `state` VALUES ('1191', '199', 'Jayuya ', '');
INSERT INTO `state` VALUES ('1192', '199', 'Juana Diaz', '');
INSERT INTO `state` VALUES ('1193', '199', 'Juncos ', '');
INSERT INTO `state` VALUES ('1194', '199', 'Lajas ', '');
INSERT INTO `state` VALUES ('1195', '199', 'Lares ', '');
INSERT INTO `state` VALUES ('1196', '199', 'Las Marias', '');
INSERT INTO `state` VALUES ('1197', '199', 'Las Piedras', '');
INSERT INTO `state` VALUES ('1198', '199', 'Loiza ', '');
INSERT INTO `state` VALUES ('1199', '199', 'Luquillo ', '');
INSERT INTO `state` VALUES ('1200', '199', 'Manati ', '');
INSERT INTO `state` VALUES ('1201', '199', 'Maricao ', '');
INSERT INTO `state` VALUES ('1202', '199', 'Maunabo ', '');
INSERT INTO `state` VALUES ('1203', '199', 'Mayaguez ', '');
INSERT INTO `state` VALUES ('1204', '199', 'Moca ', '');
INSERT INTO `state` VALUES ('1205', '199', 'Morovis ', '');
INSERT INTO `state` VALUES ('1206', '199', 'Naguabo ', '');
INSERT INTO `state` VALUES ('1207', '199', 'Naranjito ', '');
INSERT INTO `state` VALUES ('1208', '199', 'Orocovis ', '');
INSERT INTO `state` VALUES ('1209', '199', 'Patillas ', '');
INSERT INTO `state` VALUES ('1210', '199', 'Penuelas ', '');
INSERT INTO `state` VALUES ('1211', '199', 'Ponce ', '');
INSERT INTO `state` VALUES ('1212', '199', 'Quebradillas ', '');
INSERT INTO `state` VALUES ('1213', '199', 'Rincon ', '');
INSERT INTO `state` VALUES ('1214', '199', 'Rio Grande', '');
INSERT INTO `state` VALUES ('1215', '199', 'Sabana Grande', '');
INSERT INTO `state` VALUES ('1216', '199', 'Salinas ', '');
INSERT INTO `state` VALUES ('1217', '199', 'San German', '');
INSERT INTO `state` VALUES ('1218', '199', 'San Juan', '');
INSERT INTO `state` VALUES ('1219', '199', 'San Lorenzo', '');
INSERT INTO `state` VALUES ('1220', '199', 'San Sebastian', '');
INSERT INTO `state` VALUES ('1221', '199', 'Santa Isabel', '');
INSERT INTO `state` VALUES ('1222', '199', 'Toa Alta', '');
INSERT INTO `state` VALUES ('1223', '199', 'Toa Baja', '');
INSERT INTO `state` VALUES ('1224', '199', 'Trujillo Alto', '');
INSERT INTO `state` VALUES ('1225', '199', 'Utuado ', '');
INSERT INTO `state` VALUES ('1226', '199', 'Vega Alta', '');
INSERT INTO `state` VALUES ('1227', '199', 'Vega Baja', '');
INSERT INTO `state` VALUES ('1228', '199', 'Vieques ', '');
INSERT INTO `state` VALUES ('1229', '199', 'Villalba ', '');
INSERT INTO `state` VALUES ('1230', '199', 'Yabucoa ', '');
INSERT INTO `state` VALUES ('1231', '199', 'Yauco ', '');
INSERT INTO `state` VALUES ('1232', '200', 'Ad Dawhah', '');
INSERT INTO `state` VALUES ('1233', '200', 'Ar Rayyan', '');
INSERT INTO `state` VALUES ('1234', '201', 'Reunion ', '');
INSERT INTO `state` VALUES ('1235', '202', 'Arad ', '');
INSERT INTO `state` VALUES ('1236', '202', 'Arges ', '');
INSERT INTO `state` VALUES ('1237', '202', 'Bacau ', '');
INSERT INTO `state` VALUES ('1238', '202', 'Bihor ', '');
INSERT INTO `state` VALUES ('1239', '202', 'Brasov ', '');
INSERT INTO `state` VALUES ('1240', '202', 'Bucuresti ', '');
INSERT INTO `state` VALUES ('1241', '202', 'Buzau ', '');
INSERT INTO `state` VALUES ('1242', '202', 'Caras-Severin', '');
INSERT INTO `state` VALUES ('1243', '202', 'Cluj ', '');
INSERT INTO `state` VALUES ('1244', '202', 'Constanta ', '');
INSERT INTO `state` VALUES ('1245', '202', 'Dolj ', '');
INSERT INTO `state` VALUES ('1246', '202', 'Galati ', '');
INSERT INTO `state` VALUES ('1247', '202', 'Harghita ', '');
INSERT INTO `state` VALUES ('1248', '202', 'Hunedoara ', '');
INSERT INTO `state` VALUES ('1249', '202', 'Iasi ', '');
INSERT INTO `state` VALUES ('1250', '202', 'Maramures ', '');
INSERT INTO `state` VALUES ('1251', '202', 'Mures ', '');
INSERT INTO `state` VALUES ('1252', '202', 'Prahova ', '');
INSERT INTO `state` VALUES ('1253', '202', 'Satu Mare', '');
INSERT INTO `state` VALUES ('1254', '202', 'Sibiu ', '');
INSERT INTO `state` VALUES ('1255', '202', 'Timis ', '');
INSERT INTO `state` VALUES ('1256', '202', 'Tulcea ', '');
INSERT INTO `state` VALUES ('1257', '202', 'Vaslui ', '');
INSERT INTO `state` VALUES ('1259', '204', 'Kigali Ngali', '');
INSERT INTO `state` VALUES ('1261', '206', 'Saint George Basseterre', '');
INSERT INTO `state` VALUES ('1262', '207', 'Castries ', '');
INSERT INTO `state` VALUES ('1264', '209', 'Saint George', '');
INSERT INTO `state` VALUES ('1265', '210', 'Samoa ', '');
INSERT INTO `state` VALUES ('1266', '211', 'San Marino', '');
INSERT INTO `state` VALUES ('1267', '212', 'Sao Tome', '');
INSERT INTO `state` VALUES ('1268', '213', 'Al Jawf', '');
INSERT INTO `state` VALUES ('1269', '213', 'Al Qasim', '');
INSERT INTO `state` VALUES ('1270', '213', 'Ar Riyad', '');
INSERT INTO `state` VALUES ('1271', '213', 'Ash Sharqiyah (Eastern Province)', '');
INSERT INTO `state` VALUES ('1272', '213', 'Makkah ', '');
INSERT INTO `state` VALUES ('1273', '214', 'Kaolack ', '');
INSERT INTO `state` VALUES ('1274', '214', 'Louga ', '');
INSERT INTO `state` VALUES ('1275', '214', 'Ziguinchor ', '');
INSERT INTO `state` VALUES ('1278', '217', 'Seychelles ', '');
INSERT INTO `state` VALUES ('1279', '218', 'Southern ', '');
INSERT INTO `state` VALUES ('1280', '218', 'Western ', '');
INSERT INTO `state` VALUES ('1281', '219', 'Singapore ', '');
INSERT INTO `state` VALUES ('1283', '221', 'Dolenjska (Jugovzhodna Slovenija)', '');
INSERT INTO `state` VALUES ('1284', '221', 'Gorenjska ', '');
INSERT INTO `state` VALUES ('1285', '221', 'Notranjsko-kraka', '');
INSERT INTO `state` VALUES ('1286', '221', 'Obalno-kraka', '');
INSERT INTO `state` VALUES ('1287', '221', 'Osrednjeslovenska ', '');
INSERT INTO `state` VALUES ('1288', '221', 'Podravska ', '');
INSERT INTO `state` VALUES ('1289', '221', 'Pomurska ', '');
INSERT INTO `state` VALUES ('1290', '221', 'Savinjska ', '');
INSERT INTO `state` VALUES ('1291', '221', 'Zasavska ', '');
INSERT INTO `state` VALUES ('1292', '222', 'Guadalcanal ', '');
INSERT INTO `state` VALUES ('1293', '223', 'Banaadir ', '');
INSERT INTO `state` VALUES ('1294', '223', 'Gedo ', '');
INSERT INTO `state` VALUES ('1295', '224', 'Eastern Cape', '');
INSERT INTO `state` VALUES ('1296', '224', 'Free State', '');
INSERT INTO `state` VALUES ('1297', '224', 'Gauteng ', '');
INSERT INTO `state` VALUES ('1298', '224', 'KwaZulu-Natal', '');
INSERT INTO `state` VALUES ('1299', '224', 'Mpumalanga ', '');
INSERT INTO `state` VALUES ('1300', '224', 'North-West', '');
INSERT INTO `state` VALUES ('1301', '224', 'Northern Cape', '');
INSERT INTO `state` VALUES ('1302', '224', 'Western Cape', '');
INSERT INTO `state` VALUES ('1304', '226', 'alava ', '');
INSERT INTO `state` VALUES ('1305', '226', 'Albacete ', '');
INSERT INTO `state` VALUES ('1306', '226', 'Alicante ', '');
INSERT INTO `state` VALUES ('1307', '226', 'Almeria ', '');
INSERT INTO `state` VALUES ('1308', '226', 'Asturias ', '');
INSERT INTO `state` VALUES ('1309', '226', 'avila ', '');
INSERT INTO `state` VALUES ('1310', '226', 'Badajoz ', '');
INSERT INTO `state` VALUES ('1311', '226', 'Baleares ', '');
INSERT INTO `state` VALUES ('1312', '226', 'Barcelona ', '');
INSERT INTO `state` VALUES ('1313', '226', 'Burgos ', '');
INSERT INTO `state` VALUES ('1314', '226', 'Caceres ', '');
INSERT INTO `state` VALUES ('1315', '226', 'Cadiz ', '');
INSERT INTO `state` VALUES ('1316', '226', 'Cantabria ', '');
INSERT INTO `state` VALUES ('1317', '226', 'Castellon ', '');
INSERT INTO `state` VALUES ('1318', '226', 'Ceuta ', '');
INSERT INTO `state` VALUES ('1319', '226', 'Ciudad Real', '');
INSERT INTO `state` VALUES ('1320', '226', 'Cordoba ', '');
INSERT INTO `state` VALUES ('1321', '226', 'Cuenca ', '');
INSERT INTO `state` VALUES ('1322', '226', 'Gerona ', '');
INSERT INTO `state` VALUES ('1323', '226', 'Granada ', '');
INSERT INTO `state` VALUES ('1324', '226', 'Guadalajara ', '');
INSERT INTO `state` VALUES ('1325', '226', 'Guipuzcoa ', '');
INSERT INTO `state` VALUES ('1326', '226', 'Huelva ', '');
INSERT INTO `state` VALUES ('1327', '226', 'Huesca ', '');
INSERT INTO `state` VALUES ('1328', '226', 'Jaen ', '');
INSERT INTO `state` VALUES ('1329', '226', 'La Coruna', '');
INSERT INTO `state` VALUES ('1330', '226', 'La Rioja ', '');
INSERT INTO `state` VALUES ('1331', '226', 'Las Palmas', '');
INSERT INTO `state` VALUES ('1332', '226', 'Leon ', '');
INSERT INTO `state` VALUES ('1333', '226', 'Lerida ', '');
INSERT INTO `state` VALUES ('1334', '226', 'Lugo ', '');
INSERT INTO `state` VALUES ('1335', '226', 'Madrid ', '');
INSERT INTO `state` VALUES ('1336', '226', 'Malaga ', '');
INSERT INTO `state` VALUES ('1337', '226', 'Melilla ', '');
INSERT INTO `state` VALUES ('1338', '226', 'Murcia ', '');
INSERT INTO `state` VALUES ('1339', '226', 'Navarra ', '');
INSERT INTO `state` VALUES ('1340', '226', 'Ourense ', '');
INSERT INTO `state` VALUES ('1341', '226', 'Palencia ', '');
INSERT INTO `state` VALUES ('1342', '226', 'Pontevedra ', '');
INSERT INTO `state` VALUES ('1343', '226', 'Salamanca ', '');
INSERT INTO `state` VALUES ('1344', '226', 'Santa Cruz de Tenerife ', '');
INSERT INTO `state` VALUES ('1345', '226', 'Segovia ', '');
INSERT INTO `state` VALUES ('1346', '226', 'Sevilla ', '');
INSERT INTO `state` VALUES ('1347', '226', 'Soria ', '');
INSERT INTO `state` VALUES ('1348', '226', 'Tarragona ', '');
INSERT INTO `state` VALUES ('1349', '226', 'Teruel ', '');
INSERT INTO `state` VALUES ('1350', '226', 'Toledo ', '');
INSERT INTO `state` VALUES ('1351', '226', 'Valencia ', '');
INSERT INTO `state` VALUES ('1352', '226', 'Valladolid ', '');
INSERT INTO `state` VALUES ('1353', '226', 'Vizcaya ', '');
INSERT INTO `state` VALUES ('1354', '226', 'Zamora ', '');
INSERT INTO `state` VALUES ('1355', '226', 'Zaragoza ', '');
INSERT INTO `state` VALUES ('1357', '228', 'Sri Lanka', '');
INSERT INTO `state` VALUES ('1358', '229', 'Al Khartum', '');
INSERT INTO `state` VALUES ('1359', '230', 'Paramaribo ', '');
INSERT INTO `state` VALUES ('1361', '231', 'Paramaribo ', '');
INSERT INTO `state` VALUES ('1362', '232', 'Hhohho ', '');
INSERT INTO `state` VALUES ('1363', '233', 'Blekinge ln', '');
INSERT INTO `state` VALUES ('1364', '233', 'Dalarnas ln', '');
INSERT INTO `state` VALUES ('1365', '233', 'Gvleborgs ln', '');
INSERT INTO `state` VALUES ('1366', '233', 'Gotlands ln', '');
INSERT INTO `state` VALUES ('1367', '233', 'Halland ln', '');
INSERT INTO `state` VALUES ('1368', '233', 'Jmtlands ln', '');
INSERT INTO `state` VALUES ('1369', '233', 'Jonkopings ln', '');
INSERT INTO `state` VALUES ('1370', '233', 'Kalmar ln', '');
INSERT INTO `state` VALUES ('1371', '233', 'Kronobergs ln', '');
INSERT INTO `state` VALUES ('1372', '233', 'Norrbottens ln', '');
INSERT INTO `state` VALUES ('1373', '233', 'orebro ln', '');
INSERT INTO `state` VALUES ('1374', '233', 'ostergotlands ln', '');
INSERT INTO `state` VALUES ('1375', '233', 'Skne ln', '');
INSERT INTO `state` VALUES ('1376', '233', 'Sodermanlands ln', '');
INSERT INTO `state` VALUES ('1377', '233', 'Stockholms ln', '');
INSERT INTO `state` VALUES ('1378', '233', 'Uppsala ln', '');
INSERT INTO `state` VALUES ('1379', '233', 'Vrmlands ln', '');
INSERT INTO `state` VALUES ('1380', '233', 'Vsterbottens ln', '');
INSERT INTO `state` VALUES ('1381', '233', 'Vsternorrlands ln', '');
INSERT INTO `state` VALUES ('1382', '233', 'Vstmanlands ln', '');
INSERT INTO `state` VALUES ('1383', '233', 'Vstra Gotalands ln', '');
INSERT INTO `state` VALUES ('1384', '234', 'Aargau - Argovie', '');
INSERT INTO `state` VALUES ('1385', '234', 'Appenzell Ausserrhoden  Appenzell Rh.(Ext.)', '');
INSERT INTO `state` VALUES ('1386', '234', 'Appenzell Innerrhoden Appenzell Rh.(Int.)', '');
INSERT INTO `state` VALUES ('1387', '234', 'Basel-Landschaft - Bale-Campagne', '');
INSERT INTO `state` VALUES ('1388', '234', 'Basel-Stadt - Bale-Ville', '');
INSERT INTO `state` VALUES ('1389', '234', 'Bern - Berne', '');
INSERT INTO `state` VALUES ('1390', '234', 'Freiburg - Fribourg', '');
INSERT INTO `state` VALUES ('1391', '234', 'Genf - Genve', '');
INSERT INTO `state` VALUES ('1392', '234', 'Glarus - Glaris', '');
INSERT INTO `state` VALUES ('1393', '234', 'Graubunden - Grisons', '');
INSERT INTO `state` VALUES ('1394', '234', 'Jura - Jura', '');
INSERT INTO `state` VALUES ('1395', '234', 'Luzern-Lucerne', '');
INSERT INTO `state` VALUES ('1396', '234', 'Neuenburg - Neuchatel', '');
INSERT INTO `state` VALUES ('1397', '234', 'Nidwalden - Nidwald', '');
INSERT INTO `state` VALUES ('1398', '234', 'Obwalden - Obwald', '');
INSERT INTO `state` VALUES ('1399', '234', 'Sankt Gallen - Saint-Gall', '');
INSERT INTO `state` VALUES ('1400', '234', 'Schaffhausen - Schaffhouse', '');
INSERT INTO `state` VALUES ('1401', '234', 'Schwyz - Schwytz', '');
INSERT INTO `state` VALUES ('1402', '234', 'Solothurn - Soleure', '');
INSERT INTO `state` VALUES ('1403', '234', 'Tessin - Tessin', '');
INSERT INTO `state` VALUES ('1404', '234', 'Thurgau - Thurgovie', '');
INSERT INTO `state` VALUES ('1405', '234', 'Uri - Uri', '');
INSERT INTO `state` VALUES ('1406', '234', 'Waadt - Vaud', '');
INSERT INTO `state` VALUES ('1407', '234', 'Wallis - Valais', '');
INSERT INTO `state` VALUES ('1408', '234', 'Zug - Zoug', '');
INSERT INTO `state` VALUES ('1409', '234', 'Zurich - Zurich', '');
INSERT INTO `state` VALUES ('1412', '237', 'Kuhistoni-Badakhshan', '');
INSERT INTO `state` VALUES ('1413', '237', 'Sughd ', '');
INSERT INTO `state` VALUES ('1415', '239', 'Bangkok ', '');
INSERT INTO `state` VALUES ('1416', '239', 'Chachoengsao ', '');
INSERT INTO `state` VALUES ('1417', '239', 'Chiang Mai', '');
INSERT INTO `state` VALUES ('1418', '239', 'Chonburi ', '');
INSERT INTO `state` VALUES ('1419', '239', 'Nakhon Pathom', '');
INSERT INTO `state` VALUES ('1420', '239', 'Nakhon Ratchasima', '');
INSERT INTO `state` VALUES ('1421', '239', 'Nonthanburi ', '');
INSERT INTO `state` VALUES ('1422', '239', 'Phetchaburi ', '');
INSERT INTO `state` VALUES ('1423', '239', 'Phitsanulok ', '');
INSERT INTO `state` VALUES ('1424', '239', 'Phuket ', '');
INSERT INTO `state` VALUES ('1425', '239', 'Rayong ', '');
INSERT INTO `state` VALUES ('1426', '239', 'Samut Prakan', '');
INSERT INTO `state` VALUES ('1427', '239', 'Suratthani ', '');
INSERT INTO `state` VALUES ('1428', '239', 'Trat ', '');
INSERT INTO `state` VALUES ('1429', '239', 'Udon Thani', '');
INSERT INTO `state` VALUES ('1430', '240', 'Maritime ', '');
INSERT INTO `state` VALUES ('1431', '241', 'Tokelau ', '');
INSERT INTO `state` VALUES ('1432', '242', 'Tonga ', '');
INSERT INTO `state` VALUES ('1433', '243', 'Arima ', '');
INSERT INTO `state` VALUES ('1434', '243', 'Caroni ', '');
INSERT INTO `state` VALUES ('1435', '243', 'Mayaro ', '');
INSERT INTO `state` VALUES ('1436', '243', 'Nariva ', '');
INSERT INTO `state` VALUES ('1437', '243', 'Port-of-Spain', '');
INSERT INTO `state` VALUES ('1438', '243', 'Saint Andrew', '');
INSERT INTO `state` VALUES ('1439', '243', 'Saint David', '');
INSERT INTO `state` VALUES ('1440', '243', 'Saint George', '');
INSERT INTO `state` VALUES ('1441', '243', 'Saint Patrick', '');
INSERT INTO `state` VALUES ('1442', '243', 'San Fernando', '');
INSERT INTO `state` VALUES ('1443', '243', 'Tobago ', '');
INSERT INTO `state` VALUES ('1444', '243', 'Victoria ', '');
INSERT INTO `state` VALUES ('1446', '245', 'Gafsa (Qafsah)', '');
INSERT INTO `state` VALUES ('1447', '245', 'Medenine (Madanin)', '');
INSERT INTO `state` VALUES ('1448', '245', 'Monastir (Al Munastir)', '');
INSERT INTO `state` VALUES ('1449', '245', 'Sousse (Susah)', '');
INSERT INTO `state` VALUES ('1450', '245', 'Tunis ', '');
INSERT INTO `state` VALUES ('1451', '246', 'Adana ', '');
INSERT INTO `state` VALUES ('1452', '246', 'Ankara ', '');
INSERT INTO `state` VALUES ('1453', '246', 'Antalya ', '');
INSERT INTO `state` VALUES ('1454', '246', 'Aydin ', '');
INSERT INTO `state` VALUES ('1455', '246', 'Balikesir ', '');
INSERT INTO `state` VALUES ('1456', '246', 'Bursa ', '');
INSERT INTO `state` VALUES ('1457', '246', 'Diyarbakir ', '');
INSERT INTO `state` VALUES ('1458', '246', 'Eskisehir ', '');
INSERT INTO `state` VALUES ('1459', '246', 'Gaziantep ', '');
INSERT INTO `state` VALUES ('1460', '246', 'Icel ', '');
INSERT INTO `state` VALUES ('1461', '246', 'Isparta ', '');
INSERT INTO `state` VALUES ('1462', '246', 'Istanbul ', '');
INSERT INTO `state` VALUES ('1463', '246', 'Izmir ', '');
INSERT INTO `state` VALUES ('1464', '246', 'Kocaeli ', '');
INSERT INTO `state` VALUES ('1465', '246', 'Manisa ', '');
INSERT INTO `state` VALUES ('1466', '246', 'Mugla ', '');
INSERT INTO `state` VALUES ('1467', '246', 'Nigde ', '');
INSERT INTO `state` VALUES ('1468', '246', 'Samsun ', '');
INSERT INTO `state` VALUES ('1469', '246', 'Tokat ', '');
INSERT INTO `state` VALUES ('1470', '247', 'Ahal (Ashgabat)', '');
INSERT INTO `state` VALUES ('1471', '248', 'Turks And Caicos Islands', '');
INSERT INTO `state` VALUES ('1472', '249', 'Tuvalu ', '');
INSERT INTO `state` VALUES ('1473', '250', 'Central ', '');
INSERT INTO `state` VALUES ('1474', '250', 'Eastern ', '');
INSERT INTO `state` VALUES ('1475', '251', 'Avtonomna Respublika Krym', '');
INSERT INTO `state` VALUES ('1476', '251', 'Cherkasy ', '');
INSERT INTO `state` VALUES ('1477', '251', 'Dnipropetrovsk ', '');
INSERT INTO `state` VALUES ('1478', '251', 'Donetsk ', '');
INSERT INTO `state` VALUES ('1479', '251', 'Kharkiv ', '');
INSERT INTO `state` VALUES ('1480', '251', 'Kyyiv ', '');
INSERT INTO `state` VALUES ('1481', '251', 'Luhansk ', '');
INSERT INTO `state` VALUES ('1482', '251', 'Mykolayiv ', '');
INSERT INTO `state` VALUES ('1483', '251', 'Odesa ', '');
INSERT INTO `state` VALUES ('1484', '251', 'Poltava ', '');
INSERT INTO `state` VALUES ('1485', '251', 'Rivne ', '');
INSERT INTO `state` VALUES ('1486', '251', 'Vinnytsya ', '');
INSERT INTO `state` VALUES ('1487', '252', 'Abu Dhabi', '');
INSERT INTO `state` VALUES ('1488', '252', 'Ajman ', '');
INSERT INTO `state` VALUES ('1489', '252', 'Ash Shariqah', '');
INSERT INTO `state` VALUES ('1490', '252', 'Dubai ', '');
INSERT INTO `state` VALUES ('1491', '252', 'Fujairah ', '');
INSERT INTO `state` VALUES ('1492', '252', 'Ras al-Khaymah', '');
INSERT INTO `state` VALUES ('1493', '253', 'Aberdeen ', '');
INSERT INTO `state` VALUES ('1494', '253', 'Aberdeenshire ', '');
INSERT INTO `state` VALUES ('1495', '253', 'Anglesey ', '');
INSERT INTO `state` VALUES ('1496', '253', 'Angus ', '');
INSERT INTO `state` VALUES ('1497', '253', 'Argyllshire ', '');
INSERT INTO `state` VALUES ('1498', '253', 'Ayrshire ', '');
INSERT INTO `state` VALUES ('1499', '253', 'Banffshire ', '');
INSERT INTO `state` VALUES ('1500', '253', 'Bedfordshire ', '');
INSERT INTO `state` VALUES ('1501', '253', 'Berkshire ', '');
INSERT INTO `state` VALUES ('1502', '253', 'Berwickshire ', '');
INSERT INTO `state` VALUES ('1503', '253', 'Brecknockshire ', '');
INSERT INTO `state` VALUES ('1504', '253', 'Buckinghamshire ', '');
INSERT INTO `state` VALUES ('1505', '253', 'Buteshire ', '');
INSERT INTO `state` VALUES ('1506', '253', 'Caernarfonshire ', '');
INSERT INTO `state` VALUES ('1507', '253', 'Caithness ', '');
INSERT INTO `state` VALUES ('1508', '253', 'Cambridgeshire ', '');
INSERT INTO `state` VALUES ('1509', '253', 'Carmarthenshire ', '');
INSERT INTO `state` VALUES ('1510', '253', 'Ceredigion ', '');
INSERT INTO `state` VALUES ('1511', '253', 'Cheshire ', '');
INSERT INTO `state` VALUES ('1512', '253', 'City of London', '');
INSERT INTO `state` VALUES ('1513', '253', 'Clackmannanshire ', '');
INSERT INTO `state` VALUES ('1514', '253', 'Clwyd ', '');
INSERT INTO `state` VALUES ('1515', '253', 'Cornwall ', '');
INSERT INTO `state` VALUES ('1516', '253', 'County Antrim', '');
INSERT INTO `state` VALUES ('1517', '253', 'County Armagh', '');
INSERT INTO `state` VALUES ('1518', '253', 'County Down', '');
INSERT INTO `state` VALUES ('1519', '253', 'County Durham', '');
INSERT INTO `state` VALUES ('1520', '253', 'County Fermanagh', '');
INSERT INTO `state` VALUES ('1521', '253', 'County Londonderry', '');
INSERT INTO `state` VALUES ('1522', '253', 'County of Herefordshire', '');
INSERT INTO `state` VALUES ('1523', '253', 'County Tyrone', '');
INSERT INTO `state` VALUES ('1524', '253', 'Cumberland ', '');
INSERT INTO `state` VALUES ('1525', '253', 'Cumbria ', '');
INSERT INTO `state` VALUES ('1526', '253', 'Denbighshire ', '');
INSERT INTO `state` VALUES ('1527', '253', 'Derbyshire ', '');
INSERT INTO `state` VALUES ('1528', '253', 'Devon ', '');
INSERT INTO `state` VALUES ('1529', '253', 'Dorset ', '');
INSERT INTO `state` VALUES ('1530', '253', 'Dumfries and Galloway', '');
INSERT INTO `state` VALUES ('1531', '253', 'Dumfriesshire ', '');
INSERT INTO `state` VALUES ('1532', '253', 'Dunbartonshire ', '');
INSERT INTO `state` VALUES ('1533', '253', 'East Lothian', '');
INSERT INTO `state` VALUES ('1534', '253', 'East Sussex', '');
INSERT INTO `state` VALUES ('1535', '253', 'East Yorkshire', '');
INSERT INTO `state` VALUES ('1536', '253', 'Edinburgh ', '');
INSERT INTO `state` VALUES ('1537', '253', 'Essex ', '');
INSERT INTO `state` VALUES ('1538', '253', 'Fife ', '');
INSERT INTO `state` VALUES ('1539', '253', 'Flintshire ', '');
INSERT INTO `state` VALUES ('1540', '253', 'Glamorgan ', '');
INSERT INTO `state` VALUES ('1541', '253', 'Gloucestershire ', '');
INSERT INTO `state` VALUES ('1542', '253', 'Gwynedd ', '');
INSERT INTO `state` VALUES ('1543', '253', 'Hampshire ', '');
INSERT INTO `state` VALUES ('1544', '253', 'Herefordshire ', '');
INSERT INTO `state` VALUES ('1545', '253', 'Hertfordshire ', '');
INSERT INTO `state` VALUES ('1546', '253', 'Highland ', '');
INSERT INTO `state` VALUES ('1547', '253', 'Inverness-shire', '');
INSERT INTO `state` VALUES ('1548', '253', 'Isle of Wight', '');
INSERT INTO `state` VALUES ('1549', '253', 'Isles of Scilly', '');
INSERT INTO `state` VALUES ('1550', '253', 'Kent ', '');
INSERT INTO `state` VALUES ('1551', '253', 'Kincardineshire ', '');
INSERT INTO `state` VALUES ('1552', '253', 'Kinross-Shire', '');
INSERT INTO `state` VALUES ('1553', '253', 'Kirkcudbrightshire ', '');
INSERT INTO `state` VALUES ('1554', '253', 'Lanarkshire ', '');
INSERT INTO `state` VALUES ('1555', '253', 'Lancashire ', '');
INSERT INTO `state` VALUES ('1556', '253', 'Leicestershire ', '');
INSERT INTO `state` VALUES ('1557', '253', 'Lincolnshire ', '');
INSERT INTO `state` VALUES ('1558', '253', 'London ', '');
INSERT INTO `state` VALUES ('1559', '253', 'Merioneth ', '');
INSERT INTO `state` VALUES ('1560', '253', 'Merseyside ', '');
INSERT INTO `state` VALUES ('1561', '253', 'Middlesex ', '');
INSERT INTO `state` VALUES ('1562', '253', 'Midlothian ', '');
INSERT INTO `state` VALUES ('1563', '253', 'Monmouthshire ', '');
INSERT INTO `state` VALUES ('1564', '253', 'Montgomeryshire ', '');
INSERT INTO `state` VALUES ('1565', '253', 'Morayshire ', '');
INSERT INTO `state` VALUES ('1566', '253', 'Norfolk ', '');
INSERT INTO `state` VALUES ('1567', '253', 'North Yorkshire', '');
INSERT INTO `state` VALUES ('1568', '253', 'Northamptonshire ', '');
INSERT INTO `state` VALUES ('1569', '253', 'Northumberland ', '');
INSERT INTO `state` VALUES ('1570', '253', 'Nottinghamshire ', '');
INSERT INTO `state` VALUES ('1571', '253', 'Orkney ', '');
INSERT INTO `state` VALUES ('1572', '253', 'Outer Hebrides', '');
INSERT INTO `state` VALUES ('1573', '253', 'Oxfordshire ', '');
INSERT INTO `state` VALUES ('1574', '253', 'Peeblesshire ', '');
INSERT INTO `state` VALUES ('1575', '253', 'Pembrokeshire ', '');
INSERT INTO `state` VALUES ('1576', '253', 'Perth and Kinross ', '');
INSERT INTO `state` VALUES ('1577', '253', 'Perthshire ', '');
INSERT INTO `state` VALUES ('1578', '253', 'Powys ', '');
INSERT INTO `state` VALUES ('1579', '253', 'Radnorshire ', '');
INSERT INTO `state` VALUES ('1580', '253', 'Renfrewshire ', '');
INSERT INTO `state` VALUES ('1581', '253', 'Ross-shire', '');
INSERT INTO `state` VALUES ('1582', '253', 'Roxburghshire ', '');
INSERT INTO `state` VALUES ('1583', '253', 'Rutland ', '');
INSERT INTO `state` VALUES ('1584', '253', 'Scottish Borders', '');
INSERT INTO `state` VALUES ('1585', '253', 'Selkirkshire ', '');
INSERT INTO `state` VALUES ('1586', '253', 'Shetland ', '');
INSERT INTO `state` VALUES ('1587', '253', 'Shropshire ', '');
INSERT INTO `state` VALUES ('1588', '253', 'Somerset ', '');
INSERT INTO `state` VALUES ('1589', '253', 'South Ayrshire', '');
INSERT INTO `state` VALUES ('1590', '253', 'South Lanarkshire', '');
INSERT INTO `state` VALUES ('1591', '253', 'South Yorkshire', '');
INSERT INTO `state` VALUES ('1592', '253', 'Staffordshire ', '');
INSERT INTO `state` VALUES ('1593', '253', 'Stirling ', '');
INSERT INTO `state` VALUES ('1594', '253', 'Stirlingshire ', '');
INSERT INTO `state` VALUES ('1595', '253', 'Suffolk ', '');
INSERT INTO `state` VALUES ('1596', '253', 'Surrey ', '');
INSERT INTO `state` VALUES ('1597', '253', 'Sussex ', '');
INSERT INTO `state` VALUES ('1598', '253', 'Sutherland ', '');
INSERT INTO `state` VALUES ('1599', '253', 'Swansea ', '');
INSERT INTO `state` VALUES ('1600', '253', 'Tweeddale ', '');
INSERT INTO `state` VALUES ('1601', '253', 'Warwickshire ', '');
INSERT INTO `state` VALUES ('1602', '253', 'West Lothian', '');
INSERT INTO `state` VALUES ('1603', '253', 'West Midlands', '');
INSERT INTO `state` VALUES ('1604', '253', 'West Yorkshire', '');
INSERT INTO `state` VALUES ('1605', '253', 'Westmorland ', '');
INSERT INTO `state` VALUES ('1606', '253', 'Wigtownshire ', '');
INSERT INTO `state` VALUES ('1607', '253', 'Wiltshire ', '');
INSERT INTO `state` VALUES ('1608', '253', 'Worcestershire ', '');
INSERT INTO `state` VALUES ('1609', '254', 'Alabama', 'AL');
INSERT INTO `state` VALUES ('1611', '256', 'Artigas ', '');
INSERT INTO `state` VALUES ('1612', '256', 'Canelones ', '');
INSERT INTO `state` VALUES ('1613', '256', 'Cerro Largo', '');
INSERT INTO `state` VALUES ('1614', '256', 'Colonia ', '');
INSERT INTO `state` VALUES ('1615', '256', 'Durazno ', '');
INSERT INTO `state` VALUES ('1616', '256', 'Flores ', '');
INSERT INTO `state` VALUES ('1617', '256', 'Florida ', '');
INSERT INTO `state` VALUES ('1618', '256', 'Lavalleja ', '');
INSERT INTO `state` VALUES ('1619', '256', 'Maldonado ', '');
INSERT INTO `state` VALUES ('1620', '256', 'Montevideo ', '');
INSERT INTO `state` VALUES ('1621', '256', 'Paysandu ', '');
INSERT INTO `state` VALUES ('1622', '256', 'Rio Negro ', '');
INSERT INTO `state` VALUES ('1623', '256', 'Rivera ', '');
INSERT INTO `state` VALUES ('1624', '256', 'Rocha ', '');
INSERT INTO `state` VALUES ('1625', '256', 'Salto ', '');
INSERT INTO `state` VALUES ('1626', '256', 'San Jose ', '');
INSERT INTO `state` VALUES ('1627', '256', 'Soriano ', '');
INSERT INTO `state` VALUES ('1628', '256', 'Tacuarembo ', '');
INSERT INTO `state` VALUES ('1629', '256', 'Treinta y Tres', '');
INSERT INTO `state` VALUES ('1630', '257', 'Bukhara ', '');
INSERT INTO `state` VALUES ('1631', '257', 'Khorezm ', '');
INSERT INTO `state` VALUES ('1632', '257', 'Samarkand ', '');
INSERT INTO `state` VALUES ('1633', '257', 'Tashkent ', '');
INSERT INTO `state` VALUES ('1634', '258', 'Vanuatu ', '');
INSERT INTO `state` VALUES ('1635', '259', 'Amazonas ', '');
INSERT INTO `state` VALUES ('1636', '259', 'Anzoategui ', '');
INSERT INTO `state` VALUES ('1637', '259', 'Apure ', '');
INSERT INTO `state` VALUES ('1638', '259', 'Aragua ', '');
INSERT INTO `state` VALUES ('1639', '259', 'Barinas ', '');
INSERT INTO `state` VALUES ('1640', '259', 'Bolivar ', '');
INSERT INTO `state` VALUES ('1641', '259', 'Carabobo ', '');
INSERT INTO `state` VALUES ('1642', '259', 'Cojedes ', '');
INSERT INTO `state` VALUES ('1643', '259', 'Delta Amacuro', '');
INSERT INTO `state` VALUES ('1644', '259', 'Dependencias Federales', '');
INSERT INTO `state` VALUES ('1645', '259', 'Distrito Federal', '');
INSERT INTO `state` VALUES ('1646', '259', 'Falcon ', '');
INSERT INTO `state` VALUES ('1647', '259', 'Guarico ', '');
INSERT INTO `state` VALUES ('1648', '259', 'Lara ', '');
INSERT INTO `state` VALUES ('1649', '259', 'Merida ', '');
INSERT INTO `state` VALUES ('1650', '259', 'Monagas ', '');
INSERT INTO `state` VALUES ('1651', '259', 'Nueva Esparta', '');
INSERT INTO `state` VALUES ('1652', '259', 'Portuguesa ', '');
INSERT INTO `state` VALUES ('1653', '259', 'Sucre ', '');
INSERT INTO `state` VALUES ('1654', '259', 'Tachira ', '');
INSERT INTO `state` VALUES ('1655', '259', 'Trujillo ', '');
INSERT INTO `state` VALUES ('1656', '259', 'Vargas ', '');
INSERT INTO `state` VALUES ('1657', '259', 'Yaracuy ', '');
INSERT INTO `state` VALUES ('1658', '259', 'Zulia ', '');
INSERT INTO `state` VALUES ('1659', '260', 'Dong Bang Song Hong', '');
INSERT INTO `state` VALUES ('1660', '260', 'Dong Nam Bo', '');
INSERT INTO `state` VALUES ('1661', '260', 'Khu Bon Cu', '');
INSERT INTO `state` VALUES ('1664', '263', 'Saint Croix', '');
INSERT INTO `state` VALUES ('1668', '267', 'Western Sahara', '');
INSERT INTO `state` VALUES ('1671', '270', 'Hadramawt ', '');
INSERT INTO `state` VALUES ('1672', '270', 'Ibb ', '');
INSERT INTO `state` VALUES ('1675', '273', 'Copperbelt ', '');
INSERT INTO `state` VALUES ('1676', '273', 'Lusaka ', '');
INSERT INTO `state` VALUES ('1677', '274', 'Harare ', '');
INSERT INTO `state` VALUES ('1678', '274', 'Manicaland ', '');
INSERT INTO `state` VALUES ('1679', '274', 'Mashonaland Central', '');
INSERT INTO `state` VALUES ('1680', '274', 'Matabeleland North', '');
INSERT INTO `state` VALUES ('1681', '274', 'Midlands ', '');
INSERT INTO `state` VALUES ('1682', '254', 'Alaska', 'AK');
INSERT INTO `state` VALUES ('1683', '254', 'Arizona', 'AZ');
INSERT INTO `state` VALUES ('1684', '254', 'Arkansas', 'AR');
INSERT INTO `state` VALUES ('1685', '254', 'California', 'CA');
INSERT INTO `state` VALUES ('1686', '254', 'Colorado', 'CO');
INSERT INTO `state` VALUES ('1687', '254', 'Connecticut', 'CT');
INSERT INTO `state` VALUES ('1688', '254', 'Delaware', 'DE');
INSERT INTO `state` VALUES ('1689', '254', 'Florida', 'FL');
INSERT INTO `state` VALUES ('1690', '254', 'Georgia', 'GA');
INSERT INTO `state` VALUES ('1691', '254', 'Hawali', 'HI');
INSERT INTO `state` VALUES ('1692', '254', 'Idaho', 'ID');
INSERT INTO `state` VALUES ('1693', '254', 'Illinois', 'IL');
INSERT INTO `state` VALUES ('1694', '254', 'Indiana', 'IN');
INSERT INTO `state` VALUES ('1695', '254', 'Iowa', 'IA');
INSERT INTO `state` VALUES ('1696', '254', 'Kansas', 'KS');
INSERT INTO `state` VALUES ('1697', '254', 'Kentucky', 'KY');
INSERT INTO `state` VALUES ('1698', '254', 'louisiana', 'LA');
INSERT INTO `state` VALUES ('1699', '254', 'Maine', 'ME');
INSERT INTO `state` VALUES ('1700', '254', 'Maryland', 'MD');
INSERT INTO `state` VALUES ('1701', '254', 'Michigan', 'MI');
INSERT INTO `state` VALUES ('1702', '254', 'Miinnesota', 'MN');
INSERT INTO `state` VALUES ('1703', '254', 'Mississippi', 'MS');
INSERT INTO `state` VALUES ('1704', '254', 'Montana', 'MT');
INSERT INTO `state` VALUES ('1705', '254', 'Nebraska', 'NE');
INSERT INTO `state` VALUES ('1706', '254', 'Nevada', 'NV');
INSERT INTO `state` VALUES ('1707', '254', 'New Hamsphire', 'NH');
INSERT INTO `state` VALUES ('1708', '254', 'New Jersey', 'NJ');
INSERT INTO `state` VALUES ('1709', '254', 'New Mexico', 'NM');
INSERT INTO `state` VALUES ('1710', '254', 'New  York', 'NY');
INSERT INTO `state` VALUES ('1711', '254', 'North Carolina', 'NC');
INSERT INTO `state` VALUES ('1712', '254', 'North Dakota', 'ND');
INSERT INTO `state` VALUES ('1713', '254', 'Ohio', 'OH');
INSERT INTO `state` VALUES ('1714', '254', 'Oklahoma', 'OK');
INSERT INTO `state` VALUES ('1715', '254', 'Oregon', 'OR');
INSERT INTO `state` VALUES ('1716', '254', 'Pennsylvania', 'PA');
INSERT INTO `state` VALUES ('1717', '254', 'Rhode Island', 'RI');
INSERT INTO `state` VALUES ('1718', '254', 'South Carolina', 'SC');
INSERT INTO `state` VALUES ('1719', '254', 'South Dakota', 'SD');
INSERT INTO `state` VALUES ('1720', '254', 'Tennesse', 'TN');
INSERT INTO `state` VALUES ('1721', '254', 'Texas', 'TX');
INSERT INTO `state` VALUES ('1722', '254', 'Utah', 'UT');
INSERT INTO `state` VALUES ('1723', '254', 'Vermont', 'VT');
INSERT INTO `state` VALUES ('1724', '254', 'Virginia', 'VA');
INSERT INTO `state` VALUES ('1725', '254', 'Washington', 'WA');
INSERT INTO `state` VALUES ('1726', '254', 'West Virginia', 'WV');
INSERT INTO `state` VALUES ('1727', '254', 'Wisconsin', 'WI');
INSERT INTO `state` VALUES ('1728', '254', 'Massachusetts', 'MA');
INSERT INTO `state` VALUES ('1729', '254', 'Wyoming', 'WY');
INSERT INTO `state` VALUES ('1730', '39', 'Mon', '');
INSERT INTO `state` VALUES ('1731', '39', 'Yangon', '');
INSERT INTO `state` VALUES ('1732', '39', 'Ayeyarwaddy', '');
INSERT INTO `state` VALUES ('1733', '39', 'Kayin', '');
INSERT INTO `state` VALUES ('1734', '39', 'Bago', '');
INSERT INTO `state` VALUES ('1735', '39', 'Rakhine', '');
INSERT INTO `state` VALUES ('1736', '39', 'Magwe', '');
INSERT INTO `state` VALUES ('1737', '39', 'Mandalay', '');
INSERT INTO `state` VALUES ('1738', '39', 'Kayah', '');
INSERT INTO `state` VALUES ('1739', '39', 'Shan', '');
INSERT INTO `state` VALUES ('1740', '39', 'Sagaing', '');
INSERT INTO `state` VALUES ('1741', '39', 'Chin', '');
INSERT INTO `state` VALUES ('1742', '39', 'Kachin', '');
INSERT INTO `state` VALUES ('1743', '263', 'Saint John', '');
INSERT INTO `state` VALUES ('1744', '263', 'Saint Thomas', '');
INSERT INTO `state` VALUES ('1745', '254', 'Missouri', 'MO');

-- ----------------------------
-- Table structure for `transaction_order_details`
-- ----------------------------
DROP TABLE IF EXISTS `transaction_order_details`;
CREATE TABLE `transaction_order_details` (
  `orderid` bigint(255) NOT NULL AUTO_INCREMENT,
  `billing_fname` varchar(255) DEFAULT NULL,
  `billing_lname` varchar(255) DEFAULT NULL,
  `billing_add` text,
  `billing_phone` varchar(255) DEFAULT NULL,
  `billing_country` varchar(255) DEFAULT NULL,
  `billing_email` varchar(255) DEFAULT NULL,
  `billing_state` varchar(255) DEFAULT NULL,
  `billing_city` varchar(255) DEFAULT NULL,
  `billing_zip` varchar(255) DEFAULT NULL,
  `shipping_fname` varchar(255) DEFAULT NULL,
  `shipping_lname` varchar(255) DEFAULT NULL,
  `shipping_phone` varchar(255) DEFAULT NULL,
  `shipping_add` text,
  `shipping_country` varchar(255) DEFAULT NULL,
  `shipping_state` varchar(255) DEFAULT NULL,
  `shipping_city` varchar(255) DEFAULT NULL,
  `shipping_zip` varchar(255) DEFAULT NULL,
  `subtotal` float(10,2) DEFAULT NULL,
  `shiping_charge` float(10,2) DEFAULT NULL,
  `purchase_from` int(2) NOT NULL DEFAULT '1',
  `discount_val` float(10,2) DEFAULT NULL,
  `total` float(10,2) DEFAULT NULL,
  `order_time` bigint(10) DEFAULT NULL,
  `shipping_status` bigint(20) DEFAULT '1' COMMENT '1=>Pending; 2=>Processing; 3=>Delivered; 4=>Cancelled',
  `transaction_id` varchar(255) DEFAULT NULL,
  `transaction_status` varchar(255) DEFAULT NULL,
  `affiliate_code` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `discount_code` varchar(255) DEFAULT NULL,
  `processing_fee` float(10,2) DEFAULT NULL,
  `landing_id` int(10) NOT NULL DEFAULT '0',
  `tax` float(10,2) DEFAULT NULL,
  `cpa_rate` float(10,2) DEFAULT '0.00',
  `is_refunded` int(11) DEFAULT '0',
  PRIMARY KEY (`orderid`)
) ENGINE=MyISAM AUTO_INCREMENT=166 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transaction_order_details
-- ----------------------------
INSERT INTO `transaction_order_details` VALUES ('141', 'Samsuj', 'Jaman', 'xcvxc', '34534', 'US', 'samsujj@gmail.com', '1689', 'kolkata', '34534534534', 'Samsuj', 'Jaman', '34534', 'xcvxc', 'US', '1689', 'kolkata', '34534534534', '119.90', '0.00', '1', null, '119.90', '1414731140', '1', '2223197289', 'Success', null, '199', null, null, '1', null, '0.00', '0');
INSERT INTO `transaction_order_details` VALUES ('142', 'Samsuj', 'Jaman', 'aaa', '34534', 'US', 'samsujj@gmail.com', '1683', 'kolkata', '563453', 'Samsuj', 'Jaman', '34534', 'aaa', 'US', '1683', 'kolkata', '563453', '0.00', '7.95', '1', null, '7.95', '1414731863', '1', '2223197811', 'Success', null, '200', null, null, '1', null, '0.00', '0');
INSERT INTO `transaction_order_details` VALUES ('143', 'Samsuj', 'Jaman', 'aaa', '34534', 'US', 'samsujj@gmail.com', '1684', 'kolkata', '563453', 'Samsuj', 'Jaman', '34534', 'aaa', 'US', '1684', 'kolkata', '563453', '0.00', '7.95', '1', null, '7.95', '1414732306', '1', '2223198011', 'Success', null, '201', null, null, '1', null, '0.00', '0');
INSERT INTO `transaction_order_details` VALUES ('144', 'Samsuj', 'Jaman', 'aaa', '34534', 'US', 'samsujj@gmail.com', '1685', 'kolkata', '563453', 'Samsuj', 'Jaman', '34534', 'aaa', 'US', '1685', 'kolkata', '563453', '119.90', '0.00', '1', null, '119.90', '1414733461', '1', '2223198666', 'Success', null, '202', null, null, '1', null, '0.00', '0');
INSERT INTO `transaction_order_details` VALUES ('145', 'sss', 'lll', 'aaa', '34534', 'US', 'samsujj@gmail.com', '1686', 'kolkata', '34534534534', 'sss', 'lll', '34534', 'aaa', 'US', '1686', 'kolkata', '34534534534', '179.85', '0.00', '1', null, '179.85', '1414733621', '1', '2223198747', 'Success', null, '203', null, null, '1', null, '0.00', '0');
INSERT INTO `transaction_order_details` VALUES ('146', 'dfgd', 'kjkb', 'xcvxc', '34534', 'US', 'samsujj@gmail.com', '1683', 'kolkata', '563453', 'dfgd', 'kjkb', '34534', 'xcvxc', 'US', '1683', 'kolkata', '563453', '69.95', '0.00', '1', null, '69.95', '1414734263', '1', '2223199047', 'Success', null, '204', null, null, '1', null, '0.00', '0');
INSERT INTO `transaction_order_details` VALUES ('147', 'Samsuj', 'Jaman', 'aaa', '34534', 'US', 'samsujj@gmail.com', '1685', 'kolkata', '563453', 'Samsuj', 'Jaman', '34534', 'aaa', 'US', '1685', 'kolkata', '563453', '69.95', '0.00', '1', null, '69.95', '1414735319', '1', '2223199473', 'Success', null, '205', null, null, '1', null, '0.00', '0');
INSERT INTO `transaction_order_details` VALUES ('148', 'Samsuj', 'Jaman', 'aaa', '34534', 'US', 'samsujj@gmail.com', '1685', 'kolkata', '563453', 'Samsuj', 'Jaman', '34534', 'aaa', 'US', '1685', 'kolkata', '563453', '179.85', '0.00', '1', null, '179.85', '1414736579', '1', '2223200230', 'Success', null, '206', null, null, '1', null, '0.00', '0');
INSERT INTO `transaction_order_details` VALUES ('149', 'Samsuj', 'Jaman', 'aaa', '34534', 'US', 'samsujj@gmail.com', '1686', 'kolkata', '563453', 'Samsuj', 'Jaman', '34534', 'aaa', 'US', '1686', 'kolkata', '563453', '69.95', '0.00', '1', null, '69.95', '1414736953', '1', '2223200395', 'Success', null, '207', null, null, '1', null, '0.00', '0');
INSERT INTO `transaction_order_details` VALUES ('150', 'Samsuj', 'Jaman', 'xcvxc', '34534', 'US', 'samsujj@gmail.com', '1683', 'kolkata', '563453', 'Samsuj', 'Jaman', '34534', 'xcvxc', 'US', '1683', 'kolkata', '563453', '179.85', '0.00', '1', null, '179.85', '1414737680', '1', '2223200800', 'Success', null, '208', null, null, '1', null, '0.00', '0');
INSERT INTO `transaction_order_details` VALUES ('151', 'Samsuj', 'Jaman', 'aaa', '34534', 'US', 'samsujj@gmail.com', '1683', 'kolkata', '563453', 'Samsuj', 'Jaman', '34534', 'aaa', 'US', '1683', 'kolkata', '563453', '0.00', '7.95', '1', null, '7.95', '1414738657', '1', '2223201826', 'Success', null, '209', null, null, '1', null, '0.00', '0');
INSERT INTO `transaction_order_details` VALUES ('152', 'Samsuj1', 'Jaman1', 'aaa1', '345341', 'US', 'samsujj@gmail.com', '1683', 'kolkata1', '5634531', 'Samsuj1', 'Jaman1', '345341', 'aaa1', 'US', '1683', 'kolkata1', '5634531', '0.00', '7.95', '1', null, '7.95', '1414738716', '1', '2223201878', 'Success', null, '209', null, null, '1', null, '0.00', '0');
INSERT INTO `transaction_order_details` VALUES ('153', 'Samsuj', 'Jaman', 'aaa', '34534', 'US', 'samsujj@gmail.com', '1683', 'kolkata', '563453', 'Samsuj', 'Jaman', '34534', 'aaa', 'US', '1683', 'kolkata', '563453', '69.95', '0.00', '1', null, '69.95', '1414738879', '1', '2223202010', 'Success', null, '210', null, null, '1', null, '0.00', '0');
INSERT INTO `transaction_order_details` VALUES ('154', 'gfhfg', 'fbvn', 'aaa', '34534', 'US', 'samsujj@gmail.com', '1689', 'gfhf', '563453', 'gfhfg', 'fbvn', '34534', 'aaa', 'US', '1689', 'gfhf', '563453', '69.95', '0.00', '1', null, '69.95', '1414739309', '1', '2223202344', 'Success', null, '211', null, null, '1', null, '0.00', '0');
INSERT INTO `transaction_order_details` VALUES ('155', 'gfhfg', 'fbvn', 'aaa', '34534', 'US', 'samsujj@gmail.com', '1689', 'gfhf', '563453', 'gfhfg', 'fbvn', '34534', 'aaa', 'US', '1689', 'gfhf', '563453', '0.00', '7.95', '1', null, '7.95', '1414739583', '1', '2223202584', 'Success', null, '211', null, null, '1', null, '0.00', '0');
INSERT INTO `transaction_order_details` VALUES ('156', 'gfhfg12', 'fbvn23', 'aaa1', '34534', 'US', 'samsujj@gmail.com', '1689', 'gfhf', '563453', 'gfhfg12', 'fbvn23', '34534', 'aaa1', 'US', '1689', 'gfhf', '563453', '69.95', '0.00', '1', null, '69.95', '1414740121', '1', '2223202889', 'Success', null, '211', null, null, '1', null, '0.00', '0');
INSERT INTO `transaction_order_details` VALUES ('157', 'Samsuj', 'Jaman', 'xcvxc', '34534', 'US', 'samsujj@gmail.com', '1683', 'kolkata', '563453', 'Samsuj', 'Jaman', '34534', 'xcvxc', 'US', '1683', 'kolkata', '563453', '199.80', '7.95', '1', null, '207.75', '1414740449', '1', '2223203094', 'Success', null, '212', null, null, '1', null, '0.00', '0');
INSERT INTO `transaction_order_details` VALUES ('158', 'dsfsd', 'fbvn', 'aaa', '34534', 'US', 'samsujj@gmail.com', '1684', 'kolkata', '563453', 'dsfsd', 'fbvn', '34534', 'aaa', 'US', '1684', 'kolkata', '563453', '39.90', '23.85', '1', null, '63.75', '1414741481', '1', '2223203814', 'Success', null, '213', null, null, '1', null, '0.00', '0');
INSERT INTO `transaction_order_details` VALUES ('159', 'fbvg', 'nhgn', 'rgfevbgetbtefg', '564654564', 'US', 'fbd@gmail.com', '1682', 'revbrt', '45456', 'fbvg', 'nhgn', '564654564', 'rgfevbgetbtefg', 'US', '1682', 'revbrt', '45456', '0.00', '7.95', '1', null, '7.95', '1414744779', '1', '2223207557', 'Success', null, '215', null, null, '1', null, '0.00', '0');
INSERT INTO `transaction_order_details` VALUES ('160', 'Samsuj', 'Jaman', 'mjyhm', '34534', 'US', 'bhaskar.involutiontech@gmail.com', '1683', 'dsfs', '34534534534', 'Samsuj', 'Jaman', '34534', 'mjyhm', 'US', '1683', 'dsfs', '34534534534', '0.00', '7.95', '1', null, '7.95', '1414754470', '1', '2223226881', 'Success', null, '216', null, null, '1', null, '0.00', '0');
INSERT INTO `transaction_order_details` VALUES ('161', 'Samsuj', 'Jaman', 'aaa', '34534', 'US', 'samsujj@gmail.com', '1688', 'kolkata', '34534534534', 'Samsuj', 'Jaman', '34534', 'aaa', 'US', '1688', 'kolkata', '34534534534', '139.85', '7.95', '1', null, '147.80', '1414754586', '1', '2223226931', 'Success', null, '217', null, null, '1', null, '0.00', '0');
INSERT INTO `transaction_order_details` VALUES ('162', 'Samsuj', 'Jaman', 'aaa', '34534', 'US', 'samsujj@gmail.com', '1685', 'kolkata', '563453', 'Samsuj', 'Jaman', '34534', 'aaa', 'US', '1685', 'kolkata', '563453', '179.85', '0.00', '1', null, '179.85', '1414754918', '1', '2223227146', 'Success', null, '218', null, null, '1', null, '0.00', '0');
INSERT INTO `transaction_order_details` VALUES ('163', 'Samsuj', 'Jaman', 'aaa', '34534', 'US', 'samsujj@gmail.com', '1685', 'kolkata', '563453', 'Samsuj', 'Jaman', '34534', 'aaa', 'US', '1685', 'kolkata', '563453', '179.85', '0.00', '1', null, '179.85', '1414755011', '1', '2223227184', 'Success', null, '218', null, null, '1', null, '0.00', '0');
INSERT INTO `transaction_order_details` VALUES ('164', 'Samsuj', 'Jaman', 'aaa', '34534', 'US', 'samsujj@gmail.com', '1683', 'kolkata', '563453', 'Samsuj', 'Jaman', '34534', 'aaa', 'US', '1683', 'kolkata', '563453', '179.85', '0.00', '1', null, '179.85', '1414755792', '1', '2223227600', 'Success', null, '219', null, null, '1', null, '0.00', '0');
INSERT INTO `transaction_order_details` VALUES ('165', 'Samsuj', 'Jaman', 'aaa', '34534', 'US', 'samsujj@gmail.com', '1688', 'kolkata', '563453', 'Samsuj', 'Jaman', '34534', 'aaa', 'US', '1688', 'kolkata', '563453', '139.85', '7.95', '1', null, '147.80', '1414755958', '1', '2223227680', 'Success', null, '220', null, null, '1', null, '0.00', '0');

-- ----------------------------
-- Table structure for `transaction_product_details`
-- ----------------------------
DROP TABLE IF EXISTS `transaction_product_details`;
CREATE TABLE `transaction_product_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_desc` text NOT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_price` float(10,2) DEFAULT NULL,
  `product_quantity` int(11) DEFAULT NULL,
  `landing_product_id` int(11) DEFAULT NULL,
  `refund_value` float(10,2) DEFAULT NULL,
  `refund_time` bigint(20) DEFAULT NULL,
  `card_last_four` text,
  `card_exp_month` text,
  `card_exp_year` text,
  `transaction_id` bigint(255) DEFAULT NULL,
  `shipping_cost` float(10,2) DEFAULT NULL,
  `product_type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=166 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transaction_product_details
-- ----------------------------
INSERT INTO `transaction_product_details` VALUES ('136', '141', '49', 'Tier 2 Pack (Buy 2 and get 1 free) ', '<p><span>119.90</span></p>\r\n', null, '119.90', '3', '14', null, null, 'MTExMQ==', 'MTI=', 'MTU=', '2223197289', null, null);
INSERT INTO `transaction_product_details` VALUES ('137', '142', '49', 'Garcinia Free Trial', '<p>Garcinia Free Trial</p>\r\n', null, '0.00', '1', '12', null, null, 'MTExMQ==', 'MTI=', 'MTU=', '2223197811', null, null);
INSERT INTO `transaction_product_details` VALUES ('138', '143', '49', 'Garcinia Free Trial', '<p>Garcinia Free Trial</p>\r\n', null, '0.00', '1', '12', null, null, 'MTExMQ==', 'MDQ=', 'MTU=', '2223198011', null, null);
INSERT INTO `transaction_product_details` VALUES ('139', '144', '49', 'Tier 2 Pack (Buy 2 and get 1 free) ', '<p><span>119.90</span></p>\r\n', null, '119.90', '3', '14', null, null, 'MTExMQ==', 'MDQ=', 'MTU=', '2223198666', null, null);
INSERT INTO `transaction_product_details` VALUES ('140', '145', '49', 'Tier 3 Pack (Buy 3 and get 2 free) ', '<p>Garcinia</p>\r\n', null, '179.85', '5', '13', null, null, 'MTExMQ==', 'MDE=', 'MTU=', '2223198747', null, null);
INSERT INTO `transaction_product_details` VALUES ('141', '146', '49', 'Single Pack ', '<p>Garcinia</p>\r\n', null, '69.95', '1', '15', null, null, 'MTExMQ==', 'MDQ=', 'MTU=', '2223199047', null, null);
INSERT INTO `transaction_product_details` VALUES ('142', '147', '49', 'Single Pack ', '<p>Garcinia</p>\r\n', null, '69.95', '1', '15', null, null, 'MTExMQ==', 'MDI=', 'MTU=', '2223199473', null, null);
INSERT INTO `transaction_product_details` VALUES ('143', '148', '49', 'Tier 3 Pack (Buy 3 and get 2 free) ', '<p>Garcinia</p>\r\n', null, '179.85', '5', '13', null, null, 'MTExMQ==', 'MDU=', 'MTU=', '2223200230', null, null);
INSERT INTO `transaction_product_details` VALUES ('144', '149', '49', 'Single Pack ', '<p>Garcinia</p>\r\n', null, '69.95', '1', '15', null, null, 'MTExMQ==', 'MDE=', 'MTU=', '2223200395', null, null);
INSERT INTO `transaction_product_details` VALUES ('145', '150', '49', 'Tier 3 Pack (Buy 3 and get 2 free) ', '<p>Garcinia</p>\r\n', null, '179.85', '5', '13', null, null, 'MTExMQ==', 'MDI=', 'MTU=', '2223200800', null, null);
INSERT INTO `transaction_product_details` VALUES ('146', '152', '49', 'Garcinia Free Trial', '<p>Garcinia Free Trial</p>\r\n', null, '0.00', '1', '12', null, null, 'MTExMQ==', 'MDE=', 'MTU=', '2223201878', '7.95', '1');
INSERT INTO `transaction_product_details` VALUES ('147', '153', '49', 'Single Pack ', '<p>Garcinia</p>\r\n', null, '69.95', '1', '15', null, null, 'NTQ1NA==', 'MDE=', 'MTU=', '2223202010', '0.00', '1');
INSERT INTO `transaction_product_details` VALUES ('148', '154', '49', 'Single Pack ', '<p>Garcinia</p>\r\n', null, '69.95', '1', '15', null, null, 'MTExMQ==', 'MDQ=', 'MTU=', '2223202344', '0.00', '1');
INSERT INTO `transaction_product_details` VALUES ('149', '155', '49', 'Garcinia Free Trial', '<p>Garcinia Free Trial</p>\r\n', null, '0.00', '1', '12', null, null, 'MTExMQ==', 'MDM=', 'MTU=', '2223202584', '7.95', '1');
INSERT INTO `transaction_product_details` VALUES ('150', '156', '49', 'Single Pack ', '<p>Garcinia</p>\r\n', null, '69.95', '1', '15', null, null, 'MTExMQ==', 'MDQ=', 'MTU=', '2223202889', '0.00', '1');
INSERT INTO `transaction_product_details` VALUES ('151', '150', '50', 'Upsell Pro', '<p>Upsell Pro</p>\n', null, '19.95', '1', '16', null, null, 'MTExMQ==', 'MDI=', 'MTU=', '2223202938', '7.95', '0');
INSERT INTO `transaction_product_details` VALUES ('152', '157', '49', 'Tier 3 Pack (Buy 3 and get 2 free) ', '<p>Garcinia</p>\r\n', null, '179.85', '5', '13', null, null, 'MTExMQ==', 'MDY=', 'MTU=', '2223203094', '0.00', '1');
INSERT INTO `transaction_product_details` VALUES ('153', '157', '50', 'Upsell Pro', '<p>Upsell Pro</p>\n', null, '19.95', '1', '16', null, null, 'MTExMQ==', 'MDY=', 'MTU=', '2223203176', '7.95', '0');
INSERT INTO `transaction_product_details` VALUES ('154', '158', '49', 'Garcinia Free Trial', '<p>Garcinia Free Trial</p>\r\n', null, '0.00', '1', '12', null, null, 'MTExMQ==', 'MDY=', 'MTU=', '2223203814', '7.95', '1');
INSERT INTO `transaction_product_details` VALUES ('155', '159', '49', 'Garcinia Free Trial', '<p>Garcinia Free Trial</p>\r\n', null, '0.00', '1', '12', null, null, 'MTExMQ==', 'MDE=', 'MTU=', '2223207557', '7.95', '1');
INSERT INTO `transaction_product_details` VALUES ('156', '158', '50', 'perfectly clear colon cleanse', '<p>Upsell Pro</p>\n', null, '19.95', '1', '16', null, null, 'MTExMQ==', 'MDY=', 'MTU=', '2223225594', '7.95', '0');
INSERT INTO `transaction_product_details` VALUES ('157', '158', '50', 'perfectly clear colon cleanse', '<p>Upsell Pro</p>\n', null, '19.95', '1', '16', null, null, 'MTExMQ==', 'MDY=', 'MTU=', '2223225707', '7.95', '0');
INSERT INTO `transaction_product_details` VALUES ('158', '160', '49', 'Garcinia Free Trial', '<p>Garcinia Free Trial</p>\r\n', null, '0.00', '1', '12', null, null, 'MTExMQ==', 'MDI=', 'MTU=', '2223226881', '7.95', '1');
INSERT INTO `transaction_product_details` VALUES ('159', '161', '49', 'Tier 2 Pack (Buy 2 and get 1 free) ', '<p><span>119.90</span></p>\r\n', null, '119.90', '3', '14', null, null, 'MTExMQ==', 'MDM=', 'MTU=', '2223226931', '0.00', '1');
INSERT INTO `transaction_product_details` VALUES ('160', '161', '50', 'perfectly clear colon cleanse', '<p>Upsell Pro</p>\n', null, '19.95', '1', '16', null, null, 'MTExMQ==', 'MDM=', 'MTU=', '2223226948', '7.95', '0');
INSERT INTO `transaction_product_details` VALUES ('161', '162', '49', 'Tier 3 Pack (Buy 3 and get 2 free) ', '<p>Garcinia</p>\r\n', null, '179.85', '5', '13', null, null, 'MTExMQ==', 'MDM=', 'MTU=', '2223227146', '0.00', '1');
INSERT INTO `transaction_product_details` VALUES ('162', '163', '49', 'Tier 3 Pack (Buy 3 and get 2 free) ', '<p>Garcinia</p>\r\n', null, '179.85', '5', '13', null, null, 'NTQ1NA==', 'MDI=', 'MTU=', '2223227184', '0.00', '1');
INSERT INTO `transaction_product_details` VALUES ('163', '164', '49', 'Tier 3 Pack (Buy 3 and get 2 free) ', '<p>Garcinia</p>\r\n', null, '179.85', '5', '13', null, null, 'MTExMQ==', 'MDQ=', 'MTU=', '2223227600', '0.00', '1');
INSERT INTO `transaction_product_details` VALUES ('164', '165', '49', 'Tier 2 Pack (Buy 2 and get 1 free) ', '<p><span>119.90</span></p>\r\n', null, '119.90', '3', '14', null, null, 'MTExMQ==', 'MDM=', 'MTU=', '2223227680', '0.00', '1');
INSERT INTO `transaction_product_details` VALUES ('165', '165', '50', 'perfectly clear colon cleanse', '<p>Upsell Pro</p>\n', null, '19.95', '1', '16', null, null, 'MTExMQ==', 'MDM=', 'MTU=', '2223227688', '7.95', '0');

-- ----------------------------
-- Table structure for `user_manager`
-- ----------------------------
DROP TABLE IF EXISTS `user_manager`;
CREATE TABLE `user_manager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL COMMENT '1=>Male; 0=>Female',
  `email` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` text,
  `password2` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `address` text,
  `city` varchar(255) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `is_email_active` int(11) DEFAULT '2',
  `cpl` float(11,2) DEFAULT '0.00',
  `cpa` float(11,2) DEFAULT '0.00',
  `cpc` float(11,2) DEFAULT '0.00',
  `landing_page_id` int(11) DEFAULT '0',
  `affiliate_id` int(11) DEFAULT '0',
  `is_partial` int(11) DEFAULT '0',
  `zip` varchar(255) DEFAULT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=221 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_manager
-- ----------------------------
INSERT INTO `user_manager` VALUES ('86', 'only', 'Aff', '1', 'samsujj@gmail.com', '08/20/2014', '53469456454', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 'dsfsdfsdf', 'Kalyani', '44', '11', '1', '2', '9.55', '15.99', '11.50', '0', '0', '0', null, null);
INSERT INTO `user_manager` VALUES ('134', 'cxvxccx', 'dfgdf', null, 'dfgdf@gmail.com', null, '2321321', null, null, '0', 'dsfs', 'dfgdf', '1696', '254', null, null, '0.00', '0.00', '0.00', '1', '0', '0', '741258', null);
INSERT INTO `user_manager` VALUES ('69', 'bhaskar', 'involutiontech', '1', 'bhaskar.involutiontech@gmail.com', '03/07/2014', '24324234', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 'fddghfd', 'dfhfgh', '95', '21', '1', '2', '0.00', '0.00', '0.00', '0', '0', '0', null, null);
INSERT INTO `user_manager` VALUES ('163', 'bhaskar', 'chakraborty', null, 'bhaskar123.involutiontech@gmail.com', null, '2313131313', null, null, '0', 'halisahar', 'kolkata', '1694', '254', null, null, '0.00', '0.00', '0.00', '1', '0', '0', '21212', '2014-09-17 11:51:13');
INSERT INTO `user_manager` VALUES ('165', 'bhaskar', 'chakraborty', null, 'bhaskar123.involutiontechwww@gmail.com', null, '2313131313', null, null, '0', 'halisahar', 'kolkata', '1694', '254', null, null, '0.00', '0.00', '0.00', '1', '0', '0', '21212', '2014-09-17 11:54:48');
INSERT INTO `user_manager` VALUES ('166', 'bhaskar', 'chakraborty', null, 'bhaskarww123.involutiontech@gmail.com', null, '2313131313', null, null, '0', 'halisahar', 'kolkata', '1694', '254', null, null, '0.00', '0.00', '0.00', '1', '0', '0', '21212', '2014-09-17 11:57:06');
INSERT INTO `user_manager` VALUES ('167', 'bhaskartytt', 'chakrabortytyy', null, 'bhaskar12ttttff3.involutiontech@gmail.com', null, '2313131313tyty', null, null, '0', 'halisahartyty', 'kolkatatyty', '1682', '254', null, null, '0.00', '0.00', '0.00', '1', '0', '0', '21212', '2014-09-17 11:58:26');
INSERT INTO `user_manager` VALUES ('168', 'samsuj', 'das', null, 'samsujj2121@gmail.com', null, '2313131313', null, null, '0', 'halisahar', 'kolkata', '1694', '254', null, null, '0.00', '0.00', '0.00', '1', '0', '0', '22121', '2014-09-17 12:02:21');
INSERT INTO `user_manager` VALUES ('169', 'bhaskar', 'chakraborty', null, 'bhaskar123567.involutiontech@gmail.com', null, '2313131313', null, null, '0', 'halisahar', 'kolkata', '1694', '254', null, null, '0.00', '0.00', '0.00', '1', '0', '0', '21212', '2014-09-17 12:33:39');
INSERT INTO `user_manager` VALUES ('192', 'Samsuj', 'Jaman', null, 'samsujj@gmail.com', null, null, null, null, '0', null, 'kolkata', '1685', null, null, null, '0.00', '0.00', '0.00', '1', '0', '1', '563453', '2014-10-28 16:06:46');
INSERT INTO `user_manager` VALUES ('193', 'Samsuj', 'Jaman', null, 'samsujj@gmail.com', null, null, null, null, '0', null, 'kolkata', '1686', null, null, null, '0.00', '0.00', '0.00', '1', '0', '1', '563453', '2014-10-28 16:11:27');
INSERT INTO `user_manager` VALUES ('194', 'Samsuj', 'Jaman', null, 'samsujj@gmail.com', null, '34534', null, null, '0', null, 'kolkata', '1684', null, null, null, '0.00', '0.00', '0.00', '1', '0', '1', '563453', '2014-10-28 16:16:49');
INSERT INTO `user_manager` VALUES ('195', 'grth', 'bhfgbgf', null, 'gbbgf@mail.com', null, '48498498749874', null, null, '0', null, 'vfdbdfb', '1683', null, null, null, '0.00', '0.00', '0.00', '1', '0', '1', '99+59+5', '2014-10-28 16:59:23');
INSERT INTO `user_manager` VALUES ('196', 'Samsuj', 'Jaman', null, 'samsujj@gmail.com', null, 'sdfsd', null, null, '0', null, 'dsfs', '1682', null, null, null, '0.00', '0.00', '0.00', '1', '0', '1', '563453', '2014-10-28 17:41:29');
INSERT INTO `user_manager` VALUES ('197', 'Samsuj', 'Jaman', null, 'samsujj@gmail.com', null, '34534', null, null, '0', null, 'kolkata', '1685', null, null, null, '0.00', '0.00', '0.00', '1', '0', '1', '563453', '2014-10-29 15:09:59');
INSERT INTO `user_manager` VALUES ('198', 'Samsuj', 'Jaman', null, 'samsujj@gmail.com', null, '34534', null, null, '0', null, 'kolkata', '1690', null, null, null, '0.00', '0.00', '0.00', '1', '0', '1', '34534534534', '2014-10-29 15:21:50');
INSERT INTO `user_manager` VALUES ('199', 'Samsuj', 'Jaman', null, 'samsujj@gmail.com', null, '34534', null, null, '0', 'xcvxc', 'kolkata', '1689', '254', null, null, '0.00', '0.00', '0.00', '1', '0', '0', '34534534534', '2014-10-31 10:19:12');
INSERT INTO `user_manager` VALUES ('200', 'Samsuj', 'Jaman', null, 'samsujj@gmail.com', null, '34534', null, null, '0', 'aaa', 'kolkata', '1683', '254', null, null, '0.00', '0.00', '0.00', '1', '0', '0', '563453', '2014-10-31 10:23:27');
INSERT INTO `user_manager` VALUES ('201', 'Samsuj', 'Jaman', null, 'samsujj@gmail.com', null, '34534', null, null, '0', 'aaa', 'kolkata', '1684', '254', null, null, '0.00', '0.00', '0.00', '1', '0', '0', '563453', '2014-10-31 10:35:06');
INSERT INTO `user_manager` VALUES ('202', 'Samsuj', 'Jaman', null, 'samsujj@gmail.com', null, '34534', null, null, '0', 'aaa', 'kolkata', '1685', '254', null, null, '0.00', '0.00', '0.00', '1', '0', '0', '563453', '2014-10-31 10:42:23');
INSERT INTO `user_manager` VALUES ('203', 'sss', 'lll', null, 'samsujj@gmail.com', null, '34534', null, null, '0', 'aaa', 'kolkata', '1686', '254', null, null, '0.00', '0.00', '0.00', '1', '0', '0', '34534534534', '2014-10-31 11:03:11');
INSERT INTO `user_manager` VALUES ('204', 'dfgd', 'kjkb', null, 'samsujj@gmail.com', null, '34534', null, null, '0', 'xcvxc', 'kolkata', '1683', '254', null, null, '0.00', '0.00', '0.00', '1', '0', '0', '563453', '2014-10-31 11:13:23');
INSERT INTO `user_manager` VALUES ('205', 'Samsuj', 'Jaman', null, 'samsujj@gmail.com', null, '34534', null, null, '0', 'aaa', 'kolkata', '1685', '254', null, null, '0.00', '0.00', '0.00', '1', '0', '0', '563453', '2014-10-31 11:31:28');
INSERT INTO `user_manager` VALUES ('206', 'Samsuj', 'Jaman', null, 'samsujj@gmail.com', null, '34534', null, null, '0', 'aaa', 'kolkata', '1685', '254', null, null, '0.00', '0.00', '0.00', '1', '0', '0', '563453', '2014-10-31 11:51:38');
INSERT INTO `user_manager` VALUES ('207', 'Samsuj', 'Jaman', null, 'samsujj@gmail.com', null, '34534', null, null, '0', 'aaa', 'kolkata', '1686', '254', null, null, '0.00', '0.00', '0.00', '1', '0', '0', '563453', '2014-10-31 11:58:42');
INSERT INTO `user_manager` VALUES ('208', 'Samsuj', 'Jaman', null, 'samsujj@gmail.com', null, '34534', null, null, '0', 'xcvxc', 'kolkata', '1683', '254', null, null, '0.00', '0.00', '0.00', '1', '0', '0', '563453', '2014-10-31 12:10:49');
INSERT INTO `user_manager` VALUES ('209', 'Samsuj1', 'Jaman1', null, 'samsujj@gmail.com', null, '345341', null, null, '0', 'aaa1', 'kolkata1', '1683', '254', null, null, '0.00', '0.00', '0.00', '1', '0', '0', '563453', '2014-10-31 12:27:09');
INSERT INTO `user_manager` VALUES ('210', 'Samsuj', 'Jaman', null, 'samsujj@gmail.com', null, '34534', null, null, '0', 'aaa', 'kolkata', '1683', '254', null, null, '0.00', '0.00', '0.00', '1', '0', '0', '563453', '2014-10-31 12:30:49');
INSERT INTO `user_manager` VALUES ('211', 'gfhfg12', 'fbvn23', null, 'samsujj@gmail.com', null, '34534', null, null, '0', 'aaa1', 'gfhf', '1689', '254', null, null, '0.00', '0.00', '0.00', '1', '0', '0', '563453', '2014-10-31 12:37:43');
INSERT INTO `user_manager` VALUES ('212', 'Samsuj', 'Jaman', null, 'samsujj@gmail.com', null, '34534', null, null, '0', 'xcvxc', 'kolkata', '1683', '254', null, null, '0.00', '0.00', '0.00', '1', '0', '0', '563453', '2014-10-31 12:55:44');
INSERT INTO `user_manager` VALUES ('213', 'dsfsd', 'fbvn', null, 'samsujj@gmail.com', null, '34534', null, null, '0', 'aaa', 'kolkata', '1684', '254', null, null, '0.00', '0.00', '0.00', '1', '0', '0', '563453', '2014-10-31 13:01:47');
INSERT INTO `user_manager` VALUES ('214', 'fbvg', 'nhgn', null, 'fbd@gmail.com', null, '564654564', null, null, '0', null, 'revbrt', '1682', null, null, null, '0.00', '0.00', '0.00', '1', '0', '1', '45456', '2014-10-31 14:08:51');
INSERT INTO `user_manager` VALUES ('215', 'fbvg', 'nhgn', null, 'fbd@gmail.com', null, '564654564', null, null, '0', 'rgfevbgetbtefg', 'revbrt', '1682', '254', null, null, '0.00', '0.00', '0.00', '1', '0', '0', '45456', '2014-10-31 14:08:54');
INSERT INTO `user_manager` VALUES ('216', 'Samsuj', 'Jaman', null, 'bhaskar.involutiontech@gmail.com', null, '34534', null, null, '0', 'mjyhm', 'dsfs', '1683', '254', null, null, '0.00', '0.00', '0.00', '1', '0', '0', '34534534534', '2014-10-31 16:50:39');
INSERT INTO `user_manager` VALUES ('217', 'Samsuj', 'Jaman', null, 'samsujj@gmail.com', null, '34534', null, null, '0', 'aaa', 'kolkata', '1688', '254', null, null, '0.00', '0.00', '0.00', '1', '0', '0', '34534534534', '2014-10-31 16:52:41');
INSERT INTO `user_manager` VALUES ('218', 'Samsuj', 'Jaman', null, 'samsujj@gmail.com', null, '34534', null, null, '0', 'aaa', 'kolkata', '1685', '254', null, null, '0.00', '0.00', '0.00', '1', '0', '0', '563453', '2014-10-31 16:58:12');
INSERT INTO `user_manager` VALUES ('219', 'Samsuj', 'Jaman', null, 'samsujj@gmail.com', null, '34534', null, null, '0', 'aaa', 'kolkata', '1683', '254', null, null, '0.00', '0.00', '0.00', '1', '0', '0', '563453', '2014-10-31 17:04:50');
INSERT INTO `user_manager` VALUES ('220', 'Samsuj', 'Jaman', null, 'samsujj@gmail.com', null, '34534', null, null, '0', 'aaa', 'kolkata', '1688', '254', null, null, '0.00', '0.00', '0.00', '1', '0', '0', '563453', '2014-10-31 17:15:15');

-- ----------------------------
-- Table structure for `user_notes`
-- ----------------------------
DROP TABLE IF EXISTS `user_notes`;
CREATE TABLE `user_notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `notes` text,
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_notes
-- ----------------------------
INSERT INTO `user_notes` VALUES ('1', '2', 'fdg dfg dfg', '34533453');
INSERT INTO `user_notes` VALUES ('2', '3', 'sdfas', '23');
INSERT INTO `user_notes` VALUES ('3', '4', 'gdf dfg', '45');
INSERT INTO `user_notes` VALUES ('4', '4', 'fdgd', '33');
INSERT INTO `user_notes` VALUES ('5', '4', 'lorem ipsum', '1231');
INSERT INTO `user_notes` VALUES ('6', '4', 'lorem ipsum', '1231');
INSERT INTO `user_notes` VALUES ('7', '4', 'lorem ipsum', '1231');
INSERT INTO `user_notes` VALUES ('8', '4', 'lorem ipsum', '1231');
INSERT INTO `user_notes` VALUES ('9', '4', 'lorem ipsum', '1231');
INSERT INTO `user_notes` VALUES ('10', '4', 'lorem ipsum', '1231');
INSERT INTO `user_notes` VALUES ('11', '7', 'lorem ipsum', '1231');
INSERT INTO `user_notes` VALUES ('12', '4', 'lorem ipsum', '1231');
INSERT INTO `user_notes` VALUES ('13', '4', 'lorem ipsum', '1231');
INSERT INTO `user_notes` VALUES ('14', '4', 'lorem ipsum', '1231');
INSERT INTO `user_notes` VALUES ('15', '4', 'lorem ipsum', '1231');
INSERT INTO `user_notes` VALUES ('16', '4', 'lorem ipsum', '1231');
INSERT INTO `user_notes` VALUES ('17', '6', 'lorem ipsum 55', '12315');
INSERT INTO `user_notes` VALUES ('18', '10', 'dsfs sd sd sd', '1391754835');
INSERT INTO `user_notes` VALUES ('19', '10', 'sdf sdf sd', '1391754872');
INSERT INTO `user_notes` VALUES ('20', '10', 'Bhas', '1391754903');
INSERT INTO `user_notes` VALUES ('21', '10', 'bhas is a good boy', '1391756634');
INSERT INTO `user_notes` VALUES ('22', '10', 'fdg sd sdfs', '1391756708');
INSERT INTO `user_notes` VALUES ('23', '10', 'xvxcvxvxcvxc', '1392889356');
INSERT INTO `user_notes` VALUES ('24', '10', 'jkbjkbnbnb', '1392889390');
INSERT INTO `user_notes` VALUES ('25', '10', 'sfsdfsxfdsdf', '1392889422');
INSERT INTO `user_notes` VALUES ('26', '38', 'dszdsds', '1392889448');
INSERT INTO `user_notes` VALUES ('27', '38', 'fgfd fdg dfg dfg', '1392889532');
INSERT INTO `user_notes` VALUES ('28', '10', 'sdfs sdf sdf', '1392889642');
INSERT INTO `user_notes` VALUES ('29', '10', 'sdfszvszsfsdfsfsdf', '1392890080');
INSERT INTO `user_notes` VALUES ('30', '10', 'dfdf', '1392890498');
INSERT INTO `user_notes` VALUES ('31', '10', 'dfdf', '1392890575');
INSERT INTO `user_notes` VALUES ('33', '38', 'sdsadada', '1392890673');
INSERT INTO `user_notes` VALUES ('34', '38', 'sdsadada', '1392890741');
INSERT INTO `user_notes` VALUES ('35', '38', 'Bhaskar', '1393415831');
INSERT INTO `user_notes` VALUES ('36', '43', 'ggg', '1394096734');
INSERT INTO `user_notes` VALUES ('37', '43', 'vxgbcxb', '1395486316');
INSERT INTO `user_notes` VALUES ('38', '43', 'bhaskar', '1395489562');
INSERT INTO `user_notes` VALUES ('39', '69', 'test', '1407138188');
INSERT INTO `user_notes` VALUES ('40', '69', 'test 1', '1407138479');
INSERT INTO `user_notes` VALUES ('43', '78', 'dgfdf dsfs sdf', '1407145344');
INSERT INTO `user_notes` VALUES ('70', '79', 'test note', '1407488288');
INSERT INTO `user_notes` VALUES ('45', '78', 'cvxx xcv', '1407145418');
INSERT INTO `user_notes` VALUES ('47', '78', 'ccc', '1407145472');
INSERT INTO `user_notes` VALUES ('68', '78', 'fgdf fgdf', '1407153009');
INSERT INTO `user_notes` VALUES ('49', '78', 'fff', '1407145692');
INSERT INTO `user_notes` VALUES ('51', '78', 'vvv', '1407145973');
INSERT INTO `user_notes` VALUES ('67', '78', 'xcdf xcv', '1407152969');
INSERT INTO `user_notes` VALUES ('53', '78', 'vvv', '1407146194');
INSERT INTO `user_notes` VALUES ('55', '78', 'fff', '1407147704');
INSERT INTO `user_notes` VALUES ('58', '78', 'hhhh', '1407147813');
INSERT INTO `user_notes` VALUES ('59', '78', 'new note', '1407149324');
INSERT INTO `user_notes` VALUES ('61', '78', 'dsfddfdf', '1407149424');
INSERT INTO `user_notes` VALUES ('71', '86', 'sdfsdfsfsfsfsfs', '1410861686');

-- ----------------------------
-- Table structure for `user_role_manager`
-- ----------------------------
DROP TABLE IF EXISTS `user_role_manager`;
CREATE TABLE `user_role_manager` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `is_active` int(11) DEFAULT NULL COMMENT '1=>Active;2=>Inactive',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_role_manager
-- ----------------------------
INSERT INTO `user_role_manager` VALUES ('1', 'Admin', '<p><strong>Admin</strong></p>\r\n', '1');
INSERT INTO `user_role_manager` VALUES ('2', 'User', '<p><strong>Manager</strong></p>', '1');
INSERT INTO `user_role_manager` VALUES ('11', 'super admin', '<p>super</p>', '0');
INSERT INTO `user_role_manager` VALUES ('12', 'Affiliate', '&lt;p&gt;affiliate user&lt;/p&gt;\r\n', '1');

-- ----------------------------
-- Table structure for `user_role_relation`
-- ----------------------------
DROP TABLE IF EXISTS `user_role_relation`;
CREATE TABLE `user_role_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=143 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_role_relation
-- ----------------------------
INSERT INTO `user_role_relation` VALUES ('105', '79', '2');
INSERT INTO `user_role_relation` VALUES ('102', '80', '1');
INSERT INTO `user_role_relation` VALUES ('106', '81', '11');
INSERT INTO `user_role_relation` VALUES ('135', '88', '1');
INSERT INTO `user_role_relation` VALUES ('137', '86', '12');
INSERT INTO `user_role_relation` VALUES ('93', '70', '1');
INSERT INTO `user_role_relation` VALUES ('94', '69', '1');
INSERT INTO `user_role_relation` VALUES ('95', '68', '1');
INSERT INTO `user_role_relation` VALUES ('99', '53', '2');
INSERT INTO `user_role_relation` VALUES ('97', '74', '2');
INSERT INTO `user_role_relation` VALUES ('104', '78', '2');
INSERT INTO `user_role_relation` VALUES ('140', '87', '12');
INSERT INTO `user_role_relation` VALUES ('139', '87', '2');
INSERT INTO `user_role_relation` VALUES ('138', '87', '1');
INSERT INTO `user_role_relation` VALUES ('142', '161', '1');
INSERT INTO `user_role_relation` VALUES ('129', '85', '12');
INSERT INTO `user_role_relation` VALUES ('128', '85', '1');

-- ----------------------------
-- Table structure for `video`
-- ----------------------------
DROP TABLE IF EXISTS `video`;
CREATE TABLE `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL COMMENT '0=>from desktop; 1=>youtube',
  `isactive` int(11) DEFAULT NULL,
  `time` bigint(20) DEFAULT NULL,
  `showmaintv` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of video
-- ----------------------------
INSERT INTO `video` VALUES ('27', 'test', 'ZBpkvR2-nQo', '1', '1', '1409037238', null);
INSERT INTO `video` VALUES ('28', 'test1', 'VxcbppCX6Rk', '1', '1', '1409037783', null);
INSERT INTO `video` VALUES ('29', 'test2', 'H2c6HR0DzUQ', '1', '1', '1409045540', null);
INSERT INTO `video` VALUES ('30', 'A little difference, goes a long way.', '1409115910.flv', '0', '1', '1409115938', null);
INSERT INTO `video` VALUES ('31', 'test99', '1409116161.flv', '0', '1', '1409116179', null);

-- ----------------------------
-- Table structure for `whislist`
-- ----------------------------
DROP TABLE IF EXISTS `whislist`;
CREATE TABLE `whislist` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(255) DEFAULT NULL,
  `product_id` bigint(255) DEFAULT NULL,
  `is_added` int(2) DEFAULT NULL,
  `is_deleted` int(2) DEFAULT NULL,
  `isactive` int(2) DEFAULT NULL,
  `time` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of whislist
-- ----------------------------
INSERT INTO `whislist` VALUES ('1', '69', '46', '1409562655', '0', '0', '1409557629');
INSERT INTO `whislist` VALUES ('2', '69', '47', '0', '0', '1', '1409557661');

-- ----------------------------
-- View structure for `vw_total_cpc`
-- ----------------------------
DROP VIEW IF EXISTS `vw_total_cpc`;
CREATE VIEW `vw_total_cpc` AS select `affiliate_per_click`.`affiliate_code` AS `affiliate_code`,count(0) AS `tot_cpc` from `affiliate_per_click` group by `affiliate_per_click`.`affiliate_code` ;

-- ----------------------------
-- Procedure structure for `common2`
-- ----------------------------
DROP PROCEDURE IF EXISTS `common2`;
DELIMITER ;;
CREATE PROCEDURE `common2`(tablename VARCHAR(50),attr_name VARCHAR(50),pk VARCHAR(255),i_block_id BIGINT(255))
BEGIN

set @i_count = 0;

set @sql_text = concat('SELECT COUNT(',pk,') INTO  @i_count FROM ',tablename, ' WHERE ',attr_name,'=1 AND ',pk,'=',i_block_id);

prepare statement from @sql_text;


    execute statement;
#deallocate prepare statement; 

IF (@i_count=1) THEN
set @sql_text1 = concat('UPDATE ',tablename, '  SET ',attr_name,'=0 WHERE ',attr_name,'=1 AND ',pk,'=',i_block_id);
prepare statement1 from @sql_text1;
    execute statement1;
#deallocate prepare statement; 
   ELSE
set @sql_text2 = concat('UPDATE ',tablename, ' SET ',attr_name,'=1 WHERE ',attr_name,'=0 AND ',pk,'=',i_block_id);
prepare statement2 from @sql_text2;
    execute statement2;
#deallocate prepare statement; 

   END IF;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `forurl`
-- ----------------------------
DROP PROCEDURE IF EXISTS `forurl`;
DELIMITER ;;
CREATE PROCEDURE `forurl`(pagename VARCHAR(100))
BEGIN
SELECT * FROM page WHERE page_name=pagename; 
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `after_tran_succ`;
DELIMITER ;;
CREATE TRIGGER `after_tran_succ` AFTER INSERT ON `transaction_product_details` FOR EACH ROW BEGIN

INSERT INTO product_stock (stock,type,product_id) VALUES (NEW.product_quantity,2,NEW.product_id);
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `is_refund`;
DELIMITER ;;
CREATE TRIGGER `is_refund` AFTER UPDATE ON `transaction_product_details` FOR EACH ROW BEGIN

IF (NEW.refund_value IS NOT NULL AND NEW.refund_value != '') THEN

UPDATE transaction_order_details SET is_refunded=1 WHERE orderid = NEW.order_id;

END IF;

END
;;
DELIMITER ;
