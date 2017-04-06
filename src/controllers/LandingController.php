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
		$notes = [1=>["name"=>"Name1", "date_created"=>"1/1/1111"],
		 2=>["name"=>"Name2", "date_created"=>"2/1/1111"],
		 3=>["name"=>"Name3", "date_created"=>"3/1/1111"]];
		$data = [$title, $lists, $notes];
		
		$views=new L\LandingView();
		$views->render($data);
	}
}
?>