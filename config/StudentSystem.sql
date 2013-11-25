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
DROP TABLE IF EXISTS `STUDENTLOGIN`;
DROP TABLE IF EXISTS `ADMIN`;
DROP TABLE IF EXISTS `ARCHIVERESULT`;

/***********************************************************************************
            CREATE TABLES
************************************************************************************/
CREATE TABLE IF NOT EXISTS `ATTENDANCE` (
  `ID` int(3) DEFAULT NULL,
  `Absences` int(3) NULL,
  `Present` tinyint(1) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `EXAMINFO` (
  `ID` int(3) DEFAULT NULL,
  `Version` int(1) DEFAULT 1,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `EXAMRESULT` (
  `ID` int(3) NOT NULL,
  `Score` int(3) NOT NULL,
  `LetterGrade` char(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `LABRESULT` (
  `ID` int(3) DEFAULT NULL,
  `LabScore` int(3) DEFAULT NULL,
  `LabPassFail` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `SEMESTER` (
  `ID` int(3) DEFAULT NULL,
  `Term` varchar(10) COLLATE utf8_unicode_ci DEFAULT 'Fall',
  `Year` int(5) DEFAULT 2013
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `STUDENT` (
  `ID` int(3) NOT NULL,
  `FirstName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `LastName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Gender` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `Grade` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `STUDENTLOGIN` (
  `LOGIN` varchar(20) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `ADMIN` (
  `LOGIN` varchar(20) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `ARCHIVERESULT` (
  `ID` int(3) NOT NULL,
  `Score` int(3) NOT NULL,
  `LetterGrade` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `UpdateAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/***********************************************************************************
            CREATE TRIGGERS
************************************************************************************/

DROP TRIGGER IF EXISTS `UpdatePassFail`;
DELIMITER //
CREATE TRIGGER `UpdatePassFail` BEFORE INSERT ON `ATTENDANCE`
 FOR EACH ROW Begin
  IF NEW.Present=0
  THEN INSERT INTO LABRESULT VALUES (New.ID, 0, 0);
  ELSEIF new.Absences>8 THEN INSERT INTO LABRESULT VALUES (New.ID, 2, 1);
  ELSEIF new.Absences>6 THEN INSERT INTO LABRESULT VALUES (New.ID, 4, 1);
  ELSEIF new.Absences>4 THEN INSERT INTO LABRESULT VALUES (New.ID, 6, 1);
  ELSEIF new.Absences>2 THEN INSERT INTO LABRESULT VALUES (New.ID, 8, 1);
  ELSE INSERT INTO LABRESULT VALUES (New.ID, 10, 1);
  End IF;
End
//
DELIMITER ;

DROP TRIGGER IF EXISTS `DeleteStudentCascade`;
DELIMITER //
CREATE TRIGGER `DeleteStudentCascade` AFTER DELETE ON `STUDENT`
 FOR EACH ROW BEGIN
  DELETE from EXAMRESULT where ID = old.ID;
  DELETE from LABRESULT where ID = old.ID;
  DELETE from ATTENDANCE where ID = old.ID;
  DELETE from EXAMINFO where ID = old.ID;
  DELETE from SEMESTER where ID = old.ID;
  DELETE from ARCHIEVERESULT where ID = old.ID;
END
//
DELIMITER ;

DROP TRIGGER IF EXISTS `ArchiveInsert`;
DELIMITER //
CREATE TRIGGER `ArchiveInsert` AFTER INSERT ON `EXAMRESULT`
FOR EACH ROW BEGIN
INSERT INTO ARCHIVERESULT VALUES (New.ID, New.Score, New.LetterGrade, CURRENT_TIMESTAMP);
END
//
DELIMTER ;

DROP TRIGGER IF EXISTS `ArchiveUpdate`;
DELIMITER //
CREATE TRIGGER `ArchiveUpdate` AFTER UPDATE ON `EXAMRESULT`
FOR EACH ROW BEGIN
UPDATE ARCHIVERESULT
SET Score = New.Score, LetterGrade = New.LetterGrade, UpdateAt = CURRENT_TIMESTAMP
WHERE Score = Old.Score and LetterGrade = Old.LetterGrade;
END
//
DELIMITER ;

/***********************************************************************************
            INSERT DATA TABLES
************************************************************************************/
INSERT INTO `ATTENDANCE` (`ID`, `Absences`, `Present`) VALUES
(123, 0, 1),
(456, 2, 1),
(789, 4, 1),
(234, 6, 1),
(567, 8, 1),
(666, 10, 0);

INSERT INTO `EXAMINFO` (`ID`, `Version`, `Date`) VALUES
(123, 1, '2012-05-10'),
(456, 2, '2013-12-10'),
(789, 1, '2012-05-10'),
(234, 1, '2012-12-10'),
(567, 2, '2000-05-10'),
(666, 2, '1980-05-10');

INSERT INTO `EXAMRESULT` (`ID`, `Score`, `LetterGrade`) VALUES
(123, 10, 'A'),
(456, 8, 'B'),
(789, 6, 'C'),
(234, 4, 'D'),
(567, 2, 'F'),
(666, 0, 'F');

/*
INSERT INTO `LABRESULT` (`ID`, `LabScore`, `LabPassFail`) VALUES
(123, 10, 1),
(456, 10, 1),
(789, 8, 1),
(234, 6, 1),
(567, 4, 1),
(666, 0, 0);
*/

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

INSERT INTO `STUDENTLOGIN` (`LOGIN`, `PASSWORD`) VALUES
('student', 'student');

INSERT INTO `ADMIN` (`LOGIN`, `PASSWORD`) VALUES
('admin', 'admin');

/***********************************************************************************
            CREATE PROCEDURES
************************************************************************************/
DROP PROCEDURE IF EXISTS ViewStudent;
DELIMITER //
CREATE PROCEDURE ViewStudent()
	BEGIN
	SELECT * 
  FROM STUDENT NATURAL JOIN SEMESTER NATURAL JOIN ATTENDANCE; 
  end; //
DELIMITER ; 

DROP PROCEDURE IF EXISTS StudentByGrade;
DELIMITER //
CREATE PROCEDURE StudentByGrade(IN theGrade VARCHAR(20))
BEGIN
SELECT FirstName, LastName
FROM Student
Where Grade=theGrade;
END; //
DELIMITER ;

DROP PROCEDURE IF EXISTS countStudentByTerm;
DELIMITER //
CREATE PROCEDURE countStudentByTerm(IN theTerm VARCHAR(10))
BEGIN
SELECT count(distinct ID)
FROM STUDENT NATURAL JOIN SEMESTER
WHERE TERM=theTerm;
END; //
DELIMITER ;