<!DOCTYPE html>
<html lang="en">
  <head>
    <title>LIFE CARE BLOOD BANK </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <?php
  session_start();
 ob_start();
 ?>

	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php"><span> LIFE CARE BLOOD BANK</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
	          <!-- <li class="nav-item"><a href="doctors.php" class="nav-link">Doctors</a></li> -->
	          
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
	          <?php 
	          			if(isset($_GET['log']))
	          			{
	          				unset($_SESSION['pid']);
	          				session_destroy();
                             
	          			}

	          			if(isset($_SESSION['pid']))
	          			{

	          				echo '
	          				<li class="nav-item"><a href="Requirement_insert.php" class="nav-link">Requirement request</a></li>
	          				<li class="nav-item"><a href="Feedback_insert.php" class="nav-link">Feedback </a></li>
	          				 <li class="nav-item"><a href="patient_profile.php" class="nav-link">Welcome <span class="text-primary" title="View Profile..">'.$_SESSION['pname'].'</span></a></li>
	          				  <li class="nav-item"><a href="ch_pass.php" class="nav-link">Change Password</a></li>
	          <li class="nav-item"><a href="index.php?log=out" class="nav-link">Sign out</a></li>';
	          			}
	          			else
	          			{
	          				echo '<li class="nav-item"><a href="login.php" class="nav-link">Sign in</a></li>
	          <li class="nav-item"><a href="registration.php" class="nav-link">Sign up</a></li>';

	          			}
	          ?>
	          
	         <!--  <li class="nav-item cta"><a href="contact.php" class="nav-link" data-toggle="modal" data-target="#modalRequest"><span>Make an Appointment</span></a></li> -->
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->