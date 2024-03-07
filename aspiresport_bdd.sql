-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 07 mars 2024 à 00:53
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
CREATE DATABASE IF NOT EXISTS `aspiresport_bdd` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `aspiresport_bdd`;

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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`Id_Client`, `nom`, `prenom`, `mdp`, `age`, `poids`, `taille`, `sexe`, `type`, `IMC`) VALUES
(1, 'admin', 'Quentin', 'admin', '1999-07-03', 58.70, 170, 1, 3, 22.89),
(2, 'Johnson', 'Michael', 'mike456', '1985-04-12', 85.30, 180, 1, 1, 26.35),
(3, 'Lefebvre', 'Julie', 'juliepwd', '1992-12-30', 63.90, 165, 2, 2, 23.46),
(4, 'li', 'Chen', 'li', '1987-06-08', 72.70, 170, 1, 2, 25.21),
(5, 'Gonzalez', 'Carlos', 'carlos99', '1998-02-17', 75.50, 175, 1, 1, 24.65),
(6, 'saenz', 'quentin', '$2y$10$A8qJhVSdet7B.KUnrz/PdeGN.chW97wJeuNz0Nrrw91', '1999-07-03', 70.00, 175, 1, 3, 22.00),
(7, 'saenz', 'quentin', '11', '1999-07-03', 70.00, 175, 1, 3, 22.00);

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
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `durée` int DEFAULT NULL,
  `Id_Client` int NOT NULL,
  PRIMARY KEY (`Id_Planning`),
  KEY `Id_Client` (`Id_Client`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `planning`
--

INSERT INTO `planning` (`Id_Planning`, `titre`, `date_heure`, `nom_planning`, `durée`, `Id_Client`) VALUES
(1, 'Entraînement Marathon', '2024-04-05 08:00:00', 'Marathon Avril', 120, 1),
(2, 'Séance Yoga', '2024-04-06 10:00:00', 'Yoga Matinal', 60, 2),
(3, 'Cours de Natation', '2024-04-07 15:00:00', 'Natation Débutant', 90, 3),
(4, 'Workshop Boxe', '2024-04-08 18:00:00', 'Boxe Intermédiaire', 60, 4),
(5, 'Tournoi Tennis', '2024-04-09 09:00:00', 'Tennis Printemps', 180, 5);

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
(4, 0),
(4, 2),
(4, 5),
(4, 14),
(4, 15),
(4, 16),
(4, 17);

-- --------------------------------------------------------

--
-- Structure de la table `sport`
--

DROP TABLE IF EXISTS `sport`;
CREATE TABLE IF NOT EXISTS `sport` (
  `Id_Sport` int NOT NULL AUTO_INCREMENT,
  `nom_sport` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_Sport`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
