<?php 
namespace sudoku_solvers\hw3\controllers;

use sudoku_solvers\hw3\views as L;
use sudoku_solvers\hw3\models;
use sudoku_solvers\hw3\controllers\Controller;

class LandingController extends Controller
{

	public function mainAction($params=array(1))
	{
		$title = [1=>"Note-A-List"];
		$lists = [1=>"List1", 2=>"List2",3=>"List3"];
		$notes = [1=>"Note1", 2=>"Note2",3=>"Note3"];
		$dates = [1=>"Date1", 2=>"Date2",3=>"Date3"];
		require_once("../views/LandingView.php");
		$views=new L\LandingView();
		$views->render($title, $lists, $notes, $dates);
	}
}
?>