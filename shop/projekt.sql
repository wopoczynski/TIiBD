-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 19 Sty 2017, 21:23
-- Wersja serwera: 10.1.16-MariaDB
-- Wersja PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `projekt`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category`
--

CREATE TABLE `category` (
  `id_c` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `category`
--

INSERT INTO `category` (`id_c`, `name`) VALUES
(1, 'sprzęt laboratoryjny'),
(2, 'odczynniki'),
(3, 'mikrobiologia');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `id_p` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `category` int(11) NOT NULL,
  `subcategory` int(11) NOT NULL,
  `subsubcategory` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `article_no` varchar(3) COLLATE utf8_polish_ci NOT NULL,
  `image` varchar(30) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `products`
--

INSERT INTO `products` (`id_p`, `name`, `category`, `subcategory`, `subsubcategory`, `quantity`, `price`, `article_no`, `image`) VALUES
(2, 'zlewka niska 250 ml', 1, 1, 1, 87, '10', '2', 'zlewka.jpg'),
(3, 'zlewka niska 400 ml', 1, 1, 1, 100, '10', '4', 'zlewka.jpg'),
(4, 'zlewka niska 100 ml', 1, 1, 1, 50, '8', '3', 'zlewka.jpg'),
(5, 'kolba okrągłodenna 50 ml', 1, 1, 2, 50, '12', '5', 'kolba okr.jpg'),
(6, 'kolba płaskodenna sz/sz 250 ml', 1, 1, 2, 60, '11', '6', 'kolba plaskodenna.jpg'),
(7, 'cylinder miarowy 10 ml', 1, 1, 3, 40, '5', '7', 'cylinder10.jpg'),
(8, 'cylinder miarowy 100 ml', 1, 1, 3, 50, '6', '8', 'cylinder100.jpg'),
(9, 'końcówki 10000 ul op 100 szt.', 1, 2, 4, 1000, '15', '9', 'końcówki.jpg'),
(10, 'Pipeta Clinipet 200 ul', 1, 2, 5, 50, '100', '10', 'pipeta 200.jpg'),
(11, 'Pipeta Clinipet 2 ul', 1, 2, 5, 50, '100', '11', 'pipeta.jpg'),
(12, 'Brilliance Salmonella', 3, 3, 6, 100, '10', '13', 'salmonella.jpg'),
(13, 'Brilliance E.coli', 3, 3, 6, 100, '10', '14', 'ecoli.jpg'),
(14, 'Szalki Petriego 55x14,2 mm A 1000 szt.', 3, 4, 7, 10000, '50', '15', 'szalka petr.jpg'),
(15, 'Szalki Petriego 90x16,2 mm RW 600 szt.', 3, 4, 7, 10000, '60', '16', 'szalka petr.jpg'),
(16, 'Eza 1 ul jednorazowa sterylna 100 szt.', 3, 4, 8, 1000, '10', '17', 'eza1ul.jpg'),
(17, 'Eza 10 ul jednorazowa sterylna 100 szt.', 3, 4, 8, 1000, '10', '18', 'eza.jpg'),
(18, 'Fenoloftaleina r-r 0,1% wsk 100 ml', 2, 5, 0, 100, '15', '19', 'fenoloftaleina.jpg'),
(19, 'Kwas azotowy 50% cz 250 ml', 2, 5, 0, 50, '30', '20', 'kwasazotowy50.jpg'),
(20, 'Zestaw do barwienia metodą Gramma 4 x 100 ml', 2, 6, 0, 60, '14', '21', 'zestaw_grama.jpg'),
(21, 'Fiolet krystaliczny - fenolowy 100 ml', 2, 6, 0, 40, '10', '22', 'fiolet.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `subcategory`
--

CREATE TABLE `subcategory` (
  `id_sc` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `id_c` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `subcategory`
--

INSERT INTO `subcategory` (`id_sc`, `name`, `id_c`) VALUES
(1, 'szkło laboratoryjne', 1),
(2, 'pipety', 1),
(3, 'podłoża', 3),
(4, 'plastiki', 3),
(5, 'dla szkół', 2),
(6, 'barwniki', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `subsubcategory`
--

CREATE TABLE `subsubcategory` (
  `id_ssc` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `id_sc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `subsubcategory`
--

INSERT INTO `subsubcategory` (`id_ssc`, `name`, `id_sc`) VALUES
(1, 'zlewki', 1),
(2, 'kolby', 1),
(3, 'cylindry miarowe', 1),
(4, 'końcówki do pipet', 2),
(5, 'pipety automatyczne', 2),
(6, 'podłoża na szalkach', 3),
(7, 'szalki Petriego', 4),
(8, 'ezy', 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id_u` int(11) NOT NULL,
  `firstname` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `surname` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `city` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `street` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `login` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_polish_ci NOT NULL,
  `mail` varchar(30) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id_u`, `firstname`, `surname`, `city`, `street`, `login`, `password`, `mail`) VALUES
(1, 'Łukasz', 'Lewandowski', 'Poznań', '', '', '', ''),
(2, 'Jan', 'Nowak', 'Katowice', '', '', '', ''),
(3, 'Maciej', 'Wójcik', 'Bydgoszcz', '', '', '', ''),
(4, 'Agnieszka', 'Psikuta', 'Lublin', '', '', '', ''),
(5, 'Tomasz', 'Mazur', 'Jelenia Góra', '', '', '', ''),
(6, 'Michał', 'Zieliński', 'Kraków', '', '', '', ''),
(7, 'Artur', 'Rutkowski', 'Kielce', '', '', '', ''),
(8, 'Mateusz', 'Skorupa', 'Gdańsk', '', '', '', ''),
(9, 'Jerzy', 'Rutkowski', 'Rybnik', '', '', '', ''),
(10, 'Anna', 'Karenina', 'Pułtusk', '', '', '', ''),
(11, 'Franciszek', 'Jadnowski', 'Chorzów', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users_buy_products`
--

CREATE TABLE `users_buy_products` (
  `id_o` int(11) NOT NULL,
  `id_u` int(11) NOT NULL,
  `id_p` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` date NOT NULL,
  `state` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users_buy_products`
--

INSERT INTO `users_buy_products` (`id_o`, `id_u`, `id_p`, `quantity`, `date`, `state`) VALUES
(1, 1, 2, 1, '2016-11-02', 0),
(2, 2, 4, 3, '2016-10-19', 0),
(3, 3, 2, 12, '2016-10-26', 0),
(4, 4, 4, 5, '2016-10-03', 0),
(5, 7, 1, 15, '2016-10-16', 0),
(6, 10, 5, 9, '2016-10-11', 0),
(7, 11, 9, 1, '2016-11-03', 0),
(8, 7, 12, 20, '2016-10-05', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_c`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_p`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id_sc`);

--
-- Indexes for table `subsubcategory`
--
ALTER TABLE `subsubcategory`
  ADD PRIMARY KEY (`id_ssc`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_u`),
  ADD KEY `id` (`id_u`);

--
-- Indexes for table `users_buy_products`
--
ALTER TABLE `users_buy_products`
  ADD PRIMARY KEY (`id_o`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `category`
--
ALTER TABLE `category`
  MODIFY `id_c` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `products`
--
ALTER TABLE `products`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT dla tabeli `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id_sc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT dla tabeli `subsubcategory`
--
ALTER TABLE `subsubcategory`
  MODIFY `id_ssc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT dla tabeli `users_buy_products`
--
ALTER TABLE `users_buy_products`
  MODIFY `id_o` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
