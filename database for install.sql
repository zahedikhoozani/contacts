
CREATE TABLE `address` (
  `id` int(4) NOT NULL,
  `name` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `family` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `phone` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `name`, `family`, `phone`) VALUES
(5, 'Ù…Ø¬ØªØ¨ÛŒ', 'Ø·Ø§ÙˆØ³ÛŒ', 2147483647),
(6, 'Ú©Ø±ÛŒÙ…', 'Ø²Ø§Ù‡Ø¯ÛŒ', 912),
(10, 'Ù…ÛŒØ«Ù…', 'Ø¢Ø®ÛŒØ´ Ø¬Ø§Ù†', 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);
