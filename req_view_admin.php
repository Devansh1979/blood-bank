<!DOCTYPE html>
 <html>
 <head>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="css/bootstrap.min.css">
 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>

 <style type="text/css">
 .table-hover>tbody tr:hover
 {
 background-color: silver;
 }
 .div{
   font-family:Algerian ;
   font-size: medium;
   
   
   /*background-image: url('bbg.jpg');*/
   font-size: large;
   background-size: cover;
   background-position: cover ;
  
   box-shadow: -1px 4px 26px 11px rgba(0,0,,0,0.5);
   border-radius: 20px;*/
   padding:20px;*/
   background-color: #d2b48c;
   background-image: linear-gradient(to right, cyan, purple);
     
                                   
    margin-top:100px;
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
 <th> Status</th>
 <th>Approved / Reject</th>
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
      return "Approved";
    }
    elseif($st==3)
    {
      return "Rejected";
    }
    
    

}

if(isset($_GET['status']))
    {

         $varrid= $_GET['rid'];
         $varst=$_GET['status'];
         $varunit= $_GET['unit'];
         $varBlood_group_id="";
         $varExtract_id="";

          if($varst==1)
        $sqlupd="update requirement_request  set status=2 where  Id=".$varrid;
          else
            $sqlupd="update requirement_request  set status=3 where  Id=".$varrid;

          if (!mysqli_query($con,$sqlupd))
        {
        die('Error: ' . mysqli_error($con));
        }
        

  $sqlview1="SELECT * FROM requirement_request where Id=$varrid";

    $result1= mysqli_query($con,$sqlview1);
 
 while($row1=mysqli_fetch_array($result1))
 {
    $varBlood_group_id= $row1['Blood_group_requirement'];
    $varExtract_id= $row1['Extract'];
        if($varst==1)
        $sqlupd11= "update bloodextract set Quantity_per_unit= Quantity_per_unit-$varunit where Groupid=$varBlood_group_id and id=$varExtract_id";
 
          else
            $sqlupd11= "update bloodextract set Quantity_per_unit= Quantity_per_unit+$varunit where Groupid=$varBlood_group_id and id=$varExtract_id";

          if (!mysqli_query($con,$sqlupd11))
        {
        die('Error: ' . mysqli_error($con));
        }
        
        //mysqli_close($con);
        
        }

}





 $varpid="";

 if(isset($_SESSION['pid']))
 {
    $varpid=$_SESSION['pid'];

 }

 $sqlview="SELECT a.Id,a.Patient_id,a.Date, a.Blood_group_requirement,a.date,a.Extract,a.No_of_units,a.Priority,a.status as st ,b.Name as groupName, c.ExtractName as ExtractName FROM requirement_request as a LEFT join bloodgroup as b on a.Blood_group_requirement= b.Groupid
left join bloodextract as c  on a.Extract= c.Id ";
 $result= mysqli_query($con,$sqlview);
 $sno=1;
 echo " <tbody>";
 while($row=mysqli_fetch_array($result))
 {
 echo" <tr>";
 echo "<td>".$sno."</td> <td>".$row['groupName']." </td> <td>".$row['Date']."</td> <td>".$row['ExtractName']."</td> <td>".$row['No_of_units']."</td> <td>".$row['Priority']."</td> ";
 echo "<td> ".stat1($row['st'])."</td>";

 echo "<td>
    <a href='req_view_admin.php?status=1&rid=".$row['Id']."&unit=".$row['No_of_units']."' > Approve</a> ||
    <a href='req_view_admin.php?status=0&rid=".$row['Id']."&unit=".$row['No_of_units']."' > Reject </a> </td>";

 

 echo" </tr>";
 $sno++;
 }
 echo " </tbody>
 </table>";
 ?>
 </table>
</div>
</body>
</html>
