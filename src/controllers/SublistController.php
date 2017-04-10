<?php
namespace sudoku_solvers\hw3\controllers;

use sudoku_solvers\hw3\views as V;
use sudoku_solvers\hw3\models as M;
use sudoku_solvers\hw3\controllers\Controller;

class SublistController extends Controller
{

	public function mainAction()
	{
		$currentList = (isset($_REQUEST['arg1'])) ? filter_var($_REQUEST['arg1'], FILTER_SANITIZE_NUMBER_INT) : 1;

		$listModel = new M\ListModel();
        
        $title = ["head"=>["name"=>"Note-A-List", "id"=>1]];
        $list = $listModel->getList($currentList);
        if ($currentList != 1) {
            $title["current"] = ["name"=>$list["name"], "id"=>$list["list_id"]];
            if ($list["parent_id"] != 1) {
                $parent = $listModel->getList($list["parent_id"]);
                $title["parent"] = ["name"=>$parent["name"], "id"=>$parent["list_id"]];
                if ($parent["parent_id"] != 1) {
                    $title["long"] = true;
                }
            }
        }

		$lists = $listModel->getLists($currentList);
		$listModel->closeConnection();

		$noteModel = new M\NoteModel();
		$notes = $noteModel->getNotes($currentList);
		$noteModel->closeConnection();

		$data = [$title, $lists, $notes, $currentList];
		$views=new V\SublistView();
		$views->render($data);
	}
}
?>