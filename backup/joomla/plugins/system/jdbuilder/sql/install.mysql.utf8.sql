CREATE TABLE IF NOT EXISTS `#__jdbuilder_layouts` (
`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`layout` MEDIUMTEXT NOT NULL ,
`created` BIGINT(12) NOT NULL DEFAULT '0',
`updated` BIGINT(12) NOT NULL DEFAULT '0',
PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `#__jdbuilder_favourites` (
`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`template_id` INT(11) NOT NULL,
`created` BIGINT(12) NOT NULL DEFAULT '0',
`updated` BIGINT(12) NOT NULL DEFAULT '0',
PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `#__jdbuilder_templates` (
`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`title` VARCHAR(255) NOT NULL,
`type` VARCHAR(20) NOT NULL,
`template` MEDIUMTEXT NOT NULL,
`created` BIGINT(12) NOT NULL DEFAULT '0',
`updated` BIGINT(12) NOT NULL DEFAULT '0',
PRIMARY KEY (`id`)
);

UPDATE `#__extensions` SET `enabled` = '1' WHERE `element` = 'jdbuilder' AND `folder` = 'system' AND `type` = 'plugin';