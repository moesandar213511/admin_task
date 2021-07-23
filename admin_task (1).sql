-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:4306
-- Generation Time: Jul 23, 2021 at 01:04 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `list_names`
--

CREATE TABLE `list_names` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `list_names`
--

INSERT INTO `list_names` (`id`, `name`, `created_at`, `updated_at`) VALUES
(15, 'meorg111', '2019-11-05 14:18:04', '2019-11-10 01:21:35'),
(16, 'asc', '2019-11-05 14:18:16', '2019-11-05 14:18:16'),
(17, 'ghi site', '2019-11-08 22:59:04', '2019-11-08 22:59:04'),
(18, 'To Study', '2019-11-10 01:22:38', '2019-11-10 01:22:38');

-- --------------------------------------------------------

--
-- Table structure for table `main_categories`
--

CREATE TABLE `main_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_categories`
--

INSERT INTO `main_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'redmi', '2019-10-09 17:30:00', '2019-10-09 17:30:00'),
(3, 'aPPLE', '2019-10-10 08:09:34', '2019-10-10 08:35:22'),
(4, 'vvvvvvv', '2019-10-22 04:20:06', '2019-10-22 04:20:06'),
(5, 'Moon Lay', '2019-10-22 04:21:26', '2019-10-22 04:21:26'),
(6, 'Friend Zone', '2019-10-22 04:27:55', '2019-10-22 04:27:55'),
(9, 'Other', '2019-10-26 07:23:13', '2019-10-26 07:23:13');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `education` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `phone`, `position`, `address`, `education`, `detail`, `photo`, `created_at`, `updated_at`) VALUES
(0, 'ThuYein Soe', '0987654323', 'Lecturer', 'Kyaukmying', 'B.A(English)', 'dfsfwe', '5dc64e522103a_6.jpg', '2019-11-10 17:30:00', '2019-11-11 20:44:14'),
(3, 'Phyo Tha Zin', '09 425536478', 'JavaScript Lecturer', 'Tharkayta', 'B.E ( IT )', 'hello', '5dc1e0bb910ec_computer.png', '2019-11-05 13:04:31', '2019-11-05 14:21:07'),
(11, 'Moon Lay 111', '09424420142', 'Web Developer', 'shwe pauk kan', 'B.E (IT) 11', 'hello world Mingalar par', '5dc1dff2786eb_moe.jpg', '2019-11-05 14:17:46', '2019-11-15 00:39:33'),
(12, 'Zayy', '09876543', 'Developer', 'sesfw', 'dfsff', 'wrwer', '5dc64e522103a_6.jpg', '2019-11-08 22:57:46', '2019-11-08 22:57:46');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_10_09_071007_create_members_table', 2),
(5, '2019_10_10_032653_create_main_categories_table', 3),
(6, '2019_10_10_032824_create_sub_categories_table', 3),
(7, '2019_10_10_034847_create_companies_table', 4),
(8, '2019_10_10_080522_create_galleries_table', 5),
(9, '2019_10_11_171226_create_blogs_table', 6),
(10, '2019_10_11_172613_create_events_table', 7),
(12, '2019_10_12_015443_create_web_site_infos_table', 8),
(13, '2019_10_12_142654_create_contacts_table', 9),
(14, '2019_10_14_043307_create_ads_table', 10),
(15, '2019_10_14_043725_create_webpages_table', 11),
(16, '2019_10_14_045418_create_ads_webpages_table', 12),
(17, '2019_10_26_184925_create_admin_galleries_table', 13),
(18, '2019_10_29_042933_create_banners_table', 14),
(19, '2019_11_05_145611_create_list_names_table', 15),
(20, '2019_11_05_145842_create_tasks_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `logo`, `created_at`, `updated_at`) VALUES
(4, 'ဆောက်လုပ်ရေး', '5db9187dcd938_skyline (1).png', '2019-10-10 09:36:21', '2019-10-29 22:28:37'),
(5, 'အိမ်ဆောက်ပစ္စည်း', '5db9186e88635_house (1).png', '2019-10-10 09:36:30', '2019-10-29 22:28:22'),
(7, 'အိမ်ခြံမြေအရောင်းအဝယ်', '5db91866a55c6_sale.png', '2019-10-10 10:42:15', '2019-10-29 22:28:14'),
(8, 'ရိုးရာအထည်', '5db9185facc58_shirt.png', '2019-10-10 09:36:21', '2019-10-29 22:28:07'),
(9, 'ဟိုတယ်နှင့်ခရီးသွား', '5db91858a0954_tourist (1).png', '2019-10-10 10:42:15', '2019-10-29 22:28:00'),
(10, 'စက်သုံးဆီ', '5db9184191cc6_gas-station.png', '2019-10-10 09:36:21', '2019-10-29 22:27:37'),
(11, 'ထုတ်ကုန်', '5db918398ba71_design.png', '2019-10-10 09:36:21', '2019-10-29 22:27:29'),
(12, 'စားသောက်ဆိုင်', '5db9183222d08_restaurant (1).png', '2019-10-10 09:36:30', '2019-10-29 22:27:22'),
(13, 'IT', '5db9192209371_computer.png', '2019-10-10 09:36:30', '2019-10-29 22:31:22'),
(14, 'ပညာရေး', '5db9180c5fe89_classroom (1).png', '2019-10-10 09:36:30', '2019-10-29 22:26:44'),
(19, '၀န်ဆောင်မှုနှင့်ရင်းနှီးမြှုပ်နှံမှု', '5db91801438b4_investment (1).png', '2019-10-29 04:25:30', '2019-10-30 02:02:49');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `list_id` int(11) NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci,
  `user_id` int(11) NOT NULL,
  `deadline` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `list_id`, `detail`, `user_id`, `deadline`, `status`, `created_at`, `updated_at`) VALUES
(10, 'meaorg', 15, 'sdfsfsefwerwr', 11, '2019-11-07', 'done', '2019-11-05 14:18:54', '2019-11-05 15:05:58'),
(11, 'mon site', 16, 'dfdsfsffsd', 12, '2019-11-30', 'active', '2019-11-05 15:02:03', '2019-11-08 22:58:27'),
(12, 'meaorg', 15, 'fsdfsf', 11, '2019-11-10', 'done', '2019-11-08 22:29:59', '2019-11-10 01:25:03'),
(13, 'mon site', 17, 'dsfdf', 11, '2019-11-08', 'active', '2019-11-08 22:38:59', '2019-11-08 22:59:18'),
(14, 'ascc', 17, 'sfsdff', 12, '2019-11-23', 'active', '2019-11-08 22:58:17', '2019-11-08 23:27:02'),
(15, 'OOP', 18, 'laravell OOP', 11, '2019-11-14', 'done', '2019-11-10 01:23:45', '2019-11-11 08:29:00'),
(16, 'laravel email', 18, 'laravel 6', 0, '2019-11-12', 'active', '2019-11-11 21:27:48', '2019-11-11 21:27:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `type`, `member_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin@gmail.com', '2019-11-04 17:30:00', '$2y$10$TtzOKRHm.KNgAauCLCjS/utMY1/wXAO/fAuc41CxErLI6WlT1ow.W', 'admin', 0, NULL, '2019-11-04 17:30:00', '2019-11-11 20:44:40'),
(5, 'phyo@gmail.com', NULL, '$2y$10$jwIHApGmlfhjAQBPTMN6t.U7ucU7j.SRrRtNo1Ff2Iq5PUtCOxaT.', 'member', 3, NULL, '2019-11-05 13:04:31', '2019-11-05 13:04:31'),
(13, 'moonlay@gmail.com', NULL, '$2y$10$13T8cwmh3YUvl2mpN3pTA.R7ChnvAol5i2Sd9tmUp4P1WB9C/NN0i', 'member', 11, NULL, '2019-11-05 14:17:46', '2019-11-15 00:39:07'),
(14, 'zay@gmail.com', NULL, '$2y$10$YvcOPORIaHuL79LLDu4YzOz.oL/qVBUu0qO1ilP1ui4jwtEvi/BKe', 'member', 12, NULL, '2019-11-08 22:57:46', '2019-11-08 22:57:46');

-- --------------------------------------------------------

--
-- Table structure for table `webpages`
--

CREATE TABLE `webpages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `webpages`
--

INSERT INTO `webpages` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'home', NULL, NULL),
(3, 'company', NULL, NULL),
(5, 'news', NULL, NULL),
(6, 'event', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `web_site_infos`
--

CREATE TABLE `web_site_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `website_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `history` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vision` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mission` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sign_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sign_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sign_position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_site_infos`
--

INSERT INTO `web_site_infos` (`id`, `website_name`, `about`, `history`, `vision`, `mission`, `sign_photo`, `sign_name`, `sign_position`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Mon Entreprenures Association', 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Placeat quos vitae vel, voluptatibus!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, laudantium reprehenderit provident voluptates minus incidunt nobis iure odit nihil atque totam impedit quidem accusantium aspernatur ipsum at! Quaerat, similique face', 'ipsum dolor sit amet, consectetur adipisicing elit. Autem distinctio dolores tenetur incidunt, id ad eius accusantium labore nam a quibusdam velit harum sed aliquam cupiditate inventore sint architecto perspiciatis.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit nam officiis cum voluptates modi ex quo ipsa quis, non, sed, deleniti maiores quaerat earum laborum. Placeat quos vitae vel, voluptatibus!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, laudantium reprehenderit provident voluptates minus incidunt nobis iure odit nihil atque totam impedit quidem accusantium aspernatur ipsum at! Quaerat, similique face', '<ul><li><li>အလားအလာရှိသည့် စီးပွားရေးလုပ်ကွက်များ ဖော်ထုတ်နိုင်ရန်</li><li>ဒေသထွက်ထုတ်ကုန်များ၏ ဈေးကွက်ဖော်ဆောင်နိုင်ရန်</li><li>မွန်လုပ်ငန်းရှင်အချင်းချင်း စီးပွားရေးကွန်ရက်အားကောင်းလာရန်</li><li>မွန်လုပ်ငန်းရှင်များကို စီးပွားရေးနှင့် သက်ဆိုင်သည့် စွမ်းဆောင်ရည်များ မြှင့်တင်ပေးရန်</li><li>မွန် ဒေသအတွင်း ဖော်ဆောင်နိုင်မည့် လုပ်ငန်းကဏ္ဍများ ၏ မူဝါဒပန်းတိုင်များ၊ လုပ်ငန်းစဉ်များ၊ အကောင်ထည်ဖော်ရမည့် အပိုင်းများ ချမှတ်နိုင်ရန်။</li></li></ul>', '<ul><li>နိုင်ငံတော်အဆင့်/ပြည်နယ်အဆင့် မှ ချမှတ်အကောင်ထည်ဖော် လုပ်ဆောင်နေသည့် စီးပွားရေး ကဏ္ဍများ သိရှိနားလည်နိုင်ခြင်း</li><li>နိုင်ငံတော်အဆင့်/ပြည်နယ်အဆင့် စီးပွားရေးဆိုင်ရာ ဥပဒေ၊ နည်းဥပဒေများ သိရှိနားလည်လိုက်နာနိုင်ခြင်း</li><li>စီးပွားရေးဆိုင်ရာ အကြံနည်းလမ်းကောင်းများ၊ အားသာချက် အားနည်းချက်များ၊ လိုက်နာဆောင်ရွက်ရမည့် စည်းမျဉ်း စည်းကမ်းများနှင့် ဓလေ့ထုံးတမ်းအစဉ်အလာများကို သိရှိနားလည်ဆောင်ရွက်နိုင်ခြင်း</li><li>မွန် ဒေသရှိ မွန်လုပ်ငန်းရှင်များ အချင်းချင်း စီးပွားရေးလုပ်ငန်းများ ချိတ်ဆက် ပူးပေါင်းလုပ်ဆောင်မှု အားကောင်းလာနိုင်ခြင်း<br></li></ul>', '5da9d37b60751_welcom_sign.png', 'DR. AUNG WIN HTUT', 'PH.D (ELECTRICAL POWER) (MPEI)', 'meamon.mlm@gmail.com', '09 4550 69192', 'No.(64/4),ShinSawPu Road, ZayeKyoYet, Mawlamyine.', NULL, '2019-11-03 22:04:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_names`
--
ALTER TABLE `list_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_categories`
--
ALTER TABLE `main_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
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
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `webpages`
--
ALTER TABLE `webpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_site_infos`
--
ALTER TABLE `web_site_infos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `list_names`
--
ALTER TABLE `list_names`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `main_categories`
--
ALTER TABLE `main_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `webpages`
--
ALTER TABLE `webpages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `web_site_infos`
--
ALTER TABLE `web_site_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
