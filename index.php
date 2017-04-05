<?php
namespace sudoku_solvers\hw3;

use sudoku_solvers\hw3\controllers as C;
use sudoku_solvers\hw3\configs\Config;

if(!isset($_REQUEST['c']) && !isset($_REQUEST['m']))
{
	$controller=new C\LandingController();
	$controller->invoke();
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
		
		//$controller->$methodtoinvoke($argumentlist);
	}
	if(in_array($controllertocall,$availablecontrollers))
	{
		//It is a valid controller
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
			print("Invalid method called. Page cannot be displayed");
		}
	}
	else
	{
		print("Page not found! Invalid Controller called");
	}
	
}
?>

