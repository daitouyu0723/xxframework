<?php
session_start();

define('APP_PATH', dirname($_SERVER['SCRIPT_FILENAME']));
define('FW_PATH', dirname(__FILE__));
define('APP_URL', dirname($_SERVER['SCRIPT_NAME']));

require FW_PATH.'/config/Config.class.php';

if(Config::$GLOBAL['debug']) ini_set('display_errors', 'On');

require FW_PATH.'/base/Controller.class.php';
require FW_PATH.'/base/Model.class.php';


function route() {
    $controller = isset($_GET['c']) ? ucfirst($_GET['c']).'Controller' : 'IndexController';
    require APP_PATH.'/controllers/'.$controller.'.class.php';
    $c = new $controller;
    isset($_GET['a']) ? $c->$_GET['a']() : $c->index();
}

function __autoload($classname) {
    if('Model' === substr($classname, -5)) :
        $model_file = APP_PATH.'/models/'.$classname.'.class.php';
        if(file_exists($model_file)) 
            include_once $model_file;
        else
            throw new Exception($classname.' class not found', 1002);
    elseif('Controller' === strpos($classname, -10)) :
        $controller_file = APP_PATH.'/controllers/'.$classname.'.class.php';
        if(file_exists($controller_file))
            include_once $controller_file;
        else
            throw new Exception($classname.' class not found', 1003);
    else :
        $library_file = APP_PATH.'/library/'.$classname.'.class.php';
        if(file_exists($library_file))
            include_once $library_file;
        else
            throw new Exception($classname.' class not found', 1004);
    endif;
}
