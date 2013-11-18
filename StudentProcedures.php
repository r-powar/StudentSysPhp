<?php

function dbConnect(){
	$con = mysqli_connect("localhost", "root", "", "StudentSystem");
	if(mysqli_connect_errno($con)){
		echo "Failed to connect";
	}
	return $con;
}

function getStudent($connection){
	$statement = $connection->query("SELECT * FROM STUDENT");
	return $statement;
}

function getDetailInfo($connection){
	$statement = $connection->query("SELECT * FROM STUDENT NATURAL JOIN 
		EXAMRESULT NATURAL JOIN SEMESTER NATURAL JOIN EXAMINFO NATURAL JOIN
		ATTENDANCE NATURAL JOIN LABRESULT");
	return $statement;
}

function getExamAverageScore($connection){
	$statement = $connection->query("SELECT AVG(Score) FROM 
		EXAMRESULT NATURAL JOIN STUDENT");
	return $statement;
}

function getNumberOfRegisterStudent($connection){
	$statement = $connection->query("SELECT count(DISTINCT ID) FROM STUDENT");
	return $statement;
}

function getLabScores($connection){
	$statement = $connection->query("SELECT ID, LabLow, LabHigh FROM LABRESULT");
	return $statement;
}

function prepareStatementStudent($connection, $id, $first, $last, $gender, $grade){
	$statement = $connection->prepare("INSERT INTO STUDENT
		(ID, FirstName, LastName, Gender, Grade) VALUES (?, ?, ?, ?, ?)");
	$statement->bind_param("issss", $id, $first, $last, $gender, $grade);
	return $statement;
}

function dbDisconnect($connection){
	mysqli_close($connection);
}

?>