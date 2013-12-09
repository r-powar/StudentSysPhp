<?php

	if($_POST){
	$con = mysqli_connect("localhost", "root", "", "StudentSystem"); //Username and Password to connect to phpMyAdmin
	if ($con->connect_errno) {
	    die('Could not connect: ' . mysql_error());
	}


	$theDate = $_POST['theDate'];

	$theDate = htmlspecialchars($theDate);


    $result = mysqli_query($con, "CALL `ArchiveExamProc` ('$theDate');");

	mysqli_close($con);

}
?> 