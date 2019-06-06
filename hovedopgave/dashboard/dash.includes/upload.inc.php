<?php

session_start();

$usersId = $_SESSION['userId'];

$userName = $_SESSION['userUid'];

/

if (isset($_POST['save'])) {
    
    require "../../includes/dbh.inc.php";
    
    // Variabler til database table
    
    $filename = $_FILES['myfile']['name'];

    $filetitle = $_POST['title'];

    $forfatter = $_POST['forfatter'];

    $filedate = $_POST['dato'];

    $timestamp = date('Y-m-d H:i:s');
    
    // Lokal backup mappe
    
    $destination = '../uploads/' . $filename;

    
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];
        
        
        // Indsætter dataen i files table    
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO files (usersId, name, title, forfatter, dato, size) VALUES ('$usersId', '$filename', '$filetitle', '$userName', '$timestamp', $size)";
            if (mysqli_query($conn, $sql)) {
                header("Location: ../upload.php?upload=success");
            }
            
            // Hvis det fejler, bliver brugeren få en fejl meddelelse.
        } else {
                header("Location: ../upload.php?upload=error");
        } 
    }

?>

<?php
    require "../footer.php";
?>