<html>
<head>
  <title>Student Exam Storage System</title>
  <link rel="stylesheet" href="jquery-ui.css" />
  <script src="jquery-1.9.1.js"></script>
  <script src="jquery-ui-1.10.3.custom.js"></script>
  <script>
    $(function() {
    $( "#tabs" ).tabs();
    });

    $(document).ready(function(){
    $("#flip").click(function(){
    $("#panel").slideToggle("slow");
    });
    });
  </script>
  

  <style>
    #myheader {
    font-size: 30px;
    background-color:#01A9DB;
    height:60px;
    padding-top:15px;
    border: 1px solid black;
    }

    .registration, .deletestudent {
    width: 200px;
    clear: both;
    }

    /*form input {
    width: 100%;
    clear: both;
    }*/

    #flip {
    width: 300px;
    border: 2px solid black;
    background-color:#01A9DB;
    color:white;
    text-align: center;
    margin-left: auto ;
    margin-right: auto ;
    }

    #panel {
    text-align: center;
    margin-left: auto ;
    margin-right: auto ;
    border: 1px solid black;
    width:300px;
    background-color: #E6E6E6;
    display:none;
    }

    tr:nth-child(even) {
    background-color: #81BEF7;
    }
  </style>

  <?php
if (!empty($_POST)){
?>
  <script type="text/javascript">
    window.location = window.location.href;
  </script>
  <?php } ?>
  
</head>

<body>
  <div id="myheader">Student Exam Storage System</div>
  <div id="tabs">
    <ul>
      <li>
        <a href="#tabs-1">Student Registration</a>
      </li>
      <li>
        <a href="#tabs-2">Delete Student</a>
      </li>
      <li>
        <a href="#tabs-3">Update Student</a>
      </li>
      <li>
        <a href="#tabs-4">Viewing Results</a>
      </li>
    </ul>
    <div id="tabs-1">
      <div class="registration">
        <form action="Procedures/InsertStudent.php" target="my-iframe" method="post">
          ID: <input type="text" name="ID"></input><br>
          First Name: <input type="text" name="FirstName"></input><br>
          Last Name: <input type="text" name="LastName"></input><br>
          Gender:<br> 
            <input type="radio" name="Gender" value="Male">Male</input><br>
            <input type="radio" name="Gender" value="Female">Female</input><br>
          Grade: <input type="text" name="Grade"></input><br>
          Term: <br>
            <input type="radio" name="Term" value="Fall">Fall</input><br>
            <input type="radio" name="Term" value="Spring">Spring</input><br>
          Year: <input type="text" name="Year"></input><br>
          Present: <br>
            <input type="radio" name="Present" value="1">Yes</input><br>
            <input type="radio" name="Present" value="0">No</input><br>
          Number of Absences: <input type="text" name="Absences"></input><br><br>
          <input type="submit" value="Submit Registration" id="InsertStudent"></input>
        </form>
      </div>
      <iframe style="" width="100%" height="100%" seamless="seamless" name="my-iframe" frameborder="0" src="Procedures/InsertStudent.php"></iframe>
    </div>
    <div id="tabs-2">
      <div class="deletestudent">
        <form action="Procedures/DeleteStudent.php" target="my-iframe3" method="post">
          <p>DELETE Student</p>
          ID: <input type="text" name="ID"></input><br>
            First Name: <input type="text" name="FirstName"></input><br>
              Last Name: <input type="text" name="LastName"></input><br>
                <input type="submit" value="Submit Delete" id="DeleteStudent"></input>
              </form>
      </div>
      <iframe width="100%" height="100%" seamless="seamless" frameborder="0" name="my-iframe3" src="Procedures/DeleteStudent.php"></iframe>
    </div>
    <div id="tabs-3">
      <p>UPDATE Student</p>
      <form action="Procedures/UpdateStudent.php" target="my-iframe" method="post">
          ID: <input type="text" name="ID"></input><br>
          First Name: <input type="text" name="FirstName"></input><br>
          Last Name: <input type="text" name="LastName"></input><br>
          Gender:<br> 
            <input type="radio" name="Gender" value="Male">Male</input><br>
            <input type="radio" name="Gender" value="Female">Female</input><br>
          Grade: <input type="text" name="Grade"></input><br>
          Term: <br>
            <input type="radio" name="Term" value="Fall">Fall</input><br>
            <input type="radio" name="Term" value="Spring">Spring</input><br>
          Year: <input type="text" name="Year"></input><br>
          Present: <br>
            <input type="radio" name="Present" value="1">Yes</input><br>
            <input type="radio" name="Present" value="0">No</input><br>
          Number of Absences: <input type="text" name="Absences"></input><br><br>
          <input type="submit" value="Submit Update" id="UpdateStudent"></input>
        </form>
      <a href="Procedures/StudentUpdate.php">Update ExamResult</a>
    </div>
    <div id="tabs-4">
      <div id="flip">Click To Select Query To Display</div>
      <div id="panel">
        <a href="Procedures/StudentInfo.php?link=1" target="adm-iframe" style="border:1px solid black; background-color:green;color:yellow;">Detailed Student Information</a>
        <br></br>
        <a href="Procedures/StudentInfo.php?link=2" target="adm-iframe" style="border:1px solid black; background-color:green;color:yellow;">Average Exam Score</a>
        <br></br>
        <a href="Procedures/StudentInfo.php?link=3" target="adm-iframe" style="border:1px solid black; background-color:green;color:yellow;">Etc.</a>
        <br></br>
      </div>

      <iframe width="100%" height="100%" seamless="seamless" frameborder="0" name="adm-iframe" src="Procedures/StudentInfo.php"></iframe>
    </div>
  </div>
</body>
</html>
