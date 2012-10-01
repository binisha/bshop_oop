<?php

class UserDao {

    function add_user($salutation, $firstname, $lastname, $email, $username, $password, $confirmpassword) {
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


//            $salutation = trim($_POST['user_salutation']);
//            $firstname = trim($_POST['user_firstname']);
//            $lastname = trim($_POST['user_lastname']);
//            $email = trim($_POST['user_email']);
//            $username = trim($_POST['user_username']);
//            $password = md5($_POST['user_password']);
//            $confirmpassword = md5($_POST['user_confirmpassword']);
            $prep_state->execute();

            $db = NULL;
            return 1;
        } else {
            return 2;
        }
    }

    function delete_user() {
        
    }

    function getUser($username) {

        $db = new PDO("mysql:host=localhost;dbname=BShop", "root", "");
        $sql = "SELECT  * FROM user where user_username = ?";
        $prep_state = $db->prepare($sql);
        $prep_state->bindParam(1, $username, PDO::PARAM_STR);

        $prep_state->execute();
        $user_exist = $prep_state->rowCount();
        require 'User.php';
        if ($user_exist > 0) {

            $row = $prep_state->fetch(PDO::FETCH_OBJ);

            $user = new User($row->user_salutation, $row->user_firstname, $row->user_lastname, $row->user_email, $row->user_username, $row->user_password, $row->user_confirmpassword);

            $db = NULL;
            return $user;
        }
        $db = NULL;
        
    }

//    function authenticate($username, $password) {
//        
//        
//    }

    function logout() {
        
    }

    function validate_user() {
        
    }

    function add_item() {
        
    }

    function delete_item() {
        
    }

    function buy() {
        
    }

}

?>
