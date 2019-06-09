<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
  include 'init.php';
  showData();
}

function showData(){
  global $connect;
  $U_name=$_POST["U_name"];
  $Quant =$_POST["Quant"];
  $Price = $_POST["Price"];  
  $P_id_FK = $_POST["P_id_FK"];

  $query = "select U_id_FK from userdetail where U_name_FK='$U_name'";
  $tempresult = mysqli_query($connect,$query);
  $temprow = mysqli_fetch_assoc($tempresult);
  $u_id = $temprow['U_id_FK'];

  $insertQuery = "insert into cart(User_id,Product_id,Quantity,Price) values
    ($u_id,$P_id_FK,$Quant,$Price)";
    echo $U_name.$Quant.$u_id;

  // between ($P_id+1) and ($P_id+4)
 // $query = "select * from  productdetails";
  $result = mysqli_query($connect,$insertQuery);
//   while($row = mysqli_fetch_assoc($result)){
//     $array[] = $row;
//   }
  header('Content-Type:Application/json');
 // echo json_encode($array);

}


 ?>
