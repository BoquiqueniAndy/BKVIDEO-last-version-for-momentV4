-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 16 Décembre 2019 à 04:03
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bkvideo`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `idadmin` int(11) NOT NULL,
  `nomadmin` varchar(250) NOT NULL,
  `afficheradmin` varchar(250) NOT NULL,
  `mdpadmin` varchar(250) NOT NULL,
  `emailadmin` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `administrateur`
--

INSERT INTO `administrateur` (`idadmin`, `nomadmin`, `afficheradmin`, `mdpadmin`, `emailadmin`) VALUES
(2, 'btssio', 'Administrateur', '017fe3a523712ceba7cde169653316e9', 'btssio@lpp.re');

-- --------------------------------------------------------

--
-- Structure de la table `appartenir`
--

CREATE TABLE `appartenir` (
  `numprod` int(11) NOT NULL,
  `numcom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commade`
--

CREATE TABLE `commade` (
  `numcom` int(11) NOT NULL,
  `datecom` date NOT NULL,
  `id` int(11) NOT NULL,
  `idp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `histo_produits`
--

CREATE TABLE `histo_produits` (
  `numprod` int(11) NOT NULL DEFAULT '0',
  `nompro` varchar(50) NOT NULL,
  `plateforme` varchar(50) NOT NULL,
  `prix` float NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `lien` varchar(250) NOT NULL,
  `date_action` datetime DEFAULT NULL,
  `numprod_original` int(11) NOT NULL,
  `action` enum('update','delete') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `histo_produits`
--

INSERT INTO `histo_produits` (`numprod`, `nompro`, `plateforme`, `prix`, `categorie`, `lien`, `date_action`, `numprod_original`, `action`) VALUES
(1, 'Medievil', 'ps4', 25.55, 'New2', '<img src = "StyleOTD/Medievil.PNG">', NULL, 0, NULL),
(2, 'Trove', 'ps4', 0, 'OI2', '<img src = "StyleOTD/trove.JPG">', NULL, 0, NULL),
(3, 'Mortal Kombat 11', 'ps4', 55.99, 'New2', '<img src = "StyleOTD/mk11.JPG">', NULL, 0, NULL),
(4, 'Uncharted 4 : a thief\'s end', 'ps4', 14.99, 'RM2', '<img src = "StyleOTD/Uncharted4.JPG">', NULL, 0, NULL),
(5, 'grand theft auto 5', 'ps3', 15.8, 'New1', '<img src = "StyleOTD/gta5.JPG">', NULL, 0, NULL),
(6, 'Uncharted : drake\'s fortune', 'ps3', 4.99, 'OI1', '<img src = "StyleOTD/Uncharted1.PNG">', NULL, 0, NULL),
(7, 'Uncharted 3 : drake\'s deception', 'ps3', 10.5, 'RM1', '<img src = "StyleOTD/Uncharted3.JPG">', NULL, 0, NULL),
(8, 'Red Dead Redemption 2', 'pc', 34.99, 'New3', '<img src = "StyleOTD/reddeadredemption2.JPG">', NULL, 0, NULL),
(9, 'Smite', 'pc', 0, 'OI3', '<img src = "StyleOTD/smite.JPG">', NULL, 0, NULL),
(10, 'grand theft auto 4', 'pc', 9.99, 'RM3', '<img src = "StyleOTD/gta4.JPG">', NULL, 0, NULL),
(11, 'Call of Duty : modern warfare', 'xboxone', 55.55, 'New4', '<img src = "StyleOTD/CODMW.JPG">', NULL, 0, NULL),
(12, 'Batman Arkham Knight', 'xboxone', 17.99, 'OI4', '<img src = "StyleOTD/batman.JPG">', NULL, 0, NULL),
(13, 'Watch Dogs', 'xboxone', 14.8, 'RM4', '<img src = "StyleOTD/watchdogs.PNG">', NULL, 0, NULL),
(14, 'Bioshock Infinite', 'xbox360', 19.99, 'New5', '<img src = "StyleOTD/bioshockinfinite.JPEG">', NULL, 0, NULL),
(15, 'Gears of War 3', 'xbox360', 9.99, 'OI5', '<img src = "StyleOTD/gearsofwar3.JPG">', NULL, 0, NULL),
(16, 'MineCraft', 'xbox360', 9.99, 'RM5', '<img src = "StyleOTD/minecraft.JPG">', NULL, 0, NULL),
(17, 'Hellblade Senua\'s Sacrifice', 'xboxone', 14.99, 'RM4', '<img src  ="StyleOTD/Hellblade_Senua_Sacrifice.JPG">', NULL, 0, NULL),
(0, 'Hellblade Senua\'s Sacrifice', 'xboxone', 14.99, 'RM4', '<img src  ="StyleOTD/Hellblade_Senua_Sacrifice.JPG">', '2019-12-16 01:32:01', 17, 'update');

-- --------------------------------------------------------

--
-- Structure de la table `modifier`
--

CREATE TABLE `modifier` (
  `idadmin` int(11) NOT NULL,
  `numprod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `paiment`
--

CREATE TABLE `paiment` (
  `idp` int(11) NOT NULL,
  `prixtotal` float NOT NULL,
  `numcard` varchar(50) NOT NULL,
  `numcom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `numpa` int(11) NOT NULL,
  `qteProduit` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `numprod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `numprod` int(11) NOT NULL,
  `nompro` varchar(50) NOT NULL,
  `plateforme` varchar(50) NOT NULL,
  `prix` float NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `lien` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`numprod`, `nompro`, `plateforme`, `prix`, `categorie`, `lien`) VALUES
(1, 'Medievil', 'ps4', 25.55, 'New2', '<img src = "StyleOTD/Medievil.PNG">'),
(2, 'Trove', 'ps4', 0, 'OI2', '<img src = "StyleOTD/trove.JPG">'),
(3, 'Mortal Kombat 11', 'ps4', 55.99, 'New2', '<img src = "StyleOTD/mk11.JPG">'),
(4, 'Uncharted 4 : a thief\'s end', 'ps4', 14.99, 'RM2', '<img src = "StyleOTD/Uncharted4.JPG">'),
(5, 'grand theft auto 5', 'ps3', 15.8, 'New1', '<img src = "StyleOTD/gta5.JPG">'),
(6, 'Uncharted : drake\'s fortune', 'ps3', 4.99, 'OI1', '<img src = "StyleOTD/Uncharted1.PNG">'),
(7, 'Uncharted 3 : drake\'s deception', 'ps3', 10.5, 'RM1', '<img src = "StyleOTD/Uncharted3.JPG">'),
(8, 'Red Dead Redemption 2', 'pc', 34.99, 'New3', '<img src = "StyleOTD/reddeadredemption2.JPG">'),
(9, 'Smite', 'pc', 0, 'OI3', '<img src = "StyleOTD/smite.JPG">'),
(10, 'grand theft auto 4', 'pc', 9.99, 'RM3', '<img src = "StyleOTD/gta4.JPG">'),
(11, 'Call of Duty : modern warfare', 'xboxone', 55.55, 'New4', '<img src = "StyleOTD/CODMW.JPG">'),
(12, 'Batman Arkham Knight', 'xboxone', 17.99, 'OI4', '<img src = "StyleOTD/batman.JPG">'),
(13, 'Watch Dogs', 'xboxone', 14.8, 'RM4', '<img src = "StyleOTD/watchdogs.PNG">'),
(14, 'Bioshock Infinite', 'xbox360', 19.99, 'New5', '<img src = "StyleOTD/bioshockinfinite.JPEG">'),
(15, 'Gears of War 3', 'xbox360', 9.99, 'OI5', '<img src = "StyleOTD/gearsofwar3.JPG">'),
(16, 'MineCraft', 'xbox360', 9.99, 'RM5', '<img src = "StyleOTD/minecraft.JPG">'),
(17, 'Hellblade Senua\'s Sacrifice', 'xboxone', 12.99, 'RM4', '<img src  ="StyleOTD/Hellblade_Senua_Sacrifice.JPG">');

--
-- Déclencheurs `produits`
--
DELIMITER $$
CREATE TRIGGER `trig_apres_delete_produits` AFTER DELETE ON `produits` FOR EACH ROW BEGIN
    INSERT INTO histo_produits
      (action, date_action, nompro, plateforme, prix, categorie, lien, numprod_original)
    VALUES
      ('delete', NOW(), OLD.nompro, OLD.plateforme, OLD.prix, OLD.categorie, OLD.lien, OLD.numprod);
  END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trig_avant_update_produits` BEFORE UPDATE ON `produits` FOR EACH ROW BEGIN
    INSERT INTO histo_produits
      (action, date_action, nompro, plateforme, prix, categorie, lien, numprod_original)
    VALUES
      ('update', NOW(), OLD.nompro, OLD.plateforme, OLD.prix, OLD.categorie, OLD.lien, OLD.numprod);
  END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`idadmin`);

--
-- Index pour la table `appartenir`
--
ALTER TABLE `appartenir`
  ADD PRIMARY KEY (`numprod`,`numcom`),
  ADD KEY `Appartenir_Commade1_FK` (`numcom`);

--
-- Index pour la table `commade`
--
ALTER TABLE `commade`
  ADD PRIMARY KEY (`numcom`),
  ADD UNIQUE KEY `Commade_Paiment0_AK` (`idp`),
  ADD KEY `Commade_Utilisateur0_FK` (`id`);

--
-- Index pour la table `modifier`
--
ALTER TABLE `modifier`
  ADD PRIMARY KEY (`idadmin`,`numprod`),
  ADD KEY `modifier_Produits1_FK` (`numprod`);

--
-- Index pour la table `paiment`
--
ALTER TABLE `paiment`
  ADD PRIMARY KEY (`idp`),
  ADD UNIQUE KEY `Paiment_Commade0_AK` (`numcom`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`numpa`),
  ADD KEY `Panier_Utilisateur0_FK` (`id`),
  ADD KEY `Panier_Produits1_FK` (`numprod`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`numprod`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `numpa` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `numprod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `appartenir`
--
ALTER TABLE `appartenir`
  ADD CONSTRAINT `Appartenir_Commade1_FK` FOREIGN KEY (`numcom`) REFERENCES `commade` (`numcom`),
  ADD CONSTRAINT `Appartenir_Produits0_FK` FOREIGN KEY (`numprod`) REFERENCES `produits` (`numprod`);

--
-- Contraintes pour la table `commade`
--
ALTER TABLE `commade`
  ADD CONSTRAINT `Commade_Paiment1_FK` FOREIGN KEY (`idp`) REFERENCES `paiment` (`idp`),
  ADD CONSTRAINT `Commade_Utilisateur0_FK` FOREIGN KEY (`id`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `modifier`
--
ALTER TABLE `modifier`
  ADD CONSTRAINT `modifier_Produits1_FK` FOREIGN KEY (`numprod`) REFERENCES `produits` (`numprod`),
  ADD CONSTRAINT `modifier_administrateur0_FK` FOREIGN KEY (`idadmin`) REFERENCES `administrateur` (`idadmin`);

--
-- Contraintes pour la table `paiment`
--
ALTER TABLE `paiment`
  ADD CONSTRAINT `Paiment_Commade0_FK` FOREIGN KEY (`numcom`) REFERENCES `commade` (`numcom`);

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `Panier_Produits1_FK` FOREIGN KEY (`numprod`) REFERENCES `produits` (`numprod`),
  ADD CONSTRAINT `Panier_Utilisateur0_FK` FOREIGN KEY (`id`) REFERENCES `utilisateur` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
