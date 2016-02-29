<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Environment\Constants;

/**
 * Description of Constants
 *
 * @author mostafa
 */
class Constants {
    //put your code here
    public static function __returnConstant($value){
        $constant = array(
            'environment' => 'dev',
            '' => '',
            '' => '',
            '' => '',
        );
        return $constant[$value];
    }
}
