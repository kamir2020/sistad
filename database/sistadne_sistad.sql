-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 04, 2025 at 09:32 PM
-- Server version: 8.0.37
-- PHP Version: 8.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistadne_sistad`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`) VALUES
(1, 'admin1', 'cjJQOE0vcGhlREtKQi9CMnd1VDNzZz09Ojrqgn85smKTDxklrX+XabgT');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_application`
--

CREATE TABLE `tbl_application` (
  `id` int NOT NULL,
  `caunselorID` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL,
  `refCourt` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `refFiles` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `jobID1` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL,
  `dateIslam` date DEFAULT NULL,
  `locationIslam` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `nrid` varchar(12) COLLATE utf8mb3_unicode_ci NOT NULL,
  `raceID` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL,
  `religionID` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL,
  `address1` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `stateID` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL,
  `districtID` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL,
  `postcode` varchar(5) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8mb3_unicode_ci NOT NULL,
  `maritalID` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL,
  `namePartner` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `passportID` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL,
  `wargaID` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL,
  `jobID2` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `supportNo` int DEFAULT NULL,
  `statusID` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tbl_application`
--

INSERT INTO `tbl_application` (`id`, `caunselorID`, `refCourt`, `refFiles`, `name`, `jobID1`, `dateIslam`, `locationIslam`, `nrid`, `raceID`, `religionID`, `address1`, `stateID`, `districtID`, `postcode`, `email`, `phone`, `maritalID`, `namePartner`, `passportID`, `wargaID`, `jobID2`, `supportNo`, `statusID`) VALUES
(5, '', '2310-H0205-521-0724', 'JMKNNS.BRCA.050-3/1/373', 'MUHAMMAD AIMAN RAJA', '3', '2019-12-04', 'PUSAT DAKWAH ISLAMIAH PAROI NEGERI SEMBILAN', '890426-05-52', '3', '14', 'NO 185, JALAN DESA PD 2/3. TAMAN DESA PD', 'NS', '3', '70100', '', '010-2181862', 'M1', '', '', '', '', 0, 'P1'),
(6, '', '2310-H0205-521-0723', 'JMKNNS.BRCA.050-3/1/372', 'SITI AISYAH BEGUM', '4', '2019-12-18', 'PUSAT DAKWAH ISLAMIAH PAROI NEGERI SEMBILAN', '630501-75-50', '3', '14', 'NO 185, JALAN DESA PD 2/3. TAMAN DESA PD', 'NS', '3', '70100', '', '010-2181862', 'M4', 'KRISHNAN A/L MUTHUSAMY', '2482410', 'W1', '4', 1, 'P1'),
(7, '', '05100-043-0278-2022', 'JMKNNS.BRCA.050-3/1/353', 'NUR BARKATUN NISA BINTI ABDULLAH', '3', '2011-12-09', 'PUSAT DAKWAH ISLAMIAH PAROI NEGERI SEMBILAN', '810322-04-53', '3', '14', 'NO 23, TAMAN SRI MAWAR, JALAN BYPASS', 'NS', '3', '71000', 'saesha2226@gmail.com', '0167336477', 'M4', '', '', '', '', 1, 'P1'),
(8, '', '2310-H0205-521-0681', 'JMKNNS.BRCA.050-3/1/371', 'NUR SALMA BINTI ABDULLAH', '3', '0000-00-00', 'PUSAT DAKWAH ISLAMIAH PAROI NEGERI SEMBILAN', '851014-05-56', '3', '14', 'NO 131, TAMAN CHOONG LOONG RAHANG', 'NS', '1', '70100', '', '018-2525651', 'M4', '', '', '', '', 1, 'P1'),
(9, '', '2308-H0205-521-0811', 'JMKNNS.BRCA.050-3/1/375', 'SHAREEN JIT BINTI ABDULLAH', '3', '2010-06-04', 'PUSAT DAKWAH ISLAMIAH PAROI NEGERI SEMBILAN', '750211-05-51', '3', '14', 'NO 628, JALAN MELATI 20, TAMAN DUSUN SETIA', 'NS', '1', '70400', '', '0122990031', 'M4', '', '', '', '', 0, 'P1'),
(10, '', '2408-H0105-521-0216', 'JMKNNS.BRCA.050-3/1/380', 'NUR AISYAH BINTI ABDULLAH', '3', '2014-06-26', 'PUSAT DAKWAH ISLAMIAH PAROI NEGERI SEMBILAN', '760208-05-51', '3', '14', 'NO 331, WISMA SENTOSA, JALAN MUAR', 'NS', '5', '72000', '', '014-6162163', 'M4', '', '', '', '', 1, 'P1'),
(13, '', '2409-H0105-521-0249', 'JMKNNS.BRCA.050-3/1/384', 'MUHAMMAD SHAZWAN BIN ABDULLAH', '3', '2011-11-01', 'PUSAT DAKWAH ISLAMIAH PAROI NEGERI SEMBILAN', '951023-05-52', '3', '14', 'NO 518, BSS 1/3L BANDAR SEREMBAN SELATAN', 'NS', '1', '71450', '', '011-36722246', 'M2', 'NUR AISHAH BINTI ABDULLAH', '000804-05-0370', 'W1', '4', 2, 'P1'),
(15, '', '2406-H0205-521-0528', 'JMKNNS.BRCA.050-3/1/383', 'SITI NOR SAMIRAH BINTI MUHAMMAD NIZAM', '3', '2011-07-25', 'PUSAT DAKWAH ISLAMIAH, PAROI', '981001105068', '3', '14', 'NO 254,JALAN SRI MAWAR 8, TAMAN SRI MAWAR SENAWANG', 'NS', '1', '70450', '', '0182674821', 'M1', '', '', '', '', 0, 'P1'),
(16, '', '2307-H0105-521-0451', 'JMKNNS.BRCA.050-3/1/367', 'SARANNYA KRISHNAN', '4', '0000-00-00', '', '031007050636', '3', '14', 'NO 70, JALAN IRINGAN BAYU 19, TAMAN IRINGAN BAYU', 'NS', '1', '70300', '', '0113670022', 'M1', '', '', '', '', 0, 'P1'),
(17, '', '2409-H0105-521-0251', 'JMKNNS.BRCA.050-3/1/385', 'NUR AISHAH BINTI ABDULLAH', '4', '2018-05-14', 'PUSAT DAKWAH ISLAMIAH, PAROI', '000804050370', '3', '14', 'NO 518 BSS 1/3L BANDAR SEREMBAN SELATAN', 'NS', '1', '71450', '', '0176965157', 'M2', 'MUHAMMAD SHAZWAN BIN ABDULLAH', '951023055295', 'W1', '3', 3, 'P1'),
(18, '', '2307-H0205-521-0331', 'JMKNNS.BRCA.050-3/1/365', 'AZIZ BIN JAMAL', '3', '0000-00-00', '', '920609016603', '3', '14', 'NO 11. JALAN MERANTI 23,', 'NS', '2', '71200', '', '0173342891', 'M1', '', '', '', '', 0, 'P1'),
(19, '', '2312-H0205-521-0901', 'JMKNNS.BRCA.050-3/1/376', 'MUHAMMAD NESHAN BIN MUHAMMAD HAFIZ RAMISH', '3', '0000-00-00', '', '931103146527', '3', '14', 'NO 48, JALAN S2 K7 VISION HOMES SEREMBAN 2', 'NS', '1', '70300', '', '0126455462', 'M1', '', '', '', '', 0, 'P1'),
(20, '', '2307-H0205-521-0301', 'JMKNNS.BRCA.050-3/1/363', 'SITI NUR HASINAH BINTI SEENI MOHD FORUK', '3', '0000-00-00', '', '980620055464', '3', '14', 'NO 74, JALAN KURAU 2, TAMAN PERMAI', 'NS', '1', '70200', '', '0164638480', 'M1', '', '', '', '', 0, 'P1'),
(21, '', '2308-H0205-521-0390', 'JMKNNS.BRCA.050-3/1/390', 'ROSHIDAH BINTI ABDUL GHANI', '3', '0000-00-00', '', '940912055160', '3', '14', 'NO 263-A, LORONG 1/34A, TAMAN BANDAR SPRINGHILL', 'NS', '3', '71000', '', '0106598894', 'M1', '', '', '', '', 0, 'P1'),
(22, '', '2307-H0205-521-0330', 'JMKNNS.BRCA.050-3/1/364', 'FATIMAH BINTI JAMAL', '1', '0000-00-00', '', '981031017114', '3', '14', 'NO 11. JALAN MERANTI 23,', 'NS', '2', '71200', '', '0108850175', 'M1', '', '', '', '', 0, 'P1'),
(23, '', '2408-H0105-521-0215', 'JMKNNS.BRCA.050-3/1/381', 'JULIANA NISHA GOMES ', '4', '0000-00-00', '', '980709565508', '3', '14', 'B-8-7 PALAIS LE RENAISSANCE, JALAN BERLIAN 8, OFF JALAN LABU', 'NS', '1', '70200', '', '0113711301', 'M4', '', '', '', '', 0, 'P1'),
(24, '', '2407-H0205-521-0632', 'JMKNNS.BRCA.050-3/1/378', 'MUHAMMAD YUSUF PETER BIN ABDULLAH', '3', '2008-07-16', 'PUSAT DAKWAH ISLAMIAH, PAROI', '840102145967', '3', '14', '1390, JALAN RJ 2/17, TAMAN RASAH JAYA', 'NS', '1', '70300', '', '0186601218', 'M1', '', '', '', '', 0, 'P1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_application_iman`
--

CREATE TABLE `tbl_application_iman` (
  `id` int NOT NULL,
  `imanID` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL,
  `applicationID` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL,
  `statusID` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_application_session`
--

CREATE TABLE `tbl_application_session` (
  `id` int NOT NULL,
  `applicationID` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL,
  `causelorID` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL,
  `sessionDate` date DEFAULT NULL,
  `sessionTime` time DEFAULT NULL,
  `feedback` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `statusID` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_application_ziarah`
--

CREATE TABLE `tbl_application_ziarah` (
  `id` int NOT NULL,
  `ziarahID` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL,
  `applicationID` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL,
  `statusID` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `id` int NOT NULL,
  `stateID` varchar(10) NOT NULL,
  `districtName` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`id`, `stateID`, `districtName`) VALUES
(1, 'NS', 'SEREMBAN'),
(2, 'NS', 'JEMPOL'),
(3, 'NS', 'PORT DICKSON'),
(4, 'NS', 'TAMPIN'),
(5, 'NS', 'KUALA PILAH'),
(6, 'NS', 'REMBAU'),
(7, 'NS', 'JELEBU');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_education`
--

CREATE TABLE `tbl_education` (
  `id` int NOT NULL,
  `educationID` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL,
  `educationName` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tbl_education`
--

INSERT INTO `tbl_education` (`id`, `educationID`, `educationName`) VALUES
(1, 'E1', 'PhD/Sarjana/Ijazah'),
(2, 'E2', 'Diploma'),
(3, 'E3', 'SPM'),
(4, 'E4', 'Lain - Lain');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `id` int NOT NULL,
  `userID` varchar(10) NOT NULL,
  `fullname` text NOT NULL,
  `nrid` varchar(12) NOT NULL,
  `address1` text NOT NULL,
  `stateID` varchar(10) NOT NULL,
  `districtID` varchar(10) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `positionID` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`id`, `userID`, `fullname`, `nrid`, `address1`, `stateID`, `districtID`, `postcode`, `positionID`, `email`, `phone`) VALUES
(1476, 'JRU731487', 'Nur Syazwani Amirah binti Mohd Kamal', '970109055388', 'N0 110, JALAN SRI WANGI, TAMAN SULIANA, SIKAMAT', 'NS', '1', '70400', 'P7', 'syazwaniamirah@ns.gov.my', '0163609063'),
(1477, '1L3BY1488', 'Mohamad Junaidan bin Ahmad Daruwin', '780212135899', 'NO. 1 JLN', 'NS', '1', '70400', 'P6', 'junaidan@ns.gov.my', '0134550918');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_iman`
--

CREATE TABLE `tbl_iman` (
  `id` int NOT NULL,
  `caunselorID` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `dateStart` date NOT NULL,
  `dateEnd` date NOT NULL,
  `locationName` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `statusID` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tbl_iman`
--

INSERT INTO `tbl_iman` (`id`, `caunselorID`, `name`, `dateStart`, `dateEnd`, `locationName`, `statusID`) VALUES
(2, '', 'Bina Iman Siri 1', '2024-11-03', '2024-11-05', 'Melaka', 'M1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job`
--

CREATE TABLE `tbl_job` (
  `id` int NOT NULL,
  `jobName` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tbl_job`
--

INSERT INTO `tbl_job` (`id`, `jobName`) VALUES
(1, 'Berniaga'),
(2, 'Kerajaan'),
(3, 'Swasta'),
(4, 'Tidak Bekerja'),
(5, 'Lain - Lain');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_level`
--

CREATE TABLE `tbl_level` (
  `id` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `levelName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_level`
--

INSERT INTO `tbl_level` (`id`, `levelName`) VALUES
('L1', 'SUPER ADMIN'),
('L2', 'Admin'),
('L3', 'PT'),
('L4', 'PPM'),
('L5', 'PM'),
('L6', 'Fasilitator'),
('L7', 'Top Management');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_marital`
--

CREATE TABLE `tbl_marital` (
  `id` int NOT NULL,
  `maritalID` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL,
  `maritalName` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tbl_marital`
--

INSERT INTO `tbl_marital` (`id`, `maritalID`, `maritalName`) VALUES
(1, 'M2', 'Berkahwin'),
(2, 'M3', 'Duda'),
(3, 'M4', 'Ibu Tunggal'),
(5, 'M1', 'Bujang');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_position`
--

CREATE TABLE `tbl_position` (
  `id` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `positionName` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_position`
--

INSERT INTO `tbl_position` (`id`, `positionName`) VALUES
('P1', 'Mufti'),
('P2', 'Timbalan Mufti'),
('P3', 'Perunding Cara'),
('P4', 'Penolong Mufti'),
('P5', 'Penolong Pegawai Mufti'),
('P6', 'Pegawai Teknologi Maklumat'),
('P7', 'Pembantu Tadbir');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_race`
--

CREATE TABLE `tbl_race` (
  `id` int NOT NULL,
  `raceName` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tbl_race`
--

INSERT INTO `tbl_race` (`id`, `raceName`) VALUES
(2, 'Melayu'),
(3, 'India'),
(4, 'Cina');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_religion`
--

CREATE TABLE `tbl_religion` (
  `id` int NOT NULL,
  `religionName` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tbl_religion`
--

INSERT INTO `tbl_religion` (`id`, `religionName`) VALUES
(14, 'Islam'),
(15, 'Khristian'),
(17, 'Buddha');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE `tbl_state` (
  `id` int NOT NULL,
  `stateID` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `stateName` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`id`, `stateID`, `stateName`) VALUES
(1, 'NS', 'NEGERI SEMBILAN');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `typeID` varchar(10) NOT NULL,
  `statusName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`id`, `typeID`, `statusName`) VALUES
('M1', 'T3', 'BARU'),
('M2', 'T3', 'SELESAI'),
('P1', 'T2', 'BARU'),
('P2', 'T2', 'SAMBUNG'),
('P3', 'T2', 'TERIMA'),
('P4', 'T2', 'TOLAK'),
('P5', 'T2', 'TAUBAT'),
('P6', 'T2', 'MATI'),
('S1', 'T1', 'AKTIF'),
('S2', 'T2', 'TIDAK AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status_apply`
--

CREATE TABLE `tbl_status_apply` (
  `id` int NOT NULL,
  `applyID` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL,
  `applyName` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tbl_status_apply`
--

INSERT INTO `tbl_status_apply` (`id`, `applyID`, `applyName`) VALUES
(1, 'A1', 'Sambung'),
(2, 'A2', 'Terima'),
(3, 'A3', 'Tolak'),
(4, 'A4', 'Taubat'),
(5, 'A5', 'Mati');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int NOT NULL,
  `userID` varchar(10) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` text NOT NULL,
  `levelID` varchar(10) NOT NULL,
  `statusID` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `userID`, `username`, `password`, `levelID`, `statusID`) VALUES
(1, '6PQ67', 'THJ123', 'WE90N3lXV3VVZ2YwMWorSTZtS09mUT09OjrtiGTnQ7ZEUGE04ocK+L5Q', 'L2', 'S1'),
(1487, 'JRU731487', '5388', 'd2xBTVlrUjRWc3VrcnpSMm9rZ1ZWdz09OjrRr+t/BCvF0oODWkj5vhvr', 'L3', 'S1'),
(1488, '1L3BY1488', '5899', 'Ylc3anltbmU4RUMvOHRSRS9weW93QT09Ojp5I5PoW9D2Kl3pY0410WUb', 'L2', 'S1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_warga`
--

CREATE TABLE `tbl_warga` (
  `id` int NOT NULL,
  `wargaID` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL,
  `wargaName` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tbl_warga`
--

INSERT INTO `tbl_warga` (`id`, `wargaID`, `wargaName`) VALUES
(1, 'W1', 'Warganegara'),
(2, 'W2', 'Bukan Warganegara');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_year`
--

CREATE TABLE `tbl_year` (
  `yearID` int NOT NULL,
  `yearName` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_year`
--

INSERT INTO `tbl_year` (`yearID`, `yearName`) VALUES
(1, 2020),
(2, 2021),
(11, 2018),
(12, 2019),
(13, 2022);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ziarah`
--

CREATE TABLE `tbl_ziarah` (
  `id` int NOT NULL,
  `caunselorID` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `dateStart` date NOT NULL,
  `dateEnd` date NOT NULL,
  `locationName` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `statusID` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_application`
--
ALTER TABLE `tbl_application`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `refCourt` (`refCourt`);

--
-- Indexes for table `tbl_application_iman`
--
ALTER TABLE `tbl_application_iman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_application_session`
--
ALTER TABLE `tbl_application_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_application_ziarah`
--
ALTER TABLE `tbl_application_ziarah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stateID` (`stateID`);

--
-- Indexes for table `tbl_education`
--
ALTER TABLE `tbl_education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_iman`
--
ALTER TABLE `tbl_iman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_job`
--
ALTER TABLE `tbl_job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_level`
--
ALTER TABLE `tbl_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_marital`
--
ALTER TABLE `tbl_marital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_position`
--
ALTER TABLE `tbl_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_race`
--
ALTER TABLE `tbl_race`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_religion`
--
ALTER TABLE `tbl_religion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_status_apply`
--
ALTER TABLE `tbl_status_apply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_warga`
--
ALTER TABLE `tbl_warga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_year`
--
ALTER TABLE `tbl_year`
  ADD PRIMARY KEY (`yearID`);

--
-- Indexes for table `tbl_ziarah`
--
ALTER TABLE `tbl_ziarah`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_application`
--
ALTER TABLE `tbl_application`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_application_iman`
--
ALTER TABLE `tbl_application_iman`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_application_session`
--
ALTER TABLE `tbl_application_session`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_application_ziarah`
--
ALTER TABLE `tbl_application_ziarah`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_education`
--
ALTER TABLE `tbl_education`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1478;

--
-- AUTO_INCREMENT for table `tbl_iman`
--
ALTER TABLE `tbl_iman`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_job`
--
ALTER TABLE `tbl_job`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_marital`
--
ALTER TABLE `tbl_marital`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_race`
--
ALTER TABLE `tbl_race`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_religion`
--
ALTER TABLE `tbl_religion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_status_apply`
--
ALTER TABLE `tbl_status_apply`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1489;

--
-- AUTO_INCREMENT for table `tbl_warga`
--
ALTER TABLE `tbl_warga`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_year`
--
ALTER TABLE `tbl_year`
  MODIFY `yearID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_ziarah`
--
ALTER TABLE `tbl_ziarah`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
