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
<div class="container card shadow py-4 mb-3">
    <h3 class="text-center pb-5">Customer Bill</h3>
    <?php 
    
    if(isset($_REQUEST['assetupdate'])){
        if(($_REQUEST['c_name'] == "") || ($_REQUEST['c_add'] == "") || ($_REQUEST['a_name'] == "" ) || ($_REQUEST['c_quantity'] == "" )||($_REQUEST['a_scost'] == "") ||($_REQUEST['c_total'] == "") ||($_REQUEST['c_date'] == "")){
            $msg = '<div class = "alert alert-warning text-center my-3">Fill All Fields</div>' ;
        }else{
            $aid = $_REQUEST['a_id']; 
            $aavailable = $_REQUEST['a_available'] - $_REQUEST['c_quantity'];

            $cname = $_REQUEST['c_name'];
            $cadd = $_REQUEST['c_add'];
            $aname = $_REQUEST['a_name'];
            $cquantity= $_REQUEST['c_quantity'];
            $ascost = $_REQUEST['a_scost'];
            $cptotal = $_REQUEST['c_total'];
            $cdate = $_REQUEST['c_date'];
            $sql = "INSERT INTO customer_tb(cusname, cusadd, cpname, cpquantity, cpeach, cptotal, cpdate) VALUES ('$cname', '$cadd', '$aname', '$cquantity', '$ascost', '$cptotal','$cdate')";
            if($conn->query($sql) == TRUE){
                $genid = mysqli_insert_id($conn);
                $_SESSION['myid']= $genid;
                echo "<script> location.href='productsellsuccess.php';</script>";
                
            }
            $sqlup = "UPDATE asset_tb SET a_available = '$aavailable' WHERE a_id = '$aid'";
            $conn->query($sqlup) == TRUE;
            
        

        }
    }
    if(isset($_REQUEST['sreport'])){
        $sql = "SELECT * FROM asset_tb WHERE a_id = {$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    ?>
    <form action="" method="POST">
        <div class="form-group">
            <label for="a_id">Product ID:</label>
            <input type="text" class="form-control" id="a_id" name="a_id" value="<?php if(isset($row['a_id'])){echo $row['a_id'];}?>" readonly>
            
        </div>
        <div class="form-group">
            <label for="c_name">Customer Name:</label>
            <input type="text" class="form-control" id="c_name" name="c_name" value="" >
            
        </div>
        <div class="form-group">
            <label for="c_add">Customer Address:</label>
            <input type="text" class="form-control" id="c_add" name="c_add" value="" >    
        </div>
        <div class="form-group">
            <label for="a_name">Product Name:</label>
            <input type="text" class="form-control" id="a_name" name="a_name" value="<?php if(isset($row['a_name'])){echo $row['a_name'];}?>" readonly>
            
        </div>
        <div class="form-group">
            <label for="a_available">Available:</label>
            <input type="text" class="form-control" id="a_available" name="a_available" value="<?php if(isset($row['a_available'])){echo $row['a_available'];}?>" readonly>
            
        </div>
        <div class="form-group">
            <label for="a_quantity">Quantity:</label>
            <input type="text" class="form-control" id="c_quantity" name="c_quantity" value="" >
            
        </div>
        <div class="form-group">
            <label for="a_scost">Selling Cost Each:</label>
            <input type="text" class="form-control" id="a_scost" name="a_scost" value="<?php if(isset($row['a_scost'])){echo $row['a_scost'];}?>" readonly >
        </div>
        <div class="form-group">
            <label for="a_scost">Date:</label>
            <input type="date" class="form-control" id="c_date" name="c_date" value="" >
        </div>
        <div class="form-group">
            <label for="a_scost">Total:</label>
            <input type="text" class="form-control" id="c_total" name="c_total" value="" >
        </div>
        <div class="text-center py-3">
        <button type= "submit" class="btn btn-danger mx-2" id="assetupdate" name="assetupdate">Submit</button>
        <a href="product.php" class="btn btn-secondary mx-2">Close</a>
        </div>
        <?php if(isset($msg)){echo $msg;}?>
    </form>
</div>

<?php include('footer.php');?>