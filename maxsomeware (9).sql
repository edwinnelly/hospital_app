-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 23, 2024 at 08:17 PM
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
-- Database: `maxsomeware`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_list`
--

CREATE TABLE `account_list` (
  `id` int(11) NOT NULL,
  `account_no` varchar(40) DEFAULT NULL,
  `account_name` varchar(100) DEFAULT NULL,
  `cr` float NOT NULL DEFAULT 0,
  `dr` double NOT NULL DEFAULT 0,
  `balance` double NOT NULL DEFAULT 0,
  `created_date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account_list`
--

INSERT INTO `account_list` (`id`, `account_no`, `account_name`, `cr`, `dr`, `balance`, `created_date`) VALUES
(3, '3930293942', 'First Bank', 0, 0, 1000003.33, '2024-03-14 19:47:02'),
(4, '3930293942', 'Eco Bank NIH', 0, 0, 90000, '2024-03-14 19:47:48'),
(5, '903876433', 'Stering Bank', 0, 0, 84939.890625, '2024-03-14 19:49:37'),
(14, '20304949440', 'UBA-bank', 0, 0, 10000000, '2024-03-15 14:03:17');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `tittle` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `appointment_date` datetime DEFAULT NULL,
  `doc_id` int(11) DEFAULT NULL,
  `dated` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `specialist_id` int(11) DEFAULT NULL,
  `assigned_doc_id` int(11) DEFAULT NULL,
  `payment_status` varchar(20) DEFAULT 'notpaid',
  `payment_type` varchar(22) DEFAULT 'open',
  `hmo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `pid`, `tittle`, `description`, `appointment_date`, `doc_id`, `dated`, `status`, `specialist_id`, `assigned_doc_id`, `payment_status`, `payment_type`, `hmo_id`) VALUES
(46, 11919, 'the appropriate version for your operating system (Windows, macOS, Linux)', 'appropriate version for your operating system (Windows, macOS, Linux)', '2024-09-11 22:52:00', 8702, '2024-09-11 23:52:47', 2, 9, 40, 'notpaid', 'open', NULL),
(47, 11919, 'will try to automatically detect the email settings for your provider. If it succeeds, you can click “Done” to finish the setup.', 'Thunderbird will try to automatically detect the email settings for your provider. If it succeeds, you can click “Done” to finish the setup.', '2024-09-11 22:55:00', 8702, '2024-09-11 23:55:41', 1, 11, 47, 'notpaid', 'open', NULL),
(48, 11919, 'wqdqwdwqsqwsqw', 'wqwsqws wqsqwsqw', '2024-09-19 14:31:00', 8702, '2024-09-12 15:32:11', 0, 5, 37, 'notpaid', 'open', NULL),
(49, 11919, 'ed we d ed qw dewwdd', 'ewdedqewd ew dwed', '2024-09-12 15:25:00', 8702, '2024-09-12 16:25:57', 0, 5, 37, 'notpaid', 'open', NULL),
(50, 11919, 'wdqwdwqd qwd', 'dw. werwfef re. erfre', '2024-09-12 15:31:00', 8702, '2024-09-12 16:31:37', 0, 10, 36, 'notpaid', 'open', NULL),
(51, 11919, 'ewdew d we d we we', 'ew dew d we dw ed w ed e d we d e', '2024-09-12 15:32:00', 8702, '2024-09-12 16:32:46', 0, 5, 37, 'notpaid', 'open', NULL),
(52, 2, 'testing app', 'sending data top the patient', '2024-09-19 22:18:00', 8702, '2024-09-19 23:18:33', 0, 9, 37, 'notpaid', 'open', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `asset`
--

CREATE TABLE `asset` (
  `asset_id` int(11) NOT NULL,
  `asset_name` varchar(255) NOT NULL,
  `asset_type` varchar(100) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `purchase_price` decimal(10,2) DEFAULT NULL,
  `current_value` decimal(10,2) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `condition_asset` varchar(100) DEFAULT NULL,
  `owner` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `asset`
--

INSERT INTO `asset` (`asset_id`, `asset_name`, `asset_type`, `purchase_date`, `purchase_price`, `current_value`, `location`, `condition_asset`, `owner`, `notes`) VALUES
(2, 'Television\r\n', 'electronics', '2024-03-13', 120000.00, 20000.00, 'PHC', 'Good', 'hospital wilson ltd', 'this item is still in good shape'),
(6, 'Telescope', 'electronics', '2024-03-20', 340000.00, 340000.00, 'No11 wilson Road', 'good', 'Hospital EM', 'this is for hospital use');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department_name` varchar(255) DEFAULT NULL,
  `date_created` varchar(30) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `leader` int(11) NOT NULL DEFAULT 0,
  `abbr` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department_name`, `date_created`, `status`, `leader`, `abbr`) VALUES
(1, 'Emergency Department (ER or ED)s', NULL, 1, 37, 'test'),
(2, 'Medical/Surgical Units', NULL, 1, 38, NULL),
(3, 'Intensive Care Unit (ICU)', NULL, 0, 37, NULL),
(4, 'Labor and Delivery', NULL, 1, 40, NULL),
(5, 'Pediatrics', NULL, 1, 37, NULL),
(6, 'Obstetrics and Gynecology', NULL, 1, 38, NULL),
(7, 'Orthopedics', NULL, 1, 0, NULL),
(9, 'Neurology', NULL, 1, 36, 'Neu'),
(10, 'Oncology', NULL, 1, 38, 'ONC'),
(12, 'Pathology', NULL, 1, 41, 'path');

-- --------------------------------------------------------

--
-- Table structure for table `discharge_summary`
--

CREATE TABLE `discharge_summary` (
  `id` int(11) NOT NULL,
  `report_info` text DEFAULT NULL,
  `doc_id` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `created_date` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discharge_summary`
--

INSERT INTO `discharge_summary` (`id`, `report_info`, `doc_id`, `pid`, `created_date`) VALUES
(15, 'Explanation:\nWidth and Height: Sets the overall dimensions of the textarea.\nPadding: Adds space inside the textarea for better text readability.\nFont and Text Styling: Defines the font family, size, line height, and text color.\nBackground and Border: Sets the background color, border style, and border radius for rounded corners.\nBox Shadow: Adds a subtle shadow for a more modern look.\nResize: Limits resizing to vertical only.\nFocus State: Changes the border color and adds a shadow when the textarea is focused.\nPlaceholder Styling: Styles the placeholder text for consistency.\nResult:\nThis CSS will give your &lt;textarea&gt; a clean, modern look with responsive and user-friendly styles. The focus styles provide visual feedback when the textarea is active, enhancing the user experience.', 8702, 9342, '2024-06-02 15:27:38'),
(16, '- **Energy Consumption:**\n  - If your energy consumption is lower than the daily production of 6375 Wh, the batteries might reach full charge over multiple days.\n  \n- **Weather Variability:**\n  - Solar energy production can vary based on weather conditions. It’s important to consider this variability and possibly have an additional energy source or more panels to ensure reliability.\n\n### Summary:\n\nFive 300-watt solar panels can charge a 24V 400Ah battery bank, but they won&#039;t be able to fully charge it in one day if the battery bank is significantly discharged. For optimal performance and to ensure the batteries remain charged, you might need additional solar panels or reduced energy consumption.', 8702, 9342, '2024-06-02 15:30:25'),
(18, 'It’s important to ensure the batteries are not deeply discharged too often, as this can reduce their lifespan.', 8702, 11029, '2024-06-02 15:33:16'),
(19, 'Hello Edwin,\n\n \n\nWe would like to inform you of a recent directive issued by the Central Bank of Nigeria (CBN) regarding changes in collateral policy for Naira loans. According to the CBN circular: BSD/DIR/PUB/LAB/017/004, loans currently secured with dollar-denominated collateral are now prohibited, except under specific circumstances.\n\n  \n\nIf you currently have a loan secured with such collateral, you are required to pay it off completely within 90 days (approximately 3 months). \n\n \n\nForeign currency collateral can only be used for Naira loans in cases where the collateral is in the form of: \n\nEurobonds issued by the Federal Government of Nigeria \nGuarantees provided by foreign banks, including Standby Letters of Credit', 8702, 7938, '2024-06-02 18:31:12');

-- --------------------------------------------------------

--
-- Table structure for table `drugs_list`
--

CREATE TABLE `drugs_list` (
  `id` int(11) NOT NULL,
  `drugs_name` varchar(255) DEFAULT NULL,
  `generic` varchar(100) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `drugs_class` varchar(100) DEFAULT NULL,
  `suppliers_id` int(11) DEFAULT NULL,
  `qty` float DEFAULT NULL,
  `qty_reminder` int(11) DEFAULT NULL,
  `cost_price` float DEFAULT NULL,
  `selling_price` float DEFAULT NULL,
  `brand_id` varchar(255) DEFAULT NULL,
  `drugs_types` varchar(50) DEFAULT NULL,
  `production_date` datetime DEFAULT NULL,
  `expiry_date` datetime DEFAULT NULL,
  `batch_no` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drugs_list`
--

INSERT INTO `drugs_list` (`id`, `drugs_name`, `generic`, `category_id`, `drugs_class`, `suppliers_id`, `qty`, `qty_reminder`, `cost_price`, `selling_price`, `brand_id`, `drugs_types`, `production_date`, `expiry_date`, `batch_no`, `user_id`, `status`) VALUES
(18, 'Piperazines', NULL, 11, NULL, 8, 1227, 10, 1000, 10000, '1', 'Amp', '2024-05-06 15:01:00', '2024-05-06 15:01:00', 'B900N', NULL, 0),
(19, 'Amyl Nitrite', NULL, 11, NULL, 8, 258, 9, 90000, 120000, '1', 'Bottle', '2024-05-01 12:54:00', '2024-06-08 12:54:00', 'M9op0', NULL, 0),
(20, 'Anabolic Steroids', NULL, 11, NULL, 8, 300334, 2, 30000, 60000, '3', 'Bottle', '2024-05-09 20:30:00', '2024-05-25 18:30:00', '', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `drug_brand_category`
--

CREATE TABLE `drug_brand_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_date` varchar(22) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drug_brand_category`
--

INSERT INTO `drug_brand_category` (`id`, `category_name`, `status`, `created_date`) VALUES
(1, 'Brand A', 0, NULL),
(2, 'Brand Box', 0, NULL),
(3, 'Brand C', 0, NULL),
(4, 'Brand d', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `drug_category`
--

CREATE TABLE `drug_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_date` varchar(22) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drug_category`
--

INSERT INTO `drug_category` (`id`, `category_name`, `status`, `created_date`) VALUES
(10, 'Antibiotics', 0, NULL),
(11, 'Antidepressants', 0, NULL),
(12, 'Antihistamines', 0, NULL),
(13, 'Antipyretics', 0, NULL),
(14, 'Antivirals', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `drug_supplier`
--

CREATE TABLE `drug_supplier` (
  `id` int(11) NOT NULL,
  `supplier` varchar(255) DEFAULT NULL,
  `date_cr` varchar(30) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `host_key` varchar(255) DEFAULT NULL,
  `phone` varchar(40) DEFAULT NULL,
  `addr` varchar(222) DEFAULT NULL,
  `email` varchar(222) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drug_supplier`
--

INSERT INTO `drug_supplier` (`id`, `supplier`, `date_cr`, `status`, `host_key`, `phone`, `addr`, `email`) VALUES
(7, 'BioCareSD', '2024-05-04 21:12:25', 0, NULL, '0989038934', 'No11 New layout phc', 'BioCareSD@mail.com'),
(8, 'Pharma Manufacturing', '2024-05-04 21:13:21', 0, NULL, '03038393', 'Pl Ave USA', 'PharmaManufacturing@xc.com'),
(9, 'McKesson Corporation', '2024-05-04 21:27:06', 0, NULL, '0989038934', 'No11 New layout phc', 'McKessonCorporation@mail.com'),
(10, 'AmeriSourceBergen', '2024-05-04 21:27:39', 0, NULL, '3930374833', 'No11 New layout phc', 'AmeriSourceBergen@mail.com'),
(11, 'Henry Schein', '2024-05-04 21:28:19', 0, NULL, '098903893411', 'No11 New layout phc 123', 'BioCareSDe@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `encounters_clerking`
--

CREATE TABLE `encounters_clerking` (
  `id` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `clerking_id` int(11) DEFAULT NULL,
  `complaints` text DEFAULT NULL,
  `examination` text DEFAULT NULL,
  `diagnosis` text DEFAULT NULL,
  `plan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expense_category`
--

CREATE TABLE `expense_category` (
  `id` int(11) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `account_number` varchar(50) DEFAULT NULL,
  `dated_created` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expense_category`
--

INSERT INTO `expense_category` (`id`, `category`, `account_number`, `dated_created`) VALUES
(4, 'Car Maintenances', '5727782', '2024-03-15 13:51:24'),
(5, 'Gas expenses', '7998142', '2024-03-15 13:52:15'),
(6, 'School Fees for kids', '8217675', '2024-03-15 14:33:53');

-- --------------------------------------------------------

--
-- Table structure for table `hmo`
--

CREATE TABLE `hmo` (
  `id` int(11) NOT NULL,
  `hmo_name` varchar(255) NOT NULL,
  `abbr` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `credit` float DEFAULT 0,
  `debit` float NOT NULL DEFAULT 0,
  `balance` float NOT NULL DEFAULT 0,
  `hmo_key` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hmo`
--

INSERT INTO `hmo` (`id`, `hmo_name`, `abbr`, `status`, `credit`, `debit`, `balance`, `hmo_key`) VALUES
(1, 'Hygeia HMOz', 'Hy HMOz', 1, 0, 0, 0, 100123),
(2, 'Clearline International Limiteds', 'CIL', 1, 0, 0, 0, 3456783),
(3, 'Redcares HMO', 'RD HMO', 1, 0, 0, 0, NULL),
(4, 'Total Health Trust Limited (THT)', 'THT', 1, 0, 0, 0, NULL),
(7, 'Komo HMNO', 'KO HMO', 1, 0, 0, 0, NULL),
(10, 'Kaiser Permanente', 'fwdw', 1, 0, 0, 0, NULL),
(11, 'Default', 'DFT', 1, 0, 0, 0, NULL),
(12, 'Somto HMO LTD', 'SHMO', 1, 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hmo_lab_group`
--

CREATE TABLE `hmo_lab_group` (
  `id` int(11) NOT NULL,
  `hmo_id` int(11) DEFAULT NULL,
  `profile_id` int(11) DEFAULT NULL,
  `allowance` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `case_id` int(11) DEFAULT NULL,
  `date_created` varchar(33) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hmo_lab_group`
--

INSERT INTO `hmo_lab_group` (`id`, `hmo_id`, `profile_id`, `allowance`, `status`, `case_id`, `date_created`) VALUES
(24, 4, 18, NULL, NULL, 11, NULL),
(26, 4, 18, NULL, NULL, 12, NULL),
(27, 4, 18, NULL, NULL, 5, NULL),
(28, 4, 20, NULL, NULL, 3, NULL),
(30, 4, 20, NULL, NULL, 7, NULL),
(31, 4, 20, NULL, NULL, 11, NULL),
(32, 4, 20, NULL, NULL, 13, NULL),
(33, 4, 18, NULL, NULL, 10, NULL),
(34, 4, 18, NULL, NULL, 9, NULL),
(35, 4, 18, NULL, NULL, 18, NULL),
(36, 4, 18, NULL, NULL, 19, NULL),
(37, 4, 14, NULL, NULL, 3, NULL),
(38, 4, 14, NULL, NULL, 6, NULL),
(39, 4, 14, NULL, NULL, 8, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hmo_payment_requests`
--

CREATE TABLE `hmo_payment_requests` (
  `request_id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `hmo_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `request_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `amount_requested` decimal(10,2) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'pending',
  `response_date` timestamp NULL DEFAULT NULL,
  `amount_approved` decimal(10,2) DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `docid` varchar(44) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hmo_payment_requests`
--

INSERT INTO `hmo_payment_requests` (`request_id`, `patient_id`, `hmo_id`, `service_id`, `request_date`, `amount_requested`, `status`, `response_date`, `amount_approved`, `created_at`, `docid`) VALUES
(86, 11919, 1, 29, '2024-08-27 19:37:25', NULL, 'paid', NULL, 0.00, '2024-08-27 19:37:25', '66ce2aee4ffbe'),
(87, 11919, 1, 33, '2024-08-27 19:37:25', NULL, 'paid', NULL, 0.00, '2024-08-27 19:37:25', '66ce2aee4ffbe'),
(88, 11919, 4, 36, '2024-08-27 19:37:25', NULL, 'paid', NULL, 0.00, '2024-08-27 19:37:25', '66ce2aee4ffbe'),
(89, 11919, 1, 29, '2024-08-27 19:37:51', NULL, 'paid', NULL, 0.00, '2024-08-27 19:37:51', '66ce2b00bfb5c'),
(90, 11919, 4, 22, '2024-08-27 19:37:51', NULL, 'paid', NULL, 0.00, '2024-08-27 19:37:51', '66ce2b00bfb5c'),
(91, 11919, 1, 23, '2024-08-27 19:37:51', NULL, 'paid', NULL, 0.00, '2024-08-27 19:37:51', '66ce2b00bfb5c'),
(92, 11919, 1, 31, '2024-08-27 19:37:51', NULL, 'paid', NULL, 0.00, '2024-08-27 19:37:51', '66ce2b00bfb5c'),
(93, 11919, 1, 24, '2024-08-27 19:37:51', NULL, 'paid', NULL, 0.00, '2024-08-27 19:37:51', '66ce2b00bfb5c'),
(94, 11919, 1, 5, '2024-08-27 19:37:51', NULL, 'paid', NULL, 0.00, '2024-08-27 19:37:51', '66ce2b00bfb5c'),
(95, 2, 2, 11, '2024-08-27 19:39:44', NULL, 'paid', NULL, 0.00, '2024-08-27 19:39:44', '66ce2b78f07bf'),
(96, 2, 4, 29, '2024-08-27 19:39:44', NULL, 'paid', NULL, 0.00, '2024-08-27 19:39:44', '66ce2b78f07bf'),
(97, 2, 4, 33, '2024-08-27 19:39:44', NULL, 'paid', NULL, 0.00, '2024-08-27 19:39:44', '66ce2b78f07bf'),
(98, 2, 2, 36, '2024-08-27 19:39:44', NULL, 'paid', NULL, 0.00, '2024-08-27 19:39:44', '66ce2b78f07bf'),
(99, 2, 4, 5, '2024-08-27 19:40:13', NULL, 'paid', NULL, 0.00, '2024-08-27 19:40:13', '66ce2b949ecc7'),
(100, 2, 2, 9, '2024-08-27 19:40:13', NULL, 'paid', NULL, 0.00, '2024-08-27 19:40:13', '66ce2b949ecc7'),
(101, 2, 2, 25, '2024-08-27 19:40:13', NULL, 'paid', NULL, 0.00, '2024-08-27 19:40:13', '66ce2b949ecc7'),
(102, 1234, 4, 11, '2024-08-30 11:10:04', NULL, 'paid', NULL, 0.00, '2024-08-30 11:10:04', '66d1a86b7d86c'),
(103, 1234, 1, 29, '2024-08-30 11:10:04', NULL, 'paid', NULL, 0.00, '2024-08-30 11:10:04', '66d1a86b7d86c'),
(104, 1234, 1, 33, '2024-08-30 11:10:04', NULL, 'paid', NULL, 0.00, '2024-08-30 11:10:04', '66d1a86b7d86c'),
(105, 1234, 1, 36, '2024-08-30 11:10:04', NULL, 'paid', NULL, 0.00, '2024-08-30 11:10:04', '66d1a86b7d86c'),
(106, 1234, 1, 21, '2024-08-30 11:10:04', NULL, 'paid', NULL, 0.00, '2024-08-30 11:10:04', '66d1a86b7d86c'),
(107, 1234, 1, 13, '2024-08-30 11:10:04', NULL, 'paid', NULL, 0.00, '2024-08-30 11:10:04', '66d1a86b7d86c'),
(108, NULL, NULL, NULL, '2024-08-31 14:26:53', NULL, 'pending', NULL, 0.00, '2024-08-31 14:26:53', NULL),
(109, 7, 12, 11, '2024-09-01 13:20:07', NULL, 'paid', NULL, 0.00, '2024-09-01 13:20:07', '66d469fc9a55b'),
(110, 7, 12, 29, '2024-09-01 13:20:07', NULL, 'paid', NULL, 0.00, '2024-09-01 13:20:07', '66d469fc9a55b'),
(111, 7, 12, 33, '2024-09-01 13:20:07', NULL, 'paid', NULL, 0.00, '2024-09-01 13:20:07', '66d469fc9a55b'),
(112, 7, 4, 36, '2024-09-01 13:20:07', NULL, 'paid', NULL, 0.00, '2024-09-01 13:20:07', '66d469fc9a55b'),
(113, 7, 12, 21, '2024-09-01 13:20:07', NULL, 'paid', NULL, 0.00, '2024-09-01 13:20:07', '66d469fc9a55b'),
(114, 7, 12, 13, '2024-09-01 13:20:07', NULL, 'pending', NULL, 0.00, '2024-09-01 13:20:07', '66d469fc9a55b'),
(115, 7, 12, 18, '2024-09-01 13:20:07', NULL, 'pending', NULL, 0.00, '2024-09-01 13:20:07', '66d469fc9a55b');

-- --------------------------------------------------------

--
-- Table structure for table `hmo_pharmacy_group`
--

CREATE TABLE `hmo_pharmacy_group` (
  `id` int(11) NOT NULL,
  `hmo_id` int(11) DEFAULT NULL,
  `profile_id` int(11) DEFAULT NULL,
  `allowance` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `case_id` int(11) DEFAULT NULL,
  `date_created` varchar(33) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hmo_pharmacy_group`
--

INSERT INTO `hmo_pharmacy_group` (`id`, `hmo_id`, `profile_id`, `allowance`, `status`, `case_id`, `date_created`) VALUES
(39, 4, 18, NULL, NULL, 18, NULL),
(40, 4, 18, NULL, NULL, 20, NULL),
(41, 4, 18, NULL, NULL, 19, NULL),
(42, 4, 20, NULL, NULL, 19, NULL),
(43, 4, 14, NULL, NULL, 18, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hmo_profiles`
--

CREATE TABLE `hmo_profiles` (
  `id` int(11) NOT NULL,
  `hmo_id` int(11) DEFAULT NULL,
  `profile_name` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `date_created` varchar(33) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hmo_profiles`
--

INSERT INTO `hmo_profiles` (`id`, `hmo_id`, `profile_name`, `status`, `date_created`) VALUES
(1, 1, 'Standard HMO', NULL, NULL),
(2, 1, 'High Deductible Health Plans', NULL, NULL),
(6, 3, 'HMO Basic', 1, '2024-07-04 19:17:48'),
(7, 3, 'HMO Plus', 1, '2024-07-04 19:18:01'),
(8, 3, 'HMO Premier', 1, '2024-07-04 19:18:48'),
(9, 3, 'HMO Select', 1, '2024-07-04 19:19:06'),
(10, 3, 'HMO Advantage', 1, '2024-07-04 19:19:20'),
(11, 3, 'HMO Platinum', 1, '2024-07-04 19:19:35'),
(12, 3, 'HMO Essential', 1, '2024-07-04 19:19:47'),
(13, 3, 'HMO Gold', 1, '2024-07-04 19:19:59'),
(14, 4, 'HMO Bronze', 1, '2024-07-04 19:20:28'),
(18, 4, 'Lower Premiums', 1, '2024-08-19 16:44:59'),
(20, 4, 'basic plan', 1, '2024-08-19 22:48:48');

-- --------------------------------------------------------

--
-- Table structure for table `hmo_radio_group`
--

CREATE TABLE `hmo_radio_group` (
  `id` int(11) NOT NULL,
  `hmo_id` int(11) DEFAULT NULL,
  `profile_id` int(11) DEFAULT NULL,
  `allowance` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `case_id` int(11) DEFAULT NULL,
  `date_created` varchar(33) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hmo_radio_group`
--

INSERT INTO `hmo_radio_group` (`id`, `hmo_id`, `profile_id`, `allowance`, `status`, `case_id`, `date_created`) VALUES
(48, 4, 18, NULL, NULL, 13, NULL),
(49, 4, 18, NULL, NULL, 17, NULL),
(50, 4, 14, NULL, NULL, 13, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hmo_request_window`
--

CREATE TABLE `hmo_request_window` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `request_key` varchar(33) DEFAULT NULL,
  `date_added` varchar(44) NOT NULL DEFAULT current_timestamp(),
  `pid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hmo_request_window`
--

INSERT INTO `hmo_request_window` (`id`, `title`, `request_key`, `date_added`, `pid`) VALUES
(9, 'acv', '66ce2aee4ffbe', '2024-08-27 20:37:25', 11919),
(10, 'xasdqdqw', '66ce2b00bfb5c', '2024-08-27 20:37:51', 11919),
(11, 'loi', '66ce2b78f07bf', '2024-08-27 20:39:44', 2),
(12, 'dw', '66ce2b949ecc7', '2024-08-27 20:40:13', 2),
(13, 'test bill for john', '66d1a86b7d86c', '2024-08-30 12:10:04', 1234),
(14, '43tfdgvfbggb', '66d469fc9a55b', '2024-09-01 14:20:07', 7);

-- --------------------------------------------------------

--
-- Table structure for table `hmo_specialist_group`
--

CREATE TABLE `hmo_specialist_group` (
  `id` int(11) NOT NULL,
  `hmo_id` int(11) DEFAULT NULL,
  `profile_id` int(11) DEFAULT NULL,
  `allowance` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `case_id` int(11) DEFAULT NULL,
  `date_created` varchar(33) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hmo_specialist_group`
--

INSERT INTO `hmo_specialist_group` (`id`, `hmo_id`, `profile_id`, `allowance`, `status`, `case_id`, `date_created`) VALUES
(46, 4, 18, NULL, NULL, 10, NULL),
(47, 4, 18, NULL, NULL, 9, NULL),
(51, 4, 14, NULL, NULL, 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hospital_config`
--

CREATE TABLE `hospital_config` (
  `id` int(11) NOT NULL,
  `currency_name` varchar(100) DEFAULT NULL,
  `currency_sign` varchar(33) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone1` varchar(20) DEFAULT NULL,
  `phone2` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospital_config`
--

INSERT INTO `hospital_config` (`id`, `currency_name`, `currency_sign`, `address`, `phone1`, `phone2`) VALUES
(1, 'Kariden Specialist Hospital Annex', '₦', 'No11 GRA Layout port harcourt', '09182837347', '08172737377');

-- --------------------------------------------------------

--
-- Table structure for table `lab_kit`
--

CREATE TABLE `lab_kit` (
  `id` int(11) NOT NULL,
  `kit_name` varchar(100) DEFAULT NULL,
  `kit_type` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lab_kit`
--

INSERT INTO `lab_kit` (`id`, `kit_name`, `kit_type`, `status`) VALUES
(4, 'latex', 'Restrictions', 'active'),
(5, 'Aprons', 'containers', 'active'),
(6, 'First aid kit', 'sample', 'active'),
(7, 'Test tubes', 'containers', 'active'),
(11, 'Plastic wrap', 'containers', 'active'),
(12, 'Aluminum foil', 'sample', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `lab_test_case`
--

CREATE TABLE `lab_test_case` (
  `id` int(11) NOT NULL,
  `test_name` varchar(100) DEFAULT NULL,
  `test_price` double DEFAULT NULL,
  `tat` int(11) DEFAULT NULL,
  `dpt` int(11) DEFAULT NULL,
  `sample` int(11) DEFAULT NULL,
  `container` int(11) DEFAULT NULL,
  `restrictions` int(11) DEFAULT NULL,
  `created_date` varchar(33) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `unit` varchar(30) DEFAULT NULL,
  `ranges_test` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lab_test_case`
--

INSERT INTO `lab_test_case` (`id`, `test_name`, `test_price`, `tat`, `dpt`, `sample`, `container`, `restrictions`, `created_date`, `status`, `unit`, `ranges_test`) VALUES
(3, 'Complete Blood Count (CBC)', 30000.98, 4, 4, 6, 7, 4, '2024-03-20 17:45:07', 1, '4.4kl', '3.0.ml'),
(5, 'Basic Metabolic Panel (BMP)', 34000.77, 32, 7, 6, 5, 4, '2024-03-20 18:44:46', 1, NULL, NULL),
(6, 'Comprehensive Metabolic Panel (CMP)', 2000, 4, 1, 6, 7, 4, '2024-03-24 15:35:11', 1, '90.1 - 120mg', '0.10'),
(7, 'Lipid Panel ', 12000, 5, 1, 6, 7, 4, '2024-03-24 15:35:11', 1, '90.1 - 120mg', '0.102'),
(8, 'Thyroid Function Tests (TFTs)', 8900, 4, 1, 6, 7, 4, '2024-03-24 15:35:11', 1, '90.1 - 120mg', '0.310'),
(9, 'Urinalysis', 9000, 6, 1, 6, 7, 4, '2024-03-24 15:35:11', 1, '90.1 - 120mg', '01.10'),
(10, 'Blood Glucose Test', 19000, 4, 1, 6, 7, 4, '2024-03-24 15:35:11', 1, '90.1 - 120mg', '0.10'),
(11, 'Liver Function Tests (LFTs)', 12000, 4, 1, 6, 7, 4, '2024-03-24 15:35:11', 1, '90.1 - 120mg', '0.10'),
(12, 'Coagulation Panel ', 2000, 7, 1, 6, 7, 4, '2024-03-24 15:35:11', 1, '90.1 - 120mg', '0.10'),
(13, 'Electrolyte Panel', 4000, 4, 1, 6, 7, 4, '2024-03-24 15:35:11', 1, '90.1 - 120mg', '0.10'),
(14, 'Serum Creatinine', 41000, 4, 1, 6, 7, 4, '2024-03-24 15:35:11', 1, '90.1 - 120mg', '0.10'),
(15, 'C-reactive Protein (CRP) ', 41000, 4, 1, 6, 7, 4, '2024-03-24 15:35:11', 1, '90.1 - 120mg', '0.10'),
(16, 'Erythrocyte Sedimentation Rate (ESR)', 41000, 4, 1, 6, 7, 4, '2024-03-24 15:35:11', 1, '90.1 - 120mg', '0.10');

-- --------------------------------------------------------

--
-- Table structure for table `lab_test_result_config`
--

CREATE TABLE `lab_test_result_config` (
  `id` int(11) NOT NULL,
  `test_id` int(11) DEFAULT NULL,
  `name_test` varchar(255) DEFAULT NULL,
  `units` varchar(255) DEFAULT NULL,
  `bio_ref` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `result` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_request`
--

CREATE TABLE `leave_request` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `leave_type` varchar(200) DEFAULT NULL,
  `date1` varchar(20) DEFAULT NULL,
  `date2` varchar(20) DEFAULT NULL,
  `reasons` text DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `date_created` varchar(30) DEFAULT NULL,
  `approved_date` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave_request`
--

INSERT INTO `leave_request` (`id`, `emp_id`, `leave_type`, `date1`, `date2`, `reasons`, `status`, `date_created`, `approved_date`) VALUES
(7, 1, 'Casual Leave', '2024-03-01', '2024-04-06', 'Cloud technology has numerous benefits, including cost savings, scalability, flexibility, increased collaboration, and disaster recovery capabilities. It has become a fundamental component of modern IT infrastructure, empowering organizations of all sizes to innovate and grow without the constraints of traditional on-premises infrastructure. Major providers of cloud services include Amazon Web Services (AWS), Microsoft Azure, Google Cloud Platform (GCP), and IBM Cloud, among others.', '0', '2024-03-08 21:05:43', '2024-03-08 21:15:51'),
(8, 38, 'Maternity Leave', '2024-03-30', '2024-03-08', 'Software as a Service (SaaS): Delivers software applications over the internet on a subscription basis, eliminating the need for users to install, maintain, and manage the software locally.', '0', '2024-03-08 21:17:18', '2024-03-08 21:17:37'),
(10, 40, 'Maternity Leave', '2024-03-30', '2024-05-16', 'Measured Service: Cloud usage is typically metered, allowing users to pay only for the resources they consume, similar to utility billing.', '0', '2024-03-08 21:23:18', '2024-03-08 21:23:27'),
(11, 37, 'Casual Leave', '2024-03-15', '2024-03-27', 'To add a try-catch block to your fetch_details_id function, you can wrap the database-related code inside a try block and catch any exceptions that might occur. Here&#039;s how you can modify your function:', '1', '2024-03-10 17:24:17', NULL),
(12, 38, 'Casual Leave', '2024-03-21', '2024-03-22', 'Remember to adjust the error handling and sanitization techniques according to your specific requirements and security considerations.', '0', '2024-03-12 12:46:05', '2024-03-12 12:47:04'),
(13, 41, 'Medical Leave', '2024-04-17', '2024-05-01', 'Feel free to further customize the design or add more features based on your requirements!', '1', '2024-04-08 14:17:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patient_data`
--

CREATE TABLE `patient_data` (
  `id` int(11) NOT NULL,
  `pid` varchar(100) DEFAULT NULL,
  `patient_name` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `sex` varchar(20) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `marital_status` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `tribe` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `next_kin` varchar(255) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `emails_patient` varchar(255) DEFAULT NULL,
  `added_date` varchar(40) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `hmo_id` varchar(44) DEFAULT NULL,
  `hmo_plans` int(11) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `addimission_status` varchar(30) DEFAULT NULL,
  `out_patient` varchar(50) DEFAULT NULL,
  `assigned_doc_id` varchar(33) DEFAULT NULL,
  `specialist` varchar(30) DEFAULT NULL,
  `wallet` decimal(10,0) DEFAULT 0,
  `retainer` varchar(100) DEFAULT NULL,
  `account_type` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_data`
--

INSERT INTO `patient_data` (`id`, `pid`, `patient_name`, `age`, `sex`, `occupation`, `marital_status`, `address`, `tribe`, `religion`, `next_kin`, `phone_no`, `emails_patient`, `added_date`, `password`, `hmo_id`, `hmo_plans`, `photo`, `addimission_status`, `out_patient`, `assigned_doc_id`, `specialist`, `wallet`, `retainer`, `account_type`) VALUES
(1, '11919', 'Christain Judge', 33, 'Male', 'Tebc scn', 'Married', 'No11 New close phc', 'River State', 'Taoism', 'Ebong Chris', '090337474443', 'judgeschrid@gmail.com', '2024-06-23 15:30:33', NULL, '1', NULL, '98165409741725203863person-1.jpg', NULL, NULL, NULL, NULL, 0, 'Individual', 'vip'),
(14, '1', 'John Doe', 35, 'Male', 'Engineer', 'Single', '123 Main St', 'Tribe A', 'Christianity', 'Jane Doe', '1234567890', 'john.doe@example.com', '2024-06-23', 'password123', '1', NULL, '71368435084027629951testimonial1.png.jpeg', 'Admitted', 'Yes', 'DOC001', '1', 100, 'Yes', 'Standard'),
(16, '323', 'Alice Johnson', 42, 'Female', 'Doctor', 'Single', '789 Oak St', 'Tribe C', 'Hinduism', 'Bob Johnson', '1122334455', 'alice.johnson@example.com', '2024-06-23', 'password789', '3', NULL, '45603262387049981157images.jpeg', 'Admitted', 'Yes', 'DOC003', '3', 150, 'Yes', 'Standard'),
(17, '4123', 'Robert Brown', 30, 'Male', 'Lawyer', 'Married', '101 Maple St', 'Tribe D', 'Buddhism', 'Sarah Brown', '2233445566', 'robert.brown@example.com', '2024-06-23', 'password101', '4', 20, '23301970726414565898images.jpeg', 'Not Admitted', 'No', 'DOC004', '4', 250, 'No', 'Premium'),
(18, '5', 'Emily Davis', 37, 'Female', 'Nurse', 'Single', '202 Pine St', 'Tribe E', 'Judaism', 'James Davis', '3344556677', 'emily.davis@example.com', '2024-06-23', 'password202', '5', NULL, 'photo5.jpg', 'Admitted', 'Yes', 'DOC005', '5', 300, 'Yes', 'Standard'),
(114, '1234', 'John Doe', 35, 'Male', 'Engineer', 'Single', '123 Main St', 'Tribe A', 'Christianity', 'Jane Doe', '12345678901', 'john.doe@example.com', '2024-06-23', 'password123', '1', NULL, '71368435084027629951testimonial1.png.jpeg', 'Admitted', 'Yes', 'DOC001', '1', 100, 'Yes', 'Standard'),
(115, '2', 'Jane Smith', 28, 'Female', 'Teacher', 'Married', '456 Elm St', 'Tribe B', 'Islam', 'John Smith', '09876543211', 'jane.smith@example.com', '2024-06-23', 'password456', '2', NULL, '3874079683549105122674893594681720531206admin3.png', 'Not Admitted', 'No', 'DOC002', '2', 200, 'No', 'Premium'),
(116, '3', 'Alice Johnson', 42, 'Female', 'Doctor', 'Single', '789 Oak St', 'Tribe C', 'Hinduism', 'Bob Johnson', '11223344551', 'alice.johnson@example.com', '2024-06-23', 'password789', '3', NULL, '45603262387049981157images.jpeg', 'Admitted', 'Yes', 'DOC003', '3', 150, 'Yes', 'Standard'),
(117, '4', 'Robert Brown', 30, 'Male', 'Lawyer', 'Married', '101 Maple St', 'Tribe D', 'Buddhism', 'Sarah Brown', '2233445562', 'robert.brown@example.com', '2024-06-23', 'password101', '4', 20, '67620071995438451238testimonial2.png.jpeg', 'Not Admitted', 'No', 'DOC004', '4', 250, 'No', 'Premium'),
(118, '345678', 'Emily Davis', 37, 'Female', 'Nurse', 'Single', '202 Pine St', 'Tribe E', 'Judaism', 'James Davis', '3344556672', 'emily.davis@example.com', '2024-06-23', 'password202', '5', NULL, 'photo5.jpg', 'Admitted', 'Yes', 'DOC005', '5', 300, 'Yes', 'Standard'),
(119, '6', 'Michael Wilson', 45, 'Male', 'Accountant', 'Married', '303 Cedar St', 'Tribe F', 'Christianity', 'Linda Wilson', '4455667788', 'michael.wilson@example.com', '2024-06-23', 'password303', '4', NULL, 'photo6.jpg', 'Not Admitted', 'No', 'DOC006', '6', 350, 'No', 'Premium'),
(120, '7', 'Sarah Miller', 32, 'Female', 'Architect', 'Single', '404 Spruce St', 'Tribe G', 'Islam', 'Tom Miller', '5566778899', 'sarah.miller@example.com', '2024-06-23', 'password404', '12', NULL, 'photo7.jpg', 'Admitted', 'Yes', 'DOC007', '7', 400, 'Yes', 'Standard'),
(121, '8', 'David Lee', 29, 'Male', 'Designer', 'Single', '505 Willow St', 'Tribe H', 'Hinduism', 'Amy Lee', '6677889900', 'david.lee@example.com', '2024-06-23', 'password505', '8', NULL, 'photo8.jpg', 'Not Admitted', 'No', 'DOC008', '8', 450, 'No', 'Premium'),
(122, '9', 'Laura Harris', 39, 'Female', 'Engineer', 'Married', '606 Birch St', 'Tribe I', 'Buddhism', 'James Harris', '7788990011', 'laura.harris@example.com', '2024-06-23', 'password606', '9', NULL, 'photo9.jpg', 'Admitted', 'Yes', 'DOC009', '9', 500, 'Yes', 'Standard'),
(123, '10', 'Mark Young', 41, 'Male', 'Teacher', 'Single', '707 Cherry St', 'Tribe J', 'Judaism', 'Susan Young', '8899001122', 'mark.young@example.com', '2024-06-23', 'password707', '12', NULL, 'photo10.jpg', 'Not Admitted', 'No', 'DOC010', '10', 550, 'No', 'Premium'),
(124, '11', 'Nancy King', 34, 'Female', 'Doctor', 'Married', '808 Aspen St', 'Tribe K', 'Christianity', 'John King', '9900112233', 'nancy.king@example.com', '2024-06-23', 'password808', '11', NULL, 'photo11.jpg', 'Admitted', 'Yes', 'DOC011', '11', 600, 'Yes', 'Standard'),
(125, '12', 'Chris Scott', 36, 'Male', 'Lawyer', 'Single', '909 Walnut St', 'Tribe L', 'Islam', 'Emma Scott', '1112233445', 'chris.scott@example.com', '2024-06-23', 'password909', '4', NULL, 'photo12.jpg', 'Not Admitted', 'No', 'DOC012', '12', 650, 'No', 'Premium'),
(126, '13', 'Patricia Lewis', 27, 'Female', 'Nurse', 'Married', '1010 Beech St', 'Tribe M', 'Hinduism', 'Michael Lewis', '1223344556', 'patricia.lewis@example.com', '2024-06-23', 'password1010', '13', NULL, 'photo13.jpg', 'Admitted', 'Yes', 'DOC013', '13', 700, 'Yes', 'Standard'),
(127, '14', 'Steven Clark', 38, 'Male', 'Engineer', 'Single', '1111 Maple St', 'Tribe N', 'Buddhism', 'Rachel Clark', '1334455667', 'steven.clark@example.com', '2024-06-23', 'password1111', '14', NULL, 'photo14.jpg', 'Not Admitted', 'No', 'DOC014', '14', 750, 'No', 'Premium'),
(128, '15', 'Karen Robinson', 40, 'Female', 'Teacher', 'Married', '1212 Pine St', 'Tribe O', 'Judaism', 'David Robinson', '1445566778', 'karen.robinson@example.com', '2024-06-23', 'password1212', '15', NULL, 'photo15.jpg', 'Admitted', 'Yes', 'DOC015', '15', 800, 'Yes', 'Standard'),
(129, '16', 'Brian Walker', 31, 'Male', 'Doctor', 'Single', '1313 Cedar St', 'Tribe P', 'Christianity', 'Laura Walker', '1556677889', 'brian.walker@example.com', '2024-06-23', 'password1313', '16', NULL, 'photo16.jpg', 'Not Admitted', 'No', 'DOC016', '16', 850, 'No', 'Premium'),
(130, '17', 'Jessica Hall', 33, 'Female', 'Lawyer', 'Married', '1414 Spruce St', 'Tribe Q', 'Islam', 'Robert Hall', '1667788990', 'jessica.hall@example.com', '2024-06-23', 'password1414', '17', NULL, 'photo17.jpg', 'Admitted', 'Yes', 'DOC017', '17', 900, 'Yes', 'Standard'),
(131, '18', 'Kevin Allen', 44, 'Male', 'Nurse', 'Single', '1515 Willow St', 'Tribe R', 'Hinduism', 'Mary Allen', '1778899001', 'kevin.allen@example.com', '2024-06-23', 'password1515', '18', NULL, 'photo18.jpg', 'Not Admitted', 'No', 'DOC018', '18', 950, 'No', 'Premium'),
(132, '19', 'Lisa Wright', 29, 'Female', 'Engineer', 'Married', '1616 Birch St', 'Tribe S', 'Buddhism', 'James Wright', '1889900112', 'lisa.wright@example.com', '2024-06-23', 'password1616', '19', NULL, 'photo19.jpg', 'Admitted', 'Yes', 'DOC019', '19', 1000, 'Yes', 'Standard');

-- --------------------------------------------------------

--
-- Table structure for table `patient_test`
--

CREATE TABLE `patient_test` (
  `id` int(11) NOT NULL,
  `test_id` int(11) DEFAULT NULL,
  `result` varchar(255) DEFAULT NULL,
  `approved_by` varchar(255) DEFAULT NULL,
  `passkey` varchar(40) DEFAULT NULL,
  `dated_created` datetime DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `patient_id` varchar(30) DEFAULT NULL,
  `taken_by` int(11) DEFAULT NULL,
  `payment_status` varchar(30) DEFAULT NULL,
  `hmo` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `dpt` int(11) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `rerun` int(11) DEFAULT NULL,
  `clerking_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_test`
--

INSERT INTO `patient_test` (`id`, `test_id`, `result`, `approved_by`, `passkey`, `dated_created`, `status`, `patient_id`, `taken_by`, `payment_status`, `hmo`, `amount`, `dpt`, `payment_method`, `staff_id`, `comments`, `rerun`, `clerking_id`) VALUES
(1, 3, '11.78gm', '7103', '11999225', '2024-06-23 17:05:59', '4', '11919', 38, 'paid', 0, 30000.98, 4, 'accounts', 7103, 'ok', 4, NULL),
(2, 5, NULL, NULL, '5284934', '2024-06-23 17:06:01', '2', '11919', 38, 'paid', 0, 34000.77, 7, 'accounts', 7103, NULL, NULL, NULL),
(6, 3, 'kay tschjvuvewvuew', '7103', '4464698', '2024-07-04 23:15:48', '4', '11919', 38, 'paid', 0, 30000.98, 4, 'accounts', 7103, 'everythn', 4, NULL),
(7, 3, NULL, NULL, '2736245', '2024-07-16 15:19:17', '0', '11919', 36, 'notpaid', 0, 30000.98, 4, NULL, NULL, NULL, NULL, NULL),
(8, 5, NULL, NULL, '8627814', '2024-07-16 15:22:54', '0', '11919', 36, 'notpaid', 0, 34000.77, 7, NULL, NULL, NULL, NULL, NULL),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 8, NULL, NULL, '2310781', '2024-08-19 20:24:43', '0', '11919', 36, 'notpaid', 0, 8900, 1, NULL, NULL, NULL, NULL, NULL),
(11, 11, NULL, NULL, '7333948', '2024-08-19 20:24:46', '0', '11919', 36, 'notpaid', 0, 12000, 1, NULL, NULL, NULL, NULL, NULL),
(12, 12, NULL, NULL, '2053054', '2024-08-19 20:24:50', '0', '11919', 36, 'notpaid', 0, 2000, 1, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patient_test_radio`
--

CREATE TABLE `patient_test_radio` (
  `id` int(11) NOT NULL,
  `test_id` int(11) DEFAULT NULL,
  `result` varchar(255) DEFAULT NULL,
  `approved_by` varchar(255) DEFAULT NULL,
  `passkey` varchar(40) DEFAULT NULL,
  `dated_created` datetime DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `patient_id` varchar(30) DEFAULT NULL,
  `taken_by` int(11) DEFAULT NULL,
  `payment_status` varchar(30) DEFAULT NULL,
  `hmo` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `dpt` int(11) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `rerun` int(11) DEFAULT NULL,
  `photo1` varchar(255) DEFAULT NULL,
  `photo2` varchar(255) DEFAULT NULL,
  `photo3` varchar(255) DEFAULT NULL,
  `photo4` varchar(255) DEFAULT NULL,
  `clerking_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_test_radio`
--

INSERT INTO `patient_test_radio` (`id`, `test_id`, `result`, `approved_by`, `passkey`, `dated_created`, `status`, `patient_id`, `taken_by`, `payment_status`, `hmo`, `amount`, `dpt`, `payment_method`, `staff_id`, `comments`, `rerun`, `photo1`, `photo2`, `photo3`, `photo4`, `clerking_id`) VALUES
(1, 13, NULL, '8702', '4338475', '2024-06-23 16:41:25', '1', '1', 36, 'paid', 0, 142000, 3, 'hmo', NULL, 'ok', NULL, '47009235418663259178WhatsApp Image 2024-06-04 at 7.08.25 PM (1).jpeg', '68379031509426547128WhatsApp Image 2024-06-04 at 7.08.25 PM.jpeg', '', '', NULL),
(2, 17, NULL, NULL, '4475855', '2024-06-23 16:41:27', '1', '1', 36, 'paid', 0, 93000, 3, 'hmo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 18, NULL, NULL, '4819123', '2024-06-23 16:41:28', '1', '1', 36, 'paid', 0, 30000, 4, 'hmo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 13, NULL, '7103', '3480783', '2024-06-23 17:02:23', '4', '1', 38, 'paid', 0, 142000, 3, 'hmo', NULL, 'new test', NULL, '47451820372036969851wealth-planning.jpg', '89471581945702233066investing.jpg', '60983564219071547832service2.jpg', '71580395619043764228service5.jpg', NULL),
(5, 13, NULL, NULL, '4128271', '2024-06-23 17:05:30', '1', '11919', 38, 'paid', 0, 142000, 3, 'hmo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 17, NULL, NULL, '2981189', '2024-06-23 17:05:32', '1', '11919', 38, 'paid', 0, 93000, 3, 'hmo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 13, NULL, NULL, '9581481', '2024-07-01 12:24:35', '1', '11919', 38, 'paid', 0, 142000, 3, 'hmo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 13, NULL, NULL, '8142067', '2024-07-04 22:53:14', '0', '11919', 38, 'notpaid', 0, 142000, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 18, NULL, NULL, '2286215', '2024-07-04 22:53:22', '0', '11919', 38, 'notpaid', 0, 30000, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `id` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `choosen_date` datetime DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `batch_id` varchar(30) DEFAULT NULL,
  `send_to_account` varchar(10) DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`id`, `pid`, `amount`, `payment_status`, `created_on`, `choosen_date`, `status`, `qty`, `batch_id`, `send_to_account`) VALUES
(13, 18, 40000, 'yes', '2024-05-19 11:48:24', '2024-05-12 10:48:00', '1', 50, 'K0302', 'paid'),
(15, 20, 6000, 'yes', '2024-05-19 17:10:42', '2024-05-20 16:10:00', '1', 50, 'N02p', 'paid'),
(17, 19, 10000, 'yes', '2024-05-19 17:20:17', '2024-04-30 16:20:00', '1', 30, '', 'paid'),
(18, 19, 30000, 'yes', '2024-05-19 20:23:00', '2024-05-16 19:22:00', '1', 12, '', 'paid'),
(19, 20, 1400000, 'yes', '2024-05-19 20:24:09', '2024-05-29 19:24:00', '1', 300000, 'dscsd23', 'paid'),
(20, 19, 900000, 'yes', '2024-05-20 00:40:38', '2024-05-09 23:40:00', '1', 44, '312', 'paid'),
(21, 18, 12000, 'yes', '2024-05-29 20:09:15', '2024-05-29 19:09:00', '0', 40, 'Q100', 'paid'),
(22, 18, 990000, 'yes', '2024-06-12 12:20:29', '2024-06-12 11:20:00', '1', 77, 'bbf', 'paid'),
(23, 18, 15000, 'yes', '2024-07-04 23:34:16', '2024-07-04 22:34:00', '1', 1000, 'T100', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `radio_departments`
--

CREATE TABLE `radio_departments` (
  `DepartmentID` int(11) NOT NULL,
  `DepartmentName` varchar(100) DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `radio_departments`
--

INSERT INTO `radio_departments` (`DepartmentID`, `DepartmentName`, `CreatedAt`) VALUES
(1, 'Ultrasound suite', '2024-06-03 23:35:39'),
(2, 'X-Ray suite', '2024-06-03 23:35:39'),
(3, 'Fluoroscopy suite', '2024-06-03 23:35:57'),
(4, 'Electrophysiology suite', '2024-06-03 23:35:57'),
(5, 'Computed Tomography suite', '2024-06-03 23:36:44'),
(6, 'Magnetic Resonance suite', '2024-06-03 23:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `radio_graphy_test`
--

CREATE TABLE `radio_graphy_test` (
  `id` int(11) NOT NULL,
  `radio_dpt` int(11) DEFAULT NULL,
  `sample` varchar(150) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `test_dated` varchar(30) DEFAULT current_timestamp(),
  `test_code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `radio_graphy_test`
--

INSERT INTO `radio_graphy_test` (`id`, `radio_dpt`, `sample`, `amount`, `test_dated`, `test_code`) VALUES
(13, 3, 'Abdominal X-ray', 142000, '2024-06-09 20:41:47', 200922),
(17, 3, 'Spine X-ray', 93000, '2024-06-10 00:23:06', 862579),
(18, 4, 'Hysterosalpingography (HSG)', 30000, '2024-06-10 10:55:32', 1002728),
(19, 5, 'Barium Enema', 5000, '2024-06-12 22:42:11', 844838);

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

CREATE TABLE `referrals` (
  `id` int(11) NOT NULL,
  `report_info` text DEFAULT NULL,
  `doc_id` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `created_date` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `referrals`
--

INSERT INTO `referrals` (`id`, `report_info`, `doc_id`, `pid`, `created_date`) VALUES
(6, 'Hello Edwin,\n\n \n\nWe would like to inform you of a recent directive issued by the Central Bank of Nigeria (CBN) regarding changes in collateral policy for Naira loans. According to the CBN circular: BSD/DIR/PUB/LAB/017/004, loans currently secured with dollar-denominated collateral are now prohibited, except under specific circumstances.\n\n  \n\nIf you currently have a loan secured with such collateral, you are required to pay it off completely within 90 days (approximately 3 months). \n\n \n\nForeign currency collateral can only be used for Naira loans in cases where the collateral is in the form of: \n\nEurobonds issued by the Federal Government of Nigeria \nGuarantees provided by foreign banks, including Standby Letters of Credit', 8702, 9342, '2024-06-02 18:30:39'),
(7, 'Hello Edwin Eke,\n\nWe would like to inform you of a recent directive issued by the Central Bank of Nigeria (CBN) regarding changes in collateral policy for Naira loans. According to the CBN circular: BSD/DIR/PUB/LAB/017/004, loans currently secured with dollar-denominated collateral are now prohibited, except under specific circumstances.\n\n  \n\nIf you currently have a loan secured with such collateral, you are required to pay it off completely within 90 days (approximately 3 months). \n\n \n\nForeign currency collateral can only be used for Naira loans in cases where the collateral is in the form of: \n\nEurobonds issued by the Federal Government of Nigeria \nGuarantees provided by foreign banks, including Standby Letters of Credit', 8702, 7938, '2024-06-02 18:31:32'),
(8, 'Follow-up appointment for recent illness; check-up and review of test', 7103, 11919, '2024-06-23 19:15:57');

-- --------------------------------------------------------

--
-- Table structure for table `services_categories`
--

CREATE TABLE `services_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services_categories`
--

INSERT INTO `services_categories` (`id`, `name`, `description`) VALUES
(2, 'Cardiology', 'Heart-related treatments and diagnostics.'),
(3, 'Neurology', 'Treatment of brain and nervous system disorders.'),
(4, 'Orthopedics', 'Bone and joint care services.'),
(5, 'Pediatrics', 'Healthcare for infants, children, and adolescents.'),
(6, 'Dermatology', 'Skin care and treatment services.'),
(7, 'Ophthalmology', 'Eye care, including surgery and vision correction.'),
(8, 'Gastroenterology', 'Digestive system care and treatments.'),
(9, 'Endocrinology', 'Hormone and gland disorder treatments.'),
(10, 'Oncology', 'Cancer diagnosis and treatment services.'),
(11, 'Pulmonology', 'Respiratory system and lung care services.'),
(12, 'Urology', 'Urinary tract and male reproductive system care.'),
(13, 'Nephrology', 'Kidney care and treatment services.'),
(14, 'Psychiatry', 'Mental health and behavioral therapy services.'),
(15, 'Radiology', 'Imaging services including X-rays, CT scans, and MRIs.'),
(16, 'Emergency Medicine', '24/7 emergency care and urgent care services.'),
(17, 'Anesthesiology', 'Pain management and anesthesia services.'),
(18, 'Rheumatology', 'Treatment of joint, muscle, and autoimmune disorders.'),
(19, 'Infectious Diseases', 'Care for bacterial, viral, and parasitic infections.'),
(20, 'Plastic Surgery', 'Reconstructive and cosmetic surgery services.'),
(21, 'Geriatrics', 'Healthcare services for elderly patients.');

-- --------------------------------------------------------

--
-- Table structure for table `services_hospital`
--

CREATE TABLE `services_hospital` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services_hospital`
--

INSERT INTO `services_hospital` (`id`, `category_id`, `name`, `description`, `amount`) VALUES
(2, 1, 'ECG', 'Electrocardiogram to check heart health.', 50.00),
(3, 1, 'Echocardiogram', 'Ultrasound of the heart.', 150.00),
(4, 2, 'EEG', 'Electroencephalogram for brain activity.', 120.00),
(5, 2, 'MRI Brain Scan', 'Magnetic resonance imaging of the brain.', 500.00),
(6, 3, 'Fracture Treatment', 'Care and treatment of broken bones.', 300.00),
(7, 3, 'Joint Replacement Surgery', 'Surgical replacement of damaged joints.', 8000.00),
(8, 4, 'Child Vaccination', 'Immunization for children.', 40.00),
(9, 4, 'Pediatric Consultation', 'Routine check-ups for children.', 60.00),
(10, 5, 'Skin Biopsy', 'Removal of skin tissue for examination.', 200.00),
(11, 5, 'Acne Treatment', 'Care and treatment of acne.', 80.00),
(12, 6, 'Vision Test', 'Eye examination to check vision.', 30.00),
(13, 6, 'Cataract Surgery', 'Surgery to remove cataracts from the eyes.', 1200.00),
(14, 7, 'Endoscopy', 'Examination of the digestive tract.', 400.00),
(15, 7, 'Colon Polyp Removal', 'Surgical removal of polyps from the colon.', 600.00),
(16, 8, 'Thyroid Function Test', 'Blood test to check thyroid function.', 70.00),
(17, 8, 'Diabetes Management', 'Care and treatment of diabetes.', 100.00),
(18, 9, 'Chemotherapy', 'Cancer treatment with drugs.', 1500.00),
(19, 9, 'Radiation Therapy', 'Cancer treatment with radiation.', 2000.00),
(20, 10, 'Pulmonary Function Test', 'Test to check lung function.', 80.00),
(21, 10, 'Bronchoscopy', 'Procedure to view the inside of the lungs.', 700.00),
(22, 11, 'Kidney Dialysis', 'Procedure to remove waste from the blood.', 250.00),
(23, 11, 'Kidney Stone Removal', 'Surgical procedure to remove kidney stones.', 1500.00),
(24, 12, 'Mental Health Counseling', 'Therapy sessions for mental health support.', 100.00),
(25, 12, 'Psychiatric Evaluation', 'Comprehensive mental health assessment.', 200.00),
(26, 13, 'X-ray', 'Imaging to view the inside of the body.', 50.00),
(27, 13, 'CT Scan', 'Detailed imaging using computed tomography.', 400.00),
(28, 14, 'Emergency Room Visit', 'Immediate medical attention for emergencies.', 150.00),
(29, 14, 'Ambulance Service', 'Emergency transportation to the hospital.', 100.00),
(30, 15, 'General Anesthesia', 'Anesthesia for major surgical procedures.', 500.00),
(31, 15, 'Local Anesthesia', 'Anesthesia for minor surgical procedures.', 150.00),
(32, 16, 'Joint Aspiration', 'Removal of fluid from a joint.', 300.00),
(33, 16, 'Autoimmune Disease Management', 'Care and treatment of autoimmune disorders.', 250.00),
(34, 17, 'HIV Treatment', 'Antiviral therapy for HIV.', 500.00),
(35, 17, 'Tuberculosis Treatment', 'Care and treatment for tuberculosis.', 200.00),
(36, 18, 'Breast Reconstruction Surgery', 'Surgery to reconstruct the breast.', 5000.00),
(37, 18, 'Rhinoplasty', 'Cosmetic surgery to reshape the nose.', 4000.00),
(38, 19, 'Geriatric Consultation', 'Healthcare services for elderly patients.', 60.00),
(39, 19, 'Dementia Care', 'Specialized care for dementia patients.', 150.00),
(40, 20, 'Root Canal Treatment', 'Dental procedure to treat infected teeth.', 300.00),
(41, 20, 'Teeth Whitening', 'Cosmetic dental procedure to whiten teeth.', 200.00);

-- --------------------------------------------------------

--
-- Table structure for table `specializations`
--

CREATE TABLE `specializations` (
  `id` int(11) NOT NULL,
  `specializations_name` varchar(255) DEFAULT NULL,
  `date_created` varchar(30) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specializations`
--

INSERT INTO `specializations` (`id`, `specializations_name`, `date_created`, `status`) VALUES
(5, 'Pediatricsa', NULL, 1),
(9, 'Neurology', NULL, 1),
(10, 'Oncology', NULL, 1),
(11, 'Radiology', NULL, 1),
(16, 'Psychology', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `staffs_accounts`
--

CREATE TABLE `staffs_accounts` (
  `id` int(11) NOT NULL,
  `staff_id` varchar(30) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `sex` varchar(30) DEFAULT NULL,
  `marital_status` varchar(30) DEFAULT NULL,
  `phone` varchar(33) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `next_of_kin` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `tribe` varchar(255) DEFAULT NULL,
  `salary` float(10,0) DEFAULT 0,
  `state_of_origin` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `specialist_id` int(11) DEFAULT NULL,
  `access_level_id` int(11) DEFAULT NULL,
  `date_added` varchar(244) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `login_sec` varchar(255) DEFAULT NULL,
  `hmo_key` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staffs_accounts`
--

INSERT INTO `staffs_accounts` (`id`, `staff_id`, `username`, `firstname`, `lastname`, `age`, `qualification`, `department_id`, `occupation`, `sex`, `marital_status`, `phone`, `email_address`, `password`, `next_of_kin`, `religion`, `tribe`, `salary`, `state_of_origin`, `nationality`, `photo`, `specialist_id`, `access_level_id`, `date_added`, `address`, `login_sec`, `hmo_key`) VALUES
(36, '8702', 'wilson_dickson', 'sunday', 'dickson', NULL, 'Radiograpy', 9, 'socium 123', 'Male', 'Single', '+234-344-333-231', 'diona@mail.com', '1234567', '', 'Islam', '', 1000001, 'River State', 'Nigeria', '88921024733051956647profilepicture-2-portrait-head.jpeg', 10, 1, '2024-03-04 19:08:43', NULL, 'e45221df59af107296903376401c9dd3af820446e82fbf6d8d99fa39703cc1e5', 4),
(37, '6968', 'Darlington4334', 'Darlington', 'Markswell', NULL, NULL, 9, NULL, 'Female', 'Divorced', '+133-344-333-234', 'markswql32@gmail.com', '$2y$10$17Gl9nwUUj0IvfX.dtD7/.ePRdVzkrPnrakBe4Kxeln7YNCyFXgoG', NULL, NULL, NULL, 0, NULL, NULL, '19263249508507174638profilepicture-2-portrait-head.jpeg', 11, 3, '2024-03-04 19:09:38', NULL, NULL, NULL),
(38, '7103', 'jude230404', 'James', 'Judes', NULL, 'doc', 5, 'test', 'Male', 'Single', '+1-959-434-333', 'jude@gmail.com', '12345678', 'test1', 'Islam', 'test2', 0, 'test3', 'test4', '59036974417032658281testimonial3.png', 5, 1, '2024-03-04 19:11:01', '', 'c855490cca3c62647712b70accc1649160369495aa67ef5f2d5cb962a19dc4d6', 3),
(40, '11910', 'Ijeoma23323', 'Peter', 'Ijeoma', NULL, NULL, 1, NULL, 'Female', 'Single', '+55-959-434-333', 'Ijeoma@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, '96900264384358715127favicon.png', 5, 6, '2024-03-04 19:20:53', '', NULL, NULL),
(41, '12133', 'john23323', 'John', 'brown', NULL, NULL, 10, NULL, 'Female', 'Single', '+33-959-434-333', 'Joyce@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 16, 6, '2024-03-04 19:21:39', NULL, NULL, 4),
(47, '1371', 'vincent', 'Vincent', 'ZIglang', NULL, NULL, 9, NULL, 'Male', 'Married', '03903949494', 'vincent@mail.com', '$2y$10$tvrOLVTn37lYkgPPDY2f/u4XX3Nh9x1K1XHButGAqR1yjSG6Fzv0S', NULL, NULL, NULL, NULL, NULL, NULL, '28376455614700829193Ndubuisi_Mbah.jpeg', 10, 1, '2024-03-10 20:09:18', NULL, '06e3a9b82f4e6f85ae88fea9e96febb9fefd7da4e697d92bc0f28745a59dbaef', 4);

-- --------------------------------------------------------

--
-- Table structure for table `transactions_account`
--

CREATE TABLE `transactions_account` (
  `id` int(11) NOT NULL,
  `account_no` int(11) NOT NULL DEFAULT 0,
  `cr` float NOT NULL DEFAULT 0,
  `dr` float NOT NULL DEFAULT 0,
  `balance` float NOT NULL DEFAULT 0,
  `date_creation` varchar(50) DEFAULT NULL,
  `posted_date` varchar(50) DEFAULT NULL,
  `emp_id` int(11) DEFAULT 0,
  `pid` int(11) NOT NULL DEFAULT 0,
  `rev_status` varchar(20) NOT NULL DEFAULT 'no',
  `auto_approve` int(11) DEFAULT 0,
  `from_acc` int(11) NOT NULL DEFAULT 0,
  `to_acc` int(11) NOT NULL DEFAULT 0,
  `end_of_day` varchar(30) NOT NULL DEFAULT 'no',
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_list`
--
ALTER TABLE `account_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asset`
--
ALTER TABLE `asset`
  ADD PRIMARY KEY (`asset_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discharge_summary`
--
ALTER TABLE `discharge_summary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drugs_list`
--
ALTER TABLE `drugs_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drug_brand_category`
--
ALTER TABLE `drug_brand_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drug_category`
--
ALTER TABLE `drug_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drug_supplier`
--
ALTER TABLE `drug_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `encounters_clerking`
--
ALTER TABLE `encounters_clerking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_category`
--
ALTER TABLE `expense_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hmo`
--
ALTER TABLE `hmo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hmo_lab_group`
--
ALTER TABLE `hmo_lab_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hmo_payment_requests`
--
ALTER TABLE `hmo_payment_requests`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `hmo_pharmacy_group`
--
ALTER TABLE `hmo_pharmacy_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hmo_profiles`
--
ALTER TABLE `hmo_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hmo_radio_group`
--
ALTER TABLE `hmo_radio_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hmo_request_window`
--
ALTER TABLE `hmo_request_window`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hmo_specialist_group`
--
ALTER TABLE `hmo_specialist_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital_config`
--
ALTER TABLE `hospital_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_kit`
--
ALTER TABLE `lab_kit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_test_case`
--
ALTER TABLE `lab_test_case`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_test_result_config`
--
ALTER TABLE `lab_test_result_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_request`
--
ALTER TABLE `leave_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_data`
--
ALTER TABLE `patient_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone_no` (`phone_no`),
  ADD UNIQUE KEY `pid` (`pid`);

--
-- Indexes for table `patient_test`
--
ALTER TABLE `patient_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_test_radio`
--
ALTER TABLE `patient_test_radio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cc` (`test_id`),
  ADD KEY `cc1` (`test_id`,`result`,`dpt`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `radio_departments`
--
ALTER TABLE `radio_departments`
  ADD PRIMARY KEY (`DepartmentID`);

--
-- Indexes for table `radio_graphy_test`
--
ALTER TABLE `radio_graphy_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referrals`
--
ALTER TABLE `referrals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_categories`
--
ALTER TABLE `services_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_hospital`
--
ALTER TABLE `services_hospital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specializations`
--
ALTER TABLE `specializations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffs_accounts`
--
ALTER TABLE `staffs_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_address` (`email_address`);

--
-- Indexes for table `transactions_account`
--
ALTER TABLE `transactions_account`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_list`
--
ALTER TABLE `account_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `asset`
--
ALTER TABLE `asset`
  MODIFY `asset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `discharge_summary`
--
ALTER TABLE `discharge_summary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `drugs_list`
--
ALTER TABLE `drugs_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `drug_brand_category`
--
ALTER TABLE `drug_brand_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `drug_category`
--
ALTER TABLE `drug_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `drug_supplier`
--
ALTER TABLE `drug_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `encounters_clerking`
--
ALTER TABLE `encounters_clerking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense_category`
--
ALTER TABLE `expense_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hmo`
--
ALTER TABLE `hmo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hmo_lab_group`
--
ALTER TABLE `hmo_lab_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `hmo_payment_requests`
--
ALTER TABLE `hmo_payment_requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `hmo_pharmacy_group`
--
ALTER TABLE `hmo_pharmacy_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `hmo_profiles`
--
ALTER TABLE `hmo_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `hmo_radio_group`
--
ALTER TABLE `hmo_radio_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `hmo_request_window`
--
ALTER TABLE `hmo_request_window`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `hmo_specialist_group`
--
ALTER TABLE `hmo_specialist_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `hospital_config`
--
ALTER TABLE `hospital_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lab_kit`
--
ALTER TABLE `lab_kit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `lab_test_case`
--
ALTER TABLE `lab_test_case`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `lab_test_result_config`
--
ALTER TABLE `lab_test_result_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_request`
--
ALTER TABLE `leave_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `patient_data`
--
ALTER TABLE `patient_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `patient_test`
--
ALTER TABLE `patient_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `patient_test_radio`
--
ALTER TABLE `patient_test_radio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `radio_departments`
--
ALTER TABLE `radio_departments`
  MODIFY `DepartmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `radio_graphy_test`
--
ALTER TABLE `radio_graphy_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `referrals`
--
ALTER TABLE `referrals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `services_categories`
--
ALTER TABLE `services_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `services_hospital`
--
ALTER TABLE `services_hospital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `specializations`
--
ALTER TABLE `specializations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `staffs_accounts`
--
ALTER TABLE `staffs_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `transactions_account`
--
ALTER TABLE `transactions_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
