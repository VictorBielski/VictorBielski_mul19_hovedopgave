<?php 
    include "./../header.php";
?>

<?php 
session_start();
if(!isset($_SESSION['userId'])){
   header("Location: ../index.php");
}
?>

<main>

<!-- Dashboard introm start -->

<div class="container dashIntro">
    <div class="row">
        <div class="col-lg-10 col-md-10 col-sm-12 dashCol">
            <h3 class="text-center">FIND ELLER TILFØJ DOKUMENT</h3>
            <hr>
            <p class="text-center">Velkommen til Organize.it. Ønsker du at tilføje et dokument, skal du vælge boksen til venstre. Ønsker du at finde et allerede eksisterende dokument, skal du vælge boksen til højre.</p>
        </div>
    </div>
</div>

<!-- Dashboard introm slut -->


<!-- Tilføj eller slet start her -->
<div class="container options">
    <div class="row mt-1 justify-content-center">
        
        <!-- Tilføj card start her -->
        <div class="col-lg-5 col-md-5 col-sm-8 text-center" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
            <div class="cardFlip">
					<div class="flip">
						<div class="cardFront">
							<!-- front content -->
							<div class="card">
							  <img class="card-img-top" data-holder-rendered="true">
							  <div class="card-block">
                                <h5 class="card-title">UPLOAD DOKUMENT</h5>
                                <p class="card-text"></p>
							    <i class="fas fa-plus-circle"></i>
							  </div>
							</div>
						</div>
						<div class="cardBack flex-column d-flex">
							<!-- back content -->
							<div class="card">
							  <div class="card-block">
                                <div class="cardOverlay">
                                    <h5 class="card-title">UPLOAD DOKUMENT</h5>
                                    <i class="fas fa-plus-circle"></i>
							    </div>
                              </div>
                            </div>
                            <a href="upload.php" class="btn btn-primary mt-auto findBtn2">UPLOAD DOKUMENT</a>
						</div>
					</div>
				</div>
            </div>
        <!-- Tilføj card slut her -->
        
        <!-- Find card start her -->
        <div class="col-lg-5 col-md-5 col-sm-8 op2 text-center" data-aos="fade-right" data-aos-offset="400" data-aos-easing="ease-in-sine">
            <div class="cardFlip">
				<div class="flip">
					<div class="cardFront">
						<!-- front content -->
						<div class="card">
							<img class="card-img-top" data-holder-rendered="true">
							    <div class="card-block">
                                    <h5 class="card-title">FIND DOKUMENT</h5>
                                    <p class="card-text"></p>
							        <i class="fas fa-search"></i>
							  </div>
							</div>
						</div>
						<div class="cardBack flex-column d-flex">
							<!-- back content -->
							<div class="card">
							  <div class="card-block">
                                <div class="cardOverlay">
                                    <h5 class="card-title">FIND DOKUMENT</h5>
                                    <i class="fas fa-search"></i>
							    </div>
                              </div>
                            </div>
                            <a href="search.php" class="btn btn-primary findBtn">FIND DOKUMENT</a>
						</div>
					</div>
				</div>
            </div>
        </div>
        
        <!-- Find card start her -->
        
    </div>
</div>

<!-- Tilføj eller slet slutter her -->

</main>


<?php 
    require "../footer.php";
?>    