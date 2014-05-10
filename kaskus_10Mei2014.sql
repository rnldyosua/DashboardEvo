-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 10, 2014 at 09:46 AM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `kaskus`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `activity_id` int(11) NOT NULL AUTO_INCREMENT,
  `activity_adminid` int(11) NOT NULL,
  `activity_desc` text NOT NULL,
  `activity_type` enum('survey','question','company','brand') NOT NULL,
  `activity_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`activity_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=87 ;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`activity_id`, `activity_adminid`, `activity_desc`, `activity_type`, `activity_added`) VALUES
(1, 1, '<a href="[detailAdminURL]/1">"Surya Djayadi"</a> add new company <a href="[detailCompanyURL]/1">"Company"</a>', 'company', '2013-12-03 09:13:03'),
(2, 1, '<a href="[detailAdminURL]/1">Surya Djayadi</a> add new brand <a href="[detailBrandURL/1]">Brand</a> in company <a href="[detailCompanyURL/1]">Company</a>', 'brand', '2013-12-03 09:13:10'),
(3, 1, '<a href="[detailAdminURL]/1">Surya Djayadi</a> add new survey <a href="[detailSurveyURL/1]">Survey</a> in brand <a href="[detailBrandURL/1]">Brand</a>', 'survey', '2013-12-03 09:13:16'),
(4, 1, '<a href="[detailAdminURL]/1">Surya Djayadi</a> add new question in Survey <a href="[detailSurveyURL/1]">Survey</a>', 'question', '2013-12-03 09:13:48'),
(5, 1, '<a href="[detailAdminURL]/1">Surya Djayadi</a> add new question in Survey <a href="[detailSurveyURL/1]">Survey</a>', 'question', '2013-12-03 09:14:04'),
(6, 1, '<a href="[detailAdminURL]/1">Surya Djayadi</a> add new question in Survey <a href="[detailSurveyURL/1]">Survey</a>', 'question', '2013-12-03 09:14:17'),
(7, 1, '<a href="[detailAdminURL]/1">Surya Djayadi</a> add new invitation in Survey <a href="[detailSurveyURL/1]">Survey</a>', '', '2013-12-03 09:16:28'),
(8, 1, '<a href="[detailAdminURL]/1">Surya Djayadi</a> add new invitation in Survey <a href="[detailSurveyURL/1]">Survey</a>', '', '2013-12-03 09:21:58'),
(9, 1, '<a href="[detailAdminURL]/1">Surya Djayadi</a> add new invitation in Survey <a href="[detailSurveyURL/1]">Survey</a>', '', '2013-12-03 10:14:47'),
(10, 1, '<a href="[detailAdminURL]/1">Surya Djayadi</a> add new invitation in Survey <a href="[detailSurveyURL/1]">Survey</a>', '', '2013-12-03 10:15:40'),
(11, 1, '<a href="[detailAdminURL]/1">Surya Djayadi</a> add new survey <a href="[detailSurveyURL/2]">Survey 2</a> in brand <a href="[detailBrandURL/1]">Brand</a>', 'survey', '2013-12-03 11:13:07'),
(12, 1, '<a href="[detailAdminURL]/1">Surya Djayadi</a> add new question in Survey <a href="[detailSurveyURL/2]">Survey 2</a>', 'question', '2013-12-03 11:13:25'),
(13, 1, '<a href="[detailAdminURL]/1">Surya Djayadi</a> add new question in Survey <a href="[detailSurveyURL/2]">Survey 2</a>', 'question', '2013-12-03 11:13:36'),
(14, 1, '<a href="[detailAdminURL]/1">Surya Djayadi</a> add new question in Survey <a href="[detailSurveyURL/2]">Survey 2</a>', 'question', '2013-12-03 11:13:44'),
(15, 1, '<a href="[detailAdminURL]/1">Surya Djayadi</a> add new invitation in Survey <a href="[detailSurveyURL/2]">Survey 2</a>', '', '2013-12-03 11:13:49'),
(16, 1, '<a href="[detailAdminURL]/1">Surya Djayadi</a> edit question in Survey <a href="[detailSurveyURL/2]">Survey 2</a>', 'question', '2013-12-03 11:16:00'),
(17, 1, '<a href="[detailAdminURL]/1">Surya Djayadi</a> add new invitation in Survey <a href="[detailSurveyURL/1]">Survey</a>', '', '2013-12-03 12:03:30'),
(18, 1, '<a href="[detailAdminURL]/1">Surya Djayadi</a> edit question in Survey <a href="[detailSurveyURL/1]">Survey</a>', 'question', '2013-12-03 12:04:35'),
(19, 1, '<a href="[detailAdminURL]/1">Surya Djayadi</a> edit question in Survey <a href="[detailSurveyURL/1]">Survey</a>', 'question', '2013-12-03 12:05:35'),
(20, 1, '<a href="[detailAdminURL]/1">Surya Djayadi</a> edit question in Survey <a href="[detailSurveyURL/1]">Survey</a>', 'question', '2013-12-03 12:06:30'),
(21, 1, '<a href="[detailAdminURL]/1">Surya Djayadi</a> add new invitation in Survey <a href="[detailSurveyURL/2]">Survey 2</a>', '', '2013-12-04 07:04:30'),
(22, 2, '<a href="[detailAdminURL]/2">Sherief Caesar Mursyidi</a> add new survey <a href="[detailSurveyURL/3]">Survey Title 2</a> in brand <a href="[detailBrandURL/1]">Brand</a>', 'survey', '2013-12-04 07:08:21'),
(23, 2, '<a href="[detailAdminURL]/2">Sherief Caesar Mursyidi</a> add new question in Survey <a href="[detailSurveyURL/3]">Survey Title 2</a>', 'question', '2013-12-04 07:09:24'),
(24, 2, '<a href="[detailAdminURL]/2">Sherief Caesar Mursyidi</a> edit question in Survey <a href="[detailSurveyURL/3]">Survey Title 2</a>', 'question', '2013-12-04 07:09:32'),
(25, 3, '<a href="[detailAdminURL]/3">Mumin Santoso</a> edit brand <a href="[detailCompanyURL]/1">Brand</a> in company <a href="[detailCompanyURL/1]">Company</a>', 'brand', '2013-12-11 04:40:51'),
(26, 3, '<a href="[detailAdminURL]/3">Mumin Santoso</a> edit brand <a href="[detailCompanyURL]/1">BCA Prioritas</a> in company <a href="[detailCompanyURL/1]">Company</a>', 'brand', '2013-12-11 04:42:09'),
(27, 3, '<a href="[detailAdminURL]/3">Mumin Santoso</a> add new survey <a href="[detailSurveyURL/4]">BCA Prioritas Satisfaction Feedback</a> in brand <a href="[detailBrandURL/1]">BCA Prioritas</a>', 'survey', '2013-12-11 04:43:52'),
(28, 3, '<a href="[detailAdminURL]/3">Mumin Santoso</a> edit survey <a href="[detailSurveyURL]/4">BCA Prioritas Satisfaction Feedback</a> in brand <a href="[detailBrandURL]/1">BCA Prioritas</a>', 'survey', '2013-12-11 04:44:05'),
(29, 3, '<a href="[detailAdminURL]/3">Mumin Santoso</a> edit survey <a href="[detailSurveyURL]/4">BCA Prioritas Satisfaction Feedback</a> in brand <a href="[detailBrandURL]/1">BCA Prioritas</a>', 'survey', '2013-12-11 04:45:01'),
(30, 3, '<a href="[detailAdminURL]/3">Mumin Santoso</a> add new question in Survey <a href="[detailSurveyURL/4]">BCA Prioritas Satisfaction Feedback</a>', 'question', '2013-12-11 04:46:58'),
(31, 3, '<a href="[detailAdminURL]/3">Mumin Santoso</a> add new question in Survey <a href="[detailSurveyURL/4]">BCA Prioritas Satisfaction Feedback</a>', 'question', '2013-12-11 04:47:17'),
(32, 3, '<a href="[detailAdminURL]/3">Mumin Santoso</a> edit question in Survey <a href="[detailSurveyURL/4]">BCA Prioritas Satisfaction Feedback</a>', 'question', '2013-12-11 04:49:10'),
(33, 3, '<a href="[detailAdminURL]/3">Mumin Santoso</a> edit question in Survey <a href="[detailSurveyURL/4]">BCA Prioritas Satisfaction Feedback</a>', 'question', '2013-12-11 04:49:36'),
(34, 3, '<a href="[detailAdminURL]/3">Mumin Santoso</a> edit question in Survey <a href="[detailSurveyURL/4]">BCA Prioritas Satisfaction Feedback</a>', 'question', '2013-12-11 04:49:50'),
(35, 3, '<a href="[detailAdminURL]/3">Mumin Santoso</a> add new question in Survey <a href="[detailSurveyURL/4]">BCA Prioritas Satisfaction Feedback</a>', 'question', '2013-12-11 04:50:14'),
(36, 4, '<a href="[detailAdminURL]/4">JJ Nonis</a> add new survey <a href="[detailSurveyURL/5]">Unilever</a> in brand <a href="[detailBrandURL/1]">BCA Prioritas</a>', 'survey', '2014-02-18 06:21:40'),
(37, 4, '<a href="[detailAdminURL]/4">JJ Nonis</a> edit survey <a href="[detailSurveyURL]/5">Unilever</a> in brand <a href="[detailBrandURL]/1">BCA Prioritas</a>', 'survey', '2014-02-18 06:21:54'),
(38, 4, '<a href="[detailAdminURL]/4">JJ Nonis</a> add new question in Survey <a href="[detailSurveyURL/5]">Unilever</a>', 'question', '2014-02-18 06:28:35'),
(39, 4, '<a href="[detailAdminURL]/4">"JJ Nonis"</a> edit company <a href="[detailCompanyURL]/1">"Company"</a>', 'company', '2014-02-18 06:29:46'),
(40, 4, '<a href="[detailAdminURL]/4">JJ Nonis</a> edit brand <a href="[detailCompanyURL]/1">BCA Prioritas</a> in company <a href="[detailCompanyURL/1]">Unilever</a>', 'brand', '2014-02-18 06:30:02'),
(41, 4, '<a href="[detailAdminURL]/4">"JJ Nonis"</a> add new company <a href="[detailCompanyURL]/2">"BCA"</a>', 'company', '2014-02-18 06:30:21'),
(42, 4, '<a href="[detailAdminURL]/4">JJ Nonis</a> add new brand <a href="[detailBrandURL/2]">BCA Prioritas</a> in company <a href="[detailCompanyURL/2]">BCA</a>', 'brand', '2014-02-18 06:30:34'),
(43, 4, '<a href="[detailAdminURL]/4">JJ Nonis</a> add new survey <a href="[detailSurveyURL/6]">Klix Digital Agency Review</a> in brand <a href="[detailBrandURL/2]">BCA Prioritas</a>', 'survey', '2014-02-18 06:31:06'),
(44, 4, '<a href="[detailAdminURL]/4">JJ Nonis</a> add new invitation in Survey <a href="[detailSurveyURL/6]">Klix Digital Agency Review</a>', '', '2014-02-18 07:55:00'),
(45, 4, '<a href="[detailAdminURL]/4">JJ Nonis</a> edit survey <a href="[detailSurveyURL]/5">Unilever</a> in brand <a href="[detailBrandURL]/1">Cornetto</a>', 'survey', '2014-02-18 07:55:54'),
(46, 4, '<a href="[detailAdminURL]/4">JJ Nonis</a> add new invitation in Survey <a href="[detailSurveyURL/6]">Klix Digital Agency Review</a>', '', '2014-02-18 07:57:06'),
(47, 4, '<a href="[detailAdminURL]/4">JJ Nonis</a> edit survey <a href="[detailSurveyURL]/6">Klix Digital Agency Review</a> in brand <a href="[detailBrandURL]/2">BCA Prioritas</a>', 'survey', '2014-02-18 07:57:31'),
(48, 4, '<a href="[detailAdminURL]/4">JJ Nonis</a> add new question in Survey <a href="[detailSurveyURL/6]">Klix Digital Agency Review</a>', 'question', '2014-02-18 07:58:09'),
(49, 4, '<a href="[detailAdminURL]/4">JJ Nonis</a> edit survey <a href="[detailSurveyURL]/6">Klix Digital Agency Review</a> in brand <a href="[detailBrandURL]/2">BCA Prioritas</a>', 'survey', '2014-02-18 07:58:48'),
(50, 4, '<a href="[detailAdminURL]/4">JJ Nonis</a> delete brand <a href="[detailCompanyURL]/1">Cornetto</a> in company <a href="[detailCompanyURL]/"></a>', 'brand', '2014-02-18 08:10:49'),
(51, 4, '<a href="[detailAdminURL]/4">JJ Nonis</a> edit survey <a href="[detailSurveyURL]/5">Unilever</a> in brand <a href="[detailBrandURL]/2">BCA Prioritas</a>', 'survey', '2014-02-18 08:11:05'),
(52, 4, '<a href="[detailAdminURL]/4">JJ Nonis</a> edit survey <a href="[detailSurveyURL]/5">Unilever</a> in brand <a href="[detailBrandURL]/2">BCA Prioritas</a>', 'survey', '2014-02-18 08:11:50'),
(53, 4, '<a href="[detailAdminURL]/4">"JJ Nonis"</a> delete company <a href="[detailCompanyURL]/2">"BCA"</a>', 'company', '2014-02-18 08:13:02'),
(54, 4, '<a href="[detailAdminURL]/4">"JJ Nonis"</a> delete company <a href="[detailCompanyURL]/1">"Unilever"</a>', 'company', '2014-02-18 08:13:04'),
(55, 4, '<a href="[detailAdminURL]/4">JJ Nonis</a> delete survey <a href="[detailSurveyURL]/5">Unilever</a> in company <a href="[detailCompanyURL/]"></a>', 'brand', '2014-02-18 08:13:34'),
(56, 4, '<a href="[detailAdminURL]/4">JJ Nonis</a> edit survey <a href="[detailSurveyURL]/6">Klix Digital Agency Review BCA Prioritas</a> in brand <a href="[detailBrandURL]/"></a>', 'survey', '2014-02-18 08:16:23'),
(57, 4, '<a href="[detailAdminURL]/4">"JJ Nonis"</a> add new company <a href="[detailCompanyURL]/3">"PT Bank Central Asia"</a>', 'company', '2014-02-18 08:19:47'),
(58, 4, '<a href="[detailAdminURL]/4">JJ Nonis</a> add new brand <a href="[detailBrandURL/3]">BCA Digital</a> in company <a href="[detailCompanyURL/3]">PT Bank Central Asia</a>', 'brand', '2014-02-18 08:20:33'),
(59, 4, '<a href="[detailAdminURL]/4">JJ Nonis</a> edit brand <a href="[detailCompanyURL]/3">BCA Digital</a> in company <a href="[detailCompanyURL/3]">PT Bank Central Asia</a>', 'brand', '2014-02-18 08:20:41'),
(60, 4, '<a href="[detailAdminURL]/4">JJ Nonis</a> add new brand <a href="[detailBrandURL/4]">BCA Kartu Kredit</a> in company <a href="[detailCompanyURL/3]">PT Bank Central Asia</a>', 'brand', '2014-02-18 08:21:49'),
(61, 4, '<a href="[detailAdminURL]/4">JJ Nonis</a> edit brand <a href="[detailCompanyURL]/4">BCA Kartu Kredit</a> in company <a href="[detailCompanyURL/3]">PT Bank Central Asia</a>', 'brand', '2014-02-18 08:22:06'),
(62, 4, '<a href="[detailAdminURL]/4">JJ Nonis</a> add new survey <a href="[detailSurveyURL/7]">BCA Digital Agency Review Klix </a> in brand <a href="[detailBrandURL/3]">BCA Digital</a>', 'survey', '2014-02-18 08:24:34'),
(63, 4, '<a href="[detailAdminURL]/4">JJ Nonis</a> edit survey <a href="[detailSurveyURL]/7">BCA Digital Agency Review Klix </a> in brand <a href="[detailBrandURL]/3">BCA Digital</a>', 'survey', '2014-02-18 08:25:27'),
(64, 4, '<a href="[detailAdminURL]/4">JJ Nonis</a> add new brand <a href="[detailBrandURL/5]">BCA Rumah Solusi</a> in company <a href="[detailCompanyURL/3]">PT Bank Central Asia</a>', 'brand', '2014-02-18 08:49:27'),
(65, 4, '<a href="[detailAdminURL]/4">JJ Nonis</a> add new survey <a href="[detailSurveyURL/8]">BCA RumSol (Agency Review Klix)</a> in brand <a href="[detailBrandURL/5]">BCA Rumah Solusi</a>', 'survey', '2014-02-18 08:50:03'),
(66, 4, '<a href="[detailAdminURL]/4">JJ Nonis</a> add new invitation in Survey <a href="[detailSurveyURL/8]">BCA RumSol (Agency Review Klix)</a>', '', '2014-02-18 09:14:36'),
(67, 4, '<a href="[detailAdminURL]/4">JJ Nonis</a> add new question in Survey <a href="[detailSurveyURL/8]">BCA RumSol (Agency Review Klix)</a>', 'question', '2014-02-18 09:17:35'),
(68, 4, '<a href="[detailAdminURL]/4">JJ Nonis</a> add new invitation in Survey <a href="[detailSurveyURL/8]">BCA RumSol (Agency Review Klix)</a>', '', '2014-02-18 09:18:00'),
(69, 4, '<a href="[detailAdminURL]/4">JJ Nonis</a> add new invitation in Survey <a href="[detailSurveyURL/8]">BCA RumSol (Agency Review Klix)</a>', '', '2014-02-18 09:26:20'),
(70, 4, '<a href="[detailAdminURL]/4">JJ Nonis</a> add new question in Survey <a href="[detailSurveyURL/8]">BCA RumSol (Agency Review Klix)</a>', 'question', '2014-02-18 09:33:47'),
(71, 4, '<a href="[detailAdminURL]/4">JJ Nonis</a> add new invitation in Survey <a href="[detailSurveyURL/8]">BCA RumSol (Agency Review Klix)</a>', '', '2014-02-18 09:35:02'),
(72, 5, '<a href="[detailAdminURL]/5">Reinaldo Yosua</a> add new survey <a href="[detailSurveyURL/9]">CC Survey</a> in brand <a href="[detailBrandURL/4]">BCA Kartu Kredit</a>', 'survey', '2014-02-26 03:35:49'),
(73, 5, '<a href="[detailAdminURL]/5">Reinaldo Yosua</a> edit survey <a href="[detailSurveyURL]/9">CC Survey</a> in brand <a href="[detailBrandURL]/4">BCA Kartu Kredit</a>', 'survey', '2014-02-26 03:36:22'),
(74, 5, '<a href="[detailAdminURL]/5">Reinaldo Yosua</a> add new question in Survey <a href="[detailSurveyURL/9]">CC Survey</a>', 'question', '2014-02-26 03:37:07'),
(75, 5, '<a href="[detailAdminURL]/5">Reinaldo Yosua</a> add new question in Survey <a href="[detailSurveyURL/9]">CC Survey</a>', 'question', '2014-02-26 03:37:34'),
(76, 5, '<a href="[detailAdminURL]/5">Reinaldo Yosua</a> add new question in Survey <a href="[detailSurveyURL/9]">CC Survey</a>', 'question', '2014-02-26 03:38:10'),
(77, 5, '<a href="[detailAdminURL]/5">Reinaldo Yosua</a> add new invitation in Survey <a href="[detailSurveyURL/9]">CC Survey</a>', '', '2014-02-26 03:38:33'),
(78, 5, '<a href="[detailAdminURL]/5">Reinaldo Yosua</a> add new invitation in Survey <a href="[detailSurveyURL/9]">CC Survey</a>', '', '2014-03-11 05:31:34'),
(79, 5, '<a href="[detailAdminURL]/5">Reinaldo Yosua</a> edit survey <a href="[detailSurveyURL]/9">CC Survey</a> in brand <a href="[detailBrandURL]/4">BCA Kartu Kredit</a>', 'survey', '2014-05-06 05:53:21'),
(80, 5, '<a href="[detailAdminURL]/5">Reinaldo Yosua</a> add new survey <a href="[detailSurveyURL/10]">Dummy</a> in brand <a href="[detailBrandURL/3]">BCA Digital</a>', 'survey', '2014-05-06 05:53:29'),
(81, 5, '<a href="[detailAdminURL]/5">Reinaldo Yosua</a> add new question in Survey <a href="[detailSurveyURL/10]">Dummy</a>', 'question', '2014-05-06 05:57:57'),
(82, 5, '<a href="[detailAdminURL]/5">Reinaldo Yosua</a> add new question in Survey <a href="[detailSurveyURL/10]">Dummy</a>', 'question', '2014-05-06 06:01:26'),
(83, 5, '<a href="[detailAdminURL]/5">Reinaldo Yosua</a> add new invitation in Survey <a href="[detailSurveyURL/10]">Dummy</a>', '', '2014-05-06 06:02:02'),
(84, 5, '<a href="[detailAdminURL]/5">Reinaldo Yosua</a> add new survey <a href="[detailSurveyURL/11]">kasdf</a> in brand <a href="[detailBrandURL/3]">BCA Digital</a>', 'survey', '2014-05-09 06:12:01'),
(85, 5, '<a href="[detailAdminURL]/5">Reinaldo Yosua</a> add new question in Survey <a href="[detailSurveyURL/11]">kasdf</a>', 'question', '2014-05-09 06:13:32'),
(86, 5, '<a href="[detailAdminURL]/5">Reinaldo Yosua</a> add new question in Survey <a href="[detailSurveyURL/11]">kasdf</a>', 'question', '2014-05-09 06:14:44');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(40) NOT NULL,
  `admin_fullname` varchar(255) NOT NULL,
  `admin_roles` enum('superadmin','admin') NOT NULL,
  `admin_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`, `admin_fullname`, `admin_roles`, `admin_added`) VALUES
(1, 'surya.djayadi@merahputih.co.id', '3bee71e160dc79b8b3b140d1cbaca29517fdba00', 'Surya Djayadi', 'superadmin', '2013-11-27 09:20:46'),
(2, 'sherief@merahciptamedia.co.id', '557706f22fa8692c367d134618459e6f1146f59d', 'Sherief Caesar Mursyidi', 'superadmin', '2013-12-02 15:00:58'),
(3, 'mumin@alphamerahkreasi.com', '6228db491f3ba0f9142bfa4472514cdf2ba9505c', 'Mumin Santoso', 'superadmin', '2013-12-04 09:31:26'),
(4, 'jj.nonis@alphamerahkreasi.com', '81bfafb10ade0af9c2409527f148027fe9e6a717', 'JJ Nonis', 'superadmin', '2013-12-10 04:09:04'),
(5, 'reinaldo.yosua@klixdigital.com', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'Reinaldo Yosua', 'superadmin', '2014-02-26 03:25:24');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answer_id` int(11) NOT NULL AUTO_INCREMENT,
  `answer_questionid` int(11) NOT NULL,
  `answer_invintationid` int(11) NOT NULL,
  `answer_value` text NOT NULL,
  `answer_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`answer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `answer_questionid`, `answer_invintationid`, `answer_value`, `answer_added`) VALUES
(1, 1, 1, 'Check1', '2013-12-03 12:08:49'),
(2, 2, 1, 'Radio1', '2013-12-03 12:08:49'),
(3, 3, 1, 'test', '2013-12-03 12:08:49'),
(4, 12, 3, '\nExcellent', '2014-02-18 08:36:37'),
(5, 12, 3, '\nExcellent', '2014-02-18 09:19:30'),
(6, 13, 6, 'yes', '2014-02-18 09:27:08');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_companyid` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_status` enum('0','1') NOT NULL,
  `brand_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_companyid`, `brand_name`, `brand_status`, `brand_added`) VALUES
(1, 1, 'Cornetto', '0', '2013-12-03 09:13:10'),
(2, 2, 'BCA Prioritas', '0', '2014-02-18 06:30:34'),
(3, 3, 'BCA Digital', '1', '2014-02-18 08:20:33'),
(4, 3, 'BCA Kartu Kredit', '1', '2014-02-18 08:21:49'),
(5, 3, 'BCA Rumah Solusi', '1', '2014-02-18 08:49:27');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `company_status` enum('0','1') NOT NULL,
  `company_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `company_status`, `company_added`) VALUES
(1, 'Unilever', '0', '2013-12-03 09:13:03'),
(2, 'BCA', '0', '2014-02-18 06:30:21'),
(3, 'PT Bank Central Asia', '1', '2014-02-18 08:19:47');

-- --------------------------------------------------------

--
-- Table structure for table `invitation`
--

CREATE TABLE `invitation` (
  `invitation_id` int(11) NOT NULL AUTO_INCREMENT,
  `invitation_surveyid` int(11) NOT NULL,
  `invitation_sender` varchar(255) NOT NULL,
  `invitation_type` enum('admin','user') NOT NULL,
  `invitation_email` varchar(255) NOT NULL,
  `invitation_code` varchar(6) NOT NULL,
  `invitation_ip` varchar(25) NOT NULL,
  `invitation_useragent` text NOT NULL,
  `invitation_status` enum('0','1') NOT NULL,
  `invitation_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`invitation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `invitation`
--

INSERT INTO `invitation` (`invitation_id`, `invitation_surveyid`, `invitation_sender`, `invitation_type`, `invitation_email`, `invitation_code`, `invitation_ip`, `invitation_useragent`, `invitation_status`, `invitation_added`) VALUES
(1, 1, 'surya.djayadi@merahputih.co.id', 'admin', 'djasurya86@gmail.com', 'c3ad3', '139.0.4.146', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.57 Safari/537.36', '0', '2013-12-03 12:03:30'),
(2, 2, 'surya.djayadi@merahputih.co.id', 'admin', 'djasurya86@gmail.com', '25bad', '', '', '1', '2013-12-04 07:04:30'),
(3, 6, 'jj.nonis@alphamerahkreasi.com', 'admin', 'jj.nonis@klixdigital.com', '7229f', '103.29.150.2', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:27.0) Gecko/20100101 Firefox/27.0', '0', '2014-02-18 07:55:00'),
(4, 6, 'jj.nonis@alphamerahkreasi.com', 'admin', 'jj.nonis@semutapi.com', '72ddf', '', '', '1', '2014-02-18 07:57:06'),
(5, 8, 'jj.nonis@alphamerahkreasi.com', 'admin', 'krisna.renaldi@klixdigital.com', '189ef', '', '', '1', '2014-02-18 09:14:36'),
(6, 8, 'jj.nonis@alphamerahkreasi.com', 'admin', 'krisna.renaldi@klixdigital.com', '2dcb2', '103.29.150.2', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/32.0.1700.107 Safari/537.36', '0', '2014-02-18 09:18:00'),
(7, 8, 'jj.nonis@alphamerahkreasi.com', 'admin', 'reinaldo.yosua@klixdigital.com', 'dca2f', '', '', '1', '2014-02-18 09:26:20'),
(8, 8, 'jj.nonis@alphamerahkreasi.com', 'admin', 'krisna.renaldi@klixdigital.com', '0a5a2', '', '', '1', '2014-02-18 09:35:02'),
(9, 9, 'reinaldo.yosua@klixdigital.com', 'admin', 'yosua.reinaldo@gmail.com', 'b46d2', '', '', '1', '2014-02-26 03:38:33'),
(10, 9, 'reinaldo.yosua@klixdigital.com', 'admin', 'reinaldo.yosua@klixdigital.com', '375c6', '', '', '1', '2014-03-11 05:31:34'),
(11, 10, 'reinaldo.yosua@klixdigital.com', 'admin', 'yosua.reinaldo@gmail.com', '66c10', '', '', '1', '2014-05-06 06:02:01');

-- --------------------------------------------------------

--
-- Table structure for table `m_question`
--

CREATE TABLE `m_question` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `question_type` enum('check','radio','textarea') NOT NULL,
  `question_title` varchar(255) NOT NULL,
  `question_option` text NOT NULL,
  `question_mandatory` enum('0','1') NOT NULL,
  `question_status` enum('0','1') NOT NULL,
  `question_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_surveyid` int(11) NOT NULL,
  `order_number` smallint(6) NOT NULL DEFAULT '1',
  `question_type` enum('checkbox','radio','textarea') NOT NULL DEFAULT 'checkbox',
  `question_title` varchar(255) NOT NULL,
  `question_option` text NOT NULL,
  `with_notes` enum('0','1') NOT NULL DEFAULT '0',
  `question_mandatory` enum('0','1') NOT NULL,
  `question_status` enum('0','1') NOT NULL,
  `question_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_delete` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `question_surveyid`, `order_number`, `question_type`, `question_title`, `question_option`, `with_notes`, `question_mandatory`, `question_status`, `question_added`, `is_delete`) VALUES
(1, 1, 1, '', 'Question Check', 'Check1\nCheck2\nCheck3', '0', '1', '1', '2013-12-03 09:13:48', '0'),
(2, 1, 1, 'radio', 'Question Radio', 'Radio1\nRadio2\nRadio3', '0', '1', '1', '2013-12-03 09:14:04', '0'),
(3, 1, 1, 'textarea', 'Question Textarea', '', '0', '1', '1', '2013-12-03 09:14:17', '0'),
(4, 2, 1, '', 'Question Check', 'Check1\nCheck2\nCheck3', '0', '0', '1', '2013-12-03 11:13:25', '0'),
(5, 2, 1, 'radio', 'Question Check', 'Check1\nCheck2\nCheck3', '0', '0', '1', '2013-12-03 11:13:36', '0'),
(6, 2, 1, 'textarea', 'Question Textarea', '', '0', '0', '1', '2013-12-03 11:13:44', '0'),
(7, 3, 1, '', 'Coba checkbox', 'Checkbox 1\nCheckbox 2\nCheckbox 3', '0', '1', '1', '2013-12-04 07:09:24', '0'),
(8, 4, 1, '', 'Does the agency team understand the business objectives and the task at hand? ', 'Consistently does not meet standard\nMixed – sometimes meets standards \nConsistently meets standards \nSometimes above standards and sometimes exceptional work \nAlways exceptional work ', '0', '1', '1', '2013-12-11 04:46:57', '0'),
(9, 4, 1, '', 'Are the agency team problem solvers, and able to think on their feet rather than take orders? ', 'Consistently does not meet standard\nMixed – sometimes meets standards \nConsistently meets standards \nSometimes above standards and sometimes exceptional work \nAlways exceptional work \n', '0', '1', '1', '2013-12-11 04:47:17', '0'),
(10, 4, 1, '', 'Does the agency team deliver quality work and deliver it on time? ', 'Consistently does not meet standard\nMixed – sometimes meets standards \nConsistently meets standards \nSometimes above standards and sometimes exceptional work \nAlways exceptional work ', '0', '1', '1', '2013-12-11 04:50:14', '0'),
(11, 5, 1, '', 'Is he a jerk', 'yew\nyes\nmaybe\nno', '0', '1', '1', '2014-02-18 06:28:35', '0'),
(12, 6, 1, '', 'How great is our service', 'Great\nExcellent\nOut of this world\nnone of the above', '0', '0', '1', '2014-02-18 07:58:09', '0'),
(13, 8, 1, '', 'Is Krisna doing his job', 'yes\nNo\nMaybe\nHe sleeps all day', '0', '1', '1', '2014-02-18 09:17:35', '0'),
(14, 8, 1, '', 'are you OK?', 'yes\nno\nmaybe', '0', '1', '1', '2014-02-18 09:33:47', '0'),
(15, 9, 1, 'radio', 'Yes or NO ?', 'Yes\r\nNo', '0', '1', '1', '2014-02-26 03:37:07', '0'),
(16, 9, 1, 'textarea', 'Alamat anda ?', '', '0', '1', '1', '2014-02-26 03:37:34', '0'),
(17, 9, 1, '', 'Makanan Favorit', 'Ayam\r\nBebek\r\nIkan', '0', '1', '1', '2014-02-26 03:38:10', '0'),
(18, 10, 1, 'textarea', 'Test', 'test', '0', '1', '1', '2014-05-06 05:57:57', '0'),
(19, 10, 1, '', 'Apakah Kamu', 'hehe\r\nhuhu\r\nhooho', '0', '1', '1', '2014-05-06 06:01:26', '0'),
(20, 11, 1, 'textarea', 'is this good', 'yes\nno\nsort of', '1', '1', '1', '2014-05-09 06:13:32', '1'),
(21, 11, 1, '', 'are you OK', 'fine\nsick\nwell', '0', '1', '1', '2014-05-09 06:14:44', '1'),
(22, 11, 1, 'checkbox', 'How ''s the weather today?', 'Sunny\nCloudy\nGloomy', '0', '1', '1', '2014-05-10 06:36:36', '0');

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `survey_id` int(11) NOT NULL AUTO_INCREMENT,
  `is_delete` char(1) NOT NULL DEFAULT '0',
  `survey_adminid` int(11) NOT NULL,
  `survey_title` varchar(255) NOT NULL,
  `survey_status` enum('0','1') NOT NULL,
  `survey_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`survey_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`survey_id`, `is_delete`, `survey_adminid`, `survey_title`, `survey_status`, `survey_added`) VALUES
(1, '0', 1, 'Survey', '1', '2013-12-03 09:13:16'),
(2, '0', 1, 'Survey 2', '1', '2013-12-03 11:13:07'),
(3, '0', 2, 'Survey Title 2', '1', '2013-12-04 07:08:21'),
(4, '0', 3, 'BCA Prioritas Satisfaction Feedback', '1', '2013-12-11 04:43:52'),
(5, '0', 4, 'Unilever', '0', '2014-02-18 06:21:40'),
(6, '0', 4, 'Klix Digital Agency Review BCA Prioritas', '1', '2014-02-18 06:31:06'),
(7, '0', 4, 'BCA Digital (Agency Review Klix) ', '1', '2014-02-18 08:24:34'),
(8, '0', 4, 'BCA RumSol (Agency Review Klix)', '1', '2014-02-18 08:50:03'),
(9, '0', 5, 'CC Survey', '1', '2014-02-26 03:35:49'),
(10, '0', 5, 'Dummy', '1', '2014-05-06 05:53:29'),
(11, '0', 5, 'kasdf', '1', '2014-05-09 06:12:01'),
(12, '0', 5, 'Dummy 1', '1', '2014-05-09 12:59:59'),
(13, '0', 5, 'Dummy 2b', '1', '2014-05-09 13:01:37'),
(14, '0', 5, 'Dummy 3c', '0', '2014-05-09 13:59:55'),
(15, '0', 5, 'Dummy 4', '0', '2014-05-09 14:32:27'),
(16, '1', 5, 'Dummy 4b', '1', '2014-05-10 02:23:37');
