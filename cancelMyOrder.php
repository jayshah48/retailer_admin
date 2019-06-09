<?php

if($_SERVER["REQUEST_METHOD"]=="GET"){
    include 'init.php';
    showData();
  }
  

  function showData(){
    global $connect;
    
    $T_id = $_GET["T_id"]; 
    
    $query = "delete from transactions where T_id=$T_id";
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