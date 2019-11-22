<?php 

session_start();

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

?>