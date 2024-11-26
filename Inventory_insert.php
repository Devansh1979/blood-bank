<!-- <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>in</title>
<link rel="stylesheet" href="css/bootstrap.min.css" >
<link rel="stylesheet" href="css/bootstrap-theme.min.css" i>
 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js" ></script>
 
 -->
 <?php
 //   session_start();
 // ob_start();
 include 'blood_bank_header.php';
 
?>
 
 <style type="text/css">
 

    .back{
        margin-top: 100px;
        margin-bottom: 100px;
        box-shadow: -1px 4px 26px 11px rgba(0, 0, 0, 0.5);
        border-radius: 20px;
        padding: 50px;
        color: white;
        background-color: rgba(0, 0, 0.4, 0);
    }
    body{
        background-image: url(images/Inv.jpeg);
        background-size: 2000px;
        background-repeat: no-repeat;
        background-attachment: fixed;

    }
 </style>


 <script>
function get_extract(idd)
 {
//alert(str);
    if(idd=="")
    {
     document.getElementById("sdiv").innerHTML="";
     return;
     }
     if(window.XMLHttpRequest)
    {
     xmlhttp=new XMLHttpRequest();
     }
     else
     {
     xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
     }
     xmlhttp.onreadystatechange=function()
     {
     if(xmlhttp.readyState==4 && xmlhttp.status==200)
     {
     document.getElementById("sdiv").innerHTML=xmlhttp.responseText;
     }
     }
     //alert(idd);
     
     xmlhttp.open("GET", "get_extract.php?pid="+ idd,true);
     xmlhttp.send();
 }


 function get_avail(idd)
 {

    if(idd=="")
    {
     document.getElementById("avail").innerHTML="";
     return;
     }
     if(window.XMLHttpRequest)
    {
     xmlhttp=new XMLHttpRequest();
     }
     else
     {
     xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
     }
     xmlhttp.onreadystatechange=function()
     {
     if(xmlhttp.readyState==4 && xmlhttp.status==200)
     {
     document.getElementById("avail").innerHTML=xmlhttp.responseText;
     }
     }
     
    var gbid=document.getElementById("ddlgb").value;
    alert(idd);
     //alert("idd="+idd+"gbid="+gbid);
     xmlhttp.open("GET", "get_avail.php?gbid="+gbid+"&eid"+idd,true);
     xmlhttp.send();
 }
 </script>
 </head>

 <body>
 
 
 <?php
 // session_start();
 // ob_start();
 $varblood_id="";
 $varBlood_group_id="";
 $varExtract_id="";
 $varUnit="";
 $varCamp_id="";
 $varStatus="";
 $varcreation_date="";
  if(isset($_SESSION['bid']))
{
    $varblood_id=$_SESSION['bid'];
}

 if(isset($_POST['btnsub']))
 {
 
 $varblood_id=$_POST['ddlblood_id'];
 $varBlood_group_id=$_POST['ddlbloodgroup'];
 $varExtract_id=$_POST['ddlextract'];

 $varunit=$_POST['textunit'];
 $varCamp_id=$_POST['ddlcamp_id'];
 $varstatus="";
   $dt=date("y:m:d h:i:s");
 
 
 

 
 include "connection.php";

 $sqlins="INSERT INTO inventory
(blood_bank_id,blood_group_id,Extract_id,Unit,Camp_id,Status,creation_date)
 VALUES('$varblood_id','$varBlood_group_id','$varExtract_id','$varunit','$varCamp_id','1','$dt')";
 
if (mysqli_query($con,$sqlins))
 {
        echo "1 Record Added ";
}

 $sqlupd= "update bloodextract set Quantity_per_unit= Quantity_per_unit+$varunit where Groupid=$varBlood_group_id and id=$varExtract_id";
 mysqli_query($con,$sqlupd);
 
 
//mysqli_close($con); 
 

}
 ?>
 <section class="home-slider owl-carousel">
      <div class="slider-item bread-item" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container" data-scrollax-parent="true">
          <div class="row slider-text align-items-end">
            <div class="col-md-7 col-sm-12 ftco-animate mb-5">
              <p class="breadcrumbs" data-scrollax=" properties: { translateY: '70%', opacity: 1.6}"><span class="mr-2"><a href="index.php">Home</a></span> <span>Inventory  </span></p>
              <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">Inventory </h1>
            </div>
          </div>
        </div>
      </div>
    </section>
 
 <div class="container back">
 <div class="row">

 <div class="col-sm-6"> 
 <h1>Inventory</h1>
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
enctype="multipart/form-data" >

          <div class="form-group">
   <!--  <div class="col-sm-12">
     <label for="ddlextract">Blood Bank ID</label>
     <div id="sdiv">
          <input type="hidden"class="form-control" id="ddlblood_id" name="ddlblood_id" value="<?php echo $varblood_id;?>" readonly>
     <select name="ddlblood_id" class="form-control"  >
              

        <option value="-1"> -- Select blood bank id---- </option>
       
    </select>
</div>
    </div> -->


    </div>
    <div class="form-group">
    <div class="col-sm-12">
     <label for="ddlbloodgroup">Blood group requirement</label>
     <input type="hidden"class="form-control" id="ddlblood_id" name="ddlblood_id" value="<?php echo $varblood_id;?>" readonly>
     <select name="ddlbloodgroup" id="ddlbg" class="form-control" onchange="get_extract(this.value)"  >
        <option value="-1"> -- Select Blood Group -- </option>
       
        
       
        <?php
        include "connection.php";
        $sqlparent="select * from bloodgroup";
        $result= mysqli_query($con, $sqlparent);
        while($row=mysqli_fetch_array($result))
        {
           echo"<option value='".$row['Groupid']."'>" .$row['Name']."</option>"; 
           //echo"<option value='".$row['Name']."'>" .$row['Name']."</option>";
                        

        }
        ?>
    </select>
    </div>


    </div>


 <!-- <div class="form-group"> -->
   <!--  <label for="ddlExtract">Extract</label>
    <select name="ddlextract" id="ddlextract">
    <option value="gm">g</option>
    <option value="ml">ml</option>   
    </select>
     </div > -->
         <div class="form-group">
    <div class="col-sm-12">
     <label for="ddlextract">Extract</label>
     <div id="sdiv">
     <select name="ddlextract" class="form-control"  >
        <option value="-1"> -- Select blood extract -- </option>
        <option value="0">blood</option>
        <?php
        include "connection.php";
        $sqlparent="select * from bloodextract";
        $result= mysqli_query($con, $sqlparent);
        while($row=mysqli_fetch_array($result))
        {
            echo"<option value='".$row['Id']."'>" .$row['ExtractName']."</option>";
        }
        ?>
    </select>
</div>
    </div>


    </div>

     <div class="form-group">
<label for="txtuid">No_of_units</label>
<input type="txtname" class="form-control" id="textunit" name="textunit"
  placeholder="Enter units">

</div>
<div class="form-group">
    <div class="col-sm-12">
     <label for="ddlcamp_id">Camp id</label>
     <div id="div">
     <select name="ddlcamp_id" class="form-control"  >
        <option value="-1"> -- Select camp id -- </option>
        <!-- <option value="0"></option> -->
        <?php
        include "connection.php";
        $sqlparent="select * from bloodcamp";
        $result= mysqli_query($con, $sqlparent);
        while($row=mysqli_fetch_array($result))
        {
            echo"<option value='".$row['Camp_id']."'>" .$row['Camp_title']."</option>";
        }
        ?>
    </select>
</div>
    </div>


    </div>

<div >
 <div class="row">
<div class="col-sm-6">
 <button type="submit" name="btnsub" class="btn btn-block 
btn-primary">Submit</button> </div>
 
 <div class="col-sm-6">
<button type="reset" class="btn btn-block btn-danger"><a href="inventory_view.php">View</a></button>
 </div>
 </div>
 </div>
 
</div> 
</div>
 </form>
</div>
</div>
</div>
<!-- </body>
</html>
 -->
  <?php
 //   session_start();
 // ob_start();
 include 'footer.php';
 
?>
