<!DOCTYPE html>
 <html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Admin Creation</title>
 <link rel="stylesheet" href="css/bootstrap.min.css" >
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 

</head>
 <body>

    <title>Bootstrap | Tables</title>

    <style>

        h1 {

            color: Red;

            text-align: center;

        }

        div {

            margin-top: 10px;

        }

    </style>

</head>

<body>

    <div class="container">

        <h1>Compatible Blood Type Donors</h1>

        <!-- table, table-primary, table-warning, table-danger -->

        <table class="table">

            <thead>

                <tr>
      <th scope="col">Blood Type</th>
      <th scope="col">Donate Blood to</th>
      <th scope="col">Receive Blood From</th>
      
    </tr>

            </thead>

            <tbody>

                <tr>
      <th scope="row">A+</th>
      <td>A+AB+</td>
      <td>A+A-O+O-</td>
     
    </tr>

                 <tr>
      <th scope="row">O+</th>
      <td>O+A+B+AB+</td>
      <td>O+O-</td>
     
    </tr>
    <tr>
      <th scope="row">B+</th>
      <td>B+AB+</td>
      <td>B+B-O+O-</td>
     
    </tr>
     <tr>
      <th scope="row">AB+</th>
      <td>AB+</td>
      <td>Everyone</td>
      
    </tr>
    <tr>
      <th scope="row">A-</th>
      <td>A+A-AB-</td>
      <td>A-O-</td>
     
    </tr>
    <tr>
      <th scope="row">O-</th>
      <td>Everyone</td>
      <td>O-</td>
      
    </tr>
    <tr>
      <th scope="row">B-</th>
      <td>B+B-AB+AB-</td>
      <td>B-O-</td>
      
    </tr>
      <tr>
      <th scope="row">AB-</th>
      <td>AB+AB-</td>
      <td>AB-A-B-O-</td>
      
    </tr>
  

            </tbody>

        </table>

        

    </div>

</body>

</html>