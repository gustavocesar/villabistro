-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tempo de Geração: 18/03/2018 às 06:52
-- Versão do servidor: 5.6.39-cll-lve
-- Versão do PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `teste`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `acos`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=247 ;

--
-- Fazendo dump de dados para tabela `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 492),
(2, 1, NULL, NULL, 'Addresses', 2, 15),
(3, 2, NULL, NULL, 'index', 3, 4),
(4, 2, NULL, NULL, 'view', 5, 6),
(5, 2, NULL, NULL, 'add', 7, 8),
(6, 2, NULL, NULL, 'edit', 9, 10),
(7, 2, NULL, NULL, 'delete', 11, 12),
(8, 2, NULL, NULL, 'location_by_zip_code', 13, 14),
(9, 1, NULL, NULL, 'AuditDeltas', 16, 27),
(10, 9, NULL, NULL, 'index', 17, 18),
(11, 9, NULL, NULL, 'view', 19, 20),
(12, 9, NULL, NULL, 'add', 21, 22),
(13, 9, NULL, NULL, 'edit', 23, 24),
(14, 9, NULL, NULL, 'delete', 25, 26),
(15, 1, NULL, NULL, 'Audits', 28, 33),
(16, 15, NULL, NULL, 'index', 29, 30),
(17, 15, NULL, NULL, 'view', 31, 32),
(18, 1, NULL, NULL, 'Bills', 34, 49),
(19, 18, NULL, NULL, 'index', 35, 36),
(20, 18, NULL, NULL, 'history', 37, 38),
(21, 18, NULL, NULL, 'view', 39, 40),
(22, 18, NULL, NULL, 'add', 41, 42),
(23, 18, NULL, NULL, 'edit', 43, 44),
(24, 18, NULL, NULL, 'delete', 45, 46),
(25, 18, NULL, NULL, 'print_bill', 47, 48),
(26, 1, NULL, NULL, 'Categories', 50, 61),
(27, 26, NULL, NULL, 'index', 51, 52),
(28, 26, NULL, NULL, 'view', 53, 54),
(29, 26, NULL, NULL, 'add', 55, 56),
(30, 26, NULL, NULL, 'edit', 57, 58),
(31, 26, NULL, NULL, 'delete', 59, 60),
(32, 1, NULL, NULL, 'Charts', 62, 67),
(33, 32, NULL, NULL, 'index', 63, 64),
(34, 32, NULL, NULL, 'weekly_stock', 65, 66),
(35, 1, NULL, NULL, 'Configurations', 68, 71),
(36, 35, NULL, NULL, 'index', 69, 70),
(37, 1, NULL, NULL, 'EntryNoteItems', 72, 83),
(38, 37, NULL, NULL, 'index', 73, 74),
(39, 37, NULL, NULL, 'view', 75, 76),
(40, 37, NULL, NULL, 'add', 77, 78),
(41, 37, NULL, NULL, 'edit', 79, 80),
(42, 37, NULL, NULL, 'delete', 81, 82),
(43, 1, NULL, NULL, 'EntryNotes', 84, 95),
(44, 43, NULL, NULL, 'index', 85, 86),
(45, 43, NULL, NULL, 'view', 87, 88),
(46, 43, NULL, NULL, 'add', 89, 90),
(47, 43, NULL, NULL, 'edit', 91, 92),
(48, 43, NULL, NULL, 'delete', 93, 94),
(49, 1, NULL, NULL, 'Groups', 96, 107),
(50, 49, NULL, NULL, 'index', 97, 98),
(51, 49, NULL, NULL, 'view', 99, 100),
(52, 49, NULL, NULL, 'add', 101, 102),
(53, 49, NULL, NULL, 'edit', 103, 104),
(54, 49, NULL, NULL, 'delete', 105, 106),
(55, 1, NULL, NULL, 'InternalTransferItems', 108, 119),
(56, 55, NULL, NULL, 'index', 109, 110),
(57, 55, NULL, NULL, 'view', 111, 112),
(58, 55, NULL, NULL, 'add', 113, 114),
(59, 55, NULL, NULL, 'edit', 115, 116),
(60, 55, NULL, NULL, 'delete', 117, 118),
(61, 1, NULL, NULL, 'InternalTransfers', 120, 131),
(62, 61, NULL, NULL, 'index', 121, 122),
(63, 61, NULL, NULL, 'view', 123, 124),
(64, 61, NULL, NULL, 'add', 125, 126),
(65, 61, NULL, NULL, 'edit', 127, 128),
(66, 61, NULL, NULL, 'delete', 129, 130),
(67, 1, NULL, NULL, 'Items', 132, 143),
(68, 67, NULL, NULL, 'index', 133, 134),
(69, 67, NULL, NULL, 'view', 135, 136),
(70, 67, NULL, NULL, 'add', 137, 138),
(71, 67, NULL, NULL, 'edit', 139, 140),
(72, 67, NULL, NULL, 'delete', 141, 142),
(73, 1, NULL, NULL, 'LocationTypes', 144, 155),
(74, 73, NULL, NULL, 'index', 145, 146),
(75, 73, NULL, NULL, 'view', 147, 148),
(76, 73, NULL, NULL, 'add', 149, 150),
(77, 73, NULL, NULL, 'edit', 151, 152),
(78, 73, NULL, NULL, 'delete', 153, 154),
(79, 1, NULL, NULL, 'Locations', 156, 167),
(80, 79, NULL, NULL, 'index', 157, 158),
(81, 79, NULL, NULL, 'view', 159, 160),
(82, 79, NULL, NULL, 'add', 161, 162),
(83, 79, NULL, NULL, 'edit', 163, 164),
(84, 79, NULL, NULL, 'delete', 165, 166),
(85, 1, NULL, NULL, 'ManualAdjustments', 168, 179),
(86, 85, NULL, NULL, 'index', 169, 170),
(87, 85, NULL, NULL, 'view', 171, 172),
(88, 85, NULL, NULL, 'add', 173, 174),
(89, 85, NULL, NULL, 'edit', 175, 176),
(90, 85, NULL, NULL, 'delete', 177, 178),
(91, 1, NULL, NULL, 'Orders', 180, 201),
(92, 91, NULL, NULL, 'index', 181, 182),
(93, 91, NULL, NULL, 'view', 183, 184),
(94, 91, NULL, NULL, 'edit', 185, 186),
(95, 91, NULL, NULL, 'cancel', 187, 188),
(96, 91, NULL, NULL, 'orders_board', 189, 190),
(97, 91, NULL, NULL, 'add_order', 191, 192),
(98, 91, NULL, NULL, 'kitchen_orders', 193, 194),
(99, 91, NULL, NULL, 'getOrdersByStage', 195, 196),
(100, 91, NULL, NULL, 'update_sequence', 197, 198),
(101, 91, NULL, NULL, 'order_wizard', 199, 200),
(102, 1, NULL, NULL, 'Pages', 202, 207),
(103, 102, NULL, NULL, 'home', 203, 204),
(104, 102, NULL, NULL, 'documentation', 205, 206),
(105, 1, NULL, NULL, 'PaymentMethods', 208, 219),
(106, 105, NULL, NULL, 'index', 209, 210),
(107, 105, NULL, NULL, 'view', 211, 212),
(108, 105, NULL, NULL, 'add', 213, 214),
(109, 105, NULL, NULL, 'edit', 215, 216),
(110, 105, NULL, NULL, 'delete', 217, 218),
(111, 1, NULL, NULL, 'Payments', 220, 233),
(112, 111, NULL, NULL, 'index', 221, 222),
(113, 111, NULL, NULL, 'view', 223, 224),
(114, 111, NULL, NULL, 'add', 225, 226),
(115, 111, NULL, NULL, 'edit', 227, 228),
(116, 111, NULL, NULL, 'delete', 229, 230),
(117, 111, NULL, NULL, 'list_orders', 231, 232),
(118, 1, NULL, NULL, 'ProductItems', 234, 247),
(119, 118, NULL, NULL, 'index', 235, 236),
(120, 118, NULL, NULL, 'view', 237, 238),
(121, 118, NULL, NULL, 'add', 239, 240),
(122, 118, NULL, NULL, 'edit', 241, 242),
(123, 118, NULL, NULL, 'delete', 243, 244),
(124, 118, NULL, NULL, 'getProductItems', 245, 246),
(125, 1, NULL, NULL, 'Products', 248, 261),
(126, 125, NULL, NULL, 'index', 249, 250),
(127, 125, NULL, NULL, 'view', 251, 252),
(128, 125, NULL, NULL, 'add', 253, 254),
(129, 125, NULL, NULL, 'edit', 255, 256),
(130, 125, NULL, NULL, 'delete', 257, 258),
(131, 125, NULL, NULL, 'getUnit', 259, 260),
(132, 1, NULL, NULL, 'Reports', 262, 269),
(133, 132, NULL, NULL, 'index', 263, 264),
(134, 132, NULL, NULL, 'received_payments', 265, 266),
(135, 132, NULL, NULL, 'quantity_sold', 267, 268),
(136, 1, NULL, NULL, 'Routines', 270, 275),
(137, 136, NULL, NULL, 'index', 271, 272),
(138, 136, NULL, NULL, 'inactivate_all_products', 273, 274),
(139, 1, NULL, NULL, 'Stages', 276, 287),
(140, 139, NULL, NULL, 'index', 277, 278),
(141, 139, NULL, NULL, 'view', 279, 280),
(142, 139, NULL, NULL, 'add', 281, 282),
(143, 139, NULL, NULL, 'edit', 283, 284),
(144, 139, NULL, NULL, 'delete', 285, 286),
(145, 1, NULL, NULL, 'States', 288, 299),
(146, 145, NULL, NULL, 'index', 289, 290),
(147, 145, NULL, NULL, 'view', 291, 292),
(148, 145, NULL, NULL, 'add', 293, 294),
(149, 145, NULL, NULL, 'edit', 295, 296),
(150, 145, NULL, NULL, 'delete', 297, 298),
(151, 1, NULL, NULL, 'StatusAddresses', 300, 311),
(152, 151, NULL, NULL, 'index', 301, 302),
(153, 151, NULL, NULL, 'view', 303, 304),
(154, 151, NULL, NULL, 'add', 305, 306),
(155, 151, NULL, NULL, 'edit', 307, 308),
(156, 151, NULL, NULL, 'delete', 309, 310),
(157, 1, NULL, NULL, 'StatusBills', 312, 323),
(158, 157, NULL, NULL, 'index', 313, 314),
(159, 157, NULL, NULL, 'view', 315, 316),
(160, 157, NULL, NULL, 'add', 317, 318),
(161, 157, NULL, NULL, 'edit', 319, 320),
(162, 157, NULL, NULL, 'delete', 321, 322),
(163, 1, NULL, NULL, 'StatusEntryNotes', 324, 335),
(164, 163, NULL, NULL, 'index', 325, 326),
(165, 163, NULL, NULL, 'view', 327, 328),
(166, 163, NULL, NULL, 'add', 329, 330),
(167, 163, NULL, NULL, 'edit', 331, 332),
(168, 163, NULL, NULL, 'delete', 333, 334),
(169, 1, NULL, NULL, 'StatusInternalTransfers', 336, 347),
(170, 169, NULL, NULL, 'index', 337, 338),
(171, 169, NULL, NULL, 'view', 339, 340),
(172, 169, NULL, NULL, 'add', 341, 342),
(173, 169, NULL, NULL, 'edit', 343, 344),
(174, 169, NULL, NULL, 'delete', 345, 346),
(175, 1, NULL, NULL, 'StatusOrders', 348, 359),
(176, 175, NULL, NULL, 'index', 349, 350),
(177, 175, NULL, NULL, 'view', 351, 352),
(178, 175, NULL, NULL, 'add', 353, 354),
(179, 175, NULL, NULL, 'edit', 355, 356),
(180, 175, NULL, NULL, 'delete', 357, 358),
(181, 1, NULL, NULL, 'StatusPaymentMethods', 360, 371),
(182, 181, NULL, NULL, 'index', 361, 362),
(183, 181, NULL, NULL, 'view', 363, 364),
(184, 181, NULL, NULL, 'add', 365, 366),
(185, 181, NULL, NULL, 'edit', 367, 368),
(186, 181, NULL, NULL, 'delete', 369, 370),
(187, 1, NULL, NULL, 'Stocks', 372, 401),
(188, 187, NULL, NULL, 'index', 373, 374),
(189, 187, NULL, NULL, 'view', 375, 376),
(190, 187, NULL, NULL, 'modal_edit', 377, 378),
(191, 187, NULL, NULL, 'delete', 379, 380),
(192, 187, NULL, NULL, 'stock_control', 381, 382),
(193, 187, NULL, NULL, 'stock_details', 383, 384),
(194, 187, NULL, NULL, 'getListLocation', 385, 386),
(195, 187, NULL, NULL, 'get_list_stock_by_location', 387, 388),
(196, 187, NULL, NULL, 'listStock', 389, 390),
(197, 187, NULL, NULL, 'listStockSuppliers', 391, 392),
(198, 187, NULL, NULL, 'listStockClients', 393, 394),
(199, 187, NULL, NULL, 'listStockLosses', 395, 396),
(200, 187, NULL, NULL, 'getStockQuantityByProduct', 397, 398),
(201, 187, NULL, NULL, 'drawLineChartGlobalInventory', 399, 400),
(202, 1, NULL, NULL, 'Subcategories', 402, 413),
(203, 202, NULL, NULL, 'index', 403, 404),
(204, 202, NULL, NULL, 'view', 405, 406),
(205, 202, NULL, NULL, 'add', 407, 408),
(206, 202, NULL, NULL, 'edit', 409, 410),
(207, 202, NULL, NULL, 'delete', 411, 412),
(208, 1, NULL, NULL, 'Suppliers', 414, 425),
(209, 208, NULL, NULL, 'index', 415, 416),
(210, 208, NULL, NULL, 'view', 417, 418),
(211, 208, NULL, NULL, 'add', 419, 420),
(212, 208, NULL, NULL, 'edit', 421, 422),
(213, 208, NULL, NULL, 'delete', 423, 424),
(214, 1, NULL, NULL, 'Tables', 426, 447),
(215, 214, NULL, NULL, 'index', 427, 428),
(216, 214, NULL, NULL, 'view', 429, 430),
(217, 214, NULL, NULL, 'add', 431, 432),
(218, 214, NULL, NULL, 'edit', 433, 434),
(219, 214, NULL, NULL, 'delete', 435, 436),
(220, 214, NULL, NULL, 'tables_board', 437, 438),
(221, 214, NULL, NULL, 'table_details', 439, 440),
(222, 214, NULL, NULL, 'close_table', 441, 442),
(223, 214, NULL, NULL, 'change_table', 443, 444),
(224, 214, NULL, NULL, 'getBills', 445, 446),
(225, 1, NULL, NULL, 'Units', 448, 459),
(226, 225, NULL, NULL, 'index', 449, 450),
(227, 225, NULL, NULL, 'view', 451, 452),
(228, 225, NULL, NULL, 'add', 453, 454),
(229, 225, NULL, NULL, 'edit', 455, 456),
(230, 225, NULL, NULL, 'delete', 457, 458),
(231, 1, NULL, NULL, 'Users', 460, 477),
(232, 231, NULL, NULL, 'login', 461, 462),
(233, 231, NULL, NULL, 'logout', 463, 464),
(234, 231, NULL, NULL, 'initDB', 465, 466),
(235, 231, NULL, NULL, 'index', 467, 468),
(236, 231, NULL, NULL, 'view', 469, 470),
(237, 231, NULL, NULL, 'add', 471, 472),
(238, 231, NULL, NULL, 'edit', 473, 474),
(239, 231, NULL, NULL, 'delete', 475, 476),
(240, 1, NULL, NULL, 'AclExtras', 478, 479),
(241, 1, NULL, NULL, 'AuditLog', 480, 481),
(242, 1, NULL, NULL, 'DebugKit', 482, 489),
(243, 242, NULL, NULL, 'ToolbarAccess', 483, 488),
(244, 243, NULL, NULL, 'history_state', 484, 485),
(245, 243, NULL, NULL, 'sql_explain', 486, 487),
(246, 1, NULL, NULL, 'Recaptcha', 490, 491);

-- --------------------------------------------------------

--
-- Estrutura para tabela `addresses`
--

CREATE TABLE IF NOT EXISTS `addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `status_address_id` int(11) NOT NULL DEFAULT '1',
  `name` varchar(45) NOT NULL,
  `zip_code` varchar(45) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city` varchar(45) NOT NULL,
  `public_place` varchar(45) NOT NULL,
  `number` varchar(45) NOT NULL DEFAULT 'S/N',
  `neighborhood` varchar(45) NOT NULL,
  `is_primary` enum('Sim','Não') NOT NULL DEFAULT 'Sim',
  `reference` varchar(255) DEFAULT NULL,
  `observation` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Fazendo dump de dados para tabela `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `status_address_id`, `name`, `zip_code`, `state_id`, `city`, `public_place`, `number`, `neighborhood`, `is_primary`, `reference`, `observation`, `created`, `modified`) VALUES
(2, 1, 1, 'Apartamento', '74110-130', 1, 'Goiânia', '02', '155', '', 'Sim', 'Entre a Rua 03 e a Rua 05', '', '2017-03-09 14:26:48', '2017-03-09 15:00:51'),
(3, 1, 2, 'Teste', '75180-000', 1, 'Silvânia', '123', '1235', '', 'Não', 'Perto do trem lá...', 'Teste.\r\nTeste é teste', '2017-03-09 15:00:27', '2017-03-09 17:56:43'),
(4, 1, 2, 'Aeeeeee', '75180-000', 1, 'Silvânia', 'Aeeeeee', '', 'Centro', 'Não', '', '', '2017-03-09 17:57:22', '2017-03-09 17:58:05');

-- --------------------------------------------------------

--
-- Estrutura para tabela `aros`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=5 ;

--
-- Fazendo dump de dados para tabela `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Group', 1, NULL, 1, 2),
(2, NULL, 'Group', 2, NULL, 3, 4),
(3, NULL, 'Group', 3, NULL, 5, 6),
(4, NULL, 'Group', 4, NULL, 7, 8);

-- --------------------------------------------------------

--
-- Estrutura para tabela `aros_acos`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=22 ;

--
-- Fazendo dump de dados para tabela `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 1, '1', '1', '1', '1'),
(2, 2, 1, '1', '1', '1', '1'),
(3, 2, 95, '-1', '-1', '-1', '-1'),
(4, 3, 1, '-1', '-1', '-1', '-1'),
(5, 3, 103, '1', '1', '1', '1'),
(6, 3, 36, '1', '1', '1', '1'),
(7, 3, 235, '1', '1', '1', '1'),
(8, 3, 236, '1', '1', '1', '1'),
(9, 3, 238, '1', '1', '1', '1'),
(10, 3, 232, '1', '1', '1', '1'),
(11, 3, 233, '1', '1', '1', '1'),
(12, 3, 18, '1', '1', '1', '1'),
(13, 3, 2, '1', '1', '1', '1'),
(14, 3, 220, '1', '1', '1', '1'),
(15, 3, 221, '1', '1', '1', '1'),
(16, 3, 222, '1', '1', '1', '1'),
(17, 3, 223, '-1', '-1', '-1', '-1'),
(18, 3, 114, '1', '1', '1', '1'),
(19, 3, 117, '1', '1', '1', '1'),
(20, 3, 97, '1', '1', '1', '1'),
(21, 3, 101, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `bills`
--

CREATE TABLE IF NOT EXISTS `bills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status_bill_id` int(11) NOT NULL,
  `table_id` int(11) DEFAULT NULL,
  `identifier` varchar(45) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4106 ;

--
-- Fazendo dump de dados para tabela `bills`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Fazendo dump de dados para tabela `categories`
--

INSERT INTO `categories` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Restaurante', '2015-11-10 02:31:18', '2016-04-11 14:07:11'),
(2, 'Bebidas', '2015-11-10 02:33:38', '2016-06-20 08:36:40'),
(3, 'Comida Japonesa', '2017-03-07 19:03:12', '2017-03-07 19:03:12');

-- --------------------------------------------------------

--
-- Estrutura para tabela `entry_notes`
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
-- Estrutura para tabela `entry_note_items`
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
-- Estrutura para tabela `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Fazendo dump de dados para tabela `groups`
--

INSERT INTO `groups` (`id`, `name`) VALUES
(1, 'Administrador'),
(3, 'Atendimento'),
(4, 'Cliente'),
(2, 'Cozinha');

-- --------------------------------------------------------

--
-- Estrutura para tabela `internal_transfers`
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
-- Estrutura para tabela `internal_transfer_items`
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
-- Estrutura para tabela `locations`
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
-- Fazendo dump de dados para tabela `locations`
--

INSERT INTO `locations` (`id`, `name`, `location_type_id`, `created`, `modified`) VALUES
(1, 'Fornecedores', 2, '2016-03-08 12:48:08', '2016-03-08 12:48:08'),
(2, 'Clientes', 2, '2016-03-08 12:48:35', '2016-03-08 12:48:35'),
(3, 'Perdas', 2, '2016-03-08 12:48:42', '2016-03-08 12:48:42'),
(100, 'Almoxarifado', 1, '2016-03-08 12:50:32', '2016-04-11 14:08:38'),
(101, 'Casa do Tonim', 1, '2016-03-08 13:06:18', '2016-03-08 13:06:18');

-- --------------------------------------------------------

--
-- Estrutura para tabela `location_types`
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
-- Fazendo dump de dados para tabela `location_types`
--

INSERT INTO `location_types` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Físico', '2016-02-05 13:39:43', '2016-02-05 13:39:43'),
(2, 'Virtual', '2016-02-05 13:39:50', '2016-02-05 13:39:50');

-- --------------------------------------------------------

--
-- Estrutura para tabela `manual_adjustments`
--

CREATE TABLE IF NOT EXISTS `manual_adjustments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `orders`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40125 ;

--
-- Fazendo dump de dados para tabela `orders`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table_id` int(11) DEFAULT NULL,
  `bill_id` int(11) DEFAULT NULL,
  `payment_method_id` int(11) NOT NULL DEFAULT '1',
  `subtotal` double(50,2) DEFAULT NULL,
  `payd_value` double(50,2) DEFAULT NULL,
  `payback` double(50,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=5635 ;


-- --------------------------------------------------------

--
-- Estrutura para tabela `payment_methods`
--

CREATE TABLE IF NOT EXISTS `payment_methods` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status_payment_method_id` int(11) NOT NULL,
  `sequence` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `status_payment_method_id`, `sequence`, `created`, `modified`) VALUES
(1, 'Dinheiro', 1, 1, '2017-01-25 13:35:36', '2017-01-25 13:36:20'),
(2, 'Cartão de Débito', 1, 2, '2017-01-25 13:36:34', '2017-01-25 13:36:34'),
(3, 'Cartão de Crédito', 1, 3, '2017-01-25 13:36:45', '2017-01-25 13:36:45'),
(4, 'Cheque', 1, 4, '2017-01-25 13:37:34', '2017-01-25 13:37:34');

-- --------------------------------------------------------

--
-- Estrutura para tabela `products`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=317 ;

--
-- Fazendo dump de dados para tabela `products`
--

INSERT INTO `products` (`id`, `subcategory_id`, `unit_id`, `name`, `status`, `cost_price`, `sell_price`, `avaliable_to_order`, `stockable`, `minimum_stock`, `description`, `created`, `modified`) VALUES
(2, 5, 1, 'Grand Gateou com Magnum', 'Ativo', 12.000, 24.000, 'Sim', 'Sim', 10.000, '', '2016-06-20 09:16:23', '2017-10-04 18:36:24'),
(10, 1, 1, 'Grelhado de Carré Suíno', 'Ativo', 6.500, 18.000, 'Sim', 'Sim', 20.000, 'Carré Suíno 300gr, Batata Temperada e Molho Picante', '2016-06-20 08:40:43', '2017-10-04 18:22:49'),
(11, 1, 1, 'Grelhado de Contrafilé', 'Ativo', 7.380, 18.000, 'Sim', 'Sim', 20.000, 'Chuleta 300gr, Batata Temperada e Molho Picante', '2016-06-20 08:41:32', '2017-03-02 08:50:08'),
(12, 1, 1, 'Grelhado de Filé de Frango', 'Ativo', 4.900, 16.000, 'Sim', 'Sim', 20.000, 'Frango 300gr, Batata Temperada e Molho Picante', '2016-06-20 08:43:12', '2017-03-02 08:50:07'),
(13, 1, 1, 'Salada', 'Ativo', 7.000, 15.000, 'Sim', 'Sim', 20.000, 'Alface Americana, Alface Roxa, Tomate Seco, Rúcula, Ricota, Palmito, Champignon, Azeitona Preta, Croutons, Cebola Roxa, Molho de Mostarda e Mel', '2016-06-20 08:46:24', '2017-03-02 08:50:06'),
(14, 1, 1, 'Queijo Coalho com Mel', 'Ativo', 4.000, 10.000, 'Sim', 'Sim', 20.000, '2 Queijos Coalho Grelhados com Mel', '2016-06-20 08:48:28', '2017-10-04 18:22:22'),
(20, 3, 1, 'Boi Gordo', 'Ativo', 7.500, 18.000, 'Sim', 'Sim', 20.000, 'Pão, Molho de Ervas, Hambúrguer Bovino 180gr, Queijo Cheddar, Picles, Cebola Roxa, Alface Americana, Bacon.\r\nAcompanha Molho Especial de Abacaxi', '2016-06-20 09:05:49', '2017-10-04 18:32:56'),
(21, 3, 1, 'Porcão', 'Ativo', 8.150, 16.000, 'Sim', 'Sim', 20.000, 'Pão, Molho Rosé, Hambúrguer Suíno 180gr, Queijo Prato, Picles, Cebola Roxa, Tomate Seco e Bacon.\r\nAcompanha Molho Especial de Abacaxi.', '2016-06-20 09:08:26', '2017-10-04 18:33:28'),
(22, 3, 1, 'Frangoso', 'Ativo', 5.500, 16.000, 'Sim', 'Sim', 20.000, 'Pão, Molho, Hambúrguer de Ave 180gr, Requeijão Cremoso, Picles, Tomate, Cebola Caramelizada, Alface Roxa e Bacon.\r\nAcompanha Molho Especial de Abacaxi.', '2016-06-20 09:09:54', '2017-10-04 18:33:08'),
(23, 3, 1, 'Veggie', 'Ativo', 4.900, 15.000, 'Sim', 'Sim', 20.000, 'Pão, Molho Rosé, Queijo Prato, Cebola Caramelizada, Tomate Seco, Alface Americana e Rúcula.\r\nAcompanha Molho Especial de Abacaxi.', '2016-06-20 09:11:11', '2017-10-25 19:54:06'),
(30, 2, 1, 'Isca de Filé de Frango', 'Ativo', 7.550, 20.000, 'Sim', 'Sim', 20.000, '400gr de Filé de Frango Empanado, Molho Picante e Molho da Casa', '2016-06-20 08:50:00', '2017-03-02 08:50:03'),
(31, 2, 1, 'Tábua de Frios', 'Ativo', 9.000, 27.000, 'Sim', 'Sim', 20.000, 'Salaminho, Muçarela, Azeitona Verde, Palmito, Queijo Prato e Azeite', '2016-06-20 08:51:01', '2017-10-25 19:54:36'),
(32, 2, 1, 'Almondega ', 'Ativo', 12.950, 25.000, 'Sim', 'Sim', 20.000, 'Almondega 500gr, Molho ao Sugo, Mandioca Cozida', '2016-06-20 08:52:06', '2017-10-04 18:29:04'),
(34, 2, 1, 'Costelinha Suína ', 'Ativo', 10.950, 24.000, 'Sim', 'Sim', 20.000, 'Costelinha Suína 500gr, Mandioca Cozida e Molho da Casa', '2016-06-20 08:53:56', '2017-10-04 18:24:06'),
(37, 2, 1, 'Batata com Cheddar e Bacon', 'Ativo', 10.200, 22.000, 'Sim', 'Sim', 20.000, 'Batata Palito 600gr, Cheddar, Bacon e Molho da Casa', '2016-06-20 09:02:43', '2017-03-02 08:50:01'),
(40, 4, 1, 'Arroz', 'Ativo', 0.850, 4.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:13:50', '2017-03-02 08:50:57'),
(41, 4, 1, 'Salada Simples', 'Ativo', 1.500, 4.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:14:14', '2017-03-02 08:50:50'),
(42, 4, 1, 'Mandioca Cozida', 'Ativo', 0.620, 4.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:14:40', '2017-03-02 08:50:00'),
(43, 4, 1, 'Batata Frita 150gr', 'Ativo', 1.050, 6.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:15:34', '2017-03-02 08:50:41'),
(51, 6, 3, 'Sol Mexicana - Long Neck', 'Ativo', 3.290, 6.000, 'Sim', 'Sim', 50.000, '', '2016-06-20 09:22:55', '2017-03-02 08:50:37'),
(52, 6, 3, 'Heinekein - Long Neck', 'Ativo', 3.330, 6.000, 'Sim', 'Sim', 50.000, '', '2016-06-20 09:23:56', '2017-03-02 08:49:59'),
(53, 6, 3, 'Budwaiser - Long Neck', 'Ativo', 3.000, 6.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:24:16', '2017-03-02 08:50:32'),
(54, 6, 3, 'Caracu ', 'Ativo', 3.500, 6.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:24:55', '2017-03-02 08:49:58'),
(55, 6, 5, 'Brahma Zero', 'Ativo', 3.500, 6.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:25:29', '2017-03-02 08:49:58'),
(60, 7, 1, 'Red Label', 'Ativo', 3.250, 8.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:28:25', '2017-03-02 08:49:58'),
(61, 7, 1, 'Jack Daniel''s', 'Ativo', 4.950, 15.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:31:00', '2017-03-02 08:49:57'),
(62, 7, 1, 'Old Parr', 'Ativo', 6.000, 14.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:31:58', '2017-10-04 18:42:38'),
(70, 7, 1, 'Absolut', 'Ativo', 4.900, 10.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:32:24', '2017-03-02 08:49:57'),
(71, 7, 1, 'Smirnoff', 'Ativo', 1.750, 8.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:32:42', '2017-12-09 01:17:04'),
(78, 7, 1, 'Tequila José Cuervo', 'Ativo', 5.000, 10.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:33:01', '2017-03-02 08:49:56'),
(79, 7, 1, 'Cachaça', 'Ativo', 0.500, 3.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:33:22', '2017-03-03 19:35:50'),
(80, 8, 5, 'Coca Cola', 'Ativo', 1.910, 3.500, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:34:43', '2017-03-03 19:34:54'),
(81, 8, 5, 'Coca Cola Zero', 'Ativo', 1.990, 3.500, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:35:33', '2017-03-02 08:48:37'),
(82, 8, 5, 'Guaraná Antarctica', 'Ativo', 1.990, 3.500, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:51:19', '2017-03-02 08:48:36'),
(84, 8, 5, 'Fanta Laranja', 'Ativo', 1.990, 3.500, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:51:53', '2017-03-03 19:35:24'),
(85, 8, 5, 'Soda Limonada', 'Ativo', 1.990, 3.500, 'Sim', 'Sim', 20.000, '', '2016-06-20 09:52:16', '2017-03-03 19:35:13'),
(90, 9, 5, 'Red Bull', 'Ativo', 6.200, 12.000, 'Sim', 'Sim', 15.000, '', '2016-06-20 09:53:15', '2017-03-02 08:48:35'),
(91, 9, 5, 'Extra Power', 'Ativo', 3.650, 8.000, 'Sim', 'Sim', 15.000, '', '2016-06-20 10:00:05', '2017-03-02 08:48:34'),
(98, 10, 3, 'Água Sem Gás 500ml', 'Ativo', 0.650, 2.000, 'Sim', 'Sim', 20.000, '', '2016-06-20 10:01:10', '2017-03-02 08:48:34'),
(99, 10, 3, 'Água Com Gás 500ml', 'Ativo', 0.850, 2.500, 'Sim', 'Sim', 20.000, '', '2016-06-20 10:01:33', '2017-03-02 08:48:33'),
(100, 11, 3, 'Concha y Toro', 'Ativo', 22.000, 38.000, 'Sim', 'Sim', 5.000, '', '2016-06-20 10:02:09', '2017-03-02 08:48:33'),
(101, 11, 3, 'Santa Helena', 'Ativo', 23.000, 37.000, 'Sim', 'Sim', 5.000, '', '2016-06-20 10:02:42', '2017-03-02 08:48:32'),
(102, 11, 3, 'Concha y Toro Sauvignon', 'Ativo', 22.000, 39.000, 'Sim', 'Sim', 5.000, '', '2016-06-20 10:03:26', '2017-03-02 08:48:31'),
(103, 11, 19, 'Quinta do Morgado', 'Ativo', 2.450, 8.000, 'Sim', 'Sim', 4.000, '', '2016-06-20 10:04:13', '2017-10-04 18:42:26'),
(120, 12, 1, 'Suco de Laranja', 'Ativo', 2.000, 5.000, 'Sim', 'Não', 0.000, '', '2016-06-20 10:05:08', '2017-10-04 18:39:16'),
(121, 12, 1, 'Suco de Acerola', 'Ativo', 2.000, 5.000, 'Sim', 'Não', 0.000, '', '2016-06-20 10:05:08', '2017-10-04 18:39:29'),
(122, 12, 1, 'Suco de Maracujá', 'Ativo', 2.000, 5.000, 'Sim', 'Não', 0.000, '', '2016-06-20 10:05:08', '2017-10-04 18:39:42'),
(123, 12, 1, 'Suco de Limão', 'Ativo', 2.000, 5.000, 'Sim', 'Não', 0.000, '', '2016-06-20 10:05:08', '2017-10-04 18:39:56'),
(125, 12, 1, 'Laranja com Acerola', 'Ativo', 3.000, 7.000, 'Sim', 'Não', 0.000, '', '2016-06-20 10:05:08', '2017-10-04 18:40:35'),
(126, 12, 1, 'Suco de Uva', 'Ativo', 2.000, 5.000, 'Sim', 'Não', 0.000, '', '2016-06-20 10:05:08', '2017-10-04 18:40:15'),
(127, 12, 1, 'Suco de Abacaxi', 'Ativo', 2.000, 5.000, 'Sim', 'Não', 0.000, '', '2016-06-20 10:05:08', '2017-10-04 18:40:48'),
(128, 12, 1, 'Abacaxi com Hortelã', 'Ativo', 2.000, 5.000, 'Sim', 'Não', 0.000, '', '2016-06-20 10:05:08', '2017-10-04 18:41:39'),
(129, 12, 1, 'Suco de Morango', 'Ativo', 2.000, 5.000, 'Sim', 'Não', 0.000, '', '2016-06-20 10:05:08', '2017-10-04 18:41:53'),
(130, 12, 1, 'suco de Laranja com Morango', 'Ativo', 3.000, 7.000, 'Sim', 'Não', 0.000, '', '2016-12-08 22:50:12', '2017-03-02 08:47:14'),
(131, 1, 18, 'Grelhado de Pirarucu', 'Ativo', 13.000, 25.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:16:15', '2017-10-04 18:23:23'),
(132, 1, 18, 'CAESAR SALAD', 'Ativo', 8.000, 15.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:16:58', '2017-10-04 18:20:48'),
(133, 2, 17, 'Isca de Tilápia', 'Ativo', 12.500, 35.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:18:37', '2017-10-04 18:29:47'),
(134, 2, 17, 'Carne na Chapa', 'Ativo', 24.800, 45.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:20:37', '2017-10-04 18:29:24'),
(135, 4, 17, 'Batata temperada', 'Ativo', 1.500, 4.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:21:29', '2017-03-02 08:47:12'),
(136, 4, 17, 'molho da casa', 'Ativo', 1.500, 3.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:22:02', '2017-03-02 08:47:11'),
(137, 4, 17, 'Molho Picante', 'Ativo', 1.500, 3.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:22:29', '2017-03-02 08:47:11'),
(138, 4, 17, 'Molho Mostarda e Mel', 'Ativo', 1.500, 3.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:22:59', '2017-03-02 08:47:10'),
(139, 4, 17, 'Molho de Ervas', 'Ativo', 1.500, 1.500, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:23:24', '2017-03-02 08:47:10'),
(140, 4, 17, 'Molho Barbecue', 'Ativo', 1.500, 3.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:23:55', '2017-03-02 08:47:09'),
(141, 4, 17, 'Geleia de Pimenta', 'Ativo', 1.500, 4.000, 'Sim', 'Sim', 20.000, '', '2017-01-20 13:24:27', '2017-03-02 08:47:09'),
(142, 4, 17, 'Adicional de Queijo', 'Ativo', 1.500, 4.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:25:04', '2017-09-09 23:08:40'),
(143, 4, 17, 'Adicional de Bacon', 'Ativo', 1.500, 3.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:25:30', '2017-03-02 08:47:07'),
(144, 4, 17, 'Adicional de Hamburguer', 'Ativo', 3.200, 7.000, 'Sim', 'Sim', 40.000, '', '2017-01-20 13:26:32', '2017-03-02 08:47:07'),
(145, 4, 13, 'Gelo', 'Ativo', 1.000, 2.500, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:26:55', '2017-03-02 08:47:06'),
(146, 10, 3, 'H2O Limoneto', 'Ativo', 3.100, 5.000, 'Sim', 'Sim', 20.000, '', '2017-01-20 13:27:37', '2017-03-02 08:47:06'),
(147, 10, 3, 'H2O Limão', 'Ativo', 3.200, 5.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:28:01', '2017-03-02 08:46:20'),
(148, 6, 3, 'Eisenbahn ', 'Ativo', 3.500, 8.000, 'Sim', 'Sim', 20.000, '', '2017-01-20 13:29:08', '2017-03-02 08:46:19'),
(149, 6, 3, 'Colorado Appia', 'Ativo', 16.900, 24.000, 'Sim', 'Sim', 20.000, '', '2017-01-20 13:29:56', '2017-03-02 08:46:18'),
(150, 6, 3, 'Weihenstephan Vitus', 'Ativo', 19.900, 28.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:31:23', '2017-03-02 08:46:18'),
(151, 6, 3, 'Duvel', 'Ativo', 17.200, 15.000, 'Sim', 'Sim', 20.000, '', '2017-01-20 13:32:01', '2017-08-25 19:04:51'),
(152, 6, 3, 'Paulaner ', 'Ativo', 19.900, 28.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:32:33', '2017-03-02 08:46:17'),
(153, 6, 3, 'Baden Baden Cristal', 'Ativo', 12.900, 21.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:33:11', '2017-03-02 08:46:16'),
(154, 11, 3, 'Lambrusco Cella', 'Ativo', 19.000, 35.000, 'Sim', 'Sim', 5.000, '', '2017-01-20 13:33:56', '2017-03-02 08:46:16'),
(155, 11, 3, 'Periquita Original', 'Ativo', 32.000, 65.000, 'Sim', 'Sim', 5.000, '', '2017-01-20 13:35:07', '2017-03-02 08:46:15'),
(156, 11, 3, 'Casa Valduga', 'Ativo', 38.000, 73.000, 'Sim', 'Sim', 5.000, '', '2017-01-20 13:35:41', '2017-03-02 08:46:15'),
(157, 11, 3, 'Porto Vaoldouro', 'Ativo', 47.000, 84.000, 'Sim', 'Sim', 5.000, '', '2017-01-20 13:36:19', '2017-03-02 08:46:14'),
(158, 7, 19, 'Absolut Vanilia', 'Ativo', 4.900, 12.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:40:28', '2017-03-02 08:46:14'),
(159, 7, 8, 'Black Label', 'Ativo', 4.900, 12.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:41:11', '2017-03-02 08:46:13'),
(160, 7, 8, 'Pinga de Mutamba', 'Ativo', 1.250, 5.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:42:06', '2017-03-02 08:46:13'),
(161, 7, 8, 'Bananinha', 'Ativo', 2.600, 6.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:42:56', '2017-03-02 08:46:12'),
(162, 7, 8, 'Licor 43', 'Ativo', 4.450, 10.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:43:31', '2017-03-02 08:46:12'),
(163, 8, 5, 'Schweppes', 'Ativo', 2.650, 4.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:44:31', '2017-03-02 08:46:11'),
(164, 5, 17, 'Pastelzinho de Nutela', 'Ativo', 3.000, 6.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:46:16', '2017-03-02 08:46:10'),
(165, 5, 17, 'Coquetel de Churros', 'Ativo', 5.000, 18.000, 'Sim', 'Sim', 10.000, '', '2017-01-20 13:46:55', '2017-03-02 08:46:10'),
(167, 2, 17, '1/2 Carne na Chapa', 'Ativo', 10.000, 29.250, 'Sim', 'Sim', 10.000, '', '2017-03-02 19:45:42', '2017-10-04 19:07:59'),
(168, 6, 3, 'smirnoff Ice', 'Ativo', 3.500, 6.000, 'Sim', 'Sim', 10.000, '', '2017-03-02 20:24:28', '2017-03-02 20:24:28'),
(169, 2, 17, '1/2 Batata Com Cheddar e Bacon', 'Ativo', 3.840, 14.300, 'Sim', 'Sim', 10.000, '', '2017-03-02 20:49:04', '2017-03-02 20:49:04'),
(170, 2, 17, '1/2 Almondega', 'Ativo', 6.320, 14.300, 'Sim', 'Sim', 10.000, '', '2017-03-02 20:50:00', '2017-03-02 20:50:00'),
(171, 13, 1, '5 Star', 'Ativo', 1.080, 2.000, 'Sim', 'Sim', 20.000, '', '2017-03-02 21:51:03', '2017-03-02 21:51:03'),
(172, 13, 1, 'Sonho de Valsa', 'Ativo', 0.530, 1.000, 'Sim', 'Sim', 20.000, '', '2017-03-02 21:51:43', '2017-03-02 21:51:43'),
(173, 4, 17, 'Preparo de Cozumel', 'Ativo', 1.000, 3.000, 'Sim', 'Sim', 10.000, '', '2017-03-03 21:07:32', '2017-03-03 21:07:32'),
(174, 13, 1, 'Halls', 'Ativo', 1.000, 2.000, 'Sim', 'Sim', 10.000, '', '2017-03-03 21:31:08', '2017-03-03 21:31:08'),
(175, 13, 1, 'kinder ovo', 'Ativo', 3.990, 10.000, 'Sim', 'Sim', 0.000, '', '2017-03-03 21:55:31', '2018-03-08 23:00:03'),
(176, 2, 17, '1/2 Isca de Frango', 'Ativo', 3.500, 13.000, 'Sim', 'Sim', 0.000, '', '2017-03-03 22:04:20', '2017-03-03 22:05:16'),
(177, 14, 18, 'Salada Sunomono', 'Ativo', 6.800, 8.000, 'Sim', 'Sim', 0.000, '', '2017-03-07 19:06:26', '2017-03-07 19:06:26'),
(178, 14, 18, 'sashimi salmão', 'Ativo', 22.100, 26.000, 'Sim', 'Não', 0.000, '', '2017-03-07 19:07:21', '2017-03-07 19:07:21'),
(179, 14, 18, 'Sashimi Kani', 'Ativo', 11.900, 14.000, 'Sim', 'Não', 0.000, '', '2017-03-07 19:07:52', '2017-03-07 19:07:52'),
(180, 14, 18, 'Sashimi Tilápia', 'Ativo', 22.100, 26.000, 'Sim', 'Não', 0.000, '', '2017-03-07 19:08:28', '2017-03-07 19:08:28'),
(181, 14, 18, 'Temaki Salmão', 'Ativo', 14.450, 17.000, 'Sim', 'Não', 0.000, '', '2017-03-07 19:09:01', '2017-03-07 19:09:01'),
(182, 14, 18, 'Temaki filadelfia', 'Ativo', 15.300, 18.000, 'Sim', 'Não', 0.000, '', '2017-03-07 19:13:07', '2017-03-07 19:13:07'),
(183, 14, 18, 'Temaki Skin Roll', 'Ativo', 14.450, 17.000, 'Sim', 'Não', 0.000, '', '2017-03-07 19:13:41', '2017-03-07 19:13:41'),
(184, 14, 18, 'Temaki Califórnia', 'Ativo', 12.750, 16.000, 'Sim', 'Não', 0.000, '', '2017-03-07 19:14:35', '2017-09-12 19:18:07'),
(185, 14, 18, 'Temaki Hot Filadélfia', 'Ativo', 17.000, 20.000, 'Sim', 'Não', 0.000, '', '2017-03-07 19:15:05', '2017-03-07 19:15:05'),
(186, 14, 18, 'Bolinho de Salmão', 'Ativo', 17.000, 24.000, 'Sim', 'Não', 0.000, '', '2017-03-07 19:15:30', '2017-09-12 19:25:28'),
(187, 14, 18, 'Bolinho de Tilápia', 'Ativo', 12.750, 18.000, 'Sim', 'Não', 0.000, '', '2017-03-07 19:15:57', '2017-09-12 19:26:05'),
(188, 14, 18, 'Gun kan Salmão', 'Ativo', 6.370, 7.500, 'Sim', 'Não', 0.000, '', '2017-03-07 19:27:50', '2017-09-12 19:18:49'),
(189, 14, 18, 'Gun kan de salada', 'Ativo', 6.800, 8.000, 'Sim', 'Não', 0.000, '', '2017-03-07 19:28:23', '2017-03-07 19:28:23'),
(190, 14, 18, 'Gun kan de salmão e cream cheese', 'Ativo', 6.800, 8.000, 'Sim', 'Não', 0.000, '', '2017-03-07 19:28:53', '2017-03-07 19:28:53'),
(191, 14, 18, 'gun kan morango', 'Ativo', 6.370, 8.000, 'Sim', 'Não', 0.000, '', '2017-03-07 19:29:16', '2017-09-12 19:19:12'),
(192, 14, 18, 'Gun kan maracujá', 'Ativo', 6.370, 8.000, 'Sim', 'Não', 0.000, '', '2017-03-07 19:29:37', '2017-09-12 19:20:02'),
(193, 14, 18, 'Gun Kan Especial', 'Ativo', 6.370, 8.000, 'Sim', 'Não', 0.000, '', '2017-03-07 19:30:05', '2017-09-12 19:20:30'),
(194, 14, 18, 'Califórnia 8 p', 'Ativo', 12.750, 15.000, 'Sim', 'Não', 0.000, '', '2017-03-07 19:34:34', '2017-03-07 19:34:34'),
(195, 14, 18, 'Kappa Maki (pepino)', 'Ativo', 8.500, 10.000, 'Sim', 'Não', 0.000, '', '2017-03-07 19:41:18', '2017-03-07 19:41:18'),
(196, 14, 18, 'shek maki salmão 8 p ', 'Ativo', 13.600, 17.000, 'Sim', 'Não', 0.000, '', '2017-03-07 19:42:07', '2017-09-12 19:12:52'),
(197, 14, 18, 'Filadéfia 8 p ', 'Ativo', 14.450, 18.000, 'Sim', 'Não', 0.000, '', '2017-03-07 19:43:36', '2017-09-12 19:13:54'),
(198, 14, 18, 'Filadéfia 8 p ', 'Ativo', 14.450, 17.000, 'Sim', 'Não', 0.000, '', '2017-03-07 19:48:24', '2017-03-07 19:48:24'),
(199, 14, 18, 'Hot Fildélfia 8 p ', 'Ativo', 14.450, 19.000, 'Sim', 'Não', 0.000, '', '2017-03-07 19:48:51', '2017-09-12 19:14:27'),
(200, 14, 18, 'Kani Maki 8p', 'Ativo', 12.750, 15.000, 'Sim', 'Não', 0.000, '', '2017-03-07 19:50:04', '2017-03-07 19:50:04'),
(201, 10, 13, 'Skin Roll 8 p ', 'Ativo', 12.750, 15.000, 'Sim', 'Não', 0.000, '', '2017-03-07 19:50:36', '2017-03-07 19:50:36'),
(202, 10, 13, 'Tomaki 8 p ', 'Ativo', 12.750, 16.000, 'Sim', 'Não', 0.000, '', '2017-03-07 19:50:59', '2017-09-12 19:14:12'),
(203, 10, 13, 'Chimaki 8 p ', 'Ativo', 12.750, 15.000, 'Sim', 'Não', 0.000, '', '2017-03-07 19:51:18', '2017-03-07 19:51:18'),
(204, 14, 13, 'Morango Mak 8 p ', 'Ativo', 12.750, 15.000, 'Sim', 'Não', 0.000, '', '2017-03-07 19:52:21', '2017-03-07 19:52:21'),
(205, 10, 13, 'Individual 22 p ', 'Ativo', 34.000, 40.000, 'Sim', 'Não', 0.000, '', '2017-03-07 19:52:44', '2017-03-07 19:52:44'),
(206, 10, 13, 'Especial 38 p ', 'Ativo', 55.670, 70.000, 'Sim', 'Não', 0.000, '', '2017-03-07 19:53:05', '2017-09-12 19:16:34'),
(207, 10, 13, 'Sumaki 60 p ', 'Ativo', 93.500, 120.000, 'Sim', 'Não', 0.000, '', '2017-03-07 19:53:26', '2017-09-12 19:16:49'),
(208, 10, 13, 'Ceviche Salmão 200gr', 'Ativo', 18.700, 22.000, 'Sim', 'Não', 0.000, '', '2017-03-07 19:53:51', '2017-03-07 19:53:51'),
(209, 10, 13, 'Ceviche Salmão 400gr', 'Ativo', 34.000, 40.000, 'Sim', 'Não', 0.000, '', '2017-03-07 19:54:14', '2017-03-07 19:54:14'),
(210, 10, 13, 'Ceviche tilápia 200gr', 'Ativo', 18.700, 22.000, 'Sim', 'Não', 0.000, '', '2017-03-07 19:54:48', '2017-03-07 19:54:48'),
(211, 10, 13, 'gengibre', 'Ativo', 1.700, 2.000, 'Sim', 'Não', 0.000, '', '2017-03-07 19:55:20', '2017-03-07 19:55:20'),
(212, 10, 13, 'wassabe', 'Ativo', 1.700, 2.000, 'Sim', 'Não', 0.000, '', '2017-03-07 19:55:37', '2017-03-07 19:55:37'),
(213, 10, 13, 'geleia de pimenta', 'Ativo', 1.700, 2.000, 'Sim', 'Não', 0.000, '', '2017-03-07 19:55:54', '2017-03-07 19:55:54'),
(214, 6, 3, 'BADEN BADEN GOLDEN', 'Ativo', 14.000, 26.000, 'Sim', 'Sim', 20.000, '', '2017-08-24 20:45:43', '2017-08-24 20:45:43'),
(215, 13, 1, 'MAGNUN', 'Ativo', 7.990, 10.000, 'Sim', 'Sim', 100.000, '', '2017-08-24 20:54:48', '2017-08-24 20:54:48'),
(216, 10, 1, 'AGUA', 'Ativo', 0.500, 2.000, 'Sim', 'Sim', 100.000, '', '2017-08-24 21:09:00', '2017-08-24 21:09:00'),
(217, 2, 18, 'MEIA BATATA COM CHEDDAR E BACON', 'Ativo', 10.000, 14.300, 'Sim', 'Sim', 0.000, '', '2017-08-24 21:27:23', '2017-08-24 21:27:23'),
(218, 8, 1, 'scweppes', 'Ativo', 2.650, 4.000, 'Sim', 'Sim', 20.000, '', '2017-08-25 19:17:10', '2017-08-25 19:17:10'),
(219, 6, 1, 'ESTRELA GALÍCIA', 'Ativo', 5.800, 8.000, 'Sim', 'Sim', 30.000, '', '2017-08-25 19:18:56', '2017-08-25 19:18:56'),
(220, 13, 1, 'Mms', 'Ativo', 2.500, 4.500, 'Sim', 'Sim', 10.000, '', '2017-08-25 20:20:09', '2017-08-25 20:20:09'),
(221, 6, 1, 'Einsenbahn', 'Ativo', 3.200, 8.000, 'Sim', 'Sim', 50.000, '', '2017-08-25 20:37:17', '2017-08-25 20:37:17'),
(222, 13, 1, 'TALENTO', 'Ativo', 1.500, 3.500, 'Sim', 'Sim', 10.000, '', '2017-08-25 23:31:18', '2017-08-25 23:31:18'),
(223, 13, 1, 'BATON', 'Ativo', 0.500, 1.000, 'Sim', 'Sim', 50.000, '', '2017-08-25 23:31:49', '2017-08-25 23:31:49'),
(224, 6, 1, 'PETRA', 'Ativo', 3.000, 6.000, 'Sim', 'Sim', 20.000, '', '2017-08-26 22:10:43', '2017-08-26 22:10:43'),
(225, 14, 19, 'TAÇA', 'Ativo', 3.050, 5.000, 'Sim', 'Sim', 10.000, '', '2017-08-26 22:30:15', '2017-08-26 22:30:15'),
(226, 13, 1, 'TRIDENT', 'Ativo', 0.500, 2.000, 'Sim', 'Sim', 20.000, '', '2017-08-27 21:40:19', '2017-08-27 21:40:19'),
(227, 6, 1, 'ROLETA RUSSA IPA', 'Ativo', 22.000, 28.000, 'Sim', 'Sim', 12.000, '', '2017-08-29 19:19:17', '2017-08-29 19:19:17'),
(228, 6, 1, 'BADEN BADEN IPA', 'Ativo', 22.000, 26.000, 'Sim', 'Sim', 20.000, '', '2017-08-29 20:10:30', '2017-08-29 20:10:30'),
(229, 4, 1, 'customização', 'Ativo', 2.000, 6.000, 'Sim', 'Não', 0.000, '', '2017-08-29 22:02:21', '2017-08-29 22:04:07'),
(230, 6, 1, 'LUND  WEINZEN', 'Ativo', 22.000, 26.000, 'Sim', 'Sim', 20.000, '', '2017-09-01 18:54:04', '2017-09-01 18:54:04'),
(231, 6, 1, 'LUND PILSEN', 'Ativo', 22.000, 23.400, 'Sim', 'Não', 0.000, '', '2017-09-01 18:54:27', '2017-11-24 20:01:10'),
(232, 2, 17, 'TILÁPIA MEIA PORÇÃO', 'Ativo', 16.500, 22.750, 'Sim', 'Não', 0.000, '', '2017-09-01 19:43:10', '2017-10-04 19:08:40'),
(233, 13, 1, 'FINI', 'Ativo', 0.500, 2.000, 'Sim', 'Não', 0.000, '', '2017-09-01 20:24:57', '2017-09-01 20:24:57'),
(234, 1, 13, 'MEIO FILADÉLFIA', 'Ativo', 8.500, 10.500, 'Sim', 'Não', 0.000, '', '2017-09-05 20:08:58', '2017-09-05 20:08:58'),
(235, 1, 16, 'MEIO HOT FILADÉLFIA', 'Ativo', 11.000, 11.000, 'Sim', 'Não', 0.000, '', '2017-09-05 20:09:30', '2017-09-05 20:09:30'),
(236, 1, 13, 'MEIO SASHIMI SALMÃO', 'Ativo', 13.000, 15.000, 'Sim', 'Não', 0.000, '', '2017-09-05 20:10:01', '2017-09-05 20:10:01'),
(237, 10, 13, 'CARPACCIO ', 'Ativo', 35.000, 35.000, 'Sim', 'Não', 0.000, '', '2017-09-05 20:22:35', '2017-09-05 20:22:35'),
(238, 14, 19, 'TAÇA DE COZUMEL', 'Ativo', 4.500, 8.000, 'Sim', 'Não', 0.000, '', '2017-09-07 20:10:58', '2017-09-07 20:10:58'),
(239, 1, 18, 'SASHIMI SALMÃO FLAMBADO', 'Ativo', 15.000, 30.000, 'Sim', 'Não', 0.000, '', '2017-09-12 19:11:23', '2017-09-12 19:11:23'),
(240, 14, 18, 'NIGIRI KANI', 'Ativo', 2.000, 5.000, 'Sim', 'Não', 0.000, '', '2017-09-12 19:15:17', '2017-09-12 19:15:17'),
(241, 14, 18, 'NIGIRI SKIN', 'Ativo', 2.000, 6.000, 'Sim', 'Não', 0.000, '', '2017-09-12 19:15:45', '2017-09-12 19:15:45'),
(242, 14, 18, 'NIGIRI SALMÃO', 'Ativo', 2.000, 7.000, 'Sim', 'Não', 0.000, '', '2017-09-12 19:16:17', '2017-09-12 19:16:17'),
(243, 14, 18, 'FAMÍLIA 82 PEÇAS', 'Ativo', 100.000, 160.000, 'Sim', 'Não', 0.000, '', '2017-09-12 19:17:22', '2017-09-12 19:17:22'),
(244, 14, 18, 'GUN KAN HOT', 'Ativo', 2.000, 10.000, 'Sim', 'Não', 0.000, '', '2017-09-12 19:21:16', '2017-09-12 19:21:16'),
(245, 14, 18, 'BOLINHO BACALHAU', 'Ativo', 10.000, 18.000, 'Sim', 'Não', 0.000, '', '2017-09-12 19:26:59', '2017-09-12 19:26:59'),
(246, 14, 18, 'ACARAJÉ JAPONÊS', 'Ativo', 5.000, 10.000, 'Sim', 'Não', 0.000, '', '2017-09-12 19:31:37', '2017-09-12 19:31:37'),
(247, 11, 8, 'TRAPICHE', 'Ativo', 31.000, 50.000, 'Sim', 'Não', 0.000, '', '2017-09-12 19:36:49', '2017-09-12 19:36:49'),
(248, 6, 1, 'SULAMERICANA', 'Ativo', 5.600, 19.000, 'Sim', 'Sim', 30.000, '', '2017-09-15 20:04:19', '2017-09-15 20:04:19'),
(249, 6, 1, 'PETRA', 'Ativo', 3.500, 6.000, 'Sim', 'Sim', 30.000, '', '2017-09-15 20:05:38', '2017-09-15 20:05:38'),
(250, 6, 1, 'RED VINTAGE', 'Ativo', 10.000, 19.000, 'Sim', 'Sim', 30.000, '', '2017-09-15 21:52:00', '2017-09-15 21:52:00'),
(251, 6, 1, 'RED VINTAGE', 'Ativo', 10.000, 19.000, 'Sim', 'Sim', 30.000, '', '2017-09-15 21:52:00', '2017-09-15 21:52:00'),
(252, 6, 1, 'TERESÓPOLIS', 'Ativo', 13.400, 19.800, 'Sim', 'Sim', 24.000, '', '2017-09-21 20:55:33', '2017-11-24 20:00:43'),
(253, 1, 18, 'MEIA SALADA', 'Ativo', 5.000, 9.750, 'Sim', 'Não', 0.000, '', '2017-09-22 22:57:31', '2017-09-22 22:57:31'),
(254, 13, 1, 'alpino', 'Ativo', 0.500, 1.500, 'Sim', 'Sim', 10.000, '', '2017-09-27 21:16:32', '2017-09-27 21:16:32'),
(255, 4, 1, 'Adicional de Palmito', 'Ativo', 0.500, 3.000, 'Sim', 'Não', 0.000, '', '2017-09-27 21:24:09', '2017-09-27 21:24:09'),
(256, 14, 17, 'TAPAS ', 'Ativo', 8.500, 15.000, 'Sim', 'Não', 0.000, '', '2017-10-04 18:21:22', '2017-10-04 18:21:22'),
(257, 14, 18, 'PALITOS DE CENOURA E PEPINO JAPONÊS', 'Ativo', 5.000, 10.000, 'Sim', 'Não', 0.000, '', '2017-10-04 18:21:55', '2017-10-04 18:21:55'),
(258, 14, 18, 'SALMÃO GRELHADO', 'Ativo', 15.000, 35.000, 'Sim', 'Não', 0.000, '', '2017-10-04 18:23:48', '2017-10-04 18:23:48'),
(259, 14, 18, 'COXA DE FRANGO AO MOLHO DE CERVEJA', 'Ativo', 15.000, 20.000, 'Sim', 'Não', 0.000, '', '2017-10-04 18:24:52', '2017-10-04 18:24:52'),
(260, 4, 17, 'BANANA DA TERRA ', 'Ativo', 1.990, 3.000, 'Sim', 'Não', 0.000, '', '2017-10-04 18:26:03', '2017-10-04 18:26:03'),
(261, 4, 17, 'PÃO', 'Ativo', 1.000, 3.000, 'Sim', 'Não', 0.000, '', '2017-10-04 18:26:47', '2017-10-04 18:26:47'),
(262, 2, 17, 'CAMARÃO EMPANADO', 'Ativo', 10.000, 18.000, 'Sim', 'Não', 0.000, '', '2017-10-04 18:30:18', '2017-10-05 19:49:12'),
(263, 2, 17, 'PANCETTA', 'Ativo', 10.000, 15.000, 'Sim', 'Não', 0.000, '', '2017-10-04 18:30:50', '2017-11-25 20:26:10'),
(264, 2, 18, 'HOT WINGS', 'Ativo', 10.000, 20.000, 'Sim', 'Não', 0.000, '', '2017-10-04 18:31:14', '2017-11-25 20:25:58'),
(265, 2, 18, 'FILÉ MIGNON AO MOLHO DE QUEIJO', 'Ativo', 10.000, 25.000, 'Sim', 'Não', 0.000, '', '2017-10-04 18:32:21', '2017-10-05 19:48:36'),
(266, 3, 17, 'BENGALA', 'Ativo', 10.000, 15.000, 'Sim', 'Não', 0.000, '', '2017-10-04 18:34:20', '2017-10-04 18:34:20'),
(267, 5, 18, 'TORTA DE 3 CHOCOLATES', 'Ativo', 10.000, 15.000, 'Sim', 'Não', 0.000, '', '2017-10-04 18:36:54', '2017-10-04 18:36:54'),
(268, 5, 18, 'BROWNIE', 'Ativo', 10.000, 18.000, 'Sim', 'Não', 0.000, '', '2017-10-04 18:37:24', '2017-10-04 18:37:24'),
(269, 5, 18, 'COCADA ASSADA', 'Ativo', 10.000, 15.000, 'Sim', 'Não', 0.000, '', '2017-10-04 18:37:51', '2017-10-04 18:37:51'),
(270, 12, 20, 'SUCO DE  MELANCIA', 'Ativo', 3.000, 5.000, 'Sim', 'Não', 0.000, '', '2017-10-04 18:39:04', '2017-10-04 18:39:04'),
(271, 12, 13, 'SUCO COMBINADO', 'Ativo', 2.000, 7.000, 'Sim', 'Não', 0.000, '', '2017-10-04 18:41:19', '2017-10-04 18:41:19'),
(272, 11, 8, 'CHANDON BRUTT', 'Ativo', 50.000, 120.000, 'Sim', 'Não', 0.000, '', '2017-10-04 18:45:28', '2017-10-04 18:45:28'),
(273, 11, 8, 'SALTON DEMI SEC', 'Ativo', 15.000, 50.000, 'Sim', 'Não', 0.000, '', '2017-10-04 18:46:22', '2017-10-04 18:46:22'),
(274, 11, 8, 'SALTON BRUTT', 'Ativo', 15.000, 50.000, 'Sim', 'Não', 0.000, '', '2017-10-04 18:46:51', '2017-10-04 18:46:51'),
(275, 7, 19, 'LIMÃO COM CACHAÇA', 'Ativo', 5.000, 7.000, 'Sim', 'Não', 0.000, '', '2017-10-04 18:47:55', '2017-10-04 18:47:55'),
(276, 7, 19, 'LIMÃO COM VODKA', 'Ativo', 5.000, 9.000, 'Sim', 'Não', 0.000, '', '2017-10-04 18:48:47', '2017-10-04 18:48:47'),
(277, 7, 19, 'LIMÃO COM WHISKY', 'Ativo', 5.000, 14.000, 'Sim', 'Não', 0.000, '', '2017-10-04 18:49:32', '2017-10-04 18:49:32'),
(278, 7, 19, 'MARACUJÁ COM CACHAÇA', 'Ativo', 5.000, 8.000, 'Sim', 'Não', 0.000, '', '2017-10-04 18:50:12', '2017-10-04 18:50:12'),
(279, 7, 19, 'MARACUJÁ COM VODKA', 'Ativo', 5.000, 10.000, 'Sim', 'Não', 0.000, '', '2017-10-04 18:50:42', '2017-10-04 18:50:42'),
(280, 7, 19, 'MARACUJÁ COM WHISKY', 'Ativo', 5.000, 15.000, 'Sim', 'Não', 0.000, '', '2017-10-04 18:51:20', '2017-10-04 18:51:20'),
(281, 7, 19, 'MORANGO COM CACHAÇA', 'Ativo', 5.000, 9.000, 'Sim', 'Não', 0.000, '', '2017-10-04 18:51:51', '2017-10-04 18:51:51'),
(282, 7, 19, 'MORANGO COM VODKA', 'Ativo', 5.000, 11.000, 'Sim', 'Não', 0.000, '', '2017-10-04 18:52:21', '2017-10-04 18:52:21'),
(283, 7, 19, 'MORANGO COM WHISKY', 'Ativo', 5.000, 16.000, 'Sim', 'Não', 0.000, '', '2017-10-04 18:53:29', '2017-10-04 18:53:29'),
(284, 7, 19, 'KIWI COM CACHAÇA', 'Ativo', 5.000, 9.000, 'Sim', 'Não', 0.000, '', '2017-10-04 18:54:03', '2017-10-04 18:56:59'),
(285, 7, 19, 'KIWI COM VODKA', 'Ativo', 5.000, 11.000, 'Sim', 'Não', 0.000, '', '2017-10-04 18:55:04', '2017-10-04 18:55:04'),
(286, 7, 19, 'KIWI COM WHISKY', 'Ativo', 5.000, 16.000, 'Sim', 'Não', 0.000, '', '2017-10-04 18:56:38', '2017-10-04 18:56:38'),
(287, 7, 19, 'SEX ON THE BEACH', 'Ativo', 5.000, 16.000, 'Sim', 'Não', 0.000, '', '2017-10-04 18:59:28', '2017-10-04 18:59:28'),
(288, 7, 19, 'SHIRLEY TEMPLE', 'Ativo', 5.000, 16.000, 'Sim', 'Não', 0.000, '', '2017-10-04 19:00:06', '2017-10-04 19:00:06'),
(289, 7, 19, 'MOJITO', 'Ativo', 1.000, 16.000, 'Sim', 'Não', 0.000, '', '2017-10-04 19:00:30', '2017-10-04 19:00:30'),
(290, 7, 19, 'PINA COLADA SEM ALCOOL', 'Ativo', 10.000, 16.000, 'Sim', 'Não', 0.000, '', '2017-10-04 19:01:03', '2017-10-04 19:01:03'),
(291, 10, 1, 'água de coco', 'Ativo', 1.500, 3.000, 'Sim', 'Não', 0.000, '', '2017-10-04 23:52:47', '2017-10-04 23:52:47'),
(292, 1, 17, 'MIX MAKI', 'Ativo', 17.000, 10.000, 'Sim', 'Não', 0.000, '', '2017-10-17 20:03:29', '2017-10-17 20:03:29'),
(293, 10, 13, 'pure de batata', 'Ativo', 2.000, 5.000, 'Sim', 'Não', 0.000, '', '2017-10-17 21:47:30', '2017-10-17 21:47:30'),
(294, 6, 3, 'Paulistania IPA', 'Ativo', 14.500, 18.000, 'Sim', 'Sim', 0.000, '', '2017-10-25 19:08:33', '2017-10-25 19:08:33'),
(295, 6, 3, 'Paulistania Puro Malte', 'Ativo', 10.500, 18.000, 'Sim', 'Sim', 0.000, '', '2017-10-25 19:09:09', '2017-10-25 19:09:09'),
(296, 6, 3, 'Erdinger', 'Ativo', 9.500, 14.000, 'Sim', 'Sim', 0.000, '', '2017-10-25 19:10:54', '2017-10-25 19:10:54'),
(297, 6, 3, 'Erdinger Alkoholfrei', 'Ativo', 10.500, 15.000, 'Sim', 'Sim', 0.000, '', '2017-10-25 19:11:43', '2017-10-25 19:11:43'),
(298, 7, 19, 'Abacaxi com vodka', 'Ativo', 3.000, 11.000, 'Sim', 'Não', 0.000, '', '2017-10-26 20:26:17', '2017-10-26 20:26:17'),
(299, 10, 13, 'Pina Colada com Vodka', 'Ativo', 10.000, 20.000, 'Sim', 'Sim', 0.000, '', '2017-10-27 20:56:07', '2017-10-27 20:56:07'),
(300, 13, 4, 'Tortuguita', 'Ativo', NULL, 2.000, 'Sim', 'Não', 0.000, '', '2017-11-11 21:12:17', '2017-11-11 21:12:17'),
(301, 10, 13, 'xote de limão', 'Ativo', 1.000, 2.000, 'Sim', 'Não', 0.000, '', '2017-11-19 22:27:01', '2017-11-19 22:27:01'),
(302, 4, 17, 'Mandioca frita', 'Ativo', 2.000, 6.000, 'Sim', 'Não', 0.000, '', '2017-11-30 20:08:10', '2017-11-30 20:08:10'),
(303, 6, 1, 'CIDRA MAGNERS', 'Ativo', 6.700, 12.000, 'Sim', 'Não', 0.000, '', '2017-12-08 20:07:45', '2017-12-08 20:07:45'),
(304, 6, 1, 'MANIACS IPA', 'Ativo', 10.600, 18.000, 'Sim', 'Não', 0.000, '', '2017-12-08 20:09:20', '2017-12-08 20:09:20'),
(305, 6, 1, 'FAX 10%', 'Ativo', 13.900, 23.000, 'Sim', 'Não', 0.000, '', '2017-12-08 20:09:58', '2017-12-08 20:09:58'),
(306, 6, 1, 'FAX IPA', 'Ativo', 11.000, 18.000, 'Sim', 'Não', 0.000, '', '2017-12-08 20:10:30', '2017-12-08 20:10:30'),
(307, 6, 1, 'FAX IPA', 'Ativo', 11.000, 18.000, 'Sim', 'Não', 0.000, '', '2017-12-08 20:10:37', '2017-12-08 20:10:37'),
(308, 6, 1, 'ROLETA RUSSA APA', 'Ativo', 18.900, 29.000, 'Sim', 'Não', 0.000, '', '2017-12-08 20:11:18', '2017-12-08 20:11:18'),
(309, 10, 17, 'Tataki', 'Ativo', 10.000, 19.000, 'Sim', 'Não', 0.000, '', '2017-12-19 19:59:15', '2017-12-19 19:59:15'),
(310, 14, 1, 'Meia Tábua de Frios', 'Ativo', 10.000, 16.200, 'Sim', 'Não', 0.000, '', '2017-12-29 22:43:43', '2017-12-29 22:43:43'),
(311, 4, 17, 'guarnição de gorgonzola', 'Ativo', 2.000, 8.000, 'Sim', 'Não', 0.000, '', '2018-01-20 22:49:41', '2018-01-20 22:49:41'),
(312, 6, 1, 'Invicta Iniciação', 'Ativo', 26.000, 26.000, 'Sim', 'Sim', 0.000, '', '2018-02-21 20:07:57', '2018-02-21 20:07:57'),
(313, 7, 19, 'menu degustação', 'Ativo', 20.000, 30.000, 'Sim', 'Não', 0.000, '', '2018-02-23 21:22:07', '2018-02-23 21:22:07'),
(314, 7, 19, 'MOSCOW MULE', 'Ativo', 15.000, 25.000, 'Sim', 'Não', 0.000, '', '2018-02-24 20:24:53', '2018-02-24 20:24:53'),
(315, 7, 19, 'CRISPEROL', 'Ativo', 15.000, 20.000, 'Sim', 'Não', 0.000, '', '2018-02-24 20:25:27', '2018-02-24 20:25:27'),
(316, 7, 13, 'GIN TÔNICA', 'Ativo', 15.000, 20.000, 'Sim', 'Não', 0.000, '', '2018-02-24 20:26:02', '2018-02-24 20:26:02');

-- --------------------------------------------------------

--
-- Estrutura para tabela `product_items`
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
-- Estrutura para tabela `stages`
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
-- Fazendo dump de dados para tabela `stages`
--

INSERT INTO `stages` (`id`, `name`, `status`, `show_on_kitchen`, `consider_as`, `label_class`, `created`, `modified`) VALUES
(1, 'A Caminho', 'Ativo', 'Não', 'Pendentes', 'label-default', '2016-01-04 00:54:51', '2016-01-10 17:02:53'),
(2, 'Em Preparo (Cozinha)', 'Ativo', 'Sim', 'Pendentes', 'label-warning', '2015-12-09 23:51:32', '2016-01-10 17:03:08'),
(3, 'Pronto (Cozinha)', 'Ativo', 'Sim', 'Pendentes', 'label-success', '2015-12-09 23:53:07', '2016-01-10 17:03:12'),
(4, 'Entregue', 'Ativo', 'Sim', 'Concluídos', 'label-info', '2015-12-09 23:49:34', '2016-01-10 17:03:51'),
(5, 'Cancelado', 'Ativo', 'Não', 'Concluídos', 'label-danger', '2015-12-09 23:54:01', '2016-01-10 17:04:17');

-- --------------------------------------------------------

--
-- Estrutura para tabela `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `uf` varchar(2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`),
  UNIQUE KEY `uf_UNIQUE` (`uf`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Fazendo dump de dados para tabela `states`
--

INSERT INTO `states` (`id`, `name`, `uf`) VALUES
(1, 'Goiás', 'GO');

-- --------------------------------------------------------

--
-- Estrutura para tabela `status_addresses`
--

CREATE TABLE IF NOT EXISTS `status_addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Fazendo dump de dados para tabela `status_addresses`
--

INSERT INTO `status_addresses` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Ativo', '2017-03-06 13:46:31', '2017-03-06 13:46:31'),
(2, 'Inativo', '2017-03-06 13:47:15', '2017-03-06 13:47:15');

-- --------------------------------------------------------

--
-- Estrutura para tabela `status_bills`
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
-- Fazendo dump de dados para tabela `status_bills`
--

INSERT INTO `status_bills` (`id`, `name`, `finish`, `created`, `modified`) VALUES
(1, 'Aberta', 'Não', '2015-12-11 00:22:09', '2015-12-11 00:22:09'),
(2, 'Fechada', 'Sim', '2015-12-11 00:22:14', '2015-12-11 00:22:14');

-- --------------------------------------------------------

--
-- Estrutura para tabela `status_entry_notes`
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
-- Fazendo dump de dados para tabela `status_entry_notes`
--

INSERT INTO `status_entry_notes` (`id`, `name`, `finish`, `created`, `modified`) VALUES
(1, 'Cadastrando', 'Não', '2015-12-12 20:00:52', '2015-12-12 20:00:52'),
(2, 'Concluída', 'Sim', '2015-12-12 20:01:11', '2015-12-12 20:01:11');

-- --------------------------------------------------------

--
-- Estrutura para tabela `status_internal_transfers`
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
-- Fazendo dump de dados para tabela `status_internal_transfers`
--

INSERT INTO `status_internal_transfers` (`id`, `name`, `finish`, `created`, `modified`) VALUES
(1, 'Cadastrando', 'Não', '2016-04-05 19:12:21', '2016-04-05 19:12:21'),
(2, 'Concluída', 'Sim', '2016-04-05 19:12:51', '2016-04-05 19:13:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `status_orders`
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
-- Fazendo dump de dados para tabela `status_orders`
--

INSERT INTO `status_orders` (`id`, `name`, `finish`, `created`, `modified`) VALUES
(1, 'Pendente', 'Não', '2015-12-11 00:48:59', '2015-12-11 00:48:59'),
(2, 'Quitado', 'Sim', '2015-12-11 00:49:14', '2016-04-19 08:31:24');

-- --------------------------------------------------------

--
-- Estrutura para tabela `status_payment_methods`
--

CREATE TABLE IF NOT EXISTS `status_payment_methods` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `status_payment_methods`
--

INSERT INTO `status_payment_methods` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Ativo', '2017-01-25 13:29:33', '2017-01-25 13:29:33'),
(2, 'Inativo', '2017-01-25 13:29:38', '2017-01-25 13:29:38');

-- --------------------------------------------------------

--
-- Estrutura para tabela `stocks`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42615 ;

--
-- Fazendo dump de dados para tabela `stocks`
--


-- --------------------------------------------------------

--
-- Estrutura para tabela `subcategories`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Fazendo dump de dados para tabela `subcategories`
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
(10, 2, 'Água', 4, '2016-06-20 08:37:58', '2017-11-22 09:12:28'),
(11, 2, 'Vinhos', 4, '2016-06-20 08:38:11', '2016-06-20 08:38:11'),
(12, 2, 'Sucos (400 ml)', 2, '2016-06-20 08:38:36', '2016-06-20 08:38:46'),
(13, 1, 'Doces e Chocolates', 4, '2017-03-02 21:50:05', '2017-03-02 21:50:05'),
(14, 3, 'Prato', 2, '2017-03-07 19:04:11', '2017-03-07 19:04:11');

-- --------------------------------------------------------

--
-- Estrutura para tabela `suppliers`
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
-- Fazendo dump de dados para tabela `suppliers`
--

INSERT INTO `suppliers` (`id`, `company_name`, `contact_name`, `phone`, `fax`, `email`, `created`, `modified`) VALUES
(1, 'Supermercado Siqueira', '', '123234234234', '656565656565', 'delfino.cesar@gmail.com', '2015-12-20 18:25:49', '2016-02-09 17:07:57');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tables`
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
-- Fazendo dump de dados para tabela `tables`
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
-- Estrutura para tabela `units`
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
-- Fazendo dump de dados para tabela `units`
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
-- Estrutura para tabela `users`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Fazendo dump de dados para tabela `users`
--

INSERT INTO `users` (`id`, `group_id`, `status`, `name`, `email`, `password`, `created`, `modified`) VALUES
(1, 1, 'Ativo', 'Gustavo César de Melo', 'delfino.cesar@gmail.com', 'd9f626c44c10101c2ab684d64ca2dd27608e232f', '2016-02-09 14:36:03', '2017-11-22 10:42:36'),
(3, 3, 'Ativo', 'átendente_2', 'delfino.cesar2@gmail.com', '4979ddf6ce50781a05b9523f74f795555c0d65c2', '2018-03-18 09:48:48', '2018-03-18 09:48:48');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


--
-- Estrutura para tabela `audits`
--

CREATE TABLE IF NOT EXISTS `audits` (
  `id` varchar(36) NOT NULL,
  `event` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `entity_id` varchar(36) NOT NULL,
  `request_id` varchar(36) NOT NULL,
  `json_object` text NOT NULL,
  `description` text,
  `source_id` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Estrutura para tabela `audit_deltas`
--

CREATE TABLE IF NOT EXISTS `audit_deltas` (
  `id` varchar(36) NOT NULL,
  `audit_id` varchar(36) NOT NULL,
  `property_name` varchar(255) NOT NULL,
  `old_value` text,
  `new_value` text,
  PRIMARY KEY (`id`),
  KEY `audit_id` (`audit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;