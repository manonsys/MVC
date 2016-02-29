<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace libs\Security\Consts;

/**
 * Description of Constants
 *
 * @author mostafa
 */
class Constants {
    
    const TOKENAymanAPI = '011d75d043b8a01088c58dbf7b1865f9';
    
    public static function __init($var){
        if((string)$var === 'ayman'){
            return self::TOKENAymanAPI;
        }else{
            return false;
        }
    }
    
}
