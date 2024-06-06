-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 06 juin 2024 à 08:44
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestionsalle`
--

-- --------------------------------------------------------

--
-- Structure de la table `equipement`
--

CREATE TABLE `equipement` (
  `ide` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `disponible` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `equipement`
--

INSERT INTO `equipement` (`ide`, `nome`, `type`, `disponible`) VALUES
(1, 'PROJECTEUR', 'A', 0),
(2, 'PROJECTEUR', 'B', 0),
(3, 'TABLEAU ', 'BLANC', 1),
(4, 'TABLEAU', 'NOIR', 1);

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `id_pr` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `pass` varchar(500) NOT NULL,
  `admine` tinyint(1) NOT NULL,
  `titre` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`id_pr`, `nom`, `mail`, `pass`, `admine`, `titre`) VALUES
(1, 'dj', 'djibrineattime99@gmail.com', '$2y$10$JnB5W8tIiH6aX24YB0SL4ulRSB/2WU1YbT47p4fsRlWSLKXOjP8R2', 1, ''),
(7, 'abba', 'ab@gmail.com', '$2y$10$zepGkTApbCGnz5K9GUDF8OxupGmN.7dY5WVCwBL912ROkwaatn8xK', 1, ''),
(8, 'mk', 'mk@gmail.com', '$2y$10$e8jZ0B7Eyqut.SR55qhohecwpXM.BI5ZPCTDs7Ob729CI4zGQNzhe', 1, ''),
(9, 'housseini', 'housseini@gmail.com', '$2y$10$/gWoTS.Rjoqcvu2El6h2nuGBTUcDFRmqN9/NIaNjBzcZtZnTgw1pe', 1, ''),
(10, 'castro', 'castro@gmail.com', '$2y$10$l3UFCsmOfGDtXMHYnr7cL.//D70w9XeOs7KtA6tz7Ym10SyX7fIO2', 1, 'Dr.'),
(11, 'mk', 'mk1@gmail.com', '$2y$10$QqoVBV.6563hprcKuijCKOV6A1ehtReF43PPYKJvy2vMrVkhxVfb2', 0, 'Pr.'),
(12, 'abdoulaye', 'abdou@gmail.com', '$2y$10$yQkjrEHM52MGDyRGxqLeXOQISrOLRGgr9ncFgITn3vNuu4cKQeyna', 0, 'Dr.'),
(13, 'ousmane moussa mht', 'oussman@gmail.com', '$2y$10$m57FPF8LZGwKLDn6ICjWUesz.5vZiiwj5HQ0J37Vsc5nm/guFSVZG', 0, 'Pr.');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `idr` int(11) NOT NULL,
  `datte` date NOT NULL,
  `heur` time NOT NULL,
  `dure` varchar(8) NOT NULL,
  `ids` int(11) NOT NULL,
  `ide` int(11) NOT NULL,
  `idp` int(11) NOT NULL,
  `reserver` tinyint(1) NOT NULL DEFAULT 0,
  `departement` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`idr`, `datte`, `heur`, `dure`, `ids`, `ide`, `idp`, `reserver`, `departement`) VALUES
(6, '2024-05-09', '14:01:00', '3H', 3, 2, 9, 1, ''),
(9, '2024-05-03', '21:05:00', '2H', 6, 3, 10, 1, 'MATH-INFO'),
(10, '2024-05-03', '21:05:00', '2H', 6, 2, 10, 1, 'MATH-INFO'),
(12, '2024-04-30', '01:38:00', '2H', 5, 3, 8, 1, 'CHIMIE'),
(13, '2024-04-30', '01:00:00', '1H', 6, 1, 10, 1, 'CHIMIE'),
(14, '2024-05-15', '12:00:00', '6H', 6, 4, 11, 1, 'MATH-INFO'),
(16, '2024-05-10', '13:26:00', '5H', 2, 2, 1, 1, 'MATH-INFO'),
(17, '2024-05-16', '12:34:00', '4H', 4, 2, 10, 0, 'MATH-INFO'),
(18, '2024-05-10', '14:35:00', '3H', 4, 4, 10, 1, 'MATH-INFO');

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `ids` int(11) NOT NULL,
  `noms` varchar(50) NOT NULL,
  `capacite` int(8) NOT NULL,
  `disponible` tinyint(1) NOT NULL DEFAULT 0,
  `inage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`ids`, `noms`, `capacite`, `disponible`, `inage`) VALUES
(1, 'SALLE 150A FS', 150, 0, '150AFS.jpg'),
(2, 'SALLE 150B FS', 150, 1, '150BFS.jpg'),
(3, 'SALLE 150C FS', 150, 0, '150CFS.jpg'),
(4, 'SALLE 200B FS', 200, 0, '200BFS.jpg'),
(5, 'SALLE 200A FS', 200, 1, '200AFS.jpg'),
(6, 'EMPHI 750', 750, 1, '750AMPHI.jpg'),
(7, '50A', 500, 1, '50A.jpeg'),
(8, '50B', 400, 1, '50B.jpg'),
(9, '50C', 300, 1, '50C.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `equipement`
--
ALTER TABLE `equipement`
  ADD PRIMARY KEY (`ide`),
  ADD UNIQUE KEY `ide` (`ide`),
  ADD UNIQUE KEY `ide_2` (`ide`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id_pr`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`idr`),
  ADD KEY `ids` (`ids`),
  ADD KEY `ide` (`ide`),
  ADD KEY `idp` (`idp`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`ids`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `equipement`
--
ALTER TABLE `equipement`
  MODIFY `ide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `id_pr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `idr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `ids` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`idp`) REFERENCES `personne` (`id_pr`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`ide`) REFERENCES `equipement` (`ide`),
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`ids`) REFERENCES `salle` (`ids`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
