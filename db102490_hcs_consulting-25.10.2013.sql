-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: internal-db.s102490.gridserver.com
-- Generation Time: Oct 25, 2013 at 12:45 AM
-- Server version: 5.1.55-rel12.6
-- PHP Version: 5.3.27

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db102490_hcs_consulting`
--

-- --------------------------------------------------------

--
-- Table structure for table `alerts`
--

CREATE TABLE IF NOT EXISTS `alerts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `url` varchar(255) NOT NULL,
  `posted_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sent_on` datetime NOT NULL,
  `sent` int(11) NOT NULL,
  `user_group` varchar(100) NOT NULL,
  `source_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=88 ;

--
-- Dumping data for table `alerts`
--

INSERT INTO `alerts` (`id`, `title`, `category`, `url`, `posted_on`, `sent_on`, `sent`, `user_group`, `source_id`) VALUES
(47, 'PSI MAP study 2012', 'document', '', '2013-07-15 08:09:36', '2013-07-15 11:09:36', 1, 'all', 39),
(48, 'WHO article- "Midwives at heart of Somalia’s new reproductive health strategy"', 'news', '', '2013-07-15 08:09:36', '2013-07-15 11:09:36', 1, 'all', 22),
(49, 'SFN quality audit check list', 'tool', '', '2013-07-15 08:09:36', '2013-07-15 11:09:36', 1, 'all', 11),
(50, 'Oxytocin assessment report', 'document', '', '2013-07-15 08:09:36', '2013-07-15 11:09:36', 1, 'all', 40),
(51, 'Training monitoring and evaluation toolkit', 'tool', '', '2013-07-15 08:09:36', '2013-07-15 11:09:36', 1, 'all', 12),
(52, 'ertertert', 'news', '', '2013-07-15 08:09:36', '2013-07-15 11:09:36', 1, 'all', 23),
(53, 'Quarterly Review HCS June 2013', 'reports', '', '2013-07-15 08:09:36', '2013-07-15 11:09:36', 1, 'all', 12),
(54, 'A success story from the IPC program', 'innovations_and_lessons', '', '2013-07-15 08:09:36', '2013-07-15 11:09:36', 1, 'all', 12),
(55, 'Saving lives, one donkey-cart at a time', 'innovations_and_lessons', '', '2013-07-15 08:09:36', '2013-07-15 11:09:36', 1, 'all', 13),
(56, 'Meeting Minutes January 2013', 'meeting_minutes', '', '2013-07-15 08:09:36', '2013-07-15 11:09:36', 1, 'all', 11),
(57, 'Birth Spacing Messaging with Religious Leaders in Puntland', 'innovations_and_lessons', '', '2013-07-21 16:23:27', '2013-07-21 07:23:27', 1, 'all', 14),
(58, 'all reports on health care in somalia', 'news', '', '2013-07-21 16:23:27', '2013-07-21 07:23:27', 1, 'all', 24),
(59, 'PSI Somaliland - brief', 'document', '', '2013-07-29 11:27:54', '2013-07-29 02:27:54', 1, 'all', 41),
(60, 'Social Franchise Network - presentation', 'document', '', '2013-07-29 11:27:54', '2013-07-29 02:27:54', 1, 'all', 42),
(61, 'EmONC Facilitator Manual', 'document', '', '2013-07-29 11:27:54', '2013-07-29 02:27:54', 1, 'all', 43),
(62, 'NHPC Health Sector Regulation Exposure Visit Report', 'document', '', '2013-07-29 11:27:54', '2013-07-29 02:27:54', 1, 'all', 44),
(63, 'NHPC Report Dec 2011', 'document', '', '2013-07-29 11:27:54', '2013-07-29 02:27:54', 1, 'all', 45),
(64, 'Somaliland CHW ToT Curriculum 2013', 'document', '', '2013-07-29 11:27:54', '2013-07-29 02:27:54', 1, 'all', 46),
(65, 'Somaliland CHW ToT Manual 2013', 'document', '', '2013-07-29 11:27:54', '2013-07-29 02:27:54', 1, 'all', 47),
(66, 'Somaliland CHW Training Manual 2013', 'document', '', '2013-07-29 11:27:54', '2013-07-29 02:27:54', 1, 'all', 48),
(67, 'Somaliland CHW Training Curriculum 2013', 'document', '', '2013-07-29 11:27:54', '2013-07-29 02:27:54', 1, 'all', 49),
(68, 'Private Pharmacies - Supervision check list', 'tool', '', '2013-08-05 08:26:57', '2013-08-05 11:26:57', 1, 'all', 13),
(69, 'Social Franchise Network - Operation Manual', 'tool', '', '2013-08-05 08:26:57', '2013-08-05 11:26:57', 1, 'all', 14),
(70, 'MoU Bulsho-Kaab - sample', 'tool', '', '2013-08-05 08:26:57', '2013-08-05 11:26:57', 1, 'all', 15),
(71, 'Breast-feeding Week', 'event', '', '2013-08-05 08:26:57', '2013-08-05 11:26:57', 1, 'all', 22),
(72, 'Test event', 'event', '', '2013-08-13 05:45:50', '2013-08-13 08:45:50', 1, 'all', 23),
(73, 'Stories of change', 'reports', '', '2013-08-13 05:45:50', '2013-08-13 08:45:50', 1, 'all', 13),
(74, 'Stories of change', 'innovations_and_lessons', '', '2013-08-13 05:45:50', '2013-08-13 08:45:50', 1, 'all', 15),
(75, 'HMIS indicator chart', 'poster', '', '2013-08-13 05:45:50', '2013-08-13 08:45:50', 1, 'all', 15),
(76, 'Bi-monthly review and planning meeting', 'event', '', '2013-08-19 07:15:41', '2013-08-19 10:15:41', 1, 'all', 24),
(77, 'Quality of Care and Improvement training', 'event', '', '2013-08-19 07:15:41', '2013-08-19 10:15:41', 1, 'all', 25),
(78, 'HCS Value for Money Report', 'reports', '', '2013-08-19 07:15:41', '2013-08-19 10:15:41', 1, 'all', 14),
(79, 'Breastfeeding- A healthier start to life', 'innovations_and_lessons', '', '2013-08-29 15:22:44', '0000-00-00 00:00:00', 0, 'all', 16),
(80, 'A healthy start to life for Somali infants', 'news', '', '2013-08-29 15:38:03', '0000-00-00 00:00:00', 0, 'all', 25),
(81, 'Somaliland MOH Human Resource Management Tools Booklet', 'tool', '', '2013-09-20 09:30:53', '0000-00-00 00:00:00', 0, 'all', 16),
(82, 'A story from a Bulsho-Kaab member', 'innovations_and_lessons', '', '2013-09-29 05:45:53', '0000-00-00 00:00:00', 0, 'all', 17),
(83, 'CHWs Trainees Selection Report', 'reports', '', '2013-10-11 06:36:15', '0000-00-00 00:00:00', 0, 'all', 15),
(84, 'HCS quarterly review meeting', 'event', '', '2013-10-13 06:30:26', '0000-00-00 00:00:00', 0, 'all', 26),
(85, 'HCS quarterly review meeting', 'event', '', '2013-10-13 06:32:21', '0000-00-00 00:00:00', 0, 'all', 27),
(86, 'HCS quarterly review meeting', 'event', '', '2013-10-13 06:33:15', '0000-00-00 00:00:00', 0, 'all', 28),
(87, 'FoQus study ', 'document', '', '2013-10-24 06:14:40', '0000-00-00 00:00:00', 0, 'all', 50);

-- --------------------------------------------------------

--
-- Table structure for table `alerts_digest`
--

CREATE TABLE IF NOT EXISTS `alerts_digest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `digest` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `alerts_digest`
--

INSERT INTO `alerts_digest` (`id`, `digest`, `created_on`) VALUES
(1, '<body><h2>This is what has been going on</h2><h3>1 new document(s)</h3><ul><li>Sample doc</li></ul><h3>2 new tool(s)</h3><ul><li>test tool for the alert functionality</li><li>Test radio spot for alerts</li></ul><h3>1 new report(s)</h3><ul><li>Sample  report for alert purpose</li></ul><h3>1 new event(s)</h3><ul><li>Web site quality assurance</li></ul><h3>1 new meeting minutes</h3><ul><li>test minute for alert purposes</li></ul><h3>1 new news item(s)</h3><ul><li>test news item for alerts</li></ul><h3>2 new poster(s)</h3><ul><li>test poster</li><li>Shuban-Daweeye (DTK) billboard</li></ul><h3>1 new radiospot(s)</h3><ul><li>test radio spot to see if alerts work</li></ul><p>Learn more by visiting <a href="http://www.hcsshare.org/index.php">HCS-SHARE</a></p></body>', '2013-06-27 09:05:37'),
(2, '<body><h2>This is what has been going on</h2><h3>2 new document(s)</h3><ul><li>PSI MAP study 2012</li><li>Oxytocin assessment report</li></ul><h3>2 new tool(s)</h3><ul><li>SFN quality audit check list</li><li>Training monitoring and evaluation toolkit</li></ul><h3>1 new report(s)</h3><ul><li>Quarterly Review HCS June 2013</li></ul><h3>1 new meeting minutes</h3><ul><li>Meeting Minutes January 2013</li></ul><h3>2 new news item(s)</h3><ul><li>WHO article- "Midwives at heart of Somalia’s new reproductive health strategy"</li><li>ertertert</li></ul><p>Learn more by visiting <a href="http://www.hcsshare.org/index.php">HCS-SHARE</a></p></body>', '2013-07-15 08:05:21'),
(3, '<body><h3>This is what has been going on</h3><h4>2 new document(s)</h4><ul><li>PSI MAP study 2012</li><li>Oxytocin assessment report</li></ul><h4>2 new tool(s)</h4><ul><li>SFN quality audit check list</li><li>Training monitoring and evaluation toolkit</li></ul><h4>1 new report(s)</h4><ul><li>Quarterly Review HCS June 2013</li></ul><h4>1 new meeting minutes</h4><ul><li>Meeting Minutes January 2013</li></ul><h4>2 new news item(s)</h4><ul><li>WHO article- "Midwives at heart of Somalia’s new reproductive health strategy"</li><li>ertertert</li></ul><p>Learn more by visiting <a href="http://www.hcsshare.org/index.php">HCS-SHARE</a></p></body>', '2013-07-15 08:09:36'),
(4, '<body><h3>This is what has been going on</h3><h4>1 new news item(s)</h4><ul><li>all reports on health care in somalia</li></ul><p>Learn more by visiting <a href="http://www.hcsshare.org/index.php">HCS-SHARE</a></p></body>', '2013-07-21 16:23:27'),
(5, '<body><h3>This is what has been going on</h3><h4>9 new document(s)</h4><ul><li>PSI Somaliland - brief</li><li>Social Franchise Network - presentation</li><li>EmONC Facilitator Manual</li><li>NHPC Health Sector Regulation Exposure Visit Report</li><li>NHPC Report Dec 2011</li><li>Somaliland CHW ToT Curriculum 2013</li><li>Somaliland CHW ToT Manual 2013</li><li>Somaliland CHW Training Manual 2013</li><li>Somaliland CHW Training Curriculum 2013</li></ul><p>Learn more by visiting <a href="http://www.hcsshare.org/index.php">HCS-SHARE</a></p></body>', '2013-07-29 11:27:54'),
(6, '<body><h3>This is what has been going on</h3><h4>3 new tool(s)</h4><ul><li>Private Pharmacies - Supervision check list</li><li>Social Franchise Network - Operation Manual</li><li>MoU Bulsho-Kaab - sample</li></ul><h4>1 new event(s)</h4><ul><li>Breast-feeding Week</li></ul><h4>0 new meeting minutes</h4><ul></ul><p>Learn more by visiting <a href="http://www.hcsshare.org/index.php">HCS-SHARE</a></p></body>', '2013-08-05 08:26:57'),
(7, '<body><h3>This is what has been going on</h3><h4>1 new report(s)</h4><ul><li>Stories of change</li></ul><h4>1 new event(s)</h4><ul><li>Test event</li></ul><h4>1 new poster(s)</h4><ul><li>HMIS indicator chart</li></ul><p>Learn more by visiting <a href="http://www.hcsshare.org/index.php">HCS-SHARE</a></p></body>', '2013-08-13 05:45:50'),
(8, '<body><h3>This is what has been going on</h3><h4>1 new report(s)</h4><ul><li>HCS Value for Money Report</li></ul><h4>2 new event(s)</h4><ul><li>Bi-monthly review and planning meeting</li><li>Quality of Care and Improvement training</li></ul><p>Learn more by visiting <a href="http://www.hcsshare.org/index.php">HCS-SHARE</a></p></body>', '2013-08-19 07:15:41');

-- --------------------------------------------------------

--
-- Table structure for table `alerts_subscriber_list`
--

CREATE TABLE IF NOT EXISTS `alerts_subscriber_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `digest_id` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sent_on` datetime NOT NULL,
  `sent` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=166 ;

--
-- Dumping data for table `alerts_subscriber_list`
--

INSERT INTO `alerts_subscriber_list` (`id`, `email`, `digest_id`, `created_on`, `sent_on`, `sent`) VALUES
(38, 'dfest@psikenya.org', 3, '2013-07-15 08:11:00', '2013-07-15 11:11:00', 1),
(39, 'mtolmino@psi.org', 3, '2013-07-15 08:11:00', '2013-07-15 11:11:00', 1),
(40, 'rohit.odari@healthunlimited.org', 3, '2013-07-15 08:11:00', '2013-07-15 11:11:00', 1),
(41, 'thomas.okedi@thet.org', 3, '2013-07-15 08:11:00', '2013-07-15 11:11:00', 1),
(42, 'kunuz.abdella@savethechildren.org', 3, '2013-07-15 08:11:00', '2013-07-15 11:11:00', 1),
(43, 'aali@trocaire.or.ke', 3, '2013-07-15 08:11:00', '2013-07-15 11:11:00', 1),
(44, 'JimmiBraun@gmail.com', 3, '2013-07-15 08:11:01', '2013-07-15 11:11:01', 1),
(45, 'kiruik@gmail.com', 3, '2013-07-15 08:11:01', '2013-07-15 11:11:01', 1),
(46, 'samira@thet.org', 3, '2013-07-15 08:11:01', '2013-07-15 11:11:01', 1),
(47, 'abdiali.mohamed@savethechildren.org', 3, '2013-07-15 08:11:01', '2013-07-15 11:11:01', 1),
(48, 'emilien@thet.org', 3, '2013-07-15 08:12:20', '2013-07-15 11:12:20', 1),
(49, 'wario.guracha@thet.org', 3, '2013-07-15 08:12:20', '2013-07-15 11:12:20', 1),
(50, 'mshauri@thet.org', 3, '2013-07-15 08:12:20', '2013-07-15 11:12:20', 1),
(51, 'dgulino@psi.org', 3, '2013-07-15 08:12:20', '2013-07-15 11:12:20', 1),
(52, 'mhermann@psi.org', 3, '2013-07-15 08:12:20', '2013-07-15 11:12:20', 1),
(53, 'pannaerasmus80@gmail.com', 3, '2013-07-15 08:12:20', '2013-07-15 11:12:20', 1),
(54, 'jjchelule@gmail.com', 3, '2013-07-15 08:12:20', '2013-07-15 11:12:20', 1),
(55, 'fkasina@trocaire.or.ke', 3, '2013-07-15 08:12:20', '2013-07-15 11:12:20', 1),
(56, 'dfest@psikenya.org', 4, '2013-07-22 09:30:58', '2013-07-22 12:30:58', 1),
(57, 'mtolmino@psi.org', 4, '2013-07-22 09:30:58', '2013-07-22 12:30:58', 1),
(58, 'rohit.odari@healthunlimited.org', 4, '2013-07-22 09:30:58', '2013-07-22 12:30:58', 1),
(59, 'thomas.okedi@thet.org', 4, '2013-07-22 09:30:58', '2013-07-22 12:30:58', 1),
(60, 'kunuz.abdella@savethechildren.org', 4, '2013-07-22 09:30:58', '2013-07-22 12:30:58', 1),
(61, 'aali@trocaire.or.ke', 4, '2013-07-22 09:30:58', '2013-07-22 12:30:58', 1),
(62, 'JimmiBraun@gmail.com', 4, '2013-07-22 09:30:58', '2013-07-22 12:30:58', 1),
(63, 'kiruik@gmail.com', 4, '2013-07-22 09:30:58', '2013-07-22 12:30:58', 1),
(64, 'samira@thet.org', 4, '2013-07-22 09:30:58', '2013-07-22 12:30:58', 1),
(65, 'abdiali.mohamed@savethechildren.org', 4, '2013-07-22 09:30:58', '2013-07-22 12:30:58', 1),
(66, 'emilien@thet.org', 4, '2013-07-22 17:00:26', '2013-07-22 08:00:26', 1),
(67, 'wario.guracha@thet.org', 4, '2013-07-22 17:00:26', '2013-07-22 08:00:26', 1),
(68, 'mshauri@thet.org', 4, '2013-07-22 17:00:26', '2013-07-22 08:00:26', 1),
(69, 'dgulino@psi.org', 4, '2013-07-22 17:00:26', '2013-07-22 08:00:26', 1),
(70, 'mhermann@psi.org', 4, '2013-07-22 17:00:26', '2013-07-22 08:00:26', 1),
(71, 'pannaerasmus80@gmail.com', 4, '2013-07-22 17:00:26', '2013-07-22 08:00:26', 1),
(72, 'jjchelule@gmail.com', 4, '2013-07-22 17:00:26', '2013-07-22 08:00:26', 1),
(73, 'fkasina@trocaire.or.ke', 4, '2013-07-22 17:00:26', '2013-07-22 08:00:26', 1),
(74, 'dfest@psikenya.org', 5, '2013-07-29 11:28:12', '2013-07-29 02:28:12', 1),
(75, 'mtolmino@psi.org', 5, '2013-07-29 11:28:12', '2013-07-29 02:28:12', 1),
(76, 'rohit.odari@healthunlimited.org', 5, '2013-07-29 11:28:12', '2013-07-29 02:28:12', 1),
(77, 'thomas.okedi@thet.org', 5, '2013-07-29 11:28:12', '2013-07-29 02:28:12', 1),
(78, 'kunuz.abdella@savethechildren.org', 5, '2013-07-29 11:28:12', '2013-07-29 02:28:12', 1),
(79, 'aali@trocaire.or.ke', 5, '2013-07-29 11:28:12', '2013-07-29 02:28:12', 1),
(80, 'JimmiBraun@gmail.com', 5, '2013-07-29 11:28:13', '2013-07-29 02:28:13', 1),
(81, 'kiruik@gmail.com', 5, '2013-07-29 11:28:15', '2013-07-29 02:28:15', 1),
(82, 'samira@thet.org', 5, '2013-07-29 11:28:15', '2013-07-29 02:28:15', 1),
(83, 'abdiali.mohamed@savethechildren.org', 5, '2013-07-29 11:28:15', '2013-07-29 02:28:15', 1),
(84, 'emilien@thet.org', 5, '2013-07-29 17:00:26', '2013-07-29 08:00:26', 1),
(85, 'wario.guracha@thet.org', 5, '2013-07-29 17:00:26', '2013-07-29 08:00:26', 1),
(86, 'mshauri@thet.org', 5, '2013-07-29 17:00:26', '2013-07-29 08:00:26', 1),
(87, 'dgulino@psi.org', 5, '2013-07-29 17:00:26', '2013-07-29 08:00:26', 1),
(88, 'mhermann@psi.org', 5, '2013-07-29 17:00:26', '2013-07-29 08:00:26', 1),
(89, 'pannaerasmus80@gmail.com', 5, '2013-07-29 17:00:26', '2013-07-29 08:00:26', 1),
(90, 'jjchelule@gmail.com', 5, '2013-07-29 17:00:26', '2013-07-29 08:00:26', 1),
(91, 'fkasina@trocaire.or.ke', 5, '2013-07-29 17:00:27', '2013-07-29 08:00:27', 1),
(92, 'maggie@thet.org', 5, '2013-07-29 17:00:27', '2013-07-29 08:00:27', 1),
(93, 'timur.bekir@thet.org', 5, '2013-07-29 17:00:27', '2013-07-29 08:00:27', 1),
(94, 'yassmin@thet.org', 5, '2013-08-05 08:27:05', '2013-08-05 11:27:05', 1),
(95, 'm-oduor@dfid.gov.uk', 5, '2013-08-05 08:27:05', '2013-08-05 11:27:05', 1),
(96, 'john.smith@example.com', 5, '2013-08-05 08:27:05', '2013-08-05 11:27:05', 1),
(97, 'dfest@psikenya.org', 6, '2013-08-05 08:27:05', '2013-08-05 11:27:05', 1),
(98, 'mtolmino@psi.org', 6, '2013-08-05 08:27:05', '2013-08-05 11:27:05', 1),
(99, 'rohit.odari@healthunlimited.org', 6, '2013-08-05 08:27:05', '2013-08-05 11:27:05', 1),
(100, 'thomas.okedi@thet.org', 6, '2013-08-05 08:27:05', '2013-08-05 11:27:05', 1),
(101, 'kunuz.abdella@savethechildren.org', 6, '2013-08-05 08:27:05', '2013-08-05 11:27:05', 1),
(102, 'aali@trocaire.or.ke', 6, '2013-08-05 08:27:05', '2013-08-05 11:27:05', 1),
(103, 'JimmiBraun@gmail.com', 6, '2013-08-05 08:27:05', '2013-08-05 11:27:05', 1),
(104, 'kiruik@gmail.com', 6, '2013-08-05 17:00:26', '2013-08-05 08:00:26', 1),
(105, 'samira@thet.org', 6, '2013-08-05 17:00:26', '2013-08-05 08:00:26', 1),
(106, 'abdiali.mohamed@savethechildren.org', 6, '2013-08-05 17:00:26', '2013-08-05 08:00:26', 1),
(107, 'emilien@thet.org', 6, '2013-08-05 17:00:26', '2013-08-05 08:00:26', 1),
(108, 'wario.guracha@thet.org', 6, '2013-08-05 17:00:27', '2013-08-05 08:00:27', 1),
(109, 'mshauri@thet.org', 6, '2013-08-05 17:00:27', '2013-08-05 08:00:27', 1),
(110, 'dgulino@psi.org', 6, '2013-08-05 17:00:27', '2013-08-05 08:00:27', 1),
(111, 'mhermann@psi.org', 6, '2013-08-05 17:00:27', '2013-08-05 08:00:27', 1),
(112, 'pannaerasmus80@gmail.com', 6, '2013-08-05 17:00:27', '2013-08-05 08:00:27', 1),
(113, 'jjchelule@gmail.com', 6, '2013-08-05 17:00:27', '2013-08-05 08:00:27', 1),
(114, 'fkasina@trocaire.or.ke', 6, '2013-08-12 17:00:28', '2013-08-12 08:00:28', 1),
(115, 'maggie@thet.org', 6, '2013-08-12 17:00:28', '2013-08-12 08:00:28', 1),
(116, 'timur.bekir@thet.org', 6, '2013-08-12 17:00:29', '2013-08-12 08:00:29', 1),
(117, 'yassmin@thet.org', 6, '2013-08-12 17:00:29', '2013-08-12 08:00:29', 1),
(118, 'm-oduor@dfid.gov.uk', 6, '2013-08-12 17:00:29', '2013-08-12 08:00:29', 1),
(119, 'john.smith@example.com', 6, '2013-08-12 17:00:29', '2013-08-12 08:00:29', 1),
(120, 'dfest@psikenya.org', 7, '2013-08-13 05:46:05', '2013-08-13 08:46:05', 1),
(121, 'mtolmino@psi.org', 7, '2013-08-13 05:46:05', '2013-08-13 08:46:05', 1),
(122, 'rohit.odari@healthunlimited.org', 7, '2013-08-13 05:46:05', '2013-08-13 08:46:05', 1),
(123, 'thomas.okedi@thet.org', 7, '2013-08-13 05:46:05', '2013-08-13 08:46:05', 1),
(124, 'kunuz.abdella@savethechildren.org', 7, '2013-08-13 05:46:05', '2013-08-13 08:46:05', 1),
(125, 'aali@trocaire.or.ke', 7, '2013-08-13 05:46:05', '2013-08-13 08:46:05', 1),
(126, 'JimmiBraun@gmail.com', 7, '2013-08-13 05:46:05', '2013-08-13 08:46:05', 1),
(127, 'kiruik@gmail.com', 7, '2013-08-13 05:46:05', '2013-08-13 08:46:05', 1),
(128, 'samira@thet.org', 7, '2013-08-13 05:46:05', '2013-08-13 08:46:05', 1),
(129, 'abdiali.mohamed@savethechildren.org', 7, '2013-08-13 05:46:05', '2013-08-13 08:46:05', 1),
(130, 'emilien@thet.org', 7, '2013-08-19 07:15:51', '2013-08-19 10:15:51', 1),
(131, 'wario.guracha@thet.org', 7, '2013-08-19 07:15:53', '2013-08-19 10:15:53', 1),
(132, 'mshauri@thet.org', 7, '2013-08-19 07:15:53', '2013-08-19 10:15:53', 1),
(133, 'dgulino@psi.org', 7, '2013-08-19 07:15:54', '2013-08-19 10:15:54', 1),
(134, 'mhermann@psi.org', 7, '2013-08-19 07:15:54', '2013-08-19 10:15:54', 1),
(135, 'pannaerasmus80@gmail.com', 7, '2013-08-19 07:15:54', '2013-08-19 10:15:54', 1),
(136, 'jjchelule@gmail.com', 7, '2013-08-19 07:15:54', '2013-08-19 10:15:54', 1),
(137, 'fkasina@trocaire.or.ke', 7, '2013-08-19 07:15:54', '2013-08-19 10:15:54', 1),
(138, 'maggie@thet.org', 7, '2013-08-19 07:15:54', '2013-08-19 10:15:54', 1),
(139, 'timur.bekir@thet.org', 7, '2013-08-19 07:15:54', '2013-08-19 10:15:54', 1),
(140, 'yassmin@thet.org', 7, '2013-08-19 17:00:26', '2013-08-19 08:00:26', 1),
(141, 'm-oduor@dfid.gov.uk', 7, '2013-08-19 17:00:26', '2013-08-19 08:00:26', 1),
(142, 'john.smith@example.com', 7, '2013-08-19 17:00:26', '2013-08-19 08:00:26', 1),
(143, 'dfest@psikenya.org', 8, '2013-08-19 17:00:26', '2013-08-19 08:00:26', 1),
(144, 'mtolmino@psi.org', 8, '2013-08-19 17:00:27', '2013-08-19 08:00:27', 1),
(145, 'rohit.odari@healthunlimited.org', 8, '2013-08-19 17:00:27', '2013-08-19 08:00:27', 1),
(146, 'thomas.okedi@thet.org', 8, '2013-08-19 17:00:27', '2013-08-19 08:00:27', 1),
(147, 'kunuz.abdella@savethechildren.org', 8, '2013-08-19 17:00:27', '2013-08-19 08:00:27', 1),
(148, 'aali@trocaire.or.ke', 8, '2013-08-19 17:00:27', '2013-08-19 08:00:27', 1),
(149, 'JimmiBraun@gmail.com', 8, '2013-08-19 17:00:27', '2013-08-19 08:00:27', 1),
(150, 'kiruik@gmail.com', 8, '2013-08-26 17:00:26', '2013-08-26 08:00:26', 1),
(151, 'samira@thet.org', 8, '2013-08-26 17:00:26', '2013-08-26 08:00:26', 1),
(152, 'abdiali.mohamed@savethechildren.org', 8, '2013-08-26 17:00:26', '2013-08-26 08:00:26', 1),
(153, 'emilien@thet.org', 8, '2013-08-26 17:00:26', '2013-08-26 08:00:26', 1),
(154, 'wario.guracha@thet.org', 8, '2013-08-26 17:00:26', '2013-08-26 08:00:26', 1),
(155, 'mshauri@thet.org', 8, '2013-08-26 17:00:26', '2013-08-26 08:00:26', 1),
(156, 'dgulino@psi.org', 8, '2013-08-26 17:00:26', '2013-08-26 08:00:26', 1),
(157, 'mhermann@psi.org', 8, '2013-08-26 17:00:26', '2013-08-26 08:00:26', 1),
(158, 'pannaerasmus80@gmail.com', 8, '2013-08-26 17:00:26', '2013-08-26 08:00:26', 1),
(159, 'jjchelule@gmail.com', 8, '2013-08-26 17:00:27', '2013-08-26 08:00:27', 1),
(160, 'fkasina@trocaire.or.ke', 8, '2013-09-02 17:00:25', '2013-09-02 08:00:25', 1),
(161, 'maggie@thet.org', 8, '2013-09-02 17:00:25', '2013-09-02 08:00:25', 1),
(162, 'timur.bekir@thet.org', 8, '2013-09-02 17:00:25', '2013-09-02 08:00:25', 1),
(163, 'yassmin@thet.org', 8, '2013-09-02 17:00:26', '2013-09-02 08:00:26', 1),
(164, 'm-oduor@dfid.gov.uk', 8, '2013-09-02 17:00:26', '2013-09-02 08:00:26', 1),
(165, 'john.smith@example.com', 8, '2013-09-02 17:00:26', '2013-09-02 08:00:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category`) VALUES
(1, 'Behavior Change Communication'),
(2, 'Service delivery'),
(3, 'Maternal health'),
(4, 'Child health'),
(5, 'Social franchise network'),
(6, 'Research and social marketing'),
(7, 'Supervision and monitoring'),
(8, 'Collaboration with partners'),
(9, 'Training'),
(10, 'General'),
(11, 'Capacity building'),
(12, 'Work against sexual & gender based violence & FGM/C'),
(13, 'Test category'),
(14, 'Poster-ANC'),
(15, 'Reports');

-- --------------------------------------------------------

--
-- Table structure for table `cizacl_resources`
--

CREATE TABLE IF NOT EXISTS `cizacl_resources` (
  `cizacl_resource_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cizacl_resource_type` enum('controller','function') NOT NULL,
  `cizacl_resource_controller` varchar(50) NOT NULL,
  `cizacl_resource_function` varchar(50) DEFAULT NULL,
  `cizacl_resource_description` varchar(255) DEFAULT NULL,
  `cizacl_resource_added_by` int(10) NOT NULL,
  `cizacl_resource_edited_by` int(10) DEFAULT NULL,
  `cizacl_resource_added_on` int(10) NOT NULL,
  `cizacl_resource_edited_on` int(10) DEFAULT NULL,
  PRIMARY KEY (`cizacl_resource_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=31 ;

--
-- Dumping data for table `cizacl_resources`
--

INSERT INTO `cizacl_resources` (`cizacl_resource_id`, `cizacl_resource_type`, `cizacl_resource_controller`, `cizacl_resource_function`, `cizacl_resource_description`, `cizacl_resource_added_by`, `cizacl_resource_edited_by`, `cizacl_resource_added_on`, `cizacl_resource_edited_on`) VALUES
(1, 'controller', 'login', NULL, 'Login controller', 0, 1, 1311112800, 1371203952),
(2, 'controller', 'cizacl', NULL, 'ACL Controller', 0, 1, 1311112800, 1371202889),
(4, 'controller', 'categories', NULL, 'Categories', 1, NULL, 1371202869, NULL),
(6, 'controller', 'edit_content', NULL, 'Edit Content', 1, NULL, 1371202967, NULL),
(9, 'controller', 'hcs_tab_upload', NULL, 'Upload Content', 1, NULL, 1371203233, NULL),
(14, 'controller', 'meeting_minutes', NULL, 'Meeting Minutes', 1, NULL, 1371204672, NULL),
(15, 'controller', 'reports', NULL, 'Reports controller', 1, NULL, 1371204978, NULL),
(18, 'controller', 'user_management', NULL, 'User management', 1, NULL, 1371205139, NULL),
(30, 'controller', 'home', NULL, 'Home controller', 0, 1, 1371205340, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cizacl_roles`
--

CREATE TABLE IF NOT EXISTS `cizacl_roles` (
  `cizacl_role_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cizacl_role_name` varchar(20) NOT NULL,
  `cizacl_role_inherit_id` varchar(50) DEFAULT NULL,
  `cizacl_role_redirect` varchar(255) NOT NULL,
  `cizacl_role_description` varchar(255) DEFAULT NULL,
  `cizacl_role_default` tinyint(1) unsigned NOT NULL,
  `cizacl_role_order` smallint(3) unsigned NOT NULL DEFAULT '998',
  PRIMARY KEY (`cizacl_role_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cizacl_roles`
--

INSERT INTO `cizacl_roles` (`cizacl_role_id`, `cizacl_role_name`, `cizacl_role_inherit_id`, `cizacl_role_redirect`, `cizacl_role_description`, `cizacl_role_default`, `cizacl_role_order`) VALUES
(1, 'Administrator', NULL, 'cizacl', '', 0, 1),
(2, 'Guest', NULL, 'login', NULL, 1, 2),
(3, 'registerd_user', '["2"]', 'home', 'Normal user', 0, 3),
(4, 'champion', '["3"]', 'home', 'Admin user', 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `cizacl_rules`
--

CREATE TABLE IF NOT EXISTS `cizacl_rules` (
  `cizacl_rule_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cizacl_rule_cizacl_role_id` int(11) DEFAULT NULL,
  `cizacl_rule_type` enum('allow','deny') NOT NULL,
  `cizacl_rule_cizacl_resource_controller` text NOT NULL,
  `cizacl_rule_cizacl_resource_function` text,
  `cizacl_rule_status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cizacl_rule_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cizacl_rule_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=39 ;

--
-- Dumping data for table `cizacl_rules`
--

INSERT INTO `cizacl_rules` (`cizacl_rule_id`, `cizacl_rule_cizacl_role_id`, `cizacl_rule_type`, `cizacl_rule_cizacl_resource_controller`, `cizacl_rule_cizacl_resource_function`, `cizacl_rule_status`, `cizacl_rule_description`) VALUES
(1, 1, 'allow', '[null]', '[null]', 1, ''),
(2, 2, 'allow', '["login"]', '[null]', 1, ''),
(38, 3, 'allow', '["reports"]', '[null]', 1, ''),
(5, 4, 'allow', '[null]', '[null]', 1, ''),
(36, 3, 'allow', '["meeting_minutes"]', '[null]', 1, ''),
(32, NULL, 'allow', '["home"]', '[null]', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `cizacl_session`
--

CREATE TABLE IF NOT EXISTS `cizacl_session` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `cizacl_session`
--

INSERT INTO `cizacl_session` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('adad086cbce611b8beb703947976147b', '66.249.73.76', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1382680166, ''),
('583602932f9b1d924ed7d1d644af002e', '66.249.73.76', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1382679825, ''),
('92570d2865745d64921a83cc4d48570b', '66.249.73.76', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1382679358, ''),
('85a75fac104a943612021fcd9812c45e', '202.46.55.21', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0)', 1382685169, ''),
('79c21624f9f3d72d858ab59249ab7494', '66.249.73.76', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1382684368, ''),
('085814a6d5c09d0a5ec9f45dd02c9b54', '66.249.73.76', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1382683584, ''),
('ba9a0ec3141b1bfb8daada1d6b4b4d3b', '66.249.73.76', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1382686820, ''),
('1843872aceab758cc109ac0659d8534d', '66.249.73.76', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1382686417, ''),
('29223eecb17967bc52b23b04b019efb0', '66.249.73.76', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1382682525, ''),
('9025321068929e1afade008b0feb1812', '66.249.73.76', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1382682569, ''),
('16ad10fa1f86fde94968fa0642393226', '66.249.73.76', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1382685560, ''),
('598d0b7b4eb047ffcff467569cc2369a', '119.63.193.195', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0)', 1382685248, ''),
('9bace94317482395a583f21676c02594', '66.249.73.76', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1382681409, ''),
('e297fce6d39d39a84fb3c0e64dc1d903', '66.249.73.76', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1382681040, '');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `document_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `size` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `directory_path` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `upload_date` varchar(30) NOT NULL,
  `edited` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `downloads` int(11) NOT NULL,
  PRIMARY KEY (`document_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`document_id`, `file_name`, `title`, `description`, `size`, `type`, `directory_path`, `user_id`, `upload_date`, `edited`, `views`, `downloads`) VALUES
(13, 'Save_the_Children_BCC_strategy.pdf', 'Save the Children BCC Strategy', 'Behavior Change Communication Strategy For Maternal, Neonatal and Child Health In Karkaar Region Of Puntland, Somalia\n', 2466, 'application/pdf', 'uploads/documents/', 6, '2013-05-27 06:45:37', 0, 0, 0),
(14, 'Save_the_Children_KAP_survey.pdf', 'Save the Children KAP survey', 'KAP Survey on Maternal and Child Health in Karkaar Region of Puntland,Somalia Report', 3270, 'application/pdf', 'uploads/documents/', 6, '2013-05-30 02:10:31', 0, 0, 0),
(15, 'Infrastructure_support_to_health_system_in_Somaliland_18_2012.pdf', 'Infrastructure support to health system in Somaliland', 'Infrastructural support to Ministry of Health through EPHS in Sahil, Somaliland\n', 3742, 'application/pdf', 'uploads/documents/', 4, '2013-05-30 02:32:47', 0, 0, 0),
(16, 'HPA_Brochure_final.pdf', 'HPA latest brochure', '', 2810, 'application/pdf', 'uploads/documents/', 4, '2013-05-30 02:38:01', 0, 0, 0),
(17, 'A_beacon_of_hope_to_the_neglected.docx', 'A beacon of hope to the neglected', 'A story about what HPA is doing in Godawayn health centre, Godaweyn village, in the Sahil region of Somaliland', 253, 'application/msword', 'uploads/documents/', 4, '2013-05-30 02:47:48', 0, 0, 0),
(18, 'Berbera_solar_power_installation.docx', 'Berbera solar power installation', 'Berbera Hospital is a last resort to patients seeking care in Sahil Region of Somaliland', 292, 'application/msword', 'uploads/documents/', 4, '2013-05-30 02:51:17', 0, 0, 0),
(19, 'Just_on_time....docx', 'Just on time', 'A few stories about how timely interventions make a difference', 226, 'application/msword', 'uploads/documents/', 4, '2013-05-30 03:03:28', 0, 0, 0),
(20, 'PSI_SOMALILAND_PROGRAMS.docx', 'PSI Somaliland programs 2012', 'All our programs in Somaliland', 35, 'application/msword', 'uploads/documents/', 2, '2013-06-10 01:13:23', 0, 0, 0),
(25, 'Photos_from_Karkaar_health_programe.docx', 'Photos from Karkaar HCS programme', 'Photos describing different health activities implemented by HCS programme in Karkaar', 2602, 'application/msword', 'uploads/documents/', 6, '2013-06-06 06:18:36', 0, 0, 0),
(27, 'TRAC_SUMMARY_REPORT_PSI_2012.pdf', 'PSI TRaC Summary Report  2012', 'A baseline study on PSI’s programmes: \nbehaviors and related factors among married women of reproductive age for birth spacing, nutrition, pneumonia and prevention and treatment of diarrhea \n', 1121, 'application/pdf', 'uploads/documents/', 3, '2013-06-19 03:45:36', 0, 0, 0),
(28, 'THET_BSc_MIDWIFERY_GRADUATION_REPORT_SOMALILAND.pdf', 'BSC Midwifery Graduation Report', 'The first BSC Midwives in Somaliland graduated in October 2012 from the University of Hargeisa in conjunction with Edna Adan University Hospital and supported and facilitated by THET', 1505, 'application/pdf', 'uploads/documents/', 14, '2013-06-24 05:20:07', 0, 0, 0),
(29, 'December_Medical_Education_Stakeholder_Meeting_report.pdf', 'Medical Education Stakeholders Workshop', 'This took place in December 2012', 1043, 'application/pdf', 'uploads/documents/', 14, '2013-06-24 05:41:15', 0, 0, 0),
(30, 'Miso_Webinar_savedate_2013.pdf', 'Misoprostol webinar - May 2013', 'PSI presented the Somaliland misoprostol program during a webinar organized by Family Care International, in partnership with PATH, Gynuity Health Projects, and PSI', 938, 'application/pdf', 'uploads/documents/', 3, '2013-06-25 01:56:51', 0, 0, 0),
(39, 'MAP_study_final_report_PSI_Somaliland.pdf', 'PSI MAP study 2012', 'The PSI Measuring Access and Performance (MAP) research evaluated the availability of PSI modern birth spacing, diarrhea treatment, and water treatment products among private pharmacies in 10 cities of 5 regions of Somaliland ', 510, 'application/pdf', 'uploads/documents/', 3, '2013-07-07 02:18:23', 0, 0, 0),
(40, 'Oxytocin_assessment_report_Jan_2013.PDF', 'Oxytocin assessment report', 'In January 2013, PSI has conducted a survey to assess storage of Oxytocin among private sector pharmacies and wholesalers ', 302, 'application/pdf', 'uploads/documents/', 3, '2013-07-07 07:20:10', 0, 0, 0),
(41, '130630_PSI_Somaliland_brief.pdf', 'PSI Somaliland - brief', 'Summary of PSI Somaliland presence and current interventions - updated to May 2013', 401, 'application/pdf', 'uploads/documents/', 23, '2013-07-21 23:16:47', 0, 0, 0),
(42, '121125_SFN_in_Somaliland_HSC_november_hargeisa.pdf', 'Social Franchise Network - presentation', 'Bulsho Kaab (PSI Social Franchise in Somaliland) presentation on the occasion of the Health Sector meeting of November 2012 in Hargeisa', 396, 'application/pdf', 'uploads/documents/', 23, '2013-07-22 00:14:48', 0, 0, 0),
(43, 'EmONC_-_facilitator_manual_pdf.pdf', 'EmONC Facilitator Manual', '', 1973, 'application/pdf', 'uploads/documents/', 14, '2013-07-23 03:30:02', 0, 0, 0),
(44, 'NHPC_HEALTH_SECTOR_REGULATION_EXPOSURE_VISIT_REPORT.pdf', 'NHPC Health Sector Regulation Exposure Visit Report', 'NHPC and THET''s visit to Uganda', 1536, 'application/pdf', 'uploads/documents/', 14, '2013-07-23 03:31:28', 0, 0, 0),
(45, 'NHPCReport_Affara_December_2011.pdf', 'NHPC Report Dec 2011', '', 1650, 'application/pdf', 'uploads/documents/', 14, '2013-07-23 03:32:25', 0, 0, 0),
(46, 'SOMALILAND_CHW_ToT_CURRICULUM_2013.pdf', 'Somaliland CHW ToT Curriculum 2013', '', 1592, 'application/pdf', 'uploads/documents/', 14, '2013-07-23 03:33:32', 0, 0, 0),
(47, 'SOMALILAND_CHW_TOT_MANUAL_2013.pdf', 'Somaliland CHW ToT Manual 2013', '', 2148, 'application/pdf', 'uploads/documents/', 14, '2013-07-23 03:34:32', 0, 0, 0),
(48, 'SOMALILAND_COMMUNITY_HEALTH_WORKER_(CHW)_TRAINING_MANUAL_2013.pdf', 'Somaliland CHW Training Manual 2013', '', 7850, 'application/pdf', 'uploads/documents/', 14, '2013-07-23 03:36:51', 0, 0, 0),
(49, 'SOMALILAND_COMMUNITY_HEALTH_WORKERS_(CHW)_TRAINING_CURRICULUM_2013.pdf', 'Somaliland CHW Training Curriculum 2013', '', 1705, 'application/pdf', 'uploads/documents/', 14, '2013-07-23 03:37:41', 0, 0, 0),
(50, 'FINAL_FoQus_Male_Report.pdf', 'FoQus study ', 'The study was conducted to explore men''s perceptions, understanding and behavior with regard to maternal health and how to best involve them in maternal health programs', 778, 'application/pdf', 'uploads/documents/', 3, '2013-10-23 23:14:40', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `document_categories`
--

CREATE TABLE IF NOT EXISTS `document_categories` (
  `document_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`document_id`,`category_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document_categories`
--

INSERT INTO `document_categories` (`document_id`, `category_id`) VALUES
(18, 2),
(25, 2),
(46, 2),
(40, 3),
(43, 3),
(46, 3),
(47, 3),
(48, 3),
(49, 3),
(42, 5),
(27, 6),
(39, 6),
(50, 6),
(29, 8),
(44, 8),
(45, 8),
(43, 9),
(46, 9),
(47, 9),
(48, 9),
(49, 9),
(20, 10),
(41, 10),
(15, 11),
(16, 11),
(17, 11),
(44, 11),
(45, 11);

-- --------------------------------------------------------

--
-- Table structure for table `drafts`
--

CREATE TABLE IF NOT EXISTS `drafts` (
  `draft_id` int(11) NOT NULL AUTO_INCREMENT,
  `draft_title` text NOT NULL,
  `description` text NOT NULL,
  `type` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(100) NOT NULL,
  `file` varchar(200) NOT NULL,
  `slug` text NOT NULL,
  PRIMARY KEY (`draft_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `drafts`
--

INSERT INTO `drafts` (`draft_id`, `draft_title`, `description`, `type`, `size`, `date_created`, `user_id`, `file`, `slug`) VALUES
(1, '', 'sldksdlklskdlskdlksd', '', '', '2013-09-27 21:11:36', 1122, '', 'sldsldsldk'),
(2, '', 'sdkskdjsdjksjd', '', '', '2013-09-27 21:14:06', 12, '', 'sdkjskdjskdjkj');

-- --------------------------------------------------------

--
-- Table structure for table `draft_comments`
--

CREATE TABLE IF NOT EXISTS `draft_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_title` text NOT NULL,
  `description` text NOT NULL,
  `user_id` int(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `type` varchar(80) NOT NULL,
  `size` text NOT NULL,
  `draft_id` int(10) NOT NULL,
  `slug` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`draft_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `draft_comments`
--

INSERT INTO `draft_comments` (`id`, `comment_title`, `description`, `user_id`, `file`, `type`, `size`, `draft_id`, `slug`, `timestamp`) VALUES
(1, 'whebrhwebrhebr', 'skdskdjaksjdkjsdkj', 2, 'docs', 'sdsldkslkd', 'dlkfdlkfdlkfdlkfldkf', 0, '', '2013-10-02 21:51:56');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `event_venue` varchar(255) NOT NULL,
  `edited` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`event_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `description`, `start_date`, `end_date`, `event_venue`, `edited`, `user_id`) VALUES
(1, 'BCC Event', 'Behavioral change change communication event', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Mogadishu', 0, 2),
(2, 'Maternal Care', 'Maternal Health care meeting for mothers done @ Mogadishu hospital', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Mogadishu Hospital', 0, 2),
(3, 'ABC Event', 'Abstinence, Being Faithful, Condom use, ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Kismayu', 0, 2),
(4, 'Sample training', 'Sample training event', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Nairobi', 0, 2),
(5, 'Web site launch', 'we are finally launching the site!', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'PSI offices', 0, 6),
(6, 'BCC Event 2013', 'Behavioral Change Communication Event', '2013-06-10 01:00:00', '2013-06-10 11:00:00', 'Beles Quoqani', 0, 12),
(7, 'Quarterly DFID HCS Meeting with Partners', 'Meeting to update on status report, outline challenges & solutions, and address previous action points.  This meeting will also review the DFID Annual Review action points and the status of VfM.', '2013-06-24 01:00:00', '2013-06-24 09:00:00', 'PSI Kenya Office in Nairobi', 0, 2),
(8, 'DFID HCS Partner Sustainability Workshop', 'Two day inter-active workshop for HCS partners to outline a sustainability strategy for the next 3-5 years.  ', '2013-10-10 02:00:00', '2013-10-11 09:00:00', 'PSI Kenya Office in Nairobi', 0, 2),
(9, 'Web site quality assurance', 'Vestibulum interdum augue quis ultrices bibendum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Morbi at orci consectetur, fringilla nulla vitae, volutpat leo. Duis laoreet, urna vel imperdiet mattis, felis urna dignissim urna, a malesuada dolor dui quis dolor. Phasellus quis erat mattis orci luctus ultricies. Duis tincidunt enim justo, non ornare urna porta id', '2013-06-25 17:00:00', '2013-06-27 17:00:00', 'PSI offices, Nairobi', 0, 2),
(12, 'First event', 'First Beles Quaoqani', '2013-07-10 01:00:00', '2013-07-11 10:00:00', 'Beles Quoqani', 1372778775, 18),
(13, 'Second Event', 'Second test event', '2013-07-22 17:00:00', '2013-07-29 17:00:00', 'Kismayu', 1372781165, 18),
(22, 'Breast-feeding Week', 'This week campaign is aimed at sensitizing lactating mothers on the importance of exclusivly breast-feeding their new-borns for the first six months, so as to enhance their immunity and therefore reducing infant deaths (due to disease) considerably.', '2013-08-01 02:00:00', '2013-08-07 10:00:00', 'Gedo', 0, 28),
(23, 'Test event', 'just a test event', '2013-08-07 23:13:00', '2013-08-08 07:00:00', 'PSI offices, Nairobi', 0, 2),
(24, 'Bi-monthly review and planning meeting', 'Team leaders of RHCs and HCs together with RHO and HPA sit together to review the last two months progress and plan for next two months.', '2013-08-13 17:00:00', '2013-08-15 05:00:00', 'RHO office, Berbera, Sahil', 0, 4),
(25, 'Quality of Care and Improvement training', 'Five days Quality of Care and Improvement training has planned for Team Leaders and Qualified Nurses/Midwives of Referral Health Centers and Health Centers of Sahil region, Somaliland', '2013-08-16 17:00:00', '2013-08-20 17:00:00', 'Sheikh, Sahil', 0, 4),
(26, 'HCS quarterly review meeting', '', '2013-11-25 00:00:00', '2013-10-25 00:00:00', 'PSI Kenya', 1381645888, 3),
(27, 'HCS quarterly review meeting', '', '2013-11-26 00:00:00', '2013-11-26 00:00:00', 'PSI Kenya', 0, 3),
(28, 'HCS quarterly review meeting', '', '2013-11-27 12:00:00', '2013-11-27 00:00:00', 'PSI Kenya', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `caption` text NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `size` float NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `user_id`, `caption`, `image_path`, `type`, `size`, `created`) VALUES
(20, 2, 'I was at the coast ', 'coast.jpg', '.jpg', 52.1, '2013-06-04 11:17:32'),
(19, 14, 'CHW Curriculum Launch 2013', 'P1010204.JPG', '.JPG', 5299.5, '2013-06-03 07:46:17'),
(18, 6, 'Save the Children solar power supported EPI fridge in Gardo Karkaar', 'Save_the_Childre_solar_power_supported_EPI_fridge_in_Gardo_Karkaar.jpg', '.jpg', 1470.3, '2013-05-30 09:17:32'),
(17, 6, 'Save the Children Rehabilitated health center in Gardo Karkaar', 'Save_the_Children_Rehabilitated_health_center_in_gardo__Karkaar.jpg', '.jpg', 2224.48, '2013-05-30 09:15:35'),
(16, 2, 'PSI IPC Session', 'smile.jpg', '.jpg', 395.43, '2013-05-30 08:25:06'),
(21, 6, 'Karkaar MCH center with Solar Energy', '20121008_094110.jpg', '.jpg', 1495.67, '2013-06-06 13:23:39'),
(22, 2, 'Some HPA photos I uploaded', 'hpa_photos', '.zip', 680.53, '2013-06-10 14:49:43'),
(23, 2, 'Testing the album function', 'test-hcs', '.zip', 357.63, '2013-06-17 13:31:19'),
(24, 3, 'PSI community health promoter conducting health education sessions at community level', 'CHP_conducting_health_education_session.jpg', '.jpg', 93.51, '2013-07-07 09:51:35'),
(25, 3, 'PSI Birth Spacing counseling training to nurses and midwives conducted through SOFHA', 'Birth_Spacing_Counseling_Training_SOFHA.jpg', '.jpg', 2226.61, '2013-07-07 10:05:41'),
(26, 2, 'jsdj', 'sample_poster.jpg', '.jpg', 616.7, '2013-07-08 16:57:48'),
(27, 2, 'Test for single photo', 'test.jpg', '.jpg', 616.7, '2013-07-08 18:21:12'),
(28, 2, 'Seeing if the single photo issue has been fixed', 'test1.jpg', '.jpg', 616.7, '2013-07-08 18:41:23'),
(29, 2, 'Some awesome Mutua Matheka photos', 'mutua_matheka', '.zip', 3863.44, '2013-07-08 18:47:17'),
(30, 3, 'PSI community health promoter conducting health education sessions at community level', 'CHP_conducting_health_education_session.jpg', '.jpg', 93.51, '2013-07-09 06:09:45'),
(31, 6, 'Photos from Save the Children for SHARE home page', 'Pictures_for_SHARE_homepage', '.zip', 319.35, '2013-07-19 12:24:31'),
(32, 14, 'CHW Document Launch with Somaliland MoH in April 2013', 'P1010204.jpg', '.jpg', 2317.13, '2013-07-23 10:39:17');

-- --------------------------------------------------------

--
-- Table structure for table `innovations_and_lessons`
--

CREATE TABLE IF NOT EXISTS `innovations_and_lessons` (
  `innovation_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `size` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `upload_date` varchar(30) NOT NULL,
  `edited` int(11) NOT NULL,
  `directory_path` varchar(255) NOT NULL,
  `downloads` int(11) NOT NULL,
  PRIMARY KEY (`innovation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `innovations_and_lessons`
--

INSERT INTO `innovations_and_lessons` (`innovation_id`, `file_name`, `title`, `description`, `size`, `type`, `user_id`, `views`, `upload_date`, `edited`, `directory_path`, `downloads`) VALUES
(6, 'Case_story-LUCKY_CBO.docx', 'Case stores of LUCKY CBO Lasadaw', 'HPA has been worked with Community Based Organisation called LUCKY in Lasadaw, Sahil to aware the rural communities on FGM, SGBV, rapes and other health issues.', 580, 'application/msword', 4, 0, '2013-06-03 00:47:45', 0, 'uploads/innovations_and_lessons/', 0),
(7, 'Case_Study_PSI_Somaliland_voucher_system_Safe_motherhood__June_2013.docx', 'PSI Somaliland Safe Motherhood Voucher Project Lessons Learned', 'This lessons learned paper on the PSI Somaliland Safe Motherhood Voucher program highlights how the project was set up, implemented, and the impact.  There are key lessons shared in how to improve a voucher program in the future.', 33, 'application/msword', 2, 0, '2013-06-24 04:38:59', 0, 'uploads/innovations_and_lessons/', 0),
(9, 'Word_Sample.docx', 'First Innovation2', 'Sample Innovation', 25, 'application/msword', 18, 0, '2013-07-02 06:24:49', 1372772448, 'uploads/innovations_and_lessons/', 0),
(10, 'PDF_Sample.pdf', 'Second Innovation2', 'Second sample innovation', 16, 'application/pdf', 18, 0, '2013-07-02 06:27:42', 1372783459, 'uploads/innovations_and_lessons/', 0),
(12, 'Story_from_IPC_Birth_Spacing.docx', 'A success story from the IPC program', 'This story highlights the positive impact of the IPC program on a woman''s life ', 216, 'application/msword', 3, 0, '2013-07-09 06:39:03', 0, 'uploads/innovations_and_lessons/', 0),
(13, 'Saving_lives_one_donkey-cart_at_a_time.pdf', 'Saving lives, one donkey-cart at a time', 'Zeinab Mohamed talks of how finding affordable transport has gone a long way to saving her child.', 177, 'application/pdf', 28, 0, '2013-07-12 04:02:55', 0, 'uploads/innovations_and_lessons/', 0),
(14, 'Religious_leaders_in_Puntland_raised_their_voice_in_support_of_birth_pacing_and_addressing_GBV_-docx.docx', 'Birth Spacing Messaging with Religious Leaders in Puntland', 'Religious leaders from Puntland provide their support in communicating about birth spacing issues with UNFPA ', 20, 'application/msword', 2, 0, '2013-07-16 05:52:56', 0, 'uploads/innovations_and_lessons/', 0),
(15, 'Stories_of_change_comressed.pdf', 'Stories of change', 'EPHS Sahil at glance!', 597, 'application/pdf', 4, 0, '2013-08-05 12:22:56', 0, 'uploads/innovations_and_lessons/', 0),
(16, 'Breastfeeding-_Closer_to_mothers,_a_healthier_start_to_life.pdf', 'Breastfeeding- A healthier start to life', 'Somali granny talks of why Somali mothers need to take breastfeeding more ''seriously'' if only to save their children''s lives.', 68, 'application/pdf', 28, 0, '2013-08-29 08:22:44', 0, 'uploads/innovations_and_lessons/', 0),
(17, 'Transferring_Knowledge_and_Skills_from_Network_Providers_to_Non_network_providers.docx', 'A story from a Bulsho-Kaab member', 'Transferring Knowledge and Skills from Network Providers to Non-network Providers', 310, 'application/msword', 3, 0, '2013-09-28 22:45:53', 0, 'uploads/innovations_and_lessons/', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mediacenter`
--

CREATE TABLE IF NOT EXISTS `mediacenter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL COMMENT '0=>radiospot,1=>video,2=>posters',
  `size` float NOT NULL,
  `type` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `views` int(11) NOT NULL DEFAULT '0',
  `downloads` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `mediacenter`
--

INSERT INTO `mediacenter` (`id`, `file`, `title`, `slug`, `description`, `category_id`, `size`, `type`, `user_id`, `created`, `views`, `downloads`) VALUES
(7, 'DSCF7331.JPG', 'CHW Launch Banner 2013', 'chw-launch-banner-2013', '', 2, 3098.75, '.JPG', 14, '2013-06-03 07:42:12', 0, 0),
(8, 'FGM_billboard_2_compressed.pdf', 'FGM poster', 'fgm-poster', 'Poster for Zero Tolerance FGM', 2, 667.65, '.pdf', 4, '2013-06-03 07:42:42', 0, 0),
(6, 'Shubaan_Daaweye_New_Pack.jpg', 'Shubaan Daaweye New Pack', 'shubaan-daaweye-new-pack', '', 2, 2440.26, '.jpg', 2, '2013-05-30 08:33:01', 0, 0),
(5, 'BiyoSifeeye_packaging_FINAL_20121.jpg', 'BiyoSifeeye packaging FINAL 2013', 'biyosifeeye-packaging-final-2013', 'The final poster for the BiyoSifeeye campaign', 2, 915.74, '.jpg', 2, '2013-05-30 08:31:25', 0, 0),
(10, 'BiyoSifeeye_Posters_Doctor.jpg', 'Biyosifeeye Poster ', 'biyosifeeye-poster', 'Biyosifeeye poster highlighting endorsement from a well known doctor from Somaliland', 2, 45.19, '.jpg', 3, '2013-06-21 08:48:59', 0, 0),
(15, 'HMIS_INDICATOR_Chart.pdf', 'HMIS indicator chart', 'hmis-indicator-chart', 'HMIS indicator chart has displayed in all HCs and Referral Health Centers in Sahil. Progress data has been updated monthly in this chart.', 2, 675.49, '.pdf', 4, '2013-08-05 19:37:12', 0, 0),
(14, 'DTK_Billboard.jpg', 'Shuban-Daweeye (DTK) billboard', 'shuban-daweeye-dtk-billboard', 'The message reinforces the use of combined ORS and Zinc during episodes of mild diarrhea in children under five ', 2, 1649.99, '.jpg', 3, '2013-06-27 06:56:55', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `meeting_minutes`
--

CREATE TABLE IF NOT EXISTS `meeting_minutes` (
  `meeting_minutes_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `directory_path` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `upload_date` varchar(30) NOT NULL,
  `edited` int(11) NOT NULL,
  PRIMARY KEY (`meeting_minutes_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `meeting_minutes`
--

INSERT INTO `meeting_minutes` (`meeting_minutes_id`, `file_name`, `type`, `size`, `title`, `description`, `directory_path`, `user_id`, `upload_date`, `edited`) VALUES
(7, 'Minutes_June_4-5_revised_11_06_2013.docx', 'application/msword', 36, 'HCS quarterly meeting minutes- June 2013', '', 'uploads/hcs_tab/meeting_minutes/', 3, '2013-06-21 01:44:09', 0),
(9, 'Word_Sample.docx', 'application/msword', 25, 'First minutes', 'First minutes', 'uploads/hcs_tab/meeting_minutes/', 18, '2013-07-02 07:18:00', 0),
(10, 'PDF_Sample.pdf', 'application/pdf', 16, 'Second Minutes', 'Second test minutes', 'uploads/hcs_tab/meeting_minutes/', 18, '2013-07-02 07:18:24', 0),
(11, '130205_HCS-Quarterly_Meeting_28-30Jan13_minutes.docx', 'application/msword', 38, 'Meeting Minutes January 2013', 'Meeting minutes from the 3 day meeting January 28-30', 'uploads/hcs_tab/meeting_minutes/', 23, '2013-07-14 22:09:43', 0);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `file` varchar(255) NOT NULL,
  `news_title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date_created` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `edited` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`news_id`,`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `file`, `news_title`, `description`, `date_created`, `user_id`, `edited`, `slug`) VALUES
(12, 'HDC_PRESENTATION_ON_THE_SDM_(CYCLE_BEADS).pptx', 'May UN RH TWG', 'Presentation on Cycle Beads', '2013-06-18 23:46:50', 2, 0, 'may-un-rh-twg'),
(22, 'WHO___Midwives_at_heart_of_Somalia’s_new_reproductive_health_strategy.pdf', 'WHO article- "Midwives at heart of Somalia’s new reproductive health strategy"', 'The HCS work on reproductive health was featured in an article published by WHO during the International Day of the Midwife 2013', '2013-07-07 06:50:52', 3, 0, 'who-article-midwives-at-heart-of-somalias-new-reproductive-health-strategy'),
(25, 'Breastfeeding-_Closer_to_mothers,_a_healthier_start_to_life.pdf', 'A healthy start to life for Somali infants', 'Somali granny talks of why Somali mothers need to take breastfeeding more ''seriously'' if only to save their children''s lives.', '2013-08-29 08:38:03', 28, 0, 'a-healthy-start-to-life-for-somali-infants');

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE IF NOT EXISTS `organizations` (
  `organization_id` int(11) NOT NULL AUTO_INCREMENT,
  `organization` varchar(255) NOT NULL,
  PRIMARY KEY (`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`organization_id`, `organization`) VALUES
(1, 'DFID'),
(2, 'Save the Children'),
(3, 'THET'),
(4, 'PSI'),
(5, 'Trocaire'),
(6, 'HPA');

-- --------------------------------------------------------

--
-- Table structure for table `organization_tools`
--

CREATE TABLE IF NOT EXISTS `organization_tools` (
  `tool_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `size` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `upload_date` varchar(30) NOT NULL,
  `edited` int(11) NOT NULL,
  `directory_path` varchar(255) NOT NULL,
  `downloads` int(11) NOT NULL,
  PRIMARY KEY (`tool_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `organization_tools`
--

INSERT INTO `organization_tools` (`tool_id`, `file_name`, `title`, `description`, `size`, `type`, `user_id`, `views`, `upload_date`, `edited`, `directory_path`, `downloads`) VALUES
(8, 'Word_Sample.docx', 'Tool Test3', 'Test Edit 4', 25, 'application/msword', 18, 0, '2013-07-02 06:10:35', 1372782934, 'uploads/tools/', 0),
(9, 'PDF_Sample.pdf', 'Sample tool2', 'Sample PDF tool', 16, 'application/pdf', 18, 0, '2013-07-02 06:11:11', 1372770775, 'uploads/tools/', 0),
(11, 'SFN_Quality_Audit_Checklist__CH_and_RH.pdf', 'SFN quality audit check list', 'This check list is used by PSI staff during quality audit visits among pharmacies that are member of the Social Franchise Network', 107, 'application/pdf', 3, 0, '2013-07-07 07:11:41', 0, 'uploads/tools/', 0),
(12, 'Training_Monitoring_and_Evaluation_Toolkit.pdf', 'Training monitoring and evaluation toolkit', 'This toolkit provides tools to strengthen the monitoring and evaluation of training program ', 1116, 'application/pdf', 3, 0, '2013-07-07 07:26:55', 0, 'uploads/tools/', 0),
(13, 'Supervision_Checklist.xlsx', 'Private Pharmacies - Supervision check list', 'Supervision check list for private pharmacies of the Social Franchise Network - Bulsho-Kaab', 33, 'application/vnd.ms-excel', 23, 0, '2013-07-30 04:47:59', 0, 'uploads/tools/', 0),
(14, 'Operation_Manual_-_version_(Final_draft_on_Nov_5,_2011).docx', 'Social Franchise Network - Operation Manual', 'Operational Manual for pharmacies belonging to the Bulsho-Kaab network', 869, 'application/msword', 23, 0, '2013-07-30 04:50:07', 0, 'uploads/tools/', 0),
(15, 'Memorandum_of_Understanding.doc', 'MoU Bulsho-Kaab - sample', 'Sample agreement between Bulsho-Kaab pharmacies and PSI', 264, 'application/msword', 23, 0, '2013-07-30 04:51:35', 0, 'uploads/tools/', 0),
(16, 'Somaliland_MOH_HRM_Tools_Booklet.pdf', 'Somaliland MOH Human Resource Management Tools Booklet', '', 3920, 'application/pdf', 34, 0, '2013-09-20 02:30:53', 0, 'uploads/tools/', 0);

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE IF NOT EXISTS `regions` (
  `region_id` int(11) NOT NULL AUTO_INCREMENT,
  `region` varchar(255) NOT NULL,
  PRIMARY KEY (`region_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`region_id`, `region`) VALUES
(1, 'Somaliland'),
(2, 'Puntland'),
(3, 'South Central');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `report_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `size` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `directory_path` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `upload_date` varchar(30) NOT NULL,
  `edited` int(11) NOT NULL,
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `title`, `file_name`, `description`, `size`, `type`, `category`, `directory_path`, `user_id`, `upload_date`, `edited`) VALUES
(7, 'Jan to Mar 2013 Quarterly Report SCI', 'Save_the_Chidren_Jan_to_Mar_2013_Quarterly_rep_Narrative_final.docx', 'Narrative progress report for the quarter Jan to Mar 2013', 112, 'application/msword', 'narrative', 'uploads/hcs_tab/reports/', 6, '2013-06-06 06:32:15', 0),
(10, 'Test Report1', 'PDF_Sample.pdf', 'Sample test report', 16, 'application/pdf', 'financial', 'uploads/hcs_tab/reports/', 18, '2013-07-02 06:55:58', 0),
(11, 'Narrative report2', 'Word_Sample.docx', 'Second sample report', 25, 'application/msword', 'narrative', 'uploads/hcs_tab/reports/', 18, '2013-07-02 06:46:18', 1372774640),
(12, 'Quarterly Review HCS June 2013', 'SCI_HCS_quarterly_review_ppt_June_2013.zip', 'Power point presentation at HCS quarterly review on June 4 2013', 2881, 'application/zip', 'narrative', 'uploads/hcs_tab/reports/', 6, '2013-07-09 03:53:33', 0),
(13, 'Stories of change', 'Stories_of_change_comressed.pdf', 'The document contains brief glances of change in general health services in general and mother and child health in specific in Sahil region under HCS programme implemented by HPA ', 597, 'application/pdf', 'narrative', 'uploads/hcs_tab/reports/', 4, '2013-08-05 02:25:04', 0),
(14, 'HCS Value for Money Report', 'Report_-_VFM_support_and_capacity_building_HCS.docx', 'Report on VfM technical support to HCS- recommendations on qualitative and quantitative VfM indicators for the HCS\n\n', 1023, 'application/msword', 'narrative', 'uploads/hcs_tab/reports/', 3, '2013-08-18 23:08:19', 0),
(15, 'CHWs Trainees Selection Report', 'Somaliland_Community_Health_Workers_Trainees_Selection_Report.pdf', 'This report describes the collaboration between THET and the RHOs of Sahil and Awdal in the selection of trainees for the Community Health Worker training. There was need to ensure that the right candidates were selected to ensure success during the training', 1201, 'application/pdf', 'narrative', 'uploads/hcs_tab/reports/', 34, '2013-10-10 23:36:15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE IF NOT EXISTS `tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oauth_token` varchar(255) NOT NULL,
  `oauth_token_secret` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `oauth_token`, `oauth_token_secret`, `created`) VALUES
(2, '1/akRHthFPCuEY5Gd0kZuyJKYezYyKnx5DvsLCXC5S4AA', 'LVi_LmdcpO341AqY2BMc20d8', '2013-07-01 09:10:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_username` varchar(80) NOT NULL,
  `user_password` varchar(64) NOT NULL,
  `user_cizacl_role_id` int(11) NOT NULL,
  `user_auth` int(11) DEFAULT NULL,
  `user_auth_date` int(11) DEFAULT NULL,
  `organization_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=38 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_username`, `user_password`, `user_cizacl_role_id`, `user_auth`, `user_auth_date`, `organization_id`, `region_id`) VALUES
(1, 'admin', 'ade4f39602416a06e84cc559538eee14', 1, NULL, NULL, 0, 0),
(2, 'dfest@psikenya.org', '4319561f4fa818ef990d1e8955c97824', 4, NULL, NULL, 4, 1),
(3, 'mtolmino@psi.org', '031741da91ca0b2bbe4e1a61b3ca3240', 4, NULL, NULL, 4, 1),
(4, 'rohit.odari@healthunlimited.org', '939843da61a463c8c4f4bfa4a3575439', 4, NULL, NULL, 6, 1),
(6, 'kunuz.abdella@savethechildren.org', 'e25bc813624972c8e213796ff97baabe', 4, NULL, NULL, 2, 2),
(7, 'aali@trocaire.or.ke', '6d416c9d785b4c670da59a0c63a0285f', 4, NULL, NULL, 5, 3),
(13, 'kiruik@gmail.com', '805526e0027db3086407bb0954da49d9', 3, NULL, NULL, 2, 1),
(14, 'samira', '88dbda62dbf4f64ee9c8dae693b970a9', 4, NULL, NULL, 3, 1),
(15, 'abdiali.mohamed@savethechildren.org', '06cc0a1637d71a418c3333afa4c3cbde', 3, NULL, NULL, 2, 2),
(18, 'JimmiBraun@gmail.com', '90f0c0a7a5165b01d3c2e4b15f15c464', 4, NULL, NULL, 0, 1),
(21, 'wario.guracha@thet.org', '91147b180293f1ec8f67dc56b47528de', 3, NULL, NULL, 3, 1),
(22, 'mshauri@thet.org', '91147b180293f1ec8f67dc56b47528de', 3, NULL, NULL, 3, 1),
(23, 'dgulino@psi.org', '74d6b703423cc7b0845afb2252a759e7', 4, NULL, NULL, 4, 1),
(24, 'mhermann@psi.org', '504e68efcb0ffa7e545232f824a851a2', 3, NULL, NULL, 4, 1),
(25, 'pannaerasmus80@gmail.com', 'e95f2dd111281c61579b3b3c4ffdb06e', 4, NULL, NULL, 4, 1),
(26, 'jjchelule@gmail.com', 'f02c33f71dd36faaa9bfe6837c1411c4', 4, NULL, NULL, 4, 1),
(28, 'fkasina@trocaire.or.ke', '2c94c0fb27ce232550317c61ab53a542', 4, NULL, NULL, 5, 3),
(29, 'maggie@thet.org', '118a40a70c83f40724e52c9c35560938', 4, NULL, NULL, 3, 1),
(30, 'timur.bekir@thet.org', '118a40a70c83f40724e52c9c35560938', 4, NULL, NULL, 3, 1),
(33, 'm-oduor@dfid.gov.uk', '32cf717e8b28ede8051773a81fded1ac', 4, NULL, NULL, 1, 0),
(34, 'thomas.okedi@thet.org', '9cbfda866ee41dda3f51f36cff037559', 4, NULL, NULL, 3, 1),
(35, 'emilien@thet.org', '379d67f0eeef331a83073697c23f3399', 3, NULL, NULL, 3, 1),
(36, 'ahmed.nuri@thet.org', '379d67f0eeef331a83073697c23f3399', 3, NULL, NULL, 3, 1),
(37, 'mohamud@thet.org', '379d67f0eeef331a83073697c23f3399', 3, NULL, NULL, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE IF NOT EXISTS `user_profiles` (
  `user_profile_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_profile_user_id` int(10) unsigned NOT NULL,
  `user_profile_name` varchar(50) NOT NULL,
  `user_profile_surname` varchar(50) NOT NULL,
  `user_profile_email` varchar(100) DEFAULT NULL,
  `user_profile_user_status_code` tinyint(1) NOT NULL,
  `user_profile_lastaccess` int(11) DEFAULT NULL,
  `user_profile_added` int(11) DEFAULT NULL,
  `user_profile_edited` int(11) DEFAULT NULL,
  `user_profile_added_by` int(10) NOT NULL,
  `user_profile_edited_by` int(10) DEFAULT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_timestamp` int(11) NOT NULL,
  PRIMARY KEY (`user_profile_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=34 ;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`user_profile_id`, `user_profile_user_id`, `user_profile_name`, `user_profile_surname`, `user_profile_email`, `user_profile_user_status_code`, `user_profile_lastaccess`, `user_profile_added`, `user_profile_edited`, `user_profile_added_by`, `user_profile_edited_by`, `reset_hash`, `reset_timestamp`) VALUES
(2, 2, 'Daun', 'Fest', 'dfest@psikenya.org', 1, 1381937198, 1369372275, 1369811591, 1, 1, '42f8dec0a824e54028af4d23fdf57c29', 1373974895),
(3, 3, 'Manuela', 'Tolmino', 'mtolmino@psi.org', 1, 1382595031, 1369372383, 1369811834, 1, 1, NULL, 0),
(4, 4, 'Rohit', 'Odari', 'rohit.odari@healthunlimited.org', 1, 1376373523, 1369372494, 1369812006, 1, 1, NULL, 0),
(31, 35, 'Emilien', 'Nkusi', 'emilien@thet.org', 1, 1378804385, 1378713237, NULL, 14, NULL, NULL, 0),
(6, 6, 'Kunuz', 'Abdella', 'kunuz.abdella@savethechildren.org', 1, 1375097937, 1369372680, 1369811678, 1, 1, NULL, 0),
(7, 7, 'Dr Abdi', 'Tari Ali', 'aali@trocaire.or.ke', 1, 1373006569, 1369372805, 1369811784, 1, 1, NULL, 0),
(14, 18, 'Kigen2', 'C James2', 'JimmiBraun@gmail.com', 1, 1374754307, 1370960477, 1370960496, 12, 12, '', 0),
(9, 13, 'Kirui', 'Kennedy', 'kiruik@gmail.com', 1, 1371027846, 1369666977, NULL, 6, NULL, '', 0),
(10, 14, 'Samira', 'Abu-Helil', 'samira@thet.org', 1, 1378804010, 1370244226, 1374562087, 5, 2, '', 0),
(11, 15, 'Abdi', 'Mohamed', 'abdiali.mohamed@savethechildren.org', 1, 1370525293, 1370525227, NULL, 6, NULL, NULL, 0),
(30, 34, 'Thomas', 'Okedi', 'thomas.okedi@thet.org', 1, 1381490421, 1378713189, NULL, 14, NULL, 'ce09706685ec53490409e515c81760b8', 1381344124),
(17, 21, 'Wario', 'Guracha', 'wario.guracha@thet.org', 1, NULL, 1371021234, NULL, 14, NULL, NULL, 0),
(18, 22, 'Mshauri', 'Delem', 'mshauri@thet.org', 1, 1374676435, 1371021292, NULL, 14, NULL, '', 0),
(19, 23, 'Donato', 'Gulino', 'dgulino@psi.org', 1, 1381935865, 1371375496, 1373791015, 3, 2, '', 0),
(20, 24, 'Christopher', 'Montague', 'mhermann@psi.org', 1, NULL, 1371447204, NULL, 3, NULL, NULL, 0),
(21, 25, 'Panna', 'Erasmus', 'pannaerasmus80@gmail.com', 1, 1378287086, 1371447321, 1372423590, 3, 2, '', 0),
(22, 26, 'Chelule', 'JJ', 'jjchelule@gmail.com', 1, 1381319284, 1372056757, NULL, 1, NULL, NULL, 0),
(24, 28, 'Faith', 'Kasina', 'fkasina@trocaire.or.ke', 1, 1379492147, 1373006715, NULL, 7, NULL, NULL, 0),
(25, 29, 'Maggie', 'Collins', 'maggie@thet.org', 1, NULL, 1374576661, 1378188645, 14, 14, NULL, 0),
(26, 30, 'Timur', 'Bekir', 'timur.bekir@thet.org', 1, NULL, 1374576737, NULL, 14, NULL, NULL, 0),
(29, 33, 'Mercy', 'Oduor', 'm-oduor@dfid.gov.uk', 1, 1375691609, 1374759753, NULL, 1, NULL, NULL, 0),
(1, 1, 'hcs_share', 'admin', 'john.smith@example.com', 1, 1374759633, 1310827985, NULL, 0, NULL, NULL, 0),
(32, 36, 'Ahmed', 'Nuri', 'ahmed.nuri@thet.org', 1, 1378804323, 1378713288, NULL, 14, NULL, NULL, 0),
(33, 37, 'Mohamud', 'Yonis', 'mohamud@thet.org', 1, NULL, 1378713332, NULL, 14, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE IF NOT EXISTS `user_status` (
  `user_status_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_status_name` varchar(10) NOT NULL,
  `user_status_code` tinyint(1) NOT NULL,
  PRIMARY KEY (`user_status_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`user_status_id`, `user_status_name`, `user_status_code`) VALUES
(1, 'enabled', 1),
(2, 'disabled', 2),
(3, 'blocked', 3);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `document_categories`
--
ALTER TABLE `document_categories`
  ADD CONSTRAINT `document_categories_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `documents` (`document_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `document_categories_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
