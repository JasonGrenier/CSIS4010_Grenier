<?php
include "global.php";

$username = mysqli_real_escape_string($connection, $_POST["username"]);
$password = mysqli_real_escape_string($connection, $_POST["password"]);
$password = password_hash($password, PASSWORD_BCRYPT, ["salt" => $salt]);
# encrypt password
$loginResponse = user_manager::logInUser($username, $password);

if($loginResponse["errorCode"] == 0){
    echo "login successful";
} else {
    # redirect to login page
    include("$root/User-Interface/login.php");
}