-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2023 at 03:37 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `city`
--

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `id` int(255) NOT NULL,
  `officename` varchar(255) NOT NULL,
  `floor` tinyint(4) NOT NULL COMMENT '0=1st Floor, 1=2nd Floor, 2=3rd Floor, 3=Not inside city hall',
  `status` tinyint(1) DEFAULT 0 COMMENT '0=visible, 1=hidden, 2= deleted',
  `navbar_status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`id`, `officename`, `floor`, `status`, `navbar_status`, `created_at`) VALUES
(1, 'City Accounting Office', 0, 0, 0, '2023-05-28 15:33:24'),
(2, 'City Administrator Office', 1, 0, 0, '2023-05-28 15:33:24'),
(3, 'City Agriculture Office', 0, 0, 0, '2023-05-28 15:33:24'),
(4, 'City Assessor Office', 0, 0, 0, '2023-06-08 09:47:39'),
(5, 'City Budget Office', 1, 0, 0, '2023-06-08 09:49:03'),
(6, 'City Civil Registrar', 0, 0, 0, '2023-06-08 09:49:44'),
(7, 'City Disaster Risk Reduction and Management Office', 3, 0, 0, '2023-06-08 09:50:24'),
(8, 'City Economic Enterprise Development and Management Office', 3, 0, 0, '2023-06-08 09:50:40'),
(9, 'City Engineer’s Office', 3, 0, 0, '2023-06-08 09:50:51'),
(10, 'City Environment and Natural Resources Office', 0, 0, 0, '2023-06-08 09:51:20'),
(11, 'City General Services Office', 0, 0, 0, '2023-06-08 09:51:43'),
(12, 'City Health Office', 3, 0, 0, '2023-06-08 09:52:09'),
(13, 'City Human Resources Management Office', 1, 0, 0, '2023-06-08 09:52:29'),
(14, 'City Legal Office', 1, 0, 0, '2023-06-08 09:52:48'),
(15, 'City Mayor’s Office', 1, 0, 0, '2023-06-08 09:53:00'),
(16, 'Bids and Awards Committee', 1, 0, 0, '2023-06-08 09:54:28'),
(17, 'Business Permit and Licensing Division', 0, 0, 0, '2023-06-08 09:56:00'),
(18, 'City Urban Development and Housing Division', 0, 0, 0, '2023-06-08 09:56:40'),
(19, 'Public Employment Service Office', 3, 0, 0, '2023-06-08 09:57:16'),
(20, 'Office of the Senior Citizen Affairs', 3, 0, 0, '2023-06-08 09:57:44'),
(21, 'Office of Building Official', 3, 0, 0, '2023-06-08 09:58:11'),
(22, 'City Planning and Development Office', 1, 0, 0, '2023-06-08 09:59:44'),
(23, 'City Social Welfare and Development Office', 0, 0, 0, '2023-06-08 10:00:10'),
(24, 'City Treasurer’s Office', 0, 0, 0, '2023-06-08 10:00:26'),
(25, 'City Veterinary Office', 3, 0, 0, '2023-06-08 10:00:45'),
(26, 'City Mayor’s Office', 1, 2, 0, '2023-06-08 10:02:20');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(255) NOT NULL,
  `office_id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `office_division` mediumtext NOT NULL,
  `classification` mediumtext NOT NULL,
  `transaction` mediumtext NOT NULL,
  `who_may_avail` mediumtext NOT NULL,
  `processing_time` mediumtext NOT NULL,
  `total_fees` mediumtext NOT NULL,
  `period_of_extension` mediumtext NOT NULL,
  `documentary_requirements` varchar(526) NOT NULL,
  `where_to_secure` varchar(526) NOT NULL,
  `clients_action` varchar(255) NOT NULL,
  `agency_action` varchar(526) NOT NULL,
  `fees_to_be_paid` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `person_in_charge` varchar(255) NOT NULL,
  `contact_number` int(100) NOT NULL,
  `status` tinyint(1) DEFAULT 0 COMMENT '0=visible, 1=hidden, 2=deleted',
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `office_id`, `title`, `description`, `office_division`, `classification`, `transaction`, `who_may_avail`, `processing_time`, `total_fees`, `period_of_extension`, `documentary_requirements`, `where_to_secure`, `clients_action`, `agency_action`, `fees_to_be_paid`, `time`, `person_in_charge`, `contact_number`, `status`, `created_at`) VALUES
(1, 1, 'Pre-Audit for Disbursement Voucher', 'Examination, Control and Audit of Disbursement Vouchers before issuance of checks to safeguard assets and authorize accurate &\r\nreliable disbursements in compliance with Generally-Accepted Accounting Principles and Commission on Audit Rules and\r\nRegulations.', '', 'Complex and Highly Technical (CIP)', 'Government to Government/Business/Client', 'City Treasurer’s Office/Payrolls or Suppliers/ Employees or City  Mayors Office/Admin/City Budget Office', '4 Hours', 'None', 'Within 1 day after the  return of lacking vouchers', 'Three (3) Original Copies of Obligation Request \r\nTwo (2) Original Copies of Purchase Request \r\nOriginal/Digitalized Copies of Purchase Order \r\nAll Original Copies of Canvass \r\nAll Original Copies of Abstract of Canvass \r\nAll Original Charge Invoice \r\nAll Original Official Receipts \r\nThree (3) Original Copies of Inspection and Acceptance Report', 'City Budget Office – City Budget Operations Division \r\nEnd User or Requesting Offices \r\nBids and Awards Committee – Procurement Service Unit A \r\nBids and Awards Committee – Procurement Service Unit B \r\nBids and Awards Committee – Procurement Service Unit B \r\nSuppliers or Purchasers \r\nSuppliers or Purchasers \r\nCity General Service Office – Records, Property & Inventory Division', ' Forwards to CAO City Financial \r\nAuditing Services Division all necessary \r\nvouchers/payrolls for pre-audit.', '1.1. Receives Vouchers/Payroll through \r\nTransaction Protocol Manual and \r\nforwards to City Internal Audit Division \r\nfor coding and VAT Computation.\r\n1.2. Assigns accounting code, VAT \r\ncomputations and pre-audits Vouchers\r\n1.3. Pre-audits Payroll and processing of \r\nemployee’s refund.\r\n1.4. Assigns SL Account number for SemiExpandable Inventory [pursuant to \r\nCOA Cir 2022-004]\r\n1.5. Certifies the completeness of the \r\ndocumentary compliance attached to a \r\nVoucher', 'None', '1.1 = 30 Minutes\r\n1.2 = 30 Minutes\r\n1.3 = 1 Hour\r\n1.4 = 1 Hour\r\n1.5 = 1 Hour', '1.1 Record Officer \r\nIII/Admin Support \r\nServices\r\n1.2 MAA IV/City Financial \r\nAuditing Services\r\n1.3 MAA IV/City Financial \r\nAuditing Services\r\n1.4 Accountant IV/City \r\nFinancial Accounting \r\nServices\r\n1.5 City Accountant', 969, 0, '2023-05-28 19:44:56'),
(2, 1, 'Issuance of Certificate of Net Take-Home Pay', 'Certificates of Net Take-Home Pay are important documents testifying that regulatory deductions are reflected in an employee’s \r\nsalary earned for the period. Such documents are normally required from an employee/service provider/worker in case of \r\napplication for loans in certain establishments such as lending companies, GOCCs (SSS, HDMF, GSIS, etc.), and others, or they\r\nmay ask for it for other personal and commercial purposes.', 'City Accountant’s Office and City Financial Accounting Services Division – Subsidiary Recap Section', 'Simple', 'Government to Client', 'Government to Government (Current and Previously employed) and  Job Orders and Contract of Services', '2 Hours', 'None', 'None', 'Original Government IDs \r\nOne (1) Original and Approved Letter of Authority', 'Government Agencies \r\nAuthorizing Employee/Client', '1. Verbal Request for Two (2) Original \r\nCopies of Certificate of Net-Take Home \r\nPay', '1.1 Receives request for certification', 'None', '15 Minutes', 'Record Officer III/ Admin \r\nSupport Services', 969, 0, '2023-05-29 14:41:21'),
(3, 1, 'Issuance of Tax Certificate (Value Added Tax, Income, etc.)', 'As a withholding agent of the BIR, the accounting office is required to issue tax certification for the various tax withheld from \r\nsuppliers, employees and other stakeholders.', 'City Accountant’s Office and City Financial Accounting Services Division – Subsidiary Recap Section', 'Simple', 'Government to Client, Government to Business', 'Employees, Job Orders, Contract of Services, Suppliers', '1 Hour and 30 Minutes', 'None', 'None', 'Two (2) Original and Approved Disbursement Voucher', 'City Accountant’s Office – City Financial Services Division', '1. Requests for Certification', '1.1 Receives request for certification', 'None', '15 Minutes', 'Accountant IV/CFASD', 969, 0, '2023-05-29 14:46:24'),
(4, 2, 'News and Announcement Data (NADA)', 'Disseminate News and Announcement Data', 'City Administrator’s Office – Information Services Division (ISD)', 'Simple', 'G2C – Government to Citizen G2B – Government to Business Entity G2G – Government to Government', 'All', '1 Day', 'None', '2 Days', 'None', 'None', '1. Coordinators Email New and \r\nAnnouncement Data to Information \r\nSupport Division', '1.1. Receive and process NADA\r\n1.2. Post information/advisories to official \r\nFacebook page and CGM website', 'None\r\nNone', '1 Day', 'Information Services \r\nDivision', 88, 0, '2023-06-08 09:00:16'),
(5, 15, 'City Scholarship Program (New Scholar)', 'Submission of new requirements of new city scholars', 'City Mayor’s Office – Community Affairs Division - Special Barangay Development Projects and Programs Section', 'Simple', 'G2C – Government to Citizen', 'City Scholarship Qualifying Examination Passer (Grade 12)', '40 Minutes', 'None', 'None', '− Notice of Scholarship Admission (City Scholarship Qualifying Examination \r\nPasser)\r\n− Birth Certificate – one (1) photocopy\r\n− Income Tax Return of Parents does not exceed to PHP 150,000.00 annual net \r\nincome – one (1) photocopy or original copy of BIR Certificate of Tax \r\nExemption\r\n− Grade 12 report card (No grade below 80 in all subjects and with an average \r\nof 83%) - one (1) photocopy − Certificate from the Punong Barangay that he/she is a resident of the \r\nBarangay (Barangay Clearance) – original copy\r\n− Good Mo', '− City Mayor’s Office – Community Affairs Division- Special Barangay \r\nDevelopment Projects and Programs Section \r\n− City Civil Registrar’s Office\r\n− Bureau of Internal Revenue (BIR)\r\n− School where the student is enrolled\r\n− Barangay Secretary, Barangay Hall (Barangay of Residency)\r\n− School where the student is enrolled\r\n− Barangay Indigenous Peoples Mandatory Representative (Barangay of \r\nResidency)\r\n− Photo Studio (e.g. Fuji film, Kodak, De Lara Studio)\r\n− School where the student is enrolled\r\nSchool where the studen', '1. Sign a logbook to the City Mayors Office \nand proceed to Community Affairs \nDivision - Special Barangay Development \nProjects and Programs Section\n2. Submit the requirements for verification\n3. Secure a copy of confirmation slip', '1.1.Assist and direct the client to \r\nCommunity Affairs Division - Special \r\nBarangay Development Projects and \r\nPrograms Section\r\n2.1. Receive and validate all documentary \r\nrequirements presented by the client\r\n3.1. Issuance of confirmation slip \r\n3.2.Advice the client to wait for the \r\nnotification for the orientation', 'None\r\nNone\r\nNone\r\nNone', '1.1 5 Minutes\r\n1.2 30 Minutes\r\n1.3 5 Minutes\r\n', 'Community Affairs \r\nOfficer IV\r\nCity Mayor’s Office', 953, 0, '2023-06-08 10:10:50'),
(6, 9, 'Implementation of City Infrastructure Project (Request for Time Suspension/Extension)', 'To facilitate the request for Time Suspension/ Extension.', 'City Engineer’s Office- Construction Division', 'Simple', 'G2B Government to Business Entity', 'Contractors', '3 Days, 4 Hours & 5 Minutes', 'None', 'None', 'Request Letter (2 copies)', 'Contractor will provide his own Letter Request', '1. Submit letter request to \r\nGate Keeper', '1.1 Receive and record letter request\r\n1.2 City Engineer routes the request to Construction \r\nDivision\r\n1.3 Receives request for Time Suspension/ ExtensionThe Chief of Construction Division receives and \r\nforwards the time suspension/extension request to \r\nthe Supervising Engineer for evaluation of \r\nsubmitted documents\r\n1.4 Processing of Time Suspension/Extension-The \r\nSupervising Engineer evaluates/ prepares and recommends time suspension/extension to the \r\nConstruction Division Chief.\r\n1.5 The Chief of Construction D', 'None\r\nNone\r\nNone\r\nNone\r\nNone\r\nNone', '5 Minutes\r\n1 Day\r\n4 Hours\r\n4 Hours\r\n4 Hours\r\n1 Day', 'Administrative Officer III\r\nCity Engineer\r\nDivision Chief\r\nSupervising Engineer \r\nIn- charge in Area I- IV\r\nDivision Chief\r\nCity Engineer', 88, 0, '2023-06-08 10:17:10'),
(7, 5, 'Obligation for Payment of Utilities, Payrolls, Monetization’s, Perdiems, Financial Assistance', 'Processing of documents from different offices for obligation of transactions such as payrolls, payment of bills, monetization and \r\nsimilar services.', '', 'Simple', 'G2G – Government to Government G2C- Government to Citizen', 'Employees', '20 Minutes', 'None', '4 Hours', 'Vouchers (2 original copies), Obligation request (3 original copies).\r\n\r\nPayrolls - Accomplishment report, DTR (2 original copies)\r\nMonetization - Approved letter request, Approved application, \r\nPer diem - Certificate of appearance, Tickets and receipts, Invitation, IT and Memo\r\nFinancial Assistance – statement of account, letter request, bills,', 'Originating offices concerned', '1. Submit Obligation request, \r\nvouchers, and similar documents \r\nthrough Document Tracking \r\nSystem from previous office.', '1.1. Document is forwarded to person-in-charge \r\nfor obligation after thorough review of \r\nsupporting attachments and appropriate \r\nsignatures.\r\n1.2.Approval of City Budget Officer or Officerin-Charge.\r\n1.3. Recording and assigning of Obligation \r\nRequest number.\r\n1.4. Forward to City Accountants office through \r\nDocument Tracking System.', 'None\r\nNone\r\nNone', '5 Minutes\r\n(By the bulk)\r\n5 Minutes\r\n(By the bulk)\r\n5 Minutes\r\n(By the bulk)\r\n5 Minutes\r\n(By the bulk)', 'City Budget Officer', 0, 0, '2023-06-08 10:23:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_as` tinyint(4) NOT NULL COMMENT '0=user, 1=admin',
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `role_as`, `status`, `created_at`) VALUES
(1, 'admin', 'admin', 'admin@city.com', 'admin', 1, 0, '2023-05-27 02:02:59'),
(2, 'Ivy Grace', 'Mapalad', 'ivygracemapalad2304@gmail.com', 'password', 0, 1, '2023-05-27 02:12:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
