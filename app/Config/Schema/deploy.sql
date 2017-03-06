CREATE TABLE IF NOT EXISTS `addresses` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status_address_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `zip_code` varchar(45) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city` varchar(45) NOT NULL,
  `public_place_id` int(11) NOT NULL,
  `number` varchar(45) NOT NULL,
  `is_primary` enum('Sim','Não') NOT NULL DEFAULT 'Sim',
  `reference` varchar(255) DEFAULT NULL,
  `observation` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `public_places` (
`id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO `public_places` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Rua', '2017-03-06 13:48:36', '2017-03-06 13:48:36'),
(2, 'Avenida', '2017-03-06 13:49:16', '2017-03-06 13:49:16'),
(3, 'Chácara', '2017-03-06 13:50:12', '2017-03-06 13:50:12'),
(4, 'Rodovia', '2017-03-06 13:50:30', '2017-03-06 13:50:30'),
(5, 'Praça', '2017-03-06 13:50:40', '2017-03-06 13:50:40'),
(6, 'Viela', '2017-03-06 13:50:56', '2017-03-06 13:50:56');

CREATE TABLE IF NOT EXISTS `states` (
`id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `uf` varchar(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `states` (`id`, `name`, `uf`) VALUES
(1, 'Goiás', 'GO');

CREATE TABLE IF NOT EXISTS `status_addresses` (
`id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `status_addresses` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Ativo', '2017-03-06 13:46:31', '2017-03-06 13:46:31'),
(2, 'Inativo', '2017-03-06 13:47:15', '2017-03-06 13:47:15');

ALTER TABLE `addresses`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `public_places`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name_UNIQUE` (`name`);

ALTER TABLE `states`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name_UNIQUE` (`name`), ADD UNIQUE KEY `uf_UNIQUE` (`uf`);

ALTER TABLE `status_addresses`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name_UNIQUE` (`name`);

ALTER TABLE `addresses`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `public_places`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;

ALTER TABLE `states`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;

ALTER TABLE `status_addresses`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;