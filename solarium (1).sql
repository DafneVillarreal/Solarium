-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-09-2024 a las 11:44:08
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `solarium`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `back_product`
--

CREATE TABLE `back_product` (
  `id_producto` int(11) NOT NULL,
  `Nombre` varchar(35) NOT NULL,
  `Precio` float NOT NULL,
  `Stock` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `back_vent`
--

CREATE TABLE `back_vent` (
  `id_venta` int(11) NOT NULL,
  `Fecha` datetime NOT NULL,
  `Total` float NOT NULL,
  `empleados_id_empleado` int(11) NOT NULL,
  `cliente_id_cliente` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `Nombre` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `Nombre` varchar(35) NOT NULL,
  `Ape_Paterno` varchar(35) NOT NULL,
  `Ape_Materno` varchar(35) DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  `Tel` bigint(20) NOT NULL,
  `Num_Dir` int(11) NOT NULL,
  `Calle_Dir` varchar(50) NOT NULL,
  `C_P_Dir` varchar(6) NOT NULL,
  `Col_Dir` varchar(45) NOT NULL,
  `Mun_Dir` varchar(50) NOT NULL,
  `Est_Dir` varchar(50) NOT NULL,
  `Tipo_Proyect` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(11) NOT NULL,
  `Nombre` varchar(35) NOT NULL,
  `Ape_Paterno` varchar(35) NOT NULL,
  `Ape_Materno` varchar(35) DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  `Tel` bigint(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `pass` varchar(30) NOT NULL,
  `token` varchar(101) DEFAULT NULL,
  `token_expira` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `Nombre`, `Ape_Paterno`, `Ape_Materno`, `Email`, `Tel`, `status`, `pass`, `token`, `token_expira`) VALUES
(3, 'Dafne', 'Villarreal', 'Hernandez', 'dafne.villarreal4369@alumnos.udg.mx', 366554545, 0, 'prueba123', 'a6aaa8e866dcc3d6986c1ab3a64db905dbef6c43d0bf287b5c55d6b6bcd1e99fd5ef27f137f7bdc4b14166d8cff11543eff4', '2024-09-09 02:59:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `Nombre` varchar(35) NOT NULL,
  `Precio` float NOT NULL,
  `Stock` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Disparadores `producto`
--
DELIMITER $$
CREATE TRIGGER `respaldo` AFTER INSERT ON `producto` FOR EACH ROW begin
  INSERT INTO back_product(Nombre,Precio,Stock,id_categoria,id_proveedor)
  VALUES(NEW.Nombre,NEW.Precio,NEW.Stock,NEW.id_categoria,NEW.id_proveedor);
 end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `Nombre` varchar(35) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Pag` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL,
  `Fecha` datetime NOT NULL,
  `Total` float NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_tiene_productos`
--

CREATE TABLE `venta_tiene_productos` (
  `id_venta_tiene_productos` int(11) NOT NULL,
  `Precio` float NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `back_product`
--
ALTER TABLE `back_product`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `fk_producto_categoria1_idx` (`id_categoria`),
  ADD KEY `fk_producto_proveedor1_idx` (`id_proveedor`);

--
-- Indices de la tabla `back_vent`
--
ALTER TABLE `back_vent`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `fk_venta_empleados1_idx` (`empleados_id_empleado`),
  ADD KEY `fk_venta_cliente1_idx` (`cliente_id_cliente`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `fk_producto_categoria1_idx` (`id_categoria`),
  ADD KEY `fk_producto_proveedor1_idx` (`id_proveedor`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `fk_venta_empleados1_idx` (`id_empleado`),
  ADD KEY `fk_venta_cliente1_idx` (`id_cliente`);

--
-- Indices de la tabla `venta_tiene_productos`
--
ALTER TABLE `venta_tiene_productos`
  ADD PRIMARY KEY (`id_venta_tiene_productos`),
  ADD KEY `fk_venta_tiene_productos_producto_idx` (`id_producto`),
  ADD KEY `fk_venta_tiene_productos_venta1_idx` (`id_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `back_product`
--
ALTER TABLE `back_product`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `back_vent`
--
ALTER TABLE `back_vent`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `venta_tiene_productos`
--
ALTER TABLE `venta_tiene_productos`
  MODIFY `id_venta_tiene_productos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
