<?php
$num_rows = 0;

if($_POST){
	$con = mysqli_connect("localhost", "root", "", "StudentSystem"); //Username and Password to connect to phpMyAdmin
	if ($con->connect_errno) {
	    die('Could not connect: ' . mysql_error());
	}

	$ID = $_POST['ID'];
	$FirstName = $_POST['FirstName'];
	$LastName = $_POST['LastName'];

	$ID = htmlspecialchars($ID);
	$FirstName = htmlspecialchars($FirstName);
	$LastName = htmlspecialchars($LastName);

	if($ID == "" || $FirstName == "" || $LastName == ""){
		die('One of the fields are missing');
	}

	$SQL = "SELECT * FROM STUDENT WHERE ID = '$ID' and FirstName = '$FirstName' and LastName = '$LastName';";
	$result = mysqli_query($con,$SQL);
	$num_rows = mysqli_num_rows($result);

	if($num_rows >= 1){

	$deleteStudent = "
	DELETE From Student Where ID='$ID' and FirstName='$FirstName' and LastName='$LastName';";
	
	if (!mysqli_query($con,$deleteStudent)) 
	{
            die('Error: ' . mysqli_error($con));
    }
	echo "<h1>Deleted Student Record!</h2>";
	mysqli_close($con);
	}
	else
	{
	die('Error: No such student');
	}
	
}


?> 