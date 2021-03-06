<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Session\Handler\Head;
/**
 * Description of SessionHeader
 *
 * @author mostafa
 */
class SessionHeaderHeadFile {
    private static function __initSessionAndReturnValue($val){
        @session_start();
        session_regenerate_id();
        if(isset($_SESSION[$val])){
            return $_SESSION[$val];
        }else{
            return FALSE;
        }
    }
    public static function __getUserName(){
        return self::__initSessionAndReturnValue('username');
    }
    public static function __getRole(){
        return self::__initSessionAndReturnValue('role');
    }
}
