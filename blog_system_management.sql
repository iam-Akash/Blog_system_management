-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2022 at 02:24 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_system_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Nature', 'nature', 'nature-2022-04-13-62567e250d311.jpg', '2022-04-13 01:39:20', '2022-04-13 01:39:20'),
(3, 'Fashion and beauty', 'fashion-and-beauty', 'fashion-and-beauty-2022-04-13-62567e41a4bc0.jpg', '2022-04-13 01:39:48', '2022-04-13 01:39:48'),
(4, 'Exercise', 'exercise', 'exercise-2022-04-13-62567e51a95c1.jpg', '2022-04-13 01:40:02', '2022-04-13 01:40:02'),
(5, 'Food', 'food', 'food-2022-04-13-62567e59301bb.jpg', '2022-04-13 01:40:11', '2022-04-13 01:40:11'),
(6, 'Photography', 'photography', 'photography-2022-04-13-62567e66688da.jpg', '2022-04-13 01:40:26', '2022-04-13 01:40:26');

-- --------------------------------------------------------

--
-- Table structure for table `category_post`
--

CREATE TABLE `category_post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_post`
--

INSERT INTO `category_post` (`id`, `category_id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 5, 1, '2022-04-13 01:41:22', '2022-04-13 01:41:22'),
(2, 1, 2, '2022-04-13 01:41:50', '2022-04-13 01:41:50'),
(3, 2, 3, '2022-04-13 01:42:15', '2022-04-13 01:42:15'),
(4, 3, 3, '2022-04-13 01:42:15', '2022-04-13 01:42:15'),
(5, 2, 6, '2022-04-13 01:43:41', '2022-04-13 01:43:41'),
(6, 6, 6, '2022-04-13 01:43:41', '2022-04-13 01:43:41'),
(7, 4, 7, '2022-04-13 01:51:21', '2022-04-13 01:51:21'),
(8, 3, 8, '2022-04-13 01:51:58', '2022-04-13 01:51:58'),
(9, 5, 8, '2022-04-13 01:51:58', '2022-04-13 01:51:58'),
(10, 1, 9, '2022-04-13 01:53:26', '2022-04-13 01:53:26'),
(11, 3, 10, '2022-04-13 01:53:54', '2022-04-13 01:53:54'),
(12, 3, 11, '2022-04-16 04:03:13', '2022-04-16 04:03:13'),
(13, 3, 12, '2022-04-16 04:04:23', '2022-04-16 04:04:23'),
(14, 5, 12, '2022-04-16 04:04:23', '2022-04-16 04:04:23'),
(15, 4, 13, '2022-04-16 04:05:32', '2022-04-16 04:05:32'),
(16, 5, 13, '2022-04-16 04:05:32', '2022-04-16 04:05:32'),
(17, 1, 14, '2022-04-17 03:31:54', '2022-04-17 03:31:54'),
(18, 3, 14, '2022-04-17 03:31:54', '2022-04-17 03:31:54'),
(19, 4, 14, '2022-04-17 03:31:54', '2022-04-17 03:31:54'),
(20, 1, 15, '2022-04-17 03:32:56', '2022-04-17 03:32:56'),
(21, 3, 15, '2022-04-17 03:32:56', '2022-04-17 03:32:56'),
(22, 4, 15, '2022-04-17 03:32:56', '2022-04-17 03:32:56'),
(23, 5, 15, '2022-04-17 03:32:56', '2022-04-17 03:32:56'),
(24, 6, 15, '2022-04-17 03:32:56', '2022-04-17 03:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `comment`, `created_at`, `updated_at`) VALUES
(2, 3, 10, 'i am akash', '2022-04-15 09:51:59', '2022-04-15 09:51:59'),
(3, 3, 10, 'i am jalal', '2022-04-15 09:52:06', '2022-04-15 09:52:06'),
(5, 3, 10, 'i dont like this status', '2022-04-15 10:09:52', '2022-04-15 10:09:52'),
(7, 4, 9, 'very nice post', '2022-04-15 22:22:06', '2022-04-15 22:22:06'),
(8, 4, 3, 'after reading this post life is really back', '2022-04-15 22:22:22', '2022-04-15 22:22:22'),
(10, 3, 7, 'i am admin and i like your post', '2022-04-15 22:38:03', '2022-04-15 22:38:03'),
(11, 3, 6, 'this post is very nice', '2022-04-16 01:48:10', '2022-04-16 01:48:10'),
(12, 4, 13, 'nice', '2022-04-17 02:38:53', '2022-04-17 02:38:53'),
(13, 4, 13, 'nice', '2022-04-17 02:39:00', '2022-04-17 02:39:00'),
(14, 4, 13, 'very nice', '2022-04-17 02:39:09', '2022-04-17 02:39:09'),
(15, 4, 12, 'not good', '2022-04-17 02:39:21', '2022-04-17 02:39:21'),
(16, 4, 12, 'not good', '2022-04-17 02:39:22', '2022-04-17 02:39:22'),
(17, 4, 12, 'very  good news', '2022-04-17 02:39:32', '2022-04-17 02:39:32'),
(18, 4, 12, 'asdfgh', '2022-04-17 02:39:53', '2022-04-17 02:39:53'),
(19, 4, 12, 'jhgvhjvh', '2022-04-17 02:39:59', '2022-04-17 02:39:59'),
(20, 3, 10, 'eabgnfajgnag', '2022-04-18 21:56:40', '2022-04-18 21:56:40'),
(21, 4, 11, 'ahnsfljhnafaf', '2022-05-24 22:17:32', '2022-05-24 22:17:32'),
(22, 4, 11, 'arik love', '2022-05-24 22:17:41', '2022-05-24 22:17:41');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_29_053723_create_roles_table', 1),
(6, '2022_04_02_080806_create_tags_table', 1),
(7, '2022_04_03_044325_create_categories_table', 1),
(8, '2022_04_04_042329_create_posts_table', 1),
(9, '2022_04_04_042746_create_category_post_table', 1),
(10, '2022_04_04_042849_create_post_tag_table', 1),
(11, '2022_04_07_045509_create_subscribers_table', 1),
(12, '2022_04_07_091555_create_jobs_table', 1),
(13, '2022_04_09_051003_create_post_user_table', 1),
(15, '2022_04_15_150914_create_comments_table', 2);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `slug`, `image`, `body`, `view_count`, `status`, `is_approved`, `created_at`, `updated_at`) VALUES
(1, 3, 'I love food', 'i-love-food', 'i-love-food-2022-04-13-62567ea0e57a1.jpg', '<p>y. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versio</p>', 1, 1, 1, '2022-04-13 01:41:22', '2022-04-16 01:40:23'),
(2, 3, 'Natural beauty is best', 'natural-beauty-is-best', 'natural-beauty-is-best-2022-04-13-62567ebc5c439.jpg', '<p>y. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versio</p>', 2, 1, 1, '2022-04-13 01:41:50', '2022-04-17 01:23:57'),
(3, 3, 'Life is back', 'life-is-back', 'life-is-back-2022-04-13-62567ed47b0c9.jpg', '<p>y. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versio</p>', 3, 1, 1, '2022-04-13 01:42:15', '2022-04-16 01:41:54'),
(6, 3, 'love my shoe', 'love-my-shoe', 'love-my-shoe-2022-04-13-62567f2b8cf42.jpg', '<p>y. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versio</p>', 3, 1, 1, '2022-04-13 01:43:41', '2022-04-16 01:41:57'),
(7, 3, 'Work is necesarry', 'work-is-necesarry', 'work-is-necesarry-2022-04-13-625680f7d380e.jpg', '<p>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 8, 1, 1, '2022-04-13 01:51:21', '2022-04-17 23:29:00'),
(8, 3, 'full of success', 'full-of-success', 'full-of-success-2022-04-13-6256811d45d11.jpg', '<p>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 1, 0, 1, '2022-04-13 01:51:58', '2022-04-15 05:39:50'),
(9, 3, 'love your family', 'love-your-family', 'love-your-family-2022-04-13-6256817680cae.jpg', '<p>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 5, 0, 1, '2022-04-13 01:53:26', '2022-04-15 23:29:12'),
(10, 3, 'MOney is everything', 'money-is-everything', 'money-is-everything-2022-04-13-625681917b576.jpg', '<p>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 17, 1, 1, '2022-04-13 01:53:54', '2022-04-18 21:49:33'),
(11, 4, 'Babba C Rivera', 'babba-c-rivera', 'babba-c-rivera-2022-04-16-625a945f682ed.jpg', '<p>Babba C Rivera is a Swedish Latina currently living in New York City whose minimal, Scandinavian-inspired style has helped her to gather over 159,000 followers on Instagram alone&mdash;she&rsquo;s so successful that she even found herself on the Forbes Under 30 list! If you&rsquo;re looking for unique street-style inspiration, Babba&rsquo;s page is the perfect place to look. She effortlessly mixes casual outfits with bright colours, statement pieces and killer accessories that would look great on everyone. Alongside her fashion content, Babba is also the resident Eco Beauty Expert at Vogue Scandinavia and has gone on to launch her own clean haircare range, inspired by her Latinx heritage, called Ceremonia.<br />\r\n&nbsp;</p>', 3, 1, 1, '2022-04-16 04:03:13', '2022-05-24 22:17:28'),
(12, 4, 'Catarina Mira is a fashion influencer', 'catarina-mira-is-a-fashion-influencer', 'catarina-mira-is-a-fashion-influencer-2022-04-16-625a94a6e8e35.webp', '<p>Catarina Mira is a fashion influencer, originally born in Portugal, that made the move over to London to fulfil her creative ambitions and start her blog, Mira-Me. Mira-Me is a fashion blog with excellent visuals. Catarina is a talented photographer that captures her fashion in a moody and artistic style that sets her apart from other bloggers and helped her build a large base of loyal followers. Catarina&rsquo;s style is very classic and sophisticated with the appearance of a lot of neutral colours in most outfits. She&rsquo;s also about to have a baby, so you&rsquo;ll be able to find a lot of pregnancy style tips on her blog. Some of the most popular posts that you will find on Catarina&rsquo;s blog includes her Recommendations post that she frequently updates with the fashion pieces that have recently caught her eye. There&rsquo;s also her Fancy PJs post where she discusses some of the hottest nightwear pieces of the moment that will help you to fall asleep in style.<br />\r\n&nbsp;</p>', 3, 1, 1, '2022-04-16 04:04:23', '2022-04-18 03:37:04'),
(13, 4, 'Eni is a petite fashion blog', 'eni-is-a-petite-fashion-blog', 'eni-is-a-petite-fashion-blog-2022-04-16-625a94ebd7911.jpg', '<p>Eni is a petite fashion blogger based in the UK, originally born in Nigeria, who works as a blogger, YouTuber and stylist in London. Using fashion as a fun way to express her own personal style, Eni has created a platform where she produces stunning visuals and inspiring outfits that are easy for everyone to recreate. Her style mixes fun, vibrant prints with simple wardrobe basics, giving all of her readers the inspiration they need to elevate their day-to-day outfits with ease. With over 22,000 followers on Instagram alone, Eni has become one of the most-loved bloggers sharing style ideas for people with a petite body shape who may otherwise struggle to find clothing pieces that fit their body shape. Some of Eni&rsquo;s most popular posts include her summer styling video which shares<br />\r\n&nbsp;</p>', 1, 1, 0, '2022-04-16 04:05:32', '2022-04-17 01:33:45'),
(14, 4, 'Iron Man 3', 'iron-man-3', 'iron-man-3-2022-04-17-625bde89e8ab0.jpg', '<p>Iron Man 3<a href=\"https://en.wikipedia.org/wiki/Iron_Man_3#cite_note-OnscreenTitle-7\">[N 2]</a>&nbsp;is a 2013 American&nbsp;<a href=\"https://en.wikipedia.org/wiki/Superhero_film\">superhero film</a>&nbsp;based on the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Marvel_Comics\">Marvel Comics</a>&nbsp;character&nbsp;<a href=\"https://en.wikipedia.org/wiki/Iron_Man\">Iron Man</a>, produced by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Marvel_Studios\">Marvel Studios</a>&nbsp;and distributed by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Walt_Disney_Studios_Motion_Pictures\">Walt Disney Studios Motion Pictures</a>.<a href=\"https://en.wikipedia.org/wiki/Iron_Man_3#cite_note-Paramount-1\">[N 1]</a>&nbsp;It is the sequel to&nbsp;<em><a href=\"https://en.wikipedia.org/wiki/Iron_Man_(2008_film)\">Iron Man</a></em>&nbsp;(2008) and&nbsp;<em><a href=\"https://en.wikipedia.org/wiki/Iron_Man_2\">Iron Man 2</a></em>&nbsp;(2010), and&nbsp;<a href=\"https://en.wikipedia.org/wiki/List_of_Marvel_Cinematic_Universe_films\">the seventh film</a>&nbsp;in the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Marvel_Cinematic_Universe\">Marvel Cinematic Universe</a>&nbsp;(MCU). The film was directed by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Shane_Black\">Shane Black</a>&nbsp;from a screenplay he co-wrote with&nbsp;<a href=\"https://en.wikipedia.org/wiki/Drew_Pearce\">Drew Pearce</a>, and stars&nbsp;<a href=\"https://en.wikipedia.org/wiki/Robert_Downey_Jr.\">Robert Downey Jr.</a>&nbsp;as&nbsp;<a href=\"https://en.wikipedia.org/wiki/Tony_Stark_(Marvel_Cinematic_Universe)\">Tony Stark / Iron Man</a>&nbsp;alongside&nbsp;<a href=\"https://en.wikipedia.org/wiki/Gwyneth_Paltrow\">Gwyneth Paltrow</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Don_Cheadle\">Don Cheadle</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Guy_Pearce\">Guy Pearce</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Rebecca_Hall\">Rebecca Hall</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/St%C3%A9phanie_Szostak\">St&eacute;phanie Szostak</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/James_Badge_Dale\">James Badge Dale</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Jon_Favreau\">Jon Favreau</a>, and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Ben_Kingsley\">Ben Kingsley</a>. In&nbsp;<em>Iron Man 3</em>, Tony Stark wrestles with the ramifications of the events of&nbsp;<em><a href=\"https://en.wikipedia.org/wiki/The_Avengers_(2012_film)\">The Avengers</a></em>&nbsp;during a national terrorism campaign on the United States led by the mysteriou</p>', 0, 0, 0, '2022-04-17 03:31:54', '2022-04-17 03:34:01'),
(15, 4, 'Spider Man', 'spider-man', 'spider-man-2022-04-17-625bdec859871.jpg', '<p>Spider-Man: No Way Home&nbsp;is a 2021 American&nbsp;<a href=\"https://en.wikipedia.org/wiki/Superhero_film\">superhero film</a>&nbsp;based on the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Marvel_Comics\">Marvel Comics</a>&nbsp;character&nbsp;<a href=\"https://en.wikipedia.org/wiki/Spider-Man\">Spider-Man</a>, co-produced by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Columbia_Pictures\">Columbia Pictures</a>&nbsp;and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Marvel_Studios\">Marvel Studios</a>&nbsp;and distributed by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Sony_Pictures_Releasing\">Sony Pictures Releasing</a>. It is the sequel to&nbsp;<em><a href=\"https://en.wikipedia.org/wiki/Spider-Man:_Homecoming\">Spider-Man: Homecoming</a></em>&nbsp;(2017) and&nbsp;<em><a href=\"https://en.wikipedia.org/wiki/Spider-Man:_Far_From_Home\">Spider-Man: Far From Home</a></em>&nbsp;(2019), and&nbsp;<a href=\"https://en.wikipedia.org/wiki/List_of_Marvel_Cinematic_Universe_films\">the 27th film</a>&nbsp;in the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Marvel_Cinematic_Universe\">Marvel Cinematic Universe</a>&nbsp;(MCU). The film was directed by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Jon_Watts\">Jon Watts</a>&nbsp;and written by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Chris_McKenna_(writer)\">Chris McKenna</a>&nbsp;and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Erik_Sommers\">Erik Sommers</a>. It stars&nbsp;<a href=\"https://en.wikipedia.org/wiki/Tom_Holland\">Tom Holland</a>&nbsp;as&nbsp;<a href=\"https://en.wikipedia.org/wiki/Peter_Parker_(Marvel_Cinematic_Universe)\">Peter Parker / Spider-Man</a>&nbsp;alongside&nbsp;<a href=\"https://en.wikipedia.org/wiki/Zendaya\">Zendaya</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Benedict_Cumberbatch\">Benedict Cumberbatch</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Jacob_Batalon\">Jacob Batalon</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Jon_Favreau\">Jon Favreau</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Jamie_Foxx\">Jamie Foxx</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Willem_Dafoe\">Willem Dafoe</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Alfred_Molina\">Alfred Molina</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Benedict_Wong\">Benedict Wong</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Tony_Revolori\">Tony Revolori</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Marisa_Tomei\">Marisa Tomei</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Andrew_Garfield\">Andrew Garfield</a>, and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Tobey_Maguire\">Tobey Maguire</a>. In the film, Parker asks Dr.&nbsp;<a href=\"https://en.wikipedia.org/wiki/Stephen_Strange_(Marvel_Cinematic_Universe)\">Stephen Strange</a>&nbsp;(Cumberbatch) to use magic to make his identity as Spider-Man a secret again following its public revelation at the end of&nbsp;<em>Far From Home</em>. When the spell goes wrong, the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Multiverse_(Marvel_Cinematic_Universe)\">multiverse</a>&nbsp;is broken open which allows visitors from alternate realities to enter Parker&#39;s universe.</p>', 0, 0, 1, '2022-04-17 03:32:56', '2022-05-24 22:16:15');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `tag_id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-04-13 01:41:22', '2022-04-13 01:41:22'),
(2, 2, 1, '2022-04-13 01:41:22', '2022-04-13 01:41:22'),
(3, 4, 1, '2022-04-13 01:41:22', '2022-04-13 01:41:22'),
(4, 5, 1, '2022-04-13 01:41:22', '2022-04-13 01:41:22'),
(5, 1, 2, '2022-04-13 01:41:50', '2022-04-13 01:41:50'),
(6, 2, 2, '2022-04-13 01:41:50', '2022-04-13 01:41:50'),
(7, 1, 3, '2022-04-13 01:42:15', '2022-04-13 01:42:15'),
(8, 3, 3, '2022-04-13 01:42:15', '2022-04-13 01:42:15'),
(9, 4, 3, '2022-04-13 01:42:15', '2022-04-13 01:42:15'),
(10, 1, 6, '2022-04-13 01:43:41', '2022-04-13 01:43:41'),
(11, 3, 6, '2022-04-13 01:43:41', '2022-04-13 01:43:41'),
(12, 4, 6, '2022-04-13 01:43:41', '2022-04-13 01:43:41'),
(13, 1, 7, '2022-04-13 01:51:21', '2022-04-13 01:51:21'),
(14, 4, 7, '2022-04-13 01:51:21', '2022-04-13 01:51:21'),
(15, 1, 8, '2022-04-13 01:51:58', '2022-04-13 01:51:58'),
(16, 3, 8, '2022-04-13 01:51:58', '2022-04-13 01:51:58'),
(17, 1, 9, '2022-04-13 01:53:26', '2022-04-13 01:53:26'),
(18, 1, 10, '2022-04-13 01:53:54', '2022-04-13 01:53:54'),
(19, 4, 10, '2022-04-13 01:53:54', '2022-04-13 01:53:54'),
(20, 5, 10, '2022-04-13 01:53:54', '2022-04-13 01:53:54'),
(21, 2, 10, '2022-04-14 02:07:45', '2022-04-14 02:07:45'),
(22, 3, 10, '2022-04-14 02:07:45', '2022-04-14 02:07:45'),
(23, 2, 9, '2022-04-14 02:07:51', '2022-04-14 02:07:51'),
(24, 3, 9, '2022-04-14 02:07:51', '2022-04-14 02:07:51'),
(25, 4, 9, '2022-04-14 02:07:51', '2022-04-14 02:07:51'),
(26, 2, 8, '2022-04-14 02:07:57', '2022-04-14 02:07:57'),
(27, 4, 8, '2022-04-14 02:07:57', '2022-04-14 02:07:57'),
(28, 5, 8, '2022-04-14 02:07:57', '2022-04-14 02:07:57'),
(29, 1, 11, '2022-04-16 04:03:13', '2022-04-16 04:03:13'),
(30, 2, 11, '2022-04-16 04:03:13', '2022-04-16 04:03:13'),
(31, 1, 12, '2022-04-16 04:04:23', '2022-04-16 04:04:23'),
(32, 4, 12, '2022-04-16 04:04:23', '2022-04-16 04:04:23'),
(33, 1, 13, '2022-04-16 04:05:32', '2022-04-16 04:05:32'),
(34, 2, 13, '2022-04-16 04:05:32', '2022-04-16 04:05:32'),
(35, 1, 14, '2022-04-17 03:31:54', '2022-04-17 03:31:54'),
(36, 2, 14, '2022-04-17 03:31:54', '2022-04-17 03:31:54'),
(37, 3, 14, '2022-04-17 03:31:54', '2022-04-17 03:31:54'),
(38, 1, 15, '2022-04-17 03:32:56', '2022-04-17 03:32:56'),
(39, 2, 15, '2022-04-17 03:32:56', '2022-04-17 03:32:56'),
(40, 3, 15, '2022-04-17 03:32:56', '2022-04-17 03:32:56'),
(41, 4, 15, '2022-04-17 03:32:56', '2022-04-17 03:32:56'),
(42, 5, 15, '2022-04-17 03:32:56', '2022-04-17 03:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `post_user`
--

CREATE TABLE `post_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_user`
--

INSERT INTO `post_user` (`id`, `post_id`, `user_id`, `created_at`, `updated_at`) VALUES
(5, 6, 4, '2022-04-13 01:58:55', '2022-04-13 01:58:55'),
(6, 9, 4, '2022-04-13 01:58:57', '2022-04-13 01:58:57'),
(7, 8, 4, '2022-04-13 01:58:59', '2022-04-13 01:58:59'),
(12, 8, 3, '2022-04-13 03:09:22', '2022-04-13 03:09:22'),
(13, 7, 3, '2022-04-13 03:09:25', '2022-04-13 03:09:25'),
(15, 10, 3, '2022-04-14 02:30:34', '2022-04-14 02:30:34'),
(18, 1, 3, '2022-04-15 02:43:54', '2022-04-15 02:43:54'),
(19, 10, 4, '2022-04-15 05:26:32', '2022-04-15 05:26:32'),
(20, 12, 3, '2022-04-16 23:05:36', '2022-04-16 23:05:36'),
(21, 13, 4, '2022-04-17 02:38:44', '2022-04-17 02:38:44'),
(22, 12, 4, '2022-04-17 02:40:20', '2022-04-17 02:40:20'),
(23, 11, 3, '2022-04-17 23:59:13', '2022-04-17 23:59:13'),
(24, 6, 3, '2022-05-07 21:40:09', '2022-05-07 21:40:09'),
(25, 2, 3, '2022-05-08 05:50:24', '2022-05-08 05:50:24'),
(26, 11, 4, '2022-05-24 22:17:19', '2022-05-24 22:17:19');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', NULL, NULL),
(2, 'Author', 'author', NULL, NULL),
(3, 'Admin', 'admin', NULL, NULL),
(4, 'Author', 'author', NULL, NULL),
(5, 'Admin', 'admin', NULL, NULL),
(6, 'Author', 'author', NULL, NULL),
(7, 'Admin', 'admin', NULL, NULL),
(8, 'Author', 'author', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'khairul@olivineltd.com', '2022-04-13 01:49:50', '2022-04-13 01:49:50'),
(2, 'user@gmail.com', '2022-04-13 01:49:53', '2022-04-13 01:49:53'),
(3, 'author@blog.com', '2022-04-13 01:49:57', '2022-04-13 01:49:57'),
(4, 'casually.ur68000@gmail.com', '2022-04-13 01:50:01', '2022-04-13 01:50:01'),
(5, 'sadia123@gmail.com', '2022-04-13 01:50:16', '2022-04-13 01:50:16'),
(6, 'adf@gmail.com', '2022-05-24 22:17:50', '2022-05-24 22:17:50');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'life', 'life', '2022-04-13 01:34:26', '2022-04-13 01:34:26'),
(2, 'nature', 'nature', '2022-04-13 01:34:30', '2022-04-13 01:34:30'),
(3, 'music', 'music', '2022-04-13 01:34:36', '2022-04-13 01:34:36'),
(4, 'happy', 'happy', '2022-04-13 01:34:41', '2022-04-13 01:34:41'),
(5, 'funny', 'funny', '2022-04-13 01:34:46', '2022-04-13 01:34:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `username`, `email`, `email_verified_at`, `password`, `about`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 1, 'Md Admin', 'admin', 'admin@blog.com', NULL, '$2y$10$w57yCOBkwnQMLfsugN1.zO4BO/XOoTlKjTWSKmmv1wRgmRjIIZ5.e', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised i', 'md-admin-2022-04-18-625ce10546960.jpg', NULL, '2022-04-13 05:31:30', '2022-04-17 21:54:45'),
(4, 2, 'Md Author', 'author', 'author@blog.com', NULL, '$2y$10$v1PPC9vRMyHzvhlQZHT9UOMndulpDtuKdKLyFRhQNWJB7ACEG7AFS', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised i', 'default.png', NULL, '2019-04-12 05:30:56', '2022-04-13 05:31:09'),
(9, 2, 'Sadia Uddin', 'sadia123', 'sadia@blog.com', NULL, '$2y$10$xoD.19s.fEK0qVrp01ew4OkOjY8k.P3NAkGC6KX42J0F8rrTVFMeW', NULL, 'default.png', NULL, '2022-04-16 23:48:18', NULL),
(10, 2, 'Ziaul', 'ziaul', 'ziaul@blog.com', NULL, '$2y$10$gIk4AjzbUGVQQ84Iq2rTA.Jc1et50vTvjbeYA18zCIU0jAIujwjGi', NULL, 'default.png', NULL, '2022-04-16 23:48:18', NULL),
(12, 2, 'era', 'era', 'era@blog.com', NULL, '$2y$10$GK5UNWASqsVNE7RY/nZ.burChNl.k.2uyRoqP.F3qgexEVNGlvn/a', NULL, 'default.png', NULL, '2022-04-16 23:48:18', NULL),
(13, 2, 'khejur', 'khejra', 'khejra@gmail.com', NULL, '$2y$10$PbVLiJPw.7Kcve00l1B/s.efPe126DEJng8evW45yDFCqmTA1FCXS', NULL, 'default.png', NULL, '2022-04-17 00:01:47', '2022-04-17 00:01:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_post`
--
ALTER TABLE `category_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_user`
--
ALTER TABLE `post_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_user_post_id_foreign` (`post_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category_post`
--
ALTER TABLE `category_post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `post_user`
--
ALTER TABLE `post_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_user`
--
ALTER TABLE `post_user`
  ADD CONSTRAINT `post_user_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
