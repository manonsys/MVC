<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Security\Session\Login;
/**
 * Description of SessionLogin
 *
 * @author mostafa
 */
class SessionLogin {
    //put your code here
    
    public static function __generateHashKeyForLoginUi(){
        require 'libs/Security/MD5SHAHash.php';
        return \SecurityEncryptionLibrary\MD5SSHAHashing\Encrypter\MD5SHAHash::__hashHmac(rand() . md5('++++') . rand() . md5('@@@!!!@@@') . md5('Y-m-d h:i:s'), 'manonmccallisterniazia.ghafour', 'ripemd160');
    }
    public static function __getHashKey(){
        if(!isset($_SESSION)) session_start();
        $_SESSION['hashKeyVal'] = self::__generateHashKeyForLoginUi();
        return $_SESSION['hashKeyVal'];
    }
    
}
