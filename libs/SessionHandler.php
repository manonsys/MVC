<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Session\Handler;
use \SecurityEncryptionLibrary\EncryptionBase64\EncryptDecrypt;
use \SecurityEncryptionLibrary\MD5SSHAHashing\Encrypter;

/**
 * Description of SessionHandler
 *
 * @author Mostafa
 */
class SessionHandler {
    //put your code here
    
    const username = 'username';
    const password = 'password';
    const role = 'role';
    
    
    public static function __check(){
        //session_start();
        if(empty($_SESSION[self::username])
                || empty($_SESSION[self::password])
                || empty($_SESSION[self::role])){
            return true;
        }else{
            header("Location: /Dashboard");
            return false;
        }
    }
    
    public static function __checkHash(){
        if(empty($_SESSION['hashKeyVal'])){
            header('Location: /');
        }else{
            return TRUE;
        }
    }
    
    public static function __checkLoggedIn(){
        session_start();
        if(empty($_SESSION[self::username])
                || empty($_SESSION[self::password])
                || empty($_SESSION[self::role])){
            return false;
        }else{
            return true;
        }
    }
    
    public static function __login($username, $password){
        session_start();
        $_SESSION[self::username] = $username;
        $_SESSION[self::password] = md5($password);
        $_SESSION[self::role] = 'student';
    }
    
    public static function __logout(){
        session_start();
        $_SESSION[self::username] = null;
        $_SESSION[self::password] = null;
        $_SESSION[self::role] = null;
        unset($_SESSION[self::username]);
        unset($_SESSION[self::password]);
        unset($_SESSION[self::role]);
        unset($_SESSION);
        setcookie(session_name(), '', time() -88888);
        session_destroy();
        
    }
    
}
