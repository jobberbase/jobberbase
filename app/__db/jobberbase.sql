-- phpMyAdmin SQL Dump
-- version 2.11.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 20, 2008 at 02:39 AM
-- Server version: 5.0.41
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `jobberbase`
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
  `title` text NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  `category_order` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `category_order` (`category_order`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='programming/design/admin/etc.' AUTO_INCREMENT=15 ;

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
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `ascii_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `ascii_name`) VALUES
(1, 'Adjud', 'Adjud'),
(2, 'Deva', 'Deva'),
(3, 'Mangalia', 'Mangalia'),
(4, 'Zalau', 'Zalau');

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
(11, '2008-08-20 02:36:27', '::1');

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
  `city_id` int(11),
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
  `spotlight` tinyint(4) default NULL,
  PRIMARY KEY  (`id`),
  KEY `type_id` (`type_id`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `type_id`, `category_id`, `title`, `description`, `company`, `city_id`, `url`, `apply`, `created_on`, `is_temp`, `is_active`, `views_count`, `auth`, `outside_location`, `poster_email`, `apply_online`, `spotlight`) VALUES
(1, 1, 1, 'web developer', 'We\\''re a startup searching for a cool web developer that masters following technologies:\r\n* php, mysql\r\n* javascript, dom, ajax\r\n* html, css\r\n\r\nPerson should also have a good sens of user behavior.\r\n\r\nExcellent payment! ;)', 'Foo Inc.', -1, 'http://www.fooinc.com', '', '2008-08-20 02:35:29', 0, 1, 10, 'f1acd80152446f4cf8a0bb8242398be7', 'sss', 'jobs@fooinc.com', 1, 1),
(2, 3, 2, 'Illustrator/Photoshop expert', 'Could you redraw in Illustrator da Vinci\\''s Gioconda, blindfolded?\r\nLet us know! :)', 'UnrealExpectations', -1, 'http://unrealexpectations.com', '', '2008-08-20 02:35:37', 0, 1, 6, '6ebcfde637d98a9738c024c6074e945d', '', 'jobs@unrealexpectations.com', 1, 0),
(4, 1, 1, 'web developer 3', 'We\\''re a startup searching for a cool web developer that masters following technologies:\r\n* php, mysql\r\n* javascript, dom, ajax\r\n* html, css\r\n\r\nPerson should also have a good sens of user behavior.\r\n\r\nExcellent payment! ;)', 'Foo Inc.', -1, 'http://www.fooinc.com', '', '2008-08-20 02:35:45', 0, 1, 8, 'f1acd80152446f4cf8a0bb8242398be7', 'London, UK', 'jobs@fooinc.com', 1, 1),
(5, 1, 1, 'web developer 2', 'We\\''re a startup searching for a cool web developer that masters following technologies:\r\n* php, mysql\r\n* javascript, dom, ajax\r\n* html, css\r\n\r\nPerson should also have a good sens of user behavior.\r\n\r\nExcellent payment! ;)', 'Foo Inc.', -1, 'http://www.fooinc.com', '', '2008-08-20 02:35:52', 0, 1, 6, 'f1acd80152446f4cf8a0bb8242398be7', 'London, UK', 'jobs@fooinc.com', 1, 0),
(11, 1, 3, 'nice developer needed', 'asdfsd', 'temp name', 1, 'http://google.com', '', '2008-08-20 02:35:57', 0, 1, 2, '2e3f1e857af3a4e191f453d747fbf212', '', 'jobs@fooinc.com', 1, 1);

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `job_applications`
--


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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `url`, `page_title`, `keywords`, `description`, `title`, `content`, `has_form`, `form_message`) VALUES
(1, 'about', 'About Us', '', '', 'About Us', '<h4>Hello!</h4>\r\n<p>This job board is an open source implementation of <a href="http://www.jobber.ro/">www.jobber.ro</a>.</p>\r\n<p>Don''t hesitate to&nbsp;contact us!</p>', '0', ''),
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

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(64) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `data_type` varchar(255) DEFAULT NULL,
  `input_type` varchar(255) DEFAULT NULL,
  `input_options` text,
  `validation` text,
  `value` longtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `category_id`, `name`, `title`, `description`, `data_type`, `input_type`, `input_options`, `validation`, `value`) VALUES
(1, 1, 'site_name', 'Site name', 'The name of your JobBoard, used in various templates.', NULL, NULL, NULL, 'not_empty', 'Jobberbase'),
(2, 1, 'admin_email', 'Admin Email', 'The email companies will receive mail from.', NULL, NULL, NULL, 'not_empty|is_email', 'admin@localhost.cc'),
(3, 1, 'notify_email', 'Notify Email', 'The email for receiving new job postings.', NULL, NULL, NULL, 'not_empty|is_email', 'admin@localhost.cc'),
(4, 1, 'theme', 'Theme', 'Pick the theme to use for the frontend.', NULL, 'available_themes', NULL, 'not_empty', 'default'),
(5, 1, 'html_title', 'HTML Title', 'The HTML title for the homepage.', NULL, NULL, NULL, NULL, NULL),
(6, 1, 'meta_keywords', 'Site keywords', 'Meta Keywords. Useful for Search Engine Optimization (separate by comma).', NULL, NULL, NULL, NULL, NULL),
(7, 1, 'meta_description', 'Site description', 'Meta Description Tag. Useful for Search Engine Optimization.', NULL, 'text_area', NULL, NULL, NULL),
(8, 1, 'max_cv_size', 'Max CV filesize', 'The maximum filesize for uploaded CV''s in bytes', NULL, NULL, NULL, 'not_empty|is_number', '3145728'),
(9, 1, 'file_upload_dir', 'Upload Directory', 'Upload directory to temporarily save CV''s. Must be writable.', NULL, NULL, NULL, 'not_empty', 'uploads/'),
(10, 1, 'apply_delay', 'Apply delay', 'The number of minutes that must pass between applications from the same IP address', NULL, NULL, NULL, 'not_empty|is_nummer', '0'),
(11, 1, 'date_format', 'Date format', 'The format in which dates are displayed. %d = day, %m = month, %Y = 4 digit year.', NULL, NULL, NULL, 'not_empty', '%d-%m-%Y'),
(12, 1, 'date_time_format', 'Date / Time format', 'The format in which times are displayed. %d = day, %m = month, %Y = 4 digit year, %H = 24-hour and %i = minute.', NULL, NULL, NULL, 'not_empty', '%d-%m-%Y %H:%i'),
(13, 1, 'sidebar_show_what', 'Sidebar Shortlist', 'Either cities or categories can be shown in the sidebar', NULL, 'select', 'categories|cities', 'not_empty|is_alpha', 'cities'),
(14, 1, 'sidebar_only_cities_with_jobs', 'Sidebar only non-empty Cities', 'Should the sidebar cities (if enabled) only show those that actually contain jobs?', 'boolean', 'radiobutton', 'no|yes', 'non_empty', '1'),
(15, 1, 'enable_new_jobs', 'Enable Job Posting', 'By turning this off, the only way to add jobs is through the admin-panel.', 'boolean', 'radiobutton', 'no|yes', NULL, '0');
(16, 2, 'jobs_per_page', 'Jobs per page', 'The amount of jobs per page, before pagination is called.', 'integer', NULL, NULL, 'not_empty', '50'),
(17, 2, 'jobs_per_search', 'Jobs per search', 'The amount of jobs per page when searching.', 'integer', NULL, NULL, 'not_empty', '25'),
(18, 2, 'spotlight_jobs', 'Spotlight Jobs #', 'Amount of Spotlight Jobs to display on the front page.', 'integer', NULL, NULL, 'not_empty', '3'),
(19, 2, 'latest_jobs', 'Latest Jobs #', 'Amount of latest jobs to show on the front page.', 'integer', NULL, NULL, 'not_empty', '7'),
(20, 2, 'most_applied_jobs', 'Most Applied to #', 'Amount of most-applied-to jobs to show on the front page.', 'integer', NULL, NULL, 'not_empty', '7'),
(21, 2, 'search_method', 'Search Method', 'Choose which search method to use. ''Alternate'' checks every keyword to appear in either the title, description or cityname.', NULL, 'radiobutton', 'classic|alternate', NULL, 'classic'),
(22, 3, 'url_cities', 'Cities Cloud', 'The URL for the City Cloud page.', NULL, NULL, NULL, 'not_empty|is_url_string', 'cities'),
(23, 3, 'url_companies', 'Companies Cloud', 'The URL for the Company Cloud page.', NULL, NULL, NULL, 'not_empty|is_url_string', 'companies'),
(24, 3, 'url_job', 'Job Details', 'The URL for the Job Details page.', NULL, NULL, NULL, 'not_empty|is_url_string', 'job'),
(25, 3, 'url_jobs', 'Jobs per Category', 'The URL for the Jobs per Category pages.', NULL, NULL, NULL, 'not_empty|is_url_string', 'jobs'),
(26, 3, 'url_jobs_at_company', 'Jobs per Company', 'The URL for the Jobs per Company pages.', NULL, NULL, NULL, 'not_empty|is_url_string', 'jobs-at'),
(27, 3, 'url_jobs_in_city', 'Jobs per City', 'The URL for the Jobs per City pages.', NULL, NULL, NULL, 'not_empty|is_url_string', 'jobs-in'),
(28, 4, 'enable_recaptcha', 'Enable ReCaptcha', 'Before enabling ReCaptcha, make sure to add your private and public key.', 'boolean', 'radiobutton', 'no|yes', NULL, '0'),
(29, 4, 'captcha_public_key', 'Captcha Public Key', 'You can register these keys for free at recaptcha.net.', NULL, NULL, NULL, NULL, '12345_YOUR_PUBLIC_KEY'),
(30, 4, 'captcha_private_key', 'Captcha Private Key', 'You can register these keys for free at recaptcha.net.', NULL, NULL, NULL, NULL, '12345_YOUR_PRIVATE_KEY'),
(31, 5, 'mailer_mailer', 'Mailer', 'Send mails with PHP''s mail() function or through SMTP', NULL, 'select', 'mail|smtp', 'not_empty', 'mail'),
(32, 5, 'mailer_encoding', 'Mail encoding', 'The mail''s encoding (default is utf-8, change only if it is not working correctly)', NULL, NULL, NULL, 'not_empty', 'utf-8'),
(33, 5, 'mailer_smtp_host', 'SMTP host name', 'Host name (for example, smtp.example.com)', NULL, NULL, NULL, NULL, NULL),
(34, 5, 'mailer_smtp_port', 'SMTP port', 'Port (default is 25, change only if you know what you are doing)', 'integer', NULL, NULL, 'not_empty', '25'),
(35, 5, 'mailer_smtp_requires_authentication', 'SMTP authentication', 'Is authentication required for SMTP?', 'boolean', 'radiobutton', 'no|yes', NULL, '0'),
(36, 5, 'mailer_smtp_secure_connection_prefix', 'SMTP secure connection prefix', 'SMTP secure connection prefix. Leave empty if not specified for your host.', NULL, 'select', 'ssl|tls', NULL, NULL),
(37, 5, 'mailer_smtp_username', 'SMTP user name', 'User name (for example, user@example.com)', NULL, NULL, NULL, NULL, NULL),
(38, 5, 'mailer_smtp_password', 'SMTP password', 'Password', NULL, NULL, NULL, NULL, NULL),

--
-- Table structure for table `settings_categories`
--

CREATE TABLE IF NOT EXISTS `settings_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `var_name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `settings_categories`
--

INSERT INTO `settings_categories` (`id`, `name`, `var_name`, `description`) VALUES
(1, 'Main Settings', 'main', 'The main settings for your JobberBase installation. This includes settings such as site name, meta-tags etc.'),
(2, 'Search / Pagination Settings', 'search-and-pagination', 'Settings that change the amount of jobs to display per page and which search method to use.'),
(3, 'URL Rewrite Settings', 'url-rewrite', 'You can easily change the structure of various URLs with these settings.'),
(4, 'ReCaptcha Anti-Spam', 'anti-spam', 'JobberBase has built-in support for ReCaptcha. Before you can enable this, you''ll need to register a free key at recaptcha.net.'),
(5, 'Mailer Settings', 'mail', 'You can setup the route through which emails are sent (SMTP, for example).');

--
-- Table structure for table `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `menu` varchar(255) NOT NULL,
  `link_order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `url`, `name`, `title`, `menu`, `link_order`) VALUES
(1, 'ideal-job', 'The Ideal Job', 'Let us know what the ideal job is.', 'primary', 1),
(2, 'widgets', 'Site widget', 'Would you like to display our latest jobs on your site?', 'primary', 2),
(3, 'about', 'About Us', 'More information about us.', 'primary', 3),
(4, 'contact', 'Contact', 'Don''t hesitate to contact us!', 'primary', 4),
(5, 'post', 'Post a new job', 'Post a new job for free!', 'footer1', 5),
(6, 'widgets', 'Site widget', 'Would you like to display our latest jobs on your site?', 'footer1', 6),
(7, 'rss', 'RSS Feeds', 'An overview of all our available RSS Feeds.', 'footer1', 7),
(8, 'about', 'About Us', 'More information about us.', 'footer2', 8),
(9, 'contact', 'Contact', 'Don''t hesitate to contact us!', 'footer2', 9),
(10, 'companies', 'Companies', 'An overview of all available companies.', 'footer3', 10),
(11, 'cities', 'Cities', 'An overview of all available cities.', 'footer3', 11),
(12, 'sitemap', 'Sitemap', 'Sitemap.', 'footer3', 12);