<?php

namespace sudoku_solvers\hw3\views;

abstract calss View
{

  public function __construct(){

  }

  public abstract function render($data);
}
