-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  sam. 18 nov. 2017 à 12:10
-- Version du serveur :  5.7.19-log
-- Version de PHP :  7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `todo_project`
--
CREATE DATABASE IF NOT EXISTS `todo_project` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `todo_project`;

-- --------------------------------------------------------

--
-- Structure de la table `task`
--

CREATE TABLE `task` (
  `taskid` bigint(20) NOT NULL,
  `tasklabel` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `priority` int(11) NOT NULL,
  `authorId` bigint(20) NOT NULL,
  `todo_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `todo_group`
--

CREATE TABLE `todo_group` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(512) NOT NULL,
  `author_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `todo_group_user`
--

CREATE TABLE `todo_group_user` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `todo_id` bigint(20) NOT NULL,
  `authority_id` int(11) NOT NULL,
  `joined_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `userid` bigint(20) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`userid`, `login`, `password`, `name`, `email`) VALUES(7, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'test', 'test@test.fr');
INSERT INTO `user` (`userid`, `login`, `password`, `name`, `email`) VALUES(8, 'test2', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'test2', 'test2@gmail.com');
INSERT INTO `user` (`userid`, `login`, `password`, `name`, `email`) VALUES(9, 'test3', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'test3', 'test3@gmail.com');
INSERT INTO `user` (`userid`, `login`, `password`, `name`, `email`) VALUES(10, 'test4', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'test4', 'test4@gmail.com');
INSERT INTO `user` (`userid`, `login`, `password`, `name`, `email`) VALUES(11, 'test5', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'test5', 'test5@gmail.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`taskid`);

--
-- Index pour la table `todo_group`
--
ALTER TABLE `todo_group`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `todo_group_user`
--
ALTER TABLE `todo_group_user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `task`
--
ALTER TABLE `task`
  MODIFY `taskid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT pour la table `todo_group`
--
ALTER TABLE `todo_group`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `todo_group_user`
--
ALTER TABLE `todo_group_user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `userid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
