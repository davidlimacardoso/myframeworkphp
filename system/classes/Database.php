<?php

class Database{

    public $host        = HOST;
    public $user        = USER;
    public $database    = DATABASE;
    public $password    = PASSWORD;
    public $conn;
    public $result;

    public function __construct(){
        
        try{

            $con = $this->conn = new PDO(
                'mysql:host='.$this->host . ';dbname='.$this->database, $this->user, $this->password);
            
            //Define capture errors
            return $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch(PDOException $e){

            echo 'Database connection Error: ' . $e->getMessage();
        }
    }

    //QUERY TO DATABASE
    public function query($qry, $params = []){

        if(empty($params)){
            $this->result = $this->conn->prepare($qry);
            return $this->result->execute();

        }else{
            $this->result = $this->conn->prepare($qry);
            return $this->result->execute($params);
        }
    }

    // //FETCH ALL DATA FROM DATABASE TABLE
    public function fetchAll(){
        return $this->result->fetch(PDO::FETCH_OBJ);
    }

    //FETCH DATA FROM DATABASE USING WHERE
    public function fetchAssoc(){
        return $this->result->fetch(PDO::FETCH_OBJ);
    }

    //COUNT ROWS
    public function rowCount(){
        return $this->result->rowCount();
    }

}

?>