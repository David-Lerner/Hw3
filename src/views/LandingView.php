<?php

namespace sudoku_solvers\hw3\views;

use sudoku_solvers\hw3\View;

class LandingView extends View{

  public $header_display;

  public function __construct(){

    $this->header_display = new HeaderElement($this);

  }

  public function render($data){

    $this->header_display->render($data); ?>
    <body>
      <h1> <?=$data['list_name'] ?></h1>
    </body>
  }

}

 ?>
