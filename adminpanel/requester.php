<?php 
session_start();
define ('PAGE', 'requester');
define ('TITLE', 'Users List');
include('header.php');
include('../dbconnection.php');
if(isset($_SESSION['is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];
}else{
    echo "<script> location.href = 'login.php'</script>";
}

if(isset($_REQUEST['delete'])){
    $sql = "DELETE FROM registration_tb WHERE requester_id = {$_REQUEST['id']}";
    if($conn->query($sql) == TRUE){
        echo '<meta http-equiv ="refresh" content= "0;URL=?deleted"/>';
    }
}
?>
<div class="container mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">List of Customers</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <?php 
                                        $sql = "SELECT * FROM registration_tb";
                                        $result = $conn->query($sql);
                                        if($result->num_rows > 0){
                                            echo'<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>User ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Action</th>
                                                    
                                                    
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>User ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Action</th>

                                                </tr>
                                            </tfoot>
                                            <tbody>';
                                                while($row = $result->fetch_assoc()){
                                                echo '<tr>';
                                                echo '<td>'.$row["requester_id"].'</td>';
                                                echo '<td>'.$row["requester_name"].'</td>';
                                                echo '<td>'.$row["requester_email"].'</td>';
                                                echo '<td>';
                                                    echo'<form action="editreq.php" method="POST" class="d-inline">';
                                                        echo '<input type="hidden" name="id" value='.$row["requester_id"].'><button type="submit" class="btn btn-success mr-3 " name="edit" value="Edit"><i class="fas fa-pen"></i>';
                                                        echo '</button>';
                                                    echo'</form>';

                                                    echo'<form action="" method="POST" class="d-inline">';
                                                        echo '<input type="hidden" name="id" value='.$row["requester_id"].'><button type="submit" class="btn btn-secondary mr-3 " name="delete" value="Delete"><i class="fas fa-trash-alt"></i>';
                                                        echo '</button>';
                                                    echo'</form>';
                                                echo'</td>';

                                                echo '</tr>';
                                                    
                                                }
                                            echo '</tbody>
                                        </table>';
                                        }
                                        else{
                                            echo '<div class="alert alert-danger mt-5 text-center">There is no User.</div>';
                                        }
                                        ?>
                                        
                                    </div>
                                </div>
                                <div>
                                <div class="float-right"><a href="insertreq.php" class="btn btn-danger m-2"><i class="fas fa-plus "></i></a>
                                </div>
                            </div>
                            </div>

                            
                        </div>


<?php include('footer.php');?>