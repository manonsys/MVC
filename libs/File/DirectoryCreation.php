<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace File\Management\Dir;

/**
 * Description of DirectoryCreation
 *
 * @author mostafa
 */
class DirectoryCreation {
    
    public static function __createDirectory($fullPath){
        return !is_dir($fullPath) ? mkdir($fullPath, 777) : FALSE;
    }
    
}
