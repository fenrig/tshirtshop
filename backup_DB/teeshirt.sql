-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 29 apr 2013 om 11:28
-- Serverversie: 5.5.27
-- PHP-versie: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `teeshirt`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `clothings`
--

CREATE TABLE IF NOT EXISTS `clothings` (
  `cid` bigint(20) NOT NULL AUTO_INCREMENT,
  `price` float NOT NULL,
  `color` text NOT NULL,
  `brand` text NOT NULL,
  `agegroup` enum('baby','child','teenager','adult','maternity') NOT NULL,
  `sex` enum('unisex','female','male') NOT NULL,
  `fabric` varchar(256) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Gegevens worden uitgevoerd voor tabel `clothings`
--

INSERT INTO `clothings` (`cid`, `price`, `color`, `brand`, `agegroup`, `sex`, `fabric`, `description`) VALUES
(1, 19, 'green', 'lendesigns', 'adult', 'unisex', 'cotton', 'A nice blue shirt by lendesigns, both for adults and teens'),
(2, 15, 'green', 'DarkyShirts (r)', 'adult', 'unisex', 'cotton', 'Darky maternitity clothing out of rune cloth'),
(3, 20, 'blue', 'darkystylez', 'adult', 'unisex', 'cotton', 'darkystylez baby unisex rune cloth'),
(4, 12.25, 'blue', 'lendesigns', 'adult', 'unisex', 'cotton', 'Calvin & Hobbes Blue Tshirt'),
(5, 19, 'red', 'pokédesign', 'adult', 'unisex', 'pokéterial', 'Charizard evolutions (red)'),
(6, 25.5, 'yellow', 'lendesigns', 'adult', 'unisex', 'dandylionflower', 'dandylionflower tshirt made of real dandylionflower (yellow)'),
(7, 19.99, 'yellow', 'lendesigns', 'adult', 'unisex', 'cotton', 'Yellow unicorn by lendesigns'),
(8, 25.45, 'grey', 'lendesigns', 'adult', 'unisex', 'cotton', 'Grey ferrets tshirt by lendesigns'),
(9, 33.33, 'black', 'pokédesign', 'adult', 'unisex', 'pokéterial', 'Team rocket shirt'),
(10, 5, 'blue', 'misc', 'teenager', 'male', 'rune cloth', 'Army of gondor tshirt'),
(11, 5, 'black', 'misc', 'teenager', 'male', 'cotton', 'Game of Chemistry'),
(12, 15.55, 'white', 'lendesign', 'teenager', 'male', 'cotton', 'Hear Evil, See Evil, Speak Evil'),
(13, 25.55, 'grey', 'lendesign', 'teenager', 'male', 'cotton', 'A Man Chooses, A Slave Obeys'),
(14, 10, 'black', 'misc', 'adult', 'male', 'cotton', 'W T F'),
(15, 11.99, 'blue', 'misc', 'adult', 'female', 'cotton', 'magikarp'),
(16, 13, 'blue', 'misc', 'adult', 'female', 'cotton', 'parking'),
(17, 15, 'black', 'misc', 'adult', 'unisex', 'cotton', 'Harry Potter'),
(18, 15, 'green', 'lendesigns', 'adult', 'unisex', 'cotton', 'Hadouken'),
(19, 17.25, 'blue', 'lendesigns', 'adult', 'unisex', 'cotton', 'Trust me I''m a doctor'),
(20, 27.25, 'grey', 'lendesigns', 'adult', 'unisex', 'cotton', 'Skyrim'),
(21, 3.33, 'Black', 'lendesigns', 'teenager', 'female', 'cotton', 'That''s what she said');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tshirt`
--

CREATE TABLE IF NOT EXISTS `tshirt` (
  `tid` bigint(20) NOT NULL AUTO_INCREMENT,
  `cid` bigint(20) NOT NULL,
  `format` text NOT NULL,
  `sleeves` text NOT NULL,
  PRIMARY KEY (`tid`),
  UNIQUE KEY `cid` (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Gegevens worden uitgevoerd voor tabel `tshirt`
--

INSERT INTO `tshirt` (`tid`, `cid`, `format`, `sleeves`) VALUES
(2, 1, 'normal', 'long'),
(3, 2, 'Real sexy', 'no sleeves'),
(4, 3, '', 'long sleeves'),
(5, 4, 'normal', 'short sleeves'),
(6, 5, 'normal', 'short sleeves'),
(7, 6, 'normal', 'short sleeves'),
(8, 7, 'normal', 'short sleeves'),
(9, 8, 'normal', 'short sleeves'),
(10, 9, 'normal', 'short sleeves'),
(11, 10, 'normal', 'short sleeves'),
(12, 11, 'normal', 'short sleeves'),
(13, 12, 'normal', 'short sleeves'),
(14, 13, 'normal', 'short sleeves'),
(15, 14, 'normal', 'short sleeves'),
(16, 15, 'normal', 'short sleeves'),
(17, 16, 'normal', 'short sleeves'),
(18, 17, 'normal', 'short sleeves'),
(19, 18, 'normal', 'short sleeves'),
(20, 19, 'normal', 'short sleeves'),
(21, 20, 'normal', 'short sleeves'),
(22, 21, 'normal', 'long sleeves');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(256) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden uitgevoerd voor tabel `users`
--

INSERT INTO `users` (`uid`, `username`, `password`) VALUES
(2, 'darquennes.dries@gmail.com', '6d99f86681056fb1591de66c7a2ca2b0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
