-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 04-06-2020 a las 15:12:51
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `veterinaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

DROP TABLE IF EXISTS `citas`;
CREATE TABLE IF NOT EXISTS `citas` (
  `Id_Cita` int(10) NOT NULL AUTO_INCREMENT,
  `Paciente` int(5) DEFAULT NULL,
  `Doctor` varchar(10) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Hora` varchar(5) DEFAULT NULL,
  `Estado` int(1) DEFAULT NULL,
  `Detalles` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Id_Cita`),
  KEY `FKDoctor` (`Doctor`),
  KEY `FKEstado1` (`Estado`),
  KEY `FKPaciente` (`Paciente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

DROP TABLE IF EXISTS `clases`;
CREATE TABLE IF NOT EXISTS `clases` (
  `Id_Clase` int(2) NOT NULL AUTO_INCREMENT,
  `Nombre_Clase` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Id_Clase`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clases`
--

INSERT INTO `clases` (`Id_Clase`, `Nombre_Clase`) VALUES
(3, 'perro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `Id_Cliente` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre_Cliente` varchar(40) DEFAULT NULL,
  `Apelido_Cliente` varchar(40) DEFAULT NULL,
  `Telefono` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`Id_Cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`Id_Cliente`, `Nombre_Cliente`, `Apelido_Cliente`, `Telefono`) VALUES
(3, 'Ana', 'Peréz', '72807537');

-- --------------------------------------------------------

----------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada_medicamentos`
--

DROP TABLE IF EXISTS `entrada_medicamentos`;
CREATE TABLE IF NOT EXISTS `entrada_medicamentos` (
  `Id_entrada` int(10) NOT NULL AUTO_INCREMENT,
  `Medicamento` int(5) DEFAULT NULL,
  `Cantidad` int(5) DEFAULT NULL,
  `Fecha_entrad` date DEFAULT NULL,
  PRIMARY KEY (`Id_entrada`),
  KEY `FKMdicamento` (`Medicamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

DROP TABLE IF EXISTS `estados`;
CREATE TABLE IF NOT EXISTS `estados` (
  `Id_Estado` int(1) NOT NULL AUTO_INCREMENT,
  `Estado` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Id_Estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_recetas`
--

DROP TABLE IF EXISTS `estados_recetas`;
CREATE TABLE IF NOT EXISTS `estados_recetas` (
  `Id_Estado` int(2) NOT NULL AUTO_INCREMENT,
  `Estado_receta` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Id_Estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente_mascota`
--

DROP TABLE IF EXISTS `expediente_mascota`;
CREATE TABLE IF NOT EXISTS `expediente_mascota` (
  `id_expendiente` int(50) NOT NULL AUTO_INCREMENT,
  `vacunas` varchar(50) DEFAULT NULL,
  `sintomas` varchar(50) DEFAULT NULL,
  `obervaciones` varchar(50) DEFAULT NULL,
  `consume_medicamento` varchar(50) DEFAULT NULL,
  `mascota_nombre` int(11) NOT NULL,
  PRIMARY KEY (`id_expendiente`),
  KEY `mascota_nombre` (`mascota_nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

DROP TABLE IF EXISTS `mascotas`;
CREATE TABLE IF NOT EXISTS `mascotas` (
  `Id_mascota` int(5) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(40) DEFAULT NULL,
  `Fecha_nacimiento` date DEFAULT NULL,
  `Raza` int(3) DEFAULT NULL,
  `Dueño` int(5) DEFAULT NULL,
  `Sexo` int(1) DEFAULT NULL,
  PRIMARY KEY (`Id_mascota`),
  KEY `FKSexo` (`Sexo`),
  KEY `FKRaza` (`Raza`),
  KEY `FKDueño` (`Dueño`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mascotas`
--

INSERT INTO `mascotas` (`Id_mascota`, `Nombre`, `Fecha_nacimiento`, `Raza`, `Dueño`, `Sexo`) VALUES
(7, 'firulais', '2000-05-28', 2, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

DROP TABLE IF EXISTS `medicamentos`;
CREATE TABLE IF NOT EXISTS `medicamentos` (
  `Id_Medicamento` int(5) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(40) DEFAULT NULL,
  `Detalles` varchar(40) DEFAULT NULL,
  `Minimo_Stock` int(2) DEFAULT NULL,
  PRIMARY KEY (`Id_Medicamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegios`
--

DROP TABLE IF EXISTS `privilegios`;
CREATE TABLE IF NOT EXISTS `privilegios` (
  `Id_Privilegios` int(2) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Id_Privilegios`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `razas`
--

DROP TABLE IF EXISTS `razas`;
CREATE TABLE IF NOT EXISTS `razas` (
  `Id_raza` int(3) NOT NULL AUTO_INCREMENT,
  `Raza` varchar(40) DEFAULT NULL,
  `Clase` int(2) DEFAULT NULL,
  PRIMARY KEY (`Id_raza`),
  KEY `FKId_Clases` (`Clase`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `razas`
--

INSERT INTO `razas` (`Id_raza`, `Raza`, `Clase`) VALUES
(2, 'pitbull', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas`
--

DROP TABLE IF EXISTS `recetas`;
CREATE TABLE IF NOT EXISTS `recetas` (
  `Id_recetas` int(10) NOT NULL AUTO_INCREMENT,
  `Cantidad` int(5) DEFAULT NULL,
  `Mascota` int(5) DEFAULT NULL,
  `Medicamento` int(5) DEFAULT NULL,
  `Estado` int(2) DEFAULT NULL,
  PRIMARY KEY (`Id_recetas`),
  KEY `FKMedicamento1` (`Medicamento`),
  KEY `FKEstado` (`Estado`),
  KEY `FKMascota` (`Mascota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexos`
--

DROP TABLE IF EXISTS `sexos`;
CREATE TABLE IF NOT EXISTS `sexos` (
  `Identificador` int(1) NOT NULL AUTO_INCREMENT,
  `sexo` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Identificador`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;


--
-- veterinaria.empleados definition

CREATE TABLE `empleados` (
  `DUI` varchar(10) NOT NULL,
  `Nombre_Empleado` varchar(40) DEFAULT NULL,
  `Apellido` varchar(40) DEFAULT NULL,
  `Priviliegios` int(2) DEFAULT NULL,
  `usuario` varchar(100) NOT NULL,
  `contrasenia` varchar(100) NOT NULL,
  PRIMARY KEY (`DUI`),
  KEY `FKPrivilegios` (`Priviliegios`),
  CONSTRAINT `FKPrivilegios` FOREIGN KEY (`Priviliegios`) REFERENCES `privilegios` (`Id_Privilegios`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- ----

--
-- Volcado de datos para la tabla `sexos`
--

INSERT INTO `sexos` (`Identificador`, `sexo`) VALUES
(3, 'masculino');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `FKDoctor` FOREIGN KEY (`Doctor`) REFERENCES `empleados` (`DUI`),
  ADD CONSTRAINT `FKEstado1` FOREIGN KEY (`Estado`) REFERENCES `estados` (`Id_Estado`),
  ADD CONSTRAINT `FKPaciente` FOREIGN KEY (`Paciente`) REFERENCES `mascotas` (`Id_mascota`);


-- Filtros para la tabla `entrada_medicamentos`
--
ALTER TABLE `entrada_medicamentos`
  ADD CONSTRAINT `FKMdicamento` FOREIGN KEY (`Medicamento`) REFERENCES `medicamentos` (`Id_Medicamento`);

--
-- Filtros para la tabla `expediente_mascota`
--
ALTER TABLE `expediente_mascota`
  ADD CONSTRAINT `expediente_mascota_ibfk_1` FOREIGN KEY (`mascota_nombre`) REFERENCES `mascotas` (`Id_mascota`);

--
-- Filtros para la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD CONSTRAINT `FKDueño` FOREIGN KEY (`Dueño`) REFERENCES `clientes` (`Id_Cliente`),
  ADD CONSTRAINT `FKRaza` FOREIGN KEY (`Raza`) REFERENCES `razas` (`Id_raza`),
  ADD CONSTRAINT `FKSexo` FOREIGN KEY (`Sexo`) REFERENCES `sexos` (`Identificador`);

--
-- Filtros para la tabla `razas`
--
ALTER TABLE `razas`
  ADD CONSTRAINT `FKId_Clases` FOREIGN KEY (`Clase`) REFERENCES `clases` (`Id_Clase`);

--
-- Filtros para la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD CONSTRAINT `FKEstado` FOREIGN KEY (`Estado`) REFERENCES `estados_recetas` (`Id_Estado`),
  ADD CONSTRAINT `FKMascota` FOREIGN KEY (`Mascota`) REFERENCES `mascotas` (`Id_mascota`),
  ADD CONSTRAINT `FKMedicamento1` FOREIGN KEY (`Medicamento`) REFERENCES `medicamentos` (`Id_Medicamento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
