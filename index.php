<?php
namespace sudoku_solvers\hw3;

use sudoku_solvers\hw3\controllers as C;
use sudoku_solvers\hw3\configs\Config;

spl_autoload_register(function ($class) {
    // project-specific namespace prefix
    $prefix = 'sudoku_solvers\\hw3';
    $len = strlen($prefix);
    $relative_class = substr($class, $len);

    // Uncomment below if you get class not found, it will show all the autoloaded classes
    //echo "$relative_class <br />";

    $unixify_class_name = "/".str_replace('\\', '/', $relative_class) .
        '.php';
    $file = 'src' . $unixify_class_name;
    if (file_exists($file)) {
        require_once $file;
    }
});
if(!isset($_REQUEST['c']) || !isset($_REQUEST['m'])) {
    $controller=new C\LandingController();
    $controller->mainAction();
} else {
    $controllertocall=$_REQUEST['c'];
    $methodtoinvoke=$_REQUEST['m'];
    
    $availablecontrollers=['LandingController','SublistController','NewListController','NewNoteController','DisplayNoteController'];

    if(in_array($controllertocall,$availablecontrollers)) {
        //It is a valid controller
        $controllerclass='sudoku_solvers\\hw3\\controllers\\' . $controllertocall;
        $controller=new $controllerclass();
        if(method_exists($controller,$methodtoinvoke)) {
            //it is a valid method in the controller
            $controller->$methodtoinvoke();
        } else {
            //print("Error: Invalid method called. Page cannot be displayed");
            header("Location:" . Config::BASE_URL . "\index.php");
        }
    } else {
        //print("Error: Page not found! Invalid Controller called");
        header("Location:" . Config::BASE_URL . "\index.php");
    }
}
?>