-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Ven 20 Mai 2016 à 18:30
-- Version du serveur :  5.5.42
-- Version de PHP :  7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `teamhubp_teamhub`
--

-- --------------------------------------------------------

--
-- Structure de la table `Sports`
--

CREATE TABLE `Sports` (
 `s_nom` varchar(255) NOT NULL,
 `s_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Sports`
--

INSERT INTO `Sports` (`s_nom`, `s_image`) VALUES
('Aérobic', 'exercising-silhouette.png'),
('Aïkido', ''),
('Alpinisme', 'mountain.png'),
('Apnée', 'people-1.png'),
('Athlétisme', 'sports.png'),
('Aviron', 'canoe.png'),
('Badminton', 'man-playing-badminton.png'),
('Balle au tambourin', ''),
('Bando', ''),
('Base jump', ''),
('Baseball', 'baseball.png'),
('Basket-ball', 'basketball.png'),
('Bateau-Dragon', ''),
('Biathlon', 'game.png'),
('Billard', 'person-playing-billiard.png'),
('BMX', 'man-riding-a-bicycle.png'),
('Bobsleigh', 'le-sport-olympique-de-bobsleigh_318-54601.png.jpeg'),
('Bowling', 'man-bowling.png'),
('Boxe', 'boxing-silhouette.png'),
('Canoë', 'boat.png'),
('Canoë-kayak', 'sport-1.png'),
('Canyoning', ''),
('Capoeira', 'man-practicing-martial-arts.png'),
('Catch', ''),
('Cheerleading', 'game-cheerleader.png'),
('Conduite sur glace', ''),
('Course', 'man-silhouette-running-on-treadmill-machine.png'),
('Course d orientation', 'man-silhouette-running-on-treadmill-machine.png'),
('Cricket', 'cricket-player-with-bat.png'),
('Croquet', ''),
('Crosse', ''),
('Curling', 'man-exercise-posture-silhouette-with-an-object-at-one-side.png'),
('Cyclisme', 'man-riding-a-bicycle.png'),
('Danse', 'dancer-with-music.png'),
('Décathlon', ''),
('Deltaplane', 'flying-hang-glider.png'),
('Échecs', 'knight.png'),
('Équitation', 'horse-riding.png'),
('Escalade', 'grand-canyon-national-park-in-arizona-eeuu.png'),
('Escrime', 'tai-chi-chuan-person-silhouette-with-a-fight-sword.png'),
('Esport', 'joystick.png'),
('Floorball', ''),
('Football', 'soccer-player-running-behind-the-ball.png'),
('Football américain', 'game.png'),
('Futsal', ''),
('Golf', 'golf-player.png'),
('Gymnastique', ''),
('Hakko-Ryu', ''),
('Haltérophilie', 'man-with-raised-arms-lifting-dumbbells-weight.png'),
('Handball', 'handball.png'),
('Hockey sur gazon', 'ice-hockey-player-silhouette.png'),
('Hockey sur glace', 'ice-hockey-player.png'),
('Horse-ball', ''),
('Hurling', ''),
('Iaïdo', 'man-practicing-martial-arts.png'),
('Iaïjutsu', 'man-practicing-martial-arts.png'),
('Java', ''),
('Javelot', 'throwing-javelin-silhouette-of-a-male-thrower.png'),
('Jerk', ''),
('Jeu de paume', ''),
('Jogging', ''),
('Joutes nautiques', ''),
('Ju-Jitsu', 'man-practicing-martial-arts.png'),
('Judo', 'wrestling.png'),
('Jumping', 'man-silhouette-jumping-inverted-to-water.png'),
('Karaté', 'man-practicing-martial-arts.png'),
('Karting', ''),
('Kathak', ''),
('Keirin', ''),
('Kempo', ''),
('Kendo', ''),
('Kick-boxing', ''),
('Kin-ball', ''),
('Kitesurfing', 'windsurf.png'),
('Krav maga', 'man-practicing-martial-arts.png'),
('Kronum', ''),
('Kung fu', 'man-practicing-martial-arts.png'),
('Luge de course', ''),
('Lutte', 'wrestling.png'),
('Marathon', 'runners.png'),
('Marche', ''),
('Motocross', ''),
('Muay thaï', ''),
('Musculation', ''),
('Naban', ''),
('Natation', 'swimmer.png'),
('Natation synchronisée', 'natation.png'),
('Nautisme', ''),
('Optimist', ''),
('Paddle', ''),
('Paintball', ''),
('Parachutisme', 'skydiving-silhouette-falling.png'),
('Parapente', 'paragliding.png'),
('Parkour', ''),
('Patinage artistique', 'figure-skating.png'),
('Patinage de vitesse', 'ice-skater.png'),
('Pêche', 'peche.png'),
('Pelote basque', ''),
('Pentathlon', ''),
('Pétanque', 'petanque.png'),
('Plongée', 'people.png'),
('Polo', 'polo-silhouette.png'),
('Qi gong', ''),
('Quadrille', ''),
('Rafting', 'rafting.png'),
('Rallye automobile', 'racing-car-side-view-silhouette.png'),
('Régate', ''),
('Ringuette', ''),
('Rink hockey', ''),
('Roller', ''),
('Rugby', 'rugby.png'),
('Salsa', ''),
('Savate', ''),
('Shinty', ''),
('Skateboard', ''),
('Skater hockey', 'ice-skater.png'),
('Skeleton', 'ice-skeleton-silhouette-of-a-lying-man-practicing-winter-sport.png'),
('Ski alpin', 'skier-going-down-a-hill.png'),
('Ski nautique', ''),
('Ski nordique', 'skiing-silhouette.png'),
('Slamball', ''),
('Snowboard', 'snowboarding.png'),
('Softball', ''),
('Spéléologie', ''),
('Squash', ''),
('Sumo', ''),
('Supermotard', ''),
('Surf', 'silhouette.png'),
('Tae Bo', ''),
('Taekwondo', ''),
('Tai Chi', ''),
('Taihojutsu', ''),
('Tambourin', ''),
('Tango', ''),
('Tchoukball', ''),
('Tennis', 'tennis-player-silhouette-hitting-the-ball-with-a-racket.png'),
('Tennis de table', 'ping-pong-player.png'),
('Tennis léger', ''),
('Tir', ''),
('Tir à l arc', 'archer-silhouette.png'),
('Triathlon', ''),
('Tricking', ''),
('Twirling', ''),
('ULM', ''),
('Ultimate', ''),
('Unihockey', ''),
('Valse', ''),
('Varappe', ''),
('Voile', 'yachting.png'),
('Volata', ''),
('Volley-ball', 'volleyball-player-silhouette-hitting-ball.png'),
('Voltige', ''),
('VTT', 'man-riding-a-bicycle.png'),
('Wakeboard', 'summer.png'),
('Water polo', 'water-voleyball-silhouette.png'),
('Wing Chun', ''),
('Yoga', ''),
('Zen Hakko Kaï', ''),
('Zouk', ''),
('Zumba', '');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Sports`
--
ALTER TABLE `Sports`
 ADD PRIMARY KEY (`s_nom`);
