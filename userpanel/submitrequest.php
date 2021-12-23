<?php
session_start();
define ('TITLE', 'Submit Request');
include('../dbconnection.php');
if($_SESSION['is_login'])
{
  $rEmail= $_SESSION['rEmail'];
}
else{
  echo "<script> location.href= '../requesterlogin.php'</script>";
}
if(isset($_REQUEST['rSubmitbtn'])){
  if(($_REQUEST['requestinfo'] == "") || ($_REQUEST['requestdesc'] == "") || ($_REQUEST['requestername'] == "" || ($_REQUEST['requesteradd1'] == "") || ($_REQUEST['requestercity'] == "") || ($_REQUEST['requesterstate'] == "") || ($_REQUEST['requesterzip'] == "") || ($_REQUEST['requesteremail'] == "") || ($_REQUEST['requesterphone'] == "") || ($_REQUEST['requestdate'] == ""))){
    $passmsg ='<div class="alert alert-danger col-sm=6  mt-2" role=" alert">All fields are required </div>' ;
  }
  else{
    $rInfo = $_REQUEST['requestinfo'];
    $rDesc = $_REQUEST['requestdesc'];
    $rName = $_REQUEST['requestername'];
    $rAdd1 = $_REQUEST['requesteradd1'];
    $rAdd2 = $_REQUEST['requesteradd2'];
    $rCity = $_REQUEST['requestercity'];
    $rState = $_REQUEST['requesterstate'];
    $rZip = $_REQUEST['requesterzip'];
    $rEmail = $_REQUEST['requesteremail'];
    $rPhone= $_REQUEST['requesterphone'];
    $rDate = $_REQUEST['requestdate'];
    

    $sql = "INSERT INTO submitrequest_tb(request_info, request_desc, 	requester_name,requester_add1,	requester_add2,requester_city,requester_state,requester_zip,requester_email,requester_mobile,request_date) VALUES('$rInfo', '$rDesc', '$rName', '$rAdd1', '$rAdd2', '$rCity', '$rState', '$rZip', '$rEmail', '$rPhone', '$rDate')";
    
    if($conn->query($sql) == TRUE)
    {
      
        $genid = mysqli_insert_id($conn);
        $_SESSION['myid'] = $genid;
        echo "<script> location.href= 'successsub.php'</script>";
    }

    else{
        $passmsg ='<div class="alert alert-danger col-sm-6  mt-2" role=" alert">Unable to submit</div>' ;
    }
  }

}
?>

<?php include('header.php');

?>

<div class="container card shadow px-5 py-4 my-5">
<form method ="POST">
    <h3 class ="text-center py-3">Submit Request</h3>
    <div class="form-group my-2">
      <label for="">Request Info</label>
      <input type="text" class="form-control" id="" placeholder="What service do you need?" name="requestinfo">
    </div>
    <div class="form-group my-2">
      <label for="">Description</label>
      <input type="text" class="form-control" id="" placeholder="Write in details.." name="requestdesc">
    </div>
    <div class="form-group my-2">
    <label for="inputName">Name</label>
    <input type="text" class="form-control" id="inputName" placeholder="Enter your name" name="requestername">
  </div>

  <div class="form-group my-2">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="requesteradd1">
  </div>
  <div class="form-group my-2">
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" name="requesteradd2">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6 my-2">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity" name="requestercity">
    </div>
    <div class="form-group col-md-4 my-2">
      <label for="inputState">State</label>
      <input type="text" class="form-control" id="inputState" name="requesterstate">
    </div>
    <div class="form-group col-md-2 my-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip" name="requesterzip" onkeypress="isInputNumber(event)">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6 my-2">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="requesteremail">
    </div>
    <div class="form-group col-md-3 my-2">
      <label for="">Mobile</label>
      <input type="text" class="form-control" id="" placeholder="Phone Number" name="requesterphone">
    </div>
    <div class="form-group col-md-3 my-2">
      <label for="inputDate">Date</label>
      <input type="date" class="form-control" id="" name="requestdate">
    </div>
  </div>
  <?php if(isset($passmsg)){ echo $passmsg;}?>
  <button type="submit" class="btn btn-danger my-4 mr-2" name="rSubmitbtn">Submit</button>
  <button type="submit" class="btn btn-secondary my-4 " name="rResetbtn"><i class="fas fa-undo"></i></button>
</form>
</div>





<!--on key press function-->
<script>
    function isInputNumber(evt){
        var ch = String.formCharCode(evt.which);
        if(!(/[0-9]/.test(ch))){
            evt.preventDefault();
        }
    }
</script>
<?php include('footer.php');?>