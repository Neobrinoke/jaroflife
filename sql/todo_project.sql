-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 14 Novembre 2017 à 09:39
-- Version du serveur :  5.7.20-0ubuntu0.16.04.1
-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

--
-- Contenu de la table `task`
--

INSERT INTO `task` (`taskid`, `tasklabel`, `description`, `priority`, `authorId`, `todo_id`, `created_at`, `deleted_at`, `updated_at`) VALUES
(9, 'test1', 'qsdsq', 3, 4, 1, '2017-11-13 09:00:03', '2017-11-13 11:21:43', '2017-11-13 11:21:43'),
(11, 'test tÃ¢che', 'finir ce site TDLdsqdqs', 3, 4, 1, '2017-11-13 09:00:03', '2017-11-13 12:30:39', '2017-11-13 12:30:39'),
(12, 'dsq', 'dsq', 1, 4, 2, '2017-11-13 09:00:03', '2017-11-13 16:25:04', '2017-11-13 16:25:04'),
(14, 'test', 'test', 1, 5, 2, '2017-11-13 09:00:03', '2017-11-13 16:25:05', '2017-11-13 16:25:05'),
(15, 'dqs', 'dsq', 2, 4, 1, '2017-11-13 09:00:03', '2017-11-13 16:25:01', '2017-11-13 16:25:01'),
(17, 'test4', 'test4 desc', 3, 4, 1, '2017-11-13 09:30:03', '2017-11-13 12:35:07', '2017-11-13 12:35:07'),
(18, 'test3', 'test445&gt;4D', 3, 4, 2, '2017-11-13 09:30:17', '2017-11-13 16:25:04', '2017-11-13 16:25:04'),
(19, 'dsq', 'dsq', 1, 4, 1, '2017-11-13 09:31:13', '2017-11-13 16:25:01', '2017-11-13 16:25:01'),
(20, 'qd&lt;GF', 'DQGHDFSQ', 1, 4, 2, '2017-11-13 09:31:20', '2017-11-13 16:25:05', '2017-11-13 16:25:05'),
(21, 'sfgujd', 'fjgdhjdghj', 1, 4, 2, '2017-11-13 09:31:36', '2017-11-13 16:25:06', '2017-11-13 16:25:06'),
(22, 'dqfgh', 'dhdsgfhdq', 1, 4, 6, '2017-11-13 10:00:58', '2017-11-13 16:25:08', '2017-11-13 16:25:08'),
(23, 'dqsdqsdqsd', 'sqdqdqsdqsdsqdqs', 1, 5, 1, '2017-11-13 10:03:10', '2017-11-13 16:25:02', '2017-11-13 16:25:02'),
(24, 'qdsfgqs', 'fdgqdsfgqdsf', 1, 4, 2, '2017-11-13 10:15:23', '2017-11-13 16:25:06', '2017-11-13 16:25:06'),
(25, 'dsqdqsdqsdqsd', 'qsdqsdqsdqsdqsdqsd', 1, 4, 7, '2017-11-13 10:15:29', '2017-11-13 16:25:11', '2017-11-13 16:25:11'),
(26, 'dsqdqsd', 'qsdqsdsq', 1, 4, 6, '2017-11-13 10:18:58', '2017-11-13 16:25:09', '2017-11-13 16:25:09'),
(27, 'dqsdqsdqsd', 'sqdqsdqsdqs', 1, 5, 1, '2017-11-13 10:19:56', '2017-11-13 11:20:51', '2017-11-13 11:20:51'),
(28, 'Finir ce site TDL', 'Je dois finir ce site TDL ( dsqqdsdsqdqssdqdsqdqsqds )dsqdqsdqsdsq', 3, 6, 9, '2017-11-13 13:36:26', '2017-11-13 13:38:57', '2017-11-13 13:38:57'),
(29, 'dsqdqsdqs', 'sqdqsdqs', 2, 4, 10, '2017-11-13 13:49:07', '2017-11-13 16:25:14', '2017-11-13 16:25:14'),
(30, 'test', 'test', 1, 5, 10, '2017-11-13 13:49:51', '2017-11-13 16:25:17', '2017-11-13 16:25:17');

-- --------------------------------------------------------

--
-- Structure de la table `todo_group`
--

CREATE TABLE `todo_group` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `author_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `todo_group`
--

INSERT INTO `todo_group` (`id`, `name`, `author_id`, `created_at`, `deleted_at`) VALUES
(1, 'Ma todo-list', 4, '2017-11-10 08:55:30', NULL),
(2, 'ma liste', 4, '2017-11-10 09:17:33', NULL),
(3, 'ma liste de test', 4, '2017-11-13 09:32:57', NULL),
(5, 'Test', 4, '2017-11-13 09:55:47', NULL),
(6, 'Test', 4, '2017-11-13 09:56:09', NULL),
(7, 'dqsdqsdqs', 4, '2017-11-13 09:56:17', NULL),
(8, 'dsqdqsdqs', 4, '2017-11-13 10:19:05', NULL),
(9, 'Ma TDL', 6, '2017-11-13 13:36:06', NULL),
(10, 'Ma 9eme liste', 4, '2017-11-13 13:48:54', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `todo_group_user`
--

CREATE TABLE `todo_group_user` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `todo_id` bigint(20) NOT NULL,
  `authority_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `todo_group_user`
--

INSERT INTO `todo_group_user` (`id`, `user_id`, `todo_id`, `authority_id`) VALUES
(1, 4, 1, 0),
(2, 5, 1, 1),
(3, 4, 2, 0),
(4, 4, 6, 0),
(5, 4, 7, 0),
(6, 4, 8, 0),
(7, 6, 9, 0),
(8, 4, 10, 0),
(9, 5, 10, 1);

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
-- Contenu de la table `user`
--

INSERT INTO `user` (`userid`, `login`, `password`, `name`, `email`) VALUES
(4, 'neobrinoke', 'a2d7953c806f11f0705dff837893b083893fbf1c', 'Alexis', 'neobrinoke@gmail.com'),
(5, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'test', 'test@test.fr'),
(6, 'test2', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'test2', 'test2@test.fr');

--
-- Index pour les tables exportées
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
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `task`
--
ALTER TABLE `task`
  MODIFY `taskid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT pour la table `todo_group`
--
ALTER TABLE `todo_group`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `todo_group_user`
--
ALTER TABLE `todo_group_user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `userid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
