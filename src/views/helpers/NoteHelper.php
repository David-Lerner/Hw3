<?php

namespace sudoku_solvers\hw3\views\helpers;

use sudoku_solvers\hw3\configs\Config;

class NoteHelper extends Helper{

    public function render($data){
        foreach($data as $note_id => $note) {
            ?> 
            <li class="note_items"><a href="<?= Config::BASE_URL ?>/index.php?c=DisplayNoteController&m=mainAction&arg1=<?=$note_id?>"><?=$note["name"]?></a> <?php
            echo date("Y-m-d", strtotime($note['time_created'])); 
            ?></li><?php
        }
    }
}
?>