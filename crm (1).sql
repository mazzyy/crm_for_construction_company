-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2021 at 11:33 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `log_id` int(22) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `action_controller` text DEFAULT NULL,
  `action_method` text DEFAULT NULL,
  `action_url` text DEFAULT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `ip` varchar(25) DEFAULT NULL,
  `browser` text DEFAULT NULL,
  `os` text DEFAULT NULL,
  `device` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company_information`
--

CREATE TABLE `company_information` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `website` varchar(100) NOT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_information`
--

INSERT INTO `company_information` (`id`, `name`, `email`, `contact`, `address`, `website`, `logo`, `date_time`) VALUES
(1, 'Data Drip CRM', 'mzahed786110@gmail.com', '(817) 474-8888', 'Lorem Lipsum...', 'loremlipsum.com', NULL, '2018-06-12 22:18:06');

-- --------------------------------------------------------

--
-- Table structure for table `email_settings`
--

CREATE TABLE `email_settings` (
  `id` int(1) NOT NULL,
  `host` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `port` int(3) NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `sent_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sent_title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `reply_email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `reply_title` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `email_settings`
--

INSERT INTO `email_settings` (`id`, `host`, `port`, `email`, `password`, `sent_email`, `sent_title`, `reply_email`, `reply_title`) VALUES
(1, 'mail.technologicx.com', 465, 'admin@technologicx.com', 'fucku1234$#@!', 'admin@technologicx.com', 'Mohammad', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `failed_login_attempts`
--

CREATE TABLE `failed_login_attempts` (
  `fla_id` int(11) NOT NULL,
  `user_email` varchar(55) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `failed_login_attempts`
--

INSERT INTO `failed_login_attempts` (`fla_id`, `user_email`, `user_id`, `date_time`) VALUES
(1, 'cyberasad09@gmail.com', 1, '2021-08-07 13:17:06'),
(2, 'smasad612@gmail.com', 5, '2021-08-07 13:17:16'),
(3, 'smasad612@gmail.com', 5, '2021-08-07 13:17:19'),
(4, 'smasad612@gmail.com', 5, '2021-08-07 13:17:23'),
(5, 'cyberasad09@gmail.com', 1, '2021-08-07 13:20:15'),
(6, 'smasad12612@gmail.com', 19, '2021-08-11 00:17:58'),
(7, 'hassan.aftab2244@gmail.com', 24, '2021-08-12 16:57:08'),
(8, 'hassan.aftab2244@gmail.com', 24, '2021-08-12 16:57:17');

-- --------------------------------------------------------

--
-- Table structure for table `failed_otp_attempts`
--

CREATE TABLE `failed_otp_attempts` (
  `foa_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `failed_otp_attempts`
--

INSERT INTO `failed_otp_attempts` (`foa_id`, `user_id`, `date_time`) VALUES
(1, NULL, '2020-10-15 21:53:16'),
(2, NULL, '2020-10-15 21:53:23');

-- --------------------------------------------------------

--
-- Table structure for table `fonts`
--

CREATE TABLE `fonts` (
  `id` int(11) NOT NULL,
  `label` varchar(25) DEFAULT NULL,
  `class` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fonts`
--

INSERT INTO `fonts` (`id`, `label`, `class`) VALUES
(1, 'Th', 'fa-th'),
(2, 'Pie Chart', 'fa-chart-pie'),
(3, 'Cube', 'icon ni ni-layers'),
(4, 'Cubes', 'fa fa-cubes'),
(5, 'Database', 'fa fa-database'),
(6, 'Desktop', 'fa fa-desktop'),
(7, 'Folder Open', 'fa fa-folder-open'),
(8, 'Folder', 'fa fa-folder'),
(9, 'Settings gear', 'fa fa-gear'),
(10, 'Settings', 'fa fa-gears'),
(11, 'Line Chart', 'icon ni ni-growth'),
(12, 'Qr Code', 'fa fa-qrcode'),
(13, 'Recycle', 'fa fa-recycle'),
(14, 'Sitemap', 'fa fa-sitemap'),
(15, 'Tasks', 'fa fa-tasks'),
(16, 'Envelope', 'fa fa-envelope'),
(17, 'Dashboard', 'fa fa-dashboard'),
(18, 'Fork', 'fa fa-code-fork'),
(19, 'History', 'fa fa-history'),
(20, 'Print', 'fa fa-print'),
(21, 'User', 'icon ni ni-user-alt'),
(22, 'Users', 'icon ni ni-users'),
(23, 'Search', 'fa fa-search'),
(24, 'Files', 'fa fa-file');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` tinyint(1) NOT NULL,
  `type` varchar(35) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` tinyint(2) DEFAULT NULL,
  `update_at` date DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `type`, `created_at`, `created_by`, `update_at`, `update_by`) VALUES
(1, 'Admin', '2021-08-10 01:42:52', 1, '2018-08-15', NULL),
(2, 'Students', '2021-08-10 01:42:52', 1, '2018-08-16', NULL),
(3, 'Managerzz', '2021-08-10 01:42:52', 1, '2020-10-15', NULL),
(5, 'AWS', '2021-08-09 12:39:10', 1, '2021-08-09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_otp`
--

CREATE TABLE `login_otp` (
  `login_otp_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `session_id` varchar(55) DEFAULT NULL,
  `otp_pin` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '''1=active'',''0=expired'''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_otp`
--

INSERT INTO `login_otp` (`login_otp_id`, `user_id`, `session_id`, `otp_pin`, `created_at`, `status`) VALUES
(1, 1, 'aiobk19ue72hsqep1l7cne73hmgbpiqe', 534917, '2020-10-15 21:52:09', '1');

-- --------------------------------------------------------

--
-- Table structure for table `login_settings`
--

CREATE TABLE `login_settings` (
  `login_setting_id` int(11) NOT NULL,
  `two_factor_auth` enum('1','0') NOT NULL DEFAULT '1' COMMENT '"1 = enabled","0 = disabled"',
  `failed_login_limit` tinyint(2) DEFAULT NULL,
  `otp_expire_time` tinyint(2) DEFAULT NULL COMMENT '"Value in minutes"',
  `failed_otp_limit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_settings`
--

INSERT INTO `login_settings` (`login_setting_id`, `two_factor_auth`, `failed_login_limit`, `otp_expire_time`, `failed_otp_limit`) VALUES
(1, '0', 10, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(3) NOT NULL,
  `parent` int(3) NOT NULL,
  `name` varchar(25) NOT NULL,
  `class` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL,
  `display_order` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `parent`, `name`, `class`, `url`, `display_order`) VALUES
(1, 0, 'Registration', 'icon ni ni-users', '', 1),
(2, 1, 'Manage registration', '', 'registration/manage', 0),
(3, 0, 'Reporting', 'icon ni ni-pie', '', 3),
(4, 3, 'Custom report', '', 'registration/custom-report', 0),
(5, 0, 'User Management', 'icon ni ni-users', '', 2),
(6, 5, 'Manage Users', '', 'users', 0),
(7, 0, 'My registration', 'icon ni ni-user-alt', '', 1),
(8, 7, 'Manage', '', '#', 0);

-- --------------------------------------------------------

--
-- Table structure for table `menus_routes`
--

CREATE TABLE `menus_routes` (
  `route_id` int(11) NOT NULL,
  `label` varchar(55) DEFAULT NULL,
  `route` text DEFAULT NULL,
  `added_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus_routes`
--

INSERT INTO `menus_routes` (`route_id`, `label`, `route`, `added_at`) VALUES
(1, 'Manage Registrations', 'registration/manage', '2021-08-10 20:31:44'),
(2, 'Custom Report', 'registration/custom-report', '2021-08-10 20:35:24'),
(3, 'Manage Users', 'users', '2021-08-10 22:33:54'),
(4, 'My Registration', 'my-registration', '2021-08-11 00:15:44');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `registration_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `degree_of_interest` varchar(35) DEFAULT NULL,
  `school_attended` varchar(100) DEFAULT NULL,
  `documents` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Pending','Verified','Lead','Contact','Interview') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`registration_id`, `user_id`, `degree_of_interest`, `school_attended`, `documents`, `created_at`, `status`) VALUES
(1, NULL, NULL, NULL, NULL, '2021-08-11 17:04:09', 'Pending'),
(2, NULL, NULL, NULL, NULL, '2021-08-12 14:24:57', 'Pending'),
(3, 25, NULL, NULL, NULL, '2021-08-12 22:39:08', 'Lead'),
(4, 26, NULL, NULL, NULL, '2021-08-12 22:43:41', 'Pending'),
(5, 27, NULL, NULL, NULL, '2021-08-12 22:44:45', 'Pending'),
(6, 28, 'MA', 'Little', '{\"1\":{\"file_name\":\"Copy_of_CRM_requirements11.docx\"}}', '2021-08-13 11:13:07', 'Pending'),
(7, 29, 'Doctorate', 'dzfdf', NULL, '2021-08-13 12:18:26', 'Verified');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(2) NOT NULL,
  `hash` varchar(100) NOT NULL,
  `status` enum('Active','Suspended','Blocked','Pending') NOT NULL DEFAULT 'Active',
  `added_by` int(11) DEFAULT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_by` int(11) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `is_delete` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `hash`, `status`, `added_by`, `added_at`, `update_by`, `update_at`, `image`, `is_delete`) VALUES
(1, 'Mohammed', 'mzahed786110@gmail.com', '749b1df98e0d39c407e16cb83e9ade46', 1, '51fcfc2182eaf20ac30386949cee5331', 'Active', NULL, '2021-08-09 20:42:52', 1, '2021-08-12 12:08:41', '5c9c3f168215d52de6c7d5edba688005.jpg', '1'),
(23, 'mohammed zahed', 'mohammed@datadrip.com', '7032ed828220d9906579d066f4ac52ca', 2, '78131b28b87db5f9e4ea42b912634b4e', 'Active', NULL, '2021-08-11 21:04:09', NULL, NULL, NULL, '1'),
(31, 'hassan name', 'hassan.aftab2244@gmail.comss', 'b3360cc45c2819fc1ea9b0f16c15fdee', 3, '6566a0e982296fd8e3809b61a2e2a778', 'Active', 1, '2021-08-13 12:02:37', NULL, NULL, NULL, '1'),
(30, 'hassan name', 'hasdasd@gmail.com', 'b3360cc45c2819fc1ea9b0f16c15fdee', 3, '14e9b8d18a96adbc777a4e76e8c0201e', 'Active', 1, '2021-08-13 12:02:02', NULL, NULL, NULL, '1'),
(29, 'hassan aftab', 'hassan.aftab@gmail.com', 'b3360cc45c2819fc1ea9b0f16c15fdee', 2, '3c7e65632cb84b4ef6007e49e738bdb0', 'Active', NULL, '2021-08-13 07:18:26', NULL, NULL, NULL, '1'),
(28, 'hassan Pash', 'hassan.aftab2244@gmail.com', '749b1df98e0d39c407e16cb83e9ade46', 2, '80962a2eab5c2f1320f9e11a43efd667', 'Active', NULL, '2021-08-13 06:13:07', NULL, NULL, NULL, '1'),
(32, 'hassan aftab', 'hassan@gmail.com', 'b3360cc45c2819fc1ea9b0f16c15fdee', 1, '65c198a5fb9bf2e248d191c60cdb8d36', 'Active', 1, '2021-08-13 12:51:57', NULL, NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `session_id` varchar(50) DEFAULT NULL,
  `user_ip` varchar(25) DEFAULT NULL,
  `user_browser` varchar(30) DEFAULT NULL,
  `user_os` varchar(30) DEFAULT NULL,
  `user_device` varchar(25) DEFAULT NULL,
  `login_at` varchar(25) DEFAULT NULL,
  `logout_at` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_logs`
--

INSERT INTO `user_logs` (`log_id`, `user_id`, `session_id`, `user_ip`, `user_browser`, `user_os`, `user_device`, `login_at`, `logout_at`) VALUES
(1, 1, '377dacpfinuq8qrf3tj3j0jmi5r02tsq', '::1', 'Chrome', 'Windows 10', 'Computer', '2019-12-20 10:20:03pm', '2019-12-20 10:20:19pm'),
(2, 2, '8ql3c226j3kp8d0o8ofcjthff5l6fiqm', '::1', 'Chrome', 'Windows 10', 'Computer', '2019-12-20 10:54:11pm', '2019-12-20 10:54:23pm'),
(3, 1, 'hoopmj7v7kkoea36rr8r0f8i5ae6idmq', '::1', 'Chrome', 'Windows 10', 'Computer', '2019-12-20 10:58:47pm', NULL),
(4, 1, 'ana7e079gs3qadd0772k0p4efmrchdhk', '::1', 'Chrome', 'Windows 10', 'Computer', '2019-12-21 09:51:42pm', NULL),
(5, 1, 'fu2hir6tci3ssr7n133q8nsqes97dupt', '::1', 'Chrome', 'Windows 10', 'Computer', '2019-12-23 10:41:58pm', NULL),
(6, 1, 'a87i5qvov0e7ttfcc9d8a6a4o85vra0q', '::1', 'Chrome', 'Windows 10', 'Computer', '2019-12-25 06:51:38pm', NULL),
(7, 1, 'snceepv173e7f0gcs2e35s495670unvv', '::1', 'Chrome', 'Windows 10', 'Computer', '2019-12-26 08:21:30pm', NULL),
(8, 3, 'ol6v06s0bti284qvleq3cng9ud562gdn', '::1', 'Chrome', 'Windows 10', 'Computer', '2019-12-26 09:14:23pm', NULL),
(9, 1, '42vp5cd2241samnt0djf763cvahrr7aq', '::1', 'Chrome', 'Windows 10', 'Computer', '2019-12-26 09:28:32pm', NULL),
(10, 3, 'rk0i0l6uh89tnjqac7f5n51c2mpok6cm', '::1', 'Chrome', 'Windows 10', 'Computer', '2019-12-26 09:33:18pm', NULL),
(11, 1, 'clhcsj8jll18olm6351b8ru5sipid59c', '::1', 'Firefox', 'Windows 10', 'Computer', '2019-12-26 11:24:10pm', '2019-12-26 11:24:26pm'),
(12, 1, 'vrgtj0n3avp3nemmvcvbnn185jhuvlmr', '::1', 'Chrome', 'Windows 10', 'Computer', '2020-05-06 12:06:01am', '2020-05-06 12:07:02am'),
(13, 1, 'ebheu6mvcelncif7r7vo2p4jda86m0om', '::1', 'Chrome', 'Windows 10', 'Computer', '2020-05-06 12:26:07am', NULL),
(14, 1, 'ebheu6mvcelncif7r7vo2p4jda86m0om', '::1', 'Chrome', 'Windows 10', 'Computer', '2020-05-06 12:26:23am', NULL),
(15, 1, '7ua7qctco2u4efjci3sds4s3vauevvp8', '::1', 'Chrome', 'Windows 10', 'Computer', '2020-05-06 12:52:32am', '2020-05-06 12:54:20am'),
(16, 1, 'sm0vsk0d6d4qlt2ej2kl3rmcq9cs5imc', '::1', 'Chrome', 'Windows 10', 'Computer', '2020-05-06 12:54:33am', NULL),
(17, 1, 'ph4khcsk0k7tpv74jmudbv2oh2dur8js', '::1', 'Chrome', 'Windows 10', 'Computer', '2020-05-06 04:34:14am', NULL),
(18, 1, '5ld8u49gq4ouk4pujqalj1iqlrcajgut', '::1', 'Chrome', 'Windows 10', 'Computer', '2020-05-06 03:31:57pm', '2020-05-06 03:32:08pm'),
(19, 1, 'dj9nem8tvbb2sipgk9njtgednr3g4445', '::1', 'Chrome', 'Windows 10', 'Computer', '2020-05-06 03:41:50pm', NULL),
(20, 1, '09kpgmn9a5699uvtlt15hcesk1i3rfj9', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-05-07 01:36:39am', NULL),
(21, 1, 'mioe5ms553n1c9sts7gclrudoq93kgl7', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-05-07 11:09:55am', NULL),
(22, 1, '74patmhulrvs27puijc4ej7g9g33kt0o', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-05-07 12:21:38pm', '2020-05-07 12:23:24pm'),
(23, 1, '2o4a0bfo158nshvi8ci8c8uda74eiaq8', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-05-07 12:23:38pm', '2020-05-07 12:24:34pm'),
(24, 1, '5o5s9dbsjsbtkfursgc563283f87pbrj', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-05-07 12:27:18pm', '2020-05-07 12:27:59pm'),
(25, 1, 'iquvtbiq3jd7da09hh5lqda9pkio9sm8', '::1', 'Chrome', 'Windows 10', 'Computer', '2020-05-07 06:06:18pm', NULL),
(26, 1, 'aaqtqf3ffq8r0tc71sq0iqnnugvur5l3', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-05-07 11:26:06pm', NULL),
(27, 1, 'somsd8i3pkmm7sgkc30a4ldui29d5m56', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-05-09 12:21:45am', NULL),
(28, 1, 'o29vmhcu36r09g3f9r48ai5h0t28q9gg', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-05-09 05:34:06am', NULL),
(29, 1, 'sprk152rnspcpq8ur426ieatj5b5jrq3', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-05-09 03:06:10pm', NULL),
(30, 1, 'kf8140v6tbf5q50q5lbub47p139lgf86', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-05-09 11:24:04pm', NULL),
(31, 1, 'oij6vd4sns3eb4cp35jcv2iqnknfkkpu', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-05-10 01:31:19am', NULL),
(32, 1, 'qbvg51ihtcsrqvj4tsjs3nnoirjko6av', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-05-10 03:41:35pm', NULL),
(33, 1, 'invsp6b8jr7f35jk7mg0il6m0q35p6ch', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-05-11 06:02:41am', NULL),
(34, 1, 'fjgah76ut01lnbvkfhq0b2gga7bk8kcu', '::1', 'Chrome', 'Windows 10', 'Computer', '2020-05-11 11:04:45pm', NULL),
(35, 1, 'ndmeklc2fs3i8lopdr1ffm0gth8528d4', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-05-11 11:20:48pm', NULL),
(36, 1, 'g6j0hgrng1d0l9e94vk37su8l6ao7raq', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-05-12 12:39:16am', NULL),
(37, 1, 'ud13sr8ah0vn8itf46c41uk8dqqucabm', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-05-13 05:28:41am', NULL),
(38, 1, '45q92lldr1m095mrt593nbc90qpr37s0', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-05-13 04:08:55pm', NULL),
(39, 1, '7d8om8pc0fe28hc2n13u2m22rqm9bjhj', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-05-16 09:38:06pm', NULL),
(40, 1, 'v9tefnhmrdtph708nandd5ha9rkcuu3v', '::1', 'Chrome', 'Windows 10', 'Computer', '2020-05-20 04:14:45am', NULL),
(41, 1, 'nsrpu3skr714vg0oe5q55p32cskqbdre', '::1', 'Chrome', 'Windows 10', 'Computer', '2020-05-27 12:41:02am', NULL),
(42, 1, '7v0b791bjhbo6htq1301qcerd733744j', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-07-02 12:28:53am', NULL),
(43, 1, '2faais4enjd4jrl8chm2qeas6ii0mi70', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-07-15 11:02:19pm', NULL),
(44, 1, 'as2birppbd07crmop4osrja5mta3scid', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2020-09-09 11:37:56am', '2020-09-09 11:39:03am'),
(45, 1, 'sebm94vp0ecm0431ejk67in4kmhna210', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-09-09 08:23:53pm', NULL),
(46, 1, 'bb9heu8b09nueao486nmkt5jg2960h4c', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-09-25 04:33:12am', NULL),
(47, 1, 'pl3ut7p3alarpnbaji9f3q065bt3ilb0', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-09-25 06:00:50am', NULL),
(48, 1, 'hlsl8bm65rnldjsjra7cqtbg8m8mhdt1', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-09-26 04:06:01am', NULL),
(49, 1, 'ok0prs8sufngur52dfphb6qqaus3hntf', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-09-28 02:03:13am', NULL),
(50, 1, '2jv4fbklkuc9c6kj6gbgadqf9kolltc0', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-05 02:51:26am', NULL),
(51, 1, '21e487sf3vkmlk8invkm1sic2u2np0ad', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-05 03:19:02am', '2020-10-05 03:20:12am'),
(52, 1, 'b9vstjmv5sut1vgqa1nvjd56i7ud1s22', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-05 03:23:50am', NULL),
(53, 1, 'qifvtrgjdnemj5j6mf6octvff5qhkhq5', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-05 04:12:23am', NULL),
(54, 1, 'qifvtrgjdnemj5j6mf6octvff5qhkhq5', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-05 04:13:05am', NULL),
(55, 1, 'qifvtrgjdnemj5j6mf6octvff5qhkhq5', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-05 04:14:18am', NULL),
(56, 1, 'qifvtrgjdnemj5j6mf6octvff5qhkhq5', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-05 04:14:28am', NULL),
(57, 1, 'ah5bbo6c9m52hlkb6n5f9n1ajs9smfbi', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-05 05:40:14am', NULL),
(58, 1, 'gqkgq2l4pk0o37l724kjtp3aktr98n5g', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-06 10:14:31pm', NULL),
(59, 1, 'palercb60rnkehvnfosrrtkf5c3mg0s3', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-07 01:38:33am', NULL),
(60, 1, 'av07k8bjqenki9hou7qai692435q3ob4', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-07 12:36:09pm', NULL),
(61, 1, 'gq61ids6qmogq0930tapbmpu7hbo2ubi', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-08 01:28:17am', NULL),
(62, 1, 'upb2kgjsqeip15guq4iiqcjb5mjdcsoq', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-09 03:18:25am', NULL),
(63, 1, '81uqcdtfa2aqovo5ogjothp5ne9n07pm', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-09 09:26:29pm', NULL),
(64, 1, 'a46j9k8cu4eti1jgtc7l853fghdca7o6', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-10 04:04:38am', NULL),
(65, 1, 'v1rscid2c86eqlr0d8oibncgkkon0mbe', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-12 12:13:20pm', NULL),
(66, 1, 't7ub8qrvhgf9as0plqgl1dpma1i7v6s5', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-14 11:33:33pm', NULL),
(67, 1, '19p1k8188gn44a7sr17ot62lprcj6l9e', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-15 01:52:36am', NULL),
(68, 1, 'ttiv4oql3fp90ku7adsi4v18g1v1bhse', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-15 02:01:50am', NULL),
(69, 1, 'aiobk19ue72hsqep1l7cne73hmgbpiqe', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-15 09:53:37pm', NULL),
(70, 1, '5acvinaqktm0rb51de1ahrgcp46gc6je', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-16 09:16:54pm', NULL),
(71, 1, '85aillm56unn2lampca093n42otm92c6', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-17 01:15:42am', NULL),
(72, 1, 'lptkh02n2sfcrsgfa6fokokefojp11vj', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-17 12:07:18pm', NULL),
(73, 1, '6uo1udb5tqhngfcgf3rlh45d6fj8hlf7', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-18 12:25:53am', NULL),
(74, 1, 'tu8lpk070ngapfl4h7rfkp6aicdou1ra', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-18 02:01:39am', NULL),
(75, 1, '81rtktlts8lqptbeomk8vruqmgfaq0k7', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-18 05:52:09am', NULL),
(76, 1, '654pn1opn5e67o70akouu9rsajm6u70q', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-19 01:46:53am', NULL),
(77, 1, 'vnfks6rlssuqjf61m52rhgn26bc6o2eg', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-19 02:09:58am', '2020-10-19 02:14:04am'),
(78, 1, 'p7dh5qghdmq8266r03c6g4jpj9le1k35', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-19 02:14:17am', NULL),
(79, 1, '0h578eu2aqu831tgs7kfr2ttnj3rmav6', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-19 08:23:30pm', NULL),
(80, 1, 'kua3623up3lo0mu65df021escdti35ju', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-19 08:32:35pm', NULL),
(81, 1, '90uhqeu9d20obromclihpnpt7ro942d5', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-19 08:39:33pm', NULL),
(82, 1, 'pr9hi0dkjt3f3rfjdeo3jf4havjspsr7', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-19 08:50:13pm', NULL),
(83, 1, 'pvacrcdc7u6kfo4vp6g4pc7fp87r7121', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-19 09:43:44pm', NULL),
(84, 1, 'qqgl4dihej76fn7vf1uktj9teq4g0dec', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-20 11:07:01pm', NULL),
(85, 1, 'cujc5pcnrcu3sk6f92s2g3n1st7i4qdd', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-20 02:57:31am', NULL),
(86, 1, 'kaf93gqo3t23emv0oattu8jkn4vh3g5p', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-20 12:16:45pm', NULL),
(87, 1, 'jo9o0fdor1t8od7oludhpoi704c9ofgd', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-21 03:55:09pm', NULL),
(88, 1, 'jo9o0fdor1t8od7oludhpoi704c9ofgd', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-21 05:10:12pm', NULL),
(89, 1, '38do1ssj9r8n9lnfsh22h2oesu8c78a7', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-21 07:10:25pm', NULL),
(90, 1, 'f1opfifuharj24he8ot61gfb563rgmfp', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-21 10:08:08pm', NULL),
(91, 2, '446ifttsh1p5o6b8gs95s7qo0qiomi82', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-22 06:08:13am', NULL),
(92, 1, 'hc05l8dajkfp1o6dnllspkoj5scvim0q', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-22 06:17:08am', NULL),
(93, 2, '0g426jbejmlb2uoom3v80a825l7cquf8', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-22 06:37:32am', '2020-10-22 06:37:46am'),
(94, 1, 'l8281aq1e8aj4l421i6hh2epoqpvojr6', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-22 06:37:55am', NULL),
(95, 1, '8lelirtj3klhq4h3q4t06nq01b1ml4fl', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-23 06:39:04am', NULL),
(96, 1, 'pt49i05ntepts3kp6gf1fmf1c4hebfml', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-24 09:06:11pm', NULL),
(97, 1, 'ip3haum63b1pev3kqnmugiqhvkt1q6mv', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-25 04:21:13am', NULL),
(98, 1, 'bqm9p0i1ruefgdbj6ua1588nbv3cdfc1', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-25 08:50:07am', NULL),
(99, 1, 'rgsfg2298tf4j1p876mntqnpdu2gnmif', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-26 04:36:12pm', NULL),
(100, 1, 'v0ui67lksp4p5cndb7dcptl634e1osf8', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-26 11:24:52pm', NULL),
(101, 2, '5nfe0pdtks3bnsenu0h70j4k4bgo8q9t', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-27 04:26:28am', NULL),
(102, 1, 'cvj21oq2jitphmnfse4d9td1dit68iot', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-27 03:43:43pm', NULL),
(103, 1, 'pb9mr889i3ukp04po5sgt1rgi6ofqeg2', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-28 02:17:06am', NULL),
(104, 1, 'lhvgv299rc7ifenc1bijdhiggj5ssf57', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-28 03:21:52am', NULL),
(105, 1, '0a0krh94q6f2erbe6kb1bvai1bd5thse', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-28 05:50:55pm', NULL),
(106, 1, 'bhigqhha3aab4gbo9q2dt10qu3q0uehh', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-29 12:19:52am', '2020-10-29 12:20:25am'),
(107, 1, 'latu6m9ucdoeit9ej195vn7nb1j96aci', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-29 12:20:35am', NULL),
(108, 1, '4ltnkpg4qtuemo4ill0ukposlk6i8bug', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-29 12:38:09am', '2020-10-28 12:53:41am'),
(109, 1, 'ganl4foeal9m7asci0242k9dfq1209av', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-28 12:53:44am', NULL),
(110, 2, '451tc67gasar3rrnpu866esvlaqrt9p1', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-28 03:36:03am', NULL),
(111, 1, 'qf3i4o1dc2rcrmga692t5g6sj9lqsprb', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-28 07:50:28pm', NULL),
(112, 1, '99a34vbtov9celjemfq6gmcmah9tc82p', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-29 01:57:02am', NULL),
(113, 1, '54mi9jshtr7he0fb4k9fariisfto6l3a', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-29 09:41:03pm', NULL),
(114, 1, 'rt89qh16niqd2aqp11n5hrn6hk8rkjl4', '::1', 'Chrome', 'Windows 10', 'Computer', '2020-10-29 10:07:00pm', NULL),
(115, 1, 'tvabeu3u5i23pgi28e7apobp6eo02c9r', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-30 03:32:27am', NULL),
(116, 1, 'bebejc7phg95c7np7ondbam8s84dhuhd', '::1', 'Firefox', 'Windows 10', 'Computer', '2020-10-31 08:09:14am', NULL),
(117, 1, 'h8m3ff223j94e87tim4adk1p8h3bdrfn', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2020-12-17 12:34:40am', NULL),
(118, 1, 'ee32nmg9mm2spm6d8li3m5tl1iq15kjl', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2020-12-17 07:46:58pm', NULL),
(119, 1, 'b8htutr9fdktd54pdhju520jiithlhp3', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2020-12-18 01:46:42am', NULL),
(120, 1, '8p2nt9eepalblq0h0p599s0vvkf7necj', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2020-12-18 08:51:04pm', NULL),
(121, 1, 'npdrrqnp8r1djfbk568qvg4ig8hpggc4', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2020-12-19 05:24:53pm', NULL),
(122, 1, 'lr4dvn45ggkmlcla8vn5bvo771pd70oa', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2020-12-19 05:36:30pm', NULL),
(123, 1, 'ghqa2s5qs8jlj61bgkggehj88ol2ukne', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2020-12-19 10:07:01pm', NULL),
(124, 1, '2l5l88dn9ipmkv7h5pu9t5ppq4dec90n', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2020-12-21 03:53:56am', NULL),
(125, 1, 'mvs6jmcglpn8asnasfiao4bfgg77obrm', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2020-12-21 01:04:45pm', NULL),
(126, 1, '9n9r9r6i4rk5c7nva8hqc6ik7mq3b9d1', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2020-12-22 01:17:14am', NULL),
(127, 1, '8mij2kbkg827o0s8i79rjr472jj0nj46', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2020-12-22 03:52:42am', NULL),
(128, 1, '231e7oanvcqeckgq12a719i2ludf57ks', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2020-12-22 01:23:28pm', NULL),
(129, 1, 'jgom43m8uiva8nsbrkhthq9lmm1jd0ku', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2020-12-22 11:52:38pm', NULL),
(130, 1, 'o6ekhl7j5cc4qakm8csucrlq74jkdctt', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2020-12-24 01:04:33am', NULL),
(131, 1, 'jr3a6lgf6ld3b0jcnt1d3upk7aflluco', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2020-12-24 06:57:51am', NULL),
(132, 1, 'hj2t59jvkb9ka25intdct64e6rc7dok6', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2020-12-24 10:31:50pm', NULL),
(133, 1, 'piosd768bnge0pkqa6m6k5tomghmpgpm', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2020-12-25 08:27:09pm', NULL),
(134, 1, '4ja7tbcgo5ijsm2ci8mvn29o2pjs11qh', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2020-12-26 04:43:56am', NULL),
(135, 1, 'vkhdrc6q7p8h8jckee1co346ekp1lp43', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2020-12-26 10:49:49pm', NULL),
(136, 1, '5j5jq9vh8o6tq33dn46en5e5ol99h9jd', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2020-12-27 11:14:35pm', NULL),
(137, 1, '23hu43c7ejov05tas7e4biniufvtslje', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2020-12-28 03:31:12pm', NULL),
(138, 1, 'hu9acj7sqh2ibdff7npddt6fj3n21uuh', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2020-12-29 12:40:20am', NULL),
(139, 1, 'bn9brbafaohrj8sf3ahjq7tk45u1fldi', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2020-12-29 10:00:44pm', NULL),
(140, 1, 'bgh7p921a660cg935cm2pg0qqrq264u0', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2020-12-30 01:26:09am', NULL),
(141, 1, '1ip9tq4dtkgdsob0tkjcnegp1v9irjoo', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2020-12-30 12:19:35pm', NULL),
(142, 1, 'f7rsrrchhdmcnvrqs9b9gj526rguhd3k', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2020-12-30 09:29:23pm', NULL),
(143, 1, 'sogscf4rd74mufq490i60tv3hc01opll', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2020-12-31 12:54:44am', NULL),
(144, 1, 'rqbhvoutd5nndi4ciq4h0rhlbipdrebm', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2020-12-31 01:52:44pm', NULL),
(145, 1, 'ceh478kc7n7uuot1ti31m9uqp0of8ajp', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-01-01 02:11:32am', NULL),
(146, 1, 'cpebv36gc47cjhb6c9cop70h9521f02m', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-01-01 06:39:26pm', NULL),
(147, 1, 'rteajdh0gnerogg514crau2fgspckgvp', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-01-01 11:58:09pm', NULL),
(148, 1, 'nfvsdr9iqp84qbj9j0nciaa2pgfnaneb', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-01-04 12:05:23pm', NULL),
(149, 1, 'es4jlm434sdeshm70egr4uaded2c7mlf', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-01-04 07:31:03pm', NULL),
(150, 1, 'i7h1eqf1h4svchl5r20d1npb4ern9qa9', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-01-05 02:41:35am', '2021-01-05 02:45:33am'),
(151, 1, 'ecnkkv5l187tppm844p0ru9bi3foqdqg', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-01-05 01:53:58pm', NULL),
(152, 1, '1o7kmv27nrpd9hkll72isgbatkdqbk4g', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-01-06 01:27:30am', NULL),
(153, 1, '4ebrjvmlpunpga4sdu1m5eujhf5euriq', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-01-06 06:03:07pm', NULL),
(154, 1, 'emke6kbq2vpc4sc8r2ficlgvgdp7mdvb', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-01-07 05:22:45pm', NULL),
(155, 1, '5dj08p41m970117s87d9sfg7285q33qe', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-01-07 10:41:19pm', NULL),
(156, 1, 'qmv249mg19p5af8nffh6t1fs3rtksg1b', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-01-08 05:30:09pm', NULL),
(157, 1, '900ogppvqt02mdbcddjdloa0hufnp9mm', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-01-09 03:54:10pm', NULL),
(158, 1, '900ogppvqt02mdbcddjdloa0hufnp9mm', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-01-09 05:01:33pm', NULL),
(159, 1, 'jhvofbil8ckpeg0bcp0hmdijg67r1qjv', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-01-10 11:13:55pm', NULL),
(160, 1, 'otbdee2ct7ccpluincu8haed21a72udi', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-01-11 11:25:15am', NULL),
(161, 1, 'i6kug8mrta050hcvvlrq5f311uuargj4', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-01-11 08:39:04pm', NULL),
(162, 1, 'ccu81e043nt3n4jenl4gr9gbivn9p9mi', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-01-12 01:40:47am', NULL),
(163, 1, 't1slu5ltccuniilblkm9qeo9hv5is9iu', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-01-12 05:42:36pm', NULL),
(164, 1, 'odfrgbvfrr8l4v112e841ag5jc420sk1', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-01-12 09:03:44pm', NULL),
(165, 1, '7kurr5ei3oa5pcu4lqr5eofao8p7e4vk', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-01-13 08:47:19am', NULL),
(166, 1, '9uogsdl75lu0agiq3voooe4fdo73c914', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-01-13 03:21:34pm', NULL),
(167, 1, 'k0kalcvspaj265a5df26p8cgpemcn62d', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-01-13 05:51:30pm', NULL),
(168, 1, 'tmtd1arajf1v3m0hrd7buf0vea0oiuog', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-01-14 05:44:18pm', NULL),
(169, 1, '8bb9huo1mm9sj4unb9m4vanuiurkcsek', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-01-15 01:46:41am', NULL),
(170, 1, 'k8h4auv0bi0e22agbonmu9f0q3sj0nhn', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-01-15 09:27:03pm', NULL),
(171, 1, 'fuvg6b22ket8gm8m99hvdv2t27vd89d5', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-01-16 02:35:51am', NULL),
(172, 1, '4uaohi334hhh5fqirdtdr8f0d1cv9vjb', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-01-17 01:04:10am', NULL),
(173, 1, 'f3e2d3ii1glcp0916nu8j67qauijc6ae', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-01-17 01:37:14am', NULL),
(174, 1, '8dsrcdotaun62p1cn4ge78hodesmraus', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-01-18 12:01:55am', NULL),
(175, 1, '7d6ahsu5m9c6uhgnv7l89350j81isspg', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-01-18 12:59:23pm', NULL),
(176, 1, 'eqrudr2cso4vqmj90onpomh6efq04mia', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-01-18 09:42:39pm', NULL),
(177, 1, '856j4es88hv6v6c9j951of7h26od25m8', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-01-19 05:51:18pm', NULL),
(178, 1, '60e8sfq85r8avidimf2996os9cvsmdlc', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-01-21 07:26:38pm', NULL),
(179, 1, '0ag5jk2790hc768t8ra92jbgeidsbmut', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-01-21 07:42:31pm', NULL),
(180, 1, 'cgplj5540g1o1qp9bkgcl52v10bcrk4h', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-01-21 10:00:18pm', NULL),
(181, 1, 'qp4kkvarb5dsnv86suouafalou7jq36l', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-01-22 05:36:00am', NULL),
(182, 1, 'nj26b0kg13fn8fqu9kdnucm46ui04lji', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-01-24 12:05:19am', NULL),
(183, 1, 'gkijknnt91gdec7s9tmdvho2lt3rn07t', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-01-24 06:02:09am', NULL),
(184, 1, '1nookqhhb55eol6v58s2skrptqccpcmm', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-01-25 06:43:51pm', NULL),
(185, 1, 'ljnn5s55fs7iao6prbcbeb7gus070nru', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-01-26 10:38:51pm', NULL),
(186, 1, 'hutq3uiv04s0rq2jrmdfonlh6u6l4o2j', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-01-27 09:20:23am', NULL),
(187, 1, 's2ctkdt76hqq8joo7ct77119jubd7ds2', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-01-27 11:38:02am', '2021-01-27 11:39:07am'),
(188, 1, 'na2sgkqstdvh8asn6mjeke2b09uu7lgl', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-01-27 02:07:26pm', NULL),
(189, 1, 'r3864se1r6pa033ala83pr7t95fje3tn', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-01-27 09:31:37pm', NULL),
(190, 1, '63a50teiqrk8dp7hguftptoq0uahpf8c', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-01-28 12:35:10pm', NULL),
(191, 1, '8ts09jdf651dfpo8dnb9qt3rl5pfd2ce', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-01-29 09:14:44pm', NULL),
(192, 1, 'h0k5d2k2vfgkmnpj0552vbro9bh2pjmt', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-01-30 03:25:41pm', NULL),
(193, 1, 'c72morrqcpnimrhe4d2u6okqkp02toc5', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-01-30 04:09:05pm', NULL),
(194, 1, 'ffoh82e17p9s3ifi176sb1973epcbkl4', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-02-01 09:47:25pm', NULL),
(195, 1, 'd7te0mk71nq07cvcfekaerlmok8994vd', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-02-02 07:00:42pm', NULL),
(196, 1, '726sm0pgugtvflrtsl7q6qge88poueh1', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-02-03 11:26:10am', NULL),
(197, 1, '5tiqlksouf0bhilq1s6b22r4dlvf90og', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-02-03 01:28:14pm', NULL),
(198, 1, 'oofjmign06b06h8j0cqcqe5qh0vtodm3', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-02-04 06:43:16pm', NULL),
(199, 1, 'fnahemfgnkfjjhe91d2voklittivvk77', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-02-05 12:11:40am', NULL),
(200, 1, 'a2h0c9vd76d0bbbmu1daa2orjcrn1ljo', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-02-05 06:25:36pm', NULL),
(201, 1, 'po7hjcbbmij4ungrmh9gbfpkb3vfbe4m', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-02-05 11:56:41pm', NULL),
(202, 1, 'dtpaptht80ih61geju0q2a59v6k90vh9', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-02-06 12:06:54am', NULL),
(203, 1, 'atolt2l5qiaeheoph35nnd12smjeqobn', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-02-06 08:42:00am', NULL),
(204, 1, 'fnmpmnthge9i9nl4mhtc82akd98bsofn', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-02-10 12:15:14am', NULL),
(205, 1, 'n52bl7q2crpjihuq8ggr40sach4ffeem', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-02-10 04:26:38pm', NULL),
(206, 1, 'rk91abf564e3tdt232b3cfgeerm8f9q8', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-02-11 05:05:23am', NULL),
(207, 1, 'im29efrfd8o2bd6agtpn6hj868m9n5hf', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-02-11 07:36:24pm', NULL),
(208, 1, 'tgisdqtm76uj50c0vcib482jlpo8qe6t', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-02-11 11:44:02pm', NULL),
(209, 1, '6n4v7cba1pshbipvk8fqoohv3aklv1co', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-02-12 12:08:18am', NULL),
(210, 1, 'ou7ki0a69a9g8er60t7e2ttldttk5cdp', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-02-12 12:20:27am', NULL),
(211, 1, '9pgpbkjao1b8dgv4aoabfmc6ro5g596e', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-02-12 07:14:05pm', NULL),
(212, 1, '78658tgch0tfe8reqlqh73fgjr1u7nvk', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-02-13 02:06:12am', NULL),
(213, 1, '38dbliceukbep2cchf849lmlvs20rs2l', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-02-13 04:11:40am', NULL),
(214, 1, 'ko0diuudjg4157ul6kh1mekaj6t2u183', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-02-15 09:10:00pm', NULL),
(215, 1, '51bh0ahfhgtp8g84tkrpe1qi96cu9ja2', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-02-19 02:08:37am', NULL),
(216, 1, 'looj45tukfhbreo0pgdk3vqt986blo8t', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-02-19 03:56:20pm', NULL),
(217, 1, '0e7627ppgnppd1ga8p4cd8e8m7psh61t', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-02-19 07:23:24pm', NULL),
(218, 1, '4j5rgh2gldbpueren5uugrtvivs4ff8r', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-02-22 03:07:17pm', NULL),
(219, 1, 'a11gipvt95l4qa48o8k8dk4sg4m815nq', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-03-15 06:10:13pm', NULL),
(220, 1, '00qlf2nsre489megf0ar275mmqt6iu7e', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-03-15 10:29:30pm', NULL),
(221, 1, 'bm0td6j2uq9btf6dnmesacj44smdmq35', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-03-18 10:06:47pm', NULL),
(222, 1, '61o3d54ln3r28fb3lukktvpkaj06kqa2', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-04-07 06:26:32pm', NULL),
(223, 1, '7kvon9bemmmv3n32f2ack3gik5mricrb', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-04-07 09:30:23pm', NULL),
(224, 1, '3nsoiflvha2vm7mhlocf176klf1f2mlb', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-04-08 10:04:57pm', NULL),
(225, 1, 't7f6gqpct927fvhcqccmdmk3qlfd0flk', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-04-10 12:51:13pm', '2021-04-10 12:52:36pm'),
(226, 1, 'jmbp6ptk0tf16o6spo0qfsu2ktl34mbl', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-04-12 03:07:17am', NULL),
(227, 1, '0078m5vbno01narma6hpj618fv4utq5o', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-04-13 04:46:09pm', NULL),
(228, 1, 'riv5bsvraksj7i90pce485th4nj8n3n9', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-04-14 05:37:46am', NULL),
(229, 1, 'vetfno88pht80f5nd0erqq9amad8a8ri', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-04-15 04:41:35am', NULL),
(230, 1, 'c83vre4t6igs9c4qlfrjq4kr1me1m2b0', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-04-16 01:20:38am', NULL),
(231, 1, 'leqrqc26enmspeur13vbik0p9glr6g1e', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-04-24 01:47:36am', NULL),
(232, 1, 'pj0hfarhoa4nb0ha3ne8b9mbkijdu50g', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-05-08 02:42:34pm', NULL),
(233, 1, 'f9du0n7c03frkek7nkno10heag0ivdj7', '127.0.0.1', 'Firefox', 'Windows 10', 'Computer', '2021-05-25 02:32:53pm', NULL),
(234, 1, 't8qmgu1smlg8dehetap9k12ract898h3', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-06-08 01:21:32pm', NULL),
(235, 1, '8hicvdv7jvtctsnc37029v0jtrjs7r3u', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-07 01:03:30pm', NULL),
(236, 1, 'mrodniasap52h924hnfvkm7e870ahgcp', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-07 01:20:27pm', NULL),
(237, 1, 's1h93kp2shujvpvrh0nnk2lm19p74e4g', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-07 02:02:12pm', NULL),
(238, 1, 'vs67ifjc8k7jl547j9j1snq5b0aa3jma', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-07 04:30:00pm', '2021-08-07 04:30:06pm'),
(239, 1, '49dk8atbpsegv2egqqq7drfdvqj5cih2', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-07 04:32:09pm', '2021-08-07 04:32:19pm'),
(240, 1, 'kur08mdn87o6d3acum31th2hld61dnaj', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-07 04:32:25pm', NULL),
(241, 1, 't2j45vcq3odu9cm22p5shks5gvo9vg2l', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-07 10:01:38pm', NULL),
(242, 1, 'bvknnidk8s23n8osabr7i1iugddh68kr', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-07 11:16:04pm', NULL),
(243, 1, 'gskjq11to77etp861g1at8cgls8mg3a3', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-08 12:17:54pm', NULL),
(244, 1, '2gdn16ejgn3hn0150lfpsh94uq2ql3in', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-08 04:14:14pm', NULL),
(245, 1, 'a00no022hatp5eo4ggcgpqdpoae4qfv3', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-09 12:07:14pm', NULL),
(246, 1, 'jvkcuk7ran8uhmb7qucuc913776hjgq2', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-09 02:01:36pm', NULL),
(247, 1, 'pp1jmkc710ph5o3ehtjeepk6dfusinhf', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-09 03:20:11pm', NULL),
(248, 1, '9nrhg9khljjsc95noj1g4qjtjksg2mae', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-09 09:12:38pm', NULL),
(249, 1, 'uonjr28tchqe9r6hg0pg0lebvi17tc6j', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-10 06:07:05pm', NULL),
(250, 1, 'kb6t1mc2n33ukm2lgu6mn96g30rp5nqf', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-10 08:42:26pm', '2021-08-10 08:42:39pm'),
(251, 1, '84qlfoijsei5t68g2k46fodi6cim49kr', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-10 09:50:40pm', NULL),
(252, 1, 'bg44dusho71un7jdgtikc7b2q739uudn', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-10 09:54:26pm', '2021-08-10 09:55:36pm'),
(253, 1, 'qpkh20ed0p6frbc14ptuh4b6fdae6bq5', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-10 10:06:28pm', NULL),
(254, 20, 'naq4btmpnlf79go90cbbpn01kocgon1i', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-11 12:19:05am', NULL),
(255, 21, 'guh9dq778okjkgimvkbg6ouep3bauvhp', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-11 12:41:22am', '2021-08-11 12:41:45am'),
(256, 21, 'vnh3q81b9phtoop7tieolsi113mlpaqr', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-11 12:42:46am', '2021-08-11 12:46:03am'),
(257, 1, '1albipjfijv8rc64u0vs4l1q7knq8ss8', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-11 12:46:20am', '2021-08-11 12:46:45am'),
(258, 21, 'hrdtog9m890d66mm0g3bh7n1kr41nctr', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-11 12:46:58am', NULL),
(259, 1, '9tbasfmm70aod2qe9or04t0ettg1hmdo', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-11 01:37:22am', NULL),
(260, 1, 'a11ee2a6ff5118c7bbded34005a8618d35e3edb0', '182.189.198.157', 'Firefox', 'Windows 10', 'Computer', '2021-08-11 08:40:21pm', '2021-08-11 08:40:28pm'),
(261, 22, 'b8efe4679766556059a193d065be456dbe942a3c', '182.189.198.157', 'Firefox', 'Windows 10', 'Computer', '2021-08-11 08:41:54pm', NULL),
(262, 1, '156a2d83fc84f861c76d004f49e0226c427921ae', '182.189.198.157', 'Firefox', 'Windows 10', 'Computer', '2021-08-11 08:47:45pm', '2021-08-11 08:50:15pm'),
(263, 1, 'f2dc9474e6c89c22d7676e07d7f87d9e00a7c751', '182.189.198.157', 'Firefox', 'Windows 10', 'Computer', '2021-08-11 08:51:51pm', '2021-08-11 08:53:09pm'),
(264, 1, 'ad6b0bf5bc1ae3743d0f43431172e3673f1e6f2c', '182.189.198.157', 'Firefox', 'Windows 10', 'Computer', '2021-08-11 08:56:37pm', '2021-08-11 08:57:02pm'),
(265, 1, 'f3360f28b67e99c4aad9a6e702461efa5441b02e', '182.189.198.157', 'Firefox', 'Windows 10', 'Computer', '2021-08-11 08:59:40pm', NULL),
(266, 1, '345308146629e6afe068b38cf491ce1220804398', '205.209.24.227', 'Chrome', 'Mac OS X', 'Computer', '2021-08-12 12:07:45am', NULL),
(267, 23, '3c5632dfab31a7d43e4b7e4cb3c54d6bd30e2faa', '205.209.24.227', 'Chrome', 'Mac OS X', 'Computer', '2021-08-12 02:04:27am', NULL),
(268, 23, '636b75f24a72a81c586a509ee013c91255393255', '205.209.24.227', 'Chrome', 'Mac OS X', 'Computer', '2021-08-12 02:04:47am', NULL),
(269, 1, '6d41645096769e4100289f11b627db2947f8d5ea', '111.119.183.61', 'Firefox', 'Windows 10', 'Computer', '2021-08-12 02:30:59am', '2021-08-12 02:31:25am'),
(270, 1, '168c35a6b1fd17c6aa8d6549c6a5d5afb224bd6e', '205.209.24.227', 'Chrome', 'Mac OS X', 'Computer', '2021-08-12 03:09:10am', '2021-08-12 03:09:28am'),
(271, 23, '189e3c99278077232adce2d4ebc144c429e3f079', '205.209.24.227', 'Chrome', 'Mac OS X', 'Computer', '2021-08-12 03:09:41am', NULL),
(272, 24, 'pm0q73fb0hcae3u58fvs4b68f09ss26f', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-12 02:25:05pm', NULL),
(273, 24, 'f5c8302ii6cr48o1crdg4dukk1sb3tkh', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-12 03:26:27pm', '2021-08-12 03:27:25pm'),
(274, 24, 'b5iqbg9dl5njnfdve6rglvop89lsfr5f', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-12 03:28:45pm', '2021-08-12 03:29:16pm'),
(275, 24, '48crg7ig2rvdej8i9lsi16hr8ftck485', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-12 03:46:45pm', NULL),
(276, 24, '2qd86abhlbg87kkudgo2617g15l5vduc', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-12 04:54:20pm', NULL),
(277, 24, '2qd86abhlbg87kkudgo2617g15l5vduc', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-12 04:57:31pm', NULL),
(278, 1, 'hbooj3ai72pe47l1tduaqgdo1gs0lh86', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-12 08:07:43pm', NULL),
(279, 1, 'ifds4e73ieehbi1ldr614cv8hljne2ge', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-12 08:21:54pm', NULL),
(280, 1, 'ar1hc1v3lppmm7u8rgqkkuedqelj7u6r', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-12 09:14:05pm', '2021-08-12 09:14:10pm'),
(281, 1, 'baok4rou09d8ggcum3d3o40380er4mrn', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-12 09:56:58pm', NULL),
(282, 24, '2bfpt4t0ulffbl77pviil7863e8t7v9u', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-12 10:04:45pm', NULL),
(283, 27, '39c75kug9vpv03ofhomf4c5hm0aijss8', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-12 10:45:41pm', NULL),
(284, 24, 'vmh4h25q9p107i57cq49o871un3401pf', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-13 11:02:30am', NULL),
(285, 24, 'i019vfnbhsdjpcq6bv7pnl86fkergi7h', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-13 11:12:09am', '2021-08-13 11:12:15am'),
(286, 28, 'kleciqdkf7t9dnlo5aejqv8peet83dv7', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-13 11:13:12am', NULL),
(287, 1, 'v551ngpiejtoud84bseeaifk9jb85obu', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-13 11:45:20am', NULL),
(288, 29, '1pbppntm70mvngdekcuhhlpne8hpgte2', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-13 12:18:40pm', '2021-08-13 12:20:30pm'),
(289, 1, 'orblsh0hlpbpu9a5gk618m2611k27jc1', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-13 12:20:33pm', NULL),
(290, 1, 'anuppncvnlut35btbhd1b600osu3ug5g', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-13 12:39:39pm', NULL),
(291, 28, 'nt1kt83roij4ablddfojpbnn443qo89a', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-13 12:49:03pm', NULL),
(292, 28, 'nt1kt83roij4ablddfojpbnn443qo89a', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-13 12:49:15pm', NULL),
(293, 29, 'v3p9i2b3o3lfamd14dtnn9gn35m7kqhq', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-13 01:14:46pm', NULL),
(294, 1, 'in9dvsuru70v7l7p69n1gfnncsr4keic', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-13 02:58:33pm', NULL),
(295, 32, '5hlj01sj80pr0h4fep1oit0rask8sbd7', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-13 05:52:40pm', NULL),
(296, 28, 'tu1gmd48178fmfb2hktfr0d59uoirtvu', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-13 06:00:53pm', '2021-08-13 06:04:00pm'),
(297, 32, 'd46ttd2b0boghjnbvokfj93nk4iojpfs', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-13 06:04:19pm', NULL),
(298, 28, 'ilrr3fhkc239b0k9h23ts80rq0d0psp9', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-13 07:18:02pm', '2021-08-13 07:21:16pm'),
(299, 32, 'eodvu1ed11ujjbqh6vnhvulr6c3omrbl', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-13 07:21:28pm', NULL),
(300, 1, 'c792tsate3a0e590saoeljhc80sabh5h', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-13 08:30:09pm', '2021-08-13 08:31:48pm'),
(301, 28, '00a2tfoiohgciaa5fbigip1pfi36sgpf', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-13 08:31:54pm', '2021-08-13 08:32:28pm'),
(302, 28, 'f1hnnnptg7289v5ja9gauqt3g5bob13s', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-13 08:32:31pm', NULL),
(303, 28, '5nnpc2f6hojlp08qbuopjug6vfis6m91', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-13 08:48:06pm', NULL),
(304, 28, 'prh71b3ahniso67qtv74cl0br8o2qmt9', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-14 01:18:02pm', '2021-08-14 01:18:48pm'),
(305, 1, 'p4pk0uk4o21jl9qrtq6e1bjqb0dm33eo', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-14 01:18:52pm', NULL),
(306, 28, 'ni2hmrdfq6r98h1dv6t33vsriunij1bl', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-14 01:40:02pm', '2021-08-14 01:42:37pm'),
(307, 1, '8gfa4v70srp7fc9klucfao616q45rh4h', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-14 01:48:20pm', '2021-08-14 01:49:11pm'),
(308, 28, '64o5corr3348mlueft22cj2c6ntphn4q', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-14 01:49:15pm', NULL),
(309, 28, 'e3tih576qmmk7qu5uam1q2c78tpgmpga', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-14 01:57:47pm', NULL),
(310, 28, 'tbgb6ankk9r71r28oaim7bjmp7vepq4f', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-14 08:09:09pm', NULL),
(311, 1, '0oof84b1vp43aa4gne39i2bubo3g781t', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-14 08:09:50pm', '2021-08-14 08:11:41pm'),
(312, 28, 'nnq3diqo7es4etlgk6prhmotou6j1pub', '::1', 'Chrome', 'Windows 10', 'Computer', '2021-08-14 08:11:44pm', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_permission`
--

CREATE TABLE `user_permission` (
  `per_id` int(11) NOT NULL,
  `group_id` tinyint(2) NOT NULL,
  `main_menu_id` int(11) DEFAULT NULL,
  `permission` enum('NO','YES') DEFAULT NULL,
  `sub_menu_id` int(11) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `added_by` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_permission`
--

INSERT INTO `user_permission` (`per_id`, `group_id`, `main_menu_id`, `permission`, `sub_menu_id`, `date_time`, `added_by`) VALUES
(1, 1, 1, 'YES', 2, '2021-08-10 20:33:43', 'Syed Asad'),
(2, 1, 3, 'YES', 4, '2021-08-10 20:36:54', 'Syed Asad'),
(3, 1, 5, 'YES', 6, '2021-08-10 22:36:14', 'Mohammad'),
(4, 2, 7, 'YES', 8, '2021-08-11 00:16:52', 'Mohammad');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` tinyint(4) NOT NULL,
  `first_name` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '''0=female'',''1=male''',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `first_name`, `middle_name`, `last_name`, `contact`, `email`, `whatsapp`, `dob`, `address`, `image`, `gender`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 25, 'hassan', NULL, 'aftab', '03042249657', NULL, NULL, '08/24/2021', '', '', '', '2021-08-12 17:39:08', NULL, NULL),
(2, 26, 'hassan', NULL, 'aftab', '03042249657', NULL, NULL, '06/16/2020', '', '', '', '2021-08-12 17:43:41', NULL, NULL),
(3, 27, 'hassan', NULL, 'aftab', '03042249657', NULL, NULL, '06/30/2021', '', '', '1', '2021-08-12 17:44:45', NULL, NULL),
(4, 28, 'hassan', '212121', 'Pash', '03042249657', 'hassan.aftab2244@gmail.com', '123123', '03/23/2021', 'street 2', '770b5be5762e7bb3e58fa787831428cd.jpg', '1', '2021-08-13 06:13:07', NULL, NULL),
(5, 29, 'hassan', '3e233', 'aftab', '03042249657', 'hassan.aftab@gmail.com', '3232', '08/04/2021', 'dsfdsfdsf', '', '1', '2021-08-13 07:18:26', NULL, NULL),
(6, 1, 'syed', 'asad', 'iqrar', '0304340334', NULL, NULL, NULL, '', '', NULL, '2021-08-13 10:07:16', NULL, NULL),
(7, 30, 'hassan', NULL, 'hasdasd@gmail.com', '5435354353', 'hasdasd@gmail.com', NULL, NULL, '', '', NULL, '2021-08-13 12:02:02', NULL, NULL),
(8, 31, 'hassan', NULL, 'hassan.aftab2244@gmail.comss', '34324324', 'hassan.aftab2244@gmail.comss', NULL, NULL, '', '', NULL, '2021-08-13 12:02:37', NULL, NULL),
(9, 32, 'hassan', NULL, 'aftab', '121212121', 'hassan@gmail.com', NULL, '08/16/2021', '', '5ef9132ca121dde7a7061992ddbbbe9b.jpg', NULL, '2021-08-13 12:51:57', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `company_information`
--
ALTER TABLE `company_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_settings`
--
ALTER TABLE `email_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_login_attempts`
--
ALTER TABLE `failed_login_attempts`
  ADD PRIMARY KEY (`fla_id`);

--
-- Indexes for table `failed_otp_attempts`
--
ALTER TABLE `failed_otp_attempts`
  ADD PRIMARY KEY (`foa_id`);

--
-- Indexes for table `fonts`
--
ALTER TABLE `fonts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `login_otp`
--
ALTER TABLE `login_otp`
  ADD PRIMARY KEY (`login_otp_id`);

--
-- Indexes for table `login_settings`
--
ALTER TABLE `login_settings`
  ADD PRIMARY KEY (`login_setting_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus_routes`
--
ALTER TABLE `menus_routes`
  ADD PRIMARY KEY (`route_id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`registration_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `user_permission`
--
ALTER TABLE `user_permission`
  ADD PRIMARY KEY (`per_id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_profile_user_id_index` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `log_id` int(22) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_information`
--
ALTER TABLE `company_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `email_settings`
--
ALTER TABLE `email_settings`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_login_attempts`
--
ALTER TABLE `failed_login_attempts`
  MODIFY `fla_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_otp_attempts`
--
ALTER TABLE `failed_otp_attempts`
  MODIFY `foa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fonts`
--
ALTER TABLE `fonts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login_otp`
--
ALTER TABLE `login_otp`
  MODIFY `login_otp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login_settings`
--
ALTER TABLE `login_settings`
  MODIFY `login_setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `menus_routes`
--
ALTER TABLE `menus_routes`
  MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `registration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=313;

--
-- AUTO_INCREMENT for table `user_permission`
--
ALTER TABLE `user_permission`
  MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
