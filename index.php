<?php
namespace sudoku_solvers\hw3;

use sudoku_solvers\hw3\controllers as C;

if(!isset($_REQUEST['c']) && !isset($_REQUEST['m']))
{
	require_once('./src/controllers/LandingController.php');
	$controller=new C\LandingController();
	$controller->mainAction([1]);
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
		$controllerclass='sudoku_solvers\hw3\controllers' . $controllertocall;
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

