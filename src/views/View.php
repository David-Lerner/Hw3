<?php

namespace sudoku_solvers\hw3\views;

abstract class View
{

  public function __construct(){

  }

  public abstract function render($data);
}
