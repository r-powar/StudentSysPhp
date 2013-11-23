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

	$ID = htmlspecialchars($ID);
	$FirstName = htmlspecialchars($FirstName);
	$LastName = htmlspecialchars($LastName);

	$deleteStudent = "
	DELETE From Student Where ID='$ID' and FirstName='$FirstName' and LastName='$LastName';";

	if (!mysqli_query($con,$deleteStudent)) {
            die('Error: ' . mysqli_error($con));
        }
	echo "<h1>Deleted Student Record!</h2>";
	
	mysqli_close($con);
}

?> 