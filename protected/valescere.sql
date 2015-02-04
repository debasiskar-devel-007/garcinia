/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50614
Source Host           : localhost:3306
Source Database       : valescere

Target Server Type    : MYSQL
Target Server Version : 50614
File Encoding         : 65001

Date: 2014-03-05 18:40:56
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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of affiliate_per_click
-- ----------------------------
INSERT INTO `affiliate_per_click` VALUES ('6', '36', '1', '192.168.0.109', '1393929055', '0.00');
INSERT INTO `affiliate_per_click` VALUES ('4', '43', '1', '192.168.0.109', '1393929055', '0.00');
INSERT INTO `affiliate_per_click` VALUES ('7', '35', '1', '192.168.0.109', '1393931022', '0.00');
INSERT INTO `affiliate_per_click` VALUES ('8', '35', '2', '192.168.0.109', '1393931048', '0.00');
INSERT INTO `affiliate_per_click` VALUES ('9', '43', '1', '192.168.0.109', '1394023259', '13.75');
INSERT INTO `affiliate_per_click` VALUES ('10', '48', '1', '192.168.0.109', '1394023342', '0.00');
INSERT INTO `affiliate_per_click` VALUES ('11', '37', '1', '192.168.0.109', '1394023441', '0.00');
INSERT INTO `affiliate_per_click` VALUES ('12', '37', '2', '192.168.0.109', '1394023610', '13.14');
INSERT INTO `affiliate_per_click` VALUES ('13', '37', '1', '192.168.0.109', '1394024213', '13.14');

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of catagory
-- ----------------------------
INSERT INTO `catagory` VALUES ('4', 'Category 1', '<p>test</p>\r\n', '5', '3', '0', '1', '2014-03-05 11:42:25');
INSERT INTO `catagory` VALUES ('2', 'Category 2', '<p>ccc</p>\r\n', '2', '5', '1', '0', '2014-02-12 00:09:59');
INSERT INTO `catagory` VALUES ('3', 'Category 3', '<p>aa</p>\r\n', '4', '8', '1', '1', '2014-02-12 00:10:06');
INSERT INTO `catagory` VALUES ('5', 'Category 4', '<p>qqq</p>\r\n', '6', '3', '1', '1', '2014-02-12 00:10:21');
INSERT INTO `catagory` VALUES ('8', 'Category 5', '<p>aabbb</p>\r\n', '11', '3', '1', '1', '2014-02-12 00:10:26');

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of contact
-- ----------------------------
INSERT INTO `contact` VALUES ('1', 'sdgsdfs', 'avc@awe.cvb', 'dgsg', 'dsgdgd', '0000-00-00 00:00:00');
INSERT INTO `contact` VALUES ('2', 'jhjhjhj', 'hjhj@ghn.com', 'jhjhhj', 'jhjhjhj', '2014-03-02 10:39:29');
INSERT INTO `contact` VALUES ('3', 'jhjhjhj', 'hjhj@ghn.com', 'jhjhhj', 'jhjhjhj', '2014-03-02 10:40:17');
INSERT INTO `contact` VALUES ('4', 'jhjhjhj', 'hjhj@ghn.com', 'jhjhhj', 'jhjhjhj', '2014-03-02 10:40:53');
INSERT INTO `contact` VALUES ('5', 'jhjhjhj', 'hjhj@ghn.com', 'jhjhhj', 'jhjhjhj', '2014-03-02 10:41:36');
INSERT INTO `contact` VALUES ('6', 'safsf', 'dsada@gmail.com', 'asasa', 'adasdasc', '2014-03-02 10:43:42');
INSERT INTO `contact` VALUES ('7', 'fdh', 'fhcj@gbn.cvb', 'gjfj', 'bmvmb', '2014-03-02 10:48:50');
INSERT INTO `contact` VALUES ('8', 'fvgdfg', 'abc@abc.com', 'asdff', 'xgdsfgf', '2014-03-03 02:53:55');
INSERT INTO `contact` VALUES ('9', 'fvgdfg', 'abc@abc.com', 'asdff', 'xgdsfgf', '2014-03-03 02:54:49');
INSERT INTO `contact` VALUES ('10', 'jjhjh', 'bsc@avc.cvb', 'kjkjkkj', 'ljkjkjkjk', '2014-03-03 12:40:43');
INSERT INTO `contact` VALUES ('11', 'Johnny', 'jruston254@yahoo.com', 'Test', 'Test', '2014-03-04 00:52:43');
INSERT INTO `contact` VALUES ('12', 'sdklf kdchkhdf', 'asd@gmail.com', 'sdjflj sdlfjdlj', 'alflsdfl dsljfds fldjf', '2014-03-04 01:32:48');
INSERT INTO `contact` VALUES ('13', 'John', 'john@xyz.com', 'Test', 'Test Test test test test', '2014-03-04 03:38:16');
INSERT INTO `contact` VALUES ('14', 'alex', 'alex@xyz.com', 'new', 'Test test test test', '2014-03-04 03:44:33');
INSERT INTO `contact` VALUES ('15', 'alex', 'alex@xyz.com', 'new', 'Test test test test', '2014-03-04 03:47:52');

-- ----------------------------
-- Table structure for `content`
-- ----------------------------
DROP TABLE IF EXISTS `content`;
CREATE TABLE `content` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `content_type` varchar(10) NOT NULL,
  `content_desc` varchar(100) NOT NULL,
  `content_status` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of content
-- ----------------------------
INSERT INTO `content` VALUES ('1', 'IMAGE', '<p>testing</p>\r\n', '0');
INSERT INTO `content` VALUES ('6', 'HTML', '<p>dfsfs</p>\r\n', '0');
INSERT INTO `content` VALUES ('5', 'VIDEO', '<p>dfsfs</p>\r\n', '0');
INSERT INTO `content` VALUES ('7', 'IMAGE', '<p>safdsaf</p>\r\n', '0');
INSERT INTO `content` VALUES ('8', 'VIDEO', '<p>dfgdfgd</p>\r\n', '0');
INSERT INTO `content` VALUES ('10', 'IMAGE', '<p>qweewqfd</p>\r\n', '0');

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
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of landing_page
-- ----------------------------
INSERT INTO `landing_page` VALUES ('1', 'ValesCere', 'ecommerce', '<p>test</p>\r\n', '1393589641.png', '1');

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mail
-- ----------------------------
INSERT INTO `mail` VALUES ('1', 'bhaskar', 'bhaskar.involutiontech@gmail.com', '0', '<p>test</p>\r\n');
INSERT INTO `mail` VALUES ('2', 'Subhra ', 'subhra.influxiq@gmail.com', '1', '<p>sdgdfg dffg fg</p>\r\n');
INSERT INTO `mail` VALUES ('3', 'valescere-info', 'info@valescere.com', '1', '<p>ADMIN MAIL</p>\r\n');

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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of page
-- ----------------------------
INSERT INTO `page` VALUES ('1', 'home for edit', '<p>this is for home page</p>\r\n', '1');
INSERT INTO `page` VALUES ('7', 'sam ', '<p>sam</p>\r\n', '0');
INSERT INTO `page` VALUES ('8', 'sam ', '<p>sam</p>\r\n', '0');
INSERT INTO `page` VALUES ('9', 'sam ', '<p>sam</p>\r\n', '0');
INSERT INTO `page` VALUES ('10', 'sam ', '<p>sam</p>\r\n', '0');
INSERT INTO `page` VALUES ('11', 'fdsf', '<p>dfdsf</p>\r\n', '0');
INSERT INTO `page` VALUES ('12', 'fdsf', '<p>dfdsf</p>\r\n', '0');
INSERT INTO `page` VALUES ('13', 'fdsf', '<p>dfdsf</p>\r\n', '0');

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
) ENGINE=MyISAM AUTO_INCREMENT=886 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pressimgvid
-- ----------------------------
INSERT INTO `pressimgvid` VALUES ('494', '98', 'Video', 'Youtube', 'x-J-1xYXYrQ');
INSERT INTO `pressimgvid` VALUES ('493', '98', 'Image', 'Null', '1379916352_14013.jpg');
INSERT INTO `pressimgvid` VALUES ('519', '97', 'Image', 'Null', '1379929144_14474.jpg');
INSERT INTO `pressimgvid` VALUES ('518', '97', 'Image', 'Null', '1379929204_32051.jpg');
INSERT INTO `pressimgvid` VALUES ('517', '97', 'Video', 'Youtube', 'H2c6HR0DzUQ');
INSERT INTO `pressimgvid` VALUES ('516', '97', 'Video', 'Youtube', 'ldNrDCxeh9M');
INSERT INTO `pressimgvid` VALUES ('481', '96', 'Video', 'Youtube', 'ldNrDCxeh9M');
INSERT INTO `pressimgvid` VALUES ('480', '96', 'Video', 'Youtube', 'x-J-1xYXYrQ');
INSERT INTO `pressimgvid` VALUES ('479', '96', 'Image', 'Null', '1379077817_31278.jpg');
INSERT INTO `pressimgvid` VALUES ('478', '96', 'Image', 'Null', '1379077844_3658.jpg');
INSERT INTO `pressimgvid` VALUES ('477', '96', 'Image', 'Null', '1379077849_20923.jpg');
INSERT INTO `pressimgvid` VALUES ('476', '96', 'Image', 'Null', '1379077853_30424.jpg');
INSERT INTO `pressimgvid` VALUES ('475', '96', 'Image', 'Null', '1379077857_6705.jpg');
INSERT INTO `pressimgvid` VALUES ('640', '89', 'Image', 'Null', '1380619296_24397.jpg');
INSERT INTO `pressimgvid` VALUES ('359', '87', 'Video', 'Youtube', 'RRNv6ZE0qII');
INSERT INTO `pressimgvid` VALUES ('639', '89', 'Video', 'Youtube', 'RRNv6ZE0qII');
INSERT INTO `pressimgvid` VALUES ('684', '90', 'Video', 'Youtube', 'v1nGjqVkXT0');
INSERT INTO `pressimgvid` VALUES ('683', '90', 'Video', 'Youtube', 'hJAUxOzi1xw');
INSERT INTO `pressimgvid` VALUES ('680', '91', 'Image', 'Null', '1380626172_13164.jpg');
INSERT INTO `pressimgvid` VALUES ('653', '92', 'Image', 'Null', '1380624796_9033.jpg');
INSERT INTO `pressimgvid` VALUES ('652', '92', 'Video', 'Youtube', 'ejPimcHzgxE');
INSERT INTO `pressimgvid` VALUES ('388', '93', 'Image', 'Null', '1378382572_14263.jpg');
INSERT INTO `pressimgvid` VALUES ('389', '93', 'Video', 'Youtube', 'lTIuLXzgirA');
INSERT INTO `pressimgvid` VALUES ('390', '94', 'Image', 'Null', '1378452173_6771.jpg');
INSERT INTO `pressimgvid` VALUES ('391', '94', 'Image', 'Null', '1378452139_29613.jpg');
INSERT INTO `pressimgvid` VALUES ('392', '94', 'Video', 'Youtube', 'x-J-1xYXYrQ');
INSERT INTO `pressimgvid` VALUES ('393', '94', 'Video', 'Youtube', 'H2c6HR0DzUQ');
INSERT INTO `pressimgvid` VALUES ('394', '94', 'Video', 'Youtube', 'L-3IhbNqLKs');
INSERT INTO `pressimgvid` VALUES ('466', '86', 'Image', 'Null', '1378720717_21251.jpeg');
INSERT INTO `pressimgvid` VALUES ('467', '86', 'Image', 'Null', '1378720714_13757.jpg');
INSERT INTO `pressimgvid` VALUES ('465', '86', 'Image', 'Null', '1378720719_29312.jpeg');
INSERT INTO `pressimgvid` VALUES ('464', '86', 'Video', 'Youtube', 'DChpxlKclFk');
INSERT INTO `pressimgvid` VALUES ('462', '86', 'Video', 'Youtube', 'BvJjCsidunM');
INSERT INTO `pressimgvid` VALUES ('463', '86', 'Video', 'Youtube', 'lTIuLXzgirA');
INSERT INTO `pressimgvid` VALUES ('461', '86', 'Video', 'Youtube', 'SAiBwqJYTXc');
INSERT INTO `pressimgvid` VALUES ('457', '86', 'Video', 'Youtube', 'jmRI3Ew4BvA');
INSERT INTO `pressimgvid` VALUES ('458', '86', 'Video', 'Youtube', 'yLvX8qqRo3o');
INSERT INTO `pressimgvid` VALUES ('460', '86', 'Video', 'Youtube', 'c1ANP0XclQA');
INSERT INTO `pressimgvid` VALUES ('459', '86', 'Video', 'Youtube', 'RRNv6ZE0qII');
INSERT INTO `pressimgvid` VALUES ('470', '86', 'Image', 'Null', '1378720712_22804.jpg');
INSERT INTO `pressimgvid` VALUES ('471', '86', 'Image', 'Null', '1378720636_7248.jpeg');
INSERT INTO `pressimgvid` VALUES ('472', '86', 'Image', 'Null', '1378720710_16166.jpg');
INSERT INTO `pressimgvid` VALUES ('473', '95', 'Image', 'Null', '1378992234_16020.jpg');
INSERT INTO `pressimgvid` VALUES ('474', '95', 'Video', 'Youtube', 'UePEu9ZVyRY');
INSERT INTO `pressimgvid` VALUES ('495', '98', 'Video', 'Youtube', 'H2c6HR0DzUQ');
INSERT INTO `pressimgvid` VALUES ('509', '99', 'Image', 'Null', '1379931276_27504.jpg');
INSERT INTO `pressimgvid` VALUES ('508', '99', 'Video', 'Youtube', 'H2c6HR0DzUQ');
INSERT INTO `pressimgvid` VALUES ('638', '100', 'Image', 'Null', '1380521287_27277.jpg');
INSERT INTO `pressimgvid` VALUES ('637', '100', 'Video', 'Youtube', 'ixhmY1pyFL8');
INSERT INTO `pressimgvid` VALUES ('636', '100', 'Video', 'Desktop', '1377773971_2310.flv');
INSERT INTO `pressimgvid` VALUES ('650', '88', 'Image', 'Null', '1380623340_23048.jpg');
INSERT INTO `pressimgvid` VALUES ('540', '102', 'Image', 'Null', '1380110199_BZ34.jpg');
INSERT INTO `pressimgvid` VALUES ('541', '102', 'Video', 'Youtube', 'BzX-jM1gufU');
INSERT INTO `pressimgvid` VALUES ('747', '115', 'Image', 'Null', '1381233473_tdKD.jpg');
INSERT INTO `pressimgvid` VALUES ('745', '114', 'Image', 'Null', '1381232511_aEnW.jpg');
INSERT INTO `pressimgvid` VALUES ('769', '109', 'Image', 'Null', '1382520203_SkJt.jpg');
INSERT INTO `pressimgvid` VALUES ('759', '107', 'Image', 'Null', '1381227610_kvAL.jpg');
INSERT INTO `pressimgvid` VALUES ('767', '110', 'Image', 'Null', '1382519324_tAi5.jpg');
INSERT INTO `pressimgvid` VALUES ('712', '104', 'Image', 'Null', '1381127937_1xbD.jpg');
INSERT INTO `pressimgvid` VALUES ('710', '104', 'Video', 'Youtube', 'x-Tt8vzkzF0');
INSERT INTO `pressimgvid` VALUES ('711', '104', 'Video', 'Desktop', '1381127974_543903468.flv');
INSERT INTO `pressimgvid` VALUES ('729', '106', 'Image', 'Null', '1381212876_TBo2.jpg');
INSERT INTO `pressimgvid` VALUES ('766', '110', 'Video', 'Youtube', 'FvW0pZFa9LI');
INSERT INTO `pressimgvid` VALUES ('770', '111', 'Image', 'Null', '1383200667_40vT.jpg');
INSERT INTO `pressimgvid` VALUES ('758', '107', 'Image', 'Null', '1381231662_nQKu.jpg');
INSERT INTO `pressimgvid` VALUES ('760', '112', 'Image', 'Null', '1382518448_cjOz.jpeg');
INSERT INTO `pressimgvid` VALUES ('776', '113', 'Image', 'Null', '1385462306_e5ql.jpg');
INSERT INTO `pressimgvid` VALUES ('727', '101', 'Image', 'Null', '1381136235_PDBd.jpg');
INSERT INTO `pressimgvid` VALUES ('726', '101', 'Image', 'Null', '1381136805_bRXe.jpg');
INSERT INTO `pressimgvid` VALUES ('725', '101', 'Video', 'Youtube', 'p8qpU6El1TE');
INSERT INTO `pressimgvid` VALUES ('649', '88', 'Video', 'Youtube', 'Yk9lHTznGAo');
INSERT INTO `pressimgvid` VALUES ('648', '88', 'Video', 'Youtube', 'eO5du5L02TQ');
INSERT INTO `pressimgvid` VALUES ('651', '88', 'Image', 'Null', '1380619563_939.jpg');
INSERT INTO `pressimgvid` VALUES ('654', '92', 'Image', 'Null', '1380624766_5456.jpg');
INSERT INTO `pressimgvid` VALUES ('679', '91', 'Image', 'Null', '1380626217_9674.jpg');
INSERT INTO `pressimgvid` VALUES ('678', '91', 'Image', 'Null', '1380626284_14476.jpg');
INSERT INTO `pressimgvid` VALUES ('677', '91', 'Image', 'Null', '1380626334_14257.jpg');
INSERT INTO `pressimgvid` VALUES ('676', '91', 'Video', 'Youtube', 'H2c6HR0DzUQ');
INSERT INTO `pressimgvid` VALUES ('675', '91', 'Video', 'Youtube', 'dRpUxh55NRo');
INSERT INTO `pressimgvid` VALUES ('674', '91', 'Video', 'Youtube', 'Htsc9gIvx94');
INSERT INTO `pressimgvid` VALUES ('673', '91', 'Video', 'Youtube', 'dit2bsKv0Qk');
INSERT INTO `pressimgvid` VALUES ('672', '91', 'Video', 'Youtube', 'HHUtKzwz2xg');
INSERT INTO `pressimgvid` VALUES ('681', '91', 'Image', 'Null', '1380626074_5728.jpg');
INSERT INTO `pressimgvid` VALUES ('682', '91', 'Image', 'Null', '1380626019_29774.jpg');
INSERT INTO `pressimgvid` VALUES ('685', '90', 'Video', 'Youtube', 'gsMHELDnbAk');
INSERT INTO `pressimgvid` VALUES ('686', '90', 'Video', 'Youtube', 'L9YCSo267wM');
INSERT INTO `pressimgvid` VALUES ('687', '90', 'Video', 'Youtube', 'R849oJxAaJI');
INSERT INTO `pressimgvid` VALUES ('688', '90', 'Video', 'Youtube', '6pA_Tou-DPI');
INSERT INTO `pressimgvid` VALUES ('689', '90', 'Image', 'Null', '1380627807_10087.jpg');
INSERT INTO `pressimgvid` VALUES ('690', '90', 'Image', 'Null', '1380627760_26194.jpg');
INSERT INTO `pressimgvid` VALUES ('691', '90', 'Image', 'Null', '1380627710_15976.jpg');
INSERT INTO `pressimgvid` VALUES ('692', '90', 'Image', 'Null', '1380627663_11013.jpg');
INSERT INTO `pressimgvid` VALUES ('693', '105', 'Video', 'Youtube', 'x-Tt8vzkzF0');
INSERT INTO `pressimgvid` VALUES ('748', '115', 'Image', 'Null', '1381232631_XKFE.jpg');
INSERT INTO `pressimgvid` VALUES ('749', '117', 'Image', 'Null', '1381235098_vBvf.jpg');
INSERT INTO `pressimgvid` VALUES ('750', '118', 'Image', 'Null', '1381235371_hPmB.jpg');
INSERT INTO `pressimgvid` VALUES ('757', '119', 'Image', 'Null', '1381294999_lqW0.jpg');
INSERT INTO `pressimgvid` VALUES ('771', '111', 'Image', 'Null', '1382518575_sTsZ.jpeg');
INSERT INTO `pressimgvid` VALUES ('775', '113', 'Video', 'Youtube', 'H2c6HR0DzUQ');
INSERT INTO `pressimgvid` VALUES ('777', '120', 'Image', 'Null', '1387263570_rixm.jpg');
INSERT INTO `pressimgvid` VALUES ('778', '120', 'Video', 'Youtube', 'H2c6HR0DzUQ');
INSERT INTO `pressimgvid` VALUES ('781', '122', 'Video', 'Youtube', 'H2c6HR0DzUQ');
INSERT INTO `pressimgvid` VALUES ('780', '123', 'Image', 'Null', '1387342961_T1Rq.png');
INSERT INTO `pressimgvid` VALUES ('782', '122', 'Image', 'Null', '1387342430_aOoG.gif');
INSERT INTO `pressimgvid` VALUES ('826', '4', 'Image', 'Null', '1388559910_rMRO.jpg');
INSERT INTO `pressimgvid` VALUES ('853', '1', 'Image', 'Null', '1388204805_WZKF.jpg');
INSERT INTO `pressimgvid` VALUES ('824', '3', 'Image', 'Null', '1388558795_orJA.jpg');
INSERT INTO `pressimgvid` VALUES ('852', '1', 'Image', 'Null', '1388200107_vsqw.jpg');
INSERT INTO `pressimgvid` VALUES ('851', '1', 'Video', 'Youtube', 'pNGc0mBSM3w');
INSERT INTO `pressimgvid` VALUES ('850', '1', 'Video', 'Youtube', 'NaiRZ4kngFI');
INSERT INTO `pressimgvid` VALUES ('849', '1', 'Video', 'Youtube', 'xJmE_L5ObLQ');
INSERT INTO `pressimgvid` VALUES ('828', '5', 'Image', 'Null', '1388560355_kMHw.png');
INSERT INTO `pressimgvid` VALUES ('855', '6', 'Image', 'Null', '1388560547_ov7e.jpg');
INSERT INTO `pressimgvid` VALUES ('835', '7', 'Image', 'Null', '1389247732_k5C7.jpg');
INSERT INTO `pressimgvid` VALUES ('836', '7', 'Video', 'Youtube', '-BOWrHtthyc');
INSERT INTO `pressimgvid` VALUES ('840', '8', 'Image', 'Null', '1389677122_C9TG.jpg');
INSERT INTO `pressimgvid` VALUES ('839', '8', 'Video', 'Youtube', 'e1bjeo0ji3U');
INSERT INTO `pressimgvid` VALUES ('841', '9', 'Image', 'Null', '1389680297_BVM5.jpg');
INSERT INTO `pressimgvid` VALUES ('842', '9', 'Video', 'Youtube', 'e1bjeo0ji3U');
INSERT INTO `pressimgvid` VALUES ('848', '10', 'Image', 'Null', '1389682941_PmOZ.jpg');
INSERT INTO `pressimgvid` VALUES ('847', '10', 'Video', 'Youtube', 'KOv5aEHbjeU');
INSERT INTO `pressimgvid` VALUES ('858', '14', 'Image', 'Null', '1389872191_2RhD.jpg');
INSERT INTO `pressimgvid` VALUES ('859', '15', 'Video', 'Youtube', 'WUgsyYotLkQ');
INSERT INTO `pressimgvid` VALUES ('860', '15', 'Image', 'Null', '1389878222_DCEv.jpg');
INSERT INTO `pressimgvid` VALUES ('861', '17', 'Image', 'Null', '1389941258_X0bh.png');
INSERT INTO `pressimgvid` VALUES ('885', '18', 'Image', 'Null', '1390191967_dWHQ.jpg');
INSERT INTO `pressimgvid` VALUES ('863', '19', 'Image', 'Null', '1389941631_8XFP.jpg');
INSERT INTO `pressimgvid` VALUES ('868', '21', 'Image', 'Null', '1389956993_7D8P.jpg');
INSERT INTO `pressimgvid` VALUES ('869', '25', 'Image', 'Null', '1389962664_KtLV.jpg');
INSERT INTO `pressimgvid` VALUES ('870', '25', 'Image', 'Null', '1389962656_DfQt.jpg');
INSERT INTO `pressimgvid` VALUES ('884', '18', 'Image', 'Null', '1389956372_OhTg.jpg');
INSERT INTO `pressimgvid` VALUES ('878', '26', 'Image', 'Null', '1390192709_AQQi.jpg');
INSERT INTO `pressimgvid` VALUES ('883', '27', 'Image', 'Null', '1390197666_4SmH.jpg');

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
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pressrelease
-- ----------------------------
INSERT INTO `pressrelease` VALUES ('54', '03/03/2014', 'jsdgjfd sjg jf dsgjgsdj', '<p>gf gmbkhjk ghjghj dkfhkjd, &nbsp;gsdjfjdg jsg kjdsj djg skdgfkjhj</p>\r\n', '0', 'sgsfdd jgdfjxcvgcx', '1393844487.jpg', 'Blog', '0', '0', '0');
INSERT INTO `pressrelease` VALUES ('55', '03/03/2014', 'jsdbkjf kj sdfd', '<p>hjdsgfjs jg djfds ljflj gsjg fdsljgdjg js gslj</p>\r\n', '0', 'hjsgdjfvd jshdk', '1393845737.jpg', 'Blog', '0', '0', '0');
INSERT INTO `pressrelease` VALUES ('56', '03/03/2014', 'BB-XT55 FORMULATIONS', '<p><span style=\"font-size: 11px;\">PREVENTATIVE MEDICINE ----- GO BEYOND ----- WITH AN ULTIMATE SHIELD</span><br />\r\n<strong style=\"color: #1A5F88;\">Valescere Cream,-</strong> A COMBINATION OF BB-XT55 INFUSED PRODUCTS AIDS YOUR SYSTEM IN DRAMATIC REDUCTION OR ELLIMINATION OF IMPURITIES THAT ARE POURING THROUGH OUR BODIES ON A DAILY BASIS.<br />\r\n<br />\r\nThese incredible combination of products were developed in tandem with one focus in mind. To create one system as the ultimate foundation aimed at assisting us to maintain good health. This is accomplished by protecting our bodies from electro magnetic fields and assisting in the elimination of impurities such as Bacteria L&#39;s Bacteria Rod&#39;s, Lactic Acids and many other forms of impurities which damage our bodies.<br />\r\n<br />\r\nModern science and x number of astounded medical practitioners are backing up this system of ultimate health. Get what you need now. Be protected. Put on the Ultimate Shield. Here is what one doctor has to say about these products:</p>\r\n', '1', 'Dr. Edward Zimmerman', '1393848172.png', 'Blog', '0', '0', '10');
INSERT INTO `pressrelease` VALUES ('53', '03/03/2014', 'Renue Cosmetics Co. Announces Availability of Vale', '<p>Renue Cosmetics Co. Announces Availability of Valescere Cream,&quot;Miracle Cream&quot;...Valescere Cream BBTX55 Technology<br />\r\nValescere Cream,- Renue Cosmetics Co. announces immediate availability of Valescere Cream,, enabling users of the BBTX55 Technology a topical agent to massage in the areas where they are experiencing pain caused by conditions due to arthritis, surgical procedures or injuries but not limited to. BB-XT55 Formula represents years of research and dedication to bring a 100% Natural Formula to humanity that will truly assist in obtaining, and maintaining, overall health and wellness.</p>\r\n\r\n<p><br />\r\n&quot;All pharmaceutical drugs have one type of side effect or another and I knew that if I could develop something that was 100% all natural it would benefit people so much more,&quot; said Johnny Lee, CEO of Renue Cosmetics Co..</p>\r\n\r\n<p><br />\r\nPositive Customer Impact Many customers have already benefited from applying Valescere Cream, Dr. Edward Zimmerman, a Medical Director of Las Vegas Laser &amp; Lipo, a state licensed, Nationally Accredited, Office Based Surgical Center, having personally used different strengths of Valescere Cream, over a course of years, found relief from pain of finger joints which are bone on bone, from years of lipo-sculpting, playing music, and using hand tools. Dr. Zimmerman noted significantly decreased stiffness and pain in back, neck, ankle and fingers, essentially stopping his daily intake of Naprosyn and other homeopathic remedies leading up to the decision to do an uncontrolled study with Mr. Johnny Lee the developer of this proprietary technology. Valescere Cream, enabled Dr. Edward Zimmerman to increase his range of motion decreaseinflammation and pain while allowing him to have more functionality while performing surgical procedures.&lt;br/&gt;&lt;br/&gt;</p>\r\n\r\n<p>&quot;I gifted samples of the cream to several dozen of my patients and several of my staff to evaluate trends of anecdotal experience,&quot; said Medical Director of Las Vegas Laser &amp; Lipo, Dr. Edward Zimmerman. &quot;The majority of them had similar reductions in existing aches and pains from arthritis, overuse and post-operative pain. Additionally, patients have noted reduced healing times, less post-operative pain and swelling when utilizing the cream post-operatively after lipo-sculpting. In particularly, using the cream on deep bruising after surgery, sclera-therapy and other trauma, as well as on soft tissue with poor perfusion has resulted in more rapid healing and resolution of bruising.&quot;</p>\r\n\r\n<p>Valescere Cream, AvailabilityValescere Cream, made with BBTX55 Tm Technology has become a high demand cosmetic application driven by customer feedback and is part of Renue Cosmetics Co.&#39;s commitment to delivering products that improve the quality of life for all humanity. Valescere Cream, is available for immediate purchase at www.valescere.com .<br />\r\nFounded in 2011, Renue Cosmetics Co. scientifically developed a natural formula out of necessity that aggressively allowed the body to quickly respond to healing. Additionally, this formula has had years of testing and is endorsed by DO&#39;s, DMD&#39;s, MD&#39;s, and Surgeons which have found the BB-XT55 formulations to have profound effects on eliminating the free radicals attacking the human body. The company offers a wide range of products and services designed to provide everyone in the world the benefits of good health and healing.</p>\r\n\r\n<p><img alt=\"#\" src=\"http://valescere.com/images/logo.png\" style=\"margin: 5px auto; display: block;\" /></p>\r\n', '1', 'Dr. Edward Zimmerman', '1393842223.png', 'Blog', '0', '0', '3');
INSERT INTO `pressrelease` VALUES ('52', '03/03/2014', 'sfsdgds sdfdgd', '<p>a sfsd sdgd dfdfs setgdfc</p>\r\n', '0', 'sd fdsdfdd', '1393839480.jpg', 'Blog', '0', '0', '0');
INSERT INTO `pressrelease` VALUES ('50', '03/03/2014', 'dsfvscxbcvbcv', '<p>dsfsdf</p>\r\n', '0', 'sdfsdf', '1393837710.jpg', 'Blog', '0', '0', '0');
INSERT INTO `pressrelease` VALUES ('57', '03/03/2014', 'test', '<p>test</p>\r\n', '0', 'test', '1393913605.jpg', 'Blog', null, '0', '5');

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
  PRIMARY KEY (`productid`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('16', 'Valescere Cream', '<ul>\r\n	<li>\r\n	<p dir=\"ltr\" id=\"docs-internal-guid-1768617d-6df3-64ba-3f8c-8a044b1b73c9\" style=\"line-height:1.15;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size: 15px; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; vertical-align: baseline;\">&nbsp;3 Month Daily Supply</span></p>\r\n	</li>\r\n	<li>\r\n	<p dir=\"ltr\" style=\"line-height:1.15;margin-top:0pt;margin-bottom:0pt;\"><span style=\"background-color: transparent; color: rgb(0, 0, 0); font-family: Arial; font-size: 15px; line-height: 1.15;\">&nbsp; Triple Threat</span></p>\r\n	</li>\r\n	<li>\r\n	<p dir=\"ltr\" style=\"line-height:1.15;margin-top:0pt;margin-bottom:0pt;\"><span style=\"background-color: transparent; color: rgb(0, 0, 0); font-family: Arial; font-size: 15px; line-height: 1.15;\">&nbsp; Free BB-XT55 Jumpstart E-book</span></p>\r\n	</li>\r\n	<li>\r\n	<p dir=\"ltr\" style=\"line-height:1.15;margin-top:0pt;margin-bottom:0pt;\"><span style=\"background-color: transparent; color: rgb(0, 0, 0); font-family: Arial; font-size: 15px; line-height: 1.15;\">&nbsp; Plus shipping and handling</span></p>\r\n	</li>\r\n	<li>\r\n	<p dir=\"ltr\" style=\"line-height:1.15;margin-top:0pt;margin-bottom:0pt;\"><span style=\"background-color: transparent; color: rgb(0, 0, 0); font-family: Arial; font-size: 15px; line-height: 1.15;\">&nbsp; 15 day money back guarantee</span></p>\r\n	</li>\r\n</ul>\r\n', '4', '1', '174.95', '2014-02-26 05:28:30', '12');
INSERT INTO `product` VALUES ('17', 'Valescere Cream', '<ul>\r\n	<li>\r\n	<p dir=\"ltr\" style=\"line-height:1.15;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size: 15px; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; vertical-align: baseline;\">&nbsp;1 Month Daily Supply</span></p>\r\n	</li>\r\n	<li>\r\n	<p dir=\"ltr\" style=\"line-height:1.15;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size: 15px; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; vertical-align: baseline;\">&nbsp;Single Starter Pack</span></p>\r\n	</li>\r\n	<li>\r\n	<p dir=\"ltr\" style=\"line-height:1.15;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size: 15px; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; vertical-align: baseline;\">&nbsp;Free BB-XT55 Jumpstart E-book</span></p>\r\n	</li>\r\n	<li>\r\n	<p dir=\"ltr\" style=\"line-height:1.15;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size: 15px; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; vertical-align: baseline;\">&nbsp;Plus shipping and handling</span></p>\r\n	</li>\r\n	<li>\r\n	<p dir=\"ltr\" style=\"line-height:1.15;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size: 15px; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; vertical-align: baseline;\">&nbsp;15 day money back guarantee</span></p>\r\n	</li>\r\n</ul>\r\n', '4', '1', '69.95', '2014-03-05 11:43:40', '121');
INSERT INTO `product` VALUES ('15', 'Valescere Cream', '<ul>\r\n	<li>\r\n	<p dir=\"ltr\" id=\"docs-internal-guid-1768617d-6df0-db43-28eb-79d95fa29448\" style=\"line-height:1.15;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size: 15px; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; vertical-align: baseline;\">2 Month Daily Supply</span></p>\r\n	</li>\r\n	<li>\r\n	<p dir=\"ltr\" style=\"line-height:1.15;margin-top:0pt;margin-bottom:0pt;\"><span style=\"background-color: transparent; color: rgb(0, 0, 0); font-family: Arial; font-size: 15px; line-height: 1.15;\">&nbsp;Duo Pack</span></p>\r\n	</li>\r\n	<li>\r\n	<p dir=\"ltr\" style=\"line-height:1.15;margin-top:0pt;margin-bottom:0pt;\"><span style=\"background-color: transparent; color: rgb(0, 0, 0); font-family: Arial; font-size: 15px; line-height: 1.15;\">&nbsp; Free BB-XT55 Jumpstart E-book</span></p>\r\n	</li>\r\n	<li>\r\n	<p dir=\"ltr\" style=\"line-height:1.15;margin-top:0pt;margin-bottom:0pt;\"><span style=\"background-color: transparent; color: rgb(0, 0, 0); font-family: Arial; font-size: 15px; line-height: 1.15;\">&nbsp; Plus shipping and handling</span></p>\r\n	</li>\r\n	<li>\r\n	<p dir=\"ltr\" style=\"line-height:1.15;margin-top:0pt;margin-bottom:0pt;\"><span style=\"background-color: transparent; color: rgb(0, 0, 0); font-family: Arial; font-size: 15px; line-height: 1.15;\">&nbsp; 15 day money back guarantee</span></p>\r\n	</li>\r\n</ul>\r\n', '2', '1', '126.95', '2014-02-26 05:27:01', '12');

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
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of product_image
-- ----------------------------
INSERT INTO `product_image` VALUES ('62', '16', '1393414056.png', null);
INSERT INTO `product_image` VALUES ('61', '15', '1393413971.png', null);
INSERT INTO `product_image` VALUES ('60', '17', '1393413753.png', null);
INSERT INTO `product_image` VALUES ('58', '18', '1393411767.jpg', null);

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
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of product_stock
-- ----------------------------
INSERT INTO `product_stock` VALUES ('25', '18', '0', '1393411797', '2');
INSERT INTO `product_stock` VALUES ('24', '18', '0', '1393411797', '1');
INSERT INTO `product_stock` VALUES ('20', '16', '0', '1393411797', '1');
INSERT INTO `product_stock` VALUES ('19', '3', '0', '1393411797', '2');
INSERT INTO `product_stock` VALUES ('23', '17', '0', '1393411797', '2');
INSERT INTO `product_stock` VALUES ('22', '17', '0', '1393411797', '1');
INSERT INTO `product_stock` VALUES ('21', '16', '0', '1393411797', '2');
INSERT INTO `product_stock` VALUES ('18', '3', '0', '1393411797', '1');
INSERT INTO `product_stock` VALUES ('17', '1', '0', '1393411797', '2');
INSERT INTO `product_stock` VALUES ('16', '1', '0', '1393411797', '1');
INSERT INTO `product_stock` VALUES ('26', '11', '0', '1393411797', '1');
INSERT INTO `product_stock` VALUES ('27', '11', '0', '1393411797', '2');
INSERT INTO `product_stock` VALUES ('28', '12', '0', '1393411797', '1');
INSERT INTO `product_stock` VALUES ('29', '12', '0', '1393411797', '2');
INSERT INTO `product_stock` VALUES ('30', '13', '0', '1393411797', '1');
INSERT INTO `product_stock` VALUES ('31', '13', '0', '1393411797', '2');
INSERT INTO `product_stock` VALUES ('32', '14', '0', '1393411797', '1');
INSERT INTO `product_stock` VALUES ('33', '14', '0', '1393411797', '2');
INSERT INTO `product_stock` VALUES ('34', '15', '0', '1393411797', '1');
INSERT INTO `product_stock` VALUES ('35', '15', '0', '1393411797', '2');
INSERT INTO `product_stock` VALUES ('36', '17', '45', '1393414245', '1');
INSERT INTO `product_stock` VALUES ('37', '17', '10', '1393414245', '2');
INSERT INTO `product_stock` VALUES ('38', '16', '5', '1393414763', '1');
INSERT INTO `product_stock` VALUES ('39', '16', '12', '1393414791', '1');
INSERT INTO `product_stock` VALUES ('40', '17', '4', '1393414815', '1');
INSERT INTO `product_stock` VALUES ('41', '15', '2', '1393414847', '1');
INSERT INTO `product_stock` VALUES ('42', '17', '12', '1393417553', '1');
INSERT INTO `product_stock` VALUES ('43', '15', '12', '1393420147', '1');
INSERT INTO `product_stock` VALUES ('44', '17', '3', '1393500625', '2');
INSERT INTO `product_stock` VALUES ('45', '17', '1', '1393500996', '2');
INSERT INTO `product_stock` VALUES ('46', '16', '1', '1393501841', '2');
INSERT INTO `product_stock` VALUES ('47', '16', '1', '1393926148', '2');
INSERT INTO `product_stock` VALUES ('48', '16', '1', '1393938741', '2');
INSERT INTO `product_stock` VALUES ('49', '17', '1', '1393938918', '2');
INSERT INTO `product_stock` VALUES ('50', '15', '11', '1394003422', '1');
INSERT INTO `product_stock` VALUES ('51', '15', '1', '1394012382', '2');
INSERT INTO `product_stock` VALUES ('52', '15', '1', '1394015685', '2');
INSERT INTO `product_stock` VALUES ('53', '16', '1', '1394016535', '2');
INSERT INTO `product_stock` VALUES ('54', '15', '1', '1394016630', '2');
INSERT INTO `product_stock` VALUES ('55', '17', '1', '1394020344', '2');

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
  `total` float(10,2) DEFAULT NULL,
  `order_time` bigint(10) DEFAULT NULL,
  `shipping_status` bigint(20) DEFAULT NULL COMMENT '1=>Pending; 2=>Processing; 3=>Delivered; 4=>Cancelled',
  `transaction_id` varchar(255) DEFAULT NULL,
  `transaction_status` varchar(255) DEFAULT NULL,
  `affiliate_code` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transaction_order_details
-- ----------------------------
INSERT INTO `transaction_order_details` VALUES ('6', 'Samsuj', 'Jaman', 'dsfsd', '423423423', 'United State', 'samsuj@gmail.com', 'KS', 'kolkata', '111111111111', 'Samsuj', 'Jaman', '423423423', 'dsfsd', 'United State', 'KS', 'kolkata', '111111111111', '12.37', '0.00', '12.37', '1393228084', '1', '0', 'Success', null, '39');
INSERT INTO `transaction_order_details` VALUES ('5', 'Samsuj', 'Jaman', 'test', '423423423', 'United State', 'samsuj@gmail.com', 'CO', 'kolkata', '111111111111', 'Samsuj', 'Jaman', '423423423', 'test', 'United State', 'CO', 'kolkata', '111111111111', '24.37', '0.00', '24.37', '1393227342', '1', '0', 'Failed', null, '39');
INSERT INTO `transaction_order_details` VALUES ('3', 'Bhaska', 'Chakro', 'kalyani', '74313', 'United State', 'email@gmail.com', 'IA', 'kalyani', '4653413', 'Samsuj', 'Jaman', '423423423', 'add', 'United State', 'CA', 'kolkata', '111111111111', '53.25', '0.00', '53.25', '1392985941', '1', null, null, null, null);
INSERT INTO `transaction_order_details` VALUES ('4', 'Bhaska', 'Chakro', 'kalyani', '74313', 'United State', 'email@gmail.com', 'IA', 'kalyani', '4653413', 'Samsuj', 'Jaman', '423423423', 'add', 'United State', 'CA', 'kolkata', '111111111111', '50.25', '0.00', '50.25', '1392986120', '1', null, null, null, null);
INSERT INTO `transaction_order_details` VALUES ('7', 'Samsuj', 'Jaman', 'nothing...', '423423423', 'United State', 'samsujj@gmail.com', 'ID', 'kolkata', '111111111111', 'Samsuj', 'Jaman', '423423423', 'nothing...', 'United State', 'ID', 'kolkata', '111111111111', '9.12', '0.00', '9.12', '1393312292', '1', '2207281050', 'Success', null, '52');
INSERT INTO `transaction_order_details` VALUES ('8', 'Samsuj', 'Jaman', 'fgs sdf', '423423423', 'United State', 'samsujj@gmail.com', 'CT', 'kolkata', '111111111111', 'Samsuj', 'Jaman', '423423423', 'fgs sdf', 'United State', 'CT', 'kolkata', '111111111111', '12.00', '0.00', '12.00', '1393392788', '1', '5962283921', 'Failed', null, '51');
INSERT INTO `transaction_order_details` VALUES ('9', 'Samsuj', 'Jaman', 'fdsg sd', '423423423', 'United State', 'samsujj@gmail.com', 'IN', 'kolkata', '111111111111', 'Samsuj', 'Jaman', '423423423', 'fdsg sd', 'United State', 'IN', 'kolkata', '111111111111', '9.12', '0.00', '9.12', '1393392947', '1', '5962286036', 'Failed', null, null);
INSERT INTO `transaction_order_details` VALUES ('10', 'Samsuj', 'Jaman', 'dgdf', '423423423', 'United State', 'samsujj@gmail.com', 'KS', 'kolkata', '111111111111', 'Samsuj', 'Jaman', '423423423', 'dgdf', 'United State', 'KS', 'kolkata', '111111111111', '12.00', '0.00', '12.00', '1393394068', '1', '5962300558', 'Failed', null, null);
INSERT INTO `transaction_order_details` VALUES ('11', 'Samsuj', 'Jaman', 'Baguiati', '423423423', 'United State', 'samsujj@gmail.com', 'GA', 'kolkata', 'rgdfdd', 'Samsuj', 'Jaman', '423423423', 'Baguiati', 'United State', 'GA', 'kolkata', '43534534', '9.12', '0.00', '9.12', '1393396073', '1', '5962329677', 'Failed', null, null);
INSERT INTO `transaction_order_details` VALUES ('12', 'Samsuj', 'Jaman', 'sssss', '6432', 'United State', 'samsujj@gmail.com', 'CO', 'vncv', '34534', 'Samsuj', 'Jaman', '6432', 'sssss', 'United State', 'CO', 'vncv', '34534', '69.95', '0.00', '69.95', '1393439057', '1', '0', 'Failed', null, '51');
INSERT INTO `transaction_order_details` VALUES ('13', 'Samsuj', 'Jaman', 'Baguiati', '423423423', 'United State', 'samsujj@gmail.com', 'FL', 'kolkata', '111111111111', 'Samsuj', 'Jaman', '423423423', 'Baguiati', 'United State', 'FL', 'kolkata', '111111111111', '209.85', '0.00', '209.85', '1393500625', '1', '5965522184', 'Failed', '36', null);
INSERT INTO `transaction_order_details` VALUES ('14', 'Amitava', 'Das', 'Habra', '5643684321', 'United State', 'amit.das@gmail.com', 'IA', 'kolkata', '111111111111', 'Amitava', 'Das', '5643684321', 'Habra', 'United State', 'IA', 'kolkata', '111111111111', '69.95', '0.00', '69.95', '1393500995', '1', '5965526207', 'Failed', null, null);
INSERT INTO `transaction_order_details` VALUES ('15', 'Samsuj', 'Jaman', 'Kolkata', '423423423', 'United State', 'samsujj@gmail.com', 'ID', 'kolkata', '111111111111', 'Samsuj', 'Jaman', '423423423', 'Kolkata', 'United State', 'ID', 'kolkata', '111111111111', '174.95', '0.00', '174.95', '1393501841', '1', '5965534942', 'Failed', '36', '50');
INSERT INTO `transaction_order_details` VALUES ('16', 'Samsuj', 'Jaman', 'fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf ', '423423423', 'United State', 'samsujj@gmail.com', 'IA', 'kolkata', '111111111111', 'Samsuj', 'Jaman', '423423423', 'fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf fdxbvdf ', 'United State', 'IA', 'kolkata', '111111111111', '174.95', '0.00', '174.95', '1393926148', '1', '5980641558', 'Failed', '36', null);
INSERT INTO `transaction_order_details` VALUES ('17', 'Bhasu', 'Das', 'ass sdf', '45641', 'United State', 'bhasudas@gmail.com', 'FL', 'kolkata', '111111111111', 'Bhasu', 'Das', '45641', 'ass sdf', 'United State', 'FL', 'kolkata', '111111111111', '174.95', '0.00', '174.95', '1393938741', '1', '5980846034', 'Failed', null, null);
INSERT INTO `transaction_order_details` VALUES ('18', 'Bhasu', 'Das', 'dsfs sa sdf ', '423423423', 'United State', 'samsujj@gmail.com', 'IL', 'kolkata', '111111111111', 'Bhasu', 'Das', '423423423', 'dsfs sa sdf ', 'United State', 'IL', 'kolkata', '111111111111', '69.95', '0.00', '69.95', '1393938917', '1', '5980850148', 'Failed', null, null);
INSERT INTO `transaction_order_details` VALUES ('19', 'Samsuj', 'Jaman', 'sfz sd', '423423423', 'United State', 'samsujj@gmail.com', 'HI', 'kolkata', '111111111111', 'Samsuj', 'Jaman', '423423423', 'sfz sd', 'United State', 'HI', 'kolkata', '111111111111', '126.95', '0.00', '126.95', '1394012382', '1', null, 'Failed', null, null);
INSERT INTO `transaction_order_details` VALUES ('20', 'Samsuj', 'Jaman', 'dg', '423423423', 'United State', 'samsujj@gmail.com', 'IL', 'kolkata', '111111111111', 'Samsuj', 'Jaman', '423423423', 'dg', 'United State', 'IL', 'kolkata', '111111111111', '126.95', '0.00', '126.95', '1394015685', '1', '5983938857', 'Failed', null, null);
INSERT INTO `transaction_order_details` VALUES ('21', 'Samsuj', 'Jaman', 'asda', '423423423', 'United State', 'samsujj@gmail.com', 'CA', 'kolkata', '111111111111', 'Samsuj', 'Jaman', '423423423', 'asda', 'United State', 'CA', 'kolkata', '111111111111', '174.95', '0.00', '174.95', '1394016535', '1', '0', 'Failed', null, null);
INSERT INTO `transaction_order_details` VALUES ('22', 'Samsuj', 'Jaman', '444', '423423423', 'United State', 'samsujj@gmail.com', 'ID', 'kolkata', '111111111111', 'Samsuj', 'Jaman', '423423423', '444', 'United State', 'ID', 'kolkata', '111111111111', '126.95', '0.00', '126.95', '1394016630', '1', '0', 'Failed', null, null);
INSERT INTO `transaction_order_details` VALUES ('23', 'Bhasu', 'Das', 'esafas', '423423423', 'United State', 'samsujj@gmail.com', 'IA', 'kolkata', 'asda', 'Bhasu', 'Das', '423423423', 'esafas', 'United State', 'IA', 'kolkata', 'asda', '69.95', '0.00', '69.95', '1394020344', '1', '0', 'Failed', null, null);

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transaction_product_details
-- ----------------------------
INSERT INTO `transaction_product_details` VALUES ('1', '3', '13', 'Test Product', '', '1393414056.png', '12.00', '1');
INSERT INTO `transaction_product_details` VALUES ('2', '3', '15', 'Garnier', '', '1393414056.png', '13.75', '3');
INSERT INTO `transaction_product_details` VALUES ('3', '4', '13', 'Test Product 12', '', '1393414056.png', '9.00', '1');
INSERT INTO `transaction_product_details` VALUES ('4', '4', '15', 'Garnier', '', '1393414056.png', '13.75', '3');
INSERT INTO `transaction_product_details` VALUES ('5', '5', '1', 'Oley', '', '1393414056.png', '12.37', '1');
INSERT INTO `transaction_product_details` VALUES ('6', '5', '13', 'Test Product', '', '1393414056.png', '12.00', '1');
INSERT INTO `transaction_product_details` VALUES ('7', '6', '1', 'Oley', '', '1393414056.png', '12.37', '1');
INSERT INTO `transaction_product_details` VALUES ('8', '7', '11', 'Khadi', '', '1393414056.png', '9.12', '1');
INSERT INTO `transaction_product_details` VALUES ('9', '8', '14', 'Test Product updated', '', '1393414056.png', '12.00', '1');
INSERT INTO `transaction_product_details` VALUES ('10', '9', '11', 'Khadi', '', '1393414056.png', '9.12', '1');
INSERT INTO `transaction_product_details` VALUES ('11', '10', '13', 'Test Product', '', '1393414056.png', '12.00', '1');
INSERT INTO `transaction_product_details` VALUES ('12', '11', '11', 'Khadi', '', '1393414056.png', '9.12', '1');
INSERT INTO `transaction_product_details` VALUES ('13', '12', '17', 'Valescere Cream', '', '1393414056.png', '69.95', '1');
INSERT INTO `transaction_product_details` VALUES ('14', '13', '17', 'Valescere Cream', '', '1393414056.png', '69.95', '3');
INSERT INTO `transaction_product_details` VALUES ('15', '14', '17', 'Valescere Cream', '', '1393414056.png', '69.95', '1');
INSERT INTO `transaction_product_details` VALUES ('16', '15', '16', 'Valescere Cream', '', '1393414056.png', '174.95', '1');
INSERT INTO `transaction_product_details` VALUES ('17', '16', '16', 'Valescere Cream', '', '1393414056.png', '174.95', '1');
INSERT INTO `transaction_product_details` VALUES ('18', '17', '16', 'Valescere Cream', '', '1393414056.png', '174.95', '1');
INSERT INTO `transaction_product_details` VALUES ('19', '18', '17', 'Valescere Cream', '', '1393414056.png', '69.95', '1');
INSERT INTO `transaction_product_details` VALUES ('20', '19', '15', 'Valescere Cream', '<ul>\r\n	<li>\r\n	<p dir=\"ltr\" id=\"docs-internal-guid-1768617d-6df0-db43-28eb-79d95fa29448\" style=\"line-height:1.15;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size: 15px; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; vertical-align: baseline;\">2 Month Daily Supply</span></p>\r\n	</li>\r\n	<li>\r\n	<p dir=\"ltr\" style=\"line-height:1.15;margin-top:0pt;margin-bottom:0pt;\"><span style=\"background-color: transparent; color: rgb(0, 0, 0); font-family: Arial; font-size: 15px; line-height: 1.15;\">&nbsp;Duo Pack</span></p>\r\n	</li>\r\n	<li>\r\n	<p dir=\"ltr\" style=\"line-height:1.15;margin-top:0pt;margin-bottom:0pt;\"><span style=\"background-color: transparent; color: rgb(0, 0, 0); font-family: Arial; font-size: 15px; line-height: 1.15;\">&nbsp; Free BB-XT55 Jumpstart E-book</span></p>\r\n	</li>\r\n	<li>\r\n	<p dir=\"ltr\" style=\"line-height:1.15;margin-top:0pt;margin-bottom:0pt;\"><span style=\"background-color: transparent; color: rgb(0, 0, 0); font-family: Arial; font-size: 15px; line-height: 1.15;\">&nbsp; Plus shipping and handling</span></p>\r\n	</li>\r\n	<li>\r\n	<p dir=\"ltr\" style=\"line-height:1.15;margin-top:0pt;margin-bottom:0pt;\"><span style=\"background-color: transparent; color: rgb(0, 0, 0); font-family: Arial; font-size: 15px; line-height: 1.15;\">&nbsp; 15 day money back guarantee</span></p>\r\n	</li>\r\n</ul>\r\n', '1393414056.png', '126.95', '1');
INSERT INTO `transaction_product_details` VALUES ('21', '20', '15', 'Valescere Cream', '<ul>\r\n	<li>\r\n	<p dir=\"ltr\" id=\"docs-internal-guid-1768617d-6df0-db43-28eb-79d95fa29448\" style=\"line-height:1.15;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size: 15px; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; vertical-align: baseline;\">2 Month Daily Supply</span></p>\r\n	</li>\r\n	<li>\r\n	<p dir=\"ltr\" style=\"line-height:1.15;margin-top:0pt;margin-bottom:0pt;\"><span style=\"background-color: transparent; color: rgb(0, 0, 0); font-family: Arial; font-size: 15px; line-height: 1.15;\">&nbsp;Duo Pack</span></p>\r\n	</li>\r\n	<li>\r\n	<p dir=\"ltr\" style=\"line-height:1.15;margin-top:0pt;margin-bottom:0pt;\"><span style=\"background-color: transparent; color: rgb(0, 0, 0); font-family: Arial; font-size: 15px; line-height: 1.15;\">&nbsp; Free BB-XT55 Jumpstart E-book</span></p>\r\n	</li>\r\n	<li>\r\n	<p dir=\"ltr\" style=\"line-height:1.15;margin-top:0pt;margin-bottom:0pt;\"><span style=\"background-color: transparent; color: rgb(0, 0, 0); font-family: Arial; font-size: 15px; line-height: 1.15;\">&nbsp; Plus shipping and handling</span></p>\r\n	</li>\r\n	<li>\r\n	<p dir=\"ltr\" style=\"line-height:1.15;margin-top:0pt;margin-bottom:0pt;\"><span style=\"background-color: transparent; color: rgb(0, 0, 0); font-family: Arial; font-size: 15px; line-height: 1.15;\">&nbsp; 15 day money back guarantee</span></p>\r\n	</li>\r\n</ul>\r\n', '1393413971.png', '126.95', '1');
INSERT INTO `transaction_product_details` VALUES ('22', '21', '16', 'Valescere Cream', '<ul>\r\n	<li>\r\n	<p dir=\"ltr\" id=\"docs-internal-guid-1768617d-6df3-64ba-3f8c-8a044b1b73c9\" style=\"line-height:1.15;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size: 15px; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; vertical-align: baseline;\">&nbsp;3 Month Daily Supply</span></p>\r\n	</li>\r\n	<li>\r\n	<p dir=\"ltr\" style=\"line-height:1.15;margin-top:0pt;margin-bottom:0pt;\"><span style=\"background-color: transparent; color: rgb(0, 0, 0); font-family: Arial; font-size: 15px; line-height: 1.15;\">&nbsp; Triple Threat</span></p>\r\n	</li>\r\n	<li>\r\n	<p dir=\"ltr\" style=\"line-height:1.15;margin-top:0pt;margin-bottom:0pt;\"><span style=\"background-color: transparent; color: rgb(0, 0, 0); font-family: Arial; font-size: 15px; line-height: 1.15;\">&nbsp; Free BB-XT55 Jumpstart E-book</span></p>\r\n	</li>\r\n	<li>\r\n	<p dir=\"ltr\" style=\"line-height:1.15;margin-top:0pt;margin-bottom:0pt;\"><span style=\"background-color: transparent; color: rgb(0, 0, 0); font-family: Arial; font-size: 15px; line-height: 1.15;\">&nbsp; Plus shipping and handling</span></p>\r\n	</li>\r\n	<li>\r\n	<p dir=\"ltr\" style=\"line-height:1.15;margin-top:0pt;margin-bottom:0pt;\"><span style=\"background-color: transparent; color: rgb(0, 0, 0); font-family: Arial; font-size: 15px; line-height: 1.15;\">&nbsp; 15 day money back guarantee</span></p>\r\n	</li>\r\n</ul>\r\n', '1393414056.png', '174.95', '1');
INSERT INTO `transaction_product_details` VALUES ('23', '22', '15', 'Valescere Cream', '<ul>\r\n	<li>\r\n	<p dir=\"ltr\" id=\"docs-internal-guid-1768617d-6df0-db43-28eb-79d95fa29448\" style=\"line-height:1.15;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size: 15px; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; vertical-align: baseline;\">2 Month Daily Supply</span></p>\r\n	</li>\r\n	<li>\r\n	<p dir=\"ltr\" style=\"line-height:1.15;margin-top:0pt;margin-bottom:0pt;\"><span style=\"background-color: transparent; color: rgb(0, 0, 0); font-family: Arial; font-size: 15px; line-height: 1.15;\">&nbsp;Duo Pack</span></p>\r\n	</li>\r\n	<li>\r\n	<p dir=\"ltr\" style=\"line-height:1.15;margin-top:0pt;margin-bottom:0pt;\"><span style=\"background-color: transparent; color: rgb(0, 0, 0); font-family: Arial; font-size: 15px; line-height: 1.15;\">&nbsp; Free BB-XT55 Jumpstart E-book</span></p>\r\n	</li>\r\n	<li>\r\n	<p dir=\"ltr\" style=\"line-height:1.15;margin-top:0pt;margin-bottom:0pt;\"><span style=\"background-color: transparent; color: rgb(0, 0, 0); font-family: Arial; font-size: 15px; line-height: 1.15;\">&nbsp; Plus shipping and handling</span></p>\r\n	</li>\r\n	<li>\r\n	<p dir=\"ltr\" style=\"line-height:1.15;margin-top:0pt;margin-bottom:0pt;\"><span style=\"background-color: transparent; color: rgb(0, 0, 0); font-family: Arial; font-size: 15px; line-height: 1.15;\">&nbsp; 15 day money back guarantee</span></p>\r\n	</li>\r\n</ul>\r\n', '1393413971.png', '126.95', '1');
INSERT INTO `transaction_product_details` VALUES ('24', '23', '17', 'Valescere Cream', '<ul>\r\n	<li>\r\n	<p dir=\"ltr\" style=\"line-height:1.15;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size: 15px; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; vertical-align: baseline;\">&nbsp;1 Month Daily Supply</span></p>\r\n	</li>\r\n	<li>\r\n	<p dir=\"ltr\" style=\"line-height:1.15;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size: 15px; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; vertical-align: baseline;\">&nbsp;Single Starter Pack</span></p>\r\n	</li>\r\n	<li>\r\n	<p dir=\"ltr\" style=\"line-height:1.15;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size: 15px; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; vertical-align: baseline;\">&nbsp;Free BB-XT55 Jumpstart E-book</span></p>\r\n	</li>\r\n	<li>\r\n	<p dir=\"ltr\" style=\"line-height:1.15;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size: 15px; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; vertical-align: baseline;\">&nbsp;Plus shipping and handling</span></p>\r\n	</li>\r\n	<li>\r\n	<p dir=\"ltr\" style=\"line-height:1.15;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size: 15px; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; vertical-align: baseline;\">&nbsp;15 day money back guarantee</span></p>\r\n	</li>\r\n</ul>\r\n', '1393413753.png', '69.95', '1');

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_manager
-- ----------------------------
INSERT INTO `user_manager` VALUES ('43', 'Saurav2', 'Affiliate', '1', 'saurav.affiliate@gmail.com', '05/19/1992', '978465', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 'Kalyani', 'Kolkata', '1686', '254', '1', '2', '8.50', '12.00', '13.75');
INSERT INTO `user_manager` VALUES ('42', 'Saurav', 'Hazra', '0', 'sauravhazare@gmail.com', '05/19/1992', '9874563210', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 'Kolkata', 'Kolkata', '47', '12', '1', '2', '0.00', '0.00', '0.00');
INSERT INTO `user_manager` VALUES ('41', 'TestFname', 'TestLname', '1', 'samsujj123@gmail.com', '05/30/1990', '7410258963', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 's sdf', 'Kolkata', '1692', '254', '0', '1', '0.00', '0.00', '0.00');
INSERT INTO `user_manager` VALUES ('39', 'vaskar', 'Chakraborty', '1', 'itplcc40@gmail.com', '02/12/2014', '1234566', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 'asdasda', 'kalyani', '9', '3', '1', '2', '0.00', '0.00', '0.00');
INSERT INTO `user_manager` VALUES ('40', 'Lannah', 'Ho', '0', 'lannahho@yahoo.com', '02/26/2014', '7142343917', '6bf9d274d4f3229c879db16bfad2ed02', '', '0', '', 'Las Vegas', '1685', '254', '0', '1', '0.00', '0.00', '0.00');
INSERT INTO `user_manager` VALUES ('38', 'bhaskar', 'chakraborty', '1', 'abc@abc.com', '02/12/2014', '1234567', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 'dgdrfgdg', 'sdfsf', '2', '2', '1', '2', '0.00', '0.00', '0.00');
INSERT INTO `user_manager` VALUES ('31', 'soumik', 'Das', '1', 'dsfsda07@gmail.com', '02/03/2014', '9874563210', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 'sdfs saf', 'Kolkata', '88', '18', '1', '2', '0.00', '0.00', '0.00');
INSERT INTO `user_manager` VALUES ('32', 'sibu', 'Das', '0', 'sibu@gmail.com', '02/10/2014', '94514', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 'asdfas', 'city', '81', '17', '1', '2', '0.00', '0.00', '0.00');
INSERT INTO `user_manager` VALUES ('33', 'sdfsd', 'sdfsd', '0', 'sdfsdsamsujj@gmail.com', '02/16/2014', '3423', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 'sdfsd sdf', 'sdfssdf', '9', '5', '0', '2', '0.00', '0.00', '0.00');
INSERT INTO `user_manager` VALUES ('34', 'Samsuj', 'Jaman', '1', 'samsdfssujj@gmail.com', '02/03/2014', '2131212', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 'sdfs sdfs sdf', 'Kolkata', '1', '1', '0', '1', '0.00', '0.00', '0.00');
INSERT INTO `user_manager` VALUES ('35', 'Samsuj2', 'Jaman', '1', 'sam44sujj@gmail.com', '02/03/2014', '2131212', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 'sdfs sdfs sdf', 'Kolkata', '1', '1', '0', '1', '0.00', '0.00', '0.00');
INSERT INTO `user_manager` VALUES ('36', 'Samsuj1', 'Jaman', '1', 'sasdfmsujj@gmail.com', '02/02/2014', '2131212', '96e79218965eb72c92a549dd5a330112', '', '0', 'dsfs sdf', 'Kolkata', '4', '3', '0', '2', '0.00', '0.00', '0.00');
INSERT INTO `user_manager` VALUES ('37', 'Amitava', 'Das', '1', 'samsujj@gmail.com', '02/02/2014', '2131212', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 'dsfs sdf', 'Kolkata', '4', '3', '1', '2', '12.00', '2.50', '13.14');
INSERT INTO `user_manager` VALUES ('44', 'Beto ', 'Paredes', '0', 'lannah@betoparedes.com', '05/26/1975', '7142343917', '84f3ea20769026be4b6512d3e0399832', '', '0', '451 crestdale lane apt#43', 'las vegas', '1706', '254', '0', '1', '0.00', '0.00', '0.00');
INSERT INTO `user_manager` VALUES ('45', 'Saurav', 'Hazra', '1', 'samsujj7654@gmail.com', '02/09/2014', '74653', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 'sd sdgfh', 'Kolkata', '82', '17', '0', '1', '0.00', '0.00', '0.00');
INSERT INTO `user_manager` VALUES ('46', 'Saurav44444', 'Hazra', '1', 'sauravhaz555are@gmail.com', '02/17/2014', '234236', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 'ggg gg', 'Kolkata', '9', '5', '0', '1', '0.00', '0.00', '0.00');
INSERT INTO `user_manager` VALUES ('47', 'Saurav44444', 'Hazra555', '1', 'sauravhzxczazare54@gmail.com', '02/17/2001', '234236', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 'dtgh sf', 'Saltlake', '657', '113', '1', '2', '13.50', '12.70', '1.25');
INSERT INTO `user_manager` VALUES ('48', 'Hit The workout', 'Chiz', '1', 'makkmansupreme@hotmail.com', '7/16/1987', '3104029351', '14a23c6bd8b2ca239fc59ee53fa56f07', '', '0', '5600 Spring Mtn Rd Ste 103', 'Las Vegas, NV', '1706', '254', '0', '1', '0.00', '0.00', '0.00');
INSERT INTO `user_manager` VALUES ('49', 'Crystal ', 'Ruston', '0', 'baybeeblu06@gmail.com', '10/01/84', '7024658496', '3b17f0285f1deac6aba24d22f81c530a', '', '0', '3878 Flickering Star Drive', 'Las Vegas', '1706', '254', '0', '1', '0.00', '0.00', '0.00');
INSERT INTO `user_manager` VALUES ('51', 'aaaa', 'aaaa', '1', 'debasis007@gmail.com', '03/12/2014', 'szfzfs', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 'sfsdg', 'xdbgdxb', '80', '17', '0', '1', '0.00', '0.00', '0.00');
INSERT INTO `user_manager` VALUES ('52', 'aaa', 'aaa', '1', 'debasiskar007@gmail.com', '03/12/2014', 'sasasa', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 'sfsf', 'dgsgs', '78', '17', '0', '1', '0.00', '0.00', '0.00');
INSERT INTO `user_manager` VALUES ('53', 'Jaclyn', 'wegner', '0', 'jacalingabinga@gmail.com', '02/18/2014', '702-883-4331', 'b763cc013edbc50656ac0a3614438900', '', '0', '6868 Skypointe Drive. 2107', 'Las Vegas', '1706', '254', '1', '2', '0.00', '0.00', '0.00');
INSERT INTO `user_manager` VALUES ('68', 'Bhas', 'Kar', '1', 'itplcc404@gmail.com', '01/06/2009', '53469456454', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 'rdsgedrfg', 'Kalyani', '27', '6', '1', '2', '0.00', '0.00', '0.00');
INSERT INTO `user_manager` VALUES ('69', 'gfdfg', 'dfgdfg', '1', 'bhaskar.involutiontech@gmail.com', '03/07/2014', '24324234', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 'fddghfd', 'dfhfgh', '8', '4', '0', '2', '0.00', '0.00', '0.00');

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
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

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
INSERT INTO `user_notes` VALUES ('32', null, 'sfcdzxc', '1392890603');
INSERT INTO `user_notes` VALUES ('33', '38', 'sdsadada', '1392890673');
INSERT INTO `user_notes` VALUES ('34', '38', 'sdsadada', '1392890741');
INSERT INTO `user_notes` VALUES ('35', '38', 'Bhaskar', '1393415831');

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_role_manager
-- ----------------------------
INSERT INTO `user_role_manager` VALUES ('1', 'Admin', '<p><strong>Admin</strong></p>\r\n', '1');
INSERT INTO `user_role_manager` VALUES ('2', 'Manager', '<p><u><em><strong><span style=\"color:#FF0000;\">Manager</span></strong></em></u> vhjsd <strong>vgsd </strong>fsd</p>\r\n', '1');
INSERT INTO `user_role_manager` VALUES ('3', 'Customer Care', '<p><span style=\"color:#FF0000;\">Customer</span> <span style=\"color:#0000FF;\">Care</span></p>\r\n', '1');
INSERT INTO `user_role_manager` VALUES ('10', 'User', '&lt;p&gt;User&lt;/p&gt;\r\n', '1');
INSERT INTO `user_role_manager` VALUES ('9', 'Affiliate', '<p>sdf sdfs</p>\r\n', '1');

-- ----------------------------
-- Table structure for `user_role_relation`
-- ----------------------------
DROP TABLE IF EXISTS `user_role_relation`;
CREATE TABLE `user_role_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_role_relation
-- ----------------------------
INSERT INTO `user_role_relation` VALUES ('16', '15', '1');
INSERT INTO `user_role_relation` VALUES ('35', '7', '9');
INSERT INTO `user_role_relation` VALUES ('34', '7', '2');
INSERT INTO `user_role_relation` VALUES ('8', '13', '1');
INSERT INTO `user_role_relation` VALUES ('12', '14', '3');
INSERT INTO `user_role_relation` VALUES ('15', '12', '2');
INSERT INTO `user_role_relation` VALUES ('17', '15', '2');
INSERT INTO `user_role_relation` VALUES ('18', '15', '9');
INSERT INTO `user_role_relation` VALUES ('19', '16', '1');
INSERT INTO `user_role_relation` VALUES ('20', '16', '2');
INSERT INTO `user_role_relation` VALUES ('21', '16', '9');
INSERT INTO `user_role_relation` VALUES ('22', '17', '1');
INSERT INTO `user_role_relation` VALUES ('23', '17', '2');
INSERT INTO `user_role_relation` VALUES ('24', '17', '3');
INSERT INTO `user_role_relation` VALUES ('25', '17', '9');
INSERT INTO `user_role_relation` VALUES ('26', '18', '10');
INSERT INTO `user_role_relation` VALUES ('27', '19', '10');
INSERT INTO `user_role_relation` VALUES ('28', '36', '9');
INSERT INTO `user_role_relation` VALUES ('29', '21', '3');
INSERT INTO `user_role_relation` VALUES ('30', '21', '10');
INSERT INTO `user_role_relation` VALUES ('31', '35', '9');
INSERT INTO `user_role_relation` VALUES ('36', '22', '10');
INSERT INTO `user_role_relation` VALUES ('37', '23', '10');
INSERT INTO `user_role_relation` VALUES ('38', '24', '10');
INSERT INTO `user_role_relation` VALUES ('39', '25', '10');
INSERT INTO `user_role_relation` VALUES ('40', '26', '10');
INSERT INTO `user_role_relation` VALUES ('41', '37', '9');
INSERT INTO `user_role_relation` VALUES ('42', '28', '10');
INSERT INTO `user_role_relation` VALUES ('43', '29', '10');
INSERT INTO `user_role_relation` VALUES ('44', '30', '10');
INSERT INTO `user_role_relation` VALUES ('45', '31', '1');
INSERT INTO `user_role_relation` VALUES ('46', '31', '10');
INSERT INTO `user_role_relation` VALUES ('47', '32', '10');
INSERT INTO `user_role_relation` VALUES ('48', '33', '10');
INSERT INTO `user_role_relation` VALUES ('49', '34', '10');
INSERT INTO `user_role_relation` VALUES ('50', '35', '10');
INSERT INTO `user_role_relation` VALUES ('51', '36', '1');
INSERT INTO `user_role_relation` VALUES ('52', '36', '2');
INSERT INTO `user_role_relation` VALUES ('53', '36', '3');
INSERT INTO `user_role_relation` VALUES ('54', '37', '1');
INSERT INTO `user_role_relation` VALUES ('55', '37', '2');
INSERT INTO `user_role_relation` VALUES ('56', '37', '3');
INSERT INTO `user_role_relation` VALUES ('57', '38', '10');
INSERT INTO `user_role_relation` VALUES ('58', '39', '1');
INSERT INTO `user_role_relation` VALUES ('59', '40', '10');
INSERT INTO `user_role_relation` VALUES ('60', '41', '10');
INSERT INTO `user_role_relation` VALUES ('61', '42', '10');
INSERT INTO `user_role_relation` VALUES ('62', '43', '9');
INSERT INTO `user_role_relation` VALUES ('63', '44', '9');
INSERT INTO `user_role_relation` VALUES ('64', '45', '9');
INSERT INTO `user_role_relation` VALUES ('65', '46', '10');
INSERT INTO `user_role_relation` VALUES ('66', '47', '10');
INSERT INTO `user_role_relation` VALUES ('67', '47', '9');
INSERT INTO `user_role_relation` VALUES ('68', '48', '9');
INSERT INTO `user_role_relation` VALUES ('69', '49', '10');
INSERT INTO `user_role_relation` VALUES ('70', '50', '10');
INSERT INTO `user_role_relation` VALUES ('71', '51', '10');
INSERT INTO `user_role_relation` VALUES ('72', '52', '10');
INSERT INTO `user_role_relation` VALUES ('73', '53', '9');
INSERT INTO `user_role_relation` VALUES ('74', '54', '9');
INSERT INTO `user_role_relation` VALUES ('75', '55', '9');
INSERT INTO `user_role_relation` VALUES ('76', '56', '9');
INSERT INTO `user_role_relation` VALUES ('77', '57', '9');
INSERT INTO `user_role_relation` VALUES ('78', '58', '9');
INSERT INTO `user_role_relation` VALUES ('79', '59', '9');
INSERT INTO `user_role_relation` VALUES ('80', '60', '9');
INSERT INTO `user_role_relation` VALUES ('81', '61', '9');
INSERT INTO `user_role_relation` VALUES ('82', '62', '9');
INSERT INTO `user_role_relation` VALUES ('83', '63', '9');
INSERT INTO `user_role_relation` VALUES ('84', '64', '9');
INSERT INTO `user_role_relation` VALUES ('85', '65', '9');
INSERT INTO `user_role_relation` VALUES ('86', '66', '9');
INSERT INTO `user_role_relation` VALUES ('87', '67', '9');
INSERT INTO `user_role_relation` VALUES ('88', '68', '10');
INSERT INTO `user_role_relation` VALUES ('89', '69', '9');

-- ----------------------------
-- View structure for `vw_total_cpc`
-- ----------------------------
DROP VIEW IF EXISTS `vw_total_cpc`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_total_cpc` AS select `affiliate_per_click`.`affiliate_code` AS `affiliate_code`,count(0) AS `tot_cpc` from `affiliate_per_click` group by `affiliate_per_click`.`affiliate_code` ;

-- ----------------------------
-- Procedure structure for `common2`
-- ----------------------------
DROP PROCEDURE IF EXISTS `common2`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `common2`(tablename VARCHAR(50),attr_name VARCHAR(50),pk VARCHAR(255),i_block_id BIGINT(255))
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
