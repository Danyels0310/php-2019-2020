- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 16-01-2020 a las 12:04:37
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- 
-- Base de datos: `empleadosnn`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `departamento`
-- 

CREATE TABLE IF NOT EXISTS `departamento` (
`cod_dpto` varchar(4) NOT NULL DEFAULT '',
`nombre_dpto` varchar(40) DEFAULT NULL,
PRIMARY KEY (`cod_dpto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Volcado de datos para la tabla `departamento`
-- 

INSERT INTO `departamento` (`cod_dpto`, `nombre_dpto`) VALUES
('D004', 'PENSIONES'),
('D005', 'GAMMER');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `empleado`
-- 

CREATE TABLE IF NOT EXISTS `empleado` (
`dni` varchar(9) NOT NULL DEFAULT '',
`nombre` varchar(40) DEFAULT NULL,
`apellidos` varchar(40) DEFAULT NULL,
`fecha_nac` date DEFAULT NULL,
`salario` double DEFAULT NULL,
PRIMARY KEY (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Volcado de datos para la tabla `empleado`
-- 

INSERT INTO `empleado` (`dni`, `nombre`, `apellidos`, `fecha_nac`, `salario`) VALUES
('51111112N', 'IZHAR', 'ARIAS', '2020-01-22', 10000),
('51111113N', 'IZHAR', 'ARIAS', '2020-01-22', 10000),
('51111114N', 'IZHAR', 'ARIAS', '2020-01-22', 10000),
('51111115N', 'IZHAR', 'ARIAS', '2020-01-22', 10000),
('51111116N', 'IZHAR', 'ARIAS', '2020-01-14', 10000),
('51111214N', 'Izhar', 'Arias', '2004-01-20', 10000);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `empleado_dpto`
-- 

CREATE TABLE IF NOT EXISTS `empleado_dpto` (
`dni` varchar(9) NOT NULL DEFAULT '',
`cod_dpto` varchar(4) NOT NULL DEFAULT '',
`fecha_inic` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
`fecha_fin` datetime DEFAULT NULL,
PRIMARY KEY (`dni`,`cod_dpto`,`fecha_inic`),
KEY `fk_departamento` (`cod_dpto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Volcado de datos para la tabla `empleado_dpto`
-- 

INSERT INTO `empleado_dpto` (`dni`, `cod_dpto`, `fecha_inic`, `fecha_fin`) VALUES
('51111112N', 'D004', '2020-01-13 00:00:00', '0000-00-00 00:00:00'),
('51111112N', 'D005', '2010-10-10 00:00:00', '0000-00-00 00:00:00'),
('51111112N', 'D005', '2020-01-13 00:00:00', '0000-00-00 00:00:00'),
('51111113N', 'D004', '2020-01-13 00:00:00', '0000-00-00 00:00:00'),
('51111113N', 'D005', '2020-01-13 00:00:00', '0000-00-00 00:00:00'),
('51111115N', 'D004', '2020-01-10 00:00:00', '0000-00-00 00:00:00'),
('51111115N', 'D005', '2020-01-13 00:00:00', '0000-00-00 00:00:00'),
('51111116N', 'D004', '0000-00-00 00:00:00', '2020-01-13 00:00:00'),
('51111116N', 'D004', '2020-01-13 00:00:00', '0000-00-00 00:00:00'),
('51111116N', 'D005', '2020-01-13 00:00:00', '0000-00-00 00:00:00'),
('51111214N', 'D004', '2020-01-13 00:00:00', '2020-01-13 00:00:00'),
('51111214N', 'D005', '2020-01-13 00:00:00', '2019-01-13 00:00:00');

-- 
-- Restricciones para tablas volcadas
-- 

-- 
-- Filtros para la tabla `empleado_dpto`
-- 
ALTER TABLE `empleado_dpto`
ADD CONSTRAINT `fk_departamento` FOREIGN KEY (`cod_dpto`) REFERENCES `departamento` (`cod_dpto`),
ADD CONSTRAINT `fk_empreado` FOREIGN KEY (`dni`) REFERENCES `empleado` (`dni`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */; 
