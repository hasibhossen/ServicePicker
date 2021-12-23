<?php
define ('TITLE', 'Submission Receipt');
include('header.php');
include('../dbconnection.php');
session_start();
if($_SESSION['is_login'])
{
  $rEmail= $_SESSION['rEmail'];
}
else{
  echo "<script> location.href= '../requesterlogin.php'</script>";
}
$sql = "SELECT * FROM submitrequest_tb WHERE request_id= {$_SESSION['myid']}";
$result = $conn->query($sql);
if($result->num_rows == 1){
    $row = $result->fetch_assoc();
    echo "<div class='ml-5 mt-5'>
    <table class='table table-bordered'>
    <tbody>
        <h3 class='text-center'>Request Receipt</h3>
      <tr>
        <th>Request ID:</th>
        <td> ".$row['request_id']."</td>
        
      </tr>
      <tr>
      <th>Name:</th>
      <td> ".$row['requester_name']."</td>
      </tr>
      <tr>
      <th>Email ID:</th>
      <td> ".$row['requester_email']."</td>
      </tr>
      <tr>
      <th>Info:</th>
      <td> ".$row['request_info']."</td>
      </tr>
      <tr>
      <th>Description:</th>
      <td> ".$row['request_desc']."</td>
      </tr>
      <tr class=''>
      
      </tr>
    </tbody>
  </table>
  <form class ='d-print-none'><input class='btn btn-danger' type='submit' value='Print' onClick='window.print()'></form>
  </div>";

}
else{

}
?>

<?php include('footer.php');?>