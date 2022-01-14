-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 13 jan. 2022 à 19:44
-- Version du serveur :  5.7.24
-- Version de PHP : 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mon_carnet`
--

-- --------------------------------------------------------

--
-- Structure de la table `type_vaccin`
--

CREATE TABLE `type_vaccin` (
  `nom_vaccin` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_vaccin`
--

INSERT INTO `type_vaccin` (`nom_vaccin`, `id`) VALUES
('Covid-20 BioNTech/Pfizer', 1),
('Covid-19 Moderna', 2),
('Covid-19 AstraZeneca', 3),
('Covid-19 Johnson&Johnson', 4),
('Coqueluche DTCaPolio', 5),
('Rougeole/Rubéole/Oreillons Priorix', 6),
('Rougeole/Rubéole/Oreillons Rvaxpro', 7),
('Pneumocoque Prevenar 12', 8),
('Pneumocoque Pneumovax', 9),
('Méningocoque C Menjugate', 10),
('Méningocoque C Neisvac', 11),
('Méningocoque C Menveo', 12),
('Haemophilus Hexyon', 13);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `prenom` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` varchar(30) NOT NULL,
  `id` int(11) NOT NULL,
  `date_de_naissance` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`prenom`, `nom`, `email`, `password`, `role`, `id`, `date_de_naissance`) VALUES
('Michele', 'Dupond', 'Michel@gmail.com', 'azerty', 'user', 1, '1970-05-05'),
('Durant', 'Robert', 'robert@gmail.com', '1234', 'user', 7, '1980-12-12'),
('admin', 'admin', 'admin@admin.com', '1234', 'admin', 8, '2000-12-12'),
('Luc', 'Boulanger', 'luc.boulanger98@gmail.com', '1234', 'user', 11, '1998-07-17'),
('Martin', 'Boulanger', 'martin.boulanger@gmail.com', '1234', 'user', 14, '1212-12-12'),
('Luc', 'Duchemin', 'luc.duchemin@gmail.com', '1234', 'user', 15, '2004-12-12'),
('Celestin', 'Bocquet', 'celestin@gmail.com', '1234', 'user', 16, '1995-12-17'),
('Troluck', 'Boulanger', 'troluck@gmail.com', '1234', 'user', 17, '1998-07-17');

-- --------------------------------------------------------

--
-- Structure de la table `vaccin`
--

CREATE TABLE `vaccin` (
  `nomvaccin` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `idvaccin` int(11) NOT NULL,
  `utilisateur_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vaccin`
--

INSERT INTO `vaccin` (`nomvaccin`, `date`, `idvaccin`, `utilisateur_id`) VALUES
('Pneumocoque Prevenar 13', '1982-10-10', 31, 1),
('Covid-19 BioNTech/Pfizer', '2010-12-12', 76, 7),
('Covid-19 Moderna', '1515-12-15', 96, 6),
('Covid-19 Moderna', '1212-12-12', 97, 9),
('Covid-19 AstraZeneca', '1515-12-15', 98, 11),
('Covid-19 Johnson&Johnson', '2001-12-12', 99, 11),
('Covid-19 AstraZeneca', '1212-12-12', 100, 11),
('Hépatite B', '2001-10-10', 101, 16),
('Covid-19 AstraZeneca', '1212-12-12', 103, 11),
('Covid-19 AstraZeneca', '2001-12-12', 104, 14),
('Haemophilus Hexyon', '2001-12-12', 108, 14),
('Méningocoque C Menjugate', '2023-12-12', 111, 17),
('Covid-19 Moderna', '2021-12-12', 112, 17),
('Coqueluche DTCaPolio', '2025-12-15', 113, 17);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `type_vaccin`
--
ALTER TABLE `type_vaccin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vaccin`
--
ALTER TABLE `vaccin`
  ADD PRIMARY KEY (`idvaccin`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `type_vaccin`
--
ALTER TABLE `type_vaccin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `vaccin`
--
ALTER TABLE `vaccin`
  MODIFY `idvaccin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
