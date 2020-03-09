<?php

class ExampleController extends Framework{

    /******************************************************************/
    //                       FUNCTIONS CONTROLLER                     //
    /******************************************************************/

    //INDEX FUNCTION TO START VIEW PAGE
    public function index(){

        $this->view('example');
    }

    //EXAMPLE RECEIVING GET PARAMS
    public function paramsMethod($req1, $req2, $req3){

        echo 'Test request params: ' . $req1 . " | " . $req2 . " | " . $req3 . ".";

    }

    //EXAMPLE PASS DATA TO VIEW
    public function testMethod(){
        
        //PASS VARIABLES TO VIEW
        $myData = [
            'title'   =>   'Welcome to Framework PHP using title key array!',
            'body'    =>   'My page using body key array framework PHP.'
        ];

        $this->view('example', $myData);
    }

    //EXAMPLE REQUEST DATA DATABASE FROM MODEL
    public function insertDataModel(){

        //RECEIVE MODEL
        $myModel = $this->model('ExampleModel');
        //PRINT DATA MODEL
        //print_r($myModel->myData());

        if($myModel->insertData()){
            echo 'User has been registred with successfuly';
        }else{
            echo 'Sorry issue!';
        }
    }

    //COUNT ROWS DATA FROM DATABASE
    public function countRowDataModel(){
        $myModel = $this->model('ExampleModel');

        if($myModel->countRowsData()){
            echo $myModel->countRowsData();
        }else{
            echo 'Sorry issue, have trouble to count rows!';
        }     
    }

    //FETCH ALL DATA
    public function fetchAllDataModel(){
        $myModel = $this->model('ExampleModel');
        if($myModel->fetchAllData()){
            $result = $myModel->fetchAllData();
        }else{
            echo 'Sorry issue, have trouble to fetch data!';
        }

        $this->view('example', $result);
    }

    //FETCH SPECIFIC DATA FROM DATABASE TO VIEW PAGE
    public function fetchDataModel(){
        $myModel = $this->model('ExampleModel');

        if($myModel->fetchData()){
            $result = $myModel->fetchData();
        }else{
            echo 'Sorry issue, have trouble to fetch data!';
        }
        
        $this->view('example', $result);
    }

    //
    
    

}


?>