<?php

if($_POST){
	$con = mysqli_connect("localhost", "root", "", "StudentSystem"); //Username and Password to connect to phpMyAdmin
	if ($con->connect_errno) {
	    die('Could not connect: ' . mysql_error());
	}

	//mysqli_select_db("StudentSystem", $con);

	$ID = $_POST['ID'];
	$Score = $_POST['Score'];
	$LetterGrade = $_POST['LetterGrade'];

	$ID = htmlspecialchars($ID);
	$Score = htmlspecialchars($Score);
	$LetterGrade = htmlspecialchars($LetterGrade);


	if($ID == "" || $Score == "" || $LetterGrade == ""){
		die('One of the fields are missing');
	}
	$SQL = "SELECT * FROM STUDENT WHERE ID='$ID';";
	$result = mysqli_query($con, $SQL);
	$num_rows = mysqli_num_rows($result);
	$current = date("Y-m-d h:m:s", time());

	if($num_rows >= 1){
	$examUpdate = "
	UPDATE EXAMRESULT SET `Score`='$Score', `LetterGrade`='$LetterGrade', `UpdateAt`='$current'
	WHERE `ID`= '$ID';";

    if (!mysqli_query($con,$examUpdate)) {
            die('Error: ' . mysqli_error($con));
        }
	echo "<h1>Student Exam Record Updated!</h2>";

	mysqli_close($con);
	}else{
		die('Error, No such ID');
	}
}

?> 