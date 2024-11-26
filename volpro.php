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

 

 
 <?php
 // session_start();
 // ob_start();
 $varLogin_Id="";
 $varName="";
 $varEmail="";
 $varPhno="";
 $varAddress="";
 $varBloodgroup="";
 $varAge="";
 $varGender="";
 $varFileURL="";
$varimg="";
if(isset($_SESSION['vid']))
{
    $varLogin_Id=$_SESSION['vid'];
    $varName=$_SESSION['vname'];
}
if(isset($_POST['btnsub']))
 {
  $varLogin_Id=$_POST['txtid'];
   $varName=$_POST['textname'];
   $varEmail=$_POST['textmail'];
   $varPhno=$_POST['textPhno'];
   $varAddress=$_POST['textaddress'];
   $varBloodgroup=$_POST['ddlbloodgroup'];
   $varAge=$_POST['textage'];
  $varGender= $_POST['optionsRadios1'];
  move_uploaded_file($_FILES['img1']['tmp_name'], "images/".$_FILES['img1']['name']); 
  $varimg="images/".$_FILES['img1']['name'];
  include "connection.php";

  $sqlins="INSERT INTO volunteerprofile
 (Login_Id,Name,Email,Phno,Address,Bloodgroup,Age,Gender,FileURL)
 VALUES('$varLogin_Id','$varName','$varEmail','$varPhno','$varAddress','$varBloodgroup','$varAge','$varGender','$varimg')";
 
if (mysqli_query($con,$sqlins))
 {
 echo "1 record added";
 //header("Location:login_creation.php");
 
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
              <p class="breadcrumbs" data-scrollax=" properties: { translateY: '70%', opacity: 1.6}"><span class="mr-2"><a href="index.php">Home</a></span> <span>Volunteer Profile </span></p>
              <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">Volunteer Profile </h1>
            </div>
          </div>
        </div>
      </div>
    </section>
 <div class="container back">
 <div class="row">
 <div class="col-sm-6"> 

 <h1>Volunteer profile </h1>
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

<div class="form-group">
<label for="textuid">Name</label>
<input type="hidden"class="form-control" id="txtid" name="txtid" value="<?php echo $varLogin_Id;?>" readonly>
<input type="text"class="form-control" id="textname" name="textname" value="<?php echo $varName;?>" readonly>

</div>
<div class="form-group">
<label for="textuid">Email</label>
<input type="email" class="form-control" id="textmail" name="textmail"
  placeholder="Enter Email " value="<?php echo $varLogin_Id;?>" readonly>

</div>
<div class="form-group">
<label for="textPhno">Phno</label>
<input type="text" class="form-control" id="textPhno" name="textPhno"
  placeholder="Enter phone Number">

</div>
<div class="form-group">
<label for="textaddress">Address</label>

<div class="form-group">
 
 <textarea class="form-control" id="textaddress" name="textaddress" rows="3" >
  </textarea>
 </div>
</div>
<div class="form-group">
    <div class="col-sm-12">
     <label for="ddlbloodgroup">Blood group </label>
     <select name="ddlbloodgroup" class="form-control" onchange="get_extract(this.value)"  >
        <option value="-1"> -- Blood Group -- </option>
       
        
       
        <?php
        include "connection.php";
        $sqlparent="select * from bloodgroup";
        $result= mysqli_query($con, $sqlparent);
        while($row=mysqli_fetch_array($result))
        {
           echo"<option value='".$row['Groupid']."'>" .$row['Name']."</option>"; 
           //echo"<option value='".$row['Name']."'>" .$row['Name']."</option>";
                        

        }
        ?>
    </select>
    </div>


    </div>

<div class="form-group">
<label for="txtuid">Age</label>
<input type="text" class="form-control" id="textage" name="textage"
  placeholder="Enter  age">

</div>
<fielsdet class="form-group">
    <legend>Gender</legend>
 <div class="col-sm-4 form-check">
 <label for="form-check-label">
 <input type="radio" class="form-check-input" id="optionsRadios" name="optionsRadios1" value="male" checked>Male
</label>
 </div>
 <div class="col-sm-4 form-check">
 <label for="form-check-label">
 <input type="radio" class="form-check-input" id="optionsRadios" name="optionsRadios1" value="female">Female
</label>
 </div>
 </fielsdet>
 <div class="row form-group"> <div class="col-sm-3">
<label for="image">
Image</label> </div>
<div class="col-sm-6">
<input type="file" class="form-control-file" name="img1" id="image"/>
    </div>
</div>

 <div >
 <div class="row">
<div class="col-sm-6">
 <button type="submit" name="btnsub" class="btn btn-block 
btn-primary">Submit</button> </div>
 
 <div class="col-sm-6">
<button type="reset" class="btn btn-block 
btn-danger">Cancel</button> </div>
 </div>
</div>
</form>
</div>
</div>
</div>
<?php
    include'footer.php';
?>