<?php


$con = mysqli_connect("127.0.0.1", "steven", "password");
if($con->connect_errno){
	echo "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
}

$sql = "CREATE DATABASE IF NOT EXIST 'StudentSystem' DEFAULT SET utf8 COLLATE utf8_unicode_ci";

if(mysqli_query($con, $sql)){
	echo "Database StudentSystem created successfully\n";
}
else{
	echo "Error creating database: " . mysqli_error($con);
}



?>