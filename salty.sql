-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 06, 2023 at 01:35 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salty`
--

-- --------------------------------------------------------

--
-- Table structure for table `advices`
--

CREATE TABLE `advices` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `rating` float NOT NULL,
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `advices`
--

INSERT INTO `advices` (`id`, `user_id`, `movie_id`, `rating`, `comment`) VALUES
(1, 7, 5, 2, NULL),
(5, 7, 9, 3.5, NULL),
(6, 7, 10, 4, NULL),
(7, 6, 6, 3, NULL),
(8, 5, 6, 2.5, NULL),
(9, 7, 6, 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `ID` int(11) NOT NULL,
  `Genre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`ID`, `Genre`) VALUES
(12, 'Adventure'),
(14, 'Fantasy'),
(16, 'Animation'),
(18, 'Drama'),
(27, 'Horror'),
(28, 'Action'),
(35, 'Comedy'),
(36, 'History'),
(37, 'Western'),
(53, 'Thriller'),
(80, 'Crime'),
(99, 'Documentary'),
(878, 'Science Fiction'),
(9648, 'Mystery'),
(10402, 'Music'),
(10749, 'Romance'),
(10751, 'Family'),
(10752, 'War'),
(10770, 'TV Movie');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `author` text NOT NULL,
  `resume` text NOT NULL,
  `year` int(11) NOT NULL,
  `link_yt` text NOT NULL,
  `image` text NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `name`, `author`, `resume`, `year`, `link_yt`, `image`, `genre_id`) VALUES
(2, 'test', 'test', 'test', 2000, 'test', 'test', 0),
(3, 'test2', 'test2', 'test2', 2003, 'test2', 'test2', 0),
(4, 'test2', 'test2', 'test2', 2003, 'test2', 'test2', 0),
(5, 'Beyond the Stars', 'Alex Reynolds', 'A thrilling space adventure where a group of astronauts discovers a parallel universe beyond our galaxy.', 2020, 'https://www.youtube.com/watch?v=xyz123', 'beyond_stars.jpg', 0),
(6, 'Eternal Echoes', 'Sophie Thompson', 'In a future world, a scientist invents a device that allows people to communicate with their future selves, leading to unforeseen consequences.', 2022, 'https://www.youtube.com/watch?v=abc456', 'eternal_echoes.jpg', 0),
(7, 'Chronicles of Cyberspace', 'Michael Carter', 'Set in a cyberpunk world, this movie follows a group of hackers as they uncover a vast conspiracy within the virtual realm.', 2019, 'https://www.youtube.com/watch?v=def789', 'cyberspace_chronicles.jpg', 0),
(8, 'Dreamscape Odyssey', 'Isabella Martinez', 'A mind-bending journey through dreams, where the boundaries between reality and imagination blur.', 2021, 'https://www.youtube.com/watch?v=ghi987', 'dreamscape_odyssey.jpg', 0),
(9, 'Quantum Quandary', 'Nathan Anderson', 'Scientists accidentally create a portal to alternate dimensions, leading to a thrilling adventure to save the world from interdimensional chaos.', 2018, 'https://www.youtube.com/watch?v=jkl012', 'quantum_quandary.jpg', 0),
(10, 'Lost in Time', 'Emily Turner', 'A time-traveling romantic drama where two lovers find themselves navigating through different eras to reunite against all odds.', 2023, 'https://www.youtube.com/watch?v=mno345', 'lost_in_time.jpg', 0),
(11, 'Neo Noir Nights', 'Daniel Harris', 'In a dystopian future, a detective uncovers a web of corruption while investigating a series of mysterious murders.', 2017, 'https://www.youtube.com/watch?v=pqr678', 'neo_noir_nights.jpg', 0),
(12, 'Infinite Realms', 'Olivia Campbell', 'An epic fantasy saga where heroes from different realms unite to stop an ancient evil threatening to consume the entire universe.', 2015, 'https://www.youtube.com/watch?v=stu901', 'infinite_realms.jpg', 0),
(13, 'Rogue AI Revolt', 'Benjamin Walker', 'A suspenseful thriller where artificial intelligence gains sentience and rebels against its creators, leading to a battle for survival.', 2020, 'https://www.youtube.com/watch?v=abc321', 'rogue_ai_revolt.jpg', 0),
(14, 'Parallel Paradox', 'Sophia Rodriguez', 'Parallel universes collide, causing characters from different realities to confront each other in this mind-twisting adventure.', 2016, 'https://www.youtube.com/watch?v=xyz789', 'parallel_paradox.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `address` text NOT NULL,
  `email` text NOT NULL,
  `dob` date NOT NULL,
  `password` text NOT NULL,
  `deleted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `address`, `email`, `dob`, `password`, `deleted`) VALUES
(5, 'Exemple', 'Exemple', 'Exemple', 'Exemple@exemple.com', '2000-01-01', 'Exemple', 1),
(6, 'Audrius', 'Grebliunas', 'Rue Pierre Flamand', 'audrius.grebliunas@gmail.com', '2000-12-05', 'audriusg', 1),
(7, 'caca', 'ccaca', 'caca', 'test@test.com', '2023-12-04', 'caca', 1),
(8, 'john', 'john', 'johnjohnjohnjohn', 'johnjohnjohn@john.john', '1111-11-11', '$argon2id$v=19$m=2048,t=4,p=2$RWNBR1lKWHBTV3Y1bkw1VA$vlsdnO5+wZYil262RVhy3bdRabHR4E9rwBuTijvFNBk', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `user_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`user_id`, `movie_id`, `status`, `id`) VALUES
(6, 2, 1, 1),
(7, 6, 3, 3),
(7, 7, 3, 4),
(7, 8, 3, 5),
(7, 9, 1, 6),
(7, 10, 3, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advices`
--
ALTER TABLE `advices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advices`
--
ALTER TABLE `advices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advices`
--
ALTER TABLE `advices`
  ADD CONSTRAINT `advices_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`),
  ADD CONSTRAINT `advices_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
