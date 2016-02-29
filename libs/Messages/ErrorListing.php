<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace \Messages\Error\Content;
/**
 * Description of Error
 *
 * @author mostafa
 */
class ErrorListing {
    public static function __init($var){
        switch($var):
            case 'uiProblem':
                return 'Sorry, please use the user interface';
            default:
                return FALSE;
        endswitch;
    }
}
