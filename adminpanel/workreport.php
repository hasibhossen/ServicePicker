<?php 
session_start();
define ('PAGE', 'workreport');
define ('TITLE', 'Work Report');
include('header.php');
include('../dbconnection.php');
if(isset($_SESSION['is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];
}else{
    echo "<script> location.href = 'login.php'</script>";
}
?>

<div class="container mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Search Work Report</h6>
                                </div>
                                <div class="card-body">
                                <form action="" class="d-print-none " method ="POST">
                                    <div class="form-row">
                                        <div class="form-group col-md-4 my-5 mr-3">
                                            <input type="date" class="form-control" id="startdate" name="startdate">
                                        </div>
                                        <span class="my-5"> TO </span>
                                        <div class="form-group col-md-4 my-5 ml-3">
                                            <input type="date" class="form-control" id="enddate" name="enddate">
                                        </div>
                                        <div class="form-group col-md-2 my-5 ml-3">
                                            <input type="submit" class="btn btn-danger" name="searchsubmit" id="search">
                                        </div>
                                    </div>
                                </form>
                                <div class="table-responsive">
                                <?php if(isset($_REQUEST['searchsubmit'])){
                                        $startdate = $_REQUEST['startdate'];
                                        $enddate = $_REQUEST['enddate'];
                                        $sql = "SELECT * FROM assignwork_tb WHERE assign_date BETWEEN '$startdate' AND '$enddate'";
                                        $result = $conn->query($sql);
                                        if($result->num_rows > 0){
                                            echo'<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Info</th>
                                                    <th>Description</th>
                                                    <th>Name</th>
                                                    <th>Address</th>
                                                    <th>City</th>
                                                    <th>State</th>
                                                    <th>Mobile</th>
                                                    <th>Assign To</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>';
                                                while($row = $result->fetch_assoc()){
                                                echo '<tr>';
                                                echo '<td>'.$row["request_id"].'</td>';
                                                echo '<td>'.$row["request_info"].'</td>';
                                                echo '<td>'.$row["request_desc"].'</td>';
                                                echo '<td>'.$row["requester_name"].'</td>';
                                                echo '<td>'.$row["requester_add1"].'</td>';
                                                echo '<td>'.$row["requester_city"].'</td>';
                                                echo '<td>'.$row["requester_state"].'</td>';
                                                echo '<td>'.$row["requester_mobile"].'</td>';
                                                echo '<td>'.$row["assign_tech"].'</td>';
                                                echo '<td>'.$row["assign_date"].'</td>';
                                                
                                                    
                                                    
                                                }
                                            echo '</tbody>
                                            
                                        </table>
                                        <div class="mt-3 text-center d-print-none"><button class="btn btn-danger" onClick="window.print()">Print</button></div>';
                                        }else {
                                            echo '<div class="alert alert-danger text-center my-3">No Records Found !</div>';
                                        }
                                    }
                                        ?>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>


<?php include('footer.php');?>