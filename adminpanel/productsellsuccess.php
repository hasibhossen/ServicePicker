<?php
session_start();
define ('PAGE', 'product');
define ('TITLE', 'Products');
include('header.php');
include('../dbconnection.php');
if(isset($_SESSION['is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];
}else{
    echo "<script> location.href = 'login.php'</script>";
}
$sql = "SELECT * FROM customer_tb WHERE cusid= {$_SESSION['myid']}";
$result = $conn->query($sql);
if($result->num_rows == 1){
    $row = $result->fetch_assoc();
    echo "<div class=' container card shadow ml-5 my-5'>
    <table class='table table-bordered'>
    <tbody>
        <h3 class='text-center py-5'>Customer Bill Receipt</h3>
      <tr>
        <th>Customer ID:</th>
        <td> ".$row['cusid']."</td>
        
      </tr>
      <tr>
      <th>Customer Name:</th>
      <td> ".$row['cusname']."</td>
      </tr>
      <tr>
      <th>Address:</th>
      <td> ".$row['cusadd']."</td>
      </tr>
      <tr>
      <th>Product Name:</th>
      <td> ".$row['cpname']."</td>
      </tr>
      <tr>
      <th>Quantity:</th>
      <td> ".$row['cpquantity']."</td>
      </tr>
      <tr>
      <th>Each Price:</th>
      <td> ".$row['cpeach']."</td>
      </tr>
      <tr>
      <th>Total Price:</th>
      <td> ".$row['cptotal']."</td>
      </tr>
      <tr>
      <th>Date:</th>
      <td> ".$row['cpdate']."</td>
      </tr>
      <tr class=''>
      
      </tr>
    </tbody>
  </table>
  <div class='text-center py-3'>
    <form class ='d-print-none d-inline'><input class='btn btn-danger' type='submit' value='Print' onClick='window.print()'></form>
    <a class='btn btn-secondary d-print-none d-inline' href='product.php'>Close</a>
  </div>

  </div>";

}
else{

}
?>

<?php include('footer.php');?>