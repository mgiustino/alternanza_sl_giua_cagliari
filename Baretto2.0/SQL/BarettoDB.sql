-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Mar 27, 2018 alle 18:12
-- Versione del server: 10.1.31-MariaDB
-- Versione PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BarettoDB`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `CategorieProdotti`
--

CREATE TABLE `CategorieProdotti` (
  `Id` tinyint(4) NOT NULL,
  `Descrizione` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `CategorieProdotti`
--

INSERT INTO `CategorieProdotti` (`Id`, `Descrizione`) VALUES
(1, 'Bevande'),
(2, 'Panini'),
(3, 'Cafeteria'),
(4, 'Altro');

-- --------------------------------------------------------

--
-- Struttura della tabella `CategorieUtente`
--

CREATE TABLE `CategorieUtente` (
  `Id` tinyint(11) NOT NULL,
  `Descrizione` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `CategorieUtente`
--

INSERT INTO `CategorieUtente` (`Id`, `Descrizione`) VALUES
(1, 'Admin'),
(2, 'Utente'),
(3, 'Ristoratore');

-- --------------------------------------------------------

--
-- Struttura della tabella `CtrlOrdiniProdotti`
--

CREATE TABLE `CtrlOrdiniProdotti` (
  `IdOrdine` int(11) NOT NULL,
  `IdProdotto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `CtrlOrdiniProdotti`
--

INSERT INTO `CtrlOrdiniProdotti` (`IdOrdine`, `IdProdotto`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `CtrlPreferiti`
--

CREATE TABLE `CtrlPreferiti` (
  `idUtete` int(11) NOT NULL,
  `idProdotto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `CtrlProdottiIngredienti`
--

CREATE TABLE `CtrlProdottiIngredienti` (
  `IdProdotto` int(11) NOT NULL,
  `IdIngredienti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `CtrlProdottiIngredienti`
--

INSERT INTO `CtrlProdottiIngredienti` (`IdProdotto`, `IdIngredienti`) VALUES
(1, 1),
(1, 10);

-- --------------------------------------------------------

--
-- Struttura della tabella `Ingredienti`
--

CREATE TABLE `Ingredienti` (
  `Id` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Costo` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `Ingredienti`
--

INSERT INTO `Ingredienti` (`Id`, `Nome`, `Costo`) VALUES
(1, 'Salame', 0.5),
(2, 'Formaggio', 0.5),
(3, 'Crudo', 0.5),
(4, 'Cotto', 0.5),
(5, 'Mozzarella', 0.5),
(6, 'Pomodoro', 0.5),
(7, 'Tonno', 0.5),
(8, 'Maionese', 0.5),
(9, 'Speck', 0.5),
(10, 'Pane', 0.5);

-- --------------------------------------------------------

--
-- Struttura della tabella `Ordini`
--

CREATE TABLE `Ordini` (
  `Id` int(11) NOT NULL,
  `DataOra` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Completato` tinyint(1) NOT NULL,
  `IdUtente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `Ordini`
--

INSERT INTO `Ordini` (`Id`, `DataOra`, `Completato`, `IdUtente`) VALUES
(1, '2018-03-27 16:08:18', 0, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `Prodotti`
--

CREATE TABLE `Prodotti` (
  `Id` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Prezzo` double DEFAULT NULL,
  `Categorie` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `Prodotti`
--

INSERT INTO `Prodotti` (`Id`, `Nome`, `Prezzo`, `Categorie`) VALUES
(1, 'Panino al Salame', 1, 2),
(2, 'Panino al Formaggio', 1, 2),
(3, 'Caffè', 0.5, 3),
(4, 'Coca Cola', 0.9, 1),
(5, 'Caramella', 0.05, 4),
(6, 'Panino Custom', NULL, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `Utenti`
--

CREATE TABLE `Utenti` (
  `Matricola` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Cognome` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Classe` varchar(5) DEFAULT NULL,
  `Categoria` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Utente salvato nel DB';

--
-- Dump dei dati per la tabella `Utenti`
--

INSERT INTO `Utenti` (`Matricola`, `Nome`, `Cognome`, `Email`, `Password`, `Classe`, `Categoria`) VALUES
(1, 'Cristian', 'Porcu', 'cristian.porcu22icloud.com', 'sqlbaretto', '4', 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `CategorieProdotti`
--
ALTER TABLE `CategorieProdotti`
  ADD PRIMARY KEY (`Id`);

--
-- Indici per le tabelle `CategorieUtente`
--
ALTER TABLE `CategorieUtente`
  ADD PRIMARY KEY (`Id`);

--
-- Indici per le tabelle `CtrlOrdiniProdotti`
--
ALTER TABLE `CtrlOrdiniProdotti`
  ADD PRIMARY KEY (`IdProdotto`,`IdOrdine`),
  ADD KEY `IdOrdine` (`IdOrdine`);

--
-- Indici per le tabelle `CtrlPreferiti`
--
ALTER TABLE `CtrlPreferiti`
  ADD PRIMARY KEY (`idUtete`,`idProdotto`),
  ADD KEY `idProdotto` (`idProdotto`);

--
-- Indici per le tabelle `CtrlProdottiIngredienti`
--
ALTER TABLE `CtrlProdottiIngredienti`
  ADD PRIMARY KEY (`IdProdotto`,`IdIngredienti`),
  ADD KEY `IdIngredienti` (`IdIngredienti`);

--
-- Indici per le tabelle `Ingredienti`
--
ALTER TABLE `Ingredienti`
  ADD PRIMARY KEY (`Id`);

--
-- Indici per le tabelle `Ordini`
--
ALTER TABLE `Ordini`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdUtente` (`IdUtente`);

--
-- Indici per le tabelle `Prodotti`
--
ALTER TABLE `Prodotti`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Categorie` (`Categorie`);

--
-- Indici per le tabelle `Utenti`
--
ALTER TABLE `Utenti`
  ADD PRIMARY KEY (`Matricola`),
  ADD KEY `FkCategorie` (`Categoria`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `CategorieProdotti`
--
ALTER TABLE `CategorieProdotti`
  MODIFY `Id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `CategorieUtente`
--
ALTER TABLE `CategorieUtente`
  MODIFY `Id` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `Ingredienti`
--
ALTER TABLE `Ingredienti`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `Ordini`
--
ALTER TABLE `Ordini`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `Prodotti`
--
ALTER TABLE `Prodotti`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `Utenti`
--
ALTER TABLE `Utenti`
  MODIFY `Matricola` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `CtrlOrdiniProdotti`
--
ALTER TABLE `CtrlOrdiniProdotti`
  ADD CONSTRAINT `CtrlOrdiniProdotti_ibfk_1` FOREIGN KEY (`IdOrdine`) REFERENCES `Ordini` (`Id`),
  ADD CONSTRAINT `CtrlOrdiniProdotti_ibfk_2` FOREIGN KEY (`IdProdotto`) REFERENCES `Prodotti` (`Id`);

--
-- Limiti per la tabella `CtrlPreferiti`
--
ALTER TABLE `CtrlPreferiti`
  ADD CONSTRAINT `CtrlPreferiti_ibfk_1` FOREIGN KEY (`idProdotto`) REFERENCES `Prodotti` (`Id`),
  ADD CONSTRAINT `CtrlPreferiti_ibfk_2` FOREIGN KEY (`idUtete`) REFERENCES `Utenti` (`Matricola`);

--
-- Limiti per la tabella `CtrlProdottiIngredienti`
--
ALTER TABLE `CtrlProdottiIngredienti`
  ADD CONSTRAINT `CtrlProdottiIngredienti_ibfk_1` FOREIGN KEY (`IdIngredienti`) REFERENCES `Ingredienti` (`Id`),
  ADD CONSTRAINT `CtrlProdottiIngredienti_ibfk_2` FOREIGN KEY (`IdProdotto`) REFERENCES `Prodotti` (`Id`);

--
-- Limiti per la tabella `Ordini`
--
ALTER TABLE `Ordini`
  ADD CONSTRAINT `Ordini_ibfk_1` FOREIGN KEY (`IdUtente`) REFERENCES `Utenti` (`Matricola`);

--
-- Limiti per la tabella `Prodotti`
--
ALTER TABLE `Prodotti`
  ADD CONSTRAINT `Prodotti_ibfk_1` FOREIGN KEY (`Categorie`) REFERENCES `CategorieProdotti` (`Id`);

--
-- Limiti per la tabella `Utenti`
--
ALTER TABLE `Utenti`
  ADD CONSTRAINT `FkCategorie` FOREIGN KEY (`Categoria`) REFERENCES `CategorieUtente` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
