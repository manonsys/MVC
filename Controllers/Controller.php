<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controllers\Controller;
use \Views\Main;

/**
 * Description of Controller
 *
 * @author Mostafa
 */
class Controller {
    //put your code here
    
    public static function __init($request_uri){
        $request_uri = ltrim($request_uri, '/');
        if($request_uri !== ""){
            if(file_exists('Controllers/' . $request_uri . '.php')){
                require '/Controllers/' . $request_uri . '.php';
                $request_uri = str_replace("/","",$request_uri);
                $controller = new $request_uri();
                $controller->__init();
            }else{
                require '/Controllers/Error.php';
                \Controllers\Controller\Error::__init();
            }
        }else{
            return \Views\Main\Login::__view('login');
        }
    }
    
}
