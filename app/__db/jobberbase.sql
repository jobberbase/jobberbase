-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Feb 05, 2008 at 03:03 PM
-- Server version: 5.0.37
-- PHP Version: 5.2.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `jobber`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `admin`
-- 

CREATE TABLE `admin` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `admin`
-- 

INSERT INTO `admin` VALUES (1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

-- 
-- Table structure for table `categories`
-- 

CREATE TABLE `categories` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(32) NOT NULL,
  `var_name` varchar(32) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='programming/design/admin/etc.' AUTO_INCREMENT=10 ;

-- 
-- Dumping data for table `categories`
-- 

INSERT INTO `categories` VALUES (1, 'Programmers', 'programmers');
INSERT INTO `categories` VALUES (2, 'Designers', 'designers');
INSERT INTO `categories` VALUES (3, 'Administrators', 'administrators');
INSERT INTO `categories` VALUES (7, 'Marketers', 'marketers');
INSERT INTO `categories` VALUES (5, 'Testers', 'testers');
INSERT INTO `categories` VALUES (6, 'Editors', 'editors');
INSERT INTO `categories` VALUES (8, 'Managers', 'managers');
INSERT INTO `categories` VALUES (9, 'Consultants', 'consultants');

-- --------------------------------------------------------

-- 
-- Table structure for table `cities`
-- 

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `ascii_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `cities`
-- 

INSERT INTO `cities` VALUES (1, 'Adjud', 'Adjud');
INSERT INTO `cities` VALUES (2, 'Alba Iulia', 'Alba-iulia');
INSERT INTO `cities` VALUES (3, 'Alexandria', 'Alexandria');
INSERT INTO `cities` VALUES (4, 'Arad', 'Arad');
INSERT INTO `cities` VALUES (5, 'Bacãu', 'Bacau');
INSERT INTO `cities` VALUES (6, 'Baia-Mare', 'Baia-mare');
INSERT INTO `cities` VALUES (7, 'Bârlad', 'Barlad');
INSERT INTO `cities` VALUES (8, 'Bistriþa', 'Bistrita');
INSERT INTO `cities` VALUES (9, 'Botoºani', 'Botosani');
INSERT INTO `cities` VALUES (10, 'Brãila', 'Braila');
INSERT INTO `cities` VALUES (11, 'Braºov', 'Brasov');
INSERT INTO `cities` VALUES (12, 'Breaza', 'Breaza');
INSERT INTO `cities` VALUES (13, 'Bucureºti', 'Bucuresti');
INSERT INTO `cities` VALUES (14, 'Buzãu', 'Buzau');
INSERT INTO `cities` VALUES (15, 'Cãlãraºi', 'Calarasi');
INSERT INTO `cities` VALUES (16, 'Câmpina', 'Campina');
INSERT INTO `cities` VALUES (18, 'Caracal', 'Caracal');
INSERT INTO `cities` VALUES (19, 'Caransebeº', 'Caransebes');
INSERT INTO `cities` VALUES (20, 'Cernavodã', 'Cernavoda');
INSERT INTO `cities` VALUES (22, 'Cluj-Napoca', 'Cluj-napoca');
INSERT INTO `cities` VALUES (23, 'Constanþa', 'Constanta');
INSERT INTO `cities` VALUES (24, 'Covasna', 'Covasna');
INSERT INTO `cities` VALUES (25, 'Craiova', 'Craiova');
INSERT INTO `cities` VALUES (26, 'Curtea de Argeº', 'Curtea-de-arges');
INSERT INTO `cities` VALUES (27, 'Deva', 'Deva');
INSERT INTO `cities` VALUES (28, 'Drobeta T. Severin', 'Drobeta-t-severin');
INSERT INTO `cities` VALUES (29, 'Focºani', 'Focsani');
INSERT INTO `cities` VALUES (30, 'Gãesti', 'Gaesti');
INSERT INTO `cities` VALUES (31, 'Galaþi', 'Galati');
INSERT INTO `cities` VALUES (32, 'Giurgiu', 'Giurgiu');
INSERT INTO `cities` VALUES (33, 'Hunedoara', 'Hunedoara');
INSERT INTO `cities` VALUES (34, 'Iaºi', 'Iasi');
INSERT INTO `cities` VALUES (36, 'Lugoj', 'Lugoj');
INSERT INTO `cities` VALUES (37, 'Mangalia', 'Mangalia');
INSERT INTO `cities` VALUES (38, 'Mediaº', 'Medias');
INSERT INTO `cities` VALUES (39, 'Miercurea-Ciuc', 'Miercurea-ciuc');
INSERT INTO `cities` VALUES (40, 'Oneºti', 'Onesti');
INSERT INTO `cities` VALUES (41, 'Oradea', 'Oradea');
INSERT INTO `cities` VALUES (42, 'Orºova', 'Orsova');
INSERT INTO `cities` VALUES (43, 'Otopeni', 'Otopeni');
INSERT INTO `cities` VALUES (44, 'Paºcani', 'Pascani');
INSERT INTO `cities` VALUES (46, 'Piatra Neamþ', 'Piatra-neamt');
INSERT INTO `cities` VALUES (47, 'Piteºti', 'Pitesti');
INSERT INTO `cities` VALUES (48, 'Ploieºti', 'Ploiesti');
INSERT INTO `cities` VALUES (49, 'Reghin', 'Reghin');
INSERT INTO `cities` VALUES (50, 'Reºiþa', 'Resita');
INSERT INTO `cities` VALUES (51, 'Rîmnicu-Sãrat', 'Rimnicu-sarat');
INSERT INTO `cities` VALUES (52, 'Rîmnicu-Vîlcea', 'Rimnicu-vilcea');
INSERT INTO `cities` VALUES (53, 'Roman', 'Roman');
INSERT INTO `cities` VALUES (54, 'Satu-Mare', 'Satu-mare');
INSERT INTO `cities` VALUES (55, 'Secuieni', 'Secuieni');
INSERT INTO `cities` VALUES (56, 'Sfântu Gheorghe', 'Sfantu-gheorghe');
INSERT INTO `cities` VALUES (57, 'Sibiu', 'Sibiu');
INSERT INTO `cities` VALUES (58, 'Sinaia', 'Sinaia');
INSERT INTO `cities` VALUES (59, 'Slãnic Moldova', 'Slanic-moldova');
INSERT INTO `cities` VALUES (60, 'Slatina', 'Slatina');
INSERT INTO `cities` VALUES (61, 'Slobozia', 'Slobozia');
INSERT INTO `cities` VALUES (62, 'Suceava', 'Suceava');
INSERT INTO `cities` VALUES (63, 'Târgoviºte', 'Targoviste');
INSERT INTO `cities` VALUES (64, 'Târgu Jiu', 'Targu-jiu');
INSERT INTO `cities` VALUES (65, 'Târgu Ocna', 'Targu Ocna');
INSERT INTO `cities` VALUES (66, 'Tecuci', 'Tecuci');
INSERT INTO `cities` VALUES (67, 'Timiºoara', 'Timisoara');
INSERT INTO `cities` VALUES (68, 'Tîrgu-Mureº', 'Tirgu-mures');
INSERT INTO `cities` VALUES (69, 'Tulcea', 'Tulcea');
INSERT INTO `cities` VALUES (70, 'Turda', 'Turda');
INSERT INTO `cities` VALUES (71, 'Vaslui', 'Vaslui');
INSERT INTO `cities` VALUES (72, 'Zalau', 'Zalau');
INSERT INTO `cities` VALUES (-1, 'Anywhere', 'Anywhere');

-- --------------------------------------------------------

-- 
-- Table structure for table `downloads`
-- 

CREATE TABLE `downloads` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `created_on` datetime NOT NULL,
  `ip` varchar(15) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `downloads`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `hits`
-- 

CREATE TABLE `hits` (
  `job_id` int(10) unsigned NOT NULL,
  `created_on` datetime NOT NULL,
  `ip` varchar(15) NOT NULL,
  KEY `job_id` (`job_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `hits`
-- 

INSERT INTO `hits` VALUES (1, '2008-01-31 13:24:54', '127.0.0.1');
INSERT INTO `hits` VALUES (1, '2008-02-05 11:50:06', '127.0.0.1');

-- --------------------------------------------------------

-- 
-- Table structure for table `jobs`
-- 

CREATE TABLE `jobs` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- 
-- Dumping data for table `jobs`
-- 

INSERT INTO `jobs` VALUES (1, 1, 1, 'web developer', 'We\\''re a startup searching for a cool web developer that masters following technologies:\r\n* php, mysql\r\n* javascript, dom, ajax\r\n* html, css\r\n\r\nPerson should also have a good sens of user behavior.\r\n\r\nExcellent payment! ;)', 'Foo Inc.', -1, 'http://www.fooinc.com', '', '2007-10-20 13:43:27', 0, 1, 8, 'f1acd80152446f4cf8a0bb8242398be7', 'London, UK', 'jobs@fooinc.com', 1);
INSERT INTO `jobs` VALUES (2, 3, 2, 'Illustrator/Photoshop expert', 'Could you redraw in Illustrator da Vinci\\''s Gioconda, blindfolded?\r\nLet us know! :)', 'UnrealExpectations', -1, 'http://unrealexpectations.com', '', '2007-10-20 13:47:05', 0, 1, 3, '6ebcfde637d98a9738c024c6074e945d', '', 'jobs@unrealexpectations.com', 1);
INSERT INTO `jobs` VALUES (4, 1, 1, 'web developer 3', 'We\\''re a startup searching for a cool web developer that masters following technologies:\r\n* php, mysql\r\n* javascript, dom, ajax\r\n* html, css\r\n\r\nPerson should also have a good sens of user behavior.\r\n\r\nExcellent payment! ;)', 'Foo Inc.', -1, 'http://www.fooinc.com', '', '2007-10-20 13:43:27', 0, 1, 7, 'f1acd80152446f4cf8a0bb8242398be7', 'London, UK', 'jobs@fooinc.com', 1);
INSERT INTO `jobs` VALUES (5, 1, 1, 'web developer 2', 'We\\''re a startup searching for a cool web developer that masters following technologies:\r\n* php, mysql\r\n* javascript, dom, ajax\r\n* html, css\r\n\r\nPerson should also have a good sens of user behavior.\r\n\r\nExcellent payment! ;)', 'Foo Inc.', -1, 'http://www.fooinc.com', '', '2007-10-20 13:43:27', 0, 1, 6, 'f1acd80152446f4cf8a0bb8242398be7', 'London, UK', 'jobs@fooinc.com', 1);
INSERT INTO `jobs` VALUES (6, 1, 1, 'asdfasdf', 'asdfsdf', 'asdfasd', -1, 'http://asdf', '', '2007-12-12 10:15:58', 1, 0, 0, '04b0a92981efa5d169349dba0cc77ebb', 'testing, uk', 'fs@asdf.com', 1);
INSERT INTO `jobs` VALUES (7, 1, 1, 'asdf', 'asdf', 'asdf', -1, 'http://asdf', '', '2007-12-12 10:18:25', 1, 0, 0, '7b16111f6160bb83ddc255ac13dee5f7', 'sdfasd', 'asdf', 1);
INSERT INTO `jobs` VALUES (8, 1, 1, 'asdfasdf', 'asdfsdf', 'asdfasd', -1, 'http://asdf', '', '2007-12-12 10:20:50', 1, 0, 0, '3ae01ae904b6b0cb361dcbf438123e5e', 'testing, uk', 'fs@asdf.com', 1);
INSERT INTO `jobs` VALUES (9, 1, 1, 'asdfasdf', 'asdfsdf', 'asdfasd', -1, 'http://asdf', '', '2007-12-12 10:21:23', 1, 0, 0, '3472f6a1151a315227d2a27c731328b1', 'testing, uk', 'fs@asdf.com', 1);
INSERT INTO `jobs` VALUES (10, 1, 1, 'dsadsa', 'dasdasdsa', 'dasdas', -1, 'http://asddsad', '', '2008-02-05 14:30:23', 1, 0, 0, 'f7cebdb617722c7f00ead4b6675773f2', '', 'dasdas', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `job_applications`
-- 

CREATE TABLE `job_applications` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `job_id` int(10) unsigned NOT NULL,
  `created_on` datetime NOT NULL,
  `ip` varchar(15) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `job_applications`
-- 

INSERT INTO `job_applications` VALUES (6, 1, '2008-01-31 13:25:18', '127.0.0.1');

-- --------------------------------------------------------

-- 
-- Table structure for table `job_params`
-- 

CREATE TABLE `job_params` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `value` varchar(50) NOT NULL,
  `categ` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

-- 
-- Dumping data for table `job_params`
-- 

INSERT INTO `job_params` VALUES (1, 'php/mysql', 'know-how');
INSERT INTO `job_params` VALUES (2, '.net', 'know-how');
INSERT INTO `job_params` VALUES (3, 'xhtml/css', 'know-how');
INSERT INTO `job_params` VALUES (4, 'graphic design', 'know-how');
INSERT INTO `job_params` VALUES (5, 'small team', 'company');
INSERT INTO `job_params` VALUES (6, 'large company', 'company');
INSERT INTO `job_params` VALUES (7, 'ruby/rails', 'know-how');
INSERT INTO `job_params` VALUES (8, 'oracle', 'know-how');
INSERT INTO `job_params` VALUES (9, 'c/c++/c#', 'know-how');
INSERT INTO `job_params` VALUES (10, 'javascript/ajax', 'know-how');
INSERT INTO `job_params` VALUES (11, 'java', 'know-how');
INSERT INTO `job_params` VALUES (12, 'flash', 'know-how');
INSERT INTO `job_params` VALUES (13, 'junior', 'level');
INSERT INTO `job_params` VALUES (14, 'senior', 'level');
INSERT INTO `job_params` VALUES (15, 'full-time', 'type');
INSERT INTO `job_params` VALUES (16, 'part-time', 'type');
INSERT INTO `job_params` VALUES (17, 'freelance', 'type');
INSERT INTO `job_params` VALUES (18, 'sysadmin', 'know-how');
INSERT INTO `job_params` VALUES (19, 'linux/server admin', 'know-how');
INSERT INTO `job_params` VALUES (20, 'erp/sap', 'know-how');
INSERT INTO `job_params` VALUES (21, 'copywriting/editare', 'know-how');
INSERT INTO `job_params` VALUES (22, 'seo/sem', 'know-how');
INSERT INTO `job_params` VALUES (23, 'manager', 'know-how');
INSERT INTO `job_params` VALUES (24, 'work from home', 'company');
INSERT INTO `job_params` VALUES (25, 'work at the office', 'company');
INSERT INTO `job_params` VALUES (28, 'internship', 'type');
INSERT INTO `job_params` VALUES (29, 'medium', 'level');
INSERT INTO `job_params` VALUES (30, 'python', 'know-how');
INSERT INTO `job_params` VALUES (31, 'bonuses', 'company');
INSERT INTO `job_params` VALUES (32, 'training', 'company');

-- --------------------------------------------------------

-- 
-- Table structure for table `job_requests`
-- 

CREATE TABLE `job_requests` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL,
  `ip` varchar(15) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `job_requests`
-- 

INSERT INTO `job_requests` VALUES (1, 'asdf', 'me@filipcte.ro', '2008-01-30 00:10:28', '127.0.0.1');
INSERT INTO `job_requests` VALUES (2, 'asdf', 'me@filipcte.ro', '2008-01-30 00:10:48', '127.0.0.1');
INSERT INTO `job_requests` VALUES (3, 'asdf', 'me@filipcte.ro', '2008-01-30 00:11:56', '127.0.0.1');

-- --------------------------------------------------------

-- 
-- Table structure for table `job_requests_params`
-- 

CREATE TABLE `job_requests_params` (
  `request_id` int(10) unsigned NOT NULL,
  `param_id` int(10) unsigned NOT NULL,
  KEY `request_id` (`request_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `job_requests_params`
-- 

INSERT INTO `job_requests_params` VALUES (1, 17);
INSERT INTO `job_requests_params` VALUES (1, 31);
INSERT INTO `job_requests_params` VALUES (1, 5);
INSERT INTO `job_requests_params` VALUES (1, 32);
INSERT INTO `job_requests_params` VALUES (1, 10);
INSERT INTO `job_requests_params` VALUES (1, 1);
INSERT INTO `job_requests_params` VALUES (1, 3);
INSERT INTO `job_requests_params` VALUES (1, 14);
INSERT INTO `job_requests_params` VALUES (2, 17);
INSERT INTO `job_requests_params` VALUES (2, 31);
INSERT INTO `job_requests_params` VALUES (2, 5);
INSERT INTO `job_requests_params` VALUES (2, 32);
INSERT INTO `job_requests_params` VALUES (2, 10);
INSERT INTO `job_requests_params` VALUES (2, 1);
INSERT INTO `job_requests_params` VALUES (2, 3);
INSERT INTO `job_requests_params` VALUES (2, 14);
INSERT INTO `job_requests_params` VALUES (3, 17);
INSERT INTO `job_requests_params` VALUES (3, 31);
INSERT INTO `job_requests_params` VALUES (3, 5);
INSERT INTO `job_requests_params` VALUES (3, 32);
INSERT INTO `job_requests_params` VALUES (3, 10);
INSERT INTO `job_requests_params` VALUES (3, 1);
INSERT INTO `job_requests_params` VALUES (3, 3);
INSERT INTO `job_requests_params` VALUES (3, 14);

-- --------------------------------------------------------

-- 
-- Table structure for table `pages`
-- 

CREATE TABLE `pages` (
  `id` int(11) NOT NULL auto_increment,
  `url` varchar(255) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `has_form` enum('0','1') NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `pages`
-- 

INSERT INTO `pages` VALUES (1, 'about', 'About Us', '', '', 'About Us', '			<h4>Hello!</h4>\r\n			<p>\r\n				This job board is an open source implementation of <a href="http://www.jobber.ro/">www.jobber.ro</a>.\r\n			</p>\r\n			<p>\r\n				Don''t hesitate to <a href="http://localhost/jobber/contact/">contact us</a>!\r\n			</p>\r\n		', '');
INSERT INTO `pages` VALUES (5, 'contact', 'Contact Us', '', '', 'We really appreciate feedback!', '<p>E-mail us at <strong>hello [at] domain [dot] com</strong> or use the form below:</p>', '1');
INSERT INTO `pages` VALUES (4, 'widgets', 'Widgets', '', '', 'Site widget', '<h4>Would you like to display our latest jobs on your site?</h4>\r\n<p>Insert one of the following snippets in your page''s HTML code, in the position where the ads should appear:</p>\r\n<ol>\r\n<li>Get latest 5 jobs from all categories and all types, posted in the past 7 days, in random order:\r\n<pre>&lt;script src="http://localhost/jobber/api/api.php?action=getJobs<br />&amp;type=0&amp;category=0&amp;count=5&amp;random=1&amp;days_behind=7&amp;response=js" type="text/javascript"&gt;&lt;/script&gt;<br /><br />&lt;script type="text/javascript"&gt;<strong>showJobs(''jobber-container'', ''jobber-list'');</strong>&lt;/script&gt;</pre>\r\n</li>\r\n<li>Get last 10 full-time jobs for programmers, posted in the past 15 days, ordered by publish date (newest on top):\r\n<pre>&lt;script src="http://localhost/jobber/api/api.php?action=getJobs<br />&amp;type=fulltime&amp;category=programmers&amp;count=10&amp;random=0&amp;days_behind=15&amp;response=js" <br />type="text/javascript"&gt;&lt;/script&gt;<br /><br />&lt;script type="text/javascript"&gt;<strong>showJobs(''jobber-container'', ''jobber-list'');</strong>&lt;/script&gt;</pre>\r\n</li>\r\n<li>Get latest jobs published by a company (e.g. Google):\r\n<pre>&lt;script src="http://localhost/jobber/api/api.php?action=getJobsByCompany<br />&amp;company=google&amp;count=10&amp;response=js" type="text/javascript"&gt;&lt;/script&gt;<br /><br />&lt;script type="text/javascript"&gt;<strong>showJobs(''jobber-container'', ''jobber-list'');</strong>&lt;/script&gt;</pre>\r\n</li>\r\n</ol>\r\n<h2>The parameters you can use when calling the API, are:</h2>\r\n<ul>\r\n<li><strong>action</strong>: "getJobs" - all jobs / "getJobsByCompany" - a single company''s jobs</li>\r\n<li><strong>type</strong>: "0" - toate / "fulltime" / "parttime" / "freelance";</li>\r\n<li><strong>category</strong>: "0" - all / "programmers" / "designers" / "administrators" / "managers" / "testers" / "editors";</li>\r\n<li><strong>count</strong>: number of job ads to display;</li>\r\n<li><strong>random</strong>: "1" - display randomly / "0" - display ordered by publish date (newest on top);</li>\r\n<li><strong>days_behind</strong>: get only jobs posted in the past X days (type "0" if you don''t want to limit this);</li>\r\n<li><strong>response</strong>: "js" - returns jobs as JavaScript code / "json" - returns only a JSON string / "xml" - returns an XML.</li>\r\n</ul>\r\n<h2>Use CSS to style the list:</h2>\r\n<pre>ul.jobber-list {<br />  list-style-type: none;<br />  margin: 0;<br />  padding: 0;<br />}<br />ul.jobber-list li {<br />  margin-bottom: 5px;<br />}</pre>', '0');

-- --------------------------------------------------------

-- 
-- Table structure for table `searches`
-- 

CREATE TABLE `searches` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `keywords` varchar(100) NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `searches`
-- 

INSERT INTO `searches` VALUES (4, 'London', '2008-01-31 13:24:54');
INSERT INTO `searches` VALUES (5, 'search', '2008-02-05 12:29:01');

-- --------------------------------------------------------

-- 
-- Table structure for table `spam_reports`
-- 

CREATE TABLE `spam_reports` (
  `id` int(11) NOT NULL auto_increment,
  `the_time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `ip` varchar(15) NOT NULL,
  `job_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `spam_reports`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `types`
-- 

CREATE TABLE `types` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(16) NOT NULL,
  `var_name` varchar(32) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='full-time/freelance' AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `types`
-- 

INSERT INTO `types` VALUES (1, 'Full-time', 'fulltime');
INSERT INTO `types` VALUES (2, 'Part-time', 'parttime');
INSERT INTO `types` VALUES (3, 'Freelance', 'freelance');
