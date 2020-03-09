<?php

class Framework{
    
    public function view($viewName, $data = []){

        if(file_exists('../app/views/' . $viewName . '.php')){
            require_once '../app/views/' . $viewName . '.php';
        
        }else{
            echo "<div style='padding:10px; text-align:center; background-color:#DDD; color:#000;'>Sorry, this view ". $viewName . ".php file, didn't found!</div>";
        }
    }

    public function model($modelName){

        if(file_exists('../app/models/' . $modelName . '.php')){
            require_once '../app/models/' . $modelName . '.php';
            return new $modelName;
        }else{
            echo "<div style='padding:10px; text-align:center; background-color:#DDD; color:#000;'>Sorry, this model ". $modelName . ".php file, didn't found!</div>";
        }
    }
    
}

?>