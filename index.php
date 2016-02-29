<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Autoloader\Bootstrapper;

@ob_start();

require 'libs/Bootstrapper.php';

\Autoloader\Bootstrapper\Bootstrapper::__start();