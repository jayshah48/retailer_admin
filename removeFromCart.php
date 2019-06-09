<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
  include 'init.php';
  showData();
}

//PHP file to remove particular cart activity
function showData(){
  global $connect;
  
  $U_name_FK = $_POST["U_name_FK"];
  $Product_id = $_POST["Product_id"];
  $Price = $_POST["Price"];


  $query = "select U_id_FK from userdetail where U_name_FK='$U_name_FK'";
  $tempresult = mysqli_query($connect,$query);
  $temprow = mysqli_fetch_assoc($tempresult);
  $u_id = $temprow['U_id_FK'];



  $query = "DELETE FROM cart WHERE User_id='$u_id' AND Price='$Price' AND Product_id='$Product_id' ";  
  $result = mysqli_query($connect,$query);
//   while($row = mysqli_fetch_assoc($result)){
//     $array[] = $row;
//   }
  header('Content-Type:Application/json');
 // echo json_encode($array);

}


 ?>
""