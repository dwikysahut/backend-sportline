<?php
require "../conn.php";
$username = $_POST["username"];
$password = $_POST["password"];
$enc_password=md5($password);
class obj{}
if($conn){
	
	$sqlCheckusername = "SELECT * FROM user WHERE username LIKE '$username'";

	$usernameQuery = mysqli_query($conn,$sqlCheckusername);
	if(mysqli_num_rows($usernameQuery) > 0){
		$sqlLogin = "SELECT * FROM user WHERE username LIKE '$username' AND password LIKE '$enc_password'";

		$loginQuery = mysqli_query($conn,$sqlLogin);

		$row 	= mysqli_fetch_array($loginQuery);
		
		if (!empty($row)) {
			$response = new obj();
			$response->success = 1;
			$response->id = $row["id"];
			$response->nama = $row["nama"];
			$response->role = $row["role"];
			$response->email = $row["email"];
			$response->no_telp = $row["no_telp"];

			$response->message = "Login Successfully";

			die(json_encode($response));
		} else{ 
			$response = new obj();
			$response->success = 0;
			$response->message = "Wrong Password, Try Again..";
			die(json_encode($response)); 
		}	
	}
	else{
		$response = new obj();
			$response->success = 0;
			$response->message = "Username not registered";
			die(json_encode($response)); 
	}
}else{
	echo "Connection Error";

} ?>