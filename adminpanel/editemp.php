<?php 
session_start();
define ('PAGE', 'technician');
define ('TITLE', 'Employer List');
include('header.php');
include('../dbconnection.php');
if(isset($_SESSION['is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];
}else{
    echo "<script> location.href = 'login.php'</script>";
}
?>
<div class="container card shadow py-5">
    <h3 class="text-center pb-5">Update Employee Details</h3>
    <?php 
    if(isset($_REQUEST['edit'])){
        $sql = "SELECT * FROM employee_tb WHERE e_id = {$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    if(isset($_REQUEST['empupdate'])){
        if(($_REQUEST['e_id'] == "") || ($_REQUEST['e_name'] == "") || ($_REQUEST['e_email'] == "") || ($_REQUEST['e_mobile'] == "" )|| ($_REQUEST['e_city'] == "") || ($_REQUEST['e_type'] == "" )||($_REQUEST['e_password'] == "")){
            $msg = '<div class = "alert alert-warning text-center my-3">Fill All Fields</div>' ;
        }else{
            $eid = $_REQUEST['e_id']; 
            $ename = $_REQUEST['e_name'];
            $eemail = $_REQUEST['e_email'];
            $emobile = $_REQUEST['e_mobile']; 
            $ecity = $_REQUEST['e_city'];
            $etype = $_REQUEST['e_type'];
            $epass = $_REQUEST['e_password'];
            $sql = "UPDATE employee_tb SET e_name = '$ename',e_email = '$eemail', e_mobile = '$emobile' , e_city= '$ecity' , e_type = '$etype' , e_password = '$epass' WHERE e_id = '$eid'";
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
            <label for="e_id">Employee ID:</label>
            <input type="text" class="form-control" id="e_id" name="e_id" value="<?php if(isset($row['e_id'])){echo $row['e_id'];}?>" readonly>
            
        </div>
        <div class="form-group">
            <label for="e_name">Employee Name:</label>
            <input type="text" class="form-control" id="e_name" name="e_name" value="<?php if(isset($row['e_name'])){echo $row['e_name'];}?>" >
            
        </div>
        <div class="form-group">
            <label for="e_email">Employee Email:</label>
            <input type="text" class="form-control" id="e_email" name="e_email" value="<?php if(isset($row['e_email'])){echo $row['e_email'];}?>" >    
        </div>
        <div class="form-group">
            <label for="e_mobile">Employee Phone:</label>
            <input type="text" class="form-control" id="e_mobile" name="e_mobile" value="<?php if(isset($row['e_mobile'])){echo $row['e_mobile'];}?>">
            
        </div>
        <div class="form-group">
            <label for="e_city">Employee CIty:</label>
            <input type="text" class="form-control" id="e_city" name="e_city" value="<?php if(isset($row['e_city'])){echo $row['e_city'];}?>">
            
        </div>
        <div class="form-group">
            <label for="e_type">Employee Type:</label>
            <input type="text" class="form-control" id="e_type" name="e_type" value="<?php if(isset($row['e_type'])){echo $row['e_type'];}?>" >
            
        </div>
        <div class="form-group">
            <label for="e_password">Employee Password:</label>
            <input type="text" class="form-control" id="e_password" name="e_password" value="<?php if(isset($row['e_password'])){echo $row['e_password'];}?>" >
            
        </div>
        <div class="text-center py-3">
        <button type= "submit" class="btn btn-danger mx-2" id="empupdate" name="empupdate">Update</button>
        <a href="technician.php" class="btn btn-secondary mx-2">Close</a>
        </div>
        <?php if(isset($msg)){echo $msg;}?>
    </form>
</div>

<?php include('footer.php');?>