<?php

  namespace sudoku_solvers\hw3\views\elements;

  use sudoku_solvers\hw3\views\View;
  use sudoku_solvers\h3\congfigs\config;

  class HeaderElement extends Element{

    public function render($data){
      ?>
        <!DOCTYPE html>
        <html>
        <head>
          <title><?= $data['listname'] ?></title>
          <base href="<?= Config::BASE_URL ?>"/>
          <link rel="stylesheet" type="text/css" href="src/styles/common.css">
        </head>

      </<?php
    }

  }

 ?>
