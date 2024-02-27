-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 26-02-2024 a las 19:01:50
-- Versión del servidor: 10.6.16-MariaDB-cll-lve
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mxcaionl_spivet_boletera_joom`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_action_logs`
--

CREATE TABLE `bol96_action_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `message_language_key` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `log_date` datetime NOT NULL,
  `extension` varchar(50) NOT NULL DEFAULT '',
  `user_id` int(11) NOT NULL DEFAULT 0,
  `item_id` int(11) NOT NULL DEFAULT 0,
  `ip_address` varchar(40) NOT NULL DEFAULT '0.0.0.0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bol96_action_logs`
--

INSERT INTO `bol96_action_logs` (`id`, `message_language_key`, `message`, `log_date`, `extension`, `user_id`, `item_id`, `ip_address`) VALUES
(1, 'PLG_ACTIONLOG_JOOMLA_USER_LOGGED_IN', '{\"action\":\"login\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-01 18:55:27', 'com_users', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(2, 'PLG_ACTIONLOG_JOOMLA_USER_LOGGED_IN', '{\"action\":\"login\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-01 19:16:19', 'com_users', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(3, 'PLG_ACTIONLOG_JOOMLA_EXTENSION_INSTALLED', '{\"action\":\"install\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_TEMPLATE\",\"id\":233,\"name\":\"Licencia PQ\",\"extension_name\":\"Licencia PQ\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-01 19:18:50', 'com_installer', 527, 233, 'COM_ACTIONLOGS_DISABLED'),
(4, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_STYLE\",\"id\":\"12\",\"title\":\"Licencia PQ - Default\",\"extension_name\":\"Licencia PQ - Default\",\"itemlink\":\"index.php?option=com_templates&task=style.edit&id=12\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-01 19:26:08', 'com_templates.style', 527, 12, 'COM_ACTIONLOGS_DISABLED'),
(5, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_STYLE\",\"id\":\"12\",\"title\":\"Licencia PQ - Default\",\"extension_name\":\"Licencia PQ - Default\",\"itemlink\":\"index.php?option=com_templates&task=style.edit&id=12\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-01 19:31:20', 'com_templates.style', 527, 12, 'COM_ACTIONLOGS_DISABLED'),
(6, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_STYLE\",\"id\":\"12\",\"title\":\"Licencia PQ - Default\",\"extension_name\":\"Licencia PQ - Default\",\"itemlink\":\"index.php?option=com_templates&task=style.edit&id=12\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-01 19:31:33', 'com_templates.style', 527, 12, 'COM_ACTIONLOGS_DISABLED'),
(7, 'PLG_ACTIONLOG_JOOMLA_EXTENSION_INSTALLED', '{\"action\":\"install\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":234,\"name\":\"Inicio\",\"extension_name\":\"Inicio\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-01 19:41:38', 'com_installer', 527, 234, 'COM_ACTIONLOGS_DISABLED'),
(8, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-01 19:42:36', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(9, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-01 19:43:38', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(10, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-01 19:43:38', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(11, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-01 19:43:50', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(12, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-01 19:43:50', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(13, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-01 19:44:07', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(14, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-01 19:44:16', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(15, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-01 19:44:27', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(16, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-01 20:58:15', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(17, 'PLG_ACTIONLOG_JOOMLA_EXTENSION_INSTALLED', '{\"action\":\"install\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_COMPONENT\",\"id\":235,\"name\":\"COM_BLANK\",\"extension_name\":\"COM_BLANK\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-01 21:02:24', 'com_installer', 527, 235, 'COM_ACTIONLOGS_DISABLED'),
(18, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MENU_ITEM\",\"id\":103,\"title\":\"Quienes somos\",\"itemlink\":\"index.php?option=com_menus&task=item.edit&id=103\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-01 21:03:04', 'com_menus.item', 527, 103, 'COM_ACTIONLOGS_DISABLED'),
(19, 'PLG_ACTIONLOG_JOOMLA_EXTENSION_INSTALLED', '{\"action\":\"install\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":236,\"name\":\"mod_menu\",\"extension_name\":\"mod_menu\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-01 21:03:29', 'com_installer', 527, 236, 'COM_ACTIONLOGS_DISABLED'),
(20, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-01 21:03:56', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(21, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-01 21:13:12', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(22, 'PLG_ACTIONLOG_JOOMLA_EXTENSION_INSTALLED', '{\"action\":\"install\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_LANGUAGE\",\"id\":237,\"name\":\"Spanish (es-ES)\",\"extension_name\":\"Spanish (es-ES)\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-01 21:24:04', 'com_installer', 527, 237, 'COM_ACTIONLOGS_DISABLED'),
(23, 'PLG_ACTIONLOG_JOOMLA_EXTENSION_INSTALLED', '{\"action\":\"install\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_LANGUAGE\",\"id\":238,\"name\":\"Spanish (es-ES)\",\"extension_name\":\"Spanish (es-ES)\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-01 21:24:04', 'com_installer', 527, 238, 'COM_ACTIONLOGS_DISABLED'),
(24, 'PLG_ACTIONLOG_JOOMLA_EXTENSION_INSTALLED', '{\"action\":\"install\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_LANGUAGE\",\"id\":239,\"name\":\"Spanish (es-ES)\",\"extension_name\":\"Spanish (es-ES)\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-01 21:24:04', 'com_installer', 527, 239, 'COM_ACTIONLOGS_DISABLED'),
(25, 'PLG_ACTIONLOG_JOOMLA_EXTENSION_INSTALLED', '{\"action\":\"install\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_PACKAGE\",\"id\":240,\"name\":\"Spanish (es-ES) Language Pack\",\"extension_name\":\"Spanish (es-ES) Language Pack\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-01 21:24:04', 'com_installer', 527, 240, 'COM_ACTIONLOGS_DISABLED'),
(26, 'PLG_ACTIONLOG_JOOMLA_USER_LOGGED_IN', '{\"action\":\"login\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-02 15:35:55', 'com_users', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(27, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 15:40:44', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(28, 'PLG_ACTIONLOG_JOOMLA_EXTENSION_UNINSTALLED', '{\"action\":\"install\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":\"236\",\"name\":\"mod_menu\",\"extension_name\":\"mod_menu\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 15:41:10', 'com_installer', 527, 236, 'COM_ACTIONLOGS_DISABLED'),
(29, 'PLG_ACTIONLOG_JOOMLA_USER_LOGIN_FAILED', '{\"action\":\"login\",\"id\":527,\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-02 15:56:43', 'com_users', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(30, 'PLG_ACTIONLOG_JOOMLA_USER_LOGIN_FAILED', '{\"action\":\"login\",\"id\":527,\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-02 15:57:04', 'com_users', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(31, 'PLG_ACTIONLOG_JOOMLA_USER_LOGGED_IN', '{\"action\":\"login\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-02 15:57:13', 'com_users', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(32, 'PLG_ACTIONLOG_JOOMLA_EXTENSION_INSTALLED', '{\"action\":\"install\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":241,\"name\":\"mod_menu\",\"extension_name\":\"mod_menu\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 15:59:01', 'com_installer', 527, 241, 'COM_ACTIONLOGS_DISABLED'),
(33, 'PLG_ACTIONLOG_JOOMLA_USER_LOGGED_IN', '{\"action\":\"login\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-02 16:31:31', 'com_users', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(34, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":111,\"title\":\"Menu cortina\",\"extension_name\":\"Menu cortina\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=111\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 16:32:00', 'com_modules.module', 527, 111, 'COM_ACTIONLOGS_DISABLED'),
(35, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 16:32:44', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(36, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 16:41:47', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(37, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":111,\"title\":\"Menu cortina\",\"extension_name\":\"Menu cortina\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=111\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 16:42:01', 'com_modules.module', 527, 111, 'COM_ACTIONLOGS_DISABLED'),
(38, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 16:42:01', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(39, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":111,\"title\":\"Menu cortina\",\"extension_name\":\"Menu cortina\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=111\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 16:42:22', 'com_modules.module', 527, 111, 'COM_ACTIONLOGS_DISABLED'),
(40, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 16:42:22', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(41, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 16:42:24', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(42, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":111,\"title\":\"Menu cortina\",\"extension_name\":\"Menu cortina\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=111\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 16:42:43', 'com_modules.module', 527, 111, 'COM_ACTIONLOGS_DISABLED'),
(43, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 16:42:43', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(44, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 17:45:21', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(45, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 17:45:30', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(46, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UNPUBLISHED', '{\"action\":\"unpublish\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":111,\"title\":\"Menu cortina\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=111\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 17:45:30', 'com_modules.module', 527, 111, 'COM_ACTIONLOGS_DISABLED'),
(47, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 17:46:38', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(48, 'PLG_ACTIONLOG_JOOMLA_COMPONENT_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_COMPONENT_CONFIG\",\"id\":12,\"title\":\"com_media\",\"extension_name\":\"com_media\",\"itemlink\":\"index.php?option=com_config&task=component.edit&extension_id=12\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 17:47:15', 'com_config.component', 527, 12, 'COM_ACTIONLOGS_DISABLED'),
(49, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":\"pexels_videos_2625 1080p.mp4\",\"itemlink\":\"index.php?option=com_media&path=local-images:\\/Spivet\\/sliders\\/principal\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 17:47:36', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(50, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":\"istockphoto-1298521756-640_adpp_is.mp4\",\"itemlink\":\"index.php?option=com_media&path=local-images:\\/Spivet\\/sliders\\/principal\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 17:48:43', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(51, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 17:51:13', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(52, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 17:57:04', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(53, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":\"17030-4k.jpg\",\"itemlink\":\"index.php?option=com_media&path=local-images:\\/Spivet\\/sliders\\/principal\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 17:57:23', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(54, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 17:59:36', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(55, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":111,\"title\":\"Menu cortina\",\"extension_name\":\"Menu cortina\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=111\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 17:59:55', 'com_modules.module', 527, 111, 'COM_ACTIONLOGS_DISABLED'),
(56, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 17:59:55', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(57, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 18:09:56', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(58, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 18:13:58', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(59, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 18:13:58', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(60, 'PLG_ACTIONLOG_JOOMLA_COMPONENT_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_COMPONENT_CONFIG\",\"id\":12,\"title\":\"com_media\",\"extension_name\":\"com_media\",\"itemlink\":\"index.php?option=com_config&task=component.edit&extension_id=12\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 18:14:48', 'com_config.component', 527, 12, 'COM_ACTIONLOGS_DISABLED'),
(61, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 18:15:08', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(62, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 18:15:08', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(63, 'PLG_ACTIONLOG_JOOMLA_COMPONENT_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_COMPONENT_CONFIG\",\"id\":12,\"title\":\"com_media\",\"extension_name\":\"com_media\",\"itemlink\":\"index.php?option=com_config&task=component.edit&extension_id=12\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 18:16:33', 'com_config.component', 527, 12, 'COM_ACTIONLOGS_DISABLED'),
(64, 'PLG_ACTIONLOG_JOOMLA_COMPONENT_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_COMPONENT_CONFIG\",\"id\":12,\"title\":\"com_media\",\"extension_name\":\"com_media\",\"itemlink\":\"index.php?option=com_config&task=component.edit&extension_id=12\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 18:17:17', 'com_config.component', 527, 12, 'COM_ACTIONLOGS_DISABLED'),
(65, 'PLG_ACTIONLOG_JOOMLA_COMPONENT_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_COMPONENT_CONFIG\",\"id\":12,\"title\":\"com_media\",\"extension_name\":\"com_media\",\"itemlink\":\"index.php?option=com_config&task=component.edit&extension_id=12\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 18:18:29', 'com_config.component', 527, 12, 'COM_ACTIONLOGS_DISABLED'),
(66, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 18:19:42', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(67, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 18:19:42', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(68, 'PLG_ACTIONLOG_JOOMLA_COMPONENT_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_COMPONENT_CONFIG\",\"id\":12,\"title\":\"com_media\",\"extension_name\":\"com_media\",\"itemlink\":\"index.php?option=com_config&task=component.edit&extension_id=12\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 18:20:45', 'com_config.component', 527, 12, 'COM_ACTIONLOGS_DISABLED'),
(69, 'PLG_ACTIONLOG_JOOMLA_COMPONENT_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_COMPONENT_CONFIG\",\"id\":12,\"title\":\"com_media\",\"extension_name\":\"com_media\",\"itemlink\":\"index.php?option=com_config&task=component.edit&extension_id=12\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 18:24:09', 'com_config.component', 527, 12, 'COM_ACTIONLOGS_DISABLED'),
(70, 'PLG_ACTIONLOG_JOOMLA_COMPONENT_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_COMPONENT_CONFIG\",\"id\":12,\"title\":\"com_media\",\"extension_name\":\"com_media\",\"itemlink\":\"index.php?option=com_config&task=component.edit&extension_id=12\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 18:24:10', 'com_config.component', 527, 12, 'COM_ACTIONLOGS_DISABLED'),
(71, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 18:29:40', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(72, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 18:29:40', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(73, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 18:29:51', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(74, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 18:29:51', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(75, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 18:31:44', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(76, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 18:31:44', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(77, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 18:34:23', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(78, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 18:34:23', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(79, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 18:35:02', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(80, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UNPUBLISHED', '{\"action\":\"unpublish\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":111,\"title\":\"Menu cortina\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=111\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 18:35:02', 'com_modules.module', 527, 111, 'COM_ACTIONLOGS_DISABLED'),
(81, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 18:35:05', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(82, 'PLG_ACTIONLOG_JOOMLA_USER_LOGGED_IN', '{\"action\":\"login\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-02 19:43:31', 'com_users', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(83, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 19:46:56', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(84, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 19:46:56', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(85, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 19:51:23', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(86, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 19:51:23', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(87, 'PLG_ACTIONLOG_JOOMLA_COMPONENT_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_COMPONENT_CONFIG\",\"id\":12,\"title\":\"com_media\",\"extension_name\":\"com_media\",\"itemlink\":\"index.php?option=com_config&task=component.edit&extension_id=12\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 20:27:02', 'com_config.component', 527, 12, 'COM_ACTIONLOGS_DISABLED'),
(88, 'PLG_ACTIONLOG_JOOMLA_USER_LOGGED_IN', '{\"action\":\"login\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-02 21:52:22', 'com_users', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(89, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 21:53:55', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(90, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 21:53:55', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(91, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 21:56:20', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(92, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 21:56:20', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(93, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 22:01:29', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(94, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 22:01:29', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(95, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 22:04:36', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(96, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 22:04:36', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(97, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 22:04:44', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(98, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 22:04:44', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(99, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 22:06:41', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(100, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 22:06:41', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(101, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 22:07:05', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(102, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 22:07:05', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(103, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 22:07:34', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(104, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 22:07:34', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(105, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 22:17:43', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(106, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 22:17:43', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(107, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 22:18:16', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(108, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 22:18:16', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(109, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 22:36:49', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(110, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 22:36:49', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(111, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 22:36:56', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(112, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 22:36:56', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(113, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 22:37:06', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(114, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 22:37:06', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(115, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 22:42:10', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED');
INSERT INTO `bol96_action_logs` (`id`, `message_language_key`, `message`, `log_date`, `extension`, `user_id`, `item_id`, `ip_address`) VALUES
(116, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 22:42:10', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(117, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":\"papel.png\",\"itemlink\":\"index.php?option=com_media&path=local-images:\\/Spivet\\/ValoresMarca\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 22:48:52', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(118, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 22:49:23', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(119, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 22:49:23', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(120, 'PLG_ACTIONLOG_JOOMLA_USER_LOGGED_IN', '{\"action\":\"login\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-02 23:22:44', 'com_users', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(121, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 23:23:29', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(122, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 23:23:29', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(123, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 23:37:41', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(124, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 23:37:41', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(125, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 23:39:34', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(126, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 23:39:34', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(127, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 23:42:50', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(128, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 23:42:50', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(129, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 23:43:07', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(130, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 23:43:07', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(131, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 23:43:14', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(132, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 23:43:14', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(133, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-02 23:43:58', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(134, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-02 23:43:58', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(135, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-03 00:01:55', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(136, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-03 00:01:55', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(137, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-03 00:04:21', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(138, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-03 00:04:21', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(139, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-03 00:04:33', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(140, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-03 00:04:33', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(141, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-03 00:44:19', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(142, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-03 00:44:19', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(143, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-03 00:55:03', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(144, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-03 00:55:03', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(145, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-03 00:55:39', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(146, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-03 00:55:39', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(147, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-03 00:55:54', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(148, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-03 00:55:54', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(149, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":\"nadador.png\",\"itemlink\":\"index.php?option=com_media&path=local-images:\\/Spivet\\/Fondos\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-03 00:59:15', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(150, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-03 00:59:22', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(151, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-03 00:59:22', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(152, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-03 01:07:48', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(153, 'PLG_ACTIONLOG_JOOMLA_USER_LOGGED_IN', '{\"action\":\"login\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-06 14:52:13', 'com_users', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(154, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-06 14:53:52', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(155, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-06 14:54:53', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(156, 'PLG_ACTIONLOG_JOOMLA_USER_LOGGED_IN', '{\"action\":\"login\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-07 01:34:36', 'com_users', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(157, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-07 01:47:54', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(158, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-07 01:47:54', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(159, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-07 01:48:21', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(160, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-07 01:48:21', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(161, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-07 01:50:53', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(162, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-07 01:50:53', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(163, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-07 01:52:47', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(164, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-07 01:52:47', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(165, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-07 01:53:25', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(166, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-07 01:53:25', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(167, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-07 02:02:48', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(168, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-07 02:02:48', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(169, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-07 02:03:22', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(170, 'PLG_ACTIONLOG_JOOMLA_EXTENSION_INSTALLED', '{\"action\":\"install\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":242,\"name\":\"Footer\",\"extension_name\":\"Footer\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-07 02:03:55', 'com_installer', 527, 242, 'COM_ACTIONLOGS_DISABLED'),
(171, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":112,\"title\":\"Footer pie de pagina\",\"extension_name\":\"Footer pie de pagina\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=112\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-07 02:06:05', 'com_modules.module', 527, 112, 'COM_ACTIONLOGS_DISABLED'),
(172, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-07 02:12:30', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(173, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-07 02:12:55', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(174, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-07 02:16:16', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(175, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-07 02:19:41', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(176, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-07 02:19:41', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(177, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-07 02:25:25', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(178, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-07 02:25:25', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(179, 'PLG_ACTIONLOG_JOOMLA_USER_LOGGED_IN', '{\"action\":\"login\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-09 00:13:08', 'com_users', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(180, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-09 00:14:16', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(181, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-09 00:14:16', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(182, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-09 00:14:57', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(183, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-09 00:14:57', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(184, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-09 00:15:42', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(185, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-09 00:16:10', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(186, 'PLG_ACTIONLOG_JOOMLA_COMPONENT_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_COMPONENT_CONFIG\",\"id\":12,\"title\":\"com_media\",\"extension_name\":\"com_media\",\"itemlink\":\"index.php?option=com_config&task=component.edit&extension_id=12\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-09 00:16:27', 'com_config.component', 527, 12, 'COM_ACTIONLOGS_DISABLED'),
(187, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":112,\"title\":\"Footer pie de pagina\",\"extension_name\":\"Footer pie de pagina\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=112\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-09 00:17:03', 'com_modules.module', 527, 112, 'COM_ACTIONLOGS_DISABLED'),
(188, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-09 00:17:03', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(189, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":112,\"title\":\"Footer pie de pagina\",\"extension_name\":\"Footer pie de pagina\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=112\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-09 00:17:38', 'com_modules.module', 527, 112, 'COM_ACTIONLOGS_DISABLED'),
(190, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-09 00:17:38', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(191, 'PLG_ACTIONLOG_JOOMLA_USER_LOGGED_IN', '{\"action\":\"login\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-12 15:55:36', 'com_users', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(192, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_CATEGORY\",\"id\":\"2\",\"title\":\"Informativa\",\"itemlink\":\"index.php?option=com_categories&task=category.edit&id=2\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 15:57:19', 'com_categories.category', 527, 2, 'COM_ACTIONLOGS_DISABLED'),
(193, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__categories\"}', '2024-02-12 15:57:19', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(194, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-12 15:58:24', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(195, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UNPUBLISHED', '{\"action\":\"unpublish\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":16,\"title\":\"Login Form\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=16\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 15:58:24', 'com_modules.module', 527, 16, 'COM_ACTIONLOGS_DISABLED'),
(196, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-12 15:58:28', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(197, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UNPUBLISHED', '{\"action\":\"unpublish\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":17,\"title\":\"Breadcrumbs\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=17\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 15:58:28', 'com_modules.module', 527, 17, 'COM_ACTIONLOGS_DISABLED'),
(198, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-12 16:04:49', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(199, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 16:05:40', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(200, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-12 16:05:40', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(201, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (incio)\",\"extension_name\":\"Home (incio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 16:06:18', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(202, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-12 16:06:18', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(203, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (inicio)\",\"extension_name\":\"Home (inicio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 16:06:57', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(204, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-12 16:06:57', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(205, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-12 16:11:01', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(206, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-12 16:11:33', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(207, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-12 16:12:36', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(208, 'PLG_ACTIONLOG_JOOMLA_USER_LOGGED_IN', '{\"action\":\"login\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-12 18:45:22', 'com_users', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(209, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-12 18:45:34', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(210, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_PUBLISHED', '{\"action\":\"publish\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":111,\"title\":\"Menu cortina\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=111\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 18:45:34', 'com_modules.module', 527, 111, 'COM_ACTIONLOGS_DISABLED'),
(211, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-12 18:52:08', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(212, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":\"logo_min_footer.png\",\"itemlink\":\"index.php?option=com_media&path=local-images:\\/Spivet\\/Header\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 18:53:01', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(213, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_STYLE\",\"id\":\"12\",\"title\":\"Licencia PQ - Default\",\"extension_name\":\"Licencia PQ - Default\",\"itemlink\":\"index.php?option=com_templates&task=style.edit&id=12\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 18:53:14', 'com_templates.style', 527, 12, 'COM_ACTIONLOGS_DISABLED'),
(214, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":111,\"title\":\"Menu cortina\",\"extension_name\":\"Menu cortina\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=111\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 18:54:16', 'com_modules.module', 527, 111, 'COM_ACTIONLOGS_DISABLED'),
(215, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-12 18:54:16', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(216, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-12 18:56:18', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(217, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__menu\"}', '2024-02-12 18:56:35', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(218, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MENU_ITEM\",\"id\":101,\"title\":\"Menu\",\"itemlink\":\"index.php?option=com_menus&task=item.edit&id=101\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 18:56:45', 'com_menus.item', 527, 101, 'COM_ACTIONLOGS_DISABLED'),
(219, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__menu\"}', '2024-02-12 18:56:45', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(220, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MENU_ITEM\",\"id\":101,\"title\":\"Menu\",\"itemlink\":\"index.php?option=com_menus&task=item.edit&id=101\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 18:56:49', 'com_menus.item', 527, 101, 'COM_ACTIONLOGS_DISABLED'),
(221, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MENU_ITEM\",\"id\":103,\"title\":\"Quienes somos\",\"itemlink\":\"index.php?option=com_menus&task=item.edit&id=103\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 18:57:42', 'com_menus.item', 527, 103, 'COM_ACTIONLOGS_DISABLED'),
(222, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__menu\"}', '2024-02-12 18:57:42', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(223, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MENU_ITEM\",\"id\":104,\"title\":\"Servicios\",\"itemlink\":\"index.php?option=com_menus&task=item.edit&id=104\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 18:58:08', 'com_menus.item', 527, 104, 'COM_ACTIONLOGS_DISABLED'),
(224, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MENU_ITEM\",\"id\":104,\"title\":\"Servicios\",\"itemlink\":\"index.php?option=com_menus&task=item.edit&id=104\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 18:58:12', 'com_menus.item', 527, 104, 'COM_ACTIONLOGS_DISABLED'),
(225, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MENU_ITEM\",\"id\":104,\"title\":\"Servicios\",\"itemlink\":\"index.php?option=com_menus&task=item.edit&id=104\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 18:58:14', 'com_menus.item', 527, 104, 'COM_ACTIONLOGS_DISABLED'),
(226, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MENU_ITEM\",\"id\":105,\"title\":\"Aviso de privacidad\",\"itemlink\":\"index.php?option=com_menus&task=item.edit&id=105\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 18:58:34', 'com_menus.item', 527, 105, 'COM_ACTIONLOGS_DISABLED'),
(227, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MENU_ITEM\",\"id\":104,\"title\":\"optionhidden\",\"itemlink\":\"index.php?option=com_menus&task=item.edit&id=104\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 19:00:47', 'com_menus.item', 527, 104, 'COM_ACTIONLOGS_DISABLED'),
(228, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__menu\"}', '2024-02-12 19:00:47', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(229, 'PLG_ACTIONLOG_JOOMLA_USER_LOGGED_IN', '{\"action\":\"login\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-12 20:35:05', 'com_users', 527, 0, 'COM_ACTIONLOGS_DISABLED');
INSERT INTO `bol96_action_logs` (`id`, `message_language_key`, `message`, `log_date`, `extension`, `user_id`, `item_id`, `ip_address`) VALUES
(230, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (inicio)\",\"extension_name\":\"Home (inicio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 20:35:29', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(231, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-12 20:35:29', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(232, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_DELETED', '{\"action\":\"delete\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":null,\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 20:36:02', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(233, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_DELETED', '{\"action\":\"delete\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":null,\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 20:36:09', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(234, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_DELETED', '{\"action\":\"delete\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":null,\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 20:36:15', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(235, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_DELETED', '{\"action\":\"delete\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":null,\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 20:36:21', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(236, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_DELETED', '{\"action\":\"delete\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":null,\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 20:36:24', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(237, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":\"auditorio.mp4\",\"itemlink\":\"index.php?option=com_media&path=local-images:\\/Spivet\\/sliders\\/principal\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 20:36:47', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(238, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":\"slider_spivet1.jpg\",\"itemlink\":\"index.php?option=com_media&path=local-images:\\/Spivet\\/sliders\\/principal\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 20:37:55', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(239, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_DELETED', '{\"action\":\"delete\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":null,\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 20:38:09', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(240, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":\"logo_spivet_grande.png\",\"itemlink\":\"index.php?option=com_media&path=local-images:\\/Spivet\\/Header\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 20:38:16', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(241, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-12 20:39:03', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(242, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_STYLE\",\"id\":\"12\",\"title\":\"Licencia PQ - Default\",\"extension_name\":\"Licencia PQ - Default\",\"itemlink\":\"index.php?option=com_templates&task=style.edit&id=12\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 20:39:23', 'com_templates.style', 527, 12, 'COM_ACTIONLOGS_DISABLED'),
(243, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_DELETED', '{\"action\":\"delete\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":null,\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 20:40:19', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(244, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":\"logo_spivet_grande.png\",\"itemlink\":\"index.php?option=com_media&path=local-images:\\/Spivet\\/Footer\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 20:40:23', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(245, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":112,\"title\":\"Footer pie de pagina\",\"extension_name\":\"Footer pie de pagina\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=112\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 20:40:31', 'com_modules.module', 527, 112, 'COM_ACTIONLOGS_DISABLED'),
(246, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-12 20:40:31', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(247, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-12 20:40:33', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(248, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (inicio)\",\"extension_name\":\"Home (inicio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 20:40:48', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(249, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-12 20:40:48', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(250, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (inicio)\",\"extension_name\":\"Home (inicio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 20:41:37', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(251, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-12 20:41:37', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(252, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (inicio)\",\"extension_name\":\"Home (inicio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 20:42:45', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(253, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-12 20:42:45', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(254, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (inicio)\",\"extension_name\":\"Home (inicio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 20:43:47', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(255, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-12 20:43:47', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(256, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (inicio)\",\"extension_name\":\"Home (inicio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 20:44:45', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(257, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-12 20:44:45', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(258, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (inicio)\",\"extension_name\":\"Home (inicio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 20:59:50', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(259, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-12 20:59:50', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(260, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (inicio)\",\"extension_name\":\"Home (inicio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 21:00:44', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(261, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-12 21:00:44', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(262, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (inicio)\",\"extension_name\":\"Home (inicio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 21:03:19', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(263, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-12 21:03:19', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(264, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (inicio)\",\"extension_name\":\"Home (inicio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 22:08:09', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(265, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-12 22:08:09', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(266, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (inicio)\",\"extension_name\":\"Home (inicio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 22:08:37', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(267, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-12 22:08:37', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(268, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (inicio)\",\"extension_name\":\"Home (inicio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 22:08:54', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(269, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-12 22:08:54', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(270, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-12 22:14:39', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(271, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":112,\"title\":\"Footer pie de pagina\",\"extension_name\":\"Footer pie de pagina\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=112\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 22:14:53', 'com_modules.module', 527, 112, 'COM_ACTIONLOGS_DISABLED'),
(272, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-12 22:14:53', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(273, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":112,\"title\":\"Footer pie de pagina\",\"extension_name\":\"Footer pie de pagina\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=112\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 22:15:59', 'com_modules.module', 527, 112, 'COM_ACTIONLOGS_DISABLED'),
(274, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-12 22:15:59', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(275, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":112,\"title\":\"Footer pie de pagina\",\"extension_name\":\"Footer pie de pagina\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=112\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 22:18:43', 'com_modules.module', 527, 112, 'COM_ACTIONLOGS_DISABLED'),
(276, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-12 22:18:43', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(277, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":112,\"title\":\"Footer pie de pagina\",\"extension_name\":\"Footer pie de pagina\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=112\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 22:19:05', 'com_modules.module', 527, 112, 'COM_ACTIONLOGS_DISABLED'),
(278, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-12 22:19:05', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(279, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":112,\"title\":\"Footer pie de pagina\",\"extension_name\":\"Footer pie de pagina\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=112\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 22:42:45', 'com_modules.module', 527, 112, 'COM_ACTIONLOGS_DISABLED'),
(280, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-12 22:42:45', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(281, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":112,\"title\":\"Footer pie de pagina\",\"extension_name\":\"Footer pie de pagina\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=112\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 22:43:06', 'com_modules.module', 527, 112, 'COM_ACTIONLOGS_DISABLED'),
(282, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-12 22:43:06', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(283, 'PLG_ACTIONLOG_JOOMLA_USER_LOGGED_IN', '{\"action\":\"login\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-12 23:56:54', 'com_users', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(284, 'PLG_ACTIONLOG_JOOMLA_APPLICATION_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_APPLICATION_CONFIG\",\"extension_name\":\"com_config.application\",\"itemlink\":\"index.php?option=com_config\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 23:57:48', 'com_config.application', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(285, 'PLG_ACTIONLOG_JOOMLA_APPLICATION_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_APPLICATION_CONFIG\",\"extension_name\":\"com_config.application\",\"itemlink\":\"index.php?option=com_config\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 23:58:39', 'com_config.application', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(286, 'PLG_ACTIONLOG_JOOMLA_APPLICATION_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_APPLICATION_CONFIG\",\"extension_name\":\"com_config.application\",\"itemlink\":\"index.php?option=com_config\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-12 23:59:02', 'com_config.application', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(287, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MENU_ITEM\",\"id\":106,\"title\":\"Oferta\",\"itemlink\":\"index.php?option=com_menus&task=item.edit&id=106\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-13 00:00:42', 'com_menus.item', 527, 106, 'COM_ACTIONLOGS_DISABLED'),
(288, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MENU_ITEM\",\"id\":106,\"title\":\"Oferta\",\"itemlink\":\"index.php?option=com_menus&task=item.edit&id=106\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-13 00:01:27', 'com_menus.item', 527, 106, 'COM_ACTIONLOGS_DISABLED'),
(289, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__menu\"}', '2024-02-13 00:01:27', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(290, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__menu\"}', '2024-02-13 00:04:53', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(291, 'PLG_ACTIONLOG_JOOMLA_APPLICATION_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_APPLICATION_CONFIG\",\"extension_name\":\"com_config.application\",\"itemlink\":\"index.php?option=com_config\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-13 00:06:23', 'com_config.application', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(292, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MENU_ITEM\",\"id\":106,\"title\":\"Oferta\",\"itemlink\":\"index.php?option=com_menus&task=item.edit&id=106\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-13 00:08:41', 'com_menus.item', 527, 106, 'COM_ACTIONLOGS_DISABLED'),
(293, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__menu\"}', '2024-02-13 00:08:41', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(294, 'PLG_ACTIONLOG_JOOMLA_USER_LOGGED_IN', '{\"action\":\"login\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-13 16:45:05', 'com_users', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(295, 'PLG_ACTIONLOG_JOOMLA_EXTENSION_INSTALLED', '{\"action\":\"install\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":243,\"name\":\"Oferta detalle\",\"extension_name\":\"Oferta detalle\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-13 16:45:20', 'com_installer', 527, 243, 'COM_ACTIONLOGS_DISABLED'),
(296, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":113,\"title\":\"Oferta\",\"extension_name\":\"Oferta\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=113\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-13 16:45:56', 'com_modules.module', 527, 113, 'COM_ACTIONLOGS_DISABLED'),
(297, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":113,\"title\":\"Oferta\",\"extension_name\":\"Oferta\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=113\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-13 16:46:09', 'com_modules.module', 527, 113, 'COM_ACTIONLOGS_DISABLED'),
(298, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-13 16:46:09', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(299, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-13 16:46:10', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(300, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-13 16:47:19', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(301, 'PLG_ACTIONLOG_JOOMLA_APPLICATION_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_APPLICATION_CONFIG\",\"extension_name\":\"com_config.application\",\"itemlink\":\"index.php?option=com_config\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-13 17:00:30', 'com_config.application', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(302, 'PLG_ACTIONLOG_JOOMLA_APPLICATION_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_APPLICATION_CONFIG\",\"extension_name\":\"com_config.application\",\"itemlink\":\"index.php?option=com_config\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-13 17:03:56', 'com_config.application', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(303, 'PLG_ACTIONLOG_JOOMLA_APPLICATION_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_APPLICATION_CONFIG\",\"extension_name\":\"com_config.application\",\"itemlink\":\"index.php?option=com_config\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-13 17:10:00', 'com_config.application', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(304, 'PLG_ACTIONLOG_JOOMLA_APPLICATION_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_APPLICATION_CONFIG\",\"extension_name\":\"com_config.application\",\"itemlink\":\"index.php?option=com_config\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-13 17:13:08', 'com_config.application', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(305, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MENU_ITEM\",\"id\":106,\"title\":\"Oferta academica\",\"itemlink\":\"index.php?option=com_menus&task=item.edit&id=106\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-13 17:17:34', 'com_menus.item', 527, 106, 'COM_ACTIONLOGS_DISABLED'),
(306, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__menu\"}', '2024-02-13 17:17:34', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(307, 'PLG_ACTIONLOG_JOOMLA_APPLICATION_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_APPLICATION_CONFIG\",\"extension_name\":\"com_config.application\",\"itemlink\":\"index.php?option=com_config\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-13 17:23:29', 'com_config.application', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(308, 'PLG_ACTIONLOG_JOOMLA_APPLICATION_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_APPLICATION_CONFIG\",\"extension_name\":\"com_config.application\",\"itemlink\":\"index.php?option=com_config\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-13 17:48:22', 'com_config.application', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(309, 'PLG_ACTIONLOG_JOOMLA_APPLICATION_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_APPLICATION_CONFIG\",\"extension_name\":\"com_config.application\",\"itemlink\":\"index.php?option=com_config\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-13 17:53:10', 'com_config.application', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(310, 'PLG_ACTIONLOG_JOOMLA_APPLICATION_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_APPLICATION_CONFIG\",\"extension_name\":\"com_config.application\",\"itemlink\":\"index.php?option=com_config\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-13 17:58:25', 'com_config.application', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(311, 'PLG_ACTIONLOG_JOOMLA_APPLICATION_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_APPLICATION_CONFIG\",\"extension_name\":\"com_config.application\",\"itemlink\":\"index.php?option=com_config\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-13 17:59:02', 'com_config.application', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(312, 'PLG_ACTIONLOG_JOOMLA_APPLICATION_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_APPLICATION_CONFIG\",\"extension_name\":\"com_config.application\",\"itemlink\":\"index.php?option=com_config\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-13 18:01:22', 'com_config.application', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(313, 'PLG_ACTIONLOG_JOOMLA_APPLICATION_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_APPLICATION_CONFIG\",\"extension_name\":\"com_config.application\",\"itemlink\":\"index.php?option=com_config\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-13 18:01:46', 'com_config.application', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(314, 'PLG_ACTIONLOG_JOOMLA_APPLICATION_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_APPLICATION_CONFIG\",\"extension_name\":\"com_config.application\",\"itemlink\":\"index.php?option=com_config\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-13 18:07:12', 'com_config.application', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(315, 'PLG_ACTIONLOG_JOOMLA_APPLICATION_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_APPLICATION_CONFIG\",\"extension_name\":\"com_config.application\",\"itemlink\":\"index.php?option=com_config\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-13 18:08:53', 'com_config.application', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(316, 'PLG_ACTIONLOG_JOOMLA_APPLICATION_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_APPLICATION_CONFIG\",\"extension_name\":\"com_config.application\",\"itemlink\":\"index.php?option=com_config\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-13 18:09:54', 'com_config.application', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(317, 'PLG_ACTIONLOG_JOOMLA_APPLICATION_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_APPLICATION_CONFIG\",\"extension_name\":\"com_config.application\",\"itemlink\":\"index.php?option=com_config\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-13 18:10:45', 'com_config.application', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(318, 'PLG_ACTIONLOG_JOOMLA_APPLICATION_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_APPLICATION_CONFIG\",\"extension_name\":\"com_config.application\",\"itemlink\":\"index.php?option=com_config\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-13 18:17:46', 'com_config.application', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(319, 'PLG_ACTIONLOG_JOOMLA_APPLICATION_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_APPLICATION_CONFIG\",\"extension_name\":\"com_config.application\",\"itemlink\":\"index.php?option=com_config\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-13 18:22:20', 'com_config.application', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(320, 'PLG_ACTIONLOG_JOOMLA_APPLICATION_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_APPLICATION_CONFIG\",\"extension_name\":\"com_config.application\",\"itemlink\":\"index.php?option=com_config\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-13 18:29:59', 'com_config.application', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(321, 'PLG_ACTIONLOG_JOOMLA_APPLICATION_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_APPLICATION_CONFIG\",\"extension_name\":\"com_config.application\",\"itemlink\":\"index.php?option=com_config\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-13 18:30:34', 'com_config.application', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(322, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__menu\"}', '2024-02-13 18:48:05', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(323, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MENU_ITEM\",\"id\":106,\"title\":\"Oferta\",\"itemlink\":\"index.php?option=com_menus&task=item.edit&id=106\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-13 19:00:51', 'com_menus.item', 527, 106, 'COM_ACTIONLOGS_DISABLED'),
(324, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__menu\"}', '2024-02-13 19:00:51', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(325, 'PLG_ACTIONLOG_JOOMLA_USER_LOGGED_IN', '{\"action\":\"login\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-15 21:52:10', 'com_users', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(326, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MENU_ITEM\",\"id\":106,\"title\":\"Oferta\",\"itemlink\":\"index.php?option=com_menus&task=item.edit&id=106\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-15 21:52:59', 'com_menus.item', 527, 106, 'COM_ACTIONLOGS_DISABLED'),
(327, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__menu\"}', '2024-02-15 21:52:59', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(328, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MENU_ITEM\",\"id\":106,\"title\":\"Oferta\",\"itemlink\":\"index.php?option=com_menus&task=item.edit&id=106\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-15 21:53:00', 'com_menus.item', 527, 106, 'COM_ACTIONLOGS_DISABLED'),
(329, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MENU_ITEM\",\"id\":107,\"title\":\"Servicios\",\"itemlink\":\"index.php?option=com_menus&task=item.edit&id=107\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-15 21:53:21', 'com_menus.item', 527, 107, 'COM_ACTIONLOGS_DISABLED'),
(330, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MENU_ITEM\",\"id\":108,\"title\":\"Servicio carrito compra\",\"itemlink\":\"index.php?option=com_menus&task=item.edit&id=108\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-15 21:53:58', 'com_menus.item', 527, 108, 'COM_ACTIONLOGS_DISABLED'),
(331, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MENU_ITEM\",\"id\":109,\"title\":\"Formulario de pago\",\"itemlink\":\"index.php?option=com_menus&task=item.edit&id=109\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-15 21:54:59', 'com_menus.item', 527, 109, 'COM_ACTIONLOGS_DISABLED'),
(332, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__menu\"}', '2024-02-15 21:58:30', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(333, 'PLG_ACTIONLOG_JOOMLA_EXTENSION_INSTALLED', '{\"action\":\"install\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":246,\"name\":\"Carrito de compra\",\"extension_name\":\"Carrito de compra\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-15 21:58:41', 'com_installer', 527, 246, 'COM_ACTIONLOGS_DISABLED'),
(334, 'PLG_ACTIONLOG_JOOMLA_EXTENSION_INSTALLED', '{\"action\":\"install\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":247,\"name\":\"Formulario de carrito\",\"extension_name\":\"Formulario de carrito\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-15 21:58:41', 'com_installer', 527, 247, 'COM_ACTIONLOGS_DISABLED'),
(335, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":114,\"title\":\"Servicios (Carrito de compra)\",\"extension_name\":\"Servicios (Carrito de compra)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=114\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-15 22:00:12', 'com_modules.module', 527, 114, 'COM_ACTIONLOGS_DISABLED'),
(336, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":114,\"title\":\"Servicios (Carrito de compra)\",\"extension_name\":\"Servicios (Carrito de compra)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=114\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-15 22:00:18', 'com_modules.module', 527, 114, 'COM_ACTIONLOGS_DISABLED'),
(337, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-15 22:00:18', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(338, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-15 22:00:20', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(339, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":113,\"title\":\"Oferta (informacion detalle)\",\"extension_name\":\"Oferta (informacion detalle)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=113\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-15 22:01:34', 'com_modules.module', 527, 113, 'COM_ACTIONLOGS_DISABLED'),
(340, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-15 22:01:34', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(341, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-15 22:01:43', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(342, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":115,\"title\":\"Formulario de carrito de compra\",\"extension_name\":\"Formulario de carrito de compra\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=115\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-15 22:02:28', 'com_modules.module', 527, 115, 'COM_ACTIONLOGS_DISABLED'),
(343, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-15 22:16:29', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(344, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MENU_ITEM\",\"id\":109,\"title\":\"Formulario de pago\",\"itemlink\":\"index.php?option=com_menus&task=item.edit&id=109\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-15 22:16:45', 'com_menus.item', 527, 109, 'COM_ACTIONLOGS_DISABLED'),
(345, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__menu\"}', '2024-02-15 22:16:45', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED');
INSERT INTO `bol96_action_logs` (`id`, `message_language_key`, `message`, `log_date`, `extension`, `user_id`, `item_id`, `ip_address`) VALUES
(346, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MENU_ITEM\",\"id\":108,\"title\":\"Servicio carrito compra\",\"itemlink\":\"index.php?option=com_menus&task=item.edit&id=108\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-15 22:17:00', 'com_menus.item', 527, 108, 'COM_ACTIONLOGS_DISABLED'),
(347, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__menu\"}', '2024-02-15 22:17:00', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(348, 'PLG_ACTIONLOG_JOOMLA_USER_LOGIN_FAILED', '{\"action\":\"login\",\"id\":527,\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-20 18:22:35', 'com_users', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(349, 'PLG_ACTIONLOG_JOOMLA_USER_LOGIN_FAILED', '{\"action\":\"login\",\"id\":527,\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-20 18:24:00', 'com_users', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(350, 'PLG_ACTIONLOG_JOOMLA_USER_LOGGED_IN', '{\"action\":\"login\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-20 18:24:19', 'com_users', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(351, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 19:33:46', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(352, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":\"Brochure Spivet 2023.mp4\",\"itemlink\":\"index.php?option=com_media&path=local-images:\\/Spivet\\/sliders\\/principal\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 19:41:58', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(353, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 19:42:30', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(354, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 19:43:20', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(355, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (inicio)\",\"extension_name\":\"Home (inicio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 19:44:04', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(356, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 19:44:04', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(357, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (inicio)\",\"extension_name\":\"Home (inicio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 19:45:09', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(358, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 19:45:09', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(359, 'PLG_ACTIONLOG_JOOMLA_USER_LOGGED_IN', '{\"action\":\"login\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-20 20:03:51', 'com_users', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(360, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (inicio)\",\"extension_name\":\"Home (inicio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 20:05:26', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(361, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 20:05:26', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(362, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (inicio)\",\"extension_name\":\"Home (inicio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 20:07:26', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(363, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 20:07:26', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(364, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (inicio)\",\"extension_name\":\"Home (inicio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 20:08:04', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(365, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 20:08:04', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(366, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (inicio)\",\"extension_name\":\"Home (inicio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 20:08:19', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(367, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 20:08:19', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(368, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 20:20:16', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(369, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (inicio)\",\"extension_name\":\"Home (inicio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 20:20:41', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(370, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 20:20:41', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(371, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":\"Frame 2.png\",\"itemlink\":\"index.php?option=com_media&path=local-images:\\/Spivet\\/Fondos\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 20:30:45', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(372, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (inicio)\",\"extension_name\":\"Home (inicio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 20:41:39', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(373, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 20:41:39', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(374, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 20:42:07', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(375, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (inicio)\",\"extension_name\":\"Home (inicio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 20:42:22', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(376, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 20:42:22', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(377, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 20:42:29', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(378, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (inicio)\",\"extension_name\":\"Home (inicio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 20:42:59', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(379, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 20:42:59', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(380, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":\"Imagen_que_hace_la_plataforma.png\",\"itemlink\":\"index.php?option=com_media&path=local-images:\\/Spivet\\/Fondos\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 21:33:55', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(381, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (inicio)\",\"extension_name\":\"Home (inicio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 21:34:00', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(382, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 21:34:00', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(383, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":\"icono_ticket.png\",\"itemlink\":\"index.php?option=com_media&path=local-images:\\/Spivet\\/ValoresMarca\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 21:52:32', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(384, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":\"icono_personalizacion.png\",\"itemlink\":\"index.php?option=com_media&path=local-images:\\/Spivet\\/ValoresMarca\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 21:52:54', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(385, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (inicio)\",\"extension_name\":\"Home (inicio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 21:52:58', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(386, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 21:52:58', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(387, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":\"icono_ticket2.png\",\"itemlink\":\"index.php?option=com_media&path=local-images:\\/Spivet\\/ValoresMarca\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 21:54:23', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(388, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":\"icono_personalizacion2.png\",\"itemlink\":\"index.php?option=com_media&path=local-images:\\/Spivet\\/ValoresMarca\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 21:54:35', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(389, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (inicio)\",\"extension_name\":\"Home (inicio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 21:54:40', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(390, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 21:54:40', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(391, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (inicio)\",\"extension_name\":\"Home (inicio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 21:55:25', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(392, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 21:55:25', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(393, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (inicio)\",\"extension_name\":\"Home (inicio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 21:57:33', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(394, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 21:57:33', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(395, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 21:58:47', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(396, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":112,\"title\":\"Footer pie de pagina\",\"extension_name\":\"Footer pie de pagina\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=112\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 22:03:15', 'com_modules.module', 527, 112, 'COM_ACTIONLOGS_DISABLED'),
(397, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 22:03:15', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(398, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":112,\"title\":\"Footer pie de pagina\",\"extension_name\":\"Footer pie de pagina\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=112\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 22:03:48', 'com_modules.module', 527, 112, 'COM_ACTIONLOGS_DISABLED'),
(399, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 22:03:48', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(400, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 22:04:11', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(401, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":\"portada_slider.png\",\"itemlink\":\"index.php?option=com_media&path=local-images:\\/Spivet\\/sliders\\/principal\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 22:06:33', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(402, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (inicio)\",\"extension_name\":\"Home (inicio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 22:06:38', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(403, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 22:06:38', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(404, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 22:09:38', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(405, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":\"Copia de Brochure Spivet 2023.mp4\",\"itemlink\":\"index.php?option=com_media&path=local-images:\\/Spivet\\/sliders\\/principal\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 22:10:44', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(406, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (inicio)\",\"extension_name\":\"Home (inicio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 22:11:53', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(407, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 22:11:53', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(408, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (inicio)\",\"extension_name\":\"Home (inicio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 22:12:29', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(409, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 22:12:29', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(410, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 22:13:25', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(411, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":\"logo_athlos_negro-03.png\",\"itemlink\":\"index.php?option=com_media&path=local-images:\\/Spivet\\/sliders\\/alianzas\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 22:15:06', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(412, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":\"remeras_final-01.png\",\"itemlink\":\"index.php?option=com_media&path=local-images:\\/Spivet\\/sliders\\/alianzas\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 22:15:53', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(413, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":\"nuevo_logo_piquero_2022-08.png\",\"itemlink\":\"index.php?option=com_media&path=local-images:\\/Spivet\\/sliders\\/alianzas\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 22:16:42', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(414, 'PLG_ACTIONLOG_JOOMLA_USER_LOGGED_IN', '{\"action\":\"login\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-20 22:16:53', 'com_users', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(415, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":111,\"title\":\"Menu cortina\",\"extension_name\":\"Menu cortina\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=111\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 22:17:05', 'com_modules.module', 527, 111, 'COM_ACTIONLOGS_DISABLED'),
(416, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 22:17:05', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(417, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":\"logo_unity_negro-07.png\",\"itemlink\":\"index.php?option=com_media&path=local-images:\\/Spivet\\/sliders\\/alianzas\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 22:18:59', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(418, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":\"logo_unity_negro-06.png\",\"itemlink\":\"index.php?option=com_media&path=local-images:\\/Spivet\\/sliders\\/alianzas\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 22:18:59', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(419, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (inicio)\",\"extension_name\":\"Home (inicio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 22:19:13', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(420, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 22:19:13', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(421, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (inicio)\",\"extension_name\":\"Home (inicio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 22:20:07', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(422, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 22:20:07', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(423, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 22:20:33', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(424, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":\"letraSpivet.png\",\"itemlink\":\"index.php?option=com_media&path=local-images:\\/Spivet\\/Icons\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 22:20:49', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(425, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":111,\"title\":\"Menu cortina\",\"extension_name\":\"Menu cortina\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=111\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 22:21:10', 'com_modules.module', 527, 111, 'COM_ACTIONLOGS_DISABLED'),
(426, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 22:21:10', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(427, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 22:21:58', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(428, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MENU_ITEM\",\"id\":107,\"title\":\"Servicios\",\"itemlink\":\"index.php?option=com_menus&task=item.edit&id=107\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 22:22:37', 'com_menus.item', 527, 107, 'COM_ACTIONLOGS_DISABLED'),
(429, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__menu\"}', '2024-02-20 22:22:37', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(430, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__menu\"}', '2024-02-20 22:22:50', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(431, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MENU_ITEM\",\"id\":110,\"title\":\"Servicios\",\"itemlink\":\"index.php?option=com_menus&task=item.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 22:23:16', 'com_menus.item', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(432, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MENU_ITEM\",\"id\":103,\"title\":\"Quienes somos\",\"itemlink\":\"index.php?option=com_menus&task=item.edit&id=103\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 22:23:30', 'com_menus.item', 527, 103, 'COM_ACTIONLOGS_DISABLED'),
(433, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__menu\"}', '2024-02-20 22:23:30', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(434, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MENU_ITEM\",\"id\":103,\"title\":\"Quienes somos\",\"itemlink\":\"index.php?option=com_menus&task=item.edit&id=103\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 22:23:32', 'com_menus.item', 527, 103, 'COM_ACTIONLOGS_DISABLED'),
(435, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MENU_ITEM\",\"id\":105,\"title\":\"Aviso de privacidad\",\"itemlink\":\"index.php?option=com_menus&task=item.edit&id=105\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 22:23:45', 'com_menus.item', 527, 105, 'COM_ACTIONLOGS_DISABLED'),
(436, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__menu\"}', '2024-02-20 22:23:45', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(437, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__menu\"}', '2024-02-20 22:24:48', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(438, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UNPUBLISHED', '{\"action\":\"unpublish\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MENU_ITEM\",\"id\":104,\"title\":\"optionhidden\",\"itemlink\":\"index.php?option=com_menus&task=item.edit&id=104\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 22:24:48', 'com_menus.item', 527, 104, 'COM_ACTIONLOGS_DISABLED'),
(439, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MENU_ITEM\",\"id\":103,\"title\":\"Quienes somos\",\"itemlink\":\"index.php?option=com_menus&task=item.edit&id=103\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 22:25:23', 'com_menus.item', 527, 103, 'COM_ACTIONLOGS_DISABLED'),
(440, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__menu\"}', '2024-02-20 22:25:23', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(441, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":\"logo_spivet_3-06 2.png\",\"itemlink\":\"index.php?option=com_media&path=local-images:\\/Spivet\\/Icons\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 22:31:43', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(442, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":111,\"title\":\"Menu cortina\",\"extension_name\":\"Menu cortina\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=111\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 22:32:02', 'com_modules.module', 527, 111, 'COM_ACTIONLOGS_DISABLED'),
(443, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 22:32:02', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(444, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":\"logo_spivet_2.png\",\"itemlink\":\"index.php?option=com_media&path=local-images:\\/Spivet\\/Icons\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 22:33:12', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(445, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":111,\"title\":\"Menu cortina\",\"extension_name\":\"Menu cortina\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=111\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 22:33:20', 'com_modules.module', 527, 111, 'COM_ACTIONLOGS_DISABLED'),
(446, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 22:33:20', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(447, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":\"fondo_cortina.png\",\"itemlink\":\"index.php?option=com_media&path=local-images:\\/Spivet\\/Icons\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 22:34:19', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(448, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":111,\"title\":\"Menu cortina\",\"extension_name\":\"Menu cortina\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=111\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 22:34:23', 'com_modules.module', 527, 111, 'COM_ACTIONLOGS_DISABLED'),
(449, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 22:34:23', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(450, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 22:35:26', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(451, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":112,\"title\":\"Footer pie de pagina\",\"extension_name\":\"Footer pie de pagina\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=112\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 22:38:14', 'com_modules.module', 527, 112, 'COM_ACTIONLOGS_DISABLED'),
(452, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 22:38:14', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(453, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 22:38:17', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(454, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 22:38:38', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(455, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 22:38:49', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(456, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 22:39:08', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(457, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":114,\"title\":\"Servicios (Carrito de compra)\",\"extension_name\":\"Servicios (Carrito de compra)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=114\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 22:39:21', 'com_modules.module', 527, 114, 'COM_ACTIONLOGS_DISABLED'),
(458, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 22:39:21', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(459, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 22:39:27', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED');
INSERT INTO `bol96_action_logs` (`id`, `message_language_key`, `message`, `log_date`, `extension`, `user_id`, `item_id`, `ip_address`) VALUES
(460, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 22:39:33', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(461, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (inicio)\",\"extension_name\":\"Home (inicio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 22:39:51', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(462, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 22:39:51', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(463, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 22:40:23', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(464, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (inicio)\",\"extension_name\":\"Home (inicio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 22:43:53', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(465, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 22:43:53', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(466, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 22:44:09', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(467, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (inicio)\",\"extension_name\":\"Home (inicio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 22:58:20', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(468, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 22:58:20', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(469, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (inicio)\",\"extension_name\":\"Home (inicio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 22:58:54', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(470, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 22:58:54', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(471, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (inicio)\",\"extension_name\":\"Home (inicio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 22:59:40', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(472, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 22:59:40', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(473, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":110,\"title\":\"Home (inicio)\",\"extension_name\":\"Home (inicio)\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=110\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 23:00:06', 'com_modules.module', 527, 110, 'COM_ACTIONLOGS_DISABLED'),
(474, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 23:00:06', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(475, 'PLG_ACTIONLOG_JOOMLA_EXTENSION_INSTALLED', '{\"action\":\"install\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":248,\"name\":\"Modulo Generico Spivet\",\"extension_name\":\"Modulo Generico Spivet\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 23:31:19', 'com_installer', 527, 248, 'COM_ACTIONLOGS_DISABLED'),
(476, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":116,\"title\":\"Aviso de privacidad\",\"extension_name\":\"Aviso de privacidad\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=116\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 23:32:57', 'com_modules.module', 527, 116, 'COM_ACTIONLOGS_DISABLED'),
(477, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":116,\"title\":\"Aviso de privacidad\",\"extension_name\":\"Aviso de privacidad\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=116\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 23:33:10', 'com_modules.module', 527, 116, 'COM_ACTIONLOGS_DISABLED'),
(478, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 23:33:10', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(479, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 23:42:46', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(480, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 23:42:56', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(481, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MENU_ITEM\",\"id\":109,\"title\":\"Formulario de pago\",\"itemlink\":\"index.php?option=com_menus&task=item.edit&id=109\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 23:43:08', 'com_menus.item', 527, 109, 'COM_ACTIONLOGS_DISABLED'),
(482, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__menu\"}', '2024-02-20 23:43:08', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(483, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":115,\"title\":\"Formulario de carrito de compra\",\"extension_name\":\"Formulario de carrito de compra\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=115\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-20 23:44:36', 'com_modules.module', 527, 115, 'COM_ACTIONLOGS_DISABLED'),
(484, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-20 23:44:36', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(485, 'PLG_ACTIONLOG_JOOMLA_USER_LOGGED_IN', '{\"action\":\"login\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-21 00:02:27', 'com_users', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(486, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-21 00:10:06', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(487, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-21 00:13:35', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(488, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-21 00:13:42', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(489, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-21 00:13:51', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(490, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-21 00:13:57', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(491, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_TRASHED', '{\"action\":\"trash\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":17,\"title\":\"Breadcrumbs\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=17\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-21 00:14:13', 'com_modules.module', 527, 17, 'COM_ACTIONLOGS_DISABLED'),
(492, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_TRASHED', '{\"action\":\"trash\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":16,\"title\":\"Login Form\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=16\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-21 00:14:13', 'com_modules.module', 527, 16, 'COM_ACTIONLOGS_DISABLED'),
(493, 'PLG_ACTIONLOG_JOOMLA_USER_LOGGED_IN', '{\"action\":\"login\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-21 16:40:11', 'com_users', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(494, 'PLG_ACTIONLOG_JOOMLA_USER_LOGGED_IN', '{\"action\":\"login\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-21 17:21:49', 'com_users', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(495, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-21 17:24:45', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(496, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-21 17:24:58', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(497, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":116,\"title\":\"Aviso de privacidad\",\"extension_name\":\"Aviso de privacidad\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=116\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-21 17:33:41', 'com_modules.module', 527, 116, 'COM_ACTIONLOGS_DISABLED'),
(498, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-21 17:33:41', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(499, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-21 17:33:50', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(500, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":112,\"title\":\"Footer pie de pagina\",\"extension_name\":\"Footer pie de pagina\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=112\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-21 17:34:41', 'com_modules.module', 527, 112, 'COM_ACTIONLOGS_DISABLED'),
(501, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-21 17:34:41', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(502, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":112,\"title\":\"Footer pie de pagina\",\"extension_name\":\"Footer pie de pagina\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=112\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-21 17:35:31', 'com_modules.module', 527, 112, 'COM_ACTIONLOGS_DISABLED'),
(503, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-21 17:35:31', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(504, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":112,\"title\":\"Footer pie de pagina\",\"extension_name\":\"Footer pie de pagina\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=112\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-21 17:36:03', 'com_modules.module', 527, 112, 'COM_ACTIONLOGS_DISABLED'),
(505, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-21 17:36:03', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(506, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-21 17:37:20', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(507, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-21 17:37:32', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(508, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":112,\"title\":\"Footer pie de pagina\",\"extension_name\":\"Footer pie de pagina\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=112\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-21 17:38:58', 'com_modules.module', 527, 112, 'COM_ACTIONLOGS_DISABLED'),
(509, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-21 17:38:58', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(510, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-21 17:39:25', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(511, 'PLG_ACTIONLOG_JOOMLA_USER_LOGGED_IN', '{\"action\":\"login\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-21 18:58:07', 'com_users', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(512, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":116,\"title\":\"Aviso de privacidad\",\"extension_name\":\"Aviso de privacidad\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=116\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-21 18:58:41', 'com_modules.module', 527, 116, 'COM_ACTIONLOGS_DISABLED'),
(513, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-21 18:58:41', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(514, 'PLG_ACTIONLOG_JOOMLA_USER_LOGGED_IN', '{\"action\":\"login\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-21 19:17:35', 'com_users', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(515, 'PLG_ACTIONLOG_JOOMLA_EXTENSION_INSTALLED', '{\"action\":\"install\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":250,\"name\":\"Modulo de widget contactanos\",\"extension_name\":\"Modulo de widget contactanos\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-21 19:17:51', 'com_installer', 527, 250, 'COM_ACTIONLOGS_DISABLED'),
(516, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":117,\"title\":\"Widget contactanos\",\"extension_name\":\"Widget contactanos\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=117\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-21 19:18:34', 'com_modules.module', 527, 117, 'COM_ACTIONLOGS_DISABLED'),
(517, 'PLG_ACTIONLOG_JOOMLA_USER_LOGGED_IN', '{\"action\":\"login\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-21 19:20:09', 'com_users', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(518, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":\"Group 297.png\",\"itemlink\":\"index.php?option=com_media&path=local-images:\\/Spivet\\/Iconos de widget\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-21 19:20:51', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(519, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":117,\"title\":\"Widget contactanos\",\"extension_name\":\"Widget contactanos\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=117\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-21 19:21:00', 'com_modules.module', 527, 117, 'COM_ACTIONLOGS_DISABLED'),
(520, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-21 19:21:00', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(521, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":117,\"title\":\"Widget contactanos\",\"extension_name\":\"Widget contactanos\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=117\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-21 19:21:10', 'com_modules.module', 527, 117, 'COM_ACTIONLOGS_DISABLED'),
(522, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-21 19:21:10', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(523, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-21 19:26:17', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(524, 'PLG_ACTIONLOG_JOOMLA_USER_LOGGED_IN', '{\"action\":\"login\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-21 20:14:46', 'com_users', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(525, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-21 20:15:00', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(526, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__menu\"}', '2024-02-21 20:15:11', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(527, 'PLG_ACTIONLOG_JOOMLA_APPLICATION_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_APPLICATION_CONFIG\",\"extension_name\":\"com_config.application\",\"itemlink\":\"index.php?option=com_config\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 00:19:52', 'com_config.application', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(528, 'PLG_ACTIONLOG_JOOMLA_APPLICATION_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_APPLICATION_CONFIG\",\"extension_name\":\"com_config.application\",\"itemlink\":\"index.php?option=com_config\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 00:21:18', 'com_config.application', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(529, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__menu\"}', '2024-02-22 00:22:47', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(530, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__menu\"}', '2024-02-22 00:23:43', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(531, 'PLG_ACTIONLOG_JOOMLA_APPLICATION_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_APPLICATION_CONFIG\",\"extension_name\":\"com_config.application\",\"itemlink\":\"index.php?option=com_config\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 00:24:16', 'com_config.application', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(532, 'PLG_ACTIONLOG_JOOMLA_APPLICATION_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_APPLICATION_CONFIG\",\"extension_name\":\"com_config.application\",\"itemlink\":\"index.php?option=com_config\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 00:24:44', 'com_config.application', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(533, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MENU_ITEM\",\"id\":105,\"title\":\"Aviso de privacidad\",\"itemlink\":\"index.php?option=com_menus&task=item.edit&id=105\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 00:26:21', 'com_menus.item', 527, 105, 'COM_ACTIONLOGS_DISABLED'),
(534, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__menu\"}', '2024-02-22 00:26:21', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(535, 'PLG_ACTIONLOG_JOOMLA_APPLICATION_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_APPLICATION_CONFIG\",\"extension_name\":\"com_config.application\",\"itemlink\":\"index.php?option=com_config\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 00:26:56', 'com_config.application', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(536, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MENU_ITEM\",\"id\":105,\"title\":\"Aviso de privacidad\",\"itemlink\":\"index.php?option=com_menus&task=item.edit&id=105\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 00:27:20', 'com_menus.item', 527, 105, 'COM_ACTIONLOGS_DISABLED'),
(537, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__menu\"}', '2024-02-22 00:27:20', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(538, 'PLG_ACTIONLOG_JOOMLA_APPLICATION_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_APPLICATION_CONFIG\",\"extension_name\":\"com_config.application\",\"itemlink\":\"index.php?option=com_config\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 00:28:07', 'com_config.application', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(539, 'PLG_ACTIONLOG_JOOMLA_APPLICATION_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_APPLICATION_CONFIG\",\"extension_name\":\"com_config.application\",\"itemlink\":\"index.php?option=com_config\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 00:29:39', 'com_config.application', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(540, 'PLG_ACTIONLOG_JOOMLA_APPLICATION_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_APPLICATION_CONFIG\",\"extension_name\":\"com_config.application\",\"itemlink\":\"index.php?option=com_config\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 00:30:32', 'com_config.application', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(541, 'PLG_ACTIONLOG_JOOMLA_APPLICATION_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_APPLICATION_CONFIG\",\"extension_name\":\"com_config.application\",\"itemlink\":\"index.php?option=com_config\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 00:30:48', 'com_config.application', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(542, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MENU_ITEM\",\"id\":105,\"title\":\"Aviso de privacidad\",\"itemlink\":\"index.php?option=com_menus&task=item.edit&id=105\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 00:32:09', 'com_menus.item', 527, 105, 'COM_ACTIONLOGS_DISABLED'),
(543, 'PLG_ACTIONLOG_JOOMLA_APPLICATION_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_APPLICATION_CONFIG\",\"extension_name\":\"com_config.application\",\"itemlink\":\"index.php?option=com_config\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 00:32:19', 'com_config.application', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(544, 'PLG_ACTIONLOG_JOOMLA_APPLICATION_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_APPLICATION_CONFIG\",\"extension_name\":\"com_config.application\",\"itemlink\":\"index.php?option=com_config\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 00:32:31', 'com_config.application', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(545, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MENU_ITEM\",\"id\":105,\"title\":\"Aviso de privacidad\",\"itemlink\":\"index.php?option=com_menus&task=item.edit&id=105\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 00:32:40', 'com_menus.item', 527, 105, 'COM_ACTIONLOGS_DISABLED'),
(546, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MENU_ITEM\",\"id\":105,\"title\":\"Aviso de privacidad\",\"itemlink\":\"index.php?option=com_menus&task=item.edit&id=105\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 00:35:33', 'com_menus.item', 527, 105, 'COM_ACTIONLOGS_DISABLED'),
(547, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MENU_ITEM\",\"id\":105,\"title\":\"Aviso de privacidad\",\"itemlink\":\"index.php?option=com_menus&task=item.edit&id=105\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 00:35:43', 'com_menus.item', 527, 105, 'COM_ACTIONLOGS_DISABLED'),
(548, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-22 00:36:49', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(549, 'PLG_ACTIONLOG_JOOMLA_COMPONENT_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_COMPONENT_CONFIG\",\"id\":13,\"title\":\"com_menus\",\"extension_name\":\"com_menus\",\"itemlink\":\"index.php?option=com_config&task=component.edit&extension_id=13\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 00:38:29', 'com_config.component', 527, 13, 'COM_ACTIONLOGS_DISABLED'),
(550, 'PLG_ACTIONLOG_JOOMLA_COMPONENT_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_COMPONENT_CONFIG\",\"id\":13,\"title\":\"com_menus\",\"extension_name\":\"com_menus\",\"itemlink\":\"index.php?option=com_config&task=component.edit&extension_id=13\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 00:38:41', 'com_config.component', 527, 13, 'COM_ACTIONLOGS_DISABLED'),
(551, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MENU_ITEM\",\"id\":105,\"title\":\"Aviso de privacidad\",\"itemlink\":\"index.php?option=com_menus&task=item.edit&id=105\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 00:39:05', 'com_menus.item', 527, 105, 'COM_ACTIONLOGS_DISABLED'),
(552, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__menu\"}', '2024-02-22 00:39:05', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(553, 'PLG_ACTIONLOG_JOOMLA_COMPONENT_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_COMPONENT_CONFIG\",\"id\":13,\"title\":\"com_menus\",\"extension_name\":\"com_menus\",\"itemlink\":\"index.php?option=com_config&task=component.edit&extension_id=13\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 00:39:37', 'com_config.component', 527, 13, 'COM_ACTIONLOGS_DISABLED'),
(554, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MENU_ITEM\",\"id\":105,\"title\":\"Aviso de privacidad\",\"itemlink\":\"index.php?option=com_menus&task=item.edit&id=105\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 00:39:45', 'com_menus.item', 527, 105, 'COM_ACTIONLOGS_DISABLED'),
(555, 'PLG_ACTIONLOG_JOOMLA_COMPONENT_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_COMPONENT_CONFIG\",\"id\":13,\"title\":\"com_menus\",\"extension_name\":\"com_menus\",\"itemlink\":\"index.php?option=com_config&task=component.edit&extension_id=13\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 00:40:15', 'com_config.component', 527, 13, 'COM_ACTIONLOGS_DISABLED'),
(556, 'PLG_ACTIONLOG_JOOMLA_COMPONENT_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_COMPONENT_CONFIG\",\"id\":13,\"title\":\"com_menus\",\"extension_name\":\"com_menus\",\"itemlink\":\"index.php?option=com_config&task=component.edit&extension_id=13\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 00:40:27', 'com_config.component', 527, 13, 'COM_ACTIONLOGS_DISABLED'),
(557, 'PLG_ACTIONLOG_JOOMLA_EXTENSION_INSTALLED', '{\"action\":\"install\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":253,\"name\":\"Modulo generico avanzado PQ\",\"extension_name\":\"Modulo generico avanzado PQ\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 00:57:03', 'com_installer', 527, 253, 'COM_ACTIONLOGS_DISABLED'),
(558, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":118,\"title\":\"Quienes somos\",\"extension_name\":\"Quienes somos\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=118\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 00:57:47', 'com_modules.module', 527, 118, 'COM_ACTIONLOGS_DISABLED'),
(559, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":\"letraSpivet.png\",\"itemlink\":\"index.php?option=com_media&path=local-images:\\/Spivet\\/Imagenes genericas\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 00:59:11', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(560, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":118,\"title\":\"Quienes somos\",\"extension_name\":\"Quienes somos\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=118\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 00:59:40', 'com_modules.module', 527, 118, 'COM_ACTIONLOGS_DISABLED'),
(561, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-22 00:59:40', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(562, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":118,\"title\":\"Quienes somos\",\"extension_name\":\"Quienes somos\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=118\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 00:59:56', 'com_modules.module', 527, 118, 'COM_ACTIONLOGS_DISABLED'),
(563, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-22 00:59:56', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(564, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":\"fondo_cortina.png\",\"itemlink\":\"index.php?option=com_media&path=local-images:\\/Spivet\\/Imagenes genericas\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 01:01:20', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(565, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":118,\"title\":\"Quienes somos\",\"extension_name\":\"Quienes somos\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=118\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 01:01:39', 'com_modules.module', 527, 118, 'COM_ACTIONLOGS_DISABLED'),
(566, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-22 01:01:39', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(567, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":118,\"title\":\"Quienes somos\",\"extension_name\":\"Quienes somos\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=118\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 01:01:54', 'com_modules.module', 527, 118, 'COM_ACTIONLOGS_DISABLED'),
(568, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-22 01:01:54', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(569, 'PLG_ACTIONLOG_JOOMLA_APPLICATION_CONFIG_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_APPLICATION_CONFIG\",\"extension_name\":\"com_config.application\",\"itemlink\":\"index.php?option=com_config\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 01:03:10', 'com_config.application', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(570, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-22 01:03:12', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(571, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MENU_ITEM\",\"id\":103,\"title\":\"Quienes somos\",\"itemlink\":\"index.php?option=com_menus&task=item.edit&id=103\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 01:03:59', 'com_menus.item', 527, 103, 'COM_ACTIONLOGS_DISABLED'),
(572, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__menu\"}', '2024-02-22 01:03:59', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(573, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":118,\"title\":\"Quienes somos\",\"extension_name\":\"Quienes somos\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=118\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 01:05:58', 'com_modules.module', 527, 118, 'COM_ACTIONLOGS_DISABLED');
INSERT INTO `bol96_action_logs` (`id`, `message_language_key`, `message`, `log_date`, `extension`, `user_id`, `item_id`, `ip_address`) VALUES
(574, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-22 01:05:58', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(575, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":118,\"title\":\"Quienes somos\",\"extension_name\":\"Quienes somos\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=118\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 01:06:35', 'com_modules.module', 527, 118, 'COM_ACTIONLOGS_DISABLED'),
(576, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-22 01:06:35', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(577, 'PLG_ACTIONLOG_JOOMLA_USER_LOGGED_IN', '{\"action\":\"login\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-22 18:02:03', 'com_users', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(578, 'PLG_ACTIONLOG_JOOMLA_USER_LOGGED_IN', '{\"action\":\"login\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-22 19:07:39', 'com_users', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(579, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":118,\"title\":\"Quienes somos\",\"extension_name\":\"Quienes somos\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=118\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 19:17:17', 'com_modules.module', 527, 118, 'COM_ACTIONLOGS_DISABLED'),
(580, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-22 19:17:17', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(581, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":118,\"title\":\"Quienes somos\",\"extension_name\":\"Quienes somos\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=118\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 19:17:51', 'com_modules.module', 527, 118, 'COM_ACTIONLOGS_DISABLED'),
(582, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-22 19:17:51', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(583, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":118,\"title\":\"Quienes somos\",\"extension_name\":\"Quienes somos\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=118\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 19:18:15', 'com_modules.module', 527, 118, 'COM_ACTIONLOGS_DISABLED'),
(584, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-22 19:18:15', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(585, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-22 19:18:36', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(586, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":\"Group 390.png\",\"itemlink\":\"index.php?option=com_media&path=local-images:\\/Spivet\\/Iconos de widget\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 19:19:55', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(587, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":\"Group 392.png\",\"itemlink\":\"index.php?option=com_media&path=local-images:\\/Spivet\\/Iconos de widget\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 19:20:05', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(588, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":\"Group 391.png\",\"itemlink\":\"index.php?option=com_media&path=local-images:\\/Spivet\\/Iconos de widget\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 19:20:16', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(589, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":\"Group 389.png\",\"itemlink\":\"index.php?option=com_media&path=local-images:\\/Spivet\\/Iconos de widget\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 19:20:26', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(590, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":117,\"title\":\"Widget contactanos\",\"extension_name\":\"Widget contactanos\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=117\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 19:20:31', 'com_modules.module', 527, 117, 'COM_ACTIONLOGS_DISABLED'),
(591, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-22 19:20:31', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(592, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-22 19:20:55', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(593, 'PLG_ACTIONLOG_JOOMLA_USER_LOGIN_FAILED', '{\"action\":\"login\",\"id\":527,\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-22 20:07:19', 'com_users', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(594, 'PLG_ACTIONLOG_JOOMLA_USER_LOGGED_IN', '{\"action\":\"login\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-22 20:07:30', 'com_users', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(595, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MENU_ITEM\",\"id\":111,\"title\":\"Compatibilidad del sitio\",\"itemlink\":\"index.php?option=com_menus&task=item.edit&id=111\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 20:09:11', 'com_menus.item', 527, 111, 'COM_ACTIONLOGS_DISABLED'),
(596, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__menu\"}', '2024-02-22 20:09:23', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(597, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MENU_ITEM\",\"id\":111,\"title\":\"Compatibilidad del sitio\",\"itemlink\":\"index.php?option=com_menus&task=item.edit&id=111\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 20:09:36', 'com_menus.item', 527, 111, 'COM_ACTIONLOGS_DISABLED'),
(598, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__menu\"}', '2024-02-22 20:09:36', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(599, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MENU_ITEM\",\"id\":112,\"title\":\"Pol\\u00edticas del servicio\",\"itemlink\":\"index.php?option=com_menus&task=item.edit&id=112\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 20:10:06', 'com_menus.item', 527, 112, 'COM_ACTIONLOGS_DISABLED'),
(600, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":119,\"title\":\"Compatibilidad del sitio\",\"extension_name\":\"Compatibilidad del sitio\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=119\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 20:11:05', 'com_modules.module', 527, 119, 'COM_ACTIONLOGS_DISABLED'),
(601, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-22 20:11:11', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(602, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":120,\"title\":\"Pol\\u00edticas del servicio\",\"extension_name\":\"Pol\\u00edticas del servicio\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=120\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-22 20:11:36', 'com_modules.module', 527, 120, 'COM_ACTIONLOGS_DISABLED'),
(603, 'PLG_ACTIONLOG_JOOMLA_USER_LOGGED_IN', '{\"action\":\"login\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-23 00:15:51', 'com_users', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(604, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-23 00:16:07', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(605, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-23 00:16:17', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(606, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":120,\"title\":\"Pol\\u00edticas del servicio\",\"extension_name\":\"Pol\\u00edticas del servicio\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=120\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-23 00:16:33', 'com_modules.module', 527, 120, 'COM_ACTIONLOGS_DISABLED'),
(607, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-23 00:16:33', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(608, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":120,\"title\":\"Pol\\u00edticas del servicio\",\"extension_name\":\"Pol\\u00edticas del servicio\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=120\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-23 00:16:40', 'com_modules.module', 527, 120, 'COM_ACTIONLOGS_DISABLED'),
(609, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-23 00:16:40', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(610, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-23 00:16:42', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(611, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-23 00:19:06', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(612, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":112,\"title\":\"Footer pie de pagina\",\"extension_name\":\"Footer pie de pagina\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=112\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-23 00:19:33', 'com_modules.module', 527, 112, 'COM_ACTIONLOGS_DISABLED'),
(613, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-23 00:19:33', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(614, 'PLG_ACTIONLOG_JOOMLA_USER_LOGGED_IN', '{\"action\":\"login\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-23 15:41:36', 'com_users', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(615, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_STYLE\",\"id\":\"12\",\"title\":\"Licencia PQ - Default\",\"extension_name\":\"Licencia PQ - Default\",\"itemlink\":\"index.php?option=com_templates&task=style.edit&id=12\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-23 15:42:03', 'com_templates.style', 527, 12, 'COM_ACTIONLOGS_DISABLED'),
(616, 'PLG_ACTIONLOG_JOOMLA_USER_LOGGED_IN', '{\"action\":\"login\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-23 17:14:42', 'com_users', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(617, 'PLG_ACTIONLOG_JOOMLA_USER_LOGGED_IN', '{\"action\":\"login\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-23 17:15:28', 'com_users', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(618, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":120,\"title\":\"Pol\\u00edticas del servicio\",\"extension_name\":\"Pol\\u00edticas del servicio\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=120\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-23 17:15:34', 'com_modules.module', 527, 120, 'COM_ACTIONLOGS_DISABLED'),
(619, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-23 17:15:34', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(620, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-23 17:15:53', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(621, 'PLG_ACTIONLOG_JOOMLA_EXTENSION_INSTALLED', '{\"action\":\"install\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":254,\"name\":\"Modulo de cinta superior\",\"extension_name\":\"Modulo de cinta superior\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-23 17:23:59', 'com_installer', 527, 254, 'COM_ACTIONLOGS_DISABLED'),
(622, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":121,\"title\":\"Cinta de anuncios \\u00f3 promociones\",\"extension_name\":\"Cinta de anuncios \\u00f3 promociones\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=121\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-23 17:26:05', 'com_modules.module', 527, 121, 'COM_ACTIONLOGS_DISABLED'),
(623, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":121,\"title\":\"Cinta de anuncios \\u00f3 promociones\",\"extension_name\":\"Cinta de anuncios \\u00f3 promociones\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=121\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-23 17:27:11', 'com_modules.module', 527, 121, 'COM_ACTIONLOGS_DISABLED'),
(624, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-23 17:27:11', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(625, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":121,\"title\":\"Cinta de anuncios \\u00f3 promociones\",\"extension_name\":\"Cinta de anuncios \\u00f3 promociones\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=121\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-23 17:27:38', 'com_modules.module', 527, 121, 'COM_ACTIONLOGS_DISABLED'),
(626, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-23 17:27:38', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(627, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-23 17:28:36', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(628, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_DELETED', '{\"action\":\"delete\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":null,\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-23 17:30:10', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(629, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":119,\"title\":\"Compatibilidad del sitio\",\"extension_name\":\"Compatibilidad del sitio\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=119\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-23 17:31:46', 'com_modules.module', 527, 119, 'COM_ACTIONLOGS_DISABLED'),
(630, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-23 17:31:46', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(631, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-23 17:48:27', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(632, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-23 17:48:30', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(633, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UNPUBLISHED', '{\"action\":\"unpublish\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":121,\"title\":\"Cinta de anuncios \\u00f3 promociones\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=121\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-23 17:48:30', 'com_modules.module', 527, 121, 'COM_ACTIONLOGS_DISABLED'),
(634, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-23 17:50:53', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(635, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_PUBLISHED', '{\"action\":\"publish\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":121,\"title\":\"Cinta de anuncios \\u00f3 promociones\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=121\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-23 17:50:53', 'com_modules.module', 527, 121, 'COM_ACTIONLOGS_DISABLED'),
(636, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-23 17:51:22', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(637, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UNPUBLISHED', '{\"action\":\"unpublish\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":121,\"title\":\"Cinta de anuncios \\u00f3 promociones\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=121\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-23 17:51:22', 'com_modules.module', 527, 121, 'COM_ACTIONLOGS_DISABLED'),
(638, 'PLG_ACTIONLOG_JOOMLA_USER_LOGGED_IN', '{\"action\":\"login\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-23 18:10:18', 'com_users', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(639, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-23 18:10:20', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(640, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_PUBLISHED', '{\"action\":\"publish\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":121,\"title\":\"Cinta de anuncios \\u00f3 promociones\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=121\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-23 18:10:20', 'com_modules.module', 527, 121, 'COM_ACTIONLOGS_DISABLED'),
(641, 'PLG_ACTIONLOG_JOOMLA_USER_LOGGED_IN', '{\"action\":\"login\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-23 22:27:51', 'com_users', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(642, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-23 22:28:01', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(643, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":121,\"title\":\"Cinta de anuncios \\u00f3 promociones\",\"extension_name\":\"Cinta de anuncios \\u00f3 promociones\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=121\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-23 22:30:25', 'com_modules.module', 527, 121, 'COM_ACTIONLOGS_DISABLED'),
(644, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-23 22:30:25', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(645, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MODULE\",\"id\":121,\"title\":\"Cinta de anuncios \\u00f3 promociones\",\"extension_name\":\"Cinta de anuncios \\u00f3 promociones\",\"itemlink\":\"index.php?option=com_modules&task=module.edit&id=121\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-23 22:31:24', 'com_modules.module', 527, 121, 'COM_ACTIONLOGS_DISABLED'),
(646, 'PLG_ACTIONLOG_JOOMLA_USER_CHECKIN', '{\"action\":\"checkin\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin.piquero\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"table\":\"#__modules\"}', '2024-02-23 22:31:24', 'com_checkin', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(647, 'PLG_ACTIONLOG_JOOMLA_USER_LOGGED_IN', '{\"action\":\"login\",\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"app\":\"PLG_ACTIONLOG_JOOMLA_APPLICATION_ADMINISTRATOR\"}', '2024-02-26 18:06:29', 'com_users', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(648, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_DELETED', '{\"action\":\"delete\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":null,\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-26 18:07:03', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(649, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_DELETED', '{\"action\":\"delete\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_MEDIA\",\"id\":0,\"title\":null,\"userid\":527,\"username\":\"admin.piquero\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-26 18:07:11', 'com_media.file', 527, 0, 'COM_ACTIONLOGS_DISABLED'),
(650, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin@spivet.com.mx\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-26 18:13:41', 'com_users', 527, 527, 'COM_ACTIONLOGS_DISABLED'),
(651, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":528,\"title\":\"soporte\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=528\",\"userid\":527,\"username\":\"admin@spivet.com.mx\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-26 18:18:10', 'com_users', 527, 528, 'COM_ACTIONLOGS_DISABLED'),
(652, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":528,\"title\":\"soporte\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=528\",\"userid\":527,\"username\":\"admin@spivet.com.mx\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-26 18:18:14', 'com_users', 527, 528, 'COM_ACTIONLOGS_DISABLED'),
(653, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_ADDED', '{\"action\":\"add\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":529,\"title\":\"content\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=529\",\"userid\":527,\"username\":\"admin@spivet.com.mx\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-26 18:19:32', 'com_users', 527, 529, 'COM_ACTIONLOGS_DISABLED'),
(654, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":529,\"title\":\"content\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=529\",\"userid\":527,\"username\":\"admin@spivet.com.mx\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-26 18:19:53', 'com_users', 527, 529, 'COM_ACTIONLOGS_DISABLED'),
(655, 'PLG_SYSTEM_ACTIONLOGS_CONTENT_UPDATED', '{\"action\":\"update\",\"type\":\"PLG_ACTIONLOG_JOOMLA_TYPE_USER\",\"id\":527,\"title\":\"admin\",\"itemlink\":\"index.php?option=com_users&task=user.edit&id=527\",\"userid\":527,\"username\":\"admin@spivet.com.mx\",\"accountlink\":\"index.php?option=com_users&task=user.edit&id=527\"}', '2024-02-26 18:29:57', 'com_users', 527, 527, 'COM_ACTIONLOGS_DISABLED');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_action_logs_extensions`
--

CREATE TABLE `bol96_action_logs_extensions` (
  `id` int(10) UNSIGNED NOT NULL,
  `extension` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bol96_action_logs_extensions`
--

INSERT INTO `bol96_action_logs_extensions` (`id`, `extension`) VALUES
(1, 'com_banners'),
(2, 'com_cache'),
(3, 'com_categories'),
(4, 'com_config'),
(5, 'com_contact'),
(6, 'com_content'),
(7, 'com_installer'),
(8, 'com_media'),
(9, 'com_menus'),
(10, 'com_messages'),
(11, 'com_modules'),
(12, 'com_newsfeeds'),
(13, 'com_plugins'),
(14, 'com_redirect'),
(15, 'com_tags'),
(16, 'com_templates'),
(17, 'com_users'),
(18, 'com_checkin'),
(19, 'com_scheduler');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_action_logs_users`
--

CREATE TABLE `bol96_action_logs_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `notify` tinyint(3) UNSIGNED NOT NULL,
  `extensions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bol96_action_logs_users`
--

INSERT INTO `bol96_action_logs_users` (`user_id`, `notify`, `extensions`) VALUES
(527, 0, '[\"com_content\"]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_action_log_config`
--

CREATE TABLE `bol96_action_log_config` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_title` varchar(255) NOT NULL DEFAULT '',
  `type_alias` varchar(255) NOT NULL DEFAULT '',
  `id_holder` varchar(255) DEFAULT NULL,
  `title_holder` varchar(255) DEFAULT NULL,
  `table_name` varchar(255) DEFAULT NULL,
  `text_prefix` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bol96_action_log_config`
--

INSERT INTO `bol96_action_log_config` (`id`, `type_title`, `type_alias`, `id_holder`, `title_holder`, `table_name`, `text_prefix`) VALUES
(1, 'article', 'com_content.article', 'id', 'title', '#__content', 'PLG_ACTIONLOG_JOOMLA'),
(2, 'article', 'com_content.form', 'id', 'title', '#__content', 'PLG_ACTIONLOG_JOOMLA'),
(3, 'banner', 'com_banners.banner', 'id', 'name', '#__banners', 'PLG_ACTIONLOG_JOOMLA'),
(4, 'user_note', 'com_users.note', 'id', 'subject', '#__user_notes', 'PLG_ACTIONLOG_JOOMLA'),
(5, 'media', 'com_media.file', '', 'name', '', 'PLG_ACTIONLOG_JOOMLA'),
(6, 'category', 'com_categories.category', 'id', 'title', '#__categories', 'PLG_ACTIONLOG_JOOMLA'),
(7, 'menu', 'com_menus.menu', 'id', 'title', '#__menu_types', 'PLG_ACTIONLOG_JOOMLA'),
(8, 'menu_item', 'com_menus.item', 'id', 'title', '#__menu', 'PLG_ACTIONLOG_JOOMLA'),
(9, 'newsfeed', 'com_newsfeeds.newsfeed', 'id', 'name', '#__newsfeeds', 'PLG_ACTIONLOG_JOOMLA'),
(10, 'link', 'com_redirect.link', 'id', 'old_url', '#__redirect_links', 'PLG_ACTIONLOG_JOOMLA'),
(11, 'tag', 'com_tags.tag', 'id', 'title', '#__tags', 'PLG_ACTIONLOG_JOOMLA'),
(12, 'style', 'com_templates.style', 'id', 'title', '#__template_styles', 'PLG_ACTIONLOG_JOOMLA'),
(13, 'plugin', 'com_plugins.plugin', 'extension_id', 'name', '#__extensions', 'PLG_ACTIONLOG_JOOMLA'),
(14, 'component_config', 'com_config.component', 'extension_id', 'name', '', 'PLG_ACTIONLOG_JOOMLA'),
(15, 'contact', 'com_contact.contact', 'id', 'name', '#__contact_details', 'PLG_ACTIONLOG_JOOMLA'),
(16, 'module', 'com_modules.module', 'id', 'title', '#__modules', 'PLG_ACTIONLOG_JOOMLA'),
(17, 'access_level', 'com_users.level', 'id', 'title', '#__viewlevels', 'PLG_ACTIONLOG_JOOMLA'),
(18, 'banner_client', 'com_banners.client', 'id', 'name', '#__banner_clients', 'PLG_ACTIONLOG_JOOMLA'),
(19, 'application_config', 'com_config.application', '', 'name', '', 'PLG_ACTIONLOG_JOOMLA'),
(20, 'task', 'com_scheduler.task', 'id', 'title', '#__scheduler_tasks', 'PLG_ACTIONLOG_JOOMLA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_assets`
--

CREATE TABLE `bol96_assets` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Primary Key',
  `parent_id` int(11) NOT NULL DEFAULT 0 COMMENT 'Nested set parent.',
  `lft` int(11) NOT NULL DEFAULT 0 COMMENT 'Nested set lft.',
  `rgt` int(11) NOT NULL DEFAULT 0 COMMENT 'Nested set rgt.',
  `level` int(10) UNSIGNED NOT NULL COMMENT 'The cached level in the nested tree.',
  `name` varchar(50) NOT NULL COMMENT 'The unique name for the asset.\n',
  `title` varchar(100) NOT NULL COMMENT 'The descriptive title for the asset.',
  `rules` varchar(5120) NOT NULL COMMENT 'JSON encoded access control.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bol96_assets`
--

INSERT INTO `bol96_assets` (`id`, `parent_id`, `lft`, `rgt`, `level`, `name`, `title`, `rules`) VALUES
(1, 0, 0, 205, 0, 'root.1', 'Root Asset', '{\"core.login.site\":{\"6\":1,\"2\":1},\"core.login.admin\":{\"6\":1},\"core.login.api\":{\"8\":1},\"core.login.offline\":{\"6\":1},\"core.admin\":{\"8\":1},\"core.manage\":{\"7\":1},\"core.create\":{\"6\":1,\"3\":1},\"core.delete\":{\"6\":1},\"core.edit\":{\"6\":1,\"4\":1},\"core.edit.state\":{\"6\":1,\"5\":1},\"core.edit.own\":{\"6\":1,\"3\":1}}'),
(2, 1, 1, 2, 1, 'com_admin', 'com_admin', '{}'),
(3, 1, 3, 6, 1, 'com_banners', 'com_banners', '{\"core.admin\":{\"7\":1},\"core.manage\":{\"6\":1}}'),
(4, 1, 7, 8, 1, 'com_cache', 'com_cache', '{\"core.admin\":{\"7\":1},\"core.manage\":{\"7\":1}}'),
(5, 1, 9, 10, 1, 'com_checkin', 'com_checkin', '{\"core.admin\":{\"7\":1},\"core.manage\":{\"7\":1}}'),
(6, 1, 11, 12, 1, 'com_config', 'com_config', '{}'),
(7, 1, 13, 16, 1, 'com_contact', 'com_contact', '{\"core.admin\":{\"7\":1},\"core.manage\":{\"6\":1}}'),
(8, 1, 17, 38, 1, 'com_content', 'com_content', '{\"core.admin\":{\"7\":1},\"core.manage\":{\"6\":1},\"core.create\":{\"3\":1},\"core.edit\":{\"4\":1},\"core.edit.state\":{\"5\":1},\"core.execute.transition\":{\"6\":1,\"5\":1}}'),
(9, 1, 39, 40, 1, 'com_cpanel', 'com_cpanel', '{}'),
(10, 1, 41, 42, 1, 'com_installer', 'com_installer', '{\"core.manage\":{\"7\":0},\"core.delete\":{\"7\":0},\"core.edit.state\":{\"7\":0}}'),
(11, 1, 43, 48, 1, 'com_languages', 'com_languages', '{\"core.admin\":{\"7\":1}}'),
(12, 11, 44, 45, 2, 'com_languages.language.1', 'English (en-GB)', '{}'),
(13, 1, 49, 50, 1, 'com_login', 'com_login', '{}'),
(14, 1, 51, 52, 1, 'com_mails', 'com_mails', '{}'),
(15, 1, 53, 54, 1, 'com_media', 'com_media', '{\"core.admin\":{\"7\":1},\"core.manage\":{\"6\":1},\"core.create\":{\"3\":1},\"core.delete\":{\"5\":1}}'),
(16, 1, 55, 58, 1, 'com_menus', 'com_menus', '{\"core.admin\":{\"7\":1}}'),
(17, 1, 59, 60, 1, 'com_messages', 'com_messages', '{\"core.admin\":{\"7\":1},\"core.manage\":{\"7\":1}}'),
(18, 1, 61, 158, 1, 'com_modules', 'com_modules', '{\"core.admin\":{\"7\":1}}'),
(19, 1, 159, 162, 1, 'com_newsfeeds', 'com_newsfeeds', '{\"core.admin\":{\"7\":1},\"core.manage\":{\"6\":1}}'),
(20, 1, 163, 164, 1, 'com_plugins', 'com_plugins', '{\"core.admin\":{\"7\":1}}'),
(21, 1, 165, 166, 1, 'com_redirect', 'com_redirect', '{\"core.admin\":{\"7\":1}}'),
(23, 1, 167, 168, 1, 'com_templates', 'com_templates', '{\"core.admin\":{\"7\":1}}'),
(24, 1, 173, 176, 1, 'com_users', 'com_users', '{\"core.admin\":{\"7\":1}}'),
(26, 1, 177, 178, 1, 'com_wrapper', 'com_wrapper', '{}'),
(27, 8, 18, 19, 2, 'com_content.category.2', 'Informativa', '{}'),
(28, 3, 4, 5, 2, 'com_banners.category.3', 'Uncategorised', '{}'),
(29, 7, 14, 15, 2, 'com_contact.category.4', 'Uncategorised', '{}'),
(30, 19, 160, 161, 2, 'com_newsfeeds.category.5', 'Uncategorised', '{}'),
(32, 24, 174, 175, 2, 'com_users.category.7', 'Uncategorised', '{}'),
(33, 1, 179, 180, 1, 'com_finder', 'com_finder', '{\"core.admin\":{\"7\":1},\"core.manage\":{\"6\":1}}'),
(34, 1, 181, 182, 1, 'com_joomlaupdate', 'com_joomlaupdate', '{}'),
(35, 1, 183, 184, 1, 'com_tags', 'com_tags', '{}'),
(36, 1, 185, 186, 1, 'com_contenthistory', 'com_contenthistory', '{}'),
(37, 1, 187, 188, 1, 'com_ajax', 'com_ajax', '{}'),
(38, 1, 189, 190, 1, 'com_postinstall', 'com_postinstall', '{}'),
(39, 18, 62, 63, 2, 'com_modules.module.1', 'Main Menu', '{}'),
(40, 18, 64, 65, 2, 'com_modules.module.2', 'Login', '{}'),
(41, 18, 66, 67, 2, 'com_modules.module.3', 'Popular Articles', '{}'),
(42, 18, 68, 69, 2, 'com_modules.module.4', 'Recently Added Articles', '{}'),
(43, 18, 70, 71, 2, 'com_modules.module.8', 'Toolbar', '{}'),
(44, 18, 72, 73, 2, 'com_modules.module.9', 'Notifications', '{}'),
(45, 18, 74, 75, 2, 'com_modules.module.10', 'Logged-in Users', '{}'),
(46, 18, 76, 77, 2, 'com_modules.module.12', 'Admin Menu', '{}'),
(49, 18, 82, 83, 2, 'com_modules.module.15', 'Title', '{}'),
(50, 18, 84, 85, 2, 'com_modules.module.16', 'Login Form', '{}'),
(51, 18, 86, 87, 2, 'com_modules.module.17', 'Breadcrumbs', '{}'),
(52, 18, 88, 89, 2, 'com_modules.module.79', 'Multilanguage status', '{}'),
(53, 18, 92, 93, 2, 'com_modules.module.86', 'Joomla Version', '{}'),
(54, 16, 56, 57, 2, 'com_menus.menu.1', 'Main Menu', '{}'),
(55, 18, 96, 97, 2, 'com_modules.module.87', 'Sample Data', '{}'),
(56, 8, 20, 37, 2, 'com_content.workflow.1', 'COM_WORKFLOW_BASIC_WORKFLOW', '{}'),
(57, 56, 21, 22, 3, 'com_content.stage.1', 'COM_WORKFLOW_BASIC_STAGE', '{}'),
(58, 56, 23, 24, 3, 'com_content.transition.1', 'Unpublish', '{}'),
(59, 56, 25, 26, 3, 'com_content.transition.2', 'Publish', '{}'),
(60, 56, 27, 28, 3, 'com_content.transition.3', 'Trash', '{}'),
(61, 56, 29, 30, 3, 'com_content.transition.4', 'Archive', '{}'),
(62, 56, 31, 32, 3, 'com_content.transition.5', 'Feature', '{}'),
(63, 56, 33, 34, 3, 'com_content.transition.6', 'Unfeature', '{}'),
(64, 56, 35, 36, 3, 'com_content.transition.7', 'Publish & Feature', '{}'),
(65, 1, 169, 170, 1, 'com_privacy', 'com_privacy', '{}'),
(66, 1, 171, 172, 1, 'com_actionlogs', 'com_actionlogs', '{}'),
(67, 18, 78, 79, 2, 'com_modules.module.88', 'Latest Actions', '{}'),
(68, 18, 80, 81, 2, 'com_modules.module.89', 'Privacy Dashboard', '{}'),
(70, 18, 90, 91, 2, 'com_modules.module.103', 'Site', '{}'),
(71, 18, 94, 95, 2, 'com_modules.module.104', 'System', '{}'),
(72, 18, 98, 99, 2, 'com_modules.module.91', 'System Dashboard', '{}'),
(73, 18, 100, 101, 2, 'com_modules.module.92', 'Content Dashboard', '{}'),
(74, 18, 102, 103, 2, 'com_modules.module.93', 'Menus Dashboard', '{}'),
(75, 18, 104, 105, 2, 'com_modules.module.94', 'Components Dashboard', '{}'),
(76, 18, 106, 107, 2, 'com_modules.module.95', 'Users Dashboard', '{}'),
(77, 18, 108, 109, 2, 'com_modules.module.99', 'Frontend Link', '{}'),
(78, 18, 110, 111, 2, 'com_modules.module.100', 'Messages', '{}'),
(79, 18, 112, 113, 2, 'com_modules.module.101', 'Post Install Messages', '{}'),
(80, 18, 114, 115, 2, 'com_modules.module.102', 'User Status', '{}'),
(82, 18, 116, 117, 2, 'com_modules.module.105', '3rd Party', '{}'),
(83, 18, 118, 119, 2, 'com_modules.module.106', 'Help Dashboard', '{}'),
(84, 18, 120, 121, 2, 'com_modules.module.107', 'Privacy Requests', '{}'),
(85, 18, 122, 123, 2, 'com_modules.module.108', 'Privacy Status', '{}'),
(86, 18, 124, 125, 2, 'com_modules.module.96', 'Popular Articles', '{}'),
(87, 18, 126, 127, 2, 'com_modules.module.97', 'Recently Added Articles', '{}'),
(88, 18, 128, 129, 2, 'com_modules.module.98', 'Logged-in Users', '{}'),
(89, 18, 130, 131, 2, 'com_modules.module.90', 'Login Support', '{}'),
(90, 1, 191, 192, 1, 'com_scheduler', 'com_scheduler', '{}'),
(91, 1, 193, 194, 1, 'com_associations', 'com_associations', '{}'),
(92, 1, 195, 196, 1, 'com_categories', 'com_categories', '{}'),
(93, 1, 197, 198, 1, 'com_fields', 'com_fields', '{}'),
(94, 1, 199, 200, 1, 'com_workflow', 'com_workflow', '{}'),
(95, 1, 201, 202, 1, 'com_guidedtours', 'com_guidedtours', '{}'),
(96, 18, 132, 133, 2, 'com_modules.module.109', 'Guided Tours', '{}'),
(97, 18, 134, 135, 2, 'com_modules.module.110', 'Home (inicio)', '{}'),
(98, 1, 203, 204, 1, 'com_blank', 'COM_BLANK', '{}'),
(99, 11, 46, 47, 2, 'com_languages.language.2', 'Spanish (es-ES)', '{}'),
(100, 18, 136, 137, 2, 'com_modules.module.111', 'Menu cortina', '{}'),
(101, 18, 138, 139, 2, 'com_modules.module.112', 'Footer pie de pagina', '{}'),
(102, 18, 140, 141, 2, 'com_modules.module.113', 'Oferta (informacion detalle)', '{}'),
(103, 18, 142, 143, 2, 'com_modules.module.114', 'Servicios (Carrito de compra)', '{}'),
(104, 18, 144, 145, 2, 'com_modules.module.115', 'Formulario de carrito de compra', '{}'),
(105, 18, 146, 147, 2, 'com_modules.module.116', 'Aviso de privacidad', '{}'),
(106, 18, 148, 149, 2, 'com_modules.module.117', 'Widget contactanos', '{}'),
(107, 18, 150, 151, 2, 'com_modules.module.118', 'Quienes somos', '{}'),
(108, 18, 152, 153, 2, 'com_modules.module.119', 'Compatibilidad del sitio', '{}'),
(109, 18, 154, 155, 2, 'com_modules.module.120', 'Políticas del servicio', '{}'),
(110, 18, 156, 157, 2, 'com_modules.module.121', 'Cinta de anuncios ó promociones', '{}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_associations`
--

CREATE TABLE `bol96_associations` (
  `id` int(11) NOT NULL COMMENT 'A reference to the associated item.',
  `context` varchar(50) NOT NULL COMMENT 'The context of the associated item.',
  `key` char(32) NOT NULL COMMENT 'The key for the association computed from an md5 on associated ids.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_banners`
--

CREATE TABLE `bol96_banners` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL DEFAULT 0,
  `type` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `imptotal` int(11) NOT NULL DEFAULT 0,
  `impmade` int(11) NOT NULL DEFAULT 0,
  `clicks` int(11) NOT NULL DEFAULT 0,
  `clickurl` varchar(2048) NOT NULL DEFAULT '',
  `state` tinyint(4) NOT NULL DEFAULT 0,
  `catid` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `description` text NOT NULL,
  `custombannercode` varchar(2048) NOT NULL,
  `sticky` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `ordering` int(11) NOT NULL DEFAULT 0,
  `metakey` text DEFAULT NULL,
  `params` text NOT NULL,
  `own_prefix` tinyint(4) NOT NULL DEFAULT 0,
  `metakey_prefix` varchar(400) NOT NULL DEFAULT '',
  `purchase_type` tinyint(4) NOT NULL DEFAULT -1,
  `track_clicks` tinyint(4) NOT NULL DEFAULT -1,
  `track_impressions` tinyint(4) NOT NULL DEFAULT -1,
  `checked_out` int(10) UNSIGNED DEFAULT NULL,
  `checked_out_time` datetime DEFAULT NULL,
  `publish_up` datetime DEFAULT NULL,
  `publish_down` datetime DEFAULT NULL,
  `reset` datetime DEFAULT NULL,
  `created` datetime NOT NULL,
  `language` char(7) NOT NULL DEFAULT '',
  `created_by` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified` datetime NOT NULL,
  `modified_by` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `version` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_banner_clients`
--

CREATE TABLE `bol96_banner_clients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `contact` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `extrainfo` text NOT NULL,
  `state` tinyint(4) NOT NULL DEFAULT 0,
  `checked_out` int(10) UNSIGNED DEFAULT NULL,
  `checked_out_time` datetime DEFAULT NULL,
  `metakey` text DEFAULT NULL,
  `own_prefix` tinyint(4) NOT NULL DEFAULT 0,
  `metakey_prefix` varchar(400) NOT NULL DEFAULT '',
  `purchase_type` tinyint(4) NOT NULL DEFAULT -1,
  `track_clicks` tinyint(4) NOT NULL DEFAULT -1,
  `track_impressions` tinyint(4) NOT NULL DEFAULT -1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_banner_tracks`
--

CREATE TABLE `bol96_banner_tracks` (
  `track_date` datetime NOT NULL,
  `track_type` int(10) UNSIGNED NOT NULL,
  `banner_id` int(10) UNSIGNED NOT NULL,
  `count` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_categories`
--

CREATE TABLE `bol96_categories` (
  `id` int(11) NOT NULL,
  `asset_id` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'FK to the #__assets table.',
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `lft` int(11) NOT NULL DEFAULT 0,
  `rgt` int(11) NOT NULL DEFAULT 0,
  `level` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `path` varchar(400) NOT NULL DEFAULT '',
  `extension` varchar(50) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  `description` mediumtext DEFAULT NULL,
  `published` tinyint(4) NOT NULL DEFAULT 0,
  `checked_out` int(10) UNSIGNED DEFAULT NULL,
  `checked_out_time` datetime DEFAULT NULL,
  `access` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `params` text DEFAULT NULL,
  `metadesc` varchar(1024) NOT NULL DEFAULT '' COMMENT 'The meta description for the page.',
  `metakey` varchar(1024) NOT NULL DEFAULT '' COMMENT 'The keywords for the page.',
  `metadata` varchar(2048) NOT NULL DEFAULT '' COMMENT 'JSON encoded metadata properties.',
  `created_user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_time` datetime NOT NULL,
  `modified_user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `modified_time` datetime NOT NULL,
  `hits` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `language` char(7) NOT NULL DEFAULT '',
  `version` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bol96_categories`
--

INSERT INTO `bol96_categories` (`id`, `asset_id`, `parent_id`, `lft`, `rgt`, `level`, `path`, `extension`, `title`, `alias`, `note`, `description`, `published`, `checked_out`, `checked_out_time`, `access`, `params`, `metadesc`, `metakey`, `metadata`, `created_user_id`, `created_time`, `modified_user_id`, `modified_time`, `hits`, `language`, `version`) VALUES
(1, 0, 0, 0, 11, 0, '', 'system', 'ROOT', 'root', '', '', 1, NULL, NULL, 1, '{}', '', '', '{}', 527, '2024-02-01 18:54:23', 527, '2024-02-01 18:54:23', 0, '*', 1),
(2, 27, 1, 1, 2, 1, 'informativa', 'com_content', 'Informativa', 'informativa', '', '', 1, NULL, NULL, 1, '{\"category_layout\":\"\",\"image\":\"\",\"image_alt\":\"\"}', '', '', '{\"author\":\"\",\"robots\":\"\"}', 527, '2024-02-01 18:54:23', 527, '2024-02-12 15:57:19', 0, '*', 1),
(3, 28, 1, 3, 4, 1, 'uncategorised', 'com_banners', 'Uncategorised', 'uncategorised', '', '', 1, NULL, NULL, 1, '{\"category_layout\":\"\",\"image\":\"\"}', '', '', '{\"author\":\"\",\"robots\":\"\"}', 527, '2024-02-01 18:54:23', 527, '2024-02-01 18:54:23', 0, '*', 1),
(4, 29, 1, 5, 6, 1, 'uncategorised', 'com_contact', 'Uncategorised', 'uncategorised', '', '', 1, NULL, NULL, 1, '{\"category_layout\":\"\",\"image\":\"\"}', '', '', '{\"author\":\"\",\"robots\":\"\"}', 527, '2024-02-01 18:54:23', 527, '2024-02-01 18:54:23', 0, '*', 1),
(5, 30, 1, 7, 8, 1, 'uncategorised', 'com_newsfeeds', 'Uncategorised', 'uncategorised', '', '', 1, NULL, NULL, 1, '{\"category_layout\":\"\",\"image\":\"\"}', '', '', '{\"author\":\"\",\"robots\":\"\"}', 527, '2024-02-01 18:54:23', 527, '2024-02-01 18:54:23', 0, '*', 1),
(7, 32, 1, 9, 10, 1, 'uncategorised', 'com_users', 'Uncategorised', 'uncategorised', '', '', 1, NULL, NULL, 1, '{\"category_layout\":\"\",\"image\":\"\"}', '', '', '{\"author\":\"\",\"robots\":\"\"}', 527, '2024-02-01 18:54:23', 527, '2024-02-01 18:54:23', 0, '*', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_contact_details`
--

CREATE TABLE `bol96_contact_details` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `con_position` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `suburb` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `postcode` varchar(100) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `misc` mediumtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email_to` varchar(255) DEFAULT NULL,
  `default_con` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `published` tinyint(4) NOT NULL DEFAULT 0,
  `checked_out` int(10) UNSIGNED DEFAULT NULL,
  `checked_out_time` datetime DEFAULT NULL,
  `ordering` int(11) NOT NULL DEFAULT 0,
  `params` text NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `catid` int(11) NOT NULL DEFAULT 0,
  `access` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `mobile` varchar(255) NOT NULL DEFAULT '',
  `webpage` varchar(255) NOT NULL DEFAULT '',
  `sortname1` varchar(255) NOT NULL DEFAULT '',
  `sortname2` varchar(255) NOT NULL DEFAULT '',
  `sortname3` varchar(255) NOT NULL DEFAULT '',
  `language` varchar(7) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified` datetime NOT NULL,
  `modified_by` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `metakey` text DEFAULT NULL,
  `metadesc` text NOT NULL,
  `metadata` text NOT NULL,
  `featured` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Set if contact is featured.',
  `publish_up` datetime DEFAULT NULL,
  `publish_down` datetime DEFAULT NULL,
  `version` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `hits` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_content`
--

CREATE TABLE `bol96_content` (
  `id` int(10) UNSIGNED NOT NULL,
  `asset_id` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'FK to the #__assets table.',
  `title` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `introtext` mediumtext NOT NULL,
  `fulltext` mediumtext NOT NULL,
  `state` tinyint(4) NOT NULL DEFAULT 0,
  `catid` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created` datetime NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified` datetime NOT NULL,
  `modified_by` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `checked_out` int(10) UNSIGNED DEFAULT NULL,
  `checked_out_time` datetime DEFAULT NULL,
  `publish_up` datetime DEFAULT NULL,
  `publish_down` datetime DEFAULT NULL,
  `images` text NOT NULL,
  `urls` text NOT NULL,
  `attribs` varchar(5120) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `ordering` int(11) NOT NULL DEFAULT 0,
  `metakey` text DEFAULT NULL,
  `metadesc` text NOT NULL,
  `access` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `hits` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `metadata` text NOT NULL,
  `featured` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Set if article is featured.',
  `language` char(7) NOT NULL COMMENT 'The language code for the article.',
  `note` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_contentitem_tag_map`
--

CREATE TABLE `bol96_contentitem_tag_map` (
  `type_alias` varchar(255) NOT NULL DEFAULT '',
  `core_content_id` int(10) UNSIGNED NOT NULL COMMENT 'PK from the core content table',
  `content_item_id` int(11) NOT NULL COMMENT 'PK from the content type table',
  `tag_id` int(10) UNSIGNED NOT NULL COMMENT 'PK from the tag table',
  `tag_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Date of most recent save for this tag-item',
  `type_id` mediumint(9) NOT NULL COMMENT 'PK from the content_type table'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Maps items from content tables to tags';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_content_frontpage`
--

CREATE TABLE `bol96_content_frontpage` (
  `content_id` int(11) NOT NULL DEFAULT 0,
  `ordering` int(11) NOT NULL DEFAULT 0,
  `featured_up` datetime DEFAULT NULL,
  `featured_down` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_content_rating`
--

CREATE TABLE `bol96_content_rating` (
  `content_id` int(11) NOT NULL DEFAULT 0,
  `rating_sum` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `rating_count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `lastip` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_content_types`
--

CREATE TABLE `bol96_content_types` (
  `type_id` int(10) UNSIGNED NOT NULL,
  `type_title` varchar(255) NOT NULL DEFAULT '',
  `type_alias` varchar(400) NOT NULL DEFAULT '',
  `table` varchar(2048) NOT NULL DEFAULT '',
  `rules` text NOT NULL,
  `field_mappings` text NOT NULL,
  `router` varchar(255) NOT NULL DEFAULT '',
  `content_history_options` varchar(5120) DEFAULT NULL COMMENT 'JSON string for com_contenthistory options'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bol96_content_types`
--

INSERT INTO `bol96_content_types` (`type_id`, `type_title`, `type_alias`, `table`, `rules`, `field_mappings`, `router`, `content_history_options`) VALUES
(1, 'Article', 'com_content.article', '{\"special\":{\"dbtable\":\"#__content\",\"key\":\"id\",\"type\":\"ArticleTable\",\"prefix\":\"Joomla\\\\Component\\\\Content\\\\Administrator\\\\Table\\\\\",\"config\":\"array()\"},\"common\":{\"dbtable\":\"#__ucm_content\",\"key\":\"ucm_id\",\"type\":\"Corecontent\",\"prefix\":\"Joomla\\\\CMS\\\\Table\\\\\",\"config\":\"array()\"}}', '', '{\"common\":{\"core_content_item_id\":\"id\",\"core_title\":\"title\",\"core_state\":\"state\",\"core_alias\":\"alias\",\"core_created_time\":\"created\",\"core_modified_time\":\"modified\",\"core_body\":\"introtext\", \"core_hits\":\"hits\",\"core_publish_up\":\"publish_up\",\"core_publish_down\":\"publish_down\",\"core_access\":\"access\", \"core_params\":\"attribs\", \"core_featured\":\"featured\", \"core_metadata\":\"metadata\", \"core_language\":\"language\", \"core_images\":\"images\", \"core_urls\":\"urls\", \"core_version\":\"version\", \"core_ordering\":\"ordering\", \"core_metakey\":\"metakey\", \"core_metadesc\":\"metadesc\", \"core_catid\":\"catid\", \"asset_id\":\"asset_id\", \"note\":\"note\"}, \"special\":{\"fulltext\":\"fulltext\"}}', 'ContentHelperRoute::getArticleRoute', '{\"formFile\":\"administrator\\/components\\/com_content\\/forms\\/article.xml\", \"hideFields\":[\"asset_id\",\"checked_out\",\"checked_out_time\",\"version\"],\"ignoreChanges\":[\"modified_by\", \"modified\", \"checked_out\", \"checked_out_time\", \"version\", \"hits\", \"ordering\"],\"convertToInt\":[\"publish_up\", \"publish_down\", \"featured\", \"ordering\"],\"displayLookup\":[{\"sourceColumn\":\"catid\",\"targetTable\":\"#__categories\",\"targetColumn\":\"id\",\"displayColumn\":\"title\"},{\"sourceColumn\":\"created_by\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"},{\"sourceColumn\":\"access\",\"targetTable\":\"#__viewlevels\",\"targetColumn\":\"id\",\"displayColumn\":\"title\"},{\"sourceColumn\":\"modified_by\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"} ]}'),
(2, 'Contact', 'com_contact.contact', '{\"special\":{\"dbtable\":\"#__contact_details\",\"key\":\"id\",\"type\":\"ContactTable\",\"prefix\":\"Joomla\\\\Component\\\\Contact\\\\Administrator\\\\Table\\\\\",\"config\":\"array()\"},\"common\":{\"dbtable\":\"#__ucm_content\",\"key\":\"ucm_id\",\"type\":\"Corecontent\",\"prefix\":\"Joomla\\\\CMS\\\\Table\\\\\",\"config\":\"array()\"}}', '', '{\"common\":{\"core_content_item_id\":\"id\",\"core_title\":\"name\",\"core_state\":\"published\",\"core_alias\":\"alias\",\"core_created_time\":\"created\",\"core_modified_time\":\"modified\",\"core_body\":\"address\", \"core_hits\":\"hits\",\"core_publish_up\":\"publish_up\",\"core_publish_down\":\"publish_down\",\"core_access\":\"access\", \"core_params\":\"params\", \"core_featured\":\"featured\", \"core_metadata\":\"metadata\", \"core_language\":\"language\", \"core_images\":\"image\", \"core_urls\":\"webpage\", \"core_version\":\"version\", \"core_ordering\":\"ordering\", \"core_metakey\":\"metakey\", \"core_metadesc\":\"metadesc\", \"core_catid\":\"catid\", \"asset_id\":\"null\"}, \"special\":{\"con_position\":\"con_position\",\"suburb\":\"suburb\",\"state\":\"state\",\"country\":\"country\",\"postcode\":\"postcode\",\"telephone\":\"telephone\",\"fax\":\"fax\",\"misc\":\"misc\",\"email_to\":\"email_to\",\"default_con\":\"default_con\",\"user_id\":\"user_id\",\"mobile\":\"mobile\",\"sortname1\":\"sortname1\",\"sortname2\":\"sortname2\",\"sortname3\":\"sortname3\"}}', 'ContactHelperRoute::getContactRoute', '{\"formFile\":\"administrator\\/components\\/com_contact\\/forms\\/contact.xml\",\"hideFields\":[\"default_con\",\"checked_out\",\"checked_out_time\",\"version\"],\"ignoreChanges\":[\"modified_by\", \"modified\", \"checked_out\", \"checked_out_time\", \"version\", \"hits\"],\"convertToInt\":[\"publish_up\", \"publish_down\", \"featured\", \"ordering\"], \"displayLookup\":[ {\"sourceColumn\":\"created_by\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"},{\"sourceColumn\":\"catid\",\"targetTable\":\"#__categories\",\"targetColumn\":\"id\",\"displayColumn\":\"title\"},{\"sourceColumn\":\"modified_by\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"},{\"sourceColumn\":\"access\",\"targetTable\":\"#__viewlevels\",\"targetColumn\":\"id\",\"displayColumn\":\"title\"},{\"sourceColumn\":\"user_id\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"} ] }'),
(3, 'Newsfeed', 'com_newsfeeds.newsfeed', '{\"special\":{\"dbtable\":\"#__newsfeeds\",\"key\":\"id\",\"type\":\"NewsfeedTable\",\"prefix\":\"Joomla\\\\Component\\\\Newsfeeds\\\\Administrator\\\\Table\\\\\",\"config\":\"array()\"},\"common\":{\"dbtable\":\"#__ucm_content\",\"key\":\"ucm_id\",\"type\":\"Corecontent\",\"prefix\":\"Joomla\\\\CMS\\\\Table\\\\\",\"config\":\"array()\"}}', '', '{\"common\":{\"core_content_item_id\":\"id\",\"core_title\":\"name\",\"core_state\":\"published\",\"core_alias\":\"alias\",\"core_created_time\":\"created\",\"core_modified_time\":\"modified\",\"core_body\":\"description\", \"core_hits\":\"hits\",\"core_publish_up\":\"publish_up\",\"core_publish_down\":\"publish_down\",\"core_access\":\"access\", \"core_params\":\"params\", \"core_featured\":\"featured\", \"core_metadata\":\"metadata\", \"core_language\":\"language\", \"core_images\":\"images\", \"core_urls\":\"link\", \"core_version\":\"version\", \"core_ordering\":\"ordering\", \"core_metakey\":\"metakey\", \"core_metadesc\":\"metadesc\", \"core_catid\":\"catid\", \"asset_id\":\"null\"}, \"special\":{\"numarticles\":\"numarticles\",\"cache_time\":\"cache_time\",\"rtl\":\"rtl\"}}', 'NewsfeedsHelperRoute::getNewsfeedRoute', '{\"formFile\":\"administrator\\/components\\/com_newsfeeds\\/forms\\/newsfeed.xml\",\"hideFields\":[\"asset_id\",\"checked_out\",\"checked_out_time\",\"version\"],\"ignoreChanges\":[\"modified_by\", \"modified\", \"checked_out\", \"checked_out_time\", \"version\", \"hits\"],\"convertToInt\":[\"publish_up\", \"publish_down\", \"featured\", \"ordering\"],\"displayLookup\":[{\"sourceColumn\":\"catid\",\"targetTable\":\"#__categories\",\"targetColumn\":\"id\",\"displayColumn\":\"title\"},{\"sourceColumn\":\"created_by\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"},{\"sourceColumn\":\"access\",\"targetTable\":\"#__viewlevels\",\"targetColumn\":\"id\",\"displayColumn\":\"title\"},{\"sourceColumn\":\"modified_by\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"} ]}'),
(4, 'User', 'com_users.user', '{\"special\":{\"dbtable\":\"#__users\",\"key\":\"id\",\"type\":\"User\",\"prefix\":\"Joomla\\\\CMS\\\\Table\\\\\",\"config\":\"array()\"},\"common\":{\"dbtable\":\"#__ucm_content\",\"key\":\"ucm_id\",\"type\":\"Corecontent\",\"prefix\":\"Joomla\\\\CMS\\\\Table\\\\\",\"config\":\"array()\"}}', '', '{\"common\":{\"core_content_item_id\":\"id\",\"core_title\":\"name\",\"core_state\":\"null\",\"core_alias\":\"username\",\"core_created_time\":\"registerDate\",\"core_modified_time\":\"lastvisitDate\",\"core_body\":\"null\", \"core_hits\":\"null\",\"core_publish_up\":\"null\",\"core_publish_down\":\"null\",\"access\":\"null\", \"core_params\":\"params\", \"core_featured\":\"null\", \"core_metadata\":\"null\", \"core_language\":\"null\", \"core_images\":\"null\", \"core_urls\":\"null\", \"core_version\":\"null\", \"core_ordering\":\"null\", \"core_metakey\":\"null\", \"core_metadesc\":\"null\", \"core_catid\":\"null\", \"asset_id\":\"null\"}, \"special\":{}}', '', ''),
(5, 'Article Category', 'com_content.category', '{\"special\":{\"dbtable\":\"#__categories\",\"key\":\"id\",\"type\":\"CategoryTable\",\"prefix\":\"Joomla\\\\Component\\\\Categories\\\\Administrator\\\\Table\\\\\",\"config\":\"array()\"},\"common\":{\"dbtable\":\"#__ucm_content\",\"key\":\"ucm_id\",\"type\":\"Corecontent\",\"prefix\":\"Joomla\\\\CMS\\\\Table\\\\\",\"config\":\"array()\"}}', '', '{\"common\":{\"core_content_item_id\":\"id\",\"core_title\":\"title\",\"core_state\":\"published\",\"core_alias\":\"alias\",\"core_created_time\":\"created_time\",\"core_modified_time\":\"modified_time\",\"core_body\":\"description\", \"core_hits\":\"hits\",\"core_publish_up\":\"null\",\"core_publish_down\":\"null\",\"core_access\":\"access\", \"core_params\":\"params\", \"core_featured\":\"null\", \"core_metadata\":\"metadata\", \"core_language\":\"language\", \"core_images\":\"null\", \"core_urls\":\"null\", \"core_version\":\"version\", \"core_ordering\":\"null\", \"core_metakey\":\"metakey\", \"core_metadesc\":\"metadesc\", \"core_catid\":\"parent_id\", \"asset_id\":\"asset_id\"}, \"special\":{\"parent_id\":\"parent_id\",\"lft\":\"lft\",\"rgt\":\"rgt\",\"level\":\"level\",\"path\":\"path\",\"extension\":\"extension\",\"note\":\"note\"}}', 'ContentHelperRoute::getCategoryRoute', '{\"formFile\":\"administrator\\/components\\/com_categories\\/forms\\/category.xml\", \"hideFields\":[\"asset_id\",\"checked_out\",\"checked_out_time\",\"version\",\"lft\",\"rgt\",\"level\",\"path\",\"extension\"], \"ignoreChanges\":[\"modified_user_id\", \"modified_time\", \"checked_out\", \"checked_out_time\", \"version\", \"hits\", \"path\"],\"convertToInt\":[\"publish_up\", \"publish_down\"], \"displayLookup\":[{\"sourceColumn\":\"created_user_id\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"},{\"sourceColumn\":\"access\",\"targetTable\":\"#__viewlevels\",\"targetColumn\":\"id\",\"displayColumn\":\"title\"},{\"sourceColumn\":\"modified_user_id\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"},{\"sourceColumn\":\"parent_id\",\"targetTable\":\"#__categories\",\"targetColumn\":\"id\",\"displayColumn\":\"title\"}]}'),
(6, 'Contact Category', 'com_contact.category', '{\"special\":{\"dbtable\":\"#__categories\",\"key\":\"id\",\"type\":\"CategoryTable\",\"prefix\":\"Joomla\\\\Component\\\\Categories\\\\Administrator\\\\Table\\\\\",\"config\":\"array()\"},\"common\":{\"dbtable\":\"#__ucm_content\",\"key\":\"ucm_id\",\"type\":\"Corecontent\",\"prefix\":\"Joomla\\\\CMS\\\\Table\\\\\",\"config\":\"array()\"}}', '', '{\"common\":{\"core_content_item_id\":\"id\",\"core_title\":\"title\",\"core_state\":\"published\",\"core_alias\":\"alias\",\"core_created_time\":\"created_time\",\"core_modified_time\":\"modified_time\",\"core_body\":\"description\", \"core_hits\":\"hits\",\"core_publish_up\":\"null\",\"core_publish_down\":\"null\",\"core_access\":\"access\", \"core_params\":\"params\", \"core_featured\":\"null\", \"core_metadata\":\"metadata\", \"core_language\":\"language\", \"core_images\":\"null\", \"core_urls\":\"null\", \"core_version\":\"version\", \"core_ordering\":\"null\", \"core_metakey\":\"metakey\", \"core_metadesc\":\"metadesc\", \"core_catid\":\"parent_id\", \"asset_id\":\"asset_id\"}, \"special\":{\"parent_id\":\"parent_id\",\"lft\":\"lft\",\"rgt\":\"rgt\",\"level\":\"level\",\"path\":\"path\",\"extension\":\"extension\",\"note\":\"note\"}}', 'ContactHelperRoute::getCategoryRoute', '{\"formFile\":\"administrator\\/components\\/com_categories\\/forms\\/category.xml\", \"hideFields\":[\"asset_id\",\"checked_out\",\"checked_out_time\",\"version\",\"lft\",\"rgt\",\"level\",\"path\",\"extension\"], \"ignoreChanges\":[\"modified_user_id\", \"modified_time\", \"checked_out\", \"checked_out_time\", \"version\", \"hits\", \"path\"],\"convertToInt\":[\"publish_up\", \"publish_down\"], \"displayLookup\":[{\"sourceColumn\":\"created_user_id\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"},{\"sourceColumn\":\"access\",\"targetTable\":\"#__viewlevels\",\"targetColumn\":\"id\",\"displayColumn\":\"title\"},{\"sourceColumn\":\"modified_user_id\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"},{\"sourceColumn\":\"parent_id\",\"targetTable\":\"#__categories\",\"targetColumn\":\"id\",\"displayColumn\":\"title\"}]}'),
(7, 'Newsfeeds Category', 'com_newsfeeds.category', '{\"special\":{\"dbtable\":\"#__categories\",\"key\":\"id\",\"type\":\"CategoryTable\",\"prefix\":\"Joomla\\\\Component\\\\Categories\\\\Administrator\\\\Table\\\\\",\"config\":\"array()\"},\"common\":{\"dbtable\":\"#__ucm_content\",\"key\":\"ucm_id\",\"type\":\"Corecontent\",\"prefix\":\"Joomla\\\\CMS\\\\Table\\\\\",\"config\":\"array()\"}}', '', '{\"common\":{\"core_content_item_id\":\"id\",\"core_title\":\"title\",\"core_state\":\"published\",\"core_alias\":\"alias\",\"core_created_time\":\"created_time\",\"core_modified_time\":\"modified_time\",\"core_body\":\"description\", \"core_hits\":\"hits\",\"core_publish_up\":\"null\",\"core_publish_down\":\"null\",\"core_access\":\"access\", \"core_params\":\"params\", \"core_featured\":\"null\", \"core_metadata\":\"metadata\", \"core_language\":\"language\", \"core_images\":\"null\", \"core_urls\":\"null\", \"core_version\":\"version\", \"core_ordering\":\"null\", \"core_metakey\":\"metakey\", \"core_metadesc\":\"metadesc\", \"core_catid\":\"parent_id\", \"asset_id\":\"asset_id\"}, \"special\":{\"parent_id\":\"parent_id\",\"lft\":\"lft\",\"rgt\":\"rgt\",\"level\":\"level\",\"path\":\"path\",\"extension\":\"extension\",\"note\":\"note\"}}', 'NewsfeedsHelperRoute::getCategoryRoute', '{\"formFile\":\"administrator\\/components\\/com_categories\\/forms\\/category.xml\", \"hideFields\":[\"asset_id\",\"checked_out\",\"checked_out_time\",\"version\",\"lft\",\"rgt\",\"level\",\"path\",\"extension\"], \"ignoreChanges\":[\"modified_user_id\", \"modified_time\", \"checked_out\", \"checked_out_time\", \"version\", \"hits\", \"path\"],\"convertToInt\":[\"publish_up\", \"publish_down\"], \"displayLookup\":[{\"sourceColumn\":\"created_user_id\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"},{\"sourceColumn\":\"access\",\"targetTable\":\"#__viewlevels\",\"targetColumn\":\"id\",\"displayColumn\":\"title\"},{\"sourceColumn\":\"modified_user_id\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"},{\"sourceColumn\":\"parent_id\",\"targetTable\":\"#__categories\",\"targetColumn\":\"id\",\"displayColumn\":\"title\"}]}'),
(8, 'Tag', 'com_tags.tag', '{\"special\":{\"dbtable\":\"#__tags\",\"key\":\"tag_id\",\"type\":\"TagTable\",\"prefix\":\"Joomla\\\\Component\\\\Tags\\\\Administrator\\\\Table\\\\\",\"config\":\"array()\"},\"common\":{\"dbtable\":\"#__ucm_content\",\"key\":\"ucm_id\",\"type\":\"Corecontent\",\"prefix\":\"Joomla\\\\CMS\\\\Table\\\\\",\"config\":\"array()\"}}', '', '{\"common\":{\"core_content_item_id\":\"id\",\"core_title\":\"title\",\"core_state\":\"published\",\"core_alias\":\"alias\",\"core_created_time\":\"created_time\",\"core_modified_time\":\"modified_time\",\"core_body\":\"description\", \"core_hits\":\"hits\",\"core_publish_up\":\"null\",\"core_publish_down\":\"null\",\"core_access\":\"access\", \"core_params\":\"params\", \"core_featured\":\"featured\", \"core_metadata\":\"metadata\", \"core_language\":\"language\", \"core_images\":\"images\", \"core_urls\":\"urls\", \"core_version\":\"version\", \"core_ordering\":\"null\", \"core_metakey\":\"metakey\", \"core_metadesc\":\"metadesc\", \"core_catid\":\"null\", \"asset_id\":\"null\"}, \"special\":{\"parent_id\":\"parent_id\",\"lft\":\"lft\",\"rgt\":\"rgt\",\"level\":\"level\",\"path\":\"path\"}}', 'TagsHelperRoute::getTagRoute', '{\"formFile\":\"administrator\\/components\\/com_tags\\/forms\\/tag.xml\", \"hideFields\":[\"checked_out\",\"checked_out_time\",\"version\", \"lft\", \"rgt\", \"level\", \"path\", \"urls\", \"publish_up\", \"publish_down\"],\"ignoreChanges\":[\"modified_user_id\", \"modified_time\", \"checked_out\", \"checked_out_time\", \"version\", \"hits\", \"path\"],\"convertToInt\":[\"publish_up\", \"publish_down\"], \"displayLookup\":[{\"sourceColumn\":\"created_user_id\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"}, {\"sourceColumn\":\"access\",\"targetTable\":\"#__viewlevels\",\"targetColumn\":\"id\",\"displayColumn\":\"title\"}, {\"sourceColumn\":\"modified_user_id\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"}]}'),
(9, 'Banner', 'com_banners.banner', '{\"special\":{\"dbtable\":\"#__banners\",\"key\":\"id\",\"type\":\"BannerTable\",\"prefix\":\"Joomla\\\\Component\\\\Banners\\\\Administrator\\\\Table\\\\\",\"config\":\"array()\"},\"common\":{\"dbtable\":\"#__ucm_content\",\"key\":\"ucm_id\",\"type\":\"Corecontent\",\"prefix\":\"Joomla\\\\CMS\\\\Table\\\\\",\"config\":\"array()\"}}', '', '{\"common\":{\"core_content_item_id\":\"id\",\"core_title\":\"name\",\"core_state\":\"published\",\"core_alias\":\"alias\",\"core_created_time\":\"created\",\"core_modified_time\":\"modified\",\"core_body\":\"description\", \"core_hits\":\"null\",\"core_publish_up\":\"publish_up\",\"core_publish_down\":\"publish_down\",\"core_access\":\"access\", \"core_params\":\"params\", \"core_featured\":\"null\", \"core_metadata\":\"metadata\", \"core_language\":\"language\", \"core_images\":\"images\", \"core_urls\":\"link\", \"core_version\":\"version\", \"core_ordering\":\"ordering\", \"core_metakey\":\"metakey\", \"core_metadesc\":\"metadesc\", \"core_catid\":\"catid\", \"asset_id\":\"null\"}, \"special\":{\"imptotal\":\"imptotal\", \"impmade\":\"impmade\", \"clicks\":\"clicks\", \"clickurl\":\"clickurl\", \"custombannercode\":\"custombannercode\", \"cid\":\"cid\", \"purchase_type\":\"purchase_type\", \"track_impressions\":\"track_impressions\", \"track_clicks\":\"track_clicks\"}}', '', '{\"formFile\":\"administrator\\/components\\/com_banners\\/forms\\/banner.xml\", \"hideFields\":[\"checked_out\",\"checked_out_time\",\"version\", \"reset\"],\"ignoreChanges\":[\"modified_by\", \"modified\", \"checked_out\", \"checked_out_time\", \"version\", \"imptotal\", \"impmade\", \"reset\"], \"convertToInt\":[\"publish_up\", \"publish_down\", \"ordering\"], \"displayLookup\":[{\"sourceColumn\":\"catid\",\"targetTable\":\"#__categories\",\"targetColumn\":\"id\",\"displayColumn\":\"title\"}, {\"sourceColumn\":\"cid\",\"targetTable\":\"#__banner_clients\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"}, {\"sourceColumn\":\"created_by\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"},{\"sourceColumn\":\"modified_by\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"} ]}'),
(10, 'Banners Category', 'com_banners.category', '{\"special\":{\"dbtable\":\"#__categories\",\"key\":\"id\",\"type\":\"CategoryTable\",\"prefix\":\"Joomla\\\\Component\\\\Categories\\\\Administrator\\\\Table\\\\\",\"config\":\"array()\"},\"common\":{\"dbtable\":\"#__ucm_content\",\"key\":\"ucm_id\",\"type\":\"Corecontent\",\"prefix\":\"Joomla\\\\CMS\\\\Table\\\\\",\"config\":\"array()\"}}', '', '{\"common\":{\"core_content_item_id\":\"id\",\"core_title\":\"title\",\"core_state\":\"published\",\"core_alias\":\"alias\",\"core_created_time\":\"created_time\",\"core_modified_time\":\"modified_time\",\"core_body\":\"description\", \"core_hits\":\"hits\",\"core_publish_up\":\"null\",\"core_publish_down\":\"null\",\"core_access\":\"access\", \"core_params\":\"params\", \"core_featured\":\"null\", \"core_metadata\":\"metadata\", \"core_language\":\"language\", \"core_images\":\"null\", \"core_urls\":\"null\", \"core_version\":\"version\", \"core_ordering\":\"null\", \"core_metakey\":\"metakey\", \"core_metadesc\":\"metadesc\", \"core_catid\":\"parent_id\", \"asset_id\":\"asset_id\"}, \"special\": {\"parent_id\":\"parent_id\",\"lft\":\"lft\",\"rgt\":\"rgt\",\"level\":\"level\",\"path\":\"path\",\"extension\":\"extension\",\"note\":\"note\"}}', '', '{\"formFile\":\"administrator\\/components\\/com_categories\\/forms\\/category.xml\", \"hideFields\":[\"asset_id\",\"checked_out\",\"checked_out_time\",\"version\",\"lft\",\"rgt\",\"level\",\"path\",\"extension\"], \"ignoreChanges\":[\"modified_user_id\", \"modified_time\", \"checked_out\", \"checked_out_time\", \"version\", \"hits\", \"path\"], \"convertToInt\":[\"publish_up\", \"publish_down\"], \"displayLookup\":[{\"sourceColumn\":\"created_user_id\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"},{\"sourceColumn\":\"access\",\"targetTable\":\"#__viewlevels\",\"targetColumn\":\"id\",\"displayColumn\":\"title\"},{\"sourceColumn\":\"modified_user_id\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"},{\"sourceColumn\":\"parent_id\",\"targetTable\":\"#__categories\",\"targetColumn\":\"id\",\"displayColumn\":\"title\"}]}'),
(11, 'Banner Client', 'com_banners.client', '{\"special\":{\"dbtable\":\"#__banner_clients\",\"key\":\"id\",\"type\":\"ClientTable\",\"prefix\":\"Joomla\\\\Component\\\\Banners\\\\Administrator\\\\Table\\\\\"}}', '', '', '', '{\"formFile\":\"administrator\\/components\\/com_banners\\/forms\\/client.xml\", \"hideFields\":[\"checked_out\",\"checked_out_time\"], \"ignoreChanges\":[\"checked_out\", \"checked_out_time\"], \"convertToInt\":[], \"displayLookup\":[]}'),
(12, 'User Notes', 'com_users.note', '{\"special\":{\"dbtable\":\"#__user_notes\",\"key\":\"id\",\"type\":\"NoteTable\",\"prefix\":\"Joomla\\\\Component\\\\Users\\\\Administrator\\\\Table\\\\\"}}', '', '', '', '{\"formFile\":\"administrator\\/components\\/com_users\\/forms\\/note.xml\", \"hideFields\":[\"checked_out\",\"checked_out_time\", \"publish_up\", \"publish_down\"],\"ignoreChanges\":[\"modified_user_id\", \"modified_time\", \"checked_out\", \"checked_out_time\"], \"convertToInt\":[\"publish_up\", \"publish_down\"],\"displayLookup\":[{\"sourceColumn\":\"catid\",\"targetTable\":\"#__categories\",\"targetColumn\":\"id\",\"displayColumn\":\"title\"}, {\"sourceColumn\":\"created_user_id\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"}, {\"sourceColumn\":\"user_id\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"}, {\"sourceColumn\":\"modified_user_id\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"}]}'),
(13, 'User Notes Category', 'com_users.category', '{\"special\":{\"dbtable\":\"#__categories\",\"key\":\"id\",\"type\":\"CategoryTable\",\"prefix\":\"Joomla\\\\Component\\\\Categories\\\\Administrator\\\\Table\\\\\",\"config\":\"array()\"},\"common\":{\"dbtable\":\"#__ucm_content\",\"key\":\"ucm_id\",\"type\":\"Corecontent\",\"prefix\":\"Joomla\\\\CMS\\\\Table\\\\\",\"config\":\"array()\"}}', '', '{\"common\":{\"core_content_item_id\":\"id\",\"core_title\":\"title\",\"core_state\":\"published\",\"core_alias\":\"alias\",\"core_created_time\":\"created_time\",\"core_modified_time\":\"modified_time\",\"core_body\":\"description\", \"core_hits\":\"hits\",\"core_publish_up\":\"null\",\"core_publish_down\":\"null\",\"core_access\":\"access\", \"core_params\":\"params\", \"core_featured\":\"null\", \"core_metadata\":\"metadata\", \"core_language\":\"language\", \"core_images\":\"null\", \"core_urls\":\"null\", \"core_version\":\"version\", \"core_ordering\":\"null\", \"core_metakey\":\"metakey\", \"core_metadesc\":\"metadesc\", \"core_catid\":\"parent_id\", \"asset_id\":\"asset_id\"}, \"special\":{\"parent_id\":\"parent_id\",\"lft\":\"lft\",\"rgt\":\"rgt\",\"level\":\"level\",\"path\":\"path\",\"extension\":\"extension\",\"note\":\"note\"}}', '', '{\"formFile\":\"administrator\\/components\\/com_categories\\/forms\\/category.xml\", \"hideFields\":[\"checked_out\",\"checked_out_time\",\"version\",\"lft\",\"rgt\",\"level\",\"path\",\"extension\"], \"ignoreChanges\":[\"modified_user_id\", \"modified_time\", \"checked_out\", \"checked_out_time\", \"version\", \"hits\", \"path\"], \"convertToInt\":[\"publish_up\", \"publish_down\"], \"displayLookup\":[{\"sourceColumn\":\"created_user_id\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"}, {\"sourceColumn\":\"access\",\"targetTable\":\"#__viewlevels\",\"targetColumn\":\"id\",\"displayColumn\":\"title\"},{\"sourceColumn\":\"modified_user_id\",\"targetTable\":\"#__users\",\"targetColumn\":\"id\",\"displayColumn\":\"name\"},{\"sourceColumn\":\"parent_id\",\"targetTable\":\"#__categories\",\"targetColumn\":\"id\",\"displayColumn\":\"title\"}]}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_extensions`
--

CREATE TABLE `bol96_extensions` (
  `extension_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL DEFAULT 0 COMMENT 'Parent package ID for extensions installed as a package.',
  `name` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `element` varchar(100) NOT NULL,
  `changelogurl` text DEFAULT NULL,
  `folder` varchar(100) NOT NULL,
  `client_id` tinyint(4) NOT NULL,
  `enabled` tinyint(4) NOT NULL DEFAULT 0,
  `access` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `protected` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Flag to indicate if the extension is protected. Protected extensions cannot be disabled.',
  `locked` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Flag to indicate if the extension is locked. Locked extensions cannot be uninstalled.',
  `manifest_cache` text NOT NULL,
  `params` text NOT NULL,
  `custom_data` text NOT NULL,
  `checked_out` int(10) UNSIGNED DEFAULT NULL,
  `checked_out_time` datetime DEFAULT NULL,
  `ordering` int(11) DEFAULT 0,
  `state` int(11) DEFAULT 0,
  `note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bol96_extensions`
--

INSERT INTO `bol96_extensions` (`extension_id`, `package_id`, `name`, `type`, `element`, `changelogurl`, `folder`, `client_id`, `enabled`, `access`, `protected`, `locked`, `manifest_cache`, `params`, `custom_data`, `checked_out`, `checked_out_time`, `ordering`, `state`, `note`) VALUES
(1, 0, 'com_wrapper', 'component', 'com_wrapper', NULL, '', 1, 1, 1, 0, 1, '{\"name\":\"com_wrapper\",\"type\":\"component\",\"creationDate\":\"2006-04\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2007 Open Source Matters, Inc.\\n\\t\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"COM_WRAPPER_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Component\\\\Wrapper\",\"filename\":\"wrapper\"}', '', '', NULL, NULL, 0, 0, NULL),
(2, 0, 'com_admin', 'component', 'com_admin', NULL, '', 1, 1, 1, 1, 1, '{\"name\":\"com_admin\",\"type\":\"component\",\"creationDate\":\"2006-04\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2006 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"COM_ADMIN_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Component\\\\Admin\"}', '', '', NULL, NULL, 0, 0, NULL),
(3, 0, 'com_banners', 'component', 'com_banners', NULL, '', 1, 1, 1, 0, 1, '{\"name\":\"com_banners\",\"type\":\"component\",\"creationDate\":\"2006-04\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2006 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"COM_BANNERS_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Component\\\\Banners\",\"filename\":\"banners\"}', '{\"purchase_type\":\"3\",\"track_impressions\":\"0\",\"track_clicks\":\"0\",\"metakey_prefix\":\"\",\"save_history\":\"1\",\"history_limit\":10}', '', NULL, NULL, 0, 0, NULL),
(4, 0, 'com_cache', 'component', 'com_cache', NULL, '', 1, 1, 1, 1, 1, '{\"name\":\"com_cache\",\"type\":\"component\",\"creationDate\":\"2006-04\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2006 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"COM_CACHE_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Component\\\\Cache\"}', '', '', NULL, NULL, 0, 0, NULL),
(5, 0, 'com_categories', 'component', 'com_categories', NULL, '', 1, 1, 1, 1, 1, '{\"name\":\"com_categories\",\"type\":\"component\",\"creationDate\":\"2007-12\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2007 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"COM_CATEGORIES_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Component\\\\Categories\"}', '', '', NULL, NULL, 0, 0, NULL),
(6, 0, 'com_checkin', 'component', 'com_checkin', NULL, '', 1, 1, 1, 1, 1, '{\"name\":\"com_checkin\",\"type\":\"component\",\"creationDate\":\"2006-04\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2006 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"COM_CHECKIN_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Component\\\\Checkin\"}', '', '', NULL, NULL, 0, 0, NULL),
(7, 0, 'com_contact', 'component', 'com_contact', NULL, '', 1, 1, 1, 0, 1, '{\"name\":\"com_contact\",\"type\":\"component\",\"creationDate\":\"2006-04\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2006 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"COM_CONTACT_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Component\\\\Contact\",\"filename\":\"contact\"}', '{\"contact_layout\":\"_:default\",\"show_contact_category\":\"hide\",\"save_history\":\"1\",\"history_limit\":10,\"show_contact_list\":\"0\",\"presentation_style\":\"sliders\",\"show_tags\":\"1\",\"show_info\":\"1\",\"show_name\":\"1\",\"show_position\":\"1\",\"show_email\":\"0\",\"show_street_address\":\"1\",\"show_suburb\":\"1\",\"show_state\":\"1\",\"show_postcode\":\"1\",\"show_country\":\"1\",\"show_telephone\":\"1\",\"show_mobile\":\"1\",\"show_fax\":\"1\",\"show_webpage\":\"1\",\"show_image\":\"1\",\"show_misc\":\"1\",\"image\":\"\",\"allow_vcard\":\"0\",\"show_articles\":\"0\",\"articles_display_num\":\"10\",\"show_profile\":\"0\",\"show_user_custom_fields\":[\"-1\"],\"show_links\":\"0\",\"linka_name\":\"\",\"linkb_name\":\"\",\"linkc_name\":\"\",\"linkd_name\":\"\",\"linke_name\":\"\",\"contact_icons\":\"0\",\"icon_address\":\"\",\"icon_email\":\"\",\"icon_telephone\":\"\",\"icon_mobile\":\"\",\"icon_fax\":\"\",\"icon_misc\":\"\",\"category_layout\":\"_:default\",\"show_category_title\":\"1\",\"show_description\":\"1\",\"show_description_image\":\"0\",\"maxLevel\":\"-1\",\"show_subcat_desc\":\"1\",\"show_empty_categories\":\"0\",\"show_cat_items\":\"1\",\"show_cat_tags\":\"1\",\"show_base_description\":\"1\",\"maxLevelcat\":\"-1\",\"show_subcat_desc_cat\":\"1\",\"show_empty_categories_cat\":\"0\",\"show_cat_items_cat\":\"1\",\"filter_field\":\"0\",\"show_pagination_limit\":\"0\",\"show_headings\":\"1\",\"show_image_heading\":\"0\",\"show_position_headings\":\"1\",\"show_email_headings\":\"0\",\"show_telephone_headings\":\"1\",\"show_mobile_headings\":\"0\",\"show_fax_headings\":\"0\",\"show_suburb_headings\":\"1\",\"show_state_headings\":\"1\",\"show_country_headings\":\"1\",\"show_pagination\":\"2\",\"show_pagination_results\":\"1\",\"initial_sort\":\"ordering\",\"captcha\":\"\",\"show_email_form\":\"1\",\"show_email_copy\":\"0\",\"banned_email\":\"\",\"banned_subject\":\"\",\"banned_text\":\"\",\"validate_session\":\"1\",\"custom_reply\":\"0\",\"redirect\":\"\",\"show_feed_link\":\"1\",\"sef_ids\":1,\"custom_fields_enable\":\"1\"}', '', NULL, NULL, 0, 0, NULL),
(8, 0, 'com_cpanel', 'component', 'com_cpanel', NULL, '', 1, 1, 1, 1, 1, '{\"name\":\"com_cpanel\",\"type\":\"component\",\"creationDate\":\"2007-06\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2007 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"COM_CPANEL_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Component\\\\Cpanel\"}', '', '', NULL, NULL, 0, 0, NULL),
(9, 0, 'com_installer', 'component', 'com_installer', NULL, '', 1, 1, 1, 1, 1, '{\"name\":\"com_installer\",\"type\":\"component\",\"creationDate\":\"2006-04\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2006 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"COM_INSTALLER_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Component\\\\Installer\"}', '{\"cachetimeout\":\"6\",\"minimum_stability\":\"4\"}', '', NULL, NULL, 0, 0, NULL),
(10, 0, 'com_languages', 'component', 'com_languages', NULL, '', 1, 1, 1, 1, 1, '{\"name\":\"com_languages\",\"type\":\"component\",\"creationDate\":\"2006-04\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2006 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"COM_LANGUAGES_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Component\\\\Languages\"}', '{\"administrator\":\"en-GB\",\"site\":\"en-GB\"}', '', NULL, NULL, 0, 0, NULL),
(11, 0, 'com_login', 'component', 'com_login', NULL, '', 1, 1, 1, 1, 1, '{\"name\":\"com_login\",\"type\":\"component\",\"creationDate\":\"2006-04\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2006 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"COM_LOGIN_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Component\\\\Login\"}', '', '', NULL, NULL, 0, 0, NULL),
(12, 0, 'com_media', 'component', 'com_media', NULL, '', 1, 1, 0, 1, 1, '{\"name\":\"com_media\",\"type\":\"component\",\"creationDate\":\"2006-04\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2006 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"COM_MEDIA_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Component\\\\Media\",\"filename\":\"media\"}', '{\"upload_maxsize\":\"50\",\"file_path\":\"images\",\"image_path\":\"images\",\"restrict_uploads\":\"1\",\"restrict_uploads_extensions\":\"bmp,gif,jpg,jpeg,png,webp,ico,mp3,m4a,mp4a,ogg,mp4,mp4v,mpeg,mov,odg,odp,ods,odt,pdf,png,ppt,txt,xcf,xls,csv,MP4,svg\",\"check_mime\":\"1\",\"image_extensions\":\"bmp,gif,jpg,png,jpeg,webp,svg\",\"audio_extensions\":\"mp3,m4a,mp4a,ogg\",\"video_extensions\":\"mp4,mp4v,mpeg,mov,webm,MP4\",\"doc_extensions\":\"odg,odp,ods,odt,pdf,ppt,txt,xcf,xls,csv\",\"ignore_extensions\":\"\",\"upload_mime\":\"image\\/jpeg,image\\/gif,image\\/png,image\\/bmp,image\\/webp,audio\\/ogg,audio\\/mpeg,audio\\/mp4,video\\/mp4,video\\/MP4,video\\/webm,video\\/mpeg,video\\/quicktime,application\\/msword,application\\/excel,application\\/pdf,application\\/powerpoint,text\\/plain,application\\/x-zip\"}', '', NULL, NULL, 0, 0, NULL),
(13, 0, 'com_menus', 'component', 'com_menus', NULL, '', 1, 1, 1, 1, 1, '{\"name\":\"com_menus\",\"type\":\"component\",\"creationDate\":\"2006-04\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2006 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"COM_MENUS_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Component\\\\Menus\",\"filename\":\"menus\"}', '{\"page_title\":\"Boletera Spivet\",\"show_page_heading\":1,\"page_heading\":\"\",\"pageclass_sfx\":\"\"}', '', NULL, NULL, 0, 0, NULL),
(14, 0, 'com_messages', 'component', 'com_messages', NULL, '', 1, 1, 1, 1, 1, '{\"name\":\"com_messages\",\"type\":\"component\",\"creationDate\":\"2006-04\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2006 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"COM_MESSAGES_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Component\\\\Messages\"}', '', '', NULL, NULL, 0, 0, NULL),
(15, 0, 'com_modules', 'component', 'com_modules', NULL, '', 1, 1, 1, 1, 1, '{\"name\":\"com_modules\",\"type\":\"component\",\"creationDate\":\"2006-04\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2006 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"COM_MODULES_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Component\\\\Modules\",\"filename\":\"modules\"}', '', '', NULL, NULL, 0, 0, NULL),
(16, 0, 'com_newsfeeds', 'component', 'com_newsfeeds', NULL, '', 1, 1, 1, 0, 1, '{\"name\":\"com_newsfeeds\",\"type\":\"component\",\"creationDate\":\"2006-04\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2006 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"COM_NEWSFEEDS_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Component\\\\Newsfeeds\",\"filename\":\"newsfeeds\"}', '{\"newsfeed_layout\":\"_:default\",\"save_history\":\"1\",\"history_limit\":5,\"show_feed_image\":\"1\",\"show_feed_description\":\"1\",\"show_item_description\":\"1\",\"feed_character_count\":\"0\",\"feed_display_order\":\"des\",\"float_first\":\"right\",\"float_second\":\"right\",\"show_tags\":\"1\",\"category_layout\":\"_:default\",\"show_category_title\":\"1\",\"show_description\":\"1\",\"show_description_image\":\"1\",\"maxLevel\":\"-1\",\"show_empty_categories\":\"0\",\"show_subcat_desc\":\"1\",\"show_cat_items\":\"1\",\"show_cat_tags\":\"1\",\"show_base_description\":\"1\",\"maxLevelcat\":\"-1\",\"show_empty_categories_cat\":\"0\",\"show_subcat_desc_cat\":\"1\",\"show_cat_items_cat\":\"1\",\"filter_field\":\"1\",\"show_pagination_limit\":\"1\",\"show_headings\":\"1\",\"show_articles\":\"0\",\"show_link\":\"1\",\"show_pagination\":\"1\",\"show_pagination_results\":\"1\",\"sef_ids\":1}', '', NULL, NULL, 0, 0, NULL),
(17, 0, 'com_plugins', 'component', 'com_plugins', NULL, '', 1, 1, 1, 1, 1, '{\"name\":\"com_plugins\",\"type\":\"component\",\"creationDate\":\"2006-04\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2006 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"COM_PLUGINS_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Component\\\\Plugins\"}', '', '', NULL, NULL, 0, 0, NULL),
(18, 0, 'com_templates', 'component', 'com_templates', NULL, '', 1, 1, 1, 1, 1, '{\"name\":\"com_templates\",\"type\":\"component\",\"creationDate\":\"2006-04\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2006 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"COM_TEMPLATES_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Component\\\\Templates\"}', '{\"template_positions_display\":\"0\",\"upload_limit\":\"10\",\"image_formats\":\"gif,bmp,jpg,jpeg,png,webp\",\"source_formats\":\"txt,less,ini,xml,js,php,css,scss,sass,json\",\"font_formats\":\"woff,woff2,ttf,otf\",\"compressed_formats\":\"zip\",\"difference\":\"SideBySide\"}', '', NULL, NULL, 0, 0, NULL),
(19, 0, 'com_content', 'component', 'com_content', NULL, '', 1, 1, 0, 1, 1, '{\"name\":\"com_content\",\"type\":\"component\",\"creationDate\":\"2006-04\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2006 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"COM_CONTENT_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Component\\\\Content\",\"filename\":\"content\"}', '{\"article_layout\":\"_:default\",\"show_title\":\"1\",\"link_titles\":\"1\",\"show_intro\":\"1\",\"info_block_position\":\"0\",\"info_block_show_title\":\"1\",\"show_category\":\"1\",\"link_category\":\"1\",\"show_parent_category\":\"0\",\"link_parent_category\":\"0\",\"show_associations\":\"0\",\"flags\":\"1\",\"show_author\":\"1\",\"link_author\":\"0\",\"show_create_date\":\"0\",\"show_modify_date\":\"0\",\"show_publish_date\":\"1\",\"show_item_navigation\":\"1\",\"show_readmore\":\"1\",\"show_readmore_title\":\"1\",\"readmore_limit\":100,\"show_tags\":\"1\",\"record_hits\":\"1\",\"show_hits\":\"1\",\"show_noauth\":\"0\",\"urls_position\":0,\"captcha\":\"\",\"show_publishing_options\":\"1\",\"show_article_options\":\"1\",\"show_configure_edit_options\":\"1\",\"show_permissions\":\"1\",\"show_associations_edit\":\"1\",\"save_history\":\"1\",\"history_limit\":10,\"show_urls_images_frontend\":\"0\",\"show_urls_images_backend\":\"1\",\"targeta\":0,\"targetb\":0,\"targetc\":0,\"float_intro\":\"left\",\"float_fulltext\":\"left\",\"category_layout\":\"_:blog\",\"show_category_title\":\"0\",\"show_description\":\"0\",\"show_description_image\":\"0\",\"maxLevel\":\"1\",\"show_empty_categories\":\"0\",\"show_no_articles\":\"1\",\"show_category_heading_title_text\":\"1\",\"show_subcat_desc\":\"1\",\"show_cat_num_articles\":\"0\",\"show_cat_tags\":\"1\",\"show_base_description\":\"1\",\"maxLevelcat\":\"-1\",\"show_empty_categories_cat\":\"0\",\"show_subcat_desc_cat\":\"1\",\"show_cat_num_articles_cat\":\"1\",\"num_leading_articles\":1,\"blog_class_leading\":\"\",\"num_intro_articles\":4,\"blog_class\":\"\",\"num_columns\":1,\"multi_column_order\":\"0\",\"num_links\":4,\"show_subcategory_content\":\"0\",\"link_intro_image\":\"0\",\"show_pagination_limit\":\"1\",\"filter_field\":\"hide\",\"show_headings\":\"1\",\"list_show_date\":\"0\",\"date_format\":\"\",\"list_show_hits\":\"1\",\"list_show_author\":\"1\",\"display_num\":\"10\",\"orderby_pri\":\"order\",\"orderby_sec\":\"rdate\",\"order_date\":\"published\",\"show_pagination\":\"2\",\"show_pagination_results\":\"1\",\"show_featured\":\"show\",\"show_feed_link\":\"1\",\"feed_summary\":\"0\",\"feed_show_readmore\":\"0\",\"sef_ids\":1,\"custom_fields_enable\":\"1\",\"workflow_enabled\":\"0\"}', '', NULL, NULL, 0, 0, NULL),
(20, 0, 'com_config', 'component', 'com_config', NULL, '', 1, 1, 0, 1, 1, '{\"name\":\"com_config\",\"type\":\"component\",\"creationDate\":\"2006-04\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2006 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"COM_CONFIG_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Component\\\\Config\",\"filename\":\"config\"}', '{\"filters\":{\"1\":{\"filter_type\":\"NH\",\"filter_tags\":\"\",\"filter_attributes\":\"\"},\"9\":{\"filter_type\":\"NH\",\"filter_tags\":\"\",\"filter_attributes\":\"\"},\"6\":{\"filter_type\":\"BL\",\"filter_tags\":\"\",\"filter_attributes\":\"\"},\"7\":{\"filter_type\":\"BL\",\"filter_tags\":\"\",\"filter_attributes\":\"\"},\"2\":{\"filter_type\":\"NH\",\"filter_tags\":\"\",\"filter_attributes\":\"\"},\"3\":{\"filter_type\":\"BL\",\"filter_tags\":\"\",\"filter_attributes\":\"\"},\"4\":{\"filter_type\":\"BL\",\"filter_tags\":\"\",\"filter_attributes\":\"\"},\"5\":{\"filter_type\":\"BL\",\"filter_tags\":\"\",\"filter_attributes\":\"\"},\"8\":{\"filter_type\":\"NONE\",\"filter_tags\":\"\",\"filter_attributes\":\"\"}}}', '', NULL, NULL, 0, 0, NULL),
(21, 0, 'com_redirect', 'component', 'com_redirect', NULL, '', 1, 1, 0, 0, 1, '{\"name\":\"com_redirect\",\"type\":\"component\",\"creationDate\":\"2006-04\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2006 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"COM_REDIRECT_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Component\\\\Redirect\"}', '', '', NULL, NULL, 0, 0, NULL),
(22, 0, 'com_users', 'component', 'com_users', NULL, '', 1, 1, 0, 1, 1, '{\"name\":\"com_users\",\"type\":\"component\",\"creationDate\":\"2006-04\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2006 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"COM_USERS_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Component\\\\Users\",\"filename\":\"users\"}', '{\"allowUserRegistration\":\"0\",\"new_usertype\":\"2\",\"guest_usergroup\":\"9\",\"sendpassword\":\"0\",\"useractivation\":\"2\",\"mail_to_admin\":\"1\",\"captcha\":\"\",\"frontend_userparams\":\"1\",\"site_language\":\"0\",\"change_login_name\":\"0\",\"reset_count\":\"10\",\"reset_time\":\"1\",\"minimum_length\":\"12\",\"minimum_integers\":\"0\",\"minimum_symbols\":\"0\",\"minimum_uppercase\":\"0\",\"save_history\":\"1\",\"history_limit\":5,\"mailSubjectPrefix\":\"\",\"mailBodySuffix\":\"\"}', '', NULL, NULL, 0, 0, NULL),
(23, 0, 'com_finder', 'component', 'com_finder', NULL, '', 1, 1, 0, 0, 1, '{\"name\":\"com_finder\",\"type\":\"component\",\"creationDate\":\"2011-08\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2011 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"COM_FINDER_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Component\\\\Finder\",\"filename\":\"finder\"}', '{\"enabled\":\"0\",\"show_description\":\"1\",\"description_length\":255,\"allow_empty_query\":\"0\",\"show_url\":\"1\",\"show_autosuggest\":\"1\",\"show_suggested_query\":\"1\",\"show_explained_query\":\"1\",\"show_advanced\":\"1\",\"show_advanced_tips\":\"1\",\"expand_advanced\":\"0\",\"show_date_filters\":\"0\",\"sort_order\":\"relevance\",\"sort_direction\":\"desc\",\"highlight_terms\":\"1\",\"opensearch_name\":\"\",\"opensearch_description\":\"\",\"batch_size\":\"50\",\"title_multiplier\":\"1.7\",\"text_multiplier\":\"0.7\",\"meta_multiplier\":\"1.2\",\"path_multiplier\":\"2.0\",\"misc_multiplier\":\"0.3\",\"stem\":\"1\",\"stemmer\":\"snowball\",\"enable_logging\":\"0\"}', '', NULL, NULL, 0, 0, NULL),
(24, 0, 'com_joomlaupdate', 'component', 'com_joomlaupdate', NULL, '', 1, 1, 0, 1, 1, '{\"name\":\"com_joomlaupdate\",\"type\":\"component\",\"creationDate\":\"2021-08\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2012 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.3\",\"description\":\"COM_JOOMLAUPDATE_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Component\\\\Joomlaupdate\"}', '{\"updatesource\":\"default\",\"customurl\":\"\"}', '', NULL, NULL, 0, 0, NULL),
(25, 0, 'com_tags', 'component', 'com_tags', NULL, '', 1, 1, 1, 0, 1, '{\"name\":\"com_tags\",\"type\":\"component\",\"creationDate\":\"2013-12\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2013 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"COM_TAGS_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Component\\\\Tags\",\"filename\":\"tags\"}', '{\"tag_layout\":\"_:default\",\"save_history\":\"1\",\"history_limit\":5,\"show_tag_title\":\"0\",\"tag_list_show_tag_image\":\"0\",\"tag_list_show_tag_description\":\"0\",\"tag_list_image\":\"\",\"tag_list_orderby\":\"title\",\"tag_list_orderby_direction\":\"ASC\",\"show_headings\":\"0\",\"tag_list_show_date\":\"0\",\"tag_list_show_item_image\":\"0\",\"tag_list_show_item_description\":\"0\",\"tag_list_item_maximum_characters\":0,\"return_any_or_all\":\"1\",\"include_children\":\"0\",\"maximum\":200,\"tag_list_language_filter\":\"all\",\"tags_layout\":\"_:default\",\"all_tags_orderby\":\"title\",\"all_tags_orderby_direction\":\"ASC\",\"all_tags_show_tag_image\":\"0\",\"all_tags_show_tag_description\":\"0\",\"all_tags_tag_maximum_characters\":20,\"all_tags_show_tag_hits\":\"0\",\"filter_field\":\"1\",\"show_pagination_limit\":\"1\",\"show_pagination\":\"2\",\"show_pagination_results\":\"1\",\"tag_field_ajax_mode\":\"1\",\"show_feed_link\":\"1\"}', '', NULL, NULL, 0, 0, NULL),
(26, 0, 'com_contenthistory', 'component', 'com_contenthistory', NULL, '', 1, 1, 1, 0, 1, '{\"name\":\"com_contenthistory\",\"type\":\"component\",\"creationDate\":\"2013-05\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2013 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"COM_CONTENTHISTORY_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Component\\\\Contenthistory\",\"filename\":\"contenthistory\"}', '', '', NULL, NULL, 0, 0, NULL),
(27, 0, 'com_ajax', 'component', 'com_ajax', NULL, '', 1, 1, 1, 1, 1, '{\"name\":\"com_ajax\",\"type\":\"component\",\"creationDate\":\"2013-08\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2013 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"COM_AJAX_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"ajax\"}', '', '', NULL, NULL, 0, 0, NULL),
(28, 0, 'com_postinstall', 'component', 'com_postinstall', NULL, '', 1, 1, 1, 1, 1, '{\"name\":\"com_postinstall\",\"type\":\"component\",\"creationDate\":\"2013-09\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2013 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"COM_POSTINSTALL_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Component\\\\Postinstall\"}', '', '', NULL, NULL, 0, 0, NULL),
(29, 0, 'com_fields', 'component', 'com_fields', NULL, '', 1, 1, 1, 0, 1, '{\"name\":\"com_fields\",\"type\":\"component\",\"creationDate\":\"2016-03\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2016 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"COM_FIELDS_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Component\\\\Fields\",\"filename\":\"fields\"}', '', '', NULL, NULL, 0, 0, NULL),
(30, 0, 'com_associations', 'component', 'com_associations', NULL, '', 1, 1, 1, 0, 1, '{\"name\":\"com_associations\",\"type\":\"component\",\"creationDate\":\"2017-01\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2017 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"COM_ASSOCIATIONS_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Component\\\\Associations\"}', '', '', NULL, NULL, 0, 0, NULL),
(31, 0, 'com_privacy', 'component', 'com_privacy', NULL, '', 1, 1, 1, 0, 1, '{\"name\":\"com_privacy\",\"type\":\"component\",\"creationDate\":\"2018-05\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2018 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.9.0\",\"description\":\"COM_PRIVACY_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Component\\\\Privacy\",\"filename\":\"privacy\"}', '', '', NULL, NULL, 0, 0, NULL),
(32, 0, 'com_actionlogs', 'component', 'com_actionlogs', NULL, '', 1, 1, 1, 0, 1, '{\"name\":\"com_actionlogs\",\"type\":\"component\",\"creationDate\":\"2018-05\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2018 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.9.0\",\"description\":\"COM_ACTIONLOGS_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Component\\\\Actionlogs\"}', '{\"ip_logging\":0,\"csv_delimiter\":\",\",\"loggable_extensions\":[\"com_banners\",\"com_cache\",\"com_categories\",\"com_checkin\",\"com_config\",\"com_contact\",\"com_content\",\"com_installer\",\"com_media\",\"com_menus\",\"com_messages\",\"com_modules\",\"com_newsfeeds\",\"com_plugins\",\"com_redirect\",\"com_scheduler\",\"com_tags\",\"com_templates\",\"com_users\"]}', '', NULL, NULL, 0, 0, NULL),
(33, 0, 'com_workflow', 'component', 'com_workflow', NULL, '', 1, 1, 0, 1, 1, '{\"name\":\"com_workflow\",\"type\":\"component\",\"creationDate\":\"2017-06\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2018 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"COM_WORKFLOW_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Component\\\\Workflow\"}', '{}', '', NULL, NULL, 0, 0, NULL),
(34, 0, 'com_mails', 'component', 'com_mails', NULL, '', 1, 1, 1, 1, 1, '{\"name\":\"com_mails\",\"type\":\"component\",\"creationDate\":\"2019-01\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2019 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"COM_MAILS_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Component\\\\Mails\"}', '', '', NULL, NULL, 0, 0, NULL),
(35, 0, 'com_scheduler', 'component', 'com_scheduler', NULL, '', 1, 1, 1, 0, 1, '{\"name\":\"com_scheduler\",\"type\":\"component\",\"creationDate\":\"2021-07\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2021 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.1.0\",\"description\":\"COM_SCHEDULER_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Component\\\\Scheduler\"}', '{}', '', NULL, NULL, 0, 0, NULL),
(36, 0, 'com_guidedtours', 'component', 'com_guidedtours', NULL, '', 1, 1, 0, 0, 1, '{\"name\":\"com_guidedtours\",\"type\":\"component\",\"creationDate\":\"2023-02\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2023 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.3.0\",\"description\":\"COM_GUIDEDTOURS_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Component\\\\Guidedtours\"}', '{}', '', NULL, NULL, 0, 0, NULL),
(37, 0, 'lib_joomla', 'library', 'joomla', NULL, '', 0, 1, 1, 1, 1, '{\"name\":\"lib_joomla\",\"type\":\"library\",\"creationDate\":\"2008-01\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2008 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"https:\\/\\/www.joomla.org\",\"version\":\"13.1\",\"description\":\"LIB_JOOMLA_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"joomla\"}', '', '', NULL, NULL, 0, 0, NULL),
(38, 0, 'lib_phpass', 'library', 'phpass', NULL, '', 0, 1, 1, 1, 1, '{\"name\":\"lib_phpass\",\"type\":\"library\",\"creationDate\":\"2004-01\",\"author\":\"Solar Designer\",\"copyright\":\"\",\"authorEmail\":\"solar@openwall.com\",\"authorUrl\":\"https:\\/\\/www.openwall.com\\/phpass\\/\",\"version\":\"0.3\",\"description\":\"LIB_PHPASS_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"phpass\"}', '', '', NULL, NULL, 0, 0, NULL),
(39, 0, 'mod_articles_archive', 'module', 'mod_articles_archive', NULL, '', 0, 1, 1, 0, 1, '{\"name\":\"mod_articles_archive\",\"type\":\"module\",\"creationDate\":\"2006-07\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2006 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_ARTICLES_ARCHIVE_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Module\\\\ArticlesArchive\",\"filename\":\"mod_articles_archive\"}', '', '', NULL, NULL, 0, 0, NULL),
(40, 0, 'mod_articles_latest', 'module', 'mod_articles_latest', NULL, '', 0, 1, 1, 0, 1, '{\"name\":\"mod_articles_latest\",\"type\":\"module\",\"creationDate\":\"2004-07\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_LATEST_NEWS_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Module\\\\ArticlesLatest\",\"filename\":\"mod_articles_latest\"}', '', '', NULL, NULL, 0, 0, NULL),
(41, 0, 'mod_articles_popular', 'module', 'mod_articles_popular', NULL, '', 0, 1, 1, 0, 1, '{\"name\":\"mod_articles_popular\",\"type\":\"module\",\"creationDate\":\"2006-07\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2006 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_POPULAR_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Module\\\\ArticlesPopular\",\"filename\":\"mod_articles_popular\"}', '', '', NULL, NULL, 0, 0, NULL),
(42, 0, 'mod_banners', 'module', 'mod_banners', NULL, '', 0, 1, 1, 0, 1, '{\"name\":\"mod_banners\",\"type\":\"module\",\"creationDate\":\"2006-07\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2006 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_BANNERS_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Module\\\\Banners\",\"filename\":\"mod_banners\"}', '', '', NULL, NULL, 0, 0, NULL),
(43, 0, 'mod_breadcrumbs', 'module', 'mod_breadcrumbs', NULL, '', 0, 1, 1, 0, 1, '{\"name\":\"mod_breadcrumbs\",\"type\":\"module\",\"creationDate\":\"2006-07\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2006 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_BREADCRUMBS_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Module\\\\Breadcrumbs\",\"filename\":\"mod_breadcrumbs\"}', '', '', NULL, NULL, 0, 0, NULL),
(44, 0, 'mod_custom', 'module', 'mod_custom', NULL, '', 0, 1, 1, 0, 1, '{\"name\":\"mod_custom\",\"type\":\"module\",\"creationDate\":\"2004-07\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_CUSTOM_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_custom\"}', '', '', NULL, NULL, 0, 0, NULL),
(45, 0, 'mod_feed', 'module', 'mod_feed', NULL, '', 0, 1, 1, 0, 1, '{\"name\":\"mod_feed\",\"type\":\"module\",\"creationDate\":\"2005-07\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_FEED_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Module\\\\Feed\",\"filename\":\"mod_feed\"}', '', '', NULL, NULL, 0, 0, NULL),
(46, 0, 'mod_footer', 'module', 'mod_footer', NULL, '', 0, 1, 1, 0, 1, '{\"name\":\"mod_footer\",\"type\":\"module\",\"creationDate\":\"2006-07\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2006 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_FOOTER_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Module\\\\Footer\",\"filename\":\"mod_footer\"}', '', '', NULL, NULL, 0, 0, NULL),
(47, 0, 'mod_login', 'module', 'mod_login', NULL, '', 0, 1, 1, 0, 1, '{\"name\":\"mod_login\",\"type\":\"module\",\"creationDate\":\"2006-07\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2006 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_LOGIN_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Module\\\\Login\",\"filename\":\"mod_login\"}', '', '', NULL, NULL, 0, 0, NULL),
(48, 0, 'mod_menu', 'module', 'mod_menu', NULL, '', 0, 1, 1, 0, 1, '{\"name\":\"mod_menu\",\"type\":\"module\",\"creationDate\":\"2004-07\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_MENU_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Module\\\\Menu\",\"filename\":\"mod_menu\"}', '', '', NULL, NULL, 0, 0, NULL),
(49, 0, 'mod_articles_news', 'module', 'mod_articles_news', NULL, '', 0, 1, 1, 0, 1, '{\"name\":\"mod_articles_news\",\"type\":\"module\",\"creationDate\":\"2006-07\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2006 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_ARTICLES_NEWS_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Module\\\\ArticlesNews\",\"filename\":\"mod_articles_news\"}', '', '', NULL, NULL, 0, 0, NULL),
(50, 0, 'mod_random_image', 'module', 'mod_random_image', NULL, '', 0, 1, 1, 0, 1, '{\"name\":\"mod_random_image\",\"type\":\"module\",\"creationDate\":\"2006-07\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2006 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_RANDOM_IMAGE_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Module\\\\RandomImage\",\"filename\":\"mod_random_image\"}', '', '', NULL, NULL, 0, 0, NULL),
(51, 0, 'mod_related_items', 'module', 'mod_related_items', NULL, '', 0, 1, 1, 0, 1, '{\"name\":\"mod_related_items\",\"type\":\"module\",\"creationDate\":\"2004-07\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_RELATED_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Module\\\\RelatedItems\",\"filename\":\"mod_related_items\"}', '', '', NULL, NULL, 0, 0, NULL),
(52, 0, 'mod_stats', 'module', 'mod_stats', NULL, '', 0, 1, 1, 0, 1, '{\"name\":\"mod_stats\",\"type\":\"module\",\"creationDate\":\"2004-07\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_STATS_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Module\\\\Stats\",\"filename\":\"mod_stats\"}', '', '', NULL, NULL, 0, 0, NULL),
(53, 0, 'mod_syndicate', 'module', 'mod_syndicate', NULL, '', 0, 1, 1, 0, 1, '{\"name\":\"mod_syndicate\",\"type\":\"module\",\"creationDate\":\"2006-05\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2006 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_SYNDICATE_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Module\\\\Syndicate\",\"filename\":\"mod_syndicate\"}', '', '', NULL, NULL, 0, 0, NULL),
(54, 0, 'mod_users_latest', 'module', 'mod_users_latest', NULL, '', 0, 1, 1, 0, 1, '{\"name\":\"mod_users_latest\",\"type\":\"module\",\"creationDate\":\"2009-12\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2009 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_USERS_LATEST_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Module\\\\UsersLatest\",\"filename\":\"mod_users_latest\"}', '', '', NULL, NULL, 0, 0, NULL),
(55, 0, 'mod_whosonline', 'module', 'mod_whosonline', NULL, '', 0, 1, 1, 0, 1, '{\"name\":\"mod_whosonline\",\"type\":\"module\",\"creationDate\":\"2004-07\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_WHOSONLINE_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Module\\\\Whosonline\",\"filename\":\"mod_whosonline\"}', '', '', NULL, NULL, 0, 0, NULL),
(56, 0, 'mod_wrapper', 'module', 'mod_wrapper', NULL, '', 0, 1, 1, 0, 1, '{\"name\":\"mod_wrapper\",\"type\":\"module\",\"creationDate\":\"2004-10\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_WRAPPER_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Module\\\\Wrapper\",\"filename\":\"mod_wrapper\"}', '', '', NULL, NULL, 0, 0, NULL),
(57, 0, 'mod_articles_category', 'module', 'mod_articles_category', NULL, '', 0, 1, 1, 0, 1, '{\"name\":\"mod_articles_category\",\"type\":\"module\",\"creationDate\":\"2010-02\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2010 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_ARTICLES_CATEGORY_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Module\\\\ArticlesCategory\",\"filename\":\"mod_articles_category\"}', '', '', NULL, NULL, 0, 0, NULL),
(58, 0, 'mod_articles_categories', 'module', 'mod_articles_categories', NULL, '', 0, 1, 1, 0, 1, '{\"name\":\"mod_articles_categories\",\"type\":\"module\",\"creationDate\":\"2010-02\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2010 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_ARTICLES_CATEGORIES_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Module\\\\ArticlesCategories\",\"filename\":\"mod_articles_categories\"}', '', '', NULL, NULL, 0, 0, NULL),
(59, 0, 'mod_languages', 'module', 'mod_languages', NULL, '', 0, 1, 1, 0, 1, '{\"name\":\"mod_languages\",\"type\":\"module\",\"creationDate\":\"2010-02\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2010 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.5.0\",\"description\":\"MOD_LANGUAGES_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Module\\\\Languages\",\"filename\":\"mod_languages\"}', '', '', NULL, NULL, 0, 0, NULL),
(60, 0, 'mod_finder', 'module', 'mod_finder', NULL, '', 0, 1, 0, 0, 1, '{\"name\":\"mod_finder\",\"type\":\"module\",\"creationDate\":\"2011-08\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2011 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_FINDER_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Module\\\\Finder\",\"filename\":\"mod_finder\"}', '', '', NULL, NULL, 0, 0, NULL),
(61, 0, 'mod_custom', 'module', 'mod_custom', NULL, '', 1, 1, 1, 0, 1, '{\"name\":\"mod_custom\",\"type\":\"module\",\"creationDate\":\"2004-07\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_CUSTOM_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_custom\"}', '', '', NULL, NULL, 0, 0, NULL),
(62, 0, 'mod_feed', 'module', 'mod_feed', NULL, '', 1, 1, 1, 0, 1, '{\"name\":\"mod_feed\",\"type\":\"module\",\"creationDate\":\"2005-07\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_FEED_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Module\\\\Feed\",\"filename\":\"mod_feed\"}', '', '', NULL, NULL, 0, 0, NULL),
(63, 0, 'mod_latest', 'module', 'mod_latest', NULL, '', 1, 1, 1, 0, 1, '{\"name\":\"mod_latest\",\"type\":\"module\",\"creationDate\":\"2004-07\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_LATEST_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Module\\\\Latest\",\"filename\":\"mod_latest\"}', '', '', NULL, NULL, 0, 0, NULL),
(64, 0, 'mod_logged', 'module', 'mod_logged', NULL, '', 1, 1, 1, 0, 1, '{\"name\":\"mod_logged\",\"type\":\"module\",\"creationDate\":\"2005-01\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_LOGGED_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Module\\\\Logged\",\"filename\":\"mod_logged\"}', '', '', NULL, NULL, 0, 0, NULL),
(65, 0, 'mod_login', 'module', 'mod_login', NULL, '', 1, 1, 1, 0, 1, '{\"name\":\"mod_login\",\"type\":\"module\",\"creationDate\":\"2005-03\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_LOGIN_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Module\\\\Login\",\"filename\":\"mod_login\"}', '', '', NULL, NULL, 0, 0, NULL),
(66, 0, 'mod_loginsupport', 'module', 'mod_loginsupport', NULL, '', 1, 1, 1, 0, 1, '{\"name\":\"mod_loginsupport\",\"type\":\"module\",\"creationDate\":\"2019-06\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2019 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"MOD_LOGINSUPPORT_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Module\\\\Loginsupport\",\"filename\":\"mod_loginsupport\"}', '', '', NULL, NULL, 0, 0, NULL),
(67, 0, 'mod_menu', 'module', 'mod_menu', NULL, '', 1, 1, 1, 0, 1, '{\"name\":\"mod_menu\",\"type\":\"module\",\"creationDate\":\"2006-03\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2006 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_MENU_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Module\\\\Menu\",\"filename\":\"mod_menu\"}', '', '', NULL, NULL, 0, 0, NULL),
(68, 0, 'mod_popular', 'module', 'mod_popular', NULL, '', 1, 1, 1, 0, 1, '{\"name\":\"mod_popular\",\"type\":\"module\",\"creationDate\":\"2004-07\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_POPULAR_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Module\\\\Popular\",\"filename\":\"mod_popular\"}', '', '', NULL, NULL, 0, 0, NULL),
(69, 0, 'mod_quickicon', 'module', 'mod_quickicon', NULL, '', 1, 1, 1, 0, 1, '{\"name\":\"mod_quickicon\",\"type\":\"module\",\"creationDate\":\"2005-11\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_QUICKICON_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Module\\\\Quickicon\",\"filename\":\"mod_quickicon\"}', '', '', NULL, NULL, 0, 0, NULL),
(70, 0, 'mod_frontend', 'module', 'mod_frontend', NULL, '', 1, 1, 1, 0, 1, '{\"name\":\"mod_frontend\",\"type\":\"module\",\"creationDate\":\"2019-07\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2019 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"MOD_FRONTEND_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_frontend\"}', '', '', NULL, NULL, 0, 0, NULL),
(71, 0, 'mod_messages', 'module', 'mod_messages', NULL, '', 1, 1, 1, 0, 1, '{\"name\":\"mod_messages\",\"type\":\"module\",\"creationDate\":\"2019-07\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2019 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"MOD_MESSAGES_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_messages\"}', '', '', NULL, NULL, 0, 0, NULL),
(72, 0, 'mod_post_installation_messages', 'module', 'mod_post_installation_messages', NULL, '', 1, 1, 1, 0, 1, '{\"name\":\"mod_post_installation_messages\",\"type\":\"module\",\"creationDate\":\"2019-07\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2019 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"MOD_POST_INSTALLATION_MESSAGES_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_post_installation_messages\"}', '', '', NULL, NULL, 0, 0, NULL),
(73, 0, 'mod_user', 'module', 'mod_user', NULL, '', 1, 1, 1, 0, 1, '{\"name\":\"mod_user\",\"type\":\"module\",\"creationDate\":\"2019-07\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2019 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"MOD_USER_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_user\"}', '', '', NULL, NULL, 0, 0, NULL),
(74, 0, 'mod_title', 'module', 'mod_title', NULL, '', 1, 1, 1, 0, 1, '{\"name\":\"mod_title\",\"type\":\"module\",\"creationDate\":\"2005-11\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_TITLE_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_title\"}', '', '', NULL, NULL, 0, 0, NULL),
(75, 0, 'mod_toolbar', 'module', 'mod_toolbar', NULL, '', 1, 1, 1, 0, 1, '{\"name\":\"mod_toolbar\",\"type\":\"module\",\"creationDate\":\"2005-11\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_TOOLBAR_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_toolbar\"}', '', '', NULL, NULL, 0, 0, NULL),
(76, 0, 'mod_multilangstatus', 'module', 'mod_multilangstatus', NULL, '', 1, 1, 1, 0, 1, '{\"name\":\"mod_multilangstatus\",\"type\":\"module\",\"creationDate\":\"2011-09\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2011 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_MULTILANGSTATUS_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"mod_multilangstatus\"}', '{\"cache\":\"0\"}', '', NULL, NULL, 0, 0, NULL),
(77, 0, 'mod_version', 'module', 'mod_version', NULL, '', 1, 1, 1, 0, 1, '{\"name\":\"mod_version\",\"type\":\"module\",\"creationDate\":\"2012-01\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2012 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_VERSION_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Module\\\\Version\",\"filename\":\"mod_version\"}', '{\"cache\":\"0\"}', '', NULL, NULL, 0, 0, NULL),
(78, 0, 'mod_stats_admin', 'module', 'mod_stats_admin', NULL, '', 1, 1, 1, 0, 1, '{\"name\":\"mod_stats_admin\",\"type\":\"module\",\"creationDate\":\"2004-07\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_STATS_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Module\\\\StatsAdmin\",\"filename\":\"mod_stats_admin\"}', '{\"serverinfo\":\"0\",\"siteinfo\":\"0\",\"counter\":\"0\",\"increase\":\"0\",\"cache\":\"1\",\"cache_time\":\"900\",\"cachemode\":\"static\"}', '', NULL, NULL, 0, 0, NULL),
(79, 0, 'mod_tags_popular', 'module', 'mod_tags_popular', NULL, '', 0, 1, 1, 0, 1, '{\"name\":\"mod_tags_popular\",\"type\":\"module\",\"creationDate\":\"2013-01\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2013 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.1.0\",\"description\":\"MOD_TAGS_POPULAR_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Module\\\\TagsPopular\",\"filename\":\"mod_tags_popular\"}', '{\"maximum\":\"5\",\"timeframe\":\"alltime\",\"owncache\":\"1\"}', '', NULL, NULL, 0, 0, NULL);
INSERT INTO `bol96_extensions` (`extension_id`, `package_id`, `name`, `type`, `element`, `changelogurl`, `folder`, `client_id`, `enabled`, `access`, `protected`, `locked`, `manifest_cache`, `params`, `custom_data`, `checked_out`, `checked_out_time`, `ordering`, `state`, `note`) VALUES
(80, 0, 'mod_tags_similar', 'module', 'mod_tags_similar', NULL, '', 0, 1, 1, 0, 1, '{\"name\":\"mod_tags_similar\",\"type\":\"module\",\"creationDate\":\"2013-01\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2013 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.1.0\",\"description\":\"MOD_TAGS_SIMILAR_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Module\\\\TagsSimilar\",\"filename\":\"mod_tags_similar\"}', '{\"maximum\":\"5\",\"matchtype\":\"any\",\"owncache\":\"1\"}', '', NULL, NULL, 0, 0, NULL),
(81, 0, 'mod_sampledata', 'module', 'mod_sampledata', NULL, '', 1, 1, 1, 0, 1, '{\"name\":\"mod_sampledata\",\"type\":\"module\",\"creationDate\":\"2017-07\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2017 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.8.0\",\"description\":\"MOD_SAMPLEDATA_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Module\\\\Sampledata\",\"filename\":\"mod_sampledata\"}', '{}', '', NULL, NULL, 0, 0, NULL),
(82, 0, 'mod_latestactions', 'module', 'mod_latestactions', NULL, '', 1, 1, 1, 0, 1, '{\"name\":\"mod_latestactions\",\"type\":\"module\",\"creationDate\":\"2018-05\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2018 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.9.0\",\"description\":\"MOD_LATESTACTIONS_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Module\\\\LatestActions\",\"filename\":\"mod_latestactions\"}', '{}', '', NULL, NULL, 0, 0, NULL),
(83, 0, 'mod_privacy_dashboard', 'module', 'mod_privacy_dashboard', NULL, '', 1, 1, 1, 0, 1, '{\"name\":\"mod_privacy_dashboard\",\"type\":\"module\",\"creationDate\":\"2018-06\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2018 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.9.0\",\"description\":\"MOD_PRIVACY_DASHBOARD_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Module\\\\PrivacyDashboard\",\"filename\":\"mod_privacy_dashboard\"}', '{}', '', NULL, NULL, 0, 0, NULL),
(84, 0, 'mod_submenu', 'module', 'mod_submenu', NULL, '', 1, 1, 1, 0, 1, '{\"name\":\"mod_submenu\",\"type\":\"module\",\"creationDate\":\"2006-02\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2006 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"MOD_SUBMENU_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Module\\\\Submenu\",\"filename\":\"mod_submenu\"}', '{}', '', NULL, NULL, 0, 0, NULL),
(85, 0, 'mod_privacy_status', 'module', 'mod_privacy_status', NULL, '', 1, 1, 1, 0, 1, '{\"name\":\"mod_privacy_status\",\"type\":\"module\",\"creationDate\":\"2019-07\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2019 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"MOD_PRIVACY_STATUS_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Module\\\\PrivacyStatus\",\"filename\":\"mod_privacy_status\"}', '{}', '', NULL, NULL, 0, 0, NULL),
(86, 0, 'mod_guidedtours', 'module', 'mod_guidedtours', NULL, '', 1, 1, 1, 0, 1, '{\"name\":\"mod_guidedtours\",\"type\":\"module\",\"creationDate\":\"2023-02\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2023 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.3.0\",\"description\":\"MOD_GUIDEDTOURS_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Module\\\\GuidedTours\",\"filename\":\"mod_guidedtours\"}', '{}', '', NULL, NULL, 0, 0, NULL),
(87, 0, 'plg_actionlog_joomla', 'plugin', 'joomla', NULL, 'actionlog', 0, 1, 1, 0, 1, '{\"name\":\"plg_actionlog_joomla\",\"type\":\"plugin\",\"creationDate\":\"2018-05\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2018 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.9.0\",\"description\":\"PLG_ACTIONLOG_JOOMLA_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Actionlog\\\\Joomla\",\"filename\":\"joomla\"}', '{}', '', NULL, NULL, 1, 0, NULL),
(88, 0, 'plg_api-authentication_basic', 'plugin', 'basic', NULL, 'api-authentication', 0, 0, 1, 0, 1, '{\"name\":\"plg_api-authentication_basic\",\"type\":\"plugin\",\"creationDate\":\"2005-11\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2019 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"PLG_API-AUTHENTICATION_BASIC_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\ApiAuthentication\\\\Basic\",\"filename\":\"basic\"}', '{}', '', NULL, NULL, 1, 0, NULL),
(89, 0, 'plg_api-authentication_token', 'plugin', 'token', NULL, 'api-authentication', 0, 1, 1, 0, 1, '{\"name\":\"plg_api-authentication_token\",\"type\":\"plugin\",\"creationDate\":\"2019-11\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2020 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"PLG_API-AUTHENTICATION_TOKEN_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\ApiAuthentication\\\\Token\",\"filename\":\"token\"}', '{}', '', NULL, NULL, 2, 0, NULL),
(90, 0, 'plg_authentication_cookie', 'plugin', 'cookie', NULL, 'authentication', 0, 1, 1, 0, 1, '{\"name\":\"plg_authentication_cookie\",\"type\":\"plugin\",\"creationDate\":\"2013-07\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2013 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_AUTHENTICATION_COOKIE_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Authentication\\\\Cookie\",\"filename\":\"cookie\"}', '', '', NULL, NULL, 1, 0, NULL),
(91, 0, 'plg_authentication_joomla', 'plugin', 'joomla', NULL, 'authentication', 0, 1, 1, 1, 1, '{\"name\":\"plg_authentication_joomla\",\"type\":\"plugin\",\"creationDate\":\"2005-11\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_AUTHENTICATION_JOOMLA_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Authentication\\\\Joomla\",\"filename\":\"joomla\"}', '', '', NULL, NULL, 2, 0, NULL),
(92, 0, 'plg_authentication_ldap', 'plugin', 'ldap', NULL, 'authentication', 0, 0, 1, 0, 1, '{\"name\":\"plg_authentication_ldap\",\"type\":\"plugin\",\"creationDate\":\"2005-11\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_LDAP_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Authentication\\\\Ldap\",\"filename\":\"ldap\"}', '{\"host\":\"\",\"port\":\"389\",\"use_ldapV3\":\"0\",\"negotiate_tls\":\"0\",\"no_referrals\":\"0\",\"auth_method\":\"bind\",\"base_dn\":\"\",\"search_string\":\"\",\"users_dn\":\"\",\"username\":\"admin\",\"password\":\"bobby7\",\"ldap_fullname\":\"fullName\",\"ldap_email\":\"mail\",\"ldap_uid\":\"uid\"}', '', NULL, NULL, 3, 0, NULL),
(93, 0, 'plg_behaviour_taggable', 'plugin', 'taggable', NULL, 'behaviour', 0, 1, 1, 0, 1, '{\"name\":\"plg_behaviour_taggable\",\"type\":\"plugin\",\"creationDate\":\"2015-08\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2016 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"PLG_BEHAVIOUR_TAGGABLE_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Behaviour\\\\Taggable\",\"filename\":\"taggable\"}', '{}', '', NULL, NULL, 1, 0, NULL),
(94, 0, 'plg_behaviour_versionable', 'plugin', 'versionable', NULL, 'behaviour', 0, 1, 1, 0, 1, '{\"name\":\"plg_behaviour_versionable\",\"type\":\"plugin\",\"creationDate\":\"2015-08\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2016 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"PLG_BEHAVIOUR_VERSIONABLE_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Behaviour\\\\Versionable\",\"filename\":\"versionable\"}', '{}', '', NULL, NULL, 2, 0, NULL),
(95, 0, 'plg_captcha_recaptcha', 'plugin', 'recaptcha', NULL, 'captcha', 0, 0, 1, 0, 1, '{\"name\":\"plg_captcha_recaptcha\",\"type\":\"plugin\",\"creationDate\":\"2011-12\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2011 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.4.0\",\"description\":\"PLG_CAPTCHA_RECAPTCHA_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Captcha\\\\ReCaptcha\",\"filename\":\"recaptcha\"}', '{\"public_key\":\"\",\"private_key\":\"\",\"theme\":\"clean\"}', '', NULL, NULL, 1, 0, NULL),
(96, 0, 'plg_captcha_recaptcha_invisible', 'plugin', 'recaptcha_invisible', NULL, 'captcha', 0, 0, 1, 0, 1, '{\"name\":\"plg_captcha_recaptcha_invisible\",\"type\":\"plugin\",\"creationDate\":\"2017-11\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2017 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.8\",\"description\":\"PLG_CAPTCHA_RECAPTCHA_INVISIBLE_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Captcha\\\\InvisibleReCaptcha\",\"filename\":\"recaptcha_invisible\"}', '{\"public_key\":\"\",\"private_key\":\"\",\"theme\":\"clean\"}', '', NULL, NULL, 2, 0, NULL),
(97, 0, 'plg_content_confirmconsent', 'plugin', 'confirmconsent', NULL, 'content', 0, 0, 1, 0, 1, '{\"name\":\"plg_content_confirmconsent\",\"type\":\"plugin\",\"creationDate\":\"2018-05\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2018 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.9.0\",\"description\":\"PLG_CONTENT_CONFIRMCONSENT_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Content\\\\ConfirmConsent\",\"filename\":\"confirmconsent\"}', '{}', '', NULL, NULL, 1, 0, NULL),
(98, 0, 'plg_content_contact', 'plugin', 'contact', NULL, 'content', 0, 1, 1, 0, 1, '{\"name\":\"plg_content_contact\",\"type\":\"plugin\",\"creationDate\":\"2014-01\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2014 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.2.2\",\"description\":\"PLG_CONTENT_CONTACT_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Content\\\\Contact\",\"filename\":\"contact\"}', '', '', NULL, NULL, 2, 0, NULL),
(99, 0, 'plg_content_emailcloak', 'plugin', 'emailcloak', NULL, 'content', 0, 1, 1, 0, 1, '{\"name\":\"plg_content_emailcloak\",\"type\":\"plugin\",\"creationDate\":\"2005-11\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_CONTENT_EMAILCLOAK_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Content\\\\EmailCloak\",\"filename\":\"emailcloak\"}', '{\"mode\":\"1\"}', '', NULL, NULL, 3, 0, NULL),
(100, 0, 'plg_content_fields', 'plugin', 'fields', NULL, 'content', 0, 1, 1, 0, 1, '{\"name\":\"plg_content_fields\",\"type\":\"plugin\",\"creationDate\":\"2017-02\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2017 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_CONTENT_FIELDS_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Content\\\\Fields\",\"filename\":\"fields\"}', '', '', NULL, NULL, 4, 0, NULL),
(101, 0, 'plg_content_finder', 'plugin', 'finder', NULL, 'content', 0, 1, 1, 0, 1, '{\"name\":\"plg_content_finder\",\"type\":\"plugin\",\"creationDate\":\"2011-12\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2011 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_CONTENT_FINDER_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"finder\"}', '', '', NULL, NULL, 5, 0, NULL),
(102, 0, 'plg_content_joomla', 'plugin', 'joomla', NULL, 'content', 0, 1, 1, 0, 1, '{\"name\":\"plg_content_joomla\",\"type\":\"plugin\",\"creationDate\":\"2010-11\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2010 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_CONTENT_JOOMLA_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"joomla\"}', '', '', NULL, NULL, 6, 0, NULL),
(103, 0, 'plg_content_loadmodule', 'plugin', 'loadmodule', NULL, 'content', 0, 1, 1, 0, 1, '{\"name\":\"plg_content_loadmodule\",\"type\":\"plugin\",\"creationDate\":\"2005-11\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_LOADMODULE_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"loadmodule\"}', '{\"style\":\"xhtml\"}', '', NULL, NULL, 7, 0, NULL),
(104, 0, 'plg_content_pagebreak', 'plugin', 'pagebreak', NULL, 'content', 0, 1, 1, 0, 1, '{\"name\":\"plg_content_pagebreak\",\"type\":\"plugin\",\"creationDate\":\"2005-11\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_CONTENT_PAGEBREAK_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"pagebreak\"}', '{\"title\":\"1\",\"multipage_toc\":\"1\",\"showall\":\"1\"}', '', NULL, NULL, 8, 0, NULL),
(105, 0, 'plg_content_pagenavigation', 'plugin', 'pagenavigation', NULL, 'content', 0, 1, 1, 0, 1, '{\"name\":\"plg_content_pagenavigation\",\"type\":\"plugin\",\"creationDate\":\"2006-01\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2006 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_PAGENAVIGATION_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"pagenavigation\"}', '{\"position\":\"1\"}', '', NULL, NULL, 9, 0, NULL),
(106, 0, 'plg_content_vote', 'plugin', 'vote', NULL, 'content', 0, 0, 1, 0, 1, '{\"name\":\"plg_content_vote\",\"type\":\"plugin\",\"creationDate\":\"2005-11\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_VOTE_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"vote\"}', '', '', NULL, NULL, 10, 0, NULL),
(107, 0, 'plg_editors-xtd_article', 'plugin', 'article', NULL, 'editors-xtd', 0, 1, 1, 0, 1, '{\"name\":\"plg_editors-xtd_article\",\"type\":\"plugin\",\"creationDate\":\"2009-10\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2009 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_ARTICLE_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\EditorsXtd\\\\Article\",\"filename\":\"article\"}', '', '', NULL, NULL, 1, 0, NULL),
(108, 0, 'plg_editors-xtd_contact', 'plugin', 'contact', NULL, 'editors-xtd', 0, 1, 1, 0, 1, '{\"name\":\"plg_editors-xtd_contact\",\"type\":\"plugin\",\"creationDate\":\"2016-10\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2016 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_EDITORS-XTD_CONTACT_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\EditorsXtd\\\\Contact\",\"filename\":\"contact\"}', '', '', NULL, NULL, 2, 0, NULL),
(109, 0, 'plg_editors-xtd_fields', 'plugin', 'fields', NULL, 'editors-xtd', 0, 1, 1, 0, 1, '{\"name\":\"plg_editors-xtd_fields\",\"type\":\"plugin\",\"creationDate\":\"2017-02\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2017 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_EDITORS-XTD_FIELDS_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\EditorsXtd\\\\Fields\",\"filename\":\"fields\"}', '', '', NULL, NULL, 3, 0, NULL),
(110, 0, 'plg_editors-xtd_image', 'plugin', 'image', NULL, 'editors-xtd', 0, 1, 1, 0, 1, '{\"name\":\"plg_editors-xtd_image\",\"type\":\"plugin\",\"creationDate\":\"2004-08\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_IMAGE_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\EditorsXtd\\\\Image\",\"filename\":\"image\"}', '', '', NULL, NULL, 4, 0, NULL),
(111, 0, 'plg_editors-xtd_menu', 'plugin', 'menu', NULL, 'editors-xtd', 0, 1, 1, 0, 1, '{\"name\":\"plg_editors-xtd_menu\",\"type\":\"plugin\",\"creationDate\":\"2016-08\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2016 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_EDITORS-XTD_MENU_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\EditorsXtd\\\\Menu\",\"filename\":\"menu\"}', '', '', NULL, NULL, 5, 0, NULL),
(112, 0, 'plg_editors-xtd_module', 'plugin', 'module', NULL, 'editors-xtd', 0, 1, 1, 0, 1, '{\"name\":\"plg_editors-xtd_module\",\"type\":\"plugin\",\"creationDate\":\"2015-10\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2015 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.5.0\",\"description\":\"PLG_MODULE_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\EditorsXtd\\\\Module\",\"filename\":\"module\"}', '', '', NULL, NULL, 6, 0, NULL),
(113, 0, 'plg_editors-xtd_pagebreak', 'plugin', 'pagebreak', NULL, 'editors-xtd', 0, 1, 1, 0, 1, '{\"name\":\"plg_editors-xtd_pagebreak\",\"type\":\"plugin\",\"creationDate\":\"2004-08\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_EDITORSXTD_PAGEBREAK_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"pagebreak\"}', '', '', NULL, NULL, 7, 0, NULL),
(114, 0, 'plg_editors-xtd_readmore', 'plugin', 'readmore', NULL, 'editors-xtd', 0, 1, 1, 0, 1, '{\"name\":\"plg_editors-xtd_readmore\",\"type\":\"plugin\",\"creationDate\":\"2006-03\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2006 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_READMORE_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\EditorsXtd\\\\ReadMore\",\"filename\":\"readmore\"}', '', '', NULL, NULL, 8, 0, NULL),
(115, 0, 'plg_editors_codemirror', 'plugin', 'codemirror', NULL, 'editors', 0, 1, 1, 0, 1, '{\"name\":\"plg_editors_codemirror\",\"type\":\"plugin\",\"creationDate\":\"28 March 2011\",\"author\":\"Marijn Haverbeke\",\"copyright\":\"Copyright (C) 2014 - 2021 by Marijn Haverbeke <marijnh@gmail.com> and others\",\"authorEmail\":\"marijnh@gmail.com\",\"authorUrl\":\"https:\\/\\/codemirror.net\\/\",\"version\":\"5.65.12\",\"description\":\"PLG_CODEMIRROR_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Editors\\\\CodeMirror\",\"filename\":\"codemirror\"}', '{\"lineNumbers\":\"1\",\"lineWrapping\":\"1\",\"matchTags\":\"1\",\"matchBrackets\":\"1\",\"marker-gutter\":\"1\",\"autoCloseTags\":\"1\",\"autoCloseBrackets\":\"1\",\"autoFocus\":\"1\",\"theme\":\"default\",\"tabmode\":\"indent\"}', '', NULL, NULL, 1, 0, NULL),
(116, 0, 'plg_editors_none', 'plugin', 'none', NULL, 'editors', 0, 1, 1, 1, 1, '{\"name\":\"plg_editors_none\",\"type\":\"plugin\",\"creationDate\":\"2005-09\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_NONE_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Editors\\\\None\",\"filename\":\"none\"}', '', '', NULL, NULL, 2, 0, NULL),
(117, 0, 'plg_editors_tinymce', 'plugin', 'tinymce', NULL, 'editors', 0, 1, 1, 0, 1, '{\"name\":\"plg_editors_tinymce\",\"type\":\"plugin\",\"creationDate\":\"2005-08\",\"author\":\"Tiny Technologies, Inc\",\"copyright\":\"Tiny Technologies, Inc\",\"authorEmail\":\"N\\/A\",\"authorUrl\":\"https:\\/\\/www.tiny.cloud\",\"version\":\"5.10.7\",\"description\":\"PLG_TINY_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Editors\\\\TinyMCE\",\"filename\":\"tinymce\"}', '{\"configuration\":{\"toolbars\":{\"2\":{\"toolbar1\":[\"bold\",\"underline\",\"strikethrough\",\"|\",\"undo\",\"redo\",\"|\",\"bullist\",\"numlist\",\"|\",\"pastetext\"]},\"1\":{\"menu\":[\"edit\",\"insert\",\"view\",\"format\",\"table\",\"tools\"],\"toolbar1\":[\"bold\",\"italic\",\"underline\",\"strikethrough\",\"|\",\"alignleft\",\"aligncenter\",\"alignright\",\"alignjustify\",\"|\",\"formatselect\",\"|\",\"bullist\",\"numlist\",\"|\",\"outdent\",\"indent\",\"|\",\"undo\",\"redo\",\"|\",\"link\",\"unlink\",\"anchor\",\"code\",\"|\",\"hr\",\"table\",\"|\",\"subscript\",\"superscript\",\"|\",\"charmap\",\"pastetext\",\"preview\"]},\"0\":{\"menu\":[\"edit\",\"insert\",\"view\",\"format\",\"table\",\"tools\"],\"toolbar1\":[\"bold\",\"italic\",\"underline\",\"strikethrough\",\"|\",\"alignleft\",\"aligncenter\",\"alignright\",\"alignjustify\",\"|\",\"styleselect\",\"|\",\"formatselect\",\"fontselect\",\"fontsizeselect\",\"|\",\"searchreplace\",\"|\",\"bullist\",\"numlist\",\"|\",\"outdent\",\"indent\",\"|\",\"undo\",\"redo\",\"|\",\"link\",\"unlink\",\"anchor\",\"image\",\"|\",\"code\",\"|\",\"forecolor\",\"backcolor\",\"|\",\"fullscreen\",\"|\",\"table\",\"|\",\"subscript\",\"superscript\",\"|\",\"charmap\",\"emoticons\",\"media\",\"hr\",\"ltr\",\"rtl\",\"|\",\"cut\",\"copy\",\"paste\",\"pastetext\",\"|\",\"visualchars\",\"visualblocks\",\"nonbreaking\",\"blockquote\",\"template\",\"|\",\"print\",\"preview\",\"codesample\",\"insertdatetime\",\"removeformat\"]}},\"setoptions\":{\"2\":{\"access\":[\"1\"],\"skin\":\"0\",\"skin_admin\":\"0\",\"mobile\":\"0\",\"drag_drop\":\"1\",\"path\":\"\",\"entity_encoding\":\"raw\",\"lang_mode\":\"1\",\"text_direction\":\"ltr\",\"content_css\":\"1\",\"content_css_custom\":\"\",\"relative_urls\":\"1\",\"newlines\":\"0\",\"use_config_textfilters\":\"0\",\"invalid_elements\":\"script,applet,iframe\",\"valid_elements\":\"\",\"extended_elements\":\"\",\"resizing\":\"1\",\"resize_horizontal\":\"1\",\"element_path\":\"1\",\"wordcount\":\"1\",\"image_advtab\":\"0\",\"advlist\":\"1\",\"autosave\":\"1\",\"contextmenu\":\"1\",\"custom_plugin\":\"\",\"custom_button\":\"\"},\"1\":{\"access\":[\"6\",\"2\"],\"skin\":\"0\",\"skin_admin\":\"0\",\"mobile\":\"0\",\"drag_drop\":\"1\",\"path\":\"\",\"entity_encoding\":\"raw\",\"lang_mode\":\"1\",\"text_direction\":\"ltr\",\"content_css\":\"1\",\"content_css_custom\":\"\",\"relative_urls\":\"1\",\"newlines\":\"0\",\"use_config_textfilters\":\"0\",\"invalid_elements\":\"script,applet,iframe\",\"valid_elements\":\"\",\"extended_elements\":\"\",\"resizing\":\"1\",\"resize_horizontal\":\"1\",\"element_path\":\"1\",\"wordcount\":\"1\",\"image_advtab\":\"0\",\"advlist\":\"1\",\"autosave\":\"1\",\"contextmenu\":\"1\",\"custom_plugin\":\"\",\"custom_button\":\"\"},\"0\":{\"access\":[\"7\",\"4\",\"8\"],\"skin\":\"0\",\"skin_admin\":\"0\",\"mobile\":\"0\",\"drag_drop\":\"1\",\"path\":\"\",\"entity_encoding\":\"raw\",\"lang_mode\":\"1\",\"text_direction\":\"ltr\",\"content_css\":\"1\",\"content_css_custom\":\"\",\"relative_urls\":\"1\",\"newlines\":\"0\",\"use_config_textfilters\":\"0\",\"invalid_elements\":\"script,applet,iframe\",\"valid_elements\":\"\",\"extended_elements\":\"\",\"resizing\":\"1\",\"resize_horizontal\":\"1\",\"element_path\":\"1\",\"wordcount\":\"1\",\"image_advtab\":\"1\",\"advlist\":\"1\",\"autosave\":\"1\",\"contextmenu\":\"1\",\"custom_plugin\":\"\",\"custom_button\":\"\"}}},\"sets_amount\":3,\"html_height\":\"550\",\"html_width\":\"750\"}', '', NULL, NULL, 3, 0, NULL),
(118, 0, 'plg_extension_finder', 'plugin', 'finder', NULL, 'extension', 0, 1, 1, 0, 1, '{\"name\":\"plg_extension_finder\",\"type\":\"plugin\",\"creationDate\":\"2018-06\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2019 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"PLG_EXTENSION_FINDER_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Extension\\\\Finder\",\"filename\":\"finder\"}', '', '', NULL, NULL, 1, 0, NULL),
(119, 0, 'plg_extension_joomla', 'plugin', 'joomla', NULL, 'extension', 0, 1, 1, 0, 1, '{\"name\":\"plg_extension_joomla\",\"type\":\"plugin\",\"creationDate\":\"2010-05\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2010 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_EXTENSION_JOOMLA_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Extension\\\\Joomla\",\"filename\":\"joomla\"}', '', '', NULL, NULL, 2, 0, NULL),
(120, 0, 'plg_extension_namespacemap', 'plugin', 'namespacemap', NULL, 'extension', 0, 1, 1, 1, 1, '{\"name\":\"plg_extension_namespacemap\",\"type\":\"plugin\",\"creationDate\":\"2017-05\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2017 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"PLG_EXTENSION_NAMESPACEMAP_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Extension\\\\NamespaceMap\",\"filename\":\"namespacemap\"}', '{}', '', NULL, NULL, 3, 0, NULL),
(121, 0, 'plg_fields_calendar', 'plugin', 'calendar', NULL, 'fields', 0, 1, 1, 0, 1, '{\"name\":\"plg_fields_calendar\",\"type\":\"plugin\",\"creationDate\":\"2016-03\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2016 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_FIELDS_CALENDAR_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Fields\\\\Calendar\",\"filename\":\"calendar\"}', '', '', NULL, NULL, 1, 0, NULL),
(122, 0, 'plg_fields_checkboxes', 'plugin', 'checkboxes', NULL, 'fields', 0, 1, 1, 0, 1, '{\"name\":\"plg_fields_checkboxes\",\"type\":\"plugin\",\"creationDate\":\"2016-03\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2016 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_FIELDS_CHECKBOXES_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Fields\\\\Checkboxes\",\"filename\":\"checkboxes\"}', '', '', NULL, NULL, 2, 0, NULL),
(123, 0, 'plg_fields_color', 'plugin', 'color', NULL, 'fields', 0, 1, 1, 0, 1, '{\"name\":\"plg_fields_color\",\"type\":\"plugin\",\"creationDate\":\"2016-03\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2016 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_FIELDS_COLOR_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Fields\\\\Color\",\"filename\":\"color\"}', '', '', NULL, NULL, 3, 0, NULL),
(124, 0, 'plg_fields_editor', 'plugin', 'editor', NULL, 'fields', 0, 1, 1, 0, 1, '{\"name\":\"plg_fields_editor\",\"type\":\"plugin\",\"creationDate\":\"2016-03\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2016 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_FIELDS_EDITOR_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Fields\\\\Editor\",\"filename\":\"editor\"}', '{\"buttons\":0,\"width\":\"100%\",\"height\":\"250px\",\"filter\":\"JComponentHelper::filterText\"}', '', NULL, NULL, 4, 0, NULL),
(125, 0, 'plg_fields_imagelist', 'plugin', 'imagelist', NULL, 'fields', 0, 1, 1, 0, 1, '{\"name\":\"plg_fields_imagelist\",\"type\":\"plugin\",\"creationDate\":\"2016-03\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2016 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_FIELDS_IMAGELIST_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Fields\\\\Imagelist\",\"filename\":\"imagelist\"}', '', '', NULL, NULL, 5, 0, NULL),
(126, 0, 'plg_fields_integer', 'plugin', 'integer', NULL, 'fields', 0, 1, 1, 0, 1, '{\"name\":\"plg_fields_integer\",\"type\":\"plugin\",\"creationDate\":\"2016-03\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2016 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_FIELDS_INTEGER_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Fields\\\\Integer\",\"filename\":\"integer\"}', '{\"multiple\":\"0\",\"first\":\"1\",\"last\":\"100\",\"step\":\"1\"}', '', NULL, NULL, 6, 0, NULL),
(127, 0, 'plg_fields_list', 'plugin', 'list', NULL, 'fields', 0, 1, 1, 0, 1, '{\"name\":\"plg_fields_list\",\"type\":\"plugin\",\"creationDate\":\"2016-03\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2016 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_FIELDS_LIST_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Fields\\\\ListField\",\"filename\":\"list\"}', '', '', NULL, NULL, 7, 0, NULL),
(128, 0, 'plg_fields_media', 'plugin', 'media', NULL, 'fields', 0, 1, 1, 0, 1, '{\"name\":\"plg_fields_media\",\"type\":\"plugin\",\"creationDate\":\"2016-03\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2016 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_FIELDS_MEDIA_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Fields\\\\Media\",\"filename\":\"media\"}', '', '', NULL, NULL, 8, 0, NULL),
(129, 0, 'plg_fields_radio', 'plugin', 'radio', NULL, 'fields', 0, 1, 1, 0, 1, '{\"name\":\"plg_fields_radio\",\"type\":\"plugin\",\"creationDate\":\"2016-03\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2016 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_FIELDS_RADIO_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Fields\\\\Radio\",\"filename\":\"radio\"}', '', '', NULL, NULL, 9, 0, NULL),
(130, 0, 'plg_fields_sql', 'plugin', 'sql', NULL, 'fields', 0, 1, 1, 0, 1, '{\"name\":\"plg_fields_sql\",\"type\":\"plugin\",\"creationDate\":\"2016-03\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2016 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_FIELDS_SQL_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Fields\\\\SQL\",\"filename\":\"sql\"}', '', '', NULL, NULL, 10, 0, NULL),
(131, 0, 'plg_fields_subform', 'plugin', 'subform', NULL, 'fields', 0, 1, 1, 0, 1, '{\"name\":\"plg_fields_subform\",\"type\":\"plugin\",\"creationDate\":\"2017-06\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2019 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"PLG_FIELDS_SUBFORM_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Fields\\\\Subform\",\"filename\":\"subform\"}', '', '', NULL, NULL, 11, 0, NULL),
(132, 0, 'plg_fields_text', 'plugin', 'text', NULL, 'fields', 0, 1, 1, 0, 1, '{\"name\":\"plg_fields_text\",\"type\":\"plugin\",\"creationDate\":\"2016-03\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2016 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_FIELDS_TEXT_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Fields\\\\Text\",\"filename\":\"text\"}', '', '', NULL, NULL, 12, 0, NULL),
(133, 0, 'plg_fields_textarea', 'plugin', 'textarea', NULL, 'fields', 0, 1, 1, 0, 1, '{\"name\":\"plg_fields_textarea\",\"type\":\"plugin\",\"creationDate\":\"2016-03\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2016 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_FIELDS_TEXTAREA_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Fields\\\\Textarea\",\"filename\":\"textarea\"}', '{\"rows\":10,\"cols\":10,\"maxlength\":\"\",\"filter\":\"JComponentHelper::filterText\"}', '', NULL, NULL, 13, 0, NULL),
(134, 0, 'plg_fields_url', 'plugin', 'url', NULL, 'fields', 0, 1, 1, 0, 1, '{\"name\":\"plg_fields_url\",\"type\":\"plugin\",\"creationDate\":\"2016-03\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2016 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_FIELDS_URL_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Fields\\\\Url\",\"filename\":\"url\"}', '', '', NULL, NULL, 14, 0, NULL),
(135, 0, 'plg_fields_user', 'plugin', 'user', NULL, 'fields', 0, 1, 1, 0, 1, '{\"name\":\"plg_fields_user\",\"type\":\"plugin\",\"creationDate\":\"2016-03\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2016 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_FIELDS_USER_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Fields\\\\User\",\"filename\":\"user\"}', '', '', NULL, NULL, 15, 0, NULL),
(136, 0, 'plg_fields_usergrouplist', 'plugin', 'usergrouplist', NULL, 'fields', 0, 1, 1, 0, 1, '{\"name\":\"plg_fields_usergrouplist\",\"type\":\"plugin\",\"creationDate\":\"2016-03\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2016 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_FIELDS_USERGROUPLIST_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Fields\\\\UsergroupList\",\"filename\":\"usergrouplist\"}', '', '', NULL, NULL, 16, 0, NULL),
(137, 0, 'plg_filesystem_local', 'plugin', 'local', NULL, 'filesystem', 0, 1, 1, 0, 1, '{\"name\":\"plg_filesystem_local\",\"type\":\"plugin\",\"creationDate\":\"2017-04\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2017 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"PLG_FILESYSTEM_LOCAL_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Filesystem\\\\Local\",\"filename\":\"local\"}', '{}', '', NULL, NULL, 1, 0, NULL),
(138, 0, 'plg_finder_categories', 'plugin', 'categories', NULL, 'finder', 0, 1, 1, 0, 1, '{\"name\":\"plg_finder_categories\",\"type\":\"plugin\",\"creationDate\":\"2011-08\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2011 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_FINDER_CATEGORIES_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Finder\\\\Categories\",\"filename\":\"categories\"}', '', '', NULL, NULL, 1, 0, NULL),
(139, 0, 'plg_finder_contacts', 'plugin', 'contacts', NULL, 'finder', 0, 1, 1, 0, 1, '{\"name\":\"plg_finder_contacts\",\"type\":\"plugin\",\"creationDate\":\"2011-08\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2011 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_FINDER_CONTACTS_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Finder\\\\Contacts\",\"filename\":\"contacts\"}', '', '', NULL, NULL, 2, 0, NULL),
(140, 0, 'plg_finder_content', 'plugin', 'content', NULL, 'finder', 0, 1, 1, 0, 1, '{\"name\":\"plg_finder_content\",\"type\":\"plugin\",\"creationDate\":\"2011-08\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2011 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_FINDER_CONTENT_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Finder\\\\Content\",\"filename\":\"content\"}', '', '', NULL, NULL, 3, 0, NULL),
(141, 0, 'plg_finder_newsfeeds', 'plugin', 'newsfeeds', NULL, 'finder', 0, 1, 1, 0, 1, '{\"name\":\"plg_finder_newsfeeds\",\"type\":\"plugin\",\"creationDate\":\"2011-08\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2011 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_FINDER_NEWSFEEDS_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Finder\\\\Newsfeeds\",\"filename\":\"newsfeeds\"}', '', '', NULL, NULL, 4, 0, NULL),
(142, 0, 'plg_finder_tags', 'plugin', 'tags', NULL, 'finder', 0, 1, 1, 0, 1, '{\"name\":\"plg_finder_tags\",\"type\":\"plugin\",\"creationDate\":\"2013-02\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2013 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_FINDER_TAGS_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Finder\\\\Tags\",\"filename\":\"tags\"}', '', '', NULL, NULL, 5, 0, NULL),
(143, 0, 'plg_installer_folderinstaller', 'plugin', 'folderinstaller', NULL, 'installer', 0, 1, 1, 0, 1, '{\"name\":\"plg_installer_folderinstaller\",\"type\":\"plugin\",\"creationDate\":\"2016-05\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2016 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.6.0\",\"description\":\"PLG_INSTALLER_FOLDERINSTALLER_PLUGIN_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"folderinstaller\"}', '', '', NULL, NULL, 2, 0, NULL),
(144, 0, 'plg_installer_override', 'plugin', 'override', NULL, 'installer', 0, 1, 1, 0, 1, '{\"name\":\"plg_installer_override\",\"type\":\"plugin\",\"creationDate\":\"2018-06\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2018 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"PLG_INSTALLER_OVERRIDE_PLUGIN_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"override\"}', '', '', NULL, NULL, 4, 0, NULL),
(145, 0, 'plg_installer_packageinstaller', 'plugin', 'packageinstaller', NULL, 'installer', 0, 1, 1, 0, 1, '{\"name\":\"plg_installer_packageinstaller\",\"type\":\"plugin\",\"creationDate\":\"2016-05\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2016 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.6.0\",\"description\":\"PLG_INSTALLER_PACKAGEINSTALLER_PLUGIN_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"packageinstaller\"}', '', '', NULL, NULL, 1, 0, NULL),
(146, 0, 'plg_installer_urlinstaller', 'plugin', 'urlinstaller', NULL, 'installer', 0, 1, 1, 0, 1, '{\"name\":\"plg_installer_urlinstaller\",\"type\":\"plugin\",\"creationDate\":\"2016-05\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2016 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.6.0\",\"description\":\"PLG_INSTALLER_URLINSTALLER_PLUGIN_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"urlinstaller\"}', '', '', NULL, NULL, 3, 0, NULL),
(147, 0, 'plg_installer_webinstaller', 'plugin', 'webinstaller', NULL, 'installer', 0, 1, 1, 0, 1, '{\"name\":\"plg_installer_webinstaller\",\"type\":\"plugin\",\"creationDate\":\"2017-04\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2018 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"PLG_INSTALLER_WEBINSTALLER_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"webinstaller\"}', '{\"tab_position\":\"1\"}', '', NULL, NULL, 5, 0, NULL),
(148, 0, 'plg_media-action_crop', 'plugin', 'crop', NULL, 'media-action', 0, 1, 1, 0, 1, '{\"name\":\"plg_media-action_crop\",\"type\":\"plugin\",\"creationDate\":\"2017-01\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2017 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"PLG_MEDIA-ACTION_CROP_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"crop\"}', '{}', '', NULL, NULL, 1, 0, NULL),
(149, 0, 'plg_media-action_resize', 'plugin', 'resize', NULL, 'media-action', 0, 1, 1, 0, 1, '{\"name\":\"plg_media-action_resize\",\"type\":\"plugin\",\"creationDate\":\"2017-01\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2017 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"PLG_MEDIA-ACTION_RESIZE_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"resize\"}', '{}', '', NULL, NULL, 2, 0, NULL),
(150, 0, 'plg_media-action_rotate', 'plugin', 'rotate', NULL, 'media-action', 0, 1, 1, 0, 1, '{\"name\":\"plg_media-action_rotate\",\"type\":\"plugin\",\"creationDate\":\"2017-01\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2017 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"PLG_MEDIA-ACTION_ROTATE_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"rotate\"}', '{}', '', NULL, NULL, 3, 0, NULL),
(151, 0, 'plg_privacy_actionlogs', 'plugin', 'actionlogs', NULL, 'privacy', 0, 1, 1, 0, 1, '{\"name\":\"plg_privacy_actionlogs\",\"type\":\"plugin\",\"creationDate\":\"2018-07\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2018 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.9.0\",\"description\":\"PLG_PRIVACY_ACTIONLOGS_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"actionlogs\"}', '{}', '', NULL, NULL, 1, 0, NULL),
(152, 0, 'plg_privacy_consents', 'plugin', 'consents', NULL, 'privacy', 0, 1, 1, 0, 1, '{\"name\":\"plg_privacy_consents\",\"type\":\"plugin\",\"creationDate\":\"2018-07\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2018 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.9.0\",\"description\":\"PLG_PRIVACY_CONSENTS_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"consents\"}', '{}', '', NULL, NULL, 2, 0, NULL),
(153, 0, 'plg_privacy_contact', 'plugin', 'contact', NULL, 'privacy', 0, 1, 1, 0, 1, '{\"name\":\"plg_privacy_contact\",\"type\":\"plugin\",\"creationDate\":\"2018-07\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2018 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.9.0\",\"description\":\"PLG_PRIVACY_CONTACT_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"contact\"}', '{}', '', NULL, NULL, 3, 0, NULL),
(154, 0, 'plg_privacy_content', 'plugin', 'content', NULL, 'privacy', 0, 1, 1, 0, 1, '{\"name\":\"plg_privacy_content\",\"type\":\"plugin\",\"creationDate\":\"2018-07\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2018 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.9.0\",\"description\":\"PLG_PRIVACY_CONTENT_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"content\"}', '{}', '', NULL, NULL, 4, 0, NULL),
(155, 0, 'plg_privacy_message', 'plugin', 'message', NULL, 'privacy', 0, 1, 1, 0, 1, '{\"name\":\"plg_privacy_message\",\"type\":\"plugin\",\"creationDate\":\"2018-07\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2018 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.9.0\",\"description\":\"PLG_PRIVACY_MESSAGE_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"message\"}', '{}', '', NULL, NULL, 5, 0, NULL),
(156, 0, 'plg_privacy_user', 'plugin', 'user', NULL, 'privacy', 0, 1, 1, 0, 1, '{\"name\":\"plg_privacy_user\",\"type\":\"plugin\",\"creationDate\":\"2018-05\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2018 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.9.0\",\"description\":\"PLG_PRIVACY_USER_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"user\"}', '{}', '', NULL, NULL, 6, 0, NULL),
(157, 0, 'plg_quickicon_joomlaupdate', 'plugin', 'joomlaupdate', NULL, 'quickicon', 0, 1, 1, 0, 1, '{\"name\":\"plg_quickicon_joomlaupdate\",\"type\":\"plugin\",\"creationDate\":\"2011-08\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2011 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_QUICKICON_JOOMLAUPDATE_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Quickicon\\\\Joomlaupdate\",\"filename\":\"joomlaupdate\"}', '', '', NULL, NULL, 1, 0, NULL),
(158, 0, 'plg_quickicon_extensionupdate', 'plugin', 'extensionupdate', NULL, 'quickicon', 0, 1, 1, 0, 1, '{\"name\":\"plg_quickicon_extensionupdate\",\"type\":\"plugin\",\"creationDate\":\"2011-08\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2011 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_QUICKICON_EXTENSIONUPDATE_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Quickicon\\\\Extensionupdate\",\"filename\":\"extensionupdate\"}', '', '', NULL, NULL, 2, 0, NULL),
(159, 0, 'plg_quickicon_overridecheck', 'plugin', 'overridecheck', NULL, 'quickicon', 0, 1, 1, 0, 1, '{\"name\":\"plg_quickicon_overridecheck\",\"type\":\"plugin\",\"creationDate\":\"2018-06\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2018 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"PLG_QUICKICON_OVERRIDECHECK_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Quickicon\\\\OverrideCheck\",\"filename\":\"overridecheck\"}', '', '', NULL, NULL, 3, 0, NULL),
(160, 0, 'plg_quickicon_downloadkey', 'plugin', 'downloadkey', NULL, 'quickicon', 0, 1, 1, 0, 1, '{\"name\":\"plg_quickicon_downloadkey\",\"type\":\"plugin\",\"creationDate\":\"2019-10\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2019 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"PLG_QUICKICON_DOWNLOADKEY_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Quickicon\\\\Downloadkey\",\"filename\":\"downloadkey\"}', '', '', NULL, NULL, 4, 0, NULL),
(161, 0, 'plg_quickicon_privacycheck', 'plugin', 'privacycheck', NULL, 'quickicon', 0, 1, 1, 0, 1, '{\"name\":\"plg_quickicon_privacycheck\",\"type\":\"plugin\",\"creationDate\":\"2018-06\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2018 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.9.0\",\"description\":\"PLG_QUICKICON_PRIVACYCHECK_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Quickicon\\\\PrivacyCheck\",\"filename\":\"privacycheck\"}', '{}', '', NULL, NULL, 5, 0, NULL),
(162, 0, 'plg_quickicon_phpversioncheck', 'plugin', 'phpversioncheck', NULL, 'quickicon', 0, 1, 1, 0, 1, '{\"name\":\"plg_quickicon_phpversioncheck\",\"type\":\"plugin\",\"creationDate\":\"2016-08\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2016 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_QUICKICON_PHPVERSIONCHECK_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Quickicon\\\\PhpVersionCheck\",\"filename\":\"phpversioncheck\"}', '', '', NULL, NULL, 6, 0, NULL),
(163, 0, 'plg_sampledata_blog', 'plugin', 'blog', NULL, 'sampledata', 0, 1, 1, 0, 1, '{\"name\":\"plg_sampledata_blog\",\"type\":\"plugin\",\"creationDate\":\"2017-07\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2017 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.8.0\",\"description\":\"PLG_SAMPLEDATA_BLOG_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"blog\"}', '', '', NULL, NULL, 1, 0, NULL),
(164, 0, 'plg_sampledata_multilang', 'plugin', 'multilang', NULL, 'sampledata', 0, 1, 1, 0, 1, '{\"name\":\"plg_sampledata_multilang\",\"type\":\"plugin\",\"creationDate\":\"2018-07\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2018 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"PLG_SAMPLEDATA_MULTILANG_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"multilang\"}', '', '', NULL, NULL, 2, 0, NULL);
INSERT INTO `bol96_extensions` (`extension_id`, `package_id`, `name`, `type`, `element`, `changelogurl`, `folder`, `client_id`, `enabled`, `access`, `protected`, `locked`, `manifest_cache`, `params`, `custom_data`, `checked_out`, `checked_out_time`, `ordering`, `state`, `note`) VALUES
(165, 0, 'plg_system_accessibility', 'plugin', 'accessibility', NULL, 'system', 0, 0, 1, 0, 1, '{\"name\":\"plg_system_accessibility\",\"type\":\"plugin\",\"creationDate\":\"2020-02-15\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2020 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"PLG_SYSTEM_ACCESSIBILITY_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"accessibility\"}', '{}', '', NULL, NULL, 1, 0, NULL),
(166, 0, 'plg_system_actionlogs', 'plugin', 'actionlogs', NULL, 'system', 0, 1, 1, 0, 1, '{\"name\":\"plg_system_actionlogs\",\"type\":\"plugin\",\"creationDate\":\"2018-05\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2018 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.9.0\",\"description\":\"PLG_SYSTEM_ACTIONLOGS_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"actionlogs\"}', '{}', '', NULL, NULL, 2, 0, NULL),
(167, 0, 'plg_system_cache', 'plugin', 'cache', NULL, 'system', 0, 0, 1, 0, 1, '{\"name\":\"plg_system_cache\",\"type\":\"plugin\",\"creationDate\":\"2007-02\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2007 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_CACHE_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\System\\\\Cache\",\"filename\":\"cache\"}', '{\"browsercache\":\"0\",\"cachetime\":\"15\"}', '', NULL, NULL, 3, 0, NULL),
(168, 0, 'plg_system_debug', 'plugin', 'debug', NULL, 'system', 0, 1, 1, 0, 1, '{\"name\":\"plg_system_debug\",\"type\":\"plugin\",\"creationDate\":\"2006-12\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2006 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_DEBUG_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\System\\\\Debug\",\"filename\":\"debug\"}', '{\"profile\":\"1\",\"queries\":\"1\",\"memory\":\"1\",\"language_files\":\"1\",\"language_strings\":\"1\",\"strip-first\":\"1\",\"strip-prefix\":\"\",\"strip-suffix\":\"\"}', '', NULL, NULL, 4, 0, NULL),
(169, 0, 'plg_system_fields', 'plugin', 'fields', NULL, 'system', 0, 1, 1, 0, 1, '{\"name\":\"plg_system_fields\",\"type\":\"plugin\",\"creationDate\":\"2016-03\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2016 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.7.0\",\"description\":\"PLG_SYSTEM_FIELDS_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"fields\"}', '', '', NULL, NULL, 5, 0, NULL),
(170, 0, 'plg_system_highlight', 'plugin', 'highlight', NULL, 'system', 0, 1, 1, 0, 1, '{\"name\":\"plg_system_highlight\",\"type\":\"plugin\",\"creationDate\":\"2011-08\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2011 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_SYSTEM_HIGHLIGHT_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"highlight\"}', '', '', NULL, NULL, 6, 0, NULL),
(171, 0, 'plg_system_httpheaders', 'plugin', 'httpheaders', NULL, 'system', 0, 1, 1, 0, 1, '{\"name\":\"plg_system_httpheaders\",\"type\":\"plugin\",\"creationDate\":\"2017-10\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2018 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"PLG_SYSTEM_HTTPHEADERS_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"httpheaders\"}', '{}', '', NULL, NULL, 7, 0, NULL),
(172, 0, 'plg_system_jooa11y', 'plugin', 'jooa11y', NULL, 'system', 0, 1, 1, 0, 1, '{\"name\":\"plg_system_jooa11y\",\"type\":\"plugin\",\"creationDate\":\"2022-02\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2021 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.2.0\",\"description\":\"PLG_SYSTEM_JOOA11Y_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"jooa11y\"}', '', '', NULL, NULL, 8, 0, NULL),
(173, 0, 'plg_system_languagecode', 'plugin', 'languagecode', NULL, 'system', 0, 0, 1, 0, 1, '{\"name\":\"plg_system_languagecode\",\"type\":\"plugin\",\"creationDate\":\"2011-11\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2011 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_SYSTEM_LANGUAGECODE_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"languagecode\"}', '', '', NULL, NULL, 9, 0, NULL),
(174, 0, 'plg_system_languagefilter', 'plugin', 'languagefilter', NULL, 'system', 0, 0, 1, 0, 1, '{\"name\":\"plg_system_languagefilter\",\"type\":\"plugin\",\"creationDate\":\"2010-07\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2010 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_SYSTEM_LANGUAGEFILTER_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"languagefilter\"}', '', '', NULL, NULL, 10, 0, NULL),
(175, 0, 'plg_system_log', 'plugin', 'log', NULL, 'system', 0, 1, 1, 0, 1, '{\"name\":\"plg_system_log\",\"type\":\"plugin\",\"creationDate\":\"2007-04\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2007 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_LOG_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"log\"}', '', '', NULL, NULL, 11, 0, NULL),
(176, 0, 'plg_system_logout', 'plugin', 'logout', NULL, 'system', 0, 1, 1, 0, 1, '{\"name\":\"plg_system_logout\",\"type\":\"plugin\",\"creationDate\":\"2009-04\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2009 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_SYSTEM_LOGOUT_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"logout\"}', '', '', NULL, NULL, 12, 0, NULL),
(177, 0, 'plg_system_logrotation', 'plugin', 'logrotation', NULL, 'system', 0, 1, 1, 0, 1, '{\"name\":\"plg_system_logrotation\",\"type\":\"plugin\",\"creationDate\":\"2018-05\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2018 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.9.0\",\"description\":\"PLG_SYSTEM_LOGROTATION_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"logrotation\"}', '{\"lastrun\":1706813701}', '', NULL, NULL, 13, 0, NULL),
(178, 0, 'plg_system_privacyconsent', 'plugin', 'privacyconsent', NULL, 'system', 0, 0, 1, 0, 1, '{\"name\":\"plg_system_privacyconsent\",\"type\":\"plugin\",\"creationDate\":\"2018-04\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2018 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.9.0\",\"description\":\"PLG_SYSTEM_PRIVACYCONSENT_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\System\\\\PrivacyConsent\",\"filename\":\"privacyconsent\"}', '{}', '', NULL, NULL, 14, 0, NULL),
(179, 0, 'plg_system_redirect', 'plugin', 'redirect', NULL, 'system', 0, 0, 1, 0, 1, '{\"name\":\"plg_system_redirect\",\"type\":\"plugin\",\"creationDate\":\"2009-04\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2009 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_SYSTEM_REDIRECT_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"redirect\"}', '', '', NULL, NULL, 15, 0, NULL),
(180, 0, 'plg_system_remember', 'plugin', 'remember', NULL, 'system', 0, 1, 1, 0, 1, '{\"name\":\"plg_system_remember\",\"type\":\"plugin\",\"creationDate\":\"2007-04\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2007 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_REMEMBER_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"remember\"}', '', '', NULL, NULL, 16, 0, NULL),
(181, 0, 'plg_system_schedulerunner', 'plugin', 'schedulerunner', NULL, 'system', 0, 1, 1, 0, 1, '{\"name\":\"plg_system_schedulerunner\",\"type\":\"plugin\",\"creationDate\":\"2021-08\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2021 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.1\",\"description\":\"PLG_SYSTEM_SCHEDULERUNNER_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"schedulerunner\"}', '{}', '', NULL, NULL, 17, 0, NULL),
(182, 0, 'plg_system_sef', 'plugin', 'sef', NULL, 'system', 0, 1, 1, 0, 1, '{\"name\":\"plg_system_sef\",\"type\":\"plugin\",\"creationDate\":\"2007-12\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2007 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_SEF_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"sef\"}', '', '', NULL, NULL, 18, 0, NULL),
(183, 0, 'plg_system_sessiongc', 'plugin', 'sessiongc', NULL, 'system', 0, 1, 1, 0, 1, '{\"name\":\"plg_system_sessiongc\",\"type\":\"plugin\",\"creationDate\":\"2018-02\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2018 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.8.6\",\"description\":\"PLG_SYSTEM_SESSIONGC_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"sessiongc\"}', '', '', NULL, NULL, 19, 0, NULL),
(184, 0, 'plg_system_shortcut', 'plugin', 'shortcut', NULL, 'system', 0, 1, 1, 0, 1, '{\"name\":\"plg_system_shortcut\",\"type\":\"plugin\",\"creationDate\":\"2022-06\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2022 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.2.0\",\"description\":\"PLG_SYSTEM_SHORTCUT_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\System\\\\Shortcut\",\"filename\":\"shortcut\"}', '{}', '', NULL, NULL, 0, 0, NULL),
(185, 0, 'plg_system_skipto', 'plugin', 'skipto', NULL, 'system', 0, 1, 1, 0, 1, '{\"name\":\"plg_system_skipto\",\"type\":\"plugin\",\"creationDate\":\"2020-02\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2019 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"PLG_SYSTEM_SKIPTO_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"skipto\"}', '{}', '', NULL, NULL, 20, 0, NULL),
(186, 0, 'plg_system_stats', 'plugin', 'stats', NULL, 'system', 0, 0, 1, 0, 1, '{\"name\":\"plg_system_stats\",\"type\":\"plugin\",\"creationDate\":\"2013-11\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2013 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.5.0\",\"description\":\"PLG_SYSTEM_STATS_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\System\\\\Stats\",\"filename\":\"stats\"}', '{\"mode\":3,\"lastrun\":1706821944,\"unique_id\":\"2e3b994a38c2c6c44dfd59e11f47746587910c67\",\"interval\":12}', '', NULL, NULL, 21, 0, NULL),
(187, 0, 'plg_system_task_notification', 'plugin', 'tasknotification', NULL, 'system', 0, 1, 1, 0, 1, '{\"name\":\"plg_system_task_notification\",\"type\":\"plugin\",\"creationDate\":\"2021-09\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2021 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.1\",\"description\":\"PLG_SYSTEM_TASK_NOTIFICATION_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"tasknotification\"}', '', '', NULL, NULL, 22, 0, NULL),
(188, 0, 'plg_system_updatenotification', 'plugin', 'updatenotification', NULL, 'system', 0, 1, 1, 0, 1, '{\"name\":\"plg_system_updatenotification\",\"type\":\"plugin\",\"creationDate\":\"2015-05\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2015 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.5.0\",\"description\":\"PLG_SYSTEM_UPDATENOTIFICATION_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"updatenotification\"}', '{\"lastrun\":1708953204}', '', NULL, NULL, 23, 0, NULL),
(189, 0, 'plg_system_webauthn', 'plugin', 'webauthn', NULL, 'system', 0, 1, 1, 0, 1, '{\"name\":\"plg_system_webauthn\",\"type\":\"plugin\",\"creationDate\":\"2019-07-02\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2020 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"PLG_SYSTEM_WEBAUTHN_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\System\\\\Webauthn\",\"filename\":\"webauthn\"}', '{}', '', NULL, NULL, 24, 0, NULL),
(190, 0, 'plg_task_check_files', 'plugin', 'checkfiles', NULL, 'task', 0, 1, 1, 0, 1, '{\"name\":\"plg_task_check_files\",\"type\":\"plugin\",\"creationDate\":\"2021-08\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2021 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.1\",\"description\":\"PLG_TASK_CHECK_FILES_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Task\\\\Checkfiles\",\"filename\":\"checkfiles\"}', '{}', '', NULL, NULL, 1, 0, NULL),
(191, 0, 'plg_task_demo_tasks', 'plugin', 'demotasks', NULL, 'task', 0, 1, 1, 0, 1, '{\"name\":\"plg_task_demo_tasks\",\"type\":\"plugin\",\"creationDate\":\"2021-07\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2021 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.1\",\"description\":\"PLG_TASK_DEMO_TASKS_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Task\\\\DemoTasks\",\"filename\":\"demotasks\"}', '{}', '', NULL, NULL, 2, 0, NULL),
(192, 0, 'plg_task_requests', 'plugin', 'requests', NULL, 'task', 0, 1, 1, 0, 1, '{\"name\":\"plg_task_requests\",\"type\":\"plugin\",\"creationDate\":\"2021-08\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2021 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.1\",\"description\":\"PLG_TASK_REQUESTS_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Task\\\\Requests\",\"filename\":\"requests\"}', '{}', '', NULL, NULL, 3, 0, NULL),
(193, 0, 'plg_task_site_status', 'plugin', 'sitestatus', NULL, 'task', 0, 1, 1, 0, 1, '{\"name\":\"plg_task_site_status\",\"type\":\"plugin\",\"creationDate\":\"2021-08\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2021 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.1\",\"description\":\"PLG_TASK_SITE_STATUS_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Task\\\\SiteStatus\",\"filename\":\"sitestatus\"}', '{}', '', NULL, NULL, 4, 0, NULL),
(194, 0, 'plg_multifactorauth_totp', 'plugin', 'totp', NULL, 'multifactorauth', 0, 1, 1, 0, 1, '{\"name\":\"plg_multifactorauth_totp\",\"type\":\"plugin\",\"creationDate\":\"2013-08\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2013 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.2.0\",\"description\":\"PLG_MULTIFACTORAUTH_TOTP_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Multifactorauth\\\\Totp\",\"filename\":\"totp\"}', '', '', NULL, NULL, 1, 0, NULL),
(195, 0, 'plg_multifactorauth_yubikey', 'plugin', 'yubikey', NULL, 'multifactorauth', 0, 1, 1, 0, 1, '{\"name\":\"plg_multifactorauth_yubikey\",\"type\":\"plugin\",\"creationDate\":\"2013-09\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2013 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.2.0\",\"description\":\"PLG_MULTIFACTORAUTH_YUBIKEY_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Multifactorauth\\\\Yubikey\",\"filename\":\"yubikey\"}', '', '', NULL, NULL, 2, 0, NULL),
(196, 0, 'plg_multifactorauth_webauthn', 'plugin', 'webauthn', NULL, 'multifactorauth', 0, 1, 1, 0, 1, '{\"name\":\"plg_multifactorauth_webauthn\",\"type\":\"plugin\",\"creationDate\":\"2022-05\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2022 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.2.0\",\"description\":\"PLG_MULTIFACTORAUTH_WEBAUTHN_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Multifactorauth\\\\Webauthn\",\"filename\":\"webauthn\"}', '', '', NULL, NULL, 3, 0, NULL),
(197, 0, 'plg_multifactorauth_email', 'plugin', 'email', NULL, 'multifactorauth', 0, 1, 1, 0, 1, '{\"name\":\"plg_multifactorauth_email\",\"type\":\"plugin\",\"creationDate\":\"2022-05\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2022 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.2.0\",\"description\":\"PLG_MULTIFACTORAUTH_EMAIL_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Multifactorauth\\\\Email\",\"filename\":\"email\"}', '', '', NULL, NULL, 4, 0, NULL),
(198, 0, 'plg_multifactorauth_fixed', 'plugin', 'fixed', NULL, 'multifactorauth', 0, 0, 1, 0, 1, '{\"name\":\"plg_multifactorauth_fixed\",\"type\":\"plugin\",\"creationDate\":\"2022-05\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2022 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.2.0\",\"description\":\"PLG_MULTIFACTORAUTH_FIXED_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\Multifactorauth\\\\Fixed\",\"filename\":\"fixed\"}', '', '', NULL, NULL, 5, 0, NULL),
(199, 0, 'plg_user_contactcreator', 'plugin', 'contactcreator', NULL, 'user', 0, 0, 1, 0, 1, '{\"name\":\"plg_user_contactcreator\",\"type\":\"plugin\",\"creationDate\":\"2009-08\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2009 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_CONTACTCREATOR_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"contactcreator\"}', '{\"autowebpage\":\"\",\"category\":\"4\",\"autopublish\":\"0\"}', '', NULL, NULL, 1, 0, NULL),
(200, 0, 'plg_user_joomla', 'plugin', 'joomla', NULL, 'user', 0, 1, 1, 0, 1, '{\"name\":\"plg_user_joomla\",\"type\":\"plugin\",\"creationDate\":\"2006-12\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2006 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_USER_JOOMLA_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"joomla\"}', '{\"autoregister\":\"1\",\"mail_to_user\":\"1\",\"forceLogout\":\"1\"}', '', NULL, NULL, 2, 0, NULL),
(201, 0, 'plg_user_profile', 'plugin', 'profile', NULL, 'user', 0, 0, 1, 0, 1, '{\"name\":\"plg_user_profile\",\"type\":\"plugin\",\"creationDate\":\"2008-01\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2008 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.0.0\",\"description\":\"PLG_USER_PROFILE_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\User\\\\Profile\",\"filename\":\"profile\"}', '{\"register-require_address1\":\"1\",\"register-require_address2\":\"1\",\"register-require_city\":\"1\",\"register-require_region\":\"1\",\"register-require_country\":\"1\",\"register-require_postal_code\":\"1\",\"register-require_phone\":\"1\",\"register-require_website\":\"1\",\"register-require_favoritebook\":\"1\",\"register-require_aboutme\":\"1\",\"register-require_tos\":\"1\",\"register-require_dob\":\"1\",\"profile-require_address1\":\"1\",\"profile-require_address2\":\"1\",\"profile-require_city\":\"1\",\"profile-require_region\":\"1\",\"profile-require_country\":\"1\",\"profile-require_postal_code\":\"1\",\"profile-require_phone\":\"1\",\"profile-require_website\":\"1\",\"profile-require_favoritebook\":\"1\",\"profile-require_aboutme\":\"1\",\"profile-require_tos\":\"1\",\"profile-require_dob\":\"1\"}', '', NULL, NULL, 3, 0, NULL),
(202, 0, 'plg_user_terms', 'plugin', 'terms', NULL, 'user', 0, 0, 1, 0, 1, '{\"name\":\"plg_user_terms\",\"type\":\"plugin\",\"creationDate\":\"2018-06\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2018 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.9.0\",\"description\":\"PLG_USER_TERMS_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\User\\\\Terms\",\"filename\":\"terms\"}', '{}', '', NULL, NULL, 4, 0, NULL),
(203, 0, 'plg_user_token', 'plugin', 'token', NULL, 'user', 0, 1, 1, 0, 1, '{\"name\":\"plg_user_token\",\"type\":\"plugin\",\"creationDate\":\"2019-11\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2020 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"3.9.0\",\"description\":\"PLG_USER_TOKEN_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\User\\\\Token\",\"filename\":\"token\"}', '{}', '', NULL, NULL, 5, 0, NULL),
(204, 0, 'plg_webservices_banners', 'plugin', 'banners', NULL, 'webservices', 0, 1, 1, 0, 1, '{\"name\":\"plg_webservices_banners\",\"type\":\"plugin\",\"creationDate\":\"2019-09\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2019 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"PLG_WEBSERVICES_BANNERS_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"banners\"}', '{}', '', NULL, NULL, 1, 0, NULL),
(205, 0, 'plg_webservices_config', 'plugin', 'config', NULL, 'webservices', 0, 1, 1, 0, 1, '{\"name\":\"plg_webservices_config\",\"type\":\"plugin\",\"creationDate\":\"2019-09\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2019 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"PLG_WEBSERVICES_CONFIG_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"config\"}', '{}', '', NULL, NULL, 2, 0, NULL),
(206, 0, 'plg_webservices_contact', 'plugin', 'contact', NULL, 'webservices', 0, 1, 1, 0, 1, '{\"name\":\"plg_webservices_contact\",\"type\":\"plugin\",\"creationDate\":\"2019-09\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2019 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"PLG_WEBSERVICES_CONTACT_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"contact\"}', '{}', '', NULL, NULL, 3, 0, NULL),
(207, 0, 'plg_webservices_content', 'plugin', 'content', NULL, 'webservices', 0, 1, 1, 0, 1, '{\"name\":\"plg_webservices_content\",\"type\":\"plugin\",\"creationDate\":\"2019-09\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2019 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"PLG_WEBSERVICES_CONTENT_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"content\"}', '{}', '', NULL, NULL, 4, 0, NULL),
(208, 0, 'plg_webservices_installer', 'plugin', 'installer', NULL, 'webservices', 0, 1, 1, 0, 1, '{\"name\":\"plg_webservices_installer\",\"type\":\"plugin\",\"creationDate\":\"2020-06\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2020 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"PLG_WEBSERVICES_INSTALLER_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"installer\"}', '{}', '', NULL, NULL, 5, 0, NULL),
(209, 0, 'plg_webservices_languages', 'plugin', 'languages', NULL, 'webservices', 0, 1, 1, 0, 1, '{\"name\":\"plg_webservices_languages\",\"type\":\"plugin\",\"creationDate\":\"2019-09\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2019 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"PLG_WEBSERVICES_LANGUAGES_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"languages\"}', '{}', '', NULL, NULL, 6, 0, NULL),
(210, 0, 'plg_webservices_media', 'plugin', 'media', NULL, 'webservices', 0, 1, 1, 0, 1, '{\"name\":\"plg_webservices_media\",\"type\":\"plugin\",\"creationDate\":\"2021-05\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2021 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.1.0\",\"description\":\"PLG_WEBSERVICES_MEDIA_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"media\"}', '{}', '', NULL, NULL, 7, 0, NULL),
(211, 0, 'plg_webservices_menus', 'plugin', 'menus', NULL, 'webservices', 0, 1, 1, 0, 1, '{\"name\":\"plg_webservices_menus\",\"type\":\"plugin\",\"creationDate\":\"2019-09\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2019 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"PLG_WEBSERVICES_MENUS_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"menus\"}', '{}', '', NULL, NULL, 7, 0, NULL),
(212, 0, 'plg_webservices_messages', 'plugin', 'messages', NULL, 'webservices', 0, 1, 1, 0, 1, '{\"name\":\"plg_webservices_messages\",\"type\":\"plugin\",\"creationDate\":\"2019-09\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2019 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"PLG_WEBSERVICES_MESSAGES_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"messages\"}', '{}', '', NULL, NULL, 8, 0, NULL),
(213, 0, 'plg_webservices_modules', 'plugin', 'modules', NULL, 'webservices', 0, 1, 1, 0, 1, '{\"name\":\"plg_webservices_modules\",\"type\":\"plugin\",\"creationDate\":\"2019-09\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2019 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"PLG_WEBSERVICES_MODULES_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"modules\"}', '{}', '', NULL, NULL, 9, 0, NULL),
(214, 0, 'plg_webservices_newsfeeds', 'plugin', 'newsfeeds', NULL, 'webservices', 0, 1, 1, 0, 1, '{\"name\":\"plg_webservices_newsfeeds\",\"type\":\"plugin\",\"creationDate\":\"2019-09\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2019 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"PLG_WEBSERVICES_NEWSFEEDS_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"newsfeeds\"}', '{}', '', NULL, NULL, 10, 0, NULL),
(215, 0, 'plg_webservices_plugins', 'plugin', 'plugins', NULL, 'webservices', 0, 1, 1, 0, 1, '{\"name\":\"plg_webservices_plugins\",\"type\":\"plugin\",\"creationDate\":\"2019-09\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2019 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"PLG_WEBSERVICES_PLUGINS_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"plugins\"}', '{}', '', NULL, NULL, 11, 0, NULL),
(216, 0, 'plg_webservices_privacy', 'plugin', 'privacy', NULL, 'webservices', 0, 1, 1, 0, 1, '{\"name\":\"plg_webservices_privacy\",\"type\":\"plugin\",\"creationDate\":\"2019-09\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2019 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"PLG_WEBSERVICES_PRIVACY_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"privacy\"}', '{}', '', NULL, NULL, 12, 0, NULL),
(217, 0, 'plg_webservices_redirect', 'plugin', 'redirect', NULL, 'webservices', 0, 1, 1, 0, 1, '{\"name\":\"plg_webservices_redirect\",\"type\":\"plugin\",\"creationDate\":\"2019-09\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2019 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"PLG_WEBSERVICES_REDIRECT_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"redirect\"}', '{}', '', NULL, NULL, 13, 0, NULL),
(218, 0, 'plg_webservices_tags', 'plugin', 'tags', NULL, 'webservices', 0, 1, 1, 0, 1, '{\"name\":\"plg_webservices_tags\",\"type\":\"plugin\",\"creationDate\":\"2019-09\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2019 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"PLG_WEBSERVICES_TAGS_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"tags\"}', '{}', '', NULL, NULL, 14, 0, NULL),
(219, 0, 'plg_webservices_templates', 'plugin', 'templates', NULL, 'webservices', 0, 1, 1, 0, 1, '{\"name\":\"plg_webservices_templates\",\"type\":\"plugin\",\"creationDate\":\"2019-09\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2019 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"PLG_WEBSERVICES_TEMPLATES_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"templates\"}', '{}', '', NULL, NULL, 15, 0, NULL),
(220, 0, 'plg_webservices_users', 'plugin', 'users', NULL, 'webservices', 0, 1, 1, 0, 1, '{\"name\":\"plg_webservices_users\",\"type\":\"plugin\",\"creationDate\":\"2019-09\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2019 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"PLG_WEBSERVICES_USERS_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"users\"}', '{}', '', NULL, NULL, 16, 0, NULL),
(221, 0, 'plg_workflow_featuring', 'plugin', 'featuring', NULL, 'workflow', 0, 1, 1, 0, 1, '{\"name\":\"plg_workflow_featuring\",\"type\":\"plugin\",\"creationDate\":\"2020-03\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2020 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"PLG_WORKFLOW_FEATURING_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"featuring\"}', '{}', '', NULL, NULL, 1, 0, NULL),
(222, 0, 'plg_workflow_notification', 'plugin', 'notification', NULL, 'workflow', 0, 1, 1, 0, 1, '{\"name\":\"plg_workflow_notification\",\"type\":\"plugin\",\"creationDate\":\"2020-05\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2020 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"PLG_WORKFLOW_NOTIFICATION_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"notification\"}', '{}', '', NULL, NULL, 2, 0, NULL),
(223, 0, 'plg_workflow_publishing', 'plugin', 'publishing', NULL, 'workflow', 0, 1, 1, 0, 1, '{\"name\":\"plg_workflow_publishing\",\"type\":\"plugin\",\"creationDate\":\"2020-03\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2020 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.0.0\",\"description\":\"PLG_WORKFLOW_PUBLISHING_XML_DESCRIPTION\",\"group\":\"\",\"filename\":\"publishing\"}', '{}', '', NULL, NULL, 3, 0, NULL),
(224, 0, 'plg_system_guidedtours', 'plugin', 'guidedtours', NULL, 'system', 0, 1, 1, 0, 1, '{\"name\":\"plg_system_guidedtours\",\"type\":\"plugin\",\"creationDate\":\"2023-02\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2023 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.3.0\",\"description\":\"PLG_SYSTEM_GUIDEDTOURS_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Plugin\\\\System\\\\GuidedTours\",\"filename\":\"guidedtours\"}', '{}', '', NULL, NULL, 15, 0, NULL),
(225, 0, 'atum', 'template', 'atum', NULL, '', 1, 1, 1, 0, 1, '{\"name\":\"atum\",\"type\":\"template\",\"creationDate\":\"2016-09\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2016 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"\",\"version\":\"1.0\",\"description\":\"TPL_ATUM_XML_DESCRIPTION\",\"group\":\"\",\"inheritable\":true,\"filename\":\"templateDetails\"}', '', '', NULL, NULL, 0, 0, NULL),
(226, 0, 'cassiopeia', 'template', 'cassiopeia', NULL, '', 0, 1, 1, 0, 1, '{\"name\":\"cassiopeia\",\"type\":\"template\",\"creationDate\":\"2017-02\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2017 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"\",\"version\":\"1.0\",\"description\":\"TPL_CASSIOPEIA_XML_DESCRIPTION\",\"group\":\"\",\"inheritable\":true,\"filename\":\"templateDetails\"}', '{\"logoFile\":\"\",\"fluidContainer\":\"0\",\"sidebarLeftWidth\":\"3\",\"sidebarRightWidth\":\"3\"}', '', NULL, NULL, 0, 0, NULL),
(227, 0, 'files_joomla', 'file', 'joomla', NULL, '', 0, 1, 1, 1, 1, '{\"name\":\"files_joomla\",\"type\":\"file\",\"creationDate\":\"2023-08\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2019 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.3.4\",\"description\":\"FILES_JOOMLA_XML_DESCRIPTION\",\"group\":\"\"}', '', '', NULL, NULL, 0, 0, NULL),
(228, 0, 'English (en-GB) Language Pack', 'package', 'pkg_en-GB', NULL, '', 0, 1, 1, 1, 1, '{\"name\":\"English (en-GB) Language Pack\",\"type\":\"package\",\"creationDate\":\"2023-08\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2019 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.3.4.1\",\"description\":\"en-GB language pack\",\"group\":\"\",\"filename\":\"pkg_en-GB\"}', '', '', NULL, NULL, 0, 0, NULL),
(229, 228, 'English (en-GB)', 'language', 'en-GB', NULL, '', 0, 1, 1, 1, 1, '{\"name\":\"English (en-GB)\",\"type\":\"language\",\"creationDate\":\"2023-08\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2006 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.3.4\",\"description\":\"en-GB site language\",\"group\":\"\"}', '', '', NULL, NULL, 0, 0, NULL),
(230, 228, 'English (en-GB)', 'language', 'en-GB', NULL, '', 1, 1, 1, 1, 1, '{\"name\":\"English (en-GB)\",\"type\":\"language\",\"creationDate\":\"2023-08\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2005 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.3.4\",\"description\":\"en-GB administrator language\",\"group\":\"\"}', '', '', NULL, NULL, 0, 0, NULL),
(231, 228, 'English (en-GB)', 'language', 'en-GB', NULL, '', 3, 1, 1, 1, 1, '{\"name\":\"English (en-GB)\",\"type\":\"language\",\"creationDate\":\"2023-08\",\"author\":\"Joomla! Project\",\"copyright\":\"(C) 2020 Open Source Matters, Inc.\",\"authorEmail\":\"admin@joomla.org\",\"authorUrl\":\"www.joomla.org\",\"version\":\"4.3.4\",\"description\":\"en-GB api language\",\"group\":\"\"}', '', '', NULL, NULL, 0, 0, NULL),
(233, 0, 'Licencia PQ', 'template', 'spivet_pq_tm', '', '', 0, 1, 1, 0, 0, '{\"name\":\"Licencia PQ\",\"type\":\"template\",\"creationDate\":\"02.01.2024\",\"author\":\"Piquero Tecnolog\\u00eda Deportes\",\"copyright\":\"piquero\",\"authorEmail\":\"beel@piquero.mx\",\"authorUrl\":\"www.piquero.com.mx\\/\",\"version\":\"1.0\",\"description\":\"Plantilla Spivet Boletera\",\"group\":\"\",\"filename\":\"templateDetails\"}', '{\"menu_1_footer\":\"\",\"menu_2_footer\":\"\",\"tagsGoogle\":\"\"}', '', NULL, NULL, 0, 0, NULL),
(234, 0, 'Inicio', 'module', 'mod_inicio', '', '', 0, 1, 1, 0, 0, '{\"name\":\"Inicio\",\"type\":\"module\",\"creationDate\":\"Unknown\",\"author\":\"Piquero Tecnolog\\u00eda Deportes\",\"copyright\":\"\",\"authorEmail\":\"\",\"authorUrl\":\"\",\"version\":\"1.0.0\",\"description\":\"M\\u00f3dulo para inicio\",\"group\":\"\",\"filename\":\"mod_inicio\"}', '{\"slider\":\"\",\"title_oferta\":\"\",\"title_beneficios\":\"\",\"text_beneficios\":\"\",\"boton_beneficios\":\"\",\"list_beneficios\":\"\",\"slider_installations\":\"\",\"slider_footer\":\"\"}', '', NULL, NULL, 0, 0, NULL),
(235, 0, 'COM_BLANK', 'component', 'com_blank', 'https://web-tolk.ru/jchangelog?element=com_blank', '', 1, 1, 0, 0, 0, '{\"name\":\"COM_BLANK\",\"type\":\"component\",\"creationDate\":\"Nov 2023\",\"author\":\"Sergey Tolkachyov\",\"copyright\":\"Sergey Tolkachyov\",\"authorEmail\":\"info@web-tolk.ru\",\"authorUrl\":\"\",\"version\":\"2.0.0\",\"description\":\"COM_BLANK_DESC\",\"group\":\"\",\"namespace\":\"Joomla\\\\Component\\\\Blank\",\"filename\":\"blank\"}', '{}', '', NULL, NULL, 0, 0, NULL),
(237, 240, 'Spanish (es-ES)', 'language', 'es-ES', '', '', 0, 1, 1, 0, 0, '{\"name\":\"Spanish (es-ES)\",\"type\":\"language\",\"creationDate\":\"2024-01\",\"author\":\"Spanish [es-ES] Translation Team\",\"copyright\":\"(C) 2013 Open Source Matters, Inc.\",\"authorEmail\":\"traduccion@joomlaes.org\",\"authorUrl\":\"https:\\/\\/joomlaes.org\\/traduccion\",\"version\":\"4.4.2.1\",\"description\":\"<p>Spanish [es-ES] language pack (site) for Joomla!<\\/p><p><\\/p><p>Paquete de idioma espa\\u00f1ol [es-ES] (sitio) para Joomla!<\\/p>\",\"group\":\"\",\"filename\":\"install\"}', '{}', '', NULL, NULL, 0, 0, NULL),
(238, 240, 'Spanish (es-ES)', 'language', 'es-ES', '', '', 1, 1, 0, 0, 0, '{\"name\":\"Spanish (es-ES)\",\"type\":\"language\",\"creationDate\":\"2024-01\",\"author\":\"Spanish [es-ES] Translation Team\",\"copyright\":\"(C) 2013 Open Source Matters, Inc.\",\"authorEmail\":\"traduccion@joomlaes.org\",\"authorUrl\":\"https:\\/\\/joomlaes.org\\/traduccion\",\"version\":\"4.4.2.1\",\"description\":\"<p>Spanish [es-ES] language pack (administrator) for Joomla!<\\/p><p><\\/p><p>Paquete de idioma espa\\u00f1ol [es-ES] (administrador) para Joomla!<\\/p>\",\"group\":\"\",\"filename\":\"install\"}', '{}', '', NULL, NULL, 0, 0, NULL),
(239, 240, 'Spanish (es-ES)', 'language', 'es-ES', '', '', 3, 1, 0, 0, 0, '{\"name\":\"Spanish (es-ES)\",\"type\":\"language\",\"creationDate\":\"2024-01\",\"author\":\"Spanish [es-ES] Translation Team\",\"copyright\":\"Copyright (C) 2005 - 2022 Open Source Matters, Inc.\",\"authorEmail\":\"traduccion@joomlaes.org\",\"authorUrl\":\"https:\\/\\/joomlaes.org\\/traduccion\",\"version\":\"4.4.2.1\",\"description\":\"Idioma es-ES de la api\",\"group\":\"\",\"filename\":\"install\"}', '{}', '', NULL, NULL, 0, 0, NULL),
(240, 0, 'Spanish (es-ES) Language Pack', 'package', 'pkg_es-ES', '', '', 0, 1, 1, 0, 0, '{\"name\":\"Spanish (es-ES) Language Pack\",\"type\":\"package\",\"creationDate\":\"2024-01\",\"author\":\"Spanish [es-ES] Translation Team\",\"copyright\":\"Copyright (C) 2005 - 2023 Open Source Matters, Inc.\",\"authorEmail\":\"traduccion@joomlaes.org\",\"authorUrl\":\"https:\\/\\/joomlaes.org\\/traduccion\",\"version\":\"4.4.2.1\",\"description\":\"<div style=\\\"text-align: left;\\\"><h2>Successfully installed the Joomla! 4.4.2 Spanish es-ES Language Pack (v1)<\\/h2><p><\\/p><p>Please report any bugs or issues at the Spanish Translation Team using the mail: traduccion@joomlaes.org<\\/p><p>If you wanna help with translations matters the site is at: <a href=\'https:\\/\\/joomlaes.org\\/traduccion\' target=\'_blank\' rel=\'noopener noreferrer\'>JoomlaES.org<\\/a> Contact Us!<\\/p><p><\\/p><p>Translated by: The Spanish Translation Team [es-ES]<\\/p><h2>El paquete del idioma en espa\\u00f1ol es-ES (v1) para Joomla! 4.4.2 se ha instalado correctamente.<\\/h2><p><\\/p><p>Por favor, reporte cualquier bug o asunto relacionado a nuestra direcci\\u00f3n de correo electr\\u00f3nico: traduccion@joomlaes.org<\\/p><p>Si quiere colaborar con el trabajo de traducci\\u00f3n estamos en: <a href=\'https:\\/\\/joomlaes.org\\/traduccion\' target=\'_blank\' rel=\'noopener noreferrer\'>JoomlaES.org<\\/a> \\u00a1Contacte con nosotros!<\\/p><p><\\/p><p>Traducci\\u00f3n: Spanish Translation Team [es-ES]<\\/p><\\/div>\",\"group\":\"\",\"filename\":\"pkg_es-ES\"}', '{}', '', NULL, NULL, 0, 0, NULL),
(241, 0, 'mod_menu', 'module', 'mod_curtain_menu', '', '', 0, 1, 1, 0, 0, '{\"name\":\"mod_menu\",\"type\":\"module\",\"creationDate\":\"August 2023\",\"author\":\"Piquero Tecnolog\\u00eda y Deportes\",\"copyright\":\"(C) 2005 Open Source Matters, Inc.\",\"authorEmail\":\"piqueromg@piquero.com.mx\",\"authorUrl\":\"piquero.com.mx\",\"version\":\"3.1.0\",\"description\":\"MOD_MENU_XML_DESCRIPTION\",\"group\":\"\",\"namespace\":\"Joomla\\\\Module\\\\Menu\",\"filename\":\"mod_curtain_menu\"}', '{\"startLevel\":\"1\",\"endLevel\":\"0\",\"showAllChildren\":\"1\",\"showSubMenu\":\"0\",\"layout\":\"_:default\",\"cache\":\"1\",\"cache_time\":\"900\",\"cachemode\":\"itemid\"}', '', NULL, NULL, 0, 0, NULL),
(242, 0, 'Footer', 'module', 'mod_footer_generic', '', '', 0, 1, 1, 0, 0, '{\"name\":\"Footer\",\"type\":\"module\",\"creationDate\":\"Unknown\",\"author\":\"Piquero\",\"copyright\":\"\",\"authorEmail\":\"\",\"authorUrl\":\"\",\"version\":\"1.0.0\",\"description\":\"M\\u00f3dulo para administrar el footer de pagina\",\"group\":\"\",\"filename\":\"mod_footer_generic\"}', '[]', '', NULL, NULL, 0, 0, NULL),
(243, 0, 'Oferta detalle', 'module', 'mod_oferta_detail', '', '', 0, 1, 1, 0, 0, '{\"name\":\"Oferta detalle\",\"type\":\"module\",\"creationDate\":\"Unknown\",\"author\":\"Piquero\",\"copyright\":\"\",\"authorEmail\":\"\",\"authorUrl\":\"\",\"version\":\"1.0.0\",\"description\":\"M\\u00f3dulo para visualizar el detalle de oferta\\/servicio\",\"group\":\"\",\"filename\":\"mod_oferta_detail\"}', '[]', '', NULL, NULL, 0, 0, NULL),
(246, 0, 'Carrito de compra', 'module', 'mod_buycar', '', '', 0, 1, 1, 0, 0, '{\"name\":\"Carrito de compra\",\"type\":\"module\",\"creationDate\":\"Unknown\",\"author\":\"Piquero\",\"copyright\":\"\",\"authorEmail\":\"\",\"authorUrl\":\"\",\"version\":\"1.0.0\",\"description\":\"M\\u00f3dulo que contiene el carrito para la compra de oferta\\/servicio\",\"group\":\"\",\"filename\":\"mod_buycar\"}', '{}', '', NULL, NULL, 0, 0, NULL),
(247, 0, 'Formulario de carrito', 'module', 'mod_buycarform', '', '', 0, 1, 1, 0, 0, '{\"name\":\"Formulario de carrito\",\"type\":\"module\",\"creationDate\":\"August 2023\",\"author\":\"Piquero\",\"copyright\":\"\",\"authorEmail\":\"desarrollo02@piquero.com.mx\",\"authorUrl\":\"\",\"version\":\"1.0.0\",\"description\":\"M\\u00f3dulo para visualizar el carrito y el formualario de compra\",\"group\":\"\",\"filename\":\"mod_buycarform\"}', '{}', '', NULL, NULL, 0, 0, NULL),
(248, 0, 'Modulo Generico Spivet', 'module', 'mod_generic_pq', '', '', 0, 1, 1, 0, 0, '{\"name\":\"Modulo Generico Spivet\",\"type\":\"module\",\"creationDate\":\"Unknown\",\"author\":\"Piquero\",\"copyright\":\"\",\"authorEmail\":\"\",\"authorUrl\":\"\",\"version\":\"1.0.0\",\"description\":\"M\\u00f3dulo generico para vistas completas\",\"group\":\"\",\"filename\":\"mod_generic_pq\"}', '[]', '', NULL, NULL, 0, 0, NULL),
(250, 0, 'Modulo de widget contactanos', 'module', 'mod_widget_contact', '', '', 0, 1, 1, 0, 0, '{\"name\":\"Modulo de widget contactanos\",\"type\":\"module\",\"creationDate\":\"Unknown\",\"author\":\"Piquero\",\"copyright\":\"\",\"authorEmail\":\"\",\"authorUrl\":\"\",\"version\":\"1.0.0\",\"description\":\"M\\u00f3dulo de widget multiplataforma contacto\",\"group\":\"\",\"filename\":\"mod_widget_contact\"}', '[]', '', NULL, NULL, 0, 0, NULL),
(253, 0, 'Modulo generico avanzado PQ', 'module', 'mod_generic_advance_pq', '', '', 0, 1, 1, 0, 0, '{\"name\":\"Modulo generico avanzado PQ\",\"type\":\"module\",\"creationDate\":\"Unknown\",\"author\":\"Piquero\",\"copyright\":\"\",\"authorEmail\":\"\",\"authorUrl\":\"\",\"version\":\"1.0.0\",\"description\":\"M\\u00f3dulo avanzado para vistas\\/apartados completos\",\"group\":\"\",\"filename\":\"mod_generic_advance_pq\"}', '{\"colorTitles\":\"fff\",\"addSubtitleSect1\":\"0\",\"backgroundSect1\":\"\",\"colorDescriptions\":\"fff\",\"distributionSect1\":\"0\"}', '', NULL, NULL, 0, 0, NULL),
(254, 0, 'Modulo de cinta superior', 'module', 'mod_information_tape', '', '', 0, 1, 1, 0, 0, '{\"name\":\"Modulo de cinta superior\",\"type\":\"module\",\"creationDate\":\"Unknown\",\"author\":\"Piquero\",\"copyright\":\"\",\"authorEmail\":\"\",\"authorUrl\":\"\",\"version\":\"1.0.0\",\"description\":\"M\\u00f3dulo de cinta para anuncios o promociones para la parte superior del sitio\",\"group\":\"\",\"filename\":\"mod_information_tape\"}', '[]', '', NULL, NULL, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_fields`
--

CREATE TABLE `bol96_fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `asset_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `context` varchar(255) NOT NULL DEFAULT '',
  `group_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `title` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) NOT NULL DEFAULT '',
  `default_value` text DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'text',
  `note` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `state` tinyint(4) NOT NULL DEFAULT 0,
  `required` tinyint(4) NOT NULL DEFAULT 0,
  `only_use_in_subform` tinyint(4) NOT NULL DEFAULT 0,
  `checked_out` int(10) UNSIGNED DEFAULT NULL,
  `checked_out_time` datetime DEFAULT NULL,
  `ordering` int(11) NOT NULL DEFAULT 0,
  `params` text NOT NULL,
  `fieldparams` text NOT NULL,
  `language` char(7) NOT NULL DEFAULT '',
  `created_time` datetime NOT NULL,
  `created_user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `modified_time` datetime NOT NULL,
  `modified_by` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `access` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_fields_categories`
--

CREATE TABLE `bol96_fields_categories` (
  `field_id` int(11) NOT NULL DEFAULT 0,
  `category_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_fields_groups`
--

CREATE TABLE `bol96_fields_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `asset_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `context` varchar(255) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `state` tinyint(4) NOT NULL DEFAULT 0,
  `checked_out` int(10) UNSIGNED DEFAULT NULL,
  `checked_out_time` datetime DEFAULT NULL,
  `ordering` int(11) NOT NULL DEFAULT 0,
  `params` text NOT NULL,
  `language` char(7) NOT NULL DEFAULT '',
  `created` datetime NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `modified` datetime NOT NULL,
  `modified_by` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `access` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_fields_values`
--

CREATE TABLE `bol96_fields_values` (
  `field_id` int(10) UNSIGNED NOT NULL,
  `item_id` varchar(255) NOT NULL COMMENT 'Allow references to items which have strings as ids, eg. none db systems.',
  `value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_finder_filters`
--

CREATE TABLE `bol96_finder_filters` (
  `filter_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `state` tinyint(4) NOT NULL DEFAULT 1,
  `created` datetime NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified` datetime NOT NULL,
  `modified_by` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `checked_out` int(10) UNSIGNED DEFAULT NULL,
  `checked_out_time` datetime DEFAULT NULL,
  `map_count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` text DEFAULT NULL,
  `params` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_finder_links`
--

CREATE TABLE `bol96_finder_links` (
  `link_id` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) NOT NULL,
  `route` varchar(400) NOT NULL,
  `title` varchar(400) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `indexdate` datetime NOT NULL,
  `md5sum` varchar(32) DEFAULT NULL,
  `published` tinyint(4) NOT NULL DEFAULT 1,
  `state` int(11) NOT NULL DEFAULT 1,
  `access` int(11) NOT NULL DEFAULT 0,
  `language` char(7) NOT NULL DEFAULT '',
  `publish_start_date` datetime DEFAULT NULL,
  `publish_end_date` datetime DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `list_price` double UNSIGNED NOT NULL DEFAULT 0,
  `sale_price` double UNSIGNED NOT NULL DEFAULT 0,
  `type_id` int(11) NOT NULL,
  `object` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bol96_finder_links`
--

INSERT INTO `bol96_finder_links` (`link_id`, `url`, `route`, `title`, `description`, `indexdate`, `md5sum`, `published`, `state`, `access`, `language`, `publish_start_date`, `publish_end_date`, `start_date`, `end_date`, `list_price`, `sale_price`, `type_id`, `object`) VALUES
(1, 'index.php?option=com_content&view=category&id=2', 'index.php?option=com_content&view=category&id=2', 'Informativa', '', '2024-02-12 15:57:19', '7cfd161594d6604a2401f584f6810817', 1, 1, 1, '*', NULL, NULL, '2024-02-01 18:54:23', NULL, 0, 0, 1, 0x4f3a35323a224a6f6f6d6c615c436f6d706f6e656e745c46696e6465725c41646d696e6973747261746f725c496e64657865725c526573756c74223a31393a7b693a303b693a313b693a313b733a353a22656e2d4742223b693a323b733a303a22223b693a333b613a31373a7b733a323a226964223b693a323b733a353a22616c696173223b733a31313a22696e666f726d6174697661223b733a393a22657874656e73696f6e223b733a31313a22636f6d5f636f6e74656e74223b733a373a226d6574616b6579223b733a303a22223b733a383a226d65746164657363223b733a303a22223b733a383a226d65746164617461223b4f3a32343a224a6f6f6d6c615c52656769737472795c5265676973747279223a333a7b733a373a22002a0064617461223b4f3a383a22737464436c617373223a323a7b733a363a22617574686f72223b733a303a22223b733a363a22726f626f7473223b733a303a22223b7d733a31343a22002a00696e697469616c697a6564223b623a313b733a31323a22002a00736570617261746f72223b733a313a222e223b7d733a333a226c6674223b693a313b733a393a22706172656e745f6964223b693a313b733a353a226c6576656c223b693a313b733a363a22706172616d73223b4f3a32343a224a6f6f6d6c615c52656769737472795c5265676973747279223a333a7b733a373a22002a0064617461223b4f3a383a22737464436c617373223a333a7b733a31353a2263617465676f72795f6c61796f7574223b733a303a22223b733a353a22696d616765223b733a303a22223b733a393a22696d6167655f616c74223b733a303a22223b7d733a31343a22002a00696e697469616c697a6564223b623a313b733a31323a22002a00736570617261746f72223b733a313a222e223b7d733a373a2273756d6d617279223b733a303a22223b733a31303a22637265617465645f6279223b693a3532373b733a383a226d6f646966696564223b733a31393a22323032342d30322d31322031353a35373a3139223b733a31313a226d6f6469666965645f6279223b693a3532373b733a343a22736c7567223b733a31333a22323a696e666f726d6174697661223b733a363a226c61796f7574223b733a383a2263617465676f7279223b733a31303a226d657461617574686f72223b4e3b7d693a343b4e3b693a353b613a353a7b693a313b613a333a7b693a303b733a353a227469746c65223b693a313b733a383a227375627469746c65223b693a323b733a323a226964223b7d693a323b613a323a7b693a303b733a373a2273756d6d617279223b693a313b733a343a22626f6479223b7d693a333b613a383a7b693a303b733a343a226d657461223b693a313b733a31303a226c6973745f7072696365223b693a323b733a31303a2273616c655f7072696365223b693a333b733a343a226c696e6b223b693a343b733a373a226d6574616b6579223b693a353b733a383a226d65746164657363223b693a363b733a31303a226d657461617574686f72223b693a373b733a363a22617574686f72223b7d693a343b613a323a7b693a303b733a343a2270617468223b693a313b733a353a22616c696173223b7d693a353b613a313a7b693a303b733a383a22636f6d6d656e7473223b7d7d693a363b733a313a222a223b693a373b4e3b693a383b4e3b693a393b4e3b693a31303b4e3b693a31313b733a34373a22696e6465782e7068703f6f7074696f6e3d636f6d5f636f6e74656e7426766965773d63617465676f72792669643d32223b693a31323b4e3b693a31333b733a31393a22323032342d30322d30312031383a35343a3233223b693a31343b693a313b693a31353b613a323a7b733a343a2254797065223b613a313a7b693a303b4f3a383a22737464436c617373223a363a7b733a353a227469746c65223b733a383a2243617465676f7279223b733a353a227374617465223b693a313b733a363a22616363657373223b693a313b733a383a226c616e6775616765223b733a303a22223b733a363a226e6573746564223b623a303b733a323a226964223b693a333b7d7d733a383a224c616e6775616765223b613a313a7b693a303b4f3a383a22737464436c617373223a363a7b733a353a227469746c65223b733a313a222a223b733a353a227374617465223b693a313b733a363a22616363657373223b693a313b733a383a226c616e6775616765223b733a303a22223b733a363a226e6573746564223b623a303b733a323a226964223b693a353b7d7d7d693a31363b733a31313a22496e666f726d6174697661223b693a31373b693a313b693a31383b733a34373a22696e6465782e7068703f6f7074696f6e3d636f6d5f636f6e74656e7426766965773d63617465676f72792669643d32223b7d);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_finder_links_terms`
--

CREATE TABLE `bol96_finder_links_terms` (
  `link_id` int(10) UNSIGNED NOT NULL,
  `term_id` int(10) UNSIGNED NOT NULL,
  `weight` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bol96_finder_links_terms`
--

INSERT INTO `bol96_finder_links_terms` (`link_id`, `term_id`, `weight`) VALUES
(1, 1, 0.17),
(1, 2, 2.71321);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_finder_logging`
--

CREATE TABLE `bol96_finder_logging` (
  `searchterm` varchar(255) NOT NULL DEFAULT '',
  `md5sum` varchar(32) NOT NULL DEFAULT '',
  `query` blob NOT NULL,
  `hits` int(11) NOT NULL DEFAULT 1,
  `results` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_finder_taxonomy`
--

CREATE TABLE `bol96_finder_taxonomy` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `lft` int(11) NOT NULL DEFAULT 0,
  `rgt` int(11) NOT NULL DEFAULT 0,
  `level` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `path` varchar(400) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(400) NOT NULL DEFAULT '',
  `state` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `access` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `language` char(7) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bol96_finder_taxonomy`
--

INSERT INTO `bol96_finder_taxonomy` (`id`, `parent_id`, `lft`, `rgt`, `level`, `path`, `title`, `alias`, `state`, `access`, `language`) VALUES
(1, 0, 0, 9, 0, '', 'ROOT', 'root', 1, 1, '*'),
(2, 1, 1, 4, 1, 'type', 'Type', 'type', 1, 1, ''),
(3, 2, 2, 3, 2, 'type/category', 'Category', 'category', 1, 1, ''),
(4, 1, 5, 8, 1, 'language', 'Language', 'language', 1, 1, ''),
(5, 4, 6, 7, 2, 'language/faef360113599eb6a0282d981cc199d8', '*', 'faef360113599eb6a0282d981cc199d8', 1, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_finder_taxonomy_map`
--

CREATE TABLE `bol96_finder_taxonomy_map` (
  `link_id` int(10) UNSIGNED NOT NULL,
  `node_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bol96_finder_taxonomy_map`
--

INSERT INTO `bol96_finder_taxonomy_map` (`link_id`, `node_id`) VALUES
(1, 3),
(1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_finder_terms`
--

CREATE TABLE `bol96_finder_terms` (
  `term_id` int(10) UNSIGNED NOT NULL,
  `term` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `stem` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `common` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `phrase` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `weight` float UNSIGNED NOT NULL DEFAULT 0,
  `soundex` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `links` int(11) NOT NULL DEFAULT 0,
  `language` char(7) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bol96_finder_terms`
--

INSERT INTO `bol96_finder_terms` (`term_id`, `term`, `stem`, `common`, `phrase`, `weight`, `soundex`, `links`, `language`) VALUES
(1, '2', '2', 0, 0, 0.1, '', 1, '*'),
(2, 'informativa', 'informativa', 0, 0, 0.7333, 'I516531', 1, '*');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_finder_terms_common`
--

CREATE TABLE `bol96_finder_terms_common` (
  `term` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `language` char(7) NOT NULL DEFAULT '',
  `custom` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bol96_finder_terms_common`
--

INSERT INTO `bol96_finder_terms_common` (`term`, `language`, `custom`) VALUES
('a', 'en', 0),
('about', 'en', 0),
('above', 'en', 0),
('after', 'en', 0),
('again', 'en', 0),
('against', 'en', 0),
('all', 'en', 0),
('am', 'en', 0),
('an', 'en', 0),
('and', 'en', 0),
('any', 'en', 0),
('are', 'en', 0),
('aren\'t', 'en', 0),
('as', 'en', 0),
('at', 'en', 0),
('be', 'en', 0),
('because', 'en', 0),
('been', 'en', 0),
('before', 'en', 0),
('being', 'en', 0),
('below', 'en', 0),
('between', 'en', 0),
('both', 'en', 0),
('but', 'en', 0),
('by', 'en', 0),
('can\'t', 'en', 0),
('cannot', 'en', 0),
('could', 'en', 0),
('couldn\'t', 'en', 0),
('did', 'en', 0),
('didn\'t', 'en', 0),
('do', 'en', 0),
('does', 'en', 0),
('doesn\'t', 'en', 0),
('doing', 'en', 0),
('don\'t', 'en', 0),
('down', 'en', 0),
('during', 'en', 0),
('each', 'en', 0),
('few', 'en', 0),
('for', 'en', 0),
('from', 'en', 0),
('further', 'en', 0),
('had', 'en', 0),
('hadn\'t', 'en', 0),
('has', 'en', 0),
('hasn\'t', 'en', 0),
('have', 'en', 0),
('haven\'t', 'en', 0),
('having', 'en', 0),
('he', 'en', 0),
('he\'d', 'en', 0),
('he\'ll', 'en', 0),
('he\'s', 'en', 0),
('her', 'en', 0),
('here', 'en', 0),
('here\'s', 'en', 0),
('hers', 'en', 0),
('herself', 'en', 0),
('him', 'en', 0),
('himself', 'en', 0),
('his', 'en', 0),
('how', 'en', 0),
('how\'s', 'en', 0),
('i', 'en', 0),
('i\'d', 'en', 0),
('i\'ll', 'en', 0),
('i\'m', 'en', 0),
('i\'ve', 'en', 0),
('if', 'en', 0),
('in', 'en', 0),
('into', 'en', 0),
('is', 'en', 0),
('isn\'t', 'en', 0),
('it', 'en', 0),
('it\'s', 'en', 0),
('its', 'en', 0),
('itself', 'en', 0),
('let\'s', 'en', 0),
('me', 'en', 0),
('more', 'en', 0),
('most', 'en', 0),
('mustn\'t', 'en', 0),
('my', 'en', 0),
('myself', 'en', 0),
('no', 'en', 0),
('nor', 'en', 0),
('not', 'en', 0),
('of', 'en', 0),
('off', 'en', 0),
('on', 'en', 0),
('once', 'en', 0),
('only', 'en', 0),
('or', 'en', 0),
('other', 'en', 0),
('ought', 'en', 0),
('our', 'en', 0),
('ours', 'en', 0),
('ourselves', 'en', 0),
('out', 'en', 0),
('over', 'en', 0),
('own', 'en', 0),
('same', 'en', 0),
('shan\'t', 'en', 0),
('she', 'en', 0),
('she\'d', 'en', 0),
('she\'ll', 'en', 0),
('she\'s', 'en', 0),
('should', 'en', 0),
('shouldn\'t', 'en', 0),
('so', 'en', 0),
('some', 'en', 0),
('such', 'en', 0),
('than', 'en', 0),
('that', 'en', 0),
('that\'s', 'en', 0),
('the', 'en', 0),
('their', 'en', 0),
('theirs', 'en', 0),
('them', 'en', 0),
('themselves', 'en', 0),
('then', 'en', 0),
('there', 'en', 0),
('there\'s', 'en', 0),
('these', 'en', 0),
('they', 'en', 0),
('they\'d', 'en', 0),
('they\'ll', 'en', 0),
('they\'re', 'en', 0),
('they\'ve', 'en', 0),
('this', 'en', 0),
('those', 'en', 0),
('through', 'en', 0),
('to', 'en', 0),
('too', 'en', 0),
('under', 'en', 0),
('until', 'en', 0),
('up', 'en', 0),
('very', 'en', 0),
('was', 'en', 0),
('wasn\'t', 'en', 0),
('we', 'en', 0),
('we\'d', 'en', 0),
('we\'ll', 'en', 0),
('we\'re', 'en', 0),
('we\'ve', 'en', 0),
('were', 'en', 0),
('weren\'t', 'en', 0),
('what', 'en', 0),
('what\'s', 'en', 0),
('when', 'en', 0),
('when\'s', 'en', 0),
('where', 'en', 0),
('where\'s', 'en', 0),
('which', 'en', 0),
('while', 'en', 0),
('who', 'en', 0),
('who\'s', 'en', 0),
('whom', 'en', 0),
('why', 'en', 0),
('why\'s', 'en', 0),
('with', 'en', 0),
('won\'t', 'en', 0),
('would', 'en', 0),
('wouldn\'t', 'en', 0),
('you', 'en', 0),
('you\'d', 'en', 0),
('you\'ll', 'en', 0),
('you\'re', 'en', 0),
('you\'ve', 'en', 0),
('your', 'en', 0),
('yours', 'en', 0),
('yourself', 'en', 0),
('yourselves', 'en', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_finder_tokens`
--

CREATE TABLE `bol96_finder_tokens` (
  `term` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `stem` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `common` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `phrase` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `weight` float UNSIGNED NOT NULL DEFAULT 1,
  `context` tinyint(3) UNSIGNED NOT NULL DEFAULT 2,
  `language` char(7) NOT NULL DEFAULT ''
) ENGINE=MEMORY DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_finder_tokens_aggregate`
--

CREATE TABLE `bol96_finder_tokens_aggregate` (
  `term_id` int(10) UNSIGNED NOT NULL,
  `term` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `stem` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `common` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `phrase` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `term_weight` float UNSIGNED NOT NULL DEFAULT 0,
  `context` tinyint(3) UNSIGNED NOT NULL DEFAULT 2,
  `context_weight` float UNSIGNED NOT NULL DEFAULT 0,
  `total_weight` float UNSIGNED NOT NULL DEFAULT 0,
  `language` char(7) NOT NULL DEFAULT ''
) ENGINE=MEMORY DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_finder_types`
--

CREATE TABLE `bol96_finder_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `mime` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bol96_finder_types`
--

INSERT INTO `bol96_finder_types` (`id`, `title`, `mime`) VALUES
(1, 'Category', ''),
(2, 'Contact', ''),
(3, 'Article', ''),
(4, 'News Feed', ''),
(5, 'Tag', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_guidedtours`
--

CREATE TABLE `bol96_guidedtours` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT 0,
  `extensions` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL DEFAULT 0,
  `checked_out_time` datetime DEFAULT NULL,
  `checked_out` int(10) UNSIGNED DEFAULT NULL,
  `published` tinyint(4) NOT NULL DEFAULT 0,
  `language` varchar(7) NOT NULL,
  `note` varchar(255) NOT NULL DEFAULT '',
  `access` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bol96_guidedtours`
--

INSERT INTO `bol96_guidedtours` (`id`, `title`, `description`, `ordering`, `extensions`, `url`, `created`, `created_by`, `modified`, `modified_by`, `checked_out_time`, `checked_out`, `published`, `language`, `note`, `access`) VALUES
(1, 'COM_GUIDEDTOURS_TOUR_GUIDEDTOURS_TITLE', 'COM_GUIDEDTOURS_TOUR_GUIDEDTOURS_DESCRIPTION', 1, '[\"com_guidedtours\"]', 'administrator/index.php?option=com_guidedtours&view=tours', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, 1, '*', '', 1),
(2, 'COM_GUIDEDTOURS_TOUR_GUIDEDTOURSTEPS_TITLE', 'COM_GUIDEDTOURS_TOUR_GUIDEDTOURSTEPS_DESCRIPTION', 2, '[\"com_guidedtours\"]', 'administrator/index.php?option=com_guidedtours&view=tours', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, 1, '*', '', 1),
(3, 'COM_GUIDEDTOURS_TOUR_ARTICLES_TITLE', 'COM_GUIDEDTOURS_TOUR_ARTICLES_DESCRIPTION', 3, '[\"*\"]', 'administrator/index.php?option=com_content&view=articles', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, 1, '*', '', 1),
(4, 'COM_GUIDEDTOURS_TOUR_CATEGORIES_TITLE', 'COM_GUIDEDTOURS_TOUR_CATEGORIES_DESCRIPTION', 4, '[\"*\"]', 'administrator/index.php?option=com_categories&view=categories&extension=com_content', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, 1, '*', '', 1),
(5, 'COM_GUIDEDTOURS_TOUR_MENUS_TITLE', 'COM_GUIDEDTOURS_TOUR_MENUS_DESCRIPTION', 5, '[\"*\"]', 'administrator/index.php?option=com_menus&view=menus', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, 1, '*', '', 1),
(6, 'COM_GUIDEDTOURS_TOUR_TAGS_TITLE', 'COM_GUIDEDTOURS_TOUR_TAGS_DESCRIPTION', 6, '[\"*\"]', 'administrator/index.php?option=com_tags&view=tags', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, 1, '*', '', 1),
(7, 'COM_GUIDEDTOURS_TOUR_BANNERS_TITLE', 'COM_GUIDEDTOURS_TOUR_BANNERS_DESCRIPTION', 7, '[\"*\"]', 'administrator/index.php?option=com_banners&view=banners', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, 1, '*', '', 1),
(8, 'COM_GUIDEDTOURS_TOUR_CONTACTS_TITLE', 'COM_GUIDEDTOURS_TOUR_CONTACTS_DESCRIPTION', 8, '[\"*\"]', 'administrator/index.php?option=com_contact&view=contacts', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, 1, '*', '', 1),
(9, 'COM_GUIDEDTOURS_TOUR_NEWSFEEDS_TITLE', 'COM_GUIDEDTOURS_TOUR_NEWSFEEDS_DESCRIPTION', 9, '[\"*\"]', 'administrator/index.php?option=com_newsfeeds&view=newsfeeds', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, 1, '*', '', 1),
(10, 'COM_GUIDEDTOURS_TOUR_SMARTSEARCH_TITLE', 'COM_GUIDEDTOURS_TOUR_SMARTSEARCH_DESCRIPTION', 10, '[\"*\"]', 'administrator/index.php?option=com_finder&view=filters', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, 1, '*', '', 1),
(11, 'COM_GUIDEDTOURS_TOUR_USERS_TITLE', 'COM_GUIDEDTOURS_TOUR_USERS_DESCRIPTION', 11, '[\"*\"]', 'administrator/index.php?option=com_users&view=users', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, 1, '*', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_guidedtour_steps`
--

CREATE TABLE `bol96_guidedtour_steps` (
  `id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL DEFAULT 0,
  `title` varchar(255) NOT NULL,
  `published` tinyint(4) NOT NULL DEFAULT 0,
  `description` text NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT 0,
  `position` varchar(255) NOT NULL,
  `target` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `interactive_type` int(11) NOT NULL DEFAULT 1,
  `url` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `modified` datetime NOT NULL,
  `modified_by` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `checked_out_time` datetime DEFAULT NULL,
  `checked_out` int(10) UNSIGNED DEFAULT NULL,
  `language` varchar(7) NOT NULL,
  `note` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bol96_guidedtour_steps`
--

INSERT INTO `bol96_guidedtour_steps` (`id`, `tour_id`, `title`, `published`, `description`, `ordering`, `position`, `target`, `type`, `interactive_type`, `url`, `created`, `created_by`, `modified`, `modified_by`, `checked_out_time`, `checked_out`, `language`, `note`) VALUES
(1, 1, 'COM_GUIDEDTOURS_TOUR_GUIDEDTOURS_STEP_NEW_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_GUIDEDTOURS_STEP_NEW_DESCRIPTION', 1, 'bottom', '.button-new', 2, 1, 'administrator/index.php?option=com_guidedtours&view=tours', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(2, 1, 'COM_GUIDEDTOURS_TOUR_GUIDEDTOURS_STEP_TITLE_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_GUIDEDTOURS_STEP_TITLE_DESCRIPTION', 2, 'bottom', '#jform_title', 2, 2, 'administrator/index.php?option=com_guidedtours&view=tour&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(3, 1, 'COM_GUIDEDTOURS_TOUR_GUIDEDTOURS_STEP_URL_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_GUIDEDTOURS_STEP_URL_DESCRIPTION', 3, 'top', '#jform_url', 2, 2, 'administrator/index.php?option=com_guidedtours&view=tour&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(4, 1, 'COM_GUIDEDTOURS_TOUR_GUIDEDTOURS_STEP_CONTENT_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_GUIDEDTOURS_STEP_CONTENT_DESCRIPTION', 4, 'bottom', '#jform_description,#jform_description_ifr', 2, 3, 'administrator/index.php?option=com_guidedtours&view=tour&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(5, 1, 'COM_GUIDEDTOURS_TOUR_GUIDEDTOURS_STEP_COMPONENT_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_GUIDEDTOURS_STEP_COMPONENT_DESCRIPTION', 5, 'top', 'joomla-field-fancy-select .choices', 2, 3, 'administrator/index.php?option=com_guidedtours&view=tour&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(6, 1, 'COM_GUIDEDTOURS_TOUR_GUIDEDTOURS_STEP_SAVECLOSE_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_GUIDEDTOURS_STEP_SAVECLOSE_DESCRIPTION', 6, 'top', '#save-group-children-save .button-save', 2, 1, 'administrator/index.php?option=com_guidedtours&view=tour&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(7, 1, 'COM_GUIDEDTOURS_TOUR_GUIDEDTOURS_STEP_CONGRATULATIONS_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_GUIDEDTOURS_STEP_CONGRATULATIONS_DESCRIPTION', 7, 'bottom', '', 0, 1, 'administrator/index.php?option=com_guidedtours&view=tour&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(8, 2, 'COM_GUIDEDTOURS_TOUR_GUIDEDTOURSTEPS_STEP_COUNTER_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_GUIDEDTOURSTEPS_STEP_COUNTER_DESCRIPTION', 8, 'top', '#toursList tbody tr:nth-last-of-type(1) td:nth-of-type(5) .btn', 2, 1, '', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(9, 2, 'COM_GUIDEDTOURS_TOUR_GUIDEDTOURSTEPS_STEP_NEW_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_GUIDEDTOURSTEPS_STEP_NEW_DESCRIPTION', 9, 'bottom', '.button-new', 2, 1, '', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(10, 2, 'COM_GUIDEDTOURS_TOUR_GUIDEDTOURSTEPS_STEP_TITLE_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_GUIDEDTOURSTEPS_STEP_TITLE_DESCRIPTION', 10, 'bottom', '#jform_title', 2, 2, '', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(11, 2, 'COM_GUIDEDTOURS_TOUR_GUIDEDTOURSTEPS_STEP_DESCRIPTION_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_GUIDEDTOURSTEPS_STEP_DESCRIPTION_DESCRIPTION', 11, 'bottom', '#jform_description,#jform_description_ifr', 2, 3, '', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(12, 2, 'COM_GUIDEDTOURS_TOUR_GUIDEDTOURSTEPS_STEP_STATUS_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_GUIDEDTOURSTEPS_STEP_STATUS_DESCRIPTION', 12, 'bottom', '#jform_published', 2, 3, '', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(13, 2, 'COM_GUIDEDTOURS_TOUR_GUIDEDTOURSTEPS_STEP_POSITION_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_GUIDEDTOURSTEPS_STEP_POSITION_DESCRIPTION', 13, 'top', '#jform_position', 2, 3, '', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(14, 2, 'COM_GUIDEDTOURS_TOUR_GUIDEDTOURSTEPS_STEP_TARGET_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_GUIDEDTOURSTEPS_STEP_TARGET_DESCRIPTION', 14, 'top', '#jform_target', 2, 3, '', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(15, 2, 'COM_GUIDEDTOURS_TOUR_GUIDEDTOURSTEPS_STEP_TYPE_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_GUIDEDTOURSTEPS_STEP_TYPE_DESCRIPTION', 15, 'top', '#jform_type', 2, 3, '', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(16, 2, 'COM_GUIDEDTOURS_TOUR_GUIDEDTOURSTEPS_STEP_SAVECLOSE_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_GUIDEDTOURSTEPS_STEP_SAVECLOSE_DESCRIPTION', 16, 'bottom', '#save-group-children-save .button-save', 2, 1, '', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(17, 2, 'COM_GUIDEDTOURS_TOUR_GUIDEDTOURSTEPS_STEP_CONGRATULATIONS_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_GUIDEDTOURSTEPS_STEP_CONGRATULATIONS_DESCRIPTION', 17, 'bottom', '', 0, 1, '', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(18, 3, 'COM_GUIDEDTOURS_TOUR_ARTICLES_STEP_NEW_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_ARTICLES_STEP_NEW_DESCRIPTION', 18, 'bottom', '.button-new', 2, 1, 'administrator/index.php?option=com_content&view=articles', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(19, 3, 'COM_GUIDEDTOURS_TOUR_ARTICLES_STEP_TITLE_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_ARTICLES_STEP_TITLE_DESCRIPTION', 19, 'bottom', '#jform_title', 2, 2, 'administrator/index.php?option=com_content&view=article&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(20, 3, 'COM_GUIDEDTOURS_TOUR_ARTICLES_STEP_ALIAS_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_ARTICLES_STEP_ALIAS_DESCRIPTION', 20, 'bottom', '#jform_alias', 2, 2, 'administrator/index.php?option=com_content&view=article&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(21, 3, 'COM_GUIDEDTOURS_TOUR_ARTICLES_STEP_CONTENT_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_ARTICLES_STEP_CONTENT_DESCRIPTION', 21, 'bottom', '#jform_articletext,#jform_articletext_ifr', 2, 3, 'administrator/index.php?option=com_content&view=article&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(22, 3, 'COM_GUIDEDTOURS_TOUR_ARTICLES_STEP_STATUS_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_ARTICLES_STEP_STATUS_DESCRIPTION', 22, 'bottom', '#jform_state', 2, 3, 'administrator/index.php?option=com_content&view=article&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(23, 3, 'COM_GUIDEDTOURS_TOUR_ARTICLES_STEP_CATEGORY_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_ARTICLES_STEP_CATEGORY_DESCRIPTION', 23, 'top', 'joomla-field-fancy-select .choices[data-type=select-one]', 2, 3, 'administrator/index.php?option=com_content&view=article&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(24, 3, 'COM_GUIDEDTOURS_TOUR_ARTICLES_STEP_FEATURED_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_ARTICLES_STEP_FEATURED_DESCRIPTION', 24, 'bottom', '#jform_featured0', 2, 3, 'administrator/index.php?option=com_content&view=article&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(25, 3, 'COM_GUIDEDTOURS_TOUR_ARTICLES_STEP_ACCESS_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_ARTICLES_STEP_ACCESS_DESCRIPTION', 25, 'bottom', '#jform_access', 2, 3, 'administrator/index.php?option=com_content&view=article&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(26, 3, 'COM_GUIDEDTOURS_TOUR_ARTICLES_STEP_TAGS_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_ARTICLES_STEP_TAGS_DESCRIPTION', 26, 'top', 'joomla-field-fancy-select .choices[data-type=select-multiple]', 2, 3, 'administrator/index.php?option=com_content&view=article&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(27, 3, 'COM_GUIDEDTOURS_TOUR_ARTICLES_STEP_NOTE_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_ARTICLES_STEP_NOTE_DESCRIPTION', 27, 'top', '#jform_note', 2, 2, 'administrator/index.php?option=com_content&view=article&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(28, 3, 'COM_GUIDEDTOURS_TOUR_ARTICLES_STEP_VERSIONNOTE_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_ARTICLES_STEP_VERSIONNOTE_DESCRIPTION', 28, 'top', '#jform_version_note', 2, 2, 'administrator/index.php?option=com_content&view=article&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(29, 3, 'COM_GUIDEDTOURS_TOUR_ARTICLES_STEP_SAVECLOSE_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_ARTICLES_STEP_SAVECLOSE_DESCRIPTION', 29, 'bottom', '#save-group-children-save .button-save', 2, 1, 'administrator/index.php?option=com_content&view=article&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(30, 3, 'COM_GUIDEDTOURS_TOUR_ARTICLES_STEP_CONGRATULATIONS_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_ARTICLES_STEP_CONGRATULATIONS_DESCRIPTION', 30, 'bottom', '', 0, 1, 'administrator/index.php?option=com_content&view=article&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(31, 4, 'COM_GUIDEDTOURS_TOUR_CATEGORIES_STEP_NEW_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_CATEGORIES_STEP_NEW_DESCRIPTION', 31, 'bottom', '.button-new', 2, 1, 'administrator/index.php?option=com_categories&view=categories&extension=com_content', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(32, 4, 'COM_GUIDEDTOURS_TOUR_CATEGORIES_STEP_TITLE_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_CATEGORIES_STEP_TITLE_DESCRIPTION', 32, 'bottom', '#jform_title', 2, 2, 'administrator/index.php?option=com_categories&view=category&layout=edit&extension=com_content', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(33, 4, 'COM_GUIDEDTOURS_TOUR_CATEGORIES_STEP_ALIAS_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_CATEGORIES_STEP_ALIAS_DESCRIPTION', 33, 'bottom', '#jform_alias', 2, 2, 'administrator/index.php?option=com_categories&view=category&layout=edit&extension=com_content', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(34, 4, 'COM_GUIDEDTOURS_TOUR_CATEGORIES_STEP_CONTENT_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_CATEGORIES_STEP_CONTENT_DESCRIPTION', 34, 'bottom', '#jform_description,#jform_description_ifr', 2, 3, 'administrator/index.php?option=com_categories&view=category&layout=edit&extension=com_content', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(35, 4, 'COM_GUIDEDTOURS_TOUR_CATEGORIES_STEP_PARENT_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_CATEGORIES_STEP_PARENT_DESCRIPTION', 35, 'top', 'joomla-field-fancy-select .choices[data-type=select-one]', 2, 3, 'administrator/index.php?option=com_categories&view=category&layout=edit&extension=com_content', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(36, 4, 'COM_GUIDEDTOURS_TOUR_CATEGORIES_STEP_STATUS_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_CATEGORIES_STEP_STATUS_DESCRIPTION', 36, 'bottom', '#jform_published', 2, 3, 'administrator/index.php?option=com_categories&view=category&layout=edit&extension=com_content', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(37, 4, 'COM_GUIDEDTOURS_TOUR_CATEGORIES_STEP_ACCESS_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_CATEGORIES_STEP_ACCESS_DESCRIPTION', 37, 'bottom', '#jform_access', 2, 3, 'administrator/index.php?option=com_categories&view=category&layout=edit&extension=com_content', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(38, 4, 'COM_GUIDEDTOURS_TOUR_CATEGORIES_STEP_TAGS_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_CATEGORIES_STEP_TAGS_DESCRIPTION', 38, 'top', 'joomla-field-fancy-select .choices[data-type=select-multiple]', 2, 3, 'administrator/index.php?option=com_categories&view=category&layout=edit&extension=com_content', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(39, 4, 'COM_GUIDEDTOURS_TOUR_CATEGORIES_STEP_NOTE_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_CATEGORIES_STEP_NOTE_DESCRIPTION', 39, 'top', '#jform_note', 2, 2, 'administrator/index.php?option=com_categories&view=category&layout=edit&extension=com_content', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(40, 4, 'COM_GUIDEDTOURS_TOUR_CATEGORIES_STEP_VERSIONNOTE_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_CATEGORIES_STEP_VERSIONNOTE_DESCRIPTION', 40, 'top', '#jform_version_note', 2, 2, 'administrator/index.php?option=com_categories&view=category&layout=edit&extension=com_content', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(41, 4, 'COM_GUIDEDTOURS_TOUR_CATEGORIES_STEP_SAVECLOSE_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_CATEGORIES_STEP_SAVECLOSE_DESCRIPTION', 41, 'bottom', '#save-group-children-save .button-save', 2, 1, 'administrator/index.php?option=com_categories&view=category&layout=edit&extension=com_content', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(42, 4, 'COM_GUIDEDTOURS_TOUR_CATEGORIES_STEP_CONGRATULATIONS_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_CATEGORIES_STEP_CONGRATULATIONS_DESCRIPTION', 42, 'bottom', '', 0, 1, 'administrator/index.php?option=com_categories&view=category&layout=edit&extension=com_content', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(43, 5, 'COM_GUIDEDTOURS_TOUR_MENUS_STEP_NEW_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_MENUS_STEP_NEW_DESCRIPTION', 43, 'bottom', '.button-new', 2, 1, 'administrator/index.php?option=com_menus&view=menus', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(44, 5, 'COM_GUIDEDTOURS_TOUR_MENUS_STEP_TITLE_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_MENUS_STEP_TITLE_DESCRIPTION', 44, 'bottom', '#jform_title', 2, 2, 'administrator/index.php?option=com_menus&view=menu&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(45, 5, 'COM_GUIDEDTOURS_TOUR_MENUS_STEP_UNIQUENAME_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_MENUS_STEP_UNIQUENAME_DESCRIPTION', 45, 'top', '#jform_menutype', 2, 2, 'administrator/index.php?option=com_menus&view=menu&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(46, 5, 'COM_GUIDEDTOURS_TOUR_MENUS_STEP_DESCRIPTION_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_MENUS_STEP_DESCRIPTION_DESCRIPTION', 46, 'top', '#jform_menudescription', 2, 2, 'administrator/index.php?option=com_menus&view=menu&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(47, 5, 'COM_GUIDEDTOURS_TOUR_MENUS_STEP_SAVECLOSE_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_MENUS_STEP_SAVECLOSE_DESCRIPTION', 47, 'bottom', '#save-group-children-save .button-save', 2, 1, 'administrator/index.php?option=com_menus&view=menu&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(48, 5, 'COM_GUIDEDTOURS_TOUR_MENUS_STEP_CONGRATULATIONS_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_MENUS_STEP_CONGRATULATIONS_DESCRIPTION', 48, 'bottom', '', 0, 1, 'administrator/index.php?option=com_menus&view=menu&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(49, 6, 'COM_GUIDEDTOURS_TOUR_TAGS_STEP_NEW_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_TAGS_STEP_NEW_DESCRIPTION', 49, 'bottom', '.button-new', 2, 1, 'administrator/index.php?option=com_tags&view=tags', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(50, 6, 'COM_GUIDEDTOURS_TOUR_TAGS_STEP_TITLE_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_TAGS_STEP_TITLE_DESCRIPTION', 50, 'bottom', '#jform_title', 2, 2, 'administrator/index.php?option=com_tags&view=tag&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(51, 6, 'COM_GUIDEDTOURS_TOUR_TAGS_STEP_ALIAS_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_TAGS_STEP_ALIAS_DESCRIPTION', 51, 'bottom', '#jform_alias', 2, 2, 'administrator/index.php?option=com_tags&view=tag&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(52, 6, 'COM_GUIDEDTOURS_TOUR_TAGS_STEP_CONTENT_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_TAGS_STEP_CONTENT_DESCRIPTION', 52, 'bottom', '#jform_description,#jform_description_ifr', 2, 3, 'administrator/index.php?option=com_tags&view=tag&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(53, 6, 'COM_GUIDEDTOURS_TOUR_TAGS_STEP_PARENT_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_TAGS_STEP_PARENT_DESCRIPTION', 53, 'top', 'joomla-field-fancy-select .choices[data-type=select-one]', 2, 3, 'administrator/index.php?option=com_tags&view=tag&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(54, 6, 'COM_GUIDEDTOURS_TOUR_TAGS_STEP_STATUS_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_TAGS_STEP_STATUS_DESCRIPTION', 54, 'bottom', '#jform_published', 2, 3, 'administrator/index.php?option=com_tags&view=tag&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(55, 6, 'COM_GUIDEDTOURS_TOUR_TAGS_STEP_ACCESS_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_TAGS_STEP_ACCESS_DESCRIPTION', 55, 'bottom', '#jform_access', 2, 3, 'administrator/index.php?option=com_tags&view=tag&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(56, 6, 'COM_GUIDEDTOURS_TOUR_TAGS_STEP_NOTE_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_TAGS_STEP_NOTE_DESCRIPTION', 56, 'top', '#jform_note', 2, 2, 'administrator/index.php?option=com_tags&view=tag&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(57, 6, 'COM_GUIDEDTOURS_TOUR_TAGS_STEP_VERSIONNOTE_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_TAGS_STEP_VERSIONNOTE_DESCRIPTION', 57, 'top', '#jform_version_note', 2, 2, 'administrator/index.php?option=com_tags&view=tag&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(58, 6, 'COM_GUIDEDTOURS_TOUR_TAGS_STEP_SAVECLOSE_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_TAGS_STEP_SAVECLOSE_DESCRIPTION', 58, 'bottom', '#save-group-children-save .button-save', 2, 1, 'administrator/index.php?option=com_tags&view=tag&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(59, 6, 'COM_GUIDEDTOURS_TOUR_TAGS_STEP_CONGRATULATIONS_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_TAGS_STEP_CONGRATULATIONS_DESCRIPTION', 59, 'bottom', '', 0, 1, 'administrator/index.php?option=com_tags&view=tag&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(60, 7, 'COM_GUIDEDTOURS_TOUR_BANNERS_STEP_NEW_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_BANNERS_STEP_NEW_DESCRIPTION', 60, 'bottom', '.button-new', 2, 1, 'administrator/index.php?option=com_banners&view=banners', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(61, 7, 'COM_GUIDEDTOURS_TOUR_BANNERS_STEP_TITLE_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_BANNERS_STEP_TITLE_DESCRIPTION', 61, 'bottom', '#jform_name', 2, 2, 'administrator/index.php?option=com_banners&view=banner&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(62, 7, 'COM_GUIDEDTOURS_TOUR_BANNERS_STEP_ALIAS_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_BANNERS_STEP_ALIAS_DESCRIPTION', 62, 'bottom', '#jform_alias', 2, 2, 'administrator/index.php?option=com_banners&view=banner&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(63, 7, 'COM_GUIDEDTOURS_TOUR_BANNERS_STEP_DETAILS_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_BANNERS_STEP_DETAILS_DESCRIPTION', 63, 'bottom', '.col-lg-9', 2, 3, 'administrator/index.php?option=com_banners&view=banner&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(64, 7, 'COM_GUIDEDTOURS_TOUR_BANNERS_STEP_STATUS_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_BANNERS_STEP_STATUS_DESCRIPTION', 64, 'bottom', '#jform_state', 2, 3, 'administrator/index.php?option=com_banners&view=banner&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(65, 7, 'COM_GUIDEDTOURS_TOUR_BANNERS_STEP_CATEGORY_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_BANNERS_STEP_CATEGORY_DESCRIPTION', 65, 'top', 'joomla-field-fancy-select .choices[data-type=select-one]', 2, 3, 'administrator/index.php?option=com_banners&view=banner&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(66, 7, 'COM_GUIDEDTOURS_TOUR_BANNERS_STEP_PINNED_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_BANNERS_STEP_PINNED_DESCRIPTION', 66, 'bottom', '#jform_sticky1', 2, 3, 'administrator/index.php?option=com_banners&view=banner&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(67, 7, 'COM_GUIDEDTOURS_TOUR_BANNERS_STEP_VERSIONNOTE_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_BANNERS_STEP_VERSIONNOTE_DESCRIPTION', 67, 'top', '#jform_version_note', 2, 2, 'administrator/index.php?option=com_banners&view=banner&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(68, 7, 'COM_GUIDEDTOURS_TOUR_BANNERS_STEP_SAVECLOSE_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_BANNERS_STEP_SAVECLOSE_DESCRIPTION', 68, 'bottom', '#save-group-children-save .button-save', 2, 1, 'administrator/index.php?option=com_banners&view=banner&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(69, 7, 'COM_GUIDEDTOURS_TOUR_BANNERS_STEP_CONGRATULATIONS_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_BANNERS_STEP_CONGRATULATIONS_DESCRIPTION', 69, 'bottom', '', 0, 1, 'administrator/index.php?option=com_banners&view=banner&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(70, 8, 'COM_GUIDEDTOURS_TOUR_CONTACTS_STEP_NEW_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_CONTACTS_STEP_NEW_DESCRIPTION', 70, 'bottom', '.button-new', 2, 1, 'administrator/index.php?option=com_contact&view=contacts', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(71, 8, 'COM_GUIDEDTOURS_TOUR_CONTACTS_STEP_TITLE_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_CONTACTS_STEP_TITLE_DESCRIPTION', 71, 'bottom', '#jform_name', 2, 2, 'administrator/index.php?option=com_contact&view=contact&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(72, 8, 'COM_GUIDEDTOURS_TOUR_CONTACTS_STEP_ALIAS_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_CONTACTS_STEP_ALIAS_DESCRIPTION', 72, 'bottom', '#jform_alias', 2, 2, 'administrator/index.php?option=com_contact&view=contact&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(73, 8, 'COM_GUIDEDTOURS_TOUR_CONTACTS_STEP_DETAILS_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_CONTACTS_STEP_DETAILS_DESCRIPTION', 73, 'bottom', '.col-lg-9', 0, 1, 'administrator/index.php?option=com_contact&view=contact&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(74, 8, 'COM_GUIDEDTOURS_TOUR_CONTACTS_STEP_STATUS_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_CONTACTS_STEP_STATUS_DESCRIPTION', 74, 'bottom', '#jform_published', 2, 3, 'administrator/index.php?option=com_contact&view=contact&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(75, 8, 'COM_GUIDEDTOURS_TOUR_CONTACTS_STEP_CATEGORY_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_CONTACTS_STEP_CATEGORY_DESCRIPTION', 75, 'top', 'joomla-field-fancy-select .choices[data-type=select-one]', 2, 3, 'administrator/index.php?option=com_contact&view=contact&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(76, 8, 'COM_GUIDEDTOURS_TOUR_CONTACTS_STEP_FEATURED_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_CONTACTS_STEP_FEATURED_DESCRIPTION', 76, 'bottom', '#jform_featured0', 2, 3, 'administrator/index.php?option=com_contact&view=contact&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(77, 8, 'COM_GUIDEDTOURS_TOUR_CONTACTS_STEP_ACCESS_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_CONTACTS_STEP_ACCESS_DESCRIPTION', 77, 'bottom', '#jform_access', 2, 3, 'administrator/index.php?option=com_contact&view=contact&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(78, 8, 'COM_GUIDEDTOURS_TOUR_CONTACTS_STEP_TAGS_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_CONTACTS_STEP_TAGS_DESCRIPTION', 78, 'top', 'joomla-field-fancy-select .choices[data-type=select-multiple]', 2, 3, 'administrator/index.php?option=com_contact&view=contact&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(79, 8, 'COM_GUIDEDTOURS_TOUR_CONTACTS_STEP_VERSIONNOTE_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_CONTACTS_STEP_VERSIONNOTE_DESCRIPTION', 79, 'top', '#jform_version_note', 2, 2, 'administrator/index.php?option=com_contact&view=contact&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(80, 8, 'COM_GUIDEDTOURS_TOUR_CONTACTS_STEP_SAVECLOSE_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_CONTACTS_STEP_SAVECLOSE_DESCRIPTION', 80, 'bottom', '#save-group-children-save .button-save', 2, 1, 'administrator/index.php?option=com_contact&view=contact&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(81, 8, 'COM_GUIDEDTOURS_TOUR_CONTACTS_STEP_CONGRATULATIONS_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_CONTACTS_STEP_CONGRATULATIONS_DESCRIPTION', 81, 'bottom', '', 0, 1, 'administrator/index.php?option=com_contact&view=contact&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(82, 9, 'COM_GUIDEDTOURS_TOUR_NEWSFEEDS_STEP_NEW_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_NEWSFEEDS_STEP_NEW_DESCRIPTION', 82, 'bottom', '.button-new', 2, 1, 'administrator/index.php?option=com_newsfeeds&view=newsfeeds', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(83, 9, 'COM_GUIDEDTOURS_TOUR_NEWSFEEDS_STEP_TITLE_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_NEWSFEEDS_STEP_TITLE_DESCRIPTION', 83, 'bottom', '#jform_name', 2, 2, 'administrator/index.php?option=com_newsfeeds&view=newsfeed&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(84, 9, 'COM_GUIDEDTOURS_TOUR_NEWSFEEDS_STEP_ALIAS_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_NEWSFEEDS_STEP_ALIAS_DESCRIPTION', 84, 'bottom', '#jform_alias', 2, 2, 'administrator/index.php?option=com_newsfeeds&view=newsfeed&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(85, 9, 'COM_GUIDEDTOURS_TOUR_NEWSFEEDS_STEP_LINK_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_NEWSFEEDS_STEP_LINK_DESCRIPTION', 85, 'bottom', '#jform_link', 2, 2, 'administrator/index.php?option=com_newsfeeds&view=newsfeed&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(86, 9, 'COM_GUIDEDTOURS_TOUR_NEWSFEEDS_STEP_DESCRIPTION_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_NEWSFEEDS_STEP_DESCRIPTION_DESCRIPTION', 86, 'bottom', '#jform_description,#jform_description_ifr', 2, 3, 'administrator/index.php?option=com_newsfeeds&view=newsfeed&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(87, 9, 'COM_GUIDEDTOURS_TOUR_NEWSFEEDS_STEP_STATUS_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_NEWSFEEDS_STEP_STATUS_DESCRIPTION', 87, 'bottom', '#jform_published', 2, 3, 'administrator/index.php?option=com_newsfeeds&view=newsfeed&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(88, 9, 'COM_GUIDEDTOURS_TOUR_NEWSFEEDS_STEP_CATEGORY_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_NEWSFEEDS_STEP_CATEGORY_DESCRIPTION', 88, 'top', 'joomla-field-fancy-select .choices[data-type=select-one]', 2, 3, 'administrator/index.php?option=com_newsfeeds&view=newsfeed&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(89, 9, 'COM_GUIDEDTOURS_TOUR_NEWSFEEDS_STEP_ACCESS_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_NEWSFEEDS_STEP_ACCESS_DESCRIPTION', 89, 'bottom', '#jform_access', 2, 3, 'administrator/index.php?option=com_newsfeeds&view=newsfeed&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(90, 9, 'COM_GUIDEDTOURS_TOUR_NEWSFEEDS_STEP_TAGS_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_NEWSFEEDS_STEP_TAGS_DESCRIPTION', 90, 'top', 'joomla-field-fancy-select .choices[data-type=select-multiple]', 2, 3, 'administrator/index.php?option=com_newsfeeds&view=newsfeed&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(91, 9, 'COM_GUIDEDTOURS_TOUR_NEWSFEEDS_STEP_VERSIONNOTE_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_NEWSFEEDS_STEP_VERSIONNOTE_DESCRIPTION', 91, 'top', '#jform_version_note', 2, 2, 'administrator/index.php?option=com_newsfeeds&view=newsfeed&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(92, 9, 'COM_GUIDEDTOURS_TOUR_NEWSFEEDS_STEP_SAVECLOSE_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_NEWSFEEDS_STEP_SAVECLOSE_DESCRIPTION', 92, 'bottom', '#save-group-children-save .button-save', 2, 1, 'administrator/index.php?option=com_newsfeeds&view=newsfeed&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(93, 9, 'COM_GUIDEDTOURS_TOUR_NEWSFEEDS_STEP_CONGRATULATIONS_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_NEWSFEEDS_STEP_CONGRATULATIONS_DESCRIPTION', 93, 'bottom', '', 0, 1, 'administrator/index.php?option=com_newsfeeds&view=newsfeed&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(94, 10, 'COM_GUIDEDTOURS_TOUR_SMARTSEARCH_STEP_NEW_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_SMARTSEARCH_STEP_NEW_DESCRIPTION', 94, 'bottom', '.button-new', 2, 1, 'administrator/index.php?option=com_finder&view=filters', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(95, 10, 'COM_GUIDEDTOURS_TOUR_SMARTSEARCH_STEP_TITLE_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_SMARTSEARCH_STEP_TITLE_DESCRIPTION', 95, 'bottom', '#jform_title', 2, 2, 'administrator/index.php?option=com_finder&view=filter&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(96, 10, 'COM_GUIDEDTOURS_TOUR_SMARTSEARCH_STEP_ALIAS_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_SMARTSEARCH_STEP_ALIAS_DESCRIPTION', 96, 'bottom', '#jform_alias', 2, 2, 'administrator/index.php?option=com_finder&view=filter&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(97, 10, 'COM_GUIDEDTOURS_TOUR_SMARTSEARCH_STEP_CONTENT_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_SMARTSEARCH_STEP_CONTENT_DESCRIPTION', 97, 'bottom', '.col-lg-9', 0, 1, 'administrator/index.php?option=com_finder&view=filter&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(98, 10, 'COM_GUIDEDTOURS_TOUR_SMARTSEARCH_STEP_STATUS_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_SMARTSEARCH_STEP_STATUS_DESCRIPTION', 98, 'bottom', '#jform_state', 2, 3, 'administrator/index.php?option=com_finder&view=filter&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(99, 10, 'COM_GUIDEDTOURS_TOUR_SMARTSEARCH_STEP_SAVECLOSE_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_SMARTSEARCH_STEP_SAVECLOSE_DESCRIPTION', 99, 'bottom', '#save-group-children-save .button-save', 2, 1, 'administrator/index.php?option=com_finder&view=filter&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(100, 10, 'COM_GUIDEDTOURS_TOUR_SMARTSEARCH_STEP_CONGRATULATIONS_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_SMARTSEARCH_STEP_CONGRATULATIONS_DESCRIPTION', 100, 'bottom', '', 0, 1, 'administrator/index.php?option=com_finder&view=filter&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(101, 11, 'COM_GUIDEDTOURS_TOUR_USERS_STEP_NEW_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_USERS_STEP_NEW_DESCRIPTION', 101, 'bottom', '.button-new', 2, 1, 'administrator/index.php?option=com_users&view=user&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(102, 11, 'COM_GUIDEDTOURS_TOUR_USERS_STEP_NAME_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_USERS_STEP_NAME_DESCRIPTION', 102, 'bottom', '#jform_name', 2, 2, 'administrator/index.php?option=com_users&view=user&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(103, 11, 'COM_GUIDEDTOURS_TOUR_USERS_STEP_LOGINNAME_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_USERS_STEP_LOGINNAME_DESCRIPTION', 103, 'bottom', '#jform_username', 2, 2, 'administrator/index.php?option=com_users&view=user&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(104, 11, 'COM_GUIDEDTOURS_TOUR_USERS_STEP_PASSWORD_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_USERS_STEP_PASSWORD_DESCRIPTION', 104, 'bottom', '#jform_password', 2, 2, 'administrator/index.php?option=com_users&view=user&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(105, 11, 'COM_GUIDEDTOURS_TOUR_USERS_STEP_PASSWORD2_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_USERS_STEP_PASSWORD2_DESCRIPTION', 105, 'bottom', '#jform_password2', 2, 2, 'administrator/index.php?option=com_users&view=user&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(106, 11, 'COM_GUIDEDTOURS_TOUR_USERS_STEP_EMAIL_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_USERS_STEP_EMAIL_DESCRIPTION', 106, 'bottom', '#jform_email', 2, 2, 'administrator/index.php?option=com_users&view=user&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(107, 11, 'COM_GUIDEDTOURS_TOUR_USERS_STEP_SYSTEMEMAIL_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_USERS_STEP_SYSTEMEMAIL_DESCRIPTION', 107, 'top', '#jform_sendEmail0', 2, 3, 'administrator/index.php?option=com_users&view=user&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(108, 11, 'COM_GUIDEDTOURS_TOUR_USERS_STEP_STATUS_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_USERS_STEP_STATUS_DESCRIPTION', 108, 'top', '#jform_block0', 2, 3, 'administrator/index.php?option=com_users&view=user&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(109, 11, 'COM_GUIDEDTOURS_TOUR_USERS_STEP_PASSWORDRESET_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_USERS_STEP_PASSWORDRESET_DESCRIPTION', 109, 'top', '#jform_requireReset0', 2, 3, 'administrator/index.php?option=com_users&view=user&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(110, 11, 'COM_GUIDEDTOURS_TOUR_USERS_STEP_SAVECLOSE_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_USERS_STEP_SAVECLOSE_DESCRIPTION', 110, 'bottom', '#save-group-children-save .button-save', 2, 1, 'administrator/index.php?option=com_users&view=user&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', ''),
(111, 11, 'COM_GUIDEDTOURS_TOUR_USERS_STEP_CONGRATULATIONS_TITLE', 1, 'COM_GUIDEDTOURS_TOUR_USERS_STEP_CONGRATULATIONS_DESCRIPTION', 111, 'bottom', '', 0, 1, 'administrator/index.php?option=com_users&view=user&layout=edit', '2024-02-01 18:54:24', 0, '2024-02-01 18:54:24', 0, NULL, NULL, '*', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_history`
--

CREATE TABLE `bol96_history` (
  `version_id` int(10) UNSIGNED NOT NULL,
  `item_id` varchar(50) NOT NULL,
  `version_note` varchar(255) NOT NULL DEFAULT '' COMMENT 'Optional version name',
  `save_date` datetime NOT NULL,
  `editor_user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `character_count` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Number of characters in this version.',
  `sha1_hash` varchar(50) NOT NULL DEFAULT '' COMMENT 'SHA1 hash of the version_data column.',
  `version_data` mediumtext NOT NULL COMMENT 'json-encoded string of version data',
  `keep_forever` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=auto delete; 1=keep'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bol96_history`
--

INSERT INTO `bol96_history` (`version_id`, `item_id`, `version_note`, `save_date`, `editor_user_id`, `character_count`, `sha1_hash`, `version_data`, `keep_forever`) VALUES
(1, 'com_content.category.2', '', '2024-02-12 15:57:19', 527, 574, '97f5f40b13bcbcb6c42bbeb40ebf1550a5515014', '{\"id\":\"2\",\"asset_id\":27,\"parent_id\":1,\"lft\":1,\"rgt\":2,\"level\":1,\"path\":\"uncategorised\",\"extension\":\"com_content\",\"title\":\"Informativa\",\"alias\":\"informativa\",\"note\":\"\",\"description\":\"\",\"published\":\"1\",\"checked_out\":527,\"checked_out_time\":\"2024-02-12 15:57:01\",\"access\":1,\"params\":\"{\\\"category_layout\\\":\\\"\\\",\\\"image\\\":\\\"\\\",\\\"image_alt\\\":\\\"\\\"}\",\"metadesc\":\"\",\"metakey\":\"\",\"metadata\":\"{\\\"author\\\":\\\"\\\",\\\"robots\\\":\\\"\\\"}\",\"created_user_id\":\"527\",\"created_time\":\"2024-02-01 18:54:23\",\"modified_user_id\":527,\"modified_time\":\"2024-02-12 15:57:19\",\"hits\":0,\"language\":\"*\",\"version\":1}', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_languages`
--

CREATE TABLE `bol96_languages` (
  `lang_id` int(10) UNSIGNED NOT NULL,
  `asset_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `lang_code` char(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `title` varchar(50) NOT NULL,
  `title_native` varchar(50) NOT NULL,
  `sef` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `description` varchar(512) NOT NULL,
  `metakey` text DEFAULT NULL,
  `metadesc` text NOT NULL,
  `sitename` varchar(1024) NOT NULL DEFAULT '',
  `published` int(11) NOT NULL DEFAULT 0,
  `access` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `ordering` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bol96_languages`
--

INSERT INTO `bol96_languages` (`lang_id`, `asset_id`, `lang_code`, `title`, `title_native`, `sef`, `image`, `description`, `metakey`, `metadesc`, `sitename`, `published`, `access`, `ordering`) VALUES
(1, 0, 'en-GB', 'English (en-GB)', 'English (United Kingdom)', 'en', 'en_gb', '', '', '', '', 1, 1, 2),
(2, 99, 'es-ES', 'Spanish (es-ES)', 'EspaÃ±ol (EspaÃ±a)', 'es', 'es_es', '', NULL, '', '', 0, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_mail_templates`
--

CREATE TABLE `bol96_mail_templates` (
  `template_id` varchar(127) NOT NULL DEFAULT '',
  `extension` varchar(127) NOT NULL DEFAULT '',
  `language` char(7) NOT NULL DEFAULT '',
  `subject` varchar(255) NOT NULL DEFAULT '',
  `body` text NOT NULL,
  `htmlbody` mediumtext NOT NULL,
  `attachments` text NOT NULL,
  `params` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bol96_mail_templates`
--

INSERT INTO `bol96_mail_templates` (`template_id`, `extension`, `language`, `subject`, `body`, `htmlbody`, `attachments`, `params`) VALUES
('com_actionlogs.notification', 'com_actionlogs', '', 'COM_ACTIONLOGS_EMAIL_SUBJECT', 'COM_ACTIONLOGS_EMAIL_BODY', 'COM_ACTIONLOGS_EMAIL_HTMLBODY', '', '{\"tags\":[\"message\",\"date\",\"extension\",\"username\"]}'),
('com_config.test_mail', 'com_config', '', 'COM_CONFIG_SENDMAIL_SUBJECT', 'COM_CONFIG_SENDMAIL_BODY', '', '', '{\"tags\":[\"sitename\",\"method\"]}'),
('com_contact.mail', 'com_contact', '', 'COM_CONTACT_ENQUIRY_SUBJECT', 'COM_CONTACT_ENQUIRY_TEXT', '', '', '{\"tags\":[\"sitename\",\"name\",\"email\",\"subject\",\"body\",\"url\",\"customfields\"]}'),
('com_contact.mail.copy', 'com_contact', '', 'COM_CONTACT_COPYSUBJECT_OF', 'COM_CONTACT_COPYTEXT_OF', '', '', '{\"tags\":[\"sitename\",\"name\",\"email\",\"subject\",\"body\",\"url\",\"customfields\",\"contactname\"]}'),
('com_messages.new_message', 'com_messages', '', 'COM_MESSAGES_NEW_MESSAGE', 'COM_MESSAGES_NEW_MESSAGE_BODY', '', '', '{\"tags\":[\"subject\",\"message\",\"fromname\",\"sitename\",\"siteurl\",\"fromemail\",\"toname\",\"toemail\"]}'),
('com_privacy.notification.admin.export', 'com_privacy', '', 'COM_PRIVACY_EMAIL_ADMIN_REQUEST_SUBJECT_EXPORT_REQUEST', 'COM_PRIVACY_EMAIL_ADMIN_REQUEST_BODY_EXPORT_REQUEST', '', '', '{\"tags\":[\"sitename\",\"url\",\"tokenurl\",\"formurl\",\"token\"]}'),
('com_privacy.notification.admin.remove', 'com_privacy', '', 'COM_PRIVACY_EMAIL_ADMIN_REQUEST_SUBJECT_REMOVE_REQUEST', 'COM_PRIVACY_EMAIL_ADMIN_REQUEST_BODY_REMOVE_REQUEST', '', '', '{\"tags\":[\"sitename\",\"url\",\"tokenurl\",\"formurl\",\"token\"]}'),
('com_privacy.notification.export', 'com_privacy', '', 'COM_PRIVACY_EMAIL_REQUEST_SUBJECT_EXPORT_REQUEST', 'COM_PRIVACY_EMAIL_REQUEST_BODY_EXPORT_REQUEST', '', '', '{\"tags\":[\"sitename\",\"url\",\"tokenurl\",\"formurl\",\"token\"]}'),
('com_privacy.notification.remove', 'com_privacy', '', 'COM_PRIVACY_EMAIL_REQUEST_SUBJECT_REMOVE_REQUEST', 'COM_PRIVACY_EMAIL_REQUEST_BODY_REMOVE_REQUEST', '', '', '{\"tags\":[\"sitename\",\"url\",\"tokenurl\",\"formurl\",\"token\"]}'),
('com_privacy.userdataexport', 'com_privacy', '', 'COM_PRIVACY_EMAIL_DATA_EXPORT_COMPLETED_SUBJECT', 'COM_PRIVACY_EMAIL_DATA_EXPORT_COMPLETED_BODY', '', '', '{\"tags\":[\"sitename\",\"url\"]}'),
('com_users.massmail.mail', 'com_users', '', 'COM_USERS_MASSMAIL_MAIL_SUBJECT', 'COM_USERS_MASSMAIL_MAIL_BODY', '', '', '{\"tags\":[\"subject\",\"body\",\"subjectprefix\",\"bodysuffix\"]}'),
('com_users.password_reset', 'com_users', '', 'COM_USERS_EMAIL_PASSWORD_RESET_SUBJECT', 'COM_USERS_EMAIL_PASSWORD_RESET_BODY', '', '', '{\"tags\":[\"name\",\"email\",\"sitename\",\"link_text\",\"link_html\",\"token\"]}'),
('com_users.registration.admin.new_notification', 'com_users', '', 'COM_USERS_EMAIL_ACCOUNT_DETAILS', 'COM_USERS_EMAIL_REGISTERED_NOTIFICATION_TO_ADMIN_BODY', '', '', '{\"tags\":[\"name\",\"sitename\",\"siteurl\",\"username\"]}'),
('com_users.registration.admin.verification_request', 'com_users', '', 'COM_USERS_EMAIL_ACTIVATE_WITH_ADMIN_ACTIVATION_SUBJECT', 'COM_USERS_EMAIL_ACTIVATE_WITH_ADMIN_ACTIVATION_BODY', '', '', '{\"tags\":[\"name\",\"sitename\",\"email\",\"username\",\"activate\"]}'),
('com_users.registration.user.admin_activated', 'com_users', '', 'COM_USERS_EMAIL_ACTIVATED_BY_ADMIN_ACTIVATION_SUBJECT', 'COM_USERS_EMAIL_ACTIVATED_BY_ADMIN_ACTIVATION_BODY', '', '', '{\"tags\":[\"name\",\"sitename\",\"siteurl\",\"username\"]}'),
('com_users.registration.user.admin_activation', 'com_users', '', 'COM_USERS_EMAIL_ACCOUNT_DETAILS', 'COM_USERS_EMAIL_REGISTERED_WITH_ADMIN_ACTIVATION_BODY_NOPW', '', '', '{\"tags\":[\"name\",\"sitename\",\"activate\",\"siteurl\",\"username\"]}'),
('com_users.registration.user.admin_activation_w_pw', 'com_users', '', 'COM_USERS_EMAIL_ACCOUNT_DETAILS', 'COM_USERS_EMAIL_REGISTERED_WITH_ADMIN_ACTIVATION_BODY', '', '', '{\"tags\":[\"name\",\"sitename\",\"activate\",\"siteurl\",\"username\",\"password_clear\"]}'),
('com_users.registration.user.registration_mail', 'com_users', '', 'COM_USERS_EMAIL_ACCOUNT_DETAILS', 'COM_USERS_EMAIL_REGISTERED_BODY_NOPW', '', '', '{\"tags\":[\"name\",\"sitename\",\"siteurl\",\"username\"]}'),
('com_users.registration.user.registration_mail_w_pw', 'com_users', '', 'COM_USERS_EMAIL_ACCOUNT_DETAILS', 'COM_USERS_EMAIL_REGISTERED_BODY', '', '', '{\"tags\":[\"name\",\"sitename\",\"siteurl\",\"username\",\"password_clear\"]}'),
('com_users.registration.user.self_activation', 'com_users', '', 'COM_USERS_EMAIL_ACCOUNT_DETAILS', 'COM_USERS_EMAIL_REGISTERED_WITH_ACTIVATION_BODY_NOPW', '', '', '{\"tags\":[\"name\",\"sitename\",\"activate\",\"siteurl\",\"username\"]}'),
('com_users.registration.user.self_activation_w_pw', 'com_users', '', 'COM_USERS_EMAIL_ACCOUNT_DETAILS', 'COM_USERS_EMAIL_REGISTERED_WITH_ACTIVATION_BODY', '', '', '{\"tags\":[\"name\",\"sitename\",\"activate\",\"siteurl\",\"username\",\"password_clear\"]}'),
('com_users.reminder', 'com_users', '', 'COM_USERS_EMAIL_USERNAME_REMINDER_SUBJECT', 'COM_USERS_EMAIL_USERNAME_REMINDER_BODY', '', '', '{\"tags\":[\"name\",\"username\",\"sitename\",\"email\",\"link_text\",\"link_html\"]}'),
('plg_multifactorauth_email.mail', 'plg_multifactorauth_email', '', 'PLG_MULTIFACTORAUTH_EMAIL_EMAIL_SUBJECT', 'PLG_MULTIFACTORAUTH_EMAIL_EMAIL_BODY', '', '', '{\"tags\":[\"code\",\"sitename\",\"siteurl\",\"username\",\"email\",\"fullname\"]}'),
('plg_system_privacyconsent.request.reminder', 'plg_system_privacyconsent', '', 'PLG_SYSTEM_PRIVACYCONSENT_EMAIL_REMIND_SUBJECT', 'PLG_SYSTEM_PRIVACYCONSENT_EMAIL_REMIND_BODY', '', '', '{\"tags\":[\"sitename\",\"url\",\"tokenurl\",\"formurl\",\"token\"]}'),
('plg_system_tasknotification.failure_mail', 'plg_system_tasknotification', '', 'PLG_SYSTEM_TASK_NOTIFICATION_FAILURE_MAIL_SUBJECT', 'PLG_SYSTEM_TASK_NOTIFICATION_FAILURE_MAIL_BODY', '', '', '{\"tags\": [\"task_id\", \"task_title\", \"exit_code\", \"exec_data_time\", \"task_output\"]}'),
('plg_system_tasknotification.fatal_recovery_mail', 'plg_system_tasknotification', '', 'PLG_SYSTEM_TASK_NOTIFICATION_FATAL_MAIL_SUBJECT', 'PLG_SYSTEM_TASK_NOTIFICATION_FATAL_MAIL_BODY', '', '', '{\"tags\": [\"task_id\", \"task_title\"]}'),
('plg_system_tasknotification.orphan_mail', 'plg_system_tasknotification', '', 'PLG_SYSTEM_TASK_NOTIFICATION_ORPHAN_MAIL_SUBJECT', 'PLG_SYSTEM_TASK_NOTIFICATION_ORPHAN_MAIL_BODY', '', '', '{\"tags\": [\"task_id\", \"task_title\"]}'),
('plg_system_tasknotification.success_mail', 'plg_system_tasknotification', '', 'PLG_SYSTEM_TASK_NOTIFICATION_SUCCESS_MAIL_SUBJECT', 'PLG_SYSTEM_TASK_NOTIFICATION_SUCCESS_MAIL_BODY', '', '', '{\"tags\":[\"task_id\", \"task_title\", \"exec_data_time\", \"task_output\"]}'),
('plg_system_updatenotification.mail', 'plg_system_updatenotification', '', 'PLG_SYSTEM_UPDATENOTIFICATION_EMAIL_SUBJECT', 'PLG_SYSTEM_UPDATENOTIFICATION_EMAIL_BODY', '', '', '{\"tags\":[\"newversion\",\"curversion\",\"sitename\",\"url\",\"link\",\"releasenews\"]}'),
('plg_user_joomla.mail', 'plg_user_joomla', '', 'PLG_USER_JOOMLA_NEW_USER_EMAIL_SUBJECT', 'PLG_USER_JOOMLA_NEW_USER_EMAIL_BODY', '', '', '{\"tags\":[\"name\",\"sitename\",\"url\",\"username\",\"password\",\"email\"]}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_menu`
--

CREATE TABLE `bol96_menu` (
  `id` int(11) NOT NULL,
  `menutype` varchar(24) NOT NULL COMMENT 'The type of menu this item belongs to. FK to #__menu_types.menutype',
  `title` varchar(255) NOT NULL COMMENT 'The display title of the menu item.',
  `alias` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT 'The SEF alias of the menu item.',
  `note` varchar(255) NOT NULL DEFAULT '',
  `path` varchar(1024) NOT NULL COMMENT 'The computed path of the menu item based on the alias field.',
  `link` varchar(1024) NOT NULL COMMENT 'The actually link the menu item refers to.',
  `type` varchar(16) NOT NULL COMMENT 'The type of link: Component, URL, Alias, Separator',
  `published` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'The published state of the menu link.',
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'The parent menu item in the menu tree.',
  `level` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'The relative level in the tree.',
  `component_id` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'FK to #__extensions.id',
  `checked_out` int(10) UNSIGNED DEFAULT NULL COMMENT 'FK to #__users.id',
  `checked_out_time` datetime DEFAULT NULL COMMENT 'The time the menu item was checked out.',
  `browserNav` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'The click behaviour of the link.',
  `access` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'The access level required to view the menu item.',
  `img` varchar(255) NOT NULL COMMENT 'The image of the menu item.',
  `template_style_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `params` text NOT NULL COMMENT 'JSON encoded data for the menu item.',
  `lft` int(11) NOT NULL DEFAULT 0 COMMENT 'Nested set lft.',
  `rgt` int(11) NOT NULL DEFAULT 0 COMMENT 'Nested set rgt.',
  `home` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Indicates if this menu item is the home or default page.',
  `language` char(7) NOT NULL DEFAULT '',
  `client_id` tinyint(4) NOT NULL DEFAULT 0,
  `publish_up` datetime DEFAULT NULL,
  `publish_down` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bol96_menu`
--

INSERT INTO `bol96_menu` (`id`, `menutype`, `title`, `alias`, `note`, `path`, `link`, `type`, `published`, `parent_id`, `level`, `component_id`, `checked_out`, `checked_out_time`, `browserNav`, `access`, `img`, `template_style_id`, `params`, `lft`, `rgt`, `home`, `language`, `client_id`, `publish_up`, `publish_down`) VALUES
(1, '', 'Menu_Item_Root', 'root', '', '', '', '', 1, 0, 0, 0, NULL, NULL, 0, 0, '', 0, '', 0, 65, 0, '*', 0, NULL, NULL),
(2, 'main', 'com_banners', 'Banners', '', 'Banners', 'index.php?option=com_banners', 'component', 1, 1, 1, 3, NULL, NULL, 0, 0, 'class:bookmark', 0, '', 1, 10, 0, '*', 1, NULL, NULL),
(3, 'main', 'com_banners', 'Banners', '', 'Banners/Banners', 'index.php?option=com_banners&view=banners', 'component', 1, 2, 2, 3, NULL, NULL, 0, 0, 'class:banners', 0, '', 2, 3, 0, '*', 1, NULL, NULL),
(4, 'main', 'com_banners_categories', 'Categories', '', 'Banners/Categories', 'index.php?option=com_categories&view=categories&extension=com_banners', 'component', 1, 2, 2, 5, NULL, NULL, 0, 0, 'class:banners-cat', 0, '', 4, 5, 0, '*', 1, NULL, NULL),
(5, 'main', 'com_banners_clients', 'Clients', '', 'Banners/Clients', 'index.php?option=com_banners&view=clients', 'component', 1, 2, 2, 3, NULL, NULL, 0, 0, 'class:banners-clients', 0, '', 6, 7, 0, '*', 1, NULL, NULL),
(6, 'main', 'com_banners_tracks', 'Tracks', '', 'Banners/Tracks', 'index.php?option=com_banners&view=tracks', 'component', 1, 2, 2, 3, NULL, NULL, 0, 0, 'class:banners-tracks', 0, '', 8, 9, 0, '*', 1, NULL, NULL),
(7, 'main', 'com_contact', 'Contacts', '', 'Contacts', 'index.php?option=com_contact', 'component', 1, 1, 1, 7, NULL, NULL, 0, 0, 'class:address-book', 0, '', 11, 20, 0, '*', 1, NULL, NULL),
(8, 'main', 'com_contact_contacts', 'Contacts', '', 'Contacts/Contacts', 'index.php?option=com_contact&view=contacts', 'component', 1, 7, 2, 7, NULL, NULL, 0, 0, 'class:contact', 0, '', 12, 13, 0, '*', 1, NULL, NULL),
(9, 'main', 'com_contact_categories', 'Categories', '', 'Contacts/Categories', 'index.php?option=com_categories&view=categories&extension=com_contact', 'component', 1, 7, 2, 5, NULL, NULL, 0, 0, 'class:contact-cat', 0, '', 14, 15, 0, '*', 1, NULL, NULL),
(10, 'main', 'com_newsfeeds', 'News Feeds', '', 'News Feeds', 'index.php?option=com_newsfeeds', 'component', 1, 1, 1, 16, NULL, NULL, 0, 0, 'class:rss', 0, '', 23, 28, 0, '*', 1, NULL, NULL),
(11, 'main', 'com_newsfeeds_feeds', 'Feeds', '', 'News Feeds/Feeds', 'index.php?option=com_newsfeeds&view=newsfeeds', 'component', 1, 10, 2, 16, NULL, NULL, 0, 0, 'class:newsfeeds', 0, '', 24, 25, 0, '*', 1, NULL, NULL),
(12, 'main', 'com_newsfeeds_categories', 'Categories', '', 'News Feeds/Categories', 'index.php?option=com_categories&view=categories&extension=com_newsfeeds', 'component', 1, 10, 2, 5, NULL, NULL, 0, 0, 'class:newsfeeds-cat', 0, '', 26, 27, 0, '*', 1, NULL, NULL),
(13, 'main', 'com_finder', 'Smart Search', '', 'Smart Search', 'index.php?option=com_finder', 'component', 1, 1, 1, 23, NULL, NULL, 0, 0, 'class:search-plus', 0, '', 29, 38, 0, '*', 1, NULL, NULL),
(14, 'main', 'com_tags', 'Tags', '', 'Tags', 'index.php?option=com_tags&view=tags', 'component', 1, 1, 1, 25, NULL, NULL, 0, 1, 'class:tags', 0, '', 39, 40, 0, '', 1, NULL, NULL),
(15, 'main', 'com_associations', 'Multilingual Associations', '', 'Multilingual Associations', 'index.php?option=com_associations&view=associations', 'component', 1, 1, 1, 30, NULL, NULL, 0, 0, 'class:language', 0, '', 21, 22, 0, '*', 1, NULL, NULL),
(16, 'main', 'mod_menu_fields', 'Contact Custom Fields', '', 'Contacts/Contact Custom Fields', 'index.php?option=com_fields&context=com_contact.contact', 'component', 1, 7, 2, 29, NULL, NULL, 0, 0, 'class:messages-add', 0, '', 16, 17, 0, '*', 1, NULL, NULL),
(17, 'main', 'mod_menu_fields_group', 'Contact Custom Fields Group', '', 'Contacts/Contact Custom Fields Group', 'index.php?option=com_fields&view=groups&context=com_contact.contact', 'component', 1, 7, 2, 29, NULL, NULL, 0, 0, 'class:messages-add', 0, '', 18, 19, 0, '*', 1, NULL, NULL),
(18, 'main', 'com_finder_index', 'Smart-Search-Index', '', 'Smart Search/Smart-Search-Index', 'index.php?option=com_finder&view=index', 'component', 1, 13, 2, 23, NULL, NULL, 0, 0, 'class:finder', 0, '', 30, 31, 0, '*', 1, NULL, NULL),
(19, 'main', 'com_finder_maps', 'Smart-Search-Maps', '', 'Smart Search/Smart-Search-Maps', 'index.php?option=com_finder&view=maps', 'component', 1, 13, 2, 23, NULL, NULL, 0, 0, 'class:finder-maps', 0, '', 32, 33, 0, '*', 1, NULL, NULL),
(20, 'main', 'com_finder_filters', 'Smart-Search-Filters', '', 'Smart Search/Smart-Search-Filters', 'index.php?option=com_finder&view=filters', 'component', 1, 13, 2, 23, NULL, NULL, 0, 0, 'class:finder-filters', 0, '', 34, 35, 0, '*', 1, NULL, NULL),
(21, 'main', 'com_finder_searches', 'Smart-Search-Searches', '', 'Smart Search/Smart-Search-Searches', 'index.php?option=com_finder&view=searches', 'component', 1, 13, 2, 23, NULL, NULL, 0, 0, 'class:finder-searches', 0, '', 36, 37, 0, '*', 1, NULL, NULL),
(101, 'mainmenu', 'Menu', 'menu', '', 'menu', 'index.php?option=com_content&view=featured', 'component', 1, 1, 1, 19, NULL, NULL, 0, 1, ' ', 0, '{\"featured_categories\":[\"\"],\"layout_type\":\"blog\",\"num_leading_articles\":1,\"blog_class_leading\":\"\",\"num_intro_articles\":3,\"blog_class\":\"\",\"num_columns\":\"\",\"multi_column_order\":\"\",\"num_links\":0,\"link_intro_image\":\"\",\"orderby_pri\":\"\",\"orderby_sec\":\"front\",\"order_date\":\"\",\"show_pagination\":\"2\",\"show_pagination_results\":\"1\",\"show_title\":\"\",\"link_titles\":\"\",\"show_intro\":\"\",\"info_block_position\":\"\",\"info_block_show_title\":\"\",\"show_category\":\"\",\"link_category\":\"\",\"show_parent_category\":\"\",\"link_parent_category\":\"\",\"show_author\":\"\",\"link_author\":\"\",\"show_create_date\":\"\",\"show_modify_date\":\"\",\"show_publish_date\":\"\",\"show_item_navigation\":\"\",\"show_readmore\":\"\",\"show_readmore_title\":\"\",\"show_hits\":\"\",\"show_tags\":\"\",\"show_noauth\":\"\",\"show_feed_link\":\"1\",\"feed_summary\":\"\",\"menu-anchor_title\":\"\",\"menu-anchor_css\":\"\",\"menu_icon_css\":\"\",\"menu_image\":\"\",\"menu_image_css\":\"\",\"menu_text\":1,\"menu_show\":1,\"page_title\":\"\",\"show_page_heading\":\"1\",\"page_heading\":\"\",\"pageclass_sfx\":\"\",\"menu-meta_description\":\"\",\"robots\":\"\"}', 41, 48, 1, '*', 0, NULL, NULL),
(102, 'main', 'COM_BLANK', 'com-blank', '', 'com-blank', 'index.php?option=com_blank', 'component', 1, 1, 1, 235, NULL, NULL, 0, 1, 'class:component', 0, '{}', 49, 50, 0, '', 1, NULL, NULL),
(103, 'mainmenu', 'Quienes somos', 'quienes-somos', '', 'quienes-somos', 'index.php?option=com_blank&view=blank', 'component', 1, 1, 1, 235, NULL, NULL, 0, 1, ' ', 12, '{\"menu-anchor_title\":\"\",\"menu-anchor_css\":\"option-normal\",\"menu_icon_css\":\"\",\"menu_image\":\"\",\"menu_image_css\":\"\",\"menu_text\":1,\"menu_show\":1,\"page_title\":\"\",\"show_page_heading\":\"\",\"page_heading\":\"\",\"pageclass_sfx\":\"\",\"menu-meta_description\":\"Somos la empresa\",\"robots\":\"\"}', 55, 56, 0, '*', 0, NULL, NULL),
(104, 'mainmenu', 'optionhidden', 'option', '', 'menu/option', 'index.php?option=com_blank&view=blank', 'component', 0, 101, 2, 235, NULL, NULL, 0, 1, ' ', 0, '{\"menu-anchor_title\":\"\",\"menu-anchor_css\":\"co_parent option-hidden\",\"menu_icon_css\":\"\",\"menu_image\":\"\",\"menu_image_css\":\"\",\"menu_text\":1,\"menu_show\":1,\"page_title\":\"\",\"show_page_heading\":\"\",\"page_heading\":\"\",\"pageclass_sfx\":\"\",\"menu-meta_description\":\"\",\"robots\":\"\"}', 46, 47, 0, '*', 0, NULL, NULL),
(105, 'mainmenu', 'Aviso de privacidad', 'aviso-de-privacidad', '', 'aviso-de-privacidad', 'index.php?option=com_blank&view=blank', 'component', 1, 1, 1, 235, NULL, NULL, 0, 1, ' ', 0, '{\"menu-anchor_title\":\"\",\"menu-anchor_css\":\"option-normal\",\"menu_icon_css\":\"\",\"menu_image\":\"\",\"menu_image_css\":\"\",\"menu_text\":1,\"menu_show\":1,\"page_title\":\"\",\"show_page_heading\":\"\",\"page_heading\":\"\",\"pageclass_sfx\":\"\",\"menu-meta_description\":\"\",\"robots\":\"\"}', 57, 58, 0, '*', 0, NULL, NULL),
(106, 'mainmenu', 'Oferta', 'oferta', '', 'oferta', 'index.php?option=com_blank&view=blank', 'component', 1, 1, 1, 235, NULL, NULL, 0, 1, ' ', 0, '{\"menu-anchor_title\":\"\",\"menu-anchor_css\":\"\",\"menu_icon_css\":\"\",\"menu_image\":\"\",\"menu_image_css\":\"\",\"menu_text\":0,\"menu_show\":0,\"page_title\":\"\",\"show_page_heading\":\"\",\"page_heading\":\"\",\"pageclass_sfx\":\"\",\"menu-meta_description\":\"\",\"robots\":\"\"}', 51, 52, 0, '*', 0, NULL, NULL),
(107, 'mainmenu', 'Servicios', 'servicios', '', 'menu/servicios', 'index.php?option=com_blank&view=blank', 'component', 1, 101, 2, 235, NULL, NULL, 0, 1, ' ', 0, '{\"menu-anchor_title\":\"\",\"menu-anchor_css\":\"co_parent servicesP\",\"menu_icon_css\":\"\",\"menu_image\":\"\",\"menu_image_css\":\"\",\"menu_text\":1,\"menu_show\":1,\"page_title\":\"\",\"show_page_heading\":\"\",\"page_heading\":\"\",\"pageclass_sfx\":\"\",\"menu-meta_description\":\"\",\"robots\":\"\"}', 42, 43, 0, '*', 0, NULL, NULL),
(108, 'mainmenu', 'Servicio carrito compra', 'servicio-carrito-compra', '', 'menu/servicio-carrito-compra', 'index.php?option=com_blank&view=blank', 'component', 1, 101, 2, 235, NULL, NULL, 0, 1, ' ', 0, '{\"menu-anchor_title\":\"\",\"menu-anchor_css\":\"\",\"menu_icon_css\":\"\",\"menu_image\":\"\",\"menu_image_css\":\"\",\"menu_text\":0,\"menu_show\":0,\"page_title\":\"\",\"show_page_heading\":\"\",\"page_heading\":\"\",\"pageclass_sfx\":\"\",\"menu-meta_description\":\"\",\"robots\":\"\"}', 44, 45, 0, '*', 0, NULL, NULL),
(109, 'mainmenu', 'Formulario de pago', 'formulario-de-pago', '', 'formulario-de-pago', 'index.php?option=com_blank&view=blank', 'component', 1, 1, 1, 235, NULL, NULL, 0, 1, ' ', 0, '{\"menu-anchor_title\":\"\",\"menu-anchor_css\":\"\",\"menu_icon_css\":\"\",\"menu_image\":\"\",\"menu_image_css\":\"\",\"menu_text\":0,\"menu_show\":0,\"page_title\":\"\",\"show_page_heading\":\"\",\"page_heading\":\"\",\"pageclass_sfx\":\"\",\"menu-meta_description\":\"\",\"robots\":\"\"}', 59, 60, 0, '*', 0, NULL, NULL),
(110, 'mainmenu', 'Servicios', 'servicios', '', 'servicios', 'index.php?option=com_blank&view=blank', 'component', 1, 1, 1, 235, NULL, NULL, 0, 1, ' ', 0, '{\"menu-anchor_title\":\"\",\"menu-anchor_css\":\"option-normal\",\"menu_icon_css\":\"\",\"menu_image\":\"\",\"menu_image_css\":\"\",\"menu_text\":1,\"menu_show\":1,\"page_title\":\"\",\"show_page_heading\":\"\",\"page_heading\":\"\",\"pageclass_sfx\":\"\",\"menu-meta_description\":\"\",\"robots\":\"\"}', 53, 54, 0, '*', 0, NULL, NULL),
(111, 'mainmenu', 'Compatibilidad del sitio', 'compatibilidad-del-sitio', '', 'compatibilidad-del-sitio', 'index.php?option=com_blank&view=blank', 'component', 1, 1, 1, 235, NULL, NULL, 0, 1, ' ', 0, '{\"menu-anchor_title\":\"\",\"menu-anchor_css\":\"option-normal\",\"menu_icon_css\":\"\",\"menu_image\":\"\",\"menu_image_css\":\"\",\"menu_text\":1,\"menu_show\":1,\"page_title\":\"\",\"show_page_heading\":\"\",\"page_heading\":\"\",\"pageclass_sfx\":\"\",\"menu-meta_description\":\"\",\"robots\":\"\"}', 61, 62, 0, '*', 0, NULL, NULL),
(112, 'mainmenu', 'Políticas del servicio', 'politicas-del-servicio', '', 'politicas-del-servicio', 'index.php?option=com_blank&view=blank', 'component', 1, 1, 1, 235, NULL, NULL, 0, 1, ' ', 0, '{\"menu-anchor_title\":\"\",\"menu-anchor_css\":\"option-normal\",\"menu_icon_css\":\"\",\"menu_image\":\"\",\"menu_image_css\":\"\",\"menu_text\":1,\"menu_show\":1,\"page_title\":\"\",\"show_page_heading\":\"\",\"page_heading\":\"\",\"pageclass_sfx\":\"\",\"menu-meta_description\":\"\",\"robots\":\"\"}', 63, 64, 0, '*', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_menu_types`
--

CREATE TABLE `bol96_menu_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `asset_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `menutype` varchar(24) NOT NULL,
  `title` varchar(48) NOT NULL,
  `description` varchar(255) NOT NULL DEFAULT '',
  `client_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bol96_menu_types`
--

INSERT INTO `bol96_menu_types` (`id`, `asset_id`, `menutype`, `title`, `description`, `client_id`) VALUES
(1, 0, 'mainmenu', 'Main Menu', 'The main menu for the site', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_messages`
--

CREATE TABLE `bol96_messages` (
  `message_id` int(10) UNSIGNED NOT NULL,
  `user_id_from` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `user_id_to` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `folder_id` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `date_time` datetime NOT NULL,
  `state` tinyint(4) NOT NULL DEFAULT 0,
  `priority` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `subject` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_messages_cfg`
--

CREATE TABLE `bol96_messages_cfg` (
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `cfg_name` varchar(100) NOT NULL DEFAULT '',
  `cfg_value` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_modules`
--

CREATE TABLE `bol96_modules` (
  `id` int(11) NOT NULL,
  `asset_id` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'FK to the #__assets table.',
  `title` varchar(100) NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  `content` text DEFAULT NULL,
  `ordering` int(11) NOT NULL DEFAULT 0,
  `position` varchar(50) NOT NULL DEFAULT '',
  `checked_out` int(10) UNSIGNED DEFAULT NULL,
  `checked_out_time` datetime DEFAULT NULL,
  `publish_up` datetime DEFAULT NULL,
  `publish_down` datetime DEFAULT NULL,
  `published` tinyint(4) NOT NULL DEFAULT 0,
  `module` varchar(50) DEFAULT NULL,
  `access` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `showtitle` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `params` text NOT NULL,
  `client_id` tinyint(4) NOT NULL DEFAULT 0,
  `language` char(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bol96_modules`
--

INSERT INTO `bol96_modules` (`id`, `asset_id`, `title`, `note`, `content`, `ordering`, `position`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `published`, `module`, `access`, `showtitle`, `params`, `client_id`, `language`) VALUES
(1, 39, 'Main Menu', '', '', 1, 'sidebar-right', NULL, NULL, NULL, NULL, 1, 'mod_menu', 1, 1, '{\"menutype\":\"mainmenu\",\"startLevel\":\"0\",\"endLevel\":\"0\",\"showAllChildren\":\"1\",\"tag_id\":\"\",\"class_sfx\":\"\",\"window_open\":\"\",\"layout\":\"_:default\",\"moduleclass_sfx\":\"\",\"cache\":\"1\",\"cache_time\":\"900\",\"cachemode\":\"itemid\"}', 0, '*'),
(2, 40, 'Login', '', '', 1, 'login', NULL, NULL, NULL, NULL, 1, 'mod_login', 1, 1, '', 1, '*'),
(3, 41, 'Popular Articles', '', '', 6, 'cpanel', NULL, NULL, NULL, NULL, 1, 'mod_popular', 3, 1, '{\"count\":\"5\",\"catid\":\"\",\"user_id\":\"0\",\"layout\":\"_:default\",\"moduleclass_sfx\":\"\",\"cache\":\"0\", \"bootstrap_size\": \"12\",\"header_tag\":\"h2\"}', 1, '*'),
(4, 42, 'Recently Added Articles', '', '', 4, 'cpanel', NULL, NULL, NULL, NULL, 1, 'mod_latest', 3, 1, '{\"count\":\"5\",\"ordering\":\"c_dsc\",\"catid\":\"\",\"user_id\":\"0\",\"layout\":\"_:default\",\"moduleclass_sfx\":\"\",\"cache\":\"0\", \"bootstrap_size\": \"12\",\"header_tag\":\"h2\"}', 1, '*'),
(8, 43, 'Toolbar', '', '', 1, 'toolbar', NULL, NULL, NULL, NULL, 1, 'mod_toolbar', 3, 1, '', 1, '*'),
(9, 44, 'Notifications', '', '', 3, 'icon', NULL, NULL, NULL, NULL, 1, 'mod_quickicon', 3, 1, '{\"context\":\"update_quickicon\",\"header_icon\":\"icon-sync\",\"show_jupdate\":\"1\",\"show_eupdate\":\"1\",\"show_oupdate\":\"1\",\"show_privacy\":\"1\",\"layout\":\"_:default\",\"moduleclass_sfx\":\"\",\"cache\":1,\"cache_time\":900,\"style\":\"0\",\"module_tag\":\"div\",\"bootstrap_size\":\"12\",\"header_tag\":\"h2\",\"header_class\":\"\"}', 1, '*'),
(10, 45, 'Logged-in Users', '', '', 2, 'cpanel', NULL, NULL, NULL, NULL, 1, 'mod_logged', 3, 1, '{\"count\":\"5\",\"name\":\"1\",\"layout\":\"_:default\",\"moduleclass_sfx\":\"\",\"cache\":\"0\", \"bootstrap_size\": \"12\",\"header_tag\":\"h2\"}', 1, '*'),
(12, 46, 'Admin Menu', '', '', 1, 'menu', NULL, NULL, NULL, NULL, 1, 'mod_menu', 3, 1, '{\"layout\":\"\",\"moduleclass_sfx\":\"\",\"shownew\":\"1\",\"showhelp\":\"1\",\"cache\":\"0\"}', 1, '*'),
(15, 49, 'Title', '', '', 1, 'title', NULL, NULL, NULL, NULL, 1, 'mod_title', 3, 1, '', 1, '*'),
(16, 50, 'Login Form', '', '', 7, 'sidebar-right', NULL, NULL, '2024-02-21 00:14:13', NULL, -2, 'mod_login', 1, 1, '{\"greeting\":\"1\",\"name\":\"0\"}', 0, '*'),
(17, 51, 'Breadcrumbs', '', '', 1, 'breadcrumbs', NULL, NULL, '2024-02-21 00:14:13', NULL, -2, 'mod_breadcrumbs', 1, 1, '{\"moduleclass_sfx\":\"\",\"showHome\":\"1\",\"homeText\":\"\",\"showComponent\":\"1\",\"separator\":\"\",\"cache\":\"0\",\"cache_time\":\"0\",\"cachemode\":\"itemid\"}', 0, '*'),
(79, 52, 'Multilanguage status', '', '', 2, 'status', NULL, NULL, NULL, NULL, 1, 'mod_multilangstatus', 3, 1, '{\"layout\":\"_:default\",\"moduleclass_sfx\":\"\",\"cache\":\"0\"}', 1, '*'),
(86, 53, 'Joomla Version', '', '', 1, 'status', NULL, NULL, NULL, NULL, 1, 'mod_version', 3, 1, '{\"layout\":\"_:default\",\"moduleclass_sfx\":\"\",\"cache\":\"0\"}', 1, '*'),
(87, 55, 'Sample Data', '', '', 1, 'cpanel', NULL, NULL, NULL, NULL, 1, 'mod_sampledata', 6, 1, '{\"bootstrap_size\": \"12\",\"header_tag\":\"h2\"}', 1, '*'),
(88, 67, 'Latest Actions', '', '', 3, 'cpanel', NULL, NULL, NULL, NULL, 1, 'mod_latestactions', 6, 1, '{\"bootstrap_size\": \"12\",\"header_tag\":\"h2\"}', 1, '*'),
(89, 68, 'Privacy Dashboard', '', '', 5, 'cpanel', NULL, NULL, NULL, NULL, 1, 'mod_privacy_dashboard', 6, 1, '{\"bootstrap_size\": \"12\",\"header_tag\":\"h2\"}', 1, '*'),
(90, 89, 'Login Support', '', '', 1, 'sidebar', NULL, NULL, NULL, NULL, 1, 'mod_loginsupport', 1, 1, '{\"forum_url\":\"https://forum.joomla.org/\",\"documentation_url\":\"https://docs.joomla.org/\",\"news_url\":\"https://www.joomla.org/announcements.html\",\"automatic_title\":1,\"prepare_content\":1,\"layout\":\"_:default\",\"moduleclass_sfx\":\"\",\"cache\":1,\"cache_time\":900,\"module_tag\":\"div\",\"bootstrap_size\":\"0\",\"header_tag\":\"h3\",\"header_class\":\"\",\"style\":\"0\"}', 1, '*'),
(91, 72, 'System Dashboard', '', '', 1, 'cpanel-system', NULL, NULL, NULL, NULL, 1, 'mod_submenu', 1, 0, '{\"menutype\":\"*\",\"preset\":\"system\",\"layout\":\"_:default\",\"moduleclass_sfx\":\"\",\"module_tag\":\"div\",\"bootstrap_size\":\"12\",\"header_tag\":\"h2\",\"header_class\":\"\",\"style\":\"System-none\"}', 1, '*'),
(92, 73, 'Content Dashboard', '', '', 1, 'cpanel-content', NULL, NULL, NULL, NULL, 1, 'mod_submenu', 1, 0, '{\"menutype\":\"*\",\"preset\":\"content\",\"layout\":\"_:default\",\"moduleclass_sfx\":\"\",\"module_tag\":\"div\",\"bootstrap_size\":\"12\",\"header_tag\":\"h2\",\"header_class\":\"\",\"style\":\"System-none\"}', 1, '*'),
(93, 74, 'Menus Dashboard', '', '', 1, 'cpanel-menus', NULL, NULL, NULL, NULL, 1, 'mod_submenu', 1, 0, '{\"menutype\":\"*\",\"preset\":\"menus\",\"layout\":\"_:default\",\"moduleclass_sfx\":\"\",\"module_tag\":\"div\",\"bootstrap_size\":\"12\",\"header_tag\":\"h2\",\"header_class\":\"\",\"style\":\"System-none\"}', 1, '*'),
(94, 75, 'Components Dashboard', '', '', 1, 'cpanel-components', NULL, NULL, NULL, NULL, 1, 'mod_submenu', 1, 0, '{\"menutype\":\"*\",\"preset\":\"components\",\"layout\":\"_:default\",\"moduleclass_sfx\":\"\",\"module_tag\":\"div\",\"bootstrap_size\":\"12\",\"header_tag\":\"h2\",\"header_class\":\"\",\"style\":\"System-none\"}', 1, '*'),
(95, 76, 'Users Dashboard', '', '', 1, 'cpanel-users', NULL, NULL, NULL, NULL, 1, 'mod_submenu', 1, 0, '{\"menutype\":\"*\",\"preset\":\"users\",\"layout\":\"_:default\",\"moduleclass_sfx\":\"\",\"module_tag\":\"div\",\"bootstrap_size\":\"12\",\"header_tag\":\"h2\",\"header_class\":\"\",\"style\":\"System-none\"}', 1, '*'),
(96, 86, 'Popular Articles', '', '', 3, 'cpanel-content', NULL, NULL, NULL, NULL, 1, 'mod_popular', 3, 1, '{\"count\":\"5\",\"catid\":\"\",\"user_id\":\"0\",\"layout\":\"_:default\",\"moduleclass_sfx\":\"\",\"cache\":\"0\", \"bootstrap_size\": \"12\",\"header_tag\":\"h2\"}', 1, '*'),
(97, 87, 'Recently Added Articles', '', '', 4, 'cpanel-content', NULL, NULL, NULL, NULL, 1, 'mod_latest', 3, 1, '{\"count\":\"5\",\"ordering\":\"c_dsc\",\"catid\":\"\",\"user_id\":\"0\",\"layout\":\"_:default\",\"moduleclass_sfx\":\"\",\"cache\":\"0\", \"bootstrap_size\": \"12\",\"header_tag\":\"h2\"}', 1, '*'),
(98, 88, 'Logged-in Users', '', '', 2, 'cpanel-users', NULL, NULL, NULL, NULL, 1, 'mod_logged', 3, 1, '{\"count\":\"5\",\"name\":\"1\",\"layout\":\"_:default\",\"moduleclass_sfx\":\"\",\"cache\":\"0\", \"bootstrap_size\": \"12\",\"header_tag\":\"h2\"}', 1, '*'),
(99, 77, 'Frontend Link', '', '', 5, 'status', NULL, NULL, NULL, NULL, 1, 'mod_frontend', 1, 1, '', 1, '*'),
(100, 78, 'Messages', '', '', 4, 'status', NULL, NULL, NULL, NULL, 1, 'mod_messages', 3, 1, '', 1, '*'),
(101, 79, 'Post Install Messages', '', '', 3, 'status', NULL, NULL, NULL, NULL, 1, 'mod_post_installation_messages', 3, 1, '', 1, '*'),
(102, 80, 'User Status', '', '', 6, 'status', NULL, NULL, NULL, NULL, 1, 'mod_user', 3, 1, '', 1, '*'),
(103, 70, 'Site', '', '', 1, 'icon', NULL, NULL, NULL, NULL, 1, 'mod_quickicon', 1, 1, '{\"context\":\"site_quickicon\",\"header_icon\":\"icon-desktop\",\"show_users\":\"1\",\"show_articles\":\"1\",\"show_categories\":\"1\",\"show_media\":\"1\",\"show_menuItems\":\"1\",\"show_modules\":\"1\",\"show_plugins\":\"1\",\"show_templates\":\"1\",\"layout\":\"_:default\",\"moduleclass_sfx\":\"\",\"cache\":1,\"cache_time\":900,\"style\":\"0\",\"module_tag\":\"div\",\"bootstrap_size\":\"12\",\"header_tag\":\"h2\",\"header_class\":\"\"}', 1, '*'),
(104, 71, 'System', '', '', 2, 'icon', NULL, NULL, NULL, NULL, 1, 'mod_quickicon', 1, 1, '{\"context\":\"system_quickicon\",\"header_icon\":\"icon-wrench\",\"show_global\":\"1\",\"show_checkin\":\"1\",\"show_cache\":\"1\",\"layout\":\"_:default\",\"moduleclass_sfx\":\"\",\"cache\":1,\"cache_time\":900,\"style\":\"0\",\"module_tag\":\"div\",\"bootstrap_size\":\"12\",\"header_tag\":\"h2\",\"header_class\":\"\"}', 1, '*'),
(105, 82, '3rd Party', '', '', 4, 'icon', NULL, NULL, NULL, NULL, 1, 'mod_quickicon', 1, 1, '{\"context\":\"mod_quickicon\",\"header_icon\":\"icon-boxes\",\"load_plugins\":\"1\",\"layout\":\"_:default\",\"moduleclass_sfx\":\"\",\"cache\":1,\"cache_time\":900,\"style\":\"0\",\"module_tag\":\"div\",\"bootstrap_size\":\"12\",\"header_tag\":\"h2\",\"header_class\":\"\"}', 1, '*'),
(106, 83, 'Help Dashboard', '', '', 1, 'cpanel-help', NULL, NULL, NULL, NULL, 1, 'mod_submenu', 1, 0, '{\"menutype\":\"*\",\"preset\":\"help\",\"layout\":\"_:default\",\"moduleclass_sfx\":\"\",\"style\":\"System-none\",\"module_tag\":\"div\",\"bootstrap_size\":\"12\",\"header_tag\":\"h2\",\"header_class\":\"\"}', 1, '*'),
(107, 84, 'Privacy Requests', '', '', 1, 'cpanel-privacy', NULL, NULL, NULL, NULL, 1, 'mod_privacy_dashboard', 1, 1, '{\"layout\":\"_:default\",\"moduleclass_sfx\":\"\",\"cache\":1,\"cache_time\":900,\"cachemode\":\"static\",\"style\":\"0\",\"module_tag\":\"div\",\"bootstrap_size\":\"12\",\"header_tag\":\"h2\",\"header_class\":\"\"}', 1, '*'),
(108, 85, 'Privacy Status', '', '', 1, 'cpanel-privacy', NULL, NULL, NULL, NULL, 1, 'mod_privacy_status', 1, 1, '{\"layout\":\"_:default\",\"moduleclass_sfx\":\"\",\"cache\":1,\"cache_time\":900,\"cachemode\":\"static\",\"style\":\"0\",\"module_tag\":\"div\",\"bootstrap_size\":\"12\",\"header_tag\":\"h2\",\"header_class\":\"\"}', 1, '*'),
(109, 96, 'Guided Tours', '', '', 1, 'status', NULL, NULL, NULL, NULL, 1, 'mod_guidedtours', 1, 1, '', 1, '*'),
(110, 97, 'Home (inicio)', '', NULL, 1, 'spivet_content', NULL, NULL, NULL, NULL, 1, 'mod_inicio', 1, 1, '{\"sliderPrincipal\":{\"sliderPrincipal0\":{\"typeRecurso\":\"0\",\"imageSlider\":\"images\\/Spivet\\/sliders\\/principal\\/portada_slider.png#joomlaImage:\\/\\/local-images\\/Spivet\\/sliders\\/principal\\/portada_slider.png?width=1366&height=718\",\"uriVideoSlider\":\"\",\"showTextRecurso\":\"0\",\"typeTextVideo\":\"0\",\"titleRecurso\":\"En Spivet lo hacemos posible\",\"descriptionRecurso\":\"Personaliza tu propio sitio web para ofrecer tus servicios\",\"textAdvanced_slider\":\"<h1>En Spivet lo hacemos posible<\\/h1>\",\"RedireccionSlider\":\"0\",\"mytextvalue\":\"Some text\",\"typeRedirectItemSlider\":\"0\",\"urlRedirectItemSlider\":\"\"},\"sliderPrincipal1\":{\"typeRecurso\":\"1\",\"imageSlider\":\"\",\"uriVideoSlider\":\"https:\\/\\/boletera.spivet.com.mx\\/images\\/Spivet\\/sliders\\/principal\\/Video_slider_final.mp4\",\"showTextRecurso\":\"0\",\"typeTextVideo\":\"0\",\"titleRecurso\":\"SPIVET summit m\\u00e9xico\",\"descriptionRecurso\":\"PUEBLA - 25 de FEBRERO de 2023\",\"textAdvanced_slider\":\"\",\"RedireccionSlider\":\"0\",\"mytextvalue\":\"Some text\",\"typeRedirectItemSlider\":\"0\",\"urlRedirectItemSlider\":\"\"}},\"colorTitles\":\"\",\"colorDescription\":\"\",\"actionShowSection2\":\"1\",\"titleOfertaSec2\":\"OFERTA ACAD\\u00c9MICA DE QUIENES CONFIARON EN NOSOTROS\",\"showInTypeBackground2\":\"0\",\"colorBackgroundSec2\":\"#000000\",\"imageBackgroundSec2\":\"images\\/Spivet\\/Fondos\\/nadador.png#joomlaImage:\\/\\/local-images\\/Spivet\\/Fondos\\/nadador.png?width=1440&height=803\",\"colorTitleOferta\":\"#ffffff\",\"actionShowSection3\":\"1\",\"titleBrandValues3\":\"QU\\u00c9 HACE LA PLATAFORMA\",\"textMainSec3\":\"CON SPIVET LO HACES POSIBLE\",\"textSecondarySec3\":\"Personaliza tu propio sitio web para ofrecer servicios que incluyan compra de ticket.\",\"showInButtonRedirect3\":\"1\",\"textButtonExtra\":\"Ver m\\u00e1s\",\"urlButtonExtra\":\"#\",\"typeRedirectButton3\":\"0\",\"colorTextBrandValues\":\"#ffffff\",\"showInTypeBackground3\":\"1\",\"colorBackgroundSec3\":\"#000000\",\"imageBackgroundSec3\":\"images\\/Spivet\\/Fondos\\/Imagen_que_hace_la_plataforma.png#joomlaImage:\\/\\/local-images\\/Spivet\\/Fondos\\/Imagen_que_hace_la_plataforma.png?width=1366&height=718\",\"itemValuesSec3\":{\"itemValuesSec30\":{\"itemImageValueSec3\":\"images\\/Spivet\\/ValoresMarca\\/icono_ticket2.png#joomlaImage:\\/\\/local-images\\/Spivet\\/ValoresMarca\\/icono_ticket2.png?width=1612&height=1612\",\"itemTitleValueSec3\":\"Servicio de boletera\",\"itemDescriptionValueSec3\":\"Automatizaci\\u00f3n de compra y entrega de ticket.\",\"redirectItemBrandValues\":\"0\",\"typeRedirectItemBrandVal3\":\"0\",\"urlRedirectItem\":\"\"},\"itemValuesSec31\":{\"itemImageValueSec3\":\"images\\/Spivet\\/ValoresMarca\\/icono_personalizacion2.png#joomlaImage:\\/\\/local-images\\/Spivet\\/ValoresMarca\\/icono_personalizacion2.png?width=1441&height=1441\",\"itemTitleValueSec3\":\"Dise\\u00f1a tu propio sitio web\",\"itemDescriptionValueSec3\":\"Personalizaci\\u00f3n del sitio web con colores, logos, informaci\\u00f3n y caracter\\u00edsticas del servicio\",\"redirectItemBrandValues\":\"0\",\"typeRedirectItemBrandVal3\":\"0\",\"urlRedirectItem\":\"\"}},\"actionShowSection4\":\"1\",\"titleVideo\":\"Otros servicios de Spivet\",\"subtitleVideo\":\"Adem\\u00e1s de ofrecer esta plataforma de boletera, la marca cuenta con:\",\"descriptionVideo\":\"<p>\\u00a0<\\/p>\\r\\n<ol>\\r\\n<li><strong>Streaming en vivo<\\/strong>: transmisi\\u00f3n en tiempo real de eventos como conferencias, paneles de discusi\\u00f3n, presentaciones y talleres.\\u00a0<br \\/><br \\/><\\/li>\\r\\n<li>\\r\\n<p><strong>Ticketing y registro de eventos<\\/strong>: ofrece un sistema de registro y venta de entradas para los eventos en l\\u00ednea. Los usuarios pueden registrarse, comprar entradas y recibir confirmaciones por correo electr\\u00f3nico, lo que facilita la gesti\\u00f3n de participantes y la recopilaci\\u00f3n de datos de asistencia.<\\/p>\\r\\n<\\/li>\\r\\n<\\/ol>\",\"linkVideo\":\"https:\\/\\/www.youtube.com\\/watch?v=pfGAcQqe-no\",\"videoOrientation\":\"0\",\"colorTextVideo\":\"#ffffff\",\"showInTypeBackground4\":\"0\",\"colorBackgroundSec4\":\"#000000\",\"imageBackgroundSec4\":\"\",\"actionShowSection5\":\"0\",\"titleIntegration5\":\"Titulo de integracion\",\"colorTextIntegration\":\"#ffffff\",\"actionShowSection6\":\"1\",\"titleAlianzas6\":\"Nuestras alianzas\",\"colorTextAlianzas\":\"#000000\",\"showInTypeBackground6\":\"0\",\"colorBackgroundSec6\":\"#ffffff\",\"imageBackgroundSec6\":\"\",\"contentSlidersSwiper\":{\"contentSlidersSwiper0\":{\"imageSlider\":\"images\\/Spivet\\/sliders\\/alianzas\\/logoSlider6.png#joomlaImage:\\/\\/local-images\\/Spivet\\/sliders\\/alianzas\\/logoSlider6.png?width=172&height=170\",\"titleSlider\":\"\",\"descriptionSlider\":\"\",\"addLink\":\"0\",\"uriLink\":\"\"},\"contentSlidersSwiper1\":{\"imageSlider\":\"images\\/Spivet\\/sliders\\/alianzas\\/logo_athlos_negro-03.png#joomlaImage:\\/\\/local-images\\/Spivet\\/sliders\\/alianzas\\/logo_athlos_negro-03.png?width=1772&height=501\",\"titleSlider\":\"\",\"descriptionSlider\":\"\",\"addLink\":\"0\",\"uriLink\":\"\"},\"contentSlidersSwiper2\":{\"imageSlider\":\"images\\/Spivet\\/sliders\\/alianzas\\/remeras_final-01.png#joomlaImage:\\/\\/local-images\\/Spivet\\/sliders\\/alianzas\\/remeras_final-01.png?width=2837&height=2799\",\"titleSlider\":\"\",\"descriptionSlider\":\"\",\"addLink\":\"0\",\"uriLink\":\"\"},\"contentSlidersSwiper3\":{\"imageSlider\":\"images\\/Spivet\\/sliders\\/alianzas\\/nuevo_logo_piquero_2022-08.png#joomlaImage:\\/\\/local-images\\/Spivet\\/sliders\\/alianzas\\/nuevo_logo_piquero_2022-08.png?width=345&height=205\",\"titleSlider\":\"\",\"descriptionSlider\":\"\",\"addLink\":\"0\",\"uriLink\":\"\"},\"contentSlidersSwiper4\":{\"imageSlider\":\"images\\/Spivet\\/sliders\\/alianzas\\/logo_unity_negro-06.png#joomlaImage:\\/\\/local-images\\/Spivet\\/sliders\\/alianzas\\/logo_unity_negro-06.png?width=11528&height=2230\",\"titleSlider\":\"\",\"descriptionSlider\":\"\",\"addLink\":\"0\",\"uriLink\":\"\"},\"contentSlidersSwiper5\":{\"imageSlider\":\"images\\/Spivet\\/sliders\\/alianzas\\/logo_unity_negro-07.png#joomlaImage:\\/\\/local-images\\/Spivet\\/sliders\\/alianzas\\/logo_unity_negro-07.png?width=14152&height=2782\",\"titleSlider\":\"\",\"descriptionSlider\":\"\",\"addLink\":\"0\",\"uriLink\":\"\"}},\"module_tag\":\"div\",\"bootstrap_size\":\"0\",\"header_tag\":\"h3\",\"header_class\":\"\",\"style\":\"0\"}', 0, '*'),
(111, 100, 'Menu cortina', '', NULL, 1, 'spivet_menu', NULL, NULL, '2024-02-12 18:45:34', NULL, 1, 'mod_curtain_menu', 1, 1, '{\"menutype\":\"mainmenu\",\"base\":\"\",\"startLevel\":1,\"endLevel\":0,\"showAllChildren\":1,\"showSubMenu\":\"1\",\"tag_id\":\"\",\"class_sfx\":\"\",\"window_open\":\"\",\"layout\":\"_:default\",\"moduleclass_sfx\":\"\",\"cache\":1,\"cache_time\":900,\"cachemode\":\"itemid\",\"bgCurtainColor\":\"rgba(0, 0, 0, 1)\",\"txtCurtainColor\":\"rgba(255, 255, 255, 1)\",\"txtCurtainColorHamburger\":\"rgba(255, 255, 255, 1)\",\"txtCurtainColorLineSpace\":\"rgba(255, 222, 8, 1)\",\"addPrimayLogo\":\"1\",\"sponsor\":\"\",\"iconoMenu\":\"images\\/Spivet\\/Icons\\/letraSpivet.png#joomlaImage:\\/\\/local-images\\/Spivet\\/Icons\\/letraSpivet.png?width=2837&height=2799\",\"backImage\":\"images\\/Spivet\\/Icons\\/fondo_cortina.png#joomlaImage:\\/\\/local-images\\/Spivet\\/Icons\\/fondo_cortina.png?width=406&height=430\",\"module_tag\":\"div\",\"bootstrap_size\":\"0\",\"header_tag\":\"h3\",\"header_class\":\"\",\"style\":\"0\"}', 0, '*'),
(112, 101, 'Footer pie de pagina', '', NULL, 1, 'spivet_footer', 527, '2024-02-23 00:19:33', NULL, NULL, 1, 'mod_footer_generic', 1, 1, '{\"logoFooter\":\"images\\/Spivet\\/Footer\\/logo_spivet_grande.png#joomlaImage:\\/\\/local-images\\/Spivet\\/Footer\\/logo_spivet_grande.png?width=5810&height=2042\",\"titleContacto\":\"Contacto\",\"itemContact\":{\"itemContact0\":{\"itemIconContact\":\"images\\/Spivet\\/Footer\\/icons\\/location.svg#joomlaImage:\\/\\/local-images\\/Spivet\\/Footer\\/icons\\/location.svg?width=13&height=19\",\"itemTitleContact\":\"Priv. 17 Poniente 3915 Col. Belisario Dominguez, Puebla. M\\u00e9xico\",\"addLinkRedirectContact\":\"0\",\"itemUrlLink\":\"\"}},\"titleRedes\":\"Redes Sociales\",\"itemRedes\":{\"itemRedes0\":{\"itemIconRed\":\"images\\/Spivet\\/Footer\\/icons\\/facebook.svg#joomlaImage:\\/\\/local-images\\/Spivet\\/Footer\\/icons\\/facebook.svg?width=32&height=32\",\"itemTitleRed\":\"@Spivet\",\"addLinkRedirectContact\":\"1\",\"itemUrlLink\":\"https:\\/\\/www.linkedin.com\\/company\\/piquero-tecnolog%C3%ADa-deportes\\/\"},\"itemRedes1\":{\"itemIconRed\":\"images\\/Spivet\\/Footer\\/icons\\/linkedin.svg#joomlaImage:\\/\\/local-images\\/Spivet\\/Footer\\/icons\\/linkedin.svg?width=32&height=32\",\"itemTitleRed\":\"Piquero Tecnolog\\u00eda y Deportes\",\"addLinkRedirectContact\":\"1\",\"itemUrlLink\":\"https:\\/\\/www.linkedin.com\\/company\\/piquero-tecnolog%C3%ADa-deportes\\/\"}},\"titleGeneric\":\"Mas informaci\\u00f3n\",\"itemGeneric\":{\"itemGeneric0\":{\"itemIconGeneric\":\"\",\"itemTitleGeneric\":\"Qui\\u00e9nes somos\",\"addLinkRedirectGeneric\":\"1\",\"itemUrlLinkGeneric\":\"https:\\/\\/boletera.spivet.com.mx\\/quienes-somos.html\"}},\"textCredits\":\"DERECHOS RESERVADOS SPIVET\",\"itemCredits\":{\"itemCredits0\":{\"itemTitleCredit\":\"Aviso de privacidad\",\"itemUrlLink\":\".\\/aviso-de-privacidad\"},\"itemCredits1\":{\"itemTitleCredit\":\" Pol\\u00edticas del servicio\",\"itemUrlLink\":\".\\/politicas-del-servicio\"}},\"module_tag\":\"div\",\"bootstrap_size\":\"0\",\"header_tag\":\"h3\",\"header_class\":\"\",\"style\":\"0\"}', 0, '*'),
(113, 102, 'Oferta (informacion detalle)', '', NULL, 1, 'spivet_content', NULL, NULL, NULL, NULL, 1, 'mod_oferta_detail', 1, 1, '{\"colorButton\":\"\",\"colorBorderBoton\":\"\",\"module_tag\":\"div\",\"bootstrap_size\":\"0\",\"header_tag\":\"h3\",\"header_class\":\"\",\"style\":\"0\"}', 0, '*'),
(114, 103, 'Servicios (Carrito de compra)', '', NULL, 1, 'spivet_content', NULL, NULL, NULL, NULL, 1, 'mod_buycar', 1, 1, '{\"module_tag\":\"div\",\"bootstrap_size\":\"0\",\"header_tag\":\"h3\",\"header_class\":\"\",\"style\":\"0\"}', 0, '*'),
(115, 104, 'Formulario de carrito de compra', '', NULL, 1, 'spivet_content', 527, '2024-02-20 23:44:36', NULL, NULL, 1, 'mod_buycarform', 1, 1, '{\"module_tag\":\"div\",\"bootstrap_size\":\"0\",\"header_tag\":\"h3\",\"header_class\":\"\",\"style\":\"0\"}', 0, '*'),
(116, 105, 'Aviso de privacidad', '', NULL, 1, 'spivet_content', 527, '2024-02-23 17:14:48', NULL, NULL, 1, 'mod_generic_pq', 1, 1, '{\"titlePage\":\"Aviso de Privacidad\",\"descriptionInHome\":\"<p style=\\\"text-align: left;\\\">AVISO DIRIGIDO A LOS TITULARES DE DATOS PERSONALES QUE OBRAN EN POSESI\\u00d3N DE \\u201cSpivet\\u201d<br \\/><br \\/>La protecci\\u00f3n de sus datos personales es muy importante para esta empresa, raz\\u00f3n por la cual, este AVISO DE PRIVACIDAD, elaborado para dar cumplimiento a la Ley Federal de Protecci\\u00f3n de Datos Personales en Posesi\\u00f3n de los Particulares, tiene como fin informarle el tipo de datos personales que recabamos de Usted, c\\u00f3mo los usamos, manejamos y aprovechamos, y con qui\\u00e9n los compartimos.<\\/p>\",\"imageHeader\":\"images\\/Spivet\\/sliders\\/principal\\/slider_spivet1.jpg#joomlaImage:\\/\\/local-images\\/Spivet\\/sliders\\/principal\\/slider_spivet1.jpg?width=2732&height=1436\",\"descriptionGeneral\":\"<p><strong>\\u00bfQu\\u00e9 datos personales recabamos de usted?<\\/strong><br \\/>Podemos solicitar informaci\\u00f3n personal, que puede variar seg\\u00fan el caso, relativa a:<br \\/>Su nombre, direcci\\u00f3n, fecha de nacimiento.<br \\/>Su correo electr\\u00f3nico y n\\u00famero telef\\u00f3nico.<br \\/>Sus datos patrimoniales como cuentas bancarias, bienes, entre otros.<br \\/>Informaci\\u00f3n relativa a la constituci\\u00f3n y personalidad con la que solicita informaci\\u00f3n (trat\\u00e1ndose de Personas Morales).<br \\/>Comprobantes oficiales que acrediten su identidad y la informaci\\u00f3n que Usted declara, as\\u00ed como su Clave \\u00danica de Registro de Poblaci\\u00f3n y Registro Federal de Contribuyentes.<br \\/><br \\/><strong>USO DE COOKIES:\\u00a0<\\/strong>En nuestra p\\u00e1gina www.boletera.spivet.com.mx, se implementa el uso de \\\"cookies\\\"; y otras tecnolog\\u00edas de publicidad para recopilar datos y direcciones IP; gracias a ellas podemos entender mejor el comportamiento de nuestros visitantes y ofrecerles contenido personalizado, de acuerdo a los servicios y soluciones que brinda Spivet.<br \\/>Es importante se\\u00f1alar que, de ninguna manera, con el uso de \\\"cookies\\\"; se extrae informaci\\u00f3n de su computadora que pudiera vulnerar a nuestros clientes y visitantes.<br \\/>En el caso de direcciones IP e informaci\\u00f3n personal se sigue el protocolo vigente de uso y protecci\\u00f3n de datos manejado por nuestra empresa.<br \\/><br \\/><strong>\\u00bfPara qu\\u00e9 usamos sus datos personales?<\\/strong><br \\/>Para el cumplimiento de las siguientes finalidades:<br \\/>Confirmar su identidad.<br \\/>Entender y atender sus necesidades con un fin meramente comercial, as\\u00ed como para dar cumplimiento a sus<br \\/>solicitudes, consultas o compras derivadas de la relaci\\u00f3n existente entre usted y esta persona moral.<br \\/>Brindarle asesor\\u00eda oportuna y personalizada.<br \\/>Verificar la informaci\\u00f3n proporcionada por Usted.<br \\/><br \\/><strong>\\u00bfCon qui\\u00e9n compartimos su informaci\\u00f3n y para qu\\u00e9 fines?<\\/strong><br \\/>Sus datos personales s\\u00f3lo son tratados por el personal adscrito dependiente de esta empresa y \\u00fanicamente podr\\u00e1n ser transferidos a empresas filiales y\\/o subsidiarias e incluso a terceras personas, nacionales o extranjeras para fines de marketing y calidad en el servicio, oblig\\u00e1ndose dichos terceros a tratar los datos personales de conformidad con este aviso de privacidad; salvo que los titulares respectivos manifiesten expresamente su oposici\\u00f3n, en t\\u00e9rminos de lo dispuesto por la Ley Federal de Protecci\\u00f3n de Datos Personales en Posesi\\u00f3n de los Particulares.<br \\/><br \\/><strong>\\u00bfC\\u00f3mo puede limitar el uso o divulgaci\\u00f3n de su informaci\\u00f3n personal?<\\/strong><br \\/>A trav\\u00e9s de los siguientes medios que ponemos a su disposici\\u00f3n:<br \\/>Presentando su solicitud personalmente en nuestro domicilio en horario de oficina en d\\u00edas h\\u00e1biles: de lunes a viernes de 09:00 a 18:00 horas, dirigida al Gerente Administrativo.<br \\/>Enviando correo electr\\u00f3nico a la siguiente direcci\\u00f3n electr\\u00f3nica:<strong> <\\/strong>beel@piquero.mx<b>\\u00a0 <\\/b><br \\/><br \\/><strong>\\u00bfC\\u00f3mo acceder, rectificar, cancelar u oponerse al tratamiento de sus datos personales?<\\/strong><br \\/>Podr\\u00e1n efectuarse presentando solicitud a trav\\u00e9s de los medios enunciados en el punto inmediato anterior, a trav\\u00e9s de un escrito, en el que se se\\u00f1ale m\\u00ednimo, la siguiente informaci\\u00f3n:<br \\/>Incluir el nombre y firma aut\\u00f3grafa del titular, as\\u00ed como un domicilio u otro medio para comunicarle la respuesta a su solicitud.<br \\/>Acompa\\u00f1ar los documentos oficiales que acrediten la identidad del titular.<br \\/>Incluir una descripci\\u00f3n clara y precisa de los datos personales respecto de los cuales ejercitar\\u00e1 los derechos que les confiere la Ley.<br \\/>Incluir cualquier elemento o documento que facilite la localizaci\\u00f3n de los datos personales de que se traten.<br \\/><br \\/><strong>\\u00bfC\\u00f3mo conocer los cambios al presente aviso de privacidad?<\\/strong><br \\/>El presente aviso de privacidad puede sufrir modificaciones, cambios o actualizaciones por lo cual nos<br \\/>comprometemos a mantenerlo informado de tal situaci\\u00f3n a trav\\u00e9s de alguno de los siguientes medios:<br \\/>En nuestra p\\u00e1gina de Internet www.boletera.spivet.com.mx<br \\/>Notificaci\\u00f3n a su correo electr\\u00f3nico.<br \\/>En la primera comunicaci\\u00f3n que tengamos con usted despu\\u00e9s del cambio.<br \\/><br \\/><strong>\\u00bfC\\u00f3mo contactarnos?<\\/strong><br \\/>Si usted tiene alguna duda sobre el presente aviso de privacidad, puede dirigirla a:<br \\/>La direcci\\u00f3n electr\\u00f3nica beel@piquero.mx<br \\/>La direcci\\u00f3n de correo postal dirigida al titular de la Gerencia Administrativa.<br \\/>Al tel\\u00e9fono: <a href=\\\"tel:+522221563677\\\">2221563677<\\/a><br \\/>Asimismo, ponemos a su entera disposici\\u00f3n copias del presente aviso de privacidad en nuestro domicilio.<br \\/><br \\/>Actualizaciones del aviso de privacidad<br \\/>\\u00daltima revisi\\u00f3n: febrero 2024<\\/p>\",\"module_tag\":\"div\",\"bootstrap_size\":\"0\",\"header_tag\":\"h3\",\"header_class\":\"\",\"style\":\"0\"}', 0, '*'),
(117, 106, 'Widget contactanos', '', NULL, 1, 'spivet_content', NULL, NULL, NULL, NULL, 1, 'mod_widget_contact', 1, 1, '{\"iconWidgetPrinicipal\":\"images\\/Spivet\\/Iconos%20de%20widget\\/Group%20297.png#joomlaImage:\\/\\/local-images\\/Spivet\\/Iconos de widget\\/Group 297.png?width=68&height=68\",\"iconWidgetWhatsapp\":\"images\\/Spivet\\/Iconos%20de%20widget\\/Group%20389.png#joomlaImage:\\/\\/local-images\\/Spivet\\/Iconos de widget\\/Group 389.png?width=44&height=44\",\"numberWhats\":\"\",\"iconWidgetForm\":\"images\\/Spivet\\/Iconos%20de%20widget\\/Group%20391.png#joomlaImage:\\/\\/local-images\\/Spivet\\/Iconos de widget\\/Group 391.png?width=44&height=44\",\"iconWidgetMessanger\":\"images\\/Spivet\\/Iconos%20de%20widget\\/Group%20392.png#joomlaImage:\\/\\/local-images\\/Spivet\\/Iconos de widget\\/Group 392.png?width=44&height=44\",\"linkMess\":\"\",\"iconWidgetShared\":\"images\\/Spivet\\/Iconos%20de%20widget\\/Group%20390.png#joomlaImage:\\/\\/local-images\\/Spivet\\/Iconos de widget\\/Group 390.png?width=45&height=42\",\"module_tag\":\"div\",\"bootstrap_size\":\"0\",\"header_tag\":\"h3\",\"header_class\":\"\",\"style\":\"0\"}', 0, '*'),
(118, 107, 'Quienes somos', '', NULL, 1, 'spivet_content', NULL, NULL, NULL, NULL, 1, 'mod_generic_advance_pq', 1, 1, '{\"titleGeneric\":\"Qui\\u00e9nes somos\",\"colorTitles\":\"#ffffff\",\"addSubtitleSect1\":\"0\",\"subtitleSection1\":\"\",\"backgroundSect1\":\"0\",\"backgroundColorSec1\":\"#000000\",\"backgroundImageSec1\":\"\",\"colorDescriptions\":\"#ffffff\",\"distributionSect1\":\"1\",\"itemsDistribution1Col\":{\"itemsDistribution1Col0\":{\"itemImageCol1\":\"images\\/Spivet\\/Iconos%20de%20widget\\/Group%20297.png#joomlaImage:\\/\\/local-images\\/Spivet\\/Iconos de widget\\/Group 297.png?width=68&height=68\",\"itemTextCol1\":\"<p style=\\\"text-align: justify;\\\">Sed sed nisi leo. Praesent tristique commodo vehicula. Nulla sed tincidunt neque, vel varius libero. Nam vulputate nunc vel purus ultrices hendrerit. Praesent sagittis nisi sed magna egestas, eget viverra tellus interdum. In vel nisi eu leo consectetur ullamcorper. Sed tincidunt condimentum metus nec convallis. Vestibulum vestibulum arcu sit amet urna volutpat, a dictum ante accumsan. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis dictum dignissim ipsum ut condimentum. Suspendisse euismod vulputate erat. Nam ornare non elit sit amet interdum. Vestibulum bibendum massa in mollis mattis. Donec sed dapibus dui. Donec quis elit ac magna bibendum consequat. Morbi vel purus vel lectus consectetur tincidunt.<\\/p>\\r\\n<p style=\\\"text-align: justify;\\\">Sed consequat ante sed consectetur porttitor. Curabitur at lectus ac enim blandit malesuada. Praesent a nulla sapien. Proin aliquet tempor arcu non laoreet. Sed sollicitudin, urna at gravida cursus, justo eros tristique justo, vitae imperdiet justo ipsum sed est. Ut imperdiet neque bibendum lectus consequat, consectetur consectetur risus tempus. Vivamus a ullamcorper odio. Donec finibus varius quam ac pellentesque. Etiam ut urna sed nisi volutpat mattis. In aliquet feugiat turpis egestas porta. Morbi ac tortor id dui volutpat dignissim. Maecenas condimentum eu neque sed commodo. Donec commodo posuere ante, ut laoreet enim iaculis vel. Donec sodales risus est, malesuada scelerisque dolor efficitur quis. In porttitor pretium eros, eu mattis quam eleifend a. Cras elementum in tortor id maximus.\\u00a0<\\/p>\\r\\n<p style=\\\"text-align: justify;\\\">\\u00a0Sed sed nisi leo. Praesent tristique commodo vehicula. Nulla sed tincidunt neque, vel varius libero. Nam vulputate nunc vel purus ultrices hendrerit. Praesent sagittis nisi sed magna egestas, eget viverra tellus interdum. In vel nisi eu leo consectetur ullamcorper. Sed tincidunt condimentum metus nec convallis. Vestibulum vestibulum arcu sit amet urna volutpat, a dictum ante accumsan. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis dictum dignissim ipsum ut condimentum. Suspendisse euismod vulputate erat. Nam ornare non elit sit amet interdum. Vestibulum bibendum massa in mollis mattis. Donec sed dapibus dui. Donec quis elit ac magna bibendum consequat. Morbi vel purus vel lectus consectetur tincidunt.<\\/p>\\r\\n<p style=\\\"text-align: justify;\\\">Sed consequat ante sed consectetur porttitor. Curabitur at lectus ac enim blandit malesuada. Praesent a nulla sapien. Proin aliquet tempor arcu non laoreet. Sed sollicitudin, urna at gravida cursus, justo eros tristique justo, vitae imperdiet justo ipsum sed est. Ut imperdiet neque bibendum lectus consequat, consectetur consectetur risus tempus. Vivamus a ullamcorper odio. Donec finibus varius quam ac pellentesque. Etiam ut urna sed nisi volutpat mattis. In aliquet feugiat turpis egestas porta. Morbi ac tortor id dui volutpat dignissim. Maecenas condimentum eu neque sed commodo. Donec commodo posuere ante, ut laoreet enim iaculis vel. Donec sodales risus est, malesuada scelerisque dolor efficitur quis. In porttitor pretium eros, eu mattis quam eleifend a. Cras elementum in tortor id maximus.\\u00a0<\\/p>\"},\"itemsDistribution1Col1\":{\"itemImageCol1\":\"images\\/Spivet\\/Imagenes%20genericas\\/fondo_cortina.png#joomlaImage:\\/\\/local-images\\/Spivet\\/Imagenes genericas\\/fondo_cortina.png?width=406&height=430\",\"itemTextCol1\":\"<p>\\u00a0Sed lobortis nunc a venenatis condimentum. Nullam ut quam at magna convallis dapibus. Nam tempus elementum tellus sed eleifend. Nam cursus nibh pulvinar enim dapibus, non elementum nunc egestas. In id massa at justo pulvinar pharetra. Quisque vel lectus vel nisi eleifend semper. Pellentesque interdum volutpat vestibulum. Nullam a libero arcu. Donec tempus libero nec justo finibus elementum. Nulla quis dui facilisis, consequat tellus id, dignissim urna. Quisque porta metus eget ligula dignissim, sed scelerisque lacus gravida. In mollis rhoncus velit. Integer lacinia fringilla felis sed rutrum. Duis id magna facilisis, volutpat metus non, ultrices purus. Ut ut orci malesuada, molestie magna vel, dapibus velit.<\\/p>\\r\\n<p>Suspendisse scelerisque vel sapien a blandit. Mauris non rhoncus felis, vel sagittis leo. Aenean rhoncus, urna non consequat semper, dui orci hendrerit purus, nec pellentesque justo libero tincidunt sem. Nunc viverra eu nisi at commodo. Duis quis purus purus. Fusce eu enim vel augue finibus feugiat. Donec eu dictum erat.\\u00a0<\\/p>\"}},\"itemsDistribution2Cols\":{\"itemsDistribution2Cols0\":{\"positionImageCol2\":\"0\",\"itemImageCol2\":\"images\\/Spivet\\/Fondos\\/nadador.png#joomlaImage:\\/\\/local-images\\/Spivet\\/Fondos\\/nadador.png?width=1440&height=803\",\"itemTextCol2\":\"<p><span style=\\\"color: #ffffff;\\\">Spivet es una de las submarcas de la startup mexicana Piquero Tecnolog\\u00eda &amp; Deportes. Nuestra misi\\u00f3n es proveer de servicios online a una peque\\u00f1a empresa o actor de \\u00e9sta industria que genera contenido educativo para su audiencia, catalizar el conocimiento es lo verdaderamente importante para nosotros.<\\/span><\\/p>\\r\\n<p><span style=\\\"color: #ffffff;\\\">\\u00bfQu\\u00e9 hacemos por ellos? Proveemos los medios tecnol\\u00f3gicos para su objetivo, es decir, ponemos su contenido en plataformas online que les permita expandirse a trav\\u00e9s de Internet.<\\/span><\\/p>\"},\"itemsDistribution2Cols1\":{\"positionImageCol2\":\"1\",\"itemImageCol2\":\"images\\/Spivet\\/Fondos\\/Imagen_que_hace_la_plataforma.png#joomlaImage:\\/\\/local-images\\/Spivet\\/Fondos\\/Imagen_que_hace_la_plataforma.png?width=1366&height=718\",\"itemTextCol2\":\"<p><strong>Misi\\u00f3n:<\\/strong> brandear y ayudar a monetizar el contenido educativo o<br \\/>de entretenimiento generado por una empresa, artista o experto a<br \\/>trav\\u00e9s de streaming.<\\/p>\\r\\n<p><br \\/><strong>Visi\\u00f3n:<\\/strong> Athlos pretende fortalecer, innovar y mejorar las competencias de nataci\\u00f3n.<\\/p>\\r\\n<p><br \\/><strong>Valores:<\\/strong> tecnolog\\u00eda, deporte, innovaci\\u00f3n, escalar, dinamismo,<br \\/>actualizaci\\u00f3n.<\\/p>\"}},\"module_tag\":\"div\",\"bootstrap_size\":\"0\",\"header_tag\":\"h3\",\"header_class\":\"\",\"style\":\"0\"}', 0, '*'),
(119, 108, 'Compatibilidad del sitio', '', NULL, 1, 'spivet_content', NULL, NULL, NULL, NULL, 1, 'mod_generic_pq', 1, 1, '{\"titlePage\":\"Compatibilidad del sitio\",\"descriptionInHome\":\"\",\"imageHeader\":\"images\\/Spivet\\/Fondos\\/Imagen_que_hace_la_plataforma.png#joomlaImage:\\/\\/local-images\\/Spivet\\/Fondos\\/Imagen_que_hace_la_plataforma.png?width=1366&height=718\",\"descriptionGeneral\":\"<p><strong>Compatibilidad con Navegadores de Internet para Spivet Boletera<\\/strong><\\/p>\\r\\n<p>\\u00a0<\\/p>\\r\\n<p><strong>Equipo de c\\u00f3mputo<\\/strong><\\/p>\\r\\n<p><strong>Sobre Mozilla Firefox<\\/strong><\\/p>\\r\\n<p>Para la visualizaci\\u00f3n correcta y deseable de los contenidos utilizando Firefox como navegador deber\\u00e1 ser a partir de la versi\\u00f3n 13.0.1. Por otro lado es multiplataforma, y est\\u00e1 disponible para varios sistemas operativos como Microsoft Windows, GNU\\/Linux, Mac OS X y as\\u00ed como en otras plataformas. Es compatible con varios lenguajes web, incluyendo HTML, XML, XHTML, SVG 1.1 (parcial), CSS 1, 2 y 3,ECMA Script (JavaScript), DOM, MathML, DTD, XSLT, XPath, e im\\u00e1genes PNG con transparencia alfa. Tambi\\u00e9n incorpora las normas propuestas por el WHATWG,y es compatible con el elemento HTML Canvas.<\\/p>\\r\\n<p><em>Requisitos del sistema operativo<\\/em><\\/p>\\r\\n<p>El navegador puede ejecutarse en m\\u00faltiples sistemas operativos mediante compilaciones realizadas desde el c\\u00f3digo fuente de Firefox; sin embargo, las distribuciones oficiales son para los siguientes sistemas operativos: Microsoft Windows (2000, XP, Server 2003, Vista \\u00f3 7), Mac OS X (Leopard, Snow Leopard o Lion) y Linux (con las siguientes librer\\u00edas instaladas: GTK2+ 2.10 \\u00f3 posterior, GLib 2.12 \\u00f3 posterior, Pango 1.14 \\u00f3 posterior, X.Org 1.0 \\u00f3 posterior aunque es recomendado la 1.7 \\u00f3 posterior, libstdc++ 4.3 \\u00f3 posterior). Los requisitos oficiales recomendados para el hardware son Pentium 4 \\u00f3 posteriores con soporte SSE2 y 512 MB RAM para la versi\\u00f3n de Windows, u ordenadores Macintosh con un procesador Intel x86 y 512 MB RAM.<\\/p>\\r\\n<p><em>Arquitecturas compatibles<\\/em><\\/p>\\r\\n<p>El motor Gecko en el cual se basa Firefox es compatible con diversas arquitecturas y plataformas.4 El desarrollo del navegador se centra en las versiones Linux (arquitecturas x86 y x86-64), Windows (x86) y Mac OS X (x86, x86-64 y PPC).<\\/p>\\r\\n<p>\\u00a0<em>Visualizaci\\u00f3n<\\/em><\\/p>\\r\\n<p>Algunos usuarios notan que algunos sitios no se visualizan correctamente en Firefox. Sin embargo, esto es un problema relativamente raro y no espec\\u00edfico de Firefox que ocurre cuando los sitios web no siguen los est\\u00e1ndares W3C y emplean c\\u00f3digos espec\\u00edficos utilizando controles ActiveX o el lenguaje VBScript, los cuales son tecnolog\\u00eda propietaria de Microsoft que no utiliza est\\u00e1ndares W3C.<\\/p>\\r\\n<p>Existe una extensi\\u00f3n para Firefox llamada \\u00abIE Tab\\u00bb que permite utilizar el motor de renderizado de Internet Explorer dentro de una pesta\\u00f1a de Mozilla Firefox. Esto para resolver problemas de visualizaci\\u00f3n para las p\\u00e1ginas que utilizan tecnolog\\u00edas espec\\u00edficas de Microsoft, pero expone al usuario a los riesgos de posibles vulnerabilidades de Internet Explorer. Esta extensi\\u00f3n s\\u00f3lo est\\u00e1 disponible para el sistema operativo Windows.\\u00a0<\\/p>\\r\\n<p><strong>Sobre Google Chrome<\\/strong><\\/p>\\r\\n<p>Para la visualizaci\\u00f3n correcta y deseable de los contenidos utilizando Google Chrome como navegador deber\\u00e1 ser a partir de la versi\\u00f3n 20.0 o posterior. Es un navegador web gratuito proporcionado por Google en el que destacan su velocidad y su compatibilidad con la gran mayor\\u00eda de p\\u00e1ginas web.<\\/p>\\r\\n<p><strong>Sobre Internet Explorer<\\/strong><\\/p>\\r\\n<p>Deber\\u00e1 ser a partir de la versi\\u00f3n 9.0 o posterior. Particularmente en la 9 de Internet Explorer incorpora considerables avances en la interpretaci\\u00f3n de est\\u00e1ndares web respecto a sus precursores, incluyendo soporte para algunas propiedades y todos los selectores de CSS3 (entre ellos la propiedad CSS3 de borde radial o border-radius), gesti\\u00f3n de perfiles de color ICC v2 o v4, adem\\u00e1s de mejoras de rendimiento como la inclusi\\u00f3n de aceleraci\\u00f3n por hardware para el proceso de renderizado de p\\u00e1ginas web mediante el uso de Direct2D y DirectWrite, junto con un nuevo motor de JavaScript denominado Chakra.IE9 tambi\\u00e9n soporta apartes del lenguaje HTML5 (incluyendo las etiquetas &lt;audio&gt;, &lt;video&gt; y &lt;canvas&gt;), adem\\u00e1s de la especificaci\\u00f3n de gr\\u00e1ficos vectoriales SVG y el formato de archivo tipogr\\u00e1fico web Web Open Font Format (WOFF).5 6<\\/p>\\r\\n<p>Los requerimientos del sistema son Windows Vista SP2 o Windows Server 2008 SP2 (en estos sistemas operativos se necesita adem\\u00e1s que se encuentre instalada la denominada actualizaci\\u00f3n de plataforma), adem\\u00e1s de Windows 7 y Windows Server 2008 R2. Los sistemas operativos Windows XP, Windows 2003 y anteriores no est\\u00e1n soportados.<\\/p>\\r\\n<p><em>Visualizaci\\u00f3n<\\/em><\\/p>\\r\\n<p>Algunas p\\u00e1ginas web aparecen en blanco o no se ven bien con Internet Explorer 9. Por ejemplo, es posible que falten partes del sitio web, que la informaci\\u00f3n de una tabla est\\u00e9 mal ubicada, o que los colores y los textos no sean los correctos. Es posible que algunos sitios no se vean en absoluto.<\\/p>\\r\\n<p><strong>Equipos m\\u00f3viles<\\/strong><\\/p>\\r\\n<p>La tecnolog\\u00eda y t\\u00e9cnica de desarrollo de la plataforma que sostiene al portal Spivet actualmente busca cubrir las mayores especificaciones y aspectos de compatibilidad de los navegadores y aparatos m\\u00f3viles.<\\/p>\\r\\n<p>La diversidad de navegadores y sistemas operativos m\\u00f3viles intervienen en la experiencia del usuario al momento de visitar el portal de la instituci\\u00f3n de tal manera que se proporcionan las siguientes l\\u00edneas de apoyo t\\u00e9cnico para garantizar la vista correcta y esperada.<\\/p>\",\"module_tag\":\"div\",\"bootstrap_size\":\"0\",\"header_tag\":\"h3\",\"header_class\":\"\",\"style\":\"0\"}', 0, '*'),
(120, 109, 'Políticas del servicio', '', NULL, 1, 'spivet_content', NULL, NULL, NULL, NULL, 1, 'mod_generic_pq', 1, 1, '{\"titlePage\":\"Pol\\u00edticas del servicio\",\"descriptionInHome\":\"<p>AVISO DIRIGIDO A LOS TITULARES DE DATOS PERSONALES QUE OBRAN EN POSESI\\u00d3N DE \\u201cSpivet\\u201d<br \\/><br \\/>La protecci\\u00f3n de sus datos personales es muy importante para esta empresa, raz\\u00f3n por la cual, este AVISO DE PRIVACIDAD, elaborado para dar cumplimiento a la Ley Federal de Protecci\\u00f3n de Datos Personales en Posesi\\u00f3n de los Particulares, tiene como fin informarle el tipo de datos personales que recabamos de Usted, c\\u00f3mo los usamos, manejamos y aprovechamos, y con qui\\u00e9n los compartimos.<\\/p>\",\"imageHeader\":\"images\\/Spivet\\/Fondos\\/Imagen_que_hace_la_plataforma.png#joomlaImage:\\/\\/local-images\\/Spivet\\/Fondos\\/Imagen_que_hace_la_plataforma.png?width=1366&height=718\",\"descriptionGeneral\":\"<p><strong>\\u00bfQu\\u00e9 datos personales recabamos de usted?<\\/strong><br \\/>Podemos solicitar informaci\\u00f3n personal, que puede variar seg\\u00fan el caso, relativa a:<br \\/>Su nombre, direcci\\u00f3n, fecha de nacimiento.<br \\/>Su correo electr\\u00f3nico y n\\u00famero telef\\u00f3nico.<br \\/>Sus datos patrimoniales como cuentas bancarias, bienes, entre otros.<br \\/>Informaci\\u00f3n relativa a la constituci\\u00f3n y personalidad con la que solicita informaci\\u00f3n (trat\\u00e1ndose de Personas Morales).<br \\/>Comprobantes oficiales que acrediten su identidad y la informaci\\u00f3n que Usted declara, as\\u00ed como su Clave \\u00danica de Registro de Poblaci\\u00f3n y Registro Federal de Contribuyentes.<br \\/><br \\/><strong>USO DE COOKIES:\\u00a0<\\/strong>En nuestra p\\u00e1gina www.boletera.spivet.com.mx, se implementa el uso de \\\"cookies\\\"; y otras tecnolog\\u00edas de publicidad para recopilar datos y direcciones IP; gracias a ellas podemos entender mejor el comportamiento de nuestros visitantes y ofrecerles contenido personalizado, de acuerdo a los servicios y soluciones que brinda Spivet.<br \\/>Es importante se\\u00f1alar que, de ninguna manera, con el uso de \\\"cookies\\\"; se extrae informaci\\u00f3n de su computadora que pudiera vulnerar a nuestros clientes y visitantes.<br \\/>En el caso de direcciones IP e informaci\\u00f3n personal se sigue el protocolo vigente de uso y protecci\\u00f3n de datos manejado por nuestra empresa.<br \\/><br \\/><strong>\\u00bfPara qu\\u00e9 usamos sus datos personales?<\\/strong><br \\/>Para el cumplimiento de las siguientes finalidades:<br \\/>Confirmar su identidad.<br \\/>Entender y atender sus necesidades con un fin meramente comercial, as\\u00ed como para dar cumplimiento a sus<br \\/>solicitudes, consultas o compras derivadas de la relaci\\u00f3n existente entre usted y esta persona moral.<br \\/>Brindarle asesor\\u00eda oportuna y personalizada.<br \\/>Verificar la informaci\\u00f3n proporcionada por Usted.<br \\/><br \\/><strong>\\u00bfCon qui\\u00e9n compartimos su informaci\\u00f3n y para qu\\u00e9 fines?<\\/strong><br \\/>Sus datos personales s\\u00f3lo son tratados por el personal adscrito dependiente de esta empresa y \\u00fanicamente podr\\u00e1n ser transferidos a empresas filiales y\\/o subsidiarias e incluso a terceras personas, nacionales o extranjeras para fines de marketing y calidad en el servicio, oblig\\u00e1ndose dichos terceros a tratar los datos personales de conformidad con este aviso de privacidad; salvo que los titulares respectivos manifiesten expresamente su oposici\\u00f3n, en t\\u00e9rminos de lo dispuesto por la Ley Federal de Protecci\\u00f3n de Datos Personales en Posesi\\u00f3n de los Particulares.<br \\/><br \\/><strong>\\u00bfC\\u00f3mo puede limitar el uso o divulgaci\\u00f3n de su informaci\\u00f3n personal?<\\/strong><br \\/>A trav\\u00e9s de los siguientes medios que ponemos a su disposici\\u00f3n:<br \\/>Presentando su solicitud personalmente en nuestro domicilio en horario de oficina en d\\u00edas h\\u00e1biles: de lunes a viernes de 09:00 a 18:00 horas, dirigida al Gerente Administrativo.<br \\/>Enviando correo electr\\u00f3nico a la siguiente direcci\\u00f3n electr\\u00f3nica:<strong> <\\/strong>beel@piquero.mx<b>\\u00a0 <\\/b><br \\/><br \\/><strong>\\u00bfC\\u00f3mo acceder, rectificar, cancelar u oponerse al tratamiento de sus datos personales?<\\/strong><br \\/>Podr\\u00e1n efectuarse presentando solicitud a trav\\u00e9s de los medios enunciados en el punto inmediato anterior, a trav\\u00e9s de un escrito, en el que se se\\u00f1ale m\\u00ednimo, la siguiente informaci\\u00f3n:<br \\/>Incluir el nombre y firma aut\\u00f3grafa del titular, as\\u00ed como un domicilio u otro medio para comunicarle la respuesta a su solicitud.<br \\/>Acompa\\u00f1ar los documentos oficiales que acrediten la identidad del titular.<br \\/>Incluir una descripci\\u00f3n clara y precisa de los datos personales respecto de los cuales ejercitar\\u00e1 los derechos que les confiere la Ley.<br \\/>Incluir cualquier elemento o documento que facilite la localizaci\\u00f3n de los datos personales de que se traten.<br \\/><br \\/><strong>\\u00bfC\\u00f3mo conocer los cambios al presente aviso de privacidad?<\\/strong><br \\/>El presente aviso de privacidad puede sufrir modificaciones, cambios o actualizaciones por lo cual nos<br \\/>comprometemos a mantenerlo informado de tal situaci\\u00f3n a trav\\u00e9s de alguno de los siguientes medios:<br \\/>En nuestra p\\u00e1gina de Internet www.boletera.spivet.com.mx<br \\/>Notificaci\\u00f3n a su correo electr\\u00f3nico.<br \\/>En la primera comunicaci\\u00f3n que tengamos con usted despu\\u00e9s del cambio.<br \\/><br \\/><strong>\\u00bfC\\u00f3mo contactarnos?<\\/strong><br \\/>Si usted tiene alguna duda sobre el presente aviso de privacidad, puede dirigirla a:<br \\/>La direcci\\u00f3n electr\\u00f3nica beel@piquero.mx<br \\/>La direcci\\u00f3n de correo postal dirigida al titular de la Gerencia Administrativa.<br \\/>Al tel\\u00e9fono: <a href=\\\"tel:+522221563677\\\">2221563677<\\/a><br \\/>Asimismo, ponemos a su entera disposici\\u00f3n copias del presente aviso de privacidad en nuestro domicilio.<br \\/><br \\/>Actualizaciones del aviso de privacidad<br \\/>\\u00daltima revisi\\u00f3n: febrero 2024<\\/p>\",\"module_tag\":\"div\",\"bootstrap_size\":\"0\",\"header_tag\":\"h3\",\"header_class\":\"\",\"style\":\"0\"}', 0, '*'),
(121, 110, 'Cinta de anuncios ó promociones', '', NULL, 1, 'spivet_tape_information', 527, '2024-02-23 22:31:24', '2024-02-23 17:50:53', NULL, 1, 'mod_information_tape', 1, 1, '{\"informationTape\":\"<p style=\\\"text-align: center;\\\">Pr\\u00f3ximos eventos de capacitaci\\u00f3n, aplican descuentos ver<span style=\\\"color: #f1c40f;\\\"> <a style=\\\"color: #f1c40f;\\\" href=\\\"servicios.html\\\">AQU\\u00cd<\\/a><\\/span>\\u00a0 \\u00a0 \\u00a0 \\u00a0 \\u00a0 \\u00a0 \\u00a0 \\u00a0 \\u00a0 \\u00a0 \\u00a0 \\u00a0 \\u00a0 \\u00a0 \\u00a0 \\u00a0 \\u00a0Pr\\u00f3ximos eventos de capacitaci\\u00f3n, aplican descuentos ver<span style=\\\"color: #f1c40f;\\\"> <a style=\\\"color: #f1c40f;\\\" href=\\\"servicios.html\\\">AQU\\u00cd <\\/a><\\/span><\\/p>\",\"module_tag\":\"div\",\"bootstrap_size\":\"0\",\"header_tag\":\"h3\",\"header_class\":\"\",\"style\":\"0\"}', 0, '*');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_modules_menu`
--

CREATE TABLE `bol96_modules_menu` (
  `moduleid` int(11) NOT NULL DEFAULT 0,
  `menuid` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bol96_modules_menu`
--

INSERT INTO `bol96_modules_menu` (`moduleid`, `menuid`) VALUES
(1, 0),
(2, 0),
(3, 0),
(4, 0),
(6, 0),
(7, 0),
(8, 0),
(9, 0),
(10, 0),
(12, 0),
(14, 0),
(15, 0),
(16, 0),
(17, 0),
(79, 0),
(86, 0),
(87, 0),
(88, 0),
(89, 0),
(90, 0),
(91, 0),
(92, 0),
(93, 0),
(94, 0),
(95, 0),
(96, 0),
(97, 0),
(98, 0),
(99, 0),
(100, 0),
(101, 0),
(102, 0),
(103, 0),
(104, 0),
(105, 0),
(106, 0),
(107, 0),
(108, 0),
(109, 0),
(110, 101),
(111, 0),
(112, 0),
(113, 106),
(114, 110),
(115, 109),
(116, 105),
(117, 0),
(118, 103),
(119, 111),
(120, 112),
(121, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_newsfeeds`
--

CREATE TABLE `bol96_newsfeeds` (
  `catid` int(11) NOT NULL DEFAULT 0,
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `alias` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `link` varchar(2048) NOT NULL DEFAULT '',
  `published` tinyint(4) NOT NULL DEFAULT 0,
  `numarticles` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `cache_time` int(10) UNSIGNED NOT NULL DEFAULT 3600,
  `checked_out` int(10) UNSIGNED DEFAULT NULL,
  `checked_out_time` datetime DEFAULT NULL,
  `ordering` int(11) NOT NULL DEFAULT 0,
  `rtl` tinyint(4) NOT NULL DEFAULT 0,
  `access` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `language` char(7) NOT NULL DEFAULT '',
  `params` text NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified` datetime NOT NULL,
  `modified_by` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `metakey` text DEFAULT NULL,
  `metadesc` text NOT NULL,
  `metadata` text NOT NULL,
  `publish_up` datetime DEFAULT NULL,
  `publish_down` datetime DEFAULT NULL,
  `description` text NOT NULL,
  `version` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `hits` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `images` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_overrider`
--

CREATE TABLE `bol96_overrider` (
  `id` int(11) NOT NULL COMMENT 'Primary Key',
  `constant` varchar(255) NOT NULL,
  `string` text NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_postinstall_messages`
--

CREATE TABLE `bol96_postinstall_messages` (
  `postinstall_message_id` bigint(20) UNSIGNED NOT NULL,
  `extension_id` bigint(20) NOT NULL DEFAULT 700 COMMENT 'FK to #__extensions',
  `title_key` varchar(255) NOT NULL DEFAULT '' COMMENT 'Lang key for the title',
  `description_key` varchar(255) NOT NULL DEFAULT '' COMMENT 'Lang key for description',
  `action_key` varchar(255) NOT NULL DEFAULT '',
  `language_extension` varchar(255) NOT NULL DEFAULT 'com_postinstall' COMMENT 'Extension holding lang keys',
  `language_client_id` tinyint(4) NOT NULL DEFAULT 1,
  `type` varchar(10) NOT NULL DEFAULT 'link' COMMENT 'Message type - message, link, action',
  `action_file` varchar(255) DEFAULT '' COMMENT 'RAD URI to the PHP file containing action method',
  `action` varchar(255) DEFAULT '' COMMENT 'Action method name or URL',
  `condition_file` varchar(255) DEFAULT NULL COMMENT 'RAD URI to file holding display condition method',
  `condition_method` varchar(255) DEFAULT NULL COMMENT 'Display condition method, must return boolean',
  `version_introduced` varchar(50) NOT NULL DEFAULT '3.2.0' COMMENT 'Version when this message was introduced',
  `enabled` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bol96_postinstall_messages`
--

INSERT INTO `bol96_postinstall_messages` (`postinstall_message_id`, `extension_id`, `title_key`, `description_key`, `action_key`, `language_extension`, `language_client_id`, `type`, `action_file`, `action`, `condition_file`, `condition_method`, `version_introduced`, `enabled`) VALUES
(1, 227, 'COM_CPANEL_WELCOME_BEGINNERS_TITLE', 'COM_CPANEL_WELCOME_BEGINNERS_MESSAGE', '', 'com_cpanel', 1, 'message', '', '', '', '', '3.2.0', 1),
(2, 227, 'COM_CPANEL_MSG_STATS_COLLECTION_TITLE', 'COM_CPANEL_MSG_STATS_COLLECTION_BODY', '', 'com_cpanel', 1, 'message', '', '', 'admin://components/com_admin/postinstall/statscollection.php', 'admin_postinstall_statscollection_condition', '3.5.0', 1),
(3, 227, 'PLG_SYSTEM_UPDATENOTIFICATION_POSTINSTALL_UPDATECACHETIME', 'PLG_SYSTEM_UPDATENOTIFICATION_POSTINSTALL_UPDATECACHETIME_BODY', 'PLG_SYSTEM_UPDATENOTIFICATION_POSTINSTALL_UPDATECACHETIME_ACTION', 'plg_system_updatenotification', 1, 'action', 'site://plugins/system/updatenotification/postinstall/updatecachetime.php', 'updatecachetime_postinstall_action', 'site://plugins/system/updatenotification/postinstall/updatecachetime.php', 'updatecachetime_postinstall_condition', '3.6.3', 1),
(4, 227, 'PLG_SYSTEM_HTTPHEADERS_POSTINSTALL_INTRODUCTION_TITLE', 'PLG_SYSTEM_HTTPHEADERS_POSTINSTALL_INTRODUCTION_BODY', 'PLG_SYSTEM_HTTPHEADERS_POSTINSTALL_INTRODUCTION_ACTION', 'plg_system_httpheaders', 1, 'action', 'site://plugins/system/httpheaders/postinstall/introduction.php', 'httpheaders_postinstall_action', 'site://plugins/system/httpheaders/postinstall/introduction.php', 'httpheaders_postinstall_condition', '4.0.0', 1),
(5, 227, 'COM_USERS_POSTINSTALL_MULTIFACTORAUTH_TITLE', 'COM_USERS_POSTINSTALL_MULTIFACTORAUTH_BODY', 'COM_USERS_POSTINSTALL_MULTIFACTORAUTH_ACTION', 'com_users', 1, 'action', 'admin://components/com_users/postinstall/multifactorauth.php', 'com_users_postinstall_mfa_action', 'admin://components/com_users/postinstall/multifactorauth.php', 'com_users_postinstall_mfa_condition', '4.2.0', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_privacy_consents`
--

CREATE TABLE `bol96_privacy_consents` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `state` int(11) NOT NULL DEFAULT 1,
  `created` datetime NOT NULL,
  `subject` varchar(255) NOT NULL DEFAULT '',
  `body` text NOT NULL,
  `remind` tinyint(4) NOT NULL DEFAULT 0,
  `token` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_privacy_requests`
--

CREATE TABLE `bol96_privacy_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL DEFAULT '',
  `requested_at` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `request_type` varchar(25) NOT NULL DEFAULT '',
  `confirm_token` varchar(100) NOT NULL DEFAULT '',
  `confirm_token_created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_redirect_links`
--

CREATE TABLE `bol96_redirect_links` (
  `id` int(10) UNSIGNED NOT NULL,
  `old_url` varchar(2048) NOT NULL,
  `new_url` varchar(2048) DEFAULT NULL,
  `referer` varchar(2048) NOT NULL,
  `comment` varchar(255) NOT NULL DEFAULT '',
  `hits` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `published` tinyint(4) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `header` smallint(6) NOT NULL DEFAULT 301
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_scheduler_tasks`
--

CREATE TABLE `bol96_scheduler_tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `asset_id` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'FK to the #__assets table.',
  `title` varchar(255) NOT NULL DEFAULT '',
  `type` varchar(128) NOT NULL COMMENT 'unique identifier for job defined by plugin',
  `execution_rules` text DEFAULT NULL COMMENT 'Execution Rules, Unprocessed',
  `cron_rules` text DEFAULT NULL COMMENT 'Processed execution rules, crontab-like JSON form',
  `state` tinyint(4) NOT NULL DEFAULT 0,
  `last_exit_code` int(11) NOT NULL DEFAULT 0 COMMENT 'Exit code when job was last run',
  `last_execution` datetime DEFAULT NULL COMMENT 'Timestamp of last run',
  `next_execution` datetime DEFAULT NULL COMMENT 'Timestamp of next (planned) run, referred for execution on trigger',
  `times_executed` int(11) DEFAULT 0 COMMENT 'Count of successful triggers',
  `times_failed` int(11) DEFAULT 0 COMMENT 'Count of failures',
  `locked` datetime DEFAULT NULL,
  `priority` smallint(6) NOT NULL DEFAULT 0,
  `ordering` int(11) NOT NULL DEFAULT 0 COMMENT 'Configurable list ordering',
  `cli_exclusive` smallint(6) NOT NULL DEFAULT 0 COMMENT 'If 1, the task is only accessible via CLI',
  `params` text NOT NULL,
  `note` text DEFAULT NULL,
  `created` datetime NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `checked_out` int(10) UNSIGNED DEFAULT NULL,
  `checked_out_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_schemas`
--

CREATE TABLE `bol96_schemas` (
  `extension_id` int(11) NOT NULL,
  `version_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bol96_schemas`
--

INSERT INTO `bol96_schemas` (`extension_id`, `version_id`) VALUES
(227, '4.3.2-2023-05-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_session`
--

CREATE TABLE `bol96_session` (
  `session_id` varbinary(192) NOT NULL,
  `client_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `guest` tinyint(3) UNSIGNED DEFAULT 1,
  `time` int(11) NOT NULL DEFAULT 0,
  `data` mediumtext DEFAULT NULL,
  `userid` int(11) DEFAULT 0,
  `username` varchar(150) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bol96_session`
--

INSERT INTO `bol96_session` (`session_id`, `client_id`, `guest`, `time`, `data`, `userid`, `username`) VALUES
(0x3538366a353166336f336567746b303070336a70683033316433, 1, 0, 1708972197, 'joomla|s:1656:\"TzoyNDoiSm9vbWxhXFJlZ2lzdHJ5XFJlZ2lzdHJ5IjozOntzOjc6IgAqAGRhdGEiO086ODoic3RkQ2xhc3MiOjY6e3M6Nzoic2Vzc2lvbiI7Tzo4OiJzdGRDbGFzcyI6Mzp7czo3OiJjb3VudGVyIjtpOjg1O3M6NToidGltZXIiO086ODoic3RkQ2xhc3MiOjM6e3M6NToic3RhcnQiO2k6MTcwODk3MDc3NTtzOjQ6Imxhc3QiO2k6MTcwODk3MjE5NztzOjM6Im5vdyI7aToxNzA4OTcyMTk3O31zOjU6InRva2VuIjtzOjMyOiJlMThjYWM4YWI5ODI5NGUxYzZiZGQ1YWI2YmNlNDQzMiI7fXM6ODoicmVnaXN0cnkiO086MjQ6Ikpvb21sYVxSZWdpc3RyeVxSZWdpc3RyeSI6Mzp7czo3OiIAKgBkYXRhIjtPOjg6InN0ZENsYXNzIjozOntzOjEzOiJjb21faW5zdGFsbGVyIjtPOjg6InN0ZENsYXNzIjoyOntzOjc6Im1lc3NhZ2UiO3M6MDoiIjtzOjE3OiJleHRlbnNpb25fbWVzc2FnZSI7czowOiIiO31zOjExOiJjb21fbW9kdWxlcyI7Tzo4OiJzdGRDbGFzcyI6MTp7czo3OiJtb2R1bGVzIjtPOjg6InN0ZENsYXNzIjoxOntzOjE6IjAiO086ODoic3RkQ2xhc3MiOjI6e3M6OToiY2xpZW50X2lkIjtpOjA7czo0OiJsaXN0IjthOjQ6e3M6OToiZGlyZWN0aW9uIjtzOjM6ImFzYyI7czo1OiJsaW1pdCI7aToyMDtzOjg6Im9yZGVyaW5nIjtzOjEwOiJhLnBvc2l0aW9uIjtzOjU6InN0YXJ0IjtkOjA7fX19fXM6OToiY29tX3VzZXJzIjtPOjg6InN0ZENsYXNzIjoxOntzOjQ6ImVkaXQiO086ODoic3RkQ2xhc3MiOjI6e3M6NDoidXNlciI7Tzo4OiJzdGRDbGFzcyI6Mjp7czoyOiJpZCI7YTowOnt9czo0OiJkYXRhIjtOO31zOjQ6Im5vdGUiO086ODoic3RkQ2xhc3MiOjE6e3M6NDoiZGF0YSI7Tjt9fX19czoxNDoiACoAaW5pdGlhbGl6ZWQiO2I6MDtzOjEyOiIAKgBzZXBhcmF0b3IiO3M6MToiLiI7fXM6NDoidXNlciI7TzoyMDoiSm9vbWxhXENNU1xVc2VyXFVzZXIiOjE6e3M6MjoiaWQiO2k6NTI3O31zOjE5OiJwbGdfc3lzdGVtX3dlYmF1dGhuIjtPOjg6InN0ZENsYXNzIjoxOntzOjk6InJldHVyblVybCI7czo0NToiaHR0cHM6Ly9ib2xldGVyYS5zcGl2ZXQuY29tLm14L2FkbWluaXN0cmF0b3IvIjt9czo5OiJjb21fdXNlcnMiO086ODoic3RkQ2xhc3MiOjE6e3M6MTE6Im1mYV9jaGVja2VkIjtpOjE7fXM6MTE6ImFwcGxpY2F0aW9uIjtPOjg6InN0ZENsYXNzIjoxOntzOjU6InF1ZXVlIjthOjA6e319fXM6MTQ6IgAqAGluaXRpYWxpemVkIjtiOjA7czoxMjoiACoAc2VwYXJhdG9yIjtzOjE6Ii4iO30=\";', 527, 'admin@spivet.com.mx'),
(0x35663639736a716b6d766b6c306437723536616b71306272326f, 0, 1, 1708972400, 'joomla|s:628:\"TzoyNDoiSm9vbWxhXFJlZ2lzdHJ5XFJlZ2lzdHJ5IjozOntzOjc6IgAqAGRhdGEiO086ODoic3RkQ2xhc3MiOjM6e3M6Nzoic2Vzc2lvbiI7Tzo4OiJzdGRDbGFzcyI6Mjp7czo3OiJjb3VudGVyIjtpOjE7czo1OiJ0aW1lciI7Tzo4OiJzdGRDbGFzcyI6Mzp7czo1OiJzdGFydCI7aToxNzA4OTcyNDAwO3M6NDoibGFzdCI7aToxNzA4OTcyNDAwO3M6Mzoibm93IjtpOjE3MDg5NzI0MDA7fX1zOjg6InJlZ2lzdHJ5IjtPOjI0OiJKb29tbGFcUmVnaXN0cnlcUmVnaXN0cnkiOjM6e3M6NzoiACoAZGF0YSI7Tzo4OiJzdGRDbGFzcyI6MDp7fXM6MTQ6IgAqAGluaXRpYWxpemVkIjtiOjA7czoxMjoiACoAc2VwYXJhdG9yIjtzOjE6Ii4iO31zOjQ6InVzZXIiO086MjA6Ikpvb21sYVxDTVNcVXNlclxVc2VyIjoxOntzOjI6ImlkIjtpOjA7fX1zOjE0OiIAKgBpbml0aWFsaXplZCI7YjowO3M6MTI6IgAqAHNlcGFyYXRvciI7czoxOiIuIjt9\";', 0, ''),
(0x356a6d723737336c6374336e3166633072356b7531756b327275, 0, 1, 1708969431, 'joomla|s:628:\"TzoyNDoiSm9vbWxhXFJlZ2lzdHJ5XFJlZ2lzdHJ5IjozOntzOjc6IgAqAGRhdGEiO086ODoic3RkQ2xhc3MiOjM6e3M6Nzoic2Vzc2lvbiI7Tzo4OiJzdGRDbGFzcyI6Mjp7czo3OiJjb3VudGVyIjtpOjE7czo1OiJ0aW1lciI7Tzo4OiJzdGRDbGFzcyI6Mzp7czo1OiJzdGFydCI7aToxNzA4OTY5NDMxO3M6NDoibGFzdCI7aToxNzA4OTY5NDMxO3M6Mzoibm93IjtpOjE3MDg5Njk0MzE7fX1zOjg6InJlZ2lzdHJ5IjtPOjI0OiJKb29tbGFcUmVnaXN0cnlcUmVnaXN0cnkiOjM6e3M6NzoiACoAZGF0YSI7Tzo4OiJzdGRDbGFzcyI6MDp7fXM6MTQ6IgAqAGluaXRpYWxpemVkIjtiOjA7czoxMjoiACoAc2VwYXJhdG9yIjtzOjE6Ii4iO31zOjQ6InVzZXIiO086MjA6Ikpvb21sYVxDTVNcVXNlclxVc2VyIjoxOntzOjI6ImlkIjtpOjA7fX1zOjE0OiIAKgBpbml0aWFsaXplZCI7YjowO3M6MTI6IgAqAHNlcGFyYXRvciI7czoxOiIuIjt9\";', 0, ''),
(0x377164767667747236633761376c686a36323938676d38383065, 0, 1, 1708967618, 'joomla|s:628:\"TzoyNDoiSm9vbWxhXFJlZ2lzdHJ5XFJlZ2lzdHJ5IjozOntzOjc6IgAqAGRhdGEiO086ODoic3RkQ2xhc3MiOjM6e3M6Nzoic2Vzc2lvbiI7Tzo4OiJzdGRDbGFzcyI6Mjp7czo3OiJjb3VudGVyIjtpOjE7czo1OiJ0aW1lciI7Tzo4OiJzdGRDbGFzcyI6Mzp7czo1OiJzdGFydCI7aToxNzA4OTY3NjE3O3M6NDoibGFzdCI7aToxNzA4OTY3NjE3O3M6Mzoibm93IjtpOjE3MDg5Njc2MTc7fX1zOjg6InJlZ2lzdHJ5IjtPOjI0OiJKb29tbGFcUmVnaXN0cnlcUmVnaXN0cnkiOjM6e3M6NzoiACoAZGF0YSI7Tzo4OiJzdGRDbGFzcyI6MDp7fXM6MTQ6IgAqAGluaXRpYWxpemVkIjtiOjA7czoxMjoiACoAc2VwYXJhdG9yIjtzOjE6Ii4iO31zOjQ6InVzZXIiO086MjA6Ikpvb21sYVxDTVNcVXNlclxVc2VyIjoxOntzOjI6ImlkIjtpOjA7fX1zOjE0OiIAKgBpbml0aWFsaXplZCI7YjowO3M6MTI6IgAqAHNlcGFyYXRvciI7czoxOiIuIjt9\";', 0, ''),
(0x38706570766333706368383175377063306c6130667132326130, 0, 1, 1708970909, 'joomla|s:632:\"TzoyNDoiSm9vbWxhXFJlZ2lzdHJ5XFJlZ2lzdHJ5IjozOntzOjc6IgAqAGRhdGEiO086ODoic3RkQ2xhc3MiOjM6e3M6Nzoic2Vzc2lvbiI7Tzo4OiJzdGRDbGFzcyI6Mjp7czo1OiJ0aW1lciI7Tzo4OiJzdGRDbGFzcyI6Mzp7czo1OiJzdGFydCI7aToxNzA4OTcwNDE1O3M6NDoibGFzdCI7aToxNzA4OTcwOTA4O3M6Mzoibm93IjtpOjE3MDg5NzA5MDk7fXM6NzoiY291bnRlciI7aToyMDt9czo4OiJyZWdpc3RyeSI7TzoyNDoiSm9vbWxhXFJlZ2lzdHJ5XFJlZ2lzdHJ5IjozOntzOjc6IgAqAGRhdGEiO086ODoic3RkQ2xhc3MiOjA6e31zOjE0OiIAKgBpbml0aWFsaXplZCI7YjowO3M6MTI6IgAqAHNlcGFyYXRvciI7czoxOiIuIjt9czo0OiJ1c2VyIjtPOjIwOiJKb29tbGFcQ01TXFVzZXJcVXNlciI6MTp7czoyOiJpZCI7aTowO319czoxNDoiACoAaW5pdGlhbGl6ZWQiO2I6MDtzOjEyOiIAKgBzZXBhcmF0b3IiO3M6MToiLiI7fQ==\";', 0, ''),
(0x397333656c6e33726a367469756b766133353667316f65353274, 0, 1, 1708962190, 'joomla|s:628:\"TzoyNDoiSm9vbWxhXFJlZ2lzdHJ5XFJlZ2lzdHJ5IjozOntzOjc6IgAqAGRhdGEiO086ODoic3RkQ2xhc3MiOjM6e3M6Nzoic2Vzc2lvbiI7Tzo4OiJzdGRDbGFzcyI6Mjp7czo3OiJjb3VudGVyIjtpOjE7czo1OiJ0aW1lciI7Tzo4OiJzdGRDbGFzcyI6Mzp7czo1OiJzdGFydCI7aToxNzA4OTYyMTkwO3M6NDoibGFzdCI7aToxNzA4OTYyMTkwO3M6Mzoibm93IjtpOjE3MDg5NjIxOTA7fX1zOjg6InJlZ2lzdHJ5IjtPOjI0OiJKb29tbGFcUmVnaXN0cnlcUmVnaXN0cnkiOjM6e3M6NzoiACoAZGF0YSI7Tzo4OiJzdGRDbGFzcyI6MDp7fXM6MTQ6IgAqAGluaXRpYWxpemVkIjtiOjA7czoxMjoiACoAc2VwYXJhdG9yIjtzOjE6Ii4iO31zOjQ6InVzZXIiO086MjA6Ikpvb21sYVxDTVNcVXNlclxVc2VyIjoxOntzOjI6ImlkIjtpOjA7fX1zOjE0OiIAKgBpbml0aWFsaXplZCI7YjowO3M6MTI6IgAqAHNlcGFyYXRvciI7czoxOiIuIjt9\";', 0, ''),
(0x613269723930756c6d637075356170726a6664676c7672357534, 0, 1, 1708963978, 'joomla|s:628:\"TzoyNDoiSm9vbWxhXFJlZ2lzdHJ5XFJlZ2lzdHJ5IjozOntzOjc6IgAqAGRhdGEiO086ODoic3RkQ2xhc3MiOjM6e3M6Nzoic2Vzc2lvbiI7Tzo4OiJzdGRDbGFzcyI6Mjp7czo3OiJjb3VudGVyIjtpOjE7czo1OiJ0aW1lciI7Tzo4OiJzdGRDbGFzcyI6Mzp7czo1OiJzdGFydCI7aToxNzA4OTYzOTc4O3M6NDoibGFzdCI7aToxNzA4OTYzOTc4O3M6Mzoibm93IjtpOjE3MDg5NjM5Nzg7fX1zOjg6InJlZ2lzdHJ5IjtPOjI0OiJKb29tbGFcUmVnaXN0cnlcUmVnaXN0cnkiOjM6e3M6NzoiACoAZGF0YSI7Tzo4OiJzdGRDbGFzcyI6MDp7fXM6MTQ6IgAqAGluaXRpYWxpemVkIjtiOjA7czoxMjoiACoAc2VwYXJhdG9yIjtzOjE6Ii4iO31zOjQ6InVzZXIiO086MjA6Ikpvb21sYVxDTVNcVXNlclxVc2VyIjoxOntzOjI6ImlkIjtpOjA7fX1zOjE0OiIAKgBpbml0aWFsaXplZCI7YjowO3M6MTI6IgAqAHNlcGFyYXRvciI7czoxOiIuIjt9\";', 0, ''),
(0x616f743335636a3532736c377669376838723474333370647168, 0, 1, 1708958610, 'joomla|s:628:\"TzoyNDoiSm9vbWxhXFJlZ2lzdHJ5XFJlZ2lzdHJ5IjozOntzOjc6IgAqAGRhdGEiO086ODoic3RkQ2xhc3MiOjM6e3M6Nzoic2Vzc2lvbiI7Tzo4OiJzdGRDbGFzcyI6Mjp7czo3OiJjb3VudGVyIjtpOjE7czo1OiJ0aW1lciI7Tzo4OiJzdGRDbGFzcyI6Mzp7czo1OiJzdGFydCI7aToxNzA4OTU4NjEwO3M6NDoibGFzdCI7aToxNzA4OTU4NjEwO3M6Mzoibm93IjtpOjE3MDg5NTg2MTA7fX1zOjg6InJlZ2lzdHJ5IjtPOjI0OiJKb29tbGFcUmVnaXN0cnlcUmVnaXN0cnkiOjM6e3M6NzoiACoAZGF0YSI7Tzo4OiJzdGRDbGFzcyI6MDp7fXM6MTQ6IgAqAGluaXRpYWxpemVkIjtiOjA7czoxMjoiACoAc2VwYXJhdG9yIjtzOjE6Ii4iO31zOjQ6InVzZXIiO086MjA6Ikpvb21sYVxDTVNcVXNlclxVc2VyIjoxOntzOjI6ImlkIjtpOjA7fX1zOjE0OiIAKgBpbml0aWFsaXplZCI7YjowO3M6MTI6IgAqAHNlcGFyYXRvciI7czoxOiIuIjt9\";', 0, ''),
(0x646531746869746132626e696b6f3876766b36396a7068346561, 0, 1, 1708971226, 'joomla|s:628:\"TzoyNDoiSm9vbWxhXFJlZ2lzdHJ5XFJlZ2lzdHJ5IjozOntzOjc6IgAqAGRhdGEiO086ODoic3RkQ2xhc3MiOjM6e3M6Nzoic2Vzc2lvbiI7Tzo4OiJzdGRDbGFzcyI6Mjp7czo3OiJjb3VudGVyIjtpOjE7czo1OiJ0aW1lciI7Tzo4OiJzdGRDbGFzcyI6Mzp7czo1OiJzdGFydCI7aToxNzA4OTcxMjI1O3M6NDoibGFzdCI7aToxNzA4OTcxMjI1O3M6Mzoibm93IjtpOjE3MDg5NzEyMjU7fX1zOjg6InJlZ2lzdHJ5IjtPOjI0OiJKb29tbGFcUmVnaXN0cnlcUmVnaXN0cnkiOjM6e3M6NzoiACoAZGF0YSI7Tzo4OiJzdGRDbGFzcyI6MDp7fXM6MTQ6IgAqAGluaXRpYWxpemVkIjtiOjA7czoxMjoiACoAc2VwYXJhdG9yIjtzOjE6Ii4iO31zOjQ6InVzZXIiO086MjA6Ikpvb21sYVxDTVNcVXNlclxVc2VyIjoxOntzOjI6ImlkIjtpOjA7fX1zOjE0OiIAKgBpbml0aWFsaXplZCI7YjowO3M6MTI6IgAqAHNlcGFyYXRvciI7czoxOiIuIjt9\";', 0, ''),
(0x673236616a627370646769636366703639376d6e3736626b3039, 0, 1, 1708964233, 'joomla|s:632:\"TzoyNDoiSm9vbWxhXFJlZ2lzdHJ5XFJlZ2lzdHJ5IjozOntzOjc6IgAqAGRhdGEiO086ODoic3RkQ2xhc3MiOjM6e3M6Nzoic2Vzc2lvbiI7Tzo4OiJzdGRDbGFzcyI6Mjp7czo3OiJjb3VudGVyIjtpOjE0O3M6NToidGltZXIiO086ODoic3RkQ2xhc3MiOjM6e3M6NToic3RhcnQiO2k6MTcwODk2Mzk4NjtzOjQ6Imxhc3QiO2k6MTcwODk2NDIzMjtzOjM6Im5vdyI7aToxNzA4OTY0MjMzO319czo4OiJyZWdpc3RyeSI7TzoyNDoiSm9vbWxhXFJlZ2lzdHJ5XFJlZ2lzdHJ5IjozOntzOjc6IgAqAGRhdGEiO086ODoic3RkQ2xhc3MiOjA6e31zOjE0OiIAKgBpbml0aWFsaXplZCI7YjowO3M6MTI6IgAqAHNlcGFyYXRvciI7czoxOiIuIjt9czo0OiJ1c2VyIjtPOjIwOiJKb29tbGFcQ01TXFVzZXJcVXNlciI6MTp7czoyOiJpZCI7aTowO319czoxNDoiACoAaW5pdGlhbGl6ZWQiO2I6MDtzOjEyOiIAKgBzZXBhcmF0b3IiO3M6MToiLiI7fQ==\";', 0, ''),
(0x68343236326c3838736d76386472717073303766673962327570, 0, 1, 1708958394, 'joomla|s:628:\"TzoyNDoiSm9vbWxhXFJlZ2lzdHJ5XFJlZ2lzdHJ5IjozOntzOjc6IgAqAGRhdGEiO086ODoic3RkQ2xhc3MiOjM6e3M6Nzoic2Vzc2lvbiI7Tzo4OiJzdGRDbGFzcyI6Mjp7czo3OiJjb3VudGVyIjtpOjM7czo1OiJ0aW1lciI7Tzo4OiJzdGRDbGFzcyI6Mzp7czo1OiJzdGFydCI7aToxNzA4OTU4Mzk0O3M6NDoibGFzdCI7aToxNzA4OTU4Mzk0O3M6Mzoibm93IjtpOjE3MDg5NTgzOTQ7fX1zOjg6InJlZ2lzdHJ5IjtPOjI0OiJKb29tbGFcUmVnaXN0cnlcUmVnaXN0cnkiOjM6e3M6NzoiACoAZGF0YSI7Tzo4OiJzdGRDbGFzcyI6MDp7fXM6MTQ6IgAqAGluaXRpYWxpemVkIjtiOjA7czoxMjoiACoAc2VwYXJhdG9yIjtzOjE6Ii4iO31zOjQ6InVzZXIiO086MjA6Ikpvb21sYVxDTVNcVXNlclxVc2VyIjoxOntzOjI6ImlkIjtpOjA7fX1zOjE0OiIAKgBpbml0aWFsaXplZCI7YjowO3M6MTI6IgAqAHNlcGFyYXRvciI7czoxOiIuIjt9\";', 0, ''),
(0x69387175366364686d706f367075706b7531396965656b717033, 0, 1, 1708964486, 'joomla|s:628:\"TzoyNDoiSm9vbWxhXFJlZ2lzdHJ5XFJlZ2lzdHJ5IjozOntzOjc6IgAqAGRhdGEiO086ODoic3RkQ2xhc3MiOjM6e3M6Nzoic2Vzc2lvbiI7Tzo4OiJzdGRDbGFzcyI6Mjp7czo3OiJjb3VudGVyIjtpOjI7czo1OiJ0aW1lciI7Tzo4OiJzdGRDbGFzcyI6Mzp7czo1OiJzdGFydCI7aToxNzA4OTY0NDc5O3M6NDoibGFzdCI7aToxNzA4OTY0NDc5O3M6Mzoibm93IjtpOjE3MDg5NjQ0ODY7fX1zOjg6InJlZ2lzdHJ5IjtPOjI0OiJKb29tbGFcUmVnaXN0cnlcUmVnaXN0cnkiOjM6e3M6NzoiACoAZGF0YSI7Tzo4OiJzdGRDbGFzcyI6MDp7fXM6MTQ6IgAqAGluaXRpYWxpemVkIjtiOjA7czoxMjoiACoAc2VwYXJhdG9yIjtzOjE6Ii4iO31zOjQ6InVzZXIiO086MjA6Ikpvb21sYVxDTVNcVXNlclxVc2VyIjoxOntzOjI6ImlkIjtpOjA7fX1zOjE0OiIAKgBpbml0aWFsaXplZCI7YjowO3M6MTI6IgAqAHNlcGFyYXRvciI7czoxOiIuIjt9\";', 0, ''),
(0x696a6f346464303675733073393438756a656b63316d32687171, 0, 1, 1708964504, 'joomla|s:628:\"TzoyNDoiSm9vbWxhXFJlZ2lzdHJ5XFJlZ2lzdHJ5IjozOntzOjc6IgAqAGRhdGEiO086ODoic3RkQ2xhc3MiOjM6e3M6Nzoic2Vzc2lvbiI7Tzo4OiJzdGRDbGFzcyI6Mjp7czo3OiJjb3VudGVyIjtpOjI7czo1OiJ0aW1lciI7Tzo4OiJzdGRDbGFzcyI6Mzp7czo1OiJzdGFydCI7aToxNzA4OTY0NTAyO3M6NDoibGFzdCI7aToxNzA4OTY0NTAyO3M6Mzoibm93IjtpOjE3MDg5NjQ1MDQ7fX1zOjg6InJlZ2lzdHJ5IjtPOjI0OiJKb29tbGFcUmVnaXN0cnlcUmVnaXN0cnkiOjM6e3M6NzoiACoAZGF0YSI7Tzo4OiJzdGRDbGFzcyI6MDp7fXM6MTQ6IgAqAGluaXRpYWxpemVkIjtiOjA7czoxMjoiACoAc2VwYXJhdG9yIjtzOjE6Ii4iO31zOjQ6InVzZXIiO086MjA6Ikpvb21sYVxDTVNcVXNlclxVc2VyIjoxOntzOjI6ImlkIjtpOjA7fX1zOjE0OiIAKgBpbml0aWFsaXplZCI7YjowO3M6MTI6IgAqAHNlcGFyYXRvciI7czoxOiIuIjt9\";', 0, ''),
(0x6e316e6d6663716971313169356c68367464756f7473386f6562, 0, 1, 1708960422, 'joomla|s:628:\"TzoyNDoiSm9vbWxhXFJlZ2lzdHJ5XFJlZ2lzdHJ5IjozOntzOjc6IgAqAGRhdGEiO086ODoic3RkQ2xhc3MiOjM6e3M6Nzoic2Vzc2lvbiI7Tzo4OiJzdGRDbGFzcyI6Mjp7czo3OiJjb3VudGVyIjtpOjE7czo1OiJ0aW1lciI7Tzo4OiJzdGRDbGFzcyI6Mzp7czo1OiJzdGFydCI7aToxNzA4OTYwNDIyO3M6NDoibGFzdCI7aToxNzA4OTYwNDIyO3M6Mzoibm93IjtpOjE3MDg5NjA0MjI7fX1zOjg6InJlZ2lzdHJ5IjtPOjI0OiJKb29tbGFcUmVnaXN0cnlcUmVnaXN0cnkiOjM6e3M6NzoiACoAZGF0YSI7Tzo4OiJzdGRDbGFzcyI6MDp7fXM6MTQ6IgAqAGluaXRpYWxpemVkIjtiOjA7czoxMjoiACoAc2VwYXJhdG9yIjtzOjE6Ii4iO31zOjQ6InVzZXIiO086MjA6Ikpvb21sYVxDTVNcVXNlclxVc2VyIjoxOntzOjI6ImlkIjtpOjA7fX1zOjE0OiIAKgBpbml0aWFsaXplZCI7YjowO3M6MTI6IgAqAHNlcGFyYXRvciI7czoxOiIuIjt9\";', 0, ''),
(0x6e386737713361706f38686c703463697161756e386530673630, 0, 1, 1708972400, 'joomla|s:628:\"TzoyNDoiSm9vbWxhXFJlZ2lzdHJ5XFJlZ2lzdHJ5IjozOntzOjc6IgAqAGRhdGEiO086ODoic3RkQ2xhc3MiOjM6e3M6Nzoic2Vzc2lvbiI7Tzo4OiJzdGRDbGFzcyI6Mjp7czo3OiJjb3VudGVyIjtpOjE7czo1OiJ0aW1lciI7Tzo4OiJzdGRDbGFzcyI6Mzp7czo1OiJzdGFydCI7aToxNzA4OTcyNDAwO3M6NDoibGFzdCI7aToxNzA4OTcyNDAwO3M6Mzoibm93IjtpOjE3MDg5NzI0MDA7fX1zOjg6InJlZ2lzdHJ5IjtPOjI0OiJKb29tbGFcUmVnaXN0cnlcUmVnaXN0cnkiOjM6e3M6NzoiACoAZGF0YSI7Tzo4OiJzdGRDbGFzcyI6MDp7fXM6MTQ6IgAqAGluaXRpYWxpemVkIjtiOjA7czoxMjoiACoAc2VwYXJhdG9yIjtzOjE6Ii4iO31zOjQ6InVzZXIiO086MjA6Ikpvb21sYVxDTVNcVXNlclxVc2VyIjoxOntzOjI6ImlkIjtpOjA7fX1zOjE0OiIAKgBpbml0aWFsaXplZCI7YjowO3M6MTI6IgAqAHNlcGFyYXRvciI7czoxOiIuIjt9\";', 0, ''),
(0x706d366c63616d3675716863763275686e6f6f30366b71637370, 0, 1, 1708964488, 'joomla|s:628:\"TzoyNDoiSm9vbWxhXFJlZ2lzdHJ5XFJlZ2lzdHJ5IjozOntzOjc6IgAqAGRhdGEiO086ODoic3RkQ2xhc3MiOjM6e3M6Nzoic2Vzc2lvbiI7Tzo4OiJzdGRDbGFzcyI6Mjp7czo3OiJjb3VudGVyIjtpOjI7czo1OiJ0aW1lciI7Tzo4OiJzdGRDbGFzcyI6Mzp7czo1OiJzdGFydCI7aToxNzA4OTY0NDg3O3M6NDoibGFzdCI7aToxNzA4OTY0NDg3O3M6Mzoibm93IjtpOjE3MDg5NjQ0ODg7fX1zOjg6InJlZ2lzdHJ5IjtPOjI0OiJKb29tbGFcUmVnaXN0cnlcUmVnaXN0cnkiOjM6e3M6NzoiACoAZGF0YSI7Tzo4OiJzdGRDbGFzcyI6MDp7fXM6MTQ6IgAqAGluaXRpYWxpemVkIjtiOjA7czoxMjoiACoAc2VwYXJhdG9yIjtzOjE6Ii4iO31zOjQ6InVzZXIiO086MjA6Ikpvb21sYVxDTVNcVXNlclxVc2VyIjoxOntzOjI6ImlkIjtpOjA7fX1zOjE0OiIAKgBpbml0aWFsaXplZCI7YjowO3M6MTI6IgAqAHNlcGFyYXRvciI7czoxOiIuIjt9\";', 0, ''),
(0x7438627437736774646434686e6c38617435676c693775393573, 0, 1, 1708965824, 'joomla|s:628:\"TzoyNDoiSm9vbWxhXFJlZ2lzdHJ5XFJlZ2lzdHJ5IjozOntzOjc6IgAqAGRhdGEiO086ODoic3RkQ2xhc3MiOjM6e3M6Nzoic2Vzc2lvbiI7Tzo4OiJzdGRDbGFzcyI6Mjp7czo3OiJjb3VudGVyIjtpOjE7czo1OiJ0aW1lciI7Tzo4OiJzdGRDbGFzcyI6Mzp7czo1OiJzdGFydCI7aToxNzA4OTY1ODI0O3M6NDoibGFzdCI7aToxNzA4OTY1ODI0O3M6Mzoibm93IjtpOjE3MDg5NjU4MjQ7fX1zOjg6InJlZ2lzdHJ5IjtPOjI0OiJKb29tbGFcUmVnaXN0cnlcUmVnaXN0cnkiOjM6e3M6NzoiACoAZGF0YSI7Tzo4OiJzdGRDbGFzcyI6MDp7fXM6MTQ6IgAqAGluaXRpYWxpemVkIjtiOjA7czoxMjoiACoAc2VwYXJhdG9yIjtzOjE6Ii4iO31zOjQ6InVzZXIiO086MjA6Ikpvb21sYVxDTVNcVXNlclxVc2VyIjoxOntzOjI6ImlkIjtpOjA7fX1zOjE0OiIAKgBpbml0aWFsaXplZCI7YjowO3M6MTI6IgAqAHNlcGFyYXRvciI7czoxOiIuIjt9\";', 0, ''),
(0x74733834646970696a3262736e6c71373474706d696936623136, 0, 1, 1708973011, 'joomla|s:628:\"TzoyNDoiSm9vbWxhXFJlZ2lzdHJ5XFJlZ2lzdHJ5IjozOntzOjc6IgAqAGRhdGEiO086ODoic3RkQ2xhc3MiOjM6e3M6Nzoic2Vzc2lvbiI7Tzo4OiJzdGRDbGFzcyI6Mjp7czo3OiJjb3VudGVyIjtpOjE7czo1OiJ0aW1lciI7Tzo4OiJzdGRDbGFzcyI6Mzp7czo1OiJzdGFydCI7aToxNzA4OTczMDExO3M6NDoibGFzdCI7aToxNzA4OTczMDExO3M6Mzoibm93IjtpOjE3MDg5NzMwMTE7fX1zOjg6InJlZ2lzdHJ5IjtPOjI0OiJKb29tbGFcUmVnaXN0cnlcUmVnaXN0cnkiOjM6e3M6NzoiACoAZGF0YSI7Tzo4OiJzdGRDbGFzcyI6MDp7fXM6MTQ6IgAqAGluaXRpYWxpemVkIjtiOjA7czoxMjoiACoAc2VwYXJhdG9yIjtzOjE6Ii4iO31zOjQ6InVzZXIiO086MjA6Ikpvb21sYVxDTVNcVXNlclxVc2VyIjoxOntzOjI6ImlkIjtpOjA7fX1zOjE0OiIAKgBpbml0aWFsaXplZCI7YjowO3M6MTI6IgAqAHNlcGFyYXRvciI7czoxOiIuIjt9\";', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_tags`
--

CREATE TABLE `bol96_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `lft` int(11) NOT NULL DEFAULT 0,
  `rgt` int(11) NOT NULL DEFAULT 0,
  `level` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `path` varchar(400) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL,
  `alias` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  `description` mediumtext NOT NULL,
  `published` tinyint(4) NOT NULL DEFAULT 0,
  `checked_out` int(10) UNSIGNED DEFAULT NULL,
  `checked_out_time` datetime DEFAULT NULL,
  `access` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `params` text NOT NULL,
  `metadesc` varchar(1024) NOT NULL COMMENT 'The meta description for the page.',
  `metakey` varchar(1024) NOT NULL DEFAULT '' COMMENT 'The keywords for the page.',
  `metadata` varchar(2048) NOT NULL COMMENT 'JSON encoded metadata properties.',
  `created_user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_time` datetime NOT NULL,
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified_user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `modified_time` datetime NOT NULL,
  `images` text NOT NULL,
  `urls` text NOT NULL,
  `hits` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `language` char(7) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `publish_up` datetime DEFAULT NULL,
  `publish_down` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bol96_tags`
--

INSERT INTO `bol96_tags` (`id`, `parent_id`, `lft`, `rgt`, `level`, `path`, `title`, `alias`, `note`, `description`, `published`, `checked_out`, `checked_out_time`, `access`, `params`, `metadesc`, `metakey`, `metadata`, `created_user_id`, `created_time`, `created_by_alias`, `modified_user_id`, `modified_time`, `images`, `urls`, `hits`, `language`, `version`, `publish_up`, `publish_down`) VALUES
(1, 0, 0, 1, 0, '', 'ROOT', 'root', '', '', 1, NULL, NULL, 1, '', '', '', '', 527, '2024-02-01 18:54:23', '', 527, '2024-02-01 18:54:23', '', '', 0, '*', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_template_overrides`
--

CREATE TABLE `bol96_template_overrides` (
  `id` int(10) UNSIGNED NOT NULL,
  `template` varchar(50) NOT NULL DEFAULT '',
  `hash_id` varchar(255) NOT NULL DEFAULT '',
  `extension_id` int(11) DEFAULT 0,
  `state` tinyint(4) NOT NULL DEFAULT 0,
  `action` varchar(50) NOT NULL DEFAULT '',
  `client_id` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `created_date` datetime NOT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_template_styles`
--

CREATE TABLE `bol96_template_styles` (
  `id` int(10) UNSIGNED NOT NULL,
  `template` varchar(50) NOT NULL DEFAULT '',
  `client_id` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `home` char(7) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `inheritable` tinyint(4) NOT NULL DEFAULT 0,
  `parent` varchar(50) DEFAULT '',
  `params` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bol96_template_styles`
--

INSERT INTO `bol96_template_styles` (`id`, `template`, `client_id`, `home`, `title`, `inheritable`, `parent`, `params`) VALUES
(10, 'atum', 1, '1', 'Atum - Default', 1, '', '{\"hue\":\"hsl(214, 63%, 20%)\",\"bg-light\":\"#f0f4fb\",\"text-dark\":\"#495057\",\"text-light\":\"#ffffff\",\"link-color\":\"#2a69b8\",\"special-color\":\"#001b4c\",\"monochrome\":\"0\",\"loginLogo\":\"\",\"loginLogoAlt\":\"\",\"logoBrandLarge\":\"\",\"logoBrandLargeAlt\":\"\",\"logoBrandSmall\":\"\",\"logoBrandSmallAlt\":\"\"}'),
(11, 'cassiopeia', 0, '0', 'Cassiopeia - Default', 1, '', '{\"brand\":\"1\",\"logoFile\":\"\",\"siteTitle\":\"\",\"siteDescription\":\"\",\"useFontScheme\":\"0\",\"colorName\":\"colors_standard\",\"fluidContainer\":\"0\",\"stickyHeader\":0,\"backTop\":0}'),
(12, 'spivet_pq_tm', 0, '1', 'Licencia PQ - Default', 0, '', '{\"tagsGoogle\":\"<!-- Google tag (gtag.js) -->\\r\\n<script async src=\\\"https:\\/\\/www.googletagmanager.com\\/gtag\\/js?id=G-Z76KQL64ZK\\\"><\\/script>\\r\\n<script>\\r\\n  window.dataLayer = window.dataLayer || [];\\r\\n  function gtag(){dataLayer.push(arguments);}\\r\\n  gtag(\'js\', new Date());\\r\\n\\r\\n  gtag(\'config\', \'G-Z76KQL64ZK\');\\r\\n<\\/script>\",\"titulo\":\"Spivet|Boletera\",\"header_logo\":\"images\\/Spivet\\/Header\\/logo_spivet_grande.png#joomlaImage:\\/\\/local-images\\/Spivet\\/Header\\/logo_spivet_grande.png?width=5810&height=2042\"}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_ucm_base`
--

CREATE TABLE `bol96_ucm_base` (
  `ucm_id` int(10) UNSIGNED NOT NULL,
  `ucm_item_id` int(11) NOT NULL,
  `ucm_type_id` int(11) NOT NULL,
  `ucm_language_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_ucm_content`
--

CREATE TABLE `bol96_ucm_content` (
  `core_content_id` int(10) UNSIGNED NOT NULL,
  `core_type_alias` varchar(400) NOT NULL DEFAULT '' COMMENT 'FK to the content types table',
  `core_title` varchar(400) NOT NULL DEFAULT '',
  `core_alias` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `core_body` mediumtext DEFAULT NULL,
  `core_state` tinyint(4) NOT NULL DEFAULT 0,
  `core_checked_out_time` datetime DEFAULT NULL,
  `core_checked_out_user_id` int(10) UNSIGNED DEFAULT NULL,
  `core_access` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `core_params` text DEFAULT NULL,
  `core_featured` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `core_metadata` varchar(2048) NOT NULL DEFAULT '' COMMENT 'JSON encoded metadata properties.',
  `core_created_user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `core_created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `core_created_time` datetime NOT NULL,
  `core_modified_user_id` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Most recent user that modified',
  `core_modified_time` datetime NOT NULL,
  `core_language` char(7) NOT NULL DEFAULT '',
  `core_publish_up` datetime DEFAULT NULL,
  `core_publish_down` datetime DEFAULT NULL,
  `core_content_item_id` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'ID from the individual type table',
  `asset_id` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'FK to the #__assets table.',
  `core_images` text DEFAULT NULL,
  `core_urls` text DEFAULT NULL,
  `core_hits` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `core_version` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `core_ordering` int(11) NOT NULL DEFAULT 0,
  `core_metakey` text DEFAULT NULL,
  `core_metadesc` text DEFAULT NULL,
  `core_catid` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `core_type_id` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Contains core content data in name spaced fields';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_updates`
--

CREATE TABLE `bol96_updates` (
  `update_id` int(11) NOT NULL,
  `update_site_id` int(11) DEFAULT 0,
  `extension_id` int(11) DEFAULT 0,
  `name` varchar(100) DEFAULT '',
  `description` text NOT NULL,
  `element` varchar(100) DEFAULT '',
  `type` varchar(20) DEFAULT '',
  `folder` varchar(20) DEFAULT '',
  `client_id` tinyint(4) DEFAULT 0,
  `version` varchar(32) DEFAULT '',
  `data` text NOT NULL,
  `detailsurl` text NOT NULL,
  `infourl` text NOT NULL,
  `changelogurl` text DEFAULT NULL,
  `extra_query` varchar(1000) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Available Updates';

--
-- Volcado de datos para la tabla `bol96_updates`
--

INSERT INTO `bol96_updates` (`update_id`, `update_site_id`, `extension_id`, `name`, `description`, `element`, `type`, `folder`, `client_id`, `version`, `data`, `detailsurl`, `infourl`, `changelogurl`, `extra_query`) VALUES
(1286, 1, 227, 'Joomla', '', 'joomla', 'file', '', 0, '4.4.3', '', 'https://update.joomla.org/core/j4/default.xml', '', '', ''),
(1287, 2, 0, 'Afrikaans', '', 'pkg_af-ZA', 'package', '', 0, '4.4.2.2', '', 'https://update.joomla.org/language/details4/af-ZA_details.xml', '', '', ''),
(1288, 2, 0, 'Arabic Unitag', '', 'pkg_ar-AA', 'package', '', 0, '4.0.2.1', '', 'https://update.joomla.org/language/details4/ar-AA_details.xml', '', '', ''),
(1289, 2, 0, 'Basque', '', 'pkg_eu-ES', 'package', '', 0, '4.4.3.5', '', 'https://update.joomla.org/language/details4/eu-ES_details.xml', '', '', ''),
(1290, 2, 0, 'Belarusian', '', 'pkg_be-BY', 'package', '', 0, '4.4.2.1', '', 'https://update.joomla.org/language/details4/be-BY_details.xml', '', '', ''),
(1291, 2, 0, 'Bulgarian', '', 'pkg_bg-BG', 'package', '', 0, '4.3.3.1', '', 'https://update.joomla.org/language/details4/bg-BG_details.xml', '', '', ''),
(1292, 2, 0, 'Catalan', '', 'pkg_ca-ES', 'package', '', 0, '4.0.4.2', '', 'https://update.joomla.org/language/details4/ca-ES_details.xml', '', '', ''),
(1293, 2, 0, 'Chinese, Simplified', '', 'pkg_zh-CN', 'package', '', 0, '4.3.0.2', '', 'https://update.joomla.org/language/details4/zh-CN_details.xml', '', '', ''),
(1294, 2, 0, 'Chinese, Traditional', '', 'pkg_zh-TW', 'package', '', 0, '4.4.2.1', '', 'https://update.joomla.org/language/details4/zh-TW_details.xml', '', '', ''),
(1295, 2, 0, 'Croatian', '', 'pkg_hr-HR', 'package', '', 0, '4.3.1.1', '', 'https://update.joomla.org/language/details4/hr-HR_details.xml', '', '', ''),
(1296, 2, 0, 'Czech', '', 'pkg_cs-CZ', 'package', '', 0, '4.4.0.1', '', 'https://update.joomla.org/language/details4/cs-CZ_details.xml', '', '', ''),
(1297, 2, 0, 'Danish', '', 'pkg_da-DK', 'package', '', 0, '4.4.3.1', '', 'https://update.joomla.org/language/details4/da-DK_details.xml', '', '', ''),
(1298, 2, 0, 'Dutch', '', 'pkg_nl-NL', 'package', '', 0, '4.4.2.1', '', 'https://update.joomla.org/language/details4/nl-NL_details.xml', '', '', ''),
(1299, 2, 0, 'English, Australia', '', 'pkg_en-AU', 'package', '', 0, '4.4.3.1', '', 'https://update.joomla.org/language/details4/en-AU_details.xml', '', '', ''),
(1300, 2, 0, 'English, Canada', '', 'pkg_en-CA', 'package', '', 0, '4.4.3.1', '', 'https://update.joomla.org/language/details4/en-CA_details.xml', '', '', ''),
(1301, 2, 0, 'English, New Zealand', '', 'pkg_en-NZ', 'package', '', 0, '4.4.3.2', '', 'https://update.joomla.org/language/details4/en-NZ_details.xml', '', '', ''),
(1302, 2, 0, 'English, USA', '', 'pkg_en-US', 'package', '', 0, '4.4.3.1', '', 'https://update.joomla.org/language/details4/en-US_details.xml', '', '', ''),
(1303, 2, 0, 'Estonian', '', 'pkg_et-EE', 'package', '', 0, '4.4.1.2', '', 'https://update.joomla.org/language/details4/et-EE_details.xml', '', '', ''),
(1304, 2, 0, 'Finnish', '', 'pkg_fi-FI', 'package', '', 0, '4.1.1.2', '', 'https://update.joomla.org/language/details4/fi-FI_details.xml', '', '', ''),
(1305, 2, 0, 'Flemish', '', 'pkg_nl-BE', 'package', '', 0, '4.4.0.1', '', 'https://update.joomla.org/language/details4/nl-BE_details.xml', '', '', ''),
(1306, 2, 0, 'French', '', 'pkg_fr-FR', 'package', '', 0, '4.4.3.1', '', 'https://update.joomla.org/language/details4/fr-FR_details.xml', '', '', ''),
(1307, 2, 0, 'French, Canada', '', 'pkg_fr-CA', 'package', '', 0, '4.4.3.1', '', 'https://update.joomla.org/language/details4/fr-CA_details.xml', '', '', ''),
(1308, 2, 0, 'Georgian', '', 'pkg_ka-GE', 'package', '', 0, '4.4.3.1', '', 'https://update.joomla.org/language/details4/ka-GE_details.xml', '', '', ''),
(1309, 2, 0, 'German', '', 'pkg_de-DE', 'package', '', 0, '4.4.3.1', '', 'https://update.joomla.org/language/details4/de-DE_details.xml', '', '', ''),
(1310, 2, 0, 'German, Austria', '', 'pkg_de-AT', 'package', '', 0, '4.4.3.1', '', 'https://update.joomla.org/language/details4/de-AT_details.xml', '', '', ''),
(1311, 2, 0, 'German, Liechtenstein', '', 'pkg_de-LI', 'package', '', 0, '4.4.3.1', '', 'https://update.joomla.org/language/details4/de-LI_details.xml', '', '', ''),
(1312, 2, 0, 'German, Luxembourg', '', 'pkg_de-LU', 'package', '', 0, '4.4.3.1', '', 'https://update.joomla.org/language/details4/de-LU_details.xml', '', '', ''),
(1313, 2, 0, 'German, Switzerland', '', 'pkg_de-CH', 'package', '', 0, '4.4.3.1', '', 'https://update.joomla.org/language/details4/de-CH_details.xml', '', '', ''),
(1314, 2, 0, 'Greek', '', 'pkg_el-GR', 'package', '', 0, '4.4.3.1', '', 'https://update.joomla.org/language/details4/el-GR_details.xml', '', '', ''),
(1315, 2, 0, 'Hungarian', '', 'pkg_hu-HU', 'package', '', 0, '4.4.2.1', '', 'https://update.joomla.org/language/details4/hu-HU_details.xml', '', '', ''),
(1316, 2, 0, 'Irish', '', 'pkg_ga-IE', 'package', '', 0, '4.2.8.1', '', 'https://update.joomla.org/language/details4/ga-IE_details.xml', '', '', ''),
(1317, 2, 0, 'Italian', '', 'pkg_it-IT', 'package', '', 0, '4.4.3.1', '', 'https://update.joomla.org/language/details4/it-IT_details.xml', '', '', ''),
(1318, 2, 0, 'Japanese', '', 'pkg_ja-JP', 'package', '', 0, '4.4.2.1', '', 'https://update.joomla.org/language/details4/ja-JP_details.xml', '', '', ''),
(1319, 2, 0, 'Kazakh', '', 'pkg_kk-KZ', 'package', '', 0, '4.4.0.3', '', 'https://update.joomla.org/language/details4/kk-KZ_details.xml', '', '', ''),
(1320, 2, 0, 'Korean', '', 'pkg_ko-KR', 'package', '', 0, '4.4.2.1', '', 'https://update.joomla.org/language/details4/ko-KR_details.xml', '', '', ''),
(1321, 2, 0, 'Latvian', '', 'pkg_lv-LV', 'package', '', 0, '4.4.1.1', '', 'https://update.joomla.org/language/details4/lv-LV_details.xml', '', '', ''),
(1322, 2, 0, 'Lithuanian', '', 'pkg_lt-LT', 'package', '', 0, '4.3.4.1', '', 'https://update.joomla.org/language/details4/lt-LT_details.xml', '', '', ''),
(1323, 2, 0, 'Macedonian', '', 'pkg_mk-MK', 'package', '', 0, '4.2.4.1', '', 'https://update.joomla.org/language/details4/mk-MK_details.xml', '', '', ''),
(1324, 2, 0, 'Norwegian Bokmål', '', 'pkg_nb-NO', 'package', '', 0, '4.0.1.1', '', 'https://update.joomla.org/language/details4/nb-NO_details.xml', '', '', ''),
(1325, 2, 0, 'Pashto Afghanistan', '', 'pkg_ps-AF', 'package', '', 0, '4.3.4.1', '', 'https://update.joomla.org/language/details4/ps-AF_details.xml', '', '', ''),
(1326, 2, 0, 'Persian Farsi', '', 'pkg_fa-IR', 'package', '', 0, '4.4.3.1', '', 'https://update.joomla.org/language/details4/fa-IR_details.xml', '', '', ''),
(1327, 2, 0, 'Polish', '', 'pkg_pl-PL', 'package', '', 0, '4.4.0.2', '', 'https://update.joomla.org/language/details4/pl-PL_details.xml', '', '', ''),
(1328, 2, 0, 'Portuguese, Brazil', '', 'pkg_pt-BR', 'package', '', 0, '4.0.3.1', '', 'https://update.joomla.org/language/details4/pt-BR_details.xml', '', '', ''),
(1329, 2, 0, 'Portuguese, Portugal', '', 'pkg_pt-PT', 'package', '', 0, '4.0.0-rc4.2', '', 'https://update.joomla.org/language/details4/pt-PT_details.xml', '', '', ''),
(1330, 2, 0, 'Romanian', '', 'pkg_ro-RO', 'package', '', 0, '4.3.1.1', '', 'https://update.joomla.org/language/details4/ro-RO_details.xml', '', '', ''),
(1331, 2, 0, 'Russian', '', 'pkg_ru-RU', 'package', '', 0, '4.4.2.1', '', 'https://update.joomla.org/language/details4/ru-RU_details.xml', '', '', ''),
(1332, 2, 0, 'Serbian, Cyrillic', '', 'pkg_sr-RS', 'package', '', 0, '4.3.2.1', '', 'https://update.joomla.org/language/details4/sr-RS_details.xml', '', '', ''),
(1333, 2, 0, 'Serbian, Latin', '', 'pkg_sr-YU', 'package', '', 0, '4.3.2.2', '', 'https://update.joomla.org/language/details4/sr-YU_details.xml', '', '', ''),
(1334, 2, 0, 'Slovak', '', 'pkg_sk-SK', 'package', '', 0, '4.4.1.1', '', 'https://update.joomla.org/language/details4/sk-SK_details.xml', '', '', ''),
(1335, 2, 0, 'Slovenian', '', 'pkg_sl-SI', 'package', '', 0, '4.4.3.1', '', 'https://update.joomla.org/language/details4/sl-SI_details.xml', '', '', ''),
(1336, 2, 240, 'Spanish', '', 'pkg_es-ES', 'package', '', 0, '4.4.3.1', '', 'https://update.joomla.org/language/details4/es-ES_details.xml', '', '', ''),
(1337, 2, 0, 'Swedish', '', 'pkg_sv-SE', 'package', '', 0, '4.4.3.1', '', 'https://update.joomla.org/language/details4/sv-SE_details.xml', '', '', ''),
(1338, 2, 0, 'Tamil, India', '', 'pkg_ta-IN', 'package', '', 0, '4.4.3.1', '', 'https://update.joomla.org/language/details4/ta-IN_details.xml', '', '', ''),
(1339, 2, 0, 'Thai', '', 'pkg_th-TH', 'package', '', 0, '4.4.3.1', '', 'https://update.joomla.org/language/details4/th-TH_details.xml', '', '', ''),
(1340, 2, 0, 'Turkish', '', 'pkg_tr-TR', 'package', '', 0, '4.4.3.1', '', 'https://update.joomla.org/language/details4/tr-TR_details.xml', '', '', ''),
(1341, 2, 0, 'Ukrainian', '', 'pkg_uk-UA', 'package', '', 0, '4.4.1.1', '', 'https://update.joomla.org/language/details4/uk-UA_details.xml', '', '', ''),
(1342, 2, 0, 'Vietnamese', '', 'pkg_vi-VN', 'package', '', 0, '4.2.2.1', '', 'https://update.joomla.org/language/details4/vi-VN_details.xml', '', '', ''),
(1343, 2, 0, 'Welsh', '', 'pkg_cy-GB', 'package', '', 0, '4.4.3.1', '', 'https://update.joomla.org/language/details4/cy-GB_details.xml', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_update_sites`
--

CREATE TABLE `bol96_update_sites` (
  `update_site_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT '',
  `type` varchar(20) DEFAULT '',
  `location` text NOT NULL,
  `enabled` int(11) DEFAULT 0,
  `last_check_timestamp` bigint(20) DEFAULT 0,
  `extra_query` varchar(1000) DEFAULT '',
  `checked_out` int(10) UNSIGNED DEFAULT NULL,
  `checked_out_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Update Sites';

--
-- Volcado de datos para la tabla `bol96_update_sites`
--

INSERT INTO `bol96_update_sites` (`update_site_id`, `name`, `type`, `location`, `enabled`, `last_check_timestamp`, `extra_query`, `checked_out`, `checked_out_time`) VALUES
(1, 'Joomla! Core', 'collection', 'https://update.joomla.org/core/list.xml', 1, 1708970791, '', NULL, NULL),
(2, 'Accredited Joomla! Translations', 'collection', 'https://update.joomla.org/language/translationlist_4.xml', 1, 1708970791, '', NULL, NULL),
(3, 'Joomla! Update Component', 'extension', 'https://update.joomla.org/core/extensions/com_joomlaupdate.xml', 1, 1708970792, '', NULL, NULL),
(4, 'WebTolk - Blank page updates', 'extension', 'https://web-tolk.ru/component/swjprojects/jupdate?element=com_blank', 1, 1708970793, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_update_sites_extensions`
--

CREATE TABLE `bol96_update_sites_extensions` (
  `update_site_id` int(11) NOT NULL DEFAULT 0,
  `extension_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Links extensions to update sites';

--
-- Volcado de datos para la tabla `bol96_update_sites_extensions`
--

INSERT INTO `bol96_update_sites_extensions` (`update_site_id`, `extension_id`) VALUES
(1, 227),
(2, 228),
(2, 240),
(3, 24),
(4, 235);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_usergroups`
--

CREATE TABLE `bol96_usergroups` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Primary Key',
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Adjacency List Reference Id',
  `lft` int(11) NOT NULL DEFAULT 0 COMMENT 'Nested set lft.',
  `rgt` int(11) NOT NULL DEFAULT 0 COMMENT 'Nested set rgt.',
  `title` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bol96_usergroups`
--

INSERT INTO `bol96_usergroups` (`id`, `parent_id`, `lft`, `rgt`, `title`) VALUES
(1, 0, 1, 18, 'Public'),
(2, 1, 8, 15, 'Registered'),
(3, 2, 9, 14, 'Author'),
(4, 3, 10, 13, 'Editor'),
(5, 4, 11, 12, 'Publisher'),
(6, 1, 4, 7, 'Manager'),
(7, 6, 5, 6, 'Administrator'),
(8, 1, 16, 17, 'Super Users'),
(9, 1, 2, 3, 'Guest');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_users`
--

CREATE TABLE `bol96_users` (
  `id` int(11) NOT NULL,
  `name` varchar(400) NOT NULL DEFAULT '',
  `username` varchar(150) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `block` tinyint(4) NOT NULL DEFAULT 0,
  `sendEmail` tinyint(4) DEFAULT 0,
  `registerDate` datetime NOT NULL,
  `lastvisitDate` datetime DEFAULT NULL,
  `activation` varchar(100) NOT NULL DEFAULT '',
  `params` text NOT NULL,
  `lastResetTime` datetime DEFAULT NULL COMMENT 'Date of last password reset',
  `resetCount` int(11) NOT NULL DEFAULT 0 COMMENT 'Count of password resets since lastResetTime',
  `otpKey` varchar(1000) NOT NULL DEFAULT '' COMMENT 'Two factor authentication encrypted keys',
  `otep` varchar(1000) NOT NULL DEFAULT '' COMMENT 'Backup Codes',
  `requireReset` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Require user to reset password on next login',
  `authProvider` varchar(100) NOT NULL DEFAULT '' COMMENT 'Name of used authentication plugin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bol96_users`
--

INSERT INTO `bol96_users` (`id`, `name`, `username`, `email`, `password`, `block`, `sendEmail`, `registerDate`, `lastvisitDate`, `activation`, `params`, `lastResetTime`, `resetCount`, `otpKey`, `otep`, `requireReset`, `authProvider`) VALUES
(527, 'admin', 'admin@spivet.com.mx', 'desarrollo02@piquero.com.mx', '$2y$10$XToy89zNPTZ1tPcNiMtuweBj5R/NITE1w9tGXIkXXI0c2n8T./0yW', 0, 1, '2024-02-01 18:54:26', '2024-02-26 18:06:29', '0', '{\"admin_style\":\"\",\"admin_language\":\"\",\"language\":\"\",\"editor\":\"\",\"timezone\":\"\",\"a11y_mono\":\"0\",\"a11y_contrast\":\"0\",\"a11y_highlight\":\"0\",\"a11y_font\":\"0\"}', NULL, 0, '', '', 0, ''),
(528, 'soporte', 'soporte@spivet.com.mx', 'soporte@spivet.com.mx', '$2y$10$Xyww2ALo9aSo2k7hF7i5hOPge/z2AhMPQkgv.zz.YuVuacEklatrq', 0, 0, '2024-02-26 18:18:10', NULL, '', '{\"admin_style\":\"\",\"admin_language\":\"\",\"language\":\"\",\"editor\":\"\",\"timezone\":\"\",\"a11y_mono\":\"0\",\"a11y_contrast\":\"0\",\"a11y_highlight\":\"0\",\"a11y_font\":\"0\"}', NULL, 0, '', '', 0, ''),
(529, 'content', 'content@spivet.com.mx', 'content@spivet.com.mx', '$2y$10$hPhg9Ox6pUXLgwVKIxQbAezv7Z1ya9ZaJ3Uh3CBrXtWWF3jy7PRt.', 0, 0, '2024-02-26 18:19:32', NULL, '', '{\"admin_style\":\"\",\"admin_language\":\"\",\"language\":\"\",\"editor\":\"\",\"timezone\":\"\",\"a11y_mono\":\"0\",\"a11y_contrast\":\"0\",\"a11y_highlight\":\"0\",\"a11y_font\":\"0\"}', NULL, 0, '', '', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_user_keys`
--

CREATE TABLE `bol96_user_keys` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(150) NOT NULL,
  `token` varchar(255) NOT NULL,
  `series` varchar(191) NOT NULL,
  `time` varchar(200) NOT NULL,
  `uastring` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_user_mfa`
--

CREATE TABLE `bol96_user_mfa` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `method` varchar(100) NOT NULL,
  `default` tinyint(4) NOT NULL DEFAULT 0,
  `options` mediumtext NOT NULL,
  `created_on` datetime NOT NULL,
  `last_used` datetime DEFAULT NULL,
  `tries` int(11) NOT NULL DEFAULT 0,
  `last_try` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Multi-factor Authentication settings';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_user_notes`
--

CREATE TABLE `bol96_user_notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `catid` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `subject` varchar(100) NOT NULL DEFAULT '',
  `body` text NOT NULL,
  `state` tinyint(4) NOT NULL DEFAULT 0,
  `checked_out` int(10) UNSIGNED DEFAULT NULL,
  `checked_out_time` datetime DEFAULT NULL,
  `created_user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_time` datetime NOT NULL,
  `modified_user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `modified_time` datetime NOT NULL,
  `review_time` datetime DEFAULT NULL,
  `publish_up` datetime DEFAULT NULL,
  `publish_down` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_user_profiles`
--

CREATE TABLE `bol96_user_profiles` (
  `user_id` int(11) NOT NULL,
  `profile_key` varchar(100) NOT NULL,
  `profile_value` text NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Simple user profile storage table';

--
-- Volcado de datos para la tabla `bol96_user_profiles`
--

INSERT INTO `bol96_user_profiles` (`user_id`, `profile_key`, `profile_value`, `ordering`) VALUES
(527, 'joomlatoken.enabled', '1', 2),
(527, 'joomlatoken.token', 'lKSjvsuX2qLHKA5po3yxAsdklTJhRJpUvovkRwJ5wdA=', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_user_usergroup_map`
--

CREATE TABLE `bol96_user_usergroup_map` (
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Foreign Key to #__users.id',
  `group_id` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Foreign Key to #__usergroups.id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bol96_user_usergroup_map`
--

INSERT INTO `bol96_user_usergroup_map` (`user_id`, `group_id`) VALUES
(527, 8),
(528, 2),
(528, 8),
(529, 5),
(529, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_viewlevels`
--

CREATE TABLE `bol96_viewlevels` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Primary Key',
  `title` varchar(100) NOT NULL DEFAULT '',
  `ordering` int(11) NOT NULL DEFAULT 0,
  `rules` varchar(5120) NOT NULL COMMENT 'JSON encoded access control.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bol96_viewlevels`
--

INSERT INTO `bol96_viewlevels` (`id`, `title`, `ordering`, `rules`) VALUES
(1, 'Public', 0, '[1]'),
(2, 'Registered', 2, '[6,2,8]'),
(3, 'Special', 3, '[6,3,8]'),
(5, 'Guest', 1, '[9]'),
(6, 'Super Users', 4, '[8]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_webauthn_credentials`
--

CREATE TABLE `bol96_webauthn_credentials` (
  `id` varchar(1000) NOT NULL COMMENT 'Credential ID',
  `user_id` varchar(128) NOT NULL COMMENT 'User handle',
  `label` varchar(190) NOT NULL COMMENT 'Human readable label',
  `credential` mediumtext NOT NULL COMMENT 'Credential source data, JSON format'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_workflows`
--

CREATE TABLE `bol96_workflows` (
  `id` int(11) NOT NULL,
  `asset_id` int(11) DEFAULT 0,
  `published` tinyint(4) NOT NULL DEFAULT 0,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `extension` varchar(50) NOT NULL,
  `default` tinyint(4) NOT NULL DEFAULT 0,
  `ordering` int(11) NOT NULL DEFAULT 0,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL DEFAULT 0,
  `checked_out_time` datetime DEFAULT NULL,
  `checked_out` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bol96_workflows`
--

INSERT INTO `bol96_workflows` (`id`, `asset_id`, `published`, `title`, `description`, `extension`, `default`, `ordering`, `created`, `created_by`, `modified`, `modified_by`, `checked_out_time`, `checked_out`) VALUES
(1, 56, 1, 'COM_WORKFLOW_BASIC_WORKFLOW', '', 'com_content.article', 1, 1, '2024-02-01 18:54:23', 527, '2024-02-01 18:54:23', 527, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_workflow_associations`
--

CREATE TABLE `bol96_workflow_associations` (
  `item_id` int(11) NOT NULL DEFAULT 0 COMMENT 'Extension table id value',
  `stage_id` int(11) NOT NULL COMMENT 'Foreign Key to #__workflow_stages.id',
  `extension` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_workflow_stages`
--

CREATE TABLE `bol96_workflow_stages` (
  `id` int(11) NOT NULL,
  `asset_id` int(11) DEFAULT 0,
  `ordering` int(11) NOT NULL DEFAULT 0,
  `workflow_id` int(11) NOT NULL,
  `published` tinyint(4) NOT NULL DEFAULT 0,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `default` tinyint(4) NOT NULL DEFAULT 0,
  `checked_out_time` datetime DEFAULT NULL,
  `checked_out` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bol96_workflow_stages`
--

INSERT INTO `bol96_workflow_stages` (`id`, `asset_id`, `ordering`, `workflow_id`, `published`, `title`, `description`, `default`, `checked_out_time`, `checked_out`) VALUES
(1, 57, 1, 1, 1, 'COM_WORKFLOW_BASIC_STAGE', '', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bol96_workflow_transitions`
--

CREATE TABLE `bol96_workflow_transitions` (
  `id` int(11) NOT NULL,
  `asset_id` int(11) DEFAULT 0,
  `ordering` int(11) NOT NULL DEFAULT 0,
  `workflow_id` int(11) NOT NULL,
  `published` tinyint(4) NOT NULL DEFAULT 0,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `from_stage_id` int(11) NOT NULL,
  `to_stage_id` int(11) NOT NULL,
  `options` text NOT NULL,
  `checked_out_time` datetime DEFAULT NULL,
  `checked_out` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bol96_workflow_transitions`
--

INSERT INTO `bol96_workflow_transitions` (`id`, `asset_id`, `ordering`, `workflow_id`, `published`, `title`, `description`, `from_stage_id`, `to_stage_id`, `options`, `checked_out_time`, `checked_out`) VALUES
(1, 58, 1, 1, 1, 'UNPUBLISH', '', -1, 1, '{\"publishing\":\"0\"}', NULL, NULL),
(2, 59, 2, 1, 1, 'PUBLISH', '', -1, 1, '{\"publishing\":\"1\"}', NULL, NULL),
(3, 60, 3, 1, 1, 'TRASH', '', -1, 1, '{\"publishing\":\"-2\"}', NULL, NULL),
(4, 61, 4, 1, 1, 'ARCHIVE', '', -1, 1, '{\"publishing\":\"2\"}', NULL, NULL),
(5, 62, 5, 1, 1, 'FEATURE', '', -1, 1, '{\"featuring\":\"1\"}', NULL, NULL),
(6, 63, 6, 1, 1, 'UNFEATURE', '', -1, 1, '{\"featuring\":\"0\"}', NULL, NULL),
(7, 64, 7, 1, 1, 'PUBLISH_AND_FEATURE', '', -1, 1, '{\"publishing\":\"1\",\"featuring\":\"1\"}', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bol96_action_logs`
--
ALTER TABLE `bol96_action_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_user_id` (`user_id`),
  ADD KEY `idx_user_id_logdate` (`user_id`,`log_date`),
  ADD KEY `idx_user_id_extension` (`user_id`,`extension`),
  ADD KEY `idx_extension_item_id` (`extension`,`item_id`);

--
-- Indices de la tabla `bol96_action_logs_extensions`
--
ALTER TABLE `bol96_action_logs_extensions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bol96_action_logs_users`
--
ALTER TABLE `bol96_action_logs_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `idx_notify` (`notify`);

--
-- Indices de la tabla `bol96_action_log_config`
--
ALTER TABLE `bol96_action_log_config`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bol96_assets`
--
ALTER TABLE `bol96_assets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_asset_name` (`name`),
  ADD KEY `idx_lft_rgt` (`lft`,`rgt`),
  ADD KEY `idx_parent_id` (`parent_id`);

--
-- Indices de la tabla `bol96_associations`
--
ALTER TABLE `bol96_associations`
  ADD PRIMARY KEY (`context`,`id`),
  ADD KEY `idx_key` (`key`);

--
-- Indices de la tabla `bol96_banners`
--
ALTER TABLE `bol96_banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_state` (`state`),
  ADD KEY `idx_own_prefix` (`own_prefix`),
  ADD KEY `idx_metakey_prefix` (`metakey_prefix`(100)),
  ADD KEY `idx_banner_catid` (`catid`),
  ADD KEY `idx_language` (`language`);

--
-- Indices de la tabla `bol96_banner_clients`
--
ALTER TABLE `bol96_banner_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_own_prefix` (`own_prefix`),
  ADD KEY `idx_metakey_prefix` (`metakey_prefix`(100));

--
-- Indices de la tabla `bol96_banner_tracks`
--
ALTER TABLE `bol96_banner_tracks`
  ADD PRIMARY KEY (`track_date`,`track_type`,`banner_id`),
  ADD KEY `idx_track_date` (`track_date`),
  ADD KEY `idx_track_type` (`track_type`),
  ADD KEY `idx_banner_id` (`banner_id`);

--
-- Indices de la tabla `bol96_categories`
--
ALTER TABLE `bol96_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_idx` (`extension`,`published`,`access`),
  ADD KEY `idx_access` (`access`),
  ADD KEY `idx_checkout` (`checked_out`),
  ADD KEY `idx_path` (`path`(100)),
  ADD KEY `idx_left_right` (`lft`,`rgt`),
  ADD KEY `idx_alias` (`alias`(100)),
  ADD KEY `idx_language` (`language`);

--
-- Indices de la tabla `bol96_contact_details`
--
ALTER TABLE `bol96_contact_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_access` (`access`),
  ADD KEY `idx_checkout` (`checked_out`),
  ADD KEY `idx_state` (`published`),
  ADD KEY `idx_catid` (`catid`),
  ADD KEY `idx_createdby` (`created_by`),
  ADD KEY `idx_featured_catid` (`featured`,`catid`),
  ADD KEY `idx_language` (`language`);

--
-- Indices de la tabla `bol96_content`
--
ALTER TABLE `bol96_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_access` (`access`),
  ADD KEY `idx_checkout` (`checked_out`),
  ADD KEY `idx_state` (`state`),
  ADD KEY `idx_catid` (`catid`),
  ADD KEY `idx_createdby` (`created_by`),
  ADD KEY `idx_featured_catid` (`featured`,`catid`),
  ADD KEY `idx_language` (`language`),
  ADD KEY `idx_alias` (`alias`(191));

--
-- Indices de la tabla `bol96_contentitem_tag_map`
--
ALTER TABLE `bol96_contentitem_tag_map`
  ADD UNIQUE KEY `uc_ItemnameTagid` (`type_id`,`content_item_id`,`tag_id`),
  ADD KEY `idx_tag_type` (`tag_id`,`type_id`),
  ADD KEY `idx_date_id` (`tag_date`,`tag_id`),
  ADD KEY `idx_core_content_id` (`core_content_id`);

--
-- Indices de la tabla `bol96_content_frontpage`
--
ALTER TABLE `bol96_content_frontpage`
  ADD PRIMARY KEY (`content_id`);

--
-- Indices de la tabla `bol96_content_rating`
--
ALTER TABLE `bol96_content_rating`
  ADD PRIMARY KEY (`content_id`);

--
-- Indices de la tabla `bol96_content_types`
--
ALTER TABLE `bol96_content_types`
  ADD PRIMARY KEY (`type_id`),
  ADD KEY `idx_alias` (`type_alias`(100));

--
-- Indices de la tabla `bol96_extensions`
--
ALTER TABLE `bol96_extensions`
  ADD PRIMARY KEY (`extension_id`),
  ADD KEY `element_clientid` (`element`,`client_id`),
  ADD KEY `element_folder_clientid` (`element`,`folder`,`client_id`),
  ADD KEY `extension` (`type`,`element`,`folder`,`client_id`);

--
-- Indices de la tabla `bol96_fields`
--
ALTER TABLE `bol96_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_checkout` (`checked_out`),
  ADD KEY `idx_state` (`state`),
  ADD KEY `idx_created_user_id` (`created_user_id`),
  ADD KEY `idx_access` (`access`),
  ADD KEY `idx_context` (`context`(191)),
  ADD KEY `idx_language` (`language`);

--
-- Indices de la tabla `bol96_fields_categories`
--
ALTER TABLE `bol96_fields_categories`
  ADD PRIMARY KEY (`field_id`,`category_id`);

--
-- Indices de la tabla `bol96_fields_groups`
--
ALTER TABLE `bol96_fields_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_checkout` (`checked_out`),
  ADD KEY `idx_state` (`state`),
  ADD KEY `idx_created_by` (`created_by`),
  ADD KEY `idx_access` (`access`),
  ADD KEY `idx_context` (`context`(191)),
  ADD KEY `idx_language` (`language`);

--
-- Indices de la tabla `bol96_fields_values`
--
ALTER TABLE `bol96_fields_values`
  ADD KEY `idx_field_id` (`field_id`),
  ADD KEY `idx_item_id` (`item_id`(191));

--
-- Indices de la tabla `bol96_finder_filters`
--
ALTER TABLE `bol96_finder_filters`
  ADD PRIMARY KEY (`filter_id`);

--
-- Indices de la tabla `bol96_finder_links`
--
ALTER TABLE `bol96_finder_links`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `idx_type` (`type_id`),
  ADD KEY `idx_title` (`title`(100)),
  ADD KEY `idx_md5` (`md5sum`),
  ADD KEY `idx_url` (`url`(75)),
  ADD KEY `idx_language` (`language`),
  ADD KEY `idx_published_list` (`published`,`state`,`access`,`publish_start_date`,`publish_end_date`,`list_price`),
  ADD KEY `idx_published_sale` (`published`,`state`,`access`,`publish_start_date`,`publish_end_date`,`sale_price`);

--
-- Indices de la tabla `bol96_finder_links_terms`
--
ALTER TABLE `bol96_finder_links_terms`
  ADD PRIMARY KEY (`link_id`,`term_id`),
  ADD KEY `idx_term_weight` (`term_id`,`weight`),
  ADD KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`);

--
-- Indices de la tabla `bol96_finder_logging`
--
ALTER TABLE `bol96_finder_logging`
  ADD PRIMARY KEY (`md5sum`),
  ADD KEY `searchterm` (`searchterm`(191));

--
-- Indices de la tabla `bol96_finder_taxonomy`
--
ALTER TABLE `bol96_finder_taxonomy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_state` (`state`),
  ADD KEY `idx_access` (`access`),
  ADD KEY `idx_path` (`path`(100)),
  ADD KEY `idx_level` (`level`),
  ADD KEY `idx_left_right` (`lft`,`rgt`),
  ADD KEY `idx_alias` (`alias`(100)),
  ADD KEY `idx_language` (`language`),
  ADD KEY `idx_parent_published` (`parent_id`,`state`,`access`);

--
-- Indices de la tabla `bol96_finder_taxonomy_map`
--
ALTER TABLE `bol96_finder_taxonomy_map`
  ADD PRIMARY KEY (`link_id`,`node_id`),
  ADD KEY `link_id` (`link_id`),
  ADD KEY `node_id` (`node_id`);

--
-- Indices de la tabla `bol96_finder_terms`
--
ALTER TABLE `bol96_finder_terms`
  ADD PRIMARY KEY (`term_id`),
  ADD UNIQUE KEY `idx_term_language` (`term`,`language`),
  ADD KEY `idx_stem` (`stem`),
  ADD KEY `idx_term_phrase` (`term`,`phrase`),
  ADD KEY `idx_stem_phrase` (`stem`,`phrase`),
  ADD KEY `idx_soundex_phrase` (`soundex`,`phrase`),
  ADD KEY `idx_language` (`language`);

--
-- Indices de la tabla `bol96_finder_terms_common`
--
ALTER TABLE `bol96_finder_terms_common`
  ADD UNIQUE KEY `idx_term_language` (`term`,`language`),
  ADD KEY `idx_lang` (`language`);

--
-- Indices de la tabla `bol96_finder_tokens`
--
ALTER TABLE `bol96_finder_tokens`
  ADD KEY `idx_word` (`term`),
  ADD KEY `idx_stem` (`stem`),
  ADD KEY `idx_context` (`context`),
  ADD KEY `idx_language` (`language`);

--
-- Indices de la tabla `bol96_finder_tokens_aggregate`
--
ALTER TABLE `bol96_finder_tokens_aggregate`
  ADD KEY `token` (`term`),
  ADD KEY `keyword_id` (`term_id`);

--
-- Indices de la tabla `bol96_finder_types`
--
ALTER TABLE `bol96_finder_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indices de la tabla `bol96_guidedtours`
--
ALTER TABLE `bol96_guidedtours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_access` (`access`),
  ADD KEY `idx_state` (`published`),
  ADD KEY `idx_language` (`language`);

--
-- Indices de la tabla `bol96_guidedtour_steps`
--
ALTER TABLE `bol96_guidedtour_steps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_tour` (`tour_id`),
  ADD KEY `idx_state` (`published`),
  ADD KEY `idx_language` (`language`);

--
-- Indices de la tabla `bol96_history`
--
ALTER TABLE `bol96_history`
  ADD PRIMARY KEY (`version_id`),
  ADD KEY `idx_ucm_item_id` (`item_id`),
  ADD KEY `idx_save_date` (`save_date`);

--
-- Indices de la tabla `bol96_languages`
--
ALTER TABLE `bol96_languages`
  ADD PRIMARY KEY (`lang_id`),
  ADD UNIQUE KEY `idx_sef` (`sef`),
  ADD UNIQUE KEY `idx_langcode` (`lang_code`),
  ADD KEY `idx_access` (`access`),
  ADD KEY `idx_ordering` (`ordering`);

--
-- Indices de la tabla `bol96_mail_templates`
--
ALTER TABLE `bol96_mail_templates`
  ADD PRIMARY KEY (`template_id`,`language`);

--
-- Indices de la tabla `bol96_menu`
--
ALTER TABLE `bol96_menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_client_id_parent_id_alias_language` (`client_id`,`parent_id`,`alias`(100),`language`),
  ADD KEY `idx_componentid` (`component_id`,`menutype`,`published`,`access`),
  ADD KEY `idx_menutype` (`menutype`),
  ADD KEY `idx_left_right` (`lft`,`rgt`),
  ADD KEY `idx_alias` (`alias`(100)),
  ADD KEY `idx_path` (`path`(100)),
  ADD KEY `idx_language` (`language`);

--
-- Indices de la tabla `bol96_menu_types`
--
ALTER TABLE `bol96_menu_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_menutype` (`menutype`);

--
-- Indices de la tabla `bol96_messages`
--
ALTER TABLE `bol96_messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `useridto_state` (`user_id_to`,`state`);

--
-- Indices de la tabla `bol96_messages_cfg`
--
ALTER TABLE `bol96_messages_cfg`
  ADD UNIQUE KEY `idx_user_var_name` (`user_id`,`cfg_name`);

--
-- Indices de la tabla `bol96_modules`
--
ALTER TABLE `bol96_modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `published` (`published`,`access`),
  ADD KEY `newsfeeds` (`module`,`published`),
  ADD KEY `idx_language` (`language`);

--
-- Indices de la tabla `bol96_modules_menu`
--
ALTER TABLE `bol96_modules_menu`
  ADD PRIMARY KEY (`moduleid`,`menuid`);

--
-- Indices de la tabla `bol96_newsfeeds`
--
ALTER TABLE `bol96_newsfeeds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_access` (`access`),
  ADD KEY `idx_checkout` (`checked_out`),
  ADD KEY `idx_state` (`published`),
  ADD KEY `idx_catid` (`catid`),
  ADD KEY `idx_createdby` (`created_by`),
  ADD KEY `idx_language` (`language`);

--
-- Indices de la tabla `bol96_overrider`
--
ALTER TABLE `bol96_overrider`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bol96_postinstall_messages`
--
ALTER TABLE `bol96_postinstall_messages`
  ADD PRIMARY KEY (`postinstall_message_id`);

--
-- Indices de la tabla `bol96_privacy_consents`
--
ALTER TABLE `bol96_privacy_consents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_user_id` (`user_id`);

--
-- Indices de la tabla `bol96_privacy_requests`
--
ALTER TABLE `bol96_privacy_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bol96_redirect_links`
--
ALTER TABLE `bol96_redirect_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_old_url` (`old_url`(100)),
  ADD KEY `idx_link_modified` (`modified_date`);

--
-- Indices de la tabla `bol96_scheduler_tasks`
--
ALTER TABLE `bol96_scheduler_tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_type` (`type`),
  ADD KEY `idx_state` (`state`),
  ADD KEY `idx_last_exit` (`last_exit_code`),
  ADD KEY `idx_next_exec` (`next_execution`),
  ADD KEY `idx_locked` (`locked`),
  ADD KEY `idx_priority` (`priority`),
  ADD KEY `idx_cli_exclusive` (`cli_exclusive`),
  ADD KEY `idx_checked_out` (`checked_out`);

--
-- Indices de la tabla `bol96_schemas`
--
ALTER TABLE `bol96_schemas`
  ADD PRIMARY KEY (`extension_id`,`version_id`);

--
-- Indices de la tabla `bol96_session`
--
ALTER TABLE `bol96_session`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `time` (`time`),
  ADD KEY `client_id_guest` (`client_id`,`guest`);

--
-- Indices de la tabla `bol96_tags`
--
ALTER TABLE `bol96_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tag_idx` (`published`,`access`),
  ADD KEY `idx_access` (`access`),
  ADD KEY `idx_checkout` (`checked_out`),
  ADD KEY `idx_path` (`path`(100)),
  ADD KEY `idx_left_right` (`lft`,`rgt`),
  ADD KEY `idx_alias` (`alias`(100)),
  ADD KEY `idx_language` (`language`);

--
-- Indices de la tabla `bol96_template_overrides`
--
ALTER TABLE `bol96_template_overrides`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_template` (`template`),
  ADD KEY `idx_extension_id` (`extension_id`);

--
-- Indices de la tabla `bol96_template_styles`
--
ALTER TABLE `bol96_template_styles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_template` (`template`),
  ADD KEY `idx_client_id` (`client_id`),
  ADD KEY `idx_client_id_home` (`client_id`,`home`);

--
-- Indices de la tabla `bol96_ucm_base`
--
ALTER TABLE `bol96_ucm_base`
  ADD PRIMARY KEY (`ucm_id`),
  ADD KEY `idx_ucm_item_id` (`ucm_item_id`),
  ADD KEY `idx_ucm_type_id` (`ucm_type_id`),
  ADD KEY `idx_ucm_language_id` (`ucm_language_id`);

--
-- Indices de la tabla `bol96_ucm_content`
--
ALTER TABLE `bol96_ucm_content`
  ADD PRIMARY KEY (`core_content_id`),
  ADD KEY `tag_idx` (`core_state`,`core_access`),
  ADD KEY `idx_access` (`core_access`),
  ADD KEY `idx_alias` (`core_alias`(100)),
  ADD KEY `idx_language` (`core_language`),
  ADD KEY `idx_title` (`core_title`(100)),
  ADD KEY `idx_modified_time` (`core_modified_time`),
  ADD KEY `idx_created_time` (`core_created_time`),
  ADD KEY `idx_content_type` (`core_type_alias`(100)),
  ADD KEY `idx_core_modified_user_id` (`core_modified_user_id`),
  ADD KEY `idx_core_checked_out_user_id` (`core_checked_out_user_id`),
  ADD KEY `idx_core_created_user_id` (`core_created_user_id`),
  ADD KEY `idx_core_type_id` (`core_type_id`);

--
-- Indices de la tabla `bol96_updates`
--
ALTER TABLE `bol96_updates`
  ADD PRIMARY KEY (`update_id`);

--
-- Indices de la tabla `bol96_update_sites`
--
ALTER TABLE `bol96_update_sites`
  ADD PRIMARY KEY (`update_site_id`);

--
-- Indices de la tabla `bol96_update_sites_extensions`
--
ALTER TABLE `bol96_update_sites_extensions`
  ADD PRIMARY KEY (`update_site_id`,`extension_id`);

--
-- Indices de la tabla `bol96_usergroups`
--
ALTER TABLE `bol96_usergroups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_usergroup_parent_title_lookup` (`parent_id`,`title`),
  ADD KEY `idx_usergroup_title_lookup` (`title`),
  ADD KEY `idx_usergroup_adjacency_lookup` (`parent_id`),
  ADD KEY `idx_usergroup_nested_set_lookup` (`lft`,`rgt`) USING BTREE;

--
-- Indices de la tabla `bol96_users`
--
ALTER TABLE `bol96_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_username` (`username`),
  ADD KEY `idx_name` (`name`(100)),
  ADD KEY `idx_block` (`block`),
  ADD KEY `email` (`email`);

--
-- Indices de la tabla `bol96_user_keys`
--
ALTER TABLE `bol96_user_keys`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `series` (`series`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `bol96_user_mfa`
--
ALTER TABLE `bol96_user_mfa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_user_id` (`user_id`);

--
-- Indices de la tabla `bol96_user_notes`
--
ALTER TABLE `bol96_user_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_user_id` (`user_id`),
  ADD KEY `idx_category_id` (`catid`);

--
-- Indices de la tabla `bol96_user_profiles`
--
ALTER TABLE `bol96_user_profiles`
  ADD UNIQUE KEY `idx_user_id_profile_key` (`user_id`,`profile_key`);

--
-- Indices de la tabla `bol96_user_usergroup_map`
--
ALTER TABLE `bol96_user_usergroup_map`
  ADD PRIMARY KEY (`user_id`,`group_id`);

--
-- Indices de la tabla `bol96_viewlevels`
--
ALTER TABLE `bol96_viewlevels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_assetgroup_title_lookup` (`title`);

--
-- Indices de la tabla `bol96_webauthn_credentials`
--
ALTER TABLE `bol96_webauthn_credentials`
  ADD PRIMARY KEY (`id`(100)),
  ADD KEY `user_id` (`user_id`(100));

--
-- Indices de la tabla `bol96_workflows`
--
ALTER TABLE `bol96_workflows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_asset_id` (`asset_id`),
  ADD KEY `idx_title` (`title`(191)),
  ADD KEY `idx_extension` (`extension`),
  ADD KEY `idx_default` (`default`),
  ADD KEY `idx_created` (`created`),
  ADD KEY `idx_created_by` (`created_by`),
  ADD KEY `idx_modified` (`modified`),
  ADD KEY `idx_modified_by` (`modified_by`),
  ADD KEY `idx_checked_out` (`checked_out`);

--
-- Indices de la tabla `bol96_workflow_associations`
--
ALTER TABLE `bol96_workflow_associations`
  ADD PRIMARY KEY (`item_id`,`extension`),
  ADD KEY `idx_item_stage_extension` (`item_id`,`stage_id`,`extension`),
  ADD KEY `idx_item_id` (`item_id`),
  ADD KEY `idx_stage_id` (`stage_id`),
  ADD KEY `idx_extension` (`extension`);

--
-- Indices de la tabla `bol96_workflow_stages`
--
ALTER TABLE `bol96_workflow_stages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_workflow_id` (`workflow_id`),
  ADD KEY `idx_checked_out` (`checked_out`),
  ADD KEY `idx_title` (`title`(191)),
  ADD KEY `idx_asset_id` (`asset_id`),
  ADD KEY `idx_default` (`default`);

--
-- Indices de la tabla `bol96_workflow_transitions`
--
ALTER TABLE `bol96_workflow_transitions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_title` (`title`(191)),
  ADD KEY `idx_asset_id` (`asset_id`),
  ADD KEY `idx_checked_out` (`checked_out`),
  ADD KEY `idx_from_stage_id` (`from_stage_id`),
  ADD KEY `idx_to_stage_id` (`to_stage_id`),
  ADD KEY `idx_workflow_id` (`workflow_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bol96_action_logs`
--
ALTER TABLE `bol96_action_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=656;

--
-- AUTO_INCREMENT de la tabla `bol96_action_logs_extensions`
--
ALTER TABLE `bol96_action_logs_extensions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `bol96_action_log_config`
--
ALTER TABLE `bol96_action_log_config`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `bol96_assets`
--
ALTER TABLE `bol96_assets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT de la tabla `bol96_banners`
--
ALTER TABLE `bol96_banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bol96_banner_clients`
--
ALTER TABLE `bol96_banner_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bol96_categories`
--
ALTER TABLE `bol96_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `bol96_contact_details`
--
ALTER TABLE `bol96_contact_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bol96_content`
--
ALTER TABLE `bol96_content`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bol96_content_types`
--
ALTER TABLE `bol96_content_types`
  MODIFY `type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000;

--
-- AUTO_INCREMENT de la tabla `bol96_extensions`
--
ALTER TABLE `bol96_extensions`
  MODIFY `extension_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT de la tabla `bol96_fields`
--
ALTER TABLE `bol96_fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bol96_fields_groups`
--
ALTER TABLE `bol96_fields_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bol96_finder_filters`
--
ALTER TABLE `bol96_finder_filters`
  MODIFY `filter_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bol96_finder_links`
--
ALTER TABLE `bol96_finder_links`
  MODIFY `link_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `bol96_finder_taxonomy`
--
ALTER TABLE `bol96_finder_taxonomy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `bol96_finder_terms`
--
ALTER TABLE `bol96_finder_terms`
  MODIFY `term_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `bol96_finder_types`
--
ALTER TABLE `bol96_finder_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `bol96_guidedtours`
--
ALTER TABLE `bol96_guidedtours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `bol96_guidedtour_steps`
--
ALTER TABLE `bol96_guidedtour_steps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT de la tabla `bol96_history`
--
ALTER TABLE `bol96_history`
  MODIFY `version_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `bol96_languages`
--
ALTER TABLE `bol96_languages`
  MODIFY `lang_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `bol96_menu`
--
ALTER TABLE `bol96_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT de la tabla `bol96_menu_types`
--
ALTER TABLE `bol96_menu_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `bol96_messages`
--
ALTER TABLE `bol96_messages`
  MODIFY `message_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bol96_modules`
--
ALTER TABLE `bol96_modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT de la tabla `bol96_newsfeeds`
--
ALTER TABLE `bol96_newsfeeds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bol96_overrider`
--
ALTER TABLE `bol96_overrider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key';

--
-- AUTO_INCREMENT de la tabla `bol96_postinstall_messages`
--
ALTER TABLE `bol96_postinstall_messages`
  MODIFY `postinstall_message_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `bol96_privacy_consents`
--
ALTER TABLE `bol96_privacy_consents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bol96_privacy_requests`
--
ALTER TABLE `bol96_privacy_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bol96_redirect_links`
--
ALTER TABLE `bol96_redirect_links`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bol96_scheduler_tasks`
--
ALTER TABLE `bol96_scheduler_tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bol96_tags`
--
ALTER TABLE `bol96_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `bol96_template_overrides`
--
ALTER TABLE `bol96_template_overrides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bol96_template_styles`
--
ALTER TABLE `bol96_template_styles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `bol96_ucm_content`
--
ALTER TABLE `bol96_ucm_content`
  MODIFY `core_content_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bol96_updates`
--
ALTER TABLE `bol96_updates`
  MODIFY `update_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1344;

--
-- AUTO_INCREMENT de la tabla `bol96_update_sites`
--
ALTER TABLE `bol96_update_sites`
  MODIFY `update_site_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `bol96_usergroups`
--
ALTER TABLE `bol96_usergroups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `bol96_users`
--
ALTER TABLE `bol96_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=530;

--
-- AUTO_INCREMENT de la tabla `bol96_user_keys`
--
ALTER TABLE `bol96_user_keys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bol96_user_mfa`
--
ALTER TABLE `bol96_user_mfa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bol96_user_notes`
--
ALTER TABLE `bol96_user_notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bol96_viewlevels`
--
ALTER TABLE `bol96_viewlevels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `bol96_workflows`
--
ALTER TABLE `bol96_workflows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `bol96_workflow_stages`
--
ALTER TABLE `bol96_workflow_stages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `bol96_workflow_transitions`
--
ALTER TABLE `bol96_workflow_transitions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
