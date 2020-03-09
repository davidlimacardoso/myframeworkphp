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

        //echo $result;

    }

    //Insert User using form
    public function insertUserForm(){
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(empty($name) || $name == null){
            echo "Name can't be null";
        }
        if(empty($email) || $email == null){
            echo "Email can't be null";
        }
        if(empty($password) || $password == null){
            echo "Password can't be null";
        }
        
        $userModel = $this->model('User');

        $userModel->insertUser($name, $email, $password) ? "Insert with success!" : "Erro to insert user";
        // if($userModel->insertUser($name,$email,$password)){
        //     "Success";
        // }else{
        //     echo "Erro";
        // }


        // if(!isset($_POST) || empty($_POST)){
        //     $erro = "Filds are clean!";
        //     return $erro;
        // }
    }

}

?>