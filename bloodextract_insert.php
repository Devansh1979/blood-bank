    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blood Extract</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/bootstrap-theme.min.css" i>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js" ></script>
    <style>
 
 {
   margin: 0px;
   padding: 0px;
 }

.div{
   font-family: sans-serif;
   font-size: medium;
   
   
   
        margin-top: 100px;
        margin-bottom: 100px;
        box-shadow: -1px 4px 26px 11px rgba(0, 0, 0, 0.5);
        border-radius: 20px;
        padding: 50px;
        color: white;
        background-color: rgba(0, 0, 0.6, 0);
    }
    body{
        background-image: url(images/feedb1.jpeg);
        background-size: 2000px;
        background-repeat: no-repeat;
        background-attachment: fixed;

    }
 </style>

   
    </head>
    <body>
    <?php
    $varGroupid="";
    $varExtractname="";
    $varQuantity_per_unit="";
    $varunit="";
    $varPrice_per_unit="";
    if(isset($_POST['btnsub']))
    {
     $varGroupid=$_POST['ddlGroupid'];	
     $varExtractname=$_POST['txtname'];
     $varQuantity_per_unit=$_POST['txtqty'];
     $varunit=$_POST['ddlunit'];
     $varPrice_per_unit=$_POST['txtppu'];

     include "connection.php";

     $sqlins="INSERT INTO bloodextract
     (Groupid,Extractname,Quantity_per_unit,unit, Price_per_unit)
     VALUES('$varGroupid','$varExtractname','$varQuantity_per_unit','$varunit', '$varPrice_per_unit')";
     if (mysqli_query($con,$sqlins))
     {
      echo "1 record added";
    }
    mysqli_close($con);
    }
    ?>
    <div class="container ">
    <div class="row">
        <div class="col-sm-2">
        </div>

        <div class="col-sm-8 required div">
            <h1> Blood Extract </h1>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
               enctype="multipart/form-data" >


    <!-- <label for="txtuid">Groupid</label>

    --> 
    <div class="form-group">
    <div class="col-sm-12">
     <label for="ddlGroupid">Blood Group</label>
     <select name="ddlGroupid" class="form-control"  >
        <option value="-1"> -- Select blood group -- </option>
       
        <?php
        include "connection.php";
        $sqlparent="select * from bloodgroup";
        $result= mysqli_query($con, $sqlparent);
        while($row=mysqli_fetch_array($result))
        {
            echo"<option value='".$row['Groupid']."'>" .$row['Name']."</option>";
        }
        ?>
    </select>
    </div>


    </div>

    <div class="form-group">
    <div class="col-sm-12">
     <label for="txtname">ExtractName</label>
    </div>
    <div class="col-sm-12">
     <input type="text" class="form-control" id="txtname" name="txtname"
     placeholder="EnterExtractname" >
    </div>
    </div>
    <div class="form-group">
    <label for="txtname">Quantity_per_unit</label>
    <input type="text" class="form-control" Groupid="txtGroupid" name="txtqty"
    placeholder="Enter Quantity_per_unit">

    </div>

    <div class="form-group">
    <label for="ddlunit">Unit</label>
    <select name="ddlunit" id="ddlunit">
    <option value="gm">gm</option>
    <option value="ml">ml</option>   
    </select>

 <div class="form-group">
    <label for="txtname">Price_per_unit</label>
    <input type="text" class="form-control" Groupid="txtGroupid" name="txtppu"
    placeholder="Enter Price per unit">

    </div>



    </div >
    <div class="row">
    <div class="col-sm-6">
     <button type="submit" name="btnsub" class="btn btn-block 
     btn-primary">Submit</button> </div> 
    <div class="col-sm-6">
<button type="reset" class="btn btn-block 
btn-danger"><a href="extract_view.php">View</a></button> </div>
</div>
</form>
</div>
</div>
</div>
</body>
</html>
