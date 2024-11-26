<!--  <!DOCTYPE html>
 <html lang="en">
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bloodbank Participation Updation</title>
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

      font-family: fantasy;
      color: mediumvioletred;
      font-size: medium;
      margin-top: 80px;


      font-size: large;
      background-color: aquamarine;

      box-shadow: -1px 4px 26px 11px rgba(0,0,,0,0.5);
      box-radius: 20px;
      padding: 50px;
      background-color:burlywood;
   }

</style> 
</head>
<body>
  <?php
  include "connection.php";
  $varCamp_id="";
  $varDate="";
  $varTime="";

  if(isset($_GET['id']))

 {

   $sql1="SELECT * FROM bloodbankparticipation where Participation_id='$_GET[id]'";
     $result =mysqli_query($con,$sql1);
     while($row=mysqli_fetch_array($result))
     {
      $varid=$row['Participation_id'];
       $varCamp_id=$row['Camp_id'];
       $varDate=$row['Date'];
       $varTime=$row['Time'];

   }
}
 if(isset($_POST['btnsub']))
 {


    $sqlupd="update bloodbankparticipation set 

    Camp_id='$_POST[ddlCamp_id]', Date='$_POST[txtdate]', Time='$_POST[txttime]'
    where 
    Participation_id='$_POST[txtid]'";


    if (!mysqli_query($con,$sqlupd))
    {
     die('Error: ' . mysqli_error($con));
  }
  //echo "1 record added";
  header('location:view_bloodpartic.php');

  mysqli_close($con);

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


    <div class="col-sm-6">
      <h1> Bloodbank Participation </h1>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
         enctype="multipart/form-data" >


    <!-- <label for="txtuid">Groupid</label>

    --> 
    

<div class="form-group">
 <label for="ddlCamp_id">Camp_id</label>
 <div> </div><select name="ddlCamp_id" id="ddlCamp_id">
    <option value="-1">   -----select blood category------</option>
    <option value="0"> Blood </option>
    
    <?php
    $sqlparent="select * from bloodcamp";
   $result= mysqli_query($con,$sqlparent);
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
  <div class="col-sm-12">
    <label for="txtdate">Date</label>
 </div>
 <div class="col-sm-12">
    <input type="date" class="form-control" id="txtdate" name="txtdate"
    placeholder="Enter date" value="<?php echo $varDate; ?>"  >
 </div>
</div>
<div class="form-group">
  <label for="txtname">Time</label>
  <input type="time" class="form-control" name="txttime" id="txttime"
  placeholder="Enter time" value="<?php echo $varTime; ?>">
  <input type="hidden" id="txttime" name="txtid" value="<?php echo $varid; ?>" />
</div>


<div class="row">
  <div class="col-sm-6">
    <button type="update" name="btnsub" class="btn btn-block 
    btn-primary">Update</button> </div> 
    <div class="col-sm-6">
      <button type="reset" class="btn btn-block 
      btn-danger"><a href="view_bloodpartic.php">Cancel</a></button> </div>
</div>
</form>
</div>
</div>
</div>
<!-- </body>
</html> -->
 <?php
 //   session_start();
 // ob_start();
 include 'footer.php';
 
?>
