<?php

session_start();

unset($_SESSION['userid']);
$_SESSION['loggedin'] = false;

header('Location: '. "/~salim04507/web/lab09/index.php", true, 302);

?>
