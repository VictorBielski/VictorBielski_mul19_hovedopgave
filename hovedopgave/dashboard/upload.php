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

<!-- TILFØJ NYT DOKUMENT START -->

<main>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-sm-8 col-md-6 col-lg-6 uploadCol" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
                <h3 class="text-center mb-4">TILFØJ NYT DOKUMENT</h3>
                
                <!-- Succes besked ved upload -->
                <?php 
                    if (isset($_GET['upload'])) {
                        if ($_GET['upload'] == "success") {
                            echo '<p class="succesMsg">DOKUMENT TILFØJET!</p>';
                    }
                }
                
                ?>
                <!-- FORM START HER -->
                    <form action="./dash.includes/upload.inc.php" enctype="multipart/form-data" method="post" class="uploadForm">
                            <div class="form-group">
                                <input type="text" class="form-control uploadInput" name="title" placeholder="Filnavn..." required>
                            </div>
                            <!--<div class="form-group">
                                <input type="text" class="form-control uploadInput" name="forfatter" placeholder="Forfatter..." required>
                            </div>-->
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" name="myfile" multiple class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile"></label>
                                </div>
                                </div>
                            <button type="submit" name="save" class="btn btn-primary uploadBtn">Tilføj</button>
                        </form>
                        <!-- FORM START HER -->
                        
                    </div>
                </div>
            </div>
</main>

<!-- TILFØJ NYT DOKUMENT SLUT -->

<?php 
    require "../footer.php";
?>    