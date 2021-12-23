<?php 
include('dbconnection.php');
session_start();
if(!isset($_SESSION['is_login'])){
    if(isset($_REQUEST['rEmail'])){
        $rEmail = mysqli_real_escape_string ($conn, trim($_REQUEST['rEmail']));
        $rPassword = mysqli_real_escape_string ($conn,trim($_REQUEST['rPassword']));
        $sql = "SELECT requester_email, requester_password  FROM registration_tb WHERE requester_email='".$rEmail."'AND requester_password= '".$rPassword."' limit 1";
        $result= $conn->query($sql);
        if($result->num_rows == 1){
            $_SESSION['is_login']= true;
            $_SESSION['rEmail'] = $rEmail;
            echo "<script> location.href='userpanel/submitrequest.php';</script>";
        exit;
        }
        else{
            echo "Login Failed";
        }
    
    }
}
else{
    echo "<script> location.href='userpanel/requesterprofile.php';</script>";
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>User Login</title>
</head>
<body>
    <div class="container">
    <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="rEmail">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="rPassword">
  </div>
  <button type="submit" class="btn btn-primary" name="rLogin">Login</button>
</form>
    </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>