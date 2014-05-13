-- phpMyAdmin SQL Dump
-- version 4.1.9
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 14, 2014 at 09:51 AM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jobberbase`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
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

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `var_name` varchar(32) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  `category_order` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_order` (`category_order`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='programming/design/admin/etc.' AUTO_INCREMENT=15 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `var_name`, `title`, `description`, `keywords`, `category_order`) VALUES
(1, 'Programmers', 'programmers', '', '', '', 7),
(2, 'Designers', 'designers', '', '', '', 3),
(3, 'Administrators', 'administrators', '', '', '', 0),
(7, 'Marketers', 'marketers', '', '', '', 2),
(5, 'Testers', 'testers', '', '', '', 5),
(6, 'Editors', 'editors', '', '', '', 1),
(8, 'Managers', 'managers', '', '', '', 4),
(9, 'Consultants', 'consultants', '', '', '', 6);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `ascii_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=73 ;

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

CREATE TABLE `hits` (
  `job_id` int(10) unsigned NOT NULL,
  `created_on` datetime NOT NULL,
  `ip` varchar(15) NOT NULL,
  KEY `job_id` (`job_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hits`
--

INSERT INTO `hits` (`job_id`, `created_on`, `ip`) VALUES
(1, '2014-04-14 08:46:00', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `i18n_langs`
--

CREATE TABLE `i18n_langs` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `code` varchar(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `code` (`code`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `i18n_langs`
--

INSERT INTO `i18n_langs` (`id`, `name`, `code`) VALUES
(1, 'English', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `i18n_translations`
--

CREATE TABLE `i18n_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `lang_id` tinyint(3) unsigned NOT NULL,
  `item` text NOT NULL,
  `value` text NOT NULL,
  `field_type` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`,`lang_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=281 ;

--
-- Dumping data for table `i18n_translations`
--

INSERT INTO `i18n_translations` (`id`, `parent_id`, `lang_id`, `item`, `value`, `field_type`) VALUES
(1, 0, 1, 'header', '', ''),
(2, 1, 1, 'name', 'jobber', ''),
(3, 1, 1, 'title', 'IT jobs', ''),
(4, 1, 1, 'home', 'Home', ''),
(5, 1, 1, 'rss_alt', 'RSS', ''),
(6, 1, 1, 'rss_title', 'Subscribe to the RSS feed', ''),
(7, 1, 1, 'seen_recently', 'Seen recently', ''),
(8, 0, 1, 'search', '', ''),
(9, 8, 1, 'default', 'Search for a job', ''),
(10, 8, 1, 'example', '(e.g. &quot;ajax&quot;, &quot;designer, london&quot;, &quot;php, chicago&quot;)', ''),
(11, 8, 1, 'submit', 'Post a new job', ''),
(12, 8, 1, 'submit_title', 'Post a new job', ''),
(13, 0, 1, 'footer', '', ''),
(14, 13, 1, 'column_use', 'Use', ''),
(15, 13, 1, 'new_job', 'Post a new job', ''),
(16, 13, 1, 'new_job_title', 'Post a new job', ''),
(17, 13, 1, 'rss', 'RSS Feeds', ''),
(18, 13, 1, 'rss_title', 'RSS Feeds', ''),
(19, 13, 1, 'column_find', 'Find out more', ''),
(20, 13, 1, 'column_misc', 'Misc', ''),
(21, 13, 1, 'companies', 'Companies', ''),
(22, 13, 1, 'companies_title', 'Companies', ''),
(23, 13, 1, 'cities_title', 'Cities', ''),
(24, 13, 1, 'cities', 'Cities', ''),
(25, 13, 1, 'widgets', 'Widgets', ''),
(26, 13, 1, 'widgets_title', 'Widgets', ''),
(27, 13, 1, 'powered_by', 'Proudly powered by', ''),
(28, 0, 1, 'sidebar', '', ''),
(29, 28, 1, 'menu_title', 'Navigation', ''),
(30, 28, 1, 'other_cities', 'Other cities', ''),
(31, 0, 1, 'jobs', '', ''),
(32, 31, 1, 'html_title', '{0} at {1} / {2}', ''),
(33, 31, 1, 'activated_success', 'Job ad was successfully activated.', ''),
(34, 31, 1, 'delete_success', 'Your job ad was deleted.', ''),
(35, 31, 1, 'confirmation_success', 'Your job ad was published.', ''),
(36, 31, 1, 'confirmation_error', 'Your job ad was cancelled.', ''),
(37, 31, 1, 'publish_success', 'Congratulations, your job ad was published!', ''),
(38, 31, 1, 'add_success', 'Your job ad was successfully posted!', ''),
(39, 31, 1, 'type_error', 'Please enter the job type.', ''),
(40, 31, 1, 'title_error', 'Please enter job title.', ''),
(41, 31, 1, 'description_error', 'Please enter job description.', ''),
(42, 31, 1, 'email_error', 'Please enter your e-mail.', ''),
(43, 31, 1, 'email_invalid', 'The E-mail address is invalid', ''),
(44, 31, 1, 'job_title_error', 'Please enter job title.', ''),
(45, 31, 1, 'job_description_error', 'Please enter job description.', ''),
(46, 31, 1, 'job_email_error', 'Please enter your e-mail.', ''),
(47, 31, 1, 'title_edit', 'Edit your job ad', ''),
(48, 31, 1, 'title_new', 'Post a new job', ''),
(49, 31, 1, 'report_fake', 'Is this job ad fake?', ''),
(50, 31, 1, 'report_it', 'Report it!', ''),
(51, 31, 1, 'published_at', 'Published at {0}', ''),
(52, 31, 1, 'viewed', 'Viewed: {0} times', ''),
(53, 31, 1, 'no_job', 'There are currently no available jobs for', ''),
(54, 31, 1, 'no_job_found', 'No jobs were found.', ''),
(55, 31, 1, 'preposition_at', 'at', ''),
(56, 31, 1, 'location_anywhere', 'Anywhere', ''),
(57, 31, 1, 'recent_jobs', 'Recent jobs at', ''),
(58, 31, 1, 'company_undisclosed', 'Undisclosed', ''),
(59, 31, 1, 'all_jobs', 'View all jobs at', ''),
(60, 0, 1, 'alljobs', '', ''),
(61, 60, 1, 'all_jobs', 'All jobs', ''),
(62, 60, 1, 'no_jobs', 'The are currently no available jobs.', ''),
(63, 0, 1, 'apply', '', ''),
(64, 63, 1, 'apply_message', '&raquo; Apply now', ''),
(65, 63, 1, 'name_error', 'Please enter your name.', ''),
(66, 63, 1, 'email_error', 'Please enter your e-mail.', ''),
(67, 63, 1, 'msg_error', 'Please enter a message.', ''),
(68, 63, 1, 'cv_error', 'Resume/CV size can be maximum 3 MB.', ''),
(69, 63, 1, 'email_invalid', 'The E-mail address is invalid', ''),
(70, 63, 1, 'success', 'Congratulations, your application has been sent! Best of luck to you!', ''),
(71, 63, 1, 'old_ad', 'This job ad has been posted over {0} days ago...', ''),
(72, 63, 1, 'name_label', 'Your name', ''),
(73, 63, 1, 'email_label', 'Your e-mail', ''),
(74, 63, 1, 'message_label', 'Message<br />or letter of intention', ''),
(75, 63, 1, 'cv_label', 'Upload resume/CV', ''),
(76, 63, 1, 'cv_info', 'Max. 3 MB. Recommended formats: PDF, RTF, DOC, ODT. ', ''),
(77, 63, 1, 'cancel', 'cancel', ''),
(78, 63, 1, 'submit', 'Send my application', ''),
(79, 63, 1, 'or', 'or', ''),
(80, 63, 1, 'error_apply_timeout_not_passed', 'Your application was not sent because {0} minutes must pass before you can apply again.', ''),
(81, 63, 1, 'error_sending_mail', 'There was an error sending your application to the employer.', ''),
(82, 63, 1, 'errro_apply_data_invalid', 'Your application form contains errors. Please correct them and try again.', ''),
(83, 0, 1, 'captcha', '', ''),
(84, 83, 1, 'captcha_error', 'Incorrect code.', ''),
(85, 83, 1, 'captcha_title', 'Anti-spam', ''),
(86, 0, 1, 'category', '', ''),
(87, 86, 1, 'title_part1', 'Are you looking for', ''),
(88, 86, 1, 'title_part2', 'jobs?', ''),
(89, 86, 1, 'display_only', 'Only display', ''),
(90, 86, 1, 'jobs_for', 'Jobs for', ''),
(91, 0, 1, 'companies', '', ''),
(92, 91, 1, 'page_title', 'Companies who published here', ''),
(93, 91, 1, 'title', 'Companies that published here', ''),
(94, 91, 1, 'are_you_looking', 'Are you looking for jobs at', ''),
(95, 91, 1, 'meta_part1', 'Job postings by', ''),
(96, 91, 1, 'meta_part2', 'Free jobs ads!', ''),
(97, 91, 1, 'total', 'Total', ''),
(98, 91, 1, 'companies', 'companies', ''),
(99, 91, 1, 'jobs_at', 'Jobs at', ''),
(100, 91, 1, 'jobs_at_undisclosed', 'Jobs at undisclosed companies', ''),
(101, 0, 1, 'contact', '', ''),
(102, 101, 1, 'name_error', 'Please fill in your name', ''),
(103, 101, 1, 'email_error', 'You must fill in your E-mail address', ''),
(104, 101, 1, 'msg_error', 'Please fill in a message', ''),
(105, 101, 1, 'attach_error', 'Attachment size can be 3 MB at maximum', ''),
(106, 101, 1, 'send_error', 'Your message could not be sent. Try again?', ''),
(107, 101, 1, 'name_label', 'Your name', ''),
(108, 101, 1, 'email_label', 'Your e-mail', ''),
(109, 101, 1, 'message_label', 'Message', ''),
(110, 101, 1, 'attachment_label', 'Attachment (optional)', ''),
(111, 101, 1, 'submit', 'Send message', ''),
(112, 0, 1, 'stats', '', ''),
(113, 112, 1, 'last_50_posts', 'Online applications, last 50 displayed', ''),
(114, 112, 1, 'last_50_searches', 'Site searches, last 50 displayed', ''),
(115, 112, 1, 'average', 'avg', ''),
(116, 112, 1, 'maximum', 'max', ''),
(117, 112, 1, 'last_7_days', 'last 7 days', ''),
(118, 112, 1, 'total', 'total', ''),
(119, 0, 1, 'subscriptions', '', ''),
(120, 119, 1, 'all_jobs', 'All jobs', ''),
(121, 119, 1, 'keywords', 'Only notify of job postings containing the following keywords:', ''),
(122, 119, 1, 'manage_title', 'Manage Your Subscriptions', ''),
(123, 119, 1, 'removed_message', 'You have been subsccessfully unsubscribed from all job notifications.', ''),
(124, 119, 1, 'removed_title', 'Done', ''),
(125, 119, 1, 'remove_subscriber', 'Unsubscribe from all', ''),
(126, 119, 1, 'save_settings', 'Confirm & save settings', ''),
(127, 119, 1, 'subscribe_categories_title', 'Subscribe to:', ''),
(128, 119, 1, 'subscribe_email_label', 'Your e-mail', ''),
(129, 119, 1, 'subscribe_message', 'Subscribe to new job announcements', ''),
(130, 119, 1, 'subscribe_title', 'Subscribe to new job announcements', ''),
(131, 119, 1, 'subscribe_submit', 'Subscribe', ''),
(132, 119, 1, 'updated_message', 'Your subscription settings have been updated!', ''),
(133, 0, 1, 'sitemap', '', ''),
(134, 133, 1, 'title', 'Sitemap', ''),
(135, 133, 1, 'jobs', 'Jobs for', ''),
(136, 133, 1, 'use', 'Use it', ''),
(137, 133, 1, 'more', 'Find out more', ''),
(138, 0, 1, 'notfound', '', ''),
(139, 138, 1, 'message', 'We''re sorry, but the page you were looking for could not be found.', ''),
(140, 138, 1, 'back', 'Go back to category', ''),
(141, 0, 1, 'homepage', '', ''),
(142, 141, 1, 'spotlight_jobs', 'Spotlight Jobs', ''),
(143, 141, 1, 'recent_jobs', 'Most recent job offers', ''),
(144, 141, 1, 'popular_jobs', 'Most applied to IT jobs', ''),
(145, 141, 1, 'at', 'at', ''),
(146, 141, 1, 'in', 'in', ''),
(147, 141, 1, 'applicants', 'applicants', ''),
(148, 141, 1, 'applicant', 'applicant', ''),
(149, 141, 1, 'no_jobs', 'No jobs, yet', ''),
(150, 141, 1, 'sidebar_totaljobs', 'total jobs', ''),
(151, 141, 1, 'sidebar_for', 'for', ''),
(152, 141, 1, 'view_all_jobs', 'View all &raquo;', ''),
(153, 0, 1, 'recommend', '', ''),
(154, 153, 1, 'title', 'Recommend to a friend', ''),
(155, 153, 1, 'friend_email_label', 'Friend''s e-mail', ''),
(156, 153, 1, 'your_email_label', 'Your e-mail', ''),
(157, 153, 1, 'submit', 'Send', ''),
(158, 0, 1, 'publish', '', ''),
(159, 158, 1, 'step1', 'Step 1: Write', ''),
(160, 158, 1, 'step2', 'Step 2: Verify', ''),
(161, 158, 1, 'step3', 'Step 3: Confirm', ''),
(162, 158, 1, 'form_error', 'Please revise the form...', ''),
(163, 158, 1, 'job_details', 'Job details', ''),
(164, 158, 1, 'title_label', 'Title', ''),
(165, 158, 1, 'title_info', 'e.g. ''PHP Developer'', ''UI designer''', ''),
(166, 158, 1, 'summary_label', 'Summary', ''),
(167, 158, 1, 'summary_info', 'optional, might be used in lists, search results etc', ''),
(168, 158, 1, 'location_label', 'Location', ''),
(169, 158, 1, 'other', 'other', ''),
(170, 158, 1, 'where', 'where ?', ''),
(171, 158, 1, 'where_info', 'e.g. ''London, UK''', ''),
(172, 158, 1, 'description_label', 'Description', ''),
(173, 158, 1, 'result', 'Final result', ''),
(174, 158, 1, 'company', 'Hiring company or person', ''),
(175, 158, 1, 'name_label', 'Name', ''),
(176, 158, 1, 'website_label', 'Website', ''),
(177, 158, 1, 'websiter_info', 'e.g. ''www.google.com''', ''),
(178, 158, 1, 'email_label', 'E-mail', ''),
(179, 158, 1, 'email_info1', 'not published', ''),
(180, 158, 1, 'email_info2', 'Online applications will be sent to this address.', ''),
(181, 158, 1, 'step1_submit', 'Step 2: Verify ad', ''),
(182, 158, 1, 'step2_info', 'If you changed your mind, you may', ''),
(183, 158, 1, 'step2_cancel', 'cancel posting this ad', ''),
(184, 158, 1, 'save', 'Save changes', ''),
(185, 158, 1, 'publish', 'Publish this ad', ''),
(186, 158, 1, 'edit', 'Edit it', ''),
(187, 158, 1, 'edit_success', 'Your job ad was edited successfully', ''),
(188, 158, 1, 'view', 'View the new job ad', ''),
(189, 158, 1, 'options_title', 'Edit or deactivate your ad', ''),
(190, 158, 1, 'options_info', 'If you need to edit or deactivate this ad, use the following links', ''),
(191, 158, 1, 'deactivate', 'Deactivate ad', ''),
(192, 158, 1, 'success_message', 'Your job was posted, but since this is the first time you post with this e-mail address, we need to manually verify it.<br />Thank you for your patience, as the ad should be published ASAP. We''ll send you an e-mail when that happens. <br /><br />From now on, every ad you post with this e-mail address will instantly be published.<br />', ''),
(193, 158, 1, 'congratulations', 'Congratulations, your job ad was published', ''),
(194, 158, 1, 'location_pick_from_list', 'Pick one from the list', ''),
(195, 158, 1, 'apply_online', '<strong>Allow Online Applications</strong> (If you are unchecking it, then add a description on how to apply online above)', ''),
(196, 0, 1, 'manage', '', ''),
(197, 196, 1, 'html_title', 'Online Job Manager', ''),
(198, 196, 1, 'manage_jobs', 'Online Job Manager', ''),
(199, 196, 1, 'error', 'Error', ''),
(200, 196, 1, 'invalid_auth', 'You don''t have any active jobs. If you think this is wrong, please check the email sent to you when you posted a job.', ''),
(201, 196, 1, 'new_job_title', 'Post a new job', ''),
(202, 196, 1, 'view_applicants', 'View applicants', ''),
(203, 196, 1, 'view_job_applicants', 'View job applicants', ''),
(204, 196, 1, 'edit', 'Edit', ''),
(205, 196, 1, 'edit_job', 'Edit job', ''),
(206, 196, 1, 'deactivate', 'Deactivate', ''),
(207, 196, 1, 'deactivate_job', 'Deactivate job', ''),
(208, 0, 1, 'applications', '', ''),
(209, 208, 1, 'title', 'Job applicants', ''),
(210, 208, 1, 'name', 'Name', ''),
(211, 208, 1, 'email', 'E-mail', ''),
(212, 208, 1, 'date', 'Date', ''),
(213, 208, 1, 'cv', 'Resume', ''),
(214, 208, 1, 'download', 'Download', ''),
(215, 208, 1, 'download_cv', 'Download resume', ''),
(216, 208, 1, 'no_applicants', 'No job applicants yet.', ''),
(217, 0, 1, 'rss', '', ''),
(218, 217, 1, 'title', 'RSS', ''),
(219, 217, 1, 'intro', 'Choose one of the following feeds:', ''),
(220, 217, 1, 'all_categories', 'Feed for all job categories', ''),
(221, 217, 1, 'for', 'Feed for', ''),
(222, 0, 1, 'js', '', ''),
(223, 222, 1, 'location_pick_from_list', 'Pick one from the list', ''),
(224, 222, 1, 'location_other', 'other', ''),
(225, 222, 1, 'send_to_friend_successful', 'Your message was sent. Let''s hope it doesn''t get marked as spam!', ''),
(226, 222, 1, 'send_to_friend_unsuccessful', 'Your message could not be sent. Did you enter both addresses?', ''),
(227, 222, 1, 'report_spam_successful', 'Thank you, your vote was registered and is highly appreciated!', ''),
(228, 222, 1, 'report_spam_unsuccessful', 'Thank you for your intention, but your vote could not be registered.', ''),
(229, 222, 1, 'delete_job_confirmation_question', 'Are you sure you want to delete this post?', ''),
(230, 222, 1, 'subscribe_successful', 'Thank you! You should receive an e-mail shortly. Please follow instructions in that e-mail to confirm your subscription.', ''),
(231, 222, 1, 'subscribe_unsuccessful', 'We are sorry, but something went wrong and your subscription request was not processed.', ''),
(232, 0, 1, 'jobscity', '', ''),
(233, 232, 1, 'page_title', 'Overview of cities', ''),
(234, 232, 1, 'title', 'Cities with jobs available', ''),
(235, 232, 1, 'total', 'Total', ''),
(236, 232, 1, 'cities', 'cities', ''),
(237, 232, 1, 'jobs_at', 'Jobs in', ''),
(238, 232, 1, 'jobs_in', 'Jobs in', ''),
(239, 232, 1, 'no_jobs_in', 'The are currently no jobs in', ''),
(240, 232, 1, 'sidebar_jobs_in', 'in', ''),
(241, 232, 1, 'other_cities', 'Other cities', ''),
(242, 232, 1, 'jobs', 'jobs', ''),
(243, 232, 1, 'jobs_in_other_cities', 'Jobs in other cities', ''),
(244, 232, 1, 'no_jobs_in_other_cities', 'The are currently no available jobs.', ''),
(245, 0, 1, 'email_SendToFriend', '', ''),
(246, 245, 1, 'subject', 'I''m recommending you a job ad', ''),
(247, 245, 1, 'message', '-- \nYou''ve received this e-mail from {YOUR_EMAIL}', 'textarea'),
(248, 0, 1, 'email_ApplyOnline', '', ''),
(249, 248, 1, 'subject', '[ {SITE_NAME} ] I wish to apply for {JOB_TITLE}', ''),
(250, 248, 1, 'message', '-- \nThis e-mail is an application sent from {JOB_URL}', 'textarea'),
(251, 0, 1, 'email_PublishToAdmin_firstPost', '', ''),
(252, 251, 1, 'subject', '[ {SITE_NAME} ] New job: {JOB_TITLE}', ''),
(253, 251, 1, 'message', 'Activate ad {JOB_ACTIVATE_URL}\n\n			\n		\n			\n{JOB_URL}\n\n {JOB_TITLE} at {JOB_COMPANY}\n\n {JOB_DESCRIPTION}\n\n URL: {JOB_URL}\n\n---\n Published by: {JOB_POSTER_EMAIL}\n\n---\n Edit: {JOB_EDIT_URL}\n\n Deactivate: {JOB_DEACTIVATE_URL}\n\n View job applications: {JOB_APPLICANTS_URL}\n\n\n---\n IP: {JOB_POSTER_IP}\n\n Date: {JOB_POST_DATE}', 'textarea'),
(254, 0, 1, 'email_PublishToAdmin', '', ''),
(255, 254, 1, 'subject', '[ {SITE_NAME} ] New job: {JOB_TITLE}', ''),
(256, 254, 1, 'message', '{JOB_URL}\n\n {JOB_TITLE} at {JOB_COMPANY}\n\n {JOB_DESCRIPTION}\n\n URL: {JOB_URL}\n\n---\n Published by: {JOB_POSTER_EMAIL}\n\n---\n Edit: {JOB_EDIT_URL}\n\n Deactivate: {JOB_DEACTIVATE_URL}\n\n View job applications: {JOB_APPLICANTS_URL}\n\n\n---\n IP: {JOB_POSTER_IP}\n\n Date: {JOB_POST_DATE}', 'textarea'),
(257, 0, 1, 'email_PublishPendingToUser', '', ''),
(258, 257, 1, 'subject', 'Your ad on {SITE_NAME}', ''),
(259, 257, 1, 'message', 'Hello! :)\n\n\nWe apologize for the inconvenience, but since this is the first time you post with this e-mail address, we need to manually verify it.\n\nThank you for your patience, as the ad should be published ASAP. We''ll send you an e-mail when that happens!\n\n\nFrom now on, every ad you post with this e-mail address will instantly be published.\n\n\n-- \nThank you for using our service!\n\nThe Team', 'textarea'),
(260, 0, 1, 'email_PublishToUser', '', ''),
(261, 260, 1, 'subject', 'Your ad on {SITE_NAME} was published', ''),
(262, 260, 1, 'message', 'Hello! :)\n\n\nYour ad was published and is available at {JOB_URL}\n\n\n---\nEdit it: {JOB_EDIT_URL}\n\nDeactivate it: {JOB_DEACTIVATE_URL}\n\nManage all jobs: {JOB_MANAGE_URL}\n\nView job applications: {JOB_APPLICANTS_URL}\n\n\n-- \nThank you for using our service!\n\n The {SITE_NAME} Team', 'textarea'),
(263, 0, 1, 'email_ReportSpam', '', ''),
(264, 263, 1, 'subject', '[SPAM on {SITE_NAME}] {JOB_TITLE}', ''),
(265, 263, 1, 'message', 'Following ad was reported as false/spam: \n---\n\n\n{JOB_URL}\n\n\n {JOB_TITLE} at {JOB_COMPANY}\n\n\n {JOB_DESCRIPTION}\n\n\n---\n Published by: {JOB_POSTER_EMAIL}\n\n---\nEdit: {JOB_EDIT_URL}\n\n Deactivate: {JOB_DEACTIVATE_URL}\n\n---\nIP: {JOB_POSTER_IP}\n\n Date: {JOB_POST_DATE}', 'textarea'),
(266, 0, 1, 'email_Contact', '', ''),
(267, 266, 1, 'subject', '[{SITE_NAME}] contact', ''),
(268, 266, 1, 'message', '---\n Sent by: {SENDER_NAME} <{SENDER_EMAIL}>\n\n IP: {SENDER_IP}\n\n Date: {SEND_DATE}', 'textarea'),
(269, 0, 1, 'email_SubscriptionJobPosted', '', ''),
(270, 269, 1, 'subject', '[ {SITE_NAME} ] New job ad has been posted', ''),
(271, 269, 1, 'message', 'Hello!\n\n\nA new job ad has been posted on {SITE_NAME} website:\n\n\n{JOB_TITLE}\n\n{JOB_SUMMARY}\n\n\nTo view the ad or apply for this job, please visit the following page:\n\n{JOB_URL}\n\n\nYou are receiving these notifications because you have subscribed to them. If you want to adjust your subscription preferences, or unsubscribe altogether, you can visit the following page:\n\n\n{MANAGE_URL}\n\n\n-- \n\nThank you for using our service!\n\n The {SITE_NAME} Team', 'textarea'),
(272, 0, 1, 'email_SubscriptionPleaseConfirm', '', ''),
(273, 272, 1, 'subject', '[ {SITE_NAME} ] Please confirm your subscription', ''),
(274, 272, 1, 'message', 'Hello!\n\n\nSomeone tried to subscribe you to new job announcements from the {SITE_NAME} website ({SITE_URL}).\n\n\nTo validate this subscription, or adjust the subscription settings, please visit the following page:\n\n{MANAGE_URL}\n\n\nIf you did not request this, you can either ignore this message, or still visit the page and click the Unsubscribe All button to remove yourself from our database.\n\n\nFor your information, the person who initiated this change used the following IP address: {SENDER_IP}.\n\n\n-- \n\nThank you for using our service!\n\n The {SITE_NAME} Team', 'textarea'),
(275, 0, 1, 'email_SubscriptionRemoved', '', ''),
(276, 275, 1, 'subject', '[ {SITE_NAME} ] You have been unsubscribed', ''),
(277, 275, 1, 'message', 'Hello!\n\n\nYou have been unsubscribed from all job announcements from the {SITE_NAME} website ({SITE_URL}).\n\n\nYou can subscribe again anytime.\n\n\nFor your information, the person who initiated this change used the following IP address: {SENDER_IP}.\n\n\n-- \n\nThank you for using our service!\n\n The {SITE_NAME} Team', 'textarea'),
(278, 0, 1, 'email_SubscriptionUpdated', '', ''),
(279, 278, 1, 'subject', '[ {SITE_NAME} ] Your subscription settings have been updated', ''),
(280, 278, 1, 'message', 'Hello!\n\n\nThe preferences of your subscription to new job announcements from the {SITE_NAME} website ({SITE_URL}) have been updated.\n\n\nIf you would ever want to adjust your subscription preferences again, or unsubscribe from all announcements altogether, you can visit the following page:\n{MANAGE_URL}\n\n\nFor your information, the person who initiated this change uses the following IP address: {SENDER_IP}.\n\n\n-- \n\nThank you for using our service!\n\n The {SITE_NAME} Team', 'textarea');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT '',
  `summary` varchar(255) DEFAULT NULL,
  `description` text,
  `company` varchar(150) DEFAULT '',
  `city_id` int(11) DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL,
  `apply` varchar(200) DEFAULT '',
  `created_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_temp` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `views_count` int(11) NOT NULL,
  `auth` varchar(32) NOT NULL,
  `outside_location` varchar(150) NOT NULL,
  `poster_email` varchar(100) NOT NULL,
  `apply_online` tinyint(4) NOT NULL,
  `spotlight` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type_id` (`type_id`),
  KEY `category_id` (`category_id`),
  KEY `city_id` (`city_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `type_id`, `category_id`, `title`, `summary`, `description`, `company`, `city_id`, `url`, `apply`, `created_on`, `is_temp`, `is_active`, `views_count`, `auth`, `outside_location`, `poster_email`, `apply_online`, `spotlight`) VALUES
(1, 1, 1, 'web developer', NULL, 'We\\''re a startup searching for a cool web developer that masters following technologies:\r\n* php, mysql\r\n* javascript, dom, ajax\r\n* html, css\r\n\r\nPerson should also have a good sense of user behavior.\r\n\r\nExcellent payment! ;)', 'Foo Inc.', NULL, 'http://www.fooinc.com', '', '2014-04-14 07:48:26', 0, 1, 11, 'f1acd80152446f4cf8a0bb8242398be7', 'sss', 'jobs@fooinc.com', 1, 1),
(2, 3, 2, 'Illustrator/Photoshop expert', NULL, 'Could you redraw in Illustrator da Vinci\\''s Gioconda, blindfolded?\r\nLet us know! :)', 'UnrealExpectations', NULL, 'http://unrealexpectations.com', '', '2014-04-14 07:48:26', 0, 1, 6, '6ebcfde637d98a9738c024c6074e945d', '', 'jobs@unrealexpectations.com', 1, 0),
(4, 1, 1, 'web developer 3', NULL, 'We\\''re a startup searching for a cool web developer that masters following technologies:\r\n* php, mysql\r\n* javascript, dom, ajax\r\n* html, css\r\n\r\nPerson should also have a good sense of user behavior.\r\n\r\nExcellent payment! ;)', 'Foo Inc.', NULL, 'http://www.fooinc.com', '', '2014-04-14 07:48:26', 0, 1, 8, 'f1acd80152446f4cf8a0bb8242398be7', 'London, UK', 'jobs@fooinc.com', 1, 1),
(5, 1, 1, 'web developer 2', NULL, 'We\\''re a startup searching for a cool web developer that masters following technologies:\r\n* php, mysql\r\n* javascript, dom, ajax\r\n* html, css\r\n\r\nPerson should also have a good sense of user behavior.\r\n\r\nExcellent payment! ;)', 'Foo Inc.', NULL, 'http://www.fooinc.com', '', '2014-04-14 07:48:26', 0, 1, 6, 'f1acd80152446f4cf8a0bb8242398be7', 'London, UK', 'jobs@fooinc.com', 1, 0),
(11, 1, 3, 'nice developer needed', NULL, 'asdfsd', 'temp name', 1, 'http://google.com', '', '2014-04-14 07:48:26', 0, 1, 2, '2e3f1e857af3a4e191f453d747fbf212', '', 'jobs@fooinc.com', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `job_id` int(10) unsigned NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `cv_path` varchar(255) DEFAULT NULL,
  `message` text,
  `created_on` datetime NOT NULL,
  `ip` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `job_id` (`job_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL,
  `link_order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `url`, `name`, `title`, `parent`, `link_order`) VALUES
(1, 'widgets', 'Site widget', 'Would you like to display our latest jobs on your site?', 14, 1),
(2, 'about', 'About Us', 'More information about us.', 14, 2),
(3, 'contact', 'Contact', 'Don''t hesitate to contact us!', 14, 3),
(4, 'post', 'Post a new job', 'Post a new job for free!', 17, 4),
(5, 'widgets', 'Site widget', 'Would you like to display our latest jobs on your site?', 17, 5),
(6, 'rss', 'RSS Feeds', 'An overview of all our available RSS Feeds.', 17, 6),
(7, 'about', 'About Us', 'More information about us.', 18, 7),
(8, 'contact', 'Contact', 'Don''t hesitate to contact us!', 18, 8),
(9, 'companies', 'Companies', 'An overview of all available companies.', 19, 9),
(10, 'cities', 'Cities', 'An overview of all available cities.', 19, 10),
(11, 'sitemap', 'Sitemap', 'Sitemap.', 19, 11),
(14, 'primary', 'Primary Menu', 'The primary menu for your Jobberbase theme. By default this menu is located at the top', 0, 0),
(15, 'secondary', 'Secondary Menu', 'The secondary menu for your Jobberbase theme. By default this menu is located in the sidebar', 0, 1),
(16, 'footer', 'Footer Menu', 'The footer menu for your Jobberbase theme', 0, 2),
(17, '', 'Use:', '', 16, 0),
(18, '', 'Find out more:', '', 16, 1),
(19, '', 'Misc:', '', 16, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `has_form` enum('0','1') NOT NULL,
  `accepts_files` enum('0','1') NOT NULL,
  `form_message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `url`, `page_title`, `keywords`, `description`, `title`, `content`, `has_form`, `accepts_files`, `form_message`) VALUES
(1, 'about', 'About Us', '', '', 'About Us', '<h4>Hello!</h4>\r\n<p>This job board is an open source implementation of <a href="http://www.jobber.ro/">www.jobber.ro</a>.</p>\r\n<p>Don''t hesitate to&nbsp;contact us!</p>', '0', '0', ''),
(2, 'contact', 'Contact Us', '', '', 'We really appreciate feedback!', '<p>E-mail us at <strong>hello [at] domain [dot] com</strong> or use the form below:</p>', '1', '0', '<p>Thank you for your message! :)</p>');

-- --------------------------------------------------------

--
-- Table structure for table `searches`
--

CREATE TABLE `searches` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `keywords` varchar(100) NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
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
  `extradata` blob,
  `ordering` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `category_id`, `name`, `title`, `description`, `data_type`, `input_type`, `input_options`, `validation`, `value`, `extradata`, `ordering`) VALUES
(1, 1, 'site_name', 'Site name', 'The name of your JobBoard, used in various templates.', NULL, NULL, NULL, 'not_empty', 'Jobberbase', NULL, 1),
(2, 5, 'admin_email', 'Admin Email', 'The email companies will receive mail from.', NULL, NULL, NULL, 'not_empty|is_email', 'admin@localhost.cc', NULL, 1),
(3, 5, 'notify_email', 'Notify Email', 'The email for receiving new job postings.', NULL, NULL, NULL, 'not_empty|is_email', 'admin@localhost.cc', NULL, 2),
(4, 6, 'theme', 'Theme', 'Pick the theme to use for the frontend.', NULL, 'available_themes', NULL, 'not_empty', 'default', NULL, 4),
(5, 7, 'html_title', 'HTML Title', 'The HTML title for the homepage.', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(6, 7, 'meta_keywords', 'Site keywords', 'Meta Keywords. Useful for Search Engine Optimization (separate by comma).', NULL, NULL, NULL, NULL, NULL, NULL, 2),
(7, 7, 'meta_description', 'Site description', 'Meta Description Tag. Useful for Search Engine Optimization.', NULL, 'text_area', NULL, NULL, NULL, NULL, 3),
(8, 1, 'max_cv_size', 'Max CV filesize', 'The maximum filesize for uploaded CV''s in bytes (Update accordingly in translations.ini)', NULL, NULL, NULL, 'not_empty|is_number', '3145728', NULL, 8),
(9, 1, 'file_upload_dir', 'Upload Directory', 'Upload directory to temporarily save CV''s. Must be writable.', NULL, NULL, NULL, 'not_empty', 'uploads/', NULL, 9),
(10, 4, 'apply_delay', 'Apply delay', 'The number of minutes that must pass between applications from the same IP address', NULL, NULL, NULL, 'not_empty|is_number', '0', NULL, 10),
(11, 1, 'old_job_notify', 'Old Job Notify', 'No. of days after which a job should be reported as old. Use 0 to disable this functionality.', 'integer', NULL, NULL, 'not_empty', '40', NULL, 11),
(12, 6, 'date_format', 'Date format', 'The format in which dates are displayed. %d = day, %m = month, %Y = 4 digit year. Follow <a href="http://dev.mysql.com/doc/refman/5.0/en/date-and-time-functions.html#function_date-format" target="_blank">this link</a> for more formatting options.', NULL, NULL, NULL, 'not_empty', '%d-%m-%Y', NULL, 12),
(13, 6, 'date_time_format', 'Date / Time format', 'The format in which times are displayed. %d = day, %m = month, %Y = 4 digit year, %H = 24-hour and %i = minute. Follow <a href="http://dev.mysql.com/doc/refman/5.0/en/date-and-time-functions.html#function_date-format" target="_blank">this link</a> for more formatting options.', NULL, NULL, NULL, 'not_empty', '%d-%m-%Y %H:%i', NULL, 13),
(14, 6, 'sidebar_show_what', 'Sidebar - show', 'Either cities or categories can be shown in the sidebar', NULL, 'select', 'categories|cities', 'not_empty|is_alpha', 'categories', NULL, 14),
(15, 6, 'sidebar_only_cities_with_at_least_number_of_jobs', 'Sidebar - only cities with at least X jobs', 'If the sidebar is configured to show cities, then only show cities that have at least the specified number of jobs available.', 'integer', NULL, NULL, 'non_empty', '1', NULL, 15),
(16, 1, 'enable_new_jobs', 'Enable Job Posting', 'By turning this off, the only way to add jobs is through the admin-panel.', 'boolean', 'radiobutton', 'no|yes', NULL, '1', NULL, 16),
(17, 2, 'jobs_per_page', 'Jobs per page', 'The amount of jobs per page, before pagination is called.', 'integer', NULL, NULL, 'not_empty', '50', NULL, 1),
(18, 2, 'jobs_per_search', 'Jobs per search', 'The amount of jobs per page when searching.', 'integer', NULL, NULL, 'not_empty', '25', NULL, 2),
(19, 2, 'spotlight_jobs', 'Spotlight Jobs #', 'Amount of Spotlight Jobs to display on the front page.', 'integer', NULL, NULL, 'not_empty', '3', NULL, 3),
(20, 2, 'latest_jobs', 'Latest Jobs #', 'Amount of latest jobs to show on the front page.', 'integer', NULL, NULL, 'not_empty', '7', NULL, 4),
(21, 2, 'most_applied_jobs', 'Most Applied to #', 'Amount of most-applied-to jobs to show on the front page.', 'integer', NULL, NULL, 'not_empty', '7', NULL, 5),
(22, 2, 'search_method', 'Search Method', 'Choose which search method to use. ''Alternate'' checks every keyword to appear in either the title, description or cityname.', NULL, 'radiobutton', 'classic|alternate', NULL, 'classic', NULL, 6),
(23, 3, 'url_cities', 'Cities Cloud', 'The URL for the City Cloud page.', NULL, NULL, NULL, 'not_empty|is_url_string', 'cities', NULL, 1),
(24, 3, 'url_companies', 'Companies Cloud', 'The URL for the Company Cloud page.', NULL, NULL, NULL, 'not_empty|is_url_string', 'companies', NULL, 2),
(25, 3, 'url_job', 'Job Details', 'The URL for the Job Details page.', NULL, NULL, NULL, 'not_empty|is_url_string', 'job', NULL, 3),
(26, 3, 'url_jobs', 'Jobs per Category', 'The URL for the Jobs per Category pages.', NULL, NULL, NULL, 'not_empty|is_url_string', 'jobs', NULL, 4),
(27, 3, 'url_jobs_at_company', 'Jobs per Company', 'The URL for the Jobs per Company pages.', NULL, NULL, NULL, 'not_empty|is_url_string', 'jobs-at', NULL, 5),
(28, 3, 'url_jobs_in_city', 'Jobs per City', 'The URL for the Jobs per City pages.', NULL, NULL, NULL, 'not_empty|is_url_string', 'jobs-in', NULL, 6),
(29, 4, 'enable_recaptcha', 'Enable ReCaptcha', 'Before enabling ReCaptcha, make sure to add your private and public key.', 'boolean', 'radiobutton', 'no|yes', NULL, '0', NULL, 1),
(30, 4, 'captcha_public_key', 'Captcha Public Key', 'You can register these keys for free at recaptcha.net.', NULL, NULL, NULL, NULL, 'PUBLIC_KEY', NULL, 2),
(31, 4, 'captcha_private_key', 'Captcha Private Key', 'You can register these keys for free at recaptcha.net.', NULL, NULL, NULL, NULL, 'PRIVATE_KEY', NULL, 3),
(32, 5, 'mailer_mailer', 'Mailer', 'Send mails with PHP''s mail() function or through SMTP', NULL, 'select', 'mail|smtp', 'not_empty', 'mail', NULL, 1),
(33, 5, 'mailer_encoding', 'Mail encoding', 'The mail''s encoding (default is utf-8, change only if it is not working correctly)', NULL, NULL, NULL, 'not_empty', 'utf-8', NULL, 2),
(34, 5, 'mailer_smtp_host', 'SMTP host name', 'Host name (for example, smtp.example.com)', NULL, NULL, NULL, NULL, NULL, NULL, 3),
(35, 5, 'mailer_smtp_port', 'SMTP port', 'Port (default is 25, change only if you know what you are doing)', 'integer', NULL, NULL, 'not_empty', '25', NULL, 4),
(36, 5, 'mailer_smtp_requires_authentication', 'SMTP authentication', 'Is authentication required for SMTP?', 'boolean', 'radiobutton', 'no|yes', NULL, '0', NULL, 5),
(37, 5, 'mailer_smtp_secure_connection_prefix', 'SMTP secure connection prefix', 'SMTP secure connection prefix. Leave empty if not specified for your host.', NULL, 'select', '|ssl|tls', NULL, '', NULL, 6),
(38, 5, 'mailer_smtp_username', 'SMTP user name', 'User name (for example, user@example.com)', NULL, NULL, NULL, NULL, NULL, NULL, 7),
(39, 5, 'mailer_smtp_password', 'SMTP password', 'Password', NULL, NULL, NULL, NULL, NULL, NULL, 8),
(40, 4, 'report_post_after', 'Report Post Delay', 'No of Minutes after which a user is allowed to report same post after the previous report.', NULL, NULL, NULL, 'not_empty|is_number', '10', NULL, 8),
(41, 4, 'post_notify_on', 'When to send Mail?', 'Send mail only after this number of reports on a post.', 'integer', NULL, NULL, 'not_empty', '2', NULL, 9),
(42, 4, 'enable_captcha_on_post_page', 'Enable ReCaptcha on post page', 'Enable spam protection on the post a job page.', 'boolean', 'radiobutton', 'no|yes', NULL, '0', NULL, 4),
(43, 4, 'enable_captcha_on_apply_page', 'Enable ReCaptcha on apply page', 'Enable spam protection on the apply to a job page.', 'boolean', 'radiobutton', 'no|yes', NULL, '1', NULL, 5),
(44, 4, 'enable_captcha_on_contact_page', 'Enable ReCaptcha on contact page', 'Enable spam protection on the contact page.', 'boolean', 'radiobutton', 'no|yes', NULL, '0', NULL, 6),
(45, 1, 'enable_new_post_moderation', 'Enable Job Moderation', 'If enabled, the administrator must always activate the very first job posted by a hiring person/company. From there on, every job posted with the same email address will be automatically activated.', 'boolean', 'radiobutton', 'no|yes', NULL, '1', NULL, 17),
(46, 1, 'timezone', 'Timezone', 'Please select your timezone', NULL, 'timezones', NULL, 'not_empty', 'Europe/London', '', 5),
(47, 6, 'site_logo', 'Site logo', 'Upload your logo', NULL, 'file', NULL, NULL, '', 0x89504e470d0a1a0a0000000d4948445200000177000000520803000000980864fd00000294504c5445000000a18b850897c66c6c6cd0ebf444aed1795954d6d4cf4b474474c4dfb6b5b5272724fef1e6b2deed1699c6dfdbd68c8a87a2d6e8b0aeab54b4d51a1111f2ece726a4cd5452517d7976fffdf2c6c2bc93d1e63a3735a7a39e7354506a4a44876d6997938f937a7563bbd983c9e00c0c0be0f1f77d6460fff8f536aad1c3b5b3d5c7c165625d211f1da39c96e9e5ddc1e5f145b1d4cdbdb8ffffff3f3d3e060504302d2cfff2edf7f3eab6a39d89726c807b76bdadab9c8a86e3ded6d7cecd82656273706d97827e83cbe25b5754cdc6c07c625cdfd5d0161415d2c0ba735a54a79692f5f0e886817de5dfdedbc9c125a0c99b9a95fff8ef49444264bedbac99936d514bb4ada8eee6ddbcb4af423a37504745d0cbc56b6462aea8a4c6bdbb9a837e302b2bbdbbb867454135a7cddfd8d67c736f3c32305754528c8b8ac6b4adaf9d9bf9f6f7f0dad1625c5a9b96962823228d7974ede5e4f7f1ecfff4eaa5938f856a65c4bcb7b7a7a5858484755a57080000eccfc8e4b8b50e0a08b4afacefeeedab9793d4ccc74b4a49292827746c6aaeaba87b5c58beb7b5937c799f8d896b4b49433f3d211a1b0c0e0e71524d8c7571cdc4c37d7c7c1816146c6865dfdedd6b5252c5c4c5d7d6d63938399c9a99fffff7727171e6d8d3504c4ae7e5e4b6b2ae646363f3ded8a58f8b949292cccccc918e8c9489848a8584e5bab6decec580625e8c6b6befdede52524a333333bba9a3ccbdbbbfbebe837c7b685754d5c8c7f4eae19c8582e5d5cea8a7a65a5a5b8f7b78b59c947b6b63191818948484b3a09e080808947373101010212021f7f5ef211010a59f9c7a7473f7eff75b4a47734a4a4343424a3a3ac2afa9f4eae5372726bba49f423331ad8c8cf2e0d79b7f7b89847fcbb4ad0d0302101008e7c6bfe5bdbac337b1170000003474524e53ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff004b572265000015344944415478daed9d8b7313479ac0478a04168e86284a848d8c226359d8e1354a63930d041b2b315a035ec72876c4066b49ac3d1275785ac671ed1125100484603b3805410962970dd93ad7952fe1089be44a159771d975954a6eafb2b9abbb7fe6ba7b7a46ddf3f003cb5750a52eca1a4d3fa6fbd7dd5f7ffd7d3d420085904880fb0870c0926a9a3d49dc628983526083a05e8df8c7c6869b168ebd650c8591d99224718ae4d2d4dfe616ad9ad061af71c187867b628c84f4420b88936cfe5952e4e492734b825d479d861af890704fc974162c0f68bec45c3d33165b8aead758cd82687b38b85bee938e654eeeb125e42e5acd83eda1e03e20d33110f077b67fbf7bf7ee81934d0f20f759b05b45f8307087c3184e4a13ddbebd655da6cd4742a6b9e5fba68788bbb5e6a1d06760cc62d1a8252bdf5d37343438d8ba8e844c06b11f1e687f00b9dbd51b92d3d1a182870f03777dd8beced7d68ac2ba42c8b4b535271f64ee387815eeae8792fbdda18c827b8c09195f7fecc1e6ae6a39818791fbb1a13193d0d675f7c1e62e19df7e30b9e790269e2c48c4e1ae31f3f0d47386dcd32303168b2519cf9972874d6815b1a462c6dd941e4992e25a5271edfe6dc03fd6d2445621b43f1e4e8dccca5db9edd66cb2026e3bddd13a0c76b441afbb17c7f6da039261f5a4801daf1da2dde12ca23ee3c72db6285f9f7f0a4bf656ca99b9a4e0cfebb9c3a41acdd91b18ee31bf92c2af1ffeb914fb84645ad777fe34b54ae0272466e11e34903330d0a1d176823c543ba7830674fdc2e5ef70158b7b8cdbcdf77ca0aca619b494fa7c8383835895441fad72188a69b937f9596c29a8e79e6b6153b4680c0703da49c5f68c5c761c322524ccb9bbe86d66584a1d7afd9e1db5815963d15cd1e6efb515873bb75f6d1a1ca4c833cdc72c2fffeac737dffc712099b2aced6f6d5db66c19e23e38ace11ed7506b815aee093f9fc29fd399d7f890d49a78526cdfa4ccb95346a2be27cc76b446f606179835ffe20c11c6dc2f7435af43437bedcd7ff9cdcf3f6dcdd25037f5e42b9ffdfa6f96e706079b5bdbe25c3e3db6160d777d0a7f7a56ec0c786ab4e33ace62c61d2a10bd05c1636c4f50b3390bb64cbb3ab0c5e0ecddb628f086dc37afcbac6bebffbee92782bbb3732b099d38e01b3f9d6c6d1bf3dde5f251a96bb1e8e5448c636db1f879749c9019c60b6a4e5d06e23c772ec40db90725550e33abaa5b49e7c22c6d2e5133e0691637211db46bf7bb6ab7d520e1039d4a7c072c32f7a77dcd6dc33b00a893816fed5303f99a05cf746532998496bbbc148e28d0fc50c7dd42f2245a3819cd70558453ba852fa2c0dd3f90488c24fdca5c98c54ae0863afdc6a505e9a0c25bd351359adeb46bf27b17bf3f30e4de824c027740a74c7cab3ed401cb50abaf5bc37d442b33625aee49ce13c20c785ac830e4b52bb58884764dc8a5e7b0cf885ebd3ecfdc72706429474923eeed9aed8057bb0a2fc2f266c4bdbd39e35b3b5557570740164761d902e835feecec046ffa5adbbee3b9c7b5abe0d8b0867bc1e8261be154374b7a4c670c8d7145248c749cd9b88b5ea8d32bedfa9e10398c858514f6b2ea101dfebdcc12222ed61061c4fd645b6bd7af10ea9fe2dd3d3dddb193b11e12ba4f9e8c757777c776a16ef827ac4b2658eec3062a619ae7ce68e44ddc1c89eb8b8063ac5eab7287f3b647721ab8433b38214dc58d7791d92eb96a0a9b2703c80ec38dd922b9a7909ebe1e6437355ede72f8854641287bac626666e6a38ff2825075a8ecdee5179ac071ff60ab6f3bcb9d3565a6b97b319d5a88b7c3ec3d5ac6009ba0852d22a15b88e76107eeb0b15bcd00bb4d822e8ebb4d55708c1cb3928175932a401d45e53e8c8c8e4fd61d6e18fd1c3d2afdd5f53337488a47223b3f4f83ecc7d736466e800bbe315f8ae50e0da8c638ee9ced3ec98234e83a25418ce31e33e12edad5d03197a207a540af9a44b37062f43a2341c0807190cf5f14ee897519dfdfc1e1fc157417cb78f858c3265037b52f728e8afaf401e1abcf90803fc6eaef5ca92956a0c78c7a868a163f3b3d923126588cb837cdc72ee6ac31f538d95c8e5e6e4e28f779fddeee0deaad9b1d01362c01f7b8af39f35fd3b5ab11743980bdb54d60a6e155504754f84e000e7df8cadfc6963533f92c46a6300bc79d4b91606e2666b1c0f1dc13f3b347aa1803bc554b2f8b803178546261d4db679165c5e43ee0dbffdb67ceec54b1a370707473646fe106c85ddafbd77f6f1bdb65229b0db9b7dc17777e5dcdcd8fbb2ab00b960257c7ecdc823abaf6e0dcdc8bbaaebedb5675a9f14c3bc31daca97affcc71f646c5bdaaf2c1d63bc0e41c821177cbfd708fe953cf873b50a4091db5d0ae912336fd78956a4cec00e6dc3b82c5e47ea16dec5f27cb008b79f396fc0676fc83af26f2df0d0e8e1457ceb458f89054adf00be61ee0b73a05741d6eafc464e4575c177ff88c1a68ecbab55b0e81c558e10db83fbfacf5cdb26f4156618cff5c17fe82d758f5dec71ba7ff6d2863ca9d133e86dc59e103c7e6f259dd37f700f7adc315d464d41568f3dab507121c4be1bc321aefbed6bf1e3aa4327e52e6fe0be27ee284cabdfcbd9b1f74bdc7e8915ca97e760b1b33c2ca693cfeb9ceaa2d983bef61a5a3b817ce4b0f8485b580db552d35f7777dadfffce938a472e5e4da1feb40fb271b0f03b0ebeecb7be4bb604564fdf35d49567f6f32c094e0b8b34b2f6f7f49196cacb07e99c8dd2ff70ed69265b0f19178ee01d16a8706dd26b18bb456984b5271ed91dbbb32af3c7e6a39e59eccdc84e0c827b7efed005f361fdb0c644d72f4e09e0db739fb8c452f66fcbc7dc60f7562862a28717d026cd82cf4d542b97b39cf46409fc8c1710fe8ca10d9655934b23e62138e58d475f54e5bdbaea9a30728f71d6f7e06d2672ad2f99de0c433eb3be5e17e75e20b58b5c6cc2e36c21b060cec62393f6791491b6d47e30ce9057257b1770063ee9037c0dbb5e64a652db5b1a39fdb85057b17670836b213b4b6dd013db5dd54c2a31ba3f91de0312106a88e03a62e1e9ddad5f8b9c60e1cd76057043a6307863c76157452b704284ef205730f4acc81317e59857ab79e93a1cc9a153ad8e910d43f4512adc5e79ebcd804b23b2f4d2b627674b21b01df30f112adf8d57d911150bd45e76fb28c20bdaf29a5f526317e8f617cc423a77a4955c192d6399886b932e6e23efbc95449b3cb09bad5140e56ea14c0d7f01914a9d44be50a7458b516fba2f83dc6df007d95b7274edfc8c1f4d5ea8d1b5700ece09b117ee8699f4aafaf982c470ae4c58f0cfc7c065b4d8d9f4fefaae3e7c8702c9148c4b40ea9fbe4eed4acb276eca6936a1825bd831bd0c88f17641d7912678e27095c92e4520bb083e272ff7323f27a80d517850f1b1b6b1bdecf11d7531d38b75fc837960bb515e96c7675fe2a972fee373d8641b90fe85cd716bdf9d1a40c53eeb39d7f2f18cc8d4e03704a4a600e2b80f16b2562b1fdabe0c33f83be3e50f7ceedd1471e7b1100d9c1da09a6bab71dd8796b39c86e056587f87cb99cdfec1006e51ed79e196881061b29e3aecb8d99bccd53338b9071eafdda6a9c0b721a8b61398cba0f6cbd06f1453f4f00deb89c03d87f4ddd7a34f455d21b5bc1d9dae59cdae167164bad6aa2bedfc4834f69468b22d20b8b41426bd0d7bf9b66fa7e137fe00bf2e0f1b901277fa2c0a92bc8c1d54f15e926f1c5e10e1aafab8709b6fefcd61e4c7dcf5b3f2b4e6e703c5fc1bb4ab1c500164e15a572babd29615690462d066f8f8cb0fdd2c279419a34e76d0ae0f5eff3f5da6b02baa1c8d8236ba482f0a93139c727d6e854f320bb2e18c41785fbd5c85f40a702feadfffd4714fee74fca7700f76f6146027a7f958e4c48cea50e8c68f9c40b6f349073a9da93ab851dea482c852d62315d1189946520bda8963a03b2314b1da692dbeed2784502b2c1cb6ba2a74801078eaf094860b1c1ecbdb2776a8f90118f057bdd9eb7fef0873f9d50fa219b7de128288522711fd6c8e535a7aa41961e559277aeea685f75ef6a095c91b843dd7a78b6612728c81a358095fbcb13256ec5e26e60acbdb271fc1c391ea9046c22c8deca9f2e512b06f791e1318b457762918447ee6db8b6790a871372487fb3e5e8b512b46270e79d9b9a9dc90d21727de6916d7b2b2a2a666edf1e3d5d2e8c969015877bccf41d0b2469c6cfbc5436bea17c723212c94f6efc7667f578f99512b3e273e73d0f5726cadbc174d5d4a7b5e5c2e5cf7f1847faf3f1f27c895951b8a7fd266fbe007030df0e3ae38d67cfdc3a27082fadba88f44a9088cc94a015655dcd59b46e096555bd74153c5ab95eb8347e62fa875141781f5983fb40b5f095e98ed06bfa18e80a8717f2633c416f38bcc8dfd370f19b51ef624e5d302d731a3404b5ce0b17ca1dfb8ff181c48426e715a11a3b53bfae12a6c12f1bfaee09af221b655f656555159bcacd18bb45d39f1e7170af57cc1de4f4a1c5589e6cfc0fa1d8f8f300d0432d64f3eb5c51b15bda3cb239938fae47f7a261515a2077e330be2f3bf5756767e5ae4d53e0a58bcfaeee41a31d05f09af00e932ac47037f5bf44ad564f388caa1c9de750b58a6109bd84e45e047789af8dc49fd9405feb43a1faf9dad0d5b23cd69053726b7edb0675b1570a86ace16270ffe6d439b0f77a65651f7e996c7a7c33a844d8b3e77ee904abeee96a15e66ba74710a5f8e73724426466781771ec731edc2599986b21dc25e2a44593250c74651789fbbe2af0ecf8f81e62a2c9f61cdc412ec0a6c917c1d391b366dc9d086d148f203c26ea9daa2c924715c42338288690355c24a98251114d042c34ad4e67bd7c2973afc7d151cc04a23424b5449e42fe864434dfa34c1c806836c9571ab27896616182be62b7aa3bc8c542993b7a36ad6d184f01f9695e87d5239147846c0c7717691d647239d067c88b9b120a3af0d10e49c413155fc2a8c72a374ba9b2d26433eeafd5c6c0cada7dcf5612eedd0af7e591234802fd60c65df484c8d8464e85fa7af56484a8c897a8d54366b88852d593b7ea707a54c9b0b5de5aef51071f328d8b6ef90c3aea2b3124e27e085b43180cfe4b5d1668dcd1382461f195076ab9a3e2431eecb0465f45fc588feaeaf64a92d34d3287e5dabac8ba12925b10a69e3e5c538fc8c8196b3dfd750235573d49e9218ef1286eb32c8744e443c4d5924ba655569b6cc67de6de2b2031a9708f6d5c2e734fe4ab41654fed1513ee215c1d1157cf81e504159e4a3cae2ae10ee5091ec52b27194b6152b77a55a0cbad0e054957413cb1a33cf77a18b4214a38ae1e35d5858f10f1d39f707711026edadd10bba7bc4aac7a842048068817fb5a43f8bb0bb780d44882a49e30a472b7d52b2f0b32b91839e3c4d5137194844716e9d6286e16adb2da6433eef9db68cc3750ee2096a7dc57e63f02959b2fbf6d266764611794cfaa28b5d57297805c190f71f8e3fa8671252959aa47623f12ea370f99032e448ee3ee95071f8eb385212acdc1e7a7dca364a6a1ea0425f9744194762d5e72c2612c559ca4705a1a2213748530c6b0acff78499c93592b9c58aca02a33b958f92e5aa1640da18a38701d6d4174d0d5c3559936d984fbcac94d203b2a5ca7e3fd5ce43dca3d72f0eb6cb6a2dc7c5d9564b6acf7521dc774e041cac8aa1e966698122a4e22d8718cdc625c28c75de2d7f1107702c0e586943b5debd025f35876d50da91d4ad206893c96b987809a5e5da32151d3d1a12591cdc5728f5a9d0e2b92fc681a62498f478f87ab326db209f723477780ec3ea16a0f390f09569f42ca3bbec85d6e4016cb351357e7e22ee11054b571f905742c39691b1c881191b19264035aee742380cb15c90071aa0de5b993fe411bac90354a1ea8f48297b272937980564f1bf358963b9e815e32d90096571eabdb092586bb1ca772f7cad935b958ee4e6b144147839d2c6068cb2269aa4c9b6cc2fddbfd75d96c99904fc86f92ad10aec8ef9435451a5ecc66371f7c7b56ee94968b6e7cd0e3eb11f8603d15866eb25c7a29155b48d272972708511edce45e08dd20331fb283478e73a3a7cb10a0db0bd4fb513cc0e52506e794c8ae0d65f772fa8c078d779b526f9b0c30cc7097775f6185bb539ec2212e17af478ab88692953c284c2bcf569936d984fb69ecdcf8ad70f9850d07f656aff9fd271f5edcb6e99799c307ca6a85dfa30e282b9b9d3b6aa94b8aaa9b12ecbac77a0296c758b10861ad0fe2cbb01416ad3aeea879a17094e83c68250c854378fd2337916a516884642571a8e55843955ccaba8aee7bea895602b1721ab5ca32d84a1f5bd83785e43365a8a20e0756bac8f80c5bad6a8d3034d1112de83348417160d594cd45b923dd28ec20fded254b6b90b4db85356a2b5b65b9c926dcaf575d3977f6a070e0ab1b8f6faa3e23dcf8f88fc2e8b56f56aca89e141a9f44d19c26e9a1fa9f073f2b48d69b303ef310527775125103888a8c17382cf4709c132b5f1e27ae6014287f811221ef04c8ce9ca4c6c6839084a782871ef392f3930d1046282aea0cf9bd0d59af0fd16dbd0d3d47792c6327083955b384830e108f1442ed51ea02b1422f290f248b8e5c65265750597cf1a7444e673be46e8b120a58a3e4abec349333b71a262ed70a42e34ee4f1a8683c353a5335f1edb66ddb3e5d756f4238f8ed81c93f72c60eda9820f9b4c90f50a53b8d53be93c121293d62a357f2117ee6207fb070aa5f4983eea1226c507910178733b0bb2635b7721f574b32db2e43253d24e5d9d8bad824f681b8109b3697dc6428172f7fa131a4ca30a8afb209f7e593875f7dedba70ead68a356ba61f3f57fdc591153dd3d33d3daf8e0a47670e4fe4972f66ff5eb2029b72ffe8e87174d87d2622bb5bb3f41739d091aec82174ebb1fcc78be02e96a89b721f1dcf661f059b8f3e0efa98d0094e8f03d0075ecc2fc2dbe77596a89b721f99c0bfea7324728572afac94b9971dc4237fbab674706969b8835591eacfdf17225729f72773e403acbef4427b7af9d1d2119aa5e20e36e4cf8c97e557cbdcc11767d2b2d7e396902f3f35bebc046ea9b80380de1b6beca6dc770a94fbd94b9fbe7dab846d29b9a3b0ff0b20e3ae983c215f5c2b9de3f87fe08eec0132ee6d0d9b658bf0f42254c852982ff74355f2596cf00b3a5cf028be78636389d99273bf737d620dd92fa52f0a3f40b47d024df7269e5b5fa2b6b4dc77777df01f93fb1eb9766de796dabc70fa4afbc7d39186fffcc0b7bb846d29b90f77f96efefdf955fffd61fe8927deb87af089a3fbffe189b2e75fdedef5d477256e4bc7ddf29465fb8be95fd77def6bed5ff625686e5ed6d5d5b5eb787b3cd9fffadd12b825e3eef70da757b64f6d87df2f6bf63d8d7ee3b1bf3f330047567e99e8f7b596c02d15f71dfd63cb7e3772fed5f3777767d611eee8bfb2d9fdf49d9b4d49f45bd825704b36de8f75f93e5836349441ff32af6f074343e8ff39f075657ce87fcf7abdbf046ec9b8276edebc79f7c2efd6aeedf7af5d7b07a4eeaef5fb8f9d3f6fb97be1c285a612b84586ff03223a040872ca92e00000000049454e44ae426082, 1),
(50, 7, 'google_analytics_code', 'Google Analytics Code', 'Enter you Google Analytics code here', NULL, NULL, NULL, NULL, '', NULL, 5),
(51, 1, 'keep_uploaded_cvs', 'Keep uploaded CV''s', 'Keep the CV''s that applicants upload. If on, the CV''s can be downloaded from admin area. Otherwise they will be deleted right after sending application emails.', 'boolean', 'radiobutton', 'no|yes', NULL, '0', NULL, 10),
(52, 1, 'home_page_content', 'Home page', 'Pick the page, the content of which you want to be shown on the home page. Leave empty if you only want to show job lists there.', NULL, 'available_pages', NULL, NULL, '', NULL, 6),
(53, 4, 'enable_captcha_on_admin_login_page', 'Enable ReCaptcha on admin login page', 'Protect the admin area with ReCaptcha.', 'boolean', 'radiobutton', 'no|yes', NULL, '0', NULL, 7),
(54, 1, 'subscribe_page_content', 'Subscribe page', 'Pick the page, the content of which you want to be shown on the subscribe page. Leave empty if you only want to show the subscribe form there.', NULL, 'available_pages', NULL, NULL, '', NULL, 7);

-- --------------------------------------------------------

--
-- Table structure for table `settings_categories`
--

CREATE TABLE `settings_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `var_name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `settings_categories`
--

INSERT INTO `settings_categories` (`id`, `name`, `var_name`, `description`) VALUES
(1, 'Main Settings', 'main', 'The main settings for your JobberBase installation. This includes settings such as site name, meta-tags etc.'),
(2, 'Search / Pagination Settings', 'search-and-pagination', 'Settings that change the amount of jobs to display per page and which search method to use.'),
(3, 'URL Rewrite Settings', 'url-rewrite', 'You can easily change the structure of various URLs with these settings.'),
(4, 'Spam / Security Settings', 'anti-spam', 'JobberBase has built-in Spam prevention features which help you to combat spam job posts.'),
(5, 'Mailer Settings', 'mail', 'You can setup the route through which emails are sent (SMTP, for example).'),
(6, 'Look & Feel Settings', 'look-and-feel', 'Change your logo, pick a theme + other UI settings.'),
(7, 'SEO', 'seo', 'Titles, keywords, description, Google Analytics...');

-- --------------------------------------------------------

--
-- Table structure for table `spam_reports`
--

CREATE TABLE `spam_reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `the_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(15) NOT NULL,
  `job_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `job_id` (`job_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `auth` varchar(32) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subscriber_mail_log`
--

CREATE TABLE `subscriber_mail_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `job_id` int(11) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `job_summary` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `subscriber_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `confirmed` tinyint(1) NOT NULL,
  UNIQUE KEY `subscriber_id` (`subscriber_id`,`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(16) NOT NULL,
  `var_name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='full-time/freelance' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `var_name`) VALUES
(1, 'Full-time', 'fulltime'),
(2, 'Part-time', 'parttime'),
(3, 'Freelance', 'freelance');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
