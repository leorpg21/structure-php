<?php
class connection
{
    private $dbName;
    private $dbUser;
    private $dbPass;
    private $dbHost;
    private $conn;

    public function __construct()
    {
        $this->dbHost = $_ENV['DB_HOST'];
        $this->dbName = $_ENV['DB_NAME'];
        $this->dbUser = $_ENV['DB_USER'];
        $this->dbPass = $_ENV['DB_PASSWORD'];
             
        try {
            
            $this->conn = new PDO('mysql:host='.$this->dbHost.';dbname='.$this->dbName .";charset=utf8mb4", $this->dbUser, $this->dbPass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            ;
        } 
        catch (PDOException $e) 
        {
            print 'ERROR: '.$e->getMessage();
        }
    
    }

    public function getConnection()
    {
        return $this->conn;
    }

}




?>