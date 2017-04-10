<?php
namespace sudoku_solvers\hw3\controllers;

use sudoku_solvers\hw3\views as V;
use sudoku_solvers\hw3\models as M;
use sudoku_solvers\hw3\controllers\Controller;

class LandingController extends Controller
{

	public function mainAction($params)
	{
		$currentList = (isset($params['arg1'])) ? filter_var($params['arg1'], FILTER_SANITIZE_NUMBER_INT) : 1;

		$title = [1=>"Note-A-List"];

		/*$lists = [1=>"List1", 2=>"List2",3=>"List3"];
		$notes = [1=>["name"=>"Name1", "date_created"=>"1/1/1111"],
				2=>["name"=>"Name2", "date_created"=>"2/1/1111"],
				3=>["name"=>"Name3", "date_created"=>"3/1/1111"]];*/

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