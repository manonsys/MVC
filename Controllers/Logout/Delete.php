<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Session\Handler;
/**
 * Description of Delete
 *
 * @author Mostafa
 */
class LogoutDelete {
    public static function __init(){
        require 'libs/SessionHandlerLogout.php';
        \Session\Handler\SessionHandlerLogout::__logout();
    }
}
