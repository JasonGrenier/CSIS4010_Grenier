<?php
class database_manager {
    private static $instance = null;
    private $connection;

    private function __construct() {
        $host = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "kmbeauty";

        $this->connection = new mysqli($host, $username, $password, $dbname);

        if($this->connection->connect_error){
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public static function getInstance(){
        if(self::$instance === null){
            self::$instance = new database_manager();
        }
        return self::$instance;
    }

    public function getConnection(){
        return $this->connection;
    }
}