-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2018 at 02:46 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `juvelyriniai_gaminiai`
--

-- --------------------------------------------------------

--
-- Table structure for table `adresas`
--

CREATE TABLE `adresas` (
  `gatvė` char(16) COLLATE utf8_lithuanian_ci NOT NULL,
  `pašto_kodas` int(11) NOT NULL,
  `id_ADRESAS` int(11) NOT NULL,
  `fk_PARDUOTUVĖid_PARDUOTUVĖ` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `adresas`
--

INSERT INTO `adresas` (`gatvė`, `pašto_kodas`, `id_ADRESAS`, `fk_PARDUOTUVĖid_PARDUOTUVĖ`) VALUES
('liepu', 12312, 1, 1),
('misko', 12313, 2, 2),
('berzu', 12314, 3, 3),
('sodu', 12315, 4, 4),
('mokyklos', 12316, 5, 5),
('pievu', 12317, 6, 6),
('alyvu', 12318, 7, 7),
('parko', 12319, 8, 8),
('ezero', 12320, 9, 9),
('geliu', 12321, 10, 10),
('pusyno', 12322, 11, 11),
('azuolu', 12323, 12, 12),
('dvaro', 12324, 13, 13),
('lauko', 12325, 14, 14),
('kastonu', 12326, 15, 15),
('klevu', 12327, 16, 16),
('zalioji', 12328, 17, 17),
('kalno', 12329, 18, 18),
('tvenkinio', 12330, 19, 19),
('grunvaldo', 12331, 20, 20);

-- --------------------------------------------------------

--
-- Table structure for table `apmokėjimo_būdas`
--

CREATE TABLE `apmokėjimo_būdas` (
  `bankas` int(11) NOT NULL,
  `fk_UŽSAKOVASasmens_kodas` char(11) COLLATE utf8_lithuanian_ci NOT NULL,
  `id_apm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `apmokėjimo_būdas`
--

INSERT INTO `apmokėjimo_būdas` (`bankas`, `fk_UŽSAKOVASasmens_kodas`, `id_apm`) VALUES
(1, '151612916', 1),
(2, '151612917', 2),
(3, '151612918', 3),
(1, '151612919', 4),
(2, '151612920', 5),
(3, '151612921', 6),
(1, '151612922', 7),
(2, '151612923', 8),
(3, '151612924', 9),
(1, '151612925', 10),
(2, '151612926', 11),
(3, '151612927', 12),
(1, '151612928', 13),
(2, '151612929', 14),
(3, '151612930', 15),
(1, '151612931', 16),
(2, '151612932', 17),
(3, '151612933', 18),
(1, '151612934', 19),
(2, '151612935', 20);

-- --------------------------------------------------------

--
-- Table structure for table `bankai`
--

CREATE TABLE `bankai` (
  `id_bankai` int(11) NOT NULL,
  `name` char(8) COLLATE utf8_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `bankai`
--

INSERT INTO `bankai` (`id_bankai`, `name`) VALUES
(1, 'dnb'),
(2, 'seb'),
(3, 'swedbank');

-- --------------------------------------------------------

--
-- Table structure for table `gaminys`
--

CREATE TABLE `gaminys` (
  `kodas` int(11) NOT NULL,
  `pavadinimas` varchar(20) COLLATE utf8_lithuanian_ci NOT NULL,
  `tipas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `gaminys`
--

INSERT INTO `gaminys` (`kodas`, `pavadinimas`, `tipas`) VALUES
(1, 'Rojus', 2),
(2, 'Didvyris', 1),
(3, 'Grazuoliukas', 1),
(4, 'Draugystes', 4),
(5, 'Brolybes', 2),
(6, 'Puzle', 2),
(7, 'Auksinukai', 3),
(8, 'Spalvinukai', 3),
(9, 'Ziema', 2),
(10, 'Vasara', 2),
(11, 'Auskariukai', 3),
(12, 'Grandinele', 2),
(13, 'Paprastute', 4),
(14, 'Storulis', 1),
(15, 'Geras', 1),
(16, 'FajaFaja', 4),
(17, 'FashionPro', 4),
(18, 'TopHop', 3),
(19, 'Sidabrelis', 1),
(20, 'Auksius', 1);

-- --------------------------------------------------------

--
-- Table structure for table `grupė`
--

CREATE TABLE `grupė` (
  `pavadinimas` char(16) COLLATE utf8_lithuanian_ci NOT NULL,
  `id_GRUPĖ` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `grupė`
--

INSERT INTO `grupė` (`pavadinimas`, `id_GRUPĖ`) VALUES
('Vestuviu', 1),
('suzadetuviu', 2),
('lasivalaikiui', 3),
('sezoniai', 4),
('draugams', 5),
('valentino progai', 6),
('mamai', 7),
('draugei', 8);

-- --------------------------------------------------------

--
-- Table structure for table `klasė`
--

CREATE TABLE `klasė` (
  `id` int(11) NOT NULL,
  `praba` int(255) NOT NULL,
  `dydis` double(8,2) NOT NULL,
  `storis` double(8,2) NOT NULL,
  `svoris` double(8,2) NOT NULL,
  `atributai` char(16) COLLATE utf8_lithuanian_ci DEFAULT NULL,
  `metalo_tipas` int(11) NOT NULL,
  `užsegimo_tipas` int(11) DEFAULT NULL,
  `pynimo_tipas` int(11) DEFAULT NULL,
  `fk_GRUPĖid_GRUPĖ` int(11) NOT NULL,
  `fk_GAMINYSkodas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `klasė`
--

INSERT INTO `klasė` (`id`, `praba`, `dydis`, `storis`, `svoris`, `atributai`, `metalo_tipas`, `užsegimo_tipas`, `pynimo_tipas`, `fk_GRUPĖid_GRUPĖ`, `fk_GAMINYSkodas`) VALUES
(1, 999, 10.00, 4.50, 3.60, NULL, 1, NULL, NULL, 1, 1),
(2, 830, 9.50, 5.00, 7.90, 'brangakmenis', 1, NULL, NULL, 2, 2),
(3, 925, 9.00, 6.00, 9.50, NULL, 2, NULL, NULL, 3, 3),
(4, 925, 10.50, 8.00, 10.00, NULL, 2, NULL, NULL, 4, 4),
(5, 375, 11.00, 9.40, 11.00, 'briliantas', 1, NULL, 1, 5, 5),
(6, 830, 11.50, 5.40, 8.40, NULL, 2, NULL, 3, 6, 6),
(7, 830, 12.00, 3.50, 9.40, NULL, 2, 3, 2, 7, 7),
(8, 375, 9.00, 9.40, 5.00, NULL, 1, 5, NULL, 7, 8),
(9, 830, 9.50, 5.00, 3.00, 'briliantas', 2, NULL, 4, 6, 9),
(10, 925, 9.00, 8.60, 9.00, NULL, 2, NULL, NULL, 5, 10),
(11, 375, 10.50, 4.50, 10.00, NULL, 1, 6, 4, 1, 11),
(12, 925, 11.50, 3.60, 11.00, NULL, 2, NULL, 1, 4, 12),
(13, 925, 9.00, 7.90, 12.00, 'briliantas', 2, NULL, NULL, 8, 13),
(14, 999, 10.00, 9.50, 12.50, NULL, 1, NULL, 4, 8, 14),
(15, 999, 11.00, 10.00, 13.00, NULL, 1, NULL, 1, 6, 15),
(16, 375, 12.00, 11.00, 8.40, NULL, 1, NULL, NULL, 5, 16),
(17, 830, 12.50, 8.40, 9.40, 'briliantas', 2, NULL, NULL, 4, 17),
(18, 925, 13.00, 9.40, 5.00, NULL, 2, 1, 2, 3, 18),
(19, 375, 9.00, 5.00, 3.00, NULL, 1, NULL, NULL, 2, 19),
(20, 925, 9.50, 3.00, 3.50, 'briliantas', 2, NULL, NULL, 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `metalas`
--

CREATE TABLE `metalas` (
  `id_metalas` int(11) NOT NULL,
  `name` char(8) COLLATE utf8_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `metalas`
--

INSERT INTO `metalas` (`id_metalas`, `name`) VALUES
(1, 'auksas'),
(2, 'sidabras');

-- --------------------------------------------------------

--
-- Table structure for table `miestas`
--

CREATE TABLE `miestas` (
  `pavadinimas` char(16) COLLATE utf8_lithuanian_ci NOT NULL,
  `id_miestas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `miestas`
--

INSERT INTO `miestas` (`pavadinimas`, `id_miestas`) VALUES
('Kaunas', 1),
('Vilnius', 2),
('Silute', 3),
('Silale', 4),
('Kalaipeda', 5),
('Siauliai', 6),
('Utena', 7),
('Trakai', 8),
('Turmantas', 9),
('Ignalina', 10),
('Birzai', 11),
('Pavenezys', 12),
('Ukmerge', 13),
('Anyksciai', 14),
('Ariogala', 15),
('Joniskis', 16),
('Jurbarkas', 17),
('Kretinga', 18),
('Kupiskis', 19),
('Moletai', 20);

-- --------------------------------------------------------

--
-- Table structure for table `mokėjimas`
--

CREATE TABLE `mokėjimas` (
  `data` date NOT NULL,
  `suma` decimal(8,2) NOT NULL,
  `id_MOKĖJIMAS` int(11) NOT NULL,
  `fk_APMOKĖJIMO_BŪDASid_APMOKĖJIMO_BŪDAS` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `mokėjimas`
--

INSERT INTO `mokėjimas` (`data`, `suma`, `id_MOKĖJIMAS`, `fk_APMOKĖJIMO_BŪDASid_APMOKĖJIMO_BŪDAS`, `id`) VALUES
('2018-01-03', '501.40', 1, 1, 1),
('2018-01-04', '502.40', 2, 2, 2),
('2018-01-05', '503.40', 3, 3, 3),
('2018-01-06', '504.40', 4, 4, 4),
('2018-01-07', '505.40', 5, 5, 5),
('2018-01-08', '506.40', 6, 6, 6),
('2018-01-09', '507.20', 7, 7, 7),
('2018-01-03', '508.40', 8, 8, 8),
('2018-01-04', '509.40', 9, 9, 9),
('2018-01-05', '510.50', 10, 10, 10),
('2018-01-06', '511.40', 11, 11, 11),
('2018-01-07', '512.40', 12, 12, 12),
('2018-01-08', '513.70', 13, 13, 13),
('2018-01-03', '514.60', 14, 14, 14),
('2018-01-04', '515.90', 15, 15, 15),
('2018-01-05', '516.40', 16, 16, 16),
('2018-01-06', '517.40', 17, 17, 17),
('2018-01-07', '518.40', 18, 18, 18),
('2018-01-08', '519.40', 19, 19, 19),
('2018-01-09', '520.10', 20, 20, 20);

-- --------------------------------------------------------

--
-- Table structure for table `papildomas_mokestis`
--

CREATE TABLE `papildomas_mokestis` (
  `kaina` decimal(8,2) NOT NULL,
  `id_PAPILDOMAS_MOKESTIS` int(11) NOT NULL,
  `fk_UŽSAKYMASnr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `papildomas_mokestis`
--

INSERT INTO `papildomas_mokestis` (`kaina`, `id_PAPILDOMAS_MOKESTIS`, `fk_UŽSAKYMASnr`) VALUES
('3.40', 1, 1),
('4.40', 2, 2),
('5.40', 3, 3),
('6.40', 4, 4),
('7.40', 5, 5),
('8.40', 6, 6),
('9.40', 7, 7),
('10.40', 8, 8),
('11.40', 9, 9),
('12.40', 10, 10),
('13.40', 11, 11),
('14.40', 12, 12),
('15.40', 13, 13),
('16.40', 14, 14),
('17.40', 15, 15),
('18.40', 16, 16),
('19.40', 17, 17),
('20.40', 18, 18),
('21.40', 19, 19),
('22.40', 20, 20);

-- --------------------------------------------------------

--
-- Table structure for table `parduotuvė`
--

CREATE TABLE `parduotuvė` (
  `pavadinimas` char(16) COLLATE utf8_lithuanian_ci NOT NULL,
  `id_PARDUOTUVĖ` int(11) NOT NULL,
  `fk_MIESTASid_MIESTAS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `parduotuvė`
--

INSERT INTO `parduotuvė` (`pavadinimas`, `id_PARDUOTUVĖ`, `fk_MIESTASid_MIESTAS`) VALUES
('Juvelyreonas', 1, 1),
('Juvelyreonas', 2, 2),
('Juvelyreonas', 3, 3),
('Juvelyreonas', 4, 4),
('Juvelyreonas', 5, 5),
('Juvelyreonas', 6, 6),
('Juvelyreonas', 7, 7),
('Juvelyreonas', 8, 8),
('Juvelyreonas', 9, 9),
('Juvelyreonas', 10, 10),
('Juvelyreonas', 11, 11),
('Juvelyreonas', 12, 12),
('Juvelyreonas', 13, 13),
('Juvelyreonas', 14, 14),
('Juvelyreonas', 15, 15),
('Juvelyreonas', 16, 16),
('Juvelyreonas', 17, 17),
('Juvelyreonas', 18, 18),
('Juvelyreonas', 19, 19),
('Juvelyreonas', 20, 20);

-- --------------------------------------------------------

--
-- Table structure for table `pristatymas`
--

CREATE TABLE `pristatymas` (
  `atsiemimo_vieta` varchar(30) COLLATE utf8_lithuanian_ci NOT NULL,
  `būdas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `pristatymas`
--

INSERT INTO `pristatymas` (`atsiemimo_vieta`, `būdas`) VALUES
('pastas', 1),
('namai', 2),
('namai', 3),
('namai', 3),
('namai', 3),
('namai', 3),
('namai', 3),
('namai', 2),
('pastas', 2),
('pastas', 2),
('pastas', 2),
('pastas', 2),
('pastas', 2),
('pastas', 1),
('pastas', 1),
('namai', 1),
('namai', 1),
('namai', 1),
('namai', 2),
('namai', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pristatymo_būdas`
--

CREATE TABLE `pristatymo_būdas` (
  `id_pristatymo_būdas` int(11) NOT NULL,
  `name` char(17) COLLATE utf8_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `pristatymo_būdas`
--

INSERT INTO `pristatymo_būdas` (`id_pristatymo_būdas`, `name`) VALUES
(1, 'LP_express'),
(2, 'kurjeris'),
(3, 'atsiemimo_skyrius');

-- --------------------------------------------------------

--
-- Table structure for table `pynimas`
--

CREATE TABLE `pynimas` (
  `id_pynimas` int(11) NOT NULL,
  `name` char(11) COLLATE utf8_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `pynimas`
--

INSERT INTO `pynimas` (`id_pynimas`, `name`) VALUES
(1, 'anchor'),
(2, 'bead'),
(3, 'bismark'),
(4, 'corean'),
(5, 'curb'),
(6, 'double_curb'),
(7, 'kita');

-- --------------------------------------------------------

--
-- Table structure for table `sutarties_būsenos`
--

CREATE TABLE `sutarties_būsenos` (
  `id_sutarties_būsenos` int(11) NOT NULL,
  `name` char(11) COLLATE utf8_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `sutarties_būsenos`
--

INSERT INTO `sutarties_būsenos` (`id_sutarties_būsenos`, `name`) VALUES
(1, 'užsakyta'),
(2, 'patvirtinta'),
(3, 'nutraukta'),
(4, 'užbaigta');

-- --------------------------------------------------------

--
-- Table structure for table `sąskata_faktūra`
--

CREATE TABLE `sąskata_faktūra` (
  `nr` int(11) NOT NULL,
  `data` date NOT NULL,
  `suma` decimal(10,0) NOT NULL,
  `id_SĄSKAITA_FAKTŪRA` int(11) NOT NULL,
  `fk_MOKĖJIMASid_MOKĖJIMAS` int(11) NOT NULL,
  `fk_UŽSAKYMASnr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `sąskata_faktūra`
--

INSERT INTO `sąskata_faktūra` (`nr`, `data`, `suma`, `id_SĄSKAITA_FAKTŪRA`, `fk_MOKĖJIMASid_MOKĖJIMAS`, `fk_UŽSAKYMASnr`) VALUES
(1, '2018-04-03', '423', 1, 1, 1),
(2, '2018-04-04', '424', 2, 2, 2),
(3, '2018-04-05', '425', 3, 3, 3),
(4, '2018-04-06', '426', 4, 4, 4),
(5, '2018-04-07', '427', 5, 5, 5),
(6, '2018-04-08', '428', 6, 6, 6),
(7, '2018-04-09', '429', 7, 7, 7),
(8, '2018-04-03', '430', 8, 8, 8),
(9, '2018-04-04', '431', 9, 9, 9),
(10, '2018-04-05', '432', 10, 10, 10),
(11, '2018-04-06', '433', 11, 11, 11),
(12, '2018-04-07', '434', 12, 12, 12),
(13, '2018-04-08', '435', 13, 13, 13),
(14, '2018-04-09', '436', 14, 14, 14),
(15, '2018-04-03', '437', 15, 15, 15),
(16, '2018-04-04', '438', 16, 16, 16),
(17, '2018-04-05', '439', 17, 17, 17),
(18, '2018-04-06', '440', 18, 18, 18),
(19, '2018-04-07', '441', 19, 19, 19),
(20, '2018-04-08', '442', 20, 20, 20);

-- --------------------------------------------------------

--
-- Table structure for table `tipai`
--

CREATE TABLE `tipai` (
  `id_tipai` int(11) NOT NULL,
  `name` char(10) COLLATE utf8_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `tipai`
--

INSERT INTO `tipai` (`id_tipai`, `name`) VALUES
(1, 'žiedas'),
(2, 'grandinėlė'),
(3, 'auskarai'),
(4, 'apyrankė');

-- --------------------------------------------------------

--
-- Table structure for table `užsakovas`
--

CREATE TABLE `užsakovas` (
  `asmens_kodas` char(11) COLLATE utf8_lithuanian_ci NOT NULL,
  `vardas` varchar(20) COLLATE utf8_lithuanian_ci NOT NULL,
  `pavardė` varchar(20) COLLATE utf8_lithuanian_ci NOT NULL,
  `gimimo_dara` date NOT NULL,
  `telefonas` varchar(20) COLLATE utf8_lithuanian_ci NOT NULL,
  `e_paštas` varchar(30) COLLATE utf8_lithuanian_ci NOT NULL,
  `miestas` varchar(20) COLLATE utf8_lithuanian_ci NOT NULL,
  `adresas` varchar(20) COLLATE utf8_lithuanian_ci NOT NULL,
  `pašto_kodas` varchar(20) COLLATE utf8_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `užsakovas`
--

INSERT INTO `užsakovas` (`asmens_kodas`, `vardas`, `pavardė`, `gimimo_dara`, `telefonas`, `e_paštas`, `miestas`, `adresas`, `pašto_kodas`) VALUES
('151612916', 'Juozas', 'Kairys', '1998-03-04', '865672465', 'vienas@one.lt', 'Kaunas', 'liepu', 'LT153424'),
('151612917', 'Jonas', 'Desnys', '1998-03-05', '865672466', 'du@one.lt', 'Vilnius', 'misko', 'LT153425'),
('151612918', 'Petras', 'Makevic', '1998-03-06', '865672467', 'trys@one.lt', 'Silute', 'berzu', 'LT153426'),
('151612919', 'Juozas', 'pavardėnis', '1998-03-07', '865672468', 'keturi@one.lt', 'Silale', 'sodu', 'LT153427'),
('151612920', 'Antanas', 'Vardenis', '1998-03-08', '865672469', 'penki@one.lt', 'Kalaipeda', 'mokyklos', 'LT153428'),
('151612921', 'Tadas', 'Klicko', '1998-03-09', '865672470', 'sesi@one.lt', 'Siauliai', 'pievu', 'LT153429'),
('151612922', 'Juozapota', 'Bolbo', '1998-03-01', '865672471', 'septyni@one.lt', 'Utena', 'alyvu', 'LT153430'),
('151612923', 'Kunigunda', 'Baltrusaite', '1998-03-02', '865672472', 'astuoni@one.lt', 'Trakai', 'parko', 'LT153431'),
('151612924', 'Kunigunda', 'Baltute', '1998-03-03', '865672473', 'desimt@one.lt', 'Turmantas', 'ezero', 'LT153432'),
('151612925', 'Darius', 'Racko', '1998-03-04', '865672474', 'venu@one.lt', 'Ignalina', 'geliu', 'LT153433'),
('151612926', 'Greta', 'Paskevic', '1998-03-05', '865672475', 'dvyl@one.lt', 'Birzai', 'pusyno', 'LT153434'),
('151612927', 'Alicija', 'Gerfolveden', '1998-03-06', '865672476', 'tryl@one.lt', 'Pavenezys', 'azuolu', 'LT153435'),
('151612928', 'Viktoras', 'Grabovskis', '1998-03-07', '865672477', 'ketur@one.lt', 'Ukmerge', 'dvaro', 'LT153436'),
('151612929', 'Robertas', 'Rusovicius', '1998-03-08', '865672478', 'sesul@one.lt', 'Anyksciai', 'lauko', 'LT153437'),
('151612930', 'Stasys', 'Bazys', '1998-03-09', '865672479', 'sept@one.lt', 'Ariogala', 'kastonu', 'LT153438'),
('151612931', 'Povilas', 'Makaronis', '1998-03-01', '865672480', 'ast@one.lt', 'Joniskis', 'klevu', 'LT153439'),
('151612932', 'Edgaras', 'Stalonis', '1998-03-02', '865672481', 'dev@one.lt', 'Jurbarkas', 'zalioji', 'LT153440'),
('151612933', 'Darius', 'Skanionis', '1998-03-03', '865672482', 'desi@one.lt', 'Kretinga', 'kalno', 'LT153441'),
('151612934', 'Robertas', 'Paskevicius', '1998-03-04', '865672483', 'venunu@one.lt', 'Kupiskis', 'tvenkinio', 'LT153442'),
('151612935', 'Juozdas', 'Kuslevevicius', '1998-03-05', '865672484', 'keturu@one.lt', 'Moletai', 'grunvaldo', 'LT153443');

-- --------------------------------------------------------

--
-- Table structure for table `užsakymas`
--

CREATE TABLE `užsakymas` (
  `nr` int(11) NOT NULL,
  `užsakymo_data` date NOT NULL,
  `pristatymo_data` date NOT NULL,
  `kaina` decimal(8,2) NOT NULL,
  `būsena` int(11) NOT NULL,
  `fk_UŽSAKOVASasmens_kodas` char(11) COLLATE utf8_lithuanian_ci NOT NULL,
  `fk_ADRESASid_ADRESAS` int(11) NOT NULL,
  `fk_KLASĖid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `užsakymas`
--

INSERT INTO `užsakymas` (`nr`, `užsakymo_data`, `pristatymo_data`, `kaina`, `būsena`, `fk_UŽSAKOVASasmens_kodas`, `fk_ADRESASid_ADRESAS`, `fk_KLASĖid`) VALUES
(1, '2018-03-06', '2018-03-31', '245.80', 1, '151612916', 1, 1),
(2, '2018-03-08', '2018-03-29', '246.80', 2, '151612917', 2, 2),
(3, '2018-03-01', '2018-03-31', '247.80', 3, '151612918', 3, 3),
(4, '2018-03-12', '2018-03-29', '248.80', 1, '151612919', 4, 4),
(5, '2018-03-08', '2018-03-30', '249.80', 2, '151612920', 5, 5),
(6, '2018-03-05', '2018-03-30', '250.80', 3, '151612921', 6, 6),
(7, '2018-03-04', '2018-03-23', '251.80', 1, '151612922', 7, 7),
(8, '2018-03-08', '2018-03-29', '252.80', 2, '151612923', 8, 8),
(9, '2018-03-04', '2018-03-24', '253.80', 3, '151612924', 9, 9),
(10, '2018-03-16', '2018-03-27', '254.80', 1, '151612925', 10, 10),
(11, '2018-03-11', '2018-03-23', '255.80', 2, '151612926', 11, 11),
(12, '2018-03-08', '2018-04-26', '256.80', 3, '151612927', 12, 12),
(13, '2018-03-08', '2018-04-03', '257.80', 1, '151612928', 13, 13),
(14, '2018-03-12', '2018-03-30', '258.80', 2, '151612929', 14, 14),
(15, '2018-03-02', '2018-03-30', '259.80', 3, '151612930', 15, 15),
(16, '2018-03-02', '2018-03-20', '260.80', 1, '151612931', 16, 16),
(17, '2018-03-01', '2018-03-15', '261.80', 2, '151612932', 17, 17),
(18, '2018-03-09', '2018-03-20', '262.80', 3, '151612933', 18, 18),
(19, '2018-03-01', '2018-03-22', '263.80', 1, '151612934', 19, 19),
(20, '2018-03-06', '2018-03-22', '264.80', 2, '151612935', 20, 20);

-- --------------------------------------------------------

--
-- Table structure for table `užsegimas`
--

CREATE TABLE `užsegimas` (
  `id_užsegimas` int(11) NOT NULL,
  `name` char(18) COLLATE utf8_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `užsegimas`
--

INSERT INTO `užsegimas` (`id_užsegimas`, `name`) VALUES
(1, 'angliškas'),
(2, 'apvalūs'),
(3, 'kabliukai'),
(4, 'užsegami_kabliukai'),
(5, 'vyniukai'),
(6, 'kitas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adresas`
--
ALTER TABLE `adresas`
  ADD PRIMARY KEY (`id_ADRESAS`,`fk_PARDUOTUVĖid_PARDUOTUVĖ`),
  ADD KEY `turri` (`fk_PARDUOTUVĖid_PARDUOTUVĖ`);

--
-- Indexes for table `apmokėjimo_būdas`
--
ALTER TABLE `apmokėjimo_būdas`
  ADD PRIMARY KEY (`id_apm`),
  ADD KEY `bankas` (`bankas`),
  ADD KEY `pasirenka` (`fk_UŽSAKOVASasmens_kodas`);

--
-- Indexes for table `bankai`
--
ALTER TABLE `bankai`
  ADD PRIMARY KEY (`id_bankai`);

--
-- Indexes for table `gaminys`
--
ALTER TABLE `gaminys`
  ADD PRIMARY KEY (`kodas`),
  ADD KEY `tipas` (`tipas`);

--
-- Indexes for table `grupė`
--
ALTER TABLE `grupė`
  ADD PRIMARY KEY (`id_GRUPĖ`);

--
-- Indexes for table `klasė`
--
ALTER TABLE `klasė`
  ADD PRIMARY KEY (`id`),
  ADD KEY `metalo_tipas` (`metalo_tipas`),
  ADD KEY `užsegimo_tipas` (`užsegimo_tipas`),
  ADD KEY `pynimo_tipas` (`pynimo_tipas`),
  ADD KEY `priklausoo` (`fk_GRUPĖid_GRUPĖ`),
  ADD KEY `turii` (`fk_GAMINYSkodas`);

--
-- Indexes for table `metalas`
--
ALTER TABLE `metalas`
  ADD PRIMARY KEY (`id_metalas`);

--
-- Indexes for table `miestas`
--
ALTER TABLE `miestas`
  ADD PRIMARY KEY (`id_miestas`);

--
-- Indexes for table `mokėjimas`
--
ALTER TABLE `mokėjimas`
  ADD PRIMARY KEY (`id_MOKĖJIMAS`,`id`),
  ADD KEY `sumokėjo` (`fk_APMOKĖJIMO_BŪDASid_APMOKĖJIMO_BŪDAS`);

--
-- Indexes for table `papildomas_mokestis`
--
ALTER TABLE `papildomas_mokestis`
  ADD PRIMARY KEY (`id_PAPILDOMAS_MOKESTIS`,`fk_UŽSAKYMASnr`),
  ADD KEY `priskirtas` (`fk_UŽSAKYMASnr`);

--
-- Indexes for table `parduotuvė`
--
ALTER TABLE `parduotuvė`
  ADD PRIMARY KEY (`id_PARDUOTUVĖ`),
  ADD KEY `turi` (`fk_MIESTASid_MIESTAS`);

--
-- Indexes for table `pristatymas`
--
ALTER TABLE `pristatymas`
  ADD KEY `būdas` (`būdas`);

--
-- Indexes for table `pristatymo_būdas`
--
ALTER TABLE `pristatymo_būdas`
  ADD PRIMARY KEY (`id_pristatymo_būdas`);

--
-- Indexes for table `pynimas`
--
ALTER TABLE `pynimas`
  ADD PRIMARY KEY (`id_pynimas`);

--
-- Indexes for table `sutarties_būsenos`
--
ALTER TABLE `sutarties_būsenos`
  ADD PRIMARY KEY (`id_sutarties_būsenos`);

--
-- Indexes for table `sąskata_faktūra`
--
ALTER TABLE `sąskata_faktūra`
  ADD PRIMARY KEY (`id_SĄSKAITA_FAKTŪRA`,`fk_UŽSAKYMASnr`,`fk_MOKĖJIMASid_MOKĖJIMAS`,`nr`),
  ADD KEY `apmoka` (`fk_MOKĖJIMASid_MOKĖJIMAS`),
  ADD KEY `išrašyta` (`fk_UŽSAKYMASnr`);

--
-- Indexes for table `tipai`
--
ALTER TABLE `tipai`
  ADD PRIMARY KEY (`id_tipai`);

--
-- Indexes for table `užsakovas`
--
ALTER TABLE `užsakovas`
  ADD PRIMARY KEY (`asmens_kodas`);

--
-- Indexes for table `užsakymas`
--
ALTER TABLE `užsakymas`
  ADD PRIMARY KEY (`nr`),
  ADD KEY `būsena` (`būsena`),
  ADD KEY `sudaro` (`fk_UŽSAKOVASasmens_kodas`),
  ADD KEY `nurodyta` (`fk_ADRESASid_ADRESAS`),
  ADD KEY `įtrauktas` (`fk_KLASĖid`);

--
-- Indexes for table `užsegimas`
--
ALTER TABLE `užsegimas`
  ADD PRIMARY KEY (`id_užsegimas`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adresas`
--
ALTER TABLE `adresas`
  ADD CONSTRAINT `turri` FOREIGN KEY (`fk_PARDUOTUVĖid_PARDUOTUVĖ`) REFERENCES `parduotuvė` (`id_PARDUOTUVĖ`);

--
-- Constraints for table `apmokėjimo_būdas`
--
ALTER TABLE `apmokėjimo_būdas`
  ADD CONSTRAINT `apmokėjimo_būdas_ibfk_1` FOREIGN KEY (`bankas`) REFERENCES `bankai` (`id_bankai`),
  ADD CONSTRAINT `pasirenka` FOREIGN KEY (`fk_UŽSAKOVASasmens_kodas`) REFERENCES `užsakovas` (`asmens_kodas`);

--
-- Constraints for table `gaminys`
--
ALTER TABLE `gaminys`
  ADD CONSTRAINT `gaminys_ibfk_1` FOREIGN KEY (`tipas`) REFERENCES `tipai` (`id_tipai`);

--
-- Constraints for table `klasė`
--
ALTER TABLE `klasė`
  ADD CONSTRAINT `klasė_ibfk_1` FOREIGN KEY (`metalo_tipas`) REFERENCES `metalas` (`id_metalas`),
  ADD CONSTRAINT `klasė_ibfk_2` FOREIGN KEY (`užsegimo_tipas`) REFERENCES `užsegimas` (`id_užsegimas`),
  ADD CONSTRAINT `klasė_ibfk_3` FOREIGN KEY (`pynimo_tipas`) REFERENCES `pynimas` (`id_pynimas`),
  ADD CONSTRAINT `priklausoo` FOREIGN KEY (`fk_GRUPĖid_GRUPĖ`) REFERENCES `grupė` (`id_GRUPĖ`),
  ADD CONSTRAINT `turii` FOREIGN KEY (`fk_GAMINYSkodas`) REFERENCES `gaminys` (`kodas`);

--
-- Constraints for table `mokėjimas`
--
ALTER TABLE `mokėjimas`
  ADD CONSTRAINT `sumokėjo` FOREIGN KEY (`fk_APMOKĖJIMO_BŪDASid_APMOKĖJIMO_BŪDAS`) REFERENCES `apmokėjimo_būdas` (`id_apm`);

--
-- Constraints for table `papildomas_mokestis`
--
ALTER TABLE `papildomas_mokestis`
  ADD CONSTRAINT `priskirtas` FOREIGN KEY (`fk_UŽSAKYMASnr`) REFERENCES `užsakymas` (`nr`);

--
-- Constraints for table `parduotuvė`
--
ALTER TABLE `parduotuvė`
  ADD CONSTRAINT `turi` FOREIGN KEY (`fk_MIESTASid_MIESTAS`) REFERENCES `miestas` (`id_miestas`);

--
-- Constraints for table `pristatymas`
--
ALTER TABLE `pristatymas`
  ADD CONSTRAINT `pristatymas_ibfk_1` FOREIGN KEY (`būdas`) REFERENCES `pristatymo_būdas` (`id_pristatymo_būdas`);

--
-- Constraints for table `sąskata_faktūra`
--
ALTER TABLE `sąskata_faktūra`
  ADD CONSTRAINT `apmoka` FOREIGN KEY (`fk_MOKĖJIMASid_MOKĖJIMAS`) REFERENCES `mokėjimas` (`id_MOKĖJIMAS`),
  ADD CONSTRAINT `išrašyta` FOREIGN KEY (`fk_UŽSAKYMASnr`) REFERENCES `užsakymas` (`nr`);

--
-- Constraints for table `užsakymas`
--
ALTER TABLE `užsakymas`
  ADD CONSTRAINT `nurodyta` FOREIGN KEY (`fk_ADRESASid_ADRESAS`) REFERENCES `adresas` (`id_ADRESAS`),
  ADD CONSTRAINT `sudaro` FOREIGN KEY (`fk_UŽSAKOVASasmens_kodas`) REFERENCES `užsakovas` (`asmens_kodas`),
  ADD CONSTRAINT `užsakymas_ibfk_1` FOREIGN KEY (`būsena`) REFERENCES `sutarties_būsenos` (`id_sutarties_būsenos`),
  ADD CONSTRAINT `įtrauktas` FOREIGN KEY (`fk_KLASĖid`) REFERENCES `klasė` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
