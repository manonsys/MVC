<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Lib\FTP\Management;
/**
 * Description of Upload
 *
 * @author mostafa
 */
class Upload {
    
    public static function __connectAndUpload($ftpServer, $ftpUserName, $ftpPassword, $fileName, $remoteFileName){
        $conn_id = ftp_ssl_connect($ftpServer);
        $login_result = ftp_login($conn_id, $ftpUserName, $ftpPassword);
        print_r($login_result);
        echo '<hr />';
        echo ftp_pwd($conn_id);
        if(ftp_put($conn_id, $remoteFileName, $fileName, FTP_ASCII)){
            ftp_close($conn_id);
            return 'Connected...';
        }else{
            ftp_close($conn_id); 
            return 'Could not connect...';
        }
    }
    
}
