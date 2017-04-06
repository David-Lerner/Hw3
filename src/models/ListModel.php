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

    public function getList($currentList) {
        $query ="SELECT * FROM list WHERE list_id = $currentList;";
        $result = mysqli_query($this->connection, $query);
        return mysqli_fetch_array($result);
    }

    public function addList($name, $currentList) {
        $query ="INSERT INTO List(name,parent_id) VALUES($name, $currentList);";     
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