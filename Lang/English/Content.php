<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Lang\English\Content;

/**
 * Description of Main
 *
 * @author Mostafa
 */
class Content {
    //put your code here
    
    public static function __getEnglishLabel($string){
        $arr = array(
            
            'dashboard' => 'Dashboard',
            
        );
        
        return $arr[$string];
        
    }
    
}
