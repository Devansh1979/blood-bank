 <?php
  include 'header.php';
  ?>


 <script>
   function get_extract(idd) {
     //alert(str);
     if (idd == "") {
       document.getElementById("sdiv").innerHTML = "";
       return;
     }
     if (window.XMLHttpRequest) {
       xmlhttp = new XMLHttpRequest();
     } else {
       xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
     }
     xmlhttp.onreadystatechange = function() {
       if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
         document.getElementById("sdiv").innerHTML = xmlhttp.responseText;
       }
     }
     //alert(idd);

     xmlhttp.open("GET", "get_extract.php?pid=" + idd, true);
     xmlhttp.send();
   }
 </script>
 <style type="text/css">
   .appointment-form .form-group select option {
     color: #fff;
     background-color: #2f89fc;
   }
 </style>

 <?php

  $varname = "";
  $varPassword = "";
  $varLoginId = "";

  include "connection.php";
  include "function.php";

  if (isset($_POST['btnmain'])) {

    $varname = $_POST['txtname'];
    $varPassword = random_password(8);
    $varLogin_id = $_POST['txtid'];




    $sqlins = "INSERT INTO patient_registration
(Name,Password,Login_id)
 VALUES('$varname','$varPassword','$varLogin_id')";

    if (mysqli_query($con, $sqlins)) {


      $msg1 = " Hello $varname,\n\n Welcome to Life Care Blood Bank  ,\n\nYour login Id is : $varLogin_id   \n\nYour login Password is : $varPassword  ";
      email_send($varLogin_id, " Your Password for Life Care Blood Bank Login", $msg1);
    }

    $varPatient_id = "";
    $varBlood_group_requirement = "";
    $varDate = "";
    $varExtract = "";
    $varNo_of_units = "";
    $varPriority = "";


    $varPatient_id = $_POST['txtid'];
    $varBlood_group_requirement = $_POST['ddlbloodgroup'];
    $varDate = $_POST['date1'];
    $varExtract = $_POST['ddlextract'];
    $varNo_of_units = 1;
    $varPriority = "Free";
    include "connection.php";
    $dt = date("Y-m-d");
    $sqlins = "INSERT INTO requirement_request
(Patient_id,Blood_group_requirement,Date,Extract,No_of_units,Priority,status,creation_date)
 VALUES('$varPatient_id','$varBlood_group_requirement','$varDate','$varExtract','$varNo_of_units','$varPriority','1','$dt')";

    if (mysqli_query($con, $sqlins)) {
      echo "1 record added";
      header("Location:login.php");
    }


    //mysqli_close($con); 
  }
  ?>

 <section class="home-slider owl-carousel">
   <div class="slider-item" style="background-image: url('images/r.jpeg');">
     <div class="overlay"></div>
     <div class="container">
       <div class="row slider-text align-items-center" data-scrollax-parent="true">
         <div class="col-md-6 col-sm-12 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
           <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Blood is the most precious gift that anyone can give to another person- the gift of life. </h1>
           <p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">"Life is in blood + Donate Blood = Give life."</p>
           <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><a href="Requirement_insert.php" class="btn btn-primary px-4 py-3">Make a Request</a></p>
         </div>
       </div>
     </div>
   </div>

   <div class="slider-item" style="background-image: url('images/2.webp');">
     <div class="overlay"></div>
     <div class="container">
       <div class="row slider-text align-items-center" data-scrollax-parent="true">
         <div class="col-md-6 col-sm-12 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
           <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"></h1>
           <p class="mb-4">A decision to donate your blood can save a life,or even several if your blood is separated into its components-red cells,platlets and plasma- which can be used individually for patients with specific conditions.</p>
           <p><a href="#" class="btn btn-primary px-4 py-3">Make a Request </a></p>
         </div>
       </div>
     </div>
   </div>
 </section>

 <section class="ftco-intro">
   <div class="container">
     <div class="row no-gutters">
       <div class="col-md-3 color-1 p-4" style="background-color: red;">
         <h3 class="mb-4">Emergency Requirement</h3>
         <p>Every drop of blood is like a breath for someone.</p>
         <span class="phone-number">+ (91) 8146667018</span>
       </div>
       <div class="col-md-3 color-2 p-4" style="background-color: white; color: red;">
         <h3 class="mb-4" style="color:red;">Working Hours</h3>
         <p class="openinghours d-flex">
           <span>Monday - Friday</span>
           <span>10:00 - 07:00</span>
         </p>
         <p class="openinghours d-flex">
           <span>Saturday</span>
           <span>10:00 - 05:00</span>
         </p>
         <p class="openinghours d-flex">
           <span>Sunday</span>
           <span>10:00 - 02:00</span>
         </p>
       </div>
       <div class="col-md-6 color-3 p-4" style="background-color:red;">
         <h3 class="mb-2">Make A Request</h3>



         <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="appointment-form">
           <div class="row">
             <div class="col-sm-4">
               <div class="form-group">
                 <div class="select-wrap">
                   <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                   <select name="ddlbloodgroup" id="ddlbg" class="form-control" onchange="get_extract(this.value)" required style="color: black;">
                     <option value="">Blood Group</option>
                     <?php
                      include "connection.php";
                      $sqlparent = "select * from bloodgroup";
                      $result = mysqli_query($con, $sqlparent);
                      while ($row = mysqli_fetch_array($result)) {
                        echo "<option value='" . $row['Groupid'] . "'>" . $row['Name'] . "</option>";
                        //echo"<option value='".$row['Name']."'>" .$row['Name']."</option>";
                      }
                      ?>

                   </select>
                 </div>
               </div>
             </div>
             <div class="col-sm-4">
               <div class="form-group">
                 <div class="select-wrap">
                   <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                   <div id="sdiv">
                     <select name="ddlextract" id="" class="form-control" required>
                       <option value="">Blood Extract</option>

                     </select>
                   </div>

                 </div>
               </div>
             </div>
             <div class="col-sm-4">
               <div class="form-group">

                 <input type="date" name="date1" class="form-control" placeholder="Date" required>




                 <!--  -->
               </div>
             </div>
           </div>
           <div class="row">
             <div class="col-sm-4">
               <div class="form-group">
                 <div class="icon"><span class="icon-user"></span></div>
                 <input type="text" name="txtname" class="form-control" id="name" placeholder="Name" autocomplete="off" required />
               </div>
             </div>
             <div class="col-sm-4">
               <div class="form-group">
                 <div class="icon"><span class="icon-paper-plane"></span></div>
                 <input type="email" name="txtid" class="form-control" id="appointment_email" placeholder="Email">
               </div>
             </div>
             <div class="col-sm-4">
               <div class="form-group">
                 <div class="icon"><span class="icon-phone2"></span></div>
                 <input type="text" name="txtphone" class="form-control" id="phone" placeholder="Phone" required>
               </div>
             </div>
           </div>

           <div class="form-group">
             <input type="submit" name="btnmain" value="Submit Request" class="btn btn-primary">
           </div>
         </form>



       </div>
     </div>
   </div>
 </section>

 <section class="ftco-section ftco-services">
   <div class="container">
     <div class="row justify-content-center mb-5 pb-5">
       <div class="col-md-7 text-center heading-section ftco-animate">
         <h2 class="mb-2">Our Service Keeps you Smile</h2>
         <p>“Donate Blood And Be The Reason For A Smile On Someone’s Face.”</p>
       </div>
     </div>
     <div class="row">
       <div class="col-md-3 d-flex align-self-stretch ftco-animate">
         <div class="media block-6 services d-block text-center">
           <div class="icon d-flex justify-content-center align-items-center">
             <span class="flaticon-blood-bag1.png"><img src="images/blood-bag1.png" height="100px" width="100px"> </span>
           </div>
           <div class="media-body p-2 mt-3">
             <h3 class="heading">Who can give blood</h3>
             <p>Most people can give blood. You can give blood if you are fit and healthy.
             </p>
           </div>
         </div>
       </div>
       <div class="col-md-3 d-flex align-self-stretch ftco-animate">
         <div class="media block-6 services d-block text-center">
           <div class="icon d-flex justify-content-center align-items-center">
             <!-- <span class="flaticon-dental-care"> --><img src="images/2icon.jpeg" height="100px" width="100px"><!-- </span> -->
           </div>
           <div class="media-body p-2 mt-3">
             <h3 class="heading">Donate Blood </h3>
             <p>If you donate money,you give food.
               But if you donate blood, you give Life!!</p>
           </div>
         </div>
       </div>
       <div class="col-md-3 d-flex align-self-stretch ftco-animate">
         <div class="media block-6 services d-block text-center">
           <div class="icon d-flex justify-content-center align-items-center">
             <!-- 	<span class="flaticon-tooth-with-braces"></span> -->
             <img src="images/platelets.webp" height="100px" width="100px">
           </div>
           <div class="media-body p-2 mt-3">
             <h3 class="heading"> Blood Cells</h3>
             <p>Blood contains many types of blood cells, white cells,red cells and platelets. </p>
           </div>
         </div>
       </div>
       <div class="col-md-3 d-flex align-self-stretch ftco-animate">
         <div class="media block-6 services d-block text-center">
           <div class="icon d-flex justify-content-center align-items-center">
             <!-- 		<span class="flaticon-anesthesia"></span> -->
             <img src="images/4icon.jpeg" height="100px" width="100px">
           </div>
           <div class="media-body p-2 mt-3">
             <h3 class="heading">Save Life</h3>
             <p>The blood you donate gives someone gives another chance at life.</p>
           </div>
         </div>
       </div>
     </div>
   </div>
   <div class="container-wrap mt-5">
     <div class="row d-flex no-gutters">
       <div class="col-md-6 img" style="background-image: url(images/son1.jpeg);">
       </div>
       <div class="col-md-6 d-flex">
         <div class="about-wrap" style="background-color: white;">
           <div class="container" style="background-color: white;">

             <h1>Compatible Blood Type Donors</h1>

             <!-- table, table-primary, table-warning, table-danger -->

             <table class="table" style="background-color: red;">

               <thead>

                 <tr>
                   <th scope="col">Blood Type</th>
                   <th scope="col">Donate Blood to</th>
                   <th scope="col">Receive Blood From</th>

                 </tr>

               </thead>

               <tbody>

                 <tr>
                   <th scope="row">A+</th>
                   <td>A+ | AB+</td>
                   <td>A+ | A- | O+ | O-</td>

                 </tr>

                 <tr>
                   <th scope="row">O+</th>
                   <td>O+ | A+ | B+ | AB+</td>
                   <td>O+ | O-</td>

                 </tr>
                 <tr>
                   <th scope="row">B+</th>
                   <td>B+ | AB+</td>
                   <td>B+ | B- | O+ | O-</td>

                 </tr>
                 <tr>
                   <th scope="row">AB+</th>
                   <td>AB+</td>
                   <td>Everyone</td>

                 </tr>
                 <tr>
                   <th scope="row">A-</th>
                   <td>A+ | A- | AB-</td>
                   <td>A- | O-</td>

                 </tr>
                 <tr>
                   <th scope="row">O-</th>
                   <td>Everyone</td>
                   <td>O-</td>

                 </tr>
                 <tr>
                   <th scope="row">B-</th>
                   <td>B+ | B- | AB+ | AB-</td>
                   <td>B- | O-</td>

                 </tr>
                 <tr>
                   <th scope="row">AB-</th>
                   <td>AB+ | AB-</td>
                   <td>AB- | A- | B- | O-</td>

                 </tr>


               </tbody>

             </table>



           </div>
         </div>
       </div>
     </div>
   </div>
   <!--   </section> -->


   <section class="ftco-section">
     <div class="container">
       <div class="row justify-content-center mb-5 pb-5">
         <div class="col-md-7 text-center heading-section ftco-animate">
           <h2 class="mb-3">Meet Our Volunteers</h2>
           <p>“You Can’t Buy A Life For Someone With Money, But You Can Save A Life Of Someone By Donating Blood To Him.”</p>
         </div>
       </div>
       <div class="row">



         <?php
          include 'connection.php';
          $sqlview = "SELECT a.Id,a.Login_id, a.Name, a.Email, a.Phno,a.Address, a.Bloodgroup,a.Age, a.Gender,a.FileURL,b.Name as bname
  FROM volunteerprofile as a left join Bloodgroup as b on a.bloodgroup=b.groupid  order by id desc limit 4";
          $result = mysqli_query($con, $sqlview);

          while ($row = mysqli_fetch_array($result)) {

            echo '
        	<div class="col-lg-3 col-md-6 d-flex mb-sm-4 ftco-animate">
        		<div class="staff">
      				<div class="img mb-4" style="background-image: url(' . $row['FileURL'] . ')"></div>
      				<div class="info text-center">
      					<h3><a href="#">' . $row['Name'] . ' 
' . $row['Email'] . '
' . $row['bname'] . '
' . $row['Age'] . '
' . $row['Gender'] . '

</a></h3>
      					
      					<div class="text">
	        				
	        	
	        			</div>
      				</div>
        		</div>
        	</div>';
          }

          ?>







       </div>
       <div class="row  mt-3 justify-conten-center">
         <div class="col-md-8 ftco-animate">
           <p></p>
         </div>
       </div>
     </div>
   </section>


   <section class="ftco-section ftco-services">
     <div class="container">
       <div class="row justify-content-center mb-5 pb-5">
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3442.9310764503734!2d76.36098282524136!3d30.352908653890555!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39102f534a87b5c5%3A0xda1d3ed337e382b3!2sThapar%20University%2C%20Prem%20Nagar%2C%20Patiala%2C%20Punjab%20147004!5e0!3m2!1sen!2sin!4v1730388557666!5m2!1sen!2sin" width="1000" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
         <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3396.7471590594823!2d74.88087411515356!3d31.640772481329837!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3919635a87253d69%3A0xa18497d21cc62ff!2sS.S.S.S.%20College%20Of%20Commerce%20For%20Women!5e0!3m2!1sen!2sin!4v1651906199540!5m2!1sen!2sin" width="1000" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div> -->
       </div>
     </div>
   </section>


   <?php
    include 'footer.php';
    ?>