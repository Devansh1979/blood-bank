<!-- <!DOCTYPE html>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Patient Login</title>

 <link rel="stylesheet" href="css/bootstrap.min.css" >
 <link rel="stylesheet" href="css/bootstrap-theme.min.css">
 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <style type="text/css">
   .div{
     font-family: fantasy;
     color: mediumvioletred;
     font-size: medium;
     margin-top: 80px;
     
     
     font-size: large;
     background-color: aquamarine;
     
     box-shadow: -1px 4px 26px 11px rgba(0,0,,0,0.5);
     border-radius: 20px;
     padding: 10px;
     background-color:rebeccapurple;
     background-image: linear-gradient(0deg, lightblue 0%, lightpink 100% );

   }

 </style>
 
 
</head> 
<body>-->
  <?php
 //  session_start();
 // ob_start();
 include 'header.php';
?>
<section class="home-slider owl-carousel">
      <div class="slider-item bread-item" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container" data-scrollax-parent="true">
          <div class="row slider-text align-items-end">
            <div class="col-md-7 col-sm-12 ftco-animate mb-5">
              <p class="breadcrumbs" data-scrollax=" properties: { translateY: '70%', opacity: 1.6}"><span class="mr-2"><a href="index.php">Home</a></span> <span>Patient Login</span></p>
              <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">Patient Login</h1>
            </div>
          </div>
        </div>
      </div>
    </section>
 <?php
 
 $id="";
 $pass="";
 include 'connection.php';
 if(isset($_POST['btn2']))
 {
   $id=$_POST['id'];
   $pass=$_POST['pass'];
   
    $sqllogin="SELECT * FROM patient_registration where Login_Id='".$id."' and 
   Password='".$pass."'";
   $result=mysqli_query($con,$sqllogin);
   $rowcount= mysqli_num_rows($result);
   if($rowcount==1)
   {
     if($row=mysqli_fetch_array($result))
     {
       $_SESSION['pid']=$row['Login_Id'];
       
       $_SESSION['pname']=$row['Name'];
   //    $_SESSION['uimg']=$row['admin_image'];
       header('location:index.php');
     }
   }
   else
   {
     header('location:patient_login.php');
   }
 }
 ?>
 
 <div class="container-fluid " >
   <div class="row" >
     <div class="col-sm-3">
     </div>
     <div class="col-sm-6 "  >
       <form id="f1" name="f1" method="POST" action="<?php echo
       $_SERVER['PHP_SELF']; ?>" >
       <h1 style="text-align: center;"><b><span class="glyphicon 
        glyphicon-lock"></span> Login</b></h1><br/>
        <div class="form-group ">
         <label for="example-text-input">Login Id</label>
        
           <input class="form-control" name="id" type="email"
           id="txt1" value="<?php echo $id; ?>">
         
       </div>
       <div class="form-group ">
         <label for="example-password-input" >Password</label>
        
           <input class="form-control" name="pass" type="password"
           id="txt2" value="<?php echo $pass; ?>">
         
       </div><br>
       <div class="form-group ">
         <div class="col-sm-12 text-center">
          <button type="submit" class="btn btn-info" name="btn2"
          >Login</button>
          <a href="forgotpassword.php">Forgot Password</a>
        </div>
      </div>
    </form>
  </div>
</div>
 <div class="col-sm-3">
     </div>
</div>
<?php
 include 'footer.php';
?>
