  <?php
 //   session_start();
 // ob_start();
 include 'header.php';
 
?>
 <?php
 //session_start();
 $id="";
 $pass="";
 include 'connection.php';
 if(isset($_POST['btn2']))
 {
 $id=$_POST['id'];
 $pass=$_POST['pass'];
 
 $sqllogin="SELECT * FROM bloodbank where Loginid='".$id."' and Password='".$pass."'";
 $result=mysqli_query($con,$sqllogin);
 $rowcount= mysqli_num_rows($result);
 if($rowcount==1)
 {
 if($row=mysqli_fetch_array($result))
 {
 $_SESSION['bid']=$row['Loginid'];
 
 $_SESSION['bname']=$row['Name'];

 header('location:blood_bank_welcome.php');
 }
 }
 else
 {
 //header('location:wrong_admin.php');
 }
 }
 ?>
 <section class="home-slider owl-carousel">
      <div class="slider-item bread-item" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container" data-scrollax-parent="true">
          <div class="row slider-text align-items-end">
            <div class="col-md-7 col-sm-12 ftco-animate mb-5">
              <p class="breadcrumbs" data-scrollax=" properties: { translateY: '70%', opacity: 1.6}"><span class="mr-2"><a href="index.php">Home</a></span> <span>Blood Bank Login</span></p>
              <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">Blood Bank Login</h1>
            </div>
          </div>
        </div>
      </div>
    </section>
 <div class="container-fluid " >
 <div class="row" >
 <div class="col-sm-3">
 </div>
 <div class="col-sm-4 div" >
 <form id="f1" name="f1" method="POST" action="<?php echo
$_SERVER['PHP_SELF']; ?>" >
 <h1 style="text-align: center;"><b><span class="glyphicon 
glyphicon-lock"></span>Blood Bank Login</b></h1><br/>
 <div class="form-group row">
 <label for="example-text-input" class=" col-form-label 
col-sm-3">Login Id</label>

 <input class="form-control" name="id" type="email"
id="txt1" value="<?php echo $id; ?>">
 </div>
 <div class="form-group row">
 <label for="example-password-input" class="col-form-label 
col-sm-3">Password</label>
 <input class="form-control" name="pass" type="password"
id="txt2" value="<?php echo $pass; ?>">

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

