-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2015 at 11:36 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ccapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `accgroups`
--

CREATE TABLE IF NOT EXISTS `accgroups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `groupname` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `lname` text COLLATE utf8_unicode_ci NOT NULL,
  `company` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `address1` text COLLATE utf8_unicode_ci NOT NULL,
  `address2` text COLLATE utf8_unicode_ci NOT NULL,
  `city` text COLLATE utf8_unicode_ci NOT NULL,
  `state` text COLLATE utf8_unicode_ci NOT NULL,
  `postcode` text COLLATE utf8_unicode_ci NOT NULL,
  `country` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `datecreated` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  `groupid` int(10) NOT NULL,
  `lastlogin` datetime DEFAULT NULL,
  `ip` text COLLATE utf8_unicode_ci NOT NULL,
  `host` text COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Active','Inactive','Closed') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `pwresetkey` text COLLATE utf8_unicode_ci NOT NULL,
  `pwresetexpiry` int(10) NOT NULL,
  `emailnotify` enum('Yes','No') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Yes',
  `acctype` enum('Customer','Vendor','Cash','Bank','Investor','Partner','Employee','Consultant','Income','Expense','TAX','Credit-Card','Inventory','Long-Term-Liability','Accounts-Payable','Accounts-Receivable','Equity','Account-Credit','Cost-of-Goods-Sold','Other') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `firstname_lastname` (`name`(32),`lname`(32)),
  KEY `email` (`email`(64))
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `acms`
--

CREATE TABLE IF NOT EXISTS `acms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menuid` int(11) NOT NULL,
  `pagename` varchar(255) NOT NULL,
  `pagetitle` varchar(255) DEFAULT NULL,
  `contents` text,
  `layout` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `published` varchar(255) NOT NULL,
  `update` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `acms`
--

INSERT INTO `acms` (`id`, `menuid`, `pagename`, `pagetitle`, `contents`, `layout`, `author`, `active`, `published`, `update`) VALUES
(1, 0, 'home', 'Business Management Application', '<div class="row-fluid">  \r\n<div class="span12">\r\n<div class="flexslider">\r\n          <ul class="slides">\r\n            <li>\r\n             <img src="../assets/uploads/r/1.jpg" style="">\r\n                \r\n            </li>\r\n           <li>\r\n             <img src="../assets/uploads/r/2.jpg" style="">\r\n           </li>\r\n           \r\n          </ul>\r\n        </div>\r\n\r\n</div>\r\n</div>\r\n<div class="row-fluid"><div class="span12"><h4>BmsApp - An Unique, Awesome, Powerful Business Management Software</h4>\r\n<p>\r\nIt''s a CRM. It''s a Helpdesk Software. It''s a Service selling software. It''s an invoicing software. It''s Client Management Software. It''s a CMS. It''s Responsive, It''s Modern, It''s Awesome, It''s All in One. It''s what you need- BmsAPP.\r\n</p>\r\n<h5>Explore the Demo</h5>\r\n<p>This is a demo installation of BmsAPP.<br>\r\n\r\n<strong>Client Portal Demo</strong><br>\r\n\r\nGo to Account -> Login from Top Menu in this page, To check the Client Portal demo. Use this credentials-<br>\r\nUsername: demo@bmsapp.com<br>\r\nPassword: 123456<br>\r\n<strong>Admin Demo</strong><br>\r\nURL: <a href="http://demo.bmsapp.com/manage" target="_blank">http://demo.bmsapp.com/manage</a><br>\r\nUsername: admin<br>\r\nPassword: 123456<br>\r\n\r\n</p>\r\n</div>\r\n\r\n</div>\r\n<div class="row-fluid"><div class="span12">\r\n<h4>What Clients Are Saying?</h4>\r\n<blockquote>\r\n  <p>One of the best codes I purchased so far. You know when you are dealing with a quality designer. is a must have for any business person that is on here.</p>\r\n  <small>Peter Benjamin, <cite title="Source Title">myoffices.com</cite></small>\r\n</blockquote>\r\n<blockquote>\r\n  <p>I just couldn''t thank you enough for your support and patience. You are very helpful and very understanding. You are AWESOME!!</p>\r\n  <small>tikur</small>\r\n</blockquote>\r\n<blockquote>\r\n  <p>Very nice solution!</p>\r\n  <small>wrynn</small>\r\n</blockquote>\r\n</div>\r\n\r\n</div>\r\n<div class="row-fluid"> \r\n<div class="span12"><div class="promo-box"><h1><span class="txt_color">Delight your customers  with this awesome </span>Software!</h1><ul class="list-separator"><li><span class="txt_color">Buy It Now from Codecanyon, Only @ 35 USD</span></li></ul><a href="http://codecanyon.net/item/all-in-one-business-management-application/4354090?ref=bdinfosys" target="_blank" class="btn_custom">Buy It Now</a></div></div>\r\n\r\n</div>\r\n\r\n \r\n      ', NULL, NULL, 1, '', '2013-04-28 11:22:46');

-- --------------------------------------------------------

--
-- Table structure for table `adminperms`
--

CREATE TABLE IF NOT EXISTS `adminperms` (
  `roleid` int(1) NOT NULL,
  `permid` int(1) NOT NULL,
  KEY `roleid_permid` (`roleid`,`permid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `adminperms`
--

INSERT INTO `adminperms` (`roleid`, `permid`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(3, 16),
(3, 17),
(3, 18),
(3, 19);

-- --------------------------------------------------------

--
-- Table structure for table `adminroles`
--

CREATE TABLE IF NOT EXISTS `adminroles` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `adminroles`
--

INSERT INTO `adminroles` (`id`, `name`) VALUES
(1, 'Full Administrator'),
(2, 'Sales Operator'),
(3, 'Support Operator');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `username` text NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '',
  `loginattempts` int(1) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `email` text NOT NULL,
  `signature` text NOT NULL,
  `roleid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`(32))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `fname`, `lname`, `username`, `password`, `loginattempts`, `status`, `email`, `signature`, `roleid`) VALUES
(1, 'John', 'Doe', 'admin', '5ff097ddb47be3469f842784bad4ce7a', 0, 'Active', 'demo@example.com', 'Sales Manager\r\nAwesome Company', 1);

-- --------------------------------------------------------

--
-- Table structure for table `appconfig`
--

CREATE TABLE IF NOT EXISTS `appconfig` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting` text COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34 ;

--
-- Dumping data for table `appconfig`
--

INSERT INTO `appconfig` (`id`, `setting`, `value`) VALUES
(1, 'CompanyName', 'BM'),
(2, 'Email', 'razib@bdinfosys.com'),
(3, 'sysUrl', 'http://localhost/bmsapp'),
(4, 'caddress', '<strong>BD INFOSYS Limited</strong><br>\r\nAppartment F1 (5th Floor)<br>\r\nHouse # 60 Block # B<br>\r\nRoad # 3,Niketon<br>\r\nGulshan - 1<br>\r\nDhaka - 1212<br>'),
(11, 'appStage', 'Live'),
(12, 'SoftwareVersion', '3.0.6'),
(14, 'WebsiteTitle', 'Business Management Application'),
(16, 'defaultcountry', 'United States of America'),
(17, 'defaultcurrency', 'USD'),
(18, 'defaultcurrencysymbol', '$'),
(19, 'paypalemail', 'demo@example.com'),
(21, 'logo', 'uploads/logo.png'),
(28, 'admintheme', 'bmsapp'),
(29, 'theme', 'bmsapp'),
(30, 'footerTxt', 'Copyright &copy; 2013-2015 All Rights Reserved'),
(31, 'BrandName', 'BM'),
(32, 'defaultclientlanguage', 'English'),
(33, 'SystemDate', 'd-m-Y');

-- --------------------------------------------------------

--
-- Table structure for table `coa`
--

CREATE TABLE IF NOT EXISTS `coa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `accnumber` text NOT NULL,
  `account` text NOT NULL,
  `type` text NOT NULL,
  `balance` decimal(10,2) NOT NULL DEFAULT '0.00',
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `coa`
--

INSERT INTO `coa` (`id`, `accnumber`, `account`, `type`, `balance`, `description`) VALUES
(2, '2100', 'Accounts Payable', 'Accounts Payable', '0.00', 'Money you owe to a vendor for goods or services provided and billed to your company'),
(3, '1100', 'Accounts Receivable', 'Accounts Receivable', '0.00', 'Money owed to your company for goods or services you provided and have invoiced a customer'),
(4, '5500', 'Advertising & Marketing Expense', 'Expense', '0.00', 'Advertising and marketing expenses related to increasing sales'),
(5, '1020', 'Bank Account', 'Bank', '0.00', 'Bank account'),
(6, '5520', 'Bank Charges & Interest Expense', 'Expense', '0.00', 'Fees and interest expenses charged by your bank associated with the accounts you hold'),
(7, '1000', 'Cash', 'Cash', '0.00', 'Cash on hand'),
(8, '5540', 'Contractor Expense', 'Expense', '0.00', 'Expenses related to paying consultants and contractors'),
(9, '3010', 'Contributed Capital', 'Equity', '0.00', 'Owner''s contribution to the company'),
(10, '2210', 'Corporate Taxes Payable', 'Taxes and Remittances', '0.00', 'Income tax expenses at the end of the year'),
(11, '5000', 'Cost of Goods Sold', 'Cost of Goods Sold', '0.00', 'Purchases made for the purpose of reselling'),
(12, '2000', 'Credit Card Payable', 'Credit Card', '0.00', 'Business transactions paid for by credit card'),
(13, '2300', 'Deposits from Customers', 'Client Credit', '0.00', 'Credits or deposits received from a customer in advance'),
(14, '5560', 'Depreciation Expense', 'Expense', '0.00', 'The amount of an asset''s cost, based on useful life, consumed during a period'),
(15, '1300', 'Furniture & Equipment', 'Fixed Asset', '0.00', 'Furniture and equipment that has a useful life of over one year.'),
(16, '4200', 'Gain/Loss on Exchange', 'Gain/Loss on Exchange', '0.00', 'Gain or loss due to changes in currency exchange rates'),
(17, '5580', 'Insurance Expense', 'Expense', '0.00', 'The premium, or periodic payment, made on an insurance policy'),
(18, '4100', 'Interest Income', 'Income', '0.00', 'Income earned from interest paid to you'),
(19, '1200', 'Inventory', 'Inventory', '0.00', 'Inventory on hand'),
(20, '2400', 'Loans', 'Long Term Liability', '0.00', 'Money borrowed that does not have to be paid within a year'),
(21, '5600', 'Meals & Entertainment Expense', 'Expense', '0.00', 'Meals and entertainmenet for the purpose of generating business (includes travel meals)'),
(22, '5620', 'Office Expense', 'Expense', '0.00', 'Basic supplies required for an office environment'),
(23, '5900', 'Other Expense', 'Expense', '0.00', 'Any expense which can not be attributed to one of the other expense accounts'),
(24, '4900', 'Other Income', 'Income', '0.00', 'Any income which can not be attributed to one of the other income accounts'),
(25, '5800', 'Payroll Expense', 'Expense', '0.00', 'All expenses related to wages & salaries'),
(26, '1400', 'Prepaid Expenses', 'Pre-paid Expense', '0.00', 'Expenses paid in advance'),
(27, '5640', 'Professional Dues/Memberships/Licenses/Subscriptions Expense', 'Expense', '0.00', 'Fees, licenses and dues associated with running a business or membership in a professional organization'),
(28, '5660', 'Professional Services Expense', 'Expense', '0.00', 'Legal, accounting and other fees paid for professional services'),
(29, '5680', 'Rent Expense', 'Expense', '0.00', 'Expense related to renting office space for the business'),
(30, '5700', 'Repairs & Maintenance Expense', 'Expense', '0.00', 'Incidental repairs and maintenance that do not add to the value or appreciably prolong the life of a fixed asset'),
(31, '3000', 'Retained Earnings', 'Retained Earnings', '0.00', 'Owner''s equity in the company'),
(32, '4000', 'Sales Income', 'Income', '0.00', 'Revenue from sales'),
(33, '2200', 'Sales Tax Payable', 'Taxes and Remittances', '0.00', 'Sales tax collected'),
(34, '5740', 'Telecommunications/Internet Expense', 'Expense', '0.00', 'Telephone, fax & internet expenses'),
(35, '5720', 'Travel Expense', 'Expense', '0.00', 'Costs such as flights and hotels incurred as a result of business travel'),
(36, '1010', 'Undeposited Funds', 'Cash', '0.00', 'Funds (checks) which you have on hand but not yet deposited to your bank account'),
(37, '5760', 'Utilities Expense', 'Expense', '0.00', 'Electricity, water & other utilities'),
(38, '5780', 'Vehicle Expense', 'Expense', '0.00', 'Fuel, parking, repairs & maintence of vehicle(s)');

-- --------------------------------------------------------

--
-- Table structure for table `email_logs`
--

CREATE TABLE IF NOT EXISTS `email_logs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `userid` int(10) NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `subject` text COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE IF NOT EXISTS `email_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tplname` varchar(128) NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT '1',
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `send` tinyint(1) DEFAULT '1',
  `core` enum('Yes','No') DEFAULT 'Yes',
  `hidden` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`,`language_id`),
  KEY `tplname` (`tplname`(32))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `tplname`, `language_id`, `subject`, `message`, `send`, `core`, `hidden`) VALUES
(1, 'Details:Signup', 1, 'Welcome to {{business_name}}', '{{logo}}\r\n<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,''droid sans'',''lucida sans'',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #8bc039">\r\n\r\n<div style="padding:5px;font-size:11pt;font-weight:bold">\r\n   Hi {{name}},\r\n</div>\r\n\r\n  <div style="padding:5px">\r\n   Thanks for signing up for <strong>{{business_name}}! </strong>, the\r\n        most powerful Business Management Application Around the globe!\r\n  </div>\r\n  <div style="padding:5px">\r\n   Start by logging in: Use following details to login.\r\n  </div>\r\n<div style="padding:10px 5px">\r\n    Log in URL: <a target="_blank" style="color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none" href="{{sys-url}}/cp/login.php">{{sys_url}}/cp/login.php</a><br>Username: {{username}}<br>Password: {{password}}</div>\r\n<div style="padding:5px">If you have any questions or need assistance, please don''t hesitate to contact us.</div>\r\n<div style="padding:0px 5px">\r\n  <div>Best Regards,<br>{{business_name}} Team</div>\r\n</div>\r\n</div>\r\n', 1, 'Yes', 0),
(2, 'Tickets:New Ticket', 1, '[TID-{{ticket_number}}] A new ticket has been created for you', '{{logo}}\r\n<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,''droid sans'',''lucida sans'',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #8bc039">\r\n<div style="padding:5px">\r\n    Subject: {{ticket_subject}}Ã‚Â \r\n </div>\r\n  <div style="padding:5px">\r\n   {{ticket_contents}} \r\n  </div>\r\n  \r\n\r\n</div>\r\n', 1, 'Yes', 0),
(3, 'Invoice:Invoice Created', 1, '{{business_name}} Invoice', '{{logo}}\r\n<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,''droid sans'',''lucida sans'',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #8bc039">\r\n\r\n<div style="padding:5px;font-size:11pt;font-weight:bold">\r\n   Greetings,\r\n</div>\r\n\r\n  <div style="padding:5px">\r\n   This email serves as your official invoice from <strong>{{business_name}}. </strong>\r\n  </div>\r\n  <div style="padding:5px">\r\n   Login to your client Portal to view this invoice.\r\n </div>\r\n<div style="padding:10px 5px">\r\n    Log in URL: <a target="_blank" style="color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none" href="{{sys-url}}/cp/login.php">{{sys_url}}/cp/login.php</a><br>Invoice ID: {{invoice_id}}<br>Invoice Amount: {{invoice_amount}}</div>\r\n<div style="padding:5px">Should you have any questions in regards to this invoice or any other billing related issue, please feel free to contact the Billing department by creating a new ticket from your Client Portal</div>\r\n<div style="padding:0px 5px">\r\n <div>Best Regards,<br>{{business_name}} Team</div>\r\n</div>\r\n</div>\r\n', 1, 'Yes', 0),
(4, 'Invoice:Invoice Payment Confirmation', 1, '{{business_name}} Invoice - Payment Confirmation', '{{logo}}\r\n<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,''droid sans'',''lucida sans'',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #8bc039">\r\n\r\n<div style="padding:5px;font-size:11pt;font-weight:bold">\r\n   Greetings,\r\n</div>\r\n\r\n  <div style="padding:5px">\r\n   This email serves as your official invoice from <strong>{{business_name}}. </strong>\r\n  </div>\r\n  <div style="padding:5px">\r\n   Login to your client Portal to view this invoice.\r\n </div>\r\n<div style="padding:10px 5px">\r\n    Log in URL: <a target="_blank" style="color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none" href="{{sys-url}}/cp/login.php">{{sys_url}}/cp/login.php</a><br>Invoice ID: {{invoice_id}}<br>Invoice Amount: {{invoice_amount}}</div>\r\n<div style="padding:5px">Should you have any questions in regards to this invoice or any other billing related issue, please feel free to contact the Billing department by creating a new ticket from your Client Portal</div>\r\n<div style="padding:0px 5px">\r\n <div>Best Regards,<br>{{business_name}} Team</div>\r\n</div>\r\n</div>\r\n', 1, 'Yes', 0),
(5, 'Order:Order Confirmation', 1, '{{business_name}} Order Confirmation - {{order_number}}', '{{logo}}\r\n<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,''droid sans'',''lucida sans'',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #8bc039">\r\n\r\n<div style="padding:5px;font-size:11pt;font-weight:bold">\r\n   Greetings,\r\n</div>\r\n\r\n <div style="padding:5px">\r\n   Thank you for choosing <strong>{{business_name}}. </strong>\r\n </div>\r\n  <div style="padding:5px">\r\n   Here is your order details-\r\n </div>\r\n<div style="padding:10px 5px">\r\nDate: {{order_date}} <br>\r\nOrder Number: {{order_num}} <br>\r\nItem: {{order_item}} <br>\r\nInvoice ID: {{invoice_id}}<br>\r\nOrder From IP: {{order_ip}}<br>\r\n</div>\r\n<div style="padding:5px">Should you have any questions in regards to this order, please feel free to contact our support department by creating a new ticket from your Client Portal</div>\r\n<div style="padding:0px 5px">\r\n  <div>Best Regards,<br>{{business_name}} Team</div>\r\n</div>\r\n</div>\r\n', 1, 'Yes', 0),
(6, 'Details:Password Reset', 1, '{{business_name}} New Password', '{{logo}}\r\n<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,''droid sans'',''lucida sans'',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #8bc039">\r\n\r\n<div style="padding:5px;font-size:11pt;font-weight:bold">\r\n   Hello {{name}}\r\n</div>\r\n\r\n  <div style="padding:5px">\r\n   Here is your new password for <strong>{{business_name}}. </strong>\r\n  </div>\r\n  \r\n<div style="padding:10px 5px">\r\n    Log in URL: <a target="_blank" style="color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none" href="{{sys-url}}/cp/login.php">{{sys_url}}/cp/login.php</a><br>Username: {{username}}<br>Password: {{password}}</div>\r\n<div style="padding:5px">For security reason, Please change your password after login. </div>\r\n<div style="padding:0px 5px">\r\n <div>Best Regards,<br>{{business_name}} Team</div>\r\n</div>\r\n</div>\r\n', 1, 'Yes', 0),
(7, 'Details:Forgot Password', 1, '{{business_name}} password change request', '{{logo}}\r\n<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,''droid sans'',''lucida sans'',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #8bc039">\r\n\r\n<div style="padding:5px;font-size:11pt;font-weight:bold">\r\n   Hi {{name}},\r\n</div>\r\n\r\n  <div style="padding:5px">\r\n   This is to confirm that we have received a Forgot Password request for your Account Username - {{username}} <br>\r\nFrom the IP Address - {{ip_address}}\r\n  </div>\r\n  <div style="padding:5px">\r\n   Click this linke to reset your password- <br>\r\n<a target="_blank" style="color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none" href="{{forgotpw_link}}">{{forgotpw_link}}</a>\r\n  </div>\r\n\r\n<div style="padding:5px">Please note: until your password has been changed, your current password will remain valid. The Forgot Password Link will be available for a limited time only.</div>\r\n<div style="padding:0px 5px">\r\n <div>Best Regards,<br>{{business_name}} Team</div>\r\n</div>\r\n</div>\r\n', 1, 'Yes', 0),
(8, 'Tickets:Update', 1, 'Update to Ticket [TID-{{ticket_number}}]', '{{logo}}\r\n<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,''droid sans'',''lucida sans'',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #8bc039">\r\n\r\n  <div style="padding:5px">\r\n   {{ticket_contents}} \r\n  </div>\r\n  \r\n\r\n</div>\r\n', 1, 'Yes', 0),
(9, 'Order:Activation Email', 1, '{{business_name}} Order Activation', '{{logo}}\r\n<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,''droid sans'',''lucida sans'',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #8bc039">\r\n\r\n  <div style="padding:5px">\r\n   {{activation_message}} \r\n </div>\r\n  \r\n\r\n</div>\r\n', 1, 'Yes', 0);

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE IF NOT EXISTS `enquiries` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tid` int(11) NOT NULL,
  `did` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `subject` text COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Open','Answered','Customer Reply','In Progress','On Hold','Closed') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Open',
  `admin` text COLLATE utf8_unicode_ci NOT NULL,
  `replyby` text COLLATE utf8_unicode_ci NOT NULL,
  `lastreply` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `flag` enum('Yes','No','','') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `cread` enum('Yes','No','','') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `aread` enum('Yes','No','','') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `replying` enum('Yes','No','','') COLLATE utf8_unicode_ci NOT NULL,
  `replyingtime` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `browser` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tid_c` (`tid`),
  KEY `userid` (`userid`),
  KEY `status` (`status`),
  KEY `date` (`date`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `int_country_codes`
--

CREATE TABLE IF NOT EXISTS `int_country_codes` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(200) DEFAULT NULL,
  `iso_code` varchar(100) DEFAULT NULL,
  `country_code` varchar(10) DEFAULT NULL,
  `tariff` float(5,2) DEFAULT '3.00',
  `active` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=212 ;

--
-- Dumping data for table `int_country_codes`
--

INSERT INTO `int_country_codes` (`Id`, `country_name`, `iso_code`, `country_code`, `tariff`, `active`) VALUES
(1, 'Afghanistan', 'AF / AFG', '93', 3.00, 0),
(2, 'Albania', 'AL / ALB', '355', 3.00, 0),
(3, 'Algeria', 'DZ / DZA', '213', 3.00, 0),
(4, 'Andorra', 'AD / AND', '376', 3.00, 0),
(5, 'Angola', 'AO / AGO', '244', 3.00, 0),
(6, 'Antarctica', 'AQ / ATA', '672', 3.00, 0),
(7, 'Argentina', 'AR / ARG', '54', 3.00, 0),
(8, 'Armenia', 'AM / ARM', '374', 3.00, 0),
(9, 'Aruba', 'AW / ABW', '297', 3.00, 0),
(10, 'Australia', 'AU / AUS', '61', 3.00, 0),
(11, 'Austria', 'AT / AUT', '43', 3.00, 0),
(12, 'Azerbaijan', 'AZ / AZE', '994', 3.00, 0),
(13, 'Bahrain', 'BH / BHR', '973', 3.00, 0),
(14, 'Bangladesh', 'BD / BGD', '880', 0.80, 1),
(15, 'Belarus', 'BY / BLR', '375', 3.00, 0),
(16, 'Belgium', 'BE / BEL', '32', 3.00, 0),
(17, 'Belize', 'BZ / BLZ', '501', 3.00, 0),
(18, 'Benin', 'BJ / BEN', '229', 3.00, 0),
(19, 'Bhutan', 'BT / BTN', '975', 3.00, 0),
(20, 'Bolivia', 'BO / BOL', '591', 3.00, 0),
(21, 'Bosnia and Herzegovina', 'BA / BIH', '387', 3.00, 0),
(22, 'Botswana', 'BW / BWA', '267', 3.00, 0),
(23, 'Brazil', 'BR / BRA', '55', 3.00, 0),
(24, 'Brunei', 'BN / BRN', '673', 3.00, 0),
(25, 'Bulgaria', 'BG / BGR', '359', 3.00, 0),
(26, 'Burkina Faso', 'BF / BFA', '226', 3.00, 0),
(27, 'Burma (Myanmar)', 'MM / MMR', '95', 3.00, 0),
(28, 'Burundi', 'BI / BDI', '257', 3.00, 0),
(29, 'Cambodia', 'KH / KHM', '855', 3.00, 0),
(30, 'Cameroon', 'CM / CMR', '237', 3.00, 0),
(31, 'Canada', 'CA / CAN', '1', 3.00, 0),
(32, 'Cape Verde', 'CV / CPV', '238', 3.00, 0),
(33, 'Central African Republic', 'CF / CAF', '236', 3.00, 0),
(34, 'Chad', 'TD / TCD', '235', 3.00, 0),
(35, 'Chile', 'CL / CHL', '56', 3.00, 0),
(36, 'China', 'CN / CHN', '86', 3.00, 0),
(37, 'Christmas Island', 'CX / CXR', '61', 3.00, 0),
(38, 'Cocos (Keeling) Islands', 'CC / CCK', '61', 3.00, 0),
(39, 'Colombia', 'CO / COL', '57', 3.00, 0),
(40, 'Comoros', 'KM / COM', '269', 3.00, 0),
(41, 'Cook Islands', 'CK / COK', '682', 3.00, 0),
(42, 'Costa Rica', 'CR / CRC', '506', 3.00, 0),
(43, 'Croatia', 'HR / HRV', '385', 3.00, 0),
(44, 'Cuba', 'CU / CUB', '53', 3.00, 0),
(45, 'Cyprus', 'CY / CYP', '357', 3.00, 0),
(46, 'Czech Republic', 'CZ / CZE', '420', 3.00, 0),
(47, 'Congo', 'CD / COD', '243', 3.00, 0),
(48, 'Denmark', 'DK / DNK', '45', 3.00, 0),
(49, 'Djibouti', 'DJ / DJI', '253', 3.00, 0),
(50, 'Ecuador', 'EC / ECU', '593', 3.00, 0),
(51, 'Egypt', 'EG / EGY', '20', 3.00, 0),
(52, 'El Salvador', 'SV / SLV', '503', 3.00, 0),
(53, 'Equatorial Guinea', 'GQ / GNQ', '240', 3.00, 0),
(54, 'Eritrea', 'ER / ERI', '291', 3.00, 0),
(55, 'Estonia', 'EE / EST', '372', 3.00, 0),
(56, 'Ethiopia', 'ET / ETH', '251', 3.00, 0),
(57, 'Falkland Islands', 'FK / FLK', '500', 3.00, 0),
(58, 'Faroe Islands', 'FO / FRO', '298', 3.00, 0),
(59, 'Fiji', 'FJ / FJI', '679', 3.00, 0),
(60, 'Finland', 'FI / FIN', '358', 3.00, 0),
(61, 'France', 'FR / FRA', '33', 3.00, 0),
(62, 'French Polynesia', 'PF / PYF', '689', 3.00, 0),
(63, 'Gabon', 'GA / GAB', '241', 3.00, 0),
(64, 'Gambia', 'GM / GMB', '220', 3.00, 0),
(65, 'Gaza Strip', '/', '970', 3.00, 0),
(66, 'Georgia', 'GE / GEO', '995', 3.00, 0),
(67, 'Germany', 'DE / DEU', '49', 3.00, 0),
(68, 'Ghana', 'GH / GHA', '233', 3.00, 0),
(69, 'Gibraltar', 'GI / GIB', '350', 3.00, 0),
(70, 'Greece', 'GR / GRC', '30', 3.00, 0),
(71, 'Greenland', 'GL / GRL', '299', 3.00, 0),
(72, 'Guatemala', 'GT / GTM', '502', 3.00, 0),
(73, 'Guinea', 'GN / GIN', '224', 3.00, 0),
(74, 'Guinea-Bissau', 'GW / GNB', '245', 3.00, 0),
(75, 'Guyana', 'GY / GUY', '592', 3.00, 0),
(76, 'Haiti', 'HT / HTI', '509', 3.00, 0),
(77, 'Holy See (Vatican City)', 'VA / VAT', '39', 3.00, 0),
(78, 'Honduras', 'HN / HND', '504', 3.00, 0),
(79, 'Hong Kong', 'HK / HKG', '852', 3.00, 0),
(80, 'Hungary', 'HU / HUN', '36', 3.00, 0),
(81, 'Iceland', 'IS / IS', '354', 3.00, 0),
(82, 'India', 'IN / IND', '91', 3.00, 0),
(83, 'Indonesia', 'ID / IDN', '62', 3.00, 0),
(84, 'Iran', 'IR / IRN', '98', 3.00, 0),
(85, 'Iraq', 'IQ / IRQ', '964', 3.00, 0),
(86, 'Ireland', 'IE / IRL', '353', 3.00, 0),
(87, 'Isle of Man', 'IM / IMN', '44', 3.00, 0),
(88, 'Israel', 'IL / ISR', '972', 3.00, 0),
(89, 'Italy', 'IT / ITA', '39', 3.00, 0),
(90, 'Ivory Coast', 'CI / CIV', '225', 3.00, 0),
(91, 'Japan', 'JP / JPN', '81', 3.00, 0),
(92, 'Jordan', 'JO / JOR', '962', 3.00, 0),
(93, 'Kazakhstan', 'KZ / KAZ', '7', 3.00, 0),
(94, 'Kenya', 'KE / KEN', '254', 3.00, 0),
(95, 'Kiribati', 'KI / KIR', '686', 3.00, 0),
(96, 'Kosovo', '/', '381', 3.00, 0),
(97, 'Kuwait', 'KW / KWT', '965', 3.00, 0),
(98, 'Kyrgyzstan', 'KG / KGZ', '996', 3.00, 0),
(99, 'Laos', 'LA / LAO', '856', 3.00, 0),
(100, 'Latvia', 'LV / LVA', '371', 3.00, 0),
(101, 'Lebanon', 'LB / LBN', '961', 3.00, 0),
(102, 'Lesotho', 'LS / LSO', '266', 3.00, 0),
(103, 'Liberia', 'LR / LBR', '231', 3.00, 0),
(104, 'Libya', 'LY / LBY', '218', 3.00, 0),
(105, 'Liechtenstein', 'LI / LIE', '423', 3.00, 0),
(106, 'Lithuania', 'LT / LTU', '370', 3.00, 0),
(107, 'Luxembourg', 'LU / LUX', '352', 3.00, 0),
(108, 'Macau', 'MO / MAC', '853', 3.00, 0),
(109, 'Macedonia', 'MK / MKD', '389', 3.00, 0),
(110, 'Madagascar', 'MG / MDG', '261', 3.00, 0),
(111, 'Malawi', 'MW / MWI', '265', 3.00, 0),
(112, 'Malaysia', 'MY / MYS', '60', 3.00, 0),
(113, 'Maldives', 'MV / MDV', '960', 3.00, 0),
(114, 'Mali', 'ML / MLI', '223', 3.00, 0),
(115, 'Malta', 'MT / MLT', '356', 3.00, 0),
(116, 'Marshall Islands', 'MH / MHL', '692', 3.00, 0),
(117, 'Mauritania', 'MR / MRT', '222', 3.00, 0),
(118, 'Mauritius', 'MU / MUS', '230', 3.00, 0),
(119, 'Mayotte', 'YT / MYT', '262', 3.00, 0),
(120, 'Mexico', 'MX / MEX', '52', 3.00, 0),
(121, 'Micronesia', 'FM / FSM', '691', 3.00, 0),
(122, 'Moldova', 'MD / MDA', '373', 3.00, 0),
(123, 'Monaco', 'MC / MCO', '377', 3.00, 0),
(124, 'Mongolia', 'MN / MNG', '976', 3.00, 0),
(125, 'Montenegro', 'ME / MNE', '382', 3.00, 0),
(126, 'Morocco', 'MA / MAR', '212', 3.00, 0),
(127, 'Mozambique', 'MZ / MOZ', '258', 3.00, 0),
(128, 'Namibia', 'NA / NAM', '264', 3.00, 0),
(129, 'Nauru', 'NR / NRU', '674', 3.00, 0),
(130, 'Nepal', 'NP / NPL', '977', 3.00, 0),
(131, 'Netherlands', 'NL / NLD', '31', 3.00, 0),
(132, 'Netherlands Antilles', 'AN / ANT', '599', 3.00, 0),
(133, 'New Caledonia', 'NC / NCL', '687', 3.00, 0),
(134, 'New Zealand', 'NZ / NZL', '64', 3.00, 0),
(135, 'Nicaragua', 'NI / NIC', '505', 3.00, 0),
(136, 'Niger', 'NE / NER', '227', 3.00, 0),
(137, 'Nigeria', 'NG / NGA', '234', 3.00, 0),
(138, 'Niue', 'NU / NIU', '683', 3.00, 0),
(139, 'Norfolk Island', '/ NFK', '672', 3.00, 0),
(140, 'North Korea', 'KP / PRK', '850', 3.00, 0),
(141, 'Norway', 'NO / NOR', '47', 3.00, 0),
(142, 'Oman', 'OM / OMN', '968', 3.00, 0),
(143, 'Pakistan', 'PK / PAK', '92', 3.00, 0),
(144, 'Palau', 'PW / PLW', '680', 3.00, 0),
(145, 'Panama', 'PA / PAN', '507', 3.00, 0),
(146, 'Papua New Guinea', 'PG / PNG', '675', 3.00, 0),
(147, 'Paraguay', 'PY / PRY', '595', 3.00, 0),
(148, 'Peru', 'PE / PER', '51', 3.00, 0),
(149, 'Philippines', 'PH / PHL', '63', 3.00, 0),
(150, 'Pitcairn Islands', 'PN / PCN', '870', 3.00, 0),
(151, 'Poland', 'PL / POL', '48', 3.00, 0),
(152, 'Portugal', 'PT / PRT', '351', 3.00, 0),
(153, 'Puerto Rico', 'PR / PRI', '1', 3.00, 0),
(154, 'Qatar', 'QA / QAT', '974', 3.00, 0),
(155, 'Republic of the Congo', 'CG / COG', '242', 3.00, 0),
(156, 'Romania', 'RO / ROU', '40', 3.00, 0),
(157, 'Russia', 'RU / RUS', '7', 3.00, 0),
(158, 'Rwanda', 'RW / RWA', '250', 3.00, 0),
(159, 'Saint Barthelemy', 'BL / BLM', '590', 3.00, 0),
(160, 'Saint Helena', 'SH / SHN', '290', 3.00, 0),
(161, 'Saint Pierre and Miquelon', 'PM / SPM', '508', 3.00, 0),
(162, 'Samoa', 'WS / WSM', '685', 3.00, 0),
(163, 'San Marino', 'SM / SMR', '378', 3.00, 0),
(164, 'Sao Tome and Principe', 'ST / STP', '239', 3.00, 0),
(165, 'Saudi Arabia', 'SA / SAU', '966', 3.00, 0),
(166, 'Senegal', 'SN / SEN', '221', 3.00, 0),
(167, 'Serbia', 'RS / SRB', '381', 3.00, 0),
(168, 'Seychelles', 'SC / SYC', '248', 3.00, 0),
(169, 'Sierra Leone', 'SL / SLE', '232', 3.00, 0),
(170, 'Singapore', 'SG / SGP', '65', 3.00, 0),
(171, 'Slovakia', 'SK / SVK', '421', 3.00, 0),
(172, 'Slovenia', 'SI / SVN', '386', 3.00, 0),
(173, 'Solomon Islands', 'SB / SLB', '677', 3.00, 0),
(174, 'Somalia', 'SO / SOM', '252', 3.00, 0),
(175, 'South Africa', 'ZA / ZAF', '27', 3.00, 0),
(176, 'South Korea', 'KR / KOR', '82', 3.00, 0),
(177, 'Spain', 'ES / ESP', '34', 3.00, 0),
(178, 'Sri Lanka', 'LK / LKA', '94', 3.00, 0),
(179, 'Sudan', 'SD / SDN', '249', 3.00, 0),
(180, 'Suriname', 'SR / SUR', '597', 3.00, 0),
(181, 'Swaziland', 'SZ / SWZ', '268', 3.00, 0),
(182, 'Sweden', 'SE / SWE', '46', 3.00, 0),
(183, 'Switzerland', 'CH / CHE', '41', 3.00, 0),
(184, 'Syria', 'SY / SYR', '963', 3.00, 0),
(185, 'Taiwan', 'TW / TWN', '886', 3.00, 0),
(186, 'Tajikistan', 'TJ / TJK', '992', 3.00, 0),
(187, 'Tanzania', 'TZ / TZA', '255', 3.00, 0),
(188, 'Thailand', 'TH / THA', '66', 3.00, 0),
(189, 'Timor-Leste', 'TL / TLS', '670', 3.00, 0),
(190, 'Togo', 'TG / TGO', '228', 3.00, 0),
(191, 'Tokelau', 'TK / TKL', '690', 3.00, 0),
(192, 'Tonga', 'TO / TON', '676', 3.00, 0),
(193, 'Tunisia', 'TN / TUN', '216', 3.00, 0),
(194, 'Turkey', 'TR / TUR', '90', 3.00, 0),
(195, 'Turkmenistan', 'TM / TKM', '993', 3.00, 0),
(196, 'Tuvalu', 'TV / TUV', '688', 3.00, 0),
(197, 'Uganda', 'UG / UGA', '256', 3.00, 0),
(198, 'Ukraine', 'UA / UKR', '380', 3.00, 0),
(199, 'United Arab Emirates', 'AE / ARE', '971', 3.00, 0),
(200, 'United Kingdom', 'GB / GBR', '44', 3.00, 0),
(201, 'United States', 'US / USA', '1', 3.00, 0),
(202, 'Uruguay', 'UY / URY', '598', 3.00, 0),
(203, 'Uzbekistan', 'UZ / UZB', '998', 3.00, 0),
(204, 'Vanuatu', 'VU / VUT', '678', 3.00, 0),
(205, 'Venezuela', 'VE / VEN', '58', 3.00, 0),
(206, 'Vietnam', 'VN / VNM', '84', 3.00, 0),
(207, 'Wallis and Futuna', 'WF / WLF', '681', 3.00, 0),
(208, 'West Bank', '/', '970', 3.00, 0),
(209, 'Yemen', 'YE / YEM', '967', 3.00, 0),
(210, 'Zambia', 'ZM / ZMB', '260', 3.00, 0),
(211, 'Zimbabwe', 'ZW / ZWE', '263', 3.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoiceitems`
--

CREATE TABLE IF NOT EXISTS `invoiceitems` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `invoiceid` int(10) NOT NULL DEFAULT '0',
  `userid` int(10) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `qty` int(11) NOT NULL DEFAULT '1',
  `taxed` int(1) NOT NULL,
  `duedate` date DEFAULT NULL,
  `paymentmethod` text COLLATE utf8_unicode_ci NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `invoiceid` (`invoiceid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `userid` int(10) NOT NULL,
  `created` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `duedate` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datepaid` date DEFAULT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` enum('Unpaid','Paid','Partially Paid','Cancelled') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Unpaid',
  `paymentmethod` text COLLATE utf8_unicode_ci NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  `recurring` int(3) NOT NULL DEFAULT '0',
  `tax` decimal(10,2) NOT NULL DEFAULT '0.00',
  `taxname` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'TAX / VAT',
  `vtoken` bigint(10) NOT NULL DEFAULT '0',
  `ptoken` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `knowledgebase`
--

CREATE TABLE IF NOT EXISTS `knowledgebase` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `article` text COLLATE utf8_unicode_ci NOT NULL,
  `views` int(10) NOT NULL DEFAULT '0',
  `private` text COLLATE utf8_unicode_ci NOT NULL,
  `sorder` int(11) NOT NULL,
  `catid` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `title` (`title`,`article`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `knowledgebase`
--

INSERT INTO `knowledgebase` (`id`, `title`, `article`, `views`, `private`, `sorder`, `catid`) VALUES
(1, 'test article', 'test article', 0, '', 1, 3),
(2, 'Test Article In new Version', '<p>Test Article In new Version<br></p>', 0, '', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `knowledgebasecats`
--

CREATE TABLE IF NOT EXISTS `knowledgebasecats` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Active','Inactive','Employee','') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `sorder` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`(64))
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `knowledgebasecats`
--

INSERT INTO `knowledgebasecats` (`id`, `name`, `status`, `sorder`) VALUES
(1, 'Cat One', 'Active', 1),
(3, 'Another Category', 'Active', 2);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `date` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('system','admin','client','') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'system',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `userid` int(10) NOT NULL,
  `ip` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `message_board`
--

CREATE TABLE IF NOT EXISTS `message_board` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `message` longtext,
  `email` varchar(150) DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL,
  `ip_address` varchar(100) DEFAULT NULL,
  `post_dt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mtt_lists`
--

CREATE TABLE IF NOT EXISTS `mtt_lists` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) NOT NULL DEFAULT '',
  `ow` int(11) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '',
  `d_created` int(10) unsigned NOT NULL DEFAULT '0',
  `d_edited` int(10) unsigned NOT NULL DEFAULT '0',
  `sorting` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `published` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `taskview` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uuid` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mtt_tag2task`
--

CREATE TABLE IF NOT EXISTS `mtt_tag2task` (
  `tag_id` int(10) unsigned NOT NULL,
  `task_id` int(10) unsigned NOT NULL,
  `list_id` int(10) unsigned NOT NULL,
  KEY `tag_id` (`tag_id`),
  KEY `task_id` (`task_id`),
  KEY `list_id` (`list_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mtt_tags`
--

CREATE TABLE IF NOT EXISTS `mtt_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mtt_todolist`
--

CREATE TABLE IF NOT EXISTS `mtt_todolist` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) NOT NULL DEFAULT '',
  `list_id` int(10) unsigned NOT NULL DEFAULT '0',
  `d_created` int(10) unsigned NOT NULL DEFAULT '0',
  `d_completed` int(10) unsigned NOT NULL DEFAULT '0',
  `d_edited` int(10) unsigned NOT NULL DEFAULT '0',
  `compl` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `title` varchar(250) NOT NULL,
  `note` text,
  `prio` tinyint(4) NOT NULL DEFAULT '0',
  `ow` int(11) NOT NULL DEFAULT '0',
  `tags` varchar(600) NOT NULL DEFAULT '',
  `tags_ids` varchar(250) NOT NULL DEFAULT '',
  `duedate` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uuid` (`uuid`),
  KEY `list_id` (`list_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `text` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `color` enum('yellow','blue','green') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yellow',
  `xyz` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ordernum` bigint(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `pid` int(10) NOT NULL,
  `pname` text COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `paymentmethod` text COLLATE utf8_unicode_ci NOT NULL,
  `invoiceid` int(10) NOT NULL DEFAULT '0',
  `status` enum('Processing','Pending','Active','Cancelled','Fraud') COLLATE utf8_unicode_ci NOT NULL,
  `ipaddress` text COLLATE utf8_unicode_ci NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ordernum` (`ordernum`),
  KEY `userid` (`userid`),
  KEY `date` (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `paymentgateways`
--

CREATE TABLE IF NOT EXISTS `paymentgateways` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `settings` text COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `processor` text COLLATE utf8_unicode_ci NOT NULL,
  `ins` text COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL,
  `sorder` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `gateway_setting` (`name`(32),`processor`(32)),
  KEY `setting_value` (`processor`(32),`ins`(32))
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `paymentgateways`
--

INSERT INTO `paymentgateways` (`id`, `name`, `settings`, `value`, `processor`, `ins`, `status`, `sorder`) VALUES
(1, 'Paypal', 'Paypal Email', 'demo@example.com', 'paypal', '', 'Active', 0),
(2, 'Stripe', 'API Key', 'pk_test_ARblMczqDw61NusMMs7o1RVK', 'stripe', 'sk_test_BQokikJOvBiI2HlWgH4olfQ2', 'Active', 0),
(3, 'Bank / Cash', 'Instructions', 'Make a Payment to Our Bank Account <br>\nBank Name: City Bank <br>\nAccount Name: BD Infosys Limited <br>\nAccount Number: 1505201731681001 <br>', 'manualpayment', '', 'Active', 0);

-- --------------------------------------------------------

--
-- Table structure for table `productgroups`
--

CREATE TABLE IF NOT EXISTS `productgroups` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `order` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `order` (`order`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `stock` int(10) NOT NULL DEFAULT '0',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Show','Hidden','','') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Show',
  PRIMARY KEY (`id`),
  KEY `name` (`name`(64))
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE IF NOT EXISTS `taxes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `rate` decimal(5,2) NOT NULL,
  `type` enum('Excluded','Included','','') NOT NULL,
  `taxacc` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `name`, `rate`, `type`, `taxacc`) VALUES
(1, 'TAX / VAT (1.5%)', '1.50', 'Included', 101);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clicks`
--

CREATE TABLE IF NOT EXISTS `tbl_clicks` (
  `click_id` int(11) NOT NULL AUTO_INCREMENT,
  `click_time` datetime NOT NULL,
  `url_name` varchar(255) NOT NULL,
  `referrer` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  PRIMARY KEY (`click_id`),
  KEY `url_name` (`url_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_links`
--

CREATE TABLE IF NOT EXISTS `tbl_links` (
  `url_name` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `active` char(1) NOT NULL,
  PRIMARY KEY (`url_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ticketdepartments`
--

CREATE TABLE IF NOT EXISTS `ticketdepartments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `order` int(1) NOT NULL,
  `show` enum('Yes','No') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Yes',
  PRIMARY KEY (`id`),
  KEY `name` (`name`(64))
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ticketnotes`
--

CREATE TABLE IF NOT EXISTS `ticketnotes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ticketid` int(10) NOT NULL,
  `admin` text COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ticketid_date` (`ticketid`,`date`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `ticketreplies`
--

CREATE TABLE IF NOT EXISTS `ticketreplies` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tid` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `contactid` int(10) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `admin` text COLLATE utf8_unicode_ci NOT NULL,
  `attachment` text COLLATE utf8_unicode_ci NOT NULL,
  `rating` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tid_date` (`tid`,`date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tid` int(11) NOT NULL,
  `did` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `subject` text COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Open','Answered','Customer Reply','In Progress','On Hold','Closed') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Open',
  `admin` text COLLATE utf8_unicode_ci NOT NULL,
  `replyby` text COLLATE utf8_unicode_ci NOT NULL,
  `lastreply` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `flag` enum('Yes','No','','') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `cread` enum('Yes','No','','') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `aread` enum('Yes','No','','') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `replying` enum('Yes','No','','') COLLATE utf8_unicode_ci NOT NULL,
  `replyingtime` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tid_c` (`tid`),
  KEY `userid` (`userid`),
  KEY `status` (`status`),
  KEY `date` (`date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ttype` enum('Income','Expense','Transfers','Adjustments','Other') NOT NULL DEFAULT 'Other',
  `tfrom` int(11) NOT NULL,
  `tto` int(11) NOT NULL,
  `tfromacc` text NOT NULL,
  `ttoacc` text NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `tfrombal` decimal(10,2) NOT NULL,
  `ttobal` decimal(10,2) NOT NULL,
  `date` varchar(15) NOT NULL,
  `memo` text NOT NULL,
  `status` enum('Completed','Scheduled','Archived','Draft') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
