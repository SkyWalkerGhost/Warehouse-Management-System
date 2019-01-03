-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2019 at 03:03 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `production`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_cat` varchar(200) NOT NULL,
  `product_points` varchar(200) NOT NULL,
  `product_price` float NOT NULL,
  `total_price` varchar(300) NOT NULL,
  `product_release_date` varchar(300) NOT NULL,
  `product_expires` varchar(200) NOT NULL,
  `product_upload_time` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_cat`, `product_points`, `product_price`, `total_price`, `product_release_date`, `product_expires`, `product_upload_time`) VALUES
(27, 'SAMSUNG QE55Q7FNAUXRU', 'ტელევიზორი', '104', 4899, '509496', '', '', ''),
(28, 'HITACHI R-H330PUC7 BSL', 'მობილური', '132', 300, '39600', '', '', ''),
(29, 'SAMSUNG T835 BLACK', 'პლანშეტი', '234', 399, '93366', '', '', ''),
(30, 'Twix', 'შოკოლადი', '196', 1.2, '235.2', '2018/11/22', '2019/11/22', ''),
(31, 'Oreo', 'შოკოლადი', '96', 1.35, '129.6', '2018/08/21', '2019/08/21', ''),
(32, 'Sandora', 'წვენი', '48', 2.5, '120', '2018/04/29', '2019/04/29', ''),
(33, 'KENWOOD TTM020BK', 'ტოსტერი', '88', 194.99, '17159.12', '', '', ''),
(34, 'HOSSEVEN HDU M 10 BLACK with pipe', 'გაზის გამათბობელი', '39', 539.99, '21059.61', '', '', ''),
(35, 'BOSCH DFT63CA60Q', 'გამწოვი', '94', 249.99, '23499.06', '', '', ''),
(36, 'HUAWEI MATE 20 PRO GREEN/M', 'მობილური', '95', 2699.99, '256499.05', '', '', ''),
(37, 'MIDEA MFG70-ES1203S', 'სარეცხი მანქანა', '71', 729.99, '51829.29', '', '', 'Tue-01-Jan-2019 15:24:33 PM'),
(38, 'SONY KD65XF7096BR2', 'ტელევიზორი', '100', 5579.99, '557999', '', '', 'Tue-01-Jan-2019 17:23:17 PM');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `productcat_id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `product_size` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`productcat_id`, `category`, `product_size`) VALUES
(1, 'კომპიუტერები', '230(გრ)'),
(2, 'ტელევიზორი', '330(გრ)'),
(3, 'მობილური', '500(გრ)'),
(4, 'პლანშეტი', '1(ლიტრი)'),
(5, 'ფოტო აპარატები', '1.5(ლიტრი)'),
(6, 'სამშენებლო ხელსაწყოები', '2(ლიტრი)'),
(7, 'სანტექნიკა', '2.5(ლიტრი)'),
(8, 'დასუფთავება', ''),
(9, 'მაცივარი', ''),
(10, 'სარეცხი მანქანა', ''),
(11, 'ყურსასმენები', ''),
(12, 'სათამაშოები', ''),
(13, 'კონდიციონერები', ''),
(14, 'საათები', ''),
(15, 'ჩანთები', ''),
(16, 'სამკაულები', ''),
(17, 'წიგნები', ''),
(18, 'ფეხსაცმელები', ''),
(19, 'ტანსაცმელი', ''),
(20, 'ავეჯი', ''),
(21, 'მაცივარი', ''),
(22, 'ხილი', ''),
(23, 'ბოსტნეული', ''),
(24, 'ტკბილეული', ''),
(25, 'შოკოლადი', ''),
(26, 'ცივი ჩაი', ''),
(27, 'ალკოჰოლი', ''),
(28, 'სიგარეტი', ''),
(29, 'ცივი ყავა', ''),
(30, 'წვენი', ''),
(31, 'ტოსტერი', ''),
(32, 'გაზის გამათბობელი', ''),
(33, 'ყავის აპარატი', ''),
(34, 'გრილი', ''),
(35, 'საუთოებელი მაგიდა', ''),
(36, 'უთო', ''),
(37, 'პურის საცხობი', ''),
(38, 'მტვერსასრუტი', ''),
(39, 'სასწორი', ''),
(40, 'გამწოვი', ''),
(41, 'მადუღარა', ''),
(42, 'dwadaw', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_mail` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `user_name`, `user_password`, `user_mail`) VALUES
(49, 'avto_shergelashvili', 'e10adc3949ba59abbe56e057f20f883e', 'av@gmail.com'),
(50, 'avto', 'fcea920f7412b5da7be0cf42b8c93759', 'x@gmail.com'),
(51, 'avto', 'fcea920f7412b5da7be0cf42b8c93759', 'aaaav@gmail.com'),
(52, 'avto', '12345678', 'xxxx@gmail.com'),
(53, 'SHERGELA', '25d55ad283aa400af464c76d713c07ad', 'vaav@gmail.com'),
(54, 'ავთო შერგელაშვილი', '25d55ad283aa400af464c76d713c07ad', 'aefaefaex@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`productcat_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `productcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
