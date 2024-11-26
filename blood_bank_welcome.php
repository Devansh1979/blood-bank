<?php

 include 'blood_bank_header.php';
?>

<section class="home-slider owl-carousel">
      <div class="slider-item bread-item" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container" data-scrollax-parent="true">
          <div class="row slider-text align-items-end">
            <div class="col-md-7 col-sm-12 ftco-animate mb-5">
              <p class="breadcrumbs" data-scrollax=" properties: { translateY: '70%', opacity: 1.6}"><span class="mr-2"><a href="index.php">Home</a></span> <span>Bloodbank Dashboard</span></p>
              <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">Bloodbank Dashboard</h1>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php 
$varnm="";
 if(isset($_SESSION['bid']))
 {
    $varnm= $_SESSION['bname'];
 }

?>

<h1>Hello <?php echo $varnm; ?> </h1>


 <?php
 include 'footer.php';
?>