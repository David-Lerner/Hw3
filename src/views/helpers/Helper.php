<?php

  namespace sudoku_solvers\hw3\views\helpers;

  use sudoku_solvers\hw3\views\View;

  abstract class Helper{

    public $view;

    public function __construct(View $current_view){

      $this->view = $current_view;
    }

    public abstract function render($data);

  }

 ?>