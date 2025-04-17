-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2024 at 05:08 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `headline` varchar(255) NOT NULL,
  `introduction` text NOT NULL,
  `placement_details` text NOT NULL,
  `significance` text NOT NULL,
  `student_achievements` text NOT NULL,
  `quotes` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `headline`, `introduction`, `placement_details`, `significance`, `student_achievements`, `quotes`, `created_at`) VALUES
(1, 'Congratulations to XYZ from Wadia College on Securing a Placement at TCS!', 'We are excited to announce that XYZ, a talented student from Wadia College, has successfully secured a prestigious placement with Tata Consultancy Services (TCS), one of the leading IT services companies in the world.', 'Company Name: Tata Consultancy Services (TCS)\r\nPosition Title: Software Engineer\r\nStart Date: November 1, 2024', 'This placement is a remarkable achievement, showcasing XYZ\'s hard work and dedication in a highly competitive selection process. TCS is known for its rigorous recruitment, making this accomplishment even more commendable.', 'XYZ has consistently excelled in academics, demonstrating strong skills in [specific skills or subjects relevant to the job]. Additionally, they played a key role in [mention any relevant projects, internships, or extracurricular activities], further preparing them for this opportunity.', '“XYZ has shown exceptional commitment and passion throughout their journey at Wadia College. This placement is a testament to their hard work,” said [Faculty Member\'s Name], [Faculty Position]. “XYZ expressed, ‘I am thrilled to join TCS and look forward to contributing to such a prestigious company. I am grateful for the support from my professors and peers.’”', '2024-10-15 11:58:10');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `tenure` varchar(255) NOT NULL,
  `fees` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `info` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `category`, `section`, `tenure`, `fees`, `created_at`, `info`) VALUES
(12, 'Std. XI', 'Junior College', 'Grant', '1 Year', '25,000', '2024-10-14 17:54:21', 'Standard 11 in the commerce field focuses on foundational subjects like Accountancy, Business Studies, Economics, and Mathematics, preparing students for higher education in commerce and related fields.'),
(13, 'Std. XII', 'Junior College', 'Non Grant', '1 Year', '35,000', '2024-10-14 17:55:53', 'Standard 12 in the commerce field emphasizes advanced concepts in Accountancy, Business Studies, Economics, and Mathematics, equipping students for university studies and careers in business, finance, and economics.'),
(14, 'Bachelor Of Commerce', 'Undergraduate', 'Grant', '3 Years', '40,000', '2024-10-14 17:59:35', ' A Bachelor of Commerce (B.Com) is an undergraduate degree focusing on business, finance, accounting, and economics, preparing students for various careers in commerce, management, and entrepreneurship.'),
(22, 'Bachelor of Business Administration', 'Undergraduate', 'Grant', '3 Years', '50,000', '2024-10-15 13:02:57', ' A Bachelor of Business Administration (BBA) is an undergraduate degree focused on business principles, management skills, and entrepreneurship, preparing graduates for diverse roles in the business world.'),
(23, 'Bachelor of Business Administration in International Business', 'Undergraduate', 'Non Grant', '3 Years', '60,000', '2024-10-15 13:04:00', 'A Bachelor of Business Administration in International Business (BBA-IB) focuses on global business practices, trade, and cultural dynamics, preparing graduates for careers in international markets and multinational corporations.'),
(24, 'Bachelor of Business Administration Computer Application', 'Undergraduate', 'Non Grant', '3 Years', '75,000', '2024-10-15 13:04:49', ' A Bachelor of Business Administration in Computer Applications (BBA-CA) combines business management with computer technology, equipping students with skills in software development, IT management, and digital solutions for businesses.'),
(25, 'Bachelor of Administration Retail Operation', 'Undergraduate', 'Non Grant', '3 Years', '55,000', '2024-10-15 13:06:46', 'A Bachelor of Business Administration in Retail Operations (BBA-RO) focuses on retail management, sales strategies, and consumer behavior, preparing students for careers in the dynamic retail industry.'),
(26, 'Bachelor of Vocation', 'Undergraduate', 'Non Grant', '3 Years', '65,000', '2024-10-15 13:07:34', 'A Bachelor of Vocation (B.Voc) is a degree focused on skill-based education, combining academic knowledge with practical training in various fields, preparing students for specific careers and industries.'),
(27, 'Master of Commerce', 'Postgraduate', 'Non Grant', '2 Years', '90,000', '2024-10-15 13:09:14', 'A Master of Commerce (M.Com) is a postgraduate degree focusing on advanced topics in commerce, finance, accounting, and economics, equipping graduates for careers in business, research, and academia.'),
(29, 'Doctor of Philosophy', 'Postgraduate', 'Non Grant', '3 Years', '1,00,000', '2024-10-15 13:11:21', 'A Ph.D. (Doctor of Philosophy) is the highest academic degree, involving extensive research, dissertation work, and mastery of a specific field, preparing graduates for careers in academia, research, or specialized industry roles.');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `venue` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `audience` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `event_date`, `event_time`, `venue`, `description`, `created_at`, `audience`) VALUES
(5, 'INFINITY', '2024-12-23', '10:00:00', 'Wadia College', 'jkghioh', '2024-10-15 13:33:59', 'All Students of Ness Wadia College'),
(6, 'Bollywood Day', '2024-12-12', '11:00:00', 'BBA Seminar HAll', 'Bollywood Day is an exciting and vibrant celebration dedicated to the rich tapestry of Indian cinema, particularly the Hindi film industry known as Bollywood. This event showcases the colorful and dynamic essence of Bollywood, encompassing its music, dance, fashion, and storytelling.', '2024-10-15 19:43:58', 'Only for BBA and BCA Students (all batch)');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `designation` text DEFAULT NULL,
  `department` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`, `designation`, `department`, `image`, `created_at`) VALUES
(9, 'Prof.Dr. Vrishali S. Randhir', 'Head – Deptment of Business Administrator', 'Deptment of Business Administrator', '670ec2aed5aaa.png', '2024-10-15 19:29:50'),
(10, 'Prof. Dr. Prakash Chaudhary ', 'Vice Principal', ' Head – Deptment of Law', '670ec2cf03aa8.png', '2024-10-15 19:30:23'),
(11, 'Dr. Mahendra Agale ', 'Head Department of', ' Business Economics', '670ec32394aba.png', '2024-10-15 19:31:47'),
(12, 'Dr.Manohar Sanap', ' Professor & Head Department of Accountancy', 'Accountancy', '670ec33d6f6e3.png', '2024-10-15 19:32:13'),
(13, 'Dr. Ravindra Mhasade', ' Head Department of English', 'English', '670ec356bb061.png', '2024-10-15 19:32:38'),
(14, 'Dr. Ramdas Sonawane  ', 'Associate Professor Head Department of Mathematics and Statistics', 'Mathematics and Statistics', '670ec36e09502.png', '2024-10-15 19:33:02'),
(15, 'Mr. ManojKumar Thakur ', 'Head Librarian', 'Librarian', '670ec38633ddd.png', '2024-10-15 19:33:26'),
(16, 'Dr. Laxman Baisane ', 'Department of Banking Finance & Insurance', 'Banking Finance & Insurance', '670ec39db859f.png', '2024-10-15 19:33:49'),
(17, 'DR DEEPA K DANI ', 'Head – Dept of BBA BBA-IB', ' BBA BBA-IB', '670ec3c35e93f.png', '2024-10-15 19:34:27'),
(18, 'Prof. Seema V. Purandare ', 'Department of BBACA', 'BBACA', '670ec3dc7bfa9.png', '2024-10-15 19:34:52'),
(19, 'Prof. Ashwini Waghmare ', 'Assistant Professor', 'BBACA', '670ec3f69e525.png', '2024-10-15 19:35:18'),
(20, 'MRS. VAISHALI CHILWAR ', ' Assistant Professor', 'BBACA', '670ec412ebcf6.png', '2024-10-15 19:35:46'),
(21, 'MRS. LEENA THORAT  ', 'Assistant Professor', 'BBACA', '670ec42a948fb.png', '2024-10-15 19:36:10');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `title`, `description`, `created_at`) VALUES
(7, 'Examination Schedule Released', 'The examination schedule for the upcoming semester has been released. Please check the \"Examinations\" section on the website for detailed dates and timings. Ensure you prepare accordingly!', '2024-10-15 13:27:57'),
(8, 'Guest Lecture Series', 'We are excited to announce a Guest Lecture Series featuring industry experts starting next week. Join us every Wednesday at 3 PM in the Main Auditorium to gain insights into various fields.', '2024-10-15 13:28:21'),
(9, 'Upcoming College Festival', 'The Annual College Festival is scheduled for November 20-22. Join us for three days of cultural events, workshops, and competitions. All students are encouraged to participate and showcase their talents!', '2024-10-15 13:28:40'),
(10, 'Internship Opportunities', 'Internship opportunities are now available for students across all departments. Interested students should check the \"Career Services\" section for details on how to apply and deadlines. Don’t miss out!', '2024-10-15 13:28:59'),
(11, 'Project Evaluation for BCA Semester 5 Students', 'Dear Students,\r\n\r\nThis is to formally inform all BCA Semester 5 students that the project evaluation will take place on October 16, 2024. It is imperative that each of you be present at the scheduled time to showcase your hard work and dedication.\r\n\r\nThe project evaluation is a significant component of your academic journey, providing an opportunity for you to present your projects to the faculty and receive constructive feedback. This is a chance not only to demonstrate your skills and knowledge acquired throughout the semester but also to engage with your peers and faculty in a professional setting.\r\n\r\nPlease ensure that you come prepared with all necessary materials and any supporting documentation that may enhance your presentation. Punctuality is essential, so kindly arrive at least 15 minutes early to settle in before the evaluations begin.\r\n\r\nWe look forward to your participation and wish you the best of luck in your presentations.\r\n\r\nThank you.', '2024-10-15 19:40:47');

-- --------------------------------------------------------

--
-- Table structure for table `placements`
--

CREATE TABLE `placements` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `job_profile` text NOT NULL,
  `salary` decimal(15,2) NOT NULL,
  `date` date NOT NULL,
  `ssc_result` decimal(5,2) NOT NULL,
  `hsc_result` decimal(5,2) NOT NULL,
  `graduation` decimal(5,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `placements`
--

INSERT INTO `placements` (`id`, `title`, `company`, `position`, `job_profile`, `salary`, `date`, `ssc_result`, `hsc_result`, `graduation`, `created_at`) VALUES
(1, 'Recruitment for Web Developer', 'Wipro', 'Frontend Developer', 'A front-end developer is responsible for creating the visual and interactive elements of a website or web application. They work on the client-side, which refers to everything that users experience directly in their web browsers. Front-end development is about making a site not only functional but also aesthetically pleasing and user-friendly.', 700000.00, '2024-04-02', 70.00, 70.00, 7.00, '2024-10-15 21:31:47');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `instructions` text DEFAULT NULL,
  `contact_info` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`id`, `title`, `location`, `instructions`, `contact_info`, `created_at`) VALUES
(1, 'BCA External Exam [SEM-5]', '305 and 304', 'Arrive at least 15 minutes early.\r\nBring necessary materials (e.g., pens, ID).\r\nSilence all electronic devices.\r\nFollow all instructions from the invigilator.\r\nStay seated until dismissed.', 'For any queries regarding the exam Contact SP- 8756321254 ', '2024-10-14 22:35:07'),
(2, 'external exam', 'Wadia College', 'hgifiyftyfyu', 'For any queries regarding the exam Contact SP- 8756321254 ', '2024-10-15 11:25:59');

-- --------------------------------------------------------

--
-- Table structure for table `timetable_subjects`
--

CREATE TABLE `timetable_subjects` (
  `id` int(11) NOT NULL,
  `timetable_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `exam_date` date NOT NULL,
  `exam_time` time NOT NULL,
  `duration` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timetable_subjects`
--

INSERT INTO `timetable_subjects` (`id`, `timetable_id`, `subject`, `exam_date`, `exam_time`, `duration`) VALUES
(1, 1, 'Java', '2024-11-15', '11:00:00', '3 Hrs'),
(2, 1, 'Python', '2024-11-16', '11:00:00', '3 Hrs'),
(3, 1, 'OOSE', '2024-11-17', '11:00:00', '3 Hrs'),
(4, 1, 'Cyber Security', '2024-11-18', '11:00:00', '3 Hrs'),
(5, 2, 'Java', '2024-12-12', '11:00:00', '3 Hrs'),
(6, 2, 'Java', '2024-12-12', '11:00:00', '3 Hrs');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `placements`
--
ALTER TABLE `placements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetable_subjects`
--
ALTER TABLE `timetable_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `timetable_id` (`timetable_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `placements`
--
ALTER TABLE `placements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `timetable_subjects`
--
ALTER TABLE `timetable_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `timetable_subjects`
--
ALTER TABLE `timetable_subjects`
  ADD CONSTRAINT `timetable_subjects_ibfk_1` FOREIGN KEY (`timetable_id`) REFERENCES `timetable` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
