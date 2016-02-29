<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Controllers\Controller;

use \Session\Handler;
use \Views\Main;


/**
 * Description of Error
 *
 * @author mostafa
 */
class Error {
    //put your code here
    public function __init(){
        
        require 'libs/SessionHandlerFunctionLevel.php';
        if(!\Session\Handler\Func\SessionHandlerFunctionLevel::__checkLoggedIn()){
            header('Location: /');
        }else{
            require '/Views/Error/ErrorView.php';
            $arr = array(
                0 => '',
            );
            \Views\Main\ErrorView::__view($arr);
        }
    }
    
}
