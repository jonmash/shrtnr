CREATE TABLE IF NOT EXISTS `shortenedurls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `long_url` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `creator` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `referrals` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;