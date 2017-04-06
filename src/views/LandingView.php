<?php

namespace sudoku_solvers\hw3\views;

use sudoku_solvers\h3\views\Layout;

class LandingView extends View{

  public $header_display;

  public function __construct(){

    $this->header_display = new HeaderLayout($this);
  }

  public function render($data){

    $this->header_display->render($data); ?>
    <body>
      <h1>
        <a href="index.php?c=LandingController&m=mainAction$arg1=1"><?=$data[1] ?></a>
      </h1>
    </body>
  }

}

 ?>
