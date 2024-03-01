-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 01, 2024 at 05:48 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cuisineleroux`
--

-- --------------------------------------------------------

--
-- Table structure for table `createur`
--

DROP TABLE IF EXISTS `createur`;
CREATE TABLE IF NOT EXISTS `createur` (
  `idCreator` int NOT NULL AUTO_INCREMENT,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`idCreator`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `createur`
--

INSERT INTO `createur` (`idCreator`, `prenom`, `nom`) VALUES
(1, 'Joseph', 'Leroux');

-- --------------------------------------------------------

--
-- Table structure for table `etapes`
--

DROP TABLE IF EXISTS `etapes`;
CREATE TABLE IF NOT EXISTS `etapes` (
  `idEtape` int NOT NULL AUTO_INCREMENT,
  `numEtape` int NOT NULL,
  `descEtape` varchar(255) NOT NULL,
  PRIMARY KEY (`idEtape`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `etapes`
--

INSERT INTO `etapes` (`idEtape`, `numEtape`, `descEtape`) VALUES
(1, 1, 'casser les oeufs dans une poele.'),
(2, 3, 'Attendre que ca cuise.'),
(3, 2, 'Mélanger les oeufs, homogenements.');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
CREATE TABLE IF NOT EXISTS `ingredients` (
  `idIngr` int NOT NULL AUTO_INCREMENT,
  `nomIngredient` varchar(255) NOT NULL,
  `metric` varchar(255) NOT NULL,
  PRIMARY KEY (`idIngr`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`idIngr`, `nomIngredient`, `metric`) VALUES
(1, 'Oeuf', ''),
(2, 'Sel', 'Pincée'),
(3, 'poivre', 'pincée'),
(4, 'sel', 'g'),
(5, 'Poivre', 'G');

-- --------------------------------------------------------

--
-- Table structure for table `recetape`
--

DROP TABLE IF EXISTS `recetape`;
CREATE TABLE IF NOT EXISTS `recetape` (
  `idRecetape` int NOT NULL,
  `idRec` int NOT NULL,
  `idEtape` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `recetape`
--

INSERT INTO `recetape` (`idRecetape`, `idRec`, `idEtape`) VALUES
(0, 1, 1),
(0, 1, 2),
(0, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `recette`
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `recette`
--

INSERT INTO `recette` (`idR`, `nomRecette`, `description`, `activeTime`, `totalTime`, `nbrPersonne`, `tags`, `imgSrc`) VALUES
(1, 'Omelette', 'Une omelette, tout ce qu\'il y as de plus basique... ', 5, 5, 2, 0, './src/img/1-Omelette-au-safran.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `recing`
--

DROP TABLE IF EXISTS `recing`;
CREATE TABLE IF NOT EXISTS `recing` (
  `idRecing` int NOT NULL AUTO_INCREMENT,
  `idIng` int NOT NULL,
  `idRec` int NOT NULL,
  `quantite` int NOT NULL,
  PRIMARY KEY (`idRecing`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `recing`
--

INSERT INTO `recing` (`idRecing`, `idIng`, `idRec`, `quantite`) VALUES
(1, 1, 1, 2),
(2, 2, 1, 2),
(3, 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `recrea`
--

DROP TABLE IF EXISTS `recrea`;
CREATE TABLE IF NOT EXISTS `recrea` (
  `idRecrea` int NOT NULL,
  `idCreateur` int NOT NULL,
  `idRec` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `recrea`
--

INSERT INTO `recrea` (`idRecrea`, `idCreateur`, `idRec`) VALUES
(1, 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
