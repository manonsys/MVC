<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Mail\SendReceive;

/**
 * Description of Mailer
 *
 * @author Mostafa
 */
class Mailer {
    //put your code here
    
    public static function __sendMail($to, $from, $subject, $message){
        mail($to, $subject, $message, 'From:' . $from);
    }
    
}
