DROP TABLE IF EXISTS `#__easygcalendar`;

CREATE TABLE IF NOT EXISTS `#__easygcalendar` (
  `id` int(11) NOT NULL auto_increment,
  `name` text NOT NULL,
  `identifier` text NOT NULL,
  `APIKey` text NOT NULL,
  `color` text NOT NULL,
  PRIMARY KEY  (`id`)
) ;
