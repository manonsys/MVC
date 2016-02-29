<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Db\Connect\WidgetConnect;

use PDO;

/**
 * Description of Connect
 *
 * @author Mostafa
 */
/*DbLib is Ready 
 * 
 */
class WidgetConnection {

    private static function __connect() {
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
        unset($dbh);
        unset($stmt);
    }
}