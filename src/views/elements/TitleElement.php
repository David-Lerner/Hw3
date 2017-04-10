<?php

namespace sudoku_solvers\hw3\views\elements;

use sudoku_solvers\hw3\configs\Config;

class TitleElement extends Element{

  public function render($data){
      ?> 
      <h1>
        <a href="<?= Config::BASE_URL ?>/index.php?c=LandingController&m=mainAction"><?=$data["head"]["name"]?></a><?php

      if(isset($data["long"])){
        ?> 
        /..<?php
      }
      if(isset($data["parent"])){
        ?> 
        /<a href="<?= Config::BASE_URL ?>/index.php?c=SublistController&m=mainAction&arg1=<?=$data["parent"]["id"]?>"><?=$data["parent"]["name"]?></a><?php
      } 
      if(isset($data["current"])){
        ?> 
        /<a href="<?= Config::BASE_URL ?>/index.php?c=SublistController&m=mainAction&arg1=<?=$data["current"]["id"]?>"><?=$data["current"]["name"]?></a><?php
      }
      ?> 
      </h1><?php
    }
}
?>