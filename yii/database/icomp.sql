-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:8889
-- Generation Time: Jul 04, 2018 at 09:50 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `icomp`
--

-- --------------------------------------------------------

--
-- Table structure for table `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `sigla` char(4) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `curso`
--

INSERT INTO `curso` (`id_curso`, `nome`, `sigla`, `descricao`) VALUES
(3, 'Sistemas de Informação', 'IE15', 'O curso de Bacharelado em Sistemas de Informação.'),
(4, 'Ciência da Computação', 'IE08', 'Curso de Bacharelado em Ciência da Computação.'),
(5, 'Engenharia de Software', 'IE17', 'Engenharia de Software'),
(7, 'Administração', 'FA01', 'Curso de administração da UFAM.');

-- --------------------------------------------------------

--
-- Table structure for table `jogada`
--

CREATE TABLE `jogada` (
  `id_jogada` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pontuacao` int(11) NOT NULL,
  `data_hora` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jogada`
--

INSERT INTO `jogada` (`id_jogada`, `id_user`, `pontuacao`, `data_hora`) VALUES
(1, 6, 6000, '2018-06-28 00:57:40'),
(2, 6, 6000, '2018-06-28 01:11:32'),
(3, 6, 6000, '2018-06-28 01:45:44'),
(4, 7, 820, '2018-06-28 02:50:24'),
(5, 7, 1039, '2018-06-28 02:57:24'),
(6, 7, 3418, '2018-06-28 03:04:26'),
(7, 7, 2000, '2018-06-28 03:05:02'),
(8, 7, 2000, '2018-06-28 03:11:57'),
(9, 2, 750, '2018-06-28 03:19:12'),
(10, 2, 870, '2018-07-03 14:17:11'),
(11, 7, 1314, '2018-07-04 02:13:36');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1528590913),
('m130524_201442_init', 1528591917);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `id_curso`) VALUES
(2, 'user2', 'EKoApfjzgVMNOftYaiEpC0jHRJfwQHQg', '$2y$13$YJbtCvFWLI30H.bB7pPG9e8zlFS6/m55.Bvp2kPv5vTMw2io/Px.W', NULL, 'user2@email.com', 10, 0, 0, 3),
(3, 'user3', 'ou6WmQ6nqH3TEGroYLIzfTSZGCOYhwn4', '$2y$13$imO4OuaBw2WvRxGJjVW.6.ECZVVg4/uqThFtk744mIaqkw.oJzpeC', NULL, 'user3@email.com', 10, 0, 0, 3),
(4, 'user4', 'U-292Txm4mPmE7r0feSw_QVPzgVZCdUO', '$2y$13$1T6cc0Jqe8kB8lBAfdXJQu2d.Diia/.YvZOj3c8CNEeJqf6onwDO.', NULL, 'user4@email.com', 10, 0, 0, 3),
(5, 'user6', 'T7htNForfVsoZt6A9ggM4FNCxDdkQ_Hi', '$2y$13$/Jh0WhCo/TlIKaVS5B3vq.GoC/7db5Z96B4GdrPRePmNIoopdpPQy', NULL, 'user6@email.com', 10, 0, 0, 5),
(6, 'user7', '33Tw5_vk1sUD9-XFhe9Zv26fOecaDjv9', '$2y$13$Doj0Rz8n45Kfq6xyypvC9eKMJ1Gr/qa9v.IgfK.2lJ65bHVi2Xt9u', NULL, 'user7@email.com', 10, 1530125130, 0, 5),
(7, 'user5', 'NqxuH_tD-ZEMmFkloTkoVOk70HPhEtcp', '$2y$13$qsMtbH49sCpeOjMIeCjWxOaEfCGXkx65UiQjtP7aK/y2m7i8j131O', NULL, 'user5@email.com', 10, 1530168600, 1530168600, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indexes for table `jogada`
--
ALTER TABLE `jogada`
  ADD PRIMARY KEY (`id_jogada`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `jogada`
--
ALTER TABLE `jogada`
  MODIFY `id_jogada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
