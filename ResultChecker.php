<?php 
class ResultChecker{
    public $link;
    public function __construct($host = "localhost", $username = "root", $password = "",$dbname){
        $this->link = mysqli_connect($host,$username,$password);
        $this->createDb($dbname);
        $this->link = mysqli_connect($host,$username,$password,$dbname);
        return $this->link;
    }

    private function createDb($dbname){
        mysqli_query($this->link,"CREATE DATABASE IF NOT EXISTS $dbname");
    }

    public function createTable($sql){
        mysqli_query($this->link,$sql) or die(mysqli_error($this->link));
    }
// To save data to the database
    public function postData($sql){
        $query = mysqli_query($this->link,$sql);
        if (mysqli_affected_rows($this->link)) {
            $res = array('message'=> "User Record Successfully Added");
            return (json_encode ($res));
        }
        else {
            $res = array('message'=> "Server Busy");
            return (json_encode ($res));
        }
    }

    public function verifyRecord($username, $email, $table){
        $sql = "SELECT * FROM $table WHERE email='$email' OR username='$username'";
        $query = mysqli_query($this->link, $sql);
        $data = mysqli_fetch_array($query);
        
        if ($data) {
            $res = array('message' => "User Record Exists, try another email or username"); 
            return json_encode($res);
        } else {
            return null;
        }
    }
    

    public function login($usernameOrEmail, $password, $table) {
        $encr_pword = sha1($password); 
        $sql = "SELECT * FROM $table WHERE (email='$usernameOrEmail' OR username='$usernameOrEmail') AND password='$encr_pword'";
        $query = mysqli_query($this->link, $sql);
        $data = mysqli_fetch_array($query);

        if ($data) {
            $res = array('message' => "Login Successful");
            return json_encode($res);
        } else {
            $res = array('message' => "Invalid Username/Email or Password");
            return json_encode($res); 
        }
    }
}

?>