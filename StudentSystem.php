<?php

$con = mysqli_connect("127.0.0.1", "steven", "password");
if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
}

$createStudentSystem = "CREATE DATABASE IF NOT EXISTS `StudentSystem` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci";

if (mysqli_query($con,$createStudentSystem)){
  echo "Database StudentSystem created successfully\n";
  }
else{
  echo "Error creating database: " . mysqli_error($con);
 }

$useStudentSystem = "USE 'StudentSystem'";
if(mysqli_query($con, $useStudentSystem)){
	echo "Using StuentSystem successfully\n";
}
else{
	echo "Error using database: " . mysqli_error($con);
}

$createStudentTable = "CREATE TABLE IF NOT EXIST 'STUDENT' (
	'ID' INT(3) NOT NULL, 
	'FirstName' VARCHAR(20) COLLATE utf8_unicode_ci NOT NULL,
	'LastName' VARCHAR(20) COLLATE utf8_unicode_ci NOT NULL,
	'Gender' VARCHAR(6) COLLATE utf8_unicode_ci NOT NULL,
	'Grade' VARCHAR(15) COLLATE utf8_unicode_ci NOT NULL,
	PRIMARY KEY ('ID')
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci";

if(mysqli_query($con, $createStudentTable)){
	echo "Create Student Table successfully\n";
}
else{
	echo "Error Create table: " . mysqli_error($con);
}



?>