<?php

class Users extends Framework {

    public function index(){

        //Use Model
        $model = $this->model('User');
        
        if($model->showUsers()){
            //Return model values
            $result = $model->showUsers();
        }else{
            $msg = "Erro: Data user don't found";
            $result = null;
        }

        //Data from jobs
        $job = ['work'=>'Programmer','place'=>'Brazil'];
        
        //Keying data users and jobs
        $data = [
            'userData' => $result,
            'jobData' => $job,
            'msg' => @$msg
        ];

        $this->view('examples/users', $data);

    }

    //Show data from database
    public function show(){
        $model = $this->model('User');

        if($model->showUsers()){

            $result = $model->showUsers();
            echo '<pre>';
            print_r($result);
            echo '</pre>';
        }else{
            echo 'erro';
        }
    }

    //Count rows number
    public function countUsers(){

        $modelUser = $this->model('User');

        if($modelUser->countUsers()){
            echo $modelUser->countUsers();
        }
    }

    //Fetch All
    public function fetchOnlyUser(){

        $modelUser = $this->model('User');

        if($modelUser->fetchAssocUsers()){
            $result = $modelUser->fetchAssocUsers();
            print_r($result);
        }
    }


    //Insert User using form
    public function insertUserForm(){
        
        $req = array(
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'password' => $_POST['password']
        );
        
        
        if(count($req) == 0){
            echo "The fild can't be null:" . "<br>";
        }else{
            echo "The filds can't be null:" . "<br>";
        }
        
        $erro = false;
        
        if(empty($req['name']) || $req['name'] == null){
            echo "&bull; Name can't be null <br>";
            $erro = true;
        }
        if(empty($req['email']) || $req['email'] == null){
            echo "&bull; Email can't be null <br>";
            $erro = true;
        }
        if(empty($req['password']) || $req['password'] == null){
            echo "&bull; Password can't be null <br>";
            $erro = true;
        }

        if($erro == false){
            $userModel = $this->model('User');
            $userModel->insertUser($req['name'], $req['email'], $req['password']) ? "Insert with success!" : "Erro to insert user";    
        }
    }

}

?>