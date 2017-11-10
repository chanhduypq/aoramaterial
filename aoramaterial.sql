/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : aoramaterial

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-11-10 15:02:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for aoramaterial
-- ----------------------------
DROP TABLE IF EXISTS `aoramaterial`;
CREATE TABLE `aoramaterial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` double(11,2) DEFAULT NULL,
  `price_retail` double(11,2) DEFAULT NULL,
  `currency` varchar(10) DEFAULT NULL,
  `main_image` varchar(255) DEFAULT NULL,
  `other_image` varchar(255) DEFAULT NULL,
  `main_category` varchar(255) DEFAULT NULL,
  `sub_category` varchar(255) DEFAULT NULL,
  `sub_sub_category` varchar(255) DEFAULT NULL,
  `variant_specifics_url` varchar(255) DEFAULT NULL,
  `product_details` varchar(255) DEFAULT NULL,
  `shipping_weight` double(11,2) DEFAULT NULL,
  `shipping_length` double(11,2) DEFAULT NULL,
  `shipping_width` double(11,2) DEFAULT NULL,
  `shipping_height` double(11,2) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of aoramaterial
-- ----------------------------

-- ----------------------------
-- Table structure for currency
-- ----------------------------
DROP TABLE IF EXISTS `currency`;
CREATE TABLE `currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `value` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=164 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of currency
-- ----------------------------
INSERT INTO `currency` VALUES ('2', 'United Arab Emirates Dirham', 'AED');
INSERT INTO `currency` VALUES ('3', 'Afghanistan Afghani', 'AFN');
INSERT INTO `currency` VALUES ('4', 'Albania Lek', 'ALL');
INSERT INTO `currency` VALUES ('5', 'Armenia Dram', 'AMD');
INSERT INTO `currency` VALUES ('6', 'Netherlands Antilles Guilder', 'ANG');
INSERT INTO `currency` VALUES ('7', 'Angola Kwanza', 'AOA');
INSERT INTO `currency` VALUES ('8', 'Argentina Peso', 'ARS');
INSERT INTO `currency` VALUES ('9', 'Australia Dollar', 'AUD');
INSERT INTO `currency` VALUES ('10', 'Aruba Guilder', 'AWG');
INSERT INTO `currency` VALUES ('11', 'Azerbaijan Manat', 'AZN');
INSERT INTO `currency` VALUES ('12', 'Bosnia and Herzegovina Convertible Marka', 'BAM');
INSERT INTO `currency` VALUES ('13', 'Barbados Dollar', 'BBD');
INSERT INTO `currency` VALUES ('14', 'Bangladesh Taka', 'BDT');
INSERT INTO `currency` VALUES ('15', 'Bulgaria Lev', 'BGN');
INSERT INTO `currency` VALUES ('16', 'Bahrain Dinar', 'BHD');
INSERT INTO `currency` VALUES ('17', 'Burundi Franc', 'BIF');
INSERT INTO `currency` VALUES ('18', 'Bermuda Dollar', 'BMD');
INSERT INTO `currency` VALUES ('19', 'Brunei Darussalam Dollar', 'BND');
INSERT INTO `currency` VALUES ('20', 'Bolivia Bol&#237;viano', 'BOB');
INSERT INTO `currency` VALUES ('21', 'Brazil Real', 'BRL');
INSERT INTO `currency` VALUES ('22', 'Bahamas Dollar', 'BSD');
INSERT INTO `currency` VALUES ('23', 'Bhutan Ngultrum', 'BTN');
INSERT INTO `currency` VALUES ('24', 'Botswana Pula', 'BWP');
INSERT INTO `currency` VALUES ('25', 'Belarus Ruble', 'BYN');
INSERT INTO `currency` VALUES ('26', 'Belize Dollar', 'BZD');
INSERT INTO `currency` VALUES ('27', 'Canada Dollar', 'CAD');
INSERT INTO `currency` VALUES ('28', 'Congo/Kinshasa Franc', 'CDF');
INSERT INTO `currency` VALUES ('29', 'Switzerland Franc', 'CHF');
INSERT INTO `currency` VALUES ('30', 'Chile Peso', 'CLP');
INSERT INTO `currency` VALUES ('31', 'China Yuan Renminbi', 'CNY');
INSERT INTO `currency` VALUES ('32', 'Colombia Peso', 'COP');
INSERT INTO `currency` VALUES ('33', 'Costa Rica Colon', 'CRC');
INSERT INTO `currency` VALUES ('34', 'Cuba Convertible Peso', 'CUC');
INSERT INTO `currency` VALUES ('35', 'Cuba Peso', 'CUP');
INSERT INTO `currency` VALUES ('36', 'Cape Verde Escudo', 'CVE');
INSERT INTO `currency` VALUES ('37', 'Czech Republic Koruna', 'CZK');
INSERT INTO `currency` VALUES ('38', 'Djibouti Franc', 'DJF');
INSERT INTO `currency` VALUES ('39', 'Denmark Krone', 'DKK');
INSERT INTO `currency` VALUES ('40', 'Dominican Republic Peso', 'DOP');
INSERT INTO `currency` VALUES ('41', 'Algeria Dinar', 'DZD');
INSERT INTO `currency` VALUES ('42', 'Egypt Pound', 'EGP');
INSERT INTO `currency` VALUES ('43', 'Eritrea Nakfa', 'ERN');
INSERT INTO `currency` VALUES ('44', 'Ethiopia Birr', 'ETB');
INSERT INTO `currency` VALUES ('45', 'Euro Member Countries', 'EUR');
INSERT INTO `currency` VALUES ('46', 'Fiji Dollar', 'FJD');
INSERT INTO `currency` VALUES ('47', 'Falkland Islands (Malvinas) Pound', 'FKP');
INSERT INTO `currency` VALUES ('48', 'United Kingdom Pound', 'GBP');
INSERT INTO `currency` VALUES ('49', 'Georgia Lari', 'GEL');
INSERT INTO `currency` VALUES ('50', 'Guernsey Pound', 'GGP');
INSERT INTO `currency` VALUES ('51', 'Ghana Cedi', 'GHS');
INSERT INTO `currency` VALUES ('52', 'Gibraltar Pound', 'GIP');
INSERT INTO `currency` VALUES ('53', 'Gambia Dalasi', 'GMD');
INSERT INTO `currency` VALUES ('54', 'Guinea Franc', 'GNF');
INSERT INTO `currency` VALUES ('55', 'Guatemala Quetzal', 'GTQ');
INSERT INTO `currency` VALUES ('56', 'Guyana Dollar', 'GYD');
INSERT INTO `currency` VALUES ('57', 'Hong Kong Dollar', 'HKD');
INSERT INTO `currency` VALUES ('58', 'Honduras Lempira', 'HNL');
INSERT INTO `currency` VALUES ('59', 'Croatia Kuna', 'HRK');
INSERT INTO `currency` VALUES ('60', 'Haiti Gourde', 'HTG');
INSERT INTO `currency` VALUES ('61', 'Hungary Forint', 'HUF');
INSERT INTO `currency` VALUES ('62', 'Indonesia Rupiah', 'IDR');
INSERT INTO `currency` VALUES ('63', 'Israel Shekel', 'ILS');
INSERT INTO `currency` VALUES ('64', 'Isle of Man Pound', 'IMP');
INSERT INTO `currency` VALUES ('65', 'India Rupee', 'INR');
INSERT INTO `currency` VALUES ('66', 'Iraq Dinar', 'IQD');
INSERT INTO `currency` VALUES ('67', 'Iran Rial', 'IRR');
INSERT INTO `currency` VALUES ('68', 'Iceland Krona', 'ISK');
INSERT INTO `currency` VALUES ('69', 'Jersey Pound', 'JEP');
INSERT INTO `currency` VALUES ('70', 'Jamaica Dollar', 'JMD');
INSERT INTO `currency` VALUES ('71', 'Jordan Dinar', 'JOD');
INSERT INTO `currency` VALUES ('72', 'Japan Yen', 'JPY');
INSERT INTO `currency` VALUES ('73', 'Kenya Shilling', 'KES');
INSERT INTO `currency` VALUES ('74', 'Kyrgyzstan Som', 'KGS');
INSERT INTO `currency` VALUES ('75', 'Cambodia Riel', 'KHR');
INSERT INTO `currency` VALUES ('76', 'Comorian Franc', 'KMF');
INSERT INTO `currency` VALUES ('77', 'Korea (North) Won', 'KPW');
INSERT INTO `currency` VALUES ('78', 'Korea (South) Won', 'KRW');
INSERT INTO `currency` VALUES ('79', 'Kuwait Dinar', 'KWD');
INSERT INTO `currency` VALUES ('80', 'Cayman Islands Dollar', 'KYD');
INSERT INTO `currency` VALUES ('81', 'Kazakhstan Tenge', 'KZT');
INSERT INTO `currency` VALUES ('82', 'Laos Kip', 'LAK');
INSERT INTO `currency` VALUES ('83', 'Lebanon Pound', 'LBP');
INSERT INTO `currency` VALUES ('84', 'Sri Lanka Rupee', 'LKR');
INSERT INTO `currency` VALUES ('85', 'Liberia Dollar', 'LRD');
INSERT INTO `currency` VALUES ('86', 'Lesotho Loti', 'LSL');
INSERT INTO `currency` VALUES ('87', 'Libya Dinar', 'LYD');
INSERT INTO `currency` VALUES ('88', 'Morocco Dirham', 'MAD');
INSERT INTO `currency` VALUES ('89', 'Moldova Leu', 'MDL');
INSERT INTO `currency` VALUES ('90', 'Madagascar Ariary', 'MGA');
INSERT INTO `currency` VALUES ('91', 'Macedonia Denar', 'MKD');
INSERT INTO `currency` VALUES ('92', 'Myanmar (Burma) Kyat', 'MMK');
INSERT INTO `currency` VALUES ('93', 'Mongolia Tughrik', 'MNT');
INSERT INTO `currency` VALUES ('94', 'Macau Pataca', 'MOP');
INSERT INTO `currency` VALUES ('95', 'Mauritania Ouguiya', 'MRO');
INSERT INTO `currency` VALUES ('96', 'Mauritius Rupee', 'MUR');
INSERT INTO `currency` VALUES ('97', 'Maldives (Maldive Islands) Rufiyaa', 'MVR');
INSERT INTO `currency` VALUES ('98', 'Malawi Kwacha', 'MWK');
INSERT INTO `currency` VALUES ('99', 'Mexico Peso', 'MXN');
INSERT INTO `currency` VALUES ('100', 'Malaysia Ringgit', 'MYR');
INSERT INTO `currency` VALUES ('101', 'Mozambique Metical', 'MZN');
INSERT INTO `currency` VALUES ('102', 'Namibia Dollar', 'NAD');
INSERT INTO `currency` VALUES ('103', 'Nigeria Naira', 'NGN');
INSERT INTO `currency` VALUES ('104', 'Nicaragua Cordoba', 'NIO');
INSERT INTO `currency` VALUES ('105', 'Norway Krone', 'NOK');
INSERT INTO `currency` VALUES ('106', 'Nepal Rupee', 'NPR');
INSERT INTO `currency` VALUES ('107', 'New Zealand Dollar', 'NZD');
INSERT INTO `currency` VALUES ('108', 'Oman Rial', 'OMR');
INSERT INTO `currency` VALUES ('109', 'Panama Balboa', 'PAB');
INSERT INTO `currency` VALUES ('110', 'Peru Sol', 'PEN');
INSERT INTO `currency` VALUES ('111', 'Papua New Guinea Kina', 'PGK');
INSERT INTO `currency` VALUES ('112', 'Philippines Peso', 'PHP');
INSERT INTO `currency` VALUES ('113', 'Pakistan Rupee', 'PKR');
INSERT INTO `currency` VALUES ('114', 'Poland Zloty', 'PLN');
INSERT INTO `currency` VALUES ('115', 'Paraguay Guarani', 'PYG');
INSERT INTO `currency` VALUES ('116', 'Qatar Riyal', 'QAR');
INSERT INTO `currency` VALUES ('117', 'Romania Leu', 'RON');
INSERT INTO `currency` VALUES ('118', 'Serbia Dinar', 'RSD');
INSERT INTO `currency` VALUES ('119', 'Russia Ruble', 'RUB');
INSERT INTO `currency` VALUES ('120', 'Rwanda Franc', 'RWF');
INSERT INTO `currency` VALUES ('121', 'Saudi Arabia Riyal', 'SAR');
INSERT INTO `currency` VALUES ('122', 'Solomon Islands Dollar', 'SBD');
INSERT INTO `currency` VALUES ('123', 'Seychelles Rupee', 'SCR');
INSERT INTO `currency` VALUES ('124', 'Sudan Pound', 'SDG');
INSERT INTO `currency` VALUES ('125', 'Sweden Krona', 'SEK');
INSERT INTO `currency` VALUES ('126', 'Singapore Dollar', 'SGD');
INSERT INTO `currency` VALUES ('127', 'Saint Helena Pound', 'SHP');
INSERT INTO `currency` VALUES ('128', 'Sierra Leone Leone', 'SLL');
INSERT INTO `currency` VALUES ('129', 'Somalia Shilling', 'SOS');
INSERT INTO `currency` VALUES ('130', 'Seborga Luigino', 'SPL*');
INSERT INTO `currency` VALUES ('131', 'Suriname Dollar', 'SRD');
INSERT INTO `currency` VALUES ('132', 'S&#227;o Tom&#233; and Pr&#237;ncipe Dobra', 'STD');
INSERT INTO `currency` VALUES ('133', 'El Salvador Colon', 'SVC');
INSERT INTO `currency` VALUES ('134', 'Syria Pound', 'SYP');
INSERT INTO `currency` VALUES ('135', 'Swaziland Lilangeni', 'SZL');
INSERT INTO `currency` VALUES ('136', 'Thailand Baht', 'THB');
INSERT INTO `currency` VALUES ('137', 'Tajikistan Somoni', 'TJS');
INSERT INTO `currency` VALUES ('138', 'Turkmenistan Manat', 'TMT');
INSERT INTO `currency` VALUES ('139', 'Tunisia Dinar', 'TND');
INSERT INTO `currency` VALUES ('140', 'Tonga Pa&#039;anga', 'TOP');
INSERT INTO `currency` VALUES ('141', 'Turkey Lira', 'TRY');
INSERT INTO `currency` VALUES ('142', 'Trinidad and Tobago Dollar', 'TTD');
INSERT INTO `currency` VALUES ('143', 'Tuvalu Dollar', 'TVD');
INSERT INTO `currency` VALUES ('144', 'Taiwan New Dollar', 'TWD');
INSERT INTO `currency` VALUES ('145', 'Tanzania Shilling', 'TZS');
INSERT INTO `currency` VALUES ('146', 'Ukraine Hryvnia', 'UAH');
INSERT INTO `currency` VALUES ('147', 'Uganda Shilling', 'UGX');
INSERT INTO `currency` VALUES ('148', 'United States Dollar', 'USD');
INSERT INTO `currency` VALUES ('149', 'Uruguay Peso', 'UYU');
INSERT INTO `currency` VALUES ('150', 'Uzbekistan Som', 'UZS');
INSERT INTO `currency` VALUES ('151', 'Venezuela Bol&#237;var', 'VEF');
INSERT INTO `currency` VALUES ('152', 'Viet Nam Dong', 'VND');
INSERT INTO `currency` VALUES ('153', 'Vanuatu Vatu', 'VUV');
INSERT INTO `currency` VALUES ('154', 'Samoa Tala', 'WST');
INSERT INTO `currency` VALUES ('155', 'Communaut&#233; Financi&#232;re Africaine (BEAC) CFA Franc BEAC', 'XAF');
INSERT INTO `currency` VALUES ('156', 'East Caribbean Dollar', 'XCD');
INSERT INTO `currency` VALUES ('157', 'International Monetary Fund (IMF) Special Drawing Rights', 'XDR');
INSERT INTO `currency` VALUES ('158', 'Communaut&#233; Financi&#232;re Africaine (BCEAO) Franc', 'XOF');
INSERT INTO `currency` VALUES ('159', 'Comptoirs Fran&#231;ais du Pacifique (CFP) Franc', 'XPF');
INSERT INTO `currency` VALUES ('160', 'Yemen Rial', 'YER');
INSERT INTO `currency` VALUES ('161', 'South Africa Rand', 'ZAR');
INSERT INTO `currency` VALUES ('162', 'Zambia Kwacha', 'ZMW');
INSERT INTO `currency` VALUES ('163', 'Zimbabwe Dollar', 'ZWD');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('20', 'admin@example.com', '7c4a8d09ca3762af61e59520943dc26494f8941b');
