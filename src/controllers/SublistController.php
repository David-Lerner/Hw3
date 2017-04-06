<?php
namespace sudoku_solvers\hw3\controllers;

use sudoku_solvers\hw3\views as V;
use sudoku_solvers\hw3\models as M;
use sudoku_solvers\hw3\controllers\Controller;

class SublistController extends Controller
{

	public function mainAction($params=array("arg1"=>1))
	{
		$currentList = $params["arg1"];

		

		$listModel = new M\ListModel();

        $title = array();
        $list = $listModel->getList($currentList);
        if ($list["parent_id"] != 1) {
            $parent = $listModel->getList($list["parent_id"]);
            $title = [1 => "Note-A-List", 
                    $parent["list_id"] => $parent["name"], 
                    $currentList => $list["name"]];
            if ($parent["parent_id"] != 1) {
                $title["long"] = "..";
            }
        } else {
            $title = [1 => "Note-A-List", $currentList => $list["name"]];
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