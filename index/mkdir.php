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

        $structure = getcwd() . "/user_files/";

        // Getting the max id (most recently created user)
        $sql = "SELECT MAX(id) FROM users";
        $result = $db->query($sql);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            $structure .= $row["MAX(id)"] . "/";

            // code to remove a user and their files
            /* rmdir($structure . "recordings/");
             rmdir($structure . "sounds/");
             rmdir($structure);*/

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
            echo " 0 or > 1 results -> results: " . mysqli_num_rows($result);
        }
         
         unset($DBPWD);
    
    } else {
         
         trigger_error("Users db.txt file missing, unable to use DB, error=".$db->error, E_USER_ERROR);
    
    }

    



    
?>