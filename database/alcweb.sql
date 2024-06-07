-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2024 at 12:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alcweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(4) NOT NULL,
  `first_name` text NOT NULL,
  `second_name` text NOT NULL,
  `third_name` text NOT NULL,
  `middle_name` text NOT NULL,
  `last_name` text NOT NULL,
  `suffix` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact_number` text NOT NULL,
  `email` varchar(70) NOT NULL,
  `loginID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `billingID` int(11) NOT NULL,
  `loginID` int(11) DEFAULT NULL,
  `customerID` int(11) DEFAULT NULL,
  `card_type` varchar(50) NOT NULL,
  `transactionID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Bags'),
(2, 'Gloves'),
(3, 'Hats'),
(4, 'Jackets'),
(5, 'Shoes'),
(6, 'Wallets');

-- --------------------------------------------------------

--
-- Table structure for table `courier`
--

CREATE TABLE `courier` (
  `courierID` int(10) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerID` int(10) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `second_name` varchar(20) NOT NULL,
  `third_name` varchar(20) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerID`, `first_name`, `second_name`, `third_name`, `middle_name`, `last_name`, `suffix`, `email`, `contact_number`, `address`, `country`) VALUES
(1, 'Seymour', 'No', 'Middle', 'Needed', 'Butz', 'Sr.', 'seymourbutt@email.com', '09658746321', 'Ozamis', 'Philippines'),
(2, 'Al', 'Come', 'Right', 'Back', 'Beback', ' Jr.', 'illbeback@email.com', '09876541287', 'Aloran', 'Philippines'),
(3, 'Janny', '', '', 'P.', 'Abu-abu', 'n/a', 'janny@gmail.com', '09876543215', 'Col. Alto, Sinacaban, Mis. Occ.', 'Philippines'),
(4, 'Justin', 'Always', 'Be', 'Ready', 'Case', 'III', 'justincase@email.com', '09638574125', 'Oroquieta', 'Philippines'),
(5, 'Ima', 'Always', 'Hungry', 'For', 'Pigg', '', 'imapigwhat@email.com', '09658741214', 'Sinacaban', 'Philippines'),
(6, 'Butsukoy', '', '', 'Ikaw', 'Sila', 'n/a', 'janny@gmail.com', '09876543212', 'CDO', 'Philippines'),
(7, 'Hugh', 'Big', 'Really', 'Juicy', 'Jass', 'n/a', 'hughjass@email.com', '09658742154', 'Davao', 'Philippines'),
(8, 'Seymour', 'No', 'Middle', 'Needed', 'Butz', 'Sr.', 'seymour@email.com', '09786953841', 'Manila', 'Philippines'),
(9, 'Al', 'Come', 'Right', 'Back', 'Beback', 'Jr.', 'al@email.com', '09518678156', 'Quezon City', 'Philippines'),
(10, 'Justin', 'Always', 'Be', 'Ready', 'Case', 'III', 'justin@email.com', '09132529283', 'Cebu City', 'Philippines'),
(11, 'Ima', 'Always', 'Hungry', 'For', 'Pigg', 'IV', 'ima@email.com', '09806611974', 'Davao City', 'Philippines'),
(12, 'Hugh', 'Big', 'Really', 'Large', 'Jass', 'Sr.', 'hugh@email.com', '09835472053', 'Pasig', 'Philippines'),
(13, 'Anita', 'Wants', 'A', 'Good', 'Bath', 'Jr.', 'anita@email.com', '09757524371', 'Taguig', 'Philippines'),
(14, 'Barry', 'Always', 'Be', 'Safe', 'Cade', 'III', 'barry@email.com', '09281205725', 'Makati', 'Philippines'),
(15, 'Ben', 'Always', 'Been', 'Really', 'Dover', 'IV', 'ben@email.com', '09833455537', 'Caloocan', 'Philippines'),
(16, 'Bea', 'Not', 'A', 'Big', 'O\'Problem', 'Sr.', 'bea@email.com', '09527953573', 'Baguio', 'Philippines'),
(17, 'Cole', 'Sharp', 'And', 'Clean', 'Kutz', 'Jr.', 'cole@email.com', '09909777111', 'Antipolo', 'Philippines'),
(18, 'Paige', 'Always', 'Be', 'Reading', 'Turner', 'III', 'paige@email.com', '09165024869', 'Las Piñas', 'Philippines'),
(19, 'Bill', 'Big', 'Bold', 'And', 'Board', 'IV', 'bill@email.com', '09695793035', 'Marikina', 'Philippines'),
(20, 'Chris', 'Loves', 'Pork', 'And', 'Bacon', 'Sr.', 'chris@email.com', '09183890601', 'Mandaluyong', 'Philippines'),
(21, 'Barb', 'Keeps', 'You', 'Safe', 'Dwyer', 'Jr.', 'barb@email.com', '09532073925', 'Parañaque', 'Philippines'),
(22, 'Tim', 'Falls', 'On', 'The', 'Burr', 'III', 'tim@email.com', '09208697852', 'Valenzuela', 'Philippines'),
(23, 'Luka', '', '', 'Irving', 'Washington', 'n/a', 'hanzleemar@gmail.com', '09876543217', 'Dallas', 'Philippines'),
(24, 'Luka', '', '', 'Irving', 'Washington', 'n/a', 'hanzleemar@gmail.com', '09876543216', 'Dallas', 'Philippines'),
(25, 'Luka', '', '', 'Irving', 'Washington', 'n/a', 'hanzleemar@gmail.com', '09876543212', 'Dallas', 'Philippines'),
(26, 'Luka', '', '', 'Irving', 'Washington', 'n/a', 'hanzleemar@gmail.com', '0987654321', 'Dallas', 'Philippines'),
(27, 'Johnny', '', '', ' ', 'English', ' ', 'tisuy@gmail.com', '0987654321', 'Davao', 'Philippines');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `loginID` int(10) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `customerID` int(11) DEFAULT NULL,
  `adminID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`loginID`, `username`, `password`, `customerID`, `adminID`) VALUES
(1, 'Abu-abu', 'abuabu123', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `customerID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `order_date`, `customerID`, `productID`, `quantity`, `total_amount`) VALUES
(1, '2024-04-30', 1, 1, 1, 159),
(2, '2024-04-30', 2, 1, 1, 159),
(3, '2024-04-30', 3, 2, 1, 189),
(4, '2024-04-30', 4, 1, 1, 159),
(5, '2024-04-30', 5, 1, 1, 159),
(6, '2024-04-30', 6, 15, 5, 645),
(7, '2024-05-30', 7, 5, 1, 49),
(8, '2024-05-30', 8, 6, 1, 59),
(9, '2024-05-30', 9, 6, 1, 59),
(10, '2024-05-30', 10, 6, 1, 59),
(11, '2024-05-30', 11, 6, 1, 59),
(12, '2024-06-02', 20, 4, 1, 70),
(13, '2024-06-02', 20, 2, 1, 189),
(14, '2024-06-02', 21, 4, 1, 70),
(15, '2024-06-02', 21, 5, 1, 49),
(16, '2024-06-02', 21, 2, 1, 189),
(17, '2024-06-02', 22, 2, 1, 189),
(18, '2024-06-02', 22, 5, 1, 49),
(19, '2024-06-02', 23, 5, 2, 98),
(20, '2024-06-02', 23, 2, 1, 189),
(21, '2024-06-04', 24, 2, 1, 189),
(22, '2024-06-04', 24, 3, 1, 179),
(23, '2024-06-04', 24, 1, 1, 159),
(24, '2024-06-05', 25, 2, 1, 189),
(25, '2024-06-05', 25, 1, 1, 159),
(26, '2024-06-06', 26, 1, 5, 795),
(27, '2024-06-06', 26, 1, 5, 795),
(28, '2024-06-06', 27, 4, 1, 70),
(29, '2024-06-06', 27, 1, 1, 159);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(5) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_quantity` int(5) NOT NULL,
  `product_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `category_id`, `product_image`, `product_name`, `product_description`, `product_quantity`, `product_price`) VALUES
(1, 1, 'Images/Bag/black_bag.png', 'Classic Black Cow Leather Bag', 'Introducing the \"Classic Black Cow Leather Bag\", a versatile accessory designed for both style and functionality. Crafted from premium cow leather, this Classic Black Cow Leather Bag combines elegance with durability.\r\n', 19, 159),
(2, 1, 'Images/Bag/brown_bag.png', 'Stylish Brown Cow Leather Messenger Bag', 'Introducing the \"Stylish Brown Cow Leather Messenger Bag,\" a sophisticated accessory perfect for the modern professional. Crafted from high-quality cowhide leather, this Stylish Brown Cow Leather Messenger Bag offers both style and functionality.\r\n', 17, 189),
(3, 1, 'Images/Bag/tan_bag.png', 'Elegant Tan Cow Leather Tote Bag', 'Introducing the \"Elegant Tan Cow Leather Tote Bag,\" a chic accessory that combines style and practicality effortlessly. Crafted from premium cow leather, this Elegant Tan Cow Leather Tote Bag is perfect for everyday use.\r\n', 17, 179),
(4, 2, 'Images/Gloves/b&w_gloves.png', 'Elegant Black and White Cow Leather Gloves', 'Introducing the \"Elegant Black and White Cow Leather Gloves,\" a sophisticated accessory crafted with precision and style in mind. Made from premium cow leather, each pair of Elegant Black and White Cow Leather Gloves features a unique color contrast design for a striking look.\r\n', 19, 70),
(5, 2, 'Images/Gloves/black_gloves.png', 'Classic Black Cow Leather Gloves', 'Introducing the \"Classic Black Cow Leather Gloves,\" a timeless accessory crafted with precision and style in mind. Made from genuine cow leather, each pair of Classic Black Cow Leather Gloves offers both elegance and durability.\r\n', 25, 49),
(6, 2, 'Images/Gloves/brown_gloves.png', 'Stylish Brown Cow Leather Gloves', 'Introducing the \"Stylish Brown Cow Leather Gloves,\" a versatile accessory crafted with precision and style in mind. Made from high-quality cowhide leather, each pair of Stylish Brown Cow Leather Gloves boasts a luxurious feel and timeless design.\r\n', 21, 59),
(7, 3, 'Images/Hat/black_hat.png', 'Classic Black Cow Leather Hat', 'Introducing the \"Classic Black Cow Leather Hat,\" a timeless accessory crafted with precision and style in mind. Made from genuine cow leather, each Classic Black Cow Leather Hat combines elegance with durability for a versatile addition to your wardrobe.\r\n', 30, 49),
(8, 3, 'Images/Hat/blackfedorahat.png', 'Sleek Black Cow Leather Fedora\r\n', 'Introducing the \"Sleek Black Cow Leather Fedora,\" a stylish accessory crafted with precision and sophistication in mind. Made from premium cow leather, each Sleek Black Cow Leather Fedora exudes class and elegance, perfect for adding a touch of refinement to any ensemble.\r\n', 35, 69),
(9, 3, 'Images/Hat/brown_hat.png', 'Distressed Brown Cow Leather Hat\r\n', 'Introducing the \"Distressed Brown Cow Leather Hat,\" a rugged accessory crafted with precision and style in mind. Made from high-quality distressed cowhide leather, each Distressed Brown Cow Leather Hat boasts a unique vintage look that adds character to any outfit.\r\n', 25, 59),
(10, 4, 'Images/Jacket/bicker_jacket.png', 'Slim Fit Cow Leather Biker Jacket', 'Introducing the \"Slim Fit Cow Leather Biker Jacket,\" a sleek masterpiece crafted with precision and style in mind. Made from premium cow leather, each Slim Fit Cow Leather Biker Jacket features an asymmetrical front zipper closure and zippered cuffs for a modern biker look\r\n', 20, 279),
(11, 4, 'Images/Jacket/black_jacket.png', 'Classic Black Cow Leather Jacket', 'Introducing the \"Classic Black Cow Leather Jacket,\" a timeless piece crafted with precision and style in mind. Made from the finest cowhide, each Classic Black Cow Leather Jacket is a testament to both elegance and durability.\r\n', 20, 199),
(12, 4, 'Images/Jacket/brown_jacket.png', 'Vintage Brown Cow Leather Jacket', 'Introducing the \"Vintage Brown Cow Leather Jacket,\" a rugged masterpiece crafted with precision and style in mind. Made from high-quality cowhide leather, each Vintage Brown Cow Leather Jacket boasts a unique distressed finish for a timeless vintage look.', 20, 249),
(13, 5, 'Images/Shoes/black_shoes.png', 'Classic Black Cow Leather Shoes', 'Introducing the \"Classic Black Cow Leather Shoes,\" a timeless pair crafted with precision and style in mind. Made from genuine cow leather, each Classic Black Cow Leather Shoes offers durability and sophistication.\r\n', 30, 149),
(14, 5, 'Images/Shoes/brown_shoes.png', 'Urban Brown Cow Leather Shoes', 'Introducing the \"Urban Brown Cow Leather Shoes,\" a stylish pair designed for the modern city dweller. Made from high-quality cowhide leather, each Urban Brown Cow Leather Shoes boasts a sleek design and superior craftsmanship.', 25, 179),
(15, 5, 'Images/Shoes/tan_shoes.png', 'Casual Tan Cow Leather Shoes', 'Introducing the \"Casual Tan Cow Leather Shoes,\" a versatile pair perfect for everyday wear. Made from premium cow leather, each Casual Tan Cow Leather Shoes offers comfort, style, and durability.', 30, 129),
(16, 6, 'Images/Wallet/black_wallet.png', 'Classic Black Cow Leather Wallet', 'Introducing the \"Classic Black Cow Leather Wallet,\" a sleek accessory crafted with precision and style in mind. Made from genuine cowhide leather, each Classic Black Cow Leather Wallet offers durability and sophistication.', 30, 59),
(17, 6, 'Images/Wallet/brown_wallet.png', 'Distressed Brown Cow Leather Wallet', 'Introducing the \"Distressed Brown Cow Leather Wallet,\" a rugged accessory crafted with precision and style in mind. Made from high-quality distressed cowhide leather, each Distressed Brown Cow Leather Wallet exudes vintage charm and durability.', 25, 69),
(18, 6, 'Images/Wallet/darkbrown_wallet.png', 'Sleek Dark Brown Cow Leather Wallet', 'Introducing the \"Sleek Dark Brown Cow Leather Wallet,\" a minimalist accessory crafted with precision and style in mind. Made from premium cow leather, each Sleek Dark Brown Cow Leather Wallet offers functionality and elegance.', 35, 79);

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `detailID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `color` varchar(50) DEFAULT NULL,
  `material` varchar(50) DEFAULT NULL,
  `style` varchar(50) DEFAULT NULL,
  `feature1` text DEFAULT NULL,
  `feature2` text NOT NULL,
  `feature3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`detailID`, `productID`, `color`, `material`, `style`, `feature1`, `feature2`, `feature3`) VALUES
(1, 1, 'Black', 'Genuine cow leather', 'Classic', 'Spacious main compartment ', 'Adjustable shoulder strap', 'Interior zip pocket'),
(2, 2, 'Brown', 'Cowhide leather', 'Messenger', 'Adjustable crossbody strap', 'Multiple compartments for organization', 'Flap closure with magnetic snaps'),
(3, 3, 'Tan', 'Genuine cow leather', 'Tote', 'Top zip closure ', 'Dual carrying handles', 'Interior slip pockets for organization'),
(4, 4, 'Black and White', 'Premium cow leather', 'Elegant', 'Contrast color stitching for added detail', 'Soft and luxurious feel', 'Warm and comfortable lining'),
(5, 5, 'Black', 'Genuine cow leather', 'Classic', 'Soft and supple leather', 'Elasticized wrist for a comfortable fit', 'Warm fleece lining'),
(6, 6, 'Brown', 'High-quality cowhide leather', 'Modern', 'Touchscreen compatibility for convenience', 'Adjustable strap for a customized fit', 'Insulated lining for warmth'),
(7, 7, 'Black', 'Genuine cow leather', 'Classic', 'Adjustable strap for a customized fit', 'Stylish brim for sun protection', ''),
(8, 8, 'Black', 'Premium cow leather', 'Fedora', 'Classic fedora design with a modern twist', 'Grosgrain ribbon band for added style', ''),
(9, 9, 'Brown', 'Distressed cowhide leather', 'Vintage', 'Distressed finish for a rugged appearance', 'Adjustable chin strap for secure fit', ''),
(10, 10, 'Dark Brown', 'Premium cow leather', 'Biker', 'Symmetrical front zipper closure', 'Zippered cuffs ', 'Snap-button collar'),
(11, 11, 'Black', 'Genuine cow leather', 'Classic', 'Distressed finish for a rugged look', 'Two chest pockets with snap closure', 'Inner lining for warmth and comfort'),
(12, 12, 'Brown', 'High-quality cowhide leather', 'Vintage', 'Front zipper closure', 'Two side pockets', 'Two chest pockets with snap closure'),
(13, 13, 'Black', 'Genuine cow leather', 'Classic', 'Lace-up closure', 'Cushioned insole for comfort', 'Durable rubber outsole'),
(14, 14, 'Brown', 'High-quality cowhide leather', 'Urban', 'Slip-on design', 'Elastic side panels for easy on and off', 'Leather lining for breathability'),
(15, 15, 'Tan', 'Premium cow leather', 'Casual', 'Contrast stitching detail', 'Textured rubber sole for traction', 'Padded collar for added comfort'),
(16, 16, 'Black', 'Genuine cowhide leather', 'Classic', 'Bi-fold design', 'Multiple card slots', 'Currency compartment'),
(17, 17, 'Brown', 'Distressed cowhide leather', 'Vintage', 'Slim design', 'Card slots and ID window', 'Coin pocket with snap closure'),
(18, 18, 'Dark Brown', 'Premium cow leather', 'Modern', 'Tri-fold design', 'Multiple card slots and compartments', 'Transparent ID window');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transactionID` int(5) NOT NULL,
  `transaction_number` varchar(15) NOT NULL,
  `customerID` int(5) NOT NULL,
  `orderID` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transactionID`, `transaction_number`, `customerID`, `orderID`, `status`) VALUES
(2, '66303b001d49d', 2, 2, 'delivered'),
(3, '66303c1f6638b', 3, 3, 'delivered'),
(4, '66308c6160194', 4, 4, 'delivered'),
(5, '66309031b2770', 5, 5, 'delivered'),
(6, '6630a485e80b0', 6, 6, 'delivered'),
(7, '6657b79ecd765', 7, 7, 'delivered'),
(8, '6657d0fd2719e', 8, 8, 'delivered'),
(9, '6657d11f458de', 9, 9, 'delivered'),
(10, '6657d11f458de', 10, 10, 'delivered'),
(11, '6657d11f458de', 11, 11, 'delivered'),
(12, '665c42bac6b29', 20, 12, 'delivered'),
(13, '665c42bac6b29', 20, 13, 'delivered'),
(14, '665c480eada64', 21, 14, 'delivered'),
(15, '665c480eada64', 21, 15, 'delivered'),
(16, '665c480eada64', 21, 16, 'delivered'),
(17, '665c48253d490', 22, 17, 'delivered'),
(18, '665c48253d490', 22, 18, 'delivered'),
(19, '665ce917a8a64', 23, 19, 'delivered'),
(20, '665ce917a8a64', 23, 20, 'delivered'),
(21, '665ed7707b124', 24, 21, 'pending'),
(22, '665ed7707b124', 24, 22, 'delivered'),
(23, '665ed7707b124', 24, 23, 'delivered'),
(24, '665ff69eddd9d', 25, 24, 'pending'),
(25, '665ff69eddd9d', 25, 25, 'delivered'),
(26, '6660ef3385872', 26, 26, 'pending'),
(27, '6660ef3385872', 26, 27, 'pending'),
(28, '66610ae158ea5', 27, 28, 'pending'),
(29, '66610ae158ea5', 27, 29, 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `fk_admin_login` (`loginID`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`billingID`),
  ADD KEY `loginID` (`loginID`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `transactionID` (`transactionID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `courier`
--
ALTER TABLE `courier`
  ADD PRIMARY KEY (`courierID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`loginID`),
  ADD KEY `fk_login_customers` (`customerID`),
  ADD KEY `fk_login_admin` (`adminID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`detailID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transactionID`),
  ADD KEY `fk_orderID` (`orderID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `billingID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `courier`
--
ALTER TABLE `courier`
  MODIFY `courierID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `loginID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `detailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transactionID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_admin_login` FOREIGN KEY (`loginID`) REFERENCES `login` (`loginID`);

--
-- Constraints for table `billing`
--
ALTER TABLE `billing`
  ADD CONSTRAINT `billing_ibfk_1` FOREIGN KEY (`loginID`) REFERENCES `login` (`loginID`),
  ADD CONSTRAINT `billing_ibfk_2` FOREIGN KEY (`customerID`) REFERENCES `customers` (`customerID`),
  ADD CONSTRAINT `billing_ibfk_3` FOREIGN KEY (`transactionID`) REFERENCES `transactions` (`transactionID`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `fk_login_admin` FOREIGN KEY (`adminID`) REFERENCES `admin` (`admin_id`),
  ADD CONSTRAINT `fk_login_customers` FOREIGN KEY (`customerID`) REFERENCES `customers` (`customerID`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `product_details`
--
ALTER TABLE `product_details`
  ADD CONSTRAINT `product_details_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `fk_orderID` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
