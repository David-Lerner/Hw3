<?php

  namespace sudoku_solvers\hw3\views\elements;

  use sudoku_solvers\hw3\views\View;

  abstract class Element{

    public $view;

    public function __construct(View $current_view){

      $this->view = $current_view;
    }

    public abstract function render($data);

  }

 ?>
