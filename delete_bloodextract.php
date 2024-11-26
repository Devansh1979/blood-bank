
 <?php
 include 'connection.php';
 
 if(isset($_GET['Groupid']))
 {
 mysqli_query($con,"DELETE FROM bloodextract WHERE Id='$_GET[Groupid]'");
 }
 mysqli_close($con);
 header('location:extract_view.php');
 ?>

