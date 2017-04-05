<?php

  namespace sudoku_solvers\hw3\views\layouts;

  use sudoku_solvers\hw3\views\View;
  use sudoku_solvers\h3\congfigs\config;

  class HeaderLayout extends Layout{

    public function render($data){
      ?>
        <!DOCTYPE html>
        <html>
        <head>a
          <title><?= $data['list_name'] ?></title>
          <base href="<?= Config::BASE_URL ?>"/>
          <link rel="stylesheet" type="text/css" href="src/styles/common.css">
        </head>

      </<?php
    }

  }

 ?>
