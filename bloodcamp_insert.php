<?php
 include 'blood_bank_header.php';
?>

  <style>
 *
 {
   margin: 0px;
   padding: 0px;
 }

.div{
        font-family: sans-serif;
        color: white-smoke;
        margin-top: 100px;
        margin-bottom: 100px;
        box-shadow: -1px 4px 26px 11px rgba(0, 0, 0.5, 0);
        border-radius: 20px;
        padding: 50px;
        color: white;
        background-color: rgba(0, 0, 0.4, 0);
    }
    body{
        background-image: url(images/feedb1.jpeg);
        background-size: 2000px;
        background-repeat: no-repeat;
        background-attachment: fixed;

    }
 </style>
 
 
 
 <?php 
 //session_start();
 $varCamp_title="";
 $varCamp_date="";
 $varCamp_city="";
 $varCamp_address="";
 $varNo_of_beds="";
 $varDoctor_name="";
 $varstatus="";
 $varcreation_date="";
 $varorganisedby="";
if(isset($_POST['btnsub']))
 {
   $varCamp_title=$_POST['txtname'];
   $varCamp_date=$_POST['date'];
   $varCamp_city=$_POST['txtcity'];
   $varCamp_address=$_POST['txtaddress'];
   $varNo_of_beds=$_POST['txtbednum'];
   $varDoctor_name=$_POST['txtdocnm'];
   if (isset($_SESSION['bid']))
    $varorganized_by=$_SESSION['bid'];
  else 
    $varorganized_by="Default";
    

   $varstatus="";
   $dt=date("y:m:d h:i:s");
  include "connection.php";

    $sqlins="INSERT INTO bloodcamp
 (Camp_title,Camp_date,Camp_city,Camp_address,No_of_beds,Doctor_name,Status,Creation_date,organized_by)
 VALUES('$varCamp_title','$varCamp_date','$varCamp_city','$varCamp_address','$varNo_of_beds','$varDoctor_name','1','$dt','$varorganized_by')";
 
if (mysqli_query($con,$sqlins))
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
              <p class="breadcrumbs" data-scrollax=" properties: { translateY: '70%', opacity: 1.6}"><span class="mr-2"><a href="index.php">Home</a></span> <span>Blood Bank Insert</span></p>
              <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">Blood Bank Insert</h1>
            </div>
          </div>
        </div>
      </div>
    </section>
 <div class="container required div">
 <div class="row">
 <div class="col-sm-6"> 

 <h1>Blood Camp </h1>
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

<div class="form-group">
<label for="txtuid">Camp_title</label>
<input type="txtname" class="form-control" id="txtname" name="txtname"
  placeholder="Enter Camp title ">

</div>
<div class="form-group">
<label for="txtuid">Camp_date</label>
<input type="date" class="form-control" id="date" name="date"
  placeholder="Enter Camp date">

</div>
<div class="form-group">
<label for="txt">Camp_city</label>
<input type="txt" class="form-control" id="txtcity" name="txtcity"
  placeholder="Enter camp city">

</div>
<div class="form-group">
<label for="txtaddress">Camp_address</label>

<div class="form-group">
 
 <textarea class="form-control" id="txtaddress" name="txtaddress" rows="3" >
  </textarea>
 </div>
</div>
<div class="form-group">
<label for="txtuid">No_of_beds</label>
<input type="text" class="form-control" id="txtbednum" name="txtbednum"
  placeholder="Enter number of beds">

</div>
<div class="form-group">
<label for="txtuid">Doctor_name</label>
<input type="textdocnm" class="form-control" id="txtdocnm" name="txtdocnm"
  placeholder="Enter doctor name">

</div>

 
 <div >
 <div class="row">
<div class="col-sm-6">
 <button type="submit" name="btnsub" class="btn btn-block 
btn-primary">Submit</button> </div>
 
 <div class="col-sm-6">
<button type="reset" class="btn btn-block 
btn-danger"><a href="bloodcamp_view.php">View</button> </div>
 </div>
 </div>
</form>
</div>
</div>
</div>
 <?php
 include 'footer.php';
?>