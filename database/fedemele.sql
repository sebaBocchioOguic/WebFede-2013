-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 24-06-2011 a las 11:19:23
-- Versión del servidor: 5.1.41
-- Versión de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `fedemele`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `audio`
--

CREATE TABLE IF NOT EXISTS `audio` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nombre_archivo` varchar(60) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `audio`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discografia`
--

CREATE TABLE IF NOT EXISTS `discografia` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `imagen` varchar(50) DEFAULT NULL,
  `titulo` varchar(100) NOT NULL,
  `texto` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcar la base de datos para la tabla `discografia`
--

INSERT INTO `discografia` (`id`, `imagen`, `titulo`, `texto`) VALUES
(3, NULL, 'a', 'a'),
(2, 'imagenes/black_125x125.gif', 'Disco 2', 'Disco 2 - Texto'),
(4, NULL, '444', '44444444'),
(6, 'imagenes/imagen_nueva.jpeg', 'disco', 'disocooooo'),
(5, 'imagenes/imagen_nueva.jpeg', '54789', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gears`
--

CREATE TABLE IF NOT EXISTS `gears` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `gears`
--

INSERT INTO `gears` (`id`, `nombre`, `imagen`) VALUES
(3, 'Zildjian', 'imagenes/images.jpeg'),
(4, 'Pearl', 'imagenes/images2.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `descripcion` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `links`
--

INSERT INTO `links` (`id`, `nombre`, `link`, `descripcion`) VALUES
(1, 'Google', 'http://www.google.com.ar', 'Google - Buscador de Internet');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `noticia` text NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcar la base de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `noticia`, `fecha`) VALUES
(1, 'FRATER en El Teatro de Flores', 'Este 26/07, FRATER realiza su último show previo al lanzamiento de su disco "Eleven"', '2011-06-24'),
(3, 'Primer Disco!!', 'FRATER lanza su primer disco y queremos festejarlo con vos, dejanos tu mail y participá por los 10 discos que regalamos.', '2011-06-24'),
(2, 'Clinica', 'Clínica por Federico Mele, el 30/08.\r\nNo te la pierdas!', '2011-06-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usu_id` int(3) NOT NULL AUTO_INCREMENT,
  `usu_login` varchar(10) NOT NULL,
  `usu_clave` varchar(10) NOT NULL,
  `usu_email` varchar(70) NOT NULL,
  `usu_nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`usu_id`),
  UNIQUE KEY `usu_login` (`usu_login`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usu_id`, `usu_login`, `usu_clave`, `usu_email`, `usu_nombre`) VALUES
(1, 'admin', '12345678', '', 'Webmaster'),
(2, 'fedemele', '12345678', '', 'Federico Mele');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `url` varchar(80) NOT NULL,
  `titulo` varchar(80) NOT NULL,
  `descripcion` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `videos`
--

INSERT INTO `videos` (`id`, `url`, `titulo`, `descripcion`) VALUES
(1, 'http://www.youtube.com/v/IhNFlx7wRcc?version=3&amp;hl=es_ES', 'Fede Mele', 'Jazzzzzzzzzz Fusion');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
