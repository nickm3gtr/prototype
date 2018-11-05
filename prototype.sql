-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2018 at 09:03 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prototype`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_titles`
--

CREATE TABLE `account_titles` (
  `acct_id` int(11) NOT NULL,
  `acct_name` varchar(100) NOT NULL,
  `categoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_titles`
--

INSERT INTO `account_titles` (`acct_id`, `acct_name`, `categoryID`) VALUES
(1, 'Cash', 1),
(2, 'Notes Receivable', 1),
(3, 'Merchandise Inventory', 1),
(4, 'Prepaid Expenses', 1),
(5, 'Land', 1),
(6, 'Building', 1),
(7, 'Notes Payable', 2),
(8, 'Accounts Payable', 2),
(9, 'Capital', 3),
(10, 'Drawing', 3),
(11, 'Sales Revenue', 4),
(12, 'Service Revenue', 4),
(13, 'Rent Expense', 5),
(14, 'Salary Expense', 5),
(15, 'Utilities Expense', 5),
(16, 'Supplies Expense', 5),
(17, 'Advertising Expense', 5),
(18, 'Interest Expense', 5),
(19, 'Office Equipment', 1),
(20, 'Accounts Receivable', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `category_name`) VALUES
(1, 'Assets'),
(2, 'Liabilities'),
(3, 'Owner\'s Equity'),
(4, 'Income'),
(5, 'Expenses');

-- --------------------------------------------------------

--
-- Table structure for table `credits`
--

CREATE TABLE `credits` (
  `creditID` int(11) NOT NULL,
  `transID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `acct_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credits`
--

INSERT INTO `credits` (`creditID`, `transID`, `user_id`, `acct_id`, `amount`, `date`) VALUES
(17, 23, 2, 9, '150000.00', '2018-01-01'),
(18, 24, 2, 1, '7500.00', '2018-01-03'),
(19, 25, 2, 1, '26000.00', '2018-01-04'),
(20, 26, 2, 12, '10500.00', '2018-01-05'),
(21, 27, 2, 1, '55000.00', '2018-01-06'),
(22, 28, 2, 1, '39500.00', '2018-01-12'),
(23, 29, 2, 20, '7000.00', '2018-01-15'),
(24, 30, 2, 1, '8000.00', '2018-01-18');

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
(3, 'Client1', 'Test', 'client1@test.com', '202cb962ac59075b964b07152d234b70', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `debits`
--

CREATE TABLE `debits` (
  `debitID` int(11) NOT NULL,
  `transID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `acct_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `debits`
--

INSERT INTO `debits` (`debitID`, `transID`, `user_id`, `acct_id`, `amount`, `date`) VALUES
(18, 23, 2, 1, '150000.00', '2018-01-01'),
(19, 24, 2, 13, '7500.00', '2018-01-03'),
(20, 25, 2, 19, '26000.00', '2018-01-04'),
(21, 26, 2, 1, '10500.00', '2018-01-05'),
(22, 27, 2, 19, '55000.00', '2018-01-06'),
(23, 28, 2, 19, '39500.00', '2018-01-12'),
(24, 29, 2, 1, '7000.00', '2018-01-15'),
(25, 30, 2, 19, '8000.00', '2018-01-18');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `transDesc` text NOT NULL,
  `transAmount` decimal(10,2) NOT NULL,
  `transDate` date NOT NULL,
  `trans_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transID`, `customerID`, `transDesc`, `transAmount`, `transDate`, `trans_status`) VALUES
(23, 3, 'Invested cash to start business', '150000.00', '2018-01-01', 'journalized'),
(24, 3, 'Paid one month rent', '7500.00', '2018-01-03', 'journalized'),
(25, 3, 'Bought office furniture', '26000.00', '2018-01-04', 'journalized'),
(26, 3, 'Performed services paid in cash', '10500.00', '2018-01-05', 'journalized'),
(27, 3, 'Bought desktop computer', '55000.00', '2018-01-06', 'journalized'),
(28, 3, 'Bought personal copier', '39500.00', '2018-01-12', 'journalized'),
(29, 3, 'Received cash from credit clients', '7000.00', '2018-01-15', 'journalized'),
(30, 3, 'Bought additional office chairs', '8000.00', '2018-01-18', 'journalized');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `password`, `gender`, `status`) VALUES
(2, 'Bookkeeper1', 'Test', 'bookkeeper1@test.com', '202cb962ac59075b964b07152d234b70', 'Male', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_titles`
--
ALTER TABLE `account_titles`
  ADD PRIMARY KEY (`acct_id`),
  ADD KEY `fk_categoryID` (`categoryID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `credits`
--
ALTER TABLE `credits`
  ADD PRIMARY KEY (`creditID`),
  ADD KEY `fk_credit_transid` (`transID`),
  ADD KEY `fk_credits_userid` (`user_id`),
  ADD KEY `fk_credits_acctid` (`acct_id`);

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
  ADD KEY `fk_debit_transid` (`transID`),
  ADD KEY `fk_debit_userid` (`user_id`),
  ADD KEY `fk_debit_acctid` (`acct_id`);

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
  MODIFY `acct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `credits`
--
ALTER TABLE `credits`
  MODIFY `creditID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `debits`
--
ALTER TABLE `debits`
  MODIFY `debitID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `account_titles`
--
ALTER TABLE `account_titles`
  ADD CONSTRAINT `fk_categoryID` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `credits`
--
ALTER TABLE `credits`
  ADD CONSTRAINT `fk_credit_transid` FOREIGN KEY (`transID`) REFERENCES `transactions` (`transID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_credits_acctid` FOREIGN KEY (`acct_id`) REFERENCES `account_titles` (`acct_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_credits_userid` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `debits`
--
ALTER TABLE `debits`
  ADD CONSTRAINT `fk_debit_acctid` FOREIGN KEY (`acct_id`) REFERENCES `account_titles` (`acct_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_debit_transid` FOREIGN KEY (`transID`) REFERENCES `transactions` (`transID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_debit_userid` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `fk_customerID` FOREIGN KEY (`customerID`) REFERENCES `customers` (`customerID`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
