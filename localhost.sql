-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 23, 2018 at 11:15 AM
-- Server version: 5.5.47-0+deb8u1
-- PHP Version: 7.0.4-1~dotdeb+8.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bouzidh`
--
CREATE DATABASE IF NOT EXISTS `bouzidh` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bouzidh`;

-- --------------------------------------------------------

--
-- Table structure for table `Enseignants`
--

CREATE TABLE `Enseignants` (
  `nom_enseignant` varchar(50) NOT NULL,
  `prenom_enseignant` varchar(50) NOT NULL,
  `login_enseignant` varchar(50) NOT NULL,
  `pwd_enseignant` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Enseignants`
--

INSERT INTO `Enseignants` (`nom_enseignant`, `prenom_enseignant`, `login_enseignant`, `pwd_enseignant`) VALUES
('Parent', 'Louis', 'bouzidh', 'suWmxeHf1Q7LQ');

-- --------------------------------------------------------

--
-- Table structure for table `passager`
--

CREATE TABLE `passager` (
  `trajet_id` int(11) NOT NULL,
  `utilisateur_login` varchar(32) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trajet`
--

CREATE TABLE `trajet` (
  `id` int(11) NOT NULL,
  `depart` varchar(32) NOT NULL,
  `arrivee` varchar(32) NOT NULL,
  `date` date NOT NULL,
  `nbplaces` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `conducteur_login` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trajet`
--

INSERT INTO `trajet` (`id`, `depart`, `arrivee`, `date`, `nbplaces`, `prix`, `conducteur_login`) VALUES
(1, 'Montpellier', 'Perpignan', '2018-09-07', 3, 9998, 'bouzidh'),
(3, 'Montpellier', 'Paris', '2018-10-12', 15, 0, 'bouzidh');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `login` varchar(32) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `prenom` varchar(32) NOT NULL,
  `mdp` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`login`, `nom`, `prenom`, `mdp`) VALUES
('armandt', 'Armand', 'Theo', 'ecd71870d1963316a97e3ac3408c9835ad8cf0f3c1bc703527c30265534f75ae'),
('audigierv', 'Audigier', 'Vincent', 'ecd71870d1963316a97e3ac3408c9835ad8cf0f3c1bc703527c30265534f75ae'),
('bouzidh', 'parent', 'louis', 'ecd71870d1963316a97e3ac3408c9835ad8cf0f3c1bc703527c30265534f75ae'),
('valliere', 'Vallier', 'Eddie', 'ecd71870d1963316a97e3ac3408c9835ad8cf0f3c1bc703527c30265534f75ae'),
('xX-DarkKikoulol30-Xx', 'Pereirak', 'Alban', 'ecd71870d1963316a97e3ac3408c9835ad8cf0f3c1bc703527c30265534f75ae');

-- --------------------------------------------------------

--
-- Table structure for table `voiture`
--

CREATE TABLE `voiture` (
  `immatriculation` varchar(8) NOT NULL,
  `marque` varchar(25) NOT NULL,
  `couleur` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voiture`
--

INSERT INTO `voiture` (`immatriculation`, `marque`, `couleur`) VALUES
('125SK54', 'Dacia', 'Orange'),
('360YZ90', 'Angular', 'Rouge'),
('443DB21', 'Jaguar', 'Jaune Canard'),
('443ER78', 'j', 'Grise'),
('455AB66', 'Renault', 'Dorée'),
('456HG97', 'Mini', 'Verte'),
('478FG54', 'Dacia', 'Rose Bonbon'),
('789ZY42', 'Smart', 'Bleu'),
('852XY34', 'Volkswagen', 'Argentée'),
('865GH75', 'Dacia', 'Cactus'),
('<h1>D65', 'Peugeot', 'Blanche');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Enseignants`
--
ALTER TABLE `Enseignants`
  ADD PRIMARY KEY (`login_enseignant`);

--
-- Indexes for table `passager`
--
ALTER TABLE `passager`
  ADD PRIMARY KEY (`trajet_id`,`utilisateur_login`),
  ADD KEY `trajet_id` (`trajet_id`),
  ADD KEY `utilisateur_login` (`utilisateur_login`);

--
-- Indexes for table `trajet`
--
ALTER TABLE `trajet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conducteur_login` (`conducteur_login`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`login`);

--
-- Indexes for table `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`immatriculation`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trajet`
--
ALTER TABLE `trajet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `passager`
--
ALTER TABLE `passager`
  ADD CONSTRAINT `passager_ibfk_1` FOREIGN KEY (`trajet_id`) REFERENCES `trajet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `passager_ibfk_2` FOREIGN KEY (`utilisateur_login`) REFERENCES `utilisateur` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trajet`
--
ALTER TABLE `trajet`
  ADD CONSTRAINT `trajet_ibfk_1` FOREIGN KEY (`conducteur_login`) REFERENCES `utilisateur` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
