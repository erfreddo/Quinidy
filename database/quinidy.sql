-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 22, 2023 alle 11:42
-- Versione del server: 10.4.27-MariaDB
-- Versione PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quinidy`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `idutente` int(11) NOT NULL,
  `nickname` varchar(30) NOT NULL,
  `email` varchar(319) NOT NULL,
  `password` varchar(80) NOT NULL,
  `propic` text NOT NULL DEFAULT 'https://i.imgur.com/V4RclNb.png',
  `answered` int(11) NOT NULL DEFAULT 0,
  `correct` int(11) NOT NULL DEFAULT 0,
  `art_points` int(11) NOT NULL DEFAULT 0,
  `cinema_points` int(11) NOT NULL DEFAULT 0,
  `world_points` int(11) NOT NULL DEFAULT 0,
  `music_points` int(11) NOT NULL DEFAULT 0,
  `science_points` int(11) NOT NULL DEFAULT 0,
  `history_points` int(11) NOT NULL DEFAULT 0,
  `sport_points` int(11) NOT NULL DEFAULT 0,
  `four_levels` int(11) NOT NULL DEFAULT 1,
  `discovery_levels` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`idutente`, `nickname`, `email`, `password`, `propic`, `answered`, `correct`, `art_points`, `cinema_points`, `world_points`, `music_points`, `science_points`, `history_points`, `sport_points`, `four_levels`, `discovery_levels`) VALUES
(1, 'Giacomino', 'giacomino@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'https://i.imgur.com/Ao9x3G1.png', 468, 205, 82, 12, 38, 17, 50, 14, 2, 1, 1),
(19, 'fred', 'fred@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'https://t4.ftcdn.net/jpg/03/31/69/91/360_F_331699188_lRpvqxO5QRtwOM05gR50ImaaJgBx68vi.jpg', 54, 10, -9, -21, 0, -21, -3, -21, -6, 1, 1),
(36, 'Paolone', 'paolone@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'https://t4.ftcdn.net/jpg/03/31/69/91/360_F_331699188_lRpvqxO5QRtwOM05gR50ImaaJgBx68vi.jpg', 18, 10, -3, -3, 0, -3, 0, -3, 0, 1, 1),
(37, 'Edoardo91', 'edo@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'https://t4.ftcdn.net/jpg/03/31/69/91/360_F_331699188_lRpvqxO5QRtwOM05gR50ImaaJgBx68vi.jpg', 54, 14, 0, 0, 0, 0, 0, 0, 0, 1, 1),
(38, 'Riccardo00', 'riccardo@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'https://t4.ftcdn.net/jpg/03/31/69/91/360_F_331699188_lRpvqxO5QRtwOM05gR50ImaaJgBx68vi.jpg', 18, 5, -3, -3, 0, -3, 0, -3, 0, 1, 1),
(39, 'Rocky1', 'rocky@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'https://t4.ftcdn.net/jpg/03/31/69/91/360_F_331699188_lRpvqxO5QRtwOM05gR50ImaaJgBx68vi.jpg', 186, 54, 11, 20, -4, -20, -3, 0, 34, 1, 1),
(40, 'Karlo71', 'karlo@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'https://t4.ftcdn.net/jpg/03/31/69/91/360_F_331699188_lRpvqxO5QRtwOM05gR50ImaaJgBx68vi.jpg', 57, 17, -6, 3, 3, -6, 0, 0, 0, 1, 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`idutente`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `idutente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
