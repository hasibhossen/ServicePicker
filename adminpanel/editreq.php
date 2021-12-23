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
?>
<div class="container card shadow py-5">
    <h3 class="text-center pb-5">Update User Details</h3>
    <?php 
    if(isset($_REQUEST['edit'])){
        $sql = "SELECT * FROM registration_tb WHERE requester_id = {$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    if(isset($_REQUEST['requpdate'])){
        if(($_REQUEST['requester_id'] == "") || ($_REQUEST['requester_name'] == "") || ($_REQUEST['requester_email'] == "") || ($_REQUEST['requester_password'] == "")){
            $msg = '<div class = "alert alert-warning text-center my-3">Fill All Fields</div>';
        }else{
            $rid = $_REQUEST['requester_id']; 
            $rname = $_REQUEST['requester_name'];
            $remail = $_REQUEST['requester_email'];
            $rpass = $_REQUEST['requester_password'];
            $sql = "UPDATE registration_tb SET requester_name = '$rname',requester_email = '$remail', requester_password = '$rpass' WHERE requester_id = '$rid'";
            if($conn->query($sql) == TRUE){
                $msg = '<div class = "alert alert-success text-center my-3">Update Successfully</div>';
            }else{
                $msg = '<div class = "alert alert-danger text-center my-3">Unable to update</div>';
            }

        }
    }
    ?>
    <form action="" method="POST">
        <div class="form-group">
            <label for="requester_id">User ID:</label>
            <input type="text" class="form-control" id="requester_id" name="requester_id" value="<?php if(isset($row['requester_id'])){echo $row['requester_id'];}?>" readonly>
            
        </div>
        <div class="form-group">
            <label for="requester_name">User Name:</label>
            <input type="text" class="form-control" id="requester_name" name="requester_name" value="<?php if(isset($row['requester_name'])){echo $row['requester_name'];}?>" >
            
        </div>
        <div class="form-group">
            <label for="requester_email">User Email:</label>
            <input type="text" class="form-control" id="requester_email" name="requester_email" value="<?php if(isset($row['requester_email'])){echo $row['requester_email'];}?>" >
            
        </div>
        <div class="form-group">
            <label for="requester_password">User Password:</label>
            <input type="text" class="form-control" id="requester_password" name="requester_password" value="<?php if(isset($row['requester_password'])){echo $row['requester_password'];}?>" >
            
        </div>
        <div class="text-center py-3">
        <button type= "submit" class="btn btn-danger mx-2" id="requpdate" name="requpdate">Update</button>
        <a href="requester.php" class="btn btn-secondary mx-2">Close</a>
        </div>
        <?php if(isset($msg)){echo $msg;}?>
    </form>
</div>

<?php include('footer.php');?>