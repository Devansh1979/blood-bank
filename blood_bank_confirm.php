
<?php
 
 include 'blood_bank_header.php';
 
?>



	<!-- Home -->
  
 
	<div class="home">
		<div class="home_background_container prlx_parent">
			<div class="home_background prlx" style="background-image:url(images/contact_background.jpg)"></div>
		</div>
		<div class="home_content">
			<h1>STUDENT_ASSIGNMENT VIEW</h1>
		</div>
	</div>

	<!-- Contact -->

	<div class="contact">
		<div class="container">






			<div class="row">
				<div class="col-lg-12">
					
					<!-- Contact Form -->
					<div class="contact_form">

<div class="container bg">
  <table class="table table-striped">
    <thead>
    <tr>
    	<td colspan="10" align="center" >  <h1>Submitted  Assignment </h1> </td>
        </tr>
      <tr>
        <th>S.no</th>
        <th>StudentID</th>
        <th>Topic</th>
        <th>Tutor</th>
        <th>Assignment</th>
        <th>Asg_Upload_Date</th>
        <th>Asg_Due_Date</th>
        <th>Status</th>
        <th>Asgt_Title</th>
        <th>Asg_Detail</th>
        <th>Update / Delete</th>
      </tr>
    </thead>
    
    
    <?php
	include 'Connection.php';

    if(isset($_GET['status']))
    {

         $varaid= $_GET['aid'];
         $varst=$_GET['status'];
          if($varst==1)
        $sqlupd="update tab_student_assignment  set status='Approved' where  asg_id=".$varaid;
          else
            $sqlupd="update tab_student_assignment  set status='Rejected' where  asg_id=".$varaid;

          if (!mysqli_query($con,$sqlupd))
        {
        die('Error: ' . mysqli_error($con));
        }
        echo "1 record added";
        
        //mysqli_close($con);
        
        }

    





	$sqlview="SELECT * FROM tab_student_assignment ";
	$result=mysqli_query($con,$sqlview);
	$sno=1;
    echo " <tbody>";
   	while($row=mysqli_fetch_array($result))
{
    echo"  <tr>";
	
     echo "<td>".$sno."</td>  <td>".$row['student_id']."</td> <td>".$row['topic_id']."</td>   <td>".$row['tutor_id']."</td> <td><a href='".$row['assignment_upload_path']."' target='_blank' > Download Assignment </a></td><td>".$row['asg_upload_date']."</td><td>".$row['asg_due_date']."</td>
     <td>".$row['status']."</td><td>".$row['assignment_title']."</td> <td>".$row['assignment_detail']."</td> <td>
	  <a href='tutor_assignments.php?status=1&aid=".$row['asg_id']."' > Approve</a> ||
	  <a href='tutor_assignments.php?status=0&aid=".$row['asg_id']."' > Reject </a> </td>";
        
     echo" </tr>";
	  $sno++;
}
 echo " </tbody>
  </table>";
  ?>
</div>

</div>

                 </div>
          </div>
        </div>
    </div>
    <?php
	include"footer.php";
	?>