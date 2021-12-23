<?php
session_start();
define ('PAGE', 'index');
define ('TITLE', 'Dashboard');
include('header.php');
include('../dbconnection.php');
if(isset($_SESSION['is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];
}else{
    echo "<script> location.href = 'login.php'</script>";
}
$sql = "SELECT max(request_id) FROM submitrequest_tb";
$result = $conn->query($sql);
$row = $result->fetch_row();
$submitrequest = $row[0];

$sql = "SELECT max(rno) FROM assignwork_tb";
$result = $conn->query($sql);
$row = $result->fetch_row();
$assignwork = $row[0];

$sql = "SELECT max(requester_id ) FROM registration_tb";
$result = $conn->query($sql);
$row = $result->fetch_row();
$reqcount = $row[0];



?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Welcome to Dashboard </h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
                    

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Requests Received</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $submitrequest;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                        <small><a class="text-primary" href="request.php">See more ></a></small>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Assigned Work</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $assignwork;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-briefcase fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                    <small ><a class="text-success" href="work.php">See more ></a></small>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Our Customer</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $reqcount;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                    <small><a class="text-danger" href="requester.php">See more ></a></small>
                                </div>
                            </div>
                        </div>

                    

                        <!-- Success Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Available Area</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-location-arrow fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                    <small><a class="text-warning" href="#">See more ></a></small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- DataTales Example -->
                        <div class="col-xl-6 col-md-6 mb-4">
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
                                                    
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>User ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>';
                                                while($row = $result->fetch_assoc()){
                                                echo '<tr>';
                                                echo '<td>'.$row["requester_id"].'</td>';
                                                echo '<td>'.$row["requester_name"].'</td>';
                                                echo '<td>'.$row["requester_email"].'</td>';
                                                echo '</tr>';
                                                    
                                                }
                                            echo '</tbody>
                                        </table>';
                                        }
                                        ?>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- DataTales Example -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">List of Employees</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                    <?php 
                                        $sql = "SELECT * FROM employee_tb";
                                        $result = $conn->query($sql);
                                        if($result->num_rows > 0){
                                            echo'<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>City</th>
                                                    <th>Type</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>City</th>
                                                    <th>Type</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>';
                                                while($row = $result->fetch_assoc()){
                                                echo '<tr>';
                                                echo '<td>'.$row["e_id"].'</td>';
                                                echo '<td>'.$row["e_name"].'</td>';
                                                echo '<td>'.$row["e_email"].'</td>';
                                                echo '<td>'.$row["e_mobile"].'</td>';
                                                echo '<td>'.$row["e_city"].'</td>';
                                                echo '<td>'.$row["e_type"].'</td>';
                                                
                                                    
                                                    
                                                }
                                            echo '</tbody>
                                        </table>';
                                        }
                                        ?>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Average Service Work</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-bar">
                                        <canvas id="myBarChart"></canvas>
                                    </div>
                                    <hr>
                                    
                                </div>
                            </div>
                

                

<?php include('footer.php');?>