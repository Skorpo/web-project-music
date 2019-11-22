<?php 
    session_start();
    //require_once("login.php");
    
    $DB_USERNAME = "rpoul42060";
    $DB_DATABASE = "webgroup2_default";
    
    $dbpwdPath = $_SERVER['CONTEXT_DOCUMENT_ROOT'] . "/../../rpoul42060/db.txt";
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

    $structure = './user_files/';


    
?>