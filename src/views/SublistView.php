<?php

namespace sudoku_solvers\hw3\views;

use sudoku_solvers\hw3\views\layouts as L;
use sudoku_solvers\hw3\views\elements as E;
use sudoku_solvers\hw3\views\helpers as H;
use sudoku_solvers\hw3\configs\Config;

class SublistView extends View{

  public $header_display;
  public $footer_display;
  public $title_display;
  public $list_display;
  public $note_display;

  public function __construct(){

    $this->header_display = new L\HeaderLayout($this);
    $this->footer_display = new L\FooterLayout($this);
    $this->title_display = new E\TitleElement($this);
    $this->list_display = new H\ListHelper($this);
    $this->note_display = new H\NoteHelper($this);
  }

  public function render($data){
    $title_array = $data[0];
    $list_array = $data[1];
    $note_array = $data[2];
    $current_list = $data[3];
    
    $this->header_display->render($title_array["head"]);
    ?> 
    <div class="page">
      <?php $this->title_display->render($title_array);?> 
      <div>
        <div class ="listsDiv">
          <h2>Lists</h2>
            <ul>
              <li class="lists_items">
                [<a href="<?= Config::BASE_URL ?>/index.php?c=NewListController&m=mainAction&arg1=<?=$current_list?>">New List</a>]
              </li>
              <?php $this->list_display->render($list_array); ?> 
            </ul>
        </div>

        <div class="notesDiv">
          <h2>Notes</h2>
            <ul>
              <li class="lists_items">
                [<a href="<?= Config::BASE_URL ?>/index.php?c=NewNoteController&m=mainAction&arg1=<?=$current_list?>">New Note</a>]
              </li>
              <?php $this->note_display->render($note_array); ?> 
            </ul>
        </div>
      </div>
    </div>
    <?php
    $this->footer_display->render($data[0]);
  }

}
?>