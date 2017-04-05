<?php
 /* * CreateDB.php can be run from the command-line to
 *    make a good initial database
 */

namespace sudoku_solvers\hw3\config;

require_once('Config.php');

$conn = mysqli_connect(Config::DB_HOST, Config::DB_USER, Config::DB_PASSWORD, "", Config::DB_PORT, Config::DB_SOCKET);

$stmt = mysqli_prepare($conn, 'DROP DATABASE IF EXISTS '.Config::DB_NAME.';');
mysqli_stmt_execute($stmt);

$stmt = mysqli_prepare($conn,'CREATE DATABASE '.Config::DB_NAME.';');
mysqli_stmt_execute($stmt);

mysqli_select_db($con, Config::DB_NAME);

$stmt = mysqli_prepare($conn,'DROP TABLE IF EXISTS List;');
mysqli_stmt_execute($stmt);

$stmt = mysqli_prepare($conn, 'CREATE TABLE List
  (list_id INT AUTO_INCREMENT, name VARCHAR(30), parent_id INT, PRIMARY KEY (list_id))');
mysqli_stmt_execute($stmt);

$stmt = mysqli_prepare($conn, 'DROP TABLE IF EXISTS Note;');
mysqli_stmt_execute();

$stmt = mysqli_prepare($conn, 'CREATE TABLE Note
  (note_id, INT AUTO_INCREMENT, name VARCHAR(30), content VARCHAR(1000), date_created DATE, PRIMARY KEY (note_id));');
mysqli_stmt_execute($stmt);

$stmt = mysqli_prepare($conn, 'DROP TABLE IF EXISTS Contains;');
mysqli_stmt_execute();

$stmt = mysqli_prepare($conn, 'CREATE TABLE Contains
  (list_id INT, note_id INT, FOREIGN KEY (list_id) REFERENCES List(list_id) ON DELETE CASCADE, FOREIGN KEY (note_id) REFERENCES Note(note_id) ON DELETE CASCADE);');
mysqli_stmt_execute();

$stmt = mysqli_prepare($conn, 'INSERT INTO List VALUES(0, Note A List, 0)');
mysqli_stmt_execute();
?>
