<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<?php
$vargroup=$_GET["gbid"];
$varExtract= $_GET['eid'];

 include'connection.php';
 $sql="select Quantity_per_unit from bloodextract where Groupid='$vargroup' and Id='$varExtract' ";
 $result=mysqli_query($con,$sql);
   while($row=mysqli_fetch_array($result))
 {
 echo"<span style='color:red;'>".$row['Quantity_per_unit']."</span>";
 }
 
 mysqli_close($con);
 
 ?>
</body>
</html>