-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 25/01/2017 às 18:34:03
-- Versão do Servidor: 10.0.28-MariaDB
-- Versão do PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `u267690752_bistr`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acos`
--

CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_acos_lft_rght` (`lft`,`rght`),
  KEY `idx_acos_alias` (`alias`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=538 ;

--
-- Extraindo dados da tabela `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 406),
(2, 1, NULL, NULL, 'Bills', 2, 17),
(3, 2, NULL, NULL, 'index', 3, 4),
(4, 2, NULL, NULL, 'view', 5, 6),
(5, 2, NULL, NULL, 'add', 7, 8),
(6, 2, NULL, NULL, 'edit', 9, 10),
(7, 2, NULL, NULL, 'delete', 11, 12),
(8, 1, NULL, NULL, 'Categories', 18, 29),
(9, 8, NULL, NULL, 'index', 19, 20),
(10, 8, NULL, NULL, 'view', 21, 22),
(11, 8, NULL, NULL, 'add', 23, 24),
(12, 8, NULL, NULL, 'edit', 25, 26),
(13, 8, NULL, NULL, 'delete', 27, 28),
(14, 1, NULL, NULL, 'EntryNoteItems', 30, 41),
(15, 14, NULL, NULL, 'index', 31, 32),
(16, 14, NULL, NULL, 'view', 33, 34),
(17, 14, NULL, NULL, 'add', 35, 36),
(18, 14, NULL, NULL, 'edit', 37, 38),
(19, 14, NULL, NULL, 'delete', 39, 40),
(20, 1, NULL, NULL, 'EntryNotes', 42, 53),
(21, 20, NULL, NULL, 'index', 43, 44),
(22, 20, NULL, NULL, 'view', 45, 46),
(23, 20, NULL, NULL, 'add', 47, 48),
(24, 20, NULL, NULL, 'edit', 49, 50),
(25, 20, NULL, NULL, 'delete', 51, 52),
(26, 1, NULL, NULL, 'Groups', 54, 65),
(27, 26, NULL, NULL, 'index', 55, 56),
(28, 26, NULL, NULL, 'view', 57, 58),
(29, 26, NULL, NULL, 'add', 59, 60),
(30, 26, NULL, NULL, 'edit', 61, 62),
(31, 26, NULL, NULL, 'delete', 63, 64),
(32, 1, NULL, NULL, 'Items', 66, 77),
(33, 32, NULL, NULL, 'index', 67, 68),
(34, 32, NULL, NULL, 'view', 69, 70),
(35, 32, NULL, NULL, 'add', 71, 72),
(36, 32, NULL, NULL, 'edit', 73, 74),
(37, 32, NULL, NULL, 'delete', 75, 76),
(38, 1, NULL, NULL, 'LocationTypes', 78, 89),
(39, 38, NULL, NULL, 'index', 79, 80),
(40, 38, NULL, NULL, 'view', 81, 82),
(41, 38, NULL, NULL, 'add', 83, 84),
(42, 38, NULL, NULL, 'edit', 85, 86),
(43, 38, NULL, NULL, 'delete', 87, 88),
(44, 1, NULL, NULL, 'Locations', 90, 101),
(45, 44, NULL, NULL, 'index', 91, 92),
(46, 44, NULL, NULL, 'view', 93, 94),
(47, 44, NULL, NULL, 'add', 95, 96),
(48, 44, NULL, NULL, 'edit', 97, 98),
(49, 44, NULL, NULL, 'delete', 99, 100),
(50, 1, NULL, NULL, 'Orders', 102, 123),
(51, 50, NULL, NULL, 'index', 103, 104),
(52, 50, NULL, NULL, 'view', 105, 106),
(54, 50, NULL, NULL, 'edit', 107, 108),
(56, 1, NULL, NULL, 'Pages', 124, 129),
(58, 1, NULL, NULL, 'ProductItems', 130, 143),
(59, 58, NULL, NULL, 'index', 131, 132),
(60, 58, NULL, NULL, 'view', 133, 134),
(61, 58, NULL, NULL, 'add', 135, 136),
(62, 58, NULL, NULL, 'edit', 137, 138),
(63, 58, NULL, NULL, 'delete', 139, 140),
(64, 1, NULL, NULL, 'Products', 144, 157),
(65, 64, NULL, NULL, 'index', 145, 146),
(66, 64, NULL, NULL, 'view', 147, 148),
(67, 64, NULL, NULL, 'add', 149, 150),
(68, 64, NULL, NULL, 'edit', 151, 152),
(69, 64, NULL, NULL, 'delete', 153, 154),
(70, 1, NULL, NULL, 'Stages', 158, 169),
(71, 70, NULL, NULL, 'index', 159, 160),
(72, 70, NULL, NULL, 'view', 161, 162),
(73, 70, NULL, NULL, 'add', 163, 164),
(74, 70, NULL, NULL, 'edit', 165, 166),
(75, 70, NULL, NULL, 'delete', 167, 168),
(76, 1, NULL, NULL, 'StatusBills', 170, 181),
(77, 76, NULL, NULL, 'index', 171, 172),
(78, 76, NULL, NULL, 'view', 173, 174),
(79, 76, NULL, NULL, 'add', 175, 176),
(80, 76, NULL, NULL, 'edit', 177, 178),
(81, 76, NULL, NULL, 'delete', 179, 180),
(82, 1, NULL, NULL, 'StatusEntryNotes', 182, 193),
(83, 82, NULL, NULL, 'index', 183, 184),
(84, 82, NULL, NULL, 'view', 185, 186),
(85, 82, NULL, NULL, 'add', 187, 188),
(86, 82, NULL, NULL, 'edit', 189, 190),
(87, 82, NULL, NULL, 'delete', 191, 192),
(88, 1, NULL, NULL, 'StatusOrders', 194, 205),
(89, 88, NULL, NULL, 'index', 195, 196),
(90, 88, NULL, NULL, 'view', 197, 198),
(91, 88, NULL, NULL, 'add', 199, 200),
(92, 88, NULL, NULL, 'edit', 201, 202),
(93, 88, NULL, NULL, 'delete', 203, 204),
(94, 1, NULL, NULL, 'Stocks', 206, 235),
(95, 94, NULL, NULL, 'index', 207, 208),
(96, 94, NULL, NULL, 'view', 209, 210),
(99, 94, NULL, NULL, 'delete', 211, 212),
(100, 1, NULL, NULL, 'Subcategories', 236, 247),
(101, 100, NULL, NULL, 'index', 237, 238),
(102, 100, NULL, NULL, 'view', 239, 240),
(103, 100, NULL, NULL, 'add', 241, 242),
(104, 100, NULL, NULL, 'edit', 243, 244),
(105, 100, NULL, NULL, 'delete', 245, 246),
(106, 1, NULL, NULL, 'Suppliers', 248, 259),
(107, 106, NULL, NULL, 'index', 249, 250),
(108, 106, NULL, NULL, 'view', 251, 252),
(109, 106, NULL, NULL, 'add', 253, 254),
(110, 106, NULL, NULL, 'edit', 255, 256),
(111, 106, NULL, NULL, 'delete', 257, 258),
(112, 1, NULL, NULL, 'Tables', 260, 281),
(113, 112, NULL, NULL, 'index', 261, 262),
(114, 112, NULL, NULL, 'view', 263, 264),
(115, 112, NULL, NULL, 'add', 265, 266),
(116, 112, NULL, NULL, 'edit', 267, 268),
(117, 112, NULL, NULL, 'delete', 269, 270),
(118, 1, NULL, NULL, 'Units', 282, 293),
(119, 118, NULL, NULL, 'index', 283, 284),
(120, 118, NULL, NULL, 'view', 285, 286),
(121, 118, NULL, NULL, 'add', 287, 288),
(122, 118, NULL, NULL, 'edit', 289, 290),
(123, 118, NULL, NULL, 'delete', 291, 292),
(124, 1, NULL, NULL, 'Users', 294, 311),
(125, 124, NULL, NULL, 'login', 295, 296),
(126, 124, NULL, NULL, 'logout', 297, 298),
(127, 124, NULL, NULL, 'initDB', 299, 300),
(128, 124, NULL, NULL, 'index', 301, 302),
(129, 124, NULL, NULL, 'view', 303, 304),
(130, 124, NULL, NULL, 'add', 305, 306),
(131, 124, NULL, NULL, 'edit', 307, 308),
(132, 124, NULL, NULL, 'delete', 309, 310),
(133, 1, NULL, NULL, 'AclExtras', 312, 313),
(134, 1, NULL, NULL, 'DebugKit', 314, 321),
(135, 134, NULL, NULL, 'ToolbarAccess', 315, 320),
(136, 135, NULL, NULL, 'history_state', 316, 317),
(137, 135, NULL, NULL, 'sql_explain', 318, 319),
(310, 1, NULL, NULL, 'Configurations', 322, 325),
(311, 310, NULL, NULL, 'index', 323, 324),
(319, 1, NULL, NULL, 'InternalTransfers', 326, 337),
(320, 319, NULL, NULL, 'index', 327, 328),
(321, 319, NULL, NULL, 'view', 329, 330),
(322, 319, NULL, NULL, 'add', 331, 332),
(323, 319, NULL, NULL, 'edit', 333, 334),
(324, 319, NULL, NULL, 'delete', 335, 336),
(332, 1, NULL, NULL, 'StatusInternalTransfers', 338, 349),
(333, 332, NULL, NULL, 'index', 339, 340),
(334, 332, NULL, NULL, 'view', 341, 342),
(335, 332, NULL, NULL, 'add', 343, 344),
(336, 332, NULL, NULL, 'edit', 345, 346),
(337, 332, NULL, NULL, 'delete', 347, 348),
(345, 1, NULL, NULL, 'InternalTransferItems', 350, 361),
(346, 345, NULL, NULL, 'index', 351, 352),
(347, 345, NULL, NULL, 'view', 353, 354),
(348, 345, NULL, NULL, 'add', 355, 356),
(349, 345, NULL, NULL, 'edit', 357, 358),
(350, 345, NULL, NULL, 'delete', 359, 360),
(394, 1, NULL, NULL, 'Cashiers', 362, 373),
(395, 394, NULL, NULL, 'index', 363, 364),
(396, 394, NULL, NULL, 'view', 365, 366),
(397, 394, NULL, NULL, 'add', 367, 368),
(398, 394, NULL, NULL, 'edit', 369, 370),
(399, 394, NULL, NULL, 'delete', 371, 372),
(407, 94, NULL, NULL, 'stock_control', 213, 214),
(408, 94, NULL, NULL, 'getListLocation', 215, 216),
(409, 94, NULL, NULL, 'get_list_stock_by_location', 217, 218),
(425, 64, NULL, NULL, 'getUnit', 155, 156),
(482, 94, NULL, NULL, 'modal_edit', 219, 220),
(483, 1, NULL, NULL, 'ManualAdjustments', 374, 385),
(484, 483, NULL, NULL, 'index', 375, 376),
(485, 483, NULL, NULL, 'view', 377, 378),
(486, 483, NULL, NULL, 'add', 379, 380),
(487, 483, NULL, NULL, 'edit', 381, 382),
(488, 483, NULL, NULL, 'delete', 383, 384),
(497, 94, NULL, NULL, 'stock_details', 221, 222),
(498, 94, NULL, NULL, 'listStock', 223, 224),
(499, 94, NULL, NULL, 'listStockSuppliers', 225, 226),
(500, 94, NULL, NULL, 'listStockClients', 227, 228),
(501, 94, NULL, NULL, 'listStockLosses', 229, 230),
(502, 50, NULL, NULL, 'orders_board', 109, 110),
(503, 50, NULL, NULL, 'add_order', 111, 112),
(504, 112, NULL, NULL, 'tables_board', 271, 272),
(505, 50, NULL, NULL, 'kitchen_orders', 113, 114),
(506, 50, NULL, NULL, 'getOrdersByStage', 115, 116),
(507, 50, NULL, NULL, 'update_sequence', 117, 118),
(508, 56, NULL, NULL, 'home', 125, 126),
(509, 112, NULL, NULL, 'table_details', 273, 274),
(510, 1, NULL, NULL, 'Charts', 386, 391),
(511, 510, NULL, NULL, 'index', 387, 388),
(513, 94, NULL, NULL, 'drawLineChartGlobalInventory', 231, 232),
(514, 94, NULL, NULL, 'getStockQuantityByProduct', 233, 234),
(515, 50, NULL, NULL, 'order_wizard', 119, 120),
(518, 58, NULL, NULL, 'getProductItems', 141, 142),
(519, 50, NULL, NULL, 'cancel', 121, 122),
(520, 112, NULL, NULL, 'close_table', 275, 276),
(522, 112, NULL, NULL, 'getBills', 277, 278),
(524, 1, NULL, NULL, 'Payments', 392, 405),
(525, 524, NULL, NULL, 'index', 393, 394),
(526, 524, NULL, NULL, 'view', 395, 396),
(527, 524, NULL, NULL, 'add', 397, 398),
(528, 524, NULL, NULL, 'edit', 399, 400),
(529, 524, NULL, NULL, 'delete', 401, 402),
(530, 524, NULL, NULL, 'list_orders', 403, 404),
(531, 112, NULL, NULL, 'change_table', 279, 280),
(532, 56, NULL, NULL, 'documentation', 127, 128),
(533, 510, NULL, NULL, 'weekly_stock', 389, 390),
(535, 2, NULL, NULL, 'print_bill', 13, 14),
(537, 2, NULL, NULL, 'history', 15, 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aros`
--

CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_aros_lft_rght` (`lft`,`rght`),
  KEY `idx_aros_alias` (`alias`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Group', 1, NULL, 1, 2),
(2, NULL, 'Group', 2, NULL, 3, 4),
(3, NULL, 'Group', 3, NULL, 5, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aros_acos`
--

CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) COLLATE utf8_swedish_ci NOT NULL DEFAULT '0',
  `_read` varchar(2) COLLATE utf8_swedish_ci NOT NULL DEFAULT '0',
  `_update` varchar(2) COLLATE utf8_swedish_ci NOT NULL DEFAULT '0',
  `_delete` varchar(2) COLLATE utf8_swedish_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`),
  KEY `idx_aco_id` (`aco_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 1, '1', '1', '1', '1'),
(2, 2, 1, '1', '1', '1', '1'),
(3, 3, 1, '1', '1', '1', '1'),
(4, 3, 126, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bills`
--

CREATE TABLE IF NOT EXISTS `bills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status_bill_id` int(11) NOT NULL,
  `table_id` int(11) DEFAULT NULL,
  `identifier` varchar(45) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `bills`
--

INSERT INTO `bills` (`id`, `status_bill_id`, `table_id`, `identifier`, `created`, `modified`) VALUES
(6, 2, 5, 'I', '2016-11-13 18:18:32', '2016-12-08 22:44:22'),
(7, 2, 8, 'I', '2016-12-08 22:57:29', '2016-12-21 19:21:30'),
(8, 2, 1, 'I', '2016-12-21 19:22:37', '2017-01-20 12:37:15'),
(9, 2, 3, 'I', '2017-01-20 12:02:47', '2017-01-20 12:37:42');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cashiers`
--

CREATE TABLE IF NOT EXISTS `cashiers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Restaurante', '2015-11-10 02:31:18', '2016-04-11 14:07:11'),
(2, 'Bebidas', '2015-11-10 02:33:38', '2016-06-20 08:36:40');

-- --------------------------------------------------------

--
-- Estrutura da tabela `entry_notes`
--

CREATE TABLE IF NOT EXISTS `entry_notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) DEFAULT NULL,
  `status_entry_note_id` int(11) NOT NULL DEFAULT '1',
  `fiscal_note` varchar(45) NOT NULL,
  `entry_date` date NOT NULL,
  `entry_hour` time DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `entry_note_items`
--

CREATE TABLE IF NOT EXISTS `entry_note_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entry_note_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` double(50,3) unsigned NOT NULL,
  `unit_cost` double(50,6) NOT NULL,
  `total_cost` double(50,6) unsigned NOT NULL,
  `location_id` int(11) NOT NULL COMMENT 'Local de destino, para onde o produto vai quando a nota for concluída',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `groups`
--

INSERT INTO `groups` (`id`, `name`) VALUES
(1, 'Administrador'),
(3, 'Atendimento'),
(2, 'Cozinha');

-- --------------------------------------------------------

--
-- Estrutura da tabela `internal_transfers`
--

CREATE TABLE IF NOT EXISTS `internal_transfers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_id` int(11) NOT NULL,
  `location_destiny_id` int(11) NOT NULL,
  `status_internal_transfer_id` int(11) NOT NULL DEFAULT '1',
  `date` date NOT NULL,
  `time` time NOT NULL,
  `observation` text COLLATE utf8_swedish_ci,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `internal_transfer_items`
--

CREATE TABLE IF NOT EXISTS `internal_transfer_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `internal_transfer_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` double(50,3) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_swedish_ci NOT NULL,
  `location_type_id` int(11) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=102 ;

--
-- Extraindo dados da tabela `locations`
--

INSERT INTO `locations` (`id`, `name`, `location_type_id`, `created`, `modified`) VALUES
(1, 'Fornecedores', 2, '2016-03-08 12:48:08', '2016-03-08 12:48:08'),
(2, 'Clientes', 2, '2016-03-08 12:48:35', '2016-03-08 12:48:35'),
(3, 'Perdas', 2, '2016-03-08 12:48:42', '2016-03-08 12:48:42'),
(100, 'Almoxarifado', 1, '2016-03-08 12:50:32', '2016-04-11 14:08:38'),
(101, 'Casa do Tonim', 1, '2016-03-08 13:06:18', '2016-03-08 13:06:18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `location_types`
--

CREATE TABLE IF NOT EXISTS `location_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_swedish_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `location_types`
--

INSERT INTO `location_types` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Físico', '2016-02-05 13:39:43', '2016-02-05 13:39:43'),
(2, 'Virtual', '2016-02-05 13:39:50', '2016-02-05 13:39:50');

-- --------------------------------------------------------

--
-- Estrutura da tabela `manual_adjustments`
--

CREATE TABLE IF NOT EXISTS `manual_adjustments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `manual_adjustments`
--

INSERT INTO `manual_adjustments` (`id`, `location_id`, `created`, `modified`) VALUES
(1, 100, '2017-01-20 13:53:56', '2017-01-20 13:53:56'),
(2, 100, '2017-01-20 13:54:37', '2017-01-20 13:54:37'),
(3, 100, '2017-01-20 13:55:02', '2017-01-20 13:55:02'),
(4, 100, '2017-01-20 13:55:26', '2017-01-20 13:55:26'),
(5, 100, '2017-01-20 13:56:00', '2017-01-20 13:56:00'),
(6, 100, '2017-01-20 13:56:18', '2017-01-20 13:56:18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` float(10,2) unsigned NOT NULL,
  `stage_id` int(11) DEFAULT NULL,
  `table_id` int(11) DEFAULT NULL,
  `bill_id` int(11) DEFAULT NULL,
  `status_order_id` int(11) NOT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `observation` text,
  `kitchen_order` int(10) unsigned NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Extraindo dados da tabela `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `quantity`, `stage_id`, `table_id`, `bill_id`, `status_order_id`, `payment_id`, `observation`, `kitchen_order`, `created`, `modified`) VALUES
(39, 1, 43, 1.00, 2, 5, 6, 2, 8, '', 0, '2016-11-13 18:18:32', '2016-11-13 18:21:14'),
(40, 1, 20, 1.00, 2, 5, 6, 2, NULL, '', 0, '2016-11-13 18:18:32', '2016-12-08 22:44:22'),
(41, 1, 22, 1.00, 2, 5, 6, 2, NULL, '', 0, '2016-11-13 18:18:32', '2016-12-08 22:44:22'),
(42, 1, 2, 1.00, 2, 5, 6, 2, NULL, '', 0, '2016-11-13 18:18:32', '2016-12-08 22:44:22'),
(43, 1, 52, 1.00, 4, 5, 6, 2, NULL, '', 0, '2016-11-13 18:18:32', '2016-12-08 22:44:22'),
(44, 1, 52, 1.00, 4, 5, 6, 2, NULL, '', 0, '2016-11-13 18:18:32', '2016-12-08 22:44:22'),
(45, 1, 52, 1.00, 4, 5, 6, 2, NULL, '', 0, '2016-11-13 18:18:32', '2016-12-08 22:44:22'),
(46, 1, 52, 1.00, 4, 5, 6, 2, NULL, '', 0, '2016-11-13 18:18:32', '2016-12-08 22:44:22'),
(47, 1, 52, 1.00, 4, 5, 6, 2, NULL, '', 0, '2016-11-13 18:18:32', '2016-12-08 22:44:22'),
(48, 1, 61, 1.00, 4, 5, 6, 2, NULL, '', 0, '2016-11-13 18:18:32', '2016-12-08 22:44:22'),
(49, 1, 90, 1.00, 4, 5, 6, 2, NULL, '', 0, '2016-11-13 18:18:32', '2016-12-08 22:44:22'),
(50, 1, 20, 1.00, 2, 8, 7, 2, NULL, '', 0, '2016-12-08 22:57:29', '2016-12-21 19:21:29'),
(51, 1, 20, 1.00, 2, 8, 7, 2, NULL, '', 0, '2016-12-08 22:57:29', '2016-12-21 19:21:29'),
(52, 1, 20, 1.00, 2, 8, 7, 2, NULL, '', 0, '2016-12-08 22:57:29', '2016-12-21 19:21:29'),
(53, 1, 20, 1.00, 2, 8, 7, 2, NULL, '', 0, '2016-12-08 22:57:29', '2016-12-21 19:21:29'),
(54, 1, 30, 1.00, 2, 8, 7, 2, NULL, '', 0, '2016-12-08 22:57:29', '2016-12-21 19:21:29'),
(55, 1, 32, 1.00, 2, 8, 7, 2, NULL, '', 0, '2016-12-08 22:57:29', '2016-12-21 19:21:29'),
(56, 1, 12, 1.00, 2, 8, 7, 2, NULL, '', 0, '2016-12-08 22:57:29', '2016-12-21 19:21:29'),
(57, 1, 12, 1.00, 2, 8, 7, 2, NULL, '', 0, '2016-12-08 22:57:29', '2016-12-21 19:21:29'),
(58, 1, 51, 1.00, 4, 8, 7, 2, NULL, '', 0, '2016-12-08 22:57:29', '2016-12-21 19:21:29'),
(59, 1, 52, 1.00, 4, 8, 7, 2, NULL, '', 0, '2016-12-08 22:57:29', '2016-12-21 19:21:29'),
(60, 1, 52, 1.00, 4, 8, 7, 2, NULL, '', 0, '2016-12-08 22:57:29', '2016-12-21 19:21:29'),
(61, 1, 53, 1.00, 4, 8, 7, 2, NULL, '', 0, '2016-12-08 22:57:29', '2016-12-21 19:21:29'),
(62, 1, 53, 1.00, 4, 8, 7, 2, NULL, '', 0, '2016-12-08 22:57:29', '2016-12-21 19:21:29'),
(63, 1, 53, 1.00, 4, 8, 7, 2, NULL, '', 0, '2016-12-08 22:57:29', '2016-12-21 19:21:30'),
(64, 1, 53, 1.00, 4, 8, 7, 2, NULL, '', 0, '2016-12-08 22:57:29', '2016-12-21 19:21:30'),
(65, 1, 53, 1.00, 4, 8, 7, 2, NULL, '', 0, '2016-12-08 22:57:29', '2016-12-21 19:21:30'),
(66, 1, 53, 1.00, 4, 8, 7, 2, NULL, '', 0, '2016-12-08 22:57:29', '2016-12-21 19:21:30'),
(67, 1, 53, 1.00, 4, 8, 7, 2, NULL, '', 0, '2016-12-08 22:57:29', '2016-12-21 19:21:30'),
(68, 1, 53, 1.00, 4, 8, 7, 2, NULL, '', 0, '2016-12-08 22:57:29', '2016-12-21 19:21:30'),
(69, 1, 80, 1.00, 4, 8, 7, 2, NULL, '', 0, '2016-12-08 22:57:29', '2016-12-21 19:21:30'),
(70, 1, 120, 1.00, 2, 8, 7, 2, NULL, '', 0, '2016-12-08 22:57:29', '2016-12-21 19:21:30'),
(71, 1, 120, 1.00, 2, 8, 7, 2, NULL, '', 0, '2016-12-08 22:57:29', '2016-12-21 19:21:30'),
(72, 1, 120, 1.00, 5, 8, 7, 2, NULL, '', 0, '2016-12-08 22:57:29', '2016-12-21 19:19:25'),
(73, 1, 40, 1.00, 5, 1, 8, 2, NULL, '', 0, '2016-12-21 19:22:37', '2017-01-20 12:36:20'),
(74, 1, 40, 1.00, 5, 1, 8, 2, NULL, '', 0, '2016-12-21 19:22:37', '2017-01-20 12:36:17'),
(75, 1, 40, 1.00, 5, 1, 8, 2, NULL, '', 0, '2016-12-21 19:22:37', '2017-01-20 12:36:14'),
(76, 1, 40, 1.00, 5, 1, 8, 2, NULL, '', 0, '2016-12-21 19:22:37', '2017-01-20 12:36:06'),
(77, 1, 102, 1.00, 5, 3, 9, 2, NULL, '', 0, '2017-01-20 12:02:47', '2017-01-20 12:37:29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table_id` int(11) DEFAULT NULL,
  `bill_id` int(11) DEFAULT NULL,
  `subtotal` double(50,2) DEFAULT NULL,
  `payd_value` double(50,2) DEFAULT NULL,
  `payback` double(50,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `payments`
--

INSERT INTO `payments` (`id`, `table_id`, `bill_id`, `subtotal`, `payd_value`, `payback`, `created`, `modified`) VALUES
(8, 5, 6, 4.00, 10.00, 6.00, '2016-11-13 18:21:14', '2016-11-13 18:21:14'),
(9, 5, 6, 0.00, 120.00, 0.00, '2016-12-08 22:44:22', '2016-12-08 22:44:22'),
(10, 8, 7, 0.00, 100.00, 0.00, '2016-12-21 19:21:12', '2016-12-21 19:21:12'),
(11, 8, 7, 0.00, 87.00, 0.00, '2016-12-21 19:21:29', '2016-12-21 19:21:29'),
(12, 1, 8, 0.00, 0.00, 0.00, '2017-01-20 12:37:15', '2017-01-20 12:37:15'),
(13, 3, 9, 0.00, 0.00, 0.00, '2017-01-20 12:37:42', '2017-01-20 12:37:42');

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subcategory_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `status` enum('Ativo','Inativo') NOT NULL DEFAULT 'Ativo',
  `cost_price` double(50,3) unsigned DEFAULT '0.000',
  `sell_price` double(50,3) unsigned DEFAULT '0.000',
  `avaliable_to_order` enum('Sim','Não') NOT NULL DEFAULT 'Não',
  `stockable` enum('Sim','Não') NOT NULL DEFAULT 'Sim',
  `minimum_stock` double(50,3) unsigned NOT NULL DEFAULT '0.000',
  `description` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=167 ;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `subcategory_id`, `unit_id`, `name`, `status`, `cost_price`, `sell_price`, `avaliable_to_order`, `stockable`, `minimum_stock`, `description`, `created`, `modified`) VALUES
(2, 5, 1, 'Grand Gateou com Magnum', 'Ativo', 12.000, 21.000, 'Sim', 'Sim', 10.000, '', '2016-06-20 09:16:23', '2017-01-20 13:14:50'),
(3, 5, 1, 'Pudim de Cream Cheese com Cobertura de Goiabada', 'Ativo', 2.300, 6.000, 'Sim', 'Sim', 10.000, '', '2016-06-20 09:18:53', '2017-01-20 13:14:21'),
(10, 1, 1, 'Grelhado de Carré Suíno', 'Ativo', 6.500, 17.000, 'Sim', 'Sim', 20.000, 'Carré Suíno 300gr, Batata Temperada e Molho Picante', '2016-06-20 08:40:43', '2017-01-20 13:13:04'),
(11, 1, 1, 'Grelhado de Contrafilé', 'Ativo', 7.380, 18.000, 'Sim', 'Sim', 20.000, 'Chuleta 300gr, Batata Temperada e Molho Picante', '2016-06-20 08:41:32', '2017-01-20 13:12:28'),
(12, 1, 1, 'Grelhado de Filé de Frango', 'Ativo', 4.900, 16.000, 'Sim', 'Sim', 20.000, 'Frango 300gr, Batata Temperada e Molho Picante', '2016-06-20 08:43:12', '2017-01-20 13:11:45'),
(13, 1, 1, 'Salada', 'Ativo', 7.000, 15.000, 'Sim', 'Sim', 20.000, 'Alface Americana, Alface Roxa, Tomate Seco, Rúcula, Ricota, Palmito, Champignon, Azeitona Preta, Croutons, Cebola Roxa, Molho de Mostarda e Mel', '2016-06-20 08:46:24', '2017-01-20 13:11:08'),
(14, 1, 1, 'Queijo Coalho com Mel', 'Ativo', 4.000, 9.000, 'Sim', 'Sim', 20.000, '2 Queijos Coalho Grelhados com Mel', '2016-06-20 08:48:28', '2017-01-20 13:10:24'),
(20, 3, 1, 'Boi Gordo', 'Ativo', 7.500, 16.500, 'Sim', 'Sim', 20.000, 'Pão, Molho de Ervas, Hambúrguer Bovino 180gr, Queijo Cheddar, Picles, Cebola Roxa, Alface Americana, Bacon.\r\nAcompanha Molho Especial de Abacaxi', '2016-06-20 09:05:49', '2017-01-20 13:09:47'),
(21, 3, 1, 'Porcão', 'Ativo', 8.150, 15.500, 'Sim', 'Sim', 20.000, 'Pão, Molho Rosé, Hambúrguer Suíno 180gr, Queijo Prato, Picles, Cebola Roxa, Tomate Seco e Bacon.\r\nAcompanha Molho Especial de Abacaxi.', '2016-06-20 09:08:26', '2017-01-20 13:09:18'),
(22, 3, 1, 'Frangoso', 'Ativo', 5.500, 14.500, 'Sim', 'Sim', 20.000, 'Pão, Molho, Hambúrguer de Ave 180gr, Requeijão Cremoso, Picles, Tomate, Cebola Caramelizada, Alface Roxa e Bacon.\r\nAcompanha Molho Especial de Abacaxi.', '2016-06-20 09:09:54', '2017-01-20 13:08:47'),
(23, 3, 1, 'Fit', 'Ativo', 4.900, 13.000, 'Sim', 'Sim', 20.000, 'Pão, Molho Rosé, Queijo Prato, Cebola Caramelizada, Tomate Seco, Alface Americana e Rúcula.\r\nAcompanha Molho Especial de Abacaxi.', '2016-06-20 09:11:11', '2017-01-20 13:07:45'),
(30, 2, 1, 'Isca de Filé de Frango', 'Ativo', 7.550, 20.000, 'Sim', 'Sim', 20.000, '400gr de Filé de Frango Empanado, Molho Picante e Molho da Casa', '2016-06-20 08:50:00', '2017-01-20 13:07:00'),
(31, 2, 1, 'Frios', 'Ativo', 9.000, 22.000, 'Sim', 'Sim', 20.000, 'Salaminho, Muçarela, Azeitona Verde, Palmito, Queijo Prato e Azeite', '2016-06-20 08:51:01', '2017-01-20 13:03:59'),
(32, 2, 1, 'Almondega ao Molho Sugo', 'Ativo', 12.950, 22.000, 'Sim', 'Sim', 20.000, 'Almondega 500gr, Molho ao Sugo, Mandioca Cozida', '2016-06-20 08:52:06', '2017-01-20 13:02:17'),
(33, 2, 1, 'Almondega Tradicional', 'Ativo', 10.950, 22.000, 'Sim', 'Sim', 20.000, 'Almondega 500gr, Requeijão Cremoso e Mandioca Cozida', '2016-06-20 08:53:00', '2017-01-20 13:01:52'),
(34, 2, 1, 'Costelinha Suína com Barbecue', 'Ativo', 10.950, 24.000, 'Sim', 'Sim', 20.000, 'Costelinha Suína 500gr, Mandioca Cozida e Molho da Casa', '2016-06-20 08:53:56', '2017-01-20 13:00:41'),
(35, 2, 1, 'Costelinha Suína Tradicional', 'Ativo', 9.950, 22.000, 'Sim', 'Sim', 20.000, 'Costelinha Suína 500gr, Mandioca Cozida e Molho da Casa', '2016-06-20 08:54:53', '2017-01-20 13:00:12'),
(37, 2, 1, 'Batata com Cheddar e Bacon', 'Ativo', 10.200, 22.000, 'Sim', 'Sim', 20.000, 'Batata Palito 600gr, Cheddar, Bacon e Molho da Casa', '2016-06-20 09:02:43', '2017-01-20 12:57:06'),
(40, 4, 1, 'Arroz', 'Ativo', 0.850, 4.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:13:50', '2017-01-20 12:55:29'),
(41, 4, 1, 'Salada Simples', 'Ativo', 1.500, 4.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:14:14', '2017-01-20 12:54:52'),
(42, 4, 1, 'Mandioca Cozida', 'Ativo', 0.620, 4.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:14:40', '2017-01-20 12:53:58'),
(43, 4, 1, 'Batata Frita 150gr', 'Ativo', 1.050, 6.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:15:34', '2017-01-20 12:54:23'),
(51, 6, 3, 'Sol Mexicana - Long Neck', 'Ativo', 3.290, 6.000, 'Sim', 'Sim', 50.000, '', '2016-06-20 09:22:55', '2017-01-20 12:52:37'),
(52, 6, 3, 'Heinekein - Long Neck', 'Ativo', 3.330, 6.000, 'Sim', 'Sim', 50.000, '', '2016-06-20 09:23:56', '2017-01-20 12:52:16'),
(53, 6, 3, 'Budwaiser - Long Neck', 'Ativo', 3.000, 6.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:24:16', '2017-01-20 12:51:38'),
(54, 6, 3, 'Caracu ', 'Ativo', 3.500, 6.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:24:55', '2017-01-20 12:51:18'),
(55, 6, 5, 'Brahma Zero', 'Ativo', 3.500, 6.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:25:29', '2017-01-20 12:50:45'),
(60, 7, 1, 'Red Label', 'Ativo', 3.250, 8.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:28:25', '2017-01-20 12:49:05'),
(61, 7, 1, 'Jack Daniel''s', 'Ativo', 4.950, 15.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:31:00', '2017-01-20 12:48:30'),
(62, 7, 1, 'Old Parr', 'Ativo', 6.000, 13.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:31:58', '2017-01-20 12:47:40'),
(70, 7, 1, 'Absolut', 'Ativo', 4.900, 10.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:32:24', '2017-01-20 12:39:34'),
(71, 7, 1, 'Smirnoff', 'Ativo', 1.750, 6.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:32:42', '2017-01-19 21:12:35'),
(78, 7, 1, 'Tequila José Cuervo', 'Ativo', 5.000, 10.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:33:01', '2017-01-19 21:11:57'),
(79, 7, 1, 'Cachaça', 'Ativo', 0.500, 2.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:33:22', '2017-01-19 21:10:40'),
(80, 8, 5, 'Coca Cola', 'Ativo', 1.910, 3.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:34:43', '2017-01-19 21:09:37'),
(81, 8, 5, 'Coca Cola Zero', 'Ativo', 1.990, 3.500, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:35:33', '2017-01-19 20:33:41'),
(82, 8, 5, 'Guaraná Antarctica', 'Ativo', 1.990, 3.500, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:51:19', '2017-01-19 20:26:29'),
(84, 8, 5, 'Fanta Laranja', 'Ativo', 1.990, 3.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:51:53', '2017-01-19 20:26:07'),
(85, 8, 5, 'Soda Limonada', 'Ativo', 1.990, 3.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:52:16', '2017-01-19 20:25:39'),
(90, 9, 5, 'Red Bull', 'Ativo', 6.200, 12.000, 'Sim', 'Sim', 15.000, '', '2016-06-20 09:53:15', '2017-01-19 19:58:04'),
(91, 9, 5, 'Extra Power', 'Ativo', 3.650, 8.000, 'Sim', 'Sim', 15.000, '', '2016-06-20 10:00:05', '2017-01-19 19:57:48'),
(98, 10, 3, 'Água Sem Gás 500ml', 'Ativo', 0.650, 2.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 10:01:10', '2017-01-19 19:57:28'),
(99, 10, 3, 'Água Com Gás 500ml', 'Ativo', 0.850, 2.500, 'Sim', 'Sim', 20.000, '', '2016-06-20 10:01:33', '2017-01-19 19:57:14'),
(100, 11, 3, 'Concha y Toro', 'Ativo', 22.000, 38.000, 'Sim', 'Sim', 5.000, '', '2016-06-20 10:02:09', '2016-12-21 18:39:01'),
(101, 11, 3, 'Santa Helena', 'Ativo', 23.000, 37.000, 'Sim', 'Sim', 5.000, '', '2016-06-20 10:02:42', '2016-12-08 22:52:32'),
(102, 11, 3, 'Concha y Toro Sauvignon', 'Ativo', 22.000, 39.000, 'Sim', 'Sim', 5.000, '', '2016-06-20 10:03:26', '2016-12-08 22:52:02'),
(103, 11, 19, 'Quinta do Morgado', 'Ativo', 2.450, 6.000, 'Sim', 'Sim', 4.000, '', '2016-06-20 10:04:13', '2017-01-19 19:56:15'),
(120, 12, 1, 'Suco de Laranja', 'Ativo', 2.000, 4.500, 'Sim', 'Não', 0.000, '', '2016-06-20 10:05:08', '2016-12-08 22:48:33'),
(121, 12, 1, 'Suco de Acerola', 'Ativo', 2.000, 4.500, 'Sim', 'Não', 0.000, '', '2016-06-20 10:05:08', '2016-12-08 22:48:17'),
(122, 12, 1, 'Suco de Maracujá', 'Ativo', 2.000, 4.500, 'Sim', 'Não', 0.000, '', '2016-06-20 10:05:08', '2016-12-08 22:47:57'),
(123, 12, 1, 'Suco de Limão', 'Ativo', 2.000, 4.500, 'Sim', 'Não', 0.000, '', '2016-06-20 10:05:08', '2016-12-08 22:47:40'),
(125, 12, 1, 'Laranja com Acerola', 'Ativo', 3.000, 6.000, 'Sim', 'Não', 0.000, '', '2016-06-20 10:05:08', '2016-12-08 22:47:23'),
(126, 12, 1, 'Suco de Uva', 'Ativo', 2.000, 4.500, 'Sim', 'Não', 0.000, '', '2016-06-20 10:05:08', '2016-12-08 22:47:04'),
(127, 12, 1, 'Suco de Abacaxi', 'Ativo', 2.000, 4.500, 'Sim', 'Não', 0.000, '', '2016-06-20 10:05:08', '2016-12-08 22:46:50'),
(128, 12, 1, 'Abacaxi com Hortelã', 'Ativo', 2.000, 4.500, 'Sim', 'Não', 0.000, '', '2016-06-20 10:05:08', '2016-12-08 22:46:27'),
(129, 12, 1, 'Suco de Morango', 'Ativo', 2.000, 4.500, 'Sim', 'Não', 0.000, '', '2016-06-20 10:05:08', '2016-12-08 22:46:11'),
(130, 12, 1, 'suco de Laranja com Morango', 'Ativo', 3.000, 7.000, 'Sim', 'Não', 0.000, '', '2016-12-08 22:50:12', '2016-12-08 22:50:12'),
(131, 1, 18, 'Grelhado de Pirarucu', 'Ativo', 13.000, 23.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:16:15', '2017-01-20 13:16:15'),
(132, 1, 18, 'Salada Moda da Casa', 'Ativo', 8.000, 15.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:16:58', '2017-01-20 13:16:58'),
(133, 2, 17, 'Isca de Tilápia', 'Ativo', 12.500, 33.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:18:37', '2017-01-20 13:18:37'),
(134, 2, 17, 'Carne na Chapa', 'Ativo', 24.800, 42.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:20:37', '2017-01-20 13:20:37'),
(135, 4, 17, 'Batata temperada', 'Ativo', 1.500, 4.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:21:29', '2017-01-20 13:21:29'),
(136, 4, 17, 'molho da casa', 'Ativo', 1.500, 3.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:22:02', '2017-01-20 13:22:02'),
(137, 4, 17, 'Molho Picante', 'Ativo', 1.500, 3.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:22:29', '2017-01-20 13:22:29'),
(138, 4, 17, 'Molho Mostarda e Mel', 'Ativo', 1.500, 3.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:22:59', '2017-01-20 13:22:59'),
(139, 4, 17, 'Molho de Ervas', 'Ativo', 1.500, 1.500, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:23:24', '2017-01-20 13:23:24'),
(140, 4, 17, 'Molho Barbecue', 'Ativo', 1.500, 3.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:23:55', '2017-01-20 13:23:55'),
(141, 4, 17, 'Geleia de Pimenta', 'Ativo', 1.500, 4.000, 'Sim', 'Sim', 20.000, '', '2017-01-20 13:24:27', '2017-01-20 13:24:27'),
(142, 4, 17, 'Adicional de Queijo', 'Ativo', 1.500, 3.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:25:04', '2017-01-20 13:25:04'),
(143, 4, 17, 'Adicional de Bacon', 'Ativo', 1.500, 3.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:25:30', '2017-01-20 13:25:30'),
(144, 4, 17, 'Adicional de Hamburguer', 'Ativo', 3.200, 7.000, 'Sim', 'Sim', 40.000, '', '2017-01-20 13:26:32', '2017-01-20 13:26:32'),
(145, 4, 13, 'Gelo', 'Ativo', 1.000, 2.500, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:26:55', '2017-01-20 13:26:55'),
(146, 10, 3, 'H2O Limoneto', 'Ativo', 3.100, 5.000, 'Sim', 'Sim', 20.000, '', '2017-01-20 13:27:37', '2017-01-20 13:27:37'),
(147, 10, 3, 'H2O Limão', 'Ativo', 3.200, 5.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:28:01', '2017-01-20 13:28:01'),
(148, 6, 3, 'Eisenbahn ', 'Ativo', 3.500, 8.000, 'Sim', 'Sim', 20.000, '', '2017-01-20 13:29:08', '2017-01-20 13:29:08'),
(149, 6, 3, 'Colorado Appia', 'Ativo', 16.900, 24.000, 'Sim', 'Sim', 20.000, '', '2017-01-20 13:29:56', '2017-01-20 13:29:56'),
(150, 6, 3, 'Weihenstephan Vitus', 'Ativo', 19.900, 28.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:31:23', '2017-01-20 13:31:23'),
(151, 6, 3, 'Duvel', 'Ativo', 17.200, 28.000, 'Sim', 'Sim', 20.000, '', '2017-01-20 13:32:01', '2017-01-20 13:32:01'),
(152, 6, 3, 'Paulaner ', 'Ativo', 19.900, 28.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:32:33', '2017-01-20 13:32:33'),
(153, 6, 3, 'Baden Baden Cristal', 'Ativo', 12.900, 21.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:33:11', '2017-01-20 13:33:11'),
(154, 11, 3, 'Lambrusco Cella', 'Ativo', 19.000, 35.000, 'Sim', 'Sim', 5.000, '', '2017-01-20 13:33:56', '2017-01-20 13:33:56'),
(155, 11, 3, 'Periquita Original', 'Ativo', 32.000, 65.000, 'Sim', 'Sim', 5.000, '', '2017-01-20 13:35:07', '2017-01-20 13:35:07'),
(156, 11, 3, 'Casa Valduga', 'Ativo', 38.000, 73.000, 'Sim', 'Sim', 5.000, '', '2017-01-20 13:35:41', '2017-01-20 13:35:41'),
(157, 11, 3, 'Porto Vaoldouro', 'Ativo', 47.000, 84.000, 'Sim', 'Sim', 5.000, '', '2017-01-20 13:36:19', '2017-01-20 13:36:19'),
(158, 7, 19, 'Absolut Vanilia', 'Ativo', 4.900, 12.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:40:28', '2017-01-20 13:40:28'),
(159, 7, 8, 'Black Label', 'Ativo', 4.900, 12.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:41:11', '2017-01-20 13:41:11'),
(160, 7, 8, 'Pinga de Mutamba', 'Ativo', 1.250, 5.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:42:06', '2017-01-20 13:42:06'),
(161, 7, 8, 'Bananinha', 'Ativo', 2.600, 6.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:42:56', '2017-01-20 13:42:56'),
(162, 7, 8, 'Licor 43', 'Ativo', 4.450, 10.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:43:31', '2017-01-20 13:43:31'),
(163, 8, 5, 'Schweppes', 'Ativo', 2.650, 4.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:44:31', '2017-01-20 13:44:31'),
(164, 5, 17, 'Pastelzinho de Nutela', 'Ativo', 3.000, 6.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:46:16', '2017-01-20 13:46:16'),
(165, 5, 17, 'Coquetel de Churros', 'Ativo', 5.000, 18.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:46:55', '2017-01-20 13:46:55'),
(166, 5, 17, 'Mousse de Maracujá', 'Ativo', 3.000, 6.000, 'Sim', 'Sim', 20.000, '', '2017-01-20 13:47:28', '2017-01-20 13:47:28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `product_items`
--

CREATE TABLE IF NOT EXISTS `product_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` double(50,3) unsigned NOT NULL DEFAULT '0.000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `stages`
--

CREATE TABLE IF NOT EXISTS `stages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `status` enum('Ativo','Inativo') NOT NULL DEFAULT 'Ativo',
  `show_on_kitchen` enum('Sim','Não') DEFAULT 'Sim',
  `consider_as` enum('Concluídos','Pendentes') DEFAULT 'Pendentes' COMMENT 'Diferenciação para montagem da Fila de Pedidos (Pedidos Pendentes e Pedidos Concluídos)',
  `label_class` varchar(55) DEFAULT 'label-primary',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `stages`
--

INSERT INTO `stages` (`id`, `name`, `status`, `show_on_kitchen`, `consider_as`, `label_class`, `created`, `modified`) VALUES
(1, 'A Caminho', 'Ativo', 'Não', 'Pendentes', 'label-default', '2016-01-04 00:54:51', '2016-01-10 17:02:53'),
(2, 'Em Preparo (Cozinha)', 'Ativo', 'Sim', 'Pendentes', 'label-warning', '2015-12-09 23:51:32', '2016-01-10 17:03:08'),
(3, 'Pronto (Cozinha)', 'Ativo', 'Sim', 'Pendentes', 'label-success', '2015-12-09 23:53:07', '2016-01-10 17:03:12'),
(4, 'Entregue', 'Ativo', 'Sim', 'Concluídos', 'label-info', '2015-12-09 23:49:34', '2016-01-10 17:03:51'),
(5, 'Cancelado', 'Ativo', 'Não', 'Concluídos', 'label-danger', '2015-12-09 23:54:01', '2016-01-10 17:04:17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_bills`
--

CREATE TABLE IF NOT EXISTS `status_bills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `finish` enum('Sim','Não') DEFAULT 'Não',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `status_bills`
--

INSERT INTO `status_bills` (`id`, `name`, `finish`, `created`, `modified`) VALUES
(1, 'Aberta', 'Não', '2015-12-11 00:22:09', '2015-12-11 00:22:09'),
(2, 'Fechada', 'Sim', '2015-12-11 00:22:14', '2015-12-11 00:22:14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_entry_notes`
--

CREATE TABLE IF NOT EXISTS `status_entry_notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `finish` enum('Sim','Não') DEFAULT 'Não',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `status_entry_notes`
--

INSERT INTO `status_entry_notes` (`id`, `name`, `finish`, `created`, `modified`) VALUES
(1, 'Cadastrando', 'Não', '2015-12-12 20:00:52', '2015-12-12 20:00:52'),
(2, 'Concluída', 'Sim', '2015-12-12 20:01:11', '2015-12-12 20:01:11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_internal_transfers`
--

CREATE TABLE IF NOT EXISTS `status_internal_transfers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_swedish_ci NOT NULL,
  `finish` enum('Sim','Não') COLLATE utf8_swedish_ci DEFAULT 'Não',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `status_internal_transfers`
--

INSERT INTO `status_internal_transfers` (`id`, `name`, `finish`, `created`, `modified`) VALUES
(1, 'Cadastrando', 'Não', '2016-04-05 19:12:21', '2016-04-05 19:12:21'),
(2, 'Concluída', 'Sim', '2016-04-05 19:12:51', '2016-04-05 19:13:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_orders`
--

CREATE TABLE IF NOT EXISTS `status_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `finish` enum('Sim','Não') DEFAULT 'Não',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `status_orders`
--

INSERT INTO `status_orders` (`id`, `name`, `finish`, `created`, `modified`) VALUES
(1, 'Pendente', 'Não', '2015-12-11 00:48:59', '2015-12-11 00:48:59'),
(2, 'Quitado', 'Sim', '2015-12-11 00:49:14', '2016-04-19 08:31:24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `stocks`
--

CREATE TABLE IF NOT EXISTS `stocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` double(50,3) NOT NULL,
  `value` double(50,3) DEFAULT NULL,
  `entry_note_item_id` int(11) DEFAULT NULL,
  `internal_transfer_item_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `manual_adjustment_id` int(11) DEFAULT NULL,
  `finished` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Extraindo dados da tabela `stocks`
--

INSERT INTO `stocks` (`id`, `location_id`, `product_id`, `quantity`, `value`, `entry_note_item_id`, `internal_transfer_item_id`, `order_id`, `manual_adjustment_id`, `finished`, `created`, `modified`) VALUES
(1, 2, 52, 1.000, NULL, NULL, NULL, 43, NULL, '2016-11-13 18:18:32', '2016-11-13 18:18:32', '2016-11-13 18:18:32'),
(2, 100, 52, -1.000, NULL, NULL, NULL, 43, NULL, '2016-11-13 18:18:32', '2016-11-13 18:18:32', '2016-11-13 18:18:32'),
(3, 2, 52, 1.000, NULL, NULL, NULL, 44, NULL, '2016-11-13 18:18:32', '2016-11-13 18:18:32', '2016-11-13 18:18:32'),
(4, 100, 52, -1.000, NULL, NULL, NULL, 44, NULL, '2016-11-13 18:18:32', '2016-11-13 18:18:32', '2016-11-13 18:18:32'),
(5, 2, 52, 1.000, NULL, NULL, NULL, 45, NULL, '2016-11-13 18:18:32', '2016-11-13 18:18:32', '2016-11-13 18:18:32'),
(6, 100, 52, -1.000, NULL, NULL, NULL, 45, NULL, '2016-11-13 18:18:32', '2016-11-13 18:18:32', '2016-11-13 18:18:32'),
(7, 2, 52, 1.000, NULL, NULL, NULL, 46, NULL, '2016-11-13 18:18:32', '2016-11-13 18:18:32', '2016-11-13 18:18:32'),
(8, 100, 52, -1.000, NULL, NULL, NULL, 46, NULL, '2016-11-13 18:18:32', '2016-11-13 18:18:32', '2016-11-13 18:18:32'),
(9, 2, 52, 1.000, NULL, NULL, NULL, 47, NULL, '2016-11-13 18:18:32', '2016-11-13 18:18:32', '2016-11-13 18:18:32'),
(10, 100, 52, -1.000, NULL, NULL, NULL, 47, NULL, '2016-11-13 18:18:32', '2016-11-13 18:18:32', '2016-11-13 18:18:32'),
(11, 2, 90, 1.000, NULL, NULL, NULL, 49, NULL, '2016-11-13 18:18:32', '2016-11-13 18:18:32', '2016-11-13 18:18:32'),
(12, 100, 90, -1.000, NULL, NULL, NULL, 49, NULL, '2016-11-13 18:18:32', '2016-11-13 18:18:32', '2016-11-13 18:18:32'),
(13, 2, 51, 1.000, NULL, NULL, NULL, 58, NULL, '2016-12-08 22:57:29', '2016-12-08 22:57:29', '2016-12-08 22:57:29'),
(14, 100, 51, -1.000, NULL, NULL, NULL, 58, NULL, '2016-12-08 22:57:29', '2016-12-08 22:57:29', '2016-12-08 22:57:29'),
(15, 2, 52, 1.000, NULL, NULL, NULL, 59, NULL, '2016-12-08 22:57:29', '2016-12-08 22:57:29', '2016-12-08 22:57:29'),
(16, 100, 52, -1.000, NULL, NULL, NULL, 59, NULL, '2016-12-08 22:57:29', '2016-12-08 22:57:29', '2016-12-08 22:57:29'),
(17, 2, 52, 1.000, NULL, NULL, NULL, 60, NULL, '2016-12-08 22:57:29', '2016-12-08 22:57:29', '2016-12-08 22:57:29'),
(18, 100, 52, -1.000, NULL, NULL, NULL, 60, NULL, '2016-12-08 22:57:29', '2016-12-08 22:57:29', '2016-12-08 22:57:29'),
(19, 2, 53, 1.000, NULL, NULL, NULL, 61, NULL, '2016-12-08 22:57:29', '2016-12-08 22:57:29', '2016-12-08 22:57:29'),
(20, 100, 53, -1.000, NULL, NULL, NULL, 61, NULL, '2016-12-08 22:57:29', '2016-12-08 22:57:29', '2016-12-08 22:57:29'),
(21, 2, 53, 1.000, NULL, NULL, NULL, 62, NULL, '2016-12-08 22:57:29', '2016-12-08 22:57:29', '2016-12-08 22:57:29'),
(22, 100, 53, -1.000, NULL, NULL, NULL, 62, NULL, '2016-12-08 22:57:29', '2016-12-08 22:57:29', '2016-12-08 22:57:29'),
(23, 2, 53, 1.000, NULL, NULL, NULL, 63, NULL, '2016-12-08 22:57:29', '2016-12-08 22:57:29', '2016-12-08 22:57:29'),
(24, 100, 53, -1.000, NULL, NULL, NULL, 63, NULL, '2016-12-08 22:57:29', '2016-12-08 22:57:29', '2016-12-08 22:57:29'),
(25, 2, 53, 1.000, NULL, NULL, NULL, 64, NULL, '2016-12-08 22:57:29', '2016-12-08 22:57:29', '2016-12-08 22:57:29'),
(26, 100, 53, -1.000, NULL, NULL, NULL, 64, NULL, '2016-12-08 22:57:29', '2016-12-08 22:57:29', '2016-12-08 22:57:29'),
(27, 2, 53, 1.000, NULL, NULL, NULL, 65, NULL, '2016-12-08 22:57:29', '2016-12-08 22:57:29', '2016-12-08 22:57:29'),
(28, 100, 53, -1.000, NULL, NULL, NULL, 65, NULL, '2016-12-08 22:57:29', '2016-12-08 22:57:29', '2016-12-08 22:57:29'),
(29, 2, 53, 1.000, NULL, NULL, NULL, 66, NULL, '2016-12-08 22:57:29', '2016-12-08 22:57:29', '2016-12-08 22:57:29'),
(30, 100, 53, -1.000, NULL, NULL, NULL, 66, NULL, '2016-12-08 22:57:29', '2016-12-08 22:57:29', '2016-12-08 22:57:29'),
(31, 2, 53, 1.000, NULL, NULL, NULL, 67, NULL, '2016-12-08 22:57:29', '2016-12-08 22:57:29', '2016-12-08 22:57:29'),
(32, 100, 53, -1.000, NULL, NULL, NULL, 67, NULL, '2016-12-08 22:57:29', '2016-12-08 22:57:29', '2016-12-08 22:57:29'),
(33, 2, 53, 1.000, NULL, NULL, NULL, 68, NULL, '2016-12-08 22:57:29', '2016-12-08 22:57:29', '2016-12-08 22:57:29'),
(34, 100, 53, -1.000, NULL, NULL, NULL, 68, NULL, '2016-12-08 22:57:29', '2016-12-08 22:57:29', '2016-12-08 22:57:29'),
(35, 2, 80, 1.000, NULL, NULL, NULL, 69, NULL, '2016-12-08 22:57:29', '2016-12-08 22:57:29', '2016-12-08 22:57:29'),
(36, 100, 80, -1.000, NULL, NULL, NULL, 69, NULL, '2016-12-08 22:57:29', '2016-12-08 22:57:29', '2016-12-08 22:57:29'),
(39, 100, 51, 45.000, NULL, NULL, NULL, NULL, 1, '2017-01-20 13:53:56', '2017-01-20 13:53:56', '2017-01-20 13:53:56'),
(40, 100, 52, 57.000, NULL, NULL, NULL, NULL, 2, '2017-01-20 13:54:37', '2017-01-20 13:54:37', '2017-01-20 13:54:37'),
(41, 100, 53, 296.000, NULL, NULL, NULL, NULL, 3, '2017-01-20 13:55:02', '2017-01-20 13:55:02', '2017-01-20 13:55:02'),
(42, 100, 52, 2.000, NULL, NULL, NULL, NULL, 4, '2017-01-20 13:55:26', '2017-01-20 13:55:26', '2017-01-20 13:55:26'),
(43, 100, 80, 18.000, NULL, NULL, NULL, NULL, 5, '2017-01-20 13:56:00', '2017-01-20 13:56:00', '2017-01-20 13:56:00'),
(44, 100, 90, 11.000, NULL, NULL, NULL, NULL, 6, '2017-01-20 13:56:18', '2017-01-20 13:56:18', '2017-01-20 13:56:18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `subcategories`
--

CREATE TABLE IF NOT EXISTS `subcategories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `stage_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `name`, `stage_id`, `created`, `modified`) VALUES
(1, 1, 'Pratos Individuais', 2, '2016-06-20 08:34:13', '2016-06-20 08:34:13'),
(2, 1, 'Petiscos', 2, '2016-06-20 08:34:26', '2016-06-20 08:34:26'),
(3, 1, 'Hambúrguer', 2, '2016-06-20 08:34:48', '2016-06-20 13:45:05'),
(4, 1, 'Guarnição', 2, '2016-06-20 08:35:30', '2016-06-20 08:35:30'),
(5, 1, 'Sobremesas', 2, '2016-06-20 08:35:43', '2016-06-20 08:35:49'),
(6, 2, 'Cervejas', 4, '2016-06-20 08:36:04', '2016-06-20 08:37:01'),
(7, 2, 'Doses', 4, '2016-06-20 08:37:17', '2016-06-20 08:37:17'),
(8, 2, 'Refrigerantes', 4, '2016-06-20 08:37:35', '2016-06-20 08:37:35'),
(9, 2, 'Energéticos', 4, '2016-06-20 08:37:48', '2016-06-20 08:37:48'),
(10, 2, 'Água', 4, '2016-06-20 08:37:58', '2016-06-20 08:37:58'),
(11, 2, 'Vinhos', 4, '2016-06-20 08:38:11', '2016-06-20 08:38:11'),
(12, 2, 'Sucos (400 ml)', 2, '2016-06-20 08:38:36', '2016-06-20 08:38:46');

-- --------------------------------------------------------

--
-- Estrutura da tabela `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(45) NOT NULL,
  `contact_name` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `fax` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `suppliers`
--

INSERT INTO `suppliers` (`id`, `company_name`, `contact_name`, `phone`, `fax`, `email`, `created`, `modified`) VALUES
(1, 'Supermercado Siqueira', '', '123234234234', '656565656565', 'delfino.cesar@gmail.com', '2015-12-20 18:25:49', '2016-02-09 17:07:57');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tables`
--

CREATE TABLE IF NOT EXISTS `tables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `balcony` enum('Sim','Não') NOT NULL DEFAULT 'Não',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Extraindo dados da tabela `tables`
--

INSERT INTO `tables` (`id`, `name`, `balcony`, `created`, `modified`) VALUES
(1, '01', 'Não', '2015-12-11 00:22:29', '2016-05-21 14:25:24'),
(2, '02', 'Não', '2015-12-11 00:22:32', '2015-12-11 00:22:32'),
(3, '03', 'Não', '2015-12-11 00:22:36', '2015-12-11 00:22:36'),
(4, '04', 'Não', '2015-12-11 00:22:39', '2015-12-11 00:22:39'),
(5, '05', 'Não', '2015-12-11 00:22:43', '2015-12-11 00:22:43'),
(6, '06', 'Não', '2015-12-11 00:22:47', '2015-12-11 00:22:47'),
(7, '07', 'Não', '2015-12-11 00:22:52', '2015-12-11 00:22:52'),
(8, '08', 'Não', '2015-12-11 00:22:55', '2015-12-11 00:22:55'),
(9, '09', 'Não', '2015-12-11 00:22:59', '2015-12-11 00:22:59'),
(10, '10', 'Não', '2015-12-11 00:23:02', '2015-12-11 00:23:02'),
(11, '11', 'Não', '2015-12-11 00:23:06', '2015-12-11 00:23:06'),
(12, '12', 'Não', '2015-12-11 00:23:09', '2015-12-11 00:23:09'),
(13, '13', 'Não', '2015-12-11 00:23:12', '2015-12-11 00:23:12'),
(14, '14', 'Não', '2015-12-11 00:23:15', '2015-12-11 00:23:15'),
(15, '15', 'Não', '2015-12-11 00:23:18', '2015-12-11 00:23:18'),
(16, '16', '', '2017-01-20 13:48:01', '2017-01-20 13:48:01'),
(17, '17', '', '2017-01-20 13:48:10', '2017-01-20 13:48:10'),
(18, '18', '', '2017-01-20 13:48:17', '2017-01-20 13:48:17'),
(19, '19', '', '2017-01-20 13:48:24', '2017-01-20 13:48:24'),
(24, '20', '', '2017-01-20 13:49:52', '2017-01-20 13:49:52'),
(25, '21', '', '2017-01-20 13:50:01', '2017-01-20 13:50:01'),
(26, '22', '', '2017-01-20 13:50:36', '2017-01-20 13:50:36'),
(27, '23', '', '2017-01-20 13:50:44', '2017-01-20 13:50:44'),
(28, '24', '', '2017-01-20 13:50:56', '2017-01-20 13:50:56'),
(29, '25', '', '2017-01-20 13:51:01', '2017-01-20 13:51:01'),
(30, '26', '', '2017-01-20 13:51:05', '2017-01-20 13:51:05'),
(31, '27', '', '2017-01-20 13:51:10', '2017-01-20 13:51:10'),
(32, '28', '', '2017-01-20 13:51:16', '2017-01-20 13:51:16'),
(33, '29', '', '2017-01-20 13:51:21', '2017-01-20 13:51:21'),
(34, '30', '', '2017-01-20 13:51:27', '2017-01-20 13:51:27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `units`
--

CREATE TABLE IF NOT EXISTS `units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `initials` varchar(45) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`),
  UNIQUE KEY `initials_UNIQUE` (`initials`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Extraindo dados da tabela `units`
--

INSERT INTO `units` (`id`, `name`, `initials`, `created`, `modified`) VALUES
(1, 'Unidade', 'Un', '2015-11-10 02:20:31', '2015-11-10 02:20:31'),
(2, 'Quilograma', 'Kg', '2015-11-10 02:21:00', '2015-11-11 03:04:53'),
(3, 'Garrafa', 'Ga', '2015-11-11 03:02:45', '2016-03-08 01:13:25'),
(4, 'Caixa', 'Cx', '2015-11-11 03:03:25', '2015-11-11 03:03:25'),
(5, 'Lata', 'Lt', '2015-11-11 03:03:38', '2015-11-11 03:03:38'),
(6, 'Fardo', 'Fd', '2015-11-11 03:03:52', '2015-11-11 03:03:52'),
(8, 'Litros', 'L', '2015-11-11 03:04:37', '2015-11-11 03:04:37'),
(9, 'Grama', 'Gr', '2015-11-11 03:05:05', '2016-03-08 01:13:35'),
(10, 'Pacote', 'Pct', '2015-11-11 03:05:29', '2015-11-11 03:05:29'),
(11, 'Pote', 'Pt', '2015-11-11 03:05:45', '2015-11-11 03:05:45'),
(12, 'Galão', 'Gl', '2015-11-11 03:05:56', '2015-11-11 03:05:56'),
(13, 'Balde', 'Bd', '2015-11-11 03:06:04', '2015-11-11 03:06:04'),
(14, 'Frasco', 'Fr', '2015-11-11 03:06:12', '2015-11-11 03:06:12'),
(15, 'Metro', 'M', '2015-11-11 03:06:24', '2015-11-11 03:06:24'),
(16, 'Peça', 'Pc', '2015-11-11 03:06:35', '2015-11-11 03:06:35'),
(17, 'Porção', 'Por', '2015-11-11 03:17:17', '2015-11-11 03:17:17'),
(18, 'Prato', 'Prt', '2015-11-11 03:18:57', '2015-11-11 03:18:57'),
(19, 'Taça', 'Tc', '2015-11-11 03:21:58', '2015-11-11 03:21:58'),
(20, 'Caneca', 'Cn', '2015-11-11 03:22:16', '2015-11-11 03:22:16'),
(21, 'Barril', 'Br', '2015-12-12 20:08:12', '2015-12-12 20:08:12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `status` enum('Ativo','Inativo') NOT NULL DEFAULT 'Inativo',
  `name` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `group_id`, `status`, `name`, `email`, `password`, `created`, `modified`) VALUES
(1, 1, 'Ativo', 'Gustavo César de Melo', 'delfino.cesar@gmail.com', 'd9f626c44c10101c2ab684d64ca2dd27608e232f', '2016-02-09 14:36:03', '2016-05-21 15:33:12');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
