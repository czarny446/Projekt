-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 08 Gru 2022, 20:13
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `biblioteka`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `administratorzy`
--

CREATE TABLE `administratorzy` (
  `ID_administratora` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `haslo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `administratorzy`
--

INSERT INTO `administratorzy` (`ID_administratora`, `login`, `haslo`) VALUES
(1, 'Admin1', '$2y$10$Pf3Nqcq81PRyL4aXTdgtZOJ3XdWVOqjKc2UADCsyLPpPXpjzme.Vi');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `ID_kategorii` int(11) NOT NULL,
  `Nazwa` varchar(20) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Opis` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `kategorie`
--

INSERT INTO `kategorie` (`ID_kategorii`, `Nazwa`, `Opis`) VALUES
(1, 'powieść historyczna', 'Jej korzenie, według niektórych badaczy, sięgają starożytności (Odyseja), a przede wszystkim – średniowiecznych romansów rycerskich, czy późniejszych XVI lub XVII-wiecznych romansów awanturniczych. Powieść historyczna jest utworem dymorficznym, powstałym na dwóch podstawowych płaszczyznach konstrukcji fabuły – historycznej i literackiej, przy czym w zależności od obowiązujących nurtów czy prądów literackich, zdolności pisarskich twórców i oczekiwań czytelniczych, wzajemny stosunek tych dwóch płaszczyzn w trakcie ewolucji gatunku ulegał zmianie.'),
(2, 'fantastyka', 'Fantastyka to gatunek literacki, który polega na kreowaniu świata przedstawionego, który w całości lub części różni się od rzeczywistości. Fantastykę cechuje duża swoboda w kreowaniu świata i bohaterów. Czytelnik uznaje dzieło jako spójną całość, działającą w ramach stworzonego przez autora świata. J.R.R Tolkien, Stanisław Lem czy „Wiedźmina” i Andrzej Sapkowski - to ich powieści tu znajdzie. I mnóstwo innych twórców m.in.: Suzanne Collins, Rebecca F. Kuang, John Flanagan, Michał Gołkowski, Robert J. Szmidt, Cixin Liu, Aneta Jadowska, Marta Kisiel, Sarah J. Maas, Andrzej Pilipiuk, Jacek Piekara czy Bridget Collins. Wśród głównych nurtów fantastyki, można znaleźć wiele różnych podgatunków np. hard science fiction, low fantasy, urban fantasy, steampunk czy realizm magiczny.');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ksiazki`
--

CREATE TABLE `ksiazki` (
  `ID_ksiazki` int(11) NOT NULL,
  `Tytul` varchar(150) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Autor` varchar(150) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Wydawnictwo` varchar(40) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Rok_wydania` int(11) NOT NULL,
  `ID_kategorii` int(11) NOT NULL,
  `Opis` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `ksiazki`
--

INSERT INTO `ksiazki` (`ID_ksiazki`, `Tytul`, `Autor`, `Wydawnictwo`, `Rok_wydania`, `ID_kategorii`, `Opis`) VALUES
(22, '\"Krzyżacy\"', 'Henryk Sienkiewicz', 'Wydawnictwo GREG', 2001, 1, 'DFXXBVDV');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uczniowie`
--

CREATE TABLE `uczniowie` (
  `ID_ucznia` int(11) NOT NULL,
  `Imie` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Login` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Haslo` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Miejscowosc` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Ulica` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Nr.domu` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Kod_pocztowy` varchar(10) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Data_urodzenia` date NOT NULL,
  `Telefon` varchar(16) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Email` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `plec` varchar(10) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `uczniowie`
--

INSERT INTO `uczniowie` (`ID_ucznia`, `Imie`, `Nazwisko`, `Login`, `Haslo`, `Miejscowosc`, `Ulica`, `Nr.domu`, `Kod_pocztowy`, `Data_urodzenia`, `Telefon`, `Email`, `plec`) VALUES
(1, 'Jakub', 'Wrona', 'wrona12', '$2y$10$qtm43qPHOAlhF7t8bCjXKOczqOhsTmnSa9dstkJGb3po3V/gBSWvC', 'Łomża', 'ul.Konstytucji 4', '', '18-400', '2002-11-02', '+48 321 445 433', 'wrona.12@gamil.com', 'M'),
(2, 'Marcin', 'Miodek', 'SMP', '$2y$10$t/ScakU75kNJi5Qk5.2xmuTnEtUOA7/pyqzdr37WG1Z1z7BnqgDqC', 'Grajewo', 'ul.Szkolna ', '10B', '19-200', '1992-04-09', '+48 213 878 845', 'Marcin_smp@wo.pl', 'M'),
(3, 'Damian', 'Nowak', 'nowak123', '$2y$10$DvB3dqD6eAqskB5iPEZzDOKlw4txxf2Fyyl3AUC/IQ8QgZNzcMZcS', 'Łomża', 'ul.Konstytucji ', '3', '18-400', '2004-01-19', '123 345 456', 'd.nowak@gmail.com', 'M'),
(4, 'Anna', 'Kruk', 'Kruk1223', '$2y$10$JrrcCB9YvRjyJXGJNkx3o.1UGYmtO4cXeaz70oaEATAB/bdV7v3q2', 'Grądy-Woniecko', 'ul.Grądy-Woniecko', '8', '18-400', '2004-11-22', '234 332 245', 'a.kruczek@wp.pl', 'Ż');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wypozyczenia`
--

CREATE TABLE `wypozyczenia` (
  `ID_wypozyczenia` int(11) NOT NULL,
  `ID_ucznia` int(11) NOT NULL,
  `ID_ksiazki` int(11) NOT NULL,
  `Data_wypozyczenia` date NOT NULL,
  `Data_zwrotu` date NOT NULL,
  `Uwagi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `administratorzy`
--
ALTER TABLE `administratorzy`
  ADD PRIMARY KEY (`ID_administratora`);

--
-- Indeksy dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`ID_kategorii`);

--
-- Indeksy dla tabeli `ksiazki`
--
ALTER TABLE `ksiazki`
  ADD PRIMARY KEY (`ID_ksiazki`),
  ADD KEY `ID_kategorii` (`ID_kategorii`);

--
-- Indeksy dla tabeli `uczniowie`
--
ALTER TABLE `uczniowie`
  ADD PRIMARY KEY (`ID_ucznia`);

--
-- Indeksy dla tabeli `wypozyczenia`
--
ALTER TABLE `wypozyczenia`
  ADD PRIMARY KEY (`ID_wypozyczenia`),
  ADD KEY `ID_ucznia` (`ID_ucznia`,`ID_ksiazki`),
  ADD KEY `ID_ksiazki` (`ID_ksiazki`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `administratorzy`
--
ALTER TABLE `administratorzy`
  MODIFY `ID_administratora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `ID_kategorii` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `ksiazki`
--
ALTER TABLE `ksiazki`
  MODIFY `ID_ksiazki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT dla tabeli `uczniowie`
--
ALTER TABLE `uczniowie`
  MODIFY `ID_ucznia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `wypozyczenia`
--
ALTER TABLE `wypozyczenia`
  MODIFY `ID_wypozyczenia` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `ksiazki`
--
ALTER TABLE `ksiazki`
  ADD CONSTRAINT `ksiazki_ibfk_1` FOREIGN KEY (`ID_kategorii`) REFERENCES `kategorie` (`ID_kategorii`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `wypozyczenia`
--
ALTER TABLE `wypozyczenia`
  ADD CONSTRAINT `wypozyczenia_ibfk_1` FOREIGN KEY (`ID_ucznia`) REFERENCES `uczniowie` (`ID_ucznia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wypozyczenia_ibfk_2` FOREIGN KEY (`ID_ksiazki`) REFERENCES `ksiazki` (`ID_ksiazki`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
