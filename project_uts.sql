-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2023 at 12:24 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_uts`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_table`
--

CREATE TABLE `access_table` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender_type` varchar(1) NOT NULL,
  `birth_date` date NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `access_table`
--

INSERT INTO `access_table` (`id`, `first_name`, `last_name`, `gender_type`, `birth_date`, `username`, `password`, `role`) VALUES
(1, 'admin', 'ibn admin', 'm', '2000-01-01', 'admin', '$2y$10$.ih/iZI8wwHL1QIIPJbnHujosQuhDJuipze8MYuEaMw8A8b6X4Ore', 0),
(2, 'Andaru', 'Hymawan', 'm', '2004-02-19', 'andaruHP', '$2y$10$QztekePSFb52wwfQ2ehx2.Gui8GpxwzJ.Y.1h3bQPc7BOI/MX/NtK', 1),
(3, 'Andre', 'Taulany', 'm', '2023-10-14', 'andre', '$2y$10$k5xYlC0Kjgpn7LJUKzU7re/YqEDeVNx48r3jsIk.vTfjM.VxcQwGi', 1),
(4, 'Raja', 'Juliet', 'm', '2023-10-14', 'juliet', '$2y$10$IabZbAD9aRbmFdLVd5mUa.6oUGJ95MYVPRZZtbABFexW5NT2BtECW', 1),
(5, 'Andrew', 'Ko', 'm', '2023-10-21', 'an', '$2y$10$1Gaki8JIYac5IdPa.DWFgecOkvX0xASSr0iYRnoZxAZ56Kdp88uEy', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart_table`
--

CREATE TABLE `cart_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_table`
--

INSERT INTO `cart_table` (`id`, `user_id`, `product_id`, `quantity`) VALUES
(7, 5, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_makanan`
--

CREATE TABLE `data_makanan` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `gambar_menu` varchar(255) NOT NULL,
  `deskripsi_menu` text NOT NULL,
  `harga_menu` int(11) NOT NULL,
  `kategori_menu` enum('Appetizer','Beverages','Main Course','Dessert','Side Dish') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_makanan`
--

INSERT INTO `data_makanan` (`id_menu`, `nama_menu`, `gambar_menu`, `deskripsi_menu`, `harga_menu`, `kategori_menu`) VALUES
(13, 'Salad', 'salad.jpg', 'An appetizer salad, often simply referred to as a salad appetizer, is a light and refreshing dish typically served at the beginning of a meal to whet the appetite. These salads are designed to stimulate the taste buds and prepare diners for the main course. They come in various forms, from simple garden salads with fresh greens and vegetables to more elaborate options that might include fruits, nuts, cheese, or other creative ingredients. Salad appetizers are popular for their crisp textures, bright flavors, and the opportunity to incorporate various dressings or vinaigrettes to enhance the overall dining experience. They offer a healthy and flavorful start to a meal.', 21000, 'Main Course'),
(14, 'Fried Calamari', 'calamari.jpg', 'Fried calamari is a popular appetizer in many Mediterranean and seafood restaurants. It consists of sliced or whole squid, usually coated in a seasoned batter or breadcrumb mixture, and deep-fried until crispy and golden brown. The result is a delightful dish with a combination of crunchy texture on the outside and tender, flavorful squid on the inside. Fried calamari is often served with various dipping sauces, such as marinara sauce, aioli, or a squeeze of lemon for added flavor. It&#039;s a beloved seafood snack that is enjoyed for its delicious taste and appealing texture.', 33500, 'Appetizer'),
(15, 'Nasi Goreng', 'nasgor.jpeg', 'sadmsadsad', 12000, 'Appetizer'),
(16, 'Somay', 'somay.jpg', 'nskkdsksndasnn', 9000, 'Appetizer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_table`
--
ALTER TABLE `access_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_table`
--
ALTER TABLE `cart_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carttouser` (`user_id`),
  ADD KEY `carttofood` (`product_id`);

--
-- Indexes for table `data_makanan`
--
ALTER TABLE `data_makanan`
  ADD PRIMARY KEY (`id_menu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_table`
--
ALTER TABLE `access_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart_table`
--
ALTER TABLE `cart_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `data_makanan`
--
ALTER TABLE `data_makanan`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_table`
--
ALTER TABLE `cart_table`
  ADD CONSTRAINT `carttofood` FOREIGN KEY (`product_id`) REFERENCES `data_makanan` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carttouser` FOREIGN KEY (`user_id`) REFERENCES `access_table` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
