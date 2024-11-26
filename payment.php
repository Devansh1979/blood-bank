<div style="background-color:silver;color: white;">


<?php
//session_start();
//ob_start();
include "header.php";

//session_start();
include 'connection.php';
	
function email_send($to,$sub,$msg)
        {
            $to_email=$to;
            $subject=$sub;
            $message=$msg;
            $heders="From: ";

            if(mail($to_email,$subject,$message,$heders))
            {
              echo "<script> alert('E-Mail Send  To you , Check your inbox '); </script>";
            }
            else
              echo "<script> alert('Your Internet connection is not Working '); </script>";
        }
	if(isset($_GET['payid']) && isset($_GET['reqid']))
	{

		 
        
		$varname= $_SESSION['pname'];
		$varloginid= $_SESSION['pid'];
		$payid= $_GET['payid'];
	$dt=date("y-m-d");
	$sqlins="INSERT INTO tab_payment(req_id,patient_id,payment_mode,amount,status,creation_date)Values('$_GET[reqid]', '$_SESSION[pid]', 'Online', '$_SESSION[total]', 'Paid','$dt')";
	if(!mysqli_query($con,$sqlins))
	{
		die('error:'.mysqli_error($con));
	}
	
	$sql11= "update requirement_request set status=1 where patient_id='".$_SESSION['pid']."'  and status=0";
    if(!mysqli_query($con,$sql11))
	{
		die('ERROR:'.mysqli_error($con));
	}
		
		echo "<div style='color:white;' >";

		echo "<br><br><br><br><br><br> <h1> Your Payment is Successfully paid  </h1><br><br> <hr>";
		echo "<h4> Your request is accepted , we will confirm you in 2 working hours. For  further query mail at request@bloodbank.com</h4> </div>";


	$msg1= " Hello $varname,\n\n Welcome to Blood Bank ,  \n\nYour Payment is Successfully paid \n\n Payment ID is : $payid Your request is accepted , we will confirm you in 2 working hours. For  further query mail at request@bloodbank.com ";
                      email_send($varloginid," Your Payment Confirmation ", $msg1);
		
	}
	


?>
</div>


<?php
include "footer.php";
?>

</body>
</html>