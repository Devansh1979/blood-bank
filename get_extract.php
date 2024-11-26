<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<?php
$vargroup=$_GET["pid"];
 include'connection.php';
 $sql="select * from bloodextract where groupid='$vargroup' ";
 $result=mysqli_query($con,$sql);
 echo"<select name='ddlextract' class='form-control' id='ddlextract' onchange='get_avail(this.value)'  />";
 echo"<option value=''>--Select Blood Extract--</option>";
  while($row=mysqli_fetch_array($result))
 {
 echo"<option value='".$row['Id']."'> ".$row['ExtractName']."</option>";
 }
 echo"</select>";
 mysqli_close($con);
 
 ?>
</body>
</html>