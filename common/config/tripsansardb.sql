-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 23, 2017 at 07:08 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

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
  `hotel_id` int(11) DEFAULT NULL,
  `place_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`adress_id`, `address`, `address_region`, `address_postalcode`, `cities_city_id`, `hotel_id`, `place_id`) VALUES
(1, 'pragatinagar,7', 'kathmandu', '00977', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(45) DEFAULT NULL,
  `countries_country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`, `countries_country_id`) VALUES
(1, 'Kathmandu', 1),
(2, 'Narayanghat', 1),
(3, 'kolkota', 2);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`) VALUES
(1, 'Nepal'),
(2, 'India');

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
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'customer', 'TvDmd-EwDLPZfTMWGfEl9XGcO5PJjVc9', '$2y$13$3IdV2L9w5a/qd9tjVbDTIeMMkgaYzILskGHOaFkDPaE5YT8YvjarC', NULL, 'jiwan.tamang255@gmail.com', 10, 1502942060, 1502942060),
(2, 'davdi', 'GAV1SRBKbOcfaDiZ3wzlqK_FZDkqqaUc', '$2y$13$vx1pvY2sfjjYhrdnA3y9tuvyhm2D47bUVGortHmqrYl1Xv1IlHnWm', NULL, 'david@gmail.com', 10, 1503402660, 1503402660);

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
  `customer_id` int(11) NOT NULL
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

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotel_id`, `hotelname`, `owner`, `establish_date`, `hotel_catagory`, `hotel_type`, `active`) VALUES
(1, 'Lungeli Hotel', 'Sagar Basnet', '02-08-2017', '1', '1', 'active'),
(2, 'Pokhreli Hotel', 'Aakash Tamang', '16-08-2017', '5', '3', 'active'),
(3, 'Pandey Khaja Ghar', 'Pandey Bhatarai', '09-08-2017', '1', '1', 'active'),
(4, 'Rhino Lodge and Hotel', 'jiwan tamang', '17-08-2017', '3', '3', 'active'),
(5, 'Hoteal Solatari', 'Rajiv mainali', '16-08-2017', '1', '1', 'active');

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

--
-- Dumping data for table `hotel_comments`
--

INSERT INTO `hotel_comments` (`id`, `comments`, `date_created`, `hotel_hotel_id`, `customer_id`) VALUES
(30, 'Hotel is in very good condition\n', NULL, 3, NULL),
(33, 'good hotel', NULL, 5, 2),
(34, 'test1', NULL, 5, 2),
(35, 'abc', NULL, 5, 2),
(36, 'xss', NULL, 5, 2);

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

--
-- Dumping data for table `hotel_facility`
--

INSERT INTO `hotel_facility` (`id`, `facility`, `description`, `note`, `date_created`, `date_updated`, `date_deleted`, `hotel_hotel_id`) VALUES
(1, 'Breakfast', 'breakfast breakfast breakfast breakfast break', '', '', '', '', 1),
(2, 'Internet', 'Internet Internet Internet Internet Internet ', '', '', '', '', 1),
(3, 'Business Facilities', 'Business FacilitiesBusiness FacilitiesBusines', '', '', '', '', 1),
(4, 'Outdoors', ' Outdoors   Outdoors   Outdoors   Outdoors   ', '', '', '', '', 1),
(5, 'Parking', ' Parking   Parking   Parking   Parking   Park', '', '', '', '', 1),
(6, 'General', ' General General General General General Gene', '', '', '', '', 1),
(7, ' Pets ', ' Pets  Pets  Pets  Pets  Pets  Pets  Pets  Pe', '', '', '', '', 1),
(8, 'Airport Shuttle	', 'Airport Shuttle	Airport Shuttle	Airport Shutt', '', '', '', '', 1),
(9, 'Front Desk Service	', 'Front Desk Service	', '', '', '', '', 1),
(10, 'Language Spoken', 'Language SpokenLanguage SpokenLanguage Spoken', '', '', '', '', 1);

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

--
-- Dumping data for table `hotel_gallary`
--

INSERT INTO `hotel_gallary` (`id`, `image_name`, `image_description`, `hotel_hotel_id`) VALUES
(4, '2017-08-1905:02:19pmbandipur-1.jpg', 'n/a', 3),
(5, '2017-08-1905:03:32pm108070962.jpg', 'front image', 3),
(6, '2017-08-1905:03:59pmlg1.jpg', 'hotel img', 3),
(7, '2017-08-2006:48:07amrhino.jpg', '', 4),
(8, '2017-08-2006:48:17amrhino1.jpg', '', 4),
(9, '2017-08-2006:48:26amrhino2.jpg', '', 4),
(10, '2017-08-2006:48:37amrhino3.jpg', '', 4),
(11, '2017-08-2006:48:51amrhino4.jpg', '', 4),
(12, '2017-08-2012:13:36pmcnp3.jpg', '', 5);

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

--
-- Dumping data for table `hotel_profile`
--

INSERT INTO `hotel_profile` (`id`, `description`, `rating`, `minimum_cost`, `address`, `note1`, `note2`, `note3`, `note4`, `image`, `hotel_hotel_id`) VALUES
(8, '<p>Featuring a restaurant, garden and free Wi-Fi, Eco Adventure Resort offers rooms in Chitwan. It is located right besides the entrance of Chitwan National Park and 500 m from Rapti River.</p>\r\n\r\n<p>Each room includes a fan. The bathroom comes with a shower. Some rooms include air conditioning.</p>\r\n\r\n<p>Eco Adventure Resort is 2 km from Sauraha Bus Station. Bharatpur Airport is 20 km away.</p>\r\n\r\n<p>The resort owns an elephant and jeep, and will help you explore Chitwan by organising any wildlife activities.</p>\r\n\r\n<p>The in-house restaurant serves Nepali, Chinese and continental cuisine.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We speak your language!</p>\r\n\r\n<p>Eco Adventure Resort has been welcoming Booking.com guests since Mar 13, 2014</p>\r\n', NULL, '700', 'Sauhara, 32909 Sauraha, Nepal', 'Reservation possible without a credit card', 'Booked 5 times in the last 48 hours', '', '', '2017-08-1902:47:35pm108070962.jpg', 3),
(9, '<p><em>Hotel</em>&nbsp;descriptions supply information about a&nbsp;<em>hotel</em>&nbsp;property that can be used to determine a&nbsp;<em>hotel</em>selection. Specific&nbsp;<em>description</em>&nbsp;information varies depending&nbsp;...<em>Hotel</em>&nbsp;descriptions supply information about a&nbsp;<em>hotel</em>&nbsp;property that can be used to determine a&nbsp;<em>hotel</em>selection. Specific&nbsp;<em>description</em>&nbsp;information varies depending&nbsp;...<em>Hotel</em>&nbsp;descriptions supply information about a&nbsp;<em>hotel</em>&nbsp;property that can be used to determine a&nbsp;<em>hotel</em>selection. Specific&nbsp;<em>description</em>&nbsp;information varies depending&nbsp;...<em>Hotel</em>&nbsp;descriptions supply information about a&nbsp;<em>hotel</em>&nbsp;property that can be used to determine a&nbsp;<em>hotel</em>selection. Specific&nbsp;<em>description</em>&nbsp;information varies depending&nbsp;...<em>Hotel</em>&nbsp;descriptions supply information about a&nbsp;<em>hotel</em>&nbsp;property that can be used to determine a&nbsp;<em>hotel</em>selection. Specific&nbsp;<em>description</em>&nbsp;information varies depending&nbsp;...</p>\r\n', NULL, '600', 'Nepal,chitwan,sauraha', 'no credit card required for booking', 'wifi available', '', '', '2017-08-2006:37:43amrhino.jpg', 4),
(10, '<p>f pskf sokfdpsokdf pskfdp &nbsp;skf skdf skdf skodfksdfpkspdfk dsp fskf pskdf pskf psdk ff pskf sokfdpsokdf pskfdp &nbsp;skf skdf skdf skodfksdfpkspdfk dsp fskf pskdf pskf psdk ff pskf sokfdpsokdf pskfdp &nbsp;skf skdf skdf skodfksdfpkspdfk dsp fskf pskdf pskf psdk ff pskf sokfdpsokdf pskfdp &nbsp;skf skdf skdf skodfksdfpkspdfk dsp fskf pskdf pskf psdk ff pskf sokfdpsokdf pskfdp &nbsp;skf skdf skdf skodfksdfpkspdfk dsp fskf pskdf pskf psdk ff pskf sokfdpsokdf pskfdp &nbsp;skf skdf skdf skodfksdfpkspdfk dsp fskf pskdf pskf psdk ff pskf sokfdpsokdf pskfdp &nbsp;skf skdf skdf skodfksdfpkspdfk dsp fskf pskdf pskf psdk ff pskf sokfdpsokdf pskfdp &nbsp;skf skdf skdf skodfksdfpkspdfk dsp fskf pskdf pskf psdk f</p>\r\n', NULL, '700', 'nepal, nawalparasi,itaura,', 'no credit card required for booking', 'Booked 5 times in the last 48 hours', '', '', '2017-08-2012:13:26pmbg1.jpg', 5);

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

--
-- Dumping data for table `hotel_speciality`
--

INSERT INTO `hotel_speciality` (`id`, `speciality`, `description`, `note`, `date_created`, `date_updated`, `date_deleted`, `hotel_hotel_id`) VALUES
(1, ' Price you can\'t beat	', 'full featured facility with minimum cost', 'for a limited time', NULL, NULL, NULL, 0),
(2, ' Manage your booking online', 'with a special discount', '', NULL, NULL, NULL, 0),
(3, '125,870,0000 independent reviews	', 'world wide', '', NULL, NULL, NULL, 0),
(4, 'The Staff speaks English', 'highly skilled staffs are available in office', '', NULL, NULL, NULL, 0),
(5, 'Booking is safe', 'Booking is safe Booking is safe Booking is sa', '', NULL, NULL, NULL, 0),
(6, 'Swimming pool', 'Swimming poolSwimming poolSwimming poolSwimmi', '', NULL, NULL, NULL, 0);

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

--
-- Dumping data for table `hotel_user`
--

INSERT INTO `hotel_user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `hotelid`) VALUES
(9, 'kiran', 'lT6BU_1nT2vwaC_DLtdLMtQUnWYgHqjD', '$2y$13$SDT2mw0aHw1.3I6yqiiNr.lk/ITYJNbDzfPQvdz2VrJWa2Bc/.8Ue', NULL, 'kiran@gmail.com', 10, 1503131500, 1503131500, 1),
(10, 'pandey', 'FAT3vPUBHM6BgCkz2S9vLElw1fjshZxc', '$2y$13$YXUhqvrj9J42fE9qHAD.Ce8BUgTVeSEMtD65gt/.bXPJDWvK/iyL2', NULL, 'pandey@gmail.com', 10, 1503131657, 1503131657, 3),
(11, 'rhino', 'D5hCQNm_scIm2IqFXsyLdhyVHwzzwQ-j', '$2y$13$ORN/dCjj8VmE0r4qh1vguuoUTep.aJXoPB5DEdVrJG0X.tv8bRcUS', NULL, 'rhino@gmail.com', 10, 1503203260, 1503203260, 4),
(12, 'solatari', 'Yi62stYs3EGGOXaAzRQ9H55ow1e83zuR', '$2y$13$RR2SnikiWgRU3eny8xdp3ef4mfGTMaOVxrpYssxdrSXpL67U.uY.a', NULL, 'solatari@gamil.com', 10, 1503223846, 1503223846, 5);

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
  `placeimages` varchar(200) NOT NULL,
  `placecatagory` varchar(200) NOT NULL,
  `placespeciality` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `festivals` mediumtext,
  `trip_summary` mediumtext,
  `contact` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`place_id`, `placetitle`, `placeaddress`, `placedescription`, `placeimages`, `placecatagory`, `placespeciality`, `user_id`, `festivals`, `trip_summary`, `contact`) VALUES
(92, 'bandipur', '1', 'Bandipur (Devanagari ????????) is a hilltop settlement and a municipality in Tanahun District, (Gandaki Zone) of Nepal. This municipality was established on 18 May 2014 by merging with existing Dharampani and Bandipur VDCs.[1][2] Because of its preserved, old time cultural atmosphere, Bandipur has increasingly been coming to the attention of tourism. At the time of the 2011 Nepal census it had a population of total (Bandipur and Dharampani) 15591 people living in 3750 individual households.[3]', 'bandipur', '5', 'Bandipur (Devanagari ????????) is a hilltop settlement and a municipality in Tanahun District, (Gandaki Zone) of Nepal. This municipality was established on 18 May 2014 by merging with existing Dharampani and Bandipur VDCs.[1][2] Because of its preserved, old time cultural atmosphere, Bandipur has increasingly been coming to the attention of tourism. At the time of the 2011 Nepal census it had a population of total (Bandipur and Dharampani) 15591 people living in 3750 individual households.[3]', 8, NULL, NULL, NULL),
(93, 'Everest base camp', '1', 'Everest Base Camp is either of two base camps on opposite sides of Mount Everest (It could also be any Everest base camp on given route, but this is less common since the two main routes became standardized). South Base Camp is in Nepal at an altitude of 5,364 metres (17,598 ft) (28°0?26?N 86°51?34?E), and North Base Camp is in Tibet at 5,150 metres (16,900 ft)[1][2][3] (28°8?29?N 86°51?5?E). These camps are rudimentary campsites on Mount Everest that are used by mountain climbers during their ascent and descent. South Base Camp is used when climbing via the southeast ridge, while North Base Camp is used when climbing via the northeast ridge.[4]', 'sagarmatha', '5', 'Everest Base Camp is either of two base camps on opposite sides of Mount Everest (It could also be any Everest base camp on given route, but this is less common since the two main routes became standardized). South Base Camp is in Nepal at an altitude of 5,364 metres (17,598 ft) (28°0?26?N 86°51?34?E), and North Base Camp is in Tibet at 5,150 metres (16,900 ft)[1][2][3] (28°8?29?N 86°51?5?E). These camps are rudimentary campsites on Mount Everest that are used by mountain climbers during their ascent and descent. South Base Camp is used when climbing via the southeast ridge, while North Base Camp is used when climbing via the northeast ridge.[4]', 8, NULL, NULL, NULL),
(94, 'namche bazaar', '', 'Namche Bazaar (also Nemche Bazaar or Namche Baza; Nepali: ?????? ????About this sound listen (help·info)) is a village and Village Development Committee (Namche) in Solukhumbu District in the Sagarmatha Zone of north-eastern Nepal. It is located within the Khumbu area at 3,440 metres (11,286 ft) at its low point, populating the sides of a hill. Most Sherpa who are in the tourism business are from the Namche area. Namche is the main trading center and hub for the Khumbu region with many Nepalese officials, a police check, post and a bank. Namche is the most expensive place in Nepal, at least three times as expensive as the capital city Kathmandu.[citation needed]', 'bandipur', '5', 'Namche Bazaar (also Nemche Bazaar or Namche Baza; Nepali: ?????? ????About this sound listen (help·info)) is a village and Village Development Committee (Namche) in Solukhumbu District in the Sagarmatha Zone of north-eastern Nepal. It is located within the Khumbu area at 3,440 metres (11,286 ft) at its low point, populating the sides of a hill. Most Sherpa who are in the tourism business are from the Namche area. Namche is the main trading center and hub for the Khumbu region with many Nepalese officials, a police check, post and a bank. Namche is the most expensive place in Nepal, at least three times as expensive as the capital city Kathmandu.[citation needed]', 8, NULL, NULL, NULL),
(95, 'lumbini', '1', '\r\nLumbini 4.jpg\r\nUNESCO World Heritage Site\r\nLocation	Rupandehi District, Nepal Edit this at Wikidata\r\nCoordinates	27°28?53?N 83°16?33?E\r\nCriteria	Cultural: (iii), (vi) Edit this on Wikidata[1]\r\nReference	666\r\nInscription	1997 (21st Session)\r\nLumbini is located in Nepal Lumbini\r\nLocation of Lumbini\r\n[edit on Wikidata]\r\nLumbini\r\n????????\r\nCity era\r\nLumbini\r\nLumbini\r\nCoordinates: 27.484°N 83.276°ECoordinates: 27.484°N 83.276°E\r\nCountry	Nepal\r\nZone	Lumbini\r\nDistrict	Rupandehi\r\nElevation	150 m (490 ft)\r\nLanguages\r\n • Official	Nepali\r\nTime zone	NST (UTC+05:45)\r\nPostal Code	32914\r\nArea code(s)	71\r\n', 'lumbini', '5', '\r\nLumbini 4.jpg\r\nUNESCO World Heritage Site\r\nLocation	Rupandehi District, Nepal Edit this at Wikidata\r\nCoordinates	27°28?53?N 83°16?33?E\r\nCriteria	Cultural: (iii), (vi) Edit this on Wikidata[1]\r\nReference	666\r\nInscription	1997 (21st Session)\r\nLumbini is located in Nepal Lumbini\r\nLocation of Lumbini\r\n[edit on Wikidata]\r\nLumbini\r\n????????\r\nCity era\r\nLumbini\r\nLumbini\r\nCoordinates: 27.484°N 83.276°ECoordinates: 27.484°N 83.276°E\r\nCountry	Nepal\r\nZone	Lumbini\r\nDistrict	Rupandehi\r\nElevation	150 m (490 ft)\r\nLanguages\r\n • Official	Nepali\r\nTime zone	NST (UTC+05:45)\r\nPostal Code	32914\r\nArea code(s)	71\r\n', 8, NULL, NULL, NULL),
(96, 'David falls', '1', 'The water forms an underground tunnel after reaching the bottom. This tunnel is approximately 500 feet (150 m) long and runs 100 feet (30 m) below ground level. On 31 July 1961, a Swiss couple Davi went swimming but the woman drowned in a pit because of the overflow. Her body was recovered 3 days later in river Phusre with great effort. Her father wished to name it \"Davi\'s falls\" after her. Its Nepali name is Patale Chango, which means \"underworld waterfall\".\r\n\r\nAfter exiting the tunnel, the water passes through a cave called Gupteshwor Mahadev or \"cave beneath the ground\". The Phewa Lake dam is the water source.[1]\r\n\r\nIt is an attraction for tourists and locals. Thousands of Nepalis visit for recreation and enjoyment. Visitors can try their luck on the luck pond constructed there by throwing and placing the coin on the statue of god. Likewise, one can find a model of traditional typical Nepali house and a series of statue of Nepali people wearing traditional dresses where visitors can click photo.', 'david falls', '5', 'The water forms an underground tunnel after reaching the bottom. This tunnel is approximately 500 feet (150 m) long and runs 100 feet (30 m) below ground level. On 31 July 1961, a Swiss couple Davi went swimming but the woman drowned in a pit because of the overflow. Her body was recovered 3 days later in river Phusre with great effort. Her father wished to name it \"Davi\'s falls\" after her. Its Nepali name is Patale Chango, which means \"underworld waterfall\".\r\n\r\nAfter exiting the tunnel, the water passes through a cave called Gupteshwor Mahadev or \"cave beneath the ground\". The Phewa Lake dam is the water source.[1]\r\n\r\nIt is an attraction for tourists and locals. Thousands of Nepalis visit for recreation and enjoyment. Visitors can try their luck on the luck pond constructed there by throwing and placing the coin on the statue of god. Likewise, one can find a model of traditional typical Nepali house and a series of statue of Nepali people wearing traditional dresses where visitors can click photo.', 8, NULL, NULL, NULL),
(97, 'jiri', '', 'Jiri (????) is a municipality in Dolakha District in the Janakpur Zone of north-eastern Nepal. At the time of the 1991 Nepal census it had a population of 7,138 people living in 1,508 individual households.[1]\r\n\r\nJiri lies at an altitude of 1,905 metres (6,250 feet) and is the eastern-most terminus of the highway coming from Kathmandu. Bus service is available from Kathmandu but the 184 km ride takes 6 to 8 hours due to narrow, winding roads and checkpoints along the high-way(until 2006). A company of the Nepal Army is stationed in town and visitors\' equipment and backpacks might be searched. There are a number of lodges available along either side of the main road mainly in Jiri Bazaar.\r\n\r\nThere are two high schools namely Jiri Higher Secondary School at Hatdanda and Dhungeshwori Secondary School at Jiri Bazaar.', 'bandipur', '5', 'Jiri (????) is a municipality in Dolakha District in the Janakpur Zone of north-eastern Nepal. At the time of the 1991 Nepal census it had a population of 7,138 people living in 1,508 individual households.[1]\r\n\r\nJiri lies at an altitude of 1,905 metres (6,250 feet) and is the eastern-most terminus of the highway coming from Kathmandu. Bus service is available from Kathmandu but the 184 km ride takes 6 to 8 hours due to narrow, winding roads and checkpoints along the high-way(until 2006). A company of the Nepal Army is stationed in town and visitors\' equipment and backpacks might be searched. There are a number of lodges available along either side of the main road mainly in Jiri Bazaar.\r\n\r\nThere are two high schools namely Jiri Higher Secondary School at Hatdanda and Dhungeshwori Secondary School at Jiri Bazaar.', 8, NULL, NULL, NULL),
(98, 'manang mustang', '1', 'Manang (Nepali: ????) is a town in the Manang District of Nepal. It is located at 28°40\'0N 84°1\'0E with an altitude of 3,519 metres (11,545 ft).[1] According to the preliminary result of the 2011 Nepal census it has a population of 6,527 people living in 1,495 individual households. Its population density is 3 persons/km2.[2]\r\n\r\nIt is situated in the broad valley of the Marshyangdi River to the north of the Annapurna mountain range. The river flows to the east. To the west, the 5,416-metre (17,769 ft) Thorong La pass leads to Muktinath shrine and the valley of the Gandaki River. To the north there is the Chulu East peak of 6,584 m (21,601 ft). Most groups trekking around the Annapurna range will take resting days in Manang to acclimatize to the high altitude, before taking on Thorong La pass. The village is situated on the northern slope[citation needed], which gets the most sunlight and the least snow cover in the winter. The cultivation fields are on the north slope[citation needed] with terraces.\r\n\r\n', 'bandipur', '5', 'Manang (Nepali: ????) is a town in the Manang District of Nepal. It is located at 28°40\'0N 84°1\'0E with an altitude of 3,519 metres (11,545 ft).[1] According to the preliminary result of the 2011 Nepal census it has a population of 6,527 people living in 1,495 individual households. Its population density is 3 persons/km2.[2]\r\n\r\nIt is situated in the broad valley of the Marshyangdi River to the north of the Annapurna mountain range. The river flows to the east. To the west, the 5,416-metre (17,769 ft) Thorong La pass leads to Muktinath shrine and the valley of the Gandaki River. To the north there is the Chulu East peak of 6,584 m (21,601 ft). Most groups trekking around the Annapurna range will take resting days in Manang to acclimatize to the high altitude, before taking on Thorong La pass. The village is situated on the northern slope[citation needed], which gets the most sunlight and the least snow cover in the winter. The cultivation fields are on the north slope[citation needed] with terraces.\r\n\r\n', 8, NULL, NULL, NULL),
(99, 'jomsom', '1', 'Manang (Nepali: ????) is a town in the Manang District of Nepal. It is located at 28°40\'0N 84°1\'0E with an altitude of 3,519 metres (11,545 ft).[1] According to the preliminary result of the 2011 Nepal census it has a population of 6,527 people living in 1,495 individual households. Its population density is 3 persons/km2.[2]\r\n\r\nIt is situated in the broad valley of the Marshyangdi River to the north of the Annapurna mountain range. The river flows to the east. To the west, the 5,416-metre (17,769 ft) Thorong La pass leads to Muktinath shrine and the valley of the Gandaki River. To the north there is the Chulu East peak of 6,584 m (21,601 ft). Most groups trekking around the Annapurna range will take resting days in Manang to acclimatize to the high altitude, before taking on Thorong La pass. The village is situated on the northern slope[citation needed], which gets the most sunlight and the least snow cover in the winter. The cultivation fields are on the north slope[citation needed] with terraces.\r\n\r\n', 'bandipur', '5', 'Manang (Nepali: ????) is a town in the Manang District of Nepal. It is located at 28°40\'0N 84°1\'0E with an altitude of 3,519 metres (11,545 ft).[1] According to the preliminary result of the 2011 Nepal census it has a population of 6,527 people living in 1,495 individual households. Its population density is 3 persons/km2.[2]\r\n\r\nIt is situated in the broad valley of the Marshyangdi River to the north of the Annapurna mountain range. The river flows to the east. To the west, the 5,416-metre (17,769 ft) Thorong La pass leads to Muktinath shrine and the valley of the Gandaki River. To the north there is the Chulu East peak of 6,584 m (21,601 ft). Most groups trekking around the Annapurna range will take resting days in Manang to acclimatize to the high altitude, before taking on Thorong La pass. The village is situated on the northern slope[citation needed], which gets the most sunlight and the least snow cover in the winter. The cultivation fields are on the north slope[citation needed] with terraces.\r\n\r\n', 8, NULL, NULL, NULL),
(100, 'Bhaktapur', '', '<p><strong>Bhaktapur Durbar Square</strong>&nbsp;is the plaza in front of the royal palace of the old&nbsp;<a href=\"https://en.wikipedia.org/wiki/Bhaktapur\">Bhaktapur</a>&nbsp;Kingdom, 1400m above sea level.<a href=\"https://en.wikipedia.org/wiki/Bhaktapur_Durbar_Square#cite_note-nepal.26beyond-1\">[1]</a>&nbsp;It is a UNESCO&nbsp;<a href=\"https://en.wikipedia.org/wiki/World_Heritage_Site\">World Heritage Site</a>.</p>\r\n\r\n<p>The Bhaktapur Durbar Square is located in the current town of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Bhaktapur\">Bhaktapur</a>, also known as Bhadgaon,<a href=\"https://en.wikipedia.org/wiki/Bhaktapur_Durbar_Square#cite_note-nepal.26beyond-1\">[1]</a>&nbsp;which lies 13&nbsp;km east of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Kathmandu\">Kathmandu</a>. While the complex consists of at least four distinct squares (Durbar Square, Taumadhi Square, Dattatreya Square and Pottery Square),<a href=\"https://en.wikipedia.org/wiki/Bhaktapur_Durbar_Square#cite_note-Cultural_History_of_Nepal-2\">[2]</a>&nbsp;the whole area is informally known as the Bhaktapur Durbar Square and is a highly visited site in the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Kathmandu_Valley\">Kathmandu Valley</a>.</p>\r\n', 'kathmandu,bhaktapur', '5', '<p><strong>Batsala Temple</strong></p>\r\n\r\n<p>Batsala Temple was the stone temple of goddess Batsala Devi that included many interferance of carvings; however, it was most famous for its silver bell, known to local residents as &quot;the bell of barking cats &quot; as when it is rung, dogs in the vicinity bark and howl. The colossal bell was hung by King Ranjit Malla in 1737 AD and was used to sound the daily curfew. It was rung every morning when goddess Taleju was worshiped. The bell remains intact; the Temple was completely demolished by the 2015 Gorkha earthquake.</p>\r\n\r\n<p><strong>Statue of Bhupatindra Malla</strong></p>\r\n\r\n<p>The Statue of King Bhupatindra Malla in the act of worship can be seen on a column facing the palace. Of the square&#39;s many statues, this is considered to be the most magnificent.</p>\r\n\r\n<p><strong>Nyatapola Temple</strong></p>\r\n\r\n<p><a href=\"https://en.wikipedia.org/wiki/File:Nyatpol_Temple,_Bhaktapur,_NEPAL_03.jpg\"><img alt=\"\" src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/d/d6/Nyatpol_Temple%2C_Bhaktapur%2C_NEPAL_03.jpg/220px-Nyatpol_Temple%2C_Bhaktapur%2C_NEPAL_03.jpg\" style=\"height:146px; width:220px\" /></a></p>\r\n\r\n<p><strong>Nyatapola Temple</strong></p>\r\n\r\n<p>Nyatapola in&nbsp;<a href=\"https://en.wikipedia.org/wiki/Newari_language\">Newari language</a>&nbsp;means five stories - the symbolic of five basic elements. This is the biggest and highest pagoda of Nepal ever built with such architectural perfection and artistic beauty.</p>\r\n\r\n<p>Bhairava Nath Temple[<a href=\"https://en.wikipedia.org/w/index.php?title=Bhaktapur_Durbar_Square&amp;action=edit&amp;section=6\">edit</a>]</p>\r\n\r\n<p><a href=\"https://en.wikipedia.org/wiki/File:1_Bhairavnath_Temple,_Bhaktapur_Durbar_Square,_NEPAL_01.jpg\"><img alt=\"\" src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/e/e3/1_Bhairavnath_Temple%2C_Bhaktapur_Durbar_Square%2C_NEPAL_01.jpg/220px-1_Bhairavnath_Temple%2C_Bhaktapur_Durbar_Square%2C_NEPAL_01.jpg\" style=\"height:146px; width:220px\" /></a></p>\r\n\r\n<p><strong>Bhairava Nath Temple</strong></p>\r\n\r\n<p>The Bhairab Nath Temple is dedicated to&nbsp;<a href=\"https://en.wikipedia.org/wiki/Bhairava\">Bhairava</a>&nbsp;the most fierce and manifestation aspect of Lord&nbsp;<a href=\"https://en.wikipedia.org/wiki/Shiva\">Shiva</a>.</p>\r\n\r\n<p>Golden Gate</p>\r\n\r\n<p><a href=\"https://en.wikipedia.org/wiki/File:C360_2015-07-05-14-06-53-267.jpg\"><img alt=\"\" src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/1/16/C360_2015-07-05-14-06-53-267.jpg/220px-C360_2015-07-05-14-06-53-267.jpg\" style=\"height:293px; width:220px\" /></a></p>\r\n\r\n<p>The world famous Golden gate of Bhaktapur.</p>\r\n\r\n<p><em><a href=\"https://en.wikipedia.org/w/index.php?title=Lu_Dhowka_(The_Golden_Gate)%27%27_is_said_to_be_the_most_beautiful_and_richly_molded_specimen_of_its_kind_in_the_entire_world._The_door_is_surmounted_by_a_figure_of_the&amp;action=edit&amp;redlink=1\">Lu Dhowka (The Golden Gate)&#39;&#39; is said to be the most beautiful and richly molded specimen of its kind in the entire world. The door is surmounted by a figure of the</a>&nbsp;<a href=\"https://en.wikipedia.org/wiki/Hindu\">Hindu</a>&nbsp;goddess&nbsp;<a href=\"https://en.wikipedia.org/wiki/Kali\">Kali</a>&nbsp;and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Garuda\">Garuda</a>&nbsp;(mythical griffin) and attended by two heavenly nymphs. It is embellished with monsters and other&nbsp;<a href=\"https://en.wikipedia.org/wiki/Hindu\">Hindu</a>&nbsp;mythical creatures of marvelous intricacy.&nbsp;<a href=\"https://en.wikipedia.org/wiki/Percy_Brown_(scholar)\">Percy Brown</a>, an eminent English art critic and historian, described the Golden Gate as &quot;the most lovely piece of art in the whole Kingdom; it is placed like a jewel, flashing innumerable facets in the handsome setting of its surroundings.&quot; The gate was erected by King Ranjit Malla and is the entrance to the main courtyard of the palace of fifty-five windows.<a href=\"https://en.wikipedia.org/wiki/Bhaktapur_Durbar_Square#cite_note-aghtrek-3\">[3]</a></em></p>\r\n\r\n<p>Lion&#39;s Gate</p>\r\n\r\n<p>The magnificent and beautiful gate was produced from artisans whose hands were cut off after finishing touch to them by the envious Bhadgoun king so that no more of such masterpiece would be produced again.<a href=\"https://en.wikipedia.org/wiki/Bhaktapur_Durbar_Square#cite_note-aghtrek-3\">[3]</a>&nbsp;It is a very beautiful gate which attracts every human creature.</p>\r\n', 8, NULL, NULL, NULL),
(101, 'ghandruk', '1', '<p><strong>Ghandruk</strong>&nbsp;(<a href=\"https://en.wikipedia.org/wiki/Nepali_language\">Nepali</a>:&nbsp;<a href=\"https://ne.wikipedia.org/wiki/%E0%A4%98%E0%A4%BE%E0%A4%A8%E0%A5%8D%E0%A4%A6%E0%A5%8D%E0%A4%B0%E0%A5%81%E0%A4%95\">ne:?????????</a>) is a&nbsp;<a href=\"https://en.wikipedia.org/wiki/Town\">town</a>&nbsp;and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Village_Development_Committee_(Nepal)\">Village Development Committee</a>&nbsp;in&nbsp;<a href=\"https://en.wikipedia.org/wiki/Kaski_District\">Kaski District</a>&nbsp;in the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Gandaki_Zone\">Gandaki Zone</a>&nbsp;of northern-central&nbsp;<a href=\"https://en.wikipedia.org/wiki/Nepal\">Nepal</a>. At the time of the&nbsp;<a href=\"https://en.wikipedia.org/wiki/1991_Nepal_census\">1991 Nepal census</a>&nbsp;it had a population of 4,748 persons living in 1,013 individual households.<a href=\"https://en.wikipedia.org/wiki/Ghandruk#cite_note-1\">[1]</a></p>\r\n\r\n<p>Ghandruk is a popular place for treks in the Annapurna range of Nepal( i.e. specially for Annapurna Base camp trek), with easy trails and various accommodation possibilities.From Ghandruk there are views to the mountains of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Annapurna\">Annapurna</a>&nbsp;including&nbsp;<a href=\"https://en.wikipedia.org/wiki/Machapuchare\">Machapuchare</a>, Himchuli. By this reason it&#39;s purely in natural setting.</p>\r\n', 'ghandruk', '5', '<p><strong>Ghandruk</strong>&nbsp;(<a href=\"https://en.wikipedia.org/wiki/Nepali_language\">Nepali</a>:&nbsp;<a href=\"https://ne.wikipedia.org/wiki/%E0%A4%98%E0%A4%BE%E0%A4%A8%E0%A5%8D%E0%A4%A6%E0%A5%8D%E0%A4%B0%E0%A5%81%E0%A4%95\">ne:?????????</a>) is a&nbsp;<a href=\"https://en.wikipedia.org/wiki/Town\">town</a>&nbsp;and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Village_Development_Committee_(Nepal)\">Village Development Committee</a>&nbsp;in&nbsp;<a href=\"https://en.wikipedia.org/wiki/Kaski_District\">Kaski District</a>&nbsp;in the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Gandaki_Zone\">Gandaki Zone</a>&nbsp;of northern-central&nbsp;<a href=\"https://en.wikipedia.org/wiki/Nepal\">Nepal</a>. At the time of the&nbsp;<a href=\"https://en.wikipedia.org/wiki/1991_Nepal_census\">1991 Nepal census</a>&nbsp;it had a population of 4,748 persons living in 1,013 individual households.<a href=\"https://en.wikipedia.org/wiki/Ghandruk#cite_note-1\">[1]</a><img alt=\"\" src=\"http://www.nepaltrekkingtours.com/images/ghandruk-village-trek.jpg\" style=\"float:right; height:113px; width:151px\" /></p>\r\n\r\n<p>Ghandruk is a popular place for treks in the Annapurna range of Nepal( i.e. specially for Annapurna Base camp trek), with easy trails and various accommodation possibilities.From Ghandruk there are views to the mountains of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Annapurna\">Annapurna</a>&nbsp;including&nbsp;<a href=\"https://en.wikipedia.org/wiki/Machapuchare\">Machapuchare</a>, Himchuli. By this reason it&#39;s purely in natural setting. 11111111111 11111111111</p>\r\n', 8, '<p>Biska Jatra[<a href=\"https://en.wikipedia.org/w/index.php?title=List_of_festivals_in_Nepal&amp;action=edit&amp;section=8\">edit</a>]</p>\r\n\r\n<p>Biska Jatra (<a href=\"https://en.wikipedia.org/wiki/Bisket_Jatra\">Bisket Jatra</a>) is an annually celebrated festival of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Bhaktapur\">Bhaktapur</a>&nbsp;celebrated in the new year of&nbsp;<a href=\"https://en.wikipedia.org/w/index.php?title=Bikram_Sambar&amp;action=edit&amp;redlink=1\">Bikram Sambar</a>. Different idols of gods and goddesses are placed in their chariot called &quot;khat&quot; and are taken to different parts of Bhaktapur. It is the second biggest festival of the people of Bhaktapur after Dashain. It is celebrated for more than a week in Bhaktapur. Grand feasts are organized in different parts of Bhaktapur. Similarly, in&nbsp;<a href=\"https://en.wikipedia.org/wiki/Madhyapur_Thimi\">Madhyapur Thimi</a>&nbsp;(a part of Bhaktapur) people celebrate this festival by smearing colors in each others. Another part of Thimi named&nbsp;<a href=\"https://en.wikipedia.org/wiki/Bode,_Nepal\">Bode</a>&nbsp;celebrates this festival with tongue-piercing of the resident belonging to a&nbsp;<a href=\"https://en.wikipedia.org/wiki/Shrestha\">Shrestha</a>&nbsp;family.</p>\r\n\r\n<p>Bajra Jogini Jatra[<a href=\"https://en.wikipedia.org/w/index.php?title=List_of_festivals_in_Nepal&amp;action=edit&amp;section=9\">edit</a>]</p>\r\n\r\n<p><a href=\"https://en.wikipedia.org/w/index.php?title=Bajra_Jogini&amp;action=edit&amp;redlink=1\">Bajra Jogini</a>&nbsp;was originally celebrated by Buddhists but is also celebrated by Hindus on the 3rd of [Baisakh]. Her temple, Kharg Jogini, is found at&nbsp;<a href=\"https://en.wikipedia.org/w/index.php?title=Manichur&amp;action=edit&amp;redlink=1\">Manichur</a>&nbsp;mountain, near&nbsp;<a href=\"https://en.wikipedia.org/wiki/Sankhu\">Sankhu</a>. During the week-long festival, a fire is burned in the vicinity of the temple near an image of a human head. An image of the goddess is placed in a&nbsp;<em>khat</em>&nbsp;(a wooden shrine) and carried through the town by the men.</p>\r\n\r\n<p>Siti Jatra[<a href=\"https://en.wikipedia.org/w/index.php?title=List_of_festivals_in_Nepal&amp;action=edit&amp;section=10\">edit</a>]</p>\r\n\r\n<p>The Siti Jatra takes place on the 21st of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Jeth\">Jeth</a>, on the banks of the&nbsp;<a href=\"https://en.wikipedia.org/w/index.php?title=Vishnumati&amp;action=edit&amp;redlink=1\">Vishnumati</a>, between Kathmandu and&nbsp;<a href=\"https://en.wikipedia.org/w/index.php?title=Simbhunath&amp;action=edit&amp;redlink=1\">Simbhunath</a>. The people feast and afterwards divide into two teams to contest a stone throwing competition. The match was once a serious affair and anybody who was knocked down or captured by the other party was sacrificed to the goddess&nbsp;<a href=\"https://en.wikipedia.org/w/index.php?title=Kankeshwari&amp;action=edit&amp;redlink=1\">Kankeshwari</a>. In modern times, however. it is a light hearted affair, mostly among the children.</p>\r\n\r\n<p>Gathma Mangal or Ghanta Karn[<a href=\"https://en.wikipedia.org/w/index.php?title=List_of_festivals_in_Nepal&amp;action=edit&amp;section=11\">edit</a>]</p>\r\n\r\n<p>This festival refers to the celebration of the expulsion of a Rakshasa or demon from the country, held on the 14th of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Sawan\">Sawan</a>. The Newars make a straw figure which they beat and drag around the streets. The figures are burned at sunset.</p>\r\n\r\n<p>Panjaran[<a href=\"https://en.wikipedia.org/w/index.php?title=List_of_festivals_in_Nepal&amp;action=edit&amp;section=12\">edit</a>]</p>\r\n\r\n<p>The festival is celebrated twice a year, on the 8th of Sawan and the 13th of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Bhadon\">Bhadon</a>. The Banras, priests of the Newar Buddhists visit each house and receive a small offering of grain or rice to commemorate their ancestors who were not permitted to trade. The Newars decorate their shops and houses with pictures and flowers and the women sit with large baskets of rice and grain to dispense to the Banras. it is celebrated at late night.</p>\r\n\r\n<p>Janai Purnima[<a href=\"https://en.wikipedia.org/w/index.php?title=List_of_festivals_in_Nepal&amp;action=edit&amp;section=13\">edit</a>]</p>\r\n\r\n<p>The Janai Purnima also known as Rakshyabandhan festival takes place on the full moon day of&nbsp;<a href=\"https://en.wikipedia.org/w/index.php?title=Shrawan&amp;action=edit&amp;redlink=1\">Shrawan</a>&nbsp;i.e. Shrawan Purnima every year. In the year of 2071, it was on 25th Shrawan and in 2072 its on 12th of Bhadra. It is celebrated by Hindus and other Hindu related religions like Buddhist, Jain, belonging to aumkaar (? ??? )family. The Buddhist bathe in sacred streams and visit their temples and the Brahman priests offer an ornamental thread to the wrists of their followers and in return receive gifts. Many pilgrims visit Gosainkunda and bath at the sacred lake. Mainly the people of Brahmin and chettri community change the sacred around their neck. This festival has different names. Newars in Nepal celebrate it as Kwati Punhi Indian celebrate it as rakhi (raksha) bandhan.</p>\r\n\r\n<p>Nag Panchami[<a href=\"https://en.wikipedia.org/w/index.php?title=List_of_festivals_in_Nepal&amp;action=edit&amp;section=14\">edit</a>]</p>\r\n\r\n<p><a href=\"https://en.wikipedia.org/w/index.php?title=Nag_Panchani&amp;action=edit&amp;redlink=1\">Nag Panchani</a>&nbsp;takes place on the 5th of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Sawan\">Sawan</a>&nbsp;to commemorate the battle between&nbsp;<a href=\"https://en.wikipedia.org/wiki/N%C4%81ga\">Nag</a>&nbsp;and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Garur\">Garur</a>. The stone image of Garur at Changu Narayan is said to perspire during the festival and priests are sent to wipe the perspiration off with a handkerchief. They later present it to the king and water is used to make it into a snake bite remedy, despite the fact that there are few snakes inhabiting Nepal. There is a belief that nag panchami is the day of welcoming the other festivals in the Nepal.</p>\r\n\r\n<p>Krishna Janmashtami[<a href=\"https://en.wikipedia.org/w/index.php?title=List_of_festivals_in_Nepal&amp;action=edit&amp;section=15\">edit</a>]</p>\r\n\r\n<p><a href=\"https://en.wikipedia.org/wiki/Krishna_Janmashtami\">Krishna Janmashtami</a>&nbsp;is celebrated on the 8th of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Bhadon\">Bhadon</a>, in memory of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Lord_Krishna\">Lord Krishna</a>. Shops and houses are adorned in celebration.</p>\r\n\r\n<p>Gai Jatra[<a href=\"https://en.wikipedia.org/w/index.php?title=List_of_festivals_in_Nepal&amp;action=edit&amp;section=16\">edit</a>]</p>\r\n\r\n<p>This entirely Newar festival is held on the 1st day of Bhadon. Newars who have lost loved ones during the year traditionally disguised themselves as cows and danced around the palace of the king. However, in modern times, the ceremony is performed only as a masked dance with the singing of songs. Gaijatra, the festival of cows, (gai means cow and jatra means festival in Nepali: ?????????, and Nepal Bhasa: ??????) is celebrated in Nepal, mainly in Kathmandu valley by the Newar and Tharu community. It is also a grand festival in&nbsp;<a href=\"https://en.wikipedia.org/wiki/Jumla_(town)\">Jumla</a>, celebrated by people of all caste . The festival commemorates the death of people during the year. During the festival, cows are marched in the streets and generally celebrated in the Nepalese month of Bhadra (August&ndash;September).</p>\r\n\r\n<p>It falls on the 1st day of the dark fortnight of Gu</p>\r\n', NULL, NULL),
(102, 'ghandruk', '1', '<p><strong>Ghandruk</strong>&nbsp;(<a href=\"https://en.wikipedia.org/wiki/Nepali_language\">Nepali</a>:&nbsp;<a href=\"https://ne.wikipedia.org/wiki/%E0%A4%98%E0%A4%BE%E0%A4%A8%E0%A5%8D%E0%A4%A6%E0%A5%8D%E0%A4%B0%E0%A5%81%E0%A4%95\">ne:?????????</a>) is a&nbsp;<a href=\"https://en.wikipedia.org/wiki/Town\">town</a>&nbsp;and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Village_Development_Committee_(Nepal)\">Village Development Committee</a>&nbsp;in&nbsp;<a href=\"https://en.wikipedia.org/wiki/Kaski_District\">Kaski District</a>&nbsp;in the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Gandaki_Zone\">Gandaki Zone</a>&nbsp;of northern-central&nbsp;<a href=\"https://en.wikipedia.org/wiki/Nepal\">Nepal</a>. At the time of the&nbsp;<a href=\"https://en.wikipedia.org/wiki/1991_Nepal_census\">1991 Nepal census</a>&nbsp;it had a population of 4,748 persons living in 1,013 individual households.<a href=\"https://en.wikipedia.org/wiki/Ghandruk#cite_note-1\">[1]</a></p>\r\n\r\n<p>Ghandruk is a popular place for treks in the Annapurna range of Nepal( i.e. specially for Annapurna Base camp trek), with easy trails and various accommodation possibilities.From Ghandruk there are views to the mountains of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Annapurna\">Annapurna</a>&nbsp;including&nbsp;<a href=\"https://en.wikipedia.org/wiki/Machapuchare\">Machapuchare</a>, Himchuli. By this reason it&#39;s purely in natural setting.</p>\r\n', 'ghandruk', '5', '<p><strong>Ghandruk</strong>&nbsp;(<a href=\"https://en.wikipedia.org/wiki/Nepali_language\">Nepali</a>:&nbsp;<a href=\"https://ne.wikipedia.org/wiki/%E0%A4%98%E0%A4%BE%E0%A4%A8%E0%A5%8D%E0%A4%A6%E0%A5%8D%E0%A4%B0%E0%A5%81%E0%A4%95\">ne:?????????</a>) is a&nbsp;<a href=\"https://en.wikipedia.org/wiki/Town\">town</a>&nbsp;and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Village_Development_Committee_(Nepal)\">Village Development Committee</a>&nbsp;in&nbsp;<a href=\"https://en.wikipedia.org/wiki/Kaski_District\">Kaski District</a>&nbsp;in the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Gandaki_Zone\">Gandaki Zone</a>&nbsp;of northern-central&nbsp;<a href=\"https://en.wikipedia.org/wiki/Nepal\">Nepal</a>. At the time of the&nbsp;<a href=\"https://en.wikipedia.org/wiki/1991_Nepal_census\">1991 Nepal census</a>&nbsp;it had a population of 4,748 persons living in 1,013 individual households.<a href=\"https://en.wikipedia.org/wiki/Ghandruk#cite_note-1\">[1]</a><img alt=\"\" src=\"http://www.nepaltrekkingtours.com/images/ghandruk-village-trek.jpg\" style=\"float:right; height:113px; width:151px\" /></p>\r\n\r\n<p>Ghandruk is a popular place for treks in the Annapurna range of Nepal( i.e. specially for Annapurna Base camp trek), with easy trails and various accommodation possibilities.From Ghandruk there are views to the mountains of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Annapurna\">Annapurna</a>&nbsp;including&nbsp;<a href=\"https://en.wikipedia.org/wiki/Machapuchare\">Machapuchare</a>, Himchuli. By this reason it&#39;s purely in natural setting. 11111111111 11111111111</p>\r\n', 8, '<p>Biska Jatra[<a href=\"https://en.wikipedia.org/w/index.php?title=List_of_festivals_in_Nepal&amp;action=edit&amp;section=8\">edit</a>]</p>\r\n\r\n<p>Biska Jatra (<a href=\"https://en.wikipedia.org/wiki/Bisket_Jatra\">Bisket Jatra</a>) is an annually celebrated festival of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Bhaktapur\">Bhaktapur</a>&nbsp;celebrated in the new year of&nbsp;<a href=\"https://en.wikipedia.org/w/index.php?title=Bikram_Sambar&amp;action=edit&amp;redlink=1\">Bikram Sambar</a>. Different idols of gods and goddesses are placed in their chariot called &quot;khat&quot; and are taken to different parts of Bhaktapur. It is the second biggest festival of the people of Bhaktapur after Dashain. It is celebrated for more than a week in Bhaktapur. Grand feasts are organized in different parts of Bhaktapur. Similarly, in&nbsp;<a href=\"https://en.wikipedia.org/wiki/Madhyapur_Thimi\">Madhyapur Thimi</a>&nbsp;(a part of Bhaktapur) people celebrate this festival by smearing colors in each others. Another part of Thimi named&nbsp;<a href=\"https://en.wikipedia.org/wiki/Bode,_Nepal\">Bode</a>&nbsp;celebrates this festival with tongue-piercing of the resident belonging to a&nbsp;<a href=\"https://en.wikipedia.org/wiki/Shrestha\">Shrestha</a>&nbsp;family.</p>\r\n\r\n<p>Bajra Jogini Jatra[<a href=\"https://en.wikipedia.org/w/index.php?title=List_of_festivals_in_Nepal&amp;action=edit&amp;section=9\">edit</a>]</p>\r\n\r\n<p><a href=\"https://en.wikipedia.org/w/index.php?title=Bajra_Jogini&amp;action=edit&amp;redlink=1\">Bajra Jogini</a>&nbsp;was originally celebrated by Buddhists but is also celebrated by Hindus on the 3rd of [Baisakh]. Her temple, Kharg Jogini, is found at&nbsp;<a href=\"https://en.wikipedia.org/w/index.php?title=Manichur&amp;action=edit&amp;redlink=1\">Manichur</a>&nbsp;mountain, near&nbsp;<a href=\"https://en.wikipedia.org/wiki/Sankhu\">Sankhu</a>. During the week-long festival, a fire is burned in the vicinity of the temple near an image of a human head. An image of the goddess is placed in a&nbsp;<em>khat</em>&nbsp;(a wooden shrine) and carried through the town by the men.</p>\r\n\r\n<p>Siti Jatra[<a href=\"https://en.wikipedia.org/w/index.php?title=List_of_festivals_in_Nepal&amp;action=edit&amp;section=10\">edit</a>]</p>\r\n\r\n<p>The Siti Jatra takes place on the 21st of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Jeth\">Jeth</a>, on the banks of the&nbsp;<a href=\"https://en.wikipedia.org/w/index.php?title=Vishnumati&amp;action=edit&amp;redlink=1\">Vishnumati</a>, between Kathmandu and&nbsp;<a href=\"https://en.wikipedia.org/w/index.php?title=Simbhunath&amp;action=edit&amp;redlink=1\">Simbhunath</a>. The people feast and afterwards divide into two teams to contest a stone throwing competition. The match was once a serious affair and anybody who was knocked down or captured by the other party was sacrificed to the goddess&nbsp;<a href=\"https://en.wikipedia.org/w/index.php?title=Kankeshwari&amp;action=edit&amp;redlink=1\">Kankeshwari</a>. In modern times, however. it is a light hearted affair, mostly among the children.</p>\r\n\r\n<p>Gathma Mangal or Ghanta Karn[<a href=\"https://en.wikipedia.org/w/index.php?title=List_of_festivals_in_Nepal&amp;action=edit&amp;section=11\">edit</a>]</p>\r\n\r\n<p>This festival refers to the celebration of the expulsion of a Rakshasa or demon from the country, held on the 14th of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Sawan\">Sawan</a>. The Newars make a straw figure which they beat and drag around the streets. The figures are burned at sunset.</p>\r\n\r\n<p>Panjaran[<a href=\"https://en.wikipedia.org/w/index.php?title=List_of_festivals_in_Nepal&amp;action=edit&amp;section=12\">edit</a>]</p>\r\n\r\n<p>The festival is celebrated twice a year, on the 8th of Sawan and the 13th of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Bhadon\">Bhadon</a>. The Banras, priests of the Newar Buddhists visit each house and receive a small offering of grain or rice to commemorate their ancestors who were not permitted to trade. The Newars decorate their shops and houses with pictures and flowers and the women sit with large baskets of rice and grain to dispense to the Banras. it is celebrated at late night.</p>\r\n\r\n<p>Janai Purnima[<a href=\"https://en.wikipedia.org/w/index.php?title=List_of_festivals_in_Nepal&amp;action=edit&amp;section=13\">edit</a>]</p>\r\n\r\n<p>The Janai Purnima also known as Rakshyabandhan festival takes place on the full moon day of&nbsp;<a href=\"https://en.wikipedia.org/w/index.php?title=Shrawan&amp;action=edit&amp;redlink=1\">Shrawan</a>&nbsp;i.e. Shrawan Purnima every year. In the year of 2071, it was on 25th Shrawan and in 2072 its on 12th of Bhadra. It is celebrated by Hindus and other Hindu related religions like Buddhist, Jain, belonging to aumkaar (? ??? )family. The Buddhist bathe in sacred streams and visit their temples and the Brahman priests offer an ornamental thread to the wrists of their followers and in return receive gifts. Many pilgrims visit Gosainkunda and bath at the sacred lake. Mainly the people of Brahmin and chettri community change the sacred around their neck. This festival has different names. Newars in Nepal celebrate it as Kwati Punhi Indian celebrate it as rakhi (raksha) bandhan.</p>\r\n\r\n<p>Nag Panchami[<a href=\"https://en.wikipedia.org/w/index.php?title=List_of_festivals_in_Nepal&amp;action=edit&amp;section=14\">edit</a>]</p>\r\n\r\n<p><a href=\"https://en.wikipedia.org/w/index.php?title=Nag_Panchani&amp;action=edit&amp;redlink=1\">Nag Panchani</a>&nbsp;takes place on the 5th of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Sawan\">Sawan</a>&nbsp;to commemorate the battle between&nbsp;<a href=\"https://en.wikipedia.org/wiki/N%C4%81ga\">Nag</a>&nbsp;and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Garur\">Garur</a>. The stone image of Garur at Changu Narayan is said to perspire during the festival and priests are sent to wipe the perspiration off with a handkerchief. They later present it to the king and water is used to make it into a snake bite remedy, despite the fact that there are few snakes inhabiting Nepal. There is a belief that nag panchami is the day of welcoming the other festivals in the Nepal.</p>\r\n\r\n<p>Krishna Janmashtami[<a href=\"https://en.wikipedia.org/w/index.php?title=List_of_festivals_in_Nepal&amp;action=edit&amp;section=15\">edit</a>]</p>\r\n\r\n<p><a href=\"https://en.wikipedia.org/wiki/Krishna_Janmashtami\">Krishna Janmashtami</a>&nbsp;is celebrated on the 8th of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Bhadon\">Bhadon</a>, in memory of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Lord_Krishna\">Lord Krishna</a>. Shops and houses are adorned in celebration.</p>\r\n\r\n<p>Gai Jatra[<a href=\"https://en.wikipedia.org/w/index.php?title=List_of_festivals_in_Nepal&amp;action=edit&amp;section=16\">edit</a>]</p>\r\n\r\n<p>This entirely Newar festival is held on the 1st day of Bhadon. Newars who have lost loved ones during the year traditionally disguised themselves as cows and danced around the palace of the king. However, in modern times, the ceremony is performed only as a masked dance with the singing of songs. Gaijatra, the festival of cows, (gai means cow and jatra means festival in Nepali: ?????????, and Nepal Bhasa: ??????) is celebrated in Nepal, mainly in Kathmandu valley by the Newar and Tharu community. It is also a grand festival in&nbsp;<a href=\"https://en.wikipedia.org/wiki/Jumla_(town)\">Jumla</a>, celebrated by people of all caste . The festival commemorates the death of people during the year. During the festival, cows are marched in the streets and generally celebrated in the Nepalese month of Bhadra (August&ndash;September).</p>\r\n\r\n<p>It falls on the 1st day of the dark fortnight of Gu</p>\r\n', NULL, NULL),
(103, 'Chitwan National Park', '', '<p><strong>Chitwan National Park</strong>&nbsp;(<a href=\"https://en.wikipedia.org/wiki/Nepali_language\">Nepali</a>:&nbsp;????? ????????? ???????; formerly&nbsp;<strong>Royal Chitwan National Park</strong>) is the first national park in&nbsp;<a href=\"https://en.wikipedia.org/wiki/Nepal\">Nepal</a>. It was established in 1973 and granted the status of a&nbsp;<a href=\"https://en.wikipedia.org/wiki/World_Heritage_Site\">World Heritage Site</a>&nbsp;in 1984. It covers an area of 932&nbsp;km2&nbsp;(360&nbsp;sq&nbsp;mi) and is located in the subtropical&nbsp;<a href=\"https://en.wikipedia.org/wiki/Inner_Terai_Valleys_of_Nepal\">Inner Terai lowlands</a>&nbsp;of south-central Nepal in the districts of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Nawalparasi_District\">Nawalparasi</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Parsa_District\">Parsa</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Chitwan_District\">Chitwan</a>&nbsp;and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Makwanpur_District\">Makwanpur</a>. In altitude it ranges from about 100&nbsp;m (330&nbsp;ft) in the river valleys to 815&nbsp;m (2,674&nbsp;ft) in the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Sivalik_Hills\">Churia Hills</a>.<a href=\"https://en.wikipedia.org/wiki/Chitwan_National_Park#cite_note-nbrb07-1\">[1]</a></p>\r\n\r\n<p>In the north and west of the protected area the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Gandaki_River\">Narayani</a>-Rapti river system forms a natural boundary to human settlements. Adjacent to the east of Chitwan National Park is&nbsp;<a href=\"https://en.wikipedia.org/wiki/Parsa_Wildlife_Reserve\">Parsa Wildlife Reserve</a>, contiguous in the south is the Indian Tiger Reserve&nbsp;<a href=\"https://en.wikipedia.org/wiki/Valmiki_National_Park\">Valmiki National Park</a>. The coherent protected area of 2,075&nbsp;km2&nbsp;(801&nbsp;sq&nbsp;mi) represents the&nbsp;<em><a href=\"https://en.wikipedia.org/wiki/Bengal_tiger\">Tiger</a>&nbsp;Conservation Unit (TCU) Chitwan-Parsa-Valmiki</em>, which covers a 3,549&nbsp;km2&nbsp;(1,370&nbsp;sq&nbsp;mi) huge block of alluvial grasslands and subtropical moist deciduous forests.<a href=\"https://en.wikipedia.org/wiki/Chitwan_National_Park#cite_note-2\">[2]</a></p>\r\n', 'chitwan', '9', '<p>Chitwan National Park is one of Nepal&rsquo;s most popular&nbsp;<a href=\"https://en.wikipedia.org/wiki/Tourism\">tourist</a>&nbsp;destinations. In 1989 more than 31,000 people visited the park, and ten years later already more than 77,000.</p>\r\n\r\n<p>There are two main entrances to visit the Chitwan National Park: the tourist town of Sauraha in the east and the tranquil Tharu settlement of Meghauli Village in the west.</p>\r\n\r\n<p><a href=\"https://en.wikipedia.org/wiki/Sauraha\">Sauraha</a>&nbsp;is a well-known spot for package tourists and offers a choice of hundreds of hotels, lodges, restaurants and agencies.&nbsp;<a href=\"https://en.wikipedia.org/wiki/Meghauli\">Meghauli</a>&nbsp;has recently opened up as a tourist destination with the creation of the Tharu Homestay Program to promote the village tourism in the area, offering a more authentic and intimate jungle experience. It now has also a couple of budget guest houses and seven jungle lodges to cater to all budgets.</p>\r\n\r\n<p>Both destinations can be reached from Narayangarh in less than two hours.</p>\r\n', 8, '<p>Chitwan National Park is one of Nepal&rsquo;s most popular&nbsp;<a href=\"https://en.wikipedia.org/wiki/Tourism\">tourist</a>&nbsp;destinations. In 1989 more than 31,000 people visited the park, and ten years later already more than 77,000.</p>\r\n\r\n<p>There are two main entrances to visit the Chitwan National Park: the tourist town of Sauraha in the east and the tranquil Tharu settlement of Meghauli Village in the west.</p>\r\n\r\n<p><a href=\"https://en.wikipedia.org/wiki/Sauraha\">Sauraha</a>&nbsp;is a well-known spot for package tourists and offers a choice of hundreds of hotels, lodges, restaurants and agencies.&nbsp;<a href=\"https://en.wikipedia.org/wiki/Meghauli\">Meghauli</a>&nbsp;has recently opened up as a tourist destination with the creation of the Tharu Homestay Program to promote the village tourism in the area, offering a more authentic and intimate jungle experience. It now has also a couple of budget guest houses and seven jungle lodges to cater to all budgets.</p>\r\n\r\n<p>Both destinations can be reached from Narayangarh in less than two hours.</p>\r\n', '<p><strong>Chitwan National Park</strong>&nbsp;<strong>tour I</strong>&nbsp;is the two days short safari experience at UNESCO site Chitwan National Park. This short safari package in Chtiwan is designed to meet needs of those who are seeking to penetrate the dense wild zone deep into and entertain the best safari experience.</p>\r\n\r\n<p>By starting from Kathmandu, this trip extends to Chitwan on covering walk around the local Tharu village, fantastic traditional cultural show, and the highlight of the trip Elephant back safari. Join us and make your safari dream fulfilled.</p>\r\n', '<p>Company Register No. 55994/065/066 ,Gov. L');
INSERT INTO `place` (`place_id`, `placetitle`, `placeaddress`, `placedescription`, `placeimages`, `placecatagory`, `placespeciality`, `user_id`, `festivals`, `trip_summary`, `contact`) VALUES
(109, 'David Falls', '1', '<p>The water forms an underground tunnel after reaching the bottom. This tunnel is approximately 500 feet (150 m) long and runs 100 feet (30 m) below ground level. On 31 July 1961, a Swiss couple Davi went swimming but the woman drowned in a pit because of the overflow. Her body was recovered 3 days later in river Phusre with great effort. Her father wished to name it &quot;Davi&#39;s falls&quot; after her. Its Nepali name is Patale Chango, which means &quot;underworld waterfall&quot;. After exiting the tunnel, the water passes through a cave called Gupteshwor Mahadev or &quot;cave beneath the ground&quot;. The Phewa Lake dam is the water source.[1] It is an attraction for tourists and locals. Thousands of Nepalis visit for recreation and enjoyment. Visitors can try their luck on the luck pond constructed there by throwing and placing the coin on the statue of god. Likewise, one can find a model of traditional typical Nepali house and a series of statue of Nepali people wearing traditional dresses where visitors can click photo</p>\r\n', 'pokhara', '6', '<p>The water forms an underground tunnel after reaching the bottom. This tunnel is approximately 500 feet (150 m) long and runs 100 feet (30 m) below ground level. On 31 July 1961, a Swiss couple Davi went swimming but the woman drowned in a pit because of the overflow. Her body was recovered 3 days later in river Phusre with great effort. Her father wished to name it &quot;Davi&#39;s falls&quot; after her. Its Nepali name is Patale Chango, which means &quot;underworld waterfall&quot;. After exiting the tunnel, the water passes through a cave called Gupteshwor Mahadev or &quot;cave beneath the ground&quot;. The Phewa Lake dam is the water source.[1] It is an attraction for tourists and locals. Thousands of Nepalis visit for recreation and enjoyment. Visitors can try their luck on the luck pond constructed there by throwing and placing the coin on the statue of god. Likewise, one can find a model of traditional typical Nepali house and a series of statue of Nepali people wearing traditional dresses where visitors can click photo</p>\r\n', 8, '<p>The water forms an underground tunnel after reaching the bottom. This tunnel is approximately 500 feet (150 m) long and runs 100 feet (30 m) below ground level. On 31 July 1961, a Swiss couple Davi went swimming but the woman drowned in a pit because of the overflow. Her body was recovered 3 days later in river Phusre with great effort. Her father wished to name it &quot;Davi&#39;s falls&quot; after her. Its Nepali name is Patale Chango, which means &quot;underworld waterfall&quot;. After exiting the tunnel, the water passes through a cave called Gupteshwor Mahadev or &quot;cave beneath the ground&quot;. The Phewa Lake dam is the water source.[1] It is an attraction for tourists and locals. Thousands of Nepalis visit for recreation and enjoyment. Visitors can try their luck on the luck pond constructed there by throwing and placing the coin on the statue of god. Likewise, one can find a model of traditional typical Nepali house and a series of statue of Nepali people wearing traditional dresses where visitors can click photo</p>\r\n', '<p>The water forms an underground tunnel after reaching the bottom. This tunnel is approximately 500 feet (150 m) long and runs 100 feet (30 m) below ground level. On 31 July 1961, a Swiss couple Davi went swimming but the woman drowned in a pit because of the overflow. Her body was recovered 3 days later in river Phusre with great effort. Her father wished to name it &quot;Davi&#39;s falls&quot; after her. Its Nepali name is Patale Chango, which means &quot;underworld waterfall&quot;. After exiting the tunnel, the water passes through a cave called Gupteshwor Mahadev or &quot;cave beneath the ground&quot;. The Phewa Lake dam is the water source.[1] It is an attraction for tourists and locals. Thousands of Nepalis visit for recreation and enjoyment. Visitors can try their luck on the luck pond constructed there by throwing and placing the coin on the statue of god. Likewise, one can find a model of traditional typical Nepali house and a series of statue of Nepali people wearing traditional dresses where visitors can click photo</p>\r\n', '<p>The water forms an underground tunnel afte'),
(110, 'Nigra Falls', '', '<p>The water forms an underground tunnel after reaching the bottom. This tunnel is approximately 500 feet (150 m) long and runs 100 feet (30 m) below ground level. On 31 July 1961, a Swiss couple Davi went swimming but the woman drowned in a pit because of the overflow. Her body was recovered 3 days later in river Phusre with great effort. Her father wished to name it &quot;Davi&#39;s falls&quot; after her. Its Nepali name is Patale Chango, which means &quot;underworld waterfall&quot;. After exiting the tunnel, the water passes through a cave called Gupteshwor Mahadev or &quot;cave beneath the ground&quot;. The Phewa Lake dam is the water source.[1] It is an attraction for tourists and locals. Thousands of Nepalis visit for recreation and enjoyment. Visitors can try their luck on the luck pond constructed there by throwing and placing the coin on the statue of god. Likewise, one can find a model of traditional typical Nepali house and a series of statue of Nepali people wearing traditional dresses where visitors can click photo</p>\r\n', 'daldale', '6', '<p>The water forms an underground tunnel after reaching the bottom. This tunnel is approximately 500 feet (150 m) long and runs 100 feet (30 m) below ground level. On 31 July 1961, a Swiss couple Davi went swimming but the woman drowned in a pit because of the overflow. Her body was recovered 3 days later in river Phusre with great effort. Her father wished to name it &quot;Davi&#39;s falls&quot; after her. Its Nepali name is Patale Chango, which means &quot;underworld waterfall&quot;. After exiting the tunnel, the water passes through a cave called Gupteshwor Mahadev or &quot;cave beneath the ground&quot;. The Phewa Lake dam is the water source.[1] It is an attraction for tourists and locals. Thousands of Nepalis visit for recreation and enjoyment. Visitors can try their luck on the luck pond constructed there by throwing and placing the coin on the statue of god. Likewise, one can find a model of traditional typical Nepali house and a series of statue of Nepali people wearing traditional dresses where visitors can click photo</p>\r\n', 8, '<p>The water forms an underground tunnel after reaching the bottom. This tunnel is approximately 500 feet (150 m) long and runs 100 feet (30 m) below ground level. On 31 July 1961, a Swiss couple Davi went swimming but the woman drowned in a pit because of the overflow. Her body was recovered 3 days later in river Phusre with great effort. Her father wished to name it &quot;Davi&#39;s falls&quot; after her. Its Nepali name is Patale Chango, which means &quot;underworld waterfall&quot;. After exiting the tunnel, the water passes through a cave called Gupteshwor Mahadev or &quot;cave beneath the ground&quot;. The Phewa Lake dam is the water source.[1] It is an attraction for tourists and locals. Thousands of Nepalis visit for recreation and enjoyment. Visitors can try their luck on the luck pond constructed there by throwing and placing the coin on the statue of god. Likewise, one can find a model of traditional typical Nepali house and a series of statue of Nepali people wearing traditional dresses where visitors can click photo</p>\r\n', '<p>The water forms an underground tunnel after reaching the bottom. This tunnel is approximately 500 feet (150 m) long and runs 100 feet (30 m) below ground level. On 31 July 1961, a Swiss couple Davi went swimming but the woman drowned in a pit because of the overflow. Her body was recovered 3 days later in river Phusre with great effort. Her father wished to name it &quot;Davi&#39;s falls&quot; after her. Its Nepali name is Patale Chango, which means &quot;underworld waterfall&quot;. After exiting the tunnel, the water passes through a cave called Gupteshwor Mahadev or &quot;cave beneath the ground&quot;. The Phewa Lake dam is the water source.[1] It is an attraction for tourists and locals. Thousands of Nepalis visit for recreation and enjoyment. Visitors can try their luck on the luck pond constructed there by throwing and placing the coin on the statue of god. Likewise, one can find a model of traditional typical Nepali house and a series of statue of Nepali people wearing traditional dresses where visitors can click photo</p>\r\n', '<p>The water forms an underground tunnel afte'),
(111, 'Jharna Daldale', '', '<p>The water forms an underground tunnel after reaching the bottom. This tunnel is approximately 500 feet (150 m) long and runs 100 feet (30 m) below ground level. On 31 July 1961, a Swiss couple Davi went swimming but the woman drowned in a pit because of the overflow. Her body was recovered 3 days later in river Phusre with great effort. Her father wished to name it &amp;quot;Davi&amp;#39;s falls&amp;quot; after her. Its Nepali name is Patale Chango, which means &amp;quot;underworld waterfall&amp;quot;. After exiting the tunnel, the water passes through a cave called Gupteshwor Mahadev or &amp;quot;cave beneath the ground&amp;quot;. The Phewa Lake dam is the water source.[1] It is an attraction for tourists and locals. Thousands of Nepalis visit for recreation and enjoyment. Visitors can try their luck on the luck pond constructed there by throwing and placing the coin on the statue of god. Likewise, one can find a model of traditional typical Nepali house and a series of statue of Nepali people wearing traditional dresses where visitors can click photo</p>\r\n', 'daldale', '6', '<p>The water forms an underground tunnel after reaching the bottom. This tunnel is approximately 500 feet (150 m) long and runs 100 feet (30 m) below ground level. On 31 July 1961, a Swiss couple Davi went swimming but the woman drowned in a pit because of the overflow. Her body was recovered 3 days later in river Phusre with great effort. Her father wished to name it &amp;quot;Davi&amp;#39;s falls&amp;quot; after her. Its Nepali name is Patale Chango, which means &amp;quot;underworld waterfall&amp;quot;. After exiting the tunnel, the water passes through a cave called Gupteshwor Mahadev or &amp;quot;cave beneath the ground&amp;quot;. The Phewa Lake dam is the water source.[1] It is an attraction for tourists and locals. Thousands of Nepalis visit for recreation and enjoyment. Visitors can try their luck on the luck pond constructed there by throwing and placing the coin on the statue of god. Likewise, one can find a model of traditional typical Nepali house and a series of statue of Nepali people wearing traditional dresses where visitors can click photo</p>\r\n', 8, '<p>The water forms an underground tunnel after reaching the bottom. This tunnel is approximately 500 feet (150 m) long and runs 100 feet (30 m) below ground level. On 31 July 1961, a Swiss couple Davi went swimming but the woman drowned in a pit because of the overflow. Her body was recovered 3 days later in river Phusre with great effort. Her father wished to name it &amp;quot;Davi&amp;#39;s falls&amp;quot; after her. Its Nepali name is Patale Chango, which means &amp;quot;underworld waterfall&amp;quot;. After exiting the tunnel, the water passes through a cave called Gupteshwor Mahadev or &amp;quot;cave beneath the ground&amp;quot;. The Phewa Lake dam is the water source.[1] It is an attraction for tourists and locals. Thousands of Nepalis visit for recreation and enjoyment. Visitors can try their luck on the luck pond constructed there by throwing and placing the coin on the statue of god. Likewise, one can find a model of traditional typical Nepali house and a series of statue of Nepali people wearing traditional dresses where visitors can click photo</p>\r\n', '<p>The water forms an underground tunnel after reaching the bottom. This tunnel is approximately 500 feet (150 m) long and runs 100 feet (30 m) below ground level. On 31 July 1961, a Swiss couple Davi went swimming but the woman drowned in a pit because of the overflow. Her body was recovered 3 days later in river Phusre with great effort. Her father wished to name it &amp;quot;Davi&amp;#39;s falls&amp;quot; after her. Its Nepali name is Patale Chango, which means &amp;quot;underworld waterfall&amp;quot;. After exiting the tunnel, the water passes through a cave called Gupteshwor Mahadev or &amp;quot;cave beneath the ground&amp;quot;. The Phewa Lake dam is the water source.[1] It is an attraction for tourists and locals. Thousands of Nepalis visit for recreation and enjoyment. Visitors can try their luck on the luck pond constructed there by throwing and placing the coin on the statue of god. Likewise, one can find a model of traditional typical Nepali house and a series of statue of Nepali people wearing traditional dresses where visitors can click photo</p>\r\n', '<p>The water forms an underground tunnel afte'),
(112, 'chitwan falls', '1', '<p>The water forms an underground tunnel after reaching the bottom. This tunnel is approximately 500 feet (150 m) long and runs 100 feet (30 m) below ground level. On 31 July 1961, a Swiss couple Davi went swimming but the woman drowned in a pit because of the overflow. Her body was recovered 3 days later in river Phusre with great effort. Her father wished to name it &amp;quot;Davi&amp;#39;s falls&amp;quot; after her. Its Nepali name is Patale Chango, which means &amp;quot;underworld waterfall&amp;quot;. After exiting the tunnel, the water passes through a cave called Gupteshwor Mahadev or &amp;quot;cave beneath the ground&amp;quot;. The Phewa Lake dam is the water source.[1] It is an attraction for tourists and locals. Thousands of Nepalis visit for recreation and enjoyment. Visitors can try their luck on the luck pond constructed there by throwing and placing the coin on the statue of god. Likewise, one can find a model of traditional typical Nepali house and a series of statue of Nepali people wearing traditional dresses where visitors can click photo</p>\r\n', 'daldale', '6', '<p>The water forms an underground tunnel after reaching the bottom. This tunnel is approximately 500 feet (150 m) long and runs 100 feet (30 m) below ground level. On 31 July 1961, a Swiss couple Davi went swimming but the woman drowned in a pit because of the overflow. Her body was recovered 3 days later in river Phusre with great effort. Her father wished to name it &amp;quot;Davi&amp;#39;s falls&amp;quot; after her. Its Nepali name is Patale Chango, which means &amp;quot;underworld waterfall&amp;quot;. After exiting the tunnel, the water passes through a cave called Gupteshwor Mahadev or &amp;quot;cave beneath the ground&amp;quot;. The Phewa Lake dam is the water source.[1] It is an attraction for tourists and locals. Thousands of Nepalis visit for recreation and enjoyment. Visitors can try their luck on the luck pond constructed there by throwing and placing the coin on the statue of god. Likewise, one can find a model of traditional typical Nepali house and a series of statue of Nepali people wearing traditional dresses where visitors can click photoThe water forms an underground tunnel after reaching the bottom. This tunnel is approximately 500 feet (150 m) long and runs 100 feet (30 m) below ground level. On 31 July 1961, a Swiss couple Davi went swimming but the woman drowned in a pit because of the overflow. Her body was recovered 3 days later in river Phusre with great effort. Her father wished to name it &amp;quot;Davi&amp;#39;s falls&amp;quot; after her. Its Nepali name is Patale Chango, which means &amp;quot;underworld waterfall&amp;quot;. After exiting the tunnel, the water passes through a cave called Gupteshwor Mahadev or &amp;quot;cave beneath the ground&amp;quot;. The Phewa Lake dam is the water source.[1] It is an attraction for tourists and locals. Thousands of Nepalis visit for recreation and enjoyment. Visitors can try their luck on the luck pond constructed there by throwing and placing the coin on the statue of god. Likewise, one can find a model of traditional typical Nepali house and a series of statue of Nepali people wearing traditional dresses where visitors can click photo</p>\r\n', 8, '<p>The water forms an underground tunnel after reaching the bottom. This tunnel is approximately 500 feet (150 m) long and runs 100 feet (30 m) below ground level. On 31 July 1961, a Swiss couple Davi went swimming but the woman drowned in a pit because of the overflow. Her body was recovered 3 days later in river Phusre with great effort. Her father wished to name it &amp;quot;Davi&amp;#39;s falls&amp;quot; after her. Its Nepali name is Patale Chango, which means &amp;quot;underworld waterfall&amp;quot;. After exiting the tunnel, the water passes through a cave called Gupteshwor Mahadev or &amp;quot;cave beneath the ground&amp;quot;. The Phewa Lake dam is the water source.[1] It is an attraction for tourists and locals. Thousands of Nepalis visit for recreation and enjoyment. Visitors can try their luck on the luck pond constructed there by throwing and placing the coin on the statue of god. Likewise, one can find a model of traditional typical Nepali house and a series of statue of Nepali people wearing traditional dresses where visitors can click photo</p>\r\n', '<p>The water forms an underground tunnel after reaching the bottom. This tunnel is approximately 500 feet (150 m) long and runs 100 feet (30 m) below ground level. On 31 July 1961, a Swiss couple Davi went swimming but the woman drowned in a pit because of the overflow. Her body was recovered 3 days later in river Phusre with great effort. Her father wished to name it &amp;quot;Davi&amp;#39;s falls&amp;quot; after her. Its Nepali name is Patale Chango, which means &amp;quot;underworld waterfall&amp;quot;. After exiting the tunnel, the water passes through a cave called Gupteshwor Mahadev or &amp;quot;cave beneath the ground&amp;quot;. The Phewa Lake dam is the water source.[1] It is an attraction for tourists and locals. Thousands of Nepalis visit for recreation and enjoyment. Visitors can try their luck on the luck pond constructed there by throwing and placing the coin on the statue of god. Likewise, one can find a model of traditional typical Nepali house and a series of statue of Nepali people wearing traditional dresses where visitors can click photo</p>\r\n', '<p>The water forms an underground tunnel afte'),
(113, 'Mahendra Gufa', '', '<p><strong>Chitwan National Park</strong>&nbsp;(<a href=\"https://en.wikipedia.org/wiki/Nepali_language\">Nepali</a>:&nbsp;????? ????????? ???????; formerly&nbsp;<strong>Royal Chitwan National Park</strong>) is the first national park in&nbsp;<a href=\"https://en.wikipedia.org/wiki/Nepal\">Nepal</a>. It was established in 1973 and granted the status of a&nbsp;<a href=\"https://en.wikipedia.org/wiki/World_Heritage_Site\">World Heritage Site</a>&nbsp;in 1984. It covers an area of 932&nbsp;km2&nbsp;(360&nbsp;sq&nbsp;mi) and is located in the subtropical&nbsp;<a href=\"https://en.wikipedia.org/wiki/Inner_Terai_Valleys_of_Nepal\">Inner Terai lowlands</a>&nbsp;of south-central Nepal in the districts of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Nawalparasi_District\">Nawalparasi</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Parsa_District\">Parsa</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Chitwan_District\">Chitwan</a>&nbsp;and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Makwanpur_District\">Makwanpur</a>. In altitude it ranges from about 100&nbsp;m (330&nbsp;ft) in the river valleys to 815&nbsp;m (2,674&nbsp;ft) in the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Sivalik_Hills\">Churia Hills</a>.<a href=\"https://en.wikipedia.org/wiki/Chitwan_National_Park#cite_note-nbrb07-1\">[1]</a></p>\r\n', 'pokhara', '7', '<p><strong>Chitwan National Park</strong>&nbsp;(<a href=\"https://en.wikipedia.org/wiki/Nepali_language\">Nepali</a>:&nbsp;????? ????????? ???????; formerly&nbsp;<strong>Royal Chitwan National Park</strong>) is the first national park in&nbsp;<a href=\"https://en.wikipedia.org/wiki/Nepal\">Nepal</a>. It was established in 1973 and granted the status of a&nbsp;<a href=\"https://en.wikipedia.org/wiki/World_Heritage_Site\">World Heritage Site</a>&nbsp;in 1984. It covers an area of 932&nbsp;km2&nbsp;(360&nbsp;sq&nbsp;mi) and is located in the subtropical&nbsp;<a href=\"https://en.wikipedia.org/wiki/Inner_Terai_Valleys_of_Nepal\">Inner Terai lowlands</a>&nbsp;of south-central Nepal in the districts of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Nawalparasi_District\">Nawalparasi</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Parsa_District\">Parsa</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Chitwan_District\">Chitwan</a>&nbsp;and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Makwanpur_District\">Makwanpur</a>. In altitude it ranges from about 100&nbsp;m (330&nbsp;ft) in the river valleys to 815&nbsp;m (2,674&nbsp;ft) in the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Sivalik_Hills\">Churia Hills</a>.<a href=\"https://en.wikipedia.org/wiki/Chitwan_National_Park#cite_note-nbrb07-1\">[1]</a></p>\r\n', 8, '<p><strong>Chitwan National Park</strong>&nbsp;(<a href=\"https://en.wikipedia.org/wiki/Nepali_language\">Nepali</a>:&nbsp;????? ????????? ???????; formerly&nbsp;<strong>Royal Chitwan National Park</strong>) is the first national park in&nbsp;<a href=\"https://en.wikipedia.org/wiki/Nepal\">Nepal</a>. It was established in 1973 and granted the status of a&nbsp;<a href=\"https://en.wikipedia.org/wiki/World_Heritage_Site\">World Heritage Site</a>&nbsp;in 1984. It covers an area of 932&nbsp;km2&nbsp;(360&nbsp;sq&nbsp;mi) and is located in the subtropical&nbsp;<a href=\"https://en.wikipedia.org/wiki/Inner_Terai_Valleys_of_Nepal\">Inner Terai lowlands</a>&nbsp;of south-central Nepal in the districts of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Nawalparasi_District\">Nawalparasi</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Parsa_District\">Parsa</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Chitwan_District\">Chitwan</a>&nbsp;and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Makwanpur_District\">Makwanpur</a>. In altitude it ranges from about 100&nbsp;m (330&nbsp;ft) in the river valleys to 815&nbsp;m (2,674&nbsp;ft) in the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Sivalik_Hills\">Churia Hills</a>.<a href=\"https://en.wikipedia.org/wiki/Chitwan_National_Park#cite_note-nbrb07-1\">[1]</a></p>\r\n', '<p><strong>Chitwan National Park</strong>&nbsp;(<a href=\"https://en.wikipedia.org/wiki/Nepali_language\">Nepali</a>:&nbsp;????? ????????? ???????; formerly&nbsp;<strong>Royal Chitwan National Park</strong>) is the first national park in&nbsp;<a href=\"https://en.wikipedia.org/wiki/Nepal\">Nepal</a>. It was established in 1973 and granted the status of a&nbsp;<a href=\"https://en.wikipedia.org/wiki/World_Heritage_Site\">World Heritage Site</a>&nbsp;in 1984. It covers an area of 932&nbsp;km2&nbsp;(360&nbsp;sq&nbsp;mi) and is located in the subtropical&nbsp;<a href=\"https://en.wikipedia.org/wiki/Inner_Terai_Valleys_of_Nepal\">Inner Terai lowlands</a>&nbsp;of south-central Nepal in the districts of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Nawalparasi_District\">Nawalparasi</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Parsa_District\">Parsa</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Chitwan_District\">Chitwan</a>&nbsp;and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Makwanpur_District\">Makwanpur</a>. In altitude it ranges from about 100&nbsp;m (330&nbsp;ft) in the river valleys to 815&nbsp;m (2,674&nbsp;ft) in the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Sivalik_Hills\">Churia Hills</a>.<a href=\"https://en.wikipedia.org/wiki/Chitwan_National_Park#cite_note-nbrb07-1\">[1]</a></p>\r\n', '<p><strong>Chitwan National Park</strong>&nbs'),
(114, 'test2', '', '<p>return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);</p>\r\n', 'bandipur', '5', '<p>return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);</p>\r\n', 8, '<p>return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);</p>\r\n', '<p>return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);</p>\r\n', '<p>return $this-&gt;redirect([&#39;view&#39;,'),
(115, 'Chameri Gufa', '', '<p>return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);</p>\r\n', 'bandipur', '7', '<p>return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);</p>\r\n', 8, '<p>return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);</p>\r\n', '<p>return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);</p>\r\n', '<p>return $this-&gt;redirect([&#39;view&#39;,'),
(116, 'Chameri Gufa', '', '<p>return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);</p>\r\n', 'bandipur', '6', '<p>return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);</p>\r\n', 8, '<p>return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);</p>\r\n', '<p>return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);return $this-&gt;redirect([&#39;view&#39;, &#39;id&#39; =&gt; $model-&gt;place_id]);</p>\r\n', '<p>return $this-&gt;redirect([&#39;view&#39;,'),
(119, 'namche', '', '<p>$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory</p>\r\n', 'bandipur', '7', '<p>$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory</p>\r\n', 8, '<p>$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory</p>\r\n', '<p>$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory</p>\r\n', '<p>$cname-&gt;placecatagory$cname-&gt;placeca'),
(120, 'Anna purna range', '', '<p>$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory</p>\r\n', 'pokhara', '8', '<p>$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory</p>\r\n', 8, '<p>$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory</p>\r\n', '<p>$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory$cname-&gt;placecatagory</p>\r\n', '<p>$cname-&gt;placecatagory$cname-&gt;placeca'),
(121, 'Everest Base Camp', '', '<p>|| $cname-&gt;placecatagory== &quot;Falls&quot; || $cname-&gt;placecatagory == &quot;falls&quot;|| $cname-&gt;placecatagory== &quot;Falls&quot; || $cname-&gt;placecatagory == &quot;falls&quot;|| $cname-&gt;placecatagory== &quot;Falls&quot; || $cname-&gt;placecatagory == &quot;falls&quot;|| $cname-&gt;placecatagory== &quot;Falls&quot; || $cname-&gt;placecatagory == &quot;falls&quot;|| $cname-&gt;placecatagory== &quot;Falls&quot; || $cname-&gt;placecatagory == &quot;falls&quot;|| $cname-&gt;placecatagory== &quot;Falls&quot; || $cname-&gt;placecatagory == &quot;falls&quot;|| $cname-&gt;placecatagory== &quot;Falls&quot; || $cname-&gt;placecatagory == &quot;falls&quot;</p>\r\n', 'bandipur', '8', '<p>|| $cname-&gt;placecatagory== &quot;Falls&quot; || $cname-&gt;placecatagory == &quot;falls&quot;|| $cname-&gt;placecatagory== &quot;Falls&quot; || $cname-&gt;placecatagory == &quot;falls&quot;|| $cname-&gt;placecatagory== &quot;Falls&quot; || $cname-&gt;placecatagory == &quot;falls&quot;|| $cname-&gt;placecatagory== &quot;Falls&quot; || $cname-&gt;placecatagory == &quot;falls&quot;|| $cname-&gt;placecatagory== &quot;Falls&quot; || $cname-&gt;placecatagory == &quot;falls&quot;|| $cname-&gt;placecatagory== &quot;Falls&quot; || $cname-&gt;placecatagory == &quot;falls&quot;|| $cname-&gt;placecatagory== &quot;Falls&quot; || $cname-&gt;placecatagory == &quot;falls&quot;</p>\r\n', 8, '<p>|| $cname-&gt;placecatagory== &quot;Falls&quot; || $cname-&gt;placecatagory == &quot;falls&quot;|| $cname-&gt;placecatagory== &quot;Falls&quot; || $cname-&gt;placecatagory == &quot;falls&quot;|| $cname-&gt;placecatagory== &quot;Falls&quot; || $cname-&gt;placecatagory == &quot;falls&quot;|| $cname-&gt;placecatagory== &quot;Falls&quot; || $cname-&gt;placecatagory == &quot;falls&quot;|| $cname-&gt;placecatagory== &quot;Falls&quot; || $cname-&gt;placecatagory == &quot;falls&quot;|| $cname-&gt;placecatagory== &quot;Falls&quot; || $cname-&gt;placecatagory == &quot;falls&quot;|| $cname-&gt;placecatagory== &quot;Falls&quot; || $cname-&gt;placecatagory == &quot;falls&quot;</p>\r\n', '<p>|| $cname-&gt;placecatagory== &quot;Falls&quot; || $cname-&gt;placecatagory == &quot;falls&quot;|| $cname-&gt;placecatagory== &quot;Falls&quot; || $cname-&gt;placecatagory == &quot;falls&quot;|| $cname-&gt;placecatagory== &quot;Falls&quot; || $cname-&gt;placecatagory == &quot;falls&quot;|| $cname-&gt;placecatagory== &quot;Falls&quot; || $cname-&gt;placecatagory == &quot;falls&quot;|| $cname-&gt;placecatagory== &quot;Falls&quot; || $cname-&gt;placecatagory == &quot;falls&quot;|| $cname-&gt;placecatagory== &quot;Falls&quot; || $cname-&gt;placecatagory == &quot;falls&quot;|| $cname-&gt;placecatagory== &quot;Falls&quot; || $cname-&gt;placecatagory == &quot;falls&quot;</p>\r\n', '<p>|| $cname-&gt;placecatagory== &quot;Falls&'),
(122, 'Machapuchre Mountain Range', '', '<p>&lt;tr&gt; &lt;td&gt;&lt;b&gt;Email :&lt;/b&gt;&lt;/td&gt; &lt;td&gt; jiwan.tamang255@gmail.com&lt;/td&gt; &lt;/tr&gt;&lt;tr&gt; &lt;td&gt;&lt;b&gt;Email :&lt;/b&gt;&lt;/td&gt; &lt;td&gt; jiwan.tamang255@gmail.com&lt;/td&gt; &lt;/tr&gt;&lt;tr&gt; &lt;td&gt;&lt;b&gt;Email :&lt;/b&gt;&lt;/td&gt; &lt;td&gt; jiwan.tamang255@gmail.com&lt;/td&gt; &lt;/tr&gt;&lt;tr&gt; &lt;td&gt;&lt;b&gt;Email :&lt;/b&gt;&lt;/td&gt; &lt;td&gt; jiwan.tamang255@gmail.com&lt;/td&gt; &lt;/tr&gt;&lt;tr&gt; &lt;td&gt;&lt;b&gt;Email :&lt;/b&gt;&lt;/td&gt; &lt;td&gt; jiwan.tamang255@gmail.com&lt;/td&gt; &lt;/tr&gt;&lt;tr&gt; &lt;td&gt;&lt;b&gt;Email :&lt;/b&gt;&lt;/td&gt; &lt;td&gt; jiwan.tamang255@gmail.com&lt;/td&gt; &lt;/tr&gt;</p>\r\n', 'pokhara', '8', '<p>&lt;tr&gt; &lt;td&gt;&lt;b&gt;Email :&lt;/b&gt;&lt;/td&gt; &lt;td&gt; jiwan.tamang255@gmail.com&lt;/td&gt; &lt;/tr&gt;&lt;tr&gt; &lt;td&gt;&lt;b&gt;Email :&lt;/b&gt;&lt;/td&gt; &lt;td&gt; jiwan.tamang255@gmail.com&lt;/td&gt; &lt;/tr&gt;&lt;tr&gt; &lt;td&gt;&lt;b&gt;Email :&lt;/b&gt;&lt;/td&gt; &lt;td&gt; jiwan.tamang255@gmail.com&lt;/td&gt; &lt;/tr&gt;&lt;tr&gt; &lt;td&gt;&lt;b&gt;Email :&lt;/b&gt;&lt;/td&gt; &lt;td&gt; jiwan.tamang255@gmail.com&lt;/td&gt; &lt;/tr&gt;&lt;tr&gt; &lt;td&gt;&lt;b&gt;Email :&lt;/b&gt;&lt;/td&gt; &lt;td&gt; jiwan.tamang255@gmail.com&lt;/td&gt; &lt;/tr&gt;&lt;tr&gt; &lt;td&gt;&lt;b&gt;Email :&lt;/b&gt;&lt;/td&gt; &lt;td&gt; jiwan.tamang255@gmail.com&lt;/td&gt; &lt;/tr&gt;&lt;tr&gt; &lt;td&gt;&lt;b&gt;Email :&lt;/b&gt;&lt;/td&gt; &lt;td&gt; jiwan.tamang255@gmail.com&lt;/td&gt; &lt;/tr&gt;&lt;tr&gt; &lt;td&gt;&lt;b&gt;Email :&lt;/b&gt;&lt;/td&gt; &lt;td&gt; jiwan.tamang255@gmail.com&lt;/td&gt; &lt;/tr&gt;</p>\r\n', 8, '<p>&lt;tr&gt; &lt;td&gt;&lt;b&gt;Email :&lt;/b&gt;&lt;/td&gt; &lt;td&gt; jiwan.tamang255@gmail.com&lt;/td&gt; &lt;/tr&gt;&lt;tr&gt; &lt;td&gt;&lt;b&gt;Email :&lt;/b&gt;&lt;/td&gt; &lt;td&gt; jiwan.tamang255@gmail.com&lt;/td&gt; &lt;/tr&gt;&lt;tr&gt; &lt;td&gt;&lt;b&gt;Email :&lt;/b&gt;&lt;/td&gt; &lt;td&gt; jiwan.tamang255@gmail.com&lt;/td&gt; &lt;/tr&gt;&lt;tr&gt; &lt;td&gt;&lt;b&gt;Email :&lt;/b&gt;&lt;/td&gt; &lt;td&gt; jiwan.tamang255@gmail.com&lt;/td&gt; &lt;/tr&gt;&lt;tr&gt; &lt;td&gt;&lt;b&gt;Email :&lt;/b&gt;&lt;/td&gt; &lt;td&gt; jiwan.tamang255@gmail.com&lt;/td&gt; &lt;/tr&gt;&lt;tr&gt; &lt;td&gt;&lt;b&gt;Email :&lt;/b&gt;&lt;/td&gt; &lt;td&gt; jiwan.tamang255@gmail.com&lt;/td&gt; &lt;/tr&gt;&lt;tr&gt; &lt;td&gt;&lt;b&gt;Email :&lt;/b&gt;&lt;/td&gt; &lt;td&gt; jiwan.tamang255@gmail.com&lt;/td&gt; &lt;/tr&gt;&lt;tr&gt; &lt;td&gt;&lt;b&gt;Email :&lt;/b&gt;&lt;/td&gt; &lt;td&gt; jiwan.tamang255@gmail.com&lt;/td&gt; &lt;/tr&gt;</p>\r\n', '<p>&lt;tr&gt; &lt;td&gt;&lt;b&gt;Email :&lt;/b&gt;&lt;/td&gt; &lt;td&gt; jiwan.tamang255@gmail.com&lt;/td&gt; &lt;/tr&gt;&lt;tr&gt; &lt;td&gt;&lt;b&gt;Email :&lt;/b&gt;&lt;/td&gt; &lt;td&gt; jiwan.tamang255@gmail.com&lt;/td&gt; &lt;/tr&gt;&lt;tr&gt; &lt;td&gt;&lt;b&gt;Email :&lt;/b&gt;&lt;/td&gt; &lt;td&gt; jiwan.tamang255@gmail.com&lt;/td&gt; &lt;/tr&gt;&lt;tr&gt; &lt;td&gt;&lt;b&gt;Email :&lt;/b&gt;&lt;/td&gt; &lt;td&gt; jiwan.tamang255@gmail.com&lt;/td&gt; &lt;/tr&gt;&lt;tr&gt; &lt;td&gt;&lt;b&gt;Email :&lt;/b&gt;&lt;/td&gt; &lt;td&gt; jiwan.tamang255@gmail.com&lt;/td&gt; &lt;/tr&gt;&lt;tr&gt; &lt;td&gt;&lt;b&gt;Email :&lt;/b&gt;&lt;/td&gt; &lt;td&gt; jiwan.tamang255@gmail.com&lt;/td&gt; &lt;/tr&gt;</p>\r\n', '<p>&lt;tr&gt; &lt;td&gt;&lt;b&gt;Email :&lt;/'),
(123, 'Khaptad Rastriya Nikunga', '1', '<p>The water forms an underground tunnel after reaching the bottom. This tunnel is approximately 500 feet (150 m) long and runs 100 feet (30 m) below ground level. On 31 July 1961, a Swiss couple Davi went swimming but the woman drowned in a pit because of the overflow. Her body was recovered 3 days later in river Phusre with great effort. Her father wished to name it &quot;Davi&#39;s falls&quot; after her. Its Nepali name is Patale Chango, which means &quot;underworld waterfall&quot;. After exiting the tunnel, the water passes through a cave called Gupteshwor Mahadev or &quot;cave beneath the ground&quot;. The Phewa Lake dam is the water source.[1] It is an attraction for tourists and locals. Thousands of Nepalis visit for recreation and enjoyment. Visitors can try their luck on the luck pond constructed there by throwing and placing the coin on the statue of god. Likewise, one can find a model of traditional typical Nepali house and a series of statue of Nepali people wearing traditional dresses where visitors can click photo</p>\r\n', 'pokhara', '9', '<p>The water forms an underground tunnel after reaching the bottom. This tunnel is approximately 500 feet (150 m) long and runs 100 feet (30 m) below ground level. On 31 July 1961, a Swiss couple Davi went swimming but the woman drowned in a pit because of the overflow. Her body was recovered 3 days later in river Phusre with great effort. Her father wished to name it &quot;Davi&#39;s falls&quot; after her. Its Nepali name is Patale Chango, which means &quot;underworld waterfall&quot;. After exiting the tunnel, the water passes through a cave called Gupteshwor Mahadev or &quot;cave beneath the ground&quot;. The Phewa Lake dam is the water source.[1] It is an attraction for tourists and locals. Thousands of Nepalis visit for recreation and enjoyment. Visitors can try their luck on the luck pond constructed there by throwing and placing the coin on the statue of god. Likewise, one can find a model of traditional typical Nepali house and a series of statue of Nepali people wearing traditional dresses where visitors can click photo</p>\r\n', 8, '<p>The water forms an underground tunnel after reaching the bottom. This tunnel is approximately 500 feet (150 m) long and runs 100 feet (30 m) below ground level. On 31 July 1961, a Swiss couple Davi went swimming but the woman drowned in a pit because of the overflow. Her body was recovered 3 days later in river Phusre with great effort. Her father wished to name it &quot;Davi&#39;s falls&quot; after her. Its Nepali name is Patale Chango, which means &quot;underworld waterfall&quot;. After exiting the tunnel, the water passes through a cave called Gupteshwor Mahadev or &quot;cave beneath the ground&quot;. The Phewa Lake dam is the water source.[1] It is an attraction for tourists and locals. Thousands of Nepalis visit for recreation and enjoyment. Visitors can try their luck on the luck pond constructed there by throwing and placing the coin on the statue of god. Likewise, one can find a model of traditional typical Nepali house and a series of statue of Nepali people wearing traditional dresses where visitors can click photo</p>\r\n', '<p>The water forms an underground tunnel after reaching the bottom. This tunnel is approximately 500 feet (150 m) long and runs 100 feet (30 m) below ground level. On 31 July 1961, a Swiss couple Davi went swimming but the woman drowned in a pit because of the overflow. Her body was recovered 3 days later in river Phusre with great effort. Her father wished to name it &quot;Davi&#39;s falls&quot; after her. Its Nepali name is Patale Chango, which means &quot;underworld waterfall&quot;. After exiting the tunnel, the water passes through a cave called Gupteshwor Mahadev or &quot;cave beneath the ground&quot;. The Phewa Lake dam is the water source.[1] It is an attraction for tourists and locals. Thousands of Nepalis visit for recreation and enjoyment. Visitors can try their luck on the luck pond constructed there by throwing and placing the coin on the statue of god. Likewise, one can find a model of traditional typical Nepali house and a series of statue of Nepali people wearing traditional dresses where visitors can click photo</p>\r\n', '<p>The water forms an underground tunnel afte');
INSERT INTO `place` (`place_id`, `placetitle`, `placeaddress`, `placedescription`, `placeimages`, `placecatagory`, `placespeciality`, `user_id`, `festivals`, `trip_summary`, `contact`) VALUES
(124, 'Everest Base Camp Trek', '', '<p>Everest Base Camp Trek lets you triumph over walking to the foot of breathtaking Everest (8848m), the world&rsquo;s highest mountain.</p>\r\n\r\n<p><strong>Everest Base Camp</strong>&nbsp;is either of two&nbsp;<a href=\"https://en.wikipedia.org/wiki/Base_camp#Shelter\">base camps</a>&nbsp;on opposite sides of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Mount_Everest\">Mount Everest</a>&nbsp;(It could also be any Everest base camp on given route, but this is less common since the two main routes became standardized). South Base Camp is in&nbsp;<a href=\"https://en.wikipedia.org/wiki/Nepal\">Nepal</a>&nbsp;at an altitude of 5,364 metres (17,598&nbsp;ft) (<a href=\"https://tools.wmflabs.org/geohack/geohack.php?pagename=Everest_Base_Camp&amp;params=28_0_26_N_86_51_34_E_type:landmark\">28&deg;0&prime;26&Prime;N&nbsp;86&deg;51&prime;34&Prime;E</a>), and North Base Camp is in&nbsp;<a href=\"https://en.wikipedia.org/wiki/Tibet_Autonomous_Region\">Tibet</a>&nbsp;at 5,150 metres (16,900&nbsp;ft)<a href=\"https://en.wikipedia.org/wiki/Everest_Base_Camp#cite_note-Geography-1\">[1]</a><a href=\"https://en.wikipedia.org/wiki/Everest_Base_Camp#cite_note-2\">[2]</a><a href=\"https://en.wikipedia.org/wiki/Everest_Base_Camp#cite_note-3\">[3]</a>&nbsp;(<a href=\"https://tools.wmflabs.org/geohack/geohack.php?pagename=Everest_Base_Camp&amp;params=28_8_29_N_86_51_5_E_type:landmark_region:CN&amp;title=North+Base+Camp\">28&deg;8&prime;29&Prime;N&nbsp;86&deg;51&prime;5&Prime;E</a>). These camps are rudimentary campsites on Mount Everest that are used by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Mountain_climber\">mountain climbers</a>&nbsp;during their ascent and descent. South Base Camp is used when climbing via the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Mount_Everest#Southeast_ridge\">southeast ridge</a>, while North Base Camp is used when climbing via the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Mount_Everest#North_ridge_route\">northeast ridge</a>.<a href=\"https://en.wikipedia.org/wiki/Everest_Base_Camp#cite_note-4\">[4]</a></p>\r\n', 'pokhara', '10', '<p><strong>Everest Base Camp</strong>&nbsp;is either of two&nbsp;<a href=\"https://en.wikipedia.org/wiki/Base_camp#Shelter\">base camps</a>&nbsp;on opposite sides of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Mount_Everest\">Mount Everest</a>&nbsp;(It could also be any Everest base camp on given route, but this is less common since the two main routes became standardized). South Base Camp is in&nbsp;<a href=\"https://en.wikipedia.org/wiki/Nepal\">Nepal</a>&nbsp;at an altitude of 5,364 metres (17,598&nbsp;ft) (<a href=\"https://tools.wmflabs.org/geohack/geohack.php?pagename=Everest_Base_Camp&amp;params=28_0_26_N_86_51_34_E_type:landmark\">28&deg;0&prime;26&Prime;N&nbsp;86&deg;51&prime;34&Prime;E</a>), and North Base Camp is in&nbsp;<a href=\"https://en.wikipedia.org/wiki/Tibet_Autonomous_Region\">Tibet</a>&nbsp;at 5,150 metres (16,900&nbsp;ft)<a href=\"https://en.wikipedia.org/wiki/Everest_Base_Camp#cite_note-Geography-1\">[1]</a><a href=\"https://en.wikipedia.org/wiki/Everest_Base_Camp#cite_note-2\">[2]</a><a href=\"https://en.wikipedia.org/wiki/Everest_Base_Camp#cite_note-3\">[3]</a>&nbsp;(<a href=\"https://tools.wmflabs.org/geohack/geohack.php?pagename=Everest_Base_Camp&amp;params=28_8_29_N_86_51_5_E_type:landmark_region:CN&amp;title=North+Base+Camp\">28&deg;8&prime;29&Prime;N&nbsp;86&deg;51&prime;5&Prime;E</a>). These camps are rudimentary campsites on Mount Everest that are used by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Mountain_climber\">mountain climbers</a>&nbsp;during their ascent and descent. South Base Camp is used when climbing via the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Mount_Everest#Southeast_ridge\">southeast ridge</a>, while North Base Camp is used when climbing via the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Mount_Everest#North_ridge_route\">northeast ridge</a>.<a href=\"https://en.wikipedia.org/wiki/Everest_Base_Camp#cite_note-4\">[4]</a></p>\r\n', 8, '<p><strong>Everest Base Camp</strong>&nbsp;is either of two&nbsp;<a href=\"https://en.wikipedia.org/wiki/Base_camp#Shelter\">base camps</a>&nbsp;on opposite sides of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Mount_Everest\">Mount Everest</a>&nbsp;(It could also be any Everest base camp on given route, but this is less common since the two main routes became standardized). South Base Camp is in&nbsp;<a href=\"https://en.wikipedia.org/wiki/Nepal\">Nepal</a>&nbsp;at an altitude of 5,364 metres (17,598&nbsp;ft) (<a href=\"https://tools.wmflabs.org/geohack/geohack.php?pagename=Everest_Base_Camp&amp;params=28_0_26_N_86_51_34_E_type:landmark\">28&deg;0&prime;26&Prime;N&nbsp;86&deg;51&prime;34&Prime;E</a>), and North Base Camp is in&nbsp;<a href=\"https://en.wikipedia.org/wiki/Tibet_Autonomous_Region\">Tibet</a>&nbsp;at 5,150 metres (16,900&nbsp;ft)<a href=\"https://en.wikipedia.org/wiki/Everest_Base_Camp#cite_note-Geography-1\">[1]</a><a href=\"https://en.wikipedia.org/wiki/Everest_Base_Camp#cite_note-2\">[2]</a><a href=\"https://en.wikipedia.org/wiki/Everest_Base_Camp#cite_note-3\">[3]</a>&nbsp;(<a href=\"https://tools.wmflabs.org/geohack/geohack.php?pagename=Everest_Base_Camp&amp;params=28_8_29_N_86_51_5_E_type:landmark_region:CN&amp;title=North+Base+Camp\">28&deg;8&prime;29&Prime;N&nbsp;86&deg;51&prime;5&Prime;E</a>). These camps are rudimentary campsites on Mount Everest that are used by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Mountain_climber\">mountain climbers</a>&nbsp;during their ascent and descent. South Base Camp is used when climbing via the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Mount_Everest#Southeast_ridge\">southeast ridge</a>, while North Base Camp is used when climbing via the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Mount_Everest#North_ridge_route\">northeast ridge</a>.<a href=\"https://en.wikipedia.org/wiki/Everest_Base_Camp#cite_note-4\">[4]</a></p>\r\n', '<p><strong>Everest Base Camp</strong>&nbsp;is either of two&nbsp;<a href=\"https://en.wikipedia.org/wiki/Base_camp#Shelter\">base camps</a>&nbsp;on opposite sides of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Mount_Everest\">Mount Everest</a>&nbsp;(It could also be any Everest base camp on given route, but this is less common since the two main routes became standardized). South Base Camp is in&nbsp;<a href=\"https://en.wikipedia.org/wiki/Nepal\">Nepal</a>&nbsp;at an altitude of 5,364 metres (17,598&nbsp;ft) (<a href=\"https://tools.wmflabs.org/geohack/geohack.php?pagename=Everest_Base_Camp&amp;params=28_0_26_N_86_51_34_E_type:landmark\">28&deg;0&prime;26&Prime;N&nbsp;86&deg;51&prime;34&Prime;E</a>), and North Base Camp is in&nbsp;<a href=\"https://en.wikipedia.org/wiki/Tibet_Autonomous_Region\">Tibet</a>&nbsp;at 5,150 metres (16,900&nbsp;ft)<a href=\"https://en.wikipedia.org/wiki/Everest_Base_Camp#cite_note-Geography-1\">[1]</a><a href=\"https://en.wikipedia.org/wiki/Everest_Base_Camp#cite_note-2\">[2]</a><a href=\"https://en.wikipedia.org/wiki/Everest_Base_Camp#cite_note-3\">[3]</a>&nbsp;(<a href=\"https://tools.wmflabs.org/geohack/geohack.php?pagename=Everest_Base_Camp&amp;params=28_8_29_N_86_51_5_E_type:landmark_region:CN&amp;title=North+Base+Camp\">28&deg;8&prime;29&Prime;N&nbsp;86&deg;51&prime;5&Prime;E</a>). These camps are rudimentary campsites on Mount Everest that are used by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Mountain_climber\">mountain climbers</a>&nbsp;during their ascent and descent. South Base Camp is used when climbing via the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Mount_Everest#Southeast_ridge\">southeast ridge</a>, while North Base Camp is used when climbing via the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Mount_Everest#North_ridge_route\">northeast ridge</a>.<a href=\"https://en.wikipedia.org/wiki/Everest_Base_Camp#cite_note-4\">[4]</a></p>\r\n', '<p><strong>Everest Base Camp</strong>&nbsp;is');

-- --------------------------------------------------------

--
-- Table structure for table `placecatagory`
--

CREATE TABLE `placecatagory` (
  `placecatagory_id` int(11) NOT NULL,
  `placecatagory` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `placecatagory`
--

INSERT INTO `placecatagory` (`placecatagory_id`, `placecatagory`) VALUES
(5, 'Religious'),
(6, 'Falls'),
(7, 'Cave'),
(8, 'Himalays'),
(9, 'National Park'),
(10, 'hiking');

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

--
-- Dumping data for table `place_gallary`
--

INSERT INTO `place_gallary` (`id`, `image_name`, `image_description`, `image_caption`, `place_id`) VALUES
(3, '2017-08-1702:48:51pmbandipur-1.jpg', 'bandipur', 'bandipur', 92),
(4, '2017-08-1702:53:16pmbandipur2.jpg', 'street', 'Bandipur Street', 92),
(5, '2017-08-1702:55:12pmbg1.jpg', '', '', 92),
(6, '2017-08-1702:55:24pmbg2.jpg', '', '', 92),
(7, '2017-08-1702:57:30pmlg1.jpg', '', '', 95),
(8, '2017-08-1702:57:43pmlg2.jpg', '', '', 95),
(9, '2017-08-1702:57:56pmlg3.jpg', '', '', 95),
(10, '2017-08-1704:47:44pmbkg.JPG', '', '', 100),
(11, '2017-08-1704:47:59pmbkg2.JPG', '', '', 100),
(12, '2017-08-1704:48:11pmbg.JPG', '', '', 100),
(13, '2017-08-1705:27:23pmg1.jpg', '', '', 102),
(14, '2017-08-1705:27:35pmg2.jpg', '', '', 102),
(15, '2017-08-1705:27:49pmg3.jpg', '', '', 102),
(16, '2017-08-1706:02:09pmnpg1.jpg', '', '', 103),
(17, '2017-08-1706:02:25pmnpg2.jpg', '', '', 103),
(18, '2017-08-1706:02:40pmnpg3.jpg', '', '', 103),
(19, '2017-08-1706:02:58pmnpg4.jpg', '', '', 103),
(20, '2017-08-1706:03:18pmnpg5.jpg', '', '', 103),
(21, '2017-08-1706:03:33pmnpg6.jpg', '', '', 103);

-- --------------------------------------------------------

--
-- Table structure for table `place_hotel`
--

CREATE TABLE `place_hotel` (
  `id` int(11) NOT NULL,
  `place_place_id` int(11) DEFAULT NULL,
  `hotel_hotel_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `place_hotel`
--

INSERT INTO `place_hotel` (`id`, `place_place_id`, `hotel_hotel_id`) VALUES
(1, 92, 2),
(2, 100, 3),
(3, 100, 2),
(4, 103, 4),
(5, 103, 5);

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

--
-- Dumping data for table `place_image`
--

INSERT INTO `place_image` (`id`, `image_name`, `image_description`, `place_id`) VALUES
(22, '2017-08-1701:21:54pmbandipur2.jpg', NULL, 92),
(23, '2017-08-1701:21:54pmbandipur-1.jpg', NULL, 92),
(24, '2017-08-1701:24:17pmbasecamp1.jpg', NULL, 93),
(25, '2017-08-1701:24:18pmbasecamp2.jpg', NULL, 93),
(26, '2017-08-1701:24:18pmbasecamp3.jpg', NULL, 93),
(27, '2017-08-1701:26:33pmnamche1.jpg', NULL, 94),
(28, '2017-08-1701:26:33pmnamche2.jpg', NULL, 94),
(29, '2017-08-1701:28:15pmlumbini.jpg', NULL, 95),
(30, '2017-08-1701:28:15pmlumbini2.jpg', NULL, 95),
(31, '2017-08-1701:28:15pmlumbini3.jpg', NULL, 95),
(32, '2017-08-1701:30:47pmdavid1.jpg', NULL, 96),
(33, '2017-08-1701:30:48pmdavid2.jpg', NULL, 96),
(34, '2017-08-1701:30:49pmdavid3.jpg', NULL, 96),
(35, '2017-08-1701:32:54pmjiri1.jpg', NULL, 97),
(36, '2017-08-1701:32:55pmjiri2.jpg', NULL, 97),
(37, '2017-08-1701:35:10pmmanang1.jpg', NULL, 98),
(38, '2017-08-1701:35:10pmmanang2.jpg', NULL, 98),
(39, '2017-08-1701:35:11pmmanang3.jpg', NULL, 98),
(40, '2017-08-1701:37:03pmjomsom1.jpg', NULL, 99),
(41, '2017-08-1701:37:03pmjomsom3.jpg', NULL, 99),
(42, '2017-08-1701:37:04pmjomsoom2.jpg', NULL, 99),
(43, '2017-08-1704:19:06pmbk1.jpg', NULL, 100),
(44, '2017-08-1704:19:06pmbk2.jpg', NULL, 100),
(45, '2017-08-1704:19:07pmbk3.jpg', NULL, 100),
(46, '2017-08-1704:19:07pmbk4.jpg', NULL, 100),
(47, '2017-08-1705:14:08pmghandruk-1.jpg', NULL, 101),
(48, '2017-08-1705:16:28pmghandruk.jpg', NULL, 102),
(49, '2017-08-1705:16:29pmghandruk1.jpg', NULL, 102),
(50, '2017-08-1705:16:29pmghandruk-1.jpg', NULL, 102),
(51, '2017-08-1705:54:30pmcnp1.jpg', NULL, 103),
(52, '2017-08-1705:54:31pmcnp2.jpg', NULL, 103),
(53, '2017-08-1705:54:32pmcnp3.jpg', NULL, 103),
(59, '2017-08-2303:36:33amdavid1.jpg', NULL, 109),
(60, '2017-08-2303:37:41amdavid2.jpg', NULL, 110),
(61, '2017-08-2303:58:02ambg1.jpg', NULL, 111),
(62, '2017-08-2303:58:47amcnp3.jpg', NULL, 112),
(63, '2017-08-2304:07:19amrhino4.jpg', NULL, 113),
(64, '2017-08-2304:34:01amcnp1.jpg', NULL, 114),
(65, '2017-08-2304:41:26amdavid3.jpg', NULL, 115),
(66, '2017-08-2304:43:39amdavid3.jpg', NULL, 116),
(69, '2017-08-2304:46:35amg3.jpg', NULL, 119),
(70, '2017-08-2304:52:51ambasecamp2.jpg', NULL, 120),
(71, '2017-08-2304:55:00ammanang1.jpg', NULL, 121),
(72, '2017-08-2305:05:28amghandruk.jpg', NULL, 122),
(73, '2017-08-2305:23:50amghandruk-1.jpg', NULL, 123),
(74, '2017-08-2308:20:46ameverest.jpg', NULL, 124);

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

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `price_per_day`, `date_from`, `date_to`, `reservation_date`, `room_id`, `customer_id`, `transaction_id`, `status`, `hotelid`) VALUES
(14, NULL, '2017-08-17', '2017-08-23', '2017-08-22 12:06:39', 3, 2, '2017-082189', 'reserved', 5),
(15, NULL, '2017-08-22', '2017-08-22', '2017-08-22 14:33:34', 2, 2, '2017-085711', 'paid', 5);

-- --------------------------------------------------------

--
-- Table structure for table `reservation_room`
--

CREATE TABLE `reservation_room` (
  `id` int(11) NOT NULL,
  `room_no` int(11) DEFAULT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  `reservation_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation_room`
--

INSERT INTO `reservation_room` (`id`, `room_no`, `rate`, `reservation_id`) VALUES
(14, 3, '600.00', 14),
(15, 4, '600.00', 14),
(16, 5, '600.00', 14),
(17, 3, '600.00', 15),
(18, 4, '600.00', 15);

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

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `floor`, `room_number`, `has_conditioner`, `has_tv`, `has_phone`, `available_from`, `price_per_day`, `description`, `hotel_id`, `room_type_id`) VALUES
(3, 0, 1, 1, 1, 1, '2017-08-23', '500.00', 'in a very good condition', 5, 1),
(4, 0, 2, 0, 1, 1, '0000-00-00', '600.00', 'description description description description description ', 5, 1),
(5, 0, 3, 1, 0, 1, '0000-00-00', '600.00', 'river side home ', 5, 1);

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

--
-- Dumping data for table `room_image`
--

INSERT INTO `room_image` (`id`, `image`, `description`, `room_room_id`) VALUES
(4, '2017-08-2104:53:31pmrhino2.jpg', 'very good condition', 3),
(5, '2017-08-2105:33:03pmrhino1.jpg', '', 4),
(6, '2017-08-2105:41:04pmrhino.jpg', '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `id` int(11) NOT NULL,
  `room_type` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`id`, `room_type`, `description`) VALUES
(1, 'Single Bed', 'Beautiful  Room'),
(2, 'Double Bed', 'Beautiful Room');

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

--
-- Dumping data for table `temp_book`
--

INSERT INTO `temp_book` (`id`, `user_id`, `hotel_id`, `check_in`, `check_out`, `payment_status`, `date_payment`, `payment_method`, `transaction_id`) VALUES
(15, 8, 5, NULL, NULL, NULL, NULL, NULL, '2017-085038'),
(16, 8, 5, NULL, NULL, NULL, NULL, NULL, '2017-085058'),
(17, 8, 5, NULL, NULL, NULL, NULL, NULL, '2017-082726'),
(18, 8, 5, NULL, NULL, NULL, NULL, NULL, '2017-088939'),
(19, 8, 5, NULL, NULL, NULL, NULL, NULL, '2017-086988'),
(20, 8, 5, NULL, NULL, NULL, NULL, NULL, '2017-08787'),
(21, 8, 5, NULL, NULL, NULL, NULL, NULL, '2017-08442'),
(22, 8, 5, '2017-08-09 00:00:00', '0000-00-00', NULL, NULL, NULL, '2017-083447'),
(23, 8, 5, '2017-08-22 00:00:00', '2017-08-23', NULL, NULL, NULL, '2017-087374'),
(24, 8, 5, '2017-08-22 00:00:00', '2017-08-23', NULL, NULL, NULL, '2017-089193'),
(25, 8, 5, '2017-08-22 00:00:00', '2017-08-23', NULL, NULL, NULL, '2017-081902'),
(26, 8, 5, '2017-08-22 00:00:00', '2017-08-23', NULL, NULL, NULL, '2017-081740'),
(27, 8, 5, '2017-08-22 00:00:00', '2017-08-23', NULL, NULL, NULL, '2017-089558'),
(28, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-083180'),
(29, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-084379'),
(30, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-089942'),
(31, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-08325'),
(32, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-081028'),
(33, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-088842'),
(34, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-087182'),
(35, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-085980'),
(36, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-083567'),
(37, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-08853'),
(38, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-087362'),
(39, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-089560'),
(40, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-085080'),
(41, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-083727'),
(42, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-088025'),
(43, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-087169'),
(44, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-089093'),
(45, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-087198'),
(46, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-089377'),
(47, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-089062'),
(48, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-084160'),
(49, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-089520'),
(50, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-085105'),
(51, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-087753'),
(52, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-086577'),
(53, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-08275'),
(54, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-082603'),
(55, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-08995'),
(56, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-088780'),
(57, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-08504'),
(58, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-081460'),
(59, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-082384'),
(60, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-084017'),
(61, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-08362'),
(62, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-085222'),
(63, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-089784'),
(64, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-089440'),
(65, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-083566'),
(66, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-081578'),
(67, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-087704'),
(68, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-083424'),
(69, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-084512'),
(70, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-084283'),
(71, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-089184'),
(72, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-085213'),
(73, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-082238'),
(74, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-085652'),
(75, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-084000'),
(76, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-083001'),
(77, 8, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-084286'),
(78, 8, 5, '2017-08-22 00:00:00', '2017-08-24', NULL, NULL, NULL, '2017-089645'),
(79, 8, 5, '2017-08-22 00:00:00', '2017-08-24', NULL, NULL, NULL, '2017-085711'),
(80, 8, 5, '2017-08-22 00:00:00', '2017-08-24', NULL, NULL, NULL, '2017-087902'),
(81, 8, 5, '2017-08-22 00:00:00', '2017-08-24', NULL, NULL, NULL, '2017-085110'),
(82, 2, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-081615'),
(83, 2, 5, '2017-08-22 00:00:00', '2017-08-23', NULL, NULL, NULL, '2017-082189'),
(84, 2, 5, '2017-08-22 00:00:00', '2017-08-22', NULL, NULL, NULL, '2017-085711');

-- --------------------------------------------------------

--
-- Table structure for table `temp_book_room`
--

CREATE TABLE `temp_book_room` (
  `id` int(11) NOT NULL,
  `room_no` varchar(45) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `temp_book_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_book_room`
--

INSERT INTO `temp_book_room` (`id`, `room_no`, `price`, `temp_book_id`) VALUES
(1, '4', NULL, 17),
(2, '5', NULL, 17),
(3, '3', '600.00', 19),
(4, '4', '600.00', 19),
(5, '5', '600.00', 19),
(6, '4', NULL, 20),
(7, '5', NULL, 21),
(8, '4', NULL, 22),
(9, '5', NULL, 22),
(10, '4', NULL, 23),
(11, '5', NULL, 23),
(12, '3', '600.00', 24),
(13, '4', '600.00', 24),
(14, '5', '600.00', 24),
(15, '4', NULL, 25),
(16, '4', NULL, 26),
(17, '4', NULL, 27),
(18, '4', NULL, 28),
(19, '5', NULL, 29),
(20, '5', NULL, 30),
(21, '4', NULL, 31),
(22, '5', NULL, 31),
(23, '4', NULL, 32),
(24, '5', NULL, 32),
(25, '4', NULL, 33),
(26, '5', NULL, 33),
(27, '4', NULL, 34),
(28, '5', NULL, 34),
(29, '4', NULL, 35),
(30, '5', NULL, 35),
(31, '4', NULL, 36),
(32, '4', NULL, 37),
(33, '4', NULL, 38),
(34, '5', NULL, 38),
(35, '4', NULL, 39),
(36, '5', NULL, 39),
(37, '4', NULL, 40),
(38, '5', NULL, 40),
(39, '5', NULL, 41),
(40, '5', NULL, 42),
(41, '5', NULL, 43),
(42, '5', NULL, 44),
(43, '4', NULL, 45),
(44, '4', NULL, 46),
(45, '5', NULL, 46),
(46, '4', NULL, 47),
(47, '4', NULL, 48),
(48, '4', NULL, 49),
(49, '5', NULL, 50),
(50, '4', NULL, 51),
(51, '5', NULL, 51),
(52, '4', NULL, 52),
(53, '5', NULL, 52),
(54, '4', NULL, 53),
(55, '5', NULL, 53),
(56, '4', NULL, 54),
(57, '5', NULL, 54),
(58, '4', NULL, 55),
(59, '5', NULL, 55),
(60, '4', NULL, 56),
(61, '5', NULL, 56),
(62, '3', '600.00', 57),
(63, '4', '600.00', 57),
(64, '4', NULL, 58),
(65, '5', NULL, 58),
(66, '4', NULL, 59),
(67, '5', NULL, 59),
(68, '4', NULL, 60),
(69, '5', NULL, 60),
(70, '4', NULL, 61),
(71, '5', NULL, 61),
(72, '4', NULL, 62),
(73, '5', NULL, 62),
(74, '3', '600.00', 63),
(75, '4', '600.00', 63),
(76, '5', '600.00', 63),
(77, '3', '600.00', 64),
(78, '4', '600.00', 64),
(79, '4', NULL, 65),
(80, '5', NULL, 65),
(81, '4', NULL, 66),
(82, '5', NULL, 66),
(83, '4', NULL, 67),
(84, '5', NULL, 67),
(85, '4', NULL, 68),
(86, '5', NULL, 68),
(87, '3', '600.00', 69),
(88, '4', NULL, 70),
(89, '5', NULL, 70),
(90, '4', NULL, 71),
(91, '5', NULL, 71),
(92, '3', '600.00', 72),
(93, '4', '600.00', 72),
(94, '4', NULL, 73),
(95, '5', NULL, 73),
(96, '4', NULL, 74),
(97, '5', NULL, 74),
(98, '3', '600.00', 75),
(99, '4', '600.00', 75),
(100, '5', '600.00', 75),
(101, '4', NULL, 76),
(102, '5', NULL, 76),
(103, '3', '600.00', 77),
(104, '4', '600.00', 77),
(105, '5', '600.00', 77),
(106, '3', '600.00', 78),
(107, '5', '600.00', 78),
(108, '3', '600.00', 79),
(109, '5', '600.00', 79),
(110, '4', NULL, 80),
(111, '5', NULL, 80),
(112, '3', '600.00', 81),
(113, '4', '600.00', 81),
(114, '5', '600.00', 81),
(115, '4', NULL, 82),
(116, '5', NULL, 82),
(117, '3', '600.00', 83),
(118, '4', '600.00', 83),
(119, '5', '600.00', 83),
(120, '3', '600.00', 84),
(121, '4', '600.00', 84);

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

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `heading`, `description`, `fullname`, `designation`, `place_place_id`, `image`) VALUES
(1, 'Piece Of London', 'July 1961, a Swiss couple Davi went swimming but the woman drowned in a pit because of the overflow. Her body was recovered 3 days later in river Phusre with great effort. Her father wished to name it \"', 'Chiranjibi Dawadi', 'Charterd Accountant', 92, NULL),
(2, 'Place of Peace', 'July 1961, a Swiss couple Davi went swimming but the woman drowned in a pit because of the overflow. Her body was recovered 3 days later in river Phusre with great effort. Her father wished to name it \"', 'Mithun Karmacharya', 'Co-Founder (Universal Computer Institute)', 92, NULL),
(3, 'beautiful', 'July 1961, a Swiss couple Davi went swimming but the woman drowned in a pit because of the overflow. Her body was recovered 3 days later in river Phusre with great effort. Her father wished to name it \"', 'Jiwan Kumar Tamang', 'Co-founder of SoftPark', 92, '2017-08-1806:10:25pm2017-07-17-183853.jpg');

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
(8, 'jiwan', 'TvDmd-EwDLPZfTMWGfEl9XGcO5PJjVc9', '$2y$13$3IdV2L9w5a/qd9tjVbDTIeMMkgaYzILskGHOaFkDPaE5YT8YvjarC', NULL, 'jiwan.tamang255@gmail.com', 10, 1502942060, 1502942060);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reservation_room_reservation1_idx` (`reservation_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_temp_book_room_temp_book1_idx` (`temp_book_id`);

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
  MODIFY `adress_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer_profile`
--
ALTER TABLE `customer_profile`
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
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `hotel_profile`
--
ALTER TABLE `hotel_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `hotel_speciality`
--
ALTER TABLE `hotel_speciality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `hotel_user`
--
ALTER TABLE `hotel_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
--
-- AUTO_INCREMENT for table `placecatagory`
--
ALTER TABLE `placecatagory`
  MODIFY `placecatagory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `place_comment`
--
ALTER TABLE `place_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `place_gallary`
--
ALTER TABLE `place_gallary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `place_hotel`
--
ALTER TABLE `place_hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `place_image`
--
ALTER TABLE `place_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `reservation_room`
--
ALTER TABLE `reservation_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `temp_book_room`
--
ALTER TABLE `temp_book_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
-- Constraints for table `reservation_room`
--
ALTER TABLE `reservation_room`
  ADD CONSTRAINT `fk_reservation_room_reservation1` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Constraints for table `temp_book_room`
--
ALTER TABLE `temp_book_room`
  ADD CONSTRAINT `fk_temp_book_room_temp_book1` FOREIGN KEY (`temp_book_id`) REFERENCES `temp_book` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD CONSTRAINT `fk_testimonial_place1` FOREIGN KEY (`place_place_id`) REFERENCES `place` (`place_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
