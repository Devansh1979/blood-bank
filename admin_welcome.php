<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,600;0,700;1,300&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
		*
		{
			margin: 0;
			padding: 0;
			font-family: 'Josefin Sans', sans-serif;
			color: black;
			box-sizing: border-box;
		}
	 /* Make the image fully responsive */
	 .carousel-inner img 
	 {
	 	width: 100%;
	 	height: 100%;
	 	
	 }
	 #frames
	 {
	 	height: 1000px;
	 	width: 100%;
	 }
	 body{
	 	background-image: url(images/blood-group.jpeg);
	 	background-size: 1500px;
	 	height: 1000px;
	 	background-repeat: no-repeat;
	 }
	</style>
   
</head>
<body>

 <?php
       session_start();
   
       if(isset($_POST['btn3']))
       {
       	unset($_SESSION['adid']);
       	session_destroy();
       	header('location:index.php');
       }
       
       if(isset($_SESSION['uid']))
       {
            echo "<h5><font color='sky-blue'><i><b> WELCOME &nbsp;".$_SESSION['uname']."&nbsp; to our Website</b></i></font></h5>";
           
       }
       else
        echo "Invalid ";
    ?>
    <div class="container">
	<div class="row">
	
		<div class="col-sm-12">
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
				<br><br>
				<div class="form-group row">
					<div class=" col-sm-12 text-right">
						<button  type="submit" name="btn3" class="btn btn-info col-sm-1" style="height: 110%;">Logout</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- navigation bar -->
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="#">LIFE CARE BLOOD BANK</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#thetarget" aria-controls="thetarget" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="col-sm-3 collapse navbar-collapse" id="thetarget">
				<ul class="navbar-nav ml-auto navbar-light bg-dark">

						<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">Insert Forms
						</a>
		<div class="dropdown-menu" aria-labelledby="navbarDropdown">
		<a class="dropdown-item" href="Person_form_insert.php" target="myframe">BLOOD GROUP</a>
		<a class="dropdown-item" href="bloodextract_insert.php" target="myframe">BLOOD EXTRACT</a>
							<a class="dropdown-item" href="bloodcamp_insert.php" target="myframe">BLOOD CAMP</a>
							<!-- <a class="dropdown-item" href="blood_bank_insert.php" target="myframe">BLOOD BANK</a> -->
							<a class="dropdown-item" href="req_view_admin.php" target="myframe">REQUEST CONFIRMATION</a>
							<!-- <a class="dropdown-item" href="volpro.php" target="myframe">VOLUNTEER PROFILE</a> -->
							<!-- <a class="dropdown-item" href="vol_medi_insert.php" target="myframe">VOLUNTEER MEDICAL REPORT</a>
							<a class="dropdown-item" href="bloodbank_particip_insert.php" target="myframe">BLOODBANK PARTICIPATION</a> -->
							<!-- <a class="dropdown-item" href="Inventory_insert.php" target="myframe">INVENTORY</a> -->
							<!-- <a class="dropdown-item" href="Patient.php" target="myframe">PATIENT REGISTRATION</a> -->
							<!-- <a class="dropdown-item" href="requirement_insert.php" target="myframe">REQUIREMENT REQUEST</a>
							<a class="dropdown-item" href="feedback_insert.php" target="myframe">FEEDBACK</a> -->
							
							
							
					
						</div>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">VIEWS
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="view2.php" target="myframe">BLOOD GROUP</a>
							<a class="dropdown-item" href="extract_view.php" target="myframe">BLOOD EXTRACT </a>
			                    <a class="dropdown-item" href="bloodcamp_view.php" target="myframe">BLOOD CAMP </a>
                                   <a class="dropdown-item" href="vol_medi_view.php" target="myframe">VOLUNTEER MEDICAL REPORT </a>
							<a class="dropdown-item" href="view_bloodpartic.php" target="myframe">BLOODBANK PARTICIPATION </a>
							<a class="dropdown-item" href="inventory_view.php" target="myframe">INVENTORY</a>
							<a class="dropdown-item" href="req_view.php" target="myframe">REQUIREMENT REQUEST </a>
							<a class="dropdown-item" href="feedback_view.php" target="myframe">FEEDBACK </a>
							
							
						</div>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">UPDATE
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="update_bloodgroup.php" target="myframe"> BLOOD GROUP </a>
							<a class="dropdown-item" href="extract_update.php" target="myframe"> BLOOD EXTRACT </a>
							<a class="dropdown-item" href="update_bloodcamp.php" target="myframe"> BLOOD CAMP </a>
							<a class="dropdown-item" href="volprof_update.php" target="myframe"> VOLUNTEER PROFILE</a>
							<a class="dropdown-item" href="volmed_update.php" target="myframe"> VOLUNTEER MEDICAL REPORT </a>
							<a class="dropdown-item" href="bloodbank_particip_update.php" target="myframe"> BLOODBANK PARTICIPATION </a>
							<a class="dropdown-item" href="inventory_update.php" target="myframe"> INVENTORY </a>
							<a class="dropdown-item" href="req_update.php" target="myframe">REQUIREMENT REQUEST </a>
							<a class="dropdown-item" href="feedback_update.php" target="myframe">FEEDBACK </a>
							
							
							
						</div>
					</li>

				<form class="form-inline my-2 my-lg-0">
					<!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
				</form>
			</div>
		</nav>

		<!-- slider -->

	</header>
	<iframe name="myframe" title="category" id="frames">
</iframe>


	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>