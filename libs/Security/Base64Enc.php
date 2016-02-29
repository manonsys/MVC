<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace SecurityEncryptionLibrary\EncryptionBase64\EncryptDecrypt;

/**
 * Description of Base64Enc
 *
 * @author mostafa
 */
class Base64Enc {
    //put your code here
    public static function __init($obj){
        $obj ? base64_encode($obj) : $obj = FALSE;
        return $obj;
    }
    public static function __decrypt($obj){
        $obj ? base64_decode($obj) : $obj = FALSE;
        return $obj;
    }
    
}
