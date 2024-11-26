<?php
 include 'connection.php';
 
 if(isset($_GET['id']))
 {
 mysqli_query($con,"DELETE FROM volmedicalrep WHERE vol_id='$_GET[id]'");
 }
 mysqli_close($con);
 header('location:vol_medi_view.php');
 ?>