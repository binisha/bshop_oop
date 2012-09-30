<?php

// Load shopping items in index.php *****************************************

//function load_shopping_item() {
//
////    $server = "localhost";
////    $user = "root";
////    $pass = "";
////    $verbindung = mysql_connect($server, $user, $pass)
////            or die("No Connection to Server....");
////
////    mysql_select_db("bshop")
////            or die("Database couldnot be connected.");
////    $sql = "SELECT  item_id, item_name, item_image, item_price FROM item";
//    
//    $db = new PDO("mysql:host=localhost;dbname=BShop", "root", "");
//                    $sql = "SELECT  * FROM item";
//
//
////echo $sql;
//
//    $abfrage = $db->query($sql);
//
//    if ($abfrage) {
//        echo "<p>Items has been displayed....</p>";
//    } else {
//        echo "<p>Failure...SQL Script</p>";
//    }
//   
//
//   $db=NULL;
//}

// Load load_user_login_data in .php *****************************************
function load_user_login_data($filename) {

    $handle = fopen($filename, 'r') or die("can't open file");
    $user_array = null;

    while (($buffer = fgetcsv($handle, 0, ";")) !== false) {
        list($salutation, $firstname, $lastname, $email, $username, $password, $confrimpassword) = $buffer;
        $var = array($salutation, $firstname, $lastname, $email, $username, $password, $confrimpassword);

        $user_array[$username] = $var;
    }

    if (!feof($handle)) {
        echo "Error: unexpected fgets() fail\n";
    }
    fclose($handle) or die("can't close file");
    return $user_array;
}

function authenticate($username, $password) {
//    $user_arr = load_user_login_data("user_data.csv");
//
//
//    //check first if the key exists in the associative array and extract the value
//    // otherwise the undefined index error might be displayed or shown
//    if (array_key_exists($username, $user_arr)) {
//
//        //gets the specific user infor based on the username key
//        $userValues = $user_arr[$username];
//
//        //checks if the username registered in the csv file is same as entered in the form
//        if ($username == $userValues[4] && $password == $userValues[5] && !empty($username) && !empty($password)) {
//            return 1;
//        } else {
//            return 2;
//        }
//    } else {
//        return 2;
//    }

//    $server = "localhost";
//    $user = "root";
//    $pass = "";
//    $verbindung = mysql_connect($server, $user, $pass)
//            or die("No Connection to Server....");
//
//    mysql_select_db("bshop")
//            or die("Database couldnot be connected.");
    
    $db = new PDO("mysql:host=localhost;dbname=BShop", "root", "");
    $sql = "SELECT  user_username, user_password FROM user";


//    echo $sql;

    $abfrage = $db->query($sql);

    if (!$abfrage) {

        echo "<p>Failure...SQL Script</p>";
    }
    $db = NULL;
}

function register_user($salutation, $firstname, $lastname, $email, $username, $password, $confirmpassword) {
//    if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($username) && !empty($password) && !empty($confirmpassword)) {
////write_csv("user_data.csv", $salutation, $firstname, $lastname, $email, $username, $password, $confrimpassword);
//        insert_user($salutation, $firstname, $lastname, $email, $username, $password, $confirmpassword);
//        return 1;
//    } else {
//        return 2;
//    }
    
    if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($username) && !empty($password) && !empty($confirmpassword)) { 
     $db = new PDO("mysql:host=localhost;dbname=BShop", "root", "");
     $db->query("CREATE TABLE IF NOT EXISTS user(user_id int(11) auto_increment, user_salutation varchar(255), user_firstname varchar(255), user_lastname varchar(255), user_email varchar(255), user_username varchar(255), user_password varchar(255), user_confirmpassword varchar(255),))"); 
     $sql = "INSERT into user (user_salutation, user_firstname, user_lastname, user_email, user_username, user_password, user_confirmpassword) VALUES (?, ?, ?, ?, ?, ?, ?)";
     $prep_state = $db->prepare($sql);
     $prep_state->bindParam(1, $salutation, PDO::PARAM_STR);
     $prep_state->bindParam(2, $firstname, PDO::PARAM_STR);
     $prep_state->bindParam(3, $lastname, PDO::PARAM_STR);
     $prep_state->bindParam(4, $email, PDO::PARAM_STR);
     $prep_state->bindParam(5, $username, PDO::PARAM_STR);
     $prep_state->bindParam(6, $password, PDO::PARAM_STR);
     $prep_state->bindParam(7, $confirmpassword, PDO::PARAM_STR);
 
    
    $salutation = trim($_POST['user_salutation']);
    $firstname = trim($_POST['user_firstname']);
    $lastname = trim($_POST['user_lastname']);
    $email = trim($_POST['user_email']);
    $username = trim($_POST['user_username']);
    $password = md5($_POST['user_password']); 
    $confirmpassword = md5($_POST['user_confirmpassword']); 
    $prep_state->execute();
//    echo "<p>Zeile eingef&uuml;gt: " .$prep_state->rowCount() ."</p>";
    $db = NULL;
    return 1;
    }else{
        return 2;
    }
}

//function insert_user($salutation, $firstname, $lastname, $email, $username, $password, $confirmpassword) {
//    require_once ("db_inc.php");
//    verbindung_mysql("bshop");
//    $sql = "INSERT INTO user (user_salutation, user_firstname, user_lastname, user_email, user_username, user_password, user_confirmpassword)"
//            . " VALUES ('$salutation', '$firstname', '$lastname', '$email', '$username','$password', '$confirmpassword' )";
//
////    echo $sql;
//
//    $abfrage = mysql_query($sql);
//
//    if ($abfrage) {
//        echo "<p>Thank you, Your order has been placed....</p>";
//    } else {
//        echo "<p>Failure...SQL Script</p>";
//    }
//    mysql_close($verbindung);
//}

?>
