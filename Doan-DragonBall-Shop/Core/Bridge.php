<?php 
session_start(); ob_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');

include './App/Config/Config.php';

include 'Auth.php';
$auth = new Auth();

include 'Mail/class.smtp.php';
include 'Mail/class.phpmailer.php'; 

include './App/Route/Route.php'; 

include './App/Helpers/Helper.php';

include 'DB.php';

include 'Controller.php';

#Get file autoload
for($i = 0; $i < count($config['autoload']); $i++) {

    include './App/Autoload/' . $config['autoload'][$i] . '.php';

    $loadFile = new $config['autoload'][$i];
}

include 'App.php';

