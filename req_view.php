<!-- <!DOCTYPE html>
 <html>
 <head>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="css/bootstrap.min.css">
 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script> -->
 <?php
  //session_start();
// ob_start();
 include 'header.php';
 
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
              <p class="breadcrumbs" data-scrollax=" properties: { translateY: '70%', opacity: 1.6}"><span class="mr-2"><a href="index.php">Home</a></span> <span>Requirement request  </span></p>
              <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">Requirement request  </h1>
            </div>
          </div>
        </div>
      </div>
    </section>
 
 <div class="container div">
<table class="table table-hover">
    <thead>
 <tr>
 <td colspan="8" align="center" > <h1>Requirement request  </h1> </td>
 </tr>
 <tr>
    <th>sno</th>
  <th>B.Group</th>

 <th>Date</th>
 <th> Extract</th>
 <th>No ofunits</th>
 <th> Priority</th>
 <th>Update / Delete</th>
 </tr>
</thead>
 <?php
 include 'connection.php';

 function stat1($st)
{
    
    if($st==0)
    {
      return "In Process";
    }
    elseif($st==1)
    {
      return "Paid, Waiting for conformation";
    }
    elseif($st==2)
    {
      return "Confirmed";
    }
    elseif($st==3)
    {
      return "Rejected";
    }
    elseif($st==4)
    {
      return "Approved";
    }
    

}

 $varpid="";

 if(isset($_SESSION['pid']))
 {
    $varpid=$_SESSION['pid'];

 }

 $sqlview="SELECT a.Id,a.Patient_id,a.Date, a.Blood_group_requirement,a.date,a.Extract,a.No_of_units,a.Priority,a.status as st ,b.Name as groupName, c.ExtractName as ExtractName FROM requirement_request as a LEFT join bloodgroup as b on a.Blood_group_requirement= b.Groupid
left join bloodextract as c  on a.Extract= c.Id where Patient_id='".$varpid."'";
 $result= mysqli_query($con,$sqlview);
 $sno=1;
 echo " <tbody>";
 while($row=mysqli_fetch_array($result))
 {
 echo" <tr>";
 echo "<td>".$sno."</td> <td>".$row['groupName']." </td> <td>".$row['Date']."</td> <td>".$row['ExtractName']."</td> <td>".$row['No_of_units']."</td> <td>".$row['Priority']."</td> ";
 if($row['st']==0)
 {

 echo "<td>
 <a href='req_update.php?id=".$row['Id']."'>Update </a>
 
 ||<a href='req_delete.php?id=".$row['Id']."'>Delete</a>
||<a href='req_confirm.php?id=".$row['Id']."'>Confirm</a>
 </td>";
}
else
{
  echo "<td>".stat1($row['st'])."</td>";
}

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