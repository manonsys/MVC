<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace SecurityEncryptionLibrary\MD5SSHAHashing\Encrypter;
use \Session\SessionHandler\FormSecurity;

/**
 * Description of MD5
 *
 * @author mostafa
 */

class MD5SHAHash {
    
    private static function __init($obj){
        $var = $obj ? md5($obj) : $obj = FALSE;
        return $var;
    }
    
    private static function __shaInit($obj){
        $var = $obj ? sha1($obj) : $obj = FALSE;
        return $var;
    }
    
    public static function __getRandomShaAndSave(){
        $shaEncObject = self::__shaInit(base64_encode(rand()));
        require 'libs/SessionShaStoreErase.php';
        \Session\SessionHandler\FormSecurity\SessionShaStoreErase::__setShaValue($shaEncObject);
        return $shaEncObject;
    }
    
    public static function __getGroupPass($pass){
        return md5(date('Y-m-d')) . '-' . md5(base64_decode(sha1($pass))) . '-' . md5("++++");
    }
    
    public static function __checkRandomSha(){
        require 'libs/SessionShaStoreErase.php';
        if(\Session\SessionHandler\FormSecurity\SessionShaStoreErase::__checkShaValue()){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    public static function __mcrypt($obj, $key, $algo){
        if (!extension_loaded('mcrypt')) {
            if (!dl('mcrypt.so')) {
                return FALSE;
            }else{
                $key = hash($algo, $key_val, true);
                $td = mcrypt_module_open('rijndael-128', '', 'cbc', '');
                $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td),MCRYPT_DEV_URANDOM);
                mcrypt_generic_init($td, $key, $iv);
                $encrypted_data = mcrypt_generic($td, $obj);
                mcrypt_generic_deinit($td);
                mcrypt_module_close($td);
                return $encrypted_data;
            }
        }else{
            return FALSE;
        }
    }
    
    public static function __hashHmac($obj, $key, $algo = 'ripemd160'){
        $var = ($obj && $key) ? hash_hmac($algo, $obj, base64_encode(md5($key))) : FALSE;
        return $var;
    }
    
}
