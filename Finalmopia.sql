-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2023 at 10:00 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `filmopia`
--

-- --------------------------------------------------------

--
-- Table structure for table `abonnement`
--

CREATE TABLE `abonnement` (
  `id_ab` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_expiration` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `pay_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `abonnement`
--

INSERT INTO `abonnement` (`id_ab`, `type`, `date_debut`, `date_expiration`, `id_user`, `pay_id`) VALUES
(22, 5, '2023-05-07', '2023-06-30', 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id_cat` int(11) NOT NULL,
  `nom_cat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id_cat`, `nom_cat`) VALUES
(4, 'Drama'),
(19, 'SC-Fiction'),
(20, 'Comedy'),
(23, 'Aventure'),
(24, 'Crime'),
(25, 'Action');

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id_film` int(11) NOT NULL,
  `titre` varchar(20) NOT NULL,
  `realisateur` varchar(20) NOT NULL,
  `duree` int(11) NOT NULL,
  `synopsis` varchar(2000) NOT NULL,
  `annee` varchar(20) NOT NULL,
  `id_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id_film`, `titre`, `realisateur`, `duree`, `synopsis`, `annee`, `id_cat`) VALUES
(1, 'Red Notice', 'Rawson Marshall Thur', 117, 'It exposes the corruption and human rights abuses.', '2021', 24),
(2, 'Spider-Man', 'Sam Raimi', 121, 'a superhero film that follows the story of Peter Parker.', '2022', 23),
(23, 'Matrix', 'Wachowski', 136, 'l\'histoire d\'un programmeur informatique qui mène une double vie.', '1999', 19),
(29, 'Shang Chi', 'Destin Daniel Cretto', 98, 'l\'histoire d\'un jeune homme qui a renoncé à son passé criminel.', '2021', 25),
(30, 'Casino Royale', 'Martin Campbell', 114, 'l\'histoire de l\'agent07 qui est envoyé en mission.', '2006', 25),
(31, 'The Dark Knight', 'Christopher Nolan', 152, 'Batman doit affronter le Joker tout en essayant de sauver la ville.', '2008', 4),
(32, 'La La Land', 'Damien Chazelle', 128, 'l\'histoire de Mia, une actrice en herbe, un pianiste de jazz passionné.', '2016', 20),
(33, 'Interstellar', 'Christopher Nolan', 169, 'l\'histoire d\'un groupe d\'explorateurs qui doivent quitter la Terre.', '2014', 4),
(34, 'Eternals', 'Chloe Zhao', 157, 'l\'histoire d\'un groupe d\'êtres immortels et surpuissants.', '2021', 23),
(35, 'Dune', 'Denis Villeneuve', 155, 'l\'histoire d\'un jeune noble sa famille est géré la planète désertique.', '2021', 23);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id_media` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  `img` varchar(150) NOT NULL,
  `trailer` varchar(150) NOT NULL,
  `video` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projections`
--

CREATE TABLE `projections` (
  `id_proj` int(11) NOT NULL,
  `h_proj` time NOT NULL,
  `id_film` int(11) NOT NULL,
  `id_salle` int(11) NOT NULL,
  `date_proj` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `projections`
--

INSERT INTO `projections` (`id_proj`, `h_proj`, `id_film`, `id_salle`, `date_proj`) VALUES
(30, '10:00:00', 1, 23, '2023-05-10'),
(35, '14:40:00', 2, 26, '2023-05-08'),
(36, '11:11:00', 30, 23, '2023-05-11'),
(37, '11:11:00', 31, 26, '2023-05-11'),
(38, '11:11:00', 31, 26, '2023-05-12'),
(39, '11:11:00', 33, 23, '2023-05-14'),
(40, '20:11:00', 33, 26, '2023-05-08'),
(41, '21:11:00', 33, 26, '2023-05-08'),
(42, '18:11:00', 33, 27, '2023-05-08');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id_res` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `siege` int(11) NOT NULL,
  `etat` varchar(50) NOT NULL,
  `id_proj` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

-- --------------------------------------------------------

--
-- Table structure for table `salles`
--

CREATE TABLE `salles` (
  `id_salle` int(11) NOT NULL,
  `nom_salle` varchar(15) NOT NULL,
  `nb_places` int(11) NOT NULL,
  `H_ouv` time NOT NULL,
  `H_ferm` time NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salles`
--

INSERT INTO `salles` (`id_salle`, `nom_salle`, `nb_places`, `H_ouv`, `H_ferm`, `latitude`, `longitude`) VALUES
(23, 'Le Parnasse', 60, '10:00:00', '22:00:00', 36.7999, 10.18),
(26, 'Pathé', 50, '10:00:00', '12:00:00', 36.8983, 10.1245),
(27, 'RIO', 40, '08:00:00', '19:00:00', 36.7997, 10.1808),
(28, 'Hello', 2, '09:39:00', '11:39:00', 36.8317, 10.1367);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id_ticket` int(11) NOT NULL,
  `type` varchar(11) NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id_ticket`, `type`, `prix`) VALUES
(8, 'Adulte', 15),
(9, 'Enfant', 5);

-- --------------------------------------------------------

--
-- Table structure for table `typeabon`
--

CREATE TABLE `typeabon` (
  `id_typeabon` int(11) NOT NULL,
  `label_typeabon` varchar(30) NOT NULL,
  `prix_typeabon` double NOT NULL,
  `icon_typeabon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `typeabon`
--

INSERT INTO `typeabon` (`id_typeabon`, `label_typeabon`, `prix_typeabon`, `icon_typeabon`) VALUES
(4, 'Children', 5, 'human-child'),
(5, 'Adult', 15, 'human-handsdown'),
(6, 'Student', 10, 'school');

-- --------------------------------------------------------

--
-- Table structure for table `type_users`
--

CREATE TABLE `type_users` (
  `id_type` int(8) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type_users`
--

INSERT INTO `type_users` (`id_type`, `role`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(8) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `date_de_N` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `firstname`, `lastname`, `date_de_N`, `email`, `password`, `role`) VALUES
(2, 'Mohamed', 'Ben Mileddd', '2001-04-16', 'mohamedyassinebenmiled@gmail.com', 'f9496e6bac09c004d39c97f604332c5c8ffcd3e818143b8abee7c57fbe5d613d', 1),
(3, 'admin', 'admin', '2023-04-01', 'mohamedyassine.benmiled@esprit.tn', 'f9496e6bac09c004d39c97f604332c5c8ffcd3e818143b8abee7c57fbe5d613d', 2),
(4, 'Molka', 'Dhrief', '2023-05-07', 'molka.dhrief@esprit.tn', 'f9496e6bac09c004d39c97f604332c5c8ffcd3e818143b8abee7c57fbe5d613d', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abonnement`
--
ALTER TABLE `abonnement`
  ADD PRIMARY KEY (`id_ab`),
  ADD UNIQUE KEY `id_user_2` (`id_user`),
  ADD KEY `type` (`type`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`),
  ADD KEY `film_ibfk_1` (`id_cat`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id_media`),
  ADD UNIQUE KEY `id_film_2` (`id_film`),
  ADD KEY `id_film` (`id_film`);

--
-- Indexes for table `projections`
--
ALTER TABLE `projections`
  ADD PRIMARY KEY (`id_proj`),
  ADD KEY `id_film` (`id_film`,`id_salle`),
  ADD KEY `id_salle` (`id_salle`),
  ADD KEY `id_film_2` (`id_film`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_res`),
  ADD KEY `id_ticket` (`id_ticket`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `projid` (`id_proj`);

--
-- Indexes for table `salles`
--
ALTER TABLE `salles`
  ADD PRIMARY KEY (`id_salle`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id_ticket`);

--
-- Indexes for table `typeabon`
--
ALTER TABLE `typeabon`
  ADD PRIMARY KEY (`id_typeabon`);

--
-- Indexes for table `type_users`
--
ALTER TABLE `type_users`
  ADD PRIMARY KEY (`id_type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abonnement`
--
ALTER TABLE `abonnement`
  MODIFY `id_ab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id_media` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projections`
--
ALTER TABLE `projections`
  MODIFY `id_proj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_res` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `salles`
--
ALTER TABLE `salles`
  MODIFY `id_salle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `typeabon`
--
ALTER TABLE `typeabon`
  MODIFY `id_typeabon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `type_users`
--
ALTER TABLE `type_users`
  MODIFY `id_type` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `abonnement`
--
ALTER TABLE `abonnement`
  ADD CONSTRAINT `TypeConstraint` FOREIGN KEY (`type`) REFERENCES `typeabon` (`id_typeabon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `UserConstraint` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `film_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categorie` (`id_cat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
