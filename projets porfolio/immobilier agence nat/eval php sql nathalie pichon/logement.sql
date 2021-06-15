-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 02 juin 2020 à 14:45
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `immobilier`
--

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

DROP TABLE IF EXISTS `logement`;
CREATE TABLE IF NOT EXISTS `logement` (
  `id_logement` int(11) NOT NULL,
  `titre` varchar(45) NOT NULL,
  `adresse` varchar(45) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `cp` varchar(5) NOT NULL,
  `surface` int(4) NOT NULL,
  `prix` int(12) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `type` enum('location','vente') NOT NULL,
  `description` longtext NOT NULL,
  PRIMARY KEY (`id_logement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `logement`
--

INSERT INTO `logement` (`id_logement`, `titre`, `adresse`, `ville`, `cp`, `surface`, `prix`, `photo`, `type`, `description`) VALUES
(1, 'Studio  35 m²', 'Rue Monge', 'Paris 5', '75005', 35, 250000, 'http://localhost/evaluation/photo/appartement-studio-paris-vente-1579358754-VA2396_6_l.jpg', 'vente', 'AU CŒUR DE QUARTIER LATIN JOLI STUDIO AU CALME SITUE DANS UNE VOIE EN IMPASSE SEJOUR COIN CUISINE\r\nEMPLACEMENT DE PARKING EN SOUS-SOL\r\nMandat N° 2121. Honoraires à la charge du vendeur. Dans une copropriété. Aucune procédure n\'est en cours.\r\nPièces	1\r\nSalle d\'eau	1\r\nWC	1\r\nÉtage	2\r\nEpoque, année	1980\r\nÉtat général	En bon état\r\nChauffage	Electrique\r\nIndividuel\r\nCuisine	Aménagée\r\nStationnement int.	1   sous-sol\r\nAscenseur	Non\r\nCave	Non\r\nPiscine	Non\r\nTaxe foncière	629 €/an\r\nTaxe d\'habitation	490 €/an');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
