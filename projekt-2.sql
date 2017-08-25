-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 07 Lis 2016, 14:59
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
(2, 'odczynniki');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `id_p` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `category` int(11) NOT NULL,
  `subcategory` int(11) NOT NULL,
  `subsubcategory` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `article_no` varchar(3) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `products`
--

INSERT INTO `products` (`id_p`, `name`, `category`, `subcategory`, `subsubcategory`, `quantity`, `price`, `article_no`) VALUES
(1, 'probówka', 1, 1, 0, 100, '1', '1'),
(2, 'zlewka 250 ml', 1, 1, 0, 100, '10', '2');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `product_with_product`
--

CREATE TABLE `product_with_product` (
  `id_cw` int(11) NOT NULL,
  `id_p1` int(11) NOT NULL,
  `od_p2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

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
(1, 'szkło', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `subsubcategory`
--

CREATE TABLE `subsubcategory` (
  `id_ssc` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `id_sc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id_u` int(11) NOT NULL,
  `firstname` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `surname` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `address` varchar(30) COLLATE utf8_polish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id_u`, `firstname`, `surname`, `address`) VALUES
(1, 'Łukasz', 'Lewandowski', 'Poznań'),
(2, 'Jan', 'Nowak', 'Katowice'),
(3, 'Maciej', 'Wójcik', 'Bydgoszcz'),
(4, 'Agnieszka', 'Psikuta', 'Lublin'),
(5, 'Tomasz', 'Mazur', 'Jelenia Góra'),
(6, 'Michał', 'Zieliński', 'Kraków'),
(7, 'Artur', 'Rutkowski', 'Kielce'),
(8, 'Mateusz', 'Skorupa', 'Gdańsk'),
(9, 'Jerzy', 'Rutkowski', 'Rybnik'),
(10, 'Anna', 'Karenina', 'Pułtusk'),
(11, 'Franciszek', 'Jadnowski', 'Chorzów');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users_buy_products`
--

CREATE TABLE `users_buy_products` (
  `id_o` int(11) NOT NULL,
  `id_u` int(11) NOT NULL,
  `id_p` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users_buy_products`
--

INSERT INTO `users_buy_products` (`id_o`, `id_u`, `id_p`, `quantity`, `date`) VALUES
(1, 1, 2, 1, '2016-11-02'),
(2, 2, 4, 3, '2016-10-19'),
(3, 3, 2, 12, '2016-10-26'),
(4, 4, 4, 5, '2016-10-03'),
(5, 7, 1, 15, '2016-10-16'),
(6, 10, 5, 9, '2016-10-11');

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
-- Indexes for table `product_with_product`
--
ALTER TABLE `product_with_product`
  ADD PRIMARY KEY (`id_cw`);

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
  MODIFY `id_c` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `products`
--
ALTER TABLE `products`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `product_with_product`
--
ALTER TABLE `product_with_product`
  MODIFY `id_cw` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id_sc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `subsubcategory`
--
ALTER TABLE `subsubcategory`
  MODIFY `id_ssc` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT dla tabeli `users_buy_products`
--
ALTER TABLE `users_buy_products`
  MODIFY `id_o` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
