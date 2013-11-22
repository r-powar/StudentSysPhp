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

	$uLength = strlen($uname);
	$pLength = strlen($pword);

	if ($uLength >= 1 && $uLength <= 20) {
		$errorMessage = "";
	}
	else {
		$errorMessage = $errorMessage . "Username must be between 1 and 20 characters" . "<BR>";
	}

	if ($pLength >= 1 && $pLength <= 20) {
		$errorMessage = "";
	}
	else {
		$errorMessage = $errorMessage . "Password must be between 1 and 20 characters" . "<BR>";
	}

	if ($errorMessage == "") {

	$db_handle = mysql_connect("localhost", "root", "");
	$db_found = mysql_select_db("login", $db_handle);

	if ($db_found) {

		$uname = quote_smart($uname, $db_handle);
		$pword = quote_smart($pword, $db_handle);

		$SQL = "SELECT * FROM login WHERE LOGIN = $uname";
		$result = mysql_query($SQL);
		$num_rows = mysql_num_rows($result);

		if ($num_rows > 0) {
			$errorMessage = "Username already taken";
		}
		
		else {

			$SQL = "INSERT INTO Login (LOGIN, PASSWORD) VALUES ($uname, $pword)";

			$result = mysql_query($SQL);

			mysql_close($db_handle);

			session_start();
			$_SESSION['login'] = "1";

			header ("Location: login.php");

		}

	}
	else {
		$errorMessage = "Database Not Found";
	}
	
	}

}


?>

	<html>
	<head>
	<title>STUDENTSYSTEM SIGNUP</title>


	</head>
	<body>


<FORM NAME ="form1" METHOD ="POST" ACTION ="signup.php">
<h1>SIGNUP PAGE TO STUDENTSYSTEM</h1>

Username: <INPUT TYPE = 'TEXT' Name ='username'  value="<?PHP print $uname;?>" maxlength="20">
Password: <INPUT TYPE = 'TEXT' Name ='password'  value="<?PHP print $pword;?>" maxlength="16">

<P>
<INPUT TYPE = "Submit" Name = "Submit1"  VALUE = "Register">


</FORM>
<P>

<?PHP print $errorMessage;?>

	</body>
	</html>
