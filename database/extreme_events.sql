-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2019 at 02:13 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `extreme_events`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `ad_id` int(11) NOT NULL,
  `ad_caption` varchar(255) DEFAULT NULL,
  `ad_image` varchar(45) DEFAULT NULL,
  `ad_featured` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`ad_id`, `ad_caption`, `ad_image`, `ad_featured`) VALUES
(1, NULL, 'ad01.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(25) NOT NULL,
  `cat_sorter` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_sorter`) VALUES
(1, 'WATER', '01'),
(2, 'GROUND', '02'),
(3, 'MOTOR', '03'),
(4, 'AIR', '04');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(30) DEFAULT NULL,
  `c_email` varchar(30) NOT NULL,
  `c_phone` varchar(20) NOT NULL,
  `c_message` varchar(255) NOT NULL,
  `c_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`c_id`, `c_name`, `c_email`, `c_phone`, `c_message`, `c_timestamp`) VALUES
(1, 'Σπύρος Φούντας', 'spyrosfoundas@hotmail.com', '6945889609', 'Geia', '2019-04-07 23:11:46');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `ev_id` int(11) NOT NULL,
  `ev_name` varchar(800) NOT NULL,
  `ev_description` varchar(3000) NOT NULL,
  `ev_startdate` date NOT NULL,
  `ev_enddate` date NOT NULL,
  `ev_place` varchar(60) NOT NULL,
  `ev_published` tinyint(2) NOT NULL,
  `ev_lat` decimal(25,22) NOT NULL,
  `ev_lon` decimal(25,22) NOT NULL,
  `ev_cost` decimal(5,3) DEFAULT NULL,
  `ev_sorter` varchar(3) NOT NULL,
  `ev_subcat` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`ev_id`, `ev_name`, `ev_description`, `ev_startdate`, `ev_enddate`, `ev_place`, `ev_published`, `ev_lat`, `ev_lon`, `ev_cost`, `ev_sorter`, `ev_subcat`) VALUES
(1, 'Σκι στη Λίμνη Πλαστήρα', 'Σκι στη Λίμνη Πλαστήρα', '2018-06-15', '2018-06-17', 'Λίμνη Πλαστήρα1', 1, '39.3013619999999900000000', '21.7529299999999920000000', '99.999', '01', 2),
(20, 'Kite στον Αη Γιάννη', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed finibus condimentum ante, vel elementum tellus pharetra at. Nulla facilisi. Duis quis molestie arcu, eget imperdiet erat. Aenean leo lacus, dictum non sapien quis, congue malesuada urna. Praesent at tincidunt neque, eget tincidunt dolor. Suspendisse potenti. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.\r\n\r\nPellentesque eget augue commodo, commodo libero posuere, blandit lorem. Vivamus id dui sit amet ex pellentesque sagittis ullamcorper et nunc. Morbi scelerisque rutrum augue quis malesuada. Proin sollicitudin ut orci et rhoncus. Duis sollicitudin dui accumsan purus porta facilisis. Praesent tincidunt congue ligula vel dignissim. Pellentesque ut ligula eu ex accumsan luctus eu vitae nunc. Sed cursus elit et risus cursus fringilla sed aliquet erat.', '2018-05-25', '2018-05-27', 'Λευκάδα', 1, '32.0000000000000000000000', '23.0000000000000000000000', '99.999', '03', 8),
(21, 'Jet ski ατο Τολό', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed finibus condimentum ante, vel elementum tellus pharetra at. Nulla facilisi. Duis quis molestie arcu, eget imperdiet erat. Aenean leo lacus, dictum non sapien quis, congue malesuada urna. Praesent at tincidunt neque, eget tincidunt dolor. Suspendisse potenti. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.\r\n\r\nPellentesque eget augue commodo, commodo libero posuere, blandit lorem. Vivamus id dui sit amet ex pellentesque sagittis ullamcorper et nunc. Morbi scelerisque rutrum augue quis malesuada. Proin sollicitudin ut orci et rhoncus. Duis sollicitudin dui accumsan purus porta facilisis. Praesent tincidunt congue ligula vel dignissim. Pellentesque ut ligula eu ex accumsan luctus eu vitae nunc. Sed cursus elit et risus cursus fringilla sed aliquet erat.', '2018-05-30', '2018-05-31', 'Λευκάδα', 2, '1.0000000000000000000000', '1.0000000000000000000000', '99.999', '03', 8),
(23, 'Κατάδυση στη Λίμνη Βουλιαγμένης', 'Aliquam nulla libero, lobortis quis facilisis a, sodales sed metus. Duis faucibus aliquet sapien, a tristique sapien maximus et. Proin tincidunt sapien vel vehicula suscipit. Aenean vitae bibendum mi. Vivamus at neque diam. Aliquam sapien mi, faucibus sed metus non, tempor ornare turpis. Ut egestas nisl a augue egestas, sit amet sodales leo feugiat. Integer dignissim nulla tellus, bibendum rutrum turpis iaculis ac. Maecenas ullamcorper sollicitudin elementum. Aliquam faucibus pharetra odio, et tempus nisl semper ac. Sed non interdum magna. Vivamus non elit eleifend ante blandit euismod ac ut augue.', '2018-06-30', '2018-06-30', 'Λίμνη Βουλιαγμένης', 2, '4.0000000000000000000000', '4.0000000000000000000000', '99.999', '04', 9),
(24, 'Κανόε στον Αχελώο', 'Κανόε στις πηγές του Αχελώου στην Ευρυτανία', '2018-07-29', '2018-07-30', 'Καρπενήσι', 1, '38.9410853000000000000000', '21.4580550000000000000000', '99.999', '03', 2),
(25, 'Κανόε στον Αχελώο', 'Κανόε στις πηγές του Αχελώου στην Ευρυτανία', '2018-07-29', '2018-07-30', 'Καρπενήσι', 1, '38.9410853000000000000000', '21.4580550000000000000000', '99.999', '03', 1),
(27, 'Κατάδυση στο Τολό', 'Περιήγηση στον αρχαιολογικό υποθαλάσσιο χώρο στο Τολό', '2018-07-28', '2018-07-29', 'Τολό Αργολίδας', 1, '37.5205850000000040000000', '22.8590299999999600000000', '90.000', '05', 9),
(28, 'Κανόε στον Άραχθο', 'Κανό στον ποταμό Άραχθο', '2018-07-07', '2018-07-08', 'Άρτα', 1, '37.5205850000000040000000', '22.8590299999999600000000', '99.999', '01', 1),
(29, 'Κανόε στον Άραχθο', 'Κανό στον ποταμό Άραχθο', '2018-07-07', '2018-07-08', 'Άρτα', 1, '37.5205850000000040000000', '22.8590299999999600000000', '99.999', '01', 1),
(30, 'Κανόε στον Άραχθο', 'Κανό στον ποταμό Άραχθο', '2018-07-07', '2018-07-08', 'Άρτα', 1, '37.5205850000000040000000', '22.8590299999999600000000', '99.999', '01', 1),
(31, 'Kite στην Κεφαλλονιά', 'Πάμε Κεφαλλονιά για απίθανο kite σε μοναδική παραλία', '2018-10-08', '2018-10-10', 'Κεφαλλονιά', 1, '38.1767220000000100000000', '20.4916049999999360000000', '99.999', '01', 8),
(32, 'Kite στην Κεφαλλονιά', 'Πάμε Κεφαλλονιά για απίθανο kite σε μοναδική παραλία', '2018-10-08', '2018-10-10', 'Κεφαλλονιά', 1, '38.1767220000000100000000', '20.4916049999999360000000', '99.999', '', 8),
(33, 'Kite στην Κεφαλλονιά', 'Πάμε Κεφαλλονιά για απίθανο kite σε μοναδική παραλία', '2018-10-08', '2018-10-10', 'Κεφαλλονιά', 1, '38.1767220000000100000000', '20.4916049999999360000000', '99.999', '', 8),
(35, 'Ορειβασία στο Βελούχι', 'Αναρρίχηση στον κορυφή του Βελουχίου', '2018-10-15', '2018-10-17', 'Καρμεπνήσι', 1, '38.1767220000000100000000', '20.4916049999999360000000', '99.999', '01', 4),
(36, 'Κωπηλασία στις πηγές του Αχελώου', 'Ένα τριήμερο στις πηγές του Αχελώου, βα δαμάσουμε τους ορμητικούς παραπόταμους.', '2018-11-16', '2018-11-18', 'Ευρυτανία', 1, '38.1767220000000100000000', '20.4916049999999360000000', '99.999', '02', 2),
(37, 'Κωπηλασία στις πηγές του Αχελώου', 'Ένα τριήμερο στις πηγές του Αχελώου, βα δαμάσουμε τους ορμητικούς παραπόταμους.', '2018-11-16', '2018-11-18', 'Ευρυτανία', 1, '38.1767220000000100000000', '20.4916049999999360000000', '99.999', '02', 2),
(38, 'Κωπηλασία στις πηγές του Αχελώου', 'Ένα τριήμερο στις πηγές του Αχελώου, βα δαμάσουμε τους ορμητικούς παραπόταμους.', '2018-11-16', '2018-11-18', 'Ευρυτανία', 1, '38.1767220000000100000000', '20.4916049999999360000000', '99.999', '02', 2),
(39, 'Κωπηλασία στις πηγές του Αχελώου', 'Ένα τριήμερο στις πηγές του Αχελώου, βα δαμάσουμε τους ορμητικούς παραπόταμους.', '2018-11-16', '2018-11-18', 'Ευρυτανία', 1, '38.1767220000000100000000', '20.4916049999999360000000', '99.999', '02', 2),
(40, 'Κωπηλασία στις πηγές του Αχελώου', 'Ένα τριήμερο στις πηγές του Αχελώου, βα δαμάσουμε τους ορμητικούς παραπόταμους.', '2018-11-16', '2018-11-18', 'Ευρυτανία', 1, '38.1767220000000100000000', '20.4916049999999360000000', '99.999', '02', 2),
(41, 'Κωπηλασία στις πηγές του Αώου', 'Στον Αώο', '2018-11-16', '2018-11-18', 'Αώος', 1, '38.1767220000000100000000', '20.4916049999999360000000', '99.999', '03', 2),
(42, 'Κωπηλασία στις πηγές του Αώου', 'Αώος', '2018-11-23', '2018-11-25', 'Αώος', 1, '38.1767220000000100000000', '20.4916049999999360000000', '99.999', '04', 2),
(43, 'Κωπηλασία στις πηγές του Αώου', 'Αώος', '2018-11-23', '2018-11-25', 'Αώος', 1, '38.1767220000000100000000', '20.4916049999999360000000', '99.999', '04', 2),
(44, 'Κωπηλασία στις πηγές του Αώου', 'ΑΑΑΑ', '2018-11-01', '2018-11-08', 'Αώος', 1, '38.1767220000000100000000', '20.4916049999999360000000', '99.999', '04', 2),
(45, 'Kite στην Κεφαλλονιά', 'aaaaaaaaa', '2018-11-01', '2018-11-10', 'Κεφαλλονιά', 1, '38.1767220000000100000000', '20.4916049999999360000000', '99.999', '', 2),
(46, 'Kite στην Κεφαλλονιά', 'aaaaaaaaa', '2018-11-01', '2018-11-10', 'Κεφαλλονιά', 1, '38.1767220000000100000000', '20.4916049999999360000000', '99.999', '', 2),
(47, 'Kite στην Κεφαλλονιά', 'aaaaaaaaa', '2018-11-01', '2018-11-10', 'Κεφαλλονιά', 1, '38.1767220000000100000000', '20.4916049999999360000000', '99.999', '', 2),
(48, 'Ορειβασία στο Βελούχι', 'XX', '2018-11-01', '2018-11-14', 'Καρμεπνήσι', 1, '38.1767220000000100000000', '20.4916049999999360000000', '99.999', '04', 2),
(49, 'Ορειβασία στο Βελούχι', 'XX', '2018-11-01', '2018-11-14', 'Καρμεπνήσι', 1, '38.1767220000000100000000', '20.4916049999999360000000', '99.999', '04', 2),
(50, 'Ορειβασία στο Βελούχι', 'XX', '2018-11-01', '2018-11-14', 'Καρμεπνήσι', 1, '38.1767220000000100000000', '20.4916049999999360000000', '99.999', '04', 2),
(51, 'Ορειβασία στο Βελούχι', 'XX', '2018-11-01', '2018-11-14', 'Καρμεπνήσι', 1, '38.1767220000000100000000', '20.4916049999999360000000', '99.999', '04', 2),
(52, 'E1', 'P1', '2018-11-24', '2018-11-25', 'T1', 1, '38.1767220000000100000000', '20.4916049999999360000000', '99.999', '', 2),
(53, 'Σκι όπου να ναι', 'Σκι όπου να ναιΣκι στη Λίμνη Πλαστήρα', '2018-11-15', '2018-11-17', 'Λίμνη όπου να ναι', 1, '39.3013619999999900000000', '21.7529299999999920000000', '99.999', '01', 2),
(54, 'Canoe', 'Canoe canoe', '2019-04-18', '2019-04-27', 'Εδώ', 1, '23.1111110000000000000000', '26.2222200000000000000000', '99.999', '01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `event_photos`
--

CREATE TABLE `event_photos` (
  `ph_id` int(11) NOT NULL,
  `ph_ev_id` int(11) NOT NULL,
  `ph_photofile` varchar(255) NOT NULL,
  `ph_photocaption` varchar(255) DEFAULT NULL,
  `ph_photosorter` varchar(3) NOT NULL,
  `ph_featured` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_photos`
--

INSERT INTO `event_photos` (`ph_id`, `ph_ev_id`, `ph_photofile`, `ph_photocaption`, `ph_photosorter`, `ph_featured`) VALUES
(1, 1, 'aoos01.jpg', 'Μαγεία', '01', b'1'),
(2, 27, 'scuba01.jpg', 'Υποβρύχιος αρχαιολογικός χώρος στο Τολό', '01', b'1'),
(3, 35, 'Velouxi01.jpg', 'Αναρρίχηση στο Βελούχι', '01', b'1'),
(4, 53, 'aoos01.jpg', 'Μαγεία', '01', b'1'),
(5, 36, 'aoos01.jpg', 'Μαγεία', '01', b'1'),
(6, 24, 'aoos01.jpg', 'Μαγεία', '01', b'1'),
(7, 45, 'aoos01.jpg', 'Μαγεία', '01', b'1'),
(8, 52, 'kite01.JPG', 'Kite', '01', b'1'),
(9, 54, 'aoos02.jpg', 'Canoe', '01', b'1'),
(11, 54, 'aoos01.jpg', 'Canoe', '01', b'1'),
(16, 54, 'scuba01.jpg', 'Canoe', '', b'1'),
(17, 54, 'aoos03.jpg', 'Canoe', '01', b'1'),
(19, 54, '91.jpg', 'Canoe', '', b'1'),
(22, 54, '08.jpg', 'Canoe', '', b'1'),
(24, 54, '54.jpg', 'Canoe', '', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `event_schedule`
--

CREATE TABLE `event_schedule` (
  `sch_id` int(11) NOT NULL,
  `sch_ev_id` int(11) NOT NULL,
  `sch_start_date` date DEFAULT NULL,
  `sch_start_time` time DEFAULT NULL,
  `sch_end_date` date DEFAULT NULL,
  `sch_end_time` time DEFAULT NULL,
  `sch_activity_descr` tinytext,
  `sch_activity_lat` decimal(25,22) DEFAULT NULL,
  `sch_activity_lon` decimal(25,22) DEFAULT NULL,
  `sch_sorter` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pub_status`
--

CREATE TABLE `pub_status` (
  `ps_id` int(11) NOT NULL,
  `ps_name` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pub_status`
--

INSERT INTO `pub_status` (`ps_id`, `ps_name`) VALUES
(1, 'Δημοσιεύτηκε'),
(2, 'Σε αναμονή'),
(0, 'Σε επεξεργασία');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `scat_id` int(11) NOT NULL,
  `scat_cat_id` int(11) NOT NULL,
  `scat_name` varchar(25) NOT NULL,
  `scat_active` int(11) DEFAULT '1',
  `scat_sorter` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`scat_id`, `scat_cat_id`, `scat_name`, `scat_active`, `scat_sorter`) VALUES
(1, 1, 'CanoeKayak', 1, '01'),
(2, 1, 'Κωπηλασία', 1, '02'),
(3, 1, 'Jet ski', 1, '03'),
(4, 2, 'Ορειβασία', 1, '01'),
(5, 2, 'Mountain bike', 1, '02'),
(6, 3, 'Dragster', 1, '01'),
(7, 3, 'Πίστα', 1, '02'),
(8, 4, 'Kite surf', 1, '01'),
(9, 4, 'Καταδύσεις', 1, '02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usr_id` int(11) NOT NULL,
  `usr_lastname` varchar(20) NOT NULL,
  `usr_firstname` varchar(20) NOT NULL,
  `usr_email` varchar(45) NOT NULL,
  `usr_mobile` varchar(15) DEFAULT NULL,
  `usr_phone` varchar(15) DEFAULT NULL,
  `usr_com_channel` tinyint(4) DEFAULT NULL,
  `usr_sex` tinyint(4) DEFAULT NULL,
  `usr_birthday` date DEFAULT NULL,
  `usr_photo` varchar(45) DEFAULT NULL,
  `usr_username` varchar(45) NOT NULL,
  `usr_password` varchar(15) NOT NULL,
  `usr_active` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usr_id`, `usr_lastname`, `usr_firstname`, `usr_email`, `usr_mobile`, `usr_phone`, `usr_com_channel`, `usr_sex`, `usr_birthday`, `usr_photo`, `usr_username`, `usr_password`, `usr_active`) VALUES
(1, 'Μιχάλης', 'Θοδωρής', 'tm@gmail1.com', '+306949456839', '', 1, 1, '0000-00-00', '', 'tm', '1', b'1'),
(2, 'Λαχανά', 'Δανάη', 'danahcal@hotmail.com', '6945889609', '', 2, 2, '0000-00-00', '', 'danahcal', '1', b'1'),
(3, 'Καφάσης', 'Θωμάς', 'tom@tom.gr', '6945889609', '', 1, 1, '0000-00-00', '', 'tk', '1', b'1'),
(4, 'Φούντας', 'Σπύρος', 'spyrosfoundas@hotmail.com', '6945889609', '', 1, 1, '0000-00-00', '', 'spyrosf', '11091968', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `user_prefs`
--

CREATE TABLE `user_prefs` (
  `usr_id` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_prefs`
--

INSERT INTO `user_prefs` (`usr_id`, `sub_cat_id`) VALUES
(1, 2),
(2, 2),
(3, 3),
(3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `user_ratings`
--

CREATE TABLE `user_ratings` (
  `usr_id` int(11) NOT NULL,
  `ev_id` int(11) NOT NULL,
  `comments` tinytext,
  `rate` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_ratings`
--

INSERT INTO `user_ratings` (`usr_id`, `ev_id`, `comments`, `rate`) VALUES
(1, 25, '', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`ev_id`);

--
-- Indexes for table `event_photos`
--
ALTER TABLE `event_photos`
  ADD PRIMARY KEY (`ph_id`);

--
-- Indexes for table `event_schedule`
--
ALTER TABLE `event_schedule`
  ADD PRIMARY KEY (`sch_id`);

--
-- Indexes for table `pub_status`
--
ALTER TABLE `pub_status`
  ADD PRIMARY KEY (`ps_id`),
  ADD UNIQUE KEY `ps_name_UNIQUE` (`ps_name`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`scat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usr_id`),
  ADD UNIQUE KEY `usr_username_UNIQUE` (`usr_username`);

--
-- Indexes for table `user_prefs`
--
ALTER TABLE `user_prefs`
  ADD PRIMARY KEY (`usr_id`,`sub_cat_id`);

--
-- Indexes for table `user_ratings`
--
ALTER TABLE `user_ratings`
  ADD PRIMARY KEY (`usr_id`,`ev_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `ev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `event_photos`
--
ALTER TABLE `event_photos`
  MODIFY `ph_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `event_schedule`
--
ALTER TABLE `event_schedule`
  MODIFY `sch_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `scat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
