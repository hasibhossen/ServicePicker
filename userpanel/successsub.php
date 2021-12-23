<?php
session_start();
define ('TITLE', 'Submit Request');
include('../dbconnection.php');
if($_SESSION['is_login'])
{
  $rEmail= $_SESSION['rEmail'];
}
else{
  echo "<script> location.href= '../requesterlogin.php'</script>";
}
?>

<?php include('header.php');?>

<div class="container card shadow w-50 mx-auto my-5 p-3">
<h2 class="text-center display-2 py-2 my-3"> Submit Successfully <i class="fas fa-laugh-beam"></i></h2>
<a href="submitrequest.php" class="text-center btn btn-danger w-50 mx-auto my-5">Go Back</a>

</div>





<!--on key press function-->

<?php include('footer.php');?>