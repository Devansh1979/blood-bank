 <?php
  include 'header.php';

  ?>
 <?php

  $varname = "";
  $varlogin = "";
  $varmessage = "";
  $varsubject = "";
  function email_send($to, $sub, $msg)
  {
    $to_email = "misssonali113@gmail.com";;
    $subject = $sub;
    $message = $msg;
    $heders = "From: ";
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

    if (mail($to_email, $subject, $message, $headers)) {
      echo "<script> alert('E-Mail Send  To you , Check your inbox '); </script>";
    } else
      echo "<script> alert('Your Internet connection is not Working '); </script>";
  }
  if (isset($_POST['btnsend'])) {
    $varname = $_POST['name'];
    $varlogin = $_POST['email'];
    $varmessage = $_POST['comments'];
    $varsubject = $_POST['sub'];




    $msg1 = " <b>Hello Admin </b> <br/><br/> <b>Name </b>: <b style='color:red; '>$varname </b>,<br/><br/><b>Email</b> : <b style='color:red;'>$varlogin</b> <br/><br/> <b>Subject </b> : $varsubject <br/><br/><b>Message</b>: $varmessage   ";
    email_send($varlogin, " Contact Us", $msg1);
  }
  // $to_email = "mehramonu94@gmail.com";
  // //$nm =  "Name : '".$_POST['name']."' ";
  // $subject = "Subject : ".$_POST['sub']."  "  ;
  // $body = "Name :".$_POST['name']." ,<br/><br/>Message: " .$_POST['comments'].",<br/><br/>Email :" .$_POST['email']." ";

  // $m = "Email :'" .$_POST['email']."'";
  // $headers = "From:  ";
  // $headers  = 'MIME-Version: 1.0' . "\r\n";
  // $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

  // if (mail($to_email,  $subject, $body, $m,$headers)) {



  //     echo" <script>
  //            alert('Email successfully sent ')</script>";

  // } else {

  //     echo" <script>
  //            alert('Internet is not working')</script>";
  // }

  // }


  ?>
 <section class="home-slider owl-carousel">
   <div class="slider-item bread-item" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
     <div class="overlay"></div>
     <div class="container" data-scrollax-parent="true">
       <div class="row slider-text align-items-end">
         <div class="col-md-7 col-sm-12 ftco-animate mb-5">
           <p class="breadcrumbs" data-scrollax=" properties: { translateY: '70%', opacity: 1.6}"><span class="mr-2"><a href="index.php">Home</a></span> <!-- <span>Blog</span></p> -->
           <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">Contact Us</h1>
         </div>
       </div>
     </div>
   </div>
 </section>

 <section class="ftco-section contact-section ftco-degree-bg">
   <div class="container">
     <div class="row d-flex mb-5 contact-info">
       <div class="col-md-12 mb-4">
         <h2 class="h4">Contact Information</h2>
       </div>
       <div class="w-100"></div>
       <div class="col-md-4">
         <p><span>Address:</span> Thapar University ,Patiala</p>
       </div>
       <div class="col-md-4">
         <p><span>Phone:</span> <a href="tel://8847373903<">+ 918146667018</a></p>
       </div>
       <div class="col-md-4">
         <p><span>Email:</span> <a href="misssonali113@gmail.com">devanshbhakhri11@gmail.com</a></p>
       </div>
     </div>
     <div class="row block-9">

       <div class="col-md-6 pr-md-5">
         <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
           <div class="form-group">
             <input type="text" name="name" class="form-control" placeholder="Your Name">
           </div>
           <div class="form-group">
             <input type="email" name="email" class="form-control" placeholder="Your Email">
           </div>
           <div class="form-group">
             <input type="text" name="sub" class="form-control" placeholder="Subject">
           </div>
           <div class="form-group">
             <textarea name="comments" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
           </div>
           <div class="form-group">
             <input type="submit" name="btnsend" value="Send Message" class="btn btn-primary py-3 px-5">
           </div>
         </form>

       </div>

       <div class="col-md-6">
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3442.9310764503734!2d76.36098282524136!3d30.352908653890555!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39102f534a87b5c5%3A0xda1d3ed337e382b3!2sThapar%20University%2C%20Prem%20Nagar%2C%20Patiala%2C%20Punjab%20147004!5e0!3m2!1sen!2sin!4v1730364541238!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
       </div>
     </div>
   </div>
 </section>

 <?php
  include 'footer.php';
  ?>