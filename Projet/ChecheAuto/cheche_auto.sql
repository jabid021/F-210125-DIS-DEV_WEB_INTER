-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  ven. 12 fév. 2021 à 16:14
-- Version du serveur :  5.7.28
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cheche_auto`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `couleur` varchar(20) NOT NULL,
  `prix` int(3) NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type_id` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `type`, `couleur`, `prix`, `image`) VALUES
(1, 1, 'noir', 50, 'capot.jpg'),
(2, 1, 'vert', 45, 'capot_vert.jpg'),
(3, 1, 'bleu', 55, 'capot_bleu.jpg'),
(4, 2, 'noir', 20, 'portiere.jpg'),
(5, 2, 'vert', 25, 'portiere_vert.jpg'),
(6, 3, 'noir', 60, 'coffre.jpg'),
(7, 100, '', 110, 'radiateur.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) NOT NULL,
  `MdP` varchar(80) NOT NULL,
  `carrosserie` tinyint(1) NOT NULL,
  `pieces` tinyint(1) NOT NULL,
  `accessoires` tinyint(1) NOT NULL,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo` (`pseudo`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`id`, `pseudo`, `MdP`, `carrosserie`, `pieces`, `accessoires`, `type`) VALUES
(1, 'Admin', '$2y$10$9ySSs.l01L45kSWMic0xDOCG2hGM/nPpUCbYAGsr21alHrSPpPdEm', 1, 1, 1, 'Admin'),
(2, 'Delph', '$2y$10$3b731fQnRwtq32LybqcIduuFvKDr9ULMBA3gb4uEZUKO0SftqGjWy', 0, 1, 0, 'client'),
(4, 'toto', '$2y$10$SU/B5xFnLOxUaOiNF7kh0.7iF/syyO1KljvFwgOqSGNltgdXf4dSC', 0, 1, 0, 'client'),
(5, 'titi', '$2y$10$OsqNBxRduluD7D0Dnv5FNOdieOtQ9j8WhfCz.zqIaeEk6Z8VNUo3m', 0, 0, 1, 'client'),
(6, 'tutu', '$2y$10$yhE2yXfh1RrOQTOGpgRlQO/lki6jll8H.SL5PWmOD765n.weWsR7m', 0, 1, 1, 'client'),
(14, 'del', '$2y$10$WuamEvsJOa3UcLG11MIo3OHhWcPjCA2PCuNF7fbBFYsCibHw81i2G', 1, 1, 1, 'client');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `compte` int(11) NOT NULL,
  `article` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_compte` (`compte`),
  KEY `id_article` (`article`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id`, `compte`, `article`, `prix`, `qte`) VALUES
(1, 2, 1, 50, 1);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=209 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id`, `type`) VALUES
(1, 'Capot'),
(2, 'Portiere'),
(3, 'Coffre'),
(4, 'Retroviseur'),
(5, 'PareChoc_AV'),
(6, 'PareChoc_AR'),
(7, 'Anti_Brouillard'),
(8, 'Phares'),
(9, 'Feux'),
(100, 'Radiateur'),
(101, 'Pot'),
(102, 'Freins'),
(103, 'Filtre'),
(104, 'Distribution'),
(105, 'Leve_Vitre'),
(106, 'Amortisseur'),
(107, 'Batterie'),
(108, 'Attelage'),
(200, 'Volant'),
(201, 'Tapis'),
(202, 'Nettoyage'),
(203, 'Essui_Glace'),
(204, 'Désodorisant'),
(205, 'Housse'),
(206, 'Autoradio'),
(207, 'Outillage');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `type_id` FOREIGN KEY (`type`) REFERENCES `type` (`id`);

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `id_article` FOREIGN KEY (`article`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `id_compte` FOREIGN KEY (`compte`) REFERENCES `compte` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
