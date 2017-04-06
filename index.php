<?php
namespace sudoku_solvers\hw3;

use sudoku_solvers\hw3\controllers as C;

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
if(!isset($_REQUEST['c']) && !isset($_REQUEST['m']))
{

	$controller=new C\LandingController();
	$controller->mainAction(["arg1" => 1]);
}

else
{
	$controllertocall=$_REQUEST['c'];
	$methodtoinvoke=$_REQUEST['m'];
	$querystring=$_SERVER['QUERY_STRING'];
	parse_str($querystring,$request_array);
	$argumentlist=[];
	$availablecontrollers=['LandingController','SublistController','NewListController','NewNoteController','DisplayNoteController'];

	if(count($request_array)>2)
	{
		$numberofparams=count($request_array);
		for($i=1;$i<=($numberofparams-2);$i++)
		{
			$arname="arg".$i;
			if(array_key_exists($arname,$request_array))
			{
				$argumentlist[]=$request_array[$arname];
			}
		}
	}
	if(in_array($controllertocall,$availablecontrollers))
	{
		//It is a valid controller
		require_once("./src/controllers/$controllertocall.php");
		$controllerclass='sudoku_solvers\\hw3\\controllers\\' . $controllertocall;
		$controller=new $controllerclass();
		if(method_exists($controller,$methodtoinvoke))
		{
			//it is a valid method in the controller
			if(empty($argumentlist))
			{
				$controller->$methodtoinvoke();
			}
			else
			{
				$controller->$methodtoinvoke($argumentlist);
			}
		}
		else
		{
			print("Error: Invalid method called. Page cannot be displayed");
		}
	}
	else
	{
		print("Error: Page not found! Invalid Controller called");
	}

}
?>
