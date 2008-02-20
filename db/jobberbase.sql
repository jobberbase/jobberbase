
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `jobber`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(32) NOT NULL,
  `var_name` varchar(32) NOT NULL,
  `category_order` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `category_order` (`category_order`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='programming/design/admin/etc.' AUTO_INCREMENT=14 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `var_name`, `category_order`) VALUES
(1, 'Programmers', 'programmers', 7),
(2, 'Designers', 'designers', 3),
(3, 'Administrators', 'administrators', 0),
(7, 'Marketers', 'marketers', 2),
(5, 'Testers', 'testers', 5),
(6, 'Editors', 'editors', 1),
(8, 'Managers', 'managers', 4),
(9, 'Consultants', 'consultants', 6);

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
(5, 'Bacãu', 'Bacau'),
(6, 'Baia-Mare', 'Baia-mare'),
(7, 'Bârlad', 'Barlad'),
(8, 'Bistriþa', 'Bistrita'),
(9, 'Botoºani', 'Botosani'),
(10, 'Brãila', 'Braila'),
(11, 'Braºov', 'Brasov'),
(12, 'Breaza', 'Breaza'),
(13, 'Bucureºti', 'Bucuresti'),
(14, 'Buzãu', 'Buzau'),
(15, 'Cãlãraºi', 'Calarasi'),
(16, 'Câmpina', 'Campina'),
(18, 'Caracal', 'Caracal'),
(19, 'Caransebeº', 'Caransebes'),
(20, 'Cernavodã', 'Cernavoda'),
(22, 'Cluj-Napoca', 'Cluj-napoca'),
(23, 'Constanþa', 'Constanta'),
(24, 'Covasna', 'Covasna'),
(25, 'Craiova', 'Craiova'),
(26, 'Curtea de Argeº', 'Curtea-de-arges'),
(27, 'Deva', 'Deva'),
(28, 'Drobeta T. Severin', 'Drobeta-t-severin'),
(29, 'Focºani', 'Focsani'),
(30, 'Gãesti', 'Gaesti'),
(31, 'Galaþi', 'Galati'),
(32, 'Giurgiu', 'Giurgiu'),
(33, 'Hunedoara', 'Hunedoara'),
(34, 'Iaºi', 'Iasi'),
(36, 'Lugoj', 'Lugoj'),
(37, 'Mangalia', 'Mangalia'),
(38, 'Mediaº', 'Medias'),
(39, 'Miercurea-Ciuc', 'Miercurea-ciuc'),
(40, 'Oneºti', 'Onesti'),
(41, 'Oradea', 'Oradea'),
(42, 'Orºova', 'Orsova'),
(43, 'Otopeni', 'Otopeni'),
(44, 'Paºcani', 'Pascani'),
(46, 'Piatra Neamþ', 'Piatra-neamt'),
(47, 'Piteºti', 'Pitesti'),
(48, 'Ploieºti', 'Ploiesti'),
(49, 'Reghin', 'Reghin'),
(50, 'Reºiþa', 'Resita'),
(51, 'Rîmnicu-Sãrat', 'Rimnicu-sarat'),
(52, 'Rîmnicu-Vîlcea', 'Rimnicu-vilcea'),
(53, 'Roman', 'Roman'),
(54, 'Satu-Mare', 'Satu-mare'),
(55, 'Secuieni', 'Secuieni'),
(56, 'Sfântu Gheorghe', 'Sfantu-gheorghe'),
(57, 'Sibiu', 'Sibiu'),
(58, 'Sinaia', 'Sinaia'),
(59, 'Slãnic Moldova', 'Slanic-moldova'),
(60, 'Slatina', 'Slatina'),
(61, 'Slobozia', 'Slobozia'),
(62, 'Suceava', 'Suceava'),
(63, 'Târgoviºte', 'Targoviste'),
(64, 'Târgu Jiu', 'Targu-jiu'),
(65, 'Târgu Ocna', 'Targu Ocna'),
(66, 'Tecuci', 'Tecuci'),
(67, 'Timiºoara', 'Timisoara'),
(68, 'Tîrgu-Mureº', 'Tirgu-mures'),
(69, 'Tulcea', 'Tulcea'),
(70, 'Turda', 'Turda'),
(71, 'Vaslui', 'Vaslui'),
(72, 'Zalau', 'Zalau'),
(-1, 'Anywhere', 'Anywhere');

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE IF NOT EXISTS `downloads` (
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
(1, '2008-01-31 13:24:54', '127.0.0.1'),
(1, '2008-02-05 11:50:06', '127.0.0.1');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `type_id`, `category_id`, `title`, `description`, `company`, `city_id`, `url`, `apply`, `created_on`, `is_temp`, `is_active`, `views_count`, `auth`, `outside_location`, `poster_email`, `apply_online`) VALUES
(1, 1, 1, 'web developer', 'We\\''re a startup searching for a cool web developer that masters following technologies:\r\n* php, mysql\r\n* javascript, dom, ajax\r\n* html, css\r\n\r\nPerson should also have a good sens of user behavior.\r\n\r\nExcellent payment! ;)', 'Foo Inc.', -1, 'http://www.fooinc.com', '', '2007-10-20 13:43:27', 0, 1, 8, 'f1acd80152446f4cf8a0bb8242398be7', 'London, UK', 'jobs@fooinc.com', 1),
(2, 3, 2, 'Illustrator/Photoshop expert', 'Could you redraw in Illustrator da Vinci\\''s Gioconda, blindfolded?\r\nLet us know! :)', 'UnrealExpectations', -1, 'http://unrealexpectations.com', '', '2007-10-20 13:47:05', 0, 1, 3, '6ebcfde637d98a9738c024c6074e945d', '', 'jobs@unrealexpectations.com', 1),
(4, 1, 1, 'web developer 3', 'We\\''re a startup searching for a cool web developer that masters following technologies:\r\n* php, mysql\r\n* javascript, dom, ajax\r\n* html, css\r\n\r\nPerson should also have a good sens of user behavior.\r\n\r\nExcellent payment! ;)', 'Foo Inc.', -1, 'http://www.fooinc.com', '', '2007-10-20 13:43:27', 0, 1, 7, 'f1acd80152446f4cf8a0bb8242398be7', 'London, UK', 'jobs@fooinc.com', 1),
(5, 1, 1, 'web developer 2', 'We\\''re a startup searching for a cool web developer that masters following technologies:\r\n* php, mysql\r\n* javascript, dom, ajax\r\n* html, css\r\n\r\nPerson should also have a good sens of user behavior.\r\n\r\nExcellent payment! ;)', 'Foo Inc.', -1, 'http://www.fooinc.com', '', '2007-10-20 13:43:27', 0, 1, 6, 'f1acd80152446f4cf8a0bb8242398be7', 'London, UK', 'jobs@fooinc.com', 1),
(6, 1, 1, 'asdfasdf', 'asdfsdf', 'asdfasd', -1, 'http://asdf', '', '2007-12-12 10:15:58', 1, 0, 0, '04b0a92981efa5d169349dba0cc77ebb', 'testing, uk', 'fs@asdf.com', 1),
(7, 1, 1, 'asdf', 'asdf', 'asdf', -1, 'http://asdf', '', '2007-12-12 10:18:25', 1, 0, 0, '7b16111f6160bb83ddc255ac13dee5f7', 'sdfasd', 'asdf', 1),
(8, 1, 1, 'asdfasdf', 'asdfsdf', 'asdfasd', -1, 'http://asdf', '', '2007-12-12 10:20:50', 1, 0, 0, '3ae01ae904b6b0cb361dcbf438123e5e', 'testing, uk', 'fs@asdf.com', 1),
(9, 1, 1, 'asdfasdf', 'asdfsdf', 'asdfasd', -1, 'http://asdf', '', '2007-12-12 10:21:23', 1, 0, 0, '3472f6a1151a315227d2a27c731328b1', 'testing, uk', 'fs@asdf.com', 1),
(10, 1, 1, 'dsadsa', 'dasdasdsa', 'dasdas', -1, 'http://asddsad', '', '2008-02-05 14:30:23', 1, 0, 0, 'f7cebdb617722c7f00ead4b6675773f2', '', 'dasdas', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`id`, `job_id`, `created_on`, `ip`) VALUES
(6, 1, '2008-01-31 13:25:18', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `job_params`
--

CREATE TABLE IF NOT EXISTS `job_params` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `value` varchar(50) NOT NULL,
  `categ` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `job_params`
--

INSERT INTO `job_params` (`id`, `value`, `categ`) VALUES
(1, 'php/mysql', 'know-how'),
(2, '.net', 'know-how'),
(3, 'xhtml/css', 'know-how'),
(4, 'graphic design', 'know-how'),
(5, 'small team', 'company'),
(6, 'large company', 'company'),
(7, 'ruby/rails', 'know-how'),
(8, 'oracle', 'know-how'),
(9, 'c/c++/c#', 'know-how'),
(10, 'javascript/ajax', 'know-how'),
(11, 'java', 'know-how'),
(12, 'flash', 'know-how'),
(13, 'junior', 'level'),
(14, 'senior', 'level'),
(15, 'full-time', 'type'),
(16, 'part-time', 'type'),
(17, 'freelance', 'type'),
(18, 'sysadmin', 'know-how'),
(19, 'linux/server admin', 'know-how'),
(20, 'erp/sap', 'know-how'),
(21, 'copywriting/editare', 'know-how'),
(22, 'seo/sem', 'know-how'),
(23, 'manager', 'know-how'),
(24, 'work from home', 'company'),
(25, 'work at the office', 'company'),
(28, 'internship', 'type'),
(29, 'medium', 'level'),
(30, 'python', 'know-how'),
(31, 'bonuses', 'company'),
(32, 'training', 'company');

-- --------------------------------------------------------

--
-- Table structure for table `job_requests`
--

CREATE TABLE IF NOT EXISTS `job_requests` (
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

INSERT INTO `job_requests` (`id`, `name`, `email`, `created_on`, `ip`) VALUES
(1, 'asdf', 'me@filipcte.ro', '2008-01-30 00:10:28', '127.0.0.1'),
(2, 'asdf', 'me@filipcte.ro', '2008-01-30 00:10:48', '127.0.0.1'),
(3, 'asdf', 'me@filipcte.ro', '2008-01-30 00:11:56', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `job_requests_params`
--

CREATE TABLE IF NOT EXISTS `job_requests_params` (
  `request_id` int(10) unsigned NOT NULL,
  `param_id` int(10) unsigned NOT NULL,
  KEY `request_id` (`request_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job_requests_params`
--

INSERT INTO `job_requests_params` (`request_id`, `param_id`) VALUES
(1, 17),
(1, 31),
(1, 5),
(1, 32),
(1, 10),
(1, 1),
(1, 3),
(1, 14),
(2, 17),
(2, 31),
(2, 5),
(2, 32),
(2, 10),
(2, 1),
(2, 3),
(2, 14),
(3, 17),
(3, 31),
(3, 5),
(3, 32),
(3, 10),
(3, 1),
(3, 3),
(3, 14);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL auto_increment,
  `url` varchar(255) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `has_form` enum('0','1') NOT NULL,
  `form_message` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `url`, `page_title`, `keywords`, `description`, `title`, `content`, `has_form`, `form_message`) VALUES
(1, 'about', 'About Us', '', '', 'About Us', '			<h4>Hello!</h4>\r\n			<p>\r\n				This job board is an open source implementation of <a href="http://www.jobber.ro/">www.jobber.ro</a>.\r\n			</p>\r\n			<p>\r\n				Don''t hesitate to <a href="http://localhost/jobber/contact/">contact us</a>!\r\n			</p>\r\n		', '', ''),
(5, 'contact', 'Contact Us', '', '', 'We really appreciate feedback!', '<p>E-mail us at <strong>hello [at] domain [dot] com</strong> or use the form below:</p>', '1', '<p>Thank you for your message! :)</p>'),
(4, 'widgets', 'Widgets', '', '', 'Site widget', '<h4>Would you like to display our latest jobs on your site?</h4>\r\n<p>Insert one of the following snippets in your page''s HTML code, in the position where the ads should appear:</p>\r\n<ol>\r\n<li>Get latest 5 jobs from all categories and all types, posted in the past 7 days, in random order:\r\n<pre>&lt;script src="http://localhost/jobber/api/api.php?action=getJobs<br />&amp;type=0&amp;category=0&amp;count=5&amp;random=1&amp;days_behind=7&amp;response=js" type="text/javascript"&gt;&lt;/script&gt;<br /><br />&lt;script type="text/javascript"&gt;<strong>showJobs(''jobber-container'', ''jobber-list'');</strong>&lt;/script&gt;</pre>\r\n</li>\r\n<li>Get last 10 full-time jobs for programmers, posted in the past 15 days, ordered by publish date (newest on top):\r\n<pre>&lt;script src="http://localhost/jobber/api/api.php?action=getJobs<br />&amp;type=fulltime&amp;category=programmers&amp;count=10&amp;random=0&amp;days_behind=15&amp;response=js" <br />type="text/javascript"&gt;&lt;/script&gt;<br /><br />&lt;script type="text/javascript"&gt;<strong>showJobs(''jobber-container'', ''jobber-list'');</strong>&lt;/script&gt;</pre>\r\n</li>\r\n<li>Get latest jobs published by a company (e.g. Google):\r\n<pre>&lt;script src="http://localhost/jobber/api/api.php?action=getJobsByCompany<br />&amp;company=google&amp;count=10&amp;response=js" type="text/javascript"&gt;&lt;/script&gt;<br /><br />&lt;script type="text/javascript"&gt;<strong>showJobs(''jobber-container'', ''jobber-list'');</strong>&lt;/script&gt;</pre>\r\n</li>\r\n</ol>\r\n<h2>The parameters you can use when calling the API, are:</h2>\r\n<ul>\r\n<li><strong>action</strong>: "getJobs" - all jobs / "getJobsByCompany" - a single company''s jobs</li>\r\n<li><strong>type</strong>: "0" - toate / "fulltime" / "parttime" / "freelance";</li>\r\n<li><strong>category</strong>: "0" - all / "programmers" / "designers" / "administrators" / "managers" / "testers" / "editors";</li>\r\n<li><strong>count</strong>: number of job ads to display;</li>\r\n<li><strong>random</strong>: "1" - display randomly / "0" - display ordered by publish date (newest on top);</li>\r\n<li><strong>days_behind</strong>: get only jobs posted in the past X days (type "0" if you don''t want to limit this);</li>\r\n<li><strong>response</strong>: "js" - returns jobs as JavaScript code / "json" - returns only a JSON string / "xml" - returns an XML.</li>\r\n</ul>\r\n<h2>Use CSS to style the list:</h2>\r\n<pre>ul.jobber-list {<br />  list-style-type: none;<br />  margin: 0;<br />  padding: 0;<br />}<br />ul.jobber-list li {<br />  margin-bottom: 5px;<br />}</pre>', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `searches`
--

CREATE TABLE IF NOT EXISTS `searches` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `keywords` varchar(100) NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `searches`
--

INSERT INTO `searches` (`id`, `keywords`, `created_on`) VALUES
(4, 'London', '2008-01-31 13:24:54'),
(5, 'search', '2008-02-05 12:29:01'),
(6, 'developer', '2008-02-05 16:25:13');

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
