-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2018 at 05:20 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE IF NOT EXISTS `author` (
`id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `name`) VALUES
(17, 'Ivan bayross'),
(16, 'Balagurusamy E'),
(15, 'C J Date'),
(19, 'Abraham Silberschatz Henry Korth S.Sudarshan'),
(20, 'Jean-paul Tramblay Paul G.Sorenson'),
(21, 'Ten Baum'),
(22, 'Horowitz Sahni'),
(23, 'Satraj Sahani'),
(24, 'Andrew S.Tanenbaum'),
(25, 'William Stallings'),
(26, 'D.M.Dhamdhare');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id` varchar(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `author` varchar(150) NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `edition` varchar(50) NOT NULL,
  `volume` varchar(10) NOT NULL,
  `supplier` varchar(150) NOT NULL,
  `booktype` varchar(80) NOT NULL,
  `category` varchar(200) NOT NULL,
  `page` varchar(50) NOT NULL,
  `price` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `title`, `author`, `publisher`, `edition`, `volume`, `supplier`, `booktype`, `category`, `page`, `price`) VALUES
('BVMIT/DEPTLIB/4-1', 'Database', 'Abraham Silberschatz Henry Korth S.Sudarshan', 'TMH', '3', '1', 'RK Books', 'Reference', '', '890', 495),
('BVMIT/DEPTLIB/3-2', 'Database', 'C J Date', 'Addition Wesley', '2', '1', 'Mahajan Book Depot', 'Reference', '', '450', 800),
('BVMIT/DEPTLIB/3-1', 'Database', 'C J Date', 'Addition Wesley', '2', '1', 'Mahajan Book Depot', 'Reference', '', '450', 800),
('BVMIT/DEPTLIB/2-2', 'Programming', 'Balagurusamy E', 'TMH', '3', '1', 'RK Books', 'Reference', '', '540', 300),
('BVMIT/DEPTLIB/2-1', 'Programming', 'Balagurusamy E', 'TMH', '3', '1', 'RK Books', 'Reference', '', '540', 300),
('BVMIT/DEPTLIB/1-2', 'Programming', 'Balagurusamy E', 'TMH', '4', '1', 'RK Books', 'Reference', '', '440', 312),
('BVMIT/DEPTLIB/1-1', 'Programming', 'Balagurusamy E', 'TMH', '4', '1', 'RK Books', 'Reference', '', '440', 312),
('BVMIT/DEPTLIB/4-2', 'Database', 'Abraham Silberschatz Henry Korth S.Sudarshan', 'TMH', '3', '1', 'RK Books', 'Reference', '', '890', 495),
('BVMIT/DEPTLIB/5-1', 'Database', 'Ivan bayross', 'BPB', '7', '1', 'Rajan Book House', 'Reference', '', '120', 70),
('BVMIT/DEPTLIB/5-2', 'Database', 'Ivan bayross', 'BPB', '7', '1', 'Rajan Book House', 'Reference', '', '120', 70),
('BVMIT/DEPTLIB/6-1', 'Data Structure', 'Jean-paul Tramblay Paul G.Sorenson', 'TMH', '3', '1', 'RK Books', 'Reference', '', '750', 400),
('BVMIT/DEPTLIB/6-2', 'Data Structure', 'Jean-paul Tramblay Paul G.Sorenson', 'TMH', '3', '1', 'RK Books', 'Reference', '', '750', 400),
('BVMIT/DEPTLIB/7-1', 'Data Structure', 'Ten Baum', 'Prentice Hall', '2', '1', 'Sanat Prakshan', 'Reference', '', '200', 150),
('BVMIT/DEPTLIB/7-2', 'Data Structure', 'Ten Baum', 'Prentice Hall', '2', '1', 'Sanat Prakshan', 'Reference', '', '200', 150),
('BVMIT/DEPTLIB/8-1', 'Algorithm', 'Horowitz Sahni', 'Galgotia Publisher', '1', '1', 'SS Books', 'Reference', '', '474', 255),
('BVMIT/DEPTLIB/8-2', 'Algorithm', 'Horowitz Sahni', 'Galgotia Publisher', '1', '1', 'SS Books', 'Reference', '', '474', 255),
('BVMIT/DEPTLIB/9-1', 'Data Structure', 'Satraj Sahani', 'Galgotia Publisher', '5', '1', 'SS Books', 'Reference', '', '135', 56),
('BVMIT/DEPTLIB/10-1', 'Operating System', 'Andrew S.Tanenbaum', 'PHI', '3', '1', 'Rajan Book House', 'Reference', '', '777', 545),
('BVMIT/DEPTLIB/10-2', 'Operating System', 'Andrew S.Tanenbaum', 'PHI', '3', '1', 'Rajan Book House', 'Reference', '', '777', 545),
('BVMIT/DEPTLIB/11-1  ', 'Operating System', 'William Stallings', 'PHI', '2', '1', 'SS Books', 'Reference', '', '331', 120),
('BVMIT/DEPTLIB/12-1', 'Operating System', 'D.M.Dhamdhare', 'Pearson', '2', '1', 'SS Books', 'Reference', '', '255', 111),
('BVMIT/DEPTLIB/12-2', 'Operating System', 'D.M.Dhamdhare', 'Pearson', '2', '1', 'SS Books', 'Reference', '', '255', 111);

-- --------------------------------------------------------

--
-- Table structure for table `bookissue`
--

CREATE TABLE IF NOT EXISTS `bookissue` (
`id` int(11) NOT NULL,
  `bookid` varchar(30) DEFAULT NULL,
  `userid` varchar(50) DEFAULT NULL,
  `issueDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `returnDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `returnStatus` int(1) NOT NULL,
  `fine` int(11) DEFAULT NULL,
  `count` int(2) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookissue`
--

INSERT INTO `bookissue` (`id`, `bookid`, `userid`, `issueDate`, `returnDate`, `returnStatus`, `fine`, `count`) VALUES
(59, 'BVMIT/DEPTLIB/10-1', '15IT027', '2018-10-29 06:11:16', '2018-11-14 08:51:46', 1, 0, 0),
(60, 'BVMIT/DEPTLIB/12-2', '15IT033', '2018-10-29 06:11:43', NULL, 1, 0, 1),
(61, 'BVMIT/DEPTLIB/7-2', '15IT036', '2018-10-29 06:12:01', '2018-10-29 04:55:04', 1, 10, 0),
(62, 'BVMIT/DEPTLIB/6-2', '15IT071', '2018-10-29 06:12:21', NULL, 1, 10, 1),
(54, 'BVMIT/DEPTLIB/4-1', 'T001', '2018-10-29 06:09:31', NULL, 0, NULL, 2),
(55, 'BVMIT/DEPTLIB/3-1', 'T002', '2018-10-29 06:09:44', NULL, 0, NULL, 1),
(56, 'BVMIT/DEPTLIB/6-1', 'T001', '2018-10-29 06:10:04', NULL, 0, NULL, 2),
(57, 'BVMIT/DEPTLIB/7-1', 'T003', '2018-10-29 06:10:17', NULL, 0, NULL, 1),
(58, 'BVMIT/DEPTLIB/8-2', 'T004', '2018-10-29 06:10:44', NULL, 0, NULL, 1),
(63, 'BVMIT/DEPTLIB/8-1', '15IT071', '2018-11-29 08:33:27', '2018-11-29 04:05:25', 1, 0, 0),
(64, 'BVMIT/DEPTLIB/8-1', '15IT033', '2018-11-29 08:36:16', NULL, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `booktype`
--

CREATE TABLE IF NOT EXISTS `booktype` (
`id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booktype`
--

INSERT INTO `booktype` (`id`, `name`) VALUES
(1, 'Journal'),
(2, 'Ebook'),
(3, 'Magazine'),
(4, 'Reference'),
(5, 'News Letter'),
(6, 'Report'),
(7, 'Complimentary');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Programming'),
(2, 'Android'),
(3, 'Web Development'),
(4, 'Database'),
(5, 'Data Structure'),
(6, 'Algorithm'),
(7, 'Operating System');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `f_id` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`f_id`, `name`, `email`, `mobile`) VALUES
('T001', 'Chintan Mahant', 'chintan.mahant@bvmengineering.ac.in', '9998990203'),
('T002', 'Keyur Brahmbhatt', 'keyur.brahmbhatt@bvmengineering.ac.in', '9998990202'),
('T003', 'Vishal Polara', 'vishal.polara@bvmengineering.ac.in', '9429368182'),
('T004', 'Priyank Bhojak', 'priyank.bhojak@bvmengineering.ac.in', '9998990205');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_form`
--

CREATE TABLE IF NOT EXISTS `feedback_form` (
  `id` varchar(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `suggestion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_form`
--

INSERT INTO `feedback_form` (`id`, `title`, `suggestion`) VALUES
('15IT027', 'Programming in c', 'Good Book for beginner in  Programming');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
`srno` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(512) NOT NULL,
  `utype` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`srno`, `username`, `password`, `utype`) VALUES
(1, 'admin', 'admin', 'admin'),
(37, 'superbujas11@gmail.com', 'ujas', 'student'),
(38, 'ravivaniya4911@gmail.com', 'ravi', 'student'),
(39, 'patel00446@gmail.com', 'patel', 'student'),
(40, 'chintan.mahant@bvmengineering.ac.in', 'chintan', 'faculty'),
(41, 'keyur.brahmbhatt@bvmengineering.ac.in', 'keyur', 'faculty'),
(42, 'vishal.polara@bvmengineering.ac.in', 'vishal', 'faculty'),
(43, 'priyank.bhojak@bvmengineering.ac.in', 'priyank', 'faculty'),
(44, 'itsanat000@gmail.com', 'itsanat000@gmail.com', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`id` int(100) NOT NULL,
  `bname` varchar(500) NOT NULL,
  `author` varchar(500) NOT NULL,
  `edition` varchar(500) NOT NULL,
  `publisher` varchar(500) NOT NULL,
  `link` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE IF NOT EXISTS `publisher` (
`id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`id`, `name`) VALUES
(17, 'PHI'),
(16, 'Galgotia Publisher'),
(15, 'Prentice Hall'),
(14, 'BPB'),
(13, 'Addition Wesley'),
(12, 'TMH'),
(18, 'Pearson');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `s_id` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `semester` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `name`, `email`, `mobile`, `address`, `semester`) VALUES
('15IT027', 'Sanat', 'itsanat000@gmail.com', '7984101034', 'Petlad', '8'),
('15IT033', 'Ujas Thummar', 'superbujas11@gmail.com', '7227077051', 'Rajkot', '7'),
('15IT036', 'Ravi Vaniya', 'ravivaniya4911@gmail.com', '8511119526', 'Gondal', '7'),
('15IT071', 'Meet Patel', 'patel00446@gmail.com', '8866800446', 'Nadiad', '7');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
`id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`) VALUES
(2, 'RK Books'),
(3, 'Mahajan Book Depot'),
(4, 'Rajan Book House'),
(5, 'Sanat Prakshan'),
(6, 'SS Books');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookissue`
--
ALTER TABLE `bookissue`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booktype`
--
ALTER TABLE `booktype`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
 ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `bookissue`
--
ALTER TABLE `bookissue`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `booktype`
--
ALTER TABLE `booktype`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
MODIFY `srno` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
