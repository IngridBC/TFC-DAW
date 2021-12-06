-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2021 a las 22:12:54
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `food-bakery`
--
CREATE DATABASE IF NOT EXISTS `food-bakery` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `food-bakery`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(1, 'Panes', 'Food_category_61.jpg', 'Yes', 'Yes'),
(2, 'Dulces', 'Food_category_54.jpg', 'Yes', 'Yes'),
(3, 'Salados', 'Food_category_26.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_food`
--

DROP TABLE IF EXISTS `tbl_food`;
CREATE TABLE IF NOT EXISTS `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(1, 'Tarta de chocolate', 'Tarta de chocolate con relleno de trufas, crema chantilly y frutos del bosque.', '13.00', '', 2, 'No', 'No'),
(2, 'Pan de sesamo', 'Pan de trigo con masa madre y semillas de sésamo.', '5.00', 'Food_name_23.jpg', 1, 'Yes', 'Yes'),
(3, 'Pan de leña', 'Pan hecho con harina integral, agua, sal y levadura madre.', '2.00', 'Food_name_47.jpg', 1, 'Yes', 'No'),
(4, 'Pan de Trenza', 'Pan hecho con harina de trigo, semillas de sésamo, agua, sal y levadura madre', '2.00', 'Food_name_84.jpg', 1, 'Yes', 'Yes'),
(5, 'Baguette trigo', 'Barra de pan hecha con harina de trigo, agua, sal y masa madre.', '1.00', 'Food_name_32.jpg', 1, 'Yes', 'Yes'),
(6, 'Baguette Integral', 'Barra de pan hecha con harina integral, agua, sal y masa madre.', '1.00', 'Food_name_80.jpg', 1, 'Yes', 'Yes'),
(7, 'Rosca', 'Rosca de pan hecha con harina de trigo, agua, sal, queso y masa madre.', '2.00', 'Food_name_82.jpg', 1, 'Yes', 'Yes'),
(8, 'Chapata', 'Pan hecho con harina de trigo, agua, sal y masa madre.', '1.00', '', 1, 'No', 'No'),
(9, 'Pan de ajo', 'Panecillos hechos con harina de trigo, agua, sal, ajo, mantequilla y un toque de perjil.', '1.00', 'Food_name_50.jpg', 1, 'Yes', 'Yes'),
(10, 'Magdalenas clásicas', 'Magdalenas hechas con harina de trigo, levadura, azúcar moreno y yogur.', '1.00', 'Food_name_1.jpg', 2, 'Yes', 'Yes'),
(11, 'Magdalenas de Chocolate', 'Magdalenas hechas con harina de trigo, levadura, azúcar moreno, mantequilla y cacao. Pack3', '2.00', 'Food_name_12.jpg', 2, 'Yes', 'Yes'),
(12, 'Magdalenas de arándanos', 'Magdalenas hechas con harina de trigo, levadura, azúcar moreno, yogur y arándanos. Pack 3', '2.00', 'Food_name_27.jpg', 2, 'Yes', 'Yes'),
(13, 'Croissants clásicos', 'Croissants hechos con harina de trigo, levadura, azúcar moreno y mantequilla. Pack 3.', '1.00', 'Food_name_65.jpg', 2, 'Yes', 'Yes'),
(14, 'Croissants de chocolate', 'Croissants hechos con harina de trigo, levadura, azúcar moreno, mantequilla y relleno de cacao. Pack 3.', '2.00', 'Food_name_55.jpg', 2, 'Yes', 'Yes'),
(15, 'Palmeritas', 'Palmeritas hechas con hojaldre, azúcar moreno y mantequilla. Pack 5.', '1.00', '', 2, 'No', 'No'),
(16, 'Napolitanas Chocolate', 'Napolitanas hechos con harina de trigo, levadura, azúcar moreno, mantequilla y cacao.', '1.00', '', 2, 'No', 'No'),
(22, 'Donut clásico', 'Rosquilla hecha con harina de trigo, agua, azúcar moreno, mantequilla y masa madre.', '1.00', 'Food_name_18.jpg', 2, 'Yes', 'Yes'),
(23, 'Emparedado de pollo', 'Emparedado de pollo, queso gouda, lechuga, tomate y aderezo.', '4.00', 'Food_name_16.jpg', 3, 'Yes', 'Yes'),
(24, 'Emparedado vegetal', 'Emparedado con aguacate, cebolla, tomate, lechuga, pepino y aderezo.', '3.00', 'Food_name_71.jpg', 1, 'Yes', 'Yes'),
(25, 'Emparedado de queso', 'Emparedado de queso de vabra, berros, aderezo melocotón.', '4.00', 'Food_name_2.jpg', 1, 'Yes', 'Yes'),
(26, 'Emparedado Mediterráneo', 'Emparedado de queso curado, jamón serrano, tomate, y rúcula.', '4.00', 'Food_name_40.jpg', 1, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_order`
--

DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE IF NOT EXISTS `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_adress` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_adress`) VALUES
(8, 'Pan de sesamo', '5', 1, '5.00', '2021-12-06 06:00:56', 'Ordered', 'ALBERTO RODRIGUEZ TARRAGA', '974794049', 'arodriguezta@aguasdejumilla.es', 'Av las retamas 20 piso 4B, Alcorcon'),
(9, 'Emparedado de queso', '4', 3, '12.00', '2021-12-06 06:04:07', 'Ordered', 'Cristina Muñoz', '974794049', 'Cristina@yahoo.es', 'Calle Francisco Lara 10, 1D, Madrid');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
