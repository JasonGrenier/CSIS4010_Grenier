<?php
class user_manager
{

    private static $instance = null;
    private $username;
    private $firstName;
    private $lastName;
    private $token;
    private $phoneNumber;
    private $email;
    private $id;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new user_manager();
        }
        return self::$instance;
    }

    public function createUser($token){
        // fetch username
        $userQuery = mysqli_query(database_manager::getInstance()->getConnection(),
            "SELECT username, first_name, last_name, phone_number, cupload_users.id FROM users, tokens 
            WHERE users.id = tokens.owner_id AND tokens.token='$token';");
        $userJSON = mysqli_fetch_assoc($userQuery);
        $this->username = $userJSON["user_name"];
        $this->firstName = $userJSON["first_name"];
        $this->lastName = $userJSON["last_name"];
        $this->token = $token;
        $this->phoneNumber = $userJSON["phone_number"];
        $this->id = $userJSON["id"];
    }

    public function getUsername() {
        return $this->username;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getToken() {
        return $this->token;
    }

    public function getPhoneNumber() {
        return $this->phoneNumber;
    }

    public function getID(){
        return $this->id;
    }
    public function getEmail(){
        return $this->email;
    }
    static function logInUser($username, $password): array{
        $connection = database_manager::getInstance()->getConnection();
        $errorMessage = "";
        $errorCode = 0;
        $res = mysqli_query($connection, "select * from users where username = '$username' 
        and password = '$password'");

        // validate user and password are a match
        if (mysqli_num_rows($res) == 0) {
            $errorCode = 1;
            $errorMessage = "Username or password incorrect.";
            $logInResponse = array("errorCode" => $errorCode, "errorMessage" => $errorMessage);
            return $logInResponse;
        }

        // generate token and insert into data base
        $token = uniqid();
        $owner_id_res = mysqli_query($connection, "SELECT id FROM users WHERE username = '$username'");
        $owner_id_json = mysqli_fetch_assoc($owner_id_res);
        $owner_id = intval($owner_id_json["id"]);
        mysqli_query($connection, "INSERT INTO tokens (token, owner_id) VALUES('$token', '$owner_id')");

        // collect and send user data to application
        $userInfoJSON = user_manager::sendUserData($token);
        // if there was an error collecting the user's data
        if($userInfoJSON['errorCode'] == 1){
            // echo the error and kill the process
            return $userInfoJSON;
        }
        $logInResponse = array("errorCode" => $errorCode, "errorMessage" => $errorMessage, "token" => $token);
        return array_merge($logInResponse,$userInfoJSON);
    }

    static function sendUserData($token): array
    {
        $res = mysqli_query(database_manager::getInstance()->getConnection(), "SELECT username, first_name, last_name, phone_number, users.id FROM users, tokens 
            WHERE users.id = tokens.owner_id AND tokens.token='$token';");
        $row = mysqli_fetch_assoc($res);
        if (mysqli_num_rows($res) == 0) {
            $row["errorMessage"] = "There was an error retrieving the user's data.";
            $row["errorCode"] = 1;
        } else {
            $row["errorMessage"] = "";
            $row["errorCode"] = 0;
        }
        return $row;
    }

    static function validateToken($token): bool
    {
        $connection = database_manager::getInstance()->getConnection();
        $res = mysqli_query($connection, "SELECT * FROM tokens WHERE token = '$token'");
        if (mysqli_num_rows($res) == 0) {
            return false;
        }
        return true;
    }
}