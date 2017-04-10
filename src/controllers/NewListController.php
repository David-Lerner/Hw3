<?php
namespace sudoku_solvers\hw3\controllers;

use sudoku_solvers\hw3\views as V;
use sudoku_solvers\hw3\models as M;
use sudoku_solvers\hw3\controllers\Controller;
use sudoku_solvers\hw3\configs\Config;

class NewListController extends Controller
{

	public function mainAction($params)
	{
		$currentList = (isset($params['arg1'])) ? filter_var($params['arg1'], FILTER_SANITIZE_NUMBER_INT) : 1;

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

		$data = [$title];
		$views=new V\AddListView();
		$views->render($data);
	}

    public function submitAction($params) {
        $currentList = (isset($params['arg1'])) ? filter_var($params['arg1'], FILTER_SANITIZE_NUMBER_INT) : 1;
        $name = (isset($params['arg2'])) ? filter_var($params['arg2'], FILTER_SANITIZE_STRING) : "";
        
        $newList = $currentList;
        if ($name != "") {
            $listModel = new M\ListModel();
            $newList = $listModel->addList($name, $currentList);
            //add error check
		    $listModel->closeConnection();
        }     

        header("Location:" . Config::BASE_URL . "\index.php?c=SublistController&m=mainAction&arg1=$newList");
    }
}
?>