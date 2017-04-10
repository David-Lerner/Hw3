<?php

namespace sudoku_solvers\hw3\views;

use sudoku_solvers\hw3\views\layouts as L;
use sudoku_solvers\hw3\views\elements as E;
use sudoku_solvers\hw3\views\helpers as H;

class DisplayNoteView extends View {

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
    $note = $data[1];
    
    $this->header_display->render($title_array["head"]);
    ?> 
    <div class="page">
    <?php $this->title_display->render($title_array);?> 
    <h2>Note: <?=$note["name"]?></h2>
    <?php echo nl2br(htmlspecialchars($note["content"])); ?> 
    </div>
    <?php
    $this->footer_display->render($data[0]);
  }

}
?>