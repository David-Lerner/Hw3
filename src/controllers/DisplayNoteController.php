<?php
namespace sudoku_solvers\hw3\controllers;

use sudoku_solvers\hw3\views as V;
use sudoku_solvers\hw3\models as M;
use sudoku_solvers\hw3\controllers\Controller;

class DisplayNoteController extends Controller
{

	public function mainAction($params)
	{
		$currentNote = (isset($params['arg1'])) ? filter_var($params['arg1'], FILTER_SANITIZE_NUMBER_INT) : 1;

        $noteModel = new M\NoteModel();
		$note = $noteModel->getNote($currentNote);
		$noteModel->closeConnection();

        $currentList = $note["list_id"];

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

		$listModel->closeConnection();

		$data = [$title, $note];
		$views=new V\DisplayNoteView();
		$views->render($data);
	}
}
?>