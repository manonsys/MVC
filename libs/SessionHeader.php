<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Session\Handler\Header;
/**
 * Description of SessionHeader
 *
 * @author mostafa
 */
class SessionHeader {
    private static function __initSessionAndReturnValue($val){
        @session_start();
        session_regenerate_id();
        if(isset($_SESSION)){
            return $_SESSION[$val];
        }else{
            return FALSE;
        }
    }
    public static function __getUserName(){
        session_regenerate_id();
        return self::__initSessionAndReturnValue('username');
    }
    public static function __getRole(){
        session_regenerate_id();
        return self::__initSessionAndReturnValue('role');
    }
}
