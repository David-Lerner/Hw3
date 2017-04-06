<?php

namespace sudoku_solvers\hw3\views;

use sudoku_solvers\hw3\views\layouts as L;
use sudoku_solvers\hw3\views\elements as E;

class SublistView extends View{

  public $header_display;

  public function __construct(){

    $this->header_display = new L\HeaderLayout($this);
  }

  public function render($data){
    $this->header_display->render($data[0]);
    $title_array = $data[0];
    $list_array = $data[1];
    $note_array = $data[2];
    $current_list = $data[3];
    ?>

    <body>
      <div class="page">
      <h1>
        <?php (new E\TitleElement($this))->render($title_array);?>
      </h1>
      <div>
        <div class ="listsDiv">
          <h2>Lists</h2>
            <ul>
              <li>
                [<a href="Hw3/index.php?c=NewListController&m=mainAction&arg1=<?=$current_list?>">New List</a>]
              </li>
              <?php
                foreach($list_array as $list_id => $list_name){
                  ?><li class="lists_items"><a href="Hw3/index.php?c=SublistController&m=mainAction&arg1=<?=$list_id?>"><?=$list_name?></a></li> <?php
                }
              ?>
            </ul>
        </div>

        <div class="notesDiv">
          <h2>Notes</h2>
            <ul>
              <li>
                [<a href="Hw3/index.php?c=NewNoteController&m=mainAction&arg1=<?=$current_list?>">New Note</a>]
              </li>
              <?php
                foreach($note_array as $note_id => $note){
                  ?> <li class="lists_items"><a href="Hw3/index.php?c=SublistController&m=mainAction&arg1=<?=$note_id?>"><?=$note['name']?></a> <?=$note['date_created']?></li>
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
