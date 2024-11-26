 <!DOCTYPE html>
<html lang="en">
 <head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bloodgroup Updation</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="css/bootstrap.min.css">
 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 </head>
 
 <body>
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
 include "connection.php";
 $varnm="";
 $varType="";
 $varid="";
 
 if(isset($_GET['Groupid']))
 {
 $sql1= "SELECT * FROM bloodgroup where Groupid='$_GET[Groupid]'";
 $result = mysqli_query($con,$sql1);
 while($row = mysqli_fetch_array($result))
 {
  $varnm=$row['Name'];
$varType= $row['Type'];
$varid=$row['Groupid'];
}
 }
 if(isset($_POST['btnsub']))
 {


echo $sqlupd="update bloodgroup set 
Name='$_POST[txtname]',Type='$_POST[rbType]' where 
Groupid='$_POST[txtid]'";
 if (!mysqli_query($con,$sqlupd))
 {
 die('Error: ' . mysqli_error($con));
 }
 echo "1 record added";
  header('location:view2.php');
 
 //mysqli_close($con);
 
 }
  ?>
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
enctype="multipart/form-data">
 <div class="container">
 <div class="row">
   <div class="col-sm-6">
 
 <h1> Bloodgroup Creation  </h1>
</div>
</div>
 <div class="row form-group">
 
 <div class="col-sm-4">
 <label for="txtname"> Name</label>
 </div>
 <div class="col-sm-8">
 <input type="hidden" id="txtid" name="txtid" value="<?php echo $varid; ?>" />
 <input type="text" class="form-control" id="txtname" name="txtname"
 placeholder="Enter blood Name" value="<?php echo $varnm; ?>" >
 </div>
 </div>
 
 <fieldset class="form-group">
 <legend>Type</legend>
 <div class="form-check">
 <label class="form-check-label">
 <input type="radio" class="form-check-input" name="rbType" id="rbUniversalacceptor" 
 value="universalacceptor" <?php if($varType=="universalacceptor") echo "checked"; ?> >
 Universal Acceptor
 </label>
</div>
 <div class="form-check">
 <label class="form-check-label">
 <input type="radio" class="form-check-input" name="rbType" id="rbUniversaldonor" 
value="universaldonor" <?php if($varType=="universaldonor") echo "checked"; ?>>
Universal Donor
 </label>
 </div>
 <div class="form-check">
 <label class="form-check-label">
 <input type="radio" class="form-check-input" name="rbType" id="rbOther" 
value="other" <?php if($varType=="other") echo "checked"; ?>>
Other
 </label>
 </div>
 
 </fieldset> 



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
</body>
</html>