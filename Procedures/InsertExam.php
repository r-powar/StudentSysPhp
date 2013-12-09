<?php
$con=mysqli_connect("localhost","root","","StudentSystem");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
if($_POST){

  $ID = $_POST['ID'];
  $Score = 0;
  $LetterGrade = 'A';

   $answer1 = $_POST['MCQ1'];
   $answer2 = $_POST['MCQ2'];
   $answer3 = $_POST['MCQ3'];  
   $answer4 = $_POST['MCQ4'];  
   $answer5 = $_POST['MCQ5'];  
   $answer6 = $_POST['MCQ6'];  
   $answer7 = $_POST['MCQ7'];  
   $answer8 = $_POST['MCQ8'];  
   $answer9 = $_POST['MCQ9'];  
   $answer10 = $_POST['MCQ10'];  
     
   if ($answer1 == "True") {          
    $Score++;      
   }
   if ($answer2 == "False") {          
    $Score++;         
   }
   if ($answer3 == "False") {          
    $Score++;        
   }
   if ($answer4 == "True") {          
    $Score++;        
   }
   if ($answer5 == "False") {          
    $Score++;         
   }
   if ($answer6 == "False") {          
    $Score++;         
   }
   if ($answer7 == "True") {          
    $Score++;        
   }
   if ($answer8 == "True") {          
    $Score++;        
   }
   if ($answer9 == "True") {          
    $Score++;         
   }
   if ($answer10 == "True") {          
    $Score++;        
   }
    
   if ($Score <= 2) {
   $LetterGrade = 'F';
   }
   if ($Score >= 3 && $Score <=4) {
   $LetterGrade = 'D';
   }
   if ($Score >=5 && $Score <=6) {
   $LetterGrade = 'C';
   }
   if ($Score >=7 && $Score <=8) {
   $LetterGrade = 'B';
   }
   if ($Score >=9) {
   $LetterGrade = 'A';
   }
      
   $current = date("Y-m-d h:m:s", time());

  $examResultInsert = "
  INSERT INTO ExamResult (`ID`, `Score`, `LetterGrade`, `UpdateAt`) VALUES
  ('$ID', '$Score', '$LetterGrade', '$current')";
  
  echo 'You have scored ' . $Score . ' points!';
  if (!mysqli_query($con,$examResultInsert)) {
            die('Error: ' . mysqli_error($con));
        }
        
  mysqli_close($con);
}
?>