<?php 
session_start();
define ('PAGE', 'request');
define ('TITLE', 'Requests');
include('header.php');
include('../dbconnection.php');

if(isset($_SESSION['is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];
}else{
    echo "<script> location.href = 'login.php'</script>";
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <?php 
            $sql = " SELECT request_id, request_info, request_desc, request_date FROM submitrequest_tb";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){

                    echo '<div class="card shadow mb-4">';
                                
                                echo'<div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">';
                                    echo 'Request ID:'.$row['request_id'];
                                echo'</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Additional Options';
                                            
                                            echo '</div>';
                                            echo'<form action="" method="POST">';
                                            echo'<input type="hidden" name="id" value='.$row["request_id"].'>';
                                            echo'<input class="dropdown-item btn" type="submit" name="view" value="View">';
                                            
                                            echo'<input class="dropdown-item btn" type="submit" name="close" value="Close">';
                                            
                                            echo'</form>';
                                            

                                            
                                            
                                        
                                        echo'</div>
                                    </div>
                                </div>
                                
                                <div class="card-body">';
                                    echo '<h5 class="card-title"><span class="text-danger">Request Info: </span>'.$row['request_info'];
                                    echo'</h5>';

                                    echo '<p>'.$row['request_desc'];
                                    echo'</p>';
                                    echo'<hr class="sidebar-divider">';
                                    echo '<small class="text-danger">Date: '.$row['request_date'];
                                    echo'</small>';
                                echo'</div>
                            </div>';
                }
                
            }
            ?>
        </div>
        <?php 
            if(isset($_REQUEST['view'])){
                $sql = " SELECT * FROM 	submitrequest_tb WHERE request_id = {$_REQUEST['id']}";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                
            }
            if(isset($_REQUEST['close'])){
                $sql = "DELETE FROM submitrequest_tb WHERE request_id = {$_REQUEST[id]}";
                if($conn->query($sql) == TRUE){
                    echo '<meta http-equiv="refresh" content = "0;URL=?closed" />';
                }   
                else{
                    echo "unable to delete";
                } 
            }
            if(isset($_REQUEST['assign'])){
                if(($_REQUEST['request_id'] == "") || ($_REQUEST['request_info'] == "") || ($_REQUEST['requestdesc'] == "") || ($_REQUEST['requestername'] == "") || ($_REQUEST['requesteradd1'] == "") || ($_REQUEST['requesteradd2'] == "") || ($_REQUEST['requestercity'] == "") || ($_REQUEST['requesterstate'] == "") || ($_REQUEST['requesterzip'] == "") || ($_REQUEST['requesteremail'] == "") || ($_REQUEST['requestermobile'] == "") || ($_REQUEST['assignemp'] == "") || ($_REQUEST['assigndate'] == "")){
                    $msg = '<div class="alert alert-danger text-center col-sm-6 mt-2">Fill All Fields</div>';
                }
                else{
                    $rid = $_REQUEST['request_id'];
                    $rinfo = $_REQUEST['request_info'];
                    $rdesc = $_REQUEST['requestdesc'];
                    $rname = $_REQUEST['requestername'];
                    $radd1 = $_REQUEST['requesteradd1'];
                    $radd2 = $_REQUEST['requesteradd2'];
                    $rcity = $_REQUEST['requestercity'];
                    $rstate = $_REQUEST['requesterstate'];
                    $rzip = $_REQUEST['requesterzip'];
                    $remail = $_REQUEST['requesteremail'];
                    $rmobile = $_REQUEST['requestermobile'];
                    $rassigntech = $_REQUEST['assignemp'];
                    $rdate = $_REQUEST['assigndate'];

                    $sql = "INSERT INTO assignwork_tb (request_id, request_info, request_desc, requester_name, requester_add1, requester_add2, requester_city, requester_state, requester_zip, requester_email, requester_mobile, assign_tech, assign_date) VALUES ('$rid', '$rinfo', '$rdesc', '$rname', '$radd1', '$radd2', '$rcity', '$rstate', '$rzip', '$remail', '$rmobile', '$rassigntech', '$rdate')";
                    if($conn->query($sql) == TRUE){
                        $msg = '<div class="alert alert-success col-sm-6  mt-2">Work assign successfully</div>';
                        
                    }
                    else{
                        $msg = '<div class="alert alert-warning col-sm-6  mt-2">Unable to Assign Work</div>';
                    }
                }
            }
            ?>

                <div class="col-md-8 card shadow pt-4 px-5">
                    <form class="" method="POST">
                        <h3 class="text-center">Assign Work Order Requests</h3>
                        <div class="form-group ">
                        <label for="">Request ID</label>
                        <input type="text" class="form-control" id="" placeholder="" name="request_id" readonly value="<?php if(isset($row['request_id']))echo $row['request_id'];?>">
                        </div>
                        <div class="form-group ">
                        <label for="">Request Info</label>
                        <input type="text" class="form-control" id="" placeholder="" name="request_info" value="<?php if(isset($row['request_info']))echo $row['request_info'];?>">
                        </div>
                        <div class="form-group">
                        <label for="">Description</label>
                        <input type="text" class="form-control" id="" placeholder="" name="requestdesc" value="<?php if(isset($row['request_desc']))echo $row['request_desc'];?>">
                        </div>
                        <div class="form-group">
                        <label for="inputName">Name</label>
                        <input type="text" class="form-control" id="inputName" placeholder="" name="requestername" value="<?php if(isset($row['requester_name']))echo $row['requester_name'];?>">
                        </div>

                        <div class="row">
                        <div class="form-group col-md-6">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="" name="requesteradd1" value="<?php if(isset($row['requester_add1']))echo $row['requester_add1'];?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress2">Address 2</label>
                        <input type="text" class="form-control" id="inputAddress2" placeholder="" name="requesteradd2" value="<?php if(isset($row['requester_add2']))echo $row['requester_add2'];?>">
                        </div>
                        </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input type="text" class="form-control" id="inputCity" name="requestercity" value="<?php if(isset($row['requester_city']))echo $row['requester_city'];?>">
                        </div>
                        <div class="form-group col-md-4">
                        <label for="inputState">State</label>
                        <input type="text" class="form-control" id="inputState" name="requesterstate" value="<?php if(isset($row['requester_state']))echo $row['requester_state'];?>">
                        </div>
                        <div class="form-group col-md-2">
                        <label for="inputZip">Zip</label>
                        <input type="text" class="form-control" id="inputZip" name="requesterzip" value="<?php if(isset($row['requester_zip']))echo $row['requester_zip'];?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="" name="requesteremail" value="<?php if(isset($row['requester_email']))echo $row['requester_email'];?>">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="">Mobile</label>
                        <input type="text" class="form-control" id="" placeholder="" name="requestermobile" value="<?php if(isset($row['requester_mobile']))echo $row['requester_mobile'];?>">
                        </div>
                    </div>
                        <div class="row">
                        <div class="form-group col-md-6">
                        <label for="">Assign To</label>
                        <input type="text" class="form-control" id="" placeholder="" name="assignemp" value="">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputDate">Date</label>
                            <input type="date" class="form-control" id="" name="assigndate"value="">
                            </div>
                        </div>
                        <div class="float-right pt-5">
                        <button type="submit" class="btn btn-success " name="assign">Assign</button>
                        <button type="submit" class="btn btn-dark " name="rresetbtn">Reset</button>
                        </div>
                        <?php if(isset($msg)){echo $msg;}?>
                    </form>
                    </div>



    </div>
</div>


<?php include('footer.php');?>