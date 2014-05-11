-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 10, 2014 at 03:50 PM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `kaskus`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answer_id` int(11) NOT NULL AUTO_INCREMENT,
  `sosmed_id` varchar(50) NOT NULL,
  `kaskus_id` varchar(50) NOT NULL,
  `answer_questionid` int(11) NOT NULL,
  `answer_value` text NOT NULL,
  `answer_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`answer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `sosmed_id`, `kaskus_id`, `answer_questionid`, `answer_value`, `answer_added`) VALUES
(1, 'fb123809', 'kas89988', 1, '{"answer":{"option":["fine","wonderful","gloomy"],"alasan":"","notes":""}}', '2014-05-10 13:29:18'),
(2, 'fb123809', 'kas89988', 2, '{"answer":{"option":[],"alasan":"Capres PDIP Joko Widodo menyatakan pengumuman cawapresnya masih dalam kisaran waktu satu pekan lagi. Gubernur DKI Jakarta ini pun mulai menyebut kandidat pasangannya.","notes":""}}', '2014-05-10 13:31:31'),
(3, 'fb123809', 'kas89988', 3, '{"answer":{"option":["yes","no"],"alasan":"","notes":"It''s not bad"}}', '2014-05-10 13:33:44'),
(4, 'fb123810', 'kas89989', 1, '{"answer":{"option":["fine","wonderful","gloomy","sad"],"alasan":"","notes":""}}', '2014-05-10 06:29:18'),
(5, 'fb123810', 'kas89989', 2, '{"answer":{"option":[],"alasan":"passion.","notes":""}}', '2014-05-10 06:31:31'),
(6, 'fb123810', 'kas89989', 3, '{"answer":{"option":["yes"],"alasan":"","notes":"nothing"}}', '2014-05-10 06:33:44'),
(7, 'fb123811', 'kas89990', 1, '{"answer":{"option":["wonderful"],"alasan":"","notes":""}}', '2014-05-10 06:29:18'),
(8, 'fb123811', 'kas89990', 2, '{"answer":{"option":[],"alasan":"passion too here.","notes":""}}', '2014-05-10 06:31:31'),
(9, 'fb123811', 'kas89990', 3, '{"answer":{"option":["no!"],"alasan":"","notes":"nothing"}}', '2014-05-10 06:33:44'),
(10, 'fb123811', 'kas89990', 1, '{"answer":{"option":["wonderful"],"alasan":"","notes":""}}', '2014-05-10 06:29:18'),
(11, 'fb123811', 'kas89990', 2, '{"answer":{"option":[],"alasan":"passion too here.","notes":""}}', '2014-05-10 06:31:31'),
(12, 'fb123811', 'kas89990', 3, '{"answer":{"option":["no!"],"alasan":"","notes":"nothing"}}', '2014-05-10 06:33:44');
