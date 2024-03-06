-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 06 mars 2024 à 05:12
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `aspiresport_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `appartient`
--

DROP TABLE IF EXISTS `appartient`;
CREATE TABLE IF NOT EXISTS `appartient` (
  `Id_Client` int NOT NULL,
  `Id_Equipe` int NOT NULL,
  PRIMARY KEY (`Id_Client`,`Id_Equipe`),
  KEY `Id_Equipe` (`Id_Equipe`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `appartient`
--

INSERT INTO `appartient` (`Id_Client`, `Id_Equipe`) VALUES
(4, 1),
(4, 2),
(4, 5),
(4, 13);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `Id_Client` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `mdp` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `age` date DEFAULT NULL,
  `poids` decimal(4,2) DEFAULT NULL,
  `taille` int DEFAULT NULL,
  `sexe` int DEFAULT NULL,
  `type` int DEFAULT NULL,
  `IMC` decimal(15,2) DEFAULT NULL,
  PRIMARY KEY (`Id_Client`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`Id_Client`, `nom`, `prenom`, `mdp`, `age`, `poids`, `taille`, `sexe`, `type`, `IMC`) VALUES
(1, 'Martin', 'Sophie', 'sophie123', '1990-08-25', 58.70, 160, 2, 1, 22.89),
(2, 'Johnson', 'Michael', 'mike456', '1985-04-12', 85.30, 180, 1, 1, 26.35),
(3, 'Lefebvre', 'Julie', 'juliepwd', '1992-12-30', 63.90, 165, 2, 2, 23.46),
(4, 'li', 'Chen', 'li', '1987-06-08', 72.70, 170, 1, 2, 25.21),
(5, 'Gonzalez', 'Carlos', 'carlos99', '1998-02-17', 75.50, 175, 1, 1, 24.65);

-- --------------------------------------------------------

--
-- Structure de la table `consulte`
--

DROP TABLE IF EXISTS `consulte`;
CREATE TABLE IF NOT EXISTS `consulte` (
  `Id_Planning` int NOT NULL AUTO_INCREMENT,
  `Id_Equipe` int NOT NULL,
  PRIMARY KEY (`Id_Planning`,`Id_Equipe`),
  KEY `Id_Equipe` (`Id_Equipe`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

DROP TABLE IF EXISTS `equipe`;
CREATE TABLE IF NOT EXISTS `equipe` (
  `Id_Equipe` int NOT NULL AUTO_INCREMENT,
  `nom_groupe` varchar(50) DEFAULT NULL,
  `date_creation` date DEFAULT NULL,
  PRIMARY KEY (`Id_Equipe`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `equipe`
--

INSERT INTO `equipe` (`Id_Equipe`, `nom_groupe`, `date_creation`) VALUES
(1, 'Les Coureurs Rapides', '2021-03-15'),
(2, 'Les Nageurs Intrépides', '2022-06-24'),
(3, 'Les Grimpeurs Agiles', '2023-01-09'),
(4, 'Les Archers Précis', '2022-02-18'),
(5, 'Les Cyclistes Endurants', '2021-04-07'),
(6, 'Les Boxeurs Dynamiques', '2023-03-12'),
(7, 'Les Sprinters Éclair', '2022-08-29'),
(8, 'Les Escrimeurs Agiles', '2021-11-05');

-- --------------------------------------------------------

--
-- Structure de la table `planning`
--

DROP TABLE IF EXISTS `planning`;
CREATE TABLE IF NOT EXISTS `planning` (
  `Id_Planning` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) DEFAULT NULL,
  `date_heure` datetime DEFAULT NULL,
  `nom_planning` varchar(50) DEFAULT NULL,
  `durée` time DEFAULT NULL,
  `Id_Client` int NOT NULL,
  PRIMARY KEY (`Id_Planning`),
  KEY `Id_Client` (`Id_Client`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pratique`
--

DROP TABLE IF EXISTS `pratique`;
CREATE TABLE IF NOT EXISTS `pratique` (
  `Id_Client` int NOT NULL AUTO_INCREMENT,
  `Id_Sport` int NOT NULL,
  PRIMARY KEY (`Id_Client`,`Id_Sport`),
  KEY `Id_Sport` (`Id_Sport`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `pratique`
--

INSERT INTO `pratique` (`Id_Client`, `Id_Sport`) VALUES
(4, 1),
(4, 2),
(4, 19);

-- --------------------------------------------------------

--
-- Structure de la table `sport`
--

DROP TABLE IF EXISTS `sport`;
CREATE TABLE IF NOT EXISTS `sport` (
  `Id_Sport` int NOT NULL AUTO_INCREMENT,
  `nom_sport` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_Sport`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `sport`
--

INSERT INTO `sport` (`Id_Sport`, `nom_sport`) VALUES
(1, 'Football'),
(2, 'Basketball'),
(3, 'Tennis'),
(4, 'Natation'),
(5, 'Athlétisme'),
(6, 'Cyclisme'),
(7, 'Boxe'),
(8, 'Rugby'),
(9, 'Golf'),
(10, 'Ski'),
(11, 'Volleyball'),
(12, 'Badminton'),
(13, 'Escalade'),
(14, 'Judo'),
(15, 'Karate'),
(16, 'Taekwondo'),
(17, 'Aviron'),
(18, 'Triathlon'),
(19, 'Squash'),
(20, 'Patinage artistique');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
