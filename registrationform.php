<?php 
include('dbconnection.php');
if(isset($_REQUEST['rSignup'])){
  if(($_REQUEST['rName'] == "") || ($_REQUEST['rEmail'] == "") || ($_REQUEST['rPassword'] == "")){
    echo "All Fields are Required";
  }
  else{
    $rName = $_REQUEST['rName'];
    $rEmail = $_REQUEST['rEmail'];
    $rPassword = $_REQUEST['rPassword'];

    $sql = "INSERT INTO registration_tb(requester_name, requester_email, requester_password) VALUES('$rName', '$rEmail', '$rPassword')";
    $conn->query($sql);
  }

}
?>
    <form>
        <div class="form-group">
          <label for="exampleInputEmail1">User Name</label>
          <input type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" placeholder="Enter Name" name="rName"> 
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="rEmail"> 
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="rPassword">
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary" name="rSignup">Submit</button>
      </form>
    
