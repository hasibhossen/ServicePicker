<?php 
session_start();
define ('PAGE', 'product');
define ('TITLE', 'Products');
include('header.php');
include('../dbconnection.php');
if(isset($_SESSION['is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];
}else{
    echo "<script> location.href = 'login.php'</script>";
}
?>
<div class="container card shadow py-5">
    <h3 class="text-center pb-5">Update Product Details</h3>
    <?php 
    if(isset($_REQUEST['edit'])){
        $sql = "SELECT * FROM asset_tb WHERE a_id = {$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    if(isset($_REQUEST['assetupdate'])){
        if(($_REQUEST['a_id'] == "") || ($_REQUEST['a_name'] == "") || ($_REQUEST['a_date'] == "") || ($_REQUEST['a_available'] == "" )|| ($_REQUEST['a_total'] == "") || ($_REQUEST['a_ocost'] == "" )||($_REQUEST['a_scost'] == "")){
            $msg = '<div class = "alert alert-warning text-center my-3">Fill All Fields</div>' ;
        }else{
            $aid = $_REQUEST['a_id']; 
            $aname = $_REQUEST['a_name'];
            $adate = $_REQUEST['a_date'];
            $aavailable = $_REQUEST['a_available']; 
            $atotal = $_REQUEST['a_total'];
            $aocost = $_REQUEST['a_ocost'];
            $ascost = $_REQUEST['a_scost'];
            $sql = "UPDATE asset_tb SET a_name = '$aname',a_date = '$adate', a_available = '$aavailable' , a_total= '$atotal' , a_ocost = '$aocost' , a_scost = '$ascost' WHERE a_id = '$aid'";
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
            <label for="a_id">Product ID:</label>
            <input type="text" class="form-control" id="a_id" name="a_id" value="<?php if(isset($row['a_id'])){echo $row['a_id'];}?>" readonly>
            
        </div>
        <div class="form-group">
            <label for="a_name">Product Name:</label>
            <input type="text" class="form-control" id="a_name" name="a_name" value="<?php if(isset($row['a_name'])){echo $row['a_name'];}?>" >
            
        </div>
        <div class="form-group">
            <label for="a_date">Product Date:</label>
            <input type="date" class="form-control" id="a_date" name="a_date" value="<?php if(isset($row['a_date'])){echo $row['a_date'];}?>" >    
        </div>
        <div class="form-group">
            <label for="a_available">Available:</label>
            <input type="text" class="form-control" id="a_available" name="a_available" value="<?php if(isset($row['a_available'])){echo $row['a_available'];}?>">
            
        </div>
        <div class="form-group">
            <label for="a_total">Total:</label>
            <input type="text" class="form-control" id="a_total" name="a_total" value="<?php if(isset($row['a_total'])){echo $row['a_total'];}?>">
            
        </div>
        <div class="form-group">
            <label for="a_ocost">Original Cost Each:</label>
            <input type="text" class="form-control" id="a_ocost" name="a_ocost" value="<?php if(isset($row['a_ocost'])){echo $row['a_ocost'];}?>" >
            
        </div>
        <div class="form-group">
            <label for="a_scost">Selling Cost Each:</label>
            <input type="text" class="form-control" id="a_scost" name="a_scost" value="<?php if(isset($row['a_scost'])){echo $row['a_scost'];}?>" >
            
        </div>
        <div class="text-center py-3">
        <button type= "submit" class="btn btn-danger mx-2" id="assetupdate" name="assetupdate">Update</button>
        <a href="product.php" class="btn btn-secondary mx-2">Close</a>
        </div>
        <?php if(isset($msg)){echo $msg;}?>
    </form>
</div>

<?php include('footer.php');?>