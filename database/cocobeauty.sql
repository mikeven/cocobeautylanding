-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-07-2019 a las 05:19:44
-- Versión del servidor: 5.6.15-log
-- Versión de PHP: 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cocobeauty`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE IF NOT EXISTS `actividad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` varchar(400) COLLATE utf8_spanish_ci DEFAULT NULL,
  `imagen` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`id`, `nombre`, `descripcion`, `imagen`) VALUES
(1, 'Hidratación', 'Hidratación facial diseñada para la piel de verano con la familia HYDRA BEAUTY de CHANEL.', '5950-actividad.png'),
(2, 'Maquillaje', 'Aplicación de maquillaje con últimas creaciones de Belleza CHANEL.', '3303-actividad.png'),
(3, 'Manicura', 'Descubre los nuevos tonos de LE VERNIS de CHANEL para añadir color a tu verano.', '7585-actividad.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE IF NOT EXISTS `compra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `RESERVACION_id` int(11) NOT NULL,
  `PRODUCTO_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_COMPRA_RESERVACION1_idx` (`RESERVACION_id`),
  KEY `fk_COMPRA_PRODUCTO1_idx` (`PRODUCTO_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE IF NOT EXISTS `horario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime DEFAULT NULL,
  `cupo` int(11) DEFAULT NULL,
  `ACTIVIDAD_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_HORARIO_ACTIVIDAD` (`ACTIVIDAD_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`id`, `fecha`, `cupo`, `ACTIVIDAD_id`) VALUES
(1, '2019-08-06 15:30:00', 6, 1),
(2, '2019-08-05 14:00:00', 12, 1),
(4, '2019-07-31 09:00:00', 3, 2),
(5, '2019-08-08 13:00:00', 5, 2),
(6, '2019-08-08 17:00:00', 7, 3),
(7, '2019-08-10 18:30:00', 4, 3),
(8, '2019-08-08 18:30:00', 8, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `valor` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `valor`) VALUES
(1, 'Chanel Makeup 5', 'Presentación mediana', 120.5),
(2, 'Chanel lipstick 6', 'Rojo', 75.12),
(3, 'Chanel eyes', 'Azul', 62.45),
(4, 'Chanel face', 'Powder', 110.25),
(5, 'Chanel hair', 'Verde', 32.7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservacion`
--

CREATE TABLE IF NOT EXISTS `reservacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime DEFAULT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_registro` int(11) DEFAULT NULL,
  `usuario_cancelacion` int(11) DEFAULT NULL,
  `usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_cambio` datetime DEFAULT NULL,
  `fecha_cancelacion` datetime DEFAULT NULL,
  `HORARIO_id` int(11) NOT NULL,
  `token_creacion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_RESERVACION_HORARIO1_idx` (`HORARIO_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `reservacion`
--

INSERT INTO `reservacion` (`id`, `fecha`, `nombre`, `apellido`, `email`, `telefono`, `estado`, `usuario_registro`, `usuario_cancelacion`, `usuario_modificacion`, `fecha_cambio`, `fecha_cancelacion`, `HORARIO_id`, `token_creacion`) VALUES
(1, '2019-07-27 22:50:08', 'Miguel', 'Rangel', 'mikeven@gmail.com', '7856525', 'cancelada', NULL, NULL, NULL, NULL, '2019-07-27 23:43:31', 2, '66c59004970d2f0d502f3a6818e2b82fde6d79b4'),
(2, '2019-07-27 23:59:02', 'Miguel', 'Rangel', 'mikeven@gmail.com', '23423423423', 'pendiente', NULL, NULL, NULL, NULL, NULL, 8, '3de1c9d45c3810cba866dc9b03eb948e3f189550');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `password` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ultimo_ingreso` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `email`, `password`, `ultimo_ingreso`) VALUES
(1, 'Miguel ', 'Rangel', 'mikeven@gmail.com', '1212', '2019-07-28 15:18:44');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `fk_COMPRA_PRODUCTO1` FOREIGN KEY (`PRODUCTO_id`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_COMPRA_RESERVACION1` FOREIGN KEY (`RESERVACION_id`) REFERENCES `reservacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `fk_HORARIO_ACTIVIDAD` FOREIGN KEY (`ACTIVIDAD_id`) REFERENCES `actividad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reservacion`
--
ALTER TABLE `reservacion`
  ADD CONSTRAINT `fk_RESERVACION_HORARIO1` FOREIGN KEY (`HORARIO_id`) REFERENCES `horario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
