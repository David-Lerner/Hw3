<?php

namespace sudoku_solvers\hw3\views\helpers;

use sudoku_solvers\hw3\configs\Config;

class ListHelper extends Helper{

    public function render($data){
        foreach($data as $list_id => $list_name) {
            ?> 
            <li class="list_items"><a href="<?= Config::BASE_URL ?>/index.php?c=SublistController&m=mainAction&arg1=<?=$list_id?>"><?=$list_name?></a></li><?php
        }
    }
}
?>