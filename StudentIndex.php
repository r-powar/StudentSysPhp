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
      <form action="Procedures/InsertExam.php" target="exam-iframe" method="post">
        ID:
        <input type="text" name="ID"></input>
        <br/>Multiple Choice(All questions have just one answer)
        <br/>
        <p>
          1. The addition of 1+1 =2?
          <br>
            <input type="radio" name="MCQ1" value="True">True</input>
            <br>
              <input type="radio" name="MCQ1" value="Flase">Flase</input>
              <br>
                2. The multiplication of 2X2 = 8?
                <br>
                  <input type="radio" name="MCQ2" value="True">True</input>
                  <br>
                    <input type="radio" name="MCQ2" value="False">False</input>
                    <br>
                      3. The division of 25/5 = 34?
                      <br>
                        <input type="radio" name="MCQ3" value="True">True</input>
                        <br>
                          <input type="radio" name="MCQ3" value="False">False</input>
                          <br>
                            4. The substraction of 14-14 = 0?
                            <br>
                              <input type="radio" name="MCQ4" value="True">True</input>
                              <br>
                                <input type="radio" name="MCQ4" value="False">False</input>
                                <br>
                                  5. SJSU was established in 1900?
                                  <br>
                                    <input type="radio" name="MCQ5" value="True">True</input>
                                    <br>
                                      <input type="radio" name="MCQ5" value="False">False</input>
                                      <br>
                                        6. SJSU was the first school to be established out of CSUs?
                                        <br>
                                          <input type="radio" name="MCQ6" value="True">True</input>
                                          <br>
                                            <input type="radio" name="MCQ6" value="False">False</input>
                                            <br>
                                              7. SJSU is located in the heart of Silicon Valley?
                                              <br>
                                                <input type="radio" name="MCQ7" value="True">True</input>
                                                <br>
                                                  <input type="radio" name="MCQ7" value="False">False</input>
                                                  <br>
                                                    8. SJSU Football team won the Military Bowl last year?
                                                    <br>
                                                      <input type="radio" name="MCQ8" value="True">True</input>
                                                      <br>
                                                        <input type="radio" name="MCQ8" value="False">False</input>
                                                        <br>
                                                          9. The department of Computer Science is located in the Macquarie Hall?
                                                          <br>
                                                            <input type="radio" name="MCQ9" value="True">True</input>
                                                            <br>
                                                              <input type="radio" name="MCQ9" value="False">False</input>
                                                              <br>
                                                                10. Is Cisco one of the main sponsors for SJSU?
                                                                <br>
                                                                  <input type="radio" name="MCQ10" value="True">True</input>
                                                                  <br>
                                                                    <input type="radio" name="MCQ10" value="False">False</input>
                                                                    <br>
                                                                      <input type="submit" value="Submit" id="InsertStudent"></input>
                                                                    </form>
      <iframe width="100%" height="100%" seamless="seamless" frameborder="0" name="exam-iframe" src="Procedures/InsertExam.php"></iframe>
    </div>
    <div id="tabs-2">
      <div id="flip">Click To Select Query To Display</div>
      <div id="panel">
        <a href="Procedures/StudentInfo.php?link=1" target="stu-iframe" style="border:1px solid black; background-color:green;color:yellow;">Detailed Student Information</a>
        <br></br>
          <a href="Procedures/StudentInfo.php?link=2" target="stu-iframe" style="border:1px solid black; background-color:green;color:yellow;">Average Exam Score</a>
        <br></br>
        <a href="Procedures/StudentInfo.php?link=3" target="stu-iframe" style="border:1px solid black; background-color:green;color:yellow;">Exam Results</a>
        <br></br>
        <a href="Procedures/StudentInfo.php?link=4" target="stu-iframe" style="border:1px solid black; background-color:green;color:yellow;">Etc.</a>
        <br></br>
      </div>
      
      <iframe width="100%" height="100%" seamless="seamless" frameborder="0" name="stu-iframe" src="Procedures/StudentInfo.php"></iframe>
    </div>
  </div>
</body>
</html>
