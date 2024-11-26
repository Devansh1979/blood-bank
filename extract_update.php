<!DOCTYPE html>
<html lang="en">
 <head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bloodextract Updation</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="css/bootstrap.min.css">
 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 </head>
 
 <body><style>

 *
 

.div{
        font-family: monospace;
        margin-top: 100px;
        margin-bottom: 100px;
        box-shadow: -1px 4px 26px 11px rgba(0, 0, 0, 0.5);
        border-radius: 20px;
        padding: 50px;
        color: blacksmoke;
        background-color: rgba(0, 0, 0.4, 0);
    }
    body{
        background-image: url(images/Inv.jpeg);
        background-size: 2000px;
        background-repeat: no-repeat;
        background-attachment: fixed;

    }
 </style>
 
 <?php 
 include "connection.php";
 $varGroupid="";
 $varExtract_Name="";
 $varQuantity_per_unit="";

 $varunit="";
 $varPrice_per_unit="";
 $varid="";


 
 if(isset($_GET['Groupid']))
 {
  $sql1= "select * from bloodextract where Id='$_GET[Groupid]'";
 $result = mysqli_query($con,$sql1);
 while($row = mysqli_fetch_array($result))
 {
   $varid=$row['Id'];
  $varGroupid=$row['Groupid'];
 $varExtract_Name=$row['ExtractName'];
 $varQuantity_per_unit=$row['Quantity_per_unit'];
 $varunit=$row['Unit'];
 $varPrice_per_unit=$row['Price_per_unit'];
 }
 
 }
 if(isset($_POST['btnsub']))
 {


echo $sqlupd="update bloodextract set Groupid='$_POST[ddlGroupid]',ExtractName='$_POST[txtexname]',
Quantity_per_unit='$_POST[quantity]',
Unit='$_POST[ddlunit]',
Price_per_unit='$_POST[txtppu]'
where 
Id='$_POST[txtid]'";
 if (!mysqli_query($con,$sqlupd))
 {
 die('Error: ' . mysqli_error($con));
 }
 echo "1 record added";
 header('location:extract_view.php');
 
 //mysqli_close($con);
 
 }
  ?>
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
enctype="multipart/form-data">
 <div class="container">
 <div class="row">
   <div class="col-sm-6">
 
 <h1> Bloodextract updation  </h1>
</div>
</div>
 <div class="form-group">
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
</div>
<div class="form-group">
 <div class="col-sm-4">
 <label for="txtname">ExtractName</label>
 </div>
<div class="col-sm-4">
 <input type="text" class="form-control" id="txtname" name="txtexname"
 placeholder="EnterExtractname"  value="<?php echo $varExtract_Name; ?>">
  <input type="hidden" class="form-control" id="txtid" name="txtid"  value="<?php echo $varid; ?>">

 </div>
 </div>
 <div class="form-group">
   <div class="col-sm-4">
 <label for="txtname">Quantity_per_unit</label>
 <input type="text" class="form-control" Groupid="txtGroupid" name="quantity"
  placeholder="EnterQuantity_per_unit" value="<?php echo $varQuantity_per_unit; ?>">
</div>
 </div>

 <div class="form-group">
   <div class="col-sm-4">
 <label for="ddlunit">Unit</label>
 <select name="ddlunit" id="ddlunit">
    <option value="gm">gm</option>
    <option value="ml">ml</option>   
 </select>

<div class="form-group">
   <div class="col-sm-8">
    <label for="txtname">Price_per_unit</label>
    
    <input type="text" class="form-control" Groupid="txtGroupid" name="txtppu"
    placeholder="Enter Price per unit" value="<?php echo $varPrice_per_unit; ?>">

</div>
    </div>

 </div>

 </div >

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