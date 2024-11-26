<!DOCTYPE html>
<html lang="en">
 <head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bloodbank Participation Updation</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="css/bootstrap.min.css">
 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 </head>
 
 <body>
 
 <?php 
 include "connection.php";
 $varCamp_id="";
 $varDate="";
 $varTime="";
  if(isset($_GET['Participation_id']))
 {  
    
   $sql1= "select * from bloodbankparticipation where Id='$_GET[Participation_id]'";
 $result = mysqli_query($con,$sql1);
 while($row = mysqli_fetch_array($result))
 {
  $varCamp_id=$row['Camp_id'];
 $varDate=$row['Date'];
 $varTime=$row['Time'];
 
 }
 }
 if(isset($_POST['btnsub']))
 {


echo $sqlupd="update bloodbankparticipation set
Camp_id='$_POST[txtCamp_id]',
Date='$_POST[Date]',
Time='$_POST[Time]';
where id='$_POST[txtParticipation_id]'";
 if (!mysqli_query($con,$sqlupd))
 {
 die('Error: ' . mysqli_error($con));
 }
 echo "1 record added";
  header('location:view_bloodbankpartic.php');
 
 // mysqli_close($con);
 
 }
  ?>
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
enctype="multipart/form-data">
 <div class="container">
 <div class="row">
   <div class="col-sm-6">
 
 <h1> Bloodbank Participation updation </h1>
</div>
</div>
 <div class="form-group">
 <label for="ddlCamp_id">Camp_id</label>
 <div> </div><select name="ddlCamp_id" id="ddlCamp_id">
    <option value="-1">   -----select Camp_id------</option>
    <option value="0"> Camp_id </option>
    
    <?php
   $sqlparent="select * from bloodbankparticipation";
   $result= mysqli_query($con,$sqlparent)
   while($row=mysqli_fetch_array($result))
   {
      //echo $row['id']."=====".$main;
      echo"<option value='".$row['Camp_id'];
      if($varCamp_id==$row['Camp_id'])
      {
         echo "' selected>";
      }
      else
      {
         echo"'>";
      }
      echo $row['Camp_id']."</option>";
   }
   ?>  
 </select>
</div>
<div class="form-group">
 <div class="col-sm-4">
 <label for="Date">Date</label>
 </div>
<div class="col-sm-8">
 <input type="Date" class="form-control" id="Date" name="Date"
 placeholder="EnterDate"  value="<?php echo $varDate; ?>">
  <input type="hidden" class="form-control" id="Date" name="Date">

 </div></div>
 
 <div class="form-group">
 <label for="Time">Time</label>
 <input type="Time" class="form-control"Camp_id="txtCamp_id" name="Time"
  placeholder="Enter Time" value="<?php echo $varTime; ?>">

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
</body>
</html>
