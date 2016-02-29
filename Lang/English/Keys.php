<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Lang\English\ProtectedValues;

/**
 * Description of Keys
 *
 * @author mostafa
 */
class Keys {
    //put your code here
    public static function __getKey($val){
        return self::__returnValue($val);
    }
    
    private static function __returnValue($val){
        if($val === 'password'){
            return 'manonniaziisindeutschland12yearsago';
        }
    }
    
}
