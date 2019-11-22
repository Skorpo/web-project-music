<?php

session_start();

unset($_SESSION['userid']);
$_SESSION['loggedin'] = false;

header('Location: '. "/~webgroup2/index.php", true, 302);

?>
