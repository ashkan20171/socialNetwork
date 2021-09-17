-- phpMyAdmin SQL Dump
-- version 2.9.0.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost:8080
-- Generation Time: Jul 23, 2014 at 01:41 PM
-- Server version: 5.0.27
-- PHP Version: 5.2.0
-- 
-- Database: `socialdb`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `pardakhtiha`
-- 

CREATE TABLE `pardakhtiha` (
  `email` varchar(100) collate utf8_persian_ci NOT NULL,
  `mablagh` decimal(10,0) NOT NULL,
  `tarikh` varchar(100) collate utf8_persian_ci NOT NULL,
  `transid` varchar(100) collate utf8_persian_ci NOT NULL,
  `idget` varchar(100) collate utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- 
-- Dumping data for table `pardakhtiha`
-- 

INSERT INTO `pardakhtiha` (`email`, `mablagh`, `tarikh`, `transid`, `idget`) VALUES 
('1', 1, '1', '1', '1'),
('ashkan.mataee@yahoo.com', 50000, '1399/8/19', '91800', '30992'),
('ashkan.mataee@yahoo.com', 10000, '1399/8/19', '86764', '30993'),
('ashkan.mataee@yahoo.com', 100000, '1399/8/19', '498306', '30994'),
('ashkan.mataee@yahoo.com', 10000, '1399/8/19', '434477', '31003'),
('ashkan.mataee@yahoo.com', 10000, '1399/8/19', '175775', '31004'),
('ashkan.mataee@yahoo.com', -150, '1399/8/20', 'sms', ''),
('ashkan.mataee@yahoo.com', -150, '1399/8/20', 'sms', ''),
('ashkan.mataee@yahoo.com', -150, '1399/8/20', 'sms', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `paylinesetting`
-- 

CREATE TABLE `paylinesetting` (
  `test` int(1) NOT NULL default '1',
  `api` varchar(100) collate utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- 
-- Dumping data for table `paylinesetting`
-- 

INSERT INTO `paylinesetting` (`test`, `api`) VALUES 
(0, '870da-25fe3-d25d7-1ed91-0fa0038c6cc3485922f472c3312f');

-- --------------------------------------------------------

-- 
-- Table structure for table `sentsms`
-- 

CREATE TABLE `sentsms` (
  `email` varchar(100) collate utf8_persian_ci NOT NULL,
  `from` varchar(50) collate utf8_persian_ci NOT NULL,
  `to` varchar(50) collate utf8_persian_ci NOT NULL,
  `text` varchar(1000) collate utf8_persian_ci NOT NULL,
  `tarikh` varchar(1000) collate utf8_persian_ci NOT NULL,
  `saat` varchar(100) collate utf8_persian_ci NOT NULL,
  `status` varchar(60) collate utf8_persian_ci NOT NULL,
  `id` bigint(10) NOT NULL auto_increment,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `sentsms`
-- 

INSERT INTO `sentsms` (`email`, `from`, `to`, `text`, `tarikh`, `saat`, `status`, `id`) VALUES 
('1', '1', '1', '1', '1', '1', '1', 1),
('ashkan.mataee@yahoo.com', '30002223332115', '09151641217', 'salam', '1399/8/1', '1406117476', '05308989284918198856', 2),
('ashkan.mataee@yahoo.com', '30002223332115', '09151641217', 'Ø³Ù„Ø§Ù…', '1399/8/1', '1406117644', '05299877429763249574', 3),
('ashkan.mataee@yahoo.com', '30002223332115', '09151641217', 'asdsa', '1399/8/1', '1406118925', '05211544701133350968', 4),
('ashkan.mataee@yahoo.com', '30002223332115', '09151641217', 'sadsadas', '1399/8/1', '1406118976', '05109021335159886928', 5);

-- --------------------------------------------------------

-- 
-- Table structure for table `tbladminuser`
-- 

CREATE TABLE `tbladminuser` (
  `fname` varchar(100) collate utf8_persian_ci NOT NULL,
  `lname` varchar(100) collate utf8_persian_ci NOT NULL,
  `email` varchar(100) collate utf8_persian_ci NOT NULL,
  `pass` varchar(100) collate utf8_persian_ci NOT NULL,
  `signupdate` varchar(100) collate utf8_persian_ci NOT NULL,
  `disabled` int(1) NOT NULL,
  PRIMARY KEY  (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- 
-- Dumping data for table `tbladminuser`
-- 

INSERT INTO `tbladminuser` (`fname`, `lname`, `email`, `pass`, `signupdate`, `disabled`) VALUES 
('�Ԙ��', '����??', 'ashkan.mataee@yahoo.com', '1234', '', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `tblfriends`
-- 

CREATE TABLE `tblfriends` (
  `email` varchar(100) collate utf8_persian_ci NOT NULL,
  `targetemail` varchar(100) collate utf8_persian_ci NOT NULL,
  `flag` tinyint(1) NOT NULL,
  `tarikhersal` varchar(100) collate utf8_persian_ci NOT NULL,
  `tarikhtayid` varchar(100) collate utf8_persian_ci NOT NULL,
  `codegroup` varchar(100) collate utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- 
-- Dumping data for table `tblfriends`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `tblgroup`
-- 

CREATE TABLE `tblgroup` (
  `email` varchar(100) collate utf8_persian_ci NOT NULL,
  `id` varchar(100) collate utf8_persian_ci NOT NULL,
  `name` varchar(100) collate utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- 
-- Dumping data for table `tblgroup`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `tbltahsili`
-- 

CREATE TABLE `tbltahsili` (
  `email` varchar(100) collate utf8_persian_ci NOT NULL,
  `reshte` varchar(100) collate utf8_persian_ci NOT NULL,
  `gerayesh` varchar(100) collate utf8_persian_ci NOT NULL,
  `daneshgah` varchar(100) collate utf8_persian_ci NOT NULL,
  `tarikhedefa` varchar(100) collate utf8_persian_ci NOT NULL,
  `skill` varchar(1000) collate utf8_persian_ci NOT NULL,
  `shahr` varchar(100) collate utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- 
-- Dumping data for table `tbltahsili`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `tbluserinfo`
-- 

CREATE TABLE `tbluserinfo` (
  `email` varchar(100) collate utf8_persian_ci NOT NULL,
  `tell` varchar(100) collate utf8_persian_ci NOT NULL,
  `tempcode` varchar(10) collate utf8_persian_ci default '0',
  `activetell` tinyint(1) NOT NULL default '0',
  `ostan` varchar(100) collate utf8_persian_ci NOT NULL,
  `shahr` varchar(100) collate utf8_persian_ci NOT NULL,
  `address` varchar(1000) collate utf8_persian_ci NOT NULL,
  `sen` int(2) NOT NULL,
  `gensiyat` tinyint(1) NOT NULL,
  `pic` varchar(100) collate utf8_persian_ci NOT NULL,
  `taahol` varchar(2) collate utf8_persian_ci NOT NULL,
  PRIMARY KEY  (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- 
-- Dumping data for table `tbluserinfo`
-- 

INSERT INTO `tbluserinfo` (`email`, `tell`, `tempcode`, `activetell`, `ostan`, `shahr`, `address`, `sen`, `gensiyat`, `pic`, `taahol`) VALUES 
('mehdi.sherafat@gmail.com', '', '0', 1, '', '', '', 0, 0, '', ''),
('ashkan.mataee@yahoo.com', '09181641217', '5172', 1, '', '', '', 0, 0, '', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `tblusers`
-- 

CREATE TABLE `tblusers` (
  `fname` varchar(100) collate utf8_persian_ci default NULL,
  `lname` varchar(100) collate utf8_persian_ci default NULL,
  `email` varchar(100) collate utf8_persian_ci NOT NULL,
  `pass` varchar(100) collate utf8_persian_ci NOT NULL,
  `signupdate` varchar(100) collate utf8_persian_ci NOT NULL,
  `disabled` smallint(1) NOT NULL default '1',
  `typeofuser` varchar(100) collate utf8_persian_ci NOT NULL,
  `validationkey` varchar(100) collate utf8_persian_ci NOT NULL,
  PRIMARY KEY  (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- 
-- Dumping data for table `tblusers`
-- 

INSERT INTO `tblusers` (`fname`, `lname`, `email`, `pass`, `signupdate`, `disabled`, `typeofuser`, `validationkey`) VALUES 
('Ø¹Ù„ÛŒ', 'Ø¹Ù„ÙˆÛŒ', 'ali@yahoo.com', '653edcb48152db6bfae372cd27d5414b', '1399/8/14', 1, '0', '653edcb48152db6bfae372cd27d5414b'),
('mehdi', 'sherafat', 'mehdi.sherafat@gmail.com', '653edcb48152db6bfae372cd27d5414b', '1399/8/1', 1, '0', '653edcb48152db6bfae372cd27d5414b'),
('ØµØ§Ø¯Ù‚', 'Ù¾Ø§Ø³Ø¨Ø§Ù†', 'ashkan.mataee@yahoo.com', '653edcb48152db6bfae372cd27d5414b', '1399/8/1', 0, '0', '653edcb48152db6bfae372cd27d5414b');

-- --------------------------------------------------------

-- 
-- Table structure for table `tblvaziyatetaahol`
-- 

CREATE TABLE `tblvaziyatetaahol` (
  `id` varchar(2) collate utf8_persian_ci NOT NULL,
  `name` varchar(100) collate utf8_persian_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- 
-- Dumping data for table `tblvaziyatetaahol`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `typeofuser`
-- 

CREATE TABLE `typeofuser` (
  `id` int(100) NOT NULL auto_increment,
  `name` varchar(100) collate utf8_persian_ci NOT NULL,
  `isdefault` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `typeofuser`
-- 

