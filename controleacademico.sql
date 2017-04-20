-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 12, 2017 at 11:53 AM
-- Server version: 5.5.54-0+deb8u1
-- PHP Version: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `controleacademico`
--

-- --------------------------------------------------------

--
-- Table structure for table `disciplina`
--

CREATE TABLE IF NOT EXISTS `disciplina` (
`id_disc` int(10) unsigned NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carga_horaria` int(11) NOT NULL,
  `limite_freq` int(11) NOT NULL,
  `faltas` int(11) NOT NULL DEFAULT '0',
  `situacao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'favoravel',
  `id_aluno` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `disciplina`
--

INSERT INTO `disciplina` (`id_disc`, `codigo`, `nome`, `carga_horaria`, `limite_freq`, `faltas`, `situacao`, `id_aluno`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'MATA64', 'Banco de Dados', 68, 17, 0, 'favoravel', 5, NULL, '2017-04-11 18:24:08', '2017-04-11 18:24:08'),
(11, 'MATA53', 'Inteligência Artificial', 68, 17, 0, 'favoravel', 5, NULL, '2017-04-12 02:56:54', '2017-04-12 02:56:54'),
(15, 'MATA640', 'Compiladores', 68, 17, 0, 'favoravel', 26, NULL, '2017-04-12 06:28:23', '2017-04-12 06:28:23'),
(16, 'MATA589', 'TESTE', 68, 17, 0, 'favoravel', 5, NULL, '2017-04-12 16:55:38', '2017-04-12 16:55:38'),
(17, 'MATA53', 'Grafos', 68, 17, 0, 'favoravel', 26, NULL, '2017-04-12 16:57:25', '2017-04-12 16:57:25'),
(20, 'MATA61', 'Banco de Dados', 68, 17, 0, 'favoravel', 26, NULL, '2017-04-12 17:05:30', '2017-04-12 17:05:30');

-- --------------------------------------------------------

--
-- Table structure for table `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
`id_evento` int(10) unsigned NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `eventos`
--

INSERT INTO `eventos` (`id_evento`, `nome`, `data`, `id_user`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Campus Party', '09/08/2017', 5, NULL, '2017-04-12 03:31:25', '2017-04-12 03:31:25'),
(3, 'Prova de Banco', '02/05/2012', 26, NULL, '2017-04-12 17:42:58', '2017-04-12 17:42:58'),
(4, 'Campus Party', '09/08/2017', 26, NULL, '2017-04-12 17:43:32', '2017-04-12 17:43:32');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
`id` int(10) unsigned NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('usuario','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Tiago Dória', 'tiagodoriap@gmail.com', '$2y$10$U8E4P.CmjuoxYlZ/JZbwgedRX07.fq27JBmhAkp85txIux3BNR8ru', 'admin', '0UX4ieGOZ9gnalpJqREJOM2Kodhh8jUmkgg8IKSoHqhXdYOeVI46SSSdpyJp', '2017-04-11 18:23:30', '2017-04-11 18:23:30'),
(26, 'Florencia', 'florencia@mail.com', '$2y$10$jGH4SiFLNQDNGiJyQDb/yeKPbe5x9uGJlvD/lgqeKav5DWXIVDxS6', 'usuario', '5oefnmuafMTBcdWBb2NF45eqtnoIWmJMYkiKrlOF8uJ4oiaiNegwHIaUbx7T', '2017-04-12 06:10:44', '2017-04-12 06:10:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disciplina`
--
ALTER TABLE `disciplina`
 ADD PRIMARY KEY (`id_disc`);

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
 ADD PRIMARY KEY (`id_evento`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`(191)), ADD KEY `password_resets_token_index` (`token`(191));

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
MODIFY `id_disc` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
MODIFY `id_evento` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
