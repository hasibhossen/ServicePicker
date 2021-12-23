<?php 
session_start();
define ('TITLE', 'Change Admin Password');
define ('PAGE', 'changepass');
include('header.php');
include('../dbconnection.php');
if(isset($_SESSION['is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];
}else{
    echo "<script> location.href = 'login.php'</script>";
}

$sql = "SELECT a_password, a_email FROM adminlogin_tb WHERE a_email='$aEmail'";
$result = $conn->query($sql);
if($result->num_rows == 1){
  $row = $result->fetch_assoc();
  $aPassword= $row['a_password'];
}

if(isset($_REQUEST['passwordupdate'])){
  if($_REQUEST['aPassword'] == ""){
    $passmsg ='<div class="alert alert-warning col-sm=6  mt-2" role=" alert">Nothing in the field</div>' ;
  }
  else{
    $aPassword = $_REQUEST['aPassword'];
    $sql = "UPDATE adminlogin_tb SET a_password = '$aPassword' WHERE a_email= '$aEmail'";
    if ($conn->query($sql) == TRUE){
      $passmsg ='<div class="alert alert-success col-sm=6  mt-2" role=" alert">Update Successfully</div>' ;
    }
    else{
      $passmsg ='<div class="alert alert-danger col-sm=6  mt-2" role=" alert">Unable to Update</div>' ;
    }
  }
}
?>

<div class="container card shadow w-50 mx-auto my-5 py-3">
        <form class="mx-5" action="" method="POST">
          <div class="form-group mt-3">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="aEmail" aria-describedby="emailHelp" placeholder="Enter email" name="aEmail" value="<?php echo $aEmail?>" readonly>
    
          </div>
          <div class="form-group my-2">
            <label for="">Enter new Password</label>
            <input type="" class="form-control" id="aPassword" name="aPassword" value="">
          </div>
          <?php if(isset($passmsg)){ echo $passmsg;}?>
          
          <button type="submit" class="btn btn-danger my-4" name="passwordupdate">Update</button>
          
        </form>
      </div>


<?php include('footer.php');?>