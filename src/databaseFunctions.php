<?php
function db_connect()
{
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    return $mysqli;
}
    
function db_getData($query)
{
    $mysqli = db_connect();
    $result = $mysqli->query($query);
    $mysqli->close();
    return $result;
}

function db_insertData($query)
{
    $mysqli = db_connect();
    $result = $mysqli->query($query);
    if ($result === TRUE) 
    {
       // Return row id for succes
        return mysqli_insert_id($mysqli);
    } 
    else 
    {
        $result = "Error: " . $query . "<br>" . $mysqli->error;
     }
    $mysqli->close();
    return $result;
}
?>
