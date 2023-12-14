-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 13, 2023 at 10:53 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
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
-- Table structure for table `moviegenre`
--

CREATE TABLE `moviegenre` (
  `movie_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `moviegenre`
--

INSERT INTO `moviegenre` (`movie_id`, `genre_id`) VALUES
(19, 35),
(19, 12),
(19, 14),
(20, 53),
(20, 80),
(21, 80),
(21, 9648),
(21, 53),
(22, 18),
(22, 36),
(23, 80),
(23, 18),
(23, 53),
(24, 18),
(24, 53),
(24, 9648),
(25, 18),
(25, 80),
(25, 53),
(26, 18),
(26, 53),
(26, 80),
(27, 9648),
(27, 53),
(27, 18),
(28, 18),
(29, 80),
(29, 18),
(29, 9648),
(29, 53),
(30, 53),
(30, 80),
(30, 18),
(30, 9648),
(31, 28),
(31, 878),
(31, 12),
(32, 18),
(32, 53),
(32, 80),
(33, 80),
(33, 53),
(34, 18),
(34, 53),
(34, 80),
(35, 18),
(35, 53),
(35, 9648),
(36, 18),
(36, 53),
(36, 10770),
(37, 53),
(37, 9648),
(38, 53),
(38, 80),
(38, 9648),
(39, 53),
(40, 28),
(40, 53),
(40, 80),
(40, 9648),
(41, 18),
(41, 53),
(41, 80),
(41, 9648),
(42, 53),
(42, 80),
(43, 80),
(43, 53),
(43, 9648),
(43, 18),
(44, 53),
(45, 53),
(45, 9648),
(45, 80),
(46, 80),
(46, 18),
(46, 9648),
(46, 53),
(47, 10751),
(47, 14),
(48, 99),
(49, 16),
(49, 10751),
(49, 12),
(49, 14),
(50, 10751),
(50, 16),
(50, 12),
(50, 35),
(50, 14),
(51, 14),
(51, 16),
(51, 10751),
(52, 14),
(52, 16),
(52, 12),
(53, 12),
(53, 14),
(53, 16),
(54, 16),
(54, 10751),
(54, 14),
(55, 10749),
(55, 16),
(55, 18),
(56, 16),
(56, 10751),
(56, 18),
(56, 14),
(56, 12),
(57, 16),
(57, 28),
(57, 14),
(58, 28),
(58, 10749),
(58, 16),
(59, 16),
(59, 28),
(59, 35),
(60, 28),
(60, 12),
(60, 35),
(60, 18),
(60, 14),
(60, 16),
(61, 53),
(61, 16),
(61, 28),
(61, 35),
(61, 27),
(61, 9648),
(62, 16),
(62, 14),
(62, 28),
(63, 12),
(63, 16),
(63, 28),
(64, 16),
(64, 28),
(64, 12),
(65, 16),
(65, 28),
(65, 12),
(65, 35),
(66, 28),
(66, 12),
(66, 35),
(66, 14),
(66, 16),
(67, 28),
(67, 16),
(67, 12),
(67, 35),
(67, 14),
(68, 16),
(68, 28),
(68, 12),
(68, 35),
(68, 14),
(69, 28),
(69, 16),
(69, 12),
(69, 35),
(69, 14),
(70, 12),
(70, 35),
(70, 14),
(71, 35),
(72, 99),
(72, 35),
(73, 99),
(73, 10770),
(74, 10751),
(74, 35),
(74, 12),
(75, 10751),
(75, 12),
(75, 35),
(75, 14),
(76, 10751),
(76, 12),
(76, 35),
(77, 80),
(77, 28),
(77, 35),
(78, 80),
(78, 28),
(78, 12),
(78, 35),
(79, 35),
(79, 12),
(79, 28),
(80, 35),
(80, 80),
(81, 35),
(82, 35),
(83, 35),
(84, 35),
(85, 35),
(86, 27),
(86, 35),
(87, 35),
(87, 27),
(88, 35),
(88, 27),
(89, 35),
(90, 35),
(91, 35),
(93, 27),
(93, 9648),
(93, 53),
(94, 80),
(94, 27),
(94, 9648),
(95, 27),
(95, 9648),
(96, 27),
(96, 9648),
(97, 27),
(97, 9648),
(98, 27),
(98, 9648),
(98, 53),
(99, 27),
(99, 53),
(100, 27),
(100, 53),
(101, 27),
(101, 53),
(102, 27),
(102, 9648),
(102, 53),
(103, 27),
(103, 9648),
(103, 53),
(104, 27),
(104, 53),
(105, 27),
(105, 53),
(105, 9648),
(106, 27),
(106, 9648),
(106, 53),
(107, 27),
(108, 27),
(108, 9648),
(108, 53),
(109, 14),
(109, 18),
(109, 10749),
(110, 12),
(110, 14),
(110, 18),
(110, 10749),
(111, 12),
(111, 14),
(111, 18),
(111, 10749),
(112, 12),
(112, 14),
(112, 18),
(112, 10749),
(113, 12),
(113, 14),
(113, 10749),
(114, 18),
(114, 10749),
(115, 18),
(115, 10749),
(116, 35),
(116, 10749),
(117, 35),
(117, 10749),
(118, 35),
(118, 10749),
(118, 18),
(119, 99),
(120, 35),
(120, 18),
(120, 10749),
(121, 35),
(121, 18),
(121, 10749),
(122, 35),
(122, 18),
(123, 35),
(123, 10749),
(124, 10402),
(124, 99),
(125, 28),
(125, 53),
(126, 28),
(126, 80),
(126, 53),
(127, 53),
(127, 28),
(128, 53),
(128, 12),
(128, 28),
(129, 28),
(129, 12),
(129, 53),
(130, 28),
(130, 12),
(130, 53),
(131, 28),
(131, 12),
(131, 53),
(132, 28),
(132, 80),
(132, 18),
(132, 53),
(133, 35),
(133, 28),
(134, 28),
(134, 80),
(134, 53),
(135, 28),
(135, 80),
(135, 53),
(136, 28),
(136, 80),
(136, 53),
(137, 28),
(137, 12),
(137, 35),
(138, 28),
(138, 53),
(139, 80),
(139, 28),
(140, 28),
(140, 53),
(141, 28),
(141, 53),
(142, 28),
(142, 53),
(143, 12),
(143, 28),
(143, 53),
(143, 9648),
(144, 28),
(144, 12),
(144, 9648),
(144, 53);

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
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `name`, `author`, `resume`, `year`, `link_yt`, `image`) VALUES
(19, 'Barbie', 'Greta Gerwig', 'Barbie and Ken are having the time of their lives in the colorful and seemingly perfect world of Barbie Land. However, when they get a chance to go to the real world, they soon discover the joys and perils of living among humans.', 2023, 'https://www.youtube.com/watch?v=_s0EOTN1XfU', 'https://www.themoviedb.org/t/p/w1280/iuFNMS8U5cb6xfzi51Dbkovj7vM.jpg'),
(20, 'Pulp Fiction', 'Quentin Tarantino', 'A burger-loving hit man, his philosophical partner, a drug-addled gangster\'s moll and a washed-up boxer converge in this sprawling, comedic crime caper. Their adventures unfurl in three stories that ingeniously trip back and forth in time.', 1994, 'https://www.youtube.com/watch?v=tGpTpVyI_OQ', 'https://www.themoviedb.org/t/p/w1280/d5iIlFn5s0ImszYzBPb8JPIfbXD.jpg'),
(21, 'Se7en', 'David Fincher', 'Two homicide detectives are on a desperate hunt for a serial killer whose crimes are based on the \"seven deadly sins\" in this dark and haunting film that takes viewers from the tortured remains of one victim to the next. The seasoned Det. Sommerset researches each sin in an effort to get inside the killer\'s mind, while his novice partner, Mills, scoffs at his efforts to unravel the case.', 1995, 'https://www.youtube.com/watch?v=BJKukbTDLto', 'https://www.themoviedb.org/t/p/w1280/6yoghtyTpznpBik8EngEmJskVUO.jpg'),
(22, 'Oppenheimer', 'Christopher Nolan', 'The story of J. Robert Oppenheimer\'s role in the development of the atomic bomb during World War II.', 2023, 'https://www.youtube.com/watch?v=UdFeVo0cODs', 'https://www.themoviedb.org/t/p/w1280/8Gxv8gSFCU0XGDykEGv7zR1n2ua.jpg'),
(23, 'The Silence of the Lambs', 'Jonathan Demme', 'Clarice Starling is a top student at the FBI\'s training academy. Jack Crawford wants Clarice to interview Dr. Hannibal Lecter, a brilliant psychiatrist who is also a violent psychopath, serving life behind bars for various acts of murder and cannibalism. Crawford believes that Lecter may have insight into a case and that Starling, as an attractive young woman, may be just the bait to draw him out.', 1991, 'https://www.youtube.com/watch?v=mIj6hqPUnio', 'https://www.themoviedb.org/t/p/w1280/uS9m8OBk1A8eM9I042bx8XXpqAq.jpg'),
(24, 'Shutter Island', 'Martin Scorsese', 'World War II soldier-turned-U.S. Marshal Teddy Daniels investigates the disappearance of a patient from a hospital for the criminally insane, but his efforts are compromised by troubling visions and a mysterious doctor.', 2010, 'https://www.youtube.com/watch?v=lhX-IJS82JU', 'https://www.themoviedb.org/t/p/w1280/4GDy0PHYX3VRXUtwK5ysFbg3kEx.jpg'),
(25, 'The Usual Suspects', 'Bryan Singer', 'Held in an L.A. interrogation room, Verbal Kint attempts to convince the feds that a mythic crime lord, Keyser Soze, not only exists, but was also responsible for drawing him and his four partners into a multi-million dollar heist that ended with an explosion in San Pedro harbor – leaving few survivors. Verbal lures his interrogators with an incredible story of the crime lord\'s almost supernatural prowess.', 1995, 'https://www.youtube.com/watch?v=z2FNt5nFPY8', 'https://www.themoviedb.org/t/p/w1280/99X2SgyFunJFXGAYnDv3sb9pnUD.jpg'),
(26, 'Prisoners', 'Denis Villeneuve', 'Keller Dover faces a parent\'s worst nightmare when his 6-year-old daughter, Anna, and her friend go missing. The only lead is an old motorhome that had been parked on their street. The head of the investigation, Detective Loki, arrests the driver, but a lack of evidence forces Loki to release his only suspect. Dover, knowing that his daughter\'s life is at stake, decides that he has no choice but to take matters into his own hands.', 2013, 'https://www.youtube.com/watch?v=W5Qe97CHtLg', 'https://www.themoviedb.org/t/p/w1280/jsS3a3ep2KyBVmmiwaz3LvK49b1.jpg'),
(27, 'Gone Girl', 'David Fincher', 'With his wife\'s disappearance having become the focus of an intense media circus, a man sees the spotlight turned on him when it\'s suspected that he may not be innocent.', 2014, 'https://www.youtube.com/watch?v=sa_CvANF1uo', 'https://www.themoviedb.org/t/p/w1280/lv5xShBIDPe7m4ufdlV0IAc7Avk.jpg'),
(28, 'Fight Club', 'David Fincher', 'A ticking-time-bomb insomniac and a slippery soap salesman channel primal male aggression into a shocking new form of therapy. Their concept catches on, with underground \"fight clubs\" forming in every town, until an eccentric gets in the way and ignites an out-of-control spiral toward oblivion.', 1999, 'https://www.youtube.com/watch?v=dfeUzm6KF4g', 'https://www.themoviedb.org/t/p/w1280/pB8BM7pdSp6B6Ih7QZ4DrQ3PmJK.jpg'),
(29, 'Zodiac', 'David Fincher', 'A cartoonist teams up with an ace reporter and a law enforcement officer to track down an elusive serial killer.', 2007, 'https://www.youtube.com/watch?v=yNncHPl1UXg', 'https://www.themoviedb.org/t/p/w1280/6YmeO4pB7XTh8P8F960O1uA14JO.jpg'),
(30, 'Mystic River', 'Clint Eastwood', 'The lives of three men who were childhood friends are shattered when one of them suffers a family tragedy.', 2003, 'https://www.youtube.com/watch?v=W7NktJhrRYQ', 'https://www.themoviedb.org/t/p/w1280/hCHVDbo6XJGj3r2i4hVjKhE0GKF.jpg'),
(31, 'Inception', 'Christopher Nolan', 'Cobb, a skilled thief who commits corporate espionage by infiltrating the subconscious of his targets is offered a chance to regain his old life as payment for a task considered to be impossible: \"inception\", the implantation of another person\'s idea into a target\'s subconscious.', 2010, 'https://www.youtube.com/watch?v=mpj9dL7swwk', 'https://www.themoviedb.org/t/p/w1280/oYuLEt3zVCKq57qu2F8dT7NIa6f.jpg'),
(32, 'The Departed', 'Martin Scorsese', 'To take down South Boston\'s Irish Mafia, the police send in one of their own to infiltrate the underworld, not realizing the syndicate has done likewise. While an undercover cop curries favor with the mob kingpin, a career criminal rises through the police ranks. But both sides soon discover there\'s a mole among them.', 2006, 'https://www.youtube.com/watch?v=ggs6Ip97vRU', 'https://www.themoviedb.org/t/p/w1280/nT97ifVT2J1yMQmeq20Qblg61T.jpg'),
(33, 'Reservoir Dogs', 'Quentin Tarantino', 'A botched robbery indicates a police informant, and the pressure mounts in the aftermath at a warehouse. Crime begets violence as the survivors -- veteran Mr. White, newcomer Mr. Orange, psychopathic parolee Mr. Blonde, bickering weasel Mr. Pink and Nice Guy Eddie -- unravel.', 1992, 'https://www.youtube.com/watch?v=t_ecM-orD5w', 'https://www.themoviedb.org/t/p/w1280/xi8Iu6qyTfyZVDVy60raIOYJJmk.jpg'),
(34, 'Drive', 'Nicolas Winding Refn', 'Driver is a skilled Hollywood stuntman who moonlights as a getaway driver for criminals. Though he projects an icy exterior, lately he\'s been warming up to a pretty neighbor named Irene and her young son, Benicio. When Irene\'s husband gets out of jail, he enlists Driver\'s help in a million-dollar heist. The job goes horribly wrong, and Driver must risk his life to protect Irene and Benicio from the vengeful masterminds behind the robbery.', 2011, 'https://www.youtube.com/watch?v=0HfItugjLsg', 'https://www.themoviedb.org/t/p/w1280/602vevIURmpDfzbnv5Ubi6wIkQm.jpg'),
(35, 'The Game', 'David Fincher', 'In honor of his birthday, San Francisco banker Nicholas Van Orton, a financial genius and a cold-hearted loner, receives an unusual present from his younger brother, Conrad: a gift certificate to play a unique kind of game. In nary a nanosecond, Nicholas finds himself consumed by a dangerous set of ever-changing rules, unable to distinguish where the charade ends and reality begins.', 1997, 'https://www.youtube.com/watch?v=cM8Vrbz92ew', 'https://www.themoviedb.org/t/p/w1280/4UOa079915QjiTA2u5hT2yKVgUu.jpg'),
(36, 'Rear Window', 'Jeff Bleckner', 'Jason Kemp is a quadriplegic who passes the time spying on his neighbors from his window. By chance he catches one of them, Julian Thorpe, beating his wife and reports it to the police. He becomes certain that Julian has killed her, but fails to convince his nurse or his friends of any foul play.', 1998, 'https://www.youtube.com/watch?v=gzJoHZNLtqw', 'https://www.themoviedb.org/t/p/w1280/zmbPjkZhlnt0JEOU9xMYtbjNXuL.jpg'),
(37, 'Rear Window', 'Alfred Hitchcock', 'A wheelchair-bound photographer spies on his neighbors from his apartment window and becomes convinced one of them has committed murder.', 1954, 'https://www.youtube.com/watch?v=n0RLdU5bDF4', 'https://www.themoviedb.org/t/p/w1280/ILVF0eJxHMddjxeQhswFtpMtqx.jpg'),
(38, 'The Girl with the Dragon Tattoo', 'David Fincher', 'This English-language adaptation of the Swedish novel by Stieg Larsson follows a disgraced journalist, Mikael Blomkvist, as he investigates the disappearance of a weary patriarch\'s niece from 40 years ago. He is aided by the pierced, tattooed, punk computer hacker named Lisbeth Salander. As they work together in the investigation, Blomkvist and Salander uncover immense corruption beyond anything they have ever imagined.', 2011, 'https://www.youtube.com/watch?v=DqQe3OrsMKI', 'https://www.themoviedb.org/t/p/w1280/zqDopwg7XQ4IfFX2dRlQCT1SwMG.jpg'),
(39, 'The Girl in the Spider\'s Web', 'Fede Álvarez', 'After being enlisted to recover a dangerous computer program, hacker Lisbeth Salander and journalist Mikael Blomkvist find themselves caught in a web of spies, cybercriminals and corrupt government officials.', 2018, 'https://www.youtube.com/watch?v=Le5K1T3cYTs', 'https://www.themoviedb.org/t/p/w1280/w4ibr8R702DCjwYniry1D1XwQXj.jpg'),
(40, 'The Girl Who Kicked the Hornet\'s Nest', 'Daniel Alfredson', 'After taking a bullet to the head, Salander is under close supervision in a hospital and is set to face trial for attempted murder on her eventual release. With the help of journalist Mikael Blomkvist and his researchers at Millennium magazine, Salander must prove her innocence. In doing this she plays against powerful enemies and her own past.', 2009, 'https://www.youtube.com/watch?v=vVGbPFdU96A', 'https://www.themoviedb.org/t/p/w1280/92byRQBuuiLcfKnBi5NOuipSgV8.jpg'),
(41, 'The Girl with the Dragon Tattoo', 'Niels Arden Oplev', 'Swedish thriller based on Stieg Larsson\'s novel about a male journalist and a young female hacker. In the opening of the movie, Mikael Blomkvist, a middle-aged publisher for the magazine Millennium, loses a libel case brought by corrupt Swedish industrialist Hans-Erik Wennerström. Nevertheless, he is hired by Henrik Vanger in order to solve a cold case, the disappearance of Vanger\'s niece', 2009, 'https://www.youtube.com/watch?v=rIrjgFphVIc', 'https://www.themoviedb.org/t/p/w1280/r2pFUXKK20KD9RE3yybpQsNynRE.jpg'),
(42, 'The Marco Effect', 'Martin Zandvliet', 'When 14-year-old Marco, a homeless Romani boy, is arrested at the Danish border for possession of a missing public servant\'s passport, police inspector Carl Mørck and his Department Q team are tasked with finding the connection. The old case contains several suspicious elements: The public servant was accused of pedophilia shortly before he disappeared, and his case was closed unusually quickly. But the silent, traumatized Marco refuses to talk to them and it\'s not long before he\'s on the run from those who intend to kill him because of what he knows.', 2021, '', 'https://www.themoviedb.org/t/p/w1280/iedopRnMHIDyQlZzTTfroJfHhSN.jpg'),
(43, 'The Purity of Vengeance', 'Christoffer Boe', 'Copenhagen, Denmark, 2018. A frightening discovery is made in an old apartment. The subsequent investigation of Department Q members leads them to an infamous institution for girls that was suddenly closed in the early sixties.', 2018, 'https://www.youtube.com/watch?v=jfVTL2FxsDY', 'https://www.themoviedb.org/t/p/w1280/uTdaeGpznkLfyhAzLlrdssD621R.jpg'),
(44, 'The Absent One', 'Mikkel Nørgaard', 'Denmark, 2014. A former police officer asks Carl Mørck, head of Department Q, to find out who brutally killed his young twins in 1994. Although a local inhabitant confessed and was convicted of murder, Carl and his partner Assad soon realize that there is something in the case resolution that is terribly wrong.', 2014, 'https://www.youtube.com/watch?v=x9Zq_Op5LJ8', 'https://www.themoviedb.org/t/p/w1280/4NJ5rel0BVJdacJIQAfu1y8628Z.jpg'),
(45, 'The Keeper of Lost Causes', 'Mikkel Nørgaard', 'Denmark, 2013. Police officers Carl Mørck and Hafez el-Assad, sole members of Department Q, which is focused on closing cold cases, investigate the disappearance of politician Merete Lynggaard, vanished when she and her brother were traveling aboard a ferry five years ago.', 2013, 'https://www.youtube.com/watch?v=68sO1s9Hy70', 'https://www.themoviedb.org/t/p/w1280/cqf51OvCEkk5cTQV1hldHxU27ix.jpg'),
(46, 'A Conspiracy of Faith', 'Hans Petter Moland', 'Denmark, 2016. A blurred note is found in a bottle that has traveled across the ocean for a long time. After deciphering the cryptic note, Department Q members follow a sinister trail that leads them to investigate a case that occurred in 2008. At the same time, new tragic events take place that test their faith and deepest beliefs.', 2016, '', 'https://www.themoviedb.org/t/p/w1280/o8ttROXRy2obfcO3IFnORFq9nW8.jpg'),
(47, 'Disney\'s Snow White', 'Marc Webb', 'Live-action adaptation of the 1937 Disney animated film \'Snow White and the Seven Dwarfs\'.', 2025, '', 'https://www.themoviedb.org/t/p/w1280/l8FW5VPyD6aMkryoRHo70EZfhOA.jpg'),
(48, 'The Story of Frozen: Making a Disney Animated Classic', 'Rudy Bednar', 'A behind-the-scene look at the origins and evolution of the Academy Award-winning film.', 2014, '', 'https://www.themoviedb.org/t/p/w1280/tGCTpTNwlk8WfHxgZiOipcUSbJd.jpg'),
(49, 'Frozen', 'Jennifer Lee', 'Young princess Anna of Arendelle dreams about finding true love at her sister Elsa’s coronation. Fate takes her on a dangerous journey in an attempt to end the eternal winter that has fallen over the kingdom. She\'s accompanied by ice delivery man Kristoff, his reindeer Sven, and snowman Olaf. On an adventure where she will find out what friendship, courage, family, and true love really means.', 2013, 'https://www.youtube.com/watch?v=L0MK7qz13bU', 'https://www.themoviedb.org/t/p/w1280/kgwjIb2JDHRhNk13lmSxiClFjVk.jpg'),
(50, 'Frozen II', 'Jennifer Lee', 'Elsa, Anna, Kristoff and Olaf head far into the forest to learn the truth about an ancient mystery of their kingdom.', 2019, 'https://www.youtube.com/watch?v=FRe2toPFn9Q', 'https://www.themoviedb.org/t/p/w1280/mINJaa34MtknCYl5AjtNJzWj8cD.jpg'),
(51, 'My Neighbor Totoro', 'Hayao Miyazaki', 'Two sisters move to the country with their father in order to be closer to their hospitalized mother, and discover the surrounding trees are inhabited by Totoros, magical spirits of the forest. When the youngest runs away from home, the older sister seeks help from the spirits to find her.', 1988, 'https://www.youtube.com/watch?v=_nv94fL_IA8', 'https://www.themoviedb.org/t/p/w1280/rtGDOeG9LzoerkDGZF9dnVeLppL.jpg'),
(52, 'Howl\'s Moving Castle', 'Hayao Miyazaki', 'Sophie, a young milliner, is turned into an elderly woman by a witch who enters her shop and curses her. She encounters a wizard named Howl and gets caught up in his resistance to fighting for the king.', 2004, 'https://www.youtube.com/watch?v=2x5SejvTMeA', 'https://www.themoviedb.org/t/p/w1280/6pZgH10jhpToPcf0uvyTCPFhWpI.jpg'),
(53, 'Princess Mononoke', 'Hayao Miyazaki', 'Ashitaka, a prince of the disappearing Emishi people, is cursed by a demonized boar god and must journey to the west to find a cure. Along the way, he encounters San, a young human woman fighting to protect the forest, and Lady Eboshi, who is trying to destroy it. Ashitaka must find a way to bring balance to this conflict.', 1997, 'https://www.youtube.com/watch?v=opCxPAwdB6U', 'https://www.themoviedb.org/t/p/w1280/cMYCDADoLKLbB83g4WnJegaZimC.jpg'),
(54, 'Spirited Away', 'Hayao Miyazaki', 'A young girl, Chihiro, becomes trapped in a strange new world of spirits. When her parents undergo a mysterious transformation, she must call upon the courage she never knew she had to free her family.', 2001, 'https://www.youtube.com/watch?v=GAp2_0JJskk', 'https://www.themoviedb.org/t/p/w1280/39wmItIWsg5sZMyRUHLkWBcuVCM.jpg'),
(55, 'Your Name.', 'Makoto Shinkai', 'High schoolers Mitsuha and Taki are complete strangers living separate lives. But one night, they suddenly switch places. Mitsuha wakes up in Taki’s body, and he in hers. This bizarre occurrence continues to happen randomly, and the two must adjust their lives around each other.', 2016, 'https://www.youtube.com/watch?v=9je8I3t2mRA', 'https://www.themoviedb.org/t/p/w1280/q719jXXEzOoYaps6babgKnONONX.jpg'),
(56, 'Wolf Children', 'Mamoru Hosoda', 'After her werewolf lover unexpectedly dies in an accident, a woman must find a way to raise the son and daughter that she had with him. However, their inheritance of their father\'s traits prove to be a challenge for her.', 2012, 'https://www.youtube.com/watch?v=aZbkeMolhB4', 'https://www.themoviedb.org/t/p/w1280/nqqovhsvsWbsb7LcGaIGDRZrwgB.jpg'),
(57, 'Naruto Shippuden the Movie', 'Hajime Kamegaki', 'Demons that once almost destroyed the world, are revived by someone. To prevent the world from being destroyed, the demon has to be sealed and the only one who can do it is the shrine maiden Shion from the country of demons, who has two powers; one is sealing demons and the other is predicting the deaths of humans. This time Naruto\'s mission is to guard Shion, but she predicts Naruto\'s death. The only way to escape it, is to get away from Shion, which would leave her unguarded, then the demon, whose only goal is to kill Shion will do so, thus meaning the end of the world. Naruto decides to challenge this \"prediction of death.\"', 2007, '', 'https://www.themoviedb.org/t/p/w1280/vDkct38sSFSWJIATlfJw0l3QOIR.jpg'),
(58, 'The Last: Naruto the Movie', 'Tsuneo Kobayashi', 'Two years after the events of the Fourth Great Ninja War, the moon that Hagoromo Otsutsuki created long ago to seal away the Gedo Statue begins to descend towards the world, threatening to become a meteor that would destroy everything on impact. Amidst this crisis, a direct descendant of Kaguya Otsutsuki named Toneri Otsutsuki attempts to kidnap Hinata Hyuga but ends up abducting her younger sister Hanabi. Naruto and his allies now mount a rescue mission before finding themselves embroiled in a final battle to decide the fate of everything.', 2014, 'https://www.youtube.com/watch?v=mksl3tYdyK4', 'https://www.themoviedb.org/t/p/w1280/bAQ8O5Uw6FedtlCbJTutenzPVKd.jpg'),
(59, 'Boruto: Naruto the Movie', 'Hiroyuki Yamashita', 'The spirited Boruto Uzumaki, son of Seventh Hokage Naruto, is a skilled ninja who possesses the same brashness and passion his father once had. However, the constant absence of his father, who is busy with his Hokage duties, puts a damper on Boruto\'s fire. He ends up meeting his father\'s friend Sasuke, and requests to become... his apprentice!? The curtain on the story of the new generation rises!', 2015, 'https://www.youtube.com/watch?v=ld-oqpvOBAk', 'https://www.themoviedb.org/t/p/w1280/1k6iwC4KaPvTBt1JuaqXy3noZRY.jpg'),
(60, 'Naruto Shippuden the Movie: The Will of Fire', 'Masahiko Murata', 'Ninjas with bloodline limits begin disappearing in all the countries and blame points toward the fire nation. By Tsunade\'s order, Kakashi is sacrificed to prevent an all out war. After inheriting charms left by Kakashi, Naruto fights through friends and foes to prevent his death while changing the minds of those who\'ve inherited the will of fire.', 2009, '', 'https://www.themoviedb.org/t/p/w1280/pZzdFmztwmg0FUOVCMa7vReHhQN.jpg'),
(61, 'Naruto Shippuden the Movie: Blood Prison', 'Masahiko Murata', 'After his capture for attempted assassination of the Raikage, leader of Kumogakure, as well as killing Jōnin from Kirigakure and Iwagakure, Naruto is imprisoned in Hōzukijou: A criminal containment facility known as the Blood Prison. Mui, the castle master, uses the ultimate imprisonment technique to steal power from the prisoners, which is when Naruto notices his life has been targeted. Thus begins the battle to uncover the truth behind the mysterious murders and prove Naruto\'s innocence.', 2011, '', 'https://www.themoviedb.org/t/p/w1280/4WT7zYFpe0fsbg6TitppiHddWAh.jpg'),
(62, 'Road to Ninja: Naruto the Movie', 'Hayato Date', 'Sixteen years ago, a mysterious masked ninja unleashes a powerful creature known as the Nine-Tailed Demon Fox on the Hidden Leaf Village Konoha, killing many people. In response, the Fourth Hokage Minato Namikaze and his wife Kushina Uzumaki, the Demon Fox\'s living prison or Jinchūriki, manage to seal the creature inside their newborn son Naruto Uzumaki. With the Tailed Beast sealed, things continued as normal. However, in the present day, peace ended when a group of ninja called the Akatsuki attack Konoha under the guidance of Tobi, the mysterious masked man behind Fox\'s rampage years ago who intends on executing his plan to rule the world by shrouding it in illusions.', 2012, 'https://www.youtube.com/watch?v=WhPOcizrFqg', 'https://www.themoviedb.org/t/p/w1280/xLal6fXNtiJN6Zw6qk21xAtdOeN.jpg'),
(63, 'Naruto the Movie: Guardians of the Crescent Moon Kingdom', 'Toshiyuki Tsuru', 'Naruto Uzumaki, Kakashi Hatake, Sakura Haruno, and Rock Lee are assigned to protect the prince of the Land of the Moon, Michiru, during his world trip; other escorts had been hired, but quit due to being treated poorly. The Land of the Moon is a very wealthy nation, so Michiru tends to buy whatever he wants, and has a very materialistic worldview. His Hikaru, also acts in much the same manner.', 2006, '', 'https://www.themoviedb.org/t/p/w1280/uHOlbIt1s90TL3JHI3JXwBBQOP6.jpg'),
(64, 'Naruto: The Lost Story - Mission: Protect the Waterfall Village!', 'Hayato Date', 'Naruto and his friends must get back a jug of stolen holy water from a band of higher class ninjas.', 2003, '', 'https://www.themoviedb.org/t/p/w1280/mpFZiRihCsPDdZ1Ef69WIengKh2.jpg'),
(65, 'One Piece: Episode of Skypiea', 'Konosuke Uda', 'One day, a giant ship falls onto the Straw Hats from the sky. After a narrow escape, and while they are still in shock, a map to the “Sky Island” is carried to them by the wind. While researching for the way there, they meet another pirate and learn that he is a descendant of an infamous Sky Island explorer who was even depicted in a picture book “Noland The Liar” four centuries ago. However, Noland was possibly not a liar after all and might actually have gone to the Sky Island.', 2018, '', 'https://www.themoviedb.org/t/p/w1280/rlXwxRqZa0dMssgYLQeoNo4WiXg.jpg'),
(66, 'Dream 9 Toriko & One Piece & Dragon Ball Z Super Collaboration Special!!', 'Akifumi Zako', 'A two-part crossover special featuring characters from Dragon Ball Z, One Piece and Toriko.', 2013, '', 'https://www.themoviedb.org/t/p/w1280/1azUShBxKqHUUJf61BIpnJTtAWO.jpg'),
(67, 'One Piece: Adventure of Nebulandia', 'Konosuke Uda', 'Kōmei devises a plan where Zoro and Sanji take part in an eating contest, and the two eat a strange \"good-for-nothing-only\" mushroom that turns them into good-for-nothing men. The two are then locked in a jail cell. When the rest of the Straw Hat Pirates chase after their imprisoned crew, they land on the island of Nebulandia, which features a mysterious fog made from sea water, and it has the same effects as seastone. The Straw Hat Pirates\' arrival on Nebulandia is also a part of Kōmei\'s plan.', 2015, '', 'https://www.themoviedb.org/t/p/w1280/xdu9XJSHT835OoChOiwEgi9Uzjf.jpg'),
(68, 'One Piece \"3D2Y\": Overcome Ace\'s Death! Luffy\'s Vow to his Friends', 'Naoyuki Ito', 'The special takes place during the two year before the Straw Hats reunite on Sabody. Luffy is currently in Rusukaina training to get stronger to take on the New World. However the training is interrupted when Hancock\'s sisters, Marigold and Sandersonia, are kidnapped by the Byrnndi World, a pirate who was locked away on Level 6 of Impel Down but escaped during Luffy\'s invasion to save Ace, in order to lure Hancock to him and use her as a hostage against the World Government due to her Shichibukai status. Thus Luffy and Hancock head off to confront him and save Hancock\'s sisters.', 2014, '', 'https://www.themoviedb.org/t/p/w1280/caUI7YlhVXykFWQ7Ul7RQ2wQRpv.jpg'),
(69, 'One Piece: The Movie', 'Junji Shimizu', 'There once was a pirate known as the Great Gold Pirate Woonan, who obtained almost one-third of the world\'s gold. Over the course of a few years, the pirate\'s existence faded, and a legend grew that he disappeared with his gold to a remote island, an island pirates continue to search for. Aboard the Going Merry, Luffy and his crew, starved and reckless, are robbed of their treasure. In an attempt to get it back, they wreck the getaway ship, guided by a young boy named Tobio, who\'s a captured part of El Drago\'s pirate crew. El Drago\'s love for gold has driven him to look for Woonan\'s island, and thanks to Woonan\'s treasure map, he finds it. During this time, Luffy\'s crew have been split up, and despite their own circumstances, they must find a way to stop El Drago from obtaining Woonan\'s gold.', 2000, '', 'https://www.themoviedb.org/t/p/w1280/aRqQNSuXpcE3dkJC43aEg9f2HXd.jpg'),
(70, 'Monty Python and the Holy Grail', 'Terry Jones', 'King Arthur, accompanied by his squire, recruits his Knights of the Round Table, including Sir Bedevere the Wise, Sir Lancelot the Brave, Sir Robin the Not-Quite-So-Brave-As-Sir-Lancelot and Sir Galahad the Pure. On the way, Arthur battles the Black Knight who, despite having had all his limbs chopped off, insists he can still fight. They reach Camelot, but Arthur decides not to enter, as \"it is a silly place\".', 1975, 'https://www.youtube.com/watch?v=4b52A3sKz-I', 'https://www.themoviedb.org/t/p/w1280/hWx1ANiWEWWyzKPN0us35HCGnhQ.jpg'),
(71, 'Fear City: A Family-Style Comedy', 'Alain Berbérian', 'A second-class horror movie has to be shown at Cannes Film Festival, but, before each screening, the projectionist is killed by a mysterious fellow, with hammer and sickle, just as it happens in the film to be shown.', 1994, '', 'https://www.themoviedb.org/t/p/w1280/xaTVWUrPbGM4SgrLOaaWLeUEafI.jpg'),
(72, 'How we made Asterix & Obelix: Mission Cleopatra', 'Alain Chabat', 'Behind the scenes of Chabat\'s take on Asterix.', 2002, '', 'https://www.themoviedb.org/t/p/w1280/xMj1yXgYh9fdDXVSAA8LchSvRGp.jpg'),
(73, 'One Night With Asterix & Obelix', 'Mélanie Bontems', 'On the occasion of the release of the blockbuster \"Asterix & Obelix: The Middle Kingdom\", unpublished images of the preparation of the film and the manufacturing secrets, as well as the crazy story of Asterix and Obelix since its origins.', 2023, '', 'https://www.themoviedb.org/t/p/w1280/8g5MOaL3xRKoEynCZl6QuyO9omZ.jpg'),
(74, 'Asterix & Obelix: The Middle Kingdom', 'Guillaume Canet', 'Gallic heroes and forever friends Asterix and Obelix journey to China to help Princess Sa See save the Empress and her land from a nefarious prince.', 2023, 'https://www.youtube.com/watch?v=poBI837NxbI', 'https://www.themoviedb.org/t/p/w1280/ifOqT5SmA4ANjmyEacLw3KAFKUd.jpg'),
(75, 'Asterix & Obelix Take on Caesar', 'Claude Zidi', 'Set in 50 B.C., Asterix and Obelix are living in a small but well-protected village in Gaul, where a magic potion concocted by Druids turns the townsfolk into mighty soldiers. When Roman troops carve a path through Gaul to reach the English Channel, Caesar and his aide de camp Detritus discover the secret elixir and capture the Druid leader who knows its formula, and Asterix and Obelix are sent off to rescue them.', 1999, 'https://www.youtube.com/watch?v=pXq-Z65dAd0', 'https://www.themoviedb.org/t/p/w1280/sJ4zNakOuWcsW6ssH1qk80JehQ2.jpg'),
(76, 'Asterix & Obelix: God Save Britannia', 'Laurent Tirard', 'Asterix crosses the channel to help second-cousin Anticlimax face down Julius Caesar and invading Romans.', 2012, 'https://www.youtube.com/watch?v=eLr8aU-sTb8', 'https://www.themoviedb.org/t/p/w1280/rbdGCkvLPxuSvfVwHDK4PmOqmIm.jpg'),
(77, 'OSS 117: Lost in Rio', 'Michel Hazanavicius', 'French top secret agent, Hubert Bonisseur de la Bath, is sent to Rio to buy microfilms from a running nazi. To do so, he has to team up with Mossad secret services.', 2009, 'https://www.youtube.com/watch?v=T8qeDWjAypo', 'https://www.themoviedb.org/t/p/w1280/rhv06T3gTFOShIVkQ0UipZFIyDw.jpg'),
(78, 'OSS 117: Cairo, Nest of Spies', 'Michel Hazanavicius', 'Secret agent OSS 117 foils Nazis, beds local beauties, and brings peace to the Middle East.', 2006, 'https://www.youtube.com/watch?v=HYobrwvSs9Q', 'https://www.themoviedb.org/t/p/w1280/dDVHVZVEbTV4JsB8ZjdXNmMK7rA.jpg'),
(79, 'OSS 117: From Africa with Love', 'Nicolas Bedos', '1981. Hubert Bonisseur de la Bath, aka OSS 117, is back. For this new mission - more delicate, more dangerous and more torrid than ever - he is forced to team up with a young new colleague, the promising OSS 1001.', 2021, 'https://www.youtube.com/watch?v=Dbcob9qYivI', 'https://www.themoviedb.org/t/p/w1280/8KZun0DjBSVJtAEb7ytNKIKO0SL.jpg'),
(80, 'The Big Lebowski', 'Ethan Coen', 'Jeffrey \'The Dude\' Lebowski, a Los Angeles slacker who only wants to bowl and drink White Russians, is mistaken for another Jeffrey Lebowski, a wheelchair-bound millionaire, and finds himself dragged into a strange series of events involving nihilists, adult film producers, ferrets, errant toes, and large sums of money.', 1998, 'https://www.youtube.com/watch?v=8CU0dlLfBtg', 'https://www.themoviedb.org/t/p/w1280/3bv6WAp6BSxxYvB5ozKFUYuRA8C.jpg'),
(81, 'Scary Movie', 'Keenen Ivory Wayans', 'A familiar-looking group of teenagers find themselves being stalked by a more-than-vaguely recognizable masked killer! As the victims begin to pile up and the laughs pile on, none of your favorite scary movies escape the razor-sharp satire of this outrageously funny parody!', 2000, 'https://www.youtube.com/watch?v=HTLPULt0eJ4', 'https://www.themoviedb.org/t/p/w1280/lRQiJXETkCnVVurHmglNvMXrZOx.jpg'),
(82, 'Scary Movie 2', 'Keenen Ivory Wayans', 'While the original parodied slasher flicks like Scream, Keenen Ivory Wayans\'s sequel to Scary Movie takes comedic aim at haunted house movies. A group of students visit a mansion called \"Hell House,\" and murderous high jinks ensue.', 2001, 'https://www.youtube.com/watch?v=wsHCoKGxjLk', 'https://www.themoviedb.org/t/p/w1280/7Eb1JWK0Cb0rbfsYjwfc9g0PbQH.jpg'),
(83, 'Scary Movie 3', 'David Zucker', 'In the third installment of the Scary Movie franchise, news anchorwoman Cindy Campbell has to investigate mysterious crop circles and killing video tapes, and help the President stop an alien invasion in the process.', 2003, 'https://www.youtube.com/watch?v=O21wD8Tzr2k', 'https://www.themoviedb.org/t/p/w1280/eagJEILa8SqWZV1mhm4HToVy8e.jpg'),
(84, 'Scary Movie 4', 'David Zucker', 'Cindy finds out the house she lives in is haunted by a little boy and goes on a quest to find out who killed him and why. Also, Alien \"Tr-iPods\" are invading the world and she has to uncover the secret in order to stop them.', 2006, 'https://www.youtube.com/watch?v=h0zAlXr1UOs', 'https://www.themoviedb.org/t/p/w1280/vL03Mk1ES5uo1ZdXovz6NtgsbSb.jpg'),
(85, 'Scary Movie 5', 'Malcolm D. Lee', 'Home with their newly-formed family, happy parents Dan and Jody are haunted by sinister, paranormal activities. Determined to expel the insidious force, they install security cameras and discover their family is being stalked by an evil dead demon.', 2013, 'https://www.youtube.com/watch?v=rBSHBWA12EI', 'https://www.themoviedb.org/t/p/w1280/vBqLLxE6GaAPhO6v9EFvFbLZ7Ap.jpg'),
(86, 'Shaun of the Dead', 'Edgar Wright', 'Shaun lives a supremely uneventful life, which revolves around his girlfriend, his mother, and, above all, his local pub. This gentle routine is threatened when the dead return to life and make strenuous attempts to snack on ordinary Londoners.', 2004, 'https://www.youtube.com/watch?v=e5S_1QkNvD8', 'https://www.themoviedb.org/t/p/w1280/dgXPhzNJH8HFTBjXPB177yNx6RI.jpg'),
(87, 'Zombieland', 'Ruben Fleischer', 'Columbus has made a habit of running from what scares him. Tallahassee doesn\'t have fears. If he did, he\'d kick their ever-living ass. In a world overrun by zombies, these two are perfectly evolved survivors. But now, they\'re about to stare down the most terrifying prospect of all: each other.', 2009, 'https://www.youtube.com/watch?v=NwxrW2nhpSE', 'https://www.themoviedb.org/t/p/w1280/dUkAmAyPVqubSBNRjRqCgHggZcK.jpg'),
(88, 'Zombieland: Double Tap', 'Ruben Fleischer', 'Columbus, Tallahassee, Wichita, and Little Rock move to the American heartland as they face off against evolved zombies, fellow survivors, and the growing pains of the snarky makeshift family.', 2019, 'https://www.youtube.com/watch?v=ZlW9yhUKlkQ', 'https://www.themoviedb.org/t/p/w1280/dtRbVsUb5O12WWO54SRpiMtHKC0.jpg'),
(89, 'French Fried Vacation', 'Patrice Leconte', 'Holidaymakers arriving in a Club Med camp on the Ivory Coast are determined to forget their everyday problems and emotional disappointments. Games, competitions, outings, bathing and sunburn accompany a continual succession of casual affairs.', 1978, 'https://www.youtube.com/watch?v=h74i8AGyWIM', 'https://www.themoviedb.org/t/p/w1280/gjmvQEQsWqM6884raalqMYv2Smt.jpg'),
(90, 'French Fried Vacations 3: Friends Forever', 'Patrice Leconte', 'After the Club Med and skiing, what happened to the Bronzés 27 years later? Early response: the same, and worse.', 2006, 'https://www.youtube.com/watch?v=VaSN-PdJlB4', 'https://www.themoviedb.org/t/p/w1280/9g7z9WG6MS3Q8cYfxTTBC4Ckm9A.jpg'),
(91, 'French Fried Vacation 2: The Bronzés go Skiing', 'Patrice Leconte', 'In this sequel to Les Bronzes (1978) summer has passed, but that doesn\'t mean the fun has to end for Bernard, Nathalie, Gigi, Jerome, Popeye, Jean-Claude, and Christiane.', 1979, 'https://www.youtube.com/watch?v=V78mXCLIBy8', 'https://www.themoviedb.org/t/p/w1280/uTN0bp8yMUKesNTLXR1GnL2kLFs.jpg'),
(92, 'Les bronzés, le père Noël, papy et les autres', 'Stéphane Kopecky', 'Les Bronzés, le Père Noël, Papy et les autres....Discover or rediscover the emblematic scenes of these cult films that have crossed generations without getting old. Go behind the scenes of these unusual films through completely unpublished anecdotes and funny stories told by the authors themselves.', 2003, '', 'https://www.themoviedb.org/t/p/w1280/crrm0OaeIYEqKMtRwMUtrkIyKpT.jpg'),
(93, 'Scream', 'Tyler Gillett', 'Twenty-five years after a streak of brutal murders shocked the quiet town of Woodsboro, a new killer has donned the Ghostface mask and begins targeting a group of teenagers to resurrect secrets from the town’s deadly past.', 2022, 'https://www.youtube.com/watch?v=EHehbEqBPzM', 'https://www.themoviedb.org/t/p/w1280/971Kqs1q4nuSc9arn1QAuKYbfxy.jpg'),
(94, 'Scream', 'Wes Craven', 'A year after the murder of her mother, Sidney Prescott is terrorized by a masked killer who targets her and her friends by using scary movies as part of a deadly game.', 1996, 'https://www.youtube.com/watch?v=lvR_kKGfax0', 'https://www.themoviedb.org/t/p/w1280/aXAByjBN8UhaYvotqRCwa5MsMGu.jpg'),
(95, 'Scream 2', 'Wes Craven', 'Away at college, Sidney thought she\'d finally put the shocking murders that shattered her life behind her... until a copycat killer begins acting out a real-life sequel.', 1997, 'https://www.youtube.com/watch?v=4TRG-z-w25Y', 'https://www.themoviedb.org/t/p/w1280/dORlVasiaDkJXTqt9bdH7nFNs6C.jpg'),
(96, 'Scream 3', 'Wes Craven', 'While Sidney lives in safely guarded seclusion, bodies begin dropping around the Hollywood set of STAB 3, the latest movie based on the gruesome Woodsboro killings.', 2000, 'https://www.youtube.com/watch?v=Gx24Z9O0MuY', 'https://www.themoviedb.org/t/p/w1280/qpH8ToZVlFD1bakL04LkEKodyDI.jpg'),
(97, 'Scream 4', 'Wes Craven', 'Sidney returns home to Woodsboro on the last stop of her book tour, which brings about the return of Ghost Face and puts her family, friends, and the whole town in danger.', 2011, 'https://www.youtube.com/watch?v=7bYWdpz0g1A', 'https://www.themoviedb.org/t/p/w1280/qeonDYVASBKeC0bnOrfamvs3djQ.jpg'),
(98, 'The Conjuring: The Devil Made Me Do It', 'Michael Chaves', 'Paranormal investigators Ed and Lorraine Warren encounter what would become one of the most sensational cases from their files. The fight for the soul of a young boy takes them beyond anything they\'d ever seen before, to mark the first time in U.S. history that a murder suspect would claim demonic possession as a defense.', 2021, 'https://www.youtube.com/watch?v=z3PB6WAsaJo', 'https://www.themoviedb.org/t/p/w1280/xbSuFiJbbBWCkyCCKIMfuDCA4yV.jpg'),
(99, 'The Conjuring', 'James Wan', 'Paranormal investigators Ed and Lorraine Warren work to help a family terrorized by a dark presence in their farmhouse. Forced to confront a powerful entity, the Warrens find themselves caught in the most terrifying case of their lives.', 2013, 'https://www.youtube.com/watch?v=PKT3WVzHDdY', 'https://www.themoviedb.org/t/p/w1280/wVYREutTvI2tmxr6ujrHT704wGF.jpg'),
(100, 'The Conjuring 2', 'James Wan', 'Lorraine and Ed Warren travel to north London to help a single mother raising four children alone in a house plagued by malicious spirits.', 2016, 'https://www.youtube.com/watch?v=VFsmuRPClr4', 'https://www.themoviedb.org/t/p/w1280/zEqyD0SBt6HL7W9JQoWwtd5Do1T.jpg'),
(101, 'Insidious', 'James Wan', 'A family discovers that dark spirits have invaded their home after their son inexplicably falls into an endless sleep. When they reach out to a professional for help, they learn things are a lot more personal than they thought.', 2011, 'https://www.youtube.com/watch?v=62rpZcMYa0A', 'https://www.themoviedb.org/t/p/w1280/tmlDFIUpGRKiuWm9Ixc6CYDk4y0.jpg'),
(102, 'Insidious: The Red Door', 'Patrick Wilson', 'To put their demons to rest once and for all, Josh Lambert and a college-aged Dalton Lambert must go deeper into The Further than ever before, facing their family\'s dark past and a host of new and more horrifying terrors that lurk behind the red door.', 2023, 'https://www.youtube.com/watch?v=ZoBdltv1u3c', 'https://www.themoviedb.org/t/p/w1280/d07phJqCx6z5wILDYqkyraorDPi.jpg'),
(103, 'Insidious: The Last Key', 'Adam Robitel', 'Parapsychologist Elise Rainier and her team travel to Five Keys, NM, to investigate a man’s claim of a haunting. Terror soon strikes when Rainier realizes that the house he lives in was her family’s old home.', 2018, 'https://www.youtube.com/watch?v=acQyrwQyCOk', 'https://www.themoviedb.org/t/p/w1280/nb9fc9INMg8kQ8L7sE7XTNsZnUX.jpg'),
(104, 'Insidious: Chapter 2', 'James Wan', 'The haunted Lambert family seeks to uncover the mysterious childhood secret that has left them dangerously connected to the spirit world.', 2013, 'https://www.youtube.com/watch?v=aEByNYajexQ', 'https://www.themoviedb.org/t/p/w1280/9nANrdFOywaWK3hmV91Y7BzWSv1.jpg'),
(105, 'Insidious: Chapter 3', 'Leigh Whannell', 'A twisted new tale of terror begins for a teenage girl and her family, and revealing more mysteries of the otherworldly realm, \'The Further\'.', 2015, 'https://www.youtube.com/watch?v=3HxEXnVSr1w', 'https://www.themoviedb.org/t/p/w1280/iDdGfdNvY1EX0uDdA4Ru77fwMfc.jpg'),
(106, 'Annabelle Comes Home', 'Gary Dauberman', 'Determined to keep Annabelle from wreaking more havoc, demonologists Ed and Lorraine Warren bring the possessed doll to the locked artifacts room in their home, placing her “safely” behind sacred glass and enlisting a priest’s holy blessing. But an unholy night of horror awaits as Annabelle awakens the evil spirits in the room, who all set their sights on a new target—the Warrens\' ten-year-old daughter, Judy, and her friends.', 2019, 'https://www.youtube.com/watch?v=yG5hY_DeDq0', 'https://www.themoviedb.org/t/p/w1280/qWsHMrbg9DsBY3bCMk9jyYCRVRs.jpg'),
(107, 'Annabelle', 'John R. Leonetti', 'A couple begins to experience terrifying supernatural occurrences involving a vintage doll shortly after their home is invaded by satanic cultists.', 2014, 'https://www.youtube.com/watch?v=xabuZwG3XyM', 'https://www.themoviedb.org/t/p/w1280/jNFqmsulwUrhYQW3MvqzfMc7SdS.jpg'),
(108, 'Annabelle: Creation', 'David F. Sandberg', 'Several years after the tragic death of their little girl, a doll maker and his wife welcome a nun and several girls from a shuttered orphanage into their home, soon becoming the target of the doll maker\'s possessed creation—Annabelle.', 2017, 'https://www.youtube.com/watch?v=PoKCXC2avAc', 'https://www.themoviedb.org/t/p/w1280/tb86j8jVCVsdZnzf8I6cIi65IeM.jpg'),
(109, 'Twilight', 'Catherine Hardwicke', 'When Bella Swan moves to a small town in the Pacific Northwest, she falls in love with Edward Cullen, a mysterious classmate who reveals himself to be a 108-year-old vampire. Despite Edward\'s repeated cautions, Bella can\'t stay away from him, a fatal move that endangers her own life.', 2008, 'https://www.youtube.com/watch?v=XVRQGTlr_XE', 'https://www.themoviedb.org/t/p/w1280/3Gkb6jm6962ADUPaCBqzz9CTbn9.jpg'),
(110, 'The Twilight Saga: Breaking Dawn - Part 2', 'Bill Condon', 'After the birth of Renesmee, the Cullens gather other vampire clans in order to protect the child from a false allegation that puts the family in front of the Volturi.', 2012, 'https://www.youtube.com/watch?v=fgC8YyYUAmI', 'https://www.themoviedb.org/t/p/w1280/7IGdPaKujv0BjI0Zd0m0a4CzEjJ.jpg'),
(111, 'The Twilight Saga: Eclipse', 'David Slade', 'Bella once again finds herself surrounded by danger as Seattle is ravaged by a string of mysterious killings and a malicious vampire continues her quest for revenge. In the midst of it all, she is forced to choose between her love for Edward and her friendship with Jacob, knowing that her decision has the potential to ignite the ageless struggle between vampire and werewolf. With her graduation quickly approaching, Bella is confronted with the most important decision of her life.', 2010, 'https://www.youtube.com/watch?v=hZxJzhIPTTg', 'https://www.themoviedb.org/t/p/w1280/3mFM80dPzSqoXXuC2UMvLIRWX32.jpg'),
(112, 'The Twilight Saga: New Moon', 'Chris Weitz', 'Forks, Washington resident Bella Swan is reeling from the departure of her vampire love, Edward Cullen, and finds comfort in her friendship with Jacob Black, a werewolf. But before she knows it, she\'s thrust into a centuries-old conflict, and her desire to be with Edward at any cost leads her to take greater and greater risks.', 2009, 'https://www.youtube.com/watch?v=BNi-ebCWXos', 'https://www.themoviedb.org/t/p/w1280/j5jM5pq78ObAXX1WhTsb115EkLl.jpg'),
(113, 'The Twilight Saga: Breaking Dawn - Part 1', 'Bill Condon', 'The new found married bliss of Bella Swan and vampire Edward Cullen is cut short when a series of betrayals and misfortunes threatens to destroy their world.', 2011, 'https://www.youtube.com/watch?v=PQNLfo-SOR4', 'https://www.themoviedb.org/t/p/w1280/qs8LsHKYlVRmJbFUiSUhhRAygwj.jpg'),
(114, 'Fifty Shades Darker', 'James Foley', 'When a wounded Christian Grey tries to entice a cautious Ana Steele back into his life, she demands a new arrangement before she will give him another chance. As the two begin to build trust and find stability, shadowy figures from Christian’s past start to circle the couple, determined to destroy their hopes for a future together.', 2017, 'https://www.youtube.com/watch?v=TUnylyz5mqQ', 'https://www.themoviedb.org/t/p/w1280/7CBO9GhsUeMSsWQb47WTPZnKjdj.jpg'),
(115, 'Fifty Shades Freed', 'James Foley', 'Believing they have left behind shadowy figures from their past, newlyweds Christian and Ana fully embrace an inextricable connection and shared life of luxury. But just as she steps into her role as Mrs. Grey and he relaxes into an unfamiliar stability, new threats could jeopardize their happy ending before it even begins.', 2018, 'https://www.youtube.com/watch?v=Aj6I54yrsF0', 'https://www.themoviedb.org/t/p/w1280/9ZedQHPQVveaIYmDSTazhT3y273.jpg'),
(116, 'Bridget Jones\'s Baby', 'Sharon Maguire', 'After breaking up with Mark Darcy, Bridget Jones\'s \'happily ever after\' hasn\'t quite gone according to plan. Fortysomething and single again, she decides to focus on her job as top news producer and surround herself with old friends and new. For once, Bridget has everything completely under control. What could possibly go wrong? Then her love life takes a turn and Bridget meets a dashing American named Jack, the suitor who is everything Mr. Darcy is not. In an unlikely twist she finds herself pregnant, but with one hitch she can only be fifty percent sure of the identity of her baby\'s father.', 2016, 'https://www.youtube.com/watch?v=mJsvmscPY9w', 'https://www.themoviedb.org/t/p/w1280/k703Pb5C0NsLvXPgFk8kAKnLylq.jpg'),
(117, 'Bridget Jones: The Edge of Reason', 'Beeban Kidron', 'Bridget Jones is becoming uncomfortable in her relationship with Mark Darcy. Apart from discovering that he\'s a conservative voter, she has to deal with a new boss, a strange contractor and the worst vacation of her life.', 2004, 'https://www.youtube.com/watch?v=2DFQNPx5sxA', 'https://www.themoviedb.org/t/p/w1280/42v82AwTnhaL1JkNcQK8PRAh46P.jpg'),
(118, 'Bridget Jones\'s Diary', 'Sharon Maguire', 'A chaotic Bridget Jones meets a snobbish lawyer, and he soon enters her world of imperfections.', 2001, 'https://www.youtube.com/watch?v=aI-O8tzTwy0', 'https://www.themoviedb.org/t/p/w1280/olMTi7uCaec9Yr3Ar07D2SIja1G.jpg'),
(119, 'Being Bridget Jones', 'Alex Harding', 'Marking 25 years since the creation of the Bridget Jones character for a column in The Independent newspaper, author Helen Fielding opens up her personal archive for the very first time to tell the story of how Bridget Jones’s Diary came to be. We meet Helen’s friends and family who inspired many of the characters and interview the stars of the hugely successful film adaptations, Renée Zellweger, Hugh Grant and Colin Firth.', 2020, '', 'https://www.themoviedb.org/t/p/w1280/78Ymx4E8As6pdwOnzEv5sHiEXPf.jpg'),
(120, 'Sex and the City', 'Michael Patrick King', 'A New York writer on sex and love is finally getting married to her Mr. Big. But her three best girlfriends must console her after one of them inadvertently leads Mr. Big to jilt her.', 2008, 'https://www.youtube.com/watch?v=ClEsRVPx86Q', 'https://www.themoviedb.org/t/p/w1280/AhNfnsGW95RKHQNLdgFH48UN0Zy.jpg'),
(121, 'Sex and the City 2', 'Michael Patrick King', 'Carrie, Charlotte, and Miranda are all married now, but they\'re still up for a little fun in the sun. When Samantha gets the chance to visit one of the most extravagant vacation destinations on the planet and offers to bring them all along, they surmise that a women-only retreat may be the perfect excuse to eschew their responsibilities and remember what life was like before they decided to settle down.', 2010, 'https://www.youtube.com/watch?v=Djz0q-GeboM', 'https://www.themoviedb.org/t/p/w1280/iHSRxhZsPaVuLCivvV6WEkMVGWU.jpg'),
(122, 'Sex and the City: Shanghai Style', 'George Ng', 'Sex and the City, Shanghai Style follows three young club-goers as they learn about sex, love, money, and finally, themselves.', 2016, '', 'https://www.themoviedb.org/t/p/w1280/xXLvVdJcBk8Xxe6TF1ZqMKmZn5Y.jpg'),
(123, 'All-Time High', 'Julien Royal', 'A con artist in dire need of cash and a woman with a crypto fortune hit it off. Is she the target of his dreams, or is the scammer about to get scammed?', 2023, 'https://www.youtube.com/watch?v=b-4EsCyN4wA', 'https://www.themoviedb.org/t/p/w1280/cQvINIqpk81Ax0QCcQXxjGD7Dgv.jpg'),
(124, 'Led Zeppelin - The Song Remains the Same', 'Peter Clifton', 'The best of Led Zeppelin\'s legendary 1973 appearances at Madison Square Garden. Interspersed throughout the concert footage are behind-the-scenes moments with the band. The Song Remains the Same is Led Zeppelin at Madison Square Garden in NYC concert footage colorfully enhanced by sequences which are supposed to reflect each band member\'s individual fantasies and hallucinations. Includes blistering live renditions of \"Black Dog,\" \"Dazed and Confused,\" \"Stairway to Heaven,\" \"Whole Lotta Love,\" \"The Song Remains the Same,\" and \"Rain Song\" among others.', 1976, 'https://www.youtube.com/watch?v=5N65F-Odxb4', 'https://www.themoviedb.org/t/p/w1280/tQzNsYcg4rVXVGw45ue7nkdMOgs.jpg'),
(125, 'Taken', 'Pierre Morel', 'While vacationing with a friend in Paris, an American girl is kidnapped by a gang of human traffickers intent on selling her into forced prostitution. Working against the clock, her ex-spy father must pull out all the stops to save her. But with his best years possibly behind him, the job may be more than he can handle.', 2008, 'https://www.youtube.com/watch?v=XK9zL0ze9O4', 'https://www.themoviedb.org/t/p/w1280/y5Va1WXDX6nZElVirPrGxf6w99B.jpg'),
(126, 'Taken 2', 'Olivier Megaton', 'In Istanbul, retired CIA operative Bryan Mills and his wife are taken hostage by the father of a kidnapper Mills killed while rescuing his daughter.', 2012, 'https://www.youtube.com/watch?v=-lksdwPuYHE', 'https://www.themoviedb.org/t/p/w1280/yzAlcuJhpnxRPjaj7AHBRbNPQCJ.jpg'),
(127, 'Taken 3', 'Olivier Megaton', 'Ex-government operative Bryan Mills finds his life is shattered when he\'s falsely accused of a murder that hits close to home. As he\'s pursued by a savvy police inspector, Mills employs his particular set of skills to track the real killer and exact his unique brand of justice.', 2014, 'https://www.youtube.com/watch?v=_ZLh4CaXwzM', 'https://www.themoviedb.org/t/p/w1280/vzvMXMypMq7ieDofKThsxjHj9hn.jpg'),
(128, 'The Expendables', 'Sylvester Stallone', 'Barney Ross leads a band of highly skilled mercenaries including knife enthusiast Lee Christmas, a martial arts expert Yin Yang, heavy weapons specialist Hale Caesar, demolitionist Toll Road, and a loose-cannon sniper Gunner Jensen. When the group is commissioned by the mysterious Mr. Church to assassinate the dictator of a small South American island, Barney and Lee visit the remote locale to scout out their opposition and discover the true nature of the conflict engulfing the city.', 2010, 'https://www.youtube.com/watch?v=gNd2Hd8uS5g', 'https://www.themoviedb.org/t/p/w1280/j09ZkH6R4JWVylBcDai1laCmGw7.jpg');
INSERT INTO `movies` (`id`, `name`, `author`, `resume`, `year`, `link_yt`, `image`) VALUES
(129, 'The Expendables 2', 'Simon West', 'Mr. Church reunites the Expendables for what should be an easy paycheck, but when one of their men is murdered on the job, their quest for revenge puts them deep in enemy territory and up against an unexpected threat.', 2012, 'https://www.youtube.com/watch?v=ip_CYHdyUBs', 'https://www.themoviedb.org/t/p/w1280/4EBO8aIeP2bF1jGpwbuRS4CFMca.jpg'),
(130, 'The Expendables 3', 'Patrick Hughes', 'Barney, Christmas and the rest of the team comes face-to-face with Conrad Stonebanks, who years ago co-founded The Expendables with Barney. Stonebanks subsequently became a ruthless arms trader and someone who Barney was forced to kill… or so he thought. Stonebanks, who eluded death once before, now is making it his mission to end The Expendables -- but Barney has other plans. Barney decides that he has to fight old blood with new blood, and brings in a new era of Expendables team members, recruiting individuals who are younger, faster and more tech-savvy. The latest mission becomes a clash of classic old-school style versus high-tech expertise in the Expendables’ most personal battle yet.', 2014, 'https://www.youtube.com/watch?v=MO-vY3I7M74', 'https://www.themoviedb.org/t/p/w1280/ruW3malZtlg66ODfg614dFbXO68.jpg'),
(131, 'Expend4bles', 'Scott Waugh', 'Armed with every weapon they can get their hands on and the skills to use them, The Expendables are the world’s last line of defense and the team that gets called when all other options are off the table. But new team members with new styles and tactics are going to give “new blood” a whole new meaning.', 2023, 'https://www.youtube.com/watch?v=DvJO4UZN_-w', 'https://www.themoviedb.org/t/p/w1280/iwsMu0ehRPbtaSxqiaUDQB9qMWT.jpg'),
(132, 'The Fast and the Furious: Tokyo Drift', 'Justin Lin', 'In order to avoid a jail sentence, Sean Boswell heads to Tokyo to live with his military father. In a low-rent section of the city, Shaun gets caught up in the underground world of drift racing', 2006, 'https://www.youtube.com/watch?v=B3orXjSE8GM', 'https://www.themoviedb.org/t/p/w1280/46xqGOwHbh2TH2avWSw3SMXph4E.jpg'),
(133, 'Fast and the Furious: Diesel Refueled', 'Jakob Koehler-Lees', 'After a fast and furious life of cars, partying, and women, Vin Diesel is faced with a supernatural being that puts his family at risk. With his tactile racing skills, Vin must take on this supernatural being to save his family.', 2023, '', 'https://www.themoviedb.org/t/p/w1280/ybWSxFmspPUhijvxSrkuYFs7wHF.jpg'),
(134, 'The Fast and the Furious', 'Rob Cohen', 'Dominic Toretto is a Los Angeles street racer suspected of masterminding a series of big-rig hijackings. When undercover cop Brian O\'Conner infiltrates Toretto\'s iconoclastic crew, he falls for Toretto\'s sister and must choose a side: the gang or the LAPD.', 2001, 'https://www.youtube.com/watch?v=37MZudBs4wo', 'https://www.themoviedb.org/t/p/w1280/gqY0ITBgT7A82poL9jv851qdnIb.jpg'),
(135, 'Fast X', 'Louis Leterrier', 'Over many missions and against impossible odds, Dom Toretto and his family have outsmarted, out-nerved and outdriven every foe in their path. Now, they confront the most lethal opponent they\'ve ever faced: A terrifying threat emerging from the shadows of the past who\'s fueled by blood revenge, and who is determined to shatter this family and destroy everything—and everyone—that Dom loves, forever.', 2023, 'https://www.youtube.com/watch?v=cg5z7wgOUig', 'https://www.themoviedb.org/t/p/w1280/fiVW06jE7z9YnO4trhaMEdclSiC.jpg'),
(136, 'The Fate of the Furious', 'F. Gary Gray', 'When a mysterious woman seduces Dom into the world of crime and a betrayal of those closest to him, the crew face trials that will test them as never before.', 2017, 'https://www.youtube.com/watch?v=RNwO_IRLFyk', 'https://www.themoviedb.org/t/p/w1280/dImWM7GJqryWJO9LHa3XQ8DD5NH.jpg'),
(137, 'Fast & Furious Presents: Hobbs & Shaw', 'David Leitch', 'Ever since US Diplomatic Security Service Agent Hobbs and lawless outcast Shaw first faced off, they just have traded smack talk and body blows. But when cyber-genetically enhanced anarchist Brixton\'s ruthless actions threaten the future of humanity, they join forces to defeat him.', 2019, 'https://www.youtube.com/watch?v=KHTo9Ee64lY', 'https://www.themoviedb.org/t/p/w1280/qRyy2UmjC5ur9bDi3kpNNRCc5nc.jpg'),
(138, 'Live Free or Die Hard', 'Len Wiseman', 'John McClane is back and badder than ever, and this time he\'s working for Homeland Security. He calls on the services of a young hacker in his bid to stop a ring of Internet terrorists intent on taking control of America\'s computer infrastructure.', 2007, 'https://www.youtube.com/watch?v=86ss__OIscQ', 'https://www.themoviedb.org/t/p/w1280/smfNnLNbjNgpiOS7npW8mxF9A5Z.jpg'),
(139, 'Die Harder', 'Lam Yee Hung', 'After corrupt police officer Fu escapes to mainland China, officer Sonia Chan defies her boss\' orders and goes after him.', 1995, '', 'https://www.themoviedb.org/t/p/w1280/cqp49jYFTWRh9BxmWLm6nilGLya.jpg'),
(140, 'Die Hard', 'John McTiernan', 'NYPD cop John McClane\'s plan to reconcile with his estranged wife is thrown for a serious loop when, minutes after he arrives at her office, the entire building is overtaken by a group of terrorists. With little help from the LAPD, wisecracking McClane sets out to single-handedly rescue the hostages and bring the bad guys down.', 1988, 'https://www.youtube.com/watch?v=3bQGKBeUuZI', 'https://www.themoviedb.org/t/p/w1280/yFihWxQcmqcaBR31QM6Y8gT6aYV.jpg'),
(141, 'Die Hard: With a Vengeance', 'John McTiernan', 'New York detective John McClane is back and kicking bad-guy butt in the third installment of this action-packed series, which finds him teaming with civilian Zeus Carver to prevent the loss of innocent lives. McClane thought he\'d seen it all, until a genius named Simon engages McClane, his new \"partner\" -- and his beloved city -- in a deadly game that demands their concentration.', 1995, 'https://www.youtube.com/watch?v=aRQetHOPpKA', 'https://www.themoviedb.org/t/p/w1280/buqmCdFQEWwEpL3agGgg2GVjN2d.jpg'),
(142, 'A Good Day to Die Hard', 'John Moore', 'Iconoclastic, take-no-prisoners cop John McClane, finds himself for the first time on foreign soil after traveling to Moscow to help his wayward son Jack - unaware that Jack is really a highly-trained CIA operative out to stop a nuclear weapons heist. With the Russian underworld in pursuit, and battling a countdown to war, the two McClanes discover that their opposing methods make them unstoppable heroes.', 2013, 'https://www.youtube.com/watch?v=Nrd8MdjHTzk', 'https://www.themoviedb.org/t/p/w1280/evxtv4e8Amm436Y5rW16RkGu8pX.jpg'),
(143, 'National Treasure', 'Jon Turteltaub', 'Modern treasure hunters, led by archaeologist Ben Gates, search for a chest of riches rumored to have been stashed away by George Washington, Thomas Jefferson and Benjamin Franklin during the Revolutionary War. The chest\'s whereabouts may lie in secret clues embedded in the Constitution and the Declaration of Independence, and Gates is in a race to find the gold before his enemies do.', 2004, 'https://www.youtube.com/watch?v=L6TvomcqlRg', 'https://www.themoviedb.org/t/p/w1280/pxL6E4GBOPUG6CdkO9cUQN5VMwI.jpg'),
(144, 'National Treasure: Book of Secrets', 'Jon Turteltaub', 'Benjamin Franklin Gates and Abigail Chase re-team with Riley Poole and, now armed with a stack of long-lost pages from John Wilkes Booth\'s diary, Ben must follow a clue left there to prove his ancestor\'s innocence in the assassination of Abraham Lincoln.', 2007, 'https://www.youtube.com/watch?v=hJ9tLLLFJu0', 'https://www.themoviedb.org/t/p/w1280/xxoIBbvmTj1ZttzV439jAvoovTw.jpg');

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
  `deleted` tinyint(1) DEFAULT '0',
  `questionanswer` text NOT NULL,
  `question` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `address`, `email`, `dob`, `password`, `deleted`, `questionanswer`, `question`) VALUES
(5, 'Exemple', 'Exemple', 'Exemple', 'Exemple@exemple.com', '2000-01-01', 'Exemple', 1, '', 0),
(6, 'Audrius', 'Grebliunas', 'Rue Pierre Flamand', 'audrius.grebliunas@gmail.com', '2000-12-05', 'audriusg', 1, '', 0),
(9, 'Gwendoline', 'Jacobs', 'Rue Catherine de Savoie 17', 'gwendolinejacobs1@gmail.com', '2023-12-05', '$argon2id$v=19$m=2048,t=4,p=2$aHc5NkxtS25tbzFYaklOTQ$0IF8pdS3xhJMDuuEq0DSfQC5hD/9V5daYoCnHpK894w', 0, '$argon2id$v=19$m=2048,t=4,p=2$YkxoTGlOZmJ4Z3pRa0NNaw$xAFFwzYvWzN3TUEcG/tDmLpXxqWNPv5M3XOm/R6uaSQ', 1),
(10, 'John', 'Doe', '123 Main Street, Cityville', 'john.doe@example.com', '1990-05-15', '$argon2id$v=19$m=2048,t=4,p=2$hashedpassword1', 0, '$argon2id$v=19$m=2048,t=4,p=2$answer1', 1),
(11, 'Alice', 'Johnson', '456 Oak Avenue, Townsville', 'alice.j@example.com', '1985-08-22', '$argon2id$v=19$m=2048,t=4,p=2$hashedpassword2', 0, '$argon2id$v=19$m=2048,t=4,p=2$answer2', 2),
(12, 'Bob', 'Smith', '789 Pine Lane, Villageton', 'bob.smith@example.com', '1992-02-10', '$argon2id$v=19$m=2048,t=4,p=2$hashedpassword3', 0, '$argon2id$v=19$m=2048,t=4,p=2$answer3', 3),
(13, 'Elena', 'Rodriguez', '101 Cedar Street, Hamletsville', 'elena.rodr@example.com', '1988-11-05', '$argon2id$v=19$m=2048,t=4,p=2$hashedpassword4', 0, '$argon2id$v=19$m=2048,t=4,p=2$answer4', 4),
(14, 'Michael', 'Chen', '202 Birch Road, Countryside', 'michael.chen@example.com', '1995-04-30', '$argon2id$v=19$m=2048,t=4,p=2$hashedpassword5', 0, '$argon2id$v=19$m=2048,t=4,p=2$answer5', 5),
(15, 'Sara', 'Gomez', '303 Elm Court, Riverside', 'sara.gomez@example.com', '1991-07-18', '$argon2id$v=19$m=2048,t=4,p=2$hashedpassword6', 0, '$argon2id$v=19$m=2048,t=4,p=2$answer6', 6),
(16, 'Daniel', 'Brown', '404 Walnut Drive, Lakeside', 'daniel.brown@example.com', '1987-09-25', '$argon2id$v=19$m=2048,t=4,p=2$hashedpassword7', 0, '$argon2id$v=19$m=2048,t=4,p=2$answer7', 1),
(17, 'Megan', 'Williams', '505 Sycamore Street, Mountainside', 'megan.w@example.com', '1993-12-12', '$argon2id$v=19$m=2048,t=4,p=2$hashedpassword8', 0, '$argon2id$v=19$m=2048,t=4,p=2$answer8', 2),
(18, 'Alex', 'Nguyen', '606 Maple Avenue, Hilltop', 'alex.nguyen@example.com', '1989-06-08', '$argon2id$v=19$m=2048,t=4,p=2$hashedpassword9', 0, '$argon2id$v=19$m=2048,t=4,p=2$answer9', 3),
(19, 'Sophie', 'Lee', '707 Pine Lane, Meadowville', 'sophie.lee@example.com', '1996-03-27', '$argon2id$v=19$m=2048,t=4,p=2$hashedpassword10', 0, '$argon2id$v=19$m=2048,t=4,p=2$answer10', 4);

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
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `moviegenre`
--
ALTER TABLE `moviegenre`
  ADD KEY `genre_id` (`genre_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
-- Constraints for table `moviegenre`
--
ALTER TABLE `moviegenre`
  ADD CONSTRAINT `moviegenre_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`),
  ADD CONSTRAINT `moviegenre_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`);

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
