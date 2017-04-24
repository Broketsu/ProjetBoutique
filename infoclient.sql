-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 30 Mars 2017 à 08:19
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ppe`
--

-- --------------------------------------------------------

--
-- Structure de la table `infoclient`
--

CREATE TABLE `infoclient` (
  `id` int(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `mdp` text NOT NULL,
  `mail` varchar(255) NOT NULL,
  `ddn` varchar(30) NOT NULL,
  `sexe` varchar(10) NOT NULL,
  `geo` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `infoclient`
--

INSERT INTO `infoclient` (`id`, `user`, `mdp`, `mail`, `ddn`, `sexe`, `geo`) VALUES
(19, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'test@test.fr', '1janvier2017', 'homme', 'test'),
(20, 'Antoine', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'antoine_maschi@hotmail.fr', '6aoÃ»t1998', 'homme', 'SÃ¨vres'),
(21, 'ppe', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'test@test.com', '1janvier2017', 'femme', 'ici');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `infoclient`
--
ALTER TABLE `infoclient`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `user` (`user`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `infoclient`
--
ALTER TABLE `infoclient`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
