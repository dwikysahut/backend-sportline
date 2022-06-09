getFieldById.php<?php
	include "conn.php";

	$id 	= $_GET['id'];
	
	class emp{}
	if($conn){
	
	if (empty($id)) { 
		$response = new emp();
		$response->success = 0;
		$response->message = "Error Mengambil Data"; 
		die(json_encode($response));
	} else {
		$query 	= mysqli_query($conn,"SELECT tempat.*,kategori.nama as kategori FROM tempat INNER JOIN kategori ON kategori.id=tempat.id_kategori WHERE id='".$id."'");
		$row 	= mysqli_fetch_array($query);
		
		if (!empty($row)) {
			$response = new emp();
			$response->success = 1;
			$response->id = $row["id"];
			$response->nama = $row["nama"];
			$response->deskripsi = $row["deskripsi"];
			$response->id_kategori = $row["id_kategori"];
			$response->rating = $row["rating"];
			$response->gambar = $row["gambar"];
			$response->latitude = $row["latitude"];
			$response->longitude = $row["longitude"];
			$response->kuota = $row["kuota"];

			die(json_encode($response));
		} else{ 
			$response = new emp();
			$response->success = 0;
			$response->message = "Error Mengambil Data";
			die(json_encode($response)); 
		}	
	}
	}
?>