<?php

//showing product name in table from database
function data_list1($tablename, $column, $column2){
    require("connection.php");
    //$tablename use for dynamically select name
    $sql = "SELECT * FROM $tablename";
    $query = $conn->query($sql);

        while( $data = mysqli_fetch_assoc($query)){
            $data_id = $data[$column];
            $data_name = $data[$column2];
            echo "<option value='$data_id'> $data_name </option>";
        }


}

