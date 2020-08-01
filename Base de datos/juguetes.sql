-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 01, 2020 at 08:06 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `juguetes`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `proc_get_gen`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_get_gen` (IN `gen` VARCHAR(100))  BEGIN
   SELECT Id, Nombre_del_producto, Precio, Descripcion FROM juguete WHERE genero=gen;
 END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `juguete`
--

DROP TABLE IF EXISTS `juguete`;
CREATE TABLE IF NOT EXISTS `juguete` (
  `Id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Genero` varchar(30) NOT NULL,
  `Nombre_del_producto` varchar(30) NOT NULL,
  `Precio` double(10,2) DEFAULT NULL,
  `Descripcion` varchar(60) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `juguete`
--

INSERT INTO `juguete` (`Id`, `Genero`, `Nombre_del_producto`, `Precio`, `Descripcion`) VALUES
(1, 'mujer', 'Mega casa Polly Pocket Mattel ', 1199.00, '¡Ponte tu gorra de fiesta y ven a la Mega Casa de Sorpresas '),
(2, 'mujer', 'Playset Cocinita', 959.00, 'Conviértete en el mejor chef.'),
(3, 'hombre', 'Juego de elementos de cocina', 496.68, 'Materiales de alta calidad'),
(4, 'hombre', 'Tapete Para Dibujar Con Agua', 297.95, 'Hecho de poliéster de alta calidad y nailon.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
