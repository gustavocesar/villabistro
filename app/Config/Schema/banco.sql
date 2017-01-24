-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24-Jan-2017 às 17:06
-- Versão do servidor: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `villabistro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acos`
--

CREATE TABLE IF NOT EXISTS `acos` (
`id` int(10) NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=542 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 414),
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
(124, 1, NULL, NULL, 'Users', 294, 313),
(125, 124, NULL, NULL, 'login', 295, 296),
(126, 124, NULL, NULL, 'logout', 297, 298),
(127, 124, NULL, NULL, 'initDB', 299, 300),
(128, 124, NULL, NULL, 'index', 301, 302),
(129, 124, NULL, NULL, 'view', 303, 304),
(130, 124, NULL, NULL, 'add', 305, 306),
(131, 124, NULL, NULL, 'edit', 307, 308),
(132, 124, NULL, NULL, 'delete', 309, 310),
(133, 1, NULL, NULL, 'AclExtras', 314, 315),
(134, 1, NULL, NULL, 'DebugKit', 316, 323),
(135, 134, NULL, NULL, 'ToolbarAccess', 317, 322),
(136, 135, NULL, NULL, 'history_state', 318, 319),
(137, 135, NULL, NULL, 'sql_explain', 320, 321),
(310, 1, NULL, NULL, 'Configurations', 324, 327),
(311, 310, NULL, NULL, 'index', 325, 326),
(319, 1, NULL, NULL, 'InternalTransfers', 328, 339),
(320, 319, NULL, NULL, 'index', 329, 330),
(321, 319, NULL, NULL, 'view', 331, 332),
(322, 319, NULL, NULL, 'add', 333, 334),
(323, 319, NULL, NULL, 'edit', 335, 336),
(324, 319, NULL, NULL, 'delete', 337, 338),
(332, 1, NULL, NULL, 'StatusInternalTransfers', 340, 351),
(333, 332, NULL, NULL, 'index', 341, 342),
(334, 332, NULL, NULL, 'view', 343, 344),
(335, 332, NULL, NULL, 'add', 345, 346),
(336, 332, NULL, NULL, 'edit', 347, 348),
(337, 332, NULL, NULL, 'delete', 349, 350),
(345, 1, NULL, NULL, 'InternalTransferItems', 352, 363),
(346, 345, NULL, NULL, 'index', 353, 354),
(347, 345, NULL, NULL, 'view', 355, 356),
(348, 345, NULL, NULL, 'add', 357, 358),
(349, 345, NULL, NULL, 'edit', 359, 360),
(350, 345, NULL, NULL, 'delete', 361, 362),
(394, 1, NULL, NULL, 'Cashiers', 364, 375),
(395, 394, NULL, NULL, 'index', 365, 366),
(396, 394, NULL, NULL, 'view', 367, 368),
(397, 394, NULL, NULL, 'add', 369, 370),
(398, 394, NULL, NULL, 'edit', 371, 372),
(399, 394, NULL, NULL, 'delete', 373, 374),
(407, 94, NULL, NULL, 'stock_control', 213, 214),
(408, 94, NULL, NULL, 'getListLocation', 215, 216),
(409, 94, NULL, NULL, 'get_list_stock_by_location', 217, 218),
(425, 64, NULL, NULL, 'getUnit', 155, 156),
(482, 94, NULL, NULL, 'modal_edit', 219, 220),
(483, 1, NULL, NULL, 'ManualAdjustments', 376, 387),
(484, 483, NULL, NULL, 'index', 377, 378),
(485, 483, NULL, NULL, 'view', 379, 380),
(486, 483, NULL, NULL, 'add', 381, 382),
(487, 483, NULL, NULL, 'edit', 383, 384),
(488, 483, NULL, NULL, 'delete', 385, 386),
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
(510, 1, NULL, NULL, 'Charts', 388, 393),
(511, 510, NULL, NULL, 'index', 389, 390),
(513, 94, NULL, NULL, 'drawLineChartGlobalInventory', 231, 232),
(514, 94, NULL, NULL, 'getStockQuantityByProduct', 233, 234),
(515, 50, NULL, NULL, 'order_wizard', 119, 120),
(518, 58, NULL, NULL, 'getProductItems', 141, 142),
(519, 50, NULL, NULL, 'cancel', 121, 122),
(520, 112, NULL, NULL, 'close_table', 275, 276),
(522, 112, NULL, NULL, 'getBills', 277, 278),
(524, 1, NULL, NULL, 'Payments', 394, 407),
(525, 524, NULL, NULL, 'index', 395, 396),
(526, 524, NULL, NULL, 'view', 397, 398),
(527, 524, NULL, NULL, 'add', 399, 400),
(528, 524, NULL, NULL, 'edit', 401, 402),
(529, 524, NULL, NULL, 'delete', 403, 404),
(530, 524, NULL, NULL, 'list_orders', 405, 406),
(531, 112, NULL, NULL, 'change_table', 279, 280),
(532, 56, NULL, NULL, 'documentation', 127, 128),
(533, 510, NULL, NULL, 'weekly_stock', 391, 392),
(535, 2, NULL, NULL, 'print_bill', 13, 14),
(537, 2, NULL, NULL, 'history', 15, 16),
(538, 1, NULL, NULL, 'Reports', 408, 413),
(539, 538, NULL, NULL, 'index', 409, 410),
(540, 124, NULL, NULL, 'loadPermissions', 311, 312),
(541, 538, NULL, NULL, 'sales_period', 411, 412);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aros`
--

CREATE TABLE IF NOT EXISTS `aros` (
`id` int(10) NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

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
`id` int(10) NOT NULL,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) COLLATE utf8_swedish_ci NOT NULL DEFAULT '0',
  `_read` varchar(2) COLLATE utf8_swedish_ci NOT NULL DEFAULT '0',
  `_update` varchar(2) COLLATE utf8_swedish_ci NOT NULL DEFAULT '0',
  `_delete` varchar(2) COLLATE utf8_swedish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 1, '1', '1', '1', '1'),
(2, 2, 1, '1', '1', '1', '1'),
(3, 3, 1, '1', '1', '1', '1'),
(4, 3, 126, '1', '1', '1', '1'),
(5, 2, 128, '1', '1', '1', '1'),
(6, 2, 129, '1', '1', '1', '1'),
(7, 2, 125, '1', '1', '1', '1'),
(8, 2, 126, '1', '1', '1', '1'),
(9, 2, 503, '1', '1', '1', '1'),
(10, 3, 128, '1', '1', '1', '1'),
(11, 3, 129, '1', '1', '1', '1'),
(12, 3, 125, '1', '1', '1', '1'),
(13, 3, 503, '1', '1', '1', '1'),
(14, 3, 508, '1', '1', '1', '1'),
(15, 3, 311, '1', '1', '1', '1'),
(16, 3, 519, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bills`
--

CREATE TABLE IF NOT EXISTS `bills` (
`id` int(11) NOT NULL,
  `status_bill_id` int(11) NOT NULL,
  `table_id` int(11) DEFAULT NULL,
  `identifier` varchar(45) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bills`
--

INSERT INTO `bills` (`id`, `status_bill_id`, `table_id`, `identifier`, `created`, `modified`) VALUES
(1, 1, 1, 'I', '2017-01-23 13:06:53', '2017-01-23 13:06:53');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cashiers`
--

CREATE TABLE IF NOT EXISTS `cashiers` (
`id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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
`id` int(11) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `status_entry_note_id` int(11) NOT NULL DEFAULT '1',
  `fiscal_note` varchar(45) NOT NULL,
  `entry_date` date NOT NULL,
  `entry_hour` time DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `entry_note_items`
--

CREATE TABLE IF NOT EXISTS `entry_note_items` (
`id` int(11) NOT NULL,
  `entry_note_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` double(50,3) unsigned NOT NULL,
  `unit_cost` double(50,6) NOT NULL,
  `total_cost` double(50,6) unsigned NOT NULL,
  `location_id` int(11) NOT NULL COMMENT 'Local de destino, para onde o produto vai quando a nota for concluída',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
`id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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
`id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `location_destiny_id` int(11) NOT NULL,
  `status_internal_transfer_id` int(11) NOT NULL DEFAULT '1',
  `date` date NOT NULL,
  `time` time NOT NULL,
  `observation` text COLLATE utf8_swedish_ci,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `internal_transfer_items`
--

CREATE TABLE IF NOT EXISTS `internal_transfer_items` (
`id` int(11) NOT NULL,
  `internal_transfer_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` double(50,3) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
`id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_swedish_ci NOT NULL,
  `location_type_id` int(11) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

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
`id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_swedish_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

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
`id` int(11) NOT NULL,
  `location_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`id` int(11) NOT NULL,
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
  `modified` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `quantity`, `stage_id`, `table_id`, `bill_id`, `status_order_id`, `payment_id`, `observation`, `kitchen_order`, `created`, `modified`) VALUES
(1, 2, 40, 1.00, 2, 1, 1, 1, NULL, '', 0, '2017-01-23 13:06:53', '2017-01-23 13:06:53'),
(2, 2, 40, 1.00, 2, 1, 1, 1, NULL, '', 0, '2017-01-23 13:06:54', '2017-01-23 13:06:54'),
(3, 2, 41, 1.00, 2, 1, 1, 1, NULL, '', 0, '2017-01-23 13:06:54', '2017-01-23 13:06:54'),
(4, 2, 41, 1.00, 2, 1, 1, 1, NULL, '', 0, '2017-01-23 13:06:54', '2017-01-23 13:06:54'),
(5, 2, 41, 1.00, 2, 1, 1, 1, NULL, '', 0, '2017-01-23 13:06:54', '2017-01-23 13:06:54'),
(6, 2, 42, 1.00, 2, 1, 1, 1, NULL, '', 0, '2017-01-23 13:06:54', '2017-01-23 13:06:54'),
(7, 2, 42, 1.00, 2, 1, 1, 1, NULL, '', 0, '2017-01-23 13:06:54', '2017-01-23 13:06:54'),
(8, 2, 42, 1.00, 2, 1, 1, 1, NULL, '', 0, '2017-01-23 13:06:54', '2017-01-23 13:06:54'),
(9, 2, 42, 1.00, 2, 1, 1, 1, NULL, '', 0, '2017-01-23 13:06:54', '2017-01-23 13:06:54'),
(10, 2, 43, 1.00, 2, 1, 1, 1, NULL, '', 0, '2017-01-23 13:06:54', '2017-01-23 13:06:54'),
(11, 2, 43, 1.00, 2, 1, 1, 1, NULL, '', 0, '2017-01-23 13:06:54', '2017-01-23 13:06:54'),
(12, 2, 43, 1.00, 2, 1, 1, 1, NULL, '', 0, '2017-01-23 13:06:54', '2017-01-23 13:06:54'),
(13, 2, 43, 1.00, 2, 1, 1, 1, NULL, '', 0, '2017-01-23 13:06:54', '2017-01-23 13:06:54'),
(14, 2, 43, 1.00, 2, 1, 1, 1, NULL, '', 0, '2017-01-23 13:06:54', '2017-01-23 13:06:54'),
(15, 2, 20, 1.00, 2, 1, 1, 1, NULL, '', 0, '2017-01-23 13:06:54', '2017-01-23 13:06:54'),
(16, 2, 21, 1.00, 2, 1, 1, 1, NULL, '', 0, '2017-01-23 13:06:54', '2017-01-23 13:06:54'),
(17, 2, 21, 1.00, 2, 1, 1, 1, NULL, '', 0, '2017-01-23 13:06:54', '2017-01-23 13:06:54'),
(18, 2, 22, 1.00, 2, 1, 1, 1, NULL, '', 0, '2017-01-23 13:06:54', '2017-01-23 13:06:54'),
(19, 2, 22, 1.00, 2, 1, 1, 1, NULL, '', 0, '2017-01-23 13:06:55', '2017-01-23 13:06:55'),
(20, 2, 23, 1.00, 2, 1, 1, 1, NULL, '', 0, '2017-01-23 13:06:55', '2017-01-23 13:06:55'),
(21, 2, 23, 1.00, 2, 1, 1, 1, NULL, '', 0, '2017-01-23 13:06:55', '2017-01-23 13:06:55'),
(22, 2, 23, 1.00, 5, 1, 1, 2, NULL, '', 0, '2017-01-23 13:06:55', '2017-01-23 13:07:55');

-- --------------------------------------------------------

--
-- Estrutura da tabela `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
`id` int(11) NOT NULL,
  `table_id` int(11) DEFAULT NULL,
  `bill_id` int(11) DEFAULT NULL,
  `subtotal` double(50,2) DEFAULT NULL,
  `payd_value` double(50,2) DEFAULT NULL,
  `payback` double(50,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(11) NOT NULL,
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
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `subcategory_id`, `unit_id`, `name`, `status`, `cost_price`, `sell_price`, `avaliable_to_order`, `stockable`, `minimum_stock`, `description`, `created`, `modified`) VALUES
(2, 5, 1, 'Grand Gateou com Magnum', 'Ativo', 18.000, 18.000, 'Sim', 'Não', 0.000, '', '2016-06-20 09:16:23', '2016-06-20 09:16:23'),
(3, 5, 1, 'Pudim de Cream Cheese com Cobertura de Goiabada', 'Ativo', 6.000, 6.000, 'Sim', 'Não', 0.000, '', '2016-06-20 09:18:53', '2016-06-20 09:20:13'),
(10, 1, 1, 'Grelhado de Carré Suíno', 'Ativo', 13.000, 13.000, 'Sim', 'Não', 0.000, 'Carré Suíno 300gr, Batata Temperada e Molho Picante', '2016-06-20 08:40:43', '2016-06-20 08:40:43'),
(11, 1, 1, 'Grelhado de Chuleta', 'Ativo', 15.000, 15.000, 'Sim', 'Não', 0.000, 'Chuleta 300gr, Batata Temperada e Molho Picante', '2016-06-20 08:41:32', '2016-06-20 08:41:32'),
(12, 1, 1, 'Grelhado de Filé de Frango', 'Ativo', 10.000, 10.000, 'Sim', 'Não', 0.000, 'Frango 300gr, Batata Temperada e Molho Picante', '2016-06-20 08:43:12', '2016-06-20 08:43:12'),
(13, 1, 1, 'Salada', 'Ativo', 12.000, 12.000, 'Sim', 'Não', 0.000, 'Alface Americana, Alface Roxa, Tomate Seco, Rúcula, Ricota, Palmito, Champignon, Azeitona Preta, Croutons, Cebola Roxa, Molho de Mostarda e Mel', '2016-06-20 08:46:24', '2016-06-20 08:46:24'),
(14, 1, 1, 'Queijo Coalho com Mel', 'Ativo', 8.000, 8.000, 'Sim', 'Não', 0.000, '2 Queijos Coalho Grelhados com Mel', '2016-06-20 08:48:28', '2016-06-20 08:48:28'),
(20, 3, 1, 'Boi Gordo', 'Ativo', 14.000, 14.000, 'Sim', 'Não', 0.000, 'Pão, Molho de Ervas, Hambúrguer Bovino 180gr, Queijo Cheddar, Picles, Cebola Roxa, Alface Americana, Bacon.\r\nAcompanha Molho Especial de Abacaxi', '2016-06-20 09:05:49', '2016-06-20 09:05:49'),
(21, 3, 1, 'Porcão', 'Ativo', 14.000, 14.000, 'Sim', 'Não', 0.000, 'Pão, Molho Rosé, Hambúrguer Suíno 180gr, Queijo Prato, Picles, Cebola Roxa, Tomate Seco e Bacon.\r\nAcompanha Molho Especial de Abacaxi.', '2016-06-20 09:08:26', '2016-06-20 09:08:26'),
(22, 3, 1, 'Frangoso', 'Ativo', 12.000, 12.000, 'Sim', 'Não', 0.000, 'Pão, Molho, Hambúrguer de Ave 180gr, Requeijão Cremoso, Picles, Tomate, Cebola Caramelizada, Alface Roxa e Bacon.\r\nAcompanha Molho Especial de Abacaxi.', '2016-06-20 09:09:54', '2016-06-20 09:09:54'),
(23, 3, 1, 'Fit', 'Ativo', 10.000, 10.000, 'Sim', 'Não', 0.000, 'Pão, Molho Rosé, Queijo Prato, Cebola Caramelizada, Tomate Seco, Alface Americana e Rúcula.\r\nAcompanha Molho Especial de Abacaxi.', '2016-06-20 09:11:11', '2016-06-20 09:11:11'),
(30, 2, 1, 'Isca de Filé de Frango', 'Ativo', 15.000, 15.000, 'Sim', 'Não', 0.000, '400gr de Filé de Frango Empanado, Molho Picante e Molho da Casa', '2016-06-20 08:50:00', '2016-06-20 08:50:00'),
(31, 2, 1, 'Frios', 'Ativo', 18.000, 18.000, 'Sim', 'Não', 0.000, 'Salaminho, Muçarela, Azeitona Verde, Palmito, Queijo Prato e Azeite', '2016-06-20 08:51:01', '2016-06-20 08:51:01'),
(32, 2, 1, 'Almondega ao Molho Sugo', 'Ativo', 18.000, 18.000, 'Sim', 'Não', 0.000, 'Almondega 500gr, Molho ao Sugo, Mandioca Cozida', '2016-06-20 08:52:06', '2016-06-20 08:52:06'),
(33, 2, 1, 'Almondega Tradicional', 'Ativo', 17.000, 17.000, 'Sim', 'Não', 0.000, 'Almondega 500gr, Requeijão Cremoso e Mandioca Cozida', '2016-06-20 08:53:00', '2016-06-20 08:53:00'),
(34, 2, 1, 'Costelinha Suína com Barbecue', 'Ativo', 17.000, 17.000, 'Sim', 'Não', 0.000, 'Costelinha Suína 500gr, Mandioca Cozida e Molho da Casa', '2016-06-20 08:53:56', '2016-06-20 08:53:56'),
(35, 2, 1, 'Costelinha Suína Tradicional', 'Ativo', 17.000, 17.000, 'Sim', 'Não', 0.000, 'Costelinha Suína 500gr, Mandioca Cozida e Molho da Casa', '2016-06-20 08:54:53', '2016-06-20 08:54:53'),
(37, 2, 1, 'Batata com Cheddar e Bacon', 'Ativo', 17.000, 17.000, 'Sim', 'Não', 0.000, 'Batata Palito 600gr, Cheddar, Bacon e Molho da Casa', '2016-06-20 09:02:43', '2016-06-20 09:02:43'),
(38, 2, 1, 'Ninho de Cobra', 'Ativo', 15.000, 15.000, 'Sim', 'Não', 0.000, 'Linguiça Suína Apimentada 500gr, Ovo de Codorna, Batata Palha e Molho da Casa', '2016-06-20 09:04:08', '2016-06-20 09:04:08'),
(40, 4, 1, 'Arroz', 'Ativo', 2.750, 2.750, 'Sim', 'Não', 0.000, '', '2016-06-20 09:13:50', '2016-11-07 13:23:26'),
(41, 4, 1, 'Salada Simples', 'Ativo', 2.600, 2.600, 'Sim', 'Não', 0.000, '', '2016-06-20 09:14:14', '2016-11-07 13:22:45'),
(42, 4, 1, 'Mandioca Cozida', 'Ativo', 2.500, 2.500, 'Sim', 'Não', 0.000, '', '2016-06-20 09:14:40', '2016-06-20 09:14:40'),
(43, 4, 1, 'Batata Frita 150gr', 'Ativo', 4.000, 4.000, 'Sim', 'Não', 0.000, '', '2016-06-20 09:15:34', '2016-06-20 09:15:34'),
(51, 6, 3, 'Sol Mexicana - Long Neck', 'Ativo', 6.000, 6.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:22:55', '2016-06-20 09:28:54'),
(52, 6, 3, 'Heinekein - Long Neck', 'Ativo', 6.000, 6.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:23:56', '2016-06-20 09:29:13'),
(53, 6, 3, 'Budwaiser - Long Neck', 'Ativo', 6.000, 6.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:24:16', '2016-06-20 09:29:25'),
(54, 6, 5, 'Caracu - Lata', 'Ativo', 4.000, 4.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:24:55', '2016-06-20 09:29:40'),
(55, 6, 5, 'Cerveja Zero - Lata', 'Ativo', 4.000, 4.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:25:29', '2016-06-20 09:29:52'),
(60, 7, 1, 'Red Label', 'Ativo', 8.000, 8.000, 'Sim', 'Não', 0.000, '', '2016-06-20 09:28:25', '2016-06-20 09:28:25'),
(61, 7, 1, 'Jack Daniel''s', 'Ativo', 15.000, 15.000, 'Sim', 'Não', 0.000, '', '2016-06-20 09:31:00', '2016-06-20 09:31:00'),
(62, 7, 1, 'Old Parr', 'Ativo', 13.000, 13.000, 'Sim', 'Não', 0.000, '', '2016-06-20 09:31:58', '2016-06-20 09:31:58'),
(70, 7, 1, 'Absolut', 'Ativo', 10.000, 10.000, 'Sim', 'Não', 0.000, '', '2016-06-20 09:32:24', '2016-06-20 09:32:24'),
(71, 7, 1, 'Smirnoff', 'Ativo', 6.000, 6.000, 'Sim', 'Não', 0.000, '', '2016-06-20 09:32:42', '2016-06-20 09:32:42'),
(78, 7, 1, 'Tequila José Cuervo', 'Ativo', 10.000, 10.000, 'Sim', 'Não', 0.000, '', '2016-06-20 09:33:01', '2016-06-20 09:33:01'),
(79, 7, 1, 'Cachaça', 'Ativo', 2.000, 2.000, 'Sim', 'Não', 0.000, '', '2016-06-20 09:33:22', '2016-06-20 09:33:22'),
(80, 8, 5, 'Coca Cola', 'Ativo', 3.000, 3.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:34:43', '2016-06-20 09:35:56'),
(81, 8, 5, 'Coca Cola Zero', 'Ativo', 3.500, 3.500, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:35:33', '2016-06-20 09:35:33'),
(82, 8, 5, 'Guaraná Antarctica', 'Ativo', 3.000, 3.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:51:19', '2016-06-20 09:51:19'),
(84, 8, 5, 'Fanta Laranja', 'Ativo', 3.000, 3.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:51:53', '2016-06-20 09:51:53'),
(85, 8, 5, 'Soda Limonada', 'Ativo', 3.000, 3.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:52:16', '2016-06-20 09:52:16'),
(90, 9, 5, 'Red Bull', 'Ativo', 12.000, 12.000, 'Sim', 'Sim', 15.000, '', '2016-06-20 09:53:15', '2016-06-20 09:53:15'),
(91, 9, 5, 'Extra Power', 'Ativo', 8.000, 8.000, 'Sim', 'Sim', 15.000, '', '2016-06-20 10:00:05', '2016-06-20 10:00:05'),
(98, 10, 3, 'Água Sem Gás 500ml', 'Ativo', 2.000, 2.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 10:01:10', '2016-06-20 10:01:10'),
(99, 10, 5, 'Água Com Gás 500ml', 'Ativo', 2.500, 2.500, 'Sim', 'Sim', 20.000, '', '2016-06-20 10:01:33', '2016-06-20 10:01:33'),
(100, 11, 3, 'Concha y Toro', 'Ativo', 38.000, 38.000, 'Sim', 'Sim', 5.000, '', '2016-06-20 10:02:09', '2016-06-20 10:02:09'),
(101, 11, 3, 'Santa Helena', 'Ativo', 37.000, 37.000, 'Sim', 'Sim', 5.000, '', '2016-06-20 10:02:42', '2016-06-20 10:02:42'),
(102, 11, 3, 'Concha y Toro Sauvignon', 'Ativo', 39.000, 39.000, 'Sim', 'Sim', 5.000, '', '2016-06-20 10:03:26', '2016-06-20 10:03:26'),
(103, 11, 19, 'Quinta do Morgado', 'Ativo', 6.000, 6.000, 'Sim', 'Não', 0.000, '', '2016-06-20 10:04:13', '2016-06-20 10:04:13'),
(120, 12, 1, 'Suco de Laranja', 'Ativo', 4.000, 4.000, 'Sim', 'Não', 0.000, '', '2016-06-20 10:05:08', '2016-06-20 10:05:08'),
(121, 12, 1, 'Suco de Acerola', 'Ativo', 4.000, 4.000, 'Sim', 'Não', 0.000, '', '2016-06-20 10:05:08', '2016-06-20 10:05:08'),
(122, 12, 1, 'Suco de Maracujá', 'Ativo', 4.000, 4.000, 'Sim', 'Não', 0.000, '', '2016-06-20 10:05:08', '2016-06-20 10:05:08'),
(123, 12, 1, 'Suco de Limão', 'Ativo', 4.000, 4.000, 'Sim', 'Não', 0.000, '', '2016-06-20 10:05:08', '2016-06-20 10:05:08'),
(125, 12, 1, 'Laranja com Acerola', 'Ativo', 4.000, 4.000, 'Sim', 'Não', 0.000, '', '2016-06-20 10:05:08', '2016-06-20 10:05:08'),
(126, 12, 1, 'Suco de Uva', 'Ativo', 4.000, 4.000, 'Sim', 'Não', 0.000, '', '2016-06-20 10:05:08', '2016-06-20 10:05:08'),
(127, 12, 1, 'Suco de Abacaxi', 'Ativo', 4.000, 4.000, 'Sim', 'Não', 0.000, '', '2016-06-20 10:05:08', '2016-06-20 10:05:08'),
(128, 12, 1, 'Abacaxi com Hortelã', 'Ativo', 4.000, 4.000, 'Sim', 'Não', 0.000, '', '2016-06-20 10:05:08', '2016-06-20 10:05:08'),
(129, 12, 1, 'Suco de Morango', 'Ativo', 4.000, 4.000, 'Sim', 'Não', 0.000, '', '2016-06-20 10:05:08', '2016-06-20 10:05:08');

-- --------------------------------------------------------

--
-- Estrutura da tabela `product_items`
--

CREATE TABLE IF NOT EXISTS `product_items` (
`id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` double(50,3) unsigned NOT NULL DEFAULT '0.000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `stages`
--

CREATE TABLE IF NOT EXISTS `stages` (
`id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `status` enum('Ativo','Inativo') NOT NULL DEFAULT 'Ativo',
  `show_on_kitchen` enum('Sim','Não') DEFAULT 'Sim',
  `consider_as` enum('Concluídos','Pendentes') DEFAULT 'Pendentes' COMMENT 'Diferenciação para montagem da Fila de Pedidos (Pedidos Pendentes e Pedidos Concluídos)',
  `label_class` varchar(55) DEFAULT 'label-primary',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

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
`id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `finish` enum('Sim','Não') DEFAULT 'Não',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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
`id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `finish` enum('Sim','Não') DEFAULT 'Não',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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
`id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_swedish_ci NOT NULL,
  `finish` enum('Sim','Não') COLLATE utf8_swedish_ci DEFAULT 'Não',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

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
`id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `finish` enum('Sim','Não') DEFAULT 'Não',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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
`id` int(11) NOT NULL,
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
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `subcategories`
--

CREATE TABLE IF NOT EXISTS `subcategories` (
`id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `stage_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

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
`id` int(11) NOT NULL,
  `company_name` varchar(45) NOT NULL,
  `contact_name` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `fax` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
`id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `balcony` enum('Sim','Não') NOT NULL DEFAULT 'Não',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

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
(15, '15', 'Não', '2015-12-11 00:23:18', '2015-12-11 00:23:18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `units`
--

CREATE TABLE IF NOT EXISTS `units` (
`id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `initials` varchar(45) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

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
`id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `status` enum('Ativo','Inativo') NOT NULL DEFAULT 'Inativo',
  `name` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `group_id`, `status`, `name`, `email`, `password`, `created`, `modified`) VALUES
(1, 1, 'Ativo', 'Gustavo César de Melo', 'delfino.cesar@gmail.com', 'd9f626c44c10101c2ab684d64ca2dd27608e232f', '2016-02-09 14:36:03', '2016-05-21 15:33:12'),
(2, 3, 'Ativo', 'Garçom 1', 'gustavo.cesar123@outlook.com', 'd9f626c44c10101c2ab684d64ca2dd27608e232f', '2017-01-23 11:30:49', '2017-01-23 11:30:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acos`
--
ALTER TABLE `acos`
 ADD PRIMARY KEY (`id`), ADD KEY `idx_acos_lft_rght` (`lft`,`rght`), ADD KEY `idx_acos_alias` (`alias`);

--
-- Indexes for table `aros`
--
ALTER TABLE `aros`
 ADD PRIMARY KEY (`id`), ADD KEY `idx_aros_lft_rght` (`lft`,`rght`), ADD KEY `idx_aros_alias` (`alias`);

--
-- Indexes for table `aros_acos`
--
ALTER TABLE `aros_acos`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`), ADD KEY `idx_aco_id` (`aco_id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashiers`
--
ALTER TABLE `cashiers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `entry_notes`
--
ALTER TABLE `entry_notes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entry_note_items`
--
ALTER TABLE `entry_note_items`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `internal_transfers`
--
ALTER TABLE `internal_transfers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `internal_transfer_items`
--
ALTER TABLE `internal_transfer_items`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `location_types`
--
ALTER TABLE `location_types`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `manual_adjustments`
--
ALTER TABLE `manual_adjustments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_items`
--
ALTER TABLE `product_items`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stages`
--
ALTER TABLE `stages`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `status_bills`
--
ALTER TABLE `status_bills`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `status_entry_notes`
--
ALTER TABLE `status_entry_notes`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `status_internal_transfers`
--
ALTER TABLE `status_internal_transfers`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `status_orders`
--
ALTER TABLE `status_orders`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name_UNIQUE` (`name`), ADD UNIQUE KEY `initials_UNIQUE` (`initials`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acos`
--
ALTER TABLE `acos`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=542;
--
-- AUTO_INCREMENT for table `aros`
--
ALTER TABLE `aros`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `aros_acos`
--
ALTER TABLE `aros_acos`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cashiers`
--
ALTER TABLE `cashiers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `entry_notes`
--
ALTER TABLE `entry_notes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `entry_note_items`
--
ALTER TABLE `entry_note_items`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `internal_transfers`
--
ALTER TABLE `internal_transfers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `internal_transfer_items`
--
ALTER TABLE `internal_transfer_items`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `location_types`
--
ALTER TABLE `location_types`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `manual_adjustments`
--
ALTER TABLE `manual_adjustments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=130;
--
-- AUTO_INCREMENT for table `product_items`
--
ALTER TABLE `product_items`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stages`
--
ALTER TABLE `stages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `status_bills`
--
ALTER TABLE `status_bills`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `status_entry_notes`
--
ALTER TABLE `status_entry_notes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `status_internal_transfers`
--
ALTER TABLE `status_internal_transfers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `status_orders`
--
ALTER TABLE `status_orders`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
