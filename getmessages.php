<?php
	$conn = mysqli_connect('localhost', 'root', '', 'testing', '3307');
	/*if($conn){
		echo "connected";
	}*/
	$res = mysqli_query($conn, "select * from messages");
	while ($row = mysqli_fetch_assoc($res)) {
		$messages[] = $row['message'];
	}
	echo json_encode($messages);
?>