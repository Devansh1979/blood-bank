  <?php
 //   session_start();
 // ob_start();
 include 'header.php';
 
?>
 <!-- <style type="text/css">
 .div{
   font-family: fantasy;
   color: mediumvioletred;
   font-size: medium;
   margin-top: 80px;
   
   
   font-size: large;
   background-color: aquamarine;
   
   box-shadow: -1px 4px 26px 11px rgba(0,0,,0,0.5);
   box-radius: 20px;
   padding: 50px;
   background-color:rebeccapurple;
    }
  </style>
  -->
 <?php
 //session_start();
 $id="";
 $pass="";
 include 'connection.php';
 if(isset($_POST['btn2']))
 {
 $id=$_POST['id'];
 $pass=$_POST['pass'];
 
 echo $sqllogin="SELECT * FROM volunteer_registration where Login_id='".$id."' and 
 Password='".$pass."'";
 $result=mysqli_query($con,$sqllogin);
 $rowcount= mysqli_num_rows($result);
 if($rowcount==1)
 {
 if($row=mysqli_fetch_array($result))
 {
 $_SESSION['vid']=$row['Login_id'];
 
 $_SESSION['vname']=$row['Name'];
 //$_SESSION['vimg']=$row['admin_image'];
 header('location:volpro.php');
 }
 }
 else
 {
 header('location:volpro.php');
 }
 }
 ?>
  <section class="home-slider owl-carousel">
      <div class="slider-item bread-item" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container" data-scrollax-parent="true">
          <div class="row slider-text align-items-end">
            <div class="col-md-7 col-sm-12 ftco-animate mb-5">
              <p class="breadcrumbs" data-scrollax=" properties: { translateY: '70%', opacity: 1.6}"><span class="mr-2"><a href="index.php">Home</a></span> <span>Volunter Login  </span></p>
              <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">Volunter Login </h1>
            </div>
          </div>
        </div>
      </div>
    </section>
 <div class="container" >
 <div class="row" >
 <div class="col-sm-3">
 </div>
 <div class="col-sm-4" >
 <form id="f1" name="f1" method="POST" action="<?php echo
$_SERVER['PHP_SELF']; ?>" >
 <h1 style="text-align: center;"><b><span class="glyphicon 
glyphicon-lock"></span> Volunter Login </b></h1><br/>
 <div class="form-group row">
 <label for="example-text-input" class=" col-form-label 
col-sm-3">Login Id</label>
 <div class="col-sm-9">
 <input class="form-control" name="id" type="email"
id="txt1" value="<?php echo $id; ?>">
 </div>
 </div>
 <div class="form-group row">
 <label for="example-password-input" class="col-form-label 
col-sm-3">Password</label>
 <div class="col-sm-9">
 <input class="form-control" name="pass" type="password"
id="txt2" value="<?php echo $pass; ?>">
 </div>
 </div><br>
<div class="form-group row">
 <div class="col-sm-12 text-center">
<button type="submit" class="btn btn-info" name="btn2"
style="height: 110%;">Login</button>
 </div>
 </div>
 </form>
 </div>
 </div>
 </div>
<?php
 include 'footer.php';
?>


