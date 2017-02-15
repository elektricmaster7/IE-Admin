SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

INSERT INTO `groups` (`id`, `name`) VALUES
(1, 'Administradores'),
(2, 'Gestor'),
(3, 'Utilizadores');

CREATE TABLE IF NOT EXISTS `groups_users` (
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `group_id` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `groups_users` (`user_id`, `group_id`) VALUES
(1, 1),
(2, 2);

CREATE TABLE IF NOT EXISTS `rules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Rule description',
  `group_id` int(10) unsigned DEFAULT NULL,
  `order` int(10) unsigned DEFAULT NULL,
  `action` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permission` tinyint(1) NOT NULL DEFAULT '0',
  `forward` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

INSERT INTO `rules` (`id`, `name`, `group_id`, `order`, `action`, `permission`, `forward`, `message`) VALUES
(1, 'Allow everything for Administrators', 1, 999999, '*', 1, '', ''),
(2, 'Allow all pages', null, 100, '*', 1, '', ''),
(3, 'Display a message for denied admin page', null, 200, '/admin* or /pages/*', 0, '/', 'Não tem permissões para aceder a esta página!'),
(4, 'Allow Pages for Gestor', 2, 300, '*', 1, '', ''),
(5, 'Deny Admin Specific Pages for Gestor', 2, 400, '/admin/groups* or /admin/rules*', 0, '/admin', 'Não tem permissões para aceder a esta página!'),
(6, 'Allow Pages for Users', 3, 500, '*', 1, '', ''),
(7, 'Deny Admin Specific Pages for Users', 3, 600, '/admin/users* or /admin/groups* or /admin/rules*', 0, '/admin', 'Não tem permissões para aceder a esta página!');

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `emailcheckcode` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `passwordchangecode` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `disable` tinyint(1) NOT NULL COMMENT 'Disable/enable account',
  `expire_account` date DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

INSERT INTO `users` (`id`, `login`, `password`, `email`, `emailcheckcode`, `passwordchangecode`, `disable`, `expire_account`, `created`, `updated`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'joao.carvalho.7@hotmail.com', '', '', 0, NULL, '2016-11-11 12:00:00', '2016-11-11 12:00:00'),
(2, 'gestor', '21232f297a57a5a743894a0e4a801fc3', 'gestor@inspirelectronics.com', '', '', 0, NULL, '2016-11-11 12:00:00', '2016-11-11 12:00:00');

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `viewed` tinyint(1) NOT NULL DEFAULT '0',
  `message` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

INSERT INTO `notifications` (`id`, `user_id`, `viewed`, `message`, `link`, `created`, `modified`) VALUES
(1, NULL, 0, 'Bem vindo ao sistema de administração.', '/admin', '2017-01-01 12:00:00', '2017-01-01 12:00:00');

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lang` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `logo_path` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `notifications` tinyint(1) NOT NULL COMMENT 'Disable/enable notifications',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

INSERT INTO `settings` (`id`, `lang`, `logo_path`, `notifications`) VALUES
(1, 'por', '', 1);
