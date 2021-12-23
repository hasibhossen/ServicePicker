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
    if(($_REQUEST['eName'] == "") || ($_REQUEST['eEmail'] == "") || ($_REQUEST['eMobile'] == "")|| ($_REQUEST['eCity'] == "")|| ($_REQUEST['eType'] == "")|| ($_REQUEST['ePassword'] == "")){
      $msg = '<div class = "alert alert-warning text-center my-3">Fill All Fields</div>';
    }
    else{
      $eName = $_REQUEST['eName'];
      $eEmail = $_REQUEST['eEmail'];
      $eMobile = $_REQUEST['eMobile'];
      $eCity = $_REQUEST['eCity'];
      $eType = $_REQUEST['eType'];
      $ePassword = $_REQUEST['ePassword'];
  
      $sql = "INSERT INTO employee_tb(e_name, e_email, e_mobile,e_city, e_type, e_password) VALUES('$eName', '$eEmail', '$eMobile', '$eCity', '$eType', '$ePassword')";
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
                <h6 class="m-0 font-weight-bold text-primary">Add New Employee</h6>
             </div>
            <div class="card-body">
            <form>
        <div class="form-group">
          <label for="exampleInputEmail1">Employee Name</label>
          <input type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" placeholder="Enter Name" name="eName"> 
          </div>
          <div class="form-group">
          <label for="exampleInputEmail1">Employee Email</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="eEmail"> 
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Employee Mobile</label>
          <input type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" placeholder="Enter Phone Number" name="eMobile"> 
          </div>
          <div class="form-group">
          <label for="exampleInputEmail1">Employee City</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter City" name="eCity"> 
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Employee Type</label>
          <input type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" placeholder="Enter Type" name="eType"> 
          </div>
          
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="ePassword">
        </div>
        <div class="text-center py-3 ">
        <button type="submit" class="btn btn-primary mx-2" name="rSignup">Submit</button>
        <a href="technician.php" class="btn btn-secondary mx-2">Close</a>
        </div>
        <?php if(isset($msg)){echo $msg;}?>

      </form>

            </div>
        </div> 
     </div>

<?php include('footer.php');?>