-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 15, 2019 at 06:28 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `organic_vegis_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `available_date_mst`
--

CREATE TABLE IF NOT EXISTS `available_date_mst` (
  `av_id` int(11) NOT NULL AUTO_INCREMENT,
  `av_date` varchar(255) NOT NULL,
  `av_end_date` varchar(255) NOT NULL,
  PRIMARY KEY (`av_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `available_date_mst`
--

INSERT INTO `available_date_mst` (`av_id`, `av_date`, `av_end_date`) VALUES
(1, '2019-08-14', '2019-08-16'),
(2, '2019-07-09', '2019-07-13'),
(3, '2019-07-16', '2019-07-20'),
(4, '2019-07-24', '2019-07-27'),
(5, '2019-08-16', '2019-08-17'),
(6, '2019-08-14', ''),
(7, '2019-08-15', ''),
(8, '2019-08-15', '2019-08-19'),
(9, '2019-08-20', '2019-08-24');

-- --------------------------------------------------------

--
-- Table structure for table `available_vegies_mst`
--

CREATE TABLE IF NOT EXISTS `available_vegies_mst` (
  `av_id` int(11) NOT NULL AUTO_INCREMENT,
  `av_date` date NOT NULL,
  `av_vegi_id` int(11) NOT NULL,
  `av_order_end_date` date NOT NULL,
  `av_added_dnt` datetime NOT NULL,
  `av_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`av_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `available_vegies_mst`
--

INSERT INTO `available_vegies_mst` (`av_id`, `av_date`, `av_vegi_id`, `av_order_end_date`, `av_added_dnt`, `av_status`) VALUES
(1, '2019-07-09', 5, '2019-07-13', '2019-07-14 13:29:32', 1),
(2, '2019-07-09', 6, '2019-07-13', '2019-07-14 10:28:28', 1),
(3, '2019-07-16', 5, '2019-07-20', '2019-07-14 13:29:32', 1),
(4, '2019-07-16', 6, '2019-07-20', '2019-07-14 10:28:28', 1),
(5, '2019-07-24', 5, '2019-07-27', '2019-07-14 13:29:32', 1),
(6, '2019-07-24', 6, '2019-07-27', '2019-07-14 10:28:28', 1),
(7, '2019-07-24', 0, '0000-00-00', '0000-00-00 00:00:00', 0),
(8, '2019-07-24', 0, '0000-00-00', '0000-00-00 00:00:00', 1),
(9, '2019-07-24', 2, '0000-00-00', '0000-00-00 00:00:00', 1),
(10, '2019-07-24', 1, '0000-00-00', '0000-00-00 00:00:00', 1),
(11, '2019-07-24', 2, '0000-00-00', '0000-00-00 00:00:00', 1),
(12, '2019-07-24', 6, '0000-00-00', '0000-00-00 00:00:00', 1),
(13, '2019-08-15', 1, '0000-00-00', '2019-08-20 00:08:00', 1),
(14, '2019-08-15', 2, '0000-00-00', '2019-08-20 00:08:00', 1),
(15, '2019-08-15', 6, '0000-00-00', '2019-08-20 00:08:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `back_order_details_mst`
--

CREATE TABLE IF NOT EXISTS `back_order_details_mst` (
  `bod_id` int(11) NOT NULL AUTO_INCREMENT,
  `bod_bo_id` int(11) NOT NULL,
  `bod_veg_id` int(11) NOT NULL,
  `bod_veg_qty` varchar(255) NOT NULL,
  `bod_rate` varchar(255) NOT NULL,
  `bod_amount` varchar(255) NOT NULL,
  PRIMARY KEY (`bod_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `back_order_details_mst`
--

INSERT INTO `back_order_details_mst` (`bod_id`, `bod_bo_id`, `bod_veg_id`, `bod_veg_qty`, `bod_rate`, `bod_amount`) VALUES
(1, 1, 5, '1', '6', '6'),
(2, 1, 6, '1', '10', '10');

-- --------------------------------------------------------

--
-- Table structure for table `back_order_mst`
--

CREATE TABLE IF NOT EXISTS `back_order_mst` (
  `bo_id` int(11) NOT NULL AUTO_INCREMENT,
  `bo_amount` varchar(255) NOT NULL,
  `bo_added_on` date NOT NULL,
  `bo_order_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`bo_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `back_order_mst`
--

INSERT INTO `back_order_mst` (`bo_id`, `bo_amount`, `bo_added_on`, `bo_order_status`) VALUES
(1, '16', '2019-07-09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `back_order_rate_mst`
--

CREATE TABLE IF NOT EXISTS `back_order_rate_mst` (
  `bor_id` int(11) NOT NULL AUTO_INCREMENT,
  `bor_veg_id` int(11) NOT NULL,
  `bor_rate_per_unit` varchar(255) NOT NULL,
  PRIMARY KEY (`bor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `iso2` char(2) DEFAULT NULL,
  `phonecode` varchar(255) DEFAULT NULL,
  `capital` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `flag` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=248 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `iso3`, `iso2`, `phonecode`, `capital`, `currency`, `created_at`, `updated_at`, `flag`) VALUES
(1, 'Afghanistan', 'AFG', 'AF', '93', 'Kabul', 'AFN', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(2, 'Aland Islands', 'ALA', 'AX', '+358-18', 'Mariehamn', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(3, 'Albania', 'ALB', 'AL', '355', 'Tirana', 'ALL', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(4, 'Algeria', 'DZA', 'DZ', '213', 'Algiers', 'DZD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(5, 'American Samoa', 'ASM', 'AS', '+1-684', 'Pago Pago', 'USD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(6, 'Andorra', 'AND', 'AD', '376', 'Andorra la Vella', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(7, 'Angola', 'AGO', 'AO', '244', 'Luanda', 'AOA', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(8, 'Anguilla', 'AIA', 'AI', '+1-264', 'The Valley', 'XCD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(9, 'Antarctica', 'ATA', 'AQ', '', '', '', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(10, 'Antigua And Barbuda', 'ATG', 'AG', '+1-268', 'St. John''s', 'XCD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(11, 'Argentina', 'ARG', 'AR', '54', 'Buenos Aires', 'ARS', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(12, 'Armenia', 'ARM', 'AM', '374', 'Yerevan', 'AMD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(13, 'Aruba', 'ABW', 'AW', '297', 'Oranjestad', 'AWG', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(14, 'Australia', 'AUS', 'AU', '61', 'Canberra', 'AUD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(15, 'Austria', 'AUT', 'AT', '43', 'Vienna', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(16, 'Azerbaijan', 'AZE', 'AZ', '994', 'Baku', 'AZN', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(17, 'Bahamas The', 'BHS', 'BS', '+1-242', 'Nassau', 'BSD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(18, 'Bahrain', 'BHR', 'BH', '973', 'Manama', 'BHD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(19, 'Bangladesh', 'BGD', 'BD', '880', 'Dhaka', 'BDT', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(20, 'Barbados', 'BRB', 'BB', '+1-246', 'Bridgetown', 'BBD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(21, 'Belarus', 'BLR', 'BY', '375', 'Minsk', 'BYR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(22, 'Belgium', 'BEL', 'BE', '32', 'Brussels', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(23, 'Belize', 'BLZ', 'BZ', '501', 'Belmopan', 'BZD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(24, 'Benin', 'BEN', 'BJ', '229', 'Porto-Novo', 'XOF', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(25, 'Bermuda', 'BMU', 'BM', '+1-441', 'Hamilton', 'BMD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(26, 'Bhutan', 'BTN', 'BT', '975', 'Thimphu', 'BTN', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(27, 'Bolivia', 'BOL', 'BO', '591', 'Sucre', 'BOB', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(28, 'Bosnia and Herzegovina', 'BIH', 'BA', '387', 'Sarajevo', 'BAM', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(29, 'Botswana', 'BWA', 'BW', '267', 'Gaborone', 'BWP', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(30, 'Bouvet Island', 'BVT', 'BV', '', '', 'NOK', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(31, 'Brazil', 'BRA', 'BR', '55', 'Brasilia', 'BRL', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(32, 'British Indian Ocean Territory', 'IOT', 'IO', '246', 'Diego Garcia', 'USD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(33, 'Brunei', 'BRN', 'BN', '673', 'Bandar Seri Begawan', 'BND', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(34, 'Bulgaria', 'BGR', 'BG', '359', 'Sofia', 'BGN', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(35, 'Burkina Faso', 'BFA', 'BF', '226', 'Ouagadougou', 'XOF', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(36, 'Burundi', 'BDI', 'BI', '257', 'Bujumbura', 'BIF', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(37, 'Cambodia', 'KHM', 'KH', '855', 'Phnom Penh', 'KHR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(38, 'Cameroon', 'CMR', 'CM', '237', 'Yaounde', 'XAF', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(39, 'Canada', 'CAN', 'CA', '1', 'Ottawa', 'CAD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(40, 'Cape Verde', 'CPV', 'CV', '238', 'Praia', 'CVE', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(41, 'Cayman Islands', 'CYM', 'KY', '+1-345', 'George Town', 'KYD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(42, 'Central African Republic', 'CAF', 'CF', '236', 'Bangui', 'XAF', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(43, 'Chad', 'TCD', 'TD', '235', 'N''Djamena', 'XAF', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(44, 'Chile', 'CHL', 'CL', '56', 'Santiago', 'CLP', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(45, 'China', 'CHN', 'CN', '86', 'Beijing', 'CNY', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(46, 'Christmas Island', 'CXR', 'CX', '61', 'Flying Fish Cove', 'AUD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(47, 'Cocos (Keeling) Islands', 'CCK', 'CC', '61', 'West Island', 'AUD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(48, 'Colombia', 'COL', 'CO', '57', 'Bogota', 'COP', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(49, 'Comoros', 'COM', 'KM', '269', 'Moroni', 'KMF', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(50, 'Congo', 'COG', 'CG', '242', 'Brazzaville', 'XAF', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(51, 'Congo The Democratic Republic Of The', 'COD', 'CD', '243', 'Kinshasa', 'CDF', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(52, 'Cook Islands', 'COK', 'CK', '682', 'Avarua', 'NZD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(53, 'Costa Rica', 'CRI', 'CR', '506', 'San Jose', 'CRC', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(54, 'Cote D''Ivoire (Ivory Coast)', 'CIV', 'CI', '225', 'Yamoussoukro', 'XOF', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(55, 'Croatia (Hrvatska)', 'HRV', 'HR', '385', 'Zagreb', 'HRK', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(56, 'Cuba', 'CUB', 'CU', '53', 'Havana', 'CUP', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(57, 'Cyprus', 'CYP', 'CY', '357', 'Nicosia', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(58, 'Czech Republic', 'CZE', 'CZ', '420', 'Prague', 'CZK', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(59, 'Denmark', 'DNK', 'DK', '45', 'Copenhagen', 'DKK', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(60, 'Djibouti', 'DJI', 'DJ', '253', 'Djibouti', 'DJF', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(61, 'Dominica', 'DMA', 'DM', '+1-767', 'Roseau', 'XCD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(62, 'Dominican Republic', 'DOM', 'DO', '+1-809 and 1-829', 'Santo Domingo', 'DOP', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(63, 'East Timor', 'TLS', 'TL', '670', 'Dili', 'USD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(64, 'Ecuador', 'ECU', 'EC', '593', 'Quito', 'USD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(65, 'Egypt', 'EGY', 'EG', '20', 'Cairo', 'EGP', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(66, 'El Salvador', 'SLV', 'SV', '503', 'San Salvador', 'USD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(67, 'Equatorial Guinea', 'GNQ', 'GQ', '240', 'Malabo', 'XAF', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(68, 'Eritrea', 'ERI', 'ER', '291', 'Asmara', 'ERN', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(69, 'Estonia', 'EST', 'EE', '372', 'Tallinn', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(70, 'Ethiopia', 'ETH', 'ET', '251', 'Addis Ababa', 'ETB', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(71, 'Falkland Islands', 'FLK', 'FK', '500', 'Stanley', 'FKP', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(72, 'Faroe Islands', 'FRO', 'FO', '298', 'Torshavn', 'DKK', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(73, 'Fiji Islands', 'FJI', 'FJ', '679', 'Suva', 'FJD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(74, 'Finland', 'FIN', 'FI', '358', 'Helsinki', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(75, 'France', 'FRA', 'FR', '33', 'Paris', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(76, 'French Guiana', 'GUF', 'GF', '594', 'Cayenne', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(77, 'French Polynesia', 'PYF', 'PF', '689', 'Papeete', 'XPF', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(78, 'French Southern Territories', 'ATF', 'TF', '', 'Port-aux-Francais', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(79, 'Gabon', 'GAB', 'GA', '241', 'Libreville', 'XAF', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(80, 'Gambia The', 'GMB', 'GM', '220', 'Banjul', 'GMD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(81, 'Georgia', 'GEO', 'GE', '995', 'Tbilisi', 'GEL', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(82, 'Germany', 'DEU', 'DE', '49', 'Berlin', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(83, 'Ghana', 'GHA', 'GH', '233', 'Accra', 'GHS', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(84, 'Gibraltar', 'GIB', 'GI', '350', 'Gibraltar', 'GIP', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(85, 'Greece', 'GRC', 'GR', '30', 'Athens', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(86, 'Greenland', 'GRL', 'GL', '299', 'Nuuk', 'DKK', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(87, 'Grenada', 'GRD', 'GD', '+1-473', 'St. George''s', 'XCD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(88, 'Guadeloupe', 'GLP', 'GP', '590', 'Basse-Terre', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(89, 'Guam', 'GUM', 'GU', '+1-671', 'Hagatna', 'USD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(90, 'Guatemala', 'GTM', 'GT', '502', 'Guatemala City', 'GTQ', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(91, 'Guernsey and Alderney', 'GGY', 'GG', '+44-1481', 'St Peter Port', 'GBP', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(92, 'Guinea', 'GIN', 'GN', '224', 'Conakry', 'GNF', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(93, 'Guinea-Bissau', 'GNB', 'GW', '245', 'Bissau', 'XOF', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(94, 'Guyana', 'GUY', 'GY', '592', 'Georgetown', 'GYD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(95, 'Haiti', 'HTI', 'HT', '509', 'Port-au-Prince', 'HTG', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(96, 'Heard and McDonald Islands', 'HMD', 'HM', ' ', '', 'AUD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(97, 'Honduras', 'HND', 'HN', '504', 'Tegucigalpa', 'HNL', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(98, 'Hong Kong S.A.R.', 'HKG', 'HK', '852', 'Hong Kong', 'HKD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(99, 'Hungary', 'HUN', 'HU', '36', 'Budapest', 'HUF', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(100, 'Iceland', 'ISL', 'IS', '354', 'Reykjavik', 'ISK', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(101, 'India', 'IND', 'IN', '91', 'New Delhi', 'INR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(102, 'Indonesia', 'IDN', 'ID', '62', 'Jakarta', 'IDR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(103, 'Iran', 'IRN', 'IR', '98', 'Tehran', 'IRR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(104, 'Iraq', 'IRQ', 'IQ', '964', 'Baghdad', 'IQD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(105, 'Ireland', 'IRL', 'IE', '353', 'Dublin', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(106, 'Israel', 'ISR', 'IL', '972', 'Jerusalem', 'ILS', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(107, 'Italy', 'ITA', 'IT', '39', 'Rome', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(108, 'Jamaica', 'JAM', 'JM', '+1-876', 'Kingston', 'JMD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(109, 'Japan', 'JPN', 'JP', '81', 'Tokyo', 'JPY', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(110, 'Jersey', 'JEY', 'JE', '+44-1534', 'Saint Helier', 'GBP', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(111, 'Jordan', 'JOR', 'JO', '962', 'Amman', 'JOD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(112, 'Kazakhstan', 'KAZ', 'KZ', '7', 'Astana', 'KZT', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(113, 'Kenya', 'KEN', 'KE', '254', 'Nairobi', 'KES', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(114, 'Kiribati', 'KIR', 'KI', '686', 'Tarawa', 'AUD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(115, 'Korea North\n', 'PRK', 'KP', '850', 'Pyongyang', 'KPW', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(116, 'Korea South', 'KOR', 'KR', '82', 'Seoul', 'KRW', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(117, 'Kuwait', 'KWT', 'KW', '965', 'Kuwait City', 'KWD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(118, 'Kyrgyzstan', 'KGZ', 'KG', '996', 'Bishkek', 'KGS', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(119, 'Laos', 'LAO', 'LA', '856', 'Vientiane', 'LAK', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(120, 'Latvia', 'LVA', 'LV', '371', 'Riga', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(121, 'Lebanon', 'LBN', 'LB', '961', 'Beirut', 'LBP', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(122, 'Lesotho', 'LSO', 'LS', '266', 'Maseru', 'LSL', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(123, 'Liberia', 'LBR', 'LR', '231', 'Monrovia', 'LRD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(124, 'Libya', 'LBY', 'LY', '218', 'Tripolis', 'LYD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(125, 'Liechtenstein', 'LIE', 'LI', '423', 'Vaduz', 'CHF', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(126, 'Lithuania', 'LTU', 'LT', '370', 'Vilnius', 'LTL', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(127, 'Luxembourg', 'LUX', 'LU', '352', 'Luxembourg', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(128, 'Macau S.A.R.', 'MAC', 'MO', '853', 'Macao', 'MOP', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(129, 'Macedonia', 'MKD', 'MK', '389', 'Skopje', 'MKD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(130, 'Madagascar', 'MDG', 'MG', '261', 'Antananarivo', 'MGA', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(131, 'Malawi', 'MWI', 'MW', '265', 'Lilongwe', 'MWK', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(132, 'Malaysia', 'MYS', 'MY', '60', 'Kuala Lumpur', 'MYR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(133, 'Maldives', 'MDV', 'MV', '960', 'Male', 'MVR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(134, 'Mali', 'MLI', 'ML', '223', 'Bamako', 'XOF', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(135, 'Malta', 'MLT', 'MT', '356', 'Valletta', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(136, 'Man (Isle of)', 'IMN', 'IM', '+44-1624', 'Douglas, Isle of Man', 'GBP', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(137, 'Marshall Islands', 'MHL', 'MH', '692', 'Majuro', 'USD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(138, 'Martinique', 'MTQ', 'MQ', '596', 'Fort-de-France', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(139, 'Mauritania', 'MRT', 'MR', '222', 'Nouakchott', 'MRO', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(140, 'Mauritius', 'MUS', 'MU', '230', 'Port Louis', 'MUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(141, 'Mayotte', 'MYT', 'YT', '262', 'Mamoudzou', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(142, 'Mexico', 'MEX', 'MX', '52', 'Mexico City', 'MXN', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(143, 'Micronesia', 'FSM', 'FM', '691', 'Palikir', 'USD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(144, 'Moldova', 'MDA', 'MD', '373', 'Chisinau', 'MDL', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(145, 'Monaco', 'MCO', 'MC', '377', 'Monaco', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(146, 'Mongolia', 'MNG', 'MN', '976', 'Ulan Bator', 'MNT', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(147, 'Montenegro', 'MNE', 'ME', '382', 'Podgorica', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(148, 'Montserrat', 'MSR', 'MS', '+1-664', 'Plymouth', 'XCD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(149, 'Morocco', 'MAR', 'MA', '212', 'Rabat', 'MAD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(150, 'Mozambique', 'MOZ', 'MZ', '258', 'Maputo', 'MZN', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(151, 'Myanmar', 'MMR', 'MM', '95', 'Nay Pyi Taw', 'MMK', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(152, 'Namibia', 'NAM', 'NA', '264', 'Windhoek', 'NAD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(153, 'Nauru', 'NRU', 'NR', '674', 'Yaren', 'AUD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(154, 'Nepal', 'NPL', 'NP', '977', 'Kathmandu', 'NPR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(155, 'Netherlands Antilles', 'ANT', 'AN', '', '', '', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(156, 'Netherlands The', 'NLD', 'NL', '31', 'Amsterdam', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(157, 'New Caledonia', 'NCL', 'NC', '687', 'Noumea', 'XPF', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(158, 'New Zealand', 'NZL', 'NZ', '64', 'Wellington', 'NZD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(159, 'Nicaragua', 'NIC', 'NI', '505', 'Managua', 'NIO', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(160, 'Niger', 'NER', 'NE', '227', 'Niamey', 'XOF', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(161, 'Nigeria', 'NGA', 'NG', '234', 'Abuja', 'NGN', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(162, 'Niue', 'NIU', 'NU', '683', 'Alofi', 'NZD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(163, 'Norfolk Island', 'NFK', 'NF', '672', 'Kingston', 'AUD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(164, 'Northern Mariana Islands', 'MNP', 'MP', '+1-670', 'Saipan', 'USD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(165, 'Norway', 'NOR', 'NO', '47', 'Oslo', 'NOK', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(166, 'Oman', 'OMN', 'OM', '968', 'Muscat', 'OMR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(167, 'Pakistan', 'PAK', 'PK', '92', 'Islamabad', 'PKR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(168, 'Palau', 'PLW', 'PW', '680', 'Melekeok', 'USD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(169, 'Palestinian Territory Occupied', 'PSE', 'PS', '970', 'East Jerusalem', 'ILS', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(170, 'Panama', 'PAN', 'PA', '507', 'Panama City', 'PAB', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(171, 'Papua new Guinea', 'PNG', 'PG', '675', 'Port Moresby', 'PGK', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(172, 'Paraguay', 'PRY', 'PY', '595', 'Asuncion', 'PYG', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(173, 'Peru', 'PER', 'PE', '51', 'Lima', 'PEN', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(174, 'Philippines', 'PHL', 'PH', '63', 'Manila', 'PHP', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(175, 'Pitcairn Island', 'PCN', 'PN', '870', 'Adamstown', 'NZD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(176, 'Poland', 'POL', 'PL', '48', 'Warsaw', 'PLN', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(177, 'Portugal', 'PRT', 'PT', '351', 'Lisbon', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(178, 'Puerto Rico', 'PRI', 'PR', '+1-787 and 1-939', 'San Juan', 'USD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(179, 'Qatar', 'QAT', 'QA', '974', 'Doha', 'QAR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(180, 'Reunion', 'REU', 'RE', '262', 'Saint-Denis', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(181, 'Romania', 'ROU', 'RO', '40', 'Bucharest', 'RON', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(182, 'Russia', 'RUS', 'RU', '7', 'Moscow', 'RUB', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(183, 'Rwanda', 'RWA', 'RW', '250', 'Kigali', 'RWF', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(184, 'Saint Helena', 'SHN', 'SH', '290', 'Jamestown', 'SHP', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(185, 'Saint Kitts And Nevis', 'KNA', 'KN', '+1-869', 'Basseterre', 'XCD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(186, 'Saint Lucia', 'LCA', 'LC', '+1-758', 'Castries', 'XCD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(187, 'Saint Pierre and Miquelon', 'SPM', 'PM', '508', 'Saint-Pierre', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(188, 'Saint Vincent And The Grenadines', 'VCT', 'VC', '+1-784', 'Kingstown', 'XCD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(189, 'Saint-Barthelemy', 'BLM', 'BL', '590', 'Gustavia', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(190, 'Saint-Martin (French part)', 'MAF', 'MF', '590', 'Marigot', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(191, 'Samoa', 'WSM', 'WS', '685', 'Apia', 'WST', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(192, 'San Marino', 'SMR', 'SM', '378', 'San Marino', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(193, 'Sao Tome and Principe', 'STP', 'ST', '239', 'Sao Tome', 'STD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(194, 'Saudi Arabia', 'SAU', 'SA', '966', 'Riyadh', 'SAR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(195, 'Senegal', 'SEN', 'SN', '221', 'Dakar', 'XOF', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(196, 'Serbia', 'SRB', 'RS', '381', 'Belgrade', 'RSD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(197, 'Seychelles', 'SYC', 'SC', '248', 'Victoria', 'SCR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(198, 'Sierra Leone', 'SLE', 'SL', '232', 'Freetown', 'SLL', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(199, 'Singapore', 'SGP', 'SG', '65', 'Singapur', 'SGD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(200, 'Slovakia', 'SVK', 'SK', '421', 'Bratislava', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(201, 'Slovenia', 'SVN', 'SI', '386', 'Ljubljana', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(202, 'Solomon Islands', 'SLB', 'SB', '677', 'Honiara', 'SBD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(203, 'Somalia', 'SOM', 'SO', '252', 'Mogadishu', 'SOS', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(204, 'South Africa', 'ZAF', 'ZA', '27', 'Pretoria', 'ZAR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(205, 'South Georgia', 'SGS', 'GS', '', 'Grytviken', 'GBP', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(206, 'South Sudan', 'SSD', 'SS', '211', 'Juba', 'SSP', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(207, 'Spain', 'ESP', 'ES', '34', 'Madrid', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(208, 'Sri Lanka', 'LKA', 'LK', '94', 'Colombo', 'LKR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(209, 'Sudan', 'SDN', 'SD', '249', 'Khartoum', 'SDG', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(210, 'Suriname', 'SUR', 'SR', '597', 'Paramaribo', 'SRD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(211, 'Svalbard And Jan Mayen Islands', 'SJM', 'SJ', '47', 'Longyearbyen', 'NOK', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(212, 'Swaziland', 'SWZ', 'SZ', '268', 'Mbabane', 'SZL', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(213, 'Sweden', 'SWE', 'SE', '46', 'Stockholm', 'SEK', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(214, 'Switzerland', 'CHE', 'CH', '41', 'Berne', 'CHF', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(215, 'Syria', 'SYR', 'SY', '963', 'Damascus', 'SYP', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(216, 'Taiwan', 'TWN', 'TW', '886', 'Taipei', 'TWD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(217, 'Tajikistan', 'TJK', 'TJ', '992', 'Dushanbe', 'TJS', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(218, 'Tanzania', 'TZA', 'TZ', '255', 'Dodoma', 'TZS', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(219, 'Thailand', 'THA', 'TH', '66', 'Bangkok', 'THB', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(220, 'Togo', 'TGO', 'TG', '228', 'Lome', 'XOF', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(221, 'Tokelau', 'TKL', 'TK', '690', '', 'NZD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(222, 'Tonga', 'TON', 'TO', '676', 'Nuku''alofa', 'TOP', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(223, 'Trinidad And Tobago', 'TTO', 'TT', '+1-868', 'Port of Spain', 'TTD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(224, 'Tunisia', 'TUN', 'TN', '216', 'Tunis', 'TND', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(225, 'Turkey', 'TUR', 'TR', '90', 'Ankara', 'TRY', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(226, 'Turkmenistan', 'TKM', 'TM', '993', 'Ashgabat', 'TMT', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(227, 'Turks And Caicos Islands', 'TCA', 'TC', '+1-649', 'Cockburn Town', 'USD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(228, 'Tuvalu', 'TUV', 'TV', '688', 'Funafuti', 'AUD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(229, 'Uganda', 'UGA', 'UG', '256', 'Kampala', 'UGX', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(230, 'Ukraine', 'UKR', 'UA', '380', 'Kiev', 'UAH', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(231, 'United Arab Emirates', 'ARE', 'AE', '971', 'Abu Dhabi', 'AED', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(232, 'United Kingdom', 'GBR', 'GB', '44', 'London', 'GBP', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(233, 'United States', 'USA', 'US', '1', 'Washington', 'USD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(234, 'United States Minor Outlying Islands', 'UMI', 'UM', '1', '', 'USD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(235, 'Uruguay', 'URY', 'UY', '598', 'Montevideo', 'UYU', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(236, 'Uzbekistan', 'UZB', 'UZ', '998', 'Tashkent', 'UZS', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(237, 'Vanuatu', 'VUT', 'VU', '678', 'Port Vila', 'VUV', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(238, 'Vatican City State (Holy See)', 'VAT', 'VA', '379', 'Vatican City', 'EUR', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(239, 'Venezuela', 'VEN', 'VE', '58', 'Caracas', 'VEF', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(240, 'Vietnam', 'VNM', 'VN', '84', 'Hanoi', 'VND', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(241, 'Virgin Islands (British)', 'VGB', 'VG', '+1-284', 'Road Town', 'USD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(242, 'Virgin Islands (US)', 'VIR', 'VI', '+1-340', 'Charlotte Amalie', 'USD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(243, 'Wallis And Futuna Islands', 'WLF', 'WF', '681', 'Mata Utu', 'XPF', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(244, 'Western Sahara', 'ESH', 'EH', '212', 'El-Aaiun', 'MAD', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(245, 'Yemen', 'YEM', 'YE', '967', 'Sanaa', 'YER', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(246, 'Zambia', 'ZMB', 'ZM', '260', 'Lusaka', 'ZMK', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1),
(247, 'Zimbabwe', 'ZWE', 'ZW', '263', 'Harare', 'ZWL', '2018-07-20 14:41:03', '2018-07-20 14:41:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_dates_mst`
--

CREATE TABLE IF NOT EXISTS `delivery_dates_mst` (
  `date_id` int(11) NOT NULL AUTO_INCREMENT,
  `delivery_date` date NOT NULL,
  PRIMARY KEY (`date_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `delivery_dates_mst`
--

INSERT INTO `delivery_dates_mst` (`date_id`, `delivery_date`) VALUES
(1, '2019-08-05'),
(2, '2019-08-12'),
(3, '2019-08-10'),
(4, '2019-08-20'),
(5, '2019-08-16'),
(6, '2019-08-17'),
(7, '2019-08-14'),
(8, '2019-08-18');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_person_details_mst`
--

CREATE TABLE IF NOT EXISTS `delivery_person_details_mst` (
  `dlp_id` int(11) NOT NULL AUTO_INCREMENT,
  `dlp_user_id` int(11) NOT NULL,
  `dlp_user_name` varchar(255) NOT NULL,
  `dlp_photo` varchar(255) NOT NULL,
  `dlp_join_date` date NOT NULL,
  `dlp_license_no` varchar(255) NOT NULL,
  `dlp_vehical_no` varchar(255) NOT NULL,
  `dlp_vehical_type` varchar(255) NOT NULL,
  `dlp_vehical_photo` varchar(255) NOT NULL,
  `dlp_vehical_capacity` varchar(255) NOT NULL,
  `dlp_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`dlp_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `delivery_person_details_mst`
--

INSERT INTO `delivery_person_details_mst` (`dlp_id`, `dlp_user_id`, `dlp_user_name`, `dlp_photo`, `dlp_join_date`, `dlp_license_no`, `dlp_vehical_no`, `dlp_vehical_type`, `dlp_vehical_photo`, `dlp_vehical_capacity`, `dlp_status`) VALUES
(10, 14, 'sandeep davang', '', '2019-08-08', 'da6767676767', '4555', '1', '', '3333kg', 1),
(9, 2, 'Manmohan Mane', '', '2019-08-08', 'ds67789987', '5677', '1', '', '3333', 1),
(8, 2, 'Manmohan Mane', '', '2019-08-08', 'ds67789987', '5677', '1', '', '3333', 1),
(7, 2, 'Manmohan Mane', '', '2019-08-08', 'ds67789987', '5677', '1', '', '3333', 1),
(13, 16, 'mandeep shaha', '', '2019-08-10', 'ds555555555', '8888', '2', '', '1000', 1),
(12, 15, 'mahdev patil', '', '2019-08-07', 'ds67789987', '4567', '1', '', '2000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_details_mst`
--

CREATE TABLE IF NOT EXISTS `order_details_mst` (
  `od_id` int(11) NOT NULL AUTO_INCREMENT,
  `od_order_id` int(11) NOT NULL,
  `od_veg_id` int(11) NOT NULL,
  `od_veg_qty` varchar(255) NOT NULL,
  `od_veg_unit_prize` varchar(255) NOT NULL,
  `od_total_prize` varchar(255) NOT NULL,
  `od_added_dnt` datetime NOT NULL,
  `od_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`od_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `order_details_mst`
--

INSERT INTO `order_details_mst` (`od_id`, `od_order_id`, `od_veg_id`, `od_veg_qty`, `od_veg_unit_prize`, `od_total_prize`, `od_added_dnt`, `od_status`) VALUES
(1, 1, 5, '1', '10', '10', '2019-07-28 17:55:55', 1),
(2, 1, 6, '1', '15', '15', '2019-07-28 17:55:55', 1),
(6, 3, 6, '1', '15', '15', '2019-09-14 09:47:05', 1),
(5, 3, 5, '1', '10', '10', '2019-09-14 09:47:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_mst`
--

CREATE TABLE IF NOT EXISTS `order_mst` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_user_id` int(11) NOT NULL,
  `order_amount` varchar(255) NOT NULL,
  `order_for_date` date NOT NULL,
  `order_added_dnt` datetime NOT NULL,
  `order_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `order_mst`
--

INSERT INTO `order_mst` (`order_id`, `order_user_id`, `order_amount`, `order_for_date`, `order_added_dnt`, `order_status`) VALUES
(1, 1, '25', '2019-07-09', '2019-07-28 17:55:55', 1),
(3, 1, '25', '2019-07-16', '2019-09-14 09:47:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_rate_mst`
--

CREATE TABLE IF NOT EXISTS `supplier_rate_mst` (
  `sup_id` int(11) NOT NULL AUTO_INCREMENT,
  `sup_veg_id` int(11) NOT NULL,
  `veg_unit` int(11) NOT NULL,
  `sup_rate_per_unit` varchar(255) NOT NULL,
  PRIMARY KEY (`sup_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `supplier_rate_mst`
--

INSERT INTO `supplier_rate_mst` (`sup_id`, `sup_veg_id`, `veg_unit`, `sup_rate_per_unit`) VALUES
(5, 1, 1, '6'),
(6, 2, 2, '15'),
(7, 3, 2, '35'),
(8, 4, 2, '15'),
(9, 5, 1, '45'),
(10, 7, 2, '15'),
(11, 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_details_mst`
--

CREATE TABLE IF NOT EXISTS `user_details_mst` (
  `user_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `ud_user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `country` varchar(150) NOT NULL,
  `state` varchar(150) NOT NULL,
  `city` varchar(150) NOT NULL,
  `zip_code` varchar(150) NOT NULL,
  `detailed_address` text NOT NULL,
  PRIMARY KEY (`user_details_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `user_details_mst`
--

INSERT INTO `user_details_mst` (`user_details_id`, `ud_user_id`, `user_name`, `pwd`, `first_name`, `last_name`, `contact`, `gender`, `address`, `country`, `state`, `city`, `zip_code`, `detailed_address`) VALUES
(4, 2, '', '', 'manmohan ', 'mane', '9878767678', 'male', 'tarabai park', 'india', 'maharashtra', 'kolhapur', '416012', 'tarabai park'),
(3, 0, '', '', 'sanket', 'kharade', '5678890987', 'male', 'mangalwar peth', 'india', 'maharashtra', 'kolhapur', '416012', 'mangalwar peth'),
(5, 13, '', '', 'sanjana', 'desai', '555555555', 'female', 'kolhapur', 'india', 'maharashtra', 'kolhapur', '416012', 'kolhapur'),
(6, 14, '', '', 'sandeep', 'davang', '56567787', 'male', 'kolhapur', 'india', 'maharashtra', 'kolhapur', '416012', 'kolhapur'),
(51, 53, '', '', 'snehal ', 'kharade', '787878787878', 'female', 'kolhapur', 'india', 'maharashtra', 'kolhapur', '416012', 'kolhapur'),
(52, 0, 'manjiri', '1222222', 'manjiri', 'salokhe', '44444444444', 'female', 'kolhapur', 'India', 'Maharashtra', 'kolhapur', '416012', 'kolhapur'),
(53, 0, 'madhavi', '222', 'madhavi', 'mane', '44444444444', 'female', 'kolhapur', 'India', 'Maharashtra', 'kolhapur', '416012', 'kolhapur');

-- --------------------------------------------------------

--
-- Table structure for table `user_mst`
--

CREATE TABLE IF NOT EXISTS `user_mst` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `user_mst`
--

INSERT INTO `user_mst` (`user_id`, `user_name`, `password`, `email`, `user_type`) VALUES
(1, 'sanket kharade', '12345', 'sanket@test.com', 2),
(2, 'manmohan mane', '257777', 'mn@test.com', 4),
(11, 'radha more', '12345', 'radha@test.com', 3),
(12, 'sampada mulik', '23355', 'sampada@test.com', 3),
(13, 'sanjana desai', '343456', 'ssanjana@test.com', 3),
(63, '', '123456', 'priya@test.com', 0),
(64, '', '123456', 'priya@test.com', 0),
(62, '', '123456', 'priya@test.com', 0),
(61, '', '123456', 'priya@test.com', 0),
(60, '', '123456', 'priya@test.com', 0),
(59, '', '123456', 'priya@test.com', 0),
(58, '', '123456', 'priya@test.com', 0),
(57, '', '123456', 'priya@test.com', 0),
(56, '', '123456', 'priya@test.com', 0),
(55, '', '123456', 'priya@test.com', 0),
(54, 'mahadev davang', '66666', 'mahadev@test.com', 1),
(53, 'snehal kharade', '2577', 'snehal@test.com', 1),
(52, 'sampada mulik', '44444', 'sampada@test.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_type_mst`
--

CREATE TABLE IF NOT EXISTS `user_type_mst` (
  `user_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(255) NOT NULL,
  `type_description` text NOT NULL,
  PRIMARY KEY (`user_type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `user_type_mst`
--

INSERT INTO `user_type_mst` (`user_type_id`, `user_type`, `type_description`) VALUES
(2, 'Sub Admin', 'he is an sub admin'),
(1, 'Admin', 'this is person who has the control all over the app'),
(3, 'customer', 'i am customer who wants to purchase vegetables from you.'),
(4, 'delivery person', 'i am here as a delivery person.helloooooo');

-- --------------------------------------------------------

--
-- Table structure for table `veegitable_rate_mst`
--

CREATE TABLE IF NOT EXISTS `veegitable_rate_mst` (
  `vr_id` int(11) NOT NULL AUTO_INCREMENT,
  `vr_veg_id` int(11) NOT NULL,
  `vr_rate_per_unit` varchar(255) NOT NULL,
  PRIMARY KEY (`vr_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `veegitable_rate_mst`
--

INSERT INTO `veegitable_rate_mst` (`vr_id`, `vr_veg_id`, `vr_rate_per_unit`) VALUES
(1, 5, '10'),
(2, 6, '15'),
(3, 1, '10'),
(4, 2, '15');

-- --------------------------------------------------------

--
-- Table structure for table `vegies_available_from_supplier_mst`
--

CREATE TABLE IF NOT EXISTS `vegies_available_from_supplier_mst` (
  `vs_id` int(11) NOT NULL AUTO_INCREMENT,
  `vs_veg_id` int(11) NOT NULL,
  `vs_veg_type` varchar(255) NOT NULL,
  `vs_veg_photo` varchar(255) NOT NULL,
  PRIMARY KEY (`vs_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `vegies_available_from_supplier_mst`
--

INSERT INTO `vegies_available_from_supplier_mst` (`vs_id`, `vs_veg_id`, `vs_veg_type`, `vs_veg_photo`) VALUES
(1, 1, '1', 'cabage3.jpg'),
(2, 2, '1', 'capsicum1.jpg'),
(3, 3, '2', 'color_capsicum.jpg'),
(4, 4, '1', 'brinjal.jpg'),
(5, 5, '2', 'Broccolini.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `vegies_type_mst`
--

CREATE TABLE IF NOT EXISTS `vegies_type_mst` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `veg_type` varchar(255) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `vegies_type_mst`
--

INSERT INTO `vegies_type_mst` (`type_id`, `veg_type`) VALUES
(1, 'Local'),
(2, 'Exotic'),
(4, ''),
(5, ''),
(6, ''),
(7, ''),
(8, ''),
(9, ''),
(10, ''),
(11, ''),
(12, ''),
(13, ''),
(14, ''),
(15, ''),
(16, ''),
(17, ''),
(18, ''),
(19, ''),
(20, ''),
(21, ''),
(22, ''),
(23, ''),
(24, ''),
(25, ''),
(26, ''),
(27, ''),
(28, '');

-- --------------------------------------------------------

--
-- Table structure for table `vegies_unit_mst`
--

CREATE TABLE IF NOT EXISTS `vegies_unit_mst` (
  `vunit_id` int(11) NOT NULL AUTO_INCREMENT,
  `vunit_unit` varchar(255) NOT NULL,
  `vunit_qty` varchar(255) NOT NULL,
  PRIMARY KEY (`vunit_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `vegies_unit_mst`
--

INSERT INTO `vegies_unit_mst` (`vunit_id`, `vunit_unit`, `vunit_qty`) VALUES
(2, 'pkt', '250 grams'),
(1, 'pc', '1'),
(3, 'pcs', '4'),
(5, '', ''),
(6, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `vegitables_mst`
--

CREATE TABLE IF NOT EXISTS `vegitables_mst` (
  `veg_id` int(11) NOT NULL AUTO_INCREMENT,
  `veg_name` varchar(255) NOT NULL,
  `veg_type_id` int(11) NOT NULL,
  `veg_unit_id` int(11) NOT NULL,
  `veg_photo` varchar(255) NOT NULL,
  `veg_rate` varchar(255) NOT NULL,
  PRIMARY KEY (`veg_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `vegitables_mst`
--

INSERT INTO `vegitables_mst` (`veg_id`, `veg_name`, `veg_type_id`, `veg_unit_id`, `veg_photo`, `veg_rate`) VALUES
(1, 'Cabage', 1, 1, 'cabage.jpg', '10'),
(2, 'Capsicum', 1, 2, 'capsicum.jpg', '20'),
(3, 'Color Capsicum', 2, 2, 'color_capsicum.jpg', '40'),
(4, 'Brinjal', 1, 2, 'brinjal.jpg', '25'),
(5, 'Brocolli', 2, 1, 'Broccolini.jpeg', '35'),
(6, 'Moringa', 1, 3, 'moringa.jpg', '20'),
(7, 'Green Peas', 1, 2, 'peas.jpg', '35');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
