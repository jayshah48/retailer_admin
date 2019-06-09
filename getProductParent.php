<?php
if($_SERVER["REQUEST_METHOD"]=="GET"){
  include 'init.php';
  showData();
}

function showData(){
  global $connect;
  
  
  $query = "select * from productparent";
 
  $result = mysqli_query($connect,$query);
  while($row = mysqli_fetch_assoc($result)){
    $array[] = $row;
  }
  header('Content-Type:Application/json');
  echo json_encode($array);

}


 ?>
