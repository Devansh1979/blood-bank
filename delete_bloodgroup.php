
 <body>
 <?php
 include 'connection.php';
 
 if(isset($_GET['Groupid']))
 {
 mysqli_query($con,"DELETE FROM bloodgroup WHERE Groupid='$_GET[Groupid]'");
 }
 mysqli_close($con);
 header('location:view2.php');
 ?>
 </body>