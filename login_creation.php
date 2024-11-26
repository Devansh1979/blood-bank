<!DOCTYPE html>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Login Admin</title>

 <link rel="stylesheet" href="css/bootstrap.min.css" >
 <link rel="stylesheet" href="css/bootstrap-theme.min.css">
 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <style type="text/css">
   /*.div{
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

   }*/
    

    .div{
        margin-top: 100px;
        margin-bottom: 100px;
        box-shadow: -1px 4px 26px 11px rgba(0.8, 1, 0, 0.9);
        border-radius: 20px;
        padding: 50px;
        color: white;
        background-color: rgba(0, 0, 0.4, 0);
    }
    body{
        background-image: url(images/login.jpeg);
        background-size: 2000px;
        background-repeat: no-repeat;
        background-attachment: fixed;

    }
 </style>


 
 
 
</head>
<body>
 <?php
 session_start();
 $id="";
 $pass="";
 include 'connection.php';
 if(isset($_POST['btn2']))
 {
   $id=$_POST['id'];
   $pass=$_POST['pass'];
   
   echo $sqllogin="SELECT * FROM admin where LoginId='".$id."' and 
   Password='".$pass."'";
   $result=mysqli_query($con,$sqllogin);
   $rowcount= mysqli_num_rows($result);
   if($rowcount==1)
   {
     if($row=mysqli_fetch_array($result))
     {
       $_SESSION['uid']=$row['LoginId'];
       
       $_SESSION['uname']=$row['Firstname'];
       $_SESSION['uimg']=$row['admin_image'];
       header('location:admin_welcome.php');
     }
   }
   else
   {
     header('location:wrong_admin.php');
   }
 }
 ?>
 
 <div class="container-fluid " >
   <div class="row" >
     <div class="col-sm-3">
     </div>
     <div class="col-sm-4 div"  >
       <form id="f1" name="f1" method="POST" action="<?php echo
       $_SERVER['PHP_SELF']; ?>" >
       <h1 style="text-align: center;"><b><span class="glyphicon 
        glyphicon-lock"></span> Login</b></h1><br/>
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
          style="height: 110%;" "width: 200%;">Login</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
</body>
</html>