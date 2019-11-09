<?php
require '../database/connection.php';
$id = $_POST['delete_id'];

    $sql = "DELETE FROM posts WHERE id='$id'";

    if ($conn->query($sql) === true) {
        
    } else {
        
    }

?>