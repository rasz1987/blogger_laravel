-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07-Dez-2018 às 18:35
-- Versão do servidor: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogger`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `answer` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `answer`
--

INSERT INTO `answer` (`id`, `answer`) VALUES
(3, '790f24afb34249406c703aa082af9c585edacc46'),
(4, '1eb879fcc59be9d8a29f85b85e8787c04363f600');

-- --------------------------------------------------------

--
-- Estrutura da tabela `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `content`, `state_id`, `user_id`, `created_at`, `updated_at`) VALUES
(65, 'Teste', '<p>Teste 2</p>', 2, 1, '2018-12-04 16:46:20', '2018-12-04 16:46:20'),
(67, 'Teste  3', '<p><br />\nTeste 3</p>', 2, 1, '2018-12-04 16:59:05', '2018-12-04 16:59:05'),
(85, 'teste rodolfo', '<p><br />\r\nteste</p>', 2, 1, '2018-12-06 17:22:30', '2018-12-06 17:23:04'),
(106, 'rrr', '<p><br />\nteste</p>', 1, 1, '2018-12-07 09:55:40', '2018-12-07 09:55:40'),
(108, 'eee', '<p><br />\nteste</p>', 1, 1, '2018-12-07 09:55:52', '2018-12-07 09:55:52'),
(109, 'ee', '<p><br />\nteste</p>', 1, 1, '2018-12-07 09:55:57', '2018-12-07 09:55:57'),
(110, 'eee', '<p><br />\nteste</p>', 1, 1, '2018-12-07 09:56:02', '2018-12-07 09:56:02'),
(111, 'Teste 2', '<p>eee</p>', 1, 1, '2018-12-07 09:57:29', '2018-12-07 09:57:29'),
(112, 'eeee', '<p>eee</p>', 1, 1, '2018-12-07 09:57:36', '2018-12-07 09:57:36'),
(113, 'eee', '<p>eee</p>', 1, 1, '2018-12-07 09:57:42', '2018-12-07 09:57:42'),
(114, 'eee', '<p>eee</p>', 1, 1, '2018-12-07 09:57:48', '2018-12-07 09:57:48'),
(115, 'sdsd', '<p>sdsd</p>', 1, 1, '2018-12-07 09:59:46', '2018-12-07 09:59:46'),
(116, 'sdsd', '<p>sdsd</p>', 1, 1, '2018-12-07 09:59:53', '2018-12-07 09:59:53'),
(117, 'ssdd', '<p>sdsd</p>', 1, 1, '2018-12-07 10:00:00', '2018-12-07 10:00:00'),
(118, 'sdsd', '<p>sdsd</p>', 1, 1, '2018-12-07 10:00:05', '2018-12-07 10:00:05'),
(119, 'sdsd', '<p>sdsd</p>', 1, 1, '2018-12-07 10:00:14', '2018-12-07 10:00:14'),
(120, 'fgfg', '<p>fgfg</p>', 1, 1, '2018-12-07 10:01:27', '2018-12-07 10:01:27'),
(121, 'fgffg', '<p>fgfg</p>', 1, 1, '2018-12-07 10:01:33', '2018-12-07 10:01:33'),
(122, 'vvb', '<p>fgfg</p>', 1, 1, '2018-12-07 10:01:41', '2018-12-07 10:01:41'),
(123, 'vbvbvb', '<p>fgfg</p>', 1, 1, '2018-12-07 10:01:49', '2018-12-07 10:01:49'),
(124, 'vbvb', '<p>fgfg</p>', 1, 1, '2018-12-07 10:01:55', '2018-12-07 10:01:55'),
(125, 'vbvb', '<p>fgfg</p>', 1, 1, '2018-12-07 10:02:01', '2018-12-07 10:02:01'),
(126, 'vbvb', '<p>fgfg</p>', 1, 1, '2018-12-07 10:02:09', '2018-12-07 10:02:09'),
(127, 'teéste', '<p>testedfggtrhtrhrhtr</p>', 2, 1, '2018-12-07 10:23:50', '2018-12-07 10:24:35');

-- --------------------------------------------------------

--
-- Estrutura da tabela `levels`
--

CREATE TABLE `levels` (
  `id` int(11) NOT NULL,
  `level` varchar(150) DEFAULT NULL,
  `number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `levels`
--

INSERT INTO `levels` (`id`, `level`, `number`) VALUES
(1, 'admin', 1),
(2, 'user', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_11_29_090954_create_blogs_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `questions`
--

INSERT INTO `questions` (`id`, `question`) VALUES
(1, 'Name of your father?'),
(2, 'Name of your mother?');

-- --------------------------------------------------------

--
-- Estrutura da tabela `recovery`
--

CREATE TABLE `recovery` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `firstQ_id` int(11) DEFAULT NULL,
  `firstA_id` int(11) DEFAULT NULL,
  `secondQ_id` int(11) DEFAULT NULL,
  `secondA_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `recovery`
--

INSERT INTO `recovery` (`id`, `user_id`, `firstQ_id`, `firstA_id`, `secondQ_id`, `secondA_id`) VALUES
(2, 3, 1, 3, 2, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `state`
--

INSERT INTO `state` (`id`, `description`) VALUES
(1, 'Published'),
(2, 'Unpublished');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_id` int(11) NOT NULL,
  `b_delete` int(11) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `user`, `email`, `password`, `level_id`, `b_delete`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rodolfo', 'rasz1987', 'rodolfosifontes1@gmail.com', '$2y$10$DV3983hSnPJMXZkFj5hvXegOQr4LF7./hDp.HjB6Xasl8K1MwM5X.', 1, 0, NULL, 'TVaBG77YS8Bptg7JsPCnEhKe3BBk7rLSJK1bq0YFd3mNgoyiMrBVw8k0wlJ0', '2018-11-29 16:04:31', '2018-11-29 16:04:31'),
(2, 'Jhon', 'jhondoe', 'jhondoe@gmail.com', '$2y$10$uOFaOGHq6cGGTQ6DW4wQMe2P.Kj8sS3J7pCrbs4uNucSbP3gtB9LS', 1, 0, NULL, 'kUPxKyOr30cRxn8wQxqNOMh1HKmZJM90aJlOLldmYQqxOVccLXcT66RBmDNR', '2018-11-30 09:12:20', '2018-11-30 09:12:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recovery`
--
ALTER TABLE `recovery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `firstQ_id` (`firstQ_id`),
  ADD KEY `secondQ_id` (`secondQ_id`),
  ADD KEY `firstA_id` (`firstA_id`),
  ADD KEY `secondA_id` (`secondA_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `recovery`
--
ALTER TABLE `recovery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `recovery`
--
ALTER TABLE `recovery`
  ADD CONSTRAINT `recovery_ibfk_1` FOREIGN KEY (`firstQ_id`) REFERENCES `questions` (`id`),
  ADD CONSTRAINT `recovery_ibfk_2` FOREIGN KEY (`secondQ_id`) REFERENCES `questions` (`id`),
  ADD CONSTRAINT `recovery_ibfk_3` FOREIGN KEY (`firstA_id`) REFERENCES `answer` (`id`),
  ADD CONSTRAINT `recovery_ibfk_4` FOREIGN KEY (`secondA_id`) REFERENCES `answer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
