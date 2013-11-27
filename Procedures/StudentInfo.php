<?php
$con=mysqli_connect("localhost","root","","StudentSystem");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$link = $_GET['link'];
if( $link =='1' ){
    echo "You Selected Link 1!";
    $result = mysqli_query($con,"CALL `ViewStudent` ( );");
 //   $result = mysqli_query($con,"SELECT * FROM STUDENT NATURAL JOIN 
 //                           SEMESTER NATURAL JOIN ATTENDANCE");
                            
echo "<table border='1'>
<tr>
<th>ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Gender</th>
<th>Grade</th>
<th>Term</th>
<th>Year</th>
<th>Present</th>
<th>Absences</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
  echo "<tr>";
  echo "<td>" . $row['ID'] . "</td>";
  echo "<td>" . $row['FirstName'] . "</td>";
  echo "<td>" . $row['LastName'] . "</td>";
  echo "<td>" . $row['Gender'] . "</td>";
  echo "<td>" . $row['Grade'] . "</td>";
  echo "<td>" . $row['Term'] . "</td>";
  echo "<td>" . $row['Year'] . "</td>";
  echo "<td>" . $row['Present'] . "</td>";
  echo "<td>" . $row['Absences'] . "</td>";
  echo "</tr>";
}
echo "</table>";

mysqli_close($con);
}

if( $link =='2' ){
    echo "You Selected Link 2!";
    $result = mysqli_query($con, "SELECT * 
                                  FROM Examinfo NATURAL JOIN labresult NATURAL JOIN examresult");
    
echo "<table border='1'>
<tr>
<th>ID</th>
<th>Version</th>
<th>Exam Date</th>
<th>Lab Score</th>
<th>Lab Pass/Fail</th>
<th>Score</th>
<th>Letter Grade</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
  echo "<tr>";
  echo "<td>" . $row['ID'] . "</td>";
  echo "<td>" . $row['Version'] . "</td>";
  echo "<td>" . $row['ExamDate'] . "</td>";
  echo "<td>" . $row['LabScore'] . "</td>";
  echo "<td>" . $row['LabPassFail'] . "</td>";
  echo "<td>" . $row['Score'] . "</td>";
  echo "<td>" . $row['LetterGrade'] . "</td>";
  echo "</tr>";
}
echo "</table>";

mysqli_close($con);
}

if( $link =='3' ){
    echo "You Selected Link 3!";
    $result = mysqli_query($con, "SELECT AVG(Score) FROM examresult");
    
echo "<table border='1'>
<tr>
<th>AVG Score</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
  echo "<tr>";
  echo "<td>" . $row['AVG(Score)'] . "</td>";
  echo "</tr>";
}
echo "</table>";

mysqli_close($con);
}

if( $link =='4' ){
    echo "You Selected Link 4!";
    $result = mysqli_query($con, "SELECT * FROM archiveresult");
    
echo "<table border='1'>
<tr>
<th>ID</th>
<th>Score</th>
<th>LetterGrade</th>
<th>UpdateAt</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
  echo "<tr>";
  echo "<td>" . $row['ID'] . "</td>";
  echo "<td>" . $row['Score'] . "</td>";
  echo "<td>" . $row['LetterGrade'] . "</td>";
  echo "<td>" . $row['UpdateAt'] . "</td>";
  echo "</tr>";
}
echo "</table>";

mysqli_close($con);
}

if( $link =='5' ){
    echo "You Selected Link 5!";
  if($_POST) {
    $Term = $_POST['Term'];
    $Term = htmlspecialchars($Term);
    $result = mysqli_query($con,"CALL `countStudentByTerm` ('$Term');");
   }
echo "<table border='1'>
<tr>
<th>Number Student in Current Term</th>

</tr>";

while($row = mysqli_fetch_array($result))
{
  echo "<tr>";
  echo "<td>" . $row['NoStudent'] . "</td>";
  echo "</tr>";
}
echo "</table>";

mysqli_close($con);
}

if ($link == '6') {
	echo 'You selected Link 6';
}

if ($link == '7') {
	echo 'You selected Link 7';
}

if( $link =='8' ){
    echo "You Selected Link 8!";
	$score = $_POST['labfail'];
    $result = mysqli_query($con, "SELECT firstname, lastname, labpassfail, score from student, labresult, examresult where labpassfail = '1' AND score '". $score ."'");
    
echo "<table border='1'>
<tr>
<th>FirstName</th>
<th>LastName</th>
<th>LabPassFail</th>
<th>Exam Score</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
  echo "<tr>";
  echo "<td>" . $row['firstname'] . "</td>";
  echo "<td>" . $row['lastname'] . "</td>";
  echo "<td>" . $row['labpassfail'] . "</td>";
  echo "<td>" . $row['score'] . "</td>";
  echo "</tr>";
}
echo "</table>";

mysqli_close($con);
}

if ($link == '9') {
	echo "You selected Link 9";
    $result = mysqli_query($con, "SELECT firstname, lastname, lettergrade, absences from student inner join examresult inner join attendance where lettergrade = 'A' AND absences > 0");
    
echo "<table border='1'>
<tr>
<th>FirstName</th>
<th>LastName</th>
<th>LetterGrade</th>
<th>Absences</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
  echo "<tr>";
  echo "<td>" . $row['firstname'] . "</td>";
  echo "<td>" . $row['lastname'] . "</td>";
  echo "<td>" . $row['lettergrade'] . "</td>";
  echo "<td>" . $row['absences'] . "</td>";
  echo "</tr>";
}
echo "</table>";

mysqli_close($con);
}

if ($link == '10') {
	echo "You selected Link 10";
    $result = mysqli_query($con, "SELECT ID, grade, score from student natural join examresult where grade = 'Freshman' OR grade = 'Senior' AND score > 0");
    
echo "<table border='1'>
<tr>
<th>ID</th>
<th>Grade</th>
<th>Score</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
  echo "<tr>";
  echo "<td>" . $row['ID'] . "</td>";
  echo "<td>" . $row['grade'] . "</td>";
  echo "<td>" . $row['score'] . "</td>";
  echo "</tr>";
}
echo "</table>";

mysqli_close($con);
}

if ($link == '11') {
	echo "You selected Link 11";
    $result = mysqli_query($con, "SELECT ID, gender, score, absences, labpassfail from student natural join examresult natural join attendance, labresult where gender = 'Male' OR gender = 'Female'");
    
echo "<table border='1'>
<tr>
<th>ID</th>
<th>Gender</th>
<th>Score</th>
<th>Absences</th>
<th>LabPassFail</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
  echo "<tr>";
  echo "<td>" . $row['ID'] . "</td>";
  echo "<td>" . $row['gender'] . "</td>";
  echo "<td>" . $row['score'] . "</td>";
  echo "<td>" . $row['absences'] . "</td>";
  echo "<td>" . $row['labpassfail'] . "</td>";
  echo "</tr>";
}
echo "</table>";

mysqli_close($con);
}

if ($link == '12') {
	echo "You selected Link 12";
    $result = mysqli_query($con, "SELECT labpassfail, term, lastname from labresult, semester, student where labpassfail = '1' or labpassfail ='0' and term = 'Spring' or term = 'Fall'");
    
echo "<table border='1'>
<tr>
<th>LabPassFail</th>
<th>Term</th>
<th>LastName</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
  echo "<tr>";
  echo "<td>" . $row['labpassfail'] . "</td>";
  echo "<td>" . $row['term'] . "</td>";
  echo "<td>" . $row['lastname'] . "</td>";
  echo "</tr>";
}
echo "</table>";

mysqli_close($con);
}


?>
<style>
  th {
  background-color:black;
  color:white;
  }

  tr:nth-child(even) {
  background-color: #A9D0F5;
  }

  tr:hover {
  background-color: #BDBDBD
  }
  
  table th {
  padding-right: 20px;
  padding-bottom: 10px;
  }
</style>
