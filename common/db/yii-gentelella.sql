-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.1.16-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for yii-gentelella
CREATE DATABASE IF NOT EXISTS `yii-gentelella` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `yii-gentelella`;


-- Dumping structure for table yii-gentelella.cms_auth_assignment
CREATE TABLE IF NOT EXISTS `cms_auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `cms_auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `cms_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table yii-gentelella.cms_auth_assignment: ~9 rows (approximately)
DELETE FROM `cms_auth_assignment`;
/*!40000 ALTER TABLE `cms_auth_assignment` DISABLE KEYS */;
INSERT INTO `cms_auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
	('Full', '1', 1463120505),
	('Full', '10', 1481874446),
	('Full', '11', 1482229403),
	('Full', '2', 1463450777),
	('Full', '4', 1481093752),
	('Full', '5', 1481093761),
	('Full', '6', 1481093769),
	('Full', '8', 1481857643),
	('Full', '9', 1481857651);
/*!40000 ALTER TABLE `cms_auth_assignment` ENABLE KEYS */;


-- Dumping structure for table yii-gentelella.cms_auth_item
CREATE TABLE IF NOT EXISTS `cms_auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `cms_auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `cms_auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table yii-gentelella.cms_auth_item: ~144 rows (approximately)
DELETE FROM `cms_auth_item`;
/*!40000 ALTER TABLE `cms_auth_item` DISABLE KEYS */;
INSERT INTO `cms_auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/*', 2, NULL, NULL, NULL, 1463120472, 1463120472),
	('/action-price/*', 2, NULL, NULL, NULL, 1505200756, 1505200756),
	('/action-price/create', 2, NULL, NULL, NULL, 1505200755, 1505200755),
	('/action-price/delete', 2, NULL, NULL, NULL, 1505200756, 1505200756),
	('/action-price/index', 2, NULL, NULL, NULL, 1505200755, 1505200755),
	('/action-price/update', 2, NULL, NULL, NULL, 1505200756, 1505200756),
	('/action-price/view', 2, NULL, NULL, NULL, 1505200755, 1505200755),
	('/admin/*', 2, NULL, NULL, NULL, 1463120470, 1463120470),
	('/admin/assignment/*', 2, NULL, NULL, NULL, 1463120468, 1463120468),
	('/admin/assignment/assign', 2, NULL, NULL, NULL, 1463120468, 1463120468),
	('/admin/assignment/index', 2, NULL, NULL, NULL, 1463120468, 1463120468),
	('/admin/assignment/revoke', 2, NULL, NULL, NULL, 1463120468, 1463120468),
	('/admin/assignment/view', 2, NULL, NULL, NULL, 1463120468, 1463120468),
	('/admin/default/*', 2, NULL, NULL, NULL, 1463120468, 1463120468),
	('/admin/default/index', 2, NULL, NULL, NULL, 1463120468, 1463120468),
	('/admin/menu/*', 2, NULL, NULL, NULL, 1463120469, 1463120469),
	('/admin/menu/create', 2, NULL, NULL, NULL, 1463120469, 1463120469),
	('/admin/menu/delete', 2, NULL, NULL, NULL, 1463120469, 1463120469),
	('/admin/menu/index', 2, NULL, NULL, NULL, 1463120468, 1463120468),
	('/admin/menu/update', 2, NULL, NULL, NULL, 1463120469, 1463120469),
	('/admin/menu/view', 2, NULL, NULL, NULL, 1463120469, 1463120469),
	('/admin/permission/*', 2, NULL, NULL, NULL, 1463120469, 1463120469),
	('/admin/permission/assign', 2, NULL, NULL, NULL, 1463120469, 1463120469),
	('/admin/permission/create', 2, NULL, NULL, NULL, 1463120469, 1463120469),
	('/admin/permission/delete', 2, NULL, NULL, NULL, 1463120469, 1463120469),
	('/admin/permission/index', 2, NULL, NULL, NULL, 1463120469, 1463120469),
	('/admin/permission/remove', 2, NULL, NULL, NULL, 1463120469, 1463120469),
	('/admin/permission/update', 2, NULL, NULL, NULL, 1463120469, 1463120469),
	('/admin/permission/view', 2, NULL, NULL, NULL, 1463120469, 1463120469),
	('/admin/role/*', 2, NULL, NULL, NULL, 1463120469, 1463120469),
	('/admin/role/assign', 2, NULL, NULL, NULL, 1463120469, 1463120469),
	('/admin/role/create', 2, NULL, NULL, NULL, 1463120469, 1463120469),
	('/admin/role/delete', 2, NULL, NULL, NULL, 1463120469, 1463120469),
	('/admin/role/index', 2, NULL, NULL, NULL, 1463120469, 1463120469),
	('/admin/role/remove', 2, NULL, NULL, NULL, 1463120469, 1463120469),
	('/admin/role/update', 2, NULL, NULL, NULL, 1463120469, 1463120469),
	('/admin/role/view', 2, NULL, NULL, NULL, 1463120469, 1463120469),
	('/admin/route/*', 2, NULL, NULL, NULL, 1463120470, 1463120470),
	('/admin/route/assign', 2, NULL, NULL, NULL, 1463120469, 1463120469),
	('/admin/route/create', 2, NULL, NULL, NULL, 1463120469, 1463120469),
	('/admin/route/index', 2, NULL, NULL, NULL, 1463120469, 1463120469),
	('/admin/route/refresh', 2, NULL, NULL, NULL, 1463120470, 1463120470),
	('/admin/route/remove', 2, NULL, NULL, NULL, 1463120469, 1463120469),
	('/admin/rule/*', 2, NULL, NULL, NULL, 1463120470, 1463120470),
	('/admin/rule/create', 2, NULL, NULL, NULL, 1463120470, 1463120470),
	('/admin/rule/delete', 2, NULL, NULL, NULL, 1463120470, 1463120470),
	('/admin/rule/index', 2, NULL, NULL, NULL, 1463120470, 1463120470),
	('/admin/rule/update', 2, NULL, NULL, NULL, 1463120470, 1463120470),
	('/admin/rule/view', 2, NULL, NULL, NULL, 1463120470, 1463120470),
	('/admin/user/*', 2, NULL, NULL, NULL, 1463120470, 1463120470),
	('/admin/user/activate', 2, NULL, NULL, NULL, 1463120470, 1463120470),
	('/admin/user/change-password', 2, NULL, NULL, NULL, 1463120470, 1463120470),
	('/admin/user/delete', 2, NULL, NULL, NULL, 1463120470, 1463120470),
	('/admin/user/index', 2, NULL, NULL, NULL, 1463120470, 1463120470),
	('/admin/user/login', 2, NULL, NULL, NULL, 1463120470, 1463120470),
	('/admin/user/logout', 2, NULL, NULL, NULL, 1463120470, 1463120470),
	('/admin/user/request-password-reset', 2, NULL, NULL, NULL, 1463120470, 1463120470),
	('/admin/user/reset-password', 2, NULL, NULL, NULL, 1463120470, 1463120470),
	('/admin/user/signup', 2, NULL, NULL, NULL, 1463120470, 1463120470),
	('/admin/user/view', 2, NULL, NULL, NULL, 1463120470, 1463120470),
	('/category/*', 2, NULL, NULL, NULL, 1463133709, 1463133709),
	('/category/create', 2, NULL, NULL, NULL, 1463133709, 1463133709),
	('/category/delete', 2, NULL, NULL, NULL, 1463133709, 1463133709),
	('/category/index', 2, NULL, NULL, NULL, 1463133709, 1463133709),
	('/category/update', 2, NULL, NULL, NULL, 1463133709, 1463133709),
	('/category/view', 2, NULL, NULL, NULL, 1463133709, 1463133709),
	('/debug/*', 2, NULL, NULL, NULL, 1463120472, 1463120472),
	('/debug/default/*', 2, NULL, NULL, NULL, 1463120472, 1463120472),
	('/debug/default/db-explain', 2, NULL, NULL, NULL, 1463120472, 1463120472),
	('/debug/default/download-mail', 2, NULL, NULL, NULL, 1463120472, 1463120472),
	('/debug/default/index', 2, NULL, NULL, NULL, 1463120472, 1463120472),
	('/debug/default/toolbar', 2, NULL, NULL, NULL, 1463120472, 1463120472),
	('/debug/default/view', 2, NULL, NULL, NULL, 1463120472, 1463120472),
	('/debug/user/*', 2, NULL, NULL, NULL, 1505200755, 1505200755),
	('/debug/user/reset-identity', 2, NULL, NULL, NULL, 1505200755, 1505200755),
	('/debug/user/set-identity', 2, NULL, NULL, NULL, 1505200755, 1505200755),
	('/gii/*', 2, NULL, NULL, NULL, 1463120472, 1463120472),
	('/gii/default/*', 2, NULL, NULL, NULL, 1463120472, 1463120472),
	('/gii/default/action', 2, NULL, NULL, NULL, 1463120472, 1463120472),
	('/gii/default/diff', 2, NULL, NULL, NULL, 1463120472, 1463120472),
	('/gii/default/index', 2, NULL, NULL, NULL, 1463120472, 1463120472),
	('/gii/default/preview', 2, NULL, NULL, NULL, 1463120472, 1463120472),
	('/gii/default/view', 2, NULL, NULL, NULL, 1463120472, 1463120472),
	('/gridview/*', 2, NULL, NULL, NULL, 1463120472, 1463120472),
	('/gridview/export/*', 2, NULL, NULL, NULL, 1463120472, 1463120472),
	('/gridview/export/download', 2, NULL, NULL, NULL, 1463120472, 1463120472),
	('/markdown/*', 2, NULL, NULL, NULL, 1463133709, 1463133709),
	('/markdown/parse/*', 2, NULL, NULL, NULL, 1463133709, 1463133709),
	('/markdown/parse/download', 2, NULL, NULL, NULL, 1463133709, 1463133709),
	('/markdown/parse/preview', 2, NULL, NULL, NULL, 1463133708, 1463133708),
	('/page/*', 2, NULL, NULL, NULL, 1463133709, 1463133709),
	('/page/create', 2, NULL, NULL, NULL, 1463133709, 1463133709),
	('/page/delete', 2, NULL, NULL, NULL, 1463133709, 1463133709),
	('/page/index', 2, NULL, NULL, NULL, 1463133709, 1463133709),
	('/page/update', 2, NULL, NULL, NULL, 1463133709, 1463133709),
	('/page/view', 2, NULL, NULL, NULL, 1463133709, 1463133709),
	('/post/*', 2, NULL, NULL, NULL, 1463133709, 1463133709),
	('/post/create', 2, NULL, NULL, NULL, 1463133709, 1463133709),
	('/post/delete', 2, NULL, NULL, NULL, 1463133709, 1463133709),
	('/post/index', 2, NULL, NULL, NULL, 1463133709, 1463133709),
	('/post/update', 2, NULL, NULL, NULL, 1463133709, 1463133709),
	('/post/view', 2, NULL, NULL, NULL, 1463133709, 1463133709),
	('/site/*', 2, NULL, NULL, NULL, 1463120472, 1463120472),
	('/site/error', 2, NULL, NULL, NULL, 1463120472, 1463120472),
	('/site/index', 2, NULL, NULL, NULL, 1463120472, 1463120472),
	('/site/login', 2, NULL, NULL, NULL, 1463120472, 1463120472),
	('/site/logout', 2, NULL, NULL, NULL, 1463120472, 1463120472),
	('/user/*', 2, NULL, NULL, NULL, 1463120472, 1463120472),
	('/user/admin/*', 2, NULL, NULL, NULL, 1463120471, 1463120471),
	('/user/admin/assignments', 2, NULL, NULL, NULL, 1463120471, 1463120471),
	('/user/admin/block', 2, NULL, NULL, NULL, 1463120471, 1463120471),
	('/user/admin/confirm', 2, NULL, NULL, NULL, 1463120471, 1463120471),
	('/user/admin/create', 2, NULL, NULL, NULL, 1463120470, 1463120470),
	('/user/admin/delete', 2, NULL, NULL, NULL, 1463120471, 1463120471),
	('/user/admin/index', 2, NULL, NULL, NULL, 1463120470, 1463120470),
	('/user/admin/info', 2, NULL, NULL, NULL, 1463120471, 1463120471),
	('/user/admin/resend-password', 2, NULL, NULL, NULL, 1505200755, 1505200755),
	('/user/admin/switch', 2, NULL, NULL, NULL, 1505200755, 1505200755),
	('/user/admin/update', 2, NULL, NULL, NULL, 1463120470, 1463120470),
	('/user/admin/update-profile', 2, NULL, NULL, NULL, 1463120471, 1463120471),
	('/user/profile/*', 2, NULL, NULL, NULL, 1463120471, 1463120471),
	('/user/profile/index', 2, NULL, NULL, NULL, 1463120471, 1463120471),
	('/user/profile/show', 2, NULL, NULL, NULL, 1463120471, 1463120471),
	('/user/recovery/*', 2, NULL, NULL, NULL, 1463120471, 1463120471),
	('/user/recovery/request', 2, NULL, NULL, NULL, 1463120471, 1463120471),
	('/user/recovery/reset', 2, NULL, NULL, NULL, 1463120471, 1463120471),
	('/user/registration/*', 2, NULL, NULL, NULL, 1463120471, 1463120471),
	('/user/registration/confirm', 2, NULL, NULL, NULL, 1463120471, 1463120471),
	('/user/registration/connect', 2, NULL, NULL, NULL, 1463120471, 1463120471),
	('/user/registration/register', 2, NULL, NULL, NULL, 1463120471, 1463120471),
	('/user/registration/resend', 2, NULL, NULL, NULL, 1463120471, 1463120471),
	('/user/security/*', 2, NULL, NULL, NULL, 1463120471, 1463120471),
	('/user/security/auth', 2, NULL, NULL, NULL, 1463120471, 1463120471),
	('/user/security/error', 2, NULL, NULL, NULL, 1505200755, 1505200755),
	('/user/security/login', 2, NULL, NULL, NULL, 1463120471, 1463120471),
	('/user/security/logout', 2, NULL, NULL, NULL, 1463120471, 1463120471),
	('/user/settings/*', 2, NULL, NULL, NULL, 1463120472, 1463120472),
	('/user/settings/account', 2, NULL, NULL, NULL, 1463120471, 1463120471),
	('/user/settings/confirm', 2, NULL, NULL, NULL, 1463120471, 1463120471),
	('/user/settings/delete', 2, NULL, NULL, NULL, 1505200755, 1505200755),
	('/user/settings/disconnect', 2, NULL, NULL, NULL, 1463120472, 1463120472),
	('/user/settings/networks', 2, NULL, NULL, NULL, 1463120471, 1463120471),
	('/user/settings/profile', 2, NULL, NULL, NULL, 1463120471, 1463120471),
	('Full', 2, NULL, NULL, NULL, 1463120485, 1463120485);
/*!40000 ALTER TABLE `cms_auth_item` ENABLE KEYS */;


-- Dumping structure for table yii-gentelella.cms_auth_item_child
CREATE TABLE IF NOT EXISTS `cms_auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `cms_auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `cms_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cms_auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `cms_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table yii-gentelella.cms_auth_item_child: ~108 rows (approximately)
DELETE FROM `cms_auth_item_child`;
/*!40000 ALTER TABLE `cms_auth_item_child` DISABLE KEYS */;
INSERT INTO `cms_auth_item_child` (`parent`, `child`) VALUES
	('Full', '/*'),
	('Full', '/admin/*'),
	('Full', '/admin/assignment/*'),
	('Full', '/admin/assignment/assign'),
	('Full', '/admin/assignment/index'),
	('Full', '/admin/assignment/revoke'),
	('Full', '/admin/assignment/view'),
	('Full', '/admin/default/*'),
	('Full', '/admin/default/index'),
	('Full', '/admin/menu/*'),
	('Full', '/admin/menu/create'),
	('Full', '/admin/menu/delete'),
	('Full', '/admin/menu/index'),
	('Full', '/admin/menu/update'),
	('Full', '/admin/menu/view'),
	('Full', '/admin/permission/*'),
	('Full', '/admin/permission/assign'),
	('Full', '/admin/permission/create'),
	('Full', '/admin/permission/delete'),
	('Full', '/admin/permission/index'),
	('Full', '/admin/permission/remove'),
	('Full', '/admin/permission/update'),
	('Full', '/admin/permission/view'),
	('Full', '/admin/role/*'),
	('Full', '/admin/role/assign'),
	('Full', '/admin/role/create'),
	('Full', '/admin/role/delete'),
	('Full', '/admin/role/index'),
	('Full', '/admin/role/remove'),
	('Full', '/admin/role/update'),
	('Full', '/admin/role/view'),
	('Full', '/admin/route/*'),
	('Full', '/admin/route/assign'),
	('Full', '/admin/route/create'),
	('Full', '/admin/route/index'),
	('Full', '/admin/route/refresh'),
	('Full', '/admin/route/remove'),
	('Full', '/admin/rule/*'),
	('Full', '/admin/rule/create'),
	('Full', '/admin/rule/delete'),
	('Full', '/admin/rule/index'),
	('Full', '/admin/rule/update'),
	('Full', '/admin/rule/view'),
	('Full', '/admin/user/*'),
	('Full', '/admin/user/activate'),
	('Full', '/admin/user/change-password'),
	('Full', '/admin/user/delete'),
	('Full', '/admin/user/index'),
	('Full', '/admin/user/login'),
	('Full', '/admin/user/logout'),
	('Full', '/admin/user/request-password-reset'),
	('Full', '/admin/user/reset-password'),
	('Full', '/admin/user/signup'),
	('Full', '/admin/user/view'),
	('Full', '/debug/*'),
	('Full', '/debug/default/*'),
	('Full', '/debug/default/db-explain'),
	('Full', '/debug/default/download-mail'),
	('Full', '/debug/default/index'),
	('Full', '/debug/default/toolbar'),
	('Full', '/debug/default/view'),
	('Full', '/gii/*'),
	('Full', '/gii/default/*'),
	('Full', '/gii/default/action'),
	('Full', '/gii/default/diff'),
	('Full', '/gii/default/index'),
	('Full', '/gii/default/preview'),
	('Full', '/gii/default/view'),
	('Full', '/gridview/*'),
	('Full', '/gridview/export/*'),
	('Full', '/gridview/export/download'),
	('Full', '/site/*'),
	('Full', '/site/error'),
	('Full', '/site/index'),
	('Full', '/site/login'),
	('Full', '/site/logout'),
	('Full', '/user/*'),
	('Full', '/user/admin/*'),
	('Full', '/user/admin/assignments'),
	('Full', '/user/admin/block'),
	('Full', '/user/admin/confirm'),
	('Full', '/user/admin/create'),
	('Full', '/user/admin/delete'),
	('Full', '/user/admin/index'),
	('Full', '/user/admin/info'),
	('Full', '/user/admin/update'),
	('Full', '/user/admin/update-profile'),
	('Full', '/user/profile/*'),
	('Full', '/user/profile/index'),
	('Full', '/user/profile/show'),
	('Full', '/user/recovery/*'),
	('Full', '/user/recovery/request'),
	('Full', '/user/recovery/reset'),
	('Full', '/user/registration/*'),
	('Full', '/user/registration/confirm'),
	('Full', '/user/registration/connect'),
	('Full', '/user/registration/register'),
	('Full', '/user/registration/resend'),
	('Full', '/user/security/*'),
	('Full', '/user/security/auth'),
	('Full', '/user/security/login'),
	('Full', '/user/security/logout'),
	('Full', '/user/settings/*'),
	('Full', '/user/settings/account'),
	('Full', '/user/settings/confirm'),
	('Full', '/user/settings/disconnect'),
	('Full', '/user/settings/networks'),
	('Full', '/user/settings/profile');
/*!40000 ALTER TABLE `cms_auth_item_child` ENABLE KEYS */;


-- Dumping structure for table yii-gentelella.cms_auth_rule
CREATE TABLE IF NOT EXISTS `cms_auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table yii-gentelella.cms_auth_rule: ~0 rows (approximately)
DELETE FROM `cms_auth_rule`;
/*!40000 ALTER TABLE `cms_auth_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_auth_rule` ENABLE KEYS */;


-- Dumping structure for table yii-gentelella.cms_migration
CREATE TABLE IF NOT EXISTS `cms_migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table yii-gentelella.cms_migration: ~13 rows (approximately)
DELETE FROM `cms_migration`;
/*!40000 ALTER TABLE `cms_migration` DISABLE KEYS */;
INSERT INTO `cms_migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1479305844),
	('m140209_132017_init', 1479305847),
	('m140403_174025_create_account_table', 1479305847),
	('m140504_113157_update_tables', 1479305847),
	('m140504_130429_create_token_table', 1479305847),
	('m140506_102106_rbac_init', 1479305875),
	('m140830_171933_fix_ip_field', 1479305847),
	('m140830_172703_change_account_table_name', 1479305847),
	('m141222_110026_update_ip_field', 1479305847),
	('m141222_135246_alter_username_length', 1479305847),
	('m150614_103145_update_social_account_table', 1479305847),
	('m150623_212711_fix_username_notnull', 1479305847),
	('m151218_234654_add_timezone_to_profile', 1479305847);
/*!40000 ALTER TABLE `cms_migration` ENABLE KEYS */;


-- Dumping structure for table yii-gentelella.cms_profile
CREATE TABLE IF NOT EXISTS `cms_profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `timezone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `cms_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table yii-gentelella.cms_profile: ~0 rows (approximately)
DELETE FROM `cms_profile`;
/*!40000 ALTER TABLE `cms_profile` DISABLE KEYS */;
INSERT INTO `cms_profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`, `timezone`) VALUES
	(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `cms_profile` ENABLE KEYS */;


-- Dumping structure for table yii-gentelella.cms_social_account
CREATE TABLE IF NOT EXISTS `cms_social_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account_unique` (`provider`,`client_id`),
  UNIQUE KEY `account_unique_code` (`code`),
  KEY `fk_user_account` (`user_id`),
  CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `cms_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table yii-gentelella.cms_social_account: ~0 rows (approximately)
DELETE FROM `cms_social_account`;
/*!40000 ALTER TABLE `cms_social_account` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_social_account` ENABLE KEYS */;


-- Dumping structure for table yii-gentelella.cms_token
CREATE TABLE IF NOT EXISTS `cms_token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL,
  UNIQUE KEY `token_unique` (`user_id`,`code`,`type`),
  CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `cms_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table yii-gentelella.cms_token: ~0 rows (approximately)
DELETE FROM `cms_token`;
/*!40000 ALTER TABLE `cms_token` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_token` ENABLE KEYS */;


-- Dumping structure for table yii-gentelella.cms_user
CREATE TABLE IF NOT EXISTS `cms_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `last_login_at` int(11) DEFAULT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_unique_email` (`email`),
  UNIQUE KEY `user_unique_username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table yii-gentelella.cms_user: ~0 rows (approximately)
DELETE FROM `cms_user`;
/*!40000 ALTER TABLE `cms_user` DISABLE KEYS */;
INSERT INTO `cms_user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `last_login_at`, `flags`) VALUES
	(1, 'admin', 'admin@gdcvn.com', '$2y$10$oG/ADBgqKXvnxEl6Oe.FsOkwEwGuIdUrNgvXc9U1fYAfmXkNTdzWq', 'UdXVBrEirqwmEAGwBCev_x6UolgVuA6N', 1461248833, NULL, NULL, NULL, 0, 1461248824, 1505197383, 0);
/*!40000 ALTER TABLE `cms_user` ENABLE KEYS */;


-- Dumping structure for table yii-gentelella.gt_config
CREATE TABLE IF NOT EXISTS `gt_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `describe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table yii-gentelella.gt_config: ~2 rows (approximately)
DELETE FROM `gt_config`;
/*!40000 ALTER TABLE `gt_config` DISABLE KEYS */;
INSERT INTO `gt_config` (`id`, `key`, `value`, `describe`) VALUES
	(3, 'hotline', '09457321598', 'Hotline support icash'),
	(5, 'Test1', 'te', 'te');
/*!40000 ALTER TABLE `gt_config` ENABLE KEYS */;


-- Dumping structure for table yii-gentelella.gt_version
CREATE TABLE IF NOT EXISTS `gt_version` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `current_version` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `url_app` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_force_update` tinyint(4) DEFAULT '0',
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `message_mm` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table yii-gentelella.gt_version: 1 rows
DELETE FROM `gt_version`;
/*!40000 ALTER TABLE `gt_version` DISABLE KEYS */;
INSERT INTO `gt_version` (`id`, `current_version`, `url_app`, `message_en`, `is_force_update`, `status`, `created_at`, `updated_at`, `message_mm`) VALUES
	(1, '1.0.20161228', 'https://play.google.com/store/apps/details?id=com.shwemate.timo', 'Latest version is ready. Please! update the new one. ', 0, 1, '2016-12-12 15:05:20', '2016-12-28 17:01:33', 'Version အသစ္ထြက္ရွိေနပါျပီ။ ေက်းဇူးျပဳ၍ အသစ္ထည့္သြင္းပါ။');
/*!40000 ALTER TABLE `gt_version` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
