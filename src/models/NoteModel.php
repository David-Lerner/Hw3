<?php
namespace sudoku_solvers\hw3\models;

class NoteModel extends Model
{
    public function getNotes($currentList) {
        $notes = array();
        $query ="SELECT * FROM note WHERE list_id = $currentList ORDER BY time_created DESC;";
        $result = mysqli_query($this->connection, $query);
        $num_rows = mysqli_num_rows($result);
        for($i = 0; $i < $num_rows; $i++) {
            $row = mysqli_fetch_array($result);
            $notes[$row["note_id"]] = ["name"=>$row["name"], "time_created"=>$row["time_created"]];
        }
        return $notes;
    }

    public function getNote($note_id) {
        $query ="SELECT * FROM note WHERE note_id = $note_id;";
        $result = mysqli_query($this->connection, $query);
        return mysqli_fetch_array($result);
    }

    public function addNote($name, $content, $currentList) {
        $query ="INSERT INTO note(name,content,time_created,list_id) VALUES('$name', '$content', NOW(), $currentList);";
        if (mysqli_query($this->connection, $query)) {
            //echo "New record created successfully";
            return mysqli_insert_id($this->connection);
        } else {
            //echo "Error: " . $query . "<br>" . mysqli_error($this->connection);
            return false;
        } 
    }

}
?>