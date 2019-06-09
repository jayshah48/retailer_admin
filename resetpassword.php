<?php


if($_SERVER["REQUEST_METHOD"]=="GET"){
  require 'init.php';
  
}

function showData($password,$phonenumber){
	global $connect;
//	echo "phonenumber: " . $phonenumber . "<br /> " . $password . "<br />";
	$query = "select U_name_FK from userdetail where U_whatsapp = '$phonenumber';";
    $query = mysqli_query($connect,$query) or die (mysqli_error($connect));
    $array = mysqli_fetch_assoc($query);
	$username = $array["U_name_FK"];
//	echo "Hello" . $usern	ame;
	$query1 = "UPDATE userlogin SET U_password='$password' WHERE U_name = '$username';";
	if(mysqli_query($connect,$query1))
	{
		echo "Successfull";
	}
	else
	{
		echo "Failed";
	}
	mysqli_close($connect);
}
	$phonenumber = $_GET["phnnumber"];
	// Authorisation details.
	$username = "chhuganijay.2098@gmail.com";
	$hash = "ca01a800bd8733d2f8e64f2045d2376a51958f15300867d4f82a3ef037f2beda";

	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "TXTLCL"; // This is who the message appears to be from.
	$numbers = "919574793949"; // A single number or a comma-seperated list of numbers
	$password = random_password();
	showData($password,$phonenumber);
	$message = "Hello dear,This is your new password : " . $password;
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);
	echo "<pre>";
	print_r($result);exit;
	 header('Content-Type:Application/json');
  echo json_encode($array);
function random_password( $length = 8 ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
}
?>