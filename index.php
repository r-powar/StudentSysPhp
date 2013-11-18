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
  
  <script>
    function submitMe() {
    $.ajax({
    method: 'post',
    url: 'Procedures.php',
    data: {
    'id': $('input[name="id"]').val(),
    'firstname': $('input[name="firstname"]').val(),
    'lastname': $('input[name="lastname"]').val(),
    'gender': $('input[name="gender"]').val(),
    'grade': $('input[name="grade"]').val(),
    'term': $('input[name="term"]').val(),
    'year': $('input[name="year"]').val(),
    'present': $('input[name="present"]').val(),
    'abcenses': $('input[name="abcenses"]').val()
    },
    success: function (data) {
    alert("success");
    }
    });
    }
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
    form input {
    width: 100%;
    clear: both;
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
        <a href="#tabs-2">Exam Taking</a>
      </li>
      <li>
        <a href="#tabs-3">Viewing Results</a>
      </li>
    </ul>
    <div id="tabs-1">
      <p>Tab1 Content </p>
	    <?php echo "(This line executed by php)"; ?>
      <div class="registration">
        <form action="Procedures/InsertStudent.php" target="my-iframe" method="post">
          ID: <input type="text" name="ID"></input><br>
          First Name: <input type="text" name="FirstName"></input><br>
          Last Name: <input type="text" name="LastName"></input><br>
          Gender: <input type="text" name="Gender"></input><br>
          Grade: <input type="text" name="Grade"></input><br>
          Term: <input type="text" name="Term"></input><br>
          Year: <input type="text" name="Year"></input><br>
          Present: <input type="text" name="Present"></input><br>
          Number of Absences: <input type="text" name="Absences"></input><br><br>
          <input type="submit" value="Submit Registration" id="InsertStudent"></input>
        </form>
      </div>
      <iframe style="display:none;" name="my-iframe" scr="Procedure/InsertStudent.php"></iframe>
    </div>
    <div id="tabs-2">
      <p>Tab2 Content</p>
    </div>
    <div id="tabs-3">
      <p>Tab3 Content</p>
      <a href="Procedures/StudentInfo.php" target="my-iframe2" style="border:1px solid black; background-color:green;color:yellow;">View Detailed Student Information</a>
      <iframe width="100%" height="100%" seamless="seamless" frameborder="0" name="my-iframe2" scr="Procedures/StudentInfo.php"></iframe>
    </div>
  </div>
</body>
</html>