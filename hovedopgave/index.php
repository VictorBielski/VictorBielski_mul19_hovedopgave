<?php
session_start();
if(isset($_SESSION['userId'])){
      header('Location: ./dashboard/dashboard.index.php');
  }
?>

<?php 
    require "header.php";
?>

<!-- Login Formular start -->

<div class="container">
    <div class="row mt-5">
        <div class="col-sm-10 col-md-6 col-lg-6 loginCol" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
            <h3 class="text-center mb-4">LOG IND</h3>
            
            <!-- Error handlers START-->
            <?php 
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == "nouser") {
                        echo '<p class="signuperror">Brugernavn eller email ikke fundet! </p>';
                    }
                    else if ($_GET['error'] == "wrongpwd") {
                        echo '<p class="signuperror">Kodeordet matcher ikke brugernavn/e-mail!</p>';
                    }
                }
           ?>
           <!-- Error handlers START-->
           
           <!--Form start -->
            <form action="./includes/login.inc.php" method="post">
                <div class="input-group">
                    <span>
                        <i class="fas fa-user"></i>
                    <span>
                    <input class="form-control login-nav mr-sm-2" type="text" name="mailuid" placeholder="Brugernavn/Email...">
                </div>

                <div class="input-group">
                    <span>
                        <i class="fas fa-key"></i>
                    <input class="form-control login-nav mt-3 mb-2 mr-sm-2" type="password" name="pwd" placeholder="Password...">
                    </span>
                </div>

               <button class="btn logIn btn-outline-success" type="submit" name="login-submit">LOG IND</button>
               <p class="text-center ikkeBruger mt-4">IKKE BRUGER ENDNU?<span><a href="signup.php"> OPRET HER</span></p>
             </form>
             <!--Form slut -->
        </div>
    </div>
</div>
</div>

<!-- Login Formular start -->

<?php 
    require "footer.php";
?>    