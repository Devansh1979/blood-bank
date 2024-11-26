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
	      <a class="navbar-brand" href="#"><span> LIFE CARE BLOOD BANK</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	    
	          <!-- <li class="nav-item"><a href="blood_bank_insert.php" class="nav-link">Blood bank</a></li>
	          <li class="nav-item"><a href="blood_bank_login.php" class="nav-link">Blood bank</a></li> -->
	          <li class="nav-item"><a href="inventory_insert.php" class="nav-link">Inventory</a></li>
	          <li class="nav-item"><a href="bloodcamp_insert.php" class="nav-link">Blood Camp</a></li>
	        </li>
	          <?php 
	          			if(isset($_GET['log']))
	          			{
	          				unset($_SESSION['bid']);
	          				session_destroy();

	          			}

	          			if(isset($_SESSION['bid']))
	          			{

	          				echo ' <li class="nav-item"><a href="patient_profile.php" class="nav-link">Welcome <span class="text-primary" title="View Profile..">'.$_SESSION['bname'].'</span></a></li>
	          <li class="nav-item"><a href="index.php?log=out" class="nav-link">Sign out</a></li>';
	          			}
	          			else
	          			{
	          				echo '<li class="nav-item"><a href="login.php" class="nav-link">Sign in</a></li>
	          <li class="nav-item"><a href="registration.php" class="nav-link">Sign up</a></li>';

	          			}
	          ?>
	          
	         
	        </ul>
	      </div>
	    </div>
	  </nav>
