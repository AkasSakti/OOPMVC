<?php
require_once 'config.php';
define('ROOT_DIR', dirname(__FILE__));

// Autoload class
spl_autoload_register(function($class) {
    $paths = ['models/', 'controllers/'];
    foreach ($paths as $path) {
        $file = $path . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return; // Menggunakan return untuk keluar dari fungsi setelah file ditemukan
        }
    }
});

// Routing
$controller = isset($_GET['c']) ? $_GET['c'] : 'Auth'; // Default controller
$action = isset($_GET['a']) ? $_GET['a'] : 'index'; // Default action
$id = isset($_GET['id']) ? $_GET['id'] : null; // ID untuk operasi tertentu

$controllerName = $controller . 'Controller';

// Memeriksa apakah file controller ada sebelum membuat instance
if (class_exists($controllerName)) {
    $cont = new $controllerName();
    if (method_exists($cont, $action)) {
        // Memanggil action dengan parameter ID jika ada
        if ($id) {
            $cont->$action($id);
        } else {
            $cont->$action();
        }
    } else {
        echo "Error: Method $action tidak ditemukan di $controllerName.";
    }
} else {
    echo "Error: Controller $controllerName tidak ditemukan.";
}
?>