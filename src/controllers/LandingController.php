<?php
namespace sudoku_solvers\hw3\controllers;

use sudoku_solvers\hw3\views as V;
use sudoku_solvers\hw3\models as M;
use sudoku_solvers\hw3\controllers\Controller;

class LandingController extends Controller
{

	public function mainAction()
	{
		$currentList = 1;

		$title = ["head"=>["name"=>"Note-A-List", "id"=>1]];

		$listModel = new M\ListModel();
		$lists = $listModel->getLists($currentList);
		$listModel->closeConnection();

		$noteModel = new M\NoteModel();
		$notes = $noteModel->getNotes($currentList);
		$noteModel->closeConnection();

		$data = [$title, $lists, $notes, $currentList];
		$views=new V\LandingView();
		$views->render($data);
	}
}
?>