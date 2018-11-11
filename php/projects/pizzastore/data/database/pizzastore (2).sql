-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 26 oct. 2018 à 17:31
-- Version du serveur :  10.1.26-MariaDB
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
-- Base de données :  `pizzastore`
--

-- --------------------------------------------------------

--
-- Structure de la table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `zip` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `address`
--

INSERT INTO `address` (`id`, `name`, `address`, `zip`, `city`, `phone`, `user_id`) VALUES
(1, 'domicile', ' 80 Faubourg Saint Honoré', '75116', 'Paris', '01.71.59.76.51', 1),
(2, 'domicile', '24, avenue de Provence', '74500', 'Chelles', '01.71.59.76.78.51', 2),
(3, 'travail', ' 58, place de Miremont', '59700', 'Marcq-en-baroeul', '03.71.59.78.51', 3),
(4, 'domicile', '17, place de Miremont', '56000', 'Vannes', '01.71.59.76.51', 3),
(5, 'travail', ' 20, rue Adolphe Wurtz', '60200', 'Compiegne', '05.78.59.76.51', 4),
(6, 'domicile', ' 13, Place Napoléon', '13001', 'Marseille', '02.89.59.76.78', 5),
(7, 'travail', ' 35, rue des six frères Ruellan', '71300', 'Monceau-les-mines', '01.71.89.76.51', 6),
(8, 'domicile', ' 7, rue de Geneve', '30100', 'Ales', '01.89.59.78.51', 6);

-- --------------------------------------------------------

--
-- Structure de la table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `ordered_at` datetime DEFAULT NULL,
  `reference` varchar(45) DEFAULT NULL,
  `address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `pizza_name` varchar(45) DEFAULT NULL,
  `pizza_price` decimal(11,2) DEFAULT NULL,
  `pizza_size` varchar(45) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pizza`
--

CREATE TABLE `pizza` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `price` decimal(11,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `categories` varchar(255) NOT NULL,
  `descriptions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pizza`
--

INSERT INTO `pizza` (`id`, `name`, `price`, `image`, `categories`, `descriptions`) VALUES
(1, 'Reine', '8.00', 'reine.jpg', 'charcuterie', 'Sauce tomate, mozzarella, jambon, champignons.'),
(2, 'Texane', '10.00', 'texane.jpg', 'epicée', 'Sauce tomate, mozzarella, pommes de terre sautées, boulettes de boeuf assaisonnées, oignons, assaisonnement au poivre.\r\n\r\n'),
(3, '4-fromages  ', '13.00', '4-fromages.jpg', 'aucune', 'Sauce tomate (ou crème fraîche légère), mozzarella, chèvre, Emmental, Fourme d’Ambert A.O.P.'),
(4, 'Végétarienne', '11.00', 'vegetarienne.jpg', 'végétarienne', 'Sauce tomate, mozzarella,champignons, oignons, poivrons mélangés, olives noires.'),
(5, 'Savoyarde', '13.00', 'savoyarde.jpg', 'charcuterie', 'Crème fraîche légère, mozzarella, lardons fumés, pommes de terre sautées, Reblochon A.O.P. de Savoie, origan.'),
(6, 'Hawaiène', '10.00', 'hawaiene.jpg', 'aucune', 'Sauce tomate, mozzarella, poulet rôti, ananas.'),
(7, 'Cannibale', '11.00', 'cannibale.jpg', 'epicée', 'Sauce barbecue, mozzarella, poulet rôti, merguez, boulettes de boeuf assaisonnées.'),
(38, 'test5', '10.99', 'vegetables.png', 'charcuterie', 'lorem Ipsum');

-- --------------------------------------------------------

--
-- Structure de la table `pizza_has_size`
--

CREATE TABLE `pizza_has_size` (
  `pizza_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pizza_has_size`
--

INSERT INTO `pizza_has_size` (`pizza_id`, `size_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(3, 1),
(3, 2),
(3, 3),
(3, 4);

-- --------------------------------------------------------

--
-- Structure de la table `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `price` decimal(11,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `size`
--

INSERT INTO `size` (`id`, `name`, `price`) VALUES
(1, 'S', '0.00'),
(2, 'M', '0.99'),
(3, 'L', '1.99'),
(4, 'XL', '2.99');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `name`, `firstname`) VALUES
(1, 'LAPIN', 'Jojo'),
(2, 'HEMMER', 'Louis'),
(3, 'DUPONT', 'Mohamed'),
(4, 'ZIDANE', 'Zinédine'),
(5, 'KOLL', 'Helmut'),
(6, 'RENARD', 'Cyrille');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`,`user_id`),
  ADD KEY `fk_address_user1_idx` (`user_id`);

--
-- Index pour la table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`,`address_id`),
  ADD KEY `fk_order_address1_idx` (`address_id`);

--
-- Index pour la table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`,`order_id`),
  ADD KEY `fk_order_detail_order1_idx` (`order_id`);

--
-- Index pour la table `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pizza_has_size`
--
ALTER TABLE `pizza_has_size`
  ADD PRIMARY KEY (`pizza_id`,`size_id`),
  ADD KEY `fk_pizza_has_size_size1_idx` (`size_id`),
  ADD KEY `fk_pizza_has_size_pizza_idx` (`pizza_id`);

--
-- Index pour la table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pizza`
--
ALTER TABLE `pizza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `fk_address_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_order_address1` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `fk_order_detail_order1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `pizza_has_size`
--
ALTER TABLE `pizza_has_size`
  ADD CONSTRAINT `fk_pizza_has_size_pizza` FOREIGN KEY (`pizza_id`) REFERENCES `pizza` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pizza_has_size_size1` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
