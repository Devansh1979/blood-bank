  <?php
 //session_start();
 //ob_start();
 include 'header.php';
 
?>
 
 <style>
 

    .div{
        font-family: monospace;
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
 
 <!-- /*{
   margin: 0px;
   padding: 0px;
   }

.div{
   font-family: fantasy;
   font-size: medium;
   
   
   /*background-image: url('bbg.jpg');*/
   /*font-size: large;
   background-size: cover;
   background-position: cover ;
  
   box-shadow: -1px 4px 26px 11px rgba(0,0,,0,0.5);
   border-radius: 20px;
   padding:10px;
   background-image: linear-gradient(0deg, lightblue 0%, blue 100% );
  margin-top: 100px;
    }*/ -->
 </style> <script>
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
     
    var gbid=document.getElementById("ddlbg").value;
    //alert(idd);
     //alert("idd="+idd+"gbid="+gbid);
     xmlhttp.open("GET", "get_avail.php?gbid="+gbid+"&eid="+idd,true);
     xmlhttp.send();
 }
 </script>
  
 
 <?php
 
 $varPatient_id="";
 $varBlood_group_requirement="";
 $varDate="";
 $varExtract="";
 $varNo_of_units="";
 $varPriority="";
 if(isset($_SESSION['pid']))
{
    $varPatient_id=$_SESSION['pid'];
}
else
{
    header("location:patient_login.php");
}

 
 
 if(isset($_POST['btnsub']))
 {
 $varPatient_id=$_POST['txtid'];
 $varBlood_group_requirement=$_POST['ddlbloodgroup'];
 $varDate=$_POST['date'];
 $varExtract=$_POST['ddlextract'];
 $varNo_of_units=$_POST['textunit'];
 $varPriority= $_POST['optionsRadios1'];
 include "connection.php";
$dt= date("Y-m-d");
 $sqlins="INSERT INTO requirement_request
(Patient_id,Blood_group_requirement,Date,Extract,No_of_units,Priority,status,creation_date)
 VALUES('$varPatient_id','$varBlood_group_requirement','$varDate','$varExtract','$varNo_of_units','$varPriority','0','$dt')";
 
if (mysqli_query($con,$sqlins))
 {
 echo "1 record added";
 header("Location:req_view.php");
 
 }
 
 
mysqli_close($con); 
 }
 ?>
 <section class="home-slider owl-carousel">
      <div class="slider-item bread-item" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container" data-scrollax-parent="true">
          <div class="row slider-text align-items-end">
            <div class="col-md-7 col-sm-12 ftco-animate mb-5">
              <p class="breadcrumbs" data-scrollax=" properties: { translateY: '70%', opacity: 1.6}"><span class="mr-2"><a href="index.php">Home</a></span> <span>Requirement Request  </span></p>
              <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">Requirement Request </h1>
            </div>
          </div>
        </div>
      </div>
    </section>
 <div class="container fluid">
 <div class="row">
 <div class="col-sm-6 required div"> 
 <h1>Requirement Request </h1>
 
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
    <div class="form-group">
    <div class="col-sm-12">
        <input type="hidden"class="form-control" id="txtid" name="txtid" value="<?php echo $varPatient_id;?>" readonly>
     <label for="ddlbloodgroup">Blood group requirement</label>
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

<div class="form-group">
<label for="txtuid">Date</label>
<input type="date" class="form-control" id="date" name="date" placeholder="Enter  date">

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
    </select>
</div>
    </div>


    </div>
    <div class="form-group">
<label >No_of_units Avaliable :<span id="avail"> </span></label>

</div>

     <div class="form-group">
<label for="txtuid">No_of_units</label>
<input type="txtname" class="form-control" id="textunit" name="textunit"
  placeholder="Enter units">

</div>
<fielsdet class="form-group">
    <legend>Priority</legend>
 <div class="col-sm-4 form-check">
 <label for="form-check-label">
 <input type="radio" class="form-check-input" id="optionsRadios" name="optionsRadios1" value="normal" checked>Normal
</label>
 </div>
 <div class="col-sm-4 form-check">
 <label for="form-check-label">
 <input type="radio" class="form-check-input" id="optionsRadios" name="optionsRadios1" value="moderate"> Moderate
</label>
 </div>
 <div class="col-sm-4 form-check">
 <label for="form-check-label">
 <input type="radio" class="form-check-input" id="optionsRadios" name="optionsRadios1" value="emergency"> Emergency
</label>
 </div>
</fielsdet>
<div >
 <div class="row">
<div class="col-sm-6">
 <button type="submit" name="btnsub" class="btn btn-block 
btn-primary">Submit</button> </div>
 
 <div class="col-sm-6">
<button type="reset" class="btn btn-block btn-danger"><a href="req_view.php">View</a></button>
 </div>
 </div>
 </div>
 
</div> 
</div>
 </form>
</div>
</div>
</div>
  <?php
 //   session_start();
 // ob_start();
 include 'footer.php';
 
?>
