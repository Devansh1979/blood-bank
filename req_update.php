 <!-- <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Requirement request Updation</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>

   <script> -->
    <?php
 //   session_start();
 // ob_start();
 include 'header.php';
 
?>
 <script>
  
function get_extract(idd)
 {
//alert(str);
    if(idd=="")
    {
     document.getElementById("sdiv").innerHTML="";
     return;
     }
     if(window.XMLHttpRequest)
    {
     xmlhttp=new XMLHttpRequest();
     }
     else
     {
     xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
     }
     xmlhttp.onreadystatechange=function()
     {
     if(xmlhttp.readyState==4 && xmlhttp.status==200)
     {
     document.getElementById("sdiv").innerHTML=xmlhttp.responseText;
     }
     }
     //alert(idd);
     
     xmlhttp.open("GET", "get_extract.php?pid="+ idd,true);
     xmlhttp.send();
 }
 </script>
 </head>
 
 <body>

   <?php 
   include "connection.php";
   $varid="";
   $varBlood_group_requirement="";
   $varDate="";
   $varExtract="";
   $varNo_of_units="";
   $varPriority="";


   if(isset($_GET['id']))
   {



     $sql1= "SELECT * FROM requirement_request where Id='$_GET[id]'";
     $result = mysqli_query($con,$sql1);
     while($row = mysqli_fetch_array($result))
     {
      $varid=$row['Id'];
       $varBlood_group_requirement=$row['Blood_group_requirement'];
       $varDate=$row['Date'];
       $varExtract=$row['Extract'];
       $varNo_of_units=$row['No_of_units'];
       $varPriority= $row['Priority'];


     }
   }
   if(isset($_POST['btnsub']))
   {


    echo $sqlupd="update requirement_request set 
    Blood_group_requirement='$_POST[ddlbloodgroup]',Date='$_POST[date]',Extract='$_POST[ddlextract]', No_of_units='$_POST[textunit]',Priority= '$_POST[optionsRadios1]' where Id='$_POST[txtid]'";
    if (!mysqli_query($con,$sqlupd))
    {
     die('Error: ' . mysqli_error($con));
   }
   echo "1 record added";
   header('location:req_view.php');

  // mysqli_close($con);

 }
 ?>
   <section class="home-slider owl-carousel">
      <div class="slider-item bread-item" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container" data-scrollax-parent="true">
          <div class="row slider-text align-items-end">
            <div class="col-md-7 col-sm-12 ftco-animate mb-5">
              <p class="breadcrumbs" data-scrollax=" properties: { translateY: '70%', opacity: 1.6}"><span class="mr-2"><a href="index.php">Home</a></span> <span>Requirement request update </span></p>
              <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">Requirement request update </h1>
            </div>
          </div>
        </div>
      </div>
    </section>
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
  enctype="multipart/form-data">
  <div class="container">
   <div class="row">
     <div class="col-sm-6">
      <h1> Requirement request updation </h1> 

    </div>
  </div>


  

  <div class="form-group">
    <div class="col-sm-12">
     <label for="ddlbloodgroup">Blood_group_requirement</label>
     <input type="hidden" class="form-control" id="txtid" name="txtid" value="<?php echo $varid ?>">

     <select name="ddlbloodgroup" class="form-control" onchange="get_extract(this.value)"  >
      <option value="-1"> -- Select Blood Group -- </option>
      <option value="0"> Blood Group </option>

      <?php
      $sqlparent="select * from bloodgroup";
      $result= mysqli_query($con,$sqlparent);
      while($row=mysqli_fetch_array($result))
      {
      //echo $row['id']."=====".$main;
        echo"<option value='".$row['Groupid'];
        if($varBlood_group_requirement==$row['Groupid'])
        {
          echo "' selected />";
       }
       else
       {
         echo"' />";
       }
       echo $row['Name']."</option>";
     }
     ?>  

   </select>
 </div>


</div>
<div class="form-group">
  <label for="txtuid">Date</label>
  <input type="date" class="form-control" id="date" name="date"
  placeholder="Enter  date" value="<?php echo $varDate; ?>" >
</div>
<div class="form-group">
  <div class="col-sm-12">
   <label for="ddlextract">Extract</label>
   <div id="sdiv">
   <select name="ddlextract" class="form-control"  >
    <option value="-1"> -- Select blood extract -- </option>
    <option value="0">blood</option> 
    <?php
    $sqlparent="select * from bloodextract";
    $result= mysqli_query($con,$sqlparent);
    while($row=mysqli_fetch_array($result))
    {
      //echo $row['id']."=====".$main;
      echo"<option value='".$row['Id'];
      if($varExtract==$row['Id'])
      {
       echo "' selected>";
     }
     else
     {
       echo"'>";
     }
     echo $row['ExtractName']."</option>";
   }
   ?>  




 </select>
</div>
</div>
</div>
<div class="form-group">
  <label for="txtuid">No_of_units</label>
  <input type="txtname" class="form-control" id="textunit" name="textunit"
  placeholder="Enter units" value="<?php echo $varNo_of_units; ?>" >

</div>
<fielsdet class="form-group">
  <legend>Priority</legend>
  <div class="col-sm-4 form-check">
   <label for="form-check-label">
     <input type="radio" class="form-check-input" id="optionsRadios" name="optionsRadios1" value="normal" <?php if($varPriority=="normal") echo "checked"; ?> >
     Normal
   </label>
 </div>
 <div class="col-sm-4 form-check">
   <label for="form-check-label">
     <input type="radio" class="form-check-input" id="optionsRadios" name="optionsRadios1" value="moderate" <?php if($varPriority=="moderate") echo "checked";?>>
     Moderate
   </label>
 </div>
 <div class="col-sm-4 form-check">
   <label for="form-check-label">
     <input type="radio" class="form-check-input" id="optionsRadios" name="optionsRadios1" value="emergency" <?php if($varPriority=="emergency") echo "checked"; ?> >
     Emergency
   </label>
 </div>
</fielsdet>


<div class="row">
 <div class="col-sm-6">
  <button type="submit" name="btnsub" class="btn btn-block 
  btn-primary">Update</button> </div>
  <div class="col-sm-6">
   <button type="reset" class="btn btn-block 
   btn-danger">View</button> 
 </div>
</div>
</div>
</form>
<!-- </body>
</html> -->
<?php
 //   session_start();
 // ob_start();
 include 'footer.php';
 
?>




