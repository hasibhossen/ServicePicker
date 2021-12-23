<?php 
session_start();
define ('PAGE', 'requester');
define ('TITLE', 'Users List');
include('header.php');
include('../dbconnection.php');
if(isset($_SESSION['is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];
}else{
    echo "<script> location.href = 'login.php'</script>";
}
if(isset($_REQUEST['rSignup'])){
    if(($_REQUEST['rName'] == "") || ($_REQUEST['rEmail'] == "") || ($_REQUEST['rPassword'] == "")){
      $msg = '<div class = "alert alert-warning text-center my-3">Fill All Fields</div>';
    }
    else{
      $rName = $_REQUEST['rName'];
      $rEmail = $_REQUEST['rEmail'];
      $rPassword = $_REQUEST['rPassword'];
  
      $sql = "INSERT INTO registration_tb(requester_name, requester_email, requester_password) VALUES('$rName', '$rEmail', '$rPassword')";
      if($conn->query($sql)){
        $msg = '<div class = "alert alert-success text-center my-3">Added Successfully</div>';
      }else{
        $msg = '<div class = "alert alert-danger text-center my-3">Enable to add</div>';
      }

    }
  
  }
?>

    <div class="container mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add new User</h6>
             </div>
            <div class="card-body">
            <form>
        <div class="form-group">
          <label for="exampleInputEmail1">User Name</label>
          <input type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" placeholder="Enter Name" name="rName"> 
          </div>
          <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="rEmail"> 
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="rPassword">
        </div>
        <div class="text-center py-3 ">
        <button type="submit" class="btn btn-primary mx-2" name="rSignup">Submit</button>
        <a href="requester.php" class="btn btn-secondary mx-2">Close</a>
        </div>
        <?php if(isset($msg)){echo $msg;}?>

      </form>

            </div>
        </div> 
     </div>

<?php include('footer.php');?>