-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12-Jun-2016 às 06:22
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
) ENGINE=InnoDB AUTO_INCREMENT=532 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 398),
(2, 1, NULL, NULL, 'Bills', 2, 13),
(3, 2, NULL, NULL, 'index', 3, 4),
(4, 2, NULL, NULL, 'view', 5, 6),
(5, 2, NULL, NULL, 'add', 7, 8),
(6, 2, NULL, NULL, 'edit', 9, 10),
(7, 2, NULL, NULL, 'delete', 11, 12),
(8, 1, NULL, NULL, 'Categories', 14, 25),
(9, 8, NULL, NULL, 'index', 15, 16),
(10, 8, NULL, NULL, 'view', 17, 18),
(11, 8, NULL, NULL, 'add', 19, 20),
(12, 8, NULL, NULL, 'edit', 21, 22),
(13, 8, NULL, NULL, 'delete', 23, 24),
(14, 1, NULL, NULL, 'EntryNoteItems', 26, 37),
(15, 14, NULL, NULL, 'index', 27, 28),
(16, 14, NULL, NULL, 'view', 29, 30),
(17, 14, NULL, NULL, 'add', 31, 32),
(18, 14, NULL, NULL, 'edit', 33, 34),
(19, 14, NULL, NULL, 'delete', 35, 36),
(20, 1, NULL, NULL, 'EntryNotes', 38, 49),
(21, 20, NULL, NULL, 'index', 39, 40),
(22, 20, NULL, NULL, 'view', 41, 42),
(23, 20, NULL, NULL, 'add', 43, 44),
(24, 20, NULL, NULL, 'edit', 45, 46),
(25, 20, NULL, NULL, 'delete', 47, 48),
(26, 1, NULL, NULL, 'Groups', 50, 61),
(27, 26, NULL, NULL, 'index', 51, 52),
(28, 26, NULL, NULL, 'view', 53, 54),
(29, 26, NULL, NULL, 'add', 55, 56),
(30, 26, NULL, NULL, 'edit', 57, 58),
(31, 26, NULL, NULL, 'delete', 59, 60),
(32, 1, NULL, NULL, 'Items', 62, 73),
(33, 32, NULL, NULL, 'index', 63, 64),
(34, 32, NULL, NULL, 'view', 65, 66),
(35, 32, NULL, NULL, 'add', 67, 68),
(36, 32, NULL, NULL, 'edit', 69, 70),
(37, 32, NULL, NULL, 'delete', 71, 72),
(38, 1, NULL, NULL, 'LocationTypes', 74, 85),
(39, 38, NULL, NULL, 'index', 75, 76),
(40, 38, NULL, NULL, 'view', 77, 78),
(41, 38, NULL, NULL, 'add', 79, 80),
(42, 38, NULL, NULL, 'edit', 81, 82),
(43, 38, NULL, NULL, 'delete', 83, 84),
(44, 1, NULL, NULL, 'Locations', 86, 97),
(45, 44, NULL, NULL, 'index', 87, 88),
(46, 44, NULL, NULL, 'view', 89, 90),
(47, 44, NULL, NULL, 'add', 91, 92),
(48, 44, NULL, NULL, 'edit', 93, 94),
(49, 44, NULL, NULL, 'delete', 95, 96),
(50, 1, NULL, NULL, 'Orders', 98, 119),
(51, 50, NULL, NULL, 'index', 99, 100),
(52, 50, NULL, NULL, 'view', 101, 102),
(54, 50, NULL, NULL, 'edit', 103, 104),
(56, 1, NULL, NULL, 'Pages', 120, 123),
(58, 1, NULL, NULL, 'ProductItems', 124, 137),
(59, 58, NULL, NULL, 'index', 125, 126),
(60, 58, NULL, NULL, 'view', 127, 128),
(61, 58, NULL, NULL, 'add', 129, 130),
(62, 58, NULL, NULL, 'edit', 131, 132),
(63, 58, NULL, NULL, 'delete', 133, 134),
(64, 1, NULL, NULL, 'Products', 138, 151),
(65, 64, NULL, NULL, 'index', 139, 140),
(66, 64, NULL, NULL, 'view', 141, 142),
(67, 64, NULL, NULL, 'add', 143, 144),
(68, 64, NULL, NULL, 'edit', 145, 146),
(69, 64, NULL, NULL, 'delete', 147, 148),
(70, 1, NULL, NULL, 'Stages', 152, 163),
(71, 70, NULL, NULL, 'index', 153, 154),
(72, 70, NULL, NULL, 'view', 155, 156),
(73, 70, NULL, NULL, 'add', 157, 158),
(74, 70, NULL, NULL, 'edit', 159, 160),
(75, 70, NULL, NULL, 'delete', 161, 162),
(76, 1, NULL, NULL, 'StatusBills', 164, 175),
(77, 76, NULL, NULL, 'index', 165, 166),
(78, 76, NULL, NULL, 'view', 167, 168),
(79, 76, NULL, NULL, 'add', 169, 170),
(80, 76, NULL, NULL, 'edit', 171, 172),
(81, 76, NULL, NULL, 'delete', 173, 174),
(82, 1, NULL, NULL, 'StatusEntryNotes', 176, 187),
(83, 82, NULL, NULL, 'index', 177, 178),
(84, 82, NULL, NULL, 'view', 179, 180),
(85, 82, NULL, NULL, 'add', 181, 182),
(86, 82, NULL, NULL, 'edit', 183, 184),
(87, 82, NULL, NULL, 'delete', 185, 186),
(88, 1, NULL, NULL, 'StatusOrders', 188, 199),
(89, 88, NULL, NULL, 'index', 189, 190),
(90, 88, NULL, NULL, 'view', 191, 192),
(91, 88, NULL, NULL, 'add', 193, 194),
(92, 88, NULL, NULL, 'edit', 195, 196),
(93, 88, NULL, NULL, 'delete', 197, 198),
(94, 1, NULL, NULL, 'Stocks', 200, 229),
(95, 94, NULL, NULL, 'index', 201, 202),
(96, 94, NULL, NULL, 'view', 203, 204),
(99, 94, NULL, NULL, 'delete', 205, 206),
(100, 1, NULL, NULL, 'Subcategories', 230, 241),
(101, 100, NULL, NULL, 'index', 231, 232),
(102, 100, NULL, NULL, 'view', 233, 234),
(103, 100, NULL, NULL, 'add', 235, 236),
(104, 100, NULL, NULL, 'edit', 237, 238),
(105, 100, NULL, NULL, 'delete', 239, 240),
(106, 1, NULL, NULL, 'Suppliers', 242, 253),
(107, 106, NULL, NULL, 'index', 243, 244),
(108, 106, NULL, NULL, 'view', 245, 246),
(109, 106, NULL, NULL, 'add', 247, 248),
(110, 106, NULL, NULL, 'edit', 249, 250),
(111, 106, NULL, NULL, 'delete', 251, 252),
(112, 1, NULL, NULL, 'Tables', 254, 275),
(113, 112, NULL, NULL, 'index', 255, 256),
(114, 112, NULL, NULL, 'view', 257, 258),
(115, 112, NULL, NULL, 'add', 259, 260),
(116, 112, NULL, NULL, 'edit', 261, 262),
(117, 112, NULL, NULL, 'delete', 263, 264),
(118, 1, NULL, NULL, 'Units', 276, 287),
(119, 118, NULL, NULL, 'index', 277, 278),
(120, 118, NULL, NULL, 'view', 279, 280),
(121, 118, NULL, NULL, 'add', 281, 282),
(122, 118, NULL, NULL, 'edit', 283, 284),
(123, 118, NULL, NULL, 'delete', 285, 286),
(124, 1, NULL, NULL, 'Users', 288, 305),
(125, 124, NULL, NULL, 'login', 289, 290),
(126, 124, NULL, NULL, 'logout', 291, 292),
(127, 124, NULL, NULL, 'initDB', 293, 294),
(128, 124, NULL, NULL, 'index', 295, 296),
(129, 124, NULL, NULL, 'view', 297, 298),
(130, 124, NULL, NULL, 'add', 299, 300),
(131, 124, NULL, NULL, 'edit', 301, 302),
(132, 124, NULL, NULL, 'delete', 303, 304),
(133, 1, NULL, NULL, 'AclExtras', 306, 307),
(134, 1, NULL, NULL, 'DebugKit', 308, 315),
(135, 134, NULL, NULL, 'ToolbarAccess', 309, 314),
(136, 135, NULL, NULL, 'history_state', 310, 311),
(137, 135, NULL, NULL, 'sql_explain', 312, 313),
(310, 1, NULL, NULL, 'Configurations', 316, 319),
(311, 310, NULL, NULL, 'index', 317, 318),
(319, 1, NULL, NULL, 'InternalTransfers', 320, 331),
(320, 319, NULL, NULL, 'index', 321, 322),
(321, 319, NULL, NULL, 'view', 323, 324),
(322, 319, NULL, NULL, 'add', 325, 326),
(323, 319, NULL, NULL, 'edit', 327, 328),
(324, 319, NULL, NULL, 'delete', 329, 330),
(332, 1, NULL, NULL, 'StatusInternalTransfers', 332, 343),
(333, 332, NULL, NULL, 'index', 333, 334),
(334, 332, NULL, NULL, 'view', 335, 336),
(335, 332, NULL, NULL, 'add', 337, 338),
(336, 332, NULL, NULL, 'edit', 339, 340),
(337, 332, NULL, NULL, 'delete', 341, 342),
(345, 1, NULL, NULL, 'InternalTransferItems', 344, 355),
(346, 345, NULL, NULL, 'index', 345, 346),
(347, 345, NULL, NULL, 'view', 347, 348),
(348, 345, NULL, NULL, 'add', 349, 350),
(349, 345, NULL, NULL, 'edit', 351, 352),
(350, 345, NULL, NULL, 'delete', 353, 354),
(394, 1, NULL, NULL, 'Cashiers', 356, 367),
(395, 394, NULL, NULL, 'index', 357, 358),
(396, 394, NULL, NULL, 'view', 359, 360),
(397, 394, NULL, NULL, 'add', 361, 362),
(398, 394, NULL, NULL, 'edit', 363, 364),
(399, 394, NULL, NULL, 'delete', 365, 366),
(407, 94, NULL, NULL, 'stock_control', 207, 208),
(408, 94, NULL, NULL, 'getListLocation', 209, 210),
(409, 94, NULL, NULL, 'get_list_stock_by_location', 211, 212),
(425, 64, NULL, NULL, 'getUnit', 149, 150),
(482, 94, NULL, NULL, 'modal_edit', 213, 214),
(483, 1, NULL, NULL, 'ManualAdjustments', 368, 379),
(484, 483, NULL, NULL, 'index', 369, 370),
(485, 483, NULL, NULL, 'view', 371, 372),
(486, 483, NULL, NULL, 'add', 373, 374),
(487, 483, NULL, NULL, 'edit', 375, 376),
(488, 483, NULL, NULL, 'delete', 377, 378),
(497, 94, NULL, NULL, 'stock_details', 215, 216),
(498, 94, NULL, NULL, 'listStock', 217, 218),
(499, 94, NULL, NULL, 'listStockSuppliers', 219, 220),
(500, 94, NULL, NULL, 'listStockClients', 221, 222),
(501, 94, NULL, NULL, 'listStockLosses', 223, 224),
(502, 50, NULL, NULL, 'orders_board', 105, 106),
(503, 50, NULL, NULL, 'add_order', 107, 108),
(504, 112, NULL, NULL, 'tables_board', 265, 266),
(505, 50, NULL, NULL, 'kitchen_orders', 109, 110),
(506, 50, NULL, NULL, 'getOrdersByStage', 111, 112),
(507, 50, NULL, NULL, 'update_sequence', 113, 114),
(508, 56, NULL, NULL, 'home', 121, 122),
(509, 112, NULL, NULL, 'table_details', 267, 268),
(510, 1, NULL, NULL, 'Charts', 380, 383),
(511, 510, NULL, NULL, 'index', 381, 382),
(513, 94, NULL, NULL, 'drawLineChartGlobalInventory', 225, 226),
(514, 94, NULL, NULL, 'getStockQuantityByProduct', 227, 228),
(515, 50, NULL, NULL, 'order_wizard', 115, 116),
(518, 58, NULL, NULL, 'getProductItems', 135, 136),
(519, 50, NULL, NULL, 'cancel', 117, 118),
(520, 112, NULL, NULL, 'close_table', 269, 270),
(522, 112, NULL, NULL, 'getBills', 271, 272),
(524, 1, NULL, NULL, 'Payments', 384, 397),
(525, 524, NULL, NULL, 'index', 385, 386),
(526, 524, NULL, NULL, 'view', 387, 388),
(527, 524, NULL, NULL, 'add', 389, 390),
(528, 524, NULL, NULL, 'edit', 391, 392),
(529, 524, NULL, NULL, 'delete', 393, 394),
(530, 524, NULL, NULL, 'list_orders', 395, 396),
(531, 112, NULL, NULL, 'change_table', 273, 274);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

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
(1, 1, 2, 'I', '2016-06-12 01:15:14', '2016-06-12 01:15:14');

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
(2, 'Bar', '2015-11-10 02:33:38', '2015-11-10 02:33:38');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `quantity`, `stage_id`, `table_id`, `bill_id`, `status_order_id`, `payment_id`, `observation`, `kitchen_order`, `created`, `modified`) VALUES
(41, 1, 1, 1.00, 2, 2, 1, 1, NULL, '', 0, '2016-06-12 01:15:14', '2016-06-12 01:15:14'),
(42, 1, 9, 1.00, 4, 2, 1, 1, NULL, '', 0, '2016-06-12 01:15:14', '2016-06-12 01:15:14');

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `status` enum('Ativo','Inativo') NOT NULL DEFAULT 'Ativo',
  `cost_price` double(50,3) unsigned DEFAULT '0.000',
  `sell_price` double(50,3) unsigned DEFAULT '0.000',
  `avaliable_to_order` enum('Sim','Não') NOT NULL DEFAULT 'Não',
  `stockable` enum('Sim','Não') NOT NULL DEFAULT 'Sim',
  `minimum_stock` double(50,3) unsigned NOT NULL DEFAULT '0.000',
  `description` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `subcategory_id`, `unit_id`, `name`, `status`, `cost_price`, `sell_price`, `avaliable_to_order`, `stockable`, `minimum_stock`, `description`, `created`, `modified`) VALUES
(1, 5, 1, 'X-Tudo', 'Ativo', 7.850, 12.000, 'Sim', 'Não', 0.000, 'X-Tudo, com hamburguer tal e molho especial da casa.', '2016-04-01 12:56:50', '2016-05-16 13:42:21'),
(2, 13, 1, 'Tomate', 'Ativo', 0.200, 0.300, 'Não', 'Sim', 10.000, '', '2016-04-01 12:58:49', '2016-04-01 12:58:49'),
(4, 15, 1, 'Pão de Hamburguer', 'Ativo', 0.300, 0.650, 'Não', 'Sim', 15.000, '', '2016-04-01 13:45:12', '2016-04-01 13:45:12'),
(5, 2, 1, 'Alface', 'Ativo', NULL, NULL, 'Não', 'Sim', 30.000, '', '2016-04-01 13:47:01', '2016-04-01 13:47:01'),
(6, 14, 1, 'Hambúrguer Bovino', 'Ativo', 1.200, 1.850, 'Não', 'Sim', 15.000, 'Hambúrguer de Boi', '2016-04-01 13:50:51', '2016-05-16 13:41:26'),
(7, 14, 2, 'Carne Moída', 'Ativo', 12.750, 15.800, 'Não', 'Sim', 5.000, '', '2016-04-01 13:54:59', '2016-05-16 13:41:11'),
(8, 16, 1, 'Pack Hamburguer', 'Ativo', NULL, NULL, 'Não', 'Sim', 10.000, '', '2016-05-09 08:23:19', '2016-05-09 08:23:19'),
(9, 9, 1, 'Coca Lata', 'Ativo', 2.250, 3.500, 'Sim', 'Sim', 10.000, '', '2016-05-16 13:46:47', '2016-05-16 13:46:47');

-- --------------------------------------------------------

--
-- Estrutura da tabela `product_items`
--

CREATE TABLE IF NOT EXISTS `product_items` (
`id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` double(50,3) unsigned NOT NULL DEFAULT '0.000'
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `product_items`
--

INSERT INTO `product_items` (`id`, `product_id`, `item_id`, `quantity`) VALUES
(13, 6, 7, 0.200),
(15, 8, 6, 1.000),
(16, 8, 4, 1.000),
(17, 1, 8, 1.000),
(18, 8, 2, 0.200);

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
(448, 2, 7, 0.200, NULL, NULL, NULL, 41, NULL, '2016-06-12 01:15:14', '2016-06-12 01:15:14', '2016-06-12 01:15:14'),
(449, 2, 6, 1.000, NULL, NULL, NULL, 41, NULL, '2016-06-12 01:15:14', '2016-06-12 01:15:14', '2016-06-12 01:15:14'),
(450, 2, 4, 1.000, NULL, NULL, NULL, 41, NULL, '2016-06-12 01:15:14', '2016-06-12 01:15:14', '2016-06-12 01:15:14'),
(451, 2, 2, 0.200, NULL, NULL, NULL, 41, NULL, '2016-06-12 01:15:14', '2016-06-12 01:15:14', '2016-06-12 01:15:14'),
(452, 2, 8, 1.000, NULL, NULL, NULL, 41, NULL, '2016-06-12 01:15:14', '2016-06-12 01:15:14', '2016-06-12 01:15:14'),
(453, 100, 7, -0.200, NULL, NULL, NULL, 41, NULL, '2016-06-12 01:15:14', '2016-06-12 01:15:14', '2016-06-12 01:15:14'),
(454, 100, 6, -1.000, NULL, NULL, NULL, 41, NULL, '2016-06-12 01:15:14', '2016-06-12 01:15:14', '2016-06-12 01:15:14'),
(455, 100, 4, -1.000, NULL, NULL, NULL, 41, NULL, '2016-06-12 01:15:14', '2016-06-12 01:15:14', '2016-06-12 01:15:14'),
(456, 100, 2, -0.200, NULL, NULL, NULL, 41, NULL, '2016-06-12 01:15:14', '2016-06-12 01:15:14', '2016-06-12 01:15:14'),
(457, 100, 8, -1.000, NULL, NULL, NULL, 41, NULL, '2016-06-12 01:15:14', '2016-06-12 01:15:14', '2016-06-12 01:15:14'),
(458, 2, 9, 1.000, NULL, NULL, NULL, 42, NULL, '2016-06-12 01:15:14', '2016-06-12 01:15:14', '2016-06-12 01:15:14'),
(459, 100, 9, -1.000, NULL, NULL, NULL, 42, NULL, '2016-06-12 01:15:14', '2016-06-12 01:15:14', '2016-06-12 01:15:14');

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `name`, `stage_id`, `created`, `modified`) VALUES
(1, 1, 'Aperitivos', 2, '2015-11-10 02:33:49', '2016-01-24 19:26:03'),
(2, 1, 'Saladas', 2, '2015-11-10 02:34:00', '2016-01-10 17:06:45'),
(3, 1, 'Massas', 2, '2015-11-10 02:34:14', '2016-01-10 17:06:52'),
(4, 1, 'Pratos Especiais', 2, '2015-11-10 02:35:51', '2016-01-10 17:06:59'),
(5, 1, 'Sanduíches', 2, '2015-11-10 02:36:31', '2016-01-10 17:07:16'),
(7, 2, 'Cervejas', 4, '2015-11-10 02:36:54', '2016-01-24 17:14:16'),
(8, 2, 'Vinhos', 4, '2015-11-10 02:37:01', '2016-01-24 17:14:10'),
(9, 2, 'Refrigerantes', 4, '2015-11-10 02:37:11', '2016-01-24 17:14:05'),
(10, 2, 'Sucos', 4, '2015-11-10 02:37:15', '2016-01-24 17:13:53'),
(11, 2, 'Águas', 4, '2015-11-10 02:37:37', '2016-01-24 17:13:48'),
(12, 2, 'Drinks', 4, '2015-11-10 02:38:31', '2016-01-24 17:13:41'),
(13, 1, 'Verduras', NULL, '2016-03-07 18:59:50', '2016-03-07 19:02:39'),
(14, 1, 'Carnes', NULL, '2016-03-13 20:28:59', '2016-03-31 13:53:11'),
(15, 1, 'Pães', NULL, '2016-04-01 13:42:16', '2016-04-01 13:42:16'),
(16, 1, 'Packs', NULL, '2016-05-09 08:22:35', '2016-05-09 08:22:35');

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
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=532;
--
-- AUTO_INCREMENT for table `aros`
--
ALTER TABLE `aros`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `aros_acos`
--
ALTER TABLE `aros_acos`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `entry_note_items`
--
ALTER TABLE `entry_note_items`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `product_items`
--
ALTER TABLE `product_items`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
