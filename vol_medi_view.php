    <?php
 //   session_start();
 // ob_start();
 include 'volunteer_header.php';
 
?>
 <style type="text/css">
 .table-hover>tbody tr:hover
 {
 background-color: silver;
 }
 .div{
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
 <body>
 <section class="home-slider owl-carousel">
      <div class="slider-item bread-item" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container" data-scrollax-parent="true">
          <div class="row slider-text align-items-end">
            <div class="col-md-7 col-sm-12 ftco-animate mb-5">
              <p class="breadcrumbs" data-scrollax=" properties: { translateY: '70%', opacity: 1.6}"><span class="mr-2"><a href="index.php">Home</a></span> <span>Bloodbank Participation view
 </span></p>
              <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">VBloodbank Participation view
 </h1>
            </div>
          </div>
        </div>
      </div>
    </section>
 <div class="container div">
<table class="table table-hover">
	 <thead>
 <tr>
 <td colspan="8" align="center" > <h1>Volunteer Medical Report  </h1> </td>
 </tr>
 <tr>
    <th>sno</th>
     <th>Name</th>
  <th>Report_type</th>
  <th> FileURL</th>
  

 <th>Update / Delete</th>
 </tr>
</thead>
 <?php
 include 'connection.php';
 $sqlview="SELECT * FROM volmedicalrep";
 $result= mysqli_query($con,$sqlview);
 $sno=1;
 echo " <tbody>";
while($row=mysqli_fetch_array($result))
 {
 
  echo" <tr>";
 echo "<td>".$sno."</td>
  <td>".$row['Name']."</td> 
  <td>".$row['Report_type']."</td>
   <td><img src='".$row['FileURL']."' width='50px' height='50px' /></td>
     
<td>
 <a href='vol_medi_update.php?id=".$row['vol_id']."'>Update </a>
 
 <a href='vol_medi_delete.php?id=".$row['vol_id']."'>Delete</a></td>";

 echo" </tr>";
 $sno++;
 }
 echo " </tbody>
 </table>";
 ?>
 </table>
</div>
    <?php
 //   session_start();
 // ob_start();
 include 'footer.php';
 
?>
