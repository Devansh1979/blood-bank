<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>New Person Creation</title>
<link rel="stylesheet" href="css/bootstrap.min.css" >
<link rel="stylesheet" href="css/bootstrap-theme.min.css" i>
 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js" ></script>
 
<style>
 
 

.div{
        font-family: monospace;
        margin-top: 100px;
        margin-bottom: 100px;
        box-shadow: -1px 4px 26px 11px rgba(0, 0, 0, 0.5);
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
 </head>

 <body>
 
 
 <?php
 $varnm="";
 $varType="";
 $varstatus="";
 $varcreation_date="";




 
 
 if(isset($_POST['btnsub']))
 {
 
 $varnm=$_POST['txtname'];
 $varType= $_POST['optionsRadios1'];

$varstatus="";
$dt=date("y:m:d h:i:s");

 
 
 include "connection.php";

 $sqlins="INSERT INTO bloodgroup
(Name,Type,Status,Creationdate)
 VALUES('$varnm','$varType','1','$dt')";
 
if (mysqli_query($con,$sqlins))
 {
 echo "1 record added";
 
 }
 
 
mysqli_close($con); 
 }
 ?>
 <div class="container-fluid">
 <div class="row">
 <div class="col-sm-3"> 
 </div>
 <div class="col-sm-6 required div">
  


 <h1>Blood Group </h1>
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
enctype="multipart/form-data" >

<div class="form-group">
<label for="txtuid">Name</label>
<input type="txtname" class="form-control" id="txtname" name="txtname"
  placeholder="eg.  AB+ etc.">

</div>
<fielsdet class="form-group">
    <legend>Type</legend>
 <div class="col-sm-4 form-check">
 <label for="form-check-label">
 <input type="radio" class="form-check-input" id="optionsRadios" name="optionsRadios1" value="universalacceptor">Universal Acceptor
</label>
 </div>
 <div class="col-sm-4 form-check">
 <label for="form-check-label">
 <input type="radio" class="form-check-input" id="optionsRadios" name="optionsRadios1" value="universaldonor">Universal Donor
</label>
 </div>
 <div class="col-sm-4 form-check">
 <label for="form-check-label">
 <input type="radio" class="form-check-input" id="optionsRadios" name="optionsRadios1" value="other">Other
</label>
 </div>
</fielsdet>
 
 
 <div >
 <div class="row">
<div class="col-sm-6">
 <button type="submit" name="btnsub" class="btn btn-block 
btn-primary">Submit</button> </div>
 
 <div class="col-sm-6">
<button type="reset" class="btn btn-block 
btn-danger"><a href="view2.php">View</a></button> </div>
</div>
</div>
</form>
</div>
</div>
</div>
</body>
</html>

