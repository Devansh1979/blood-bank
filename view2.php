<!DOCTYPE html>
 <html>
 <head>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="css/bootstrap.min.css">
 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <style type="text/css">
 .table-hover>tbody tr:hover
 {
       background-image: linear-gradient(0deg, lightblue 0%, lightpink 100% );


 }
 .div1
 {
        font-family: monospace;
        margin-top: 100px;
        margin-bottom: 100px;
        box-shadow: -1px 4px 26px 11px rgba(0, 0, 0, 0.5);
        border-radius: 20px;
        padding: 50px;
        color: black;
        background-color: rgba(0, 0, 0.4, 0);
    }
    body{
        background-image: url(images/Inv.jpeg);
        background-size: 2000px;
        background-repeat: no-repeat;
        background-attachment: fixed;

    }
 </style>
 </head>
 <body>
 
 <div class="container div1">
<table class="table table-hover" border="1" >
	 <thead>
 <tr>
 <td colspan="8" align="center" > <h1>Blood Group  </h1> </td>
 </tr>
 <tr>
 <th>S.no</th>
 <th> Name</th>
 <th>Type</th>

 <th>Update / Delete</th>
 </tr>
</thead>
 <?php
 include 'connection.php';
 $sqlview="SELECT * FROM bloodgroup";
 $result= mysqli_query($con,$sqlview);
 $sno=1;
 echo " <tbody>";
 while($row=mysqli_fetch_array($result))
 {
 echo" <tr>";
 echo "<td>".$sno."</td> <td>".$row['Name']."</td> <td>".$row['Type']."</td> 
<td>
 <a href='update_bloodgroup.php?Groupid=".$row['Groupid']."'>Update </a>
 
 <a href='delete_bloodgroup.php?Groupid=".$row['Groupid']."'>Delete</a></td>";

 echo" </tr>";
 $sno++;
 }
 echo " </tbody>
 </table>";
 ?>
 </div>
 </body>
</html>