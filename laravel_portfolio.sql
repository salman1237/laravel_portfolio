-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2026 at 06:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` enum('entrepreneurship','programming','hackathon','other') NOT NULL DEFAULT 'other',
  `position` varchar(255) DEFAULT NULL,
  `organization` varchar(255) NOT NULL,
  `year` year(4) NOT NULL,
  `description` text DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`id`, `title`, `category`, `position`, `organization`, `year`, `description`, `order`, `created_at`, `updated_at`) VALUES
(1, 'National Youth Summit 2025', 'entrepreneurship', 'Winner', 'National Youth Summit', '2025', NULL, 1, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(2, 'Startup World Cup 2025', 'entrepreneurship', 'Regional Finalist', 'Startup World Cup', '2025', NULL, 2, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(3, 'JU Innovation Award 2024', 'entrepreneurship', 'Runners Up', 'Jahangirnagar University', '2024', NULL, 3, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(4, 'Student to Startup II', 'entrepreneurship', 'Finalist', 'Student to Startup', '2018', NULL, 4, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(5, 'Samsung App Contest 2018', 'entrepreneurship', 'Finalist', 'Samsung', '2018', NULL, 5, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(6, 'ACM ICPC Dhaka Regional 2016', 'programming', 'Onsite Participant', 'ACM ICPC', '2016', NULL, 6, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(7, 'NCPC CUET 2017', 'programming', 'Finalist', 'NCPC', '2017', NULL, 7, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(8, 'DIU APP Contest 2017', 'programming', 'Runners Up', 'Daffodil International University', '2017', NULL, 8, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(9, 'National Hackathon on Frontier Technologies 2020', 'hackathon', 'Runners Up', 'National Hackathon', '2020', NULL, 9, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(10, 'NDUB Hackathon 2017', 'hackathon', 'Champion', 'Notre Dame University Bangladesh', '2017', NULL, 10, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(11, 'IUT ICT FEST Hackathon 2018', 'hackathon', 'Finalist', 'Islamic University of Technology', '2018', NULL, 11, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(12, 'Bracathon III', 'hackathon', 'Runners Up', 'BRAC', '2018', NULL, 12, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(13, 'Bracathon II', 'hackathon', 'Finalist', 'BRAC', '2017', NULL, 13, '2025-12-22 04:29:39', '2025-12-22 04:29:39');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certifications`
--

CREATE TABLE `certifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `credential_url` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certifications`
--

INSERT INTO `certifications` (`id`, `title`, `institution`, `location`, `start_date`, `end_date`, `description`, `credential_url`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Founder\'s Sprint', 'INSEAD AI Venture Lab', 'Singapore', '2025-09-01', '2025-12-31', 'One of the Selected 200 top Global AI Startup Founders to join the program to build AI Startup and grow globally. It\'s a 8 week program hosted by INSEAD and Harvard Business School and supported by global top Mentors and Venture Capitalists from all over the world.', NULL, 1, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(2, 'Entrepreneurship Development Program', 'SICIP, Bangladesh Bank', 'Dhaka, Bangladesh', '2025-11-01', '2025-12-31', 'One of the selected top 25 business founder in National level for each Batch on Entrepreneurship Development Program (EDP) under the Skills for Industry Competitiveness and Innovation Program (SICIP)-a project funded by the Asian Development Bank (ADB) and implemented by the Bangladesh Bank, Finance Division, Ministry of Finance', NULL, 2, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(3, 'Entrepreneurship Value System', 'Innovation Design & Entrepreneur Academy (iDEA)', 'Dhaka, Bangladesh', '2024-01-01', '2024-04-30', 'One of the selected top 20 aspirant startup founder to get training on Entrepreneurship Value System by Innovation Design and Entrepreneurship Academy (iDEA) of ICT Division, Government Republic of Bangladesh.', NULL, 3, '2025-12-22 04:29:39', '2025-12-22 04:29:39');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `degree` varchar(255) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `field_of_study` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `cgpa` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `degree`, `institution`, `field_of_study`, `start_date`, `end_date`, `cgpa`, `description`, `order`, `created_at`, `updated_at`) VALUES
(1, 'BSc', 'Bangladesh University of Professionals', 'Information and Communication Engineering', '2015-01-01', '2018-12-31', NULL, 'Dhaka, Bangladesh', 1, '2025-12-22 04:29:39', '2025-12-22 04:29:39');

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `organization` varchar(255) NOT NULL,
  `type` enum('work','leadership','volunteer') NOT NULL DEFAULT 'work',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `title`, `organization`, `type`, `start_date`, `end_date`, `description`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Chief Executive Officer', 'Skoder Technologies', 'work', '2019-02-01', NULL, 'Dhaka, Bangladesh. Founded from the day zero and growing together. Skoder is the Tech partner for business and startup. At Skoder, we have been working with more than 50 global, local and Inhouse Enterprise Software projects.', 1, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(2, 'Machine Learning Trainer', 'EDGE by ICT Division, Bangladesh', 'work', '2024-09-01', '2024-12-31', 'Jahangirnagar University. Machine Learning, Data Analytics, ML Algorithms, Python', 2, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(3, 'Visiting Lecturer', 'Ahsanullah University of Science and Technology', 'work', '2023-08-01', '2024-02-28', 'Dhaka, Bangladesh. Conducted App Development with Flutter Course', 3, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(4, 'Trainer - Oracle DBMS', 'OCEI - Office of the Chief Electricity Inspector', 'work', '2022-07-01', '2022-12-31', 'Bangladesh Government', 4, '2025-12-22 04:29:39', '2025-12-22 04:29:39');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `proficiency` enum('basic','intermediate','advanced','native') NOT NULL DEFAULT 'intermediate',
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `proficiency`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Bengali/Bangla', 'native', 1, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(2, 'English', 'advanced', 2, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(3, 'Hindi', 'intermediate', 3, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(4, 'Japanese', 'basic', 4, '2025-12-22 04:29:39', '2025-12-22 04:29:39');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_name` varchar(255) DEFAULT NULL,
  `sender_email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `replied_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_name`, `sender_email`, `message`, `is_read`, `replied_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 'test@example.com', 'This is a test message from the contact form.', 1, NULL, '2026-01-01 10:03:01', '2026-01-01 10:04:30'),
(2, NULL, 'salman.zubair385@gmai.com', 'Test sms', 1, '2026-01-01 10:25:02', '2026-01-01 10:23:56', '2026-01-01 10:25:02'),
(3, NULL, 'salman.zubair385@gmail.com', 'Test test', 1, '2026-01-01 10:27:46', '2026-01-01 10:27:13', '2026-01-01 10:27:46'),
(4, NULL, 'salmanaahmed382.jubair@gmail.com', 'Hello', 1, '2026-01-01 11:38:44', '2026-01-01 11:38:21', '2026-01-01 11:38:44'),
(5, NULL, 'salmanahmed382.jubair@gmail.com', 'Helloooo', 1, '2026-01-01 11:39:55', '2026-01-01 11:39:29', '2026-01-01 11:39:55'),
(6, NULL, 'salmanahmed382.jubair@gmail.com', 'Hiiii', 1, '2026-01-01 11:44:04', '2026-01-01 11:43:40', '2026-01-01 11:44:04');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_01_01_000001_create_personal_infos_table', 1),
(5, '2024_01_01_000002_create_skills_table', 1),
(6, '2024_01_01_000003_create_programming_languages_table', 1),
(7, '2024_01_01_000004_create_projects_table', 1),
(8, '2024_01_01_000005_create_team_competitions_table', 1),
(9, '2024_01_01_000006_create_individual_competitions_table', 1),
(10, '2024_01_01_000007_create_online_judges_table', 1),
(11, '2024_01_01_000008_create_education_table', 1),
(12, '2024_01_01_000009_create_experiences_table', 1),
(13, '2025_12_22_100819_create_languages_table', 2),
(14, '2025_12_22_100821_create_certifications_table', 2),
(15, '2025_12_22_100822_create_achievements_table', 2),
(16, '2025_12_22_100824_create_research_table', 2),
(17, '2025_12_22_100826_add_new_fields_to_personal_infos_table', 2),
(18, '2025_12_22_111354_drop_competitive_programming_tables', 3),
(19, '2026_01_01_140133_add_icon_to_skills_table', 4),
(20, '2026_01_01_144635_create_partnerships_table', 5),
(21, '2026_01_01_152807_create_social_links_table', 6),
(22, '2026_01_01_154948_create_messages_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `partnerships`
--

CREATE TABLE `partnerships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partnerships`
--

INSERT INTO `partnerships` (`id`, `name`, `logo`, `url`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Jahangirnagar University', 'partnerships/logos/MYova2NziuJFbwxFx9XT7AwvrvuXOZpacTnXTRT0.png', NULL, 1, 1, '2026-01-01 08:59:10', '2026-01-01 08:59:10'),
(2, 'Campus 365', 'partnerships/logos/5FlnawDTM9ExTZY2St14H81B0Djx8QxSiB6tZ980.png', 'https://campus365.pro/', 2, 1, '2026-01-01 09:22:45', '2026-01-01 09:22:45');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('admin@portfolio.com', '$2y$12$tezzmzNZf0a.028qDdNlSOK92sr0XFBks7sv3O6CkqLKs2GXKdO/W', '2025-12-22 04:44:14');

-- --------------------------------------------------------

--
-- Table structure for table `personal_infos`
--

CREATE TABLE `personal_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `github` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `codeforces` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_infos`
--

INSERT INTO `personal_infos` (`id`, `name`, `tagline`, `email`, `phone`, `address`, `linkedin`, `github`, `website`, `codeforces`, `photo`, `bio`, `date_of_birth`, `created_at`, `updated_at`) VALUES
(1, 'K. M. ABIR MAHMUD', 'Entrepreneur', 'abir.skoder@gmail.com', '01750726094', '246/3A, Apan Angina Monihar, Bonolota Housing Society, Agargaon, Dhaka-1207', 'https://www.linkedin.com/in/k-m-abir-mahmud/', 'https://github.com/skabirgithub', 'ceo.skoder.co', NULL, 'profile/O45VhHqgNxfBiczp9scHDXAVvVOKvRrNofadMAip.jpg', 'Leading Campus365 and Skoder, our mission is to transform education through technology, harnessing my background in ICT and a passion for innovation. Our team has successfully empowered universities and startups, fostering a digital space that personalizes education and amplifies process intelligence. At Skoder, the focus is on nurturing tech innovations that drive social impact in Bangladesh, leveraging engineering design and process skills for business development.', '1996-09-08', '2025-12-22 04:29:39', '2025-12-22 05:05:59');

-- --------------------------------------------------------

--
-- Table structure for table `programming_languages`
--

CREATE TABLE `programming_languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `proficiency_level` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `technologies` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`technologies`)),
  `github_url` varchar(255) DEFAULT NULL,
  `demo_url` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `technologies`, `github_url`, `demo_url`, `image`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Campus365', 'Campus365 empowers Universities with Process Intelligence, intelligent assistant for students and API sales channel for Businesses', '\"AI, Process Intelligence, API Integration\"', NULL, NULL, NULL, 1, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(2, 'Care+', 'A complete healthcare solution for doctors, patients and hospitals. Care+ provides Telemedicine, ePrescriptions, Appointments Management, Bills and Payments and so on.', '\"Healthcare, Telemedicine, Mobile App\"', NULL, NULL, NULL, 2, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(3, 'Kotha', 'First Bengali AI powered Voice Assistant smartphone app which consists of features to control smartphone with Bengali voice Command.', '\"AI, Voice Recognition, NLP, Bengali Language Processing\"', NULL, NULL, NULL, 3, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(4, 'ConFest', 'A Bangladeshi Online Competition Platform where students can join and participate in various ongoing cocurricular contests to earn prizes.', '\"Web Platform, Competition Management\"', NULL, NULL, NULL, 4, '2025-12-22 04:29:39', '2025-12-22 04:29:39');

-- --------------------------------------------------------

--
-- Table structure for table `research`
--

CREATE TABLE `research` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `type` enum('journal','conference','book_chapter','patent','other') NOT NULL DEFAULT 'other',
  `authors` text NOT NULL,
  `publication` varchar(255) DEFAULT NULL,
  `published_date` date DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `research`
--

INSERT INTO `research` (`id`, `title`, `type`, `authors`, `publication`, `published_date`, `url`, `description`, `order`, `created_at`, `updated_at`) VALUES
(1, 'LEMate: An Early Prototype of an Artificial Intelligence-Powered Learner Engagement Detection System', 'book_chapter', 'K. M. Abir Mahmud, et al.', 'Springer Book Chapter', NULL, 'https://link.springer.com/chapter/10.1007/978-981-96-0185-1_35', 'Eye Tracking, Facial Expression, Heart Rate (rppg), Mouse and Keyboard Activities and with several multimodal interaction data we have prepared a system with DiversAsia (Erusmas+ project), Jahangirnagar University,BD and Nottingham Trent University,UK', 1, '2025-12-22 04:29:39', '2025-12-22 05:00:32'),
(2, 'CampusMate - First Bangladeshi AI Tutor for personalized Education', 'other', 'K. M. Abir Mahmud, et al.', NULL, NULL, NULL, 'AI assistant for Students to guide students towards a better career and personalized education. We have developed our own LLM with foundation model Llama3, Streamlit and Langchain', 2, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(3, 'iWorksafe: Towards Healthy Workplaces During COVID-19 With an Intelligent Phealth App for Industrial Settings', 'journal', 'K. M. Abir Mahmud, et al.', 'IEEE Access', NULL, 'https://ieeexplore.ieee.org/document/9317697?source=authoralert', 'Computer Vision, AI-ML', 3, '2025-12-22 04:29:39', '2025-12-22 05:04:49'),
(4, 'Visual Speech Recognition: A Deep Learning and coordinate driven approach to recognize speech using lip movement through Artificial Intelligence over Image Processing', 'other', 'K. M. Abir Mahmud, et al.', NULL, NULL, NULL, 'Computer Vision, AI-ML', 4, '2025-12-22 04:29:39', '2025-12-22 04:29:39');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('7sIcdycGCZl8G4YQxiwQcGGTpG7KXz9iviT8egtl', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRXRoRXpNdjdNT0xSTTNPc2JHUmFjQ2duZWtZczAwdDZYa0dDUnZOMSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9yZWdpc3RlciI7czo1OiJyb3V0ZSI7czo4OiJyZWdpc3RlciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1767289782),
('r1yx51OXQzekX0KoFtQ1hDX95n37prdaZq5AJFQ2', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidGlPaEFicTBFQ1lXRHpPbDZldk50WEVuNldJZEFxWDMwOERnOWxzciI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9tZXNzYWdlcy82IjtzOjU6InJvdXRlIjtzOjE5OiJhZG1pbi5tZXNzYWdlcy5zaG93Ijt9czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1767289445),
('z8snM4vZbeqFrETOLtxyITe7Z4P2MlhdqK3zNXZx', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaWhiSElyZWpmRVp5T1IxREdxU2hUVmpSMXVwTU05WHZDRlp4ZmZEUyI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjk6Il9wcmV2aW91cyI7YToyOntzOjM6InVybCI7czozNzoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2FkbWluL2Rhc2hib2FyZCI7czo1OiJyb3V0ZSI7czoxNToiYWRtaW4uZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1767289702);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `proficiency_level` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `category`, `name`, `icon`, `proficiency_level`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Languages and Framework', 'Python', NULL, NULL, 1, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(2, 'Languages and Framework', 'Flutter', NULL, NULL, 2, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(3, 'Languages and Framework', 'Dart', NULL, NULL, 3, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(4, 'Languages and Framework', 'Laravel', NULL, NULL, 4, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(5, 'Languages and Framework', 'PHP', NULL, NULL, 5, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(6, 'Languages and Framework', 'Java', NULL, NULL, 6, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(7, 'Languages and Framework', 'MySQL', NULL, NULL, 7, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(8, 'Languages and Framework', 'C++', NULL, NULL, 8, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(9, 'Languages and Framework', 'C#', NULL, NULL, 9, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(10, 'Languages and Framework', 'JavaScript', NULL, NULL, 10, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(11, 'Software Development', 'Flutter Development', NULL, NULL, 11, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(12, 'Software Development', 'Android Development', NULL, NULL, 12, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(13, 'Software Development', 'Web Development', NULL, NULL, 13, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(14, 'Software Development', 'Embedded System', NULL, NULL, 14, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(15, 'Software Development', 'Machine Learning', NULL, NULL, 15, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(16, 'Software Development', 'AI Systems', NULL, NULL, 16, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(17, 'Software Development', 'Software Design', NULL, NULL, 17, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(18, 'Software Development', 'Database Design', NULL, NULL, 18, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(19, 'Project Management', 'Leadership', NULL, NULL, 19, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(20, 'Project Management', 'Communication', NULL, NULL, 20, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(21, 'Project Management', 'Collaboration', NULL, NULL, 21, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(22, 'Project Management', 'System Architecture', NULL, NULL, 22, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(23, 'Project Management', 'SDLC', NULL, NULL, 23, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(24, 'AI & ML', 'LLM', NULL, NULL, 24, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(25, 'AI & ML', 'NLP', NULL, NULL, 25, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(26, 'AI & ML', 'ML Algorithms', NULL, NULL, 26, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(27, 'AI & ML', 'Model Designing', NULL, NULL, 27, '2025-12-22 04:29:39', '2025-12-22 04:29:39'),
(28, 'AI & ML', 'AI Product Design', NULL, NULL, 28, '2025-12-22 04:29:39', '2025-12-22 04:29:39');

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `display_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `name`, `icon`, `url`, `display_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Linkdin', 'social_icons/RjJV7ZDMZ8Egx0Tguar122UMI66009YmIj5d3e34.png', 'https://www.linkedin.com/in/k-m-abir-mahmud/', 1, 1, '2026-01-01 09:38:02', '2026-01-01 09:38:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@portfolio.com', NULL, '$2y$12$Sj2KBhrTPM9m3wJI11JOUesG0CsRnMESUMhl32cpGX8CdFjJtqH0m', '5EZJybp8erf06OZVnLFSz50KRouLFqNL7qwX82QL6Jfha9pvyArZkv92vgSl', '2025-11-29 10:54:04', '2025-11-29 10:54:04'),
(2, 'Admin', 'admin@example.com', NULL, '$2y$12$/H5VvmTap27m2OsneCIsauP8icL6UIcj44MafOVvOjWzLKbFHSkMi', NULL, '2025-12-22 04:55:58', '2025-12-22 04:55:58'),
(3, 'Admin User', 'admin@test.com', NULL, '$2y$12$auIk2kJto3yGFHM1GeaRT.zcsLOP4FGXaA2BJ24d4LsHOCLri/gVa', NULL, '2026-01-01 08:06:08', '2026-01-01 08:06:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `certifications`
--
ALTER TABLE `certifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_is_read_index` (`is_read`),
  ADD KEY `messages_created_at_index` (`created_at`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partnerships`
--
ALTER TABLE `partnerships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_infos`
--
ALTER TABLE `personal_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programming_languages`
--
ALTER TABLE `programming_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `research`
--
ALTER TABLE `research`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `social_links_display_order_index` (`display_order`),
  ADD KEY `social_links_is_active_index` (`is_active`);

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
-- AUTO_INCREMENT for table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `certifications`
--
ALTER TABLE `certifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `partnerships`
--
ALTER TABLE `partnerships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_infos`
--
ALTER TABLE `personal_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `programming_languages`
--
ALTER TABLE `programming_languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `research`
--
ALTER TABLE `research`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
