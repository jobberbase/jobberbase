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
(1, 'London', 'London'),
(2, 'Buenos Aires', 'Buenos-Aires'),
(3, 'New York', 'New-York'),
(4, 'Tokyo', 'Tokyo'),
(5, 'Cairo', 'Cairo');

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
  `spotlight` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `type_id` (`type_id`),
  KEY `category_id` (`category_id`),
  KEY `city_id` (`city_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `type_id`, `category_id`, `title`, `description`, `company`, `city_id`, `url`, `apply`, `created_on`, `is_temp`, `is_active`, `views_count`, `auth`, `outside_location`, `poster_email`, `apply_online`, `spotlight`) VALUES
(1, 1, 1, 'web developer', 'We\\''re a startup searching for a cool web developer that masters following technologies:\r\n* php, mysql\r\n* javascript, dom, ajax\r\n* html, css\r\n\r\nPerson should also have a good sense of user behavior.\r\n\r\nExcellent payment! ;)', 'Foo Inc.', NULL, 'http://www.fooinc.com', '', '2008-08-20 02:35:29', 0, 1, 10, 'f1acd80152446f4cf8a0bb8242398be7', 'sss', 'jobs@fooinc.com', 1, 1),
(2, 3, 2, 'Illustrator/Photoshop expert', 'Could you redraw in Illustrator da Vinci\\''s Gioconda, blindfolded?\r\nLet us know! :)', 'UnrealExpectations', NULL, 'http://unrealexpectations.com', '', '2008-08-20 02:35:37', 0, 1, 6, '6ebcfde637d98a9738c024c6074e945d', '', 'jobs@unrealexpectations.com', 1, 0),
(4, 1, 1, 'web developer 3', 'We\\''re a startup searching for a cool web developer that masters following technologies:\r\n* php, mysql\r\n* javascript, dom, ajax\r\n* html, css\r\n\r\nPerson should also have a good sense of user behavior.\r\n\r\nExcellent payment! ;)', 'Foo Inc.', NULL, 'http://www.fooinc.com', '', '2008-08-20 02:35:45', 0, 1, 8, 'f1acd80152446f4cf8a0bb8242398be7', 'London, UK', 'jobs@fooinc.com', 1, 1),
(5, 1, 1, 'web developer 2', 'We\\''re a startup searching for a cool web developer that masters following technologies:\r\n* php, mysql\r\n* javascript, dom, ajax\r\n* html, css\r\n\r\nPerson should also have a good sense of user behavior.\r\n\r\nExcellent payment! ;)', 'Foo Inc.', NULL, 'http://www.fooinc.com', '', '2008-08-20 02:35:52', 0, 1, 6, 'f1acd80152446f4cf8a0bb8242398be7', 'London, UK', 'jobs@fooinc.com', 1, 0),
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
  PRIMARY KEY  (`id`),
  KEY `job_id` (`job_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `job_applications`
--

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
(2, 'contact', 'Contact Us', '', '', 'We really appreciate feedback!', '<p>E-mail us at <strong>hello [at] domain [dot] com</strong> or use the form below:</p>', '1', '<p>Thank you for your message! :)</p>');

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
  PRIMARY KEY  (`id`),
  KEY `job_id` (`job_id`)
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
  `ordering` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `category_id`, `name`, `title`, `description`, `data_type`, `input_type`, `input_options`, `validation`, `value`, `ordering`) VALUES
(1, 1, 'site_name', 'Site name', 'The name of your JobBoard, used in various templates.', NULL, NULL, NULL, 'not_empty', 'Jobberbase', 1),
(2, 1, 'admin_email', 'Admin Email', 'The email companies will receive mail from.', NULL, NULL, NULL, 'not_empty|is_email', 'admin@localhost.cc', 2),
(3, 1, 'notify_email', 'Notify Email', 'The email for receiving new job postings.', NULL, NULL, NULL, 'not_empty|is_email', 'admin@localhost.cc', 3),
(4, 1, 'theme', 'Theme', 'Pick the theme to use for the frontend.', NULL, 'available_themes', NULL, 'not_empty', 'default', 4),
(5, 1, 'html_title', 'HTML Title', 'The HTML title for the homepage.', NULL, NULL, NULL, NULL, NULL, 5),
(6, 1, 'meta_keywords', 'Site keywords', 'Meta Keywords. Useful for Search Engine Optimization (separate by comma).', NULL, NULL, NULL, NULL, NULL, 6),
(7, 1, 'meta_description', 'Site description', 'Meta Description Tag. Useful for Search Engine Optimization.', NULL, 'text_area', NULL, NULL, NULL, 7),
(8, 1, 'max_cv_size', 'Max CV filesize', 'The maximum filesize for uploaded CV''s in bytes (Update accordingly in translations.ini)', NULL, NULL, NULL, 'not_empty|is_number', '3145728', 8),
(9, 1, 'file_upload_dir', 'Upload Directory', 'Upload directory to temporarily save CV''s. Must be writable.', NULL, NULL, NULL, 'not_empty', 'uploads/', 9),
(10, 1, 'apply_delay', 'Apply delay', 'The number of minutes that must pass between applications from the same IP address', NULL, NULL, NULL, 'not_empty|is_number', '0', 10),
(11, 1, 'old_job_notify', 'Old Job Notify', 'No. of days after which a job should be reported as old. Use 0 to disable this functionality.', 'integer', NULL, NULL, 'not_empty', '40', 11),
(12, 1, 'date_format', 'Date format', 'The format in which dates are displayed. %d = day, %m = month, %Y = 4 digit year. Follow <a href="http://dev.mysql.com/doc/refman/5.0/en/date-and-time-functions.html#function_date-format" target="_blank">this link</a> for more formatting options.', NULL, NULL, NULL, 'not_empty', '%d-%m-%Y', 12),
(13, 1, 'date_time_format', 'Date / Time format', 'The format in which times are displayed. %d = day, %m = month, %Y = 4 digit year, %H = 24-hour and %i = minute. Follow <a href="http://dev.mysql.com/doc/refman/5.0/en/date-and-time-functions.html#function_date-format" target="_blank">this link</a> for more formatting options.', NULL, NULL, NULL, 'not_empty', '%d-%m-%Y %H:%i', 13),
(14, 1, 'sidebar_show_what', 'Sidebar - show', 'Either cities or categories can be shown in the sidebar', NULL, 'select', 'categories|cities', 'not_empty|is_alpha', 'categories', 14),
(15, 1, 'sidebar_only_cities_with_at_least_number_of_jobs', 'Sidebar - only cities with at least X jobs', 'If the sidebar is configured to show cities, then only show cities that have at least the specified number of jobs available.', 'integer', NULL, NULL, 'non_empty', '1', 15),
(16, 1, 'enable_new_jobs', 'Enable Job Posting', 'By turning this off, the only way to add jobs is through the admin-panel.', 'boolean', 'radiobutton', 'no|yes', NULL, '1', 16),
(17, 2, 'jobs_per_page', 'Jobs per page', 'The amount of jobs per page, before pagination is called.', 'integer', NULL, NULL, 'not_empty', '50', 1),
(18, 2, 'jobs_per_search', 'Jobs per search', 'The amount of jobs per page when searching.', 'integer', NULL, NULL, 'not_empty', '25', 2),
(19, 2, 'spotlight_jobs', 'Spotlight Jobs #', 'Amount of Spotlight Jobs to display on the front page.', 'integer', NULL, NULL, 'not_empty', '3', 3),
(20, 2, 'latest_jobs', 'Latest Jobs #', 'Amount of latest jobs to show on the front page.', 'integer', NULL, NULL, 'not_empty', '7', 4),
(21, 2, 'most_applied_jobs', 'Most Applied to #', 'Amount of most-applied-to jobs to show on the front page.', 'integer', NULL, NULL, 'not_empty', '7', 5),
(22, 2, 'search_method', 'Search Method', 'Choose which search method to use. ''Alternate'' checks every keyword to appear in either the title, description or cityname.', NULL, 'radiobutton', 'classic|alternate', NULL, 'classic', 6),
(23, 3, 'url_cities', 'Cities Cloud', 'The URL for the City Cloud page.', NULL, NULL, NULL, 'not_empty|is_url_string', 'cities', 1),
(24, 3, 'url_companies', 'Companies Cloud', 'The URL for the Company Cloud page.', NULL, NULL, NULL, 'not_empty|is_url_string', 'companies', 2),
(25, 3, 'url_job', 'Job Details', 'The URL for the Job Details page.', NULL, NULL, NULL, 'not_empty|is_url_string', 'job', 3),
(26, 3, 'url_jobs', 'Jobs per Category', 'The URL for the Jobs per Category pages.', NULL, NULL, NULL, 'not_empty|is_url_string', 'jobs', 4),
(27, 3, 'url_jobs_at_company', 'Jobs per Company', 'The URL for the Jobs per Company pages.', NULL, NULL, NULL, 'not_empty|is_url_string', 'jobs-at', 5),
(28, 3, 'url_jobs_in_city', 'Jobs per City', 'The URL for the Jobs per City pages.', NULL, NULL, NULL, 'not_empty|is_url_string', 'jobs-in', 6),
(29, 4, 'enable_recaptcha', 'Enable ReCaptcha', 'Before enabling ReCaptcha, make sure to add your private and public key.', 'boolean', 'radiobutton', 'no|yes', NULL, '0', 1),
(30, 4, 'captcha_public_key', 'Captcha Public Key', 'You can register these keys for free at recaptcha.net.', NULL, NULL, NULL, NULL, 'PUBLIC_KEY', 2),
(31, 4, 'captcha_private_key', 'Captcha Private Key', 'You can register these keys for free at recaptcha.net.', NULL, NULL, NULL, NULL, 'PRIVATE_KEY', 3),
(32, 5, 'mailer_mailer', 'Mailer', 'Send mails with PHP''s mail() function or through SMTP', NULL, 'select', 'mail|smtp', 'not_empty', 'mail', 1),
(33, 5, 'mailer_encoding', 'Mail encoding', 'The mail''s encoding (default is utf-8, change only if it is not working correctly)', NULL, NULL, NULL, 'not_empty', 'utf-8', 2),
(34, 5, 'mailer_smtp_host', 'SMTP host name', 'Host name (for example, smtp.example.com)', NULL, NULL, NULL, NULL, NULL, 3),
(35, 5, 'mailer_smtp_port', 'SMTP port', 'Port (default is 25, change only if you know what you are doing)', 'integer', NULL, NULL, 'not_empty', '25', 4),
(36, 5, 'mailer_smtp_requires_authentication', 'SMTP authentication', 'Is authentication required for SMTP?', 'boolean', 'radiobutton', 'no|yes', NULL, '0', 5),
(37, 5, 'mailer_smtp_secure_connection_prefix', 'SMTP secure connection prefix', 'SMTP secure connection prefix. Leave empty if not specified for your host.', NULL, 'select', '|ssl|tls', NULL, '', 6),
(38, 5, 'mailer_smtp_username', 'SMTP user name', 'User name (for example, user@example.com)', NULL, NULL, NULL, NULL, NULL, 7),
(39, 5, 'mailer_smtp_password', 'SMTP password', 'Password', NULL, NULL, NULL, NULL, NULL, 8),
(40, 4, 'report_post_after', 'Report Post Delay', 'No of Minutes after which a user is allowed to report same post after the previous report.', NULL, NULL, NULL, 'not_empty|is_number', '10', 7),
(41, 4, 'post_notify_on', 'When to send Mail?', 'Send mail only after this number of reports on a post.', 'integer', NULL, NULL, 'not_empty', '2', 8),
(42, 4, 'captcha_enable_on_post_page', 'Enable ReCaptcha on post page', 'Enable spam protection on the post a job page.', 'boolean', 'radiobutton', 'no|yes', NULL, '0', 4),
(43, 4, 'captcha_enable_on_apply_page', 'Enable ReCaptcha on apply page', 'Enable spam protection on the apply to a job page.', 'boolean', 'radiobutton', 'no|yes', NULL, '1', 5),
(44, 4, 'captcha_enable_on_contact_page', 'Enable ReCaptcha on contact page', 'Enable spam protection on the contact page.', 'boolean', 'radiobutton', 'no|yes', NULL, '0', 6),
(45, 1, 'enable_new_post_moderation', 'Enable Job Moderation', 'If enabled, the administrator must always activate the very first job posted by a hiring person/company. From there on, every job posted with the same email address will be automatically activated.', 'boolean', 'radiobutton', 'no|yes', NULL, '1', 17);

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
(4, 'Spam Settings', 'anti-spam', 'JobberBase has built-in Spam prevention features which help you to combat spam job posts.'),
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
(1, 'widgets', 'Site widget', 'Would you like to display our latest jobs on your site?', 'primary', 1),
(2, 'about', 'About Us', 'More information about us.', 'primary', 2),
(3, 'contact', 'Contact', 'Don''t hesitate to contact us!', 'primary', 3),
(4, 'post', 'Post a new job', 'Post a new job for free!', 'footer1', 4),
(5, 'widgets', 'Site widget', 'Would you like to display our latest jobs on your site?', 'footer1', 5),
(6, 'rss', 'RSS Feeds', 'An overview of all our available RSS Feeds.', 'footer1', 6),
(7, 'about', 'About Us', 'More information about us.', 'footer2', 7),
(8, 'contact', 'Contact', 'Don''t hesitate to contact us!', 'footer2', 8),
(9, 'companies', 'Companies', 'An overview of all available companies.', 'footer3', 9),
(10, 'cities', 'Cities', 'An overview of all available cities.', 'footer3', 10),
(11, 'sitemap', 'Sitemap', 'Sitemap.', 'footer3', 11);

-- Jobberbase v2.0 database upgrade

--
-- Table structure for table `i18n_langs`
--

CREATE TABLE IF NOT EXISTS `i18n_langs` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `code` varchar(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `code` (`code`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

-- --------------------------------------------------------

--
-- Table structure for table `i18n_translations`
--

CREATE TABLE IF NOT EXISTS `i18n_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `lang_id` tinyint(3) unsigned NOT NULL,
  `item` text NOT NULL,
  `value` text NOT NULL,
  `field_type` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`,`lang_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

-- --------------------------------------------------------

ALTER TABLE `settings` ADD COLUMN `extradata` BLOB AFTER `value`;

INSERT INTO `settings_categories` (`id`, `name`, `var_name`, `description`) VALUES
(6, 'Look & Feel Settings', 'look-and-feel', 'Change your logo, pick a theme + other UI settings.'),
(7, 'SEO', 'seo', 'Titles, keywords, description, Google Analytics...');

INSERT INTO `settings` (`id`, `category_id`, `name`, `title`, `description`, `data_type`, `input_type`, `input_options`, `validation`, `value`, `extradata`, `ordering`) VALUES
(46, 1, 'timezone', 'Timezone', 'Please select your timezone', NULL, 'timezones', NULL, 'not_empty', 'Europe/London', '', 5),
(47,6,'site_logo','Site logo','Upload your logo',NULL,'file',NULL,NULL,'',0x89504E470D0A1A0A0000000D4948445200000177000000520803000000980864FD00000294504C5445000000A18B850897C66C6C6CD0EBF444AED1795954D6D4CF4B474474C4DFB6B5B5272724FEF1E6B2DEED1699C6DFDBD68C8A87A2D6E8B0AEAB54B4D51A1111F2ECE726A4CD5452517D7976FFFDF2C6C2BC93D1E63A3735A7A39E7354506A4A44876D6997938F937A7563BBD983C9E00C0C0BE0F1F77D6460FFF8F536AAD1C3B5B3D5C7C165625D211F1DA39C96E9E5DDC1E5F145B1D4CDBDB8FFFFFF3F3D3E060504302D2CFFF2EDF7F3EAB6A39D89726C807B76BDADAB9C8A86E3DED6D7CECD82656273706D97827E83CBE25B5754CDC6C07C625CDFD5D0161415D2C0BA735A54A79692F5F0E886817DE5DFDEDBC9C125A0C99B9A95FFF8EF49444264BEDBAC99936D514BB4ADA8EEE6DDBCB4AF423A37504745D0CBC56B6462AEA8A4C6BDBB9A837E302B2BBDBBB867454135A7CDDFD8D67C736F3C32305754528C8B8AC6B4ADAF9D9BF9F6F7F0DAD1625C5A9B96962823228D7974EDE5E4F7F1ECFFF4EAA5938F856A65C4BCB7B7A7A5858484755A57080000ECCFC8E4B8B50E0A08B4AFACEFEEEDAB9793D4CCC74B4A49292827746C6AAEABA87B5C58BEB7B5937C799F8D896B4B49433F3D211A1B0C0E0E71524D8C7571CDC4C37D7C7C1816146C6865DFDEDD6B5252C5C4C5D7D6D63938399C9A99FFFFF7727171E6D8D3504C4AE7E5E4B6B2AE646363F3DED8A58F8B949292CCCCCC918E8C9489848A8584E5BAB6DECEC580625E8C6B6BEFDEDE52524A333333BBA9A3CCBDBBBFBEBE837C7B685754D5C8C7F4EAE19C8582E5D5CEA8A7A65A5A5B8F7B78B59C947B6B63191818948484B3A09E080808947373101010212021F7F5EF211010A59F9C7A7473F7EFF75B4A47734A4A4343424A3A3AC2AFA9F4EAE5372726BBA49F423331AD8C8CF2E0D79B7F7B89847FCBB4AD0D0302101008E7C6BFE5BDBAC337B1170000003474524E53FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF004B572265000015344944415478DAED9D8B7313479AC0478A04168E86284A848D8C226359D8E1354A63930D041B2B315A035EC72876C4066B49AC3D1275785AC671ED1125100484603B3805410962970DD93AD7952FE1089BE44A159771D975954A6EAFB2B9ABBB7FE6BA7B7A46DDF3F003CB5750A52ECA1A4D3FA6FBD7DD5F7FFD7D3D420085904880FB0870C0926A9A3D49DC628983526083A05E8DF8C7C6869B168EBD650C8591D99224718AE4D2D4DFE616AD9AD061AF71C187867B628C84F4420B88936CFE5952E4E492734B825D479D861AF890704FC974162C0F68BEC45C3D33165B8AEAD758CD82687B38B85BEE938E654EEEB125E42E5ACD83EDA1E03E20D33110F077B67FBF7BF7EE81934D0F20F759B05B45F8307087C3184E4A13DDBEBD655DA6CD4742A6B9E5FBA68788BBB5E6A1D06760CC62D1A8252BDF5D37343438D8BA8E844C06B11F1E687F00B9DBD51B92D3D1A182870F03777DD8BECED7D68AC2BA42C8B4B535271F64EE387815EEAE8792FBDDA18C827B8C09195F7FECC1E6AE6A39818791FBB1A13193D0D675F7C1E62E19DF7E30B9E790269E2C48C4E1AE31F3F0D47386DCD32303168B2519CF9972874D6815B1A462C6DD941E4992E25A5271EDFE6DC03FD6D2445621B43F1E4E8DCCCA5DB9EDD66CB2026E3BDDD13A0C76B441AFBB17C7F6DA039261F5A4801DAF1DA2DDE12CA23EE3C72DB6285F9F7F0A4BF656CA99B9A4E0CFEBB9C3A41ACDD91B18EE31BF92C2AF1FFEB914FB84645AD777FE34B54AE0272466E11E34903330D0A1D176823C543BA7830674FDC2E5EF70158B7B8CDBCDF77CA0ACA619B494FA7C8383835895441FAD72188A69B937F9596C29A8E79E6B6153B4680C0703DA49C5F68C5C761C322524CCB9BBE86D66584A1D7AFD9E1DB5815963D15CD1E6EFB515873BB75F6D1A1CA4C833CDC72C2FFFEAC737DFFC712099B2ACED6F6D5DB66C19E23E38ACE11ED7506B815AEE093F9FC29FD399D7F890D49A78526CDFA4CCB95346A2BE27CC76B446F606179835FFE20C11C6DC2F7435AF43437BEDCD7FF9CDCF3F6DCDD25037F5E42B9FFDFA6F96E706079B5BDBE25C3E3DB6160D777D0A7F7A56EC0C786AB4E33ACE62C61D2A10BD05C1636C4F50B3390BB64CBB3AB0C5E0ECDDB628F086DC37AFCBAC6BEBFFBEE92782BBB3732B099D38E01B3F9D6C6D1BF3DDE5F251A96BB1E8E5448C636DB1F879749C9019C60B6A4E5D06E23C772EC40DB90725550E33ABAA5B49E7C22C6D2E5133E0691637211DB46BF7BB6AB7D520E1039D4A7C072C32F7A77DCD6DC33B00A893816FED5303F99A05CF746532998496BBBC148E28D0FC50C7DD42F2245A3819CD70558453BA852FA2C0DD3F90488C24FDCA5C98C54AE0863AFDC6A505E9A0C25BD351359ADEB46BF27B17BF3F30E4DE824C027740A74C7CAB3ED401CB50ABAF5BC37D442B33625AEE49CE13C20C785AC830E4B52BB58884764DC8A5E7B0CF885EBD3ECFDC72706429474923EEED9AED8057BB0A2FC2F266C4BDBD39E35B3B5557570740164761D902E835FEECEC046FFA5ADBBEE3B9C7B5ABE0D8B0867BC1E8261BE154374B7A4C670C8D7145248C749CD9B88B5EA8D32BEDFA9E10398C858514F6B2EA101DFEBDCC12222ED61061C4FD645B6BD7AF10EA9FE2DD3D3DDDB193B11E12BA4F9E8C757777C776A16EF827AC4B2658EEC3062A619AE7CE68E44DDC1C89EB8B8063AC5EAB7287F3B647721AB8433B38214DC58D7791D92EB96A0A9B2703C80EC38DD922B9A7909EBE1E6437355EDE72F8854641287BAC626666E6A38FF2825075A8ECDEE5179AC071FF60AB6F3BCB9D3565A6B97B319D5A88B7C3EC3D5AC6009BA0852D22A15B88E76107EEB0B15BCD00BB4D822E8EBB4D55708C1CB3928175932A401D45E53E8C8C8E4FD61D6E18FD1C3D2AFDD5F53337488A47223B3F4F83ECC7D736466E800BBE315F8AE50E0DA8C638EE9CED3EC98234E83A25418CE31E33E12EDAD5D03197A207A540AF9A44B37062F43A2341C0807190CF5F14EE897519DFDFC1E1FC157417CB78F858C3265037B52F728E8AFAF401E1ABCF90803FC6EAEF5CA92956A0C78C7A868A163F3B3D923126588CB837CDC72EE6AC31F538D95C8E5E6E4E28F779FDDEEE0DEAAD9B1D01362C01F7B8AF39F35FD3B5AB11743980BDB54D60A6E155504754F84E000E7DF8CADFC6963533F92C46A6300BC79D4B91606E2666B1C0F1DC13F3B347AA1803BC554B2F8B803178546261D4DB679165C5E43EE0DBFFDB67CEEC54B1A370707473646FE106C85DDAFBD77F6F1BDB65229B0DB9B7DC17777E5DCDCD8FBB2AB00B960257C7ECDC823ABAF6E0DCDC8BBAAEBEDB5675A9F14C3BC31DACA97AFFCC71F646C5BDAAF2C1D63BC0E41C821177CBFD708FE953CF873B50A4091DB5D0AE912336FD78956A4CEC00E6DC3B82C5E47EA16DEC5F27CB008B79F396FC0676FC83AF26F2DF0D0E8E1457CEB458F89054ADF00BE61EE0B73A05741D6EAFC464E4575C177FF88C1A68ECBAB55B0E81C558E10DB83FBFACF5CDB26F4156618CFF5C17FE82D758F5DEC71BA7FF6D2863CA9D133E86DC59E103C7E6F259DD37F700F7ADC315D464D41568F3DAB507121C4BE1BC321AEFBED6BF1E3AA4327E52E6FE0BE27EE284CABDFCBD9B1F74BDC7E8915CA97E760B1B33C2CA693CFEB9CEAA2D983BEF61A5A3B817CE4B0F8485B580DB552D35F7777DADFFFCE938A472E5E4DA1FEB40FB271B0F03B0EBEECB7BE4BB604564FDF35D49567F6F32C094E0B8B34B2F6F7F49196CACB07E99C8DD2FF70ED69265B0F19178EE01D16A8706DD26B18BB456984B5271ED91DBBB32AF3C7E6A39E59ECCDC84E0C827B7EFED005F361FDB0C644D72F4E09E0DB739FB8C452F66FCBC7DC60F7562862A28717D026CD82CF4D542B97B39CF46409FC8C1710FE8CA10D9655934B23E62138E58D475F54E5BDBAEA9A30728F71D6F7E06D2672AD2F99DE0C433EB3BE5E17E75E20B58B5C6CC2E36C21B060CEC62393F6791491B6D47E30CE9057257B1770063EE9037C0DBB5E64A652DB5B1A39FDB85057B17670836B213B4B6DD013DB5DD54C2A31BA3F91DE0312106A88E03A62E1E9DDAD5F8B9C60E1CD76057043A6307863C76157452B704284EF205730F4ACC81317E59857AB79E93A1CC9A153AD8E910D43F4512ADC5E79EBCD804B23B2F4D2B627674B21B01DF30F112ADF8D57D911150BD45E76FB28C20BDAF29A5F526317E8F617CC423A77A4955C192D6399886B932E6E23EFBC95449B3CB09BAD5140E56EA14C0D7F01914A9D44BE50A7458B516FBA2F83DC6DF007D95B7274EDFC8C1F4D5EA8D1B5700ECE09B117EE8699F4AAFAF982C470AE4C58F0CFC7C065B4D8D9F4FEFAAE3E7C8702C9148C4B40EA9FBE4EED4ACB276ECA6936A1825BD831BD0C88F17641D7912678E27095C92E4520BB083E272FF7323F27A80D517850F1B1B6B1BDECF11D7531D38B75FC837960BB515E96C7675FE2A972FEE373D8641B90FE85CD716BDF9D1A40C53EEB39D7F2F18CC8D4E03704A4A600E2B80F16B2562B1FDABE0C33F83BE3E50F7CEEDD1471E7B1100D9C1DA09A6BAB71DD8796B39C86E056587F87CB99CDFEC1006E51ED79E196881061B29E3AECB8D99BCCD53338B9071EAFDDA6A9C0B721A8B61398CBA0F6CBD06F1453F4F00DEB89C03D87F4DDD7A34F455D21B5BC1D9DAE59CDAE167164BAD6AA2BEDFC4834F69468B22D20B8B41426BD0D7BF9B66FA7E137FE00BF2E0F1B901277FA2C0A92BC8C1D54F15E926F1C5E10E1AAFAB8709B6FEFCD61E4C7DCF5B3F2B4E6E703C5FC1BB4AB1C500164E15A572BABD29615690462D066F8F8CB0FDD2C279419A34E76D0AE0F5EFF3F5DA6B02BAA1C8D8236BA482F0A93139C727D6E854F320BB2E18C41785FBD5C85F40A702FEADFFFD4714FEE74FCA7700F76F6146027A7F958E4C48CEA50E8C68F9C40B6F349073A9DA93AB851DEA482C852D62315D1189946520BDA8963A03B2314B1DA692DBEED2784502B2C1CB6BA2A74801078EAF094860B1C1ECBDB2776A8F90118F057BDD9EB7FEF0873F9D50FA219B7DE128288522711FD6C8E535A7AA41961E559277AEEA685F75EF6A095C91B843DD7A78B6612728C81A358095FBCB13256EC5E26E60ACBDB271FC1C391EA9046C22C8DECA9F2E512B06F791E1318B457762918447EE6DB8B6790A871372487FB3E5E8B512B46270E79D9B9A9DC90D21727DE6916D7B2B2A2A666EDF1E3D5D2E8C969015877BCCF41D0B2469C6CFBC5436BEA17C723212C94F6EFC7667F578F99512B3E273E73D0F5726CADBC174D5D4A7B5E5C2E5CF7F1847FAF3F1F27C895951B8A7FD266FBE007030DF0E3AE38D67CFDC3A27082FADBA88F44A9088CC94A015655DCD59B46E096555BD74153C5AB95EB8347E62FA875141781F5983FB40B5F095E98ED06BFA18E80A8717F2633C416F38BCC8DFD370F19B51EF624E5D302D731A3404B5CE0B17CA1DFB8FF181C48426E715A11A3B53BFAE12A6C12F1BFAEE09AF221B655F656555159BCACD18BB45D39F1E7170AF57CC1DE4F4A1C5589E6CFC0FA1D8F8F300D0432D64F3EB5C51B15BDA3CB239938FAE47F7A261515A2077E330BE2F3BF5756767E5AE4D53E0A58BCFAEEE41A31D05F09AF00E932AC47037F5BF44AD564F388CAA1C9DE750B58A6109BD84E45E047789AF8DC49FD9405FEB43A1FAF9DAD0D5B23CD69053726B7EDB0675B1570A86ACE16270FFE6D439B0F77A65651F7E996C7A7C33A844D8B3E77EE904ABEEE96A15E66BA74710A5F8E73724426466781771EC731EDC2599986B21DC25E2A44593250C74651789FBBE2AF0ECF8F81E62A2C9F61CDC412EC0A6C917C1D391B366DC9D086D148F203C26EA9DAA2C924715C42338288690355C24A98251114D042C34AD4E67BD7C2973AFC7D151CC04A23424B5449E42FE864434DFA34C1C806836C9571AB27896616182BE62B7AA3BC8C542993B7A36AD6D184F01F9695E87D5239147846C0C7717691D647239D067C88B9B120A3AF0D10E49C413155FC2A8C72A374BA9B2D26433EEAFD5C6C0CADA7DCF5612EEDD0AF7E591234802FD60C65DF484C8D8464E85FA7AF56484A8C897A8D54366B88852D593B7EA707A54C9B0B5DE5AEF51071F328D8B6EF90C3AEA2B3124E27E085B43180CFE4B5D1668DCD1382461F195076AB9A3E2431EECB0465F45FC588FEAEAF64A92D34D3287E5DABAC8BA12925B10A69E3E5C538FC8C8196B3DFD750235573D49E9218EF1286EB32C8744E443C4D5924BA655569B6CC67DE6DE2B2031A9708F6D5C2E734FE4AB41654FED1513EE215C1D1157CF81E504159E4A3CAE2AE10EE5091EC52B27194B6152B77A55A0CBAD0E054957413CB1A33CF77A18B4214A38AE1E35D5858F10F1D39F707711026EDADD10BBA7BC4AAC7A842048068817FB5A43F8BB0BB780D44882A49E30A472B7D52B2F0B32B91839E3C4D5137194844716E9D6286E16ADB2DA6433EEF9DB68CC3750EE2096A7DC57E63F02959B2FBF6D266764611794CFAA28B5D57297805C190F71F8E3FA8671252959AA47623F12EA370F99032E448EE3EE95071F8EB385212ACDC1E7A7DCA364A6A1EA0425F9744194762D5E72C2612C559CA4705A1A2213748530C6B0ACFF78499C93592B9C58ACA02A33B958F92E5AA1640DA18A38701D6D4174D0D5C3559936D984FBCAC94D203B2A5CA7E3FD5CE43DCA3D72F0EB6CB6A2DC7C5D9564B6ACF7521DC774E041CAC8AA1E966698122A4E22D8718CDC625C28C75DE2D7F1107702C0E586943B5DEBD025F35876D50DA91D4AD206893C96B987809A5E5DA32151D3D1A12591CDC5728F5A9D0E2B92FC681A62498F478F87AB326DB209F723477780EC3EA16A0F390F09569F42CA3BBEC85D6E4016CB351357E7E22EE11054B571F905742C39691B1C881191B19264035AEE742380CB15C90071AA0DE5B993FE411BAC90354A1EA8F48297B272937980564F1BF358963B9E815E32D90096571EABDB092586BB1CA772F7CAD935B958EE4E6B144147839D2C6068CB2269AA4C9B6CC2FDDBFD75D96C99904FC86F92AD10AEC8EF9435451A5ECC66371F7C7B56EE94968B6E7CD0E3EB11F8603D15866EB25C7A29155B48D272972708511EDCE45E08DD20331FB283478E73A3A7CB10A0DB0BD4FB513CC0E52506E794C8AE0D65F772FA8C078D779B526F9B0C30CC7097775F6185BB539EC2212E17AF478AB88692953C284C2BCF569936D984FB69ECDCF8AD70F9850D07F656AFF9FD271F5EDCB6E99799C307CA6A85DFA30E282B9B9D3B6AA94B8AAA9B12ECBAC77A0296C758B10861AD0FE2CBB01416AD3AEEA879A17094E83C68250C854378FD2337916A516884642571A8E55843955CCABA8AEE7BEA895602B1721AB5CA32D84A1F5BD83785E43365A8A20E0756BAC8F80C5BAD6A8D3034D1112DE83348417160D594CD45B923DD28EC20FDED254B6B90B4DB85356A2B5B65B9C926DCAF575D3977F6A070E0AB1B8F6FAA3E23DCF8F88FC2E8B56F56ACA89E141A9F44D19C26E9A1FA9F073F2B48D69B303EF310527775125103888A8C17382CF4709C132B5F1E27AE6014287F811221EF04C8CE9CA4C6C6839084A782871EF392F3930D1046282AEA0CF9BD0D59AF0FD16DBD0D3D47792C6327083955B384830E108F1442ED51EA02B1422F290F248B8E5C65265750597CF1A7444E673BE46E8B120A58A3E4ABEC349333B71A262ED70A42E34EE4F1A8683C353A5335F1EDB66DDB3E5D756F4238F8ED81C93F72C60EDA9820F9B4C90F50A53B8D53BE93C121293D62A357F2117EE6207FB070AA5F4983EEA1226C507910178733B0BB2635B7721F574B32DB2E43253D24E5D9D8BAD824F681B8109B3697DC6428172F7FA131A4CA30A8AFB209F7E593875F7DEDBA70EAD68A356BA61F3F57FDC591153DD3D33D3DAF8E0A47670E4FE4972F66FF5EB2029B72FFE8E87174D87D2622BB5BB3F41739D091AEC82174EBB1FCC78BE02E96A89B721F1DCF661F059B8F3E0EFA98D0094E8F03D0075ECC2FC2DBE77596A89B721F99C0BFEA7324728572AFAC94B9971DC4237FBAB674706969B8835591EACFDF17225729F72773E403ACBEF4427B7AF9D1D2119AA5E20E36E4CF8C97E557CBDCC11767D2B2D7E396902F3F35BEBC046EA9B80380DE1B6BECA6DC770A94FBD94B9FBE7DAB846D29B9A3B0FF0B20E3AE983C215F5C2B9DE3F87FE08EEC0132EE6D0D9B658BF0F42254C852982FF74355F2596CF00B3A5CF028BE78636389D99273BF737D620DD92FA52F0A3F40B47D024DF7269E5B5FA2B6B4DC77777DF01F93FB1EB9766DE796DABC70FA4AFBC7D39186FFFCC0B7BB846D29B90F77F96EFEFDF955FFFD61FE8927DEB87AF089A3FBFFE189B2E75FDEDEF5D477256E4BC7DDF29465FB8BE95FD77DEF6BED5FF625686E5ED6D5D5B5EB787B3CD9FFFADD12B825E3EEF70DA757B64F6D87DF2F6BF63D8D7EE3B1BF3F330047567E99E8F7B596C02D15F71DFD63CB7E3772FED5F3777767D611EEE8BFB2D9FDF49D9B4D49F45BD825704B36DE8F75F93E5836349441FF32AF6F074343E8FF39F075657CE87FCF7ABDBF046EC9B8276EDEBC79F7C2EFD6AEEDF7AF5D7B07A4EEAEF5FB8F9D3F6FB97BE1C285A612B84586FF03223A040872CA92E00000000049454E44AE426082,1),
(50, 7, 'google_analytics_code', 'Google Analytics Code', 'Enter you Google Analytics code here', NULL, NULL, NULL, NULL, '', NULL, 5);

ALTER TABLE `job_applications` ADD COLUMN `name` VARCHAR(150) AFTER `job_id`,
 ADD COLUMN `email` VARCHAR(100) AFTER `name`,
 ADD COLUMN `cv_path` VARCHAR(255) AFTER `email`,
 ADD COLUMN `message` TEXT AFTER `cv_path`;
 
 UPDATE `settings` SET `category_id` = 4 WHERE `name` = 'apply_delay';
 UPDATE `settings` SET `category_id` = 5 WHERE `name` IN ('notify_email', 'admin_email');
 UPDATE `settings` SET `category_id` = 6 WHERE `name` IN ('sidebar_only_cities_with_at_least_number_of_jobs', 'sidebar_show_what', 'date_time_format', 'theme', 'date_format');
 UPDATE `settings` SET `category_id` = 7 WHERE `name` IN ('meta_description', 'meta_keywords', 'html_title');
 
 UPDATE `settings` SET `ordering` = 1 WHERE `name` = 'admin_email';
 UPDATE `settings` SET `ordering` = 1 WHERE `name` = 'html_title';
 UPDATE `settings` SET `ordering` = 3 WHERE `name` = 'meta_description';
 UPDATE `settings` SET `ordering` = 2 WHERE `name` = 'meta_keywords';
 UPDATE `settings` SET `ordering` = 2 WHERE `name` = 'notify_email';