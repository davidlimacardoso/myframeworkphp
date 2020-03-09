<?php

class ExampleModel extends Database {

    public function myData(){

        //echo 'My Database data';
        //IMPORT DATA KEY ARRAY FROM DATABASE TO EXAMPLECONTROLLER/TESTMODEL 
        return [
            'name' => 'Florentine',
            'old' => '26',
            'phone' => '+5511999999999'
        ];
    }

    //INSERT DATA TO DATABASE
    public function insertData(){

        $name       = 'admin';
        $email      = 'adm@g.com';
        $password   = '123456';
        
        if($this->db_query('INSERT INTO users (name, email, password) 
        VALUES (?,?,?)', [$name, $email, $password])){
            return true;
        }else{
            return false;
        }
    }

    //SHOW DATA FROM DATABASE
    public function countRowsData(){

        if($this->db_query('SELECT * FROM users;')){
            return $this->rowCount();
        }else{
            return false;
        }
    }

    //FETCH DATA
    public function fetchAllData(){

        $sql = $this->conn->prepare('SELECT * FROM users');
        $sql->execute($sql);
        //$result = $sql->get_result();
        return $sql;
        //mysqli_query($this->conn, $sql);
        //return $this->fetchAllData();

        // if($this->Query('SELECT * FROM users;')){
        //     return $this->fetchAll();
        // }else{
        //     return false;
        // }
    }
    
    //FETCH ESPECIFIC DATA FROM DATABASE
    public function fetchData(){
        $id = 1;
        if($this->Query('SELECT * FROM users WHERE id = ?',[$id])){
            return $this->fetchOnly();
        }else{
            return false;
        }

    }
}
?>