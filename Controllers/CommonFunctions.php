<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of CommonClasses
 *
 * @author mostafa
 */
class CommonFunctions {
    //put your code here
    
    public function __getRealIp($shortIp){
        if((string) base64_decode($shortIp) === '20101'){
            return '212.70.49.20';
        } elseif ((string) base64_decode($shortIp) === '101101') {
            return '212.70.49.101';
        } elseif ((string) base64_decode($shortIp) === '119101') {
            return '212.70.49.119';
        } elseif ((string) base64_decode($shortIp) === '99101') {
            return '212.70.49.99';
        } elseif ((string) base64_decode($shortIp) === '29101') {
            return '212.70.49.29';
        } elseif ((string) base64_decode($shortIp) === '104101') {
            return '212.70.49.104';
        } elseif ((string) base64_decode($shortIp) === '19') {
            return '212.70.49.19';
        } else {
            return base64_decode($shortIp);
        }
    }
    
}
