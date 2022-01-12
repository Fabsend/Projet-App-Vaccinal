-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 10, 2022 at 10:22 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mon_carnet`
--

-- --------------------------------------------------------

--
-- Table structure for table `type_vaccin`
--

CREATE TABLE `type_vaccin` (
  `nom_vaccin` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type_vaccin`
--

INSERT INTO `type_vaccin` (`nom_vaccin`, `id`) VALUES
('Covid-19 BioNTech/Pfizer', 1),
('Covid-19 Moderna', 2),
('Covid-19 AstraZeneca', 3),
('Covid-19 Johnson&Johnson', 4),
('Coqueluche DTCaPolio', 5),
('Rougeole/Rubéole/Oreillons Priorix', 6),
('Rougeole/Rubéole/Oreillons Rvaxpro', 7),
('Pneumocoque Prevenar 13', 8),
('Pneumocoque Pneumovax', 9),
('Méningocoque C Menjugate', 10),
('Méningocoque C Neisvac', 11),
('Méningocoque C Menveo', 12),
('Haemophilus Hexyon', 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `type_vaccin`
--
ALTER TABLE `type_vaccin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `type_vaccin`
--
ALTER TABLE `type_vaccin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
