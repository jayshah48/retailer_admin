<?php
//PHP file to get user's Credentials to check whether user is legitimate or not
if($_SERVER["REQUEST_METHOD"]=="GET"){
  include 'init.php';
  showData();
}

function showData(){
  global $connect;
  $abc = $_GET["name"];
  $query = "select * from userLogin where U_name='$abc';";
  $result = mysqli_query($connect,$query);
  $number_of_rows = mysqli_num_rows($result);
  $temp_array = array();
  if($number_of_rows > 0){
    while($row = mysqli_fetch_assoc($result)){
      $temp_array[] = $row;
    }
  }
  header('Content-Type: application/json');
  echo json_encode(($temp_array));
  mysqli_close($connect);
}

 ?>
