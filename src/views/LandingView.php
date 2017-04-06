<?php

namespace sudoku_solvers\hw3\views;

use sudoku_solvers\hw3\views\layouts as L;

class LandingView extends View{

  public $header_display;

  public function __construct(){

    $this->header_display = new L\HeaderLayout($this);
  }

  public function render($data){
    $this->header_display->render($data[0]);
    $list_array = $data[1];
    $note_array = $data[2];
    ?>
    <body>
      <div class="page">
      <h1>
        <a href="Hw3/index.php?c=LandingController&m=mainAction&arg1=1"><?=$data[1] ?></a>
      </h1>
      <br>
      <div>
        <div class ="listsDiv">
          <h2>Lists</h2>
            <ul>
              <?php
                foreach($list_array as $list_id -> $list_name){
                  ?><li class="listsList"><a href="Hw3/index.php?c=SublistController&m=mainAction&arg1=".<?=$list_id?>><?=$list_name?></a></li> <?php
                }
              ?>
            </ul>
        </div>

        <div class="notesDiv">
          <h2>Notes</h2>
            <ul>
              <?php
                foreach($note_array as $note_id -> $note){
                  ?> <li class="notesList"><a href="Hw3/index.php?c=SublistController&m=mainAction&arg1=".<?=$note_id?>><?=$note['name']?></a> <?=$note['date_created']?></li>
                  <?php
                }
               ?>
            </ul>
        </div>
      </div>
    </div>
    </body>
    </html><?php
  }

}
?>
