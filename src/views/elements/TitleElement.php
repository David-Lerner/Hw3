<?php

namespace sudoku_solvers\hw3\views\elements;

class TitleElement extends Element{

  public function render($data){

      $title_array = $data[0];

      ?><div>
        <a href="Hw3/index.php"><?=$title_array[1]?></a>/<?php

    if(sizeof($data) == 2){
      $current_list = $data[1];

        foreach($current_list as $list_id => $list_name){

          ?><a href="Hw3/index.php?c=SublistController&m=mainAction&arg1=<?=$list_id?>"><?=$list_name?></a>
        }
      </div><?php

    } else {
      $parent_list = $data[1];
      $current_list = $data[2];

      if ((sizeof($data) > 3 )){
        ?>../<?php
      }

        foreach($parent_list as $list_id => $list_name){

          ?><a href="Hw3/index.php?c=SublistController&m=mainAction&arg1=<?=$list_id?>"><?=$list_name?></a>/<?php
        }

        foreach($current_list as $list_id => $list_name){

          ?><a href="Hw3/index.php?c=SublistController&m=mainAction&arg1=<?=$list_id?>"><?=$list_name?></a>
        }

        <?php
    }
  }
}

?>
