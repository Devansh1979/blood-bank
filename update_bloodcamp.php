 <!-- <!DOCTYPE html>
<html lang="en">
 <head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BloodCamp Updation</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="css/bootstrap.min.css">
 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script> -->
  <?php
 //   session_start();
 // ob_start();
 include 'header.php';
 
?>
 </head>
 
 <body>
 
 <?php 
 include "connection.php";
 $var_id="";
$varCamp_title="";
 $varCamp_date="";
 $varCamp_city="";
 $varCamp_address="";
 $varNo_of_beds="";
 $varDoctor_name="";
 
 if(isset($_GET['id']))
 {
    
 

 $sql1= "SELECT * FROM bloodcamp where Camp_id='$_GET[id]'";
 $result = mysqli_query($con,$sql1);
 while($row = mysqli_fetch_array($result))
 {
   $var_id=$row['Camp_id'];
   $varCamp_title=$row['Camp_title'];
   $varCamp_date=$row['Camp_date'];
   $varCamp_city=$row['Camp_city'];
   $varCamp_address=$row['Camp_address'];
   $varNo_of_beds=$row['No_of_beds'];
   $varDoctor_name=$row['Doctor_name'];
 
}
 }
 if(isset($_POST['btnsub']))
 {


   $sqlupd="update bloodcamp set 
Camp_title='$_POST[txtname]',Camp_date='$_POST[date]',Camp_city='$_POST[txtcamp]',Camp_address='$_POST[txtaddress]',No_of_beds='$_POST[txtbednum]',Doctor_name='$_POST[txtdocnm]'where 
Camp_id='$_POST[txtid]'";
 if (!mysqli_query($con,$sqlupd))
 {
 die('Error: ' . mysqli_error($con));
 }
 echo "1 record added";
  header('location:bloodcamp_view.php');
 
 //mysqli_close($con);
 
 }
  ?>
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
enctype="multipart/form-data">
 <div class="container">
 <div class="row">
   <div class="col-sm-6">
    <h1> bloodcamp Creation </h1> 
 
</div>
</div>
 

  

<div class="form-group">
<label for="txtuid">Camp_title</label>
<input type="txtname" class="form-control" id="txtname" name="txtname"
  placeholder="Enter Camp title " value="<?php echo $varCamp_title; ?>" >
  <input type="hidden" class="form-control" id="txtid" name="txtid"
  placeholder="Enter Camp title " value="<?php echo $var_id; ?>" >

</div>
<div class="form-group">
<label for="txtuid">Camp_date</label>
<input type="date" class="form-control" id="date" name="date"
  placeholder="Enter Camp date" value="<?php echo $varCamp_date; ?>" >

</div>
<div class="form-group">
<label for="text">Camp_city</label>
<input type="txt" class="form-control" id="txtcity" name="txtcamp"
  placeholder="Enter camp city" value="<?php echo $varCamp_city; ?>" >

</div>
<div class="form-group">
<label for="txtaddress">Camp_address</label>
<div class="form-group">


 <textarea class="form-control" id="textaddress" name="txtaddress" rows="3" cols="8" > <?php echo $varCamp_address; ?>
 
  </textarea>
 </div>
</div>
<div class="form-group">
<label for="txtuid">No_of_beds</label>
<input type="text" class="form-control" id="txtbednum" name="txtbednum"
  placeholder="Enter number of beds" value="<?php echo $varNo_of_beds; ?>" >

</div>
<div class="form-group">
<label for="txtuid">Doctor_name</label>
<input type="text" class="form-control" id="txtdocnm" name="txtdocnm"
  placeholder="Enter doctor name" value="<?php echo $varDoctor_name; ?>" >

</div>
 </div>
 
 <div class="row">
 <div class="col-sm-6">
<button type="submit" name="btnsub" class="btn btn-block 
btn-primary">Update</button> </div>
 <div class="col-sm-6">
 <button type="reset" class="btn btn-block 
btn-danger">View</button> 
</div>
</div>
</form>
<!-- </body>
</html> -->
 <?php
 //   session_start();
 // ob_start();
 include 'footer.php';
 
?>



 