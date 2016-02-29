<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Lang\English\Main;

/**
 * Description of Main
 *
 * @author Mostafa
 */
class Main {
    //put your code here
    
    public static function __getEnglishLabel($string){
        $arr = array(
            
            'username' => '',
            'password' => '',
            'login' => 'Login',
            'register' => 'Create New Account',
            'email' => 'E-Mail',
            'emailError' => 'Error in the E-Mail',
            'RegisterationMailSubject' => 'Registration Successfully Done',
            'RegisterationMailMessage' => 'Registration has been done successfully, please click the following link to activate your account',
            'loggingin' => 'Logging in, Please Wait...',
            'dashboard' => 'Dashboard',
            
            
        );
        
        return $arr[$string];
        
    }
    
}
