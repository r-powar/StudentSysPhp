<?php
$con=mysqli_connect("localhost","root","","StudentSystem");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$link = $_GET['link'];
if( $link =='1' ){
    echo "You Selected Link 1!";
    $result = mysqli_query($con,"SELECT * FROM STUDENT NATURAL JOIN 
                            SEMESTER NATURAL JOIN ATTENDANCE");
                            
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


//$result = mysqli_query($con,"CALL `ViewStudent` ( );");

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
