<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controllers\Main;
use \Views\Main;
use \Session\Handler;
use \Controllers\Controller;

/**
 * Description of MainController
 *
 * @author Mostafa
 */
class MainController {
    //put your code here
    public static function __init(){
        $request_uri = $_SERVER['REQUEST_URI'];
        require 'libs/SessionHandler.php';
        require 'Views/index/Login.php';
        //require 'Views/Dashboard/DashView.php';
        $varRequest = 'Controllers/Controller.php';
        require $varRequest;
        if(\Session\Handler\SessionHandler::__check() === true){
            if($request_uri === '/register'){
                return \Views\Main\Login::__view('register');
            }elseif($request_uri === '/login' || $request_uri === ''){
                return \Views\Main\Login::__view('login');
            }else{
                return \Controllers\Controller\Controller::__init($request_uri);
            }
        }else{
            header("Location: /Dashboard");
            exit;
        }
    }
}
