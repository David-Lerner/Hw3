<?php
namespace sudoku_solvers\hw3\models;

class NoteModel extends Model
{
    public function getNotes($currentList) {
        $notes = array();
        $query ="SELECT * FROM note WHERE list_id = $currentList ORDER BY date_created;";
        $result = mysqli_query($this->connection, $query);
        $num_rows = mysqli_num_rows($result);
        for($i = 0; $i < $num_rows; $i++) {
            $row = mysqli_fetch_array($result);
            $notes[$row["note_id"]] = ["name"=>$row["name"], "date_created"=>$row["date_created"]];
        }
        return $notes;
    }

    public function getNote($note_id) {
        $query ="SELECT * FROM note WHERE note_id = $note_id;";
        $result = mysqli_query($this->connection, $query);
        return mysqli_fetch_array($result);
    }

    public function addNote($name, $content, $currentList) {
        $query ="INSERT INTO List(name,content,date_created,list_id) VALUES($name, $content, CURDATE(), $currentList);";
        if (mysqli_query($this->connection, $query)) {
             //echo "New record created successfully";
            return true;
        } else {
            //echo "Error: " . $query . "<br>" . mysqli_error($this->connection);
            return false;
        } 
    }

}
?>