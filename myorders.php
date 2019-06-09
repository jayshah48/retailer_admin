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
   
   
    $query = "select a.P_name,a.P_image,b.Quantity,b.STATE,b.Total_Price,b.T_id 
              FROM productdetails a,transactions b WHERE 
              a.P_id=b.P_id_FK AND
              b.U_id_FK='$u_id' AND b.STATE <>'DELIVERED'";
    $result = mysqli_query($connect,$query);
    $i=0;
    while($row = mysqli_fetch_assoc($result)){
      $array[] = $row;
        $i=1;
    }
    header('Content-Type:Application/json');
    if($i == 1){
        echo json_encode($array);
    }
    
  
  }
  








?>