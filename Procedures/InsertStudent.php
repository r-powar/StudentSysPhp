<?php

include("Procedures/StudentProcedures.php");

if($_POST){
	$con = mysqli_connect("127.0.0.1", "steven", "password"); //Username and Password to connect to phpMyAdmin
	if ($con->connect_errno) {
	    die('Could not connect: ' . mysql_error());
	}

	mysqli_select_db("StudentSystem", $con);

	$ID = $_POST['ID'];
	$FirstName = $_POST['FirstName'];
	$LastName = $_POST['LastName'];
	$Gender = $_POST['Gender'];
	$Grade = $_POST['Grade'];

	$ID = htmlspecialchars($ID);
	$FirstName = htmlspecialchars($FirstName);
	$LastName = htmlspecialchars($LastName);
	$Gender = htmlspecialchars($Gender);
	$Grade = htmlspecialchars($Grade);

	$query = "
	INSERT INTO `StudentSystem`.`Student` (`ID`, `FirstName`, `LastName`, `Gender`, `Grade`) VALUES
	('$ID', '$FirstName', 'LastName', 'Gender', 'Grade')";

	mysqli_query($query);

	echo "<h1>Student Record Inserted!</h2>";

	mysqli_close($con);
}

/*
$connection = dbConnect();

$ID = $_POST['ID'];
$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$Gender = $_POST['Gender'];
$Grade = $_POST['Grade'];

$statement = prepareStatementStudent($connection, $ID, $FirstName, $LastName, $Gender, $Grade);

$statement->execute();

dbDisconnect($connection);


$insertStudent = "INSERT INTO `STUDENT` (`ID`, `FirstName`, `LastName`, `Gender`, `Grade`) VALUES
($_POST['ID'], $_POST['FirstName'], $_POST['LastName'], '$_POST['Gender'], $_POST['Grade'])";

$insertSemester = "INSERT INTO `SEMESTER` (`ID`, `TERM`, `YEAR`) VALUES
($_POST['ID'], $_POST['Term'], $_POST['Year'])";

$insertAttendance = "INSERT INTO `ATTENDANCE` (`ID`, `Absenses`, `Present`) VALUES
($_POST['ID'], $_POST['Absences'], $_POST['Present'])";

mysqli_query($con,$insertStudent);
mysqli_query($con,$insertSemester);
mysqli_query($con,$insertAttendance);

echo "Student record added";

mysqli_close($con);
*/


?> 