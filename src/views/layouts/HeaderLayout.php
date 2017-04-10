<?php

  namespace sudoku_solvers\hw3\views\layouts;

  use sudoku_solvers\hw3\views\View;
  use sudoku_solvers\hw3\configs\Config;

  class HeaderLayout extends Layout{

    public function render($data){
      ?>
        <!DOCTYPE html>
        <html>
        <head>
          <title><?= $data["name"] ?></title>
          <base href="<?= Config::BASE_URL ?>/"/>
          <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>/src/styles/common.css">
        </head>
        <body>
      <?php
    }

  }
 ?>