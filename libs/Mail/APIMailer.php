<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Mail\SendReceive;

/**
 * Description of APIMailer
 *
 * @author mostafa
 */
class APIMailer {
    //put your code here
    
    public static function __init($mail, $from, $subject, $text, $receipientName, $systemName, $sysAdminEmail, $sysAdminName){
        shell_exec('curl -s --user \'api:key-d3434ec57c01a7f7a7796dd557547536\' \
                    https://api.mailgun.net/v3/sandboxea7538e7b02d4910948db085683c8905.mailgun.org/messages \
                    -F from=\'System Notifier <info@afaqysystem.com>\' \
                    -F to=\'' . $sysAdminName . ' <' . $sysAdminEmail . '>\'\
                    -F subject=\'System Notification\' \
                    -F text=\'' . $text . ' ------- Sent to ' . $receipientName . '');
        return shell_exec('curl -s --user \'api:key-d3434ec57c01a7f7a7796dd557547536\' \
                    https://api.mailgun.net/v3/sandboxea7538e7b02d4910948db085683c8905.mailgun.org/messages \
                    -F from=\'' . $systemName . ' <' . $from . '>\' \
                    -F to=\'' . $receipientName . ' <' . $mail . '>\'\
                    -F subject=\'' . $subject . '\' \
                    -F text=\'' . $text . '');
    }
    
}
