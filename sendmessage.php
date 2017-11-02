<?php
	$conn = mysqli_connect('localhost', 'root', '', 'testing', '3307');
	$data = json_decode(file_get_contents("php://input"));
	$message = $data->txt;

	$sql = "INSERT INTO messages (message) VALUES ('".$message."')";

	if (mysqli_query($conn, $sql)) {
	    echo "success";
	}
	else {
	    echo "error";
	}
?>