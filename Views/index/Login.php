<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Views\Main;
use \Lang\Arabic\Main;
use \Session\Handler;

/**
 * Description of View
 *
 * @author Mostafa
 */
class Login {
    //put your code here
    
    public static function __view($string){
        require 'Lang/Arabic/Main.php';
        require 'libs/Security/SessionLogin.php';
        echo '<meta charset = "utf-8">
                <link rel="stylesheet" href="/Views/css/ClassFile.css">
                <link href=\'https://fonts.googleapis.com/css?family=Work+Sans:400,300,700\' rel=\'stylesheet\' type=\'text/css\'>
                <div class="container">
                  <hgroup>
                    <img src = "/Views/img/afaqy.png" width = "300px;" height = "auto" style = "border-radius: 8px;" />
                  </hgroup>
                  <form>
                    <div class="group">
                      <input type="email" id="fieldUser"><span class="highlight"></span><span class="bar"></span>
                      <label>E-Mail</label>
                    </div>
                    <div class="group">
                      <input type="password" id="fieldPassword"><span class="highlight"></span><span class="bar"></span>
                      <label>Password</label>
                    </div>
                    <input type = "hidden" id = "identity" value = "' . \Security\Session\Login\SessionLogin::__getHashKey() . '" />
                    <button type="button" onclick = "javascript:return validateBoth();" class="button buttonBlue">Login
                      <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
                    </button>
                  </form>
                  <div id = "result"></div>
                </div>
                <script src=\'http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js\'></script>
                <script src="/Views/js/index.js"></script>';
    }
    
}
