-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 31 Janvier 2016 à 15:33
-- Version du serveur :  10.1.8-MariaDB
-- Version de PHP :  5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `stackforce3`
--

-- --------------------------------------------------------

--
-- Structure de la table `profils`
--

CREATE TABLE `profils` (
  `id` int(11) NOT NULL,
  `wusers_id` int(11) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `telephone` varchar(15) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `googleplus` varchar(255) NOT NULL,
  `github` varchar(255) NOT NULL,
  `img` varchar(15) DEFAULT 'default.png',
  `token` varchar(64) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `online` tinyint(1) NOT NULL DEFAULT '0',
  `inscritdepuis` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `profils`
--

INSERT INTO `profils` (`id`, `wusers_id`, `nom`, `prenom`, `telephone`, `twitter`, `linkedin`, `facebook`, `googleplus`, `github`, `img`, `token`, `active`, `online`, `inscritdepuis`) VALUES
(1, 1, 'Isr', 'Léa', NULL, NULL, 'linkedin.com/in/leaisrael', NULL, '', 'littlelux', 'liluxprofil.jpg', NULL, 1, 0, '2016-01-29'),
(2, 2, 'Moreau', 'Yoann', NULL, NULL, NULL, NULL, '', '', 'yo.jpg', NULL, 1, 0, '2016-01-29'),
(13, 57, 'Nicol', 'Kilian', '0621164068', 'https://twitter.com/Ghost_Pandora', 'https://www.linkedin.com/in/kilian-nicol-249736112', 'https://www.facebook.com/nicolkilian', '', '', 'starlight.jpg', 'daecfc1f23d6f997f598d7f9f4bf2eb9', 1, 0, '2016-01-29');

-- --------------------------------------------------------

--
-- Structure de la table `profils_wusers`
--

CREATE TABLE `profils_wusers` (
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

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `wusers_id` int(5) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL,
  `meilleure_reponses_id` int(11) NOT NULL,
  `nbreponses` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `questions`
--

INSERT INTO `questions` (`id`, `wusers_id`, `titre`, `description`, `date`, `meilleure_reponses_id`, `nbreponses`) VALUES
(1, 57, 'JavaScript ou jQuery ?', 'Bonjour, je voudrais savoir quel est le plus simple d''utilisation et le plus complet entre les deux. Quels sont les avantages et les inconvénients de chacun ?', '2016-01-25 00:00:00', 0, 2),
(2, 57, 'Fonction de recherche sans rechargement de page.', 'Bonjour, je voudrais faire une fonction de recherche sans devoir recharger la page à chaque fois, je sais qu''il faut utiliser de l''AJAX mais je ne sais pas comment faire, est-ce que quelqu''un pourrait m''aider ?', '2016-01-26 00:00:00', 0, 1),
(3, 57, 'Est-il possible de réaliser des requêtes INSERT avec des INNER JOIN en SQL ?', 'Bonjour, je voudrais insérer des données dans plusieurs tables en même temps, est-il possible de faire cela en une seule requête ?', '2016-01-29 15:42:39', 0, 0),
(4, 2, 'Pouvez-vous m''aider avec ce Probème de "back to top" en jQuery ?', 'J''ai un problème avec cette fonction :\r\n$window.scroll(function(){\r\n  if ($(this).scrollTop() > 100) {\r\n   $(''.scrollToTop'').fadeIn();\r\n } else {\r\n   $(''.scrollToTop'').fadeOut();\r\n }\r\n});\r\n\r\n$(''.scrollToTop'').click(function(){\r\n  $(''html, body'').animate({scrollTop : 0},800);\r\n  return false;\r\n});\r\n\r\nMerci de votre aide !', '2016-01-29 16:34:21', 0, 0),
(5, 2, 'Comment réaliser un menu responsive en full css ?', 'Si quelqu''un a une idée, merci de m''aider !', '2016-01-29 16:36:00', 0, 3),
(6, 2, 'Réaliser un slider avec vidéos en javascript ?', 'Est-ce possible, et si oui, comment ? Merci de votre aide !', '2016-01-29 16:40:32', 0, 0),
(7, 1, 'Full screen vidéo et responsive design', 'Hello world,\r\n\r\nje voudrais faire un site avec un full screen video et responsive, Jquery ou Javascript ? Et par où commencer svp ? merci =)', '2016-01-29 16:48:55', 0, 0),
(8, 1, 'Problème de connexion à la base de données', 'Comment se connecter à la base de données de manière sécurisée ??', '2016-01-29 16:50:44', 0, 0),
(9, 1, 'Comment lancer une requête de tri de type INTEGER ?', 'J''aimerais ordonner des données numériques, comment faire proprement et façon ergonomique ?', '2016-01-29 16:51:43', 0, 0),
(10, 1, 'Les fonctions Scroll/ ScrollToTop avec jQuery ?', 'Si quelqu''un connaît de bons liens avec des effets sympas qui utilisent le scroll ce serait super, je cherche également comment cela fonctionne ? Par où commencer ?', '2016-01-29 16:53:34', 0, 1),
(11, 57, 'Comment transmettre des variables PHP dans une URL à partir d''un accordéon jQuery ?', 'Bonjour, je voudrais pouvoir transmettre dans l''URL un paramètre dont la valeur est une variable PHP correspondant à la section de l''accordéon sur laquelle j''ai cliqué.\r\n\r\nJ''aimerais aussi que quand je rentre une URL avec un paramètre manuellement, l''accordéon de la section qui correspond s''ouvre, est-ce possible ?\r\n\r\nFaut-il obligatoirement passer par de l''AJAX ?\r\n\r\nPS : l''accordéon que j''utilise est codé en jQuery.', '2016-01-30 00:21:59', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `questions_tags`
--

CREATE TABLE `questions_tags` (
  `questions_id` int(5) NOT NULL,
  `tags_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `questions_tags`
--

INSERT INTO `questions_tags` (`questions_id`, `tags_id`) VALUES
(1, 4),
(1, 5),
(2, 2),
(2, 6),
(3, 2),
(3, 7),
(5, 3),
(4, 5),
(5, 1),
(6, 1),
(6, 3),
(6, 4),
(7, 4),
(7, 5),
(8, 2),
(8, 7),
(9, 2),
(9, 7),
(10, 5),
(11, 2),
(11, 5),
(11, 6);

-- --------------------------------------------------------

--
-- Structure de la table `reponses`
--

CREATE TABLE `reponses` (
  `id` int(11) NOT NULL,
  `wusers_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `nbvote` int(11) NOT NULL DEFAULT '0',
  `questions_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `reponses`
--

INSERT INTO `reponses` (`id`, `wusers_id`, `message`, `nbvote`, `questions_id`, `date`) VALUES
(1, 57, 'Le jQuery est une bibliothèque JavaScript permettant de simplifier grandement le code. En revanche, pour utiliser du jQuery, il faut importer la bibliothèque, soit en téléchargeant les fichiers nécessaires, soit en copiant le lien de la dernière version du CDN dans l''index de ton site web.', 3, 1, '2016-01-27 00:00:00'),
(2, 57, 'Comment faire pour convertir une date en PHP ? Répondez-moi vite s''il vous plait !', -1, 1, '2016-01-28 00:00:00'),
(3, 57, 'Avec du padding bien sûr !', 0, 5, '2016-01-30 00:16:53'),
(4, 57, 'Essaye ça : \r\n\r\n$(window).scroll(function(){\r\n		if ($(this).scrollTop() > 100) {\r\n			$(''.scrollToTop'').fadeIn();\r\n		} else {\r\n			$(''.scrollToTop'').fadeOut();\r\n		}\r\n	});\r\n	\r\n	$(''.scrollToTop'').click(function(){\r\n		$(''html, body'').animate({scrollTop : 0},800);\r\n		return false;\r\n	});', 1, 10, '2016-01-30 04:17:13'),
(5, 57, 'Oui, c''est bien de l''AJAX qu''il te faut, mais tu devrais te renseigner et prendre le temps de bien comprendre ce langage, c''est loin d''être simple.', 0, 2, '2016-01-30 04:22:50'),
(6, 57, 'Avec Bootstrap !', 0, 5, '2016-01-30 04:29:57'),
(7, 57, 'Avec des media queries !', 0, 5, '2016-01-30 04:33:30');

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE `tags` (
  `id` int(2) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tags`
--

INSERT INTO `tags` (`id`, `type`) VALUES
(1, 'HTML'),
(2, 'PHP'),
(3, 'CSS'),
(4, 'JavaScript'),
(5, 'jQuery'),
(6, 'AJAX'),
(7, 'SQL');

-- --------------------------------------------------------

--
-- Structure de la table `wusers`
--

CREATE TABLE `wusers` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `wusers`
--

INSERT INTO `wusers` (`id`, `pseudo`, `mail`, `mdp`, `role`) VALUES
(1, 'Lilux', 'lea.israel@hotmail.fr', '$2y$10$TRPSapC9VgOE5ZUU0HKnQe8FzfqeCvxTe2.Yb6W9bvnpu995Oxrzi', 'user'),
(2, 'SupremLeader Front', 'y.moreau@jesuistondev.fr', '$2y$10$Fr0YZ.gcCbT.1.SSuFWkXO9QZoYPHtka9IJ79umWFR9iFgIwXDT0G', 'user'),
(3, 'admin', 'admin@admin.fr', '$2y$10$Fwgj2T5Z9it79ko/0SLY8eNw8XqiRk9.mQG34M4Ctienv5hcSy/Sa', 'admin'),
(57, 'Ghost-Pandora', 'kilian.nicol@gmail.com', '$2y$10$kdc0OGCzmEZuKd0MD2KBke5pCElqYZz4A17O1lpShryMWrgFNg..m', 'user');

-- --------------------------------------------------------

--
-- Structure de la table `wusers_post_votes`
--

CREATE TABLE `wusers_post_votes` (
  `wusers_id` int(11) NOT NULL,
  `reponses_id` int(11) NOT NULL,
  `avotay` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `wusers_tags`
--

CREATE TABLE `wusers_tags` (
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `reponses`
--
ALTER TABLE `reponses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `wusers`
--
ALTER TABLE `wusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
