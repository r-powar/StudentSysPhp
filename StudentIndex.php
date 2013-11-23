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
        <a href="#tabs-1">Viewing Results</a>
      </li>
    </ul>
    <div id="tabs-1">
      <a href="Procedures/StudentInfo.php" target="stu-iframe" style="border:1px solid black; background-color:green;color:yellow;">Detailed Student Information</a>
      <iframe width="100%" height="100%" seamless="seamless" frameborder="0" name="stu-iframe" src="Procedures/StudentInfo.php"></iframe>
    </div>
  </div>
</body>
</html>
