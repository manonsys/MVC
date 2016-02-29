<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Session\Handler;

/**
 * Description of SessionHandler
 *
 * @author Mostafa
 */
class SessionHandlerLogout {
    //put your code here
    
    const username = 'username';
    const password = 'password';
    const role = 'role';
    
    
    public static function __logout(){
        session_start();
        $_SESSION[\Session\Handler\SessionHandlerLogout::username] = null;
        session_regenerate_id();
        $_SESSION[\Session\Handler\SessionHandlerLogout::password] = null;
        session_regenerate_id();
        $_SESSION[\Session\Handler\SessionHandlerLogout::role] = null;
        session_regenerate_id();
        unset($_SESSION[\Session\Handler\SessionHandlerLogout::username]);
        session_regenerate_id();
        unset($_SESSION[\Session\Handler\SessionHandlerLogout::password]);
        session_regenerate_id();
        unset($_SESSION[\Session\Handler\SessionHandlerLogout::role]);
        session_regenerate_id();
        unset($_SESSION);
        setcookie(session_name(), '', time() -88888);
        session_destroy();
        header("Location: /");
    }
    
}
