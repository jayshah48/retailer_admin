
<?php

if($_SERVER["REQUEST_METHOD"]=="GET"){
    include 'init.php';
    showData();
  }
  

  function showData(){
    global $connect;
    
    $U_name_FK = $_GET["U_name_FK"];
  
    $query = "select U_name_FK,U_email,U_whatsapp,U_adhar,U_Pan from userdetail where U_name_FK='$U_name_FK'";
    
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