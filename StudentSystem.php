<?php

//Connecting to phpMyAdmin, on terminal run php StudentSystem.php
$con = mysqli_connect("127.0.0.1", "steven", "password"); //Username and Password to connect to phpMyAdmin
if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
}

/***********************************************************************************
						CREATE STUDENTSYSTEM DATABASE
************************************************************************************/

$createStudentSystem = "CREATE DATABASE IF NOT EXISTS `StudentSystem` 
						DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci";
if (mysqli_query($con,$createStudentSystem)){
  echo "Database StudentSystem created successfully\n";
  }
else{
  echo "Error creating database: " . mysqli_error($con);
 }

/***********************************************************************************
						USING STUDENTSYSTEM DATABASE
************************************************************************************/

$useStudentSystem = "USE `StudentSystem`";
if(mysqli_query($con, $useStudentSystem)){
        echo "Using StuentSystem successfully\n";
}
else{
        echo "Error using database: " . mysqli_error($con);
}


/***********************************************************************************
						DROPPING TABLES
************************************************************************************/
$dropStudentTable = "DROP TABLE IF EXISTS `STUDENT`";
if(mysqli_query($con, $dropStudentTable)){
	echo "Drop Student Table successfully\n";
}
else{
	echo "Error dropping table: " . mysqli_error($con);
}

$dropSemesterTable = "DROP TABLE IF EXISTS `SEMESTER`";
if(mysqli_query($con, $dropSemesterTable)){
	echo "Drop Semester Table successfully\n";
}
else{
	echo "Error dropping table: " . mysqli_error($con);
}

$dropExamInfoTable = "DROP TABLE IF EXISTS `EXAMINFO`";
if(mysqli_query($con, $dropExamInfoTable)){
	echo "Drop ExamInfo Table successfully\n";
}
else{
	echo "Error dropping table: " . mysqli_error($con);
}

$dropExamResultTable = "DROP TABLE IF EXISTS `EXAMRESULT`";
if(mysqli_query($con, $dropExamResultTable)){
	echo "Drop ExamResult Table successfully\n";
}
else{
	echo "Error dropping table: " . mysqli_error($con);
}

$dropAttendanceTable = "DROP TABLE IF EXISTS `ATTENDANCE`";
if(mysqli_query($con, $dropAttendanceTable)){
	echo "Drop Attendance Table successfully\n";
}
else{
	echo "Error dropping table: " . mysqli_error($con);
}

$dropLabResultTable = "DROP TABLE IF EXISTS `LABRESULT`";
if(mysqli_query($con, $dropLabResultTable)){
	echo "Drop LabResult Table successfully\n";
}
else{
	echo "Error dropping table: " . mysqli_error($con);
}

/***********************************************************************************
						CREATE TABLES
************************************************************************************/

$createStudentTable = "CREATE TABLE IF NOT EXISTS `STUDENT` (
	`ID` INT(3) NOT NULL, 
	`FirstName` VARCHAR(20) COLLATE utf8_unicode_ci NOT NULL,
	`LastName` VARCHAR(20) COLLATE utf8_unicode_ci NOT NULL,
	`Gender` VARCHAR(6) COLLATE utf8_unicode_ci NOT NULL,
	`Grade` VARCHAR(15) COLLATE utf8_unicode_ci NOT NULL,
	PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

if(mysqli_query($con, $createStudentTable)){
	echo "Create Student Table successfully\n";
}
else{
	echo "Error Create table: " . mysqli_error($con);
}

$createSemesterTable = "CREATE TABLE IF NOT EXISTS `SEMESTER` (
	`ID` INT(3),
	`Term` VARCHAR(10) COLLATE utf8_unicode_ci,
	`YEAR` INT(5)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

if(mysqli_query($con, $createSemesterTable)){
	echo "Create Semester Table successfully\n";
}
else{
	echo "Error Create table: " . mysqli_error($con);
}

$createExamInfoTable = "CREATE TABLE IF NOT EXISTS `EXAMINFO` (
	`ID` INT(3), 
	`Version` INT(1),
	`Date` DATE 
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

if(mysqli_query($con, $createExamInfoTable)){
	echo "Create ExamInfo Table successfully\n";
}
else{
	echo "Error Create table: " . mysqli_error($con);
}

$createExamResultTable = "CREATE TABLE IF NOT EXISTS `EXAMRESULT` ( 
	`ID` INT(3),
	`Score` INT(3), 
	`LetterGrade` CHAR NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

if(mysqli_query($con, $createExamResultTable)){
	echo "Create ExamResult Table successfully\n";
}
else{
	echo "Error Create Table: " . mysqli_error($con);
}

$createAttendanceTable = "CREATE TABLE IF NOT EXISTS `ATTENDANCE` (
	`ID` INT(3),
	`Absenses` INT(3) DEFAULT 0,
	`Present` BOOLEAN DEFAULT TRUE
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

if(mysqli_query($con, $createAttendanceTable)){
	echo "Create ATTENDANCE table successfully\n";
}
else{
	echo "Error Create Table " . mysqli_error($con);
}

$createLabResultTable = "CREATE TABLE IF NOT EXISTS `LABRESULT` (
	`ID` INT(3), 
	`LabLow` INT(3), 
	`LabHigh` INT(3), 
	`LabPassFail` BOOLEAN
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

if(mysqli_query($con, $createLabResultTable)){
	echo "Create LABRESULT table successfully\n";
}
else{
	echo "Error Create Table " . mysqli_error($con);
}

/***********************************************************************************
						INSERTING DATA TABLES
************************************************************************************/

$studentData = "INSERT INTO `STUDENT` (`ID`, `FirstName`, `LastName`, `Gender`, `Grade`) VALUES
(123, 'Steven', 'Liao', 'Male', 'Senior'), 
(789, 'Tieu', 'Nguyen', 'Male', 'Senior'), 
(456, 'Raj', 'Powar', 'Male', 'Freshman'), 
(234, 'Ron', 'Mak', 'Male', 'Senior'),
(567, 'Suneuy', 'Kim', 'Female', 'Sophmore'),
(666, 'Cay', 'Horstmann', 'Male', 'Freshman')";

if(mysqli_query($con, $studentData)){
	echo "INSERT INTO STUDENT Table successfully\n";
}
else{
	echo "Error INSERT table: " . mysqli_error($con);
}

$semesterData = "INSERT INTO `SEMESTER` (`ID`, `TERM`, `YEAR`) VALUES
(123, 'Spring', 2012),
(456, 'Fall', 2013),
(789, 'Spring', 2012),
(234, 'Fall', 2012),
(567, 'Spring', 2000), 
(666, 'Fall', 1980)";

if(mysqli_query($con, $semesterData)){
	echo "INSERT INTO SEMESTER Table successfully\n";
}
else{
	echo "Error INSERT table: " . mysqli_error($con);
}

$examinfoData = "INSERT INTO `EXAMINFO` (`ID`, `Version`, `Date`) VALUES
(123, 1, '2012-05-01'),
(456, 2, '2013-09-01'),
(789, 1, '2012-05-01'), 
(234, 1, '2012-09-01'),
(567, 2, '2000-05-01'),
(666, 2, '1980-05-01')";

if(mysqli_query($con, $examinfoData)){
	echo "INSERT INTO EXAMINFO Table successfully\n";
}
else{
	echo "Error Insert table: " . mysqli_error($con);
}

$examresultData = "INSERT INTO `EXAMRESULT` (`ID`, `Score`, `LetterGrade`) VALUES 
	(123, 10, 'A'), 
	(456, 8, 'B'), 
	(789, 6, 'C'), 
	(234, 4, 'D'), 
	(567, 2, 'F'), 
	(666, 0, 'F')";

if(mysqli_query($con, $examresultData)){
	echo "INSERT INTO EXAMRESULT successfully\n";
}
else{
	echo "Error INSERT table " . mysqli_error($con);
}

$attendanceData = "INSERT INTO `ATTENDANCE` (`ID`, `Absenses`, `Present`) VALUES
(123, 3, TRUE),
(456, 4, TRUE),
(789, 1, TRUE),
(234, 3, TRUE),
(567, 6, TRUE),
(666, 14, FALSE)";

if(mysqli_query($con, $attendanceData)){
	echo "INSERT INTO ATTENDANCE successfully\n";
}
else{
	echo "Error INSERT table " . mysqli_error($con);
}

$labresultData = "INSERT INTO `LABRESULT` (`ID`, `LabLow`, `LabHigh`, `LabPassFail`) VALUES 
(123, 7, 9, TRUE),
(456, 2, 10, TRUE), 
(789, 4, 8, TRUE),
(234, 4, 5, FALSE),
(567, 1, 3, FALSE),
(666, 0, 2, FALSE)";

if(mysqli_query($con, $labresultData)){
	echo "INSERT INTO LABRESULT successfully\n";
}
else{
	echo "Error INSERT table " . mysqli_error($con);
}

?>