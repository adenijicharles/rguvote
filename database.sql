-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2020 at 06:57 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rguvote`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT '',
  `email` varchar(255) DEFAULT '',
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`id`, `staff_id`, `fullname`, `email`, `password`, `created_at`) VALUES
(1, 2000916, 'Adeniji Charles', 'adenijiayocharles@gmail.com', '$2y$10$nmQ32qUpRqnO9uQOe8qOresbEoDWSK6irGzy6Xv7HkMpeisd7cmTG', '2020-03-18 14:18:29'),
(24, 1913459, 'Sokunbi Idowu', 'i.sokunbi@rgu.ac.uk', '$2y$10$fZ6j7qhGznv2c0O7QvH2aOdHWyos1xJzBaoNVACnprRf98Zh5541a', '2020-04-02 13:00:48');

-- --------------------------------------------------------

--
-- Table structure for table `nominees`
--

CREATE TABLE `nominees` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `school` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `ethnicity` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `manifesto` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT '',
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nominees`
--

INSERT INTO `nominees` (`id`, `student_id`, `name`, `level`, `school`, `sex`, `ethnicity`, `bio`, `manifesto`, `position`, `picture`, `created_at`) VALUES
(3, 34343, 'Adeniji Charles', '400', 'CSDM', 'Male', 'African', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i', 'charles_president.mp4', '1', 'charles_president.jpg', '2020-03-19 20:13:04'),
(4, 32323, 'Fredrick Horby', '400', 'ABS', 'Male', 'White', 'Hello, my name is Fredrick Hornby and I hope to become the 2020 \r\nPresident here at RGU. I believe that leadership comes from experience and\r\ndetermination and I have accummulated over 50 hours as the President\r\nof the Society for Petroleum Engineers. I have also 10 years experience \r\nin the Oil and Gas Industry and I believe I can provide knowledge to my \r\ncolleagues in Project Management, Design and Marketing. I hope to \r\nbring new ideas to the teamn and create long-lasting relationships with\r\nsponsors throughout the University. The opportunity will allow my fellow\r\nstudents the opportunity to lead the way in future elections. I hope \r\nto work with you all very soon. Thank you.', 'augustina_president.mp4', '1', 'augustina_president.jpg', '2020-03-31 09:47:09'),
(5, 223423, 'Omotayo Kelani', '500', 'Grays School of Art', 'Male', 'African', 'Hi, I’m Omotayo Kelani and I’d love to be your RGU Student Union President in the coming election ! \r\nI believe in continual improvement .In that vein I am sure we can make our student union society even better if you work together with me to ensure that I am elected. I hope to bring to bear my previous experience in similar position to bear in the new role I am vying for.\r\nI hope to have an inclusive society where all students will be stakeholders. I hope to ensure that there is great synergy with the school authority during my time as well. \r\n\r\n', 'sokunbi_president.mp4', '1', 'sokunmbi_president.jpg', '2020-04-14 09:28:51'),
(6, 3232323, 'Abimbola Oladipo', '500', 'Grays School of Art', 'Male', 'African', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i', 'obj_president.mp4', '1', 'obj_president.jpg', '2020-03-19 19:38:15'),
(7, 3434333, 'Olajide Taiwo', '400', 'School of Architecture', 'Male', 'African', 'My name is Olajide Taiwo. I am contesting for the position of Vice President during the RGU Student election. I hope to be a voice for International students if I am voted in.\r\nI will represent the opinions of the international students and ensure that they are effectively represented and their ideas are shared, this will be achieved by working alongside the university, societies, students and staff.  \r\nPromote a positive image of the union to the international students by engaging students with union’s events.  Working together as one voice, one union, all students will enjoy every dividend as deposited within the campus. Promote diversity at Robert Gordon University and ensure there are equal opportunities for every student at the University where students will be encouraged to participating and support union events and activities.\r\n', 'charles_vice_president.mp4', '2', 'charles_vice_president.jpg', '2020-03-31 11:51:36'),
(8, 656333, 'Leke Awonuga', '300', 'CDSM', 'Male', 'Hispanics', 'Hello Everyone, my name is Leke Awonuga. I am a Master\'s student at Robert\r\nGordon University, studying Information Technology. I will like you all to \r\nplease vote for me at the upcoming Student Union Government Elections.\r\nI am running for the office of the Vice President. \r\nI come with a wealth of exerience in the area of branding. I have been a \r\nbrand influencer for over 3 years. I have also volunteered as a social media reporter\r\nfor Global Landscape Forum in Accra, Ghana in 2019. I also represented the Student Digital \r\nSociety at the conference abroad in January, 2020 at Paris, France.\r\nI want to share my wealth of experience to create positive impact in the lives of students\r\nin the following categories.\r\nIn the areas of welfare, I am going to work to ensure very good and affordable food on campus\r\nI am also going to lobby for better mental health for all students. \r\nIn the areas of finance, I am going to persuade the school\'s administration to ensure flexible\r\npayment plans for all students. I will also campaign for students to have free access to school clubs \r\nand societies. \r\nIn the area of advocacy, I will support the initiative for students to be a part of the \r\ndecision-making process. I hope that I have been able to convince all you electorates to cast your vote for me\r\nin this forth-coming elections. \r\nThank you all and cheers.', 'augustina_vice_president.mp4', '2', 'augustina_vice_president.jpg', '2020-03-31 09:47:44'),
(9, 222344, 'Precious Usman', '500', 'Grays School of Art', 'Male', 'African', 'Hi, my name is Usman Precious.I am contesting for the position of Vice President in the RGU Student Union election and will appreciate it if you vote for me\r\nIf you elect me, first, you will see tremendous improvement in the quality of education. I hope to use my good office to liaise with all relevant bodies on campus to synergize to ensure the quality of education that RGU is noted for does not drop. Secondly, I also hope to promote the improvement of our Sports Facility to further encourage students to participate in sports. Thirdly, I hope to look into the problems that international students face in the area of securing accommodation close to the school.\r\n', 'sokunmbi_vice_president.mp4', '2', 'sokunmbi_vice_president.jpg', '2020-04-14 08:33:18'),
(10, 23245111, 'Abimbola Oladipo', '500', 'Grays School of Art', 'Male', 'African', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i', 'obj_vice_president.mp4', '2', 'obj_vice_president.jpg', '2020-03-19 20:10:45');

-- --------------------------------------------------------

--
-- Table structure for table `organisation`
--

CREATE TABLE `organisation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`) VALUES
(1, 'President'),
(2, 'Vice President'),
(3, 'Secretary'),
(4, 'Financial Secretary');

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `ethnicity` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `student_id`, `password`, `surname`, `firstname`, `email`, `level`, `department`, `gender`, `ethnicity`, `created_at`) VALUES
(2, 2000916, '$2y$10$Mjjf3T9gC7j3io4b9kqqeetO.i7/A/YIu7NdG5Z02pyA393rMMmLS', 'Adeniji', 'Charles', 'c.adeniji@rgu.ac.uk', 'Undergraduate', 'Computing', 'Male', 'Asia', '2020-03-19 21:19:43'),
(27, 1913459, '$2y$10$wVEGfaI1cFNadc1jyAkL6Om1dx7rbok9j0JqL05H4qSOCli7I8epe', 'Sokunbi', 'Idowu', 'I.sokunbi@rgu.ac.uk', 'Postgraduate', 'Computing', 'Male', 'African', '2020-04-02 12:48:58');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `nominee_id` int(11) DEFAULT NULL,
  `position_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `student_id`, `nominee_id`, `position_id`, `created_at`) VALUES
(22, 1913459, 7, 2, '2020-04-02 12:52:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nominees`
--
ALTER TABLE `nominees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organisation`
--
ALTER TABLE `organisation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `nominees`
--
ALTER TABLE `nominees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `organisation`
--
ALTER TABLE `organisation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
