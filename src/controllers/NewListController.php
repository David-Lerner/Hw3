<?php
namespace sudoku_solvers\hw3\controllers;

use sudoku_solvers\hw3\views as V;
use sudoku_solvers\hw3\models as M;
use sudoku_solvers\hw3\controllers\Controller;
use sudoku_solvers\hw3\configs\Config;

class NewListController extends Controller
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

		$listModel->closeConnection();

		$data = [$title, $currentList];
		$views=new V\NewListView();
		$views->render($data);
	}

    public function submitAction() {
        $currentList = (isset($_REQUEST['arg1'])) ? filter_var($_REQUEST['arg1'], FILTER_SANITIZE_NUMBER_INT) : 1;
        $name = (isset($_REQUEST['arg2'])) ? filter_var($_REQUEST['arg2'], FILTER_SANITIZE_STRING) : "";
        
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