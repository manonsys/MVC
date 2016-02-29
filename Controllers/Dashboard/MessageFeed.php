<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MessageFeed
 *
 * @author mostafa
 */
class DashboardMessageFeed {
    //put your code here
    
    public static function __init(){
        
        require 'libs/Db/Widgets.php';
        require '/libs/SessionHeaderHeadFile.php';
        $user = \Session\Handler\Head\SessionHeaderHeadFile::__getUserName();
        
        $arr = \Db\Connect\WidgetConnect\WidgetConnection::__getTableData("SELECT mail, subject, dateSent FROM mailer WHERE mail = '$user' AND deleted <> 'one' ORDER BY id DESC LIMIT 10");
        for($i = 0; $i < sizeof($arr); $i++){
            
            echo '<li>
                    <a href="/Users/Profile">
                        <div class="pull-left">
                            <img src="/Views/img/message.png" class="img-circle" alt="User Image">
                        </div>
                        <h4>
                            ' . base64_decode($arr[$i]['subject']) . '
                            <small><i class="fa fa-clock-o"></i> ' . $arr[$i]['dateSent'] . '</small>
                        </h4>
                        <p>' . strstr(base64_decode($arr[$i]['subject']), ' ', TRUE) . '</p>
                    </a>
                </li>';
            
        }
        
    }
}
