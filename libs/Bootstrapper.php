<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Autoloader\Bootstrapper;
use \Controllers\Main;

/**
 * Description of Bootstrapper
 *
 * @author Mostafa
 */
class Bootstrapper {
    
    public static function __start(){
        header('Access-Control-Allow-Origin: http://212.70.49.100:888');
        header('Access-Control-Max-Age: 240');
//        header('Access-Control-Allow-Origin: http://localhost:888');
//        header('Access-Control-Max-Age: 240');
        header('X-Frame-Options: SAMEORIGIN');
        ob_start();
        error_reporting(0);
        require 'Controllers/MainController.php';
        \Controllers\Main\MainController::__init();
        $vars = array_keys(get_defined_vars());
        for($i = 0; $i < sizeOf($vars); $i++) {
            unset($$vars[$i]);
        }
        unset($vars,$i);
        ob_end_flush();
    }
    
}
