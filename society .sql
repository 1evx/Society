-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2024 at 01:47 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `society`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `name`, `email`, `password`, `gender`) VALUES
(1, 'admin1', 'admin1@gmail.com', '123', 'Female'),
(2, 'admin2', 'admin2@gmail.com', '123', 'Male'),
(3, 'admin3', 'admin3@gmail.com', '12345', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `bannerid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `source` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`bannerid`, `name`, `source`) VALUES
(1, 'banner1', 'image/default_banner.jpg'),
(2, 'companybanner', 'userdata/786340.jpg'),
(3, 'lessonbanner', 'userdata/925166.jpg'),
(4, 'eventbanner', 'userdata/1180249.png');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryid` varchar(4) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryid`, `name`) VALUES
('CJ01', 'Information Technology'),
('CJ02', 'Marketing'),
('CJ03', 'Education'),
('CJ04', 'Finance'),
('CJ05', 'Human Resources'),
('CJ06', 'Customer Service'),
('CJ07', 'Healthcare'),
('CJ08', 'Sales'),
('CJ09', 'Hospitality'),
('CS01', 'Craft'),
('CS02', 'Coding'),
('CS03', 'Productivity'),
('CS04', 'Business'),
('CS05', 'Music'),
('CS06', 'Graphic Design'),
('CS07', 'Animation'),
('CS08', 'Photography'),
('CS09', 'Art'),
('CS10', 'Marketing'),
('CS11', 'Accounting'),
('CS12', 'Magic');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `countryid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `imagesource` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`countryid`, `name`, `imagesource`) VALUES
(1, 'Afghanistan', 'image/afghanistan.png'),
(2, 'Albania', 'image/albania.png'),
(3, 'Algeria', 'image/algeria.png'),
(4, 'American Samoa', 'ASM'),
(5, 'Andorra', 'image/andorra.png'),
(6, 'Angola', 'image/angola.png'),
(7, 'Anguilla', 'AIA'),
(8, 'Antarctica', 'image/antarctica.png'),
(9, 'Antigua and Barbuda', 'image/antiguaandbarbuda.png'),
(10, 'Argentina', 'image/argentina.png'),
(11, 'Armenia', 'image/armenia.png'),
(12, 'Aruba', 'ABW'),
(13, 'Australia', 'image/australia.png'),
(14, 'Austria', 'image/austria.png'),
(15, 'Azerbaijan', 'image/azerbaijian.png'),
(16, 'Bahamas', 'image/bahamas.png'),
(17, 'Bahrain', 'image/bahrain.png'),
(18, 'Bangladesh', 'image/bangladesh.png'),
(19, 'Barbados', 'image/barbados.png'),
(20, 'Belarus', 'image/belarus.png'),
(21, 'Belgium', 'BEL'),
(22, 'Belize', 'BLZ'),
(23, 'Benin', 'BEN'),
(24, 'Bermuda', 'BMU'),
(25, 'Bhutan', 'BTN'),
(26, 'Bolivia', 'BOL'),
(27, 'Bosnia and Herzegovina', 'BIH'),
(28, 'Botswana', 'BWA'),
(29, 'Bouvet Island', ''),
(30, 'Brazil', 'BRA'),
(31, 'British Indian Ocean Territory', ''),
(32, 'Brunei Darussalam', 'BRN'),
(33, 'Bulgaria', 'BGR'),
(34, 'Burkina Faso', 'BFA'),
(35, 'Burundi', 'BDI'),
(36, 'Cambodia', 'KHM'),
(37, 'Cameroon', 'CMR'),
(38, 'Canada', 'CAN'),
(39, 'Cape Verde', 'CPV'),
(40, 'Cayman Islands', 'CYM'),
(41, 'Central African Republic', 'CAF'),
(42, 'Chad', 'TCD'),
(43, 'Chile', 'CHL'),
(44, 'China', 'CHN'),
(45, 'Christmas Island', ''),
(46, 'Cocos (Keeling) Islands', ''),
(47, 'Colombia', 'COL'),
(48, 'Comoros', 'COM'),
(49, 'Congo', 'COG'),
(50, 'Congo', 'COD'),
(51, 'Cook Islands', 'COK'),
(52, 'Costa Rica', 'CRI'),
(53, 'Cote D\'Ivoire', 'CIV'),
(54, 'Croatia', 'HRV'),
(55, 'Cuba', 'CUB'),
(56, 'Cyprus', 'CYP'),
(57, 'Czech Republic', 'CZE'),
(58, 'Denmark', 'DNK'),
(59, 'Djibouti', 'DJI'),
(60, 'Dominica', 'DMA'),
(61, 'Dominican Republic', 'DOM'),
(62, 'Ecuador', 'ECU'),
(63, 'Egypt', 'EGY'),
(64, 'El Salvador', 'SLV'),
(65, 'Equatorial Guinea', 'GNQ'),
(66, 'Eritrea', 'ERI'),
(67, 'Estonia', 'EST'),
(68, 'Ethiopia', 'ETH'),
(69, 'Falkland Islands (Malvinas)', 'FLK'),
(70, 'Faroe Islands', 'FRO'),
(71, 'Fiji', 'FJI'),
(72, 'Finland', 'FIN'),
(73, 'France', 'FRA'),
(74, 'French Guiana', 'GUF'),
(75, 'French Polynesia', 'PYF'),
(76, 'French Southern Territories', ''),
(77, 'Gabon', 'GAB'),
(78, 'Gambia', 'GMB'),
(79, 'Georgia', 'GEO'),
(80, 'Germany', 'DEU'),
(81, 'Ghana', 'GHA'),
(82, 'Gibraltar', 'GIB'),
(83, 'Greece', 'GRC'),
(84, 'Greenland', 'GRL'),
(85, 'Grenada', 'GRD'),
(86, 'Guadeloupe', 'GLP'),
(87, 'Guam', 'GUM'),
(88, 'Guatemala', 'GTM'),
(89, 'Guinea', 'GIN'),
(90, 'Guinea-Bissau', 'GNB'),
(91, 'Guyana', 'GUY'),
(92, 'Haiti', 'HTI'),
(93, 'Heard Island and Mcdonald Islands', ''),
(94, 'Holy See (Vatican City State)', 'VAT'),
(95, 'Honduras', 'HND'),
(96, 'Hong Kong', 'HKG'),
(97, 'Hungary', 'HUN'),
(98, 'Iceland', 'ISL'),
(99, 'India', 'IND'),
(100, 'Indonesia', 'IDN'),
(101, 'Iran', 'IRN'),
(102, 'Iraq', 'IRQ'),
(103, 'Ireland', 'IRL'),
(104, 'Israel', 'ISR'),
(105, 'Italy', 'ITA'),
(106, 'Jamaica', 'JAM'),
(107, 'Japan', 'JPN'),
(108, 'Jordan', 'JOR'),
(109, 'Kazakhstan', 'KAZ'),
(110, 'Kenya', 'KEN'),
(111, 'Kiribati', 'KIR'),
(112, 'Korea', 'PRK'),
(113, 'Korea', 'KOR'),
(114, 'Kuwait', 'KWT'),
(115, 'Kyrgyzstan', 'KGZ'),
(116, 'Lao People\'s Democratic Republic', 'LAO'),
(117, 'Latvia', 'LVA'),
(118, 'Lebanon', 'LBN'),
(119, 'Lesotho', 'LSO'),
(120, 'Liberia', 'LBR'),
(121, 'Libyan Arab Jamahiriya', 'LBY'),
(122, 'Liechtenstein', 'LIE'),
(123, 'Lithuania', 'LTU'),
(124, 'Luxembourg', 'LUX'),
(125, 'Macao', 'MAC'),
(126, 'Macedonia', 'MKD'),
(127, 'Madagascar', 'MDG'),
(128, 'Malawi', 'MWI'),
(129, 'Malaysia', 'image/malaysia.png'),
(130, 'Maldives', 'MDV'),
(131, 'Mali', 'MLI'),
(132, 'Malta', 'MLT'),
(133, 'Marshall Islands', 'MHL'),
(134, 'Martinique', 'MTQ'),
(135, 'Mauritania', 'MRT'),
(136, 'Mauritius', 'MUS'),
(137, 'Mayotte', ''),
(138, 'Mexico', 'MEX'),
(139, 'Micronesia', 'FSM'),
(140, 'Moldova', 'MDA'),
(141, 'Monaco', 'MCO'),
(142, 'Mongolia', 'MNG'),
(143, 'Montserrat', 'MSR'),
(144, 'Morocco', 'MAR'),
(145, 'Mozambique', 'MOZ'),
(146, 'Myanmar', 'MMR'),
(147, 'Namibia', 'NAM'),
(148, 'Nauru', 'NRU'),
(149, 'Nepal', 'NPL'),
(150, 'Netherlands', 'NLD'),
(151, 'Netherlands Antilles', 'ANT'),
(152, 'New Caledonia', 'NCL'),
(153, 'New Zealand', 'NZL'),
(154, 'Nicaragua', 'NIC'),
(155, 'Niger', 'NER'),
(156, 'Nigeria', 'NGA'),
(157, 'Niue', 'NIU'),
(158, 'Norfolk Island', 'NFK'),
(159, 'Northern Mariana Islands', 'MNP'),
(160, 'Norway', 'NOR'),
(161, 'Oman', 'OMN'),
(162, 'Pakistan', 'PAK'),
(163, 'Palau', 'PLW'),
(164, 'Palestinian Territory, Occupied', ''),
(165, 'Panama', 'PAN'),
(166, 'Papua New Guinea', 'PNG'),
(167, 'Paraguay', 'PRY'),
(168, 'Peru', 'PER'),
(169, 'Philippines', 'PHL'),
(170, 'Pitcairn', 'PCN'),
(171, 'Poland', 'POL'),
(172, 'Portugal', 'PRT'),
(173, 'Puerto Rico', 'PRI'),
(174, 'Qatar', 'QAT'),
(175, 'Reunion', 'REU'),
(176, 'Romania', 'ROM'),
(177, 'Russian Federation', 'RUS'),
(178, 'Rwanda', 'RWA'),
(179, 'Saint Helena', 'SHN'),
(180, 'Saint Kitts and Nevis', 'KNA'),
(181, 'Saint Lucia', 'LCA'),
(182, 'Saint Pierre and Miquelon', 'SPM'),
(183, 'Saint Vincent and the Grenadines', 'VCT'),
(184, 'Samoa', 'WSM'),
(185, 'San Marino', 'SMR'),
(186, 'Sao Tome and Principe', 'STP'),
(187, 'Saudi Arabia', 'SAU'),
(188, 'Senegal', 'SEN'),
(189, 'Serbia and Montenegro', ''),
(190, 'Seychelles', 'SYC'),
(191, 'Sierra Leone', 'SLE'),
(192, 'Singapore', 'SGP'),
(193, 'Slovakia', 'SVK'),
(194, 'Slovenia', 'SVN'),
(195, 'Solomon Islands', 'SLB'),
(196, 'Somalia', 'SOM'),
(197, 'South Africa', 'ZAF'),
(198, 'South Georgia and the South Sandwich Islands', ''),
(199, 'Spain', 'ESP'),
(200, 'Sri Lanka', 'LKA'),
(201, 'Sudan', 'SDN'),
(202, 'Suriname', 'SUR'),
(203, 'Svalbard and Jan Mayen', 'SJM'),
(204, 'Swaziland', 'SWZ'),
(205, 'Sweden', 'SWE'),
(206, 'Switzerland', 'CHE'),
(207, 'Syrian Arab Republic', 'SYR'),
(208, 'Taiwan', 'TWN'),
(209, 'TAJIKISTAN', 'Tajikistan'),
(210, 'Tanzania', 'TZA'),
(211, 'Thailand', 'THA'),
(212, 'Timor-Leste', ''),
(213, 'Togo', 'TGO'),
(214, 'Tokelau', 'TKL'),
(215, 'Tonga', 'TON'),
(216, 'Trinidad and Tobago', 'TTO'),
(217, 'Tunisia', 'TUN'),
(218, 'Turkey', 'TUR'),
(219, 'Turkmenistan', 'TKM'),
(220, 'Turks and Caicos Islands', 'TCA'),
(221, 'Tuvalu', 'TUV'),
(222, 'Uganda', 'UGA'),
(223, 'Ukraine', 'UKR'),
(224, 'United Arab Emirates', 'ARE'),
(225, 'United Kingdom', 'GBR'),
(226, 'United States', 'USA'),
(227, 'United States Minor Outlying Islands', ''),
(228, 'Uruguay', 'URY'),
(229, 'Uzbekistan', 'UZB'),
(230, 'Vanuatu', 'VUT'),
(231, 'Venezuela', 'VEN'),
(232, 'Viet Nam', 'VNM'),
(233, 'Virgin Islands, British', 'VGB'),
(234, 'Virgin Islands, U.s.', 'VIR'),
(235, 'Wallis and Futuna', 'WLF'),
(236, 'Western Sahara', 'ESH'),
(237, 'Yemen', 'YEM'),
(238, 'Zambia', 'ZMB'),
(239, 'Zimbabwe', 'ZWE');

-- --------------------------------------------------------

--
-- Table structure for table `coursepost`
--

CREATE TABLE `coursepost` (
  `courseid` int(11) NOT NULL,
  `lecturername` varchar(50) NOT NULL,
  `coursehour` varchar(50) DEFAULT NULL,
  `coursetitle` varchar(50) DEFAULT NULL,
  `coursedescription` mediumtext DEFAULT NULL,
  `feeindollar` varchar(20) DEFAULT NULL,
  `videourl` varchar(255) DEFAULT NULL,
  `finishstatus` tinyint(1) DEFAULT NULL,
  `categoryid` varchar(4) DEFAULT NULL,
  `bannerid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `adminid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coursepost`
--

INSERT INTO `coursepost` (`courseid`, `lecturername`, `coursehour`, `coursetitle`, `coursedescription`, `feeindollar`, `videourl`, `finishstatus`, `categoryid`, `bannerid`, `userid`, `adminid`) VALUES
(1, 'Dr. Smith', '1 HOUR', 'Introduction to Programming', 'Unlocking your creativity and mastering graphic design is a journey filled with endless possibilities and boundless potential. Through dedication and practice, you can refine your skills and transform into a skilled graphic designer capable of captivating audiences with stunning visuals. Whether it\'s crafting eye-catching logos, designing sleek user interfaces, or creating captivating marketing materials, the realm of graphic design offers a vast canvas for your imagination to flourish. Embrace the tools at your disposal, experiment with different techniques, and let your creativity soar as you embark on this exciting and rewarding path', 'Free', 'https://example.com/intro-programming', 1, 'CS02', 1, 1, 1),
(2, 'Prof. Johnson', '2 HOUR', 'Data Science Fundamentals', 'Embark on an exhilarating journey through the realm of data science, where you\'ll delve deep into hands-on projects and real-world examples. From analyzing complex datasets to building predictive models, this immersive experience will empower you with the skills and knowledge needed to thrive in the dynamic field of data science. Dive into cutting-edge technologies, unravel the mysteries of machine learning algorithms, and uncover actionable insights that drive innovation and decision-making. With each project, you\'ll sharpen your analytical abilities and expand your toolkit, preparing you to tackle diverse challenges and make a meaningful impact in today\'s data-driven world.', 'Free', 'https://example.com/data-science-fundamentals', 1, 'CS01', 1, 2, 2),
(3, 'Ms. Davis', '3 HOUR', 'Graphic Design Mastery', 'Welcome to the Graphic Mastery lesson, where creativity meets technique in an immersive journey through the art of visual storytelling. Discover the secrets behind captivating designs, from mastering color theory to harnessing the power of typography. Dive deep into advanced techniques, explore the latest trends, and unlock the full potential of industry-leading design tools. With hands-on projects and expert guidance, you\'ll elevate your skills to new heights and unleash your creativity on a canvas of endless possibilities. Whether you\'re a seasoned designer or just starting out, this lesson is your gateway to mastering the art and science of graphic design.', 'Free', 'https://example.com/graphic-design-mastery', 1, 'CS02', 1, 3, 3),
(4, 'Tan Po Yeh', '1 HOUR', 'Web development', '\r\nUnleash your creativity and embark on a transformative journey to become a web developer extraordinaire. Dive deep into the world of coding languages, mastering HTML, CSS, JavaScript, and beyond. From crafting stunning layouts to building interactive user experiences, the possibilities are limitless. With hands-on projects and real-world examples, you\'ll hone your skills and unlock the secrets of the web. Whether you dream of designing sleek websites, developing dynamic web applications, or launching your own digital ventures, this is your opportunity to turn your passion into a powerful skill set. Join us and unleash your potential as a web developer today!', 'Free', 'userdata/CourseVideo.mp4', 0, 'CS01', 3, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `eventpost`
--

CREATE TABLE `eventpost` (
  `eventid` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `eventdescription` mediumtext DEFAULT NULL,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `finishstatus` tinyint(1) DEFAULT NULL,
  `countryid` int(11) DEFAULT NULL,
  `bannerid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `adminid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eventpost`
--

INSERT INTO `eventpost` (`eventid`, `title`, `eventdescription`, `startdate`, `enddate`, `finishstatus`, `countryid`, `bannerid`, `userid`, `adminid`) VALUES
(1, 'Web Development Workshop', 'Step into the world of web development and embark on a transformative journey with our comprehensive workshop. From mastering the fundamentals of HTML and CSS to diving deep into JavaScript and beyond, you\'ll gain the skills needed to create stunning websites and dynamic web applications. Through hands-on projects and real-world examples, you\'ll learn how to design responsive layouts, implement interactive features, and optimize your code for performance. Whether you\'re a beginner or looking to level up your skills, our workshop will empower you to unlock your potential and thrive in the fast-paced world of web development. Join us and take your first step towards becoming a web development pro!', '2023-05-15', '2023-05-17', 1, 1, 1, 1, 1),
(2, 'Data Science Conference', 'Immerse yourself in the captivating realm of data science at our exclusive conference. From cutting-edge machine learning algorithms to advanced data visualization techniques, explore the latest trends and innovations shaping the field. Dive into hands-on workshops, insightful presentations, and interactive sessions led by industry experts. Whether you\'re a seasoned data scientist or just starting your journey, our conference offers valuable insights, networking opportunities, and inspiration to fuel your passion for data. Join us and discover the endless possibilities of data science!', '2023-06-10', '2023-06-12', 1, 2, 1, 1, 2),
(3, 'Artificial Intelligence Summit', 'Embark on an illuminating journey into the world of artificial intelligence at our groundbreaking summit. Delve into the forefront of AI research, from neural networks and deep learning to natural language processing and computer vision. Engage with leading experts and visionaries as they share insights, strategies, and real-world applications shaping the future of AI. Through dynamic keynotes, hands-on workshops, and interactive discussions, gain invaluable knowledge and inspiration to drive innovation in your organization. Join us and unlock the transformative potential of artificial intelligence!', '2023-07-20', '2023-07-22', 1, 3, 1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `jobpost`
--

CREATE TABLE `jobpost` (
  `jobid` int(11) NOT NULL,
  `jobtitle` varchar(50) NOT NULL,
  `companyname` varchar(50) NOT NULL,
  `companyurl` varchar(255) NOT NULL,
  `salaryrange` varchar(20) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `joburl` varchar(255) DEFAULT NULL,
  `jobtype` varchar(50) NOT NULL,
  `jobdescription` mediumtext DEFAULT NULL,
  `jobrequirement` mediumtext DEFAULT NULL,
  `finishstatus` tinyint(1) DEFAULT NULL,
  `countryid` int(11) DEFAULT NULL,
  `categoryid` varchar(4) DEFAULT NULL,
  `bannerid` int(11) DEFAULT NULL,
  `profileid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `adminid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobpost`
--

INSERT INTO `jobpost` (`jobid`, `jobtitle`, `companyname`, `companyurl`, `salaryrange`, `deadline`, `joburl`, `jobtype`, `jobdescription`, `jobrequirement`, `finishstatus`, `countryid`, `categoryid`, `bannerid`, `profileid`, `userid`, `adminid`) VALUES
(1, 'Software Engineer', 'Pandora Studio', 'http://www.apu.edu.my/', '$10,000 - $20,000', '2023-05-31', 'https://example.com/job1', 'Internship', 'Don\'t miss out on this thrilling chance to join our dynamic team as a skilled software engineer! Dive into cutting-edge projects and collaborate with talented professionals to tackle complex technical challenges. From developing innovative solutions to optimizing software performance, you\'ll have the opportunity to make a meaningful impact in a fast-paced environment. Take your career to new heights and unleash your full potential with us. Apply now and seize this exciting opportunity!', 'Are you a visionary leader with a passion for coding and innovation? We\'re on the lookout for a creative mind to spearhead our coding teams and drive excellence in software development. In this role, you\'ll harness your technical expertise and leadership skills to guide our teams in delivering high-quality solutions that push the boundaries of innovation. From architecting scalable systems to fostering a culture of collaboration and creativity, you\'ll play a pivotal role in shaping the future of our technology initiatives. If you\'re ready to lead with vision and drive impactful change in the world of coding, we want to hear from you! Join us on our mission to revolutionize the way we build software and make a lasting impact in the industry.', 1, 1, 'CJ01', 1, 1, 1, 1),
(2, 'Data Analyst', 'Asia Pacific University', 'http://www.apu.edu.my/', '$50,000 - $70,000', '2023-06-15', 'https://example.com/job2', 'Full Time', 'Ready to make a meaningful impact in the world of data analytics? Join our dynamic team and unleash your potential in driving data-driven decisions and insights. With a collaborative environment and cutting-edge tools at your disposal, you\'ll have the opportunity to tackle complex challenges and drive innovation. Whether it\'s uncovering hidden trends, optimizing processes, or informing strategic decisions, your expertise will play a pivotal role in shaping the future of our organization. Don\'t miss out on this exciting opportunity to be at the forefront of data analytics and make a lasting difference. Join us and let\'s create something extraordinary together.', 'Are you a visionary leader with a passion for coding and innovation? We\'re on the lookout for a creative mind to spearhead our coding teams and drive excellence in software development. In this role, you\'ll harness your technical expertise and leadership skills to guide our teams in delivering high-quality solutions that push the boundaries of innovation. From architecting scalable systems to fostering a culture of collaboration and creativity, you\'ll play a pivotal role in shaping the future of our technology initiatives. If you\'re ready to lead with vision and drive impactful change in the world of coding, we want to hear from you! Join us on our mission to revolutionize the way we build software and make a lasting impact in the industry.', 1, 2, 'CJ01', 1, 1, 2, 2),
(3, 'Marketing Specialist', 'Ambank Sdn Bhd', 'http://www.apu.edu.my/', '$45,000 - $60,000', '2023-07-01', 'https://example.com/job3', 'Internship', 'Are you a visionary marketer ready to spearhead captivating campaigns? We\'re on the lookout for a creative mind to take the reins and drive our marketing efforts to new heights. With your innovative ideas and strategic approach, you\'ll shape compelling campaigns that resonate with our audience and elevate our brand. From crafting engaging content to implementing cutting-edge strategies, you\'ll have the opportunity to make a significant impact and leave your mark in the industry. Join us as we embark on an exciting journey to connect with customers and inspire action. If you\'re ready to unleash your creativity and make a splash in the world of marketing, we want to hear from you!', 'Are you a visionary leader with a passion for coding and innovation? We\'re on the lookout for a creative mind to spearhead our coding teams and drive excellence in software development. In this role, you\'ll harness your technical expertise and leadership skills to guide our teams in delivering high-quality solutions that push the boundaries of innovation. From architecting scalable systems to fostering a culture of collaboration and creativity, you\'ll play a pivotal role in shaping the future of our technology initiatives. If you\'re ready to lead with vision and drive impactful change in the world of coding, we want to hear from you! Join us on our mission to revolutionize the way we build software and make a lasting impact in the industry.', 1, 3, 'CJ02', 1, 1, 1, 3),
(4, 'Game Developer', 'Pandora Studio', 'https://pandorastudio.com/', 'Free', '2024-02-24', 'https://google.com/', 'Part Time', 'Are you a visionary leader with a passion for coding and innovation? We\'re on the lookout for a creative mind to spearhead our coding teams and drive excellence in software development. In this role, you\'ll harness your technical expertise and leadership skills to guide our teams in delivering high-quality solutions that push the boundaries of innovation. From architecting scalable systems to fostering a culture of collaboration and creativity, you\'ll play a pivotal role in shaping the future of our technology initiatives. If you\'re ready to lead with vision and drive impactful change in the world of coding, we want to hear from you! Join us on our mission to revolutionize the way we build software and make a lasting impact in the industry', 'Are you a visionary leader with a passion for coding and innovation? We\'re on the lookout for a creative mind to spearhead our coding teams and drive excellence in software development. In this role, you\'ll harness your technical expertise and leadership skills to guide our teams in delivering high-quality solutions that push the boundaries of innovation. From architecting scalable systems to fostering a culture of collaboration and creativity, you\'ll play a pivotal role in shaping the future of our technology initiatives. If you\'re ready to lead with vision and drive impactful change in the world of coding, we want to hear from you! Join us on our mission to revolutionize the way we build software and make a lasting impact in the industry.', 1, 1, 'CJ01', 2, 2, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `profileid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `source` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profileid`, `name`, `source`) VALUES
(1, 'userprofile', 'image/default_image.jpg'),
(2, 'companyprofile', 'userdata/1157372.jpg ');

-- --------------------------------------------------------

--
-- Table structure for table `savedcourse`
--

CREATE TABLE `savedcourse` (
  `savedcourseid` int(11) NOT NULL,
  `courseid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `isPin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `savedcourse`
--

INSERT INTO `savedcourse` (`savedcourseid`, `courseid`, `userid`, `isPin`) VALUES
(1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `savedevent`
--

CREATE TABLE `savedevent` (
  `savedeventid` int(11) NOT NULL,
  `eventid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `isPin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `savedevent`
--

INSERT INTO `savedevent` (`savedeventid`, `eventid`, `userid`, `isPin`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `savedjob`
--

CREATE TABLE `savedjob` (
  `savedjobid` int(11) NOT NULL,
  `jobid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `isPin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `savedjob`
--

INSERT INTO `savedjob` (`savedjobid`, `jobid`, `userid`, `isPin`) VALUES
(3, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `age` int(200) NOT NULL,
  `about` varchar(255) DEFAULT NULL,
  `userjobtitle` varchar(255) DEFAULT NULL,
  `userpreference` varchar(255) DEFAULT NULL,
  `userevent` varchar(255) DEFAULT NULL,
  `countryid` int(11) DEFAULT NULL,
  `bannerid` int(11) DEFAULT NULL,
  `profileid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `firstname`, `lastname`, `email`, `password`, `gender`, `age`, `about`, `userjobtitle`, `userpreference`, `userevent`, `countryid`, `bannerid`, `profileid`) VALUES
(1, 'John', 'Doe', 'john@gmail.com', '123', 'male', 19, 'I love hiking and art design.', 'Art Designer', 'Art Design', 'Artist Conference', 1, 1, 1),
(2, 'Jane', 'Smith', 'jane@gmail.com', 'pass456', 'female', 18, 'Passionate about data science and AI.', 'Data Scientist', 'Data Science', 'Tech Meetups', 2, 1, 1),
(3, 'Alex', 'Johnson', 'alex@gmail.com', '123', 'male', 19, 'Graphic designer with a love for art.', 'Graphic Designer', 'Graphic Design', 'Art Exhibitions', 3, 1, 1),
(4, 'Po Yeh', 'Tan', 'poyehtan@gmail.com', '123', 'male', 18, 'dsads gasd gfdf\r\n212\r\n312\r\nfda', 'fdsa, fjds, dsa', 'fad, fda, dsa', 'fads', 129, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`bannerid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`countryid`);

--
-- Indexes for table `coursepost`
--
ALTER TABLE `coursepost`
  ADD PRIMARY KEY (`courseid`),
  ADD KEY `categoryid` (`categoryid`),
  ADD KEY `bannerid` (`bannerid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `adminid` (`adminid`);

--
-- Indexes for table `eventpost`
--
ALTER TABLE `eventpost`
  ADD PRIMARY KEY (`eventid`),
  ADD KEY `countryid` (`countryid`),
  ADD KEY `bannerid` (`bannerid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `adminid` (`adminid`);

--
-- Indexes for table `jobpost`
--
ALTER TABLE `jobpost`
  ADD PRIMARY KEY (`jobid`),
  ADD KEY `countryid` (`countryid`),
  ADD KEY `categoryid` (`categoryid`),
  ADD KEY `bannerid` (`bannerid`),
  ADD KEY `profileid` (`profileid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `adminid` (`adminid`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profileid`);

--
-- Indexes for table `savedcourse`
--
ALTER TABLE `savedcourse`
  ADD PRIMARY KEY (`savedcourseid`);

--
-- Indexes for table `savedevent`
--
ALTER TABLE `savedevent`
  ADD PRIMARY KEY (`savedeventid`);

--
-- Indexes for table `savedjob`
--
ALTER TABLE `savedjob`
  ADD PRIMARY KEY (`savedjobid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `countryid` (`countryid`),
  ADD KEY `bannerid` (`bannerid`),
  ADD KEY `profileid` (`profileid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `bannerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `countryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `coursepost`
--
ALTER TABLE `coursepost`
  MODIFY `courseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `eventpost`
--
ALTER TABLE `eventpost`
  MODIFY `eventid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobpost`
--
ALTER TABLE `jobpost`
  MODIFY `jobid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profileid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `savedcourse`
--
ALTER TABLE `savedcourse`
  MODIFY `savedcourseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `savedevent`
--
ALTER TABLE `savedevent`
  MODIFY `savedeventid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `savedjob`
--
ALTER TABLE `savedjob`
  MODIFY `savedjobid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `coursepost`
--
ALTER TABLE `coursepost`
  ADD CONSTRAINT `coursepost_ibfk_1` FOREIGN KEY (`categoryid`) REFERENCES `category` (`categoryid`),
  ADD CONSTRAINT `coursepost_ibfk_2` FOREIGN KEY (`bannerid`) REFERENCES `banner` (`bannerid`),
  ADD CONSTRAINT `coursepost_ibfk_3` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`),
  ADD CONSTRAINT `coursepost_ibfk_4` FOREIGN KEY (`adminid`) REFERENCES `admin` (`adminid`);

--
-- Constraints for table `eventpost`
--
ALTER TABLE `eventpost`
  ADD CONSTRAINT `eventpost_ibfk_1` FOREIGN KEY (`countryid`) REFERENCES `country` (`countryid`),
  ADD CONSTRAINT `eventpost_ibfk_2` FOREIGN KEY (`bannerid`) REFERENCES `banner` (`bannerid`),
  ADD CONSTRAINT `eventpost_ibfk_3` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`),
  ADD CONSTRAINT `eventpost_ibfk_4` FOREIGN KEY (`adminid`) REFERENCES `admin` (`adminid`);

--
-- Constraints for table `jobpost`
--
ALTER TABLE `jobpost`
  ADD CONSTRAINT `jobpost_ibfk_1` FOREIGN KEY (`countryid`) REFERENCES `country` (`countryid`),
  ADD CONSTRAINT `jobpost_ibfk_2` FOREIGN KEY (`categoryid`) REFERENCES `category` (`categoryid`),
  ADD CONSTRAINT `jobpost_ibfk_3` FOREIGN KEY (`bannerid`) REFERENCES `banner` (`bannerid`),
  ADD CONSTRAINT `jobpost_ibfk_4` FOREIGN KEY (`profileid`) REFERENCES `profile` (`profileid`),
  ADD CONSTRAINT `jobpost_ibfk_5` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`),
  ADD CONSTRAINT `jobpost_ibfk_6` FOREIGN KEY (`adminid`) REFERENCES `admin` (`adminid`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`countryid`) REFERENCES `country` (`countryid`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`bannerid`) REFERENCES `banner` (`bannerid`),
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`profileid`) REFERENCES `profile` (`profileid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
