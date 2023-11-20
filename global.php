<?php
require_once('database/database_manager.php');

// uncomment when troubleshooting
// ini_set('display_errors', 1);
// error_reporting(E_ALL);

// comment when troubleshooting
// set header to json
//header("Content-Type: application/json; charset=utf-8");

// establish the db connection and relevant variables
$connection = database_manager::getInstance()->getConnection();
