<?php
  $conn = mysqli_connect("localhost","root","","updated_wholesaledb");
  $Email = $_GET["Email"];
  $Mb = $_GET["Mb"];
  $Adharcard = $_GET["Adharcard"];
  $Pancard = $_GET["Pancard"];
  $Username = $_GET["Username"];
  echo $Username . "  " . $Email;
  $query = "UPDATE userdetail SET U_email='$Email',U_whatsapp='$Mb',U_adhar='$Adharcard',U_Pan='$Pancard' where U_name_FK='$Username'";
  $result = mysqli_query($conn,$query);
?>


<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'init.php';
    showData();
  }
  

  function showData(){
    global $connect;
    
    $U_name_FK = $_POST["U_name_FK"];
    $U_email = $_POST["U_email"];
    $U_whatsapp = $_POST["U_whatsapp"];
    $U_adhar = $_POST["U_adhar"];
    $U_Pan = $_POST["U_Pan"];
   
   
    $query = "UPDATE userdetail SET U_email=' $U_email',U_whatsapp='$U_whatsapp',U_adhar='$U_adhar',U_Pan='$U_Pan' where U_name_FK='$U_name_FK'";
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