-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost:8883
-- Generation Time: Aug 23, 2016 at 11:37 AM
-- Server version: 5.7.13-0ubuntu0.16.04.2
-- PHP Version: 7.0.8-0ubuntu0.16.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `badsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `user_id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL,
  `comment` varchar(1500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `search`
--

CREATE TABLE `search` (
  `product_id` int(3) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `search`
--

INSERT INTO `search` (`product_id`, `name`, `quantity`) VALUES
(1, 'Asparagus\n', 70),
(2, 'Broccoli \n', 33),
(3, 'Carrots\n', 52),
(4, 'Cauliflower\n', 28),
(5, 'Celery\n', 56),
(6, 'Corn\n', 17),
(7, 'Cucumbers\n', 20),
(8, 'Lettuce / Greens\n', 24),
(9, 'Mushrooms\n', 83),
(10, 'Onions\n', 20),
(11, 'Peppers\n', 51),
(12, 'Potatoes\n', 58),
(13, 'Spinach\n', 49),
(14, 'Squash\n', 8),
(15, 'Zucchini\n', 10),
(16, 'Tomatoes\n', 29),
(17, 'Fresh fruits\n', 62),
(18, 'Apples\n', 7),
(19, 'Avocados\n', 33),
(20, 'Bananas\n', 12),
(21, 'Berries \n', 93),
(22, 'Cherries\n', 44),
(23, 'Grapefruit\n', 55),
(24, 'Grapes\n', 51),
(25, 'Kiwis\n', 10),
(26, 'Lemons / Limes\n', 64),
(27, 'Melon\n', 12),
(28, 'Oranges\n', 45),
(29, 'Peaches\n', 69),
(30, 'Nectarines\n', 89),
(31, 'Pears\n', 63),
(32, 'Plums\n', 39),
(33, 'Refrigerated items\n', 22),
(34, 'Bagels\n', 15),
(35, 'Chip dip\n', 66),
(36, 'English muffins\n', 77),
(37, 'Eggs / Fake eggs\n', 31),
(38, 'Fruit juice\n', 86),
(39, 'Hummus\n', 1),
(40, 'Ready-bake breads\n', 14),
(41, 'Tofu\n', 6),
(42, 'Tortillas\n', 52),
(43, 'Frozen\n', 71),
(44, 'Breakfasts\n', 54),
(45, 'Burritos\n', 59),
(46, 'Fish sticks\n', 80),
(47, 'Ice cream / Sorbet\n', 83),
(48, 'Juice concentrate\n', 20),
(49, 'Pizza / Pizza Rolls\n', 87),
(50, 'Popsicles\n', 16),
(51, 'Fries / Tater tots\n', 32),
(52, 'TV dinners\n', 80),
(53, 'Vegetables\n', 59),
(54, 'Veggie burgers\n', 86),
(55, 'Condiments / Sauces\n', 30),
(56, 'BBQ sauce\n', 68),
(57, 'Gravy\n', 49),
(58, 'Honey\n', 42),
(59, 'Hot sauce\n', 13),
(60, 'Jam / Jelly / Preserves\n', 18),
(61, 'Ketchup / Mustard\n', 31),
(62, 'Mayonnaise\n', 76),
(63, 'Pasta sauce\n', 57),
(64, 'Relish\n', 52),
(65, 'Salad dressing\n', 90),
(66, 'Salsa\n', 23),
(67, 'Soy sauce\n', 29),
(68, 'Steak sauce\n', 20),
(69, 'Syrup\n', 8),
(70, 'Worcestershire sauce\n', 29),
(71, 'Various groceries\n', 33),
(72, 'Bouillon cubes\n', 13),
(73, 'Cereal\n', 81),
(74, 'Coffee / Filters\n', 4),
(75, 'Instant potatoes\n', 67),
(76, 'Lemon / Lime juice\n', 39),
(77, 'Mac & cheese\n', 84),
(78, 'Olive oil\n', 50),
(79, 'Pancake / Waffle mix\n', 59),
(80, 'Pasta\n', 71),
(81, 'Peanut butter\n', 65),
(82, 'Pickles\n', 90),
(83, 'Rice\n', 50),
(84, 'Te a\n', 24),
(85, 'Vegetable oil\n', 76),
(86, 'Vinegar\n', 80),
(87, 'Canned foods\n', 92),
(88, 'Applesauce\n', 25),
(89, 'Baked beans\n', 22),
(90, 'Chili\n', 5),
(91, 'Fruit\n', 42),
(92, 'Olives\n', 53),
(93, 'Tinned meats\n', 80),
(94, 'Tuna / Chicken\n', 99),
(95, 'Soups\n', 4),
(96, 'Tomatoes\n', 70),
(97, 'Veggies\n', 21),
(98, 'Spices & herbs\n', 33),
(99, 'Basil\n', 90),
(100, 'Black pepper\n', 29),
(101, 'Cilantro\n', 62),
(102, 'Cinnamon\n', 22),
(103, 'Garlic\n', 41),
(104, 'Ginger\n', 42),
(105, 'Mint\n', 26),
(106, 'Oregano\n', 8),
(107, 'Paprika\n', 80),
(108, 'Parsley\n', 9),
(109, 'Red pepper\n', 57),
(110, 'Salt\n', 39),
(111, 'Spice mix\n', 80),
(112, 'Vanilla extract\n', 22),
(113, 'Dairy\n', 29),
(114, 'Butter / Margarine\n', 30),
(115, 'Cottage cheese\n', 45),
(116, 'Half & half\n', 4),
(117, 'Milk\n', 9),
(118, 'Sour cream\n', 36),
(119, 'Whipped cream\n', 28),
(120, 'Yogurt\n', 31),
(121, 'Cheese\n', 41),
(122, 'Bleu cheese\n', 70),
(123, 'Cheddar\n', 83),
(124, 'Cottage cheese\n', 20),
(125, 'Cream cheese\n', 68),
(126, 'Feta\n', 87),
(127, 'Goat cheese\n', 90),
(128, 'Mozzarella / Provolone\n', 89),
(129, 'Parmesan\n', 19),
(130, 'Provolone\n', 79),
(131, 'Ricotta\n', 17),
(132, 'Sandwich slices\n', 80),
(133, 'Swiss\n', 100),
(134, 'Meat\n', 58),
(135, 'Bacon / Sausage\n', 21),
(136, 'Beef\n', 26),
(137, 'Chicken\n', 65),
(138, 'Ground beef / Turkey\n', 1),
(139, 'Ham / Pork\n', 35),
(140, 'Hot dogs\n', 22),
(141, 'Lunchmeat\n', 39),
(142, 'Turkey\n', 14),
(143, 'Seafood\n', 43),
(144, 'Catfish\n', 67),
(145, 'Crab\n', 43),
(146, 'Lobster\n', 87),
(147, 'Mussels\n', 71),
(148, 'Oysters\n', 52),
(149, 'Salmon\n', 23),
(150, 'Shrimp\n', 99),
(151, 'Tilapia\n', 83),
(152, 'Tuna\n', 63),
(153, 'Beverages\n', 69),
(154, 'Beer\n', 66),
(155, 'Club soda / Tonic\n', 83),
(156, 'Champagne\n', 36),
(157, 'Gin\n', 52),
(158, 'Juice\n', 72),
(159, 'Mixers\n', 25),
(160, 'Red wine / White wine\n', 71),
(161, 'Rum\n', 50),
(162, 'SakÃ©\n', 41),
(163, 'Soda pop\n', 51),
(164, 'Sports drink\n', 50),
(165, 'Whiskey\n', 98),
(166, 'Vodka\n', 72),
(167, 'Baked goods\n', 75),
(168, 'Bagels / Croissants\n', 63),
(169, 'Buns / Rolls\n', 72),
(170, 'Cake / Cookies\n', 10),
(171, 'Donuts / Pastries \n', 84),
(172, 'Fresh bread\n', 11),
(173, 'Sliced bread\n', 23),
(174, 'Pie! Pie! Pie!\n', 26),
(175, 'Pita bread\n', 78),
(176, 'Baking\n', 66),
(177, 'Baking powder / Soda\n', 13),
(178, 'Bread crumbs\n', 49),
(179, 'Cake / Brownie mix\n', 17),
(180, 'Cake icing / Decorations\n', 35),
(181, 'Chocolate chips / Cocoa\n', 47),
(182, 'Flour\n', 99),
(183, 'Shortening\n', 98),
(184, 'Sugar\n', 15),
(185, 'Sugar substitute\n', 64),
(186, 'Yeast\n', 80),
(187, 'Snacks\n', 51),
(188, 'Candy / Gum\n', 16),
(189, 'Cookies\n', 52),
(190, 'Crackers\n', 75),
(191, 'Dried fruit\n', 87),
(192, 'Granola bars / Mix\n', 2),
(193, 'Nuts / Seeds\n', 16),
(194, 'Oatmeal\n', 37),
(195, 'Popcorn\n', 51),
(196, 'Potato / Corn chips\n', 14),
(197, 'Pretzels\n', 8),
(198, 'Themed meals\n', 26),
(199, 'Burger night\n', 76),
(200, 'Chili night\n', 80),
(201, 'Pizza night\n', 35),
(202, 'Spaghetti night\n', 59),
(203, 'Taco night\n', 90),
(204, 'Take-out deli food\n', 58),
(205, 'Baby stuff\n', 84),
(206, 'Baby food\n', 68),
(207, 'Diapers\n', 23),
(208, 'Formula\n', 97),
(209, 'Lotion\n', 16),
(210, 'Baby wash\n', 39),
(211, 'Wipes\n', 31),
(212, 'Pets\n', 63),
(213, 'Cat food / Treats\n', 38),
(214, 'Cat litter\n', 29),
(215, 'Dog food / Treats\n', 78),
(216, 'Flea treatment\n', 2),
(217, 'Pet shampoo\n', 9),
(218, 'Personal care\n', 28),
(219, 'Antiperspirant / Deodorant\n', 18),
(220, 'Bath soap / Hand soap\n', 60),
(221, 'Condoms / Other b.c.\n', 3),
(222, 'Cosmetics\n', 4),
(223, 'Cotton swabs / Balls\n', 61),
(224, 'Facial cleanser\n', 19),
(225, 'Facial tissue\n', 40),
(226, 'Feminine products\n', 12),
(227, 'Floss\n', 32),
(228, 'Hair gel / Spray\n', 47),
(229, 'Lip balm\n', 37),
(230, 'Moisturizing lotion\n', 7),
(231, 'Mouthwash\n', 27),
(232, 'Razors / Shaving cream\n', 72),
(233, 'Shampoo / Conditioner\n', 65),
(234, 'Sunblock\n', 16),
(235, 'Toilet paper\n', 29),
(236, 'Toothpaste\n', 49),
(237, 'Vitamins / Supplements\n', 84),
(238, 'Medicine\n', 51),
(239, 'Allergy\n', 45),
(240, 'Antibiotic\n', 99),
(241, 'Antidiarrheal\n', 90),
(242, 'Aspirin\n', 76),
(243, 'Antacid\n', 61),
(244, 'Band-aids / Medical\n', 28),
(245, 'Cold / Flu / Sinus\n', 4),
(246, 'Pain reliever\n', 38),
(247, 'Prescription pick-up\n', 29),
(248, 'Kitchen\n', 12),
(249, 'Aluminum foil\n', 66),
(250, 'Napkins\n', 46),
(251, 'Non-stick spray\n', 71),
(252, 'Paper towels\n', 69),
(253, 'Plastic wrap\n', 49),
(254, 'Sandwich / Freezer bags\n', 32),
(255, 'Wax paper\n', 87),
(256, 'Cleaning products\n', 89),
(257, 'Air freshener\n', 43),
(258, 'Bathroom cleaner\n', 19),
(259, 'Bleach / Detergent\n', 36),
(260, 'Dish / Dishwasher soap\n', 80),
(261, 'Garbage bags\n', 25),
(262, 'Glass cleaner\n', 62),
(263, 'Mop head / Vacuum bags\n', 51),
(264, 'Sponges / Scrubbers\n', 90),
(265, 'Office supplies\n', 78),
(266, 'CDRs / DVDRs\n', 80),
(267, 'Notepad / Envelopes\n', 38),
(268, 'Glue / Tape\n', 61),
(269, 'Printer paper\n', 30),
(270, 'Pens / Pencils\n', 83),
(271, 'Postage stamps\n', 59),
(272, 'Other stuff\n', 20),
(273, 'Automotive\n', 58),
(274, 'Batteries\n', 20),
(275, 'Charcoal / Propane\n', 47),
(276, 'Flowers / Greeting card\n', 62),
(277, 'Insect repellent\n', 58),
(278, 'Light bulbs\n', 75),
(279, 'Newspaper / Magazine\n', 73),
(280, 'Random impulse buy\n', 23),
(281, 'Carcinogens\n', 21),
(282, 'Arsenic\n', 44),
(283, 'Asbestos\n', 92),
(284, 'Cigarettes\n', 70),
(285, 'Radionuclides\n', 76),
(286, 'Vinyl chloride\n', 79);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `secret_question` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `secret_answer` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `is_admin` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `secret_question`, `secret_answer`, `password_hash`, `is_admin`) VALUES
(1, 'Admin', 'Admin', 'admin', 'What was your first school?', '1234567890', 'e327', 1),
(2, 'A', 'B', 'a@b.com', 'What was the name of your first pet?', 'Steve', '0e84', 0),
(3, 'C', 'D', 'c@d.com', 'What was your town of birth?', 'Town', '3cf9', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `search`
--
ALTER TABLE `search`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `search`
--
ALTER TABLE `search`
  MODIFY `product_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=287;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
