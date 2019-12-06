<?php

session_start();

unset($_SESSION['username']);
$_SESSION['loggedin'] = false;

header('Location: '. "/~webgroup2/index.php", true, 302);

?>
