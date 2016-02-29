<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use \Session\Handler;
use \Views\Main;
use \Db\Connect;

/**
 * Description of loginStart
 *
 * @author Mostafa
 */
class loginStart {

    //put your code here

    public static function __init() {
        if (\Session\Handler\SessionHandler::__check() == 1) {
            if ($_SERVER['HTTP_REFERER'] !== 'http://localhost:888/') header("Location: /");
            header('Access-Control-Allow-Origin: http://localhost:888');
            if (((filter_var(base64_decode($_REQUEST['username']), FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i"))) || ((filter_var(base64_decode($_REQUEST['username']), FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z0-9]{4,122}$/i")))))) && ((filter_var(base64_decode($_REQUEST['password']), FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z0-9]{4,122}$/i"))))))) {
                require 'libs/Db/Connect.php';
                \Session\Handler\SessionHandler::__login($_REQUEST['username'], md5($_REQUEST['password']));
                if (\Db\Connect\Connect::__checkFirstTime($_REQUEST['username']) == 1) {
                    if (\Db\Connect\Connect::__loginFirstTime($_REQUEST['username'])) {
                        echo 'loginfirsttime';
                        exit;
                    } else {
                        echo 'emaildoesnotexist';
                        exit;
                    }
                } elseif (\Db\Connect\Connect::__checkFirstTime($_REQUEST['username']) == 0) {
                    if (\Db\Connect\Connect::__login($_REQUEST['username'], md5(md5($_REQUEST['password'])))) {
                        echo 'logginginnotfirsttime';
                        exit;
                    } else {
                        echo 'invalidlogin';
                        exit;
                    }
                } else {
                    echo 'invalidlogin';
                }
            } else {
                echo 'الرجاء إدخال إسم مستخدم و رقم سري صحيح <img src = "/Views/img/redex.ico" width = "20px;" height = "20px;" />';
                exit;
            }
        } elseif (\Session\Handler\SessionHandler::__check() == 0) {
            echo 'يوجد مستخدم مسجل بالفعل... <img src = "/Views/img/greentick.ico" width = "20px;" height = "20px;" />';
            header("Location: /dashbaord");
        }
        echo 'يتم الآن تسجيل الدخول... <img src = "/Views/img/ajax-loader.gif" alt = "Loading..." />';
    }

}
