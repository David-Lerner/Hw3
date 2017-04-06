<?php
namespace sudoku_solvers\hw3\controllers;

use sudoku_solvers\hw3\views as V;
use sudoku_solvers\hw3\models as M;
use sudoku_solvers\hw3\controllers\Controller;
use sudoku_solvers\hw3\configs\Config;

class NewListController extends Controller
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
        } else {
            $title = [1 => "Note-A-List", $currentList => $list["name"]];
        }

		$listModel->closeConnection();

		$data = [$title];
		$views=new V\AddListView();
		$views->render($data);
	}

    public function submitAction($params) {
        $currentList = $params["arg1"];
        $name = $params["arg2"];

        $listModel = new M\ListModel();
        $newList = $listModel->addList($name, $currentList);
        //add error check
		$listModel->closeConnection();

        header("Location:" . Config::BASE_URL . "\index.php?c=SublistController&m=mainAction&arg1=$newList");
    }
}
?>