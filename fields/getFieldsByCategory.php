<?php
include "../conn.php";

$json = array();
class emp{}
if($conn){

	$id 	= $_GET['id'];
	
	$query = mysqli_query($conn,"SELECT tempat.*,kategori.nama as kategori FROM tempat INNER JOIN kategori ON kategori.id= tempat.id_kategori WHERE id_kategori='".$id."' ORDER BY nama ASC");
	
	while($row = mysqli_fetch_assoc($query)){
		$json[] = $row;
	}
	
	if($query){
		$response = new emp();
			$response->success = 1;
			$response->message = "Sukses Mengambil Data";
			$response->data=$json;
			die(json_encode($response));
			}
		else{ 
			$response = new emp();
			$response->success = 0;
			$response->message = "Tidak Ada Data";
			die(json_encode($response)); 
		}	
	}
	// mysqli_close($conn);
?>