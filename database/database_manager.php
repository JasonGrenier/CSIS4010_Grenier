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

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        // Change the user's authentication method
        //$this->connection->query("ALTER USER '{$username}'@'{$host}' IDENTIFIED WITH mysql_native_password BY '{$password}'");
        //$this->connection->query("FLUSH PRIVILEGES");
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
