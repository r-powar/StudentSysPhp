/***********************************************************************************
            CREATE STUDENTSYSTEM DATABASE
************************************************************************************/
CREATE DATABASE IF NOT EXISTS `StudentSystem` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

/***********************************************************************************
            USING STUDENTSYSTEM DATABASE
************************************************************************************/
USE `StudentSystem`;

/***********************************************************************************
            DROPPING TABLES
************************************************************************************/
DROP TABLE IF EXISTS `ATTENDANCE`;
DROP TABLE IF EXISTS `EXAMINFO`;
DROP TABLE IF EXISTS `EXAMRESULT`;
DROP TABLE IF EXISTS `LABRESULT`;
DROP TABLE IF EXISTS `SEMESTER`;
DROP TABLE IF EXISTS `STUDENT`;

/***********************************************************************************
            CREATE TABLES
************************************************************************************/
CREATE TABLE IF NOT EXISTS `ATTENDANCE` (
  `ID` int(3) DEFAULT NULL,
  `Absences` int(3) DEFAULT '0',
  `Present` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `EXAMINFO` (
  `ID` int(3) DEFAULT NULL,
  `Version` int(1) DEFAULT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `EXAMRESULT` (
  `ID` int(3) DEFAULT NULL,
  `Score` int(3) DEFAULT NULL,
  `LetterGrade` char(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `LABRESULT` (
  `ID` int(3) DEFAULT NULL,
  `LabLow` int(3) DEFAULT NULL,
  `LabHigh` int(3) DEFAULT NULL,
  `LabPassFail` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `SEMESTER` (
  `ID` int(3) DEFAULT NULL,
  `Term` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Year` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `STUDENT` (
  `ID` int(3) NOT NULL,
  `FirstName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `LastName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Gender` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `Grade` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/***********************************************************************************
            CREATE TRIGGERS
************************************************************************************/

DROP TRIGGER IF EXISTS `UpdatePassFail`;
DELIMITER //
CREATE TRIGGER `UpdatePassFail` AFTER INSERT ON `ATTENDANCE`
 FOR EACH ROW Begin
	IF NEW.Present=0
	THEN INSERT INTO EXAMRESULT VALUES (New.ID, 0, 'F');
	
	End IF;
End
//
DELIMITER ;

DROP TRIGGER IF EXISTS `ExtraCredit`;
DELIMITER //
CREATE TRIGGER `ExtraCredit` AFTER UPDATE ON `EXAMRESULT`
 FOR EACH ROW BEGIN
IF Score = 10 and score <> 11
THEN UPDATE EXAMRESULT
SET score = 11
WHERE EXAMRESULT.ID = STUDENT.ID;
END IF;
END
//
DELIMITER ;

/***********************************************************************************
            INSERT DATA TABLES
************************************************************************************/
INSERT INTO `ATTENDANCE` (`ID`, `Absences`, `Present`) VALUES
(123, 3, 1),
(456, 4, 1),
(789, 1, 1),
(234, 3, 1),
(567, 6, 1),
(666, 14, 0);

INSERT INTO `EXAMINFO` (`ID`, `Version`, `Date`) VALUES
(123, 1, '2012-05-01'),
(456, 2, '2013-09-01'),
(789, 1, '2012-05-01'),
(234, 1, '2012-09-01'),
(567, 2, '2000-05-01'),
(666, 2, '1980-05-01');

INSERT INTO `EXAMRESULT` (`ID`, `Score`, `LetterGrade`) VALUES
(123, 10, 'A'),
(456, 8, 'B'),
(789, 6, 'C'),
(234, 4, 'D'),
(567, 2, 'F'),
(666, 0, 'F');

INSERT INTO `LABRESULT` (`ID`, `LabLow`, `LabHigh`, `LabPassFail`) VALUES
(123, 7, 9, 1),
(456, 2, 10, 1),
(789, 4, 8, 1),
(234, 4, 5, 0),
(567, 1, 3, 0),
(666, 0, 2, 0);

INSERT INTO `SEMESTER` (`ID`, `Term`, `Year`) VALUES
(123, 'Spring', 2012),
(456, 'Fall', 2013),
(789, 'Spring', 2012),
(234, 'Fall', 2012),
(567, 'Spring', 2000),
(666, 'Fall', 1980);

INSERT INTO `STUDENT` (`ID`, `FirstName`, `LastName`, `Gender`, `Grade`) VALUES
(123, 'Steven', 'Liao', 'Male', 'Senior'),
(234, 'Ron', 'Mak', 'Male', 'Senior'),
(456, 'Raj', 'Powar', 'Male', 'Freshman'),
(567, 'Suneuy', 'Kim', 'Female', 'Sophmore'),
(666, 'Cay', 'Horstmann', 'Male', 'Freshman'),
(789, 'Tieu', 'Nguyen', 'Male', 'Senior');

/***********************************************************************************
            CREATE PROCEDURES
************************************************************************************/
DELIMITER //

CREATE PROCEDURES ViewStudent()
	BEGIN
	SELECT * FROM STUDENT; end //
DELIMITER ; 
