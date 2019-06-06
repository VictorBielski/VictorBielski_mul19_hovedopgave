<?php 
    require "header.php";
?>
<?php
session_start();
if(isset($_SESSION['userId'])){
      header('Location: ./dashboard/dashboard.index.php');
  }
?>
<main>

<!-- Opret bruger START -->

<div class="container mt-4 mb-4">
    <div class="row justify-content-center">
        <div class="col-sm-8 col-md-6 col-lg-6 loginCol" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
           <h3 class="text-center mb-4">OPRET BRUGER</h3>
           
           <!-- Error handlers START -->

           <?php 
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == "emptyfields") {
                        echo '<p class="signuperror">Udfyld venligst alle felterne!</p>';
                    }
                    else if ($_GET['error'] == "invaliduidemail") {
                        echo '<p class="signuperror">Ugyldigt brugernavn og email!</p>';
                    }
                    else if ($_GET['error'] == "invaliduid") {
                        echo '<p class="signuperror">Ugyldigt brugernavn!</p>';
                    }
                    else if ($_GET['error'] == "invalidmail") {
                        echo '<p class="signuperror">Ugyldigt mail!</p>';
                    }
                    else if ($_GET['error'] == "passwordcheck") {
                        echo '<p class="signuperror">Koderordet matcher ikke!</p>';
                    }
                    else if ($_GET['error'] == "usertaken") {
                        echo '<p class="signuperror">Brugernavn allerede taget</p>';
                    }
                }
                else if ($_GET['signup'] == "success") {
                    echo '<p class="succesMsg">BRUGER OPRETTET!</p>'; 
                }
           ?>
            <!-- Error handlers SLUT -->
            
            <!-- Form START -->
            <form action="includes/signup.inc.php" method="post">
                <div class="input-group mt-4">
                    <span>
                        <i class="fas fa-user"></i>
                        <input type="text" class="form-control" name="uid" placeholder="Brugernavn">
                    </span>
                </div>
                <div class="input-group mt-3">
                    <span>
                        <i class="fas fa-envelope"></i>
                        <input type="text" class="form-control" name="mail" placeholder="E-mail">
                    </span>
                </div>
                <div class="input-group mt-3">
                    <span>
                        <i class="fas fa-key"></i>
                        <input type="password" class="form-control" name="pwd" placeholder="Kodeord">
                    </span>
                </div>
                <div class="input-group mt-3 mb-3">
                    <span>
                        <i class="fas fa-key"></i>
                    <input type="password" class="form-control" name="pwd-repeat" placeholder="Gentag kodeord">
                    </span>
                </div>
                <button type="submit" class="createUser" name="signup-submit" class="btn btn-primary">OPRET</button>
                <p class="text-center ikkeBruger mt-4">ALLEREDE BRUGER?<span><a href="index.php"> LOG IND HER</span></p>
            </form>
            <!-- Form SLUT -->
        </div>
    </div>
</div>
</main>

<!-- Opret bruger SLUT -->


<?php 
    require "footer.php";
?>    