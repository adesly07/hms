-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 12, 2018 at 11:37 AM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `onepos`
--

-- --------------------------------------------------------

--
-- Table structure for table `ailment`
--

CREATE TABLE IF NOT EXISTS `ailment` (
  `aid` int(100) NOT NULL AUTO_INCREMENT,
  `patient_no` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `symptoms` text NOT NULL,
  `b_date` varchar(50) NOT NULL,
  `occurence` varchar(50) NOT NULL,
  `admission` varbinary(20) NOT NULL,
  `refer_to` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `d_name` varchar(50) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `ailment`
--

INSERT INTO `ailment` (`aid`, `patient_no`, `title`, `symptoms`, `b_date`, `occurence`, `admission`, `refer_to`, `amount`, `d_name`) VALUES
(1, 'UPDCC/SI/394', 'Malaria', 'Headache, high temperature and loss of appetite', '2016/10/12', 'Not applicable', 'Not applicable', 'Not applicable', '', 'Muftau Saheed'),
(2, 'UPDCC/SI/394', 'Malaria', 'Fever and High Temperature', '2016/10/11', 'Not applicable', 'Not applicable', 'Pharmacy', '', 'Muftau Saheed'),
(3, 'UPDCC/SI/394', 'Headache', 'Strong headache and Catarrh', '2016/10/11', 'Late Recurrence (2-12 Months)', 'Yes', 'Lab/Nur', '2000', 'Muftau Saheed'),
(6, 'UPDCC/SI/394', 'Typhoid', 'High Temperature, Fever', '2017/01/17', 'First', 'No', 'Laboratory', '1500', 'Muftau Saheed');

-- --------------------------------------------------------

--
-- Table structure for table `create_login`
--

CREATE TABLE IF NOT EXISTS `create_login` (
  `cid` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `section` varchar(50) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `create_login`
--

INSERT INTO `create_login` (`cid`, `name`, `username`, `password`, `section`) VALUES
(2, 'Adedigba Sylvester', 'sly', 'sly', 'Administrator'),
(3, 'Muftau Saheed', 'saheed', 'saheed', 'Cashier'),
(7, 'Update Nigeria', 'kapil', 'kapil', 'Administrator'),
(8, 'Sobande Seyi', 'seyi', 'seyi', 'Store Keeper');

-- --------------------------------------------------------

--
-- Table structure for table `description`
--

CREATE TABLE IF NOT EXISTS `description` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(200) NOT NULL,
  `user` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL,
  `ip` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `description`
--

INSERT INTO `description` (`id`, `description`, `user`, `date`, `time`, `ip`) VALUES
(1, 'Injection Artemeter (Griter)', '', '2018-04-30', '16:31:02', '127.0.0.1'),
(8, 'Injection Artemeter (Griter) 1', '', '2018-05-01', '12:36:32', '127.0.0.1'),
(6, 'Injection Grofenac Vitamin K', '', '2018-04-30', '17:10:51', '127.0.0.1'),
(4, 'Injection Rophex Ceftriaxone', '', '2018-04-30', '16:35:24', '127.0.0.1'),
(5, 'Injection Oxytocin', '', '2018-04-30', '16:46:33', '127.0.0.1'),
(9, 'Pepsi', '', '2018-05-01', '12:37:21', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `f_sales`
--

CREATE TABLE IF NOT EXISTS `f_sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` varchar(200) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `q_pack` varchar(100) NOT NULL,
  `q_sachet` varchar(100) NOT NULL,
  `c_price` varchar(100) NOT NULL,
  `p_pack` varchar(200) NOT NULL,
  `p_sachet` varchar(200) NOT NULL,
  `t_cost` varchar(20) NOT NULL,
  `t_pack` varchar(20) NOT NULL,
  `t_sachet` varchar(20) NOT NULL,
  `user` varchar(200) NOT NULL,
  `s_date` varchar(200) NOT NULL,
  `s_status` varchar(200) NOT NULL,
  `ip` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `f_sales`
--

INSERT INTO `f_sales` (`id`, `pid`, `category`, `description`, `q_pack`, `q_sachet`, `c_price`, `p_pack`, `p_sachet`, `t_cost`, `t_pack`, `t_sachet`, `user`, `s_date`, `s_status`, `ip`) VALUES
(2, '3610071', 'Tablet', 'Fleming 1 375mg', '5', '2', '640', '700', '350', '3200', '3500', '3500', 'Update Nigeria', '2018/05/01', 'STORED', '127.0.0.1'),
(3, '6910022', 'Supermarket', 'Coca Cola', '2', '24', '850', '900', '40', '1700', '1800', '1920', 'Update Nigeria', '2018/05/01', 'STORED', '127.0.0.1'),
(4, '4354352', 'Infusions and Surgical', 'Urine Bag', '50', 'na', '31', '40', 'na', '1550', 'na', '2000', 'Update Nigeria', '2018/05/01', 'STORED', '127.0.0.1'),
(6, '1431461', 'Tablet', 'Paracetamol', '4', '4', '150', '200', '50', '600', '800', '800', 'Update Nigeria', '2018/05/02', 'STORED', '127.0.0.1'),
(7, '1431461', 'Tablet', 'Paracetamol', '3', '4', '150', '200', '50', '450', '600', '600', 'Update Nigeria', '2018/05/02', 'STORED', '127.0.0.1'),
(8, '7345035', 'Tablet', 'Combisunate', '20', 'na', '400', '500', 'na', '8000', '10000', '0', 'Update Nigeria', '2018/05/02', 'STORED', '127.0.0.1'),
(9, '1431461', 'Tablet', 'Paracetamol', '5', '4', '170', '250', '70', '850', '1250', '1400', 'Update Nigeria', '2018/05/03', 'STORED', '127.0.0.1'),
(10, '4128113', 'Tablet', 'Trovac', '7', '3', '1000', '1140', '380', '7000', '7980', '11400', 'Update Nigeria', '2018/05/05', 'STORED', '127.0.0.1'),
(11, '6194615', 'Tablet', 'Tenogesik 20', '3', '10', '700', '800', '80', '2100', '2400', '4000', 'Update Nigeria', '2018/05/05', 'STORED', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `medication`
--

CREATE TABLE IF NOT EXISTS `medication` (
  `mid` int(100) NOT NULL AUTO_INCREMENT,
  `aid` int(100) NOT NULL,
  `medications` text NOT NULL,
  `prescriptions` text NOT NULL,
  `appointment` varchar(50) NOT NULL,
  `d_name` varchar(100) NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `medication`
--

INSERT INTO `medication` (`mid`, `aid`, `medications`, `prescriptions`, `appointment`, `d_name`) VALUES
(1, 2, 'Coartem, Paracetamol', 'Follow the prescriptions on the drug.', '2016/10/17', 'Muftau Saheed'),
(2, 3, 'Paracetamol', '2 tablet- morning, afternoon, evening', '2017/01/16', 'Muftau Saheed'),
(3, 6, 'Typholin', '2 - Morning, Afternoon, Night', '2017/01/27', 'Muftau Saheed');

-- --------------------------------------------------------

--
-- Table structure for table `productlist`
--

CREATE TABLE IF NOT EXISTS `productlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` varchar(200) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `q_pack` varchar(100) NOT NULL,
  `q_sachet` varchar(100) NOT NULL,
  `c_price` varchar(100) NOT NULL,
  `p_pack` varchar(200) NOT NULL,
  `p_sachet` varchar(200) NOT NULL,
  `t_cost` varchar(20) NOT NULL,
  `t_pack` varchar(20) NOT NULL,
  `t_sachet` varchar(20) NOT NULL,
  `user` varchar(200) NOT NULL,
  `s_date` varchar(200) NOT NULL,
  `s_status` varchar(200) NOT NULL,
  `ip` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `productlist`
--

INSERT INTO `productlist` (`id`, `pid`, `category`, `description`, `q_pack`, `q_sachet`, `c_price`, `p_pack`, `p_sachet`, `t_cost`, `t_pack`, `t_sachet`, `user`, `s_date`, `s_status`, `ip`) VALUES
(2, '3610071', 'Tablet', 'Fleming 1 375mg', '5', '2', '640', '700', '350', '3200', '3500', '3500', 'Update Nigeria', '2018/05/01', 'STORED', '127.0.0.1'),
(3, '6910022', 'Supermarket', 'Coca Cola', '2', '24', '850', '900', '40', '1700', '1800', '1920', 'Update Nigeria', '2018/05/01', 'STORED', '127.0.0.1'),
(4, '4354352', 'Infusions and Surgical', 'Urine Bag', '50', 'na', '31', '40', 'na', '1550', '2000', 'na', 'Update Nigeria', '2018/05/01', 'STORED', '127.0.0.1'),
(6, '1431461', 'Tablet', 'Paracetamol', '4', '4', '150', '200', '50', '600', '800', '800', 'Update Nigeria', '2018/05/02', 'STORED', '127.0.0.1'),
(7, '1431461', 'Tablet', 'Paracetamol', '3', '4', '150', '200', '50', '450', '600', '600', 'Update Nigeria', '2018/05/02', 'STORED', '127.0.0.1'),
(8, '7345035', 'Tablet', 'Combisunate', '20', 'na', '400', '500', 'na', '8000', '10000', '0', 'Update Nigeria', '2018/05/02', 'STORED', '127.0.0.1'),
(9, '1431461', 'Tablet', 'Paracetamol', '5', '4', '170', '250', '70', '850', '1250', '1400', 'Update Nigeria', '2018/05/03', 'STORED', '127.0.0.1'),
(10, '4128113', 'Tablet', 'Trovac', '7', '3', '1000', '1140', '380', '7000', '7980', '7980', 'Update Nigeria', '2018/05/05', 'STORED', '127.0.0.1'),
(11, '6194615', 'Tablet', 'Tenogesik 20', '3', '10', '700', '800', '80', '2100', '2400', '2400', 'Update Nigeria', '2018/05/05', 'STORED', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `p_registry`
--

CREATE TABLE IF NOT EXISTS `p_registry` (
  `pid` int(100) NOT NULL AUTO_INCREMENT,
  `patient_no` varchar(100) NOT NULL,
  `card_type` varchar(20) NOT NULL,
  `title` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phoneno` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `b_year` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `m_status` varchar(20) NOT NULL,
  `tribe` varchar(50) NOT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `g_name` varchar(50) NOT NULL,
  `g_phone` varchar(20) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `c_address` varchar(200) NOT NULL,
  `d_deceased` varchar(20) NOT NULL,
  `reason` text NOT NULL,
  `r_amt` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `user` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `p_registry`
--

INSERT INTO `p_registry` (`pid`, `patient_no`, `card_type`, `title`, `name`, `phoneno`, `dob`, `b_year`, `gender`, `occupation`, `religion`, `address`, `m_status`, `tribe`, `state`, `country`, `email`, `g_name`, `g_phone`, `c_name`, `c_address`, `d_deceased`, `reason`, `r_amt`, `status`, `ip`, `date`, `time`, `user`, `username`) VALUES
(1, 'UPDCC/SI/394', 'Single', 'Mr', 'Adedigba Sylvester', '08064405936', '2003/08/09', '', 'Male', 'Software Developer', 'Christianity', 'No. 3, Agricola str, UI 2nd Gate, Ibadan', 'Single', 'Yoruba', 'Oyo', 'Nigeria', 'adesly07@gmail.com', 'Felix Adedigba', '', 'Update Nigeria & Brightzity Technologies', 'No. 28, Oyo Road, UI, Ibadan', '87678', 'nothin', '500', 'PAID', '127.0.0.1', '2016-09-15', '14:52:45', 'Update Nigeria', 'update'),
(2, 'UPDCC/FA/4979', 'Family', 'Mr', 'Sobande Seyi', '', '1992/07/04', 'b_year', 'Male', 'Software Developer', 'Islam', 'Sango, Ibadan', 'Married', 'Yoruba', '', '', '', '', '', '', '', '', '', '1000', 'UNPAID', '127.0.0.1', '2016-09-16', '14:20:49', 'Update Nigeria', 'update'),
(3, 'UPDCC/AN/3353', 'Antenatal', 'Mr', 'Muftau Babatunde', '', '1988/12/04', '', 'Male', 'Software Developer', 'Islam', 'Agbowo, Ibadan', 'Married', 'Yoruba', '', '', '', '', '', '', '', '', '', '1500', 'PAID', '127.0.0.1', '2016-09-16', '14:30:24', 'Update Nigeria', 'update'),
(4, 'UPD/7605', '', 'Mr', 'Ayoade Olusesan', '98', '2005/01/13', '', 'Male', 'Civil Servant', 'Christianity', 'Agbowo', 'Single', 'Yoruba', 't', 'gvhg', 'hgfg', 'gfg', '', '', '', '', '', '', '', '127.0.0.1', '2018-05-12', '08:07:14', '', 'kapil');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `r_no` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `pid` varchar(100) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_type` varchar(50) NOT NULL,
  `qty` varchar(50) NOT NULL,
  `p_rate` varchar(20) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `cashier` varchar(100) NOT NULL,
  `i_date` varchar(50) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `i_time` varchar(20) NOT NULL,
  `p_status` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `r_no`, `category`, `pid`, `p_name`, `p_type`, `qty`, `p_rate`, `amount`, `cashier`, `i_date`, `ip`, `i_time`, `p_status`) VALUES
(1, '662178209', 'Tablet', '1431461', 'Paracetamol', 'Pack', '1', '250', '250', 'Update Nigeria', '2018/05/03', '127.0.0.1', '16:01:26', 'PAID'),
(2, '662178209', 'Tablet', '3610071', 'Fleming 1 375mg', 'Unit', '2', '350', '700', 'Update Nigeria', '2018/05/03', '127.0.0.1', '16:03:27', 'RETURNED'),
(3, '662178209', 'Infusions and Surgical', '4354352', 'Urine Bag', 'Pack', '1', '40', '40', 'Update Nigeria', '2018/05/03', '127.0.0.1', '16:04:47', 'PAID');

-- --------------------------------------------------------

--
-- Table structure for table `stock_return`
--

CREATE TABLE IF NOT EXISTS `stock_return` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` varchar(200) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `q_pack` varchar(100) NOT NULL,
  `q_sachet` varchar(100) NOT NULL,
  `c_price` varchar(100) NOT NULL,
  `p_pack` varchar(200) NOT NULL,
  `p_sachet` varchar(200) NOT NULL,
  `t_cost` varchar(20) NOT NULL,
  `t_pack` varchar(20) NOT NULL,
  `t_sachet` varchar(20) NOT NULL,
  `r_user` varchar(200) NOT NULL,
  `s_date` varchar(200) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `ip` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `stock_return`
--

INSERT INTO `stock_return` (`id`, `pid`, `category`, `description`, `q_pack`, `q_sachet`, `c_price`, `p_pack`, `p_sachet`, `t_cost`, `t_pack`, `t_sachet`, `r_user`, `s_date`, `reason`, `ip`) VALUES
(1, '6194615', 'Tablet', 'Tenogesik 20', '1', '10', '700', '800', '80', '700', '800', '80', 'Update Nigeria', '2018/05/05', 'Non', '127.0.0.1'),
(2, '6194615', 'Tablet', 'Tenogesik 20', '1', '10', '700', '800', '80', '700', '800', '80', 'Update Nigeria', '2018/05/05', 'Non', '127.0.0.1'),
(3, '4128113', 'Tablet', 'Trovac', '2', '3', '1000', '1140', '380', '2000', '2280', '0', 'Update Nigeria', '2018/05/05', 'Non', '127.0.0.1'),
(4, '4128113', 'Tablet', 'Trovac', '1', '3', '1000', '1140', '380', '1000', '1140', '1140', 'Update Nigeria', '2018/05/05', 'Non', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `s_return`
--

CREATE TABLE IF NOT EXISTS `s_return` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `r_no` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `pid` varchar(100) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_type` varchar(50) NOT NULL,
  `qty` varchar(50) NOT NULL,
  `p_rate` varchar(20) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `cashier` varchar(100) NOT NULL,
  `i_date` varchar(50) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `i_time` varchar(20) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `r_user` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `s_return`
--

INSERT INTO `s_return` (`id`, `r_no`, `category`, `pid`, `p_name`, `p_type`, `qty`, `p_rate`, `amount`, `cashier`, `i_date`, `ip`, `i_time`, `reason`, `r_user`) VALUES
(1, '662178209', 'Tablet', '3610071', 'Fleming 1 375mg', 'Unit', '2', '350', '700', 'Update Nigeria', '2018/05/03', '127.0.0.1', '16:03:27', 'Non', 'Update Nigeria'),
(3, '662178209', 'Tablet', '1431461', 'Paracetamol', 'Pack', '1', '250', '250', 'Update Nigeria', '2018/05/03', '127.0.0.1', '16:01:26', 'Non', 'Update Nigeria'),
(5, '662178209', 'Infusions and Surgical', '4354352', 'Urine Bag', 'Pack', '2', '40', '80', 'Update Nigeria', '2018/05/03', '127.0.0.1', '16:04:47', 'None', 'Update Nigeria');

-- --------------------------------------------------------

--
-- Table structure for table `v_sign`
--

CREATE TABLE IF NOT EXISTS `v_sign` (
  `vid` int(100) NOT NULL AUTO_INCREMENT,
  `patient_no` varchar(20) NOT NULL,
  `v_name` varchar(50) NOT NULL,
  `r_one` varchar(50) NOT NULL,
  `r_two` varchar(50) NOT NULL,
  `v_date` varchar(20) NOT NULL,
  `v_time` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`vid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `v_sign`
--

INSERT INTO `v_sign` (`vid`, `patient_no`, `v_name`, `r_one`, `r_two`, `v_date`, `v_time`, `username`) VALUES
(1, 'UPDCC/SI/394', 'BT', '35Â°C', '', '2016/09/17', '20:54:42', 'sly'),
(2, 'UPDCC/SI/394', 'HR', '120-140 per minute', '', '2016/09/18', '20:55:11', 'sly'),
(4, 'UPDCC/SI/394', 'RR', '16-30 breaths/minute', '', '2016/09/18', '21:05:58', 'sly'),
(5, 'UPDCC/SI/394', 'BW', '50kg', '', '2016/09/18', '21:07:15', 'sly'),
(6, 'UPDCC/SI/394', 'SP', '30', '', '2016/09/18', '21:16:45', 'sly'),
(7, 'UPDCC/SI/394', 'BP', '75/50', '110/75', '2016/09/18', '21:17:16', 'sly'),
(8, 'UPDCC/SI/394', 'BT', '30Â°C', '', '2016/09/19', '06:39:03', 'update');
