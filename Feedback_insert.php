<!-- <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>New Person Creation</title>
<link rel="stylesheet" href="css/bootstrap.min.css" >
<link rel="stylesheet" href="css/bootstrap-theme.min.css" i>
 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js" ></script> -->
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
 //session_start();
 //ob_start();
 $varPatient_id="";
 $varmessage="";
 if(isset($_SESSION['pid']))
{
    $varPatient_id=$_SESSION['pid'];
}

  if(isset($_POST['btnsub']))
 {
  $varPatient_id=$_POST['txtid'];
 
 $varmessage=$_POST['txtmessage'];

 
 include "connection.php";

echo $sqlins="INSERT INTO feedback(Patientid,Message) VALUES('$varPatient_id','$varmessage')";
 
if(mysqli_query($con,$sqlins))
 {
 echo "1 record added";
 
 }
 
 
mysqli_close($con); 
 }
 ?>
 <section class="home-slider owl-carousel">
      <div class="slider-item bread-item" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container" data-scrollax-parent="true">
          <div class="row slider-text align-items-end">
            <div class="col-md-7 col-sm-12 ftco-animate mb-5">
              <p class="breadcrumbs" data-scrollax=" properties: { translateY: '70%', opacity: 1.6}"><span class="mr-2"><a href="index.php">Home</a></span> <span>Feedback  </span></p>
              <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', pacity: .9}">Feedback</h1>
            </div>
          </div>
        </div>
      </div>
    </section>
 <div class="container ">
 <div class="row">
   <div class="col-sm-3"> </div>

 <div class="col-sm-6 required div"> 
 <h1 style="color:white; " align="center"><i>FEEDBACK FORM</i> </h1>
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >

<div class="form-group">
  <input type="hidden" class="form-control" id="txtid" name="txtid" value="<?php echo $varPatient_id;?>" readonly>
<label for="txtmessage">Message</label>
<div class="form-group">
 
 <textarea class="form-control" id="txtmessage" name="txtmessage" rows="4" >
  </textarea>
 </div>



 
 
 <div >
 <div class="row">
<div class="col-sm-6">
 <button type="submit" name="btnsub" class="btn btn-block btn-primary">Submit</button> </div>
 
 <div class="col-sm-6">
<button type="reset" class="btn btn-block 
btn-danger"><a href="feedback_view.php">View</a></button> </div>
</div>
</div>
</div>
</form>
</div>
 <div class="col-sm-3"> </div>

</div>
</div>
<!-- </body>
</html> -->
 <?php
 //   session_start();
 // ob_start();
 include 'footer.php';
 
?>
