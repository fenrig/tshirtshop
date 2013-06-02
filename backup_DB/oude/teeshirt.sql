-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 20 apr 2013 om 16:24
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden uitgevoerd voor tabel `clothings`
--

INSERT INTO `clothings` (`cid`, `price`, `color`, `brand`, `agegroup`, `sex`, `fabric`, `description`) VALUES
(1, 19, 'blue', 'lendesigns', 'adult', 'unisex', 'cotton', 'A nice blue shirt by lendesigns, both for adults and teens'),
(2, 15, 'green', 'DarkyShirts (r)', 'maternity', 'female', 'rune cloth', 'Darky maternitity clothing out of rune cloth');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Gegevens worden uitgevoerd voor tabel `tshirt`
--

INSERT INTO `tshirt` (`tid`, `cid`, `format`, `sleeves`) VALUES
(2, 1, 'normal', 'long'),
(3, 2, 'Real sexy', 'no sleeves');

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
