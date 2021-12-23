<?php 
session_start();
define ('PAGE', 'work');
define ('TITLE', 'Work Order');
include('header.php');
include('../dbconnection.php');
if(isset($_SESSION['is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];
}else{
    echo "<script> location.href = 'login.php'</script>";
}
?>
<div class="container">
    
    <?php
        if(isset($_REQUEST['view'])){
            $sql = "SELECT * FROM assignwork_tb WHERE request_id = {$_REQUEST['id']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            
        ?>
        <div class="card shadow pt-2 px-5 pb-5">
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
            <form class="text-center m-3 d-print-none d-inline">
            <input type="submit" value="Print" class="btn btn-danger " onClick="window.print()">
            </form>
            <form action="work.php" class="m-3 d-print-none d-inline" >
            <input type="submit" value="Close" class="btn btn-dark ">

            </form>
        </div>



        <?php }?>
</div>

<?php include('footer.php');?>