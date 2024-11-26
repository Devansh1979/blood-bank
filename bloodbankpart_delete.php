<?php
 include 'connection.php';
 
 if(isset($_GET['id']))
 {
 mysqli_query($con,"DELETE FROM bloodbankparticipation WHERE Participation_id='$_GET[id]'");
 }
 mysqli_close($con);
 header('location:view_bloodpartic.php');
 ?>