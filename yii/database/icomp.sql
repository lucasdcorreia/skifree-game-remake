-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:8889
-- Generation Time: Jul 04, 2018 at 09:29 PM
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
(7, 'Administração', 'FA01', 'Curso de administração da UFAM.'),
(8, 'Matemática', 'IE07', 'Curso de licenciatura em matemática.');

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
(13, 13, 2381, '2018-07-04 15:24:31');

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
(8, 'CAMILLA FELIX BARBOSA DE OLIVEIRA', 'RWvd0UwPOaDapUva42Tb0S_xWr6X1VRv', '$2y$13$7kzfsfylRGaLZlItI7gVAeeZVY1GlwlMFQLVpiW.XgVQsbb/q0vGG', NULL, 'camila@email.com', 10, 1530731859, 1530731859, 8),
(9, 'THIAGO OLIVEIRA NETO', 'zwMgDnnTNKiacyxJKtNRpkVqlgbUHY7Y', '$2y$13$rEYtAU/XD6..V2DfWmjjSudXma5yFdyKmGwL5V1b6nRq9cL22CC5q', NULL, 'thiago@email.com', 10, 1530731985, 1530731985, 4),
(10, 'JEFFESON WILLIAM PEREIRA', '-AKDO9r2jo6Nzyw2EbHJ1maDHwDxOGTD', '$2y$13$DG4Yyk6J4Qbr29mQTAeyZuoSjQKjPmdmlIOqtVOu.SOHZFMo6nJje', NULL, 'jef@email.com', 10, 1530732050, 1530732050, 5),
(11, 'GABRIEL MORAES DE QUEIROZ', 'k4aWXNGro4V-nBUkjTjjU4KmQgG1ph3n', '$2y$13$JCQwER4FKk1xG2zWGLeo9OtUWTYVkEY1ZzFGzGkRmrdvsU.wqmGSS', NULL, 'gabriel@email.com', 10, 1530732101, 1530732101, 4),
(12, 'LUANA BITTENCOURT SARAIVA', 'wKJbS9YLwiwAtU-wObtQT9Jh00DbImYw', '$2y$13$8Nw7DJNY0y/B4W/qse02O.H0avjwWYoQas/LxWzCINrIkyFvDwpBK', NULL, 'luana@email.com', 10, 1530732174, 1530732174, 3),
(13, 'JOSE DENEY ALVES DE ARAUJO', 'vO8C4cwbhof2GOrotLlgWjhno6x3HJJA', '$2y$13$3u1SgvRWgbPruNzrVrNGyOt83uUAdVNZ/q9GPB5rB9osFv/Ix/ywS', NULL, 'jose@email.com', 10, 1530732241, 1530732241, 7);

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
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `jogada`
--
ALTER TABLE `jogada`
  MODIFY `id_jogada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
