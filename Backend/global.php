<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/Database/database_manager.php";
include "$root/Database/user_manager.php";
# Uncomment when debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

# This is where all connections and global vars / methods will be stored

# Singleton object to connection to database
database_manager::getInstance()->getConnection();

