-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 20 Mar 2012, 14:46
-- Wersja serwera: 5.5.20
-- Wersja PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `projekt_nocleg`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `noclegownia`
--

CREATE TABLE IF NOT EXISTS `noclegownia` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(200) COLLATE utf8_polish_ci NOT NULL,
  `miejscowosc` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `kod_pocztowy` varchar(6) COLLATE utf8_polish_ci NOT NULL,
  `ulica` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `opis` varchar(700) COLLATE utf8_polish_ci NOT NULL,
  `ocena` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `typ` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `zdjecie` mediumblob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `noclegownia`
--

INSERT INTO `noclegownia` (`id`, `nazwa`, `miejscowosc`, `kod_pocztowy`, `ulica`, `opis`, `ocena`, `typ`, `status`, `zdjecie`) VALUES
(1, 'Lesna polana', 'sekocin stary 40-444', '', '', 'Lesna polana to po prostu lesna polana i tyle ', '5', 'Agroturystyka', 0, ''),
(2, 'Dziki Zachód', 'Pozna? 66-666', '', '', 'Dziki Zachód na dzikim zachodzie ', '7', 'Kwatera prywatna', 0, ''),
(3, 'Lesna polana', 'sekocin stary', '', '', 'Lesna polana to po prostu lesna polana i tyle ', '5', 'Agroturystyka', 0, '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `pokoj`
--

CREATE TABLE IF NOT EXISTS `pokoj` (
  `id_pok` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `id_miejsce` int(11) NOT NULL,
  `tytul` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `opis` varchar(700) COLLATE utf8_polish_ci NOT NULL,
  `cena` int(5) NOT NULL,
  `tv` varchar(8) COLLATE utf8_polish_ci DEFAULT 'Brak',
  `lodowka` varchar(8) COLLATE utf8_polish_ci DEFAULT 'Brak',
  `wc` varchar(8) COLLATE utf8_polish_ci DEFAULT 'Brak',
  `prszynic` varchar(8) COLLATE utf8_polish_ci DEFAULT 'Brak',
  `wanna` varchar(8) COLLATE utf8_polish_ci DEFAULT 'Brak',
  `jacuzzi` varchar(8) COLLATE utf8_polish_ci DEFAULT 'Brak',
  `klimatyzacja` varchar(8) COLLATE utf8_polish_ci DEFAULT 'Brak',
  `internet` varchar(8) COLLATE utf8_polish_ci DEFAULT 'Brak',
  `zdjecie` mediumblob NOT NULL,
  PRIMARY KEY (`id_pok`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `pokoj`
--

INSERT INTO `pokoj` (`id_pok`, `id_miejsce`, `tytul`, `opis`, `cena`, `tv`, `lodowka`, `wc`, `prszynic`, `wanna`, `jacuzzi`, `klimatyzacja`, `internet`, `zdjecie`) VALUES
(1, 1, 'Pokój 5-cio osobowy', 'Ekskluzywny pokój', 1000, 'Brak', 'Brak', 'Dostępny', 'Dostępny', 'Brak', 'Brak', 'Brak', 'Dostępny', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `rezerwacje`
--

CREATE TABLE IF NOT EXISTS `rezerwacje` (
  `id_rez` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pokoj` int(10) NOT NULL,
  `login` varchar(11) COLLATE utf8_polish_ci NOT NULL,
  `data_od` int(11) NOT NULL,
  `data_do` int(11) NOT NULL,
  `wartosc` int(10) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_rez`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=181 ;

--
-- Zrzut danych tabeli `rezerwacje`
--

INSERT INTO `rezerwacje` (`id_rez`, `id_pokoj`, `login`, `data_od`, `data_do`, `wartosc`, `status`) VALUES
(180, 1, 'misialek', 1333843200, 1333929600, 0, 0),
(179, 1, 'misialek', 1333411200, 1333497600, 0, 0),
(178, 1, 'misialek', 1333584000, 1333756800, 0, 0),
(177, 1, 'misialek', 1332374400, 1332547200, 0, 0),
(176, 1, 'misialek', 1333065600, 1333152000, 0, 0),
(175, 1, 'misialek', 1332633600, 1332720000, 0, 0),
(174, 1, 'misialek', 1332892800, 1332979200, 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `uzytkownik`
--

CREATE TABLE IF NOT EXISTS `uzytkownik` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `typ_konta` int(11) NOT NULL DEFAULT '30',
  `imie` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `login` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `kod` varchar(32) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `data` datetime NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `id_miejsce` int(10) DEFAULT NULL COMMENT 'id miejsca pracy. Swojej noclegowni',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=20 ;

--
-- Zrzut danych tabeli `uzytkownik`
--

INSERT INTO `uzytkownik` (`id`, `typ_konta`, `imie`, `nazwisko`, `login`, `haslo`, `email`, `kod`, `data`, `status`, `id_miejsce`) VALUES
(19, 30, 'MichaÅ‚', 'Tomaszczyk', 'misialek', 'e4d3956f2a4ba47ed221bd8dfbd5bb6a', 'misialek@gmail.com', '34894f670c4b1310f', '2012-03-19 13:01:04', 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
