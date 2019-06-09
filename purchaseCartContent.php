<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
  include 'init.php';
  showData();
}

function showData(){
  global $connect;
  
  $U_name_FK = $_POST["U_name_FK"];

  //to get User id from username
  $query = "select U_id_FK from userdetail where U_name_FK='$U_name_FK'";
  $tempresult = mysqli_query($connect,$query);
  $temprow = mysqli_fetch_assoc($tempresult);
  $u_id = $temprow['U_id_FK'];
 
  //when purchase button is clicked in android, change the status from IN_CART to REQUESTED
  //so then when again we open cart ordered Items won't show
 

    
  $query = "INSERT INTO transactions(U_id_FK,P_id_FK,Quantity,Total_Price) SELECT User_id,Product_id,Quantity,Price FROM
            cart WHERE User_id='$u_id' AND Status_Cart='IN CART'";  
  $result = mysqli_query($connect,$query);  

  $query = "UPDATE cart SET Status_Cart='REQUESTED' WHERE User_id='$u_id'";
  $result = mysqli_query($connect,$query);
  header('Content-Type:Application/json');
  //echo json_encode($array);

}


 ?>
""