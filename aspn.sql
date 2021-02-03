-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 03 fév. 2021 à 18:45
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `aspn`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `created_at`) VALUES
(1, 'Aut dolor praesentium qui elit hic sit voluptatem nisi labore corporis tempore ullamco vero', 'Aperiam voluptas quo', '2021-01-29 14:57:05'),
(2, 'Rerum tenetur blanditiis aut do ipsum quaerat ullamco', 'Ratione irure qui ea', '2021-02-02 17:19:47'),
(3, 'Est odio quis aut nisi ea corporis repudiandae assumenda deserunt magnam aut porro magnam in corrupti sed ex aut porro', 'Ea dolore distinctio', '2021-02-02 17:20:09'),
(4, 'Rerum eum', 'Qui quasi nihil et e', '2021-02-02 20:04:01'),
(5, 'Rerum eum', 'Qui quasi nihil et e', '2021-02-02 20:46:34'),
(6, 'Laboriosam', 'Est deserunt commodi', '2021-02-02 20:49:28'),
(7, 'Laboriosam', 'Est deserunt commodi', '2021-02-02 21:04:53');

-- --------------------------------------------------------

--
-- Structure de la table `convocation`
--

CREATE TABLE `convocation` (
  `id` int(11) NOT NULL,
  `team_id` int(11) DEFAULT NULL,
  `date` datetime NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opponent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meeting` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `convocation`
--

INSERT INTO `convocation` (`id`, `team_id`, `date`, `type`, `place`, `opponent`, `meeting`, `content`) VALUES
(1, 3, '2021-02-06 00:00:00', '1', 'Pouilly', 'Toto', '14h au stade', 'Prévoir gourde');

-- --------------------------------------------------------

--
-- Structure de la table `convocation_user`
--

CREATE TABLE `convocation_user` (
  `convocation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `convocation_user`
--

INSERT INTO `convocation_user` (`convocation_id`, `user_id`) VALUES
(1, 1),
(1, 2),
(1, 5),
(1, 6),
(1, 8);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210129135602', '2021-01-29 14:56:26', 11346),
('DoctrineMigrations\\Version20210201123028', '2021-02-01 13:30:36', 4052),
('DoctrineMigrations\\Version20210201123119', '2021-02-01 13:31:25', 1031),
('DoctrineMigrations\\Version20210202160258', '2021-02-02 17:03:08', 2272);

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

CREATE TABLE `picture` (
  `id` int(11) NOT NULL,
  `article_id` int(11) DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `legend` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `picture`
--

INSERT INTO `picture` (`id`, `article_id`, `team_id`, `name`, `legend`, `updated_at`) VALUES
(2, 3, NULL, NULL, NULL, '2021-02-02 17:20:09'),
(3, 4, NULL, NULL, NULL, '2021-02-02 20:04:01'),
(4, 5, NULL, NULL, NULL, '2021-02-02 20:46:34'),
(6, 7, NULL, '522546-6019b065ce69d930349456.jpeg', NULL, '2021-02-02 21:04:53');

-- --------------------------------------------------------

--
-- Structure de la table `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `program`
--

INSERT INTO `program` (`id`, `date`, `content`) VALUES
(4, '2023-04-24 12:38:00', 'Accusamus incidunt');

-- --------------------------------------------------------

--
-- Structure de la table `reset_password_request`
--

CREATE TABLE `reset_password_request` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `selector` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hashed_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requested_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `expires_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `result`
--

INSERT INTO `result` (`id`, `date`, `content`) VALUES
(1, '2024-01-22 10:55:00', 'Iure excepturi volup Iure excepturi volup'),
(2, '2024-01-22 10:55:00', 'Iure excepturi volup'),
(3, '2024-01-22 10:55:00', 'Iure excepturi volup');

-- --------------------------------------------------------

--
-- Structure de la table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `team`
--

INSERT INTO `team` (`id`, `name`) VALUES
(1, 'Séniors 1'),
(2, 'Séniors 2'),
(3, 'Féminines'),
(4, 'Loisirs');

-- --------------------------------------------------------

--
-- Structure de la table `team_user`
--

CREATE TABLE `team_user` (
  `team_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `team_user`
--

INSERT INTO `team_user` (`team_id`, `user_id`) VALUES
(1, 8),
(4, 8);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_player` tinyint(1) DEFAULT NULL,
  `is_coach` tinyint(1) DEFAULT NULL,
  `is_referee` tinyint(1) DEFAULT NULL,
  `is_leadership` tinyint(1) DEFAULT NULL,
  `position_held` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `lastname`, `firstname`, `is_player`, `is_coach`, `is_referee`, `is_leadership`, `position_held`, `avatar`, `is_verified`) VALUES
(1, NULL, '[]', NULL, 'Murello', 'Albane', 1, NULL, NULL, NULL, NULL, NULL, 0),
(2, NULL, '[]', NULL, 'Toto', 'toto', 1, NULL, NULL, NULL, NULL, NULL, 0),
(3, NULL, '[]', NULL, 'titi', 'titi', 1, NULL, NULL, NULL, NULL, NULL, 0),
(4, NULL, '[]', NULL, 'Coach', 'coach', NULL, 1, NULL, NULL, NULL, NULL, 0),
(5, NULL, '[]', NULL, 'Moutet', 'Patrick', NULL, NULL, NULL, 1, 'Président', NULL, 0),
(6, NULL, '[]', NULL, 'arbitre', 'arbitre', NULL, NULL, 1, NULL, NULL, NULL, 0),
(7, NULL, '[]', NULL, 'Clay', 'Desiree', NULL, NULL, 1, NULL, NULL, NULL, 0),
(8, NULL, '[]', NULL, 'Santiago', 'Jennifer', 1, NULL, NULL, NULL, NULL, NULL, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `convocation`
--
ALTER TABLE `convocation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_C03B3F5F296CD8AE` (`team_id`);

--
-- Index pour la table `convocation_user`
--
ALTER TABLE `convocation_user`
  ADD PRIMARY KEY (`convocation_id`,`user_id`),
  ADD KEY `IDX_2179CB80E8746F65` (`convocation_id`),
  ADD KEY `IDX_2179CB80A76ED395` (`user_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_16DB4F897294869C` (`article_id`),
  ADD KEY `IDX_16DB4F89296CD8AE` (`team_id`);

--
-- Index pour la table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7CE748AA76ED395` (`user_id`);

--
-- Index pour la table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`team_id`,`user_id`),
  ADD KEY `IDX_5C722232296CD8AE` (`team_id`),
  ADD KEY `IDX_5C722232A76ED395` (`user_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `convocation`
--
ALTER TABLE `convocation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `picture`
--
ALTER TABLE `picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `convocation`
--
ALTER TABLE `convocation`
  ADD CONSTRAINT `FK_C03B3F5F296CD8AE` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`);

--
-- Contraintes pour la table `convocation_user`
--
ALTER TABLE `convocation_user`
  ADD CONSTRAINT `FK_2179CB80A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_2179CB80E8746F65` FOREIGN KEY (`convocation_id`) REFERENCES `convocation` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `FK_16DB4F89296CD8AE` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`),
  ADD CONSTRAINT `FK_16DB4F897294869C` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`);

--
-- Contraintes pour la table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  ADD CONSTRAINT `FK_7CE748AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `team_user`
--
ALTER TABLE `team_user`
  ADD CONSTRAINT `FK_5C722232296CD8AE` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_5C722232A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
