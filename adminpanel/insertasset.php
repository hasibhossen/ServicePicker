<?php 
session_start();
define ('PAGE', 'technician');
define ('TITLE', 'Employee List');
include('header.php');
include('../dbconnection.php');
if(isset($_SESSION['is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];
}else{
    echo "<script> location.href = 'login.php'</script>";
}
if(isset($_REQUEST['rSignup'])){
    if(($_REQUEST['aName'] == "") || ($_REQUEST['aDate'] == "") || ($_REQUEST['aTotal'] == "")|| ($_REQUEST['aAvailable'] == "")|| ($_REQUEST['aOcost'] == "")|| ($_REQUEST['aScost'] == "")){
      $msg = '<div class = "alert alert-warning text-center my-3">Fill All Fields</div>';
    }
    else{
      $aName = $_REQUEST['aName'];
      $aDate = $_REQUEST['aDate'];
      $aTotal = $_REQUEST['aTotal'];
      $aAvailable = $_REQUEST['aAvailable'];
      $aOcost = $_REQUEST['aOcost'];
      $aScost = $_REQUEST['aScost'];
  
      $sql = "INSERT INTO asset_tb(a_name, a_date, a_total, a_available, a_ocost, a_scost) VALUES('$aName', '$aDate', '$aTotal', '$aAvailable', '$aOcost', '$aScost')";
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
                <h6 class="m-0 font-weight-bold text-primary">Add New Products</h6>
             </div>
            <div class="card-body">
            <form>
        <div class="form-group">
          <label for="exampleInputEmail1">Product Name</label>
          <input type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" placeholder="Enter Name" name="aName"> 
          </div>
          <div class="form-group">
          <label for="exampleInputEmail1">Date</label>
          <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Date" name="aDate"> 
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Total</label>
          <input type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" placeholder="" name="aTotal"> 
          </div>
          <div class="form-group">
          <label for="exampleInputEmail1">Available</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="" placeholder="" name="aAvailable"> 
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Original Cost Each</label>
          <input type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" placeholder="Cost" name="aOcost"> 
          </div>
          
        <div class="form-group">
          <label for="exampleInputPassword1">Selling Cost Each</label>
          <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Cost" name="aScost" >
        </div>
        <div class="text-center py-3 ">
        <button type="submit" class="btn btn-primary mx-2" name="rSignup">Submit</button>
        <a href="product.php" class="btn btn-secondary mx-2">Close</a>
        </div>
        <?php if(isset($msg)){echo $msg;}?>

      </form>

            </div>
        </div> 
     </div>

<?php include('footer.php');?>