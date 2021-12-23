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
        <div class="container mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Ordered Works</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                        <?php 
                            $sql = "SELECT * FROM assignwork_tb";
                            $result = $conn->query($sql);
                            if($result->num_rows > 0){
                                echo'<table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">Req ID</th>
                                        <th scope="col">Req Info</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">City</th>
                                        <th scope="col">Mobile</th>
                                        <th scope="col">Employee</th>
                                        <th scope="col">Assigned Date</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                    while($row = $result->fetch_assoc()){
                                    echo' <tr>';
                                            echo'<td>'.$row['request_id'].'</td>';
                                            echo'<td>'.$row['request_info'].'</td>';
                                            echo'<td>'.$row['requester_name'].'</td>';
                                            echo'<td>'.$row['requester_add1'].'</td>';
                                            echo'<td>'.$row['requester_city'].'</td>';
                                            echo'<td>'.$row['requester_mobile'].'</td>';
                                            echo'<td>'.$row['assign_tech'].'</td>';
                                            echo'<td>'.$row['assign_date'].'</td>';
                                            echo'<td>';
                                            echo'<form action="viewassignwork.php" method="POST" class="d-inline px-1">';
                                            echo'<input type="hidden" name="id" value='.$row['request_id'].'><button class="btn btn-warning" name="view" value="View" type="submit"><i class="far fa-eye"></i></button>';
                                            echo'</form>';
                                            echo'<form action="" method="POST" class="d-inline px-1">';
                                            echo'<input type="hidden" name="id" value='.$row['request_id'].'><button class="btn btn-secondary" name="delete" value="Delete" type="submit"><i class="far fa-trash-alt"></i></button>';
                                            echo'</form>';
                                            echo'</td>';

                                            
                                        echo '</tr>';
                                    }
                                        
                                    echo'</tbody>
                                    </table>';
                            
                            }
                            else{
                                echo '<div class="alert alert-success mt-5 text-center">There is no assigned work.</div>';
                            }
                            if(isset($_REQUEST['delete'])){
                                $sql = "DELETE FROM assignwork_tb WHERE request_id = {$_REQUEST['id']}";
                                if($conn->query($sql) == TRUE){
                                    echo'<meta http-equiv ="refresh" content= "0;URL=?deleted"/>';
                                }
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>


<?php include('footer.php');?>