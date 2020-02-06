SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `account` (
  `ACCOUNT_NO` int(11) NOT NULL AUTO_INCREMENT,
  `CUSTOMER_ID` int(11) DEFAULT NULL,
  `ACCOUNT_TYPE` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DATE_OF_OPENING` date NOT NULL,
  `CURRENT_AMOUNT` int(11) DEFAULT NULL,
  `STATUS` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ACCOUNT_NO`),
  KEY `CUSTOMER_ID` (`CUSTOMER_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;


INSERT INTO `account` (`ACCOUNT_NO`, `CUSTOMER_ID`, `ACCOUNT_TYPE`, `DATE_OF_OPENING`, `CURRENT_AMOUNT`, `STATUS`) VALUES
(11, 1, 'Savings', '2014-01-16', 5000, '1'),
(12, 2, 'Current', '2014-02-13', 45000, '1'),
(13, 3, 'Savings', '2014-03-24', 96000, '1'),
(14, 4, 'Current', '2014-04-17', 55000, '1'),
(15, 5, 'Savings', '2014-05-12', 87500, '1');


CREATE TABLE IF NOT EXISTS `customer` (
  `CUSTOMER_ID` int(11) NOT NULL,
  `NAME` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `GENDER` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `DOB` date NOT NULL,
  `ADDRESS` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `CITY` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `STATE` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `PIN` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `TELEPHONE` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`CUSTOMER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `customer` (`CUSTOMER_ID`, `NAME`, `GENDER`, `DOB`, `ADDRESS`, `CITY`, `STATE`, `PIN`, `TELEPHONE`, `EMAIL`) VALUES
(1, 'John doe', 'm', '1990-02-01', '12f,port road, ', 'Newyork', 'Newyork', '10001', '9000000001', 'Johndoe@neyork.com'),
(2, 'Victor D''Souza', 'm', '1986-05-26', 'b-22, tribhuvandas sco,setelite', 'ahmedabad', 'gujarat', '380041', '8000000001', 'victord@abc.com'),
(3, 'jonathan jason', 'm', '1972-09-22', 'c/o libert avenue, alaska', 'alaska', 'newyork', '12001', '8555555555', 'jason@abc.com'),
(4, 'Alexander Aerokiam', 'm', '1987-12-22', 'f-12,madrid road', 'romania', 'romanaia', '90005', '9600000000', 'alexaero@abc.com'),
(5, 'Shahid', 'm', '1990-12-22', 'f-1012,anandnagar road', 'ahmedabad', 'gujarat', '380055', '8888800000', 'shahid_aj@abc.com');


CREATE TABLE IF NOT EXISTS `login` (
  `USER_ID` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `PASSWORD` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ROLE` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`USER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `login` (`USER_ID`, `PASSWORD`, `ROLE`, `timestamp`) VALUES
('1', 'john1290', 'C', '2014-05-22 10:06:39'),
('2', 'victor26586', 'C', '2014-05-22 10:06:39'),
('3', 'jonathan22972', 'C', '2014-05-22 10:07:20'),
('4', 'aero221287', 'C', '2014-05-22 10:07:20'),
('5', 'ajmeri221290', 'C', '2014-05-22 10:07:40');


CREATE TABLE IF NOT EXISTS `transaction` (
  `TRANSACTION_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ACCOUNT_NO` int(11) DEFAULT NULL,
  `DATE_OF_TRANSACTION` date DEFAULT NULL,
  `AMOUNT` int(11) DEFAULT NULL,
  `TRANSACTION_TYPE` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DESCRIPTION` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`TRANSACTION_ID`),
  KEY `ACCOUNT_NO` (`ACCOUNT_NO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;


ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`ACCOUNT_NO`) REFERENCES `account_bk` (`ACCOUNT_NO`) ON DELETE CASCADE ON UPDATE CASCADE;

