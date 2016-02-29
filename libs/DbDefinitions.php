<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Definitions\Main;

/**
 * Description of Definitions
 *
 * @author Mostafa
 */
class DbDefinitions {
    
    public static function __getDefinition($type){
        switch($type):
            case 'dbname':
                return 'test';
            case 'dbhost':
                return 'localhost';
            case 'dbpass':
                return '';
            case 'dbuser':
                return 'root';
            case 'dbtype':
                return 'mysql';
        endswitch;
    }
    
}
