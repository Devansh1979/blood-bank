<?php
 include 'connection.php';
 
 if(isset($_GET['id']))
 {
 mysqli_query($con,"DELETE FROM requirement_request WHERE Id='$_GET[id]'");
 }
 mysqli_close($con);
 header('location:req_view.php');
 ?>
 