-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 01 mars 2024 à 15:01
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cuisineleroux`
--

-- --------------------------------------------------------

--
-- Structure de la table `createur`
--

DROP TABLE IF EXISTS `createur`;
CREATE TABLE IF NOT EXISTS `createur` (
  `idCreator` int NOT NULL AUTO_INCREMENT,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`idCreator`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `createur`
--

INSERT INTO `createur` (`idCreator`, `prenom`, `nom`) VALUES
(1, 'Joseph', 'Leroux');

-- --------------------------------------------------------

--
-- Structure de la table `etapes`
--

DROP TABLE IF EXISTS `etapes`;
CREATE TABLE IF NOT EXISTS `etapes` (
  `idEtape` int NOT NULL AUTO_INCREMENT,
  `numEtape` int NOT NULL,
  `descEtape` varchar(255) NOT NULL,
  PRIMARY KEY (`idEtape`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `etapes`
--

INSERT INTO `etapes` (`idEtape`, `numEtape`, `descEtape`) VALUES
(1, 1, 'casser les oeufs dans une poele.'),
(2, 3, 'Attendre que ca cuise.'),
(3, 2, 'Mélanger les oeufs, homogenements.');

-- --------------------------------------------------------

--
-- Structure de la table `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
CREATE TABLE IF NOT EXISTS `ingredients` (
  `idIngr` int NOT NULL AUTO_INCREMENT,
  `nomIngredient` varchar(255) NOT NULL,
  `metric` varchar(255) NOT NULL,
  PRIMARY KEY (`idIngr`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `ingredients`
--

INSERT INTO `ingredients` (`idIngr`, `nomIngredient`, `metric`) VALUES
(1, 'Oeuf', 'unité'),
(2, 'Sel', 'Pincée'),
(3, 'poivre', 'pincée'),
(4, 'sel', 'g'),
(5, 'Poivre', 'G');

-- --------------------------------------------------------

--
-- Structure de la table `recetape`
--

DROP TABLE IF EXISTS `recetape`;
CREATE TABLE IF NOT EXISTS `recetape` (
  `idRecetape` int NOT NULL AUTO_INCREMENT,
  `idRec` int NOT NULL,
  `idEtape` int NOT NULL,
  PRIMARY KEY (`idRecetape`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `recetape`
--

INSERT INTO `recetape` (`idRecetape`, `idRec`, `idEtape`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

DROP TABLE IF EXISTS `recette`;
CREATE TABLE IF NOT EXISTS `recette` (
  `idR` int NOT NULL AUTO_INCREMENT,
  `nomRecette` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `activeTime` int NOT NULL COMMENT 'minutes',
  `totalTime` int NOT NULL COMMENT 'minutes',
  `nbrPersonne` int NOT NULL,
  `tags` int NOT NULL COMMENT 'separer par ;;',
  `imgSrc` varchar(255) NOT NULL,
  PRIMARY KEY (`idR`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `recette`
--

INSERT INTO `recette` (`idR`, `nomRecette`, `description`, `activeTime`, `totalTime`, `nbrPersonne`, `tags`, `imgSrc`) VALUES
(1, 'Omelette', 'Une omelette, tout ce qu\'il y as de plus basique... ', 5, 5, 2, 0, './src/img/1-Omelette-au-safran.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `recing`
--

DROP TABLE IF EXISTS `recing`;
CREATE TABLE IF NOT EXISTS `recing` (
  `idRecing` int NOT NULL AUTO_INCREMENT,
  `idIng` int NOT NULL,
  `idRec` int NOT NULL,
  `quantite` int NOT NULL,
  PRIMARY KEY (`idRecing`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `recing`
--

INSERT INTO `recing` (`idRecing`, `idIng`, `idRec`, `quantite`) VALUES
(1, 1, 1, 2),
(2, 2, 1, 2),
(3, 3, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `recrea`
--

DROP TABLE IF EXISTS `recrea`;
CREATE TABLE IF NOT EXISTS `recrea` (
  `idRecrea` int NOT NULL AUTO_INCREMENT,
  `idCreateur` int NOT NULL,
  `idRec` int NOT NULL,
  PRIMARY KEY (`idRecrea`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `recrea`
--

INSERT INTO `recrea` (`idRecrea`, `idCreateur`, `idRec`) VALUES
(1, 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
