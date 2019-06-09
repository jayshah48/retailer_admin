<?php
if($_SERVER["REQUEST_METHOD"]=="GET"){
  include 'init.php';
  showData();
}

function showData(){
  global $connect;
  
  $U_name_FK = $_GET["U_name_FK"];

  $query = "select U_Cat_id_FK from userdetail where U_name_FK='$U_name_FK'";
  $tempresult = mysqli_query($connect,$query);
  $temprow = mysqli_fetch_assoc($tempresult);
  $u_cat = $temprow['U_Cat_id_FK'];
 
  $query = "select a.P_id,a.P_name,a.P_stock,a.P_size,a.PP_id_FK,a.P_image,b.Price FROM
  productdetails a,categoryprice b WHERE a.P_id=b.P_id_FK AND b.C_id_FK='$u_cat'";
  $result = mysqli_query($connect,$query);
  while($row = mysqli_fetch_assoc($result)){
    $array[] = $row;
  }
  header('Content-Type:Application/json');
  echo json_encode($array);

}


 ?>
