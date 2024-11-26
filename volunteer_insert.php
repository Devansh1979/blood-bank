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
 

 <?php
 $varnm="";

 $varLoginId="";

  include "connection.php";
  include "function.php";
 
 if(isset($_POST['btnsub']))
 {
 
 $varname=$_POST['txtname'];
 $varPassword=random_password(8);
 $varLogin_id=$_POST['txtid'];
 
 
 $sqlchk="SELECT * FROM volunteer_registration where Login_id='".$varLogin_id."'";
 
    $result=mysqli_query($con,$sqlchk);
    $rowcount= mysqli_num_rows($result);
    if($rowcount==0)
    {
 

 $sqlins="INSERT INTO volunteer_registration
(Name,Password,Login_id)
 VALUES('$varname','$varPassword','$varLogin_id')";
 
if(!mysqli_query($con, $sqlins))
       {
          die('error:'.mysqli_error($con));
       }
       //echo"1 record added";
         else
          {

$msg1= " Hello $varname,\n\n Welcome to Life Care Blood Bank  ,\n\nYour login Id is : $varLogin_id   \n\nYour login Password is : $varPassword  ";
email_send($varLogin_id," Your Password for Life Care Blood Bank Login", $msg1);



 header('location:vol_login.php');
 }
 
  } 

   
     else
   {
 echo "<h3> $varLogin_id in allready in use . Try another one !!!";
 } 
 }
 ?>
 <section class="home-slider owl-carousel">
      <div class="slider-item bread-item" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container" data-scrollax-parent="true">
          <div class="row slider-text align-items-end">
            <div class="col-md-7 col-sm-12 ftco-animate mb-5">
              <p class="breadcrumbs" data-scrollax=" properties: { translateY: '70%', opacity: 1.6}"><span class="mr-2"><a href="index.php">Home</a></span> <span>Volunteer_Registration  </span></p>
              <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">Volunteer_Registration </h1>
            </div>
          </div>
        </div>
      </div>
    </section>
 <div class="container div">
 <div class="row">
 <div class="col-sm-6"> 
 <h1>Volunteer_Registration</h1>
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
enctype="multipart/form-data" >

<div class="form-group">
<label for="txtuid">Name</label>
<input type="txtname" class="form-control" id="txtname" name="txtname"
  placeholder="Enter name">

</div>
<div class="form-group">
 <label for="txtpass">Password</label>
<small> Your System Genrated Password will be send to your given email id , So please provide us Verified Email ID </small>
 </div>
 <div class="form-group">
 <label for="txtid">Login_id</label>
 <input type="email" class="form-control" id="txtid" name="txtid" placeholder="abc@">
 </div>
<div >
 <div class="row">
<div class="col-sm-6">
 <button type="submit" name="btnsub" class="btn btn-block 
btn-primary">Submit</button> </div>
 
 <div class="col-sm-6">
<button type="reset" class="btn btn-block 
btn-danger">Cancel</button> </div>
 </div>
</div>
</form>
</div>
</div>
</div>
  <?php
 //   session_start();
 // ob_start();
 include 'footer.php';
 
?>



















