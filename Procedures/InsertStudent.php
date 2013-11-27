<?php

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
	$Absences = $_POST['Absences'];

	$ID = htmlspecialchars($ID);
	$FirstName = htmlspecialchars($FirstName);
	$LastName = htmlspecialchars($LastName);
	$Gender = htmlspecialchars($Gender);
	$Grade = htmlspecialchars($Grade);
	$Term = htmlspecialchars($Term);
	$Year = htmlspecialchars($Year);
	$Present = htmlspecialchars($Present);
	$Absences = htmlspecialchars($Absences);

	if($FirstName == "" || $LastName == "" || $Gender == "" || $Grade == "" || $Term == "" || $Year == "" || $Present == "" || $Absences == ""){
		die('One of the fields are missing');
	}


	$Month = "";
	$Date = "";
	$Version = rand(1, 2);
	
	if($Term == 'Spring'){
		$Month = "05-10";
	}else{
		$Month = "12-10";
	}
	$Date = $Year."-".$Month;

	$studentInsert = "
	INSERT INTO Student (`ID`, `FirstName`, `LastName`, `Gender`, `Grade`) VALUES
	('$ID', '$FirstName', '$LastName', '$Gender', '$Grade')";

	$semesterInsert = "
	INSERT INTO Semester (`ID`, `Term`, `Year`) VALUES
	('$ID', '$Term', '$Year')";

	$attendanceInsert = "
	INSERT INTO Attendance (`ID`, `Absences`, `Present`) VALUES
	('$ID', '$Absences', '$Present')";

	$examinfoInsert = "
	INSERT INTO EXAMINFO (`ID`, `Version`, `Date`) VALUES 
	('$ID', '$Version', '$Date')";

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
    if (!mysqli_query($con,$examinfoInsert)) {
            die('Error: ' . mysqli_error($con));
        }
	echo "<h1>Student Record Inserted!</h2>";

	mysqli_close($con);
}

?> 