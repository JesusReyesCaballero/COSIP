-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-04-2023 a las 00:12:16
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `COSIP`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', '2017-01-24 16:21:18', '08-12-2022 08:08:23 PM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `short` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `published` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `blog`
--

INSERT INTO `blog` (`id`, `title`, `autor`, `short`, `content`, `image`, `published`) VALUES
(1, 'Presentación de web CO&SIP', 'Jesus Reyes', 'Características de CO&SIP Y CO&SIP online shop', '<div>Hasta hoy día CO&amp;SIP se ha mantenido como una empresa que busca la satisfacción de sus clientes mediante la comunicación personal entre el cliente y la empresa. Pero con la llegada y el reciente crecimiento del comercio electrónico los clientes han optado por satisfacer sus necesidades por este medio, y es por eso que hoy se presenta al público la nueva web para CO&amp;SIP, que a primera vista es una web informativa donde entrará módulos de interés tales como:</div><div><ul><li><b>Acerca de la empresa</b></li><li><b>Catalogo de productos</b></li><li><b>Nuestra tienda online</b></li><li><b>Noticias</b></li><li><b>Contactarnos</b></li></ul></div><div><br></div><div>Pero esto no termina aquí porque dentro del modulo de tienda online tendrá todo lo necesario para comprar nuestros productos disponibles y tiene una gran variedad de opciones que van desde registrarse hasta realizar pagos por internet entre nuestras principales características se encuentran:</div><div><ul><li><b>Registro como cliente</b></li><li><b>Carrito de comprar</b></li><li><b>Vista detallada de productos</b></li><li><b>Pagos por internet mediante tarjetas de Crédito/Débito y Paypal</b></li></ul></div>                                                                                                    ', 'newCOSIP.png', '2022-12-12 03:47:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryDescription` longtext DEFAULT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`, `creationDate`, `updationDate`) VALUES
(1, 'Uniformes', 'Uniformes generales', '2022-12-08 20:09:49', '08-12-2022 08:01:59 PM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `paymentMethod` varchar(50) DEFAULT NULL,
  `orderStatus` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `userId`, `productId`, `quantity`, `orderDate`, `paymentMethod`, `orderStatus`) VALUES
(1, 1, '1', 1, '2022-12-14 06:28:58', '62M3248437743671K', 'Entregado'),
(3, 1, '3', 1, '2022-12-14 17:51:50', '98977265X79682021', 'Entregado'),
(5, 1, '2', 1, '2023-01-12 05:06:16', '7WJ40085N14178241', 'Entregado'),
(6, 1, '1', 1, '2023-02-26 21:10:47', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordertrackhistory`
--

CREATE TABLE `ordertrackhistory` (
  `id` int(11) NOT NULL,
  `orderId` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remark` mediumtext DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `ordertrackhistory`
--

INSERT INTO `ordertrackhistory` (`id`, `orderId`, `status`, `remark`, `postingDate`) VALUES
(1, 1, 'Entregado', 'pedido entregado', '2022-12-14 16:45:03'),
(2, 5, 'En proceso', 'En proceso de embalage', '2023-01-12 05:10:44'),
(3, 5, 'En camini', 'Su pedido ha sido entregado a paquetería. Pronto estará con usted.', '2023-01-12 05:11:42'),
(4, 5, 'En camini', 'Su pedido ha llego al centro de distribución mas cercano.', '2023-01-12 05:12:38'),
(5, 5, 'Entregado', 'Su pedido ha sido entregado. Gracias por su compra!', '2023-01-12 05:15:00'),
(6, 3, 'Entregado', 'entregado', '2023-01-12 05:15:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productreviews`
--

CREATE TABLE `productreviews` (
  `id` int(11) NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `quality` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `review` longtext DEFAULT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `productreviews`
--

INSERT INTO `productreviews` (`id`, `productId`, `quality`, `price`, `value`, `name`, `summary`, `review`, `reviewDate`) VALUES
(1, 2, 5, 5, 5, 'Jesus Reyes', 'Buen producto', 'Buen producto relación precio calidad', '2022-12-11 19:55:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `subCategory` int(11) DEFAULT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `productCompany` varchar(255) DEFAULT NULL,
  `productPrice` int(11) DEFAULT NULL,
  `productPriceBeforeDiscount` int(11) DEFAULT NULL,
  `productDescription` longtext DEFAULT NULL,
  `productImage1` varchar(255) DEFAULT NULL,
  `shippingCharge` int(11) DEFAULT NULL,
  `productAvailability` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `category`, `subCategory`, `productName`, `productCompany`, `productPrice`, `productPriceBeforeDiscount`, `productDescription`, `productImage1`, `shippingCharge`, `productAvailability`, `postingDate`, `updationDate`) VALUES
(1, 1, 2, 'Polo Adulto Negra', 'Generica', 115, 120, 'Playa tipo polo para adulto', 'pun_int1-min.jpg', 0, 'En Stock', '2022-12-09 14:30:51', NULL),
(2, 1, 1, 'Playera Blanca Polo', 'Generica', 115, 120, 'Playera blanca tipo polo escolar', 'poloniño.jpg', 0, 'En Stock', '2022-12-09 14:32:03', NULL),
(3, 1, 1, 'Jumper Marino Escolar', 'Generico', 180, 180, 'Jumper color azul marino', 'jumper.jpg', 0, 'En Stock', '2022-12-12 03:43:04', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryid`, `subcategory`, `creationDate`, `updationDate`) VALUES
(1, 1, 'Escolares', '2022-12-08 20:10:12', NULL),
(2, 1, 'Corpotativos', '2022-12-08 20:10:20', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `userlog`
--

INSERT INTO `userlog` (`id`, `userEmail`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 'jr588137@gmail.com', 0x3132372e302e302e3100000000000000, '2022-12-08 19:39:23', NULL, 0),
(2, 'jr588137@gmail.com', 0x3132372e302e302e3100000000000000, '2022-12-08 19:40:02', '08-12-2022 03:03:12 PM', 1),
(3, 'jr588137@gmail.com', 0x3132372e302e302e3100000000000000, '2022-12-08 20:09:04', NULL, 1),
(4, 'jr588137@gmail.com', 0x3132372e302e302e3100000000000000, '2022-12-08 22:56:12', NULL, 1),
(5, 'jr588137@gmail.com', 0x3132372e302e302e3100000000000000, '2022-12-08 23:33:00', '08-12-2022 06:54:53 PM', 1),
(6, 'jr588137@gmail.com', 0x3132372e302e302e3100000000000000, '2022-12-09 00:14:19', '08-12-2022 07:25:09 PM', 1),
(7, 'jr588137@gmail.com', 0x3132372e302e302e3100000000000000, '2022-12-09 00:25:27', '08-12-2022 07:27:56 PM', 1),
(8, 'jr588137@gmail.com', 0x3132372e302e302e3100000000000000, '2022-12-09 00:29:28', NULL, 1),
(9, 'jr588137@gmail.com', 0x3132372e302e302e3100000000000000, '2022-12-09 03:06:58', NULL, 1),
(10, 'jr588137@gmail.com', 0x3132372e302e302e3100000000000000, '2022-12-09 14:46:32', NULL, 1),
(11, 'jr588137@gmail.com', 0x3132372e302e302e3100000000000000, '2022-12-09 17:09:14', NULL, 1),
(12, 'jr588137@gmail.com', 0x3132372e302e302e3100000000000000, '2022-12-10 23:42:13', NULL, 1),
(13, 'jr588137@gmail.com', 0x3132372e302e302e3100000000000000, '2022-12-12 03:44:39', NULL, 1),
(14, 'jr588137@gmail.com', 0x3132372e302e302e3100000000000000, '2022-12-14 06:28:54', '14-12-2022 12:29:12 AM', 1),
(15, 'jr588137@gmail.com', 0x3132372e302e302e3100000000000000, '2022-12-14 06:32:13', '14-12-2022 12:32:42 AM', 1),
(16, 'jr588137@gmail.com', 0x3132372e302e302e3100000000000000, '2022-12-14 15:13:00', '14-12-2022 09:17:43 AM', 1),
(17, 'jr588137@gmail.com', 0x3132372e302e302e3100000000000000, '2022-12-14 15:40:44', NULL, 1),
(18, 'jr588137@gmail.com', 0x3132372e302e302e3100000000000000, '2022-12-14 17:44:45', NULL, 1),
(19, 'jr588137@gmail.com', 0x3132372e302e302e3100000000000000, '2022-12-29 02:19:46', NULL, 1),
(20, 'jr588137@gmail.com', 0x3132372e302e302e3100000000000000, '2023-01-12 05:05:50', NULL, 1),
(21, 'jr588137@gmail.com', 0x3132372e302e302e3100000000000000, '2023-01-12 05:07:48', NULL, 1),
(22, 'jr588137@gmail.com', 0x3132372e302e302e3100000000000000, '2023-02-18 01:04:16', NULL, 1),
(23, 'jr588137@gmail.com', 0x3132372e302e302e3100000000000000, '2023-02-26 21:09:30', NULL, 1),
(24, 'jr588137@gmail.com', 0x3132372e302e302e3100000000000000, '2023-03-20 05:43:12', NULL, 0),
(25, 'jr588137@gmail.com', 0x3132372e302e302e3100000000000000, '2023-03-20 05:43:28', '21-03-2023 08:25:52 PM', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `shippingAddress` longtext DEFAULT NULL,
  `shippingState` varchar(255) DEFAULT NULL,
  `shippingCity` varchar(255) DEFAULT NULL,
  `shippingPincode` int(11) DEFAULT NULL,
  `billingAddress` longtext DEFAULT NULL,
  `billingState` varchar(255) DEFAULT NULL,
  `billingCity` varchar(255) DEFAULT NULL,
  `billingPincode` int(11) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contactno`, `password`, `shippingAddress`, `shippingState`, `shippingCity`, `shippingPincode`, `billingAddress`, `billingState`, `billingCity`, `billingPincode`, `regDate`, `updationDate`) VALUES
(1, 'Jesus Reyes', 'jr588137@gmail.com', 9681512554, '6ad14ba9986e3615423dfca256d04e3f', '1ra Sur entre 11va y 12va Poniente S/N', 'Chiapas', 'Cintalapa', 30400, '1ra Sur entre 11va y 12va Poniente S/N', 'Chiapas', 'Cintalapa', 30400, '2022-12-08 19:39:56', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productreviews`
--
ALTER TABLE `productreviews`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `productreviews`
--
ALTER TABLE `productreviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
