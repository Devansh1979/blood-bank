 <!-- <!DOCTYPE html>
 <html lang="en">
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Volunteer Medical Report Updation</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" >
  <link rel="stylesheet" href="css/bootstrap-theme.min.css" i>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js" ></script> -->
   <?php
 //   session_start();
 // ob_start();
 include 'volunteer_header.php';
 
?>
  <style type="text/css">
    .back{
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

     
</head>
<body>
  <?php
  include "connection.php";
  $varName="";
  $varReporttype="";
  $varimg1="";
  
  if(isset($_GET['id']))

 {

   $sql1="SELECT * FROM volmedicalrep where vol_id='$_GET[id]'";
     $result =mysqli_query($con,$sql1);
     while($row=mysqli_fetch_array($result))
     {
        $varid=$row['vol_id'];
       $varName=$row['Name'];
       $varReporttype=$row['Report_type'];
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

    $sqlupd="update volmedicalrep set 

    Name='$_POST[txtName]', Report_type='$_POST[ddlReport_type]', FileURL='$varimg2' where vol_id='$_POST[txtid]'";


    if (!mysqli_query($con,$sqlupd))
    {
     die('Error: ' . mysqli_error($con));
  }
  echo "1 record added";
  header('location:vol_medi_view.php');

 // mysqli_close($con);

}
?>
<section class="home-slider owl-carousel">
      <div class="slider-item bread-item" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container" data-scrollax-parent="true">
          <div class="row slider-text align-items-end">
            <div class="col-md-7 col-sm-12 ftco-animate mb-5">
              <p class="breadcrumbs" data-scrollax=" properties: { translateY: '70%', opacity: 1.6}"><span class="mr-2"><a href="index.php">Home</a></span> <span>Volunteer Medical Report  </span></p>
              <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', pacity: .9}">Volunteer Medical Report </h1>
            </div>
          </div>
        </div>
      </div>
    </section>
<div class="container back">
  <div class="row">


    <div class="col-sm-12">
      
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
         enctype="multipart/form-data" > <div class="container">
 <div class="row">
   <div class="col-sm-12">
 
 <h1 align="center"> Volunteer Medical Report</h1>
</div>
</div>
 <div class="row form-group">
 
 <div class="col-sm-1">
 <label for="txtName"> Name</label>
 </div>
 <div class="col-sm-6">
 <input type="hidden" id="txtid" name="txtid" value="<?php echo $varid; ?>" />
 <input type="text" class="form-control" id="txtName" name="txtName"
 placeholder="Enter blood Name" value="<?php echo $varName; ?>" >
 </div>
 </div>
     <div class="row form-group">
       <div class="col-sm-8">
       

    <label for="ddlReport_type">Report_type</label>
    <select name="ddlReport_type" id="ddlReport_type" class="form-control" >
    <option value="BP">BP</option>
    <option value="CBC">CBC</option> 
    <option value="DIABETES">DIABETES</option>  
    </select></div></div>
<div class="row form-group"> 
  <div class="col-sm-1">
<label for="image">Image</label> </div>
<div class="col-sm-6">
    <input type ="hidden" name="txtimg" value="<?php echo $varimg1; ?>"  />

    
<input type="file" class="form-control-file" name="img" id="image"/>
  <img src='<?php echo $varimg1;?>' width="100px" height="100px"/></td>
    </div>
</div>

   


<div class="row">
  <div class="col-sm-6">
    <button type="update" name="btnsub" class="btn btn-block 
    btn-primary">Update</button> </div> 
    <div class="col-sm-6">
      <button type="reset" class="btn btn-block 
      btn-danger"><a href="vol_medi_view.php">Cancel</a></button> 
    </div>
  </div>
</div>
</form>
</div>
</div>
</div>
<!-- </body>
</html>
 -->
  <?php
 //   session_start();
 // ob_start();
 include 'footer.php';
 
?>
