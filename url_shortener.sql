-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-04-2013 a las 14:53:34
-- Versión del servidor: 5.5.29
-- Versión de PHP: 5.3.10-1ubuntu3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `url_shortener`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `urls`
--

CREATE TABLE IF NOT EXISTS `urls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL,
  `shorturl` varchar(50) NOT NULL,
  `longurl` varchar(100) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `cont` int(11) NOT NULL DEFAULT '0',
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Volcado de datos para la tabla `urls`
--

INSERT INTO `urls` (`id`, `titulo`, `shorturl`, `longurl`, `user_id`, `cont`, `creation_date`) VALUES
(20, 'peru', 'goog', 'google.com.pe', 1, 5, '2013-04-01 19:23:04'),
(21, 'kohana', '1234', 'http://forum.kohanaframework.org/', 1, 2, '2013-04-01 19:23:45'),
(22, 'mysql', 'datetime', 'http://stackoverflow.com/questions/817396/mysql-timestamp-only-on-create', 1, 1, '2013-04-01 19:24:13'),
(23, 'japon', 'jp', 'google.co.jp', 4, 2, '2013-04-01 19:24:46'),
(24, 'japon', 'japan', 'google.co.jp', 1, 3, '2013-04-01 19:25:53'),
(25, 'japon', 'japan', 'http://es.wikipedia.org/wiki/Japan', 4, 1, '2013-04-01 19:26:17'),
(26, 'mexico', 'goog', 'http://www.google.com.mx/', 4, 2, '2013-04-01 19:27:50'),
(27, 'ruby', 'rb', 'http://net.tutsplus.com/category/tutorials/ruby/?tag=videos', 5, 0, '2013-04-01 19:29:08'),
(28, 'encoder', 'enc-64', 'http://www.opinionatedgeek.com/dotnet/tools/base64encode/', 5, 1, '2013-04-01 19:29:37'),
(29, 'twitter', 'twttr', 'https://twitter.com/', 1, 2, '2013-04-01 19:33:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(127) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Carlos Pando', 'cxrlospxndo@gmail.com', 'cxrlospxndo'),
(4, 'oscar', 'oscarpando@gmail.com', '12345'),
(5, 'eloy barahora', 'willybs@hotmail.com', 'eloy'),
(6, 'root', 'root@gmail.com', 'root'),
(7, 'Joselito', 'akalink@hotmail.com', 'josez'),
(9, 'Bat out of Hell', 'cxrlospxndo.yahoo.com.pe', 'passs'),
(13, 'Falling into You', 'carlosay@hotmail.com', 'qwerty'),
(14, 'Ayd', 'no-reply@dropbox.com', 'aydayd');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `urls`
--
ALTER TABLE `urls`
  ADD CONSTRAINT `user_inter_relational_constraint` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
