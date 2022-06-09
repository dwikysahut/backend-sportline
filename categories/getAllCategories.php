<?php
include "../conn.php";
	
	$query = mysqli_query($conn,"SELECT * FROM kategori ORDER BY nama ASC");
	
	$json = array();
	
	while($row = mysqli_fetch_assoc($query)){
		$json[] = $row;
	}
	
	echo json_encode($json);
	
	mysqli_close($conn);
?>