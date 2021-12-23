<?php 
define ('TITLE', 'User Profile');
include('../dbConnection.php');
session_start();
if($_SESSION['is_login'])
{
  $rEmail= $_SESSION['rEmail'];
}
else{
  echo "<script> location.href= '../requesterlogin.php'</script>";
}
$sql = "SELECT requester_password, requester_email FROM registration_tb WHERE requester_email='$rEmail'";
$result = $conn->query($sql);
if($result->num_rows == 1){
  $row = $result->fetch_assoc();
  $rPassword= $row['requester_password'];
}

if(isset($_REQUEST['passwordupdate'])){
  if($_REQUEST['rPassword'] == ""){
    $passmsg ='<div class="alert alert-warning col-sm=6  mt-2" role=" alert">Nothing in the field</div>' ;
  }
  else{
    $rPassword = $_REQUEST['rPassword'];
    $sql = "UPDATE registration_tb SET requester_password = '$rPassword' WHERE requester_email= '$rEmail'";
    if ($conn->query($sql) == TRUE){
      $passmsg ='<div class="alert alert-success col-sm=6  mt-2" role=" alert">Update Successfully</div>' ;
    }
    else{
      $passmsg ='<div class="alert alert-danger col-sm=6  mt-2" role=" alert">Unable to Update</div>' ;
    }
  }
}

?>
<?php include('header.php');?>


    
      <!--start profile area-->
      <div class="container w-50 mx-auto my-5 py-3">
        <form class="mx-5" action="" method="POST">
          <div class="form-group mt-3">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="rEmail" aria-describedby="emailHelp" placeholder="Enter email" name="rEmail" value="<?php echo $rEmail?>" readonly>
    
          </div>
          <div class="form-group my-2">
            <label for="">Enter new Password</label>
            <input type="" class="form-control" id="rPassword" name="rPassword" value="">
          </div>
          <?php if(isset($passmsg)){ echo $passmsg;}?>
          
          <button type="submit" class="btn btn-danger my-4" name="passwordupdate">Update</button>
          
        </form>
      </div>
        <!--profile area End-->

        <?php include('footer.php');?>





