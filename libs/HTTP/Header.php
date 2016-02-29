<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Http\Header;
/**
 * Description of Header
 *
 * @author mostafa
 */
class HeaderHTTP {
    //put your code here
    
    public static function __excelDocumentOneSheet($fileName){
        return array(
            header ( "Content-type: application/vnd.ms-excel" ),
            header ( "Content-Disposition: attachment; filename=$fileName" ),
        );
    }
    
    
}
