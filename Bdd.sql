-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mer 18 Mai 2016 à 09:13
-- Version du serveur :  5.5.42
-- Version de PHP :  7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `teamhubp_teamhub`
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
('micha', 'Football ', 'admin'),
('micha', 'Tennis double', 'nonAdmin'),
('pichupik', 'Cours de Golf', 'admin'),
('Val', 'Football 06', 'admin'),
('Val78', 'Cours de Golf', 'nonAdmin'),
('Val78', 'Football', 'nonAdmin'),
('Val78', 'Tennis double', 'admin'),
('vero', 'Cours de Golf', 'nonAdmin');

-- --------------------------------------------------------

--
-- Structure de la table `Bannis`
--

CREATE TABLE `Bannis` (
  `b_nom` varchar(255) NOT NULL,
  `b_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Bannis`
--

INSERT INTO `Bannis` (`b_nom`, `b_email`) VALUES
('vero', 'veronique.fortun@wanadoo.fr');

-- --------------------------------------------------------

--
-- Structure de la table `Clubs`
--

CREATE TABLE `Clubs` (
  `c_nom` varchar(255) NOT NULL,
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
  `c_hoCommentaire` varchar(255) NOT NULL,
  `c_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Clubs`
--

INSERT INTO `Clubs` (`c_nom`, `c_adresse`, `c_cp`, `c_numero`, `c_hoLundiDebut`, `c_hoMardiDebut`, `c_hoMercrediDebut`, `c_hoJeudiDebut`, `c_hoVendrediDebut`, `c_hoSamediDebut`, `c_hoDimancheDebut`, `c_hoLundiFin`, `c_hoMardiFin`, `c_hoMercrediFin`, `c_hoJeudiFin`, `c_hoVendrediFin`, `c_hoSamediFin`, `c_hoDimancheFin`, `c_hoCommentaire`, `c_image`) VALUES
('2ème essai', '30 rue de soie ', '09456', '045464883', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', ' ', 'Accueil.jpg'),
('Club Oxygène', '8 rue de Témara', '78100', '0134511019 ', '09:00:00', '09:00:00', '09:00:00', '09:00:00', '09:00:00', '09:00:00', '09:00:00', '00:00:00', '20:00:00', '20:00:00', '20:00:00', '20:00:00', '20:00:00', '20:00:00', ' ', 'O2.jpeg'),
('Golf Club d''Antony', 'Voie de la Vallée de la Bièvre ', '91370 ', '01 60 19 37 82', '09:00:00', '09:00:00', '09:00:00', '09:00:00', '09:00:00', '09:00:00', '09:00:00', '00:00:00', '20:00:00', '20:00:00', '20:00:00', '20:00:00', '20:00:00', '20:00:00', ' Les horaires peuvent être modifiés les jours fériés', 'golf-verrieres.jpg'),
('Golf de Villennes', 'Villennes', '78700', '0139567800', '08:00:00', '09:10:00', '07:30:00', '08:10:00', '08:20:00', '07:10:00', '07:50:00', '19:30:00', '22:20:00', '19:50:00', '23:00:00', '21:20:00', '20:00:00', '19:30:00', ' ', 'Accueil.jpg'),
('Saint-Marc', 'Plateau Saint Marc', '78630', '0139754367', '09:00:00', '10:00:00', '09:30:00', '08:30:00', '11:00:00', '09:00:00', '09:00:00', '00:00:00', '20:30:00', '20:00:00', '18:30:00', '22:00:00', '23:30:00', '13:00:00', ' Fermé les jours fériés', 'stmarc.jpg'),
('Test Champ', 'eqhet', 'etqherth', 'qrthqert', '01:10:00', '01:10:00', '01:10:00', '01:10:00', '01:10:00', '01:10:00', '01:10:00', '01:10:00', '01:10:00', '01:10:00', '01:10:00', '01:10:00', '01:10:00', '01:10:00', ' BLBLL', 'Accueil.jpg'),
('Test Image ', '20 rue de test', '75014', '0656849345', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', ' Bonjour les horaires de merde !', '');

-- --------------------------------------------------------

--
-- Structure de la table `Evenements`
--

CREATE TABLE `Evenements` (
  `e_id` int(12) NOT NULL,
  `e_nom` varchar(255) NOT NULL,
  `e_date` date NOT NULL,
  `e_createur` varchar(255) NOT NULL,
  `e_heure` time NOT NULL,
  `g_nom` varchar(255) NOT NULL,
  `c_nom` varchar(255) NOT NULL,
  `e_placesTotal` int(11) NOT NULL,
  `e_placesLibres` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Evenements`
--

INSERT INTO `Evenements` (`e_id`, `e_nom`, `e_date`, `e_createur`, `e_heure`, `g_nom`, `c_nom`, `e_placesTotal`, `e_placesLibres`) VALUES
(41, 'Match', '2016-07-20', 'Val', '11:25:00', 'Football 06', '2ème essai', 0, 0),
(50, 'Coupe de Golf', '2016-06-06', 'vero', '08:00:00', 'Cours de Golf', 'Golf Club d''Antony', 0, 0),
(52, 'coupe de golf sur bitume', '2016-06-18', 'Val78', '03:00:00', 'Cours de Golf', 'Club Oxygène', 0, 0);

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
  `g_placesLibres` int(11) NOT NULL,
  `g_nbrEvenements` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Groupes`
--

INSERT INTO `Groupes` (`g_admin`, `g_nom`, `g_sport`, `g_departement`, `g_description`, `g_placesTotal`, `g_placesLibres`, `g_nbrEvenements`) VALUES
('pichupik', 'Cours de Golf', 'Golf', 'Hauts-de-Seine', '', 15, 14, 2),
('micha', 'Football ', 'Football', 'Paris', '', 14, 12, 0),
('Val', 'Football 06', 'Football', 'Alpes-Maritimes', '', 30, 29, 1),
('Val78', 'Tennis double', 'Tennis', 'Yvelines', ' Petit double pour se détendre', 8, 6, 0);

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

INSERT INTO `Note` (`u_pseudo`, `c_nom`, `n_note`, `n_commentaire`, `n_date`) VALUES
('micha', 'Saint-Marc', 3, ' test', '2016-05-12'),
('micha', 'Test Image', 1, '', '2016-05-15'),
('pichupik', 'Golf de Villennes', 1, ' C''est pas très bien entretenu ...', '2016-05-15'),
('Pichupik', 'Saint-Marc', 1, ' Pas terrible !', '2016-05-13'),
('Val', 'Golf de Villennes', 3, ' C''est pas mal mais ca pourrait être mieux !', '2016-05-15'),
('Val', 'Saint-Marc', 1, ' Bof, Bof ...', '2016-05-13'),
('Val78', 'Golf de Villennes', 5, ' Excellent !', '2016-05-15'),
('Val78', 'Saint-Marc', 5, 'Très bon centre de sport ! ', '2016-05-10'),
('vero', 'Golf de Villennes', 4, ' Très bon club pour démarrer le golf', '2016-05-15'),
('vero', 'Saint-Marc', 2, ' Peut mieux faire', '2016-05-15');

-- --------------------------------------------------------

--
-- Structure de la table `Participe`
--

CREATE TABLE `Participe` (
  `u_pseudo` varchar(255) NOT NULL,
  `e_nom` varchar(255) NOT NULL,
  `e_createur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Participe`
--

INSERT INTO `Participe` (`u_pseudo`, `e_nom`, `e_createur`) VALUES
('Val', 'Match', 'createur');

-- --------------------------------------------------------

--
-- Structure de la table `Pratique`
--

CREATE TABLE `Pratique` (
  `u_pseudo` varchar(255) NOT NULL,
  `s_nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Pratique`
--

INSERT INTO `Pratique` (`u_pseudo`, `s_nom`) VALUES
('vero', 'Aviron'),
('vero', 'Badminton'),
('vero', 'Conduite sur glace'),
('vero', 'Équitation');

-- --------------------------------------------------------

--
-- Structure de la table `Sports`
--

CREATE TABLE `Sports` (
  `s_nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Sports`
--

INSERT INTO `Sports` (`s_nom`) VALUES
('Aérobic'),
('Aïkido'),
('Alpinisme'),
('Apnée'),
('Athlétisme'),
('Aviron'),
('Badminton'),
('Balle au tambourin'),
('Bando'),
('Base jump'),
('Baseball'),
('Basket-ball'),
('Bateau-Dragon'),
('Biathlon'),
('Billard'),
('BMX'),
('Bobsleigh'),
('Bowling'),
('Boxe'),
('Canoë'),
('Canoë-kayak'),
('Canyoning'),
('Capoeira'),
('Catch'),
('Cheerleading'),
('Conduite sur glace'),
('Course'),
('Course d orientation'),
('Cricket'),
('Croquet'),
('Crosse'),
('Curling'),
('Cyclisme'),
('Danse'),
('Décathlon'),
('Deltaplane'),
('Échecs'),
('Équitation'),
('Escalade'),
('Escrime'),
('Esport'),
('Floorball'),
('Football'),
('Football américain'),
('Futsal'),
('Golf'),
('Gymnastique'),
('Hakko-Ryu'),
('Haltérophilie'),
('Handball'),
('Hockey sur gazon'),
('Hockey sur glace'),
('Horse-ball'),
('Hurling'),
('Iaïdo'),
('Iaïjutsu'),
('Java'),
('Javelot'),
('Jerk'),
('Jeu de paume'),
('Jogging'),
('Joutes nautiques'),
('Ju-Jitsu'),
('Judo'),
('Jumping'),
('Karaté'),
('Karting'),
('Kathak'),
('Keirin'),
('Kempo'),
('Kendo'),
('Kick-boxing'),
('Kin-ball'),
('Kitesurfing'),
('Krav maga'),
('Kronum'),
('Kung fu'),
('Luge de course'),
('Lutte'),
('Marathon'),
('Marche'),
('Motocross'),
('Muay thaï'),
('Musculation'),
('Naban'),
('Natation'),
('Natation synchronisée'),
('Nautisme'),
('Optimist'),
('Paddle'),
('Paintball'),
('Parachutisme'),
('Parapente'),
('Parkour'),
('Patinage artistique'),
('Patinage de vitesse'),
('Pêche'),
('Pelote basque'),
('Pentathlon'),
('Pétanque'),
('Ping-Pong'),
('Plongée'),
('Polo'),
('Qi gong'),
('Quadrille'),
('Rafting'),
('Rallye automobile'),
('Régate'),
('Ringuette'),
('Rink hockey'),
('Roller'),
('Rugby'),
('Salsa'),
('Savate'),
('Shinty'),
('Skateboard'),
('Skater hockey'),
('Skeleton'),
('Ski alpin'),
('Ski de fond'),
('Ski nautique'),
('Ski nordique'),
('Slamball'),
('Snowboard'),
('Softball'),
('Spéléologie'),
('Squash'),
('Sumo'),
('Supermotard'),
('Surf'),
('Tae Bo'),
('Taekwondo'),
('Tai Chi'),
('Taihojutsu'),
('Tambourin'),
('Tango'),
('Tchoukball'),
('Tennis'),
('Tennis de table'),
('Tennis léger'),
('Tir'),
('Tir à l arc'),
('Triathlon'),
('Tricking'),
('Twirling'),
('ULM'),
('Ultimate'),
('Unihockey'),
('Valse'),
('Varappe'),
('Voile'),
('Volata'),
('Volley-ball'),
('Voltige'),
('VTT'),
('Wakeboard'),
('Water polo'),
('Wing Chun'),
('Yoga'),
('Zen Hakko Kaï'),
('Zouk'),
('Zumba');

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
  `u_mdp` varchar(255) NOT NULL,
  `u_photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table des utilisateurs enregistrés';

--
-- Contenu de la table `Utilisateurs`
--

INSERT INTO `Utilisateurs` (`u_pseudo`, `u_prenom`, `u_nom`, `u_sexe`, `u_adresse`, `u_ville`, `u_cp`, `u_region`, `u_portable`, `u_email`, `u_naissance`, `u_mdp`, `u_photo`) VALUES
('admin', 'Admin', 'Istrateur', 'Homme', '28 rue Notre-Dame des Champs', 'Paris', '75006', 'Paris', '0000000000', 'contact@teamHub.com', '2000-01-01', '$2y$10$Z8zyMUvfroLiBFMH0K8ZaebImajzzbol6os9igNn1NQ9S4/F8B3P2', 'avatar.png'),
('Defarax', 'Romain ', 'Frayssinet', 'Homme', '74 rue de National', 'Paris', '75013', 'Paris', '0667061977', 'frayssinetr@gmail.com', '1995-09-10', '$2y$10$otUMYzcwAXF9OjkGwtmXGO3/jJ3N2fGfG7pAzDzL17dG1mkM3B416', 'avatar.png'),
('micha', 'Michael', 'Elbaz', 'Homme', '194 quai de jemmapes', 'Paris', '75010', 'Paris', '0699651612', 'mickelbaz@gmail.com', '1995-12-16', '$2y$10$VR9EQ3Nxl/3fG2MlUUhAY.AmRKmAJ9BzX2us4wQnEGt.ELz.WRZ3K', 'avatar.png'),
('Pichupik', 'Guillaume', 'Harat', 'Homme', 'rue de la butte', 'Antony', '92160', 'Hauts-de-Seine', '0945678934', 'guillaume.harat@gmail.com', '1995-12-11', '$2y$10$6zk4RIdvP/KHCTdfJxGwEelxJr/legqTUOclZGflBh51i4InBhrC.', 'avatar.png'),
('Val', 'Valentin', 'Fortun', 'Homme', 'dqgqerg', 'qergeqrg', 'qergeqrg', 'Alpes-de-Haute-Provence', 'reggae', 'valentin.fortun@orange.fr', '2013-07-04', '$2y$10$6d3EqZ38PI/wfZhI42BwPuB.EOAA4C8WlG7ATZsxC9mFqWplN15sS', 'Logo.png'),
('Val78', 'Valentin', 'Fortun', 'Homme', '620 rue de Montamets', 'Orgeval', '78630', 'Yvelines', '0667061788', 'val78.fortun@gmail.com', '1996-01-18', '$2y$10$3W1/9FmuhUf3hE.DykmQt.ZV2XGlRbbL1ZpNr2r.eJ6HxVfzbwpty', 'avatar.png'),
('vero', 'Véronique', 'FORTUN', 'Femme', 'avenue maurice Martin', '33120', 'Arcachon', 'Gironde', '0667061788', 'veronique.fortun@wanadoo.fr', '1966-05-03', '$2y$10$kWWb.xXFyr4rmaHPfQzzkerIaByHbLxsVELrDOhEiyn1ZwpSn8b6a', 'avatar.png');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Appartient`
--
ALTER TABLE `Appartient`
  ADD PRIMARY KEY (`u_pseudo`,`g_nom`);

--
-- Index pour la table `Bannis`
--
ALTER TABLE `Bannis`
  ADD PRIMARY KEY (`b_nom`);

--
-- Index pour la table `Clubs`
--
ALTER TABLE `Clubs`
  ADD PRIMARY KEY (`c_nom`);

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
-- Index pour la table `Sports`
--
ALTER TABLE `Sports`
  ADD PRIMARY KEY (`s_nom`);

--
-- Index pour la table `Utilisateurs`
--
ALTER TABLE `Utilisateurs`
  ADD PRIMARY KEY (`u_pseudo`),
  ADD UNIQUE KEY `u_pseudo` (`u_pseudo`),
  ADD UNIQUE KEY `u_email` (`u_email`),
  ADD UNIQUE KEY `u_pseudo_2` (`u_pseudo`,`u_email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Evenements`
--
ALTER TABLE `Evenements`
  MODIFY `e_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
