<?php 
session_start();
if(!isset($_SESSION['userId'])){
   header("Location: ../index.php");
}
?>

<?php 
    require "../../includes/dbh.inc.php";
?>

<?php 
    include "../../header.php";
?>

<?php
$searchingq = $_GET['search'];
?>



<!-- Søgeresultat intro start -->

<main>

    <div class="container-fluid mt-4 tableCon" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-delay="300" data-aos-offset="0">
        <div class="row">
            <div class="col-12">
                <h4>Reultater på: <?php echo $searchingq?></h4>
            </div>
        </div>
    </div>

<!-- Søgeresultat intro SLUT -->


<!-- Table starter her -->
    <div class="container-fluid tableCon mt-3" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-delay="300" data-aos-offset="0">
        <div class="responsive-table">
            <table class="searchTable table">
                <thead>
                    <tr>
                        <th class="docName" scope="col">Navn</th>
                        <th class="docTitle" scope="col">Filnavn</th>
                        <th class="docForfatter" scope="col">Forfatter</th>
                        <th class="docDato" scope="col">Dato</th>
                        <th class="docDownload text-center" scope="col">Download</th>
                        <th class="docSlet text-center"scope="col">Slet</th>
                </tr>
        </thead>

        <?php

$usersId = $_SESSION['userId'];
$output = '';
    
    
  // Tjekker om der er nogen dokumenter, hvis navn, titel eller forfatter stemmer overens med søgeparametret    
 if (isset($_GET['search']) && $_GET['search'] !== ' ') {
   $searchingq = $_GET['search'];
   $q = mysqli_query($conn, "SELECT * FROM files WHERE id AND name LIKE '%$searchingq%' OR title LIKE '%$searchingq%' OR forfatter LIKE '%$searchingq%'") or die(mysqli_error($conn));
        mysqli_stmt_bind_param($id, $name, $title, $forfatter, $download);
   $c = mysqli_num_rows($q);
    
        // Hvis ikke der er nogen resultater, køres scriptet herunder
    
        if($c == 0) {
            $output = '<p>Intet resultat fundet på: "' .$searchingq. '"</p>';
        } else {
            
            // Hvis der er resultater på søgning, bliver det printet ud i en variable med en while loop, indtil der ikke er flere resultater.
            
            while($row = mysqli_fetch_array($q)) {
                $name = $row['name'];
                $title = $row['title'];
                $forfatter = $row['forfatter'];
                $download = $row['downloads'];
                $dato = $row['dato'];

                $output .= 
                            '
                            <tbody class="tableBody">
                            <tr>
                                <td>' .$title. '</td>
                                <td class="docName2">' .$name. '</td>
                                <td>' .$forfatter. '</td>
                                <td class="docDato">'.$dato. '</td>
                                <td class="text-center"><a href="../uploads/'.$name.'" download="'.$name.'"><i class="fas fa-file-export"></i></a></td>
                                <td class="text-center docSlet2"><a href="delete.inc.php?id='.$row['id'].'"><i class="fas fa-trash-alt"</a></td> 
                            </tr>
                        </tbody>';
            }
        }
    } else {
        header("location: ./");
    } 

    print("$output");
    mysqli_close($conn);
?>

        </table>
        
        <!-- Table starter her -->
    </div>
</div>