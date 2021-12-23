<?php 
session_start();
define ('TITLE', 'Profile');
include('header.php');
include('../dbconnection.php');
if(isset($_SESSION['is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];
}else{
    echo "<script> location.href = 'login.php'</script>";
}
$sql = "SELECT a_name, a_email FROM adminlogin_tb WHERE a_email='$aEmail'";
$result = $conn->query($sql);
if($result->num_rows == 1){
  $row = $result->fetch_assoc();
  $aName= $row['a_name'];
}

if(isset($_REQUEST['nameupdate'])){
  if($_REQUEST['aName'] == ""){
    $passmsg ='<div class="alert alert-warning col-sm=6  mt-2" role=" alert">Enter a Name</div>' ;
  }
  else{
    $aName = $_REQUEST['aName'];
    $sql = "UPDATE adminlogin_tb SET a_name = '$aName' WHERE a_email= '$aEmail'";
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
          <div class="form-group my-2">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="rEmail" aria-describedby="emailHelp" placeholder="Enter email" name="rEmail" value="<?php echo $aEmail?>" readonly>
    
          </div>
          <div class="form-group">
            <label for="">User Name</label>
            <input type="" class="form-control" id="rName" name="rName" value="<?php echo $aName ?>">
          </div>
          <?php if(isset($passmsg)){ echo $passmsg;}?>
          <button type="submit" class="btn btn-danger my-4" name="nameupdate">Update</button>
        </form>
        <small class="ml-5 "><a href="changepass.php" class="text-danger">Forget Password?</a></small>
      </div>


<?php include('footer.php');?>