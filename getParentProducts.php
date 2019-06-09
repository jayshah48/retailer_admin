<?php
  $conn = mysqli_connect("localhost","root","jay123","newwholesaledb");
  $id = $_GET["id"];
  $query = "select * from productparent";
  $result = mysqli_query($conn,$query);
  while($row = mysqli_fetch_assoc($result))
  {
      $array[] = $row;
  }
  header('Content-Type:Application/json');
  echo json_encode($array);
?>
