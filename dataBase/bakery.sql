-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2022 a las 13:59:48
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bakery`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(20) NOT NULL,
  `nombre_cliente` varchar(50) NOT NULL,
  `celular_cliente` varchar(10) NOT NULL,
  `direccion_cliente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre_cliente`, `celular_cliente`, `direccion_cliente`) VALUES
(111, 'pepito', '222', 'comfenalco'),
(123, 'havyerr', '3144545940', 'comfenalco'),
(222, 'Julian', '3211', 'comfenalco'),
(231, 'Daniela', '4322', 'comfenalco'),
(323, 'Paula', '63737', 'Sena'),
(1111, 'elpajas', '2222', 'comfenalco'),
(1122, 'duvan', '3144545940', 'casa club'),
(10102, 'zzzzz', '3333', 'senatolina'),
(12233, 'sara', '3333', 'comfenalco'),
(12344, 'sofia ', '3333', 'casa club'),
(100789, 'santiago', '3333', 'centro'),
(112233, 'juan david', '3203', 'comfenalco'),
(122334, 'sara sofia', '3144545940', 'centro'),
(1222233, 'camila', '3333', 'comfenalco'),
(1223344, 'nelly', '3203', 'centro'),
(1237896, 'kevin', '3144545940', 'comfenalco'),
(1005718041, 'david baez', '3222708655', 'mz 85 casa 12 barrio madelia 1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `nit_proveedor` int(11) NOT NULL,
  `producto` varchar(45) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `valor_unitario` int(11) NOT NULL,
  `valor_total` int(11) NOT NULL,
  `totalCompra` int(11) NOT NULL,
  `fecha_hora_compra` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`nit_proveedor`, `producto`, `cantidad`, `valor_unitario`, `valor_total`, `totalCompra`, `fecha_hora_compra`) VALUES
(1, 'aja', 3, 1500, 4500, 14500, '2022-12-05'),
(1, 'stupid', 10, 1000, 10000, 14500, '2022-12-05'),
(1, 'pan salado', 100, 2500, 250000, 5000, '2022-12-07'),
(1, 'pan italiano', 100000000, 2500, 250000, 14500, '2022-12-07'),
(1, 'pan crema', 2, 2500, 5000, 5000, '2022-12-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` varchar(50) DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `total` int(20) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `id_cliente` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id_factura`, `fecha_hora`, `total`, `estado`, `id_cliente`) VALUES
('FSE1J', '2022-12-02 16:59:09', 600, 'pagado', 231),
('VW046', '2022-12-07 01:48:07', 20000, 'pagado', 123),
('47U3F', '2022-12-07 01:56:15', 4500, 'pagado', 111),
('29PZI', '2022-12-07 01:57:23', 1800, 'pagado', 222);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_productos`
--

CREATE TABLE `inventario_productos` (
  `id_producto` varchar(50) DEFAULT NULL,
  `producto` varchar(50) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `fechar_caducidad` date DEFAULT NULL,
  `cantidad` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inventario_productos`
--

INSERT INTO `inventario_productos` (`id_producto`, `producto`, `fecha_creacion`, `fechar_caducidad`, `cantidad`) VALUES
('0000', 'baguette de huevo', '2022-11-03', '2022-11-04', 10),
('0001', 'pan italiano', '2022-11-03', '2022-11-04', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `nit_proveedor` int(11) NOT NULL,
  `nombre_proveedor` varchar(30) NOT NULL,
  `telefono_proveedor` varchar(10) NOT NULL,
  `direccion_proveedor` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`nit_proveedor`, `nombre_proveedor`, `telefono_proveedor`, `direccion_proveedor`) VALUES
(1, 'coca cola', '3213133', 'casa club dos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_ventas`
--

CREATE TABLE `registro_ventas` (
  `id_cliente` int(20) DEFAULT NULL,
  `nombre_producto` varchar(50) DEFAULT NULL,
  `cantidad_producto` int(20) DEFAULT NULL,
  `descuento` int(20) DEFAULT NULL,
  `precio_unidad` int(20) DEFAULT NULL,
  `precio_total_por_producto` int(20) DEFAULT NULL,
  `sub_total` int(20) DEFAULT NULL,
  `total_por_pagar` int(20) DEFAULT NULL,
  `fecha_hora_venta` datetime DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `id_factura` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registro_ventas`
--

INSERT INTO `registro_ventas` (`id_cliente`, `nombre_producto`, `cantidad_producto`, `descuento`, `precio_unidad`, `precio_total_por_producto`, `sub_total`, `total_por_pagar`, `fecha_hora_venta`, `estado`, `id_factura`) VALUES
(1005718041, 'hojaldra de crema', 10, 0, 2500, 25000, 33000, 33000, '2022-10-21 02:08:19', 'no pagado', '1F9G2'),
(1005718041, 'pan dulce', 20, 0, 400, 8000, 33000, 33000, '2022-10-21 02:08:19', 'no pagado', '1F9G2'),
(231, 'pan dulce', 2, 0, 300, 600, 600, 600, '2022-12-02 16:59:09', 'pagado', 'FSE1J'),
(123, 'pan italiano', 10, 0, 2000, 20000, 20000, 20000, '2022-12-07 01:48:07', 'pagado', 'VW046'),
(111, 'pan italiano', 5, 10, 1000, 5000, 5000, 4500, '2022-12-07 01:56:15', 'pagado', '47U3F'),
(222, 'pan italiano', 2, 10, 1000, 2000, 2000, 1800, '2022-12-07 01:57:23', 'pagado', '29PZI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_nomina` int(11) NOT NULL,
  `rol` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `contraseña` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_nomina`, `rol`, `usuario`, `contraseña`) VALUES
(1, 1, 'Duvan', '123'),
(1111111, 2, 'simona', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `id_producto` varchar(50) DEFAULT NULL,
  `cantidad` int(50) DEFAULT NULL,
  `stock` int(50) DEFAULT NULL,
  `fecha_revision_inventario` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `stock`
--

INSERT INTO `stock` (`id_producto`, `cantidad`, `stock`, `fecha_revision_inventario`) VALUES
('0000', 10, 7, '2022-11-09'),
('0000', 10, 7, '2022-11-09'),
('0000', 10, 7, '2022-11-09'),
('0001', 20, 20, '2022-11-09'),
('0001', 20, 20, '2022-11-09'),
('0000', 10, 7, '2022-11-09'),
('0000', 10, 7, '2022-11-30'),
('0001', 20, 20, '2022-11-30'),
('0001', 20, 20, '2022-12-01'),
('0001', 20, 20, '2022-12-01'),
('0001', 20, 10, '2022-12-01'),
('0000', 10, 10, '2022-12-01'),
('0000', 10, 10, '2022-12-02'),
('0000', 10, 10, '2022-12-02');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`nit_proveedor`);

--
-- Indices de la tabla `registro_ventas`
--
ALTER TABLE `registro_ventas`
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_nomina`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);

--
-- Filtros para la tabla `registro_ventas`
--
ALTER TABLE `registro_ventas`
  ADD CONSTRAINT `registro_ventas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
