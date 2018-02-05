-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 05, 2018 at 02:20 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_application`
--

-- --------------------------------------------------------

--
-- Table structure for table `mast_company`
--

CREATE TABLE `mast_company` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Company_name` varchar(50) DEFAULT NULL,
  `Address` varchar(800) DEFAULT NULL,
  `City` varchar(20) DEFAULT NULL,
  `Zip` varchar(7) DEFAULT NULL,
  `Country` varchar(20) DEFAULT NULL,
  `Website` varchar(75) DEFAULT NULL,
  `Profile` varchar(700) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mast_company`
--

INSERT INTO `mast_company` (`id`, `user_id`, `Company_name`, `Address`, `City`, `Zip`, `Country`, `Website`, `Profile`, `logo`) VALUES
(9, 17, 'Tricks 4 You', 'SM SARANI\r\nBIRATI\r\nKOLKATA', 'barasat', '700051', 'india', 'https://material.io/', 'the best company for jobseeker', 'Tricks4You9.png'),
(10, 19, 'AYAN TELECOM', '122/B,Dakhineswar, Baranagar,', 'kolkata', '700041', 'india', 'https://jio.com', 'We need the telecom specialist, With Knowledge and skill in Electronics', 'AYAN TELECOM10.PNG'),
(11, 20, 'ATLAS HEALTHCARE SOFTWARE', 'Atlas Healthcare Software India Private Limited\r\nBIPL Omega Building, 5th Floor\r\nBlock EP &amp; GP, Salt Lake, Sector V,\r\nKolkata, WB 700091, India', 'KOLKATA', '700091', 'INDIA', 'www.atlashealthcaresoftware.com', 'Atlas Healthcare Software, founded in 2006, is a wholly owned Indian\r\nsubsidiary of Atlas Development Corporation, USA. It is the Research and Development arm for the\r\nparent company, which itself is a leading solutions provider in the field of Healthcare Informatics in the\r\nUnited States. Since its founding in 2006, Atlas Healthcare Software has achieved significant success in\r\nbuilding mission critical products for leading private healthcare and public health organizations. It&#39;s star\r\nteam of Software Architects, Technical Leads, and Developers have designed, developed and deployed\r\nsophisticated, high performance, state- of-the- art software products on Microsoft&#39;s .NET platform,\r', 'ATLAS HEALTHCARE SOF11.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mast_customer`
--

CREATE TABLE `mast_customer` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cust_name` varchar(200) NOT NULL,
  `address` text,
  `phone` varchar(13) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `experience` text,
  `skills` varchar(250) DEFAULT NULL,
  `basic_edu` varchar(100) DEFAULT NULL,
  `master_edu` varchar(100) DEFAULT NULL,
  `CV` varchar(250) DEFAULT NULL,
  `photo` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mast_customer`
--

INSERT INTO `mast_customer` (`id`, `user_id`, `cust_name`, `address`, `phone`, `city`, `state`, `country`, `experience`, `skills`, `basic_edu`, `master_edu`, `CV`, `photo`) VALUES
(3, 16, 'Susanta Chakraborty', '25/B,NEW TOWN,Gaziabad-700045', '9062921952', 'Gaziabad', 'UP', 'India', 'Fresher /0 yr', 'POWERPOINT,EXCEL,VISUAL STUDIO,ANDROID STUDIO', 'B.Tech/B.E.', 'M.Tech', 'Tricks4you3.pdf', 'Susanta Chakraborty3.jpg'),
(4, 18, 'avik majumder', '40,birati,kolkata-700051', '8481094570', 'kolkata', 'west bengal', 'india', 'Fresher', 'PHP,HTML,CSS,BOOTSTRAP,JS', 'B.Sc', 'Not Pursuing Post Graduation', 'avik majumder4.docx', 'avik majumder4.jpg'),
(5, 21, 'Sushmita', '6546,wqdb,kolkata-700051', '9051643235', 'kolkata', 'west bengal', 'India', '0 yr/Fresher', 'JAVA, SDLC', 'B.Tech/B.E.', 'Not Pursuing Post Graduation', NULL, 'Sushmita5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mst_user`
--

CREATE TABLE `mst_user` (
  `id` int(11) NOT NULL,
  `name_user` varchar(20) NOT NULL,
  `gender` char(1) NOT NULL,
  `account_type` char(1) NOT NULL,
  `email` varchar(50) NOT NULL,
  `login_pass` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_user`
--

INSERT INTO `mst_user` (`id`, `name_user`, `gender`, `account_type`, `email`, `login_pass`) VALUES
(16, 'susanta96', 'm', 'j', 'susant.vanu7278@gmail.com', '$2y$10$RQCotchsMb7R6AwWP7DaqeRuXtdnkCsOazymuO0a6Ta4k4bAZsz5y'),
(17, 'susanta96', 'm', 'e', 'svchost96@gmail.com', '$2y$10$RQCotchsMb7R6AwWP7DaqeRuXtdnkCsOazymuO0a6Ta4k4bAZsz5y'),
(18, 'rahulavik', 'm', 'j', 'whothehellareu5@gmail.com', '$2y$10$7JKS1D6.iaDr0GS5EvhTJeJiKPLMO9nrdCAGeB2N9ze0wXTF3jjeS'),
(19, 'ayan', 'm', 'e', 'ayantorres@gmail.com', '$2y$10$RQCotchsMb7R6AwWP7DaqeRuXtdnkCsOazymuO0a6Ta4k4bAZsz5y'),
(20, 'user1', 'm', 'e', 'susantac1996@yahoo.in', '$2y$10$RQCotchsMb7R6AwWP7DaqeRuXtdnkCsOazymuO0a6Ta4k4bAZsz5y'),
(21, 'sushmita', 'f', 'j', 'cantrachoudhary@gmail.com', '$2y$10$UWN2nGlbzdRLLyvmamHjPOhrFBR7yOCvPsdWyo19ecsalLrAO7ppW');

-- --------------------------------------------------------

--
-- Table structure for table `selection`
--

CREATE TABLE `selection` (
  `sel_id` int(11) NOT NULL,
  `cust_id` int(11) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selection`
--

INSERT INTO `selection` (`sel_id`, `cust_id`, `emp_id`, `job_id`, `status`, `date`) VALUES
(6, 3, 9, 2, 1, '20-08-17'),
(8, 4, 9, 1, 1, '27-08-17'),
(9, 4, 9, 13, 2, '28-08-17'),
(10, 3, 9, 12, 2, '28-08-17'),
(19, 3, 10, 21, 1, '28-08-17'),
(20, 4, 9, 2, 1, '23-11-17'),
(21, 4, 10, 21, 1, '23-11-17');

-- --------------------------------------------------------

--
-- Table structure for table `trans_ads`
--

CREATE TABLE `trans_ads` (
  `id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `Job_category` varchar(200) DEFAULT NULL,
  `Description` text NOT NULL,
  `Exp_required` varchar(20) NOT NULL,
  `Salary` varchar(100) NOT NULL,
  `ugqual` varchar(100) DEFAULT NULL,
  `pgqual` varchar(100) DEFAULT NULL,
  `postdate` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_ads`
--

INSERT INTO `trans_ads` (`id`, `e_id`, `title`, `Job_category`, `Description`, `Exp_required`, `Salary`, `ugqual`, `pgqual`, `postdate`) VALUES
(1, 9, 'Network Administrator', 'Computer Hardware/Networking', 'Consulting with clients to specify system requirements and design solutions\r\nBudgeting for equipment and assembly costs\r\nAssembling new systems\r\nMaintaining existing software and hardware and upgrading any that have become obsolete\r\nWorking in tandem with IT support personnel\r\nProviding network administration and support', '0 yr/Fresher', 'Rs 15000', 'B.Tech/B.E.', 'Not Required', '16-08-17'),
(2, 9, 'Software Engineer', 'Software Services', 'The focus of this position is the design and development of the core V-PIL services infrastructure, including custom automation software, job schedulers, data analysis, data visualization, and web development.', '1 yr', 'Rs 25000', 'BCA', 'MCA', '17-08-17'),
(12, 9, 'Online Bidder', 'Software Services', 'URGENT HIRING\r\nSanpro Info Solution is looking for an experienced (1-2 year) online bidder urgently. The walk-in will be going on from 12.01.2017-31.01.2017. It will be a direct interview so you need to carry a hard copy of your CV and your passport size photograph. (11 am to 5pm)\r\n\r\nJob Description:\r\nWe are looking for professional online bidder to be based in Kolkata\r\n\r\nKey Role:\r\nâ€¢ Minimum 1-2 Years of experience in Mobile and Web Domain, which includes experience in Business Development, Marketing and Account Management domain.\r\nâ€¢ New client acquisition\r\nâ€¢ Market research to assess new segments of growth and market potential.\r\nâ€¢ Lead generation prospecting new clients\r\nâ€¢ Good networking skills in various industries.\r\nâ€¢ Pitching potential clients for Business / empanelment in various sectors IT / BFSI / FMCG/ Healthcare / E-Com', '1 yr', 'Rs 45000', 'B.Tech/B.E.', 'M.Tech', '18-08-17'),
(22, 9, 'Jio Telecom Network', 'Animation / Gaming', 'Best way to do the work is to validate your work', '1 yr', 'Rs 250000', 'BCA,', 'Not Required,', '04-09-17'),
(13, 9, 'Web Developer (ASP.net) ', 'Courier/Freight/Transportation/Warehousing', 'Roles and Resposibilities of Web Developer (ASP.net)\r\nABOUT COMPANY: Company is a marketing services firm.\r\n\r\nELIGIBILITY:\r\n\r\nQualifications:\r\n\r\nï¿½ Minimum of 4 years of experience with ASP.NET, C# and JavaScript/JQuery.\r\n\r\nï¿½ Must have experience with MVC, Web API, Entity Framework, AngularJS and Bootstrap.\r\n\r\nï¿½ Experience with other JavaScript frameworks is a plus.\r\n\r\nï¿½ Self-motivated, results oriented, creative and strong sense of accountability.\r\n\r\nï¿½ Strong written and verbal communication skills, as well as strong problem-solving abilities and an aptitude for learning new technologies.\r\n\r\nï¿½ Strong organizational and prioritization skills.\r\n\r\nï¿½ Commitment to usability, accessibility, security and privacy standards.\r\n\r\nNATURE OF JOB:\r\n\r\nï¿½ Contribute to the development of web applications from concept to implementation.\r\n\r\nï¿½ Work with co-workers to help determine time-lines, develop, design, implement and follow best practices, policies and procedures.\r\n\r\nï¿½ Maintain and enhance production applications.\r\n\r\n\"Web Developer (ASP.net)\", ASP.net, C#, JavaScript, JQuery, ', '0 yr/Fresher', 'Rs 21000', 'Diploma', 'MCA', '18-08-17'),
(21, 10, 'Jio Telecom Network', 'Telecom/ISP', 'Job for jio Telecom industry, In network deptartment. Need IT Proffesionals', '2 yr', 'USD 5000', 'BCA,B.Sc,B.Tech/B.E.,', 'Not Required,', '27-08-17');

-- --------------------------------------------------------

--
-- Table structure for table `trans_apply`
--

CREATE TABLE `trans_apply` (
  `apply_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `emp_id` int(20) DEFAULT NULL,
  `adv_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `apply_date` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_apply`
--

INSERT INTO `trans_apply` (`apply_id`, `user_id`, `emp_id`, `adv_id`, `status`, `apply_date`) VALUES
(1, 4, 9, 1, NULL, '20-8-17'),
(2, 3, 9, 2, NULL, '21-08-17'),
(3, 4, 9, 13, 2, '28-08-17'),
(5, 3, 9, 12, 2, '28-08-17'),
(11, 4, 9, 2, NULL, '30-08-17'),
(12, 4, 10, 21, NULL, '17-11-17'),
(13, 5, 9, 2, NULL, '23-11-17'),
(14, 3, 10, 21, NULL, '23-11-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mast_company`
--
ALTER TABLE `mast_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mast_customer`
--
ALTER TABLE `mast_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_user`
--
ALTER TABLE `mst_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selection`
--
ALTER TABLE `selection`
  ADD PRIMARY KEY (`sel_id`);

--
-- Indexes for table `trans_ads`
--
ALTER TABLE `trans_ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_apply`
--
ALTER TABLE `trans_apply`
  ADD PRIMARY KEY (`apply_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mast_company`
--
ALTER TABLE `mast_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mast_customer`
--
ALTER TABLE `mast_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mst_user`
--
ALTER TABLE `mst_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `selection`
--
ALTER TABLE `selection`
  MODIFY `sel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `trans_ads`
--
ALTER TABLE `trans_ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `trans_apply`
--
ALTER TABLE `trans_apply`
  MODIFY `apply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
