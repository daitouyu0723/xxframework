<?php

require_once dirname(__FILE__).'/config/Config.class.php';

$controller = isset($_GET['c']) ? ucfirst($_GET['c']).'Controller' : 'IndexController';
$action = isset($_GET['a']) ? strtolower($_GET['a']).'Action' : 'indexAction';
$instance = new $controller;
$instance->$action();

function __autoload($class_name) {
    $class_path = dirname(__FILE__).'/controller/'.$controller.'class.php';
    if(file_exists($class_path)) :
        require_once $class_path;
    else:
        echo '<h1>class not found</h1>';
        exit;
    endif;
}
?>
