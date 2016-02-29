<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Security\Session\Values\FunctionLevel;

/**
 * Description of GetSessiondata
 *
 * @author mostafa
 */

class GetSessionDataFunctionLevel {
    
    
    public static function __getValue($key){
        if(!isset($_SESSION)) session_start();
        $var = isset($_SESSION[$key]) ? $_SESSION[$key] : FALSE;
        return $var;
    }
    
    
}
