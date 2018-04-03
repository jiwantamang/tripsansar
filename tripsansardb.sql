-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 04, 2017 at 07:09 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tripsansardb`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `adress_id` int(11) NOT NULL,
  `address` varchar(45) DEFAULT NULL,
  `address_region` varchar(45) DEFAULT NULL,
  `address_postalcode` varchar(45) DEFAULT NULL,
  `cities_city_id` int(11) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `place_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(45) DEFAULT NULL,
  `countries_country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `user_activation_key` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_profile`
--

CREATE TABLE `customer_profile` (
  `id` int(11) NOT NULL,
  `firstName` varchar(45) DEFAULT NULL,
  `middleName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `telephone` varchar(15) DEFAULT NULL,
  `dob` varchar(15) DEFAULT NULL,
  `nationality` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `esewa_tbl`
--

CREATE TABLE `esewa_tbl` (
  `id` int(11) NOT NULL,
  `tAmt` decimal(10,2) DEFAULT NULL,
  `amt` decimal(10,2) DEFAULT NULL,
  `txAmt` decimal(10,2) DEFAULT NULL,
  `psc` decimal(10,2) DEFAULT NULL,
  `pdc` decimal(10,2) DEFAULT NULL,
  `scd` decimal(10,2) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `su` mediumtext,
  `fu` mediumtext,
  `status` varchar(45) DEFAULT NULL,
  `date_created` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `events_id` int(11) NOT NULL,
  `eventname` varchar(200) NOT NULL,
  `eventimages` varchar(200) NOT NULL,
  `eventdescription` varchar(200) NOT NULL,
  `eventlocatation` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `festival`
--

CREATE TABLE `festival` (
  `festival` int(11) NOT NULL,
  `festival_name` varchar(45) DEFAULT NULL,
  `festival_link` varchar(45) DEFAULT NULL,
  `festival_date` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotel_id` int(11) NOT NULL,
  `hotelname` varchar(45) NOT NULL,
  `owner` varchar(45) NOT NULL,
  `establish_date` varchar(45) NOT NULL,
  `hotel_catagory` varchar(45) NOT NULL,
  `hotel_type` varchar(45) NOT NULL,
  `active` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_comments`
--

CREATE TABLE `hotel_comments` (
  `id` int(11) NOT NULL,
  `comments` tinytext,
  `date_created` date DEFAULT NULL,
  `hotel_hotel_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_facility`
--

CREATE TABLE `hotel_facility` (
  `id` int(11) NOT NULL,
  `facility` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `note` varchar(45) DEFAULT NULL,
  `date_created` varchar(45) DEFAULT NULL,
  `date_updated` varchar(45) DEFAULT NULL,
  `date_deleted` varchar(45) DEFAULT NULL,
  `hotel_hotel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_gallary`
--

CREATE TABLE `hotel_gallary` (
  `id` int(11) NOT NULL,
  `image_name` varchar(45) DEFAULT NULL,
  `image_description` varchar(45) DEFAULT NULL,
  `hotel_hotel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_profile`
--

CREATE TABLE `hotel_profile` (
  `id` int(11) NOT NULL,
  `description` longtext,
  `rating` varchar(45) DEFAULT NULL,
  `minimum_cost` varchar(45) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `note1` varchar(45) DEFAULT NULL,
  `note2` varchar(45) DEFAULT NULL,
  `note3` varchar(45) DEFAULT NULL,
  `note4` varchar(45) DEFAULT NULL,
  `image` varchar(45) DEFAULT NULL,
  `hotel_hotel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_speciality`
--

CREATE TABLE `hotel_speciality` (
  `id` int(11) NOT NULL,
  `speciality` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `note` varchar(45) DEFAULT NULL,
  `date_created` varchar(45) DEFAULT NULL,
  `date_updated` varchar(45) DEFAULT NULL,
  `date_deleted` varchar(45) DEFAULT NULL,
  `hotel_hotel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_user`
--

CREATE TABLE `hotel_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `hotelid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `place_id` int(11) NOT NULL,
  `placetitle` varchar(200) NOT NULL,
  `placeaddress` varchar(200) NOT NULL,
  `placedescription` text NOT NULL,
  `placeimages` varchar(200) DEFAULT NULL,
  `placecatagory` varchar(200) NOT NULL,
  `placespeciality` text,
  `user_id` int(11) NOT NULL,
  `festivals` mediumtext,
  `trip_summary` mediumtext,
  `contact` varchar(45) DEFAULT NULL,
  `is_adventure` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `placecatagory`
--

CREATE TABLE `placecatagory` (
  `placecatagory_id` int(11) NOT NULL,
  `placecatagory` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `placecatagory_place`
--

CREATE TABLE `placecatagory_place` (
  `id` int(11) NOT NULL,
  `place_place_id` int(11) NOT NULL,
  `placecatagory_placecatagory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `place_comment`
--

CREATE TABLE `place_comment` (
  `id` int(11) NOT NULL,
  `entity` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `entityId` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `parentId` int(11) DEFAULT NULL,
  `level` smallint(6) NOT NULL DEFAULT '1',
  `createdBy` int(11) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  `relatedTo` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `url` text COLLATE utf8_unicode_ci,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `createdAt` int(11) NOT NULL,
  `updatedAt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `place_event`
--

CREATE TABLE `place_event` (
  `id` int(11) NOT NULL,
  `place_place_id` int(11) NOT NULL,
  `events_events_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `place_gallary`
--

CREATE TABLE `place_gallary` (
  `id` int(11) NOT NULL,
  `image_name` varchar(45) DEFAULT NULL,
  `image_description` varchar(45) DEFAULT NULL,
  `image_caption` varchar(45) DEFAULT NULL,
  `place_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `place_hotel`
--

CREATE TABLE `place_hotel` (
  `id` int(11) NOT NULL,
  `place_place_id` int(11) DEFAULT NULL,
  `hotel_hotel_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `place_image`
--

CREATE TABLE `place_image` (
  `id` int(11) NOT NULL,
  `image_name` varchar(45) DEFAULT NULL,
  `image_description` varchar(45) DEFAULT NULL,
  `place_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `price_per_day` decimal(20,2) DEFAULT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `reservation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `room_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `transaction_id` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `hotelid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservation_room`
--

CREATE TABLE `reservation_room` (
  `id` int(11) NOT NULL,
  `room_no` int(11) DEFAULT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  `transaction_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `floor` int(11) NOT NULL,
  `room_number` int(11) NOT NULL,
  `has_conditioner` int(1) NOT NULL,
  `has_tv` int(1) NOT NULL,
  `has_phone` int(1) NOT NULL,
  `available_from` date NOT NULL,
  `price_per_day` decimal(20,2) DEFAULT NULL,
  `description` text,
  `hotel_id` int(11) NOT NULL,
  `room_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `room_image`
--

CREATE TABLE `room_image` (
  `id` int(11) NOT NULL,
  `image` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `room_room_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `id` int(11) NOT NULL,
  `room_type` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp_book`
--

CREATE TABLE `temp_book` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hotel_id` int(11) DEFAULT NULL,
  `check_in` datetime DEFAULT NULL,
  `check_out` date DEFAULT NULL,
  `payment_status` int(11) DEFAULT NULL,
  `date_payment` int(11) DEFAULT NULL,
  `payment_method` varchar(45) DEFAULT NULL,
  `transaction_id` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp_book_room`
--

CREATE TABLE `temp_book_room` (
  `id` int(11) NOT NULL,
  `room_no` varchar(45) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `transaction_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `heading` varchar(45) DEFAULT NULL,
  `description` mediumtext,
  `fullname` varchar(45) DEFAULT NULL,
  `designation` varchar(45) DEFAULT NULL,
  `place_place_id` int(11) DEFAULT NULL,
  `image` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(8, 'jiwan', 'TvDmd-EwDLPZfTMWGfEl9XGcO5PJjVc9', '$2y$13$iqJGV6Mli1ltpZnryoPygOz27P/NWNpCFKZveGK7o6tWmAvhXIh6S', 'tOsNFCs1ujPO-diNchHU0eQcHzAvbIU9_1504439043', 'jiwan.tamang255@gmail.com', 10, 1502942060, 1504439043);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`adress_id`,`cities_city_id`),
  ADD KEY `fk_addresses_cities1_idx` (`cities_city_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `fk_cities_countries_idx` (`countries_country_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `customer_profile`
--
ALTER TABLE `customer_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_customer_profile_customer1_idx` (`customer_id`);

--
-- Indexes for table `esewa_tbl`
--
ALTER TABLE `esewa_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`events_id`);

--
-- Indexes for table `festival`
--
ALTER TABLE `festival`
  ADD PRIMARY KEY (`festival`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `hotel_comments`
--
ALTER TABLE `hotel_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_hotel_comments_hotel1_idx` (`hotel_hotel_id`),
  ADD KEY `fk_hotel_comments_customer1_idx` (`customer_id`);

--
-- Indexes for table `hotel_facility`
--
ALTER TABLE `hotel_facility`
  ADD PRIMARY KEY (`id`,`hotel_hotel_id`),
  ADD KEY `fk_hotel_facility_hotel1_idx` (`hotel_hotel_id`);

--
-- Indexes for table `hotel_gallary`
--
ALTER TABLE `hotel_gallary`
  ADD PRIMARY KEY (`id`,`hotel_hotel_id`),
  ADD KEY `fk_hotel_gallary_hotel1_idx` (`hotel_hotel_id`);

--
-- Indexes for table `hotel_profile`
--
ALTER TABLE `hotel_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_hotel_profile_hotel1_idx` (`hotel_hotel_id`);

--
-- Indexes for table `hotel_speciality`
--
ALTER TABLE `hotel_speciality`
  ADD PRIMARY KEY (`id`,`hotel_hotel_id`),
  ADD KEY `fk_hotel_speciality_hotel1_idx` (`hotel_hotel_id`);

--
-- Indexes for table `hotel_user`
--
ALTER TABLE `hotel_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`place_id`,`user_id`),
  ADD KEY `fk_place_user1_idx` (`user_id`);

--
-- Indexes for table `placecatagory`
--
ALTER TABLE `placecatagory`
  ADD PRIMARY KEY (`placecatagory_id`);

--
-- Indexes for table `placecatagory_place`
--
ALTER TABLE `placecatagory_place`
  ADD PRIMARY KEY (`id`,`place_place_id`,`placecatagory_placecatagory_id`),
  ADD KEY `fk_place_catagory_place1_idx` (`place_place_id`),
  ADD KEY `fk_place_catagory_placecatagory1_idx` (`placecatagory_placecatagory_id`);

--
-- Indexes for table `place_comment`
--
ALTER TABLE `place_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-Comment-entity` (`entity`),
  ADD KEY `idx-Comment-status` (`status`);

--
-- Indexes for table `place_event`
--
ALTER TABLE `place_event`
  ADD PRIMARY KEY (`id`,`place_place_id`,`events_events_id`),
  ADD KEY `fk_place_event_place1_idx` (`place_place_id`),
  ADD KEY `fk_place_event_events1_idx` (`events_events_id`);

--
-- Indexes for table `place_gallary`
--
ALTER TABLE `place_gallary`
  ADD PRIMARY KEY (`id`,`place_id`),
  ADD KEY `fk_place_gallary_place1_idx` (`place_id`);

--
-- Indexes for table `place_hotel`
--
ALTER TABLE `place_hotel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_place_hotel_place1_idx` (`place_place_id`),
  ADD KEY `fk_place_hotel_hotel1_idx` (`hotel_hotel_id`);

--
-- Indexes for table `place_image`
--
ALTER TABLE `place_image`
  ADD PRIMARY KEY (`id`,`place_id`),
  ADD KEY `fk_place_image_place1_idx` (`place_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation_room`
--
ALTER TABLE `reservation_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`,`room_type_id`),
  ADD KEY `fk_room_hotel1_idx` (`hotel_id`),
  ADD KEY `fk_room_room_type1_idx` (`room_type_id`);

--
-- Indexes for table `room_image`
--
ALTER TABLE `room_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_room_image_room1_idx` (`room_room_id`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_book`
--
ALTER TABLE `temp_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_book_room`
--
ALTER TABLE `temp_book_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_testimonial_place1_idx` (`place_place_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `adress_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `customer_profile`
--
ALTER TABLE `customer_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `esewa_tbl`
--
ALTER TABLE `esewa_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `events_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `hotel_comments`
--
ALTER TABLE `hotel_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `hotel_facility`
--
ALTER TABLE `hotel_facility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `hotel_gallary`
--
ALTER TABLE `hotel_gallary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `hotel_profile`
--
ALTER TABLE `hotel_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `hotel_speciality`
--
ALTER TABLE `hotel_speciality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `hotel_user`
--
ALTER TABLE `hotel_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;
--
-- AUTO_INCREMENT for table `placecatagory`
--
ALTER TABLE `placecatagory`
  MODIFY `placecatagory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `place_comment`
--
ALTER TABLE `place_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `place_gallary`
--
ALTER TABLE `place_gallary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `place_hotel`
--
ALTER TABLE `place_hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `place_image`
--
ALTER TABLE `place_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `reservation_room`
--
ALTER TABLE `reservation_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `room_image`
--
ALTER TABLE `room_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `temp_book`
--
ALTER TABLE `temp_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=326;
--
-- AUTO_INCREMENT for table `temp_book_room`
--
ALTER TABLE `temp_book_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;
--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `fk_addresses_cities1` FOREIGN KEY (`cities_city_id`) REFERENCES `cities` (`city_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `fk_cities_countries` FOREIGN KEY (`countries_country_id`) REFERENCES `countries` (`country_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `customer_profile`
--
ALTER TABLE `customer_profile`
  ADD CONSTRAINT `fk_customer_profile_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hotel_comments`
--
ALTER TABLE `hotel_comments`
  ADD CONSTRAINT `fk_hotel_comments_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hotel_comments_hotel1` FOREIGN KEY (`hotel_hotel_id`) REFERENCES `hotel` (`hotel_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hotel_facility`
--
ALTER TABLE `hotel_facility`
  ADD CONSTRAINT `fk_hotel_facility_hotel1` FOREIGN KEY (`hotel_hotel_id`) REFERENCES `hotel` (`hotel_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hotel_gallary`
--
ALTER TABLE `hotel_gallary`
  ADD CONSTRAINT `fk_hotel_gallary_hotel1` FOREIGN KEY (`hotel_hotel_id`) REFERENCES `hotel` (`hotel_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hotel_profile`
--
ALTER TABLE `hotel_profile`
  ADD CONSTRAINT `fk_hotel_profile_hotel1` FOREIGN KEY (`hotel_hotel_id`) REFERENCES `hotel` (`hotel_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hotel_speciality`
--
ALTER TABLE `hotel_speciality`
  ADD CONSTRAINT `fk_hotel_speciality_hotel1` FOREIGN KEY (`hotel_hotel_id`) REFERENCES `hotel` (`hotel_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `place`
--
ALTER TABLE `place`
  ADD CONSTRAINT `fk_place_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `placecatagory_place`
--
ALTER TABLE `placecatagory_place`
  ADD CONSTRAINT `fk_place_catagory_place1` FOREIGN KEY (`place_place_id`) REFERENCES `place` (`place_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_place_catagory_placecatagory1` FOREIGN KEY (`placecatagory_placecatagory_id`) REFERENCES `placecatagory` (`placecatagory_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `place_event`
--
ALTER TABLE `place_event`
  ADD CONSTRAINT `fk_place_event_events1` FOREIGN KEY (`events_events_id`) REFERENCES `events` (`events_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_place_event_place1` FOREIGN KEY (`place_place_id`) REFERENCES `place` (`place_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `place_gallary`
--
ALTER TABLE `place_gallary`
  ADD CONSTRAINT `fk_place_gallary_place1` FOREIGN KEY (`place_id`) REFERENCES `place` (`place_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `place_hotel`
--
ALTER TABLE `place_hotel`
  ADD CONSTRAINT `fk_place_hotel_hotel1` FOREIGN KEY (`hotel_hotel_id`) REFERENCES `hotel` (`hotel_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_place_hotel_place1` FOREIGN KEY (`place_place_id`) REFERENCES `place` (`place_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `place_image`
--
ALTER TABLE `place_image`
  ADD CONSTRAINT `fk_place_image_place1` FOREIGN KEY (`place_id`) REFERENCES `place` (`place_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `fk_room_hotel1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`hotel_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_room_room_type1` FOREIGN KEY (`room_type_id`) REFERENCES `room_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `room_image`
--
ALTER TABLE `room_image`
  ADD CONSTRAINT `fk_room_image_room1` FOREIGN KEY (`room_room_id`) REFERENCES `room` (`room_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD CONSTRAINT `fk_testimonial_place1` FOREIGN KEY (`place_place_id`) REFERENCES `place` (`place_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
