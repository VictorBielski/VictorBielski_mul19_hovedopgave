<?php 
session_start();
if(!isset($_SESSION['userId'])){
   header("Location: ../index.php");
}
?>

<?php 
    include "./../header.php";
?>

<?php 
    require "./../includes/dbh.inc.php";
?>

<!-- Søgeresultat styling starter her -->

<div class="container-fluid tableCon mt-4" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-delay="300" data-aos-offset="0">
    <h4>ALLE DOKUMENTER I SITEWORKS</h4>
    
    <!-- Success besked ved sletning af dokument start-->
    <?php 
                if (isset($_GET['delete'])) {
                if ($_GET['delete'] == "success") {
                echo '<p class="succesMsg2">DOKUMENT SLETTET!</p>';
            }
        }
    ?>
    <!-- Success besked ved sletning af dokument slut-->
    
    <!-- Table start her -->
    <div class="table-responsive mt-4">
    <table class="searchTable table">
        <thead>
            <tr>
                <th class="docTitle">TITEL</th>
                <th class="docName">FILNAVN</th>
                <th class="docForfatter">FORFATTER</th>
                <th class="docDato">DATO</th>
                <th class="docDownload text-center">DOWNLOAD</th>
                <th class="docSlet text-center">SLET</th>
            </tr>
    </thead>

<?php

//Generere tablerows, alt efter hvor mange søgeresultater der er i databasen
$result = mysqli_query($conn, "SELECT * FROM files");

while($row = mysqli_fetch_array($result)) {
    $name = $row['name'];
    echo '<tbody>';
    echo '<tr>';
    echo '<td>' .$row['title'].'</td>';
    echo '<td class="docName2">' .$row['name'].'</td>';
    echo '<td>' .$row['forfatter'].'</td>';
    echo '<td class="docDato2">' .$row['dato'].'</td>';
    echo '<td class="text-center docDown"><a href="./uploads/'.$name.'" download="'.$name.'"><i class="fas fa-file-export"></i></a></td>';
    echo '<td class="text-center docSlet2"><a href="/hovedopgave/dashboard/dash.includes/delete.inc.php?id='.$row['id'].'"><i class="fas fa-trash-alt"</a></td>';
    echo '</tr>';
    echo '</tbody>';
}

?>
</table>

<!-- Table slutter her -->
</div>
</div>

<!-- Søgeresultat styling starter her -->