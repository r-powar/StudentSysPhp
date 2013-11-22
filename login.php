<?PHP

$uname = "";
$pword = "";
$errorMessage = "";
$num_rows = 0;

function quote_smart($value, $handle) {

   if (get_magic_quotes_gpc()) {
       $value = stripslashes($value);
   }

   if (!is_numeric($value)) {
       $value = "'" . mysql_real_escape_string($value, $handle) . "'";
   }
   return $value;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$uname = $_POST['username'];
	$pword = $_POST['password'];

	$uname = htmlspecialchars($uname);
	$pword = htmlspecialchars($pword);

	$db_handle = mysql_connect("localhost", "root", "");
	$db_found = mysql_select_db("Login", $db_handle);

	if ($db_found) {

		$uname = quote_smart($uname, $db_handle);
		$pword = quote_smart($pword, $db_handle);

		$SQL = "SELECT * FROM login WHERE LOGIN = $uname AND PASSWORD = $pword";
		$result = mysql_query($SQL);
		$num_rows = mysql_num_rows($result);

		if ($result) {
			if ($num_rows > 0) {
				session_start();
				$_SESSION['login'] = "1";
				header ("Location: index.php");
			}
			else {
				//$errorMessage = "Invalid Login";
				//session_start();
				//$_SESSION['login'] = '';

				session_start();
				$_SESSION['login'] = "";
				header ("Location: signup.php");
			}	
		}
		else {
			$errorMessage = "Error logging on";
		}

	mysql_close($db_handle);

	}

	else {
		$errorMessage = "Error logging on";
	}

}

?>


<html>
<head>
<title>StudentSystem Login</title>
</head>
<body>

<FORM NAME ="form1" METHOD ="POST" ACTION ="login.php">

<h1>LOGIN PAGE TO STUDENTSYSTEM</h1>
<h2>ADMIN LOGIN: USERNAME=ADMIN, PASSWORD=ADMIN</h2>
<h2>STUDENT LOGIN: USERNAME=ADMIN, PASSWORD=STUDENT</h2>

Username: <INPUT TYPE = 'TEXT' Name ='username'  value="<?PHP print $uname;?>" maxlength="20">
Password: <INPUT TYPE = 'TEXT' Name ='password'  value="<?PHP print $pword;?>" maxlength="16">

<P>
<INPUT TYPE = "Submit" Name = "Submit1"  VALUE = "Login">

<p>
<a href="signup.php">SIGN UP HERE</a>	
</p>


</FORM>

<P>
<?PHP print $errorMessage;?>




</body>
</html>