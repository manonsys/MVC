<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//namespace Controllers\Controller;
use \Db\ConnectToDolphinDb\Mdf;
use \Views\Main;
use \SecurityEncryptionLibrary\MD5SSHAHashing\Encrypter;
use \LibCurl\Http\Post;
use \API\Dolphin\Constants;

use \Layout\Compartment\Fixed;
use \Session\Handler\Func;
use \Validation\Tools\Filter;
use \Security\Session\Values;
/**
 * Description of Add
 *
 * @author Mostafa
 */

class SendMailAdd {
    
    public static function __init(){
        
        require 'libs/SessionHandlerFunctionLevel.php';
        require 'libs/Security/MD5SHAHash.php';
        if(!\Session\Handler\Func\SessionHandlerFunctionLevel::__checkLoggedIn() || !\SecurityEncryptionLibrary\MD5SSHAHashing\Encrypter\MD5SHAHash::__checkRandomSha()){
            header("Location: /");
        }
        require 'libs/Security/Validate.php';
        if(\Validation\Tools\Filter\Validate::__init($_REQUEST['mailto'], 'email')){
            $mailto = $_REQUEST['mailto'];
        }else{
            echo 'error1';
        }
        if(\Validation\Tools\Filter\Validate::__init($_REQUEST['subject'], 'string')){
            $subject = $_REQUEST['subject'];
        }else{
            echo 'error2';
        }
        if(\Validation\Tools\Filter\Validate::__init($_REQUEST['message'], 'longMessage')){
            $message = $_REQUEST['message'];
        }else{
            echo 'error3';
        }
        require 'libs/HTTP/CurlPHP.php';
        require 'libs/Security/GetSessionData.php';
        $username = \Security\Session\Values\GetSessionData::__getValue('username');
        $_REQUEST['identity'] ? $identifier = $_REQUEST['identity'] : $identifier = FALSE;
        require 'libs/Db/Connect.php';
        $dateSent = date('Y-m-d H:i:s');
        $identifier ? \Db\Connect\Connect::__executeSql("INSERT INTO mailer(mail, subject, message, user, dateSent, identifier) VALUES('$mailto', '$subject', '$message', '$username', '$dateSent', '$identifier')") : FALSE;
        
        echo 'success';
    }
}
