-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 29 Janvier 2016 à 09:49
-- Version du serveur :  5.6.25
-- Version de PHP :  5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `stackforce3`
--
CREATE DATABASE IF NOT EXISTS `stackforce3` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `stackforce3`;

-- --------------------------------------------------------

--
-- Structure de la table `profils`
--

CREATE TABLE IF NOT EXISTS `profils` (
  `id` int(11) NOT NULL,
  `wusers_id` int(11) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `twitter` varchar(30) DEFAULT NULL,
  `linkedin` varchar(30) DEFAULT NULL,
  `facebook` varchar(30) DEFAULT NULL,
  `img` varchar(15) DEFAULT 'default.png',
  `token` varchar(64) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `online` tinyint(1) NOT NULL DEFAULT '0',
  `inscritdepuis` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `profils`
--

INSERT INTO `profils` (`id`, `wusers_id`, `nom`, `prenom`, `twitter`, `linkedin`, `facebook`, `img`, `token`, `active`, `online`, `inscritdepuis`) VALUES
(1, 1, 'titi', 'titi', NULL, NULL, NULL, 'default.png', NULL, 1, 1, '0000-00-00'),
(2, 2, 'toto', 'toto', NULL, NULL, NULL, 'default.png', NULL, 1, 1, '2016-01-15');

-- --------------------------------------------------------

--
-- Structure de la table `profils_wusers`
--

CREATE TABLE IF NOT EXISTS `profils_wusers` (
  `profils_id` int(11) NOT NULL,
  `wusers_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `profils_wusers`
--

INSERT INTO `profils_wusers` (`profils_id`, `wusers_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL,
  `wusers_id` int(5) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL,
  `meilleure_reponses_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `questions_tags`
--

CREATE TABLE IF NOT EXISTS `questions_tags` (
  `questions_id` int(5) NOT NULL,
  `tags_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reponses`
--

CREATE TABLE IF NOT EXISTS `reponses` (
  `id` int(11) NOT NULL,
  `wusers_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `nbvote` int(11) NOT NULL,
  `questions_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(2) NOT NULL,
  `type` varchar(7) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tags`
--

INSERT INTO `tags` (`id`, `type`) VALUES
(1, 'HTML'),
(2, 'PHP'),
(3, 'CSS'),
(4, 'JS'),
(5, 'JQUERY'),
(6, 'AJAX'),
(7, 'G-MAPS');

-- --------------------------------------------------------

--
-- Structure de la table `wusers`
--

CREATE TABLE IF NOT EXISTS `wusers` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `wusers`
--

INSERT INTO `wusers` (`id`, `pseudo`, `mail`, `mdp`, `role`) VALUES
(1, 'titi', 'titi@free.fr', '$2y$10$TRPSapC9VgOE5ZUU0HKnQe8FzfqeCvxTe2.Yb6W9bvnpu995Oxrzi', 'user'),
(2, 'toto', 'toto@free.fr', '$2y$10$Fr0YZ.gcCbT.1.SSuFWkXO9QZoYPHtka9IJ79umWFR9iFgIwXDT0G', 'user'),
(3, 'admin', 'admin@admin.fr', '$2y$10$Fwgj2T5Z9it79ko/0SLY8eNw8XqiRk9.mQG34M4Ctienv5hcSy/Sa', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `wusers_post_votes`
--

CREATE TABLE IF NOT EXISTS `wusers_post_votes` (
  `wusers_id` int(11) NOT NULL,
  `reponses_id` int(11) NOT NULL,
  `avotay` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `wusers_tags`
--

CREATE TABLE IF NOT EXISTS `wusers_tags` (
  `wusers_id` int(2) NOT NULL,
  `tags_id` int(2) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `wusers_tags`
--

INSERT INTO `wusers_tags` (`wusers_id`, `tags_id`, `level`) VALUES
(1, 2, 5),
(1, 6, 9),
(50, 2, 3),
(50, 5, 4);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `profils`
--
ALTER TABLE `profils`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reponses`
--
ALTER TABLE `reponses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `wusers`
--
ALTER TABLE `wusers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `profils`
--
ALTER TABLE `profils`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `wusers`
--
ALTER TABLE `wusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
