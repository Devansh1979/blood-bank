<?php
 include 'connection.php';
 
 if(isset($_GET['id']))
 {
 mysqli_query($con,"DELETE FROM inventory WHERE Inv_id ='$_GET[id]'");
 }
 mysqli_close($con);
 header('location:inventory_view.php');
 ?>