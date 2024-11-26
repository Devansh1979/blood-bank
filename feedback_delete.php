<?php
 include 'connection.php';
 
 if(isset($_GET['id']))
 {
 mysqli_query($con,"DELETE FROM feedback WHERE id='$_GET[id]'");
 }
 mysqli_close($con);
 header('location:feedback_view.php');
 ?>
 
