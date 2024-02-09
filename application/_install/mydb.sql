-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2021 at 09:19 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `availability`
--

CREATE TABLE `availability` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `availability`
--

INSERT INTO `availability` (`id`, `date`, `from`, `to`) VALUES
(26, '2021-03-20', 60, 180),
(27, '2021-03-20', 240, 300),
(28, '2021-03-20', 180, 240),
(29, '2021-03-20', 60, 180),
(30, '2021-03-20', 240, 300),
(31, '2021-03-19', 960, 1080),
(32, '2021-03-20', 900, 960),
(33, '2021-03-20', 960, 1080),
(35, '2021-03-21', 840, 960),
(36, '2021-03-25', 780, 900),
(37, '2021-03-26', 960, 1080),
(38, '2021-04-02', 540, 600),
(39, '2021-04-10', 720, 780),
(40, '2021-04-15', 480, 660),
(41, '2021-04-23', 720, 780),
(42, '2021-04-23', 600, 720),
(43, '2021-04-29', 420, 540),
(44, '2021-04-21', 360, 480),
(45, '2021-04-22', 360, 600),
(46, '2021-04-30', 780, 840),
(47, '2021-04-17', 420, 600);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `header` varchar(500) NOT NULL,
  `body` text NOT NULL,
  `seen` tinyint(4) NOT NULL DEFAULT 1,
  `seen_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `sender_id` int(11) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `send_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `header`, `body`, `seen`, `seen_date`, `sender_id`, `subject_name`, `send_date`) VALUES
(14, 'Session Request', 'have requested a session of yours', 0, '2021-04-16 21:17:42', 1, 'php', '2021-03-20 11:11:00'),
(15, 'Session Request', 'have requested a session of yours', 0, '2021-04-16 21:17:42', 1, 'php', '2021-03-20 12:14:23'),
(16, 'Session Request', 'have requested a session of yours', 0, '2021-04-16 21:53:15', 1, 'math', '2021-03-20 22:30:48'),
(17, 'Session Request', 'have requested a session of yours', 0, '2021-04-16 21:53:15', 1, 'math', '2021-03-20 22:30:48'),
(18, 'Session Request', 'have requested a session of yours', 0, '2021-04-16 21:53:15', 1, 'math', '2021-03-20 22:30:48'),
(19, 'Session Request', 'have requested a session of yours', 0, '2021-04-16 21:53:15', 1, 'probabilities', '2021-03-20 22:30:48'),
(20, 'Session Request', 'have requested a session of yours', 0, '2021-04-16 21:53:15', 4, 'math', '2021-03-20 22:30:48'),
(21, 'Session Request', 'have requested a session of yours', 0, '2021-04-16 21:53:15', 4, 'math', '2021-03-20 22:30:48'),
(24, 'Teacher Response', 'have REJECTED your session request on course ', 1, '2021-04-16 21:57:27', 3, 'probabilities', '2021-03-20 22:13:41'),
(25, 'Teacher Response', 'have APPROVED your session request on course ', 0, '2021-04-15 19:51:42', 3, 'math', '2021-03-20 22:30:26'),
(26, 'Session Request', 'have requested a session of yours', 1, '2021-04-16 22:07:10', 1, 'WEB design', '2021-03-20 22:50:16'),
(27, 'Session Request', 'have requested a session of yours', 1, '2021-04-16 22:07:10', 4, 'WEB design', '2021-03-20 22:50:16'),
(28, 'Session Request', 'have requested a session of yours', 0, '2021-04-16 21:53:15', 1, 'math', '2021-03-20 23:03:11'),
(29, 'Session Request', 'have requested a session of yours', 0, '2021-04-16 21:53:15', 1, 'probabilities', '2021-03-20 23:03:27'),
(30, 'Session Request', 'have requested a session of yours', 0, '2021-04-16 21:53:15', 4, 'probabilities', '2021-03-20 23:04:29'),
(31, 'Session Request', 'have requested a session of yours', 0, '2021-04-16 21:53:15', 5, 'math', '2021-03-20 23:05:10'),
(32, 'Session Request', 'have requested a session of yours', 0, '2021-04-16 21:53:15', 5, 'probabilities', '2021-03-20 23:05:16'),
(33, 'Teacher Response', 'have REJECTED your session request on course ', 0, '2021-04-15 19:51:42', 3, 'math', '2021-03-20 23:55:36'),
(34, 'Teacher Response', 'have REJECTED your session request on course ', 1, '2021-04-16 21:57:27', 3, 'math', '2021-03-20 23:55:36'),
(35, 'Teacher Response', 'have REJECTED your session request on course ', 0, NULL, 3, 'math', '2021-03-20 23:55:36'),
(36, 'Teacher Response', 'have APPROVED your session request on course ', 1, '2021-04-16 21:57:27', 3, 'probabilities', '2021-03-20 23:55:36'),
(37, 'Teacher Response', 'have APPROVED your session request on course ', 0, '2021-04-15 19:51:42', 3, 'probabilities', '2021-03-20 23:55:36'),
(38, 'Teacher Response', 'have APPROVED your session request on course ', 0, NULL, 3, 'probabilities', '2021-03-20 23:55:36'),
(39, 'Teacher Response', 'have APPROVED your session request on course ', 1, '2021-04-16 21:57:27', 7, 'WEB design', '2021-03-21 00:13:41'),
(40, 'Teacher Response', 'have APPROVED your session request on course ', 0, '2021-04-15 19:51:42', 7, 'WEB design', '2021-03-21 00:13:41'),
(41, 'Session Request', 'have requested a session of yours', 0, NULL, 6, 'math', '2021-03-21 01:06:15'),
(42, 'Session Request', 'have requested a session of yours', 0, '2021-04-16 21:17:42', 6, 'Java Script', '2021-03-21 01:11:34'),
(43, 'Session Request', 'have requested a session of yours', 0, '2021-04-16 21:17:42', 1, 'Java Script', '2021-03-21 19:49:48'),
(44, 'Teacher Response', 'have APPROVED your session request on course ', 0, NULL, 2, 'Java Script', '2021-03-21 19:53:56'),
(45, 'Teacher Response', 'have APPROVED your session request on course ', 1, '2021-04-16 21:57:27', 2, 'Java Script', '2021-03-21 19:53:57'),
(46, 'Session Request', 'have requested a session of yours', 0, '2021-04-16 21:17:42', 1, 'Java Script', '2021-03-22 23:01:10'),
(47, 'Teacher Response', 'have APPROVED your session request on course ', 1, '2021-04-16 21:57:27', 2, 'Java Script', '2021-03-22 23:53:49'),
(48, 'Session Request', 'have requested a session of yours', 0, '2021-04-16 21:17:42', 1, 'php', '2021-03-23 07:18:18'),
(49, 'Teacher Response', 'have APPROVED your session request on course ', 1, '2021-04-16 21:57:27', 2, 'php', '2021-03-25 15:16:32'),
(50, 'Session Request', 'have requested a session of yours', 0, '2021-04-16 21:17:42', 1, 'Physics', '2021-03-25 15:31:50'),
(51, 'Session Request', 'have requested a session of yours', 0, '2021-04-16 21:17:42', 1, 'php', '2021-03-25 15:31:55'),
(52, 'Teacher Response', 'have REJECTED your session request on course ', 1, '2021-04-16 21:57:27', 2, 'Physics', '2021-03-26 15:23:09'),
(53, 'Teacher Response', 'have APPROVED your session request on course ', 1, '2021-04-16 21:57:27', 2, 'php', '2021-03-26 15:23:09'),
(54, 'Session Request', 'have requested a session of yours', 0, '2021-04-16 21:17:42', 1, 'Ajax and Json', '2021-03-26 15:24:12'),
(55, 'Session Request', 'have requested a session of yours', 0, '2021-04-16 21:17:42', 1, 'Ajax and Json', '2021-03-26 15:24:20'),
(56, 'Teacher Response', 'have APPROVED your session request on course ', 1, '2021-04-16 21:57:27', 8, 'Ajax and Json', '2021-03-26 15:25:03'),
(57, 'Teacher Response', 'have APPROVED your session request on course ', 1, '2021-04-16 21:57:27', 8, 'Ajax and Json', '2021-03-26 16:40:01'),
(58, 'Session Request', 'have requested a session of yours', 0, '2021-04-16 21:17:42', 1, 'Ajax and Json', '2021-03-26 19:04:28'),
(59, 'Session Request', 'have requested a session of yours', 0, '2021-04-16 21:17:42', 1, 'Java Script', '2021-03-26 20:50:57'),
(60, 'Session Request', 'have requested a session of yours', 0, '2021-04-16 21:17:42', 1, 'php', '2021-03-26 20:51:31'),
(61, 'Session Request', 'have requested a session of yours', 0, '2021-04-16 21:17:42', 1, 'Physics', '2021-03-26 20:51:52'),
(62, 'Teacher Response', 'have REJECTED your session request on course ', 1, '2021-04-16 21:57:27', 2, 'php', '2021-03-26 20:52:16'),
(63, 'Teacher Response', 'have REJECTED your session request on course ', 1, '2021-04-16 21:57:27', 2, 'Java Script', '2021-03-26 20:52:16'),
(64, 'Teacher Response', 'have REJECTED your session request on course ', 1, '2021-04-16 21:57:27', 2, 'Physics', '2021-03-26 20:52:16'),
(65, 'Teacher Response', 'have APPROVED your session request on course ', 1, '2021-04-16 21:57:27', 2, 'Ajax and Json', '2021-03-26 20:52:16'),
(66, 'Review', 'have rated your session on course', 0, '2021-04-16 21:53:15', 1, 'math', '2021-04-01 09:50:31'),
(67, 'Review', 'have rated your session on course', 0, '2021-04-16 21:53:15', 1, 'math', '2021-04-01 09:54:50'),
(68, 'Session Request', 'have requested a session of yours', 0, '2021-04-16 21:17:42', 1, 'Ajax and Json', '2021-04-16 21:11:10'),
(69, 'Session Request', 'have requested a session of yours', 0, '2021-04-16 21:17:42', 1, 'Ajax and Json', '2021-04-16 21:11:27'),
(70, 'Session Request', 'have requested a session of yours', 0, '2021-04-16 21:17:42', 1, 'Ajax and Json', '2021-04-16 21:14:32'),
(72, 'Teacher Response', 'have APPROVED your session request on course ', 1, '2021-04-16 21:57:27', 2, 'Ajax and Json', '2021-04-16 21:15:55'),
(73, 'Teacher Response', 'have APPROVED your session request on course ', 1, '2021-04-16 21:57:27', 2, 'Ajax and Json', '2021-04-16 21:22:23'),
(74, 'Session Request', 'have requested a session of yours', 1, '2021-04-16 22:07:10', 1, 'WEB design', '2021-04-16 21:27:21'),
(75, 'Teacher Response', 'have APPROVED your session request on course ', 1, '2021-04-16 21:57:27', 7, 'WEB design', '2021-04-16 21:28:07'),
(76, 'Session Request', 'have requested a session of yours', 0, '2021-04-16 21:53:15', 1, 'math', '2021-04-16 21:31:39'),
(77, 'Session Request', 'have requested a session of yours', 0, '2021-04-16 21:53:15', 1, 'probabilities', '2021-04-16 21:31:45'),
(78, 'Teacher Response', 'have REJECTED your session request on course ', 1, '2021-04-16 21:57:27', 3, 'probabilities', '2021-04-16 21:36:59'),
(79, 'Teacher Response', 'have APPROVED your session request on course ', 1, '2021-04-16 21:57:27', 3, 'math', '2021-04-16 21:36:59'),
(80, 'Session Request', 'have requested a session of yours', 0, '2021-04-16 21:53:15', 1, 'math', '2021-04-16 21:38:04'),
(81, 'Session Request', 'have requested a session of yours', 0, '2021-04-16 21:53:15', 1, 'probabilities', '2021-04-16 21:38:07'),
(82, 'Teacher Response', 'have REJECTED your session request on course ', 1, '2021-04-16 21:57:27', 3, 'probabilities', '2021-04-16 21:39:12'),
(83, 'Teacher Response', 'have APPROVED your session request on course ', 1, '2021-04-16 22:01:01', 3, 'math', '2021-04-16 21:39:12'),
(84, 'Review', 'have rated your session on course', 0, NULL, 1, 'Ajax and Json', '2021-04-16 22:02:15'),
(85, 'Session Request', 'have requested a session of yours', 0, NULL, 1, 'WEB design', '2021-04-17 09:09:56'),
(86, 'Teacher Response', 'have APPROVED your session request on course ', 1, '2021-04-17 10:33:31', 8, 'WEB design', '2021-04-17 10:33:15'),
(87, 'Session Request', 'have requested a session of yours', 0, NULL, 1, 'math', '2021-04-17 16:24:24'),
(88, 'Session Request', 'have requested a session of yours', 0, NULL, 1, 'probabilities', '2021-04-17 16:26:58');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `teacher_availability_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `reject_reason` text NOT NULL,
  `student_count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `topic`, `subject_id`, `teacher_availability_id`, `status`, `reject_reason`, `student_count`) VALUES
(73, 'probabilities', 6, 15, 1, '', 1),
(74, 'deferential equations', 6, 16, 1, '', 1),
(75, '', 9, 17, -1, 'Sorry but I love majd', 1),
(76, '', 6, 24, -1, 'asdvwa as', 3),
(77, 'Welcoming session', 6, 17, 1, '', 1),
(78, 'php in one session', 10, 18, 1, '', 2),
(79, 'asdasd', 9, 24, 1, '', 3),
(81, 'DOM', 8, 20, 1, '', 2),
(82, 'hello', 8, 21, 1, '', 1),
(83, 'asddwqfwva', 7, 22, 1, '', 1),
(84, '', 12, 25, -1, 'I am sorry', 1),
(85, 'arrays', 7, 25, 1, '', 1),
(86, 'ajax request', 11, 26, 1, '', 1),
(87, 'json encode', 11, 27, 1, '', 1),
(88, 'OKKKKKK', 11, 28, 1, '', 1),
(89, '', 8, 28, -1, 'soooooooooorry', 1),
(90, '', 7, 28, -1, 'soooooooooorry', 1),
(91, '', 12, 28, -1, 'soooooooooorry', 1),
(92, 'HIII', 11, 29, 1, '', 1),
(93, 'هلا بالحبيب', 11, 30, 1, '', 1),
(94, 'هلا خوية', 11, 31, 1, '', 1),
(95, 'أهلا بالزلم', 10, 19, 1, '', 1),
(96, 'تفضل خوية بانتظارك', 6, 32, 1, '', 1),
(97, '', 9, 32, -1, 'ما تواخئوني شباب وصبايا', 1),
(98, 'أهلا بالحبيب', 6, 33, 1, '', 1),
(99, '', 9, 33, -1, 'سوري شبيبة', 1),
(100, 'WELCOME', 10, 34, 1, '', 1),
(101, '', 6, 36, 0, '', 1),
(102, '', 9, 36, 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `user_id` int(11) NOT NULL,
  `section` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`user_id`, `section`) VALUES
(1, NULL),
(4, NULL),
(5, NULL),
(6, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_session`
--

CREATE TABLE `student_session` (
  `id` int(11) NOT NULL,
  `student_user_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `rate` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `is_approved` int(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_session`
--

INSERT INTO `student_session` (`id`, `student_user_id`, `session_id`, `rate`, `comment`, `is_approved`) VALUES
(86, 1, 73, 5, 'عرااااااسي يا ضيعة', 1),
(87, 1, 74, 3, 'عراسي يا حبيبيييييييييييببببببببببب', 1),
(88, 1, 75, 0, '', -1),
(89, 4, 76, 0, '', -1),
(90, 4, 77, 0, '', 1),
(91, 1, 78, 0, '', 1),
(92, 4, 78, 0, '', 1),
(93, 1, 76, 0, '', -1),
(94, 1, 79, 1, 'I had a bad internet', 1),
(95, 4, 79, 0, '', 1),
(96, 5, 76, 0, '', -1),
(97, 5, 79, 0, '', 1),
(98, 6, 81, 0, '', 1),
(99, 1, 81, 0, '', 1),
(100, 1, 82, 3, '', 1),
(101, 1, 83, 0, '', 1),
(102, 1, 84, 0, '', -1),
(103, 1, 85, 0, '', 1),
(104, 1, 86, 3, 'love you man', 1),
(105, 1, 87, 0, '', 1),
(106, 1, 88, 0, '', 1),
(107, 1, 89, 0, '', -1),
(108, 1, 90, 0, '', -1),
(109, 1, 91, 0, '', -1),
(110, 1, 92, 4, 'ميرسي أستاذي', 1),
(111, 1, 93, 0, '', 1),
(112, 1, 94, 0, '', 1),
(113, 1, 95, 0, '', 1),
(114, 1, 96, 0, '', 1),
(115, 1, 97, 0, '', -1),
(116, 1, 98, 0, '', 1),
(117, 1, 99, 0, '', -1),
(118, 1, 100, 0, '', 1),
(119, 1, 101, 0, '', 0),
(120, 1, 102, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `teacher_user_id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `classification` varchar(100) DEFAULT NULL,
  `course_img_url` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `description`, `teacher_user_id`, `category`, `classification`, `course_img_url`) VALUES
(6, 'math', 'Mathematics, the science of structure, order, and relation that has evolved from elemental practices of counting, measuring, and describing the shapes of objects. It deals with logical reasoning and quantitative calculation, and its development has involved an increasing degree of idealization and abstraction of its subject matter.', 3, 'not specified', 'general', ''),
(7, 'php', 'I will teach you how to use MVC architecture in one session.\r\nTAKE PLACE NOW!!!!!!!!!!!', 2, 'Web', 'Advanced', 'web-course.png'),
(8, 'Java Script', '', 2, 'Web', 'Expert', ''),
(9, 'probabilities', 'I will teach you probabilities in a modern way!.', 3, 'Algebra', 'Expert', ''),
(10, 'WEB design', 'I will teach you All Javascript in only one session, book me now!!', 7, 'Web', 'Advanced', ''),
(11, 'Ajax and Json', 'I will teach you ajax js.', 2, 'Web', 'Expert', ''),
(12, 'Physics', 'Love Physics', 2, 'not specified', 'Intermediates', ''),
(13, 'Html css', '', 2, 'not specified', 'general', ''),
(16, 'chat real time', '', 2, 'Web', 'Advanced', '');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `user_id` int(11) NOT NULL,
  `degree` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`user_id`, `degree`) VALUES
(2, NULL),
(3, NULL),
(7, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_availability`
--

CREATE TABLE `teacher_availability` (
  `id` int(11) NOT NULL,
  `teacher_user_id` int(11) NOT NULL,
  `availability_id` int(11) NOT NULL,
  `is_availability_closed` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher_availability`
--

INSERT INTO `teacher_availability` (`id`, `teacher_user_id`, `availability_id`, `is_availability_closed`) VALUES
(15, 3, 26, 1),
(16, 3, 27, 1),
(17, 3, 28, 1),
(18, 7, 26, 1),
(19, 7, 27, 1),
(20, 2, 31, 1),
(21, 2, 32, 1),
(22, 2, 33, 1),
(24, 3, 35, 1),
(25, 2, 36, 1),
(26, 2, 37, 1),
(27, 2, 38, 1),
(28, 2, 39, 1),
(29, 2, 40, 1),
(30, 2, 41, 1),
(31, 2, 42, 1),
(32, 3, 43, 1),
(33, 3, 44, 1),
(34, 7, 45, 1),
(35, 7, 46, 0),
(36, 3, 47, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `password_hash` varchar(5000) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT 1,
  `role` varchar(45) NOT NULL,
  `bio` varchar(200) NOT NULL,
  `mobile_number` bigint(14) NOT NULL DEFAULT 963912345678,
  `birthday` date NOT NULL DEFAULT '1990-01-01',
  `gender` varchar(6) NOT NULL DEFAULT 'male',
  `img_url` varchar(5000) NOT NULL DEFAULT 'default.jpg',
  `facebook_url` varchar(5000) NOT NULL,
  `facebook_token` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `password_hash`, `email`, `is_active`, `role`, `bio`, `mobile_number`, `birthday`, `gender`, `img_url`, `facebook_url`, `facebook_token`) VALUES
(1, 'Nour', 'Alawad', 'a3dcb4d229de6fde0db5686dee47145d', 'mohammad1999alawad@gmail.com', 1, 'student', 'Web developer', 963935662715, '1999-11-12', 'male', 'team1.jpg', '', ''),
(2, 'Basel', 'Mariam', 'a3dcb4d229de6fde0db5686dee47145d', 'basel@gmail.com', 1, 'teacher', 'PHP king', 963912345678, '1990-01-01', 'male', 'default.jpg', 'facebook.com', ''),
(3, 'Amr', 'Obaid', 'a3dcb4d229de6fde0db5686dee47145d', 'amr@gmail.com', 1, 'teacher', 'PDO teacher', 963912345678, '1990-01-01', 'female', 'default.jpg', '', ''),
(4, 'Majd', 'Saker', 'a3dcb4d229de6fde0db5686dee47145d', 'majd@outlook.com', 1, 'student', 'CSS HACKER', 963994628238, '1999-08-12', 'male', 'team2.jpg', '', ''),
(5, 'Mohammad', 'Khaddour', 'a3dcb4d229de6fde0db5686dee47145d', 'khaddour@yahoo.com', 1, 'student', 'Java GUI designer', 963912345678, '1990-01-01', 'male', 'team3.jpg', '', ''),
(6, 'Ghfran', 'Jabour', 'a3dcb4d229de6fde0db5686dee47145d', 'ghfran@gmail.com', 1, 'student', 'CSS and JS goddess', 963912345678, '1999-12-11', 'female', 'default.jpg', '', ''),
(7, 'Mostafa', 'Dakkak', 'a3dcb4d229de6fde0db5686dee47145d', 'mostafa@gmail.com', 1, 'teacher', '', 963912345678, '1990-01-01', 'male', 'default.jpg', '', ''),
(8, 'Admin', '', 'a3dcb4d229de6fde0db5686dee47145d', 'admin@gmail.com', 1, 'admin', 'Tech inc.', 963912345678, '1970-01-01', 'male', 'default.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_notification`
--

CREATE TABLE `user_notification` (
  `id` int(11) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `notification_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_notification`
--

INSERT INTO `user_notification` (`id`, `recipient_id`, `notification_id`) VALUES
(12, 2, 14),
(13, 2, 15),
(14, 3, 16),
(15, 3, 17),
(16, 3, 18),
(17, 3, 19),
(18, 3, 20),
(19, 3, 21),
(22, 1, 24),
(23, 4, 25),
(24, 7, 26),
(25, 7, 27),
(26, 3, 28),
(27, 3, 29),
(28, 3, 30),
(29, 3, 31),
(30, 3, 32),
(31, 4, 33),
(32, 1, 34),
(33, 5, 35),
(34, 1, 36),
(35, 4, 37),
(36, 5, 38),
(37, 1, 39),
(38, 4, 40),
(39, 2, 42),
(40, 2, 43),
(41, 6, 44),
(42, 1, 45),
(43, 2, 46),
(44, 1, 47),
(45, 2, 48),
(46, 1, 49),
(47, 2, 50),
(48, 2, 51),
(49, 1, 52),
(50, 1, 53),
(51, 2, 54),
(52, 2, 55),
(53, 1, 56),
(54, 1, 57),
(55, 2, 58),
(56, 2, 59),
(57, 2, 60),
(58, 2, 61),
(59, 1, 62),
(60, 1, 63),
(61, 1, 64),
(62, 1, 65),
(63, 3, 66),
(64, 3, 67),
(65, 2, 68),
(66, 2, 69),
(67, 2, 70),
(69, 1, 72),
(70, 1, 73),
(71, 7, 74),
(72, 1, 75),
(73, 3, 76),
(74, 3, 77),
(75, 1, 78),
(76, 1, 79),
(77, 3, 80),
(78, 3, 81),
(79, 1, 82),
(80, 1, 83),
(81, 2, 84),
(82, 7, 85),
(83, 1, 86),
(84, 3, 87),
(85, 3, 88);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `availability`
--
ALTER TABLE `availability`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_notification_user1_idx` (`sender_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`,`teacher_availability_id`),
  ADD KEY `fk_session_subject1_idx` (`subject_id`),
  ADD KEY `fk_session_teacher_availability1_idx` (`teacher_availability_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `student_session`
--
ALTER TABLE `student_session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_student_has_session_session1_idx` (`session_id`),
  ADD KEY `fk_student_has_session_student1_idx` (`student_user_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_subject_teacher1_idx` (`teacher_user_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `teacher_availability`
--
ALTER TABLE `teacher_availability`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_teacher_has_availability_availability1_idx` (`availability_id`),
  ADD KEY `fk_teacher_has_availability_teacher1_idx` (`teacher_user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `user_notification`
--
ALTER TABLE `user_notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_has_notification_notification1_idx` (`notification_id`),
  ADD KEY `fk_user_has_notification_user1_idx` (`recipient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `availability`
--
ALTER TABLE `availability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `student_session`
--
ALTER TABLE `student_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `teacher_availability`
--
ALTER TABLE `teacher_availability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_notification`
--
ALTER TABLE `user_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `fk_notification_user1` FOREIGN KEY (`sender_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `fk_session_subject1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_session_teacher_availability1` FOREIGN KEY (`teacher_availability_id`) REFERENCES `teacher_availability` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_student_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student_session`
--
ALTER TABLE `student_session`
  ADD CONSTRAINT `fk_student_has_session_session1` FOREIGN KEY (`session_id`) REFERENCES `session` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_student_has_session_student1` FOREIGN KEY (`student_user_id`) REFERENCES `student` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `fk_subject_teacher1` FOREIGN KEY (`teacher_user_id`) REFERENCES `teacher` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `fk_teacher_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `teacher_availability`
--
ALTER TABLE `teacher_availability`
  ADD CONSTRAINT `fk_teacher_has_availability_availability1` FOREIGN KEY (`availability_id`) REFERENCES `availability` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_teacher_has_availability_teacher1` FOREIGN KEY (`teacher_user_id`) REFERENCES `teacher` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_notification`
--
ALTER TABLE `user_notification`
  ADD CONSTRAINT `fk_user_has_notification_notification1` FOREIGN KEY (`notification_id`) REFERENCES `notification` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_has_notification_user1` FOREIGN KEY (`recipient_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
