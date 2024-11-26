 <!DOCTYPE html>
 <html>
 <head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Admin Creation</title>
   <link rel="stylesheet" href="css/bootstrap.min.css" >
   <link rel="stylesheet" href="css/bootstrap-theme.min.css">
   <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
    <script> 
    function myFunction() {
   var x = document.getElementById("txtpass");
   if (x.type === "password") {
    x.type = "trxt";
   } else {
    x.type = "password";
   }
 }


    </script>
   <style type="text/css">
      .div1{
         
         margin-top: 100px;
            /*background-image: url(images/b4.jpg);*/
            box-shadow: -1px 4px 26px 11px rgba(0, 0, 0, 0.5);
            border-radius: 20px;
            padding: 50px;
            color: white;
            background-color: #D9AFD9;
           background-image: linear-gradient(0deg, #D9AFD9 0%, #97D9E1 100%);


            

         

      }
   </style>

 </head>
 <body>

   <?php
     include 'connection.php';

    $varaid="";
   $varnm="";
   $varlid="";
   $varpass="";
    $varstatus="";
    $varcd="";

   if(isset ($_POST['btn2']))
   {
        $varaid=$_POST['txtaid'];
      $varnm=$_POST['txtname'];
         $varlid=$_POST['txtid'];
      $varpass=$_POST['txtpass'];
      //$varstatus=$_POST['rbact'];

      $dt=date("y-m-d h:i:s");


      $id=$_POST['txtid'];

      $sqlchk="SELECT * FROM admin where login_id='".$id."'";
      $result=mysqli_query($con,$sqlchk);
      $rowcount= mysqli_num_rows($result);
      if($rowcount==0)
      {

         //move_uploaded_file($_FILES['img1']['tmp_name'],
            //"images/".$_FILES['img1']['name']);
         //$img="images/".$_FILES['img1']['name'];

         $sql="INSERT INTO
         admin(Name,login_id,Password)
      
         Values( '$varnm' , '$varlid', '$varpass')";
         if(!mysqli_query($con, $sql))
         {
            die('error:'.mysqli_error($con));
         }
         echo"1 record added";
         header("Location:login_admin.php");
 //mysqli_close($con);
      }
      else
      {
         echo "<h3> $id in allready in use . Try another one !!!";
      }
   }
   ?>

   <div class="container-fluid "  >
      <div class="row">
         <div class="col-sm-3"></div>
         <div class="col-sm-6 div1" style="background-color: lightblue" >

            <h1>Admin Creation</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
               enctype="multipart/form-data" >


 <div class="form-group">
 <label for="txtname">First_Name</label>
 <input type="text" class="form-control" id="txtname" name="txtname" placeholder="Enter 
First_Name" required="required">
 </div> 

  <div class="form-group">
 <label for="txtname">Last_Name</label>
 <input type="text" class="form-control" id="txtname" name="lastname" placeholder="Enter 
Last_Name" required="required">
 </div> 

              

               <div class="form-group">
                  <label for="txtid">Login id</label>
                  <input type="email" class="form-control" id="txtid" name="txtid" placeholder="abc@">
               </div>

               <div class="form-group">
                  <label for="txtpass">Password</label>
                  <input type="password" class="form-control" data-toggle="password" id="txtpass"
                  name="txtpass" data-toogle="password" placeholder="Enter Password">
                     <input type="checkbox" onclick="myFunction()">Show Password


               </div>

      

               
               <!-- <fieldset class="form-group">
                  <legend>status</legend>
                  <div class="form-check">
                     <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="rbact" id="rbact"
                        value="1">Yes</label>
                     </div>
                     <div class="form-check">
                        <label class="form-check-label">
                           <input type="radio" class="form-check-input" name="rbact" id="rbact" value="0"
                           checked>No</label>
                        </div>
                  </fieldset>
                      -->
                     <div class="row">
                        <div class="col-sm-4"></div>
                                <div class="col-sm-4">
                           <button type="submit" name="btn2" class="btn btn-block btn-primary">Submit</button>
                        </div>
                                <div class="col-sm-4"></div>
                     </div>
                     </form>
                  </div>
                     <div class="col-sm-3">
                     </div>
                  </div>
               
            </div>
         </div>
      </body>
      </html>