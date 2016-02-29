<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Views\Main;
use \Layout\Compartment\Fixed;
use \Lang\English\Content;

/**
 * Description of DashView
 *
 * @author Mostafa
 */
class DashView {

    //put your code here

    public static function __dashBoardView($str) {
        
        require '/Views/Layout/Header.php';
        \Layout\Compartment\Fixed\Header::__init();
        require 'libs/Security/MD5SHAHash.php';
        
        echo '    
                    <!-- Content Wrapper. Contains page content -->
                    <div class="content-wrapper">
                      <!-- Content Header (Page header) -->
                      <section class="content-header">
                        <h1>
                          ';
                          require '/Lang/English/Content.php';
                          echo \Lang\English\Content\Content::__getEnglishLabel('dashboard');
                          echo '
                          <small>Control panel</small>
                        </h1>';
                          
                        require '/Views/Layout/BreadCrumb.php';
                        \Layout\Compartment\Fixed\BreadCrumb::__render();
                        
                      echo '
                      </section>

                      <!-- Main content -->
                      <section class="content">
                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                          <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                              <div class="inner">
                                ';
                                $requestTypeXMLSales2 = "<?xml version='1.0' encoding='UTF-8'?>"
                                                . "<requestType>"
                                                    . "<code>3</code>"
                                                . "</requestType>";
                                $paramsSales2 = array(
                                    'xmlRequestType' => $requestTypeXMLSales2,
                                );
                                echo '<h3>' . \LibCurl\Http\Post\CurlPHP::httpPost(\API\Dolphin\Constants\APIConstants::__returnConstant('salesOrder'), $paramsSales2) . '</h3>
                                <p>Orders</p>
                              </div>
                              <div class="icon">
                                <i class="fa fa-fw fa-cart-arrow-down"></i>
                              </div>
                              <a href="/Sales/List" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                          </div><!-- ./col -->
                          <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                              <div class="inner">
                                <h3>' . \Db\Connect\Connect::__getRowCount("SELECT ip_address FROM visits") . '<sup style="font-size: 20px">Visits</sup></h3>
                                <p>Visits</p>
                              </div>
                              <div class="icon">
                                <i class="fa fa-television"></i>
                              </div>
                              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                          </div><!-- ./col -->
                          <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                              <div class="inner">
                                <h3>';
                                $users_count = (int)\Db\Connect\Connect::__getRowCount("SELECT email FROM admins") + (int)\Db\Connect\Connect::__getRowCount("SELECT username FROM admins");
                                echo $users_count;
                                echo '</h3>
                                <p>User Registrations</p>
                              </div>
                              <div class="icon">
                                <i class="fa fa-fw fa-registered"></i>
                              </div>
                              <a href="/Users/Add" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                          </div><!-- ./col -->
                          <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                              <div class="inner">
                                <h3>' . \Db\Connect\Connect::__getRowCount("SELECT ip FROM server") . '</h3>
                                <p>Servers</p>
                              </div>
                              <div class="icon">
                                <i class="fa fa-server"></i>
                              </div>
                              <a href="/Test/CreateServer" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                          </div><!-- ./col -->
                        </div><!-- /.row -->
                        <!-- Main row -->
                        <div class="row">
                          <!-- Left col -->
                          <section class="col-lg-7 connectedSortable">
                            <!-- Custom tabs (Charts with tabs)-->
                            <div class="nav-tabs-custom">
                              <!-- Tabs within a box -->
                              <ul class="nav nav-tabs pull-right">
                                <li class="active"><a href="#revenue-chart" data-toggle="tab">Sales Line Graph</a></li>
                              </ul>
                              <div class="tab-content no-padding">
                                <!-- Morris chart - Sales -->
                                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                                <script>
                                    google.charts.load(\'current\', {packages: [\'corechart\', \'line\']});
                                    google.charts.setOnLoadCallback(drawBasic);
                                    function drawBasic() {
                                          var data = new google.visualization.DataTable();
                                          data.addColumn(\'number\', \'Year\');
                                          data.addColumn(\'number\', \'Orders\');
                                          data.addRows([
                                            ';
                                            $requestTypeXMLSales = "<?xml version='1.0' encoding='UTF-8'?>"
                                                            . "<requestType>"
                                                                . "<code>1</code>"
                                                            . "</requestType>";
                                            $paramsSales = array(
                                                'xmlRequestType' => $requestTypeXMLSales,
                                            );
                                            $requestTypeXML2 = "<?xml version='1.0' encoding='UTF-8'?>"
                                                            . "<requestType>"
                                                                . "<code>8</code>"
                                                            . "</requestType>";
                                            $requestTypeXML3 = "<?xml version='1.0' encoding='UTF-8'?>"
                                                            . "<requestType>"
                                                                . "<code>3</code>"
                                                            . "</requestType>";
                                            $params2 = array(
                                                'xmlRequestType' => $requestTypeXML2,
                                            );
                                            $params3 = array(
                                                'xmlRequestType' => $requestTypeXML3,
                                            );
                                            echo \LibCurl\Http\Post\CurlPHP::httpPost(\API\Dolphin\Constants\APIConstants::__returnConstant('salesOrder'), $paramsSales);
                                            echo '
                                          ]);
                                          var data6 = google.visualization.arrayToDataTable([
                                            [\'Country\', \'Popularity\'],
                                            ';
                                            $arr = \Db\Connect\Connect::__getTableData('SELECT country,(SELECT COUNT(*) FROM visits WHERE country = visits_table.country) AS count_countries FROM visits AS visits_table GROUP BY country');
                                            for($i = 0; $i < sizeof($arr); $i++){
                                                echo '[\'' . $arr[$i]['country'] . '\', ' . $arr[$i]['count_countries'] . '],';
                                            }
                                            echo '
                                          ]);
                                          var data7 = google.visualization.arrayToDataTable([
                                            [\'Task\', \'Hours per Day\'],
                                            [\'Brands\',     ' . \LibCurl\Http\Post\CurlPHP::httpPost(\API\Dolphin\Constants\APIConstants::__returnConstant('brand'), $params3) . '],
                                            [\'Devices\',    ' . \LibCurl\Http\Post\CurlPHP::httpPost(\API\Dolphin\Constants\APIConstants::__returnConstant('devices'), $params2) . '],
                                          ]);
                                          var options7 = {
                                            title: \'\',
                                            is3D: true,
                                            backgroundColor: \'transparent\',
                                          };
                                          var options = {
                                            hAxis: {
                                              title: \'Time\'
                                            },
                                            vAxis: {
                                              title: \'Count\'
                                            }
                                          };
                                          var options6 = {
                                            backgroundColor: \'transparent\',
                                          };
                                          var chart7 = new google.visualization.PieChart(document.getElementById(\'piechart_3d\'));
                                          var chart = new google.visualization.LineChart(document.getElementById(\'chart_div\'));
                                          var chart6 = new google.visualization.GeoChart(document.getElementById(\'regions_div\'));
                                          chart.draw(data, options);
                                          chart6.draw(data6, options6);
                                          chart7.draw(data7, options7);
                                    }
                                </script>
                                <div class="chart tab-pane active" id="chart_div" style="position: relative; height: 300px;"></div>
                                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
                              </div>
                            </div><!-- /.nav-tabs-custom -->
                            <!-- Chat box -->
                            <div class="box box-success">
                              <div class="box-header">
                                <i class="fa fa-comments-o"></i>
                                <h3 class="box-title">Virtual Meeting</h3>
                                <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                                  <div class="btn-group" data-toggle="btn-toggle" >
                                  </div>
                                </div>
                              </div>
                              <div class="box-body chat" id="chat-box">
                                <!-- chat item -->
                                <div class="item">
                                  <img src="/Views/Dashboard/DashSupplements/img/user4-128x128.jpg" alt="user image" class="online">
                                  <p class="message">
                                    <iframe style = "border: none; width: 100%; height: auto;" src = "http://localhost:52527/Default.html"></iframe>
                                  </p>
                                </div><!-- /.item -->
                              </div><!-- /.chat -->
                            </div><!-- /.box (chat box) -->
                            <!-- quick email widget -->
                            <div class="box box-info">
                              <div class="box-header">
                                <i class="fa fa-envelope"></i>
                                <h3 class="box-title">Quick Email</h3>
                                <!-- tools box -->
                                <div class="pull-right box-tools">
                                  <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                                </div><!-- /. tools -->
                              </div>
                              <div class="box-body">
                                <script>
                                    function sendEmailMessage(){
                                        var Base64 = function () {
                                        this.encode = function(data){
                                              var b64 = \'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=\';
                                              var o1, o2, o3, h1, h2, h3, h4, bits, i = 0,
                                                ac = 0,
                                                enc = \'\',
                                                tmp_arr = [];
                                              if (!data) {
                                                return data;
                                              }
                                              do {
                                                o1 = data.charCodeAt(i++);
                                                o2 = data.charCodeAt(i++);
                                                o3 = data.charCodeAt(i++);
                                                bits = o1 << 16 | o2 << 8 | o3;
                                                h1 = bits >> 18 & 0x3f;
                                                h2 = bits >> 12 & 0x3f;
                                                h3 = bits >> 6 & 0x3f;
                                                h4 = bits & 0x3f;
                                                tmp_arr[ac++] = b64.charAt(h1) + b64.charAt(h2) + b64.charAt(h3) + b64.charAt(h4);
                                              } while (i < data.length);
                                              enc = tmp_arr.join(\'\');
                                              var r = data.length % 3;
                                              return (r ? enc.slice(0, r - 3) : enc) + \'===\'.slice(r || 3);
                                            }
                                        }
                                        var mailto = document.getElementById("mailto").value;
                                        var subject = document.getElementById("subject").value;
                                        var message = document.getElementById("message").value;
                                        var identity = document.getElementById("identity").value;
                                        var xhttp = new XMLHttpRequest();
                                        b64 = new Base64();
                                        var mailtoEnc = b64.encode(mailto.toString());
                                        var subjectEnc = b64.encode(subject.toString());
                                        var messageEnc = b64.encode(message.toString());
                                        xhttp.onreadystatechange = function() {
                                            if (xhttp.readyState == 4 && xhttp.status == 200) {
                                                if(xhttp.responseText == \'success\'){
                                                    spawnNotification("Message has been sent to the email successfully", "/Views/img/success.png", "Success");
                                                }else{
                                                    spawnNotification("Problem Occured, Please try Again Later or Contact the System Administrator", "/Views/img/danger.png", "Problem");
                                                }
                                            }
                                        };
                                        xhttp.open("POST", "/SendMail/Add", true);
                                        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                        xhttp.send("mailto=" + mailtoEnc + "&subject=" + subjectEnc + "&message=" + messageEnc + "&identity=" + identity);
                                    }
                                </script>
                                <!-- form start ///////////////////////////////////////////////////////////////////////////////////////////////// -->
                                  <div class="form-group">
                                    <input type="email" class="form-control" id = "mailto" name="emailto" placeholder="Email to:">
                                  </div>
                                  <div class="form-group">
                                    <input type="text" class="form-control" name="subject" id = "subject" placeholder="Subject">
                                  </div>
                                  <div>
                                    <textarea class="textarea" placeholder="Message" id = "message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                  </div>
                                  <input type = "hidden" id = "identity" value = "' . \SecurityEncryptionLibrary\MD5SSHAHashing\Encrypter\MD5SHAHash::__getRandomShaAndSave() . '" />
                              </div>
                              <div class="box-footer clearfix">
                                <button class="pull-right btn btn-default" id="sendEmail" onclick = "javascript:return sendEmailMessage();">Send <i class="fa fa-arrow-circle-right"></i></button>
                              </div>
                              
                                <!-- form end ///////////////////////////////////////////////////////////////////////////////////////////////// -->
                            </div>

                          </section><!-- /.Left col -->
                          <!-- right col (We are only adding the ID to make the widgets sortable)-->
                          <section class="col-lg-5 connectedSortable">

                            <!-- Map box -->
                            <div class="box box-solid bg-light-blue-gradient">
                              <div class="box-header">
                                <!-- tools box -->
                                <div class="pull-right box-tools">
                                  <button class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
                                </div><!-- /. tools -->

                                <i class="fa fa-map-marker"></i>
                                <h3 class="box-title">
                                  Visitors
                                </h3>
                              </div>
                              <div class="box-body">
                                <!-- map of the world -->
                                <div id="regions_div" style="height: 250px; width: 100%;"></div>
                              </div><!-- /.box-body-->
                              <div class="box-footer no-border">
                                <div class="row">
                                  <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                                    <!-- visitors -->
                                  </div><!-- ./col -->
                                  <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                                    <!-- online chart -->
                                  </div><!-- ./col -->
                                  <div class="col-xs-4 text-center">
                                    <!-- exists chart -->
                                  </div><!-- ./col -->
                                </div><!-- /.row -->
                              </div>
                            </div>
                            <!-- /.box -->

                            <!-- solid sales graph -->
                            <div class="box box-solid bg-teal-gradient">
                              <div class="box-header">
                                <i class="fa fa-th"></i>
                                <h3 class="box-title">Brand Statistics</h3>
                                <div class="box-tools pull-right">
                                  <button class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                </div>
                              </div>
                              <div class="box-body border-radius-none">
                                <div id = "piechart_3d"></div>
                              </div><!-- /.box-body -->
                              <div class="box-footer no-border">
                                <div class="row">
                                  <div class="col-xs-6 text-center" style="border-right: 1px solid #f4f4f4">
                                    <input type="text" class="knob" data-readonly="true" value="' . round(\LibCurl\Http\Post\CurlPHP::httpPost(\API\Dolphin\Constants\APIConstants::__returnConstant('brand'), $params3) / (\LibCurl\Http\Post\CurlPHP::httpPost(\API\Dolphin\Constants\APIConstants::__returnConstant('brand'), $params3) + \LibCurl\Http\Post\CurlPHP::httpPost(\API\Dolphin\Constants\APIConstants::__returnConstant('devices'), $params2)) * 100, 1) . '" data-width="100" data-height="60" data-fgColor="#39CCCC">
                                    <div class="knob-label">Brands%</div>
                                  </div><!-- ./col -->
                                  <div class="col-xs-6 text-center" style="border-right: 1px solid #f4f4f4">
                                    <input type="text" class="knob" data-readonly="true" value="' . round(\LibCurl\Http\Post\CurlPHP::httpPost(\API\Dolphin\Constants\APIConstants::__returnConstant('devices'), $params2) / (\LibCurl\Http\Post\CurlPHP::httpPost(\API\Dolphin\Constants\APIConstants::__returnConstant('devices'), $params2) + \LibCurl\Http\Post\CurlPHP::httpPost(\API\Dolphin\Constants\APIConstants::__returnConstant('brand'), $params3)) * 100, 1) . '" data-width="60" data-height="60" data-fgColor="#39CCCC">
                                    <div class="knob-label">Devices%</div>
                                  </div><!-- ./col -->
                                </div><!-- /.row -->
                              </div><!-- /.box-footer -->
                            </div><!-- /.box -->

                          </section><!-- right col -->
                        </div><!-- /.row (main row) -->

                      </section><!-- /.content -->
                    </div><!-- /.content-wrapper -->
      


                ';
        
        require '/Views/Layout/Footer.php';
        
        \Layout\Compartment\Fixed\Footer::__init();
        
    }

}
