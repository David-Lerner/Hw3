<?php

  namespace sudoku_solvers\hw3\views\layouts;

  use sudoku_solvers\hw3\views\View;

  abstract class Layout{

    require_once("../View.php");
    public $view;

    public function __construct(View $current_view){

      $this->$view = $current_view;
    }

    public abstract function render($data);

  }

 ?>
