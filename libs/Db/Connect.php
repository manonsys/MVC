<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Db\Connect;
use \LibCurl\Http\Post;

use PDO;

/**
 * Description of Connect
 *
 * @author Mostafa
 */
/*DbLib is Ready 
 * 
 */
class Connect {

    public static function __connect() {
        try {
            $dbh = new PDO('mysql:host=localhost;dbname=erpafaqy', 'root', 'manon1982222222');
            return $dbh;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    
    public static function __getTableData($sql){
        $dbh = self::__connect();
        $sql = $dbh->query($sql);
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        unset($dbh);
        unset($sql);
        return $result;
    }
    
    public static function __getTableDataDuplicated($tableName = NULL, $tableRecord = NULL, $recordHead = NULL){
        $dbh = self::__connect();
        $sql = $dbh->prepare("SELECT COUNT($recordHead) FROM $tableName WHERE $recordHead = $tableRecord");
        $sql->execute();
        unset($dbh);
        unset($sql);
        return $sql->rowCount();
    }
    
    public static function __edit($tableName, $id){
        $dbh = self::__connect();
        $sql = $dbh->prepare("SELECT * FROM $tableName WHERE id = '$id'");
        $sql->execute();
        $arr = $sql->fetch();
        return $arr;
    }
    
    public static function __update($tableName, $comma_separated, $byField, $byValue){
        $dbh = self::__connect();
        $sql = $dbh->prepare("UPDATE $tableName SET $comma_separated WHERE $byField = '$byValue'");
        $sql->execute();
    }

    public static function __selectTable($tableName) {
        $dbh = self::__connect();
        $query = "SELECT * FROM $tableName";
        $statement = $dbh->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        unset($query);
        unset($dbh);
        unset($statement);
        unset($result);
        return $result;
    }

    public static function __loginFirstTime($email) {
        $dbh = self::__connect();
        $query = "SELECT * FROM admins WHERE email = '$email'";
        $sql = $dbh->prepare($query);
        $sql->execute();
        if ($sql->rowCount() == 1) {
            $ip_address = filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP) ? $ip_address = $_SERVER['REMOTE_ADDR'] : 'noipaddress';
            require 'libs/HTTP/CurlPHP.php';
            require 'libs/APIConstants.php';
            $countryArr = explode(';', \LibCurl\Http\Post\CurlPHP::httpGet((string)\API\Dolphin\Constants\APIConstants::__returnConstant('geoApi'), $ip_address));
            $country = $countryArr[3];
            self::__executeSql("INSERT INTO visits(ip_address, country, username) VALUES('$ip_address', '$country', '$email')");
            unset($sql);
            unset($query);
            unset($dbh);
            return true;
        } else {
            unset($sql);
            unset($query);
            unset($dbh);
            return false;
        }
    }

    public static function __login($email) {
        $dbh = self::__connect();
        $query = "SELECT * FROM admins WHERE email = '$email'";
        $sql = $dbh->prepare($query);
        if ($sql->rowCount() == 1) {
            unset($sql);
            unset($query);
            unset($dbh);
            return true;
        } else {
            unset($sql);
            unset($query);
            unset($dbh);
            return false;
        }
    }

    public static function __checkFirstTime($email) {
        $dbh = self::__connect();
        $query = "SELECT password FROM admins WHERE email = '$email'";
        $sql = $dbh->prepare($query);
        if ($sql->rowCount() == 1) {
            unset($sql);
            unset($query);
            unset($dbh);
            return false;
        } else {
            unset($sql);
            unset($query);
            unset($dbh);
            return true;
        }
    }

    public static function __describeTable($tableName) {
        $dbh = self::__connect();
        $q = $dbh->prepare("DESCRIBE $tableName");
        $q->execute();
        return $q->fetchAll(PDO::FETCH_COLUMN);
    }
    
    public static function __alterTable($tableName, $newItemValues, $newItemNames){
        $dbh = self::__connect();
        $table_fields = self::__describeTable('brands');
        $newItemNamesArray = explode(',', $newItemNames);
        $newItemValuesArray = explode(',', $newItemValues);
        for($i2 = 0; $i2 < sizeof($newItemNamesArray); $i2++){
            if(in_array($newItemNamesArray[$i2], $table_fields)){
                return 'Sorry, the field ' . $newItemNamesArray[$i2] . ' already exists, please try a different name.';
            }else{
                for($i = 0; $i < (int)sizeof($newItemNamesArray); $i++){
                    $newColumnName = $newItemNamesArray[$i];
                    $query = "ALTER TABLE $tableName ADD $newColumnName varchar(50)";
                    $sql = $dbh->prepare($query);
                    $sql->execute();
                }
            }
        }
        $array_fields = implode(', ', $newItemNamesArray);
        $func = function($str) {
            return sprintf("'%s'", $str);
        };
        $newItemValuesArrayReady = implode(',', array_map($func, $newItemValuesArray));
        self::__insertIntoAnyTable('brands', $array_fields, $newItemValuesArrayReady, FALSE);
        $garbage = array($newItemNamesArray, $newColumnName, $sql, $table_fields, $dbh, $tableName, $query, $q, $newItemValues, $newItemNames);
        unset($garbage);
        return 'The Fields and Records are Added Successfully...';
    }
    
    public static function __insertIntoAnyTable($tableName, $arrayKeys, $arrayValues, $trim, $skip = TRUE){        
        $dbh = self::__connect();
        if($trim){
            if($skip){
                unset($arrayKeys[0]);
            }
            $arrayKeysReady = implode(', ', $arrayKeys);
            $func = function($str) {
                return sprintf("'%s'", $str);
            };
            $arrayValuesReady = implode(',', array_map($func, $arrayValues));
        }else{
            $arrayKeysReady = $arrayKeys;
            $arrayValuesReady = $arrayValues;
        }
        $sql = $dbh->prepare("INSERT INTO $tableName ($arrayKeysReady) VALUES ($arrayValuesReady)");
        $sql->execute();
    }
    
    public static function __getRowCount($sql){
        $dbh = self::__connect();
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }
    
    public static function __executeSql($sql){
        $dbh = self::__connect();
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        print_r($stmt->errorInfo());
        unset($dbh);
        unset($stmt);
    }
    
    public static function __delete($id, $tableName){
        $dbh = self::__connect();
        $stmt = $dbh->prepare("DELETE FROM $tableName WHERE id = '$id' LIMIT 1");
        $stmt->execute();
        unset($dbh);
        unset($stmt);
    }
}