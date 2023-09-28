<?php
# Uncomment when debugging
# error_reporting(E_ALL);
# ini_set('display_errors', 1);

$salt = "jlsasndajncfdjnskdkjdsoksjk";

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/Database/database_manager.php";
include "$root/Database/user_manager.php";

# Singleton object to connect to database
$connection = database_manager::getInstance()->getConnection();

