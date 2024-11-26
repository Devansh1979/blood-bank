<?php
 include 'connection.php';
 
 if(isset($_GET['volid']))
 {
 mysqli_query($con,"DELETE FROM volmedicalreport WHERE Id='$_GET[volid]'");
 }
 mysqli_close($con);
 header('location:volmedical_view.php');
 ?>