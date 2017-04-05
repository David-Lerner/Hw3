<?php
 /* * CreateDB.php can be run from the command-line to
 *    make a good initial database
 */

 namespace sudoku_solvers\hw3\config;

 require_once('Config.php');

 $conn = new mysqli(Config::DB_HOST, Config::DB_USER, Config::DB_PASSWORD, "", Config::DB_PORT, Config::DB_SOCKET);
 $query = "CREATE DATABASE ".Config::DB_NAME;
 
?>
