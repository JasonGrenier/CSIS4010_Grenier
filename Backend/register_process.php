<?php
include "global.php";

$registerResponseStart = "There was an issue processing the following fields: ";
$errorCount = 0;

$firstName = mysqli_real_escape_string($connection, $_POST["firstName"]);
$lastName = mysqli_real_escape_string($connection, $_POST["lastName"]);
$username = mysqli_real_escape_string($connection, $_POST["username"]);
$password = mysqli_real_escape_string($connection, $_POST["password"]);
$confirmPassword = mysqli_real_escape_string($connection, $_POST["confirm_password"]);
$phone = mysqli_real_escape_string($connection, $_POST["phone"]);
$email = mysqli_real_escape_string($connection, $_POST["email"]);

if (strlen($firstName) < 3)
    $registerResponse = $registerResponse . "<b>first name</b>";

if (strlen($lastName) < 3)
    $registerResponse = $registerResponse . " <b>last name</b>";

if (strlen($email) < 3)
    $registerResponse = $registerResponse . " <b>email</b>";

if (strlen($phone) < 10)
    $registerResponse = $registerResponse . " <b>phone number</b>";

if (strlen($password) < 8)
    $registerResponse = $registerResponse . " <b>password length</b>";

if ($password != $confirmPassword)
    $registerResponse = $registerResponse . " <b>confirm password</b>";

$res = mysqli_query($connection, "select * from users where username = '$username'");
if (mysqli_num_rows($res) != 0) {
    $registerResponse .= " <b>username already taken</b>";
}

$registerResponseEnd = ". Please double check entries are valid.";
if (!isset($registerResponse)){
    echo "Registration successful.";
    # encrypt password
    $password = password_hash($password, PASSWORD_BCRYPT, ["salt" => $salt]);
    # store user data in database
    mysqli_query($connection, "insert into users (first_name, last_name, username, password, phone_number, email) values('$firstName', '$lastName', 
                                                                                                    '$username', '$password', '$phone', '$email')");
    user_manager::logInUser($username, $password);

} else {
    $registerResponse = array("errorCode" => 1, "errorMessage" => $registerResponseStart . $registerResponse . $registerResponseEnd);
    include("$root/User-Interface/register.php");
}
die();
