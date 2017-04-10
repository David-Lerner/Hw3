<?php

namespace sudoku_solvers\hw3\views;

use sudoku_solvers\hw3\views\layouts as L;
use sudoku_solvers\hw3\views\elements as E;
use sudoku_solvers\hw3\views\helpers as H;

class NewListView extends View {

  public $header_display;
  public $footer_display;
  public $title_display;
  public $list_display;

  public function __construct(){

    $this->header_display = new L\HeaderLayout($this);
    $this->footer_display = new L\FooterLayout($this);
    $this->title_display = new E\TitleElement($this);
    $this->list_display = new H\ListHelper($this);
  }

  public function render($data){
    $title_array = $data[0];
    $current_list = $data[1];
    
    $this->header_display->render($title_array["head"]);
    ?> 
    <div class="page">
    <?php $this->title_display->render($title_array);?> 
    <h2>New List</h2>
    <form action="index.php" method="GET">
        <input type="hidden" name="c" value="NewListController" />
        <input type="hidden" name="m" value="submitAction" />
        <input type="hidden" name="arg1" value=<?=$current_list?> />
        <input type="text" name="arg2" placeholder="Enter a new list name" />
	    <input type="submit" value="Add" />
	</form>  
    </div>
    <?php
    $this->footer_display->render($data[0]);
  }

}
?>