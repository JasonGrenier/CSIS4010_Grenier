<?php
include "global.php";
$loginResponse = user_manager::logInUser($_POST["username"], $_POST["password"]);
if($loginResponse["errorCode"] == 0){
    echo "login successful";
} else {
    # redirect to login page
    include("$root/User-Interface/login.php");
}