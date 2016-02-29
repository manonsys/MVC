<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace LibCurl\Http\Post;

class CurlPHP {

    public static function httpPost($url, $params, $referer = NULL) {
        $postData = '';
        foreach ($params as $k => $v) {
            $postData .= $k . '=' . $v . '&';
        }
        $postData = rtrim($postData, '&');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, count($postData));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        $referer ? curl_setopt($ch, CURLOPT_REFERER, $referer) : NULL;
        $cookies = array();
        foreach($_COOKIE as $key => $value){
            if ($key != 'Array') {
                $cookies[] = $key . '=' . $value;
            }
        }
        curl_setopt($ch, CURLOPT_COOKIE, implode(';', $cookies));
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
    
    public static function httpGet($url, $ip){
        $ch = curl_init($url . $ip);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);      
        curl_close($ch);
        return $output;
    }
    
    public static function httpGetArr($url, $arr = NULL){
        $arrOutput = array();
        for($i = 0; $i < sizeof($arr); $i++){
            $ch = curl_init($url . $arr[$i]['ip_address']);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($ch);      
            curl_close($ch);
            array_push($arrOutput, $output);
        }
        return $arrOutput;
    }

    public static function httpPostAfaqy($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_REFERER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

}
