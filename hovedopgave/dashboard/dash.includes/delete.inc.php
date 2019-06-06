<?php

session_start();



if(isset($_GET['id'])) {
    
    require "../../includes/dbh.inc.php";

    $delete_id = intval($_GET['id']);
    
    // Sletter dokument fra databasen, hvis det stemmer overens med "id"

    $sql = $conn->query("DELETE FROM files WHERE id = '".$delete_id."'");
    if ($sql) {
        header("Location: ../dashboard.all.php?delete=success");
    } else {
        echo "Error";
    }
}