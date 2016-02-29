<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Validation\Tools\Filter;

/**
 * Description of Validate
 *
 * @author mostafa
 */
class Validate {
    
    public static function __init($var, $type){
        if($type === 'email'){
            $result = filter_var(base64_decode($var), FILTER_VALIDATE_EMAIL) ? TRUE : FALSE;
        }elseif($type === 'phone'){
            $result = filter_var(base64_decode($var), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^(\+966)+[0-9]{7,20}$/"))) ? TRUE : FALSE;
        }elseif($type === 'phoneWithout966'){
            $result = filter_var(base64_decode($var), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9]{7,20}$/"))) ? TRUE : FALSE;
        }elseif($type === 'password'){
            $result = filter_var(base64_decode($var), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9]{4,122}$/"))) ? TRUE : FALSE;
        }elseif($type === 'date'){
            $result = filter_var(base64_decode($var), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9-]{4,122}$/"))) ? TRUE : FALSE;
        }elseif($type === 'int'){
            $result = filter_var(base64_decode($var), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9]{0,20}$/"))) ? TRUE : FALSE;
        }elseif($type === 'string'){
            $result = filter_var(base64_decode($var), FILTER_VALIDATE_REGEXP, array("options"=>array('regexp' => '/^[a-zA-Z0-9 ]{4,122}$/'))) ? TRUE : FALSE;
        }elseif($type === 'stringSpacedNumbered'){
            $result = filter_var(base64_decode($var), FILTER_VALIDATE_REGEXP, array("options"=>array('regexp' => '/^[a-zA-Z0-9 ]{4,122}$/'))) ? TRUE : FALSE;
        }elseif($type === 'username'){
            $result = filter_var(base64_decode($var), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9]$/"))) ? TRUE : FALSE;
        }elseif($type === 'url'){
            $result = filter_var(base64_decode($var), FILTER_VALIDATE_URL) ? TRUE : FALSE;
        }elseif($type === 'bool'){
            $result = filter_var(base64_decode($var), FILTER_VALIDATE_BOOLEAN) ? TRUE : FALSE;
        }elseif($type === 'longMessage'){
            //code tags must be filtered at least for that...!!!
            if(strpos($var, '?') || strpos($var, '%') || strpos($var, '<') || strpos($var, '>')){
                $result = FALSE;
            }else{
                $result = TRUE;
            }
        }elseif($type === '1num'){
            $result = filter_var($var, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9]{1}$/"))) ? TRUE : FALSE;
        }else{
            $result = FALSE;
        }
        return $result;
    }
    
}
