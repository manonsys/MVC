<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//namespace Db\ConnectToDolphin\Mdf;
//use SQLSRV;


/**
 * Description of Mdf
 *
 * @author mostafsa
 */
class ConnectMdf {
    //put your code here
    
    public static function __connect(){
        $server = 'DESKTOP-9625CRL';
        try {
            $dbh = \SQLSRV\mssql_connect($server, '', '');
            mssql_select_db('');
            return $dbh;
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
    
}
