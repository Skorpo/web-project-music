<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
				
				<?php
				
					include_once('header.php');
					$baseurl = "/~webgroup2/";
					$homepage = "/~webgroup2/index.php";

					$logged_in = false;

					$msg = "Sign up!";
				
					$form_data = $_POST;
					
					$error_username = "";
					$error_password = "";
					
					if(count($_POST) > 0)
					{
						if (!isset($_POST["username"]) || trim($_POST["username"]) == '')
							$error_username = "username is required.";
						
						if (!isset($_POST["password"])|| trim($_POST["password"]) == '')
							$error_password = "Password is required.";
					}
				?>	
					
				<?php
					if (count($_POST) > 0 && $error_username == "" && $error_password == "")
					{	
						$sql = sprintf("
								INSERT INTO users (username, password)
								VALUES ('%s',sha1('%s')) 
							",$db->real_escape_string($_POST['username']),$db->real_escape_string($_POST['password']));
							
							if ($db->query($sql)) 
							{
								$db->commit(); //commit transaction
								echo "Successfully registered!";
								
								$structure = getcwd() . "/user_files/";

								// Getting the max id (most recently created user)
								$sql_max_id = "SELECT MAX(id) FROM users";
								$result = $db->query($sql_max_id);

								if (mysqli_num_rows($result) == 1) {
									$row = mysqli_fetch_assoc($result);

									$structure .= $row["MAX(id)"] . "/";

									if (!is_dir($structure)){
										if (!mkdir($structure, 0777, true)) {
											die('Failed to create user id folder!');
										}
										else{
											echo "Created user id folder!" . "<br>";;
										}

										if (!mkdir($structure . "recordings/", 0777, true)) {
											die('Failed to create recordings folder!');
										}
										else{
											echo "Created recordings folder!" . "<br>";;
										}

										if (!mkdir($structure . "sounds/", 0777, true)) {
											die('Failed to create sounds folder!');
										}
										else{
											echo "Created sounds folder!" . "<br>";;
										}
									}
									else{
										echo "Directory with id " . $row["MAX(id)"] . " already exists!" . "<br>";
									}
								

								} else {
									
									echo "ERROR: " . mysqli_num_rows($result) . " user(s) with id " . $row["MAX(id)"] . " exist!";
									
									
								}
								
								
								
								
								
								
								
								
								$_SESSION['username'] = $_POST['username'];
								$_SESSION['loggedin'] = true;
								header('Refresh: 3; URL=http://tophat.sunywcc.edu/~webgroup2/index.php');
							} 
							else 
							{
								$db->rollback(); //ROLLBACK transaction
								echo "ERROR: Could not execute $sql. " . $db->error;
							} 	
							$db->close();
					}
				?>	
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
						
						<?php echo '<p style="color: red">';
						echo $error_username;
						echo '</p>';?>
				  
						<?php echo '<p style="color: red">';
						  echo $error_password;
						  echo '</p>';?>
						<p style="text-align: center;">
							<input id="registerbutton" type="submit" value="register">
						</p>
					</form>
					</div>
			 
</body>

</html>

