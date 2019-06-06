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

<!-- SØG INTRO START -->

<main>
    <div class="container sogCont" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-delay="300" data-aos-offset="0">
        <div class="row justify-content-center">
            <div class="col-8 sogLogo">
                <img src="/hovedopgave/dashboard/img/nyt_logo.png">
            </div>
        </div>
</div>

<!-- SØG INTRO SLUT -->


<!-- SØG FORM START -->

    <div class="container sogFormCol" data-aos="fade-up" data-aos-duration="3000">
            <div class="row">
                <div class="col-12 sogForm">
                    <form action="dash.includes/search.inc.php" method="get">
                        <input type="text" class="form-control sogInput" name="search" placeholder="Navn, Titel el. Forfatter..." required  >
                        <input type="submit" value="Søg" class="sogBtn">
                    </form>
                </div>
            </div>
    </div>

<!-- SØG FORM SLUT -->


<div class="container">
    <div class="row">
        <div class="col-12">
            <?php 
            /*
                $sql = "SELECT * FROM files";
                $result = mysqli_query($conn, $sql);
                $queryResults = mysqli_num_rows($result);

                if ($queryResults > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div>
                            <h1>".$row['name']."</h1>
                            <h3>".$row['title']."</h3>
                            <p>".$row['forfatter']."</p>
                        </div>";
                    }
                }*/
            ?>
        </div>
    </div>
</div>
</main>



<?php 
    require "../footer.php";
?>    