<?php
if($_SERVER["REQUEST_METHOD"]=="GET"){
  include 'init.php';
  showData();
}

function showData(){
  global $connect;
  
  $U_name_FK = $_GET["U_name_FK"];

  $query = "select U_id_FK from userdetail where U_name_FK='$U_name_FK'";
  $tempresult = mysqli_query($connect,$query);
  $temprow = mysqli_fetch_assoc($tempresult);
  $u_id = $temprow['U_id_FK'];
  $i=0;
  $query = "select a.P_name,a.P_image,b.User_id,b.Product_id,b.Quantity,b.Price,b.Status_Cart FROM productdetails a,cart b WHERE a.P_id=b.Product_id AND b.User_id='$u_id' AND b.Status_Cart='IN CART'";
  $result = mysqli_query($connect,$query);
  while($row = mysqli_fetch_assoc($result)){
    $array[] = $row;
    $i=1;
  }
  header('Content-Type:Application/json');
  if($i==1){
    echo json_encode($array);
  }
  

}


 ?>
