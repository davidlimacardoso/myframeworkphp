<?php

class User extends Database {

    public function insertUser($name, $email, $pw) {
        
        try{

            $this->query("INSERT users (name, email, password) VALUES (:name, :email, :password)",
            Array(
                'name'=>$name,
                'email'=>$email,
                'password'=>$pw
            ));
            
            echo "Success to the insert user!";
        }catch(PDOException $e){
            
            echo "Error: " . $e->getMessage();
        }

    }

    public function showUsers() {
        
        // $sql = $this->conn->prepare("SELECT * FROM users");
        // $sql->execute();
        // return $sql->fetchAll();
        $this->query('SELECT * FROM users');
        return $this->fetchAll();
    }

    public function countUsers() { 
      
        if($this->query("SELECT * FROM users")){
            return $this->rowCount();
        }
    }

    public function fetchAssocUsers(){

        try{$this->query("SELECT * FROM users WHERE id = '13'");
            return $this->fetchAssoc();
        }catch(PDOException $e ){
            echo "Erro";
        }
            // $r = $this->conn->prepare("SELECT * FROM users WHERE id = '13'");
            // $r->execute();

            // $r = $r->fetch(PDO::FETCH_ASSOC);

            // return $r;

    }

    public function fetchOnlyUser(){

        if($this->query("SELECT * FROM users")){
            return $this->fetchAll();
        }else{
            echo "Erro";
        }
    }

}

?>