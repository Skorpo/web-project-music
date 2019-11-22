<?php

require_once("login.php");

$DB_USERNAME = "salim04507";
$DB_DATABASE = "webgroup2_default";

$dbpwdPath = $_SERVER['CONTEXT_DOCUMENT_ROOT'] . "/../../salim04507/db.txt";
$db = false; //Mysqli Object 

if (file_exists($dbpwdPath)) {
	 //DBPwd file exists
	 $DBPWD = trim(file_get_contents($dbpwdPath));
	 
	 $db = new mysqli("localhost", $DB_USERNAME, $DBPWD, $DB_DATABASE );
	 if ($db->connect_errno) {
		  echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
	 }
	 
	 unset($DBPWD);

} else {
	 
	 trigger_error("Users db.txt file missing, unable to use DB, error=".$db->error, E_USER_ERROR);

}

if ($_SESSION['loggedin'] == true)
	{	
		echo "<a href='logout.php'>Logout</a>";
	}
else
{
	if ($_SERVER['REQUEST_URI'] != "/~webgroup2/login.php")
	{
		session_start();

		$sql = "SELECT id FROM users 
						WHERE username = '" . $_SESSION['username'] . "'";
						
				if($result = $db->query($sql))
				{
					if($result->num_rows > 0)
					{
						while ($row = $result->fetch_array())
						{
							echo $row["id"];
						}
						$result->free();
					} 
					else
					{
						echo "No records matching your query were found.";
					}
				} 
				else
				{
					echo "ERROR: Could not execute $sql. " . $db->error;
				}

		if ($_SESSION['loggedin'] == true)
		{	
			echo "<a href='logout.php'>Logout</a>";
		}
		else
		{
			header('Location: '. "/~webgroup2/login.php", true, 302);
		}
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
	<button  id ="LOGIN" type="button">Login</button>
	<button  id ="LOGOUT" type="button">Logout</button> 
	<button  id = "SIGNUP" type="button">SignUp</button>
	
    <div id = "app_container">
        <div id="upper_container">
            <!--Pad container contains all of the pads-->
            <div id="pad_container">

                <button id="pad1" class="pad"></button>
                <button id="pad2"class="pad"></button>
                <button id="pad3"class="pad"></button>
                <button id="pad4"class="pad"></button>

                <button id="pad5"class="pad"></button>
                <button id="pad6"class="pad"></button>
                <button id="pad7"class="pad"></button>
                <button id="pad8"class="pad"></button>

                <button id="pad9"class="pad"></button>
                <button id="pad10"class="pad"></button>
                <button id="pad11"class="pad"></button>
                <button id="pad12"class="pad"></button>

                <button id="pad13"class="pad"></button>
                <button id="pad14"class="pad"></button>
                <button id="pad15"class="pad"></button>
                <button id="pad16"class="pad"></button>

            </div>

            <div id="sidebar_container">
                <div id="playback_menu"></div>
                <div id="other_menu"></div>

            </div>

        </div>
        <div id="samplebar_container">
            <div id = "samplebar"></div>
        </div>
    </div>


</body>

</html>