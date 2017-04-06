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
        $row = mysqli_fetch_array($result);
        $note = ["note_id"=>$row["note_id"], "name"=>$row["name"], "date_created"=>$row["date_created"]];
        return $note;
    }

}
?>