<?php
//PHP file to change the passwords of user
if($_SERVER["REQUEST_METHOD"]=="GET"){
  include 'init.php';
  showData();
}

function showData(){
  global $connect;
  $name = $_GET["name"];
  $passwd = $_GET["passwd"];
  $query = "UPDATE userlogin SET First_time=0,U_password='$passwd' where U_name='$name';";
  //$query = "select * from userLogin where U_name='$getname';";
  $result = mysqli_query($connect,$query);
  //$number_of_rows = mysqli_num_rows($result);
  $temp_array = array();
  // if($number_of_rows > 0){
  //   while($row = mysqli_fetch_assoc($result)){
  //     $temp_array[] = $row;
  //   }
  // }
   header('Content-Type: application/json');
   echo json_encode(($temp_array));
   mysqli_close($connect);
}
 ?>
