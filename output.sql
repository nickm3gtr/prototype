-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2018 at 12:59 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `output`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_titles`
--

CREATE TABLE `account_titles` (
  `acct_id` int(11) NOT NULL,
  `acct_code` varchar(50) NOT NULL,
  `acct_name` varchar(50) NOT NULL,
  `categoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_titles`
--

INSERT INTO `account_titles` (`acct_id`, `acct_code`, `acct_name`, `categoryID`) VALUES
(1, 'vehicle', 'Vehicle', 1),
(2, 'accounts_payable', 'Accounts Payable', 2),
(3, 'office_equipment', 'Office Equipment', 1),
(4, 'accounts_payable', 'Accounts Payable', 2),
(5, 'commission_expense', 'Commission Expense', 3),
(6, 'cash', 'Cash', 1),
(7, 'capital', 'Capital', 5);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL,
  `category_code` varchar(50) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `category_code`, `category_name`) VALUES
(1, 'assets', 'Assets'),
(2, 'liabilities', 'Liabilities'),
(3, 'expenses', 'Expenses'),
(4, 'income', 'Income'),
(5, 'equity', 'Equity');

-- --------------------------------------------------------

--
-- Table structure for table `credits`
--

CREATE TABLE `credits` (
  `creditID` int(11) NOT NULL,
  `transID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `acct_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credits`
--

INSERT INTO `credits` (`creditID`, `transID`, `user_id`, `acct_id`, `amount`) VALUES
(3, 1, 14, 7, '150000.00'),
(4, 2, 14, 1, '7500.00'),
(5, 4, 14, 2, '7000.00');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerID` int(11) NOT NULL,
  `cust_fname` varchar(200) NOT NULL,
  `cust_lname` varchar(200) NOT NULL,
  `cust_email` varchar(100) NOT NULL,
  `cust_password` varchar(100) NOT NULL,
  `cust_gender` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerID`, `cust_fname`, `cust_lname`, `cust_email`, `cust_password`, `cust_gender`) VALUES
(1, 'John', 'Doe', 'jdoe@gmail.com', '202cb962ac59075b964b07152d234b70', 'Male'),
(2, 'Brad', 'Traversy', 'btraversy@gmail.com', '202cb962ac59075b964b07152d234b70', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `debits`
--

CREATE TABLE `debits` (
  `debitID` int(11) NOT NULL,
  `transID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `acct_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `debits`
--

INSERT INTO `debits` (`debitID`, `transID`, `user_id`, `acct_id`, `amount`) VALUES
(4, 1, 14, 6, '150000.00'),
(5, 2, 14, 3, '7500.00'),
(6, 4, 14, 1, '7000.00');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `transDesc` text NOT NULL,
  `transDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transID`, `customerID`, `transDesc`, `transDate`) VALUES
(1, 1, 'Invested P150,000 in cash to start business', '2017-01-01'),
(2, 1, 'Paid P7,500 for one month\'s rent', '2017-01-03'),
(3, 2, 'Performed services for P10,500 in cash', '2017-01-05'),
(4, 1, 'Received P7,000 from credit clients', '2017-02-15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `password`, `gender`) VALUES
(14, 'Nick', 'Lobaton', 'nickm3gtr@gmail.com', '202cb962ac59075b964b07152d234b70', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_titles`
--
ALTER TABLE `account_titles`
  ADD PRIMARY KEY (`acct_id`),
  ADD KEY `fk_catid` (`categoryID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`),
  ADD UNIQUE KEY `category_code` (`category_code`);

--
-- Indexes for table `credits`
--
ALTER TABLE `credits`
  ADD PRIMARY KEY (`creditID`),
  ADD KEY `fk_credit_user` (`user_id`),
  ADD KEY `fk_credit_accttitle` (`acct_id`),
  ADD KEY `fk_ctransID` (`transID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerID`),
  ADD UNIQUE KEY `cust_email` (`cust_email`);

--
-- Indexes for table `debits`
--
ALTER TABLE `debits`
  ADD PRIMARY KEY (`debitID`),
  ADD KEY `fk_userid` (`user_id`),
  ADD KEY `fk_acct_title` (`acct_id`),
  ADD KEY `fk_dtransID` (`transID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transID`),
  ADD KEY `fk_customerID` (`customerID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_titles`
--
ALTER TABLE `account_titles`
  MODIFY `acct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `credits`
--
ALTER TABLE `credits`
  MODIFY `creditID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `debits`
--
ALTER TABLE `debits`
  MODIFY `debitID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `account_titles`
--
ALTER TABLE `account_titles`
  ADD CONSTRAINT `fk_catid` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`) ON UPDATE CASCADE;

--
-- Constraints for table `credits`
--
ALTER TABLE `credits`
  ADD CONSTRAINT `fk_credit_accttitle` FOREIGN KEY (`acct_id`) REFERENCES `account_titles` (`acct_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_credit_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ctransID` FOREIGN KEY (`transID`) REFERENCES `transactions` (`transID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `debits`
--
ALTER TABLE `debits`
  ADD CONSTRAINT `fk_acct_title` FOREIGN KEY (`acct_id`) REFERENCES `account_titles` (`acct_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_dtransID` FOREIGN KEY (`transID`) REFERENCES `transactions` (`transID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_userid` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `fk_customerID` FOREIGN KEY (`customerID`) REFERENCES `customers` (`customerID`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
