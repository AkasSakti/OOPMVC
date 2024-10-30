<?php
require_once 'config.php';
define('ROOT_DIR', dirname(__FILE__));
// Autoload class
spl_autoload_register(function($class) {
    $paths = ['models/', 'controllers/'];
    foreach($paths as $path) {
        $file = $path . $class . '.php';
        if(file_exists($file)) {
            require_once $file;
        }
    }
});

// Routing sederhana
$controller = isset($_GET['c']) ? $_GET['c'] : 'Auth';
$action = isset($_GET['a']) ? $_GET['a'] : 'index';

$controllerName = $controller . 'Controller';
$cont = new $controllerName();
$cont->$action();