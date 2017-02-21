-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21-Fev-2017 às 18:07
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
) ENGINE=InnoDB AUTO_INCREMENT=553 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 436),
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
(537, 2, NULL, NULL, 'history', 15, 16),
(538, 1, NULL, NULL, 'PaymentMethods', 406, 417),
(539, 538, NULL, NULL, 'index', 407, 408),
(540, 538, NULL, NULL, 'view', 409, 410),
(541, 538, NULL, NULL, 'add', 411, 412),
(542, 538, NULL, NULL, 'edit', 413, 414),
(543, 538, NULL, NULL, 'delete', 415, 416),
(544, 1, NULL, NULL, 'Reports', 418, 423),
(545, 544, NULL, NULL, 'index', 419, 420),
(546, 544, NULL, NULL, 'sales_period', 421, 422),
(547, 1, NULL, NULL, 'StatusPaymentMethods', 424, 435),
(548, 547, NULL, NULL, 'index', 425, 426),
(549, 547, NULL, NULL, 'view', 427, 428),
(550, 547, NULL, NULL, 'add', 429, 430),
(551, 547, NULL, NULL, 'edit', 431, 432),
(552, 547, NULL, NULL, 'delete', 433, 434);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 1, '1', '1', '1', '1'),
(2, 2, 1, '1', '1', '1', '1'),
(3, 3, 1, '1', '1', '1', '1'),
(4, 3, 126, '1', '1', '1', '1'),
(5, 2, 519, '-1', '-1', '-1', '-1'),
(6, 3, 519, '-1', '-1', '-1', '-1');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=167 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `subcategory_id`, `unit_id`, `name`, `status`, `cost_price`, `sell_price`, `avaliable_to_order`, `stockable`, `minimum_stock`, `description`, `created`, `modified`) VALUES
(2, 5, 1, 'Grand Gateou com Magnum', 'Ativo', 12.000, 21.000, 'Sim', 'Sim', 10.000, '', '2016-06-20 09:16:23', '2017-02-21 14:06:26'),
(3, 5, 1, 'Pudim de Cream Cheese com Cobertura de Goiabada', 'Ativo', 2.300, 6.000, 'Sim', 'Sim', 10.000, '', '2016-06-20 09:18:53', '2017-02-21 14:06:26'),
(10, 1, 1, 'Grelhado de Carré Suíno', 'Ativo', 6.500, 17.000, 'Sim', 'Sim', 20.000, 'Carré Suíno 300gr, Batata Temperada e Molho Picante', '2016-06-20 08:40:43', '2017-02-21 14:06:25'),
(11, 1, 1, 'Grelhado de Contrafilé', 'Ativo', 7.380, 18.000, 'Sim', 'Sim', 20.000, 'Chuleta 300gr, Batata Temperada e Molho Picante', '2016-06-20 08:41:32', '2017-02-21 14:06:24'),
(12, 1, 1, 'Grelhado de Filé de Frango', 'Ativo', 4.900, 16.000, 'Sim', 'Sim', 20.000, 'Frango 300gr, Batata Temperada e Molho Picante', '2016-06-20 08:43:12', '2017-02-21 14:06:23'),
(13, 1, 1, 'Salada', 'Ativo', 7.000, 15.000, 'Sim', 'Sim', 20.000, 'Alface Americana, Alface Roxa, Tomate Seco, Rúcula, Ricota, Palmito, Champignon, Azeitona Preta, Croutons, Cebola Roxa, Molho de Mostarda e Mel', '2016-06-20 08:46:24', '2017-02-21 14:06:22'),
(14, 1, 1, 'Queijo Coalho com Mel', 'Ativo', 4.000, 9.000, 'Sim', 'Sim', 20.000, '2 Queijos Coalho Grelhados com Mel', '2016-06-20 08:48:28', '2017-02-21 14:06:22'),
(20, 3, 1, 'Boi Gordo', 'Ativo', 7.500, 16.500, 'Sim', 'Sim', 20.000, 'Pão, Molho de Ervas, Hambúrguer Bovino 180gr, Queijo Cheddar, Picles, Cebola Roxa, Alface Americana, Bacon.\r\nAcompanha Molho Especial de Abacaxi', '2016-06-20 09:05:49', '2017-02-21 14:06:21'),
(21, 3, 1, 'Porcão', 'Ativo', 8.150, 15.500, 'Sim', 'Sim', 20.000, 'Pão, Molho Rosé, Hambúrguer Suíno 180gr, Queijo Prato, Picles, Cebola Roxa, Tomate Seco e Bacon.\r\nAcompanha Molho Especial de Abacaxi.', '2016-06-20 09:08:26', '2017-02-21 14:06:20'),
(22, 3, 1, 'Frangoso', 'Ativo', 5.500, 14.500, 'Sim', 'Sim', 20.000, 'Pão, Molho, Hambúrguer de Ave 180gr, Requeijão Cremoso, Picles, Tomate, Cebola Caramelizada, Alface Roxa e Bacon.\r\nAcompanha Molho Especial de Abacaxi.', '2016-06-20 09:09:54', '2017-02-21 14:06:20'),
(23, 3, 1, 'Fit', 'Ativo', 4.900, 13.000, 'Sim', 'Sim', 20.000, 'Pão, Molho Rosé, Queijo Prato, Cebola Caramelizada, Tomate Seco, Alface Americana e Rúcula.\r\nAcompanha Molho Especial de Abacaxi.', '2016-06-20 09:11:11', '2017-02-21 14:06:19'),
(30, 2, 1, 'Isca de Filé de Frango', 'Ativo', 7.550, 20.000, 'Sim', 'Sim', 20.000, '400gr de Filé de Frango Empanado, Molho Picante e Molho da Casa', '2016-06-20 08:50:00', '2017-02-21 14:06:18'),
(31, 2, 1, 'Frios', 'Ativo', 9.000, 22.000, 'Sim', 'Sim', 20.000, 'Salaminho, Muçarela, Azeitona Verde, Palmito, Queijo Prato e Azeite', '2016-06-20 08:51:01', '2017-02-21 14:06:18'),
(32, 2, 1, 'Almondega ao Molho Sugo', 'Ativo', 12.950, 22.000, 'Sim', 'Sim', 20.000, 'Almondega 500gr, Molho ao Sugo, Mandioca Cozida', '2016-06-20 08:52:06', '2017-02-21 14:06:17'),
(33, 2, 1, 'Almondega Tradicional', 'Ativo', 10.950, 22.000, 'Sim', 'Sim', 20.000, 'Almondega 500gr, Requeijão Cremoso e Mandioca Cozida', '2016-06-20 08:53:00', '2017-02-21 14:06:16'),
(34, 2, 1, 'Costelinha Suína com Barbecue', 'Ativo', 10.950, 24.000, 'Sim', 'Sim', 20.000, 'Costelinha Suína 500gr, Mandioca Cozida e Molho da Casa', '2016-06-20 08:53:56', '2017-02-21 14:06:16'),
(35, 2, 1, 'Costelinha Suína Tradicional', 'Ativo', 9.950, 22.000, 'Sim', 'Sim', 20.000, 'Costelinha Suína 500gr, Mandioca Cozida e Molho da Casa', '2016-06-20 08:54:53', '2017-02-21 14:06:15'),
(37, 2, 1, 'Batata com Cheddar e Bacon', 'Ativo', 10.200, 22.000, 'Sim', 'Sim', 20.000, 'Batata Palito 600gr, Cheddar, Bacon e Molho da Casa', '2016-06-20 09:02:43', '2017-02-21 14:06:15'),
(40, 4, 1, 'Arroz', 'Ativo', 0.850, 4.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:13:50', '2017-02-21 14:06:14'),
(41, 4, 1, 'Salada Simples', 'Ativo', 1.500, 4.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:14:14', '2017-02-21 14:06:13'),
(42, 4, 1, 'Mandioca Cozida', 'Ativo', 0.620, 4.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:14:40', '2017-02-21 14:06:13'),
(43, 4, 1, 'Batata Frita 150gr', 'Ativo', 1.050, 6.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:15:34', '2017-02-21 14:06:12'),
(51, 6, 3, 'Sol Mexicana - Long Neck', 'Ativo', 3.290, 6.000, 'Sim', 'Sim', 50.000, '', '2016-06-20 09:22:55', '2017-02-21 14:06:11'),
(52, 6, 3, 'Heinekein - Long Neck', 'Ativo', 3.330, 6.000, 'Sim', 'Sim', 50.000, '', '2016-06-20 09:23:56', '2017-02-21 14:06:11'),
(53, 6, 3, 'Budwaiser - Long Neck', 'Ativo', 3.000, 6.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:24:16', '2017-02-21 14:06:10'),
(54, 6, 3, 'Caracu ', 'Ativo', 3.500, 6.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:24:55', '2017-02-21 14:06:10'),
(55, 6, 5, 'Brahma Zero', 'Ativo', 3.500, 6.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:25:29', '2017-02-21 14:06:09'),
(60, 7, 1, 'Red Label', 'Ativo', 3.250, 8.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:28:25', '2017-02-21 14:06:09'),
(61, 7, 1, 'Jack Daniel''s', 'Ativo', 4.950, 15.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:31:00', '2017-02-21 14:06:08'),
(62, 7, 1, 'Old Parr', 'Ativo', 6.000, 13.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:31:58', '2017-02-21 14:06:08'),
(70, 7, 1, 'Absolut', 'Ativo', 4.900, 10.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:32:24', '2017-02-21 14:06:07'),
(71, 7, 1, 'Smirnoff', 'Ativo', 1.750, 6.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:32:42', '2017-02-21 14:06:07'),
(78, 7, 1, 'Tequila José Cuervo', 'Ativo', 5.000, 10.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:33:01', '2017-02-21 14:06:06'),
(79, 7, 1, 'Cachaça', 'Ativo', 0.500, 2.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:33:22', '2017-02-21 14:04:21'),
(80, 8, 5, 'Coca Cola', 'Ativo', 1.910, 3.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:34:43', '2017-02-21 14:04:20'),
(81, 8, 5, 'Coca Cola Zero', 'Ativo', 1.990, 3.500, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:35:33', '2017-02-21 14:04:19'),
(82, 8, 5, 'Guaraná Antarctica', 'Ativo', 1.990, 3.500, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:51:19', '2017-02-21 14:04:19'),
(84, 8, 5, 'Fanta Laranja', 'Ativo', 1.990, 3.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:51:53', '2017-02-21 14:04:18'),
(85, 8, 5, 'Soda Limonada', 'Ativo', 1.990, 3.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:52:16', '2017-02-21 14:04:17'),
(90, 9, 5, 'Red Bull', 'Ativo', 6.200, 12.000, 'Sim', 'Sim', 15.000, '', '2016-06-20 09:53:15', '2017-02-21 14:04:17'),
(91, 9, 5, 'Extra Power', 'Ativo', 3.650, 8.000, 'Sim', 'Sim', 15.000, '', '2016-06-20 10:00:05', '2017-02-21 14:04:16'),
(98, 10, 3, 'Água Sem Gás 500ml', 'Ativo', 0.650, 2.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 10:01:10', '2017-02-21 14:04:16'),
(99, 10, 3, 'Água Com Gás 500ml', 'Ativo', 0.850, 2.500, 'Sim', 'Sim', 20.000, '', '2016-06-20 10:01:33', '2017-02-21 14:04:15'),
(100, 11, 3, 'Concha y Toro', 'Ativo', 22.000, 38.000, 'Sim', 'Sim', 5.000, '', '2016-06-20 10:02:09', '2017-02-21 14:04:14'),
(101, 11, 3, 'Santa Helena', 'Ativo', 23.000, 37.000, 'Sim', 'Sim', 5.000, '', '2016-06-20 10:02:42', '2017-02-21 14:04:14'),
(102, 11, 3, 'Concha y Toro Sauvignon', 'Ativo', 22.000, 39.000, 'Sim', 'Sim', 5.000, '', '2016-06-20 10:03:26', '2017-02-21 14:04:13'),
(103, 11, 19, 'Quinta do Morgado', 'Ativo', 2.450, 6.000, 'Sim', 'Sim', 4.000, '', '2016-06-20 10:04:13', '2017-02-21 14:04:13'),
(120, 12, 1, 'Suco de Laranja', 'Ativo', 2.000, 4.500, 'Sim', 'Não', 0.000, '', '2016-06-20 10:05:08', '2017-02-21 14:04:12'),
(121, 12, 1, 'Suco de Acerola', 'Ativo', 2.000, 4.500, 'Sim', 'Não', 0.000, '', '2016-06-20 10:05:08', '2017-02-21 14:04:12'),
(122, 12, 1, 'Suco de Maracujá', 'Ativo', 2.000, 4.500, 'Sim', 'Não', 0.000, '', '2016-06-20 10:05:08', '2017-02-21 14:04:11'),
(123, 12, 1, 'Suco de Limão', 'Ativo', 2.000, 4.500, 'Sim', 'Não', 0.000, '', '2016-06-20 10:05:08', '2017-02-21 14:04:11'),
(125, 12, 1, 'Laranja com Acerola', 'Ativo', 3.000, 6.000, 'Sim', 'Não', 0.000, '', '2016-06-20 10:05:08', '2017-02-21 14:04:10'),
(126, 12, 1, 'Suco de Uva', 'Ativo', 2.000, 4.500, 'Sim', 'Não', 0.000, '', '2016-06-20 10:05:08', '2017-02-21 14:04:09'),
(127, 12, 1, 'Suco de Abacaxi', 'Ativo', 2.000, 4.500, 'Sim', 'Não', 0.000, '', '2016-06-20 10:05:08', '2017-02-21 14:04:08'),
(128, 12, 1, 'Abacaxi com Hortelã', 'Ativo', 2.000, 4.500, 'Sim', 'Não', 0.000, '', '2016-06-20 10:05:08', '2017-02-21 14:04:08'),
(129, 12, 1, 'Suco de Morango', 'Ativo', 2.000, 4.500, 'Sim', 'Não', 0.000, '', '2016-06-20 10:05:08', '2017-02-21 14:04:07'),
(130, 12, 1, 'suco de Laranja com Morango', 'Ativo', 3.000, 7.000, 'Sim', 'Não', 0.000, '', '2016-12-08 22:50:12', '2017-02-21 14:04:07'),
(131, 1, 18, 'Grelhado de Pirarucu', 'Ativo', 13.000, 23.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:16:15', '2017-02-21 14:04:06'),
(132, 1, 18, 'Salada Moda da Casa', 'Ativo', 8.000, 15.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:16:58', '2017-02-21 14:04:05'),
(133, 2, 17, 'Isca de Tilápia', 'Ativo', 12.500, 33.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:18:37', '2017-02-21 14:04:05'),
(134, 2, 17, 'Carne na Chapa', 'Ativo', 24.800, 42.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:20:37', '2017-02-21 14:04:04'),
(135, 4, 17, 'Batata temperada', 'Ativo', 1.500, 4.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:21:29', '2017-02-21 14:04:03'),
(136, 4, 17, 'molho da casa', 'Ativo', 1.500, 3.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:22:02', '2017-02-21 14:04:03'),
(137, 4, 17, 'Molho Picante', 'Ativo', 1.500, 3.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:22:29', '2017-02-21 14:04:02'),
(138, 4, 17, 'Molho Mostarda e Mel', 'Ativo', 1.500, 3.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:22:59', '2017-02-21 14:04:01'),
(139, 4, 17, 'Molho de Ervas', 'Ativo', 1.500, 1.500, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:23:24', '2017-02-21 14:04:01'),
(140, 4, 17, 'Molho Barbecue', 'Ativo', 1.500, 3.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:23:55', '2017-02-21 14:04:00'),
(141, 4, 17, 'Geleia de Pimenta', 'Ativo', 1.500, 4.000, 'Sim', 'Sim', 20.000, '', '2017-01-20 13:24:27', '2017-02-21 14:03:59'),
(142, 4, 17, 'Adicional de Queijo', 'Ativo', 1.500, 3.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:25:04', '2017-02-21 14:03:58'),
(143, 4, 17, 'Adicional de Bacon', 'Ativo', 1.500, 3.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:25:30', '2017-02-21 14:03:58'),
(144, 4, 17, 'Adicional de Hamburguer', 'Ativo', 3.200, 7.000, 'Sim', 'Sim', 40.000, '', '2017-01-20 13:26:32', '2017-02-21 14:03:57'),
(145, 4, 13, 'Gelo', 'Ativo', 1.000, 2.500, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:26:55', '2017-02-21 14:03:56'),
(146, 10, 3, 'H2O Limoneto', 'Ativo', 3.100, 5.000, 'Sim', 'Sim', 20.000, '', '2017-01-20 13:27:37', '2017-02-21 14:03:56'),
(147, 10, 3, 'H2O Limão', 'Ativo', 3.200, 5.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:28:01', '2017-02-21 14:03:55'),
(148, 6, 3, 'Eisenbahn ', 'Ativo', 3.500, 8.000, 'Sim', 'Sim', 20.000, '', '2017-01-20 13:29:08', '2017-02-21 14:03:54'),
(149, 6, 3, 'Colorado Appia', 'Ativo', 16.900, 24.000, 'Sim', 'Sim', 20.000, '', '2017-01-20 13:29:56', '2017-02-21 14:03:54'),
(150, 6, 3, 'Weihenstephan Vitus', 'Ativo', 19.900, 28.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:31:23', '2017-02-21 14:03:53'),
(151, 6, 3, 'Duvel', 'Ativo', 17.200, 28.000, 'Sim', 'Sim', 20.000, '', '2017-01-20 13:32:01', '2017-02-21 14:03:52'),
(152, 6, 3, 'Paulaner ', 'Ativo', 19.900, 28.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:32:33', '2017-02-21 14:03:52'),
(153, 6, 3, 'Baden Baden Cristal', 'Ativo', 12.900, 21.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:33:11', '2017-02-21 14:03:51'),
(154, 11, 3, 'Lambrusco Cella', 'Ativo', 19.000, 35.000, 'Sim', 'Sim', 5.000, '', '2017-01-20 13:33:56', '2017-02-21 14:03:50'),
(155, 11, 3, 'Periquita Original', 'Ativo', 32.000, 65.000, 'Sim', 'Sim', 5.000, '', '2017-01-20 13:35:07', '2017-02-21 14:03:50'),
(156, 11, 3, 'Casa Valduga', 'Ativo', 38.000, 73.000, 'Sim', 'Sim', 5.000, '', '2017-01-20 13:35:41', '2017-02-21 14:03:49'),
(157, 11, 3, 'Porto Vaoldouro', 'Ativo', 47.000, 84.000, 'Sim', 'Sim', 5.000, '', '2017-01-20 13:36:19', '2017-02-21 14:03:49'),
(158, 7, 19, 'Absolut Vanilia', 'Ativo', 4.900, 12.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:40:28', '2017-02-21 14:03:48'),
(159, 7, 8, 'Black Label', 'Ativo', 4.900, 12.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:41:11', '2017-02-21 14:03:48'),
(160, 7, 8, 'Pinga de Mutamba', 'Ativo', 1.250, 5.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:42:06', '2017-02-21 14:03:47'),
(161, 7, 8, 'Bananinha', 'Ativo', 2.600, 6.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:42:56', '2017-02-21 14:03:46'),
(162, 7, 8, 'Licor 43', 'Ativo', 4.450, 10.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:43:31', '2017-02-21 14:03:46'),
(163, 8, 5, 'Schweppes', 'Ativo', 2.650, 4.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:44:31', '2017-02-21 14:03:45'),
(164, 5, 17, 'Pastelzinho de Nutela', 'Ativo', 3.000, 6.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:46:16', '2017-02-21 14:03:44'),
(165, 5, 17, 'Coquetel de Churros', 'Ativo', 5.000, 18.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:46:55', '2017-02-21 14:03:44'),
(166, 5, 17, 'Mousse de Maracujá', 'Ativo', 3.000, 6.000, 'Sim', 'Sim', 20.000, '', '2017-01-20 13:47:28', '2017-02-21 14:03:43');

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
) ENGINE=InnoDB AUTO_INCREMENT=460 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `stocks`
--

INSERT INTO `stocks` (`id`, `location_id`, `product_id`, `quantity`, `value`, `entry_note_item_id`, `internal_transfer_item_id`, `order_id`, `manual_adjustment_id`, `finished`, `created`, `modified`) VALUES
(45, 100, 166, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:43', '2017-02-21 14:03:43', '2017-02-21 14:03:43'),
(46, 101, 166, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:43', '2017-02-21 14:03:43', '2017-02-21 14:03:43'),
(47, 1, 166, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:43', '2017-02-21 14:03:43', '2017-02-21 14:03:43'),
(48, 2, 166, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:43', '2017-02-21 14:03:43', '2017-02-21 14:03:43'),
(49, 3, 166, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:43', '2017-02-21 14:03:43', '2017-02-21 14:03:43'),
(50, 100, 165, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:44', '2017-02-21 14:03:44', '2017-02-21 14:03:44'),
(51, 101, 165, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:44', '2017-02-21 14:03:44', '2017-02-21 14:03:44'),
(52, 1, 165, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:44', '2017-02-21 14:03:44', '2017-02-21 14:03:44'),
(53, 2, 165, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:44', '2017-02-21 14:03:44', '2017-02-21 14:03:44'),
(54, 3, 165, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:44', '2017-02-21 14:03:44', '2017-02-21 14:03:44'),
(55, 100, 164, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:44', '2017-02-21 14:03:44', '2017-02-21 14:03:44'),
(56, 101, 164, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:44', '2017-02-21 14:03:44', '2017-02-21 14:03:44'),
(57, 1, 164, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:44', '2017-02-21 14:03:44', '2017-02-21 14:03:44'),
(58, 2, 164, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:44', '2017-02-21 14:03:44', '2017-02-21 14:03:44'),
(59, 3, 164, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:44', '2017-02-21 14:03:44', '2017-02-21 14:03:44'),
(60, 100, 163, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:45', '2017-02-21 14:03:45', '2017-02-21 14:03:45'),
(61, 101, 163, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:45', '2017-02-21 14:03:45', '2017-02-21 14:03:45'),
(62, 1, 163, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:45', '2017-02-21 14:03:45', '2017-02-21 14:03:45'),
(63, 2, 163, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:45', '2017-02-21 14:03:45', '2017-02-21 14:03:45'),
(64, 3, 163, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:45', '2017-02-21 14:03:45', '2017-02-21 14:03:45'),
(65, 100, 162, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:46', '2017-02-21 14:03:46', '2017-02-21 14:03:46'),
(66, 101, 162, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:46', '2017-02-21 14:03:46', '2017-02-21 14:03:46'),
(67, 1, 162, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:46', '2017-02-21 14:03:46', '2017-02-21 14:03:46'),
(68, 2, 162, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:46', '2017-02-21 14:03:46', '2017-02-21 14:03:46'),
(69, 3, 162, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:46', '2017-02-21 14:03:46', '2017-02-21 14:03:46'),
(70, 100, 161, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:46', '2017-02-21 14:03:46', '2017-02-21 14:03:46'),
(71, 101, 161, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:46', '2017-02-21 14:03:46', '2017-02-21 14:03:46'),
(72, 1, 161, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:46', '2017-02-21 14:03:46', '2017-02-21 14:03:46'),
(73, 2, 161, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:46', '2017-02-21 14:03:46', '2017-02-21 14:03:46'),
(74, 3, 161, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:46', '2017-02-21 14:03:46', '2017-02-21 14:03:46'),
(75, 100, 160, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:47', '2017-02-21 14:03:47', '2017-02-21 14:03:47'),
(76, 101, 160, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:47', '2017-02-21 14:03:47', '2017-02-21 14:03:47'),
(77, 1, 160, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:47', '2017-02-21 14:03:47', '2017-02-21 14:03:47'),
(78, 2, 160, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:47', '2017-02-21 14:03:47', '2017-02-21 14:03:47'),
(79, 3, 160, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:47', '2017-02-21 14:03:47', '2017-02-21 14:03:47'),
(80, 100, 159, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:48', '2017-02-21 14:03:48', '2017-02-21 14:03:48'),
(81, 101, 159, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:48', '2017-02-21 14:03:48', '2017-02-21 14:03:48'),
(82, 1, 159, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:48', '2017-02-21 14:03:48', '2017-02-21 14:03:48'),
(83, 2, 159, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:48', '2017-02-21 14:03:48', '2017-02-21 14:03:48'),
(84, 3, 159, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:48', '2017-02-21 14:03:48', '2017-02-21 14:03:48'),
(85, 100, 158, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:48', '2017-02-21 14:03:48', '2017-02-21 14:03:48'),
(86, 101, 158, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:48', '2017-02-21 14:03:48', '2017-02-21 14:03:48'),
(87, 1, 158, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:48', '2017-02-21 14:03:48', '2017-02-21 14:03:48'),
(88, 2, 158, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:48', '2017-02-21 14:03:48', '2017-02-21 14:03:48'),
(89, 3, 158, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:48', '2017-02-21 14:03:48', '2017-02-21 14:03:48'),
(90, 100, 157, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:49', '2017-02-21 14:03:49', '2017-02-21 14:03:49'),
(91, 101, 157, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:49', '2017-02-21 14:03:49', '2017-02-21 14:03:49'),
(92, 1, 157, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:49', '2017-02-21 14:03:49', '2017-02-21 14:03:49'),
(93, 2, 157, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:49', '2017-02-21 14:03:49', '2017-02-21 14:03:49'),
(94, 3, 157, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:49', '2017-02-21 14:03:49', '2017-02-21 14:03:49'),
(95, 100, 156, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:49', '2017-02-21 14:03:49', '2017-02-21 14:03:49'),
(96, 101, 156, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:49', '2017-02-21 14:03:49', '2017-02-21 14:03:49'),
(97, 1, 156, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:49', '2017-02-21 14:03:49', '2017-02-21 14:03:49'),
(98, 2, 156, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:49', '2017-02-21 14:03:49', '2017-02-21 14:03:49'),
(99, 3, 156, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:49', '2017-02-21 14:03:49', '2017-02-21 14:03:49'),
(100, 100, 155, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:50', '2017-02-21 14:03:50', '2017-02-21 14:03:50'),
(101, 101, 155, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:50', '2017-02-21 14:03:50', '2017-02-21 14:03:50'),
(102, 1, 155, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:50', '2017-02-21 14:03:50', '2017-02-21 14:03:50'),
(103, 2, 155, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:50', '2017-02-21 14:03:50', '2017-02-21 14:03:50'),
(104, 3, 155, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:50', '2017-02-21 14:03:50', '2017-02-21 14:03:50'),
(105, 100, 154, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:50', '2017-02-21 14:03:50', '2017-02-21 14:03:50'),
(106, 101, 154, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:50', '2017-02-21 14:03:50', '2017-02-21 14:03:50'),
(107, 1, 154, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:50', '2017-02-21 14:03:50', '2017-02-21 14:03:50'),
(108, 2, 154, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:50', '2017-02-21 14:03:50', '2017-02-21 14:03:50'),
(109, 3, 154, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:51', '2017-02-21 14:03:51', '2017-02-21 14:03:51'),
(110, 100, 153, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:51', '2017-02-21 14:03:51', '2017-02-21 14:03:51'),
(111, 101, 153, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:51', '2017-02-21 14:03:51', '2017-02-21 14:03:51'),
(112, 1, 153, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:51', '2017-02-21 14:03:51', '2017-02-21 14:03:51'),
(113, 2, 153, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:51', '2017-02-21 14:03:51', '2017-02-21 14:03:51'),
(114, 3, 153, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:51', '2017-02-21 14:03:51', '2017-02-21 14:03:51'),
(115, 100, 152, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:52', '2017-02-21 14:03:52', '2017-02-21 14:03:52'),
(116, 101, 152, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:52', '2017-02-21 14:03:52', '2017-02-21 14:03:52'),
(117, 1, 152, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:52', '2017-02-21 14:03:52', '2017-02-21 14:03:52'),
(118, 2, 152, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:52', '2017-02-21 14:03:52', '2017-02-21 14:03:52'),
(119, 3, 152, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:52', '2017-02-21 14:03:52', '2017-02-21 14:03:52'),
(120, 100, 151, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:52', '2017-02-21 14:03:52', '2017-02-21 14:03:52'),
(121, 101, 151, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:52', '2017-02-21 14:03:52', '2017-02-21 14:03:52'),
(122, 1, 151, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:52', '2017-02-21 14:03:52', '2017-02-21 14:03:52'),
(123, 2, 151, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:52', '2017-02-21 14:03:52', '2017-02-21 14:03:52'),
(124, 3, 151, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:52', '2017-02-21 14:03:52', '2017-02-21 14:03:52'),
(125, 100, 150, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:53', '2017-02-21 14:03:53', '2017-02-21 14:03:53'),
(126, 101, 150, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:53', '2017-02-21 14:03:53', '2017-02-21 14:03:53'),
(127, 1, 150, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:53', '2017-02-21 14:03:53', '2017-02-21 14:03:53'),
(128, 2, 150, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:53', '2017-02-21 14:03:53', '2017-02-21 14:03:53'),
(129, 3, 150, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:53', '2017-02-21 14:03:53', '2017-02-21 14:03:53'),
(130, 100, 149, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:54', '2017-02-21 14:03:54', '2017-02-21 14:03:54'),
(131, 101, 149, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:54', '2017-02-21 14:03:54', '2017-02-21 14:03:54'),
(132, 1, 149, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:54', '2017-02-21 14:03:54', '2017-02-21 14:03:54'),
(133, 2, 149, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:54', '2017-02-21 14:03:54', '2017-02-21 14:03:54'),
(134, 3, 149, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:54', '2017-02-21 14:03:54', '2017-02-21 14:03:54'),
(135, 100, 148, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:54', '2017-02-21 14:03:54', '2017-02-21 14:03:54'),
(136, 101, 148, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:54', '2017-02-21 14:03:54', '2017-02-21 14:03:54'),
(137, 1, 148, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:54', '2017-02-21 14:03:54', '2017-02-21 14:03:54'),
(138, 2, 148, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:54', '2017-02-21 14:03:54', '2017-02-21 14:03:54'),
(139, 3, 148, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:54', '2017-02-21 14:03:54', '2017-02-21 14:03:54'),
(140, 100, 147, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:55', '2017-02-21 14:03:55', '2017-02-21 14:03:55'),
(141, 101, 147, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:55', '2017-02-21 14:03:55', '2017-02-21 14:03:55'),
(142, 1, 147, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:55', '2017-02-21 14:03:55', '2017-02-21 14:03:55'),
(143, 2, 147, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:55', '2017-02-21 14:03:55', '2017-02-21 14:03:55'),
(144, 3, 147, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:55', '2017-02-21 14:03:55', '2017-02-21 14:03:55'),
(145, 100, 146, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:56', '2017-02-21 14:03:56', '2017-02-21 14:03:56'),
(146, 101, 146, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:56', '2017-02-21 14:03:56', '2017-02-21 14:03:56'),
(147, 1, 146, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:56', '2017-02-21 14:03:56', '2017-02-21 14:03:56'),
(148, 2, 146, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:56', '2017-02-21 14:03:56', '2017-02-21 14:03:56'),
(149, 3, 146, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:56', '2017-02-21 14:03:56', '2017-02-21 14:03:56'),
(150, 100, 145, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:56', '2017-02-21 14:03:56', '2017-02-21 14:03:56'),
(151, 101, 145, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:56', '2017-02-21 14:03:56', '2017-02-21 14:03:56'),
(152, 1, 145, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:56', '2017-02-21 14:03:56', '2017-02-21 14:03:56'),
(153, 2, 145, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:56', '2017-02-21 14:03:56', '2017-02-21 14:03:56'),
(154, 3, 145, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:56', '2017-02-21 14:03:56', '2017-02-21 14:03:56'),
(155, 100, 144, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:57', '2017-02-21 14:03:57', '2017-02-21 14:03:57'),
(156, 101, 144, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:57', '2017-02-21 14:03:57', '2017-02-21 14:03:57'),
(157, 1, 144, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:57', '2017-02-21 14:03:57', '2017-02-21 14:03:57'),
(158, 2, 144, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:57', '2017-02-21 14:03:57', '2017-02-21 14:03:57'),
(159, 3, 144, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:57', '2017-02-21 14:03:57', '2017-02-21 14:03:57'),
(160, 100, 143, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:58', '2017-02-21 14:03:58', '2017-02-21 14:03:58'),
(161, 101, 143, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:58', '2017-02-21 14:03:58', '2017-02-21 14:03:58'),
(162, 1, 143, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:58', '2017-02-21 14:03:58', '2017-02-21 14:03:58'),
(163, 2, 143, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:58', '2017-02-21 14:03:58', '2017-02-21 14:03:58'),
(164, 3, 143, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:58', '2017-02-21 14:03:58', '2017-02-21 14:03:58'),
(165, 100, 142, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:58', '2017-02-21 14:03:58', '2017-02-21 14:03:58'),
(166, 101, 142, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:58', '2017-02-21 14:03:58', '2017-02-21 14:03:58'),
(167, 1, 142, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:58', '2017-02-21 14:03:58', '2017-02-21 14:03:58'),
(168, 2, 142, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:58', '2017-02-21 14:03:58', '2017-02-21 14:03:58'),
(169, 3, 142, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:58', '2017-02-21 14:03:58', '2017-02-21 14:03:58'),
(170, 100, 141, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:59', '2017-02-21 14:03:59', '2017-02-21 14:03:59'),
(171, 101, 141, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:59', '2017-02-21 14:03:59', '2017-02-21 14:03:59'),
(172, 1, 141, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:59', '2017-02-21 14:03:59', '2017-02-21 14:03:59'),
(173, 2, 141, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:59', '2017-02-21 14:03:59', '2017-02-21 14:03:59'),
(174, 3, 141, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:03:59', '2017-02-21 14:03:59', '2017-02-21 14:03:59'),
(175, 100, 140, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:00', '2017-02-21 14:04:00', '2017-02-21 14:04:00'),
(176, 101, 140, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:00', '2017-02-21 14:04:00', '2017-02-21 14:04:00'),
(177, 1, 140, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:00', '2017-02-21 14:04:00', '2017-02-21 14:04:00'),
(178, 2, 140, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:00', '2017-02-21 14:04:00', '2017-02-21 14:04:00'),
(179, 3, 140, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:00', '2017-02-21 14:04:00', '2017-02-21 14:04:00'),
(180, 100, 139, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:01', '2017-02-21 14:04:01', '2017-02-21 14:04:01'),
(181, 101, 139, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:01', '2017-02-21 14:04:01', '2017-02-21 14:04:01'),
(182, 1, 139, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:01', '2017-02-21 14:04:01', '2017-02-21 14:04:01'),
(183, 2, 139, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:01', '2017-02-21 14:04:01', '2017-02-21 14:04:01'),
(184, 3, 139, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:01', '2017-02-21 14:04:01', '2017-02-21 14:04:01'),
(185, 100, 138, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:01', '2017-02-21 14:04:01', '2017-02-21 14:04:01'),
(186, 101, 138, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:01', '2017-02-21 14:04:01', '2017-02-21 14:04:01'),
(187, 1, 138, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:01', '2017-02-21 14:04:01', '2017-02-21 14:04:01'),
(188, 2, 138, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:01', '2017-02-21 14:04:01', '2017-02-21 14:04:01'),
(189, 3, 138, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:01', '2017-02-21 14:04:01', '2017-02-21 14:04:01'),
(190, 100, 137, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:02', '2017-02-21 14:04:02', '2017-02-21 14:04:02'),
(191, 101, 137, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:02', '2017-02-21 14:04:02', '2017-02-21 14:04:02'),
(192, 1, 137, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:02', '2017-02-21 14:04:02', '2017-02-21 14:04:02'),
(193, 2, 137, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:02', '2017-02-21 14:04:02', '2017-02-21 14:04:02'),
(194, 3, 137, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:02', '2017-02-21 14:04:02', '2017-02-21 14:04:02'),
(195, 100, 136, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:03', '2017-02-21 14:04:03', '2017-02-21 14:04:03'),
(196, 101, 136, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:03', '2017-02-21 14:04:03', '2017-02-21 14:04:03'),
(197, 1, 136, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:03', '2017-02-21 14:04:03', '2017-02-21 14:04:03'),
(198, 2, 136, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:03', '2017-02-21 14:04:03', '2017-02-21 14:04:03'),
(199, 3, 136, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:03', '2017-02-21 14:04:03', '2017-02-21 14:04:03'),
(200, 100, 135, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:03', '2017-02-21 14:04:03', '2017-02-21 14:04:03'),
(201, 101, 135, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:03', '2017-02-21 14:04:03', '2017-02-21 14:04:03'),
(202, 1, 135, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:03', '2017-02-21 14:04:03', '2017-02-21 14:04:03'),
(203, 2, 135, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:03', '2017-02-21 14:04:03', '2017-02-21 14:04:03'),
(204, 3, 135, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:03', '2017-02-21 14:04:03', '2017-02-21 14:04:03'),
(205, 100, 134, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:04', '2017-02-21 14:04:04', '2017-02-21 14:04:04'),
(206, 101, 134, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:04', '2017-02-21 14:04:04', '2017-02-21 14:04:04'),
(207, 1, 134, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:04', '2017-02-21 14:04:04', '2017-02-21 14:04:04'),
(208, 2, 134, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:04', '2017-02-21 14:04:04', '2017-02-21 14:04:04'),
(209, 3, 134, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:04', '2017-02-21 14:04:04', '2017-02-21 14:04:04'),
(210, 100, 133, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:05', '2017-02-21 14:04:05', '2017-02-21 14:04:05'),
(211, 101, 133, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:05', '2017-02-21 14:04:05', '2017-02-21 14:04:05'),
(212, 1, 133, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:05', '2017-02-21 14:04:05', '2017-02-21 14:04:05'),
(213, 2, 133, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:05', '2017-02-21 14:04:05', '2017-02-21 14:04:05'),
(214, 3, 133, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:05', '2017-02-21 14:04:05', '2017-02-21 14:04:05'),
(215, 100, 132, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:05', '2017-02-21 14:04:05', '2017-02-21 14:04:05'),
(216, 101, 132, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:05', '2017-02-21 14:04:05', '2017-02-21 14:04:05'),
(217, 1, 132, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:05', '2017-02-21 14:04:05', '2017-02-21 14:04:05'),
(218, 2, 132, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:05', '2017-02-21 14:04:05', '2017-02-21 14:04:05'),
(219, 3, 132, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:05', '2017-02-21 14:04:05', '2017-02-21 14:04:05'),
(220, 100, 131, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:06', '2017-02-21 14:04:06', '2017-02-21 14:04:06'),
(221, 101, 131, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:06', '2017-02-21 14:04:06', '2017-02-21 14:04:06'),
(222, 1, 131, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:06', '2017-02-21 14:04:06', '2017-02-21 14:04:06'),
(223, 2, 131, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:06', '2017-02-21 14:04:06', '2017-02-21 14:04:06'),
(224, 3, 131, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:06', '2017-02-21 14:04:06', '2017-02-21 14:04:06'),
(225, 100, 103, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:13', '2017-02-21 14:04:13', '2017-02-21 14:04:13'),
(226, 101, 103, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:13', '2017-02-21 14:04:13', '2017-02-21 14:04:13'),
(227, 1, 103, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:13', '2017-02-21 14:04:13', '2017-02-21 14:04:13'),
(228, 2, 103, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:13', '2017-02-21 14:04:13', '2017-02-21 14:04:13'),
(229, 3, 103, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:13', '2017-02-21 14:04:13', '2017-02-21 14:04:13'),
(230, 100, 102, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:13', '2017-02-21 14:04:13', '2017-02-21 14:04:13'),
(231, 101, 102, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:13', '2017-02-21 14:04:13', '2017-02-21 14:04:13'),
(232, 1, 102, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:13', '2017-02-21 14:04:13', '2017-02-21 14:04:13'),
(233, 2, 102, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:13', '2017-02-21 14:04:13', '2017-02-21 14:04:13'),
(234, 3, 102, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:13', '2017-02-21 14:04:13', '2017-02-21 14:04:13'),
(235, 100, 101, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:14', '2017-02-21 14:04:14', '2017-02-21 14:04:14'),
(236, 101, 101, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:14', '2017-02-21 14:04:14', '2017-02-21 14:04:14'),
(237, 1, 101, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:14', '2017-02-21 14:04:14', '2017-02-21 14:04:14'),
(238, 2, 101, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:14', '2017-02-21 14:04:14', '2017-02-21 14:04:14'),
(239, 3, 101, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:14', '2017-02-21 14:04:14', '2017-02-21 14:04:14'),
(240, 100, 100, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:15', '2017-02-21 14:04:15', '2017-02-21 14:04:15'),
(241, 101, 100, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:15', '2017-02-21 14:04:15', '2017-02-21 14:04:15'),
(242, 1, 100, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:15', '2017-02-21 14:04:15', '2017-02-21 14:04:15'),
(243, 2, 100, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:15', '2017-02-21 14:04:15', '2017-02-21 14:04:15'),
(244, 3, 100, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:15', '2017-02-21 14:04:15', '2017-02-21 14:04:15'),
(245, 100, 99, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:15', '2017-02-21 14:04:15', '2017-02-21 14:04:15'),
(246, 101, 99, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:15', '2017-02-21 14:04:15', '2017-02-21 14:04:15'),
(247, 1, 99, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:15', '2017-02-21 14:04:15', '2017-02-21 14:04:15'),
(248, 2, 99, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:15', '2017-02-21 14:04:15', '2017-02-21 14:04:15'),
(249, 3, 99, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:15', '2017-02-21 14:04:15', '2017-02-21 14:04:15'),
(250, 100, 98, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:16', '2017-02-21 14:04:16', '2017-02-21 14:04:16'),
(251, 101, 98, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:16', '2017-02-21 14:04:16', '2017-02-21 14:04:16'),
(252, 1, 98, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:16', '2017-02-21 14:04:16', '2017-02-21 14:04:16'),
(253, 2, 98, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:16', '2017-02-21 14:04:16', '2017-02-21 14:04:16'),
(254, 3, 98, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:16', '2017-02-21 14:04:16', '2017-02-21 14:04:16'),
(255, 100, 91, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:16', '2017-02-21 14:04:16', '2017-02-21 14:04:16'),
(256, 101, 91, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:16', '2017-02-21 14:04:16', '2017-02-21 14:04:16'),
(257, 1, 91, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:16', '2017-02-21 14:04:16', '2017-02-21 14:04:16'),
(258, 2, 91, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:16', '2017-02-21 14:04:16', '2017-02-21 14:04:16'),
(259, 3, 91, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:16', '2017-02-21 14:04:16', '2017-02-21 14:04:16'),
(260, 100, 90, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:17', '2017-02-21 14:04:17', '2017-02-21 14:04:17'),
(261, 101, 90, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:17', '2017-02-21 14:04:17', '2017-02-21 14:04:17'),
(262, 1, 90, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:17', '2017-02-21 14:04:17', '2017-02-21 14:04:17'),
(263, 2, 90, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:17', '2017-02-21 14:04:17', '2017-02-21 14:04:17'),
(264, 3, 90, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:17', '2017-02-21 14:04:17', '2017-02-21 14:04:17'),
(265, 100, 85, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:17', '2017-02-21 14:04:17', '2017-02-21 14:04:17'),
(266, 101, 85, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:17', '2017-02-21 14:04:17', '2017-02-21 14:04:17'),
(267, 1, 85, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:17', '2017-02-21 14:04:17', '2017-02-21 14:04:17'),
(268, 2, 85, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:17', '2017-02-21 14:04:17', '2017-02-21 14:04:17'),
(269, 3, 85, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:17', '2017-02-21 14:04:17', '2017-02-21 14:04:17'),
(270, 100, 84, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:18', '2017-02-21 14:04:18', '2017-02-21 14:04:18'),
(271, 101, 84, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:18', '2017-02-21 14:04:18', '2017-02-21 14:04:18'),
(272, 1, 84, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:18', '2017-02-21 14:04:18', '2017-02-21 14:04:18'),
(273, 2, 84, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:18', '2017-02-21 14:04:18', '2017-02-21 14:04:18'),
(274, 3, 84, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:18', '2017-02-21 14:04:18', '2017-02-21 14:04:18'),
(275, 100, 82, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:19', '2017-02-21 14:04:19', '2017-02-21 14:04:19'),
(276, 101, 82, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:19', '2017-02-21 14:04:19', '2017-02-21 14:04:19'),
(277, 1, 82, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:19', '2017-02-21 14:04:19', '2017-02-21 14:04:19'),
(278, 2, 82, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:19', '2017-02-21 14:04:19', '2017-02-21 14:04:19'),
(279, 3, 82, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:19', '2017-02-21 14:04:19', '2017-02-21 14:04:19'),
(280, 100, 81, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:19', '2017-02-21 14:04:19', '2017-02-21 14:04:19'),
(281, 101, 81, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:19', '2017-02-21 14:04:19', '2017-02-21 14:04:19'),
(282, 1, 81, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:19', '2017-02-21 14:04:19', '2017-02-21 14:04:19'),
(283, 2, 81, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:19', '2017-02-21 14:04:19', '2017-02-21 14:04:19'),
(284, 3, 81, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:19', '2017-02-21 14:04:19', '2017-02-21 14:04:19'),
(285, 100, 80, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:20', '2017-02-21 14:04:20', '2017-02-21 14:04:20'),
(286, 101, 80, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:20', '2017-02-21 14:04:20', '2017-02-21 14:04:20'),
(287, 1, 80, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:20', '2017-02-21 14:04:20', '2017-02-21 14:04:20'),
(288, 2, 80, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:20', '2017-02-21 14:04:20', '2017-02-21 14:04:20'),
(289, 3, 80, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:20', '2017-02-21 14:04:20', '2017-02-21 14:04:20'),
(290, 100, 79, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:21', '2017-02-21 14:04:21', '2017-02-21 14:04:21'),
(291, 101, 79, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:21', '2017-02-21 14:04:21', '2017-02-21 14:04:21'),
(292, 1, 79, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:21', '2017-02-21 14:04:21', '2017-02-21 14:04:21'),
(293, 2, 79, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:21', '2017-02-21 14:04:21', '2017-02-21 14:04:21'),
(294, 3, 79, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:04:21', '2017-02-21 14:04:21', '2017-02-21 14:04:21'),
(295, 100, 78, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:06', '2017-02-21 14:06:06', '2017-02-21 14:06:06'),
(296, 101, 78, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:06', '2017-02-21 14:06:06', '2017-02-21 14:06:06'),
(297, 1, 78, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:06', '2017-02-21 14:06:06', '2017-02-21 14:06:06'),
(298, 2, 78, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:06', '2017-02-21 14:06:06', '2017-02-21 14:06:06'),
(299, 3, 78, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:06', '2017-02-21 14:06:06', '2017-02-21 14:06:06'),
(300, 100, 71, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:07', '2017-02-21 14:06:07', '2017-02-21 14:06:07'),
(301, 101, 71, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:07', '2017-02-21 14:06:07', '2017-02-21 14:06:07'),
(302, 1, 71, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:07', '2017-02-21 14:06:07', '2017-02-21 14:06:07'),
(303, 2, 71, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:07', '2017-02-21 14:06:07', '2017-02-21 14:06:07'),
(304, 3, 71, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:07', '2017-02-21 14:06:07', '2017-02-21 14:06:07'),
(305, 100, 70, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:07', '2017-02-21 14:06:07', '2017-02-21 14:06:07'),
(306, 101, 70, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:07', '2017-02-21 14:06:07', '2017-02-21 14:06:07'),
(307, 1, 70, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:07', '2017-02-21 14:06:07', '2017-02-21 14:06:07'),
(308, 2, 70, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:07', '2017-02-21 14:06:07', '2017-02-21 14:06:07'),
(309, 3, 70, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:07', '2017-02-21 14:06:07', '2017-02-21 14:06:07'),
(310, 100, 62, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:08', '2017-02-21 14:06:08', '2017-02-21 14:06:08'),
(311, 101, 62, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:08', '2017-02-21 14:06:08', '2017-02-21 14:06:08'),
(312, 1, 62, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:08', '2017-02-21 14:06:08', '2017-02-21 14:06:08'),
(313, 2, 62, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:08', '2017-02-21 14:06:08', '2017-02-21 14:06:08'),
(314, 3, 62, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:08', '2017-02-21 14:06:08', '2017-02-21 14:06:08'),
(315, 100, 61, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:08', '2017-02-21 14:06:08', '2017-02-21 14:06:08'),
(316, 101, 61, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:08', '2017-02-21 14:06:08', '2017-02-21 14:06:08'),
(317, 1, 61, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:08', '2017-02-21 14:06:08', '2017-02-21 14:06:08'),
(318, 2, 61, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:08', '2017-02-21 14:06:08', '2017-02-21 14:06:08'),
(319, 3, 61, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:08', '2017-02-21 14:06:08', '2017-02-21 14:06:08'),
(320, 100, 60, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:09', '2017-02-21 14:06:09', '2017-02-21 14:06:09'),
(321, 101, 60, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:09', '2017-02-21 14:06:09', '2017-02-21 14:06:09'),
(322, 1, 60, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:09', '2017-02-21 14:06:09', '2017-02-21 14:06:09'),
(323, 2, 60, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:09', '2017-02-21 14:06:09', '2017-02-21 14:06:09'),
(324, 3, 60, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:09', '2017-02-21 14:06:09', '2017-02-21 14:06:09'),
(325, 100, 55, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:09', '2017-02-21 14:06:09', '2017-02-21 14:06:09'),
(326, 101, 55, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:09', '2017-02-21 14:06:09', '2017-02-21 14:06:09'),
(327, 1, 55, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:09', '2017-02-21 14:06:09', '2017-02-21 14:06:09'),
(328, 2, 55, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:09', '2017-02-21 14:06:09', '2017-02-21 14:06:09'),
(329, 3, 55, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:09', '2017-02-21 14:06:09', '2017-02-21 14:06:09'),
(330, 100, 54, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:10', '2017-02-21 14:06:10', '2017-02-21 14:06:10'),
(331, 101, 54, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:10', '2017-02-21 14:06:10', '2017-02-21 14:06:10'),
(332, 1, 54, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:10', '2017-02-21 14:06:10', '2017-02-21 14:06:10'),
(333, 2, 54, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:10', '2017-02-21 14:06:10', '2017-02-21 14:06:10'),
(334, 3, 54, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:10', '2017-02-21 14:06:10', '2017-02-21 14:06:10'),
(335, 100, 53, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:10', '2017-02-21 14:06:10', '2017-02-21 14:06:10'),
(336, 101, 53, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:10', '2017-02-21 14:06:10', '2017-02-21 14:06:10'),
(337, 1, 53, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:10', '2017-02-21 14:06:10', '2017-02-21 14:06:10'),
(338, 2, 53, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:10', '2017-02-21 14:06:10', '2017-02-21 14:06:10'),
(339, 3, 53, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:10', '2017-02-21 14:06:10', '2017-02-21 14:06:10'),
(340, 100, 52, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:11', '2017-02-21 14:06:11', '2017-02-21 14:06:11'),
(341, 101, 52, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:11', '2017-02-21 14:06:11', '2017-02-21 14:06:11'),
(342, 1, 52, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:11', '2017-02-21 14:06:11', '2017-02-21 14:06:11'),
(343, 2, 52, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:11', '2017-02-21 14:06:11', '2017-02-21 14:06:11'),
(344, 3, 52, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:11', '2017-02-21 14:06:11', '2017-02-21 14:06:11'),
(345, 100, 51, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:11', '2017-02-21 14:06:11', '2017-02-21 14:06:11'),
(346, 101, 51, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:11', '2017-02-21 14:06:11', '2017-02-21 14:06:11'),
(347, 1, 51, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:11', '2017-02-21 14:06:11', '2017-02-21 14:06:11'),
(348, 2, 51, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:11', '2017-02-21 14:06:11', '2017-02-21 14:06:11'),
(349, 3, 51, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:11', '2017-02-21 14:06:11', '2017-02-21 14:06:11'),
(350, 100, 43, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:12', '2017-02-21 14:06:12', '2017-02-21 14:06:12'),
(351, 101, 43, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:12', '2017-02-21 14:06:12', '2017-02-21 14:06:12'),
(352, 1, 43, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:12', '2017-02-21 14:06:12', '2017-02-21 14:06:12'),
(353, 2, 43, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:12', '2017-02-21 14:06:12', '2017-02-21 14:06:12'),
(354, 3, 43, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:12', '2017-02-21 14:06:12', '2017-02-21 14:06:12'),
(355, 100, 42, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:13', '2017-02-21 14:06:13', '2017-02-21 14:06:13'),
(356, 101, 42, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:13', '2017-02-21 14:06:13', '2017-02-21 14:06:13'),
(357, 1, 42, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:13', '2017-02-21 14:06:13', '2017-02-21 14:06:13'),
(358, 2, 42, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:13', '2017-02-21 14:06:13', '2017-02-21 14:06:13'),
(359, 3, 42, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:13', '2017-02-21 14:06:13', '2017-02-21 14:06:13'),
(360, 100, 41, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:13', '2017-02-21 14:06:13', '2017-02-21 14:06:13'),
(361, 101, 41, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:13', '2017-02-21 14:06:13', '2017-02-21 14:06:13'),
(362, 1, 41, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:13', '2017-02-21 14:06:13', '2017-02-21 14:06:13'),
(363, 2, 41, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:13', '2017-02-21 14:06:13', '2017-02-21 14:06:13'),
(364, 3, 41, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:13', '2017-02-21 14:06:13', '2017-02-21 14:06:13'),
(365, 100, 40, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:14', '2017-02-21 14:06:14', '2017-02-21 14:06:14'),
(366, 101, 40, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:14', '2017-02-21 14:06:14', '2017-02-21 14:06:14'),
(367, 1, 40, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:14', '2017-02-21 14:06:14', '2017-02-21 14:06:14'),
(368, 2, 40, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:14', '2017-02-21 14:06:14', '2017-02-21 14:06:14'),
(369, 3, 40, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:14', '2017-02-21 14:06:14', '2017-02-21 14:06:14'),
(370, 100, 37, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:15', '2017-02-21 14:06:15', '2017-02-21 14:06:15'),
(371, 101, 37, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:15', '2017-02-21 14:06:15', '2017-02-21 14:06:15'),
(372, 1, 37, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:15', '2017-02-21 14:06:15', '2017-02-21 14:06:15'),
(373, 2, 37, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:15', '2017-02-21 14:06:15', '2017-02-21 14:06:15'),
(374, 3, 37, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:15', '2017-02-21 14:06:15', '2017-02-21 14:06:15'),
(375, 100, 35, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:15', '2017-02-21 14:06:15', '2017-02-21 14:06:15'),
(376, 101, 35, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:15', '2017-02-21 14:06:15', '2017-02-21 14:06:15'),
(377, 1, 35, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:15', '2017-02-21 14:06:15', '2017-02-21 14:06:15'),
(378, 2, 35, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:15', '2017-02-21 14:06:15', '2017-02-21 14:06:15'),
(379, 3, 35, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:15', '2017-02-21 14:06:15', '2017-02-21 14:06:15'),
(380, 100, 34, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:16', '2017-02-21 14:06:16', '2017-02-21 14:06:16'),
(381, 101, 34, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:16', '2017-02-21 14:06:16', '2017-02-21 14:06:16'),
(382, 1, 34, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:16', '2017-02-21 14:06:16', '2017-02-21 14:06:16'),
(383, 2, 34, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:16', '2017-02-21 14:06:16', '2017-02-21 14:06:16'),
(384, 3, 34, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:16', '2017-02-21 14:06:16', '2017-02-21 14:06:16'),
(385, 100, 33, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:16', '2017-02-21 14:06:16', '2017-02-21 14:06:16'),
(386, 101, 33, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:16', '2017-02-21 14:06:16', '2017-02-21 14:06:16'),
(387, 1, 33, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:16', '2017-02-21 14:06:16', '2017-02-21 14:06:16'),
(388, 2, 33, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:17', '2017-02-21 14:06:17', '2017-02-21 14:06:17'),
(389, 3, 33, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:17', '2017-02-21 14:06:17', '2017-02-21 14:06:17'),
(390, 100, 32, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:17', '2017-02-21 14:06:17', '2017-02-21 14:06:17'),
(391, 101, 32, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:17', '2017-02-21 14:06:17', '2017-02-21 14:06:17'),
(392, 1, 32, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:17', '2017-02-21 14:06:17', '2017-02-21 14:06:17'),
(393, 2, 32, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:17', '2017-02-21 14:06:17', '2017-02-21 14:06:17'),
(394, 3, 32, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:17', '2017-02-21 14:06:17', '2017-02-21 14:06:17'),
(395, 100, 31, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:18', '2017-02-21 14:06:18', '2017-02-21 14:06:18'),
(396, 101, 31, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:18', '2017-02-21 14:06:18', '2017-02-21 14:06:18'),
(397, 1, 31, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:18', '2017-02-21 14:06:18', '2017-02-21 14:06:18'),
(398, 2, 31, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:18', '2017-02-21 14:06:18', '2017-02-21 14:06:18'),
(399, 3, 31, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:18', '2017-02-21 14:06:18', '2017-02-21 14:06:18'),
(400, 100, 30, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:18', '2017-02-21 14:06:18', '2017-02-21 14:06:18'),
(401, 101, 30, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:18', '2017-02-21 14:06:18', '2017-02-21 14:06:18'),
(402, 1, 30, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:18', '2017-02-21 14:06:18', '2017-02-21 14:06:18'),
(403, 2, 30, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:18', '2017-02-21 14:06:18', '2017-02-21 14:06:18'),
(404, 3, 30, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:18', '2017-02-21 14:06:18', '2017-02-21 14:06:18'),
(405, 100, 23, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:19', '2017-02-21 14:06:19', '2017-02-21 14:06:19'),
(406, 101, 23, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:19', '2017-02-21 14:06:19', '2017-02-21 14:06:19'),
(407, 1, 23, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:19', '2017-02-21 14:06:19', '2017-02-21 14:06:19'),
(408, 2, 23, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:19', '2017-02-21 14:06:19', '2017-02-21 14:06:19'),
(409, 3, 23, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:19', '2017-02-21 14:06:19', '2017-02-21 14:06:19'),
(410, 100, 22, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:20', '2017-02-21 14:06:20', '2017-02-21 14:06:20'),
(411, 101, 22, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:20', '2017-02-21 14:06:20', '2017-02-21 14:06:20'),
(412, 1, 22, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:20', '2017-02-21 14:06:20', '2017-02-21 14:06:20'),
(413, 2, 22, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:20', '2017-02-21 14:06:20', '2017-02-21 14:06:20'),
(414, 3, 22, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:20', '2017-02-21 14:06:20', '2017-02-21 14:06:20'),
(415, 100, 21, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:20', '2017-02-21 14:06:20', '2017-02-21 14:06:20'),
(416, 101, 21, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:20', '2017-02-21 14:06:20', '2017-02-21 14:06:20'),
(417, 1, 21, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:20', '2017-02-21 14:06:20', '2017-02-21 14:06:20'),
(418, 2, 21, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:20', '2017-02-21 14:06:20', '2017-02-21 14:06:20'),
(419, 3, 21, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:20', '2017-02-21 14:06:20', '2017-02-21 14:06:20'),
(420, 100, 20, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:21', '2017-02-21 14:06:21', '2017-02-21 14:06:21'),
(421, 101, 20, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:21', '2017-02-21 14:06:21', '2017-02-21 14:06:21'),
(422, 1, 20, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:21', '2017-02-21 14:06:21', '2017-02-21 14:06:21'),
(423, 2, 20, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:21', '2017-02-21 14:06:21', '2017-02-21 14:06:21'),
(424, 3, 20, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:21', '2017-02-21 14:06:21', '2017-02-21 14:06:21'),
(425, 100, 14, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:22', '2017-02-21 14:06:22', '2017-02-21 14:06:22'),
(426, 101, 14, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:22', '2017-02-21 14:06:22', '2017-02-21 14:06:22'),
(427, 1, 14, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:22', '2017-02-21 14:06:22', '2017-02-21 14:06:22'),
(428, 2, 14, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:22', '2017-02-21 14:06:22', '2017-02-21 14:06:22'),
(429, 3, 14, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:22', '2017-02-21 14:06:22', '2017-02-21 14:06:22'),
(430, 100, 13, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:22', '2017-02-21 14:06:22', '2017-02-21 14:06:22'),
(431, 101, 13, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:22', '2017-02-21 14:06:22', '2017-02-21 14:06:22'),
(432, 1, 13, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:22', '2017-02-21 14:06:22', '2017-02-21 14:06:22'),
(433, 2, 13, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:22', '2017-02-21 14:06:22', '2017-02-21 14:06:22'),
(434, 3, 13, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:22', '2017-02-21 14:06:22', '2017-02-21 14:06:22'),
(435, 100, 12, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:23', '2017-02-21 14:06:23', '2017-02-21 14:06:23'),
(436, 101, 12, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:23', '2017-02-21 14:06:23', '2017-02-21 14:06:23'),
(437, 1, 12, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:23', '2017-02-21 14:06:23', '2017-02-21 14:06:23'),
(438, 2, 12, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:23', '2017-02-21 14:06:23', '2017-02-21 14:06:23'),
(439, 3, 12, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:23', '2017-02-21 14:06:23', '2017-02-21 14:06:23'),
(440, 100, 11, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:24', '2017-02-21 14:06:24', '2017-02-21 14:06:24'),
(441, 101, 11, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:24', '2017-02-21 14:06:24', '2017-02-21 14:06:24'),
(442, 1, 11, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:24', '2017-02-21 14:06:24', '2017-02-21 14:06:24'),
(443, 2, 11, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:24', '2017-02-21 14:06:24', '2017-02-21 14:06:24'),
(444, 3, 11, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:24', '2017-02-21 14:06:24', '2017-02-21 14:06:24'),
(445, 100, 10, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:24', '2017-02-21 14:06:24', '2017-02-21 14:06:24'),
(446, 101, 10, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:24', '2017-02-21 14:06:24', '2017-02-21 14:06:24'),
(447, 1, 10, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:24', '2017-02-21 14:06:24', '2017-02-21 14:06:24'),
(448, 2, 10, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:24', '2017-02-21 14:06:24', '2017-02-21 14:06:24'),
(449, 3, 10, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:24', '2017-02-21 14:06:24', '2017-02-21 14:06:24'),
(450, 100, 3, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:26', '2017-02-21 14:06:26', '2017-02-21 14:06:26'),
(451, 101, 3, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:26', '2017-02-21 14:06:26', '2017-02-21 14:06:26'),
(452, 1, 3, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:26', '2017-02-21 14:06:26', '2017-02-21 14:06:26'),
(453, 2, 3, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:26', '2017-02-21 14:06:26', '2017-02-21 14:06:26'),
(454, 3, 3, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:26', '2017-02-21 14:06:26', '2017-02-21 14:06:26'),
(455, 100, 2, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:26', '2017-02-21 14:06:26', '2017-02-21 14:06:26'),
(456, 101, 2, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:26', '2017-02-21 14:06:26', '2017-02-21 14:06:26'),
(457, 1, 2, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:26', '2017-02-21 14:06:26', '2017-02-21 14:06:26'),
(458, 2, 2, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:26', '2017-02-21 14:06:26', '2017-02-21 14:06:26');
INSERT INTO `stocks` (`id`, `location_id`, `product_id`, `quantity`, `value`, `entry_note_item_id`, `internal_transfer_item_id`, `order_id`, `manual_adjustment_id`, `finished`, `created`, `modified`) VALUES
(459, 3, 2, 0.000, 0.000, NULL, NULL, NULL, NULL, '2017-02-21 14:06:26', '2017-02-21 14:06:26', '2017-02-21 14:06:26');

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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `group_id`, `status`, `name`, `email`, `password`, `created`, `modified`) VALUES
(1, 1, 'Ativo', 'Gustavo César de Melo', 'delfino.cesar@gmail.com', 'd9f626c44c10101c2ab684d64ca2dd27608e232f', '2016-02-09 14:36:03', '2016-05-21 15:33:12');

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
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=553;
--
-- AUTO_INCREMENT for table `aros`
--
ALTER TABLE `aros`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `aros_acos`
--
ALTER TABLE `aros_acos`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=167;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=460;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
