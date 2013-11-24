/***********************************************************************************
            CREATE LOGIN DATABASE
************************************************************************************/
CREATE DATABASE IF NOT EXISTS `Login` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

/***********************************************************************************
            USE LOGIN DATABASE
************************************************************************************/
USE `Login`;

/***********************************************************************************
            DROP LOGIN TABLE
************************************************************************************/
DROP TABLE IF EXISTS `Login`;
DROP TABLE IF EXISTS `Admin`;

/***********************************************************************************
            CREATE LOGIN TABLE
************************************************************************************/
CREATE TABLE IF NOT EXISTS `Login` (
  `LOGIN` varchar(20) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `Admin` (
  `LOGIN` varchar(20) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


/***********************************************************************************
            INSERT LOGIN TABLE
************************************************************************************/
INSERT INTO `Login` (`LOGIN`, `PASSWORD`) VALUES
('student', 'student');

INSERT INTO `Admin` (`LOGIN`, `PASSWORD`) VALUES
('admin', 'admin');
