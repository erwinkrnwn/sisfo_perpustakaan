-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Apr 2019 pada 22.03
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `administrator`
--

CREATE TABLE `administrator` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `administrator`
--

INSERT INTO `administrator` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `ISBN` varchar(17) NOT NULL,
  `name` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `edition` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `book`
--

INSERT INTO `book` (`id`, `ISBN`, `name`, `author`, `edition`, `stock`) VALUES
(2, 'ISBN1', 'The Power of Habit', 'Charles Duhigg', 1, 5),
(3, 'ISBN2', 'Orang Orang Biasa', 'Andrea Hirata', 2, 4),
(4, 'ISBN3', 'First & Then', 'Emma Mills', 3, 0),
(5, 'ISBN4', 'Dog Man #1', 'Dav Pilkey', 5, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `borrow`
--

CREATE TABLE `borrow` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `date_borrowed` date NOT NULL,
  `date_returned` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `borrow`
--

INSERT INTO `borrow` (`id`, `member_id`, `book_id`, `date_borrowed`, `date_returned`) VALUES
(1, 1, 2, '2019-04-10', '2019-04-17'),
(2, 1, 2, '2019-04-10', '2019-04-10'),
(3, 1, 3, '2019-04-10', '2019-04-10'),
(4, 2, 3, '2019-04-10', '2019-04-13'),
(5, 2, 2, '2019-04-10', '2019-04-10'),
(6, 1, 3, '2019-04-10', '2019-04-10'),
(7, 3, 2, '2019-04-10', '2019-04-10'),
(8, 1, 3, '2019-04-10', '2019-04-10'),
(9, 1, 2, '2019-04-10', '2019-04-17'),
(10, 1, 3, '2019-04-10', '2019-04-17'),
(11, 1, 3, '2019-04-13', '2019-04-26'),
(12, 1, 3, '2019-04-14', NULL),
(13, 1, 2, '2019-04-17', NULL),
(14, 1, 3, '2019-04-17', NULL),
(15, 1, 3, '2019-04-17', NULL),
(16, 1, 2, '2019-04-25', NULL),
(17, 1, 2, '2019-04-25', NULL),
(18, 1, 3, '2019-04-25', NULL),
(19, 6, 4, '2019-04-26', NULL),
(20, 6, 4, '2019-04-26', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `position` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `birthdate` date NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `employee`
--

INSERT INTO `employee` (`id`, `username`, `password`, `position`, `fullname`, `age`, `birthdate`, `address`) VALUES
(4, 'staff', 'staff', 0, 'Bambang Supardi', 40, '2019-04-01', 'Sukabirus'),
(5, 'staff2', 'staff2', 0, 'Sutarjo', 40, '2019-04-01', 'Sukapura');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `birthdate` date NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id`, `username`, `password`, `fullname`, `age`, `birthdate`, `address`) VALUES
(1, 'member1', 'password1', 'fullname1', 1, '2019-04-02', 'address1'),
(2, 'member2', 'password2', 'fullname2', 2, '2019-04-02', 'address2'),
(3, 'member3', 'password3', 'fullname3', 3, '1997-08-01', 'address3'),
(4, 'member5', 'password5', 'fullname5', 5, '1997-08-08', 'adrress5'),
(6, 'erwin', 'erwin', 'Erwin Kurniawan', 21, '1997-10-29', 'Jalan Ciganitri');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indeks untuk tabel `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `borrow`
--
ALTER TABLE `borrow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `borrow_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`),
  ADD CONSTRAINT `borrow_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
