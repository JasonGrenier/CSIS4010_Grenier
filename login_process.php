<?php
include("global.php");
$salonName = $_POST['salon'] ?? null;
$salonUUID = $_POST['uuid'] ?? null;
$name = mysqli_real_escape_string($connection, $salonName);
$password = filter_input(INPUT_POST, 'uuid', FILTER_VALIDATE_INT);
echo "Name: " . $name;
echo "Password: " . $password;

//query database
$res = mysqli_query($connection, "select * from Salon where SalonName = '$name' 
and SalonID = '$password'");

if (mysqli_num_rows($res) == 0) {
    $errormessage = "Invalid log in credentials.";
    # include("login.php");
    echo $errormessage;
} else {
    header("Location: user.php");
}