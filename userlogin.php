<?php
  $conn = mysqli_connect("localhost","root","jay123","newwholesaledb");
  $query = "select U_name,U_password from userlogin";
  $result = mysqli_query($conn,$query);
  while($row = mysqli_fetch_assoc($result))
  {
      $array[] = $row;
  }
  header('Content-Type:Application/json');
  echo json_encode($array);
?>
