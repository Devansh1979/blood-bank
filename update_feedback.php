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
 
 <?php 
 include "connection.php";
 $varmessage="";
 
 
 if(isset($_GET['id']))
 {
 $sql1= "SELECT * FROM feedback where id='$_GET[id]'";
 $result = mysqli_query($con,$sql1);
 while($row = mysqli_fetch_array($result))
 {
  $varmessage=$row['txtmessage'];
}
 }
 if(isset($_POST['btnsub']))
 {


echo $sqlupd="update feedback set 
message='$_POST[txtmessage]' where 
Patientid='$_POST[txtid]'";
 if (!mysqli_query($con,$sqlupd))
 {
 die('Error: ' . mysqli_error($con));
 }
 echo "1 record added";
  header('location:view2.php');
 
 mysqli_close($con);
 
 }
  ?>
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
enctype="multipart/form-data">
 <div class="container">
 <div class="row">
   <div class="col-sm-6">
 
 <h1> Feedback Form </h1>
</div>
</div>
 <div class="row form-group">
 
 <div class="col-sm-4">
 <label for="txtmessage"> Message</label>
 <div class="form-group">
 
 <textarea class="form-control" id="txtmessage" name="txtmessage" rows="4" >
  </textarea>
 </div>

 <div class="col-sm-8">
 <input type="hidden" id="txtmessage" name="txtmessage" value="<?php echo $varid; ?>" />
 <input type="textmessage" class="form-control" id="txtmessage" name="txtmessage">
  
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
</div>
</form>
</body>
</html>