-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 06 août 2018 à 19:11
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mini_chat`
--

-- --------------------------------------------------------

--
-- Structure de la table `mini_chat`
--

DROP TABLE IF EXISTS `mini_chat`;
CREATE TABLE IF NOT EXISTS `mini_chat` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `pseudonyme` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date_message` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `mini_chat`
--

INSERT INTO `mini_chat` (`ID`, `pseudonyme`, `message`, `date_message`) VALUES
(28, 'Karl', 'Hello, ça va ?', '2018-08-06 18:39:56'),
(29, 'Louis', 'Oui ça va merci ! Et toi ?', '2018-08-06 18:40:17'),
(30, 'Karl', 'Bien ça va , j\'essaye PHP depuis peu !', '2018-08-06 18:40:55'),
(31, 'Louis', 'Ok...bon courage alors !', '2018-08-06 18:41:15');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
