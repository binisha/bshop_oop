<?php

class User {

    public $salutation;
    public $firstname;
    public $lastname;
    public $email;
    public $username;
    public $password;
    public $confrimpassword;

    public function User($salutation, $firstname, $lastname, $email, $username, $password, $confrimpassword) {

        $this->$salutation = $salutation;
        $this->$firstname = $firstname;
        $this->$lastname = $lastname;
        $this->$email = $email;
        $this->$username = $username;
        $this->$password = $password;
        $this->$confrimpassword = $confrimpassword;
    }

    static function register($salutation, $firstname, $lastname, $email, $username, $password, $confrimpassword) {

        $user = new User();

        $user->$salutation = $salutation;
        $user->$firstname = $firstname;
        $user->$lastname = $lastname;
        $user->$email = $email;
        $user->$username = $username;
        $user->$password = $password;
        $user->$confrimpassword = $confrimpassword;

        return $user;
    }

    function login() {
        
    }

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
