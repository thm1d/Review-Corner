-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2021 at 08:28 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reviewcorner_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE `actors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `actor_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Kaye Price', 'fehunu@mailinator.com', 'Labore aut at dolore', '2021-11-02 13:26:16', '2021-11-02 13:26:16'),
(2, 'Flynn Rush', 'xapehogake@mailinator.com', 'Voluptas quae molest', '2021-11-02 13:26:22', '2021-11-02 13:26:22'),
(3, 'Lysandra Bush', 'sezaze@mailinator.com', 'Excepteur dignissimo', '2021-11-02 13:26:25', '2021-11-02 13:26:25'),
(4, 'Basil Berg', 'bihalofiz@mailinator.com', 'Sint commodo culpa', '2021-11-02 13:26:28', '2021-11-02 13:26:28'),
(5, 'Mikayla Velez', 'xadug@mailinator.com', 'Consequuntur obcaeca', '2021-11-02 13:26:31', '2021-11-02 13:26:31'),
(6, 'Solomon Holt', 'betesy@mailinator.com', 'Iure reprehenderit', '2021-11-02 13:26:35', '2021-11-02 13:26:35'),
(7, 'Jessamine Bowers', 'carufogiv@mailinator.com', 'Quia debitis dolor a', '2021-11-02 13:26:37', '2021-11-02 13:26:37'),
(8, 'Kyra Vinson', 'myxakydo@mailinator.com', 'Suscipit porro non f', '2021-11-02 13:26:40', '2021-11-02 13:26:40'),
(9, 'Brynn Wilson', 'gyvuxyzaj@mailinator.com', 'Doloribus et in quis', '2021-11-02 13:26:43', '2021-11-02 13:26:43'),
(10, 'Troy Francis', 'pisino@mailinator.com', 'Accusamus incidunt', '2021-11-02 13:26:46', '2021-11-02 13:26:46'),
(11, 'Kirsten Schultz', 'jygefun@mailinator.com', 'Non consequuntur eni', '2021-11-02 13:26:49', '2021-11-02 13:26:49'),
(12, 'Rosalyn Delacruz', 'becygar@mailinator.com', 'Adipisci quas except', '2021-11-02 13:26:51', '2021-11-02 13:26:51'),
(13, 'Sydney Dennis', 'cirykubef@mailinator.com', 'Voluptatum molestias', '2021-11-02 13:26:54', '2021-11-02 13:26:54'),
(14, 'Ocean Shepherd', 'jyjubaw@mailinator.com', 'Mollit sed quia maxi', '2021-11-02 13:26:57', '2021-11-02 13:26:57'),
(15, 'Honorato Cunningham', 'qubacofavu@mailinator.com', 'Est duis et sint ut', '2021-11-02 13:27:00', '2021-11-02 13:27:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `game_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `game_slug`, `title`, `created_at`, `updated_at`) VALUES
(1, 'far-cry-6', 'Far Cry 6', '2021-11-02 13:24:05', '2021-11-02 13:24:05');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2021_04_20_191513_create_payments_table', 1),
(66, '2014_10_12_000000_create_users_table', 2),
(67, '2014_10_12_100000_create_password_resets_table', 2),
(68, '2019_08_19_000000_create_failed_jobs_table', 2),
(69, '2021_04_06_112755_create_ratings_table', 2),
(70, '2021_04_06_123320_create_movies_table', 2),
(71, '2021_04_10_110533_create_tvs_table', 2),
(72, '2021_04_12_174025_create_reviews_table', 2),
(73, '2021_04_13_054529_create_games_table', 2),
(74, '2021_04_13_054711_create_actors_table', 2),
(75, '2021_04_18_142545_laratrust_setup_tables', 2),
(76, '2021_10_31_100140_create_payments_table', 2),
(77, '2021_11_01_042145_create_contacts_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `movie_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `movie_id`, `title`, `created_at`, `updated_at`) VALUES
(1, 157336, 'Interstellar', '2021-11-02 13:18:43', '2021-11-02 13:18:43'),
(2, 438631, 'Dune', '2021-11-02 13:22:32', '2021-11-02 13:22:32'),
(3, 550988, 'Free Guy', '2021-11-02 13:24:54', '2021-11-02 13:24:54');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tranx_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_number` int(11) DEFAULT NULL,
  `contact_number` int(11) DEFAULT NULL,
  `depositor_name` int(11) DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account_no` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `value`, `method`, `tranx_id`, `sender_number`, `contact_number`, `depositor_name`, `bank_name`, `bank_account_no`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Tahmid Rahman', '1000', 'bkash', 'qwerty', 1781939372, 1781939372, NULL, NULL, NULL, 0, 9, '2021-11-02 13:25:50', '2021-11-02 13:25:50');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'users-create', 'Create Users', 'Create Users', '2021-11-02 12:45:44', '2021-11-02 12:45:44'),
(2, 'users-read', 'Read Users', 'Read Users', '2021-11-02 12:45:44', '2021-11-02 12:45:44'),
(3, 'users-update', 'Update Users', 'Update Users', '2021-11-02 12:45:44', '2021-11-02 12:45:44'),
(4, 'users-delete', 'Delete Users', 'Delete Users', '2021-11-02 12:45:44', '2021-11-02 12:45:44'),
(5, 'payments-create', 'Create Payments', 'Create Payments', '2021-11-02 12:45:44', '2021-11-02 12:45:44'),
(6, 'payments-read', 'Read Payments', 'Read Payments', '2021-11-02 12:45:44', '2021-11-02 12:45:44'),
(7, 'payments-update', 'Update Payments', 'Update Payments', '2021-11-02 12:45:44', '2021-11-02 12:45:44'),
(8, 'payments-delete', 'Delete Payments', 'Delete Payments', '2021-11-02 12:45:44', '2021-11-02 12:45:44'),
(9, 'profile-read', 'Read Profile', 'Read Profile', '2021-11-02 12:45:44', '2021-11-02 12:45:44'),
(10, 'profile-update', 'Update Profile', 'Update Profile', '2021-11-02 12:45:44', '2021-11-02 12:45:44');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(9, 2),
(9, 3),
(10, 1),
(10, 2),
(10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `rateable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rateable_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `created_at`, `updated_at`, `rating`, `rateable_type`, `rateable_id`, `user_id`) VALUES
(1, '2021-11-02 13:18:46', '2021-11-02 13:18:46', 5, 'App\\Models\\Movie', 1, 9),
(2, '2021-11-02 13:22:34', '2021-11-02 13:22:34', 5, 'App\\Models\\Movie', 2, 9),
(3, '2021-11-02 13:24:07', '2021-11-02 13:24:07', 5, 'App\\Models\\Game', 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) NOT NULL,
  `item_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `item_id`, `item_type`, `review`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 157336, 'movie', 'Best Sci-fi Movie Ever!', 9, '2021-11-02 13:22:12', '2021-11-02 13:22:12'),
(2, 438631, 'movie', 'Deserunt aut rerum p', 9, '2021-11-02 13:22:51', '2021-11-02 13:22:51'),
(3, 127235, 'tv', 'Est sapiente in iur', 9, '2021-11-02 13:23:43', '2021-11-02 13:23:43'),
(4, 126290, 'game', 'Ea rerum id corporis', 9, '2021-11-02 13:24:17', '2021-11-02 13:24:17'),
(5, 550988, 'movie', 'Corporis voluptas co', 9, '2021-11-02 13:25:14', '2021-11-02 13:25:14');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'Superadmin', 'Superadmin', '2021-11-02 12:45:44', '2021-11-02 12:45:44'),
(2, 'admin', 'Admin', 'Admin', '2021-11-02 12:45:44', '2021-11-02 12:45:44'),
(3, 'user', 'User', 'User', '2021-11-02 12:45:44', '2021-11-02 12:45:44');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\Models\\User'),
(2, 2, 'App\\Models\\User'),
(2, 3, 'App\\Models\\User'),
(2, 4, 'App\\Models\\User'),
(2, 5, 'App\\Models\\User'),
(2, 7, 'App\\Models\\User'),
(2, 8, 'App\\Models\\User'),
(3, 9, 'App\\Models\\User'),
(3, 10, 'App\\Models\\User'),
(3, 11, 'App\\Models\\User'),
(3, 12, 'App\\Models\\User'),
(3, 14, 'App\\Models\\User'),
(3, 15, 'App\\Models\\User'),
(3, 16, 'App\\Models\\User'),
(3, 17, 'App\\Models\\User'),
(3, 18, 'App\\Models\\User'),
(3, 19, 'App\\Models\\User'),
(3, 20, 'App\\Models\\User'),
(3, 21, 'App\\Models\\User'),
(3, 22, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Table structure for table `tvs`
--

CREATE TABLE `tvs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tv_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tvs`
--

INSERT INTO `tvs` (`id`, `tv_id`, `title`, `created_at`, `updated_at`) VALUES
(1, 127235, 'Invasion', '2021-11-02 13:23:25', '2021-11-02 13:23:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `watchlist_movie` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`watchlist_movie`)),
  `watchlist_tv` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`watchlist_tv`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `gender`, `current_address`, `permanent_address`, `birthday`, `mobile`, `remember_token`, `watchlist_movie`, `watchlist_tv`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'super@admin.com', NULL, '$2y$10$LLBX2MwI/CynycmJpM3ZR.PA5QyGDD5RyzKeZvd7Uv3Ho0NZaVXPK', NULL, NULL, NULL, NULL, NULL, NULL, '[\"000000\"]', '[\"000000\"]', '2021-11-02 12:46:51', '2021-11-02 12:46:51'),
(2, 'Admin', 'admin@gmail.com', NULL, '$2y$10$hGossmY7dM5MWOjUFcmd7uYNd8B4KEl8Lu6Nehc/nhM44AQESisj2', NULL, NULL, NULL, NULL, NULL, NULL, '[\"000000\"]', '[\"000000\"]', '2021-11-02 12:47:55', '2021-11-02 12:47:55'),
(3, 'Elijah Mccarty', 'kepamiwuc@mailinator.com', NULL, '$2y$10$ZK19.JuPNsEqxB5FtSHzLe2wybSkd7BI9yn1nTCS7gYnMhRp5I17e', NULL, NULL, NULL, NULL, NULL, NULL, '[\"000000\"]', '[\"000000\"]', '2021-11-02 12:48:28', '2021-11-02 12:48:28'),
(4, 'Jameson Arnold', 'bocixi@mailinator.com', NULL, '$2y$10$IRQX1qSKLWxWtozC2JiKp.kO59BK.o7Y/Vjw53koHDS4qMH6IvfsC', NULL, NULL, NULL, NULL, NULL, NULL, '[\"000000\"]', '[\"000000\"]', '2021-11-02 12:48:42', '2021-11-02 12:48:42'),
(5, 'Brianna Owens', 'behyr@mailinator.com', NULL, '$2y$10$LD/WF4UvQgO.MAvy5ENA2e9zjSMQnd410HR6Z1W9XQQskJbug3Fce', NULL, NULL, NULL, NULL, NULL, NULL, '[\"000000\"]', '[\"000000\"]', '2021-11-02 12:48:52', '2021-11-02 12:48:52'),
(7, 'Inga Murphy', 'zoko@mailinator.com', NULL, '$2y$10$qpBPbbEerjo5ct7tn9AOkOdzgB0UhRdnbkg.qXT5XGj1DcJagJEzG', NULL, NULL, NULL, NULL, NULL, NULL, '[\"000000\"]', '[\"000000\"]', '2021-11-02 12:49:21', '2021-11-02 12:49:21'),
(8, 'Tahmid Rahman', 'tahmid11q@gmail.com', NULL, '$2y$10$/LWP0lXOPVOS3uRXJLdriOB2sKS91ESUBoVzhPznUwHCWi51Xkcu6', NULL, NULL, NULL, NULL, NULL, NULL, '[\"000000\"]', '[\"000000\"]', '2021-11-02 12:50:00', '2021-11-02 12:50:00'),
(9, 'Tahmid Rahman', 'tahmid@gmail.com', NULL, '$2y$10$AC9f0SqP0t2irvsQoCbVbudotAlJmdX8oZIKoDLcqk5h23h5qVGeq', 'Male', 'Pabna', 'Cumilla', '14/08/1998', '01781939372', NULL, '[\"000000\",\"157336\",\"438631\",\"550988\"]', '[\"000000\",\"127235\"]', '2021-11-02 12:50:48', '2021-11-02 13:25:00'),
(10, 'Dahlia Ramos', 'tupub@mailinator.com', NULL, '$2y$10$Nevo0EvFvaPdqFRE5XzZ9e6EzEUijWuwieZhKZ048XnkmESGz.irC', NULL, NULL, NULL, NULL, NULL, NULL, '[\"000000\"]', '[\"000000\"]', '2021-11-02 12:52:52', '2021-11-02 12:52:52'),
(11, 'Nathaniel Bradley', 'quho@mailinator.com', NULL, '$2y$10$TwRQz49tr0jpjyBUCPDk2Ok/0noRo0jN7zZB8WFhj4gAuRYegsdxi', NULL, NULL, NULL, NULL, NULL, NULL, '[\"000000\"]', '[\"000000\"]', '2021-11-02 12:53:07', '2021-11-02 12:53:07'),
(12, 'Wade Freeman', 'zyfibimet@mailinator.com', NULL, '$2y$10$AgNHeO7kSANgA9BGKttYIuWZe5YNOSx017hYR7WZskwUMSYWK0BC.', NULL, NULL, NULL, NULL, NULL, NULL, '[\"000000\"]', '[\"000000\"]', '2021-11-02 12:53:19', '2021-11-02 12:53:19'),
(14, 'Chase Guy', 'honolyse@mailinator.com', NULL, '$2y$10$2TNfNTl4tNYzOjeBbkMBxOxRJbszp1T0DpJxcwwaYADW3uYhlzbYK', NULL, NULL, NULL, NULL, NULL, NULL, '[\"000000\"]', '[\"000000\"]', '2021-11-02 12:53:45', '2021-11-02 12:53:45'),
(15, 'Eagan Lynch', 'quwymet@mailinator.com', NULL, '$2y$10$f9gUqCx6bOqq0YbDKidMvuQuO7hY.LXqh3jOH5fgvet/3cojinNNK', NULL, NULL, NULL, NULL, NULL, NULL, '[\"000000\"]', '[\"000000\"]', '2021-11-02 12:53:55', '2021-11-02 12:53:55'),
(16, 'Selma Valdez', 'xixowufi@mailinator.com', NULL, '$2y$10$yCHXaZHfunYGAaBTCHnJxeD7Sns6x5CEHFPT9aCOXya8hPV4PpAGy', NULL, NULL, NULL, NULL, NULL, NULL, '[\"000000\"]', '[\"000000\"]', '2021-11-02 12:54:09', '2021-11-02 12:54:09'),
(17, 'Germaine Church', 'tebiluz@mailinator.com', NULL, '$2y$10$aHKmeySZoLb3pL3QEKgx3.tZIDTmWUNCeXg2ZECLkGRkSQD7vpAai', 'Male', 'Assumenda in tempora', 'Voluptas aliquam ull', '5', '01234567890', NULL, '[\"000000\"]', '[\"000000\"]', '2021-11-02 12:54:20', '2021-11-02 12:54:39'),
(18, 'Kennedy Mclean', 'gurilijad@mailinator.com', NULL, '$2y$10$HYoycwXakLyzGNSxZrG/SuEwix1hZk.iCq.2Wu0ETkk5nqAeyYXHS', NULL, NULL, NULL, NULL, NULL, NULL, '[\"000000\"]', '[\"000000\"]', '2021-11-02 12:54:54', '2021-11-02 12:54:54'),
(19, 'Pearl Nielsen', 'mosyjyqojo@mailinator.com', NULL, '$2y$10$FKZQ11JrvMLBHogtYIUKJunOuNF7c.TX7IqsgHDr6TVcZWMckxBfO', NULL, NULL, NULL, NULL, NULL, NULL, '[\"000000\"]', '[\"000000\"]', '2021-11-02 12:55:06', '2021-11-02 12:55:06'),
(20, 'Petra Vargas', 'bomov@mailinator.com', NULL, '$2y$10$HPhzlnn7hyYadXjE8cqdRuMgP5VfNl2K4tK2SPoU51VKcXJvvLJfS', NULL, NULL, NULL, NULL, NULL, NULL, '[\"000000\"]', '[\"000000\"]', '2021-11-02 12:55:18', '2021-11-02 12:55:18'),
(21, 'Magee Morrow', 'dybuxi@mailinator.com', NULL, '$2y$10$SjpuZqon0Y34yTdhxSSVbOalfVLW5Dgh0vIKO.iwLABZGip6cJWLG', NULL, NULL, NULL, NULL, NULL, NULL, '[\"000000\"]', '[\"000000\"]', '2021-11-02 12:55:31', '2021-11-02 12:55:31'),
(22, 'Carson Wagner', 'majegilivu@mailinator.com', NULL, '$2y$10$e2t2aJQ49KileVRTE5CCoecZbbJGvxLEJxNVXoMEOHHxekhF3Gnt2', NULL, NULL, NULL, NULL, NULL, NULL, '[\"000000\"]', '[\"000000\"]', '2021-11-02 12:55:43', '2021-11-02 12:55:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_rateable_type_rateable_id_index` (`rateable_type`,`rateable_id`),
  ADD KEY `ratings_rateable_id_index` (`rateable_id`),
  ADD KEY `ratings_rateable_type_index` (`rateable_type`),
  ADD KEY `ratings_user_id_foreign` (`user_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `tvs`
--
ALTER TABLE `tvs`
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
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tvs`
--
ALTER TABLE `tvs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
