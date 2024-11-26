    <?php
    // session_start();
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
   
    <?php
    $varvol_id="";
    $varCamp_id="";
    $varDate="";
    $varTime="";
    if(isset($_SESSION['vid']))
{
    $varvol_id=$_SESSION['vid'];

    }
    if(isset($_POST['btnsub']))
    {
     $varvol_id=$_POST['ddlvol_id'];
     $varCamp_id=$_POST['ddlCamp_id'];	
     $varDate=$_POST['date'];
     $varTime=$_POST['time'];
     

     include "connection.php";

   $sqlins="INSERT INTO bloodbankparticipation
     (vol_id,Camp_id,Date,Time)
     VALUES('$varvol_id','$varCamp_id','$varDate','$varTime')";
     if (mysqli_query($con,$sqlins))
     {
      echo "1 record added";
    }
    mysqli_close($con);
    }
    ?>

     <section class="home-slider owl-carousel">
      <div class="slider-item bread-item" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container" data-scrollax-parent="true">
          <div class="row slider-text align-items-end">
            <div class="col-md-7 col-sm-12 ftco-animate mb-5">
              <p class="breadcrumbs" data-scrollax=" properties: { translateY: '70%', opacity: 1.6}"><span class="mr-2"><a href="index.php">Home</a></span> <span>Bloodbank Participation
 </span></p>
              <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">Bloodbank Participation
 </h1>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="container back">
    <div class="row">
        <div class="col-sm-2">
        </div>

        <div class="col-sm-8">
            <h1> Bloodbank Participation </h1>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
               enctype="multipart/form-data" >


    <!-- <label for="txtuid">Groupid</label>

    --> 
    <div class="form-group">
    <div class="col-sm-12">
     <label for="ddlCamp_id">Camp_id</label>
     <input type="hidden"class="form-control" id="ddlblood_id" name="ddlvol_id" value="<?php echo $varvol_id;?>" readonly>
     <select name="ddlCamp_id" class="form-control"  >
        <option value="-1"> -- Select blood Category -- </option>
        <option value="0">blood</option>
        <?php
        include "connection.php";
        $sqlparent="select * from bloodcamp";
        $result= mysqli_query($con, $sqlparent);
        while($row=mysqli_fetch_array($result))
        {
            echo"<option value='".$row['Camp_id']."'>" .$row['Camp_title']."</option>";
        }
        ?>
    </select>
    </div>


    </div>

    <div class="form-group">
    <div class="col-sm-12">
     <label for="txtname">Date</label>
    </div>
    <div class="col-sm-12">
     <input type="date" class="form-control" id="date" name="date"
     placeholder="Enter date" >
    </div>
    </div>
    <div class="form-group">
    <label for="txtname">Time</label>
    <input type="text" class="form-control" Camp_id="txtCamp_id" name="time"
    placeholder="Enter time">

    </div>

    
    <div class="row">
    <div class="col-sm-6">
     <button type="submit" name="btnsub" class="btn btn-block 
     btn-primary">Submit</button> </div> 
    <div class="col-sm-6">
<button type="reset" class="btn btn-block 
btn-danger"><a href="view_bloodpartic.php">View</a></button> </div>
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