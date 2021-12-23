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
$sql = "SELECT requester_name, requester_email FROM registration_tb WHERE requester_email='$rEmail'";
$result = $conn->query($sql);
if($result->num_rows == 1){
  $row = $result->fetch_assoc();
  $rName= $row['requester_name'];
}

if(isset($_REQUEST['nameupdate'])){
  if($_REQUEST['rName'] == ""){
    $passmsg ='<div class="alert alert-warning col-sm=6  mt-2" role=" alert">Enter a Name</div>' ;
  }
  else{
    $rName = $_REQUEST['rName'];
    $sql = "UPDATE registration_tb SET requester_name = '$rName' WHERE requester_email= '$rEmail'";
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
          <div class="form-group my-2">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="rEmail" aria-describedby="emailHelp" placeholder="Enter email" name="rEmail" value="<?php echo $rEmail?>" readonly>
    
          </div>
          <div class="form-group">
            <label for="">User Name</label>
            <input type="" class="form-control" id="rName" name="rName" value="<?php echo $rName ?>">
          </div>
          <?php if(isset($passmsg)){ echo $passmsg;}?>
          <button type="submit" class="btn btn-danger my-4" name="nameupdate">Update</button>
        </form>
        <small class="ml-5 "><a href="requesterchangepass.php" class="text-danger">Forget Password?</a></small>
      </div>
        <!--profile area End-->

        <?php include('footer.php');?>





