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
 background-color: silver;
 }
 .div{
        font-family: monospace;
        margin-top: 100px;
        margin-bottom: 100px;
        box-shadow: -1px 4px 26px 11px rgba(0, 0, 0, 0.5);
        border-radius: 20px;
        padding: 50px;
        color: blacksmoke;
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
 
 <div class="container div">
<table class="table table-hover">
	 <thead>
 <tr>
 <td colspan="8" align="center" > <h1>Blood extract  </h1> </td>
 </tr>
 <tr>
    <th>sno</th>
  <th>Groupid</th>

 <th>ExtractName</th>
 <th> Quantity_per_unit</th>
 <th>Unit</th>
 <th> Price_per_unit </th>

 <th>Update / Delete</th>
 </tr>
</thead>
 <?php
 include 'connection.php';
  $sqlview="SELECT a.Id,a.Groupid, a.ExtractName, a.Quantity_per_unit, a.Unit,a.Price_per_unit, a.id, b.Name,b.Type
  FROM bloodextract as a left join Bloodgroup as b on a.Groupid=b.Groupid ";
 $result= mysqli_query($con,$sqlview);
 $sno=1;
 echo " <tbody>";
 while($row=mysqli_fetch_array($result))
 {
 echo" <tr>";
 echo "<td>".$sno."</td> <td>".$row['Name']." ".$row['Type']."</td> <td>".$row['ExtractName']."</td> <td>".$row['Quantity_per_unit']."</td> <td>".$row['Unit']."</td> <td>".$row['Price_per_unit']."</td> 
<td>
 <a href='extract_update.php?Groupid=".$row['Id']."'>Update </a>
 
 <a href='delete_bloodextract.php?Groupid=".$row['Id']."'>Delete</a></td>";

 echo" </tr>";
 $sno++;
 }
 echo " </tbody>
 </table>";
 ?>
 </div>
 </body>
</html>