<!DOCTYPE html>
<html lang="en">
 <head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Volunteerprofile Updation</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="css/bootstrap.min.css">
 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 </head>
 
 <body>
 
 <?php 
 include "connection.php";
 
 $varName="";
 $varEmail="";
 $varPhno="";
 $varAddress="";
 $varBloodgroup="";
 $varAge="";
 $varGender="";
 $varimg1="";
if(isset($_GET['Loginid']))
 {
  echo $sql1= "select * from volunteerprofile where Id='$_GET[LoginId]'";
 $result = mysqli_query($con,$sql1);
 while($row = mysqli_fetch_array($result))
 {
  $varLoginId=$row['LoginId'];
 $varName=$row['Name'];
 $varEmail=$row['Email'];
 $varPhno=$row['Phno'];
 $varAddress=$row['Address'];
 $varBloodgroup=$row['Bloodgroup'];
 $varAge=$row['Age'];
 $varGender=$row['Gender'];
 $varimg1=$row['FileURL'];
 
 }
 }
 if(isset($_POST['btnsub']))
 {
  if(isset($_FILES['img']) && !empty($_FILES['img']['name']))
  {
    
  move_uploaded_file($_FILES['img']['tmp_name'],$_FILES['img']['name']);
  $varimg2=$_FILES['img']['name'];
  }
  else
  {
    $varimg2= $_POST['txtimg'];
  }

echo $sqlupd="update volunteerprofile set Name='$_POST[textname]',
Email='$_POST[textmail]',
Phno='$_POST[textPhno]',
Address='$_POST[textaddress]',
Bloodgroup='$_POST[ddlBloodgroup]',
Age='$_POST[textage]',
Gender='$_POST[optionsRadios1]',
FileURL='$varimg2'

where 
LoginId='$_POST[txtLoginId]'";
 if (!mysqli_query($con,$sqlupd))
 {
 die('Error: ' . mysqli_error($con));
 }
 echo "1 record added";
// header('location:extract_view.php');
 
mysqli_close($con);
 
 }
  ?>
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
enctype="multipart/form-data">
 <div class="container">
 <div class="row">
   <div class="col-sm-6">
 
 <h1> Volunteerprofile updation  </h1>
</div>
</div>
 <!-- <div class="form-group">
 <label for="ddlGroupid">Groupid</label>
 <div> </div><select name="ddlGroupid" id="ddlGroupid">
    <option value="-1">   -----select Groupid------</option>
    <option value="0"> Group Id </option>
    
    <?php
    $sqlparent="select * from bloodextract";
   $result= mysqli_query($con,$sqlparent);
   while($row=mysqli_fetch_array($result))
   {
      //echo $row['id']."=====".$main;
      echo"<option value='".$row['Groupid'];
      if($varGroupid==$row['Groupid'])
      {
         echo "' selected>";
      }
      else
      {
         echo"'>";
      }
      echo $row['Groupid']."</option>";
   }
   ?>  
 </select>
</div> -->
<div class="form-group">
 <div class="col-sm-4">
 <label for="txtname">Name</label>
 </div>
<div class="col-sm-8">
 <input type="text" class="form-control" id="textname" name="textname"
 placeholder="EnterName"  value="<?php echo $varName; ?>">
  

 </div>
 </div>
 <div class="form-group">
 <label for="txtname">Email</label>
 <input type="email" class="form-control" id="textmail" name="textmail"
  placeholder="Enter Email" value="<?php echo $varEmail; ?>">

 </div>
 <div class="form-group">
 <label for="txtname">Phno</label>
 <input type="text" class="form-control" id="textPhno"  name="textPhno"
  placeholder="Enter Phone Number" value="<?php echo $varPhno; ?>">

 </div>
 <div class="form-group">
<label for="textaddress">Address</label>
<div class="form-group">
  <input type="hidden"  id="textaddress" name="textaddress"> <?php echo $varAddress; ?>

 <textarea class="form-control" id="textaddress" name="txtaddress" rows="3" cols="8" > <?php echo $varAddress;?>
 
  </textarea>
 </div>
</div>
<div class="form-group">
 <label for="ddlBloodgroup">Bloodgroup</label>
 <select name="ddlBloodgroup" id="ddlBloodgroup">
    <option value="negative">-ve</option>
    <option value="positive">+ve</option>   
 </select>


 

 </div >





 <div class="form-group">
 <label for="textname">Age</label>
 <input type="text" class="form-control" id="textage" name="textage"
  placeholder="Enter Age" value="<?php echo $varAge; ?>">

 </div> 
 <fieldset class="form-group">
 <legend>Gender</legend>
 <div class="form-check">
 <label class="form-check-label">
 <input type="radio" class="form-check-input" name="rbGender" id="rbMale" value="Male"
 <?php if($varGender=="MALE") echo "checked"; ?> >
 Male
 </label>
</div>
 <div class="form-check">
 <label class="form-check-label">
 <input type="radio" class="form-check-input" name="rbGender" id="rbFemale" 
value="Female" <?php if($varGender=="Female") echo "checked"; ?>>
Female
 </label>
 </div>
 
 </fieldset>
 <div class="row form-group"> <div class="col-sm-3">
<label for="image">
Image</label> </div>
<div class="col-sm-6">

    <input type ="hidden" name="txtimg" value="<?php echo $varimg1; ?>"  />

    
<input type="file" class="form-control-file" name="img" id="image"/>
  <img src='<?php echo $varimg1;?>' width="100px" height="100px"/></td>
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
</body>
</html>
