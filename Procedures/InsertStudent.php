<?php

include("Procedures/StudentProcedures.php");

if($_POST){
	$con = mysqli_connect("localhost", "root", "", "StudentSystem"); //Username and Password to connect to phpMyAdmin
	if ($con->connect_errno) {
	    die('Could not connect: ' . mysql_error());
	}

	//mysqli_select_db("StudentSystem", $con);

	$ID = $_POST['ID'];
	$FirstName = $_POST['FirstName'];
	$LastName = $_POST['LastName'];
	$Gender = $_POST['Gender'];
	$Grade = $_POST['Grade'];
	$Term = $_POST['Term'];
	$Year = $_POST['Year'];
	$Present = $_POST['Present'];
	$Attendance = $_POST['Absences'];

	$ID = htmlspecialchars($ID);
	$FirstName = htmlspecialchars($FirstName);
	$LastName = htmlspecialchars($LastName);
	$Gender = htmlspecialchars($Gender);
	$Grade = htmlspecialchars($Grade);
	$Term = htmlspecialchars($Term);
	$Year = htmlspecialchars($Year);
	$Present = htmlspecialchars($Present);
	$Attendance = htmlspecialchars($Attendance);

	$studentInsert = "
	INSERT INTO Student (`ID`, `FirstName`, `LastName`, `Gender`, `Grade`) VALUES
	('$ID', '$FirstName', '$LastName', '$Gender', '$Grade')";

	$semesterInsert = "
	INSERT INTO Semester (`ID`, `Term`, `Year`) VALUES
	('$ID', '$Term', '$Year')";

	$attendanceInsert = "
	INSERT INTO Attendance (`ID`, `Absences`, `Present`) VALUES
	('$ID', '$Absences', '$Present')";
//	mysqli_query($query);
	if (!mysqli_query($con,$studentInsert)) {
            die('Error: ' . mysqli_error($con));
        }

    if (!mysqli_query($con,$semesterInsert)) {
            die('Error: ' . mysqli_error($con));
        }
    if (!mysqli_query($con,$attendanceInsert)) {
            die('Error: ' . mysqli_error($con));
        }
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


$con = mysqli_connect("localhost", "root", "", "localhost");
if(mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_errno();
}

$insertStudent = "INSERT INTO STUDENT (ID, FirstName, LastName, Gender, Grade) VALUES
('$_POST[ID]', '$_POST[FirstName]', '$_POST[LastName]', '$_POST[Gender]', '$_POST[Grade]')";

$insertSemester = "INSERT INTO SEMESTER (ID, TERM, YEAR) VALUES
('$_POST[ID]', '$_POST[Term]', '$_POST[Year]')";

$insertAttendance = "INSERT INTO ATTENDANCE (ID, Absenses, Present) VALUES
('$_POST[ID]', '$_POST[Absences]', '$_POST[Present]')";

if(!mysqli_query($con, $insertStudent)){
	die('Error: ' . mysqli_error($con));
}

if(!mysqli_query($con, $insertSemester)){
	die('Error: ' . mysqli_error($con));
}

if(!mysqli_query($con, $insertAttendance)){
	die('Error: ' . mysqli_error($con));
}

echo "Student record added";

mysqli_close($con);
*/


?> 