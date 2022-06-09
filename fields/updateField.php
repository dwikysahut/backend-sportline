<?php
include "../conn.php";

		$id 	= $_POST['id'];
		$nama 	= $_POST['nama'];
		$deskripsi 	= $_POST['deskripsi'];
		$id_kategori	= $_POST['id_kategori'];
		$rating = $_POST['rating'];
		$gambar 	= $_POST['gambar'];
		$latitude 	= "-7.957730";
		$longitude 	= "112.590402";
		$kuota 	= $_POST['kuota'];
	
	class emp{}
	
	if (empty($id) || empty($nama) || empty($deskripsi) || empty($id_kategori) || empty($rating) || empty($gambar) || empty($latitude)|| empty($longitude)|| empty($kuota)) { 
		$response = new emp();
		$response->success = 0;
		$response->message = "Kolom isian tidak boleh kosong"; 
		die(json_encode($response));
	} else {
		$query = mysqli_query($conn,"UPDATE movie SET nama='".$nama."', deskripsi='".$deskripsi."',id_kategori='".$id_kategori."', rating='".$rating."',gambar='".$gambar."', latitude='".$latitude."',longitude='".$longitude."', kuota='".$stock."'WHERE id='".$id."'");
		if ($query) {
			$response = new emp();
			$response->success = 1;
			$response->message = "Data berhasil di update";
			die(json_encode($response));
		} else{ 
			$response = new emp();
			$response->success = 0;
			$response->message = "Error update Data";
			die(json_encode($response)); 
		}	
	}
?>