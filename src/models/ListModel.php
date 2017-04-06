<?php
namespace sudoku_solvers\hw3\models;

class ListModel extends Model
{
    public function getLists($currentList) {
        $lists = array();
        $query ="SELECT * FROM list WHERE parent_id = $currentList ORDER BY name;";
        $result = mysqli_query($this->connection, $query);
        $num_rows = mysqli_num_rows($result);
        for($i = 0; $i < $num_rows; $i++) {
            $row = mysqli_fetch_array($result);
            $lists[$row["list_id"]] = $row["name"];
        }
        return $lists;
    }

}
?>