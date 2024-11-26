<!-- <!DOCTYPE html>
<html lang="en">
 <head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>FEEDBACK FORM</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="css/bootstrap.min.css">
 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>  -->
   <?php
 //   session_start();
 // ob_start();
 include 'header.php';
 
?>
 
 
 

<style>

    .div{
        margin-top: 100px;
        margin-bottom: 100px;
        box-shadow: -1px 4px 26px 11px rgba(0, 0, 0, 0.5);
        border-radius: 40px;
        padding: 50px;
        color: white;
        border: groove;
        background-color: rgba(0, 0, 0, 0.0);
    }
    body{
        background-image: url(images/feedback2.jpg);
        background-size: 2000px;
        background-repeat: no-repeat;
        background-attachment: fixed;

    }
 </style>
 </head>
 
 <body>
 
 <?php 
 include "connection.php";
 $varMessage="";
 $varid="";
 
 
 if(isset($_GET['id']))
 {
 $sql1= "SELECT * FROM feedback where id='$_GET[id]'";
 $result = mysqli_query($con,$sql1);
 while($row = mysqli_fetch_array($result))
 {
  $varMessage=$row['Message'];
 $varid=$row['id'];
 
 }
 }
 if(isset($_POST['btnsub']))
 {


 $sqlupd="update feedback set 

  Message='$_POST[txtMessage]'
    where 
    id='$_POST[txtid]'";
 if (!mysqli_query($con,$sqlupd))
 {
 die('Error: ' . mysqli_error($con));
 }
 echo "1 record added";
header('location:feedback_view.php');
 
 //mysqli_close($con);
 
 }
  ?>
  <section class="home-slider owl-carousel">
      <div class="slider-item bread-item" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container" data-scrollax-parent="true">
          <div class="row slider-text align-items-end">
            <div class="col-md-7 col-sm-12 ftco-animate mb-5">
              <p class="breadcrumbs" data-scrollax=" properties: { translateY: '70%', opacity: 1.6}"><span class="mr-2"><a href="index.php">Home</a></span> <span>Feedback update </span></p>
              <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">Feedback update </h1>
            </div>
          </div>
        </div>
      </div>
    </section>
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
enctype="multipart/form-data">
 <div class="container fluid div">
 <div class="row">
   <div class="col-sm-4">
 
 <h1>FEEDBACK FORM </h1>
</div>
</div>

<div class="form-group">
<label for="txtMessage">Message</label>
<div class="form-group" >
 <input type="hidden" id="txtid" name="txtid" value="<?php echo $varid; ?>" />
 <!--  <input type="hidden" id="txtid" name="txtid" >  -->
   <textarea class="form-control" id="txtMessage" name="txtMessage" rows="6" cols="8" ><?php echo $varMessage;?>
  </textarea>
 </div>
 

 </div>
 

 <div class="row">
 <div class="col-sm-6">
<button type="submit" name="btnsub" class="btn btn-block 
btn-primary">Update</button> </div>
 <div class="col-sm-6">
 <button type="reset" class="btn btn-block 
btn-danger">Cancel</button> </div>
 </div>
 </div>
 </form>
 <?php
 //   session_start();
 // ob_start();
 include 'footer.php';
 
?>
<!-- </body>
</html> -->