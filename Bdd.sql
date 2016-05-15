-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Sam 14 Mai 2016 à 14:54
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

INSERT INTO teamhubp_teamhub. `Appartient` (`u_pseudo`, `g_nom`, `a_admin`) VALUES
('Defarax', 'Cheval sur Place', 'admin'),
('Defarax', 'Curling sur Gazon', 'admin'),
('Natachou', 'Cheval sur Place', 'nonAdmin'),
('Natachou', 'Lalalou', 'admin'),
('Natachou', 'Sport de Chambre', 'admin'),
('Natachou', 'Tennis Féminin Nudiste', 'nonAdmin'),
('Pichupik', 'Bobsleigh TopDeck', 'admin'),
('Pichupik', 'Borderlands', 'admin'),
('Torlk', 'Druide Ramp', 'admin'),
('Torlk', 'MilleStone', 'admin'),
('Val78', 'Cheval sur Place', 'nonAdmin'),
('Val78', 'Tennis Féminin Nudiste', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `Clubs`
--

CREATE TABLE `Clubs` (
  `c_nom` varchar(255) NOT NULL,
  `c_hoCommentaire` text NOT NULL,
  `c_adresse` varchar(255) NOT NULL,
  `c_cp` varchar(255) NOT NULL,
  `c_numero` varchar(255) NOT NULL,
  `c_hoLundiDebut` time NOT NULL,
  `c_hoMardiDebut` time NOT NULL,
  `c_hoMercrediDebut` time NOT NULL,
  `c_hoJeudiDebut` time NOT NULL,
  `c_hoVendrediDebut` time NOT NULL,
  `c_hoSamediDebut` time NOT NULL,
  `c_hoDimancheDebut` time NOT NULL,
  `c_hoLundiFin` time NOT NULL,
  `c_hoMardiFin` time NOT NULL,
  `c_hoMercrediFin` time NOT NULL,
  `c_hoJeudiFin` time NOT NULL,
  `c_hoVendrediFin` time NOT NULL,
  `c_hoSamediFin` time NOT NULL,
  `c_hoDimancheFin` time NOT NULL,
  `c_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Clubs`
--

INSERT INTO teamhubp_teamhub. `Clubs` (`c_nom`, `c_hoCommentaire`, `c_adresse`, `c_cp`, `c_numero`, `c_hoLundiDebut`, `c_hoMardiDebut`, `c_hoMercrediDebut`, `c_hoJeudiDebut`, `c_hoVendrediDebut`, `c_hoSamediDebut`, `c_hoDimancheDebut`, `c_hoLundiFin`, `c_hoMardiFin`, `c_hoMercrediFin`, `c_hoJeudiFin`, `c_hoVendrediFin`, `c_hoSamediFin`, `c_hoDimancheFin`, `c_image`) VALUES
('DadaClub', ' Fermé les jours fériés', '74 rue Nationale', '75013', '0144239344', '07:00:00', '07:00:00', '07:00:00', '07:00:00', '07:00:00', '07:00:00', '07:00:00', '20:00:00', '20:00:00', '20:00:00', '20:00:00', '20:00:00', '20:00:00', '20:00:00', 'Accueil.jpg'),
('Racing Club de Curling', ' Fermé les dimanches et jours fériés', '97 avenue Felix Faure', '75015', '0123456789', '11:30:00', '11:30:00', '11:30:00', '11:30:00', '11:30:00', '13:00:00', '13:00:00', '00:00:00', '20:00:00', '20:00:00', '20:00:00', '20:00:00', '20:00:00', '20:00:00', 'Unknown.jpeg'),
('TiteLoloClub', ' Open tous les soirs', '128 rue de la boulette', '75008', '0169696969', '20:00:00', '20:00:00', '20:00:00', '20:00:00', '20:00:00', '21:00:00', '21:00:00', '00:00:00', '23:50:00', '23:50:00', '23:50:00', '23:50:00', '23:00:00', '23:00:00', 'Photo-le-08-01-2016-yy-16.48.jpg');

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
  `g_placesLibres` int(11) NOT NULL,
  `g_description` text NOT NULL,
  `g_placesTotal` int(11) NOT NULL,
  `g_nbrEvenements` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Groupes`
--

INSERT INTO teamhubp_teamhub. `Groupes` (`g_admin`, `g_nom`, `g_sport`, `g_departement`, `g_placesLibres`, `g_description`, `g_placesTotal`, `g_nbrEvenements`) VALUES
('Pichupik', 'Bobsleigh TopDeck', 'Bobsleigh', 'Cher', 29, '', 30, 0),
('Pichupik', 'Borderlands', 'Esport', 'Aude', 3, '', 4, 0),
('Defarax', 'Cheval sur Place', 'Équitation', 'Ardennes', 17, ' Dada', 20, 0),
('Defarax', 'Curling sur Gazon', 'Curling', 'Alpes-Maritimes', 11, '', 12, 0),
('Torlk', 'Druide Ramp', 'Esport', 'Paris', 1, '', 2, 0),
('Natachou', 'Lalalou', 'Aviron', 'Ardeche', 14, '', 15, 0),
('Torlk', 'MilleStone', 'Esport', 'Var', 39, '', 40, 0),
('Natachou', 'Sport de Chambre', 'Capoeira', 'Seine-Saint-Denis', 24, '', 25, 0),
('Val78', 'Tennis Féminin Nudiste', 'Tennis', 'Val-de-Marne', 8, '', 10, 0);

-- --------------------------------------------------------

--
-- Structure de la table `Note`
--

CREATE TABLE `Note` (
  `u_pseudo` varchar(255) NOT NULL,
  `c_nom` varchar(255) NOT NULL,
  `n_note` int(11) NOT NULL,
  `n_commentaire` text NOT NULL,
  `n_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Note`
--

INSERT INTO teamhubp_teamhub. `Note` (`u_pseudo`, `c_nom`, `n_note`, `n_commentaire`, `n_date`) VALUES
('admin', 'DadaClub', 1, 'CECI EST UN MESSAGE D''AVERTISSEMENT :\r\n\r\nCe club n''est pas conforme aux règles. Il sera :\r\n- soit modifié par notre équipe\r\n- soit supprimé du site\r\n\r\nCordialement,\r\n\r\nLe staff', '2016-05-13'),
('Defarax', 'DadaClub', 5, ' Un très bon club pour aller au Galop !', '2016-05-13'),
('Natachou', 'DadaClub', 1, ' Un très mauvais club. Je n''ai pas pu prendre mon pied ! A éviter ...', '2016-05-13'),
('Natachou', 'TiteLoloClub', 3, ' Elle est bien bonne ...', '2016-05-13'),
('Pichupik', 'Racing Club de Curling', 5, 'Oh, oui ! Du Curling ! J''adore ça ! <3 <3', '2016-05-13'),
('Pichupik', 'TiteLoloClub', 4, 'Déshabille toi Laure !', '2016-05-13'),
('Torlk', 'DadaClub', 2, 'LE PONEY 5/5 !!!!!! \r\nJ''ai pas TopDeck ...', '2016-05-13'),
('Torlk', 'TiteLoloClub', 1, ' On dirait un hamster ...', '2016-05-13');

-- --------------------------------------------------------

--
-- Structure de la table `Participe`
--

CREATE TABLE `Participe` (
  `u_pseudo` varchar(255) NOT NULL,
  `e_nom` varchar(255) NOT NULL,
  `e_createur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Pratique`
--

CREATE TABLE `Pratique` (
  `u_pseudo` varchar(255) NOT NULL,
  `s_nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `u_mdp` varchar(255) NOT NULL,
  `u_photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table des utilisateurs enregistrés';

--
-- Contenu de la table `Utilisateurs`
--

INSERT INTO teamhubp_teamhub. `Utilisateurs` (`u_pseudo`, `u_prenom`, `u_sexe`, `u_nom`, `u_adresse`, `u_ville`, `u_cp`, `u_region`, `u_portable`, `u_email`, `u_naissance`, `u_mdp`, `u_photo`) VALUES
('admin', 'Admin', 'Homme', 'Istrateur', '28 rue Notre Dame des Champs', 'Paris', '75006', 'Paris', '', 'contact@teamhub.fr', '2000-01-01', '$2y$10$eBgIsu3wUF9c7TYaVv8MEeH1vSJtydfECZZyTWpYRylOnPUeboX2u', 'twitter.png'),
('Client', 'Présentation', 'Homme', 'Client', '12 rue du Test', 'Paris', '75012', 'Paris', '0699999999', 'présentationclient@gmail.com', '2013-08-05', '$2y$10$Mtg/6GgWpTQSolG2tPLRDOByxlWFbfMXWL6aPdAFhDxEiWMqnL8cy', 'avatar.png'),
('Defarax', 'Romain', 'Homme', 'Frayssinet', '74 rue Nationale', 'Paris', '75013', 'Paris', '0643176805', 'romain.frayssinet@icloud.com', '1995-10-04', '$2y$10$WjfCjb6szS4rpuM8Yree7Of6WiIOGDjViRMuenjI2vxDmwRZME83e', 'Photo-le-23-09-2015-yy-16.22.jpg'),
('JeanLouis', 'Jean-Louis', 'Homme', 'Dumont', '74 avenue du Général Leclerc', 'Paris', '75012', 'Paris', '0678954321', 'jl@dumont.fr', '2002-09-14', '$2y$10$6d3EqZ38PI/wfZhI42BwPuB.EOAA4C8WlG7ATZsxC9mFqWplN15sS', 'avatar.png'),
('Natachou', 'Natacha', 'Femme', 'Gerard', '97 avenue de la République', '94300', 'Vincennes', 'Val-de-Marne', '06000', 'nnn@free.fr', '1995-11-27', '$2y$10$6d3EqZ38PI/wfZhI42BwPuB.EOAA4C8WlG7ATZsxC9mFqWplN15sS', 'avatar.png'),
('Pichupik', 'Guillaume', 'Homme', 'Harat', '49 rue des Boulets', 'Antony', '77943', 'Seine-et-Marne', '0678657912', 'g.harat@gmail.com', '1995-12-22', '$2y$10$6d3EqZ38PI/wfZhI42BwPuB.EOAA4C8WlG7ATZsxC9mFqWplN15sS', 'avatar.png'),
('Renaud', 'Renaud', 'Homme', 'D', '28 rue de ma paix', 'paris', '75001', 'Paris', '0344456734', 'renaud.donz@me.com', '2014-03-25', '$2y$10$hEUCR6SVqf6nMy7.8xqleO7XN706eO0frThHm72i4mOIA4oaqbe2u', 'avatar.png'),
('TiteLolo', 'Laure', 'Femme', 'de Rancourt de Mimérand-Verny', '128 rue Brancion', 'Paris', '75015', 'Paris', '0629486664', 'lolorm@hotmail.fr', '1995-02-06', '$2y$10$L1Ye5DLOvXKxlKuS5JpXcOJa1A6EWQM5i.xBNItj.E6YFohn7OFNG', 'avatar.png'),
('Torlk', 'Jaidlachence', 'Homme', 'Jeremy', '56 rue du TopDeck', 'Paris', '75014', 'Paris', '0663451299', 'jeremy@torlk.com', '2012-06-09', '$2y$10$6d3EqZ38PI/wfZhI42BwPuB.EOAA4C8WlG7ATZsxC9mFqWplN15sS', 'avatar.png'),
('Val78', 'Valentin', 'Homme', 'Fortun', '620 rue de Montamets', 'Orgeval', '78630', 'Yvelines', '0645986754', 'valentin.fortun@orange.fr', '1996-01-18', '$2y$10$6d3EqZ38PI/wfZhI42BwPuB.EOAA4C8WlG7ATZsxC9mFqWplN15sS', 'Photo-le-02-10-2015-yy-11.26.jpg');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Appartient`
--
ALTER TABLE `Appartient`
  ADD PRIMARY KEY (`u_pseudo`,`g_nom`);

--
-- Index pour la table `Clubs`
--
ALTER TABLE `Clubs`
  ADD PRIMARY KEY (`c_nom`),
  ADD UNIQUE KEY `c_image` (`c_image`);

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
-- Index pour la table `Note`
--
ALTER TABLE `Note`
  ADD PRIMARY KEY (`u_pseudo`,`c_nom`);

--
-- Index pour la table `Participe`
--
ALTER TABLE `Participe`
  ADD PRIMARY KEY (`u_pseudo`,`e_nom`);

--
-- Index pour la table `Pratique`
--
ALTER TABLE `Pratique`
  ADD PRIMARY KEY (`u_pseudo`,`s_nom`);

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
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT;
