<?php

class mysql extends connection
{
    protected $conn;
    private $strQuery;
    private $arrValues;
    private $stringValues;

    public function __construct()
    {
           
        $this->conn = New connection;
            
    }
    # Insertar registro 
    public function create(string $query, array $values)
    {
        $this->strQuery = $query; 
        $this->arrValues = $values;
           
        $insert = $this->conn->getConnection()->prepare($this->strQuery);
        $resInsert = $insert->execute($this->arrValues);
        if($resInsert)
        {
            $lastInsert = $this->conn->getConnection()->lastInsertId();
        }else
        {   
            $lastInsert = 0;
        }
        return $lastInsert;
    }
    

    # Mostrar registro
        
    public function findOne(string $query){
        $this->strQuery = $query;
        $resp = $this->conn->getConnection()->prepare($this->strQuery);
        $resp->execute();
        $data = $resp->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    # Mostrar varios registros
    public function find(string  $query){
        $this->strQuery = $query;
        $res = $this->conn->getConnection()->prepare($this->strQuery);
        $res->execute();
        $data = $res->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    # Editar registro

    public function update(string $query, array $values){
        $this->strQuery = $query;
        $this->arrValues = $values;
        $update = $this->conn->getConnection()->prepare($query);
        $exc = $update->execute($this->arrValues);
        return $exc;
    }

    # Eliminar registro

    public function delete($query){
        $this->strQuery = $query;
        $result = $this->conn->getConnection()->prepare($query);
        $result->execute();
        return $result;

    }


    // public function InsertForString(string $query)
    // {
    //     $this->strQuery = $query; 
    //     // $this->stringValues = $values;
           
    //     $insert = $this->conn->getConnection()->prepare($this->strQuery);
    //     $resInsert = $insert->execute();
    //     if($resInsert)
    //     {
    //         $lastInsert = $this->conn->getConnection()->lastInsertId();
    //     }else
    //     {   
    //         $lastInsert = 0;
    //     }
    //     return $lastInsert;
    // }


    // public function UpdateForString(string $query){
    //     $this->strQuery = $query;
        
    //     $update = $this->conn->getConnection()->prepare($query);
    //     $exc = $update->execute();
    //     return $exc;
    // }

}


?>