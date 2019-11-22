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

        echo "current dir: " . getcwd() . "<br>";

        $structure = getcwd() . "/user_files/";
        echo "Changing permissions for: " . $structure . "<br>";

        chmod($structure, 0770);

        // echo "PERMISSIONS: " . substr(sprintf('%o', fileperms($structure)), -4);

        $sql = "SELECT MAX(id) FROM users";
        $result = $db->query($sql);

        if (mysqli_num_rows($result) == 1) {
            // output data of each row
            $row = mysqli_fetch_assoc($result);

            $structure .= $row["MAX(id)"] . "/";
            echo "structure: " . $structure . "<br>";


            if (!mkdir($structure, 0770, true)) {
                die('Failed to create user id folder!');
            }
            else{
                echo "Created user id folder!";
            }

            if (!mkdir($structure . "recordings/")) {
                die('Failed to create recordings folder!');
            }
            else{
                echo "Created recordings folder!";
            }

            if (!mkdir($structure . "sounds/")) {
                die('Failed to create sounds folder!');
            }
            else{
                echo "Created sounds folder!";
            }


        } else {
            echo " 0 or > 1 results -> results: " . mysqli_num_rows($result);
        }
         
         unset($DBPWD);
    
    } else {
         
         trigger_error("Users db.txt file missing, unable to use DB, error=".$db->error, E_USER_ERROR);
    
    }

    



    
?>