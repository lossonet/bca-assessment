<?php

class Client {

    private $email;
     
    public function __construct($email)
    {
        $this->email = trim(strtolower($email));
    }

    public static function save($data = [])
    {
        if (empty($data)) {
            return false;
        }

        $instance = ConnectDB::getInstance();
        $pdo      = $instance->getConnection();

        $sql = "INSERT INTO `clients` 
                    (salutation, first_name, last_name, email, country, zipcode, newsletter, asset_class, investment_time, expected_date, comments) 
                VALUES 
                    (:salutation, :first_name, :last_name, :email, :country, :zipcode, :newsletter, :asset_class, :investment_time, :expected_date, :comments)";

        $query = $pdo->prepare($sql);

        try {
            $query->execute($data);
            return true;
        } catch (PDOException $e) {
            $alert = new Alert();
            $alert->save([
                'type'    => 'danger',
                'message' => $e->getMessage(),
                'data'    => $data,
            ]);
            return false;     
        }
    }

    public static function getAll()
    {
        $instance = ConnectDB::getInstance();
        $pdo      = $instance->getConnection();

        $sql = "SELECT * FROM `clients`";

        $query = $pdo->prepare($sql);

        try {
            $query->execute();
            return $clients = $query->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            $alert = new Alert();
            $alert->save([
                'type'    => 'danger',
                'message' => $e->getMessage(),
            ]);
            return false;   
        }
    }  

    public function get()
    {
        $instance = ConnectDB::getInstance();
        $pdo      = $instance->getConnection();

        $sql = "SELECT * FROM `clients` WHERE email=?";

        $query = $pdo->prepare($sql);

        try {
            $query->execute([$this->email]);

            return $client = $query->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            $alert = new Alert();
            $alert->save([
                'type'    => 'danger',
                'message' => $e->getMessage(),
            ]);
            return false;   
        }        
    }

    public function delete()
    {
        $instance = ConnectDB::getInstance();
        $pdo      = $instance->getConnection();

        $sql = "DELETE FROM `clients` WHERE email=?";

        $query = $pdo->prepare($sql);

        try {
            $result = $query->execute([$this->email]);
            return true;
        } catch (PDOException $e) {
            $alert = new Alert();
            $alert->save([
                'type'    => 'danger',
                'message' => $e->getMessage(),
            ]);
            return false;   
        }        
    }  
}