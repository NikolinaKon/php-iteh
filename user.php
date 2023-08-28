<?php

class User{
    public $id;
    public $username;
    public $password;

    function __construct(){
        $this->$id;
        $this->$username;
        $this->$password;
    }
    
    static function logInUser($usr, mysqli $conn){
    
        $query = "SELECT * FROM user where username=$usr->$username and password=$usr->$password";
        return true;
    }
}

?>