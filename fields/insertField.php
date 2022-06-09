<?php
include "../conn.php";
	$nama 	= $_POST['nama'];
	$deskripsi 	= $_POST['deskripsi'];
	$id_kategori	= $_POST['id_kategori'];
	$rating = $_POST['rating'];
	$gambar 	= $_POST['gambar'];
	$latitude 	= "-7.957730";
	$longitude 	= "112.590402";
	$kuota 	= $_POST['kuota'];
	class emp{}
	if($conn){
	if (empty($title) || empty($desc)|| empty($date)|| empty($rating)|| empty($genre)|| empty($image)|| empty($showtime)) { 
		$response = new emp();
		$response->success = 0;
		$response->message = "Field tidak boleh kosong"; 
		die(json_encode($response));
	} else {
		$query = mysqli_query($conn,"INSERT INTO tempat VALUES(NULL, '$nama', '$deskripsi', '$id_kategori', '$rating', 
			'$gambar', '$latitude','$longitude','$kuota')");
		
		if ($query) {
			$response = new emp();
			$response->success = 1;
			$response->message = "Data berhasil di simpan";
			die(json_encode($response));
		} else{ 
			$response = new emp();
			$response->success = 0;
			$response->message = "Error simpan Data";
			die(json_encode($response)); 
		}	
	}
}
else{
	echo "Connection Error";

} 
?>