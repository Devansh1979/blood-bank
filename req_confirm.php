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
 <td colspan="8" align="center" > <h1>Requirement Conformation  </h1> </td>
 </tr>
 
    
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

}



 $varpid="";
 $varpnm="";
 if(isset($_SESSION['pid']))
 {
    $varpid=$_SESSION['pid'];
    $varpnm=$_SESSION['pname'];

 }



 $sqlview="SELECT a.Id,a.Patient_id,a.Date, a.Blood_group_requirement,a.date,a.Extract,a.No_of_units,a.Priority,a.status as st,b.Name as groupName, c.ExtractName as ExtractName, c.Price_per_unit as price FROM requirement_request as a LEFT join bloodgroup as b on a.Blood_group_requirement= b.Groupid
left join bloodextract as c  on a.Extract= c.Id where Patient_id='".$varpid."'";
 $result= mysqli_query($con,$sqlview);
 $sno=1;
 $amt=0;
 $reqid="";
 echo " <tbody>";
 while($row=mysqli_fetch_array($result))
{
  $reqid= $row['Id'];
  $amt= $row['price'] * $row['No_of_units'];

 echo" <tr>";
 echo "<td> Name :$varpnm </td> <td> ID :$varpid</td> </tr> ";

 echo "<tr><td> Blood Group :".$row['groupName']." </td> <td> Req.Date :".$row['Date']."</td></tr>" ;

  echo "<tr> <td> Blood Extract :".$row['ExtractName']."</td> <td> No. of Unit:".$row['No_of_units']."</td></tr>";
  echo "<tr> <td> Priority :".$row['Priority']."</td> <td> Status :".stat1($row['st'])."</td></tr>";

echo "<tr> <td> Price Per Unit :".$row['price']."</td> <td> Amount to Pay :".$amt."</td></tr>";

echo '<tr> <td colspan=2 align="center"> <a id="rzp-button1" class="btn btn-success check_out" href="">PAY NOW</a> </td> </tr>';

 
 
 }
 echo " </tbody>";

 $_SESSION['total']=$amt;
 ?>
 </table>


           
            
            
  
          
<!-- <button id="rzp-button1" class="btn btn-default check_out">Pay Now</button> -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "rzp_test_BbZ7Iy5kpLnVby",
    "amount": "<?php echo $amt*100; ?>", // 2000 paise = INR 20
    "name": "Blood Bank",
    "description": "<?php echo $_SESSION['pname'] ; ?>",
    "image": "images/logo.png",
    "handler": function (response){
      window.location="payment.php?reqid=<?php echo $reqid;?>&payid="+response.razorpay_payment_id;
      
    },
    "prefill": {
        "name": "<?php echo $_SESSION['pname'] ; ?>",
        "email": "<?php echo $_SESSION['pid'] ; ?>"
    },
    "notes": {
        "address": "Hello World"
    },
    "theme": {
        "color": "#F37254"
    }
};
var rzp1 = new Razorpay(options);

document.getElementById('rzp-button1').onclick = function(e){
    //alert("hello");
    rzp1.open();
    e.preventDefault();
}
</script>


</div>
<!-- </body>
</html> -->
<?php
 //   session_start();
 // ob_start();
 include 'footer.php';
 
?>