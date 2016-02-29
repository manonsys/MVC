<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Session\Handler\Func;

/**
 * Description of SessionHandlerFunctionLevel
 *
 * @author Mostafa
 * 
 * 
 * Session Handler is Ready...
 * 
 * 
 */
class SessionHandlerFunctionLevel {
    //put your code here
    
    const username = 'username';
    const password = 'password';
    const role = 'role';
    
    public static function __check(){
        if(!isset($_SESSION)) session_start();
        session_regenerate_id();
        if(empty($_SESSION[self::username])
                || empty($_SESSION[self::password])
                || empty($_SESSION[self::role])){
            session_regenerate_id();
            return true;
        }else{
            session_regenerate_id();
            header("Location: /Dashboard");
            return false;
        }
    }
    
    public static function __checkLoggedIn(){
        if(!isset($_SESSION)) session_start();
        session_regenerate_id();
        if(empty($_SESSION[self::username])
                || empty($_SESSION[self::password])
                || empty($_SESSION[self::role])){
            session_regenerate_id();
            return false;
        }else{
            return true;
        }
    }
    
    public static function __checkAdmin(){
        session_start();
        if(!isset($_SESSION)) session_start();
        session_regenerate_id(); //workig in the else compartment...
        if(empty($_SESSION[self::username])
                || empty($_SESSION[self::password])
                || empty($_SESSION[self::role]) || (string)$_SESSION[self::role] !== 'student'){
            session_regenerate_id();
            return FALSE;
        }else{
            return TRUE;
        }
    }
    
    public static function __login($username, $password){
        if(!isset($_SESSION)) session_start();
        session_regenerate_id();
        $_SESSION[self::username] = $username;
        session_regenerate_id();
        $_SESSION[self::password] = md5($password);
        session_regenerate_id();
        $_SESSION[self::role] = 'student';
        session_regenerate_id();
    }
    
    public static function __logout(){
        if(!isset($_SESSION)) session_start();
        session_regenerate_id();
        $_SESSION[self::username] = null;
        session_regenerate_id();
        $_SESSION[self::password] = null;
        session_regenerate_id();
        $_SESSION[self::role] = null;
        session_regenerate_id();
        unset($_SESSION[self::username]);
        session_regenerate_id();
        unset($_SESSION[self::password]);
        session_regenerate_id();
        unset($_SESSION[self::role]);
        session_regenerate_id();
        unset($_SESSION);
        setcookie(session_name(), '', time() -88888);
        session_destroy();
        
    }
    
    public static function __checkIdentityForm(){
        if(!isset($_SESSION)) session_start();
        session_regenerate_id();
        $var = $_SESSION['shaFormRand'] ? TRUE : FALSE;
        session_regenerate_id();
        return $var;
    }
    
}
