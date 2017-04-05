<?php 
namespace sudoku_solvers\hw3\controllers;

use sudoku_solvers\hw3\views as L;
use sudoku_solvers\hw3\models;
use sudoku_solvers\hw3\controllers\Controller;

class LandingController extends Controller
{
	public $views;
	public $data;
	public $model;

	public function mainAction($params=array(1))
	{
		$views=new L\LandingView();
		$views->render($this->data);
	}
}
?>