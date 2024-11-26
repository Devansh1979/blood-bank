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
  include 'blood_bank_header.php';

  ?>
  <style type="text/css">
    .back{

 
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
  include "connection.php";
  $varid="";
  $varblood_id="";
  $varBlood_group_id="";
  $varExtract_id="";
  $varUnit="";
  $varCamp_id="";
  
  if(isset($_GET['id'])  )

  {

   $sql1="SELECT * FROM inventory where Inv_id='$_GET[id]'";
   $result =mysqli_query($con,$sql1);
   while($row=mysqli_fetch_array($result))
   {
    $varid=$row['Inv_id'];
    $varblood_id=$row['blood_bank_id'];
    $varBlood_group_id=$row['blood_group_id'];
    $varExtract_id=$row['Extract_id'];
    $varunit=$row['Unit'];
    $varCamp_id=$row['Camp_id'];
    

  }
}
if(isset($_POST['btnsub']))
{


 $sqlupd="update inventory set 

  blood_bank_id ='$_POST[ddlblood_id]', blood_group_id='$_POST[ddlbloodgroup]', Extract_id='$_POST[ddlextract]', Unit='$_POST[textunit]',Camp_id='$_POST[ddlcamp_id]' where Inv_id='$_POST[txtid]'";


  if (!mysqli_query($con,$sqlupd))
  {
   die('Error: ' . mysqli_error($con));
 }
 echo "1 record added";
header('location:inventory_view.php');

 // mysqli_close($con);

}
?>
 <section class="home-slider owl-carousel">
      <div class="slider-item bread-item" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container" data-scrollax-parent="true">
          <div class="row slider-text align-items-end">
            <div class="col-md-7 col-sm-12 ftco-animate mb-5">
              <p class="breadcrumbs" data-scrollax=" properties: { translateY: '70%', opacity: 1.6}"><span class="mr-2"><a href="index.php">Home</a></span> <span>Feedback update </span></p>
              <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">Feedback update </h1>
            </div>
          </div>
        </div>
      </div>
    </section>
<div class="container back">
  <div class="row">


    <div class="col-sm-6">

      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
       enctype="multipart/form-data" > <div class="container">
 <!-- <div class="row">
   <div class="col-sm-6">
 <h1> Inventory Updation   </h1>
</div>
</div> -->

   <div class="col-sm-6"> 
     <h1>Inventory Updation</h1>
     <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
      enctype="multipart/form-data" >
    </div>
    <div class="form-group">
      <div class="col-sm-12">
       <label for="ddlbloodgroup">Blood group id</label>
       <input type="hidden"class="form-control" id="ddlblood_id" name="ddlblood_id" value="<?php echo $varblood_id;?>" readonly>
       <select name="ddlbloodgroup" class="form-control" onchange="get_extract(this.value)"  >
        <option value="-1"> -- Select Blood Group -- </option>
        <?php
        include "connection.php";
      $sqlparent="select * from bloodgroup";
        $result= mysqli_query($con, $sqlparent);
        while($row=mysqli_fetch_array($result))
           {
           
      echo"<option value='".$row['Groupid'];
      if($varBlood_group_id==$row['Groupid'])
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
</div>
<div class="form-group">
  <div class="col-sm-12">
   <label for="ddlextract">Extract</label>
   <div id="div">
    <input type="hidden"class="form-control" id="txtid" name="txtid" value="<?php echo $varid;?>" >
     <select name="ddlextract" class="form-control"  >
      <option value="-1"> -- Select blood extract -- </option>
      <option value="0">blood</option>
      <?php
      include "connection.php";
      $sqlparent="select * from bloodextract";
      $result= mysqli_query($con, $sqlparent);
      while($row=mysqli_fetch_array($result))
          {
           
      echo"<option value='".$row['Id'];
      if($varExtract_id==$row['Id'])
      {
         echo "' selected>";
      }
      else
      {
         echo"'>";
         
      }
      echo $row['Id']."</option>";
   }
   

      
   
      //  {
      //    echo"<option value='".$row['Id']."'>" .$row['ExtractName']."</option>";
      // }
      ?>
    </select>
  </div>
</div>
</div>


<div class="form-group">
  <label for="txtuid">Units</label>
  <input type="txtname" class="form-control" id="textunit" name="textunit"
  placeholder="Enter units" value="<?php echo $varunit; ?>">

</div>
<div class="form-group">
  <div class="col-sm-12">
   <label for="ddlcamp_id">Camp id</label>
   <div id="div">
     <select name="ddlcamp_id" class="form-control"  >
      <option value="-1"> -- Select camp id -- </option>
      <!-- <option value="0"></option> -->
      <?php
      include "connection.php";
      $sqlparent="select * from bloodcamp";
      $result= mysqli_query($con, $sqlparent);
      while($row=mysqli_fetch_array($result))
        {
           
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
</form>
</div>
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
