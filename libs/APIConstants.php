<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace API\Dolphin\Constants;

class APIConstants{
    
    const Example = "";
    
    
    public static function __returnConstant($val, $ip = NULL){
        if($val === 'Example'){
            return self::BrandUri;
        }else{
            return false;
        }
    }
    
}