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
        <a href="#tabs-1">Exam Taking</a>
      </li>
      <li>
        <a href="#tabs-2">Viewing Results</a>
      </li>
    </ul>
    <div id="tabs-1">
      <form>
        Q1) 1+1 = 2: <br></br>
        <input type="radio" name="q1" value="True">True</input>
        <input type="radio" name="q1" value="False">False</input><br></br>
      </form>
    </div>
    <div id="tabs-2">
      <div id="flip">Click To Select Query To Display</div>
      <div id="panel">
        <a href="Procedures/StudentInfo.php?link=1" target="stu-iframe" style="border:1px solid black; background-color:green;color:yellow;">Detailed Student Information</a>
        <br></br>
          <a href="Procedures/StudentInfo.php?link=2" target="stu-iframe" style="border:1px solid black; background-color:green;color:yellow;">Average Exam Score</a>
        <br></br>
        <a href="Procedures/StudentInfo.php?link=3" target="stu-iframe" style="border:1px solid black; background-color:green;color:yellow;">Etc.</a>
        <br></br>
      </div>
      
      <iframe width="100%" height="100%" seamless="seamless" frameborder="0" name="stu-iframe" src="Procedures/StudentInfo.php"></iframe>
    </div>
  </div>
</body>
</html>
