-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 31-03-2013 a las 19:24:14
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
  `longurl` varchar(50) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `urls`
--

INSERT INTO `urls` (`id`, `titulo`, `shorturl`, `longurl`, `user_id`) VALUES
(1, 'blog', 'WgFhv', 'http://cxrlospxndo.blogspot.com/', 1),
(2, 'google', 'wakamole', 'https://www.google.com.pe/', 1),
(3, 'personal', 'mole', 'http://peru.com/', 1),
(4, 'personal', 'wakamoleslsw', 'http://www.rpp.com.pe/2013-03-30-cinco-errores-que-cometemos-a-la-hora-de-tomar-desayuno-noticia_580917.html', 5),
(5, 'tuesta', 'milton', 'https://www.facebook.com/', 5),
(6, 'c vilchez', 'perudosp', 'http://peru.com/entretenimiento', 5),
(7, 'el blog', '2312', 'https://twitter.com/', 1),
(8, 'c jose', 'rtrtrt', 'http://peru.com/', 6),
(9, 'twitter', '2312', 'https://twitter.com/', 7),
(10, 'daew', 'wakamole', 'https://www.facebook.com/', 7),
(11, 'personal', 'perudosp', 'http://9gag.com/gag/6953386', 7);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Carlos Pando', 'cxrlospxndo@gmail.com', 'cxrlospxndo'),
(4, 'oscar', 'oscarpando@gmail.com', '12345'),
(5, 'eloy barahora', 'willybs@hotmail.com', 'eloy'),
(6, 'root', 'root@gmail.com', 'root'),
(7, 'Joselito', 'akalink@hotmail.com', 'josez');

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
