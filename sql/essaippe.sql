CREATE database essaippe;
use essaippe;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `essaippe`
--

DELIMITER $$
--
-- Procédures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteappart` (IN `daid_bien` INT(11))  begin 
  delete from appartement where id_bien = daid_bien;
  delete from bien where id_bien = daid_bien;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteclient` (IN `dcid_personne` INT(11))  begin 
  delete from client where id_personne = dcid_personne;
  delete from personne where id_personne = dcid_personne;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deletecommercial` (IN `dcid_personne` INT(11))  begin 
  delete from commercial where id_personne = dcid_personne;
  delete from personne where id_personne = dcid_personne;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deletemaison` (IN `dmid_bien` INT(11))  begin 
  delete from maison where id_bien = dmid_bien;
  delete from bien where id_bien = dmid_bien;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertappart` (IN `psurface` INT(11), IN `pprix` INT(11), IN `pstatut` VARCHAR(25), IN `padresse` VARCHAR(100), IN `pville` VARCHAR(45), IN `pid_map` INT(11), IN `ppiece` INT(11), IN `pchambre` INT(11), IN `peaux` INT(11), IN `pnbvisites` INT(11), IN `petage` INT(11), IN `pascenseur` TINYINT(1), IN `pbalcon` TINYINT(1), IN `pplace_parking` TINYINT(1), IN `ptype` VARCHAR(25))  begin 
  declare pid_bien int (11) ;
  insert into bien VALUES (null,psurface,pprix,pstatut,padresse,pville,pid_map,ppiece,pchambre,peaux,pnbvisites,ptype);
 
  select id_bien into pid_bien from bien where surface = psurface and adresse = padresse and ville = pville and id_bien = (select max(id_bien) from bien) ;

  insert into appartement VALUES(petage,pascenseur,pbalcon,pplace_parking,pid_bien);

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertclient` (IN `cnom` VARCHAR(25), IN `cprenom` VARCHAR(25), IN `cemail` VARCHAR(25), IN `ctelephone` TEXT, IN `cpassword` VARCHAR(80), IN `csexe` VARCHAR(25), IN `cdate_naissance` DATE, IN `cdroits` ENUM('admin','user','autre'), IN `cdate_inscription` DATE, IN `cdepartement` INT(11), IN `cstatut` INT(11))  begin 
  declare cid_personne int (11) ;
  insert into personne VALUES (null,cnom,cprenom,cemail,ctelephone,cpassword,csexe,cdate_naissance,cdroits, cstatut);
 
  select id_personne into cid_personne from personne where nom = cnom and telephone = ctelephone;

  insert into client VALUES(cdate_inscription,cdepartement,cid_personne);

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertcommercial` (IN `conom` VARCHAR(25), IN `coprenom` VARCHAR(25), IN `coemail` VARCHAR(25), IN `cotelephone` TEXT, IN `copassword` VARCHAR(80), IN `cosexe` VARCHAR(25), IN `codate_naissance` DATE, IN `codroits` ENUM('admin','user','autre'), IN `coperimetre_action` VARCHAR(25), IN `codate_embauche` DATE, IN `conb_visite` INT(11), IN `costatut` INT(11))  begin 
  declare coid_personne int (11) ;
  insert into personne VALUES (null,conom,coprenom,coemail,cotelephone,copassword,cosexe,codate_naissance,codroits,costatut);
 
  select id_personne into coid_personne from personne where email = coemail and telephone = cotelephone;

  insert into commercial VALUES(coperimetre_action,codate_embauche,conb_visite,coid_personne);

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertmaison` (IN `msurface` INT(11), IN `mprix` INT(11), IN `mstatut` VARCHAR(25), IN `madresse` VARCHAR(100), IN `mville` VARCHAR(45), IN `mid_map` INT(11), IN `mpiece` INT(11), IN `mchambre` INT(11), IN `meaux` INT(11), IN `mnbvisites` INT(11), IN `msurface_terrain` INT(11), IN `mcave` TINYINT(1), IN `mgrenier` TINYINT(1), IN `mtype` VARCHAR(25))  begin 
  declare mid_bien int (11) ;
  insert into bien VALUES (null,msurface,mprix,mstatut,madresse,mville,mid_map,mpiece,mchambre,meaux,mnbvisites,mtype);
 
  select id_bien into mid_bien from bien where surface = msurface and adresse = madresse and ville = mville and id_bien = (select max(id_bien) from bien);

  insert into maison VALUES(msurface_terrain,mcave,mgrenier,mid_bien);

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateappart` (IN `uid_bien` INT(11), IN `usurface` INT(11), IN `uprix` INT(11), IN `ustatut` VARCHAR(25), IN `uadresse` VARCHAR(100), IN `uville` VARCHAR(45), IN `uid_map` INT(11), IN `upiece` INT(11), IN `uchambre` INT(11), IN `ueaux` INT(11), IN `uascenseur` INT(1), IN `ubalcon` INT(1), IN `uplace_parking` INT(1), IN `utype` VARCHAR(25), IN `uetage` INT(1))  begin 
  update bien set surface = usurface, prix = uprix, statut = ustatut, adresse = uadresse, ville = uville, id_map = uid_map, piece = upiece, chambre = uchambre, eaux = ueaux,  type=utype where id_bien = uid_bien;

  update appartement set etage=uetage, ascenseur=uascenseur, balcon=ubalcon, place_parking= uplace_parking where id_bien=uid_bien;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateclient` (IN `ciid_personne` INT(11), IN `cinom` VARCHAR(25), IN `ciprenom` VARCHAR(25), IN `ciemail` VARCHAR(25), IN `citelephone` TEXT, IN `cipwd` VARCHAR(80), IN `cisexe` VARCHAR(25), IN `cidate_naissance` DATE, IN `cidroits` VARCHAR(25), IN `cidepartement` VARCHAR(25))  NO SQL
begin

  update personne set nom = cinom ,prenom = ciprenom,email = ciemail,telephone = citelephone, password = cipwd, sexe = cisexe, date_naissance = cidate_naissance, droits = cidroits where id_personne = ciid_personne;
 
UPDATE client set departement = cidepartement WHERE id_personne = ciid_personne;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updatecommercial` (IN `coid_personne` INT(11), IN `conom` VARCHAR(25), IN `coprenom` VARCHAR(25), IN `coemail` VARCHAR(25), IN `cotelephone` VARCHAR(50), IN `copwd` VARCHAR(80), IN `cosexe` VARCHAR(25), IN `codate_naissance` VARCHAR(25), IN `codroits` VARCHAR(25), IN `coperimetre_action` VARCHAR(50))  begin

  update personne set nom = conom ,prenom = coprenom,email = coemail, telephone = cotelephone, password = copwd, sexe = cosexe, date_naissance = codate_naissance, droits = codroits where id_personne = coid_personne;

  update commercial set perimetre_action = coperimetre_action where id_personne = coid_personne;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updatemaison` (IN `umid_bien` INT(11), IN `umsurface` INT(11), IN `umprix` INT(11), IN `umstatut` VARCHAR(25), IN `umadresse` VARCHAR(100), IN `umville` VARCHAR(25), IN `umid_map` INT(11), IN `umpiece` INT(11), IN `umchambre` INT(11), IN `umeaux` INT(11), IN `umsurface_terrain` INT(11), IN `umcave` INT(1), IN `umgrenier` INT(1), IN `umtype` VARCHAR(25))  NO SQL
BEGIN

update bien set surface=umsurface, prix=umprix, statut=umstatut, adresse=umadresse, ville=umville, id_map=umid_map, piece=umpiece, chambre=umchambre, eaux=umeaux, type=umtype where id_bien =umid_bien;

update maison set surface_terrain=umsurface_terrain, cave=umcave, grenier=umgrenier where id_bien = umid_bien;

end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `appartement`
--

CREATE TABLE `appartement` (
  `etage` int(11) NOT NULL,
  `ascenseur` tinyint(1) NOT NULL,
  `balcon` tinyint(1) NOT NULL,
  `place_parking` tinyint(1) NOT NULL,
  `id_bien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `appartement`
--

INSERT INTO `appartement` (`etage`, `ascenseur`, `balcon`, `place_parking`, `id_bien`) VALUES
(1, 1, 0, 1, 5),
(1, 1, 0, 1, 6),
(2, 1, 1, 1, 7),
(2, 1, 1, 1, 8),
(2, 1, 1, 1, 9),
(2, 1, 1, 1, 10),
(2, 1, 1, 1, 11),
(2, 1, 1, 1, 12),
(2, 1, 1, 1, 13),
(2, 1, 1, 1, 14);

-- --------------------------------------------------------

--
-- Structure de la table `bien`
--

CREATE TABLE `bien` (
  `id_bien` int(11) NOT NULL,
  `surface` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `statut` varchar(25) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `ville` varchar(45) NOT NULL,
  `id_map` int(11) DEFAULT NULL,
  `piece` int(11) NOT NULL,
  `chambre` int(11) NOT NULL,
  `eaux` int(11) NOT NULL,
  `nbvisites` int(11) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `bien`
--

INSERT INTO `bien` (`id_bien`, `surface`, `prix`, `statut`, `adresse`, `ville`, `id_map`, `piece`, `chambre`, `eaux`, `nbvisites`, `type`) VALUES
(2, 50, 25000, 'louer', '20 rue de nantes', 'Nantes', NULL, 5, 2, 1, 6, 'maison'),
(5, 30, 26000, 'dispo', '20 rue de paris', 'paris', 1, 3, 2, 1, 2, 'appartement'),
(6, 50, 40000, 'dispo', '20 rue de lyon', 'Lyon', 1, 5, 2, 1, 0, 'appartement'),
(7, 25, 15000, 'dispo', '20 rue de Marseille', 'Marseille', NULL, 3, 1, 1, 0, 'appartement'),
(8, 30, 20000, 'a louer', '20 rue de Nantes', 'Nantes', NULL, 3, 1, 1, 0, 'appartement'),
(9, 35, 25000, 'en attente', '20 rue de Lyon', 'Lyon', NULL, 3, 1, 1, 0, 'appartement'),
(10, 40, 30000, 'dispo', '20 rue de Strasbourg', 'Strasbourg', NULL, 3, 1, 1, 1, 'appartement'),
(11, 45, 35000, 'dispo', '20 rue de Monpellier', 'Monpellier', NULL, 3, 1, 1, 0, 'appartement'),
(12, 50, 40000, 'en attente', '20 rue de Lille', 'Lille', NULL, 3, 1, 1, 0, 'appartement'),
(13, 55, 45000, 'dispo', '20 rue de Roubaix', 'Roubaix', NULL, 3, 1, 1, 0, 'appartement'),
(14, 60, 50000, 'a louer', '20 rue du Havre', 'Le Havre', NULL, 3, 1, 1, 0, 'appartement'),
(15, 60, 60000, 'en attente', '20 avenue du marechal foch', 'Paris', 0, 6, 2, 2, 0, 'maison');

--
-- Déclencheurs `bien`
--
DELIMITER $$
CREATE TRIGGER `afterdeletebien` AFTER DELETE ON `bien` FOR EACH ROW begin
  delete from visite
    where id_bien = old.id_bien;
  end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `date_inscription` date NOT NULL,
  `departement` int(11) NOT NULL,
  `id_personne` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`date_inscription`, `departement`, `id_personne`) VALUES
('2018-04-23', 79, 11),
('2018-06-06', 93, 12),
('2018-06-06', 75014, 16),
('2018-06-06', 75015, 17);

-- --------------------------------------------------------

--
-- Structure de la table `commercial`
--

CREATE TABLE `commercial` (
  `perimetre_action` varchar(25) NOT NULL,
  `date_embauche` date NOT NULL,
  `nb_visite` int(11) NOT NULL,
  `id_personne` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commercial`
--

INSERT INTO `commercial` (`perimetre_action`, `date_embauche`, `nb_visite`, `id_personne`) VALUES
('france', '2018-06-06', 1, 18),
('France', '2018-06-07', 0, 19);

-- --------------------------------------------------------

--
-- Structure de la table `maison`
--

CREATE TABLE `maison` (
  `surface_terrain` int(11) NOT NULL,
  `cave` tinyint(1) NOT NULL,
  `grenier` tinyint(1) NOT NULL,
  `id_bien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `maison`
--

INSERT INTO `maison` (`surface_terrain`, `cave`, `grenier`, `id_bien`) VALUES
(150, 1, 1, 2),
(250, 0, 1, 15);

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `id_personne` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `telephone` text,
  `password` varchar(80) NOT NULL,
  `sexe` varchar(25) NOT NULL,
  `date_naissance` date NOT NULL,
  `droits` enum('admin','user','autre') DEFAULT NULL,
  `statut` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `personne`
--

INSERT INTO `personne` (`id_personne`, `nom`, `prenom`, `email`, `telephone`, `password`, `sexe`, `date_naissance`, `droits`, `statut`) VALUES
(11, 'uzan', 'theo', 'theo.uzan@hotmail.fr', '695350959', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', 'Male', '2018-01-01', 'admin', 1),
(12, 'Julitte', 'Nil', 'nil.julitte@gmail.com', '06000000000', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', 'Male', '1970-01-01', 'user', 1),
(16, 'Julitte', 'Sylvain', 'sylvain.julitte@gmail.com', '0668693788', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', 'Female', '1998-02-10', 'user', 1),
(17, 'bas', 'yo', 'yo.bas@gmail.com', '0668693788', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', 'Male', '1999-12-10', 'user', 1),
(18, 'dostoro', 'Ruben', 'ruben@gmail.com', NULL, '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', 'Male', '1995-05-12', 'user', 2),
(19, 'dostoro', 'theo', 'theo.julitte@gmail.com', '060000000', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', 'Male', '1995-05-12', 'user', 2);

-- --------------------------------------------------------

--
-- Structure de la table `visite`
--

CREATE TABLE `visite` (
  `id_visite` int(11) NOT NULL,
  `date_visite` date NOT NULL,
  `heure` time NOT NULL,
  `etat` varchar(25) NOT NULL,
  `id_bien` int(11) DEFAULT NULL,
  `id_personne` int(11) DEFAULT NULL,
  `id_commercial` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `visite`
--

INSERT INTO `visite` (`id_visite`, `date_visite`, `heure`, `etat`, `id_bien`, `id_personne`, `id_commercial`) VALUES
(1, '2018-03-12', '17:00:00', 'en cours', 2, 11, 18),
(2, '2018-03-14', '12:00:00', 'en cours', 2, 11, 19),
(3, '2018-03-15', '15:00:00', 'terminé', 2, 11, 18),
(5, '2018-03-17', '17:00:00', 'planifié', 2, 11, 19),
(6, '2018-06-20', '09:17:19', 'en cours', 10, 12, 18),
(7, '2018-05-05', '15:00:00', 'en cours', 2, 11, 19),
(8, '2018-06-05', '23:00:00', 'en cours', 5, 12, 19),
(9, '2018-06-06', '01:59:00', 'en cours', 5, 12, 19),
(10, '2018-06-13', '05:12:20', 'en cours', 2, 11, 18);

--
-- Déclencheurs `visite`
--
DELIMITER $$
CREATE TRIGGER `afterdeletevisite` AFTER DELETE ON `visite` FOR EACH ROW begin
  update bien set nbvisites = nbvisites - 1
    where id_bien = old.id_bien;
  end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `afterinsertvisite` AFTER INSERT ON `visite` FOR EACH ROW begin
  update bien set nbvisites = nbvisites + 1
    where id_bien = new.id_bien;
  end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `afterinsertvisitecommercial` AFTER INSERT ON `visite` FOR EACH ROW begin
  update commercial set nb_visite = nb_visite + 1
    where id_personne = new.id_personne;
  end
$$
DELIMITER ;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `appartement`
--
ALTER TABLE `appartement`
  ADD PRIMARY KEY (`id_bien`);

--
-- Index pour la table `bien`
--
ALTER TABLE `bien`
  ADD PRIMARY KEY (`id_bien`),
  ADD KEY `FK_bien_id_map` (`id_map`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_personne`);

--
-- Index pour la table `commercial`
--
ALTER TABLE `commercial`
  ADD PRIMARY KEY (`id_personne`);

--
-- Index pour la table `maison`
--
ALTER TABLE `maison`
  ADD PRIMARY KEY (`id_bien`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id_personne`);

--
-- Index pour la table `visite`
--
ALTER TABLE `visite`
  ADD PRIMARY KEY (`id_visite`),
  ADD KEY `FK_visite_id_bien` (`id_bien`),
  ADD KEY `FK_visite_id_personne` (`id_personne`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `bien`
--
ALTER TABLE `bien`
  MODIFY `id_bien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `id_personne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `visite`
--
ALTER TABLE `visite`
  MODIFY `id_visite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `appartement`
--
ALTER TABLE `appartement`
  ADD CONSTRAINT `FK_appartement_id_bien` FOREIGN KEY (`id_bien`) REFERENCES `bien` (`id_bien`);

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `FK_client_id_personne` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`);

--
-- Contraintes pour la table `commercial`
--
ALTER TABLE `commercial`
  ADD CONSTRAINT `FK_commercial_id_personne` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`);

--
-- Contraintes pour la table `maison`
--
ALTER TABLE `maison`
  ADD CONSTRAINT `FK_maison_id_bien` FOREIGN KEY (`id_bien`) REFERENCES `bien` (`id_bien`);

--
-- Contraintes pour la table `visite`
--
ALTER TABLE `visite`
  ADD CONSTRAINT `FK_visite_id_bien` FOREIGN KEY (`id_bien`) REFERENCES `bien` (`id_bien`),
  ADD CONSTRAINT `FK_visite_id_personne` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
