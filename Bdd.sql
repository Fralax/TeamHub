-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mer 04 Mai 2016 à 17:46
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

--
-- Contenu de la table `Appartient`
--

INSERT INTO `Appartient` (`u_pseudo`, `g_nom`, `a_admin`) VALUES
('Defarax', 'Alpinisme sur Colline', 'nonAdmin'),
('Defarax', 'Boxe DeckLégende', 'nonAdmin'),
('Defarax', 'Cheval sur Place', 'admin'),
('Defarax', 'Curling sur parquet', 'admin'),
('Defarax', 'Lalalou', 'nonAdmin'),
('Defarax', 'Tennis Double', 'nonAdmin'),
('Defarax', 'Tennis Féminin Nudiste', 'nonAdmin'),
('Defarax', 'Test', 'admin'),
('JeanLouis', 'Bobsleigh sur Gazon', 'nonAdmin'),
('Natachou', 'Lalalou', 'nonAdmin'),
('Pichupik', 'Alpinisme sur Colline', 'admin'),
('Pichupik', 'Bobsleigh sur Gazon', 'nonAdmin'),
('Pichupik', 'Curling sur parquet', 'nonAdmin'),
('Pichupik', 'Lalalou', 'nonAdmin'),
('Pichupik', 'Tennis Féminin Nudiste', 'nonAdmin'),
('TiteLolo', 'Cheval sur Place', 'nonAdmin'),
('TiteLolo', 'Tennis Féminin Nudiste', 'nonAdmin'),
('Torlk', 'Boxe DeckLégende', 'admin'),
('Torlk', 'Tennis du TopDeck', 'admin'),
('Val78', 'Alpinisme sur Colline', 'nonAdmin'),
('Val78', 'Bobsleigh sur Gazon', 'admin'),
('Val78', 'Cheval sur Place', 'nonAdmin'),
('Val78', 'Curling sur parquet', 'nonAdmin'),
('Val78', 'Lalalou', 'nonAdmin'),
('Val78', 'Tennis Double', 'admin'),
('Val78', 'Tennis du TopDeck', 'nonAdmin'),
('Val78', 'Tennis Féminin Nudiste', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `Evenements`
--

CREATE TABLE `Evenements` (
  `e_id` int(11) NOT NULL,
  `e_date` date NOT NULL,
  `e_createur` varchar(255) NOT NULL,
  `e_heure` time NOT NULL,
  `g_nom` varchar(255) NOT NULL,
  `c_nom` varchar(255) NOT NULL,
  `e_nom` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Evenements`
--

INSERT INTO `Evenements` (`e_id`, `e_date`, `e_createur`, `e_heure`, `g_nom`, `c_nom`, `e_nom`) VALUES
(1, '2016-10-03', 'Defarax', '17:30:00', 'Alpinisme sur Colline', 'ClubEiffelTour', 'On escalade la Tour Eiffel'),
(2, '2016-12-02', 'Val78', '14:40:00', 'Alpinisme sur Colline', 'HuezClub', 'Alpinisme sur Alpes'),
(3, '2016-01-02', 'Defarax', '17:00:00', 'Curling sur parquet', 'Pigalle ', 'GALOP');

-- --------------------------------------------------------

--
-- Structure de la table `Groupes`
--

CREATE TABLE `Groupes` (
  `g_admin` varchar(255) NOT NULL,
  `g_nom` varchar(255) NOT NULL,
  `g_sport` varchar(255) NOT NULL,
  `g_departement` varchar(255) NOT NULL,
  `g_placesLibres` int(11) NOT NULL,
  `g_description` text NOT NULL,
  `g_placesTotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Groupes`
--

INSERT INTO `Groupes` (`g_admin`, `g_nom`, `g_sport`, `g_departement`, `g_placesLibres`, `g_description`, `g_placesTotal`) VALUES
('Pichupik', 'Alpinisme sur Colline', 'Alpinisme', 'Cantal', 2, '', 5),
('Val78', 'Bobsleigh sur Gazon', 'Bobsleigh', 'Ardeche', 17, '', 20),
('Torlk', 'Boxe DeckLégende', 'Boxe', 'Doubs', 0, '', 3),
('Defarax', 'Cheval sur Place', 'Équitation', 'Paris', 12, '', 15),
('Defarax', 'Curling sur parquet', 'Curling', 'Haute-Corse', 52, '', 55),
('Natachou', 'Lalalou', 'Athlétisme', 'Haute-Garonne', 16, ' vbeodpznqsxôvnz iqpdbsvôclmneaqbdipvqxc \r\n', 20),
('Val78', 'Tennis Double', 'Tennis', 'Correze', 3, ' Tennis double entre potes !', 5),
('Torlk', 'Tennis du TopDeck', 'Tennis', 'Tarn-et-Garonne', 0, '', 2),
('Val78', 'Tennis Féminin Nudiste', 'Tennis', 'Bouches-du-Rhone', 6, '', 10),
('Defarax', 'Test', 'Aérobic', 'Ariege', 29, '', 30);

-- --------------------------------------------------------

--
-- Structure de la table `Participe`
--

CREATE TABLE `Participe` (
  `u_pseudo` varchar(255) NOT NULL,
  `e_nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Participe`
--

INSERT INTO `Participe` (`u_pseudo`, `e_nom`) VALUES
('Defarax', 'Alpinisme sur Alpes'),
('Defarax', 'On escalade la Tour Eiffel');

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateurs`
--

CREATE TABLE `Utilisateurs` (
  `u_pseudo` varchar(255) NOT NULL,
  `u_prenom` varchar(255) NOT NULL,
  `u_sexe` varchar(255) NOT NULL,
  `u_nom` varchar(255) NOT NULL,
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
-- Contenu de la table `Utilisateurs`
--

INSERT INTO `Utilisateurs` (`u_pseudo`, `u_prenom`, `u_sexe`, `u_nom`, `u_adresse`, `u_ville`, `u_cp`, `u_region`, `u_portable`, `u_email`, `u_naissance`, `u_mdp`) VALUES
('Defarax', 'Romain', 'Homme', 'Frayssinet', '74 rue Nationale', 'Paris', '75013', 'Paris', '0643176804', 'romain.frayssinet@icloud.com', '1995-10-04', '$2y$10$WjfCjb6szS4rpuM8Yree7Of6WiIOGDjViRMuenjI2vxDmwRZME83e'),
('JeanLouis', 'Jean-Louis', 'Homme', 'Dumont', '74 avenue du Général Leclerc', 'Paris', '75012', 'Paris', '0678954321', 'jl@dumont.fr', '2002-09-14', '$2y$10$6d3EqZ38PI/wfZhI42BwPuB.EOAA4C8WlG7ATZsxC9mFqWplN15sS'),
('Natachou', 'Natacha', 'Femme', 'Gerard', '97 avenue de la République', '94300', 'Vincennes', 'Val-de-Marne', '06000', 'nnn@free.fr', '1995-11-27', '$2y$10$6d3EqZ38PI/wfZhI42BwPuB.EOAA4C8WlG7ATZsxC9mFqWplN15sS'),
('Pichupik', 'Guillaume', 'Homme', 'Harat', '49 rue des Boulets', 'Antony', '77943', 'Seine-et-Marne', '0678657912', 'g.harat@gmail.com', '1995-12-22', '$2y$10$6d3EqZ38PI/wfZhI42BwPuB.EOAA4C8WlG7ATZsxC9mFqWplN15sS'),
('TiteLolo', 'Laure', 'Femme', 'de Rancourt de Mimérand-Verny', '128 rue Brancion', 'Paris', '75015', 'Paris', '0629486664', 'lolorm@hotmail.fr', '1995-02-06', '$2y$10$L1Ye5DLOvXKxlKuS5JpXcOJa1A6EWQM5i.xBNItj.E6YFohn7OFNG'),
('Torlk', 'Jaidlachence', 'Homme', 'Jeremy', '56 rue du TopDeck', 'Paris', '75014', 'Paris', '0663451299', 'jeremy@torlk.com', '2012-06-09', '$2y$10$6d3EqZ38PI/wfZhI42BwPuB.EOAA4C8WlG7ATZsxC9mFqWplN15sS'),
('Val78', 'Valentin', 'Homme', 'Fortun', '620 rue de Montamets', 'Orgeval', '78630', 'Yvelines', '0645986754', 'valentin.fortun@orange.fr', '1996-01-18', '$2y$10$6d3EqZ38PI/wfZhI42BwPuB.EOAA4C8WlG7ATZsxC9mFqWplN15sS');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Appartient`
--
ALTER TABLE `Appartient`
  ADD PRIMARY KEY (`u_pseudo`,`g_nom`);

--
-- Index pour la table `Evenements`
--
ALTER TABLE `Evenements`
  ADD PRIMARY KEY (`e_id`);

--
-- Index pour la table `Groupes`
--
ALTER TABLE `Groupes`
  ADD PRIMARY KEY (`g_nom`),
  ADD UNIQUE KEY `g_nom` (`g_nom`);

--
-- Index pour la table `Participe`
--
ALTER TABLE `Participe`
  ADD PRIMARY KEY (`u_pseudo`,`e_nom`);

--
-- Index pour la table `Utilisateurs`
--
ALTER TABLE `Utilisateurs`
  ADD PRIMARY KEY (`u_pseudo`),
  ADD UNIQUE KEY `u_id` (`u_pseudo`),
  ADD UNIQUE KEY `u_email` (`u_email`),
  ADD UNIQUE KEY `u_email_2` (`u_email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Evenements`
--
ALTER TABLE `Evenements`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;--
-- Base de données :  `myboost`
--

-- --------------------------------------------------------

--
-- Structure de la table `sportif`
--

CREATE TABLE `sportif` (
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `code_postal` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `sportif`
--

INSERT INTO `sportif` (`nom`, `prenom`, `pseudo`, `sexe`, `date`, `adresse`, `code_postal`, `ville`, `pays`, `tel`, `mail`, `mot_de_passe`) VALUES
('Frayssinet', 'Romain', 'test', 'Homme', '0000-00-00', '74 rue Nationale', '75013', 'Paris', 'France', '0611850332', 'f@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `sportif`
--
ALTER TABLE `sportif`
  ADD PRIMARY KEY (`pseudo`),
  ADD UNIQUE KEY `pseudo` (`pseudo`),
  ADD UNIQUE KEY `mail` (`mail`);
