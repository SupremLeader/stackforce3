-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 22 Janvier 2016 à 16:53
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

DROP TABLE IF EXISTS `profils`;
CREATE TABLE IF NOT EXISTS `profils` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `img` varchar(15) DEFAULT 'default.jpg',
  `token` varchar(64) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `online` tinyint(1) NOT NULL DEFAULT '0',
  `inscritdepuis` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `profils`:
--

-- --------------------------------------------------------

--
-- Structure de la table `profils_wusers`
--

DROP TABLE IF EXISTS `profils_wusers`;
CREATE TABLE IF NOT EXISTS `profils_wusers` (
  `profils_id` int(11) NOT NULL,
  `wusers_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `profils_wusers`:
--

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL,
  `wusers_id` int(5) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `meilleure_reponses_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `questions`:
--   `meilleure_reponses_id`
--       `reponses` -> `id`
--   `wusers_id`
--       `wusers` -> `id`
--

-- --------------------------------------------------------

--
-- Structure de la table `questions_tags`
--

DROP TABLE IF EXISTS `questions_tags`;
CREATE TABLE IF NOT EXISTS `questions_tags` (
  `questions_id` int(5) NOT NULL,
  `tags_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `questions_tags`:
--   `questions_id`
--       `questions` -> `id`
--   `tags_id`
--       `tags` -> `id`
--

-- --------------------------------------------------------

--
-- Structure de la table `reponses`
--

DROP TABLE IF EXISTS `reponses`;
CREATE TABLE IF NOT EXISTS `reponses` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `nbvote` int(11) NOT NULL,
  `questions_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `reponses`:
--   `questions_id`
--       `questions` -> `id`
--

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(2) NOT NULL,
  `type` varchar(7) NOT NULL,
  `css` varchar(7) NOT NULL DEFAULT '#'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `tags`:
--

--
-- Contenu de la table `tags`
--

INSERT INTO `tags` (`id`, `type`, `css`) VALUES
(1, 'HTML', '#'),
(2, 'PHP', '#'),
(3, 'CSS', '#'),
(4, 'JS', '#'),
(5, 'JQUERY', '#'),
(6, 'AJAX', '#'),
(7, 'G-MAPS', '#');

-- --------------------------------------------------------

--
-- Structure de la table `wusers`
--

DROP TABLE IF EXISTS `wusers`;
CREATE TABLE IF NOT EXISTS `wusers` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `wusers`:
--

--
-- Contenu de la table `wusers`
--

INSERT INTO `wusers` (`id`, `pseudo`, `mail`, `mdp`, `role`) VALUES
(0, 'sdwfbg', 'toto@free.fr', '$2y$10$JzTtZVhSw4GVbBCgRGmJtepeVD69osla31pZ2i0Kg.oPv0rI0pCaO', 'user');

-- --------------------------------------------------------

--
-- Structure de la table `wusers_post_votes`
--

DROP TABLE IF EXISTS `wusers_post_votes`;
CREATE TABLE IF NOT EXISTS `wusers_post_votes` (
  `wusers_id` int(11) NOT NULL,
  `reponses_id` int(11) NOT NULL,
  `avotay` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `wusers_post_votes`:
--   `reponses_id`
--       `reponses` -> `id`
--   `wusers_id`
--       `wusers` -> `id`
--

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
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
