-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2023 at 05:32 PM
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
(4, 'Raja', 'Juliet', 'm', '2023-10-14', 'juliet', '$2y$10$IabZbAD9aRbmFdLVd5mUa.6oUGJ95MYVPRZZtbABFexW5NT2BtECW', 1);

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
  `kategori_menu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_makanan`
--

INSERT INTO `data_makanan` (`id_menu`, `nama_menu`, `gambar_menu`, `deskripsi_menu`, `harga_menu`, `kategori_menu`) VALUES
(1, 'Nasi Goreng', 'NasgorBaru.jpeg', 'Nasi goreng adalah hidangan khas Asia Tenggara, terutama Indonesia, yang terdiri dari nasi yang digoreng dengan berbagai bahan seperti daging, udang, telur, sayuran, dan bumbu-bumbu khas seperti bawang putih, bawang merah, kecap manis, dan sambal. Hidangan ini seringkali diberi tambahan saus dan bumbu untuk memberikan rasa yang kaya dan beragam, sehingga setiap variasi nasi goreng bisa memiliki cita rasa yang berbeda-beda. Nasi goreng sering dihidangkan dengan irisan mentimun, tomat, atau telur mata sapi sebagai hiasan, dan bisa disajikan sebagai hidangan utama atau makanan ringan yang lezat.', 10000, 'Sarapan'),
(2, 'Bubur Ayam', 'Bubur.jpeg', 'Bubur ayam adalah hidangan bubur yang berasal dari Indonesia, yang terbuat dari beras yang dimasak dalam kaldu ayam hingga mendapatkan konsistensi yang lembut dan kenyal. Bubur ayam biasanya disajikan panas dan diberi berbagai topping dan bumbu, seperti potongan daging ayam rebus, kerupuk, bawang goreng, seledri, bawang putih goreng, dan kecap manis. Hidangan ini sangat populer sebagai sarapan atau makanan ringan di Indonesia dan memiliki rasa gurih dan lezat dengan sentuhan rempah-rempah yang khas. Bubur ayam juga sering disajikan dalam variasi regional dengan variasi bahan dan bumbu yang berbeda-beda, sehingga memiliki beragam citarasa di seluruh Indonesia.', 12000, 'Sarapan'),
(3, 'Nasi Kuning', 'Naskun.jpg', 'Nasi kuning adalah hidangan tradisional Indonesia yang terbuat dari nasi yang diwarnai kuning dengan bumbu kunyit dan santan kelapa. Hidangan ini sering disebut \"tumpeng\" ketika dihidangkan dalam acara-acara khusus atau perayaan, karena bentuknya yang kerucut dan simbolis dalam budaya Indonesia. Nasi kuning biasanya disajikan dengan berbagai lauk-pauk seperti ayam goreng, telur, kerupuk, ikan, atau hidangan lainnya. Rasanya yang harum dan lembut, serta warna kuning yang cerah membuat nasi kuning menjadi hidangan yang sangat populer dalam budaya kuliner Indonesia dan sering dihidangkan dalam berbagai acara penting.', 80000, 'Sarapan'),
(4, 'Siomay', 'Siomay.jpg', 'Siomay adalah hidangan populer dalam kuliner Indonesia yang terdiri dari sejumlah kecil potongan daging ikan atau ayam yang dicampur dengan tepung, sayuran seperti kubis dan wortel, serta rempah-rempah. Campuran ini kemudian dibungkus dalam kulit pangsit tipis dan diukus hingga matang. Siomay sering disajikan dengan saus kacang gurih dan saus pedas, serta kadang-kadang ditaburi dengan bawang goreng dan seledri cincang untuk memberikan rasa dan tekstur yang beragam. Hidangan ini memiliki cita rasa yang lezat dan tekstur yang lembut, membuatnya menjadi favorit dalam hidangan jajanan jalanan dan restoran di Indonesia.', 15000, 'Kuliner Nusantara'),
(5, 'Bakpao', 'Bakpao.jpg', 'Bakpao, juga dikenal sebagai baozi dalam bahasa Tionghoa, adalah hidangan khas Tiongkok yang terdiri dari adonan yang diisi dengan berbagai jenis isian, seperti daging cincang, sayuran, telur, atau pasta kacang merah. Adonan bakpao biasanya dibuat dari tepung terigu, ragi, gula, dan air, yang kemudian diisi dengan isian sesuai selera dan dikukus hingga matang. Bakpao seringkali memiliki dua jenis, yaitu bakpao dengan adonan berwarna putih dan bakpao dengan adonan berwarna kecokelatan (dikenal sebagai bakpao isi kacang atau bakpao merah). Hidangan ini memiliki rasa yang lembut dan gurih, dan bisa disajikan sebagai makanan ringan atau hidangan utama, tergantung pada jenis dan isian yang digunakan. Bakpao juga populer di berbagai negara Asia Tenggara dan telah menjadi hidangan populer di seluruh dunia.', 7000, 'Jajanan'),
(11, 'Ayam Geprek', 'AyamGeprek.jpg', 'Ayam geprek adalah hidangan yang berasal dari Indonesia yang terdiri dari ayam goreng yang dihaluskan dengan cara digeprek atau dihancurkan dan kemudian disajikan dengan sambal pedas. Ayam yang digunakan bisa berbagai jenis, seperti ayam goreng tepung atau ayam goreng biasa. Hidangan ini terkenal karena kepedasan sambalnya yang menyatu dengan rasa gurih ayam goreng. Ayam geprek seringkali disajikan dengan tambahan nasi putih, telur mata sapi, irisan mentimun, dan kerupuk. Rasanya yang pedas dan gurih menjadikannya salah satu hidangan yang sangat populer di Indonesia, terutama di kalangan pecinta makanan pedas. Ayam geprek juga sering dijumpai di berbagai warung makan dan restoran di Indonesia.', 14000, 'Jajanan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_table`
--
ALTER TABLE `access_table`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data_makanan`
--
ALTER TABLE `data_makanan`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
