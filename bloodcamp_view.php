<?php
 include 'blood_bank_header.php';
 ?>
 <style type="text/css">
 .table-hover>tbody tr:hover
 {
 background-color: darkgoldenrod;
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
<section class="home-slider owl-carousel">
      <div class="slider-item bread-item" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container" data-scrollax-parent="true">
          <div class="row slider-text align-items-end">
            <div class="col-md-7 col-sm-12 ftco-animate mb-5">
              <p class="breadcrumbs" data-scrollax=" properties: { translateY: '70%', opacity: 1.6}"><span class="mr-2"><a href="index.php">Home</a></span> <span>Blood Bank View</span></p>
              <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">Blood Bank View</h1>
            </div>
          </div>
        </div>
      </div>
    </section>
 
 <div class="container div">
<table class="table table-hover">
	 <thead>
 <tr>
 <td colspan="8" align="center" > <h1>Blood Camp </h1> </td>
 </tr>
 <tr>
 <th>sno</th>   
 <th>Camp_title</th>
 <th>Camp_date</th>
 
 <th>Camp_city</th>
 <th>Camp_address</th>
 <th>Organized_by</th>
 <th>No_of_beds</th>
 <th>Doctor_name</th>
 <th>Update / Delete</th>
 </tr>
</thead>
 <?php
 // session_start();
 // ob_start();
 include 'connection.php';
 
    if(isset($_SESSION['bid']))
        $id=$_SESSION['bid'];
 
 
 $sqlview="SELECT * FROM bloodcamp where Organized_by='".$id."'" ;
 $result= mysqli_query($con,$sqlview);
 $sno=1;
 echo " <tbody>";
 while($row=mysqli_fetch_array($result))
 {
 
  echo" <tr>";
 echo "<td>".$sno."</td>
  <td>".$row['Camp_title']."</td> 
  <td>".$row['Camp_date']."</td>
   
   <td>".$row['Camp_city']."</td>
    <td>".$row['Camp_address']."</td>
    <td>".$row['Organized_by']."</td>
 
     <td>".$row['No_of_beds']."</td>
     <td>".$row['Doctor_name']."</td>
<td>
 <a href='update_bloodcamp.php?id=".$row['Camp_id']."'>Update </a>
 
 <a href='delete_bloodcamp.php?id=".$row['Camp_id']."'>Delete</a></td>";

 echo" </tr>";
 $sno++;
 }
 echo " </tbody>
 </table>";
 ?>

 </div>
<?php
 include 'footer.php';
?>


