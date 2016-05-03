-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Ven 08 Avril 2016 à 11:34
-- Version du serveur :  5.5.42
-- Version de PHP :  7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `TeamHub`
--

-- --------------------------------------------------------

--
-- Structure de la table `Appartient`
--

CREATE TABLE `Appartient` (
  `u_pseudo` varchar(255) NOT NULL,
  `g_nom` varchar(255) NOT NULL,
  `a_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Groupes`
--

CREATE TABLE `Groupes` (
  `g_admin` varchar(255) NOT NULL,
  `g_nom` varchar(255) NOT NULL,
  `g_sport` varchar(255) NOT NULL,
  `g_departement` varchar(255) NOT NULL,
  `g_description` text NOT NULL,
  `g_placesTotal` int(11) NOT NULL,
  `g_placesLibres` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateurs`
--

CREATE TABLE `Utilisateurs` (
  `u_pseudo` varchar(255) NOT NULL,
  `u_prenom` varchar(255) NOT NULL,
  `u_nom` varchar(255) NOT NULL,
  `u_sexe` varchar(255) NOT NULL,
  `u_adresse` varchar(255) NOT NULL,
  `u_ville` varchar(255) NOT NULL,
  `u_cp` varchar(255) NOT NULL,
  `u_region` varchar(255) NOT NULL,
  `u_portable` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_naissance` date NOT NULL,
  `u_mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table des utilisateurs enregistrés';

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Appartient`
--
ALTER TABLE `Appartient`
  ADD PRIMARY KEY (`u_pseudo`,`g_nom`);

--
-- Index pour la table `Groupes`
--
ALTER TABLE `Groupes`
  ADD PRIMARY KEY (`g_nom`),
  ADD UNIQUE KEY `g_nom` (`g_nom`);

--
-- Index pour la table `Utilisateurs`
--
ALTER TABLE `Utilisateurs`
  ADD PRIMARY KEY (`u_pseudo`),
  ADD UNIQUE KEY `u_pseudo` (`u_pseudo`),
  ADD UNIQUE KEY `u_email` (`u_email`),
