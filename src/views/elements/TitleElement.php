<?php

namespace sudoku_solvers\hw3\views\elements;

class TitleElement extends Element{

  public function render($data){
    $keys = array_keys($data);
      ?><div>
        <a href="Hw3/index.php"><?=$data[$keys[0]]?></a>/<?php

    if(sizeof($data) == 2){
      $current_list = $data[$keys[1]];

      ?><a href="Hw3/index.php?c=SublistController&m=mainAction&arg1=<?=$keys[1]?>"><?=$data[$keys[1]]?></a></div>
      <?php
    } else {
      $parent_list = $data[$keys[1]];
      $current_list = $data[$keys[2]];

      if ((sizeof($data) > 3 )){
        ?>../<?php
      }
      ?><a href="Hw3/index.php?c=SublistController&m=mainAction&arg1=<?=$keys[1]?>"><?=$data[$keys[1]]?></a>/
      <a href="Hw3/index.php?c=SublistController&m=mainAction&arg1=<?=$keys[2]?>"><?=$data[$keys[2]]?></a>
      </div><?php
    }
  }
}
?>