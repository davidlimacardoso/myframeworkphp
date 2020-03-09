<?php

class User extends Database {

    public function insertUser($name, $email, $pw) {
        
        try{

            $qr = $this->conn->prepare("INSERT users (name, email, password) VALUES (:name, :email, :password)");
            $qr->execute(array(
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
        
        $sql = $this->conn->prepare("SELECT * FROM users");
        $sql->execute();
        return $sql->fetchAll();
    }

    public function countUsers() { 
        
        $sql = $this->conn->prepare("SELECT * FROM users");
                    
        return $this->rowCount();
        
        //return $sql->execute();
        //return $sql;
    }

}

?>