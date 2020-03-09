<?php

//DEFINED CLASS ROTING

class Route extends Framework{

    //DEFAULT CONTROLLER, METHOD, PARAMS

    public $controller      = "Welcome";
    public $method          = "index";
    public $params          = [];
    
    /******************************************************************/
    //                       FILTER CONTROLLER URL                    //
    /******************************************************************/

    public function __construct()
    {
        //REQUEST CONTROLLER NAME

        $url = $this->url();
        if(!empty($url)){

            if(file_exists("../app/controllers/" . $url[0] . ".php")){
                $this->controller = $url[0];
                unset($url[0]);

            }else{
                $msg = "<div style='padding:10px; text-align:center; background-color:#DDD; color:#000;'>Sorry, this controller: ". $url[0] . " didn't found!</div>";
                $this->view('404', $msg);
                exit();
            }
        }

        //INCLUDE CONTROLLER NAME
        require_once "../app/controllers/" . $this->controller . ".php";


        //INSTANCE CONTROLLER
        $this->controller = new $this->controller;

        //CHECK THE METHOD EXIST END ISN'T EMPTY
        if(isset($url[1]) && !empty($url[1])){
            
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);

            }else{
                $msg = "<div style='padding:10px; text-align:center; background-color:#DDD; color:#000;'>Sorry, this method: ". $url[1] . " didn't found!</div>";
                $this->view('404', $msg);
                exit();
            }
        }

        //CHECK PARANS EXISTS AND CREATE ARRAY PARAMS
        if(isset($url)){
            $this->params = $url;
        }else{
            $this->params = [];
        }

        //CALL THE  CALLBACK URL CONTROLLER WITH FUNCTION AND PARAMS
        call_user_func_array([$this->controller, $this->method], $this->params);

    }

    /******************************************************************/
    //                          FILTER URL                            //
    /******************************************************************/
    public function url(){

        if(isset($_GET['url'])){
            $url = $_GET['url'];
            $url = rtrim($url);
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode("/",$url);
            return $url;
        }
    }

}

?>