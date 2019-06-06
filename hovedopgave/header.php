<?php 
  session_start();
?>


<!doctype html>
<html lang="en">
  <head>
    <title></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <!-- Egne stylesheeets -->
    <link rel="stylesheet" href="/hovedopgave/style.css" type="text/css">
    <link rel="stylesheet" href="/hovedopgave/dashboard/dashboard.style.css" type="text/css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--Open Sans Font Loading -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <!--FontAwesome Ikoner -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <!-- AOS Animationer loading-->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

  </head>
  
  
  <body>
     
  <!--Navigation start-->      
  <div class="container-fluid navCon">
  <nav class="navbar navbar-expand">

  <?php if(isset($_SESSION['userId'])){
      echo '<a class="navbar-brand" href="/hovedopgave/dashboard/dashboard.index.php">
        <img class="logo" src="/hovedopgave/dashboard/img/nyt_logo.png" alt="">
      </a>';
  } else {
      echo '<a class="navbar-brand" href="/hovedopgave/index.php">
          <img class="logo" src="/hovedopgave/dashboard/img/nyt_logo.png" alt="">
      </a>';
  }
  
  ?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbar1" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbar1">
    <ul class="navbar-nav ml-auto">
        <?php 
          if(isset($_SESSION['userId'])) {
            echo '
            <li class="nav-item active">
            <a class="nav-link" href="/hovedopgave/dashboard/dashboard.all.php">ALLE DOKUMENTER <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
            <a class="nav-link" target="_blank" href="/hovedopgave/dashboard/dash.includes/brugermanual.pdf">MANUAL</a>
          </li>
            ';
          } else {
            echo '            <li class="nav-item">
            <a class="nav-link" target="_blank" href="/hovedopgave/dashboard/dash.includes/brugermanual.pdf">MANUAL</a>
          </li>';
          }
        ?>
    </ul>
      <?php 
             if (isset($_SESSION['userId'])) {
              echo '
              <form action="/hovedopgave/includes/logout.inc.php" class="logForm" method="post">
              <button class="btn logoutBtn btn-outline-success my-2 my-sm-0" type="submit" name="logout-submit">LOG UD</button>
            </form>';
             }
    ?>
  </div>
</nav>
  </div>
  
  <!--Navigation SLUT--> 

<!-- Egen JavaScript fil -->
<script src="/hovedopgave/script.js" crossorigin="anonymous"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<!--Bootstrap JS-->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!--jQuery Loading -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- AOS Loading -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>


<!--AOS Initializing -->
<script>
    AOS.init();
</script>
 
<!-- Dynamisk content til upload form -->
<script>
$(document).ready(function() {
    $('input[type="file"]').on("change", function() {
      let filenames = [];
      let files = document.getElementById("customFile").files;
      if (files.length > 1) {
        filenames.push("Total Files (" + files.length + ")");
      } else {
        for (let i in files) {
          if (files.hasOwnProperty(i)) {
            filenames.push(files[i].name);
          }
        }
      }
      $(this)
        .next(".custom-file-label")
        .html(filenames.join(","));
    });
  });
</script>