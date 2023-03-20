-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2018 at 06:45 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ict`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `a_id` int(4) NOT NULL COMMENT 'Admin ID',
  `a_name` varchar(30) NOT NULL COMMENT 'Admin Name',
  `a_uname` varchar(15) NOT NULL COMMENT 'Admin Username',
  `a_password` varchar(15) NOT NULL COMMENT 'admin Password'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`a_id`, `a_name`, `a_uname`, `a_password`) VALUES
(1, 'santosh', 'Santosh Subedi', 'santosh'),
(2, 'suved', 'Suved Gadtoula', 'suved'),
(3, 'pradeep', 'Pradeep katwal', 'pradeep');

-- --------------------------------------------------------

--
-- Table structure for table `cart_info`
--

CREATE TABLE `cart_info` (
  `cart_id` int(5) NOT NULL,
  `u_id` int(5) NOT NULL COMMENT 'ID of user',
  `p_id` int(5) NOT NULL COMMENT 'ID of products',
  `p_qty` int(5) NOT NULL COMMENT 'quantity of product added in cart'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_info`
--

INSERT INTO `cart_info` (`cart_id`, `u_id`, `p_id`, `p_qty`) VALUES
(5, 3, 29, 2),
(8, 3, 25, 1),
(9, 3, 3, 1),
(10, 3, 26, 1),
(11, 3, 24, 8);

-- --------------------------------------------------------

--
-- Table structure for table `order_info`
--

CREATE TABLE `order_info` (
  `o_id` int(5) NOT NULL,
  `u_id` int(5) NOT NULL,
  `p_id` int(5) NOT NULL,
  `o_date` date NOT NULL,
  `o_qty` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_info`
--

INSERT INTO `order_info` (`o_id`, `u_id`, `p_id`, `o_date`, `o_qty`) VALUES
(1, 1, 3, '2018-08-10', 5),
(2, 1, 4, '2018-08-18', 12),
(3, 1, 4, '2018-08-18', 12),
(4, 5, 2, '0000-00-00', 4),
(5, 5, 22, '0000-00-00', 5),
(6, 5, 6, '0000-00-00', 2),
(7, 5, 1, '0000-00-00', 5),
(8, 5, 3, '0000-00-00', 5),
(9, 5, 25, '0000-00-00', 1),
(10, 5, 22, '0000-00-00', 1),
(11, 5, 32, '0000-00-00', 1),
(12, 5, 1, '0000-00-00', 1),
(13, 5, 6, '0000-00-00', 55),
(14, 5, 2, '0000-00-00', 20),
(15, 5, 3, '0000-00-00', 20);

-- --------------------------------------------------------

--
-- Table structure for table `p_info`
--

CREATE TABLE `p_info` (
  `p_id` int(5) NOT NULL COMMENT 'Product ID',
  `p_name` varchar(100) NOT NULL COMMENT 'Name of the product',
  `p_price` int(5) NOT NULL COMMENT 'Price of the Product',
  `p_qty` int(5) NOT NULL COMMENT 'Quantity of the product',
  `p_image` varchar(100) NOT NULL COMMENT 'Image location of the product',
  `p_category` varchar(30) NOT NULL COMMENT 'Category of the product ',
  `p_des` varchar(500) NOT NULL COMMENT 'description about the product',
  `p_type` varchar(50) NOT NULL COMMENT 'To definr whether the product is perishable or not',
  `p_extra` varchar(50) DEFAULT NULL COMMENT 'for featured, and newly added ',
  `keywords` varchar(100) NOT NULL COMMENT 'keywords for search',
  `rating` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_info`
--

INSERT INTO `p_info` (`p_id`, `p_name`, `p_price`, `p_qty`, `p_image`, `p_category`, `p_des`, `p_type`, `p_extra`, `keywords`, `rating`) VALUES
(1, 'Madhur Sugar', 209, 94, 'product_image\\madhursugar.png', 'grocery&staples', 'Madhur brand Crystal Sugar in 5 kg with max 25 months shelf life', 'Non-Perishable', 'f', 'sugar, chini, sugarcane, sug, sweets', 0),
(2, 'Sunrich Refined Sunflower Oil ', 88, 76, 'product_image\\Sunrich.png', 'grocery&staples', 'Refined Processed Cooking oil available in 1 Ltr Pack', 'Non-Perishable', 'n', 'oil, sunflower, cooking,refined, sun, flower, ', 0),
(3, 'Pro Nature Organic Toor Dal', 148, 75, 'product_image\\toordal.png', 'grocery&staples', 'Natural and Organic Toor dal of 1KG', 'Non-Perishable', NULL, 'organic, toor, dal, natural, nature, pro, daal', 0),
(4, 'Aashirvaad Superior MP Atta', 353, 100, 'product_image\\asirbadaata.png', 'grocery&staples', 'Whole_Wheat Flour in 10 KG pack', 'Non-Perishable', 'n', 'aashirvaad, superior, mp, atta, wheat, roti', 0),
(5, 'Nandini Good Life Toned Milk', 25, 100, 'product_image\\nandini.png', 'grocery&staples', 'Plain Good Life Toned Milk of 200 ml', 'Non-Perishable', NULL, 'milk, toned, good, life, good life, nandini', 0),
(6, 'MTR Lal Mirch Chilli Powder', 25, 43, 'product_image\\mtrlal.png', 'grocery&staples', 'Grinned Local and Organic Chilli of 90gram pack', 'Non-Perishable', 'f', 'mirchi, chilli powder, lal, mtr,', 0),
(7, 'Fresh Palak', 20, 100, 'product_image\\palak.png', 'fruits&vegetables', 'With a sweet, nutty and tangent flavour, Palaks are green leafy vegetables.', 'Perishable', NULL, 'palak,fresh,green,saag,vegetable', 0),
(8, 'Fresh Mushroom', 200, 100, 'product_image\\mushroom.png', 'fruits&vegetables', 'Buttom mushrooms are very small sized mushrooms with smooth round caps and short stems', 'Perishable', NULL, 'mushroom,chyau,vegetable', 0),
(9, 'Ginger', 99, 100, 'product_image\\ginger.png', 'fruits&vegetables', 'Firm and fibrous ginger roots are stretched with multiple fingers for 1 kg', 'Perishable', NULL, 'herb,ginger,adhuwa', 0),
(10, 'Safal Frozen - Green Peas 500 gm', 65, 100, 'product_image\\greenpeas.png', 'fruits&vegetables', 'Safal peas are picked from the green fields of north India and frozen while still fresh.', 'Perishable', NULL, 'green peas, pea, peas, matar', 0),
(11, 'Fresh Apple (4 pcs)', 180, 100, 'product_image\\apple.png', 'fruits&vegetables', 'Apple from Fuji are the sweetest of all.', 'Perishable', NULL, 'apple, fruit, syau', 0),
(12, 'Fresh Banana (1 KG)', 70, 100, 'product_image\\banana.png', 'fruits&vegetables', 'Tiny and small sized, this variety is called Yelakki in Bangalore and Elaichi in Mumbai.', 'Perishable', NULL, 'banana, kola, kera', 0),
(13, 'Harpic Toilet Cleaner  (750 ml)', 109, 100, 'product_image\\harpic.png', 'home&hygiene', 'Harpic Germ and Stain Blaster Citrus Liquid Toilet Cleaner', 'Non-Perishable', NULL, 'toilet, cleaner, harpic, house, home', 0),
(14, 'Clinic Plus Shampoo', 145, 100, 'product_image\\clinicplus.png', 'home&hygiene', 'Nourishment & Moisturization, Shampoo,Ideal For Women but\r\nsuitable For  All Hair Types', 'Non-Perishable', 'f', 'wash,bath,head,clinic,clinicplus', 0),
(15, 'Set Wet Deodorant Spray (450 ml, Pack of 3)', 424, 100, 'product_image\\setwet.png', 'home&hygiene', 'This deo set envelops you in masculine fragrances that stay intact all day long. These products are completely safe on your skin', 'Non-Perishable', NULL, 'setwet,wet,hair,gel,wax', 0),
(16, 'Colgate Toothpaste (300 g)', 115, 100, 'product_image\\colgate.png', 'home&hygiene', 'Colgate Strong Teeth Toothpaste  (Rs 16 Savings Pack)  ', 'Non-Perishable', NULL, 'teeth,colgate,hygine', 0),
(17, 'Pears Bathing Bar', 250, 100, 'product_image\\bathingbar.png', 'home&hygiene', 'Provides 30 times more moisturizing benefits than regular soaps and contain conditioning agents which hydrate your skin.', 'Non-Perishable', 'f', 'bath,wash,soap,bathing soap', 0),
(18, 'Weikfield Caramel Pudding Mix 65 g', 45, 100, 'product_image\\pudding.png', 'bakery&diary', 'Suitable for Dessert. Pure Vegetarian ', 'Non-Perishable', NULL, 'pudding,sweet,eat', 0),
(19, 'Weikfield 2 Minute Cake Mix Chocolate Flavour 100 g', 40, 100, 'product_image\\2mincake.png', 'bakery&diary', '2 Minute Cake Mix Chocolate Flavor, Pure vegetarian ', 'Non-Perishable', 'n', 'cake,bakery,birthday', 0),
(20, ' Mapro Toppings Chocolate Syrups Liquid  (500 ml)', 180, 100, 'product_image\\mapro.png', 'bakery&diary', 'Best for use in topping cake. pure vegetarian ', 'Non-Perishable', 'n', 'mapro,topping,chocolate', 0),
(21, 'Osmania Biscuits  (400 g)', 140, 100, 'product_image\\osmania.png', 'bakery&diary', 'Karachi Bakery Plain Flavor Osmania Biscuits no cholesterol ', 'Non-Perishable', NULL, 'biscuits,snack', 0),
(22, 'Kwality Baking Powder  (100 g)', 40, 94, 'product_image\\bakingpowder.png', 'bakery&diary', 'Pure vegetarian baking powder ', 'Non-Perishable', 'f', 'veg,baking,powder', 0),
(23, 'Real Fruit Juice Mixed 1 L', 180, 100, 'product_image\\realjuice.png', 'beverages', 'Fresh and Nutritious Mixed Fruit Juice in Tetrapack', 'Non-Perishable', NULL, 'real,juice', 0),
(24, 'Tang Lemon Instant Drink Mix  (500 g)', 190, 100, 'product_image\\tang.png', 'beverages', 'Can be dissolved in Water to made 5 ltr of juice', 'Non-Perishable', NULL, 'tang,juice', 0),
(25, 'Coca-Cola 750 ml (Plastic Bottle)', 75, 99, 'product_image\\coke.png', 'beverages', 'Coca-cola without Trans Fat in Plastic bottle', 'Non-Perishable', 'f', 'coke,coca,cola,drink,cold', 0),
(26, 'Pediasure Vanilla Delight Health Drink', 846, 100, 'product_image\\pediasure.png', 'beverages', 'Carton Pediasure Vanilla Delight Health drink 750 g', 'Non-Perishable', 'n', 'vanila,pediasure', 0),
(27, 'Tata Gold Tea  (250 g, Pouch)', 140, 100, 'product_image\\tatatea.png', 'beverages', 'Organic Tea from Darjeling ', 'Non-Perishable', NULL, 'tea,gold,tata', 0),
(28, 'BRU Super Strong Instant Coffee 500 g', 545, 100, 'product_image\\coffee.png', 'beverages', 'Unflavored BRU Super Strong Instant Coffee', 'Non-Perishable', NULL, 'coffee,bru,hot', 0),
(29, 'Hershey\'s Cocoa Powder  (225 g)', 350, 100, 'product_image\\coco.png', 'bakery&diary', 'Hershey\'s Cocoa Powder in Plastic Bottle. Pure vegetarian with 12 months shelf life', 'Non-Perishable', 'n', 'hershey,cocoa,coco', 0),
(30, 'Arna Beer', 350, 100, 'product_image\\arna.png', 'beverages', 'Nepali BEER brewed from local and organic Wheat and Maize', 'Non-Perishable', '', 'beer,arna,drink', 0),
(31, 'Mango', 150, 140, 'product_image\\mango.png', 'fruits&vegetables', 'mango from mountain', 'Perishable', '', 'mango,fruit', 0),
(32, 'Carlsburg Beer', 350, 99, 'product_image\\carlsberg.png', 'beverages', 'Chilled beer ready to enjoy', 'Non-Perishable', 'f', 'carlsberg,beer,drink', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `u_id` int(4) NOT NULL COMMENT 'user ID',
  `u_name` varchar(30) NOT NULL COMMENT 'username',
  `u_num1` varchar(10) NOT NULL COMMENT 'User Number First',
  `u_mail` varchar(30) NOT NULL COMMENT 'User Email ID',
  `u_add` varchar(100) NOT NULL COMMENT 'User Address',
  `u_password` varchar(15) NOT NULL COMMENT 'User Password'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`u_id`, `u_name`, `u_num1`, `u_mail`, `u_add`, `u_password`) VALUES
(1, 'Santosh Subedi', '9841293622', 'subedikanch00@gmail.com', 'Sanothimi, Bhaktapur', 'santosh'),
(3, 'Suved Gadtoula', '9842534914', 'suv_ed@outlook.com', 'Bhatke ko Pul', 'suved'),
(4, 'Pradeep Katwal', '9842521500', 'pradeepkatwal15@gmail.com', 'Thimi, Bhaktapur', 'pradeep'),
(5, 'Gita Subedi', '9847045100', 'gita@gmail.com', 'PA.NI.KA, Bhaktapur', '12345'),
(11, '', '', '', '', ''),
(13, 'lochan ', '9876543210', 'locahan@gmail.com', 'jhapa', '123456'),
(14, 'kanchan', '9876543211', 'kanchan@gmail.com', 'baneshwor', '123123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`a_id`),
  ADD UNIQUE KEY `a_id` (`a_id`);

--
-- Indexes for table `cart_info`
--
ALTER TABLE `cart_info`
  ADD PRIMARY KEY (`cart_id`),
  ADD UNIQUE KEY `cart_id` (`cart_id`);

--
-- Indexes for table `order_info`
--
ALTER TABLE `order_info`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `p_info`
--
ALTER TABLE `p_info`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `u_num1` (`u_num1`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `a_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'Admin ID', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart_info`
--
ALTER TABLE `cart_info`
  MODIFY `cart_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_info`
--
ALTER TABLE `order_info`
  MODIFY `o_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `p_info`
--
ALTER TABLE `p_info`
  MODIFY `p_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Product ID', AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `u_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'user ID', AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
