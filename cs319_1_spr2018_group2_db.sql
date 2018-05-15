

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs319_1_spr2018_group2_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `flight_id` int(11) NOT NULL,
  `flight_name` varchar(50) NOT NULL,
  `flight_date` date NOT NULL,
  `flight_capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`flight_id`, `flight_name`, `flight_date`, `flight_capacity`) VALUES
(9, 'Chicago, IL - Toronto, Canada', '2018-05-15', 25),
(10, 'Chicago, IL - Miami, FL', '2018-05-14', 25),
(14, 'Chicago IL, NY', '2018-06-20', 30);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `user_id` int(11) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `email`, `password`) VALUES
(1, 'test_user', 'test@example.com', '$2y$10$IrzYJi10j3Jy/K6jzSLQtOLif1wEZqTRQoK3DcS3jdnFEhL4fWM4G'),
(2, 'admin', 'admin@airways.com', '$2y$10$xFQ4B5mASBMos3CG/Rj7LuR.2rNrXnVbQzYQ9gZpNmBywY6TiIylu'),
(3, 'dickies', 'dickies@meme.com', '$2y$10$9.4YcOxu5bwqPlB8aqAxu.y/bg8AE8yG/HjLwTlAupCVKN1fgQS.6'),
(4, 'smschintgen', 'Stephen60659@gmail.com', '$2y$10$61h1hxaGCvRYWiJ2Q1Nb9.nSoa9xfkEEx5M6SmHEwsxsQaO/Wu8fe'),
(5, 'qwerty', 'qwerty@airways.com', '$2y$10$pTY81Z6vSRElPogq2jikrOaHKKR3f0xatENYr6V0ObPOTHaUSU5ci'),
(6, 'sharpiedabs', 'sharpie@sniffers.com', '$2y$10$D152DWxIz9kYm9WRIUK4BO5c9//HrNmTIE.eS/796BG0ZZ9zzBcKe'),
(7, 'gchokhon', 'g_chokhonelidze@yahoo.com', '$2y$10$73PejV3wmZetPT7h8Anxp.kgbxPw1NxI6N5WrFdHnJBewd98yA726'),
(8, 'gg', 'gc@ggg.com', '$2y$10$5Z4xS54iKb3TEx1lX9PvLuf52JA.s7SmKkBzyj4ObWRtD0AertLpq'),
(9, 'Mtl1215', 'Mlloyd2@neiu.edu', '$2y$10$Zm8a.g7GpMABY9ATyexCE.zAdG7rGWvayPUN16rriHawYxjl5C0tC'),
(10, 'bubbasit', 'bubbasit@yahoo.com', '$2y$10$BxF1MjojYGghgLzyAqAuGeKruK.87mQP9hqMOyfthBLHUPw3WlMXy'),
(11, 'User7', 'user@user.com', '$2y$10$YUkjZhJ1LgvnBcaH.ZRil.OTC12f7nZHd6HnO.bE./cSUu8y89P6m');

-- --------------------------------------------------------

--
-- Table structure for table `seating`
--

CREATE TABLE `seating` (
  `seat_id` varchar(50) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seating`
--

INSERT INTO `seating` (`seat_id`, `flight_id`, `email`) VALUES
('1D', 9, 'g_chokhonelidze@yahoo.com'),
('1E', 9, 'g_chokhonelidze@yahoo.com'),
('1F', 9, 'g_chokhonelidze@yahoo.com'),
('1D', 10, 'g_chokhonelidze@yahoo.com'),
('1E', 10, 'g_chokhonelidze@yahoo.com'),
('1F', 10, 'g_chokhonelidze@yahoo.com'),
('5D', 9, 'bubbasit@yahoo.com'),
('8B', 9, 'g_chokhonelidze@yahoo.com'),
('8C', 9, 'g_chokhonelidze@yahoo.com'),
('9B', 9, 'g_chokhonelidze@yahoo.com'),
('9C', 9, 'g_chokhonelidze@yahoo.com'),
('3D', 10, 'g_chokhonelidze@yahoo.com'),
('3E', 10, 'g_chokhonelidze@yahoo.com'),
('3F', 10, 'g_chokhonelidze@yahoo.com'),
('4D', 10, 'g_chokhonelidze@yahoo.com'),
('4E', 10, 'g_chokhonelidze@yahoo.com'),
('3A', 10, 'g_chokhonelidze@yahoo.com'),
('3B', 10, 'g_chokhonelidze@yahoo.com'),
('3C', 10, 'g_chokhonelidze@yahoo.com'),
('4A', 10, 'g_chokhonelidze@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` int(11) NOT NULL,
  `voucher` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id`, `voucher`) VALUES
(2, 'GoldTicket'),
(3, 'RedeemMe'),
(5, 'America'),
(6, 'Oxford'),
(9, 'Terminal'),
(14, 'G');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`flight_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
  MODIFY `flight_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
