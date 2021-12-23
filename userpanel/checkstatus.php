<?php 
session_start();
define ('TITLE', 'Check Status');
include('header.php');
include('../dbConnection.php');
if($_SESSION['is_login'])
{
  $rEmail= $_SESSION['rEmail'];
}
else{
  echo "<script> location.href= '../requesterlogin.php'</script>";
}
?>
<div class="container py-5 m-5 ">
    <form action="" method="POST" class="d-print-none w-50 mx-auto">
        <div class="form-group">
            <lebel for="checkid">Enter your ID:</lebel>
            <input type="text" class="form-control" name="checkid" id="checkid" onkeypress="isInputNumber(event)">
        </div>
        <button type="submit" class="btn btn-danger my-4 ">Search</button>
    </form>
    <?php
        if(isset($_REQUEST['checkid'])){
            if($_REQUEST['checkid'] == ""){
                $msg = '<div class="alert alert-danger mt-5 text-center">Enter Id. Try Again.</div>';
            }else{
                $sql = "SELECT * FROM assignwork_tb WHERE request_id = {$_REQUEST['checkid']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if(($row['request_id'] == $_REQUEST['checkid'])){
        ?>
        <div class=" container w-75 mx-auto card shadow pt-2 my-2">
        <h3 class="text-center my-5">Assigned Work Details</h3>
            <table class="table">
            <tbody>
            <tr>
                <td>Request ID:</td>
                <td><?php if(isset($row['request_id'])){echo $row ['request_id'];} ?></td>
            </tr>
            <tr>
                <td>Request Info:</td>
                <td><?php if(isset($row['request_info'])){echo $row ['request_info'];} ?></td>
            </tr>
            <tr>
                <td>Description:</td>
                <td><?php if(isset($row['request_desc'])){echo $row ['request_desc'];} ?></td>
            </tr>
            <tr>
                <td>Requester Name:</td>
                <td><?php if(isset($row['requester_name'])){echo $row ['requester_name'];} ?></td>
            </tr>
            <tr>
                <td>Requester Address:</td>
                <td><?php if(isset($row['requester_add1'])){echo $row ['requester_add1'];} ?></td>
            </tr>
            <tr>
                <td>Requester Address 2:</td>
                <td><?php if(isset($row['requester_add2'])){echo $row ['requester_add2'];} ?></td>
            </tr>
            <tr>
                <td>Requester City:</td>
                <td><?php if(isset($row['requester_city'])){echo $row ['requester_city'];} ?></td>
            </tr>
            <tr>
                <td>Requester State:</td>
                <td><?php if(isset($row['requester_state'])){echo $row ['requester_state'];} ?></td>
            </tr>
            <tr>
                <td>Requester Zip:</td>
                <td><?php if(isset($row['requester_zip'])){echo $row ['requester_zip'];} ?></td>
            </tr>
            <tr>
                <td>Requester Email:</td>
                <td><?php if(isset($row['requester_email'])){echo $row ['requester_email'];} ?></td>
            </tr>

            <tr>
                <td>Requester Mobile:</td>
                <td><?php if(isset($row['requester_mobile'])){echo $row ['requester_mobile'];} ?></td>
            </tr>
            <tr>
                <td>Assign Date:</td>
                <td><?php if(isset($row['assign_date'])){echo $row ['assign_date'];} ?></td>
            </tr>
            <tr>
                <td>Serviceman Name:</td>
                <td><?php if(isset($row['assign_tech'])){echo $row ['assign_tech'];} ?></td>
            </tr>
            <tr>
                <td>Serviceman Signature:</td>
                <td>____________</td>
            </tr>
            <tr>
                <td>Customer Signature:</td>
                <td>____________</td>
            </tr>
            
            
            </tbody>
        </table>
        <div class="text-center">
            <form action="">
            <input type="submit" value="Print" class="btn btn-danger m-3 d-print-none" onClick="window.print()">
            <input type="submit" value="Close" class="btn btn-dark m-3 d-print-none">

            </form>
        </div>
        <?php } else{
            if(isset($_REQUEST['checkid'])){
                $sql = "SELECT request_id FROM submitrequest_tb WHERE request_id = {$_REQUEST['checkid']}";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                if(($row['request_id'] == $_REQUEST['checkid'])){
            echo '<div class="alert alert-warning mt-5 text-center">Your Request is still pending</div>';
                }
                else{
                    echo '<div class="alert alert-danger mt-5 text-center">Wrong Request ID. Try Again.</div>';
                }
            }
            }
            
        } }?>
        <?php if(isset($msg)){echo $msg;}?>
        </div>
        

    
</div>
<script>
function isInputNumber(evt){
    var ch = String.fromCharCode(evt.which);
    if(!(/[0-9]/.test(ch))){
        evt.preventDefault();
    }
}
</script>


<?php include('footer.php');?>