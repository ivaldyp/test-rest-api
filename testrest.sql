-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2018 at 10:23 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testrest`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `country`, `created_at`, `updated_at`) VALUES
(1, 'Charles Dickens', 'United Kingdom', '2018-12-19 17:00:00', '2018-12-19 17:00:00'),
(2, 'J. R. R. Tolkien', 'South Africa', '2018-12-19 17:00:00', '2018-12-19 17:00:00'),
(3, 'Antoine de Saint-Exupéry', 'France', '2018-12-19 17:00:00', '2018-12-19 17:00:00'),
(4, 'J. K. Rowling', 'United Kingdom', '2018-12-19 17:00:00', '2018-12-19 17:00:00'),
(5, 'Lewis Carroll', 'United Kingdom', '2018-12-19 17:00:00', '2018-12-19 17:00:00'),
(7, 'Agatha Christie', 'United Kingdom', '2018-12-19 17:00:00', '2018-12-19 17:00:00'),
(8, 'C. S. Lewis', 'United Kingdom', '2018-12-19 17:00:00', '2018-12-19 17:00:00'),
(9, 'Dan Brown', 'USA', '2018-12-19 17:00:00', '2018-12-19 17:00:00'),
(10, 'Jane Austen', 'United Kingdom', '2018-12-19 17:00:00', '2018-12-19 17:00:00'),
(11, 'Stephen King', 'USA', '2018-12-19 17:00:00', '2018-12-19 17:00:00'),
(12, 'Rick Riordan', 'USA', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `synopsis` varchar(600) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish_year` int(11) NOT NULL,
  `id_author` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `synopsis`, `publish_year`, `id_author`, `created_at`, `updated_at`) VALUES
(1, 'A Christmas Carol', 'A Christmas Carol is a novella by Charles Dickens about Ebenezer Scrooge, an old man, who is well-known for his miserly ways. On Christmas Eve, Scrooge is visited by a series of ghosts, start', 1905, 1, '2018-12-19 17:00:00', '2018-12-19 17:00:00'),
(2, 'Great Expectations', 'The story of Pip, an orphan boy adopted by a blacksmith\'s family, who has good luck and great expectations, and then loses both his luck and his expectations. Through this rise and fall, however, Pip learns how to find happiness.', 1861, 1, '2018-12-20 14:27:19', '2018-12-20 14:27:19'),
(3, 'Oliver Twist', 'Oliver is shot by a servant of the house and, after Sikes escapes, is taken in by the women who live there, Mrs. Maylie and her beautiful adopted niece Rose. They grow fond of Oliver, and he spends an idyllic summer with them in the countryside. But Fagin and a mysterious man named Monks are set on recapturing Oliver.', 1837, 1, '2018-12-20 14:27:19', '2018-12-20 14:27:19'),
(4, 'The Lord of the Rings', 'The story of the War of the Ring in the fictional world of Middle-earth. The long novel centers around the magical One Ring, discovered by Bilbo Baggins.', 1954, 2, '2018-12-20 14:31:11', '2018-12-20 14:31:11'),
(5, 'The Hobbit', 'Bilbo Baggins is a hobbit who lives a quiet life, until it is upset by a visit from a wizard named Gandalf. He wants Bilbo to help a group of dwarves take back the Mountain from Smaug, a dragon. Bilbo is unsure he wants to help, but he is drawn into the adventure by Gandalf, who tells the dwarves Bilbo is a burglar.', 1937, 2, '2018-12-20 14:31:11', '2018-12-20 14:31:11'),
(6, 'The Silmarillion', 'Tolkien\'s first book and also his last. In origin it precedes even The Hobbit, and is the story of the First Age of Tolkien\'s Middle Earth. It shows us the ancient history to which characters in The Lord of the Rings look back, talk, rhyme and sing about.', 1977, 2, '2018-12-20 14:31:11', '2018-12-20 14:31:11'),
(10, 'The Little Prince', 'The narrator introduces himself as a man who learned when he was a child that adults lack imagination and understanding. He is now a pilot who has crash-landed in a desert. He encounters a small boy who asks him for a drawing of a sheep, and the narrator obliges.', 1943, 3, '2018-12-20 14:42:57', '2018-12-20 14:42:57'),
(11, 'Wind, Sand and Stars', ' It deals with themes such as friendship, death, heroism, and solidarity among colleagues, and illustrates the author\'s opinions of what makes life worth living.', 1939, 3, '2018-12-20 14:42:57', '2018-12-20 14:42:57'),
(12, 'Night Flight', 'The novel is set in Argentina at the outset of commercial aviation. Rivière is the station chief of an airline that is the first to pioneer night flights, disciplining his employees to focus all they do on ensuring that the mail gets through punctually each night.', 1931, 3, '2018-12-20 14:42:57', '2018-12-20 14:42:57'),
(13, 'Fantastic Beasts and Where to Find Them', 'The adventures of writer Newt Scamander in New York\'s secret community of witches and wizards seventy years before Harry Potter reads his book in school. The year is 1926 and Newt Scamander has just completed a global excursion to find and document an extraordinary array of magical creatures.', 2001, 4, '2018-12-20 14:42:57', '2018-12-20 14:42:57'),
(14, 'Harry Potter and the Philosopher\'s Stone', 'Harry Potter, a boy who learns on his eleventh birthday that he is the orphaned son of two powerful wizards and possesses unique magical powers of his own. He is summoned from his life as an unwanted child to become a student at Hogwarts, an English boarding school for wizards.', 1997, 4, '2018-12-20 14:42:57', '2018-12-20 14:42:57'),
(15, 'The Cuckoo\'s Calling', 'Cormoran Strike, a private detective who is also ex-military, hired to investigate the death of the beautiful, famous and wealthy supermodel Lula Landry. A beautiful woman, who is a supermodel, is found dead in the early morning hours. She fell from her penthouse apartment around 2 am.', 2013, 4, '2018-12-20 14:42:57', '2018-12-20 14:42:57'),
(16, 'Alice\'s Adventures in Wonderland', 'Alice leaps up, follows it down an enormous rabbit hole, and embarks on a series of wild and wacky adventures in a world known as Wonderland. At first Alice is trapped in a hall of locked doors, unable to go through the only door to which she has a key because it\'s tiny and she\'s too big.', 1865, 5, '2018-12-20 14:42:57', '2018-12-20 14:42:57'),
(17, 'Jabberwocky', 'The poem begins with a description of the setting – an afternoon, with strange, nonsense-creatures milling around and making noises. Then, we have some dialogue. A father tells his son to beware of something called a \"Jabberwocky\" that lurks in the woods and has horrible claws and teeth.', 1871, 5, '2018-12-20 14:42:57', '2018-12-20 14:42:57'),
(18, 'The Hunting of the Snark', 'A group of strangers that come together on a mysterious voyage to hunt a Snark regardless of the fact that none of them have a clue what it is or how to go about capturing it should the happen across one, not even the Bellman who is leading the Hunt.', 1876, 5, '2018-12-20 14:42:57', '2018-12-20 14:42:57'),
(19, 'And Then There Were None', 'The novel opens with all of the main characters traveling by train or car to a ferry that will take them to a mysterious island named Indian Island. Each guest has received an invitation from a Mr. or Mrs. U.N. Owen, or a Mrs. Constance Culmington, to come to the island.', 1939, 7, '2018-12-20 14:50:30', '2018-12-20 14:50:30'),
(20, 'Murder on the Orient Express', 'A lavish trip through Europe quickly unfolds into a race against time to solve a murder aboard a train. When an avalanche stops the Orient Express dead in its tracks, the world\'s greatest detective -- Hercule Poirot -- arrives to interrogate all passengers and search for clues before the killer can strike again.', 1934, 7, '2018-12-20 14:50:30', '2018-12-20 14:50:30'),
(21, 'The A.B.C. Murders', ' Returning from South America, Arthur Hastings meets with his old friend, Hercule Poirot, at his new flat in London. Poirot shows him a mysterious letter he received, signed \"A.B.C.\", that details a crime that is to be committed very soon, which he suspects will be a murder.', 1936, 7, '2018-12-20 14:50:30', '2018-12-20 14:50:30'),
(22, 'Mere Christianity', 'In Mere Christianity, C. S. Lewis argues for the logical validity of Christianity, defends the religion from its critics, and looks in detail at what the life of a Christian is like. In the first part of the book, Lewis discusses the Law of Human Nature.', 1952, 8, '2018-12-20 14:50:30', '2018-12-20 14:50:30'),
(23, 'The Screwtape Letters', 'The novel consists of 31 letters written by a devil named Screwtape to his nephew, a young devil named Wormwood. The author, C.S. Lewis, notes that he has no intention of explaining how he came to acquire these letters.', 1942, 8, '2018-12-20 14:50:30', '2018-12-20 14:50:30'),
(24, 'The Four Loves', 'In the book The Four Loves, Lewis will take the reader on a quest to discover and explore the various types of love felt, given, and received by humans. Lewis talks about loves in terms of affection, friendship, Eros, and charity. ... Lewis equates that with man\'s quest to be loved by God.', 1960, 8, '2018-12-20 14:50:30', '2018-12-20 14:50:30'),
(25, 'Origin', 'In the novel Origin by Dan Brown, when billionaire researcher Edmond Kirsch is killed it is up to Robert Langdon and Ambra Vidal to honor his memory by making public his findings concerning the origin of human life and its destiny.', 2017, 9, '2018-12-20 14:50:30', '2018-12-20 14:50:30'),
(26, 'Inferno', 'In the prologue of the novel a person runs away from his pursuers and rushes to the highest tower of Florence. Before his death, he thinks about his gift to mankind - Inferno. The Professor of History of Culture, an expert in symbols Robert Langdon wakes up in an unknown hospital.', 2013, 9, '2018-12-20 14:50:30', '2018-12-20 14:50:30'),
(27, 'The Da Vinci Code', 'The Da Vinci Code Summary. This novel starts off with a bang—literally. Jacques Saunière, the respected curator of the Louvre museum in Paris, is viciously shot by an albino monk looking for a certain mysterious something…something only Saunière and three other men (that have already been offed) could direct him to.', 2006, 9, '2018-12-20 14:50:30', '2018-12-20 14:50:30'),
(28, 'Pride and Prejudice', 'Pride and Prejudice is a humorous story of love and life among English gentility during the Georgian era. Mr Bennet is an English gentleman living in Hartfordshire with his overbearing wife. The Bennets 5 daughters; the beautiful Jane, the clever Elizabeth, the bookish Mary, the immature Kitty and the wild Lydia.', 1813, 10, '2018-12-20 14:54:41', '2018-12-20 14:54:41'),
(29, 'Emma', 'Emma Woodhouse is almost twenty-one, attractive, clever, wealthy and a bit spoiled. She lives at Hartfield, a substantial property in Highbury, Surrey and since her mother died young she runs the house. Her father is affectionate but obsessed with ill health and needs coddling.', 1815, 10, '2018-12-20 14:54:41', '2018-12-20 14:54:41'),
(30, 'Persuasion', '\r\nPersuasion\r\nAll text title page for Northanger Abbey and Persuasion\r\nTitle page of the original 1818 edition\r\nAuthor	Jane Austen\r\nCountry	United Kingdom\r\nLanguage	English\r\nPublisher	John Murray\r\nPublication date\r\n1818\r\nPersuasion is the last novel fully completed by Jane Austen. It was published at the end of 1817, six months after her death.\r\n\r\nThe story concerns Anne Elliot, a young Englishwoman of 27 years, whose family is moving to lower their expenses and get out of debt. They rent their home to an Admiral and his wife. The wife’s brother, Navy Captain Frederick Wentworth, had been enga', 1817, 10, '2018-12-20 14:54:41', '2018-12-20 14:54:41'),
(31, 'IT', 'In 1960, seven preteen outcasts fight an evil demon that poses as a child-killing clown. Thirty years later, they reunite to stop the demon once and for all when it returns to their hometown.', 1986, 11, '2018-12-20 14:54:41', '2018-12-20 14:54:41'),
(32, 'The Outsider', 'An unspeakable crime. A confounding investigation. At a time when the King brand has never been stronger, he has delivered one of his most unsettling and compulsively readable stories. An eleven-year-old boy\'s violated corpse is found in a town park.', 2018, 11, '2018-12-20 14:54:41', '2018-12-20 14:54:41'),
(33, 'The Shining', 'When Jack Torrance takes the job as caretaker of the remote Overlook Hotel for the winter, he thinks it will provide the perfect setting in which to soothe damaged bonds between himself, his wife, Wendy, and his son, Danny, and to put an end to his long-lingering unfinished play.', 1977, 11, '2018-12-20 14:54:41', '2018-12-20 14:54:41'),
(34, 'Percy Jackson & the Olympians: The Lightning Thief', 'Always trouble-prone, the life of teenager Percy Jackson (Logan Lerman) gets a lot more complicated when he learns he\'s the son of the Greek god Poseidon. At a training ground for the children of deities, Percy learns to harness his divine powers and prepare for the adventure of a lifetime.', 2005, 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `junction_books_tags`
--

CREATE TABLE `junction_books_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_book` int(10) UNSIGNED NOT NULL,
  `id_type` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `junction_books_tags`
--

INSERT INTO `junction_books_tags` (`id`, `id_book`, `id_type`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2018-12-21 02:27:09', '2018-12-21 02:27:09'),
(2, 16, 4, '2018-12-21 02:27:09', '2018-12-21 02:27:09'),
(3, 16, 2, '2018-12-21 02:27:09', '2018-12-21 02:27:09'),
(4, 19, 5, '2018-12-21 02:27:09', '2018-12-21 02:27:09'),
(5, 19, 8, '2018-12-21 02:27:09', '2018-12-21 02:27:09'),
(6, 29, 1, '2018-12-21 02:42:47', '2018-12-21 02:42:47'),
(7, 29, 7, '2018-12-21 02:42:47', '2018-12-21 02:42:47'),
(8, 13, 2, '2018-12-21 02:42:47', '2018-12-21 02:42:47'),
(9, 13, 1, '2018-12-21 02:42:47', '2018-12-21 02:42:47'),
(10, 2, 2, '2018-12-21 02:44:25', '2018-12-21 02:44:25'),
(11, 2, 8, '2018-12-21 02:44:25', '2018-12-21 02:44:25'),
(12, 14, 4, '2018-12-21 02:44:25', '2018-12-21 02:44:25'),
(13, 14, 2, '2018-12-21 02:44:25', '2018-12-21 02:44:25'),
(14, 26, 6, '2018-12-21 02:44:25', '2018-12-21 02:44:25'),
(15, 31, 8, '2018-12-21 02:44:25', '2018-12-21 02:44:25'),
(16, 31, 5, '2018-12-21 02:44:25', '2018-12-21 02:44:25'),
(17, 31, 3, '2018-12-21 02:44:25', '2018-12-21 02:44:25'),
(18, 17, 2, '2018-12-21 02:45:13', '2018-12-21 02:45:13'),
(19, 22, 7, '2018-12-21 02:45:13', '2018-12-21 02:45:13'),
(20, 22, 6, '2018-12-21 02:45:13', '2018-12-21 02:45:13'),
(21, 20, 5, '2018-12-21 02:47:10', '2018-12-21 02:47:10'),
(22, 20, 2, '2018-12-21 02:47:10', '2018-12-21 02:47:10'),
(23, 12, 4, '2018-12-21 02:47:10', '2018-12-21 02:47:10'),
(24, 3, 2, '2018-12-21 02:47:10', '2018-12-21 02:47:10'),
(25, 25, 4, '2018-12-21 02:47:10', '2018-12-21 02:47:10'),
(26, 25, 5, '2018-12-21 02:47:10', '2018-12-21 02:47:10'),
(27, 30, 7, '2018-12-21 02:47:10', '2018-12-21 02:47:10'),
(28, 30, 2, '2018-12-21 02:47:10', '2018-12-21 02:47:10'),
(29, 28, 6, '2018-12-21 02:47:10', '2018-12-21 02:47:10'),
(30, 28, 7, '2018-12-21 02:47:10', '2018-12-21 02:47:10'),
(31, 21, 2, '2018-12-21 02:51:54', '2018-12-21 02:51:54'),
(32, 21, 5, '2018-12-21 02:51:54', '2018-12-21 02:51:54'),
(33, 15, 5, '2018-12-21 02:51:54', '2018-12-21 02:51:54'),
(34, 27, 4, '2018-12-21 02:51:54', '2018-12-21 02:51:54'),
(35, 27, 2, '2018-12-21 02:51:54', '2018-12-21 02:51:54'),
(36, 24, 6, '2018-12-21 02:51:54', '2018-12-21 02:51:54'),
(37, 24, 7, '2018-12-21 02:51:54', '2018-12-21 02:51:54'),
(38, 5, 4, '2018-12-21 02:51:54', '2018-12-21 02:51:54'),
(39, 5, 2, '2018-12-21 02:51:54', '2018-12-21 02:51:54'),
(40, 18, 2, '2018-12-21 02:51:54', '2018-12-21 02:51:54'),
(41, 10, 2, '2018-12-21 02:51:54', '2018-12-21 02:51:54'),
(42, 4, 4, '2018-12-21 02:51:54', '2018-12-21 02:51:54'),
(43, 4, 2, '2018-12-21 02:51:54', '2018-12-21 02:51:54'),
(44, 32, 6, '2018-12-21 02:51:54', '2018-12-21 02:51:54'),
(45, 23, 2, '2018-12-21 02:51:54', '2018-12-21 02:51:54'),
(46, 33, 8, '2018-12-21 02:51:54', '2018-12-21 02:51:54'),
(47, 33, 5, '2018-12-21 02:51:54', '2018-12-21 02:51:54'),
(48, 6, 4, '2018-12-21 02:51:54', '2018-12-21 02:51:54'),
(49, 6, 2, '2018-12-21 02:51:54', '2018-12-21 02:51:54'),
(50, 11, 4, '2018-12-21 02:51:54', '2018-12-21 02:51:54'),
(51, 34, 4, '2018-12-21 02:54:17', '2018-12-21 02:54:17'),
(52, 34, 3, '2018-12-21 02:54:17', '2018-12-21 02:54:17');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_12_18_032408_create_authors_table', 1),
(2, '2018_12_18_064157_create_tags_table', 1),
(3, '2018_12_19_031604_create_books_table', 1),
(4, '2018_12_20_133159_create_junction_books_tags_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_exp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name_type`, `type_exp`, `created_at`, `updated_at`) VALUES
(1, 'Comedy', 'A genre in which the main emphasis is on humor.', '2018-12-19 17:00:00', '2018-12-19 17:00:00'),
(2, 'Fantasy', 'A genre of speculative fiction set in a fictional universe, often without any locations, events, or people referencing the real world.', '2018-12-19 17:00:00', '0000-00-00 00:00:00'),
(3, 'Myth', 'A folklore genre consisting of narratives that play a fundamental role in society, such as foundational tales.', '2018-12-19 17:00:00', '2018-12-19 17:00:00'),
(4, 'Adventure', 'A fiction that usually presents danger, or gives the reader a sense of excitement.', '2018-12-19 17:00:00', '2018-12-19 17:00:00'),
(5, 'Mystery', 'A genre of fiction usually involving a mysterious death or a crime to be solved.', '2018-12-19 17:00:00', '2018-12-19 17:00:00'),
(6, 'Drama', 'A genre that relies on the emotional and relational development of realistic characters.', '2018-12-19 17:00:00', '2018-12-19 17:00:00'),
(7, 'Romance', 'A genre fiction place their primary focus on the relationship and romantic love between two people.', '2018-12-19 17:00:00', '2018-12-19 17:00:00'),
(8, 'Horror', 'A genre of speculative fiction which is intended to, or has the capacity to frighten, scare, disgust, or startle its readers or viewers by inducing feelings of horror and terror.', '2018-12-19 17:00:00', '2018-12-19 17:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_id_author_foreign` (`id_author`);

--
-- Indexes for table `junction_books_tags`
--
ALTER TABLE `junction_books_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `junction_books_tags_id_book_foreign` (`id_book`),
  ADD KEY `junction_books_tags_id_type_foreign` (`id_type`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `junction_books_tags`
--
ALTER TABLE `junction_books_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_id_author_foreign` FOREIGN KEY (`id_author`) REFERENCES `authors` (`id`);

--
-- Constraints for table `junction_books_tags`
--
ALTER TABLE `junction_books_tags`
  ADD CONSTRAINT `junction_books_tags_id_book_foreign` FOREIGN KEY (`id_book`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `junction_books_tags_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `tags` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
