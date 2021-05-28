-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-05-2021 a las 04:51:54
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cuentas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE `cuentas` (
  `idcuenta` int(11) NOT NULL,
  `numerocuenta` varchar(45) NOT NULL,
  `vencimiento` datetime NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` enum('activo','bloqueado') DEFAULT NULL,
  `tipo` enum('AHO','CORR') DEFAULT 'AHO'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`idcuenta`, `numerocuenta`, `vencimiento`, `created`, `estado`, `tipo`) VALUES
(1, '123', '2021-07-16 00:00:00', '2021-05-28 02:43:51', 'activo', 'AHO');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `listadocuenta`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `listadocuenta` (
`idcuenta` int(11)
,`tipo` enum('retiro','depocito')
,`monto` double
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transacciones`
--

CREATE TABLE `transacciones` (
  `idtransacciones` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `monto` double NOT NULL,
  `tipo` enum('retiro','depocito') NOT NULL,
  `estado` enum('en_proceso','realizado','no_realizado') NOT NULL,
  `idcuenta` int(11) NOT NULL,
  `tipomoneda` enum('USD','BS') DEFAULT NULL,
  `cambio` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `transacciones`
--

INSERT INTO `transacciones` (`idtransacciones`, `fecha`, `hora`, `monto`, `tipo`, `estado`, `idcuenta`, `tipomoneda`, `cambio`) VALUES
(1, '2021-05-27', '25:19:15', 200, 'depocito', 'realizado', 1, 'BS', NULL),
(2, '2021-05-27', '25:19:15', 500, 'depocito', 'realizado', 1, 'BS', NULL),
(3, '2021-05-27', '25:19:15', 300, 'depocito', 'realizado', 1, 'BS', NULL),
(4, '2021-05-27', '36:00:00', 100, 'retiro', 'realizado', 1, 'BS', NULL);

-- --------------------------------------------------------

--
-- Estructura para la vista `listadocuenta`
--
DROP TABLE IF EXISTS `listadocuenta`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `listadocuenta`  AS  select `transacciones`.`idcuenta` AS `idcuenta`,`transacciones`.`tipo` AS `tipo`,sum(`transacciones`.`monto`) AS `monto` from `transacciones` group by `transacciones`.`tipo` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`idcuenta`);

--
-- Indices de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  ADD PRIMARY KEY (`idtransacciones`),
  ADD KEY `fk_transacciones_cuentas` (`idcuenta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  MODIFY `idcuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  MODIFY `idtransacciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `transacciones`
--
ALTER TABLE `transacciones`
  ADD CONSTRAINT `fk_transacciones_cuentas` FOREIGN KEY (`idcuenta`) REFERENCES `cuentas` (`idcuenta`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
