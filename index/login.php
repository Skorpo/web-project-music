<?php

require_once('header.php');

$baseurl = "/~webgroup2/";
$homepage = "/~webgroup2/index.php";

$logged_in = false;

$msg = "Login to access this area";

// if (isset($_SESSION['username'])) 
// {
	// //already logged in
	// header("Location: " . $homepage, true, 302);
// }
// else
if (isset($_POST['username']) && isset($_POST['password'])) 
{
	$sql = sprintf("
		SELECT username
		FROM users
		WHERE username='%s' AND password=sha1('%s')
	", $db->real_escape_string($_POST['username']), $db->real_escape_string($_POST['password']));
	
	if ($result = $db->query($sql)) 
	{
	
		if ($result && $result->num_rows == 1 ) 
		{
			$row = $result->fetch_assoc();
			
			//Update users lastlogin
			//$db->query("UPDATE users SET lastlogin=NOW() WHERE username = '". $row['username']  ."'");
			$_SESSION['uesrname'] = $_POST['username'];
			$_SESSION['loggedin'] = true;

			header("Location: " . $homepage, true, 302);
		} 
		else 
		{
			$msg = "Incorrect username/password";
		}
	} 
	else 
	{
		echo "ERROR: Could not execute $sql. " . $db->error;
	}
}
 
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <!--Sample title-->
    <h1>Not an Akai MPC</h1>

    <!-- <body class="loginform"> -->
		
		<div class="loginform centered">
		<form method="post">
			<div class="key"></div>
			<h3><?php echo $msg; ?></h3>
			<label for="username">
				Username:
				<input name="username" type="text" value="" id="username">
			</label>
			<p>
			<label for="password">
				Password:
				<input name="password" type="password" value="">
			</label>
			<p style="text-align: center;">
				<input id="loginbutton" type="submit" value="login">
			</p>
		</form>
		</div>


</body>

</html>
