<!-- <!DOCTYPE html>
 <html>
 <head>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="css/bootstrap.min.css">
 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script> -->
 <?php
 //   session_start();
 // ob_start();
 include 'header.php';
 
?>

 
<style>

    .div{
        margin-top: 100px;
        margin-bottom: 100px;
        box-shadow: -1px 4px 26px 11px rgba(0, 0, 0, 0.5);
        border-radius: 40px;
        padding: 50px;
        color: white;
        border: groove;
        background-color: rgba(0, 0, 0, 0.0);
    }
    body{
        background-image: url(images/feedback2.jpg);
        background-size: 2000px;
        background-repeat: no-repeat;
        background-attachment: fixed;

    }
 </style>

 }
 
 </head>
 <body>
  <section class="home-slider owl-carousel">
      <div class="slider-item bread-item" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container" data-scrollax-parent="true">
          <div class="row slider-text align-items-end">
            <div class="col-md-7 col-sm-12 ftco-animate mb-5">
              <p class="breadcrumbs" data-scrollax=" properties: { translateY: '70%', opacity: 1.6}"><span class="mr-2"><a href="index.php">Home</a></span> <span>FEEDBACK FORM </span></p>
              <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">FEEDBACK FORM  </h1>
            </div>
          </div>
        </div>
      </div>
    </section>
 
 <div class="container div">
<table class="table table-hover">
	 <thead>
 <tr>
 <td colspan="8" align="center" > <h1>FEEDBACK FORM  </h1> </td>
 </tr>
 <tr>
   <th>sno</th> 
  <th>Message</th>

 
 <th>Update / Delete</th>
 </tr>
</thead>
 <?php
 include 'connection.php';
 $sqlview="SELECT * FROM feedback";
 $result= mysqli_query($con,$sqlview);
 $sno=1;
 echo " <tbody>";
 while($row=mysqli_fetch_array($result))
 {
 echo" <tr>";

 echo "<td>".$sno."</td> <td>".$row['Message']."</td> 
 <td>
 <a href='feedback_update.php?id=".$row['id']."'>Update </a>
 
 <a href='feedback_delete.php?id=".$row['id']."'>Delete</a></td>";

 echo" </tr>";
 $sno++;
 }
 echo " </tbody>
 </table>";
 ?>
</table>
</div>
<!-- </body>
</html> -->
<?php
 //   session_start();
 // ob_start();
 include 'footer.php';
 
?>

