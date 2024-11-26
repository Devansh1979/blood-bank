<!DOCTYPE html>
 <html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Admin Creation</title>
 <link rel="stylesheet" href="css/bootstrap.min.css" >
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <style>
 *
 {
   margin: 0px;
   padding: 0px;
   }

.div{
   font-family: fantasy;
   font-size: medium;
   
   
   /*background-image: url('bbg.jpg');*/
   font-size: large;
   background-size: cover;
   background-position: cover ;
  
   box-shadow: -1px 4px 26px 11px rgba(0,0,0,0.5);
   border-radius: 20px;
   padding:10px;
   background-image: linear-gradient(0deg, lightblue 0%, lightpink 100% );
  margin-top: 100px;
    }
 </style>


</head>
 <body>
 
<?php
include 'connection.php';
$varadmin_id="";
$varfnm="";
$varlnm="";
$varlogin_id="";
$varpass="";
$varstatus="";
$varcreation_date="";


if(isset ($_POST['btn2']))
 {
 

 $varfnm=$_POST['txtname'];
 $varlnm=$_POST['lastname'];
 $varlogin_id=$_POST['txtid'];
 $varpass=$_POST['txtpass'];
 $varstatus="";
   $dt=date("y:m:d h:i:s");
 
$sqlchk="SELECT * FROM admin where LoginId= '".$varlogin_id."'";
 $result=mysqli_query($con,$sqlchk);
 $rowcount= mysqli_num_rows($result);
 if($rowcount==0)
{
move_uploaded_file($_FILES['img1']['tmp_name'],
"images/".$_FILES['img1']['name']);
 $img="images/".$_FILES['img1']['name'];

echo $sql="INSERT INTO 
admin(Firstname,Lastname,LoginId,Password,Status,creationdate)
Values( '$varfnm' ,  '$varlnm' ,'$varlogin_id' , '$varpass','1','$dt' )";
 if(!mysqli_query($con, $sql))
 {
 die('error:'.mysqli_error($con));
 }
 echo"1 record added";
 header("Location:login_creation.php");
 //mysqli_close($con);
 }
 else
 {
 echo "<h3> $varlogin_id in allready in use . Try another one !!!";
 }
 }
 ?>
 <div class="container-fluid ">
 	<div class="row ">
 <div class="col-sm-3">
 </div>
 <div class="col-sm-6 required div"> 
<span style="text-align: center;" > <h1> Admin Creation</h1></span>
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
enctype="multipart/form-data" >


 <div class="form-group">
 <label for="txtname">First_Name</label>
 <input type="text" class="form-control" id="txtname" name="txtname" placeholder="Enter 
First_Name" required="required">
 </div> 

  <div class="form-group">
 <label for="txtname">Last_Name</label>
 <input type="text" class="form-control" id="txtname" name="lastname" placeholder="Enter 
Last_Name" required="required">
 </div> 
 <div class="form-group">
 <label for="txtid">Login id</label>
 <input type="email" class="form-control" id="txtid" name="txtid" placeholder="abc@">
 </div>
 
 <div class="form-group">
 <label for="txtpass">Password</label>
<input type="password" class="form-control" data-toggle="password" id="txtpass"
name="txtpass" placeholder="Enter Password">
 </div>
  </fieldset>
 
 <div class="row">
 <div class="col-sm-4"></div>
   <div class="col-sm-4">

  <button type="submit" name="btn2"  class="btn btn-block btn-primary">Submit</button>
</div>
</div>
</form>
 </div>
 <div class="col-sm-4">

</div>
</form>
</div>
 </div>

 </body>
 </html>
