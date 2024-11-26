
 <?php
 include 'connection.php';
 
 if(isset($_GET['id']))
 {
 mysqli_query($con,"DELETE FROM bloodcamp WHERE Camp_id='$_GET[id]'");
 }
 mysqli_close($con);
 header('location:bloodcamp_view.php');
 ?>
