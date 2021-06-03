-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2021 a las 03:12:11
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
(1, '123', '2021-07-16 00:00:00', '2021-05-28 02:43:51', 'activo', 'AHO'),
(34, '1622250656', '2021-05-29 00:00:00', '2021-05-29 04:00:00', 'activo', 'AHO'),
(35, '1622250701', '2021-05-29 00:00:00', '2021-05-29 04:00:00', 'activo', 'AHO'),
(36, '1622250705', '2021-05-29 00:00:00', '2021-05-29 04:00:00', 'activo', 'AHO'),
(37, '1622250815', '2021-05-29 00:00:00', '2021-05-29 04:00:00', 'activo', 'AHO'),
(38, '1622251378', '2021-05-29 00:00:00', '2021-05-29 04:00:00', 'activo', 'AHO'),
(39, '1622251380', '2021-05-29 00:00:00', '2021-05-29 04:00:00', 'activo', 'AHO'),
(40, '1622251396', '2021-05-29 00:00:00', '2021-05-29 04:00:00', 'activo', 'AHO'),
(41, '1622252223', '2021-05-29 00:00:00', '2021-05-29 04:00:00', 'activo', 'AHO'),
(42, '1622252617', '2021-05-29 00:00:00', '2021-05-29 04:00:00', 'activo', 'AHO'),
(43, '1622254568', '2021-05-29 00:00:00', '2021-05-29 04:00:00', 'activo', 'AHO'),
(44, '1622254570', '2021-05-29 00:00:00', '2021-05-29 04:00:00', 'activo', 'AHO'),
(45, '1622254654', '2021-05-29 00:00:00', '2021-05-29 04:00:00', 'activo', 'AHO'),
(46, '1622254658', '2021-05-29 00:00:00', '2021-05-29 04:00:00', 'activo', 'AHO'),
(47, '1622260529', '0000-00-00 00:00:00', '2021-05-29 09:55:29', 'activo', 'AHO'),
(48, '1622260588', '2022-01-02 00:00:00', '2021-05-29 09:56:28', 'activo', 'AHO'),
(49, '1622260696', '2022-01-02 00:00:00', '2021-05-29 09:58:16', 'activo', 'AHO'),
(50, '1622260699', '2022-01-02 00:00:00', '2021-05-29 09:58:19', 'activo', 'AHO'),
(51, '1622260718', '2022-01-02 00:00:00', '2021-05-29 09:58:38', 'activo', 'AHO'),
(52, '1622260734', '2022-01-02 00:00:00', '2021-05-29 09:58:54', 'activo', 'AHO'),
(53, '1622261688', '2022-01-02 00:00:00', '2021-05-29 10:14:48', 'activo', 'AHO'),
(54, '1622261713', '2022-01-02 00:00:00', '2021-05-29 10:15:13', 'activo', 'AHO'),
(55, '1622261888', '2022-01-02 00:00:00', '2021-05-29 10:18:08', 'activo', 'AHO'),
(56, '1622262062', '2022-01-02 00:00:00', '2021-05-29 10:21:02', 'activo', 'AHO'),
(57, '1622262981', '2022-01-02 00:00:00', '2021-05-29 10:36:21', 'activo', 'AHO'),
(58, '1622263568', '2022-01-02 00:00:00', '2021-05-29 10:46:08', 'activo', 'AHO'),
(59, '1622306636', '2022-01-02 00:00:00', '2021-05-29 22:43:56', 'activo', 'AHO');

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
(4, '2021-05-27', '36:00:00', 100, 'retiro', 'realizado', 1, 'BS', NULL),
(5, '2021-05-20', '00:28:00', 200, 'retiro', 'en_proceso', 1, 'BS', NULL),
(6, '2021-05-29', '06:21:53', 500.5, 'depocito', 'realizado', 1, 'BS', 0),
(7, '2021-05-29', '06:22:17', 500.5, 'depocito', 'realizado', 1, 'BS', 0),
(8, '2021-05-29', '06:22:20', 500.5, 'depocito', 'realizado', 1, 'BS', 0),
(9, '2021-05-29', '06:22:26', 50.5, 'depocito', 'realizado', 1, 'BS', 0),
(10, '2021-05-29', '06:22:47', 1000, 'retiro', 'realizado', 1, 'BS', 0),
(12, '2021-05-29', '06:29:50', 1000, 'depocito', 'realizado', 40, 'BS', 0),
(13, '2021-05-29', '06:30:20', 500, 'depocito', 'realizado', 40, 'BS', 0),
(14, '2021-05-29', '06:31:02', 500, 'retiro', 'realizado', 40, 'BS', 0),
(16, '2021-05-29', '06:37:05', 500, 'depocito', 'realizado', 57, 'BS', 0),
(17, '2021-05-29', '06:38:12', 50, 'retiro', 'realizado', 57, 'BS', 0),
(18, '2021-05-29', '06:46:16', 500, 'depocito', 'realizado', 58, 'BS', 0);

-- --------------------------------------------------------

--
-- Estructura para la vista `listadocuenta`
--
DROP TABLE IF EXISTS `listadocuenta`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `listadocuenta`  AS  select `transacciones`.`idcuenta` AS `idcuenta`,`transacciones`.`tipo` AS `tipo`,sum(`transacciones`.`monto`) AS `monto` from `transacciones` group by `transacciones`.`idcuenta`,`transacciones`.`tipo` ;

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
  MODIFY `idcuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  MODIFY `idtransacciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
