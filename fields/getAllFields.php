<?php
include "../conn.php";
	
	$query = mysqli_query($conn,"SELECT tempat.*,kategori.nama as kategori FROM tempat INNER JOIN kategori ON kategori.id= tempat.id_kategori ORDER BY nama ASC");
	
	$json = array();
	
	while($row = mysqli_fetch_assoc($query)){
		$json[] = $row;
	}
	
	echo json_encode($json);
	
	mysqli_close($conn);
?>