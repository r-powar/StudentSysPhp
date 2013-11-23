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
  </script>
  

  <style>
    #myheader {
    font-size: 30px;
    background-color:#01A9DB;
    height:60px;
    padding-top:15px;
    border: 1px solid black;
    }

    .registration {
    width: 200px;
    clear: both;
    }
    
    /*form input {
    width: 100%;
    clear: both;
    }*/

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
        <a href="#tabs-2">Exam Taking</a>
      </li>
      <li>
        <a href="#tabs-3">Viewing Results</a>
      </li>
      <li>
        <a href="#tabs-4">Delete Student</a>
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
      <iframe style="" name="my-iframe" frameborder="0" scr="Procedures/InsertStudent.php"></iframe>
    </div>
    <div id="tabs-2">
    </div>
    <div id="tabs-3">
      <a href="Procedures/StudentInfo.php" target="my-iframe2" style="border:1px solid black; background-color:green;color:yellow;">Detailed Student Information</a>
      <iframe width="100%" height="100%" seamless="seamless" frameborder="0" name="my-iframe2" src="Procedures/StudentInfo.php"></iframe>
    </div>
    <div id="tabs-4">
      <form action="Procedures/DeleteStudent.php" target="my-iframe" method="post">
          <p>DELETE Student</p>
          ID: <input type="text" name="ID"></input><br>
          First Name: <input type="text" name="FirstName"></input><br>
          Last Name: <input type="text" name="LastName"></input><br>
          <input type="submit" value="Submit Delete" id="DeleteStudent"></input>
      </form>
    </div>
  </div>
</body>
</html>
