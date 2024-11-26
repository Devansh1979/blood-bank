<?php

include 'header.php';
?>
<style type="text/css">
  h3 {


    text-align: center;
    font-weight: 600;
  }
</style>
<section class="home-slider owl-carousel">
  <div class="slider-item bread-item" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container" data-scrollax-parent="true">
      <div class="row slider-text align-items-end">
        <div class="col-md-7 col-sm-12 ftco-animate mb-5">
          <p class="breadcrumbs" data-scrollax=" properties: { translateY: '70%', opacity: 1.6}"><span class="mr-2"><a href="index.php">Home</a></span> <span>Registration</span></p>
          <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">New Registration</h1>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="container-fluid ">
  <div class="row">
    <div class="col-sm-4 d-flex flex-column justify-content-center align-items-center   p2">
      <h3>Blood Bank Registration</h3>
      <a href="blood_bank_insert.php"> <img src="images/bloodbank.jpg" width="300px" height="300px" /> </a>
    </div>
    <div class="col-sm-4 d-flex flex-column justify-content-center align-items-center   p2">
      <h3>Volunteer Registration</h3>
      <a href="volunteer_insert.php"> <img src="images/bloodvolunteer.jpg" width="300px" height="300px" /> </a>
    </div>

    <div class="col-sm-4 d-flex flex-column justify-content-center align-items-center   p2">
      <h3>Patient Registration</h3>
      <a href="patient.php"> <img src="images/bloodpatient.jpeg" width="300px" height="300px" /> </a>
    </div>
  </div>
</div>
<?php
include 'footer.php';
?>