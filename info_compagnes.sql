-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : sam. 30 oct. 2021 à 14:45
-- Version du serveur :  5.7.24
-- Version de PHP : 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `info_compagnes`
--

-- --------------------------------------------------------

--
-- Structure de la table `ads_company`
--

CREATE TABLE `ads_company` (
  `ads_company_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `pub` int(11) NOT NULL DEFAULT '0',
  `top` int(11) NOT NULL DEFAULT '0',
  `ordre` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ads_company`
--

INSERT INTO `ads_company` (`ads_company_id`, `name`, `pub`, `top`, `ordre`) VALUES
(1, 'Google ADS', 1, 0, 1),
(2, 'Bing ', 1, 0, 2),
(3, 'Facebook Ads', 1, 0, 3);

-- --------------------------------------------------------

--
-- Structure de la table `urls`
--

CREATE TABLE `urls` (
  `urls_id` int(11) NOT NULL,
  `domain_name` varchar(255) DEFAULT NULL,
  `address_id` varchar(100) DEFAULT NULL,
  `address_type` int(11) NOT NULL DEFAULT '0',
  `urls_typevisa` int(11) NOT NULL DEFAULT '0',
  `url_langage` int(11) NOT NULL DEFAULT '0',
  `vps_host` varchar(255) DEFAULT NULL,
  `vps_ip` varchar(255) DEFAULT NULL,
  `vps_type` int(11) NOT NULL DEFAULT '0',
  `gmail_name` varchar(255) DEFAULT NULL,
  `gmail_user` varchar(255) DEFAULT NULL,
  `gmail_phone` varchar(100) DEFAULT NULL,
  `gmail_phone_type` int(11) NOT NULL DEFAULT '0',
  `date_add` datetime DEFAULT NULL,
  `date_install` datetime DEFAULT NULL,
  `date_open` datetime DEFAULT NULL,
  `date_close` datetime DEFAULT NULL,
  `pub` int(11) NOT NULL DEFAULT '0',
  `top` int(11) NOT NULL DEFAULT '0',
  `ordre` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `urls`
--

INSERT INTO `urls` (`urls_id`, `domain_name`, `address_id`, `address_type`, `urls_typevisa`, `url_langage`, `vps_host`, `vps_ip`, `vps_type`, `gmail_name`, `gmail_user`, `gmail_phone`, `gmail_phone_type`, `date_add`, `date_install`, `date_open`, `date_close`, `pub`, `top`, `ordre`) VALUES
(1, 'unitedstates-travel.com', '190.92.132.193', 1, 1, 2, 'vps-a26c9c17.vps.ovh.net', '51.178.16.215', 1, 'Lucretia Draeger', 'lucretia.draeger@gmail.com', '0621 162 462', 1, '2021-10-25 16:35:00', '2021-10-26 15:57:34', NULL, NULL, 1, 0, 1),
(2, 'us-agreement.com', '185.146.22.229', 0, 1, 2, 'vps-019fd98d.vps.ovh.net', '193.70.2.218', 1, 'Telford Quessy', 'quessytelford@gmail.com', '0649 066 143', 1, '2021-10-25 17:55:26', '2021-10-26 15:57:31', NULL, NULL, 1, 0, 2),
(3, 'usa-agrement.com', '185.146.22.229', 0, 1, 1, 'vps-297707d8.vps.ovh.net', '141.94.220.93', 1, 'Thomas Fréchette', 'thomasfrechette0@gmail.com', '0649 057 782', 1, '2021-10-25 17:56:31', '2021-10-26 12:53:35', NULL, NULL, 1, 0, 3);

-- --------------------------------------------------------

--
-- Structure de la table `urls_ads`
--

CREATE TABLE `urls_ads` (
  `urls_ads_id` int(11) NOT NULL,
  `url_id` int(11) NOT NULL DEFAULT '0',
  `ads_company` int(11) NOT NULL DEFAULT '0',
  `date_open` datetime DEFAULT NULL,
  `date_start` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `pub` int(11) NOT NULL DEFAULT '0',
  `top` int(11) NOT NULL DEFAULT '0',
  `ordre` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `urls_languages`
--

CREATE TABLE `urls_languages` (
  `urls_languages_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `pub` int(11) NOT NULL DEFAULT '0',
  `top` int(11) NOT NULL DEFAULT '0',
  `ordre` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `urls_languages`
--

INSERT INTO `urls_languages` (`urls_languages_id`, `name`, `pub`, `top`, `ordre`) VALUES
(1, 'Français', 1, 0, 1),
(2, 'Anglais', 1, 0, 2),
(3, 'Allemande', 1, 0, 3),
(4, 'Italienne', 1, 0, 4);

-- --------------------------------------------------------

--
-- Structure de la table `visa_types`
--

CREATE TABLE `visa_types` (
  `visa_types_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `pub` int(11) NOT NULL DEFAULT '0',
  `top` int(11) NOT NULL DEFAULT '0',
  `ordre` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `visa_types`
--

INSERT INTO `visa_types` (`visa_types_id`, `name`, `pub`, `top`, `ordre`) VALUES
(1, 'ESTA', 1, 0, 1),
(2, 'AVE', 1, 0, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ads_company`
--
ALTER TABLE `ads_company`
  ADD PRIMARY KEY (`ads_company_id`);

--
-- Index pour la table `urls`
--
ALTER TABLE `urls`
  ADD PRIMARY KEY (`urls_id`);

--
-- Index pour la table `urls_ads`
--
ALTER TABLE `urls_ads`
  ADD PRIMARY KEY (`urls_ads_id`);

--
-- Index pour la table `urls_languages`
--
ALTER TABLE `urls_languages`
  ADD PRIMARY KEY (`urls_languages_id`);

--
-- Index pour la table `visa_types`
--
ALTER TABLE `visa_types`
  ADD PRIMARY KEY (`visa_types_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ads_company`
--
ALTER TABLE `ads_company`
  MODIFY `ads_company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `urls`
--
ALTER TABLE `urls`
  MODIFY `urls_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `urls_ads`
--
ALTER TABLE `urls_ads`
  MODIFY `urls_ads_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `urls_languages`
--
ALTER TABLE `urls_languages`
  MODIFY `urls_languages_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `visa_types`
--
ALTER TABLE `visa_types`
  MODIFY `visa_types_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
