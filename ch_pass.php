
<?php
// session_start();
// ob_start();
include'header.php';

?>


<?php
//session_start();
include('connection.php');

$varold="";
$varnew="";
$varconfrim="";
if (isset($_POST['btn3'])) 
{ 

  $varold=$_POST['oldPassword'];
$varnew=$_POST['newPassword'];
$varconfrim=$_POST['confirmPassword'];


	$SQL="SELECT * FROM patient_registration where Login_Id ='".$_SESSION['pid']."' and password='".$varold."'";
	$result=mysqli_query($con,$SQL);
 $count=mysqli_num_rows($result);
 if($count!=0)
 {	


 $sqlupd= "UPDATE patient_registration set Password='" . $_POST["newPassword"] . "' 
  WHERE Login_Id='".$_SESSION['pid']."'";
	  mysqli_query($con,$sqlupd);
	  
	  echo "<script>
                alert('Change Password Succesfully.');
              window.location.href ='index.php';
                </script>";
                
   // header("Location:index.php");
    } else
      echo "<script>
                alert('Given Old Password is not correct');
              
                </script>";


      //  $message = "New Password is not correct";
			
}

?>


<section class="home-slider owl-carousel">
      <div class="slider-item bread-item" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container" data-scrollax-parent="true">
          <div class="row slider-text align-items-end">
            <div class="col-md-7 col-sm-12 ftco-animate mb-5">
              <p class="breadcrumbs" data-scrollax=" properties: { translateY: '70%', opacity: 1.6}"><span class="mr-2"><a href="index.php">Home</a></span> <span>Change Password</span></p>
              <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">Change Password</h1>
            </div>
          </div>
        </div>
      </div>
    </section>


<section class="site-section">
<div class="container"  >
    <div class="row">
    <div class="col-sm-3"></div>
      

      <!--Body-->
      <div class="col-sm-6">
          <form name="frmChange" autocomplete="off" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

      <div class="modal-body">
          <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text" style="color:#333;"></i>&nbsp;&nbsp;
                     <label data-error="wrong" data-success="right" for="form3" style="color:#009;">Old Password</label>                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="password" name="oldPassword" id="oldPassword"
                        class="txtField" autocomplete="off" required/>
        </div>
        
      
      
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text" style="color:#333;" ></i>&nbsp;&nbsp;
                     <label data-error="wrong" data-success="right" for="form3" style="color:#009;">New Password</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="password" name="newPassword" id="newPassword"
                        class="txtField" autocomplete="off" required/>
        </div>
        
        
                <div class="md-form">
          <i class="fas fa-user prefix grey-text" style="color:#333;"></i>&nbsp;&nbsp;
                <label data-error="wrong" data-success="right" for="form2" style="color:#009;">Confirm Password</label>&nbsp;&nbsp;
                <input type="password" name="confirmPassword"
                    class="txtField"  id="confirmPassword"  required  onblur="matchPassword()" /><br/><br/>
                    
               <div class="md-form" style="text-align:center;">
                   <input type="submit" name="btn3"
                        value="Submit" class="btn btn-primary">
            
        </div>
        
        
<!--        
          <input type="text" id="form3" class="form-control validate">
          <label data-error="wrong" data-success="right" for="form3">Your name</label>
        </div>


          <input type="email" id="form2" class="form-control validate">
          <label data-error="wrong" data-success="right" for="form2">Your email</label>-->
        </div>
      </div>
</form>
 <div class="col-sm-3"></div>
      <!--Footer-->
    
</div>

<!-- <div class="text-center">
  <a href="" class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#orangeModalSubscription">Change Password</a>
</div>
<br/><br/> -->
</section>


<script>  
function matchPassword() {  
  var pw1 = document.getElementById("newPassword").value;  
  var pw2 = document.getElementById("confirmPassword").value;  
  if(pw1 != pw2)  
  {   
    alert("Confirm Passwords did not match");  
  } 
}  
</script>  



<?php
include "footer.php";

?>
