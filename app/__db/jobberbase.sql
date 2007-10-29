-- phpMyAdmin SQL Dump
-- version 2.11.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 22, 2007 at 12:27 AM
-- Server version: 5.0.37
-- PHP Version: 5.2.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `jobberbase`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(32) NOT NULL,
  `var_name` varchar(32) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='programming/design/admin/etc.' AUTO_INCREMENT=10 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `var_name`) VALUES
(1, 'Programmers', 'programmers'),
(2, 'Designers', 'designers'),
(3, 'Administrators', 'administrators'),
(7, 'Marketers', 'marketers'),
(5, 'Testers', 'testers'),
(6, 'Editors', 'editors'),
(8, 'Managers', 'managers'),
(9, 'Consultants', 'consultants');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `ascii_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `ascii_name`) VALUES
(1, 'Adjud', 'Adjud'),
(2, 'Alba Iulia', 'Alba-iulia'),
(3, 'Alexandria', 'Alexandria'),
(4, 'Arad', 'Arad'),
(5, 'Bacău', 'Bacau'),
(6, 'Baia-Mare', 'Baia-mare'),
(7, 'Bârlad', 'Barlad'),
(8, 'Bistriţa', 'Bistrita'),
(9, 'Botoşani', 'Botosani'),
(10, 'Brăila', 'Braila'),
(11, 'Braşov', 'Brasov'),
(12, 'Breaza', 'Breaza'),
(13, 'Bucureşti', 'Bucuresti'),
(14, 'Buzău', 'Buzau'),
(15, 'Călăraşi', 'Calarasi'),
(16, 'Câmpina', 'Campina'),
(18, 'Caracal', 'Caracal'),
(19, 'Caransebeş', 'Caransebes'),
(20, 'Cernavodă', 'Cernavoda'),
(22, 'Cluj-Napoca', 'Cluj-napoca'),
(23, 'Constanţa', 'Constanta'),
(24, 'Covasna', 'Covasna'),
(25, 'Craiova', 'Craiova'),
(26, 'Curtea de Argeş', 'Curtea-de-arges'),
(27, 'Deva', 'Deva'),
(28, 'Drobeta T. Severin', 'Drobeta-t-severin'),
(29, 'Focşani', 'Focsani'),
(30, 'Găesti', 'Gaesti'),
(31, 'Galaţi', 'Galati'),
(32, 'Giurgiu', 'Giurgiu'),
(33, 'Hunedoara', 'Hunedoara'),
(34, 'Iaşi', 'Iasi'),
(36, 'Lugoj', 'Lugoj'),
(37, 'Mangalia', 'Mangalia'),
(38, 'Mediaş', 'Medias'),
(39, 'Miercurea-Ciuc', 'Miercurea-ciuc'),
(40, 'Oneşti', 'Onesti'),
(41, 'Oradea', 'Oradea'),
(42, 'Orşova', 'Orsova'),
(43, 'Otopeni', 'Otopeni'),
(44, 'Paşcani', 'Pascani'),
(46, 'Piatra Neamţ', 'Piatra-neamt'),
(47, 'Piteşti', 'Pitesti'),
(48, 'Ploieşti', 'Ploiesti'),
(49, 'Reghin', 'Reghin'),
(50, 'Reşiţa', 'Resita'),
(51, 'Rîmnicu-Sărat', 'Rimnicu-sarat'),
(52, 'Rîmnicu-Vîlcea', 'Rimnicu-vilcea'),
(53, 'Roman', 'Roman'),
(54, 'Satu-Mare', 'Satu-mare'),
(55, 'Secuieni', 'Secuieni'),
(56, 'Sfântu Gheorghe', 'Sfantu-gheorghe'),
(57, 'Sibiu', 'Sibiu'),
(58, 'Sinaia', 'Sinaia'),
(59, 'Slănic Moldova', 'Slanic-moldova'),
(60, 'Slatina', 'Slatina'),
(61, 'Slobozia', 'Slobozia'),
(62, 'Suceava', 'Suceava'),
(63, 'Târgovişte', 'Targoviste'),
(64, 'Târgu Jiu', 'Targu-jiu'),
(65, 'Târgu Ocna', 'Targu Ocna'),
(66, 'Tecuci', 'Tecuci'),
(67, 'Timişoara', 'Timisoara'),
(68, 'Tîrgu-Mureş', 'Tirgu-mures'),
(69, 'Tulcea', 'Tulcea'),
(70, 'Turda', 'Turda'),
(71, 'Vaslui', 'Vaslui'),
(72, 'Zalau', 'Zalau'),
(-1, 'Anywhere', 'Anywhere');

-- --------------------------------------------------------

--
-- Table structure for table `hits`
--

CREATE TABLE IF NOT EXISTS `hits` (
  `job_id` int(10) unsigned NOT NULL,
  `created_on` datetime NOT NULL,
  `ip` varchar(15) NOT NULL,
  KEY `job_id` (`job_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hits`
--

INSERT INTO `hits` (`job_id`, `created_on`, `ip`) VALUES
(1, '2007-10-20 13:44:13', '127.0.0.1'),
(2, '2007-10-20 13:47:46', '127.0.0.1'),
(1, '2007-10-21 21:11:18', '::1'),
(1, '2007-10-22 00:26:15', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `type_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(100) default '',
  `description` text,
  `company` varchar(150) default '',
  `city_id` int(11) NOT NULL,
  `url` varchar(150) default NULL,
  `apply` varchar(200) default '',
  `created_on` timestamp NOT NULL default '0000-00-00 00:00:00',
  `is_temp` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `views_count` int(11) NOT NULL,
  `auth` varchar(32) NOT NULL,
  `outside_location` varchar(150) NOT NULL,
  `poster_email` varchar(100) NOT NULL,
  `apply_online` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `type_id` (`type_id`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `type_id`, `category_id`, `title`, `description`, `company`, `city_id`, `url`, `apply`, `created_on`, `is_temp`, `is_active`, `views_count`, `auth`, `outside_location`, `poster_email`, `apply_online`) VALUES
(1, 1, 1, 'web developer', 'We\\''re a startup searching for a cool web developer that masters following technologies:\r\n* php, mysql\r\n* javascript, dom, ajax\r\n* html, css\r\n\r\nPerson should also have a good sens of user behavior.\r\n\r\nExcellent payment! ;)', 'Foo Inc.', -1, 'http://www.fooinc.com', '', '2007-10-20 13:43:27', 0, 1, 3, 'f1acd80152446f4cf8a0bb8242398be7', 'London, UK', 'jobs@fooinc.com', 1),
(2, 3, 2, 'Illustrator/Photoshop expert', 'Could you redraw in Illustrator da Vinci\\''s Gioconda, blindfolded?\r\nLet us know! :)', 'UnrealExpectations', -1, 'http://unrealexpectations.com', '', '2007-10-20 13:47:05', 0, 1, 1, '6ebcfde637d98a9738c024c6074e945d', '', 'jobs@unrealexpectations.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE IF NOT EXISTS `job_applications` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `job_id` int(10) unsigned NOT NULL,
  `created_on` datetime NOT NULL,
  `ip` varchar(15) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`id`, `job_id`, `created_on`, `ip`) VALUES
(1, 1, '2007-10-20 13:44:40', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `searches`
--

CREATE TABLE IF NOT EXISTS `searches` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `keywords` varchar(100) NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `searches`
--


-- --------------------------------------------------------

--
-- Table structure for table `spam_reports`
--

CREATE TABLE IF NOT EXISTS `spam_reports` (
  `id` int(11) NOT NULL auto_increment,
  `the_time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `ip` varchar(15) NOT NULL,
  `job_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `spam_reports`
--

INSERT INTO `spam_reports` (`id`, `the_time`, `ip`, `job_id`) VALUES
(1, '2007-10-20 11:58:25', '127.0.0.1', 309);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(16) NOT NULL,
  `var_name` varchar(32) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='full-time/freelance' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `var_name`) VALUES
(1, 'Full-time', 'fulltime'),
(2, 'Part-time', 'parttime'),
(3, 'Freelance', 'freelance');
