-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2016 at 01:43 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `belajarbener`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` int(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', 1, NULL),
('create-company', 2, NULL),
('create-companyinfo', 2, NULL),
('customer', 2, NULL),
('customer', 18, NULL),
('customer', 19, NULL),
('customer', 20, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, 'admin can create and edit all', NULL, NULL, NULL, NULL),
('create-company', 2, 'allow a user to add a company data', NULL, NULL, NULL, NULL),
('create-companyinfo', 2, 'allow a user create a companyinfo', NULL, NULL, NULL, NULL),
('customer', 1, 'Only Customer here, just look not crud', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'create-company'),
('admin', 'create-companyinfo');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bill_landing`
--

CREATE TABLE IF NOT EXISTS `bill_landing` (
`bl_id` int(11) NOT NULL,
  `bl_number` varchar(50) NOT NULL,
  `bl_place` varchar(50) DEFAULT NULL,
  `bl_date` date DEFAULT NULL,
  `bl_type` varchar(20) NOT NULL,
  `si_id` int(11) NOT NULL,
  `quotationid` int(11) NOT NULL,
  `shipper` int(11) NOT NULL,
  `consignee` int(11) DEFAULT NULL,
  `notify_party` int(11) DEFAULT NULL,
  `ocean_vessel` varchar(255) DEFAULT NULL,
  `port_of_discharge` varchar(255) NOT NULL,
  `place_of_receipt` varchar(255) NOT NULL,
  `port_of_loading` varchar(255) NOT NULL,
  `place_of_delivery` varchar(255) NOT NULL,
  `delivery_agent` int(11) DEFAULT NULL,
  `freight_charges` decimal(16,2) DEFAULT NULL,
  `revenue_tons` decimal(16,2) DEFAULT NULL,
  `rate` varchar(255) DEFAULT NULL,
  `freight_term` varchar(255) NOT NULL,
  `exchange_rate` decimal(16,2) DEFAULT NULL,
  `currency` varchar(50) DEFAULT NULL,
  `prepaid_at` varchar(255) NOT NULL,
  `payable_at` varchar(255) NOT NULL,
  `total_prepaid_national_currency` decimal(16,2) DEFAULT NULL,
  `number_of_original` varchar(20) DEFAULT NULL,
  `status` enum('PENDING','FAILED','SUCCESS') NOT NULL DEFAULT 'PENDING',
  `initial_carriage` varchar(255) DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `update_by` int(11) DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `insert_by` int(11) DEFAULT NULL,
  `insert_date` date DEFAULT NULL,
  `collect` varchar(255) DEFAULT NULL,
  `kindofexport` int(1) NOT NULL DEFAULT '1',
  `agent_iata_code` varchar(255) DEFAULT NULL,
  `account_no` varchar(255) DEFAULT NULL,
  `to_code` varchar(255) DEFAULT NULL,
  `by_first_carrier` varchar(255) DEFAULT NULL,
  `to_carrier_1` varchar(255) DEFAULT NULL,
  `by_carrier_1` varchar(255) DEFAULT NULL,
  `to_carrier_2` varchar(255) DEFAULT NULL,
  `by_carrier_2` varchar(255) DEFAULT NULL,
  `requested_flight_date_1` varchar(255) DEFAULT NULL,
  `requested_flight_date_2` varchar(255) DEFAULT NULL,
  `wt_val_ppd` varchar(255) DEFAULT NULL,
  `wt_val_coll` varchar(255) DEFAULT NULL,
  `other_ppd` varchar(255) DEFAULT NULL,
  `other_coll` varchar(255) DEFAULT NULL,
  `declared_val_carriege` varchar(255) DEFAULT NULL,
  `declared_val_cust` varchar(255) DEFAULT NULL,
  `holding_info` varchar(255) DEFAULT NULL,
  `weigth_charge_prepaid` varchar(255) DEFAULT NULL,
  `weigth_charge_collect` varchar(255) DEFAULT NULL,
  `valuation_charge_prepaid` varchar(255) DEFAULT NULL,
  `valuation_charge_collect` varchar(255) DEFAULT NULL,
  `tax_prepaid` varchar(255) DEFAULT NULL,
  `tax_collect` varchar(255) DEFAULT NULL,
  `tot_agent_prepaid` varchar(255) DEFAULT NULL,
  `tot_agent_collect` varchar(255) DEFAULT NULL,
  `tot_carrier_prepaid` varchar(255) DEFAULT NULL,
  `tot_carrier_collect` varchar(255) DEFAULT NULL,
  `tot_prepaid` varchar(255) DEFAULT NULL,
  `tot_collect` varchar(255) DEFAULT NULL,
  `oth_charger` varchar(255) DEFAULT NULL,
  `cartage` varchar(255) DEFAULT NULL,
  `doc_stamp_fee` varchar(255) DEFAULT NULL,
  `agent_certified` varchar(255) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `bill_landing`
--

INSERT INTO `bill_landing` (`bl_id`, `bl_number`, `bl_place`, `bl_date`, `bl_type`, `si_id`, `quotationid`, `shipper`, `consignee`, `notify_party`, `ocean_vessel`, `port_of_discharge`, `place_of_receipt`, `port_of_loading`, `place_of_delivery`, `delivery_agent`, `freight_charges`, `revenue_tons`, `rate`, `freight_term`, `exchange_rate`, `currency`, `prepaid_at`, `payable_at`, `total_prepaid_national_currency`, `number_of_original`, `status`, `initial_carriage`, `active`, `update_by`, `update_date`, `insert_by`, `insert_date`, `collect`, `kindofexport`, `agent_iata_code`, `account_no`, `to_code`, `by_first_carrier`, `to_carrier_1`, `by_carrier_1`, `to_carrier_2`, `by_carrier_2`, `requested_flight_date_1`, `requested_flight_date_2`, `wt_val_ppd`, `wt_val_coll`, `other_ppd`, `other_coll`, `declared_val_carriege`, `declared_val_cust`, `holding_info`, `weigth_charge_prepaid`, `weigth_charge_collect`, `valuation_charge_prepaid`, `valuation_charge_collect`, `tax_prepaid`, `tax_collect`, `tot_agent_prepaid`, `tot_agent_collect`, `tot_carrier_prepaid`, `tot_carrier_collect`, `tot_prepaid`, `tot_collect`, `oth_charger`, `cartage`, `doc_stamp_fee`, `agent_certified`) VALUES
(5, 'KTM-0001-NGY', 'JAKARTA', '2015-11-12', 'house', 1, 1, 2, 3, 3, 'FORTUNE TRADER 0080N', 'NAGOYA, JAPAN', 'TG. PRIOK, JAKARTA, INDONESIA', 'TG. PRIOK, JAKARTA, INDONESIA', 'NAGOYA, JAPAN', 4, NULL, NULL, '', 'FREIGHT PREPAID', '13457.00', 'IDR', 'Jakarta', 'Jakarta', NULL, '3', 'SUCCESS', NULL, 1, 1, '2015-11-15', 1, '2015-11-12', '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'KTM-0006-WEW', 'JAKARTA', '2015-11-21', 'house', 2, 10, 3, 3, 3, 'Truck', 'Singapore', 'TG. PRIOK, JAKARTA, INDONESIA', 'TG. PRIOK, JAKARTA, INDONESIA', 'Singapore', NULL, NULL, NULL, '123', 'Prepaid', '13457.00', 'IDR', 'Jakarta', 'Jakarta', NULL, '3', 'SUCCESS', NULL, 1, 1, '2016-02-06', 1, '2015-11-12', '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'KTM-0007-FUJI', 'JAKARTA', '2015-11-27', 'house', 3, 2, 3, 4, 4, 'TJKKB BBN', 'FUJI JAPAN', 'TG. PRIOK, JAKARTA, INDONESIA', 'TG. PRIOK, JAKARTA, INDONESIA', 'FUJI JAPAN', 4, NULL, NULL, '-', 'FREIGHT PREPAID', NULL, 'IDR', 'Jakarta', 'Jakarta', NULL, '3', 'SUCCESS', NULL, 1, 1, '2015-11-26', 1, '2015-11-26', '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'KTM-0008-ABC', 'JAKARTA', '2016-01-15', 'house', 0, 9, 2, 2, 5, 'QWERTY', 'TG. PRIOK, JAKARTA, INDONESIA 0', 'TG. PRIOK, JAKARTA, INDONESIA 3', 'TG. PRIOK, JAKARTA, INDONESIA 2', 'TG. PRIOK, JAKARTA, INDONESIA 1', 5, '100.00', '100.00', '1000', 'PREPAID', '14000.00', 'IDR', 'JAKARTA', 'JAKARTA', NULL, '3', 'SUCCESS', NULL, 1, 1, '2016-01-17', 1, '2016-01-15', 'QWERTYU', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'KTM-0011-SING', 'JAKARTA', '2016-01-31', 'house', 6, 10, 3, 4, 4, 'Truck', 'Singapore', 'TG. PRIOK, JAKARTA, INDONESIA', 'TG. PRIOK, JAKARTA, INDONESIA', 'Singapore', 5, '100.00', '100.00', '123', 'Prepaid', NULL, 'IDR', 'Jakarta', 'Jakarta', NULL, '3', 'SUCCESS', NULL, 1, 1, '2016-02-06', 1, '2016-01-30', 'QWERTYU', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'KTM-0012-JKT', 'JAKARTA', '2016-01-31', 'house', 0, 11, 4, 3, 3, 'Malaysia Air Lines', 'Malaysia', 'TG. PRIOK, JAKARTA, INDONESIA', 'Malaysia', 'TG. PRIOK, JAKARTA, INDONESIA', 5, '100.00', NULL, '-', 'PREPAID', '123.00', 'IDR', 'Malaysia', 'Malaysia', NULL, '3', 'SUCCESS', NULL, 1, 1, '2016-01-30', 1, '2016-01-30', '', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'KTM-0013-JKT', 'JAKARTA', '2016-02-29', 'house', 0, 12, 1, 3, 3, 'asd', 'TG. PRIOK, JAKARTA, INDONESIA', 'TG. PRIOK, JAKARTA, INDONESIA', 'Singapore', 'Singapore', 4, '100.00', NULL, '', 'PREPAID', '123.00', 'IDR', 'Singapore', 'JAKARTA', NULL, '3', 'SUCCESS', NULL, 1, 1, '2016-02-02', 1, '2016-02-02', 'QWERTYU', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'KTM-0014-EXPORTAW', 'JAKARTA', '2016-02-07', 'house', 7, 13, 3, 5, 5, 'TEST VESSEL', 'MANA AJA DAH', 'TG. PRIOK, JAKARTA, INDONESIA', 'TG. PRIOK, JAKARTA, INDONESIA', 'MANA AJA DAH', 4, NULL, NULL, '', '30.00', NULL, '', 'Jakarta', 'Jakarta', NULL, '', 'PENDING', NULL, 1, NULL, NULL, 1, '2016-02-07', '', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bill_landing_detail`
--

CREATE TABLE IF NOT EXISTS `bill_landing_detail` (
`bl_det_id` int(11) NOT NULL,
  `bl_id` int(11) NOT NULL,
  `container_seal_no` varchar(255) DEFAULT NULL,
  `kind_of_package_desc_goods` text,
  `weight` varchar(255) DEFAULT NULL,
  `measurement` varchar(255) DEFAULT NULL,
  `total_container` varchar(255) DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `insert_by` int(11) DEFAULT NULL,
  `insert_date` date DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `update_date` date DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `bill_landing_detail`
--

INSERT INTO `bill_landing_detail` (`bl_det_id`, `bl_id`, `container_seal_no`, `kind_of_package_desc_goods`, `weight`, `measurement`, `total_container`, `active`, `insert_by`, `insert_date`, `update_by`, `update_date`) VALUES
(2, 5, 'HALU2007290 / HAS349129', '24 CASES <br /> 3,937 PCS OF NBK PULLEY<br /><br /><br />\r\nTOTAL 24 CASES ONLY\r\n"FREIGHT PREPAID"\r\n"SHIPPER LOAD, COUNT AND SEAL"', '9,417.50 KGS / 9,028.50 KGS / 15.78 CBM', '', 'ONE TWENTY FOOTER CONTAINER ONLY', 1, 1, '2015-11-15', 1, '2015-11-15'),
(3, 6, '123 / 123asd000', 'Yang atas harus pake spasi bacaan nya', '192 / 120 / 222', NULL, NULL, 1, 1, '2015-11-12', 1, '2016-02-06'),
(4, 7, 'SEE ATTACHMENT DETAIL', 'WERVV BHHBHH', '9,417.50 KGS / 9,028.50 KGS / 15.78 CBM', NULL, '', 1, 1, '2015-11-26', 1, '2015-12-25'),
(5, 7, 'QWERTY123 / ID123 / 20 J.BAGS @ 1.25 MT', 'ERERTR GGGY HYBGHGU', '67 / / ', NULL, '5', 1, 1, '2015-11-26', 1, '2015-12-25'),
(6, 5, '123123 / 123123', '12312312 12312312 123123 <br />\r\nwerwerwer werwerw werwerw<br />\r\nrrweweskwsef werwe rwerwer.', '123456 / - / -', NULL, '123456', 1, 1, '2015-12-09', 1, '2015-12-09'),
(7, 7, 'QWERTY124 / ID124 / 20 J.BAGS @ 1.25 MT', 'QWERTY123 / ID123 / 20 J.BAGS @ 1.25 MT', '', NULL, '', 1, 1, '2015-12-25', NULL, NULL),
(8, 9, '-', '-', '-', NULL, NULL, 1, 1, '2016-01-15', NULL, NULL),
(9, 10, '12 / 12 / 12', 'tessss', '12 / 21 / 11', NULL, '123', 1, 1, '2016-01-15', 1, '2016-01-17'),
(10, 10, '123 / 123 /123', 'testos aje dah', '123 / 123 / 123', NULL, '123456', 1, 1, '2016-01-17', NULL, NULL),
(11, 11, '123 / 123asd000', 'Yang atas harus pake spasi bacaan nya', '192 / 120 / 222', NULL, NULL, 1, 1, '2016-01-30', 1, '2016-02-06'),
(12, 12, '123 / 123123qweqwe', 'Test Tos', '123 / 222 / 333', NULL, '', 1, 1, '2016-01-30', 1, '2016-01-30'),
(13, 13, '12132423 / 2323fsfss', 'Test ajah', '123 / 222 / 333', NULL, '', 1, 1, '2016-02-02', 1, '2016-02-02'),
(14, 14, '', 'WEDEWE APA BAE DAH', '10 KG / 12KG / 15 MS', NULL, NULL, 1, 1, '2016-02-07', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
`companyid` int(11) NOT NULL,
  `companyname` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `informationid` int(1) NOT NULL DEFAULT '2',
  `email` varchar(100) DEFAULT NULL,
  `createby` int(11) NOT NULL,
  `updateby` int(11) DEFAULT '0',
  `deliveryaddress` text,
  `invoiceaddress` text
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`companyid`, `companyname`, `phone`, `fax`, `active`, `informationid`, `email`, `createby`, `updateby`, `deliveryaddress`, `invoiceaddress`) VALUES
(1, 'PT. KUANTUM AVIA TRANSINDO', '021-57931727', '021-57931658', 1, 1, 'cs1exp@kuantumavia.com', 1, 1, 'SENAYAN TRADE CENTER (STC) LT.2 NO.31&34, JL. ASIA AFRICA PINTU IX GELORA SENAYAN JAKARTA PUSAT 10270 - INDONESIA', 'SENAYAN TRADE CENTER (STC) LT.2 NO.31&34, JL. ASIA AFRICA PINTU IX GELORA SENAYAN JAKARTA PUSAT 10270 - INDONESIA'),
(2, 'PT. PLATINUM PRO', '021 -', '021 -', 1, 2, 'admin@platinumpro.com', 1, 0, 'Test Alamat hanya uji coba Modern Industri no.3 Sukamulya - Rumpin, kab.Bogor', 'Test Alamat hanya uji coba Modern Industri no.3 Sukamulya - Rumpin, kab.Bogor'),
(3, 'PT. TEST ABC', '021-88887777', '021-99998888', 1, 2, 'pt.testabc@gmail.com', 1, 0, 'Jl. Angin ribut no 22, Jakarta Selatan', 'Jl. Angin ribut no 22, Jakarta Selatan'),
(4, 'BEST SHIPPING INC. TOKYO', '03-5439-3710', '03-5439-3704', 1, 2, 'admin@bestshipping.com', 1, 0, 'BS BUILDING 1-14-6 SHIBAURA, MINATO-KU TOKYO, JAPAN 105-0023', 'BS BUILDING 1-14-6 SHIBAURA, MINATO-KU TOKYO, JAPAN 105-0023'),
(5, 'SUMBER JANTIN', '021 12345', '021 1213543', 1, 2, 'sumber@jaya.com', 1, 0, 'Jalan apa aja boleh, no 123 -12', 'Jalan apa aja boleh, no 123 -12'),
(6, 'CITY OCEAN', '021 - 1234456', '021 - 1234457', 1, 1, 'admin@cityocean.com', 1, 0, 'Mana aja boleh yang penting ok', 'Mana aja boleh yang penting ok'),
(7, 'SAME AS CONSIGNEE', '-', '-', 1, 2, 'admin@seem.com', 1, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `companyinfo`
--

CREATE TABLE IF NOT EXISTS `companyinfo` (
`informationid` int(11) NOT NULL,
  `informationname` varchar(50) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `companyinfo`
--

INSERT INTO `companyinfo` (`informationid`, `informationname`) VALUES
(1, 'Owner'),
(2, 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `costing`
--

CREATE TABLE IF NOT EXISTS `costing` (
`costing_id` int(11) NOT NULL,
  `costing_name` varchar(255) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `costing`
--

INSERT INTO `costing` (`costing_id`, `costing_name`, `active`) VALUES
(1, 'Test Costing 1', 1),
(2, 'Test Costing 2', 1),
(3, 'Test Costing 3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `ccode` varchar(2) NOT NULL DEFAULT '',
  `country` varchar(200) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`ccode`, `country`) VALUES
('AF', 'Afghanistan'),
('AX', 'Åland Islands'),
('AL', 'Albania'),
('DZ', 'Algeria'),
('AS', 'American Samoa'),
('AD', 'Andorra'),
('AO', 'Angola'),
('AI', 'Anguilla'),
('AQ', 'Antarctica'),
('AG', 'Antigua and Barbuda'),
('AR', 'Argentina'),
('AM', 'Armenia'),
('AW', 'Aruba'),
('AU', 'Australia'),
('AT', 'Austria'),
('AZ', 'Azerbaijan'),
('BS', 'Bahamas'),
('BH', 'Bahrain'),
('BD', 'Bangladesh'),
('BB', 'Barbados'),
('BY', 'Belarus'),
('BE', 'Belgium'),
('BZ', 'Belize'),
('BJ', 'Benin'),
('BM', 'Bermuda'),
('BT', 'Bhutan'),
('BO', 'Bolivia'),
('BA', 'Bosnia and Herzegovina'),
('BW', 'Botswana'),
('BV', 'Bouvet Island'),
('BR', 'Brazil'),
('IO', 'British Indian Ocean Territory'),
('BN', 'Brunei Darussalam'),
('BG', 'Bulgaria'),
('BF', 'Burkina Faso'),
('BI', 'Burundi'),
('KH', 'Cambodia'),
('CM', 'Cameroon'),
('CA', 'Canada'),
('CV', 'Cape Verde'),
('KY', 'Cayman Islands'),
('CF', 'Central African Republic'),
('TD', 'Chad'),
('CL', 'Chile'),
('CN', 'China'),
('CX', 'Christmas Island'),
('CC', 'Cocos (Keeling) Islands'),
('CO', 'Colombia'),
('KM', 'Comoros'),
('CG', 'Congo'),
('CD', 'Congo, The Democratic Republic of the'),
('CK', 'Cook Islands'),
('CR', 'Costa Rica'),
('CI', 'Côte D''Ivoire'),
('HR', 'Croatia'),
('CU', 'Cuba'),
('CY', 'Cyprus'),
('CZ', 'Czech Republic'),
('DK', 'Denmark'),
('DJ', 'Djibouti'),
('DM', 'Dominica'),
('DO', 'Dominican Republic'),
('EC', 'Ecuador'),
('EG', 'Egypt'),
('SV', 'El Salvador'),
('GQ', 'Equatorial Guinea'),
('ER', 'Eritrea'),
('EE', 'Estonia'),
('ET', 'Ethiopia'),
('FK', 'Falkland Islands (Malvinas)'),
('FO', 'Faroe Islands'),
('FJ', 'Fiji'),
('FI', 'Finland'),
('FR', 'France'),
('GF', 'French Guiana'),
('PF', 'French Polynesia'),
('TF', 'French Southern Territories'),
('GA', 'Gabon'),
('GM', 'Gambia'),
('GE', 'Georgia'),
('DE', 'Germany'),
('GH', 'Ghana'),
('GI', 'Gibraltar'),
('GR', 'Greece'),
('GL', 'Greenland'),
('GD', 'Grenada'),
('GP', 'Guadeloupe'),
('GU', 'Guam'),
('GT', 'Guatemala'),
('GG', 'Guernsey'),
('GN', 'Guinea'),
('GW', 'Guinea-Bissau'),
('GY', 'Guyana'),
('HT', 'Haiti'),
('HM', 'Heard Island and McDonald Islands'),
('VA', 'Holy See (Vatican City State)'),
('HN', 'Honduras'),
('HK', 'Hong Kong'),
('HU', 'Hungary'),
('IS', 'Iceland'),
('IN', 'India'),
('ID', 'Indonesia'),
('IR', 'Iran, Islamic Republic of'),
('IQ', 'Iraq'),
('IE', 'Ireland'),
('IM', 'Isle of Man'),
('IL', 'Israel'),
('IT', 'Italy'),
('JM', 'Jamaica'),
('JP', 'Japan'),
('JE', 'Jersey'),
('JO', 'Jordan'),
('KZ', 'Kazakhstan'),
('KE', 'Kenya'),
('KI', 'Kiribati'),
('KP', 'Korea, Democratic People''s Republic of'),
('KR', 'Korea, Republic of'),
('KW', 'Kuwait'),
('KG', 'Kyrgyzstan'),
('LA', 'Lao People''s Democratic Republic'),
('LV', 'Latvia'),
('LB', 'Lebanon'),
('LS', 'Lesotho'),
('LR', 'Liberia'),
('LY', 'Libyan Arab Jamahiriya'),
('LI', 'Liechtenstein'),
('LT', 'Lithuania'),
('LU', 'Luxembourg'),
('MO', 'Macao'),
('MK', 'Macedonia, The Former Yugoslav Republic of'),
('MG', 'Madagascar'),
('MW', 'Malawi'),
('MY', 'Malaysia'),
('MV', 'Maldives'),
('ML', 'Mali'),
('MT', 'Malta'),
('MH', 'Marshall Islands'),
('MQ', 'Martinique'),
('MR', 'Mauritania'),
('MU', 'Mauritius'),
('YT', 'Mayotte'),
('MX', 'Mexico'),
('FM', 'Micronesia, Federated States of'),
('MD', 'Moldova, Republic of'),
('MC', 'Monaco'),
('MN', 'Mongolia'),
('ME', 'Montenegro'),
('MS', 'Montserrat'),
('MA', 'Morocco'),
('MZ', 'Mozambique'),
('MM', 'Myanmar'),
('NA', 'Namibia'),
('NR', 'Nauru'),
('NP', 'Nepal'),
('NL', 'Netherlands'),
('AN', 'Netherlands Antilles'),
('NC', 'New Caledonia'),
('NZ', 'New Zealand'),
('NI', 'Nicaragua'),
('NE', 'Niger'),
('NG', 'Nigeria'),
('NU', 'Niue'),
('NF', 'Norfolk Island'),
('MP', 'Northern Mariana Islands'),
('NO', 'Norway'),
('OM', 'Oman'),
('PK', 'Pakistan'),
('PW', 'Palau'),
('PS', 'Palestinian Territory, Occupied'),
('PA', 'Panama'),
('PG', 'Papua New Guinea'),
('PY', 'Paraguay'),
('PE', 'Peru'),
('PH', 'Philippines'),
('PN', 'Pitcairn'),
('PL', 'Poland'),
('PT', 'Portugal'),
('PR', 'Puerto Rico'),
('QA', 'Qatar'),
('RE', 'Reunion'),
('RO', 'Romania'),
('RU', 'Russian Federation'),
('RW', 'Rwanda'),
('BL', 'Saint Barthélemy'),
('SH', 'Saint Helena'),
('KN', 'Saint Kitts and Nevis'),
('LC', 'Saint Lucia'),
('MF', 'Saint Martin'),
('PM', 'Saint Pierre and Miquelon'),
('VC', 'Saint Vincent and the Grenadines'),
('WS', 'Samoa'),
('SM', 'San Marino'),
('ST', 'Sao Tome and Principe'),
('SA', 'Saudi Arabia'),
('SN', 'Senegal'),
('RS', 'Serbia'),
('SC', 'Seychelles'),
('SL', 'Sierra Leone'),
('SG', 'Singapore'),
('SK', 'Slovakia'),
('SI', 'Slovenia'),
('SB', 'Solomon Islands'),
('SO', 'Somalia'),
('ZA', 'South Africa'),
('GS', 'South Georgia and the South Sandwich Islands'),
('ES', 'Spain'),
('LK', 'Sri Lanka'),
('SD', 'Sudan'),
('SR', 'Suriname'),
('SJ', 'Svalbard and Jan Mayen'),
('SZ', 'Swaziland'),
('SE', 'Sweden'),
('CH', 'Switzerland'),
('SY', 'Syrian Arab Republic'),
('TW', 'Taiwan, Province Of China'),
('TJ', 'Tajikistan'),
('TZ', 'Tanzania, United Republic of'),
('TH', 'Thailand'),
('TL', 'Timor-Leste'),
('TG', 'Togo'),
('TK', 'Tokelau'),
('TO', 'Tonga'),
('TT', 'Trinidad and Tobago'),
('TN', 'Tunisia'),
('TR', 'Turkey'),
('TM', 'Turkmenistan'),
('TC', 'Turks and Caicos Islands'),
('TV', 'Tuvalu'),
('UG', 'Uganda'),
('UA', 'Ukraine'),
('AE', 'United Arab Emirates'),
('GB', 'United Kingdom'),
('US', 'United States'),
('UM', 'United States Minor Outlying Islands'),
('UY', 'Uruguay'),
('UZ', 'Uzbekistan'),
('VU', 'Vanuatu'),
('VE', 'Venezuela'),
('VN', 'Viet Nam'),
('VG', 'Virgin Islands, British'),
('VI', 'Virgin Islands, U.S.'),
('WF', 'Wallis And Futuna'),
('EH', 'Western Sahara'),
('YE', 'Yemen'),
('ZM', 'Zambia'),
('ZW', 'Zimbabwe'),
('AB', 'Abu Dhabi');

-- --------------------------------------------------------

--
-- Table structure for table `creditnote`
--

CREATE TABLE IF NOT EXISTS `creditnote` (
`criditnote_id` int(11) NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `invoice_date` date DEFAULT NULL,
  `jobs_id` int(11) NOT NULL,
  `bl_id` int(11) NOT NULL,
  `due_date` date DEFAULT NULL,
  `term` varchar(255) DEFAULT NULL,
  `tot_amount` decimal(16,2) DEFAULT NULL,
  `companyid` int(11) DEFAULT NULL,
  `insert_by` int(11) NOT NULL,
  `insert_date` date NOT NULL,
  `update_by` int(11) DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `sign` varchar(255) DEFAULT NULL,
  `status` enum('ON GOING','FINISH','CANCEL') NOT NULL DEFAULT 'ON GOING',
  `invoice_id` int(11) NOT NULL,
  `kindofexport` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `creditnote`
--

INSERT INTO `creditnote` (`criditnote_id`, `invoice_no`, `invoice_date`, `jobs_id`, `bl_id`, `due_date`, `term`, `tot_amount`, `companyid`, `insert_by`, `insert_date`, `update_by`, `update_date`, `active`, `sign`, `status`, `invoice_id`, `kindofexport`) VALUES
(8, '0001/KTM-SE/NOV/2015-A', '2015-11-28', 3, 5, '2015-12-31', NULL, '385.00', 4, 1, '2015-11-28', 1, '2015-12-02', 1, 'Fiorenzi D Kaori', 'ON GOING', 10, 1),
(9, '0011/KTM-SE/JAN/2016-A', '2016-01-24', 6, 10, '2016-01-31', NULL, '35.00', 1, 1, '2016-01-24', 1, '2016-01-24', 1, 'Ariandi Nugraha', 'ON GOING', 11, 2),
(10, '0012/KTM-SE/JAN/2016-A', '2016-01-30', 7, 6, NULL, NULL, '70.00', 1, 1, '2016-01-30', NULL, NULL, 1, NULL, 'ON GOING', 12, 1),
(11, '0013/KTM-SE/JAN/2016-A', '2016-01-30', 8, 11, '2016-02-29', NULL, '70.00', 1, 1, '2016-01-30', 1, '2016-01-30', 1, 'Ariandi Nugraha', 'ON GOING', 13, 1),
(12, '0015/KTM-SI/JAN/2016-A', '2016-01-30', 9, 12, NULL, NULL, '42.00', 1, 1, '2016-01-30', NULL, NULL, 1, NULL, 'ON GOING', 15, 2),
(13, '0014/KTM-SI/JAN/2016-A', '2016-01-30', 9, 12, NULL, NULL, '42.00', 1, 1, '2016-01-30', NULL, NULL, 1, NULL, 'ON GOING', 16, 2),
(14, '0017/KTM-SE/JAN/2016-A', '2016-01-30', 7, 6, NULL, NULL, '70.00', 1, 1, '2016-01-30', NULL, NULL, 1, NULL, 'ON GOING', 17, 1),
(15, '0018/KTM-SE/FEB/2016-A', '2016-02-02', 10, 7, NULL, NULL, '35.00', 1, 1, '2016-02-02', NULL, NULL, 1, NULL, 'ON GOING', 18, 1),
(16, '0018/KTM-SE/FEB/2016-A', '2016-02-02', 10, 7, NULL, NULL, '0.00', 1, 1, '2016-02-02', NULL, NULL, 1, NULL, 'ON GOING', 19, 1),
(17, '0020/KTM-SE/FEB/2016-A', '2016-02-02', 10, 7, NULL, NULL, '0.00', 1, 1, '2016-02-02', NULL, NULL, 1, NULL, 'ON GOING', 20, 1),
(18, '0021/KTM-SE/FEB/2016-A', '2016-02-02', 10, 7, NULL, NULL, '0.00', 1, 1, '2016-02-02', NULL, NULL, 1, NULL, 'ON GOING', 21, 1),
(19, '0022/KTM-SE/FEB/2016-A', '2016-02-02', 10, 7, NULL, NULL, '0.00', 1, 1, '2016-02-02', NULL, NULL, 1, NULL, 'ON GOING', 22, 1),
(20, '0023/KTM-SE/FEB/2016-A', '2016-02-02', 10, 7, NULL, NULL, '0.00', 1, 1, '2016-02-02', NULL, NULL, 1, NULL, 'ON GOING', 23, 1),
(21, '0024/KTM-SE/FEB/2016-A', '2016-02-02', 10, 7, NULL, NULL, '0.00', 1, 1, '2016-02-02', NULL, NULL, 1, NULL, 'ON GOING', 24, 1),
(22, '0025/KTM-SE/FEB/2016-A', '2016-02-02', 10, 7, NULL, NULL, '0.00', 1, 1, '2016-02-02', NULL, NULL, 1, NULL, 'ON GOING', 25, 1),
(23, '0026/KTM-SE/FEB/2016-A', '2016-02-02', 10, 7, NULL, NULL, '0.00', 1, 1, '2016-02-02', NULL, NULL, 1, NULL, 'ON GOING', 26, 1),
(24, '0027/KTM-SE/FEB/2016-A', '2016-02-02', 10, 7, NULL, NULL, '0.00', 1, 1, '2016-02-02', NULL, NULL, 1, NULL, 'ON GOING', 27, 1),
(25, '0028/KTM-SI/FEB/2016-A', '2016-02-02', 11, 13, NULL, NULL, '0.00', 1, 1, '2016-02-02', NULL, NULL, 1, NULL, 'ON GOING', 28, 2);

-- --------------------------------------------------------

--
-- Table structure for table `creditnotedet`
--

CREATE TABLE IF NOT EXISTS `creditnotedet` (
`creditnotedet_id` int(11) NOT NULL,
  `creditnote_id` int(11) NOT NULL,
  `costing` varchar(255) NOT NULL,
  `amount` decimal(16,2) NOT NULL,
  `insert_by` int(11) NOT NULL,
  `insert_date` date NOT NULL,
  `update_by` int(11) DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `active` int(1) DEFAULT '1'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `creditnotedet`
--

INSERT INTO `creditnotedet` (`creditnotedet_id`, `creditnote_id`, `costing`, `amount`, `insert_by`, `insert_date`, `update_by`, `update_date`, `active`) VALUES
(5, 8, 'AFR SYSTEMS AT AGENT', '35.00', 1, '2015-11-28', NULL, NULL, 1),
(4, 8, 'FREIGHT', '300.00', 1, '2015-11-28', NULL, NULL, 1),
(6, 8, 'AMS', '50.00', 1, '2015-11-28', NULL, NULL, 1),
(7, 9, 'Test Costing 1', '35.00', 1, '2016-01-24', NULL, NULL, 1),
(8, 10, 'Test Costing 1', '35.00', 1, '2016-01-30', NULL, NULL, 1),
(9, 10, 'Test Costing 2', '35.00', 1, '2016-01-30', NULL, NULL, 1),
(10, 11, 'Test Costing 1', '35.00', 1, '2016-01-30', NULL, NULL, 1),
(11, 11, 'Test Costing 3', '35.00', 1, '2016-01-30', NULL, NULL, 1),
(12, 12, 'Test Costing 1', '35.00', 1, '2016-01-30', NULL, NULL, 1),
(13, 12, 'Test Costing 3', '7.00', 1, '2016-01-30', NULL, NULL, 1),
(14, 13, 'Test Costing 1', '35.00', 1, '2016-01-30', NULL, NULL, 1),
(15, 13, 'Test Costing 3', '7.00', 1, '2016-01-30', NULL, NULL, 1),
(16, 14, 'Test Costing 1', '35.00', 1, '2016-01-30', NULL, NULL, 1),
(17, 14, 'Test Costing 2', '35.00', 1, '2016-01-30', NULL, NULL, 1),
(18, 15, 'Test Costing 1', '35.00', 1, '2016-02-02', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `debitnote`
--

CREATE TABLE IF NOT EXISTS `debitnote` (
`debitnote_id` int(11) NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `invoice_date` date DEFAULT NULL,
  `jobs_id` int(11) NOT NULL,
  `bl_id` int(11) NOT NULL,
  `due_date` date DEFAULT NULL,
  `term` varchar(255) DEFAULT NULL,
  `tot_amount` decimal(16,2) DEFAULT NULL,
  `companyid` int(11) DEFAULT NULL,
  `insert_by` int(11) NOT NULL,
  `insert_date` date NOT NULL,
  `update_by` int(11) DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `sign` varchar(255) DEFAULT NULL,
  `status` enum('ON GOING','FINISH','CANCEL') NOT NULL DEFAULT 'ON GOING',
  `invoice_id` int(11) NOT NULL,
  `kindofexport` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `debitnote`
--

INSERT INTO `debitnote` (`debitnote_id`, `invoice_no`, `invoice_date`, `jobs_id`, `bl_id`, `due_date`, `term`, `tot_amount`, `companyid`, `insert_by`, `insert_date`, `update_by`, `update_date`, `active`, `sign`, `status`, `invoice_id`, `kindofexport`) VALUES
(10, '0001/KTM-SE/NOV/2015-A', '2015-11-28', 3, 5, '2015-12-31', NULL, '210.00', 4, 1, '2015-11-28', 1, '2015-12-02', 1, 'Ariandi Nugraha', 'ON GOING', 10, 1),
(11, '0011/KTM-SE/JAN/2016-A', '2016-01-24', 6, 10, '2016-01-31', NULL, '90.00', 1, 1, '2016-01-24', 1, '2016-01-24', 1, 'Ariandi Nugraha', 'ON GOING', 11, 2),
(12, '0012/KTM-SE/JAN/2016-A', '2016-01-30', 7, 6, NULL, NULL, '60.00', 1, 1, '2016-01-30', NULL, NULL, 1, NULL, 'ON GOING', 12, 1),
(13, '0013/KTM-SE/JAN/2016-A', '2016-01-30', 8, 11, '2016-02-29', NULL, '42.00', 1, 1, '2016-01-30', 1, '2016-01-30', 1, 'Ariandi Nugraha', 'ON GOING', 13, 1),
(14, '0015/KTM-SI/JAN/2016-A', '2016-01-30', 9, 12, NULL, NULL, '60.00', 1, 1, '2016-01-30', NULL, NULL, 1, NULL, 'ON GOING', 15, 2),
(15, '0014/KTM-SI/JAN/2016-A', '2016-01-30', 9, 12, NULL, NULL, '60.00', 1, 1, '2016-01-30', NULL, NULL, 1, NULL, 'ON GOING', 16, 2),
(16, '0017/KTM-SE/JAN/2016-A', '2016-01-30', 7, 6, NULL, NULL, '60.00', 1, 1, '2016-01-30', NULL, NULL, 1, NULL, 'ON GOING', 17, 1),
(17, '0018/KTM-SE/FEB/2016-A', '2016-02-02', 10, 7, NULL, NULL, '30.00', 1, 1, '2016-02-02', NULL, NULL, 1, NULL, 'ON GOING', 18, 1),
(18, '0018/KTM-SE/FEB/2016-A', '2016-02-02', 10, 7, NULL, NULL, '0.00', 1, 1, '2016-02-02', NULL, NULL, 1, NULL, 'ON GOING', 19, 1),
(19, '0020/KTM-SE/FEB/2016-A', '2016-02-02', 10, 7, NULL, NULL, '0.00', 1, 1, '2016-02-02', NULL, NULL, 1, NULL, 'ON GOING', 20, 1),
(20, '0021/KTM-SE/FEB/2016-A', '2016-02-02', 10, 7, NULL, NULL, '0.00', 1, 1, '2016-02-02', NULL, NULL, 1, NULL, 'ON GOING', 21, 1),
(21, '0022/KTM-SE/FEB/2016-A', '2016-02-02', 10, 7, NULL, NULL, '0.00', 1, 1, '2016-02-02', NULL, NULL, 1, NULL, 'ON GOING', 22, 1),
(22, '0023/KTM-SE/FEB/2016-A', '2016-02-02', 10, 7, NULL, NULL, '35.00', 1, 1, '2016-02-02', NULL, NULL, 1, NULL, 'ON GOING', 23, 1),
(23, '0024/KTM-SE/FEB/2016-A', '2016-02-02', 10, 7, NULL, NULL, '35.00', 1, 1, '2016-02-02', NULL, NULL, 1, NULL, 'ON GOING', 24, 1),
(24, '0025/KTM-SE/FEB/2016-A', '2016-02-02', 10, 7, NULL, NULL, '0.00', 1, 1, '2016-02-02', NULL, NULL, 1, NULL, 'ON GOING', 25, 1),
(25, '0026/KTM-SE/FEB/2016-A', '2016-02-02', 10, 7, NULL, NULL, '35.00', 1, 1, '2016-02-02', NULL, NULL, 1, NULL, 'ON GOING', 26, 1),
(26, '0027/KTM-SE/FEB/2016-A', '2016-02-02', 10, 7, NULL, NULL, '35.00', 1, 1, '2016-02-02', NULL, NULL, 1, NULL, 'ON GOING', 27, 1),
(27, '0028/KTM-SI/FEB/2016-A', '2016-02-02', 11, 13, NULL, NULL, '35.00', 1, 1, '2016-02-02', NULL, NULL, 1, NULL, 'ON GOING', 28, 2);

-- --------------------------------------------------------

--
-- Table structure for table `debitnotedet`
--

CREATE TABLE IF NOT EXISTS `debitnotedet` (
`debitnotedet_id` int(11) NOT NULL,
  `debitnote_id` int(11) NOT NULL,
  `costing` varchar(255) NOT NULL,
  `amount` decimal(16,2) NOT NULL,
  `insert_by` int(11) NOT NULL,
  `insert_date` date NOT NULL,
  `update_by` int(11) DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `active` int(1) DEFAULT '1'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `debitnotedet`
--

INSERT INTO `debitnotedet` (`debitnotedet_id`, `debitnote_id`, `costing`, `amount`, `insert_by`, `insert_date`, `update_by`, `update_date`, `active`) VALUES
(32, 10, 'Test Bill Shipper 3', '30.00', 1, '2015-11-28', NULL, NULL, 1),
(31, 10, 'AFR SYSTEMS AT AGENT', '30.00', 1, '2015-11-28', NULL, NULL, 1),
(30, 10, 'FREIGHT', '150.00', 1, '2015-11-28', NULL, NULL, 1),
(33, 11, 'Test Costing 1', '30.00', 1, '2016-01-24', NULL, NULL, 1),
(34, 11, 'Test Costing 1', '30.00', 1, '2016-01-24', NULL, NULL, 1),
(35, 11, 'Test Costing 1', '30.00', 1, '2016-01-24', NULL, NULL, 1),
(36, 12, 'Test Costing 1', '30.00', 1, '2016-01-30', NULL, NULL, 1),
(37, 12, 'Test Costing 2', '30.00', 1, '2016-01-30', NULL, NULL, 1),
(38, 13, 'Test Costing 1', '30.00', 1, '2016-01-30', NULL, NULL, 1),
(39, 13, 'Test Costing 2', '12.00', 1, '2016-01-30', NULL, NULL, 1),
(40, 14, 'Test Costing 1', '30.00', 1, '2016-01-30', NULL, NULL, 1),
(41, 14, 'Test Costing 2', '30.00', 1, '2016-01-30', NULL, NULL, 1),
(42, 15, 'Test Costing 1', '30.00', 1, '2016-01-30', NULL, NULL, 1),
(43, 15, 'Test Costing 2', '30.00', 1, '2016-01-30', NULL, NULL, 1),
(44, 16, 'Test Costing 1', '30.00', 1, '2016-01-30', NULL, NULL, 1),
(45, 16, 'Test Costing 2', '30.00', 1, '2016-01-30', NULL, NULL, 1),
(46, 17, 'Test Costing 1', '30.00', 1, '2016-02-02', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
`invoice_id` int(11) NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `invoice_date` date DEFAULT NULL,
  `jobs_id` int(11) NOT NULL,
  `bl_id` int(11) NOT NULL,
  `due_date` date DEFAULT NULL,
  `term` varchar(255) DEFAULT NULL,
  `tot_amount` decimal(16,2) DEFAULT NULL,
  `companyid` int(11) DEFAULT NULL,
  `insert_by` int(11) NOT NULL,
  `insert_date` date NOT NULL,
  `update_by` int(11) DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `sign` varchar(255) DEFAULT NULL,
  `status` enum('ON GOING','FINISH','CANCEL') NOT NULL DEFAULT 'ON GOING',
  `kindofexport` int(1) NOT NULL DEFAULT '1',
  `customer_id` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `invoice_no`, `invoice_date`, `jobs_id`, `bl_id`, `due_date`, `term`, `tot_amount`, `companyid`, `insert_by`, `insert_date`, `update_by`, `update_date`, `active`, `sign`, `status`, `kindofexport`, `customer_id`) VALUES
(10, '0001/KTM-SE/NOV/2015', '2015-11-28', 3, 5, '2015-12-31', NULL, '9048330.00', 1, 1, '2015-11-28', 1, '2015-11-29', 1, 'Test Person 10', 'ON GOING', 1, 0),
(11, '0011/KTM-SE/JAN/2016', '2016-01-24', 6, 10, '2016-01-24', NULL, '6923330.00', 1, 1, '2016-01-24', 1, '2016-01-24', 1, 'Ariandi Nugraha', 'ON GOING', 2, 0),
(17, '0017/KTM-SE/JAN/2016', '2016-01-30', 7, 6, '2016-02-29', NULL, '4823330.00', 1, 1, '2016-01-30', 1, '2016-01-30', 1, 'Ariandi Nugraha', 'ON GOING', 1, 4),
(13, '0013/KTM-SE/JAN/2016', '2016-01-30', 8, 11, '2016-02-29', NULL, '6631190.00', 1, 1, '2016-01-30', 1, '2016-01-30', 1, 'Fiorenzi D Kaori', 'ON GOING', 1, 3),
(16, '0014/KTM-SI/JAN/2016', '2016-01-30', 9, 12, '2016-02-29', NULL, '5327260.00', 1, 1, '2016-01-30', 1, '2016-01-30', 1, 'Ariandi Nugraha', 'FINISH', 2, 3),
(19, '0018/KTM-SE/FEB/2016', '2016-02-02', 10, 7, NULL, NULL, '4319400.00', 1, 1, '2016-02-02', NULL, NULL, 1, NULL, 'ON GOING', 1, 3),
(20, '0020/KTM-SE/FEB/2016', '2016-02-02', 10, 7, NULL, NULL, '4319400.00', 1, 1, '2016-02-02', NULL, NULL, 1, NULL, 'ON GOING', 1, 3),
(21, '0021/KTM-SE/FEB/2016', '2016-02-02', 10, 7, NULL, NULL, '4319400.00', 1, 1, '2016-02-02', NULL, NULL, 1, NULL, 'ON GOING', 1, 3),
(22, '0022/KTM-SE/FEB/2016', '2016-02-02', 10, 7, NULL, NULL, '4319400.00', 1, 1, '2016-02-02', NULL, NULL, 1, NULL, 'ON GOING', 1, 3),
(23, '0023/KTM-SE/FEB/2016', '2016-02-02', 10, 7, NULL, NULL, '4319400.00', 1, 1, '2016-02-02', NULL, NULL, 1, NULL, 'ON GOING', 1, 3),
(24, '0024/KTM-SE/FEB/2016', '2016-02-02', 10, 7, NULL, NULL, '4319400.00', 1, 1, '2016-02-02', NULL, NULL, 1, NULL, 'ON GOING', 1, 3),
(25, '0025/KTM-SE/FEB/2016', '2016-02-02', 10, 7, NULL, NULL, '4319400.00', 1, 1, '2016-02-02', NULL, NULL, 1, NULL, 'ON GOING', 1, 3),
(26, '0026/KTM-SE/FEB/2016', '2016-02-02', 10, 7, NULL, NULL, '4319400.00', 1, 1, '2016-02-02', NULL, NULL, 1, NULL, 'ON GOING', 1, 3),
(27, '0027/KTM-SE/FEB/2016', '2016-02-02', 10, 7, NULL, NULL, '4319400.00', 1, 1, '2016-02-02', NULL, NULL, 1, NULL, 'ON GOING', 1, 3),
(28, '0028/KTM-SI/FEB/2016', '2016-02-02', 11, 13, NULL, NULL, '4319400.00', 1, 1, '2016-02-02', NULL, NULL, 1, NULL, 'ON GOING', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_detail`
--

CREATE TABLE IF NOT EXISTS `invoice_detail` (
`invoicedet_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `costing` varchar(255) NOT NULL,
  `amount` decimal(16,2) NOT NULL,
  `insert_by` int(11) NOT NULL,
  `insert_date` date NOT NULL,
  `update_by` int(11) DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `active` int(1) DEFAULT '1'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=92 ;

--
-- Dumping data for table `invoice_detail`
--

INSERT INTO `invoice_detail` (`invoicedet_id`, `invoice_id`, `costing`, `amount`, `insert_by`, `insert_date`, `update_by`, `update_date`, `active`) VALUES
(60, 10, 'Test Costing 2', '800000.00', 1, '2015-11-28', NULL, NULL, 1),
(59, 10, 'Test Costing 1', '503930.00', 1, '2015-11-28', NULL, NULL, 1),
(58, 10, 'NAMA COSTING', '700000.00', 1, '2015-11-28', NULL, NULL, 1),
(57, 10, 'Test Bill Shipper 2', '700000.00', 1, '2015-11-28', NULL, NULL, 1),
(56, 10, 'Test Bill Shipper', '1500000.00', 1, '2015-11-28', NULL, NULL, 1),
(55, 10, 'AFR SYSTEMS AT AGENT', '525000.00', 1, '2015-11-28', NULL, NULL, 1),
(54, 10, 'FREIGHT', '4319400.00', 1, '2015-11-28', NULL, NULL, 1),
(61, 11, 'Test Costing 1', '4319400.00', 1, '2016-01-24', NULL, NULL, 1),
(62, 11, 'Test Costing 1', '503930.00', 1, '2016-01-24', NULL, NULL, 1),
(63, 11, 'Test Costing 1', '700000.00', 1, '2016-01-24', NULL, NULL, 1),
(64, 11, 'Test Costing 1', '800000.00', 1, '2016-01-24', NULL, NULL, 1),
(65, 11, 'Test Costing 1', '600000.00', 1, '2016-01-24', NULL, NULL, 1),
(66, 12, 'Test Costing 1', '4319400.00', 1, '2016-01-30', NULL, NULL, 1),
(67, 12, 'Test Costing 2', '503930.00', 1, '2016-01-30', NULL, NULL, 1),
(68, 13, 'Test Costing 1', '4319400.00', 1, '2016-01-30', NULL, NULL, 1),
(69, 13, 'Test Costing 2', '503930.00', 1, '2016-01-30', NULL, NULL, 1),
(70, 13, 'Test Costing 3', '800000.00', 1, '2016-01-30', NULL, NULL, 1),
(71, 13, 'Test Costing 3', '503930.00', 1, '2016-01-30', NULL, NULL, 1),
(72, 13, 'Test Costing 2', '503930.00', 1, '2016-01-30', NULL, NULL, 1),
(73, 15, 'Test Costing 1', '4319400.00', 1, '2016-01-30', NULL, NULL, 1),
(74, 15, 'Test Costing 2', '503930.00', 1, '2016-01-30', NULL, NULL, 1),
(75, 15, 'Test Costing 3', '503930.00', 1, '2016-01-30', NULL, NULL, 1),
(76, 16, 'Test Costing 1', '4319400.00', 1, '2016-01-30', NULL, NULL, 1),
(77, 16, 'Test Costing 2', '503930.00', 1, '2016-01-30', NULL, NULL, 1),
(78, 16, 'Test Costing 3', '503930.00', 1, '2016-01-30', NULL, NULL, 1),
(79, 17, 'Test Costing 1', '4319400.00', 1, '2016-01-30', NULL, NULL, 1),
(80, 17, 'Test Costing 2', '503930.00', 1, '2016-01-30', NULL, NULL, 1),
(81, 18, 'Test Costing 1', '4319400.00', 1, '2016-02-02', NULL, NULL, 1),
(82, 19, 'Test Costing 1', '4319400.00', 1, '2016-02-02', NULL, NULL, 1),
(83, 20, 'Test Costing 1', '4319400.00', 1, '2016-02-02', NULL, NULL, 1),
(84, 21, 'Test Costing 1', '4319400.00', 1, '2016-02-02', NULL, NULL, 1),
(85, 22, 'Test Costing 1', '4319400.00', 1, '2016-02-02', NULL, NULL, 1),
(86, 23, 'Test Costing 1', '4319400.00', 1, '2016-02-02', NULL, NULL, 1),
(87, 24, 'Test Costing 1', '4319400.00', 1, '2016-02-02', NULL, NULL, 1),
(88, 25, 'Test Costing 1', '4319400.00', 1, '2016-02-02', NULL, NULL, 1),
(89, 26, 'Test Costing 1', '4319400.00', 1, '2016-02-02', NULL, NULL, 1),
(90, 27, 'Test Costing 1', '4319400.00', 1, '2016-02-02', NULL, NULL, 1),
(91, 28, 'Test Costing 1', '4319400.00', 1, '2016-02-02', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jobsheet`
--

CREATE TABLE IF NOT EXISTS `jobsheet` (
`jobs_id` int(11) NOT NULL,
  `jobs_name` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `jobs_no` varchar(255) NOT NULL,
  `shipper` int(11) NOT NULL,
  `consignee` int(11) NOT NULL,
  `commodity` varchar(255) DEFAULT NULL,
  `po_sty` varchar(255) DEFAULT NULL,
  `ctn_qty` varchar(255) DEFAULT NULL,
  `dimensions` varchar(255) DEFAULT NULL,
  `destination` varchar(255) NOT NULL,
  `freight` varchar(255) DEFAULT NULL,
  `date_rcvd` date DEFAULT NULL,
  `pic` int(11) DEFAULT NULL,
  `telp_fax` varchar(255) DEFAULT NULL,
  `gross_w` varchar(255) DEFAULT NULL,
  `vol_w` varchar(255) DEFAULT NULL,
  `measurement` varchar(255) DEFAULT NULL,
  `overseas_agent` varchar(255) DEFAULT NULL,
  `handling` varchar(255) DEFAULT NULL,
  `mbl` varchar(255) NOT NULL,
  `hbl` varchar(255) NOT NULL,
  `fl` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `handling_by` varchar(255) DEFAULT NULL,
  `remarks2` varchar(255) DEFAULT NULL,
  `pickup` varchar(255) DEFAULT NULL,
  `delivery` varchar(255) DEFAULT NULL,
  `bl_id` int(11) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `status` enum('PENDING','FAILED','SUCCESS') DEFAULT NULL,
  `insert_by` int(11) NOT NULL,
  `insert_date` date NOT NULL,
  `update_by` int(11) DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `prepain_by` varchar(255) DEFAULT NULL,
  `approve_by` varchar(255) DEFAULT NULL,
  `tot_expenses` decimal(16,2) NOT NULL DEFAULT '0.00',
  `tot_bill` decimal(16,2) NOT NULL DEFAULT '0.00',
  `tot_profit` decimal(16,2) NOT NULL DEFAULT '0.00',
  `tot_usd` varchar(255) DEFAULT NULL,
  `tot_dn` decimal(16,2) NOT NULL DEFAULT '0.00',
  `tot_cn` decimal(16,2) NOT NULL DEFAULT '0.00',
  `kindofexport` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `jobsheet`
--

INSERT INTO `jobsheet` (`jobs_id`, `jobs_name`, `date`, `jobs_no`, `shipper`, `consignee`, `commodity`, `po_sty`, `ctn_qty`, `dimensions`, `destination`, `freight`, `date_rcvd`, `pic`, `telp_fax`, `gross_w`, `vol_w`, `measurement`, `overseas_agent`, `handling`, `mbl`, `hbl`, `fl`, `remarks`, `handling_by`, `remarks2`, `pickup`, `delivery`, `bl_id`, `active`, `status`, `insert_by`, `insert_date`, `update_by`, `update_date`, `prepain_by`, `approve_by`, `tot_expenses`, `tot_bill`, `tot_profit`, `tot_usd`, `tot_dn`, `tot_cn`, `kindofexport`) VALUES
(3, 'HIMALAYA - NGO', '2015-11-22', '0001/KTM-SE/NOV/2015', 2, 3, 'NBK PULLEY', '', '1X20', '', 'NAGOYA, JAPAN', 'COLLECT', '2015-11-22', 6, '', '9,417.50 KGS', '', '15780 M3', '', '', 'HAS80AC95000M00', 'KTM-0001-NGY', 'FORTUNE TRADER 0080N', 'ETD : 17.09.2015', 'SCS / SHPR / MKU / MKL', 'AGENG : BEST SHIPPING', '', '', 5, 1, 'SUCCESS', 1, '2015-11-22', 1, '2015-11-22', 'Ariandi Nugraha', 'Ariandi Nugraha', '5968355.00', '10348330.00', '4379975.00', '405.99 / 424.972 / 0', '424.97', '30.00', 1),
(6, 'Singapore - Jakarta', '2016-01-23', '0004/KTM-SI/JAN/2016', 2, 3, 'Apa aja', '123', '123', '123', 'Jakarta', 'Apa ajah', '2016-01-23', 8, '123', '123', '123', '123', '111', '123', 'KODEMBL', 'KTM-0008-ABC', 'aaaa', '123', 'aaa', '123', 'aaa', 'aaa', 10, 1, 'SUCCESS', 1, '2016-01-17', 1, '2016-01-30', 'Ariandi Nugraha', 'Ariandi Nugraha', '2270000.00', '6923330.00', '4653330.00', '150 / 147 / 0', '147.00', '0.00', 2),
(7, 'JAKARTA - PRANCIS', '2016-01-31', '0007/KTM-SE/JAN/2016', 4, 3, 'Apa aja', '123', '1X20', '123', 'NAGOYA, JAPAN', 'Apa ajah', '2016-01-30', 6, '123', '9,417.50 KGS', '123', '123', '', '123', '123ert1234wrert', 'KTM-0006-WEW', 'Wedew112', 'ASD', 'ASD', 'ASD', 'aaa', 'aaa', 6, 1, 'SUCCESS', 1, '2016-01-30', 1, '2016-01-30', 'Ariandi Nugraha', 'Ariandi Nugraha', '435000.00', '4823330.00', '4388330.00', '60 / 70 / 0', '70.00', '0.00', 1),
(8, 'JAKARTA - SINGAPORE', '2016-01-31', '0008/KTM-SE/JAN/2016', 3, 4, 'Apa aja', '123', '1X20', '123', 'Singapore', 'Apa ajah', '2016-01-31', 1, '123', '192', '', '22', '111', '123', '123qwerasd', 'KTM-0011-SING', 'Truck', '123', 'ASD', 'ASD', 'aaa', 'aaa', 11, 1, 'SUCCESS', 1, '2016-01-30', 1, '2016-01-30', 'Ariandi Nugraha', 'Ariandi Nugraha', '1914000.00', '6631190.00', '4717190.00', '132 / 175 / 0', '175.00', '0.00', 1),
(9, 'Malaysia - Jakarta', '2016-01-31', '0009/KTM-SI/JAN/2016', 4, 3, 'Apa aja', '123', '123', '123', 'Indonesia', 'Apa ajah', '2016-01-19', 1, '123', '-', '', '22', '111', '123', '123123', 'KTM-0012-JKT', '111', 'ASD', 'ASD', 'ASD', 'aaa', 'aaa', 12, 1, 'SUCCESS', 1, '2016-01-30', 1, '2016-01-30', 'Ariandi Nugraha', 'Ariandi Nugraha', '1305000.00', '5327260.00', '4022260.00', '90 / 77 / 0', '77.00', '0.00', 2),
(10, 'Singapore - Jakarta', '2016-02-29', '0010/KTM-SE/FEB/2016', 3, 4, 'Apa aja', '123', '1X20', '123', 'FUJI JAPAN', 'Apa ajah', '2016-02-02', 2, '123', '9,417.50 KGS', '123', '123', 'BEST SHIPPING INC. TOKYO', '123', 'BBBBB', 'KTM-0007-FUJI', 'TJKKB BBN', '123', 'ASD', 'ASD', 'aaa', 'aaa', 7, 1, 'SUCCESS', 1, '2016-02-02', 1, '2016-02-06', 'Ariandi Nugraha', 'Ariandi Nugraha', '500000.00', '1600000.00', '1100000.00', '50 / 160 / 0', '160.00', '0.00', 1),
(11, 'Singapore - Jakarta', '2016-02-29', '0011/KTM-SI/FEB/2016', 1, 3, 'Apa aja', '123', '123', '123', 'Indonesia', 'Apa ajah', '2016-02-29', 1, '123', '123', '123', '123', 'BEST SHIPPING INC. TOKYO', '123', '1234', 'KTM-0013-JKT', '111', '123', 'ASD', 'ASD', 'aaa', 'aaa', 13, 1, 'SUCCESS', 1, '2016-02-02', 1, '2016-02-06', 'Ariandi Nugraha', 'Ariandi Nugraha', '450000.00', '684000.00', '234000.00', '40 / 85 / 0', '85.00', '0.00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `jobsheetdet`
--

CREATE TABLE IF NOT EXISTS `jobsheetdet` (
`jobsdet_id` int(11) NOT NULL,
  `jobs_id` int(11) NOT NULL,
  `costing` varchar(255) DEFAULT NULL,
  `bill_cost` varchar(255) DEFAULT NULL,
  `bill_shipper` varchar(255) DEFAULT NULL,
  `bil_agent` varchar(255) DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `insert_by` int(11) NOT NULL,
  `insert_date` date NOT NULL,
  `update_by` int(11) DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `invoice_db_cr` enum('INVOICE','DEBIT NOTE','CREDIT NOTE') NOT NULL,
  `inv` int(1) NOT NULL DEFAULT '0',
  `dbn` int(1) NOT NULL DEFAULT '0',
  `crn` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `jobsheetdet`
--

INSERT INTO `jobsheetdet` (`jobsdet_id`, `jobs_id`, `costing`, `bill_cost`, `bill_shipper`, `bil_agent`, `active`, `insert_by`, `insert_date`, `update_by`, `update_date`, `invoice_db_cr`, `inv`, `dbn`, `crn`) VALUES
(10, 3, 'FREIGHT', '14500 / 150.00 / 2175000', '(Kurs Rp.14398 ) / 14500 / 4319400.00', '14500 / 300.00 / 4350000', 1, 1, '2015-11-22', 1, '2015-11-27', 'DEBIT NOTE', 1, 1, 1),
(11, 3, 'Test Debit Note', '0 / 0 / 0', '0 / 0 / 0', '14500 / 4.972 / 72094', 1, 1, '2015-11-22', 1, '2015-11-27', 'DEBIT NOTE', 0, 0, 0),
(13, 3, 'AFR SYSTEMS AT AGENT', '14500 / 30.00 / 435000', '0 / 0 / 525000', '14500 / 35.00 / 507500', 1, 1, '2015-11-22', 1, '2015-11-28', 'INVOICE', 1, 1, 1),
(14, 3, 'Test Bill Shipper', '14500 / 30.00 / 435000', '0 / 0 / 1500000', '14500 / 0 / 0', 1, 1, '2015-11-26', 1, '2015-11-28', 'INVOICE', 1, 0, 0),
(15, 3, 'Test Bill Shipper 2', '14500 / 30.00 / 435000', '0 / 0 / 700000', '14500 / 0 / 0', 1, 1, '2015-11-26', 1, '2015-11-28', 'INVOICE', 1, 0, 0),
(16, 3, 'Test Bill Shipper 3', '14500 / 30.00 / 435000', '0 / 0 / 600000', '14500 / 0 / 0', 1, 1, '2015-11-26', 1, '2015-11-28', 'INVOICE', 0, 1, 0),
(17, 3, 'NAMA COSTING', '14500 / 40.99 / 594355', '0 / 0 / 700000', '0 / 0 / 0', 1, 1, '2015-11-26', 1, '2015-11-28', 'INVOICE', 1, 0, 0),
(18, 3, 'AMS', '14500 / 40.00 / 580000', '0 / 0 / 700000', '14500 / 50.00 / 725000', 1, 1, '2015-11-26', 1, '2015-11-28', 'INVOICE', 0, 0, 1),
(19, 3, 'Test Costing 1', '14500 / 30.00 / 435000', '0 / 0 / 503930', '14500 / 35.00 / 507500', 1, 1, '2015-11-27', 1, '2015-11-28', 'INVOICE', 1, 0, 0),
(20, 3, 'Test Costing 2', '14500 / 25.00 / 444000', '0 / 0 / 800000', '0 / 0 / 0', 1, 1, '2015-11-27', NULL, NULL, 'INVOICE', 1, 0, 0),
(21, 4, NULL, NULL, NULL, NULL, 1, 1, '2016-01-17', NULL, NULL, 'INVOICE', 0, 0, 0),
(22, 5, NULL, NULL, NULL, NULL, 1, 1, '2016-01-17', NULL, NULL, 'INVOICE', 0, 0, 0),
(23, 6, 'Test Costing 1', '14500 / 30.00 / 435000', '(Kurs Rp.14398 ) / 14500 / 4319400.00', '14500 / 35.00 / 507500', 1, 1, '2016-01-17', 1, '2016-01-23', 'INVOICE', 1, 1, 1),
(24, 6, 'Test Costing 1', '14500 / 30.00 / 435000', '0 / 0 / 503930', '14500 / 35.00 / 507500', 1, 1, '2016-01-23', 1, '2016-01-23', 'INVOICE', 1, 0, 0),
(25, 6, 'Test Costing 1', '14500 / 30.00 / 400000', '0 / 0 / 700000', '14500 / 7.00 / 101500', 1, 1, '2016-01-23', NULL, NULL, 'INVOICE', 1, 1, 0),
(26, 6, 'Test Costing 1', '14500 / 30.00 / 400000', '0 / 0 / 800000', '14500 / 35.00 / 507500', 1, 1, '2016-01-23', NULL, NULL, 'INVOICE', 1, 0, 0),
(27, 6, 'Test Costing 1', '14500 / 30.00 / 600000', '0 / 0 / 600000', '6000 / 35.00 / 210000', 1, 1, '2016-01-23', NULL, NULL, 'INVOICE', 1, 1, 0),
(28, 7, 'Test Costing 1', '14500 / 30.00 / 435000', '(Kurs Rp.14398 ) / 14500 / 4319400.00', '14500 / 35.00 / 507500', 1, 1, '2016-01-30', 1, '2016-01-30', 'INVOICE', 1, 1, 1),
(29, 7, 'Test Costing 2', '14500 / 30.00 / 0', '0 / 0 / 503930', '14500 / 35.00 / 507500', 1, 1, '2016-01-30', NULL, NULL, 'INVOICE', 1, 1, 1),
(30, 8, 'Test Costing 1', '14500 / 30.00 / 435000', '(Kurs Rp.14398 ) / 14500 / 4319400.00', '14500 / 35.00 / 507500', 1, 1, '2016-01-30', 1, '2016-01-30', 'INVOICE', 1, 1, 1),
(31, 8, 'Test Costing 2', '14500 / 12.00 / 174000', '0 / 0 / 503930', '14500 / 35.00 / 507500', 1, 1, '2016-01-30', 1, '2016-01-30', 'INVOICE', 1, 1, 0),
(32, 8, 'Test Costing 3', '14500 / 30.00 / 435000', '0 / 0 / 800000', '14500 / 35.00 / 507500', 1, 1, '2016-01-30', 1, '2016-01-30', 'INVOICE', 1, 0, 1),
(33, 8, 'Test Costing 3', '14500 / 30.00 / 435000', '0 / 0 / 503930', '14500 / 35.00 / 507500', 1, 1, '2016-01-30', 1, '2016-01-30', 'INVOICE', 1, 0, 0),
(34, 8, 'Test Costing 2', '14500 / 30.00 / 435000', '0 / 0 / 503930', '14500 / 35.00 / 507500', 1, 1, '2016-01-30', NULL, NULL, 'INVOICE', 1, 0, 0),
(35, 9, 'Test Costing 1', '14500 / 30.00 / 435000', '(Kurs Rp.14398 ) / 14500 / 4319400.00', '14500 / 35.00 / 507500', 1, 1, '2016-01-30', 1, '2016-01-30', 'INVOICE', 1, 1, 1),
(36, 9, 'Test Costing 2', '14500 / 30.00 / 435000', '0 / 0 / 503930', '14500 / 35.00 / 507500', 1, 1, '2016-01-30', 1, '2016-01-30', 'INVOICE', 1, 1, 0),
(38, 9, 'Test Costing 3', '14500 / 30.00 / 435000', '0 / 0 / 503930', '14500 / 7.00 / 101500', 1, 1, '2016-01-30', NULL, NULL, 'INVOICE', 1, 0, 1),
(39, 10, 'Test Costing 1', '0 / 10.00 / 100000', '0 / 20.00 / 200000', '0 / 30.00 / 300000', 1, 1, '2016-02-02', 1, '2016-02-06', 'INVOICE', 1, 0, 0),
(40, 11, 'Test Costing 1', '0 / 10.00 / 100000', '0 / 20.00 / 250000', '0 / 35.00 / 34000', 1, 1, '2016-02-02', 1, '2016-02-06', 'INVOICE', 1, 0, 0),
(41, 10, 'Test Costing 2', '0 / 10.00 / 100000', '0 / 20.00 / 200000', '0 / 30.00 / 300000', 1, 1, '2016-02-06', 1, '2016-02-06', 'INVOICE', 1, 1, 1),
(42, 10, 'Test Costing 3', '0 / 30.00 / 300000', '0 / 30.00 / 300000', '0 / 30.00 / 300000', 1, 1, '2016-02-06', NULL, NULL, 'INVOICE', 1, 1, 0),
(43, 11, 'Test Costing 2', '0 / 30.00 / 350000', '0 / 20.00 / 250000', '0 / 10.00 / 150000', 1, 1, '2016-02-06', NULL, NULL, 'INVOICE', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kindexport`
--

CREATE TABLE IF NOT EXISTS `kindexport` (
`kindexport_id` int(11) NOT NULL,
  `kindexport_name` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `kindexport`
--

INSERT INTO `kindexport` (`kindexport_id`, `kindexport_name`) VALUES
(1, 'Sea Export'),
(2, 'Sea Import'),
(3, 'Flight Export'),
(4, 'Flight Import');

-- --------------------------------------------------------

--
-- Table structure for table `mediastorage`
--

CREATE TABLE IF NOT EXISTS `mediastorage` (
`MediaStorageID` int(11) NOT NULL,
  `MediaID` int(11) NOT NULL DEFAULT '0',
  `ImageName` varchar(255) DEFAULT NULL,
  `Path` varchar(255) DEFAULT NULL,
  `Href` varchar(255) DEFAULT NULL,
  `Active` int(11) NOT NULL DEFAULT '1',
  `TableFrom` varchar(255) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `mediastorage`
--

INSERT INTO `mediastorage` (`MediaStorageID`, `MediaID`, `ImageName`, `Path`, `Href`, `Active`, `TableFrom`) VALUES
(1, 0, 'Test', 'uploads/test_09-24-2015-04-11-34.jpg', NULL, 1, NULL),
(6, 3, 'slide1', 'uploads/slide1_10-30-2015-07-30-36.jpg', '', 1, 'node'),
(7, 3, 'slide2', 'uploads/slide2_10-30-2015-07-30-42.jpg', '', 1, NULL),
(8, 3, 'slide3', 'uploads/slide3_10-30-2015-07-30-49.jpg', '', 1, NULL),
(9, 3, 'slide4', 'uploads/slide4_10-30-2015-07-30-54.jpg', '', 1, NULL),
(10, 3, 'slide5', '', '', 0, NULL),
(11, 21, 'pu1', 'uploads/pu1_10-30-2015-09-18-09.jpg', '', 1, NULL),
(12, 21, 'pu2', 'uploads/pu2_10-30-2015-09-18-31.jpg', '', 1, NULL),
(13, 21, 'pu3', 'uploads/pu3_10-30-2015-09-18-44.jpg', '', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1442388920),
('m130524_201442_init', 1442388932);

-- --------------------------------------------------------

--
-- Table structure for table `node`
--

CREATE TABLE IF NOT EXISTS `node` (
`NodeID` int(11) NOT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Alias` varchar(255) DEFAULT NULL,
  `Description` text,
  `KeyWord` varchar(255) DEFAULT NULL,
  `ImageIDSmall` int(11) DEFAULT NULL,
  `ImageIDLarge` int(11) DEFAULT '0',
  `Active` int(11) DEFAULT NULL,
  `CreateDate` date DEFAULT NULL,
  `CreateBy` int(11) DEFAULT NULL,
  `UpdateDate` date DEFAULT NULL,
  `UpdateBy` int(11) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `node`
--

INSERT INTO `node` (`NodeID`, `Title`, `Alias`, `Description`, `KeyWord`, `ImageIDSmall`, `ImageIDLarge`, `Active`, `CreateDate`, `CreateBy`, `UpdateDate`, `UpdateBy`) VALUES
(1, 'Home', 'home', '<h2>Selamat Datang di Topas Net</h2>\r\n\r\n<p>Selamat datang di Topas Net&nbsp;Selamat datang di Topas Net&nbsp;Selamat datang di Topas Net&nbsp;Selamat datang di Topas Net&nbsp;Selamat datang di Topas Net&nbsp;Selamat datang di Topas Net&nbsp;Selamat datang di Topas Net&nbsp;Selamat datang di Topas Net&nbsp;Selamat datang di Topas Net</p>\r\n', 'Home', NULL, 0, 1, '2015-04-28', 1, '2015-10-30', 1),
(2, 'Menu', 'menu', 'menu', 'menu', NULL, 0, 1, '2015-09-23', 1, '2015-09-23', 1),
(3, 'Slider', 'slider', '<p>Slider</p>\r\n', 'Slider', NULL, 0, 1, '2015-09-23', 1, '2015-09-24', 1),
(5, 'Sosial Media', 'sosial_media', '', NULL, NULL, 0, 1, '2015-09-23', 1, '2015-09-24', 1),
(6, 'Tentang Kami', 'tentang_kami', '<p>wedew</p>\r\n', NULL, NULL, 0, 1, '2015-09-23', 1, '2015-10-30', 1),
(7, 'Servis', 'servis', NULL, NULL, NULL, 0, 1, '2015-09-23', 1, '2015-09-23', 1),
(8, 'Hubungi Kami', 'hubungi_kami', NULL, NULL, NULL, 0, 1, '2015-09-23', 1, '2015-09-23', 1),
(9, 'Tanya Topas', 'tanya_topas', NULL, NULL, NULL, 0, 1, '2015-09-23', 1, '2015-09-23', 1),
(10, 'aaa', 'aaa', '<p>aaaa</p>\r\n', NULL, NULL, 0, 0, '2015-09-22', 1, '2015-09-22', 1),
(11, 'bbb', 'bbb', '<p>bbb</p>\r\n', NULL, NULL, 0, 0, '2015-09-22', 1, '2015-09-22', 1),
(12, 'ccc', 'ccc', '<p>ccc</p>\r\n', NULL, NULL, 0, 0, '2015-09-22', 1, '2015-09-22', 1),
(13, 'ccc', 'ccc', '<p>ccc</p>\r\n', NULL, NULL, 0, 0, '2015-09-22', 1, '2015-09-22', 1),
(14, 'ccc', 'ccc', '<p>ccc</p>\r\n', NULL, NULL, 0, 0, '2015-09-22', 1, '2015-09-22', 1),
(15, 'Servis Front', 'servis_front', '', NULL, NULL, 0, 0, '2015-09-24', 1, '2015-09-24', 1),
(16, 'Servis Front', 'servis_front', '', NULL, NULL, 0, 0, '2015-09-24', 1, '2015-09-24', 1),
(17, 'Servis Front', 'servis_front', '', NULL, NULL, 0, 1, '2015-09-24', 1, '2015-09-24', 1),
(18, 'Test', 'test', '<p>wedew</p>\r\n', NULL, NULL, NULL, 0, '2015-09-24', 1, '2015-09-24', 1),
(19, 'tuii', '123', '<p>132132</p>\r\n', NULL, NULL, NULL, 0, '2015-09-24', 1, '2015-09-24', 1),
(20, 'Test', 'tessstttt', '<p>wooowwww</p>\r\n', NULL, NULL, 3, 0, '2015-09-24', 1, '2015-10-30', 1),
(21, 'Product Unggulan', 'product_unggulan', '', NULL, NULL, 0, 1, '2015-10-30', 1, '2015-10-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nodestructure`
--

CREATE TABLE IF NOT EXISTS `nodestructure` (
`NodeStructureID` int(11) NOT NULL,
  `NodeChildID` int(11) DEFAULT NULL,
  `NodeParentID` int(11) DEFAULT NULL,
  `Active` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `nodestructure`
--

INSERT INTO `nodestructure` (`NodeStructureID`, `NodeChildID`, `NodeParentID`, `Active`, `priority`) VALUES
(1, 1, 2, 1, 1),
(2, 2, 0, 1, 1),
(3, 3, 0, 1, 2),
(4, 5, 0, 1, NULL),
(5, 6, 2, 1, NULL),
(6, 7, 2, 1, NULL),
(7, 8, 2, 1, NULL),
(8, 9, 2, 1, NULL),
(9, 15, 0, 0, NULL),
(10, 16, 0, 0, NULL),
(11, 17, 0, 1, NULL),
(14, 18, 0, 0, NULL),
(15, 19, 0, 0, NULL),
(16, 20, 0, 0, NULL),
(17, 21, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
`payment_id` int(11) NOT NULL,
  `payment_number` varchar(255) NOT NULL,
  `payment_date` date NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `total_amount` decimal(16,2) NOT NULL DEFAULT '0.00',
  `note` text,
  `active` int(1) NOT NULL DEFAULT '1',
  `insert_by` int(11) NOT NULL,
  `insert_date` date NOT NULL,
  `update_by` int(11) DEFAULT NULL,
  `update_date` date DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_number`, `payment_date`, `invoice_id`, `total_amount`, `note`, `active`, `insert_by`, `insert_date`, `update_by`, `update_date`) VALUES
(7, '0006/KTM-PAY/JAN/2016', '2016-02-01', 13, '2000000.00', 'Coba 1', 1, 1, '2016-01-31', NULL, NULL),
(8, '0008/KTM-PAY/JAN/2016', '2016-02-02', 16, '1100000.00', 'Coba lagi', 1, 1, '2016-01-31', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `paymentdet`
--

CREATE TABLE IF NOT EXISTS `paymentdet` (
`paymentdet_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `payment_name` varchar(255) NOT NULL,
  `amount` decimal(16,2) NOT NULL,
  `insert_by` int(11) NOT NULL,
  `insert_date` date NOT NULL,
  `update_by` int(11) DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `active` int(1) DEFAULT '1'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `paymentdet`
--

INSERT INTO `paymentdet` (`paymentdet_id`, `payment_id`, `payment_name`, `amount`, `insert_by`, `insert_date`, `update_by`, `update_date`, `active`) VALUES
(3, 4, 'Payment ke 1', '1000000.00', 1, '2016-01-24', 1, '2016-01-30', 1),
(4, 4, 'Payment ke 2', '500000.00', 1, '2016-01-24', 1, '2016-01-30', 1),
(5, 5, 'Payment ke 1_tes', '1500000.00', 1, '2016-01-30', 1, '2016-01-30', 1),
(6, 5, 'Payment ke 2', '100000.00', 1, '2016-01-30', 1, '2016-01-30', 1),
(7, 5, 'Payment ke 3', '2000000.00', 1, '2016-01-30', 1, '2016-01-30', 1),
(8, 6, 'Payment ke 1', '1500000.00', 1, '2016-01-30', NULL, NULL, 1),
(9, 7, 'Payment ke 1', '1500000.00', 1, '2016-01-31', NULL, NULL, 1),
(10, 7, 'Payment ke 2', '500000.00', 1, '2016-01-31', NULL, NULL, 1),
(11, 8, 'Payment ke 1', '1000000.00', 1, '2016-01-31', NULL, NULL, 1),
(12, 8, 'Payment ke 2', '100000.00', 1, '2016-01-31', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `port`
--

CREATE TABLE IF NOT EXISTS `port` (
`port_id` int(11) NOT NULL,
  `port_name` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `port`
--

INSERT INTO `port` (`port_id`, `port_name`) VALUES
(1, 'TG. PRIOK, JAKARTA, INDONESIA');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`posts_id` int(11) NOT NULL,
  `post_title` varchar(100) DEFAULT NULL,
  `post_description` mediumtext,
  `author_id` int(11) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`posts_id`, `post_title`, `post_description`, `author_id`) VALUES
(1, 'Ini Plajaran Pertama', 'Ini pelajaran gimana yah, pusing saya sebenrnya, ah yang bener\r\nayo ayo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE IF NOT EXISTS `quotation` (
`quotationid` int(11) NOT NULL,
  `quotationtitle` varchar(255) DEFAULT NULL,
  `picto` int(11) NOT NULL DEFAULT '0',
  `picfrom` int(11) NOT NULL DEFAULT '1',
  `companyid` int(11) NOT NULL,
  `quotationdate` date NOT NULL,
  `senderreerence` varchar(20) NOT NULL,
  `createby` int(11) NOT NULL,
  `createdate` date NOT NULL,
  `updateby` int(11) NOT NULL,
  `updatedate` date NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `status` varchar(20) NOT NULL,
  `portofloading` varchar(255) NOT NULL,
  `freightageofpayment` varchar(255) DEFAULT NULL,
  `commodity` varchar(255) DEFAULT NULL,
  `termofshipment` varchar(255) DEFAULT NULL,
  `validdate` date NOT NULL,
  `termofpayment` varchar(50) NOT NULL,
  `kindofexport` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `quotation`
--

INSERT INTO `quotation` (`quotationid`, `quotationtitle`, `picto`, `picfrom`, `companyid`, `quotationdate`, `senderreerence`, `createby`, `createdate`, `updateby`, `updatedate`, `active`, `status`, `portofloading`, `freightageofpayment`, `commodity`, `termofshipment`, `validdate`, `termofpayment`, `kindofexport`) VALUES
(1, 'FACSIMILI TRANSMITAL SHEET', 7, 1, 2, '2015-10-25', '1', 1, '2015-10-25', 1, '2015-11-01', 1, 'Success', 'Tg. Priok', 'Prepaid Jakarta', 'BRIKET', 'Port to port', '2015-10-31', 'PREPAID', 1),
(2, 'Test Quotation', 8, 1, 3, '2015-10-25', '1', 1, '2015-10-25', 1, '2015-11-07', 1, 'Success', 'Tj Priok, Jakarta', '', '', '', '2015-10-31', 'PREPAID', 1),
(3, 'Test Quotation Again', 8, 1, 2, '2015-10-26', '1', 1, '2015-10-26', 1, '2015-10-26', 1, 'Send', '', NULL, NULL, NULL, '2015-10-31', 'PREPAID', 1),
(4, 'Test Quotation Again 2', 8, 1, 2, '2015-10-26', '1', 1, '2015-10-26', 1, '2015-10-26', 1, 'Send', 'Tg. Priok', 'Prepaid Jakarta', 'BRIKET', 'Port to port', '2015-10-31', 'PREPAID', 1),
(5, 'Test Quotation Again 5', 8, 1, 2, '2015-10-29', '1', 1, '2015-10-29', 1, '2015-11-07', 1, 'Success', 'Tg. Priok', 'Prepaid Jakarta', 'BRIKET', 'Port to port', '2015-10-31', 'PREPAID', 1),
(6, 'Test Quotation Again 6', 19, 1, 3, '2015-10-31', '1', 1, '2015-10-31', 1, '2015-11-07', 0, 'Send', 'Tg. Priok', 'Prepaid Jakarta', 'BRIKET', 'Port to port', '2015-11-30', 'PREPAID', 1),
(7, 'FACSIMILI TRANSMITAL SHEET', 7, 1, 2, '2015-11-26', '1', 1, '2015-11-26', 1, '2015-11-26', 1, 'Success', 'Jakarta', 'Prepaid', 'Jakarta Cargo', 'Port to Port', '2015-11-30', 'Prepaid', 1),
(8, 'FACSIMILI TRANSMITAL SHEET bbb', 20, 1, 2, '2015-11-26', '-', 1, '2015-11-26', 1, '2015-11-27', 1, 'Success', 'Jakarta', 'Prepaid', 'Jakarta Cargo', 'Port to Port', '2015-12-30', 'Prepaid', 1),
(9, 'Test Sea Import 1', 8, 1, 2, '2016-01-10', '1', 1, '2016-01-10', 1, '2016-01-10', 1, 'Success', 'Via Port Klang', 'USD 400/20', '', '', '2016-01-31', 'Prepaid', 2),
(10, 'Test Pertama', 9, 1, 3, '2016-01-31', 'Test', 1, '2016-01-30', 1, '2016-01-30', 1, 'Success', 'Jakarta', 'USD 400/20', 'Aspal', 'Prepaid', '2016-02-29', 'Prepaid', 1),
(11, 'malaysia - indonesia', 11, 1, 3, '2016-01-30', '-', 1, '2016-01-30', 1, '2016-01-30', 1, 'Success', 'Jakarta', 'USD 400/20', 'Aspal', 'Prepaid', '2016-03-31', 'Prepaid', 2),
(12, 'Test Kedua', 9, 1, 3, '2016-02-29', '-', 1, '2016-02-02', 1, '2016-02-02', 1, 'Success', 'Jakarta', 'USD 400/20', 'Aspal', 'Prepaid', '2016-02-29', 'Prepaid', 2),
(13, 'Test Air Export', 9, 1, 3, '2016-02-06', '-', 1, '2016-02-06', 1, '2016-02-07', 1, 'Success', 'Jakarta', 'USD 400/20', 'Aspal', 'Prepaid', '2016-02-29', 'Prepaid', 3);

-- --------------------------------------------------------

--
-- Table structure for table `quotationdetail`
--

CREATE TABLE IF NOT EXISTS `quotationdetail` (
`quotationdetid` int(11) NOT NULL,
  `quotationid` int(11) NOT NULL,
  `cost` varchar(255) NOT NULL,
  `twentyft` decimal(16,2) DEFAULT '0.00',
  `fourtyft` decimal(16,2) DEFAULT '0.00',
  `fourtyhc` decimal(16,2) DEFAULT '0.00',
  `status` varchar(20) NOT NULL,
  `local_cost` decimal(16,2) DEFAULT '0.00'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `quotationdetail`
--

INSERT INTO `quotationdetail` (`quotationdetid`, `quotationid`, `cost`, `twentyft`, `fourtyft`, `fourtyhc`, `status`, `local_cost`) VALUES
(1, 1, 'Abu Dhabi', '12500000.00', '15000000.00', '16500000.00', 'Destination', NULL),
(2, 2, 'Afghanistan', '20000000.00', NULL, '40000000.00', 'Destination', NULL),
(3, 3, 'Singapore', '10000000.00', '20000000.00', '25000000.00', 'Destination', NULL),
(4, 4, 'Malaysia', '20000000.00', '40000000.00', '50000000.00', 'Destination', NULL),
(5, 4, 'Abu Dhabi', '30000000.00', '55000000.00', '60000000.00', 'Destination', NULL),
(6, 4, 'ADM', NULL, NULL, NULL, 'Local', '200000.00'),
(7, 4, 'BL FEE', NULL, NULL, NULL, 'Local', '200000.00'),
(8, 1, 'Argentina', '20000000.00', '40000000.00', '50000000.00', 'Destination', NULL),
(9, 1, 'Afghanistan', '10000000.00', '20000000.00', '30000000.00', 'Destination', NULL),
(10, 1, 'Albania', '10000000.00', '20000000.00', '30000000.00', 'Destination', NULL),
(11, 1, 'Angola', '20000000.00', '40000000.00', '30000000.00', 'Destination', NULL),
(12, 1, 'Bahrain', '30000000.00', '55000000.00', '60000000.00', 'Destination', NULL),
(13, 1, 'Brazil', '20000000.00', '40000000.00', '30000000.00', 'Destination', NULL),
(14, 1, 'Burundi', '20000000.00', '40000000.00', '60000000.00', 'Destination', NULL),
(15, 1, 'China', '10000000.00', '20000000.00', '30000000.00', 'Destination', NULL),
(16, 1, 'Denmark', '20000000.00', '40000000.00', '60000000.00', 'Destination', NULL),
(17, 1, 'Iran, Islamic Republic of', '20000000.00', '40000000.00', '60000000.00', 'Destination', NULL),
(18, 1, 'Admin Fee', NULL, NULL, NULL, 'Local', '200000.00'),
(19, 1, 'Apalagi Terserah', NULL, NULL, NULL, 'Local', '200000.00'),
(20, 1, 'Gibraltar', '10000000.00', '20000000.00', '25000000.00', 'Destination', NULL),
(24, 5, 'Australia', '10000000.00', '20000000.00', '25000000.00', 'Destination', NULL),
(25, 5, 'admin', NULL, NULL, NULL, 'Local', '200000.00'),
(30, 2, 'Abu Dhabi', '1111.00', '1111.00', '111.00', 'Destination', NULL),
(31, 7, 'Singapore', '200000.00', '400000.00', '800000.00', 'Destination', NULL),
(32, 7, 'Malaysia', '500000.00', '600000.00', '700000.00', 'Destination', NULL),
(33, 7, 'Admin Fee', NULL, NULL, NULL, 'Local', '2000000.00'),
(34, 7, 'Apalagi Terserah', NULL, NULL, NULL, 'Local', '200000.00'),
(35, 7, 'Malaysia, Port Klang', '400000.00', '600000.00', '700000.00', 'Destination', NULL),
(36, 8, 'Singapore', '200000.00', '400000.00', '700000.00', 'Destination', NULL),
(37, 8, 'Biaya Admin', NULL, NULL, NULL, 'Local', '200000.00'),
(38, 9, 'Test Barang 1', '1000000.00', '2000000.00', '3000000.00', 'Destination', NULL),
(39, 9, 'Test Barang 2', '1000000.00', '2000000.00', '3000000.00', 'Destination', NULL),
(41, 10, 'Bangladesh', '1000000.00', '2000000.00', '3000000.00', 'Destination', NULL),
(42, 10, 'Austria', '1000000.00', '2000000.00', '3000000.00', 'Destination', NULL),
(43, 10, 'Biaya Admin', NULL, NULL, NULL, 'Local', '200000.00'),
(44, 10, 'Biaya Lain 2', NULL, NULL, NULL, 'Local', '100000.00'),
(45, 11, 'Jakarta', '1000000.00', '2000000.00', '3000000.00', 'Destination', NULL),
(46, 11, 'Biaya Admin', NULL, NULL, NULL, 'Local', '200000.00'),
(47, 11, 'Biaya Lain2', NULL, NULL, NULL, 'Local', '100000.00'),
(48, 13, 'Australia', '1000000.00', '2000000.00', '3000000.00', 'Destination', NULL),
(49, 13, 'Austria', '1000000.00', '2000000.00', '3000000.00', 'Destination', NULL),
(50, 13, 'Biaya Admin', NULL, NULL, NULL, 'Local', '200000.00'),
(51, 13, 'Biaya Lain - lain', NULL, NULL, NULL, 'Local', '150000.00');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
`roleid` int(11) NOT NULL,
  `rolename` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `createby` int(11) NOT NULL,
  `createdate` datetime NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleid`, `rolename`, `status`, `createby`, `createdate`) VALUES
(1, 'Owner', 1, 1, '2015-09-18 12:09:00'),
(2, 'Admin', 1, 1, '2015-09-21 07:09:06');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`idroles` int(11) NOT NULL,
  `rolesname` varchar(255) DEFAULT NULL,
  `createdate` date DEFAULT NULL,
  `updatedate` date DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`idroles`, `rolesname`, `createdate`, `updatedate`) VALUES
(1, 'admin', '2015-07-01', '2015-07-01'),
(2, 'user', '2015-07-01', '2015-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `rolestruc`
--

CREATE TABLE IF NOT EXISTS `rolestruc` (
`rolestrucid` int(11) NOT NULL,
  `roleid` int(11) NOT NULL,
  `personid` int(11) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rolestruc`
--

INSERT INTO `rolestruc` (`rolestrucid`, `roleid`, `personid`, `active`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_instruction`
--

CREATE TABLE IF NOT EXISTS `shipping_instruction` (
`si_id` int(11) NOT NULL,
  `no_ref` varchar(30) NOT NULL,
  `date` date DEFAULT NULL,
  `booking_number` varchar(50) DEFAULT NULL,
  `depo` varchar(100) DEFAULT NULL,
  `stucking` varchar(100) DEFAULT NULL,
  `topic` int(11) NOT NULL,
  `frompic` int(11) NOT NULL,
  `telp_fax` varchar(50) NOT NULL,
  `attn` int(11) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `shipper` int(11) NOT NULL,
  `consignee` int(11) NOT NULL,
  `notify_party` int(11) NOT NULL,
  `vessel` varchar(100) DEFAULT NULL,
  `connecting_vessel` varchar(100) DEFAULT NULL,
  `port_of_loading` varchar(100) DEFAULT NULL,
  `etd_jkt` date DEFAULT NULL,
  `eta_pus` date DEFAULT NULL,
  `via_transit` varchar(100) DEFAULT NULL,
  `etd_pus` varchar(100) DEFAULT NULL,
  `quantity` varchar(100) DEFAULT NULL,
  `freight_term` varchar(100) NOT NULL,
  `stuffing` date DEFAULT NULL,
  `gw_nw_cbm` varchar(100) DEFAULT NULL,
  `description_good` text,
  `cont_seal_no` varchar(100) DEFAULT NULL,
  `shipping_mark` varchar(100) DEFAULT NULL,
  `destination` varchar(100) DEFAULT NULL,
  `rate` varchar(100) DEFAULT NULL,
  `note` text,
  `peb_no` varchar(100) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `kpbc` varchar(100) DEFAULT NULL,
  `hs_code` varchar(100) DEFAULT NULL,
  `bl_no` varchar(50) DEFAULT NULL,
  `insertby` int(11) DEFAULT NULL,
  `insertdate` date DEFAULT NULL,
  `updateby` int(11) DEFAULT NULL,
  `updatedate` date DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `quotationid` int(11) NOT NULL,
  `status` enum('PENDING','FAILED','SUCCESS') NOT NULL,
  `eta_pod` date DEFAULT NULL,
  `kindofexport` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `shipping_instruction`
--

INSERT INTO `shipping_instruction` (`si_id`, `no_ref`, `date`, `booking_number`, `depo`, `stucking`, `topic`, `frompic`, `telp_fax`, `attn`, `email`, `shipper`, `consignee`, `notify_party`, `vessel`, `connecting_vessel`, `port_of_loading`, `etd_jkt`, `eta_pus`, `via_transit`, `etd_pus`, `quantity`, `freight_term`, `stuffing`, `gw_nw_cbm`, `description_good`, `cont_seal_no`, `shipping_mark`, `destination`, `rate`, `note`, `peb_no`, `tgl`, `kpbc`, `hs_code`, `bl_no`, `insertby`, `insertdate`, `updateby`, `updatedate`, `active`, `quotationid`, `status`, `eta_pod`, `kindofexport`) VALUES
(1, '0001/KTM-SE/NOV/2015', '2015-11-06', 'HAS80AC95000M00', 'GLORIUS', 'UTC 1', 7, 1, '021 -/021 -', 20, 'db_duabelas@yahoo.com', 1, 4, 4, 'FORTUNE TRADER 0080N', '-', 'TG. PRIOK, JAKARTA, INDONESIA', '2015-11-07', '2015-11-07', 'PUSAN', '-', '1X20', 'FREIGHT PREPAID', '2015-11-02', '9,417.50 KGS / 9,028.50 KGS / 15.78 CBM', '24 CASES <br />\r\n3,937 PCS OF NBK PULLEY', 'HALU2007290 / HAS349129', 'NBK-JAPAN CASE NO : 1-24', 'NAGOYA, JAPAN', '-', 'PLEASE GIVE CONTAINER GRADE A\r\nDONT ROLL OVER IN TRANSHIPMENT', '620404', '2015-11-07', '040300', '8483.50.00.00', 'HAS80AC95000M00', 1, '2015-11-01', 1, '2015-11-15', 1, 1, 'SUCCESS', NULL, 1),
(2, '0002/KTM-SE/NOV/2015', '2015-11-12', '123ert1234wrert', 'GLORIUS', 'UTC 1', 8, 1, '021 -/021 -', 8, 'db_duabelas@yahoo.com', 1, 2, 2, 'Wedew112', '-', 'TG. PRIOK, JAKARTA, INDONESIA', '2015-11-12', '2015-11-12', 'PUSAN', '-', '1X20', 'PREPAID', '2015-11-12', '9,417.50 KGS / 9,028.50 KGS / 15.78 CBM', 'Bagus dah barang nya', 'HALU2007290 / HAS349129', 'NBK-JAPAN CASE NO : 1-24', 'NAGOYA, JAPAN', '-', 'Wedew', '620404', '2015-11-12', '040300', '8483.50.00.00', '123ert1234wrert', 1, '2015-11-07', 1, '2015-11-12', 1, 5, 'SUCCESS', NULL, 1),
(3, '0003/KTM-SE/NOV/2015', '2015-11-26', 'GHGYG888GGH', 'FGH', 'FGH', 8, 1, '021-88887777/021-99998888', 11, 'db_duabelas@yahoo.com', 1, 3, 3, 'TJKKB BBN', '-', 'TG. PRIOK, JAKARTA, INDONESIA', '2015-11-27', '2015-11-30', 'DFGHGG', 'ZXC', '1X20', 'FREIGHT PREPAID', '2015-11-26', '9,417.50 KGS / 9,028.50 KGS / 15.78 CBM', 'WERVV BHHBHH', 'HALU2007290 / HAS349129', 'NBK-JAPAN CASE NO : 1-24 CCC', 'FUJI JAPAN', '-', 'HSGCHYSVSU HSBCHBSHCBS', 'DFDFDFD', '2015-11-26', 'DFDFDFD', 'DFDFDFFF', 'BBBBB', 1, '2015-11-07', 1, '2015-11-26', 1, 2, 'SUCCESS', NULL, 1),
(4, '0004/KTM-SE/NOV/2015', '2015-11-27', '123ert1234wrert', 'GLORIUS', 'UTC 1', 20, 1, '021 -/021 -', NULL, 'db_duabelas@yahoo.com', 1, 2, 2, 'FORTUNE TRADER 0080N', '-', 'TG. PRIOK, JAKARTA, INDONESIA', '2015-11-27', '2015-11-28', 'PUSAN', '-', '1X20', 'Prepaid', '2015-11-30', '9,417.50 KGS / 9,028.50 KGS / 15.78 CBM', 'wew apake deh', 'HALU2007290 / HAS349129', 'NBK-JAPAN CASE NO : 1-24', 'NAGOYA, JAPAN', '-', 'wedeew dfdf dfdfdf', '620404', '2015-11-27', '', '', '', 1, '2015-11-27', 1, '2015-11-27', 1, 8, 'PENDING', NULL, 1),
(5, '0005/KTM-SE/NOV/2015', '2015-11-27', 'HAS80AC95000M00', 'GLORIUS', 'UTC 1', 7, 1, '021 -/021 -', 19, 'db_duabelas@yahoo.com', 1, 2, 2, 'FORTUNE TRADER 0080N', '-', 'TG. PRIOK, JAKARTA, INDONESIA', '2015-11-27', '2015-11-28', 'PUSAN', '-', '1X20', 'Prepaid', '2015-11-30', '9,417.50 KGS / 9,028.50 KGS / 15.78 CBM', 'Apa ajah Boleh', 'HALU2007290 / HAS349129', 'NBK-JAPAN CASE NO : 1-24', 'NAGOYA, JAPAN', '-', 'Apa ajah dah', '620404', '2015-11-28', '040300', '8483.50.00.00', 'HAS80AC95000M00', 1, '2015-11-27', 1, '2015-11-27', 1, 7, 'PENDING', NULL, 1),
(6, '0006/KTM-SE/JAN/2016', '2016-01-31', 'wedew123', 'Mana tau', 'Au dah', 6, 1, '021-88887777 / 021-99998888', 1, 'db_duabelas@yahoo.com', 1, 3, 3, 'Truck', 'Apa bae', 'TG. PRIOK, JAKARTA, INDONESIA', '2016-01-31', '2016-02-29', 'Malaysia', '2016-02-06', '1X20', 'Prepaid', '2016-01-31', '192 / 120 / 222', 'Yang atas harus pake spasi bacaan nya', '123 / 123asd000', 'Akl', 'Singapore', '123', 'wedew', '213', '2016-01-31', '123', '000123qwerasd', '123qwerasd', 1, '2016-01-30', 1, '2016-02-06', 1, 10, 'SUCCESS', '2016-02-13', 1),
(7, '0007/KTM-AE/FEB/2016', '2016-02-07', '123QWERTY', 'TEST DEPO', 'TEST STUCKING', 6, 1, '021-88887777/021-99998888', 1, 'db_duabelas@yahoo.com', 1, 3, 3, 'TEST VESSEL', 'TEST CONN', 'TG. PRIOK, JAKARTA, INDONESIA', '2016-02-07', '2016-02-07', 'Ga Tau', '2016-02-08', '20', 'Prepaid', '2016-02-07', '10 KG / 12KG / 15 MS', 'WEDEWE APA BAE DAH', '123456/QWERTY', 'MARK', 'MANA AJA DAH', '123', 'AYO KIRIM', '', '2016-02-07', '123', '123QWERTY123', '123QWERTY123QWE', 1, '2016-02-07', 1, '2016-02-07', 1, 13, 'SUCCESS', '2016-02-09', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `FirstName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `LastName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `RoleID` int(11) DEFAULT NULL,
  `companyid` int(11) NOT NULL DEFAULT '0',
  `Role` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `FirstName`, `LastName`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `RoleID`, `companyid`, `Role`) VALUES
(1, 'Ariandi', 'Nugraha', 'ariandin1411', '6BomjiIKe20oKv0BahGvgg1bQwW_MQnH', '$2y$13$nAJUojzw09jUFuzOwkebYuz/3./B2QkLoJOFTdqW3Y3aq8pZ1zBiu', NULL, 'db_duabelas@yahoo.com', 10, 1442389029, 1442389029, 1, 1, 'admin'),
(2, 'Ariandi', 'Nugraha', 'arimyung', 'XcRJlb7vw_gbxO6SVxSsPxQEJkZN-hlT', '$2y$13$IW4K8n99qyJ6i/X/WLT3XucrwE.cInH35AbOUleb5v7qX1MMLqqbW', NULL, 'dbduabelas@gmail.com', 10, 1442484839, 1442484839, 1, 1, 'customer'),
(5, 'Susi', 'Angraini', 'susiangraini', 'RZaQw-iNCdtgawP1MCAADCGzExUFJgzF', '$2y$13$itM.soiC8E4E0CfK9TOOsORxlj2AcHMqo1rF0K6PiOfC8abmsz7bO', NULL, 'susi.angraini@yahoo.com', 10, 1442826138, 1442826138, 2, 0, 'customer'),
(6, 'Fiorenzi', 'D Kaori', 'fioayah', 'KxUqHL1gMW0g6SARUWvsHhWeDNupgXj3', '$2y$13$1cgOG6eUnciu5RpVdEUcven4xvxSOzPcCrWD10q5087UDZsJbLncq', NULL, 'fio@ayah.com', 10, 1445090027, 1445090027, 2, 0, 'customer'),
(7, 'Mr.', 'Heru', 'heru', 'gzSArBG2NjILvPT3DwAyD3FuRRZZXKcP', '$2y$13$XPPoQgKUSUOc2.CrJ6J1x.gP6fOY8Y53i6XY36pfcBJ92BYHaPX3a', NULL, 'heru@platinum.com', 10, 1445692100, 1445692100, NULL, 2, 'customer'),
(8, 'Test', 'Person', 'testperson', 'jqNdNAd103OyNaoFKmIJiVKFP43ezCxM', '$2y$13$IbfA5P49.tpooNDGyZmj3uIGBISXu/kz5H2s3GpQRbGmWtcFuBWSG', NULL, 'test@person.com', 10, 1445693448, 1445693448, NULL, 2, 'customer'),
(9, 'Dedy', 'jaya', 'dedy', 'XP3C1ftFzaRjJ3eFv_VusNNJo9eSvbl5', '$2y$13$NgN9f7GyaL/Hs5YqM3/Gp.6vcruF/fH7jWMWJJ8r3xNL8RjJnhaDC', NULL, 'dedy@yahoo.com', 10, 1445767647, 1445767647, NULL, 3, 'customer'),
(11, 'Test', 'Person 10', 'testperson10', 'hWp5KyfbmJh24fSmgSJuy9I3arqv115G', '$2y$13$rg7E5KFr0CcBAj/0MCrzZuXeq4PgILAjcB23eg6Vma5scJw50nbhK', NULL, 'test@person10.com', 0, 1446196972, 1446196972, NULL, 3, 'customer'),
(18, 'Test', 'Person 11', 'testperson11', 'afbb1tDbx-0bcus7YElXZVSYcpEUjPrl', '$2y$13$9oKU5kWVb93qnBwPYey06.rz9Egbsy1BehMOEgRjk4DHJLoyKqLvm', NULL, 'test@person11.com', 10, 1446198038, 1446198038, NULL, 3, 'customer'),
(19, 'Test', 'Person 12', 'testperson12', 'VuqaMwajBSEp-Q3A5pLrLFuMJk5FGKiZ', '$2y$13$nXMKd3mfxGIINnjGc403n.w7nBAzGYOeyy6rzrTdrl5/cAgLbAFFq', NULL, 'test@person12.com', 10, 1446217086, 1446217086, NULL, 3, 'customer'),
(20, 'MR.', 'HENDRY', 'mrhendry', 'c7oasY4QbUb_rYlm9AVyGxJYk7Dnz1bJ', '$2y$13$yaBvkbWWIdRWG1P.Cj2hDu30bnYvx5HzNwpVl1BfLlkq/i6PE3a.e', NULL, 'mrhendry@platinumpro.com', 10, 1446824977, 1446824977, NULL, 2, 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`iduser` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(225) DEFAULT NULL,
  `datecreate` date DEFAULT NULL,
  `dateupdate` date DEFAULT NULL,
  `createby` int(11) NOT NULL,
  `updateby` int(11) NOT NULL,
  `rolesid` int(11) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`iduser`, `username`, `password`, `datecreate`, `dateupdate`, `createby`, `updateby`, `rolesid`) VALUES
(1, 'db_duabelas@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', '2015-07-01', '2015-07-01', 1, 1, 1),
(2, 'susi_angraini@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', '2015-07-01', '2015-07-01', 1, 1, 2),
(5, 'kincil2@yahoo.com', 'cac0b99ebf76eba5fe66050de4edd88a', '2015-07-01', '2015-07-01', 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `vessel`
--

CREATE TABLE IF NOT EXISTS `vessel` (
  `vessel_id` int(11) NOT NULL,
  `vessel_name` varchar(2) NOT NULL,
  `vessel_type` enum('SEA','AIR') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
 ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
 ADD PRIMARY KEY (`name`), ADD KEY `rule_name` (`rule_name`), ADD KEY `type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
 ADD PRIMARY KEY (`parent`,`child`), ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
 ADD PRIMARY KEY (`name`);

--
-- Indexes for table `bill_landing`
--
ALTER TABLE `bill_landing`
 ADD PRIMARY KEY (`bl_id`);

--
-- Indexes for table `bill_landing_detail`
--
ALTER TABLE `bill_landing_detail`
 ADD PRIMARY KEY (`bl_det_id`), ADD KEY `bl_number` (`bl_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
 ADD PRIMARY KEY (`companyid`), ADD KEY `createby` (`createby`), ADD KEY `updateby` (`updateby`), ADD KEY `information` (`informationid`);

--
-- Indexes for table `companyinfo`
--
ALTER TABLE `companyinfo`
 ADD PRIMARY KEY (`informationid`);

--
-- Indexes for table `costing`
--
ALTER TABLE `costing`
 ADD PRIMARY KEY (`costing_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
 ADD PRIMARY KEY (`ccode`);

--
-- Indexes for table `creditnote`
--
ALTER TABLE `creditnote`
 ADD PRIMARY KEY (`criditnote_id`);

--
-- Indexes for table `creditnotedet`
--
ALTER TABLE `creditnotedet`
 ADD PRIMARY KEY (`creditnotedet_id`);

--
-- Indexes for table `debitnote`
--
ALTER TABLE `debitnote`
 ADD PRIMARY KEY (`debitnote_id`);

--
-- Indexes for table `debitnotedet`
--
ALTER TABLE `debitnotedet`
 ADD PRIMARY KEY (`debitnotedet_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
 ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `invoice_detail`
--
ALTER TABLE `invoice_detail`
 ADD PRIMARY KEY (`invoicedet_id`);

--
-- Indexes for table `jobsheet`
--
ALTER TABLE `jobsheet`
 ADD PRIMARY KEY (`jobs_id`);

--
-- Indexes for table `jobsheetdet`
--
ALTER TABLE `jobsheetdet`
 ADD PRIMARY KEY (`jobsdet_id`);

--
-- Indexes for table `kindexport`
--
ALTER TABLE `kindexport`
 ADD PRIMARY KEY (`kindexport_id`);

--
-- Indexes for table `mediastorage`
--
ALTER TABLE `mediastorage`
 ADD PRIMARY KEY (`MediaStorageID`), ADD KEY `MediaID` (`MediaID`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
 ADD PRIMARY KEY (`version`);

--
-- Indexes for table `node`
--
ALTER TABLE `node`
 ADD PRIMARY KEY (`NodeID`);

--
-- Indexes for table `nodestructure`
--
ALTER TABLE `nodestructure`
 ADD PRIMARY KEY (`NodeStructureID`), ADD KEY `NodeChildID` (`NodeChildID`), ADD KEY `NodeChildID_2` (`NodeChildID`), ADD KEY `NodeChildID_3` (`NodeChildID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
 ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `paymentdet`
--
ALTER TABLE `paymentdet`
 ADD PRIMARY KEY (`paymentdet_id`);

--
-- Indexes for table `port`
--
ALTER TABLE `port`
 ADD PRIMARY KEY (`port_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`posts_id`), ADD KEY `author` (`author_id`);

--
-- Indexes for table `quotation`
--
ALTER TABLE `quotation`
 ADD PRIMARY KEY (`quotationid`);

--
-- Indexes for table `quotationdetail`
--
ALTER TABLE `quotationdetail`
 ADD PRIMARY KEY (`quotationdetid`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
 ADD PRIMARY KEY (`roleid`), ADD KEY `createby` (`createby`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`idroles`);

--
-- Indexes for table `rolestruc`
--
ALTER TABLE `rolestruc`
 ADD PRIMARY KEY (`rolestrucid`), ADD KEY `roleid` (`roleid`,`personid`), ADD KEY `personid` (`personid`);

--
-- Indexes for table `shipping_instruction`
--
ALTER TABLE `shipping_instruction`
 ADD PRIMARY KEY (`si_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `password_reset_token` (`password_reset_token`), ADD KEY `RoleID` (`RoleID`), ADD KEY `RoleID_2` (`RoleID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`iduser`), ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- Indexes for table `vessel`
--
ALTER TABLE `vessel`
 ADD PRIMARY KEY (`vessel_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill_landing`
--
ALTER TABLE `bill_landing`
MODIFY `bl_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `bill_landing_detail`
--
ALTER TABLE `bill_landing_detail`
MODIFY `bl_det_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
MODIFY `companyid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `companyinfo`
--
ALTER TABLE `companyinfo`
MODIFY `informationid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `costing`
--
ALTER TABLE `costing`
MODIFY `costing_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `creditnote`
--
ALTER TABLE `creditnote`
MODIFY `criditnote_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `creditnotedet`
--
ALTER TABLE `creditnotedet`
MODIFY `creditnotedet_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `debitnote`
--
ALTER TABLE `debitnote`
MODIFY `debitnote_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `debitnotedet`
--
ALTER TABLE `debitnotedet`
MODIFY `debitnotedet_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `invoice_detail`
--
ALTER TABLE `invoice_detail`
MODIFY `invoicedet_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `jobsheet`
--
ALTER TABLE `jobsheet`
MODIFY `jobs_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `jobsheetdet`
--
ALTER TABLE `jobsheetdet`
MODIFY `jobsdet_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `kindexport`
--
ALTER TABLE `kindexport`
MODIFY `kindexport_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `mediastorage`
--
ALTER TABLE `mediastorage`
MODIFY `MediaStorageID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `node`
--
ALTER TABLE `node`
MODIFY `NodeID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `nodestructure`
--
ALTER TABLE `nodestructure`
MODIFY `NodeStructureID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `paymentdet`
--
ALTER TABLE `paymentdet`
MODIFY `paymentdet_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `port`
--
ALTER TABLE `port`
MODIFY `port_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `posts_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
MODIFY `quotationid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `quotationdetail`
--
ALTER TABLE `quotationdetail`
MODIFY `quotationdetid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
MODIFY `roleid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `idroles` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rolestruc`
--
ALTER TABLE `rolestruc`
MODIFY `rolestrucid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `shipping_instruction`
--
ALTER TABLE `shipping_instruction`
MODIFY `si_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
