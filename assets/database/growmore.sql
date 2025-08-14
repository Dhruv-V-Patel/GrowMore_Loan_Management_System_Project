-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 15, 2023 at 01:56 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `growmore`
--

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `Id` int(30) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Identity` varchar(1024) NOT NULL,
  `Residence` varchar(1024) NOT NULL,
  `SalarySlips` varchar(1024) NOT NULL,
  `Passbook` varchar(1024) NOT NULL,
  `KYCDocument` varchar(1024) NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`Id`, `Name`, `Email`, `Identity`, `Residence`, `SalarySlips`, `Passbook`, `KYCDocument`, `timestamp`) VALUES
(2, 'Administrator', 'admin@gmail.com', 'Administrator-1682246135-GrowMore Capital Funding and Management.jpg', 'Administrator-1682246135-Home_Loan GrowMore.jpg', 'Administrator-1682246135-Vehicle_loan GrowMore.jpg', 'Administrator-1682246135-images.jpg', 'Administrator-1682246135-profile.jpg', '2023-04-23 16:05:35'),
(3, 'dhruv', 'dhruv@gmail.com', 'dhruv-1682326993-GrowMore Capital Funding and Management.jpg', 'dhruv-1682326993-images.jpg', 'dhruv-1682326993-GM Logo1.jpg', 'dhruv-1682326993-download.png', 'dhruv-1682326993-avatar.jpg', '2023-04-24 14:33:13'),
(4, 'Dhruv Patel', 'dhruv@gmail.com', 'Dhruv Patel-1682492855-download.png', 'Dhruv Patel-1682492855-GrowMore.jpg', 'Dhruv Patel-1682492855-images.jpg', 'Dhruv Patel-1682492855-avatar.jpg', 'Dhruv Patel-1682492855-profile.jpg', '2023-04-26 12:37:35');

-- --------------------------------------------------------

--
-- Table structure for table `loan_application`
--

CREATE TABLE `loan_application` (
  `id` int(200) NOT NULL,
  `Loan_ID` varchar(50) NOT NULL,
  `U_Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Loan_type` varchar(50) NOT NULL,
  `Loan_amount` varchar(100) NOT NULL,
  `Loan_term` int(20) NOT NULL COMMENT 'Loan term in months',
  `Interest_Rate` int(50) NOT NULL,
  `Total_payable_Amount` varchar(50) NOT NULL,
  `Reason` varchar(2048) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loan_application`
--

INSERT INTO `loan_application` (`id`, `Loan_ID`, `U_Name`, `Email`, `Phone`, `Loan_type`, `Loan_amount`, `Loan_term`, `Interest_Rate`, `Total_payable_Amount`, `Reason`, `Status`, `timestamp`) VALUES
(2, 'REFID647689', 'Admin', 'admin@gmail.com', '9945878562', 'Personal Loans', '100000', 48, 9, '118312', 'very important', 'Rejected', '2023-04-23 11:14:44'),
(4, 'REFID633075', 'Dhruv', 'dhruv@gmail.com', '9913062680', 'Small Business', '30000', 24, 8, '32564', 'grb', 'Apporved', '2023-04-26 12:39:08'),
(5, 'REFID216172', 'Dhruv', 'dhruv@gmail.com', '9913062680', 'Business Loan', '145200', 24, 8, '157608', 'nvlkbaa', 'Pending', '2023-05-03 17:11:14'),
(6, 'REFID375333', 'Dhruv', 'dhruv@gmail.com', '9913062680', 'Personal Loans', '10000', 6, 6, '10176', 'thiggv', 'Pending', '2023-05-12 12:40:25');

-- --------------------------------------------------------

--
-- Table structure for table `loan_plan`
--

CREATE TABLE `loan_plan` (
  `id` int(30) NOT NULL,
  `months` int(20) NOT NULL,
  `interest_percentage` float NOT NULL,
  `penalty_rate` float NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loan_plan`
--

INSERT INTO `loan_plan` (`id`, `months`, `interest_percentage`, `penalty_rate`, `timestamp`) VALUES
(1, 24, 8, 2.5, '2023-04-17 19:41:59'),
(2, 48, 8.5, 2.5, '2023-04-22 11:25:07'),
(3, 3, 5, 2.5, '2023-04-30 10:22:15'),
(4, 6, 6, 2.5, '2023-04-30 10:24:20'),
(5, 12, 6.5, 2.5, '2023-04-30 10:23:14');

-- --------------------------------------------------------

--
-- Table structure for table `loan_types`
--

CREATE TABLE `loan_types` (
  `id` int(30) NOT NULL,
  `loan_type` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loan_types`
--

INSERT INTO `loan_types` (`id`, `loan_type`, `description`, `timestamp`) VALUES
(1, 'Small Business Loan', 'A type of loan designed to help businesses obtain financing for a variety of purposes, such as starting a new business, expanding an existing business, or purchasing inventory or equipment. Business loans can be secured or unsecured and have varying interest rates and repayment terms.', '2023-05-12 12:00:48'),
(2, 'Personal Loans', 'A type of loan that can be used for a variety of purposes, such as debt consolidation, home improvements, or unexpected expenses. The borrower usually receives a lump sum of money and makes fixed monthly payments with interest until the loan is paid off.', '2023-04-30 10:45:34'),
(3, 'Mortgage Loan', 'A type of loan used to purchase a home or other real estate property. Mortgage loans usually have long repayment terms, often 15 or 30 years, and require the borrower to make monthly payments that include both principal and interest.', '2023-04-30 10:37:54'),
(4, 'Gold Loan', 'A type of secured loan in which gold jewelry or ornaments are used as collateral. The loan amount is typically a percentage of the value of the gold, and the borrower must repay the loan plus interest within a specified period. The lender has the right to sell the gold if the borrower defaults on the loan. Gold loans are often considered a quick and easy way to obtain cash in emergencies.', '2023-04-30 10:40:42'),
(5, 'Vechical Loan', 'A type of loan taken out to purchase a vehicle, such as a car, truck, or motorcycle. The loan amount is typically based on the cost of the vehicle and may require a down payment. The vehicle serves as collateral for the loan, which means that if the borrower fails to make payments, the lender can repossess the vehicle.', '2023-04-30 10:40:25'),
(6, 'Student Loan', 'A type of loan designed to help students pay for their education expenses, including tuition, room and board, books, and other supplies. Student loans usually have lower interest rates than other types of loans and often have flexible repayment options.', '2023-04-30 10:36:57');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) NOT NULL,
  `Reference_No` varchar(50) NOT NULL,
  `Loan_ID` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Mobile` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `paid_amount` varchar(50) NOT NULL,
  `CIty` varchar(50) NOT NULL,
  `Pay_img` varchar(1024) NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `Reference_No`, `Loan_ID`, `Name`, `Email`, `Mobile`, `Address`, `paid_amount`, `CIty`, `Pay_img`, `timestamp`) VALUES
(1, 'PAYID605290', 'REFID633075', 'Dhruv Patel ', 'dhruv@gmail.com', '9913062680', 'Unjha-384170', '18000', 'Mehsana', 'Dhruv Patel-1683873479-WhatsApp Image 2023-05-12 at 12.05.37 PM.jpeg', '2023-05-12 12:07:59');

-- --------------------------------------------------------

--
-- Table structure for table `user_list`
--

CREATE TABLE `user_list` (
  `u_id` int(30) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_mobile` varchar(50) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `user_img` varchar(1024) DEFAULT NULL,
  `user_gender` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_list`
--

INSERT INTO `user_list` (`u_id`, `user_name`, `user_email`, `user_mobile`, `user_pass`, `timestamp`, `user_img`, `user_gender`) VALUES
(1, 'Administrator', 'admin@gmail.com', '7455896888', '$2y$10$el95GQ5cbPW54Ojc5S/yseegPPogIGoBL6QC5uh11pDjmHGRprk9q', '2023-04-29 19:36:04', '../assets/uploads/profile.jpg', 'Male'),
(2, 'Dhruv Patel', 'dhruv@gmail.com', '7112223334', '$2y$10$ckHHPdWRnwehc6mD6Ib6p.2Othl5ik2AONXrB6TXSq9/MJkEyocOG', '2023-05-01 18:26:03', '../assets/uploads/images.jpg', 'Male'),
(10, 'Shivam Patel', 'tundavshivo@gmail.com', '9157740657', '$2y$10$xVKx.YEcnCsaI8Cms2e5qeJtLgXorT0dUlVf/xnDehOxqeUzkYkb2', '2023-04-25 14:24:12', '../assets/uploads/images.jpg', ''),
(11, 'Raju Patel baby', 'rp@baby.gmail.com', '9909942256', '$2y$10$Czr1jz.7rreVZqx0uTywFe4pWUSMgVJdV4NNy.LpuK9TuxcVgcaV6', '2023-05-08 11:06:59', NULL, 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `loan_application`
--
ALTER TABLE `loan_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_plan`
--
ALTER TABLE `loan_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_types`
--
ALTER TABLE `loan_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_list`
--
ALTER TABLE `user_list`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `user_name_2` (`user_name`),
  ADD UNIQUE KEY `user_email_2` (`user_email`),
  ADD KEY `user_name` (`user_name`),
  ADD KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `Id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `loan_application`
--
ALTER TABLE `loan_application`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `loan_plan`
--
ALTER TABLE `loan_plan`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `loan_types`
--
ALTER TABLE `loan_types`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_list`
--
ALTER TABLE `user_list`
  MODIFY `u_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
