   <?php
 //   session_start();
 // ob_start();
 include 'volunteer_header.php';
 
?>

     <style>
 *
 {
   margin: 0px;
   padding: 0px;
 }

.div{   
        font-family: monospace;
        font-size: x-large;
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
   
    $varName="";
    $varReport_type="";
    $varFileURL="";
    $varimg="";
    $varstatus="";

    if(isset($_POST['btnsub']))
    {
     $varName=$_POST['textName'];	
     $varReport_type=$_POST['ddlReport_type'];
     $varstatus="";

    // $varFileURL=$_POST['textFileURL'];

   move_uploaded_file($_FILES['img1']['tmp_name'], "images/".$_FILES['img1']['name']); $varimg="images/".$_FILES['img1']['name'];

     include "connection.php";

      $sqlins="INSERT INTO volmedicalrep
     (Name,Report_Type,FileURL,Medicalstatus)
     VALUES('$varName','$varReport_type','$varimg','1')";
     if (mysqli_query($con,$sqlins))
     {
      echo "1 record added";
    }
   // mysqli_close($con);
    }
    ?>
    <section class="home-slider owl-carousel">
      <div class="slider-item bread-item" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container" data-scrollax-parent="true">
          <div class="row slider-text align-items-end">
            <div class="col-md-7 col-sm-12 ftco-animate mb-5">
              <p class="breadcrumbs" data-scrollax=" properties: { translateY: '70%', opacity: 1.6}"><span class="mr-2"><a href="index.php">Home</a></span> <span>Volunteer Medical Report </span></p>
              <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">Volunteer Medical Report </h1>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="container div">
    <div class="row">
        <div class="col-sm-6">
        </div>

        <div class="col-sm-8">
            <h1> Volunteer_Medical_Report </h1>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
               enctype="multipart/form-data" >


    <!-- <label for="txtuid">Groupid</label>

    --> 


    <div class="form-group">
    <div class="col-sm-4">
     <label for="textname">Name</label>
    </div>
    <div class="col-sm-12">
     <input type="text" class="form-control" id="textName" name="textName"
     placeholder="Enter Name" >
    </div>
    </div>
         <div class="form-group">
    <label for="ddlReport_type">Report_type</label>
    <select name="ddlReport_type" id="ddlReport_type">
    <option value="BP">BP</option>
    <option value="CBC">CBC</option> 
    <option value="DIABETES">DIABETES</option>  
    </select></div> 
    <div class="row form-group"> <div class="col-sm-3">
<label for="image">
Image</label> </div>
<div class="col-sm-6">
<input type="file" class="form-control-file" name="img1" id="image"/>
    </div>
</div>
 <div class="row">
    <div class="col-sm-6">
     <button type="submit" name="btnsub" class="btn btn-block 
     btn-primary">Submit</button> </div> 
    <div class="col-sm-6">
<button type="reset" class="btn btn-block 
btn-danger"><a href="vol_medi_view.php">View</a></button> </div>
</div>
</form>
</div>
</div>
</div>
  <?php
 //   session_start();
 // ob_start();
 include 'footer.php';
 
?>



