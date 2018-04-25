/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50553
Source Host           : 127.0.0.1:3306
Source Database       : domaincms

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-04-25 14:29:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `yuming_category`
-- ----------------------------
DROP TABLE IF EXISTS `yuming_category`;
CREATE TABLE `yuming_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) DEFAULT NULL COMMENT '分类名称',
  `category_title` varchar(255) DEFAULT NULL,
  `category_keywords` varchar(255) DEFAULT NULL,
  `category_description` varchar(255) DEFAULT NULL,
  `category_content` text COMMENT '分类内容',
  `category_order` int(11) DEFAULT '0' COMMENT '分类排序',
  `category_node` int(11) DEFAULT '0' COMMENT '分类等级',
  `category_date` datetime DEFAULT NULL COMMENT '添加时间',
  `category_update` datetime DEFAULT NULL COMMENT '修改时间',
  `category_status` int(11) DEFAULT '1' COMMENT '1、开启2、关闭 分类状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yuming_category
-- ----------------------------
INSERT INTO `yuming_category` VALUES ('1', 'CN域名', 'CN域名', '发我e', '问', null, '0', null, null, '2016-03-12 14:46:04', '2');
INSERT INTO `yuming_category` VALUES ('16', 'COM域名', '微米吧，域名交流平台-免责声明', '免责声明，微米吧，域名，域名交易，域名注册', '暗示法三大', null, '0', null, '2016-03-12 14:31:08', null, '2');
INSERT INTO `yuming_category` VALUES ('17', 'VC域名', 'VC域名，风投最佳域名', '域名，VC域名', 'VC域名，风投最佳域名', null, '0', null, '2016-03-12 22:37:35', null, '2');
INSERT INTO `yuming_category` VALUES ('18', 'LC域名', 'LC域名', 'LC域名', 'LC域名', null, '0', null, '2016-03-12 22:38:47', null, '2');
INSERT INTO `yuming_category` VALUES ('19', '7数COM', '7数COM，域名电话域名', 'COM 域名', '', null, '0', null, '2016-03-18 19:57:51', null, '2');
INSERT INTO `yuming_category` VALUES ('20', '8数COM', 'COM，域名，8数电话号码域名', 'COM，域名', '', null, '0', null, '2016-03-18 19:58:28', null, '2');
INSERT INTO `yuming_category` VALUES ('21', '三拼域名', '三拼域名，终端最广的域名品种', '域名,三拼,终端,三拼域名', '三拼域名，终端最广的域名品种', null, '0', null, '2016-03-26 11:41:50', null, '1');
INSERT INTO `yuming_category` VALUES ('22', 'CC域名', 'CC域名，短小精悍易记', 'cc 域名 cc域名', 'cc域名 又短好记的域名', null, '0', null, '2016-05-03 09:08:51', null, '1');

-- ----------------------------
-- Table structure for `yuming_friend`
-- ----------------------------
DROP TABLE IF EXISTS `yuming_friend`;
CREATE TABLE `yuming_friend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `friend_name` varchar(155) DEFAULT NULL,
  `friend_link` varchar(155) DEFAULT NULL,
  `friend_addtime` datetime DEFAULT NULL,
  `friend_sort` int(11) DEFAULT '0',
  `friend_uptime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yuming_friend
-- ----------------------------
INSERT INTO `yuming_friend` VALUES ('2', 'GMIC米表', 'http://www.gmic.cc', '2016-03-12 14:27:54', '3', '2017-08-20 21:50:02');

-- ----------------------------
-- Table structure for `yuming_label`
-- ----------------------------
DROP TABLE IF EXISTS `yuming_label`;
CREATE TABLE `yuming_label` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label_node` int(11) DEFAULT '0' COMMENT '0表示顶级',
  `label_name` varchar(255) DEFAULT NULL COMMENT '标签名称',
  `label_type` int(11) DEFAULT '0' COMMENT '标签类型1、省份2、分类',
  `label_order` int(11) DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yuming_label
-- ----------------------------
INSERT INTO `yuming_label` VALUES ('1', '0', '北京市', '1', '35');
INSERT INTO `yuming_label` VALUES ('2', '0', '天津市', '1', '34');
INSERT INTO `yuming_label` VALUES ('3', '0', '上海市', '1', '33');
INSERT INTO `yuming_label` VALUES ('4', '0', '重庆市', '1', '32');
INSERT INTO `yuming_label` VALUES ('5', '0', '河北省', '1', '31');
INSERT INTO `yuming_label` VALUES ('6', '0', '山西省', '1', '30');
INSERT INTO `yuming_label` VALUES ('7', '0', '内蒙古自治区', '1', '3');
INSERT INTO `yuming_label` VALUES ('8', '0', '黑龙江省', '1', '29');
INSERT INTO `yuming_label` VALUES ('9', '0', '吉林省', '1', '28');
INSERT INTO `yuming_label` VALUES ('10', '0', '辽宁省', '1', '27');
INSERT INTO `yuming_label` VALUES ('11', '0', '江苏省', '1', '26');
INSERT INTO `yuming_label` VALUES ('12', '0', '浙江省', '1', '25');
INSERT INTO `yuming_label` VALUES ('13', '0', '安徽省', '1', '24');
INSERT INTO `yuming_label` VALUES ('14', '0', '福建省', '1', '23');
INSERT INTO `yuming_label` VALUES ('15', '0', '江西省', '1', '22');
INSERT INTO `yuming_label` VALUES ('16', '0', '山东省', '1', '21');
INSERT INTO `yuming_label` VALUES ('17', '0', '河南省', '1', '20');
INSERT INTO `yuming_label` VALUES ('18', '0', '湖北省', '1', '19');
INSERT INTO `yuming_label` VALUES ('19', '0', '湖南省', '1', '18');
INSERT INTO `yuming_label` VALUES ('20', '0', '广东省', '1', '17');
INSERT INTO `yuming_label` VALUES ('21', '0', '广西壮族自治区', '1', '4');
INSERT INTO `yuming_label` VALUES ('22', '0', '海南省', '1', '16');
INSERT INTO `yuming_label` VALUES ('23', '0', '贵州省', '1', '15');
INSERT INTO `yuming_label` VALUES ('24', '0', '四川省', '1', '14');
INSERT INTO `yuming_label` VALUES ('25', '0', '云南省', '1', '13');
INSERT INTO `yuming_label` VALUES ('26', '0', '西藏自治区', '1', '2');
INSERT INTO `yuming_label` VALUES ('27', '0', '陕西省', '1', '12');
INSERT INTO `yuming_label` VALUES ('28', '0', '甘肃省', '1', '11');
INSERT INTO `yuming_label` VALUES ('29', '0', '青海省', '1', '10');
INSERT INTO `yuming_label` VALUES ('30', '0', '宁夏回族自治区', '1', '5');
INSERT INTO `yuming_label` VALUES ('31', '0', '新疆维吾尔自治区', '1', '6');
INSERT INTO `yuming_label` VALUES ('32', '0', '台湾省', '1', '9');
INSERT INTO `yuming_label` VALUES ('33', '0', '香港', '1', '8');
INSERT INTO `yuming_label` VALUES ('34', '0', '澳门', '1', '7');
INSERT INTO `yuming_label` VALUES ('35', '0', '其它', '1', '0');
INSERT INTO `yuming_label` VALUES ('36', '0', '单数字', '2', '15');
INSERT INTO `yuming_label` VALUES ('37', '0', '双数字', '2', '16');
INSERT INTO `yuming_label` VALUES ('38', '0', '三数字', '2', '17');
INSERT INTO `yuming_label` VALUES ('39', '0', '四数字', '2', '18');
INSERT INTO `yuming_label` VALUES ('40', '0', '五数字', '2', '19');
INSERT INTO `yuming_label` VALUES ('41', '0', '单字母', '2', '20');
INSERT INTO `yuming_label` VALUES ('42', '0', '双字母', '2', '21');
INSERT INTO `yuming_label` VALUES ('43', '0', '三字母', '2', '22');
INSERT INTO `yuming_label` VALUES ('44', '0', '四字母', '2', '23');
INSERT INTO `yuming_label` VALUES ('45', '0', '五字母', '2', '24');
INSERT INTO `yuming_label` VALUES ('46', '0', '单拼', '2', '25');
INSERT INTO `yuming_label` VALUES ('47', '0', '双拼', '2', '26');
INSERT INTO `yuming_label` VALUES ('48', '0', '三拼', '2', '27');
INSERT INTO `yuming_label` VALUES ('49', '0', '四拼', '2', '28');
INSERT INTO `yuming_label` VALUES ('50', '0', '两杂', '2', '29');
INSERT INTO `yuming_label` VALUES ('51', '0', '三杂', '2', '30');
INSERT INTO `yuming_label` VALUES ('52', '0', '中文', '2', '31');
INSERT INTO `yuming_label` VALUES ('53', '0', '.com', '3', '1');
INSERT INTO `yuming_label` VALUES ('54', '0', '.cn', '3', '2');
INSERT INTO `yuming_label` VALUES ('55', '0', '.net', '3', '3');
INSERT INTO `yuming_label` VALUES ('56', '0', '.com.cn', '3', '4');
INSERT INTO `yuming_label` VALUES ('57', '0', '.cc', '3', '5');
INSERT INTO `yuming_label` VALUES ('58', '0', '.org', '3', '6');
INSERT INTO `yuming_label` VALUES ('59', '0', '.info', '3', '7');
INSERT INTO `yuming_label` VALUES ('60', '0', '.tv', '3', '8');
INSERT INTO `yuming_label` VALUES ('61', '0', '.me', '3', '9');
INSERT INTO `yuming_label` VALUES ('62', '0', '.wang', '3', '10');
INSERT INTO `yuming_label` VALUES ('63', '0', '.in', '3', '11');
INSERT INTO `yuming_label` VALUES ('64', '0', '.net.cn', '3', '12');
INSERT INTO `yuming_label` VALUES ('65', '0', '.中国', '3', '13');
INSERT INTO `yuming_label` VALUES ('66', '0', '.公司', '3', '14');
INSERT INTO `yuming_label` VALUES ('67', '0', '母婴', '4', '0');
INSERT INTO `yuming_label` VALUES ('68', '0', '房地产', '4', '0');
INSERT INTO `yuming_label` VALUES ('69', '0', '汽车', '4', '0');
INSERT INTO `yuming_label` VALUES ('70', '0', '互联网', '4', '0');
INSERT INTO `yuming_label` VALUES ('71', '0', '社区', '4', '0');
INSERT INTO `yuming_label` VALUES ('72', '0', '游戏', '4', '0');
INSERT INTO `yuming_label` VALUES ('73', '0', '电商', '4', '0');
INSERT INTO `yuming_label` VALUES ('74', '0', '金融理财', '4', '0');
INSERT INTO `yuming_label` VALUES ('75', '0', '教育', '4', '0');
INSERT INTO `yuming_label` VALUES ('76', '0', '女性', '4', '0');
INSERT INTO `yuming_label` VALUES ('77', '0', '农业', '4', '0');
INSERT INTO `yuming_label` VALUES ('78', '0', '人才', '4', '0');
INSERT INTO `yuming_label` VALUES ('79', '0', '婚恋', '4', '0');
INSERT INTO `yuming_label` VALUES ('80', '0', '旅游', '4', '0');
INSERT INTO `yuming_label` VALUES ('81', '0', '美食', '4', '0');
INSERT INTO `yuming_label` VALUES ('82', '0', '娱乐', '4', '0');
INSERT INTO `yuming_label` VALUES ('83', '0', '商号', '4', '0');
INSERT INTO `yuming_label` VALUES ('84', '0', '医疗健康', '4', '0');
INSERT INTO `yuming_label` VALUES ('85', '0', 'REG.CN', '5', '0');
INSERT INTO `yuming_label` VALUES ('86', '0', '易名', '5', '0');
INSERT INTO `yuming_label` VALUES ('87', '0', '爱名', '5', '0');
INSERT INTO `yuming_label` VALUES ('88', '0', '万网', '5', '0');
INSERT INTO `yuming_label` VALUES ('89', '0', '新网', '5', '0');
INSERT INTO `yuming_label` VALUES ('90', '0', 'Hostsir', '5', '0');
INSERT INTO `yuming_label` VALUES ('91', '0', '西部数码', '5', '0');
INSERT INTO `yuming_label` VALUES ('92', '0', '美橙互联', '5', '0');
INSERT INTO `yuming_label` VALUES ('93', '0', '999', '5', '0');
INSERT INTO `yuming_label` VALUES ('94', '0', 'Godaddy', '5', '0');

-- ----------------------------
-- Table structure for `yuming_master`
-- ----------------------------
DROP TABLE IF EXISTS `yuming_master`;
CREATE TABLE `yuming_master` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(120) DEFAULT NULL COMMENT '登陆账号',
  `email` varchar(255) DEFAULT NULL COMMENT '邮箱',
  `phone` varchar(120) DEFAULT NULL COMMENT '电话',
  `password` varchar(120) DEFAULT NULL COMMENT '密码',
  `privs` int(11) DEFAULT NULL COMMENT '权限',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yuming_master
-- ----------------------------
INSERT INTO `yuming_master` VALUES ('1', 'admin', 'admin@ago.vc', '', '96e79218965eb72c92a549dd5a330112', '1');

-- ----------------------------
-- Table structure for `yuming_news`
-- ----------------------------
DROP TABLE IF EXISTS `yuming_news`;
CREATE TABLE `yuming_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(255) DEFAULT NULL COMMENT '标题',
  `news_content` text COMMENT '内容',
  `news_source` varchar(120) DEFAULT NULL COMMENT '新闻来源',
  `news_date` datetime DEFAULT NULL COMMENT '时间',
  `news_click` int(11) DEFAULT '0' COMMENT '点击数',
  `news_recommend` smallint(4) DEFAULT '2' COMMENT '1、推荐2、不推荐',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yuming_news
-- ----------------------------

-- ----------------------------
-- Table structure for `yuming_products`
-- ----------------------------
DROP TABLE IF EXISTS `yuming_products`;
CREATE TABLE `yuming_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `domain_name` varchar(255) DEFAULT NULL COMMENT '域名名称',
  `domain_description` varchar(255) DEFAULT NULL COMMENT '域名介绍',
  `domain_zhuceshang` int(11) DEFAULT '0' COMMENT '注册商',
  `price` varchar(200) DEFAULT NULL COMMENT '域名价格',
  `domain_category` int(11) DEFAULT '0' COMMENT '域名分类',
  `add_time` datetime DEFAULT NULL COMMENT '添加时间',
  `update_time` datetime DEFAULT NULL COMMENT '更新时间',
  `issale` int(11) DEFAULT '1' COMMENT '1、出售中2、已出售',
  `hit` int(11) DEFAULT '0' COMMENT '点击数',
  `recommend` int(11) DEFAULT '2' COMMENT '1、推荐2、未推荐',
  `display` smallint(4) DEFAULT '1' COMMENT '1、显示2、隐藏',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yuming_products
-- ----------------------------

-- ----------------------------
-- Table structure for `yuming_system`
-- ----------------------------
DROP TABLE IF EXISTS `yuming_system`;
CREATE TABLE `yuming_system` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sys_webname` varchar(255) DEFAULT NULL,
  `sys_template` varchar(255) DEFAULT 'default' COMMENT '模板名 default\\bao',
  `sys_webtitle` varchar(255) DEFAULT NULL,
  `sys_webkeyword` varchar(255) DEFAULT NULL,
  `sys_description` varchar(255) DEFAULT NULL,
  `sys_tongjicode` text,
  `sys_indextitle` varchar(255) DEFAULT NULL,
  `sys_indexdesc` varchar(255) DEFAULT NULL,
  `sys_qq` varchar(22) DEFAULT NULL,
  `sys_email` varchar(33) DEFAULT NULL,
  `sys_weixin` varchar(33) DEFAULT NULL,
  `sys_phone` varchar(33) DEFAULT NULL,
  `sys_ename` varchar(90) DEFAULT NULL,
  `sys_aiming` varchar(90) DEFAULT NULL,
  `sys_xishu` varchar(90) DEFAULT NULL,
  `sys_reg` varchar(90) DEFAULT NULL,
  `sys_addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yuming_system
-- ----------------------------
INSERT INTO `yuming_system` VALUES ('1', 'GMIC域名网', 'bao', 'GMIC财富域名米表，一个好域名是成功的开始！好马配好鞍,好站配好米。好域名,精品域名,尽在GMIC域名网', 'gmic,GMIC,全球移动互联网大会,移动互联网,互联网,VC,投资,资本,风投,创投,域名,VC域名,易名,爱名,米表,域名投资,国际域名,域名中介,域名经纪,域名评估,域名争议,domain,yuming', 'GMIC财富域名米表，COM域名专卖,GMIC域名网主营:COM域名,数字域名，双拼域名，三拼域名，VC域名，英文域名(英语单词域名)以及电商域名等精品域名,域名投资,国际域名,域名中介,域名经纪,域名评估,域名争议,domain,yuming,是您选购各类做站网站域名的首选!', '&lt;script src=&quot;https://s4.cnzz.com/z_stat.php?id=1258047666&amp;web_id=1258047666&quot; language=&quot;JavaScript&quot;&gt;&lt;/script&gt;', 'GMIC 全球移动互联网大会', '为什么要买域名？1、便于客户记住，树立品牌形象 利于市场推广2、创造互联网品牌价值 域名是互联网的入口3、唯一性 不可再生资源很强的识别性', '1604026450', 'fu2000000@163.com', 'skygee', '13718973234', '', '', '', '', '2018-04-25 14:25:08');
