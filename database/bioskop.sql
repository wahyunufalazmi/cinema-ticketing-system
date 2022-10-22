-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jun 2021 pada 17.16
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bioskop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `identity`
--

CREATE TABLE `identity` (
  `id_identity` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `nik` char(16) NOT NULL,
  `age` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `movie`
--

CREATE TABLE `movie` (
  `id_movie` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `synopsis` text NOT NULL,
  `description` text NOT NULL,
  `realese` date NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `movie`
--

INSERT INTO `movie` (`id_movie`, `title`, `synopsis`, `description`, `realese`, `picture`) VALUES
(1, 'Aladin', 'Aladdin, a street urchin in the Arabian city of Agrabah, and his monkey Abu meet Princess Jasmine, who has snuck away from her sheltered life in the palace. Jasmine wishes to succeed her father as Sultan, but is instead expected to marry one of her royal suitors, including the charming yet dimwitted Prince Anders. Jafar, the grand vizier, schemes to overthrow the Sultan and seeks a magic lamp hidden in the Cave of Wonders, but only \"the diamond in the rough\" can enter the cave.', 'Aladdin is a 2019 American musical fantasy film produced by Walt Disney Pictures. Directed by Guy Ritchie, from a script he co-wrote with John August, it is a live-action/CGI adaptation of Disney\'s 1992 animated film of the same name, which itself is based on the eponymous tale from One Thousand and One Nights.[1][a] The film stars Mena Massoud, Will Smith, Naomi Scott, Marwan Kenzari, Navid Negahban, Nasim Pedrad, Billy Magnussen, and Numan Acar, as well as the voices of Alan Tudyk and Frank Welker, the latter of whom reprises his roles from all previous media. The plot follows Aladdin, a street urchin, as he falls in love with Princess Jasmine, befriends a wish-granting Genie, and battles the wicked Jafar.', '2019-05-24', 'aladdin.jpg'),
(2, 'John Wick 3', 'John Wick makes his way through Manhattan before he is labeled \"excommunicado\" for the unauthorized killing of High Table crime lord Santino D\'Antonio on the grounds of the New York Continental Hotel.[N 1] At the New York Public Library, John retrieves a marker medallion and a rosary. He is injured in a fight with another hitman and seeks medical treatment from an underworld doctor, but his $14 million bounty activates before the doctor can finish. John finishes suturing himself but is quickly pursued by various gangs of assassins whom he kills after a significant struggle.', 'John Wick: Chapter 3 – Parabellum (also known as simply John Wick: Chapter 3) is a 2019 American neo-noir action thriller film starring Keanu Reeves as the eponymous character. It is the third installment in the John Wick film series, following John Wick (2014) and Chapter 2 (2017). The film is directed by Chad Stahelski and written by Derek Kolstad, Shay Hatten, Chris Collins, and Marc Abrams, based on a story by Kolstad. It also stars Halle Berry, Laurence Fishburne, Mark Dacascos, Asia Kate Dillon, Lance Reddick, Anjelica Huston, and Ian McShane. In the film, which picks up minutes after the end of the previous film, ex-hitman John Wick finds himself on the run from legions of assassins after a $14 million contract is put on his head due to his recent actions.', '2019-05-17', 'jw3.jpg'),
(3, 'Godzilla 2', 'Five years after the existence of the \"Titans\" was revealed to the world, Dr. Emma Russell, a paleobiologist working for the Titan-studying organization Monarch, and her daughter Madison witness the birth of a larva called Mothra. Emma calms Mothra using the \"Orca,\" a device that can emit frequencies to attract or alter Titan behavior. A group of eco-terrorists, led by former British Army Colonel Alan Jonah, attacks the base and abducts Emma and Madison, while Mothra flees and pupates under a nearby waterfall.', 'Godzilla: King of the Monsters[b] is a 2019 American monster film directed and co-written by Michael Dougherty. A sequel to Godzilla (2014), it is the 35th film in the Godzilla franchise, the third film in Legendary\'s MonsterVerse, and the third Godzilla film to be completely produced by a Hollywood studio.[c] The film stars Kyle Chandler, Vera Farmiga, Millie Bobby Brown, Bradley Whitford, Sally Hawkins, Charles Dance, Thomas Middleditch, Aisha Hinds, O\'Shea Jackson Jr., David Strathairn, Ken Watanabe, and Zhang Ziyi. In the film, humans must rely on Godzilla and Mothra to defeat King Ghidorah, who has awakened Rodan and other Titans to destroy the world.', '2019-05-29', 'godzilla2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `schedule`
--

CREATE TABLE `schedule` (
  `id_schedule` int(11) NOT NULL,
  `schedule` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `schedule`
--

INSERT INTO `schedule` (`id_schedule`, `schedule`) VALUES
(1, 'noon'),
(2, 'afternoon');

-- --------------------------------------------------------

--
-- Struktur dari tabel `seat`
--

CREATE TABLE `seat` (
  `id_seat` int(11) NOT NULL,
  `numb_seat` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `seat`
--

INSERT INTO `seat` (`id_seat`, `numb_seat`) VALUES
(1, 'A1'),
(2, 'A2'),
(3, 'A3'),
(4, 'A4'),
(5, 'B1'),
(6, 'B2'),
(7, 'B3'),
(8, 'B4'),
(9, 'C1'),
(10, 'C2'),
(11, 'C3'),
(12, 'C4'),
(13, 'D1'),
(14, 'D2'),
(15, 'D3'),
(16, 'D4'),
(17, 'E1'),
(18, 'E2'),
(19, 'E3'),
(20, 'E4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction`
--

CREATE TABLE `transaction` (
  `id_transaction` int(11) NOT NULL,
  `id_movie` int(11) DEFAULT NULL,
  `id_schedule` int(11) NOT NULL,
  `numb_seat` varchar(100) NOT NULL,
  `watch_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `identity`
--
ALTER TABLE `identity`
  ADD PRIMARY KEY (`id_identity`);

--
-- Indeks untuk tabel `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id_movie`);

--
-- Indeks untuk tabel `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id_schedule`);

--
-- Indeks untuk tabel `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`id_seat`);

--
-- Indeks untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id_transaction`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `identity`
--
ALTER TABLE `identity`
  MODIFY `id_identity` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `movie`
--
ALTER TABLE `movie`
  MODIFY `id_movie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id_schedule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `seat`
--
ALTER TABLE `seat`
  MODIFY `id_seat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
