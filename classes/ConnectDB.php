<?php

class ConnectDB {
    private static $instance = null;
    private $conn;

    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $name = DB_NAME;
     
    private function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host={$this->host}; dbname={$this->name}", $this->user, $this->pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }
    
    public static function getInstance()
    {
      if(!self::$instance) {
        self::$instance = new ConnectDB();
      }

      return self::$instance;
    }

    public function getConnection()
    {
      return $this->conn;
    }    
}