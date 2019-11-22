<?php

include_once("header.php");

if ($_SESSION['loggedin'] == true)
{	
	echo "Hello, " . $_SESSION['username'] . ". | " . "<a href='logout.php'>Logout</a>";
}
else
{
	echo "<a href='login.php'>Log in</a> | <a href='signup.php'>Sign up</a> ";
}
// else
// {
	// $sql = "SELECT id FROM users 
					// WHERE username = '" . $_SESSION['username'] . "'";
						
			// if($result = $db->query($sql))
			// {
				// if($result->num_rows > 0)
				// {
					// while ($row = $result->fetch_array())
					// {
						// echo $row["id"];
					// }
					// $result->free();
				// } 
				// else
				// {
					// echo "No records matching your query were found.";
				// }
			// } 
			// else
			// {
				// echo "ERROR: Could not execute $sql. " . $db->error;
			// }
// }


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
  <script src="script.js" type="text/javascript"></script>

</body>

</html>