<!DOCTYPE html >
 <html >
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>Untitled Document</title>
 </head>
 <body>
 <?php
 session_start();
 if(isset($_POST['submit']))
 {
 unset($_SESSION['uid']);
session_destroy();
//exit();
 }
 if(!empty($_SESSION['uid']))
 {
 echo "<h1>Welcome &nbsp; <font color='RED'><i><u>" .$_SESSION['uid']. "</u></i></font> 
&nbsp; To Our Website</h1>";
 }
else
{
 header('location:index.php'); }
 ?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
 <input type="submit" name="submit" value="Logout" />
 </form>
 </body>
 </html>