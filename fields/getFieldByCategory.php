getFieldByCategory.php
<?php
include "../conn.php";
	$id 	= $_POST['id'];
	
	$query = mysqli_query($conn,"SELECT * FROM tempat WHERE id_kategori='".$id."' ORDER BY nama ASC");
	
	$json = array();
	
	while($row = mysqli_fetch_assoc($query)){
		$json[] = $row;
	}
	
	echo json_encode($json);
	
	mysqli_close($conn);
?>