<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Session\SessionHandler\FormSecurity;
use \Environment\Constants;

/**
 * Description of SessionShaStoreErase
 *
 * @author mostafa
 */
class SessionShaStoreErase {
    //put your code here
    public static function __setShaValue($value){
        require 'libs/Constants.php';
        try{
            if(!isset($_SESSION)) session_start();
            $_SESSION['shaFormRand'] = base64_encode(md5($value));
            session_regenerate_id();
            return TRUE;
        }catch(Exception $e){
            if((string)\Environment\Constants\Constants::__returnConstant('environment') === 'dev'){
                print_r($e->getMessage());
                return FALSE;
            }else{
                return FALSE;
            }
        }
    }
    
    public static function __checkShaValue(){
        require 'libs/Constants.php';
        try{
            if(!isset($_SESSION)) session_start();
            if(isset($_SESSION['shaFormRand']) && strlen($_SESSION['shaFormRand']) > 5){
                session_regenerate_id();
                return TRUE;
            }else{
                return FALSE;
            }
        }catch(Exception $e){
            if((string)\Environment\Constants\Constants::__returnConstant('environment') === 'dev'){
                print_r($e->getMessage());
                return FALSE;
            }else{
                return FALSE;
            }
        }
    }
    
}
